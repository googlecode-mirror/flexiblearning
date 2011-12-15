-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2011 at 07:23 AM
-- Server version: 5.1.50
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flexiblearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id_account` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favorite` text COLLATE utf8_unicode_ci,
  `avatar_path` text COLLATE utf8_unicode_ci,
  `id_role` int(11) NOT NULL,
  `asset` int(11) NOT NULL DEFAULT '0' COMMENT 'so tien co trong tai khoan',
  `flag_active` int(11) NOT NULL DEFAULT '1' COMMENT '1:active 0:not yet',
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1:del',
  `active_key` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled_fullname` int(11) NOT NULL DEFAULT '1' COMMENT '1: enable 0: disable',
  `enabled_birthday` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: enable 0: disable',
  `enabled_address` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: enable 0: disable',
  `enabled_nationality` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: enable 0: disable',
  `enabled_tel` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: enable 0: disable',
  `enabled_email` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: enable 0: disable',
  `enabled_profession` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: enable 0: disable',
  `enabled_favorite` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: enable 0: disable',
  `last_login` date NOT NULL,
  `ip_add` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `update_by` int(11) NOT NULL,
  `updated_by` date NOT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id_answer` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1:del',
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_answer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `banner_link` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `id_partner` int(11) NOT NULL,
  `ad_link` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_banner`),
  KEY `id_partner` (`id_partner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `id_bill` int(11) NOT NULL AUTO_INCREMENT,
  `owner_by` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `description` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `flag_payment` int(11) NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1:del',
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_bill`),
  KEY `owner_by` (`owner_by`),
  KEY `id_transaction` (`id_transaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name_vn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_korean` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description_vn` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci,
  `description_korean` text COLLATE utf8_unicode_ci,
  `id_language` int(11) NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_category`),
  KEY `id_language` (`id_language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id_document` int(11) NOT NULL,
  `subject_vn` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `subject_en` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `subject_korean` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description_vn` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `description_korean` text COLLATE utf8_unicode_ci,
  `document_path` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1:del',
  `flag_approve` int(11) NOT NULL DEFAULT '0' COMMENT '1: approved',
  `id_video` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_document`),
  KEY `id_video` (`id_video`),
  KEY `id_video_2` (`id_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
  `id_entry` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0',
  `owner_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_entry`),
  KEY `owner_by` (`owner_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id_language` int(11) NOT NULL AUTO_INCREMENT,
  `name_vn` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_korean` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_language`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `id_lesson` int(11) NOT NULL AUTO_INCREMENT,
  `title_vn` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_korean` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_vn` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `description_korean` text COLLATE utf8_unicode_ci,
  `price` float NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1:del',
  `flag_approve` int(11) NOT NULL DEFAULT '0' COMMENT '1: approved',
  `id_category` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_lesson`),
  KEY `IdCategory` (`id_category`),
  KEY `id_category` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_account`
--

CREATE TABLE IF NOT EXISTS `lesson_account` (
  `id_account` int(11) NOT NULL,
  `id_lesson` int(11) NOT NULL,
  PRIMARY KEY (`id_account`,`id_lesson`),
  KEY `id_lesson` (`id_lesson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id_mail` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `owner_by` int(11) NOT NULL,
  `receiver` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `flag_read` int(11) NOT NULL DEFAULT '0' COMMENT '1:read 0:not yet',
  `created_by` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  PRIMARY KEY (`id_mail`),
  KEY `owner_by` (`owner_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `id_nationality` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_nationality`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id_notification` int(11) NOT NULL AUTO_INCREMENT,
  `title_vn` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `title_korean` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content_vn` text COLLATE utf8_unicode_ci,
  `content_en` text COLLATE utf8_unicode_ci,
  `content_korean` text COLLATE utf8_unicode_ci,
  `id_video` int(11) NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1: del',
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_notification`),
  KEY `id_video` (`id_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `id_partner` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `logo_path` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `contact_link` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1 del',
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_partner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id_permission` int(11) NOT NULL AUTO_INCREMENT,
  `permission_kind` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_permission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `id_permission` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_permission`,`id_role`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `id_profession` int(11) NOT NULL AUTO_INCREMENT,
  `name_vn` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `name_korean` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_profession`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  `id_answer` int(11) NOT NULL,
  PRIMARY KEY (`id_question`),
  KEY `id_answer` (`id_answer`),
  KEY `id_answer_2` (`id_answer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `description_vn` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_korean` text COLLATE utf8_unicode_ci NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `update_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `id_survey` int(11) NOT NULL AUTO_INCREMENT,
  `title_vn` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_korean` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filename` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `id_video` int(11) NOT NULL,
  `flag_del` int(11) NOT NULL,
  `flag_approve` int(11) NOT NULL,
  `survey_path` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_survey`),
  KEY `id_video` (`id_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id_transaction` int(11) NOT NULL,
  `transactiontype_vn` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `transactiontype_en` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_korean` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description_vn` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_korean` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_transaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description_vn` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_korean` text COLLATE utf8_unicode_ci NOT NULL,
  `id_lesson` int(11) NOT NULL,
  `num_view` int(11) NOT NULL,
  `ranking` int(11) NOT NULL,
  `flag_approve` int(11) NOT NULL,
  `flag_del` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `videoranking`
--

CREATE TABLE IF NOT EXISTS `videoranking` (
  `id_ranking` int(11) NOT NULL AUTO_INCREMENT,
  `id_video` int(11) NOT NULL,
  `ranked_by` int(11) NOT NULL,
  PRIMARY KEY (`id_ranking`),
  KEY `id_video` (`id_video`),
  KEY `ranked_by` (`ranked_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`id_partner`) REFERENCES `partner` (`id_partner`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id_transaction`),
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`owner_by`) REFERENCES `account` (`id_account`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`id_language`) REFERENCES `language` (`id_language`);

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `video` (`id_video`);

--
-- Constraints for table `entry`
--
ALTER TABLE `entry`
  ADD CONSTRAINT `entry_ibfk_1` FOREIGN KEY (`owner_by`) REFERENCES `account` (`id_account`);

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Constraints for table `lesson_account`
--
ALTER TABLE `lesson_account`
  ADD CONSTRAINT `lesson_account_ibfk_2` FOREIGN KEY (`id_lesson`) REFERENCES `lesson` (`id_lesson`),
  ADD CONSTRAINT `lesson_account_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`);

--
-- Constraints for table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`owner_by`) REFERENCES `account` (`id_account`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `video` (`id_video`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`id_permission`) REFERENCES `permission` (`id_permission`);

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `video` (`id_video`);

--
-- Constraints for table `videoranking`
--
ALTER TABLE `videoranking`
  ADD CONSTRAINT `videoranking_ibfk_2` FOREIGN KEY (`ranked_by`) REFERENCES `account` (`id_account`),
  ADD CONSTRAINT `videoranking_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `video` (`id_video`);
