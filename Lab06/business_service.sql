-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 10, 2021 at 03:15 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `biz_categories`
--

DROP TABLE IF EXISTS `biz_categories`;
CREATE TABLE IF NOT EXISTS `biz_categories` (
  `BusinessID` int(4) NOT NULL,
  `CategoryID` varchar(10) NOT NULL,
  KEY `fk_1` (`BusinessID`),
  KEY `fk_2` (`CategoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biz_categories`
--

INSERT INTO `biz_categories` (`BusinessID`, `CategoryID`) VALUES
(0, 'HEALTH'),
(0, 'SCHOOL'),
(1, 'SCHOOL');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
CREATE TABLE IF NOT EXISTS `businesses` (
  `BusinessID` int(4) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Telephone` varchar(100) DEFAULT NULL,
  `URL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`BusinessID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`BusinessID`, `Name`, `Address`, `City`, `Telephone`, `URL`) VALUES
(0, 'Leardorf Beauty Salon and Academy', '123 Any Street', 'Toronto', '(555) 123-4567', 'http://www.google.com'),
(1, 'Auto School', '123 Some Street', 'Gainsville', '(999) 555-1234', 'http://www.autoschool.net');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryID` varchar(10) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `Title`, `Description`) VALUES
('AUTO', 'Automotive Parts and Supplies', 'Accessories for your car'),
('FISH', 'Seafood Stores and Restaurants', 'Place to get your fish'),
('HEALTH', 'Health and Beauty', 'Everything for the body'),
('SCHOOL', 'Schools and Colleges', 'Public and Private Learning'),
('SPORTS', 'Community Sports and Recreation', 'Guide to Parks and Leagues');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
