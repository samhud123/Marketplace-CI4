-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 04:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freework2`
--
CREATE DATABASE IF NOT EXISTS `freework2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `freework2`;

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Super-User'),
(2, 'Seller', 'Akun-Penjual'),
(3, 'Buyer', 'Akun-Pembeli');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 2),
(2, 1),
(2, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'penjual1@gmail.com', 1, '2024-03-30 01:54:57', 1),
(2, '::1', 'admin@admin.com', 2, '2024-03-30 01:57:12', 1),
(3, '::1', 'admin@admin.com', 2, '2024-03-30 01:58:06', 1),
(4, '::1', 'penjual1@gmail.com', 1, '2024-03-30 02:33:50', 1),
(5, '::1', 'penjual2@gmail.com', 3, '2024-03-30 02:54:48', 1),
(6, '::1', 'penjual1@gmail.com', 1, '2024-03-30 02:55:46', 1),
(7, '::1', 'penjual2@gmail.com', 3, '2024-03-30 03:17:52', 1),
(8, '::1', 'penjual1@gmail.com', 1, '2024-03-30 03:18:06', 1),
(9, '::1', 'penjual2@gmail.com', 3, '2024-03-30 04:30:59', 1),
(10, '::1', 'penjual1@gmail.com', 1, '2024-03-30 04:32:21', 1),
(11, '::1', 'penjual1@gmail.com', 1, '2024-03-30 09:55:05', 1),
(12, '::1', 'admin@admin.com', 2, '2024-03-30 10:24:57', 1),
(13, '::1', 'pembeli1@gmail.com', 4, '2024-03-30 10:49:45', 1),
(14, '::1', 'admin@admin.com', 2, '2024-03-30 10:50:27', 1),
(15, '::1', 'pembeli1@gmail.com', 4, '2024-03-30 10:51:11', 1),
(16, '::1', 'penjual1@gmail.com', 1, '2024-03-31 02:36:00', 1),
(17, '::1', 'penjual2@gmail.com', 3, '2024-03-31 02:37:33', 1),
(18, '::1', 'pembeli1@gmail.com', 4, '2024-03-31 02:40:33', 1),
(19, '::1', 'admin@admin.com', 2, '2024-04-01 00:53:49', 1),
(20, '::1', 'pembeli1@gmail.com', 4, '2024-04-01 02:59:20', 1),
(21, '::1', 'admin@admin.com', 2, '2024-04-01 05:24:51', 1),
(22, '::1', 'pembeli1@gmail.com', 4, '2024-04-02 22:59:26', 1),
(23, '::1', 'penjual1@gmail.com', 1, '2024-04-03 02:52:35', 1),
(24, '::1', 'pembeli1@gmail.com', 4, '2024-04-03 02:53:01', 1),
(25, '::1', 'admin@admin.com', 2, '2024-04-03 03:05:27', 1),
(26, '::1', 'pembeli1@gmail.com', 4, '2024-04-04 03:27:18', 1),
(27, '::1', 'pembeli1@gmail.com', 4, '2024-04-04 10:10:02', 1),
(28, '::1', 'penjual1@gmail.com', 1, '2024-04-04 11:16:44', 1),
(29, '::1', 'penjual1@gmail.com', 1, '2024-04-10 10:06:05', 1),
(30, '::1', 'penjual1@gmail.com', 1, '2024-04-23 23:22:48', 1),
(31, '::1', 'pembeli1@gmail.com', 4, '2024-04-23 23:23:39', 1),
(32, '::1', 'penjual1@gmail.com', 1, '2024-04-23 23:28:42', 1),
(33, '::1', 'penjual1@gmail.com', 1, '2024-04-25 22:23:26', 1),
(34, '::1', 'pembeli1@gmail.com', 4, '2024-04-25 22:25:51', 1),
(35, '::1', 'penjual2@gmail.com', 3, '2024-04-25 22:29:07', 1),
(36, '::1', 'penjual1@gmail.com', 1, '2024-04-25 23:04:36', 1),
(37, '::1', 'penjual2@gmail.com', 3, '2024-04-25 23:04:55', 1),
(38, '::1', 'admin@admin.com', 2, '2024-04-25 23:08:11', 1),
(39, '::1', 'penjual2@gmail.com', 3, '2024-04-25 23:09:41', 1),
(40, '::1', 'penjual2@gmail.com', 3, '2024-04-26 10:17:52', 1),
(41, '::1', 'pembeli1@gmail.com', 4, '2024-04-26 10:18:25', 1),
(42, '::1', 'penjual1@gmail.com', 1, '2024-05-07 12:36:56', 1),
(43, '::1', 'pembeli1@gmail.com', 4, '2024-05-07 12:37:36', 1),
(44, '::1', 'penjual2@gmail.com', 3, '2024-05-07 12:38:45', 1),
(45, '::1', 'penjual1@gmail.com', 1, '2024-05-19 23:46:43', 1),
(46, '::1', 'pembeli1@gmail.com', 4, '2024-05-19 23:47:46', 1),
(47, '::1', 'pembeli1@gmail.com', 4, '2024-05-20 02:27:21', 1),
(48, '::1', 'penjual2@gmail.com', 3, '2024-05-20 02:51:23', 1),
(49, '::1', 'penjual1@gmail.com', 1, '2024-05-20 02:51:59', 1),
(50, '::1', 'penjual1@gmail.com', 1, '2024-05-20 12:26:11', 1),
(51, '::1', 'pembeli1@gmail.com', 4, '2024-05-20 12:29:43', 1),
(52, '::1', 'penjual1@gmail.com', 1, '2024-05-21 06:37:54', 1),
(53, '::1', 'pembeli1@gmail.com', 4, '2024-05-21 06:38:36', 1),
(54, '::1', 'penjual2@gmail.com', 3, '2024-05-21 08:09:52', 1),
(55, '::1', 'penjual2@gmail.com', 3, '2024-05-21 08:12:09', 1),
(56, '::1', 'pembeli1@gmail.com', NULL, '2024-05-23 12:50:55', 0),
(57, '::1', 'pembeli1@gmail.com', 4, '2024-05-23 12:51:01', 1),
(58, '::1', 'penjual1@gmail.com', 1, '2024-05-23 13:10:17', 1),
(59, '::1', 'penjual2@gmail.com', 3, '2024-05-23 14:07:11', 1),
(60, '::1', 'penjual1@gmail.com', 1, '2024-05-23 14:45:30', 1),
(61, '::1', 'pembeli1@gmail.com', 4, '2024-05-23 22:00:59', 1),
(62, '::1', 'pembeli1@gmail.com', 4, '2024-05-23 22:09:42', 1),
(63, '::1', 'penjual1@gmail.com', 1, '2024-05-23 22:10:07', 1),
(64, '::1', 'penjual2@gmail.com', 3, '2024-05-23 22:12:05', 1),
(65, '::1', 'pembeli1@gmail.com', 4, '2024-05-23 22:18:15', 1),
(66, '::1', 'admin@admin.com', 2, '2024-05-23 23:41:50', 1),
(67, '::1', 'penjual1@gmail.com', 1, '2024-05-24 00:59:20', 1),
(68, '::1', 'penjual2@gmail.com', 3, '2024-05-24 00:59:53', 1),
(69, '::1', 'pembeli1@gmail.com', 4, '2024-05-25 00:28:36', 1),
(70, '::1', 'penjual1@gmail.com', 1, '2024-05-25 00:31:11', 1),
(71, '::1', 'pembeli1@gmail.com', 4, '2024-05-25 01:02:06', 1),
(72, '::1', 'admin@admin.com', 2, '2024-05-25 01:39:39', 1),
(73, '::1', 'penjual1@gmail.com', 1, '2024-05-25 01:50:08', 1),
(74, '::1', 'penjual1@gmail.com', 1, '2024-05-29 02:22:35', 1),
(75, '::1', 'pembeli1@gmail.com', NULL, '2024-05-29 02:23:16', 0),
(76, '::1', 'pembeli1@gmail.com', 4, '2024-05-29 02:23:23', 1),
(77, '::1', 'penjual2@gmail.com', 3, '2024-05-29 02:36:45', 1),
(78, '::1', 'penjual1@gmail.com', 1, '2024-05-29 02:37:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(19, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1711763172, 1),
(20, '2024-03-26-223050', 'App\\Database\\Migrations\\CreateCategoriesTable', 'default', 'App', 1711763172, 1),
(21, '2024-03-30-014847', 'App\\Database\\Migrations\\CreateServicesTable', 'default', 'App', 1711763553, 2),
(27, '2024-04-04-041948', 'App\\Database\\Migrations\\CreateOrdersTable', 'default', 'App', 1714084828, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id_categories` int(5) UNSIGNED NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id_categories`, `category_name`, `picture`) VALUES
(1, 'Website', '1711763933_61890405103b3a2ba79c.jpg'),
(3, 'Logo Design', '1711794906_7c21e1f44e4c2e5789b8.jpg'),
(4, 'SEO', '1711933339_940168ec59275defc3c8.jpg'),
(5, 'Translation', '1711933352_670c9e024ccecb01de28.jpg'),
(6, 'video Explainer', '1711933622_f45d494c8ff2bad873b6.jpg'),
(7, 'Data Entry', '1711933638_8889d3e4b3409aa0f2fc.jpg'),
(8, 'Voice Over', '1711933900_f6c849eebdfcffd9a1a9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) UNSIGNED NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `buyer_id` int(11) UNSIGNED NOT NULL,
  `seller_id` int(11) UNSIGNED NOT NULL,
  `service_id` int(11) UNSIGNED NOT NULL,
  `pesan` text DEFAULT NULL,
  `harga` decimal(20,2) DEFAULT NULL,
  `token` text NOT NULL,
  `status_code` int(3) NOT NULL,
  `status_order` enum('process','approved','success','rejected','cancelled') DEFAULT 'process',
  `status_pembayaran` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `id_transaksi`, `buyer_id`, `seller_id`, `service_id`, `pesan`, `harga`, `token`, `status_code`, `status_order`, `status_pembayaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 1806082832, 4, 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 1000000.00, 'd88d6825-cfc6-4311-b899-6c5f8b546147', 0, 'approved', 'pending', '2024-05-29 02:25:24', '2024-05-29 02:39:37', NULL),
(13, 0, 4, 3, 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 400000.00, '', 0, 'process', NULL, '2024-05-29 02:35:34', '2024-05-29 02:37:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sellers`
--

CREATE TABLE `tbl_sellers` (
  `seller_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `profesi` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `github` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `wallet` varchar(15) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `service_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(5) UNSIGNED NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`service_id`, `user_id`, `category_id`, `judul`, `deskripsi`, `foto`) VALUES
(1, 1, 1, 'Jasa Pembuatan Website ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1711767176_6dfbb7adea6d879bd862.png'),
(3, 3, 3, 'Jasa Pembuatan Logo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '1711852750_19fb28ec89d1d7dcdcd0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `no_tlp` varchar(14) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `nama`, `no_tlp`, `alamat`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'penjual1@gmail.com', 'penjual1', NULL, NULL, NULL, '$2y$10$CfwPgmDAPsJWYFZZEegKzO2kCHGK2t/z.i/pbYX0qOHJklwLk.Igu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-03-30 01:54:46', '2024-03-30 01:54:46', NULL),
(2, 'admin@admin.com', 'admin', NULL, NULL, NULL, '$2y$10$DwWc8kveYzKoS8P9v6Jv.u0jp8z3rB3dYE285nRqsmfpJf1GCZxq2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-03-30 01:57:02', '2024-03-30 01:57:02', NULL),
(3, 'penjual2@gmail.com', 'penjual2', NULL, NULL, NULL, '$2y$10$vtSSgahUDX/IDdtP.RV1YulwA2S7Ev7IFir6PZo6hK7GqVi.XXUmC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-03-30 02:54:35', '2024-03-30 02:54:35', NULL),
(4, 'pembeli1@gmail.com', 'pembeli1', 'Samirul Huda', '085648597435', 'Pekalongan, Jawa Tengah', '$2y$10$ROT9oDDNRl1bYv0S2ArvYujRuWudBqcnaSCveprODj34KyCMQfxEO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-03-30 10:49:39', '2024-03-30 10:49:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `tbl_orders_buyer_id_foreign` (`buyer_id`),
  ADD KEY `tbl_orders_seller_id_foreign` (`seller_id`),
  ADD KEY `tbl_orders_service_id_foreign` (`service_id`);

--
-- Indexes for table `tbl_sellers`
--
ALTER TABLE `tbl_sellers`
  ADD PRIMARY KEY (`seller_id`),
  ADD KEY `tbl_sellers_user_id_foreign` (`user_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `tbl_services_user_id_foreign` (`user_id`),
  ADD KEY `tbl_services_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id_categories` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_sellers`
--
ALTER TABLE `tbl_sellers`
  MODIFY `seller_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `service_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_orders_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `tbl_services` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sellers`
--
ALTER TABLE `tbl_sellers`
  ADD CONSTRAINT `tbl_sellers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD CONSTRAINT `tbl_services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id_categories`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
