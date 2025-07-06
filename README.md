# 🌿 Obat Compro — Toko Obat Herbal & Company Profile

<div align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Filament-FDAE4B?style=for-the-badge&logo=filament&logoColor=white" alt="Filament">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Tripay-4F46E5?style=for-the-badge&logo=stripe&logoColor=white" alt="Tripay">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</div>

<div align="center">
  <h3>🌱 Penyembuhan Alami Melalui Inovasi Digital</h3>
  <p><em>Mitra terpercaya untuk solusi obat herbal dengan pengalaman berbelanja online yang mudah</em></p>
</div>

---

## 🌟 Tentang Kami

**Obat Compro** adalah platform digital komprehensif yang menggabungkan company profile profesional dengan toko obat herbal e-commerce berfitur lengkap. Dibangun dengan teknologi web modern, platform ini memberdayakan bisnis obat herbal tradisional untuk menjangkau pelanggan secara digital sambil mempertahankan kepercayaan dan keaslian.

## ✨ Fitur Utama

### 🏢 **Company Profile**
- **📖 Cerita Brand** — Tampilkan warisan, misi, dan filosofi obat herbal Anda
- **👥 Tim & Keahlian** — Tonjolkan profesional medis dan tabib tradisional Anda
- **🏆 Sertifikasi** — Tampilkan sertifikasi kualitas dan persetujuan dinas kesehatan
- **📞 Kontak & Lokasi** — Berbagai saluran kontak dan lokasi toko

### 🛒 **Toko E-Commerce**
- **💊 Katalog Produk** — Inventori obat herbal lengkap dengan deskripsi detail
- **🔍 Pencarian Lanjutan** — Filter berdasarkan kondisi, bahan, harga, dan kategori
- **🛍️ Keranjang Belanja** — Manajemen keranjang intuitif dengan kontrol jumlah
- **📝 Ulasan Produk** — Testimoni pelanggan dan rating produk
- **📋 Upload Resep** — Penanganan resep aman untuk produk yang diatur

### 💳 **Pembayaran & Transaksi**
- **🔒 Integrasi Tripay** — Gateway pembayaran aman dengan berbagai metode
- **💰 Opsi Pembayaran** — Transfer bank, e-wallet, outlet retail, dan kartu kredit
- **📊 Pelacakan Pesanan** — Status pesanan real-time dan update pengiriman
- **🧾 Sistem Invoice** — Pembuatan invoice otomatis dan penanganan pajak

### 🎯 **Kesehatan & Wellness**
- **📚 Artikel Kesehatan** — Konten edukasi tentang manfaat obat herbal
- **💡 Rekomendasi Produk** — Saran berbasis AI berdasarkan gejala
- **📞 Booking Konsultasi** — Jadwalkan janji dengan ahli obat herbal
- **🔔 Pengingat Kesehatan** — Jadwal obat dan tips kesehatan

### 🔧 **Administrasi**
- **📊 Dashboard Filament** — Panel admin komprehensif untuk semua operasi
- **📈 Analitik Penjualan** — Pelacakan pendapatan dan insight perilaku pelanggan
- **📦 Manajemen Inventori** — Level stok, tanggal kadaluarsa, dan alert reorder
- **👥 Manajemen Pelanggan** — Profil pelanggan, riwayat pesanan, dan komunikasi
- **🎨 Manajemen Konten** — Update konten website mudah dan optimasi SEO

---

## 🚀 Tech Stack

| Teknologi | Fungsi | Versi |
|-----------|--------|-------|
| **Laravel** | Framework Backend | 10.x |
| **Filament** | Panel Admin | 3.x |
| **Tailwind CSS** | Framework UI | 3.x |
| **Tripay** | Gateway Pembayaran | Latest API |
| **MySQL** | Database | 8.x |
| **PHP** | Bahasa Server | 8.1+ |

---

## 🔧 Instalasi & Setup

### 📋 Prasyarat

- **PHP** >= 8.1 dengan ekstensi: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML
- **Composer** (versi terbaru)
- **Node.js** & **npm** (latest LTS)
- **MySQL** 8.x atau database kompatibel
- **Git** untuk version control

### 🚀 Memulai

1. **Clone Repository**
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

3. **Setup Environment**
   ```bash
   # Buat file environment
   cp .env.example .env
   
   # Generate application key
   php artisan key:generate
   ```

4. **Konfigurasi Database**
   ```bash
   # Update file .env Anda dengan kredensial database
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=obat_compro
   DB_USERNAME=username_anda
   DB_PASSWORD=password_anda
   ```

5. **Konfigurasi Tripay**
   ```bash
   # Tambahkan ke file .env Anda
   TRIPAY_MERCHANT_CODE=merchant_code_anda
   TRIPAY_API_KEY=api_key_anda
   TRIPAY_PRIVATE_KEY=private_key_anda
   TRIPAY_MODE=sandbox # Ubah ke 'production' untuk live
   ```

6. **Setup Storage**
   ```bash
   # Buat link storage untuk upload file
   php artisan storage:link
   
   # Set permission yang benar
   chmod -R 755 storage bootstrap/cache
   ```

7. **Migrasi Database & Seeding**
   ```bash
   # Jalankan migrasi dan seed data contoh
   php artisan migrate --seed
   ```

8. **Build Assets**
   ```bash
   # Build frontend assets
   npm run build
   
   # Untuk development
   npm run dev
   ```

9. **Jalankan Aplikasi**
   ```bash
   # Start development server
   php artisan serve
   ```

🎉 **Berhasil!** Toko obat herbal Anda sekarang berjalan di `http://localhost:8000`

---

## 🔑 Akses Admin

Akses panel admin Filament yang powerful di:
```
http://localhost:8000/admin
```

**Kredensial Admin Default** (jika sudah seeding):
- **Email:** `admin@gmail.com`
- **Password:** `admin123`

> 🔐 **Catatan Keamanan:** Segera ubah kredensial default di production!

---

## 💳 Setup Pembayaran Tripay

### 1. **Buat Akun Tripay**
- Kunjungi [Tripay Dashboard](https://tripay.co.id)
- Daftar untuk akun merchant
- Lengkapi proses verifikasi

### 2. **Dapatkan Kredensial API**
- **Merchant Code:** Identifier merchant unik Anda
- **API Key:** Untuk autentikasi API
- **Private Key:** Untuk validasi signature webhook

### 3. **Konfigurasi Webhooks**
- Set webhook URL: `https://domain-anda.com/tripay/webhook`
- Aktifkan notifikasi pembayaran
- Test di sandbox mode dulu

### 4. **Metode Pembayaran yang Didukung**
- **Transfer Bank:** BCA, Mandiri, BRI, BNI, Permata
- **E-Wallet:** OVO, GoPay, Dana, LinkAja, ShopeePay
- **Retail:** Alfamart, Indomaret
- **Kartu Kredit:** Visa, Mastercard, JCB

---

## 📁 Struktur Project

```
obat-compro/
├── app/
│   ├── Filament/           # Resource panel admin
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
# Jalankan semua test
php artisan test

# Jalankan feature test
php artisan test --filter Feature

# Jalankan unit test
php artisan test --filter Unit

# Test integrasi pembayaran
php artisan test --filter Payment
```

---

## 🚀 Deployment

### 📦 **Checklist Production**

- [ ] Set `APP_ENV=production` di `.env`
- [ ] Konfigurasi production database
- [ ] Setup kredensial Tripay production
- [ ] Konfigurasi SSL certificate
- [ ] Setup file permissions yang benar
- [ ] Konfigurasi web server (Apache/Nginx)
- [ ] Setup cron jobs untuk Laravel scheduler
- [ ] Konfigurasi strategi backup
- [ ] Setup monitoring dan logging

### 🔧 **Perintah Optimasi**

```bash
# Optimasi untuk production
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Clear cache saat development
php artisan optimize:clear
```

---

## 🤝 Kontribusi

Kami menyambut kontribusi untuk meningkatkan **Obat Compro**! Begini cara Anda bisa membantu:

### 🔄 Alur Development

1. **Fork** repository
2. **Buat** feature branch (`git checkout -b feature/fitur-amazing`)
3. **Commit** perubahan Anda (`git commit -m 'Tambah fitur amazing'`)
4. **Push** ke branch (`git push origin feature/fitur-amazing`)
5. **Buat** Pull Request

### 📝 Panduan Kontribusi

- Ikuti standar coding PSR-12
- Tulis test komprehensif untuk fitur baru
- Update dokumentasi sesuai kebutuhan
- Pastikan keamanan integrasi pembayaran
- Hormati regulasi medis dan compliance

---

## 🐛 Support & Issues

Butuh bantuan? Menemukan bug? Kami siap membantu!

- **🐛 Bug Reports:** [Buat Issue](https://github.com/your-username/obat-compro/issues)
- **💡 Feature Requests:** [Mulai Diskusi](https://github.com/your-username/obat-compro/discussions)
- **📚 Dokumentasi:** [Kunjungi Wiki](https://github.com/your-username/obat-compro/wiki)

---

## 📄 License

Project ini open-source dan tersedia di bawah [MIT License](LICENSE).

---

## 👥 Tim & Kontak

<div align="center">

### 📞 Hubungi Kami

| Platform | Link |
|----------|------|
| 🌐 **Website** | [obatcompro.com](https://obatcompro.com) |
| 📧 **Email** | info@obatcompro.com |
| 📱 **WhatsApp** | +62 XXX-XXXX-XXXX |
| 🐙 **GitHub** | [@your-username](https://github.com/your-username) |

### 🏥 **Disclaimer Medis**

*Platform ini dirancang untuk tujuan informasi. Selalu konsultasikan dengan profesional kesehatan yang berkualitas sebelum menggunakan obat herbal. Hasil individual dapat bervariasi.*

</div>

---

<div align="center">
  <h3>🌿 "Menjembatani Kebijaksanaan Tradisional dengan Teknologi Modern"</h3>
  <p><em>Dibuat dengan ❤️ untuk komunitas obat herbal</em></p>
  
  <img src="https://img.shields.io/github/stars/your-username/obat-compro?style=social" alt="GitHub stars">
  <img src="https://img.shields.io/github/forks/your-username/obat-compro?style=social" alt="GitHub forks">
  <img src="https://img.shields.io/github/issues/your-username/obat-compro" alt="GitHub issues">
</div>

---

## 🔮 Apa Selanjutnya?

### 🚀 **Fitur Mendatang**
- **🤖 AI Symptom Checker** — Rekomendasi kesehatan pintar
- **📱 Mobile App** — Aplikasi native iOS dan Android
- **🌍 Multi-language Support** — Melayani komunitas beragam
- **💊 Layanan Subscription** — Pengiriman obat reguler
- **🔬 Integrasi Lab** — Pemesanan tes lab langsung

### 💡 **Tips Pro**
- Rutin update inventori obat herbal Anda
- Jaga testimoni dan review pelanggan tetap terkini
- Pastikan compliance dengan regulasi kesehatan lokal
- Monitor performa gateway pembayaran
- Backup database secara berkala

> 🌱 **Ingat:** Kepercayaan adalah fondasi bisnis obat herbal. Selalu prioritaskan keamanan pelanggan dan kualitas produk!
