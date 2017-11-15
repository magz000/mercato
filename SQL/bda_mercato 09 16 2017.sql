-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2017 at 07:50 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bda_mercato`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `firstname`, `middlename`, `lastname`, `privilege_id`, `contact`, `status`, `created_at`, `updated_at`) VALUES
(1, 'john.doe@chefsandbutlers.net', '$2y$10$UgnCNdgPQab.EXX7uVxXHeNeNeJpfzDsyag2xWHlYxlMBLSmbxX/O', 'John', '', 'Doe', 1, '09164794935', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audit_trails`
--

CREATE TABLE `audit_trails` (
  `id` int(10) UNSIGNED NOT NULL,
  `auth_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_trails`
--

INSERT INTO `audit_trails` (`id`, `auth_id`, `user_type`, `ip_address`, `action_to`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '127.0.0.1', 'order_contents', 'updated status of order content id = 8', '2017-11-13 14:07:34', '2017-11-13 14:07:34'),
(2, 1, 2, '127.0.0.1', 'order_contents', 'updated status of order content id = 8', '2017-11-13 14:10:30', '2017-11-13 14:10:30'),
(3, 1, 2, '127.0.0.1', 'order_contents', 'updated status from 0 to  order content id = 9', '2017-11-13 14:11:48', '2017-11-13 14:11:48'),
(4, 1, 2, '127.0.0.1', 'order_contents', 'updated status from 0 to 2 order content id = 10', '2017-11-13 14:12:08', '2017-11-13 14:12:08'),
(5, 1, 1, '127.0.0.1', 'carts', 'Added to Cart product id = 3', '2017-11-14 07:06:18', '2017-11-14 07:06:18'),
(6, 1, 1, '127.0.0.1', 'carts', 'Added to Cart product id = 4', '2017-11-14 07:06:22', '2017-11-14 07:06:22'),
(7, 1, 1, '127.0.0.1', 'carts', 'Added to Cart product id = 3', '2017-11-14 07:06:24', '2017-11-14 07:06:24'),
(8, 1, 1, '127.0.0.1', 'carts', 'Added to Cart product id = 3', '2017-11-14 07:06:24', '2017-11-14 07:06:24'),
(9, 1, 1, '127.0.0.1', 'carts', 'Updated to Cart product id = 3', '2017-11-14 07:08:05', '2017-11-14 07:08:05'),
(10, 1, 1, '127.0.0.1', 'carts', 'Added Cart product id = 1', '2017-11-14 07:08:25', '2017-11-14 07:08:25'),
(11, 1, 1, '127.0.0.1', 'carts', 'Updated Cart product id = 1', '2017-11-14 07:08:33', '2017-11-14 07:08:33'),
(12, 1, 2, '127.0.0.1', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2017-11-15 18:02:54', '2017-11-15 18:02:54'),
(13, 1, 1, '127.0.0.1', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-11-15 18:35:03', '2017-11-15 18:35:03'),
(14, 1, 1, '127.0.0.1', 'carts', 'Added Cart product id = 3', '2017-11-15 18:35:05', '2017-11-15 18:35:05'),
(15, 1, 1, '127.0.0.1', 'orders', 'Checkout of Order id 4', '2017-11-15 18:35:24', '2017-11-15 18:35:24'),
(16, 1, 1, '127.0.0.1', 'carts', 'Added Cart product id = 3', '2017-11-15 18:47:31', '2017-11-15 18:47:31'),
(17, 1, 1, '127.0.0.1', 'carts', 'Added Cart product id = 3', '2017-11-15 18:48:28', '2017-11-15 18:48:28'),
(18, 1, 1, '127.0.0.1', 'carts', 'Updated Cart product id = 3', '2017-11-15 18:48:33', '2017-11-15 18:48:33'),
(19, 1, 1, '127.0.0.1', 'carts', 'Updated Cart product id = 3', '2017-11-15 18:49:11', '2017-11-15 18:49:11'),
(20, 1, 1, '127.0.0.1', 'carts', 'Updated Cart product id = 3', '2017-11-15 18:49:16', '2017-11-15 18:49:16'),
(21, 1, 1, '127.0.0.1', 'carts', 'Added Cart product id = 4', '2017-11-15 18:49:20', '2017-11-15 18:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(11,2) NOT NULL,
  `total` double(11,2) NOT NULL,
  `pickup_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `price`, `total`, `pickup_location`, `pickup_date`, `pickup_time`, `created_at`, `updated_at`) VALUES
(6, 1, 3, 4, 150.00, 600.00, 'Katipunan', '2017-11-16', '9:00 AM', '2017-11-15 18:48:27', '2017-11-15 18:49:16'),
(7, 1, 4, 1, 50.00, 50.00, 'Katipunan', '2017-11-16', '9:00 AM', '2017-11-15 18:49:20', '2017-11-15 18:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_07_032935_create_products_table', 1),
(4, '2017_11_07_033107_create_products_category_table', 1),
(5, '2017_11_07_034948_create_order_table', 1),
(6, '2017_11_07_035006_create_order_products_table', 1),
(7, '2017_11_07_035718_create_cart_table', 1),
(8, '2017_11_07_040450_create_provider_table', 2),
(10, '2017_11_07_041728_create_page_view_table', 3),
(11, '2017_11_07_045751_alter_product_categories', 4),
(12, '2017_11_07_065941_create_provider_location_table', 5),
(13, '2017_11_07_095033_alter_provider_table', 6),
(14, '2017_11_09_091741_reate_transaction_table', 7),
(15, '2017_11_09_103501_create_settings_table', 8),
(16, '2017_11_11_060816_create_order_rating_table', 8),
(17, '2017_11_13_215449_create_audit_trail_table', 9),
(18, '2017_11_13_224432_create_admin_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` double(11,2) NOT NULL,
  `service_charge` double(11,2) NOT NULL,
  `tax` double(11,2) DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `service_charge`, `tax`, `firstname`, `middlename`, `lastname`, `street`, `barangay`, `city`, `state`, `contact`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 499.00, 40.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, 2, '2017-11-09 01:08:21', '2017-11-09 01:37:29'),
(2, 1, 398.00, 40.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, 1, '2017-11-10 21:55:22', '2017-11-10 21:55:22'),
(3, 1, 698.00, 120.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, 2, '2017-11-13 13:04:56', '2017-11-13 13:13:00'),
(4, 1, 1448.00, 80.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, 1, '2017-11-15 18:35:24', '2017-11-15 18:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(11,2) NOT NULL,
  `total` double(11,2) NOT NULL,
  `pickup_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `progress` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `provider_id`, `quantity`, `price`, `total`, `pickup_location`, `pickup_date`, `pickup_time`, `note`, `progress`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 99.00, 99.00, 'Katipunan', '2017-11-09', '9:00 AM', 'Please make the brownies slightly crispy on the outside and moist in the inside', 0, 3, '2017-11-09 01:08:21', '2017-11-11 06:49:04'),
(2, 1, 3, 1, 2, 200.00, 400.00, 'Katipunan', '2017-11-09', '9:00 AM', 'wegwegweg', 0, 3, '2017-11-09 01:08:21', '2017-11-11 06:50:12'),
(3, 2, 3, 1, 1, 200.00, 200.00, 'Katipunan', '2017-11-11', '9:00 AM', NULL, 0, 4, '2017-11-10 21:55:22', '2017-11-11 06:45:28'),
(4, 2, 1, 1, 2, 99.00, 198.00, 'Katipunan', '2017-11-11', '9:00 AM', NULL, 0, 4, '2017-11-10 21:55:22', '2017-11-11 06:45:28'),
(5, 3, 4, 1, 1, 50.00, 50.00, 'Katipunan', '2017-11-21', '9:00 AM', NULL, 0, 2, '2017-11-13 13:04:56', '2017-11-13 13:51:01'),
(6, 3, 3, 1, 1, 200.00, 200.00, 'Katipunan', '2017-11-21', '9:00 AM', NULL, 0, 2, '2017-11-13 13:04:56', '2017-11-13 13:38:25'),
(7, 3, 1, 1, 1, 99.00, 99.00, 'Katipunan', '2017-11-21', '9:00 AM', NULL, 0, 2, '2017-11-13 13:04:56', '2017-11-13 13:33:17'),
(8, 3, 4, 1, 1, 50.00, 50.00, 'Katipunan', '2017-11-22', '9:00 AM', NULL, 0, 2, '2017-11-13 13:04:56', '2017-11-13 14:10:30'),
(9, 3, 3, 1, 1, 200.00, 200.00, 'Katipunan', '2017-11-22', '9:00 AM', NULL, 0, 2, '2017-11-13 13:04:56', '2017-11-13 14:11:48'),
(10, 3, 1, 1, 1, 99.00, 99.00, 'Katipunan', '2017-11-22', '9:00 AM', NULL, 0, 2, '2017-11-13 13:04:56', '2017-11-13 14:12:08'),
(11, 4, 3, 1, 5, 200.00, 1000.00, 'Katipunan', '2017-11-14', '9:00 AM', NULL, 0, 0, '2017-11-15 18:35:24', '2017-11-15 18:35:24'),
(12, 4, 4, 1, 1, 50.00, 50.00, 'Katipunan', '2017-11-14', '9:00 AM', NULL, 0, 0, '2017-11-15 18:35:24', '2017-11-15 18:35:24'),
(13, 4, 1, 1, 2, 99.00, 198.00, 'Katipunan', '2017-11-14', '9:00 AM', NULL, 0, 0, '2017-11-15 18:35:24', '2017-11-15 18:35:24'),
(14, 4, 3, 1, 1, 200.00, 200.00, 'Katipunan', '2017-11-16', '9:00 AM', NULL, 0, 0, '2017-11-15 18:35:24', '2017-11-15 18:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_ratings`
--

CREATE TABLE `order_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_ratings`
--

INSERT INTO `order_ratings` (`id`, `order_id`, `category`, `value`, `message`, `total`, `created_at`, `updated_at`) VALUES
(10, 1, 'overall', '5', 'asfasf', 5, '2017-11-11 14:15:22', '2017-11-11 14:15:22'),
(11, 2, 'overall', '5', 'asfasf', 5, '2017-11-11 14:15:22', '2017-11-11 14:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_transactions`
--

CREATE TABLE `order_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_transactions`
--

INSERT INTO `order_transactions` (`id`, `order_id`, `payment_id`, `payer_id`, `method`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'PAY-2NR48915ND453292DLICCDQY', '8QQ49KHSSD96L', 'paypal', 'approved', '2017-11-09 01:37:29', '2017-11-09 01:37:29'),
(2, 3, 'PAY-8BC39781TP1777724LIEZPYQ', '94UGR4QEXUY56', 'paypal', 'approved', '2017-11-13 13:13:00', '2017-11-13 13:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE `page_views` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_views`
--

INSERT INTO `page_views` (`id`, `ip`, `location`, `device`, `created_at`, `updated_at`) VALUES
(8, '127.0.0.1', 'localhost', 'desktop', '2017-11-06 21:54:49', '2017-11-06 21:54:49'),
(9, '127.0.0.1', 'localhost', 'desktop', '2017-11-07 18:17:53', '2017-11-07 18:17:53'),
(10, '127.0.0.1', 'localhost', 'desktop', '2017-11-08 18:03:47', '2017-11-08 18:03:47'),
(11, '127.0.0.1', 'localhost', 'desktop', '2017-11-08 18:03:47', '2017-11-08 18:03:47'),
(12, 'UNKNOWN', 'localhost', 'desktop', '2017-11-09 01:06:19', '2017-11-09 01:06:19'),
(13, '127.0.0.1', 'localhost', 'desktop', '2017-11-10 20:51:09', '2017-11-10 20:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `picture` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(11,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `sale_price` double(11,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_start` date DEFAULT NULL,
  `day_end` date DEFAULT NULL,
  `non_expiry` int(11) NOT NULL DEFAULT '0',
  `delivery_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `picture`, `provider_id`, `category_id`, `name`, `price`, `qty`, `sale_price`, `description`, `day_start`, `day_end`, `non_expiry`, `delivery_type`, `status`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', 1, 3, 'Chocolate Caramel Brownies', 99.00, 20, NULL, 'this is a description', '2017-11-01', '2017-12-30', 0, '1', 1, NULL, NULL),
(3, '2.jpg', 1, 3, 'Strawberry Pie', 200.00, 20, 150.00, 'this is a description', '2017-11-01', '2017-11-30', 1, '1', 1, NULL, NULL),
(4, '1510420295.jpg', 1, 3, 'Chocolate Revel Bar', 50.00, 150, NULL, 'No Bake Chocolate Revel Bar', '2017-11-12', '2017-11-30', 1, '1', 1, '2017-11-11 20:20:42', '2017-11-11 20:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `image`, `name`, `parent`, `status`, `created_at`, `updated_at`) VALUES
(1, '123456.jpg', 'Dessert', NULL, 1, NULL, NULL),
(2, NULL, 'Frozen', 1, 1, NULL, NULL),
(3, NULL, 'Pastries', 1, 1, NULL, NULL),
(4, '1234567.jpg', 'Entree', NULL, 1, NULL, NULL),
(5, NULL, 'Poultry', 4, 1, NULL, NULL),
(6, NULL, 'Pork', 4, 1, NULL, NULL),
(7, NULL, 'Beef', 4, 1, NULL, NULL),
(8, '1234.jpg', 'Beverages', NULL, 1, NULL, NULL),
(9, NULL, 'Coffee', 8, 1, NULL, NULL),
(10, '123.jpg', 'Soup', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `picture` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `picture`, `username`, `firstname`, `middlename`, `lastname`, `email`, `password`, `contact`, `street`, `barangay`, `city`, `state`, `postal_code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '5790383.jpg', 'carlo', 'Carlo', 'Domo', 'Flores', 'carlo.flores@chefsandbutlers.net', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '09164794935', '134 Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '1610', 1, 'KT0cTmnnQRU3BDhaHN7fW32lPpE8Vcg0YtN9yx27fhT5x0hbo728o89Cbned', NULL, NULL),
(2, '5342212.jpg', 'marcial', 'Marcial', NULL, 'Amaro', 'marcial.amaro@chefsandbutlers.net', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '09164794935', '', '', '', '', '', 1, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provider_locations`
--

CREATE TABLE `provider_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provider_locations`
--

INSERT INTO `provider_locations` (`id`, `provider_id`, `location`, `created_at`, `updated_at`) VALUES
(1, '1', 'Katipunan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'features_foods', '1,3,4', 1, NULL, NULL),
(2, 'featured_chefs', '1,2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `picture`, `firstname`, `middlename`, `lastname`, `email`, `password`, `contact`, `street`, `barangay`, `city`, `state`, `postal_code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '12354.jpg', 'John', NULL, 'Doe', 'carlo.flores@chefsandbutlers.net', '$2y$10$kJql5lpJCGlO1netOU7uu.gyn/Ly5Hdf2mcMKEQ4qWcklvB9/8VOG', '09164794935', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '1610', 1, '9QczsSIvqsQCkrOG1oe8vbtHTEf7ezG7wHtjHeAKMBMWxb8qjGXrMTTQ8eGB', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `audit_trails`
--
ALTER TABLE `audit_trails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_ratings`
--
ALTER TABLE `order_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_transactions`
--
ALTER TABLE `order_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_views`
--
ALTER TABLE `page_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `providers_email_unique` (`email`),
  ADD UNIQUE KEY `providers_username_unique` (`username`);

--
-- Indexes for table `provider_locations`
--
ALTER TABLE `provider_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `audit_trails`
--
ALTER TABLE `audit_trails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `order_ratings`
--
ALTER TABLE `order_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `order_transactions`
--
ALTER TABLE `order_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `provider_locations`
--
ALTER TABLE `provider_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
