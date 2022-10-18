-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2022 at 11:29 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ban_hang`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Giày Sneaker', 0, 'giay-sneaker', '2022-09-20 07:05:56', '2022-10-08 00:59:05', '2022-10-08 00:59:05'),
(2, 'Adidas', 1, 'adidas', '2022-09-20 07:06:08', '2022-10-06 04:12:01', '2022-10-06 04:12:01'),
(3, 'Nike', 1, 'nike', '2022-09-20 07:06:17', '2022-10-06 04:11:58', '2022-10-06 04:11:58'),
(4, 'Air Jordan', 1, 'air-jordan', '2022-09-20 07:06:25', '2022-10-06 04:11:55', '2022-10-06 04:11:55'),
(5, 'Adidas Original', 2, 'adidas-original', '2022-09-20 07:06:37', '2022-10-06 04:11:22', '2022-10-06 04:11:22'),
(6, 'Nike Air', 3, 'nike-air', '2022-09-20 07:07:03', '2022-10-06 04:11:19', '2022-10-06 04:11:19'),
(7, 'Nike Air Jordan 12', 4, 'nike-air-jordan-12', '2022-09-20 07:07:19', '2022-10-06 04:09:40', '2022-10-06 04:09:40'),
(8, 'sfdgdfsg', 0, 'sfdgdfsg', '2022-09-20 08:02:09', '2022-09-20 08:05:18', '2022-09-20 08:05:18'),
(9, 'sdfa', 0, 'sdfa', '2022-09-20 08:05:53', '2022-09-20 08:07:04', '2022-09-20 08:07:04'),
(10, 'thadsfsdafsdafsdf', 2, 'thadsfsdafsdafsdf', '2022-09-23 07:38:53', '2022-09-23 07:39:10', '2022-09-23 07:39:10'),
(11, 'sdf', 2, 'sdf', '2022-10-02 03:51:15', '2022-10-02 03:51:30', '2022-10-02 03:51:30'),
(12, 'ádfsfad', 0, 'adfsfad', '2022-10-06 04:12:29', '2022-10-06 04:26:29', '2022-10-06 04:26:29'),
(13, '43242', 0, '43242', '2022-10-06 04:22:12', '2022-10-08 00:59:02', '2022-10-08 00:59:02'),
(14, 'tgew', 0, 'tgew', '2022-10-06 04:26:59', '2022-10-06 04:30:32', '2022-10-06 04:30:32'),
(15, 'ergwerwg', 0, 'ergwerwg', '2022-10-06 04:27:01', '2022-10-06 04:27:08', '2022-10-06 04:27:08'),
(16, '342', 0, '342', '2022-10-06 04:27:02', '2022-10-06 04:30:29', '2022-10-06 04:30:29'),
(17, 'DÂY CHUYỀN / NECKLACE', 0, 'day-chuyen-necklace', '2022-10-08 01:01:24', '2022-10-08 01:01:24', NULL),
(18, 'NHẪN TAY / RING', 0, 'nhan-tay-ring', '2022-10-08 01:01:39', '2022-10-08 01:01:39', NULL),
(19, 'KHUYÊN TAI / EARRINGS', 0, 'khuyen-tai-earrings', '2022-10-08 01:02:05', '2022-10-08 01:02:05', NULL),
(20, 'LẮC TAY / BRACELET', 0, 'lac-tay-bracelet', '2022-10-08 01:02:17', '2022-10-08 01:02:17', NULL),
(21, 'LẮC CHÂN / ANLKET', 0, 'lac-chan-anlket', '2022-10-08 01:02:31', '2022-10-08 01:02:31', NULL),
(22, 'ĐỒ ĐÔI / COUPLE', 0, 'do-doi-couple', '2022-10-08 01:02:41', '2022-10-08 01:02:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'OKOK123', '231231234', '2022-09-20 23:55:13', '2022-09-20 23:55:13'),
(4, 'safg', 's123', '2022-09-23 18:52:18', '2022-09-23 19:12:41'),
(5, 'safg456', 's123456', '2022-09-23 19:13:09', '2022-09-23 19:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`) VALUES
(7, 'Home', 0, 'home', '2022-10-08 01:40:03', '2022-10-08 01:40:03'),
(8, 'Page', 0, 'page', '2022-10-08 01:40:19', '2022-10-08 01:40:19'),
(9, 'Contract', 0, 'contract', '2022-10-08 01:40:24', '2022-10-08 01:40:24'),
(10, 'Cart', 8, 'cart', '2022-10-08 01:40:31', '2022-10-08 01:40:31'),
(11, 'Checkout', 8, 'checkout', '2022-10-08 01:40:36', '2022-10-08 01:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2022_09_09_031810_create_categories_table', 1),
(16, '2022_09_20_145943_add_column_deleted_at_to_categories_table', 2),
(18, '2022_09_20_151035_create_products_table', 3),
(19, '2022_09_20_151412_create_product_images_table', 3),
(20, '2022_09_21_065020_create_companies_table', 4),
(21, '2022_09_25_034716_create_menus_table', 5),
(23, '2022_09_25_144326_add_column_slug_to_menus_table', 6),
(24, '2022_09_26_031201_create_product_tags_table', 7),
(25, '2022_09_26_031415_create_tags_table', 7),
(26, '2022_10_03_131340_add_column_feature_image_name_to_products_table', 8),
(27, '2022_10_03_133652_add_column_image_name_to_product_images_table', 9),
(28, '2022_10_04_134236_add_column_soft_delete_to_products_table', 10),
(29, '2022_10_05_030709_create_sliders_table', 11),
(31, '2022_10_06_130706_create_settings_table', 12),
(33, '2022_10_08_044118_add_column_amount_to_products_table', 13),
(34, '2022_10_13_070529_create_roles_table', 14),
(35, '2022_10_13_070645_create_permissions_table', 14),
(36, '2022_10_13_070850_create_table_user_role', 14),
(37, '2022_10_13_070930_create_table_permission_role', 14),
(39, '2022_10_15_081747_add_parent_id_column_to_permission_table', 15),
(43, '2022_10_15_094831_add_keycode_column_to_permissions_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `key_code`, `parent_id`, `created_at`, `updated_at`) VALUES
(13, 'user', 'user', NULL, 0, '2022-10-16 00:00:59', '2022-10-16 00:00:59'),
(14, 'list user', 'list user', 'list_user', 13, '2022-10-16 00:00:59', '2022-10-16 00:00:59'),
(15, 'create user', 'create user', 'create_user', 13, '2022-10-16 00:00:59', '2022-10-16 00:00:59'),
(16, 'edit user', 'edit user', 'edit_user', 13, '2022-10-16 00:00:59', '2022-10-16 00:00:59'),
(17, 'delete user', 'delete user', 'delete_user', 13, '2022-10-16 00:00:59', '2022-10-16 00:00:59'),
(26, 'slider', 'slider', NULL, 0, '2022-10-16 00:20:07', '2022-10-16 00:20:07'),
(27, 'list slider', 'list slider', 'list_slider', 26, '2022-10-16 00:20:07', '2022-10-16 00:20:07'),
(28, 'create slider', 'create slider', 'create_slider', 26, '2022-10-16 00:20:07', '2022-10-16 00:20:07'),
(29, 'edit slider', 'edit slider', 'edit_slider', 26, '2022-10-16 00:20:07', '2022-10-16 00:20:07'),
(30, 'delete slider', 'delete slider', 'delete_slider', 26, '2022-10-16 00:20:07', '2022-10-16 00:20:07'),
(31, 'menu', 'menu', NULL, 0, '2022-10-16 00:20:17', '2022-10-16 00:20:17'),
(32, 'list menu', 'list menu', 'list_menu', 31, '2022-10-16 00:20:17', '2022-10-16 00:20:17'),
(33, 'create menu', 'create menu', 'create_menu', 31, '2022-10-16 00:20:17', '2022-10-16 00:20:17'),
(34, 'edit menu', 'edit menu', 'edit_menu', 31, '2022-10-16 00:20:17', '2022-10-16 00:20:17'),
(35, 'delete menu', 'delete menu', 'delete_menu', 31, '2022-10-16 00:20:17', '2022-10-16 00:20:17'),
(36, 'product', 'product', NULL, 0, '2022-10-16 00:20:20', '2022-10-16 00:20:20'),
(37, 'list product', 'list product', 'list_product', 36, '2022-10-16 00:20:20', '2022-10-16 00:20:20'),
(38, 'create product', 'create product', 'create_product', 36, '2022-10-16 00:20:20', '2022-10-16 00:20:20'),
(39, 'edit product', 'edit product', 'edit_product', 36, '2022-10-16 00:20:20', '2022-10-16 00:20:20'),
(40, 'delete product', 'delete product', 'delete_product', 36, '2022-10-16 00:20:20', '2022-10-16 00:20:20'),
(41, 'setting', 'setting', NULL, 0, '2022-10-16 00:20:23', '2022-10-16 00:20:23'),
(42, 'list setting', 'list setting', 'list_setting', 41, '2022-10-16 00:20:23', '2022-10-16 00:20:23'),
(43, 'create setting', 'create setting', 'create_setting', 41, '2022-10-16 00:20:23', '2022-10-16 00:20:23'),
(44, 'edit setting', 'edit setting', 'edit_setting', 41, '2022-10-16 00:20:23', '2022-10-16 00:20:23'),
(45, 'delete setting', 'delete setting', 'delete_setting', 41, '2022-10-16 00:20:23', '2022-10-16 00:20:23'),
(46, 'role', 'role', NULL, 0, '2022-10-16 00:20:29', '2022-10-16 00:20:29'),
(47, 'list role', 'list role', 'list_role', 46, '2022-10-16 00:20:29', '2022-10-16 00:20:29'),
(48, 'create role', 'create role', 'create_role', 46, '2022-10-16 00:20:29', '2022-10-16 00:20:29'),
(49, 'edit role', 'edit role', 'edit_role', 46, '2022-10-16 00:20:29', '2022-10-16 00:20:29'),
(50, 'delete role', 'delete role', 'delete_role', 46, '2022-10-16 00:20:29', '2022-10-16 00:20:29'),
(51, 'category', 'category', NULL, 0, '2022-10-16 00:21:04', '2022-10-16 00:21:04'),
(52, 'list category', 'list category', 'list_category', 51, '2022-10-16 00:21:04', '2022-10-16 00:21:04'),
(53, 'create category', 'create category', 'create_category', 51, '2022-10-16 00:21:04', '2022-10-16 00:21:04'),
(54, 'edit category', 'edit category', 'edit_category', 51, '2022-10-16 00:21:04', '2022-10-16 00:21:04'),
(55, 'delete category', 'delete category', 'delete_category', 51, '2022-10-16 00:21:04', '2022-10-16 00:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 6, 2, NULL, NULL),
(2, 6, 3, NULL, NULL),
(3, 6, 5, NULL, NULL),
(4, 6, 6, NULL, NULL),
(5, 7, 3, NULL, NULL),
(13, 1, 15, NULL, NULL),
(16, 1, 27, NULL, NULL),
(17, 1, 28, NULL, NULL),
(18, 1, 29, NULL, NULL),
(19, 1, 30, NULL, NULL),
(20, 1, 32, NULL, NULL),
(21, 1, 33, NULL, NULL),
(22, 1, 34, NULL, NULL),
(23, 1, 35, NULL, NULL),
(24, 1, 37, NULL, NULL),
(25, 1, 38, NULL, NULL),
(26, 1, 39, NULL, NULL),
(27, 1, 40, NULL, NULL),
(28, 1, 42, NULL, NULL),
(29, 1, 43, NULL, NULL),
(30, 1, 44, NULL, NULL),
(31, 1, 45, NULL, NULL),
(32, 1, 47, NULL, NULL),
(33, 1, 48, NULL, NULL),
(34, 1, 49, NULL, NULL),
(35, 1, 50, NULL, NULL),
(36, 1, 52, NULL, NULL),
(37, 1, 53, NULL, NULL),
(38, 1, 54, NULL, NULL),
(39, 1, 55, NULL, NULL),
(40, 2, 27, NULL, NULL),
(41, 2, 28, NULL, NULL),
(42, 2, 29, NULL, NULL),
(43, 2, 30, NULL, NULL),
(44, 2, 32, NULL, NULL),
(45, 2, 33, NULL, NULL),
(46, 2, 34, NULL, NULL),
(47, 2, 35, NULL, NULL),
(48, 2, 37, NULL, NULL),
(49, 2, 38, NULL, NULL),
(50, 2, 39, NULL, NULL),
(51, 2, 40, NULL, NULL),
(52, 2, 52, NULL, NULL),
(53, 2, 53, NULL, NULL),
(54, 2, 54, NULL, NULL),
(55, 2, 55, NULL, NULL),
(56, 3, 37, NULL, NULL),
(57, 3, 38, NULL, NULL),
(58, 3, 39, NULL, NULL),
(59, 3, 40, NULL, NULL),
(60, 3, 52, NULL, NULL),
(61, 3, 53, NULL, NULL),
(62, 3, 54, NULL, NULL),
(63, 3, 55, NULL, NULL),
(64, 4, 14, NULL, NULL),
(65, 4, 15, NULL, NULL),
(66, 4, 16, NULL, NULL),
(67, 4, 17, NULL, NULL),
(68, 4, 27, NULL, NULL),
(69, 4, 28, NULL, NULL),
(70, 4, 29, NULL, NULL),
(71, 4, 30, NULL, NULL),
(72, 4, 32, NULL, NULL),
(73, 4, 33, NULL, NULL),
(74, 4, 34, NULL, NULL),
(75, 4, 35, NULL, NULL),
(76, 4, 37, NULL, NULL),
(77, 4, 38, NULL, NULL),
(78, 4, 39, NULL, NULL),
(79, 4, 40, NULL, NULL),
(80, 4, 42, NULL, NULL),
(81, 4, 43, NULL, NULL),
(82, 4, 44, NULL, NULL),
(83, 4, 45, NULL, NULL),
(84, 4, 52, NULL, NULL),
(85, 4, 53, NULL, NULL),
(86, 4, 54, NULL, NULL),
(87, 4, 55, NULL, NULL),
(88, 14, 37, NULL, NULL),
(89, 14, 38, NULL, NULL),
(90, 14, 39, NULL, NULL),
(91, 14, 40, NULL, NULL),
(92, 1, 16, NULL, NULL),
(93, 1, 14, NULL, NULL),
(94, 1, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `feature_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `amount`, `feature_image_path`, `feature_image_name`, `content`, `user_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'KT Tim Đá Rỗng', '150,000.00', NULL, '/storage/products/31/iaynMfFEdaW713ZwrZok.jpg', 'img_1940_thumb.jpg', '<div class=\"stock-item\"><span class=\"dist\" title=\"STORE 47A Xuân Thuỷ\">STORE 47A Xuân Thuỷ: </span><span class=\"street\" title=\"STORE 47A Xuân Thuỷ\">STORE 47A Xuân Thuỷ</span>\r\n<p class=\"link\"><a href=\"http://map.google.com/maps/place/STORE%2047A%20Xu%C3%A2n%20Thu%E1%BB%B7/@,\" target=\"_blank\" rel=\"noopener\">(Xem bản đồ)</a> (Còn hàng)</p>\r\n</div>\r\n<div class=\"stock-item\"><span class=\"dist\" title=\"STORE 20 Tây Sơn\">STORE 20 Tây Sơn: </span><span class=\"street\" title=\"STORE 20 Tây Sơn\">STORE 20 Tây Sơn</span>\r\n<p class=\"link\"><a href=\"http://map.google.com/maps/place/STORE%2020%20T%C3%A2y%20S%C6%A1n/@,\" target=\"_blank\" rel=\"noopener\">(Xem bản đồ)</a> (Còn hàng)</p>\r\n</div>', 31, 19, '2022-10-08 02:12:09', '2022-10-08 03:31:05', NULL),
(22, 'LT Daisy Tini', '310,000.00', NULL, '/storage/products/31/1qzpkNpyyjGl1pbeqQmw.jpg', 'LT616_1.jpg', '<div class=\"stock-item\"><span class=\"dist\" title=\"STORE 47A Xuân Thuỷ\">STORE 47A Xuân Thuỷ: </span><span class=\"street\" title=\"STORE 47A Xuân Thuỷ\">STORE 47A Xuân Thuỷ</span>\r\n<p class=\"link\"><a href=\"http://map.google.com/maps/place/STORE%2047A%20Xu%C3%A2n%20Thu%E1%BB%B7/@,\" target=\"_blank\" rel=\"noopener\">(Xem bản đồ)</a> (Còn hàng)</p>\r\n</div>\r\n<div class=\"stock-item\"><span class=\"dist\" title=\"STORE 20 Tây Sơn\">STORE 20 Tây Sơn: </span><span class=\"street\" title=\"STORE 20 Tây Sơn\">STORE 20 Tây Sơn</span>\r\n<p class=\"link\"><a href=\"http://map.google.com/maps/place/STORE%2020%20T%C3%A2y%20S%C6%A1n/@,\" target=\"_blank\" rel=\"noopener\">(Xem bản đồ)</a> (Còn hàng)</p>\r\n</div>', 31, 20, '2022-10-08 02:13:44', '2022-10-08 03:27:24', NULL),
(23, 'LC Thanh Ngang Đá Treo', '330,000.00', NULL, '/storage/products/31/FsrWMSdkAVwkkExvQ3FS.jpg', 'z2963496734813_b708b6d503ff42fb0377cab544a0ce1a.jpg', '<div class=\"stock-item\"><span class=\"dist\" title=\"STORE 20 Tây Sơn\">STORE 20 Tây Sơn: </span><span class=\"street\" title=\"STORE 20 Tây Sơn\">STORE 20 Tây Sơn</span>\r\n<p class=\"link\"><a href=\"http://map.google.com/maps/place/STORE%2020%20T%C3%A2y%20S%C6%A1n/@,\" target=\"_blank\" rel=\"noopener\">(Xem bản đồ)</a> (Còn hàng)</p>\r\n</div>\r\n<div class=\"stock-item\"><span class=\"dist\" title=\"STORE 47A Xuân Thuỷ\">STORE 47A Xuân Thuỷ: </span><span class=\"street\" title=\"STORE 47A Xuân Thuỷ\">STORE 47A Xuân Thuỷ</span>\r\n<p class=\"link\"><a href=\"http://map.google.com/maps/place/STORE%2047A%20Xu%C3%A2n%20Thu%E1%BB%B7/@,\" target=\"_blank\" rel=\"noopener\">(Xem bản đồ)</a> (Còn hàng)</p>\r\n</div>', 31, 21, '2022-10-08 02:15:20', '2022-10-08 03:26:41', NULL),
(24, 'DC Daisy Tini', '350,000.00', NULL, '/storage/products/31/YZlJkJKtXPEkjvfBHLCP.jpg', 'a491d21b68dc9282cbcd.jpg', '<div class=\"stock-item\"><span class=\"dist\" title=\"STORE 47A Xuân Thuỷ\">STORE 47A Xuân Thuỷ: </span><span class=\"street\" title=\"STORE 47A Xuân Thuỷ\">STORE 47A Xuân Thuỷ</span>\r\n<p class=\"link\"><a href=\"http://map.google.com/maps/place/STORE%2047A%20Xu%C3%A2n%20Thu%E1%BB%B7/@,\" target=\"_blank\" rel=\"noopener\">(Xem bản đồ)</a> (Còn hàng)</p>\r\n</div>\r\n<div class=\"stock-item\"><span class=\"dist\" title=\"STORE 20 Tây Sơn\">STORE 20 Tây Sơn: </span><span class=\"street\" title=\"STORE 20 Tây Sơn\">STORE 20 Tây Sơn</span>\r\n<p class=\"link\"><a href=\"http://map.google.com/maps/place/STORE%2020%20T%C3%A2y%20S%C6%A1n/@,\" target=\"_blank\" rel=\"noopener\">(Xem bản đồ)</a> (Còn hàng)</p>\r\n</div>', 31, 17, '2022-10-08 02:17:18', '2022-10-08 03:26:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `image_name`, `product_id`, `created_at`, `updated_at`) VALUES
(26, '/storage/products/41/0tDzzowjQt5ZYsxjWZPw.jpg', 'LT610.jpg', 19, '2022-10-08 02:08:12', '2022-10-08 02:08:12'),
(27, '/storage/products/41/3kUnHlhsJzIi9HgPO310.jpg', 'LT610__1_.jpg', 19, '2022-10-08 02:08:12', '2022-10-08 02:08:12'),
(28, '/storage/products/41/fJlPr5m8AW9EEjXVJHor.jpg', 'lc257.jpg', 20, '2022-10-08 02:09:17', '2022-10-08 02:09:17'),
(29, '/storage/products/41/AHSBDP4Uqk9lb4VKHZZA.jpg', 'lc257_1.jpg', 20, '2022-10-08 02:09:17', '2022-10-08 02:09:17'),
(30, '/storage/products/41/6XirdNG07MxbDUzbsEhA.jpg', 'dd8d506da2a144ff1db0.jpg', 21, '2022-10-08 02:12:09', '2022-10-08 02:12:09'),
(31, '/storage/products/41/Yl8kucYKiSFYCzNeIMNa.jpg', 'img_1940.jpg', 21, '2022-10-08 02:12:09', '2022-10-08 02:12:09'),
(32, '/storage/products/41/nbbwMSjg7UniKvG6Ypm1.jpg', 'img_1941.jpg', 21, '2022-10-08 02:12:09', '2022-10-08 02:12:09'),
(33, '/storage/products/41/GpcLr8YKiLEyNopEdsp6.jpg', '22.jpg', 22, '2022-10-08 02:13:44', '2022-10-08 02:13:44'),
(34, '/storage/products/41/tEp0eK1fpG3Jd6eaNNjt.jpg', '107044627_1224752287857170_326756194299242394_o.jpg', 22, '2022-10-08 02:13:44', '2022-10-08 02:13:44'),
(35, '/storage/products/41/NvISLuJUWUW67DLEZw2A.jpg', 'a491d21b68dc9282cbcd.jpg', 22, '2022-10-08 02:13:44', '2022-10-08 02:13:44'),
(36, '/storage/products/41/yCUv3YZtDDCZCThj5YLl.jpg', 'lc222.jpg', 23, '2022-10-08 02:15:20', '2022-10-08 02:15:20'),
(37, '/storage/products/41/6roRMrlCePCn3Obueii9.jpg', 'lc222__1_.jpg', 23, '2022-10-08 02:15:20', '2022-10-08 02:15:20'),
(38, '/storage/products/41/cWwmqbHFVLhlxUylVHza.jpg', '13_8_03.jpg', 24, '2022-10-08 02:17:18', '2022-10-08 02:17:18'),
(39, '/storage/products/41/YNfRpCTQ3Op92bq063LP.jpg', '13_8_04.jpg', 24, '2022-10-08 02:17:18', '2022-10-08 02:17:18'),
(40, '/storage/products/41/qejOBaeBbCfKE4uMXq2o.jpg', '27_5_daisy_tini_01.jpg', 24, '2022-10-08 02:17:18', '2022-10-08 02:17:18'),
(41, '/storage/products/41/TMp0vTJ257W4dbMj3wof.jpg', 'img_7163_min.jpg', 24, '2022-10-08 02:17:18', '2022-10-08 02:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 6, 1, NULL, NULL),
(2, 6, 2, NULL, NULL),
(9, 7, 9, '2022-10-04 02:14:26', '2022-10-04 02:14:26'),
(10, 10, 10, '2022-10-04 07:24:28', '2022-10-04 07:24:28'),
(11, 10, 11, '2022-10-04 07:24:28', '2022-10-04 07:24:28'),
(12, 11, 10, '2022-10-07 23:55:26', '2022-10-07 23:55:26'),
(13, 11, 11, '2022-10-07 23:55:26', '2022-10-07 23:55:26'),
(14, 12, 10, '2022-10-07 23:56:24', '2022-10-07 23:56:24'),
(15, 12, 11, '2022-10-07 23:56:24', '2022-10-07 23:56:24'),
(16, 13, 10, '2022-10-08 01:32:55', '2022-10-08 01:32:55'),
(17, 13, 11, '2022-10-08 01:32:55', '2022-10-08 01:32:55'),
(18, 14, 10, '2022-10-08 01:35:58', '2022-10-08 01:35:58'),
(19, 14, 11, '2022-10-08 01:35:58', '2022-10-08 01:35:58'),
(20, 15, 10, '2022-10-08 01:37:16', '2022-10-08 01:37:16'),
(21, 15, 11, '2022-10-08 01:37:16', '2022-10-08 01:37:16'),
(22, 16, 10, '2022-10-08 01:38:39', '2022-10-08 01:38:39'),
(23, 16, 11, '2022-10-08 01:38:39', '2022-10-08 01:38:39'),
(24, 17, 10, '2022-10-08 02:01:32', '2022-10-08 02:01:32'),
(25, 17, 11, '2022-10-08 02:01:32', '2022-10-08 02:01:32'),
(26, 18, 10, '2022-10-08 02:05:20', '2022-10-08 02:05:20'),
(27, 18, 11, '2022-10-08 02:05:20', '2022-10-08 02:05:20'),
(28, 19, 10, '2022-10-08 02:08:12', '2022-10-08 02:08:12'),
(29, 19, 11, '2022-10-08 02:08:12', '2022-10-08 02:08:12'),
(30, 20, 10, '2022-10-08 02:09:17', '2022-10-08 02:09:17'),
(31, 20, 11, '2022-10-08 02:09:17', '2022-10-08 02:09:17'),
(32, 21, 10, '2022-10-08 02:12:09', '2022-10-08 02:12:09'),
(33, 21, 11, '2022-10-08 02:12:09', '2022-10-08 02:12:09'),
(34, 22, 10, '2022-10-08 02:13:44', '2022-10-08 02:13:44'),
(35, 22, 11, '2022-10-08 02:13:44', '2022-10-08 02:13:44'),
(36, 23, 10, '2022-10-08 02:15:20', '2022-10-08 02:15:20'),
(37, 23, 11, '2022-10-08 02:15:20', '2022-10-08 02:15:20'),
(38, 24, 10, '2022-10-08 02:17:18', '2022-10-08 02:17:18'),
(39, 24, 11, '2022-10-08 02:17:18', '2022-10-08 02:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Quản lý', NULL, '2022-10-16 00:23:43'),
(2, 'Content', 'Phát triển nội dung', NULL, '2022-10-16 00:23:38'),
(3, 'Saler', 'Bán hàng', NULL, '2022-10-16 00:23:11'),
(4, 'Developer', 'Phát triển hệ thống', NULL, '2022-10-16 00:24:16'),
(14, 'Guest', 'Khách hàng', '2022-10-16 00:45:01', '2022-10-16 00:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 47, NULL, NULL),
(3, 2, 47, NULL, NULL),
(4, 1, 31, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`) VALUES
(3, '21312321', '31313', '2022-10-06 08:17:15', '2022-10-06 08:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `image_path`, `image_name`, `created_at`, `updated_at`) VALUES
(4, 'dfgdfg', 'dâda', '/storage/sliders/31/iG7AfeknfOsAJFHsNx23.jpg', 'Banner_ngoc_trai_scheme_1972x640CTA.jpg', '2022-10-08 01:42:08', '2022-10-08 03:41:05'),
(5, 'eqqeeqqe123', 'gdfg', '/storage/sliders/31/dWWCe1seS9tpcaQgP9QZ.jpg', '123.jpg', '2022-10-08 01:44:18', '2022-10-08 03:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'hello', '2022-10-03 08:03:32', '2022-10-03 08:03:32'),
(2, 'friend', '2022-10-03 08:03:32', '2022-10-03 08:03:32'),
(3, 'baby', '2022-10-03 08:09:22', '2022-10-03 08:09:22'),
(6, '1', '2022-10-04 02:12:13', '2022-10-04 02:12:13'),
(7, 'ken', '2022-10-04 02:12:13', '2022-10-04 02:12:13'),
(8, '7', '2022-10-04 02:12:53', '2022-10-04 02:12:53'),
(9, 'neymar', '2022-10-04 02:14:26', '2022-10-04 02:14:26'),
(10, 'orange', '2022-10-04 07:24:28', '2022-10-04 07:24:28'),
(11, 'purple', '2022-10-04 07:24:28', '2022-10-04 07:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ottilie McGlynn', 'tward@example.com', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UQTMHhby5AoR9AbZspFMkt14fSpHSBnRiQHXqn4317f38NMGXUQNjmyaqx9F', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(2, 'Dr. Quinten Bosco PhD', 'wunsch.demond@example.org', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Z6pGT0kftO', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(3, 'Pierce Sauer', 'nicola.schultz@example.net', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '90LVQHGNwm', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(4, 'Helena Bauch', 'lora.morar@example.com', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xcQSVVz7hY', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(5, 'Makayla Buckridge', 'josiah.towne@example.org', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xlW2bKL2Ee', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(6, 'Mr. Gordon Green', 'justine81@example.org', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YDzA0wTgrZ', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(7, 'Katlyn Heller', 'kertzmann.miguel@example.net', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rwRB0PPs8J', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(8, 'Prof. Leonie Langosh PhD', 'quigley.adaline@example.org', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OeSVMkM53p', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(9, 'Kraig Mayer', 'xkiehn@example.net', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wenM2PBeDl', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(10, 'Art Schmidt', 'myrtice55@example.com', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6XbTPBxb8v', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(11, 'Judge Wisoky III', 'dixie.swaniawski@example.net', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HfisDueYsV', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(12, 'Verda Ratke', 'maximillia.daniel@example.net', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DmcNrHP54N', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(13, 'Manuela Fahey', 'reba80@example.net', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hruxk8PlOg', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(14, 'Carol Rutherford V', 'oaufderhar@example.org', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RX19DNsD9Z', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(15, 'Leopold Stanton', 'corkery.malcolm@example.net', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QyaiN4hhCV', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(16, 'Viola Block', 'kozey.may@example.com', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sCILtiiMnw', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(17, 'Gabrielle Wolf III', 'cielo.stroman@example.org', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '00SbOQYyB8', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(18, 'Mauricio Lueilwitz', 'cmccullough@example.com', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '89nnNcyVh0', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(19, 'Ford O\'Reilly', 'daniel.sincere@example.org', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RRWUVyUFx2', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(20, 'Brian Stoltenberg', 'adrianna.torp@example.org', '2022-09-10 20:14:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5APu8l7OHn', '2022-09-10 20:14:10', '2022-09-10 20:14:10'),
(21, 'Bridie Effertz', 'brady.weissnat@example.com', '2022-09-10 20:15:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tCBDMbM2mj', '2022-09-10 20:15:54', '2022-09-10 20:15:54'),
(22, 'June Cronin', 'ullrich.augusta@example.net', '2022-09-10 20:15:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KtVVmx1Crr', '2022-09-10 20:15:54', '2022-09-10 20:15:54'),
(23, 'Ms. Willie Stehr', 'jstamm@example.net', '2022-09-10 20:15:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uFx3NkX1UZ', '2022-09-10 20:15:54', '2022-09-10 20:15:54'),
(24, 'Adele Kuhic', 'teresa93@example.org', '2022-09-10 20:15:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RN1S7sYyVu', '2022-09-10 20:15:54', '2022-09-10 20:15:54'),
(25, 'Mallory Murphy Sr.', 'jon09@example.com', '2022-09-10 20:15:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fY6qv8IUI7', '2022-09-10 20:15:54', '2022-09-10 20:15:54'),
(26, 'Prof. Shaylee Klein', 'raynor.mohammad@example.net', '2022-09-10 20:15:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dCIrtC3uTK', '2022-09-10 20:15:54', '2022-09-10 20:15:54'),
(27, 'Yvette Miller', 'colin.roob@example.org', '2022-09-10 20:15:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5fLp3zSK8f', '2022-09-10 20:15:54', '2022-09-10 20:15:54'),
(28, 'Prof. Nadia Prohaska', 'leffler.glenda@example.com', '2022-09-10 20:15:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'diK7l1XkGt', '2022-09-10 20:15:54', '2022-09-10 20:15:54'),
(29, 'Prof. Jovany Lang MD', 'chet80@example.net', '2022-09-10 20:15:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '75Z5Dpxtau', '2022-09-10 20:15:54', '2022-09-10 20:15:54'),
(30, 'Kiera Wunsch', 'jgusikowski@example.org', '2022-09-10 20:15:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Vd9kCxXAQ7', '2022-09-10 20:15:54', '2022-09-10 20:15:54'),
(31, 'thuan', 'thuan@gmail.com', NULL, '$2y$10$FWSjy84yYinNCsbvaZIl8eU7OrhDb4k8A2RhI59YeVKsvr8LpmjN2', '8nTWPUj4sVB9yO53Uag2Qv9ZcNO4rsJ8hwcIgrf7ROFp31EGxL6h5rH27vvN', '2022-09-10 21:20:12', '2022-09-10 21:20:12'),
(32, 'ken', 'ken@gmail.com', NULL, '$2y$10$6.Q6iJUwzqCtYiaHZ81MwOsV4DKNCQJcoVGSN/.tNQ3mKM2Bg7JYK', NULL, '2022-09-20 21:01:28', '2022-09-20 21:01:28'),
(33, 'ken', 'ken123@gmail.com', NULL, '$2y$10$2OoQo53WUGBKVjq9Jxa8uOAG7hX8snO/6T.DVhR8tkHDpMZdQFBPG', NULL, '2022-09-20 21:02:42', '2022-09-20 21:02:42'),
(35, 'zczxc', '123@gmail.com', NULL, '$2y$10$vnnLjXhJ1KOiGVRg/DyIkuOsvac8wFjYyPInzocRoViIeAM51TuDm', NULL, '2022-09-21 07:26:20', '2022-09-21 07:26:20'),
(36, 'zxc', '111@gmail.com', NULL, '$2y$10$Jc/55uTpkEDfm2uWpXiEuuh1ul7iAYg00ktsshuT791QMm/AkBfly', NULL, '2022-09-22 08:10:17', '2022-09-22 08:10:17'),
(41, 'Tu Phan', 'clgtqwe1@gmail.com', NULL, '$2y$10$jKLqwj2vHJvVgzZLKERIruodZ3TGHQSELi8MlY9QWrTlbSN0aozcW', NULL, '2022-10-08 00:57:45', '2022-10-08 00:57:45'),
(42, 'thuan123', 'thuan@gmaisdfal.com', NULL, '$2y$10$3phxJYUwFbjhwn9o3e5TcOKONn/6lgLR5eU62DjpG45LeAGLiPaw2', NULL, '2022-10-13 08:21:15', '2022-10-14 21:17:14'),
(47, 'àgfsdgfdg12345', 'adsasdasd@gmail.com12345', NULL, '$2y$10$McF2OAfMcBY4PO/aB8bWxudGQQRbACwXloq8rWduO1RGRy25NSuaK', NULL, '2022-10-13 08:30:57', '2022-10-14 21:15:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
