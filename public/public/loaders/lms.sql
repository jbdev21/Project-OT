-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 10:20 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `contact_number`, `type`, `gender`, `dob`, `message`, `image`, `email`, `password`, `team_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jofie Bernas', '+4693470423105', 'administrator', 'Female', '1969-08-29', NULL, NULL, 'bernaswebdevelopment@gmail.com', '$2y$10$4KWL27vADYDI6/hkFRsDXeE/nYhOI5AqMqj6NriovaGT7pIFx5a0u', NULL, 'ApurapRPaP9ilbh73IldrbVPY5bLNuLtmaFrWo02iOoO4Cucnpx3suagKvtb', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(2, 'Seamus Pfeffer', '+5435696089708', 'teacher', 'Female', '1945-01-21', NULL, NULL, 'tvonrueden@example.net', '$2y$10$7iZhDBFYxMZFz1S/gCAsAuxMa.WScenrXNvViqINyO6Bs5jn0ZD8m', NULL, '7z5gausKvr870aamrSX0HSH3K83QqtVYA7oAsJC4aV3O9R3CTfafQf4qVUmb', '2018-01-14 21:21:34', '2018-02-22 02:28:13', NULL),
(3, 'Luisa Baumbach DDS', '+1129942601020', 'teacher', 'Male', '2001-10-15', NULL, NULL, 'makayla.purdy@example.net', '$2y$10$nDTQzdcbOhP/7phyt06hhutRI1ruHW3kOuzT963XOTwnWz6/DMSyW', NULL, NULL, '2018-01-14 21:21:34', '2018-03-12 23:16:33', NULL),
(4, 'Dr. Francisco Sporer', '+1254686813857', 'teacher', 'Female', '1976-08-03', NULL, NULL, 'libby.daniel@example.org', '$2y$10$1HU3T1XWy1NGiknzytjjbOXalogUBBpF6RQDM7QyB/ong6yz1Wf6y', NULL, NULL, '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(5, 'Jofie Bernas', '+6603362046147', 'teacher', 'Female', '1966-02-23', NULL, NULL, 'leo.hammes@example.net', '$2y$10$YqddSiC4FvG2g2nRPWHbVOpoPuoBSgb58MY8H3yQP7m6aQIkecA.O', NULL, NULL, '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(6, 'Carlee Reinger', '+8438036279328', 'teacher', 'Female', '1927-05-16', NULL, NULL, 'sherman.kulas@example.net', '$2y$10$fX0bBJcel9YrPOcz19KpG.P7RfDYIr7ekfTVDhE36MX/hCZqZHxcG', NULL, NULL, '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(8, 'Orlando Eichmann', '+6464080184814', 'teacher', 'Female', '1959-04-15', NULL, NULL, 'perry02@example.net', '$2y$10$37Lr9Ncs3IKfYQ.5nnm7POMKwQEwH1FdWny7ivTiS.N9O5VKu6E5O', NULL, NULL, '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(9, 'Miss Eunice Jacobson', '+1411055470631', 'teacher', 'Male', '2017-09-04', NULL, NULL, 'mitchell.billy@example.org', '$2y$10$z4Jf.9OQ5jR0ED4XK7mIgOGVbhxLl5yJW1Eq/SGMt9o90uLKOihj2', NULL, NULL, '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(10, 'Dr. Dejuan Pfannerstill', '+9321111926092', 'teacher', 'Female', '1938-04-12', NULL, NULL, 'angelina48@example.org', '$2y$10$ntUbtynHKZdN58qF3XM/ce7HkrVu/sDxT5EpgrYVAdnRmHyWbMHPK', NULL, NULL, '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_code` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_pages` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `location`, `page_code`, `starting`, `type`, `number_of_pages`, `available`, `created_at`, `updated_at`) VALUES
(2, 'Book 1', 'http://ontalkeb.cafe24.com/ebook/cv_ltg1', 'cv_ltg1_', '2', 'jpg', 52, 1, '2018-01-30 20:51:34', '2018-01-30 20:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `book_pages`
--

CREATE TABLE `book_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `page_number` int(10) UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_pages`
--

INSERT INTO `book_pages` (`id`, `book_id`, `page_number`, `url`, `created_at`, `updated_at`) VALUES
(20, 2, 1, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_002.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(21, 2, 2, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_003.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(22, 2, 3, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_004.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(23, 2, 4, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_005.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(24, 2, 5, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_006.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(25, 2, 6, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_007.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(26, 2, 7, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_008.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(27, 2, 8, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_009.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(28, 2, 9, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_010.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(29, 2, 10, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_011.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(30, 2, 11, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_012.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(31, 2, 12, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_013.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(32, 2, 13, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_014.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(33, 2, 14, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_015.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(34, 2, 15, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_016.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(35, 2, 16, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_017.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(36, 2, 17, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_018.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(37, 2, 18, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_019.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(38, 2, 19, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_020.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(39, 2, 20, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_021.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(40, 2, 21, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_022.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(41, 2, 22, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_023.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(42, 2, 23, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_024.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(43, 2, 24, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_025.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(44, 2, 25, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_026.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(45, 2, 26, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_027.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(46, 2, 27, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_028.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(47, 2, 28, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_029.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(48, 2, 29, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_030.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(49, 2, 30, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_031.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(50, 2, 31, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_032.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(51, 2, 32, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_033.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(52, 2, 33, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_034.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(53, 2, 34, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_035.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(54, 2, 35, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_036.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(55, 2, 36, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_037.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(56, 2, 37, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_038.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(57, 2, 38, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_039.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(58, 2, 39, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_040.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(59, 2, 40, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_041.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(60, 2, 41, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_042.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(61, 2, 42, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_043.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(62, 2, 43, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_044.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(63, 2, 44, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_045.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(64, 2, 45, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_046.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(65, 2, 46, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_047.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(66, 2, 47, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_048.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(67, 2, 48, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_049.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(68, 2, 49, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_050.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(69, 2, 50, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_051.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(70, 2, 51, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_052.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34'),
(71, 2, 52, 'http://ontalkeb.cafe24.com/ebook/cv_ltg1/cv_ltg1_053.jpg', '2018-01-30 20:51:34', '2018-01-30 20:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `classers`
--

CREATE TABLE `classers` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_code` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total_sessions` int(10) UNSIGNED NOT NULL,
  `minutes` int(10) UNSIGNED NOT NULL,
  `days_in_week` int(11) NOT NULL,
  `num_months` int(11) NOT NULL,
  `postponed_credits` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `time` time NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_price` int(11) NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `date_of_payment` date DEFAULT NULL,
  `payor_name` text COLLATE utf8mb4_unicode_ci,
  `book_id` int(11) DEFAULT NULL,
  `page` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classers`
--

INSERT INTO `classers` (`id`, `class_code`, `course_id`, `type`, `user_id`, `total_sessions`, `minutes`, `days_in_week`, `num_months`, `postponed_credits`, `start_date`, `time`, `admin_id`, `status`, `payment_method`, `payment_price`, `payment_status`, `date_of_payment`, `payor_name`, `book_id`, `page`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1520926692', 6, 'Video Class', 2, 60, 40, 5, 3, 5, '2018-03-19', '10:00:00', 2, 'ongoing', 'bank', 45000, 'unpaid', '2018-03-14', 'SAmple Payor', NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classer_day`
--

CREATE TABLE `classer_day` (
  `id` int(10) UNSIGNED NOT NULL,
  `classer_id` int(10) UNSIGNED NOT NULL,
  `day_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classer_day`
--

INSERT INTO `classer_day` (`id`, `classer_id`, `day_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_sessions`
--

CREATE TABLE `class_sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `classer_id` int(10) UNSIGNED NOT NULL,
  `date_time` datetime NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postponed_deduction` int(11) DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `postponed_timestamp` timestamp NULL DEFAULT NULL,
  `postponed_apply` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `admin_id` int(11) DEFAULT NULL,
  `comprehesion` int(11) DEFAULT NULL,
  `pronounciation` int(11) DEFAULT NULL,
  `fluency` int(11) DEFAULT NULL,
  `vocabulary` int(11) DEFAULT NULL,
  `grammar` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_sessions`
--

INSERT INTO `class_sessions` (`id`, `classer_id`, `date_time`, `status`, `postponed_deduction`, `reason`, `postponed_timestamp`, `postponed_apply`, `comment`, `admin_id`, `comprehesion`, `pronounciation`, `fluency`, `vocabulary`, `grammar`, `sub_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2018-03-19 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(2, 1, '2018-03-20 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(3, 1, '2018-03-21 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(4, 1, '2018-03-22 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(5, 1, '2018-03-23 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(6, 1, '2018-03-26 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(7, 1, '2018-03-27 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(8, 1, '2018-03-28 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(9, 1, '2018-03-29 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(10, 1, '2018-03-30 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(11, 1, '2018-04-02 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(12, 1, '2018-04-03 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(13, 1, '2018-04-04 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(14, 1, '2018-04-05 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(15, 1, '2018-04-06 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(16, 1, '2018-04-09 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(17, 1, '2018-04-10 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(18, 1, '2018-04-11 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(19, 1, '2018-04-12 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(20, 1, '2018-04-13 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(21, 1, '2018-04-16 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(22, 1, '2018-04-17 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(23, 1, '2018-04-18 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(24, 1, '2018-04-19 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(25, 1, '2018-04-20 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(26, 1, '2018-04-23 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(27, 1, '2018-04-24 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(28, 1, '2018-04-25 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(29, 1, '2018-04-26 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(30, 1, '2018-04-27 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(31, 1, '2018-04-30 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(32, 1, '2018-05-02 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(33, 1, '2018-05-03 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(34, 1, '2018-05-04 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(35, 1, '2018-05-07 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(36, 1, '2018-05-09 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(37, 1, '2018-05-10 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(38, 1, '2018-05-11 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(39, 1, '2018-05-14 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(40, 1, '2018-05-15 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(41, 1, '2018-05-16 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(42, 1, '2018-05-17 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(43, 1, '2018-05-18 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(44, 1, '2018-05-21 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(45, 1, '2018-05-22 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(46, 1, '2018-05-23 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(47, 1, '2018-05-24 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(48, 1, '2018-05-25 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(49, 1, '2018-05-28 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(50, 1, '2018-05-29 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(51, 1, '2018-05-30 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(52, 1, '2018-05-31 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(53, 1, '2018-06-01 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(54, 1, '2018-06-04 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(55, 1, '2018-06-05 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(56, 1, '2018-06-06 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(57, 1, '2018-06-07 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(58, 1, '2018-06-08 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(59, 1, '2018-06-11 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL),
(60, 1, '2018-06-12 10:00:00', 'ready', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 23:38:12', '2018-03-12 23:38:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_type_id` int(10) UNSIGNED NOT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days_in_week` int(11) NOT NULL,
  `minutes` int(11) DEFAULT NULL,
  `postponed_credit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `three_percent` int(11) NOT NULL,
  `three_price` int(11) NOT NULL,
  `six_percent` int(11) NOT NULL,
  `six_price` int(11) NOT NULL,
  `twelve_percent` int(11) NOT NULL,
  `twelve_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_type_id`, `course_code`, `days_in_week`, `minutes`, `postponed_credit`, `price`, `available`, `three_percent`, `three_price`, `six_percent`, `six_price`, `twelve_percent`, `twelve_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '', 4, 10, 8, 30000, 1, 0, 0, 0, 0, 0, 0, '2018-01-14 16:40:58', '2018-01-30 17:01:27', NULL),
(2, 1, '', 1, 10, 5, 20000, 1, 0, 0, 0, 0, 0, 0, '2018-01-30 13:50:48', '2018-01-30 14:08:38', NULL),
(3, 1, 'VC1021', 2, 10, 5, 25000, 1, 0, 0, 0, 0, 0, 0, '2018-01-30 13:52:39', '2018-01-30 14:08:46', NULL),
(4, 1, 'VC2032', 3, 20, 12, 25000, 1, 0, 0, 0, 0, 0, 0, '2018-01-30 14:12:20', '2018-01-30 14:12:25', NULL),
(5, 1, 'VC3032', 3, 30, 6, 30000, 1, 10, 27000, 15, 25500, 30, 21000, '2018-02-01 12:08:42', '2018-03-13 00:46:37', NULL),
(6, 1, 'WPC4051', 5, 40, 5, 50000, 1, 10, 45000, 15, 42500, 30, 35000, '2018-02-01 12:10:17', '2018-03-07 19:34:28', NULL),
(7, 1, 'VC202', 2, 20, 4, 10000, 1, 10, 9000, 20, 8000, 15, 8500, '2018-03-13 01:22:17', '2018-03-13 01:22:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_day`
--

CREATE TABLE `course_day` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `day_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_day`
--

INSERT INTO `course_day` (`id`, `course_id`, `day_id`, `created_at`, `updated_at`) VALUES
(1, 6, 1, NULL, NULL),
(2, 6, 2, NULL, NULL),
(3, 6, 3, NULL, NULL),
(4, 6, 4, NULL, NULL),
(5, 6, 5, NULL, NULL),
(6, 5, 1, NULL, NULL),
(7, 5, 2, NULL, NULL),
(8, 5, 3, NULL, NULL),
(9, 5, 4, NULL, NULL),
(10, 5, 5, NULL, NULL),
(11, 7, 1, NULL, NULL),
(12, 7, 2, NULL, NULL),
(13, 7, 3, NULL, NULL),
(14, 7, 4, NULL, NULL),
(15, 7, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_types`
--

CREATE TABLE `course_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_types`
--

INSERT INTO `course_types` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Video Class', 'sample', '2018-01-15 00:39:06', '2018-01-15 00:39:06', NULL),
(2, 'Phone Classs', 'sage', '2018-01-15 00:39:13', '2018-01-15 00:39:13', NULL),
(3, 'Weekend Video Class', 'fwefwe', '2018-01-29 18:44:43', '2018-01-29 18:44:43', NULL),
(4, 'Weekend Phone Class', 'wef wef', '2018-01-29 18:44:48', '2018-01-29 18:44:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(10) UNSIGNED NOT NULL,
  `day_number` int(11) NOT NULL,
  `day_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day_number`, `day_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Monday', NULL, NULL, NULL),
(2, 2, 'Tuesday', NULL, NULL, NULL),
(3, 3, 'Wednesday', NULL, NULL, NULL),
(4, 4, 'Thursday', NULL, NULL, NULL),
(5, 5, 'Friday', NULL, NULL, NULL),
(6, 6, 'Saturday', NULL, NULL, NULL),
(7, 7, 'Sunday', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `holiday_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_life_time` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `holiday_name`, `date`, `description`, `is_life_time`, `created_at`, `updated_at`) VALUES
(2, 'Sample Holiay', '2018-05-08', 'Sample', 1, '2018-01-18 20:15:02', '2018-01-18 20:15:02'),
(3, 'Holiday2', '2018-05-01', 'fwe fwef', 1, '2018-01-18 20:23:52', '2018-01-18 20:23:52'),
(4, 'fwef wef', '2018-01-26', 'wewef', 0, '2018-01-24 22:57:50', '2018-01-24 22:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `level_tests`
--

CREATE TABLE `level_tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT '0',
  `rate` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_tests`
--

INSERT INTO `level_tests` (`id`, `admin_id`, `user_id`, `type`, `date_time`, `is_done`, `rate`, `comment`, `created_at`, `updated_at`) VALUES
(1, 5, 51, 'Voice', '2018-01-25 01:30:00', 0, NULL, NULL, '2018-01-14 22:55:18', '2018-01-15 03:22:24');

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
(3, '2017_12_29_070019_create_admins_table', 1),
(4, '2017_12_29_080340_create_admin_password_resets_table', 1),
(5, '2018_01_03_071355_create_books_table', 1),
(6, '2018_01_03_071609_create_classers_table', 1),
(7, '2018_01_03_071624_create_notices_table', 1),
(8, '2018_01_03_072701_create_book_pages_table', 1),
(9, '2018_01_03_072723_create_notes_table', 1),
(10, '2018_01_03_072738_create_course_types_table', 1),
(11, '2018_01_03_072751_create_class_sessions_table', 1),
(12, '2018_01_03_072752_create_mistakes_table', 1),
(13, '2018_01_03_072802_create_days_table', 1),
(14, '2018_01_03_072815_create_classer_day_table', 1),
(15, '2018_01_04_093124_create_courses_table', 1),
(16, '2018_01_04_093700_create_course_day_table', 1),
(17, '2018_01_05_065108_create_holidays_table', 1),
(18, '2018_01_15_035359_create_level_tests_table', 1),
(20, '2018_01_19_061908_create_settings_table', 1),
(21, '2018_02_13_041444_create_notifications_table', 2),
(22, '2018_02_20_024322_create_teams_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mistakes`
--

CREATE TABLE `mistakes` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_session_id` int(10) UNSIGNED NOT NULL,
  `mistake_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `admin_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tgiewe wfwe wef', '2018-02-06 20:27:24', '2018-02-06 20:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `admin_id`, `title`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mr.', 'Voluptatibus in eius quo aut rerum commodi. Ipsa non impedit libero autem quisquam enim. Quisquam dolor iusto cum nesciunt iusto. Maiores maiores dolor quia id.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(2, 1, 'Mr.', 'Sit provident voluptatem ullam exercitationem blanditiis repellendus magnam. Enim voluptatem ea aut dolor sunt. Porro quis accusamus unde sunt ea. Sequi eum voluptatem pariatur suscipit.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(3, 1, 'Ms.', 'Error ea dolorem neque quidem commodi. Distinctio et optio iusto.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(4, 1, 'Mr.', 'Quo labore perferendis ut. Minus vel earum quia ut. Blanditiis quaerat tempora explicabo neque et voluptates blanditiis. Repellendus tempora et unde voluptas sed maxime.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(5, 1, 'Ms.', 'Dolor quo consequatur ipsa perspiciatis. Sint ex reprehenderit autem rem. Facere quo harum iure architecto itaque aut unde.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(7, 1, 'Dr.', 'Maiores laudantium eum fuga. Quae dolor magni eum quis quia animi. Rem in sint nesciunt aspernatur consectetur neque.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(8, 1, 'Dr.', 'Sed ut quisquam a eligendi. Dignissimos id corrupti fugit. Itaque dolore quo officiis totam delectus occaecati eaque. Numquam laboriosam et minus eius.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(9, 1, 'Dr.', 'Omnis quo quasi minus quia. Odio vitae quia incidunt voluptatem eius temporibus. Voluptate voluptas quidem itaque magnam delectus voluptatem.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(10, 1, 'Prof.', 'Magni commodi vitae perspiciatis rem enim sunt ut qui. Quas aut ut eos quaerat deleniti in aut. Impedit id autem eius omnis possimus ut earum rerum.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(11, 1, 'Dr.', 'Sed quae quasi qui minus rerum. Maxime voluptas reprehenderit quia aut. Quis id non qui sed consequatur impedit. Laborum voluptatem qui id soluta et dolorum dignissimos.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(12, 1, 'Mrs.', 'Laudantium est ipsam praesentium ratione labore. Velit voluptas quidem impedit deserunt nisi quidem iste. Enim et adipisci omnis illum.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(13, 1, 'Mr.', 'Sed voluptatem rerum nostrum labore. Aliquid dolorem illo et quo minus. Eius sit quam eos beatae. Eligendi quaerat quam laudantium. Aut veritatis autem et quas molestiae inventore.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(14, 1, 'Prof.', 'Quia et mollitia dolorem in dolor. Explicabo quia ratione cum eaque numquam ad. Tempore ut illo est quis qui dolorem odit dolore.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(15, 1, 'Dr.', 'Et alias in in veritatis nobis doloremque. Totam aliquid doloremque temporibus. Ut delectus libero quis vero enim soluta voluptate.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(16, 1, 'Dr.', 'Saepe autem amet aut occaecati consequatur ea excepturi est. Odio ipsa iste omnis recusandae sit atque. Id magni ut est distinctio expedita atque et.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(17, 1, 'Mrs.', 'Consequuntur maxime sit libero repellendus molestiae ut. Provident rem aut necessitatibus. Ut a mollitia at vero doloribus.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(18, 1, 'Mrs.', 'Doloremque ea autem voluptatibus est ullam omnis. Nostrum aperiam soluta expedita mollitia. Qui similique doloribus alias dolor nemo aperiam. Alias provident ipsam voluptatum voluptatem.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(19, 1, 'Prof.', 'Velit nam quasi consequatur qui quisquam dolore consequatur. Ipsa placeat esse ducimus eaque saepe atque odio. Itaque accusamus hic aperiam eum.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(20, 1, 'Dr.', 'Vel doloribus saepe et. Perferendis neque eos minus vero pariatur. Id et aut autem non et deserunt ut. Expedita quibusdam quasi ut eaque dolores. Qui delectus incidunt ex quae beatae debitis ab.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(21, 1, 'Dr.', 'Sequi sed ut quo sit expedita error nobis qui. Distinctio et doloribus doloremque recusandae adipisci a. Nihil fugit nihil recusandae accusantium ut nihil necessitatibus.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(22, 1, 'Prof.', 'Modi dolor possimus aut ab sed dolor. Eos error consequatur voluptatem eaque sint. Non et architecto enim nostrum repellat.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(23, 1, 'Prof.', 'Dolor labore aliquid beatae cupiditate. Iusto est ratione alias dolorum harum voluptate. Amet in ad possimus maxime corporis aliquam et.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(24, 1, 'Mr.', 'Facere aspernatur asperiores dolor aspernatur eveniet ut error. Quia rem aut ut sit.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(25, 1, 'Dr.', 'Voluptatem ut veniam sed earum. Consequatur fuga voluptatum enim quia repellendus. Impedit voluptatem recusandae rerum. Laboriosam dolores aut autem natus. Quae sint hic et blanditiis tempora velit.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(26, 1, 'Miss', 'Eaque non quos necessitatibus corporis. Saepe eos officiis similique eveniet. Rerum nobis et ducimus suscipit quis quaerat recusandae. Veritatis accusantium voluptates qui cum quae non repellendus.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(27, 1, 'Mrs.', 'Quaerat error ut id ea dolorem sed. Quod consequatur assumenda omnis eos.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(28, 1, 'Dr.', 'Quia nulla odio sit. Eaque enim est rem assumenda harum est. Tempore rem distinctio sit est iste molestiae accusamus. Et in sint qui nisi fuga quae.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(29, 1, 'Dr.', 'Perspiciatis et nemo debitis aut non iste. Qui fuga tempora ab mollitia nesciunt ipsum.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(30, 1, 'Prof.', 'Non voluptatem incidunt error id est. Consequuntur tenetur sed vel quia doloremque ratione fugit. Molestias excepturi alias dolorem laboriosam.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(31, 1, 'Prof.', 'Voluptas quos quia non voluptatem aut error natus. Error placeat quibusdam veritatis hic totam at et. Aspernatur odit iste perferendis accusamus enim ut rerum. Minus non ducimus delectus facere.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(32, 1, 'Mr.', 'A fugit dolorum eaque ratione blanditiis rerum. Architecto et placeat quia sed. Ut nemo distinctio molestias ad. Dolores sed aut dolorum. Pariatur dolore reiciendis esse ea blanditiis.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(33, 1, 'Mr.', 'Deserunt aut sit totam error sed ducimus minima. Corporis odio autem sit reiciendis placeat ea quia. Recusandae sunt omnis ipsum ut aut similique non. Suscipit eos dolorem et culpa.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(34, 1, 'Miss', 'Occaecati ullam quasi animi aliquam qui. Veritatis quidem officiis excepturi vero. Placeat placeat dolores est esse excepturi qui.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(35, 1, 'Prof.', 'Quas qui sunt est. Non laboriosam expedita et dolorem. Tempora aut numquam architecto quo aspernatur autem deserunt. Pariatur facilis soluta nulla maxime.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(36, 1, 'Mr.', 'Molestiae aut saepe quia ut. Labore sint quia cupiditate. Dolore modi nisi labore. Qui accusantium quis sit dolorem.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(37, 1, 'Prof.', 'Veniam facilis dolorum accusamus cupiditate natus. Molestiae laudantium ex odio repellat molestiae aliquam totam. Dolores repellendus excepturi nobis molestiae architecto.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(38, 1, 'Prof.', 'Nobis voluptatem doloremque doloremque laborum. Veniam quas inventore aspernatur vero voluptates molestias. Odit alias debitis illum tempore unde. Et adipisci perspiciatis sapiente totam dolorem.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(39, 1, 'Mrs.', 'Iure incidunt eius autem nam expedita. Reprehenderit mollitia facilis amet quis at. Voluptatem aut adipisci iure commodi et est quisquam.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(40, 1, 'Miss', 'Qui beatae id et occaecati. Vel soluta commodi ratione quis necessitatibus accusantium sit rerum. In sed aperiam qui nostrum quam. Eveniet nobis alias sapiente accusamus sit officiis.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(41, 1, 'Prof.', 'Numquam voluptatum perferendis quis sed tempore sint in porro. Libero sit magni rem veniam dolorum illum pariatur. Aspernatur laborum voluptas et quaerat.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(42, 1, 'Dr.', 'Quo quis quos sed necessitatibus illo aut quaerat sit. Molestias dolores cumque consequatur illum. Repellat rerum in sunt quis. Earum et et mollitia at nihil culpa incidunt.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(43, 1, 'Miss', 'Consequatur qui neque fugiat architecto libero nisi quia. Id aliquam expedita deserunt beatae minima beatae officia qui. Incidunt aut modi neque itaque incidunt amet.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(44, 1, 'Prof.', 'Quia dicta accusamus dolor. Harum reprehenderit placeat id dignissimos maxime dolores magni. Voluptates ut nihil quibusdam voluptatibus nobis et ab.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(45, 1, 'Prof.', 'Repellat et odit natus dolorum officiis quam et corporis. Voluptatem et maiores voluptatem reprehenderit voluptas. Aliquid rem dolorem fuga deserunt. Modi fugit quasi unde illum.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(46, 1, 'Mrs.', 'Blanditiis aut sunt excepturi nihil est. Et eum iusto ea aut a soluta. Ducimus nostrum asperiores corrupti aspernatur consequatur dolorem.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(47, 1, 'Mr.', 'Atque neque sit molestiae. Accusantium doloremque quaerat dignissimos sunt eum est inventore aut. Tempore molestiae et voluptas odio aspernatur.', '2018-01-14 21:21:34', '2018-01-14 21:21:34'),
(48, 1, 'Mrs.', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/lms/public/photos/shares/20161202132248_edi6nv.JPG\" alt=\"\" width=\"366\" height=\"206\" /></p>\r\n<p>Possimus aspernatur officiis quia cupiditate tempora nulla. Omnis deserunt temporibus iste doloribus ab. Eius illum quae illum corporis aut aut minus.</p>', '2018-01-14 21:21:34', '2018-03-12 01:24:32'),
(49, 1, 'First wef', '<p>Eveniet dolores omnis id ratione delectus aliquam aut ut. Doloribus excepturi minus omnis non velit libero porro. Aut ut consectetur quos debitis enim.</p>', '2018-01-14 21:21:34', '2018-02-08 02:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('09ea485a-8776-40a2-806a-365dd008f756', 'App\\Notifications\\StudentEnrolled', 1, 'App\\Admin', '{\"user_id\":2,\"korean_name\":\"Dominic Powlowski\"}', NULL, '2018-03-07 20:42:39', '2018-03-07 20:42:39'),
('0a0a16b8-0de2-4915-aa7d-1d9d78026297', 'App\\Notifications\\StudentEnrolled', 1, 'App\\Admin', '{\"user_id\":2,\"name\":\"Dominic Powlowski\"}', NULL, '2018-02-13 02:54:00', '2018-02-13 02:54:00'),
('15101dee-6129-4690-afaa-4881b0e09475', 'App\\Notifications\\StudentEnrolled', 1, 'App\\Admin', '{\"user_id\":2,\"name\":\"Dominic Powlowski\"}', NULL, '2018-02-13 02:57:00', '2018-02-13 02:57:00'),
('9db67429-c7cc-4b05-8dca-959cf6e5f2ef', 'App\\Notifications\\StudentEnrolled', 1, 'App\\Admin', '{\"user_id\":1,\"korean_name\":\"Lucienne Dickens\"}', NULL, '2018-03-02 02:38:36', '2018-03-02 02:38:36');

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'string',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `val`, `type`, `created_at`, `updated_at`) VALUES
(1, 'date_format', 'd-m-Y', 'string', '2018-01-29 03:37:29', NULL),
(2, 'datetime_format', 'm/d/Y h:iA', 'string', '2018-01-29 03:37:29', NULL),
(3, 'app_name', 'LMS1', 'string', '2018-01-28 19:37:32', '2018-01-28 19:39:02'),
(4, 'email', 'bernaswebdevelopment@gmail.com', 'string', '2018-01-28 19:37:32', '2018-01-28 19:37:32'),
(5, 'site_title', 'Sunday2pm', 'string', '2018-01-28 21:20:47', '2018-01-28 21:53:17'),
(6, 'site_email_address', 'Y-m-d', 'string', '2018-01-28 21:20:47', '2018-01-28 21:54:28'),
(7, 'site_email_support', 'bernaswebdevelopment@gmail.com', 'string', '2018-01-28 21:20:47', '2018-01-28 21:20:47'),
(8, 'phone', '917153132', 'string', '2018-01-28 21:20:47', '2018-01-28 21:53:09'),
(9, 'date_time_format', 'Y-m-d h:iA', 'string', '2018-01-28 21:48:25', '2018-01-31 20:04:31'),
(10, 'admin_timezone', 'US/Pacific', 'string', '2018-01-28 21:48:25', '2018-01-28 21:54:28'),
(11, 'teacher_timezone', 'US/Pacific', 'string', '2018-01-28 21:48:25', '2018-01-28 21:54:28'),
(12, 'student_timezone', 'Europe/Minsk', 'string', '2018-01-28 21:48:25', '2018-01-28 21:54:28'),
(13, 'phone_two', '1576551', 'string', '2018-01-28 21:53:09', '2018-01-28 21:53:09'),
(14, 'time_format', 'h:iA', 'string', '2018-01-28 22:25:49', '2018-01-28 22:25:49'),
(15, 'default_payment_gateway', 'paypal', 'string', '2018-02-01 23:03:19', '2018-02-04 19:54:39'),
(16, 'bank_name', 'Bank of the Philippine Island', 'string', '2018-02-01 23:03:19', '2018-02-01 23:15:41'),
(17, 'bank_account_number', '4324-2342', 'string', '2018-02-01 23:03:19', '2018-02-01 23:03:19'),
(18, 'bank_account_holder_name', 'Jofie Bernas', 'string', '2018-02-01 23:03:19', '2018-02-01 23:03:19'),
(19, 'nicepay_merchant_key', 'Q5IF79jI3S+86a8VhQRVJLvcC52VEqyFiwmbRKF5cOw4mc9KryysOoqtzZXQOrv/HKbYLoY4zYK9UWMhI4mdRQ==', 'string', '2018-02-01 23:04:06', '2018-02-05 00:44:02'),
(20, 'nicepay_merchant_id', 'APG011319m', 'string', '2018-02-01 23:04:06', '2018-02-05 00:51:53'),
(21, 'paypal_url', NULL, 'string', '2018-02-01 23:04:06', '2018-02-01 23:04:06'),
(22, 'paypal_api_key', NULL, 'string', '2018-02-01 23:04:06', '2018-02-01 23:04:06'),
(23, 'paypal_api_password', NULL, 'string', '2018-02-01 23:04:06', '2018-02-01 23:04:06'),
(24, 'videoware_url', 'http://asp11.saehacns.com:13211/Urllink/default_utf8.asp', 'string', '2018-02-02 01:48:37', '2018-02-02 01:48:37'),
(25, 'videoware_student_code', '0', 'string', '2018-02-02 01:48:37', '2018-02-02 01:48:37'),
(26, 'videoware_teacher_code', '1', 'string', '2018-02-02 01:48:37', '2018-02-02 01:48:37'),
(27, 'videoware_observer_code', '2', 'string', '2018-02-02 01:48:37', '2018-02-02 01:48:37'),
(28, 'admin_to_notify', '1', 'string', '2018-02-13 05:37:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Team Joana', NULL, NULL),
(2, 'Team Rosa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `korean_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number1` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_leveltest` tinyint(1) NOT NULL DEFAULT '0',
  `image` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `korean_name`, `contact_number`, `contact_number1`, `dob`, `gender`, `remarks`, `email`, `password`, `is_leveltest`, `image`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lucienne Dickens', '조화를 통한', '837.652.7447', NULL, '1957-01-23', 'female', NULL, 'hauck.jordi@bogan.info', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, '08asjcZ7hdCAySejpOfRaUzz8kMT8AgFtUWq7Z7Cgx9Ui4ZFiOyAtSCqhM0Q', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(2, 'Dominic Powlowski', '관한 규제와', '+1 (856) 977-6096', NULL, '1957-08-23', 'Male', NULL, 'cora.okuneva@zemlak.com', '$2y$10$68xoJoDs97pDyfzdgCGTReJBiaZrf3jOu79/AFK3l9xCAEuPgIxr.', 0, NULL, '11U0P6k78H1qzSTi7cb6weciWdtjAkvGwxfEo2ruWcJjx575pdpRjmZEuOlU', '2018-01-14 21:21:34', '2018-03-07 19:12:42', NULL),
(3, 'Quinten Lehner', '중임할 수 없다', '463-240-5860', NULL, '1945-02-18', 'male', NULL, 'qbarrows@dicki.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'SQtQCZiGgG', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(4, 'Rozella Johnson', '조화를 통한', '1-450-654-6462', NULL, '1978-06-03', 'male', NULL, 'brendan.balistreri@yahoo.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'CZ2wFZ2dA9', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(5, 'Katlyn Altenwerth', '경제의 민주화를', '583.970.2548 x6843', NULL, '1940-10-15', 'female', NULL, 'lang.litzy@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'OV4gN0A95Q', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(6, 'Camille Quitzon II', '민사상이나', '(412) 340-5626 x585', NULL, '1952-07-17', 'female', NULL, 'xlabadie@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'M5yVS6jR2y', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(7, 'Myrtice Lowe', '조화를 통한', '1-816-540-4821', NULL, '1986-04-26', 'female', NULL, 'missouri86@stanton.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'yb5sQCDfP6', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(8, 'Bonita Casper', '업의 자조조직을', '(608) 858-3073 x20642', NULL, '1987-10-27', 'female', NULL, 'wstark@anderson.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'EPcrBZiIUscic7a3VWnOCyPiHuhfHbNAyHMVhwUp8DX3sjy2bdP5twUt0sCq', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(9, 'Prof. Katharina Mertz DDS', ' 위하여 경제에', '385.639.1055 x243', NULL, '1998-04-25', 'male', NULL, 'hwalsh@hotmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, '8uSEALukpW', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(10, 'Tyrique Gutmann', '아니한다', '689.755.5578', NULL, '1981-12-16', 'female', NULL, 'yhagenes@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'PkSoXYBMRa', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(11, 'Dr. Fatima Murphy III', '조화를 통한', '987.253.5940', NULL, '2002-05-29', 'female', NULL, 'braxton.berge@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'Xra7D8XVWe', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(12, 'Zakary Renner', '아니한다', '+12615406762', NULL, '1974-10-30', 'female', NULL, 'kaleigh.maggio@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'tmRROPDsHv', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(13, 'Ottis Sanford', '조정을 할 수', '1-416-532-1513', NULL, '2015-11-04', 'female', NULL, 'vincenza92@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'XA9aI8d9Jz', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(14, 'Quentin Cummerata', '민사상이나', '+1 (575) 223-0605', NULL, '1927-01-10', 'male', NULL, 'clifton.reinger@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'PfJmbrNfQq', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(15, 'Dr. Rosalind Thiel', '아니한다', '+1 (204) 857-5620', NULL, '1942-02-10', 'female', NULL, 'wellington77@green.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'dm2o9EWpwl', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(16, 'Ms. Minerva Douglas III', '경제주체간의', '(852) 810-9508 x375', NULL, '1940-02-09', 'female', NULL, 'nader.derek@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'H7Yl01O1eu', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(17, 'Mr. Mikel Nolan MD', '이에 의하여', '1-271-822-7961 x7436', NULL, '1963-04-01', 'female', NULL, 'jamie.mann@williamson.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'FSAb30oUCb', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(18, 'Mr. Clemens Eichmann DDS', '민사상이나', '1-664-351-5004 x65402', NULL, '1938-03-10', 'female', NULL, 'psenger@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'VUGhEeJIp3', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(19, 'Dr. Magnolia Gutkowski', '아니한다', '218-808-6530', NULL, '1965-05-19', 'female', NULL, 'korey91@hermann.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'Q0d3ATiOVT', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(20, 'Miss Megane Ruecker', '이에 의하여', '+1-770-405-1684', NULL, '1934-07-15', 'female', NULL, 'lottie.braun@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'J490w3xYWp', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(21, 'Velda Bechtelar', '업의 자조조직을', '710-755-0093 x15501', NULL, '2007-10-31', 'male', NULL, 'herman.estel@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'NMvQ3f4577', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(22, 'Jovanny Treutel IV', ' 위하여 경제에', '889-818-9021 x98395', NULL, '1940-11-25', 'female', NULL, 'muriel32@yahoo.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, '4SKX0HSDfk', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(23, 'Anjali Hagenes', '아니한다', '1-234-617-5533 x79752', NULL, '1985-01-07', 'female', NULL, 'turner06@hotmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, '6ILck8nXSi', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(24, 'Gilberto Gerlach DDS', '중임할 수 없다', '450.498.7577 x244', NULL, '2008-07-22', 'male', NULL, 'halle.hickle@schoen.biz', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'LU3af7DB9M', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(25, 'Prof. Vida Eichmann', '중임할 수 없다', '(654) 585-4930 x680', NULL, '1951-09-22', 'male', NULL, 'olson.mitchel@christiansen.info', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'qJTQhGvMWc', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(26, 'Scotty Cremin', '중임할 수 없다', '+1 (837) 396-0789', NULL, '1967-04-25', 'female', NULL, 'tatum17@hotmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'cBGr4Axa8l', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(27, 'Mrs. Maria Conn', '아니한다', '(462) 939-8867 x438', NULL, '1933-02-04', 'male', NULL, 'patricia.herzog@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'mgEQ6o7GHz', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(28, 'Prof. Domenic Eichmann', '형사상의 책임이', '274.459.7238', NULL, '1974-01-11', 'female', NULL, 'boyle.dane@yahoo.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'cBAKRii3PO', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(29, 'Brielle Moore', '경제주체간의', '710.555.0190', NULL, '1969-08-15', 'male', NULL, 'betsy57@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'JebyLoiHjo', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(30, 'Chase Cronin', '이에 의하여', '+19598290678', NULL, '1995-12-01', 'female', NULL, 'liza.hackett@kuvalis.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'lPFY7CoV8B', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(31, 'Ms. Mathilde Medhurst III', '조화를 통한', '(437) 573-1260', NULL, '1945-06-16', 'male', NULL, 'deckow.natalia@will.info', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'q5Lt17ZSKf', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(32, 'Alene Kovacek', ' 위하여 경제에', '517.749.7823 x85036', NULL, '1924-10-30', 'male', NULL, 'upton.kavon@hotmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'XawlAiCMWy', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(33, 'Natalia Funk Jr.', '민사상이나', '+1-765-328-2666', NULL, '2016-07-09', 'male', NULL, 'edmond.kuhic@bode.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'Whxss2my5P', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(34, 'Declan Barrows', '경제주체간의', '1-295-783-4170 x8854', NULL, '1996-08-15', 'male', NULL, 'jovany.lebsack@kuhlman.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'Ks5u0B7TnV', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(35, 'Arnulfo Roob', ' 위하여 경제에', '1-652-203-5380 x36685', NULL, '1962-02-17', 'female', NULL, 'mateo.keebler@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'tqVEe71qQa', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(36, 'Durward Sporer', '중임할 수 없다', '415.713.5397 x0360', NULL, '1957-02-26', 'male', NULL, 'efeil@hotmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'srXziP12b6', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(37, 'Dr. Zion Kassulke I', '이에 의하여', '+14802284574', NULL, '2017-09-18', 'female', NULL, 'windler.zakary@dickinson.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'zj7NfoBuIO', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(38, 'Sarai Upton', '조화를 통한', '467.541.2315 x1597', NULL, '1931-09-07', 'male', NULL, 'bartell.lue@mills.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, '22cqN4zu9S', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(39, 'Prof. Zoie Wisozk', '업의 자조조직을', '+1.664.703.8930', NULL, '1940-01-02', 'male', NULL, 'turner.malachi@yahoo.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'aq9YdxXHBK', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(40, 'Emie Hills', '면제되지는', '474-297-2295 x575', NULL, '1943-04-04', 'male', NULL, 'joy07@williamson.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'aUg7lWNmhR', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(41, 'Mr. Nathen Robel I', '민사상이나', '516.264.7531 x51216', NULL, '2009-08-12', 'male', NULL, 'ratke.raheem@lynch.biz', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'osrtJRY0Fa', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(44, 'Everett Hodkiewicz II', '중임할 수 없다', '1-281-427-5989', NULL, '1946-12-10', 'male', NULL, 'schinner.celestino@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'TCu87BDRjr', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(45, 'Mr. Lorenz Heller', ' 위하여 경제에', '+1.740.863.0060', NULL, '1986-05-03', 'male', NULL, 'ethyl.streich@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, '8UlMiFym4B', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(46, 'Kade Borer', '민사상이나', '228-788-7666', NULL, '1922-12-19', 'female', NULL, 'tatyana.schmeler@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, '9SApfr84V5', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(47, 'Asia Swift', '업의 자조조직을', '(542) 414-1509 x0905', NULL, '2013-07-24', 'female', NULL, 'oceane.harris@yahoo.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'qhkog4oqUp', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(48, 'Prof. Emmet Flatley', '아니한다', '876.844.9542 x5816', NULL, '1919-01-28', 'female', NULL, 'rex.cronin@boyle.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, '5NqfBDNowO', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(49, 'Terry Kovacek', '아니한다', '460.670.2947', NULL, '2001-07-27', 'female', NULL, 'dare.ian@homenick.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'oAJ3fvzH9x', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(50, 'Jeffry Botsford', '형사상의 책임이', '607.348.2520 x880', NULL, '1935-07-10', 'female', NULL, 'connelly.alisha@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, NULL, 'ENhCLNL99d', '2018-01-14 21:21:34', '2018-01-14 21:21:34', NULL),
(51, 'Angel', '년으로 하며', '+634323313', NULL, '1995-05-31', 'Female', NULL, 'angel@gmail.com', '$2y$10$KGEdNOqDEt4qLCGykOVv/.yifryrtqMgQPa4l0UT9KpCZ.kxOdlum', 1, NULL, NULL, '2018-01-14 22:06:30', '2018-01-14 22:06:30', NULL);

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
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_pages`
--
ALTER TABLE `book_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_pages_book_id_foreign` (`book_id`);

--
-- Indexes for table `classers`
--
ALTER TABLE `classers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classer_day`
--
ALTER TABLE `classer_day`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classer_day_classer_id_foreign` (`classer_id`);

--
-- Indexes for table `class_sessions`
--
ALTER TABLE `class_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_coursetype_id_foreign` (`course_type_id`);

--
-- Indexes for table `course_day`
--
ALTER TABLE `course_day`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_day_course_id_foreign` (`course_id`),
  ADD KEY `course_day_day_id_foreign` (`day_id`);

--
-- Indexes for table `course_types`
--
ALTER TABLE `course_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_tests`
--
ALTER TABLE `level_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_tests_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mistakes`
--
ALTER TABLE `mistakes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mistakes_class_session_id_foreign` (`class_session_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_key_index` (`name`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_contact_number_unique` (`contact_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `book_pages`
--
ALTER TABLE `book_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `classers`
--
ALTER TABLE `classers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `classer_day`
--
ALTER TABLE `classer_day`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `class_sessions`
--
ALTER TABLE `class_sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `course_day`
--
ALTER TABLE `course_day`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `course_types`
--
ALTER TABLE `course_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `level_tests`
--
ALTER TABLE `level_tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `mistakes`
--
ALTER TABLE `mistakes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_pages`
--
ALTER TABLE `book_pages`
  ADD CONSTRAINT `book_pages_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `classer_day`
--
ALTER TABLE `classer_day`
  ADD CONSTRAINT `classer_day_classer_id_foreign` FOREIGN KEY (`classer_id`) REFERENCES `classers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_coursetype_id_foreign` FOREIGN KEY (`course_type_id`) REFERENCES `course_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_day`
--
ALTER TABLE `course_day`
  ADD CONSTRAINT `course_day_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_day_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `level_tests`
--
ALTER TABLE `level_tests`
  ADD CONSTRAINT `level_tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mistakes`
--
ALTER TABLE `mistakes`
  ADD CONSTRAINT `mistakes_class_session_id_foreign` FOREIGN KEY (`class_session_id`) REFERENCES `class_sessions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
