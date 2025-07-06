# 🌿 Obat Compro — Herbal Medicine Store & Company Profile

<div align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Filament-FDAE4B?style=for-the-badge&logo=filament&logoColor=white" alt="Filament">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Tripay-4F46E5?style=for-the-badge&logo=stripe&logoColor=white" alt="Tripay">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</div>

<div align="center">
  <h3>🌱 Natural Healing Through Digital Innovation</h3>
  <p><em>Your trusted partner in herbal medicine solutions with seamless online shopping experience</em></p>
</div>

---

## 🌟 About

**Obat Compro** is a comprehensive digital platform that combines a professional company profile with a full-featured herbal medicine e-commerce store. Built with modern web technologies, this platform empowers traditional herbal medicine businesses to reach customers digitally while maintaining trust and authenticity.

## ✨ Core Features

### 🏢 **Company Profile**
- **📖 Brand Story** — Showcase your heritage, mission, and herbal medicine philosophy
- **👥 Team & Expertise** — Highlight your medical professionals and traditional healers
- **🏆 Certifications** — Display quality certifications and health department approvals
- **📞 Contact & Location** — Multiple contact channels and store locations

### 🛒 **E-Commerce Store**
- **💊 Product Catalog** — Comprehensive herbal medicine inventory with detailed descriptions
- **🔍 Advanced Search** — Filter by condition, ingredients, price, and category
- **🛍️ Shopping Cart** — Intuitive cart management with quantity controls
- **📝 Product Reviews** — Customer testimonials and product ratings
- **📋 Prescription Upload** — Secure prescription handling for regulated products

### 💳 **Payment & Transactions**
- **🔒 Tripay Integration** — Secure payment gateway with multiple methods
- **💰 Payment Options** — Bank transfer, e-wallet, retail outlets, and credit cards
- **📊 Order Tracking** — Real-time order status and delivery updates
- **🧾 Invoice System** — Automated invoice generation and tax handling

### 🎯 **Health & Wellness**
- **📚 Health Articles** — Educational content about herbal medicine benefits
- **💡 Product Recommendations** — AI-powered suggestions based on symptoms
- **📞 Consultation Booking** — Schedule appointments with herbal medicine experts
- **🔔 Health Reminders** — Medication schedules and health tips

### 🔧 **Administration**
- **📊 Filament Dashboard** — Comprehensive admin panel for all operations
- **📈 Sales Analytics** — Revenue tracking and customer behavior insights
- **📦 Inventory Management** — Stock levels, expiry dates, and reorder alerts
- **👥 Customer Management** — Customer profiles, order history, and communication
- **🎨 Content Management** — Easy website content updates and SEO optimization

---

## 🚀 Technology Stack

| Technology | Purpose | Version |
|------------|---------|---------|
| **Laravel** | Backend Framework | 10.x |
| **Filament** | Admin Panel | 3.x |
| **Tailwind CSS** | UI Framework | 3.x |
| **Tripay** | Payment Gateway | Latest API |
| **MySQL** | Database | 8.x |
| **PHP** | Server Language | 8.1+ |

---

## 🔧 Installation & Setup

### 📋 Prerequisites

- **PHP** >= 8.1 with extensions: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML
- **Composer** (latest version)
- **Node.js** & **npm** (latest LTS)
- **MySQL** 8.x or compatible database
- **Git** for version control

### 🚀 Getting Started

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-username/obat-compro.git
   cd obat-compro
   ```

2. **Install Dependencies**
   ```bash
   # Install PHP dependencies
   composer install
   
   # Install Node.js dependencies
   npm install
   ```

3. **Environment Setup**
   ```bash
   # Create environment file
   cp .env.example .env
   
   # Generate application key
   php artisan key:generate
   ```

4. **Database Configuration**
   ```bash
   # Update your .env file with database credentials
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=obat_compro
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Tripay Configuration**
   ```bash
   # Add to your .env file
   TRIPAY_MERCHANT_CODE=your_merchant_code
   TRIPAY_API_KEY=your_api_key
   TRIPAY_PRIVATE_KEY=your_private_key
   TRIPAY_MODE=sandbox # Change to 'production' for live
   ```

6. **Storage Setup**
   ```bash
   # Create storage link for file uploads
   php artisan storage:link
   
   # Set proper permissions
   chmod -R 755 storage bootstrap/cache
   ```

7. **Database Migration & Seeding**
   ```bash
   # Run migrations and seed sample data
   php artisan migrate --seed
   ```

8. **Build Assets**
   ```bash
   # Build frontend assets
   npm run build
   
   # For development
   npm run dev
   ```

9. **Launch Application**
   ```bash
   # Start the development server
   php artisan serve
   ```

🎉 **Success!** Your herbal medicine store is now running at `http://localhost:8000`

---

## 🔑 Admin Access

Access the powerful Filament admin panel at:
```
http://localhost:8000/admin
```

**Default Admin Credentials** (if seeded):
- **Email:** `admin@obatcompro.com`
- **Password:** `password`

> 🔐 **Security Note:** Change default credentials immediately in production!

---

## 💳 Tripay Payment Setup

### 1. **Create Tripay Account**
- Visit [Tripay Dashboard](https://tripay.co.id)
- Register for merchant account
- Complete verification process

### 2. **Get API Credentials**
- **Merchant Code:** Your unique merchant identifier
- **API Key:** For API authentication
- **Private Key:** For webhook signature validation

### 3. **Configure Webhooks**
- Set webhook URL: `https://yourdomain.com/tripay/webhook`
- Enable payment notifications
- Test in sandbox mode first

### 4. **Supported Payment Methods**
- **Bank Transfer:** BCA, Mandiri, BRI, BNI, Permata
- **E-Wallet:** OVO, GoPay, Dana, LinkAja, ShopeePay
- **Retail:** Alfamart, Indomaret
- **Credit Card:** Visa, Mastercard, JCB

---

## 📁 Project Structure

```
obat-compro/
├── app/
│   ├── Filament/           # Admin panel resources
│   │   ├── Resources/      # CRUD resources
│   │   ├── Pages/          # Custom admin pages
│   │   └── Widgets/        # Dashboard widgets
│   ├── Http/
│   │   ├── Controllers/    # Application controllers
│   │   └── Middleware/     # Custom middleware
│   ├── Models/             # Eloquent models
│   └── Services/           # Business logic services
├── database/
│   ├── migrations/         # Database schema
│   ├── seeders/            # Sample data
│   └── factories/          # Model factories
├── resources/
│   ├── views/              # Blade templates
│   ├── js/                 # JavaScript assets
│   └── css/                # CSS assets
├── routes/                 # Route definitions
└── public/                 # Public assets
```

---

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run feature tests
php artisan test --filter Feature

# Run unit tests
php artisan test --filter Unit

# Test payment integration
php artisan test --filter Payment
```

---

## 🚀 Deployment

### 📦 **Production Checklist**

- [ ] Set `APP_ENV=production` in `.env`
- [ ] Configure production database
- [ ] Set up Tripay production credentials
- [ ] Configure SSL certificate
- [ ] Set up proper file permissions
- [ ] Configure web server (Apache/Nginx)
- [ ] Set up cron jobs for Laravel scheduler
- [ ] Configure backup strategy
- [ ] Set up monitoring and logging

### 🔧 **Optimization Commands**

```bash
# Optimize for production
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Clear caches during development
php artisan optimize:clear
```

---

## 🤝 Contributing

We welcome contributions to improve **Obat Compro**! Here's how you can help:

### 🔄 Development Workflow

1. **Fork** the repository
2. **Create** a feature branch (`git checkout -b feature/amazing-feature`)
3. **Commit** your changes (`git commit -m 'Add amazing feature'`)
4. **Push** to the branch (`git push origin feature/amazing-feature`)
5. **Open** a Pull Request

### 📝 Contribution Guidelines

- Follow PSR-12 coding standards
- Write comprehensive tests for new features
- Update documentation as needed
- Ensure payment integration security
- Respect medical regulations and compliance

---

## 🐛 Support & Issues

Need help? Found a bug? We're here to help!

- **🐛 Bug Reports:** [Create an Issue](https://github.com/your-username/obat-compro/issues)
- **💡 Feature Requests:** [Start a Discussion](https://github.com/your-username/obat-compro/discussions)
- **📚 Documentation:** [Visit Wiki](https://github.com/your-username/obat-compro/wiki)

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

---

## 👥 Team & Contact

<div align="center">

### 📞 Get in Touch

| Platform | Link |
|----------|------|
| 🌐 **Website** | [obatcompro.com](https://obatcompro.com) |
| 📧 **Email** | info@obatcompro.com |
| 📱 **WhatsApp** | +62 XXX-XXXX-XXXX |
| 🐙 **GitHub** | [@your-username](https://github.com/your-username) |

### 🏥 **Medical Disclaimer**

*This platform is designed for informational purposes. Always consult with qualified healthcare professionals before using herbal medicines. Individual results may vary.*

</div>

---

<div align="center">
  <h3>🌿 "Bridging Traditional Wisdom with Modern Technology"</h3>
  <p><em>Made with ❤️ for the herbal medicine community</em></p>
  
  <img src="https://img.shields.io/github/stars/your-username/obat-compro?style=social" alt="GitHub stars">
  <img src="https://img.shields.io/github/forks/your-username/obat-compro?style=social" alt="GitHub forks">
  <img src="https://img.shields.io/github/issues/your-username/obat-compro" alt="GitHub issues">
</div>

---

## 🔮 What's Next?

### 🚀 **Upcoming Features**
- **🤖 AI Symptom Checker** — Smart health recommendations
- **📱 Mobile App** — Native iOS and Android applications
- **🌍 Multi-language Support** — Serve diverse communities
- **💊 Subscription Service** — Regular medicine delivery
- **🔬 Lab Integration** — Direct lab test ordering

### 💡 **Pro Tips**
- Regularly update your herbal medicine inventory
- Keep customer testimonials and reviews updated
- Ensure compliance with local health regulations
- Monitor payment gateway performance
- Backup your database regularly

> 🌱 **Remember:** Trust is the foundation of herbal medicine business. Always prioritize customer safety and product quality!