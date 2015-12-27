-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.8 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for rohlikcz
CREATE DATABASE IF NOT EXISTS `host5_bagseshop` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `host5_bagseshop`;


-- Dumping structure for table host5_bagseshop.admin
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.admin: ~2 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `firstname`, `telephone`, `fax`, `street_1`, `street_2`, `postcode`, `country`, `city`, `region`, `company`, `lastname`, `password`, `email`, `avatar`, `group`, `channel_code`, `playlist_id`, `datetime`, `recover`, `birthday`, `externalsv_id`, `folder_key`, `folder_name`, `default_billing`, `default_shipping`) VALUES
	(1, 'admin', 'Hoang ', '0972607988', 'dgfgdffdgf', 'Ha noi', 'Lang Ha ', '10000', '', '4353453454', '', 'Viet Nam', 'Cong Phuc', '$2a$14$ggeIsXb4gIMun69Xi5xlKuwmkT03czTWGjA.wo74Odh7va1UBHHP2', 'gstearmit@gmail.com', 'http://rohlik.cz.localhost:20134/admintheme/images/avatar.jpg', 'supperadmin', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 13, '', '', 1, 1),
	(51, 'testnay', 'ss', '0000000000', '\0', '', '', '0', '', '', '0', '', 'sssss', '$2a$14$kbrX/d2o0gvtZsB8gByWKuRX6PYdJ16KGn0DEbPBrrfhiBnrdjxPG', 'phuca4@gmail.com', '/img/avatar.jpg', 'member', '', '', '2015-05-14 12:12:22', '', '0000-00-00 00:00:00', 0, '', '', NULL, NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.ads_bot
CREATE TABLE IF NOT EXISTS `ads_bot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ads` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table host5_bagseshop.ads_bot: ~2 rows (approximately)
/*!40000 ALTER TABLE `ads_bot` DISABLE KEYS */;
INSERT INTO `ads_bot` (`id`, `title`, `ads`, `time`, `username`) VALUES
	(3, 'Post-lipton', 'http://videostreaming-ipcamera.tk/ADS-VIDEO-SKIP/HTML5-vast-pre-roll-video-ads-with-skip/vod/lipton_5sec.mp4', 10, 'fox'),
	(10, 'banner-post', '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <!-- 3001 --> <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-4102977445319975" data-ad-slot="4833379246"></ins> <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>', 5, 'fox');
/*!40000 ALTER TABLE `ads_bot` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.ads_mid
CREATE TABLE IF NOT EXISTS `ads_mid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ads` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table host5_bagseshop.ads_mid: ~4 rows (approximately)
/*!40000 ALTER TABLE `ads_mid` DISABLE KEYS */;
INSERT INTO `ads_mid` (`id`, `title`, `ads`, `time`, `username`) VALUES
	(1, 'adsmid', 'http://clipmediagroup.eu.localhost:1810/sample.mp4', 10, 'fox'),
	(18, 'Mid - lipton', 'http://videostreaming-ipcamera.tk/ADS-VIDEO-SKIP/HTML5-vast-pre-roll-video-ads-with-skip/vod/lipton_5sec.mp4', 10, 'fox'),
	(19, 'ten thoi ma', 'http://clipmediagroup.eu/sample.mp4', 12, 'fox'),
	(22, 'banner-mid', '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <!-- 3001 --> <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-4102977445319975" data-ad-slot="4833379246"></ins> <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>', 5, 'fox');
/*!40000 ALTER TABLE `ads_mid` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.ads_pre
CREATE TABLE IF NOT EXISTS `ads_pre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ads` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table host5_bagseshop.ads_pre: ~3 rows (approximately)
/*!40000 ALTER TABLE `ads_pre` DISABLE KEYS */;
INSERT INTO `ads_pre` (`id`, `title`, `ads`, `time`, `username`) VALUES
	(13, 'sasa', '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>\r\n<!-- 3001 -->\r\n<ins class="adsbygoogle"\r\n     style="display:inline-block;width:300px;height:250px"\r\n     data-ad-client="ca-pub-4102977445319975"\r\n     data-ad-slot="4833379246"></ins>\r\n<script>\r\n(adsbygoogle = window.adsbygoogle || []).push({});\r\n</script>', 12, 'fox'),
	(15, 'ads', '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>\r\n<!-- 3001 -->\r\n<ins class="adsbygoogle"\r\n     style="display:inline-block;width:300px;height:250px"\r\n     data-ad-client="ca-pub-4102977445319975"\r\n     data-ad-slot="4833379246"></ins>\r\n<script>\r\n(adsbygoogle = window.adsbygoogle || []).push({});\r\n</script>', 12, 'fox'),
	(18, 'link', 'http://clipmediagroup.eu.localhost:1810/sample.mp4', 12, 'fox');
/*!40000 ALTER TABLE `ads_pre` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.album
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.album: ~0 rows (approximately)
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
/*!40000 ALTER TABLE `album` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.banner_ads
CREATE TABLE IF NOT EXISTS `banner_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `adscode` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `time` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user` varchar(1100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table host5_bagseshop.banner_ads: ~4 rows (approximately)
/*!40000 ALTER TABLE `banner_ads` DISABLE KEYS */;
INSERT INTO `banner_ads` (`id`, `title`, `adscode`, `time`, `status`, `date`, `user`) VALUES
	(12, 'banner', '<script type="text/javascript" src="http://s15.bestmediainvestgroup.eu/core/pub?ads=10357&zoneid=9999&cn=999921357"></script><script type="text/javascript" src="http://s15.bestmediainvestgroup.eu/public/js/adse.js"></script>\r\n', 10, 1, '2015-05-08', 'fox'),
	(13, 'baloom-top-banner', '<script type="text/javascript" src="http://s15.bestmediainvestgroup.eu/core/pub?ads=10681&zoneid=9999&cn=999950681"></script><script type="text/javascript" src="http://s15.bestmediainvestgroup.eu/public/js/adse.js"></script>', 10, 1, '2015-05-08', 'fox'),
	(14, 'google-ads', '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <!-- 3001 --> <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-4102977445319975" data-ad-slot="4833379246"></ins> <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>', 10, 1, '2015-05-08', 'fox'),
	(15, 'banner-300x250', '<script type="text/javascript" src="http://s15.bestmediainvestgroup.eu/core/pub?ads=10681&zoneid=9999&cn=999950681"></script><script type="text/javascript" src="http://s15.bestmediainvestgroup.eu/public/js/adse.js"></script>', 10, 1, '2015-05-08', 'fox');
/*!40000 ALTER TABLE `banner_ads` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.buyertable
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.buyertable: ~0 rows (approximately)
/*!40000 ALTER TABLE `buyertable` DISABLE KEYS */;
/*!40000 ALTER TABLE `buyertable` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.catelog
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
  `alias` text,
  `img` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.catelog: ~11 rows (approximately)
/*!40000 ALTER TABLE `catelog` DISABLE KEYS */;
INSERT INTO `catelog` (`id`, `name`, `parent`, `child`, `date_creat`, `date_modified`, `hot`, `status`, `new`, `alias`, `img`, `description`) VALUES
	(1, 'Accessories', NULL, '', '0000-00-00', '0000-00-00', 0, 1, 0, 'accessories', NULL, 'Accessories'),
	(2, 'New Arrivals', 1, '', '0000-00-00', '0000-00-00', 0, 1, 1, 'new-arrivals', NULL, 'new-arrivals'),
	(3, 'Christmas Gifting', 1, '', '0000-00-00', '0000-00-00', 0, 1, 1, 'christmas-gifting', NULL, 'christmas-gifting'),
	(4, 'Workwear', 1, '', '0000-00-00', '0000-00-00', 0, 1, 1, 'workwear', NULL, 'Workwear'),
	(5, 'Surf Skate', 1, '', '0000-00-00', '0000-00-00', 0, 1, 1, 'surf-skate', NULL, 'surf-skate'),
	(6, 'Clothing', NULL, '', '0000-00-00', '0000-00-00', 0, 1, 0, 'clothing', NULL, NULL),
	(7, 'Dresses', 6, '', '0000-00-00', '0000-00-00', 0, 1, 0, 'dresses', NULL, NULL),
	(9, 'Skirts', 6, '', '0000-00-00', '0000-00-00', 0, 1, 0, 'skirts', NULL, 'Skirts'),
	(15, 'Tops', NULL, NULL, '2015-05-30', '2015-05-30', 1, 1, 1, 'tops', 'thumb_1432981741.jpg', 'Tops'),
	(16, 'Hoang Phuc Test', NULL, NULL, '2015-06-11', '2015-06-11', 1, 1, 1, 'hoang-phuc-test', 'thumb_1434007920.jpg', 'hoang phuc'),
	(17, 'wqewewq', NULL, NULL, '2015-06-01', '2015-06-01', 1, 0, 1, 'wqewewq', NULL, '');
/*!40000 ALTER TABLE `catelog` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.chanel
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.chanel: ~0 rows (approximately)
/*!40000 ALTER TABLE `chanel` DISABLE KEYS */;
/*!40000 ALTER TABLE `chanel` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.checkout
CREATE TABLE IF NOT EXISTS `checkout` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `tracking_id` text NOT NULL,
  `total` bigint(100) DEFAULT NULL,
  `visa_id` int(100) DEFAULT NULL,
  `date_creat` date DEFAULT NULL,
  `status_pay` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Thong Tin hoa don';

-- Dumping data for table host5_bagseshop.checkout: ~6 rows (approximately)
/*!40000 ALTER TABLE `checkout` DISABLE KEYS */;
INSERT INTO `checkout` (`id`, `tracking_id`, `total`, `visa_id`, `date_creat`, `status_pay`) VALUES
	(2, 'EVT.12017', 19, 3, '2015-05-19', 0),
	(3, 'EVT.12018', 19, 4, '2015-05-19', 0),
	(4, 'EVT.12019', 19, 5, '2015-05-19', 0),
	(5, 'EVT.12020', 19, 6, '2015-05-19', 0),
	(6, 'EVT.12021', 19, 7, '2015-05-19', 0),
	(7, 'EVT.12022', 19, 8, '2015-05-19', 0);
/*!40000 ALTER TABLE `checkout` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.contact
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.contact: ~14 rows (approximately)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.countryn
CREATE TABLE IF NOT EXISTS `countryn` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `countrycode` varchar(256) DEFAULT NULL,
  `namecountry` varchar(250) DEFAULT NULL,
  `code` varchar(250) DEFAULT NULL,
  `capital` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- Dumping data for table host5_bagseshop.countryn: 62 rows
/*!40000 ALTER TABLE `countryn` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `countryn` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.declaration
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='declaration -- mau de loc du lieu';

-- Dumping data for table host5_bagseshop.declaration: ~2 rows (approximately)
/*!40000 ALTER TABLE `declaration` DISABLE KEYS */;
INSERT INTO `declaration` (`id`, `product_code`, `name_id`, `host`, `url`, `page_taken`, `avatar_images`, `directoryavatar`, `product_name`, `product_price`, `product_images`, `product_descriptstion`, `detail_product_descriptstion`, `countryoforigin`, `product_promotion`, `product_href_detail`) VALUES
	(5, 1915, 2, 'https://www.rohlik.cz', 'https://www.rohlik.cz/c75533-napoje', 12, NULL, 'upload', 'div.items article h3', 'div.items article h6', 'img.grocery-image-placeholder', NULL, 'div#popup_dsc', 'li.country', 'div.items article div.ico', 'div.items article h3'),
	(6, 1487, 3, 'https://www.rohlik.cz', 'https://www.rohlik.cz/c133337-alkohol-a-tabak', 12, NULL, 'upload', 'div.items article h3', 'div.items article h6', 'div.items article a.img img', NULL, 'div#popup_dsc', 'li.country', 'div.items article div.ico', 'div.items article h3'),
	(10, 1487, 3, 'https://www.rohlik.cz', 'https://www.rohlik.cz/c133337-alkohol-a-tabak', 12, NULL, 'upload', 'div.items article h3', 'div.items article h6', 'div.items article a.img img', NULL, 'div#popup_dsc', 'li.country', 'div.items article div.ico', 'div.items article h3');
/*!40000 ALTER TABLE `declaration` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.declaration_detail
CREATE TABLE IF NOT EXISTS `declaration_detail` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `declaration_id` int(100) DEFAULT NULL,
  `product_descriptstion` text,
  `detail_product_descriptstion` text,
  `href_detail` text,
  `img0` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='declaration\r\nluu cac thong tin detail cua product';

-- Dumping data for table host5_bagseshop.declaration_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `declaration_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `declaration_detail` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.externalsv
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.externalsv: ~0 rows (approximately)
/*!40000 ALTER TABLE `externalsv` DISABLE KEYS */;
/*!40000 ALTER TABLE `externalsv` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.folder_sv
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.folder_sv: ~0 rows (approximately)
/*!40000 ALTER TABLE `folder_sv` DISABLE KEYS */;
/*!40000 ALTER TABLE `folder_sv` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.helps
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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.helps: 2 rows
/*!40000 ALTER TABLE `helps` DISABLE KEYS */;
INSERT INTO `helps` (`id`, `name`, `name1`, `name2`, `title`, `sdt`, `sdt1`, `sdt2`, `yahoo`, `yahoo1`, `yahoo2`, `skype`, `skype1`, `skype2`, `created`, `modified`, `status`) VALUES
	(28, 'Nhân viên kỹ thuật', '', '', '', '0979607988', '', '', 'adv.globaolmedia2@yahoo.com', '', '', 'adv.globaolmedia2', '', '', '2012-04-27 06:54:17', '2014-06-25 21:52:28', 1),
	(29, 'Hỗ trợ kinh doanh - Mr Phuc', '', '', '', '0979607988', '', '', 'adv.globaolmedia2', '', '', 'adv.globaolmedia2', '', '', '2012-05-01 15:45:31', '2014-06-25 21:50:18', 1);
/*!40000 ALTER TABLE `helps` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `tracking_id` text NOT NULL,
  `total` bigint(100) DEFAULT NULL,
  `visa_id` int(100) DEFAULT NULL,
  `date_creat` date DEFAULT NULL,
  `status_pay` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Thong Tin hoa don';

-- Dumping data for table host5_bagseshop.invoice: ~6 rows (approximately)
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`id`, `tracking_id`, `total`, `visa_id`, `date_creat`, `status_pay`) VALUES
	(2, 'EVT.12017', 19, 3, '2015-05-19', 0),
	(3, 'EVT.12018', 19, 4, '2015-05-19', 0),
	(4, 'EVT.12019', 19, 5, '2015-05-19', 0),
	(5, 'EVT.12020', 19, 6, '2015-05-19', 0),
	(6, 'EVT.12021', 19, 7, '2015-05-19', 0),
	(7, 'EVT.12022', 19, 8, '2015-05-19', 0);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.langgues
CREATE TABLE IF NOT EXISTS `langgues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `countrycode` varchar(256) DEFAULT NULL,
  `namecountry` varchar(250) DEFAULT NULL,
  `code` varchar(250) DEFAULT NULL,
  `capital` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- Dumping data for table host5_bagseshop.langgues: 62 rows
/*!40000 ALTER TABLE `langgues` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `langgues` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.localsv
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.localsv: ~0 rows (approximately)
/*!40000 ALTER TABLE `localsv` DISABLE KEYS */;
/*!40000 ALTER TABLE `localsv` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.name
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.name: ~11 rows (approximately)
/*!40000 ALTER TABLE `name` DISABLE KEYS */;
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
	(21, 'Lazada3', 18, NULL, '0000-00-00', '0000-00-00', 0, 1, 1, 'https://www.rohlik.cz/c75533-napoje', NULL, NULL);
/*!40000 ALTER TABLE `name` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.news
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.news: ~12 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`news_id`, `news_thumbnail`, `news_name`, `news_content`, `url_static`, `date_creat`, `date_mod`, `id_user`, `silder`, `status`, `travel_corner`, `possition_view`) VALUES
	(4, 'file-797.png', 'Traffic rates for the US are currently the highest they have ever been', '<p class="wp-caption-text">Why Should You Choose Visa on Arrival?</p>\r\n</div>\r\n<p style="text-align: justify;">It is compulsory for the passport holders from any country to carry a visa for traveling to Vietnam. A number of travelers pay visit to the country for various business purposes as well as for tourism. Travelers or business people can get their visa to Vietnam in the following ways:</p>\r\n<p style="text-align: justify;"><b>Through the Embassy</b>: This is a prevalent process through which your visa is issued directly by the embassy of Vietnam in your country. You can have a trip to the embassy personally or ask for the services of a professional and reputed travel agency for making the visa arrangements on your behalf. It might take 4 to 6 working days for you to get back your passport with the visa to Vietnam stamped on it. If you need to visit the country urgently, you might like to choose a better and quicker way out which is the Vietnam visa on arrival.</p>\r\n<p style="text-align: justify;"><b>Visa on Arrival Vietnam</b>: The Vietnam visa on arrival is a 100% online process which does not require applicants to go after the expensive and fraud travel agencies. It also considerably reduces the time of clearing the visa insurance from 6 to just 2 days or less. The procedure allows travelers to apply for a visa from anywhere and anytime. The Vietnam visa online is made available to the applicants within a brief time period. This is why a lot of people traveling to Vietnam prefer this option. Other benefits of visa on arrival are:</p>\r\n<ul style="text-align: justify;">\r\n<li><b>Any time</b>: It is impossible to get visa for Vietnam during Sat, Sun or Public holiday at embassy of Vietnam but you can get your visa on arrival through online agency 24×7.</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li><b>Anywhere</b> : You have to visiting and queuing at embassy or consulate at least 2 times to get a visa for Vietnam and it is more difficult for you if there is no Vietnam embassy in your country, however, Vietnam visa on arrival not like that, you can apply online for visa approval letter then take a flight to get visa at international airports of Vietnam.</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li><b>It is fast :</b> It is impossible to get visa at embassy of Vietnam if you are going to board for Vietnam in 4 hours or 2 hours, but you can do it with Vietnam visa on arrival service by apply online through visa agency in Vietnam.</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li><b>It is Simple</b>: The online procedure is extremely streamlined. All you need to do is fill in an online application form with the required information and required copies of documents. These will help you to the visa approval letter through registered email once your details are reviewed by the immigration department of Vietnam and after the applicable service fees have been paid for processing your request. The approval letter that is issued works like the visa to travel to the country with the actual visa being stamped on your passport once you arrive at any of the international airports.</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li><b>It is Safer</b>: A number of fraudulent travel agents might try to hoodwink you. It is also not wise to hand over your important documents such as your passport in the hands of the travel agents. The online process of application can conveniently eliminates all such scams.</li>\r\n</ul>\r\n<ul style="text-align: justify;">\r\n<li><b>It is Cost Effective</b>: Applicants can save a lot of money with the visa on arrival as they do not have to travel to the Embassy and pay the huge bills that many travel agents demand.</li>\r\n</ul>\r\n<p style="text-align: justify;">Is Vietnam visa on arrival trustworthy and legitimated ? Please click here : <a href="http://www.e-visavietnam.org/is-vietnam-visa-on-arrival-legitimated/">http://www.e-visavietnam.org/is-vietnam-visa-on-arrival-legitimated/</a></p>\r\n		</div>\r\n<p></p>', 'ASAsa123', '2015-06-08', '2015-05-11 10:58:26', NULL, 1, 1, 1, NULL),
	(5, 'file-577.png', 'Payments for November complete! Thank you for your continued support.', 'Payments for November complete! Thank you for your continued support.', 'asasa12', '2015-05-10', '2015-05-11 10:58:04', NULL, 1, 1, NULL, NULL),
	(6, 'file-294.png', 'AdFly website is available in 3 more languages now: French, Arabic and Thai. Just select your preferred language from the dropdown in the top right of your screen', 'AdFly website is available in 3 more languages now: French, Arabic and Thai. Just select your preferred language from the dropdown in the top right of your screen', 'ewewew', '2015-05-09', '2015-05-11 10:57:48', NULL, NULL, 1, 1, NULL),
	(7, 'file-456.png', 'Payza account you can receive now your earnings via BitCoin by using their new feature \'Withdraw Funds by Bitcoin\'', 'If you have a Payza account you can receive now your earnings via BitCoin by using their new feature \'Withdraw Funds by Bitcoin\'. For more details visit: https://blog.payza.com/payza-updates/why-use-payza-announcements/buy-bitcoin-with-payza/.', 'wewe', '2015-05-11', '2015-05-11 10:57:15', NULL, 1, 1, NULL, NULL),
	(8, 'file-685.png', 'Pop Ads rates keep increasing! Why not give it a try? Learn more here. And check also the Pop Ads rates', 'Pop Ads rates keep increasing! Why not give it a try? Learn more here. And check also the Pop Ads rates', 'sASAS23', '2015-05-09', '2015-05-11 10:56:59', NULL, 1, 1, 1, NULL),
	(9, 'file-696.png', 'Now we are giving you the option to allow mobile ads that automatically open Google Play or App Store', 'Now we are giving you the option to allow mobile ads that automatically open Google Play or App Store, this will greatly increase your CPM on mobile traffic. If you don\'t want your visitors to see this, it can be turned off on your Account page (more details).', 'tsdsdf', '2015-05-10', '2015-05-11 10:56:40', NULL, NULL, 1, NULL, NULL),
	(10, 'file-306.png', 'New way to make extra money! We have introduced Pop Ads to AdFly', 'New way to make extra money! We have introduced Pop Ads to AdFly, this is an optional popup window to that can be displayed if you use one of our scripts on your website. It does not affect your current AdFly links and can be enabled very simply, please see Tools for the new code', 'fsdfsdf', '2015-05-12', '2015-05-11 10:56:24', NULL, 1, 1, 1, NULL),
	(11, 'file-986.png', 'New website has been launched! We hope that you like it. Please bear with us while we fix the odd bug.', 'New website has been launched! We hope that you like it. Please bear with us while we fix the odd bug.', 'fsdfdf', '2015-05-06', '2015-05-11 10:55:32', NULL, NULL, 1, 1, NULL),
	(12, 'file-892.png', 'Toi Yeu Viet Nam', 'Toi yeu Viet Nam', 'bxfdgersd', '2015-05-09', '2015-05-11 10:55:10', NULL, 1, 1, NULL, NULL),
	(13, 'file-438.png', 'toissssssssssss', 'sss', 'dfrsdfsd', '2015-05-05', '2015-05-11 10:54:52', NULL, NULL, 1, NULL, NULL),
	(15, 'file-869.png', 'Now we are giving you the option to allow mobile', 'url_staticurl_staticurl_staticurl_staticurl_static', 'edsfsdfsd', '2015-05-11', '2015-05-11 17:17:30', NULL, 1, 1, 1, NULL),
	(16, 'file-725.png', 'hoang phuc test', 'url_staticurl_staticurl_staticurl_staticurl_staticurl_staticurl_staticurl_static', 'hoang-phuc-test', '2015-05-11', '2015-05-11 17:19:32', NULL, NULL, 1, 1, NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.newsletter
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date_creat` date DEFAULT NULL,
  `id_user` int(100) DEFAULT '0',
  `is_subscribed` int(100) DEFAULT '0',
  `email` text,
  `status` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='newsletter';

-- Dumping data for table host5_bagseshop.newsletter: ~3 rows (approximately)
/*!40000 ALTER TABLE `newsletter` DISABLE KEYS */;
INSERT INTO `newsletter` (`id`, `date_creat`, `id_user`, `is_subscribed`, `email`, `status`) VALUES
	(3, '2015-05-28', 1, 1, 'gstearmit@gmail.com', '0'),
	(4, '2015-05-28', 51, 1, 'gstearmit@gmail.com', '0'),
	(9, '2015-05-29', NULL, 1, 'phuca4@gmail.com', '1');
/*!40000 ALTER TABLE `newsletter` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.oders
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=utf8;

-- Dumping data for table host5_bagseshop.oders: ~19 rows (approximately)
/*!40000 ALTER TABLE `oders` DISABLE KEYS */;
INSERT INTO `oders` (`id`, `creatnamecampaign`, `date_creat`, `date_mod`, `id_user`, `status`, `status_oder`, `type`, `DolarTotal`, `Cpmrate`, `TotaVistor`) VALUES
	(204, 'Quang cao dong ho', '2015-03-19', '2015-03-19', 156, 1, 1, 0, 50, 1, 50),
	(209, NULL, '2015-03-20', '2015-03-20', 156, 1, 0, 0, 30, 1, 30),
	(211, NULL, '2015-04-11', '2015-04-11', 17, 1, 0, 0, 45, 1, 55),
	(212, 'Thời trang nữ', '2015-04-21', '2015-04-21', 17, 1, 0, 0, 30, 1, 30),
	(214, 'SALE  OFF', '2015-04-22', '2015-04-22', 17, 1, 1, 2, 50, 1, 50),
	(215, NULL, '2015-04-22', '2015-04-22', 17, 1, 0, 0, 250, 5, 50),
	(216, NULL, '2015-04-22', '2015-04-22', NULL, 1, 0, 0, 60, 1, 60),
	(217, 'dddd', '2015-04-22', '2015-04-22', 17, 1, 0, 0, 90, 3, 30),
	(218, 'sdsdsds', '2015-04-22', '2015-04-22', 17, 1, 0, 0, 120, 2, 60),
	(220, NULL, '2015-04-22', '2015-04-22', 17, 1, 0, 0, 49, 1, 49),
	(221, NULL, '2015-04-22', '2015-04-22', 17, 1, 0, 0, 49, 1, 49),
	(222, 'dtge5', '2015-04-22', '2015-04-22', 17, 1, 0, 0, 50, 1, 50),
	(223, 'Advertising', '2015-04-22', '2015-04-22', 17, 1, 1, 0, 80, 2, 80),
	(224, NULL, '2015-04-22', '2015-04-22', 17, 1, 0, 0, 80, 2, 80),
	(225, 'hoang phuc test', '2015-05-18', '2015-05-18', 17, 1, 0, 0, 130, 7, 38),
	(226, 'linkpayplus.eu', '2015-05-18', '2015-05-18', 17, 1, 0, 0, 250, 5, 50),
	(227, 'linkpay', '2015-05-18', '2015-05-18', 17, 1, 0, 0, 100, 2, 50),
	(228, 'abc', '2015-05-27', '2015-05-27', 164, 1, 1, 0, 150, 6, 70),
	(229, 'news', '2015-05-27', '2015-05-27', 164, 1, 0, 0, 90, 2, 90);
/*!40000 ALTER TABLE `oders` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.odersdetails
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=398 DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.odersdetails: ~22 rows (approximately)
/*!40000 ALTER TABLE `odersdetails` DISABLE KEYS */;
INSERT INTO `odersdetails` (`id`, `description`, `oder_id`, `date_creat`, `date_mod`, `id_user`, `status`, `quantity`, `cpmRate`, `amount`, `type`, `AdobeFlashEnabled`, `MaxDailyBudget`, `MobileTargeting`, `trafficsources`, `PreviousWebsite`, `payment_select`) VALUES
	(367, 'World Deal Traffic from all over the word', 204, '2015-03-19', '2015-03-19', 156, 1, 50, 1, 50, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(373, 'World Deal Traffic from all over the word', 212, '2015-04-21', '2015-04-21', 17, 1, NULL, 1, 0, 0, 'Yes', 0, 'Android', 'Mobile', 'Create new website', 'merchant paypal'),
	(374, 'Proxy traffic deal Traffic from proxy server', 212, '2015-04-21', '2015-04-21', 17, 1, 30, 1, 30, 0, 'Yes', 0, 'Android', 'Mobile', 'Create new website', 'merchant paypal'),
	(376, 'World Deal Traffic from all over the word', 214, '2015-04-22', '2015-04-22', 17, 1, 50, 1, 50, 2, 'No aplicable', 0, 'No aplicable', 'Desktop', NULL, 'merchant paypal'),
	(377, 'World Deal Traffic from all over the word', 217, '2015-04-22', '2015-04-22', 17, 1, NULL, 1, 0, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(378, 'World Deal Traffic from all over the word', 218, '2015-04-22', '2015-04-22', 17, 1, NULL, 1, 0, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(379, 'Proxy traffic deal Traffic from proxy server', 218, '2015-04-22', '2015-04-22', 17, 1, NULL, 1, 0, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(380, 'Spain', 218, '2015-04-22', '2015-04-22', 17, 1, 60, 2, 120, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(384, 'World Deal Traffic from all over the word', 222, '2015-04-22', '2015-04-22', 17, 1, NULL, 1, 0, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(385, 'Proxy traffic deal Traffic from proxy server', 222, '2015-04-22', '2015-04-22', 17, 1, 50, 1, 50, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(386, 'Canada', 222, '2015-04-22', '2015-04-22', 17, 1, NULL, 3, 0, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(387, 'World Deal Traffic from all over the word', 223, '2015-04-22', '2015-04-22', 17, 1, 30, 1, 30, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(388, 'Proxy traffic deal Traffic from proxy server', 223, '2015-04-22', '2015-04-22', 17, 1, 50, 1, 50, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(389, 'United States', 225, '2015-05-18', '2015-05-18', 17, 1, 18, 5, 90, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(390, 'China', 225, '2015-05-18', '2015-05-18', 17, 1, NULL, 1, 0, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(391, 'Japan', 225, '2015-05-18', '2015-05-18', 17, 1, 20, 2, 40, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(392, 'United States', 226, '2015-05-18', '2015-05-18', 17, 1, 50, 5, 250, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(393, 'Hong Kong', 227, '2015-05-18', '2015-05-18', 17, 1, 50, 2, 100, 0, 'Yes', 0, 'IOS', 'Desktop', 'Create new website', 'merchant paypal'),
	(394, 'World Deal Traffic from all over the word', 228, '2015-05-27', '2015-05-27', 164, 1, 50, 1, 50, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(395, 'United States', 228, '2015-05-27', '2015-05-27', 164, 1, 20, 5, 100, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(396, 'World Deal Traffic from all over the word', 229, '2015-05-27', '2015-05-27', 164, 1, 60, 1, 60, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal'),
	(397, 'Myanmar', 229, '2015-05-27', '2015-05-27', 164, 1, 30, 1, 30, 0, 'No aplicable', 0, 'No aplicable', 'Desktop', 'Create new website', 'merchant paypal');
/*!40000 ALTER TABLE `odersdetails` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.payoutrates
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
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.payoutrates: ~155 rows (approximately)
/*!40000 ALTER TABLE `payoutrates` DISABLE KEYS */;
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
	(130, 'Cote D\'ivoire', 1, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.26, 0.22, 1.21, 0.97, 'CI', ''),
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
	(145, 'Lao People\'s Democratic Republic', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 0.35, 0.32, 1.18, 0.86, 'LP', ''),
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
	(187, 'Korea, Democratic People\'s Republic Of', 0, NULL, 108, '2015-02-11', '2015-02-11', 1, 0, 1.11, 0.5, 0, 0, 'KO', ''),
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
/*!40000 ALTER TABLE `payoutrates` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.payoutype
CREATE TABLE IF NOT EXISTS `payoutype` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nametype` text CHARACTER SET utf8,
  `date_creat` date DEFAULT NULL,
  `date_mod` date DEFAULT NULL,
  `status` int(100) DEFAULT '1',
  `id_user` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.payoutype: ~3 rows (approximately)
/*!40000 ALTER TABLE `payoutype` DISABLE KEYS */;
INSERT INTO `payoutype` (`id`, `nametype`, `date_creat`, `date_mod`, `status`, `id_user`) VALUES
	(1, 'Interstitial', '2015-02-10', '2015-02-10', 1, 1),
	(2, 'Banner', '2015-02-10', '2015-02-10', 1, 1),
	(3, 'PopAds', '2015-02-10', '2015-02-10', 1, 1);
/*!40000 ALTER TABLE `payoutype` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.persons
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='khach hang';

-- Dumping data for table host5_bagseshop.persons: ~6 rows (approximately)
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` (`id`, `name`, `gender`, `birthday`, `national`, `passport`, `passport_exp`, `user_id`, `invoice_id`, `primary_email`, `secondary_email`, `primary_pass`, `visa_id`) VALUES
	(2, 'Hoang Phuc Test', 0, '2015-05-15', 'American', 43534500000, '2015-05-19', 1, 2, 'hoangphuc@gmail.com', 'hoangphuc123@gmail.com', '123', 3),
	(3, 'jholj', 0, '2015-05-15', 'Armenia', 987880000000, '2015-05-21', NULL, 3, 'gjhjkjhhkhk@gmail.com', 'gjhjkjhhkhk56@gmail.com', '09', 4),
	(4, 'Hoang Phuc Test', 0, '2015-05-14', 'American', 12332300, '2015-05-19', NULL, 4, 'paypal-notify@gmail.com', 'paypal-notify123@gmail.com', '123', 5),
	(5, 'Hoang Phuc Test', 0, '2015-05-15', 'American', 2343430000, '2015-05-19', NULL, 5, 'hoangphiuc@gmail.com', 'hoangphiuc123@gmail.com', '123', 6),
	(6, 'Hoang Phuc Test', 0, '2015-05-14', 'American', 3454350000000, '2015-05-19', NULL, 6, 'hosanasg@gmail.com', 'hosanas1212g@gmail.com', '123', 7),
	(7, 'Hoang Cong Phuc', 0, '2015-05-15', 'American', 2.14212e17, '2015-05-19', NULL, 7, 'hoangphuc@gmail.com', 'hoangphuc1234@gmail.com', '12345', 8);
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.playlist
CREATE TABLE IF NOT EXISTS `playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `listcode` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `video_id` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_creat` date NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `sum_video` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.playlist: ~0 rows (approximately)
/*!40000 ALTER TABLE `playlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `playlist` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.pre_ads
CREATE TABLE IF NOT EXISTS `pre_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ads` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table host5_bagseshop.pre_ads: ~0 rows (approximately)
/*!40000 ALTER TABLE `pre_ads` DISABLE KEYS */;
/*!40000 ALTER TABLE `pre_ads` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.product
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- Dumping data for table host5_bagseshop.product: ~27 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `alias`, `descripts`, `detail_product`, `cat_id`, `new`, `hot`, `promotions`, `price`, `rating`, `availability`, `tag_id`, `manufacturer_id`, `date_creat`, `date_change`, `user_id`, `status`, `about_price`, `weekly_featured`, `featured_products`, `new_products`, `crowler`, `sale_products`, `most_viewed`, `lastest_products`, `array_img`, `img`, `img0`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `img9`) VALUES
	(34, 'Plaid Cotton Shirt', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 4, 1, 1, 20, 60000, 3, 120, 10, NULL, '2015-06-03', '2015-06-03', 1, 1, 20000000, 1, 1, 1, NULL, 1, NULL, NULL, '1-1433321985.jpg,2-1433321986.jpg,2-4-1433321987.jpg,3-1433321988.jpg,6-1433321988.jpg,4-1433321989.jpg,6-6_4-1433321989.jpg,7-1433321990.jpg,7_1_7-1433321990.jpg,7-7_3-1433321991.jpg', NULL, '1-1433321985.jpg', '2-1433321986.jpg', '2-4-1433321987.jpg', '3-1433321988.jpg', '6-1433321988.jpg', '4-1433321989.jpg', '6-6_4-1433321989.jpg', '7-1433321990.jpg', '7_1_7-1433321990.jpg', '7-7_3-1433321991.jpg'),
	(35, 'Flat Front Trouser', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 3, 1, 1, 90, 80000, 7, NULL, 22, NULL, '2015-06-03', '2015-06-03', NULL, 1, 20000000, 1, 1, NULL, NULL, NULL, 1, 1, '2_2-1433322226.jpg,1_1-1433322226.jpg,2-2-1433322227.jpg,1-1433322227.jpg,3-1433322228.jpg,2-1433322228.jpg,4-1433322229.jpg,5-1433322229.jpg,6-1433322230.jpg,7-1433322231.jpg', '1-1433322227.jpg', '2_2-1433322226.jpg', '1_1-1433322226.jpg', '2-2-1433322227.jpg', '1-1433322227.jpg', '3-1433322228.jpg', '2-1433322228.jpg', '4-1433322229.jpg', '5-1433322229.jpg', '6-1433322230.jpg', '7-1433322231.jpg'),
	(36, 'Isla Crossbody Handbag', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 2, 1, 1, 30, 89000, 8, 200, 22, NULL, '2015-06-03', '2015-06-03', NULL, 1, 300000000, 1, 1, 1, NULL, 1, 1, NULL, '1-1433322556.jpg,3-1433322557.jpg,5-1433322557.jpg,2-1433322557.jpg,4-1433322558.jpg,6-1433322558.jpg,7-1433322559.jpg,8-1433322559.jpg,9-1433322560.jpg,10-1433322560.jpg', 'thumb_1433322524.jpg', '1-1433322556.jpg', '3-1433322557.jpg', '5-1433322557.jpg', '2-1433322557.jpg', '4-1433322558.jpg', '6-1433322558.jpg', '7-1433322559.jpg', '8-1433322559.jpg', '9-1433322560.jpg', '10-1433322560.jpg'),
	(37, 'Suede Loafer, Navy', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 5, 1, 1, 40, 40000, NULL, 400, 10, NULL, '2015-06-03', '2015-06-03', NULL, 1, 30000000, NULL, NULL, NULL, NULL, 1, NULL, NULL, '1-1433322720.jpg,3-1433322720.jpg,6-1433322720.jpg,2-1433322721.jpg,4-1433322722.jpg,5-1433322722.jpg,7-1433322722.jpg,9_6-1433322722.jpg,10_6-1433322723.jpg,11_4-1433322723.jpg', '2-1433322721.jpg', '1-1433322720.jpg', '3-1433322720.jpg', '6-1433322720.jpg', '2-1433322721.jpg', '4-1433322722.jpg', '5-1433322722.jpg', '7-1433322722.jpg', '9_6-1433322722.jpg', '10_6-1433322723.jpg', '11_4-1433322723.jpg'),
	(38, 'Plaid Cotton Shirt', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 4, 1, 1, 30, 89000, 7, 120, 10, NULL, '2015-06-03', '2015-06-03', NULL, 1, 20000000, NULL, 1, NULL, NULL, 1, NULL, 1, '1-1433321985.jpg,2-1433321986.jpg,2-4-1433321987.jpg,3-1433321988.jpg,6-1433321988.jpg,4-1433321989.jpg,6-6_4-1433321989.jpg,7-1433321990.jpg,7_1_7-1433321990.jpg,7-7_3-1433321991.jpg', NULL, '2-4-1433321987.jpg', '2-1433321986.jpg', '2-4-1433321987.jpg', '3-1433321988.jpg', '6-1433321988.jpg', '4-1433321989.jpg', '6-6_4-1433321989.jpg', '7-1433321990.jpg', '7_1_7-1433321990.jpg', '7-7_3-1433321991.jpg'),
	(39, 'Flat Front Trouser', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 3, 1, 1, 70, 89000, NULL, 200, 22, NULL, '2015-06-03', '2015-06-03', NULL, 1, 20000000, 1, NULL, NULL, NULL, 1, NULL, 1, '2_2-1433322226.jpg,1_1-1433322226.jpg,2-2-1433322227.jpg,1-1433322227.jpg,3-1433322228.jpg,2-1433322228.jpg,4-1433322229.jpg,5-1433322229.jpg,6-1433322230.jpg,7-1433322231.jpg', NULL, '2_2-1433322226.jpg', '1_1-1433322226.jpg', '2-2-1433322227.jpg', '1-1433322227.jpg', '3-1433322228.jpg', '2-1433322228.jpg', '4-1433322229.jpg', '5-1433322229.jpg', '6-1433322230.jpg', '7-1433322231.jpg'),
	(40, 'Isla Crossbody Handbag', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 2, 1, 1, 90, 40000, 10, 200, 22, NULL, '2015-06-03', '2015-06-03', NULL, 1, 300000000, NULL, 1, NULL, NULL, NULL, NULL, NULL, '1-1433322556.jpg,3-1433322557.jpg,5-1433322557.jpg,2-1433322557.jpg,4-1433322558.jpg,6-1433322558.jpg,7-1433322559.jpg,8-1433322559.jpg,9-1433322560.jpg,10-1433322560.jpg', '2-1433322557.jpg', '1-1433322556.jpg', '3-1433322557.jpg', '5-1433322557.jpg', '2-1433322557.jpg', '4-1433322558.jpg', '6-1433322558.jpg', '7-1433322559.jpg', '8-1433322559.jpg', '9-1433322560.jpg', '10-1433322560.jpg'),
	(41, 'Suede Loafer, Navy', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 5, 1, 1, 60, 60000, NULL, 400, 10, NULL, '2015-06-03', '2015-06-03', NULL, 1, 30000000, 1, 1, NULL, NULL, 1, NULL, NULL, '1-1433322720.jpg,3-1433322720.jpg,6-1433322720.jpg,2-1433322721.jpg,4-1433322722.jpg,5-1433322722.jpg,7-1433322722.jpg,9_6-1433322722.jpg,10_6-1433322723.jpg,11_4-1433322723.jpg', NULL, '1-1433322720.jpg', '3-1433322720.jpg', '6-1433322720.jpg', '2-1433322721.jpg', '4-1433322722.jpg', '5-1433322722.jpg', '7-1433322722.jpg', '9_6-1433322722.jpg', '10_6-1433322723.jpg', '11_4-1433322723.jpg'),
	(42, 'Suede Loafer, Navy', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 5, 1, 1, 30, 89000, 8, NULL, 10, NULL, '2015-06-03', '2015-06-03', NULL, 1, 30000000, 1, 1, NULL, NULL, 1, 1, 1, '1-1433322720.jpg,3-1433322720.jpg,6-1433322720.jpg,2-1433322721.jpg,4-1433322722.jpg,5-1433322722.jpg,7-1433322722.jpg,9_6-1433322722.jpg,10_6-1433322723.jpg,11_4-1433322723.jpg', 'thumb_1433322674.jpg', '1-1433322720.jpg', '3-1433322720.jpg', '6-1433322720.jpg', '2-1433322721.jpg', '4-1433322722.jpg', '5-1433322722.jpg', '7-1433322722.jpg', '9_6-1433322722.jpg', '10_6-1433322723.jpg', '11_4-1433322723.jpg'),
	(43, 'Isla Crossbody Handbag', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 2, 1, 1, 50, 60000, NULL, NULL, 22, NULL, '2015-06-03', '2015-06-03', NULL, 1, 300000000, 1, 1, 1, NULL, 1, 1, NULL, '1-1433322556.jpg,3-1433322557.jpg,5-1433322557.jpg,2-1433322557.jpg,4-1433322558.jpg,6-1433322558.jpg,7-1433322559.jpg,8-1433322559.jpg,9-1433322560.jpg,10-1433322560.jpg', 'thumb_1433322524.jpg', '1-1433322556.jpg', '3-1433322557.jpg', '5-1433322557.jpg', '2-1433322557.jpg', '4-1433322558.jpg', '6-1433322558.jpg', '7-1433322559.jpg', '8-1433322559.jpg', '9-1433322560.jpg', '10-1433322560.jpg'),
	(44, 'Flat Front Trouser', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 3, 1, 1, 70, 40000, NULL, 200, 22, NULL, '2015-06-03', '2015-06-03', NULL, 1, 20000000, NULL, 1, NULL, NULL, 1, NULL, 1, '2_2-1433322226.jpg,1_1-1433322226.jpg,2-2-1433322227.jpg,1-1433322227.jpg,3-1433322228.jpg,2-1433322228.jpg,4-1433322229.jpg,5-1433322229.jpg,6-1433322230.jpg,7-1433322231.jpg', '2-2-1433322227.jpg', '2_2-1433322226.jpg', '1_1-1433322226.jpg', '2-2-1433322227.jpg', '1-1433322227.jpg', '3-1433322228.jpg', '2-1433322228.jpg', '4-1433322229.jpg', '5-1433322229.jpg', '6-1433322230.jpg', '7-1433322231.jpg'),
	(45, 'Plaid Cotton Shirt', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 4, 1, 1, NULL, 40000, NULL, 120, 10, NULL, '2015-06-03', '2015-06-03', NULL, 1, 20000000, 1, NULL, 1, NULL, 1, NULL, NULL, '1-1433321985.jpg,2-1433321986.jpg,2-4-1433321987.jpg,3-1433321988.jpg,6-1433321988.jpg,4-1433321989.jpg,6-6_4-1433321989.jpg,7-1433321990.jpg,7_1_7-1433321990.jpg,7-7_3-1433321991.jpg', 'thumb_1433321952.jpg', '1-1433321985.jpg', '2-1433321986.jpg', '2-4-1433321987.jpg', '3-1433321988.jpg', '6-1433321988.jpg', '4-1433321989.jpg', '6-6_4-1433321989.jpg', '7-1433321990.jpg', '7_1_7-1433321990.jpg', '7-7_3-1433321991.jpg'),
	(46, 'Flat Front Trouser', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 3, 1, 1, NULL, 60000, 5, 200, 22, NULL, '2015-06-03', '2015-06-03', NULL, 1, 20000000, NULL, 1, 1, NULL, 1, NULL, NULL, '2_2-1433322226.jpg,1_1-1433322226.jpg,2-2-1433322227.jpg,1-1433322227.jpg,3-1433322228.jpg,2-1433322228.jpg,4-1433322229.jpg,5-1433322229.jpg,6-1433322230.jpg,7-1433322231.jpg', 'thumb_1433322200.jpg', '2_2-1433322226.jpg', '1_1-1433322226.jpg', '2-2-1433322227.jpg', '1-1433322227.jpg', '3-1433322228.jpg', '2-1433322228.jpg', '4-1433322229.jpg', '5-1433322229.jpg', '6-1433322230.jpg', '7-1433322231.jpg'),
	(47, 'Isla Crossbody Handbag', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 2, 1, 1, NULL, 4000, 3, 200, 22, NULL, '2015-06-03', '2015-06-03', NULL, 1, 300000000, 1, NULL, 1, NULL, 1, 1, 1, '1-1433322556.jpg,3-1433322557.jpg,5-1433322557.jpg,2-1433322557.jpg,4-1433322558.jpg,6-1433322558.jpg,7-1433322559.jpg,8-1433322559.jpg,9-1433322560.jpg,10-1433322560.jpg', 'thumb_1433322524.jpg', '1-1433322556.jpg', '3-1433322557.jpg', '5-1433322557.jpg', '2-1433322557.jpg', '4-1433322558.jpg', '6-1433322558.jpg', '7-1433322559.jpg', '8-1433322559.jpg', '9-1433322560.jpg', '10-1433322560.jpg'),
	(48, 'Suede Loafer, Navy', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 5, 1, 1, NULL, 50000, 7, 0, 10, NULL, '2015-06-03', '2015-06-03', NULL, 1, 30000000, 1, 1, 1, NULL, 1, 1, 1, '1-1433322720.jpg,3-1433322720.jpg,6-1433322720.jpg,2-1433322721.jpg,4-1433322722.jpg,5-1433322722.jpg,7-1433322722.jpg,9_6-1433322722.jpg,10_6-1433322723.jpg,11_4-1433322723.jpg', 'thumb_1433322674.jpg', '1-1433322720.jpg', '3-1433322720.jpg', '6-1433322720.jpg', '2-1433322721.jpg', '4-1433322722.jpg', '5-1433322722.jpg', '7-1433322722.jpg', '9_6-1433322722.jpg', '10_6-1433322723.jpg', '11_4-1433322723.jpg'),
	(49, 'Suede Loafer, Navy', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 5, 1, 1, NULL, 50000, NULL, 400, 10, NULL, '2015-06-03', '2015-06-03', NULL, 1, 30000000, 1, 1, 1, NULL, NULL, NULL, 1, '1-1433322720.jpg,3-1433322720.jpg,6-1433322720.jpg,2-1433322721.jpg,4-1433322722.jpg,5-1433322722.jpg,7-1433322722.jpg,9_6-1433322722.jpg,10_6-1433322723.jpg,11_4-1433322723.jpg', '2-1433322721.jpg', '1-1433322720.jpg', '3-1433322720.jpg', '6-1433322720.jpg', '2-1433322721.jpg', '4-1433322722.jpg', '5-1433322722.jpg', '7-1433322722.jpg', '9_6-1433322722.jpg', '10_6-1433322723.jpg', '11_4-1433322723.jpg'),
	(50, 'Isla Crossbody Handbag', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 2, 1, 1, 20, 35000, NULL, 200, 22, NULL, '2015-06-03', '2015-06-03', NULL, 1, 300000000, 1, NULL, NULL, NULL, 1, NULL, 1, '1-1433322556.jpg,3-1433322557.jpg,5-1433322557.jpg,2-1433322557.jpg,4-1433322558.jpg,6-1433322558.jpg,7-1433322559.jpg,8-1433322559.jpg,9-1433322560.jpg,10-1433322560.jpg', '1-1433322227.jpg', '1-1433322556.jpg', '3-1433322557.jpg', '5-1433322557.jpg', '2-1433322557.jpg', '4-1433322558.jpg', '6-1433322558.jpg', '7-1433322559.jpg', '8-1433322559.jpg', '9-1433322560.jpg', '10-1433322560.jpg'),
	(51, 'Flat Front Trouser', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 3, 1, 1, NULL, 50000, 8, NULL, 22, NULL, '2015-06-03', '2015-06-03', NULL, 1, 20000000, 1, 1, 1, NULL, NULL, 1, NULL, '2_2-1433322226.jpg,1_1-1433322226.jpg,2-2-1433322227.jpg,1-1433322227.jpg,3-1433322228.jpg,2-1433322228.jpg,4-1433322229.jpg,5-1433322229.jpg,6-1433322230.jpg,7-1433322231.jpg', 'thumb_1433322200.jpg', '2_2-1433322226.jpg', '1_1-1433322226.jpg', '2-2-1433322227.jpg', '1-1433322227.jpg', '3-1433322228.jpg', '2-1433322228.jpg', '4-1433322229.jpg', '5-1433322229.jpg', '6-1433322230.jpg', '7-1433322231.jpg'),
	(52, 'Plaid Cotton Shirt', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 4, 1, 1, 10, 70000, 4, 0, 10, NULL, '2015-06-03', '2015-06-03', NULL, 1, 20000000, 1, 1, 1, NULL, 1, 1, NULL, '1-1433321985.jpg,2-1433321986.jpg,2-4-1433321987.jpg,3-1433321988.jpg,6-1433321988.jpg,4-1433321989.jpg,6-6_4-1433321989.jpg,7-1433321990.jpg,7_1_7-1433321990.jpg,7-7_3-1433321991.jpg', NULL, '1-1433321985.jpg', '2-1433321986.jpg', '2-4-1433321987.jpg', '3-1433321988.jpg', '6-1433321988.jpg', '4-1433321989.jpg', '6-6_4-1433321989.jpg', '7-1433321990.jpg', '7_1_7-1433321990.jpg', '7-7_3-1433321991.jpg'),
	(53, 'Plaid Cotton Shirt', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 4, 1, 1, NULL, 4500000, NULL, 120, 10, NULL, '2015-06-03', '2015-06-03', NULL, 1, 20000000, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1-1433321985.jpg,2-1433321986.jpg,2-4-1433321987.jpg,3-1433321988.jpg,6-1433321988.jpg,4-1433321989.jpg,6-6_4-1433321989.jpg,7-1433321990.jpg,7_1_7-1433321990.jpg,7-7_3-1433321991.jpg', 'thumb_1433321952.jpg', '4-1433321989.jpg', '2-1433321986.jpg', '2-4-1433321987.jpg', '3-1433321988.jpg', '6-1433321988.jpg', '4-1433321989.jpg', '6-6_4-1433321989.jpg', '7-1433321990.jpg', '7_1_7-1433321990.jpg', '7-7_3-1433321991.jpg'),
	(54, 'Isla Crossbody Handbag', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 2, 1, 1, 60, 60000, NULL, 200, 22, NULL, '2015-06-03', '2015-06-03', NULL, 1, 300000000, 1, 1, NULL, NULL, 1, NULL, NULL, '1-1433322556.jpg,3-1433322557.jpg,5-1433322557.jpg,2-1433322557.jpg,4-1433322558.jpg,6-1433322558.jpg,7-1433322559.jpg,8-1433322559.jpg,9-1433322560.jpg,10-1433322560.jpg', NULL, '1-1433322556.jpg', '3-1433322557.jpg', '5-1433322557.jpg', '2-1433322557.jpg', '4-1433322558.jpg', '6-1433322558.jpg', '7-1433322559.jpg', '8-1433322559.jpg', '9-1433322560.jpg', '10-1433322560.jpg'),
	(55, 'Suede Loafer, Navy', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 5, 1, 1, 60, 60000, 3, 400, 10, NULL, '2015-06-03', '2015-06-03', NULL, 1, 30000000, 1, 1, NULL, NULL, NULL, NULL, 1, '1-1433322720.jpg,3-1433322720.jpg,6-1433322720.jpg,2-1433322721.jpg,4-1433322722.jpg,5-1433322722.jpg,7-1433322722.jpg,9_6-1433322722.jpg,10_6-1433322723.jpg,11_4-1433322723.jpg', 'thumb_1433322674.jpg', '1-1433322720.jpg', '3-1433322720.jpg', '6-1433322720.jpg', '2-1433322721.jpg', '4-1433322722.jpg', '5-1433322722.jpg', '7-1433322722.jpg', '9_6-1433322722.jpg', '10_6-1433322723.jpg', '11_4-1433322723.jpg'),
	(56, 'Isla Crossbody Handbag', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 2, 1, 1, NULL, 40000, 9, 200, 22, NULL, '2015-06-03', '2015-06-03', NULL, 1, 300000000, 1, 1, 1, NULL, NULL, 1, 1, '1-1433322556.jpg,3-1433322557.jpg,5-1433322557.jpg,2-1433322557.jpg,4-1433322558.jpg,6-1433322558.jpg,7-1433322559.jpg,8-1433322559.jpg,9-1433322560.jpg,10-1433322560.jpg', 'thumb_1433322524.jpg', '1-1433322556.jpg', '3-1433322557.jpg', '5-1433322557.jpg', '2-1433322557.jpg', '4-1433322558.jpg', '6-1433322558.jpg', '7-1433322559.jpg', '8-1433322559.jpg', '9-1433322560.jpg', '10-1433322560.jpg'),
	(57, 'Suede Loafer, Navy', NULL, 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.', 'Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit, metus justo posuere ligula, at dignissim diam lacus a dolor. Quisque non commodo massa, quis varius ipsum! Curabitur condimentum ligula sit amet eleifend adipiscing. Nulla non ullamcorper lorem. Duis ut sagittis arcu. Phasellus ornare, leo in tempor blandit, orci nulla dapibus libero, a congue elit nulla non lectus. Duis pellentesque, eros in ullamcorper semper, dui lectus facilisis dui, et ultricies odio sem ultricies dui. Pellentesque at ultricies est. Quisque suscipit mauris et ullamcorper auctor. Etiam vel justo libero?\r\n\r\nMauris tincidunt diam faucibus lobortis ultricies. Maecenas sed sapien ut erat vulputate elementum. Mauris interdum iaculis massa, sit amet imperdiet tortor tristique id. Maecenas at nibh euismod, consectetur nisi vel, rutrum massa. Donec dictum lacinia augue quis imperdiet. Pellentesque id odio commodo, gravida nisl sed, pellentesque magna! Nullam dignissim sagittis erat, id mattis metus sodales vitae. Aliquam fermentum a dui sit amet dignissim! Curabitur ultrices auctor lobortis. Curabitur rhoncus pulvinar rhoncus. Etiam leo dolor, porta at ligula vitae, euismod vehicula elit. Nunc eu erat felis. Vivamus ac volutpat eros. Ut lobortis eget mauris eu sagittis. Cras sed rutrum dui, vitae ultrices tellus.\r\n\r\nMorbi vel convallis dui, a eleifend nulla! Integer risus enim, dapibus vel auctor nec, vestibulum sit amet sapien. Suspendisse eget sollicitudin nisi. Morbi at metus ac diam accumsan hendrerit. Etiam dapibus orci in est suscipit ullamcorper. Proin luctus tortor eget erat dignissim, non dapibus mi varius. Vestibulum hendrerit libero ac arcu interdum; id tincidunt odio pharetra. Mauris semper gravida velit, in rutrum velit pulvinar in. Vivamus consequat consequat justo; eu fermentum sapien hendrerit nec. Pellentesque ultrices, sem nec dignissim tincidunt, metus ligula ullamcorper tellus, ultrices aliquet metus augue quis arcu. Integer non mauris lacus. Maecenas consectetur sit amet purus nec lobortis? Aliquam orci leo, venenatis a venenatis at, feugiat ultrices ligula. Nullam ut elit dictum, congue quam sed, lobortis elit. Curabitur malesuada mauris sed nunc ornare consequat.', 5, 1, 1, 60, 60000, 10, 400, 10, NULL, '2015-06-03', '2015-06-03', NULL, 1, 30000000, 1, 1, NULL, NULL, 1, NULL, NULL, '1-1433322720.jpg,3-1433322720.jpg,6-1433322720.jpg,2-1433322721.jpg,4-1433322722.jpg,5-1433322722.jpg,7-1433322722.jpg,9_6-1433322722.jpg,10_6-1433322723.jpg,11_4-1433322723.jpg', '6-1433322720.jpg', '1-1433322720.jpg', '3-1433322720.jpg', '6-1433322720.jpg', '2-1433322721.jpg', '4-1433322722.jpg', '5-1433322722.jpg', '7-1433322722.jpg', '9_6-1433322722.jpg', '10_6-1433322723.jpg', '11_4-1433322723.jpg'),
	(58, 'Hoang Phuc Test', NULL, NULL, '2121', 1, 1, 1, 123, NULL, NULL, 123, 10, NULL, '2015-06-08', '2015-06-08', NULL, 1, 0, 1, 1, 1, NULL, 1, NULL, NULL, NULL, 'thumb_1433762964.jpg', NULL, 'thumb_1433762964.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(60, 'test product', NULL, NULL, 'dsfds', 2, 1, 1, 1234, NULL, NULL, 123, NULL, NULL, '2015-06-10', '2015-06-10', NULL, 0, 123, 1, 1, 1, NULL, 1, NULL, NULL, NULL, 'thumb_1433924976.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(61, 'test product new', 'test-product-new', 'alias', 'alias', 2, 1, 1, 120, 130, NULL, 124, 10, NULL, '2015-06-12', '2015-06-12', NULL, 1, 120, 1, 1, 1, NULL, 1, NULL, NULL, NULL, 'thumb_1434090256.jpg', NULL, 'thumb_1434090256.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.report
CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `videoid` varchar(24) NOT NULL,
  `reporter` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext NOT NULL,
  `checked` int(9) NOT NULL DEFAULT '5',
  `viewed` tinyint(1) DEFAULT NULL,
  `datecreat` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.report: ~0 rows (approximately)
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
/*!40000 ALTER TABLE `report` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.server
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.server: ~0 rows (approximately)
/*!40000 ALTER TABLE `server` DISABLE KEYS */;
/*!40000 ALTER TABLE `server` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.settings: 1 rows
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `name`, `title`, `address`, `phone`, `yahoo`, `skype`, `mobile`, `fax`, `email`, `url`, `linkweb`, `keyword`, `description`, `created`, `modified`, `about`, `introduction`) VALUES
	(1, 'Công Ty Công Nghệ  Alataca', 'Công Nghệ  Alataca', 'Lang Ha, Tang15, 4a Lang ha, Dong Da, Ha Noi, Vietnam', '04.3623 0928', 'adv.globalmedia2', 'adv.globalmedia2', '0987150968', '04.3623 0937 ', 'phuca4@gmail.com', 'alatca.vn', 'http://adslink.eu', 'Công Ty Công Nghệ  Alataca', 'Công Ty Công Nghệ  Alataca', '0000-00-00', '1403724682', '<p style="padding-bottom: 5px;">\r\n	- Lưu th&ocirc;ng tin sản phẩm y&ecirc;u th&iacute;ch v&agrave; chia sẽ danh s&aacute;ch đ&oacute; cho bạn b&egrave; hoặc người th&acirc;n</p>\r\n<p style="padding-bottom: 5px;">\r\n	- Nhận email b&aacute;o gi&aacute; cho sản phẩm bạn đang quan t&acirc;m</p>\r\n<p style="padding-bottom: 5px;">\r\n	- Bạn c&oacute; thể viết đ&aacute;nh gi&aacute; cho sản phẩm hoặc cho cửa h&agrave;ng</p>\r\n<p style="padding-bottom: 5px;">\r\n	- Bạn c&oacute; thể viết đ&aacute;nh gi&aacute; cho sản phẩm hoặc cho cửa h&agrave;ng</p>\r\n', 'Lang Ha, Tang15, 4a Lang ha, Dong Da, Ha Noi, Vietnam');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.slide
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.slide: ~0 rows (approximately)
/*!40000 ALTER TABLE `slide` DISABLE KEYS */;
/*!40000 ALTER TABLE `slide` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.tags
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.tags: ~6 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `name`, `parent`, `child`, `date_creat`, `date_modified`, `status`, `alias`, `img`, `description`) VALUES
	(10, 'Hot', NULL, NULL, '2015-06-01', '2015-06-01', 1, NULL, NULL, 'hot'),
	(19, 'dep', 1, NULL, '2015-06-01', '2015-06-01', 1, NULL, NULL, 'hot'),
	(20, 'bau qua', 1, NULL, '2015-06-01', '2015-06-01', 1, 'bau-qua', NULL, ''),
	(21, 'da bao', 1, NULL, '2015-06-01', '2015-06-01', 1, NULL, NULL, 'hot'),
	(22, 'Hot Dear', NULL, NULL, '2015-06-01', '2015-06-01', 1, NULL, NULL, 'hot'),
	(23, 'hot dep', 22, NULL, '2015-06-01', '2015-06-01', 1, NULL, NULL, 'hot');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.video
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.video: ~0 rows (approximately)
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
/*!40000 ALTER TABLE `video` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.video_sv
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table host5_bagseshop.video_sv: ~0 rows (approximately)
/*!40000 ALTER TABLE `video_sv` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_sv` ENABLE KEYS */;


-- Dumping structure for table host5_bagseshop.visa
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='visa infor and status visa \r\nngay hen den lay';

-- Dumping data for table host5_bagseshop.visa: ~6 rows (approximately)
/*!40000 ALTER TABLE `visa` DISABLE KEYS */;
INSERT INTO `visa` (`id`, `visa_type`, `text_visatype`, `is_emb`, `is_urgently`, `date_arrival`, `date_exit`, `arrival_time`, `flight_number`, `private_letter`, `fasttrack`, `pickup`, `purpose`, `arrival_port`, `location`, `text_location`, `text_express`, `promotion_discount`, `discount_value`, `discount_amount`, `express`, `service`, `email_discount`, `number_of`, `promotion_code`) VALUES
	(3, '1ms', '1 month single entry', 0, 0, '2015-05-19', '2015-05-19', '00:00:00', 0, 0, 0, 0, 'Tourist', 'Noi Bai (Hanoi city)', '', 'Select one', '2 working days', NULL, 0, 0, 0, 19, 0, 1, 0),
	(4, '1ms', '1 month single entry', 0, 0, '2015-05-21', '2015-05-21', '00:00:00', 0, 0, 0, 0, 'Tourist', 'Noi Bai (Hanoi city)', '', 'Select one', '2 working days', NULL, 0, 0, 0, 19, 0, 1, 6767),
	(5, '1ms', '1 month single entry', 0, 0, '2015-05-19', '2015-05-19', '00:00:00', 0, 0, 0, 0, 'Tourist', 'Noi Bai (Hanoi city)', '', 'Select one', '2 working days', NULL, 0, 0, 0, 19, 0, 1, 3222),
	(6, '1ms', '1 month single entry', 0, 0, '2015-05-19', '2015-05-19', '00:00:00', 0, 0, 0, 0, 'Tourist', 'Noi Bai (Hanoi city)', '', 'Select one', '2 working days', NULL, 0, 0, 0, 19, 0, 1, 43454),
	(7, '1ms', '1 month single entry', 0, 0, '2015-05-19', '2015-05-19', '00:00:00', 0, 0, 0, 0, 'Tourist', 'Noi Bai (Hanoi city)', '', 'Select one', '2 working days', NULL, 0, 0, 0, 19, 0, 1, 2323232),
	(8, '1ms', '1 month single entry', 0, 0, '2015-05-19', '2015-05-19', '00:00:00', 0, 0, 0, 0, 'Tourist', 'Noi Bai (Hanoi city)', '', 'Select one', '2 working days', NULL, 0, 0, 0, 19, 0, 1, 3456);
/*!40000 ALTER TABLE `visa` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
