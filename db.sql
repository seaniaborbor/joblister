-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 02:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `justthejob`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `passwd` varchar(225) NOT NULL,
  `accountType` varchar(50) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `passwd`, `accountType`, `createdAt`) VALUES
(7, 'testuse@gmail.com', '$2y$10$4pKy.i04sfUEkcnllRsRVugGvtYK2tFZmBOZ6CQ9O/6334iVGPyLa', '1', '2023-10-25 00:20:08'),
(8, 'abc@gmail.com', '$2y$10$DLD/ur3GW3/vJqGpeLWsO.tzxQd.fx/uuRs1mVsOCnBvop1kT9mJm', '0', '2023-10-25 07:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `bidTitle` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `logo_path` varchar(255) NOT NULL,
  `deadLine` date NOT NULL,
  `lastEditedBy` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `bidTitle`, `file_path`, `logo_path`, `deadLine`, `lastEditedBy`, `created_at`) VALUES
(1, 'A bid for the construction of a 3mv hydro Electricity Power Plan', '1698193794_bc00b984cb9703469025.pdf', '1698193794_c1339b055b026939790d.jpg', '2023-10-31', 'testuse@gmail.com', '2023-10-25 00:29:54'),
(2, 'Bid for biometric idcard system for MICROSOFT TEAM', '1698193891_4fd99d7abe30806028f9.pdf', '1698193891_bc2571e2b62bfb675eff.png', '2023-10-27', 'testuse@gmail.com', '2023-10-25 00:31:31'),
(3, 'A bid for the renovation of Rallay Town Market', '1698194369_42bdf8f6d0147e722197.pdf', '1698194369_37e260c405a55b862788.jpg', '2023-10-16', 'abc@gmail.com', '2023-10-25 00:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `location` varchar(100) NOT NULL,
  `deadline` varchar(10) NOT NULL,
  `file_path` varchar(225) NOT NULL,
  `logo_path` varchar(225) NOT NULL,
  `lastEditedBy` varchar(50) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `location`, `deadline`, `file_path`, `logo_path`, `lastEditedBy`, `createdAt`) VALUES
(1, 'Vacancy of a professional Driver', 'Montserrado', '2023-10-29', '1698193948_de7b652713f63d070f6f.pdf', '1698193948_8afdd89fc0732314ecc9.png', 'testuse@gmail.com', '2023-10-25 00:32:28'),
(2, 'Vacancy for the position of classroom instructor', 'Lofa', '2023-10-27', '1698194012_8664d46200b91693b6ae.pdf', '1698194012_23dca0ab5797ab8373a2.png', 'testuse@gmail.com', '2023-10-25 00:33:32'),
(3, 'Professional Mechanic wanted', 'Montserrado', '2023-10-30', '1698194074_879d8f0b4fdb0314c57d.pdf', '1698194074_62144cbd517a8e66ff92.png', 'testuse@gmail.com', '2023-10-25 00:34:34'),
(4, 'Digital Marketing Agent wanted', 'Bong', '2023-10-25', '1698194251_829500aaed769385fc45.pdf', '1698194251_38abdc79248cab8e466f.png', 'abc@gmail.com', '2023-10-25 00:37:31'),
(5, 'Post of Procurement Officer vacancy available', 'Sinoe', '2023-10-30', '1698194318_6560b125df921e356987.pdf', '1698194318_9914c5b9d50b45a05a53.jpg', 'abc@gmail.com', '2023-10-25 00:38:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
