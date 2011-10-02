-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2011 at 02:43 PM
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
-- Table structure for table `account_lecture`
--

CREATE TABLE IF NOT EXISTS `account_lecture` (
  `IdAccount` int(11) NOT NULL,
  `IdLecture` int(11) NOT NULL,
  PRIMARY KEY (`IdAccount`,`IdLecture`),
  KEY `IdAccount` (`IdAccount`),
  KEY `IdLecture` (`IdLecture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_lecture`
--
ALTER TABLE `account_lecture`
  ADD CONSTRAINT `account_lecture_ibfk_2` FOREIGN KEY (`IdLecture`) REFERENCES `lecture` (`Id`),
  ADD CONSTRAINT `account_lecture_ibfk_1` FOREIGN KEY (`IdAccount`) REFERENCES `account` (`Id`);
