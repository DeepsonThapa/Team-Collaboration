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
-- Database: `menu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `restaurant_id`, `name`, `description`, `price`, `image_path`, `category`) VALUES
(1, 11, 'Selroti and Achar', '2 selrotis with home-cooked achar and tea.', 200.00, 'Images/breakfast1.jpg', 'Breakfast'),
(2, 11, 'Bread Omelette', '2 pieces of bread with an omelette.', 200.00, 'Images/Breakfast 3.jpg', 'Breakfast'),
(3, 11, 'Samosas', '4 pieces of samosas with chutney.', 200.00, 'Images/samosa.jpg', 'Breakfast'),
(4, 11, 'Thakali Khana Set', 'A khana set with rice, chicken curry, achar, and vegetables.', 600.00, 'Images/Lunch1.jpg', 'Lunch'),
(5, 11, 'Fried Rice', 'A plate of fried rice with vegetables.', 200.00, 'Images/Fried rice.jpg', 'Lunch'),
(6, 11, 'Momo', 'A plate of chicken momo.', 200.00, 'Images/dish.jpg', 'Lunch'),
(7, 11, 'Parathas', 'Soft parathas with curry.', 200.00, 'Images/Dinner2.jpg', 'Dinner'),
(8, 11, 'Thakali Khana Set', 'A khana set with rice, chicken curry, achar, and vegetables.', 600.00, 'Images/Lunch1.jpg', 'Dinner'),
(9, 11, 'Roti', 'Roti with vegetable curry.', 200.00, 'Images/roti.jpg', 'Dinner'),
(10, 11, 'Coke', 'Chilled coke can (500ml).', 100.00, 'Images/coke.jpeg', 'Cold Drinks'),
(11, 11, 'Sprite', 'Chilled sprite bottle (500ml).', 100.00, 'Images/sprite.jpeg', 'Cold Drinks'),
(12, 11, 'Fanta', 'Chilled fanta bottle (500ml).', 100.00, 'Images/fanta.jpeg', 'Cold Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items2`
--

CREATE TABLE `menu_items2` (
  `id` int(11) NOT NULL,
  `restaurant_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `category` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items2`
--

INSERT INTO `menu_items2` (`id`, `restaurant_id`, `name`, `description`, `price`, `image_path`, `category`) VALUES
(1, '6', 'Selroti and Achar', '2 selrotis with home-cooked achar and tea.', 200.00, 'images/breakfast1.jpg', 'Breakfast'),
(2, '6', 'Bread Omelette', '2 pieces of bread with an omelette.', 200.00, 'Images/Breakfast 3.jpg', 'Breakfast'),
(3, '6', 'Samosas', '4 pieces of samosas with chutney.', 200.00, 'images/samosa.jpg', 'Breakfast'),
(4, '6', 'Thakali Khana Set', 'A khana set with rice, chicken curry, achar, and v...', 600.00, 'images/Lunch1.jpg', 'Lunch'),
(5, '6', 'Fried Rice', 'A plate of fried rice with vegetables.', 200.00, 'images/Fried rice.jpg', 'Lunch'),
(6, '6', 'Momo', 'A plate of chicken momo.', 200.00, 'images/dish.jpg', 'Lunch'),
(7, '6', 'Parathas', 'Soft parathas with curry.', 200.00, 'images/Dinner2.jpg', 'Dinner'),
(8, '6', 'Thakali Khana Set', 'A khana set with rice, chicken curry, achar, and v...', 600.00, 'images/Lunch1.jpg', 'Dinner'),
(9, '6', 'Roti', 'Roti with vegetable curry.', 200.00, 'images/roti.jpg', 'Dinner'),
(10, '6', 'Coke', 'Chilled coke can (500ml).', 100.00, 'images/coke.jpeg', 'Cold Drinks'),
(11, '6', 'Sprite', 'Chilled sprite bottle (500ml).', 100.00, 'images/sprite.jpeg', 'Cold Drinks'),
(12, '6', 'Fanta', 'Chilled fanta bottle (500ml).', 100.00, 'images/fanta.jpeg', 'Cold Drinks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items2`
--
ALTER TABLE `menu_items2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu_items2`
--
ALTER TABLE `menu_items2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
