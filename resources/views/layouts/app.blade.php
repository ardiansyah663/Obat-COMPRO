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
<body class="bg-gray-50 min-h-screen">
            @yield('content')

    <div class="container mx-auto px-4 py-8">
    </div>
</body>
</html>
