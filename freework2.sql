-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 04:24 AM
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
(1, 'Admin', 'User-Admin'),
(2, 'Seller', 'User-Seller'),
(3, 'Buyer', 'User-Buyer');

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
(1, 1),
(2, 2),
(2, 6),
(2, 7),
(3, 3),
(3, 5);

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
(1, '::1', 'penjual1@gmail.com', 2, '2024-06-20 12:01:50', 1),
(2, '::1', 'pembeli1@gmail.com', 3, '2024-06-20 12:02:55', 1),
(3, '::1', 'admin@gmail.com', 1, '2024-06-20 12:04:20', 1),
(4, '::1', 'penjual1@gmail.com', 2, '2024-06-20 12:10:27', 1),
(5, '::1', 'admin@gmail.com', 1, '2024-06-20 12:26:08', 1),
(6, '::1', 'penjual1@gmail.com', 2, '2024-06-20 12:26:55', 1),
(7, '::1', 'penjual1@gmail.com', 2, '2024-06-21 01:03:22', 1),
(8, '::1', 'pembeli1@gmail.com', 3, '2024-06-21 01:04:04', 1),
(9, '::1', 'admin@gmail.com', 1, '2024-06-21 02:38:34', 1),
(10, '::1', 'penjual1@gmail.com', 2, '2024-06-21 02:39:21', 1),
(11, '::1', 'pembeli2@gmail.com', 5, '2024-06-21 04:14:38', 1),
(12, '::1', 'pembeli1@gmail.com', 3, '2024-06-21 04:22:49', 1),
(13, '::1', 'pembeli1@gmail.com', 3, '2024-06-21 05:51:36', 1),
(14, '::1', 'pembeli2@gmail.com', 5, '2024-06-21 05:52:40', 1),
(15, '::1', 'pembeli1@gmail.com', 3, '2024-06-21 06:10:31', 1),
(16, '::1', 'pembeli2@gmail.com', 5, '2024-06-21 06:24:00', 1),
(17, '::1', 'pembeli1@gmail.com', 3, '2024-06-21 06:26:23', 1),
(18, '::1', 'penjual2@gmail.com', 6, '2024-06-21 06:44:35', 1),
(19, '::1', 'penjual1@gmail.com', 2, '2024-06-21 08:45:44', 1),
(20, '::1', 'penjual3@gmail.com', 7, '2024-06-21 09:35:48', 1),
(21, '::1', 'penjual1@gmail.com', 2, '2024-06-21 09:55:05', 1),
(22, '::1', 'penjual3', NULL, '2024-06-21 09:57:59', 0),
(23, '::1', 'penjual3@gmail.com', 7, '2024-06-21 09:58:06', 1),
(24, '::1', 'penjual1@gmail.com', 2, '2024-06-21 09:59:26', 1),
(25, '::1', 'penjual2@gmail.com', 6, '2024-06-21 10:03:24', 1),
(26, '::1', 'pembeli1@gmail.com', 3, '2024-06-21 12:07:04', 1),
(27, '::1', 'penjual1@gmail.com', 2, '2024-06-22 00:22:12', 1),
(28, '::1', 'admin@gmail.com', 1, '2024-06-22 00:25:31', 1),
(29, '::1', 'pembeli1@gmail.com', 3, '2024-06-22 02:51:33', 1),
(30, '::1', 'pembeli1@gmail.com', NULL, '2024-06-25 11:03:17', 0),
(31, '::1', 'pembeli1@gmail.com', 3, '2024-06-25 11:03:24', 1),
(32, '::1', 'penjual1@gmail.com', 2, '2024-06-25 11:34:53', 1),
(33, '::1', 'pembeli2@gmail.com', 5, '2024-06-25 11:36:24', 1),
(34, '::1', 'pembeli1@gmail.com', 3, '2024-06-25 11:39:05', 1),
(35, '::1', 'samirulhuda87@gmail.com', NULL, '2024-06-26 02:08:52', 0),
(36, '::1', 'penjual1@gmail.com', 2, '2024-06-26 02:09:03', 1),
(37, '::1', 'pembeli1@gmail.com', 3, '2024-06-26 02:10:50', 1),
(38, '::1', 'admin@gmail.com', 1, '2024-06-26 02:11:50', 1),
(39, '::1', 'penjual1@gmail.com', 2, '2024-06-26 04:39:33', 1),
(40, '::1', 'penjual1@gmail.com', 2, '2024-07-02 12:33:17', 1),
(41, '::1', 'pembeli1@gmail.com', 3, '2024-07-02 12:36:37', 1),
(42, '::1', 'penjual1@gmail.com', 2, '2024-07-03 02:12:48', 1),
(43, '::1', 'penjual1@gmail.com', 2, '2024-07-03 02:13:06', 1),
(44, '::1', 'pembeli1@gmail.com', 3, '2024-07-03 02:13:40', 1),
(45, '::1', 'pembeli2@gmail.com', 5, '2024-07-03 02:15:59', 1),
(46, '::1', 'penjual2@gmail.com', 6, '2024-07-03 02:16:39', 1),
(47, '::1', 'penjual1@gmail.com', 2, '2024-07-03 04:26:16', 1),
(48, '::1', 'pelanggan1@gmail.com', NULL, '2024-07-03 04:28:27', 0),
(49, '::1', 'pelanggan1@gmail.com', NULL, '2024-07-03 04:28:36', 0),
(50, '::1', 'pembeli1@gmail.com', 3, '2024-07-03 04:29:03', 1),
(51, '::1', 'admin@gmail.com', 1, '2024-07-03 04:40:20', 1),
(52, '::1', 'pembeli1@gmail.com', 3, '2024-07-03 04:54:30', 1),
(53, '::1', 'penjual1@gmail.com', 2, '2024-07-07 01:15:11', 1),
(54, '::1', 'pembeli1@gmail.com', 3, '2024-07-07 01:49:47', 1),
(55, '::1', 'pembeli2@gmail.com', 5, '2024-07-07 01:51:07', 1),
(56, '::1', 'penjual2@gmail.com', 6, '2024-07-07 01:51:31', 1),
(57, '::1', 'penjual1@gmail.com', 2, '2024-07-07 11:37:53', 1),
(58, '::1', 'penjual2@gmail.com', 6, '2024-07-07 11:39:04', 1),
(59, '::1', 'pembeli2@gmail.com', 5, '2024-07-07 11:54:33', 1),
(60, '::1', 'penjual2@gmail.com', 6, '2024-07-08 01:54:54', 1),
(61, '::1', 'pembeli2@gmail.com', 5, '2024-07-08 01:55:47', 1),
(62, '::1', 'penjual1@gmail.com', 2, '2024-07-08 02:19:16', 1),
(63, '::1', 'penjual2@gmail.com', 6, '2024-07-08 02:22:00', 1);

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
(39, '2024-03-26-223050', 'App\\Database\\Migrations\\CreateCategoriesTable', 'default', 'App', 1718884633, 1),
(40, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1718884638, 2),
(41, '2024-03-30-014847', 'App\\Database\\Migrations\\CreateServicesTable', 'default', 'App', 1718884638, 2),
(42, '2024-04-04-041948', 'App\\Database\\Migrations\\CreateOrdersTable', 'default', 'App', 1718884638, 2),
(43, '2024-06-20-104424', 'App\\Database\\Migrations\\CreateCommentsTable', 'default', 'App', 1718884638, 2),
(44, '2024-06-21-030439', 'App\\Database\\Migrations\\CreateWalletTable', 'default', 'App', 1718939856, 3),
(45, '2024-06-21-104530', 'App\\Database\\Migrations\\CreateWithdrawalTable', 'default', 'App', 1718967517, 4);

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
(1, 'Website', '1718885238_d3c967b94efc5ed2e0dc.jpg'),
(2, 'Logo', '1718885284_171faa134e3c65a0fc27.jpg'),
(3, 'Video', '1718885295_d11749806d7a5d9346a2.jpg'),
(4, 'SEO', '1718885307_61c2b8b69ddc8815a2cc.jpg'),
(5, 'Translation', '1718885322_260854c1ed6ec3709046.jpg'),
(6, 'Voice Over', '1718885356_28bfe923c61b8c51275f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `service_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `buyer_id` int(10) UNSIGNED NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`service_id`, `order_id`, `buyer_id`, `rating`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, 3, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, quod aut cumque quibusdam inventore molestias quas, neque eveniet', '2024-06-25 11:33:43', '2024-06-25 11:33:43', NULL),
(1, 12, 5, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, quod aut cumque quibusdam inventore molestias', '2024-06-25 11:37:16', '2024-06-25 11:37:16', NULL),
(2, 13, 3, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo unde inventore fugit ipsum voluptatum labore minima laboriosam quidem optio.', '2024-06-25 11:41:44', '2024-06-25 11:41:44', NULL),
(1, 16, 3, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, quod aut cumque quibusdam inventore molestias quas, neque eveniet hic', '2024-07-03 04:36:58', '2024-07-03 04:36:58', NULL);

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
  `status_order` enum('process','approved','cancelled','rejected','success') NOT NULL DEFAULT 'process',
  `status_pembayaran` varchar(10) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `id_transaksi`, `buyer_id`, `seller_id`, `service_id`, `pesan`, `harga`, `token`, `status_order`, `status_pembayaran`, `payment_type`, `file_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 1908359998, 3, 2, 1, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, quod aut cumque quibusdam inventore molestias quas, neque eveniet hic nemo nesciunt ad dolorem alias', 1000000.00, 'b8bc1248-75ab-4c2b-8ad2-620339e65a7d', 'success', 'settlement', 'qris', NULL, '2024-06-21 06:11:35', '2024-06-21 06:20:49', NULL),
(12, 1604233165, 5, 2, 1, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, quod aut cumque quibusdam inventore molestias quas', 1500000.00, 'f4a1443d-4dbf-4ddb-93b2-54be0312c75a', 'success', 'settlement', 'qris', NULL, '2024-06-21 06:24:20', '2024-06-21 06:25:15', NULL),
(13, 1276826626, 3, 6, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo unde inventore fugit ipsum voluptatum labore minima laboriosam', 400000.00, '365f4071-b828-46d7-82b6-72ac2fbabb40', 'success', 'settlement', 'qris', NULL, '2024-06-21 06:47:26', '2024-06-25 11:40:35', NULL),
(14, 1720674258, 3, 2, 1, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, quod aut cumque quibusdam inventore molestias quas, neque eveniet hic nemo nesciunt ad dolorem alia', 1500000.00, 'fa8341bb-0931-4454-a4b3-91b69f0f256b', 'approved', 'settlement', 'qris', NULL, '2024-07-02 12:37:07', '2024-07-02 12:42:02', NULL),
(15, 1670888724, 5, 6, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo unde inventore fugit ipsum voluptatum labore minima laboriosam q', 300000.00, '7e1362a3-0392-466d-bf5b-9b76d477a40c', 'success', 'settlement', 'qris', NULL, '2024-07-03 02:16:21', '2024-07-03 02:18:25', NULL),
(16, 1204007986, 3, 2, 1, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, quod aut cumque quibusdam inventore molestias quas,', 1200000.00, '328e6ae7-fe59-4c8a-bc3e-abbdae866b7e', 'success', 'settlement', 'qris', NULL, '2024-07-03 04:31:30', '2024-07-03 04:36:30', NULL),
(17, 717448754, 3, 2, 1, 'Lorem ', 900000.00, '081711eb-3f03-4df4-a504-a0aa5bc2281d', 'approved', '', '', NULL, '2024-07-03 04:54:49', '2024-07-03 04:55:45', NULL),
(19, 1468903071, 5, 6, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 400000.00, '85c56c43-dce4-4b21-b86e-283fafc79598', 'approved', '', '', '1720404381_45265ad41ab77dfbc9a6.zip', '2024-07-07 11:59:47', '2024-07-08 02:06:21', NULL);

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
(1, 2, 1, 'Jasa Pembuatan Website', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, quod aut cumque quibusdam inventore molestias quas, neque eveniet hic nemo nesciunt ad dolorem alias, cum temporibus recusandae! Ea, expedita voluptate!', '1718885483_52652099d99e0534f565.png'),
(2, 6, 2, 'Jasa Pembuatan Logo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo unde inventore fugit ipsum voluptatum labore minima laboriosam quidem optio. Vel saepe quo possimus eum sit!', '1718952352_b86be9feca14ab77d351.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet`
--

CREATE TABLE `tbl_wallet` (
  `id` int(11) NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `no_wallet` varchar(15) DEFAULT NULL,
  `nama_wallet` varchar(10) DEFAULT NULL,
  `saldo` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_wallet`
--

INSERT INTO `tbl_wallet` (`id`, `seller_id`, `no_wallet`, `nama_wallet`, `saldo`) VALUES
(2, 2, '085648597435', 'BRI', 2000000.00),
(5, 7, '675967584765876', 'bri', NULL),
(6, 6, '0123456789', 'Dana', 665000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wd`
--

CREATE TABLE `tbl_wd` (
  `id` int(11) NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `jml_wd` decimal(20,2) DEFAULT NULL,
  `status_wd` enum('process','success','failed') NOT NULL DEFAULT 'process',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_wd`
--

INSERT INTO `tbl_wd` (`id`, `seller_id`, `wallet_id`, `jml_wd`, `status_wd`, `created_at`) VALUES
(1, 2, 2, 375000.00, 'failed', '2024-06-22 01:46:23'),
(2, 2, 2, 375000.00, 'success', '2024-06-22 02:46:28'),
(3, 2, 2, 1000000.00, 'success', '2024-07-03 04:40:41'),
(4, 2, 2, 500000.00, 'failed', '2024-07-03 04:41:52'),
(6, 2, 2, 140000.00, 'process', '2024-07-07 01:46:13');

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
  `foto` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `email`, `username`, `nama`, `no_tlp`, `alamat`, `foto`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@gmail.com', 'admin', NULL, NULL, NULL, 'default.png', '$2y$10$KoO/0atDp883atQW0OxXFO5L1t9pGoilsmwjf8w6wSjo4LEnpxese', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-20 11:58:30', '2024-06-20 11:58:30', NULL),
(2, 'penjual1@gmail.com', 'penjual1', 'Penjual Pertama', '0123456789', 'Pekalongan, Jawa Tengah', 'default.png', '$2y$10$y5XrK07aX89VbEcXiDskhObFsH3izuhGIxm5uVSEEXb.6p8FSC.lK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-20 12:01:41', '2024-06-20 12:26:27', NULL),
(3, 'pembeli1@gmail.com', 'pembeli1', 'Pembeli Pertama', '0123456789', 'Pekalongan, Jawa Tengah', 'default.png', '$2y$10$5k8AcwvIH1nqnO4MNvepieFvwBxX9W9yhKKrVxrUNas7Gb/aqb.JW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-20 12:02:48', '2024-07-03 04:31:18', NULL),
(5, 'pembeli2@gmail.com', 'pembeli2', 'Pembeli Kedua', '0123456789', 'Batang, Jawa Tengah', 'default.png', '$2y$10$SGRc6Obc0kIZXXwPWknZeO.tC1sIXTveDcPHux3rAYJOB4AkeRUUO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-21 04:14:30', '2024-06-21 04:14:53', NULL),
(6, 'penjual2@gmail.com', 'penjual2', 'Penjual Kedua', '0987654321', 'Pemalang, Jawa Tengah', 'default.png', '$2y$10$CRBC27dH7/21zYJIfMugA.G8nz9OEAkMVGbW5qnnOkz9CiDlehIym', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-21 06:44:25', '2024-06-21 06:53:44', NULL),
(7, 'penjual3@gmail.com', 'penjual3', NULL, NULL, NULL, 'default.png', '$2y$10$WAujmP3TZ7DSilu0CKt4j.ZARIcn0vAC0DXWuWa0AwNlwbY7vYso2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-21 09:35:36', '2024-06-21 09:35:36', NULL);

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
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD KEY `tbl_comments_service_id_foreign` (`service_id`),
  ADD KEY `tbl_comments_buyer_id_foreign` (`buyer_id`),
  ADD KEY `order_id` (`order_id`);

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
-- Indexes for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_wallet_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `tbl_wd`
--
ALTER TABLE `tbl_wd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_wd_seller_id_foreign` (`seller_id`),
  ADD KEY `tbl_wd_wallet_id_foreign` (`wallet_id`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id_categories` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_sellers`
--
ALTER TABLE `tbl_sellers`
  MODIFY `seller_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `service_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_wd`
--
ALTER TABLE `tbl_wd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `tbl_comments_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_comments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_comments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `tbl_services` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD CONSTRAINT `tbl_wallet_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_wd`
--
ALTER TABLE `tbl_wd`
  ADD CONSTRAINT `tbl_wd_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_wd_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `tbl_wallet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
