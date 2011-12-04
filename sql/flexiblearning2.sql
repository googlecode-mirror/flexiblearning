-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2011 at 09:39 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flexiblearning2`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `dateOfBirth` int(11) NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `idNationality` int(11) NOT NULL,
  `tel` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `idProfession` int(11) NOT NULL,
  `favorite` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idRole` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `enabledFullName` tinyint(4) NOT NULL DEFAULT '1',
  `enabledDateOfBirth` tinyint(4) NOT NULL DEFAULT '1',
  `enabledAddress` tinyint(4) NOT NULL DEFAULT '1',
  `enabledNationality` tinyint(4) NOT NULL DEFAULT '1',
  `enabledTel` tinyint(4) NOT NULL DEFAULT '1',
  `enabledEmail` tinyint(4) NOT NULL DEFAULT '1',
  `enabledProfession` tinyint(4) NOT NULL DEFAULT '1',
  `enabledFavorite` tinyint(4) NOT NULL DEFAULT '1',
  `createdDate` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedDate` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `lastLoginDate` int(11) DEFAULT NULL,
  `ipAddress` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `idProfession` (`idProfession`),
  KEY `idNationality` (`idNationality`),
  KEY `idRole` (`idRole`),
  KEY `idAvatar` (`avatar`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='this is the content of User info' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fullname`, `dateOfBirth`, `address`, `idNationality`, `tel`, `email`, `username`, `password`, `idProfession`, `favorite`, `avatar`, `idRole`, `state`, `enabledFullName`, `enabledDateOfBirth`, `enabledAddress`, `enabledNationality`, `enabledTel`, `enabledEmail`, `enabledProfession`, `enabledFavorite`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`, `lastLoginDate`, `ipAddress`) VALUES
(1, 'ten', 1312709302, 'gfhg', 1, '0980989', 'totran0@gmail.com', 'tenten', '3d1c591c170b83e19ed213d8be785d10', 1, 'hghgjh', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1312717887, 1, 1317539643, 0, 1317539643, '127.0.0.1'),
(2, 'Trần Hải Đăng', 1312717887, '429/12A Lê Văn Sỹ P12 Q3 TPHCM', 1, '01227305086', 'hdang.sea@gmail.com', 'sea2709', 'fad0ce221c826eede253cb0956ca0700', 1, '', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1310141510, 1, 1315785644, 0, 1315785644, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `idLanguage` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `createdDate` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedDate` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IdLanguage` (`idLanguage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `idLanguage`, `state`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`) VALUES
(2, 'Tiếng Anh sơ cấp', NULL, 1, 1, 1322963767, 2, 1322963767, 2),
(3, 'Tiếng Anh trung cấp', NULL, 2, 1, 1322963809, 2, 1322963809, 2),
(4, 'Tiếng Anh cao cấp', 'Tiếng Anh cao cấp', 2, 1, 1322964021, 2, 1322964021, 2),
(5, 'Tiếng Hàn sơ cấp', 'Tiếng Hàn sơ cấp', 3, 1, 1322964444, 2, 1322964444, 2);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(1, 'Tiếng Việt'),
(2, 'Tiếng Anh'),
(3, 'Tiếng Hàn');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE IF NOT EXISTS `lecture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text,
  `price` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  `createdDate` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedDate` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategory` (`idCategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `name`, `description`, `price`, `idCategory`, `state`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`) VALUES
(1, 'English for everyone', 'English for everyone ^^', 20, 2, 1, 1322969347, 2, 1322969347, 2),
(2, 'English for everyone', 'English for everyone', 234, 2, 1, 1322969417, 2, 1322969417, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `idLecture` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  `createdDate` int(11) NOT NULL,
  `updatedDate` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idLecture` (`idLecture`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `name`, `description`, `idLecture`, `state`, `createdDate`, `updatedDate`, `createdBy`, `updatedBy`) VALUES
(1, 'Headline - lesson 1 ', 'the beginning lesson', 1, 1, 1322971279, 1322971279, 2, 2),
(2, 'aaa', 'aaa', 1, 1, 1322973271, 1322973271, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedDate` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`id`, `name`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`) VALUES
(1, 'Việt Nam', 1312717887, 1, 1312717887, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedDate` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`id`, `name`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`) VALUES
(1, 'Giáo viên', 1312717887, 1, 1312717887, 1),
(2, 'Sinh viên', 1310141510, 1, 1310141510, 1),
(3, 'Học sinh', 1310141510, 1, 1310141510, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedDate` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`) VALUES
(1, 'Admin', 'Admin', 1312717887, 1, 1312717887, 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext,
  `numView` int(11) NOT NULL,
  `ranking` int(11) NOT NULL,
  `numRanking` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `idLesson` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `ownerBy` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `videoPath` int(11) DEFAULT NULL,
  `thumbnailPath` int(11) DEFAULT NULL,
  `createdDate` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedDate` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `OwnerBy` (`ownerBy`),
  KEY `idLesson` (`idLesson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_fk1` FOREIGN KEY (`idNationality`) REFERENCES `nationality` (`id`),
  ADD CONSTRAINT `account_fk2` FOREIGN KEY (`idProfession`) REFERENCES `profession` (`id`),
  ADD CONSTRAINT `account_fk3` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_fk1` FOREIGN KEY (`idLanguage`) REFERENCES `language` (`id`);

--
-- Constraints for table `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `lecture_fk1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`);

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_fk1` FOREIGN KEY (`idLecture`) REFERENCES `lecture` (`id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_fk1` FOREIGN KEY (`idLesson`) REFERENCES `lesson` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
