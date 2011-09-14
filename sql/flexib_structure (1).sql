-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2011 at 11:29 AM
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
  `IdAvatar` int(11) DEFAULT NULL,
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
  `nLog` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdProfession` (`IdProfession`),
  KEY `IdNationality` (`IdNationality`),
  KEY `IdRole` (`IdRole`),
  KEY `AvatarId` (`IdAvatar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='this is the content of User info' AUTO_INCREMENT=3 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_5` FOREIGN KEY (`IdNationality`) REFERENCES `nationality` (`Id`),
  ADD CONSTRAINT `account_ibfk_6` FOREIGN KEY (`IdProfession`) REFERENCES `profession` (`Id`),
  ADD CONSTRAINT `account_ibfk_7` FOREIGN KEY (`IdRole`) REFERENCES `role` (`Id`),
  ADD CONSTRAINT `account_ibfk_8` FOREIGN KEY (`IdAvatar`) REFERENCES `resource` (`Id`);
