<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ImageController extends Controller
{
    /**
     * Menampilkan gambar dari storage
     * 
     * @param string $path
     * @return StreamedResponse
     */
    public function show($path)
    {
        // Log request path
        Log::info('ImageController: Request untuk gambar', [
            'path' => $path,
            'full_url' => request()->fullUrl()
        ]);
        
        // Hapus prefix products/ jika ada, karena kita akan menguji berbagai kemungkinan
        $basename = basename($path);
        
        // Coba cara 1: Cari langsung dengan path lengkap
        if (Storage::disk('public')->exists($path)) {
            Log::info('ImageController: Gambar ditemukan di path lengkap: ' . $path);
            return Storage::disk('public')->response($path);
        }
        
        // Coba cara 2: Dengan prefix products/
        $productsPath = 'products/' . $basename;
        if (Storage::disk('public')->exists($productsPath)) {
            Log::info('ImageController: Gambar ditemukan dengan prefix products/: ' . $productsPath);
            return Storage::disk('public')->response($productsPath);
        }
        
        // Cara 3: Cari semua file di direktori products dan cocokkan basename
        try {
            if (Storage::disk('public')->exists('products')) {
                $files = Storage::disk('public')->files('products');
                Log::info('ImageController: Daftar file di direktori products', ['files' => $files]);
                
                foreach ($files as $file) {
                    if (basename($file) === $basename) {
                        Log::info('ImageController: Gambar ditemukan dengan basename match: ' . $file);
                        return Storage::disk('public')->response($file);
                    }
                }
            } else {
                Log::error('ImageController: Direktori products tidak ditemukan');
            }
        } catch (\Exception $e) {
            Log::error('ImageController: Error saat mencari file', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
        
        // Cara 4: Coba cari semua file di root storage/public dan cocokkan basename
        try {
            $rootFiles = Storage::disk('public')->files('/');
            Log::info('ImageController: Daftar file di root storage/public', ['files' => $rootFiles]);
            
            foreach ($rootFiles as $file) {
                if (basename($file) === $basename) {
                    Log::info('ImageController: Gambar ditemukan di root storage/public: ' . $file);
                    return Storage::disk('public')->response($file);
                }
            }
        } catch (\Exception $e) {
            Log::error('ImageController: Error saat mencari file di root', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
        
        // Jika semua cara gagal, tampilkan placeholder
        Log::error('ImageController: Gambar tidak ditemukan', [
            'path' => $path,
            'basename' => $basename,
            'storage_path' => Storage::disk('public')->path($path)
        ]);
        
        // Return placeholder image
        $placeholderPath = public_path('images/no-image.png');
        if (file_exists($placeholderPath)) {
            return response()->file($placeholderPath);
        }
        
        throw new NotFoundHttpException('Gambar tidak ditemukan');
    }
}
