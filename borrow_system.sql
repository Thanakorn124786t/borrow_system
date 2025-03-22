-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2025 at 09:15 AM
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
-- Database: `borrow_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow_records`
--

CREATE TABLE `borrow_records` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `borrow_date` datetime DEFAULT current_timestamp(),
  `return_date` datetime DEFAULT NULL,
  `status` enum('borrowed','returned') NOT NULL DEFAULT 'borrowed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('available','borrowed') NOT NULL DEFAULT 'available',
  `image` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `status`, `image`) VALUES
(1, 'หนังสือ A', 'available', 'default.jpg'),
(2, 'หนังสือ B', 'available', 'default.jpg'),
(3, 'โน๊ตบุ๊ค Dell', 'available', 'default.jpg'),
(4, 'iPad', 'available', 'default.jpg'),
(5, 'โน๊ตบุ๊ค Dell', 'available', 'default.jpg'),
(6, 'MacBook Pro', 'available', 'default.jpg'),
(7, 'iPad Pro', 'available', 'default.jpg'),
(8, 'Mouse Logitech', 'available', 'default.jpg'),
(9, 'Keyboard Mechanical', 'available', 'default.jpg'),
(10, 'Monitor 24 นิ้ว', 'available', 'default.jpg'),
(11, 'Printer HP', 'available', 'default.jpg'),
(12, 'External HDD 1TB', 'available', 'default.jpg'),
(13, 'โน๊ตบุ๊ค Dell', 'available', 'laptop_dell.jpg'),
(14, 'MacBook Pro', 'available', 'macbook_pro.jpg'),
(15, 'iPad Pro', 'available', 'ipad_pro.jpg'),
(16, 'Mouse Logitech', 'available', 'mouse_logitech.jpg'),
(17, 'Keyboard Mechanical', 'available', 'keyboard_mech.jpg'),
(18, 'Monitor 24 นิ้ว', 'available', 'monitor_24.jpg'),
(19, 'Printer HP', 'available', 'printer_hp.jpg'),
(20, 'External HDD 1TB', 'available', 'hdd_1tb.jpg'),
(21, 'Router TP-Link', 'available', 'router_tplink.jpg'),
(22, 'Microphone Blue Yeti', 'available', 'mic_blue_yeti.jpg'),
(23, 'Webcam Logitech C920', 'available', 'webcam_c920.jpg'),
(24, 'Smartphone Samsung S23', 'available', 'samsung_s23.jpg'),
(25, 'Smartphone iPhone 15', 'available', 'iphone_15.jpg'),
(26, 'Tablet Samsung Tab S9', 'available', 'tablet_s9.jpg'),
(27, 'Smartwatch Apple Watch', 'available', 'apple_watch.jpg'),
(28, 'Smartwatch Samsung Galaxy Watch', 'available', 'galaxy_watch.jpg'),
(29, 'Headphone Sony WH-1000XM4', 'available', 'sony_wh1000xm4.jpg'),
(30, 'Headphone Bose QuietComfort', 'available', 'bose_qc.jpg'),
(31, 'Game Controller Xbox', 'available', 'xbox_controller.jpg'),
(32, 'Game Controller PlayStation', 'available', 'ps_controller.jpg'),
(33, 'USB Flash Drive 128GB', 'available', 'usb_128gb.jpg'),
(34, 'SSD NVMe 1TB', 'available', 'ssd_nvme.jpg'),
(35, 'RAM DDR4 16GB', 'available', 'ram_ddr4.jpg'),
(36, 'Power Bank 20000mAh', 'available', 'powerbank_20000.jpg'),
(37, 'Wireless Charger Anker', 'available', 'wireless_charger.jpg'),
(38, 'VR Headset Oculus Quest 2', 'available', 'vr_quest2.jpg'),
(39, 'External GPU RTX 4080', 'available', 'gpu_rtx4080.jpg'),
(40, 'Docking Station USB-C', 'available', 'docking_usb-c.jpg'),
(41, 'Mechanical Keyboard RGB', 'available', 'keyboard_rgb.jpg'),
(42, 'Monitor 32 นิ้ว 4K', 'available', 'monitor_32_4k.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin1', 'admin123', 'admin'),
(2, 'user1', 'user123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow_records`
--
ALTER TABLE `borrow_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow_records`
--
ALTER TABLE `borrow_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow_records`
--
ALTER TABLE `borrow_records`
  ADD CONSTRAINT `borrow_records_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrow_records_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
