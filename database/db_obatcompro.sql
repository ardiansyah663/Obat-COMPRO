-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2025 at 04:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_obatcompro`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_05_06_015417_create_produks_table', 1),
(6, '2025_05_06_015427_create_pesanans_table', 1),
(7, '2025_05_15_022422_add_payment_method_and_checkout_url_to_pesanans_table', 1),
(8, '2025_05_15_070806_add_berat_to_produks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint UNSIGNED NOT NULL,
  `produk_id` bigint UNSIGNED NOT NULL,
  `nama_pembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `total_harga` decimal(15,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merchant_ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Alamat pengiriman pelanggan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `produk_id`, `nama_pembeli`, `email_pembeli`, `no_hp`, `jumlah`, `total_harga`, `status`, `reference`, `merchant_ref`, `payment_method`, `checkout_url`, `created_at`, `updated_at`, `alamat`) VALUES
(1, 1, 'bohri rahman', 'asbohrirahman02@gmail.com', '087861608686', 2, 200000.00, 'paid', 'DEV-T40279232181VFPDW', 'INV-1-1747291408', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T40279232181VFPDW', '2025-05-14 22:43:28', '2025-05-20 06:32:39', NULL),
(2, 1, 'bohri rahman', 'asbohrirahman02@gmail.com', '087861608686', 5, 500000.00, 'pending', 'DEV-T40279232183TP7IW', 'INV-2-1747291716', 'MANDIRIVA', 'https://tripay.co.id/checkout/DEV-T40279232183TP7IW', '2025-05-14 22:48:36', '2025-05-14 22:48:37', NULL),
(3, 1, 'bohri rahman', 'asbohrirahman02@gmail.com', '087861608686', 5, 500000.00, 'pending', 'DEV-T40279232184BOBCK', 'INV-3-1747291718', 'MANDIRIVA', 'https://tripay.co.id/checkout/DEV-T40279232184BOBCK', '2025-05-14 22:48:38', '2025-05-14 22:48:39', NULL),
(4, 1, 'sob', 'sahru@gmail.com', '098765432', 5, 500000.00, 'pending', 'DEV-T40279232190R6OTN', 'INV-4-1747293347', 'MANDIRIVA', 'https://tripay.co.id/checkout/DEV-T40279232190R6OTN', '2025-05-14 23:15:47', '2025-05-14 23:15:48', NULL),
(5, 1, 'ardi', 'diansiahaan663@gmail.com', '098765432', 3, 750000.00, 'pending', NULL, NULL, NULL, NULL, '2025-05-14 23:18:43', '2025-05-14 23:18:43', NULL),
(6, 1, 'asss', 'diansiahaan663@gmail.com', '087861608686', 3, 750000.00, 'pending', 'DEV-T40279232191ZYMIW', 'INV-6-1747293638', 'MANDIRIVA', 'https://tripay.co.id/checkout/DEV-T40279232191ZYMIW', '2025-05-14 23:20:38', '2025-05-14 23:20:39', NULL),
(7, 1, 'asss', 'diansiahaan663@gmail.com', '087861608686', 3, 750000.00, 'pending', 'DEV-T402792321926VLYN', 'INV-7-1747293782', 'MANDIRIVA', 'https://tripay.co.id/checkout/DEV-T402792321926VLYN', '2025-05-14 23:23:02', '2025-05-14 23:23:02', NULL),
(8, 1, 'asss', 'diansiahaan663@gmail.com', '087861608686', 1, 250000.00, 'pending', 'DEV-T402792326361VCFN', 'INV-8-1747448403', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T402792326361VCFN', '2025-05-16 18:20:03', '2025-05-16 18:20:04', NULL),
(9, 1, 'bohri rahman', 'asbohrirahman02@gmail.com', '087861608686', 1, 250000.00, 'paid', 'DEV-T40279233976OTZAU', 'INV-9-1747749805', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T40279233976OTZAU', '2025-05-20 06:03:25', '2025-05-20 06:35:24', NULL),
(10, 1, 'tes', 'tes@gmail.com', '00987654321', 1, 250000.00, 'paid', 'DEV-T40279233989LHIOX', 'INV-10-1747751632', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T40279233989LHIOX', '2025-05-20 06:33:52', '2025-05-20 06:35:20', NULL),
(11, 1, 'tes2', 'tes@gmail.com', '00987654321', 1, 250000.00, 'pending', 'DEV-T4027923399215F5L', 'INV-11-1747752993', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T4027923399215F5L', '2025-05-20 06:56:33', '2025-05-20 06:56:34', NULL),
(12, 1, 'tes2', 'tes@gmail.com', '00987654321', 1, 250000.00, 'pending', 'DEV-T402792339942L1L1', 'INV-12-1747753283', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T402792339942L1L1', '2025-05-20 07:01:23', '2025-05-20 07:01:24', NULL),
(13, 1, 'tes2', 'tes@gmail.com', '00987654321', 1, 250000.00, 'paid', 'DEV-T40279233995DIC3U', 'INV-13-1747753421', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T40279233995DIC3U', '2025-05-20 07:03:41', '2025-05-20 07:05:13', 'qewzredtxcfyvgubhnj'),
(14, 1, 'TES LAGI', 'tes@gmail.com', '00987654321', 1, 150000.00, 'pending', 'DEV-T40279234000PDBKN', 'INV-14-1747754565', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T40279234000PDBKN', '2025-05-20 07:22:45', '2025-05-20 07:22:45', 'Gerung'),
(15, 1, 'TES LAGI', 'tes@gmail.com', '00987654321', 1, 150000.00, 'pending', 'DEV-T40279234001K9KU3', 'INV-15-1747754708', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T40279234001K9KU3', '2025-05-20 07:25:08', '2025-05-20 07:25:09', 'Gerung'),
(16, 2, 'TES LAGI', 'tes@gmail.com', '00987654321', 1, 5500000.00, 'pending', NULL, NULL, NULL, NULL, '2025-05-20 07:25:58', '2025-05-20 07:25:58', 'gerung'),
(17, 2, 'tes2', 'tes@gmail.com', '00987654321', 1, 5500000.00, 'pending', NULL, NULL, NULL, NULL, '2025-05-20 07:28:38', '2025-05-20 07:28:38', 'swgnlsl'),
(18, 2, 'tes2', 'tes@gmail.com', '00987654321', 1, 3000000.00, 'pending', 'DEV-T40279234002W9CAE', 'INV-18-1747755000', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T40279234002W9CAE', '2025-05-20 07:30:00', '2025-05-20 07:30:01', 'erxtcyvgbhj'),
(19, 2, 'tes2', 'tes@gmail.com', '00987654321', 1, 3000000.00, 'pending', 'DEV-T40279234003P8MUS', 'INV-19-1747755083', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T40279234003P8MUS', '2025-05-20 07:31:23', '2025-05-20 07:31:24', 'erxtcyvgbhj'),
(20, 2, 'tes2', 'tes@gmail.com', '00987654321', 1, 500000.00, 'pending', 'DEV-T40279234004JCXEC', 'INV-20-1747755168', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T40279234004JCXEC', '2025-05-20 07:32:47', '2025-05-20 07:32:48', 'erxtcyvgbhj'),
(21, 2, 'tes2', 'tes@gmail.com', '00987654321', 1, 505000.00, 'pending', 'DEV-T4027923400516XWR', 'INV-21-1747755250', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T4027923400516XWR', '2025-05-20 07:34:10', '2025-05-20 07:34:11', 'erxtcyvgbhj'),
(22, 2, 'rangga', 'tes@gmail.com', '00987654321', 4, 2020000.00, 'pending', 'DEV-T40279234006A2VJO', 'INV-22-1747755431', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T40279234006A2VJO', '2025-05-20 07:37:11', '2025-05-20 07:37:12', 'gerung'),
(23, 2, 'rangga', 'tes@gmail.com', '00987654321', 4, 2020000.00, 'pending', NULL, NULL, NULL, NULL, '2025-05-20 07:37:55', '2025-05-20 07:37:55', 'gerung'),
(24, 2, 'rangga', 'tes@gmail.com', '00987654321', 4, 2020000.00, 'pending', 'DEV-T40279234008QZ3OF', 'INV-24-1747755568', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T40279234008QZ3OF', '2025-05-20 07:39:28', '2025-05-20 07:39:29', 'gerung'),
(25, 2, 'rangga', 'tes@gmail.com', '00987654321', 4, 2020000.00, 'pending', NULL, NULL, NULL, NULL, '2025-05-20 07:44:34', '2025-05-20 07:44:34', 'gerung'),
(26, 2, 'rangga', 'tes@gmail.com', '00987654321', 4, 2020000.00, 'pending', NULL, NULL, NULL, NULL, '2025-05-20 07:47:07', '2025-05-20 07:47:07', 'gerung'),
(27, 2, 'rangga', 'tes@gmail.com', '00987654321', 4, 2020000.00, 'paid', 'DEV-T40279234010HOYEI', 'INV-27-1747756172', 'QRIS2', 'https://tripay.co.id/checkout/DEV-T40279234010HOYEI', '2025-05-20 07:49:32', '2025-05-20 07:51:06', 'gerung');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` decimal(15,2) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `berat` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama`, `deskripsi`, `harga`, `gambar`, `created_at`, `updated_at`, `berat`) VALUES
(1, 'TESOBAT', 'OBATKUAT', 100000.00, 'products/01JV9AWBY430KBCV52B3MD91RV.jpg', '2025-05-14 22:41:25', '2025-05-14 23:14:47', 5),
(2, 'Garvita', 'Garvita Obat Gacor', 500000.00, 'products/01JVQ4ARSCCP936G5PE8ZXYBZ4.jpg', '2025-05-20 07:17:26', '2025-05-20 07:24:56', 500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$S4F.YT.ocBoQVgT2Be725OGdv.y0Ka1UzoDe8IYw8dbtOruoqldOS', 'NhekPf6cBhYoyoCESwwSMmo40CC0KtoVgKWY9XExW6TDVnG3GSfLGglNPH5x', '2025-05-05 17:52:58', '2025-05-05 17:52:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanans_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
