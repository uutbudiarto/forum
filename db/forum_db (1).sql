-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2020 at 08:49 AM
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
  `ann_text` text NOT NULL,
  `time_created` varchar(128) NOT NULL,
  `time_exp` varchar(20) NOT NULL,
  `created_at` varchar(128) NOT NULL,
  `updated_at` varchar(128) NOT NULL,
  `deleted_at` varchar(128) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `user_id`, `role_id`, `urgency`, `ann_title`, `ann_text`, `time_created`, `time_exp`, `created_at`, `updated_at`, `deleted_at`, `is_active`) VALUES
(17, 26, 2, 'info', 'Penting1', 'Low', '1593755645', '1593759245', '2020-07-03', '2020-07-03', NULL, 0),
(18, 26, 2, 'info', 'Penting', 'jadi low udah diubah', '1593755660', '1593759260', '2020-07-03', '2020-07-03', NULL, 0),
(19, 26, 2, 'danger', 'Ini Pengumuman Baru', 'Penting bgt', '1593756879', '1593760479', '2020-07-03', '2020-07-03', NULL, 0),
(20, 25, 1, 'danger', 'Penting', 'Pengumuman Dari Admin 1', '1593757999', '1594276399', '2020-07-03', '2020-07-03', NULL, 0),
(21, 25, 1, 'warning', 'Pengumuman 2', 'Dari Admin 1', '1593758298', '1594276698', '2020-07-03', '2020-07-03', NULL, 0),
(22, 26, 2, 'danger', 'Pengumuman 1', 'Pengumuman 1 dari admin 1', '1593758449', '1594276849', '2020-07-03', '2020-07-03', NULL, 1);

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
(184, 24, 25, 'OK', '1593951128', '2020-07-05', '2020-07-05', '', 0, 1),
(186, 24, 27, 'OK', '1593963388', '2020-07-05', '2020-07-05', '', 0, 1),
(187, 24, 27, 'OK', '1593963399', '2020-07-05', '2020-07-05', '', 0, 1),
(188, 24, 27, 'OK', '1593963432', '2020-07-05', '2020-07-05', '', 0, 1);

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
(24, 25, 27, '1593852709', '2020-07-04', '2020-07-04', NULL, 1, 0, 0),
(25, 25, 24, '1593854121', '2020-07-04', '2020-07-04', NULL, 1, 0, 0),
(27, 25, 28, '1593859177', '2020-07-04', '2020-07-04', NULL, 1, 0, 0),
(28, 26, 27, '1593876223', '2020-07-04', '2020-07-04', NULL, 1, 0, 0);

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
(201, 'OK', 52, 25, 1, 5, '1593697374', '2020-07-02', '2020-07-02', NULL, 1),
(202, 'siap', 52, 26, 2, 5, '1593697397', '2020-07-02', '2020-07-02', NULL, 1),
(203, 'TEST', 52, 25, 1, 5, '1593697884', '2020-07-02', '2020-07-02', NULL, 1),
(204, 'text', 51, 25, 1, 5, '1593698477', '2020-07-02', '2020-07-02', NULL, 1),
(205, 'komen', 52, 26, 2, 5, '1593751499', '2020-07-03', '2020-07-03', NULL, 1),
(206, 'OK', 52, 26, 2, 5, '1593751519', '2020-07-03', '2020-07-03', NULL, 1),
(207, 'OK', 52, 26, 2, 5, '1593751623', '2020-07-03', '2020-07-03', NULL, 1),
(208, '1', 52, 26, 2, 5, '1593751688', '2020-07-03', '2020-07-03', NULL, 1),
(209, 'OK', 52, 25, 1, 5, '1593751700', '2020-07-03', '2020-07-03', NULL, 1),
(210, 'lAp', 52, 26, 2, 5, '1593751850', '2020-07-03', '2020-07-03', NULL, 1),
(211, 'Haloo', 52, 26, 2, 5, '1593751904', '2020-07-03', '2020-07-03', NULL, 1),
(212, 'Holaa', 52, 25, 1, 5, '1593751913', '2020-07-03', '2020-07-03', NULL, 1),
(213, 'waw', 51, 25, 1, 5, '1593751950', '2020-07-03', '2020-07-03', NULL, 1),
(214, 'wawa', 51, 26, 2, 5, '1593751962', '2020-07-03', '2020-07-03', NULL, 1),
(215, 'wiwi', 51, 25, 1, 5, '1593751968', '2020-07-03', '2020-07-03', NULL, 1);

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
(5, 'Report', 'laporan', 'laporan', 'report.png', 1, 1),
(7, 'Chat', 'chat', 'chat/history/', 'chat.png', 1, 1);

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
(51, 27, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas impedit doloremque distinctio omnis velit deleniti commodi tempore, fugiat voluptatum voluptates! Quasi eius reiciendis animi enim sequi fugit vitae laboriosam rerum corporis veritatis modi aut porro repudiandae, vel in mollitia aspernatur. Nihil earum placeat saepe adipisci perspiciatis ab tenetur? Repellendus, ipsum, id nisi tenetur odit necessitatibus autem illum quasi quod earum laborum deleniti iusto omnis ducimus quis sunt libero odio. Natus magnam, illo blanditiis ipsam doloribus sed laudantium tempore? Culpa placeat expedita, quam quo tempore similique quae minus itaque alias eum beatae officiis delectus doloremque iure laborum modi! Ipsam, quaerat sapiente!', 'default.png', 'default.txt', '1593672633', '2020-07-02', '2020-07-02', NULL, 1, 1, 1, 4, 0, 0, 0),
(52, 26, 'Admin 2 Laporan', 'default.png', 'default.txt', '1593697363', '2020-07-02', '2020-07-02', NULL, 1, 1, 1, 11, 0, 0, 11),
(53, 27, 'Buat Laporan 2', 'default.png', 'default.txt', '1593847645', '2020-07-04', '2020-07-04', NULL, 1, 1, 0, 0, 0, 0, 0),
(54, 27, 'Membuat Laporan ke 3', 'default.png', 'default.txt', '1593848977', '2020-07-04', '2020-07-04', NULL, 1, 1, 0, 0, 0, 0, 0),
(55, 27, 'Buat Laporan ke empat', 'default.png', 'default.txt', '1593849080', '2020-07-04', '2020-07-04', NULL, 1, 1, 0, 0, 0, 0, 0),
(56, 27, 'Buat Laporan ke 5', 'default.png', 'default.txt', '1593849093', '2020-07-04', '2020-07-04', NULL, 1, 1, 1, 0, 0, 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `chat_root`
--
ALTER TABLE `chat_root`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comment_reports`
--
ALTER TABLE `comment_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
