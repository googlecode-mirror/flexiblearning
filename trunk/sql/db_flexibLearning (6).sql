-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2011 at 06:17 PM
-- Server version: 5.1.50
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flexib_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Path` text COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL DEFAULT '1',
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`Id`, `Path`, `State`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`) VALUES
(2, 'resources/logo/Capture4.PNG', 1, 1314525932, 1, 1314525932, 1),
(3, 'resources/logo//Capture5.PNG', 1, 1314526059, 1, 1314526059, 1),
(4, 'resources/logo/Capture6.PNG', 1, 1314526100, 1, 1314526100, 1),
(5, 'resources/logo/Capture7.PNG', 1, 1314526188, 1, 1314526188, 1),
(6, 'resources/logo/Capture8.PNG', 1, 1314526347, 1, 1314526347, 1),
(7, 'resources/logo/Capture9.PNG', 1, 1314526428, 1, 1314526428, 1);
