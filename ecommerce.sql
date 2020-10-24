-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2020 at 04:17 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `logo`, `status`, `url`) VALUES
(3, 'bannerOne', '1602862903car1.jpg', 1, 'http://localhost/New/KAPSC/#'),
(4, 'two', '15748295747.jpg', 1, 'http://localhost:8080/estore_new/product.php?id=2'),
(5, 'three', '15748300579.jpg', 1, NULL),
(6, 'four', '157483052011.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1= Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `status`) VALUES
(2, 'DEMO', '1602864536121443928_3429151793789510_4625543748396335253_n.png', 1),
(3, 'Samsung', '1571492170samsung-logo-preview.png', 1),
(4, 'Nokia', '1571409600nokia-logo.png', 1),
(6, 'Adidas', '15726356361200px-Adidas_Logo.svg.png', 1),
(7, 'Puma', '1572635778download.png', 1),
(8, 'Nike', '1572635550air-force-nike-free-swoosh-adidas-nike-logo-png.jpg', 1),
(9, 'C A', '1572667664CA_sports_logo-600x315.png', 1),
(10, 'Reebok', '1572667770kisspng-reebok-pump-logo-adidas-stock-photography-reebook-5b0c072c866d32.6978167315275149245506.jpg', 1),
(11, 'Kookaburra', '160278180949321446_2328773617352068_8117514560539197440_o.jpg', 1),
(12, 'SG Tournament', '1572670255logo.jpg', 1),
(13, 'Nivia', '1572671211nivia.png', 1),
(14, 'Rokomari', '1572672240download.png', 1),
(15, 'Panjeree', '1572672895Panjeree-Publications-cni.jpg', 1),
(16, 'SureSuccess', '1572673161lecture.jpg', 1),
(17, 'Jupiter', '1572673267download.jfif', 1),
(18, 'H P', '1572679094hewlett-packard-brand-logo-product-design-hewlett-packard-png-hp-logo-png-900_560.jpg', 1),
(19, 'Dell', '1572679166kisspng-dell-laptop-logo-containing-jpg-preview-5ade74cd4c6472.2313818815245283333129.jpg', 1),
(20, 'Lenovo', '1572679252images (1).jfif', 1),
(21, 'Easy', '1572681929easy-f-logo-600x315.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1= Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `status`) VALUES
(1, 'Fashion', 0, 1),
(2, 'Electronics', 0, 1),
(3, 'Sports', 0, 1),
(4, 'Books', 0, 1),
(5, 'T-Shirt', 1, 1),
(6, 'Computer', 2, 1),
(8, 'Jewellery', 0, 1),
(9, 'Football', 3, 1),
(10, 'Cricket Bats', 3, 1),
(11, 'Cricket Balls', 3, 1),
(12, 'Cricket Gloves', 3, 1),
(13, 'Racquets', 3, 1),
(14, 'Shuttlecocks', 3, 1),
(15, 'Dumbbells', 3, 1),
(16, 'Chess', 3, 1),
(17, 'Stationery', 0, 1),
(18, 'Bangla', 4, 1),
(19, 'English', 4, 1),
(20, 'Physics', 4, 1),
(21, 'Mathematics', 4, 1),
(22, 'Chemistry', 4, 1),
(23, 'Biology', 4, 1),
(24, 'ISLAM Shikha ', 4, 1),
(25, 'Phone', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `password` varchar(190) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Active, 0=Inactive',
  `news_subscribe` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Enable, 0=Disable',
  `facebook_id` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `company`, `address`, `city`, `postcode`, `country`, `state`, `password`, `status`, `news_subscribe`, `facebook_id`, `created_at`, `updated_at`) VALUES
(1, 'Md Ariful Islam', 'arif@gmail.com', '01923834492', 'PNT', '320/5 Mirpur-14', 'Dhaka', '1216', 'Bangladesh', 'Dhaka', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, NULL, '2019-11-08 08:35:02', NULL),
(2, '', '', '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, 0, NULL, '2019-11-23 14:22:59', NULL),
(3, '1', 'mjkk@gmail.com', '123456', '', '6', '6', '6', 'Albania', 'Khulna', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, NULL, '2019-11-23 14:24:16', NULL),
(4, 'MD. Mizanur Rahman', 'mizanurrahamanraihan@gmail.com', '8801749969029', 'PNT', '230 Mirpur-1', 'Dhaka', '1216', 'Bangladesh', 'Dhaka', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, NULL, '2019-11-23 14:27:36', '2019-11-29 10:34:06'),
(5, 'MD. Jewel', 'bmunionhschool@gmail.com', '01923865784', 'PNT', 'Dhaka', 'Dhaka', '1212', 'Bangladesh', 'Dhaka', 'aa1a473bf6416cc1a47b23e61044ed1e', 1, 0, NULL, '2019-11-23 14:29:24', '2019-11-23 15:23:09'),
(6, 'monir', 'monir@gmail.com', '123', '123', 'Dhaka', 'Dhaka', '1213', 'Algeria', '', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, NULL, '2019-11-23 15:00:32', NULL),
(7, 'jewel', 'bmunionhschool@gmail.com', '01940642344', 'bn', 'bbm', 'dh', '14100', 'Bangladesh', 'Dhaka', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, NULL, '2019-11-23 15:05:36', '2019-11-23 15:16:51'),
(8, 'Md. Nazmul Bhuiyan', 'nazmulbhuiyan1992@gmail.com', '01871063334', '', 'Gandaria,Dhaka', 'Dhaka', '1204', 'Bangladesh', 'Dhaka', '060e3bed0fbf32e8f7b3bfc89566ac74', 1, 1, NULL, '2019-11-23 15:16:38', NULL),
(10, 'Sumon mitra', 'sumonmitra1000686@gmail.com', '01734845200', 'DIA', 'Dhanmundi,Dhaka', 'dhaka', '2100', 'Bangladesh', 'Dhaka', 'b7e5f435347ae40400aee50421461ff2', 1, 0, NULL, '2019-11-23 15:21:54', NULL),
(11, 'M R Raihan', 'mizanurcse1452@gmail.com', '01749969029', 'PNT', 'Mirpur-1', 'Dhaka', '1206', 'Bangladesh', 'Dhaka', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, NULL, '2019-11-29 10:28:40', NULL),
(12, 'MD. Sariful Islam', 'pervej.fac@gmail.com', '8801721821491', 'PNT', 'Dhaka', 'Dhaka', '1213', 'Bangladesh', 'Dhaka', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, NULL, '2019-11-29 10:38:37', NULL),
(13, 'M R Raihan', 'mizanurahmed1452@gmail.com', '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1, '603895713752831', '2019-12-13 07:50:35', NULL),
(14, 'Amaz Uddin', 'amaz@gmail.com', '01478523698', '', 'Noakhali', 'Noakhali', '3800', 'Bangladesh', 'Dhaka', '25d55ad283aa400af464c76d713c07ad', 1, 1, '', '2020-10-16 15:43:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, NULL, '2019-11-21 11:51:32', NULL),
(2, NULL, '2019-11-21 11:51:32', NULL),
(3, NULL, '2019-11-21 11:52:38', NULL),
(4, NULL, '2019-11-21 11:52:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_details_id`, `order_id`, `product_id`, `name`, `price`, `quantity`, `image`) VALUES
(1, 1, 1, 'Samsung Galaxy Note7', '3456.00', 1, 'Samsung-Galaxy-Note7.jpg'),
(2, 2, 1, 'Samsung Galaxy Note7', '3456.00', 1, 'Samsung-Galaxy-Note7.jpg'),
(3, 2, 3, 'Nike Strike Footballs', '1197.00', 1, 'Nike Strike Footballs.jpg'),
(4, 2, 4, 'Adidas Telstar', '1800.00', 1, 'Adidas Telstar.jpg'),
(5, 3, 29, 'man sitting on concrete barrier near building', '500.00', 1, 'man sitting on concrete barrier near building.jpg'),
(6, 3, 32, 'man wearing white crew-neck t-shirts', '568.00', 1, 'man wearing white crew-neck t-shirts.jpg'),
(7, 4, 1, 'Samsung Galaxy Note7', '3456.00', 1, 'Samsung-Galaxy-Note7.jpg'),
(8, 4, 32, 'man wearing white crew-neck t-shirts', '568.00', 1, 'man wearing white crew-neck t-shirts.jpg'),
(9, 5, 3, 'Nike Strike Footballs', '1197.00', 1, 'Nike Strike Footballs.jpg'),
(10, 5, 4, 'Adidas Telstar', '1800.00', 1, 'Adidas Telstar.jpg'),
(11, 5, 22, 'HP Desktop Pro G2 Core i3 8th Gen Brand PC', '48000.00', 1, 'HP Desktop Pro G2 Core i3 8th Gen Brand PC.jpg'),
(12, 6, 29, 'man sitting on concrete barrier near building', '500.00', 1, 'man sitting on concrete barrier near building.jpg'),
(13, 7, 31, 'Kariban T-shirt, Forest Green', '450.00', 1, 'Kariban T-shirt, Forest Green.jpg'),
(14, 8, 29, 'man sitting on concrete barrier near building', '500.00', 1, 'man sitting on concrete barrier near building.jpg'),
(15, 9, 32, 'man wearing white crew-neck t-shirts', '568.00', 1, 'man wearing white crew-neck t-shirts.jpg'),
(16, 10, 31, 'Kariban T-shirt, Forest Green', '450.00', 1, 'Kariban T-shirt, Forest Green.jpg'),
(17, 10, 32, 'man wearing white crew-neck t-shirts', '568.00', 1, 'man wearing white crew-neck t-shirts.jpg'),
(18, 11, 31, 'Kariban T-shirt, Forest Green', '450.00', 1, 'Kariban T-shirt, Forest Green.jpg'),
(19, 11, 32, 'man wearing white crew-neck t-shirts', '568.00', 1, 'man wearing white crew-neck t-shirts.jpg'),
(20, 12, 31, 'Kariban T-shirt, Forest Green', '450.00', 11, 'Kariban T-shirt, Forest Green.jpg'),
(21, 12, 7, 'CA SOMO PRO English Willow Cricket Bat', '1300.00', 2, 'CA SOMO PRO English Willow Cricket Bat.png'),
(22, 13, 31, 'Kariban T-shirt, Forest Green', '450.00', 11, 'Kariban T-shirt, Forest Green.jpg'),
(23, 13, 7, 'CA SOMO PRO English Willow Cricket Bat', '1300.00', 2, 'CA SOMO PRO English Willow Cricket Bat.png'),
(24, 14, 1, 'Samsung Galaxy Note7', '3456.00', 1, 'Samsung-Galaxy-Note7.jpg'),
(25, 15, 2, 'Nokia 7 Plus 64GB Phone - Black', '536.00', 1, 'Nokia-7-Plus-64GB-Phone---Black.jpg'),
(26, 16, 3, 'Nike Strike Footballs', '1197.00', 1, 'Nike Strike Footballs.jpg'),
(27, 17, 31, 'Kariban T-shirt, Forest Green', '450.00', 3, 'Kariban T-shirt, Forest Green.jpg'),
(28, 18, 21, 'HP ProDesk 400 G5 MT Core i5 8th Gen Business PC', '57000.00', 1, 'HP ProDesk 400 G5 MT Core i5 8th Gen Business PC.jpg'),
(29, 19, 29, 'man sitting on concrete barrier near building', '500.00', 1, 'man sitting on concrete barrier near building.jpg'),
(30, 20, 20, 'English Learning E-Books', '500.00', 2, 'English Learning E-Books.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `ship_name` varchar(255) NOT NULL,
  `ship_mobile` varchar(30) NOT NULL,
  `ship_address` varchar(255) NOT NULL,
  `ship_city` varchar(50) NOT NULL,
  `ship_postcode` varchar(30) NOT NULL,
  `ship_country` varchar(100) NOT NULL,
  `shipping_method` varchar(30) NOT NULL,
  `payment_method` varchar(30) NOT NULL,
  `payment_status` enum('Unpaid','Paid','Partial Paid') NOT NULL DEFAULT 'Unpaid',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Processing, 2=Shipped, 3=Delivered, 4=Cancel',
  `amount` decimal(10,2) NOT NULL,
  `shipping_amount` decimal(3,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `ship_name`, `ship_mobile`, `ship_address`, `ship_city`, `ship_postcode`, `ship_country`, `shipping_method`, `payment_method`, `payment_status`, `status`, `amount`, `shipping_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Md Ariful Islam', '01923834492', '320/5 Mirpur-14', 'Dhaka', '1216', 'Bangladesh', '150.00', 'sslcommerz', 'Unpaid', 0, '3606.00', '9.99', '2019-11-08 14:20:31', NULL),
(2, 1, 'Md Ariful Islam', '01923834492', '320/5 Mirpur-14', 'Dhaka', '1216', 'Bangladesh', '150.00', 'sslcommerz', 'Unpaid', 0, '6603.00', '9.99', '2019-11-08 14:40:08', NULL),
(3, 3, '1', '123456', '6', '6', '6', 'Austria', '0.00', 'COD', 'Unpaid', 0, '1068.00', '0.00', '2019-11-23 14:26:24', NULL),
(4, 3, 'mon', '123456', 'dhaka', 'dhaka', '1212', 'Bangladesh', '0.00', 'COD', 'Unpaid', 0, '4024.00', '0.00', '2019-11-23 14:40:54', NULL),
(5, 3, 'mon3', '123', 'dhaka', 'dhaka', '1213', 'Bangladesh', '0.00', 'COD', 'Unpaid', 0, '50997.00', '0.00', '2019-11-23 14:43:25', NULL),
(6, 3, 'mon4', '123', 'dhaka', 'dhaka', '1214', 'Bangladesh', '0.00', 'COD', 'Unpaid', 0, '500.00', '0.00', '2019-11-23 14:49:01', NULL),
(7, 6, 'monir01', '123456', 'dhaka', 'dhaka', '1213', 'Bangladesh', '0.00', 'COD', 'Unpaid', 0, '450.00', '0.00', '2019-11-23 15:01:53', NULL),
(8, 6, 'monir02', '123456', 'dhaka', 'dhaka', '1213', 'Bangladesh', '0.00', 'COD', 'Unpaid', 0, '500.00', '0.00', '2019-11-23 15:02:58', NULL),
(9, 6, 'mon3', '123456', 'dhaka', 'dhaka', '1213', 'Bangladesh', '0.00', 'COD', 'Unpaid', 0, '568.00', '0.00', '2019-11-23 15:05:00', NULL),
(10, 5, '', '', '', '', '', '', '0.00', 'sslcommerz', 'Unpaid', 0, '1018.00', '0.00', '2019-11-23 15:21:25', NULL),
(11, 5, 'jewel', '01940642344', 'bbm', 'dh', '14100', 'Bangladesh', '0.00', 'sslcommerz', 'Unpaid', 0, '1018.00', '0.00', '2019-11-23 15:21:40', NULL),
(12, 10, 'Sumon mitra', '01734845200', 'Dhanmundi,Dhaka', 'dhaka', '2100', 'Bangladesh', '0.00', 'sslcommerz', 'Unpaid', 0, '7550.00', '0.00', '2019-11-23 15:23:46', NULL),
(13, 10, 'Sumon mitra', '01734845200', 'Dhanmundi,Dhaka', 'dhaka', '2100', 'Bangladesh', '0.00', 'COD', 'Unpaid', 0, '7550.00', '0.00', '2019-11-23 15:25:00', NULL),
(14, 4, 'Md. Arif', '0192387564895', 'Dhaka', 'Dhaka', '1212', 'Bangladesh', '150.00', 'COD', 'Unpaid', 0, '3606.00', '9.99', '2019-11-29 10:35:52', NULL),
(15, 12, 'MD. Sariful Islam', '8801721821491', 'Dhaka', 'Dhaka', '1213', 'Bangladesh', '0.00', 'COD', 'Unpaid', 0, '536.00', '0.00', '2019-11-29 10:39:44', NULL),
(16, 1, 'Naimur Rahman Alif', '01794668409', 'Race Course', 'Cumilla', '3500', 'Bangladesh', '0.00', 'COD', 'Unpaid', 0, '1197.00', '0.00', '2020-10-08 04:24:56', NULL),
(17, 1, '', '', '', '', '', '', '0.00', 'COD', 'Unpaid', 0, '1350.00', '0.00', '2020-10-15 18:57:41', NULL),
(18, 1, 'Naimur Rahman Alif', '01794668409', 'Race Course', 'Cumilla', '3500', 'Bangladesh', '0.00', 'COD', 'Unpaid', 0, '57000.00', '0.00', '2020-10-15 19:01:54', NULL),
(19, 1, 'Naimur Rahman Alif', '01794668409', 'Race Course', 'Cumilla', '3500', 'Bangladesh', '0.00', 'COD', 'Unpaid', 0, '500.00', '0.00', '2020-10-15 19:05:14', NULL),
(20, 14, 'Naimur Rahman Alif', '01794668409', 'Race Course', 'Cumilla', '3500', 'Bangladesh', '0.00', 'COD', 'Unpaid', 0, '1000.00', '0.00', '2020-10-16 15:44:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(30) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_feature` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=yes, 0=no',
  `is_new` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `sku`, `price`, `quantity`, `image`, `description`, `status`, `is_feature`, `is_new`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Samsung Galaxy Note7', 'n-72', '3418.00', 200, 'Samsung-Galaxy-Note7.jpg', 'The lowest price of Samsung Galaxy Note7 is P39,900 at Gigahertz. Galaxy Note7 is not available in other stores at this time. This smartphone is available in 64GB, 128GB storage variants. The latest price of Samsung Galaxy Note7 was updated on Jun 24, 2019, 09:22.', 1, 1, 1, '2019-10-18 14:10:32', '2020-10-08 04:27:19'),
(2, 2, 4, 'Nokia 7 Plus 64GB Phone - Black', 'n-72', '536.00', 10, 'Nokia-7-Plus-64GB-Phone---Black.jpg', 'Test', 1, 1, 0, '2019-10-19 13:07:50', '2019-11-01 19:17:04'),
(3, 9, 8, 'Nike Strike Footballs', 'AA-23', '1197.00', 46, 'Nike Strike Footballs.jpg', 'A&nbsp;football&nbsp;<span>is a ball inflated with air that is used to play one of the various sports known as football. In these games, with some exceptions, goals or points are scored only when the ball enters one of two designated goal-scoring areas; football games involve the two teams each trying to move the ball in opposite directions along the field of play.<br><br></span>bladders, and often with plastic covers. Various leagues and games use different balls, though they all have one of the following basic shapes:<ul><li>a sphere: used in Association football and Gaelic football</li><li>a prolate spheroid</li><li>either with rounded ends: used in the rugby codes and Australian football</li><li>or with more pointed ends: used in American football and Canadian football</li></ul>', 1, 1, 1, '2019-11-01 19:28:08', '2019-11-21 10:49:10'),
(4, 9, 6, 'Adidas Telstar', 'BA-34', '1800.00', 150, 'Adidas Telstar.jpg', 'The company was started by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Adolf_Dassler\" target=\"\" rel=\"\">Adolf Dassler</a>&nbsp;in his mother\'s house; he was joined by his elder brother&nbsp;<a href=\"https://en.wikipedia.org/wiki/Rudolf_Dassler\" target=\"\" rel=\"\">Rudolf</a>&nbsp;in 1924 under the name Dassler Brothers Shoe Factory. Dassler assisted in the development of spiked running shoes (<a href=\"https://en.wikipedia.org/wiki/Track_spikes\" target=\"\" rel=\"\">spikes</a>) for multiple athletic events. To enhance the quality of spiked athletic footwear, he transitioned from a previous model of heavy metal spikes to utilising canvas and rubber. Dassler persuaded U.S. sprinter&nbsp;<a href=\"https://en.wikipedia.org/wiki/Jesse_Owens\" target=\"\" rel=\"\">Jesse Owens</a>&nbsp;to use his handmade spikes at the&nbsp;<a href=\"https://en.wikipedia.org/wiki/1936_Summer_Olympics\" target=\"\" rel=\"\">1936 Summer Olympics</a>. In 1949, following a breakdown in the relationship between the brothers, Adolf created Adidas, and Rudolf established&nbsp;<a href=\"https://en.wikipedia.org/wiki/Puma_(brand)\" target=\"\" rel=\"\">Puma</a>, which became Adidas\' business rival.<a href=\"https://en.wikipedia.org/wiki/Adidas#cite_note-history-1\" target=\"\" rel=\"\">[1]</a>', 1, 1, 0, '2019-11-01 19:51:14', NULL),
(5, 9, 7, 'Puma Unisex', 'q-432', '1234.00', 228, 'Puma Unisex.jpg', '<div>The playing field has become as diverse as its players â€“ and we love it. PUMA supplies athletes with the right equipment on the fields, tracks and courses. To achieve that, we\'ve done what any athlete before us has done: we focused.<br></div>', 1, 1, 0, '2019-11-01 20:04:48', NULL),
(6, 10, 10, 'Reebok Dhoni English Willow Cricket Bat', 'T-43', '3450.00', 68, 'Reebok Dhoni English Willow Cricket Bat.jpg', 'Reebok is a world-renowned brand of sports equipment, and it has a premium collection of bats. The Blast is considered one of the best in Reebokâ€™s line of cricket bats. The bat has been designed in a traditional way with a heavy shape, but, interestingly, its pick up is amazingly light. Reebok also puts together the expertise of the best designers, and the latest bat technology to craft this bat.<span>Made of Grade I English willow, the Sarawak cane handle enhances shock absorption and performance, and has thick edges. <br><br><br>&nbsp; &nbsp; The bat has been endorsed by some of the&nbsp;<a href=\"https://sportsshow.net/greatest-batsmen-all-time/\" target=\"_blank\" rel=\"noopener noreferrer\">greatest batsmen of all time</a>&nbsp;such as MS Dhoni, <br>&nbsp; &nbsp; Yuvraj Singh, Gautam Gambhir and Sanath Jayasuriya. <br>&nbsp; &nbsp; This one surely deserves its mention among the best cricket bats in the world.</span>', 1, 1, 1, '2019-11-02 04:17:35', '2019-11-21 10:49:21'),
(7, 10, 9, 'CA SOMO PRO English Willow Cricket Bat', 'EW-3', '1300.00', 156, 'CA SOMO PRO English Willow Cricket Bat.png', '<ul><li>Made Of Unique English Willow,With 8+ Grains&nbsp;</li><li>Used and recommended by \"Tillakaratne Dilshan\" great Sri Lankan legend&nbsp;</li><li>Stout Edges With Extra Meat in the middle&nbsp;</li><li>Responsive &amp; Trustworthy&nbsp;</li><li>Superb Balance and Pickup&nbsp;</li><li>Pre-knocked,Fitted with Toe Guard and Clear Face Tape&nbsp;</li><li>Innovative embossed stickers with 3D-Effect</li><li>Provided with Special Bat Cover&nbsp;</li><li>Weight: 2lb 7oz to 3lbs</li><li>Size: SH</li></ul>', 1, 1, 0, '2019-11-02 04:29:31', NULL),
(8, 11, 11, 'Kookaburra Pace Cricket Ball ', 'TR-7', '3456.00', 197, 'Kookaburra Pace Cricket Ball .jpg', 'It is one of the premium balls from the worldâ€™s number one ball manufacturer. Kookaburra Pace ball is hand stitched 4 piece construction ball. It has a 3 layer quilted centre plus the best thing about it is that it has Grad 2 alum tanned steer hide cover. This ball is waterproof which means that it can be used when it is raining or there is a lot of mist in the field as it can bear the toughest conditions. It also has air dried core along with the layer encased with best quality cork wound with 100% wool.The quality of the ball is superb and it is the dream of most of the players as it is one of the most renowned balls and used by many cricketers. It mostly comes in two colours- red and white, but usually red attracts most of the players and is mostly in demand. The weight of the ball is 156g and 142g.', 1, 1, 0, '2019-11-02 04:42:05', NULL),
(9, 11, 12, 'SG Club - Red Cricket Ball', 'SG-43', '2993.00', 321, 'SG Club - Red Cricket Ball.jpg', 'It is a superior quality four piece ball designed from best quality alum tanned leather, selected from top grade hide. This ball is also waterproof and resistant to all types of weather. It also includes a naturally seasoned inner core. This ball has excellent shape retention and good abrasion resistance. It has a premium quality center constructed with layers of Portuguese cork.This ball comes in red colour and still is always in the interest of the ambitious players. The kind of stitching that is done on this ball makes it more durable, and gives it more bounce and swing. The weight of a single ball is around 156-160g.', 1, 1, 0, '2019-11-02 04:53:55', NULL),
(10, 11, 7, 'Puma Karbon Leather Ball', 'PM-76', '4300.00', 42, 'Puma Karbon Leather Ball.jpg', 'This ball is made with an Australian Alum Tanned Leather, along with 3 layers quilted center covered with good linen machine stitching P.U. finish. It is a waterproof ball so that the players can even play when there is a lot of moisture in the ground. This ball is covered with a fine line stitching which makes it more robust.The ballâ€™s weight is around 150-160 g. It is a 4 piece constructed ball along with one of the finest inner core. The ball is designed after thorough research, development and feedback which takes a lot of time and money .All this is done so that the brand can make the ball more innovative and high quality.', 1, 1, 0, '2019-11-02 05:04:38', NULL),
(11, 11, 13, 'Nivia Cricket Tennis Ball ', 'NV-09', '120.00', 296, 'Nivia Cricket Tennis Ball .jpg', 'A cricket ball is made with a core of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Cork_(material)\" target=\"\" rel=\"\">cork</a>, which is layered with tightly wound string, and covered by a leather case with a slightly raised sewn seam. In a top-quality ball suitable for the highest levels of competition, the covering is constructed of four pieces of leather shaped similar to the peel of a quartered orange, but one hemisphere is rotated by 90 degrees with respect to the other. The \"equator\" of the ball is stitched with string to form the ball\'s prominent seam, with six rows of stitches. The remaining two joins between the leather pieces are stitched internally forming the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Quarter_seam\" target=\"\" rel=\"\">quarter seam</a>. Lower-quality balls with a two-piece covering are also popular for practice and lower-level competition due to their lower cost.', 1, 1, 0, '2019-11-02 05:12:33', NULL),
(12, 24, 17, 'Al Quran Al Kareem', 'J-09', '600.00', 400, 'Al Quran Al Kareem.jpg', 'Jupiter Publications, Dhaka,&nbsp;Bangladesh. 4331 likes Â· 10 talking about this. One of the leading&nbsp;publications&nbsp;in&nbsp;Bangladesh<span>&nbsp;established with a view to..<br><br></span>&nbsp;à¦¶à¦¿à¦•à§à¦·à¦¾à¦°à§à¦¥à§€à¦¦à§‡à¦° à¦•à¦²à§à¦¯à¦¾à¦£à§‡à¦° à¦ªà§à¦°à¦¤à¦¿ à¦²à¦•à§à¦·à§à¦¯ à¦°à§‡à¦–à§‡ Lecture&nbsp;Publications Limited&nbsp;à¦—à§à¦¨à¦—à¦¤ à¦®à¦¾à¦¨ ... à¦…à¦¨à¦²à¦¾à¦‡à¦¨ à¦ªà¦°à§€à¦•à§à¦·à¦¾à¦¯à¦¼ à¦…à¦‚à¦¶à¦—à§à¦°à¦¹à¦£ à¦à¦¬à¦‚ à¦¬à¦¿à¦·à¦¯à¦¼à¦­à¦¿à¦¤à§à¦¤à¦¿à¦• E-book&nbsp;à¦“ Made Easy à¦…à¦¨à§à¦¯à¦¾à¦¨à§à¦¯<br>', 1, 1, 0, '2019-11-02 05:59:39', NULL),
(13, 18, 17, 'Tenida Samagra', 'Ju-98', '300.00', 50, 'Tenida Samagra.jpg', 'Tenida series was written by Bengali author Narayan Gangopadhyay. It is based upon four boys who live in Potoldanga. They visit different places where they solve mysteries.Their leader is Tanida whose real name is Bhojohori Mukherji(à¦­à¦œà¦¹à¦°à¦¿ à¦®à§à¦–à¦¾à¦°à§à¦œà§€). He is a very funny character. He makes fabricated stories to show his bravery and courage. He has a large nose which is similar to Mount Mainak and a great appetite.Kyabla is the most intelligent and brave of all. His real name is (à¦•à§à¦¶à¦² à¦®à¦¿à¦¤à§à¦°). He is a very bright student and solves mysteries when the group falls into traps.Pyalaram is the narrator of the stories. Pyalaramâ€™s real name is Kamalesh Banerjee (à¦•à¦®à¦²à§‡à¦¶ à¦¬à§à¦¯à¦¾à¦¨à¦¾à¦°à§à¦œà§€). He is also not a good student (like tenida) and very coward.The final group member is Habul. His full name is Swarnendu Sen (Bengali: à¦¸à§à¦¬à¦°à§à¦£à§‡à¦¨à§à¦¦à§ à¦¸à§‡à¦¨). He is a good student but coward like pyalaram.', 1, 1, 0, '2019-11-02 06:06:22', NULL),
(14, 24, 17, 'Al Quran Al Kareem Mutarjum (Local)', 'L-87', '500.00', 700, 'Al Quran Al Kareem Mutarjum (Local).jpg', 'Tenida series was written by Bengali author Narayan Gangopadhyay. It is based upon four boys who live in Potoldanga. They visit different places where they solve mysteries.Their leader is Tanida whose real name is Bhojohori Mukherji(à¦­à¦œà¦¹à¦°à¦¿ à¦®à§à¦–à¦¾à¦°à§à¦œà§€). He is a very funny character. He makes fabricated stories to show his bravery and courage. He has a large nose which is similar to Mount Mainak and a great appetite.Kyabla is the most intelligent and brave of all. His real name is (à¦•à§à¦¶à¦² à¦®à¦¿à¦¤à§à¦°). He is a very bright student and solves mysteries when the group falls into traps.Pyalaram is the narrator of the stories. Pyalaramâ€™s real name is Kamalesh Banerjee (à¦•à¦®à¦²à§‡à¦¶ à¦¬à§à¦¯à¦¾à¦¨à¦¾à¦°à§à¦œà§€). He is also not a good student (like tenida) and very coward.The final group member is Habul. His full name is Swarnendu Sen (Bengali: à¦¸à§à¦¬à¦°à§à¦£à§‡à¦¨à§à¦¦à§ à¦¸à§‡à¦¨). He is a good student but coward like pyalaram.', 1, 1, 0, '2019-11-02 06:16:01', NULL),
(15, 24, 16, 'Al Falah Digital Al Quran', 'S-92', '1200.00', 250, 'Al Falah Digital Al Quran.jpg', 'Tenida series was written by Bengali author Narayan Gangopadhyay. It is based upon four boys who live in Potoldanga. They visit different places where they solve mysteries.Their leader is Tanida whose real name is Bhojohori Mukherji(à¦­à¦œà¦¹à¦°à¦¿ à¦®à§à¦–à¦¾à¦°à§à¦œà§€). He is a very funny character. He makes fabricated stories to show his bravery and courage. He has a large nose which is similar to Mount Mainak and a great appetite.Kyabla is the most intelligent and brave of all. His real name is (à¦•à§à¦¶à¦² à¦®à¦¿à¦¤à§à¦°). He is a very bright student and solves mysteries when the group falls into traps.Pyalaram is the narrator of the stories. Pyalaramâ€™s real name is Kamalesh Banerjee (à¦•à¦®à¦²à§‡à¦¶ à¦¬à§à¦¯à¦¾à¦¨à¦¾à¦°à§à¦œà§€). He is also not a good student (like tenida) and very coward.The final group member is Habul. His full name is Swarnendu Sen (Bengali: à¦¸à§à¦¬à¦°à§à¦£à§‡à¦¨à§à¦¦à§ à¦¸à§‡à¦¨). He is a good student but coward like pyalaram.', 1, 1, 0, '2019-11-02 06:19:58', NULL),
(16, 24, 15, 'Al-Quran', 'P-06', '800.00', 119, 'Al-Quran.jpg', 'Tenida series was written by Bengali author Narayan Gangopadhyay. It is based upon four boys who live in Potoldanga. They visit different places where they solve mysteries.Their leader is Tanida whose real name is Bhojohori Mukherji(à¦­à¦œà¦¹à¦°à¦¿ à¦®à§à¦–à¦¾à¦°à§à¦œà§€). He is a very funny character. He makes fabricated stories to show his bravery and courage. He has a large nose which is similar to Mount Mainak and a great appetite.Kyabla is the most intelligent and brave of all. His real name is (à¦•à§à¦¶à¦² à¦®à¦¿à¦¤à§à¦°). He is a very bright student and solves mysteries when the group falls into traps.Pyalaram is the narrator of the stories. Pyalaramâ€™s real name is Kamalesh Banerjee (à¦•à¦®à¦²à§‡à¦¶ à¦¬à§à¦¯à¦¾à¦¨à¦¾à¦°à§à¦œà§€). He is also not a good student (like tenida) and very coward.The final group member is Habul. His full name is Swarnendu Sen (Bengali: à¦¸à§à¦¬à¦°à§à¦£à§‡à¦¨à§à¦¦à§ à¦¸à§‡à¦¨). He is a good student but coward like pyalaram.', 1, 1, 0, '2019-11-02 06:21:26', NULL),
(17, 19, 17, 'Nagas Story Book and Computer Knowledge Book ', 'SA-87', '900.00', 120, 'Nagas Story Book and Computer Knowledge Book .jpg', 'Jupiter&nbsp;is a science fiction novel by American writer Ben Bova. This novel is part of the Grand Tour series of novels. It was first published in 2000.&nbsp;Contents. 1 Plot synopsis; 2 Characters; 3 Reception; 4 References to actual history, geography and contemporary science; 5&nbsp;Publication&nbsp;history.Jupiter&nbsp;Life Line Hospitals&nbsp;Limited&nbsp;0-5 yrs Thane ... The job description is as follows: Write academic&nbsp;content&nbsp;for college level management books ... A renowned&nbsp;publication&nbsp;house requires smart,confident,well - educated female candidates for&nbsp;', 1, 1, 0, '2019-11-02 06:34:22', NULL),
(18, 19, 15, 'Southern Homewares Small New English Dictionary Book ', 'A-12', '700.00', 119, 'Southern Homewares Small New English Dictionary Book .jpg', 'The British Council is the UKâ€™s international organisation for cultural relations and educational opportunities. We are on the ground in six continents and over 100 countries, bringing international opportunity to life, every day. Find out more about us.', 1, 1, 0, '2019-11-02 06:37:58', NULL),
(19, 19, 15, 'Ripples English', 'P-43', '300.00', 118, 'Ripples English.jpg', 'The British Council is the UKâ€™s international organisation for cultural relations and educational opportunities. We are on the ground in six continents and over 100 countries, bringing international opportunity to life, every day. Find out more about us.', 1, 1, 0, '2019-11-02 06:41:47', NULL),
(20, 19, 15, 'English Learning E-Books', 'Po-54', '500.00', 121, 'English Learning E-Books.jpg', 'The British Council is the UKâ€™s international organisation for cultural relations and educational opportunities. We are on the ground in six continents and over 100 countries, bringing international opportunity to life, every day. Find out more about us.', 1, 1, 0, '2019-11-02 06:44:23', NULL),
(21, 6, 18, 'HP ProDesk 400 G5 MT Core i5 8th Gen Business PC', 'Hp-43', '57000.00', 28, 'HP ProDesk 400 G5 MT Core i5 8th Gen Business PC.jpg', 'HP ProDesk 400 G5 MT PC with Intel core i5-8500 processor having 3 GHz base frequency, up to 4.1 GHz with IntelÂ® Turbo Boost Technology, 9 MB cache, 6 cores and 4GB DDR4 RAM is an American stylish brand that also contains 1TB 7200RPM of SATA storage to ensure greater productivity.In addition, it has IntelÂ® B360 Chipset, Intel HD Graphics, Win 10 Operating System and HP slim supermulti SATA DVD writer.This multifunction extreme enterprise compatible device comes with 3 years of warranty.Find your required configured workstation at best price in Chittagong, Rangpur Dhaka &amp; Sylhet. Now you can order online and have the delivery at any place inside Bangladesh.', 1, 1, 0, '2019-11-02 07:30:18', NULL),
(22, 6, 18, 'HP Desktop Pro G2 Core i3 8th Gen Brand PC', 'HP-543', '48000.00', 28, 'HP Desktop Pro G2 Core i3 8th Gen Brand PC.jpg', '<span>Intel Core i3-8100 Processor (6M Cache, 3.60 GHz)<br></span><span>4GB DDR4 2666MHz<br></span><span>Intel UHD 630 Graphics<br></span><span>1TB SATA-7200rpm HDD<br></span><br><br>HP Desktop Pro G2 Core i3 Desktop PC With&nbsp;Intel Core i3-8100 Processor (6M Cache, 3.60 GHz). It has&nbsp;1TB SATA-7200rpm HDD,4GB DDR4 Ram, USB Keyboard &amp; Mouse. In additional it has also Intel UHD Graphics, DVD Writer,NETWORK INTERFACE Integrated Realtek RTL8111HSH-CG GbE, Realtek RTL8821CE-CG 802.11a/b/g/n/ac (1x1) with Bluetooth M.2 PCIe and Free Dos Operating System.<br>', 1, 1, 0, '2019-11-02 07:36:11', NULL),
(23, 6, 19, 'Dell OptiPlex 7060-MT Core i7 8th Gen Brand PC', 'D-54', '67000.00', 18, 'Dell OptiPlex 7060-MT Core i7 8th Gen Brand PC.jpg', '<div>Dell Optiplex 7060 MT brand PC with Intel core i7-8700 MT processor having 3.2 GHz base and turbo 4.6 GHz frequency, 12M Cache and 8GB DDR4 RAM is an essential business desktop that also contains 1TB 7200RPM of SATA storage to ensure greater workability. Its basic components include Dell 18.5\'\' wide screen monitor with LED Back Light and standard Dell USB Keyboard &amp; optical mouse. In addition, it has Intel HD graphics, free DOS operating system and DVD writer. This best-in-class security and manageability in a space-saving design comes with 3 years of warranty.</div><div>If you are required of productivity and versatility in your PC than Dell Optiplex is the solution for you. We offer the best price in Rangpur, Chattagram, Dhaka, Khulna &amp; Sylhet. Now you can order online and have the delivery at any location inside Bangladesh.</div>', 1, 1, 0, '2019-11-02 07:41:23', NULL),
(24, 6, 19, 'Dell OptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'D-98', '45000.00', 51, 'Dell OptiPlex 5060 Micro Core i5 8th Gen Brand PC.jpg', 'Dell OptiPlex 5060 Micro Brand PC With&nbsp;IntelÂ® Coreâ„¢ i5-8500 (9M Cache, 3.00 GHz up to 4.10 GHz) Processor.&nbsp; It has&nbsp;4GB DDR4 2666MHz,1TB HDD,18.5\" Monitor,IntelÂ® Q370 Chipset, IntelÂ® HD Graphics 630,Optical Drive DVD, Internal Dell Business audio speaker,Integrated RealtekÂ® RTL8111HSD Ethernet LAN 10/100/1000,Dell USB Business Keyboard,Dell USB Optical Mouse,240W PSU Active PFC Mini Tower,Operating System Free DOS.<br><span>03 years Warranty<br><br></span><span>ntelÂ® Coreâ„¢ i5-8500 <br>Processor (9M Cache, 3.00 GHz up to 4.10 GHz)<span>MotherboardIntel Q370<br>&nbsp;Chipset</span>RAM4GB DDR4 2666MHz<span>Graphics CardIntel<br>HD Graphics 630</span>Storage1TB HDDMonitor18.5\" MonitorAudioInternal Dell Business audio speaker<span>Power SupplyA/C Adapter â€“ 90W</span></span><span><br><br><br></span>', 1, 1, 0, '2019-11-02 07:45:15', NULL),
(25, 25, 3, 'Samsung Galaxy A50s Full Specifications', 'S-09', '27000.00', 48, 'Samsung Galaxy A50s Full Specifications.jpg', 'Samsung Galaxy A50s comes with 6.5 inches Full HD+ Super AMOLED screen. It has a a Full-View waterdrop notch design. The back camera is of triple 48+8+5 MP with PDAF, LED flash, depth sensor etc. and Ultra HD video recording. The front camera is of 32 MP. Samsung Galaxy A50s comes with 4000 mAh big battery and 15W fast charging. It has 4 or 6 GB RAM, up to 2.3 GHz octa-core CPU and Mali-G72 MP3 GPU. It is powered by Exynos 9611 (10nm) chipset. The device comes with 64 or 128 GB internal storage and dedicated MicroSD slot. There is an in-display fingerprint sensor in this phone.', 1, 1, 0, '2019-11-02 07:53:03', NULL),
(26, 25, 3, 'Samsung Galaxy A30s Full Specifications', 'S-87', '22990.00', 42, 'Samsung Galaxy A30s Full Specifications.jpg', 'Samsung Galaxy A30s comes with 6.5 inches Super AMOLED HD+ screen. It has a a Full-View waterdrop notch design. The back camera is of triple 25+8+5 MP with PDAF, LED flash, depth sensor etc. and Full HD video recording. The front camera is of 16 MP. Samsung Galaxy A30s comes with 4000 mAh big battery and 15W fast charging. It has 3 or 4 GB RAM, up to 1.8 GHz octa-core CPU and Adreno 506 GPU. It is powered by Exynos 7904 (14 nm) chipset. The device comes with 32, 64 or 128 GB internal storage and dedicated MicroSD slot. There is an in-display fingerprint sensor in this phone.', 1, 1, 1, '2019-11-02 07:55:47', '2019-11-27 04:56:42'),
(27, 25, 3, 'Samsung Galaxy Note 10+ Full Specifications', 'S-04', '79000.00', 15, 'Samsung Galaxy Note 10+ Full Specifications.jpg', 'You may ask yourself this question, for the price of&nbsp;Samsung Galaxy Note 10+, one can buy a fine quality Laptop and a premium level smartphone. Wouldnâ€™t that be a better choice altogether? The answer is probably yes, as far as any regular user is concerned. However, Galaxy Note 10+ comes with 12 GB RAM, 7 nm ultra fast processor, Bluetooth enabled stylus, 512 GB built-in storage, up to 1 TB MicroSD option, fabulous camera, 45W super fast charging, Wireless Screen Mirroring &amp; HDMI, Samsung DeX Experience and a 6.8 inches Quad HD+ Dynamic AMOLED screen.&nbsp;This is not just a smartphone. It is a powerhouse with extreme versatility.Take&nbsp;Samsung DeX&nbsp;for example. You can connect this device to a monitor and it becomes a super-powerful yet mini CPU with a touchscreen and&nbsp;Stylus. Add a Bluetooth keyboard and mouse to get comfortable with your new generation desktop concept. On top of that, you can use Stylus for art projects, presentations, or in the office. Would you rather go for entertainment stuff? Then simply connect it to a smart TV via the&nbsp;Wireless Mirroring&nbsp;option and play YouTube or Netflix on your TV or play PUBG in a big screen.', 1, 1, 0, '2019-11-02 07:57:52', NULL),
(28, 25, 4, 'Nokia 106 Dual SIM Feature Phone', 'N-54', '2000.00', 43, 'Nokia 106 Dual SIM Feature Phone.jpg', 'Nokia 220 (4G)&nbsp;comes with dual SIM. The main specialty of this phone is that it comes with 4G support. Apps like WhatsApp and Facebook are pre-installed. There is stereo FM radio in this device which is playable with 3.5mm earphone. The display is 2.4 inches. Some basic games are playable in this feature phone. There are also flashlight, loudspeaker, dedicated MicroSD slot, 1200 mAh battery, VGA back camera with flash, video recording, Bluetooth and so on.There is no front camera on Nokia 220 (4G) which is one of its drawbacks.', 1, 1, 0, '2019-11-02 08:03:01', NULL),
(29, 5, 21, 'man sitting on concrete barrier near building', 'E-76', '500.00', 127, 'man sitting on concrete barrier near building.jpg', 'However, there are broad principles that apply to all channels around selling merchandise. ... data to find out where your primary audience viewed your&nbsp;content&nbsp;from, ... This creator promotes his official merch, including&nbsp;T-shirts&nbsp;with the â€œBERM&nbsp;...', 1, 1, 0, '2019-11-02 08:16:26', NULL),
(30, 5, 21, 'The North Face Men\'s Easy T-Shirt ', 'E-98', '750.00', 39, 'The North Face Men\'s Easy T-Shirt .jpg', 'An effective brand strategy gives you a major edge in increasingly competitive markets. But what exactly does \"branding\" mean? Simply put, your brand is your promise to your customer. It tells them what they can expect from your products and services, and it differentiates your offering from that of your competitors. Your brand is derived from who you are, who you want to be and who people perceive you to be.Are you the innovative maverick in your industry? Or the experienced, reliable one? Is your product the high-cost, high-quality option, or the low-cost, high-value option? You can\'t be both, and you can\'t be all things to all people. Who you are should be based to some extent on who your target customers want and need you to be.The foundation of your brand is your logo. Your website, packaging and promotional materials--all of which should integrate your logo--communicate your brand.Your brand strategy is how, what, where, when and to whom you plan on', 1, 1, 0, '2019-11-02 08:18:57', NULL),
(31, 5, 21, 'Kariban T-shirt, Forest Green', 'E-980', '450.00', 78, 'Kariban T-shirt, Forest Green.jpg', 'An effective brand strategy gives you a major edge in increasingly competitive markets. But what exactly does \"branding\" mean? Simply put, your brand is your promise to your customer. It tells them what they can expect from your products and services, and it differentiates your offering from that of your competitors. Your brand is derived from who you are, who you want to be and who people perceive you to be.Are you the innovative maverick in your industry? Or the experienced, reliable one? Is your product the high-cost, high-quality option, or the low-cost, high-value option? You can\'t be both, and you can\'t be all things to all people. Who you are should be based to some extent on who your target customers want and need you to be.The foundation of your brand is your logo. Your website, packaging and promotional materials--all of which should integrate your logo--communicate your brand.Your brand strategy is how, what, where, when and to whom you plan on', 1, 1, 0, '2019-11-02 08:21:09', NULL),
(32, 5, 21, 'man wearing white crew-neck t-shirts', 'E-412', '568.00', 130, 'man wearing white crew-neck t-shirts.jpg', 'An effective brand strategy gives you a major edge in increasingly competitive markets. But what exactly does \"branding\" mean? Simply put, your brand is your promise to your customer. It tells them what they can expect from your products and services, and it differentiates your offering from that of your competitors. Your brand is derived from who you are, who you want to be and who people perceive you to be.Are you the innovative maverick in your industry? Or the experienced, reliable one? Is your product the high-cost, high-quality option, or the low-cost, high-value option? You can\'t be both, and you can\'t be all things to all people. Who you are should be based to some extent on who your target customers want and need you to be.The foundation of your brand is your logo. Your website, packaging and promotional materials--all of which should integrate your logo--communicate your brand.Your brand strategy is how, what, where, when and to whom you plan on', 1, 1, 0, '2019-11-02 08:25:19', NULL),
(33, 1, 4, 'Demo', 'n-77', '496.00', 7, 'Demo.jpg', ';jklkblkj', 1, 1, 1, '2020-10-15 16:49:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_name`) VALUES
(1, 2, 'add_img_0_1571490470.jpg'),
(2, 2, 'add_img_1_1571490470.png'),
(3, 2, 'add_img_2_1571490470.jpg'),
(4, 2, 'add_img_3_1571490471.jpg'),
(5, 2, 'add_img_4_1571490471.jpg'),
(6, 3, 'add_img_0_1572636488.png'),
(7, 3, 'add_img_1_1572636488.png'),
(8, 3, 'add_img_2_1572636488.png'),
(9, 3, 'add_img_3_1572636488.png'),
(10, 3, 'add_img_4_1572636488.png'),
(11, 4, 'add_img_0_1572637874.jpg'),
(12, 4, 'add_img_1_1572637874.jpg'),
(13, 4, 'add_img_2_1572637874.png'),
(14, 4, 'add_img_3_1572637874.png'),
(15, 4, 'add_img_4_1572637874.png'),
(16, 4, 'add_img_5_1572637874.png'),
(17, 5, 'add_img_0_1572638688.jpeg'),
(18, 5, 'add_img_1_1572638688.jfif'),
(19, 5, 'add_img_2_1572638688.jfif'),
(20, 5, 'add_img_3_1572638688.jpg'),
(21, 5, 'add_img_4_1572638688.jpg'),
(22, 6, 'add_img_0_1572668255.jpg'),
(23, 6, 'add_img_1_1572668255.jfif'),
(24, 6, 'add_img_2_1572668255.jpg'),
(25, 6, 'add_img_3_1572668255.png'),
(26, 6, 'add_img_4_1572668255.png'),
(27, 6, 'add_img_5_1572668255.png'),
(28, 6, 'add_img_6_1572668255.png'),
(29, 7, 'add_img_0_1572668971.jpg'),
(30, 7, 'add_img_1_1572668971.jpg'),
(31, 7, 'add_img_2_1572668971.jpg'),
(32, 7, 'add_img_3_1572668972.png'),
(33, 7, 'add_img_4_1572668972.jpg'),
(34, 8, 'add_img_0_1572669725.png'),
(35, 8, 'add_img_1_1572669725.png'),
(36, 8, 'add_img_2_1572669725.jfif'),
(37, 8, 'add_img_3_1572669725.jfif'),
(38, 8, 'add_img_4_1572669725.jpg'),
(39, 8, 'add_img_5_1572669725.jpg'),
(40, 8, 'add_img_6_1572669725.jpg'),
(41, 9, 'add_img_0_1572670435.jpg'),
(42, 9, 'add_img_1_1572670435.jfif'),
(43, 9, 'add_img_2_1572670435.jfif'),
(44, 9, 'add_img_3_1572670435.jfif'),
(45, 9, 'add_img_4_1572670435.jfif'),
(46, 9, 'add_img_5_1572670435.jpg'),
(47, 9, 'add_img_6_1572670435.jpg'),
(48, 10, 'add_img_0_1572671078.jpg'),
(49, 10, 'add_img_1_1572671078.jfif'),
(50, 10, 'add_img_2_1572671078.jfif'),
(51, 10, 'add_img_3_1572671078.jpg'),
(52, 10, 'add_img_4_1572671078.jpg'),
(53, 10, 'add_img_5_1572671078.jpg'),
(54, 11, 'add_img_0_1572671553.jpg'),
(55, 11, 'add_img_1_1572671553.jpg'),
(56, 11, 'add_img_2_1572671553.jpg'),
(57, 11, 'add_img_3_1572671553.jfif'),
(58, 11, 'add_img_4_1572671553.jpg'),
(59, 11, 'add_img_5_1572671553.jpg'),
(60, 12, 'add_img_0_1572674379.jpg'),
(61, 12, 'add_img_1_1572674379.jpg'),
(62, 12, 'add_img_2_1572674379.jpg'),
(63, 12, 'add_img_3_1572674379.png'),
(64, 12, 'add_img_4_1572674379.jpg'),
(65, 12, 'add_img_5_1572674379.jpg'),
(66, 12, 'add_img_6_1572674379.jfif'),
(67, 13, 'add_img_0_1572674783.jpg'),
(68, 13, 'add_img_1_1572674783.jpg'),
(69, 13, 'add_img_2_1572674783.jpg'),
(70, 13, 'add_img_3_1572674783.jpg'),
(71, 13, 'add_img_4_1572674783.jpg'),
(72, 14, 'add_img_0_1572675362.jpg'),
(73, 14, 'add_img_1_1572675362.jpg'),
(74, 14, 'add_img_2_1572675362.jpg'),
(75, 14, 'add_img_3_1572675362.jpg'),
(76, 14, 'add_img_4_1572675362.jpg'),
(77, 14, 'add_img_5_1572675362.png'),
(78, 15, 'add_img_0_1572675598.jpg'),
(79, 15, 'add_img_1_1572675598.jpg'),
(80, 15, 'add_img_2_1572675598.jpg'),
(81, 15, 'add_img_3_1572675598.jpg'),
(82, 15, 'add_img_4_1572675598.png'),
(83, 15, 'add_img_5_1572675598.jpg'),
(84, 15, 'add_img_6_1572675598.jpg'),
(85, 15, 'add_img_7_1572675598.jfif'),
(86, 16, 'add_img_0_1572675686.jpg'),
(87, 16, 'add_img_1_1572675686.jpg'),
(88, 16, 'add_img_2_1572675686.jpg'),
(89, 16, 'add_img_3_1572675686.jpg'),
(90, 16, 'add_img_4_1572675686.jfif'),
(91, 16, 'add_img_5_1572675686.jpg'),
(92, 16, 'add_img_6_1572675686.jpg'),
(93, 17, 'add_img_0_1572676463.jpg'),
(94, 17, 'add_img_1_1572676463.jpg'),
(95, 17, 'add_img_2_1572676463.jpg'),
(96, 17, 'add_img_3_1572676463.jpg'),
(97, 17, 'add_img_4_1572676463.jfif'),
(98, 17, 'add_img_5_1572676463.jpg'),
(99, 17, 'add_img_6_1572676463.jpg'),
(100, 18, 'add_img_0_1572676678.jpg'),
(101, 18, 'add_img_1_1572676678.jpg'),
(102, 18, 'add_img_2_1572676678.jpg'),
(103, 18, 'add_img_3_1572676679.jpg'),
(104, 18, 'add_img_4_1572676679.jpg'),
(105, 18, 'add_img_5_1572676679.jpg'),
(106, 18, 'add_img_6_1572676679.jpg'),
(107, 19, 'add_img_0_1572676907.jpg'),
(108, 19, 'add_img_1_1572676908.jpg'),
(109, 19, 'add_img_2_1572676908.jpg'),
(110, 19, 'add_img_3_1572676908.jfif'),
(111, 19, 'add_img_4_1572676908.jpg'),
(112, 19, 'add_img_5_1572676908.jpg'),
(113, 20, 'add_img_0_1572677064.jpg'),
(114, 20, 'add_img_1_1572677064.jpg'),
(115, 20, 'add_img_2_1572677064.jpg'),
(116, 20, 'add_img_3_1572677064.jpg'),
(117, 20, 'add_img_4_1572677064.jpg'),
(118, 20, 'add_img_5_1572677064.jpg'),
(119, 20, 'add_img_6_1572677064.jpg'),
(120, 20, 'add_img_7_1572677064.jpg'),
(121, 20, 'add_img_8_1572677064.jpg'),
(122, 21, 'add_img_0_1572679818.jpg'),
(123, 21, 'add_img_1_1572679818.jpg'),
(124, 21, 'add_img_2_1572679818.jpg'),
(125, 21, 'add_img_3_1572679818.jpg'),
(126, 21, 'add_img_4_1572679818.jpg'),
(127, 21, 'add_img_5_1572679819.jfif'),
(128, 22, 'add_img_0_1572680172.jpg'),
(129, 22, 'add_img_1_1572680172.jpg'),
(130, 22, 'add_img_2_1572680172.jpg'),
(131, 22, 'add_img_3_1572680172.jpg'),
(132, 22, 'add_img_4_1572680172.jpg'),
(133, 22, 'add_img_5_1572680172.jfif'),
(134, 23, 'add_img_0_1572680483.jpg'),
(135, 23, 'add_img_1_1572680483.jpg'),
(136, 23, 'add_img_2_1572680483.jpg'),
(137, 23, 'add_img_3_1572680483.jpg'),
(138, 23, 'add_img_4_1572680483.jpg'),
(139, 23, 'add_img_5_1572680483.jpg'),
(140, 23, 'add_img_6_1572680483.jfif'),
(141, 24, 'add_img_0_1572680715.jpg'),
(142, 24, 'add_img_1_1572680716.jpg'),
(143, 24, 'add_img_2_1572680716.jpg'),
(144, 24, 'add_img_3_1572680716.jpg'),
(145, 24, 'add_img_4_1572680716.jpg'),
(146, 24, 'add_img_5_1572680716.jpg'),
(147, 24, 'add_img_6_1572680716.jpg'),
(148, 25, 'add_img_0_1572681184.jpg'),
(149, 25, 'add_img_1_1572681184.jpg'),
(150, 25, 'add_img_2_1572681184.jpg'),
(151, 25, 'add_img_3_1572681184.jpg'),
(152, 25, 'add_img_4_1572681184.jpg'),
(153, 25, 'add_img_5_1572681184.jpg'),
(154, 26, 'add_img_0_1572681348.jpg'),
(155, 26, 'add_img_1_1572681348.jpg'),
(156, 26, 'add_img_2_1572681348.jpg'),
(157, 26, 'add_img_3_1572681348.jpg'),
(158, 26, 'add_img_4_1572681348.jpg'),
(159, 26, 'add_img_5_1572681348.jpg'),
(160, 27, 'add_img_0_1572681472.jpg'),
(161, 27, 'add_img_1_1572681472.jpg'),
(162, 27, 'add_img_2_1572681472.jpg'),
(163, 27, 'add_img_3_1572681472.jpg'),
(164, 27, 'add_img_4_1572681472.jpg'),
(165, 27, 'add_img_5_1572681472.jpg'),
(166, 28, 'add_img_0_1572681782.jfif'),
(167, 28, 'add_img_1_1572681782.jpg'),
(168, 28, 'add_img_2_1572681782.jpg'),
(169, 28, 'add_img_3_1572681782.jpg'),
(170, 28, 'add_img_4_1572681782.jpg'),
(171, 28, 'add_img_5_1572681782.jpg'),
(172, 29, 'add_img_0_1572682586.jpg'),
(173, 29, 'add_img_1_1572682586.jpg'),
(174, 29, 'add_img_2_1572682586.jpg'),
(175, 29, 'add_img_3_1572682586.jpg'),
(176, 29, 'add_img_4_1572682586.jpg'),
(177, 29, 'add_img_5_1572682586.jfif'),
(178, 29, 'add_img_6_1572682586.jfif'),
(179, 30, 'add_img_0_1572682737.jpg'),
(180, 30, 'add_img_1_1572682737.jpg'),
(181, 30, 'add_img_2_1572682737.jpg'),
(182, 30, 'add_img_3_1572682737.jpg'),
(183, 30, 'add_img_4_1572682737.jpg'),
(184, 30, 'add_img_5_1572682737.jpg'),
(185, 30, 'add_img_6_1572682737.jpg'),
(186, 30, 'add_img_7_1572682737.jfif'),
(187, 30, 'add_img_8_1572682737.jfif'),
(188, 30, 'add_img_9_1572682737.jfif'),
(189, 31, 'add_img_0_1572682869.jpg'),
(190, 31, 'add_img_1_1572682869.jpg'),
(191, 31, 'add_img_2_1572682870.jpg'),
(192, 31, 'add_img_3_1572682870.jpg'),
(193, 31, 'add_img_4_1572682870.jpg'),
(194, 31, 'add_img_5_1572682870.jpg'),
(195, 31, 'add_img_6_1572682870.jpg'),
(196, 31, 'add_img_7_1572682870.jfif'),
(197, 31, 'add_img_8_1572682870.jfif'),
(198, 31, 'add_img_9_1572682870.jfif'),
(199, 32, 'add_img_0_1572683119.jpg'),
(200, 32, 'add_img_1_1572683119.jpg'),
(201, 32, 'add_img_2_1572683119.jpg'),
(202, 32, 'add_img_3_1572683119.jpg'),
(203, 32, 'add_img_4_1572683119.jpg'),
(204, 32, 'add_img_5_1572683119.jpg'),
(205, 32, 'add_img_6_1572683119.jpg'),
(206, 32, 'add_img_7_1572683119.jfif'),
(207, 32, 'add_img_8_1572683119.jfif'),
(208, 33, 'add_img_0_1602780574.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review_rating`
--

CREATE TABLE `review_rating` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `review` text DEFAULT NULL,
  `ratting` int(5) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_rating`
--

INSERT INTO `review_rating` (`id`, `product_id`, `customer_id`, `customer_name`, `review`, `ratting`, `created_at`, `updated_at`, `status`) VALUES
(9, 2, 4, 'MD. Mizanur Rahman', 'This bad product!!', 2, '2019-11-27 12:06:15', '2019-11-29 06:28:18', 1),
(8, 2, 1, 'Md Ariful Islam', 'This is very nice product!!!', 5, '2019-11-27 11:52:26', '2019-11-27 12:03:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `logo`, `status`, `url`) VALUES
(5, 'Slider One', '1602818236car.png', 1, 'http://localhost:8080/estore_new/product.php?id=3'),
(6, 'Slider Two', '157483086144.jpg', 1, 'http://localhost:8080/estore_new/category.php?category_id=5'),
(7, 'Slider Three', '15748249591.jpg', 1, NULL),
(8, 'Slider Four', '15748259432a.jpg', 1, NULL),
(9, 'Slider Five', '15748260053a.jpg', 1, NULL),
(10, 'Slider Six', '15748260624.jpg', 1, NULL),
(11, 'Car Slider', '1602777880parts.jpg', 1, 'http://localhost/estore_C14%20%2013-12-2019/estore_13122019/estore/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(190) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `user_type` enum('admin','manager','staff') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `user_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@kapsc.com', 'e10adc3949ba59abbe56e057f20f883e', '01923834492', 'admin', 'Active', '2019-10-04 12:29:27', NULL),
(2, 'Md. Jahid Hasan', 'jahid@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01789456123', 'staff', 'Active', '2019-10-04 14:43:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_rating`
--
ALTER TABLE `review_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `review_rating`
--
ALTER TABLE `review_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
