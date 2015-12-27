-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2015 at 10:48 PM
-- Server version: 5.6.23
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apotravi_ro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `telephone` text NOT NULL,
  `fax` text NOT NULL,
  `street_1` text NOT NULL,
  `street_2` text NOT NULL,
  `postcode` text NOT NULL,
  `country` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `region` text NOT NULL,
  `company` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'http://eclip.tv/img/avatar.gif',
  `group` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `channel_code` varchar(100) NOT NULL,
  `playlist_id` mediumtext NOT NULL,
  `datetime` datetime NOT NULL,
  `recover` varchar(100) NOT NULL,
  `birthday` datetime NOT NULL,
  `externalsv_id` int(11) NOT NULL,
  `folder_key` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `folder_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `default_billing` int(10) DEFAULT NULL,
  `default_shipping` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `folder_id` (`externalsv_id`),
  KEY `externalsv_id` (`externalsv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `firstname`, `telephone`, `fax`, `street_1`, `street_2`, `postcode`, `country`, `city`, `region`, `company`, `lastname`, `password`, `email`, `avatar`, `group`, `channel_code`, `playlist_id`, `datetime`, `recover`, `birthday`, `externalsv_id`, `folder_key`, `folder_name`, `default_billing`, `default_shipping`) VALUES
(1, 'admin', 'Hoang ', '0972607988', 'dgfgdffdgf', 'Ha noi', 'Lang Ha ', '10000', '', '4353453454', '', 'Viet Nam', 'Cong Phuc', '$2a$14$VEmpitSQqpxjpjcdwzQXIudFeCFpEkKdHBI8E3ZHsSvkllF9piT2m', 'gstearmit@gmail.com', '', 'supperadmin', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 13, '', '', 1, 1),
(51, 'testnay', 'ss', '0000000000', '\0', '', '', '0', '', '', '0', '', 'sssss', '$2a$14$kbrX/d2o0gvtZsB8gByWKuRX6PYdJ16KGn0DEbPBrrfhiBnrdjxPG', 'phuca4@gmail.com', '/img/avatar.jpg', 'member', '', '', '2015-05-14 12:12:22', '', '0000-00-00 00:00:00', 0, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ads_bot`
--

CREATE TABLE IF NOT EXISTS `ads_bot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ads` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ads_bot`
--

INSERT INTO `ads_bot` (`id`, `title`, `ads`, `time`, `username`) VALUES
(3, 'Post-lipton', 'http://videostreaming-ipcamera.tk/ADS-VIDEO-SKIP/HTML5-vast-pre-roll-video-ads-with-skip/vod/lipton_5sec.mp4', 10, 'fox'),
(10, 'banner-post', '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <!-- 3001 --> <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-4102977445319975" data-ad-slot="4833379246"></ins> <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>', 5, 'fox');

-- --------------------------------------------------------

--
-- Table structure for table `ads_mid`
--

CREATE TABLE IF NOT EXISTS `ads_mid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ads` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `ads_mid`
--

INSERT INTO `ads_mid` (`id`, `title`, `ads`, `time`, `username`) VALUES
(1, 'adsmid', 'http://clipmediagroup.eu.localhost:1810/sample.mp4', 10, 'fox'),
(18, 'Mid - lipton', 'http://videostreaming-ipcamera.tk/ADS-VIDEO-SKIP/HTML5-vast-pre-roll-video-ads-with-skip/vod/lipton_5sec.mp4', 10, 'fox'),
(19, 'ten thoi ma', 'http://clipmediagroup.eu/sample.mp4', 12, 'fox'),
(22, 'banner-mid', '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <!-- 3001 --> <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-4102977445319975" data-ad-slot="4833379246"></ins> <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>', 5, 'fox');

-- --------------------------------------------------------

--
-- Table structure for table `ads_pre`
--

CREATE TABLE IF NOT EXISTS `ads_pre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ads` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `ads_pre`
--

INSERT INTO `ads_pre` (`id`, `title`, `ads`, `time`, `username`) VALUES
(13, 'sasa', '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>\r\n<!-- 3001 -->\r\n<ins class="adsbygoogle"\r\n     style="display:inline-block;width:300px;height:250px"\r\n     data-ad-client="ca-pub-4102977445319975"\r\n     data-ad-slot="4833379246"></ins>\r\n<script>\r\n(adsbygoogle = window.adsbygoogle || []).push({});\r\n</script>', 12, 'fox'),
(15, 'ads', '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>\r\n<!-- 3001 -->\r\n<ins class="adsbygoogle"\r\n     style="display:inline-block;width:300px;height:250px"\r\n     data-ad-client="ca-pub-4102977445319975"\r\n     data-ad-slot="4833379246"></ins>\r\n<script>\r\n(adsbygoogle = window.adsbygoogle || []).push({});\r\n</script>', 12, 'fox'),
(18, 'link', 'http://clipmediagroup.eu.localhost:1810/sample.mp4', 12, 'fox');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `banner_ads`
--

CREATE TABLE IF NOT EXISTS `banner_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `adscode` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `time` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user` varchar(1100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `banner_ads`
--

INSERT INTO `banner_ads` (`id`, `title`, `adscode`, `time`, `status`, `date`, `user`) VALUES
(12, 'banner', '<script type="text/javascript" src="http://s15.bestmediainvestgroup.eu/core/pub?ads=10357&zoneid=9999&cn=999921357"></script><script type="text/javascript" src="http://s15.bestmediainvestgroup.eu/public/js/adse.js"></script>\r\n', 10, 1, '2015-05-08', 'fox'),
(13, 'baloom-top-banner', '<script type="text/javascript" src="http://s15.bestmediainvestgroup.eu/core/pub?ads=10681&zoneid=9999&cn=999950681"></script><script type="text/javascript" src="http://s15.bestmediainvestgroup.eu/public/js/adse.js"></script>', 10, 1, '2015-05-08', 'fox'),
(14, 'google-ads', '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <!-- 3001 --> <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-4102977445319975" data-ad-slot="4833379246"></ins> <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>', 10, 1, '2015-05-08', 'fox'),
(15, 'banner-300x250', '<script type="text/javascript" src="http://s15.bestmediainvestgroup.eu/core/pub?ads=10681&zoneid=9999&cn=999950681"></script><script type="text/javascript" src="http://s15.bestmediainvestgroup.eu/public/js/adse.js"></script>', 10, 1, '2015-05-08', 'fox');

-- --------------------------------------------------------

--
-- Table structure for table `buyertable`
--

CREATE TABLE IF NOT EXISTS `buyertable` (
  `BuyerName` text,
  `BuyerEmail` text,
  `TransactionID` text,
  `ItemName` text,
  `ItemNumber` bigint(20) DEFAULT NULL,
  `ItemAmount` bigint(20) DEFAULT NULL,
  `ItemQTY` bigint(20) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `catelog`
--

CREATE TABLE IF NOT EXISTS `catelog` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(100) DEFAULT NULL,
  `child` longtext,
  `date_creat` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `hot` int(100) DEFAULT NULL,
  `status` int(100) DEFAULT NULL,
  `new` int(100) DEFAULT NULL,
  `show_index` int(100) DEFAULT NULL,
  `alias` text,
  `img` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `catelog`
--

INSERT INTO `catelog` (`id`, `name`, `parent`, `child`, `date_creat`, `date_modified`, `hot`, `status`, `new`, `show_index`, `alias`, `img`, `description`) VALUES
(33, 'Farmářské', NULL, NULL, '2015-07-14', '2015-07-14', 0, 1, 0, 1, 'farma?ske', 'catalog_1436861434.jpg', 'Farmá?ské'),
(34, 'Čerstvé', NULL, NULL, '2015-07-16', '2015-07-16', 1, 1, 1, 1, '?erstve-potraviny', 'catalog_1436862991.jpg', '?erstvé potraviny'),
(35, 'Trvanlivé', NULL, NULL, '2015-07-18', '2015-07-18', 1, 1, 1, 1, 'trvanlive-potraviny', 'catalog_1436861959.jpg', 'Trvanlivé potraviny'),
(36, 'Sladké a slané', NULL, NULL, '2015-07-14', '2015-07-14', 1, 1, 1, 1, 'sladke-a-slane', 'catalog_1436862903.jpg', 'Sladké a slané'),
(37, 'Speciální', NULL, NULL, '2015-07-14', '2015-07-14', 1, 1, 0, 1, 'specialni', 'catalog_1436863098.jpg', 'Speciální'),
(38, 'Nápoje', NULL, NULL, '2015-07-14', '2015-07-14', 0, 1, 0, 1, 'napoje', 'catalog_1436863310.jpg', 'Nápoje'),
(39, 'Alkohol a tabák', NULL, NULL, '2015-07-14', '2015-07-14', 0, 1, 0, 1, 'alkohol-a-tabak', 'catalog_1436863356.jpg', 'Alkohol a tabák'),
(40, 'Drogerie a domácnost', NULL, NULL, '2015-07-14', '2015-07-14', 0, 1, 0, 1, 'drogerie-a-domacnost', 'catalog_1436863422.jpg', 'Drogerie a domácnost'),
(41, 'Dítě', NULL, NULL, '2015-07-14', '2015-07-14', 1, 1, 0, 1, 'dit?', 'catalog_1436862661.jpg', 'Dít?'),
(42, 'Zvířata', NULL, NULL, '2015-07-18', '2015-07-18', 1, 1, 1, 1, 'zvi?ata', 'catalog_1436863531.jpg', 'Zví?ata'),
(43, 'Maso a uzeniny', 33, NULL, '2015-07-14', '2015-07-14', 0, 1, 0, 1, 'maso-a-uzeniny', 'catalog_1436863746.jpg', 'Maso a uzeniny'),
(44, 'Bio ovoce a zelenina', 33, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'bio-ovoce-a-zelenina', NULL, 'Bio ovoce a zelenina'),
(45, 'Mléčné výrobky a vejce', 33, NULL, '2015-06-13', '2015-06-13', 1, 1, 0, NULL, 'mle?ne-vyrobky-a-vejce', NULL, 'Mlé?né výrobky a vejce'),
(46, 'Lahůdky', 33, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'lah?dky', NULL, 'Lah?dky'),
(47, 'Ovoce a zelenina', 34, NULL, '2015-06-13', '2015-06-13', 1, 1, 0, NULL, 'ovoce-a-zelenina', NULL, 'Ovoce a zelenina'),
(48, 'Pečivo', 34, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'pe?ivo', NULL, 'Pe?ivo'),
(49, 'Maso, ryby', 78, NULL, '2015-07-15', '2015-07-15', 0, 1, 1, 1, 'maso-ryby', 'catalog_1436955984.jpg', 'Maso, ryby'),
(50, 'Masné výrobky, uzeniny', 34, NULL, '2015-07-14', '2015-07-14', 1, 1, 0, 1, 'masne-vyrobky-uzeniny', 'catalog_1436863646.jpg', 'Masné výrobky, uzeniny'),
(51, 'Špajzka', 35, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'špajzka', NULL, 'Špajzka'),
(52, 'Last minute', NULL, NULL, '2015-07-14', '2015-07-14', 1, 1, 0, 0, 'last-minute', 'catalog_1436868992.jpg', 'Last minute'),
(54, 'Snídaně', 35, NULL, '2015-07-15', '2015-07-15', 1, 1, 1, 1, 'snidan?', 'catalog_1436945168.jpg', 'Snídan?'),
(55, 'Mražené', 35, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'mražene', NULL, 'Mražené'),
(56, 'Konzervované', 35, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'Konzervované', NULL, 'Konzervované'),
(57, 'Exotická kuchyně', 35, NULL, '2015-07-15', '2015-07-15', 0, 1, 1, 1, 'exoticka-kuchyn?', 'catalog_1436945716.jpg', 'Exotická kuchyn?'),
(58, 'Chipsy a snacky', 36, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'chipsy-a-snacky', NULL, 'Chipsy a snacky'),
(60, 'Suché plody a oříšky', 36, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'suche-plody-a-o?išky', NULL, 'Suché plody a o?íšky'),
(61, 'Sušenky a čokotyčinky', 36, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'sušenky-a-?okoty?inky', NULL, 'Sušenky a ?okoty?inky'),
(62, 'Čokolády', 36, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, '?okolady', NULL, '?okolády'),
(63, 'Bonbóny a žvýkačky', 36, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'Bonbóny a žvýka?ky', NULL, 'Bonbóny a žvýka?ky'),
(64, 'Bonboniéry', 36, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'bonboniery', NULL, 'Bonboniéry'),
(65, 'Superfood', 37, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'superfood', NULL, 'Superfood'),
(66, 'Bezlepkové výrobky', 37, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'bezlepkove-vyrobky', NULL, 'Bezlepkové výrobky'),
(67, 'Bezlaktózové výrobky', 37, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'bezlaktozove-vyrobky', NULL, 'Bezlaktózové výrobky'),
(68, 'Raw', 37, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'raw', NULL, 'Raw'),
(69, 'Bio výrobky', 37, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'bio-vyrobky', NULL, 'Bio výrobky'),
(70, 'Sójové produkty a zdravá výživa', 37, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'sojove-produkty-a-zdrava-vyživa', NULL, 'Sójové produkty a zdravá výživa'),
(71, 'DIA', 37, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'dia', NULL, 'DIA'),
(72, 'Vitamíny a doplňky stravy', 37, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'vitaminy-a-dopl?ky-stravy', NULL, 'Vitamíny a dopl?ky stravy'),
(73, 'Grilování', 37, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'grilovani', NULL, 'Grilování'),
(74, 'Minerální a stolní vody', 38, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'mineralni-a-stolni-vody', NULL, 'Minerální a stolní vody'),
(75, 'Limonády, energy a sirupy', 38, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'limonady-energy-a-sirupy', NULL, 'Limonády, energy a sirupy'),
(76, 'Limonády, energy a sirupy', 38, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'limonady-energy-a-sirupy', NULL, 'Limonády, energy a sirupy'),
(77, 'Džusy a ovocné nápoje', 38, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'džusy-a-ovocne-napoje', NULL, 'Džusy a ovocné nápoje'),
(78, 'Čaj', 38, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, '?aj', NULL, '?aj'),
(79, 'Káva', 38, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'kava', NULL, 'Káva'),
(81, 'Pivo', 39, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'pivo', NULL, 'Pivo'),
(82, 'Víno', 39, NULL, '2015-07-15', '2015-07-15', 0, 1, 0, 1, 'vino', 'catalog_1436946282.jpg', 'Víno'),
(83, 'Lihoviny', 39, NULL, '2015-06-13', '2015-06-13', 0, 0, 0, NULL, 'lihoviny', NULL, 'Lihoviny'),
(84, 'Cigarety', 39, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'cigarety', NULL, 'Cigarety'),
(85, 'Sprchové gely a mýdla', 40, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'sprchove-gely-a-mydla', NULL, 'Sprchové gely a mýdla'),
(86, 'Vlasová kosmetika', 40, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'vlasova-kosmetika', NULL, 'Vlasová kosmetika'),
(87, 'Deodoranty', 40, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'deodoranty', NULL, 'Deodoranty'),
(88, 'Ústní hygiena', 40, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'ustni-hygiena', NULL, 'Ústní hygiena'),
(89, 'Péče o pleť a tělo', 40, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'pe?e-o-ple?-a-t?lo', NULL, 'Pé?e o ple? a t?lo'),
(90, 'Holicí potřeby', 40, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'holici-pot?eby', NULL, 'Holicí pot?eby'),
(91, 'Čistící a prací prostředky', 40, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, '?istici-a-praci-prost?edky', NULL, '?istící a prací prost?edky'),
(92, 'Hygienické potřeby', 40, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'hygienicke-pot?eby', NULL, 'Hygienické pot?eby'),
(93, 'Domácí potřeby', 40, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'domaci-pot?eby', NULL, 'Domácí pot?eby'),
(94, 'Zdravotnické potřeby', 40, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'zdravotnicke-pot?eby', NULL, 'Zdravotnické pot?eby'),
(95, 'Dárky', 40, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'darky', NULL, 'Dárky'),
(96, 'Pleny a ubrousky', 41, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'Pleny a ubrousky', NULL, 'Pleny a ubrousky'),
(97, 'Výživa', 41, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'vyživa', NULL, 'Výživa'),
(98, 'Dětská kosmetika', 41, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'd?tska-kosmetika', NULL, 'D?tská kosmetika'),
(99, 'Pes', 42, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'pes', NULL, 'Pes'),
(101, 'Hlodavec', 42, NULL, '2015-06-13', '2015-06-13', 0, 1, 0, NULL, 'hlodavec', NULL, 'Hlodavec'),
(102, 'Akvaristika a teraristika', 42, NULL, '2015-07-17', '2015-07-17', 0, 1, 0, 1, 'akvaristika-a-teraristika', 'catalog_1437108877.jpg', 'Akvaristika a teraristika'),
(103, 'Level - 3', 43, NULL, '2015-06-17', '2015-06-17', 0, 0, 0, NULL, 'level-3', NULL, 'Level - 3'),
(104, 'Level - 3.1', 43, NULL, '2015-06-17', '2015-06-17', 0, 0, 0, NULL, 'level-3-1', NULL, 'Level - 3'),
(106, 'Cat New', 33, NULL, '2015-07-16', '2015-07-16', 1, 1, 1, 1, 'cat-new', 'catalog_1434597005.jpg', 'cat-new'),
(107, 'Cat One', 49, NULL, '2015-07-16', '2015-07-16', 1, 1, 1, 1, 'cat-one', 'catalog_1435302715.jpg', 'Cat One');

-- --------------------------------------------------------

--
-- Table structure for table `chanel`
--

CREATE TABLE IF NOT EXISTS `chanel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `playlist` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `video_id` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `channel_code` varchar(60) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'http://eclip.tv/img/anhbia.png',
  `date_creat` date NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `channel_cat` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE IF NOT EXISTS `checkout` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `tracking_id` text NOT NULL,
  `total` bigint(100) DEFAULT NULL,
  `visa_id` int(100) DEFAULT NULL,
  `date_creat` date DEFAULT NULL,
  `status_pay` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Thong Tin hoa don' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `tracking_id`, `total`, `visa_id`, `date_creat`, `status_pay`) VALUES
(2, 'EVT.12017', 19, 3, '2015-05-19', 0),
(3, 'EVT.12018', 19, 4, '2015-05-19', 0),
(4, 'EVT.12019', 19, 5, '2015-05-19', 0),
(5, 'EVT.12020', 19, 6, '2015-05-19', 0),
(6, 'EVT.12021', 19, 7, '2015-05-19', 0),
(7, 'EVT.12022', 19, 8, '2015-05-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text,
  `email` text,
  `phone` int(100) DEFAULT NULL,
  `status` int(100) DEFAULT NULL,
  `date_creat` date DEFAULT NULL,
  `content` text,
  `subject_contact` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `status`, `date_creat`, `content`, `subject_contact`) VALUES
(1, 'sfd', 'phuca4@gmail.com', 2147483647, 1, '2015-05-13', 'rygyt', 'english'),
(2, 'sas', 'gstearmit@gmail.com', 2147483647, 0, '2015-05-14', 'dsdsd', 'english'),
(3, 'sas', 'gstearmit@gmail.com', 2147483647, 0, '2015-05-14', 'dsdsd', 'english'),
(4, 'sas', 'gstearmit@gmail.com', 2147483647, 0, '2015-05-14', 'dsdsd', 'english'),
(5, 'sas', 'gstearmit@gmail.com', 2147483647, 0, '2015-05-14', 'dsdsd', 'english'),
(6, 'sas', 'gstearmit@gmail.com', 2147483647, 0, '2015-05-14', 'dsdsd', 'english'),
(7, 'sas', 'gstearmit@gmail.com', 2147483647, 0, '2015-05-14', 'dsdsd', 'english'),
(8, 'sas', 'gstearmit@gmail.com', 2147483647, 0, '2015-05-14', 'dsdsd', 'english'),
(9, 'sas', 'gstearmit@gmail.com', 2147483647, 0, '2015-05-14', 'dsdsd', 'english'),
(10, 'sas', 'gstearmit@gmail.com', 2147483647, 0, '2015-05-14', 'dsdsd', 'english'),
(11, 'sas', 'gstearmit@gmail.com', 2147483647, 0, '2015-05-14', 'dsdsd', 'english'),
(12, 'sas', 'gstearmit@gmail.com', 2147483647, 0, '2015-05-14', 'dsdsd', 'english'),
(13, 'sas', 'gstearmit@gmail.com', 2147483647, 0, '2015-05-14', 'dsdsd', 'english'),
(14, 'sas', 'gstearmit@gmail.com', 2147483647, 0, '2015-05-14', 'dsdsd', 'english');

-- --------------------------------------------------------

--
-- Table structure for table `countryn`
--

CREATE TABLE IF NOT EXISTS `countryn` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `countrycode` varchar(256) DEFAULT NULL,
  `namecountry` varchar(250) DEFAULT NULL,
  `code` varchar(250) DEFAULT NULL,
  `capital` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `countryn`
--

INSERT INTO `countryn` (`id`, `countrycode`, `namecountry`, `code`, `capital`) VALUES
(1, 'vi', 'Việt Nam', NULL, NULL),
(2, 'en-us', 'American English', NULL, NULL),
(3, 'az', 'Azərbaycan', NULL, NULL),
(4, 'id', 'Bahasa Indonesia', NULL, NULL),
(5, 'ms', 'Bahasa Melayu', NULL, NULL),
(6, 'jv', 'Basa Jawa', NULL, NULL),
(7, 'bs', 'Bosanski', NULL, NULL),
(8, 'ca', 'Català', NULL, NULL),
(9, 'cz', 'Čeština', NULL, NULL),
(10, 'da', 'Dansk', NULL, NULL),
(11, 'de', 'Deutsch', NULL, NULL),
(12, 'et', 'Eesti keel', NULL, NULL),
(13, 'en', 'English', NULL, NULL),
(14, 'es', 'Español', NULL, NULL),
(15, 'eo', 'Esperanto', NULL, NULL),
(16, 'eu', 'Euskara', NULL, NULL),
(17, 'fr', 'Français', NULL, NULL),
(18, 'hr', 'Hrvatski', NULL, NULL),
(19, 'it', 'Italiano', NULL, NULL),
(20, 'lv', 'Latviešu Valoda', NULL, NULL),
(21, 'lt', 'Lietuvių kalba', NULL, NULL),
(22, 'hu', 'Magyar', NULL, NULL),
(23, 'nl', 'Nederlands', NULL, NULL),
(24, 'no', 'Norsk', NULL, NULL),
(25, 'pl', 'Polski', NULL, NULL),
(26, 'pt', 'Português', NULL, NULL),
(27, 'pt-br', 'Português brasileiro', NULL, NULL),
(28, 'ro', 'Română', NULL, NULL),
(29, 'sq', 'Shqip', NULL, NULL),
(30, 'sk', 'Slovenčina', NULL, NULL),
(31, 'sl', 'Slovenski', NULL, NULL),
(32, 'sr', 'Srpski', NULL, NULL),
(33, 'fi', 'Suomi', NULL, NULL),
(34, 'sv', 'Svenska', NULL, NULL),
(35, 'af', 'Afrikaans', NULL, NULL),
(36, 'tr', 'Türkçe', NULL, NULL),
(37, 'el', 'Ελληνικά', NULL, NULL),
(38, 'bg', 'Български', NULL, NULL),
(39, 'mk', 'Македонски јазик', NULL, NULL),
(40, 'ru', 'Русский', NULL, NULL),
(41, 'uk', 'Українська', NULL, NULL),
(42, 'he', 'עִבְרִית', NULL, NULL),
(43, 'ar', 'العربية', NULL, NULL),
(44, 'sd', 'سنڌي', NULL, NULL),
(45, 'fa', 'فارسی', NULL, NULL),
(46, 'ps', 'پښتو', NULL, NULL),
(47, 'mr', 'मराठी', NULL, NULL),
(48, 'bh', 'मैथिली', NULL, NULL),
(49, 'hi', 'हिन्दी', NULL, NULL),
(50, 'bn', 'বাংলা', NULL, NULL),
(51, 'pu', 'ਪੰਜਾਬੀ', NULL, NULL),
(52, 'gu', 'ગુજરાતી', NULL, NULL),
(53, 'or', 'ଓଡ଼ିଆ', NULL, NULL),
(55, 'ta', 'தமிழ்', NULL, NULL),
(56, 'te', 'తెలుగు', NULL, NULL),
(57, 'kn', 'ಕನ್ನಡ', NULL, NULL),
(58, 'ml', 'മലയാളം', NULL, NULL),
(59, 'th', 'ภาษาไทย', NULL, NULL),
(60, 'zh-tw', '中文 繁體', NULL, NULL),
(61, 'zh-cn', '中文（简体）', NULL, NULL),
(62, 'ja', '日本語', NULL, NULL),
(63, 'ko', '한국어', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `declaration`
--

CREATE TABLE IF NOT EXISTS `declaration` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `product_code` int(100) NOT NULL DEFAULT '0',
  `name_id` int(100) DEFAULT NULL,
  `host` text,
  `url` text,
  `page_taken` int(100) DEFAULT NULL,
  `avatar_images` text,
  `directoryavatar` text,
  `product_name` text,
  `product_price` text,
  `product_images` text,
  `product_descriptstion` text,
  `detail_product_descriptstion` text,
  `countryoforigin` text COMMENT 'nuoc san xuat',
  `product_promotion` text,
  `product_href_detail` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='declaration -- mau de loc du lieu' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `declaration`
--

INSERT INTO `declaration` (`id`, `product_code`, `name_id`, `host`, `url`, `page_taken`, `avatar_images`, `directoryavatar`, `product_name`, `product_price`, `product_images`, `product_descriptstion`, `detail_product_descriptstion`, `countryoforigin`, `product_promotion`, `product_href_detail`) VALUES
(5, 1915, 2, 'https://www.rohlik.cz', 'https://www.rohlik.cz/c75533-napoje', 12, NULL, 'upload', 'div.items article h3', 'div.items article h6', 'img.grocery-image-placeholder', NULL, 'div#popup_dsc', 'li.country', 'div.items article div.ico', 'div.items article h3'),
(6, 0, 3, 'https://www.rohlik.cz', 'https://www.rohlik.cz/c133337-alkohol-a-tabak', 12, '', '', 'div.items article h3', 'div.items article h6', 'div.items article a.img img', '', '', 'li.country', 'div.items article div.ico', 'div.items article h3'),
(7, 0, 25, 'https://www.rohlik.cz', 'https://www.rohlik.cz/c75471-trvanlive-potraviny', 10, NULL, NULL, 'div.items article h3', 'div.items article h6', 'div.items article a.img img', NULL, NULL, NULL, 'div.items article div.ico', 'div.items article h3'),
(10, 0, 7, 'http://weibo.com', 'http://weibo.com/tfwangjunkai', 3, '', '', 'WangJunKai', '20', 'aaazzzz', '', '', NULL, 'zzzz', '');

-- --------------------------------------------------------

--
-- Table structure for table `declaration_detail`
--

CREATE TABLE IF NOT EXISTS `declaration_detail` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `declaration_id` int(100) DEFAULT NULL,
  `product_descriptstion` text,
  `detail_product_descriptstion` text,
  `href_detail` text,
  `img0` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='declaration\r\nluu cac thong tin detail cua product' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `externalsv`
--

CREATE TABLE IF NOT EXISTS `externalsv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `svname` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(256) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `appid` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `appkey` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `root_folder` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `root_folder_key` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datecreat` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `folder_sv`
--

CREATE TABLE IF NOT EXISTS `folder_sv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `externalsv_id` int(11) NOT NULL,
  `folder_name` varchar(256) NOT NULL,
  `folder_key` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datecreat` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `externalsv_id` (`externalsv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `helps`
--

CREATE TABLE IF NOT EXISTS `helps` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `name1` varchar(256) CHARACTER SET utf8 NOT NULL,
  `name2` varchar(256) CHARACTER SET utf8 NOT NULL,
  `title` varchar(256) CHARACTER SET utf8 NOT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `sdt1` varchar(20) NOT NULL,
  `sdt2` varchar(20) NOT NULL,
  `yahoo` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `yahoo1` varchar(256) CHARACTER SET utf8 NOT NULL,
  `yahoo2` varchar(256) NOT NULL,
  `skype` varchar(256) DEFAULT NULL,
  `skype1` varchar(256) CHARACTER SET utf8 NOT NULL,
  `skype2` varchar(256) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `helps`
--

INSERT INTO `helps` (`id`, `name`, `name1`, `name2`, `title`, `sdt`, `sdt1`, `sdt2`, `yahoo`, `yahoo1`, `yahoo2`, `skype`, `skype1`, `skype2`, `created`, `modified`, `status`) VALUES
(28, 'Nhân viên kỹ thuật', '', '', '', '0979607988', '', '', 'adv.globaolmedia2@yahoo.com', '', '', 'adv.globaolmedia2', '', '', '2012-04-27 06:54:17', '2014-06-25 21:52:28', 1),
(29, 'Hỗ trợ kinh doanh - Mr Phuc', '', '', '', '0979607988', '', '', 'adv.globaolmedia2', '', '', 'adv.globaolmedia2', '', '', '2012-05-01 15:45:31', '2014-06-25 21:50:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `tracking_id` text NOT NULL,
  `total` bigint(100) DEFAULT NULL,
  `visa_id` int(100) DEFAULT NULL,
  `date_creat` date DEFAULT NULL,
  `status_pay` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Thong Tin hoa don' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `tracking_id`, `total`, `visa_id`, `date_creat`, `status_pay`) VALUES
(2, 'EVT.12017', 19, 3, '2015-05-19', 0),
(3, 'EVT.12018', 19, 4, '2015-05-19', 0),
(4, 'EVT.12019', 19, 5, '2015-05-19', 0),
(5, 'EVT.12020', 19, 6, '2015-05-19', 0),
(6, 'EVT.12021', 19, 7, '2015-05-19', 0),
(7, 'EVT.12022', 19, 8, '2015-05-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `langgues`
--

CREATE TABLE IF NOT EXISTS `langgues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `countrycode` varchar(256) DEFAULT NULL,
  `namecountry` varchar(250) DEFAULT NULL,
  `code` varchar(250) DEFAULT NULL,
  `capital` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `langgues`
--

INSERT INTO `langgues` (`id`, `countrycode`, `namecountry`, `code`, `capital`) VALUES
(1, 'vi', 'Tiếng Việt', NULL, NULL),
(2, 'en-us', 'American English', NULL, NULL),
(3, 'az', 'Azərbaycan', NULL, NULL),
(4, 'id', 'Bahasa Indonesia', NULL, NULL),
(5, 'ms', 'Bahasa Melayu', NULL, NULL),
(6, 'jv', 'Basa Jawa', NULL, NULL),
(7, 'bs', 'Bosanski', NULL, NULL),
(8, 'ca', 'Català', NULL, NULL),
(9, 'cz', 'Čeština', NULL, NULL),
(10, 'da', 'Dansk', NULL, NULL),
(11, 'de', 'Deutsch', NULL, NULL),
(12, 'et', 'Eesti keel', NULL, NULL),
(13, 'en', 'English', NULL, NULL),
(14, 'es', 'Español', NULL, NULL),
(15, 'eo', 'Esperanto', NULL, NULL),
(16, 'eu', 'Euskara', NULL, NULL),
(17, 'fr', 'Français', NULL, NULL),
(18, 'hr', 'Hrvatski', NULL, NULL),
(19, 'it', 'Italiano', NULL, NULL),
(20, 'lv', 'Latviešu Valoda', NULL, NULL),
(21, 'lt', 'Lietuvių kalba', NULL, NULL),
(22, 'hu', 'Magyar', NULL, NULL),
(23, 'nl', 'Nederlands', NULL, NULL),
(24, 'no', 'Norsk', NULL, NULL),
(25, 'pl', 'Polski', NULL, NULL),
(26, 'pt', 'Português', NULL, NULL),
(27, 'pt-br', 'Português brasileiro', NULL, NULL),
(28, 'ro', 'Română', NULL, NULL),
(29, 'sq', 'Shqip', NULL, NULL),
(30, 'sk', 'Slovenčina', NULL, NULL),
(31, 'sl', 'Slovenski', NULL, NULL),
(32, 'sr', 'Srpski', NULL, NULL),
(33, 'fi', 'Suomi', NULL, NULL),
(34, 'sv', 'Svenska', NULL, NULL),
(35, 'af', 'Afrikaans', NULL, NULL),
(36, 'tr', 'Türkçe', NULL, NULL),
(37, 'el', 'Ελληνικά', NULL, NULL),
(38, 'bg', 'Български', NULL, NULL),
(39, 'mk', 'Македонски јазик', NULL, NULL),
(40, 'ru', 'Русский', NULL, NULL),
(41, 'uk', 'Українська', NULL, NULL),
(42, 'he', 'עִבְרִית', NULL, NULL),
(43, 'ar', 'العربية', NULL, NULL),
(44, 'sd', 'سنڌي', NULL, NULL),
(45, 'fa', 'فارسی', NULL, NULL),
(46, 'ps', 'پښتو', NULL, NULL),
(47, 'mr', 'मराठी', NULL, NULL),
(48, 'bh', 'मैथिली', NULL, NULL),
(49, 'hi', 'हिन्दी', NULL, NULL),
(50, 'bn', 'বাংলা', NULL, NULL),
(51, 'pu', 'ਪੰਜਾਬੀ', NULL, NULL),
(52, 'gu', 'ગુજરાતી', NULL, NULL),
(53, 'or', 'ଓଡ଼ିଆ', NULL, NULL),
(55, 'ta', 'தமிழ்', NULL, NULL),
(56, 'te', 'తెలుగు', NULL, NULL),
(57, 'kn', 'ಕನ್ನಡ', NULL, NULL),
(58, 'ml', 'മലയാളം', NULL, NULL),
(59, 'th', 'ภาษาไทย', NULL, NULL),
(60, 'zh-tw', '中文 繁體', NULL, NULL),
(61, 'zh-cn', '中文（简体）', NULL, NULL),
(62, 'ja', '日本語', NULL, NULL),
(63, 'ko', '한국어', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `localsv`
--

CREATE TABLE IF NOT EXISTS `localsv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `svname` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ftpusername` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ftppass` varchar(256) NOT NULL,
  `path` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `datecreat` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `name`
--

CREATE TABLE IF NOT EXISTS `name` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(100) DEFAULT NULL,
  `child` longtext,
  `date_creat` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `hot` int(100) DEFAULT NULL,
  `status` int(100) DEFAULT NULL,
  `new` int(100) DEFAULT NULL,
  `alias` text,
  `img` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `name`
--

INSERT INTO `name` (`id`, `name`, `parent`, `child`, `date_creat`, `date_modified`, `hot`, `status`, `new`, `alias`, `img`, `description`) VALUES
(1, 'Rohlik', NULL, '', '0000-00-00', '0000-00-00', 0, 1, 0, 'https://www.rohlik.cz/', NULL, ''),
(2, 'Napoje', 1, '', '0000-00-00', '0000-00-00', 0, 1, 1, 'https://www.rohlik.cz/c75533-napoje', NULL, ''),
(3, 'Alkohol a tabak', 1, '', '0000-00-00', '0000-00-00', 0, 1, 1, 'https://www.rohlik.cz/c133337-alkohol-a-tabak', NULL, ''),
(4, 'Drogerie a domacnost', 1, '', '0000-00-00', '0000-00-00', 0, 1, 1, 'https://www.rohlik.cz/c75609-drogerie-a-domacnost', NULL, ''),
(5, 'Dite', 1, '', '0000-00-00', '0000-00-00', 0, 1, 1, 'https://www.rohlik.cz/c75685-dite', NULL, ''),
(6, 'Specialni', 1, '', '0000-00-00', '0000-00-00', 0, 1, 0, 'https://www.rohlik.cz/c133331-specialni', NULL, NULL),
(7, 'Sladke a slane', 1, '', '0000-00-00', '0000-00-00', 0, 1, 0, 'https://www.rohlik.cz/c75591-sladke-a-slane', NULL, NULL),
(18, 'Lazada', NULL, NULL, '0000-00-00', '0000-00-00', 0, 1, 0, 'https://www.rohlik.cz/', NULL, NULL),
(19, 'lazada1', 18, NULL, '0000-00-00', '0000-00-00', 0, 1, 1, 'https://www.rohlik.cz/c75533-napoje', NULL, NULL),
(20, 'Lazada2', 18, NULL, '0000-00-00', '0000-00-00', 0, 1, 1, 'https://www.rohlik.cz/c75533-napoje', NULL, NULL),
(21, 'Lazada3', 18, NULL, '2015-06-18', '2015-06-18', NULL, NULL, NULL, 'https://www.rohlik.cz/c75533-napoje', NULL, '  '),
(24, 'lazada th', 18, NULL, '2015-06-26', '2015-06-26', NULL, NULL, NULL, 'http://rohlik-crowler-1.tk/crowler/name/index', NULL, ' '),
(25, 'Trvanlivé potravinyyy', 1, NULL, '2015-07-13', '2015-07-13', NULL, NULL, NULL, 'https://www.rohlik.cz/c75471-trvanlive-potraviny', NULL, '   https://www.rohlik.cz/c75471-trvanlive-potraviny'),
(31, 'kk', 2, NULL, '2015-07-13', '2015-07-13', NULL, NULL, NULL, 'kkk.com', NULL, ''),
(32, 'kk', 2, NULL, '2015-07-13', '2015-07-13', NULL, NULL, NULL, 'kkk.com', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(100) NOT NULL AUTO_INCREMENT,
  `news_thumbnail` text CHARACTER SET utf8,
  `news_name` text CHARACTER SET utf8,
  `news_content` text CHARACTER SET utf8,
  `url_static` text,
  `date_creat` date DEFAULT NULL,
  `date_mod` text,
  `id_user` int(200) DEFAULT NULL,
  `silder` int(200) DEFAULT NULL,
  `status` int(200) unsigned DEFAULT '1',
  `travel_corner` int(200) unsigned DEFAULT NULL,
  `possition_view` int(100) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_thumbnail`, `news_name`, `news_content`, `url_static`, `date_creat`, `date_mod`, `id_user`, `silder`, `status`, `travel_corner`, `possition_view`) VALUES
(4, 'file-797.png', 'Traffic rates for the US are currently the highest they have ever been', '<p class="wp-caption-text">Why Should You Choose Visa on Arrival?</p>\r\n</div>\r\n<p style="text-align: justify;">It is compulsory for the passport holders from any country to carry a visa for traveling to Vietnam. A number of travelers pay visit to the country for various business purposes as well as for tourism. Travelers or business people can get their visa to Vietnam in the following ways:</p>\r\n<p style="text-align: justify;"><b>Through the Embassy</b>: This is a prevalent process through which your visa is issued directly by the embassy of Vietnam in your country. You can have a trip to the embassy personally or ask for the services of a professional and reputed travel agency for making the visa arrangements on your behalf. It might take 4 to 6 working days for you to get back your passport with the visa to Vietnam stamped on it. If you need to visit the country urgently, you might like to choose a better and quicker way out which is the Vietnam visa on arrival.</p>\r\n<p style="text-align: justify;"><b>Visa on Arrival Vietnam</b>: The Vietnam visa on arrival is a 100% online process which does not require applicants to go after the expensive and fraud travel agencies. It also considerably reduces the time of clearing the visa insurance from 6 to just 2 days or less. The procedure allows travelers to apply for a visa from anywhere and anytime. The Vietnam visa online is made available to the applicants within a brief time period. This is why a lot of people traveling to Vietnam prefer this option. Other benefits of visa on arrival are:</p>\r\n<ul style="text-align: justify;">\r\n<li><b>Any time</b>: It is impossible to get visa for Vietnam during Sat, Sun or Public holiday at embassy of Vietnam but you can get your visa on arrival through online agency 24×7.</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li><b>Anywhere</b> : You have to visiting and queuing at embassy or consulate at least 2 times to get a visa for Vietnam and it is more difficult for you if there is no Vietnam embassy in your country, however, Vietnam visa on arrival not like that, you can apply online for visa approval letter then take a flight to get visa at international airports of Vietnam.</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li><b>It is fast :</b> It is impossible to get visa at embassy of Vietnam if you are going to board for Vietnam in 4 hours or 2 hours, but you can do it with Vietnam visa on arrival service by apply online through visa agency in Vietnam.</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li><b>It is Simple</b>: The online procedure is extremely streamlined. All you need to do is fill in an online application form with the required information and required copies of documents. These will help you to the visa approval letter through registered email once your details are reviewed by the immigration department of Vietnam and after the applicable service fees have been paid for processing your request. The approval letter that is issued works like the visa to travel to the country with the actual visa being stamped on your passport once you arrive at any of the international airports.</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li><b>It is Safer</b>: A number of fraudulent travel agents might try to hoodwink you. It is also not wise to hand over your important documents such as your passport in the hands of the travel agents. The online process of application can conveniently eliminates all such scams.</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li><b>It is Cost Effective</b>: Applicants can save a lot of money with the visa on arrival as they do not have to travel to the Embassy and pay the huge bills that many travel agents demand.</li>\r\n</ul>\r\n<p style="text-align: justify;">Is Vietnam visa on arrival trustworthy and legitimated ? Please click here : <a href="http://www.e-visavietnam.org/is-vietnam-visa-on-arrival-legitimated/">http://www.e-visavietnam.org/is-vietnam-visa-on-arrival-legitimated/</a></p>\r\n		</div>\r\n<p></p>', 'ASAsa123', '2015-06-08', '2015-05-11 10:58:26', NULL, 1, 1, 1, NULL),
(5, 'file-577.png', 'Payments for November complete! Thank you for your continued support.', 'Payments for November complete! Thank you for your continued support.', 'asasa12', '2015-05-10', '2015-05-11 10:58:04', NULL, 1, 1, NULL, NULL),
(6, 'file-294.png', 'AdFly website is available in 3 more languages now: French, Arabic and Thai. Just select your preferred language from the dropdown in the top right of your screen', 'AdFly website is available in 3 more languages now: French, Arabic and Thai. Just select your preferred language from the dropdown in the top right of your screen', 'ewewew', '2015-05-09', '2015-05-11 10:57:48', NULL, NULL, 1, 1, NULL),
(7, 'file-456.png', 'Payza account you can receive now your earnings via BitCoin by using their new feature ''Withdraw Funds by Bitcoin''', 'If you have a Payza account you can receive now your earnings via BitCoin by using their new feature ''Withdraw Funds by Bitcoin''. For more details visit: https://blog.payza.com/payza-updates/why-use-payza-announcements/buy-bitcoin-with-payza/.', 'wewe', '2015-05-11', '2015-05-11 10:57:15', NULL, 1, 1, NULL, NULL),
(8, 'file-685.png', 'Pop Ads rates keep increasing! Why not give it a try? Learn more here. And check also the Pop Ads rates', 'Pop Ads rates keep increasing! Why not give it a try? Learn more here. And check also the Pop Ads rates', 'sASAS23', '2015-05-09', '2015-05-11 10:56:59', NULL, 1, 1, 1, NULL),
(9, 'file-696.png', 'Now we are giving you the option to allow mobile ads that automatically open Google Play or App Store', 'Now we are giving you the option to allow mobile ads that automatically open Google Play or App Store, this will greatly increase your CPM on mobile traffic. If you don''t want your visitors to see this, it can be turned off on your Account page (more details).', 'tsdsdf', '2015-05-10', '2015-05-11 10:56:40', NULL, NULL, 1, NULL, NULL),
(10, 'file-306.png', 'New way to make extra money! We have introduced Pop Ads to AdFly', 'New way to make extra money! We have introduced Pop Ads to AdFly, this is an optional popup window to that can be displayed if you use one of our scripts on your website. It does not affect your current AdFly links and can be enabled very simply, please see Tools for the new code', 'fsdfsdf', '2015-05-12', '2015-05-11 10:56:24', NULL, 1, 1, 1, NULL),
(11, 'file-986.png', 'New website has been launched! We hope that you like it. Please bear with us while we fix the odd bug.', 'New website has been launched! We hope that you like it. Please bear with us while we fix the odd bug.', 'fsdfdf', '2015-05-06', '2015-05-11 10:55:32', NULL, NULL, 1, 1, NULL),
(12, 'file-892.png', 'Toi Yeu Viet Nam', 'Toi yeu Viet Nam', 'bxfdgersd', '2015-05-09', '2015-05-11 10:55:10', NULL, 1, 1, NULL, NULL),
(13, 'file-438.png', 'toissssssssssss', 'sss', 'dfrsdfsd', '2015-05-05', '2015-05-11 10:54:52', NULL, NULL, 1, NULL, NULL),
(15, 'file-869.png', 'Now we are giving you the option to allow mobile', 'url_staticurl_staticurl_staticurl_staticurl_static', 'edsfsdfsd', '2015-05-11', '2015-05-11 17:17:30', NULL, 1, 1, 1, NULL),
(16, 'file-725.png', 'hoang phuc test', 'url_staticurl_staticurl_staticurl_staticurl_staticurl_staticurl_staticurl_static', 'hoang-phuc-test', '2015-05-11', '2015-05-11 17:19:32', NULL, NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date_creat` date DEFAULT NULL,
  `id_user` int(100) DEFAULT '0',
  `is_subscribed` int(100) DEFAULT '0',
  `email` text,
  `status` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='newsletter' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `date_creat`, `id_user`, `is_subscribed`, `email`, `status`) VALUES
(3, '2015-05-28', 1, 1, 'gstearmit@gmail.com', '0'),
(4, '2015-05-28', 51, 1, 'gstearmit@gmail.com', '0'),
(9, '2015-05-29', NULL, 1, 'phuca4@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `oders`
--

CREATE TABLE IF NOT EXISTS `oders` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
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
  `totalprice` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `oders`
--

INSERT INTO `oders` (`id`, `creatnamecampaign`, `date_creat`, `date_mod`, `id_user`, `status`, `status_oder`, `type`, `DolarTotal`, `Cpmrate`, `TotaVistor`, `customer`, `email`, `address`, `phone`, `time`, `totalprice`) VALUES
(1, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Hoang Cong Phuc', 'phuca4@gmail.com', 'ppppp', '+84972607988', '13:30-14:00', '169'),
(2, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'nguyen truong quan', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '9:00-10:00', '128'),
(3, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'nguyen truong quan', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '9:00-10:00', '128'),
(4, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'nguyen truong quan', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '9:00-10:00', '128'),
(5, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'quan nguyen', 'quannt888@gmail.com', '38-kham thien-dong da-hn', '01663939030', '16:00-16:30', '128'),
(6, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'quan nguyen', 'quannt888@gmail.com', '38-kham thien-dong da-hn', '01663939030', '16:00-16:30', '128'),
(7, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'quan nguyen', 'quannt888@gmail.com', '38-kham thien-dong da-hn', '01663939030', '16:00-16:30', '128'),
(8, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Bien Bien Van', 'xuandac990@gmail.com', 'Số 27 Ngõ 256/16 Bạch Đằng - Chương Dương - Hoàn Kiếm - Hà Nội.', '0975077643', '16:00-16:30', '128'),
(9, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'quan nguyen', 'quannt888@gmail.com', '38-kham thien-dong da-hn', '01663939030', '16:00-16:30', '128'),
(10, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'admin', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '16:30-17:00', '128'),
(11, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'admin', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '16:30-17:00', '128'),
(12, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'se', 'quannt888@gmail.com', 'khâm thiên -Đống Đa-Hà Nội', '01663939030', '17:30-18:00', '128'),
(13, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'se', 'quannt888@gmail.com', 'khâm thiên -Đống Đa-Hà Nội', '01663939030', '17:30-18:00', '128'),
(14, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Không được để trống', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '17:30-18:00', '128'),
(15, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'abc', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '16:30-17:00', '256'),
(16, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'abc', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '16:30-17:00', '256'),
(17, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Free', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '17:00-17:30', '256'),
(18, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Free', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '17:00-17:30', '256'),
(19, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Free', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '17:00-17:30', '256'),
(20, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Free', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '17:00-17:30', '256'),
(21, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Free', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '17:00-17:30', '256'),
(22, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Free', 'quannt888@gmail.com', 'kham thien dong da hn', '01663939030', '17:00-17:30', '256'),
(23, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Đàm Thu Hằng', 'xuandachd990@gmail.com', 'Số 27 Ngõ 256/16 Bạch Đằng - Chương Dương - Hoàn Kiếm - Hà Nội.', '0975077643', '9:00-10:00', '256'),
(24, NULL, '2015-07-01', '2015-07-01', NULL, NULL, 0, 0, NULL, NULL, NULL, 'Hoang Cong Phuc', 'gstearmit@gmail.com', 'Ha Noi', '+84972607988', '13:00-13:30', '297'),
(25, NULL, '2015-07-08', '2015-07-08', NULL, NULL, 0, 0, NULL, NULL, NULL, 'hfghgvh', 'fgdg@gmail.com', 'fdgdfg', '3453454534543', '16:30-17:00', '6262'),
(26, NULL, '2015-07-08', '2015-07-08', NULL, NULL, 0, 0, NULL, NULL, NULL, '76876786', 'hgf@gmail.com', 'gfhghg6546', 'gfhg67565', '16:00-16:30', '6454'),
(27, NULL, '2015-07-10', '2015-07-10', NULL, NULL, 2, 0, NULL, NULL, NULL, 'dfgfg', 'fdg@gmail.com', 'gdfgdfg', '4564645654', '9:00-10:00', '150'),
(28, NULL, '2015-07-17', '2015-07-17', NULL, NULL, 0, 0, NULL, NULL, NULL, 'aaa', 'qqq@gmail.com', 'hn', '654634545', '', '882'),
(29, NULL, '2015-07-17', '2015-07-17', NULL, NULL, 0, 0, NULL, NULL, NULL, '', '', '', '', '', '882'),
(30, NULL, '2015-07-17', '2015-07-17', NULL, NULL, 0, 0, NULL, NULL, NULL, '', '', '', '', '', '1197'),
(31, NULL, '2015-07-17', '2015-07-17', NULL, NULL, 0, 0, NULL, NULL, NULL, '', '', '', '', '', '1932'),
(32, NULL, '2015-07-18', '2015-07-18', NULL, NULL, 0, 0, NULL, NULL, NULL, '', '', '', '', '', '189'),
(33, NULL, '2015-07-18', '2015-07-18', NULL, NULL, 0, 0, NULL, NULL, NULL, '', '', '', '', '', '233'),
(34, NULL, '2015-07-18', '2015-07-18', NULL, NULL, 0, 0, NULL, NULL, NULL, '3453453', '34545353@gmail.com', '43543', '435465657657', '', '233'),
(35, NULL, '2015-07-18', '2015-07-18', 0, NULL, 0, 0, NULL, NULL, NULL, '', 'gstearmit@gmail.com', '', '', '', '333'),
(36, NULL, '2015-07-18', '2015-07-18', 0, NULL, 0, 0, NULL, NULL, NULL, '', 'gstearmit@gmail.com', '', '', '', '333'),
(37, NULL, '2015-07-18', '2015-07-18', 8, NULL, 0, 0, NULL, NULL, NULL, 'ewrew', 'erere@gmail.com', 'ửewrer', '676876878', '', '1235'),
(38, NULL, '2015-07-18', '2015-07-18', 0, NULL, 0, 0, NULL, NULL, NULL, '', 'gstearmit@gmail.com', '', '', '', '2076'),
(39, NULL, '2015-07-18', '2015-07-18', 0, NULL, 0, 0, NULL, NULL, NULL, '', 'gstearmit@gmail.com', '', '', '', '1860'),
(40, NULL, '2015-07-18', '2015-07-18', 8, NULL, 0, 0, NULL, NULL, NULL, 'sdfds', 'dfs@gmail.com', 'sfdfsf', '3423432743', '', '1928'),
(41, NULL, '2015-07-18', '2015-07-18', 0, NULL, 0, 0, NULL, NULL, NULL, '', 'gstearmit@gmail.com', '', '', '', '1928'),
(42, NULL, '2015-07-20', '2015-07-20', 0, NULL, 0, 0, NULL, NULL, NULL, 'dsf', 'ab@gmail.com', 'sf', '534543545', '', '11'),
(43, NULL, '2015-07-20', '2015-07-20', 0, NULL, 0, 0, NULL, NULL, NULL, '', 'gstearmit@gmail.com', '', '', '', '22');

-- --------------------------------------------------------

--
-- Table structure for table `odersdetails`
--

CREATE TABLE IF NOT EXISTS `odersdetails` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
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
  `price_product` varchar(256) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=518 ;

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
(413, NULL, 239, '2015-06-22', '2015-06-22', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, '156'),
(414, NULL, 240, '2015-06-23', '2015-06-23', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(415, NULL, 241, '2015-06-23', '2015-06-23', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(416, NULL, 242, '2015-06-23', '2015-06-23', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54, '68'),
(417, NULL, 242, '2015-06-23', '2015-06-23', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 55, '44'),
(418, NULL, 243, '2015-06-25', '2015-06-25', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(419, NULL, 243, '2015-06-25', '2015-06-25', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54, '68'),
(420, NULL, 244, '2015-06-26', '2015-06-26', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '0'),
(421, NULL, 244, '2015-06-26', '2015-06-26', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, '169'),
(422, NULL, 245, '2015-06-26', '2015-06-26', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '0'),
(423, NULL, 245, '2015-06-26', '2015-06-26', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, '169'),
(424, NULL, 246, '2015-06-27', '2015-06-27', NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '0'),
(425, NULL, 246, '2015-06-27', '2015-06-27', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, '32'),
(426, NULL, 246, '2015-06-27', '2015-06-27', NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(427, NULL, 247, '2015-06-30', '2015-06-30', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(428, NULL, 248, '2015-06-30', '2015-06-30', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(429, NULL, 248, '2015-06-30', '2015-06-30', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54, '68'),
(430, NULL, 249, '2015-06-30', '2015-06-30', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(431, NULL, 249, '2015-06-30', '2015-06-30', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54, '68'),
(432, NULL, 250, '2015-06-30', '2015-06-30', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54, '68'),
(433, NULL, 251, '2015-06-30', '2015-06-30', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(434, NULL, 1, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, '169'),
(435, NULL, 2, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(436, NULL, 3, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(437, NULL, 4, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(438, NULL, 5, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(439, NULL, 6, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(440, NULL, 7, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(441, NULL, 8, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(442, NULL, 9, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(443, NULL, 10, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(444, NULL, 11, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(445, NULL, 12, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(446, NULL, 13, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(447, NULL, 14, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(448, NULL, 15, '2015-07-01', '2015-07-01', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(449, NULL, 16, '2015-07-01', '2015-07-01', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(450, NULL, 17, '2015-07-01', '2015-07-01', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(451, NULL, 18, '2015-07-01', '2015-07-01', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(452, NULL, 19, '2015-07-01', '2015-07-01', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(453, NULL, 20, '2015-07-01', '2015-07-01', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(454, NULL, 21, '2015-07-01', '2015-07-01', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(455, NULL, 22, '2015-07-01', '2015-07-01', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(456, NULL, 23, '2015-07-01', '2015-07-01', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(457, NULL, 24, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, '169'),
(458, NULL, 24, '2015-07-01', '2015-07-01', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(459, NULL, 25, '2015-07-08', '2015-07-08', NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, '169'),
(460, NULL, 25, '2015-07-08', '2015-07-08', NULL, NULL, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(461, NULL, 26, '2015-07-08', '2015-07-08', NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, '32'),
(462, NULL, 26, '2015-07-08', '2015-07-08', NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, '169'),
(463, NULL, 26, '2015-07-08', '2015-07-08', NULL, NULL, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(464, NULL, 27, '2015-07-10', '2015-07-10', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '30'),
(465, NULL, 28, '2015-07-17', '2015-07-17', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, '35'),
(466, NULL, 28, '2015-07-17', '2015-07-17', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52, '66'),
(467, NULL, 28, '2015-07-17', '2015-07-17', NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, '20'),
(468, NULL, 29, '2015-07-17', '2015-07-17', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, '35'),
(469, NULL, 29, '2015-07-17', '2015-07-17', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52, '66'),
(470, NULL, 29, '2015-07-17', '2015-07-17', NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, '20'),
(471, NULL, 30, '2015-07-17', '2015-07-17', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '105'),
(472, NULL, 30, '2015-07-17', '2015-07-17', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, '35'),
(473, NULL, 30, '2015-07-17', '2015-07-17', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52, '66'),
(474, NULL, 30, '2015-07-17', '2015-07-17', NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, '20'),
(475, NULL, 31, '2015-07-17', '2015-07-17', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '105'),
(476, NULL, 31, '2015-07-17', '2015-07-17', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, '35'),
(477, NULL, 31, '2015-07-17', '2015-07-17', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52, '66'),
(478, NULL, 31, '2015-07-17', '2015-07-17', NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, '20'),
(479, NULL, 32, '2015-07-18', '2015-07-18', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, '63'),
(480, NULL, 33, '2015-07-18', '2015-07-18', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, '63'),
(481, NULL, 33, '2015-07-18', '2015-07-18', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, '11'),
(482, NULL, 34, '2015-07-18', '2015-07-18', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, '63'),
(483, NULL, 34, '2015-07-18', '2015-07-18', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, '11'),
(484, NULL, 35, '2015-07-18', '2015-07-18', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, '63'),
(485, NULL, 35, '2015-07-18', '2015-07-18', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, '11'),
(486, NULL, 35, '2015-07-18', '2015-07-18', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, '20'),
(487, NULL, 36, '2015-07-18', '2015-07-18', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, '63'),
(488, NULL, 36, '2015-07-18', '2015-07-18', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, '11'),
(489, NULL, 36, '2015-07-18', '2015-07-18', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, '20'),
(490, NULL, 37, '2015-07-18', '2015-07-18', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, '63'),
(491, NULL, 37, '2015-07-18', '2015-07-18', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, '35'),
(492, NULL, 37, '2015-07-18', '2015-07-18', NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 51, '99'),
(493, NULL, 37, '2015-07-18', '2015-07-18', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 57, '55'),
(494, NULL, 37, '2015-07-18', '2015-07-18', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, '11'),
(495, NULL, 37, '2015-07-18', '2015-07-18', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, '20'),
(496, NULL, 37, '2015-07-18', '2015-07-18', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 67, '20'),
(497, NULL, 38, '2015-07-18', '2015-07-18', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '105'),
(498, NULL, 38, '2015-07-18', '2015-07-18', NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 51, '99'),
(499, NULL, 38, '2015-07-18', '2015-07-18', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52, '66'),
(500, NULL, 38, '2015-07-18', '2015-07-18', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 57, '55'),
(501, NULL, 38, '2015-07-18', '2015-07-18', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, '11'),
(502, NULL, 39, '2015-07-18', '2015-07-18', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '105'),
(503, NULL, 39, '2015-07-18', '2015-07-18', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52, '66'),
(504, NULL, 39, '2015-07-18', '2015-07-18', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(505, NULL, 39, '2015-07-18', '2015-07-18', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, '11'),
(506, NULL, 40, '2015-07-18', '2015-07-18', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '105'),
(507, NULL, 40, '2015-07-18', '2015-07-18', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52, '66'),
(508, NULL, 40, '2015-07-18', '2015-07-18', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(509, NULL, 40, '2015-07-18', '2015-07-18', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54, '68'),
(510, NULL, 40, '2015-07-18', '2015-07-18', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, '11'),
(511, NULL, 41, '2015-07-18', '2015-07-18', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '105'),
(512, NULL, 41, '2015-07-18', '2015-07-18', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52, '66'),
(513, NULL, 41, '2015-07-18', '2015-07-18', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, '128'),
(514, NULL, 41, '2015-07-18', '2015-07-18', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54, '68'),
(515, NULL, 41, '2015-07-18', '2015-07-18', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, '11'),
(516, NULL, 42, '2015-07-20', '2015-07-20', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, '11'),
(517, NULL, 43, '2015-07-20', '2015-07-20', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, '11');

-- --------------------------------------------------------

--
-- Table structure for table `payoutrates`
--

CREATE TABLE IF NOT EXISTS `payoutrates` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `namepackge` text CHARACTER SET utf8,
  `price` double DEFAULT NULL,
  `vistor` bigint(100) DEFAULT NULL,
  `id_user` int(100) DEFAULT NULL,
  `date_creat` date DEFAULT NULL,
  `date_mod` date DEFAULT NULL,
  `type` int(100) DEFAULT NULL,
  `status` int(100) DEFAULT '0',
  `DKCpmUni` double DEFAULT NULL,
  `DKCpmRaw` double DEFAULT NULL,
  `MBCpmUni` double DEFAULT NULL,
  `MBCpmRaw` double DEFAULT NULL,
  `code` text,
  `hotstring` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=226 ;

--
-- Dumping data for table `payoutrates`
--

INSERT INTO `payoutrates` (`id`, `namepackge`, `price`, `vistor`, `id_user`, `date_creat`, `date_mod`, `type`, `status`, `DKCpmUni`, `DKCpmRaw`, `MBCpmUni`, `MBCpmRaw`, `code`, `hotstring`) VALUES
(7, 'United States', 5, NULL, 1, '2015-02-11', '2015-02-11', 1, 1, 8.98, 3.96, 5.38, 3.34, 'US', 'LIMITED AVAILABILITY'),
(8, 'Canada', 3, NULL, 1, '2015-02-11', '2015-02-11', 1, 1, 2.87, 1.6, 2.69, 1.71, 'CA', NULL),
(12, 'Australia', 3, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 3.39, 1.72, 2.78, 1.72, 'AU', ''),
(13, 'Italy', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 2.19, 1.14, 6.31, 3.66, 'IT', ''),
(14, 'Qatar', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 5, 2.57, 5.76, 4.08, 'QA', ''),
(15, 'Spain', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 2.28, 1.01, 5.14, 3.21, 'ES', ''),
(16, 'Germany', 3, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 3.27, 1.61, 4.62, 3.12, 'DE', ''),
(17, 'United Arab Emirates', 3, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 4.14, 1.89, 3.86, 1.87, 'AE', ''),
(18, 'France', 3, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 2.93, 1.32, 4.14, 2.98, 'FR', 'REDUCED!'),
(19, 'Iraq', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 4.11, 2.18, 3.46, 2.08, 'IQ', ''),
(20, 'Denmark', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 3.57, 2.13, 1.83, 1.24, 'DK', ''),
(21, 'Greece', 3, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 3.54, 1.69, 1.53, 1.08, 'GR', ''),
(22, 'Norway', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 3.52, 2, 1.51, 1.17, 'NO', ''),
(23, 'Switzerland', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 2.7, 1.39, 3.48, 2.38, 'CH', ''),
(24, 'Ireland', 3, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 3.35, 1.72, 2.51, 1.69, 'IE', ''),
(25, 'Netherlands', 3, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 3.33, 1.7, 2.18, 1.57, 'NL', ''),
(26, 'New Zealand', 3, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 3.29, 1.73, 2.57, 1.72, 'NZ', ''),
(27, 'Poland', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 3.17, 1.8, 2.55, 1.67, 'PL', ''),
(28, 'Austria', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 2.59, 1.3, 3.09, 2.3, 'AT', ''),
(29, 'South Africa', 3, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 2.98, 1.7, 2.74, 1.78, 'ZA', ''),
(30, 'Bahrain', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 2.83, 1.75, 2.1, 1.21, 'BH', ''),
(31, 'Singapore', 3, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.56, 0.5, 2.72, 1.6, 'SG', ''),
(32, 'Belgium', 3, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 2.59, 1.46, 1.67, 1.29, 'BE', ''),
(33, 'Malaysia', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.98, 0.5, 2.5, 1.4, 'MY', 'HIGH AVAILABILITY!'),
(34, 'Mexico', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.63, 0.72, 2.49, 1.53, 'MX', ''),
(35, 'Sweden', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 2.48, 1.15, 1.83, 1.13, 'SE', ''),
(36, 'Saudi Arabia', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 2.11, 2.45, 2.45, 1.18, 'SA', ''),
(37, 'Ecuador', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.39, 0.63, 2.37, 1.52, 'EC', ''),
(38, 'Myanmar', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.34, 0.32, 2.25, 1.07, 'MM', ''),
(39, 'Romania', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 2.22, 0.99, 1.21, 0.99, 'RO', ''),
(40, 'Hong Kong', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 2.08, 1, 1.6, 1.1, 'HK', ''),
(41, 'Korea, Republic Of', 3, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 1.01, 0.88, 2.06, 1.49, 'KR', ''),
(42, 'China', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.64, 0.51, 2.04, 1.59, 'CN', ''),
(43, 'Portugal', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.92, 0.99, 1.66, 1.14, 'PT', ''),
(44, 'Jordan', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 1.68, 1.14, 1.9, 1.24, 'JO', ''),
(45, 'Russian Federation', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.97, 0.5, 1.88, 1.15, 'RU', ''),
(46, 'Peru', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.85, 0.8, 1.53, 1.03, 'PE', ''),
(47, 'Czech Republic', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.84, 0.94, 1.21, 1, 'CZ', ''),
(48, 'Finland', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 1.07, 0.95, 1.8, 1.09, 'FI', ''),
(49, 'Slovakia', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.76, 0.59, 1.77, 1.19, 'SK', ''),
(50, 'Colombia', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 1.54, 0.71, 1.74, 1.15, 'CO', ''),
(51, 'Hungary', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 1.51, 0.95, 1.7, 1.14, 'HU', ''),
(52, 'Japan', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 1.05, 0.89, 1.69, 1.12, 'JP', ''),
(53, 'Latvia', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 1.65, 0.98, 1.33, 1.03, 'LV', ''),
(54, 'Kuwait', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 1.09, 0.56, 1.64, 0.92, 'KW', ''),
(55, 'Brazil', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.95, 0.49, 1.6, 1.01, 'BR', 'REDUCED!'),
(56, 'Ukraine', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.38, 0.31, 1.56, 1.02, 'UA', ''),
(57, 'Iceland', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 1.54, 1, 1.38, 1.1, 'IS', ''),
(58, 'Nigeria', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.18, 0.5, 1.51, 1, 'NG', ''),
(59, 'Argentina', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.71, 0.49, 1.48, 1, 'AR', ''),
(60, 'Israel', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.13, 0.58, 1.46, 0.98, 'IL', ''),
(61, 'India', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.72, 0.49, 1.43, 1, 'IN', 'HIGH AVAILABILITY!'),
(62, 'Egypt', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.12, 0.56, 1.42, 0.97, 'EG', ''),
(63, 'Morocco', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.39, 0.74, 1.39, 0.97, 'MA', ''),
(64, 'Luxembourg', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.23, 0.57, 1.38, 0.95, 'LU', ''),
(65, 'Algeria', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.67, 0.4, 1.37, 0.97, 'DZ', ''),
(66, 'Moldova, Republic Of', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.29, 0.25, 1.36, 0.96, 'MD', ''),
(67, 'Vanuatu', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.35, 0.34, 1.36, 1.16, 'VA', ''),
(68, 'Costa Rica', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.4, 0.34, 1.36, 1, 'CR', ''),
(69, 'Wallis And Futuna', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.36, 0.43, 0, 0, 'WA', ''),
(70, 'Togo', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.43, 0.34, 1.35, 1.16, 'TO', ''),
(71, 'Cyprus', 3, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.64, 0.53, 1.34, 0.98, 'CY', ''),
(72, 'Congo', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.24, 0.22, 1.34, 1.09, 'CG', ''),
(73, 'Brunei Darussalam', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.32, 0.29, 1.34, 1.01, 'BD', ''),
(74, 'Malawi', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.31, 0.27, 1.34, 1.07, 'ML', ''),
(75, 'Venezuela', 2, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.32, 0.27, 1.33, 1.08, 'VE', ''),
(76, 'Lebanon', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.28, 0.25, 1.33, 0.98, 'LE', ''),
(77, 'Chile', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.35, 0.29, 1.32, 0.98, 'CL', ''),
(78, 'Thailand', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.51, 0.22, 1.32, 0.95, 'TH', 'HIGH AVAILABILITY!'),
(79, 'Bolivia', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.34, 0.29, 1.31, 0.99, 'BO', ''),
(80, 'Taiwan', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.56, 0.41, 1.31, 0.98, 'TW', ''),
(81, 'Cape Verde', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.34, 0.27, 1.31, 1.16, 'CV', ''),
(82, 'Honduras', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.41, 0.35, 1.3, 0.99, 'HO', ''),
(83, 'Djibouti', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.27, 0.24, 1.3, 1.03, 'DJ', ''),
(84, 'Trinidad And Tobago', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.34, 0.3, 1.3, 1, 'TR', ''),
(85, 'Paraguay', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.35, 0.3, 1.3, 0.98, 'PA', ''),
(86, 'Liechtenstein', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.28, 0.26, 1.3, 1.16, 'LI', ''),
(87, 'Suriname', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.28, 0.27, 1.3, 1.01, 'SU', ''),
(88, 'Turks And Caicos Islands', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.5, 0.39, 1.29, 1.09, 'TU', ''),
(89, 'Benin', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.32, 0.27, 1.29, 1.01, 'BN', ''),
(90, 'Bangladesh', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.29, 0.24, 1.29, 0.97, 'BD', ''),
(91, 'Yemen', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.33, 0.28, 1.29, 0.99, 'YE', ''),
(92, 'Burkina Faso', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.26, 0.23, 1.28, 0.97, 'BF', ''),
(93, 'Mali', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.22, 0.21, 1.28, 0.95, 'MA', ''),
(94, 'Marshall Islands', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.64, 0.38, 1.27, 0.94, 'MI', ''),
(95, 'Barbados', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.4, 0.33, 1.27, 0.97, 'BA', ''),
(96, 'Georgia', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.29, 0.25, 1.27, 0.99, 'GE', ''),
(97, 'Bhutan', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.23, 0.23, 1.26, 1.01, 'BT', ''),
(98, 'Panama', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.37, 0.31, 1.26, 0.97, 'PA', ''),
(99, 'Jamaica', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.34, 0.3, 1.26, 0.95, 'JA', ''),
(100, 'Slovenia', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.25, 0.56, 1.25, 0.98, 'SI', ''),
(101, 'Philippines', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.43, 0.33, 1.25, 0.96, 'PH', ''),
(102, 'Philippines', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.43, 0.33, 1.25, 0.96, 'PH', ''),
(103, 'Bulgaria', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.48, 0.36, 1.25, 1, 'BG', ''),
(104, 'Guatemala', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.4, 0.32, 1.25, 0.96, 'GT', ''),
(105, 'Congo, The Democratic Republic Of The', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.32, 0.28, 1.25, 0.99, 'CT', ''),
(106, 'Serbia', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.63, 0.45, 1.25, 0.97, 'RS', 'REDUCED!'),
(107, 'Mozambique', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.25, 0.23, 1.25, 0.92, 'MO', ''),
(108, 'Kazakhstan', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.25, 0.23, 1.24, 0.98, 'KA', ''),
(109, 'Saint Lucia', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.43, 0.34, 1.24, 1.01, 'SL', ''),
(110, 'Andorra', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.28, 0.25, 1.24, 0.99, 'AN', ''),
(111, 'El Salvador', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.39, 0.34, 1.24, 0.98, 'EI', ''),
(112, 'Dominican Republic', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.66, 0.51, 1.24, 0.97, 'DO', ''),
(113, 'Dominican Republic', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.66, 0.51, 1.24, 0.97, 'DO', ''),
(114, 'Tunisia', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.63, 0.5, 1.24, 0.95, 'TN', ''),
(115, 'Libya', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.67, 0.5, 1.24, 0.95, 'LY', ''),
(116, 'Madagascar', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.25, 0.22, 1.23, 0.93, 'MG', ''),
(117, 'Kyrgyzstan', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.26, 0.24, 1.23, 0.96, 'KY', ''),
(118, 'Nicaragua', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.41, 0.34, 1.23, 0.97, 'NI', ''),
(119, 'Dominica', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.36, 0.31, 1.23, 0.85, 'DN', ''),
(120, 'Oman', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.26, 0.24, 1.23, 0.95, 'OM', ''),
(121, 'Ghana', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.68, 0.49, 1.23, 1.02, 'GH', ''),
(122, 'Somalia', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.49, 0.36, 1.22, 1.04, 'SO', ''),
(123, 'Albania', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.32, 0.26, 1.22, 0.96, 'AL', ''),
(124, 'Estonia', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.99, 0.5, 1.22, 0.96, 'EE', ''),
(125, 'Montenegro', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.82, 0.5, 1.22, 0.94, 'ME', ''),
(126, 'Tanzania, United Republic Of', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.82, 0.5, 1.22, 1, 'TZ', ''),
(127, 'Ethiopia', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.24, 0.22, 1.22, 0.99, 'ET', ''),
(128, 'Grenada', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.3, 0.25, 1.22, 1.04, 'GN', ''),
(129, 'Bosnia And Herzegovina', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.24, 0.21, 1.21, 1, 'BA', ''),
(130, 'Cote D''ivoire', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.26, 0.22, 1.21, 0.97, 'CI', ''),
(131, 'Pakistan', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.23, 0.21, 1.21, 0.97, 'PK', ''),
(132, 'Bahamas', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.42, 0.35, 1.2, 1.02, 'BM', ''),
(133, 'Rwanda', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.29, 0.25, 1.2, 1, 'RW', ''),
(134, 'New Caledonia', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.3, 0.27, 1.2, 0.98, 'NC', ''),
(135, 'Mauritius', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.23, 0.22, 1.2, 0.97, 'MR', ''),
(136, 'Azerbaijan', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.27, 0.26, 1.2, 0.97, 'AZ', ''),
(137, 'Faroe Islands', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.36, 0.28, 1.2, 1.09, 'FA', ''),
(138, 'Zambia', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.3, 0.27, 1.2, 1, 'ZM', ''),
(139, 'Croatia', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.71, 0.5, 1.2, 0.96, 'HR', 'REDUCED!'),
(140, 'Palestinian Territory, Occupied', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.28, 0.25, 1.19, 0.97, 'PO', ''),
(141, 'Aruba', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.28, 0.27, 1.19, 0.95, 'AB', ''),
(142, 'Zimbabwe', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.22, 0.2, 1.19, 1.05, 'ZI', ''),
(143, 'Martinique', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.35, 0.31, 1.19, 0.96, 'MQ', ''),
(144, 'San Marino', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.35, 0.29, 1.19, 0.97, 'SM', ''),
(145, 'Lao People''s Democratic Republic', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.35, 0.32, 1.18, 0.86, 'LP', ''),
(146, 'Puerto Rico', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.39, 0.33, 1.18, 0.94, 'PR', ''),
(147, 'Gibraltar', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.3, 0.25, 1.18, 1, 'GI', ''),
(148, 'Antigua And Barbuda', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.32, 0.32, 1.18, 1.03, 'AA', ''),
(149, 'Belize', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.3, 0.28, 1.18, 0.95, 'BZ', ''),
(150, 'Macao', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.91, 0.5, 1.18, 0.87, 'MO', ''),
(151, 'Gambia', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.35, 0.3, 1.18, 1.03, 'GA', ''),
(152, 'Mauritania', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.3, 0.26, 1.18, 1.02, 'MN', ''),
(153, 'Mayotte', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.28, 0.25, 1.18, 0.8, 'MT', ''),
(154, 'Greece (VAT)', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.32, 0.29, 1.17, 0.98, 'GC', ''),
(155, 'Sudan', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.22, 0.21, 1.17, 0.98, 'SD', ''),
(156, 'Sri Lanka', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.28, 0.24, 1.17, 0.9, 'LK', ''),
(157, 'Monaco', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.25, 0.21, 1.16, 0.83, 'MC', ''),
(158, 'Guyana', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.35, 0.31, 1.16, 0.96, 'GU', ''),
(159, 'Central African Republic', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0, 0, 1.16, 1.16, 'CA', ''),
(160, 'Chad', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0, 0, 1.16, 1.16, 'CD', ''),
(161, 'Micronesia, Federated States Of', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0, 0, 1.16, 1.16, 'MF', ''),
(162, 'Swaziland', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.25, 0.25, 1.16, 1.16, 'SW', ''),
(163, 'Lithuania', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.08, 0.57, 1.16, 0.96, 'LT', ''),
(164, 'Saint Vincent And The Grenadines', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.37, 0.32, 1.15, 0.77, 'SV', ''),
(165, 'Malta', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.28, 0.24, 1.15, 0.96, 'MZ', ''),
(166, 'Cuba', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.39, 0.31, 1.15, 1.05, 'CU', ''),
(167, 'Uruguay', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.34, 0.28, 1.15, 0.95, 'UY', ''),
(168, 'Turkey', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.01, 0.5, 1.15, 0.91, 'TR', 'REDUCED!'),
(169, 'Equatorial Guinea', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.29, 0.25, 1.15, 0.9, 'EQ', ''),
(170, 'Syrian Arab Republic', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.26, 0.24, 1.14, 0.96, 'SY', ''),
(171, 'Uganda', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.27, 0.24, 1.14, 1.03, 'UG', ''),
(172, 'Angola', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.3, 0.26, 1.14, 0.92, 'AG', ''),
(173, 'Réunion', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.26, 0.24, 1.14, 0.97, 'RE', ''),
(174, 'Botswana', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.25, 0.23, 1.14, 0.98, 'BS', ''),
(175, 'French Guiana', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.32, 0.29, 1.13, 0.93, 'FG', ''),
(176, 'Jersey', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.29, 0.28, 1.13, 1, 'JE', ''),
(177, 'Guam', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0, 0, 1.13, 0.88, 'GM', ''),
(178, 'Cayman Islands', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.34, 0.29, 1.13, 0.88, 'CS', ''),
(179, 'Kenya', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.02, 0.57, 1.13, 0.99, 'KE', ''),
(180, 'Haiti', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.37, 0.31, 1.12, 0.96, 'HA', ''),
(181, 'Gabon', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.24, 0.22, 1.11, 1.07, 'GB', ''),
(182, 'Macedonia, The Former Yugoslav Republic Of', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.22, 0.2, 1.11, 0.95, 'MK', ''),
(183, 'Armenia', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.3, 0.25, 1.11, 0.9, 'AM', ''),
(184, 'Maldives', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.27, 0.25, 1.11, 0.93, 'MV', ''),
(185, 'American Samoa', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0, 0, 1.11, 0.94, 'AS', ''),
(186, 'Solomon Islands', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.33, 0.55, 1.11, 1.16, 'SN', ''),
(187, 'Korea, Democratic People''s Republic Of', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.11, 0.5, 0, 0, 'KO', ''),
(188, 'Nepal', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.26, 0.24, 1.1, 0.97, 'NE', ''),
(189, 'Aland Islands', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.29, 0.24, 1.08, 0.72, 'AI', ''),
(190, 'Tajikistan', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.24, 0.23, 1.08, 0.8, 'TA', ''),
(191, 'French Polynesia', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.27, 0.26, 1.08, 0.96, 'FP', ''),
(192, 'Senegal', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.24, 0.22, 1.07, 0.95, 'SE', ''),
(193, 'Virgin Islands, U.S.', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.41, 0.28, 1.07, 0.9, 'VI', ''),
(194, 'Guernsey', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.32, 0.28, 1.07, 0.82, 'GS', ''),
(195, 'Guadeloupe', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.3, 0.28, 1.06, 0.93, 'GD', ''),
(196, 'Mongolia', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.27, 0.26, 1.06, 0.86, 'MW', ''),
(197, 'Iran, Islamic Republic Of', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.72, 0.48, 1.06, 0.95, 'IR', ''),
(198, 'Guinea', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.29, 0.26, 1.05, 0.86, 'GZ', ''),
(199, 'Niger', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.23, 0.2, 1.05, 0.95, 'NR', ''),
(200, 'Virgin Islands, British', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.5, 0.36, 1.05, 1, 'VB', ''),
(201, 'Northern Mariana Islands', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.22, 0.2, 1.04, 0.84, 'NM', ''),
(202, 'Liberia', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.29, 0.26, 1.03, 0.85, 'LB', ''),
(203, 'Saint Martin', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.22, 0.24, 1.02, 0.83, 'ST', ''),
(204, 'Uzbekistan', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.22, 0.21, 1.01, 0.91, 'UZ', ''),
(205, 'Cameroon', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.23, 0.22, 1.01, 0.83, 'CM', ''),
(206, 'Burundi', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.2, 0.17, 1.01, 0.81, 'BU', ''),
(207, 'Cambodia', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.68, 0.29, 1.01, 0.79, 'KH', ''),
(208, 'Netherlands Antilles', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.5, 0.39, 0.99, 0.98, 'NA', ''),
(209, 'Comoros', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.43, 0.35, 0.97, 0.83, 'CO', ''),
(210, 'Greenland', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.34, 0.25, 0.93, 0.7, 'GL', ''),
(211, 'Bermuda', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.36, 0.33, 0.92, 0.92, 'BE', ''),
(212, 'Isle Of Man', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.28, 0.26, 0.92, 0.86, 'IO', ''),
(213, 'Anguilla', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.28, 0.26, 0.9, 0.9, 'AN', ''),
(214, 'Tonga', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.3, 0.11, 0.83, 0.83, 'TG', ''),
(215, 'Timor-Leste', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.37, 0.3, 0.81, 0.72, 'TI', ''),
(216, 'Seychelles', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.24, 0.22, 0.76, 0.76, 'SC', ''),
(217, 'Lesotho', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.26, 0.26, 0.75, 0.5, 'LS', ''),
(218, 'Vietnam', 0.4, NULL, 1, '2015-02-12', '2015-02-12', 1, 1, 0.46, 0.22, 0.72, 0.72, 'VN', ''),
(219, 'Samoa', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.61, 0.5, 0, 0, 'SA', ''),
(220, 'Indonesia', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 1, 0.58, 0.23, 0.59, 0.59, 'ID', ''),
(221, 'Eritrea', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.5, 0.5, 0, 0, 'ER', ''),
(222, 'Falkland Islands (Malvinas)', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0, 0, 0.5, 0.5, 'FM', ''),
(223, 'Holy See (Vatican City State)', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0, 0, 0.5, 0.5, 'HS', ''),
(224, 'Kiribati', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.5, 0.5, 0, 0, 'KI', ''),
(225, 'Guinea-Bissau', 0, NULL, 1, '2015-03-03', '2015-03-03', 1, 1, 0.25, 0.24, 1, 0, 'Gb', '');

-- --------------------------------------------------------

--
-- Table structure for table `payoutype`
--

CREATE TABLE IF NOT EXISTS `payoutype` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nametype` text CHARACTER SET utf8,
  `date_creat` date DEFAULT NULL,
  `date_mod` date DEFAULT NULL,
  `status` int(100) DEFAULT '1',
  `id_user` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `payoutype`
--

INSERT INTO `payoutype` (`id`, `nametype`, `date_creat`, `date_mod`, `status`, `id_user`) VALUES
(1, 'Interstitial', '2015-02-10', '2015-02-10', 1, 1),
(2, 'Banner', '2015-02-10', '2015-02-10', 1, 1),
(3, 'PopAds', '2015-02-10', '2015-02-10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text,
  `gender` int(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `national` text,
  `passport` float DEFAULT NULL,
  `passport_exp` date DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `invoice_id` int(100) DEFAULT NULL,
  `primary_email` text,
  `secondary_email` text,
  `primary_pass` text,
  `visa_id` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='khach hang' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `name`, `gender`, `birthday`, `national`, `passport`, `passport_exp`, `user_id`, `invoice_id`, `primary_email`, `secondary_email`, `primary_pass`, `visa_id`) VALUES
(2, 'Hoang Phuc Test', 0, '2015-05-15', 'American', 43534500000, '2015-05-19', 1, 2, 'hoangphuc@gmail.com', 'hoangphuc123@gmail.com', '123', 3),
(3, 'jholj', 0, '2015-05-15', 'Armenia', 987880000000, '2015-05-21', NULL, 3, 'gjhjkjhhkhk@gmail.com', 'gjhjkjhhkhk56@gmail.com', '09', 4),
(4, 'Hoang Phuc Test', 0, '2015-05-14', 'American', 12332300, '2015-05-19', NULL, 4, 'paypal-notify@gmail.com', 'paypal-notify123@gmail.com', '123', 5),
(5, 'Hoang Phuc Test', 0, '2015-05-15', 'American', 2343430000, '2015-05-19', NULL, 5, 'hoangphiuc@gmail.com', 'hoangphiuc123@gmail.com', '123', 6),
(6, 'Hoang Phuc Test', 0, '2015-05-14', 'American', 3454350000000, '2015-05-19', NULL, 6, 'hosanasg@gmail.com', 'hosanas1212g@gmail.com', '123', 7),
(7, 'Hoang Cong Phuc', 0, '2015-05-15', 'American', 2.14212e17, '2015-05-19', NULL, 7, 'hoangphuc@gmail.com', 'hoangphuc1234@gmail.com', '12345', 8);

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `listcode` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `video_id` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_creat` date NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `sum_video` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pre_ads`
--

CREATE TABLE IF NOT EXISTS `pre_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ads` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `alias` text,
  `descripts` text,
  `detail_product` text,
  `cat_id` int(100) DEFAULT NULL,
  `new` int(100) DEFAULT NULL,
  `hot` int(100) DEFAULT NULL,
  `promotions` int(100) DEFAULT NULL COMMENT 'khuyen mai',
  `price` bigint(100) DEFAULT NULL COMMENT '$ 450000',
  `rating` bigint(100) DEFAULT '0' COMMENT 'toi da la 5 . 4 tren 5 la  80 phan tram',
  `availability` bigint(100) DEFAULT NULL COMMENT 'la so luong hang . neu con : instcok . het 0',
  `tag_id` bigint(100) DEFAULT NULL,
  `manufacturer_id` bigint(100) DEFAULT NULL,
  `date_creat` date DEFAULT NULL,
  `date_change` date DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `status` int(100) DEFAULT '0' COMMENT 'an hay hien san pham',
  `about_price` bigint(20) DEFAULT NULL COMMENT 'khoang gia ma chua gia cua san pham',
  `weekly_featured` int(100) DEFAULT NULL COMMENT 'co la san pham tieu bieu cua tuan khong',
  `featured_products` int(100) DEFAULT NULL,
  `new_products` int(100) DEFAULT NULL,
  `crowler` int(100) DEFAULT NULL,
  `sale_products` int(100) DEFAULT NULL,
  `most_viewed` int(100) DEFAULT NULL COMMENT 'la san pham duoc xem nhieu nhat hoac thuong xuyen',
  `lastest_products` int(100) DEFAULT NULL COMMENT 'la hang moi nhat , de hien thi cho chot LATEST PRODUCTS',
  `array_img` text,
  `img` text,
  `img0` text,
  `img1` text,
  `img2` text,
  `img3` text,
  `img4` text,
  `img5` text,
  `img6` text,
  `img7` text,
  `img8` text,
  `img9` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `alias`, `descripts`, `detail_product`, `cat_id`, `new`, `hot`, `promotions`, `price`, `rating`, `availability`, `tag_id`, `manufacturer_id`, `date_creat`, `date_change`, `user_id`, `status`, `about_price`, `weekly_featured`, `featured_products`, `new_products`, `crowler`, `sale_products`, `most_viewed`, `lastest_products`, `array_img`, `img`, `img0`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `img9`) VALUES
(1, 'Dušená šunka z kýty Naše Miroslav - poctivá šunka nejvyšší jakosti 100g', 'dušena-šunka-z-kyty-naše-miroslav-poctiva-šunka-nejvyšši-jakosti-100g', 'Prémiové šunky Naše Miroslav jsou výsledkem spolupráce mezi Sklizeno, agrodružstvem Miroslav a tradičním tišnovským řeznictvím Steinhauser s dvousetletou historií. Předností naší řady uzenin je mimořádně vysoký podíl masa, velmi nízký obsah soli a konzervačních látek. Dostáváte tedy do rukou výrobek s vysokým podílem ruční práce a chutí, kterou si zamilujete vy i vaše děti.', 'Složení: Vepřové maso 95 % hm.; pitná voda; dusitanová solící směs: jedlá sůl, konzervant: dusitan sodný; sacharóza; stabilizátory: trifosforečnany, difosforečnany; zahušťovadlo: guma Euchema; antioxidant: askorban sodný; aroma. Nejvyšší obsah tuku 6 % hm.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.\r\n\r\nVýživové údaje na 100 g výrobku\r\n\r\nŠunka nejvyšší jakosti (více jak 16 % čisté svalové bílkoviny).\r\n\r\nEnergetická hodnota 476 kJ (113 kcal)\r\n\r\ntuky / z toho nasycené mastné kyseliny 5,2 g / 1,7 g\r\n\r\nsacharidy / z toho cukry 0,6 g / < 0,5 g\r\n\r\nbílkoviny 19 g\r\n\r\nsůl 2,2 g', 36, 1, 0, 0, 43, NULL, 1, 24, NULL, '2015-07-17', '2015-07-17', NULL, 1, 43, 0, 0, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434170709.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Ariel Color Prací prostředek na barevné prádlo (20 praní) 1.4kg', 'ariel-color-praci-prostředek-na-barevne-pradlo-20-prani-1-4kg', 'Ariel Color prací prášek na barevné prádlo, zachová barvu i tvar praného prádla. Díky speciální ochraně udrží zářivé barvy vašeho oblečení po dlouhou dobu. Proniká do hloubky vláken a perfektně odstraňuje nečistoty. Vaše oděvy budou svěží a hebké.', '15–30% aniontové povrchově aktivní látky <5% neiontové povrchově aktivní látky, fosfonáty, polykarboxyláty, zeolity Enzymy Parfémy', 43, 1, 1, 33, 17, NULL, 0, 25, NULL, '2015-07-14', '2015-07-14', NULL, 1, 0, 0, NULL, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434171800.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Templar Chardonnay 0,7 l', 'templar-chardonnay-0-7-l', 'Nejznámější světová odrůda bílého vína, vysoké kvality s typickou vůní a chutí. Aroma exotického ovoce, chuť a vůně lískových nebo vlašských ořechů je zvýrazněna zráním v sudu, které učinilo toto víno sametově plným. Toto víno je mimořádně vhodné k mořským specialitám, minutkovým masům a jemným sýrům.', 'Složení: víno\r\n\r\nAlergeny: Oxid siřičitý a siřičitany', 39, 1, 0, 0, 0, NULL, 0, 25, NULL, '2015-07-16', '2015-07-16', NULL, 1, 0, 0, 0, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434175845.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Himálajská sůl bylinková 150g', 'himalajska-sůl-bylinkova-150g', 'Jemná směs z kvalitních surovin vhodná i pro nejmenší. Výborné do salátů, polévek, na špagety, na chleba s máslem ale i do omáček. Bylinkovou solí ochuťte jídlo buď po uvaření, anebo přímo na talíři těsně před jídlem.', 'Kamenná sůl v ryze panenské podobě, bazalka*, kopr*, dobromysl*, estragon*, libeček*, pažitka*, petržel*, tymián*, yzop* *Produkt kontrolovaného ekologického zemědělství.', 46, 1, 0, 0, 0, NULL, 0, 25, NULL, '2015-06-13', '2015-06-13', NULL, 1, 0, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434176516.jpg', NULL, 'thumb_1434176516.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '  Hamé Hamánek meruňkový bez přidaného cukru 180g', 'hame-hamanek-meruňkovy-bez-přidaneho-cukru-180g', '', 'Složení: Složení: jablečná dřeň (62 % hm.), voda, meruňková dřeň (20 %), zahušťovadlo: kukuřičný modifikovaný škrob, antioxidant: kyselina askorbová.\r\n\r\nAlergeny: Neuvádí se', 44, 1, 0, 0, 0, NULL, 0, 25, NULL, '2015-06-13', '2015-06-13', NULL, 1, 0, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434176681.jpg', NULL, 'thumb_1434176681.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '  Mikado směs hub Nameko 0.53kg', 'mikado-směs-hub-nameko-0-53kg', 'Směs marinovaných hub Nameko', 'Složení: houby Nameko (phollota nameko), voda, ocet, cukr, česnek, sul, směs kořenín, kyselina citrónová, E 330, E302, E621 aroma\r\n\r\nAlergeny: Neuvádí se', 44, 1, 0, 0, 0, NULL, 0, 25, NULL, '2015-06-13', '2015-06-13', NULL, 1, 0, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434176776.jpg', NULL, 'thumb_1434176776.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Lifebar VITA tyčinka kokosová BIO 47g', 'lifebar-vita-tyčinka-kokosova-bio-47g', 'Energy tyčinky dodají našemu tělu potřebnou energii kdekoliv a kdykoliv. Ať už jsme na cestě do školy, kanceláře nebo před sportovním utkáním. Jsou vyráběny pouze z těch nejkvalitnějších surovin a obsahují širokou škálu vitamínů, minerálů a esenciálních živin. Neobsahuje rafinovaný cukr, slad, umělé sladidla, extrudáty, škroby, ztužené tuky a ani lepek. Tyčinky jsou slazené pouze sušeným ovocem a jsou vyráběné za studena při teplotě nepřesahující 40C.', 'datle bio, kokos bio (17%), mandle bio, raw kešu oříšky bio, panenský kokosový olej bio.', 33, 1, 0, 0, 35, NULL, 1, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 35, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434177637.jpg', NULL, 'thumb_1434177637.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Flevox Antiparazitní Spot on Dog a.u.v. XL 402ml', 'flevox-antiparazitni-spot-on-dog-a-u-v-xl-402ml', 'Flevox Spot-on pro velmi velké psy. 402 mg roztok pro nakapání na kůži. Ektoparazitika k topickému použití včetně insekticidů. Složí jako prevence a léčba při napadení blechami a všenkou psí, potlačení alergie na bleší kousnutí. Před použitím čtěte příbalovou informaci. Pouze pro zvířata. Vyhrazený veterinární léčivý přípravek.', 'Fipronilum 402 mg, Butylhydroxyanisol (E320) 1,608 mg, Butylhydroxytoluen (E321) 0,804 mg. indikace nebo použití (parafarm.)', 44, 1, 0, 23, 269, NULL, 2, 34, NULL, '2015-06-13', '2015-06-13', NULL, 1, 269, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434177708.jpg', NULL, 'thumb_1434177708.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Čerstvá farmářská vejce z podestýlky L 10ks', 'čerstva-farmařska-vejce-z-podestylky-l-10ks', 'Farmářská vejce. Kódové označení původu vejce 2CZ L.', 'Velikost L, kód 2, z farmy Bohemia Vitae Radouňka, dodáváme do 7 dnů od snášky.', 33, 1, 0, 0, 69, NULL, 1, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 69, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434179621.jpg', NULL, 'thumb_1434179621.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Kuřecí prsní řízky RACIOLA 349g', 'kuřeci-prsni-řizky-raciola-349g', 'RACIOLA se řadí mezi podniky střední velikosti, která zpracovává výhradně vlastní drůbež, tedy 100% moravskou drůbež, která vyrostla výhradně doma a byla krmena pouze krmivem, které produkuje některá ze sesterských firem. Do krmiva se nepouživají se žádné látky urychlující růst a chlazení je v moderním systému bez vody. Raciola se na trhu etabluje jako výrobce s vyšší přidanou hodnotou a nadstandardní kvalitou.', 'Kuřecí prsní řízky od firmy Raciola.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 33, 1, 0, 0, 72, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 72, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434179742.jpg', NULL, 'thumb_1434179742.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Mléko selské plnotučné 1l', 'mleko-selske-plnotučne-1l', 'Ježkův statek. Tváří Ježkova statku je David Vortel, který o svých produktech prozradil toto: "Jogurty, tvarohy, máslo a zákysy vyrábíme v naší výrobně se stoletou tradicí: Sýrárně bratří Brunnerů v Jarošově nad Nežárkou. Ovoce, zeleninu a obilí zpracováváme ve výrobně v Kamenici nad Lipou. Zde mimo jiné vyrábíme vlastní ovocné džemy do jogurtů. Mléko a smetanu pasterujeme v Mlékárně Polná, poptávka po našem mléce v současnosti daleko převyšuje kapacity jarošovské Sýrárny".', 'Mléko je ošetřeno pouze šetrnou pasterací (75 °C po dobu 25 vteřin), jinak ošetřeno není. Zachovává si tak svou chuť i obsah všech minerálů a vitamínů, min. 3,6% tuku.', 33, 1, 0, 0, 32, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 32, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434180080.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Čerstvé máslo ručně krájené cca 200g', 'čerstve-maslo-ručně-krajene-cca-200g', 'Ježkův statek. Tváří Ježkova statku je David Vortel, který o svých produktech prozradil toto: "Jogurty, tvarohy, máslo a zákysy vyrábíme v naší výrobně se stoletou tradicí: Sýrárně bratří Brunnerů v Jarošově nad Nežárkou. Zde mimo jiné vyrábíme vlastní ovocné džemy do jogurtů. Mléko a smetanu pasterujeme v Mlékárně Polná, poptávka po našem mléce v současnosti daleko převyšuje kapacity jarošovské Sýrárny".', 'Vyrobené z čerstvé pasterované smetany, každý týden čerstvě stloukané, min. 82% tuku. Máslo ručně krájíme- a balíme do speciálního papíru.Složení: smetana, mlékárenské kultury.\r\n\r\nAby si výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny bez konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových mléčných výrobků.\r\n\r\nAlergeny: laktóza', 33, 1, 0, 0, 52, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 52, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434180177.jpg', NULL, 'thumb_1434180177.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Vejce volný chov 10ks', 'vejce-volny-chov-10ks', 'Farma Bělá. Hospodářství se nachází na Vysočině blízko Havlíčkova Brodu v nadmořské výšce kolem 550 metrů a jedná se o ryze rodinnou činnost v režimu tzv. "prodeje ze dvora". Slepice jsou chovány na volném prostoru, tedy s kódem 1. Krmeny jsou obilím, vařenými bramborami, celým obilím i šrotem. Tomu odpovídají námi nabízená vajíčka, především v barvě žloutku je patrný rozdíl. Vejce jsou velikostně netříděná. Kód vejce 1CZ.', 'Česká vejce z volného chovu (1). Mix různých velikostí. Plato 10ks, cena za baleni.', 33, 1, 0, 0, 84, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 84, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434180427.jpg', NULL, 'thumb_1434180427.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Banán Bio cca 140g', 'banan-bio-cca-140g', 'Nejoblíbenější tropické ovoce nejen u nás. Banány obsahují tryptofan, aminokyselinu přeměňující se v těle na serotonin, který je znám svým relaxačním a náladu zlepšujícím účinkem.', '', 33, 1, 0, 0, 15, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 15, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434180514.jpg', NULL, 'thumb_1434180514.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Krůtí prsa od českého farmáře 320g', 'krůti-prsa-od-českeho-farmaře-320g', 'Společnost Zelenka s.r.o. je rodinný podnik založený v roce 1994. Specializuje se na odchov a výkrm krůt, jejich zpracování a prodej krůtího masa. Krůty jsou chovány na čtyřech moravských farmách od vylíhnutí až do jateční hmotnosti. Péče je také věnována pohodě zvířat. Pokud jsou tyto dva hlavní faktory - zdraví a pohoda v pořádku, krůty dobře přirůstají. Neméně důležité je krmivo. Během výkrmu se postupně vystřídá šest krmných směsí s vyrovnaným obsahem bílkovin a energie, připravených podle vlastních receptur. Základními komponentami jsou kukuřice, pšenice a sója, krmivy živočišného původu se nekrmí, hormony a jiné růstové stimulátory se nepoužívají.', 'Aby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 33, 1, 0, 0, 105, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 105, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434180606.jpg', NULL, 'thumb_1434180606.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Dětská medová šunka nejvyšší jakosti - Naše Miroslav 100g', 'dětska-medova-šunka-nejvyšši-jakosti-naše-miroslav-100g', 'Šunka nejvyšší jakosti (obsah svalové bílkoviny více jak 16 %). Určeno pro děti od 3 let věku.', 'Vepřové maso 88 % hm.; pitná voda; dusitanová solící směs: jedlá sůl, konzervant: dusitan sodný; akátový med 2 % hm.; cukry; stabilizátory: trifosforečnany, difosforečnany; zahušťovadlo: guma Euchema; antioxidant: askorbát sodný; aroma.', 33, 1, 0, 0, 33, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 33, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434180690.jpg', NULL, 'thumb_1434180690.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Relax 100% ananasový džus', 'relax-100-ananasovy-džus', '100%ní ananasová šťáva vyrobená z ananasového koncentrátu, s dužninou. Pasterizováno.', 'Složení: šťáva z ananasového koncentrátu (100%), ananasová dužnina\r\n\r\nAlergeny: Neuvádí se', 39, 1, 0, 12, 30, NULL, 2, 25, NULL, '2015-07-16', '2015-07-16', NULL, 1, 30, 0, 0, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434180735.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Krůtí spodní stehno od českého farmáře 360g', 'krůti-spodni-stehno-od-českeho-farmaře-360g', 'Společnost Zelenka s.r.o. je rodinný podnik založený v roce 1994. Specializuje se na odchov a výkrm krůt, jejich zpracování a prodej krůtího masa. Krůty jsou chovány na čtyřech moravských farmách od vylíhnutí až do jateční hmotnosti. Péče je také věnována pohodě zvířat. Pokud jsou tyto dva hlavní faktory - zdraví a pohoda v pořádku, krůty dobře přirůstají. Neméně důležité je krmivo. Během výkrmu se postupně vystřídá šest krmných směsí s vyrovnaným obsahem bílkovin a energie, připravených podle vlastních receptur. Základními komponentami jsou kukuřice, pšenice a sója, krmivy živočišného původu se nekrmí, hormony a jiné růstové stimulátory se nepoužívají.', 'Aby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 33, 1, 0, 0, 42, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 42, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434181112.jpg', NULL, 'thumb_1434181112.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Hovězí bio mleté maso od českého farmáře 500g', 'hovězi-bio-mlete-maso-od-českeho-farmaře-500g', 'ECOPRODUCT je malá, ale dynamická společnost rodinného typu, opírající se o zázemí vlastní biofarmy. "Celý proces výroby masa, od nákupu živého dobytka, po konečný prodej zákazníkům je zcela v našich rukou, takže můžeme garantovat nejvyšší kvalitu zboží. Klademe velký důraz na výběr jednotlivých kusů dobytka a maximálně dbáme o citlivé a humánní zacházení se zvířaty, jak během přepravy, tak během porážky. Zvířata se před porážkou nechávají uklidnit, takže hladina stresových hormonů v mase není zvýšená jako u konvenčního hovězího a maso je proto měkčí a zdravější. Maso necháváme vyzrát minimálně 14 dní zavěšené v půlích v chladících boxech při teplotě blízké nule stupňů Celsia. Výraznější vůně masa a nazelenalá barva šťávy (nikoliv masa) nejsou známky zkaženosti, ale průvodní jevy vyzrálosti," vysvětlují farmáři.', 'Hovězí mleté maso. Vakuově baleno od firmy Ecoproduct.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 33, 1, 0, 0, 99, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 99, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434181194.jpg', NULL, 'thumb_1434181194.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Krůtí plátek od českého farmáře 360g', 'krůti-platek-od-českeho-farmaře-360g', 'Společnost Zelenka s.r.o. je rodinný podnik založený v roce 1994. Specializuje se na odchov a výkrm krůt, jejich zpracování a prodej krůtího masa. Krůty jsou chovány na čtyřech moravských farmách od vylíhnutí až do jateční hmotnosti. Péče je také věnována pohodě zvířat. Pokud jsou tyto dva hlavní faktory - zdraví a pohoda v pořádku, krůty dobře přirůstají. Neméně důležité je krmivo. Během výkrmu se postupně vystřídá šest krmných směsí s vyrovnaným obsahem bílkovin a energie, připravených podle vlastních receptur. Základními komponentami jsou kukuřice, pšenice a sója, krmivy živočišného původu se nekrmí, hormony a jiné růstové stimulátory se nepoužívají.', 'Maso z krůtího horního stehna. Vakuově baleno.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 33, 1, 0, 0, 88, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 88, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434181277.jpg', NULL, 'thumb_1434181277.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Gouda 48% BIO - plátky 100g', 'gouda-48-bio-platky-100g', 'Bio gouda Amálka 48% se řadí mezi přírodní polotvrdé sýry holandského typu s typicky zlatavě žlutou barvou a kompaktní konzistencí sem tam protknutou otvorem. Její chuť je máslově výrazná s výraznou sýrovou vůní. Tento sýr je vyráběn z prvotřídního bio mléka pocházejícího z pečlivě vybíraných českých farem. Je připravován tradičním poctivým způsobem s vysokým podílem ruční práce.', 'Sýr polotvrdý s obsahem tuku v sušině 48% Pasterované mléko (produkt z ekologického zemědělství), mléčné kultury, mikrob.\r\n\r\nSložení: mlékárensky ošetřené kravské mléko (dle ČSN 57 0599), jedlá sůl (max. 2%), chlorid vápenatý, mlékárenské kultury, syřidlo, barvivo annatto ( 48% tuku v sušině, 55% sušiny).\r\n\r\nAlergeny: Mléko a výrobky něj', 33, 1, 0, 0, 32, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 32, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434181366.jpg', NULL, 'thumb_1434181366.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Jogurt farmářský bílý 190g', 'jogurt-farmařsky-bily-190g', 'Ježkův statek. Tváří Ježkova statku je David Vortel, který o svých produktech prozradil toto: "Jogurty, tvarohy, máslo a zákysy vyrábíme v naší výrobně se stoletou tradicí: Sýrárně bratří Brunnerů v Jarošově nad Nežárkou. Zde mimo jiné vyrábíme vlastní ovocné džemy do jogurtů. Mléko a smetanu pasterujeme v Mlékárně Polná, poptávka po našem mléce v současnosti daleko převyšuje kapacity jarošovské Sýrárny".', 'Plnotučný jogurt, vyrobený z kravského plnotučného mléka, obsahuje živé jogurtové kutury, obsah tuku 4,1%.Složení: mléko, mlékárenské kultury.\r\n\r\nAby si výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny bez konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových mléčných výrobků.\r\n\r\nAlergeny: laktóza', 33, 1, 0, 0, 25, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 25, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434181647.jpg', NULL, 'thumb_1434181647.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Eidam 30% BIO - plátky 100g', 'eidam-30-bio-platky-100g', 'Bio eidam Amálka 30% se řadí mezi přírodní polotvrdé sýry holandského typu s typicky smetanově žlutou barvou a kompaktní konzistencí. Její chuť je lehce nasládlá s typicky smetanovými plnými podtóny.', 'Pasterované mléko (ekologické zemědělství), mléčné kultury, mikrob. syřidlo, jedlá sůl max. 2%, 30 % tuku v sušině, 50% sušiny.\r\n\r\nAlergeny: Mléko a výrobky něj', 33, 1, 0, 0, 30, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 30, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434181818.jpg', NULL, 'thumb_1434181818.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Jogurt farmářský jahodový 190g', 'jogurt-farmařsky-jahodovy-190g', 'Ježkův statek. Tváří Ježkova statku je David Vortel, který o svých produktech prozradil toto: "Jogurty, tvarohy, máslo a zákysy vyrábíme v naší výrobně se stoletou tradicí: Sýrárně bratří Brunnerů v Jarošově nad Nežárkou. Ovoce, zeleninu a obilí zpracováváme ve výrobně v Kamenici nad Lipou. Zde mimo jiné vyrábíme vlastní ovocné džemy do jogurtů. Mléko a smetanu pasterujeme v Mlékárně Polná, poptávka po našem mléce v současnosti daleko převyšuje kapacity jarošovské Sýrárny".', 'Plnotučný jogurt, vyrobený z kravského plnotučného mléka, obsahuje živé jogurtové kutury, obsah tuku 4,1%. Ochucený jahodovým džemem vlastní výroby.Složení: mléko, mlékárenské kultury, džem 15% (jahody 50%, cukr, jablečný pektin, kyselina citrónová)\r\n\r\nAby si výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny bez konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových mléčných výrobků.\r\n\r\nAlergeny: laktóza', 33, 1, 0, 0, 0, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 0, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434181960.jpg', NULL, 'thumb_1434181960.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Anglická slanina od českého farmáře 178g', 'anglicka-slanina-od-českeho-farmaře-178g', 'Maso pochází z našeho vlastního kontrolovaného chovu, poráženo je lokálně bez dlouhého transportu a stresu zvířat, a jeho zpracování probíhá v rodinném řeznictví Strejček v Brně. Za doložený, tedy 100 % moravský, původ masa a receptur ručí Sklizeno, stejně jako za prémiovou kvalitu všech produktů s maximálním obsahem masa a minimem aditiv.', 'Tepelně opracovaný masný výrobek\r\n\r\nSložení: vepřové maso 95%, voda, DSS, stabilizátory: difosfáty, trifosfáty, zahušťovadlo: guma euchema, cukr, antioxidant: askorban sodný, aroma, extrakty koření, kuller.\r\n\r\nSůl max. 1,8 %\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.\r\n\r\nVyrobeno dle PN STR O92.\r\n\r\nBaleno vakuově, obal kom. Odpad.\r\n\r\nPo rozbalení spotřebujte do 48 hodin\r\n\r\nPovolená hmotnostní odchylka + / – 3 %\r\n\r\nSkladujte 0 – 4°C', 33, 1, 0, 0, 63, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 63, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434182097.jpg', NULL, 'thumb_1434182097.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Kuřecí polévková směs RACIOLA 242g', 'kuřeci-polevkova-směs-raciola-242g', 'RACIOLA se řadí mezi podniky střední velikosti, která zpracovává výhradně vlastní drůbež, tedy 100% moravskou drůbež, která vyrostla výhradně doma a byla krmena pouze krmivem, které produkuje některá ze sesterských firem. Do krmiva se nepouživají se žádné látky urychlující růst a chlazení je v moderním systému bez vody. Raciola se na trhu etabluje jako výrobce s vyšší přidanou hodnotou a nadstandardní kvalitou.', 'Chlazená kuřecí polévková směs. Obsahuje skelet kuřete, tedy kostru s kůží. Balena ve vaničce s atmosférou. Od firmy Raciola.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 33, 1, 0, 0, 17, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 17, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434182204.jpg', NULL, 'thumb_1434182204.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Cibule žlutá Bio 1ks cca 90g', 'cibule-žluta-bio-1ks-cca-90g', 'Je opravdovou zásobárnou životně důležitých látek. Od nepaměti se používá v lidové medicíně k redukci vysokého krevního tlaku a má také dezinfekční a antibiotické účinky.', '', 33, 1, 0, 0, 7, NULL, 0, 24, NULL, '2015-06-23', '2015-06-23', NULL, 1, 7, 1, 1, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434182350.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Láznička bramborový knedlík plněný uzenou vepřovou kýtou 300g 2ks', 'laznička-bramborovy-knedlik-plněny-uzenou-vepřovou-kytou-300g-2ks', 'Balení 2 ks á 150g, určeno k přímé konzumaci se zelím a/nebo cibulkou po ohřátí cca 7 minut', 'brambory, pšeničná krupice, uzená vepřová kýta, voda, vejce, sůl\r\n\r\nAlergeny: lepek, vejce', 40, 1, 1, 0, 55, NULL, 0, 24, NULL, '2015-07-16', '2015-07-16', NULL, 1, 55, 1, 1, 1, 1, 1, NULL, NULL, NULL, 'thumb_1434182540.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Van Houten čokoláda passion 0.75kg', 'van-houten-čokolada-passion-0-75kg', 'Instantní směs pro přípravu výborného čokoládového nápoje italského stylu s obsahem kakaa 33%. Nápoj připravený ze směsi Van Houten Passion Vám přiblíží svou silnou chutí a tmavou barvou nápoje italských kaváren. Možnost přípravy nápoje je rozmícháním do vody nebo do mléka. Z balení připravíte až 35 porcí horké čokolády. Vhodné pro profesionální přípravu ve vendingových přístrojích i pro ruční přípravu', 'Složení: cukr, kakaový prášek se sníženým obsahem tuku (33%), sušená SYROVÁTKA, zahušťovadlo (E415), protispékavá látka (E341) a aroma\r\nAlergeny: Mléko a výrobky z něj (včetně laktózy)', 42, 1, 0, 45, 269, NULL, 3, 0, NULL, '2015-07-16', '2015-07-16', NULL, 1, 269, 1, 0, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434182612.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Hovezí šunka z kýty nejvyšší jakosti - Naše Miroslav 80g', 'hovezi-šunka-z-kyty-nejvyšši-jakosti-naše-miroslav-80g', 'Prémiové šunky Naše Miroslav jsou výsledkem spolupráce mezi Sklizeno, agrodružstvem Miroslav a tradičním tišnovským řeznictvím Steinhauser s dvousetletou historií. Předností naší řady uzenin je mimořádně vysoký podíl masa, velmi nízký obsah soli a konzervačních látek. Dostáváte tedy do rukou výrobek s vysokým podílem ruční práce a chutí, kterou si zamilujete vy i vaše děti.', 'Složení: Hovězí maso 91 % hm.; pitná voda; dusitanová solící směs: jedlá sůl, konzervant: dusitanová solící směs; koření: černý pepř; zahušťovadlo: guma Euchema; stabilizátory: trifosforečnany, difosforečnany; aroma; cukr; antioxidant: askorban sodný. Nejvyšší obsah tuku 5,3 % hm.\r\n\r\nŠunka nejvyšší jakosti (více jak 16 % čisté svalové bílkoviny)\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.\r\n\r\nVýživové údaje na 100 g výrobku\r\n\r\nenergetická hodnota 469 kJ (112 kcal)\r\n\r\ntuky / z toho nasycené mastné kyseliny 3,8 g / 1,7 g\r\n\r\nsacharidy / z toho cukry < 0,5 g / < 0,5 g\r\n\r\nbílkoviny 19 g\r\n\r\nsůl 2,1 g', 37, 1, 0, 0, 49, NULL, 0, 24, NULL, '2015-07-16', '2015-07-16', NULL, 1, 49, 1, 0, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434182635.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Láznička borůvkový knedlík 200g 3ks', 'laznička-borůvkovy-knedlik-200g-3ks', 'Lahodný knedlík od Lázničky plněný borůvkami. Nejlépe podávat s cukrem a rozteklým máslem.', '', 41, 1, 0, 0, 60, NULL, 0, 24, NULL, '2015-07-15', '2015-07-15', NULL, 1, 60, 0, 0, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434182733.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Kuřecí stehenní řízky RACIOLA 445g', 'kuřeci-stehenni-řizky-raciola-445g', 'RACIOLA se řadí mezi podniky střední velikosti, která zpracovává výhradně vlastní drůbež, tedy 100% moravskou drůbež, která vyrostla výhradně doma a byla krmena pouze krmivem, které produkuje některá ze sesterských firem. Do krmiva se nepouživají se žádné látky urychlující růst a chlazení je v moderním systému bez vody. Raciola se na trhu etabluje jako výrobce s vyšší přidanou hodnotou a nadstandardní kvalitou.', 'Chlazené kuřecí stehenní řízky bez kůže. Baleno ve vaničce s atmosférou od firmy Raciola.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 40, 1, 1, 0, 83, NULL, 0, 24, NULL, '2015-07-17', '2015-07-17', NULL, 1, 83, 1, 1, 1, 1, 1, NULL, NULL, NULL, 'thumb_1434182917.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Tvarohová česneková pomazánka 150g', 'tvarohova-česnekova-pomazanka-150g', 'Pomazánku vyrábíme z našeho tvarohu a čerstvého česneku. Díky čerstvému česneku voní i chutná tak, jak má.', 'plnotučný tvaroh (mléko, mlékárenské kultury), 15% zeleninová složka (česnek, cibule, sůl). Alergen: laktóza', 38, 1, 0, 0, 35, NULL, 0, 24, NULL, '2015-07-15', '2015-07-15', NULL, 1, 35, 0, 0, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434183058.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Vepřová krkovička od českého farmáře 436g', 'vepřova-krkovička-od-českeho-farmaře-436g', 'Ideální maso na grill nebo řízky, díky prorostlému tuku si zachová šťavnatost a aroma. Maso pochází z našeho vlastního kontrolovaného chovu, poráženo je lokálně bez dlouhého transportu a stresu zvířat, a jeho zpracování probíhá v rodinném řeznictví Strejček v Brně. Za doložený, tedy 100 % moravský, původ masa a receptur ručí Sklizeno, stejně jako za prémiovou kvalitu všech produktů s maximálním obsahem masa a minimem aditiv.', 'Farmářská vepřová krkovička bez kosti (plátky) – 100% moravský čuník. Vepřové maso – výsekové, vakuově balené. Trvanlivost u masa bez kosti 6 dní, u masa s kosti (žebra) 5 dní.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 38, 0, 0, 0, 81, NULL, 0, 24, NULL, '2015-07-15', '2015-07-15', NULL, 1, 81, 1, 1, 1, 1, 1, NULL, NULL, NULL, 'thumb_1434183149.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Miroslavské špekáčky 166g', 'miroslavske-špekačky-166g', '2 ks špekáčků. Maso pochází z našeho vlastního kontrolovaného chovu, poráženo je lokálně bez dlouhého transportu a stresu zvířat, a jeho zpracování probíhá v rodinném řeznictví Strejček v Brně. Za doložený, tedy 100 % moravský, původ masa a receptur ručí Sklizeno, stejně jako za prémiovou kvalitu všech produktů s maximálním obsahem masa a minimem aditiv. Špekáčky jak mají být, s vysokým podílem vepřového a hovězího masa, v létě na opékání a v zimě na gril nebo naložit utopence.', 'Tepelně opracovaný masný výrobek. Hovězí maso 60%, vepřové\r\n\r\nmaso 15%, voda, sádlo, DSS, antioxidant:e­rythorban sod­ný,\r\n\r\nextrakty koření, paprika sladká, stabilizátor:tri­fosforečnan,\r\n\r\nantioxidant: glukonolakton. Tuk max. 40 %, sůl max. 1,8 %\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků. Po rozbalení spotřebujte do 48 hodin', 37, 0, 1, 0, 44, NULL, 0, 24, NULL, '2015-07-15', '2015-07-15', NULL, 1, 44, 1, 1, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434183305.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Okurky salátové Bio', 'okurky-salatove-bio', 'Neobsahuje téměř žádné kalorie, protože většinu okurky tvoří voda, je proto vhodná při dietách a půstech. Okurková voda se prodává v drogériích k ozdravení vlasové pokožky a vlasů samotných.', '', 40, 0, 0, 0, 24, NULL, 0, 24, NULL, '2015-07-15', '2015-07-15', NULL, 1, 24, 1, 1, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434183477.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Sebamed Baby Pěna do koupele 200ml', 'sebamed-baby-pěna-do-koupele-200ml', 'Jemná pokožka novorozence postrádá přirozený ochranný kyselý plášť. Pouze pokožka s hodnotou pH 5,5 je schopna se bránit proti působení patogenních mikroorganismů a škodlivých vlivů okolního prostředí. Baby sebamed s hodnotou pH 5,5 má speciální složení, které posiluje odolnost dětské pokožky.', 'Aqua Sodium laureth-6 carboxylate Cocamidopropyl betaine Disodium cocoamphodiacetate Laureth-2 Sodium C14–16 olefin sulfonate Polysorbate 20 Chamomilla recutita extract Sodium lactate PEG-150 Distearate Alcohol Parfum Sodium benzoate Phenoxyethanol', 42, 1, 1, 35, 169, NULL, 3, 25, NULL, '2015-07-15', '2015-07-15', NULL, 1, 169, 1, 1, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434183522.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Kuřecí křidýlka RACIOLA 356g', 'kuřeci-křidylka-raciola-356g', 'RACIOLA se řadí mezi podniky střední velikosti, která zpracovává výhradně vlastní drůbež, tedy 100% moravskou drůbež, která vyrostla výhradně doma a byla krmena pouze krmivem, které produkuje některá ze sesterských firem. Do krmiva se nepouživají se žádné látky urychlující růst a chlazení je v moderním systému bez vody. Raciola se na trhu etabluje jako výrobce s vyšší přidanou hodnotou a nadstandardní kvalitou.', 'Chlazená kuřecí křidýlka. Balena ve vaničce s atmosférou. Od firmy Raciola.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 36, 1, 0, 0, 27, NULL, 0, 24, NULL, '2015-07-15', '2015-07-15', NULL, 1, 27, 1, 1, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434183624.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Tvarohová pomazánka Budapešť 150g', 'tvarohova-pomazanka-budapešť-150g', 'Pomazánku vyrábíme z našeho tvarohu a čerstvé zeleniny. Protože používáme čerstvou zeleninu, naše pomazánka chutná – s křupavou cibulkou a sladkou paprikou - stejně jako ta domácí.', 'plnotučný tvaroh (mléko, mlékárenské kultury), 15% zeleninová složka (cibule, paprika, koření, sůl). Alergen: laktóza', 36, 1, 0, 0, 35, NULL, 0, 24, NULL, '2015-07-15', '2015-07-15', NULL, 1, 35, 1, 1, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434183743.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Kuřecí spodní stehna RACIOLA 367g', 'kuřeci-spodni-stehna-raciola-367g', 'RACIOLA se řadí mezi podniky střední velikosti, která zpracovává výhradně vlastní drůbež, tedy 100% moravskou drůbež, která vyrostla výhradně doma a byla krmena pouze krmivem, které produkuje některá ze sesterských firem. Do krmiva se nepouživají se žádné látky urychlující růst a chlazení je v moderním systému bez vody. Raciola se na trhu etabluje jako výrobce s vyšší přidanou hodnotou a nadstandardní kvalitou.', 'Chlazená kuřecí spodní stehna. Baleno ve vaničce s atmosférou. Od firmy Raciola.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 36, 1, 0, -1, 39, NULL, 0, 24, NULL, '2015-07-15', '2015-07-15', NULL, 1, 39, 1, 1, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434183866.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Hawkshead Relish Steaková omáčka 230ml', 'hawkshead-relish-steakova-omačka-230ml', 'Vynikající omáčka, kterou není třeba šetřit. Je vhodná na steak, slaninu i grilované klobásky. Lze ji využít i jako marinádu, ale její použití je neomezené.', 'Cukr, bílý vinný ocet, rajčatové pyré, omáčka Hawkshead Relish, sója, kukuřičná mouka, čerstvý křen, uzená sůl, uzená paprika, kayenský pepř. Bezlepkový produkt.', 45, 1, 0, 30, 119, NULL, 4, 25, NULL, '2015-06-23', '2015-06-23', NULL, 1, 119, 1, 1, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434183918.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Žebra/spareribs od českého farmáře 460g', 'žebra-spareribs-od-českeho-farmaře-460g', 'Vhodná hlavně k pečení a grilování, ale i na polévku. Maso pochází z našeho vlastního kontrolovaného chovu, poráženo je lokálně bez dlouhého transportu a stresu zvířat, a jeho zpracování probíhá v rodinném řeznictví Strejček v Brně. Za doložený, tedy 100 % moravský, původ masa a receptur ručí Sklizeno, stejně jako za prémiovou kvalitu všech produktů s maximálním obsahem masa a minimem aditiv.', 'Luxusní vepřová žebra – 100% moravský čuník. Vepřové maso – výsekové, vakuově balené.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 33, 0, 0, 0, 74, NULL, 0, 24, NULL, '2015-06-23', '2015-06-23', NULL, 1, 74, 1, 1, 0, NULL, 0, NULL, NULL, NULL, 'thumb_1434184080.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Kuře RACIOLA třídy A 1.387kg', 'kuře-raciola-třidy-a-1-387kg', 'RACIOLA se řadí mezi podniky střední velikosti, která zpracovává výhradně vlastní drůbež, tedy 100% moravskou drůbež, která vyrostla výhradně doma a byla krmena pouze krmivem, které produkuje některá ze sesterských firem. Do krmiva se nepouživají se žádné látky urychlující růst a chlazení je v moderním systému bez vody. Raciola se na trhu etabluje jako výrobce s vyšší přidanou hodnotou a nadstandardní kvalitou.', 'Celé kuře třídy A chlazené. Vakuově balené od firmy Raciola.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 36, 0, 0, 0, 119, NULL, 0, 24, NULL, '2015-07-15', '2015-07-15', NULL, 1, 119, 1, 1, 0, 1, 0, NULL, NULL, NULL, 'thumb_1434184306.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Řečkovická uherská klobása od českého farmáře 198g', 'řečkovicka-uherska-klobasa-od-českeho-farmaře-198g', 'Maso pochází z našeho vlastního kontrolovaného chovu, poráženo je lokálně bez dlouhého transportu a stresu zvířat, a jeho zpracování probíhá v rodinném řeznictví Strejček v Brně. Za doložený, tedy 100 % moravský, původ masa a receptur ručí Sklizeno, stejně jako za prémiovou kvalitu všech produktů s maximálním obsahem masa a minimem aditiv.', 'Na 100g hotového výrobku bylo použito 129g masa, vepřové maso 129% hm, dextróza, koření, pepř bílý, černý, muškátový květ, látky zvýrazňující chuť a vůni E 635, aroma, kvasničný extrakt, antioxidant E 316, mouka hořčičná, kyselina askorbová, karmína.\r\n\r\nTuk max. 50 %, sůl max. 1,8 %\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.\r\n\r\nBaleno vakuově, obal kom. Odpad.\r\n\r\nPo rozbalení spotřebujte do 48 hodin\r\n\r\nPovolená hmotnostní odchylka + / – 3 %\r\n\r\nSkladujte 0 – 4°C', 33, 1, 0, 0, 58, NULL, 0, 24, NULL, '2015-06-13', '2015-06-13', NULL, 1, 58, 0, 0, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434184502.jpg', NULL, 'thumb_1434184502.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'Čerstvá smetana plnotučná 250ml', 'čerstva-smetana-plnotučna-250ml', 'Ježkův statek. Tváří Ježkova statku je David Vortel, který o svých produktech prozradil toto: "Jogurty, tvarohy, máslo a zákysy vyrábíme v naší výrobně se stoletou tradicí: Sýrárně bratří Brunnerů v Jarošově nad Nežárkou.Ovoce, zeleninu a obilí zpracováváme ve výrobně v Kamenici nad Lipou. Zde mimo jiné vyrábíme vlastní ovocné džemy do jogurtů. Mléko a smetanu pasterujeme v Mlékárně Polná, poptávka po našem mléce v současnosti daleko převyšuje kapacity jarošovské Sýrárny".', 'Smetana je pouze pasterována, není v ní nijak upravován obsah tuku. Obsah tuku je většinou kolem 40%, garantujeme min. 36% tuku.\r\n\r\nAby si výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny bez konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových mléčných výrobků.\r\n\r\nAlergeny: laktóza', 39, 1, 0, 0, 39, NULL, 0, 24, NULL, '2015-07-17', '2015-07-17', NULL, 1, 39, 0, 0, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434184617.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Jogurt farmářský čokohoblinky 210g', 'jogurt-farmařsky-čokohoblinky-210g', 'Ježkův statek. Tváří Ježkova statku je David Vortel, který o svých produktech prozradil toto: "Jogurty, tvarohy, máslo a zákysy vyrábíme v naší výrobně se stoletou tradicí: Sýrárně bratří Brunnerů v Jarošově nad Nežárkou. Zde mimo jiné vyrábíme vlastní ovocné džemy do jogurtů. Mléko a smetanu pasterujeme v Mlékárně Polná, poptávka po našem mléce v současnosti daleko převyšuje kapacity jarošovské Sýrárny".', 'Bílý jogurt a čokoládové hoblinky Ježkův statek 190g+20g. Plnotučný jogurt, vyrobený z kravského plnotučného mléka, obsahuje živé jogurtové kutury, obsah tuku 4,1%. Ochucený hoblinkami hořké čokolády.Složení: mléko, mlékárenské kultury, čokoláda (cukr, kakaová hmota, kakaové máslo, přírodní vanilka, sójový lecitin)\r\n\r\nAby si výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny bez konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových mléčných výrobků.\r\n\r\nAlergeny: laktóza a sójový lecitin (v čokoládě)', 35, 1, 0, 0, 35, NULL, 0, 24, NULL, '2015-07-14', '2015-07-14', NULL, 1, 35, 0, 0, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434184814.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Panenská vepřová svíčková od českého farmáře 270g', 'panenska-vepřova-svičkova-od-českeho-farmaře-270g', 'Naprosto libový a jemný sval, na medailonky a minutky. Maso pochází z našeho vlastního kontrolovaného chovu, poráženo je lokálně bez dlouhého transportu a stresu zvířat, a jeho zpracování probíhá v rodinném řeznictví Strejček v Brně. Za doložený, tedy 100 % moravský, původ masa a receptur ručí Sklizeno, stejně jako za prémiovou kvalitu všech produktů s maximálním obsahem masa a minimem aditiv.', 'Farmářská vepřová panenská svíčková – 100% moravský čuník. Vepřové maso – výsekové, vakuově balené. Trvanlivost u masa bez kosti 6 dní, u masa s kosti (žebra) 5 dní.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 35, 1, 0, 0, 99, NULL, 0, 24, NULL, '2015-07-14', '2015-07-14', NULL, 1, 99, 0, 0, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434185121.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Hovězí bio žebra s kostí od českého farmáře cca 500g', 'hovězi-bio-žebra-s-kosti-od-českeho-farmaře-cca-500g', 'ECOPRODUCT je malá, ale dynamická společnost rodinného typu, opírající se o zázemí vlastní biofarmy. "Celý proces výroby masa, od nákupu živého dobytka, po konečný prodej zákazníkům je zcela v našich rukou, takže můžeme garantovat nejvyšší kvalitu zboží. Klademe velký důraz na výběr jednotlivých kusů dobytka a maximálně dbáme o citlivé a humánní zacházení se zvířaty, jak během přepravy, tak během porážky. Zvířata se před porážkou nechávají uklidnit, takže hladina stresových hormonů v mase není zvýšená jako u konvenčního hovězího a maso je proto měkčí a zdravější. Maso necháváme vyzrát minimálně 14 dní zavěšené v půlích v chladících boxech při teplotě blízké nule stupňů Celsia. Výraznější vůně masa a nazelenalá barva šťávy (nikoliv masa) nejsou známky zkaženosti, ale průvodní jevy vyzrálosti," vysvětlují farmáři.', 'Short ribs, přední hovězí maso s kostí, tučnější. Vhodné na polévky, vývary a pečeně. V bio kvalitě. Vakuově baleno od firmy Ecoproduct.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 35, 0, 1, 0, 66, NULL, 0, 24, NULL, '2015-07-14', '2015-07-14', NULL, 1, 66, 0, 0, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434185630.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'Hovězí bio kostky na guláš od českého farmáře 500g', 'hovězi-bio-kostky-na-gulaš-od-českeho-farmaře-500g', 'ECOPRODUCT je malá, ale dynamická společnost rodinného typu, opírající se o zázemí vlastní biofarmy. "Celý proces výroby masa, od nákupu živého dobytka, po konečný prodej zákazníkům je zcela v našich rukou, takže můžeme garantovat nejvyšší kvalitu zboží. Klademe velký důraz na výběr jednotlivých kusů dobytka a maximálně dbáme o citlivé a humánní zacházení se zvířaty, jak během přepravy, tak během porážky. Zvířata se před porážkou nechávají uklidnit, takže hladina stresových hormonů v mase není zvýšená jako u konvenčního hovězího a maso je proto měkčí a zdravější. Maso necháváme vyzrát minimálně 14 dní zavěšené v půlích v chladících boxech při teplotě blízké nule stupňů Celsia. Výraznější vůně masa a nazelenalá barva šťávy (nikoliv masa) nejsou známky zkaženosti, ale průvodní jevy vyzrálosti," vysvětlují farmáři.', 'Hovězí kostky na guláš. V bio kvalitě. Vakuově baleno od firmy Ecoproduct.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 34, 1, 1, 0, 128, NULL, 0, 24, NULL, '2015-07-14', '2015-07-14', NULL, 1, 128, 1, 1, 1, 1, 1, NULL, NULL, NULL, 'thumb_1434185749.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `product` (`id`, `name`, `alias`, `descripts`, `detail_product`, `cat_id`, `new`, `hot`, `promotions`, `price`, `rating`, `availability`, `tag_id`, `manufacturer_id`, `date_creat`, `date_change`, `user_id`, `status`, `about_price`, `weekly_featured`, `featured_products`, `new_products`, `crowler`, `sale_products`, `most_viewed`, `lastest_products`, `array_img`, `img`, `img0`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `img9`) VALUES
(54, 'Mleté maso vepřové od českého farmáře 454g', 'mlete-maso-vepřove-od-českeho-farmaře-454g', 'Mleté maso s 30% tuku vhodné na karbanátky, sekané či boloňské ragú. Maso pochází z našeho vlastního kontrolovaného chovu, poráženo je lokálně bez dlouhého transportu a stresu zvířat, a jeho zpracování probíhá v rodinném řeznictví Strejček v Brně. Za doložený, tedy 100 % moravský, původ masa a receptur ručí Sklizeno, stejně jako za prémiovou kvalitu všech produktů s maximálním obsahem masa a minimem aditiv.', 'Farmářské mleté maso (libovost 70%, 30% tuku) – 100% moravský čuník. Vepřové maso – výsekové, vakuově balené. Trvanlivost u masa bez kosti 6 dní, u masa s kosti (žebra) 5 dní.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 34, 1, 1, 0, 68, NULL, 0, 24, NULL, '2015-07-14', '2015-07-14', NULL, 1, 68, 1, 1, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434185920.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Kuřecí horní stehna RACIOLA cca 500g', 'kuřeci-horni-stehna-raciola-cca-500g', 'RACIOLA se řadí mezi podniky střední velikosti, která zpracovává výhradně vlastní drůbež, tedy 100% moravskou drůbež, která vyrostla výhradně doma a byla krmena pouze krmivem, které produkuje některá ze sesterských firem. Do krmiva se nepouživají se žádné látky urychlující růst a chlazení je v moderním systému bez vody. Raciola se na trhu etabluje jako výrobce s vyšší přidanou hodnotou a nadstandardní kvalitou.', 'Chlazená kuřecí horní stehna. Balena ve vaničce s atmosférou. Od firmy Raciola.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 34, 1, 1, 0, 44, NULL, 0, 24, NULL, '2015-07-14', '2015-07-14', NULL, 1, 44, 1, 1, 1, 1, 0, NULL, NULL, NULL, 'thumb_1434185989.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Kleenex Balsam kapesníky 4-vrstvé 24ks', 'kleenex-balsam-kapesniky-4-vrstve-24ks', 'Čtyřvrstvé papírové kapesníčky s výtažkem z měsíčku lékařského, který chrání pokožku a okolí nosu.', '', 46, 1, 0, 24, 156, NULL, 2, 30, NULL, '2015-06-23', '2015-06-23', NULL, 1, 156, 0, 1, 1, NULL, 0, NULL, NULL, NULL, 'thumb_1434186319.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Konečně vývar — zeleninový 450ml', 'konečně-vyvar-—-zeleninovy-450ml', 'Čerstvý zeleninový vývar bez chemie, lepku a soli. Základní kulinářská ingredience k přípravě polévek, omáček, k podlévání masa nebo italského risotta. Vývar je připraven klasickým způsobem: tedy bez konzervantů, barviv, zvýrazňovačů chuti a všech chemikálií, kterými bujónové náhražky v podobě kostek a vaniček zpravidla nešetří. Proto také jedno z hesel projektu Konečně vývar zní „Zapomeň na kostku“. Použitou zeleninu dodala rodinná farma Jamboz. Zeleninový vývar vydrží v chladničce 15 dní, po otevření 24 hodin. Datum expirace je na každé sklence seshora ručně napsáno.', 'Složení: voda, cibule, mrkev, pórek, petržel, celer, tymián, bobkový list, nové koření, pepř Alergeny: Celer', 33, 1, 0, 10, 55, NULL, 1, 24, NULL, '2015-06-23', '2015-06-23', NULL, 1, 55, 0, 1, 1, NULL, 1, NULL, NULL, NULL, 'thumb_1434186343.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Kiwi Bio cca 70g', 'kiwi-bio-cca-70g', 'Kiwi obsahuje až 10x více vitamínu C než citrusy a příznivě působí například proti revma.', '', 33, 1, 0, 10, 11, NULL, 2, 24, NULL, '2015-06-23', '2015-06-23', NULL, 1, 11, 1, 0, 1, NULL, 1, NULL, NULL, NULL, 'thumb_1434186463.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'KraFka dětský sýr - plátky 100g', 'krafka-dětsky-syr-platky-100g', 'Dětský sýr KraFka se řadí mezi přírodní polotvrdé sýry holandského typu s typicky zlatavě žlutou barvou a kompaktní konzistencí. Její chuť je jemná, máslově výrazná s výraznou sýrovou vůní. Tento sýr je vyráběn s vysokým podílem ruční práce. Je zvlášť vhodný pro děti, neboť v sobě nenese žádnou stopu cizí příchuti a jeho jemnost vůně každé dítě ke konzumaci přiláká.', 'pasterované mléko, mléčné kultury, mikrob. syřidlo, jedlá sůl max. 2%, 48% tuku v sušině, 56% sušiny', 33, 1, 1, 15, 23, NULL, 2, 24, NULL, '2015-06-23', '2015-06-23', NULL, 0, 23, 1, 0, 1, NULL, 1, NULL, NULL, NULL, 'thumb_1434186582.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Strejčkova klobása od českého farmáře 180g', 'strejčkova-klobasa-od-českeho-farmaře-180g', 'Maso pochází z našeho vlastního kontrolovaného chovu, poráženo je lokálně bez dlouhého transportu a stresu zvířat, a jeho zpracování probíhá v rodinném řeznictví Strejček v Brně. Za doložený, tedy 100 % moravský, původ masa a receptur ručí Sklizeno, stejně jako za prémiovou kvalitu všech produktů s maximálním obsahem masa a minimem aditiv.', 'vepřové maso 60%, hovězí maso 20%, voda,konzervant: dusitan sodný, koření, antioxidant:e­rythorban sodný, s.česnek, aroma, extrakty koření, dextróza Tuk max. 35 %, sůl max. 1,8 %\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 34, 1, 1, 20, 43, NULL, 0, 24, NULL, '2015-07-14', '2015-07-14', NULL, 1, 43, 1, 1, 1, 1, 1, NULL, NULL, NULL, 'thumb_1434186736.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Sklizeno Zelný salát', 'sklizeno-zelny-salat', 'Lahůdkářský výrobek. Skladujte při teplotě od +1°C do +5°C .Po otevření ihned spotřebujte.', 'Zelí bílé 72%, řepkový olej, st. mrkev (mrkev, voda, ocet kvasný, glukózo-fruktóuzový sirup, jedlá sůl), voda, cukr, ocet kvasný, jedlá sůl, citrónová šťáva, petržel', 36, 1, 1, 30, 22, NULL, 3, 24, NULL, '2015-07-16', '2015-07-16', NULL, 1, 22, 1, 1, 1, 1, 1, NULL, NULL, NULL, 'thumb_1434186805.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Oravská slanina od českého farmáře 202g', 'oravska-slanina-od-českeho-farmaře-202g', 'Maso pochází z našeho vlastního kontrolovaného chovu, poráženo je lokálně bez dlouhého transportu a stresu zvířat, a jeho zpracování probíhá v rodinném řeznictví Strejček v Brně. Za doložený, tedy 100 % moravský, původ masa a receptur ručí Sklizeno, stejně jako za prémiovou kvalitu všech produktů s maximálním obsahem masa a minimem aditiv.', 'vepřové maso 95%, voda, konzervant:dusitan sodný,stabili­zátory: difosfáty, trifosfáty, zahušťovadla: karagenan, xanthan, antioxidant:e­rythorban sodný, extrakty koření Sůl max. 1,8 %\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.', 35, 1, 1, 10, 62, NULL, 0, 24, NULL, '2015-07-17', '2015-07-17', NULL, 1, 62, 1, 0, 1, 1, 1, NULL, NULL, NULL, 'thumb_1434186880.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Sklizeno Zelný salát 200g', 'sklizeno-zelny-salat-200g', 'Lahůdkářský výrobek. Skladujte při teplotě od +1°C do +5°C .Po otevření ihned spotřebujte.', 'Zelí bílé 72%, řepkový olej, st. mrkev (mrkev, voda, ocet kvasný, glukózo-fruktóuzový sirup, jedlá sůl), voda, cukr, ocet kvasný, jedlá sůl, citrónová šťáva, petržel', 41, 1, 1, 30, 20, NULL, 3, 30, NULL, '2015-07-17', '2015-07-17', NULL, 0, 19, 1, 1, 1, 1, 1, NULL, NULL, NULL, 'thumb_1435026709.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'Pure Coco 330ml', 'pure-coco-330ml', '100% kokosová voda', 'Pure Coco je 100% kokosová voda získaná z mladých zelených ořechů z Filipín. Ne nadarmo je označována za jeden z největších zázraků této planety. Voda se do skořápky dostává dlouhou cestou skrze vlákna stromu, čímž dosahuje vysoké ', 35, 1, 1, 10, 20, NULL, 15, 30, NULL, '2015-07-15', '2015-07-15', NULL, 1, 0, 1, 0, 1, 1, 1, NULL, NULL, NULL, 'thumb_1436864398.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'Dušená šunka z kýty Naše Miroslav - poctivá šunka nejvyšší jakosti 100g', 'dušena-šunka-z-kyty-naše-miroslav-poctiva-šunka-nejvyšši-jakosti-100g', 'Prémiové šunky Naše Miroslav jsou výsledkem spolupráce mezi Sklizeno, agrodružstvem Miroslav a tradičním tišnovským řeznictvím Steinhauser s dvousetletou historií. Předností naší řady uzenin je mimořádně vysoký podíl masa, velmi nízký obsah soli a konzervačních látek. Dostáváte tedy do rukou výrobek s vysokým podílem ruční práce a chutí, kterou si zamilujete vy i vaše děti.', 'Složení: Vepřové maso 95 % hm.; pitná voda; dusitanová solící směs: jedlá sůl, konzervant: dusitan sodný; sacharóza; stabilizátory: trifosforečnany, difosforečnany; zahušťovadlo: guma Euchema; antioxidant: askorban sodný; aroma. Nejvyšší obsah tuku 6 % hm.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.\r\n\r\nVýživové údaje na 100 g výrobku\r\n\r\nŠunka nejvyšší jakosti (více jak 16 % čisté svalové bílkoviny).\r\n\r\nEnergetická hodnota 476 kJ (113 kcal)\r\n\r\ntuky / z toho nasycené mastné kyseliny 5,2 g / 1,7 g\r\n\r\nsacharidy / z toho cukry 0,6 g / < 0,5 g\r\n\r\nbílkoviny 19 g\r\n\r\nsůl 2,2 g', 33, 1, 0, 0, 43, NULL, 1, 24, NULL, '2015-07-15', '2015-07-15', NULL, 0, 43, 1, 1, 0, 1, 1, NULL, NULL, NULL, 'thumb_1436946807.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Geuaše Diroshoay - poctivá šunka  50g', 'geuaše-diroshoay-poctiva-šunka-50g', 'Prémiové šunky Naše Miroslav jsou výsledkem spolupráce mezi Sklizeno, agrodružstvem Miroslav a tradičním tišnovským řeznictvím Steinhauser s dvousetletou historií. Předností naší řady uzenin je mimořádně vysoký podíl masa, velmi nízký obsah soli a konzervačních látek. Dostáváte tedy do rukou výrobek s vysokým podílem ruční práce a chutí, kterou si zamilujete vy i vaše děti.', 'Složení: Vepřové maso 95 % hm.; pitná voda; dusitanová solící směs: jedlá sůl, konzervant: dusitan sodný; sacharóza; stabilizátory: trifosforečnany, difosforečnany; zahušťovadlo: guma Euchema; antioxidant: askorban sodný; aroma. Nejvyšší obsah tuku 6 % hm.\r\n\r\nAby si farmářské čerstvé výrobky zachovaly co nejvíce živin a skvělou chuť, jsou vyrobeny s naprostým minimem konzervačních látek. Proto je třeba očekávat kratší trvanlivost než u běžných průmyslových „čerstvých“ výrobků.\r\n\r\nVýživové údaje na 100 g výrobku\r\n\r\nŠunka nejvyšší jakosti (více jak 16 % čisté svalové bílkoviny).\r\n\r\nEnergetická hodnota 476 kJ (113 kcal)\r\n\r\ntuky / z toho nasycené mastné kyseliny 5,2 g / 1,7 g\r\n\r\nsacharidy / z toho cukry 0,6 g / < 0,5 g\r\n\r\nbílkoviny 19 g\r\n\r\nsůl 2,2 g', 41, 1, 1, 0, 43, NULL, 1, 24, NULL, '2015-07-17', '2015-07-17', NULL, 0, 43, 1, 1, 1, 1, 1, NULL, NULL, NULL, 'thumb_1436946667.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quanhuyen`
--

CREATE TABLE IF NOT EXISTS `quanhuyen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenQuanHuyen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaTinhThanh` int(11) NOT NULL,
  `XuatBan` tinyint(4) NOT NULL,
  `ThuTu` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=901 ;

--
-- Dumping data for table `quanhuyen`
--

INSERT INTO `quanhuyen` (`ID`, `TenQuanHuyen`, `MaTinhThanh`, `XuatBan`, `ThuTu`) VALUES
(127, 'Quận 1', 3, 1, 1),
(128, 'Quận 2', 3, 1, 2),
(129, 'Quận 3', 3, 1, 3),
(130, 'Quận 4', 3, 1, 4),
(131, 'Quận 5', 3, 1, 5),
(132, 'Quận 6', 3, 1, 6),
(133, 'Quận 7', 3, 1, 7),
(134, 'Quận 8', 3, 1, 8),
(135, 'Quận 9', 3, 1, 9),
(136, 'Quận 10', 3, 1, 10),
(137, 'Quận 11', 3, 1, 11),
(138, 'Quận 12', 3, 1, 12),
(139, 'Quận Phú Nhuận', 3, 1, 13),
(140, 'Quận Bình Thạnh', 3, 1, 14),
(141, 'Quận Tân Bình', 3, 1, 15),
(142, 'Quận Tân Phú', 3, 1, 16),
(143, 'Quận Gò Vấp', 3, 1, 17),
(144, 'Quận Thủ Đức', 3, 1, 18),
(145, 'Quận Bình Tân', 3, 1, 19),
(146, 'Huyện Bình Chánh', 3, 1, 20),
(147, 'Huyện Củ Chi', 3, 1, 21),
(149, 'Huyện Nhà Bè', 3, 1, 22),
(150, 'Huyện Cần Giờ', 3, 1, 23),
(856, 'Huyện Hóc Môn', 3, 1, 24),
(113, 'Từ Liêm', 2, 1, 1),
(114, 'Thanh Trì', 2, 1, 2),
(115, 'Sóc Sơn', 2, 1, 3),
(116, 'Gia Lâm', 2, 1, 4),
(117, 'Đông Anh', 2, 1, 5),
(118, 'Long Biên', 2, 1, 6),
(119, 'Hoàng Mai', 2, 1, 7),
(120, 'Cầu Giấy', 2, 1, 8),
(121, 'Tây Hồ', 2, 1, 9),
(122, 'Thanh Xuân', 2, 1, 10),
(123, 'Hai Bà Trưng', 2, 1, 11),
(124, 'Đống Đa', 2, 1, 12),
(125, 'Ba Đình', 2, 1, 13),
(126, 'Hoàn Kiếm', 2, 1, 14),
(450, 'Mê Linh', 2, 1, 15),
(840, 'Vân Điền', 2, 1, 16),
(857, 'Ba Vì', 2, 1, 17),
(858, 'Chương Mỹ', 2, 1, 18),
(859, 'Đan Phượng', 2, 1, 19),
(860, 'Hà Đông', 2, 1, 20),
(861, 'Hoài Đức', 2, 1, 21),
(862, 'Mỹ Đức', 2, 1, 22),
(863, 'Phú Xuyên', 2, 1, 23),
(864, 'Phúc Thọ', 2, 1, 24),
(865, 'Quốc Oai', 2, 1, 25),
(866, 'Sơn Tây', 2, 1, 26),
(867, 'Thạch Thất', 2, 1, 27),
(868, 'Thanh Oai', 2, 1, 28),
(869, 'Thường Tín', 2, 1, 29),
(871, 'Ứng Hòa', 2, 1, 30),
(626, 'Lục Yên', 10, 1, 1),
(627, 'Mù Căng Chải', 10, 1, 2),
(628, 'Trạm Tấu', 10, 1, 3),
(629, 'Trấn Yên', 10, 1, 4),
(630, 'Văn Chấn', 10, 1, 5),
(631, 'Văn Yên', 10, 1, 6),
(632, 'Yên Bái', 10, 1, 7),
(633, 'Yên Bình', 10, 1, 8),
(448, 'Bình Xuyên', 11, 1, 1),
(449, 'Lập Thạch', 11, 1, 2),
(451, 'Tam Dương', 11, 1, 3),
(452, 'Vĩnh Tường', 11, 1, 4),
(453, 'Vĩnh Yên', 11, 1, 5),
(454, 'Yên Lạc', 11, 1, 6),
(850, 'Phúc Yên', 11, 1, 7),
(853, 'Tam Đảo', 11, 1, 8),
(812, 'Bình Minh', 12, 1, 1),
(813, 'Long Hồ', 12, 1, 2),
(814, 'Mang Thít', 12, 1, 3),
(815, 'Tam Bình', 12, 1, 4),
(816, 'Trà Ôn', 12, 1, 5),
(817, 'Vĩnh Long', 12, 1, 6),
(818, 'Vũng Liêm', 12, 1, 7),
(620, 'Chiêm Hóa', 13, 1, 1),
(621, 'Hàm Yên', 13, 1, 2),
(622, 'Na Hang', 13, 1, 3),
(623, 'Sơn Dương', 13, 1, 4),
(624, 'Tuyên Quang', 13, 1, 5),
(625, 'Yên Sơn', 13, 1, 6),
(440, 'Càng Long', 14, 1, 1),
(441, 'Cầu Kè', 14, 1, 2),
(442, 'Cầu Ngang', 14, 1, 3),
(443, 'Châu Thành', 14, 1, 4),
(444, 'Duyên Hải', 14, 1, 5),
(445, 'Tiểu Cần', 14, 1, 6),
(446, 'Trà Cú', 14, 1, 7),
(447, 'Trà Vinh', 14, 1, 8),
(803, 'Cái Bè', 15, 1, 1),
(804, 'Cai Lậy', 15, 1, 2),
(805, 'Châu Thành', 15, 1, 3),
(806, 'Chợ Gạo', 15, 1, 4),
(807, 'Gò Công', 15, 1, 5),
(808, 'Gò Công Đông', 15, 1, 6),
(809, 'Gò Công Tây', 15, 1, 7),
(810, 'Mỹ Tho', 15, 1, 8),
(811, 'Tân Phước', 15, 1, 9),
(423, 'A Lưới', 16, 1, 1),
(424, 'Huế', 16, 1, 2),
(425, 'Hương Thủy', 16, 1, 3),
(426, 'Hương Trà', 16, 1, 4),
(427, 'Nam Đông', 16, 1, 5),
(428, 'Phong Điền', 16, 1, 6),
(429, 'Phú Lộc', 16, 1, 7),
(430, 'Phú Vang', 16, 1, 8),
(431, 'Quảng Điền', 16, 1, 9),
(776, 'Bá Thước', 17, 1, 1),
(777, 'Bỉm Sơn', 17, 1, 2),
(778, 'Cẩm Thủy', 17, 1, 3),
(779, 'Đông Sơn', 17, 1, 4),
(780, 'Hà Trung', 17, 1, 5),
(781, 'Hậu Lộc', 17, 1, 6),
(782, 'Hoằng Hóa', 17, 1, 7),
(783, 'Lang Chánh', 17, 1, 8),
(784, 'Mường Lát', 17, 1, 9),
(785, 'Nga Sơn', 17, 1, 10),
(786, 'Ngọc Lặc', 17, 1, 11),
(787, 'Như Thanh', 17, 1, 12),
(788, 'Như Xuân', 17, 1, 13),
(789, 'Nông Cống', 17, 1, 14),
(790, 'Quan Hóa', 17, 1, 15),
(791, 'Quan Sơn', 17, 1, 16),
(792, 'Quảng Xương', 17, 1, 17),
(793, 'Sầm Sơn', 17, 1, 18),
(794, 'Thạch Thành', 17, 1, 19),
(795, 'Thanh Hóa', 17, 1, 20),
(796, 'Thọ Xuân', 17, 1, 21),
(797, 'Thường Xuân', 17, 1, 22),
(798, 'Tĩnh Gia', 17, 1, 23),
(799, 'Thiệu Hóa', 17, 1, 24),
(800, 'Triệu Sơn', 17, 1, 25),
(801, 'Vĩnh Lộc', 17, 1, 26),
(802, 'Yên Định', 17, 1, 27),
(611, 'Đại Từ', 18, 1, 1),
(612, 'Định Hóa', 18, 1, 2),
(613, 'Đồng Hỷ', 18, 1, 3),
(614, 'Phổ Yên', 18, 1, 4),
(615, 'Phú Bình', 18, 1, 5),
(616, 'Phú Lương', 18, 1, 6),
(617, 'Sông Công', 18, 1, 7),
(618, 'Thái Nguyên', 18, 1, 8),
(619, 'Võ Nhai', 18, 1, 9),
(432, 'Đông Hưng', 19, 1, 1),
(433, 'Hưng Hà', 19, 1, 2),
(434, 'Kiến Xương', 19, 1, 3),
(435, 'Quỳnh Phụ', 19, 1, 4),
(436, 'Thái Bình', 19, 1, 5),
(437, 'Thái Thụy', 19, 1, 6),
(438, 'Tiền Hải', 19, 1, 7),
(439, 'Vũ Thư', 19, 1, 8),
(602, 'Bến Cầu', 21, 1, 1),
(603, 'Châu Thành', 21, 1, 2),
(604, 'Dương Minh Châu', 21, 1, 3),
(605, 'Gò Dầu', 21, 1, 4),
(606, 'Hòa Thành', 21, 1, 5),
(607, 'Tân Biên', 21, 1, 6),
(608, 'Tân Châu', 21, 1, 7),
(609, 'Tây Ninh', 21, 1, 8),
(610, 'Trảng Bàng', 21, 1, 9),
(766, 'Bắc Yên', 22, 1, 1),
(767, 'Mai Sơn', 22, 1, 2),
(768, 'Mộc Châu', 22, 1, 3),
(769, 'Muờng La', 22, 1, 4),
(770, 'Phù Yên', 22, 1, 5),
(771, 'Quỳnh Nhai', 22, 1, 6),
(772, 'Sơn La', 22, 1, 7),
(773, 'Sông Mã', 22, 1, 8),
(774, 'Thuận Châu', 22, 1, 9),
(775, 'Yên Châu', 22, 1, 10),
(874, 'Sốp Cộp', 22, 1, 11),
(595, 'Kế Sách', 23, 1, 1),
(596, 'Long Phú', 23, 1, 2),
(597, 'Mỹ Tú', 23, 1, 3),
(598, 'Mỹ Xuyên', 23, 1, 4),
(599, 'Sóc Trăng', 23, 1, 5),
(600, 'Thanh Trị', 23, 1, 6),
(601, 'Vĩnh Châu', 23, 1, 7),
(414, 'Cam Lộ', 24, 1, 1),
(415, 'Đa Krông', 24, 1, 2),
(416, 'Đông Hà', 24, 1, 3),
(417, 'Gio Linh', 24, 1, 4),
(418, 'Hải Lăng', 24, 1, 5),
(419, 'Hướng Hóa', 24, 1, 6),
(420, 'Quảng Trị', 24, 1, 7),
(421, 'Triệu Phong', 24, 1, 8),
(422, 'Vĩnh Linh', 24, 1, 9),
(753, 'Ba Chế', 25, 1, 1),
(754, 'Bình Liêu', 25, 1, 2),
(755, 'Cẩm Phả', 25, 1, 3),
(756, 'Cô Tô', 25, 1, 4),
(757, 'Đông Triều', 25, 1, 5),
(758, 'Hạ Long', 25, 1, 6),
(759, 'Hoành Bồ', 25, 1, 7),
(760, 'Móng Cái', 25, 1, 8),
(761, 'Quảng Hà', 25, 1, 9),
(762, 'Tiên Yên', 25, 1, 10),
(763, 'Uông Bí', 25, 1, 11),
(764, 'Vân Đồn', 25, 1, 12),
(765, 'Yên Hưng', 25, 1, 13),
(582, 'Ba Tơ', 26, 1, 1),
(583, 'Bình Sơn', 26, 1, 2),
(584, 'Đức Phổ', 26, 1, 3),
(585, 'Lý Sơn', 26, 1, 4),
(586, 'Minh Long', 26, 1, 5),
(587, 'Mộ Đức', 26, 1, 6),
(588, 'Nghĩa Hành', 26, 1, 7),
(589, 'Quãng Ngãi', 26, 1, 8),
(590, 'Sơn Hà', 26, 1, 9),
(591, 'Sơn Tây', 26, 1, 10),
(592, 'Sơn Tịnh', 26, 1, 11),
(593, 'Trà Bồng', 26, 1, 12),
(594, 'Tư Nghĩa', 26, 1, 13),
(400, 'Đại Lộc', 27, 1, 1),
(401, 'Điện Bàn', 27, 1, 2),
(402, 'Duy Xuyên', 27, 1, 3),
(403, 'Hiên', 27, 1, 4),
(404, 'Hiệp Đức', 27, 1, 5),
(405, 'Hội An', 27, 1, 6),
(406, 'Nam Giang', 27, 1, 7),
(407, 'Núi Thành', 27, 1, 8),
(408, 'Phước Sơn', 27, 1, 9),
(409, 'Quế Sơn', 27, 1, 10),
(410, 'Tam Kỳ', 27, 1, 11),
(411, 'Thăng Bình', 27, 1, 12),
(412, 'Tiên Phước', 27, 1, 13),
(413, 'Trà My', 27, 1, 14),
(747, 'Bố Trạch', 28, 1, 1),
(748, 'Đồng Hới', 28, 1, 2),
(749, 'Lệ Thủy', 28, 1, 3),
(750, 'Quảng Ninh', 28, 1, 4),
(751, 'Quảng Trạch', 28, 1, 5),
(752, 'Tuyên Hóa', 28, 1, 6),
(880, 'Minh Hóa', 28, 1, 7),
(576, 'Đồng Xuân', 29, 1, 1),
(577, 'Sơn Hòa', 29, 1, 2),
(578, 'Sông Cầu', 29, 1, 3),
(579, 'Sông Hinh', 29, 1, 4),
(580, 'Tuy An', 29, 1, 5),
(581, 'Tuy Hòa', 29, 1, 6),
(877, 'Đông Hòa', 29, 1, 7),
(878, 'Tây Hòa', 29, 1, 8),
(879, 'Phú Hòa', 29, 1, 9),
(388, 'Đoan Hùng', 30, 1, 1),
(389, 'Hạ Hòa', 30, 1, 2),
(390, 'Lâm Thao', 30, 1, 3),
(391, 'Phù Ninh', 30, 1, 4),
(392, 'Phú Thọ', 30, 1, 5),
(393, 'Sông Thao', 30, 1, 6),
(394, 'Tam Nông', 30, 1, 7),
(395, 'Thanh Ba', 30, 1, 8),
(396, 'Thanh Sơn', 30, 1, 9),
(397, 'Thanh Thủy', 30, 1, 10),
(398, 'Việt Trì', 30, 1, 11),
(399, 'Yên Lập', 30, 1, 12),
(875, 'Cẩm Khê', 30, 1, 13),
(876, 'Tân Sơn', 30, 1, 14),
(743, 'Ninh Hải', 31, 1, 1),
(744, 'Ninh Phước', 31, 1, 2),
(745, 'Ninh Sơn', 31, 1, 3),
(746, 'Phan Rang - Tháp Chàm', 31, 1, 4),
(568, 'Hoa Lư', 32, 1, 1),
(569, 'Kim Sơn', 32, 1, 2),
(571, 'Nho Quan', 32, 1, 3),
(572, 'Ninh Bình', 32, 1, 4),
(573, 'Tam Điệp', 32, 1, 5),
(574, 'Yên Khánh', 32, 1, 6),
(575, 'Yên Mô', 32, 1, 7),
(872, 'Gia Viễn', 32, 1, 8),
(369, 'Anh Sơn', 33, 1, 1),
(370, 'Con Cuông', 33, 1, 2),
(371, 'Cửa Lò', 33, 1, 3),
(372, 'Diễn Châu', 33, 1, 4),
(373, 'Đô Lương', 33, 1, 5),
(374, 'Hưng Nguyên', 33, 1, 6),
(375, 'Kỳ Sơn', 33, 1, 7),
(376, 'Nam Đàn', 33, 1, 8),
(377, 'Nghi Lộc', 33, 1, 9),
(378, 'Nghĩa Đàn', 33, 1, 10),
(379, 'Quế Phong', 33, 1, 11),
(380, 'Quỳ Châu', 33, 1, 12),
(381, 'Quỳ Hợp', 33, 1, 13),
(382, 'Quỳnh Lưu', 33, 1, 14),
(383, 'Tân Kỳ', 33, 1, 15),
(384, 'Thanh Chương', 33, 1, 16),
(385, 'Tương Dương', 33, 1, 17),
(386, 'Vinh', 33, 1, 18),
(387, 'Yên Thành', 33, 1, 19),
(883, 'Thái Hòa', 33, 1, 20),
(358, 'Giao Thủy', 34, 1, 1),
(360, 'Hải Hậu', 34, 1, 2),
(361, 'Mỹ Lộc', 34, 1, 3),
(362, 'Nam Định', 34, 1, 4),
(363, 'Nam Trực', 34, 1, 5),
(364, 'Nghĩa Hưng', 34, 1, 6),
(365, 'Trực Ninh', 34, 1, 7),
(366, 'Vụ Bản', 34, 1, 8),
(367, 'Xuân Trường', 34, 1, 9),
(368, 'Ý Yên', 34, 1, 10),
(341, 'Bến Lức', 35, 1, 1),
(344, 'Cần Đước', 35, 1, 2),
(345, 'Cần Giuộc', 35, 1, 3),
(346, 'Châu Thành', 35, 1, 4),
(347, 'Đức Hòa', 35, 1, 5),
(348, 'Đức Huệ', 35, 1, 6),
(349, 'Mộc Hóa', 35, 1, 7),
(350, 'Tân An', 35, 1, 8),
(351, 'Tân Hưng', 35, 1, 9),
(352, 'Tân Thạnh', 35, 1, 10),
(354, 'Tân Trụ', 35, 1, 11),
(355, 'Thạnh Hóa', 35, 1, 12),
(356, 'Thủ Thừa', 35, 1, 13),
(357, 'Vĩnh Hưng', 35, 1, 14),
(849, 'Liên Hưng', 35, 1, 15),
(306, 'Bắc Hà', 36, 1, 1),
(307, 'Bảo Thắng', 36, 1, 2),
(308, 'Bảo Yên', 36, 1, 3),
(309, 'Bát Xát', 36, 1, 4),
(310, 'Cam Đường', 36, 1, 5),
(311, 'Lào Cai', 36, 1, 6),
(312, 'Mường Khương', 36, 1, 7),
(313, 'Sa Pa', 36, 1, 8),
(314, 'Than Uyên', 36, 1, 9),
(315, 'Văn Bàn', 36, 1, 10),
(316, 'Xi Ma Cai', 36, 1, 11),
(328, 'Bắc Sơn', 37, 1, 1),
(329, 'Bình Gia', 37, 1, 2),
(330, 'Cao Lăng', 37, 1, 3),
(331, 'Cao Lộc', 37, 1, 4),
(332, 'Đình Lập', 37, 1, 5),
(333, 'Hữu Lũng', 37, 1, 6),
(334, 'Lạng Sơn', 37, 1, 7),
(336, 'Lộc Bình', 37, 1, 8),
(337, 'Tràng Định', 37, 1, 9),
(342, 'Văn Lãng', 37, 1, 10),
(343, 'Văn Quang', 37, 1, 11),
(317, 'Bảo Lâm', 38, 1, 1),
(318, 'Bảo Lộc', 38, 1, 2),
(319, 'Cát Tiên', 38, 1, 3),
(320, 'Đà Lạt', 38, 1, 4),
(321, 'Đạ Tẻh', 38, 1, 5),
(322, 'Đạ Huoai', 38, 1, 6),
(323, 'Di Linh', 38, 1, 7),
(324, 'Đơn Dương', 38, 1, 8),
(325, 'Đức Trọng', 38, 1, 9),
(326, 'Lạc Dương', 38, 1, 10),
(327, 'Lâm Hà', 38, 1, 11),
(296, 'Điện Biên', 39, 1, 1),
(297, 'Điện Biên Đông', 39, 1, 2),
(298, 'Điện Biên Phủ', 39, 1, 3),
(299, 'Lai Châu', 39, 1, 4),
(300, 'Mường Lay', 39, 1, 5),
(301, 'Mường Tè', 39, 1, 6),
(302, 'Phong Thổ', 39, 1, 7),
(303, 'Sìn Hồ', 39, 1, 8),
(304, 'Tủa Chùa', 39, 1, 9),
(305, 'Tuần Giáo', 39, 1, 10),
(290, 'Đắk Glei', 40, 1, 1),
(291, 'Đắk Tô', 40, 1, 2),
(292, 'Kon Plông', 40, 1, 3),
(293, 'Kon Tum', 40, 1, 4),
(294, 'Ngọc Hồi', 40, 1, 5),
(295, 'Sa Thầy', 40, 1, 6),
(715, 'Đắk Glei', 40, 1, 7),
(716, 'Đắk Hà', 40, 1, 8),
(717, 'Đắk Tô', 40, 1, 9),
(718, 'Kon Plông', 40, 1, 10),
(719, 'Kon Tum', 40, 1, 11),
(720, 'Ngọc Hồi', 40, 1, 12),
(721, 'Sa Thầy', 40, 1, 13),
(277, 'An Biên', 41, 1, 1),
(278, 'An Minh', 41, 1, 2),
(279, 'Châu Thành', 41, 1, 3),
(280, 'Gò Quao', 41, 1, 4),
(281, 'Gồng Giềng', 41, 1, 5),
(282, 'Hà Tiên', 41, 1, 6),
(283, 'Hòn Đất', 41, 1, 7),
(284, 'Kiên Hải', 41, 1, 8),
(285, 'Phú Quốc', 41, 1, 9),
(286, 'Rạch Giá', 41, 1, 10),
(287, 'Tân Hiệp', 41, 1, 11),
(288, 'Vĩnh Thuận', 41, 1, 12),
(269, 'Nha Trang', 42, 1, 1),
(270, 'Khánh Vĩnh', 42, 1, 2),
(271, 'Diên Khánh', 42, 1, 3),
(272, 'Ninh Hòa', 42, 1, 4),
(273, 'Khánh Sơn', 42, 1, 5),
(274, 'Cam Ranh', 42, 1, 6),
(275, 'Trường Sa', 42, 1, 7),
(276, 'Vạn Ninh', 42, 1, 8),
(262, 'Ân Thi', 43, 1, 1),
(263, 'Hưng Yên', 43, 1, 2),
(264, 'Khoái Châu', 43, 1, 3),
(265, 'Tiên Lữ', 43, 1, 4),
(266, 'Văn Giang', 43, 1, 5),
(267, 'Văn Lâm', 43, 1, 6),
(268, 'Yên Mỹ', 43, 1, 7),
(705, 'Ân Thi', 43, 1, 8),
(706, 'Hưng Yên', 43, 1, 9),
(707, 'Khoái Châu', 43, 1, 10),
(708, 'Kim Động', 43, 1, 11),
(709, 'Mỹ Hào', 43, 1, 12),
(710, 'Phù Cừ', 43, 1, 13),
(224, 'Đà Bắc', 44, 1, 1),
(225, 'Hòa Bình', 44, 1, 2),
(226, 'Kim Bôi', 44, 1, 3),
(227, 'Kỳ Sơn', 44, 1, 4),
(228, 'Lạc Sơn', 44, 1, 5),
(229, 'Lạc Thủy', 44, 1, 6),
(230, 'Lương Sơn', 44, 1, 7),
(231, 'Mai Châu', 44, 1, 8),
(232, 'Tân Lạc', 44, 1, 9),
(233, 'Yên Thủy', 44, 1, 10),
(873, 'Cao Phong', 44, 1, 11),
(682, 'Châu Thành', 45, 1, 1),
(683, 'Long Mỹ', 45, 1, 2),
(685, 'Phụng Hiệp', 45, 1, 3),
(687, 'Vị Thanh', 45, 1, 4),
(688, 'Vị Thủy', 45, 1, 5),
(890, 'Châu Thành A', 45, 1, 6),
(891, 'Ngã Bảy', 45, 1, 7),
(234, 'Bình Giang', 46, 1, 1),
(235, 'Cẩm Giàng', 46, 1, 2),
(236, 'Chí Linh', 46, 1, 3),
(238, 'Gia Lộc', 46, 1, 4),
(239, 'Hải Dương', 46, 1, 5),
(241, 'Kim Thành', 46, 1, 6),
(242, 'Nam Sách', 46, 1, 7),
(243, 'Ninh Giang', 46, 1, 8),
(244, 'Kinh Môn', 46, 1, 9),
(245, 'Ninh Giang', 46, 1, 10),
(246, 'Thanh Hà', 46, 1, 11),
(247, 'Thanh Miện', 46, 1, 12),
(248, 'Từ Kỳ', 46, 1, 13),
(214, 'Cẩm Xuyên', 47, 1, 1),
(215, 'Can Lộc', 47, 1, 2),
(216, 'Đức Thọ', 47, 1, 3),
(217, 'Hà Tĩnh', 47, 1, 4),
(218, 'Hồng Lĩnh', 47, 1, 5),
(219, 'Hương Khê', 47, 1, 6),
(220, 'Hương Sơn', 47, 1, 7),
(221, 'Kỳ Anh', 47, 1, 8),
(222, 'Nghi Xuân', 47, 1, 9),
(223, 'Thạch Hà', 47, 1, 10),
(881, 'Vũ Quang', 47, 1, 11),
(882, 'Lộc Hà', 47, 1, 12),
(689, 'Bình Lục', 49, 1, 1),
(690, 'Duy Tiên', 49, 1, 2),
(691, 'Kim Bảng', 49, 1, 3),
(692, 'Lý Nhân', 49, 1, 4),
(693, 'Phủ Lý', 49, 1, 5),
(694, 'Thanh Liêm', 49, 1, 6),
(498, 'Bắc Mê', 50, 1, 1),
(499, 'Bắc Quang', 50, 1, 2),
(500, 'Đồng Văn', 50, 1, 3),
(501, 'Hà Giang', 50, 1, 4),
(502, 'Hoàng Su Phì', 50, 1, 5),
(503, 'Mèo Vạt', 50, 1, 6),
(504, 'Quản Bạ', 50, 1, 7),
(505, 'Vị Xuyên', 50, 1, 8),
(506, 'Xín Mần', 50, 1, 9),
(507, 'Yên Minh', 50, 1, 10),
(187, 'An Khê', 51, 1, 1),
(188, 'Ayun Pa ', 51, 1, 2),
(189, 'Chư Păh', 51, 1, 3),
(190, 'Chư Prông  ', 51, 1, 4),
(191, 'Chư Sê ', 51, 1, 5),
(192, 'Đức Cơ  ', 51, 1, 6),
(193, 'KBang  ', 51, 1, 7),
(194, 'Krông Chro', 51, 1, 8),
(195, 'Krông Pa ', 51, 1, 9),
(196, 'La Grai  ', 51, 1, 10),
(197, 'Mang Yang ', 51, 1, 11),
(198, 'Pleiku', 51, 1, 12),
(826, 'Cao Lãnh', 52, 1, 1),
(827, 'Châu Thành', 52, 1, 2),
(828, 'Hồng Ngự', 52, 1, 3),
(829, 'Lai Vung', 52, 1, 4),
(830, 'Lấp Vò', 52, 1, 5),
(831, 'Tam Nông', 52, 1, 6),
(832, 'Tân Hồng', 52, 1, 7),
(833, 'Thanh Bình', 52, 1, 8),
(834, 'Tháp Mười', 52, 1, 9),
(835, 'Xa Đéc', 52, 1, 10),
(634, 'Biên Hòa', 53, 1, 1),
(635, 'Định Quán', 53, 1, 2),
(636, 'Long Khánh', 53, 1, 3),
(637, 'Long Thành', 53, 1, 4),
(638, 'Nhơn Trạch', 53, 1, 5),
(639, 'Tân Phú', 53, 1, 6),
(640, 'Thống Nhất', 53, 1, 7),
(641, 'Vĩnh Cừu', 53, 1, 8),
(642, 'Xuân Lộc', 53, 1, 9),
(838, 'Trảng Bom', 53, 1, 10),
(455, 'Buôn Đôn', 56, 1, 1),
(456, 'Buôn Ma Thuột', 56, 1, 2),
(457, 'Cư Jút', 56, 1, 3),
(458, 'Cư M''gar', 56, 1, 4),
(459, 'Đắk Mil', 56, 1, 5),
(460, 'Đắk Nông', 56, 1, 6),
(461, 'Đắk R''lấp', 56, 1, 7),
(462, 'Ea H''leo', 56, 1, 8),
(463, 'Ea Kra', 56, 1, 9),
(464, 'Ea Súp', 56, 1, 10),
(465, 'Krông A Na', 56, 1, 11),
(466, 'Krông Bông', 56, 1, 12),
(467, 'Krông Búk', 56, 1, 13),
(468, 'Krông Năng', 56, 1, 14),
(469, 'Krông Nô', 56, 1, 15),
(470, 'Krông Pắc', 56, 1, 16),
(471, 'Lắk', 56, 1, 17),
(472, 'M''Đrắt', 56, 1, 18),
(176, 'Bảo Lạc', 57, 1, 1),
(177, 'Cao Bắng', 57, 1, 2),
(178, 'Hạ Lang', 57, 1, 3),
(179, 'Hà Quảng', 57, 1, 4),
(180, 'Hòa An', 57, 1, 5),
(181, 'Nguyên Bình', 57, 1, 6),
(182, 'Quảng Hòa', 57, 1, 7),
(183, 'Thạch An', 57, 1, 8),
(184, 'Thông Nông', 57, 1, 9),
(185, 'Trà Lĩnh', 57, 1, 10),
(186, 'Trùng Khánh', 57, 1, 11),
(491, 'Cà Mau', 58, 1, 1),
(492, 'Cái Nước', 58, 1, 2),
(493, 'Đầm Dơi', 58, 1, 3),
(494, 'Ngọc Hiển', 58, 1, 4),
(495, 'Thới Bình', 58, 1, 5),
(496, 'Trần Văn Thời', 58, 1, 6),
(497, 'U Minh', 58, 1, 7),
(887, 'Năm Căn', 58, 1, 8),
(888, 'Phú Tân', 58, 1, 9),
(654, 'Bắc Bình', 59, 1, 1),
(655, 'Đức Linh', 59, 1, 2),
(656, 'Hàm Tân', 59, 1, 3),
(657, 'Hàm Thuận Bắc', 59, 1, 4),
(658, 'Hàm Thuận Nam', 59, 1, 5),
(659, 'Phan Thiết', 59, 1, 6),
(660, 'Phú Quí', 59, 1, 7),
(661, 'Tánh Linh', 59, 1, 8),
(662, 'Tuy Phong', 59, 1, 9),
(897, 'La Gi', 59, 1, 10),
(836, 'Bình Long', 60, 1, 1),
(839, 'Phước Long', 60, 1, 2),
(851, 'Bù Ðăng', 60, 1, 3),
(852, 'Chơn Thành', 60, 1, 4),
(473, 'Bến Cát', 61, 1, 1),
(474, 'Dầu Tiếng', 61, 1, 2),
(475, 'Dĩ An', 61, 1, 3),
(476, 'Tân Uyên', 61, 1, 4),
(477, 'Thủ Dầu Một', 61, 1, 5),
(478, 'Thuận An', 61, 1, 6),
(841, 'Lái Thiêu', 61, 1, 7),
(896, 'Phú Giáo', 61, 1, 8),
(158, 'An Lão', 62, 1, 1),
(159, 'An Nhơn', 62, 1, 2),
(160, 'Hoài Ân', 62, 1, 3),
(161, 'Hoài Nhơn', 62, 1, 4),
(162, 'Phù Cát', 62, 1, 5),
(163, 'Phù Mỹ', 62, 1, 6),
(164, 'Qui Nhơn', 62, 1, 7),
(165, 'Tây Sơn', 62, 1, 8),
(166, 'Tuy Phước', 62, 1, 9),
(167, 'Vân Canh', 62, 1, 10),
(168, 'Vĩnh Thạnh', 62, 1, 11),
(673, 'Ba Tri', 63, 1, 1),
(674, 'Bến Tre', 63, 1, 2),
(675, 'Bình Đại', 63, 1, 3),
(676, 'Châu Thành', 63, 1, 4),
(677, 'Chợ Lách', 63, 1, 5),
(678, 'Giồng Trôm', 63, 1, 6),
(679, 'Mỏ Cày', 63, 1, 7),
(680, 'Thạnh Phú', 63, 1, 8),
(483, 'Bắc Ninh', 64, 1, 1),
(484, 'Gia Bình', 64, 1, 2),
(485, 'Lương Tài', 64, 1, 3),
(486, 'Quế Võ', 64, 1, 4),
(487, 'Thuận Thành', 64, 1, 5),
(488, 'Tiên Du', 64, 1, 6),
(489, 'Từ Sơn', 64, 1, 7),
(490, 'Yên Phong', 64, 1, 8),
(479, 'Bạc Liêu', 65, 1, 1),
(480, 'Giá Rai', 65, 1, 2),
(481, 'Hồng Dân', 65, 1, 3),
(482, 'Vĩnh Lợi', 65, 1, 4),
(884, 'Phước Long', 65, 1, 5),
(885, 'Đông Hải', 65, 1, 6),
(886, 'Hòa Bình', 65, 1, 7),
(169, 'Ba Bể', 66, 1, 1),
(170, 'Bắc Kạn', 66, 1, 2),
(171, 'Bạch Thông ', 66, 1, 3),
(172, 'Chợ Đồn', 66, 1, 4),
(173, 'Chợ Mới', 66, 1, 5),
(174, 'Na Rì', 66, 1, 6),
(175, 'Ngân Sơn', 66, 1, 7),
(663, 'Bắc Giang', 67, 1, 1),
(664, 'Hiệp Hòa', 67, 1, 2),
(665, 'Lạng Giang', 67, 1, 3),
(666, 'Lục Nam', 67, 1, 4),
(667, 'Lục Ngạn', 67, 1, 5),
(668, 'Sơn Động', 67, 1, 6),
(669, 'Tân Yên', 67, 1, 7),
(670, 'Việt Yên', 67, 1, 8),
(671, 'Yên Dũng', 67, 1, 9),
(672, 'Yên Thế', 67, 1, 10),
(151, 'Bà Rịa', 68, 1, 1),
(152, 'Châu Đất', 68, 1, 2),
(153, 'Côn Đảo', 68, 1, 3),
(154, 'Long Đất', 68, 1, 4),
(155, 'Tân Thành', 68, 1, 5),
(156, 'Vũng Tàu', 68, 1, 6),
(157, 'Xuyên Mộc', 68, 1, 7),
(898, 'Long Điền', 68, 1, 8),
(899, 'Đất Đỏ', 68, 1, 9),
(643, 'An Phú', 69, 1, 1),
(644, 'Châu Đốc', 69, 1, 2),
(645, 'Châu Phú', 69, 1, 3),
(646, 'Châu Thành', 69, 1, 4),
(647, 'Chợ Mới', 69, 1, 5),
(648, 'Long Xuyên', 69, 1, 6),
(649, 'Phú Tân', 69, 1, 7),
(650, 'Tân Châu', 69, 1, 8),
(651, 'Thoại Sơn', 69, 1, 9),
(652, 'Tịnh Biên', 69, 1, 10),
(653, 'Tri Tôn', 69, 1, 11),
(249, 'An Hải', 70, 1, 1),
(250, 'An Lão', 70, 1, 2),
(251, 'Bạch Long Vỹ', 70, 1, 3),
(253, 'Đồ Sơn', 70, 1, 4),
(254, 'Hồng Bàng', 70, 1, 5),
(255, 'Kiến An', 70, 1, 6),
(256, 'Kiến Thụy', 70, 1, 7),
(257, 'Lê Chân', 70, 1, 8),
(258, 'Ngô Quyền', 70, 1, 9),
(259, 'Thủy Nguyên', 70, 1, 10),
(260, 'Tiên Lãng', 70, 1, 11),
(261, 'Vĩnh Bảo', 70, 1, 12),
(854, 'Cát Bà', 70, 1, 13),
(900, 'Dương Kinh', 70, 1, 14),
(819, 'Đảo Hòang Sa', 71, 1, 1),
(820, 'Hải Châu', 71, 1, 2),
(821, 'Hòa Vang', 71, 1, 3),
(822, 'Liên Chiểu', 71, 1, 4),
(823, 'Ngũ Hành Sơn', 71, 1, 5),
(824, 'Sơn Trà', 71, 1, 6),
(825, 'Thanh Khê', 71, 1, 7),
(844, 'Cẩm Lệ', 71, 1, 8),
(681, 'Cần Thơ', 72, 1, 1),
(684, 'Ô Môn', 72, 1, 2),
(686, 'Thốt Nốt', 72, 1, 3),
(837, 'Ninh Kiều', 72, 1, 4),
(848, 'Cái Răng', 72, 1, 5),
(855, 'Bình Thủy', 72, 1, 6),
(892, 'Phong Điền', 72, 1, 7),
(893, 'Cờ Đỏ', 72, 1, 8),
(894, 'Thới Lai', 72, 1, 9),
(895, 'Vĩnh Thạnh', 72, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `videoid` varchar(24) NOT NULL,
  `reporter` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext NOT NULL,
  `checked` int(9) NOT NULL DEFAULT '5',
  `viewed` tinyint(1) DEFAULT NULL,
  `datecreat` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE IF NOT EXISTS `server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `externalsv_id` int(11) NOT NULL,
  `localsv_id` int(11) NOT NULL,
  `folder_key` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quickery` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `video_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `externalsv_id` (`externalsv_id`),
  KEY `video_id` (`video_id`),
  KEY `localsv_id` (`localsv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `seo_keywords` text NOT NULL,
  `seo_description` text NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 NOT NULL,
  `address` varchar(256) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(100) NOT NULL,
  `yahoo` varchar(100) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(256) NOT NULL,
  `url` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `linkweb` text,
  `keyword` varchar(500) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `created` date NOT NULL,
  `modified` text NOT NULL,
  `about` text CHARACTER SET utf8 NOT NULL,
  `introduction` text CHARACTER SET utf8,
  `logo1` text,
  `logo_footer` text,
  `ico` text,
  `sologen` text,
  `printerest` text,
  `youtube_acount` text,
  `facebook` text,
  `facebook_text` text,
  `tweets` text,
  `tweets_text` text,
  `github` text,
  `google` text,
  `feed` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `seo_keywords`, `seo_description`, `title`, `address`, `phone`, `yahoo`, `skype`, `mobile`, `fax`, `email`, `url`, `linkweb`, `keyword`, `description`, `created`, `modified`, `about`, `introduction`, `logo1`, `logo_footer`, `ico`, `sologen`, `printerest`, `youtube_acount`, `facebook`, `facebook_text`, `tweets`, `tweets_text`, `github`, `google`, `feed`) VALUES
(1, 'Công Ty Công Nghệ  Alataca', 'Magento, Varien, E-commerce,zend,alatca', 'Default Description', 'Công Nghệ  Alataca', '4506 CT12A - Khu đô thị Kim Văn - Kim Lũ - Đại Kim - Hoàng Mai - Hà Nội.', '0473.028989 Fax 0473.078989', 'adv.globalmedia2', 'adv.globalmedia2', '0987150968', '04.3623 0937 ', 'phuonganhpac@gmail.com', 'alatca.vn', 'http://adslink.eu', 'Công Ty Công Nghệ  Alataca', 'Công Ty Công Nghệ  Alataca', '0000-00-00', '1403724682', '<p style="padding-bottom: 5px;">\r\n	- Lưu th&ocirc;ng tin sản phẩm y&ecirc;u th&iacute;ch v&agrave; chia sẽ danh s&aacute;ch đ&oacute; cho bạn b&egrave; hoặc người th&acirc;n</p>\r\n<p style="padding-bottom: 5px;">\r\n	- Nhận email b&aacute;o gi&aacute; cho sản phẩm bạn đang quan t&acirc;m</p>\r\n<p style="padding-bottom: 5px;">\r\n	- Bạn c&oacute; thể viết đ&aacute;nh gi&aacute; cho sản phẩm hoặc cho cửa h&agrave;ng</p>\r\n<p style="padding-bottom: 5px;">\r\n	- Bạn c&oacute; thể viết đ&aacute;nh gi&aacute; cho sản phẩm hoặc cho cửa h&agrave;ng</p>\r\n', 'Lang Ha, Tang15, 4a Lang ha, Dong Da, Ha Noi, Vietnam', '11418521_792780610817907_1530775323_n.jpg', 'footer-2.png', 'favicon.ico', 'Sed ut perspiciatis unde omnis iste natus voluptatem accusantium doloremque lauda totam rem aperiam sunshine love.', NULL, NULL, 'nobility8989 @gmail.com', '<div class="pull-left-none">\r\n																				<span class="tweetprofilelink"> <strong><a\r\n																						href="https://www.facebook.com/nobility8989 @gmail.com">nobility8989 @gmail.com</a></strong>\r\n																					<a href="https://www.facebook.com/nobility8989 @gmail.com">@nobility8989 @gmail.com</a>\r\n																				</span>\r\n																				<p>Orenmode - Responsive Magento Theme\r\n																					http://mobility88.tk</p>\r\n																			</div>\r\n																			<div class="date">one limit</div>', 'nobility8989 @gmail.com', '<div class="pull-left-none">\r\n																				<span class="tweetprofilelink"> <strong><a\r\n																						href="https://twitter.com/alothemes">alothemes</a></strong>\r\n																					<a href="https://twitter.com/alothemes">@alothemes</a>\r\n																				</span>\r\n																				<p>Owlshop - Responsive Magento Theme\r\n																					http://t.co/aZgY52qE8K</p>\r\n																			</div>\r\n																			<div class="date">72 days ago</div>', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `img` text,
  `text` text,
  `link` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `img`, `text`, `link`, `status`) VALUES
(1, 'slideshow_1435543718.jpg', '   <div class="iview-caption caption5" data-x="573" data-y="43" data-height="20" data-transition="fade" style="opacity: 1; top: 43px; left: 573px; width: 125px; height: 20px;"><div class="caption-contain" style="position: relative; width: 125px; height: 20px; opacity: 1; top: 0px; left: 0px;">Are\r\n                                                you Ready ?</div></div>\r\n                                            <div class="iview-caption caption1 blackcaption" data-x="509" data-y="104" style="opacity: 1; top: 104px; left: 509px; width: 260px; height: 69px;"><div class="caption-contain" style="position: relative; width: 260px; height: 69px; opacity: 1; top: 0px; left: 0px;">Sweater*</div></div>\r\n                                            <div class="iview-caption caption3 blackcaption" data-x="468" data-y="170" data-height="26" data-width="500" style="opacity: 1; top: 170px; left: 468px; width: 500px; height: 26px;"><div class="caption-contain" style="position: relative; width: 500px; height: 26px; opacity: 1; top: 0px; left: 0px;">Biggest Arrival of the Month</div></div>\r\n                                            <div class="iview-caption caption4 blackcaption" data-x="537" data-y="208" data-height="28" style="opacity: 1; top: 208px; left: 537px; width: 203px; height: 28px;"><div class="caption-contain" style="position: relative; width: 203px; height: 28px; opacity: 1; top: 0px; left: 0px;">*Hurry\r\n                                                in December 10th - 16th !</div></div>\r\n                                            <div class="iview-caption caption6 blackcaption" data-x="579" data-y="255" data-height="43" data-width="200" style="opacity: 1; top: 255px; left: 579px; width: 200px; height: 43px;"><div class="caption-contain" style="position: relative; width: 200px; height: 43px; opacity: 1; top: 0px; left: 0px;">View more</div></div>\r\n                                        ', 'http://rohlik.cz.localhost:20134/main/index', 1),
(2, 'slideshow_1435543700.jpg', '   <div class="iview-caption caption5" data-x="573" data-y="43" data-height="20" data-transition="fade" style="opacity: 1; top: 43px; left: 573px; width: 125px; height: 20px;"><div class="caption-contain" style="position: relative; width: 125px; height: 20px; opacity: 1; top: 0px; left: 0px;">Are\r\n                                                you Ready ?</div></div>\r\n                                            <div class="iview-caption caption1 blackcaption" data-x="509" data-y="104" style="opacity: 1; top: 104px; left: 509px; width: 260px; height: 69px;"><div class="caption-contain" style="position: relative; width: 260px; height: 69px; opacity: 1; top: 0px; left: 0px;">Sweater*</div></div>\r\n                                            <div class="iview-caption caption3 blackcaption" data-x="468" data-y="170" data-height="26" data-width="500" style="opacity: 1; top: 170px; left: 468px; width: 500px; height: 26px;"><div class="caption-contain" style="position: relative; width: 500px; height: 26px; opacity: 1; top: 0px; left: 0px;">Biggest Arrival of the Month</div></div>\r\n                                            <div class="iview-caption caption4 blackcaption" data-x="537" data-y="208" data-height="28" style="opacity: 1; top: 208px; left: 537px; width: 203px; height: 28px;"><div class="caption-contain" style="position: relative; width: 203px; height: 28px; opacity: 1; top: 0px; left: 0px;">*Hurry\r\n                                                in December 10th - 16th !</div></div>\r\n                                            <div class="iview-caption caption6 blackcaption" data-x="579" data-y="255" data-height="43" data-width="200" style="opacity: 1; top: 255px; left: 579px; width: 200px; height: 43px;"><div class="caption-contain" style="position: relative; width: 200px; height: 43px; opacity: 1; top: 0px; left: 0px;">View more</div></div>\r\n                                        ', 'http://rohlik.cz.localhost:20134/main/index', 1),
(3, 'slideshow_1435543679.jpg', ' <div class="iview-caption caption5" data-x="573" data-y="43" data-height="20" data-transition="fade" style="opacity: 1; top: 43px; left: 573px; width: 114px; height: 20px;"><div class="caption-contain" style="position: relative; width: 114px; height: 20px; opacity: 1; top: 0px; left: 0px;">New\r\n                                                Arrivals !</div></div>\r\n                                            <div class="iview-caption caption1 blackcaption" data-x="489" data-y="104" data-width="500" style="opacity: 1; top: 104px; left: 489px; width: 500px; height: 69px;"><div class="caption-contain" style="position: relative; width: 500px; height: 69px; opacity: 1; top: 0px; left: 0px;">JK-\r\n                                                Outet*</div></div>\r\n                                            <div class="iview-caption caption3 blackcaption" data-x="448" data-y="170" data-height="26" data-width="500" style="opacity: 1; top: 170px; left: 448px; width: 500px; height: 26px;"><div class="caption-contain" style="position: relative; width: 500px; height: 26px; opacity: 1; top: 0px; left: 0px;">Take cover - latest Accessories</div></div>\r\n                                            <div class="iview-caption caption4 blackcaption" data-x="537" data-y="208" data-height="28" style="opacity: 1; top: 208px; left: 537px; width: 206px; height: 28px;"><div class="caption-contain" style="position: relative; width: 206px; height: 28px; opacity: 1; top: 0px; left: 0px;">*Hurry\r\n                                                in December 10th - 16th !</div></div>\r\n                                            <div class="iview-caption caption6 blackcaption" data-x="579" data-y="255" data-height="43" data-width="200" style="opacity: 1; top: 255px; left: 579px; width: 200px; height: 43px;"><div class="caption-contain" style="position: relative; width: 200px; height: 43px; opacity: 1; top: 0px; left: 0px;">View more</div></div>\r\n                                       ', 'http://rohlik.cz.localhost:20134/main/index', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(100) DEFAULT NULL,
  `child` longtext,
  `date_creat` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `status` int(100) DEFAULT NULL,
  `alias` text,
  `img` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `parent`, `child`, `date_creat`, `date_modified`, `status`, `alias`, `img`, `description`) VALUES
(24, 'Dove', NULL, NULL, '2015-06-13', '2015-06-13', 1, 'dove,', 'thumb_1434167496.jpg', ''),
(25, 'Tags', 24, NULL, '2015-06-13', '2015-06-13', 1, 'od-?eskeho-farma?e-lazni?ka-bor?vkovy-knedlik-200g-3ks', 'thumb_1434167768.jpg', 'Lahodný knedlík od Lázni?ky pln?ný bor?vkami. Nejlépe podávat s cukrem a rozteklým máslem.'),
(27, 'templa?ske-chardonnay', 30, NULL, '2015-06-13', '2015-06-13', 1, 'templa-ske-chardonnay', 'thumb_1434169360.jpg', ''),
(28, 'Hot', 25, NULL, '2015-06-13', '2015-06-13', 1, 'rio-mare-tu?ak-v-raj?atove-oma?ce-160g', 'thumb_1434169573.jpg', '\r\nAlergeny: Ryby a výrobky z nich'),
(29, 'Nestlé Strawberry', NULL, NULL, '2015-06-13', '2015-06-13', 0, 'nestle-strawberry', 'thumb_1434169671.jpg', ''),
(30, 'Moi', 24, NULL, '2015-06-27', '2015-06-27', 0, 'moi', 'thumb_1435303614.jpg', 'name'),
(32, 'Flevox Antiparazitní', NULL, NULL, '2015-07-13', '2015-07-13', 0, 'flevox-antiparazitni', 'thumb_1434170336.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `sex` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacture`
--

CREATE TABLE IF NOT EXISTS `tbl_manufacture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(256) NOT NULL,
  `alias` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL,
  `img` varchar(256) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_manufacture`
--

INSERT INTO `tbl_manufacture` (`id`, `manu_name`, `alias`, `description`, `status`, `img`, `date`) VALUES
(3, 'Toshiba', 'toshiba', 'Toshiba', 1, 'imgManufa/YWFhLmpwZw=1435647203.jpg', '0000-00-00'),
(4, 'Sam sung', 'sam-sung', 'Sam sung', 1, 'imgManufa/MjAxMTA1MjYxMjUwMzI5NDcuanB1435647181.jpg', '0000-00-00'),
(6, 'Alvinh', 'alvinh', 'sdfghj', 1, 'imgManufa/MjE1OTU2N18xMjQ1OTAyNjAyM3oyQy5qcGc1435647161.jpg', '0000-00-00'),
(7, 'aaaaaa', 'aaaaaa', 'aaaaaaaaaaaaaaaaaa', 0, 'imgManufa/YmNhLmpwZw=1436504772.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tinhthanh`
--

CREATE TABLE IF NOT EXISTS `tinhthanh` (
  `ID` int(11) NOT NULL,
  `TenTinhThanh` varchar(255) NOT NULL,
  `XuatBan` tinyint(4) NOT NULL,
  `ThuTu` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
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

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `seriecode` varchar(15) CHARACTER SET utf8 NOT NULL,
  `catelog` varchar(100) CHARACTER SET utf8 NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `tags` mediumtext CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `views` int(24) DEFAULT NULL,
  `sticky` int(11) DEFAULT NULL,
  `duration` time NOT NULL,
  `ads_pre` int(11) NOT NULL,
  `ads_mid` int(11) NOT NULL,
  `ads_bot` int(11) NOT NULL,
  `banner` int(11) NOT NULL,
  `folder_key` varchar(256) NOT NULL,
  `quick_key` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `local_link` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgfolder` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `externalsv_id` int(11) NOT NULL,
  `localsv_id` int(11) NOT NULL,
  `external_link` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `folder_id` (`folder_key`),
  KEY `externalsv_id` (`externalsv_id`),
  KEY `externalsv_id_2` (`externalsv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `video_sv`
--

CREATE TABLE IF NOT EXISTS `video_sv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `localsv_id` int(11) NOT NULL,
  `local_link` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgfolder` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `externalsv_id` int(11) NOT NULL,
  `folder_key` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quick_key` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `video_id` (`video_id`),
  KEY `localsv_id` (`localsv_id`),
  KEY `externalsv_id` (`externalsv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE IF NOT EXISTS `visa` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `visa_type` text,
  `text_visatype` text,
  `is_emb` int(100) DEFAULT NULL,
  `is_urgently` int(100) DEFAULT NULL,
  `date_arrival` date DEFAULT NULL,
  `date_exit` date DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `flight_number` float DEFAULT NULL,
  `private_letter` int(100) DEFAULT NULL,
  `fasttrack` int(100) DEFAULT NULL,
  `pickup` int(100) DEFAULT NULL,
  `purpose` text,
  `arrival_port` text,
  `location` text,
  `text_location` text,
  `text_express` text,
  `promotion_discount` int(100) DEFAULT NULL,
  `discount_value` int(100) DEFAULT NULL,
  `discount_amount` float DEFAULT NULL,
  `express` int(100) DEFAULT NULL,
  `service` bigint(100) DEFAULT NULL,
  `email_discount` int(100) DEFAULT NULL,
  `number_of` int(100) DEFAULT NULL,
  `promotion_code` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='visa infor and status visa \r\nngay hen den lay' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `visa`
--

INSERT INTO `visa` (`id`, `visa_type`, `text_visatype`, `is_emb`, `is_urgently`, `date_arrival`, `date_exit`, `arrival_time`, `flight_number`, `private_letter`, `fasttrack`, `pickup`, `purpose`, `arrival_port`, `location`, `text_location`, `text_express`, `promotion_discount`, `discount_value`, `discount_amount`, `express`, `service`, `email_discount`, `number_of`, `promotion_code`) VALUES
(3, '1ms', '1 month single entry', 0, 0, '2015-05-19', '2015-05-19', '00:00:00', 0, 0, 0, 0, 'Tourist', 'Noi Bai (Hanoi city)', '', 'Select one', '2 working days', NULL, 0, 0, 0, 19, 0, 1, 0),
(4, '1ms', '1 month single entry', 0, 0, '2015-05-21', '2015-05-21', '00:00:00', 0, 0, 0, 0, 'Tourist', 'Noi Bai (Hanoi city)', '', 'Select one', '2 working days', NULL, 0, 0, 0, 19, 0, 1, 6767),
(5, '1ms', '1 month single entry', 0, 0, '2015-05-19', '2015-05-19', '00:00:00', 0, 0, 0, 0, 'Tourist', 'Noi Bai (Hanoi city)', '', 'Select one', '2 working days', NULL, 0, 0, 0, 19, 0, 1, 3222),
(6, '1ms', '1 month single entry', 0, 0, '2015-05-19', '2015-05-19', '00:00:00', 0, 0, 0, 0, 'Tourist', 'Noi Bai (Hanoi city)', '', 'Select one', '2 working days', NULL, 0, 0, 0, 19, 0, 1, 43454),
(7, '1ms', '1 month single entry', 0, 0, '2015-05-19', '2015-05-19', '00:00:00', 0, 0, 0, 0, 'Tourist', 'Noi Bai (Hanoi city)', '', 'Select one', '2 working days', NULL, 0, 0, 0, 19, 0, 1, 2323232),
(8, '1ms', '1 month single entry', 0, 0, '2015-05-19', '2015-05-19', '00:00:00', 0, 0, 0, 0, 'Tourist', 'Noi Bai (Hanoi city)', '', 'Select one', '2 working days', NULL, 0, 0, 0, 19, 0, 1, 3456);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
