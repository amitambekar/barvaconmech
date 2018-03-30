-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2017 at 01:02 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `barva`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `interests` varchar(255) NOT NULL,
  `query` text NOT NULL,
  `requirement` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `contact_number`, `company_name`, `interests`, `query`, `requirement`, `type`, `created_date`) VALUES
(1, 'Amit', '0908900800', 'Gsquare', '9, 8', 'dnt have work yet', 'regular', 'Contact Us', '2017-01-09 00:50:37'),
(2, 'Amit', '0908900800', 'Gsquare', '9, 8', 'dnt have work yet', 'regular', 'Contact Us', '2017-01-09 00:50:54'),
(3, 'Amit', '0908900800', 'Gsquare', '9, 8', 'dnt have work yet', 'regular', 'Contact Us', '2017-01-09 00:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `media_id` int(255) NOT NULL AUTO_INCREMENT,
  `product_id` int(255) NOT NULL,
  `image_path` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `main` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `product_id`, `image_path`, `type`, `main`, `created_date`, `status`) VALUES
(1, 1, '1471283689_5441_455px-Goddess_Saptashrungi_Devi_of_Vani_near_Nasik_city_Maharashta.jpg', 'product', 1, '2016-08-15 17:54:49', 'active'),
(2, 1, '1471283689_8037_182327_431475086972069_75171139_n.jpg', 'product', 0, '2016-08-15 17:54:49', 'active'),
(3, 1, '1471283689_5336_1234764_513989598677568_500653107_n.jpg', 'product', 0, '2016-08-15 17:54:49', 'active'),
(4, 1, '1471283689_8940_5316683.jpg', 'product', 0, '2016-08-15 17:54:49', 'active'),
(5, 1, '1471283689_2212_6689430.jpg', 'product', 0, '2016-08-15 17:54:49', 'active'),
(6, 1, '1471283690_4715_3291520494_da75bdb069.jpg', 'product', 0, '2016-08-15 17:54:50', 'active'),
(7, 1, '1471283690_1431_3587478037_4f36f99023.jpg', 'product', 0, '2016-08-15 17:54:50', 'active'),
(8, 0, '1471286323_6220_Chhatrapati-Shivaji-Maharaj-Image-Closeup.jpg', 'product', 1, '2016-08-15 18:38:43', 'active'),
(9, 0, '1471286364_4283_1234764_513989598677568_500653107_n.jpg', 'product', 1, '2016-08-15 18:39:24', 'active'),
(10, 0, '1471286445_5517_455px-Goddess_Saptashrungi_Devi_of_Vani_near_Nasik_city_Maharashta.jpg', 'product', 1, '2016-08-15 18:40:45', 'active'),
(11, 0, '1471286488_2340_455px-Goddess_Saptashrungi_Devi_of_Vani_near_Nasik_city_Maharashta.jpg', 'product', 1, '2016-08-15 18:41:28', 'active'),
(12, 0, '1471286528_7462_6689430.jpg', 'product', 1, '2016-08-15 18:42:08', 'active'),
(13, 0, '1471286599_9672_1234764_513989598677568_500653107_n.jpg', 'product', 1, '2016-08-15 18:43:19', 'active'),
(14, 0, '1471286755_8387_1234764_513989598677568_500653107_n.jpg', 'product', 1, '2016-08-15 18:45:55', 'active'),
(15, 0, '1471286783_8663_1234764_513989598677568_500653107_n.jpg', 'product', 1, '2016-08-15 18:46:23', 'active'),
(16, 0, '1471286975_4283_182327_431475086972069_75171139_n.jpg', 'product', 1, '2016-08-15 18:49:35', 'active'),
(17, 0, '1471287040_7608_GANESHA.jpg', 'product', 1, '2016-08-15 18:50:40', 'active'),
(20, 2, '1472241841_8815_fire-product-1.jpg', 'product', 1, '2016-08-26 20:04:01', 'active'),
(21, 3, '1472244127_5356_bg-transfer.png', 'product', 1, '2016-08-26 20:42:07', 'active'),
(22, 4, '1472244587_5621_contact-bg.jpg', 'product', 1, '2016-08-26 20:49:47', 'active'),
(23, 5, '1472582915_6035_fire-product.jpg', 'product', 1, '2016-08-30 18:48:35', 'active'),
(24, 5, '1472582915_5752_fire-product-1.jpg', 'product', 0, '2016-08-30 18:48:35', 'active'),
(25, 5, '1472582915_9940_fire-product-2.jpg', 'product', 0, '2016-08-30 18:48:35', 'active'),
(26, 5, '1472582915_2090_fire-product-3.jpg', 'product', 0, '2016-08-30 18:48:35', 'active'),
(27, 6, '1472999589_3550_fire-product.jpg', 'product', 1, '2016-09-04 14:33:09', 'active'),
(28, 6, '1472999589_1350_fire-product-1.jpg', 'product', 0, '2016-09-04 14:33:09', 'active'),
(29, 6, '1472999590_1851_fire-product-2.jpg', 'product', 0, '2016-09-04 14:33:10', 'active'),
(30, 6, '1472999590_3784_fire-product-3.jpg', 'product', 0, '2016-09-04 14:33:10', 'active'),
(31, 7, '1477933002_9585_5.png', 'product', 1, '2016-10-31 16:56:42', 'active'),
(32, 7, '1477933002_6698_4.png', 'product', 0, '2016-10-31 16:56:42', 'active'),
(33, 7, '1477933002_4092_2.png', 'product_gallery', 0, '2016-10-31 16:56:42', 'active'),
(34, 8, '1477933123_5601_5.png', 'product', 1, '2016-10-31 16:58:43', 'active'),
(35, 8, '1477933123_7534_4.png', 'product', 0, '2016-10-31 16:58:43', 'active'),
(36, 8, '1477933123_9792_3.png', 'product', 0, '2016-10-31 16:58:43', 'active'),
(37, 8, '1477933123_6595_2.png', 'product', 0, '2016-10-31 16:58:43', 'active'),
(40, 8, '1477936011_9807_close.png', 'product_gallery', 0, '2016-10-31 17:46:51', 'active'),
(41, 8, '1477936011_1660_7.png', 'product_gallery', 0, '2016-10-31 17:46:51', 'active'),
(42, 8, '1477936011_4072_6.png', 'product_gallery', 0, '2016-10-31 17:46:51', 'active'),
(43, 8, '1477936012_7252_5.png', 'product_gallery', 0, '2016-10-31 17:46:52', 'active'),
(44, 9, '1483261107_1132_1.png', 'product', 1, '2017-01-01 08:58:27', 'active'),
(45, 9, '1483261107_2613_7.png', 'product_gallery', 0, '2017-01-01 08:58:27', 'active'),
(46, 9, '1483261107_7379_6.png', 'product_gallery', 0, '2017-01-01 08:58:27', 'active'),
(47, 9, '1483261107_7240_5.png', 'product_gallery', 0, '2017-01-01 08:58:27', 'active'),
(48, 9, '1483261107_3578_4.png', 'product_gallery', 0, '2017-01-01 08:58:27', 'active'),
(49, 10, '1483261172_9444_4.png', 'product', 1, '2017-01-01 08:59:32', 'active'),
(50, 10, '1483261172_1661_6.png', 'product_gallery', 0, '2017-01-01 08:59:32', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `product_service`
--

CREATE TABLE IF NOT EXISTS `product_service` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `category_id` int(255) NOT NULL,
  `product_name` text NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product_service`
--

INSERT INTO `product_service` (`id`, `category_id`, `product_name`, `description`, `created_date`, `status`) VALUES
(1, 8, 'ab', 'The&nbsp;<code>$.each()</code>&nbsp;function is not the same as&nbsp;$(selector).each(), which is used to iterate, exclusively, over a jQuery object. The<code>$.each()</code>&nbsp;function can be used to iterate over any collection, whether it is an object or an array. In the case of an array, the callback is passed an array index and a corresponding array value each time. (The value can also be accessed through the&nbsp;<code>this</code>&nbsp;keyword, but Javascript will always wrap the&nbsp;<code>this</code>&nbsp;value as an&nbsp;<code>Object</code>&nbsp;even if it is a simple string or number value.) The method returns its first argument, the object that was iterated.', '2016-08-16 00:27:56', 'active'),
(2, 6, 'asdsad', 'asdad', '2016-08-27 01:34:01', 'active'),
(3, 8, 'abcdefg', 'kljkjkljkl', '2016-08-27 02:12:07', 'active'),
(4, 8, 'last', 'jkhklklkl', '2016-08-27 02:19:47', 'active'),
(5, 8, 'fggfh', 'fdgfdg', '2016-08-31 00:18:35', 'active'),
(6, 9, 'product 5', 'The&nbsp;<code>$.each()</code>&nbsp;<b>function </b><i>is not the same as&nbsp;$(selector).each(), which is used to iterate, exclusively,<br>&nbsp;o</i>ver a jQuery object. The<code>$.each()</code>&nbsp;function can be used to iterate over any collection, whether it is an object or an array. In the case of an array, the callback is passed an array index and a corresponding array value each time. (The value can also be accessed through the&nbsp;<code>this</code>&nbsp;keyword, but Javascript will always wrap the&nbsp;<code>this</code>&nbsp;value as an&nbsp;<code>Object</code><span>&nbsp;even if it is a simple string or number value.) The method returns its first argument, the object that was iterated.</span>', '2016-09-04 20:03:09', 'active'),
(7, 9, 'Amit', 'fdgdfhdf', '2016-10-31 22:26:42', 'active'),
(8, 9, 'as', 'ghfdg', '2016-10-31 23:16:51', 'active'),
(9, 5, 'amb', 'sndjsdhjhv h', '2017-01-01 14:28:27', 'active'),
(10, 5, 'masd', 'asd', '2017-01-01 14:29:32', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `product_service_category`
--

CREATE TABLE IF NOT EXISTS `product_service_category` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `category_name` text NOT NULL,
  `created_date` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product_service_category`
--

INSERT INTO `product_service_category` (`id`, `category_name`, `created_date`, `status`) VALUES
(5, 'cat 1', '2016-08-15 23:22:31', 'active'),
(6, 'cat 2', '2016-08-15 23:22:36', 'active'),
(8, 'cat 4', '2016-08-15 23:22:46', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `text_configurations`
--

CREATE TABLE IF NOT EXISTS `text_configurations` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `text_configurations`
--

INSERT INTO `text_configurations` (`id`, `type`, `data`, `created_date`, `status`) VALUES
(1, 'sidebar_materials', 'All types of non-ferrous materials like; Brass gunmetal, Bronze, Aluminium etc..', '2017-01-01', 'active'),
(2, 'contact_details', '<p>lorem ipsun i ssimple text </br> Lorem ipsun i ssimple text </br></p>\n    <p>Email ID : <a href="mailto:info@barva.com">info@barva.com</a></p>\n\n    <p>Contact Person :</p>\n    <p> Raju Palshetkar :09812371231 </br> Rakesh Palshetkar : 65675675735</p>', '2017-01-01', 'active'),
(3, 'header_contact_us', '91-8767827356', '2017-01-01', 'active'),
(4, 'footer_address', 'naigaon west', '2017-01-01', 'active'),
(5, 'footer_emailid', 'test@test.com', '2017-01-01', 'active'),
(6, 'facebook_link', 'https://www.facebook.com/BarvaConMech', '2017-01-01', 'active'),
(7, 'twitter_link', 'https://www.facebook.com', '2017-01-01', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `profile_img` text NOT NULL,
  `created_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `profile_img`, `created_date`, `status`) VALUES
(1, 'admin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 'Admin', '', '2016-07-24 00:00:00', 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
