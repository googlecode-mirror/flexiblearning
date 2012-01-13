-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2012 at 01:39 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_flexib`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `id_nationality` int(11) DEFAULT NULL,
  `tel` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `id_profession` int(11) DEFAULT NULL,
  `favorite` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT 'so tien co trong tai khoan',
  `flag_active` int(11) NOT NULL DEFAULT '1' COMMENT '1:active 0:not yet',
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1:del',
  `enabledFullName` int(11) NOT NULL DEFAULT '1',
  `enabledDateOfBirth` int(11) NOT NULL DEFAULT '1',
  `enabledAddress` int(11) NOT NULL DEFAULT '1',
  `enabledNationality` int(11) NOT NULL DEFAULT '1',
  `enabledTel` int(11) NOT NULL DEFAULT '1',
  `enabledEmail` int(11) NOT NULL DEFAULT '1',
  `enabledProfession` int(11) NOT NULL DEFAULT '1',
  `enabledFavorite` int(11) NOT NULL DEFAULT '1',
  `active_key` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `ip_add` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_nationality` (`id_nationality`),
  KEY `id_profession` (`id_profession`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `fullname`, `dateOfBirth`, `address`, `id_nationality`, `tel`, `email`, `id_profession`, `favorite`, `avatar`, `asset`, `flag_active`, `flag_del`, `enabledFullName`, `enabledDateOfBirth`, `enabledAddress`, `enabledNationality`, `enabledTel`, `enabledEmail`, `enabledProfession`, `enabledFavorite`, `active_key`, `last_login`, `ip_add`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'sea2709', 'fad0ce221c826eede253cb0956ca0700', 'Trần Hải Đăng', '1988-09-27', '429/12A Lê Văn Sỹ P12 Q3 TPHCM', NULL, NULL, 'hdang.sea@gmail.com', NULL, NULL, NULL, 0.00, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2012-01-13 06:29:48', '127.0.0.1', 1, '2011-12-17 00:00:00', 1, '2011-12-17 00:00:00'),
(2, 'sea', 'fad0ce221c826eede253cb0956ca0700', 'Trần Hải Đăng', '1988-09-27', '429/12A Lê Văn Sỹ P12 Q3 TPHCM', 1, '01227305086', 'sea2709@zing.vn', 1, NULL, NULL, 0.00, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2011-12-25 16:43:58', '127.0.0.1', 0, '1970-01-01 01:00:00', 0, '1970-01-01 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1:del',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, 'N;'),
('teacher', '2', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, '', NULL, 'N;'),
('adminCategory', 0, 'Manage categories', NULL, 'N;'),
('adminLesson', 0, 'Manage lessons', NULL, 'N;'),
('adminOwnLesson', 0, 'Manager the own users'' lessons', NULL, 'N;'),
('adminUser', 0, 'Manage users', NULL, 'N;'),
('authenticate', 2, '', NULL, 'N;'),
('createLesson', 0, 'Create lessons', NULL, 'N;'),
('guest', 2, '', NULL, 'N;'),
('student', 2, '', NULL, 'N;'),
('teacher', 2, '', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('admin', 'adminCategory'),
('admin', 'adminLesson'),
('teacher', 'adminOwnLesson'),
('admin', 'adminUser'),
('admin', 'createLesson'),
('teacher', 'createLesson');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_link` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `id_partner` int(11) NOT NULL,
  `ad_link` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_partner` (`id_partner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_by` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `description` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `flag_payment` int(11) NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1:del',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `owner_by` (`owner_by`),
  KEY `id_transaction` (`id_transaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_ko` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_vi` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `description_ko` text COLLATE utf8_unicode_ci,
  `id_language` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_language` (`id_language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_vi`, `name_en`, `name_ko`, `description_vi`, `description_en`, `description_ko`, `id_language`, `is_active`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(5, 'Tiếng Anh sơ cấp', 'Basic English', '', 'Miêu tả tiếng Anh sơ cấp', 'Basic English description', '', 2, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL,
  `subject_vi` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `subject_en` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `subject_ko` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description_vi` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `description_ko` text COLLATE utf8_unicode_ci,
  `document_path` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1:del',
  `flag_approve` int(11) NOT NULL DEFAULT '0' COMMENT '1: approved',
  `id_lesson` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_lesson` (`id_lesson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `imagepath` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `owner_by` (`owner_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`id`, `title`, `content`, `imagepath`, `owner_by`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'werwr werwe rwr', '<p>sdf asdf asdf &nbsp;sd fsdf sdfds sdf sdf<img title="Cool" src="http://localhost.com/flexiblearning2/assets/20b78892/tiny_mce/plugins/emotions/img/smiley-cool.gif" alt="Cool" border="0" /></p>', 'resources/entries/P1040441.JPG', 1, 1, '1970-01-01 01:00:00', 1, '1970-01-01 01:00:00'),
(2, 'asdfsadf', '<p>asdf</p>', NULL, 1, 1, '1970-01-01 01:00:00', 1, '1970-01-01 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_ko` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name_vi`, `name_en`, `name_ko`, `code`) VALUES
(1, 'Tiếng Hàn', 'Korean', '한국의', 'ko'),
(2, 'Tiếng Anh', 'English', '', 'en'),
(3, 'Tiếng Pháp', 'French', '', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE IF NOT EXISTS `lecture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `title_vi` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `title_ko` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content_vi` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ko` text COLLATE utf8_unicode_ci NOT NULL,
  `path_video_intro` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `path_video_thumbnail` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `owner_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_category` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `id_category`, `title_vi`, `title_en`, `title_ko`, `content_vi`, `content_en`, `content_ko`, `path_video_intro`, `path_video_thumbnail`, `is_active`, `owner_by`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(2, 5, 'wefsdf', 'erwe', 'sfsdf`', '<p>sdfsdf</p>', '<p>sdfsdf</p>', '<p>sfsdfsdf</p>', 'resources/videos/1326412237_videoplayback2.FLV', 'resources/video-thumbnails/1326412237_videoplayback2.jpg', 0, 1, 1, '1970-01-01', 1, '1970-01-01'),
(3, 5, 'sdf', 'sfdsf', 'sfsdf', '<p>sdfsdf</p>', '<p>sdfsdf</p>', '<p>sfdfsdf</p>', 'resources/videos/1326412699_videoplayback2.FLV', 'resources/video-thumbnails/1326412699_videoplayback2.jpg', 0, 1, 1, '1970-01-01', 1, '1970-01-01'),
(4, 5, 'asda', 'asda', 'asdasda', '<p>asdasd</p>', '<p>adasd</p>', '<p>adasd</p>', 'resources/videos/Wildlife.flv', 'resources/video-thumbnails/Wildlife.jpg', 0, 1, 1, '1970-01-01', 1, '1970-01-01'),
(5, 5, 'wrw', '234', 'wer', '<p>werwer</p>', '<p>aedf</p>', '<p>werwer</p>', 'resources/videos/1326413180_Wildlife.flv', 'resources/video-thumbnails/1326413180_Wildlife.jpg', 0, 1, 1, '1970-01-01', 1, '1970-01-01'),
(6, 5, 'ertert', 'ertert', 'ertret', '<p>rtertert</p>', '<p>erterte</p>', '<p>ertertret</p>', 'resources/videos/1326413479_Wildlife.flv', 'resources/video-thumbnails/1326413479_Wildlife.jpg', 0, 1, 1, '1970-01-01', 1, '1970-01-01'),
(7, 5, 'sdf', 'asdf', 'sdfsfd', '<p>fsdfs</p>', '<p>sdfsffdf</p>', '<p>sfsdfsdf</p>', 'resources/videos/1326413832_Wildlife.flv', 'resources/video-thumbnails/1326413832_Wildlife.jpg', 0, 1, 1, '1970-01-01', 1, '1970-01-01'),
(8, 5, 'sdfsdf', 'asdf', 'sdf', '<p>sdfsdf</p>', '<p>sdfsdfsd</p>', '<p>sdfsdfdfsdf</p>', 'resources/videos/1326413964_Wildlife.flv', 'resources/video-thumbnails/1326413964_Wildlife.jpg', 0, 1, 1, '1970-01-01', 1, '1970-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_vi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_ko` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_vi` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `description_ko` text COLLATE utf8_unicode_ci,
  `price` decimal(10,0) NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1:del',
  `flag_approve` int(11) NOT NULL DEFAULT '0' COMMENT '1: approved',
  `id_lecture` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `thumbnail` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IdCategory` (`id_lecture`),
  KEY `id_lecture` (`id_lecture`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `title_vi`, `title_en`, `title_ko`, `description_vi`, `description_en`, `description_ko`, `price`, `flag_del`, `flag_approve`, `id_lecture`, `created_by`, `created_date`, `updated_by`, `updated_date`, `thumbnail`) VALUES
(1, 'asdf', 'sdf', 'sdf', 'sf sdfsdf', 'sdf sf sdfdsfwe wer', 'sdfswfwer wrrwer we rwe sdf', 23, 0, 0, 5, 1, '1970-01-01 01:00:00', 1, '1970-01-01 01:00:00', 'resources/lessons/1324778757_hqdefault (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `owner_by` int(11) NOT NULL,
  `receiver` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `flag_read` int(11) NOT NULL DEFAULT '0' COMMENT '1:read 0:not yet',
  `created_by` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `owner_by` (`owner_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `name_vi` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `name_ko` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`id`, `name_en`, `name_vi`, `name_ko`) VALUES
(1, 'English', 'Anh', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_vi` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `title_korean` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content_vi` text COLLATE utf8_unicode_ci,
  `content_en` text COLLATE utf8_unicode_ci,
  `content_korean` text COLLATE utf8_unicode_ci,
  `id_lesson` int(11) NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1: del',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_lesson` (`id_lesson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification_lecture`
--

CREATE TABLE IF NOT EXISTS `notification_lecture` (
  `id` int(11) NOT NULL,
  `title_vi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_ko` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_vi` text COLLATE utf8_unicode_ci,
  `content_en` text COLLATE utf8_unicode_ci,
  `content_ko` text COLLATE utf8_unicode_ci,
  `id_lecture` int(11) NOT NULL,
  `flag_del` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_lecture` (`id_lecture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `logo_path` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `contact_link` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0' COMMENT '1 del',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `name_ko` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`id`, `name_vi`, `name_en`, `name_ko`) VALUES
(1, 'Giáo viên', 'Teacher', '');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `username` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `description_vi` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_korean` text COLLATE utf8_unicode_ci NOT NULL,
  `flag_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_vi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_korean` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filename` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `id_video` int(11) NOT NULL,
  `flag_del` int(11) NOT NULL,
  `flag_approve` int(11) NOT NULL,
  `survey_path` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_video` (`id_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL,
  `transactiontype_vi` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `transactiontype_en` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_korean` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description_vi` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_korean` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description_vi` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `description_ko` text COLLATE utf8_unicode_ci,
  `id_lesson` int(11) NOT NULL,
  `num_view` int(11) NOT NULL,
  `ranking` int(11) NOT NULL,
  `flag_approve` int(11) NOT NULL,
  `flag_del` int(11) NOT NULL,
  `path` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_lesson` (`id_lesson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `videoranking`
--

CREATE TABLE IF NOT EXISTS `videoranking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_video` int(11) NOT NULL,
  `ranked_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_video` (`id_video`),
  KEY `ranked_by` (`ranked_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_fk1` FOREIGN KEY (`id_nationality`) REFERENCES `nationality` (`id`),
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`id_profession`) REFERENCES `profession` (`id`);

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`id_partner`) REFERENCES `partner` (`id`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`owner_by`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`);

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`id_lesson`) REFERENCES `lesson` (`id`);

--
-- Constraints for table `entry`
--
ALTER TABLE `entry`
  ADD CONSTRAINT `entry_ibfk_1` FOREIGN KEY (`owner_by`) REFERENCES `account` (`id`);

--
-- Constraints for table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`owner_by`) REFERENCES `account` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_lesson`) REFERENCES `lesson` (`id`);

--
-- Constraints for table `notification_lecture`
--
ALTER TABLE `notification_lecture`
  ADD CONSTRAINT `notification_lecture_ibfk_1` FOREIGN KEY (`id_lecture`) REFERENCES `lecture` (`id`);

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `video` (`id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`id_lesson`) REFERENCES `lesson` (`id`);

--
-- Constraints for table `videoranking`
--
ALTER TABLE `videoranking`
  ADD CONSTRAINT `videoranking_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `video` (`id`),
  ADD CONSTRAINT `videoranking_ibfk_2` FOREIGN KEY (`ranked_by`) REFERENCES `account` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
