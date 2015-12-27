-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2015 at 11:43 AM
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
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
`id` int(11) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(300) NOT NULL,
  `company` varchar(300) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `yahoo` varchar(256) NOT NULL,
  `skype` varchar(256) NOT NULL,
  `facebook` varchar(256) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `cus_mod` date NOT NULL,
  `birthday` varchar(256) NOT NULL,
  `sex` varchar(256) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `fullname`, `email`, `address`, `company`, `phone`, `city`, `password`, `yahoo`, `skype`, `facebook`, `status`, `date`, `cus_mod`, `birthday`, `sex`) VALUES
(3, '', 'gstearmit@gmail.com', 'Na Porícním právu 1914/6, Nové Mesto, 128 00 Praha 2  ,Czech Republic', '', '0975077643', '', 'NmI0M2Y2YmE0MzllOGMzMWIyZDhmYjE2MjcyYzIxNmY', '', '', '', 1, '2015-07-01', '2015-07-01', '', ''),
(4, '', 'dhfvhdfbvj@gmail.com', '', '', 'llllllllllll', '', 'YzFmYWM2MGViNzUzOGVkMGNlYjY0MDZlNWFiMWMyMDI', '', '', '', 1, '2015-07-01', '2015-07-01', '', ''),
(5, '', 'xuandac990@gmail.com', '', '', '0975077643', '', 'MjRiOWJiZTk3OGRmMzRmZDJlNTE2ZTM5MWYwNzczMDA', '', '', '', 1, '2015-07-01', '2015-07-01', '', ''),
(6, '', 'xuanda56c990@gmail.com', '', '', '0975077643', '', 'ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U', '', '', '', 1, '2015-07-01', '2015-07-01', '', ''),
(7, 'ZZZZZZZZZZZZ', 'abc@gmail.com', '', '', '', '', 'ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U', '', '', '', 1, '2015-07-16', '2015-07-16', '1-1-1915', '0'),
(8, '', '', '', '', '', '', 'ZDQxZDhjZDk4ZjAwYjIwNGU5ODAwOTk4ZWNmODQyN2U', '', '', '', 1, '2015-07-16', '2015-07-16', '--', ''),
(9, 'Đàm Thu Hằng', 'hangx@gmail.com', '', '', '', '', 'ZmNlYTkyMGY3NDEyYjVkYTdiZTBjZjQyYjhjOTM3NTk', '', '', '', 1, '2015-07-16', '2015-07-16', '1-1-1915', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
