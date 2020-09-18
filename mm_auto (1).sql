-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2020 at 12:00 PM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.3.22-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mm_auto`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `mobile_number` double NOT NULL,
  `vehical_number` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `mobile_number`, `vehical_number`, `created_date`, `updated_date`) VALUES
(8, 'Aadil', 7846513342, 'GJ022683', '2019-10-31 09:06:21', NULL),
(9, 'test2', 7845123263, 'GJ016532', '2019-10-31 09:23:19', NULL),
(10, 'Aslam', 9875412362, 'GJ278855', '2019-11-05 11:18:44', NULL),
(11, 'john', 7845001200, 'GJ012287', '2020-08-17 10:10:29', NULL),
(12, 'john', 7845001200, 'GJ012287', '2020-08-17 10:10:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_vehical_map`
--

CREATE TABLE `customer_vehical_map` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_vehical_map`
--

INSERT INTO `customer_vehical_map` (`id`, `customer_id`, `vehicle_id`) VALUES
(8, 1, 1),
(9, 1, 1),
(10, 1, 1),
(11, 1, 1),
(12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `cust_id`, `total_amount`, `created_date`, `updated_date`) VALUES
(4, 1, 1600, '2019-10-31 09:06:21', NULL),
(5, 1, 6950, '2019-10-31 09:23:19', NULL),
(6, 1, 2950, '2019-11-05 11:18:44', NULL),
(7, 1, 800, '2020-08-17 10:10:29', NULL),
(8, 1, 800, '2020-08-17 10:10:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parts_details`
--

CREATE TABLE `parts_details` (
  `id` int(11) NOT NULL,
  `part_name` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts_details`
--

INSERT INTO `parts_details` (`id`, `part_name`, `rate`) VALUES
(1, 'Break pads', 200),
(2, 'jumpers and barrings', 500);

-- --------------------------------------------------------

--
-- Table structure for table `parts_invoice_map`
--

CREATE TABLE `parts_invoice_map` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `parts_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts_invoice_map`
--

INSERT INTO `parts_invoice_map` (`id`, `invoice_id`, `parts_id`, `qty`, `amount`) VALUES
(1, 1, 1, 2, 400),
(2, 1, 1, 2, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `service_details`
--

CREATE TABLE `service_details` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_invoice_map`
--

CREATE TABLE `service_invoice_map` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehical_details`
--

CREATE TABLE `vehical_details` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `additional_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehical_details`
--

INSERT INTO `vehical_details` (`id`, `brand_name`, `model_name`, `additional_info`) VALUES
(8, 'Hundai', 'i20', 'CNG&Petrol with white color'),
(9, 'Honda', 'Verna', 'diesel'),
(10, 'Tata', 'Tiago', 'lxi with cng'),
(11, 'Tata', 'Tiago', 'WhiteColor'),
(12, 'Tata', 'Tiago', 'WhiteColor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_vehical_map`
--
ALTER TABLE `customer_vehical_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts_details`
--
ALTER TABLE `parts_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts_invoice_map`
--
ALTER TABLE `parts_invoice_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_details`
--
ALTER TABLE `service_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_invoice_map`
--
ALTER TABLE `service_invoice_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehical_details`
--
ALTER TABLE `vehical_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customer_vehical_map`
--
ALTER TABLE `customer_vehical_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `parts_details`
--
ALTER TABLE `parts_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `parts_invoice_map`
--
ALTER TABLE `parts_invoice_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `service_details`
--
ALTER TABLE `service_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_invoice_map`
--
ALTER TABLE `service_invoice_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehical_details`
--
ALTER TABLE `vehical_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
