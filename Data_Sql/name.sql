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


-- Dumping structure for table apotraviny.name
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table apotraviny.name: ~16 rows (approximately)
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
	(21, 'Lazada3', 18, NULL, '2015-06-18', '2015-06-18', NULL, NULL, NULL, 'https://www.rohlik.cz/c75533-napoje', NULL, '  '),
	(24, 'lazada th', 18, NULL, '2015-06-26', '2015-06-26', NULL, NULL, NULL, 'http://rohlik-crowler-1.tk/crowler/name/index', NULL, ' '),
	(25, 'Trvanlivé potravinyyy', 1, NULL, '2015-07-13', '2015-07-13', NULL, NULL, NULL, 'https://www.rohlik.cz/c75471-trvanlive-potraviny', NULL, '   https://www.rohlik.cz/c75471-trvanlive-potraviny'),
	(33, 'Napoje-page 14', 1, NULL, '0000-00-00', '0000-00-00', 0, 1, 1, 'https://www.rohlik.cz/c75533-napoje?paginator-page=13&do=paginator-loadMore', NULL, NULL),
	(34, 'farmarske-potraviny', 1, NULL, '2015-07-30', '2015-07-30', NULL, NULL, NULL, 'https://www.rohlik.cz/c133137-farmarske-potraviny', NULL, 'farmarske-potraviny'),
	(35, 'cerstve potraviny', 1, NULL, '2015-08-04', '2015-08-04', NULL, NULL, NULL, 'https://www.rohlik.cz/c75403-cerstve-potraviny', NULL, '');
/*!40000 ALTER TABLE `name` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
