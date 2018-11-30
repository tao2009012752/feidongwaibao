-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 11 月 30 日 09:56
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
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT ' ',
  `account` varchar(16) COLLATE utf8mb4_bin NOT NULL,
  `pwd` char(32) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `sex` int(1) NOT NULL COMMENT '性别，值1男，值0女',
  `is_forbidden` tinyint(1) NOT NULL DEFAULT '0',
  `add_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  `add_ip` varchar(16) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `last_time` int(10) NOT NULL DEFAULT '0',
  `last_ip` varchar(16) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `friend_link_sort` int(6) NOT NULL DEFAULT '0' COMMENT '用户显示排序',
  `is_delete` int(1) NOT NULL COMMENT '是否删除',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
