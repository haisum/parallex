-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2013 at 12:29 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mediaban_nex1tv`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE IF NOT EXISTS `Comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programId` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `website` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `comment` text COLLATE utf8_bin NOT NULL,
  `postedTime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `programId` (`programId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Config`
--

CREATE TABLE IF NOT EXISTS `Config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(100) COLLATE utf8_bin NOT NULL,
  `value` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Image`
--

CREATE TABLE IF NOT EXISTS `Image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `path` text COLLATE utf8_bin NOT NULL,
  `type` int(4) unsigned NOT NULL COMMENT '1 = slider, 2= background, 3=other, 4= thumbnail',
  `position` int(10) unsigned NOT NULL COMMENT 'we could sort using this attribute',
  `itemId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'associated item id, might be associated with some movie or music as its thumbnail ',
  `lastModified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Program`
--

CREATE TABLE IF NOT EXISTS `Program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `url` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `imageId` int(11) NOT NULL,
  `timing` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = active , 0 = disabled',
  `type` int(10) unsigned NOT NULL COMMENT '1 = music, 2 = tv series, 3 = shows',
  `upVotes` int(10) unsigned NOT NULL DEFAULT '0',
  `downVotes` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastName` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `website` varchar(255) COLLATE utf8_bin NOT NULL,
  `address` text COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `birthday` datetime NOT NULL,
  `lastLogin` datetime NOT NULL,
  `registerDate` datetime NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1 = normal, 2 = admin',
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
