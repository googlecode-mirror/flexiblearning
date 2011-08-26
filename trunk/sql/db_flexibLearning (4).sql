-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 25, 2011 at 04:33 PM
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
-- Table structure for table `account`
--
-- Creation: Aug 23, 2011 at 07:09 AM
--

CREATE TABLE IF NOT EXISTS `account` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `DateOfBirth` int(11) NOT NULL,
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `IdNationality` int(11) NOT NULL,
  `Tel` text COLLATE utf8_unicode_ci,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `UserName` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `IdProfession` int(11) NOT NULL,
  `Favorite` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `AvatarURL` text COLLATE utf8_unicode_ci NOT NULL,
  `IdRole` int(11) NOT NULL,
  `AccountState` int(11) NOT NULL,
  `EnabledFullName` tinyint(4) NOT NULL DEFAULT '1',
  `EnabledDateOfBirth` tinyint(4) NOT NULL DEFAULT '1',
  `EnabledAddress` tinyint(4) NOT NULL DEFAULT '1',
  `EnabledNationality` tinyint(4) NOT NULL DEFAULT '1',
  `EnabledTel` tinyint(4) NOT NULL DEFAULT '1',
  `EnabledEmail` tinyint(4) NOT NULL DEFAULT '1',
  `EnabledProfession` tinyint(4) NOT NULL DEFAULT '1',
  `EnabledFavorite` tinyint(4) NOT NULL DEFAULT '1',
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdProfession` (`IdProfession`),
  KEY `IdNationality` (`IdNationality`),
  KEY `IdRole` (`IdRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='this is the content of User info' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `account`
--


-- --------------------------------------------------------

--
-- Table structure for table `accountpermisson`
--
-- Creation: Aug 24, 2011 at 12:28 AM
--

CREATE TABLE IF NOT EXISTS `accountpermisson` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Permission` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `accountpermisson`
--


-- --------------------------------------------------------

--
-- Table structure for table `account_entry`
--
-- Creation: Aug 24, 2011 at 06:24 PM
--

CREATE TABLE IF NOT EXISTS `account_entry` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdAccount` int(11) NOT NULL,
  `IdEntry` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdAccount` (`IdAccount`),
  KEY `IdEntry` (`IdEntry`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `account_entry`
--


-- --------------------------------------------------------

--
-- Table structure for table `account_message`
--
-- Creation: Aug 24, 2011 at 09:52 PM
--

CREATE TABLE IF NOT EXISTS `account_message` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdMessage` int(11) NOT NULL,
  `IdAccount` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdMessage` (`IdMessage`),
  KEY `IdAccount` (`IdAccount`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `account_message`
--


-- --------------------------------------------------------

--
-- Table structure for table `account_transaction`
--
-- Creation: Aug 24, 2011 at 08:25 AM
--

CREATE TABLE IF NOT EXISTS `account_transaction` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdTransaction` int(11) NOT NULL,
  `IdVideo` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdVideo` (`IdVideo`),
  KEY `IdTransaction` (`IdTransaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `account_transaction`
--


-- --------------------------------------------------------

--
-- Table structure for table `account_video`
--
-- Creation: Aug 24, 2011 at 06:41 PM
--

CREATE TABLE IF NOT EXISTS `account_video` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdVideo` int(11) NOT NULL,
  `IdAccount` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdVideo` (`IdVideo`),
  KEY `IdAccount` (`IdAccount`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `account_video`
--


-- --------------------------------------------------------

--
-- Table structure for table `answer`
--
-- Creation: Aug 24, 2011 at 06:56 PM
--

CREATE TABLE IF NOT EXISTS `answer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL DEFAULT '1',
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `answer`
--


-- --------------------------------------------------------

--
-- Table structure for table `banner`
--
-- Creation: Aug 24, 2011 at 12:34 AM
--

CREATE TABLE IF NOT EXISTS `banner` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `State` int(11) NOT NULL DEFAULT '1',
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `banner`
--


-- --------------------------------------------------------

--
-- Table structure for table `entry`
--
-- Creation: Aug 24, 2011 at 06:23 PM
--

CREATE TABLE IF NOT EXISTS `entry` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL DEFAULT '1' COMMENT '1: enable 0: disable',
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `entry`
--


-- --------------------------------------------------------

--
-- Table structure for table `language`
--
-- Creation: Aug 24, 2011 at 06:41 AM
--

CREATE TABLE IF NOT EXISTS `language` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL DEFAULT '1',
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `language`
--


-- --------------------------------------------------------

--
-- Table structure for table `message`
--
-- Creation: Aug 24, 2011 at 09:43 PM
--

CREATE TABLE IF NOT EXISTS `message` (
  `Id` int(11) NOT NULL,
  `Subject` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL DEFAULT '1',
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--


-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--
-- Creation: Aug 23, 2011 at 07:30 AM
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL DEFAULT '1',
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nationality`
--


-- --------------------------------------------------------

--
-- Table structure for table `partner`
--
-- Creation: Aug 24, 2011 at 12:31 AM
--

CREATE TABLE IF NOT EXISTS `partner` (
  `Id` int(11) NOT NULL,
  `Adress` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `Tel` text COLLATE utf8_unicode_ci NOT NULL,
  `Logo` text COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL DEFAULT '1',
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partner`
--


-- --------------------------------------------------------

--
-- Table structure for table `partner_banner`
--
-- Creation: Aug 24, 2011 at 06:36 AM
--

CREATE TABLE IF NOT EXISTS `partner_banner` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdPartner` int(11) NOT NULL,
  `IdBanner` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdPartner` (`IdPartner`),
  KEY `IdBanner` (`IdBanner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `partner_banner`
--


-- --------------------------------------------------------

--
-- Table structure for table `payment`
--
-- Creation: Aug 24, 2011 at 06:29 PM
--

CREATE TABLE IF NOT EXISTS `payment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL DEFAULT '1',
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `payment`
--


-- --------------------------------------------------------

--
-- Table structure for table `profession`
--
-- Creation: Aug 23, 2011 at 07:34 AM
--

CREATE TABLE IF NOT EXISTS `profession` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL,
  `CreatedDate` int(1) NOT NULL,
  `CreatedBy` int(1) NOT NULL,
  `UpdatedDate` int(1) NOT NULL,
  `UpdatedBy` int(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `profession`
--


-- --------------------------------------------------------

--
-- Table structure for table `question`
--
-- Creation: Aug 24, 2011 at 06:53 PM
--

CREATE TABLE IF NOT EXISTS `question` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `question`
--


-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--
-- Creation: Aug 24, 2011 at 06:58 PM
--

CREATE TABLE IF NOT EXISTS `question_answer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdQuestion` int(11) NOT NULL,
  `IdAnswer` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdQuestion` (`IdQuestion`),
  KEY `IdAnswer` (`IdAnswer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `question_answer`
--


-- --------------------------------------------------------

--
-- Table structure for table `role`
--
-- Creation: Aug 25, 2011 at 10:58 AM
--

CREATE TABLE IF NOT EXISTS `role` (
  `Id` int(11) NOT NULL,
  `Role` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Descrption` longtext COLLATE utf8_unicode_ci NOT NULL,
  `IdLanguage` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdLanguage` (`IdLanguage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--


-- --------------------------------------------------------

--
-- Table structure for table `role_accountpermission`
--
-- Creation: Aug 25, 2011 at 11:03 AM
--

CREATE TABLE IF NOT EXISTS `role_accountpermission` (
  `Id` int(11) NOT NULL,
  `IdRole` int(11) NOT NULL,
  `IdPermission` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdRole` (`IdRole`),
  KEY `IdPermission` (`IdPermission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_accountpermission`
--


-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--
-- Creation: Aug 24, 2011 at 08:22 AM
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transaction`
--


-- --------------------------------------------------------

--
-- Table structure for table `transaction_payment`
--
-- Creation: Aug 24, 2011 at 06:30 PM
--

CREATE TABLE IF NOT EXISTS `transaction_payment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdTransaction` int(11) NOT NULL,
  `IdPayment` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdPayment` (`IdPayment`),
  KEY `IdTransaction` (`IdTransaction`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transaction_payment`
--


-- --------------------------------------------------------

--
-- Table structure for table `video`
--
-- Creation: Aug 24, 2011 at 06:56 AM
--

CREATE TABLE IF NOT EXISTS `video` (
  `Id` int(11) NOT NULL,
  `Name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NumView` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `IdLanguage` int(11) NOT NULL,
  `IdCategory` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdLanguage` (`IdLanguage`),
  KEY `IdCategory` (`IdCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--


-- --------------------------------------------------------

--
-- Table structure for table `videocategory`
--
-- Creation: Aug 24, 2011 at 07:00 AM
--

CREATE TABLE IF NOT EXISTS `videocategory` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `IdLanguage` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdLanguage` (`IdLanguage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `videocategory`
--


-- --------------------------------------------------------

--
-- Table structure for table `videodocument`
--
-- Creation: Aug 24, 2011 at 07:32 AM
--

CREATE TABLE IF NOT EXISTS `videodocument` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `IdLanguage` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdLanguage` (`IdLanguage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `videodocument`
--


-- --------------------------------------------------------

--
-- Table structure for table `videonotification`
--
-- Creation: Aug 24, 2011 at 08:09 AM
--

CREATE TABLE IF NOT EXISTS `videonotification` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `IdLanguage` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdLanguage` (`IdLanguage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `videonotification`
--


-- --------------------------------------------------------

--
-- Table structure for table `videosurvey`
--
-- Creation: Aug 24, 2011 at 07:41 AM
--

CREATE TABLE IF NOT EXISTS `videosurvey` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `IdLanguage` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdLanguage` (`IdLanguage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `videosurvey`
--


-- --------------------------------------------------------

--
-- Table structure for table `video_question`
--
-- Creation: Aug 24, 2011 at 06:55 PM
--

CREATE TABLE IF NOT EXISTS `video_question` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdVideo` int(11) NOT NULL,
  `IdQuestion` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdVideo` (`IdVideo`),
  KEY `IdQuestion` (`IdQuestion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `video_question`
--


-- --------------------------------------------------------

--
-- Table structure for table `video_videodocument`
--
-- Creation: Aug 24, 2011 at 07:52 AM
--

CREATE TABLE IF NOT EXISTS `video_videodocument` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdVideo` int(11) NOT NULL,
  `IdDocument` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdVideo` (`IdVideo`),
  KEY `IdDocument` (`IdDocument`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `video_videodocument`
--


-- --------------------------------------------------------

--
-- Table structure for table `video_videonotification`
--
-- Creation: Aug 24, 2011 at 08:12 AM
--

CREATE TABLE IF NOT EXISTS `video_videonotification` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdVideo` int(11) NOT NULL,
  `IdNotification` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdNotification` (`IdNotification`),
  KEY `IdVideo` (`IdVideo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `video_videonotification`
--


-- --------------------------------------------------------

--
-- Table structure for table `video_videosurvey`
--
-- Creation: Aug 24, 2011 at 07:50 AM
--

CREATE TABLE IF NOT EXISTS `video_videosurvey` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdVideo` int(11) NOT NULL,
  `IdSurvey` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdVideo` (`IdVideo`),
  KEY `IdSurvey` (`IdSurvey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `video_videosurvey`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_4` FOREIGN KEY (`IdRole`) REFERENCES `role` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`IdNationality`) REFERENCES `nationality` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_ibfk_3` FOREIGN KEY (`IdProfession`) REFERENCES `profession` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `account_message`
--
ALTER TABLE `account_message`
  ADD CONSTRAINT `account_message_ibfk_1` FOREIGN KEY (`IdMessage`) REFERENCES `message` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_message_ibfk_2` FOREIGN KEY (`IdAccount`) REFERENCES `account` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `account_transaction`
--
ALTER TABLE `account_transaction`
  ADD CONSTRAINT `account_transaction_ibfk_1` FOREIGN KEY (`IdTransaction`) REFERENCES `transaction` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_transaction_ibfk_2` FOREIGN KEY (`IdVideo`) REFERENCES `video` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `account_video`
--
ALTER TABLE `account_video`
  ADD CONSTRAINT `account_video_ibfk_3` FOREIGN KEY (`IdVideo`) REFERENCES `video` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_video_ibfk_4` FOREIGN KEY (`IdAccount`) REFERENCES `account` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partner_banner`
--
ALTER TABLE `partner_banner`
  ADD CONSTRAINT `partner_banner_ibfk_1` FOREIGN KEY (`IdPartner`) REFERENCES `partner` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partner_banner_ibfk_2` FOREIGN KEY (`IdBanner`) REFERENCES `partner_banner` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD CONSTRAINT `question_answer_ibfk_1` FOREIGN KEY (`IdQuestion`) REFERENCES `question` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_answer_ibfk_2` FOREIGN KEY (`IdAnswer`) REFERENCES `answer` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`IdLanguage`) REFERENCES `language` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_accountpermission`
--
ALTER TABLE `role_accountpermission`
  ADD CONSTRAINT `role_accountpermission_ibfk_2` FOREIGN KEY (`IdPermission`) REFERENCES `accountpermisson` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_accountpermission_ibfk_1` FOREIGN KEY (`IdRole`) REFERENCES `role` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_payment`
--
ALTER TABLE `transaction_payment`
  ADD CONSTRAINT `transaction_payment_ibfk_1` FOREIGN KEY (`IdTransaction`) REFERENCES `transaction` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_payment_ibfk_2` FOREIGN KEY (`IdPayment`) REFERENCES `payment` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_2` FOREIGN KEY (`IdCategory`) REFERENCES `videocategory` (`Id`),
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`IdLanguage`) REFERENCES `language` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videocategory`
--
ALTER TABLE `videocategory`
  ADD CONSTRAINT `videocategory_ibfk_1` FOREIGN KEY (`IdLanguage`) REFERENCES `language` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videodocument`
--
ALTER TABLE `videodocument`
  ADD CONSTRAINT `videodocument_ibfk_1` FOREIGN KEY (`IdLanguage`) REFERENCES `language` (`Id`);

--
-- Constraints for table `videonotification`
--
ALTER TABLE `videonotification`
  ADD CONSTRAINT `videonotification_ibfk_1` FOREIGN KEY (`IdLanguage`) REFERENCES `language` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videosurvey`
--
ALTER TABLE `videosurvey`
  ADD CONSTRAINT `videosurvey_ibfk_1` FOREIGN KEY (`IdLanguage`) REFERENCES `language` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_question`
--
ALTER TABLE `video_question`
  ADD CONSTRAINT `video_question_ibfk_1` FOREIGN KEY (`IdVideo`) REFERENCES `video` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_question_ibfk_2` FOREIGN KEY (`IdQuestion`) REFERENCES `question` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_videodocument`
--
ALTER TABLE `video_videodocument`
  ADD CONSTRAINT `video_videodocument_ibfk_1` FOREIGN KEY (`IdVideo`) REFERENCES `video` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_videodocument_ibfk_2` FOREIGN KEY (`IdDocument`) REFERENCES `videodocument` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_videonotification`
--
ALTER TABLE `video_videonotification`
  ADD CONSTRAINT `video_videonotification_ibfk_1` FOREIGN KEY (`IdVideo`) REFERENCES `video` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_videonotification_ibfk_2` FOREIGN KEY (`IdNotification`) REFERENCES `videonotification` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_videosurvey`
--
ALTER TABLE `video_videosurvey`
  ADD CONSTRAINT `video_videosurvey_ibfk_1` FOREIGN KEY (`IdVideo`) REFERENCES `video` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_videosurvey_ibfk_2` FOREIGN KEY (`IdSurvey`) REFERENCES `videosurvey` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
