-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 04:52 PM
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
-- Database: `agriculturedb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE `crops` (
  `id` int(11) NOT NULL,
  `platformname` varchar(20) NOT NULL,
  `cropselection` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`id`, `platformname`, `cropselection`, `price`) VALUES
(1, '', 'crop1', 12.00),
(2, '', 'crop1', 12.00),
(3, 'yashu', 'crop1', 12.00),
(4, 'yashwanth', 'crop2', 200.00),
(5, 'yashwanth', 'crop1', 222.00),
(6, 'yashwanth', 'crop1', 1200.00),
(7, 'akhil', 'crop1', 12000.00),
(8, 'yashwanth', 'crop1', 45.00),
(9, '', 'crop1', 1.00),
(10, 'yashu', 'crop2', 12.00),
(11, '', 'crop1', 3.00),
(12, 'BINDU TRADERS(PVT)', 'rice', 1200.00);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `farmer_id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `mandal` varchar(50) NOT NULL,
  `acres` bigint(200) NOT NULL,
  `crop_type` varchar(50) NOT NULL,
  `investment` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`farmer_id`, `user_type`, `name`, `email`, `state`, `district`, `mandal`, `acres`, `crop_type`, `investment`) VALUES
(1, 'farmer', 'yashwanth', 'r@gmail.com', 'state1', 'nalgonda', 'munugode', 1, 'cotton', 1200.00),
(2, 'farmer', 'yashwanth', 'yashwanthmogudala5@gmail.com', 'state1', 'nalgonda', 'munugode', 12, 'cotton', 12.00),
(3, 'farmer', 'Ramavath praneeth', 'yashwanthmogudala5@gmail.com', 'state1', 'nalgonda', 'munugode', 12, 'cotton', 12.00),
(4, 'farmer', 'meghana', 'yashwanthmogudala5@gmail.com', 'state1', 'nalgonda', 'munugode', 5, 'cotton', 10000.00),
(5, 'farmer', 'Bharath  rathod ', 'akhildaida1@gmail.com', 'state1', 'nalgonda', 'munugode', 12, 'cotton', 12.00),
(6, 'farmer', 'Bharath  rathod ', 'akhildaida1@gmail.com', 'state1', 'nalgonda', 'munugode', 12, 'cotton', 12.00),
(7, 'farmer', 'Bharath  rathod ', 'akhildaida1@gmail.com', 'state1', 'nalgonda', 'munugode', 12, 'cotton', 12.00),
(8, 'farmer', 'bharath ', 'akhildaida1@gmail.com', 'state1', 'nalgonda', 'munugode', 20, 'cotton', 120000.00),
(9, 'farmer', 'Bharath  rathod ', 'yashwanthmogudala5@gmail.com', 'state1', 'nalgonda', 'munugode', 12, 'cotton', 12000.00),
(10, 'farmer', 'yashu', 'yashwanthmogudala5@gmail.com', 'state1', 'nalgonda', 'munugode', 112, 'cotton', 122.00),
(11, 'farmer', 'yashu', 'yashwanthmogudala5@gmail.com', 'Telangana', 'Nalgonda', '', 12, 'c', 3.00),
(12, 'farmer', 'k', 'r@gmail.com', '', '', '', 12, 'n', 1.00),
(13, 'farmer', 'yashwanth', 'yashwanthmogudala5@gmail.com', 'Telangana', 'Nalgonda', 'munugode', 12, 'cotton', 12000.00),
(14, 'farmer', 'yashwanth', 'yashwanthmogudala5@gmail.com', 'Telangana', 'Khairatabad mandal', '', 12, 'cotton', 100000.00),
(15, 'farmer', 'yashwanth', 'yashwanthmogudala5@gmail.com', 'Telangana', 'Khairatabad mandal', '', 12, 'cotton', 12.00);

-- --------------------------------------------------------

--
-- Table structure for table `nonfarmer`
--

CREATE TABLE `nonfarmer` (
  `id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `mandal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nonfarmer`
--

INSERT INTO `nonfarmer` (`id`, `user_type`, `name`, `email`, `state`, `district`, `mandal`) VALUES
(1, 'non-farmer', 'Rathod bharath ', 'yadavdevicharan2230@gmail.com', '', '', ''),
(2, 'non-farmer', 'w', 'akhildaida1@gmail.com', '', '', ''),
(3, 'non-farmer', 'yashu', 'akhildaida1@gmail.com', '', '', ''),
(4, 'non-farmer', 'hjj', 'yadavdevicharan2230@gmail.com', '', '', ''),
(5, 'non-farmer', 'Bharath ', 'yashwanthmogudala5@gmail.com', '', '', ''),
(6, 'non-farmer', 'j', 'yashwanthmogudala5@gmail.com', '', '', ''),
(7, 'non-farmer', 'yashu', 'r@gmail.com', '', '', ''),
(8, 'non-farmer', 'yashwanth', 'yashwanthmogudala5@gmail.com', 'Telangana', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`farmer_id`);

--
-- Indexes for table `nonfarmer`
--
ALTER TABLE `nonfarmer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nonfarmer`
--
ALTER TABLE `nonfarmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
