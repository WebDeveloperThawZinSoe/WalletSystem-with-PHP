-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 06:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `ammount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `customer_id`, `ammount`) VALUES
(1, '09403077739', '1000'),
(2, '09251016448', '500'),
(3, '123', '0');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `password`, `pin`, `create_at`) VALUES
(1, 'Thaw Zin Soe', '09403077739', 'KBBynF4QWInpE', '123', '2022-03-19 02:40:21'),
(2, 'Thiri San', '09251016448', 'KBBynF4QWInpE', '123', '2022-03-19 02:40:34'),
(3, 'tester', '123', 'KBBynF4QWInpE', '123', '2022-03-19 03:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(225) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_ammount` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` text DEFAULT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `reciver_id` varchar(255) NOT NULL,
  `ammount` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `sender_id`, `reciver_id`, `ammount`, `description`, `created_at`) VALUES
(1, '09403077739', '09251016448', '100', '', '2022-03-19'),
(2, '09251016448', '09403077739', '300', '', '2022-03-19'),
(3, '123', '123', '123', '', '2022-03-19'),
(4, '123', '09403077739', '500', '', '2022-03-19'),
(5, '09403077739', '09251016448', '600', '', '2022-03-19'),
(6, '09251016448', '09251016448', '600', '', '2022-03-19'),
(7, '09403077739', '09251016448', '600', '', '2022-03-19'),
(8, '09251016448', '09403077739', '1000', '', '2022-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `widthdraw`
--

CREATE TABLE `widthdraw` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `widthdraw_phone` varchar(255) NOT NULL,
  `widthdraw_name` varchar(255) NOT NULL,
  `payment_ammount` varchar(255) NOT NULL,
  `remark` text DEFAULT NULL,
  `create_at` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widthdraw`
--
ALTER TABLE `widthdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `widthdraw`
--
ALTER TABLE `widthdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
