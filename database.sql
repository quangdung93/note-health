-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2020 at 12:42 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `note`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `note_id` int(10) UNSIGNED NOT NULL,
  `indices_id` int(10) UNSIGNED NOT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `note_id`, `indices_id`, `value`, `created_at`, `updated_at`) VALUES
(137, 47, 1, 50, NULL, '2019-05-28 02:28:44'),
(138, 47, 2, 59, NULL, '2019-05-28 02:28:44'),
(139, 47, 3, 34, NULL, '2019-05-28 02:28:44'),
(140, 47, 4, 32, NULL, '2019-05-28 02:28:44'),
(141, 47, 5, 56, NULL, '2019-05-28 02:28:44'),
(142, 47, 6, 35, NULL, '2019-05-28 02:28:44'),
(143, 47, 7, 31, NULL, '2019-05-28 02:28:44'),
(144, 48, 1, 53, NULL, NULL),
(145, 48, 2, 45, NULL, NULL),
(146, 48, 3, 12, NULL, NULL),
(147, 48, 4, 25, NULL, NULL),
(148, 48, 5, 41, NULL, NULL),
(149, 48, 6, 25, NULL, NULL),
(150, 48, 7, 16, NULL, NULL),
(151, 49, 1, 54, NULL, NULL),
(152, 49, 2, 40, NULL, NULL),
(153, 49, 3, 10, NULL, NULL),
(154, 49, 4, 24, NULL, NULL),
(155, 49, 5, 40, NULL, NULL),
(156, 49, 6, 25, NULL, NULL),
(157, 49, 7, 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `indices`
--

CREATE TABLE `indices` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `unit` char(255) DEFAULT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indices`
--

INSERT INTO `indices` (`id`, `name`, `unit`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Cân Nặng', 'Kg', '', NULL, NULL),
(2, 'Đường huyết', 'mmol/l', '', NULL, NULL),
(3, 'Huyết áp', NULL, '', NULL, '2019-05-28 02:52:08'),
(4, 'Mỡ máu', NULL, '', NULL, NULL),
(5, 'Chức năng gan', NULL, '', NULL, NULL),
(6, 'Chức năng thận', NULL, '', NULL, NULL),
(7, 'Chỉ số khác', NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `thang_id` int(11) UNSIGNED DEFAULT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `thang_id`, `note`, `created_at`, `updated_at`) VALUES
(47, 1, 4, 'Ghi chú nè', '2019-05-27 03:37:01', '2019-05-27 03:37:01'),
(48, 1, 5, 'Ghi chú tháng 4', '2019-05-27 03:43:11', '2019-05-27 03:43:11'),
(49, 1, 6, 'Tháng 6', '2019-05-28 02:02:09', '2019-05-28 02:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `thang`
--

CREATE TABLE `thang` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` char(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thang`
--

INSERT INTO `thang` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tháng 1', NULL, NULL),
(2, 'Tháng 2', NULL, NULL),
(3, 'Tháng 3', NULL, NULL),
(4, 'Tháng 4', NULL, NULL),
(5, 'Tháng 5', NULL, NULL),
(6, 'Tháng 6', NULL, NULL),
(7, 'Tháng 7', NULL, NULL),
(8, 'Tháng 8', NULL, NULL),
(9, 'Tháng 9', NULL, NULL),
(10, 'Tháng 10', NULL, NULL),
(11, 'Tháng 11', NULL, NULL),
(12, 'Tháng 12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cậu 10', '0913834829', 'cau10@gmail.com', NULL, '$2y$10$oWQFIhwFr1uaz/CNZEQR0euazzaehu/kpBGI9SnD1dLQvQpQ9zcj6', 'Ry3qNWA7ED', '2019-05-24 03:23:31', '2019-05-24 03:23:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_note_id_foreign` (`note_id`),
  ADD KEY `detail_indices_id_foreign` (`indices_id`);

--
-- Indexes for table `indices`
--
ALTER TABLE `indices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_users` (`user_id`),
  ADD KEY `notes_thang` (`thang_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `thang`
--
ALTER TABLE `thang`
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
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `indices`
--
ALTER TABLE `indices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `thang`
--
ALTER TABLE `thang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_indices_id_foreign` FOREIGN KEY (`indices_id`) REFERENCES `indices` (`id`),
  ADD CONSTRAINT `detail_note_id_foreign` FOREIGN KEY (`note_id`) REFERENCES `notes` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_thang` FOREIGN KEY (`thang_id`) REFERENCES `thang` (`id`),
  ADD CONSTRAINT `notes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
