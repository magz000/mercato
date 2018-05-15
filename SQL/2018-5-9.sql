-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 04:29 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vmercato`
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
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `firstname`, `middlename`, `lastname`, `privilege_id`, `contact`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'john.doe@chefsandbutlers.net', '$2y$10$UgnCNdgPQab.EXX7uVxXHeNeNeJpfzDsyag2xWHlYxlMBLSmbxX/O', 'John', '', 'Doe', 1, '09164794935', 1, '', NULL, NULL);

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
(37, 1, 1, '127.0.0.1', 'locations', 'Updated Pick-up Location #11', '2017-11-23 10:06:26', '2017-11-23 10:06:26'),
(38, 1, 1, '127.0.0.1', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-11-24 03:21:52', '2017-11-24 03:21:52'),
(39, 1, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 79', '2017-11-24 03:22:06', '2017-11-24 03:22:06'),
(40, 1, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 27', '2017-11-24 03:22:10', '2017-11-24 03:22:10'),
(41, 1, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 77', '2017-11-24 03:22:15', '2017-11-24 03:22:15'),
(42, 1, 1, '127.0.0.1', 'carts', 'UpdatedAdded to Cart product id = 77', '2017-11-24 03:22:19', '2017-11-24 03:22:19'),
(43, 1, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 82', '2017-11-24 03:22:23', '2017-11-24 03:22:23'),
(44, 1, 1, '127.0.0.1', 'orders', 'Checkout of Order id 1', '2017-11-24 03:23:15', '2017-11-24 03:23:15'),
(45, 1, 1, '127.0.0.1', 'orders', 'Paid the Order 1', '2017-11-24 03:25:27', '2017-11-24 03:25:27'),
(46, 1, 2, '127.0.0.1', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2017-11-24 04:15:28', '2017-11-24 04:15:28'),
(47, 1, 2, '127.0.0.1', 'order_contents', 'updated status from 0 to 2 order content id = 1', '2017-11-24 04:15:47', '2017-11-24 04:15:47'),
(48, 1, 2, '127.0.0.1', 'order_contents', 'updated status from 0 to 0 order content id = 2', '2017-11-24 04:15:57', '2017-11-24 04:15:57'),
(49, 1, 2, '127.0.0.1', 'order_contents', 'updated status from 0 to 1 order content id = 2', '2017-11-24 04:16:01', '2017-11-24 04:16:01'),
(50, 1, 2, '127.0.0.1', 'order_contents', 'updated status from 1 to 2 order content id = 2', '2017-11-24 04:16:05', '2017-11-24 04:16:05'),
(51, 1, 2, '127.0.0.1', 'order_contents', 'updated status from 0 to 2 order content id = 3', '2017-11-24 04:16:13', '2017-11-24 04:16:13'),
(52, 1, 2, '127.0.0.1', 'order_contents', 'updated status from 0 to 2 order content id = 4', '2017-11-24 04:16:54', '2017-11-24 04:16:54'),
(53, 1, 3, '127.0.0.1', 'locations', 'Updated Pick-up Location #1', '2017-11-24 05:17:46', '2017-11-24 05:17:46'),
(54, 1, 1, '127.0.0.1', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-11-24 05:57:17', '2017-11-24 05:57:17'),
(55, 1, 1, '127.0.0.1', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-11-24 06:59:38', '2017-11-24 06:59:38'),
(56, 1, 1, '127.0.0.1', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-11-24 09:06:46', '2017-11-24 09:06:46'),
(57, 1, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 18', '2017-11-24 09:06:55', '2017-11-24 09:06:55'),
(58, 1, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 19', '2017-11-24 09:06:58', '2017-11-24 09:06:58'),
(59, 1, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 20', '2017-11-24 09:07:01', '2017-11-24 09:07:01'),
(60, 1, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 17', '2017-11-24 09:07:03', '2017-11-24 09:07:03'),
(61, 1, 1, '127.0.0.1', 'orders', 'Checkout of Order id 3', '2017-11-24 09:07:12', '2017-11-24 09:07:12'),
(62, 1, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 19', '2017-11-24 09:09:58', '2017-11-24 09:09:58'),
(63, 1, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 98', '2017-11-24 09:10:03', '2017-11-24 09:10:03'),
(64, 1, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 97', '2017-11-24 09:10:04', '2017-11-24 09:10:04'),
(65, 1, 1, '127.0.0.1', 'orders', 'Checkout of Order id 4', '2017-11-24 09:10:11', '2017-11-24 09:10:11'),
(66, 1, 1, '127.0.0.1', 'orders', 'Paid the Order 4', '2017-11-24 09:10:50', '2017-11-24 09:10:50'),
(67, 1, 1, '127.0.0.1', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-11-27 02:15:17', '2017-11-27 02:15:17'),
(68, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-06 22:32:33', '2017-12-06 22:32:33'),
(69, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 19', '2017-12-06 22:32:40', '2017-12-06 22:32:40'),
(70, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-06 22:32:41', '2017-12-06 22:32:41'),
(71, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 17', '2017-12-06 22:32:41', '2017-12-06 22:32:41'),
(72, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 5', '2017-12-06 22:32:48', '2017-12-06 22:32:48'),
(73, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via TCG Card 5', '2017-12-06 23:23:55', '2017-12-06 23:23:55'),
(74, 1, 1, '124.107.221.205', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-06 23:33:02', '2017-12-06 23:33:02'),
(75, 1, 2, '121.96.182.168', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-06 23:34:08', '2017-12-06 23:34:08'),
(76, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-08 17:26:23', '2017-12-08 17:26:23'),
(77, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 17', '2017-12-08 17:26:34', '2017-12-08 17:26:34'),
(78, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 19', '2017-12-08 17:26:38', '2017-12-08 17:26:38'),
(79, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 6', '2017-12-08 17:26:46', '2017-12-08 17:26:46'),
(80, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-08 17:51:13', '2017-12-08 17:51:13'),
(81, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 17', '2017-12-08 17:51:17', '2017-12-08 17:51:17'),
(82, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-08 17:51:19', '2017-12-08 17:51:19'),
(83, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-11 15:52:18', '2017-12-11 15:52:18'),
(84, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-11 15:53:03', '2017-12-11 15:53:03'),
(85, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 7', '2017-12-11 15:53:24', '2017-12-11 15:53:24'),
(86, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via TCG Card 7', '2017-12-11 15:55:52', '2017-12-11 15:55:52'),
(87, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 17', '2017-12-11 15:57:35', '2017-12-11 15:57:35'),
(88, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-11 15:57:36', '2017-12-11 15:57:36'),
(89, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-11 17:39:56', '2017-12-11 17:39:56'),
(90, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-11 17:40:41', '2017-12-11 17:40:41'),
(91, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-11 17:43:10', '2017-12-11 17:43:10'),
(92, 5, 1, '124.107.221.205', 'user', 'ajugueta.cravingsgroup@gmail.com logged in.', '2017-12-11 17:43:43', '2017-12-11 17:43:43'),
(93, 5, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 66', '2017-12-11 17:43:55', '2017-12-11 17:43:55'),
(94, 5, 1, '121.96.182.168', 'orders', 'Checkout of Order id 8', '2017-12-11 17:44:40', '2017-12-11 17:44:40'),
(95, 5, 1, '121.96.182.168', 'orders', 'Paid the Order via TCG Card 8', '2017-12-11 17:44:51', '2017-12-11 17:44:51'),
(96, 5, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 72', '2017-12-11 17:45:46', '2017-12-11 17:45:46'),
(97, 5, 1, '124.107.221.205', 'orders', 'Checkout of Order id 9', '2017-12-11 17:47:11', '2017-12-11 17:47:11'),
(98, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-11 17:49:54', '2017-12-11 17:49:54'),
(99, 1, 1, '122.2.43.44', 'carts', 'UpdatedAdded to Cart product id = 18', '2017-12-11 17:56:28', '2017-12-11 17:56:28'),
(100, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 10', '2017-12-11 17:58:24', '2017-12-11 17:58:24'),
(101, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via TCG Card 10', '2017-12-11 17:58:37', '2017-12-11 17:58:37'),
(102, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 136', '2017-12-11 17:58:58', '2017-12-11 17:58:58'),
(103, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 137', '2017-12-11 17:59:02', '2017-12-11 17:59:02'),
(104, 1, 1, '122.2.43.44', 'carts', ' Deleted a Cart product id = 137', '2017-12-11 17:59:57', '2017-12-11 17:59:57'),
(105, 1, 1, '122.2.43.44', 'carts', ' Deleted a Cart product id = 136', '2017-12-11 17:59:58', '2017-12-11 17:59:58'),
(106, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 137', '2017-12-11 18:00:29', '2017-12-11 18:00:29'),
(107, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 136', '2017-12-11 18:00:30', '2017-12-11 18:00:30'),
(108, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 11', '2017-12-11 18:01:01', '2017-12-11 18:01:01'),
(109, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via TCG Card 11', '2017-12-11 18:01:11', '2017-12-11 18:01:11'),
(110, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 17', '2017-12-11 18:04:06', '2017-12-11 18:04:06'),
(111, 6, 1, '121.96.182.168', 'user', 'marcial.amaro6@gmail.com logged in.', '2017-12-11 18:07:38', '2017-12-11 18:07:38'),
(112, 6, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 137', '2017-12-11 18:08:01', '2017-12-11 18:08:01'),
(113, 6, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 138', '2017-12-11 18:08:07', '2017-12-11 18:08:07'),
(114, 6, 1, '124.107.221.205', 'orders', 'Checkout of Order id 12', '2017-12-11 18:12:01', '2017-12-11 18:12:01'),
(115, 6, 1, '124.107.221.205', 'orders', 'Paid the Order via TCG Card 12', '2017-12-11 18:20:52', '2017-12-11 18:20:52'),
(116, 6, 1, '121.96.182.168', 'carts', 'AddedAdded to Cart product id = 45', '2017-12-11 18:22:10', '2017-12-11 18:22:10'),
(117, 6, 1, '121.96.182.168', 'orders', 'Checkout of Order id 13', '2017-12-11 18:23:54', '2017-12-11 18:23:54'),
(118, 6, 1, '124.107.221.205', 'orders', 'Paid the Order 13', '2017-12-11 18:27:51', '2017-12-11 18:27:51'),
(119, 6, 1, '121.96.182.168', 'carts', 'AddedAdded to Cart product id = 20', '2017-12-11 18:28:38', '2017-12-11 18:28:38'),
(120, 6, 1, '121.96.182.168', 'orders', 'Checkout of Order id 14', '2017-12-11 18:29:39', '2017-12-11 18:29:39'),
(121, 5, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 69', '2017-12-11 19:15:42', '2017-12-11 19:15:42'),
(122, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-11 19:24:27', '2017-12-11 19:24:27'),
(123, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-11 19:27:24', '2017-12-11 19:27:24'),
(124, 5, 1, '121.96.182.168', 'user', 'ajugueta.cravingsgroup@gmail.com logged in.', '2017-12-11 19:27:51', '2017-12-11 19:27:51'),
(125, 6, 1, '121.96.182.168', 'orders', 'Paid the Order 14', '2017-12-11 19:31:11', '2017-12-11 19:31:11'),
(126, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-11 19:37:17', '2017-12-11 19:37:17'),
(127, 5, 1, '124.107.221.205', 'user', 'ajugueta.cravingsgroup@gmail.com logged in.', '2017-12-11 19:38:23', '2017-12-11 19:38:23'),
(128, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-11 19:44:51', '2017-12-11 19:44:51'),
(129, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 15', '2017-12-11 19:45:05', '2017-12-11 19:45:05'),
(130, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via TCG Card 15', '2017-12-11 19:45:14', '2017-12-11 19:45:14'),
(131, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-11 19:45:30', '2017-12-11 19:45:30'),
(132, 6, 1, '121.96.182.168', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-11 19:47:22', '2017-12-11 19:47:22'),
(133, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-11 19:55:24', '2017-12-11 19:55:24'),
(134, 6, 1, '124.107.221.205', 'user', 'marcial.amaro6@gmail.com logged in.', '2017-12-11 19:56:47', '2017-12-11 19:56:47'),
(135, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-11 19:57:56', '2017-12-11 19:57:56'),
(136, 5, 1, '121.96.182.168', 'orders', 'Checkout of Order id 16', '2017-12-11 20:02:42', '2017-12-11 20:02:42'),
(137, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 17', '2017-12-11 20:04:28', '2017-12-11 20:04:28'),
(138, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 18', '2017-12-11 20:04:50', '2017-12-11 20:04:50'),
(139, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 19', '2017-12-11 20:05:16', '2017-12-11 20:05:16'),
(140, 6, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 19', '2017-12-11 20:06:52', '2017-12-11 20:06:52'),
(141, 6, 1, '124.107.221.205', 'orders', 'Checkout of Order id 19', '2017-12-11 20:09:26', '2017-12-11 20:09:26'),
(142, 6, 1, '124.107.221.205', 'orders', 'Paid the Order via TCG Card 19', '2017-12-11 20:17:50', '2017-12-11 20:17:50'),
(143, 5, 1, '124.107.221.205', 'orders', 'Paid the Order 16', '2017-12-11 20:28:40', '2017-12-11 20:28:40'),
(144, 5, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 72', '2017-12-11 21:06:37', '2017-12-11 21:06:37'),
(145, 5, 1, '121.96.182.168', 'orders', 'Checkout of Order id 20', '2017-12-11 21:13:54', '2017-12-11 21:13:54'),
(146, 5, 1, '121.96.182.168', 'orders', 'Paid the Order 20', '2017-12-11 21:16:38', '2017-12-11 21:16:38'),
(147, 6, 1, '124.107.221.205', 'user', 'marcial.amaro6@gmail.com logged in.', '2017-12-11 23:09:49', '2017-12-11 23:09:49'),
(148, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-12 14:27:46', '2017-12-12 14:27:46'),
(149, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-12 14:40:24', '2017-12-12 14:40:24'),
(150, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-12 15:07:22', '2017-12-12 15:07:22'),
(151, 1, 2, '122.2.43.44', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-12 21:02:55', '2017-12-12 21:02:55'),
(152, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-12 21:03:23', '2017-12-12 21:03:23'),
(153, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 17', '2017-12-12 21:03:41', '2017-12-12 21:03:41'),
(154, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-12 21:03:41', '2017-12-12 21:03:41'),
(155, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 21', '2017-12-12 21:03:53', '2017-12-12 21:03:53'),
(156, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via TCG Card 21', '2017-12-12 21:04:17', '2017-12-12 21:04:17'),
(157, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-12 21:04:54', '2017-12-12 21:04:54'),
(158, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 22', '2017-12-12 21:05:07', '2017-12-12 21:05:07'),
(159, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via TCG Card 22', '2017-12-12 21:05:34', '2017-12-12 21:05:34'),
(160, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-12 22:16:28', '2017-12-12 22:16:28'),
(161, 4, 2, '122.54.231.14', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-12 22:36:35', '2017-12-12 22:36:35'),
(162, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-13 15:08:44', '2017-12-13 15:08:44'),
(163, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 19', '2017-12-13 15:08:48', '2017-12-13 15:08:48'),
(164, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 23', '2017-12-13 15:08:59', '2017-12-13 15:08:59'),
(165, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via TCG Card 23', '2017-12-13 15:09:09', '2017-12-13 15:09:09'),
(166, 4, 2, '121.96.182.168', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-13 15:47:28', '2017-12-13 15:47:28'),
(167, 4, 2, '124.107.221.205', 'order_contents', 'updated status from 0 to 2 order content id = 33', '2017-12-13 15:48:10', '2017-12-13 15:48:10'),
(168, 4, 2, '121.96.182.168', 'order_contents', 'updated status from 0 to 1 order content id = 32', '2017-12-13 15:48:52', '2017-12-13 15:48:52'),
(169, 1, 1, '121.96.182.168', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-13 15:51:25', '2017-12-13 15:51:25'),
(170, 1, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 137', '2017-12-13 15:51:50', '2017-12-13 15:51:50'),
(171, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-13 15:55:34', '2017-12-13 15:55:34'),
(172, 1, 2, '122.2.43.44', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-13 17:02:26', '2017-12-13 17:02:26'),
(173, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 20', '2017-12-13 17:02:50', '2017-12-13 17:02:50'),
(174, 1, 1, '122.2.43.44', 'carts', ' Deleted a Cart product id = 137', '2017-12-13 17:03:07', '2017-12-13 17:03:07'),
(175, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 24', '2017-12-13 17:04:28', '2017-12-13 17:04:28'),
(176, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via TCG Card 24', '2017-12-13 17:04:39', '2017-12-13 17:04:39'),
(177, 1, 2, '122.2.43.44', 'order_contents', 'updated status from 0 to 2 order content id = 49', '2017-12-13 17:04:54', '2017-12-13 17:04:54'),
(178, 1, 1, '124.107.221.205', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-13 17:06:39', '2017-12-13 17:06:39'),
(179, 1, 1, '121.96.182.168', 'carts', 'AddedAdded to Cart product id = 139', '2017-12-13 17:07:08', '2017-12-13 17:07:08'),
(180, 1, 1, '121.96.182.168', 'carts', 'AddedAdded to Cart product id = 138', '2017-12-13 17:07:13', '2017-12-13 17:07:13'),
(181, 1, 1, '124.107.221.205', 'orders', 'Checkout of Order id 25', '2017-12-13 17:07:55', '2017-12-13 17:07:55'),
(182, 1, 1, '124.107.221.205', 'orders', 'Paid the Order 25', '2017-12-13 17:08:41', '2017-12-13 17:08:41'),
(183, 4, 2, '121.96.182.168', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-13 17:09:34', '2017-12-13 17:09:34'),
(184, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-13 17:28:21', '2017-12-13 17:28:21'),
(185, 4, 2, '121.96.182.168', 'order_contents', 'updated status from 0 to 2 order content id = 50', '2017-12-13 18:49:45', '2017-12-13 18:49:45'),
(186, 4, 2, '124.107.221.205', 'order_contents', 'updated status from 0 to 1 order content id = 35', '2017-12-13 19:11:49', '2017-12-13 19:11:49'),
(187, 1, 2, '122.2.43.44', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-13 19:19:39', '2017-12-13 19:19:39'),
(188, 1, 2, '122.2.43.44', 'order_contents', 'updated status from 2 to 2 order content id = 49', '2017-12-13 19:21:15', '2017-12-13 19:21:15'),
(189, 1, 2, '122.2.43.44', 'order_contents', 'updated status from 0 to 2 order content id = 48', '2017-12-13 19:21:23', '2017-12-13 19:21:23'),
(190, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-13 19:22:01', '2017-12-13 19:22:01'),
(191, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-13 19:22:04', '2017-12-13 19:22:04'),
(192, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 26', '2017-12-13 19:22:23', '2017-12-13 19:22:23'),
(193, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via TCG Card 26', '2017-12-13 19:22:45', '2017-12-13 19:22:45'),
(194, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 20', '2017-12-13 19:39:56', '2017-12-13 19:39:56'),
(195, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 27', '2017-12-13 19:40:18', '2017-12-13 19:40:18'),
(196, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 19', '2017-12-13 19:40:54', '2017-12-13 19:40:54'),
(197, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 28', '2017-12-13 19:41:07', '2017-12-13 19:41:07'),
(198, 1, 2, '122.2.43.44', 'order_contents', 'updated status from 0 to 2 order content id = 54', '2017-12-13 19:41:25', '2017-12-13 19:41:25'),
(199, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via TCG Card 28', '2017-12-13 19:41:39', '2017-12-13 19:41:39'),
(200, 1, 2, '122.2.43.44', 'order_contents', 'updated status from 2 to 5 order content id = 54', '2017-12-13 19:48:33', '2017-12-13 19:48:33'),
(201, 4, 2, '121.96.182.168', 'order_contents', 'updated status from 0 to 5 order content id = 34', '2017-12-13 19:48:35', '2017-12-13 19:48:35'),
(202, 4, 2, '124.107.221.205', 'order_contents', 'updated status from 5 to 5 order content id = 34', '2017-12-13 19:48:44', '2017-12-13 19:48:44'),
(203, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 19', '2017-12-13 19:49:01', '2017-12-13 19:49:01'),
(204, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 29', '2017-12-13 19:51:43', '2017-12-13 19:51:43'),
(205, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via TCG Card 29', '2017-12-13 19:51:54', '2017-12-13 19:51:54'),
(206, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 19', '2017-12-13 19:52:07', '2017-12-13 19:52:07'),
(207, 1, 1, '122.2.43.44', 'carts', ' Deleted a Cart product id = 19', '2017-12-13 19:52:14', '2017-12-13 19:52:14'),
(208, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-13 19:52:40', '2017-12-13 19:52:40'),
(209, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 30', '2017-12-13 19:52:49', '2017-12-13 19:52:49'),
(210, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-13 20:46:04', '2017-12-13 20:46:04'),
(211, 1, 1, '124.107.221.205', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-13 20:46:47', '2017-12-13 20:46:47'),
(212, 1, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 143', '2017-12-13 20:48:23', '2017-12-13 20:48:23'),
(213, 1, 1, '124.107.221.205', 'orders', 'Checkout of Order id 31', '2017-12-13 20:48:46', '2017-12-13 20:48:46'),
(214, 1, 1, '124.107.221.205', 'orders', 'Paid the Order via TCG Card 31', '2017-12-13 20:48:56', '2017-12-13 20:48:56'),
(215, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-13 21:08:10', '2017-12-13 21:08:10'),
(216, 1, 1, '121.96.182.168', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-13 22:28:35', '2017-12-13 22:28:35'),
(217, 1, 1, '121.96.182.168', 'carts', 'AddedAdded to Cart product id = 136', '2017-12-13 22:29:02', '2017-12-13 22:29:02'),
(218, 1, 1, '124.107.221.205', 'carts', 'UpdatedAdded to Cart product id = 136', '2017-12-13 22:29:15', '2017-12-13 22:29:15'),
(219, 1, 1, '121.96.182.168', 'orders', 'Checkout of Order id 32', '2017-12-13 22:29:35', '2017-12-13 22:29:35'),
(220, 1, 1, '121.96.182.168', 'orders', 'Paid the Order via TCG Card 32', '2017-12-13 22:29:52', '2017-12-13 22:29:52'),
(221, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-13 22:37:26', '2017-12-13 22:37:26'),
(222, 4, 2, '110.54.219.57', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-13 22:47:56', '2017-12-13 22:47:56'),
(223, 4, 2, '121.96.182.168', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-14 17:06:33', '2017-12-14 17:06:33'),
(224, 1, 1, '121.96.182.168', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-14 17:07:02', '2017-12-14 17:07:02'),
(225, 1, 1, '121.96.182.168', 'carts', 'AddedAdded to Cart product id = 141', '2017-12-14 17:08:05', '2017-12-14 17:08:05'),
(226, 1, 1, '121.96.182.168', 'orders', 'Checkout of Order id 33', '2017-12-14 17:08:44', '2017-12-14 17:08:44'),
(227, 1, 1, '121.96.182.168', 'orders', 'Paid the Order via TCG Card 33', '2017-12-14 17:09:03', '2017-12-14 17:09:03'),
(228, 4, 2, '124.107.221.205', 'order_contents', 'updated status from 0 to 2 order content id = 59', '2017-12-14 17:14:30', '2017-12-14 17:14:30'),
(229, 1, 1, '124.107.221.205', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-14 17:27:32', '2017-12-14 17:27:32'),
(230, 1, 1, '121.96.182.168', 'carts', 'AddedAdded to Cart product id = 28', '2017-12-14 17:27:44', '2017-12-14 17:27:44'),
(231, 1, 1, '124.107.221.205', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-14 17:53:55', '2017-12-14 17:53:55'),
(232, 1, 1, '121.96.182.168', 'carts', 'AddedAdded to Cart product id = 140', '2017-12-14 17:54:21', '2017-12-14 17:54:21'),
(233, 1, 1, '124.107.221.205', 'carts', ' Deleted a Cart product id = 28', '2017-12-14 17:54:49', '2017-12-14 17:54:49'),
(234, 1, 1, '121.96.182.168', 'orders', 'Checkout of Order id 34', '2017-12-14 17:55:34', '2017-12-14 17:55:34'),
(235, 1, 1, '124.107.221.205', 'orders', 'Paid the Order via TCG Card 34', '2017-12-14 17:56:25', '2017-12-14 17:56:25'),
(236, 4, 2, '121.96.182.168', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-14 21:56:16', '2017-12-14 21:56:16'),
(237, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-18 20:21:56', '2017-12-18 20:21:56'),
(238, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-18 20:22:10', '2017-12-18 20:22:10'),
(239, 1, 1, '124.107.221.205', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-19 17:33:26', '2017-12-19 17:33:26'),
(240, 1, 1, '124.107.221.205', 'orders', 'Checkout of Order id 35', '2017-12-19 17:34:29', '2017-12-19 17:34:29'),
(241, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-21 20:15:02', '2017-12-21 20:15:02'),
(242, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 20', '2017-12-21 20:15:11', '2017-12-21 20:15:11'),
(243, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 19', '2017-12-21 20:15:37', '2017-12-21 20:15:37'),
(244, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-21 20:15:42', '2017-12-21 20:15:42'),
(245, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 17', '2017-12-21 20:15:42', '2017-12-21 20:15:42'),
(246, 1, 1, '122.2.43.44', 'carts', ' Deleted a Cart product id = 17', '2017-12-21 20:18:39', '2017-12-21 20:18:39'),
(247, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-21 21:41:28', '2017-12-21 21:41:28'),
(248, 4, 2, '110.54.187.157', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-21 23:12:41', '2017-12-21 23:12:41'),
(249, 4, 2, '121.96.182.168', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-21 23:21:48', '2017-12-21 23:21:48'),
(250, 4, 2, '110.54.187.157', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-21 23:39:16', '2017-12-21 23:39:16'),
(251, 7, 1, '121.96.182.168', 'user', 'angelojugueta@gmail.com logged in.', '2017-12-21 23:40:20', '2017-12-21 23:40:20'),
(252, 7, 1, '121.96.182.168', 'carts', 'AddedAdded to Cart product id = 142', '2017-12-21 23:40:49', '2017-12-21 23:40:49'),
(253, 8, 1, '124.107.221.205', 'user', 'ricotrinidad@yahoo.com logged in.', '2017-12-21 23:44:25', '2017-12-21 23:44:25'),
(254, 8, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 142', '2017-12-21 23:45:08', '2017-12-21 23:45:08'),
(255, 1, 1, '110.54.187.157', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-21 23:50:21', '2017-12-21 23:50:21'),
(256, 1, 1, '110.54.187.157', 'carts', 'UpdatedAdded to Cart product id = 18', '2017-12-21 23:50:38', '2017-12-21 23:50:38'),
(257, 1, 1, '110.54.187.157', 'orders', 'Checkout of Order id 36', '2017-12-21 23:50:59', '2017-12-21 23:50:59'),
(258, 7, 1, '121.96.182.168', 'orders', 'Checkout of Order id 37', '2017-12-21 23:54:55', '2017-12-21 23:54:55'),
(259, 7, 1, '121.96.182.168', 'carts', 'AddedAdded to Cart product id = 142', '2017-12-21 23:57:49', '2017-12-21 23:57:49'),
(260, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-21 23:59:29', '2017-12-21 23:59:29'),
(261, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-21 23:59:36', '2017-12-21 23:59:36'),
(262, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 17', '2017-12-21 23:59:37', '2017-12-21 23:59:37'),
(263, 9, 1, '122.2.43.44', 'user', 'asdasd@asdasd.com logged in.', '2017-12-22 00:01:03', '2017-12-22 00:01:03'),
(264, 9, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 21', '2017-12-22 00:01:11', '2017-12-22 00:01:11'),
(265, 9, 1, '122.2.43.44', 'orders', 'Checkout of Order id 38', '2017-12-22 00:02:32', '2017-12-22 00:02:32'),
(266, 7, 1, '124.107.221.205', 'orders', 'Checkout of Order id 39', '2017-12-22 00:05:51', '2017-12-22 00:05:51'),
(267, 8, 1, '124.107.221.205', 'carts', 'UpdatedAdded to Cart product id = 142', '2017-12-22 00:06:25', '2017-12-22 00:06:25'),
(268, 7, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 142', '2017-12-22 00:07:49', '2017-12-22 00:07:49'),
(269, 9, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-22 00:12:39', '2017-12-22 00:12:39'),
(270, 9, 1, '122.2.43.44', 'carts', ' Deleted a Cart product id = 18', '2017-12-22 00:22:03', '2017-12-22 00:22:03'),
(271, 9, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-22 00:22:54', '2017-12-22 00:22:54'),
(272, 9, 1, '122.2.43.44', 'carts', ' Deleted a Cart product id = 18', '2017-12-22 00:25:03', '2017-12-22 00:25:03'),
(273, 9, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-22 00:25:34', '2017-12-22 00:25:34'),
(274, 9, 1, '122.2.43.44', 'carts', ' Deleted a Cart product id = 18', '2017-12-22 00:25:41', '2017-12-22 00:25:41'),
(275, 9, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-22 00:26:37', '2017-12-22 00:26:37'),
(276, 9, 1, '122.2.43.44', 'carts', ' Deleted a Cart product id = 18', '2017-12-22 00:27:36', '2017-12-22 00:27:36'),
(277, 9, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-22 00:28:06', '2017-12-22 00:28:06'),
(278, 9, 1, '122.2.43.44', 'carts', ' Deleted a Cart product id = 18', '2017-12-22 00:30:53', '2017-12-22 00:30:53'),
(279, 9, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 18', '2017-12-22 00:31:54', '2017-12-22 00:31:54'),
(280, 8, 1, '124.107.221.205', 'carts', ' Deleted a Cart product id = 142', '2017-12-22 00:32:27', '2017-12-22 00:32:27'),
(281, 8, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 142', '2017-12-22 00:32:36', '2017-12-22 00:32:36'),
(282, 8, 1, '121.96.182.168', 'orders', 'Checkout of Order id 40', '2017-12-22 00:33:08', '2017-12-22 00:33:08'),
(283, 8, 1, '121.96.182.168', 'orders', 'Paid the Order via TCG Card 40', '2017-12-22 00:34:09', '2017-12-22 00:34:09'),
(284, 4, 2, '121.96.182.168', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-22 16:47:38', '2017-12-22 16:47:38'),
(285, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-22 16:53:34', '2017-12-22 16:53:34'),
(286, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-22 20:08:34', '2017-12-22 20:08:34'),
(287, 7, 1, '121.96.182.168', 'user', 'angelojugueta@gmail.com logged in.', '2017-12-22 20:18:56', '2017-12-22 20:18:56'),
(288, 7, 1, '121.96.182.168', 'carts', ' Deleted a Cart product id = 142', '2017-12-22 20:19:35', '2017-12-22 20:19:35'),
(289, 10, 1, '124.107.221.205', 'user', 'malizagil@yahoo.com logged in.', '2017-12-22 20:23:40', '2017-12-22 20:23:40'),
(290, 10, 1, '121.96.182.168', 'carts', 'AddedAdded to Cart product id = 136', '2017-12-22 20:24:37', '2017-12-22 20:24:37'),
(291, 10, 1, '121.96.182.168', 'orders', 'Checkout of Order id 41', '2017-12-22 20:25:19', '2017-12-22 20:25:19'),
(292, 10, 1, '121.96.182.168', 'orders', 'Paid the Order via TCG Card 41', '2017-12-22 20:25:47', '2017-12-22 20:25:47'),
(293, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-22 20:28:30', '2017-12-22 20:28:30'),
(294, 1, 2, '124.107.221.205', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-22 20:29:13', '2017-12-22 20:29:13'),
(295, 1, 2, '124.107.221.205', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-22 20:34:17', '2017-12-22 20:34:17'),
(296, 8, 1, '203.87.251.169', 'user', 'ricotrinidad@yahoo.com logged in.', '2017-12-22 20:37:33', '2017-12-22 20:37:33'),
(297, 8, 1, '203.87.251.136', 'carts', 'AddedAdded to Cart product id = 143', '2017-12-22 20:37:53', '2017-12-22 20:37:53'),
(298, 8, 1, '203.87.251.147', 'orders', 'Checkout of Order id 42', '2017-12-22 20:38:19', '2017-12-22 20:38:19'),
(299, 8, 1, '175.158.192.153', 'orders', 'Paid the Order via TCG Card 42', '2017-12-22 20:38:56', '2017-12-22 20:38:56'),
(300, 4, 2, '121.96.182.168', 'order_contents', 'updated status from 0 to 2 order content id = 70', '2017-12-22 20:42:43', '2017-12-22 20:42:43'),
(301, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-22 20:44:51', '2017-12-22 20:44:51'),
(302, 4, 2, '124.107.221.205', 'order_contents', 'updated status from 0 to 2 order content id = 69', '2017-12-22 20:45:13', '2017-12-22 20:45:13'),
(303, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-22 20:45:35', '2017-12-22 20:45:35'),
(304, 1, 2, '124.107.221.205', 'products', 'insert new product Carrot with an id of 149', '2017-12-22 21:04:37', '2017-12-22 21:04:37'),
(305, 4, 2, '124.107.221.205', 'products', 'insert new product Hot Choco with an id of 150', '2017-12-22 21:43:14', '2017-12-22 21:43:14'),
(306, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-27 14:51:30', '2017-12-27 14:51:30'),
(307, 4, 2, '124.107.221.205', 'products', 'insert new product Iced Tea with an id of 151', '2017-12-27 14:55:12', '2017-12-27 14:55:12'),
(308, 4, 2, '124.107.221.205', 'products', 'insert new product Mocha with an id of 152', '2017-12-27 15:02:23', '2017-12-27 15:02:23'),
(309, 4, 2, '121.96.182.168', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-27 15:13:03', '2017-12-27 15:13:03'),
(310, 1, 2, '124.107.221.205', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-27 15:28:55', '2017-12-27 15:28:55'),
(311, 1, 2, '124.107.221.205', 'products', 'insert new product asdasd with an id of 153', '2017-12-27 15:30:07', '2017-12-27 15:30:07'),
(312, 1, 2, '122.2.43.44', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-27 15:54:59', '2017-12-27 15:54:59'),
(313, 1, 2, '122.2.43.44', 'products', 'Updated product asdasd with an id of 153', '2017-12-27 15:55:19', '2017-12-27 15:55:19'),
(314, 1, 2, '122.2.43.44', 'products', 'Updated product asdasd with an id of 153', '2017-12-27 15:56:12', '2017-12-27 15:56:12'),
(315, 4, 2, '121.96.182.168', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-27 17:19:34', '2017-12-27 17:19:34'),
(316, 4, 2, '124.107.221.205', 'products', 'Updated product Hot Choco with an id of 150', '2017-12-27 17:19:52', '2017-12-27 17:19:52'),
(317, 4, 2, '121.96.182.168', 'products', 'Updated product Iced Tea with an id of 151', '2017-12-27 17:20:13', '2017-12-27 17:20:13'),
(318, 4, 2, '121.96.182.168', 'products', 'Updated product Mocha with an id of 152', '2017-12-27 17:21:57', '2017-12-27 17:21:57'),
(319, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-27 19:47:06', '2017-12-27 19:47:06'),
(320, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-28 15:33:54', '2017-12-28 15:33:54'),
(321, 4, 2, '124.107.221.205', 'products', 'insert new product Iced Spicy Mocha with an id of 154', '2017-12-28 15:45:35', '2017-12-28 15:45:35'),
(322, 4, 2, '124.107.221.205', 'products', 'insert new product Chocnut Coffee with an id of 155', '2017-12-28 15:49:10', '2017-12-28 15:49:10'),
(323, 1, 1, '124.107.221.205', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-28 16:51:55', '2017-12-28 16:51:55'),
(324, 1, 1, '124.107.221.205', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-28 16:56:13', '2017-12-28 16:56:13'),
(325, 1, 1, '124.107.221.205', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2017-12-28 16:56:46', '2017-12-28 16:56:46'),
(326, 1, 1, '121.96.182.168', 'carts', ' Deleted a Cart product id = 17', '2017-12-28 16:57:46', '2017-12-28 16:57:46'),
(327, 4, 2, '121.96.182.168', 'provider', 'tcb@vmercatop.com logged in.', '2017-12-28 20:22:25', '2017-12-28 20:22:25'),
(328, 1, 2, '121.96.182.168', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2018-01-03 14:24:49', '2018-01-03 14:24:49'),
(329, 7, 1, '124.107.221.205', 'user', 'angelojugueta@gmail.com logged in.', '2018-01-03 15:23:26', '2018-01-03 15:23:26'),
(330, 7, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 155', '2018-01-03 15:23:48', '2018-01-03 15:23:48'),
(331, 7, 1, '124.107.221.205', 'orders', 'Checkout of Order id 43', '2018-01-03 15:28:12', '2018-01-03 15:28:12'),
(332, 7, 1, '124.107.221.205', 'orders', 'Checkout of Order id 44', '2018-01-03 15:28:12', '2018-01-03 15:28:12'),
(333, 7, 1, '124.107.221.205', 'orders', 'Checkout of Order id 45', '2018-01-03 15:30:25', '2018-01-03 15:30:25'),
(334, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2018-01-03 16:01:25', '2018-01-03 16:01:25'),
(335, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2018-01-03 21:35:15', '2018-01-03 21:35:15'),
(336, 7, 1, '124.107.221.205', 'user', 'angelojugueta@gmail.com logged in.', '2018-01-03 21:37:22', '2018-01-03 21:37:22'),
(337, 7, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 154', '2018-01-03 21:37:32', '2018-01-03 21:37:32'),
(338, 7, 1, '124.107.221.205', 'orders', 'Checkout of Order id 46', '2018-01-03 21:37:45', '2018-01-03 21:37:45'),
(339, 7, 1, '124.107.221.205', 'orders', 'Paid the Order via TCG Card 46', '2018-01-03 21:38:15', '2018-01-03 21:38:15'),
(340, 1, 1, '124.107.221.205', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2018-01-03 22:47:23', '2018-01-03 22:47:23'),
(341, 7, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 137', '2018-01-03 22:47:48', '2018-01-03 22:47:48'),
(342, 7, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 142', '2018-01-03 22:48:20', '2018-01-03 22:48:20'),
(343, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2018-01-04 14:17:34', '2018-01-04 14:17:34'),
(344, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 47', '2018-01-04 14:17:47', '2018-01-04 14:17:47'),
(345, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via TCG Card 47', '2018-01-04 14:17:53', '2018-01-04 14:17:53'),
(346, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2018-01-04 16:03:39', '2018-01-04 16:03:39'),
(347, 1, 1, '124.107.221.205', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2018-01-04 16:21:49', '2018-01-04 16:21:49'),
(348, 1, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 20', '2018-01-04 16:23:02', '2018-01-04 16:23:02'),
(349, 1, 1, '124.107.221.205', 'orders', 'Checkout of Order id 48', '2018-01-04 16:23:23', '2018-01-04 16:23:23'),
(350, 1, 1, '124.107.221.205', 'orders', 'Paid the Order via TCG Card 48', '2018-01-04 16:26:56', '2018-01-04 16:26:56'),
(351, 4, 2, '124.107.221.205', 'products', 'insert new product Curly Tops Coffee with an id of 156', '2018-01-04 16:30:11', '2018-01-04 16:30:11'),
(352, 4, 2, '124.107.221.205', 'products', 'insert new product Americano with an id of 157', '2018-01-04 16:35:49', '2018-01-04 16:35:49'),
(353, 4, 2, '124.107.221.205', 'products', 'Updated product Americano with an id of 157', '2018-01-04 16:39:15', '2018-01-04 16:39:15'),
(354, 1, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 18', '2018-01-04 17:44:32', '2018-01-04 17:44:32'),
(355, 1, 1, '124.107.221.205', 'orders', 'Checkout of Order id 49', '2018-01-04 17:46:06', '2018-01-04 17:46:06'),
(356, 1, 1, '124.107.221.205', 'orders', 'Paid the Order via CASH 49', '2018-01-04 17:46:22', '2018-01-04 17:46:22'),
(357, 1, 2, '124.107.221.205', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2018-01-04 17:53:17', '2018-01-04 17:53:17'),
(358, 1, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 23', '2018-01-04 18:08:11', '2018-01-04 18:08:11'),
(359, 1, 1, '124.107.221.205', 'orders', 'Checkout of Order id 50', '2018-01-04 18:08:39', '2018-01-04 18:08:39'),
(360, 1, 1, '124.107.221.205', 'orders', 'Paid the Order via CASH 50', '2018-01-04 18:08:49', '2018-01-04 18:08:49'),
(361, 1, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 19', '2018-01-04 18:10:12', '2018-01-04 18:10:12'),
(362, 1, 1, '124.107.221.205', 'orders', 'Checkout of Order id 51', '2018-01-04 18:10:36', '2018-01-04 18:10:36'),
(363, 1, 1, '124.107.221.205', 'orders', 'Paid the Order via CASH 51', '2018-01-04 18:10:52', '2018-01-04 18:10:52'),
(364, 1, 2, '124.107.221.205', 'order_contents', 'updated status from 0 to 2 order content id = 77', '2018-01-04 18:11:13', '2018-01-04 18:11:13'),
(365, 1, 2, '124.107.221.205', 'order_contents', 'updated status from 2 to 2 order content id = 77', '2018-01-04 18:11:24', '2018-01-04 18:11:24'),
(366, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2018-01-04 22:45:57', '2018-01-04 22:45:57'),
(367, 7, 1, '124.107.221.205', 'user', 'angelojugueta@gmail.com logged in.', '2018-01-04 22:46:46', '2018-01-04 22:46:46'),
(368, 7, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 156', '2018-01-04 22:46:56', '2018-01-04 22:46:56'),
(369, 7, 1, '124.107.221.205', 'carts', ' Deleted a Cart product id = 137', '2018-01-04 22:47:06', '2018-01-04 22:47:06'),
(370, 7, 1, '124.107.221.205', 'carts', ' Deleted a Cart product id = 142', '2018-01-04 22:47:16', '2018-01-04 22:47:16'),
(371, 7, 1, '124.107.221.205', 'orders', 'Checkout of Order id 52', '2018-01-04 22:47:29', '2018-01-04 22:47:29'),
(372, 7, 1, '124.107.221.205', 'orders', 'Paid the Order via CASH 52', '2018-01-04 22:47:35', '2018-01-04 22:47:35'),
(373, 4, 2, '124.107.221.205', 'order_contents', 'updated status from 0 to 2 order content id = 78', '2018-01-04 22:49:47', '2018-01-04 22:49:47'),
(374, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2018-01-04 22:54:04', '2018-01-04 22:54:04'),
(375, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 23', '2018-01-04 22:54:15', '2018-01-04 22:54:15'),
(376, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 53', '2018-01-04 22:54:35', '2018-01-04 22:54:35'),
(377, 1, 1, '122.2.43.44', 'orders', 'Paid the Order via CASH 53', '2018-01-04 22:55:02', '2018-01-04 22:55:02'),
(378, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 54', '2018-01-04 22:55:15', '2018-01-04 22:55:15'),
(379, 7, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 150', '2018-01-04 22:58:42', '2018-01-04 22:58:42'),
(380, 7, 1, '124.107.221.205', 'orders', 'Checkout of Order id 55', '2018-01-04 22:58:58', '2018-01-04 22:58:58'),
(381, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 56', '2018-01-04 23:19:10', '2018-01-04 23:19:10'),
(382, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 20', '2018-01-04 23:19:28', '2018-01-04 23:19:28'),
(383, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 57', '2018-01-04 23:19:43', '2018-01-04 23:19:43'),
(384, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 58', '2018-01-04 23:19:54', '2018-01-04 23:19:54'),
(385, 1, 1, '122.2.43.44', 'carts', 'AddedAdded to Cart product id = 24', '2018-01-04 23:20:11', '2018-01-04 23:20:11'),
(386, 1, 1, '122.2.43.44', 'orders', 'Checkout of Order id 59', '2018-01-04 23:20:27', '2018-01-04 23:20:27'),
(387, 1, 2, '122.2.43.44', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2018-01-04 23:54:13', '2018-01-04 23:54:13'),
(388, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2018-01-05 12:47:10', '2018-01-05 12:47:10'),
(389, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2018-01-05 13:57:27', '2018-01-05 13:57:27'),
(390, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2018-01-05 16:51:18', '2018-01-05 16:51:18'),
(391, 7, 1, '124.107.221.205', 'user', 'angelojugueta@gmail.com logged in.', '2018-01-05 22:23:22', '2018-01-05 22:23:22'),
(392, 7, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 151', '2018-01-05 22:23:42', '2018-01-05 22:23:42'),
(393, 7, 1, '121.96.182.168', 'orders', 'Checkout of Order id 60', '2018-01-05 22:23:57', '2018-01-05 22:23:57'),
(394, 7, 1, '124.107.221.205', 'orders', 'Paid the Order via CASH 60', '2018-01-05 22:24:06', '2018-01-05 22:24:06'),
(395, 4, 2, '121.96.182.168', 'provider', 'tcb@vmercatop.com logged in.', '2018-01-06 19:03:57', '2018-01-06 19:03:57'),
(396, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2018-01-08 17:05:04', '2018-01-08 17:05:04'),
(397, 4, 2, '122.2.43.44', 'provider', 'tcb@vmercatop.com logged in.', '2018-01-09 15:21:15', '2018-01-09 15:21:15'),
(398, 4, 2, '122.2.43.44', 'order_contents', 'updated status from 0 to 2 order content id = 83', '2018-01-09 15:25:46', '2018-01-09 15:25:46'),
(399, 4, 2, '122.2.43.44', 'order_contents', 'updated status from 0 to 2 order content id = 68', '2018-01-09 15:26:20', '2018-01-09 15:26:20'),
(400, 4, 2, '122.2.43.44', 'order_contents', 'updated status from 0 to 2 order content id = 58', '2018-01-09 15:26:32', '2018-01-09 15:26:32'),
(401, 4, 2, '122.2.43.44', 'order_contents', 'updated status from 0 to 2 order content id = 51', '2018-01-09 15:26:41', '2018-01-09 15:26:41'),
(402, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2018-01-09 23:53:45', '2018-01-09 23:53:45'),
(403, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2018-01-10 19:27:10', '2018-01-10 19:27:10'),
(404, 1, 1, '122.2.43.44', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2018-01-10 19:55:08', '2018-01-10 19:55:08'),
(405, 1, 2, '122.2.43.44', 'provider', 'carlo.flores@chefsandbutlers.net logged in.', '2018-01-10 19:56:15', '2018-01-10 19:56:15'),
(406, 4, 2, '122.2.43.44', 'provider', 'tcb@vmercatop.com logged in.', '2018-01-10 20:01:41', '2018-01-10 20:01:41'),
(407, 4, 2, '124.107.221.205', 'provider', 'tcb@vmercatop.com logged in.', '2018-01-19 17:27:26', '2018-01-19 17:27:26'),
(408, 1, 1, '121.96.182.168', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2018-01-31 21:08:25', '2018-01-31 21:08:25'),
(409, 1, 1, '121.96.182.168', 'user', 'carlo.flores@chefsandbutlers.net logged in.', '2018-01-31 21:08:58', '2018-01-31 21:08:58'),
(410, 1, 1, '124.107.221.205', 'carts', 'AddedAdded to Cart product id = 18', '2018-01-31 21:11:24', '2018-01-31 21:11:24'),
(411, 1, 1, '121.96.182.168', 'orders', 'Checkout of Order id 61', '2018-01-31 21:15:02', '2018-01-31 21:15:02');
INSERT INTO `audit_trails` (`id`, `auth_id`, `user_type`, `ip_address`, `action_to`, `action`, `created_at`, `updated_at`) VALUES
(412, 11, 1, '124.105.127.66', 'user', 'test2@gmail.com logged in.', '2018-03-06 18:26:43', '2018-03-06 18:26:43'),
(413, 12, 1, '127.0.0.1', 'user', 'test3@gmail.com logged in.', '2018-03-06 08:26:05', '2018-03-06 08:26:05'),
(414, 12, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 69', '2018-03-06 08:29:59', '2018-03-06 08:29:59'),
(415, 12, 1, '127.0.0.1', 'orders', 'Checkout of Order id 62', '2018-03-06 08:43:56', '2018-03-06 08:43:56'),
(416, 12, 1, '127.0.0.1', 'orders', 'Paid the Order via CASH 62', '2018-03-06 08:44:28', '2018-03-06 08:44:28'),
(417, 12, 1, '127.0.0.1', 'carts', 'AddedAdded to Cart product id = 73', '2018-03-06 08:49:33', '2018-03-06 08:49:33'),
(418, 12, 1, '127.0.0.1', 'orders', 'Checkout of Order id 63', '2018-03-06 08:50:02', '2018-03-06 08:50:02'),
(419, 12, 1, '127.0.0.1', 'orders', 'Checkout of Order id 64', '2018-03-06 08:50:16', '2018-03-06 08:50:16'),
(420, 12, 1, '127.0.0.1', 'orders', 'Checkout of Order id 65', '2018-03-06 08:50:31', '2018-03-06 08:50:31'),
(421, 12, 1, '127.0.0.1', 'orders', 'Checkout of Order id 66', '2018-03-06 08:50:47', '2018-03-06 08:50:47'),
(422, 13, 1, '127.0.0.1', 'user', 'test4@gmail.com logged in.', '2018-03-06 09:28:01', '2018-03-06 09:28:01'),
(423, 13, 1, '127.0.0.1', 'user', 'test4@gmail.com logged in.', '2018-03-07 01:38:52', '2018-03-07 01:38:52'),
(424, 11, 1, '127.0.0.1', 'user', 'test2@gmail.com logged in.', '2018-03-07 01:39:07', '2018-03-07 01:39:07');

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
(21, 9, 18, 1, 1143.00, 1143.00, '1', '2017-12-21', '9:00 AM', '2017-12-22 00:31:54', '2017-12-22 00:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cravings - Katipunan', '#00ff00', 0, NULL, '2017-11-24 05:17:46'),
(2, 'TCB - Katipunan', '#831700', 0, NULL, NULL),
(3, 'CCA - Katipunan', '#669900', 0, NULL, NULL),
(4, 'BNP - Ortigas', '#9933ff', 0, NULL, NULL),
(5, 'Where\'s Marcel - Ortigas', '#0066ff', 0, NULL, NULL),
(6, 'Casa Roces - Manila', '#666633', 0, NULL, NULL),
(7, 'C3 - Greenhills', '#990099', 0, NULL, NULL),
(8, 'Epicurious - Shangrila', '#009999', 0, NULL, NULL),
(9, 'C2 - Shangrila', '#000099', 0, NULL, NULL),
(10, 'The Orange Place - Kamias', '#660066', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location_limits`
--

CREATE TABLE `location_limits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_limits`
--

INSERT INTO `location_limits` (`id`, `user_id`, `location_id`, `created_at`, `updated_at`) VALUES
(0, 12, 1, '2018-03-06 08:29:25', '2018-03-06 08:29:25'),
(0, 12, 10, '2018-03-06 08:29:30', '2018-03-06 08:29:30'),
(0, 11, 10, '2018-03-07 01:37:39', '2018-03-07 01:37:39');

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
  `discount` int(11) NOT NULL,
  `service_charge` double(11,2) NOT NULL,
  `tax` double(11,2) DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `table_no` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `discount`, `service_charge`, `tax`, `firstname`, `middlename`, `lastname`, `street`, `barangay`, `city`, `state`, `contact`, `note`, `table_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4547.00, 0, 120.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 3, '2017-11-24 03:23:15', '2018-03-06 08:24:23'),
(2, 1, 4547.00, 0, 120.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2017-11-22 03:23:15', '2017-11-22 03:25:27'),
(3, 1, 4465.00, 0, 80.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2017-11-24 09:07:12', '2017-11-24 09:07:47'),
(4, 1, 1971.00, 0, 60.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2017-11-24 09:10:11', '2017-11-24 09:10:46'),
(5, 1, 3297.00, 0, 60.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2017-12-06 22:32:48', '2017-12-06 22:32:53'),
(6, 1, 2154.00, 0, 40.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 1, '2017-12-08 17:26:45', '2017-12-08 17:26:45'),
(7, 1, 3429.00, 0, 60.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2017-12-11 15:53:24', '2017-12-11 15:55:51'),
(8, 5, 200.00, 0, 20.00, 0.00, 'Angelo', NULL, 'Jugueta', 'h', 'j', 'j', 'Metro Manila', '09178112294', NULL, NULL, 2, '2017-12-11 17:44:40', '2017-12-11 17:44:50'),
(9, 5, 180.00, 0, 20.00, 0.00, 'Angelo', NULL, 'Jugueta', 'g', 'g', 'g', 'Metro Manila', '09178112294', NULL, NULL, 1, '2017-12-11 17:47:11', '2017-12-11 17:47:11'),
(10, 1, 3429.00, 0, 40.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2017-12-11 17:58:24', '2017-12-11 17:58:36'),
(11, 1, 300.00, 0, 40.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2017-12-11 18:01:01', '2017-12-11 18:01:10'),
(12, 6, 300.00, 0, 40.00, 0.00, 'Marc', NULL, 'Amaro', 'Eagle Ave', 'Putatan', 'Muntinlupa', 'Metro Manila', '09175851290', NULL, NULL, 2, '2017-12-11 18:12:01', '2017-12-11 18:20:51'),
(13, 6, 290.00, 0, 20.00, 0.00, 'Marc', NULL, 'Amaro', 'ea', 'Putatan', 'Muntinlupa', 'Metro Manila', '09175851290', NULL, NULL, 2, '2017-12-11 18:23:54', '2017-12-11 18:27:50'),
(14, 6, 1168.00, 0, 20.00, 0.00, 'Marc', NULL, 'Amaro', 'Eagle Ave', 'Putatan', 'Muntinlupa', 'Metro Manila', '09175851290', NULL, NULL, 2, '2017-12-11 18:29:39', '2017-12-11 19:31:11'),
(15, 1, 1143.00, 0, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2017-12-11 19:45:05', '2017-12-11 19:45:13'),
(16, 5, 175.00, 10, 20.00, 0.00, 'Angelo', NULL, 'Jugueta', 'Maryland', 'Pinagkaisahan', 'Quezon City', 'Metro Manila', '09178112294', NULL, NULL, 2, '2017-12-11 20:02:42', '2017-12-11 20:28:40'),
(17, 1, 1143.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 1, '2017-12-11 20:04:28', '2017-12-11 20:04:28'),
(18, 1, 0.00, 0, 0.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 1, '2017-12-11 20:04:50', '2017-12-11 20:04:50'),
(19, 6, 2154.00, 10, 40.00, 0.00, 'Marc', NULL, 'Amaro', 'B23 L29 Soldiers Hills Village', 'Putatan', 'Muntinlupa', 'Metro Manila', '09175851290', NULL, NULL, 2, '2017-12-11 20:09:25', '2017-12-11 20:17:50'),
(20, 5, 180.00, 10, 20.00, 0.00, 'Angelo', NULL, 'Jugueta', 'Maryland', 'Pinagkaisaan', 'Quezon City', 'Metro Manila', '09178112294', NULL, NULL, 2, '2017-12-11 21:13:54', '2017-12-11 21:16:38'),
(21, 1, 3297.00, 10, 60.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2017-12-12 21:03:53', '2017-12-12 21:04:16'),
(22, 1, 1143.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2017-12-12 21:05:07', '2017-12-12 21:05:34'),
(23, 1, 1011.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2017-12-13 15:08:59', '2017-12-13 15:09:08'),
(24, 1, 1168.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '3', 2, '2017-12-13 17:04:28', '2017-12-13 17:04:39'),
(25, 1, 300.00, 10, 40.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '5', 2, '2017-12-13 17:07:55', '2017-12-13 17:08:41'),
(26, 1, 1143.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '6', 2, '2017-12-13 19:22:23', '2017-12-13 19:22:45'),
(27, 1, 1168.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '5', 1, '2017-12-13 19:40:18', '2017-12-13 19:40:18'),
(28, 1, 1011.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '6', 2, '2017-12-13 19:41:07', '2017-12-13 19:41:38'),
(29, 1, 1011.00, 0, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2017-12-13 19:51:43', '2017-12-13 19:51:53'),
(30, 1, 1143.00, 0, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 1, '2017-12-13 19:52:49', '2017-12-13 19:52:49'),
(31, 1, 110.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '4', 2, '2017-12-13 20:48:46', '2017-12-13 20:48:56'),
(32, 1, 300.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '4', 2, '2017-12-13 22:29:35', '2017-12-13 22:29:52'),
(33, 1, 90.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '4', 2, '2017-12-14 17:08:44', '2017-12-14 17:09:03'),
(34, 1, 80.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '4', 2, '2017-12-14 17:55:34', '2017-12-14 17:56:25'),
(35, 1, 1143.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '2', 1, '2017-12-19 17:34:29', '2017-12-19 17:34:29'),
(36, 1, 4465.00, 10, 60.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '55', 1, '2017-12-21 23:50:59', '2017-12-21 23:50:59'),
(37, 7, 110.00, 0, 20.00, 0.00, 'Angelo', NULL, 'Jugueta', '61-D Maryland St.', 'Pinagkaisahan', 'Quezon City', 'Metro Manila', '09178112294', NULL, NULL, 1, '2017-12-21 23:54:55', '2017-12-21 23:54:55'),
(38, 9, 1371.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', NULL, NULL, NULL, 'Metro Manila', '123456788', NULL, '21', 1, '2017-12-22 00:02:32', '2017-12-22 00:02:32'),
(39, 7, 110.00, 10, 20.00, 0.00, 'Angelo', NULL, 'Jugueta', NULL, NULL, NULL, 'Metro Manila', '09178112294', NULL, '3', 1, '2017-12-22 00:05:51', '2017-12-22 00:05:51'),
(40, 8, 110.00, 10, 20.00, 0.00, 'Rico', NULL, 'Trinidad', NULL, NULL, NULL, 'Metro Manila', '09188273752', NULL, '3', 2, '2017-12-22 00:33:08', '2017-12-22 00:34:09'),
(41, 10, 150.00, 10, 20.00, 0.00, 'liza', NULL, 'gil', NULL, NULL, NULL, 'Metro Manila', '09163773664', NULL, '3', 2, '2017-12-22 20:25:18', '2017-12-22 20:25:47'),
(42, 8, 110.00, 10, 20.00, 0.00, 'Rico', NULL, 'Trinidad', NULL, NULL, NULL, 'Metro Manila', '09188273752', NULL, '3', 2, '2017-12-22 20:38:19', '2017-12-22 20:38:56'),
(43, 7, 150.00, 10, 20.00, 0.00, 'Angelo', NULL, 'Jugueta', NULL, NULL, NULL, 'Metro Manila', '09178112294', NULL, '4', 1, '2018-01-03 15:28:12', '2018-01-03 15:28:12'),
(44, 7, 0.00, 10, 0.00, 0.00, 'Angelo', NULL, 'Jugueta', NULL, NULL, NULL, 'Metro Manila', '09178112294', NULL, '4', 1, '2018-01-03 15:28:12', '2018-01-03 15:28:12'),
(45, 7, 0.00, 10, 0.00, 0.00, 'Angelo', NULL, 'Jugueta', NULL, NULL, NULL, 'Metro Manila', '09178112294', NULL, '4', 1, '2018-01-03 15:30:25', '2018-01-03 15:30:25'),
(46, 7, 150.00, 10, 20.00, 0.00, 'Angelo', NULL, 'Jugueta', NULL, NULL, NULL, 'Metro Manila', '09178112294', NULL, '3', 2, '2018-01-03 21:37:45', '2018-01-03 21:38:14'),
(47, 1, 5715.00, 0, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2018-01-04 14:17:47', '2018-01-04 14:17:53'),
(48, 1, 1168.00, 0, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 2, '2018-01-04 16:23:23', '2018-01-04 16:26:55'),
(49, 1, 1143.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '2', 2, '2018-01-04 17:46:06', '2018-01-04 17:46:21'),
(50, 1, 2630.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '3', 3, '2018-01-04 18:08:39', '2018-01-04 18:08:49'),
(51, 1, 1011.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '3', 3, '2018-01-04 18:10:36', '2018-01-04 18:10:52'),
(52, 7, 130.00, 10, 20.00, 0.00, 'Angelo', NULL, 'Jugueta', NULL, NULL, NULL, 'Metro Manila', '09178112294', NULL, '9', 3, '2018-01-04 22:47:29', '2018-01-04 22:47:35'),
(53, 1, 1315.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '4', 3, '2018-01-04 22:54:35', '2018-01-04 22:55:01'),
(54, 1, 0.00, 10, 0.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '4', 1, '2018-01-04 22:55:15', '2018-01-04 22:55:15'),
(55, 7, 120.00, 10, 20.00, 0.00, 'Angelo', NULL, 'Jugueta', NULL, NULL, NULL, 'Metro Manila', '09178112294', NULL, '3', 1, '2018-01-04 22:58:58', '2018-01-04 22:58:58'),
(56, 1, 0.00, 10, 0.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '4', 1, '2018-01-04 23:19:10', '2018-01-04 23:19:10'),
(57, 1, 1168.00, 10, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '3', 1, '2018-01-04 23:19:43', '2018-01-04 23:19:43'),
(58, 1, 0.00, 0, 0.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, '3', 1, '2018-01-04 23:19:54', '2018-01-04 23:19:54'),
(59, 1, 1102.00, 0, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 1, '2018-01-04 23:20:27', '2018-01-04 23:20:27'),
(60, 7, 100.00, 10, 20.00, 0.00, 'Angelo', NULL, 'Jugueta', NULL, NULL, NULL, 'Metro Manila', '09178112294', NULL, '3', 3, '2018-01-05 22:23:57', '2018-01-05 22:24:06'),
(61, 1, 1143.00, 0, 20.00, 0.00, 'John', NULL, 'Doe', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '09164794935', NULL, NULL, 1, '2018-01-31 21:15:02', '2018-01-31 21:15:02'),
(62, 12, 175.00, 0, 20.00, 0.00, 'Metrobank', NULL, 'Kamias', 'K-H St, Kamias Rd', 'Diliman', 'Quezon City', 'Metro Manila', '123456789', NULL, NULL, 3, '2018-03-06 08:43:56', '2018-03-06 08:44:07'),
(63, 12, 180.00, 10, 20.00, 0.00, 'Metrobank', NULL, 'Kamias', 'K-H St, Kamias Rd', 'Diliman', 'Quezon City', 'Metro Manila', '123456789', NULL, '2', 1, '2018-03-06 08:50:02', '2018-03-06 08:50:02'),
(64, 12, 0.00, 0, 0.00, 0.00, 'Metrobank', NULL, 'Kamias', 'K-H St, Kamias Rd', 'Diliman', 'Quezon City', 'Metro Manila', '123456789', NULL, '2', 1, '2018-03-06 08:50:16', '2018-03-06 08:50:16'),
(65, 12, 0.00, 0, 0.00, 0.00, 'Metrobank', NULL, 'Kamias', 'K-H St, Kamias Rd', 'Diliman', 'Quezon City', 'Metro Manila', '123456789', NULL, NULL, 1, '2018-03-06 08:50:31', '2018-03-06 08:50:31'),
(66, 12, 0.00, 10, 0.00, 0.00, 'Metrobank', NULL, 'Kamias', 'K-H St, Kamias Rd', 'Diliman', 'Quezon City', 'Metro Manila', '123456789', NULL, '2', 1, '2018-03-06 08:50:47', '2018-03-06 08:50:47');

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
(1, 1, 18, 1, 1, 1143.00, 1143.00, '1', '2017-11-23', '9:00 AM', NULL, 0, 3, '2017-11-24 03:23:15', '2017-11-24 04:15:48'),
(2, 1, 19, 1, 1, 1011.00, 1011.00, '2', '2017-11-23', '9:00 AM', NULL, 0, 3, '2017-11-24 03:23:15', '2017-11-24 04:16:05'),
(3, 1, 79, 1, 1, 395.00, 395.00, '3', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-24 03:23:15', '2017-11-24 04:16:13'),
(4, 1, 27, 1, 1, 838.00, 838.00, '4', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-24 03:23:15', '2017-11-24 04:16:54'),
(5, 1, 77, 1, 2, 410.00, 820.00, '5', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-24 03:23:15', '2017-11-24 03:23:15'),
(6, 1, 82, 1, 1, 340.00, 340.00, '6', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-24 03:23:15', '2017-11-24 03:23:15'),
(7, 2, 18, 1, 1, 1143.00, 1143.00, '7', '2017-11-23', '9:00 AM', NULL, 0, 3, '2017-11-22 03:23:15', '2017-11-22 04:15:48'),
(8, 2, 19, 1, 1, 1011.00, 1011.00, '8', '2017-11-23', '9:00 AM', NULL, 0, 3, '2017-11-22 03:23:15', '2017-11-22 03:23:15'),
(9, 2, 79, 1, 1, 395.00, 395.00, '10', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-22 03:23:15', '2017-11-22 03:23:15'),
(10, 2, 27, 1, 1, 838.00, 838.00, '9', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-22 03:23:15', '2017-11-22 03:23:15'),
(11, 2, 77, 1, 2, 410.00, 820.00, '1', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-22 03:23:15', '2017-11-22 03:23:15'),
(12, 2, 82, 1, 1, 340.00, 340.00, '1', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-22 03:23:15', '2017-11-22 03:23:15'),
(13, 3, 18, 1, 1, 1143.00, 1143.00, '1', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-24 09:07:12', '2017-11-24 09:07:12'),
(14, 3, 19, 1, 1, 1011.00, 1011.00, '1', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-24 09:07:12', '2017-11-24 09:07:12'),
(15, 3, 20, 1, 1, 1168.00, 1168.00, '1', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-24 09:07:12', '2017-11-24 09:07:12'),
(16, 3, 17, 1, 1, 1143.00, 1143.00, '1', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-24 09:07:12', '2017-11-24 09:07:12'),
(17, 4, 19, 1, 1, 1011.00, 1011.00, '1', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-24 09:10:12', '2017-11-24 09:10:12'),
(18, 4, 98, 1, 1, 540.00, 540.00, '1', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-24 09:10:12', '2017-11-24 09:10:12'),
(19, 4, 97, 1, 1, 420.00, 420.00, '1', '2017-11-24', '9:00 AM', NULL, 0, 3, '2017-11-24 09:10:12', '2017-11-24 09:10:12'),
(20, 5, 19, 1, 1, 1011.00, 1011.00, '1', '2017-12-06', '9:00 AM', NULL, 0, 0, '2017-12-06 22:32:48', '2017-12-06 22:32:48'),
(21, 5, 18, 1, 1, 1143.00, 1143.00, '1', '2017-12-06', '9:00 AM', NULL, 0, 0, '2017-12-06 22:32:48', '2017-12-06 22:32:48'),
(22, 5, 17, 1, 1, 1143.00, 1143.00, '1', '2017-12-06', '9:00 AM', NULL, 0, 0, '2017-12-06 22:32:48', '2017-12-06 22:32:48'),
(23, 6, 17, 1, 1, 1143.00, 1143.00, '1', '2017-12-08', '9:00 AM', NULL, 0, 4, '2017-12-08 17:26:46', '2017-12-11 18:01:39'),
(24, 6, 19, 1, 1, 1011.00, 1011.00, '1', '2017-12-08', '9:00 AM', NULL, 0, 4, '2017-12-08 17:26:46', '2017-12-11 18:01:39'),
(25, 7, 17, 1, 1, 1143.00, 1143.00, '1', '2017-12-08', '9:00 AM', NULL, 0, 0, '2017-12-11 15:53:24', '2017-12-11 15:53:24'),
(26, 7, 18, 1, 1, 1143.00, 1143.00, '1', '2017-12-08', '9:00 AM', NULL, 0, 0, '2017-12-11 15:53:24', '2017-12-11 15:53:24'),
(27, 7, 18, 1, 1, 1143.00, 1143.00, '1', '2017-12-11', '9:00 AM', NULL, 0, 0, '2017-12-11 15:53:25', '2017-12-11 15:53:25'),
(28, 8, 66, 11, 1, 200.00, 200.00, '10', '2017-12-11', '9:00 AM', NULL, 0, 0, '2017-12-11 17:44:40', '2017-12-11 17:44:40'),
(29, 9, 72, 11, 1, 180.00, 180.00, '10', '2017-12-11', '9:00 AM', NULL, 0, 4, '2017-12-11 17:47:11', '2017-12-22 20:41:51'),
(30, 10, 17, 1, 1, 1143.00, 1143.00, '1', '2017-12-11', '9:00 AM', NULL, 0, 0, '2017-12-11 17:58:24', '2017-12-11 17:58:24'),
(31, 10, 18, 1, 2, 1143.00, 2286.00, '1', '2017-12-11', '9:00 AM', NULL, 0, 0, '2017-12-11 17:58:25', '2017-12-11 17:58:25'),
(32, 11, 137, 4, 1, 150.00, 150.00, '2', '2017-12-11', '9:00 AM', NULL, 0, 1, '2017-12-11 18:01:01', '2017-12-13 15:48:52'),
(33, 11, 136, 4, 1, 150.00, 150.00, '2', '2017-12-11', '9:00 AM', NULL, 0, 4, '2017-12-11 18:01:01', '2017-12-13 15:48:10'),
(34, 12, 137, 4, 1, 150.00, 150.00, '2', '2017-12-11', '9:00 AM', NULL, 0, 5, '2017-12-11 18:12:01', '2017-12-13 19:48:35'),
(35, 12, 138, 4, 1, 150.00, 150.00, '2', '2017-12-11', '9:00 AM', NULL, 0, 1, '2017-12-11 18:12:01', '2017-12-13 19:11:49'),
(36, 13, 45, 1, 1, 290.00, 290.00, '1', '2017-12-11', '9:00 AM', NULL, 0, 0, '2017-12-11 18:23:54', '2017-12-11 18:23:54'),
(37, 14, 20, 1, 1, 1168.00, 1168.00, '1', '2017-12-11', '9:00 AM', NULL, 0, 0, '2017-12-11 18:29:39', '2017-12-11 18:29:39'),
(38, 15, 17, 1, 1, 1143.00, 1143.00, '1', '2017-12-11', '9:00 AM', NULL, 0, 0, '2017-12-11 19:45:05', '2017-12-11 19:45:05'),
(39, 16, 69, 11, 1, 175.00, 175.00, '10', '2017-12-11', '9:00 AM', NULL, 0, 0, '2017-12-11 20:02:42', '2017-12-11 20:02:42'),
(40, 17, 18, 1, 1, 1143.00, 1143.00, '1', '2017-12-11', '9:00 AM', NULL, 0, 4, '2017-12-11 20:04:28', '2017-12-11 20:05:05'),
(41, 19, 18, 1, 1, 1143.00, 1143.00, '1', '2017-12-11', '9:00 AM', NULL, 0, 0, '2017-12-11 20:09:26', '2017-12-11 20:09:26'),
(42, 19, 19, 1, 1, 1011.00, 1011.00, '1', '2017-12-11', '9:00 AM', NULL, 0, 0, '2017-12-11 20:09:26', '2017-12-11 20:09:26'),
(43, 20, 72, 11, 1, 180.00, 180.00, '10', '2017-12-11', '9:00 AM', NULL, 0, 0, '2017-12-11 21:13:54', '2017-12-11 21:13:54'),
(44, 21, 19, 1, 1, 1011.00, 1011.00, '1', '2017-12-11', '9:00 AM', NULL, 0, 4, '2017-12-12 21:03:53', '2017-12-12 21:04:06'),
(45, 21, 17, 1, 1, 1143.00, 1143.00, '1', '2017-12-12', '9:00 AM', NULL, 0, 4, '2017-12-12 21:03:53', '2017-12-12 21:04:06'),
(46, 21, 18, 1, 1, 1143.00, 1143.00, '1', '2017-12-12', '9:00 AM', NULL, 0, 4, '2017-12-12 21:03:53', '2017-12-12 21:04:06'),
(47, 22, 18, 1, 1, 1143.00, 1143.00, '1', '2017-12-12', '9:00 AM', NULL, 0, 4, '2017-12-12 21:05:07', '2017-12-12 21:05:28'),
(48, 23, 19, 1, 1, 1011.00, 1011.00, '1', '2017-12-12', '9:00 AM', NULL, 0, 4, '2017-12-13 15:09:00', '2017-12-13 19:21:24'),
(49, 24, 20, 1, 1, 1168.00, 1168.00, '1', '2018-06-13', '9:00 AM', NULL, 0, 2, '2017-12-13 17:04:28', '2017-12-13 17:04:54'),
(50, 25, 139, 4, 1, 150.00, 150.00, '2', '2017-12-13', '9:00 AM', NULL, 0, 4, '2017-12-13 17:07:55', '2017-12-13 20:00:12'),
(51, 25, 138, 4, 1, 150.00, 150.00, '2', '2017-12-13', '9:00 AM', NULL, 0, 4, '2017-12-13 17:07:56', '2018-01-09 15:26:43'),
(52, 26, 18, 1, 1, 1143.00, 1143.00, '1', '2017-12-13', '9:00 AM', NULL, 0, 4, '2017-12-13 19:22:23', '2017-12-13 19:22:24'),
(53, 27, 20, 1, 1, 1168.00, 1168.00, '1', '2017-12-13', '9:00 AM', NULL, 0, 4, '2017-12-13 19:40:18', '2017-12-13 19:40:18'),
(54, 28, 19, 1, 1, 1011.00, 1011.00, '1', '2017-12-14', '9:00 AM', NULL, 0, 5, '2017-12-13 19:41:07', '2017-12-13 19:48:34'),
(55, 29, 19, 1, 1, 1011.00, 1011.00, '1', '2017-12-13', '9:00 AM', NULL, 0, 0, '2017-12-13 19:51:43', '2017-12-13 19:51:43'),
(56, 30, 18, 1, 1, 1143.00, 1143.00, '1', '2017-12-14', '9:00 AM', NULL, 0, 4, '2017-12-13 19:52:49', '2017-12-21 20:16:27'),
(57, 31, 143, 4, 1, 110.00, 110.00, '2', '2017-12-13', '9:00 AM', NULL, 0, 4, '2017-12-13 20:48:46', '2017-12-13 20:48:47'),
(58, 32, 136, 4, 2, 150.00, 300.00, '2', '2017-12-13', '06:00 PM', NULL, 0, 4, '2017-12-13 22:29:35', '2018-01-09 15:26:33'),
(59, 33, 141, 4, 1, 90.00, 90.00, '2', '2017-12-14', '02:00 PM', NULL, 0, 4, '2017-12-14 17:08:44', '2017-12-21 20:16:27'),
(60, 34, 140, 4, 1, 80.00, 80.00, '2', '2017-12-14', '12:00 NN', NULL, 0, 4, '2017-12-14 17:55:34', '2017-12-14 17:55:36'),
(61, 35, 18, 1, 1, 1143.00, 1143.00, '1', '2017-09-18', '9:00 AM', NULL, 0, 4, '2017-12-19 17:34:30', '2017-12-21 20:16:27'),
(62, 36, 20, 1, 1, 1168.00, 1168.00, '1', '2017-12-21', '9:00 AM', NULL, 0, 4, '2017-12-21 23:50:59', '2017-12-22 20:30:49'),
(63, 36, 19, 1, 1, 1011.00, 1011.00, '1', '2017-12-21', '9:00 AM', NULL, 0, 4, '2017-12-21 23:51:00', '2017-12-22 20:30:49'),
(64, 36, 18, 1, 2, 1143.00, 2286.00, '1', '2017-12-21', '9:00 AM', NULL, 0, 4, '2017-12-21 23:51:00', '2017-12-22 20:30:49'),
(65, 37, 142, 4, 1, 110.00, 110.00, '2', '2017-12-21', '06:00 PM', NULL, 0, 4, '2017-12-21 23:54:55', '2017-12-21 23:54:56'),
(66, 38, 21, 1, 1, 1371.00, 1371.00, '1', '2017-12-21', '9:00 AM', NULL, 0, 4, '2017-12-22 00:02:32', '2017-12-22 20:30:49'),
(67, 39, 142, 4, 1, 110.00, 110.00, '2', '2017-12-21', '9:00 AM', NULL, 0, 4, '2017-12-22 00:05:51', '2017-12-22 00:05:52'),
(68, 40, 142, 4, 1, 110.00, 110.00, '2', '2017-12-21', '06:00 PM', NULL, 0, 4, '2017-12-22 00:33:08', '2018-01-09 15:26:20'),
(69, 41, 136, 4, 1, 150.00, 150.00, '2', '2017-12-22', '9:00 AM', NULL, 0, 4, '2017-12-22 20:25:19', '2017-12-22 20:45:14'),
(70, 42, 143, 4, 1, 110.00, 110.00, '2', '2017-12-22', '06:00 PM', NULL, 0, 4, '2017-12-22 20:38:19', '2017-12-27 19:47:11'),
(71, 43, 155, 4, 1, 150.00, 150.00, '2', '2018-01-03', '11:00 AM', NULL, 0, 4, '2018-01-03 15:28:12', '2018-01-03 16:01:40'),
(72, 46, 154, 4, 1, 150.00, 150.00, '2', '2018-01-03', '9:00 AM', NULL, 0, 4, '2018-01-03 21:37:45', '2018-01-03 21:37:54'),
(73, 47, 18, 1, 5, 1143.00, 5715.00, '1', '2017-12-21', '9:00 AM', NULL, 0, 0, '2018-01-04 14:17:47', '2018-01-04 14:17:47'),
(74, 48, 20, 1, 1, 1168.00, 1168.00, '1', '2018-01-04', '9:00 AM', NULL, 0, 0, '2018-01-04 16:23:23', '2018-01-04 16:23:23'),
(75, 49, 18, 1, 1, 1143.00, 1143.00, '1', '2018-01-04', '9:00 AM', NULL, 0, 0, '2018-01-04 17:46:06', '2018-01-04 17:46:06'),
(76, 50, 23, 1, 2, 1315.00, 2630.00, '1', '2018-01-04', '9:00 AM', NULL, 0, 4, '2018-01-04 18:08:39', '2018-01-04 18:08:43'),
(77, 51, 19, 1, 1, 1011.00, 1011.00, '1', '2018-01-04', '02:00 PM', NULL, 0, 4, '2018-01-04 18:10:36', '2018-01-10 19:56:19'),
(78, 52, 156, 4, 1, 130.00, 130.00, '2', '2017-12-28', '12:00 NN', NULL, 0, 4, '2018-01-04 22:47:29', '2018-01-04 22:49:48'),
(79, 53, 23, 1, 1, 1315.00, 1315.00, '1', '2018-01-04', '9:00 AM', NULL, 0, 0, '2018-01-04 22:54:35', '2018-01-04 22:54:35'),
(80, 55, 150, 4, 1, 120.00, 120.00, '2', '2018-01-04', '06:00 PM', NULL, 0, 4, '2018-01-04 22:58:58', '2018-01-04 23:00:02'),
(81, 57, 20, 1, 1, 1168.00, 1168.00, '1', '2018-01-04', '9:00 AM', NULL, 0, 4, '2018-01-04 23:19:43', '2018-01-10 19:56:19'),
(82, 59, 24, 1, 1, 1102.00, 1102.00, '1', '2018-01-04', '9:00 AM', NULL, 0, 4, '2018-01-04 23:20:27', '2018-01-10 19:56:19'),
(83, 60, 151, 4, 1, 100.00, 100.00, '2', '0000-00-00', '06:00 PM', NULL, 0, 4, '2018-01-05 22:23:57', '2018-01-09 15:25:48'),
(84, 61, 18, 1, 1, 1143.00, 1143.00, '1', '2018-02-01', '9:00 AM', NULL, 0, 4, '2018-01-31 21:15:02', '2018-02-12 03:16:06'),
(85, 62, 69, 11, 1, 175.00, 175.00, '10', '2018-03-07', '9:00 AM', NULL, 0, 0, '2018-03-06 08:43:56', '2018-03-06 08:43:56'),
(86, 63, 73, 11, 1, 180.00, 180.00, '10', '2018-03-07', '9:00 AM', NULL, 0, 0, '2018-03-06 08:50:02', '2018-03-06 08:50:02');

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
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_transactions`
--

INSERT INTO `order_transactions` (`id`, `order_id`, `payment_id`, `payer_id`, `method`, `first_name`, `middle_name`, `last_name`, `employee_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'PAY-48B47032WK0738324LILZBLA', '94UGR4QEXUY56', 'paypal', NULL, NULL, NULL, NULL, 'approved', '2017-11-24 03:25:27', '2017-11-24 03:25:27'),
(2, 3, 'PAY-52244359PT3763021LIL6CRQ', '8QQ49KHSSD96L', 'paypal', NULL, NULL, NULL, NULL, 'approved', '2017-11-24 09:07:47', '2017-11-24 09:07:47'),
(3, 4, 'PAY-9TB74221SW598971VLIL6D7A', '8QQ49KHSSD96L', 'paypal', NULL, NULL, NULL, NULL, 'approved', '2017-11-24 09:10:46', '2017-11-24 09:10:46'),
(4, 5, 'e4da3b7fbbce2345d7772b0674a318d5', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 123, 'approved', '2017-12-06 22:32:53', '2017-12-06 22:32:53'),
(5, 5, 'e4da3b7fbbce2345d7772b0674a318d5', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 123, 'approved', '2017-12-06 23:13:15', '2017-12-06 23:13:15'),
(6, 5, 'e4da3b7fbbce2345d7772b0674a318d5', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 123, 'approved', '2017-12-06 23:15:45', '2017-12-06 23:15:45'),
(7, 5, 'e4da3b7fbbce2345d7772b0674a318d5', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 123, 'approved', '2017-12-06 23:19:46', '2017-12-06 23:19:46'),
(8, 5, 'e4da3b7fbbce2345d7772b0674a318d5', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 123, 'approved', '2017-12-06 23:20:26', '2017-12-06 23:20:26'),
(9, 5, 'e4da3b7fbbce2345d7772b0674a318d5', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 123, 'approved', '2017-12-06 23:23:55', '2017-12-06 23:23:55'),
(10, 7, '8f14e45fceea167a5a36dedd4bea2543', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 412, 'approved', '2017-12-11 15:55:51', '2017-12-11 15:55:51'),
(11, 8, 'c9f0f895fb98ab9159f51fd0297e236d', 'e4da3b7fbbce2345d7772b0674a318d5', 'tcg', 'Angelo', NULL, 'Jugueta', 5555, 'approved', '2017-12-11 17:44:50', '2017-12-11 17:44:50'),
(12, 10, 'd3d9446802a44259755d38e6d163e820', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 123, 'approved', '2017-12-11 17:58:36', '2017-12-11 17:58:36'),
(13, 11, '6512bd43d9caa6e02c990b0a82652dca', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 123, 'approved', '2017-12-11 18:01:10', '2017-12-11 18:01:10'),
(14, 12, 'c20ad4d76fe97759aa27a0c99bff6710', '1679091c5a880faf6fb5e6087eb1b2dc', 'tcg', 'Marc', NULL, 'Amaro', 2706, 'approved', '2017-12-11 18:20:51', '2017-12-11 18:20:51'),
(15, 13, 'PAY-89J348285S827651SLIXBM5Y', '94UGR4QEXUY56', 'paypal', NULL, NULL, NULL, NULL, 'approved', '2017-12-11 18:27:50', '2017-12-11 18:27:50'),
(16, 14, 'PAY-4EJ21154E9769783VLIXBPZI', '94UGR4QEXUY56', 'paypal', NULL, NULL, NULL, NULL, 'approved', '2017-12-11 19:31:10', '2017-12-11 19:31:10'),
(17, 15, '9bf31c7ff062936a96d3c8bd1f8f2ff3', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 123, 'approved', '2017-12-11 19:45:13', '2017-12-11 19:45:13'),
(18, 19, '1f0e3dad99908345f7439f8ffabdffc4', '1679091c5a880faf6fb5e6087eb1b2dc', 'tcg', 'Marc', NULL, 'Amaro', 2706, 'approved', '2017-12-11 20:17:50', '2017-12-11 20:17:50'),
(19, 16, 'PAY-4RG47984M65197807LIXDEUA', '94UGR4QEXUY56', 'paypal', NULL, NULL, NULL, NULL, 'approved', '2017-12-11 20:28:40', '2017-12-11 20:28:40'),
(20, 20, 'PAY-3H59710451846252DLIXD4SY', '94UGR4QEXUY56', 'paypal', NULL, NULL, NULL, NULL, 'approved', '2017-12-11 21:16:38', '2017-12-11 21:16:38'),
(21, 21, '3c59dc048e8850243be8079a5c74d079', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 123, 'approved', '2017-12-12 21:04:16', '2017-12-12 21:04:16'),
(22, 22, 'b6d767d2f8ed5d21a44b0e5886680cb9', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 123, 'approved', '2017-12-12 21:05:34', '2017-12-12 21:05:34'),
(23, 23, '37693cfc748049e45d87b8c7d8b9aacd', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 1, 'approved', '2017-12-13 15:09:08', '2017-12-13 15:09:08'),
(24, 24, '1ff1de774005f8da13f42943881c655f', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 123, 'approved', '2017-12-13 17:04:39', '2017-12-13 17:04:39'),
(25, 25, 'PAY-0VB67355BN8897429LIYKPJI', '94UGR4QEXUY56', 'paypal', NULL, NULL, NULL, NULL, 'approved', '2017-12-13 17:08:41', '2017-12-13 17:08:41'),
(26, 26, '4e732ced3463d06de0ca9a15b6153677', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 1, 'approved', '2017-12-13 19:22:45', '2017-12-13 19:22:45'),
(27, 28, '33e75ff09dd601bbe69f351039152189', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 123, 'approved', '2017-12-13 19:41:38', '2017-12-13 19:41:38'),
(28, 29, '6ea9ab1baa0efb9e19094440c317e21b', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 12, 'approved', '2017-12-13 19:51:53', '2017-12-13 19:51:53'),
(29, 31, 'c16a5320fa475530d9583c34fd356ef5', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 4444, 'approved', '2017-12-13 20:48:56', '2017-12-13 20:48:56'),
(30, 32, '6364d3f0f495b6ab9dcf8d3b5c6e0b01', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 8888, 'approved', '2017-12-13 22:29:52', '2017-12-13 22:29:52'),
(31, 33, '182be0c5cdcd5072bb1864cdee4d3d6e', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 8888, 'approved', '2017-12-14 17:09:03', '2017-12-14 17:09:03'),
(32, 34, 'e369853df766fa44e1ed0ff613f563bd', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 1234, 'approved', '2017-12-14 17:56:25', '2017-12-14 17:56:25'),
(33, 40, 'd645920e395fedad7bbbed0eca3fe2e0', 'c9f0f895fb98ab9159f51fd0297e236d', 'tcg', 'Rico', NULL, 'Trinidad', 2687, 'approved', '2017-12-22 00:34:08', '2017-12-22 00:34:08'),
(34, 41, '3416a75f4cea9109507cacd8e2f2aefc', 'd3d9446802a44259755d38e6d163e820', 'tcg', 'Liza', NULL, 'Gil', 155, 'approved', '2017-12-22 20:25:47', '2017-12-22 20:25:47'),
(35, 42, 'a1d0c6e83f027327d8461063f4ac58a6', 'c9f0f895fb98ab9159f51fd0297e236d', 'tcg', 'Rico', NULL, 'Trinidad', 4543, 'approved', '2017-12-22 20:38:56', '2017-12-22 20:38:56'),
(36, 46, 'd9d4f495e875a2e075a1a4a6e1b9770f', '8f14e45fceea167a5a36dedd4bea2543', 'tcg', 'Angelo', NULL, 'Jugueta', 3, 'approved', '2018-01-03 21:38:14', '2018-01-03 21:38:14'),
(37, 47, '67c6a1e7ce56d3d6fa748ab6d9af3fd7', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 21, 'approved', '2018-01-04 14:17:53', '2018-01-04 14:17:53'),
(38, 48, '642e92efb79421734881b53e1e1b18b6', 'c4ca4238a0b923820dcc509a6f75849b', 'tcg', 'John', NULL, 'Doe', 23, 'approved', '2018-01-04 16:26:55', '2018-01-04 16:26:55'),
(39, 49, 'f457c545a9ded88f18ecee47145a72c0', 'c4ca4238a0b923820dcc509a6f75849b', 'cash', 'John', NULL, 'Doe', NULL, 'approved', '2018-01-04 17:46:21', '2018-01-04 17:46:21'),
(40, 50, 'c0c7c76d30bd3dcaefc96f40275bdc0a', 'c4ca4238a0b923820dcc509a6f75849b', 'cash', 'John', NULL, 'Doe', NULL, 'approved', '2018-01-04 18:08:49', '2018-01-04 18:08:49'),
(41, 51, '2838023a778dfaecdc212708f721b788', 'c4ca4238a0b923820dcc509a6f75849b', 'cash', 'John', NULL, 'Doe', NULL, 'approved', '2018-01-04 18:10:52', '2018-01-04 18:10:52'),
(42, 52, '9a1158154dfa42caddbd0694a4e9bdc8', '8f14e45fceea167a5a36dedd4bea2543', 'cash', 'Angelo', NULL, 'Jugueta', NULL, 'approved', '2018-01-04 22:47:35', '2018-01-04 22:47:35'),
(43, 53, 'd82c8d1619ad8176d665453cfb2e55f0', 'c4ca4238a0b923820dcc509a6f75849b', 'cash', 'John', NULL, 'Doe', NULL, 'approved', '2018-01-04 22:55:01', '2018-01-04 22:55:01'),
(44, 60, '072b030ba126b2f4b2374f342be9ed44', '8f14e45fceea167a5a36dedd4bea2543', 'cash', 'Angelo', NULL, 'Jugueta', NULL, 'approved', '2018-01-05 22:24:05', '2018-01-05 22:24:05'),
(45, 1, 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', 'cash', 'Metrobank', NULL, 'Kamias', NULL, 'approved', '2018-03-06 08:24:22', '2018-03-06 08:24:22'),
(46, 62, '44f683a84163b3523afe57c2e008bc8c', 'c20ad4d76fe97759aa27a0c99bff6710', 'cash', 'Metrobank', NULL, 'Kamias', NULL, 'approved', '2018-03-06 08:44:07', '2018-03-06 08:44:07');

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
(45, '45.jpg', 1, 8, 'Chorizo Fettucine', 290.00, 0, NULL, 'Chorizo Fettucine', '0000-00-00', '0000-00-00', 1, '0', 1, NULL, NULL),
(47, '47.jpg', 2, 8, 'All Meat Platter', 1090.00, 10, NULL, 'All Meat Platter from C2', '2017-10-09', '2018-01-31', 1, '0', 1, NULL, NULL),
(48, '48.jpg', 1, 13, 'Classic Meatballs Spaghetti', 320.00, 10, NULL, 'Classic Meatballs Spaghetti', '2017-10-09', '2017-10-31', 1, '0', 1, NULL, NULL),
(51, '51.jpg', 1, 13, 'Creamy Baked Macaroni', 290.00, 10, NULL, 'Creamy Baked Macaroni', '2017-10-10', '2017-10-31', 1, '0', 1, NULL, NULL),
(52, '52.jpg', 1, 13, 'Fettucine Stroganoff', 390.00, 10, NULL, 'Fettucine Stroganoff', '2017-10-09', '2017-10-31', 1, '0', 1, NULL, NULL),
(53, '53.jpg', 2, 10, 'Bagoong Rice', 135.00, 10, NULL, 'Bagoong Rice from C2', '2017-10-09', '2017-10-31', 1, '0', 1, NULL, NULL),
(54, '54.jpg', 1, 4, 'French Onion Soup Gratinee', 150.00, 10, NULL, 'French Onion Soup Gratinee', '2017-10-09', '2017-10-31', 1, '0', 1, NULL, NULL),
(55, '55.jpg', 1, 13, 'Four Cheese Lasagna', 340.00, 10, NULL, 'Four Cheese Lasagna', '2017-10-09', '2017-10-31', 1, '0', 1, NULL, NULL),
(56, '56.jpg', 1, 8, 'House Premium Burger', 350.00, 10, NULL, 'House Premium Burger', '2017-10-09', '2017-10-31', 1, '0', 1, NULL, NULL),
(57, '57.jpg', 2, 6, 'Bibingka Souffle', 175.00, 12, NULL, 'Bibingka Souffle from C2', '2017-10-09', '2018-02-28', 1, '0', 1, NULL, NULL),
(58, '58.jpg', 2, 8, 'Binagoongan Lechon Kawali', 415.00, 15, NULL, 'Binagoongan Lechon Kawali from C2', '2017-10-30', '2017-12-31', 1, '0', 1, NULL, NULL),
(59, '59.jpg', 2, 5, 'Buko Pandan', 155.00, 25, NULL, 'Buko Pandan from C2', '2017-10-09', '2018-04-30', 1, '0', 1, NULL, NULL),
(60, '60.jpg', 2, 9, 'Bulalo', 495.00, 50, NULL, 'Bulalo from C2', '2017-10-09', '2017-10-31', 1, '0', 1, NULL, NULL),
(61, '61.jpg', 2, 12, 'Chicharong Munggo with Galunggong', 280.00, 280, NULL, 'Chicharong Munggo with Galunggong from C2', '2017-10-09', '2017-12-31', 1, '0', 1, NULL, NULL),
(62, '62.jpg', 2, 8, 'Crispy Kare Kare', 780.00, 780, NULL, 'Crispy Kare Kare from C2', '2017-10-09', '2018-07-31', 1, '0', 1, NULL, NULL),
(63, '63.jpg', 2, 10, 'Dagat Platter', 1090.00, 1090, NULL, 'Dagat Platter from C2', '2017-10-09', '2018-01-31', 1, '0', 1, NULL, NULL),
(64, '64.jpg', 2, 10, 'Gising Gising', 285.00, 285, NULL, 'Gising Gising by C2', '2017-10-10', '2018-01-30', 1, '0', 1, NULL, NULL),
(65, '65.jpg', 1, 8, 'Binagoongan', 150.00, 10, NULL, 'Pork Binagoongan', '2017-11-01', '2017-11-30', 1, '0', 0, NULL, NULL),
(66, '66.jpg', 11, 8, 'Arroz Ala Cubana', 200.00, 10, NULL, 'Pork Dish', '2017-11-08', '2017-11-30', 1, '0', 1, NULL, NULL),
(67, '67.jpg', 11, 6, 'Chocolate Caramel Brownies', 99.00, 10, NULL, 'Chocolate Caramel Brownies', '2017-11-01', '2017-11-30', 1, '0', 0, NULL, NULL),
(68, '68.jpg', 11, 10, 'Garlic Bangus', 185.00, 10, NULL, 'Fish Dish', '2017-11-09', '2017-12-01', 1, '0', 1, NULL, NULL),
(69, '69.jpg', 11, 9, 'Beef Tapa', 175.00, 10, NULL, 'Beef Dish', '2017-11-08', '2017-11-30', 1, '0', 1, NULL, NULL),
(70, '70.jpg', 11, 7, 'Chicken Inasal', 180.00, 10, NULL, 'Grilled Chicken', '2017-11-08', '2017-11-30', 1, '0', 1, NULL, NULL),
(71, '71.jpg', 11, 7, 'Chicken Teriyaki', 185.00, 10, NULL, 'Chicken Dish with Teriyaki Sauce', '2017-11-08', '2017-11-30', 1, '0', 1, NULL, NULL),
(72, '72.jpg', 11, 9, 'Corned Beef', 180.00, 10, NULL, 'House made corned beef', '2017-11-08', '2017-11-30', 1, '0', 1, NULL, NULL),
(73, '73.jpg', 11, 8, 'Menudo', 180.00, 10, NULL, 'Pork in tomato sauce dish', '2017-11-08', '2017-11-30', 1, '0', 1, NULL, NULL),
(74, '74.jpg', 11, 13, 'Bolognese', 175.00, 10, NULL, 'Pasta Dish', '2017-11-08', '2017-11-30', 1, '0', 1, NULL, NULL),
(75, '75.jpg', 11, 10, 'Tuna Sandwich', 95.00, 10, NULL, 'Tuna Sandwich Dish', '2017-11-08', '2017-11-30', 1, '0', 1, NULL, NULL),
(76, '76.jpg', 1, 10, 'Almond Crusted Fish Fillet', 420.00, 10, NULL, 'Almond Crusted Fish Fillet by Cravings Katipunan', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(77, '77.jpg', 1, 8, 'American Baked Ribs', 410.00, 10, NULL, 'American Baked Ribs by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(78, '78.jpg', 1, 10, 'Baked Fish Provencial', 400.00, 10, NULL, 'Baked Fish Provencial by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(79, '79.jpg', 1, 9, 'Beef Fajitas', 395.00, 10, NULL, 'Beef Fajitas by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(80, '80.jpg', 1, 8, 'Bistro Pork Steak', 360.00, 10, NULL, 'Bistro Pork Steak by Cravings', '2017-11-10', '2017-11-30', 1, '1', 1, NULL, NULL),
(81, '81.jpg', 1, 7, 'Chicken A La Pobre', 360.00, 10, NULL, 'Chicken A La Pobre by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(82, '82.jpg', 1, 13, 'Chicken and Pesto Penne', 340.00, 10, NULL, 'Chicken and Pesto Penne by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(83, '83.jpg', 1, 7, 'Chicken Cordon Bleu', 455.00, 10, NULL, 'Chicken Cordon Bleu by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(84, '84.jpg', 1, 7, 'Chicken Galantine', 385.00, 10, NULL, 'Chicken Galantine by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(85, '85.jpg', 1, 13, 'Chorizo Fettucine', 290.00, 10, NULL, 'Chorizo Fettucine by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(86, '86.jpg', 1, 13, 'Classic Meatballs Spaghetti', 320.00, 10, NULL, 'Classic Meatballs Spaghetti by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(87, '87.jpg', 1, 6, 'Cravings Club House', 350.00, 10, NULL, 'Cravings Club House by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(88, '88.jpg', 1, 10, 'Cravings Seafood Basket', 275.00, 10, NULL, 'Cravings Seafood Basket by Cravings', '2017-10-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(89, '89.jpg', 1, 13, 'Creamy Baked Macaroni', 290.00, 10, NULL, 'Creamy Baked Macaroni by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(90, '90.jpg', 3, 7, '3 Way Chick', 195.00, 10, NULL, '3 Way Chick by B&P', '2017-11-10', '2017-11-30', 1, '0', 0, NULL, NULL),
(91, '91.jpg', 1, 13, 'Fettucine Stroganoff', 390.00, 10, NULL, 'Fettucine Stroganoff by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(92, '92.jpg', 3, 7, 'A Game Fish Bun', 250.00, 10, NULL, 'A Game Fish Bun by B&P', '2017-11-10', '2017-11-30', 1, '0', 0, NULL, NULL),
(93, '93.jpg', 1, 13, 'Four Cheese Lasagna', 340.00, 10, NULL, 'Four Cheese Lasagna by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(94, '94.jpg', 1, 4, 'French Onion Soup Gratinee', 150.00, 10, NULL, 'French Onion Soup Gratinee', '2017-11-10', '2017-10-30', 1, '0', 1, NULL, NULL),
(95, '95.jpg', 3, 7, '3 Way Chick', 195.00, 10, NULL, '3 Way Chick by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(96, '96.jpg', 1, 9, 'House Premium Burger', 350.00, 10, NULL, 'House Premium Burger by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(97, '97.jpg', 1, 2, 'K-Pop Chicken', 420.00, 10, NULL, 'K-Pop Chicken by Cravings', '2017-09-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(98, '98.jpg', 1, 2, 'Lengua Con Champignon', 540.00, 10, NULL, 'Lengua Con Champignon by Cravings', '2017-09-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(99, '99.jpg', 3, 10, 'A Game Fish', 250.00, 10, NULL, 'A Game Fish by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(100, '100.jpg', 1, 6, 'Monte Cristo', 290.00, 10, NULL, 'Monte Cristo by Cravings', '2017-09-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(101, '101.jpg', 1, 2, 'Old School Beef Pot Roast', 450.00, 10, NULL, 'Old School Beef Pot Roast by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(102, '102.jpg', 3, 9, 'Bibimbowl', 225.00, 10, NULL, 'Bibimbowl by B&P ', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(103, '103.jpg', 1, 10, 'One Surf and Turf', 575.00, 10, NULL, 'One Surf and Turf by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(104, '104.jpg', 3, 10, 'Bistek Bangus Belly', 250.00, 10, NULL, 'Bistek Bangus Belly by B&P', '2017-11-10', '2017-10-30', 1, '0', 1, NULL, NULL),
(105, '105.jpg', 1, 2, 'Paella Filipina', 420.00, 10, NULL, 'Paella Filipina by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(106, '106.jpg', 3, 2, 'Burito Omelette', 260.00, 10, NULL, 'Burito Omelette by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(107, '107.jpg', 3, 13, 'Carbonara', 265.00, 10, NULL, 'Carbonara by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(108, '108.jpg', 1, 4, 'Pancit Molo', 165.00, 10, NULL, 'Pancit Molo by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(109, '109.jpg', 1, 6, 'Pot Roast Gravy Sandwich', 385.00, 10, NULL, 'Pot Roast Gravy Sandwich by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(110, '110.jpg', 3, 7, 'Chicken Parmigana', 280.00, 10, NULL, 'Chicken Parmigana by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(111, '111.jpg', 3, 7, 'Chicken Toast', 295.00, 10, NULL, 'Chicken Toast by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(112, '112.jpg', 1, 13, 'Spicy Shrimp Gamberetti', 360.00, 10, NULL, 'Spicy Shrimp Gamberetti by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(113, '113.jpg', 1, 2, 'Spring Rolls with Vermicelli', 160.00, 10, NULL, 'Spring Rolls with Vermicelli by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(114, '114.jpg', 3, 4, 'Chowder Soup', 145.00, 10, NULL, 'Chowder Soup by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(115, '115.jpg', 1, 2, 'Sunday Best Roast Chicken', 360.00, 10, NULL, 'Sunday Best Roast Chicken by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(116, '116.jpg', 3, 8, 'Don Malutong', 285.00, 10, NULL, 'Don Malutong by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(117, '117.jpg', 3, 2, 'Eggs in Purgatory', 195.00, 10, NULL, 'Eggs in Purgatory by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(118, '118.jpg', 1, 2, 'Tenderloin Tips', 480.00, 10, NULL, 'Tenderloin Tips by Cravings', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(119, '119.jpg', 3, 2, 'Go Hawaiian', 185.00, 10, NULL, 'Go Hawaiian by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(120, '120.jpg', 3, 1, 'Ice Cream Cookie Sandwich', 140.00, 10, NULL, 'Ice Cream Cookie Sandwich by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(121, '121.jpg', 3, 13, 'Killer Mac & Cheese', 195.00, 10, NULL, 'Killer Mac & Cheese by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(122, '122.jpg', 3, 7, 'Kimchicken', 295.00, 10, NULL, 'Kimchicken by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(123, '123.jpg', 3, 9, 'Mang Benedicts', 295.00, 10, NULL, 'Mang Benedicts by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(124, '124.jpg', 3, 13, 'Meatball Spaghetti', 195.00, 10, NULL, 'Meatball Spaghetti by B&P ', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(125, '125.jpg', 3, 8, 'Meatloaf Surprise', 285.00, 10, NULL, 'Meatloaf Surprise by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(126, '126.jpg', 3, 13, 'Pesto Chix', 295.00, 10, NULL, 'Pesto Chix by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(127, '127.jpg', 3, 9, 'Primera Tapa', 295.00, 10, NULL, 'Primera Tapa by B&P', '2017-11-10', '2017-10-30', 1, '0', 1, NULL, NULL),
(128, '128.jpg', 3, 4, 'Red Molo Soup', 175.00, 10, NULL, 'Red Molo Soup by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(129, '129.jpg', 3, 2, 'So Young Chow', 220.00, 10, NULL, 'So Young Chow by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(130, '130.jpg', 3, 8, 'Spam Aloha ', 285.00, 10, NULL, 'Spam Aloha by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(131, '131.jpg', 3, 8, 'Spam Aloha Kids', 285.00, 10, NULL, 'Spam Aloha Kids by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(132, '132.jpg', 3, 8, 'Spam Rice', 165.00, 10, NULL, 'Spam Rice by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(133, '133.jpg', 3, 8, 'Spam Super B', 245.00, 10, NULL, 'Spam Super B by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(134, '134.jpg', 3, 1, 'Toffee Pudding', 175.00, 10, NULL, 'Toffee Pudding by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(135, '135.jpg', 3, 4, 'Tomato Soup with Grilled Cheese', 225.00, 10, NULL, 'Tomato Soup with Grilled Cheese by B&P', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(136, '136.jpg', 4, 15, 'Blueberry Milkshake', 150.00, 10, NULL, 'Blueberry Milkshake by TCB', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(137, '137.jpg', 4, 15, 'Strawberry Milkshake', 150.00, 10, NULL, 'Strawberry Milkshake by TCB', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(138, '138.jpg', 4, 15, 'Mango Cheesecake Milkshake', 150.00, 10, NULL, 'Mango Cheesecake Milkshake by TCB', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(139, '139.jpg', 4, 15, 'Chocolate Caramel Milkshake', 150.00, 10, NULL, 'Chocolate Caramel Milkshake by TCB', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(140, '140.jpg', 4, 15, 'Espresso', 80.00, 10, NULL, 'Espresso by TCB', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(141, '141.jpg', 4, 15, 'Macchiato', 90.00, 10, NULL, 'Macchiato by TCB', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(142, '142.jpg', 4, 15, 'Cafe Latte', 110.00, 10, NULL, 'Cafe Latte by TCB', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(143, '143.jpg', 4, 15, 'Capuccino', 110.00, 10, NULL, 'Capuccino by TCB', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(144, '144.jpg', 5, 15, 'Espresso', 90.00, 10, NULL, 'Espresso by Where\'s Marcel?', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(145, '145.jpg', 5, 15, 'Macchiato', 110.00, 10, NULL, 'Macchiato by Where\'s Marcel?', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(146, '146.jpg', 5, 15, 'Piccolo', 120.00, 10, NULL, 'Piccolo by Where\'s Marcel?', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(147, '147.jpg', 5, 15, 'Long Black', 120.00, 10, NULL, 'Long Black by Where\'s Marcel?', '2017-11-10', '2017-10-30', 1, '0', 1, NULL, NULL),
(148, '148.jpg', 5, 15, 'Cafe Latte', 150.00, 10, NULL, 'Cafe Latte by Where\'s Marcel?', '2017-11-10', '2017-11-30', 1, '0', 1, NULL, NULL),
(150, '1514348392.jpg', 4, 16, 'Hot Choco', 120.00, 1000, NULL, 'Hot Choco by The Coffee Beanery', '2017-12-22', '2050-12-15', 1, '1', 1, '2017-12-22 21:43:14', '2017-12-27 17:19:52'),
(151, '1514348413.jpg', 4, 16, 'Iced Tea', 100.00, 1000, NULL, 'Iced Tea by The Coffee Beanery', '2017-12-27', NULL, 1, '1', 1, '2017-12-27 14:55:12', '2017-12-27 17:20:13'),
(152, '1514348517.jpg', 4, 15, 'Mocha', 150.00, 1000, NULL, 'Mocha by The Coffee Beanery', '2018-02-27', NULL, 1, '1', 1, '2017-12-27 15:02:23', '2017-12-27 17:21:57'),
(153, '1514343372.jpg', 1, 3, 'asdasd', 1123.00, 123, NULL, 'asd', '2018-01-27', '2018-03-01', 1, '1', 0, '2017-12-27 15:30:07', '2017-12-27 15:56:12'),
(154, '1514429135.jpg', 4, 15, 'Iced Spicy Mocha', 150.00, 100, NULL, 'Iced Spicy Mocha', NULL, NULL, 1, '1', 1, '2017-12-28 15:45:35', '2017-12-28 15:45:35'),
(155, '1514429350.jpg', 4, 15, 'Chocnut Coffee', 150.00, 1000, NULL, 'Chocnut Coffee by The Coffee beanery', NULL, NULL, 1, '1', 1, '2017-12-28 15:49:10', '2017-12-28 15:49:10'),
(156, '1515036611.jpg', 4, 15, 'Curly Tops Coffee', 130.00, 100, NULL, 'Curly Tops Coffee by The coffee Beanery', NULL, NULL, 1, '1', 1, '2018-01-04 16:30:11', '2018-01-04 16:30:11'),
(157, '1515037154.jpg', 4, 15, 'Americano', 100.00, 100, NULL, 'American by The Coffee Beanery', NULL, NULL, 1, '1', 1, '2018-01-04 16:35:49', '2018-01-04 16:39:14');

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
(15, NULL, 'Coffee', 14, 1, NULL, NULL),
(16, NULL, 'Refreshments', 14, 1, NULL, NULL);

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
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `providers` (`id`, `picture`, `username`, `firstname`, `middlename`, `lastname`, `email`, `password`, `bio`, `contact`, `street`, `barangay`, `city`, `state`, `postal_code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '5790383.jpg', 'cravings', 'Chef', '', 'Cravings', 'carlo.flores@chefsandbutlers.net', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '', '09164794935', '134 Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '1610', 1, 'dPiwsEu7TQifSmH1S2EXn9397pG4PhtHfKOu0GCvQeOwQUz499VFEhgqOyww', NULL, NULL),
(2, '5342212.jpg', 'c2', 'Chef', NULL, 'C2', 'marcial.amaro@chefsandbutlers.net', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '', '09164794935', '', '', '', '', '', 1, '', NULL, NULL),
(3, '5342212.jpg', 'bnp', 'Chef', NULL, 'BNP', 'bnp@vmercatop.com', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '', '09164794935', '', '', '', '', '', 1, '', NULL, NULL),
(4, '5342212.jpg', 'tcb', 'Chef', NULL, 'TCB', 'tcb@vmercatop.com', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '', '09178112294', '', '', '', '', '', 1, 'ERE6UI1RBUhlNgd66z8QWNPIRkvmJGlDUWnXVIvSV3ENKrQRcASkJ8yo53cH', NULL, NULL),
(5, '5342212.jpg', 'wheresmarcel', 'Chef', NULL, 'Marcel', 'wheresmarcel@vmercatop.com', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '', '09164794935', '', '', '', '', '', 1, '', NULL, NULL),
(11, '5342212.jpg', 'top', 'Chef', NULL, 'Orange', 'top@vmercatop.com', '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG', '', '09164794935', '', '', '', '', '', 1, '', NULL, NULL),
(12, '', 'MarcialAmaro', 'Marcial', NULL, 'Amaro', 'marcial.amaro@cravings.com', '$2y$10$rEN6OCw4uBI9/o1kYbcy9OjhCwHCInkPOHDFU3po6e3vRr/oTQ.iO', '', '09175851290', '', '', '', '', '', 1, NULL, '2017-12-06 23:31:33', '2017-12-06 23:31:33');

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
  `is_establishment` int(8) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `picture`, `firstname`, `middlename`, `lastname`, `email`, `password`, `contact`, `street`, `barangay`, `city`, `state`, `postal_code`, `is_establishment`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1511753018.jpg', 'John', NULL, 'Doe', 'carlo.flores@chefsandbutlers.net', '$2y$10$kJql5lpJCGlO1netOU7uu.gyn/Ly5Hdf2mcMKEQ4qWcklvB9/8VOG', '09164794935', 'Road 5 M De Leon', 'Santolan', 'Pasig City', 'Metro Manila', '1610', NULL, 1, '32ytrPBERpaFfvSSujn2lVVqn2RBDbuDqoM8T6ySc7W85o1xVc2GqNc24rP2', NULL, '2017-11-27 03:23:38'),
(2, '', 'alskflhasflkh', NULL, 'lkhkllkh', 'asfasfasfasf@asfasfasf.com', '$2y$10$eg3R2fOXFYeb0PvqyXBP3eaAvYWjfqbeoQZe2k9jFL3FRuk/boZYi', '098901823', '', '', '', '', '', NULL, 1, NULL, '2017-11-20 02:58:55', '2017-11-20 02:58:55'),
(3, '', 'asf', NULL, 'asfasfasf', 'asfasf@asasdasd.com', '$2y$10$iqi2BnDN6U783C/nYm4V..SKTLyNDIImYmwnlRJgKcVNZy46mCan2', '123123', '', '', '', '', '', NULL, 1, NULL, '2017-11-20 04:52:46', '2017-11-20 04:52:46'),
(4, '', 'Carlo', NULL, 'Flores', 'test@test.com', '$2y$10$dgtLfKgNuAogSahdHuPvAOkCtNhDMK1qEgnhysP1Xa8lZJJzxwK/S', '123123123', '', '', '', '', '', 0, 1, NULL, '2017-11-20 04:54:52', '2018-03-06 18:20:07'),
(5, '', 'Angelo', NULL, 'Jugueta', 'ajugueta.cravingsgroup@gmail.com', '$2y$10$l2WJrddKfSsFVawyr7bWVOkV60xcCai9noYgQN2BYyroVuOI8yhwC', '09178112294', '', '', '', '', '', NULL, 1, 'xEEkpqyYzubCkYvkdm7id2XjcTSAHlPxAx2qZL8Ps4qAwkUqA9TyxmMnf5pS', '2017-12-11 16:46:51', '2017-12-11 16:46:51'),
(6, '', 'Marc', NULL, 'Amaro', 'marcial.amaro6@gmail.com', '$2y$10$0BSzOvYkGy26qTqbgjiX1uiQX2675nDXkQbhmhQGByYtgxmSuA3YW', '09175851290', '', '', '', '', '', NULL, 1, 'sm1IoFYBWnEDIUPwH3HIVDfC5rdX54xd6cPOJwWK2otFSUVuUOpj0btyfjtn', '2017-12-11 18:07:17', '2017-12-11 18:07:17'),
(7, '', 'Angelo', NULL, 'Jugueta', 'angelojugueta@gmail.com', '$2y$10$ipyiTI8tGKktuiMThbmh7e1Qj2WTCordxt78EIjFD0BKP6oF2L.Xu', '09178112294', '', '', '', '', '', NULL, 1, NULL, '2017-12-21 23:40:02', '2017-12-21 23:40:02'),
(8, '', 'Rico', NULL, 'Trinidad', 'ricotrinidad@yahoo.com', '$2y$10$w8WyDryQ6u0bpuhnaAgpmu672lZ5/gV7Ax1lehnGYnI3KpZ.h6hiK', '09188273752', '', '', '', '', '', NULL, 1, NULL, '2017-12-21 23:43:10', '2017-12-21 23:43:10'),
(9, '', 'John', NULL, 'Doe', 'asdasd@asdasd.com', '$2y$10$u/LRGI84CLf2YZ0bvRcFiekf.CS2QyYbKKOik5PvAHEkQDnnObKj2', '123456788', '', '', '', '', '', NULL, 1, NULL, '2017-12-22 00:00:39', '2017-12-22 00:00:39'),
(10, '', 'liza', NULL, 'gil', 'malizagil@yahoo.com', '$2y$10$k1irZ7JdDx7UqQURLffjLuASgFxghj5ZX1uWOdHBSjqUmxylPEfyK', '09163773664', '', '', '', '', '', NULL, 1, NULL, '2017-12-22 20:23:16', '2017-12-22 20:23:16'),
(11, '', 'Sherwin', NULL, 'Lorico', 'test2@gmail.com', '$2y$10$8co9iQVx0LsiNti3B0.97ugBlIgbgliJqE0IV5IY9.mHVEpFgxZYu', '123123', '', '', '', '', '', 1, 1, NULL, '2018-03-06 18:26:29', '2018-03-07 01:37:31'),
(12, '1520328297.jpg', 'Metrobank', NULL, 'Kamias', 'test3@gmail.com', '$2y$10$JnWmRNyz.h/BaGnZg..9X.V96CBmoGKFyoCvWzni5391vqROavLl2', '123456789', 'K-H St, Kamias Rd', 'Diliman', 'Quezon City', 'Metro Manila', '1101', 1, 1, 'i3CvV3uDlPDza4tuHsanpE4iS0lKqDCEAdb5fLYXOvuWRInWPCRQHT2hq2xf', '2018-03-06 08:25:50', '2018-03-07 01:30:54'),
(13, '1520328573.jpg', 'Jose', NULL, 'Rizal', 'test4@gmail.com', '$2y$10$a4ttsBAVNxhsgGITtVmLoOF/gMqSMCfzOub0MdvKqls7HGC1E/6Ie', '09123456789', 'asda', 'asd', 'asda', 'asda', '123', NULL, 1, 'GFMuryTF1looqDrIaILRLPCxtyTEIFSFsJ4f5GI30KB4Pv8zL27oX2iBgmZD', '2018-03-06 09:27:40', '2018-03-06 09:29:33');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `order_ratings`
--
ALTER TABLE `order_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_transactions`
--
ALTER TABLE `order_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
