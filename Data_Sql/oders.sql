-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2015 at 09:03 AM
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
-- Table structure for table `oders`
--

CREATE TABLE IF NOT EXISTS `oders` (
`id` int(100) NOT NULL,
  `creatnamecampaign` text,
  `date_creat` date NOT NULL,
  `date_mod` date NOT NULL,
  `id_user` int(100) DEFAULT NULL,
  `status` int(100) DEFAULT NULL,
  `status_oder` int(100) DEFAULT '0',
  `type` int(100) DEFAULT NULL,
  `DolarTotal` bigint(20) DEFAULT NULL,
  `Cpmrate` bigint(20) DEFAULT NULL,
  `TotaVistor` bigint(20) DEFAULT NULL,
  `customer` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `time` varchar(256) NOT NULL,
  `totalprice` varchar(256) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `oders`
--

INSERT INTO `oders` (`id`, `creatnamecampaign`, `date_creat`, `date_mod`, `id_user`, `status`, `status_oder`, `type`, `DolarTotal`, `Cpmrate`, `TotaVistor`, `customer`, `email`, `address`, `phone`, `time`, `totalprice`) VALUES
(204, 'Quang cao dong ho', '2015-03-19', '2015-03-19', 156, 1, 1, 0, 50, 1, 50, '', '', '', '', '', ''),
(209, NULL, '2015-03-20', '2015-03-20', 156, 1, 0, 0, 30, 1, 30, '', '', '', '', '', ''),
(211, NULL, '2015-04-11', '2015-04-11', 17, 1, 0, 0, 45, 1, 55, '', '', '', '', '', ''),
(212, 'Thời trang nữ', '2015-04-21', '2015-04-21', 17, 1, 0, 0, 30, 1, 30, '', '', '', '', '', ''),
(214, 'SALE  OFF', '2015-04-22', '2015-04-22', 17, 1, 1, 2, 50, 1, 50, '', '', '', '', '', ''),
(215, NULL, '2015-04-22', '2015-04-22', 17, 1, 0, 0, 250, 5, 50, '', '', '', '', '', ''),
(216, NULL, '2015-04-22', '2015-04-22', NULL, 1, 0, 0, 60, 1, 60, '', '', '', '', '', ''),
(217, 'dddd', '2015-04-22', '2015-04-22', 17, 1, 0, 0, 90, 3, 30, '', '', '', '', '', ''),
(218, 'sdsdsds', '2015-04-22', '2015-04-22', 17, 1, 0, 0, 120, 2, 60, '', '', '', '', '', ''),
(220, NULL, '2015-04-22', '2015-04-22', 17, 1, 0, 0, 49, 1, 49, '', '', '', '', '', ''),
(221, NULL, '2015-04-22', '2015-04-22', 17, 1, 0, 0, 49, 1, 49, '', '', '', '', '', ''),
(222, 'dtge5', '2015-04-22', '2015-04-22', 17, 1, 0, 0, 50, 1, 50, '', '', '', '', '', ''),
(223, 'Advertising', '2015-04-22', '2015-04-22', 17, 1, 1, 0, 80, 2, 80, '', '', '', '', '', ''),
(224, NULL, '2015-04-22', '2015-04-22', 17, 1, 0, 0, 80, 2, 80, '', '', '', '', '', ''),
(225, 'hoang phuc test', '2015-05-18', '2015-05-18', 17, 1, 0, 0, 130, 7, 38, '', '', '', '', '', ''),
(226, 'linkpayplus.eu', '2015-05-18', '2015-05-18', 17, 1, 0, 0, 250, 5, 50, '', '', '', '', '', ''),
(227, 'linkpay', '2015-05-18', '2015-05-18', 17, 1, 0, 0, 100, 2, 50, '', '', '', '', '', ''),
(228, 'abc', '2015-05-27', '2015-05-27', 164, 1, 1, 0, 150, 6, 70, '', '', '', '', '', ''),
(229, 'news', '2015-05-27', '2015-05-27', 164, 1, 0, 0, 90, 2, 90, '', '', '', '', '', ''),
(232, NULL, '2015-06-22', '2015-06-22', NULL, NULL, 0, 1, NULL, NULL, NULL, 'Đàm Thu Hằng', 'ms.diemthu@gmail.com', 'Số 27 Ngõ 256/16 Bạch Đằng - Chương Dương - Hoàn Kiếm - Hà Nội.', '0975077643', '14:00-14:30', '275'),
(233, NULL, '2015-06-22', '2015-06-22', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Đàm Thu Hằng', 'bienit1988@gmail.com', 'Số 27 Ngõ 256/16 Bạch Đằng - Chương Dương - Hoàn Kiếm - Hà Nội.', '0975077643', '16:30-17:00', '275'),
(234, NULL, '2015-06-22', '2015-06-22', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Đàm Thu Hằng', 'bienit1988@gmail.com', 'Số 27 Ngõ 256/16 Bạch Đằng - Chương Dương - Hoàn Kiếm - Hà Nội.', '0975077643', '17:30-18:00', '275'),
(235, NULL, '2015-06-22', '2015-06-22', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Đàm Thu Hằng', 'bienit1988@gmail.com', 'Số 27 Ngõ 256/16 Bạch Đằng - Chương Dương - Hoàn Kiếm - Hà Nội.', '0975077643', '18:00-18:30', '275'),
(236, NULL, '2015-06-22', '2015-06-22', NULL, NULL, 0, 1, NULL, NULL, NULL, 'Đàm Thu Hằng', 'bienit1988@gmail.com', 'Số 27 Ngõ 256/16 Bạch Đằng - Chương Dương - Hoàn Kiếm - Hà Nội.', '0975077643', '17:00-17:30', '275'),
(237, NULL, '2015-06-22', '2015-06-22', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Vườn tiểu cảnh', 'bienit1988@gmail.com', 'Số 27 Ngõ 256/16 Bạch Đằng - Chương Dương - Hoàn Kiếm - Hà Nội.', '1234567890', '16:30-17:00', '275'),
(238, NULL, '2015-06-22', '2015-06-22', NULL, NULL, 0, 1, NULL, NULL, NULL, 'Bien Bien Van', 'bienit1988@gmail.com', 'Số 27 Ngõ 256/16 Bạch Đằng - Chương Dương - Hoàn Kiếm - Hà Nội.', '0975077643', '17:00-17:30', '275'),
(239, NULL, '2015-06-22', '2015-06-22', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Bien Bien Van', 'bienit1988@gmail.com', 'Số 27 Ngõ 256/16 Bạch Đằng - Chương Dương - Hoàn Kiếm - Hà Nội.', '0975077643', '17:30-18:00', '275');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oders`
--
ALTER TABLE `oders`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oders`
--
ALTER TABLE `oders`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=240;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
