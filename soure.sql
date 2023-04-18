-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for source
CREATE DATABASE IF NOT EXISTS `source` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `source`;

-- Dumping structure for table source.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` time DEFAULT NULL,
  `last_name` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avarta_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `super_user` tinyint(4) DEFAULT NULL,
  `manage_supers` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  UNIQUE KEY `admins_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.admins: ~1 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
REPLACE INTO `admins` (`id`, `email`, `name`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login`, `last_name`, `avarta_id`, `super_user`, `manage_supers`) VALUES
	(1, 'tranthng207@gmail.com', 'admin', NULL, '$2y$10$USKkv4skJcQEkJLu25EfFez/vsHid0vUgyNR9JTX9XR7i.atPdT1G', NULL, NULL, '2023-02-28 05:04:58', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table source.blocks
CREATE TABLE IF NOT EXISTS `blocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `target` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.blocks: ~2 rows (approximately)
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
REPLACE INTO `blocks` (`id`, `name`, `alias`, `description`, `slug`, `content`, `status`, `target`, `image`, `created_at`, `updated_at`) VALUES
	(4, 'Bảng báo giá', 'pricelist', 'Bảng báo giá', 'bang-bao-gia', NULL, 'published', '1', '', '2023-03-02 09:24:28', '2023-03-03 01:16:06'),
	(5, 'Giới thiệu', 'gioi-thieu', 'Giới thiệu', 'gioi-thieu', '<p>Giới thiệu</p>\r\n\r\n<p>Giới thiệu</p>', 'published', '1', '', '2023-03-03 01:08:49', '2023-03-03 01:08:49');
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;

-- Dumping structure for table source.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `posts_id` int(10) unsigned NOT NULL,
  `categories_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_posts_id_index` (`posts_id`),
  KEY `categories_menu_id_index` (`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.categories: ~9 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
REPLACE INTO `categories` (`id`, `posts_id`, `categories_id`, `created_at`, `updated_at`) VALUES
	(13, 23, '["107","111","114","115","108","112","113"]', '2023-03-01 04:15:05', '2023-03-03 01:43:47'),
	(14, 24, '["107","112"]', '2023-03-01 09:11:08', '2023-03-01 09:11:08'),
	(15, 26, '["107","111","114","115","112"]', '2023-03-01 09:11:41', '2023-03-01 09:11:41'),
	(16, 27, '["107","115","108","112"]', '2023-03-01 09:12:01', '2023-03-01 09:13:18'),
	(17, 28, '["107","111","108"]', '2023-03-01 09:12:19', '2023-03-01 09:17:30'),
	(18, 29, '["107","111","114","112"]', '2023-03-01 09:12:35', '2023-03-01 09:12:35'),
	(19, 30, '["107","111","114","115","108"]', '2023-03-01 09:13:00', '2023-03-01 09:17:42'),
	(20, 31, '["111","114","115","108"]', '2023-03-01 09:18:06', '2023-03-01 09:18:06'),
	(21, 32, '["107","111","108","112"]', '2023-03-01 09:18:30', '2023-03-01 09:18:30');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table source.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.contacts: ~0 rows (approximately)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Dumping structure for table source.dashboard_widgets
CREATE TABLE IF NOT EXISTS `dashboard_widgets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.dashboard_widgets: ~0 rows (approximately)
/*!40000 ALTER TABLE `dashboard_widgets` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard_widgets` ENABLE KEYS */;

-- Dumping structure for table source.dashboard_widget_settings
CREATE TABLE IF NOT EXISTS `dashboard_widget_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) unsigned NOT NULL,
  `widget_id` int(10) unsigned NOT NULL,
  `order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dashboard_widget_settings_user_id_index` (`user_id`),
  KEY `dashboard_widget_settings_widget_id_index` (`widget_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.dashboard_widget_settings: ~0 rows (approximately)
/*!40000 ALTER TABLE `dashboard_widget_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard_widget_settings` ENABLE KEYS */;

-- Dumping structure for table source.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table source.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.menus: ~7 rows (approximately)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
REPLACE INTO `menus` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
	(107, 'Dịch vụ', 'dich-vu', 'published', '2023-02-28 07:49:31', '2023-02-28 07:49:31'),
	(108, 'Bảng Giá', 'bang-gia', 'published', '2023-02-28 08:14:06', '2023-02-28 08:14:06'),
	(111, 'Dịch vụ chuyển nhà', 'dich-vu-chuyen-nha', 'published', '2023-02-28 09:12:45', '2023-03-01 04:05:01'),
	(112, 'Tin tức', 'tin-tuc', 'published', '2023-03-01 04:03:13', '2023-03-01 04:03:13'),
	(113, 'Chính sách khách hàng', 'chinh-sach-khach-hang', 'published', '2023-03-01 04:04:47', '2023-03-01 04:04:47'),
	(114, 'Dịch vụ chuyển văn phòng', 'dich-vu-chuyen-van-phong', 'published', '2023-03-01 04:11:13', '2023-03-01 04:11:13'),
	(115, 'Dịch vụ chuyển căn hộ', 'dich-vu-chuyen-can-ho', 'published', '2023-03-01 04:11:47', '2023-03-01 04:11:47');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Dumping structure for table source.menu_locations
CREATE TABLE IF NOT EXISTS `menu_locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `location` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.menu_locations: ~7 rows (approximately)
/*!40000 ALTER TABLE `menu_locations` DISABLE KEYS */;
REPLACE INTO `menu_locations` (`id`, `menu_id`, `location`, `created_at`, `updated_at`) VALUES
	(90, 107, '0', '2023-02-28 07:49:31', '2023-02-28 07:49:31'),
	(91, 108, '0', '2023-02-28 08:14:06', '2023-02-28 08:14:06'),
	(94, 111, '0', '2023-02-28 09:12:45', '2023-03-01 04:05:01'),
	(95, 112, '0', '2023-03-01 04:03:13', '2023-03-01 04:03:13'),
	(96, 113, '0', '2023-03-01 04:04:47', '2023-03-01 04:04:47'),
	(97, 114, '0', '2023-03-01 04:11:13', '2023-03-01 04:11:13'),
	(98, 115, '0', '2023-03-01 04:11:47', '2023-03-01 04:11:47');
/*!40000 ALTER TABLE `menu_locations` ENABLE KEYS */;

-- Dumping structure for table source.menu_nodes
CREATE TABLE IF NOT EXISTS `menu_nodes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `reference_id` int(10) unsigned DEFAULT '0',
  `reference_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_font` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_class` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `has_child` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_nodes_menu_id_index` (`menu_id`),
  KEY `menu_nodes_parent_id_index` (`parent_id`),
  KEY `menu_nodes_related_id_index` (`reference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.menu_nodes: ~7 rows (approximately)
/*!40000 ALTER TABLE `menu_nodes` DISABLE KEYS */;
REPLACE INTO `menu_nodes` (`id`, `menu_id`, `parent_id`, `reference_id`, `reference_type`, `url`, `icon_font`, `position`, `title`, `css_class`, `target`, `has_child`, `created_at`, `updated_at`) VALUES
	(81, 107, 0, 107, 'App\\Http\\Controllers\\MenuController', '#dich-vu', NULL, 0, NULL, '/storage/photos/1/Image/inf-img.jpg', '1', 1, '2023-02-28 07:49:31', '2023-02-28 07:49:31'),
	(82, 108, 0, 108, 'App\\Http\\Controllers\\MenuController', '#bang-gia', NULL, 0, NULL, '/storage/photos/1/Image/logo.png', '1', 1, '2023-02-28 08:14:06', '2023-02-28 08:14:06'),
	(85, 111, 107, 111, 'App\\Http\\Controllers\\MenuController', '#dich-vu-chuyen-nha', NULL, 0, NULL, '', '1', 0, '2023-02-28 09:12:45', '2023-03-01 04:05:01'),
	(86, 112, 0, 112, 'App\\Http\\Controllers\\MenuController', '#tin-tuc', NULL, 0, NULL, '/storage/photos/1/Image/Seoul South Korea [602 × 343].jpg', '1', 1, '2023-03-01 04:03:13', '2023-03-01 04:03:13'),
	(87, 113, 0, 113, 'App\\Http\\Controllers\\MenuController', '#chinh-sach-khach-hang', NULL, 0, 'Chính sách khách hàng', '/storage/photos/1/Image/slider.jpg', '0', 1, '2023-03-01 04:04:47', '2023-03-01 04:04:47'),
	(88, 114, 107, 114, 'App\\Http\\Controllers\\MenuController', '#dich-vu-chuyen-van-phong', NULL, 0, 'Dịch vụ chuyển văn phòng', '/storage/photos/1/Image/logo.png', '1', 0, '2023-03-01 04:11:13', '2023-03-01 04:11:13'),
	(89, 115, 107, 115, 'App\\Http\\Controllers\\MenuController', '#dich-vu-chuyen-can-ho', NULL, 0, 'Dịch vụ chuyển căn hộ', '/storage/photos/1/Image/logo.png', '1', 0, '2023-03-01 04:11:47', '2023-03-01 04:11:47');
/*!40000 ALTER TABLE `menu_nodes` ENABLE KEYS */;

-- Dumping structure for table source.meta_boxes
CREATE TABLE IF NOT EXISTS `meta_boxes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `reference_id` int(10) unsigned NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meta_boxes_content_id_index` (`reference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.meta_boxes: ~29 rows (approximately)
/*!40000 ALTER TABLE `meta_boxes` DISABLE KEYS */;
REPLACE INTO `meta_boxes` (`id`, `reference_id`, `meta_key`, `meta_value`, `reference_type`, `created_at`, `updated_at`) VALUES
	(47, 2, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\TagsController', '2023-02-24 02:01:46', '2023-02-24 02:50:41'),
	(48, 3, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\TagsController', '2023-02-24 02:53:43', '2023-02-24 02:53:43'),
	(49, 1, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-02-24 07:08:05', '2023-02-24 07:08:05'),
	(50, 3, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-02-24 07:09:30', '2023-02-24 07:09:30'),
	(51, 4, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-02-24 07:12:04', '2023-02-24 07:12:04'),
	(52, 6, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-02-24 07:12:43', '2023-02-24 07:12:43'),
	(54, 9, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-02-24 07:29:41', '2023-02-24 07:29:41'),
	(55, 11, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-02-24 07:30:17', '2023-02-24 07:30:17'),
	(56, 14, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-02-24 07:48:52', '2023-02-24 09:36:20'),
	(90, 22, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-02-26 16:54:26', '2023-03-01 09:09:52'),
	(93, 3, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\BlockController', '2023-02-27 03:18:44', '2023-03-01 05:23:27'),
	(101, 107, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\MenuController', '2023-02-28 07:49:31', '2023-02-28 07:49:31'),
	(102, 108, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\MenuController', '2023-02-28 08:14:06', '2023-02-28 08:14:06'),
	(105, 111, 'seo_meta', 'null', 'App\\Http\\Controllers\\MenuController', '2023-02-28 09:12:45', '2023-03-01 04:05:01'),
	(106, 112, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\MenuController', '2023-03-01 04:03:13', '2023-03-01 04:03:13'),
	(107, 113, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\MenuController', '2023-03-01 04:04:47', '2023-03-01 04:04:47'),
	(108, 114, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\MenuController', '2023-03-01 04:11:13', '2023-03-01 04:11:13'),
	(109, 115, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\MenuController', '2023-03-01 04:11:47', '2023-03-01 04:11:47'),
	(110, 23, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-03-01 04:15:05', '2023-03-03 01:43:47'),
	(111, 24, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-03-01 09:11:08', '2023-03-01 09:11:08'),
	(112, 26, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-03-01 09:11:41', '2023-03-01 09:11:41'),
	(113, 27, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-03-01 09:12:01', '2023-03-01 09:13:18'),
	(114, 28, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-03-01 09:12:19', '2023-03-01 09:17:30'),
	(115, 29, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-03-01 09:12:35', '2023-03-01 09:12:35'),
	(116, 30, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-03-01 09:13:00', '2023-03-01 09:17:42'),
	(117, 31, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-03-01 09:18:06', '2023-03-01 09:18:06'),
	(118, 32, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\PostController', '2023-03-01 09:18:30', '2023-03-01 09:18:30'),
	(119, 4, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\BlockController', '2023-03-02 09:24:29', '2023-03-03 01:16:06'),
	(120, 5, 'seo_meta', '{"seo_title":null,"seo_description":null}', 'App\\Http\\Controllers\\BlockController', '2023-03-03 01:08:49', '2023-03-03 01:08:49');
/*!40000 ALTER TABLE `meta_boxes` ENABLE KEYS */;

-- Dumping structure for table source.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.migrations: ~26 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2013_04_09_032329_create_base_tables', 1),
	(2, '2013_04_09_062329_create_revisions_table', 1),
	(3, '2014_10_12_000000_create_admins_table', 1),
	(4, '2014_10_12_000000_create_users_table', 1),
	(5, '2014_10_12_100000_create_password_resets_table', 1),
	(6, '2016_06_14_230857_create_menus_table', 1),
	(7, '2016_06_28_221418_create_pages_table', 1),
	(8, '2016_10_05_074239_create_setting_table', 1),
	(9, '2016_11_28_032840_create_dashboard_widget_tables', 1),
	(10, '2016_12_16_084601_create_widgets_table', 1),
	(11, '2017_07_11_140018_create_simple_slider_table', 1),
	(12, '2017_11_03_070450_create_slug_table', 1),
	(13, '2019_08_19_000000_create_failed_jobs_table', 1),
	(14, '2019_09_07_030654_update_menu_nodes_table', 1),
	(15, '2019_09_07_045041_update_slugs_table', 1),
	(16, '2019_09_07_050405_update_slug_reference_for_page', 1),
	(17, '2019_09_08_014859_update_meta_boxes_table', 1),
	(18, '2019_09_08_015629_update_meta_box_data_for_page', 1),
	(19, '2019_10_20_002256_remove_parent_id_in_pages_table', 1),
	(20, '2020_03_28_020724_make_column_user_id_nullable_table_revisions', 1),
	(21, '2020_06_21_035242_update_table_simple_slider_items_nullable', 1),
	(22, '2023_02_22_073900_create_posts_table', 2),
	(23, '2023_02_22_091104_create_tags_table', 3),
	(24, '2023_02_25_023352_create_blocks_table', 4),
	(25, '2023_02_27_030339_create_static_posts_table', 5),
	(26, '2023_02_27_042641_create_contacts_table', 6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table source.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) NOT NULL DEFAULT '0',
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.pages: ~0 rows (approximately)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Dumping structure for table source.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table source.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_reference_id_index` (`reference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.posts: ~9 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
REPLACE INTO `posts` (`id`, `slug`, `reference_id`, `name`, `description`, `status`, `title`, `content`, `image`, `target`, `reference_type`, `tag`, `prefix`, `created_at`, `updated_at`) VALUES
	(23, 'dich-vu-chuyen-van-phong', 0, 'DỊCH VỤ CHUYỂN VĂN PHÒNG', 'Pinterest là website chia sẻ ảnh theo dạng mạng xã hội, post và phân loại dưới dạng các tấm bảng dán ảnh. Người dùng tạo ra và quản lý các bộ sưu tập ảnh theo các chủ đề khác nhau, như ...', 'published', 'DỊCH VỤ CHUYỂN VĂN PHÒNG D', '<p>Tin tức 2Tin tức 2Tin tức 2Tin tức 2</p>', 'https://source.dev/storage/photos/1/Image/logo1.png', '1', 'App\\Http\\Controllers\\PostController', NULL, 'posts', '2023-03-01 04:15:05', '2023-03-03 01:43:47'),
	(24, 'dich-vu-chuyen-van-phong-1', 0, 'Dịch vụ chuyển văn phòng 1', 'Dịch vụ chuyển văn phòng 1', 'published', 'Dịch vụ chuyển văn phòng 1', NULL, '/storage/photos/1/Image/Seoul South Korea [602 × 343].jpg', '0', 'App\\Http\\Controllers\\PostController', NULL, 'posts', '2023-03-01 09:11:08', '2023-03-01 09:11:08'),
	(26, 'dich-vu-chuyen-van-phong-2', 0, 'Dịch vụ chuyển văn phòng 2', 'Dịch vụ chuyển văn phòng2', 'published', 'Dịch vụ chuyển văn phòng2', NULL, '/storage/photos/1/Image/Seoul South Korea [602 × 343].jpg', '0', 'App\\Http\\Controllers\\PostController', NULL, 'posts', '2023-03-01 09:11:41', '2023-03-01 09:11:41'),
	(27, 'dich-vu-chuyen-van-phong-4', 0, 'Dịch vụ chuyển văn phòng 4', 'Dịch vụ chuyển văn phòng 4', 'published', 'Dịch vụ chuyển văn phòng 4', NULL, '/storage/photos/1/Image/Seoul South Korea [602 × 343].jpg', '1', 'App\\Http\\Controllers\\PostController', NULL, 'posts', '2023-03-01 09:12:01', '2023-03-01 09:13:18'),
	(28, 'dich-vu-chuyen-van-phong-4-5', 0, 'Dịch vụ chuyển văn phòng 4 5', 'Dịch vụ chuyển văn phòng 4 5', 'published', 'Dịch vụ chuyển văn phòng 4 5', NULL, '/storage/photos/1/Image/logo.png', '1', 'App\\Http\\Controllers\\PostController', NULL, 'posts', '2023-03-01 09:12:19', '2023-03-01 09:17:30'),
	(29, 'dich-vu-chuyen-van-phong-4-5-34', 0, 'Dịch vụ chuyển văn phòng 4 5 34', 'Dịch vụ chuyển văn phòng 4 5', 'published', 'Dịch vụ chuyển văn phòng 4 5', NULL, '/storage/photos/1/Image/logo.png', '1', 'App\\Http\\Controllers\\PostController', NULL, 'posts', '2023-03-01 09:12:35', '2023-03-01 09:12:35'),
	(30, 'dich-vu-chuyen-van-phong-4-5-343123', 0, 'Dịch vụ chuyển văn phòng 4 5 343123', 'Dịch vụ chuyển văn phòng 4 5 343123', 'published', 'Dịch vụ chuyển văn phòng 4 5 343123', '<p>Dịch vụ chuyển văn ph&ograve;ng 4 5 343123</p>', '/storage/photos/1/Image/Seoul South Korea [602 × 343].jpg', '1', 'App\\Http\\Controllers\\PostController', NULL, 'posts', '2023-03-01 09:13:00', '2023-03-01 09:17:42'),
	(31, 'dich-vu-chuyen-van-phong-4-5-343123-23213', 0, 'Dịch vụ chuyển văn phòng 4 5 343123 23213', 'Dịch vụ chuyển văn phòng 4 5 343123 23213Dịch vụ chuyển văn phòng 4 5 343123 23213', 'published', 'Dịch vụ chuyển văn phòng 4 5 343123 23213', NULL, '/storage/photos/1/Image/logo1.png', '1', 'App\\Http\\Controllers\\PostController', NULL, 'posts', '2023-03-01 09:18:06', '2023-03-01 09:18:06'),
	(32, 'dich-vu-chuyen-van-phong-4-5-343123-23213-2312312312', 0, 'Dịch vụ chuyển văn phòng 4 5 343123 23213 2312312312', 'Dịch vụ chuyển văn phòng 4 5 343123 23213', 'published', 'Dịch vụ chuyển văn phòng 4 5 343123 23213', NULL, '/storage/photos/1/Image/logo1.png', '0', 'App\\Http\\Controllers\\PostController', NULL, 'posts', '2023-03-01 09:18:30', '2023-03-01 09:18:30');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table source.revisions
CREATE TABLE IF NOT EXISTS `revisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `revisionable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisionable_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8mb4_unicode_ci,
  `new_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `revisions_revisionable_id_revisionable_type_index` (`revisionable_id`,`revisionable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.revisions: ~0 rows (approximately)
/*!40000 ALTER TABLE `revisions` DISABLE KEYS */;
/*!40000 ALTER TABLE `revisions` ENABLE KEYS */;

-- Dumping structure for table source.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`),
  KEY `roles_created_by_index` (`created_by`),
  KEY `roles_updated_by_index` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table source.role_users
CREATE TABLE IF NOT EXISTS `role_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_users_user_id_index` (`user_id`),
  KEY `role_users_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.role_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;

-- Dumping structure for table source.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.settings: ~51 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
REPLACE INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'Favicon', '/storage/photos/1/Image/logo1.png', NULL, NULL),
	(2, 'Logo', '/storage/photos/1/Image/logo1.png', NULL, NULL),
	(3, 'logo_mobile', '/storage/photos/1/Image/logo1.png', NULL, NULL),
	(4, 'admin_email', '', NULL, NULL),
	(5, 'admin-logo', '/storage/photos/1/Image/logo1.png', NULL, NULL),
	(6, 'admin-favicon', '/storage/photos/1/Image/logo1.png', NULL, NULL),
	(7, 'admin-login-screen-backgrounds', '/storage/photos/1/Image/Seoul South Korea [602 × 343].jpg', NULL, NULL),
	(8, 'admin_title', 'Moving home', NULL, NULL),
	(9, 'google_analytics', '', NULL, NULL),
	(10, 'analytics_view_id', '', NULL, NULL),
	(11, 'analytics_service_account_credentials', '{\r\n                                                            "type": "service_account",\r\n                                                            "project_id": "august-cascade-288106",\r\n                                                            "private_key_id": "2d4dcbe0bb82d83e9d529d4988e6e53550fea11b",\r\n                                                            "private_key": "-----BEGIN PRIVATE KEY-----\\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDQ3eDoVSVnJpn8\\nWoz9B7/Gb/g7/u3K1nW3fEID9RPV6yrZ0lxaBG87fOidRfeT62LORHgfKwyyZ/Tx\\nmeum4wXceUvs97oi6ETid5ITyu9koNZL31PcETlmCXueKx++JRyMxj9Dj4RE77Uh\\n/xTeCJg3POrZACasPd4xNKASgJlObQbJi/Daa6xlHoQbIn+OLtvr1FUKjLtvmMKe\\nhGG6dXeUTFHKh2Gzr2BeIUfAXt6jRUSyTknZZZJNMiZUmTbk5YQUy87MHs251HNb\\n227G/BjR6+u6Zl3tjBuvsANdlLqhn0KRtKYT1fArcxKq/ZlWEs4g6StM3hkFkxTd\\n0CG2i9WPAgMBAAECggEAI6A87RQc6Z/FcyxU0RIBzYyquD0O/WKgOJhawEcMx5ex\\nuu6tLvODr49qM+1LwfDL7Sfzn0leBI5D0vPwpIojpUwRPc2xc6PPoBtKENM0CyN9\\n+foRWT+c3UEv0zZC11GIMaDdCJ6Rrpp+eFqEiizIHd/npPToI8f3vsfdp9pEjAIw\\npM+RX5E2OTiYFnVrYq1IxW6FgstOwWo064JI9kf04/bPsA357tcgC1qcYXSCYpy0\\n7utwOfuySdLWbu1MjLZCT9ZW9hnaYtd3xIkrVc56/7EeEA/9D+kJv10PH7IjhHov\\ncqDcFvuQvbrFPUAbqjGJAKRnGVrCUtLNj4//32B3vQKBgQD5CyY9ait3vQhC1s0E\\najz9ZdVGk6QZpNa+RoJ6sfQXbG27pU7bwZP+v1Jhv2itYW3EYjDRbhlCbNYEEI+y\\ncmJdkVcWNFRbfkG8TtNcjUMjFfOWsxYstKKBnDKW4x2O09t64H3vChLsZopPnywU\\nv8msq3pFuf0p74p1NQsF2o1kuwKBgQDWs28qlBDxTlSJ9C4Mg7DASf0ceQUQBXoo\\nNqLFnnazI8P7v8yrtr73cJoGn/dxtaaMj+i5zbekrcHMI94Eax6gIKsmcH8rq4Fv\\nA/D0mnvgKz5tNUBu90xtjwLv/lvA6/GbXCboghSj/XC5+hLVdJUFPZFwBDgu3R8d\\nfhHIgI2vPQKBgQDbtv1us2tUAT73kQBhQ8U5Hg1ybbEaOraGOjjFPJiHzc5l/Wq8\\nMGV8G5j3yeH1DP7FgodlTYgVdWW/Qkk0evvTZvV5DoPaEGK4WqbYgXxYyPYV3zvS\\nBy9Tv9VWD1s1di2tk78nFDErxS+DHX/LcoTfxI1kVLlItR/nVfu6l12lHwKBgFu8\\nO0l0DnEsSM7Q+EP8mK7wbieWReV8kZ9RCOdrN8h/BaQxZWARKzNKd2VRQEbjmJAC\\nhSuujELewylYQeqdYm6ExtwbwRqFoz4t7ux0fW1gzMGYuTkwjQVaz6R/h/C8X3VE\\nQJOj0PHovhuYkCeIMowUrGmyQ9cyP7M4RJzo4KD5AoGAQacVDzI9NBWXODukzoEJ\\nYLbqD80MbAmRbuix7TzeAM9Ru1JAOltnaJeSgvuPMP7qH8rihX31SGPp7PF8BRWA\\nWVYZDyDGjHpAWi8iAg9AUtqc+5tMIjrGLnYDoyJXWtF3BJRCXsMWFZHAmcfZojKA\\ngHO0p/XKcdVtNRh97ZCvys8=\\n-----END PRIVATE KEY-----\\n",\r\n                                                            "client_email": "triluc1@august-cascade-288106.iam.gserviceaccount.com",\r\n                                                            "client_id": "105636376897355695855",\r\n                                                            "auth_uri": "https://accounts.google.com/o/oauth2/auth",\r\n                                                            "token_uri": "https://oauth2.googleapis.com/token",\r\n                                                            "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",\r\n                                                            "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/triluc1%40august-cascade-288106.iam.gserviceaccount.com"\r\n                                                            }', NULL, NULL),
	(12, 'newsletter_mailchimp_api_key', '', NULL, NULL),
	(13, 'newsletter_mailchimp_list_id', '', NULL, NULL),
	(14, 'newsletter_sendgrid_api_key', '', NULL, NULL),
	(15, 'newsletter_sendgrid_list_id', '', NULL, NULL),
	(16, 'submit', 'save', NULL, NULL),
	(17, 'page-name', 'Moving Home', NULL, NULL),
	(18, 'seo_title', 'Moving Home', NULL, NULL),
	(19, 'seo_description', 'Moving Home', NULL, NULL),
	(20, 'seo_image', '/storage/photos/1/Image/logo1.png', NULL, NULL),
	(21, 'footer-color', '#fffdd', NULL, NULL),
	(22, 'Copyright', 'Copyright ở footer trang', NULL, NULL),
	(23, 'hotline', '0394097349', NULL, NULL),
	(24, 'hotline-1', '0394097349', NULL, NULL),
	(25, 'name-company', 'Moving Home', NULL, NULL),
	(26, 'address-company', 'Moving Home', NULL, NULL),
	(27, 'email-company', 'movingmome@gmail.com', NULL, NULL),
	(28, 'Google-map-embed', 'Moving Homeđasa@gmail.com', NULL, NULL),
	(29, 'email_driver', 'smtp', NULL, NULL),
	(30, 'email_hostName', 'sandbox.smtp.mailtrap.io', NULL, NULL),
	(31, 'email_encryption', 'tls', NULL, NULL),
	(32, 'email_port', '2525', NULL, NULL),
	(33, 'email_userName', 'd06f53716ec3d7', NULL, NULL),
	(34, 'email_password', '9eb2b3a1bd8e41', NULL, NULL),
	(35, 'email_senderName', 'Minh Thong', NULL, NULL),
	(36, 'email_senderEmail', 'tranthng207@gmail.com', NULL, NULL),
	(37, 'des-page-main-1', 'Mô tả - Bảng Giá Chuyển Nhà', NULL, NULL),
	(38, 'des-page-main-2', 'Mô tả - Bảng Giá Chuyển Nhà', NULL, NULL),
	(39, 'des-page-main-3', 'Mô tả - Bảng Giá Chuyển Nhà', NULL, NULL),
	(40, 'facebook_chat_enabled', 'no', NULL, NULL),
	(41, 'facebook_page_id', '105909558156296', NULL, NULL),
	(42, 'facebook_comment_enabled_in_post', 'no', NULL, NULL),
	(43, 'facebook_app_id', '105909558156296', NULL, NULL),
	(44, 'facebook_admins', '["{\\"value\\":null}"]', NULL, NULL),
	(45, 'Facebook', 'https://www.facebook.com/', NULL, NULL),
	(46, 'Twitter', 'https://twitter.com/', NULL, NULL),
	(47, 'Linkedin', 'https://www.linkedin.com/', NULL, NULL),
	(48, 'Zalo', 'https://chat.zalo.me/', NULL, NULL),
	(49, 'Youtube', 'https://www.youtube.com/', NULL, NULL),
	(50, 'Instagram', 'https://www.instagram.com/', NULL, NULL),
	(51, 'Pinterest', 'https://www.pinterest.com/', NULL, NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table source.simple_sliders
CREATE TABLE IF NOT EXISTS `simple_sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.simple_sliders: ~1 rows (approximately)
/*!40000 ALTER TABLE `simple_sliders` DISABLE KEYS */;
REPLACE INTO `simple_sliders` (`id`, `name`, `key`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'home page', 'home-page', '123', 'published', NULL, '2023-02-20 01:24:26');
/*!40000 ALTER TABLE `simple_sliders` ENABLE KEYS */;

-- Dumping structure for table source.simple_slider_items
CREATE TABLE IF NOT EXISTS `simple_slider_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `simple_slider_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `order` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.simple_slider_items: ~4 rows (approximately)
/*!40000 ALTER TABLE `simple_slider_items` DISABLE KEYS */;
REPLACE INTO `simple_slider_items` (`id`, `simple_slider_id`, `title`, `image`, `link`, `description`, `order`, `created_at`, `updated_at`) VALUES
	(1, 1, '11#', '/storage/photos/1/Image/StudyinAb.jpg', '#111', '11', 2, NULL, '2023-02-20 01:23:06'),
	(3, 1, '#4', '/storage/photos/1/Image/StudyinAb.jpg', '#4', '4', 14, NULL, '2023-02-20 01:22:48'),
	(4, 1, '#3', '/storage/photos/1/Image/Seoul South Korea [602 × 343].jpg', '#3', '3', 3, '2023-02-18 04:25:07', '2023-02-20 01:23:33'),
	(5, 1, '#3123', '/storage/photos/1/Image/slider.jpg', '132123', '12312', 5, '2023-02-20 01:24:02', '2023-02-20 01:24:02');
/*!40000 ALTER TABLE `simple_slider_items` ENABLE KEYS */;

-- Dumping structure for table source.slugs
CREATE TABLE IF NOT EXISTS `slugs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` int(10) unsigned NOT NULL,
  `reference_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.slugs: ~19 rows (approximately)
/*!40000 ALTER TABLE `slugs` DISABLE KEYS */;
REPLACE INTO `slugs` (`id`, `key`, `reference_id`, `reference_type`, `prefix`, `created_at`, `updated_at`) VALUES
	(99, 'dich-vu', 107, 'App\\Http\\Controllers\\MenuController', 'caretoties', '2023-02-28 07:49:31', '2023-02-28 07:49:31'),
	(100, 'bang-gia', 108, 'App\\Http\\Controllers\\MenuController', 'caretoties', '2023-02-28 08:14:06', '2023-02-28 08:14:06'),
	(101, 'dich-vu-chuyen-nha', 109, 'App\\Http\\Controllers\\MenuController', 'caretoties', '2023-02-28 08:29:33', '2023-02-28 08:29:33'),
	(102, 'combo-qua-tang', 110, 'App\\Http\\Controllers\\MenuController', 'caretoties', '2023-02-28 08:33:28', '2023-02-28 08:33:28'),
	(104, 'tin-tuc', 112, 'App\\Http\\Controllers\\MenuController', 'caretoties', '2023-03-01 04:03:13', '2023-03-01 04:03:13'),
	(105, 'chinh-sach-khach-hang', 113, 'App\\Http\\Controllers\\MenuController', 'caretoties', '2023-03-01 04:04:47', '2023-03-01 04:04:47'),
	(106, 'dich-vu-chuyen-van-phong', 114, 'App\\Http\\Controllers\\MenuController', 'caretoties', '2023-03-01 04:11:13', '2023-03-01 04:11:13'),
	(107, 'dich-vu-chuyen-can-ho', 115, 'App\\Http\\Controllers\\MenuController', 'caretoties', '2023-03-01 04:11:47', '2023-03-01 04:11:47'),
	(108, 'dich-vu-chuyen-van-phong', 23, 'App\\Http\\Controllers\\PostController', 'posts', '2023-03-01 04:15:05', '2023-03-03 01:43:47'),
	(109, 'dich-vu-chuyen-van-phong-1', 24, 'App\\Http\\Controllers\\PostController', 'posts', '2023-03-01 09:11:08', '2023-03-01 09:11:08'),
	(110, 'dich-vu-chuyen-van-phong-2', 26, 'App\\Http\\Controllers\\PostController', 'posts', '2023-03-01 09:11:41', '2023-03-01 09:11:41'),
	(111, 'dich-vu-chuyen-van-phong-4', 27, 'App\\Http\\Controllers\\PostController', 'posts', '2023-03-01 09:12:01', '2023-03-01 09:13:18'),
	(112, 'dich-vu-chuyen-van-phong-4-5', 28, 'App\\Http\\Controllers\\PostController', 'posts', '2023-03-01 09:12:19', '2023-03-01 09:17:30'),
	(113, 'dich-vu-chuyen-van-phong-4-5-34', 29, 'App\\Http\\Controllers\\PostController', 'posts', '2023-03-01 09:12:35', '2023-03-01 09:12:35'),
	(114, 'dich-vu-chuyen-van-phong-4-5-343123', 30, 'App\\Http\\Controllers\\PostController', 'posts', '2023-03-01 09:13:00', '2023-03-01 09:17:42'),
	(115, 'dich-vu-chuyen-van-phong-4-5-343123-23213', 31, 'App\\Http\\Controllers\\PostController', 'posts', '2023-03-01 09:18:06', '2023-03-01 09:18:06'),
	(116, 'dich-vu-chuyen-van-phong-4-5-343123-23213-2312312312', 32, 'App\\Http\\Controllers\\PostController', 'posts', '2023-03-01 09:18:30', '2023-03-01 09:18:30'),
	(117, 'bang-bao-gia', 4, 'App\\Http\\Controllers\\BlockController', 'page', '2023-03-02 09:24:29', '2023-03-03 01:16:06'),
	(118, 'gioi-thieu', 5, 'App\\Http\\Controllers\\BlockController', 'page', '2023-03-03 01:08:49', '2023-03-03 01:08:49');
/*!40000 ALTER TABLE `slugs` ENABLE KEYS */;

-- Dumping structure for table source.static_posts
CREATE TABLE IF NOT EXISTS `static_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricelist` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.static_posts: ~8 rows (approximately)
/*!40000 ALTER TABLE `static_posts` DISABLE KEYS */;
REPLACE INTO `static_posts` (`id`, `name`, `alias`, `description`, `content`, `pricelist`, `status`, `created_at`, `updated_at`) VALUES
	(7, 'GIỚI THIỆU VỀ DỊCH VỤ CHUYỂN NHÀ', 'contact', 'GIỚI THIỆU VỀ DỊCH VỤ CHUYỂN NHÀ', '<p>Trải qua nhiều năm hoạt động v&agrave; ph&aacute;t triển, C&ocirc;ng Ty Vận Chuyển Nh&agrave; V&agrave; Văn Ph&ograve;ng lu&ocirc;n mong muốn mang đến cho mọi qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; một dịch vụ NHANH NHẤT, GI&Aacute; RẺ, CHUY&Ecirc;N NGHIỆP NHẤT. Đối với ch&uacute;ng t&ocirc;i, chẳng c&oacute; g&igrave; qu&yacute; gi&aacute; hơn niềm tin của kh&aacute;ch h&agrave;ng t</p>\r\n\r\n<p>Trải qua nhiều năm hoạt động v&agrave; ph&aacute;t triển, C&ocirc;ng Ty Vận Chuyển Nh&agrave; V&agrave; Văn Ph&ograve;ng lu&ocirc;n mong muốn mang đến cho mọi qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; một dịch vụ NHANH NHẤT, GI&Aacute; RẺ, CHUY&Ecirc;N NGHIỆP NHẤT. Đối với ch&uacute;ng t&ocirc;i, chẳng c&oacute; g&igrave; qu&yacute; gi&aacute; hơn niềm tin của kh&aacute;ch h&agrave;ng t</p>\r\n\r\n<p>Trải qua nhiều năm hoạt động v&agrave; ph&aacute;t triển, C&ocirc;ng Ty Vận Chuyển Nh&agrave; V&agrave; Văn Ph&ograve;ng lu&ocirc;n mong muốn mang đến cho mọi qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; một dịch vụ NHANH NHẤT, GI&Aacute; RẺ, CHUY&Ecirc;N NGHIỆP NHẤT. Đối với ch&uacute;ng t&ocirc;i, chẳng c&oacute; g&igrave; qu&yacute; gi&aacute; hơn niềm tin của kh&aacute;ch h&agrave;ng t</p>', '', 'published', '2023-02-27 06:38:01', '2023-02-27 06:38:01'),
	(8, 'DỊCH VỤ CHUYỂN NHÀ CHUYÊN NGHIỆP', 'intro', 'DỊCH VỤ CHUYỂN NHÀ CHUYÊN NGHIỆP', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea tak</p>', '', 'published', '2023-02-27 06:47:44', '2023-02-27 06:47:44'),
	(9, 'BẢNG GIÁ VẬN CHUYỂN NHÀ', 'pricelist', 'BẢNG GIÁ VẬN CHUYỂN NHÀ', '<p>pricelist</p>', '[{"type":"1","size":"1","value":"1","price10":"1","price51_100":"1","price100":"1","time":"1","save_night":"1"},{"type":"2","size":"2","value":"2","price10":"2","price51_100":"2","price100":"2","time":"2","save_night":"2"},{"type":"3123","size":"3213","value":"312312","price10":"13213","price51_100":"3231","price100":"123123","time":"2312312","save_night":"2132131"}]', 'published', '2023-02-27 07:29:38', '2023-02-27 07:29:38'),
	(10, 'pricelist-tow', 'pricelist-tow', 'pricelist-tow', '<p>Lưu &yacute;</p>', '[{"type":"2313","price":"321312"},{"type":"\\u0111\\u00e2s","price":"\\u0111\\u1ea5"}]', 'published', '2023-02-27 07:42:06', '2023-03-01 03:36:03'),
	(11, 'ask-list', 'ask-list', 'ask-list', '<p>ask-list</p>\r\n\r\n<p>ask-list</p>', '[{"ask":"ask-list1","reply":"ask-list1"},{"ask":"dsadadasda","reply":"dasdsaddasd"}]', 'published', '2023-02-27 08:03:16', '2023-02-27 08:55:37'),
	(12, 'Thông tin liên hệ - footer - Block 1', 'footer-contact-b1', 'Thông tin liên hệ - footer - Block 1', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $InforCompany-&gt;address</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>Điện thoại: <a href="tel:$InforCompany-&gt;hotline}}">$InforCompany-&gt;hotline}}</a></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>$InforCompany-&gt;email}}</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>env(&#39;APP_URL&#39;)}}</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '[{"ask":null,"reply":null}]', 'published', '2023-02-27 08:49:52', '2023-02-27 08:49:52'),
	(13, 'Thông tin liên hệ - footer - Block 2', 'footer-contact-b2', 'Thông tin liên hệ - footer - Block 2', '<p>$InforCompany-&gt;address</p>\r\n\r\n<p>Điện thoại: <a href="tel:$InforCompany-&gt;hotline}}">$InforCompany-&gt;hotline}}</a></p>\r\n\r\n<p>$InforCompany-&gt;email}}</p>\r\n\r\n<p>env(&#39;APP_URL&#39;)}}</p>', '[{"ask":null,"reply":null}]', 'published', '2023-02-27 08:51:36', '2023-02-27 09:49:57'),
	(14, 'Thông tin liên hệ - footer - Block 3', 'footer-contact-b3', 'Thông tin liên hệ - footer - Block 3', '<div class="footer-item p:10px col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">\r\n                <div class="text-footer-one">\r\n                    <h3 data-mh="footer-header-1" class=" text:center footer-header-1 text-fill-color:gray text-fill-color:#7388C1:hover">$InforCompany->name}}</h3>\r\n\r\n                    <div class="footer-text-1" data-mh="footer-text-1">\r\n                        <p class="text-fill-color:gray text-fill-color:#7388C1:hover">\r\n                          $InforCompany->address</p>\r\n                           <p class="text-fill-color:gray text-fill-color:#7388C1:hover">Điện thoại: <a href="tel:$InforCompany->hotline}}">$InforCompany->hotline}}</a></p>\r\n                           <p class="text-fill-color:gray text-fill-color:#7388C1:hover"> </i>$InforCompany->email}}</p>\r\n                           <p class="text-fill-color:gray text-fill-color:#7388C1:hover"> </i>env(\'APP_URL\')}}</p>\r\n                    </div>\r\n\r\n                </div>\r\n            </div>', '[{"ask":null,"reply":null}]', 'published', '2023-02-27 08:52:16', '2023-02-27 08:52:16');
/*!40000 ALTER TABLE `static_posts` ENABLE KEYS */;

-- Dumping structure for table source.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` int(11) NOT NULL DEFAULT '0',
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_slug_unique` (`slug`),
  KEY `tags_reference_id_index` (`reference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.tags: ~1 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
REPLACE INTO `tags` (`id`, `name`, `slug`, `status`, `title`, `reference_id`, `reference_type`, `prefix`, `created_at`, `updated_at`) VALUES
	(3, 'COMBO QUÀ TẶNG', 'combo-qua-tang', 'published', '123', 0, NULL, 'tags', '2023-02-24 02:53:43', '2023-02-24 02:53:43');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Dumping structure for table source.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` time DEFAULT NULL,
  `last_name` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avarta_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `super_user` tinyint(4) DEFAULT NULL,
  `manage_supers` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `email`, `name`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login`, `last_name`, `avarta_id`, `super_user`, `manage_supers`) VALUES
	(2, 'tranthng207@gmail.com', 'admin1111', NULL, '$2y$10$USKkv4skJcQEkJLu25EfFez/vsHid0vUgyNR9JTX9XR7i.atPdT1G', NULL, '2023-03-02 03:14:52', '2023-03-02 03:14:52', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table source.user_meta
CREATE TABLE IF NOT EXISTS `user_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_meta_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.user_meta: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_meta` ENABLE KEYS */;

-- Dumping structure for table source.widgets
CREATE TABLE IF NOT EXISTS `widgets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `widget_id` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sidebar_id` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `data` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table source.widgets: ~0 rows (approximately)
/*!40000 ALTER TABLE `widgets` DISABLE KEYS */;
/*!40000 ALTER TABLE `widgets` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
