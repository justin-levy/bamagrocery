-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2019 at 10:24 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bamagrocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADDRESS`
--

CREATE TABLE IF NOT EXISTS `ADDRESS` (
  `id` int(11) NOT NULL DEFAULT '0',
  `house_number` int(11) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `BUYER`
--

CREATE TABLE IF NOT EXISTS `BUYER` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `address` int(11) DEFAULT NULL,
  `default_store_id` int(11) DEFAULT NULL,
  `default_payment` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DELIVEREDBY`
--

CREATE TABLE IF NOT EXISTS `DELIVEREDBY` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `deliverer_username` varchar(30) DEFAULT NULL,
  `delivery_time` time DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `is_delivered` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `GROCERYSTORE`
--

CREATE TABLE IF NOT EXISTS `GROCERYSTORE` (
  `store_id` int(11) NOT NULL DEFAULT '0',
  `address_id` int(11) DEFAULT NULL,
  `store_name` varchar(20) DEFAULT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `phone` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ITEM`
--

CREATE TABLE IF NOT EXISTS `ITEM` (
  `item_id` int(11) NOT NULL DEFAULT '0',
  `item_name` varchar(25) DEFAULT NULL,
  `food_group` varchar(10) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `listed_price` float DEFAULT NULL,
  `wholesale_price` float DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MANAGES`
--

CREATE TABLE IF NOT EXISTS `MANAGES` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `store_address` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ORDERBY`
--

CREATE TABLE IF NOT EXISTS `ORDERBY` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `buyer_username` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ORDERFROM`
--

CREATE TABLE IF NOT EXISTS `ORDERFROM` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `store_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ORDERS`
--

CREATE TABLE IF NOT EXISTS `ORDERS` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `delivery_instructions` varchar(200) DEFAULT NULL,
  `delivery_time` time DEFAULT NULL,
  `order_placed_date` date DEFAULT NULL,
  `order_placed_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PAYMENTS`
--

CREATE TABLE IF NOT EXISTS `PAYMENTS` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `payment_name` varchar(20) NOT NULL DEFAULT '',
  `account_number` int(11) DEFAULT NULL,
  `routing_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SELECTITEM`
--

CREATE TABLE IF NOT EXISTS `SELECTITEM` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SOLDAT`
--

CREATE TABLE IF NOT EXISTS `SOLDAT` (
  `item_id` int(11) NOT NULL DEFAULT '0',
  `store_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SYSTEMINFORMATION`
--

CREATE TABLE IF NOT EXISTS `SYSTEMINFORMATION` (
  `system_id` int(11) NOT NULL DEFAULT '0',
  `user_codes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `user_password` varchar(20) DEFAULT NULL,
  `user_type` char(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADDRESS`
--
ALTER TABLE `ADDRESS`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `BUYER`
--
ALTER TABLE `BUYER`
  ADD PRIMARY KEY (`username`),
  ADD KEY `address` (`address`),
  ADD KEY `default_store_id` (`default_store_id`);

--
-- Indexes for table `DELIVEREDBY`
--
ALTER TABLE `DELIVEREDBY`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `deliverer_username` (`deliverer_username`);

--
-- Indexes for table `GROCERYSTORE`
--
ALTER TABLE `GROCERYSTORE`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `ITEM`
--
ALTER TABLE `ITEM`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `MANAGES`
--
ALTER TABLE `MANAGES`
  ADD PRIMARY KEY (`username`,`store_address`),
  ADD KEY `store_address` (`store_address`);

--
-- Indexes for table `ORDERBY`
--
ALTER TABLE `ORDERBY`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `buyer_username` (`buyer_username`);

--
-- Indexes for table `ORDERFROM`
--
ALTER TABLE `ORDERFROM`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `ORDERS`
--
ALTER TABLE `ORDERS`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `PAYMENTS`
--
ALTER TABLE `PAYMENTS`
  ADD PRIMARY KEY (`username`,`payment_name`);

--
-- Indexes for table `SELECTITEM`
--
ALTER TABLE `SELECTITEM`
  ADD PRIMARY KEY (`order_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `SOLDAT`
--
ALTER TABLE `SOLDAT`
  ADD PRIMARY KEY (`item_id`,`store_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `SYSTEMINFORMATION`
--
ALTER TABLE `SYSTEMINFORMATION`
  ADD PRIMARY KEY (`system_id`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BUYER`
--
ALTER TABLE `BUYER`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`username`) REFERENCES `USER` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `buyer_ibfk_2` FOREIGN KEY (`address`) REFERENCES `ADDRESS` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `buyer_ibfk_3` FOREIGN KEY (`default_store_id`) REFERENCES `GROCERYSTORE` (`store_id`) ON DELETE CASCADE;

--
-- Constraints for table `DELIVEREDBY`
--
ALTER TABLE `DELIVEREDBY`
  ADD CONSTRAINT `deliveredby_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ORDERS` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deliveredby_ibfk_2` FOREIGN KEY (`deliverer_username`) REFERENCES `USER` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `GROCERYSTORE`
--
ALTER TABLE `GROCERYSTORE`
  ADD CONSTRAINT `grocerystore_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `ADDRESS` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `MANAGES`
--
ALTER TABLE `MANAGES`
  ADD CONSTRAINT `manages_ibfk_1` FOREIGN KEY (`username`) REFERENCES `USER` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `manages_ibfk_2` FOREIGN KEY (`store_address`) REFERENCES `ADDRESS` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ORDERBY`
--
ALTER TABLE `ORDERBY`
  ADD CONSTRAINT `orderby_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ORDERS` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderby_ibfk_2` FOREIGN KEY (`buyer_username`) REFERENCES `USER` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `ORDERFROM`
--
ALTER TABLE `ORDERFROM`
  ADD CONSTRAINT `orderfrom_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ORDERS` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderfrom_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `GROCERYSTORE` (`store_id`) ON DELETE CASCADE;

--
-- Constraints for table `PAYMENTS`
--
ALTER TABLE `PAYMENTS`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`username`) REFERENCES `BUYER` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `SELECTITEM`
--
ALTER TABLE `SELECTITEM`
  ADD CONSTRAINT `selectitem_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ORDERS` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `selectitem_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `ITEM` (`item_id`) ON DELETE CASCADE;

--
-- Constraints for table `SOLDAT`
--
ALTER TABLE `SOLDAT`
  ADD CONSTRAINT `soldat_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `ITEM` (`item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `soldat_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `GROCERYSTORE` (`store_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
