-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 11 月 30 日 09:55
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `feidong`
--

-- --------------------------------------------------------

--
-- 表的结构 `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(14) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `pwd` char(32) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `company_name` text COLLATE utf8mb4_bin NOT NULL,
  `intro` text COLLATE utf8mb4_bin NOT NULL,
  `location` text COLLATE utf8mb4_bin NOT NULL,
  `core_business` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `phone` varchar(14) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `contact` varchar(16) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `email` varchar(128) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `orderby` int(11) unsigned NOT NULL DEFAULT '0',
  `is_forbidden` int(1) NOT NULL DEFAULT '1' COMMENT '是否显示',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `add_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `add_ip` char(16) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
