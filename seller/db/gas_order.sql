-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2025 at 01:36 PM
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
-- Database: `gas_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `vendor_name` varchar(300) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(300) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL,
  `vendor_logo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `vendor_name`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`, `vendor_logo`) VALUES
(4017015, 'steve energies', 'steve', 'muchiri', 'steve@gmail.com', '66650fdc67ae490deb50af235b7e45214a34ec72', '0743313978', 'Bondo-Siaya Rd', 'siaya', '3f1d2114749d4d831e242eac927a705c1746934547.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1161381, 'Lake Gas'),
(3014649, 'Total Gas'),
(3827921, 'Men Gas'),
(5698737, 'Pro Gas'),
(6151879, 'K Gas');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(29, 2008725, '', 30, 1),
(33, 1048162, '', 30, 1),
(35, 0, '', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1451603, 'gas cylinders'),
(3056512, 'Empty Cylinders'),
(5319883, 'Gas Accessories'),
(8926671, 'Complete cylinders');

-- --------------------------------------------------------

--
-- Table structure for table `gas_weight`
--

CREATE TABLE `gas_weight` (
  `weight_id` int(100) NOT NULL,
  `gas_weight` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gas_weight`
--

INSERT INTO `gas_weight` (`weight_id`, `gas_weight`) VALUES
(1467326, 450),
(1704943, 85),
(3496444, 13),
(3535021, 200),
(3781238, 25),
(4508747, 60),
(5776411, 45),
(6639859, 6),
(6960378, 100),
(9623956, 600);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `qty` int(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `edit_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `card_no` varchar(100) NOT NULL,
  `card_H_N` varchar(100) NOT NULL,
  `exp_date` varchar(100) NOT NULL,
  `cvc` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `Total_Bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `vendor_id` int(100) NOT NULL,
  `vendor_name` varchar(200) NOT NULL,
  `product_cat` varchar(100) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `gas_weight` text NOT NULL,
  `status` int(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `vendor_id`, `vendor_name`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keywords`, `gas_weight`, `status`, `date_created`) VALUES
(1859783, 8499418, 'Total Energies', 'Complete cylinders', 'Lake Gas', 'Lake Gas ', 20500, 100, 'Lake Gas is an efficient cooking gas with proper guidelines put in place', '8864541_6151241_gas20.jpg', 'lake_gas ', '200', 0, '0000-00-00 00:00:00'),
(3668033, 2084011, 'Kosyin Gas Sellers', 'gas_cylinders', 'men', 'K Gas ', 3500, 50, 'very good gas', '6032658_gas28.jpg', 'pro_gas ', '13', 1, '2025-05-11 07:36:56'),
(3916612, 8499418, 'Total Energies', 'gas_cylinders', 'total', 'Total Energies', 13500, 100, 'very good and efficient for domestic and industrial use', '8520433_gas32.jpg', 'total_gas', '13', 1, '2025-05-12 09:38:39'),
(7125191, 8499418, 'Total Energies', 'gas_cylinders', 'men', 'Men Gas', 8500, 50, 'very good and efficient for domestic and industrial use', '5042782_4188467_gas19.png', 'men_gas', '13', 1, '2025-05-12 09:38:47'),
(7512952, 8499418, 'Total Energies', 'gas_cylinders', 'hash', 'Hash Gas', 10500, 20, 'very good and efficient for domestic and industrial use', '4785423_5141504_gas3.jpg', 'hash_gas', '45', 1, '2025-05-12 09:38:54'),
(7855629, 8499418, 'Total Energies', 'gas_cylinders', 'total', 'Total Energies', 13500, 100, 'very good and efficient for domestic and industrial use', '1299255_gas20.jpg', 'total_gas', '100', 1, '2025-05-12 09:39:02'),
(8293409, 2188924, 'Larry Energies', 'gas cylinders', 'Pro Gas', 'Oil Libya', 6500, 30, 'A proficient gas product designed for safe domestic and industrial use ', '2264957_gas40.jpg', 'pro_gas ', '25', 0, '0000-00-00 00:00:00'),
(9221989, 8499418, 'Total Energies', 'gas_cylinders', 'total', 'Total Energies', 8500, 50, 'very good and efficient for domestic and industrial use', '9921982_gas4.jpg', 'total_gas', '25', 1, '2025-05-12 09:39:13'),
(9497243, 2188924, 'Larry Energies', 'Complete cylinders', 'K Gas', 'New K Gas', 3500, 30, 'very good and efficient for domestic and industrial use', '5692475_gas10.jpg', 'k_gas', '13', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `review_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `customer_fname` varchar(100) NOT NULL,
  `customer_lname` varchar(100) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`review_id`, `customer_id`, `product_id`, `customer_fname`, `customer_lname`, `comment`) VALUES
(1739213, 30, 2008725, 'joshua', 'gatehi', 'Efficient for domestic and industrial use'),
(2303099, 30, 1048162, 'joshua', 'gatehi', 'Very nice product'),
(2812807, 30, 8499418, 'joshua', 'gatehi', 'They deliver their products in time'),
(5486028, 30, 8499418, 'joshua', 'gatehi', 'They deliver products in good time'),
(5793219, 31, 1048162, 'steve', 'muchiri', 'Efficient for domestic and industrial use');

-- --------------------------------------------------------

--
-- Table structure for table `seller_info`
--

CREATE TABLE `seller_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(300) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL,
  `user_type` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wish_list`
--

CREATE TABLE `tbl_wish_list` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_wish_list`
--

INSERT INTO `tbl_wish_list` (`id`, `member_id`, `product_id`) VALUES
(1271930, 0, 3916612),
(3904025, 30, 0),
(4027502, 30, 7855629),
(4931561, 0, 7125191),
(5929201, 30, 2008725),
(8459778, 30, 3668033);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(300) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `account_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`, `user_type`, `account_created`, `status`) VALUES
(29, 'peter', 'kuria', 'kuria@gmail.com', '66650fdc67ae490deb50af235b7e45214a34ec72', '0743313978', 'Bondo-Siaya Rd', 'siaya', '', '0000-00-00 00:00:00', 0),
(30, 'joshua', 'gatehi', 'joshuandungu2001@gmail.com', '66650fdc67ae490deb50af235b7e45214a34ec72', '0743313978', 'Bondo-Siaya Rd', '', '', '0000-00-00 00:00:00', 0),
(31, 'steve', 'muchiri', 'steve@gmail.com', '66650fdc67ae490deb50af235b7e45214a34ec72', '0719199728', 'Bondo-Siaya Rd', 'siaya', 'customer', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(50) NOT NULL,
  `vendor_name` varchar(300) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(300) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL,
  `account_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `vendor_logo` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`, `account_created`, `vendor_logo`, `status`) VALUES
(2084011, 'Kosyin Gas Sellers', 'peter', 'kibata', 'peter@gmail.com', '66650fdc67ae490deb50af235b7e45214a34ec72', '0719199728', 'Bondo-Siaya Rd', 'siaya', '0000-00-00 00:00:00', '9029373_9.jpg', 0),
(2188924, 'Larry Energies', 'joshua', 'ndungu', 'joshuandungu2001@gmail.com', '66650fdc67ae490deb50af235b7e45214a34ec72', '0743313978', '85-20303', 'Olkalou', '0000-00-00 00:00:00', '8552261_product-3.png', 0),
(8499418, 'Total Energies', 'hannah', 'wanjiru', 'hannah@gmail.com', '66650fdc67ae490deb50af235b7e45214a34ec72', '0719199728', 'Bondo-Siaya Rd', 'siaya', '0000-00-00 00:00:00', '3047799_gas32.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_reviews`
--

CREATE TABLE `vendor_reviews` (
  `review_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `customer_fname` varchar(100) NOT NULL,
  `customer_lname` varchar(100) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vendor_reviews`
--

INSERT INTO `vendor_reviews` (`review_id`, `customer_id`, `vendor_id`, `customer_fname`, `customer_lname`, `comment`) VALUES
(2001660, 30, 8499418, 'joshua', 'gatehi', 'They deliver their products in time');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `cat_id` (`cat_id`);

--
-- Indexes for table `gas_weight`
--
ALTER TABLE `gas_weight`
  ADD UNIQUE KEY `weight_id` (`weight_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `product_id` (`product_id`,`vendor_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD UNIQUE KEY `review_id` (`review_id`);

--
-- Indexes for table `seller_info`
--
ALTER TABLE `seller_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_wish_list`
--
ALTER TABLE `tbl_wish_list`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD UNIQUE KEY `user_id` (`vendor_id`),
  ADD UNIQUE KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `vendor_reviews`
--
ALTER TABLE `vendor_reviews`
  ADD UNIQUE KEY `review_id` (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller_info`
--
ALTER TABLE `seller_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
