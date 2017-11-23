-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 11:08 AM
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
-- Database: `cmplx_vmercato`
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
(21, 1, 1, '127.0.0.1', 'carts', 'Added Cart product id = 4', '2017-11-15 18:49:20', '2017-11-15 18:49:20'),
(22, 1, 1, '127.0.0.1', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-11-20 05:12:40', '2017-11-20 05:12:40'),
(23, 1, 2, '127.0.0.1', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2017-11-20 05:13:46', '2017-11-20 05:13:46'),
(24, 1, 2, '127.0.0.1', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2017-11-20 06:03:15', '2017-11-20 06:03:15'),
(25, 5, 1, '127.0.0.1', 'user', 'marcial.amaro@cravingsgroup.com logged in.', '2017-11-20 06:33:31', '2017-11-20 06:33:31'),
(26, 2, 2, '127.0.0.1', 'provider', 'marcial.amaro@chefsandbutlers.net logged in.', '2017-11-20 06:37:11', '2017-11-20 06:37:11'),
(27, 1, 2, '127.0.0.1', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2017-11-21 01:24:06', '2017-11-21 01:24:06'),
(28, 1, 1, '127.0.0.1', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-11-23 08:41:57', '2017-11-23 08:41:57'),
(29, 1, 1, '127.0.0.1', 'carts', 'Added Cart product id = 18', '2017-11-23 08:42:41', '2017-11-23 08:42:41'),
(30, 1, 1, '127.0.0.1', 'carts', 'Added Cart product id = 19', '2017-11-23 08:42:42', '2017-11-23 08:42:42'),
(31, 1, 1, '127.0.0.1', 'carts', ' Deleted a Cart product id = 19', '2017-11-23 08:52:59', '2017-11-23 08:52:59'),
(32, 1, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 19', '2017-11-23 08:53:11', '2017-11-23 08:53:11'),
(33, 1, 1, '127.0.0.1', 'product_categories', 'Updated Main Category #1', '2017-11-23 09:43:30', '2017-11-23 09:43:30'),
(34, 1, 1, '127.0.0.1', 'product_categories', 'Updated Main Category #1', '2017-11-23 09:43:38', '2017-11-23 09:43:38'),
(35, 1, 1, '127.0.0.1', 'locations', 'inserted a new Pick-up Locationasfasfasf', '2017-11-23 10:02:17', '2017-11-23 10:02:17'),
(36, 1, 1, '127.0.0.1', 'locations', 'Updated Pick-up Location #11', '2017-11-23 10:06:20', '2017-11-23 10:06:20'),
(37, 1, 1, '127.0.0.1', 'locations', 'Updated Pick-up Location #11', '2017-11-23 10:06:26', '2017-11-23 10:06:26');

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
(8, 1, 18, 1, 1143.00, 1143.00, '1', '2017-11-23', '9:00 AM', '2017-11-23 08:42:40', '2017-11-23 08:42:40'),
(10, 1, 19, 1, 1011.00, 1011.00, '1', '2017-11-23', '9:00 AM', '2017-11-23 08:53:11', '2017-11-23 08:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cravings - Katipunan', 0, NULL, NULL),
(2, 'TCB - Katipunan', 0, NULL, NULL),
(3, 'CCA - Katipunan', 0, NULL, NULL),
(4, 'BNP - Ortigas', 0, NULL, NULL),
(5, 'Where\'s Marcel - Ortigas', 0, NULL, NULL),
(6, 'Casa Roces - Manila', 0, NULL, NULL),
(7, 'C3 - Greenhills', 0, NULL, NULL),
(8, 'Epicurious - Shangrila', 0, NULL, NULL),
(9, 'C2 - Shangrila', 0, NULL, NULL),
(10, 'The Orange Place - Kamias', 0, NULL, NULL);

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
(18, '2017_11_13_224432_create_admin_table', 10),
(19, '2017_11_20_101122_alter_users_table', 11),
(20, '2017_11_23_150137_create_locations_table', 11);

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

-- --------------------------------------------------------

--
-- Table structure for table `order_ratings`
--

CREATE TABLE `order_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(17, '17.jpg', 1, 6, 'Baked Blueberry Cheesecake', 1143.00, 10, NULL, 'Baked Blueberry Cheesecake', '2017-10-06', '2017-10-31', 1, '0', 1, NULL, NULL),
(18, '18.jpg', 1, 6, 'Baked Strawberry Cheesecake', 1143.00, 10, NULL, 'Baked Strawberry Cheesecake', '2017-10-06', '2017-10-09', 1, '0', 1, NULL, NULL),
(19, '19.jpg', 1, 3, 'Black Forest', 1011.00, 10, NULL, 'Black Forest', '2017-10-06', '2017-10-16', 1, '0', 1, NULL, NULL),
(20, '20.jpg', 1, 3, 'Carrot Cake', 1168.00, 10, NULL, 'Carrot Cake', '2017-10-06', '2017-10-16', 1, '0', 1, NULL, NULL),
(21, '21.jpg', 1, 3, 'Cherry Walnut', 1371.00, 1371, NULL, 'Cherry Walnut', '2017-10-06', '2017-10-17', 1, '0', 1, NULL, NULL),
(22, '22.jpg', 1, 3, 'Chocolate Caramel', 1169.00, 0, NULL, 'Chocolate Caramel', '2017-10-06', '2017-10-15', 1, '0', 1, NULL, NULL),
(23, '23.jpg', 1, 3, 'DARK BELGIAN CAKE', 1315.00, 10, NULL, 'DARK BELGIAN CAKE', '2017-10-06', '2017-10-16', 1, '0', 1, NULL, NULL),
(24, '24.jpg', 1, 3, 'Devils Cake', 1102.00, 10, NULL, 'Devils Cake', '2017-10-06', '2017-10-16', 1, '0', 1, NULL, NULL),
(26, '26.jpg', 1, 3, 'Double Chocolate', 1168.00, 10, NULL, 'Double Chocolate', '2017-10-06', '2017-10-16', 1, '0', 1, NULL, NULL),
(27, '27.jpg', 1, 3, 'Dulce de Leche', 838.00, 10, NULL, 'Dulce de Leche', '2017-10-06', '2017-10-16', 1, '0', 1, NULL, NULL),
(28, '28.jpg', 1, 3, 'Loacker Chocolate Cheesecake', 1011.00, 10, NULL, 'Loacker Chocolate Cheesecake', '2017-10-06', '2017-10-16', 1, '0', 1, NULL, NULL),
(45, '45.jpg', 1, 8, 'Chorizo Fettucine', 290.00, 0, NULL, 'Chorizo Fettucine', '0000-00-00', '0000-00-00', 0, '0', 1, NULL, NULL),
(47, '47.jpg', 2, 8, 'All Meat Platter', 1090.00, 10, NULL, 'All Meat Platter from C2', '2017-10-09', '2018-01-31', 0, '0', 1, NULL, NULL),
(48, '48.jpg', 1, 13, 'Classic Meatballs Spaghetti', 320.00, 10, NULL, 'Classic Meatballs Spaghetti', '2017-10-09', '2017-10-31', 0, '0', 1, NULL, NULL),
(51, '51.jpg', 1, 13, 'Creamy Baked Macaroni', 290.00, 10, NULL, 'Creamy Baked Macaroni', '2017-10-10', '2017-10-31', 0, '0', 1, NULL, NULL),
(52, '52.jpg', 1, 13, 'Fettucine Stroganoff', 390.00, 10, NULL, 'Fettucine Stroganoff', '2017-10-09', '2017-10-31', 0, '0', 1, NULL, NULL),
(53, '53.jpg', 2, 10, 'Bagoong Rice', 135.00, 10, NULL, 'Bagoong Rice from C2', '2017-10-09', '2017-10-31', 0, '0', 1, NULL, NULL),
(54, '54.jpg', 1, 4, 'French Onion Soup Gratinee', 150.00, 10, NULL, 'French Onion Soup Gratinee', '2017-10-09', '2017-10-31', 0, '0', 1, NULL, NULL),
(55, '55.jpg', 1, 13, 'Four Cheese Lasagna', 340.00, 10, NULL, 'Four Cheese Lasagna', '2017-10-09', '2017-10-31', 0, '0', 1, NULL, NULL),
(56, '56.jpg', 1, 8, 'House Premium Burger', 350.00, 10, NULL, 'House Premium Burger', '2017-10-09', '2017-10-31', 0, '0', 1, NULL, NULL),
(57, '57.jpg', 2, 6, 'Bibingka Souffle', 175.00, 12, NULL, 'Bibingka Souffle from C2', '2017-10-09', '2018-02-28', 0, '0', 1, NULL, NULL),
(58, '58.jpg', 2, 8, 'Binagoongan Lechon Kawali', 415.00, 15, NULL, 'Binagoongan Lechon Kawali from C2', '2017-10-30', '2017-12-31', 0, '0', 1, NULL, NULL),
(59, '59.jpg', 2, 5, 'Buko Pandan', 155.00, 25, NULL, 'Buko Pandan from C2', '2017-10-09', '2018-04-30', 0, '0', 1, NULL, NULL),
(60, '60.jpg', 2, 9, 'Bulalo', 495.00, 50, NULL, 'Bulalo from C2', '2017-10-09', '2017-10-31', 0, '0', 1, NULL, NULL),
(61, '61.jpg', 2, 12, 'Chicharong Munggo with Galunggong', 280.00, 280, NULL, 'Chicharong Munggo with Galunggong from C2', '2017-10-09', '2017-12-31', 0, '0', 1, NULL, NULL),
(62, '62.jpg', 2, 8, 'Crispy Kare Kare', 780.00, 780, NULL, 'Crispy Kare Kare from C2', '2017-10-09', '2018-07-31', 0, '0', 1, NULL, NULL),
(63, '63.jpg', 2, 10, 'Dagat Platter', 1090.00, 1090, NULL, 'Dagat Platter from C2', '2017-10-09', '2018-01-31', 0, '0', 1, NULL, NULL),
(64, '64.jpg', 2, 10, 'Gising Gising', 285.00, 285, NULL, 'Gising Gising by C2', '2017-10-10', '2018-01-30', 0, '0', 1, NULL, NULL),
(65, '65.jpg', 1, 8, 'Binagoongan', 150.00, 10, NULL, 'Pork Binagoongan', '2017-11-01', '2017-11-30', 0, '0', 0, NULL, NULL),
(66, '66.jpg', 11, 8, 'Arroz Ala Cubana', 200.00, 10, NULL, 'Pork Dish', '2017-11-08', '2017-11-30', 0, '0', 1, NULL, NULL),
(67, '67.jpg', 11, 6, 'Chocolate Caramel Brownies', 99.00, 10, NULL, 'Chocolate Caramel Brownies', '2017-11-01', '2017-11-30', 0, '0', 0, NULL, NULL),
(68, '68.jpg', 11, 10, 'Garlic Bangus', 185.00, 10, NULL, 'Fish Dish', '2017-11-09', '2017-12-01', 0, '0', 1, NULL, NULL),
(69, '69.jpg', 11, 9, 'Beef Tapa', 175.00, 10, NULL, 'Beef Dish', '2017-11-08', '2017-11-30', 0, '0', 1, NULL, NULL),
(70, '70.jpg', 11, 7, 'Chicken Inasal', 180.00, 10, NULL, 'Grilled Chicken', '2017-11-08', '2017-11-30', 0, '0', 1, NULL, NULL),
(71, '71.jpg', 11, 7, 'Chicken Teriyaki', 185.00, 10, NULL, 'Chicken Dish with Teriyaki Sauce', '2017-11-08', '2017-11-30', 0, '0', 1, NULL, NULL),
(72, '72.jpg', 11, 9, 'Corned Beef', 180.00, 10, NULL, 'House made corned beef', '2017-11-08', '2017-11-30', 0, '0', 1, NULL, NULL),
(73, '73.jpg', 11, 8, 'Menudo', 180.00, 10, NULL, 'Pork in tomato sauce dish', '2017-11-08', '2017-11-30', 0, '0', 1, NULL, NULL),
(74, '74.jpg', 11, 13, 'Bolognese', 175.00, 10, NULL, 'Pasta Dish', '2017-11-08', '2017-11-30', 0, '0', 1, NULL, NULL),
(75, '75.jpg', 11, 10, 'Tuna Sandwich', 95.00, 10, NULL, 'Tuna Sandwich Dish', '2017-11-08', '2017-11-30', 0, '0', 1, NULL, NULL),
(76, '76.jpg', 1, 10, 'Almond Crusted Fish Fillet', 420.00, 10, NULL, 'Almond Crusted Fish Fillet by Cravings Katipunan', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(77, '77.jpg', 1, 8, 'American Baked Ribs', 410.00, 10, NULL, 'American Baked Ribs by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(78, '78.jpg', 1, 10, 'Baked Fish Provencial', 400.00, 10, NULL, 'Baked Fish Provencial by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(79, '79.jpg', 1, 9, 'Beef Fajitas', 395.00, 10, NULL, 'Beef Fajitas by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(80, '80.jpg', 1, 8, 'Bistro Pork Steak', 360.00, 10, NULL, 'Bistro Pork Steak by Cravings', '2017-11-10', '2017-11-30', 0, '1', 1, NULL, NULL),
(81, '81.jpg', 1, 7, 'Chicken A La Pobre', 360.00, 10, NULL, 'Chicken A La Pobre by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(82, '82.jpg', 1, 13, 'Chicken and Pesto Penne', 340.00, 10, NULL, 'Chicken and Pesto Penne by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(83, '83.jpg', 1, 7, 'Chicken Cordon Bleu', 455.00, 10, NULL, 'Chicken Cordon Bleu by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(84, '84.jpg', 1, 7, 'Chicken Galantine', 385.00, 10, NULL, 'Chicken Galantine by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(85, '85.jpg', 1, 13, 'Chorizo Fettucine', 290.00, 10, NULL, 'Chorizo Fettucine by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(86, '86.jpg', 1, 13, 'Classic Meatballs Spaghetti', 320.00, 10, NULL, 'Classic Meatballs Spaghetti by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(87, '87.jpg', 1, 6, 'Cravings Club House', 350.00, 10, NULL, 'Cravings Club House by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(88, '88.jpg', 1, 10, 'Cravings Seafood Basket', 275.00, 10, NULL, 'Cravings Seafood Basket by Cravings', '2017-10-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(89, '89.jpg', 1, 13, 'Creamy Baked Macaroni', 290.00, 10, NULL, 'Creamy Baked Macaroni by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(90, '90.jpg', 3, 7, '3 Way Chick', 195.00, 10, NULL, '3 Way Chick by B&P', '2017-11-10', '2017-11-30', 0, '0', 0, NULL, NULL),
(91, '91.jpg', 1, 13, 'Fettucine Stroganoff', 390.00, 10, NULL, 'Fettucine Stroganoff by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(92, '92.jpg', 3, 7, 'A Game Fish Bun', 250.00, 10, NULL, 'A Game Fish Bun by B&P', '2017-11-10', '2017-11-30', 0, '0', 0, NULL, NULL),
(93, '93.jpg', 1, 13, 'Four Cheese Lasagna', 340.00, 10, NULL, 'Four Cheese Lasagna by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(94, '94.jpg', 1, 4, 'French Onion Soup Gratinee', 150.00, 10, NULL, 'French Onion Soup Gratinee', '2017-11-10', '2017-10-30', 0, '0', 1, NULL, NULL),
(95, '95.jpg', 3, 7, '3 Way Chick', 195.00, 10, NULL, '3 Way Chick by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(96, '96.jpg', 1, 9, 'House Premium Burger', 350.00, 10, NULL, 'House Premium Burger by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(97, '97.jpg', 1, 2, 'K-Pop Chicken', 420.00, 10, NULL, 'K-Pop Chicken by Cravings', '2017-09-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(98, '98.jpg', 1, 2, 'Lengua Con Champignon', 540.00, 10, NULL, 'Lengua Con Champignon by Cravings', '2017-09-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(99, '99.jpg', 3, 10, 'A Game Fish', 250.00, 10, NULL, 'A Game Fish by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(100, '100.jpg', 1, 6, 'Monte Cristo', 290.00, 10, NULL, 'Monte Cristo by Cravings', '2017-09-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(101, '101.jpg', 1, 2, 'Old School Beef Pot Roast', 450.00, 10, NULL, 'Old School Beef Pot Roast by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(102, '102.jpg', 3, 9, 'Bibimbowl', 225.00, 10, NULL, 'Bibimbowl by B&P ', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(103, '103.jpg', 1, 10, 'One Surf and Turf', 575.00, 10, NULL, 'One Surf and Turf by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(104, '104.jpg', 3, 10, 'Bistek Bangus Belly', 250.00, 10, NULL, 'Bistek Bangus Belly by B&P', '2017-11-10', '2017-10-30', 0, '0', 1, NULL, NULL),
(105, '105.jpg', 1, 2, 'Paella Filipina', 420.00, 10, NULL, 'Paella Filipina by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(106, '106.jpg', 3, 2, 'Burito Omelette', 260.00, 10, NULL, 'Burito Omelette by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(107, '107.jpg', 3, 13, 'Carbonara', 265.00, 10, NULL, 'Carbonara by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(108, '108.jpg', 1, 4, 'Pancit Molo', 165.00, 10, NULL, 'Pancit Molo by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(109, '109.jpg', 1, 6, 'Pot Roast Gravy Sandwich', 385.00, 10, NULL, 'Pot Roast Gravy Sandwich by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(110, '110.jpg', 3, 7, 'Chicken Parmigana', 280.00, 10, NULL, 'Chicken Parmigana by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(111, '111.jpg', 3, 7, 'Chicken Toast', 295.00, 10, NULL, 'Chicken Toast by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(112, '112.jpg', 1, 13, 'Spicy Shrimp Gamberetti', 360.00, 10, NULL, 'Spicy Shrimp Gamberetti by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(113, '113.jpg', 1, 2, 'Spring Rolls with Vermicelli', 160.00, 10, NULL, 'Spring Rolls with Vermicelli by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(114, '114.jpg', 3, 4, 'Chowder Soup', 145.00, 10, NULL, 'Chowder Soup by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(115, '115.jpg', 1, 2, 'Sunday Best Roast Chicken', 360.00, 10, NULL, 'Sunday Best Roast Chicken by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(116, '116.jpg', 3, 8, 'Don Malutong', 285.00, 10, NULL, 'Don Malutong by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(117, '117.jpg', 3, 2, 'Eggs in Purgatory', 195.00, 10, NULL, 'Eggs in Purgatory by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(118, '118.jpg', 1, 2, 'Tenderloin Tips', 480.00, 10, NULL, 'Tenderloin Tips by Cravings', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(119, '119.jpg', 3, 2, 'Go Hawaiian', 185.00, 10, NULL, 'Go Hawaiian by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(120, '120.jpg', 3, 1, 'Ice Cream Cookie Sandwich', 140.00, 10, NULL, 'Ice Cream Cookie Sandwich by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(121, '121.jpg', 3, 13, 'Killer Mac & Cheese', 195.00, 10, NULL, 'Killer Mac & Cheese by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(122, '122.jpg', 3, 7, 'Kimchicken', 295.00, 10, NULL, 'Kimchicken by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(123, '123.jpg', 3, 9, 'Mang Benedicts', 295.00, 10, NULL, 'Mang Benedicts by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(124, '124.jpg', 3, 13, 'Meatball Spaghetti', 195.00, 10, NULL, 'Meatball Spaghetti by B&P ', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(125, '125.jpg', 3, 8, 'Meatloaf Surprise', 285.00, 10, NULL, 'Meatloaf Surprise by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(126, '126.jpg', 3, 13, 'Pesto Chix', 295.00, 10, NULL, 'Pesto Chix by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(127, '127.jpg', 3, 9, 'Primera Tapa', 295.00, 10, NULL, 'Primera Tapa by B&P', '2017-11-10', '2017-10-30', 0, '0', 1, NULL, NULL),
(128, '128.jpg', 3, 4, 'Red Molo Soup', 175.00, 10, NULL, 'Red Molo Soup by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(129, '129.jpg', 3, 2, 'So Young Chow', 220.00, 10, NULL, 'So Young Chow by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(130, '130.jpg', 3, 8, 'Spam Aloha ', 285.00, 10, NULL, 'Spam Aloha by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(131, '131.jpg', 3, 8, 'Spam Aloha Kids', 285.00, 10, NULL, 'Spam Aloha Kids by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(132, '132.jpg', 3, 8, 'Spam Rice', 165.00, 10, NULL, 'Spam Rice by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(133, '133.jpg', 3, 8, 'Spam Super B', 245.00, 10, NULL, 'Spam Super B by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(134, '134.jpg', 3, 1, 'Toffee Pudding', 175.00, 10, NULL, 'Toffee Pudding by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(135, '135.jpg', 3, 4, 'Tomato Soup with Grilled Cheese', 225.00, 10, NULL, 'Tomato Soup with Grilled Cheese by B&P', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(136, '136.jpg', 4, 14, 'Blueberry Milkshake', 150.00, 10, NULL, 'Blueberry Milkshake by TCB', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(137, '137.jpg', 4, 14, 'Strawberry Milkshake', 150.00, 10, NULL, 'Strawberry Milkshake by TCB', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(138, '138.jpg', 4, 14, 'Mango Cheesecake Milkshake', 150.00, 10, NULL, 'Mango Cheesecake Milkshake by TCB', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(139, '139.jpg', 4, 14, 'Chocolate Caramel Milkshake', 150.00, 10, NULL, 'Chocolate Caramel Milkshake by TCB', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(140, '140.jpg', 4, 15, 'Espresso', 80.00, 10, NULL, 'Espresso by TCB', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(141, '141.jpg', 4, 15, 'Macchiato', 90.00, 10, NULL, 'Macchiato by TCB', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(142, '142.jpg', 4, 15, 'Cafe Latte', 110.00, 10, NULL, 'Cafe Latte by TCB', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(143, '143.jpg', 4, 15, 'Capuccino', 110.00, 10, NULL, 'Capuccino by TCB', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(144, '144.jpg', 5, 15, 'Espresso', 90.00, 10, NULL, 'Espresso by Where\'s Marcel?', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(145, '145.jpg', 5, 15, 'Macchiato', 110.00, 10, NULL, 'Macchiato by Where\'s Marcel?', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(146, '146.jpg', 5, 15, 'Piccolo', 120.00, 10, NULL, 'Piccolo by Where\'s Marcel?', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL),
(147, '147.jpg', 5, 15, 'Long Black', 120.00, 10, NULL, 'Long Black by Where\'s Marcel?', '2017-11-10', '2017-10-30', 0, '0', 1, NULL, NULL),
(148, '148.jpg', 5, 15, 'Cafe Latte', 150.00, 10, NULL, 'Cafe Latte by Where\'s Marcel?', '2017-11-10', '2017-11-30', 0, '0', 1, NULL, NULL);

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
(1, '1511430218.jpg', 'Dessert', NULL, 1, NULL, '2017-11-23 09:43:38'),
(2, '1234567.jpg', 'Entree', NULL, 1, NULL, NULL),
(3, NULL, 'Cake', 1, 1, NULL, NULL),
(4, '123.jpg', 'Soup', NULL, 1, NULL, NULL),
(5, NULL, 'Frozen', 1, 1, NULL, NULL),
(6, NULL, 'Pastries', 1, 1, NULL, NULL),
(7, NULL, 'Poultry', 2, 1, NULL, NULL),
(8, NULL, 'Pork', 2, 1, NULL, NULL),
(9, NULL, 'Beef', 2, 1, NULL, NULL),
(10, NULL, 'Seafood', 2, 1, NULL, NULL),
(11, NULL, 'Vegetarian', 2, 1, NULL, NULL),
(12, NULL, 'Vegan', 2, 1, NULL, NULL),
(13, NULL, 'Pasta', 2, 1, NULL, NULL),
(14, '1234.jpg', 'Beverages', NULL, 1, NULL, NULL),
(15, NULL, 'Coffee', 14, 1, NULL, NULL);

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
(1, '5790383.jpg', 'cravings', 'Chef', '', 'Cravings', 'carlo.flores@chefsandbutlers.net', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '09164794935', '134 Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '1610', 1, 'GkauTZPUoPRZrjzpp5t1mlNqkVz2ZkWS6K1r8vx7XqMqFxMvX032CKEgHcQX', NULL, NULL),
(2, '5342212.jpg', 'c2', 'Chef', NULL, 'C2', 'marcial.amaro@chefsandbutlers.net', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '09164794935', '', '', '', '', '', 1, '', NULL, NULL),
(3, '5342212.jpg', 'bnp', 'Chef', NULL, 'BNP', 'bnp@vmercatop.com', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '09164794935', '', '', '', '', '', 1, '', NULL, NULL),
(4, '5342212.jpg', 'tcb', 'Chef', NULL, 'TCB', 'tcb@vmercatop.com', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '09164794935', '', '', '', '', '', 1, '', NULL, NULL),
(5, '5342212.jpg', 'wheresmarcel', 'Chef', NULL, 'Marcel', 'wheresmarcel@vmercatop.com', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '09164794935', '', '', '', '', '', 1, '', NULL, NULL),
(11, '5342212.jpg', 'top', 'Chef', NULL, 'Orange', 'top@vmercatop.com', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '09164794935', '', '', '', '', '', 1, '', NULL, NULL);

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
(1, '1', '1', NULL, NULL),
(2, '2', '9', NULL, NULL),
(3, '3', '4', NULL, NULL),
(4, '4', '2', NULL, NULL),
(5, '5', '5', NULL, NULL),
(6, '11', '10', NULL, NULL);

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
(1, 'features_foods', '56,55,75,65', 1, NULL, NULL),
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
(1, '12354.jpg', 'John', NULL, 'Doe', 'carlo.flores@chefsandbutlers.net', '$2y$10$kJql5lpJCGlO1netOU7uu.gyn/Ly5Hdf2mcMKEQ4qWcklvB9/8VOG', '09164794935', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '1610', 1, 'y32udYf9NtbkWoyJo7a49qecMbUgm1CMnKoUmmvCQBwUJU1tYmtMYL5Pskmh', NULL, NULL),
(2, '', 'alskflhasflkh', NULL, 'lkhkllkh', 'asfasfasfasf@asfasfasf.com', '$2y$10$eg3R2fOXFYeb0PvqyXBP3eaAvYWjfqbeoQZe2k9jFL3FRuk/boZYi', '098901823', '', '', '', '', '', 1, NULL, '2017-11-20 02:58:55', '2017-11-20 02:58:55'),
(3, '', 'asf', NULL, 'asfasfasf', 'asfasf@asasdasd.com', '$2y$10$iqi2BnDN6U783C/nYm4V..SKTLyNDIImYmwnlRJgKcVNZy46mCan2', '123123', '', '', '', '', '', 1, NULL, '2017-11-20 04:52:46', '2017-11-20 04:52:46'),
(4, '', 'Carlo', NULL, 'Flores', 'test@test.com', '$2y$10$dgtLfKgNuAogSahdHuPvAOkCtNhDMK1qEgnhysP1Xa8lZJJzxwK/S', '123123123', '', '', '', '', '', 1, NULL, '2017-11-20 04:54:52', '2017-11-20 04:54:52');

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
-- Indexes for table `locations`
--
ALTER TABLE `locations`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_ratings`
--
ALTER TABLE `order_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_transactions`
--
ALTER TABLE `order_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `provider_locations`
--
ALTER TABLE `provider_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
