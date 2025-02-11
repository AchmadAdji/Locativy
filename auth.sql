-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 08:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender`, `receiver_id`, `message`, `created_at`) VALUES
(1, 'san', 2, 'halo\r\n', '2025-01-25 10:22:57'),
(2, 'san', 3, 'halo\r\n', '2025-01-25 10:23:07'),
(3, 'dhil', 1, 'halo juga', '2025-01-25 10:26:14'),
(4, 'san', 2, 'oi\r\n', '2025-02-03 12:05:43'),
(5, 'san', 2, 'p\r\n', '2025-02-03 12:08:07'),
(6, 'dhil', 1, 'apa san', '2025-02-03 12:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `dataName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `jenis_laporan` enum('kehilangan Barang','Menemukan Barang','','') NOT NULL,
  `tempat_disimpan` enum('Kesiswaan','Osis','','') NOT NULL,
  `upload_gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `username`, `jenis_barang`, `jenis_laporan`, `tempat_disimpan`, `upload_gambar`, `created_at`) VALUES
(1, 'dhil', 'HP vivo', '', 'Kesiswaan', 'Screenshot 2024-11-14 192801.png', '2025-01-22 11:14:58'),
(2, 'dhil', 'HP vivo', '', 'Kesiswaan', 'Screenshot 2024-11-14 192801.png', '2025-01-22 11:17:56'),
(3, 'dhil', 'HP vivo', '', 'Kesiswaan', 'Screenshot 2024-11-12 120302.png', '2025-01-22 11:19:24'),
(4, 'dhil', 'HP vivo', '', 'Kesiswaan', 'Screenshot 2024-11-12 120302.png', '2025-01-23 07:37:56'),
(5, 'dhil', 'HP vivo', '', 'Kesiswaan', '', '2025-01-23 08:19:15'),
(6, 'dhil', 'HP vivo', '', 'Kesiswaan', '', '2025-01-23 08:22:29'),
(7, 'dhil', 'HP vivo', '', '', '', '2025-01-23 08:39:42'),
(8, 'dhil', 'HP vivo', '', 'Kesiswaan', '', '2025-01-23 09:33:42'),
(9, 'dhil', 'HP vivo', '', 'Kesiswaan', '', '2025-01-23 09:33:53'),
(10, 'dhil', 'HP vivo', '', '', '', '2025-01-23 09:34:18'),
(11, 'dhil', 'mera', '', 'Osis', '', '2025-01-23 09:36:01'),
(12, 'san', 'adji', '', 'Kesiswaan', '', '2025-01-24 04:20:08'),
(13, 'dhill', 'mera', '', 'Kesiswaan', '', '2025-01-25 06:12:08'),
(22, 'fadhil', 'hp Iphone ', 'Menemukan Barang', 'Osis', 'handphone iphone,cute iphone,case hp design,chat….jpg', '2025-01-25 08:59:09'),
(23, 'san', 'hp Iphone ', 'kehilangan Barang', 'Kesiswaan', 'handphone iphone,cute iphone,case hp design,chat….jpg', '2025-01-25 08:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reports`
--

CREATE TABLE `tb_reports` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `item` varchar(100) DEFAULT NULL,
  `type_report` varchar(50) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'san', 'thesarkun@gmail.com', '$2y$10$UXizlgfXBJOgkVLQGgzivuBgL/3AC5QnCod62cYogPpZesS.uqYuu'),
(2, 'owner', 'raffiihsan01@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(3, 'dhil', 'mdzularsyilaziz@gmail.com', '$2y$10$f2ynNMF5XIwi2hPFuksrreyLNCIC0psSygp99A2zGzyljnwfOS6/G'),
(4, 'des', 'mulyone@gmail.com', '$2y$10$qk72D7PbYXldZ86r4R5y/eHRx2j/BcMcd5VOyc07FavlJC2AFxs1C');

-- --------------------------------------------------------

--
-- Table structure for table `descriptions`
--

CREATE TABLE `descriptions` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user1_id` (`user1_id`),
  ADD KEY `user2_id` (`user2_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_reports`
--
ALTER TABLE `tb_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_reports`
--
ALTER TABLE `tb_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD CONSTRAINT `descriptions_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
