<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function __construct()
    {
        // Set timezone untuk Indonesia
        config(['app.timezone' => 'Asia/Jakarta']);
    }

    public function index() 
    {
        $produks = Produk::all();
        return view('frontend.index', compact('produks'));
    }

    public function produk($id) 
    {
        $produk = Produk::findOrFail($id);
        // Dapatkan channel pembayaran yang tersedia
        $channels = $this->getPaymentChannels();
        return view('frontend.produk', compact('produk', 'channels'));
    }

    public function home() 
    {
        $produks = Produk::all();
        return view('frontend.index', compact('produks'));
    }
    
    public function show($id) 
    {
        $produk = Produk::findOrFail($id);
        // Dapatkan channel pembayaran yang tersedia
        $channels = $this->getPaymentChannels();
        return view('frontend.produk', compact('produk', 'channels'));
    }

    

    // Mendapatkan channel pembayaran dari Tripay
    private function getPaymentChannels()
    {
        try {
            $apiKey = env('TRIPAY_API_KEY');
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey
            ])->get('https://tripay.co.id/api-sandbox/merchant/payment-channel');
            
            $result = $response->json();
            
            if ($response->successful() && isset($result['success']) && $result['success'] === true) {
                return $result['data'];
            }
            
            Log::error('Tripay Get Channels Error: ' . json_encode($result));
            return [];
            
        } catch (\Exception $e) {
            Log::error('Get Payment Channels Error: ' . $e->getMessage());
            return [];
        }
    }

    public function checkout(Request $request, $id) 
    {
        try {
            $produk = Produk::findOrFail($id);
            
            $request->validate([
                'nama_pembeli' => 'required|string|max:255',
                'email_pembeli' => 'required|email',
                'no_hp' => 'required|string|max:15',
                'jumlah' => 'required|integer|min:1',
                'metode_pembayaran' => 'required|string',
            ]);

$harga_produk = $produk->harga * $request->jumlah;
$berat_total = $produk->berat * $request->jumlah; // dalam kg
$ongkir = $request->jumlah * 5000; // Ongkir berdasarkan jumlah

$total_harga = $harga_produk + $ongkir;
            
            $pesanan = new Pesanan();
            $pesanan->produk_id = $produk->id;
            $pesanan->nama_pembeli = $request->nama_pembeli;
            $pesanan->alamat = $request->alamat;
            $pesanan->email_pembeli = $request->email_pembeli;
            $pesanan->no_hp = $request->no_hp;
            $pesanan->jumlah = $request->jumlah;
            $pesanan->total_harga = $total_harga;
            $pesanan->status = 'pending';
            $pesanan->created_at = Carbon::now();
            $pesanan->save();

            // Request ke Tripay
            $apiKey = env('TRIPAY_API_KEY');
            $merchantCode = env('TRIPAY_MERCHANT_CODE');
            $privateKey = env('TRIPAY_PRIVATE_KEY');
            
            $merchantRef = 'INV-' . $pesanan->id . '-' . time();

            $data = [
                'method' => $request->metode_pembayaran,
                'merchant_ref' => $merchantRef,
                'amount' => $total_harga,
                'customer_name' => $pesanan->nama_pembeli,
                'customer_email' => $pesanan->email_pembeli,
                'customer_phone' => $pesanan->no_hp,
                'order_items' => [
    [
        'sku' => $produk->id,
        'name' => $produk->nama,
        'price' => $produk->harga,
        'quantity' => $request->jumlah,
    ],
    [
       'sku' => 'ONGKIR',
    'name' => 'Ongkos Kirim (5.000 x ' .$request->jumlah .' pcs)',
    'price' => $ongkir,
    'quantity' => 1,
    ]
                    
                ],
                'return_url' => route('success'),
                'callback_url' => env('TRIPAY_CALLBACK_URL'),
                'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
                'signature' => hash_hmac('sha256', $merchantCode.$merchantRef.$total_harga, $privateKey)
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey
            ])->post('https://tripay.co.id/api-sandbox/transaction/create', $data);

            $result = $response->json();

            if ($response->successful() && isset($result['success']) && $result['success'] === true) {
                $pesanan->update([
                    'reference' => $result['data']['reference'],
                    'merchant_ref' => $merchantRef,
                    'payment_method' => $request->metode_pembayaran,
                    'checkout_url' => $result['data']['checkout_url'],
                ]);
                return redirect($result['data']['checkout_url']);
            }

            // Jika terjadi kesalahan pada respons Tripay
            Log::error('Tripay Error: ' . json_encode($result));
            return back()->with('error', 'Gagal membuat pembayaran: ' . ($result['message'] ?? 'Terjadi kesalahan pada payment gateway'));
            
        } catch (\Exception $e) {
            Log::error('Checkout Error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function success() 
    {
        return view('frontend.success');
    }

    

    public function callback(Request $request) 
    {
        // Log semua data request untuk debugging
        Log::info('Tripay callback received', [
            'headers' => $request->headers->all(),
            'body' => $request->all(),
            'method' => $request->method()
        ]);
        
        // Verifikasi callback dari Tripay
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        
        $privateKey = env('TRIPAY_PRIVATE_KEY');
        $signature = hash_hmac('sha256', $json, $privateKey);
        
        // Validasi signature
        if ($signature !== $callbackSignature) {
            Log::warning('Invalid callback signature', [
                'expected' => $signature,
                'received' => $callbackSignature
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Invalid signature'
            ], 403);
        }

        // Proses data
        $data = json_decode($json);
        
        // Pastikan format data sesuai
        if (!isset($data->reference) || !isset($data->status)) {
            Log::warning('Invalid callback data format', [
                'data' => $data
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Invalid data format'
            ], 400);
        }

        $reference = $data->reference;
        $status = strtolower($data->status); // PAID / EXPIRED / FAILED / dll

        try {
            $pesanan = Pesanan::where('reference', $reference)->first();
            
            if ($pesanan) {
                Log::info('Updating payment status from callback', [
                    'pesanan_id' => $pesanan->id,
                    'old_status' => $pesanan->status,
                    'new_status' => $status
                ]);
                
                $pesanan->update([
                    'status' => $status,
                    'updated_at' => Carbon::now()
                ]);
                
                Log::info('Payment status updated: ' . $reference . ' to ' . $status);
                
                // Tambahkan logika bisnis lainnya sesuai status (contoh: kirim email, update stok, dll)
                // Contoh:
                if ($status === 'paid') {
                    // Kirim email konfirmasi pembayaran ke pelanggan
                    // Mail::to($pesanan->email_pembeli)->send(new PembayaranSukses($pesanan));
                    
                    // Update stok produk
                    // $pesanan->produk->decrement('stok', $pesanan->jumlah);
                }
                
                return response()->json(['success' => true]);
            }
            
            Log::warning('Payment reference not found: ' . $reference);
            return response()->json([
                'success' => false,
                'message' => 'Payment reference not found'
            ], 404);
            
        } catch (\Exception $e) {
            Log::error('Callback Error: ' . $e->getMessage(), [
                'exception' => get_class($e),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Error processing callback'
            ], 500);
        }
    }
}