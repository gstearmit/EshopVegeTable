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
CREATE DATABASE IF NOT EXISTS `rohlik99_apotraviny` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `rohlik99_apotraviny`;


-- Dumping structure for table rohlik99_apotraviny.settings
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table rohlik99_apotraviny.settings: 1 rows
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `name`, `seo_keywords`, `seo_description`, `title`, `address`, `phone`, `yahoo`, `skype`, `mobile`, `fax`, `email`, `url`, `linkweb`, `keyword`, `description`, `created`, `modified`, `about`, `introduction`, `logo1`, `logo_footer`, `ico`, `sologen`, `printerest`, `youtube_acount`, `facebook`, `facebook_text`, `tweets`, `tweets_text`, `github`, `google`, `feed`) VALUES
	(1, 'Công Ty Công Nghệ  Alataca', 'Magento, Varien, E-commerce,zend,alatca', 'Default Description', 'Công Nghệ  Alataca', '4506 CT12A - Khu đô thị Kim Văn - Kim Lũ - Đại Kim - Hoàng Mai - Hà Nội.', '0473.028989 Fax 0473.078989', 'adv.globalmedia2', 'adv.globalmedia2', '0987150968', '04.3623 0937 ', 'phuonganhpac@gmail.com', 'alatca.vn', 'http://adslink.eu', 'Công Ty Công Nghệ  Alataca', 'Công Ty Công Nghệ  Alataca', '0000-00-00', '1403724682', '<p style="padding-bottom: 5px;">\r\n	- Lưu th&ocirc;ng tin sản phẩm y&ecirc;u th&iacute;ch v&agrave; chia sẽ danh s&aacute;ch đ&oacute; cho bạn b&egrave; hoặc người th&acirc;n</p>\r\n<p style="padding-bottom: 5px;">\r\n	- Nhận email b&aacute;o gi&aacute; cho sản phẩm bạn đang quan t&acirc;m</p>\r\n<p style="padding-bottom: 5px;">\r\n	- Bạn c&oacute; thể viết đ&aacute;nh gi&aacute; cho sản phẩm hoặc cho cửa h&agrave;ng</p>\r\n<p style="padding-bottom: 5px;">\r\n	- Bạn c&oacute; thể viết đ&aacute;nh gi&aacute; cho sản phẩm hoặc cho cửa h&agrave;ng</p>\r\n', 'Lang Ha, Tang15, 4a Lang ha, Dong Da, Ha Noi, Vietnam', '11418521_792780610817907_1530775323_n.jpg', 'footer-2.png', 'favicon.ico', 'Sed ut perspiciatis unde omnis iste natus voluptatem accusantium doloremque lauda totam rem aperiam sunshine love.', NULL, NULL, 'nobility8989 @gmail.com', '<div class="pull-left-none">\r\n																				<span class="tweetprofilelink"> <strong><a\r\n																						href="https://www.facebook.com/nobility8989 @gmail.com">nobility8989 @gmail.com</a></strong>\r\n																					<a href="https://www.facebook.com/nobility8989 @gmail.com">@nobility8989 @gmail.com</a>\r\n																				</span>\r\n																				<p>Orenmode - Responsive Magento Theme\r\n																					http://mobility88.tk</p>\r\n																			</div>\r\n																			<div class="date">one limit</div>', 'nobility8989 @gmail.com', '<div class="pull-left-none">\r\n																				<span class="tweetprofilelink"> <strong><a\r\n																						href="https://twitter.com/alothemes">alothemes</a></strong>\r\n																					<a href="https://twitter.com/alothemes">@alothemes</a>\r\n																				</span>\r\n																				<p>Owlshop - Responsive Magento Theme\r\n																					http://t.co/aZgY52qE8K</p>\r\n																			</div>\r\n																			<div class="date">72 days ago</div>', NULL, NULL, NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
