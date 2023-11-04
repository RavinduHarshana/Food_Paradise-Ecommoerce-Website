-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 03:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodparadies`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `UserID` int(11) NOT NULL,
  `ItemCode` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryName` varchar(30) NOT NULL,
  `CatImage` varchar(500) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryName`, `CatImage`, `description`) VALUES
('Pizza', 'https://img.freepik.com/premium-photo/pizza-isolate-white-background-generative-ai_74760-2619.jpg', ''),
('Burger', 'https://img.freepik.com/free-photo/tasty-burger-isolated-white-background-fresh-hamburger-fastfood-with-beef-cheese_90220-1063.jpg?w=740&t=st=1699001769~exp=1699002369~hmac=5747b4b677e77c00b7c59158867', ''),
('Donut', 'https://img.freepik.com/free-photo/delicious-donuts-with-topping-arrangement_23-2150705319.jpg?t=st=1699035756~exp=1699039356~hmac=0155c75d7eed44ba36b90409c7103bb00e5472a706c4e73ef7c7e850e5356718&w=740', ''),
('Appetizers', '', ''),
('Dessert', '', ''),
('Salads', '', ''),
('Sanwiches', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fooditem`
--

CREATE TABLE `fooditem` (
  `ItemCode` int(11) NOT NULL,
  `ItemName` int(11) NOT NULL,
  `ItemImage` varchar(500) NOT NULL,
  `Description` int(11) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `oder`
--

CREATE TABLE `oder` (
  `ItemCode` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Payment` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `ItemCode` int(11) NOT NULL,
  `ItemName` varchar(30) NOT NULL,
  `Description` varchar(700) NOT NULL,
  `Offerprice` decimal(10,0) NOT NULL,
  `OriginalPrice` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `BordID` int(11) NOT NULL,
  `BName` varchar(50) NOT NULL,
  `Position` varchar(40) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `BImage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `LaneNo` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Mail`, `LaneNo`, `City`, `Country`, `Password`) VALUES
(1, 'Ravindu', 'ravindu@gmail.com', '44/5', 'Mawanella', 'Srilanka', 'Ravindu123'),
(2, 'Kosala', 'Kosala12@gmail.com', '40', 'Mawanella', 'Srilanka', 'Kosala123'),
(3, 'Suraj', 'SurajNaveen@gmail.com', '12/3', 'Hemmathagama', 'Sri Lanka', 'Suraj123'),
(4, 'Nekmal', 'Nekmal21@gmail.com', '4', 'Kaluthara', 'Sri Lanka', 'Nekmal123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fooditem`
--
ALTER TABLE `fooditem`
  ADD PRIMARY KEY (`ItemCode`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`BordID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fooditem`
--
ALTER TABLE `fooditem`
  MODIFY `ItemCode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `BordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
