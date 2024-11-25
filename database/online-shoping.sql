-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 30, 2024 at 04:35 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-shoping`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'default', 'UserMehedi Hasancreated [ Cars Collection ]Category', 'App\\Models\\Category', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-07 07:51:12', '2024-10-07 07:51:12'),
(2, 'default', 'UserMehedi Hasancreated [ Diamond ]Category', 'App\\Models\\Category', NULL, 2, 'App\\Models\\User', 3, '[]', NULL, '2024-10-07 07:54:17', '2024-10-07 07:54:17'),
(3, 'default', 'UserMehedi Hasancreated [ cap ]Category', 'App\\Models\\Category', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-07 07:56:33', '2024-10-07 07:56:33'),
(4, 'default', 'UserMehedi Hasancreated [ Fridge ]Category', 'App\\Models\\Category', NULL, 4, 'App\\Models\\User', 3, '[]', NULL, '2024-10-07 07:58:03', '2024-10-07 07:58:03'),
(5, 'default', 'UserMehedi Hasancreated [ Watch ]Category', 'App\\Models\\Category', NULL, 5, 'App\\Models\\User', 3, '[]', NULL, '2024-10-07 07:59:35', '2024-10-07 07:59:35'),
(6, 'default', 'User Mehedi Hasan has updated 5 no category from - Watch to Digital Watch', 'App\\Models\\Category', NULL, 5, 'App\\Models\\User', 3, '[]', NULL, '2024-10-07 08:24:17', '2024-10-07 08:24:17'),
(7, 'default', 'User Mehedi Hasan has updated 4 no category from - Fridge to MInister Fridge', 'App\\Models\\Category', NULL, 4, 'App\\Models\\User', 3, '[]', NULL, '2024-10-07 08:24:32', '2024-10-07 08:24:32'),
(8, 'default', 'User Mehedi Hasan has deleted 2 nocategory name[Diamond]', 'App\\Models\\Category', NULL, 2, 'App\\Models\\User', 3, '[]', NULL, '2024-10-07 08:31:33', '2024-10-07 08:31:33'),
(9, 'default', 'User Mehedi Hasan has deleted 3 nocategory name[cap]', 'App\\Models\\Category', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-07 08:32:01', '2024-10-07 08:32:01'),
(10, 'default', 'User Mehedi Hasan has deleted 4 nocategory name[MInister Fridge]', 'App\\Models\\Category', NULL, 4, 'App\\Models\\User', 3, '[]', NULL, '2024-10-07 08:35:32', '2024-10-07 08:35:32'),
(11, 'default', 'UserMehedi Hasanhas been created [Apple] sub category', 'App\\Models\\SubCategory', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-07 23:52:36', '2024-10-07 23:52:36'),
(12, 'default', 'User Mehedi Hasan has updated 1 no category from - Apple to Apple Watch', 'App\\Models\\SubCategory', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 00:03:02', '2024-10-08 00:03:02'),
(13, 'default', 'User Mehedi Hasan has updated 1 no category from - Apple Watch to Apple Watch', 'App\\Models\\SubCategory', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 00:03:14', '2024-10-08 00:03:14'),
(14, 'default', 'User Mehedi Hasan has deleted 1 nocategory name[Apple Watch]', 'App\\Models\\SubCategory', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 00:08:44', '2024-10-08 00:08:44'),
(15, 'default', 'UserMehedi Hasanhas been created [Apple Watch] sub category', 'App\\Models\\SubCategory', NULL, 2, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 00:09:01', '2024-10-08 00:09:01'),
(16, 'default', 'User Mehedi Hasan created  [ Women Cloths ] Category', 'App\\Models\\Slide', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 00:43:15', '2024-10-08 00:43:15'),
(17, 'default', 'User Mehedi Hasan created  [ Women Cloths ] Category', 'App\\Models\\Slide', NULL, 2, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 00:43:32', '2024-10-08 00:43:32'),
(18, 'default', 'User Mehedi Hasan created  [ Women Cloths ] Category', 'App\\Models\\Slide', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 00:43:37', '2024-10-08 00:43:37'),
(19, 'default', 'User Mehedi Hasan created  [ Women Cloths ] Category', 'App\\Models\\Slide', NULL, 4, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 00:43:47', '2024-10-08 00:43:47'),
(20, 'default', 'User Mehedi Hasan created  [ Bikes ] Category', 'App\\Models\\Slide', NULL, 5, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 00:44:12', '2024-10-08 00:44:12'),
(21, 'default', 'User Mehedi Hasan has updated 4 no category from - Women Cloths to Women Cloths', 'App\\Models\\Slide', NULL, 4, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 00:54:03', '2024-10-08 00:54:03'),
(22, 'default', 'User Mehedi Hasan has deleted 1 nocategory name[Women Cloths]', 'App\\Models\\Slide', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 00:57:51', '2024-10-08 00:57:51'),
(23, 'default', 'User Mehedi Hasan has deleted 2 nocategory name[Women Cloths]', 'App\\Models\\Slide', NULL, 2, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 00:57:55', '2024-10-08 00:57:55'),
(24, 'default', 'User Mehedi Hasan has deleted 3 nocategory name[Women Cloths]', 'App\\Models\\Slide', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 00:57:58', '2024-10-08 00:57:58'),
(25, 'default', 'User Mehedi Hasan created  [ Cars ] Category', 'App\\Models\\Slide', NULL, 6, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 06:18:00', '2024-10-08 06:18:00'),
(26, 'default', 'User Mehedi Hasan created  [ Diamond ] Advertisement', 'App\\Models\\Advertisement', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 07:47:44', '2024-10-08 07:47:44'),
(27, 'default', 'User Mehedi Hasan has updated 1 no category from - Diamond to Diamond here', 'App\\Models\\Advertisement', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 08:00:37', '2024-10-08 08:00:37'),
(28, 'default', 'User Mehedi Hasan has updated 1 no category from - Diamond here to Diamond section', 'App\\Models\\Advertisement', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 08:00:50', '2024-10-08 08:00:50'),
(29, 'default', 'User Mehedi Hasan has updated 1 no category from - Diamond section to Diamond section', 'App\\Models\\Advertisement', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 08:01:12', '2024-10-08 08:01:12'),
(30, 'default', 'User Mehedi Hasan has updated 1 no advertisement from - Diamond section to Diamond', 'App\\Models\\Advertisement', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 08:02:49', '2024-10-08 08:02:49'),
(31, 'default', 'User Mehedi Hasan created  [ Drone ] Advertisement', 'App\\Models\\Advertisement', NULL, 2, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 08:07:30', '2024-10-08 08:07:30'),
(32, 'default', 'User Mehedi Hasan created  [ Speaker ] Advertisement', 'App\\Models\\Advertisement', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 08:07:54', '2024-10-08 08:07:54'),
(33, 'default', 'User Mehedi Hasan has deleted 3 noadvertisement name[Speaker]', 'App\\Models\\Advertisement', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 08:09:40', '2024-10-08 08:09:40'),
(34, 'default', 'User Mehedi Hasan created  [ dd ] Advertisement', 'App\\Models\\Advertisement', NULL, 4, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 08:12:10', '2024-10-08 08:12:10'),
(35, 'default', 'User Mehedi Hasan has updated 4 no  advertisement from - dd to dddd', 'App\\Models\\Advertisement', NULL, 4, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 08:12:17', '2024-10-08 08:12:17'),
(36, 'default', 'User Mehedi Hasan has deleted 4 no advertisement name[dddd]', 'App\\Models\\Advertisement', NULL, 4, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 08:12:21', '2024-10-08 08:12:21'),
(37, 'default', 'User Mehedi Hasan created  [ dd ] Advertisement', 'App\\Models\\Advertisement', NULL, 5, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 09:03:31', '2024-10-08 09:03:31'),
(38, 'default', 'User Mehedi Hasan has deleted 2 no advertisement name[Drone]', 'App\\Models\\Advertisement', NULL, 2, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 09:04:01', '2024-10-08 09:04:01'),
(39, 'default', 'User Mehedi Hasan has deleted 5 no advertisement name[dd]', 'App\\Models\\Advertisement', NULL, 5, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 09:04:04', '2024-10-08 09:04:04'),
(40, 'default', 'User Mehedi Hasan created  [ dd ] Advertisement', 'App\\Models\\Advertisement', NULL, 6, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 09:08:12', '2024-10-08 09:08:12'),
(41, 'default', 'User Mehedi Hasan created  [ gg ] Advertisement', 'App\\Models\\Advertisement', NULL, 7, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 09:08:22', '2024-10-08 09:08:22'),
(42, 'default', 'User Mehedi Hasan has deleted 6 no advertisement name[dd]', 'App\\Models\\Advertisement', NULL, 6, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 09:10:43', '2024-10-08 09:10:43'),
(43, 'default', 'User Mehedi Hasan has deleted 1 no advertisement name[Diamond]', 'App\\Models\\Advertisement', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 09:10:56', '2024-10-08 09:10:56'),
(44, 'default', 'User Mehedi Hasan has deleted 7 no advertisement name[gg]', 'App\\Models\\Advertisement', NULL, 7, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 09:11:04', '2024-10-08 09:11:04'),
(45, 'default', 'User Mehedi Hasan created  [ Diamond section ] Advertisement', 'App\\Models\\Advertisement', NULL, 8, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 09:11:21', '2024-10-08 09:11:21'),
(46, 'default', 'User Mehedi Hasan created  [ Iphone 15 pro max ] Advertisement', 'App\\Models\\Advertisement', NULL, 9, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 09:11:43', '2024-10-08 09:11:43'),
(47, 'default', 'User Mehedi Hasan created  [ Smart Watch ] Advertisement', 'App\\Models\\Advertisement', NULL, 10, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 09:14:50', '2024-10-08 09:14:50'),
(48, 'default', 'User Mehedi Hasan has deleted 9 no advertisement name[Iphone 15 pro max]', 'App\\Models\\Advertisement', NULL, 9, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 09:15:04', '2024-10-08 09:15:04'),
(49, 'default', 'User Mehedi Hasan created  [ Digital Watch ] Category', 'App\\Models\\Product', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 23:41:41', '2024-10-08 23:41:41'),
(50, 'default', 'User Mehedi Hasan created  [ Digital Watch ] Category', 'App\\Models\\Product', NULL, 2, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 23:46:04', '2024-10-08 23:46:04'),
(51, 'default', 'User Mehedi Hasan created  [ dd ] Category', 'App\\Models\\Product', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 23:53:31', '2024-10-08 23:53:31'),
(52, 'default', 'User Mehedi Hasan created  [ dd ] Category', 'App\\Models\\Product', NULL, 4, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 23:54:29', '2024-10-08 23:54:29'),
(53, 'default', 'User Mehedi Hasan created  [ dd ] Category', 'App\\Models\\Product', NULL, 5, 'App\\Models\\User', 3, '[]', NULL, '2024-10-08 23:58:34', '2024-10-08 23:58:34'),
(54, 'default', 'User Mehedi Hasan created  [ q ] Category', 'App\\Models\\Product', NULL, 6, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:02:40', '2024-10-09 00:02:40'),
(55, 'default', 'User Mehedi Hasan created  [ s ] Category', 'App\\Models\\Product', NULL, 7, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:05:50', '2024-10-09 00:05:50'),
(56, 'default', 'User Mehedi Hasan created  [ dd ] Category', 'App\\Models\\Product', NULL, 8, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:10:46', '2024-10-09 00:10:46'),
(57, 'default', 'User Mehedi Hasan created  [ dd ] Category', 'App\\Models\\Product', NULL, 9, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:11:37', '2024-10-09 00:11:37'),
(58, 'default', 'User Mehedi Hasan created  [ dd ] Category', 'App\\Models\\Product', NULL, 10, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:12:34', '2024-10-09 00:12:34'),
(59, 'default', 'User Mehedi Hasan created  [ dd ] Category', 'App\\Models\\Product', NULL, 11, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:16:06', '2024-10-09 00:16:06'),
(60, 'default', 'User Mehedi Hasan created  [ a ] Category', 'App\\Models\\Product', NULL, 12, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:16:47', '2024-10-09 00:16:47'),
(61, 'default', 'User Mehedi Hasan created  [ MEhedi ] Category', 'App\\Models\\Product', NULL, 13, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:18:54', '2024-10-09 00:18:54'),
(62, 'default', 'User Mehedi Hasan created  [ dd ] Category', 'App\\Models\\Product', NULL, 14, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:24:06', '2024-10-09 00:24:06'),
(63, 'default', 'User Mehedi Hasan created  [ Digital Watch ] Category', 'App\\Models\\Product', NULL, 15, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:26:16', '2024-10-09 00:26:16'),
(64, 'default', 'User Mehedi Hasan has been edited[ Digital Watch b ] Product', 'App\\Models\\Product', NULL, 15, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:45:18', '2024-10-09 00:45:18'),
(65, 'default', 'User Mehedi Hasan created  [ d ] Product', 'App\\Models\\Product', NULL, 16, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:50:49', '2024-10-09 00:50:49'),
(66, 'default', 'User Mehedi Hasan has deleted 16 no product name[d]', 'App\\Models\\Product', NULL, 16, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:52:18', '2024-10-09 00:52:18'),
(67, 'default', 'User Mehedi Hasan created  [ ss ] Product', 'App\\Models\\Product', NULL, 17, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:52:47', '2024-10-09 00:52:47'),
(68, 'default', 'User Mehedi Hasan has deleted 17 no product name[ss]', 'App\\Models\\Product', NULL, 17, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:52:55', '2024-10-09 00:52:55'),
(69, 'default', 'User Mehedi Hasan has been edited[ Digital Watch ] Product', 'App\\Models\\Product', NULL, 15, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:55:34', '2024-10-09 00:55:34'),
(70, 'default', 'User Mehedi Hasan has deleted 1 no category name[Cars Collection]', 'App\\Models\\Category', NULL, 1, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 00:58:12', '2024-10-09 00:58:12'),
(71, 'default', 'User Mehedi Hasan has deleted 5 nocategory name[Bikes]', 'App\\Models\\Slide', NULL, 5, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 02:53:16', '2024-10-09 02:53:16'),
(72, 'default', 'User Mehedi Hasan has deleted 6 nocategory name[Cars]', 'App\\Models\\Slide', NULL, 6, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 02:53:19', '2024-10-09 02:53:19'),
(73, 'default', 'User Mehedi Hasan has deleted 4 nocategory name[Women Cloths]', 'App\\Models\\Slide', NULL, 4, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 02:53:21', '2024-10-09 02:53:21'),
(74, 'default', 'User Mehedi Hasan created  [ Bikes ] Category', 'App\\Models\\Slide', NULL, 7, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 02:54:46', '2024-10-09 02:54:46'),
(75, 'default', 'User Mehedi Hasan created  [ Rolls Royels ] Category', 'App\\Models\\Slide', NULL, 8, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 02:55:43', '2024-10-09 02:55:43'),
(76, 'default', 'User Mehedi Hasan created  [ Digital Watch ] Category', 'App\\Models\\Slide', NULL, 9, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 02:56:10', '2024-10-09 02:56:10'),
(77, 'default', 'User Mehedi Hasan created  [ Smart Watch ] Product', 'App\\Models\\Product', NULL, 16, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 03:51:06', '2024-10-09 03:51:06'),
(78, 'default', 'User Mehedi Hasan created  [ Digital Watch ] Product', 'App\\Models\\Product', NULL, 19, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 04:00:10', '2024-10-09 04:00:10'),
(79, 'default', 'User Mehedi Hasan created  [ Smart Watch ] Product', 'App\\Models\\Product', NULL, 20, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 04:01:06', '2024-10-09 04:01:06'),
(80, 'default', 'User Mehedi Hasan has deleted 19 no product name[Digital Watch]', 'App\\Models\\Product', NULL, 19, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 04:02:09', '2024-10-09 04:02:09'),
(81, 'default', 'User Mehedi Hasan has deleted 18 no product name[Digital Watch]', 'App\\Models\\Product', NULL, 18, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 04:02:12', '2024-10-09 04:02:12'),
(82, 'default', 'User Mehedi Hasan has deleted 17 no product name[Digital Watch]', 'App\\Models\\Product', NULL, 17, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 04:02:14', '2024-10-09 04:02:14'),
(83, 'default', 'User Mehedi Hasan has deleted 20 no product name[Smart Watch]', 'App\\Models\\Product', NULL, 20, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 04:02:17', '2024-10-09 04:02:17'),
(84, 'default', 'User Mehedi Hasan has been edited[ Smart Watch ] Product', 'App\\Models\\Product', NULL, 16, 'App\\Models\\User', 3, '[]', NULL, '2024-10-09 04:02:23', '2024-10-09 04:02:23'),
(85, 'default', 'User Mehedi Hasan changed his own password', 'App\\Models\\User', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-10 12:38:21', '2024-10-10 12:38:21'),
(86, 'default', 'User Mehedi Hasan changed his own password', 'App\\Models\\User', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-10 12:38:42', '2024-10-10 12:38:42'),
(87, 'default', 'User Mehedi Hasan changed his own password', 'App\\Models\\User', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-10 12:40:23', '2024-10-10 12:40:23'),
(88, 'default', 'User Mehedi Hasan changed his own password', 'App\\Models\\User', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-10 12:41:01', '2024-10-10 12:41:01'),
(89, 'default', 'User Mehedi Hasan has updated 7 no category from - Bikes to Bikes', 'App\\Models\\Slide', NULL, 7, 'App\\Models\\User', 3, '[]', NULL, '2024-10-10 12:42:16', '2024-10-10 12:42:16'),
(90, 'default', 'User Mehedi Hasan changed his own password', 'App\\Models\\User', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-10 12:45:07', '2024-10-10 12:45:07'),
(91, 'default', 'User Mehedi Hasan changed his own password', 'App\\Models\\User', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-10 12:48:44', '2024-10-10 12:48:44'),
(92, 'default', 'User Mehedi Hasan changed his own password', 'App\\Models\\User', NULL, 3, 'App\\Models\\User', 3, '[]', NULL, '2024-10-10 12:51:39', '2024-10-10 12:51:39'),
(93, 'default', 'User Mehedi Hasan changed his own password', 'App\\Models\\User', NULL, 4, 'App\\Models\\User', 4, '[]', NULL, '2024-10-11 03:50:39', '2024-10-11 03:50:39'),
(94, 'default', 'User Mehedi Hasan has been edited[ Smart Watch ] Product', 'App\\Models\\Product', NULL, 16, 'App\\Models\\User', 4, '[]', NULL, '2024-10-11 08:21:08', '2024-10-11 08:21:08'),
(95, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 1, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 08:57:58', '2024-10-12 08:57:58'),
(96, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 2, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 08:58:18', '2024-10-12 08:58:18'),
(97, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 3, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 08:58:23', '2024-10-12 08:58:23'),
(98, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 4, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 08:58:31', '2024-10-12 08:58:31'),
(99, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 5, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 08:58:35', '2024-10-12 08:58:35'),
(100, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 6, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 08:59:05', '2024-10-12 08:59:05'),
(101, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 7, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 09:07:05', '2024-10-12 09:07:05'),
(102, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 8, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 10:39:34', '2024-10-12 10:39:34'),
(103, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 9, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 10:39:35', '2024-10-12 10:39:35'),
(104, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 10, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 10:40:14', '2024-10-12 10:40:14'),
(105, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 11, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 10:40:34', '2024-10-12 10:40:34'),
(106, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 12, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 10:40:35', '2024-10-12 10:40:35'),
(107, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 13, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 10:40:35', '2024-10-12 10:40:35'),
(108, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 14, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 10:40:35', '2024-10-12 10:40:35'),
(109, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 15, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 10:40:35', '2024-10-12 10:40:35'),
(110, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 16, 'App\\Models\\User', 4, '[]', NULL, '2024-10-12 10:42:04', '2024-10-12 10:42:04'),
(111, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 18, 'App\\Models\\User', 4, '[]', NULL, '2024-10-14 22:37:58', '2024-10-14 22:37:58'),
(112, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 19, 'App\\Models\\User', 4, '[]', NULL, '2024-10-14 23:02:06', '2024-10-14 23:02:06'),
(113, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 20, 'App\\Models\\User', 4, '[]', NULL, '2024-10-14 23:03:43', '2024-10-14 23:03:43'),
(114, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 21, 'App\\Models\\User', 4, '[]', NULL, '2024-10-14 23:13:59', '2024-10-14 23:13:59'),
(115, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 1, 'App\\Models\\User', 4, '[]', NULL, '2024-10-14 23:15:11', '2024-10-14 23:15:11'),
(116, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 2, 'App\\Models\\User', 4, '[]', NULL, '2024-10-14 23:18:09', '2024-10-14 23:18:09'),
(117, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 3, 'App\\Models\\User', 4, '[]', NULL, '2024-10-15 00:26:21', '2024-10-15 00:26:21'),
(118, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 4, 'App\\Models\\User', 4, '[]', NULL, '2024-10-15 00:33:45', '2024-10-15 00:33:45'),
(119, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 5, 'App\\Models\\User', 4, '[]', NULL, '2024-10-15 00:34:07', '2024-10-15 00:34:07'),
(120, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 22, 'App\\Models\\User', 4, '[]', NULL, '2024-10-15 00:39:41', '2024-10-15 00:39:41'),
(121, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 6, 'App\\Models\\User', 2, '[]', NULL, '2024-10-15 01:09:31', '2024-10-15 01:09:31'),
(122, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 23, 'App\\Models\\User', 2, '[]', NULL, '2024-10-15 01:09:39', '2024-10-15 01:09:39'),
(123, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 7, 'App\\Models\\User', 2, '[]', NULL, '2024-10-15 01:22:50', '2024-10-15 01:22:50'),
(124, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 24, 'App\\Models\\User', 2, '[]', NULL, '2024-10-15 01:22:57', '2024-10-15 01:22:57'),
(125, 'default', 'User Mehedi Hasan created  [ White Horse ] Category', 'App\\Models\\Category', NULL, 6, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 00:15:24', '2024-10-16 00:15:24'),
(126, 'default', 'User Mehedi Hasan created  [ Secondhand Cars Collection ] Category', 'App\\Models\\Category', NULL, 7, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 00:18:16', '2024-10-16 00:18:16'),
(127, 'default', 'User Mehedi Hasan created  [ dd ] Category', 'App\\Models\\Category', NULL, 8, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 00:18:57', '2024-10-16 00:18:57'),
(128, 'default', 'User Mehedi Hasan has deleted 8 no category name[dd]', 'App\\Models\\Category', NULL, 8, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 00:19:12', '2024-10-16 00:19:12'),
(129, 'default', 'User Mehedi Hasan created  [ dd ] Category', 'App\\Models\\Category', NULL, 9, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 00:24:59', '2024-10-16 00:24:59'),
(130, 'default', 'User Mehedi Hasan created  [ ee ] Category', 'App\\Models\\Category', NULL, 10, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 00:26:15', '2024-10-16 00:26:15'),
(131, 'default', 'User Mehedi Hasan has deleted 9 no category name[dd]', 'App\\Models\\Category', NULL, 9, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 00:27:32', '2024-10-16 00:27:32'),
(132, 'default', 'User Mehedi Hasan has deleted 10 no category name[ee]', 'App\\Models\\Category', NULL, 10, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 01:04:24', '2024-10-16 01:04:24'),
(133, 'default', 'User Mehedi Hasan created  [ Cloths section ] Category', 'App\\Models\\Category', NULL, 11, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 01:05:52', '2024-10-16 01:05:52'),
(134, 'default', 'User Mehedi Hasan has updated 6 no  category from - White Horse to Electronic Gadgets', 'App\\Models\\Category', NULL, 6, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 01:10:05', '2024-10-16 01:10:05'),
(135, 'default', 'User Mehedi Hasan created  [ jewellery ] Category', 'App\\Models\\Category', NULL, 12, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 01:11:44', '2024-10-16 01:11:44'),
(136, 'default', 'User Mehedi Hasan created  [ Smart phones ] Category', 'App\\Models\\Category', NULL, 13, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 01:12:18', '2024-10-16 01:12:18'),
(137, 'default', 'User Mehedi Hasan created  [ Grocery Store ] Category', 'App\\Models\\Category', NULL, 14, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 01:12:55', '2024-10-16 01:12:55'),
(138, 'default', 'User Mehedi Hasan created  [ Bikes ] Category', 'App\\Models\\Category', NULL, 15, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 01:13:45', '2024-10-16 01:13:45'),
(139, 'default', 'User Mehedi Hasan has updated 15 no  category from - Bikes to Bikes', 'App\\Models\\Category', NULL, 15, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 01:13:53', '2024-10-16 01:13:53'),
(140, 'default', 'User Mehedi Hasan created  [ Protin ] Category', 'App\\Models\\Category', NULL, 16, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 02:55:35', '2024-10-16 02:55:35'),
(141, 'default', 'User Mehedi Hasan has deleted 16 no category name[Protin]', 'App\\Models\\Category', NULL, 16, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 02:56:04', '2024-10-16 02:56:04'),
(142, 'default', 'User Mehedi Hasan created  [ dd ] Category', 'App\\Models\\Category', NULL, 16, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 03:10:25', '2024-10-16 03:10:25'),
(143, 'default', 'User Mehedi Hasan has deleted 16 no category name[dd]', 'App\\Models\\Category', NULL, 16, 'App\\Models\\User', 4, '[]', NULL, '2024-10-16 03:10:58', '2024-10-16 03:10:58'),
(144, 'default', 'User Mehedi Hasan changed his own email address', 'App\\Models\\User', NULL, 6, 'App\\Models\\User', 6, '[]', NULL, '2024-10-16 08:47:47', '2024-10-16 08:47:47'),
(145, 'default', 'User Mehedi Hasan changed his own email address', 'App\\Models\\User', NULL, 6, 'App\\Models\\User', 6, '[]', NULL, '2024-10-16 08:48:24', '2024-10-16 08:48:24'),
(146, 'default', 'User Mehedi Hasan changed his own email address', 'App\\Models\\User', NULL, 6, 'App\\Models\\User', 6, '[]', NULL, '2024-10-16 08:51:19', '2024-10-16 08:51:19'),
(147, 'default', 'User Mehedi Hasan changed his own email address', 'App\\Models\\User', NULL, 6, 'App\\Models\\User', 6, '[]', NULL, '2024-10-16 08:52:42', '2024-10-16 08:52:42'),
(148, 'default', 'User Mehedi Hasan changed his own password', 'App\\Models\\User', NULL, 6, 'App\\Models\\User', 6, '[]', NULL, '2024-10-16 08:53:39', '2024-10-16 08:53:39'),
(149, 'default', 'User Dipro Biswas has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 25, 'App\\Models\\User', 7, '[]', NULL, '2024-10-16 09:08:45', '2024-10-16 09:08:45'),
(150, 'default', 'UserMehedi Hasanhas been created [Apple] sub category', 'App\\Models\\SubCategory', NULL, 3, 'App\\Models\\User', 6, '[]', NULL, '2024-10-16 09:37:09', '2024-10-16 09:37:09'),
(151, 'default', 'UserMehedi Hasanhas been created [Drone] sub category', 'App\\Models\\SubCategory', NULL, 4, 'App\\Models\\User', 6, '[]', NULL, '2024-10-16 09:37:40', '2024-10-16 09:37:40'),
(152, 'default', 'UserMehedi Hasanhas been created [Diamond] sub category', 'App\\Models\\SubCategory', NULL, 5, 'App\\Models\\User', 6, '[]', NULL, '2024-10-16 09:38:45', '2024-10-16 09:38:45'),
(153, 'default', 'UserMehedi Hasanhas been created [Grocery Package] sub category', 'App\\Models\\SubCategory', NULL, 6, 'App\\Models\\User', 6, '[]', NULL, '2024-10-16 09:39:19', '2024-10-16 09:39:19'),
(154, 'default', 'UserMehedi Hasanhas been created [Boys Fasion] sub category', 'App\\Models\\SubCategory', NULL, 7, 'App\\Models\\User', 6, '[]', NULL, '2024-10-16 09:41:48', '2024-10-16 09:41:48'),
(155, 'default', 'UserMehedi Hasanhas been created [A bucket of fruits] sub category', 'App\\Models\\SubCategory', NULL, 8, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 02:20:47', '2024-10-17 02:20:47'),
(156, 'default', 'UserMehedi Hasanhas been created [Google-Pixel] sub category', 'App\\Models\\SubCategory', NULL, 9, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 02:35:26', '2024-10-17 02:35:26'),
(157, 'default', 'UserMehedi Hasanhas been created [Xiaomi] sub category', 'App\\Models\\SubCategory', NULL, 10, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 02:35:53', '2024-10-17 02:35:53'),
(158, 'default', 'UserMehedi Hasanhas been created [Samsung S24 ultra] sub category', 'App\\Models\\SubCategory', NULL, 11, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 02:36:49', '2024-10-17 02:36:49'),
(159, 'default', 'UserMehedi Hasanhas been created [Broccoli] sub category', 'App\\Models\\SubCategory', NULL, 12, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 02:37:35', '2024-10-17 02:37:35'),
(160, 'default', 'UserMehedi Hasanhas been created [Tomato] sub category', 'App\\Models\\SubCategory', NULL, 13, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 02:37:53', '2024-10-17 02:37:53'),
(161, 'default', 'UserMehedi Hasanhas been created [Tablets] sub category', 'App\\Models\\SubCategory', NULL, 14, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 02:40:39', '2024-10-17 02:40:39'),
(162, 'default', 'User Mehedi Hasan has updated 7 no  category from - Secondhand Cars Collection to Cars Collection', 'App\\Models\\Category', NULL, 7, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:02:11', '2024-10-17 09:02:11'),
(163, 'default', 'UserMehedi Hasanhas been created [Suzuki] sub category', 'App\\Models\\SubCategory', NULL, 15, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:03:11', '2024-10-17 09:03:11'),
(164, 'default', 'UserMehedi Hasanhas been created [Yamaha] sub category', 'App\\Models\\SubCategory', NULL, 16, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:04:07', '2024-10-17 09:04:07'),
(165, 'default', 'UserMehedi Hasanhas been created [Rolls Royels] sub category', 'App\\Models\\SubCategory', NULL, 17, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:04:43', '2024-10-17 09:04:43'),
(166, 'default', 'UserMehedi Hasanhas been created [Audi] sub category', 'App\\Models\\SubCategory', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:05:23', '2024-10-17 09:05:23'),
(167, 'default', 'UserMehedi Hasanhas been created [BMW] sub category', 'App\\Models\\SubCategory', NULL, 19, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:05:58', '2024-10-17 09:05:58'),
(168, 'default', 'UserMehedi Hasanhas been created [Gold] sub category', 'App\\Models\\SubCategory', NULL, 20, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:28:33', '2024-10-17 09:28:33'),
(169, 'default', 'UserMehedi Hasanhas been created [Silver] sub category', 'App\\Models\\SubCategory', NULL, 21, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:29:09', '2024-10-17 09:29:09'),
(170, 'default', 'UserMehedi Hasanhas been created [Immitation] sub category', 'App\\Models\\SubCategory', NULL, 22, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:30:35', '2024-10-17 09:30:35'),
(171, 'default', 'User Mehedi Hasan has updated 7 no  category from - Boys Fasion to Boys Formal Zone', 'App\\Models\\SubCategory', NULL, 7, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:31:30', '2024-10-17 09:31:30'),
(172, 'default', 'UserMehedi Hasanhas been created [Boys Informal Zone] sub category', 'App\\Models\\SubCategory', NULL, 23, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:32:24', '2024-10-17 09:32:24'),
(173, 'default', 'UserMehedi Hasanhas been created [Child section] sub category', 'App\\Models\\SubCategory', NULL, 24, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:32:57', '2024-10-17 09:32:57'),
(174, 'default', 'UserMehedi Hasanhas been created [Girls Zone] sub category', 'App\\Models\\SubCategory', NULL, 25, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:33:22', '2024-10-17 09:33:22'),
(175, 'default', 'User Mehedi Hasan has updated 24 no  category from - Child section to Child Zone', 'App\\Models\\SubCategory', NULL, 24, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:33:29', '2024-10-17 09:33:29'),
(176, 'default', 'UserMehedi Hasanhas been created [Stylish Watch] sub category', 'App\\Models\\SubCategory', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:35:35', '2024-10-17 09:35:35'),
(177, 'default', 'UserMehedi Hasanhas been created [Smart watch] sub category', 'App\\Models\\SubCategory', NULL, 27, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:36:18', '2024-10-17 09:36:18'),
(178, 'default', 'UserMehedi Hasanhas been created [HeadPhone] sub category', 'App\\Models\\SubCategory', NULL, 28, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:38:32', '2024-10-17 09:38:32'),
(179, 'default', 'User Mehedi Hasan has updated 28 no  category from - HeadPhone to HeadPhones', 'App\\Models\\SubCategory', NULL, 28, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:39:25', '2024-10-17 09:39:25'),
(180, 'default', 'User Mehedi Hasan has deleted 5 no category name[Digital Watch]', 'App\\Models\\Category', NULL, 5, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:40:30', '2024-10-17 09:40:30'),
(181, 'default', 'User Mehedi Hasan has deleted 2 no category name[Apple Watch]', 'App\\Models\\SubCategory', NULL, 2, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:40:37', '2024-10-17 09:40:37'),
(182, 'default', 'User Mehedi Hasan has deleted 16 no product name[Smart Watch]', 'App\\Models\\Product', NULL, 16, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:41:37', '2024-10-17 09:41:37'),
(183, 'default', 'User Mehedi Hasan has deleted 15 no product name[Digital Watch]', 'App\\Models\\Product', NULL, 15, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:41:40', '2024-10-17 09:41:40'),
(184, 'default', 'User Mehedi Hasan created  [ Yamaha R15 v3 ] Product', 'App\\Models\\Product', NULL, 17, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:55:58', '2024-10-17 09:55:58'),
(185, 'default', 'User Mehedi Hasan has been edited[ Yamaha R15 v3 ] Product', 'App\\Models\\Product', NULL, 17, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 09:57:20', '2024-10-17 09:57:20'),
(186, 'default', 'User Mehedi Hasan created  [ Yamaha R15 v4 ] Product', 'App\\Models\\Product', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:02:41', '2024-10-17 10:02:41'),
(187, 'default', 'User Mehedi Hasan created  [ Suzuki GSX-R ] Product', 'App\\Models\\Product', NULL, 19, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:05:58', '2024-10-17 10:05:58'),
(188, 'default', 'User Mehedi Hasan created  [ Suzuki Burgman ] Product', 'App\\Models\\Product', NULL, 20, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:08:03', '2024-10-17 10:08:03'),
(189, 'default', 'User Mehedi Hasan created  [ Suzuki GSX-8S ] Product', 'App\\Models\\Product', NULL, 21, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:12:06', '2024-10-17 10:12:06'),
(190, 'default', 'User Mehedi Hasan created  [ Suzuki Hayabusa ] Product', 'App\\Models\\Product', NULL, 22, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:14:04', '2024-10-17 10:14:04'),
(191, 'default', 'User Mehedi Hasan created  [ Suzuki Gixxer ] Product', 'App\\Models\\Product', NULL, 23, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:15:28', '2024-10-17 10:15:28'),
(192, 'default', 'User Mehedi Hasan has updated 11 no  category from - Samsung S24 ultra to Samsung', 'App\\Models\\SubCategory', NULL, 11, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:16:24', '2024-10-17 10:16:24'),
(193, 'default', 'User Mehedi Hasan created  [ Samsung s22 ultra ] Product', 'App\\Models\\Product', NULL, 24, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:18:18', '2024-10-17 10:18:18'),
(194, 'default', 'User Mehedi Hasan created  [ Samsung S24 ultra ] Product', 'App\\Models\\Product', NULL, 25, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:19:27', '2024-10-17 10:19:27'),
(195, 'default', 'User Mehedi Hasan created  [ Google Pixel 9 Pro ] Product', 'App\\Models\\Product', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:21:49', '2024-10-17 10:21:49'),
(196, 'default', 'User Mehedi Hasan created  [ Xiaomi 12 Pro ] Product', 'App\\Models\\Product', NULL, 27, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:23:25', '2024-10-17 10:23:25'),
(197, 'default', 'User Mehedi Hasan created  [ iPhone 15 Pro Max ] Product', 'App\\Models\\Product', NULL, 28, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:27:42', '2024-10-17 10:27:42'),
(198, 'default', 'User Mehedi Hasan created  [ Top and Skirt Set ] Product', 'App\\Models\\Product', NULL, 29, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:40:37', '2024-10-17 10:40:37'),
(199, 'default', 'User Mehedi Hasan has updated 13 no  category from - Tomato to Meats', 'App\\Models\\SubCategory', NULL, 13, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:43:41', '2024-10-17 10:43:41'),
(200, 'default', 'User Mehedi Hasan has updated 12 no  category from - Broccoli to Vegetables', 'App\\Models\\SubCategory', NULL, 12, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:45:52', '2024-10-17 10:45:52'),
(201, 'default', 'User Mehedi Hasan has updated 8 no  category from - A bucket of fruits to Ingredients Store', 'App\\Models\\SubCategory', NULL, 8, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:46:40', '2024-10-17 10:46:40'),
(202, 'default', 'User Mehedi Hasan has updated 6 no  category from - Grocery Package to Cooking Oil', 'App\\Models\\SubCategory', NULL, 6, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 10:47:18', '2024-10-17 10:47:18'),
(203, 'default', 'User Mehedi Hasan has been edited[ Yamaha R15 v4 ] Product', 'App\\Models\\Product', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 11:52:58', '2024-10-17 11:52:58'),
(204, 'default', 'User Mehedi Hasan has been edited[ Yamaha R15 v3 ] Product', 'App\\Models\\Product', NULL, 17, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 11:53:13', '2024-10-17 11:53:13'),
(205, 'default', 'User Mehedi Hasan has been edited[ Yamaha R15 v3 ] Product', 'App\\Models\\Product', NULL, 17, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 11:57:48', '2024-10-17 11:57:48'),
(206, 'default', 'User Mehedi Hasan has been edited[ Google Pixel 9 Pro ] Product', 'App\\Models\\Product', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 12:31:14', '2024-10-17 12:31:14'),
(207, 'default', 'User Mehedi Hasan has been edited[ Google Pixel 9 Pro ] Product', 'App\\Models\\Product', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 12:33:45', '2024-10-17 12:33:45'),
(208, 'default', 'User Mehedi Hasan has been edited[ Samsung S24 ultra ] Product', 'App\\Models\\Product', NULL, 25, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 12:35:05', '2024-10-17 12:35:05'),
(209, 'default', 'User Mehedi Hasan has been edited[ Google Pixel 9 Pro ] Product', 'App\\Models\\Product', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 12:35:32', '2024-10-17 12:35:32'),
(210, 'default', 'User Mehedi Hasan has been edited[ Samsung S24 ultra ] Product', 'App\\Models\\Product', NULL, 25, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 12:35:44', '2024-10-17 12:35:44'),
(211, 'default', 'User Mehedi Hasan has been edited[ Google Pixel 9 Pro ] Product', 'App\\Models\\Product', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 12:37:16', '2024-10-17 12:37:16'),
(212, 'default', 'User Mehedi Hasan has been edited[ Google Pixel 9 Pro ] Product', 'App\\Models\\Product', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 12:38:59', '2024-10-17 12:38:59'),
(213, 'default', 'User Mehedi Hasan has been edited[ Google Pixel 9 Pro ] Product', 'App\\Models\\Product', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 12:41:21', '2024-10-17 12:41:21'),
(214, 'default', 'User Mehedi Hasan has been edited[ Google Pixel 9 Pro ] Product', 'App\\Models\\Product', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 12:43:07', '2024-10-17 12:43:07'),
(215, 'default', 'User Mehedi Hasan has been edited[ Google Pixel 9 Pro ] Product', 'App\\Models\\Product', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-17 12:43:54', '2024-10-17 12:43:54'),
(216, 'default', 'User Mehedi Hasan has been edited[ iPhone 15 Pro Max ] Product', 'App\\Models\\Product', NULL, 28, 'App\\Models\\User', 6, '[]', NULL, '2024-10-18 02:48:45', '2024-10-18 02:48:45'),
(217, 'default', 'User Mehedi Hasan has been edited[ Suzuki Gixxer ] Product', 'App\\Models\\Product', NULL, 23, 'App\\Models\\User', 6, '[]', NULL, '2024-10-18 07:25:37', '2024-10-18 07:25:37'),
(218, 'default', 'User Mehedi Hasan has updated 26 no  category from - Stylish Watch to Non smart Watch', 'App\\Models\\SubCategory', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 02:39:41', '2024-10-21 02:39:41'),
(219, 'default', 'User Mehedi Hasan has updated 7 no  category from - Cars Collection to Cars Collection', 'App\\Models\\Category', NULL, 7, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 08:56:29', '2024-10-21 08:56:29'),
(220, 'default', 'User Mehedi Hasan created  [ Cars Collection ] Category', 'App\\Models\\Category', NULL, 16, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 08:57:16', '2024-10-21 08:57:16'),
(221, 'default', 'User Mehedi Hasan has deleted 16 no category name[Cars Collection]', 'App\\Models\\Category', NULL, 16, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 08:57:38', '2024-10-21 08:57:38'),
(222, 'default', 'User Mehedi Hasan has updated 15 no  category from - Bikes to Bikes', 'App\\Models\\Category', NULL, 15, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 08:57:42', '2024-10-21 08:57:42'),
(223, 'default', 'User Mehedi Hasan has updated 11 no  category from - Cloths section to Cloths section', 'App\\Models\\Category', NULL, 11, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 08:57:45', '2024-10-21 08:57:45'),
(224, 'default', 'User Mehedi Hasan has updated 6 no  category from - Electronic Gadgets to Electronic Gadgets', 'App\\Models\\Category', NULL, 6, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 08:57:50', '2024-10-21 08:57:50'),
(225, 'default', 'User Mehedi Hasan has updated 12 no  category from - jewellery to jewellery', 'App\\Models\\Category', NULL, 12, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 08:57:54', '2024-10-21 08:57:54'),
(226, 'default', 'User Mehedi Hasan has updated 14 no  category from - Grocery Store to Grocery Store', 'App\\Models\\Category', NULL, 14, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 08:57:57', '2024-10-21 08:57:57'),
(227, 'default', 'User Mehedi Hasan has updated 13 no  category from - Smart phones to Smart phones', 'App\\Models\\Category', NULL, 13, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 08:58:02', '2024-10-21 08:58:02'),
(228, 'default', 'User Mehedi Hasan created  [ nnnnn ] Category', 'App\\Models\\Category', NULL, 17, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:06:36', '2024-10-21 09:06:36'),
(229, 'default', 'User Mehedi Hasan created  [ Mehedi Hasan ] Category', 'App\\Models\\Category', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:16:39', '2024-10-21 09:16:39'),
(230, 'default', 'User Mehedi Hasan created  [ ddd ] Category', 'App\\Models\\Category', NULL, 19, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:16:44', '2024-10-21 09:16:44'),
(231, 'default', 'User Mehedi Hasan created  [ dddsss ] Category', 'App\\Models\\Category', NULL, 20, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:16:49', '2024-10-21 09:16:49'),
(232, 'default', 'User Mehedi Hasan created  [ aaa ] Category', 'App\\Models\\Category', NULL, 21, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:16:54', '2024-10-21 09:16:54'),
(233, 'default', 'User Mehedi Hasan has deleted 20 no category name[dddsss]', 'App\\Models\\Category', NULL, 20, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:18:38', '2024-10-21 09:18:38'),
(234, 'default', 'User Mehedi Hasan created  [ aa ] Category', 'App\\Models\\Category', NULL, 22, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:19:06', '2024-10-21 09:19:06'),
(235, 'default', 'User Mehedi Hasan created  [ dd ] Category', 'App\\Models\\Category', NULL, 23, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:19:10', '2024-10-21 09:19:10'),
(236, 'default', 'User Mehedi Hasan created  [ ff ] Category', 'App\\Models\\Category', NULL, 24, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:19:15', '2024-10-21 09:19:15'),
(237, 'default', 'User Mehedi Hasan created  [ aa ] Category', 'App\\Models\\Category', NULL, 25, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:22:42', '2024-10-21 09:22:42'),
(238, 'default', 'User Mehedi Hasan created  [ bb ] Category', 'App\\Models\\Category', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:22:47', '2024-10-21 09:22:47'),
(239, 'default', 'User Mehedi Hasan created  [ cc ] Category', 'App\\Models\\Category', NULL, 27, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:22:52', '2024-10-21 09:22:52'),
(240, 'default', 'User Mehedi Hasan created  [ dd ] Category', 'App\\Models\\Category', NULL, 28, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:22:57', '2024-10-21 09:22:57'),
(241, 'default', 'User Mehedi Hasan created  [ ee ] Category', 'App\\Models\\Category', NULL, 29, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:23:02', '2024-10-21 09:23:02'),
(242, 'default', 'User Mehedi Hasan created  [ ff ] Category', 'App\\Models\\Category', NULL, 30, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:23:08', '2024-10-21 09:23:08'),
(243, 'default', 'User Mehedi Hasan has deleted 18 no category name[Mehedi Hasan]', 'App\\Models\\Category', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:38:42', '2024-10-21 09:38:42'),
(244, 'default', 'User Mehedi Hasan has deleted 28 no category name[dd]', 'App\\Models\\Category', NULL, 28, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:38:48', '2024-10-21 09:38:48'),
(245, 'default', 'User Mehedi Hasan has deleted 29 no category name[ee]', 'App\\Models\\Category', NULL, 29, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:38:51', '2024-10-21 09:38:51'),
(246, 'default', 'User Mehedi Hasan has deleted 30 no category name[ff]', 'App\\Models\\Category', NULL, 30, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 09:38:57', '2024-10-21 09:38:57'),
(247, 'default', 'User Mehedi Hasan has updated 7 no  category from - Cars Collection to Cars Collection', 'App\\Models\\Category', NULL, 7, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:19:32', '2024-10-21 10:19:32'),
(248, 'default', 'User Mehedi Hasan has updated 7 no  category from - Cars Collection to Cars Collections', 'App\\Models\\Category', NULL, 7, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:19:44', '2024-10-21 10:19:44'),
(249, 'default', 'User Mehedi Hasan has updated 7 no  category from - Cars Collections to Cars Collection', 'App\\Models\\Category', NULL, 7, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:19:52', '2024-10-21 10:19:52'),
(250, 'default', 'User Mehedi Hasan has updated 16 no  category from - Yamaha to Yamaha', 'App\\Models\\SubCategory', NULL, 16, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:25:36', '2024-10-21 10:25:36'),
(251, 'default', 'User Mehedi Hasan has updated 15 no  category from - Suzuki to Suzuki', 'App\\Models\\SubCategory', NULL, 15, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:25:41', '2024-10-21 10:25:41'),
(252, 'default', 'User Mehedi Hasan has updated 19 no  category from - BMW to BMW', 'App\\Models\\SubCategory', NULL, 19, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:25:45', '2024-10-21 10:25:45'),
(253, 'default', 'User Mehedi Hasan has updated 18 no  category from - Audi to Audi', 'App\\Models\\SubCategory', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:25:48', '2024-10-21 10:25:48'),
(254, 'default', 'User Mehedi Hasan has updated 17 no  category from - Rolls Royels to Rolls Royels', 'App\\Models\\SubCategory', NULL, 17, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:25:52', '2024-10-21 10:25:52'),
(255, 'default', 'User Mehedi Hasan has updated 25 no  category from - Girls Zone to Girls Zone', 'App\\Models\\SubCategory', NULL, 25, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:25:55', '2024-10-21 10:25:55'),
(256, 'default', 'User Mehedi Hasan has updated 24 no  category from - Child Zone to Child Zone', 'App\\Models\\SubCategory', NULL, 24, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:25:58', '2024-10-21 10:25:58'),
(257, 'default', 'User Mehedi Hasan has updated 23 no  category from - Boys Informal Zone to Boys Informal Zone', 'App\\Models\\SubCategory', NULL, 23, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:26:02', '2024-10-21 10:26:02');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(258, 'default', 'User Mehedi Hasan has updated 23 no  category from - Boys Informal Zone to Boys Informal Zone', 'App\\Models\\SubCategory', NULL, 23, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:26:09', '2024-10-21 10:26:09'),
(259, 'default', 'User Mehedi Hasan has updated 7 no  category from - Boys Formal Zone to Boys Formal Zone', 'App\\Models\\SubCategory', NULL, 7, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:26:13', '2024-10-21 10:26:13'),
(260, 'default', 'User Mehedi Hasan has updated 28 no  category from - HeadPhones to HeadPhones', 'App\\Models\\SubCategory', NULL, 28, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:26:17', '2024-10-21 10:26:17'),
(261, 'default', 'User Mehedi Hasan has updated 27 no  category from - Smart watch to Smart watch', 'App\\Models\\SubCategory', NULL, 27, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:26:23', '2024-10-21 10:26:23'),
(262, 'default', 'User Mehedi Hasan has updated 26 no  category from - Non smart Watch to Non smart Watch', 'App\\Models\\SubCategory', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:26:31', '2024-10-21 10:26:31'),
(263, 'default', 'User Mehedi Hasan has updated 4 no  category from - Drone to Drone', 'App\\Models\\SubCategory', NULL, 4, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:26:38', '2024-10-21 10:26:38'),
(264, 'default', 'User Mehedi Hasan has updated 13 no  category from - Meats to Meats', 'App\\Models\\SubCategory', NULL, 13, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:26:46', '2024-10-21 10:26:46'),
(265, 'default', 'User Mehedi Hasan has updated 12 no  category from - Vegetables to Vegetables', 'App\\Models\\SubCategory', NULL, 12, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:26:53', '2024-10-21 10:26:53'),
(266, 'default', 'User Mehedi Hasan has updated 8 no  category from - Ingredients Store to Ingredients Store', 'App\\Models\\SubCategory', NULL, 8, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:26:59', '2024-10-21 10:26:59'),
(267, 'default', 'User Mehedi Hasan has updated 6 no  category from - Cooking Oil to Cooking Oil', 'App\\Models\\SubCategory', NULL, 6, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:27:07', '2024-10-21 10:27:07'),
(268, 'default', 'User Mehedi Hasan has updated 22 no  category from - Immitation to Immitation', 'App\\Models\\SubCategory', NULL, 22, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:27:13', '2024-10-21 10:27:13'),
(269, 'default', 'User Mehedi Hasan has updated 21 no  category from - Silver to Silver', 'App\\Models\\SubCategory', NULL, 21, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:27:18', '2024-10-21 10:27:18'),
(270, 'default', 'User Mehedi Hasan has updated 20 no  category from - Gold to Gold', 'App\\Models\\SubCategory', NULL, 20, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:27:24', '2024-10-21 10:27:24'),
(271, 'default', 'User Mehedi Hasan has updated 5 no  category from - Diamond to Diamond', 'App\\Models\\SubCategory', NULL, 5, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:27:35', '2024-10-21 10:27:35'),
(272, 'default', 'User Mehedi Hasan has updated 14 no  category from - Tablets to Tablets', 'App\\Models\\SubCategory', NULL, 14, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:27:41', '2024-10-21 10:27:41'),
(273, 'default', 'User Mehedi Hasan has updated 11 no  category from - Samsung to Samsung', 'App\\Models\\SubCategory', NULL, 11, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:27:47', '2024-10-21 10:27:47'),
(274, 'default', 'User Mehedi Hasan has updated 11 no  category from - Samsung to Samsung', 'App\\Models\\SubCategory', NULL, 11, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:27:53', '2024-10-21 10:27:53'),
(275, 'default', 'User Mehedi Hasan has updated 10 no  category from - Xiaomi to Xiaomi', 'App\\Models\\SubCategory', NULL, 10, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:28:04', '2024-10-21 10:28:04'),
(276, 'default', 'User Mehedi Hasan has updated 9 no  category from - Google-Pixel to Google-Pixel', 'App\\Models\\SubCategory', NULL, 9, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:28:12', '2024-10-21 10:28:12'),
(277, 'default', 'User Mehedi Hasan has updated 3 no  category from - Apple to Apple', 'App\\Models\\SubCategory', NULL, 3, 'App\\Models\\User', 6, '[]', NULL, '2024-10-21 10:28:18', '2024-10-21 10:28:18'),
(278, 'default', 'User Mehedi Hasan created  [ Raw Meat ] Product', 'App\\Models\\Product', NULL, 30, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:10:08', '2024-10-22 07:10:08'),
(279, 'default', 'User Mehedi Hasan created  [ Fresh Deer Meat ] Product', 'App\\Models\\Product', NULL, 31, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:12:36', '2024-10-22 07:12:36'),
(280, 'default', 'User Mehedi Hasan created  [ Goat Meat ] Product', 'App\\Models\\Product', NULL, 32, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:17:12', '2024-10-22 07:17:12'),
(281, 'default', 'User Mehedi Hasan created  [ Tuna Fish Meat ] Product', 'App\\Models\\Product', NULL, 33, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:18:38', '2024-10-22 07:18:38'),
(282, 'default', 'User Mehedi Hasan created  [ Fresh Chicken Meat ] Product', 'App\\Models\\Product', NULL, 34, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:20:29', '2024-10-22 07:20:29'),
(283, 'default', 'User Mehedi Hasan created  [ Premium Camel Meat ] Product', 'App\\Models\\Product', NULL, 35, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:22:16', '2024-10-22 07:22:16'),
(284, 'default', 'User Mehedi Hasan created  [ Fresh Tomatoes ] Product', 'App\\Models\\Product', NULL, 36, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:24:10', '2024-10-22 07:24:10'),
(285, 'default', 'User Mehedi Hasan created  [ Fresh Broccoli ] Product', 'App\\Models\\Product', NULL, 37, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:27:24', '2024-10-22 07:27:24'),
(286, 'default', 'User Mehedi Hasan created  [ Fresh Ladyfinger ] Product', 'App\\Models\\Product', NULL, 38, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:30:23', '2024-10-22 07:30:23'),
(287, 'default', 'User Mehedi Hasan created  [ Fresh Carrots ] Product', 'App\\Models\\Product', NULL, 39, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:32:34', '2024-10-22 07:32:34'),
(288, 'default', 'User Mehedi Hasan created  [ Fresh Corn ] Product', 'App\\Models\\Product', NULL, 40, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:39:10', '2024-10-22 07:39:10'),
(289, 'default', 'User Mehedi Hasan created  [ Fresh Beetroot ] Product', 'App\\Models\\Product', NULL, 41, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:40:11', '2024-10-22 07:40:11'),
(290, 'default', 'User Mehedi Hasan created  [ Fresh Pumpkin ] Product', 'App\\Models\\Product', NULL, 42, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:43:44', '2024-10-22 07:43:44'),
(291, 'default', 'User Mehedi Hasan created  [ Fresh Capsicum ] Product', 'App\\Models\\Product', NULL, 43, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:45:05', '2024-10-22 07:45:05'),
(292, 'default', 'User Mehedi Hasan created  [ Pran Meat Masala ] Product', 'App\\Models\\Product', NULL, 44, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:48:31', '2024-10-22 07:48:31'),
(293, 'default', 'User Mehedi Hasan created  [ Radhuni Garam Masala ] Product', 'App\\Models\\Product', NULL, 45, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:50:12', '2024-10-22 07:50:12'),
(294, 'default', 'User Mehedi Hasan created  [ Garam Masala Powder ] Product', 'App\\Models\\Product', NULL, 46, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:52:08', '2024-10-22 07:52:08'),
(295, 'default', 'User Mehedi Hasan created  [ Super Garam Masala ] Product', 'App\\Models\\Product', NULL, 47, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:53:52', '2024-10-22 07:53:52'),
(296, 'default', 'User Mehedi Hasan created  [ Handi Biryani  masala ] Product', 'App\\Models\\Product', NULL, 48, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:55:52', '2024-10-22 07:55:52'),
(297, 'default', 'User Mehedi Hasan created  [ Radhuni Biryani Masala ] Product', 'App\\Models\\Product', NULL, 49, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 07:58:26', '2024-10-22 07:58:26'),
(298, 'default', 'User Mehedi Hasan created  [ Fresh Fortified Soybean Oil - 5litter ] Product', 'App\\Models\\Product', NULL, 50, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 08:00:58', '2024-10-22 08:00:58'),
(299, 'default', 'User Mehedi Hasan created  [ Teer Mustard 1 litter Oi ] Product', 'App\\Models\\Product', NULL, 51, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 08:03:10', '2024-10-22 08:03:10'),
(300, 'default', 'User Mehedi Hasan created  [ Mazola Corn Oil -2 litter ] Product', 'App\\Models\\Product', NULL, 52, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 08:06:12', '2024-10-22 08:06:12'),
(301, 'default', 'User Mehedi Hasan created  [ Extra Virgin Olive Oil ] Product', 'App\\Models\\Product', NULL, 53, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 08:07:46', '2024-10-22 08:07:46'),
(302, 'default', 'User Mehedi Hasan created  [ Teer Fortified Oil – 5 Liters ] Product', 'App\\Models\\Product', NULL, 54, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 08:10:08', '2024-10-22 08:10:08'),
(303, 'default', 'User Mehedi Hasan has been edited[ Mazola Corn Oil -2 liters ] Product', 'App\\Models\\Product', NULL, 52, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 08:10:52', '2024-10-22 08:10:52'),
(304, 'default', 'User Mehedi Hasan has been edited[ Teer Mustard 1 liter Oi ] Product', 'App\\Models\\Product', NULL, 51, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 08:11:21', '2024-10-22 08:11:21'),
(305, 'default', 'User Mehedi Hasan has been edited[ Fresh Fortified Soybean Oil - 5 liters ] Product', 'App\\Models\\Product', NULL, 50, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 08:11:57', '2024-10-22 08:11:57'),
(306, 'default', 'User Mehedi Hasan has been edited[ Radhuni Garam Masala ] Product', 'App\\Models\\Product', NULL, 45, 'App\\Models\\User', 6, '[]', NULL, '2024-10-22 09:00:07', '2024-10-22 09:00:07'),
(307, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 8, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 11:28:50', '2024-10-26 11:28:50'),
(308, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 26, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 11:29:12', '2024-10-26 11:29:12'),
(309, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 27, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 11:31:36', '2024-10-26 11:31:36'),
(310, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 28, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 11:32:18', '2024-10-26 11:32:18'),
(311, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 29, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 11:32:49', '2024-10-26 11:32:49'),
(312, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 30, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 11:36:34', '2024-10-26 11:36:34'),
(313, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 31, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 11:36:43', '2024-10-26 11:36:43'),
(314, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 32, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 11:36:50', '2024-10-26 11:36:50'),
(315, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 9, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 11:55:06', '2024-10-26 11:55:06'),
(316, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 10, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 11:57:17', '2024-10-26 11:57:17'),
(317, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 11, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 11:57:33', '2024-10-26 11:57:33'),
(318, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 12, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 12:13:03', '2024-10-26 12:13:03'),
(319, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 13, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 12:17:00', '2024-10-26 12:17:00'),
(320, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 33, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 12:21:38', '2024-10-26 12:21:38'),
(321, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 34, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 12:22:39', '2024-10-26 12:22:39'),
(322, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 14, 'App\\Models\\User', 6, '[]', NULL, '2024-10-26 12:22:58', '2024-10-26 12:22:58'),
(323, 'default', 'User Dipro Biswas has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 35, 'App\\Models\\User', 7, '[]', NULL, '2024-10-27 00:24:19', '2024-10-27 00:24:19'),
(324, 'default', 'User Dipro Biswas has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 36, 'App\\Models\\User', 7, '[]', NULL, '2024-10-27 00:24:47', '2024-10-27 00:24:47'),
(325, 'default', 'User Dipro Biswas has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 15, 'App\\Models\\User', 7, '[]', NULL, '2024-10-27 00:26:02', '2024-10-27 00:26:02'),
(326, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 37, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 00:33:58', '2024-10-27 00:33:58'),
(327, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 38, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 00:34:39', '2024-10-27 00:34:39'),
(328, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 16, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 00:36:08', '2024-10-27 00:36:08'),
(329, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 17, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 02:04:44', '2024-10-27 02:04:44'),
(330, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 02:07:38', '2024-10-27 02:07:38'),
(331, 'default', 'User Mehedi Hasan has changed his cover picture position.', 'App\\Models\\CoverPicture', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 02:36:08', '2024-10-27 02:36:08'),
(332, 'default', 'User Mehedi Hasan has changed his cover picture position.', 'App\\Models\\CoverPicture', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 02:36:11', '2024-10-27 02:36:11'),
(333, 'default', 'User Mehedi Hasan has changed his cover picture position.', 'App\\Models\\CoverPicture', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 02:37:16', '2024-10-27 02:37:16'),
(334, 'default', 'User Mehedi Hasan has changed his cover picture position.', 'App\\Models\\CoverPicture', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 02:37:17', '2024-10-27 02:37:17'),
(335, 'default', 'User Mehedi Hasan has changed his cover picture position.', 'App\\Models\\CoverPicture', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 02:37:43', '2024-10-27 02:37:43'),
(336, 'default', 'User Mehedi Hasan has changed his cover picture position.', 'App\\Models\\CoverPicture', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 03:25:48', '2024-10-27 03:25:48'),
(337, 'default', 'User Mehedi Hasan has changed his cover picture position.', 'App\\Models\\CoverPicture', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 03:27:14', '2024-10-27 03:27:14'),
(338, 'default', 'User Dipro Biswas has changed his cover picture position.', 'App\\Models\\CoverPicture', NULL, 15, 'App\\Models\\User', 7, '[]', NULL, '2024-10-27 03:28:40', '2024-10-27 03:28:40'),
(339, 'default', 'User Dipro Biswas has changed his cover picture position.', 'App\\Models\\CoverPicture', NULL, 15, 'App\\Models\\User', 7, '[]', NULL, '2024-10-27 03:30:26', '2024-10-27 03:30:26'),
(340, 'default', 'User Mehedi Hasan has changed his cover picture position.', 'App\\Models\\CoverPicture', NULL, 18, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 08:16:39', '2024-10-27 08:16:39'),
(341, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 19, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 08:17:55', '2024-10-27 08:17:55'),
(342, 'default', 'User Mehedi Hasan has uploaded his profile picture.', 'App\\Models\\Profile', NULL, 39, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 08:18:18', '2024-10-27 08:18:18'),
(343, 'default', 'User Mehedi Hasan has changed his cover picture position.', 'App\\Models\\CoverPicture', NULL, 19, 'App\\Models\\User', 6, '[]', NULL, '2024-10-27 10:15:12', '2024-10-27 10:15:12'),
(344, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 20, 'App\\Models\\User', 11, '[]', NULL, '2024-10-29 10:39:20', '2024-10-29 10:39:20'),
(345, 'default', 'User Mehedi Hasan has changed his cover picture position.', 'App\\Models\\CoverPicture', NULL, 20, 'App\\Models\\User', 11, '[]', NULL, '2024-10-29 10:40:33', '2024-10-29 10:40:33'),
(346, 'default', 'User Mehedi Hasan has uploaded his cover picture.', 'App\\Models\\CoverPicture', NULL, 21, 'App\\Models\\User', 11, '[]', NULL, '2024-10-29 12:27:45', '2024-10-29 12:27:45'),
(347, 'default', 'User Mehedi Hasan has changed his cover picture position.', 'App\\Models\\CoverPicture', NULL, 21, 'App\\Models\\User', 11, '[]', NULL, '2024-10-29 12:27:59', '2024-10-29 12:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `add_to_carts`
--

CREATE TABLE `add_to_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `unit_price` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `total_price` bigint(20) DEFAULT NULL,
  `user_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pc.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(8, 'Diamond section', 'Diamond-section1728400281.jpg', '2024-10-08 09:11:21', '2024-10-08 09:11:21'),
(10, 'Smart Watch', 'Smart-Watch1728400490.png', '2024-10-08 09:14:50', '2024-10-08 09:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `display`, `slug`, `created_at`, `updated_at`) VALUES
(6, 'Electronic Gadgets', 'Electronic-Gadgets1729062605.jpg', 'yes', 'electronic-gadgets-1729526052', '2024-10-16 00:15:24', '2024-10-21 09:54:12'),
(7, 'Cars Collection', 'Secondhand-Cars-Collection1729059496.png', 'no', 'cars-collection', '2024-10-16 00:18:16', '2024-10-21 10:19:52'),
(11, 'Cloths section', 'Cloths-section1729062352.jpg', 'yes', 'cloths-section', '2024-10-16 01:05:52', '2024-10-21 08:57:45'),
(12, 'jewellery', 'jewellery1729062704.jpg', 'yes', 'jewellery', '2024-10-16 01:11:44', '2024-10-21 08:57:54'),
(13, 'Smart phones', 'Smart-phones1729062738.jpg', 'yes', 'smart-phones', '2024-10-16 01:12:18', '2024-10-21 08:58:02'),
(14, 'Grocery Store', 'Grocery-Store1729062775.jpg', 'yes', 'grocery-store-1729526717', '2024-10-16 01:12:55', '2024-10-21 10:05:17'),
(15, 'Bikes', 'Bikes1729062825.png', 'no', 'bikes-1729526926', '2024-10-16 01:13:45', '2024-10-21 10:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `cover_pictures`
--

CREATE TABLE `cover_pictures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'cover.jpg',
  `top_position` int(10) NOT NULL DEFAULT '40',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `activity_count` int(10) NOT NULL DEFAULT '0',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `activity_count`, `first_name`, `last_name`, `address`, `city`, `postal_code`, `created_at`, `updated_at`) VALUES
(13, 16, 1, 'Mehedi', 'Hasan', 'null', 'Jhenaidah', '7200', '2024-10-29 15:15:40', '2024-10-29 16:51:11'),
(14, 17, 3, 'Mehedi', 'Hasan', 'null', 'Jhenaidah', '7200', '2024-10-29 15:30:15', '2024-10-29 16:54:24');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_07_125858_create_categories_table', 2),
(5, '2024_10_07_133031_create_activity_log_table', 3),
(6, '2024_10_07_133032_add_event_column_to_activity_log_table', 3),
(7, '2024_10_07_133033_add_batch_uuid_column_to_activity_log_table', 3),
(8, '2024_10_08_051756_create_sub_categories_table', 4),
(9, '2024_10_08_061418_create_slides_table', 5),
(10, '2024_10_08_131520_create_advertisements_table', 6),
(11, '2024_10_09_031835_create_products_table', 7),
(12, '2024_10_09_035112_create_product_images_table', 8),
(13, '2024_10_12_132936_create_profiles_table', 9),
(14, '2024_10_15_045207_create_cover_pictures_table', 10),
(15, '2024_10_18_054243_create_views_table', 11),
(16, '2024_10_18_054616_create_likes_table', 12),
(17, '2024_10_27_151958_create_add_to_carts_table', 13),
(18, '2024_10_28_144411_create_customers_table', 14),
(19, '2024_10_28_144445_create_orders_table', 14),
(20, '2024_10_28_144518_create_order_items_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending, processing, completed, cancelled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `discount`, `sub_total`, `status`, `created_at`, `updated_at`) VALUES
(9, '9', '650785', '0', '650785', 'pending', '2024-10-28 11:34:42', '2024-10-28 11:34:42'),
(10, '9', '950', '0', '950', 'pending', '2024-10-28 11:43:28', '2024-10-28 11:43:28'),
(11, '10', '420', '0', '420', 'pending', '2024-10-28 11:45:21', '2024-10-28 11:45:21'),
(12, '11', '220000', '0', '220000', 'pending', '2024-10-28 11:47:08', '2024-10-28 11:47:08'),
(15, '9', '660', '0', '660', 'pending', '2024-10-28 12:00:08', '2024-10-28 12:00:08'),
(26, '9', '2500', '0', '2500', 'pending', '2024-10-28 12:27:53', '2024-10-28 12:27:53'),
(27, '11', '150000', '0', '150000', 'pending', '2024-10-28 12:51:19', '2024-10-28 12:51:19'),
(28, '9', '2399000', '0', '2399000', 'pending', '2024-10-29 03:29:06', '2024-10-29 03:29:06'),
(29, '12', '951700', '0', '951700', 'pending', '2024-10-29 15:13:30', '2024-10-29 15:13:30'),
(30, '13', '800', '0', '800', 'pending', '2024-10-29 15:15:40', '2024-10-29 15:15:40'),
(31, '14', '600', '0', '600', 'pending', '2024-10-29 15:30:15', '2024-10-29 15:30:15'),
(33, '14', '450', '0', '450', 'pending', '2024-10-29 16:46:47', '2024-10-29 16:46:47'),
(34, '13', '500', '0', '500', 'pending', '2024-10-29 16:51:11', '2024-10-29 16:51:11'),
(35, '14', '240', '0', '240', 'pending', '2024-10-29 16:54:24', '2024-10-29 16:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `unit_price`, `quantity`, `unit_total`, `created_at`, `updated_at`) VALUES
(12, 9, 28, 'iPhone 15 Pro Max', 150000, 1, 150000, '2024-10-28 11:34:42', '2024-10-28 11:34:42'),
(13, 9, 17, 'Yamaha R15 v3', 500000, 1, 500000, '2024-10-28 11:34:42', '2024-10-28 11:34:42'),
(14, 9, 45, 'Radhuni Garam Masala', 220, 1, 220, '2024-10-28 11:34:42', '2024-10-28 11:34:42'),
(15, 9, 51, 'Teer Mustard 1 liter Oi', 340, 1, 340, '2024-10-28 11:34:42', '2024-10-28 11:34:42'),
(16, 9, 48, 'Handi Biryani  masala', 225, 1, 225, '2024-10-28 11:34:42', '2024-10-28 11:34:42'),
(17, 10, 30, 'Raw Meat', 700, 1, 700, '2024-10-28 11:43:28', '2024-10-28 11:43:28'),
(18, 10, 34, 'Fresh Chicken Meat', 250, 1, 250, '2024-10-28 11:43:28', '2024-10-28 11:43:28'),
(19, 11, 37, 'Fresh Broccoli', 200, 1, 200, '2024-10-28 11:45:21', '2024-10-28 11:45:21'),
(20, 11, 38, 'Fresh Ladyfinger', 100, 1, 100, '2024-10-28 11:45:21', '2024-10-28 11:45:21'),
(21, 11, 40, 'Fresh Corn', 120, 1, 120, '2024-10-28 11:45:21', '2024-10-28 11:45:21'),
(22, 12, 24, 'Samsung s22 ultra', 100000, 1, 100000, '2024-10-28 11:47:08', '2024-10-28 11:47:08'),
(23, 12, 25, 'Samsung S24 ultra', 120000, 1, 120000, '2024-10-28 11:47:08', '2024-10-28 11:47:08'),
(24, 15, 44, 'Pran Meat Masala', 200, 1, 200, '2024-10-28 12:00:08', '2024-10-28 12:00:08'),
(25, 15, 45, 'Radhuni Garam Masala', 220, 1, 220, '2024-10-28 12:00:08', '2024-10-28 12:00:08'),
(26, 15, 46, 'Garam Masala Powder', 240, 1, 240, '2024-10-28 12:00:08', '2024-10-28 12:00:08'),
(27, 26, 44, 'Pran Meat Masala', 200, 4, 800, '2024-10-28 12:27:53', '2024-10-28 12:27:53'),
(28, 26, 51, 'Teer Mustard 1 liter Oi', 340, 5, 1700, '2024-10-28 12:27:53', '2024-10-28 12:27:53'),
(29, 27, 28, 'iPhone 15 Pro Max', 150000, 1, 150000, '2024-10-28 12:51:19', '2024-10-28 12:51:19'),
(30, 28, 19, 'Suzuki GSX-R', 399000, 1, 399000, '2024-10-29 03:29:06', '2024-10-29 03:29:06'),
(31, 28, 22, 'Suzuki Hayabusa', 2000000, 1, 2000000, '2024-10-29 03:29:06', '2024-10-29 03:29:06'),
(32, 29, 21, 'Suzuki GSX-8S', 800000, 1, 800000, '2024-10-29 15:13:30', '2024-10-29 15:13:30'),
(33, 29, 53, 'Extra Virgin Olive Oil', 800, 1, 800, '2024-10-29 15:13:30', '2024-10-29 15:13:30'),
(34, 29, 54, 'Teer Fortified Oil – 5 Liters', 900, 1, 900, '2024-10-29 15:13:30', '2024-10-29 15:13:30'),
(35, 29, 28, 'iPhone 15 Pro Max', 150000, 1, 150000, '2024-10-29 15:13:30', '2024-10-29 15:13:30'),
(36, 30, 53, 'Extra Virgin Olive Oil', 800, 1, 800, '2024-10-29 15:15:40', '2024-10-29 15:15:40'),
(37, 31, 52, 'Mazola Corn Oil -2 liters', 600, 1, 600, '2024-10-29 15:30:15', '2024-10-29 15:30:15'),
(38, 33, 36, 'Fresh Tomatoes', 150, 1, 150, '2024-10-29 16:46:47', '2024-10-29 16:46:47'),
(39, 33, 37, 'Fresh Broccoli', 200, 1, 200, '2024-10-29 16:46:47', '2024-10-29 16:46:47'),
(40, 33, 38, 'Fresh Ladyfinger', 100, 1, 100, '2024-10-29 16:46:47', '2024-10-29 16:46:47'),
(41, 34, 41, 'Fresh Beetroot', 400, 1, 400, '2024-10-29 16:51:11', '2024-10-29 16:51:11'),
(42, 34, 39, 'Fresh Carrots', 100, 1, 100, '2024-10-29 16:51:11', '2024-10-29 16:51:11'),
(43, 35, 42, 'Fresh Pumpkin', 90, 1, 90, '2024-10-29 16:54:24', '2024-10-29 16:54:24'),
(44, 35, 36, 'Fresh Tomatoes', 150, 1, 150, '2024-10-29 16:54:24', '2024-10-29 16:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('mehedi@gmail.com', '$2y$12$cI4n6bzX5mF6g7/hzt65wekieSH0JQxQtUWtpre0oTI6DAIJSkenC', '2024-10-07 06:35:33'),
('mehedihasan87571210@gmail.com', '$2y$12$uPSOMMYCLeqB8fFkBKgmC.SFTra/T50O5u7ebJGusf39MFjhFfR0K', '2024-10-07 06:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_arrival` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_view` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `name`, `title`, `slug`, `price`, `details`, `image`, `featured`, `new_arrival`, `number_of_view`, `created_at`, `updated_at`) VALUES
(17, '15', '16', 'Yamaha R15 v3', 'Yamaha R15 V3  Performance Redefined', 'yamaha-r15-v3-performance-redefined-1729187868', 500000, 'The Yamaha R15 V3 is a sporty and stylish 155cc bike, known for its race-inspired design, advanced technology, and powerful performance. Equipped with VVA technology, LED headlights, and a sleek aerodynamic body, it offers an exhilarating riding experience both on city streets and highways.', 'yamaha-r15-v3-1729180557-.webp', NULL, NULL, 28, '2024-10-17 09:55:58', '2024-10-29 03:04:11'),
(18, '15', '16', 'Yamaha R15 v4', 'Yamaha R15 V4: The Next-Gen Racing Machine', 'yamaha-r15-v4-the-next-gen-racing-machine-1729187578', 550000, 'The Yamaha R15 V4 takes racing DNA to the next level with its sleek design and advanced features. Powered by a 155cc liquid-cooled engine with VVA technology, it delivers enhanced performance and precision. The bike boasts a fully digital LCD display, quick shifter, traction control, and aerodynamic bodywork, making it perfect for thrill-seekers and performance enthusiasts. Whether on the track or the road, the R15 V4 sets new standards in sportsbike engineering.', 'yamaha-r15-v4-1729180961-.jpg', 'featured', 'arrival', 3, '2024-10-17 10:02:41', '2024-10-22 10:31:01'),
(19, '15', '15', 'Suzuki GSX-R', 'Suzuki GSX-R: The Ultimate Sportbike Experience', 'suzuki-gsx-r-the-ultimate-sportbike-experience', 399000, 'The Suzuki GSX-R series embodies the spirit of racing with its lightweight chassis, powerful engine, and cutting-edge technology. Designed for performance enthusiasts, the GSX-R delivers exceptional handling, stability, and acceleration on both the track and the street. With features like advanced aerodynamics, a responsive inline-four engine, and a full suite of electronic aids, it offers riders an unparalleled blend of speed and agility. The GSX-R is a true testament to Suzuki\'s racing heritage, ensuring an adrenaline-fueled ride every time.', 'suzuki-gsx-r-1729181158-.jpg', 'featured', NULL, 7, '2024-10-17 10:05:58', '2024-10-28 01:47:22'),
(20, '15', '15', 'Suzuki Burgman', 'Suzuki Burgman The Stylish and Versatile Scooter', 'suzuki-burgman-the-stylish-and-versatile-scooter', 600000, 'The Suzuki Burgman is a premium scooter that combines comfort, performance, and practicality for urban commuting and long rides. With its sleek design, spacious under-seat storage, and powerful engine options, the Burgman delivers a smooth and enjoyable riding experience. Features like a comfortable seat, windscreen, and advanced instrumentation make it ideal for both city navigation and leisurely rides. Whether you\'re navigating through traffic or cruising along open roads, the Suzuki Burgman offers a perfect blend of style and functionality for every rider.', 'suzuki-burgman-1729181283-.jpeg', NULL, NULL, 1, '2024-10-17 10:08:03', '2024-10-22 08:14:01'),
(21, '15', '15', 'Suzuki GSX-8S', 'Suzuki GSX-8S The naked Sports Performance', 'suzuki-gsx-8s-the-naked-sports-performance', 800000, 'The Suzuki GSX-8S is a powerful naked bike featuring an 805cc parallel-twin engine and a lightweight chassis. With its aggressive styling, comfortable seating, and advanced technology, it offers a thrilling riding experience for both city commuting and weekend adventures.', 'suzuki-gsx-8s-1729181526-.webp', 'featured', 'arrival', 3, '2024-10-17 10:12:06', '2024-10-28 01:47:53'),
(22, '15', '15', 'Suzuki Hayabusa', 'The Iconic Superbike Redefining Speed and Performance', 'the-iconic-superbike-redefining-speed-and-performance', 2000000, 'The Suzuki Hayabusa is a legendary superbike known for its incredible speed and aerodynamic design. Powered by a 1340cc engine, it offers unmatched performance and stability, making it a top choice for enthusiasts seeking adrenaline and precision on the road.', 'suzuki-hayabusa-1729181644-.webp', 'featured', NULL, 5, '2024-10-17 10:14:04', '2024-10-29 03:26:22'),
(23, '15', '15', 'Suzuki Gixxer', 'The Dynamic and Sporty Commuter Motorcycle', 'the-dynamic-and-sporty-commuter-motorcycle-1729257937', 230000, 'The Suzuki Gixxer combines style, performance, and efficiency in a lightweight package. With a 155cc engine, modern design, and advanced features, it delivers agile handling and a thrilling ride, making it perfect for both city commutes and weekend adventures.', 'suzuki-gixxer-1729181728-.jpg', NULL, NULL, 0, '2024-10-17 10:15:28', '2024-10-18 07:25:37'),
(24, '13', '11', 'Samsung s22 ultra', 'The Ultimate Flagship Smartphone with Unmatched Performance', 'the-ultimate-flagship-smartphone-with-unmatched-performance', 100000, 'The Samsung Galaxy S22 Ultra is a premium smartphone featuring a stunning 6.8-inch AMOLED display, powerful Snapdragon 8 Gen 1 processor, and a versatile quad-camera system. With 5G connectivity, S Pen support, and an exceptional battery life, it delivers an unparalleled user experience for both productivity and entertainment.', 'samsung-s22-ultra-1729181898-.webp', NULL, NULL, 1, '2024-10-17 10:18:18', '2024-10-22 23:26:05'),
(25, '13', '11', 'Samsung S24 ultra', 'The Next-Generation Flagship Smartphone Redefining Innovation', 'the-next-generation-flagship-smartphone-redefining-innovation', 120000, 'The Samsung Galaxy S24 Ultra boasts a brilliant 6.8-inch AMOLED display, cutting-edge Snapdragon 8 Gen 3 processor, and an advanced quad-camera system for stunning photography. With S Pen integration, 5G support, and enhanced battery life, it offers a premium experience for power users and tech enthusiasts alike.', 'samsung-s24-ultra-1729181967-.webp', NULL, 'arrival', 2, '2024-10-17 10:19:27', '2024-10-28 03:29:05'),
(26, '13', '9', 'Google Pixel 9 Pro', 'Best Smartphone Experience with Advanced AI Features', 'best-smartphone-experience-with-advanced-ai-features', 100000, 'The Google Pixel 9 Pro combines a stunning 6.7 inch OLED display with a powerful Google Tensor G3 chip and an exceptional camera system that excels in low-light photography. With seamless integration of Google services, 5G connectivity, and long-lasting battery life, it delivers a premium experience for everyday users and photography enthusiasts alike.', 'google-pixel-9-pro-1729182109-.jpeg', NULL, 'arrival', 32, '2024-10-17 10:21:49', '2024-10-29 03:33:42'),
(27, '13', '10', 'Xiaomi 12 Pro', 'The Premium Flagship with Stunning Display and Performance', 'the-premium-flagship-with-stunning-display-and-performance', 50000, 'The Xiaomi 12 Pro features a vibrant 6.73-inch AMOLED display, powered by the Snapdragon 8 Gen 1 processor. With a versatile triple-camera system, 120W fast charging, and 5G support, it delivers an outstanding experience for multimedia, gaming, and photography enthusiasts.', 'xiaomi-12-pro-1729182205-.webp', NULL, NULL, 9, '2024-10-17 10:23:25', '2024-10-28 01:47:06'),
(28, '13', '3', 'iPhone 15 Pro Max', 'The Pinnacle of Innovation and Performance', 'the-pinnacle-of-innovation-and-performance-1729241325', 150000, 'The iPhone 15 Pro Max features a stunning 6.7-inch Super Retina XDR display, A17 Bionic chip, and an advanced triple-camera system with ProRAW capabilities. With 5G connectivity, Dynamic Island, and all-day battery life, it offers a premium experience for photography, gaming, and multitasking.', 'iphone-15-pro-max-1729182462-.jpg', 'featured', 'arrival', 114, '2024-10-17 10:27:42', '2024-10-29 14:39:50'),
(29, '11', '24', 'Top and Skirt Set', 'Stylish and Comfortable Outfit for Everyday Wear', 'stylish-and-comfortable-outfit-for-everyday-wear', 2500, 'This kids\' top and skirt dress offers a perfect blend of style and comfort, made from soft, breathable fabric. The vibrant design and playful patterns make it an ideal choice for both casual outings and special occasions.', 'top-and-skirt-set-1729183237-.jpg', 'featured', NULL, 1, '2024-10-17 10:40:37', '2024-10-27 09:39:32'),
(30, '14', '13', 'Raw Meat', 'Premium Quality Fresh Raw Meat – Perfect for Cooking and Grilling', 'premium-quality-fresh-raw-meat-perfect-for-cooking-and-grilling', 700, 'Experience the rich taste of our premium-quality raw meat, sourced from carefully raised, ethically treated livestock. This fresh, tender meat is perfect for a variety of cooking methods, whether you\'re grilling for a BBQ, roasting for a family dinner, or preparing a gourmet meal. Expertly packaged to preserve its freshness and natural flavor, it’s an ideal choice for meat lovers who value both quality and taste in every dish.', 'raw-meat-1729602608-.png', NULL, NULL, 32, '2024-10-22 07:10:08', '2024-10-29 09:31:12'),
(31, '14', '13', 'Fresh Deer Meat', 'Premium Venison – Fresh Deer Meat for Gourmet Dishes', 'premium-venison-fresh-deer-meat-for-gourmet-dishes', 1200, 'Savor the rich, robust flavor of our premium deer meat (venison), sourced from sustainably hunted deer. This lean, high-protein meat is perfect for grilling, roasting, or slow-cooking, offering a unique taste that elevates any meal. Packed with nutrients and expertly processed to ensure freshness, it’s an excellent choice for health-conscious food enthusiasts and adventurous home cooks alike. Enjoy a gourmet experience with every bite!', 'fresh-deer-meat-1729602756-.jpg', NULL, NULL, 0, '2024-10-22 07:12:36', '2024-10-22 07:12:36'),
(32, '14', '13', 'Goat Meat', 'Fresh Goat Meat – Tender and Flavorful Cuts for Delicious Meals', 'fresh-goat-meat-tender-and-flavorful-cuts-for-delicious-meals', 1000, 'Enjoy the rich, distinctive flavor of our fresh goat meat, sourced from high-quality, grass-fed goats. Known for its tenderness and versatility, goat meat is perfect for a variety of dishes, from curries and stews to grilling and roasting. Packed with protein and essential nutrients, it’s an excellent choice for health-conscious cooks looking to try something new. Each cut is expertly packaged to ensure maximum freshness and flavor, making it a delightful addition to your culinary repertoire.', 'goat-meat-1729603032-.jpg', NULL, NULL, 2, '2024-10-22 07:17:12', '2024-10-22 09:36:55'),
(33, '14', '13', 'Tuna Fish Meat', 'Fresh Tuna Fish Meat – High-Quality, Rich in Flavor', 'fresh-tuna-fish-meat-high-quality-rich-in-flavor', 1500, 'Indulge in our fresh tuna fish meat, known for its firm texture and rich, savory flavor. Sourced from sustainable fisheries, this high-quality tuna is perfect for grilling, searing, or sushi preparation. Packed with essential omega-3 fatty acids, it’s not only delicious but also a healthy addition to your diet. Each cut is expertly handled to ensure maximum freshness, making it a great choice for seafood lovers and culinary enthusiasts alike. Enjoy a taste of the ocean in every bite!', 'tuna-fish-meat-1729603118-.jpg', NULL, NULL, 0, '2024-10-22 07:18:38', '2024-10-22 07:18:38'),
(34, '14', '13', 'Fresh Chicken Meat', 'Fresh Chicken Meat – Tender and Juicy Cuts for Every Meal', 'fresh-chicken-meat-tender-and-juicy-cuts-for-every-meal', 250, 'Enjoy our fresh chicken meat, renowned for its tenderness and versatility. Sourced from locally raised, hormone-free chickens, it’s perfect for grilling, baking, or frying. Packed with protein and essential nutrients, our chicken is a staple for healthy, delicious meals. Each cut is carefully processed and packaged to ensure maximum freshness, making it an ideal choice for families and home cooks looking to create wholesome dishes. Whether you’re making a hearty stew or a simple roast, our chicken delivers flavor you can trust!', 'fresh-chicken-meat-1729603229-.webp', NULL, NULL, 0, '2024-10-22 07:20:29', '2024-10-22 07:20:29'),
(35, '14', '13', 'Premium Camel Meat', 'Premium Camel Meat – Unique and Flavorful Cuts', 'premium-camel-meat-unique-and-flavorful-cuts', 700, 'Discover the rich, distinctive flavor of our premium camel meat, sourced from sustainably raised camels. This lean, high-protein meat is perfect for slow cooking, stews, and barbecuing, offering a unique taste that stands out in any dish. Camel meat is not only flavorful but also packed with nutrients, making it an excellent choice for adventurous food lovers. Each cut is expertly processed to ensure freshness, providing a delightful culinary experience for those looking to explore new flavors and textures.', 'premium-camel-meat-1729603336-.jpg', NULL, NULL, 0, '2024-10-22 07:22:16', '2024-10-22 07:22:16'),
(36, '14', '12', 'Fresh Tomatoes', 'Organic Fresh Tomatoes – Juicy and Flavorful Produce', 'organic-fresh-tomatoes-juicy-and-flavorful-produce', 150, 'Enjoy our organic fresh tomatoes, bursting with flavor and perfect for a variety of dishes. Sourced from local farms, these ripe tomatoes are ideal for salads, sauces, and salsas. Packed with vitamins and antioxidants, they’re a healthy addition to your meals. Each tomato is carefully selected for quality and freshness, ensuring you get the best taste and texture in every bite. Elevate your cooking with the natural sweetness of our tomatoes!', 'fresh-tomatoes-1729603449-.webp', NULL, NULL, 0, '2024-10-22 07:24:10', '2024-10-22 07:24:10'),
(37, '14', '12', 'Fresh Broccoli', 'Organic Fresh Broccoli – Crisp and Nutritious', 'organic-fresh-broccoli-crisp-and-nutritious', 200, 'Discover the vibrant taste of our organic fresh broccoli, harvested at peak freshness for optimal flavor and nutrition. Rich in vitamins C and K, this crisp vegetable is perfect for steaming, stir-frying, or adding to salads. Each head of broccoli is carefully selected to ensure high quality and freshness, making it an excellent choice for healthy meals. Enjoy the versatility and goodness of broccoli in your favorite dishes!', 'fresh-broccoli-1729603644-.webp', NULL, NULL, 1, '2024-10-22 07:27:24', '2024-10-22 09:37:05'),
(38, '14', '12', 'Fresh Ladyfinger', 'Fresh Ladyfinger (Okra) – Crisp and Tender Vegetable', 'fresh-ladyfinger-okra-crisp-and-tender-vegetable', 100, 'Enjoy our fresh ladyfinger (okra), known for its unique flavor and crisp texture. This versatile vegetable is perfect for frying, sautéing, or adding to stews and curries. Rich in vitamins and minerals, ladyfinger is a healthy addition to any meal. Each piece is carefully selected for quality and freshness, ensuring you get the best taste and nutrition. Elevate your dishes with the delightful crunch of our fresh ladyfinger!', 'fresh-ladyfinger-1729603822-.jpg', NULL, NULL, 0, '2024-10-22 07:30:23', '2024-10-22 07:30:23'),
(39, '14', '12', 'Fresh Carrots', 'Organic Fresh Carrots – Sweet and Crunchy', 'organic-fresh-carrots-sweet-and-crunchy', 100, 'Savor the natural sweetness of our organic fresh carrots, perfect for snacking, salads, or cooking. These crunchy carrots are packed with vitamins A and C, making them a nutritious addition to your meals. Each carrot is carefully selected for quality and freshness, ensuring you get the best flavor and texture. Enjoy the vibrant color and delicious taste of our fresh carrots in your favorite dishes!', 'fresh-carrots-1729603954-.jpg', NULL, NULL, 0, '2024-10-22 07:32:34', '2024-10-22 07:32:34'),
(40, '14', '12', 'Fresh Corn', 'Sweet Fresh Corn – Juicy and Flavorful Ears', 'sweet-fresh-corn-juicy-and-flavorful-ears', 120, 'Delight in our sweet fresh corn, picked at peak ripeness for maximum flavor and juiciness. Perfect for grilling, boiling, or adding to salads, this versatile vegetable is a summer favorite. Each ear is carefully selected to ensure freshness and quality, making it an ideal choice for barbecues and family meals. Enjoy the delicious crunch and natural sweetness of our fresh corn in every bite!', 'fresh-corn-1729604350-.jpg', NULL, NULL, 0, '2024-10-22 07:39:10', '2024-10-22 07:39:10'),
(41, '14', '12', 'Fresh Beetroot', 'Organic Fresh Beetroot – Earthy and Nutritious', 'organic-fresh-beetroot-earthy-and-nutritious', 400, 'Experience the rich, earthy flavor of our organic fresh beetroot, perfect for salads, soups, or roasting. Packed with vitamins and antioxidants, beetroot is not only delicious but also highly nutritious. Each root is carefully selected for quality and freshness, ensuring you get the best taste and texture. Add a vibrant color and health benefits to your meals with our fresh beetroot!', 'fresh-beetroot-1729604410-.webp', NULL, NULL, 1, '2024-10-22 07:40:11', '2024-10-22 09:37:15'),
(42, '14', '12', 'Fresh Pumpkin', 'Organic Fresh Pumpkin – Sweet and Nutritious', 'organic-fresh-pumpkin-sweet-and-nutritious', 90, 'Enjoy the natural sweetness of our organic fresh pumpkin, perfect for soups, pies, and roasting. Packed with vitamins A and C, this nutritious vegetable is a great addition to your meals. Each pumpkin is carefully selected for quality and freshness, ensuring rich flavor and vibrant color. Embrace the fall season with the delightful taste of our fresh pumpkin in your favorite recipes!', 'fresh-pumpkin-1729604624-.jpg', NULL, NULL, 0, '2024-10-22 07:43:44', '2024-10-22 07:43:44'),
(43, '14', '12', 'Fresh Capsicum', 'Organic Fresh Capsicum – Crisp and Colorful', 'organic-fresh-capsicum-crisp-and-colorful', 150, 'Savor the crunch and sweetness of our organic fresh capsicum (bell pepper), perfect for salads, stir-fries, or grilling. Available in a variety of vibrant colors, these peppers are rich in vitamins A and C, making them a nutritious addition to any dish. Each capsicum is carefully selected for quality and freshness, ensuring a delicious flavor and satisfying texture. Brighten up your meals with the colorful goodness of our fresh capsicum!', 'fresh-capsicum-1729604705-.jpg', NULL, NULL, 1, '2024-10-22 07:45:05', '2024-10-22 09:00:19'),
(44, '14', '8', 'Pran Meat Masala', 'Pran Meat Masala – Authentic Spice Blend for Delicious Dishes', 'pran-meat-masala-authentic-spice-blend-for-delicious-dishes', 200, 'Enhance your culinary creations with Pran Meat Masala, a premium spice blend crafted for rich and flavorful meat dishes. This authentic mix features a perfect balance of spices, ideal for marinating, stews, and curries. Made from high-quality ingredients, it brings out the best flavors in your favorite recipes. Add a dash of tradition and taste to your meals with Pran Meat Masala for a delicious dining experience!', 'pran-meat-masala-1729604911-.jpeg', NULL, NULL, 3, '2024-10-22 07:48:31', '2024-10-28 12:27:22'),
(45, '14', '8', 'Radhuni Garam Masala', 'Radhuni Gura Masala – Traditional Spice Mix for Authentic Flavor', 'radhuni-gura-masala-traditional-spice-mix-for-authentic-flavor-1729609207', 220, 'Elevate your cooking with Radhuni Gura Masala, a traditional spice blend designed to enhance the flavor of your favorite dishes. This aromatic mix features carefully selected spices, perfect for curries, stews, and rice dishes. Known for its rich and authentic taste, Radhuni Gura Masala brings warmth and depth to your meals. Enjoy a burst of flavor in every bite with this essential spice blend!', 'radhuni-garam-masala-1729605012-.jpeg', NULL, NULL, 0, '2024-10-22 07:50:12', '2024-10-22 09:00:07'),
(46, '14', '8', 'Garam Masala Powder', 'Pure Garam Masala Powder – Authentic Spice Blend for Rich Flavor', 'pure-garam-masala-powder-authentic-spice-blend-for-rich-flavor', 240, 'Discover the essence of traditional cooking with our Pure Garam Masala Powder, expertly crafted from a blend of high-quality spices. This aromatic mix is perfect for enhancing the flavor of curries, stews, and grilled dishes. With its rich aroma and warm, complex taste, our garam masala adds depth and authenticity to your meals. Elevate your culinary creations with this essential spice that brings a touch of warmth and richness to every dish!', 'garam-masala-powder-1729605127-.webp', NULL, NULL, 0, '2024-10-22 07:52:08', '2024-10-22 07:52:08'),
(47, '14', '8', 'Super Garam Masala', 'Catch Super Garam Masala – Premium Spice Blend for Enhanced Flavor', 'catch-super-garam-masala-premium-spice-blend-for-enhanced-flavor', 300, 'Experience the robust flavor of Catch Super Garam Masala, a premium spice blend meticulously crafted to elevate your cooking. This aromatic mix features a perfect balance of spices, ideal for curries, biryanis, and savory dishes. Known for its rich fragrance and taste, Catch Super Garam Masala brings warmth and authenticity to your meals. Transform your culinary creations with this essential blend that adds depth and richness to every bite!', 'super-garam-masala-1729605232-.jpg', NULL, NULL, 0, '2024-10-22 07:53:52', '2024-10-22 07:53:52'),
(48, '14', '8', 'Handi Biryani  masala', 'Handi Biryani  masala– Flavorful Rice Dish with Aromatic Spices', 'handi-biryani-masala-flavorful-rice-dish-with-aromatic-spices', 225, 'Indulge in our Handi Biryani, a traditional rice dish crafted with aromatic spices and tender meat or vegetables. Cooked in a sealed pot to preserve flavors, this biryani offers a perfect blend of basmati rice, rich spices, and succulent pieces of chicken, mutton, or vegetables. Each serving is a celebration of taste and fragrance, making it an ideal choice for special occasions or a hearty meal. Enjoy the authentic taste of our Handi Biryani, served with raita or salad for a complete experience!', 'handi-biryani--masala-1729605352-.webp', NULL, NULL, 0, '2024-10-22 07:55:52', '2024-10-22 07:55:52'),
(49, '14', '8', 'Radhuni Biryani Masala', 'Radhuni Biryani Masala – 40g Pack for Authentic Biryani', 'radhuni-biryani-masala-40g-pack-for-authentic-biryani', 110, 'Enhance your biryani with Radhuni Biryani Masala, specially crafted to bring out the rich and authentic flavors of this beloved dish. This 40g pack contains a perfect blend of spices, ideal for marinating meat and cooking aromatic biryani. Experience the traditional taste of homemade biryani with ease, making it perfect for family gatherings or special occasions. Available for delivery in Bangladesh via Foodpanda, enjoy the convenience of bringing authentic flavor to your kitchen!', 'radhuni-biryani-masala-1729605506-.webp', NULL, NULL, 0, '2024-10-22 07:58:26', '2024-10-22 07:58:26'),
(50, '14', '6', 'Fresh Fortified Soybean Oil - 5 liters', 'Fresh Fortified Soybean Oil – Healthy Cooking Oil for Everyday Use', 'fresh-fortified-soybean-oil-healthy-cooking-oil-for-everyday-use-1729606317', 900, 'Choose Fresh Fortified Soybean Oil for your cooking needs, enriched with essential vitamins and nutrients for a healthier diet. This light and versatile oil is perfect for frying, sautéing, and baking, delivering a mild flavor that enhances your dishes without overpowering them. Rich in polyunsaturated fats, it supports heart health while providing a nutritious option for your family. Enjoy the freshness and quality of our fortified soybean oil in every meal!', 'fresh-fortified-soybean-oil---5litter-1729605657-.jpg', NULL, NULL, 3, '2024-10-22 08:00:58', '2024-10-23 08:16:17'),
(51, '14', '6', 'Teer Mustard 1 liter Oi', 'Teer Mustard 1 liter Oil – Pure and Aromatic Cooking Oil', 'teer-mustard-1-liter-oil-pure-and-aromatic-cooking-oil', 340, 'Experience the rich flavor of Teer Mustard Oil, made from the finest mustard seeds to deliver a pure and aromatic cooking oil. Ideal for frying, sautéing, and salad dressings, this oil adds a distinct taste to your dishes while providing essential nutrients. Known for its health benefits, Teer Mustard Oil is a great source of omega-3 fatty acids and antioxidants. Enhance your culinary creations with the bold flavor and quality of Teer Mustard Oil!', 'teer-mustard-1-litter-oi-1729605790-.webp', NULL, NULL, 2, '2024-10-22 08:03:10', '2024-10-28 12:27:33'),
(52, '14', '6', 'Mazola Corn Oil -2 liters', 'Mazola Corn Oil -2 liters – Pure and Light Cooking Oil', 'mazola-corn-oil-2-liters-pure-and-light-cooking-oil', 600, 'Discover the versatility of Mazola Corn Oil, a pure and light cooking oil perfect for all your culinary needs. Ideal for frying, baking, and sautéing, this oil has a mild flavor that enhances the taste of your dishes without overwhelming them. Rich in polyunsaturated fats and cholesterol-free, Mazola Corn Oil is a healthier choice for your family. Enjoy the high smoke point and quality of Mazola Corn Oil for delicious and nutritious meals!', 'mazola-corn-oil--2-litter-1729605972-.webp', NULL, NULL, 0, '2024-10-22 08:06:12', '2024-10-22 08:10:52'),
(53, '14', '6', 'Extra Virgin Olive Oil', 'Extra Virgin Olive Oil -500 ml – Premium Quality for Healthy Cooking', 'extra-virgin-olive-oil-500-ml-premium-quality-for-healthy-cooking', 800, 'ndulge in the rich flavor of our Extra Virgin Olive Oil, sourced from the finest olives to ensure premium quality. Perfect for dressings, marinades, sautéing, or drizzling over dishes, this oil adds a delightful taste and health benefits to your meals. Packed with antioxidants and healthy fats, it supports heart health and enhances your cooking experience. Elevate your culinary creations with the natural goodness of our Extra Virgin Olive Oil!', 'extra-virgin-olive-oil-1729606066-.jpg', NULL, NULL, 5, '2024-10-22 08:07:46', '2024-10-28 12:42:53'),
(54, '14', '6', 'Teer Fortified Oil – 5 Liters', 'Teer Fortified Oil – 5 Liters of Healthy Cooking Oil', 'teer-fortified-oil-5-liters-of-healthy-cooking-oil', 900, 'Choose Teer Fortified Oil for your cooking needs, offering a perfect blend of health and flavor. This 5-liter pack provides a versatile oil enriched with essential vitamins and nutrients, ideal for frying, sautéing, and baking. Its light texture and neutral flavor make it suitable for a variety of dishes, ensuring your meals are both delicious and nutritious. Enjoy the quality and freshness of Teer Fortified Oil for a healthier cooking experience!', 'teer-fortified-oil-–-5-liters-1729606208-.jpeg', NULL, NULL, 12, '2024-10-22 08:10:08', '2024-10-27 10:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(14, 15, 'Digital-Watch1728455176.png', '2024-10-09 00:26:16', '2024-10-09 00:26:16'),
(15, 15, 'Digital-Watch1728455176.webp', '2024-10-09 00:26:16', '2024-10-09 00:26:16'),
(21, 19, 'Suzuki-GSX-R-1729181158-.jpeg', '2024-10-17 10:05:58', '2024-10-17 10:05:58'),
(22, 28, 'iPhone-15-Pro-Max-1729182462-.webp', '2024-10-17 10:27:42', '2024-10-17 10:27:42'),
(23, 29, 'Top-and-Skirt-Set-1729183237-.jpg', '2024-10-17 10:40:37', '2024-10-17 10:40:37'),
(24, 28, 'iPhone-15-Pro-Max-1729241325-.webp', '2024-10-18 02:48:45', '2024-10-18 02:48:45'),
(25, 28, 'iPhone-15-Pro-Max-1729241325-.jpg', '2024-10-18 02:48:45', '2024-10-18 02:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'profile.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` bigint(20) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `discount`, `image`, `created_at`, `updated_at`) VALUES
(7, 'Bikes', 20, 'Bikes1728464086.webp', '2024-10-09 02:54:46', '2024-10-10 12:42:16'),
(8, 'Rolls Royels', 10, 'Rolls-Royels1728464143.jpg', '2024-10-09 02:55:43', '2024-10-09 02:55:43'),
(9, 'Digital Watch', 35, 'Digital-Watch1728464169.png', '2024-10-09 02:56:10', '2024-10-09 02:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(3, 13, 'Apple', 'Apple1729093029.png', 'apple', '2024-10-16 09:37:09', '2024-10-21 10:28:18'),
(4, 6, 'Drone', 'Drone1729093060.jpg', 'drone', '2024-10-16 09:37:40', '2024-10-21 10:26:38'),
(5, 12, 'Diamond', 'Diamond1729093125.jpg', 'diamond', '2024-10-16 09:38:45', '2024-10-21 10:27:35'),
(6, 14, 'Cooking Oil', 'Cooking-Oil1729183638.jpg', 'cooking-oil', '2024-10-16 09:39:19', '2024-10-21 10:27:07'),
(7, 11, 'Boys Formal Zone', 'Boys-Fasion1729093308.jpg', 'boys-formal-zone', '2024-10-16 09:41:48', '2024-10-21 10:26:13'),
(8, 14, 'Ingredients Store', 'Ingredients-Store1729183600.webp', 'ingredients-store', '2024-10-17 02:20:47', '2024-10-21 10:26:59'),
(9, 13, 'Google-Pixel', 'Google-Pixel1729154126.png', 'google-pixel', '2024-10-17 02:35:26', '2024-10-21 10:28:12'),
(10, 13, 'Xiaomi', 'Xiaomi1729154153.png', 'xiaomi', '2024-10-17 02:35:53', '2024-10-21 10:28:04'),
(11, 13, 'Samsung', 'Samsung-S24-ultra1729154209.webp', 'samsung-samsung', '2024-10-17 02:36:49', '2024-10-21 10:27:53'),
(12, 14, 'Vegetables', 'Vegetables1729183552.webp', 'vegetables', '2024-10-17 02:37:35', '2024-10-21 10:26:53'),
(13, 14, 'Meats', 'Meats1729183421.jpg', 'meats', '2024-10-17 02:37:53', '2024-10-21 10:26:46'),
(14, 13, 'Tablets', 'Tablets1729154439.jpg', 'tablets', '2024-10-17 02:40:39', '2024-10-21 10:27:41'),
(15, 15, 'Suzuki', 'Suzuki1729177391.png', 'suzuki', '2024-10-17 09:03:11', '2024-10-21 10:25:41'),
(16, 15, 'Yamaha', 'Yamaha1729177447.webp', 'yamaha', '2024-10-17 09:04:07', '2024-10-21 10:25:36'),
(17, 7, 'Rolls Royels', 'Rolls-Royels1729177482.jpg', 'rolls-royels', '2024-10-17 09:04:43', '2024-10-21 10:25:52'),
(18, 7, 'Audi', 'Audi1729177523.jpg', 'audi', '2024-10-17 09:05:23', '2024-10-21 10:25:48'),
(19, 7, 'BMW', 'BMW1729177558.webp', 'bmw', '2024-10-17 09:05:58', '2024-10-21 10:25:45'),
(20, 12, 'Gold', 'Gold1729178913.jpg', 'gold', '2024-10-17 09:28:33', '2024-10-21 10:27:24'),
(21, 12, 'Silver', 'Silver1729178949.jpeg', 'silver', '2024-10-17 09:29:09', '2024-10-21 10:27:18'),
(22, 12, 'Immitation', 'Immitation1729179035.webp', 'immitation', '2024-10-17 09:30:35', '2024-10-21 10:27:13'),
(23, 11, 'Boys Informal Zone', 'Boys-Informal-Zone1729179144.webp', 'boys-informal-zone-boys-informal-zone', '2024-10-17 09:32:24', '2024-10-21 10:26:09'),
(24, 11, 'Child Zone', 'Child-section1729179177.jpg', 'child-zone', '2024-10-17 09:32:57', '2024-10-21 10:25:58'),
(25, 11, 'Girls Zone', 'Girls-Zone1729179202.webp', 'girls-zone', '2024-10-17 09:33:22', '2024-10-21 10:25:55'),
(26, 6, 'Non smart Watch', 'Stylish-Watch1729179335.webp', 'non-smart-watch', '2024-10-17 09:35:35', '2024-10-21 10:26:31'),
(27, 6, 'Smart watch', 'Smart-watch1729179378.png', 'smart-watch', '2024-10-17 09:36:18', '2024-10-21 10:26:23'),
(28, 6, 'HeadPhones', 'HeadPhone1729179512.png', 'headphones', '2024-10-17 09:38:32', '2024-10-21 10:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'Mehedi Hasan', 'mehedihasan@gmail.com', 44, NULL, '$2y$12$VaAdFKcNHhB4lkD4JUqdNOhjfP7kJGhM630kpAoljzPtd0FAD0EJ6', NULL, '2024-10-29 15:15:40', '2024-10-29 15:15:40'),
(17, 'Mehedi Hasan', 'nayok@gmail.com', 1710038788, NULL, '$2y$12$ZVlDSTzbnAXYWhdWpRmxIuLp48xjADyWqunCceIx96Gkt.0LX93hi', NULL, '2024-10-29 15:30:15', '2024-10-29 15:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `product_id`, `views`, `created_at`, `updated_at`) VALUES
(1, '13', 1, '2024-10-18 00:35:34', '2024-10-18 00:35:34'),
(2, '28', 55, '2024-10-18 00:44:46', '2024-10-18 06:48:19'),
(3, '29', 3, '2024-10-18 00:44:54', '2024-10-18 06:01:00'),
(4, '21', 70, '2024-10-18 00:53:01', '2024-10-18 07:15:39'),
(5, '19', 34, '2024-10-18 00:54:19', '2024-10-18 07:14:17'),
(6, '25', 27, '2024-10-18 03:24:10', '2024-10-18 10:25:24'),
(7, '26', 97, '2024-10-18 03:28:59', '2024-10-18 07:47:07'),
(8, '24', 20, '2024-10-18 03:29:18', '2024-10-18 07:48:53'),
(9, '18', 43, '2024-10-18 03:29:23', '2024-10-18 07:14:23'),
(10, '17', 57, '2024-10-18 03:33:43', '2024-10-18 07:49:52'),
(11, '22', 11, '2024-10-18 03:34:53', '2024-10-18 07:25:49'),
(12, '23', 68, '2024-10-18 03:39:37', '2024-10-18 07:52:02'),
(13, '20', 37, '2024-10-18 03:39:45', '2024-10-18 07:07:43'),
(14, '27', 9, '2024-10-18 03:40:22', '2024-10-18 07:48:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover_pictures`
--
ALTER TABLE `cover_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
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
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cover_pictures`
--
ALTER TABLE `cover_pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
