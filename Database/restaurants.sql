-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 13, 2025 at 07:09 AM
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
-- Database: `restaurants`
--

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_table`
--

CREATE TABLE `restaurant_table` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `restaurant_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `menu_path` varchar(255) DEFAULT NULL,
  `cuisine` varchar(255) DEFAULT NULL,
  `approval_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant_table`
--

INSERT INTO `restaurant_table` (`id`, `owner_name`, `restaurant_name`, `email_address`, `password`, `Address`, `contact_number`, `img_path`, `menu_path`, `cuisine`, `approval_status`) VALUES
(6, 'Hari', 'Byanjan Restaurant', 'byanjan@gmail.com', '$2y$10$C0DPMV7nNKRxxrVXgbenrOwNTrTluT3JgGyjhmhSBVXx0fSPY1xwi', 'Barahi-Road, Lakeside', '9876543212', 'uploads/67cc13d3a2ab9.jpg', 'Menu2.php', 'Nepali', 'approved'),
(7, 'Sita', 'French Creperie', 'french@gmail.com', '$2y$10$HlHYcc0KVGX4WqptcWL6WOfDKsVtoKgRohg1CemQw2yGKTmJsUyAS', 'Baidam-Rd, Pokhara', '9876543213', 'uploads/67cc14335d1ac.jpg', 'Menu2.php', 'French', 'approved'),
(8, 'Gita', 'Fresh Elements Restaurant', 'fresh@gmail.com', '$2y$10$q9e3A04rIoS.hBfo2VmNxuZBNlLSnLdIve3OIyHiRa9P9MuIwSlSe', 'Lakeside, Street No.3', '9876543231', 'uploads/67cc14a3cea1e.jpg', 'Menu2.php', 'Nepali', 'approved'),
(9, 'Shyam', 'Soul Origin Cafe and Restaurant', 'soul@gmail.com', '$2y$10$YGDltl1M8Kj5bQPncjS2X.udJb4Mc8B0R6ZMPO2WDiw/pCMPcWKW6', 'Baidam-Rd, Pokhara', '9876541324', 'uploads/67cc15062ad37.jpg', 'Menu2.php', 'Nepali', 'approved'),
(10, 'Madan', 'Open House Restro', 'open@gmail.com', '$2y$10$UlV2aDlVAjeV.DwuuGhxGOUf4Wde6fxtDdJzSfwP3qDV.K1o2/zZy', 'Barahi-Road, Lakeside', '9876543212', 'uploads/67cc1556caa86.jpg', 'Menu2.php', 'Nepali', 'approved'),
(11, 'Ram', 'RoadHouse Cafe and Restro', 'roadhouse@gmail.com', '$2y$10$aqE6Vg7wsyRGOo027yXU3.fVvgUlXo637PpRIId2jyH3i/1T2s3Qq', 'Barahi Road, Lakeside', '9745993730', 'uploads/67d0ef2c12cba.jpg', 'Menu1.php', 'Nepali', 'approved'),
(13, 'Sabina Paudel', 'ABC', 'abc@gmail.com', '$2y$10$DTDaMkd4tjkVlu7hkK6N3ejROyTtw2VB4xsxXdADaesJczAXxWxfq', 'Home', '9745993730', 'uploads/67d12f6c89698.jpg', 'Menu1.php', 'Nepali', 'denied');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `restaurant_table`
--
ALTER TABLE `restaurant_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `restaurant_table`
--
ALTER TABLE `restaurant_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
