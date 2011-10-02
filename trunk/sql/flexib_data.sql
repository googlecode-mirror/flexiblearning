-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2011 at 04:35 PM
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


--
-- Dumping data for table `language`
--

INSERT INTO `language` (`Id`, `Name`, `State`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`) VALUES
(1, 'Tiếng Việt', 1, 1312717887, '1', 1312717887, '1'),
(2, 'English', 1, 1310141510, '1', 1310141510, '1');


--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`Id`, `Name`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`) VALUES
(1, 'Việt Nam', 1312717887, 1, 1312717887, 1);


--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`Id`, `Name`, `State`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`) VALUES
(1, 'Giáo viên', 1, 1312717887, 1, 1312717887, 1),
(2, 'Sinh viên', 1, 1310141510, 1, 1310141510, 1),
(3, 'Học sinh', 1, 1310141510, 1, 1310141510, 1);


--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Id`, `FullName`, `DateOfBirth`, `Address`, `IdNationality`, `Tel`, `Email`, `UserName`, `Password`, `IdProfession`, `Favorite`, `IdAvatar`, `IdRole`, `State`, `EnabledFullName`, `EnabledDateOfBirth`, `EnabledAddress`, `EnabledNationality`, `EnabledTel`, `EnabledEmail`, `EnabledProfession`, `EnabledFavorite`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`, `LastLoginDate`, `IpAddress`) VALUES
(1, 'ten', 1312709302, 'gfhg', 1, '0980989', 'totran0@gmail.com', 'tenten', '3d1c591c170b83e19ed213d8be785d10', 1, 'hghgjh', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1312717887, 1, 1317539643, 0, 1317539643, '127.0.0.1'),
(2, 'Trần Hải Đăng', 1312717887, '429/12A Lê Văn Sỹ P12 Q3 TPHCM', 1, '01227305086', 'hdang.sea@gmail.com', 'sea2709', 'fad0ce221c826eede253cb0956ca0700', 1, '', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1310141510, 1, 1315785644, 0, 1315785644, NULL);

--
-- Dumping data for table `accountpermisson`
--

INSERT INTO `accountpermisson` (`Id`, `Permission`, `Description`) VALUES
(1, 'VIDEO_CATEGORY_FULL', 'Video Category full'),
(2, 'PARTNER_FULL', 'PARTNER_FULL'),
(3, 'ACCOUNT_FULL', 'Account Full');



--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2c139d4ddfc0843666062d1294f79caa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.186 Safari/535.1', 1317539638, 'a:4:{s:9:"logged_in";s:17:"authorize_success";s:14:"username_login";s:6:"tenten";s:12:"userid_login";s:1:"1";s:20:"userpermission_login";a:3:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";}}');






--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`Id`, `Name`, `Address`, `Email`, `Tel`, `IdLogo`, `Link`, `State`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`) VALUES
(10, 'Xtremics Mobisoft', '188/7 Thanh Thai, P10 Q10, TPHCM', 'xtemics@gmail.com.re', '09876668', 68, 'www.Xtremics.com.vn', 1, 1315793080, 1, 1316159690, 1),
(11, 'IACP', '230 Nguyen Cong Tru, Q1 TPHCM', 'CAP@yahoo.com', '098755677', 125, 'www.cap.com.vn', 1, 1316246112, 0, 1316246134, 0),
(12, 'HSBC bank', '367 Nguyen Van Troi', 'HSBC@yahoo.bank', '09866544', 131, 'www.HSB.com.vn', 1, 1316706028, 1, 1316706028, 1);




--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Id`, `Name`, `Description`, `IdLanguage`, `State`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`) VALUES
(1, 'Admin', 'Admin', 1, 1, 1312717887, 1, 1312717887, 1);

--
-- Dumping data for table `role_accountpermission`
--

INSERT INTO `role_accountpermission` (`IdRole`, `IdPermission`) VALUES
(1, 1),
(1, 2),
(1, 3);



--
-- Dumping data for table `videocategory`
--

INSERT INTO `videocategory` (`Id`, `Name`, `Description`, `IdLanguage`, `State`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`) VALUES
(8, 'Anh văn Sơ cấp ', 'trình độ anh văn sơ cấp', 1, 1, 1316004145, 1, 1316004145, 1),
(9, 'Anh văn nâng cao ', 'Cấp độ tiến hóa', 1, 1, 1316004145, 1, 1316004145, 1),
(10, 'Anh văn cao cấp', 'anh văn cao cấp', 1, 1, 1316004145, 1, 1316004145, 1),
(11, 'Tiếng Hàn sơ cấp', 'tiếng hàn sơ cấp', 1, 1, 1316004145, 1, 1316004145, 1),
(12, 'Tiếng Hàn Trung Cấp', 'tiếng hàn trung cấp', 1, 1, 1316004145, 1, 1316004145, 1),
(13, 'Tiếng Hàn Cao cấp', 'tiếng hàn cao cấp', 1, 1, 1316004145, 1, 1316004145, 1),
(14, 'Tiếng Pháp Sơ cấp', 'Tiếng pháp sơ cấp', 1, 1, 1316004145, 1, 1316004145, 1),
(15, 'Tiếng Pháp Trung Cấp', 'tiếng pháp trung cấp', 1, 1, 1316004145, 1, 1316004145, 1);

