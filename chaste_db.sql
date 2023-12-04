-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 02:48 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chaste_db`
--
CREATE DATABASE IF NOT EXISTS `chaste_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chaste_db`;

-- --------------------------------------------------------

--
-- Table structure for table `d_kamar`
--

DROP TABLE IF EXISTS `d_kamar`;
CREATE TABLE `d_kamar` (
  `d_kamar_id` int(11) NOT NULL,
  `h_kamar_id` int(11) NOT NULL,
  `kamar_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `d_menu`
--

DROP TABLE IF EXISTS `d_menu`;
CREATE TABLE `d_menu` (
  `d_menu_id` int(11) NOT NULL,
  `h_menu_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `d_tenant`
--

DROP TABLE IF EXISTS `d_tenant`;
CREATE TABLE `d_tenant` (
  `d_tenant_id` int(11) NOT NULL,
  `h_tenant_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `h_bulan`
--

DROP TABLE IF EXISTS `h_bulan`;
CREATE TABLE `h_bulan` (
  `h_bulan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `h_kamar`
--

DROP TABLE IF EXISTS `h_kamar`;
CREATE TABLE `h_kamar` (
  `h_kamar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `penyewa_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `h_menu`
--

DROP TABLE IF EXISTS `h_menu`;
CREATE TABLE `h_menu` (
  `h_menu_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL COMMENT 'Guest isi NULL',
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `h_tenant`
--

DROP TABLE IF EXISTS `h_tenant`;
CREATE TABLE `h_tenant` (
  `h_tenant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `penyewa_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

DROP TABLE IF EXISTS `kamar`;
CREATE TABLE `kamar` (
  `kamar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `penyewa_id` int(11) DEFAULT NULL COMMENT 'boleh NULL',
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL COMMENT 'boleh NULL',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `kategori` enum('makanan','minuman') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `user_id`, `tenant_id`, `nama`, `foto`, `harga`, `deskripsi`, `kategori`, `created_at`, `updated_at`, `status`) VALUES
(2, 9, 1, 'Pop Ice', 'menu/popes.jpeg', 5000, NULL, 'minuman', '2023-12-01 05:09:01', '2023-12-01 05:09:01', 1),
(3, 9, 1, 'Nutrisari', 'menu/nutrisari.jpg', 5000, NULL, 'minuman', '2023-12-01 05:09:58', '2023-12-01 05:09:58', 1),
(4, 9, 1, 'Es Teh', 'menu/esteh.jpg', 5000, NULL, 'minuman', '2023-12-01 05:10:50', '2023-12-01 05:10:50', 1),
(5, 9, 1, 'Aqua 600ml', 'menu/aqua.webp', 5000, NULL, 'minuman', '2023-12-01 05:10:50', '2023-12-01 05:10:50', 1),
(6, 10, 2, 'Bakso Campur', 'menu/campur.png', 15000, NULL, 'makanan', '2023-12-01 05:12:17', '2023-12-01 05:12:17', 1),
(7, 10, 2, 'Bakso Polos', 'menu/polos.png', 15000, NULL, 'makanan', '2023-12-01 05:12:17', '2023-12-01 05:12:17', 1),
(8, 11, 3, 'Nasi Ayam Geprek', 'menu/geprek.webp', 10000, NULL, 'makanan', '2023-12-01 05:13:14', '2023-12-01 05:13:14', 1),
(9, 11, 3, 'Nasi Ayam Krispi', 'menu/krispi.png', 10000, NULL, 'makanan', '2023-12-01 05:13:14', '2023-12-01 05:13:14', 1),
(10, 11, 3, 'Nasi Pecel Ayam', 'menu/pecel.jpg', 12000, NULL, 'makanan', '2023-12-01 05:13:50', '2023-12-01 05:13:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

DROP TABLE IF EXISTS `tenant`;
CREATE TABLE `tenant` (
  `tenant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `penyewa_id` int(11) DEFAULT NULL COMMENT 'boleh NULL',
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL COMMENT 'boleh NULL',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenant_id`, `user_id`, `penyewa_id`, `nama`, `foto`, `harga`, `deskripsi`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 9, 'Chaste Drink', 'tenant/drink.jpg', 1000000, 'Refreshing beverage that combines natural ingredients to provide a pure and invigorating taste, perfect for those seeking a delightful and wholesome drink experience.', '2023-12-01 04:52:39', '2023-12-01 04:52:39', 1),
(2, 1, 10, 'Bakso Bu Gaby', 'tenant/bakso.jpg', 1000000, 'Bakso Bu Gaby offers a delightful culinary experience with its signature meatball soup, showcasing a perfect blend of flavors and textures that captures the essence of Indonesian comfort food.\r\n\r\n', '2023-12-01 04:54:51', '2023-12-01 04:54:51', 1),
(3, 1, 11, 'Pawon CK', 'tenant/pawon.png', 1000000, 'Changing its menu daily, Pawon CK\'s a unique tenant that adds excitement to your dining experience ensuring a diverse and fresh selection of dishes for customers to savor. From boarding passes to movie tickets, there\'s pretty much nothing you can\'t store.', '2023-12-01 04:55:20', '2023-12-01 04:55:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `ktp` varchar(16) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `role` enum('1','2','3') DEFAULT '1' COMMENT '1 = admin | 2 = penyewa tenant | 3 = penyewa kamar',
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `ktp`, `foto`, `role`, `no_telp`, `email`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', '$2y$12$hwySAInr8Hg/j.jEx8.PPehRfEa8tyeDEKkYa7946dGLoWpa47d/y', NULL, NULL, NULL, '1', NULL, 'admin@gmail.com', '2023-11-19 05:50:07', '2023-11-19 05:50:07', 1),
(8, 'kambing', '$2y$12$ULvL4yGraLsfmmP4OUQzd.9G8x2pFeCvdhtPh1rdhxF64LG4Enbre', NULL, NULL, NULL, '2', NULL, 'kambing@gmail.com', '2023-11-20 19:29:12', '2023-11-20 19:29:12', 1),
(9, 'tenant1', '$2y$12$qb.sUYtoMyCvoMdhzFIM5e4kT/yFXjAkwIXZCK5RMCmXkNbh25jw6', NULL, NULL, NULL, '2', NULL, 'tenant1@gmail.com', '2023-11-30 21:20:15', '2023-11-30 21:20:15', 1),
(10, 'tenant2', '$2y$12$rdlaBl2cS4DcdQ4cal3NguXm/mCs2VB20EgmsyDVXIdPizIwMiBJS', NULL, NULL, NULL, '2', NULL, 'tenant2@gmail.com', '2023-11-30 21:20:52', '2023-11-30 21:20:52', 1),
(11, 'tenant3', '$2y$12$3RTDgM84.CbGa4qGSUFvs.NrMyfx3RusqoNqaAsshUQhMHW3Kf6pu', NULL, NULL, NULL, '2', NULL, 'tenant3@gmail.com', '2023-11-30 21:21:14', '2023-11-30 21:21:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `d_kamar`
--
ALTER TABLE `d_kamar`
  ADD PRIMARY KEY (`d_kamar_id`),
  ADD KEY `h_kamar_id` (`h_kamar_id`),
  ADD KEY `kamar_id` (`kamar_id`);

--
-- Indexes for table `d_menu`
--
ALTER TABLE `d_menu`
  ADD PRIMARY KEY (`d_menu_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `h_menu_id` (`h_menu_id`);

--
-- Indexes for table `d_tenant`
--
ALTER TABLE `d_tenant`
  ADD PRIMARY KEY (`d_tenant_id`),
  ADD KEY `h_tenant_id` (`h_tenant_id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
