-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 12, 2021 at 11:22 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safeboda_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` int(11) NOT NULL,
  `promocode_desc` text NOT NULL,
  `promocode` varchar(10) NOT NULL,
  `cordRad` varchar(3) NOT NULL,
  `eventLat` varchar(7) NOT NULL,
  `eventLong` varchar(7) NOT NULL,
  `number_rides` varchar(2) NOT NULL,
  `valid_thru` varchar(24) NOT NULL,
  `Active` varchar(42) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='promocode tables ';

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`id`, `promocode_desc`, `promocode`, `cordRad`, `eventLat`, `eventLong`, `number_rides`, `valid_thru`, `Active`, `amount`) VALUES
(1, 'lagos fashion fest', 'lag2021', '20', '45.88', '34.23', '4', '0', ' 2021-06-01 00:35:07', 0),
(10, 'lagos fashion fest', 'lag2022', '20', '45.88', '34.23', '4', '0', ' 2021-06-01 00:35:07', 0),
(13, 'lagos fashion fest', 'lag2122', '20', '45.88', '34.23', '4', '0', ' 2021-06-01 00:35:07', 0),
(15, 'lagos fashion fest', 'lag211122', '40', '45.88', '34.23', '4', '0', ' 2021-06-01 00:35:07', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promocode` (`promocode`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
