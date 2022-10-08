-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 08, 2022 at 07:47 AM
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
-- Database: `laravel9`
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
(1, 'Giày Sneaker', 0, 'giay-sneaker', '2022-09-20 07:05:56', '2022-09-20 07:05:56', NULL),
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
(13, '43242', 0, '43242', '2022-10-06 04:22:12', '2022-10-06 04:22:12', NULL),
(14, 'tgew', 0, 'tgew', '2022-10-06 04:26:59', '2022-10-06 04:30:32', '2022-10-06 04:30:32'),
(15, 'ergwerwg', 0, 'ergwerwg', '2022-10-06 04:27:01', '2022-10-06 04:27:08', '2022-10-06 04:27:08'),
(16, '342', 0, '342', '2022-10-06 04:27:02', '2022-10-06 04:30:29', '2022-10-06 04:30:29');

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
(4, 'menu 1.1.1', 3, '', NULL, NULL),
(5, 'menu 1.2', 1, '', NULL, NULL),
(6, 'Menu 2.1', 2, '', '2022-09-24 21:52:15', '2022-09-24 21:52:15');

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
(33, '2022_10_08_044118_add_column_amount_to_products_table', 13);

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
(1, 'Adida originlal nike vip', '2000', NULL, '/storage/products/31/CqIcgzd71fB1zxB48knB.png', NULL, '<p>Mua Gi&agrave;y&nbsp;Nike Air Force 1 \'07 \'Triple Black\' CW2288-001 ch&iacute;nh h&atilde;ng 100% c&oacute; sẵn tại&nbsp;<a href=\"https://authentic-shoes.com/\" target=\"_blank\" rel=\"noopener\">Authentic Shoes</a>. Giao h&agrave;ng miễn ph&iacute; trong 1 ng&agrave;y. Cam kết đền tiền X5 nếu ph&aacute;t hiện Fake. Đổi trả miễn ph&iacute; size. FREE vệ sinh gi&agrave;y &nbsp;trọn đời. MUA NGAY!</p>', 31, 5, '2022-09-20 19:51:55', '2022-09-20 19:51:55', NULL),
(2, '231231', '2,000,000.00', NULL, '/storage/products/31/QoKaAamRvs0dhEFZ8Wuc.png', '8609_01.png', '<p>dasdf</p>', 31, 2, '2022-10-03 07:10:59', '2022-10-03 07:10:59', NULL),
(3, 'hgfhdfh', '3,232,323.00', NULL, '/storage/products/31/4eZh5A4TUwZxXGmiGABV.jpg', '305312782_155300693797056_275705105623707881_n.jpg', '<p>sdaf</p>', 31, 6, '2022-10-03 07:16:05', '2022-10-06 04:29:51', '2022-10-06 04:29:51'),
(4, 'sfdafsdf', '20,000.00', NULL, '/storage/products/31/cYhPYwYGiu9lhfqyFJip.jpg', '305312782_155300693797056_275705105623707881_n.jpg', '<p>fdg</p>', 31, 3, '2022-10-03 07:28:43', '2022-10-06 04:29:47', '2022-10-06 04:29:47'),
(10, 'dfgdfsgfd', '15,500,000.00', NULL, '/storage/products/31/vIfpg8Z0CS0TEUh5ozz0.png', 'giayjordan.png', '<p>fdg</p>', 31, 6, '2022-10-04 07:24:28', '2022-10-06 04:27:52', '2022-10-06 04:27:52'),
(11, 'dsfgdfg', '20,000.00', NULL, '/storage/products/31/Dy4FHIGd5RFpMxK1qkTH.jpg', 'ban do.jpg', '<p>hdt</p>', 31, 1, '2022-10-07 23:55:26', '2022-10-07 23:55:26', NULL),
(12, 'fgfsdgfdsg', '20,000.00', 23, '/storage/products/31/NWrMZ5p02ToDEsew5nwI.png', 'giayjordan.png', '<p>fgd</p>', 31, 1, '2022-10-07 23:56:24', '2022-10-07 23:56:24', NULL);

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
(1, '/storage/products/31/D7RuDCe4BtLvshHShRHJ.png', '719115_01.png', 3, '2022-10-03 07:16:05', '2022-10-03 07:16:05'),
(2, '/storage/products/31/jhOTgukoClX5hqfklJhK.png', 'giayjordan.png', 3, '2022-10-03 07:16:05', '2022-10-03 07:16:05'),
(3, '/storage/products/31/9EuuzoNLocX8RofZTudP.png', '719115_01.png', 4, '2022-10-03 07:28:43', '2022-10-03 07:28:43'),
(4, '/storage/products/31/ZRYU15O8uRKIP0YAuXsD.jpg', '305312782_155300693797056_275705105623707881_n.jpg', 4, '2022-10-03 07:28:43', '2022-10-03 07:28:43'),
(5, '/storage/products/31/ixLIwfas2WUCF2qcinuK.png', '8609_01.png', 5, '2022-10-03 08:03:19', '2022-10-03 08:03:19'),
(6, '/storage/products/31/JTSJvHipiWTgx24i2Em7.png', '719115_01.png', 5, '2022-10-03 08:03:19', '2022-10-03 08:03:19'),
(7, '/storage/products/31/e7Z7uepcQc2kcUYqxe9q.png', '8609_01.png', 6, '2022-10-03 08:03:32', '2022-10-03 08:03:32'),
(8, '/storage/products/31/myacSvvmApoQQmJ4WNl4.png', '719115_01.png', 6, '2022-10-03 08:03:32', '2022-10-03 08:03:32'),
(9, '/storage/products/31/DSFJxecmy1eaVrVTzRM9.jpg', 'ban do 3.jpg', 7, '2022-10-03 08:09:22', '2022-10-03 08:09:22'),
(10, '/storage/products/31/BhgQ87PgViAjdiG8CVnR.jpg', 'ban do 2.jpg', 7, '2022-10-03 08:09:22', '2022-10-03 08:09:22'),
(12, '/storage/products/31/lUpPdof0Nh9cn9wuhaJS.png', '8609_01.png', 9, '2022-10-03 08:46:09', '2022-10-03 08:46:09'),
(13, '/storage/products/31/iGZQoMc6Qvut0BQebvC5.png', '719115_01.png', 10, '2022-10-04 07:24:28', '2022-10-04 07:24:28'),
(14, '/storage/products/31/P4auOpYr3O5TPZGkffJj.jpg', 'bieu do.jpg', 11, '2022-10-07 23:55:26', '2022-10-07 23:55:26'),
(15, '/storage/products/31/NsnSPgR7ySxFBJsEk6vw.png', '719115_01.png', 12, '2022-10-07 23:56:24', '2022-10-07 23:56:24');

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
(15, 12, 11, '2022-10-07 23:56:24', '2022-10-07 23:56:24');

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
(3, 'dfgssdfg123', 'dsfgdfg123', '/storage/sliders/31/XK3q7KOv1sJRF2lvWjgh.png', 'giayjordan.png', '2022-10-06 06:02:45', '2022-10-06 06:02:50');

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
(31, 'thuan', 'thuan@gmail.com', NULL, '$2y$10$FWSjy84yYinNCsbvaZIl8eU7OrhDb4k8A2RhI59YeVKsvr8LpmjN2', 'ffX3qNgA0C19VfCDdo5hG1p9ry1yoTWV84G6V0RNxXFiNoba8m2TAZPFLQC3', '2022-09-10 21:20:12', '2022-09-10 21:20:12'),
(32, 'ken', 'ken@gmail.com', NULL, '$2y$10$6.Q6iJUwzqCtYiaHZ81MwOsV4DKNCQJcoVGSN/.tNQ3mKM2Bg7JYK', NULL, '2022-09-20 21:01:28', '2022-09-20 21:01:28'),
(33, 'ken', 'ken123@gmail.com', NULL, '$2y$10$2OoQo53WUGBKVjq9Jxa8uOAG7hX8snO/6T.DVhR8tkHDpMZdQFBPG', NULL, '2022-09-20 21:02:42', '2022-09-20 21:02:42'),
(34, 'baby', 'abc@gmail.com', NULL, '$2y$10$5KIl3uXkrNMTTMXYFDmcyOzemTx7JdrY5V01OZTeSJ9HJokBkugqu', NULL, '2022-09-21 00:31:22', '2022-09-21 00:31:22'),
(35, 'zczxc', '123@gmail.com', NULL, '$2y$10$vnnLjXhJ1KOiGVRg/DyIkuOsvac8wFjYyPInzocRoViIeAM51TuDm', NULL, '2022-09-21 07:26:20', '2022-09-21 07:26:20'),
(36, 'zxc', '111@gmail.com', NULL, '$2y$10$Jc/55uTpkEDfm2uWpXiEuuh1ul7iAYg00ktsshuT791QMm/AkBfly', NULL, '2022-09-22 08:10:17', '2022-09-22 08:10:17'),
(38, 'thai', 'thai@gmail.com', NULL, '$2y$10$.VOdjZ5QN.wpujGZLnkMw.GD8aDEYoSrtTq/qxVfLoaMWiVZxwODi', NULL, '2022-09-23 18:40:55', '2022-09-23 18:40:55');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
