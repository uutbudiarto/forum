-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 01:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `urgency` varchar(128) NOT NULL,
  `ann_title` text NOT NULL,
  `ann_date` int(11) NOT NULL,
  `time_created` varchar(128) NOT NULL,
  `created_at` varchar(128) NOT NULL,
  `updated_at` varchar(128) NOT NULL,
  `deleted_at` varchar(128) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment_reports`
--

CREATE TABLE `comment_reports` (
  `id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `report_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `like_indicator` int(11) NOT NULL,
  `time_created` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `deleted_at` varchar(100) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_reports`
--

INSERT INTO `comment_reports` (`id`, `comment_text`, `report_id`, `user_id`, `role_id`, `like_indicator`, `time_created`, `created_at`, `updated_at`, `deleted_at`, `is_active`) VALUES
(41, 'Test Balasan pertama dari user level 1', 24, 10, 1, 5, '1592763011', '2020-06-22', '2020-06-22', NULL, 1),
(42, 'Balasan dari user level 3 yang punya laporan', 24, 12, 3, 5, '1592763045', '2020-06-22', '2020-06-22', NULL, 1),
(43, 'Ini Balasan atau komentar dari user level 2 ke yang pertama', 24, 11, 2, 5, '1592763119', '2020-06-22', '2020-06-22', NULL, 1),
(44, 'Coba balas dan cek apakah user lain bisa melihat', 24, 10, 1, 5, '1592763246', '2020-06-22', '2020-06-22', NULL, 1),
(45, 'Dan sepertinya tidak wkwkwk', 24, 10, 1, 5, '1592763258', '2020-06-22', '2020-06-22', NULL, 1),
(46, 'kalau gitu suruh tunggu lampu biru', 25, 10, 1, 5, '1592794570', '2020-06-22', '2020-06-22', NULL, 1),
(47, 'Yah ok pak ..siap ', 25, 12, 3, 5, '1592794657', '2020-06-22', '2020-06-22', NULL, 1),
(48, 'ok ok', 25, 10, 1, 5, '1592794734', '2020-06-22', '2020-06-22', NULL, 1),
(49, 'TESTSES', 25, 10, 1, 5, '1592795145', '2020-06-22', '2020-06-22', NULL, 1),
(50, 'Tapi utk Rencana lampunya jadi di pasang Pak ?', 25, 12, 3, 5, '1592795178', '2020-06-22', '2020-06-22', NULL, 1),
(51, 'Tes tes ', 25, 12, 3, 5, '1592795802', '2020-06-22', '2020-06-22', NULL, 1),
(52, '', 25, 12, 3, 5, '1592795859', '2020-06-22', '2020-06-22', NULL, 1),
(53, 'Ini dari admin2', 26, 11, 2, 5, '1592796152', '2020-06-22', '2020-06-22', NULL, 1),
(54, 'ok', 26, 10, 1, 5, '1592796162', '2020-06-22', '2020-06-22', NULL, 1),
(55, 'Ini admin 2', 25, 11, 2, 5, '1592796287', '2020-06-22', '2020-06-22', NULL, 1),
(56, 'ffsdfsdfsdfdsf', 27, 10, 1, 5, '1592796642', '2020-06-22', '2020-06-22', NULL, 1),
(57, 'Okokkokkvzgzg', 27, 11, 2, 5, '1592796655', '2020-06-22', '2020-06-22', NULL, 1),
(58, 'Test komentar lagi', 27, 10, 1, 5, '1592801024', '2020-06-22', '2020-06-22', NULL, 1),
(59, 'jhcxzjkcxzh', 27, 10, 1, 5, '1592801215', '2020-06-22', '2020-06-22', NULL, 1),
(60, 'Balasan 1', 28, 10, 1, 5, '1592807390', '2020-06-22', '2020-06-22', NULL, 1),
(61, 'Balasan dari user', 28, 12, 3, 5, '1592808252', '2020-06-22', '2020-06-22', NULL, 1),
(62, 'Tak balas dulu', 28, 12, 3, 5, '1592809366', '2020-06-22', '2020-06-22', NULL, 1),
(63, 'ok indikator diuser hilang di owner tambah', 28, 10, 1, 5, '1592809431', '2020-06-22', '2020-06-22', NULL, 1),
(64, 'hjhjhj', 29, 10, 1, 5, '1592825029', '2020-06-22', '2020-06-22', NULL, 1),
(65, 'Ysgsgwvhshdb', 29, 12, 3, 5, '1592825040', '2020-06-22', '2020-06-22', NULL, 1),
(66, 'Hallooo shsgsush', 29, 12, 3, 5, '1592825073', '2020-06-22', '2020-06-22', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_title` varchar(128) NOT NULL,
  `menu_name` varchar(128) NOT NULL,
  `menu_url` varchar(128) NOT NULL,
  `menu_icon` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_title`, `menu_name`, `menu_url`, `menu_icon`, `role_id`, `is_active`) VALUES
(1, 'Home', 'home', 'home', 'home.png', 3, 1),
(2, 'Report', 'report', 'report', 'report.png', 1, 1),
(3, 'Employee', 'employee', 'employee', 'employee.png', 3, 1),
(4, 'Profile', 'profile', 'profile', 'profile.png', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position_name` varchar(128) NOT NULL,
  `indicator` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `position_name`, `indicator`, `is_active`) VALUES
(1, 'Owner', 5, 1),
(2, 'Manager', 4, 1),
(3, 'Asisten Manager', 3, 1),
(4, 'Model', 2, 1),
(5, 'Admin', 3, 1),
(6, 'Manager Keuangan', 4, 1),
(7, 'HR Manager', 4, 1),
(8, 'Gudang', 2, 1),
(9, 'IT / Programmer', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `readed_status`
--

CREATE TABLE `readed_status` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `is_read` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `report_text` text NOT NULL,
  `report_image` varchar(128) NOT NULL,
  `report_file` varchar(128) NOT NULL,
  `time_created` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `deleted_at` varchar(100) DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `is_owner_readed` int(11) NOT NULL,
  `is_manager_readed` int(11) NOT NULL,
  `count_comment` int(11) NOT NULL,
  `count_comment_manager` int(11) NOT NULL,
  `count_comment_owner` int(11) NOT NULL,
  `count_comment_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `report_text`, `report_image`, `report_file`, `time_created`, `created_at`, `updated_at`, `deleted_at`, `is_active`, `is_owner_readed`, `is_manager_readed`, `count_comment`, `count_comment_manager`, `count_comment_owner`, `count_comment_user`) VALUES
(24, 12, 'Test buat laporan dari user level 3 ke 1. Ini laporan pertama yang d buat', 'default.png', 'default.txt', '1592762944', '2020-06-22', '2020-06-22', NULL, 1, 1, 1, 5, 0, 0, 0),
(25, 12, 'Saya mau buat laporan tentang kejadian di lampu merah ..ada orang nyebrang sembarangan ehh ..katanya gak pakae celana dalam .', 'default.png', 'default.txt', '1592794294', '2020-06-22', '2020-06-22', NULL, 1, 1, 1, 8, 0, 0, 0),
(26, 13, 'Laporan laporan lampu kuning', 'default.png', 'default.txt', '1592794489', '2020-06-22', '2020-06-22', NULL, 1, 1, 1, 2, 0, 0, 0),
(27, 11, 'Laporan dari admin dua', 'default.png', 'default.txt', '1592796467', '2020-06-22', '2020-06-22', NULL, 1, 1, 1, 4, 0, 0, 0),
(28, 12, 'Halloooooooo report', 'default.png', 'default.txt', '1592806787', '2020-06-22', '2020-06-22', NULL, 1, 1, 0, 4, 4, 0, 0),
(29, 12, 'Laporan test', 'default.png', 'default.txt', '1592825010', '2020-06-22', '2020-06-22', NULL, 1, 1, 0, 3, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `position_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `deleted_at` varchar(100) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `password`, `fullname`, `image`, `position_id`, `role_id`, `date_created`, `created_at`, `updated_at`, `deleted_at`, `is_active`) VALUES
(10, 'userlevel1@gmail.com', '089688008088', '$2y$10$K/K2LWJXb/FDQ2F2RE5rAu4IpiRrc3gmipies.4hu6WRjh6HO9mOi', 'Jhon Doe user level 1', 'donatur-1.png', 1, 1, '2020/06/22', '1592762423', '1592762423', NULL, 1),
(11, 'userlevel2@gmail.com', '089677007070', '$2y$10$EhueK67BIOAWsQ5xKYhruu2m7KEsvdpyR7fCg9OeUPaMZP619lRIm', 'Abraham userlevel2', 'default.png', 2, 2, '2020/06/22', '1592762559', '1592762559', NULL, 1),
(12, 'userlevel3-1@gmail.com', '089666006060', '$2y$10$8zvpuCtQeEdI3rI3VngO5Oc.5zog/lYfR0KbI.3jgj8Z4GAnxSqXe', 'Joni Gunawan userlevel3ke1', 'IMG_20200427_182619.jpg', 3, 3, '2020/06/22', '1592762659', '1592762659', NULL, 1),
(13, 'userlevel3-2@gmail.com', '089655005050', '$2y$10$LXZo/OUHhTCVzM3gmEPO4Or7BaAX39.ZAdQB.0sRpo2Gj77rvPxk.', 'Wijayanto userlevel3ke2', 'donatur-21.png', 9, 3, '2020/06/22', '1592762760', '1592762760', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_reports`
--
ALTER TABLE `comment_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `readed_status`
--
ALTER TABLE `readed_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_reports`
--
ALTER TABLE `comment_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `readed_status`
--
ALTER TABLE `readed_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
