-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 05:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Yamaha'),
(2, 'Fender'),
(3, 'Gibsun');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Guitar'),
(2, 'Violin'),
(3, 'Drum'),
(5, 'Trumpet'),
(7, 'Flute');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `discount_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `discount_amount` int(100) NOT NULL,
  `discount_img` varchar(255) NOT NULL,
  `discount_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discount_id`, `product_id`, `discount_amount`, `discount_img`, `discount_desc`) VALUES
(2, 15, 10, 'Discount.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, rem! Minus eveniet eius ratione est voluptatum expedita nisi error ipsam? Dolor, vitae officiis veniam optio quibusdam incidunt? Porro, quidem ipsum!'),
(3, 15, 20, 'Discount.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, rem! Minus eveniet eius ratione est voluptatum expedita nisi error ipsam? Dolor, vitae officiis veniam optio quibusdam incidunt? Porro, quidem ipsum!'),
(4, 15, 10, 'Discount.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, rem! Minus eveniet eius ratione est voluptatum expedita nisi error ipsam? Dolor, vitae officiis veniam optio quibusdam incidunt? Porro, quidem ipsum!');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `name`, `email`, `message`, `rating`, `created_at`) VALUES
(7, 13, 'pubudu', 'user@gmail.com', 'wdwddw', 2, '2023-11-28 14:05:41'),
(8, 13, 'user', 'user@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, nemo. Earum voluptas inventore, beatae provident consequuntur ipsam. Dolor excepturi cum earum vero. Quo maxime, commodi praesentium laudantium sed ad autem.', 5, '2023-11-28 14:24:44'),
(9, 13, 'test', 'test@gmail.com', '123467', 4, '2023-11-28 15:56:47'),
(10, 13, 'test', 'user@gmail.com', 'ewwefef', 3, '2023-11-29 05:35:27'),
(11, 13, 'test', 'user@gmail.com', 'dwwdwwdw', 3, '2023-12-03 05:45:27'),
(12, 13, 'test', 'user@gmail.com', 'test test test', 4, '2024-01-13 16:04:08'),
(13, 13, 'test', 'test@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, nemo. Earum voluptas inventore, beatae provident consequuntur ipsam. Dolor excepturi cum earum vero. Quo maxime, commodi praesentium laudantium sed ad autem.', 4, '2024-02-17 18:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_amount`, `order_date`) VALUES
(22, 13, '40000.00', '2023-11-28 07:53:19'),
(23, 13, '20000.00', '2023-11-28 07:56:04'),
(24, 13, '20000.00', '2023-11-28 08:00:12'),
(25, 13, '21600.00', '2023-11-28 15:53:13'),
(26, 12, '40000.00', '2023-11-29 04:08:24'),
(27, 13, '41000.00', '2023-11-29 05:37:35'),
(28, 13, '60000.00', '2024-01-13 16:06:04'),
(29, 13, '60000.00', '2024-02-17 19:01:16'),
(30, 13, '60000.00', '2024-02-18 04:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `status`) VALUES
(24, 22, 34, 2, 'Accepted'),
(25, 23, 34, 1, 'Accepted'),
(26, 24, 34, 1, 'Accepted'),
(27, 25, 34, 1, 'Accepted'),
(28, 25, 17, 2, 'Accepted'),
(29, 26, 34, 2, 'Accepted'),
(30, 27, 34, 2, 'Accepted'),
(31, 27, 15, 1, 'Accepted'),
(32, 28, 34, 3, 'Accepted'),
(33, 29, 34, 3, 'Accepted'),
(34, 30, 34, 3, 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_qty` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `product_img_01` text NOT NULL,
  `product_img_02` text NOT NULL,
  `product_img_03` text NOT NULL,
  `product_img_04` text NOT NULL,
  `product_img_05` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_keywords`, `product_img_01`, `product_img_02`, `product_img_03`, `product_img_04`, `product_img_05`) VALUES
(14, 1, 1, 'Guitar', 700, 1, 'test', 'test', 'Guitar_01.png', 'Guitar_02.png', 'Guitar_03.png', 'Guitar_02.png', 'Guitar_03.png'),
(15, 2, 2, 'Classic Violin', 1000, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, deleniti minus! Itaque eveniet labore quia adipisci iusto nulla dolorum nihil ab totam, ut ex tempora necessitatibus quos, pariatur dolor. Totam?', 'Fender Violin', 'Violin_01.png', 'Violin_02.png', 'Violin_01.png', 'Violin_02.png', 'Violin_01.png'),
(16, 3, 3, 'Acoustic Drum', 7000, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, deleniti minus! Itaque eveniet labore quia adipisci iusto nulla dolorum nihil ab totam, ut ex tempora necessitatibus quos, pariatur dolor. Totam?', 'Gibsun Drum', 'Drum_01.png', 'Drum_01.png', 'Drum_01.png', 'Drum_01.png', 'Drum_01.png'),
(17, 1, 2, 'Classic Guitar', 800, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, deleniti minus! Itaque eveniet labore quia adipisci iusto nulla dolorum nihil ab totam, ut ex tempora necessitatibus quos, pariatur dolor. Totam?', 'Fender Guitar', 'Guitar_02.png', 'Guitar_01.png', 'Guitar_03.png', 'Guitar_01.png', 'Guitar_03.png'),
(34, 5, 1, 'Trumpet', 20000, 0, 'test test test', 'yamaha trumpet', '34_photo_1.png', 'Trumpet_02.png', 'Trumpet_03.png', 'Trumpet_04.png', 'Trumpet_05.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `color_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `product_id`, `user_id`, `rating_value`) VALUES
(1, 34, 13, 4),
(2, 17, 13, 5),
(3, 17, 13, 3),
(4, 16, 13, 1),
(5, 14, 13, 5),
(6, 34, 13, 1),
(14, 34, 13, 3),
(15, 34, 13, 4),
(16, 34, 13, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `name`, `email`, `address`, `password`, `image`) VALUES
(12, '::1', 'test', 'test@gmail.com', 'abcd', '1234', 'profile.png'),
(13, '::1', 'user', 'user@gmail.com', 'abcde', '1234', 'profile-4.png'),
(14, '::1', 'isuru', 'isuru@gmail.com', 'abcde', '1234', 'user-1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discount_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`color_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD CONSTRAINT `product_ratings_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `product_ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
