-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for apotraviny
CREATE DATABASE IF NOT EXISTS `apotraviny` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `apotraviny`;


-- Dumping structure for table apotraviny.declaration
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='declaration -- mau de loc du lieu';

-- Dumping data for table apotraviny.declaration: ~6 rows (approximately)
/*!40000 ALTER TABLE `declaration` DISABLE KEYS */;
INSERT INTO `declaration` (`id`, `product_code`, `name_id`, `host`, `url`, `page_taken`, `avatar_images`, `directoryavatar`, `product_name`, `product_price`, `product_images`, `product_descriptstion`, `detail_product_descriptstion`, `countryoforigin`, `product_promotion`, `product_href_detail`) VALUES
	(5, 1915, 2, 'https://www.rohlik.cz', 'https://www.rohlik.cz/c75533-napoje', 12, NULL, 'upload', 'div.items article h3', 'div.items article h6', 'div.items article a.img img', 'div.popupDetail div.table div.cell section', 'div#popup_dsc', 'li.country', 'div.items article div.ico', 'div.items article h3'),
	(6, 4434, 3, 'https://www.rohlik.cz', 'https://www.rohlik.cz/c133337-alkohol-a-tabak', 12, '', '', 'div.items article h3', 'div.items article h6', 'div.items article a.img img', 'div.popupDetail div.table div.cell section', 'div#popup_dsc', 'li.country', 'div.items article div.ico', 'div.items article h3'),
	(7, 54556, 25, 'https://www.rohlik.cz', 'https://www.rohlik.cz/c75471-trvanlive-potraviny', 10, NULL, NULL, 'div.items article h3', 'div.items article h6', 'div.items article a.img img', 'div.popupDetail div.table div.cell section', 'div#popup_dsc', 'li.country', 'div.items article div.ico', 'div.items article h3'),
	(8, 1916, 33, 'https://www.rohlik.cz', 'https://www.rohlik.cz/c75533-napoje?paginator-page=13&do=paginator-loadMore', 12, NULL, 'upload', 'div.items article h3', 'div.items article h6', 'div.items article a.img img', 'div.popupDetail div.table div.cell section', 'div#popup_dsc', 'li.country', 'div.items article div.ico', 'div.items article h3'),
	(37, 4157, 34, 'https://www.rohlik.cz', 'https://www.rohlik.cz/c133137-farmarske-potraviny', 1, NULL, NULL, 'div.items article h3', 'div.items article h6', 'div.items article a.img img', 'div.popupDetail div.table div.cell section', 'div#popup_dsc', 'li.country', 'div.items article div.ico', 'div.items article h3'),
	(38, 9840, 35, 'https://www.rohlik.cz', 'https://www.rohlik.cz/c75403-cerstve-potraviny', 1, NULL, NULL, 'div.items article h3', 'div.items article h6', 'div.items article a.img img', 'div.popupDetail div.table div.cell section', 'div#popup_dsc', 'li.country', 'div.items article div.ico', 'div.items article h3');
/*!40000 ALTER TABLE `declaration` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
