-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 04:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `cat_title` varchar(50) NOT NULL,
  `cat_img` varchar(100) NOT NULL,
  `category_add_date` text NOT NULL,
  `category_modify_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `cat_title`, `cat_img`, `category_add_date`, `category_modify_date`) VALUES
(1, 'Sofas', 'c-1.jpg', '2022-09-23 19:57:31', ''),
(3, 'Table', 'c-7.jpg', '2022-09-23 19:58:30', ''),
(4, 'Chairs', 'c-6.jpg', '2022-09-23 19:58:38', '2022-09-23 22:56:12'),
(5, 'watch', 'c-5.jpg', '2022-09-23 19:58:47', ''),
(6, 'Mattres', 'c-4.jpg', '2022-09-23 19:58:54', ''),
(7, 'Bookcases ', 'c-12.jpg', '2022-09-23 19:59:19', ''),
(8, 'Beds', 'c-2.jpg', '2022-09-23 19:59:31', ''),
(9, 'Tools', 'c-9.jpg', '2022-09-23 19:59:39', ''),
(10, 'Dining Tables', 'c-10.jpg', '2022-09-23 19:59:48', ''),
(11, 'aaaaaaa', 'sofa 2.jpg', '2022-10-18 13:02:24', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order_id`, `product_id`, `quantity`, `product_price`) VALUES
(1, 1, 6, 1, 1599),
(2, 2, 2, 1, 5000),
(3, 3, 6, 1, 1599),
(4, 4, 6, 1, 1599),
(5, 6, 6, 1, 1599),
(6, 7, 6, 1, 1599),
(7, 9, 6, 1, 1599),
(8, 10, 6, 1, 1599);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `timestampe` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_price`, `order_status`, `payment_mode`, `timestampe`) VALUES
(1, 1, '2298', '', 'COD', '2022-12-06 09:36:59'),
(2, 1, '5699', '', 'COD', '2022-12-06 09:38:09'),
(3, 1, '2298', '', 'COD', '2022-12-06 09:42:31'),
(4, 1, '2298', '', 'COD', '2022-12-06 09:51:20'),
(5, 1, '', '', 'COD', '2022-12-06 09:52:32'),
(6, 1, '2298', '', 'COD', '2022-12-06 09:52:46'),
(7, 1, '2298', '', '', '2022-12-06 09:56:54'),
(8, 1, '', '', '', '2022-12-06 09:57:25'),
(9, 1, '2298', '', '', '2022-12-06 09:57:48'),
(10, 1, '2298', '', 'COD', '2022-12-06 10:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `exp` int(11) NOT NULL DEFAULT 0,
  `date_dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `otp`, `exp`, `date_dt`) VALUES
(1, 26230, 0, '2022-09-23 07:57:24'),
(2, 75912, 0, '2022-09-23 07:58:11'),
(3, 84982, 0, '2022-09-23 07:59:23'),
(4, 52955, 1, '2022-09-23 08:00:46'),
(5, 78515, 0, '2022-09-23 08:17:00'),
(6, 55674, 0, '2022-09-23 08:17:07'),
(7, 30849, 1, '2022-09-23 08:18:35'),
(8, 14146, 1, '2022-09-23 08:23:04'),
(9, 72306, 1, '2022-09-23 15:29:23'),
(10, 59912, 0, '2022-09-23 15:39:56'),
(11, 53367, 1, '2022-09-23 16:49:43'),
(12, 68848, 1, '2022-10-14 06:12:37'),
(13, 82776, 0, '2022-10-15 12:26:09'),
(14, 40174, 1, '2022-10-15 12:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `amount`, `payment_status`, `payment_id`, `added_on`) VALUES
(1, '', 0, 'pending', '', '2022-12-06 05:30:22'),
(2, '', 0, 'pending', '', '2022-12-06 05:30:54'),
(3, '', 2298, 'pending', '', '2022-12-06 05:31:35'),
(4, '', 2298, 'pending', '', '2022-12-06 05:41:29'),
(5, '', 2298, 'pending', '', '2022-12-06 05:42:46'),
(6, '', 2298, 'complete', 'pay_KoUuAUhxSOJZ5Z', '2022-12-06 05:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_description` varchar(100) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `product_img2` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_add_date` text NOT NULL,
  `product_modify_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_description`, `product_img`, `product_img2`, `category`, `product_quantity`, `product_price`, `product_add_date`, `product_modify_date`) VALUES
(2, 'Barcelona chair', 'Chairs are probably the first furniture pieces you buy for your new home. It is because these furnit', '1p.jpeg', '', '4', 20, 5000, '2022-10-18 12:55:57', ''),
(3, 'sofa comfort', 'Sofa are probably the first furniture pieces you buy for your new home. It is because these furnitur', 'sofa 1.jpg', '', '1', 20, 49999, '2022-10-18 12:56:51', ''),
(4, 'Indian Chair', 'Chairs are probably the first furniture pieces you buy for your new home. It is because these furnit', 'chair 2.jpg', '', '4', 20, 5900, '2022-10-18 12:58:01', ''),
(5, 'basket chair', 'It is because these furniture pieces serve multiple purposes. In an empty home, they can act as temp', 'desk 1.jpg', '', '4', 20, 9000, '2022-10-18 12:58:58', ''),
(6, 'ARTISLAND Analog', 'Analog 30.48 cm X 30.48 cm Wall Clock  (Red, With Glass, Standard)', 'clock 2.jpg', '', '5', 10, 1599, '2022-10-18 13:00:32', ''),
(7, 'GrabBasket Analog ', 'Analog 30.48 cm X 30.48 cm Wall Clock  (Red, With Glass, Standard)', 'book 2.jpg', '', '5', 10, 6000, '2022-10-18 13:01:20', ''),
(8, 'bes b class', 'These home furnishings are designed for your comfort and relaxation. Choose from a huge range of col', 'WhatsApp Image 2022-10-18 at 13.06.38.jpg', '', '8', 25, 23000, '2022-10-18 13:08:54', '');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `profileimg` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datetime` text NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `profileimg`, `username`, `email`, `phone`, `address`, `pincode`, `city`, `state`, `password`, `datetime`, `flag`) VALUES
(1, 'me.jpg', 'Romit Dobariya', 'romitdobariya5075@gmail.com', '9313499384', 'B-4 Yogeshware bbbb', 395006, '', '', '$2y$10$W.ftWQxTJhV8UiftaUFkNuOJZzBJLj.b70DiMuRqTsU1jUhEo3kMu', '2022-09-23 20:59:23', 0),
(2, 'me.jpg', 'Rahul savaliya', '20bmiit061@gmail.com', '9537215410', 'B-4 Yogeshware Society, Shyamdham Chowk ,Nana Varachha', 395006, '', '', '$2y$10$XXET/lha/KjjeI2Z9CwK2uAH88KcYIWDPuDQjPgOFa4kgL67hjZB6', '2022-09-23 22:19:43', 0),
(3, '', 'ROMIT dobariya', 'romitdobariya8@gmail.com', '9727252600', 'B-4 Yogeshware', 395006, '', '', '$2y$10$Yrn4O5OKmKqlsfmCO6UjmuirWPKIg0vEeGYf.8VGSLleaVa2Hnb9K', '2022-10-15 17:56:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `pid`, `uid`, `timestamp`) VALUES
(6, 0, 1, '2022-10-18 13:23:10'),
(7, 0, 0, '2022-10-18 13:42:41'),
(8, 1, 1, '2022-10-18 13:45:08'),
(11, 0, 2, '2022-12-05 09:57:19'),
(12, 2, 1, '2022-12-06 11:37:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
