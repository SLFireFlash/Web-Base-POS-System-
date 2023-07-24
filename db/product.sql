-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2023 at 03:17 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20996222_jm_motors`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(10) NOT NULL,
  `ProductName` varchar(25) NOT NULL,
  `bike` text NOT NULL,
  `Brand` varchar(20) NOT NULL,
  `BuyingPrice` int(5) NOT NULL,
  `SellingPrice` int(4) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `ProductName`, `bike`, `Brand`, `BuyingPrice`, `SellingPrice`, `quantity`) VALUES
(47, 'Brack shoe', 'Plessure', 'Endurance', 775, 875, 25),
(48, 'Brack shoe', 'Pulser', 'Euro', 480, 580, 20),
(49, 'Brack shoe', 'Pulser', 'Gp china', 533, 595, 25),
(50, 'Brack shoe', 'Pulser', 'Gp china', 533, 595, 25),
(51, 'break shoe', 'Ct100', 'Suprajith', 600, 680, 10),
(52, 'break shoe', 'Ct 100', 'Endurans', 500, 600, 20),
(53, 'break shoe', 'Ct 100', 'Endurans', 500, 600, 20),
(54, 'SPARCK PLUG', 'CT 100', 'BOSCH', 160, 200, 200),
(55, 'SPARCK PLUG', 'PULSER', 'BOSCH', 160, 200, 200),
(56, 'HELMET VISER', 'ACCUSSORIES', 'LS 2', 210, 240, 200),
(57, 'SPARCK PLUG', 'CT 100', 'BOSCH', 160, 200, 200),
(58, 'SPARCK PLUG', 'CT 100', 'BOSCH', 160, 200, 200),
(59, 'SPARCK PLUG', 'CT 100', 'BOSCH', 160, 200, 200),
(60, 'Petral filter', 'Accassurice', 'Chaina', 50, 55, 50),
(61, 'Petral filter large', 'ACCUSSORIES', 'Chaina', 60, 70, 50),
(63, 'Brack shoe', 'CT 100', 'Endurance', 600, 675, 6),
(64, 'Brack shoe', 'Dio/Plessur', 'Endurance', 776, 875, 6),
(65, 'Chain sprocket kit', 'Ct100 DLX new', 'Progressive', 2930, 3300, 6),
(66, 'Chain sprocket kit', 'Discover 125/135', 'Progressive', 2930, 3300, 2),
(67, 'Chain sprocket kit', 'MD 90', 'Progressive', 2930, 3300, 2),
(68, 'Chain sprocket kit', 'Starcity    ps 309', 'Progressive', 2771, 3125, 3),
(69, 'Chain sprocket kit', 'Starcity    ps 309', 'Progressive', 2771, 3125, 3),
(70, 'Chain sprocket kit', 'Starcity    ps 309', 'Progressive', 2771, 3125, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
