-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2015 at 10:22 AM
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
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
`id` int(11) NOT NULL,
  `code` varchar(300) NOT NULL,
  `email` varchar(256) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `code`, `email`, `date`) VALUES
(4, 'xXF1h!HIPEz7IzJy6c7YMcmy2HT4LRhABnLJ2-TngkaT!ZHtaXltzc3Jklb8SqLl$73t5ZKNjlWCWwSkpGcJq5%zdK13eK0Q5N-y', 'xuandac990@gmail.com', '2015-08-10'),
(5, 'TwhbmzKoq5DdBpqawaYVN-Y70V$OEw%b-TdHbwq8ltlZ-tQsDMk!jgTP3yybDhRQqMLkdObNtC5J8t255ui@rn-%KW9Rpwu-qB8i', 'xuandachd990@gmail.com', '2015-08-10'),
(6, 'RC7yFq3yrpwGeySWEQOcDQw0f7Bb1u8clUI2fzI9NG$LXXioePogJGXdif2evaLZRA56r18fx%KMwSkBQk@F%!dGyhdC!KDlCk81', 'trantthuhien110@gmail.com', '2015-08-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email`
--
ALTER TABLE `email`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
