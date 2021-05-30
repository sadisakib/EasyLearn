-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 11:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easylearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `age`, `address`, `gender`, `phone`, `profileimage`, `created_at`, `updated_at`) VALUES
(1, 'easylearn@gmail.com', '20', 'rajbari, dhaka, bangladesh', 'Male', '01731610244', 'adminImages/1621858294.jpeg', NULL, '2021-05-24 06:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overview` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` tinyint(1) NOT NULL DEFAULT 0,
  `preview` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `banner`, `category`, `owner`, `overview`, `price`, `status`, `course`, `preview`, `created_at`, `updated_at`) VALUES
(6, 'Web Application', 'courseImages/1622215320.gif', 7, 'trainer@gmail.com', 'ppppppppppppppppppp', 6000, 'Accepted', 0, 'ooooooooooooo', '2021-05-28 08:37:23', '2021-05-28 11:13:54'),
(8, 'Pc Application', 'courseImages/1622221839.gif', 5, 'trainer@gmail.com', 'ytjtyjht', 12000, 'Pending', 0, 'htyjhtyjtyj', '2021-05-28 11:10:39', '2021-05-28 11:11:03'),
(9, 'php Crash Course', 'courseImages/1622221913.gif', 5, 'trainer@gmail.com', 'efwf', 2000, 'Pending', 0, 'efwefwef', '2021-05-28 11:11:53', '2021-05-28 11:11:53'),
(10, 'Android App', 'courseImages/1622227296.gif', 6, 'trainer2@gmail.com', 'awdadawda', 2000, 'Pending', 0, 'dadawd', '2021-05-28 12:41:36', '2021-05-28 12:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'Php', '2021-05-24 05:18:21', '2021-05-24 05:18:33'),
(6, 'java', '2021-05-28 05:27:39', '2021-05-28 05:27:39'),
(7, 'C#', '2021-05-28 07:26:56', '2021-05-28 07:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learners`
--

CREATE TABLE `learners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profileimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learners`
--

INSERT INTO `learners` (`id`, `profileimage`, `email`, `age`, `address`, `gender`, `phone`, `created_at`, `updated_at`) VALUES
(2, 'learnerImages/1622230644.png', 'learner@gmail.com', '25', 'rajbari', 'Male', '01731610244', '2021-04-15 13:15:29', '2021-05-28 13:37:24'),
(3, NULL, 'boplpb@gmail.com', NULL, NULL, NULL, NULL, '2021-04-18 07:18:06', '2021-04-18 07:18:06'),
(4, NULL, 'learner2@gmail.com', NULL, NULL, NULL, NULL, '2021-04-28 13:49:58', '2021-04-28 13:49:58');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_05_165927_create_admins_table', 1),
(5, '2021_03_20_190241_create_trainers_table', 1),
(6, '2021_03_20_202007_create_learners_table', 1),
(7, '2021_04_15_181533_create_course_categories_table', 1),
(12, '2021_04_15_182624_create_courses_table', 2),
(14, '2021_05_28_190313_create_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `learner_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trainer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trainer_bkash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learner_bkash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `learner_email`, `trainer_email`, `course`, `price`, `trainer_bkash`, `learner_bkash`, `transaction_id`, `payment`, `created_at`, `updated_at`) VALUES
(2, 'learner@gmail.com', 'trainer@gmail.com', 9, '2000', '+02731610244', '12133135', 'ukyukuyk', 'Approved', '2021-05-28 13:55:09', '2021-05-28 15:36:56'),
(4, 'learner@gmail.com', 'trainer@gmail.com', 8, '12000', '+02731610244', '21364854', 'fghfdhgfh', 'Approved', '2021-05-28 13:59:27', '2021-05-28 13:59:27'),
(5, 'learner@gmail.com', 'trainer2@gmail.com', 10, '2000', '0755566584', '56465465465', 'dffh6516541r61h651', 'Approved', '2021-05-28 14:07:29', '2021-05-28 15:11:31'),
(6, 'learner2@gmail.com', 'trainer@gmail.com', 6, '6000', '+02731610244', '21123454545', 'hjkjkuyhk', 'Pending', '2021-05-28 14:31:14', '2021-05-28 14:31:14');

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
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `email`, `age`, `address`, `phone`, `gender`, `profileimage`, `n_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'trainer@gmail.com', '20', 'Bozeman, Montana, Usa', '+02731610244', 'Male', 'trainerImages/1618514275.jpeg', 'trainerImages/TrainerID/1618514296.jpeg', 'Approved', '2021-04-15 13:05:26', '2021-04-15 13:18:16'),
(2, 'trainer2@gmail.com', '30', 'Mirpur DOHS', '0755566584', 'Female', 'trainerImages/1618518341.png', 'trainerImages/TrainerID/1618518123.png', 'Approved', '2021-04-15 14:21:22', '2021-04-15 14:25:41'),
(3, 'trainer3@gmail.com', '45', 'Rajbari', '354651321', 'Female', 'trainerImages/1618519106.png', 'trainerImages/TrainerID/1618519469.png', 'Reject', '2021-04-15 14:37:43', '2021-04-15 14:44:29'),
(4, 'trainer4@gmail.com', NULL, NULL, NULL, 'Male', NULL, 'trainerImages/TrainerID/1618534306.jpeg', 'Reject', '2021-04-15 17:00:43', '2021-04-15 18:51:47');

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
  `brance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `trainer` tinyint(1) NOT NULL DEFAULT 0,
  `account` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `brance`, `admin`, `trainer`, `account`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'easylearn@gmail.com', NULL, '$2y$10$i6alMYkNU9kSM9VwMxLGXeoEavaYL3v9Z8edPNQUHPBBIlxxVbrGO', NULL, 1, 0, 0, NULL, '2021-04-15 13:03:33', '2021-04-15 13:03:33'),
(2, 'Trainer', 'trainer@gmail.com', NULL, '$2y$10$t4k8B6TsHBI2SvJaL1W.oORS72MrbW4z/nos/7/GujSldGa/T2j1e', NULL, 0, 1, 1, NULL, '2021-04-15 13:05:26', '2021-04-15 13:05:26'),
(3, 'SkyFars', 'learner@gmail.com', NULL, '$2y$10$4LBwPUYLok7Qi6GlpXgsk.kUsSNPtiEIq3z7u2BZZ9L6SmvcHjeWu', NULL, 0, 0, 0, NULL, '2021-04-15 13:15:29', '2021-04-15 13:15:29'),
(4, 'trainer2', 'trainer2@gmail.com', NULL, '$2y$10$oQS3ZaK3uY9Ok4SebQ0s0OKvhxka068figZIWDDIscy1g8gLZoSlS', NULL, 0, 1, 0, NULL, '2021-04-15 14:21:22', '2021-04-15 14:21:22'),
(5, 'Akash', 'trainer3@gmail.com', NULL, '$2y$10$TTsiYGCoLbEt2ABj68.0FuPCAYsDiD/gJZMjwCzr5R9bxHHDDbfvi', NULL, 0, 1, 0, NULL, '2021-04-15 14:37:43', '2021-04-15 14:37:43'),
(6, 'Trainer4', 'trainer4@gmail.com', NULL, '$2y$10$uo7BQuTWvZAty1bQLHZjYOfnW6J/H4oPFjdkD2IdmpjiPrw6pohTK', NULL, 0, 1, 0, NULL, '2021-04-15 17:00:43', '2021-04-15 17:00:43'),
(7, 'Biplob', 'boplpb@gmail.com', NULL, '$2y$10$aWWPJYvuLFIjaUA3Gd1Ah.dOaND0kzgKQA.UPoj65NK4WVw32mFdm', NULL, 0, 0, 0, NULL, '2021-04-18 07:18:06', '2021-04-18 07:18:06'),
(8, 'learner2', 'learner2@gmail.com', NULL, '$2y$10$Z3k29hJhNCyPW9FDEtYo9OlNrgsJfMx7./6n8gU1f/D9qHnCaXKs6', NULL, 0, 0, 0, NULL, '2021-04-28 13:49:57', '2021-04-28 13:49:57');

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
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_foreign` (`category`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learners`
--
ALTER TABLE `learners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `learners_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_course_foreign` (`course`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trainers_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learners`
--
ALTER TABLE `learners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_foreign` FOREIGN KEY (`category`) REFERENCES `course_categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_course_foreign` FOREIGN KEY (`course`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
