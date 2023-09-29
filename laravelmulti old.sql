-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 01:47 PM
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
-- Database: `laravelmulti`
--

-- --------------------------------------------------------

--
-- Table structure for table `addleaves`
--

CREATE TABLE `addleaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `leave_days` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addleaves`
--

INSERT INTO `addleaves` (`id`, `leave_type`, `leave_days`, `created_at`, `updated_at`) VALUES
(1, 'Medical Leaves', 10, '2023-09-21 04:22:37', '2023-09-21 04:22:37'),
(2, 'Casual Leaves', 15, '2023-09-21 05:41:43', '2023-09-21 05:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `nic` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `image`, `dob`, `age`, `gender`, `nic`, `address`, `email`, `password`, `userType`, `created_at`, `updated_at`) VALUES
(1, 'Dilnuwan', 'Weerasuriya', '1695281668.jpg', '1999-04-27', 24, 'Male', '199911805399', 'Moratuwa', 'dila99@gmail.com', '$2y$10$hDQ9toBbVh0Irmqo6X4.xeYG4BaJPgK9TehX5ilIGnoJp.k1M34BW', '2', '2023-09-21 02:04:29', '2023-09-21 02:04:29'),
(2, 'Dilusha', 'Senevirathna', '1695281799.jpg', '1998-09-07', 25, 'Male', '199853456636', 'Kandy', 'dilusha@gmail.com', '$2y$10$n3rjwBxmE2v9AanzUqznm.HxKSU0krkwg7eGMrX1znqvTWPQkBji.', '2', '2023-09-21 02:06:39', '2023-09-21 02:06:39'),
(3, 'Bashitha', 'Fernando', '1695295159.jpg', '1999-10-23', 23, 'Male', '19992980512', 'Moratuwa', 'bashi@gmail.com', '$2y$10$S100yibF6XhKPRw.dzc59OjYC0esmNqM2SEvxlJ33xi7RfmULqE6a', '2', '2023-09-21 05:49:19', '2023-09-21 05:49:19'),
(4, 'Sunil', 'Perera', '1695296283.jpg', '1955-10-12', 67, 'Male', '19553512121266', 'Moratuwa', 'sunil@gmail.com', '$2y$10$apSNIqRjb/KcE5BbdphzUuZ.KsucnRnv7U7zNsvxeHlicgVzRkuGm', '2', '2023-09-21 06:08:03', '2023-09-21 06:08:03'),
(5, 'Lasith', 'Malinga', '1695296572.jpg', '1986-10-10', 36, 'Male', '19865242666956', 'Colombo', 'lasith@gmail.com', '$2y$10$ZpNJiu/E5JpTspG7k4k./u8Nsby5LjnQAvpSBPxaO7IOs5gedLjzO', '2', '2023-09-21 06:12:52', '2023-09-21 06:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_21_070528_create_employees_table', 2),
(7, '2023_09_21_094330_create_addleaves_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '0', 'Dilnuwan Weerasuriya', 'dila@gmail.com', 2, NULL, '$2y$10$5XRVkbL7CHU7ObzuOBQNteplhcD/0DjkvwXsXjN8TTon2wF4G.OKy', NULL, '2023-09-20 22:57:42', '2023-09-20 22:57:42'),
(2, '0', 'Admin', 'admin@gmail.com', 1, NULL, '$2y$10$AMXni9/dTW6k0gI5LyMQaOBTQ/NSpzbd3F9Y1ZT.XTBKToVPIwGNC', NULL, '2023-09-20 22:58:10', '2023-09-20 22:58:10'),
(3, '0', 'Dilusha', 'dilusha@gmail.com', 2, NULL, '$2y$10$YY26UtZDSXsZ7c3aTkVFseGBPan7j01r7twytR6Ai/6LsAsGKFdh6', NULL, '2023-09-21 02:06:40', '2023-09-21 02:06:40'),
(4, '0', 'Bashitha', 'bashi@gmail.com', 2, NULL, '$2y$10$bRJaWo7lkk9/DHu8ZO/r1.NVpUhXtizZs8NmrE9cQwR5s0uK9JWZq', NULL, '2023-09-21 05:49:19', '2023-09-21 05:49:19'),
(5, '1695296283.jpg', 'Sunil', 'sunil@gmail.com', 2, NULL, '$2y$10$1elai0hzNQWrtJFlkJ/Pnuav26yeNdX6EqDdIrXYdG3nHyxBE2zJq', NULL, '2023-09-21 06:08:03', '2023-09-21 06:08:03'),
(6, '1695296572.jpg', 'Lasith', 'lasith@gmail.com', 2, NULL, '$2y$10$0FzSgpD0Qkyyg0h6kuJ4ROrcqWF00sDwLUSY0uAeLatzLZRbtwHOS', NULL, '2023-09-21 06:12:52', '2023-09-21 06:12:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addleaves`
--
ALTER TABLE `addleaves`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `addleaves_leave_type_unique` (`leave_type`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `addleaves`
--
ALTER TABLE `addleaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
