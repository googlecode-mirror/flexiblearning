-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2011 at 02:20 PM
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
-- Table structure for table `video_videosurvey`
--

CREATE TABLE IF NOT EXISTS `video_videosurvey` (
  `IdVideo` int(11) NOT NULL,
  `IdSurvey` int(11) NOT NULL,
  PRIMARY KEY (`IdVideo`,`IdSurvey`),
  KEY `IdVideo` (`IdVideo`),
  KEY `IdSurvey` (`IdSurvey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video_videosurvey`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `video_videosurvey`
--
ALTER TABLE `video_videosurvey`
  ADD CONSTRAINT `video_videosurvey_ibfk_1` FOREIGN KEY (`IdVideo`) REFERENCES `video` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_videosurvey_ibfk_2` FOREIGN KEY (`IdSurvey`) REFERENCES `videosurvey` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
