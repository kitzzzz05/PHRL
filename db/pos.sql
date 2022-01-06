-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 04:04 AM
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
(61, '2021-12-22', 'Wednesday', '08:30:00', '11:30:00', 'notAvail'),
(62, '2021-12-30', 'Thursday', '11:11:00', '12:12:00', 'notavail'),
(63, '2021-12-23', 'Thursday', '09:00:00', '13:00:00', 'notAvail'),
(64, '0001-11-11', 'Sunday', '11:11:00', '11:11:00', 'Avail');

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

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appId`, `userIc`, `scheduleId`, `services`, `appComment`, `status`, `start`, `end`, `color`, `payment`) VALUES
(54, 17, 61, 'HEADSET CLEARING', '', 'Processing', '2021-12-22 08:30:00', '2021-12-22 11:30:00', '#0071c5', ''),
(55, 17, 62, 'DarienKim', 'tete', 'Pending for Approval', '2021-12-30 11:11:00', '2021-12-30 12:12:00', '', 'upload/prof disc_1640059218.jpg'),
(56, 17, 63, 'Janley Services', '', 'Done', '2021-12-23 09:00:00', '2021-12-23 13:00:00', '#FF8C00', '');

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

--
-- Dumping data for table `backorder`
--

INSERT INTO `backorder` (`backid`, `purchase_id`, `product_id`, `supplier_id`, `quantity`, `date`, `status`) VALUES
(1, 66, 56, 5, 6, '2022-01-06', 'Pending');

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
(13, 'X Tires');

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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`userid`, `customer_name`, `address`, `contact`, `email`, `password`, `dob`) VALUES
(18, 'Kitzu Tires', 'a', '09650612312', 'kitz@gmai.com', 'e11a4f1d5e02e38d0ed06e463b29fc24', '1989-02-02'),
(19, 'Kitzu Tires', 'a', '09650612312', '123@gmail.com', 'e11a4f1d5e02e38d0ed06e463b29fc24', '1989-02-02');

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

--
-- Dumping data for table `dummy_cart`
--

INSERT INTO `dummy_cart` (`id`, `product_id`, `product_name`, `product_price`, `quantity`, `barcode_id`) VALUES
(61, 57, 'X Tires', 500, 2, ''),
(62, 58, 'X TIRES II', 500, 19, '');

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
  `inventory_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryid`, `userid`, `action`, `productid`, `quantity`, `inventory_date`) VALUES
(95, 1, 'Add Product', 56, 0, '2022-01-03 12:28:04'),
(96, 1, 'Update Stock', 56, 5, '2022-01-03 12:28:49'),
(97, 1, 'Update Stock', 56, 10, '2022-01-03 12:31:30'),
(98, 1, 'Update Stock', 56, 10, '2022-01-03 12:32:10'),
(99, 1, 'Update Stock', 56, 7, '2022-01-03 15:36:42'),
(100, 1, 'Add Product', 57, 0, '2022-01-03 19:35:38'),
(101, 1, 'Add Product', 58, 0, '2022-01-04 22:50:53'),
(102, 1, 'Add Product', 0, 0, '2022-01-05 23:08:56'),
(103, 1, 'Add Product', 0, 0, '2022-01-05 23:09:09'),
(104, 1, 'Add Product', 0, 0, '2022-01-05 23:09:33'),
(105, 1, 'Add Product', 0, 0, '2022-01-05 23:10:17'),
(106, 1, 'Add Product', 59, 0, '2022-01-05 23:11:27'),
(107, 1, 'Update Stock', 57, 2, '2022-01-06 02:34:42'),
(108, 1, 'Update Stock', 58, 4, '2022-01-06 02:34:42'),
(109, 1, 'Update Stock', 59, 3, '2022-01-06 02:34:42'),
(110, 1, 'Update Stock', 59, 3, '2022-01-06 02:37:20');

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
(56, 13, '', 'Kitzu', 1000, 100, 5, '', 7, '2022-01-03', '1', 0),
(57, 13, '', 'X Tires', 0, 100, 0, '', 5, '2022-01-03', 'asd', 0),
(58, 13, '', 'X TIRES II', 0, 1000, 0, '', 5, '2022-01-04', 'asd', 0),
(59, 13, '', 'SAMPLE', 0, 50, 0, '', 5, '2022-01-05', 'aaaaa', 0);

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
(8, 65, 56, 5000, 5, '2022-01-03', 5, 1),
(9, 66, 56, 5000, 10, '2022-01-03', 5, 0),
(10, 67, 56, 700, 7, '2022-01-03', 5, 1),
(11, 100, 57, 200, 2, '2022-01-06', 5, 0),
(12, 99, 58, 4000, 4, '2022-01-06', 5, 0),
(13, 98, 59, 150, 3, '2022-01-06', 5, 0),
(14, 101, 59, 150, 3, '2022-01-06', 5, 0);

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
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`userid`, `company_name`, `company_address`, `contact`) VALUES
(5, 'New Tires Corp.', 'Blk 98 lot 11 Molino Bacoor Cavite', '09650620136'),
(7, 'Kitzu', 'a', '123');

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', 0, '', '');

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
  MODIFY `scheduleId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `backorder`
--
ALTER TABLE `backorder`
  MODIFY `backid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_final`
--
ALTER TABLE `cart_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `dummy_cart`
--
ALTER TABLE `dummy_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purcase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `purchase_final`
--
ALTER TABLE `purchase_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `return_trans`
--
ALTER TABLE `return_trans`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
