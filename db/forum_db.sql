-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 10:32 AM
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
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `chat_root_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chat_text` text NOT NULL,
  `time_created` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `deleted_at` varchar(100) NOT NULL,
  `is_readed` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `chat_root_id`, `user_id`, `chat_text`, `time_created`, `created_at`, `updated_at`, `deleted_at`, `is_readed`, `is_active`) VALUES
(18, 11, 26, 'halloo mas nadim', '1593195001', '2020-06-27', '2020-06-27', '', 0, 1),
(19, 11, 28, 'O iya hallo pak', '1593195015', '2020-06-27', '2020-06-27', '', 0, 1),
(20, 11, 28, 'Bisa dibantu pak', '1593195025', '2020-06-27', '2020-06-27', '', 0, 1),
(21, 11, 26, 'ooo  enggak tes doang, kabar jos kan', '1593195047', '2020-06-27', '2020-06-27', '', 0, 1),
(22, 11, 28, 'Ooo jos pak', '1593195053', '2020-06-27', '2020-06-27', '', 0, 1),
(23, 14, 25, 'test', '1593491811', '2020-06-30', '2020-06-30', '', 0, 1),
(24, 14, 25, 'hitung 1', '1593492892', '2020-06-30', '2020-06-30', '', 0, 1),
(25, 15, 25, 'test hitung 1', '1593492957', '2020-06-30', '2020-06-30', '', 0, 1),
(26, 14, 25, 'hitung 2', '1593493212', '2020-06-30', '2020-06-30', '', 0, 1),
(27, 14, 27, 'hitung jawab 1', '1593495280', '2020-06-30', '2020-06-30', '', 0, 1),
(28, 14, 25, 'test1', '1593495315', '2020-06-30', '2020-06-30', '', 0, 1),
(29, 14, 27, 'jawab 2', '1593495348', '2020-06-30', '2020-06-30', '', 0, 1),
(30, 11, 26, 'test1', '1593498306', '2020-06-30', '2020-06-30', '', 0, 1),
(31, 11, 28, '1 balasan', '1593498550', '2020-06-30', '2020-06-30', '', 0, 1),
(32, 17, 26, 'test chat ke waw', '1593499074', '2020-06-30', '2020-06-30', '', 0, 1),
(33, 11, 28, '2balsan', '1593499104', '2020-06-30', '2020-06-30', '', 0, 1),
(34, 17, 24, '1 balasan dari waw', '1593499164', '2020-06-30', '2020-06-30', '', 0, 1),
(35, 17, 26, '1', '1593500407', '2020-06-30', '2020-06-30', '', 0, 1),
(36, 17, 24, 'ok1', '1593500447', '2020-06-30', '2020-06-30', '', 0, 1),
(37, 17, 24, 'balas lagi', '1593501106', '2020-06-30', '2020-06-30', '', 0, 1),
(38, 17, 26, 'haloo', '1593501240', '2020-06-30', '2020-06-30', '', 0, 1),
(39, 17, 26, 'pye kabare', '1593501271', '2020-06-30', '2020-06-30', '', 0, 1),
(40, 14, 27, 'hallo pak jokowi\r\nudah baikan blm ama prabowo', '1593502967', '2020-06-30', '2020-06-30', '', 0, 1),
(41, 14, 25, 'ooo kita ma temen lama, dia guru saya malahan wkwkwk', '1593503059', '2020-06-30', '2020-06-30', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_root`
--

CREATE TABLE `chat_root` (
  `id` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `time_created` varchar(128) NOT NULL,
  `created_at` varchar(128) NOT NULL,
  `updated_at` varchar(128) NOT NULL,
  `deleted_at` varchar(128) DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `count_chat_adm` int(11) DEFAULT NULL,
  `count_chat_emp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_root`
--

INSERT INTO `chat_root` (`id`, `from_user`, `to_user`, `time_created`, `created_at`, `updated_at`, `deleted_at`, `is_active`, `count_chat_adm`, `count_chat_emp`) VALUES
(11, 26, 28, '1593194990', '2020-06-27', '2020-06-27', NULL, 1, 0, 0),
(12, 25, 26, '1593483779', '2020-06-30', '2020-06-30', NULL, 1, 0, 0),
(14, 25, 27, '1593486889', '2020-06-30', '2020-06-30', NULL, 1, 0, 0),
(16, 25, 24, '1593493267', '2020-06-30', '2020-06-30', NULL, 1, 0, 0),
(17, 26, 24, '1593499064', '2020-06-30', '2020-06-30', NULL, 1, 0, 0);

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
(188, 'komen', 41, 25, 1, 5, '1593157808', '2020-06-26', '2020-06-26', NULL, 1),
(189, 'komen2', 41, 25, 1, 5, '1593157827', '2020-06-26', '2020-06-26', NULL, 1),
(190, 'hallo prapto', 42, 25, 1, 5, '1593158034', '2020-06-26', '2020-06-26', NULL, 1),
(191, 'y gan', 42, 27, 3, 5, '1593158044', '2020-06-26', '2020-06-26', NULL, 1),
(192, 'ok gan', 42, 25, 1, 5, '1593158050', '2020-06-26', '2020-06-26', NULL, 1),
(193, 'cewe cakep tuh gan\r\n', 42, 27, 3, 5, '1593158061', '2020-06-26', '2020-06-26', NULL, 1);

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
(2, 'Report', 'report', 'report', 'report.png', 1, 0),
(3, 'Employee', 'employee', 'employee', 'employee.png', 3, 1),
(4, 'Profile', 'profile', 'profile', 'profile.png', 3, 1),
(5, 'Report', 'laporan', 'laporan', 'report.png', 1, 1);

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
(41, 26, '1. Laporan1, 2.Laporan Point 2', 'default.png', 'default.txt', '1593141468', '2020-06-26', '2020-06-26', NULL, 1, 1, 0, 2, 2, 0, 2),
(42, 27, 'ah ah ah ah ah ah ah', 'default.png', 'default.txt', '1593157985', '2020-06-26', '2020-06-26', NULL, 1, 1, 0, 4, 4, 1, 0);

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
(24, 'forum_adm@gmail.com', '0892220089090', '$2y$10$Pdwf2QQCgtYDGo41sGrG/eM7XGGB4chVrYhpBYK1VBW24Qojkq8ty', 'Admin Tester', 'logo.jpg', 9, 1, '2020/06/26', '1593140451', '1593140451', NULL, 1),
(25, 'role1@gmail.com', '089600000001', '$2y$10$0yuY93Wzaf9T1WcGfrdpMeZ1hvJ3qwjQ6P2vVwjVxSmqk.TZp7uq2', 'Jokowi', 'default.png', 1, 1, '1593141217', '2020-06-26', '2020-06-26', NULL, 1),
(26, 'role2@gmail.com', '089600000002', '$2y$10$6aK/6RWGFwAg4A3C1Q8WqOfRbnr4/YHOQuMuEYPGtWm9xtxqnCar.', 'Makruf Amin', 'default.png', 2, 2, '1593141258', '2020-06-26', '2020-06-26', NULL, 1),
(27, 'role3-1@gmail.com', '089600000003', '$2y$10$geKrlBfV6z7uwEPA2xTAae4l9Lw4dD.voAExQg0Gh3oAhzX76V/ou', 'Mahfud', 'aycrl4be_400x400.jpg', 3, 3, '1593141295', '2020-06-26', '2020-06-26', NULL, 1),
(28, 'role3-2@gmail.com', '089600000004', '$2y$10$mGTIzoUnc.Xdz0fFgZ6V4O/op/eYVrg4ZGMiSZ4/FNyNUzFaDVH6S', 'Nadim', 'default.png', 5, 3, '1593141342', '2020-06-26', '2020-06-26', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_root`
--
ALTER TABLE `chat_root`
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
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `chat_root`
--
ALTER TABLE `chat_root`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comment_reports`
--
ALTER TABLE `comment_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
