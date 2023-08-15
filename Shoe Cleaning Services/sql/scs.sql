-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2022 at 07:08 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scs`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `trn_date` datetime NOT NULL,
  `name` varchar(225) NOT NULL,
  `phone_num` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `service` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `trn_date`, `name`, `phone_num`, `address`, `service`, `price`, `status`) VALUES
(86, '2022-08-29 05:39:49', 'izzul', 1133149003, '763,lorong angsana 10/2,Taman Angsana,09000 Kulim,Kedah', 'Standard Clean', '20.00', 'completed'),
(87, '2022-08-29 05:40:58', 'izzul', 1133149003, '763,lorong angsana 10/2,Taman Angsana,09000 Kulim,Kedah', 'Multi Repaint', '30.00', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `trn_date` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_num` int NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `trn_date`, `name`, `phone_num`, `message`) VALUES
(6, '2022-08-29 04:15:47', 'hakimmi12', 1161010238, 'kasut kurang manis');

-- --------------------------------------------------------

--
-- Table structure for table `loginform`
--

CREATE TABLE `loginform` (
  `ID` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `user` varchar(225) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_num` int NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginform`
--

INSERT INTO `loginform` (`ID`, `email`, `user`, `pass`, `address`, `phone_num`, `status`) VALUES
(1, 'admin@google.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Kuala Lumpur', 1118540598, 1),
(13, 'hakimmihaikalbinzaidi8@gmail.com', 'hakimmi12', '610eb3af6a867d7e2c2af6ca0505b672', '7969 kampung pujuk belara, manir , 21200 kuala terengganu, terengganu', 1161010238, 0),
(16, 'izzuliman8@gmail.com', 'izzul', '81dc9bdb52d04dc20036dbd8313ed055', '763,lorong angsana 10/2,Taman Angsana,09000 Kulim,Kedah', 1133149003, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int NOT NULL,
  `trn_date` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `resit` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `trn_date`, `name`, `resit`) VALUES
(14, '2022-08-29 05:06:13', 'izzul', 0x72657369742e706e67),
(15, '2022-08-29 05:38:59', 'izzul', 0x72657369742e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int NOT NULL,
  `type_cl` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `descrip` varchar(225) NOT NULL,
  `type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `type_cl`, `price`, `descrip`, `type`) VALUES
(1, 'Standard Clean', '20.00', 'deep clean, laces, outer sole, in sole', 'clean'),
(2, 'Unyellow sole', '5.00', 'mid sole cream', 'clean'),
(3, 'Standard Repaint', '20.00', 'one color only', 'repaint'),
(4, 'Multi Repaint', '30.00', 'two or more color', 'repaint'),
(5, 'Custom Sole', '50.00', 'restore back to original', 'restore'),
(6, 'Shoe Glue', '5.00', 'mid sole, tounge shoe, etc', 'restore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginform`
--
ALTER TABLE `loginform`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loginform`
--
ALTER TABLE `loginform`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
