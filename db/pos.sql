-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 07:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminschedule`
--

CREATE TABLE `adminschedule` (
  `scheduleId` int(10) NOT NULL,
  `scheduleDate` date NOT NULL,
  `scheduleDay` varchar(250) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `bookAvail` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminschedule`
--

INSERT INTO `adminschedule` (`scheduleId`, `scheduleDate`, `scheduleDay`, `startTime`, `endTime`, `bookAvail`) VALUES
(66, '2022-01-19', 'Wednesday', '14:26:00', '15:03:00', 'Avail');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appId` int(10) NOT NULL,
  `userIc` int(10) NOT NULL,
  `scheduleId` int(10) NOT NULL,
  `services` varchar(250) NOT NULL,
  `appComment` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `color` varchar(200) NOT NULL,
  `payment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `backorder`
--

CREATE TABLE `backorder` (
  `backid` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart_final`
--

CREATE TABLE `cart_final` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_final`
--

INSERT INTO `cart_final` (`id`, `cart_id`, `productid`, `quantity`, `amount`, `date`, `status`) VALUES
(36, 85, 64, 2, 2000, '2022-01-18', 'Sucess');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `category_name`) VALUES
(14, '123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `userid` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(250) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dummy_cart`
--

CREATE TABLE `dummy_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `barcode_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `inventory_date` datetime NOT NULL,
  `user` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryid`, `userid`, `action`, `productid`, `quantity`, `inventory_date`, `user`) VALUES
(156, 1, 'Buy Stock', 62, 8, '2022-01-18 14:07:06', 'test'),
(157, 1, 'Add Product', 63, 0, '2022-01-18 14:11:44', 'test'),
(158, 1, 'Delete Product', 63, 0, '2022-01-18 14:11:55', 'test'),
(159, 1, 'Add Product', 64, 0, '2022-01-18 14:15:27', 'test'),
(160, 1, 'Buy Stock', 64, 7, '2022-01-18 14:23:57', 'test'),
(161, 1, 'Purchase POS', 64, 2, '2022-01-18 14:26:35', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `barcode_id` varchar(25) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` double NOT NULL,
  `price` int(10) NOT NULL,
  `product_qty` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `supplierid` int(11) NOT NULL,
  `date` date NOT NULL,
  `about` varchar(250) NOT NULL,
  `damage_qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `barcode_id`, `product_name`, `product_price`, `price`, `product_qty`, `photo`, `supplierid`, `date`, `about`, `damage_qty`) VALUES
(64, 14, '3486485828', '123', 1000, 10, 5, '', 11, '2022-01-18', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purcase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `subtotal` int(25) NOT NULL,
  `purchase_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_final`
--

CREATE TABLE `purchase_final` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_purchase` int(11) NOT NULL,
  `quantity_purchase` int(11) NOT NULL,
  `date` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0 => Pending\r\n1 => Received\r\n2 => Confirm '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_final`
--

INSERT INTO `purchase_final` (`id`, `purchase_id`, `product_id`, `total_purchase`, `quantity_purchase`, `date`, `supplier_id`, `status`) VALUES
(33, 132, 62, 880, 8, '2022-01-18', 11, 0),
(34, 133, 64, 70, 7, '2022-01-18', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `return_trans`
--

CREATE TABLE `return_trans` (
  `return_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `return_type` tinyint(4) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesid` int(11) NOT NULL,
  `cartid` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `sales_total` double NOT NULL,
  `sales_date` datetime NOT NULL,
  `sales_type` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesid`, `cartid`, `customer_name`, `sales_total`, `sales_date`, `sales_type`, `product_name`, `status`) VALUES
(97, 85, 'Customer in POS', 2000, '2022-01-18 14:26:35', 'POS Purchase', '123', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `userid` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(150) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `person` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`userid`, `company_name`, `company_address`, `contact`, `person`) VALUES
(11, '123', '123', '123', '1231');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` int(1) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `contact` bigint(15) NOT NULL,
  `address` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `access`, `fullname`, `contact`, `address`, `photo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'test', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminschedule`
--
ALTER TABLE `adminschedule`
  ADD PRIMARY KEY (`scheduleId`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appId`);

--
-- Indexes for table `backorder`
--
ALTER TABLE `backorder`
  ADD PRIMARY KEY (`backid`);

--
-- Indexes for table `cart_final`
--
ALTER TABLE `cart_final`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `dummy_cart`
--
ALTER TABLE `dummy_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purcase_id`);

--
-- Indexes for table `purchase_final`
--
ALTER TABLE `purchase_final`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_trans`
--
ALTER TABLE `return_trans`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminschedule`
--
ALTER TABLE `adminschedule`
  MODIFY `scheduleId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `backorder`
--
ALTER TABLE `backorder`
  MODIFY `backid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart_final`
--
ALTER TABLE `cart_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dummy_cart`
--
ALTER TABLE `dummy_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purcase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `purchase_final`
--
ALTER TABLE `purchase_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `return_trans`
--
ALTER TABLE `return_trans`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
