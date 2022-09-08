-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2020 at 07:57 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deliverySystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `customer_id` smallint(4) NOT NULL,
  `customer_name` char(14) DEFAULT NULL,
  `customer_address` char(14) DEFAULT NULL,
  `customer_phone_no` int(8) DEFAULT NULL,
  `package_id` smallint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`customer_id`, `customer_name`, `customer_address`, `customer_phone_no`, `package_id`) VALUES
(2, 'Customer', 'Cork', 92836472, 16),
(5, 'CARL', 'Galway', 12345678, 30),
(6, 'TOM', 'DUBLIN', 87654321, 40);

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEE`
--

CREATE TABLE `EMPLOYEE` (
  `employee_id` smallint(4) NOT NULL,
  `employee_name` char(14) DEFAULT NULL,
  `department_no` smallint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `EMPLOYEE`
--

INSERT INTO `EMPLOYEE` (`employee_id`, `employee_name`, `department_no`) VALUES
(1, 'Mark', 3),
(2, 'Pat', 6),
(3, 'John', 9),
(4, 'Kamil', 21);

-- --------------------------------------------------------

--
-- Table structure for table `PACKAGES`
--

CREATE TABLE `PACKAGES` (
  `package_id` smallint(4) NOT NULL,
  `tracking_no` int(14) DEFAULT NULL,
  `employee_id` smallint(4) DEFAULT NULL,
  `delivery_date` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PACKAGES`
--

INSERT INTO `PACKAGES` (`package_id`, `tracking_no`, `employee_id`, `delivery_date`) VALUES
(16, 987654, 4, '02-DEC-20'),
(22, 486512, 1, '02-FEB-20'),
(30, 123567, 1, '8-OCT-19'),
(40, 987543, 2, '5-DEC-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `PACKAGES`
--
ALTER TABLE `PACKAGES`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `PACKAGES` (`package_id`);

--
-- Constraints for table `PACKAGES`
--
ALTER TABLE `PACKAGES`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `EMPLOYEE` (`employee_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
