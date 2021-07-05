-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2021 at 07:35 PM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created`, `updated`) VALUES
(1, 'Dairy Product', '1', '2021-05-12 11:02:14', '0000-00-00 00:00:00'),
(2, 'Beverages', '1', '2021-05-12 11:01:36', '0000-00-00 00:00:00'),
(4, 'Baking Goods', '1', '2021-05-12 14:22:20', '0000-00-00 00:00:00'),
(9, 'vegetable', '0', '2021-05-31 13:18:32', '2021-05-31 13:18:46'),
(10, 'Clothes', '1', '2021-07-01 00:00:00', '2021-07-01 00:00:00'),
(11, 'Prints', '0', '2021-07-01 00:00:00', '2021-07-01 00:00:00'),
(12, 'days', '1', '2021-06-30 00:00:00', '2021-07-09 00:00:00'),
(13, 'kite', '0', '2021-06-17 00:00:00', '2021-07-16 00:00:00'),
(14, 'birds', '1', '2021-06-30 00:00:00', '2021-06-01 00:00:00'),
(15, 'joe', '0', '2021-07-01 00:00:00', '2021-07-02 00:00:00'),
(16, 'shoes', '0', '2021-06-11 00:00:00', '2021-07-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `state_id`, `name`, `status`, `created`, `updated`) VALUES
(1, 14, 1, 'Sydney', '0', '0000-00-00 00:00:00', '2021-05-31 10:48:46'),
(2, 17, 2, 'Perth', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 12, 4, 'Basel', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 13, 5, 'Winterthur', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 18, 6, 'Geneva', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 11, 7, 'Castile', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 20, 8, 'Canary', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 20, 9, 'Basque', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 12, 10, 'Liverpool', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 13, 11, 'London', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 17, 12, 'Manchester', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 18, 13, 'New York', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 20, 14, 'Los Angeles', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 11, 5, 'Surat', '1', '2021-05-05 06:31:21', '2021-05-05 06:31:21'),
(19, 11, 5, 'hydrabad', '1', '2021-05-31 11:04:54', '2021-05-31 11:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `status`, `created`, `updated`) VALUES
(11, 'India', '1', '2021-05-20 00:00:00', '0000-00-00 00:00:00'),
(12, 'Spain', '1', '2021-05-20 00:00:00', '0000-00-00 00:00:00'),
(13, 'Australia', '1', '2021-05-20 00:00:00', '0000-00-00 00:00:00'),
(14, 'Japan', '0', '2021-05-20 00:00:00', '0000-00-00 00:00:00'),
(17, 'AVC', '1', '2021-05-25 00:00:00', '0000-00-00 00:00:00'),
(18, 'LA', '0', '2021-05-25 00:00:00', '0000-00-00 00:00:00'),
(20, 'e', '1', '0000-00-00 00:00:00', '2021-05-26 17:47:59'),
(22, 'Portu', '1', '2021-07-01 17:54:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `created`, `modified`, `status`) VALUES
(3, 'abc', '2021-05-07 09:30:55', '2021-05-07 09:30:55', 1),
(4, 'xyz', '2021-05-07 09:32:47', '2021-05-07 09:32:47', 1),
(5, 'xyz', '2021-05-07 09:41:05', '2021-05-07 09:41:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `file_name`, `uploaded_on`) VALUES
(6, 3, 'Screenshot_2021-05-03_133942.png', '2021-05-07 09:30:55'),
(7, 3, 'Screenshot_2021-05-03_141505.png', '2021-05-07 09:30:56'),
(8, 4, 'Screenshot_2021-04-19_144457.png', '2021-05-07 09:32:47'),
(9, 4, 'Screenshot_2021-05-03_133842.png', '2021-05-07 09:32:47'),
(10, 5, 'wp_1b.jpg', '2021-05-07 09:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `id` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `ls_cod` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pin`
--

INSERT INTO `pin` (`id`, `pincode`, `ls_cod`) VALUES
(1, 12209, 'Germany'),
(2, 5021, 'Maxico'),
(3, 5023, 'Maxico'),
(4, 8737, 'Brazil'),
(5, 21240, 'Finland'),
(6, 98128, 'USA'),
(7, 8737, 'Brazil'),
(8, 90110, 'Finland'),
(9, 70112, 'United States'),
(10, 380, 'Finland');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE `productimage` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `imagename` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productimage`
--

INSERT INTO `productimage` (`id`, `product_id`, `imagename`, `created`, `updated`, `status`) VALUES
(1, 2, 'hiii', '2021-05-31 18:47:56', '0000-00-00 00:00:00', '1'),
(2, 6, 'Screenshot from 2021-06-30 12-27-20.png', '2021-07-02 16:44:36', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `subcategory_id`, `created`, `updated`, `status`) VALUES
(2, 'Produ', 2, 6, '2021-05-12 18:31:13', '2021-05-31 11:07:00', '0'),
(6, 'test1', 1, 1, '2021-05-31 11:06:28', '0000-00-00 00:00:00', '0'),
(7, 'pro', 2, 3, '2021-07-06 00:00:00', '2021-07-16 00:00:00', '1'),
(8, 'test', 4, 11, '2021-07-17 00:00:00', '2021-07-15 00:00:00', '1'),
(9, 'pri', 9, 7, '2021-06-30 00:00:00', '2021-07-22 00:00:00', '1'),
(10, 'data', 1, 1, '2021-06-24 00:00:00', '2021-06-16 00:00:00', '1'),
(11, 'test3', 2, 2, '2021-06-09 00:00:00', '2021-07-16 00:00:00', '1'),
(12, 'roi', 1, 1, '2021-07-01 12:00:44', '0000-00-00 00:00:00', '0'),
(13, 'vegetables', 2, 5, '2021-07-01 12:01:12', '0000-00-00 00:00:00', '0'),
(14, 'fruits', 1, 3, '2021-07-01 12:01:27', '0000-00-00 00:00:00', '1'),
(15, 'roti', 1, 1, '2021-07-01 12:01:47', '0000-00-00 00:00:00', '1'),
(16, 'rice', 4, 7, '2021-07-01 12:02:10', '0000-00-00 00:00:00', '1'),
(17, 'eat', 1, 1, '2021-07-01 12:02:25', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `status`, `created`, `updated`) VALUES
(1, 0, 'New South Wales', '0', '0000-00-00 00:00:00', '2021-07-02 16:36:04'),
(3, 11, 'Queenland', '0', '0000-00-00 00:00:00', '2021-07-02 16:36:25'),
(4, 18, 'Bern', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 11, 'Uri', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 12, 'Zug', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 17, 'Aragon', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 14, 'Cantabria', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 11, 'Ceuta', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 12, 'Angus', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 11, 'BFPO', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 12, 'Hawaii', '0', '0000-00-00 00:00:00', '2021-05-26 10:49:07'),
(20, 17, 'Indoorw', '0', '2021-05-26 11:08:53', '2021-05-27 12:26:10'),
(23, 14, 'hell', '1', '2021-05-27 12:44:30', '2021-05-27 12:51:33'),
(25, 11, 'fgdfgdfg', '1', '2021-05-31 11:41:25', '2021-05-31 11:47:45'),
(26, 14, 'Poi', '0', '2021-05-31 13:04:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `st_id` int(11) NOT NULL,
  `st_name` varchar(50) NOT NULL,
  `co_id` int(11) NOT NULL,
  `sta_id` int(11) NOT NULL,
  `ci_id` int(11) NOT NULL,
  `location` varchar(500) NOT NULL,
  `time` datetime NOT NULL,
  `contact_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`, `status`, `created`, `updated`) VALUES
(1, 'cheeses', 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'eggs', 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'milk', 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'coffee', 2, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'juice', 2, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'soda', 2, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'sandwich loaves', 4, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'test.ji', 2, '1', '2021-05-31 18:13:24', '2021-05-31 18:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `userName` varchar(120) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `userName`, `password`) VALUES
(1, 'admin', 'Test@12345');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `firstName` varchar(200) DEFAULT NULL,
  `lastName` varchar(200) DEFAULT NULL,
  `emailId` varchar(200) DEFAULT NULL,
  `mobileNumber` char(12) DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isActive` int(1) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `firstName`, `lastName`, `emailId`, `mobileNumber`, `userPassword`, `regDate`, `isActive`, `lastUpdationDate`) VALUES
(4, 'Abc', 'Xyz', 'abc@xyz.com', '1234567908', 'Test@123', '2018-12-25 18:43:33', 1, NULL),
(5, 'P', 'G', 'isha1@gmail.com', '2345678909', 'Isha@123', '2021-04-29 08:33:10', 1, '2021-07-02 11:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `CustomerID` int(11) NOT NULL,
  `PostalCode` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`CustomerID`, `PostalCode`) VALUES
(1, '12209'),
(2, '5021'),
(3, '5023'),
(4, 'WA1 1DP'),
(5, '08737-363'),
(6, '01-012'),
(7, '21240'),
(8, '98128'),
(9, '08737-363'),
(10, '90110'),
(11, '70112'),
(12, '00380'),
(13, '7803'),
(14, 'ON L4M 3B1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(120) NOT NULL,
  `ContactNumber` char(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(120) NOT NULL,
  `ContactNumber` char(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`st_id`),
  ADD KEY `test3` (`co_id`),
  ADD KEY `test4` (`sta_id`),
  ADD KEY `test5` (`ci_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE `pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
