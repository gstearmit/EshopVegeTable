-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2015 at 09:04 AM
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
-- Table structure for table `odersdetails`
--

CREATE TABLE IF NOT EXISTS `odersdetails` (
`id` int(100) NOT NULL,
  `description` text CHARACTER SET utf8,
  `oder_id` int(100) DEFAULT NULL,
  `date_creat` date NOT NULL,
  `date_mod` date NOT NULL,
  `id_user` int(100) DEFAULT NULL,
  `status` int(100) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `cpmRate` double DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `type` int(100) DEFAULT NULL,
  `AdobeFlashEnabled` text CHARACTER SET utf8,
  `MaxDailyBudget` bigint(20) DEFAULT NULL,
  `MobileTargeting` text CHARACTER SET utf8,
  `trafficsources` text CHARACTER SET utf8,
  `PreviousWebsite` text CHARACTER SET utf8,
  `payment_select` text CHARACTER SET utf8,
  `id_product` int(11) NOT NULL,
  `price_product` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=414 ;

--
-- Dumping data for table `odersdetails`
--

INSERT INTO `odersdetails` (`id`, `description`, `oder_id`, `date_creat`, `date_mod`, `id_user`, `status`, `quantity`, `cpmRate`, `amount`, `type`, `AdobeFlashEnabled`, `MaxDailyBudget`, `MobileTargeting`, `trafficsources`, `PreviousWebsite`, `payment_select`, `id_product`, `price_product`) VALUES
(367, 'World Deal Traffic from all over the word', 204, '2015-03-19', '2015-03-19', 156, 1, 50, 1, 50, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(373, 'World Deal Traffic from all over the word', 212, '2015-04-21', '2015-04-21', 17, 1, NULL, 1, 0, 0, 'Yes', 0, 'Android', 'Mobile', 'Create new website', 'merchant paypal', 0, ''),
(374, 'Proxy traffic deal Traffic from proxy server', 212, '2015-04-21', '2015-04-21', 17, 1, 30, 1, 30, 0, 'Yes', 0, 'Android', 'Mobile', 'Create new website', 'merchant paypal', 0, ''),
(376, 'World Deal Traffic from all over the word', 214, '2015-04-22', '2015-04-22', 17, 1, 50, 1, 50, 2, 'No aplicable', 0, 'No aplicable', 'Desktop', NULL, 'merchant paypal', 0, ''),
(377, 'World Deal Traffic from all over the word', 217, '2015-04-22', '2015-04-22', 17, 1, NULL, 1, 0, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(378, 'World Deal Traffic from all over the word', 218, '2015-04-22', '2015-04-22', 17, 1, NULL, 1, 0, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(379, 'Proxy traffic deal Traffic from proxy server', 218, '2015-04-22', '2015-04-22', 17, 1, NULL, 1, 0, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(380, 'Spain', 218, '2015-04-22', '2015-04-22', 17, 1, 60, 2, 120, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(384, 'World Deal Traffic from all over the word', 222, '2015-04-22', '2015-04-22', 17, 1, NULL, 1, 0, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(385, 'Proxy traffic deal Traffic from proxy server', 222, '2015-04-22', '2015-04-22', 17, 1, 50, 1, 50, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(386, 'Canada', 222, '2015-04-22', '2015-04-22', 17, 1, NULL, 3, 0, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(387, 'World Deal Traffic from all over the word', 223, '2015-04-22', '2015-04-22', 17, 1, 30, 1, 30, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(388, 'Proxy traffic deal Traffic from proxy server', 223, '2015-04-22', '2015-04-22', 17, 1, 50, 1, 50, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(389, 'United States', 225, '2015-05-18', '2015-05-18', 17, 1, 18, 5, 90, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(390, 'China', 225, '2015-05-18', '2015-05-18', 17, 1, NULL, 1, 0, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(391, 'Japan', 225, '2015-05-18', '2015-05-18', 17, 1, 20, 2, 40, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(392, 'United States', 226, '2015-05-18', '2015-05-18', 17, 1, 50, 5, 250, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(393, 'Hong Kong', 227, '2015-05-18', '2015-05-18', 17, 1, 50, 2, 100, 0, 'Yes', 0, 'IOS', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(394, 'World Deal Traffic from all over the word', 228, '2015-05-27', '2015-05-27', 164, 1, 50, 1, 50, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(395, 'United States', 228, '2015-05-27', '2015-05-27', 164, 1, 20, 5, 100, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(396, 'World Deal Traffic from all over the word', 229, '2015-05-27', '2015-05-27', 164, 1, 60, 1, 60, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(397, 'Myanmar', 229, '2015-05-27', '2015-05-27', 164, 1, 30, 1, 30, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal', 0, ''),
(398, NULL, 232, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, '119'),
(399, NULL, 232, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, '156'),
(400, NULL, 233, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, '119'),
(401, NULL, 233, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, '156'),
(402, NULL, 234, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, '119'),
(403, NULL, 234, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, '156'),
(404, NULL, 235, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, '119'),
(405, NULL, 235, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, '156'),
(406, NULL, 236, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, '119'),
(407, NULL, 236, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, '156'),
(408, NULL, 237, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, '119'),
(409, NULL, 237, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, '156'),
(410, NULL, 238, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, '119'),
(411, NULL, 238, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, '156'),
(412, NULL, 239, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, '119'),
(413, NULL, 239, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, '156');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `odersdetails`
--
ALTER TABLE `odersdetails`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `odersdetails`
--
ALTER TABLE `odersdetails`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=414;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
