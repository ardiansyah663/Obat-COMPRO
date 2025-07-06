<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pesanan;
use App\Services\TripayService;
use Illuminate\Support\Facades\Log;

class CheckTripayPaymentStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tripay:check-status {--reference=} {--all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Memeriksa status pembayaran Tripay dan memperbarui status di database';

    /**
     * Mapping status Tripay ke status pesanan
     */
    protected const STATUS_MAPPING = [
        'UNPAID' => 'pending',
        'PAID' => 'paid',
        'EXPIRED' => 'expired',
        'FAILED' => 'failed',
        'REFUND' => 'canceled'
    ];

    /**
     * Execute the console command.
     */
    public function handle(TripayService $tripayService)
    {
        $reference = $this->option('reference');
        $checkAll = $this->option('all');

        if ($reference) {
            // Cek pesanan dengan reference tertentu
            $this->checkPaymentStatus($tripayService, $reference);
        } elseif ($checkAll) {
            // Cek semua pesanan dengan status pending
            $this->checkAllPendingPayments($tripayService);
        } else {
            $this->info('Pilih salah satu opsi: --reference=REF_ID atau --all');
        }

        return Command::SUCCESS;
    }

    /**
     * Cek status pembayaran untuk reference tertentu
     */
    private function checkPaymentStatus(TripayService $tripayService, string $reference)
    {
        $this->info("Memeriksa status pembayaran untuk reference: {$reference}");
        
        $pesanan = Pesanan::where('reference', $reference)->first();
        
        if (!$pesanan) {
            $this->error("Pesanan dengan reference {$reference} tidak ditemukan");
            return;
        }
        
        $paymentStatus = $tripayService->getPaymentStatus($reference);
        
        if (!$paymentStatus) {
            $this->error("Gagal mendapatkan status pembayaran dari Tripay");
            return;
        }
        
        $this->updatePesananStatus($pesanan, $paymentStatus);
    }

    /**
     * Cek semua pesanan dengan status pending
     */
    private function checkAllPendingPayments(TripayService $tripayService)
    {
        $this->info("Memeriksa semua pesanan dengan status pending...");
        
        $pendingPesanans = Pesanan::where('status', 'pending')
            ->whereNotNull('reference')
            ->get();
            
        $this->info("Ditemukan {$pendingPesanans->count()} pesanan pending");
        
        $bar = $this->output->createProgressBar($pendingPesanans->count());
        $bar->start();
        
        $updated = 0;
        
        foreach ($pendingPesanans as $pesanan) {
            $paymentStatus = $tripayService->getPaymentStatus($pesanan->reference);
            
            if ($paymentStatus) {
                $statusChanged = $this->updatePesananStatus($pesanan, $paymentStatus, false);
                if ($statusChanged) {
                    $updated++;
                }
            }
            
            $bar->advance();
            
            // Jeda sebentar untuk mencegah rate limiting dari API
            usleep(500000); // 0.5 detik
        }
        
        $bar->finish();
        $this->newLine();
        $this->info("Status {$updated} pesanan telah diperbarui");
    }

    /**
     * Update status pesanan berdasarkan status pembayaran dari Tripay
     */
    private function updatePesananStatus(Pesanan $pesanan, string $tripayStatus, bool $verbose = true)
    {
        $newStatus = self::STATUS_MAPPING[strtoupper($tripayStatus)] ?? 'pending';
        
        // Jika status tidak berubah, skip
        if ($pesanan->status === $newStatus) {
            if ($verbose) {
                $this->info("Status pesanan tetap: {$newStatus}");
            }
            return false;
        }
        
        if ($verbose) {
            $this->info("Memperbarui status pesanan dari {$pesanan->status} menjadi {$newStatus}");
        }
        
        $oldStatus = $pesanan->status;
        $pesanan->status = $newStatus;
        $pesanan->save();
        
        // Log perubahan status
        Log::info("Tripay payment status updated", [
            'pesanan_id' => $pesanan->id,
            'reference' => $pesanan->reference,
            'old_status' => $oldStatus,
            'new_status' => $newStatus
        ]);
        
        // Proses tambahan sesuai dengan status baru
        if ($newStatus === 'paid') {
            $this->handlePaidOrder($pesanan);
        } elseif ($newStatus === 'expired' || $newStatus === 'failed') {
            $this->handleFailedOrder($pesanan);
        }
        
        return true;
    }

    /**
     * Proses tambahan untuk pesanan yang sudah dibayar
     */
    private function handlePaidOrder(Pesanan $pesanan)
    {
        // Implementasi sesuai kebutuhan, seperti:
        // - Kirim email konfirmasi ke pembeli
        // - Update stok produk
        // - dll
        
        $this->info("Order #{$pesanan->id} telah dibayar. Melakukan proses tambahan...");
    }

    /**
     * Proses tambahan untuk pesanan yang gagal
     */
    private function handleFailedOrder(Pesanan $pesanan)
    {
        // Implementasi sesuai kebutuhan, seperti:
        // - Kirim email notifikasi ke pembeli
        // - Mengembalikan stok produk (jika dipesan)
        // - dll
        
        $this->info("Order #{$pesanan->id} gagal/kadaluarsa. Melakukan proses pembatalan...");
    }
}
