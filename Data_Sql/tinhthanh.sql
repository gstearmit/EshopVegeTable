-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2015 at 11:42 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rohlikcz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tinhthanh`
--

CREATE TABLE IF NOT EXISTS `tinhthanh` (
  `ID` int(11) NOT NULL,
  `TenTinhThanh` varchar(255) NOT NULL,
  `XuatBan` tinyint(4) NOT NULL,
  `ThuTu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tinhthanh`
--

INSERT INTO `tinhthanh` (`ID`, `TenTinhThanh`, `XuatBan`, `ThuTu`) VALUES
(3, 'TP.HCM', 1, 1),
(2, 'Hà Nội', 1, 2),
(10, 'Yên Bái', 1, 3),
(11, 'Vĩnh Phúc', 1, 4),
(12, 'Vĩnh Long', 1, 5),
(13, 'Tuyên Quang', 1, 6),
(14, 'Trà Vinh', 1, 7),
(15, 'Tiền Giang', 1, 8),
(16, 'Thừa Thiên Huế', 1, 9),
(17, 'Thanh Hóa', 1, 10),
(18, 'Thái Nguyên', 1, 11),
(19, 'Thái Bình', 1, 12),
(21, 'Tây Ninh', 1, 13),
(22, 'Sơn La', 1, 14),
(23, 'Sóc Trăng', 1, 15),
(24, 'Quảng Trị', 1, 16),
(25, 'Quảng Ninh', 1, 17),
(26, 'Quảng Ngãi', 1, 18),
(27, 'Quảng Nam', 1, 19),
(28, 'Quảng Bình', 1, 20),
(29, 'Phú Yên', 1, 21),
(30, 'Phú Thọ', 1, 22),
(31, 'Ninh Thuận', 1, 23),
(32, 'Ninh Bình', 1, 24),
(33, 'Nghệ An', 1, 25),
(34, 'Nam Định', 1, 26),
(35, 'Long An', 1, 27),
(36, 'Lào Cai', 1, 28),
(37, 'Lạng Sơn', 1, 29),
(38, 'Lâm Đồng', 1, 30),
(39, 'Lai Châu', 1, 31),
(40, 'Kon Tum', 1, 32),
(41, 'Kiên Giang', 1, 33),
(42, 'Khánh Hòa', 1, 34),
(43, 'Hưng Yên', 1, 35),
(44, 'Hòa Bình', 1, 36),
(45, 'Hậu Giang', 1, 37),
(46, 'Hải Dương', 1, 38),
(47, 'Hà Tĩnh', 1, 39),
(49, 'Hà Nam ', 1, 40),
(50, 'Hà Giang', 1, 41),
(51, 'Gia Lai', 1, 42),
(52, 'Đồng Tháp', 1, 43),
(53, 'Đồng Nai', 1, 44),
(54, 'Điện Biên', 1, 45),
(55, 'Đắk Nông', 1, 46),
(56, 'Đắk Lắk', 1, 47),
(57, 'Cao Bằng', 1, 48),
(58, 'Cà Mau', 1, 49),
(59, 'Bình Thuận', 1, 50),
(60, 'Bình Phước', 1, 51),
(61, 'Bình Dương', 1, 52),
(62, 'Bình Định', 1, 53),
(63, 'Bến Tre', 1, 54),
(64, 'Bắc Ninh', 1, 55),
(65, 'Bạc Liêu', 1, 56),
(66, 'Bắc Kạn', 1, 57),
(67, 'Bắc Giang', 1, 58),
(68, 'Bà Rịa - Vũng Tàu', 1, 59),
(69, 'An Giang', 1, 60),
(70, 'Hải Phòng', 1, 61),
(71, 'Đà Nẵng', 1, 62),
(72, 'Cần Thơ', 1, 63);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tinhthanh`
--
ALTER TABLE `tinhthanh`
 ADD PRIMARY KEY (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
