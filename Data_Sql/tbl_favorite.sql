-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2015 at 02:01 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop_my`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorite`
--

CREATE TABLE IF NOT EXISTS `tbl_favorite` (
`ID` int(11) NOT NULL,
  `customer_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbl_favorite`
--

INSERT INTO `tbl_favorite` (`ID`, `customer_ID`, `product_ID`, `date_created`) VALUES
(32, 4, 8, '2015-06-27 00:38:17'),
(33, 4, 9, '2015-06-27 00:39:36');

--
-- Triggers `tbl_favorite`
--
DELIMITER //
CREATE TRIGGER `tbl_favorite_bi` BEFORE INSERT ON `tbl_favorite`
 FOR EACH ROW BEGIN
    SET NEW.date_created = NOW();
END
//
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_favorite`
--
ALTER TABLE `tbl_favorite`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_favorite`
--
ALTER TABLE `tbl_favorite`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
