-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 06, 2011 at 03:30 PM
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

CREATE TABLE IF NOT EXISTS `account` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `DateOfBirth` int(11) NOT NULL,
  `Address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `IdNationality` int(11) NOT NULL,
  `Tel` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `UserName` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `IdProfession` int(11) NOT NULL,
  `Favorite` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `AvatarId` int(11) DEFAULT NULL,
  `IdRole` int(11) NOT NULL,
  `State` int(11) NOT NULL,
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
  `LastLoginDate` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdProfession` (`IdProfession`),
  KEY `IdNationality` (`IdNationality`),
  KEY `IdRole` (`IdRole`),
  KEY `AvatarId` (`AvatarId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='this is the content of User info' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `accountpermisson`
--

CREATE TABLE IF NOT EXISTS `accountpermisson` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Permission` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `account_entry`
--

CREATE TABLE IF NOT EXISTS `account_entry` (
  `IdAccount` int(11) NOT NULL,
  `IdEntry` int(11) NOT NULL,
  PRIMARY KEY (`IdAccount`,`IdEntry`),
  KEY `IdAccount` (`IdAccount`),
  KEY `IdEntry` (`IdEntry`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `account_message`
--

CREATE TABLE IF NOT EXISTS `account_message` (
  `IdMessage` int(11) NOT NULL,
  `IdAccount` int(11) NOT NULL,
  PRIMARY KEY (`IdMessage`,`IdAccount`),
  KEY `IdMessage` (`IdMessage`),
  KEY `IdAccount` (`IdAccount`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_transaction`
--

CREATE TABLE IF NOT EXISTS `account_transaction` (
  `IdTransaction` int(11) NOT NULL,
  `IdVideo` int(11) NOT NULL,
  PRIMARY KEY (`IdTransaction`,`IdVideo`),
  KEY `IdVideo` (`IdVideo`),
  KEY `IdTransaction` (`IdTransaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_video`
--

CREATE TABLE IF NOT EXISTS `account_video` (
  `IdVideo` int(11) NOT NULL,
  `IdAccount` int(11) NOT NULL,
  PRIMARY KEY (`IdVideo`,`IdAccount`),
  KEY `IdVideo` (`IdVideo`),
  KEY `IdAccount` (`IdAccount`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
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

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Position` int(11) NOT NULL,
  `IdResource` int(11) NOT NULL,
  `State` int(11) NOT NULL DEFAULT '1',
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdResource` (`IdResource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `entry`
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

-- --------------------------------------------------------

--
-- Table structure for table `language`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `Id` int(11) NOT NULL,
  `Subject` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL DEFAULT '1',
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tel` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LogoId` int(11) NOT NULL,
  `Link` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `State` int(11) NOT NULL DEFAULT '1',
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `LogoId` (`LogoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `partner_banner`
--

CREATE TABLE IF NOT EXISTS `partner_banner` (
  `IdPartner` int(11) NOT NULL,
  `IdBanner` int(11) NOT NULL,
  PRIMARY KEY (`IdPartner`,`IdBanner`),
  KEY `IdPartner` (`IdPartner`),
  KEY `IdBanner` (`IdBanner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
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

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `question`
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

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE IF NOT EXISTS `question_answer` (
  `IdQuestion` int(11) NOT NULL,
  `IdAnswer` int(11) NOT NULL,
  PRIMARY KEY (`IdQuestion`,`IdAnswer`),
  KEY `IdQuestion` (`IdQuestion`),
  KEY `IdAnswer` (`IdAnswer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Path` text COLLATE utf8_unicode_ci NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Descrption` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `IdLanguage` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdLanguage` (`IdLanguage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `role_accountpermission`
--

CREATE TABLE IF NOT EXISTS `role_accountpermission` (
  `IdRole` int(11) NOT NULL,
  `IdPermission` int(11) NOT NULL,
  PRIMARY KEY (`IdRole`,`IdPermission`),
  KEY `IdRole` (`IdRole`),
  KEY `IdPermission` (`IdPermission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `State` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_payment`
--

CREATE TABLE IF NOT EXISTS `transaction_payment` (
  `IdTransaction` int(11) NOT NULL,
  `IdPayment` int(11) NOT NULL,
  PRIMARY KEY (`IdTransaction`,`IdPayment`),
  KEY `IdPayment` (`IdPayment`),
  KEY `IdTransaction` (`IdTransaction`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` longtext,
  `NumView` int(11) NOT NULL,
  `Ranking` int(11) NOT NULL,
  `NumRanking` int(11) NOT NULL,
  `Price` int(11) DEFAULT NULL,
  `IdLanguage` int(11) NOT NULL,
  `IdCategory` int(11) NOT NULL,
  `IdResource` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `OwnerBy` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdLanguage` (`IdLanguage`),
  KEY `IdCategory` (`IdCategory`),
  KEY `IdResource` (`IdResource`),
  KEY `OwnerBy` (`OwnerBy`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `videocategory`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `videodocument`
--

CREATE TABLE IF NOT EXISTS `videodocument` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Description` longtext COLLATE utf8_unicode_ci,
  `ResourceId` int(11) NOT NULL,
  `IdLanguage` int(11) NOT NULL,
  `IdResource` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdLanguage` (`IdLanguage`),
  KEY `IdResource` (`IdResource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `videonotification`
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

-- --------------------------------------------------------

--
-- Table structure for table `videosurvey`
--

CREATE TABLE IF NOT EXISTS `videosurvey` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `IdLanguage` int(11) NOT NULL,
  `IdResource` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `IdVideo` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdLanguage` (`IdLanguage`),
  KEY `IdResource` (`IdResource`),
  KEY `IdVideo` (`IdVideo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `video_question`
--

CREATE TABLE IF NOT EXISTS `video_question` (
  `IdVideo` int(11) NOT NULL,
  `IdQuestion` int(11) NOT NULL,
  PRIMARY KEY (`IdVideo`,`IdQuestion`),
  KEY `IdVideo` (`IdVideo`),
  KEY `IdQuestion` (`IdQuestion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video_ranking`
--

CREATE TABLE IF NOT EXISTS `video_ranking` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdVideo` int(11) NOT NULL,
  `IdAccount` int(11) NOT NULL,
  `Ranking` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` int(11) NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedDate` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdVideo` (`IdVideo`),
  KEY `IdAccount` (`IdAccount`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `video_videodocument`
--

CREATE TABLE IF NOT EXISTS `video_videodocument` (
  `IdVideo` int(11) NOT NULL,
  `IdDocument` int(11) NOT NULL,
  PRIMARY KEY (`IdVideo`,`IdDocument`),
  KEY `IdVideo` (`IdVideo`),
  KEY `IdDocument` (`IdDocument`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_videonotification`
--

CREATE TABLE IF NOT EXISTS `video_videonotification` (
  `IdVideo` int(11) NOT NULL,
  `IdNotification` int(11) NOT NULL,
  PRIMARY KEY (`IdVideo`,`IdNotification`),
  KEY `IdNotification` (`IdNotification`),
  KEY `IdVideo` (`IdVideo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_fk1` FOREIGN KEY (`AvatarId`) REFERENCES `resource` (`Id`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`IdNationality`) REFERENCES `nationality` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_ibfk_3` FOREIGN KEY (`IdProfession`) REFERENCES `profession` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_ibfk_4` FOREIGN KEY (`IdRole`) REFERENCES `role` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `account_entry`
--
ALTER TABLE `account_entry`
  ADD CONSTRAINT `account_entry_ibfk_1` FOREIGN KEY (`IdAccount`) REFERENCES `account` (`Id`),
  ADD CONSTRAINT `account_entry_ibfk_2` FOREIGN KEY (`IdEntry`) REFERENCES `entry` (`Id`);

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
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`IdResource`) REFERENCES `resource` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partner`
--
ALTER TABLE `partner`
  ADD CONSTRAINT `partner_ibfk_1` FOREIGN KEY (`LogoId`) REFERENCES `resource` (`Id`);

--
-- Constraints for table `partner_banner`
--
ALTER TABLE `partner_banner`
  ADD CONSTRAINT `partner_banner_ibfk_1` FOREIGN KEY (`IdPartner`) REFERENCES `partner` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partner_banner_ibfk_2` FOREIGN KEY (`IdBanner`) REFERENCES `banner` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `role_accountpermission_ibfk_1` FOREIGN KEY (`IdRole`) REFERENCES `role` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_accountpermission_ibfk_2` FOREIGN KEY (`IdPermission`) REFERENCES `accountpermisson` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `video_fk1` FOREIGN KEY (`OwnerBy`) REFERENCES `account` (`Id`),
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`IdLanguage`) REFERENCES `language` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_ibfk_2` FOREIGN KEY (`IdCategory`) REFERENCES `videocategory` (`Id`),
  ADD CONSTRAINT `video_ibfk_3` FOREIGN KEY (`IdResource`) REFERENCES `resource` (`Id`);

--
-- Constraints for table `videocategory`
--
ALTER TABLE `videocategory`
  ADD CONSTRAINT `videocategory_ibfk_1` FOREIGN KEY (`IdLanguage`) REFERENCES `language` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videodocument`
--
ALTER TABLE `videodocument`
  ADD CONSTRAINT `videodocument_ibfk_1` FOREIGN KEY (`IdLanguage`) REFERENCES `language` (`Id`),
  ADD CONSTRAINT `videodocument_ibfk_2` FOREIGN KEY (`IdResource`) REFERENCES `resource` (`Id`);

--
-- Constraints for table `videonotification`
--
ALTER TABLE `videonotification`
  ADD CONSTRAINT `videonotification_ibfk_1` FOREIGN KEY (`IdLanguage`) REFERENCES `language` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videosurvey`
--
ALTER TABLE `videosurvey`
  ADD CONSTRAINT `videosurvey_ibfk_1` FOREIGN KEY (`IdLanguage`) REFERENCES `language` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videosurvey_ibfk_2` FOREIGN KEY (`IdResource`) REFERENCES `resource` (`Id`),
  ADD CONSTRAINT `videosurvey_ibfk_3` FOREIGN KEY (`IdVideo`) REFERENCES `video` (`Id`);

--
-- Constraints for table `video_question`
--
ALTER TABLE `video_question`
  ADD CONSTRAINT `video_question_ibfk_1` FOREIGN KEY (`IdVideo`) REFERENCES `video` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_question_ibfk_2` FOREIGN KEY (`IdQuestion`) REFERENCES `question` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_ranking`
--
ALTER TABLE `video_ranking`
  ADD CONSTRAINT `video_ranking_fk1` FOREIGN KEY (`IdVideo`) REFERENCES `video` (`Id`),
  ADD CONSTRAINT `video_ranking_fk2` FOREIGN KEY (`IdAccount`) REFERENCES `account` (`Id`);

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
