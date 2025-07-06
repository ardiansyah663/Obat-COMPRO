<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herbal Alami - Natural Remedies</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }
        
        .header h2 {
            font-size: 2.5rem;
            color: #344767;
            display: inline-block;
            padding-bottom: 0.5rem;
            position: relative;
        }
        
        .header h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 3px;
            background: linear-gradient(90deg, #4CAF50, #8BC34A);
            border-radius: 3px;
        }
        
        .office-container {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
            margin-top: 2rem;
        }
        
        .office-card {
            width: 100%;
            max-width: 500px;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .office-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .card-header {
            padding: 1.5rem;
            position: relative;
        }
        
        .office-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #344767;
            margin-bottom: 0.5rem;
        }
        
        .office-address {
            font-size: 1rem;
            color: #6c757d;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .pin-icon {
            color: #4CAF50;
            font-size: 1.2rem;
        }
        
        .map-container {
            width: 100%;
            height: 300px;
            overflow: hidden;
            position: relative;
        }
        
        .map-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.02);
            pointer-events: none;
            transition: background 0.3s;
        }
        
        .map-container:hover .map-overlay {
            background: rgba(0,0,0,0);
        }
        
        .map-frame {
            width: 100%;
            height: 100%;
            border: 0;
        }
        
        .card-footer {
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f8f9fa;
            border-top: 1px solid #eee;
        }
        
        .contact-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #6c757d;
            font-size: 0.9rem;
            cursor: pointer;
            transition: color 0.3s;
        }
        
        .contact-info:hover {
            color: #4CAF50;
        }
        
        .action-btn {
            padding: 0.5rem 1rem;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .action-btn:hover {
            background: #43a047;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .office-container {
                flex-direction: column;
                align-items: center;
            }
            
            .office-card {
                width: 100%;
            }
            
            .header h2 {
                font-size: 2rem;
            }
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .office-card {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        .office-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        :root {
            --primary-color: #2A7D4F;
            --secondary-color: #B0DB9C;
            --accent-color: #F6C453;
            --text-color: #404040;
            --bg-light: #F8FBF6;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            background-color: #FFFFFF;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, var(--primary-color) 0%, #134e35 100%);
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            background: linear-gradient(to right, var(--secondary-color), #FFFFFF);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.2;
        }
        
        .nav-link {
            position: relative;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: white;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover:after {
            width: 100%;
        }
        
        .feature-card {
            transition: all 0.3s ease;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #E9F3E6;
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 30px rgba(42, 125, 79, 0.1);
            border-color: var(--secondary-color);
        }
        
        .feature-icon {
            background-color: rgba(176, 219, 156, 0.2);
            color: var(--primary-color);
            padding: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            background-color: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }
        
        .product-card {
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
            background: white;
            border: 1px solid #E9F3E6;
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(42, 125, 79, 0.15);
        }
        
        .product-image-container {
            overflow: hidden;
            height: 280px;
            position: relative;
        }
        
        .product-image {
            transition: transform 0.7s ease;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        
        .product-card:hover .product-image {
            transform: scale(1.1);
        }
        
        .product-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50%;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .product-card:hover .product-overlay {
            opacity: 1;
        }
        
        .price-tag {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .detail-badge {
            background-color: rgba(42, 125, 79, 0.1);
            color: var(--primary-color);
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }
        
        .product-card:hover .detail-badge {
            background-color: var(--primary-color);
            color: white;
        }
        
        .section-title {
            position: relative;
            padding-bottom: 12px;
            margin-bottom: 30px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 60px;
            height: 3px;
            background-color: var(--secondary-color);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .about-section {
            background-color: var(--bg-light);
            border-radius: 16px;
        }
        
        .about-image {
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
        }
        
        .about-image:hover {
            transform: scale(1.03);
            box-shadow: 0 20px 40px rgba(42, 125, 79, 0.2);
        }
        
        .service-card {
            padding: 30px 20px;
            border-radius: 16px;
            transition: all 0.3s ease;
            background: white;
            border: 1px solid #E9F3E6;
            height: 100%;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(42, 125, 79, 0.1);
            border-color: var(--secondary-color);
        }
        
        .service-icon {
            width: 80px;
            height: 80px;
            background-color: rgba(176, 219, 156, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            transition: all 0.3s ease;
        }
        
        .service-card:hover .service-icon {
            background-color: var(--primary-color);
        }
        
        .service-card:hover .service-icon svg {
            color: white !important;
        }
        
        .contact-section {
            background-color: #F1F9ED;
            border-radius: 16px;
        }
        
        .contact-card {
            border-radius: 16px;
            transition: all 0.3s ease;
            background: white;
            height: 100%;
        }
        
        .contact-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(42, 125, 79, 0.1);
        }
        
        .contact-icon {
            width: 60px;
            height: 60px;
            background-color: rgba(176, 219, 156, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            transition: all 0.3s ease;
        }
        
        .contact-card:hover .contact-icon {
            background-color: var(--primary-color);
        }
        
        .contact-card:hover .contact-icon svg {
            color: white !important;
        }
        
        .footer {
            background-color: var(--primary-color);
        }
        
        .footer-link {
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.2s ease;
        }
        
        .footer-link:hover {
            color: white;
            transform: translateX(3px);
        }
        
        .social-icon {
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            transform: translateY(-5px);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 2px solid var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: transparent;
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(42, 125, 79, 0.2);
        }
        
        /* Animation classes */
        .floating {
            animation: floating 3s infinite ease-in-out;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        .fade-in {
            animation: fadeIn 1.5s;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 6px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #1e5d39;
        }
    </style>
</head>
<body>
    <!-- Hero Section with Navbar -->
    <div class="hero-gradient relative min-h-screen">
        <!-- Navigation -->
        <header class="absolute inset-x-0 top-0 z-10 w-full">
            <div class="px-4 mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <div class="flex-shrink-0">
                        <a href="#" class="flex items-center">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1116 0 8 8 0 01-16 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-3 text-xl font-bold text-white">Herbal Alami</span>
                        </a>
                    </div>

                    <div class="hidden lg:flex lg:items-center lg:justify-center lg:space-x-10">
                        <a href="#keunggulan" class="text-base text-white transition-all duration-200 hover:text-opacity-80 nav-link">Keunggulan</a>
                        <a href="#tentang" class="text-base text-white transition-all duration-200 hover:text-opacity-80 nav-link">Tentang Kami</a>
                        <a href="#layanan" class="text-base text-white transition-all duration-200 hover:text-opacity-80 nav-link">Layanan</a>
                        <a href="#produk" class="text-base text-white transition-all duration-200 hover:text-opacity-80 nav-link">Produk</a>
                        <a href="#hubungi" class="text-base text-white transition-all duration-200 hover:text-opacity-80 nav-link">Kontak</a>
                    </div>

                    <button type="button" class="inline-flex p-2 ml-1 text-white transition-all duration-200 rounded-md sm:ml-4 lg:hidden focus:bg-green-800 hover:bg-green-800">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <!-- Hero Content -->
        <section class="relative pt-32 pb-20 sm:pt-40 sm:pb-40">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 relative z-20">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 text-center md:text-left fade-in">
                        <h1 class="hero-title mb-6">
                            Kembali ke Alam dengan Herbal Alami
                        </h1>
                        <p class="mt-5 text-lg text-white opacity-90 mb-8 md:max-w-xl">Dapatkan berbagai pilihan produk herbal terpercaya untuk membantu menjaga kesehatan tubuh secara alami dan aman tanpa efek samping berbahaya.</p>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                            <a href="#produk" class="btn-primary inline-flex items-center justify-center">
                                Lihat Produk
                                <svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                            <a href="#hubungi" class="inline-flex items-center justify-center px-6 py-3 text-base font-medium text-white border-2 border-white rounded-full hover:bg-white hover:text-green-700 transition-all duration-300">
                                Hubungi Kami
                            </a>
                        </div>

                        <div class="grid grid-cols-1 mt-12 text-left gap-x-12 gap-y-8 sm:grid-cols-3 sm:px-0">
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 w-8 h-8 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="ml-3 text-sm text-white">100% Bahan Alami</p>
                            </div>

                            <div class="flex items-center">
                                <svg class="flex-shrink-0 w-8 h-8 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="ml-3 text-sm text-white">Tanpa Efek Samping</p>
                            </div>

                            <div class="flex items-center">
                                <svg class="flex-shrink-0 w-8 h-8 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="ml-3 text-sm text-white">Bersertifikat BPOM</p>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-1/2 mt-10 md:mt-0 fade-in">
                        <img src="{{ asset('images/logooo.png') }}" alt="Herbal Products" class="mx-auto h-85 w-auto max-w-full">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Keunggulan Section -->
    <div id="keunggulan" class="container mx-auto px-6 py-20">
        <h2 class="text-3xl font-bold text-center mb-3 text-gray-800">Mengapa Memilih Kami?</h2>
        <p class="text-center text-gray-600 mb-16 max-w-xl mx-auto">Kami menawarkan produk herbal berkualitas tinggi dengan keunggulan yang membedakan kami dari yang lain</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="feature-card p-8">
                <div class="feature-icon w-20 h-20 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-center text-gray-800">Produk Berkualitas</h3>
                <p class="text-gray-600 text-center">Kami hanya menyediakan obat dan produk kesehatan herbal berkualitas tinggi dengan sertifikasi resmi dari BPOM.</p>
            </div>
            
            <div class="feature-card p-8">
                <div class="feature-icon w-20 h-20 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-center text-gray-800">Layanan 24 Jam</h3>
                <p class="text-gray-600 text-center">Toko herbal kami buka 24 jam untuk memenuhi kebutuhan obat herbal Anda kapanpun dibutuhkan.</p>
            </div>
            
            <div class="feature-card p-8">
                <div class="feature-icon w-20 h-20 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-center text-gray-800">Pengiriman Cepat</h3>
                <p class="text-gray-600 text-center">Layanan antar obat herbal cepat ke lokasi Anda dengan sistem pengiriman yang efisien dan terpercaya.</p>
            </div>
        </div>
    </div>

    <!-- Tentang Kami -->
    <div id="tentang" class="about-section container mx-auto px-6 py-20">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0 md:pr-12">
                <h2 class="text-3xl font-bold mb-6 text-gray-800">Tentang Herbal Alami</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">Herbal Alami didirikan pada tahun 2010 dengan visi menjadi pusat herbal terpercaya yang mengutamakan kesehatan dan kesejahteraan masyarakat Indonesia.</p>
                <p class="text-gray-600 mb-6 leading-relaxed">Kami menyediakan berbagai jenis obat herbal, suplemen alami, rempah-rempah berkhasiat, dan kebutuhan kesehatan lainnya dengan kualitas terjamin dan harga terjangkau.</p>
                <p class="text-gray-600 mb-8 leading-relaxed">Dengan tenaga ahli herbal profesional, kami siap memberikan konsultasi kesehatan dan edukasi penggunaan produk herbal yang tepat untuk masyarakat.</p>
                
                <a href="#hubungi" class="btn-primary inline-flex items-center">
                    Hubungi Kami
                    <svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            <div class="md:w-1/2">
                <div class="relative">
                    <img src="/api/placeholder/600/400" alt="Herbal Alami Store" class="about-image w-full h-auto rounded-lg">
                    <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-lg shadow-lg w-32 h-32 flex items-center justify-center">
                        <div class="text-center">
                            <span class="block text-3xl font-bold text-green-600">15+</span>
                            <span class="text-sm text-gray-600">Tahun Pengalaman</span>
                        </div>
                    </div>
                </div>
            </div>

           

    </div>

                   <div class="container">
        <div class="header">
            <h2 class="text-3xl font-bold mb-6 text-black-800">Alamat Kantor</h2>
        </div>
        
        <div class="office-container">
            <!-- Lombok Barat Office -->
            <div class="office-card">
                <div class="card-header">
                    <h4 class="office-title">Lombok Barat</h4>
                    <div class="office-address">
                        <i class="fas fa-map-marker-alt pin-icon"></i>
                        <span>Jl. Pendidikan</span>
                    </div>
                </div>
                <div class="map-container">
                    <div class="map-overlay"></div>
                    <iframe 
                        class="map-frame"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.019879634783!2d-122.41941568468179!3d37.77492927975856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858064f1bc8cd7%3A0x7a4eab6b5e6f0ba4!2sSan%20Francisco%2C%20CA%2C%20USA!5e0!3m2!1sen!2sid!4v1633203241023!5m2!1sen!2sid"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="card-footer">
                    <div class="contact-info">
                        <i class="fas fa-phone"></i>
                        <span>Hubungi Kami</span>
                    </div>
                    <button class="action-btn">
                        <i class="fas fa-directions"></i>
                        <span>Petunjuk Arah</span>
                    </button>
                </div>
            </div>
            
            <!-- Lombok Tengah Office -->
            <div class="office-card">
                <div class="card-header">
                    <h4 class="office-title">Lombok Tengah</h4>
                    <div class="office-address">
                        <i class="fas fa-map-marker-alt pin-icon"></i>
                        <span>Jl. Pendidikan</span>
                    </div>
                </div>
                <div class="map-container">
                    <div class="map-overlay"></div>
                    <iframe 
                        class="map-frame"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.019879634783!2d-122.41941568468179!3d37.77492927975856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858064f1bc8cd7%3A0x7a4eab6b5e6f0ba4!2sSan%20Francisco%2C%20CA%2C%20USA!5e0!3m2!1sen!2sid!4v1633203241023!5m2!1sen!2sid"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="card-footer">
                    <div class="contact-info">
                        <i class="fas fa-phone"></i>
                        <span>Hubungi Kami</span>
                    </div>
                    <button class="action-btn">
                        <i class="fas fa-directions"></i>
                        <span>Petunjuk Arah</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add click event to direction buttons
            const directionButtons = document.querySelectorAll('.action-btn');
            directionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Get the iframe src from the parent card
                    const mapFrame = this.closest('.office-card').querySelector('.map-frame');
                    const mapSrc = mapFrame.src;
                    
                    // Open Google Maps in a new tab
                    window.open(mapSrc, '_blank');
                });
            });
            
            // Add click event to contact info
            const contactInfos = document.querySelectorAll('.contact-info');
            contactInfos.forEach(info => {
                info.addEventListener('click', function() {
                    alert('Silakan hubungi kami di: 0123-4567-890');
                });
            });
        });
    </script>
        </div>


    <!-- Layanan Kami -->
    <section id="layanan" class="py-20 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="section-title text-3xl font-bold text-center text-gray-800">Layanan Kami</h2>
            <p class="text-center text-gray-600 mb-16 max-w-xl mx-auto">Kami menyediakan berbagai layanan untuk memenuhi kebutuhan kesehatan Anda</p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="service-card">
                    <div class="service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="mt-2 text-xl font-semibold text-center text-gray-800">Konsultasi Herbal</h3>
                    <p class="mt-4 text-gray-600 text-center">Dapatkan konsultasi gratis dengan ahli herbal kami mengenai penggunaan produk, manfaat, dan saran kesehatan alami.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="mt-2 text-xl font-semibold text-center text-gray-800">Program Kesehatan</h3>
                    <p class="mt-4 text-gray-600 text-center">Program berkelanjutan untuk menjaga kesehatan dengan paket herbal yang disesuaikan dengan kebutuhan Anda.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 001 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <h3 class="mt-2 text-xl font-semibold text-center text-gray-800">Pengantaran Produk</h3>
                    <p class="mt-4 text-gray-600 text-center">Layanan antar produk herbal ke rumah Anda tersedia untuk memudahkan Anda mendapatkan obat tanpa harus keluar rumah.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="mt-2 text-xl font-semibold text-center text-gray-800">Jaminan Kualitas</h3>
                    <p class="mt-4 text-gray-600 text-center">Kami menjamin keaslian dan kualitas semua produk herbal dengan sistem penyimpanan yang sesuai standar BPOM.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Produk Section -->
    <div id="produk" class="bg-gray-50 py-20">
    <h2 class="section-title text-3xl font-bold text-center text-gray-800">Produk Kami</h2>

        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($produks as $produk)
                    <div class="product-card">
                        <div class="product-image-container">
                            @if($produk->gambar)
                                <img src="{{ asset('storage/' . $produk->gambar) }}" 
                                     alt="{{ $produk->nama }}" 
                                     class="product-image"
                                     loading="lazy"
                                     onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}'">
                            @else
                                <div class="w-full h-56 bg-gradient-to-r from-blue-100 to-indigo-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="product-overlay"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $produk->nama }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($produk->deskripsi, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <p class="price-tag">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                                <a href="{{ route('produk.detail', $produk->id) }}" class="detail-badge">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Testimonial Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="section-title text-3xl font-bold text-center text-gray-800">Apa Kata Mereka</h2>
            <p class="text-center text-gray-600 mb-16 max-w-xl mx-auto">Pendapat dari pelanggan yang telah merasakan manfaat produk herbal kami</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="text-2xl font-bold text-green-600">S</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-800">Siti Mariana</h4>
                            <p class="text-gray-500 text-sm">Jakarta</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Saya sudah mencoba berbagai produk herbal, tapi produk dari Herbal Alami ini benar-benar berbeda. Kualitasnya terjamin dan hasilnya sangat terasa untuk kesehatan saya."</p>
                    <div class="mt-4 flex">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="text-2xl font-bold text-blue-600">B</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-800">Budi Santoso</h4>
                            <p class="text-gray-500 text-sm">Bandung</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Saya rutin mengkonsumsi suplemen herbal dari sini untuk menjaga stamina. Hasilnya luar biasa, saya jadi lebih berenergi dan jarang sakit. Terima kasih Herbal Alami!"</p>
                    <div class="mt-4 flex">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="text-2xl font-bold text-indigo-600">R</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-800">Ratna Widya</h4>
                            <p class="text-gray-500 text-sm">Surabaya</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Pelayanan konsultasi herbal yang sangat membantu! Mereka memberikan saran yang tepat untuk masalah kesehatan saya. Produknya juga berkualitas tinggi."</p>
                    <div class="mt-4 flex">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <div id="hubungi" class="contact-section container mx-auto px-6 py-20">
        <h2 class="section-title text-3xl font-bold text-center text-gray-800">Hubungi Kami</h2>
        <p class="text-center text-gray-600 mb-16 max-w-xl mx-auto">Kami siap melayani pertanyaan, saran, atau kebutuhan kesehatan Anda. Jangan ragu untuk menghubungi kami.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="contact-card p-8">
                <div class="contact-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-center text-gray-800">Telepon</h3>
                <p class="text-gray-600 text-center">+62 123 4567 890</p>
                <p class="text-gray-600 text-center">+62 098 7654 321</p>
            </div>
            
            <div class="contact-card p-8">
                <div class="contact-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-center text-gray-800">Email</h3>
                <p class="text-gray-600 text-center">info@herbalalami.com</p>
                <p class="text-gray-600 text-center">cs@herbalalami.com</p>
            </div>
            
            <div class="contact-card p-8">
                <div class="contact-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-center text-gray-800">Alamat</h3>
                <p class="text-gray-600 text-center">Jl. Herbal Sejahtera No. 123, Kota Jakarta</p>
                <p class="text-gray-600 text-center">Indonesia 12345</p>
            </div>
        </div>
        
        <!-- Contact Form -->
        <div class="mt-16 bg-white rounded-xl shadow-lg p-8">
            <h3 class="text-2xl font-semibold text-center mb-8 text-gray-800">Kirim Pesan</h3>
            <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors">
                </div>
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                    <input type="text" id="subject" name="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors">
                </div>
                <div class="md:col-span-2">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                    <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors"></textarea>
                </div>
                <div class="md:col-span-2 flex justify-center">
                    <button type="submit" class="btn-primary inline-flex items-center justify-center">
                        Kirim Pesan
                        <svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-y-12 gap-x-12">
                <div>
                    <div class="flex items-center">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1116 0 8 8 0 01-16 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-3 text-xl font-bold text-white">Herbal Alami</span>
                    </div>

                    <p class="mt-4 text-gray-300">Solusi kesehatan alami terbaik untuk menjaga tubuh tetap sehat dan bugar dengan kekuatan herbal berkualitas.</p>
                    
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="social-icon text-white hover:text-green-200">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path>
                            </svg>
                        </a>
                        <a href="#" class="social-icon text-white hover:text-green-200">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z"></path>
                            </svg>
                        </a>
                        <a href="#" class="social-icon text-white hover:text-green-200">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path>
                                <circle cx="16.806" cy="7.207" r="1.078"></circle>
                                <path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path>
                            </svg>
                        </a>
                        <a href="#" class="social-icon text-white hover:text-green-200">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21.593 7.203a2.506 2.506 0 0 0-1.762-1.766C18.265 5.007 12 5 12 5s-6.264-.007-7.831.404a2.56 2.56 0 0 0-1.766 1.778c-.413 1.566-.417 4.814-.417 4.814s-.004 3.264.406 4.814c.23.857.905 1.534 1.763 1.765 1.582.43 7.83.437 7.83.437s6.265.007 7.831-.403a2.515 2.515 0 0 0 1.767-1.763c.414-1.565.417-4.812.417-4.812s.02-3.265-.407-4.831zM9.996 15.005l.005-6 5.207 3.005-5.212 2.995z"></path>
                            </svg>
                        </a>
                    </div>
                </div>

               <div>
    <p class="text-lg font-semibold text-white">Produk Kami</p>

    <ul class="mt-6 space-y-4">
        @foreach ($produks as $produk)
            <li>
                <a href="{{ url('/produk/' . $produk->id) }}" class="footer-link block">
                    {{ $produk->nama }}
                </a>
            </li>
        @endforeach
    </ul>
</div>


                <div>
                    <p class="text-lg font-semibold text-white">Informasi</p>

                    <ul class="mt-6 space-y-4">
                        <li>
                            <a href="#" class="footer-link block">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="#" class="footer-link block">Cara Pemesanan</a>
                        </li>
                        <li>
                            <a href="#" class="footer-link block">FAQ</a>
                        </li>
                        <li>
                            <a href="#" class="footer-link block">Artikel Kesehatan</a>
                        </li>
                        <li>
                            <a href="#" class="footer-link block">Kebijakan Privasi</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="text-lg font-semibold text-white">Jam Operasional</p>
                    
                    <ul class="mt-6 space-y-4">
                        <li class="text-gray-300 flex justify-between">
                            <span>Senin - Jumat:</span>
                            <span>08:00 - 20:00</span>
                        </li>
                        <li class="text-gray-300 flex justify-between">
                            <span>Sabtu:</span>
                            <span>09:00 - 18:00</span>
                        </li>
                        <li class="text-gray-300 flex justify-between">
                            <span>Minggu:</span>
                            <span>10:00 - 16:00</span>
                        </li>
                    </ul>
                    
                    <p class="mt-6 text-lg font-semibold text-white">Newsletter</p>
                    <div class="mt-4 flex">
                        <input type="email" placeholder="Email Anda" class="px-4 py-2 w-full rounded-l-lg focus:outline-none">
                        <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-r-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-green-600">
                <p class="text-center text-gray-300">© 2025 Herbal Alami. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Simple scroll animation
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        window.scrollTo({
                            top: target.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Mobile menu toggle
            const menuButton = document.querySelector('button');
            const mobileMenu = document.createElement('div');
            mobileMenu.classList.add('lg:hidden', 'fixed', 'inset-0', 'bg-green-900', 'bg-opacity-95', 'z-50', 'flex', 'items-center', 'justify-center', 'transform', 'transition-transform', 'duration-300', 'translate-x-full');
            
            const menuItems = `
                <div class="flex flex-col items-center space-y-8">
                    <a href="#" class="text-white text-2xl">Herbal Alami</a>
                    <a href="#keunggulan" class="text-xl text-white hover:text-green-200 transition-colors">Keunggulan</a>
                    <a href="#tentang" class="text-xl text-white hover:text-green-200 transition-colors">Tentang Kami</a>
                    <a href="#layanan" class="text-xl text-white hover:text-green-200 transition-colors">Layanan</a>
                    <a href="#produk" class="text-xl text-white hover:text-green-200 transition-colors">Produk</a>
                    <a href="#hubungi" class="text-xl text-white hover:text-green-200 transition-colors">Kontak</a>
                    <button class="close-menu mt-8 text-white">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            `;
            
            mobileMenu.innerHTML = menuItems;
            document.body.appendChild(mobileMenu);
            
            menuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('translate-x-full');
            });
            
            mobileMenu.querySelector('.close-menu').addEventListener('click', function() {
                mobileMenu.classList.add('translate-x-full');
            });
            
            mobileMenu.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function() {
                    mobileMenu.classList.add('translate-x-full');
                });
            });
        });
    </script>
</body>
</html>