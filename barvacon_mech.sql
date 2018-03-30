-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2017 at 01:08 PM
-- Server version: 5.5.54-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `barvacon_mech`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `contact_number`, `company_name`, `interests`, `query`, `requirement`, `type`, `created_date`) VALUES
(1, 'Amit', '0908900800', 'Gsquare', '9, 8', 'dnt have work yet', 'regular', 'Contact Us', '2017-01-09 00:50:37'),
(2, 'Amit', '0908900800', 'Gsquare', '9, 8', 'dnt have work yet', 'regular', 'Contact Us', '2017-01-09 00:50:54'),
(3, 'Amit', '0908900800', 'Gsquare', '9, 8', 'dnt have work yet', 'regular', 'Contact Us', '2017-01-09 00:51:06'),
(4, 'Ambekar', '0987654321', 'Gsquare', '10, 9, 8, 7', 'testing', 'regular', 'Contact Us', '2017-01-09 08:09:15'),
(5, 'Ambekar', '0987654321', 'Gsquare', '10, 9, 8, 7', 'testing', 'regular', 'Contact Us', '2017-01-09 08:10:27'),
(6, 'Ambekar', '0987654321', 'Gsquare', '10, 9, 8, 7', 'testing', 'regular', 'Contact Us', '2017-01-09 08:12:36'),
(7, 'Ambekar', '0987654321', 'Gsquare', '10, 9, 8, 7', 'testing', 'regular', 'Contact Us', '2017-01-09 08:17:04'),
(8, 'Ambekar', '0987654321', 'Gsquare', '10, 9, 8, 7', 'testing', 'regular', 'Contact Us', '2017-01-09 08:18:46'),
(9, 'Ambekar', '0987654321', 'Gsquare', '10, 9, 8, 7', 'testing', 'regular', 'Contact Us', '2017-01-09 08:19:13'),
(10, 'Ambekar', '0987654321', 'Gsquare', '10, 9, 8, 7', 'testing', 'regular', 'Contact Us', '2017-01-09 08:19:45'),
(11, 'Ambekar', '0987654321', 'Gsquare', '10, 9, 8, 7', 'testing', 'regular', 'Contact Us', '2017-01-09 08:24:46'),
(12, 'Ambekar', '0987654321', 'Gsquare', '10, 9, 8, 7', 'testing', 'regular', 'Contact Us', '2017-01-09 08:26:37'),
(13, 'Ambekar', '0987654321', 'Gsquare', '10, 9, 8, 7', 'testing', 'regular', 'Contact Us', '2017-01-09 08:28:42'),
(14, 'Ambekar', '0987654321', 'Gsquare', '10, 9, 8, 7', 'testing', 'regular', 'Contact Us', '2017-01-09 08:29:59'),
(15, 'Ambekar', '0987654321', 'Gsquare', '10, 9, 8, 7', 'testing', 'regular', 'Contact Us', '2017-01-09 08:31:04'),
(16, 'Ambekar', '0987654321', 'gsquare', '10, 9', 'testing', 'regular', 'Contact Us', '2017-01-14 11:15:48'),
(17, 'Ambekar', '0987654321', 'gsquare', '10, 9', 'testing', 'regular', 'Contact Us', '2017-01-14 11:16:03'),
(18, 'Ambekar', '0987654321', 'gsquare', '10, 9', 'testing', 'regular', 'Contact Us', '2017-01-14 11:18:49'),
(19, 'raju', '8898306758', '', '', '', '', 'Enquiry', '2017-01-14 15:39:24'),
(20, 'raju', '9029071769', '', '', '', '', 'Enquiry', '2017-01-15 10:33:41');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `product_id`, `image_path`, `type`, `main`, `created_date`, `status`) VALUES
(51, 11, '1484473380_4207_IMG_20161001_152351.jpg', 'product', 1, '2017-01-15 14:43:00', 'active'),
(52, 11, '1484473380_4518_IMG_20161001_152351.jpg', 'product_gallery', 0, '2017-01-15 14:43:00', 'active'),
(53, 12, '1484473899_6630_IMG_20161001_151709.jpg', 'product', 1, '2017-01-15 14:51:39', 'active'),
(54, 12, '1484473899_2232_IMG_20161001_151709.jpg', 'product_gallery', 0, '2017-01-15 14:51:39', 'active'),
(55, 13, '1484474102_3069_Branch_pipe.jpg', 'product', 1, '2017-01-15 14:55:02', 'active'),
(56, 13, '1484474102_2616_Branch_pipe.jpg', 'product_gallery', 0, '2017-01-15 14:55:02', 'active'),
(57, 14, '1484474186_3267_ARV.jpg', 'product', 1, '2017-01-15 14:56:26', 'active'),
(58, 14, '1484474186_5165_ARV.jpg', 'product_gallery', 0, '2017-01-15 14:56:26', 'active'),
(59, 15, '1484476030_2138_Gravity_die_casting.jpg', 'product', 1, '2017-01-15 15:27:10', 'active'),
(60, 15, '1484476030_3319_Gravity_die_casting.jpg', 'product_gallery', 0, '2017-01-15 15:27:10', 'active');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `product_service`
--

INSERT INTO `product_service` (`id`, `category_id`, `product_name`, `description`, `created_date`, `status`) VALUES
(11, 9, 'Brass NRV', 'Connecting parts are Designed &amp; Manufactured as per ISI dimensions to meet fitment with ISI marked products.<br>Materials Available: Brass/Steel<br><br>', '2017-01-15 09:43:00', 'active'),
(12, 9, 'Male Adapter (NRV without spring)', 'Connecting parts are Designed &amp; Manufactured as per ISI dimensions to meet fitment with ISI marked products.<br><br>Materials Available: Brass/Steel<br><br>Connecting Threads: 63mm (2.5")<br><br>', '2017-01-15 09:51:39', 'active'),
(13, 9, 'Short Branch Pipe', 'Connecting parts are Designed &amp; Manufactured as per ISI dimensions to meet fitment with ISI marked products.<br><br>Materials Available: Brass / Steel / Aluminium<br><br>', '2017-01-15 09:57:13', 'active'),
(14, 9, 'Air Release Valve with dust Protecting cap', 'Materials Available: Brass/Steel<br><br>Connecting Threads: 25mm (1")<br>', '2017-01-15 09:56:26', 'active'),
(15, 10, 'Gravity Die Casting Manufacturing', 'We are manufacturing &amp; supplying good quality gravity die castings in non-ferrous materials like brass, gunmetal &amp; other copper alloys &amp; Aluminium alloys, to meet our customer''s requirement.<br><br>We focus on customer satisfaction in terms of Quality &amp; on time service.<br>', '2017-01-15 10:27:10', 'active');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product_service_category`
--

INSERT INTO `product_service_category` (`id`, `category_name`, `created_date`, `status`) VALUES
(9, 'Fire Fighting Products', '2017-01-14 11:25:45', 'active'),
(10, 'Non-ferrous Casting Manufacturing', '2017-01-15 09:34:40', 'active');

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
(1, 'sidebar_materials', 'Materials for casting manufacturing: \nCopper & Aluminium alloys like brass, Gunmetal, Aluminium etc.', '2017-01-15', 'active'),
(2, 'contact_details', 'Reg Address: \n606/2, Aman Adarsh Nagar CHS Ltd.\nChandawarkar road, Boriwali (W), Mumbai 92\n \n    <p>Email ID : <a href="mailto:sales@barvaconmech.com">sales@barvaconmech.com</a></p>\n\n    <p>Contact Person :</p>\n    <p> Raju Palshetkar :<a href="tel:08898306758">8898306758</a> </br>', '2017-01-15', 'active'),
(3, 'header_contact_us', '91-8898306758', '2017-01-15', 'active'),
(4, 'footer_address', 'Boriwali (W)', '2017-01-15', 'active'),
(5, 'footer_emailid', 'sales@barvaconmech.com', '2017-01-15', 'active'),
(6, 'facebook_link', 'https://www.facebook.com/BarvaConMech', '2017-01-15', 'active'),
(7, 'twitter_link', 'https://www.facebook.com/BarvaConMech', '2017-01-15', 'active');

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
