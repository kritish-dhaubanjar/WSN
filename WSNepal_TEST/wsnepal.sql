-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2018 at 07:52 PM
-- Server version: 5.7.20-0ubuntu0.17.10.1
-- PHP Version: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wsnepal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(123, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `delivered` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `size` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'o'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(4) NOT NULL,
  `category` varchar(10) DEFAULT NULL,
  `title` varchar(60) NOT NULL,
  `oldPrice` int(5) DEFAULT NULL,
  `price` int(5) NOT NULL,
  `stock` int(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `s` tinyint(1) NOT NULL DEFAULT '0',
  `m` tinyint(1) DEFAULT '0',
  `l` tinyint(1) DEFAULT '0',
  `description` varchar(1000) NOT NULL,
  `moreDetails` varchar(1000) DEFAULT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `image3` varchar(100) NOT NULL,
  `color1` varchar(10) DEFAULT NULL,
  `color2` varchar(10) DEFAULT NULL,
  `color3` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `category`, `title`, `oldPrice`, `price`, `stock`, `details`, `s`, `m`, `l`, `description`, `moreDetails`, `image1`, `image2`, `image3`, `color1`, `color2`, `color3`) VALUES
(1000, 'saree', 'printed-dress', 3000, 2500, 12, 'Lorem ipsum dolor sit amet, consectetur adipisicing elitse do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tio ullamco laboris nisi ut aliquip. ', 0, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elitse do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tio ullamco laboris nisi ut aliquip. ', NULL, 'products/1000-01.png', 'products/1000-02.png', 'products/1000-03.png', '', '', ''),
(1001, 'saree', 'Drapey Contrast Stitch Long Sleve Top', NULL, 3000, 24, 'Lorem ipsum dolor sit amet, consectetur adipisicing elitse do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tio ullamco laboris nisi ut aliquip. ', 0, 1, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elitse do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tio ullamco laboris nisi ut aliquip. ', NULL, 'products/1001-01.png', 'products/1001-02.png', 'products/1001-03.png', '', '', ''),
(2000, 'lengha', 'Stud scoop neck tee', 4800, 3800, 24, 'Lorem ipsum dolor sit amet, consectetur adipisicing elitse do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tio ullamco laboris nisi ut aliquip.', 0, 1, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elitse do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tio ullamco laboris nisi ut aliquip.', NULL, 'products/2000-01.png', 'products/2000-02.png', 'products/2000-03.png', '', '', ''),
(2002, 'dress', 'Stud scoop neck tee', 4800, 3800, 24, 'Lorem ipsum dolor sit amet, consectetur adipisicing elitse do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tio ullamco laboris nisi ut aliquip.', 0, 1, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elitse do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tio ullamco laboris nisi ut aliquip.', NULL, 'products/2000-01.png', 'products/2000-02.png', 'products/2000-03.png', '', '', ''),
(3000, 'shoes', 'Converse Chuck Taylor All Star Low Sneaker', NULL, 4999, 12, 'The Converse Chuck Taylor All Star Low Sneaker is a high-impact statement-maker that will never go out of style. The low-top canvas silhouette, lace-up front, and a vulcanized rubber sole provide a great fit and easy everyday feel.', 1, 0, 0, 'This style tends to run large. For an accurate fit we recommend purchasing a 1/2 size smaller than you typically purchase. For example, if you normally purchase a size 7 1/2, we recommend purchasing a size 7.', NULL, 'products/3000-01.png', 'products/3000-02.png', 'products/3000-03.png', '', '', ''),
(4000, 'bag', 'Tori Stripe Pattern Bag With Flap', NULL, 6000, 12, 'Stripe pattern on the flap.\r\nSingle handle, length approx. 35 cm. / 13.78 in.\r\nRemovable shoulder strap, length approx. 110/130 cm - 43.31/51.18 in.\r\nSilver-coloured metal elements.\r\nMulti-function pocket on the inside with zip.\r\nGuess logo on the buckle on the front.\r\nGuess logo lining, 20% Cotton 80% Polyester. ', 0, 0, 0, 'Stripe pattern on the flap.\r\nSingle handle, length approx. 35 cm. / 13.78 in.\r\nRemovable shoulder strap, length approx. 110/130 cm - 43.31/51.18 in.\r\nSilver-coloured metal elements.\r\nMulti-function pocket on the inside with zip.\r\nGuess logo on the buckle on the front.\r\nGuess logo lining, 20% Cotton 80% Polyester. ', NULL, 'products/4000-01.png', 'products/4000-02.png', 'products/4000-03.png', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4001;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
