-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2011 at 12:20 AM
-- Server version: 5.1.50
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: 'flexiblearning'
--

--
-- Dumping data for table 'account'
--

INSERT INTO account (Id, FullName, DateOfBirth, Address, IdNationality, Tel, Email, UserName, Password, IdProfession, Favorite, AvatarId, IdRole, State, EnabledFullName, EnabledDateOfBirth, EnabledAddress, EnabledNationality, EnabledTel, EnabledEmail, EnabledProfession, EnabledFavorite, CreatedDate, CreatedBy, UpdatedDate, UpdatedBy, LastLoginDate) VALUES
(1, 'ten', 1312717887, 'gfhg', 1, '0980989', 'hggfh', 'tenten', '3d1c591c170b83e19ed213d8be785d10', 1, 'hghgjh', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1312717887, 1, 1314541760, 0, 1314541760),
(2, 'Trần Hải Đăng', 1312717887, '429/12A Lê Văn Sỹ P12 Q3 TPHCM', 1, '01227305086', 'hdang.sea@gmail.com', 'sea2709', 'fad0ce221c826eede253cb0956ca0700', 1, '', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1310141510, 1, 1314636886, 0, 1314636886);

--
-- Dumping data for table 'accountpermisson'
--

INSERT INTO accountpermisson (Id, Permission, Description) VALUES
(1, 'VIDEO_CATEGORY_FULL', 'Video Category full'),
(2, 'PARTNER_FULL', 'PARTNER_FULL'),
(3, 'ACCOUNT_FULL', 'Account Full');

--
-- Dumping data for table 'language'
--

INSERT INTO language (Id, Name, State, CreatedDate, CreatedBy, UpdatedDate, UpdatedBy) VALUES
(1, 'Tiếng Việt', 1, 1312717887, '1', 1312717887, '1'),
(2, 'English', 1, 1310141510, '1', 1310141510, '1');

--
-- Dumping data for table 'nationality'
--

INSERT INTO nationality (Id, CountryName, CreatedDate, CreatedBy, UpdatedDate, UpdatedBy) VALUES
(1, 'Việt Nam', 1312717887, 1, 1312717887, 1);

--
-- Dumping data for table 'profession'
--

INSERT INTO profession (Id, Name, State, CreatedDate, CreatedBy, UpdatedDate, UpdatedBy) VALUES
(1, 'Giáo viên', 1, 1312717887, 1, 1312717887, 1),
(2, 'Sinh viên', 1, 1310141510, 1, 1310141510, 1),
(3, 'Học sinh', 1, 1310141510, 1, 1310141510, 1);

--
-- Dumping data for table 'role'
--

INSERT INTO role (Id, Role, Descrption, IdLanguage, State, CreatedDate, CreatedBy, UpdatedDate, UpdatedBy) VALUES
(1, 'Admin', 'Admin', 1, 1, 1312717887, 1, 1312717887, 1);

--
-- Dumping data for table 'role_accountpermission'
--

INSERT INTO role_accountpermission (IdRole, IdPermission) VALUES
(1, 1),
(1, 2),
(1, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
