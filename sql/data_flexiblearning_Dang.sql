-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2012 at 03:15 PM
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

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name_vi`, `name_en`, `name_ko`, `code`) VALUES
(1, 'Tiếng Hàn', 'Korean', '한국의', 'ko'),
(2, 'Tiếng Anh', 'English', '', 'en'),
(3, 'Tiếng Pháp', 'French', '', 'fr');

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`id`, `name_en`, `name_vi`, `name_ko`) VALUES
(1, 'English', 'Anh', 'English');

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`id`, `name_vi`, `name_en`, `name_ko`) VALUES
(1, 'Giáo viên', 'Teacher', '');

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `fullname`, `dateOfBirth`, `address`, `id_nationality`, `tel`, `email`, `id_profession`, `favorite`, `avatar`, `asset`, `flag_active`, `flag_del`, `enabledFullName`, `enabledDateOfBirth`, `enabledAddress`, `enabledNationality`, `enabledTel`, `enabledEmail`, `enabledProfession`, `enabledFavorite`, `active_key`, `last_login`, `ip_add`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'sea2709', 'fad0ce221c826eede253cb0956ca0700', 'Trần Hải Đăng', '1988-09-27', '429/12A Lê Văn Sỹ P12 Q3 TPHCM', NULL, NULL, 'hdang.sea@gmail.com', NULL, NULL, NULL, 0.00, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2012-01-15 21:08:11', '127.0.0.1', 1, '2011-12-17 00:00:00', 1, '2011-12-17 00:00:00'),
(2, 'sea', 'fad0ce221c826eede253cb0956ca0700', 'Trần Hải Đăng', '1988-09-27', '429/12A Lê Văn Sỹ P12 Q3 TPHCM', 1, '01227305086', 'sea2709@zing.vn', 1, NULL, NULL, 0.00, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2011-12-25 16:43:58', '127.0.0.1', 0, '1970-01-01 01:00:00', 0, '1970-01-01 01:00:00');

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, '', NULL, 'N;'),
('adminCategory', 0, 'Manage categories', NULL, 'N;'),
('adminLecture', 0, 'Manage lectures', NULL, 'N;'),
('adminLesson', 0, 'Manage lessons', NULL, 'N;'),
('adminOwnLecture', 0, 'Manager the own users'' lectures', NULL, 'N;'),
('adminOwnLesson', 0, 'Manager the own users'' lessons', NULL, 'N;'),
('adminUser', 0, 'Manage users', NULL, 'N;'),
('authenticate', 2, '', NULL, 'N;'),
('createLecture', 0, 'Create lectures', NULL, 'N;'),
('createLesson', 0, 'Create lessons', NULL, 'N;'),
('guest', 2, '', NULL, 'N;'),
('student', 2, '', NULL, 'N;'),
('teacher', 2, '', NULL, 'N;');

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('admin', 'adminCategory'),
('admin', 'adminLecture'),
('admin', 'adminLesson'),
('teacher', 'adminOwnLecture'),
('teacher', 'adminOwnLesson'),
('admin', 'adminUser'),
('admin', 'createLecture'),
('teacher', 'createLecture'),
('admin', 'createLesson'),
('teacher', 'createLesson');

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, 'N;'),
('teacher', '2', NULL, 'N;');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
