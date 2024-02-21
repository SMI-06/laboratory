-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 10:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab-automation`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `city_Name` varchar(30) DEFAULT NULL,
  `Province_Id` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `Country_Id` int(5) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `country_Name` varchar(20) DEFAULT NULL,
  `regions` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_Name`, `regions`) VALUES
(00001, 'Pakistan', 'Asia'),
(00002, 'India', 'Asia');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `province_Name` varchar(30) DEFAULT NULL,
  `Country_Id` int(5) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `userName` varchar(20) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userFullName` varchar(50) DEFAULT NULL,
  `userimage` varchar(50) DEFAULT NULL,
  `userCNIC` varchar(20) NOT NULL,
  `userPhone` varchar(15) NOT NULL,
  `userReligion` varchar(20) DEFAULT NULL,
  `userGender` varchar(10) DEFAULT NULL,
  `userCity` varchar(30) DEFAULT NULL,
  `userCountry` varchar(30) DEFAULT NULL,
  `userAddress` varchar(50) DEFAULT NULL,
  `userPassword` varchar(70) NOT NULL,
  `Role` varchar(15) DEFAULT 'User',
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `userName`, `userEmail`, `userFullName`, `userimage`, `userCNIC`, `userPhone`, `userReligion`, `userGender`, `userCity`, `userCountry`, `userAddress`, `userPassword`, `Role`, `Status`) VALUES
(00001, 'Ibraheem', 'superadmin@gmail.com', 'Ibraheem Shah', 'image-.png', '42201-1234567-8', '03330240594', 'Islam', 'Male', 'Karachi', 'Pakistan', 'MC-1335(A) Green Town, Karachi', 'admin123', 'Super Admin', 'Active'),
(00002, 'Shah', 'admin@gmail.com', 'Shah Sahib', 'cloud-computing.png', '42201-1234567-8', '03330240592', 'Christianity', 'Male', 'Karachi', 'Pakistan', 'MC-1335(A) Azeem Pura, Karachi', 'admin1234', 'Admin', 'Pending'),
(00003, 'User', 'User@gmail.com', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 'user1234', 'User', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Province_Id` (`Province_Id`),
  ADD KEY `Country_Id` (`Country_Id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_Name` (`country_Name`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Country_Id` (`Country_Id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`Province_Id`) REFERENCES `province` (`id`),
  ADD CONSTRAINT `cities_ibfk_2` FOREIGN KEY (`Country_Id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `province`
--
ALTER TABLE `province`
  ADD CONSTRAINT `province_ibfk_1` FOREIGN KEY (`Country_Id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
