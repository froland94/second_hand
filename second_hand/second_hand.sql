-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2015 at 11:08 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `second_hand`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `dest_city` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nmb_products` int(11) NOT NULL,
  `total_value` double NOT NULL,
  `order_date` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `id` (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `id`, `dest_city`, `address`, `nmb_products`, `total_value`, `order_date`) VALUES
(2, 'a', 13, 'a', 'a a', 2, 1998, '2015-06-30 23:38:01'),
(3, 'c', 15, 'a', 'a a', 1, 1200.55, '2015-06-30 23:49:45'),
(4, 'Alex', 12, 'Szabadka', 'Szep Ferenc 5', 1, 6500, '2015-07-01 09:41:03'),
(5, 'Alex', 17, 'Pecesor', 'Fout 1', 2, 9400, '2015-07-01 09:41:35'),
(6, 'Alex', 1, 'Ada', 'Gurdika 8', 4, 500.48, '2015-07-01 09:42:27'),
(7, 'Alex', 8, 'Rumuko', 'Loran 12', 1, 4560, '2015-07-01 09:44:09'),
(8, 'Alex', 19, 'Palics', 'Csifi 85', 1, 11000, '2015-07-01 09:44:39'),
(9, 'Alex', 3, 'Zenta', 'Bugi Lajos 112', 1, 6000.54, '2015-07-01 09:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('watch','shoes','satchel') COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `in_stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `img`, `name`, `type`, `price`, `in_stock`) VALUES
(1, 'images/watch.jpg', 'Rolex12', 'watch', 125.12, 9),
(2, 'images/watch2.jpg', 'Rolex1', 'watch', 1536, 5),
(3, 'images/watch3.jpg', 'Rolex127', 'watch', 6000.54, 3),
(4, 'images/shoes.jpg', 'starka', 'shoes', 5985.99, 15),
(5, 'images/shoes2.jpg', '23', 'shoes', 4650.17, 8),
(6, 'images/shoes3.jpg', 'nikeBuster', 'shoes', 15000, 6),
(7, 'images/satchel.jpg', 'Turbo42', 'satchel', 8400.55, 8),
(8, 'images/satchel2.jpg', 'Shuriken', 'satchel', 4560, 8),
(9, 'images/satchel3.jpg', 'Imperator', 'satchel', 8000.99, 12),
(10, 'images/satchel4.jpg', 'Reckton15', 'satchel', 8800.99, 9),
(11, 'images/satchel5.jpg', 'Lorant8', 'satchel', 5600, 4),
(12, 'images/satchel6.jpg', 'Ranchy', 'satchel', 6500, 5),
(13, 'images/satchel7.jpg', 'Lurckon', 'satchel', 999, 21),
(14, 'images/satchel8.jpg', 'Cusio', 'satchel', 4999.85, 12),
(15, 'images/satchel9.jpg', 'Durkin', 'satchel', 1200.55, 14),
(16, 'images/satchel10.jpg', 'Sandin', 'satchel', 2300, 20),
(17, 'images/shoes4.jpg', 'Scorpion', 'shoes', 4700, 13),
(18, 'images/shoes5.jpg', 'Riki', 'shoes', 7890, 12),
(19, 'images/shoes6.jpg', 'Arkham', 'shoes', 11000, 4),
(20, 'images/shoes7.jpg', 'Grizell', 'shoes', 5600, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` datetime DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `firstname`, `surname`, `city`, `address`, `reg_date`) VALUES
('a', 'a', 'a', 'a', 'a', 'a a', '2015-06-30 16:44:19'),
('Alex', 'Alex', 'Alex', 'Prokin', 'Mohol', 'Testveriseg egyseg 47', '2015-07-01 09:40:11'),
('c', 'a', 'a', 'a', 'a', 'a a', '2015-06-30 23:49:12');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
