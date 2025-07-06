@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Konten utama -->
        <div>
            <!-- Pesan langkah selanjutnya -->
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4">
                <h2 class="text-lg font-semibold text-purple-700 mb-1">Langkah Selanjutnya</h2>
                <p class="text-purple-600">
                    Mohon segera lakukan pembayaran sesuai instruksi pada halaman pembayaran Tripay yang telah terbuka di tab baru.
                </p>
            </div>
            
            <!-- Informasi pembayaran -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
                <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col items-center text-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-medium text-gray-800 mb-1">Waktu Pembayaran</h3>
                    <p class="text-sm text-gray-600">Bayar dalam 24 jam untuk menghindari kadaluarsa pesanan</p>
                </div>
                
                <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col items-center text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-medium text-gray-800 mb-1">Status Otomatis</h3>
                    <p class="text-sm text-gray-600">Status pesanan akan otomatis diperbarui setelah pembayaran berhasil</p>
                </div>
            </div>
            
            <!-- Tombol kembali -->
            <div class="flex justify-center p-4 pb-6">
                <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-xl transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="text-center mt-4 text-gray-500 text-sm">
        <p>Jika Anda mengalami kendala dalam pembayaran, silakan hubungi admin toko.</p>
        <p class="mt-1 text-xs">Pesanan Anda akan diproses segera setelah pembayaran berhasil dikonfirmasi.</p>
    </div>
</div>
@endsection