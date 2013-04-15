-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2013 at 03:13 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infinity`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `billing_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `country` varchar(30) NOT NULL,
  PRIMARY KEY (`billing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billing_id`, `first_name`, `last_name`, `address`, `mobile`, `city`, `zip_code`, `country`) VALUES
(2, 'Kristine', 'Penaredondo', 'Penaredondo', '09264746458', 'Meycauayan', '23123', 'Philippines'),
(3, 'Kristine', 'Penaredondo', 'Penaredondo', '09264746458', 'Meycauayan', '23123', 'Philippines'),
(4, 'teasldkj', 'asdklasjdklj', 'asdklasjdklj', '213091283091283', 'sdkljasdkla', '3020', 'Philippines'),
(5, 'Kristine', 'Penaredondo', 'Penaredondo', '0926474741', 'Meycauayan', '3020', 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(128) NOT NULL,
  `blog_slug` varchar(140) NOT NULL,
  `blog_content` text NOT NULL,
  `blog_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blog_tags` text NOT NULL,
  PRIMARY KEY (`blog_id`),
  UNIQUE KEY `blog_slug` (`blog_slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_slug`, `blog_content`, `blog_date`, `blog_tags`) VALUES
(5, 'BLOG # 1', 'ang-paglalakbay-ni-mang-kanor-at-ni-jill-rose', '<b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod &nbsp; &nbsp; &nbsp;&nbsp;<br><br></b><ul><li><b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod &nbsp; &nbsp; &nbsp;&nbsp;</b><b></b></li><li><b><b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod &nbsp; &nbsp; &nbsp;&nbsp;</b><br></b></li><li><b><b><b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod &nbsp; &nbsp; &nbsp;&nbsp;<br></b><br></b></b></li></ul><br><b></b><br>', '2013-03-29 01:51:08', 'test'),
(7, 'testtestasd', 'test-twos', '<b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod &nbsp; &nbsp; &nbsp;&nbsp;<br></b><br><i></i><b><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod &nbsp; &nbsp; &nbsp;&nbsp;<br></i></b><br><b><u>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod &nbsp; &nbsp; &nbsp;&nbsp;</u></b><br>', '2013-03-29 03:05:18', 'test,test,test'),
(8, 'asdasdas', 'test-twossss', 'test', '2013-04-10 01:22:43', 'test,test');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) NOT NULL,
  `category_description` text NOT NULL,
  `category_slug` varchar(140) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_slug`) VALUES
(3, 'Make Up Palette', 'all about make up palette', 'make-up-palette'),
(4, 'Make Up Brushes', 'all about make up brushes', 'make-up-brushes'),
(5, 'Eyeliners', 'all about eyeliners', 'eyeliner'),
(6, 'Mascara', 'all about mascara', 'mascara'),
(7, 'Lipstick', 'all about lipstick', 'lipstick'),
(8, 'Liptint', 'all about liptint', 'liptint'),
(9, 'Blush On', 'all about blush on', 'blush-on');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `deliver_id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_method` varchar(30) NOT NULL,
  PRIMARY KEY (`deliver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item_status`
--

CREATE TABLE IF NOT EXISTS `item_status` (
  `item_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_status_description` varchar(30) NOT NULL,
  PRIMARY KEY (`item_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_reference_id` varchar(30) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_status_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_reference_id`, `customer_id`, `order_status_id`, `payment_id`, `billing_id`, `message`, `order_date`) VALUES
(7, '487786152818', 15, 7, 1, 5, '', '2013-04-15 01:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `product_quantity`) VALUES
(7, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_status_description` varchar(140) NOT NULL,
  PRIMARY KEY (`order_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `order_status_description`) VALUES
(1, 'Awaiting Cheque Payment'),
(2, 'Awaiting Paypal Payment'),
(3, 'Cancelled'),
(4, 'Delivered'),
(5, 'Payment Accepted'),
(6, 'Payment Error'),
(7, 'Processing'),
(8, 'Refund'),
(10, 'Shipped');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(128) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_method`) VALUES
(1, 'Meetup'),
(2, 'Bank Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_stock_quantity` int(11) NOT NULL,
  `product_slug` varchar(80) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_description`, `product_price`, `product_stock_quantity`, `product_slug`) VALUES
(28, 3, 'Make up palette # 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 250, 2, 'make-up-palette-1'),
(29, 4, 'Make up brushes # 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 250, 12, 'make-up-brushes-1'),
(30, 5, 'eye liner #1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 250, 22, 'eye-liner-1'),
(31, 8, 'Liptint # 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n          cillum dolore eu fugiat nulla pariatur.', 250, 12, 'lip-tint-1'),
(32, 6, 'Mascara # 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n          cillum dolore eu fugiat nulla pariatur.', 212, 21, 'mascara-1'),
(33, 9, 'blush on # 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n          cillum dolore eu fugiat nulla pariatur.', 123, 23, 'blush-on-1'),
(34, 7, 'Lipstick # 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n          cillum dolore eu fugiat nulla pariatur.', 212, 21, 'lipstick-1');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `product_id` int(11) NOT NULL,
  `product_image_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_id`, `product_image_name`) VALUES
(28, 'b21a7924398f9267b0f688d9e1b6c5c0.JPG'),
(28, '5108f7db6e547211915f196405806114.JPG'),
(29, 'e46f9cdc36c8626788e51023114aaef9.JPG'),
(29, '475bac5585e65354704db85a5faf2ce2.JPG'),
(30, '0060e6c563ebe313131037b0692df69d.JPG'),
(30, 'c95828f6960eae8235bd6666ee0c5b41.JPG'),
(30, '4aa60b4d481c870b82a27c50a576f422.JPG'),
(31, '8f9d3e5c9350fc42b21a8a7969612395.JPG'),
(31, '2b5192741543c1d1817e416589e8fe93.JPG'),
(32, '6af5f4b9113b30bc74728eb3e4f2d194.JPG'),
(32, '5adca87da38ce6dbc2f7140bd6f6e043.JPG'),
(33, '42a68e44d80cce86c7924962a178ed8e.JPG'),
(33, '313348f73e4fda38af2f7f5eac4faedf.JPG'),
(34, '3fd23ff00097372daf3a0b9195f264d9.JPG'),
(34, 'eacb52dc091ff3541d5941d0fdc58813.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `account_type` enum('customer','administrator') COLLATE utf8_bin NOT NULL,
  `hasProfile` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `account_type`, `hasProfile`) VALUES
(5, 'utujam123', 'd52269b2a63d088dc186a1bb1100b9de90586985', '', 'administrator', 0),
(15, 'kristine', 'a63a3be77fa51c8ca25c3b8be5ac5d0e93917c0b', 'kristine@yahoo.com', 'customer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `address` text COLLATE utf8_bin NOT NULL,
  `zip_code` varchar(6) COLLATE utf8_bin NOT NULL,
  `city` varchar(30) COLLATE utf8_bin NOT NULL,
  `telephone` varchar(15) COLLATE utf8_bin NOT NULL,
  `mobile` varchar(15) COLLATE utf8_bin NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `first_name`, `last_name`, `address`, `zip_code`, `city`, `telephone`, `mobile`, `country`, `website`) VALUES
(7, 14, 'asdasd', 'asdas', '', '', '', '', '', NULL, NULL),
(8, 15, 'Kristine', 'Penaredondo', '', '', '', '', '', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
