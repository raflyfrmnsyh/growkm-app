-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2025 pada 14.48
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_growkm`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchAndFilterProductsWithFallback` (IN `searchTerm` VARCHAR(255), IN `categoryTerm` VARCHAR(255))  BEGIN
    -- Pastikan collation input disesuaikan dengan kolom di tabel (misalnya: utf8mb4_unicode_ci)
    IF EXISTS (
        SELECT 1
        FROM products
        WHERE (product_name COLLATE utf8mb4_unicode_ci LIKE CONCAT('%', searchTerm COLLATE utf8mb4_unicode_ci, '%') OR searchTerm = '')
          AND (product_category COLLATE utf8mb4_unicode_ci LIKE CONCAT('%', categoryTerm COLLATE utf8mb4_unicode_ci, '%') OR categoryTerm = '')
    ) THEN
        SELECT product_id,
               product_name,
               product_category,
               product_price,
               product_stock,
               product_min_order
        FROM products
        WHERE (product_name COLLATE utf8mb4_unicode_ci LIKE CONCAT('%', searchTerm COLLATE utf8mb4_unicode_ci, '%') OR searchTerm = '')
          AND (product_category COLLATE utf8mb4_unicode_ci LIKE CONCAT('%', categoryTerm COLLATE utf8mb4_unicode_ci, '%') OR categoryTerm = '');
    ELSE
        SELECT NULL AS product_id,
               NULL AS product_name,
               NULL AS product_category,
               NULL AS product_price,
               NULL AS product_stock,
               NULL AS product_min_order
        LIMIT 1;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_gender` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `event_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_is_paid` enum('Berbayar','Gratis') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Gratis',
  `event_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `event_quota` int(11) NOT NULL DEFAULT 0,
  `event_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Open Regist',
  `event_banner_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_date` date NOT NULL,
  `event_start_time` time NOT NULL,
  `event_end_time` time NOT NULL,
  `event_registration_deadline` datetime DEFAULT NULL,
  `event_speaker_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_speaker_job` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_description`, `event_type`, `event_location`, `event_tags`, `event_is_paid`, `event_price`, `event_quota`, `event_status`, `event_banner_img`, `event_date`, `event_start_time`, `event_end_time`, `event_registration_deadline`, `event_speaker_name`, `event_speaker_job`, `created_at`, `updated_at`) VALUES
('E00001', 'Forum UMKM Nasional 2025', 'Event ini bertujuan untuk memberdayakan pelaku UMKM melalui pelatihan bisnis, digital marketing, dan strategi pertumbuhan usaha.', 'Seminar & Pelatihan', 'Balai Kartini, Jakarta', 'UMKM,bisnis,marketing,pemberdayaan', 'Gratis', '0.00', 300, 'Open Regist', 'https://source.unsplash.com/800x400/?small-business,marketing', '2025-08-10', '09:00:00', '16:00:00', '2025-08-07 23:59:00', 'Yuli Rahmawati', 'CEO UMKM Naik Kelas Foundation', '2025-06-21 10:33:45', '2025-06-21 10:33:45'),
('E00002', 'Digital Marketing Bootcamp untuk UMKM', 'Pelatihan intensif 2 hari untuk UMKM belajar strategi digital marketing dari nol hingga mahir.', 'Online', 'Hotel Horison, Bandung', NULL, 'Berbayar', '150000.00', 100, 'Open Regist', 'https://images.unsplash.com/photo-1558008258-3256797b43f3?q=80&w=1631&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-07-15', '08:00:00', '17:00:00', '2025-07-12 23:59:00', 'Ari Firmansyah', 'Digital Strategist', '2025-06-21 10:33:45', '2025-06-21 03:40:39'),
('E00003', 'Strategi Branding UMKM di Era Digital', 'Pelatihan singkat bagi UMKM untuk membangun merek yang kuat dan berdaya saing secara online.', 'Webinar', 'Online (Zoom)', 'branding,umkm,strategi,online', 'Gratis', '0.00', 500, 'Open Regist', 'https://source.unsplash.com/800x400/?branding,business', '2025-06-25', '10:00:00', '12:00:00', '2025-06-23 23:59:00', 'Intan Pradipta', 'Founder LocalBoost.ID', '2025-06-21 10:33:45', '2025-06-21 10:33:45'),
('E00004', 'UMKM Naik Kelas Expo 2025', 'Pameran dan seminar edukatif untuk mempertemukan pelaku UMKM dengan investor dan pembeli potensial.', 'Expo & Talkshow', 'ICE BSD, Tangerang', 'expo,umkm,pameran,investasi', 'Gratis', '0.00', 1000, 'Open Regist', 'https://source.unsplash.com/800x400/?expo,entrepreneur', '2025-09-05', '09:00:00', '17:00:00', '2025-09-02 23:59:00', 'Bambang Sutrisno', 'Ketua Asosiasi UMKM Digital', '2025-06-21 10:33:45', '2025-06-21 10:33:45'),
('E00005', 'Smart Business Planning for UMKM', 'Workshop tentang cara menyusun perencanaan bisnis dan keuangan yang tepat untuk pelaku UMKM.', 'Online', 'Universitas Gadjah Mada, Yogyakarta', NULL, 'Berbayar', '100000.00', 4, 'Open Regist', 'https://source.unsplash.com/800x400/?business-plan,workshop', '2025-10-12', '13:00:00', '17:00:00', '2025-10-10 23:59:00', 'Dr. Sinta Lestari', 'Dosen Kewirausahaan FEB UGM', '2025-06-21 10:33:45', '2025-06-21 03:44:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_categories`
--

CREATE TABLE `event_categories` (
  `event_category_id` bigint(20) UNSIGNED NOT NULL,
  `event_category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2025_06_04_063515_create_events_table', 1),
(3, '2025_06_04_065031_create_products_table', 1),
(4, '2025_06_04_065041_create_transactions_table', 1),
(5, '2025_06_04_065049_create_settings_table', 1),
(6, '2025_06_04_081446_create_cache_table', 1),
(7, '2025_06_15_053545_create_participant_regists_table', 1),
(8, '2025_06_15_150423_create_admins._table', 1),
(9, '2025_06_18_033753_create_event_and_product_triggers', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `quantity`, `price`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 'TRX000001', 'P00001', 1, '35000.00', '35000.00', '2025-06-21 05:33:27', '2025-06-21 05:33:27');

--
-- Trigger `orders`
--
DELIMITER $$
CREATE TRIGGER `trg_reduce_product_stock` AFTER INSERT ON `orders` FOR EACH ROW BEGIN
            UPDATE products
            SET product_stock = product_stock - NEW.quantity
            WHERE product_id = NEW.product_id;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_restore_product_stock` AFTER DELETE ON `orders` FOR EACH ROW BEGIN
            UPDATE products
            SET product_stock = product_stock + OLD.quantity
            WHERE product_id = OLD.product_id;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_update_product_stock` AFTER UPDATE ON `orders` FOR EACH ROW BEGIN
            UPDATE products
            SET product_stock = product_stock + OLD.quantity - NEW.quantity
            WHERE product_id = NEW.product_id;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `participant_regists`
--

CREATE TABLE `participant_regists` (
  `regist_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `participant_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participant_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participant_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participant_qty` int(11) NOT NULL,
  `participant_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Trigger `participant_regists`
--
DELIMITER $$
CREATE TRIGGER `trg_reduce_event_quota` AFTER INSERT ON `participant_regists` FOR EACH ROW BEGIN
            UPDATE events
            SET event_quota = event_quota - NEW.participant_qty
            WHERE event_title = NEW.event_name;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_restore_event_quota` AFTER DELETE ON `participant_regists` FOR EACH ROW BEGIN
            UPDATE events
            SET event_quota = event_quota + OLD.participant_qty
            WHERE event_title = OLD.event_name;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_update_event_quota` AFTER UPDATE ON `participant_regists` FOR EACH ROW BEGIN
            UPDATE events
            SET event_quota = event_quota + OLD.participant_qty - NEW.participant_qty
            WHERE event_title = NEW.event_name;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `product_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL DEFAULT 0,
  `product_stock` int(11) NOT NULL DEFAULT 0,
  `product_category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_min_order` int(11) NOT NULL,
  `product_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_stock`, `product_category`, `product_image`, `product_min_order`, `product_unit`, `product_tags`, `created_at`, `updated_at`) VALUES
('P00001', 'Kopi Arabika', 'Kopi berkualitas tinggi dari dataran tinggi Gayo.', 35000, 148, 'Minuman', 'https://images.unsplash.com/photo-1667933530112-12655abd7358?q=80&w=686&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 1, 'pcs', 'kopi,arabika,minuman', '2025-06-21 10:27:22', '2025-06-21 05:33:27'),
('P00002', 'Notebook A5', 'Notebook dengan kertas premium cocok untuk catatan harian.', 25000, 80, 'Alat Tulis', 'https://images.unsplash.com/photo-1554757387-fa0367573d09?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 1, 'buah', 'alat tulis,notebook', '2025-06-21 10:27:22', '2025-06-21 10:27:22'),
('P00003', 'Tumbler Stainless', 'Tumbler dengan desain minimalis dan tahan panas.', 75000, 40, 'Peralatan Minum', 'https://down-id.img.susercontent.com/file/id-11134207-7r98t-m08pjc0pqe6f8a', 1, 'buah', 'tumbler,peralatan minum', '2025-06-21 10:27:22', '2025-06-21 10:27:22'),
('P00004', 'Kaos Polos Hitam', 'Kaos polos berbahan cotton combed 30s.', 60000, 200, 'Pakaian', 'https://images.unsplash.com/photo-1654570818480-54524bf0186b?q=80&w=778&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 1, 'pcs', 'kaos,pakaian,hitam', '2025-06-21 10:27:22', '2025-06-21 10:27:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_categories`
--

CREATE TABLE `product_categories` (
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `product_category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7Zc2zFCJIcD72gUNboS8AJSr41J2g3GdD3bVBTZl', 4859, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM2NOdlNQdUN1RGl1NE9HQWdkek1xeXU5T09ERFVyRk5rRmlZZ0JEMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi90cmFuc2Frc2kvZGV0YWlsLXRyYW5zYWtzaS9UUlgwMDAwMDEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0ODU5O30=', 1750510057),
('byWM9WdO45ICEeAbiiAzCyk6dwa1ZUieH9kvlbHQ', 824627, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiekVhMklxazhSckRIaHczMjkzc1NteE9pSFBGU1RlVmRaVkxXY3J2TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3RyYW5zYWN0aW9uL3Jpd2F5YXQtZXZlbnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo4MjQ2Mjc7fQ==', 1750509286);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings_expedition_options`
--

CREATE TABLE `settings_expedition_options` (
  `expedition_option_id` bigint(20) UNSIGNED NOT NULL,
  `expedition_option_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expedition_option_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_payment_methods`
--

CREATE TABLE `setting_payment_methods` (
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `transaction_status` enum('pending','on process','on shipping','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `user_id`, `shipping_address`, `shipping_phone`, `shipping_name`, `subtotal`, `shipping_cost`, `total`, `transaction_status`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
('TRX000001', 824627, 'Sumedang, Jawa Barat', '+628952531875', 'Rafly Firmansyah', '35000.00', '15000.00', '50000.00', 'selesai', 'bca', 'unpaid', '2025-06-21 05:33:27', '2025-06-21 05:46:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_gender`, `user_phone`, `user_address`, `user_profile`, `user_role`, `created_at`, `updated_at`) VALUES
(3073, 'Braxton Nikolaus', 'juvenal16@example.org', '$2y$12$HieivlqPPB4G.IBgla4Xwu3j6pbd5wE74kjUGH.jR3muOw1FFuLAi', 'L', '085572780827', '508 Noemie Cliffs Suite 348\nNorth Clovis, CT 63797-2372', NULL, 'admin_product', '2025-06-21 02:58:48', '2025-06-21 02:58:48'),
(3915, 'Wilfredo Goodwin', 'friedrich12@example.net', '$2y$12$Fm1x2ogM/lTQBXVmtp3Wou2WdrdoD/tnFIwmIiDYITKUVjh67SLum', 'L', '085543296180', '23425 Rodolfo Grove Apt. 351\nPort Jordan, HI 58995-0032', NULL, 'admin_product', '2025-06-21 02:58:48', '2025-06-21 02:58:48'),
(4859, 'Miss Bridget Ondricka', 'unique.mertz@example.org', '$2y$12$fuqAMZ6Aml9BUyk1BZ106eiuFS8fARhEfc1tapbpHLvnDLDTMHvtm', 'M', '086709120027', '8021 Bayer Spring Apt. 258\nLake Theresetown, LA 50409-5281', NULL, 'super_admin', '2025-06-21 02:58:48', '2025-06-21 02:58:48'),
(7092, 'Gwen Wiza', 'spowlowski@example.org', '$2y$12$NynaD5h5ivLac5/mOY8s3OzMuUe/7JmHThJOIpAWushN192jlD5N6', 'M', '085365835602', '7946 Gaylord Rapid\nHenryburgh, DC 01828-6633', NULL, 'admin_product', '2025-06-21 02:58:48', '2025-06-21 02:58:48'),
(824627, 'Rafly Firmansyah', 'rflyfrmnsyh@edu.id', '$2y$12$r3.MWgSPwawnFfKMM7RnzeET8vZV0862Pv6v7/SAXPrl1R72X7i5G', 'Laki-laki', '+628952531875', 'Sumedang, Jawa Barat', NULL, 'user', '2025-06-21 03:36:34', '2025-06-21 03:37:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_user_email_unique` (`user_email`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indeks untuk tabel `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`event_category_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_transaction_id_foreign` (`transaction_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `participant_regists`
--
ALTER TABLE `participant_regists`
  ADD PRIMARY KEY (`regist_id`),
  ADD KEY `participant_regists_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings_expedition_options`
--
ALTER TABLE `settings_expedition_options`
  ADD PRIMARY KEY (`expedition_option_id`);

--
-- Indeks untuk tabel `setting_payment_methods`
--
ALTER TABLE `setting_payment_methods`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_user_email_unique` (`user_email`),
  ADD UNIQUE KEY `users_user_phone_unique` (`user_phone`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `event_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `settings_expedition_options`
--
ALTER TABLE `settings_expedition_options`
  MODIFY `expedition_option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting_payment_methods`
--
ALTER TABLE `setting_payment_methods`
  MODIFY `payment_method_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`transaction_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `participant_regists`
--
ALTER TABLE `participant_regists`
  ADD CONSTRAINT `participant_regists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
