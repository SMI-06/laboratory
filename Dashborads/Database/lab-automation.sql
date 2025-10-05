-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2025 at 08:46 AM
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
-- Database: `lab-automation`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `clearTable` (IN `tableName` VARCHAR(255))   BEGIN
SET @tableName = Null;
If tableName = 'Cities' THEN 
	SET @tableName = "Truncate Table cities";
ELSEIF tableName = 'countries' THEN
	SET @tableName = "Truncate Table countries";
ELSEIF tableName = 'laboratory' THEN
	SET @tableName = "Truncate Table laboratory";
ELSEIF tableName = 'laboratorytype' THEN
	SET @tableName = "Truncate Table laboratorytype";
ELSEIF tableName = 'mails' THEN
	SET @tableName = "Truncate Table mails";
ELSEIF tableName = 'notification' THEN
	SET @tableName = "Truncate Table notification";
ELSEIF tableName = 'Products' THEN
	SET @tableName = "Truncate table products";
ELSEIF tableName = 'province' THEN
	SET @tableName = "Truncate table province";
ELSEIF tableName = 'regions' THEN
	SET @tableName = "truncate table regions";
ELSEIF tableName = 'signup' THEN
	Set @tableName  = "truncate table signup";
ELSEIF tableName = 'testing_product' THEN
	SET @tableName = "truncate table testing_product";
ELSEIF tableName = 'All' THEN
	SET @tableName = "TRUNCATE TABLE Cities; TRUNCATE TABLE countries; TRUNCATE TABLE laboratory; 
                          TRUNCATE TABLE laboratorytype; TRUNCATE TABLE mails; TRUNCATE TABLE notification; 
                          TRUNCATE TABLE products; TRUNCATE TABLE province; TRUNCATE TABLE regions; 
                          TRUNCATE TABLE signup; TRUNCATE TABLE testing_product";
ELSE
	Set @tableName = NULL ;
    
END IF;

     IF @tableName IS NOT NULL THEN
        PREPARE stmt FROM @tableName;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;
    END IF;
END$$

DELIMITER ;

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

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_Name`, `Province_Id`, `Country_Id`) VALUES
(00001, 'Karachi', 00001, 00001),
(00002, 'Lahore', 00002, 00001);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `Country_Id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `country_Name` varchar(20) DEFAULT NULL,
  `regions_id` int(5) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`Country_Id`, `country_Name`, `regions_id`) VALUES
(00001, 'Pakistan', 00001),
(00002, 'China', 00001);

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `laboratory_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `laboratory_branch_number` varchar(50) DEFAULT NULL,
  `laboratory_name` varchar(50) DEFAULT NULL,
  `laboratory_address` varchar(50) DEFAULT NULL,
  `laboratory_type` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `laboratory_type_custom` varchar(50) DEFAULT NULL,
  `laboratory_city` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `laboratory_country` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `status` varchar(25) DEFAULT 'Pending',
  `admin_id` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`laboratory_id`, `laboratory_branch_number`, `laboratory_name`, `laboratory_address`, `laboratory_type`, `laboratory_type_custom`, `laboratory_city`, `laboratory_country`, `status`, `admin_id`, `Time`) VALUES
(00001, 'Shah Medical Lab-Br-01', 'Shah Medical Lab', 'SMI SOFTS', 00003, '', 00001, 00001, '1', 00002, '2024-10-30 14:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorytype`
--

CREATE TABLE `laboratorytype` (
  `laboratorytype_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Laboratory_Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laboratorytype`
--

INSERT INTO `laboratorytype` (`laboratorytype_id`, `Laboratory_Type`) VALUES
(00001, 'Other  Type'),
(00002, 'Electrical Type'),
(00003, 'Medical Type');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `mail_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `recipient` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `Message` varchar(255) DEFAULT NULL,
  `userId` int(5) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Topic` varchar(50) DEFAULT NULL,
  `User_Id` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `notificationTime` time DEFAULT NULL,
  `notificationdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `productName` varchar(30) DEFAULT NULL,
  `productCategory` varchar(30) DEFAULT NULL,
  `productDescription` varchar(255) NOT NULL,
  `productPrice` varchar(30) DEFAULT NULL,
  `productImage` varchar(50) DEFAULT NULL,
  `user_id` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_Id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `province_Name` varchar(30) DEFAULT NULL,
  `Country_Id` int(5) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_Id`, `province_Name`, `Country_Id`) VALUES
(00001, 'Sindh', 00001),
(00002, 'Punjab', 00001);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Region_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `Region_Name`) VALUES
(00001, 'Aisa');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `userName` varchar(20) DEFAULT NULL,
  `userEmail` varchar(50) DEFAULT NULL,
  `userFullName` varchar(50) DEFAULT NULL,
  `userimage` varchar(50) DEFAULT NULL,
  `userCNIC` varchar(20) DEFAULT NULL,
  `userPhone` varchar(15) DEFAULT NULL,
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
(00001, 'SMI-16', 'ibraheem@gmail.com', 'Syed Muhammad Ibraheem', '20200615_165321.jpg', '4220197145053', '03330240594', 'Islam', 'Male', 'Karachi', 'Pakistan', 'SMI SOFTS, Green Town', 'ibraheem', 'super admin', 'Active'),
(00002, 'SMI', 'smi@gmail.com', 'S.M.Ibraheem', '20200615_164343.jpg', '4220197145054', '03010247722', 'Islam', 'Male', 'Lahore', 'Pakistan', 'SMI Softs, Green Town, Azeem Pura', 'ibraheem@16', 'admin', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `testing_product`
--

CREATE TABLE `testing_product` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `productName` varchar(25) DEFAULT NULL,
  `productCetagory` varchar(25) DEFAULT NULL,
  `productdescription` varchar(25) DEFAULT NULL,
  `productImage` varchar(30) DEFAULT NULL,
  `productPrice` varchar(30) DEFAULT NULL,
  `laboratoryType` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `laboratory` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `user_id` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`Country_Id`),
  ADD UNIQUE KEY `country_Name` (`country_Name`),
  ADD KEY `regions_id` (`regions_id`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`laboratory_id`),
  ADD UNIQUE KEY `laboratory_branch_number` (`laboratory_branch_number`),
  ADD KEY `laboratory_type` (`laboratory_type`),
  ADD KEY `laboratory_city` (`laboratory_city`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `laboratory_country` (`laboratory_country`);

--
-- Indexes for table `laboratorytype`
--
ALTER TABLE `laboratorytype`
  ADD PRIMARY KEY (`laboratorytype_id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`mail_id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_Id`),
  ADD KEY `Country_Id` (`Country_Id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `testing_product`
--
ALTER TABLE `testing_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laboratoryType` (`laboratoryType`),
  ADD KEY `laboratory` (`laboratory`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `Country_Id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `laboratory_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laboratorytype`
--
ALTER TABLE `laboratorytype`
  MODIFY `laboratorytype_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `mail_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `Id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_Id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testing_product`
--
ALTER TABLE `testing_product`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`Province_Id`) REFERENCES `province` (`province_Id`),
  ADD CONSTRAINT `cities_ibfk_2` FOREIGN KEY (`Country_Id`) REFERENCES `countries` (`Country_Id`);

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_ibfk_1` FOREIGN KEY (`regions_id`) REFERENCES `regions` (`id`);

--
-- Constraints for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD CONSTRAINT `laboratory_ibfk_1` FOREIGN KEY (`laboratory_type`) REFERENCES `laboratorytype` (`laboratorytype_id`),
  ADD CONSTRAINT `laboratory_ibfk_2` FOREIGN KEY (`laboratory_city`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `laboratory_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `signup` (`id`),
  ADD CONSTRAINT `laboratory_ibfk_4` FOREIGN KEY (`laboratory_country`) REFERENCES `countries` (`Country_Id`);

--
-- Constraints for table `mails`
--
ALTER TABLE `mails`
  ADD CONSTRAINT `mails_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `signup` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `province`
--
ALTER TABLE `province`
  ADD CONSTRAINT `province_ibfk_1` FOREIGN KEY (`Country_Id`) REFERENCES `countries` (`Country_Id`);

--
-- Constraints for table `testing_product`
--
ALTER TABLE `testing_product`
  ADD CONSTRAINT `testing_product_ibfk_1` FOREIGN KEY (`laboratoryType`) REFERENCES `laboratorytype` (`laboratorytype_id`),
  ADD CONSTRAINT `testing_product_ibfk_2` FOREIGN KEY (`laboratory`) REFERENCES `laboratory` (`laboratory_id`),
  ADD CONSTRAINT `testing_product_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `signup` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
