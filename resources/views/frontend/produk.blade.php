@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Product Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-xl">
        <div class="md:flex">
            <!-- Product Image Section -->
            <div class="md:w-1/2 relative">
                @if($produk->gambar)
                    <div class="h-full flex items-center justify-center bg-gradient-to-br from-gray-50 to-blue-50 overflow-hidden">
                        <img src="{{ asset('storage/' . $produk->gambar) }}" 
                             alt="{{ $produk->nama }}" 
                             class="w-full object-contain max-h-[500px] transition-all duration-300 hover:scale-105"
                             onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}';">
                    </div>
                    
                    <!-- Debug info - hanya untuk keperluan development -->
                    @if(config('app.debug'))
                    <div class="p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 my-2 text-sm">
                        <p class="font-bold">Debug Info:</p>
                        <p>Gambar: {{ $produk->gambar }}</p>
                        <p>Nama file: {{ basename($produk->gambar) }}</p>
                        <p>URL: {{ asset('storage/' . $produk->gambar) }}</p>
                    </div>
                    @endif
                    <!-- End debug info -->
                    
                @else
                    <div class="w-full h-full min-h-[400px] bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 text-indigo-400 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
                
                <!-- Product Type Badge -->
                <div class="absolute top-4 left-4">
                    <div class="px-3 py-1.5 bg-indigo-600 text-white text-xs font-bold uppercase rounded-full shadow-md">
                        Produk Apotek
                    </div>
                </div>
            </div>
            
            <!-- Product Info Section -->
            <div class="p-8 md:w-1/2">
                <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">{{ $produk->nama }}</h1>
                <p class="mt-4 text-gray-600 leading-relaxed">{{ $produk->deskripsi }}</p>
                
                <div class="mt-6 flex items-baseline">
                    <span class="text-4xl font-bold text-green-600">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                    <span class="text-sm text-gray-500 ml-2">/ {{ $produk->berat }} Mg</span>
                </div>
                
                <!-- Divider -->
                <div class="mt-8 relative">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="px-3 bg-white text-lg font-medium text-gray-900">Form Pembelian</span>
                    </div>
                </div>
                
                <!-- Purchase Form -->
                <div class="mt-6">
                    @if(session('error'))
                    <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-sm transform transition-all animate-bounce" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    <form action="{{ route('checkout', ['id' => $produk->id]) }}" method="POST">
                        @csrf
                        <div class="space-y-5">
                            <!-- Nama Lengkap -->
                            <div class="group">
                                <label for="nama_pembeli" class="block text-sm font-medium text-gray-700 mb-1 group-hover:text-indigo-600 transition-colors">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="nama_pembeli" name="nama_pembeli" 
                                           placeholder="Masukkan nama lengkap Anda"
                                           required class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-300">
                                </div>
                                @error('nama_pembeli')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="group">
                                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1 group-hover:text-indigo-600 transition-colors">
                                    Alamat <span class="text-red-500">*</span>
                                </label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 pt-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <textarea id="alamat" name="alamat" 
                                        placeholder="Masukkan alamat lengkap Anda"
                                        required class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-300" rows="3"></textarea>
                                </div>
                                @error('alamat')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Email -->
                            <div class="group">
                                <label for="email_pembeli" class="block text-sm font-medium text-gray-700 mb-1 group-hover:text-indigo-600 transition-colors">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="email" id="email_pembeli" name="email_pembeli" 
                                           placeholder="contoh@email.com"
                                           required class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-300">
                                </div>
                                @error('email_pembeli')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Nomor HP -->
                            <div class="group">
                                <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1 group-hover:text-indigo-600 transition-colors">
                                    Nomor HP <span class="text-red-500">*</span>
                                </label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="no_hp" name="no_hp" 
                                           placeholder="08xxxxxxxxxx"
                                           required class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-300">
                                </div>
                                @error('no_hp')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Jumlah -->
                            <div class="group">
                                <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-1 group-hover:text-indigo-600 transition-colors">
                                    Jumlah <span class="text-red-500">*</span>
                                </label>
                                <div class="flex">
                                    <button type="button" 
                                            onclick="if(parseInt(document.getElementById('jumlah').value) > 1) document.getElementById('jumlah').value = parseInt(document.getElementById('jumlah').value) - 1; updateTotalPrice();" 
                                            class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-gray-50 text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                                        <span class="sr-only">Kurangi jumlah</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <input type="number" id="jumlah" name="jumlah" min="1" value="1" 
                                           oninput="updateTotalPrice();"
                                           required class="relative flex-1 block w-full text-center rounded-none border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-300">
                                    <button type="button" 
                                            onclick="document.getElementById('jumlah').value = parseInt(document.getElementById('jumlah').value) + 1; updateTotalPrice();" 
                                            class="relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-gray-50 text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                                        <span class="sr-only">Tambah jumlah</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Minimal pembelian 1 item</p>
                                @error('jumlah')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Total Price -->
                            <div class="py-4 bg-gray-50 rounded-lg px-4 mt-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-700 font-medium">Total Harga:</span>
                                    <span id="totalPrice" class="text-2xl font-bold text-green-600">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            
                            <!-- Metode Pembayaran -->
                            <div class="group">
                                <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700 mb-1 group-hover:text-indigo-600 transition-colors">
                                    Metode Pembayaran <span class="text-red-500">*</span>
                                </label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </div>
                                    <select id="metode_pembayaran" name="metode_pembayaran" required 
                                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-300">
                                        <option value="">Pilih Metode Pembayaran</option>
                                        @if(isset($channels) && !empty($channels))
                                            @foreach($channels as $channel)
                                                <option value="{{ $channel['code'] }}">{{ $channel['name'] }}</option>
                                            @endforeach
                                        @else
                                            <option value="QRIS">QRIS</option>
                                        @endif
                                    </select>
                                </div>
                                @error('metode_pembayaran')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Tombol Beli -->
                            <div class="mt-6">
                                <button type="submit" class="w-full flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:scale-[1.02]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    Beli Sekarang
                                </button>
                                <p class="text-sm text-gray-500 mt-3 text-center">
                                    <span class="text-red-500">*</span> Wajib diisi
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Information -->
    <div class="mt-12 bg-white rounded-2xl shadow-lg p-8 transition-transform duration-300 hover:shadow-xl">
        <h2 class="text-2xl font-bold mb-4 text-gray-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Informasi Produk
        </h2>
        <div class="prose max-w-none">
            <p class="text-gray-600 leading-relaxed">{{ $produk->deskripsi }}</p>
        </div>
    </div>

    <!-- Back to Products Link -->
    <div class="mt-8">
        <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar Produk
        </a>
    </div>
</div>

<!-- JavaScript for dynamic calculations -->
<script>
    // Calculate total price based on quantity
    function updateTotalPrice() {
        const basePrice = {{ $produk->harga }};
        const quantity = parseInt(document.getElementById('jumlah').value) || 1;
        const totalPrice = basePrice * quantity;
        
        // Format as Indonesian Rupiah
        const formattedPrice = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(totalPrice).replace('IDR', 'Rp');
        
        document.getElementById('totalPrice').textContent = formattedPrice;
    }
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateTotalPrice();
    });
</script>
@endsection