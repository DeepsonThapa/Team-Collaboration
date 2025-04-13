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
-- Database: `orders_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `description`, `price`, `Quantity`, `user_id`, `restaurant_id`, `image_path`) VALUES
(23, 'Bread Omelette', '2 pieces of bread with an omelette.', 200.00, 1, 14, 11, '0'),
(37, 'Parathas', 'Soft parathas with curry.', 200.00, 2, 15, 11, '0');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderdetails_id` int(11) NOT NULL,
  `user_first_name` varchar(50) NOT NULL,
  `user_last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `house_street` varchar(100) NOT NULL,
  `area` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderdetails_id`, `user_first_name`, `user_last_name`, `address`, `contact_number`, `city`, `province`, `house_street`, `area`, `created_at`) VALUES
(15, 'Sabina', 'Paudel', 'Home', '9745993730', 'Pokhara', 'Gandaki', 'Street No.3', 'Damside', '2025-03-11 15:59:45'),
(16, 'Sabina', 'Paudel', 'Home', '9745993730', 'Pokhara', 'Gandaki', 'Street No.3', 'Damside', '2025-03-11 16:02:37'),
(17, 'Sabina', 'Paudel', 'Home', '9745993730', 'Pokhara', 'Gandaki', 'Street No.3', 'Damside', '2025-03-11 16:04:22'),
(18, 'Sabina', 'Paudel', 'Home', '9745993730', 'Pokhara', 'Gandaki', 'Street No.3', 'Damside', '2025-03-12 01:01:53'),
(19, 'Sabina', 'Paudel', 'Home', '9745993730', 'Pokhara', 'Gandaki', 'Street No.3', 'Damside', '2025-03-12 01:48:33'),
(20, 'Sabina', 'Paudel', 'Home', '9745993730', 'Pokhara', 'Gandaki', 'Street No.3', 'Damside', '2025-03-12 01:49:57'),
(21, 'Sabina', 'Paudel', 'Home', '9745993730', 'Pokhara', 'Gandaki', 'Street No.3', 'Damside', '2025-03-12 03:14:03'),
(22, 'Sabina', 'Paudel', 'Home', '9745993730', 'Pokhara', 'Gandaki', 'Street No.3', 'Damside', '2025-03-12 05:08:19'),
(23, 'Sabina', 'Paudel', 'Home', '9745993730', 'Pokhara', 'Gandaki', 'Street No.3', 'Damside', '2025-03-12 06:51:20'),
(24, 'Sabina', 'Paudel', 'Home', '9745993730', 'Pokhara', 'Gandaki', 'Street No.3', 'Damside', '2025-03-13 11:01:52'),
(25, 'Sabina', 'Paudel', 'Home', '9745993730', 'Pokhara', 'Gandaki', 'Street No.3', 'Damside', '2025-04-06 14:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Pending','Completed','Cancelled') DEFAULT 'Pending',
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `status`, `total_amount`, `order_date`) VALUES
(13, 15, 'Cancelled', 200.00, '2025-03-12 06:51:22'),
(14, 15, 'Completed', 700.00, '2025-03-13 11:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `price`) STORED,
  `restaurant_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `item_name`, `quantity`, `price`, `restaurant_id`, `description`, `image_path`) VALUES
(30, 13, 'Samosas', 1, 200.00, 6, '4 pieces of samosas with chutney.', NULL),
(31, 14, 'Bread Omelette', 1, 200.00, 6, '2 pieces of bread with an omelette.', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderdetails_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderdetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
