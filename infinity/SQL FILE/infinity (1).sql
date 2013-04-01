-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2013 at 05:05 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_slug`, `blog_content`, `blog_date`, `blog_tags`) VALUES
(5, 'testmikeas', 'test-one', 'test', '2013-03-29 01:51:08', 'test'),
(7, 'testtestasd', 'test-two', 'sdasdasdassads', '2013-03-29 03:05:18', 'test,test,test');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_slug`) VALUES
(1, 'accessories', 'all about accessories', 'accessories'),
(2, 'bags', 'all about bags and shits', 'bags'),
(3, 'earrings', 'all about earrings', 'earrings');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('bbe44f3a38cc1117a66be508c9409abd', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22', 1363496105, 0x613a343a7b733a32323a22666c6173683a6f6c643a636170746368615f776f7264223b733a383a227145657848684247223b733a32323a22666c6173683a6f6c643a636170746368615f74696d65223b643a313336333439363130352e3932303831343033373332323939383034363837353b733a32323a22666c6173683a6e65773a636170746368615f776f7264223b733a383a2244394c3953686d45223b733a32323a22666c6173683a6e65773a636170746368615f74696d65223b643a313336333439363130382e363932323130393132373034343637373733343337353b7d);

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
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '127.0.0.1', 'nico', '2013-03-10 16:46:03'),
(2, '127.0.0.1', 'nico', '2013-03-10 16:49:34'),
(3, '127.0.0.1', 'nico', '2013-03-17 04:39:04'),
(4, '127.0.0.1', 'nico', '2013-03-17 04:39:34'),
(5, '127.0.0.1', 'nico', '2013-03-17 04:39:40');

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
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_reference_id`, `customer_id`, `order_status_id`, `payment_id`, `order_date`) VALUES
(1, '1231456', 11, 8, 1, '2013-03-25 08:50:52'),
(2, '21SJFUFJSZCV', 11, 6, 1, '2013-03-30 13:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `order_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  PRIMARY KEY (`order_product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `order_id`, `product_id`, `product_quantity`) VALUES
(1, 1, 1, 2),
(2, 1, 3, 2),
(3, 2, 3, 3),
(4, 2, 3, 3),
(5, 2, 5, 1),
(6, 2, 5, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_method`) VALUES
(1, 'Meetup');

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
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_description`, `product_price`, `product_stock_quantity`) VALUES
(1, 1, 'Necklace # 12', 'thasdasdas', 205, 12),
(3, 1, 'Necklace # 3', 'Sabagay, ang pamahalaan ay nilunod ng liwanag. Para sa''yo, ang kasama ay itinaksil ng tinik. Para saatin, ang dilim ay ipinalabas ng lupa. Kung ganon, ang tauhan ay itinakda ng kaibigan. Para sa''yo, ang liwanag ay sinakay ng pamahalaan.', 200, 10),
(4, 1, 'Necklace # 51', 'Sabagay, ang pamahalaan ay nilunod ng liwanag. Para sa''yo, ang kasama ay itinaksil ng tinik. Para saatin, ang dilim ay ipinalabas ng lupa. Kung ganon, ang tauhan ay itinakda ng kaibigan. Para sa''yo, ang liwanag ay sinakay ng pamahalaan.', 200, 21),
(5, 2, 'bag #1', 'Sabagay, ang pamahalaan ay nilunod ng liwanag. Para sa''yo, ang kasama ay itinaksil ng tinik. Para saatin, ang dilim ay ipinalabas ng lupa. Kung ganon, ang tauhan ay itinakda ng kaibigan. Para sa''yo, ang liwanag ay sinakay ng pamahalaan.', 193, 21),
(6, 2, 'bag # 3', 'Sabagay, ang pamahalaan ay nilunod ng liwanag. Para sa''yo, ang kasama ay itinaksil ng tinik. Para saatin, ang dilim ay ipinalabas ng lupa. Kung ganon, ang tauhan ay itinakda ng kaibigan. Para sa''yo, ang liwanag ay sinakay ng pamahalaan.', 213, 312),
(7, 2, 'bag # 123123', 'asdasdadas', 213, 23),
(8, 2, 'test', 'asdasdj', 231, 1233);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `account_type`, `hasProfile`) VALUES
(5, 'utujam123', 'chamba', '', 'administrator', 0),
(11, 'customer', 'customer', 'customer@email.coms', 'customer', 0),
(12, 'nico', 'test', 'test@yahoo.com', 'customer', 0),
(13, 'adsad', 'asdasd', 'customer@asd.com', 'customer', 0),
(14, 'test', 'test', 'test@test.com', 'customer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(3, 5, '', '', '', '', '', '', '', NULL, NULL),
(4, 11, 'nABAGO', 'NAITO', 0x416e672069796f6e67206d616c6977616e6167206e61206d6174616e64612061792067696e617761206e67206b616e79616e672074617568616e2e20416e672069796f6e6720627573696c616b206e79616e67206c757061206179206974696e616b73696c206e6720616b696e67206c6f6c61206d6f2e20416e67206b616e79616e67206d616c6173206e612062756e736f2061792064696e616d64616d206e672069796f6e672070616d6168616c61616e2e20416e67206174696e67206d61732d6d616c616b6173206d6f6e672062756e736f206179206973696e756c6174206e672069796f6e672074696e696b2e, '23123', 'Meycauayan', '0447218757', '09264746458', 'Philippines', 'http://walapa.com'),
(6, 12, 'Nico', 'Penaredondo', 0x233420506c7574205374726565742053746f204e696e6f, '3020', 'Meycauayan City', '1123123', '1231231', 'Philippines', ''),
(7, 13, 'Kristinell', 'Penaredondo', 0x50656e617265646f6e646f50656e617265646f6e646f50656e617265646f6e646f, '', '', '', '', '', ''),
(8, 14, '', '', '', '', '', '', '', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
