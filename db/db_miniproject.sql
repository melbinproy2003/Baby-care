-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 05:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(80) NOT NULL,
  `admin_password` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(2, 'Melbin P Roy', 'melbinproy76@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `booking_date` varchar(50) NOT NULL,
  `booking_amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `user_id`, `booking_status`, `booking_date`, `booking_amount`) VALUES
(19, 1, 2, '2023-09-05', '999.00'),
(20, 1, 2, '2023-10-01', '1599.00'),
(21, 1, 2, '2023-10-05', '1599.00'),
(22, 1, 2, '2023-10-05', '2598.00'),
(23, 1, 1, '2023-10-05', '1599.00'),
(24, 1, 2, '2023-10-05', '1599.00'),
(25, 1, 0, '2023-10-06', ''),
(26, 9, 2, '2023-10-06', '1599.00'),
(27, 9, 2, '2023-10-06', '666.00'),
(28, 0, 0, '2023-10-08', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brands`
--

INSERT INTO `tbl_brands` (`brand_id`, `brand_name`) VALUES
(1, 'Adidas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL DEFAULT 1,
  `cart_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `product_id`, `booking_id`, `cart_qty`, `cart_status`) VALUES
(55, 37, 19, 1, 2),
(56, 38, 20, 1, 5),
(58, 39, 21, 1, 5),
(59, 37, 22, 1, 1),
(60, 38, 22, 1, 1),
(61, 39, 23, 1, 1),
(62, 39, 24, 1, 1),
(63, 39, 25, 1, 0),
(64, 39, 26, 1, 2),
(65, 40, 27, 1, 1),
(66, 37, 28, 1, 0),
(67, 40, 28, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(2, 'c1'),
(4, 'c2'),
(5, 'c3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(4, 'ernakulam'),
(5, 'pathanamthitta'),
(6, 'kannur'),
(7, 'kollam'),
(8, 'idukki'),
(9, 'thrissur'),
(10, 'alapuzha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newuser`
--

CREATE TABLE `tbl_newuser` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_contact` varchar(12) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gender` varchar(8) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_photo` varchar(100) NOT NULL DEFAULT '0',
  `user_doj` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_newuser`
--

INSERT INTO `tbl_newuser` (`user_id`, `user_name`, `user_contact`, `user_dob`, `user_gender`, `user_address`, `place_id`, `user_email`, `user_password`, `user_photo`, `user_doj`) VALUES
(1, 'User 1', '7902769806', '2003-08-19', 'Male', 'Address of user 1', 2, 'user1@gmail.com', 'user1', 'R (2).jpeg', '2023-08-01'),
(2, 'user 2', '123456789', '2023-08-24', 'Male', 'address of user 2', 2, 'user2@gmail.com', 'user2', 'WhatsApp Image 2023-04-26 at 14.15.03.jpg', '2023-08-05'),
(3, 'user3', '9101023145', '2023-08-18', 'Male', 'Address of user 3', 6, 'user3@gmail.com', 'user3', 'R (2).jpeg', '2023-09-01'),
(4, 'melbin', '1234567890', '2004-07-08', 'Male', 'fsdghjkljjhfds', 14, 'melbin@gmail.com', '123', 'FVR.avif', '2023-09-03'),
(7, 'manu', '1234567809', '2003-02-28', 'Male', 'qwertyuiop', 0, 'manu@gmail.com', '1234567890', 'R (2).jpeg', '2023-09-03'),
(8, 'jelbin', '1234567809', '2004-09-16', 'Male', 'address of jelbin', 2, 'jelbin@gmail.com', 'jelbin', '0', '2023-10-02'),
(9, 'fayas', '1234567899', '2002-12-25', 'Male', 'address', 1, 'fayas@gmail.com', 'fayasaksar123', 'OIP.jpeg', '2023-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `district_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`district_id`, `place_id`, `place_name`) VALUES
(4, 1, 'kothamangalam'),
(5, 2, 'ranny'),
(8, 4, 'thodupuzha'),
(9, 6, 'thriprayar'),
(6, 7, 'iritty'),
(6, 8, 'muzhakkunnu'),
(4, 9, 'muzhakkunnu'),
(5, 10, 'konni'),
(8, 11, 'kattappana'),
(9, 12, 'kunnakulam'),
(7, 13, 'punalur'),
(7, 14, 'karunagappally'),
(10, 15, 'kayamkulam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_details` text NOT NULL,
  `product_photo` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `brand_id`, `product_details`, `product_photo`, `product_price`, `subcategory_id`, `shop_id`) VALUES
(37, ' Boys Full Sleeves Sweat Jogger Set Little Dogs Pr', 1, '(*)2-piece set with all-over print\r\n(*)Jogger trousers with ribbed waistband\r\n(*)Tie-cord for a secure fit - cord is fixed at the back to prevent little hands pulling it all the way through\r\n(*)Handy pockets\r\n(*)Sweat top with kangaroo pocket\r\n(*)Popper fastening at the shoulder for easy dressing (sizes up-to and including 12-18 months)\r\n(*)Taped neck seam to prevent irritation\r\n(*)Ribbed cuffs and hems throughout the set for a snug fit', 'ZB573-1.webp', 999, 9, 1),
(38, 'Boys Full Sleeves Bear Print Jogger Set -Blue', 1, '(*)2-piece outfit set\r\n(*)Responsibly sourced cotton\r\n(*)Interlock knit feels oh-so-soft, stretches easily yet keeps (*)its shape wash after wash\r\n(*)Roll-up ribbed waistband and turn-up ribbed cuffs\r\n(*)Long-sleeved printed bodysuit\r\n(*)Nickel-free popper fastenings\r\n(*)Softly bound hems', '410266560001_1.webp', 1599, 9, 1),
(39, 'Girls Full Sleeves Busy Garden Legging Set -Multic', 1, '(*)2-piece outfit set\r\n(*)Interlock knitted cotton dress feels soft, stretches easily yet keeps its shape wash after wash\r\n(*)Long sleeves with elasticated cuffs\r\n(*)Broderie lace collar\r\n(*)Covered back-neck seam for comfort\r\n(*)Bee appliqué and embroidered flowers\r\n(*)Popper fastening\r\n(*)Cotton leggings with added stretch for comfort\r\n(*)Wide, flat waistband', '410266709001_1.webp', 1599, 9, 4),
(40, 'milk powder', 1, 'esdrfghjl', 'OIP.jpeg', 666, 12, 4),
(41, 'Girls Full Sleeves Sweatshirt Heart Print - Beige', 1, 'Jersey sweat top\r\n(*)Loop-back cotton for cool comfort\r\n,(*)Nickel-free popper fastening for easy dressing (sizes up-to and including 12-18 months)\r\n,(*)Ribbed neck and cuffs for a snug fit\r\n,(*)Covered neck seam to prevent irritation', 'ZB085-1.webp', 499, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `shop_contact` int(20) NOT NULL,
  `shop_logo` varchar(100) NOT NULL,
  `shop_proof` varchar(100) NOT NULL,
  `shop_address` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `shop_email` varchar(50) NOT NULL,
  `shop_password` varchar(50) NOT NULL,
  `shop_vstatus` int(11) NOT NULL DEFAULT 0,
  `shop_doj` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `shop_contact`, `shop_logo`, `shop_proof`, `shop_address`, `place_id`, `shop_email`, `shop_password`, `shop_vstatus`, `shop_doj`) VALUES
(1, 'shop 1', 1122334455, 'R (2).jpeg', 'OIP.jpeg', 'address of shop 1', 1, 'shop1@gmail.com', 'shop1', 1, '2023-08-01'),
(3, 'shop 2', 1840925387, 'R (3).jpeg', 'OIP.jpeg', 'address of shop 2', 4, 'shop2@gmail.com', 'shop2', 2, '2023-08-10'),
(4, 'shop 3', 1234567890, 'wp6739200.webp', 'zotac-gpu-box-background-on-2560x1440.jpg', 'address of shop 3', 6, 'shop3@gmail.com', 'shop3', 1, '2023-08-21'),
(5, 'shop 4', 987654321, 'window.jpeg', 'R (1).jpeg', 'address of shop 4', 4, 'shop4@gmail.com', 'shop4', 0, '2023-08-21'),
(8, 'shop', 123456789, 'R (2).jpeg', 'OIP.jpeg', 'addhsdgldf', 7, 'nice@gmail.com', '0987', 0, '2023-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shopcomplaint`
--

CREATE TABLE `tbl_shopcomplaint` (
  `shopcomplaint_id` int(11) NOT NULL,
  `shopcomplaint_complaint` varchar(100) NOT NULL,
  `shopcomplaint_replay` varchar(100) DEFAULT NULL,
  `shopcomplaint_date` date NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shopcomplaint`
--

INSERT INTO `tbl_shopcomplaint` (`shopcomplaint_id`, `shopcomplaint_complaint`, `shopcomplaint_replay`, `shopcomplaint_date`, `shop_id`) VALUES
(1, 'complaint one', 'As per your request we are solving the issue that you put in front of as', '2023-08-21', 1),
(2, 'complaint two\n', '', '2023-08-21', 1),
(3, 'complaint of shop 3\r\n', 'onnumilla ketto', '2023-09-02', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shopfeedbacktoadmin`
--

CREATE TABLE `tbl_shopfeedbacktoadmin` (
  `shopfeedbacktoadmin_id` int(11) NOT NULL,
  `shopfeedbacktoadmin_feedback` varchar(100) NOT NULL,
  `shopfeedbacktoadmin_date` date NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shopfeedbacktoadmin`
--

INSERT INTO `tbl_shopfeedbacktoadmin` (`shopfeedbacktoadmin_id`, `shopfeedbacktoadmin_feedback`, `shopfeedbacktoadmin_date`, `shop_id`) VALUES
(1, 'vuuuhlvjkvbnsvv sdv vsvknk nk sfnksfjkl', '0000-00-00', 0),
(2, 'test number one', '2023-08-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_date` date NOT NULL,
  `stock_quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `product_id`, `stock_date`, `stock_quantity`) VALUES
(45, 37, '2023-10-05', 2),
(46, 38, '2023-10-05', 2),
(47, 39, '2023-10-05', 2),
(48, 39, '2023-10-05', 3),
(49, 40, '2023-10-06', 2),
(50, 40, '2023-10-06', 2),
(51, 41, '2023-10-08', 2),
(52, 37, '2023-10-08', 2),
(53, 38, '2023-10-08', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `category_id`, `subcategory_name`) VALUES
(9, 2, 'c1s1'),
(10, 2, 'c1s2'),
(11, 4, 'c2s1'),
(12, 5, 'c3s1'),
(13, 5, 'c3s2'),
(14, 5, 'c3s3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usercomplainttoadmin`
--

CREATE TABLE `tbl_usercomplainttoadmin` (
  `usercomplainttoadmin_id` int(11) NOT NULL,
  `usercomplainttoadmin_complaint` text NOT NULL,
  `usercomplainttoadmin_replay` text NOT NULL,
  `usercomplainttoadmin_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_usercomplainttoadmin`
--

INSERT INTO `tbl_usercomplainttoadmin` (`usercomplainttoadmin_id`, `usercomplainttoadmin_complaint`, `usercomplainttoadmin_replay`, `usercomplainttoadmin_date`, `user_id`) VALUES
(3, 'complaint und', 'ok ', '2023-09-26', 1),
(4, 'complaint und', '', '2023-09-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userfeedbacktoadmin`
--

CREATE TABLE `tbl_userfeedbacktoadmin` (
  `userfeedbacktoadmin_id` int(11) NOT NULL,
  `userfeedbacktoadmin_feedback` text NOT NULL,
  `userfeedbacktoadmin_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_userfeedbacktoadmin`
--

INSERT INTO `tbl_userfeedbacktoadmin` (`userfeedbacktoadmin_id`, `userfeedbacktoadmin_feedback`, `userfeedbacktoadmin_date`, `user_id`) VALUES
(1, 'sxxcrdfvgbhnjm', '0000-00-00', 2),
(2, 'i like it', '2023-09-02', 4),
(3, 'good\r\n', '2023-09-02', 1),
(4, 'qsdfcvbnegtdcur', '2023-09-02', 1),
(5, 'its okk', '2023-09-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userfeedbacktoshop`
--

CREATE TABLE `tbl_userfeedbacktoshop` (
  `feedback_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `feedback_review` varchar(100) NOT NULL,
  `feedback_count` int(11) NOT NULL,
  `feedback_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_userfeedbacktoshop`
--

INSERT INTO `tbl_userfeedbacktoshop` (`feedback_id`, `product_id`, `feedback_review`, `feedback_count`, `feedback_date`, `user_id`) VALUES
(5, 32, 'GGud product', 4, '2023-09-24', 1),
(6, 30, 'it  is good one', 5, '2023-09-24', 1),
(7, 32, 'it is good one', 3, '2023-09-26', 1),
(8, 32, 'it is good', 5, '2023-09-26', 1),
(9, 30, 'klm', 2, '2023-09-26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_newuser`
--
ALTER TABLE `tbl_newuser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_shopcomplaint`
--
ALTER TABLE `tbl_shopcomplaint`
  ADD PRIMARY KEY (`shopcomplaint_id`);

--
-- Indexes for table `tbl_shopfeedbacktoadmin`
--
ALTER TABLE `tbl_shopfeedbacktoadmin`
  ADD PRIMARY KEY (`shopfeedbacktoadmin_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_usercomplainttoadmin`
--
ALTER TABLE `tbl_usercomplainttoadmin`
  ADD PRIMARY KEY (`usercomplainttoadmin_id`);

--
-- Indexes for table `tbl_userfeedbacktoadmin`
--
ALTER TABLE `tbl_userfeedbacktoadmin`
  ADD PRIMARY KEY (`userfeedbacktoadmin_id`);

--
-- Indexes for table `tbl_userfeedbacktoshop`
--
ALTER TABLE `tbl_userfeedbacktoshop`
  ADD PRIMARY KEY (`feedback_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_newuser`
--
ALTER TABLE `tbl_newuser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_shopcomplaint`
--
ALTER TABLE `tbl_shopcomplaint`
  MODIFY `shopcomplaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_shopfeedbacktoadmin`
--
ALTER TABLE `tbl_shopfeedbacktoadmin`
  MODIFY `shopfeedbacktoadmin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_usercomplainttoadmin`
--
ALTER TABLE `tbl_usercomplainttoadmin`
  MODIFY `usercomplainttoadmin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_userfeedbacktoadmin`
--
ALTER TABLE `tbl_userfeedbacktoadmin`
  MODIFY `userfeedbacktoadmin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_userfeedbacktoshop`
--
ALTER TABLE `tbl_userfeedbacktoshop`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
