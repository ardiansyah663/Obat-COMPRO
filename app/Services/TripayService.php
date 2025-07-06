<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TripayService
{
    protected $apiKey;
    protected $privateKey;
    protected $merchantCode;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('TRIPAY_API_KEY');
        $this->privateKey = env('TRIPAY_PRIVATE_KEY');
        $this->merchantCode = env('TRIPAY_MERCHANT_CODE');
        
        // Gunakan API Sandbox jika aplikasi dalam mode development
        $this->apiUrl = config('app.env') === 'production' 
            ? 'https://tripay.co.id/api/' 
            : 'https://tripay.co.id/api-sandbox/';
    }

    /**
     * Membuat transaksi pembayaran
     *
     * @param array $data
     * @return array
     */
    public function createTransaction(array $data)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey
            ])->post($this->apiUrl . 'transaction/create', $data);

            return $response->json();
        } catch (\Exception $e) {
            Log::error('Tripay Create Transaction Error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * Mendapatkan detail transaksi berdasarkan reference
     *
     * @param string $reference
     * @return array
     */
    public function getTransactionDetail(string $reference)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey
            ])->get($this->apiUrl . 'transaction/detail', [
                'reference' => $reference
            ]);

            return $response->json();
        } catch (\Exception $e) {
            Log::error('Tripay Get Transaction Detail Error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
    
    /**
     * Mendapatkan status pembayaran berdasarkan reference
     *
     * @param string $reference
     * @return string|null status pembayaran (UNPAID/PAID/EXPIRED/FAILED/REFUND)
     */
    public function getPaymentStatus(string $reference)
    {
        $transaction = $this->getTransactionDetail($reference);
        
        if ($transaction['success'] ?? false) {
            return $transaction['data']['status'] ?? null;
        }
        
        return null;
    }
    
    /**
     * Mendapatkan daftar channel pembayaran
     *
     * @return array
     */
    public function getPaymentChannels()
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey
            ])->get($this->apiUrl . 'merchant/payment-channel');
            
            return $response->json();
        } catch (\Exception $e) {
            Log::error('Tripay Get Payment Channels Error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
    
    /**
     * Memverifikasi callback signature dari Tripay
     *
     * @param string $callbackSignature
     * @param string $json
     * @return boolean
     */
    public function verifyCallbackSignature(string $callbackSignature, string $json)
    {
        $signature = hash_hmac('sha256', $json, $this->privateKey);
        return $signature === $callbackSignature;
    }
} 