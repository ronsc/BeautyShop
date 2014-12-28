-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `beauty2`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- dump ตาราง `service`
--

INSERT INTO `service` (`id`, `list`) VALUES
(28, 'ไฮไลท์ผม'),
(25, 'อบไอน้ำ+เซรั่ม'),
(26, 'สปาผม'),
(27, 'ทำสีผม'),
(23, 'อบไอน้ำ+ทรีทเม้น'),
(22, 'อบไอน้ำ'),
(21, 'ดัดผมถาวร'),
(20, 'ซอย-เซ็ต'),
(19, 'สระ - ไดร์'),
(29, 'สระ-ไดร์-รีด'),
(32, 'ทำเล็บ'),
(31, 'แต่งหน้า+ทำผม'),
(33, 'กันคิ้ว');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `zoom` int(11) DEFAULT NULL,
  `shopname` varchar(100) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` text,
  `tel` varchar(10) DEFAULT NULL,
  `pic` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- dump ตาราง `shop`
--

INSERT INTO `shop` (`id`, `latitude`, `longitude`, `zoom`, `shopname`, `name`, `address`, `tel`, `pic`) VALUES
(7, 14.9939550588947, 102.114865191593, 19, 'เจ๊ติ๊ก บิวตี้', 'พี่ติ๊ก', '294/33 ถ.30กันยา ต.ในเมือง อ.เมือง จ.นครราชสีมา 30220', '0821554327', 'bg.jpg'),
(6, 14.9884674873413, 102.112625547066, 14, 'NaDa บิวตี้', 'พี่ดา', '26/5 ถ.สุรณารายณ์ ซ.3 ต.ในเมือง อ.เมือง จ.นครราชสีมา 30000', '0884810207', 'bg.jpg'),
(10, 14.9884674873413, 102.112625547066, NULL, 'นะดา', 'pp', 'ghjjk', '12344', 'bg.jpg'),
(11, 14.995198681609091, 102.09654838623044, 13, 'test', '', '', '', 'pic_angular.jpg');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `shop_have_services`
--

CREATE TABLE IF NOT EXISTS `shop_have_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `price_min` int(4) NOT NULL,
  `price_max` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shop` (`shop_id`),
  KEY `fk_services` (`service_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- dump ตาราง `shop_have_services`
--

INSERT INTO `shop_have_services` (`id`, `shop_id`, `service_id`, `price_min`, `price_max`) VALUES
(10, 7, 23, 140, 180),
(9, 7, 27, 0, 500),
(8, 7, 26, 0, 399),
(7, 7, 25, 160, 200),
(6, 7, 28, 0, 350),
(11, 7, 22, 0, 140),
(12, 7, 21, 0, 400),
(13, 7, 20, 100, 140),
(14, 7, 19, 60, 150),
(15, 7, 29, 70, 150),
(16, 7, 32, 0, 120),
(17, 7, 31, 0, 450),
(18, 7, 33, 0, 30),
(19, 6, 28, 0, 500),
(20, 6, 25, 180, 250),
(21, 6, 26, 0, 450),
(22, 6, 27, 0, 600),
(23, 6, 23, 150, 200),
(24, 6, 22, 0, 120),
(25, 6, 21, 0, 450),
(26, 6, 20, 120, 200),
(27, 6, 19, 80, 120),
(28, 6, 29, 80, 150),
(29, 6, 32, 0, 150),
(30, 6, 31, 500, 650),
(31, 6, 33, 0, 20);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', '12345', '·´ÊÍº ÃÐººÅçÍ¡ÍÔ¹');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
