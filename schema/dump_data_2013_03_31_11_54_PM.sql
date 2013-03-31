-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2013 at 11:54 PM
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
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programId` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `website` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `comment` text COLLATE utf8_bin NOT NULL,
  `postedTime` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 = pending approval, 1 = approved, 2 = spam',
  PRIMARY KEY (`id`),
  KEY `programId` (`programId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `programId`, `name`, `email`, `website`, `comment`, `postedTime`, `status`) VALUES
(1, 1, 'Aline marke', 'alinemarke@gmail.com', 'http://haisum.info', 'Maecenas sed justo varius velit imperdiet bibendum. commodo tristique odio. quis fringilla ligula aliquet ut. Maecenas sed justo varius velit imperdiet bibendum.', '2012-11-22 07:15:00', 1),
(2, 2, 'Steve john', 'stevejohn@gmail.com', 'http://mediabanq.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer commodo est usus legentis in iis qui facit eorum claritatem.\r\n', '2012-10-13 00:00:00', 1),
(3, 1, 'Aline marke', 'alinemarke@gmail.com', 'http://haisum.info', 'Maecenas sed justo varius velit imperdiet bibendum. commodo tristique odio. quis fringilla ligula aliquet ut. Maecenas sed justo varius velit imperdiet bibendum.', '2012-11-22 07:15:00', 1),
(4, 16, 'Steve john', 'stevejohn@gmail.com', 'http://mediabanq.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer commodo est usus legentis in iis qui facit eorum claritatem.\r\n', '2012-10-13 00:00:00', 1),
(5, 16, 'Steve john', 'stevejohn@gmail.com', 'http://mediabanq.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer commodo est usus legentis in iis qui facit eorum claritatem.\r\n', '2012-10-13 00:00:00', 1),
(6, 31, 'Steve john', 'stevejohn@gmail.com', 'http://mediabanq.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer commodo est usus legentis in iis qui facit eorum claritatem.\r\n', '2012-10-13 00:00:00', 1),
(7, 31, 'Steve john', 'stevejohn@gmail.com', 'http://mediabanq.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer commodo est usus legentis in iis qui facit eorum claritatem.\r\n', '2012-10-13 00:00:00', 1),
(8, 38, 'jhjdsjfh', 'sajfjksdf@sdfsdf.com', 'http://sfdfsdf.com', 'sdjkfjksdjfkskjdf', '2013-03-31 21:29:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `path` text COLLATE utf8_bin NOT NULL,
  `type` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '1 = slider, 2= background, 3=other, 4= thumbnail',
  `position` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'we could sort using this attribute',
  `itemId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'associated item id, might be associated with some movie or music as its thumbnail ',
  `lastModified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `title`, `path`, `type`, `position`, `itemId`, `lastModified`) VALUES
(1, 'red thumb', 'images/programImages/music/thumb2.jpg', 0, 0, 0, '2013-03-31 20:39:00'),
(2, 'Default Thumbnail', 'images/programImages/music/thumb1.jpg', 0, 0, 0, '0000-00-00 00:00:00'),
(3, 'dsfgsdg', 'images/programImages/1364744787.gif', 0, 1, 0, '2013-03-31 20:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=46 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `name`, `url`, `description`, `imageId`, `timing`, `status`, `type`, `upVotes`, `downVotes`) VALUES
(7, 'Music Show', 'https://www.youtube.com/watch?feature=player_embedded&v=22h2Yp8w8kg', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-03-20 08:00:00', 1, 1, 45, 4),
(8, 'Music Show', 'https://www.youtube.com/watch?feature=player_embedded&v=22h2Yp8w8kg', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-03-20 08:00:00', 1, 1, 45, 4),
(9, 'Music Show', 'https://www.youtube.com/watch?feature=player_embedded&v=22h2Yp8w8kg', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-03-20 08:00:00', 1, 1, 45, 4),
(10, 'Music Show', 'https://www.youtube.com/watch?feature=player_embedded&v=22h2Yp8w8kg', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-03-20 08:00:00', 1, 1, 45, 4),
(11, 'Music Show', 'https://www.youtube.com/watch?feature=player_embedded&v=22h2Yp8w8kg', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-03-20 08:00:00', 1, 1, 45, 4),
(12, 'Music Show', 'https://www.youtube.com/watch?feature=player_embedded&v=22h2Yp8w8kg', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-03-20 08:00:00', 1, 1, 45, 4),
(13, 'Music Show', 'https://www.youtube.com/watch?feature=player_embedded&v=22h2Yp8w8kg', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-03-20 08:00:00', 1, 1, 45, 4),
(14, 'Music Show', 'https://www.youtube.com/watch?feature=player_embedded&v=22h2Yp8w8kg', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-03-20 08:00:00', 1, 1, 45, 4),
(15, 'Music Show', 'https://www.youtube.com/watch?feature=player_embedded&v=22h2Yp8w8kg', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-03-20 08:00:00', 1, 1, 46, 4),
(21, 'Drama', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2013-03-08 07:00:00', 1, 2, 45, 5),
(22, 'Drama', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2013-03-08 07:00:00', 1, 2, 45, 4),
(23, 'Drama', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2013-03-08 07:00:00', 1, 2, 45, 4),
(25, 'Drama', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2013-03-08 07:00:00', 1, 2, 45, 4),
(27, 'Drama', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2013-03-08 07:00:00', 1, 2, 45, 4),
(28, 'Drama', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2013-03-08 07:00:00', 1, 2, 45, 4),
(29, 'Drama', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2013-03-08 07:00:00', 1, 2, 45, 4),
(30, 'Drama', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2013-03-08 07:00:00', 1, 2, 45, 4),
(31, 'Drama', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2013-03-08 07:00:00', 1, 2, 45, 4),
(37, 'Show', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, '2013-03-08 07:00:00', 1, 3, 45, 9),
(38, 'Show', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, '2013-03-08 07:00:00', 1, 3, 45, 4),
(39, 'Show', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, '2013-03-08 07:00:00', 1, 3, 45, 4),
(40, 'Show', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, '2013-03-08 07:00:00', 1, 3, 45, 4),
(41, 'Show', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, '2013-03-08 07:00:00', 1, 3, 45, 4),
(42, 'Show', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, '2013-03-08 07:00:00', 1, 3, 45, 4),
(43, 'Show', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, '2013-03-08 07:00:00', 1, 3, 45, 4),
(44, 'Show', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, '2013-03-08 07:00:00', 1, 3, 45, 4),
(45, 'Show', 'http://www.youtube.com/embed/22h2Yp8w8kg?wmode=transparent', 'Eorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, '2013-03-08 07:00:00', 1, 3, 45, 4);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_bin NOT NULL,
  `key` varchar(100) COLLATE utf8_bin NOT NULL,
  `value` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `key` (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `category`, `key`, `value`) VALUES
(5, 'system', 'facebook-app-id', 's:15:"196102790527115";'),
(6, 'system', 'facebook-app-secret', 's:32:"5cff24a64bf3cb0abde8c270158c580e";'),
(8, 'system', 'mobile-android-app', 's:30:"http://play.google.com/someapp";'),
(9, 'system', 'mobile-iphone-app', 's:30:"http://store.apple.com/someapp";'),
(10, 'system', 'live-streaming-url', 's:78:"http://www.youtube.com/watch?v=sszS-vb3dgE&list=UU9DhQ5rlwDAvQBt0YkP7KGA&index";'),
(11, 'system', 'facebook-profile', 's:12:"javascript:;";'),
(12, 'system', 'linkedin-profile', 's:12:"javascript:;";'),
(13, 'system', 'twitter-profile', 's:12:"javascript:;";'),
(14, 'system', 'rss-feed-url', 's:12:"javascript:;";'),
(15, 'system', 'google-plus-profile', 's:12:"javascript:;";'),
(16, 'slider', 'slide1', 's:10:"About nex1";'),
(17, 'slider', 'slide2', 's:7:"Tune in";'),
(18, 'slider', 'slide3', 's:19:"<p>\r\n	Tune In</p>\r\n";'),
(19, 'slider', 'slide4', 's:11:"Mobile Apps";'),
(20, 'system', 'sample setting', 's:7:"smapdps";');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `website`, `address`, `password`, `birthday`, `lastLogin`, `registerDate`, `type`) VALUES
(2, 'Haisum', 'Bhatti', 'haisumbhatti@gmail.com', 'http://www.facebook.com/haisum', 'Tando Muhammad Khan', 'admin1234', '1991-01-25 00:00:00', '2013-03-26 15:05:13', '2013-03-26 15:05:13', 2),
(3, 'askjfjsdaf', 'kjsdafkjsadkjf', 'jasfjsafdj@sdfsdf.com', 'kjdsafjkdsajkf', 'sakfklsadflk', '3290329090490', '1983-02-23 00:00:00', '2013-03-26 16:37:42', '2013-03-26 16:37:42', 1),
(4, 'askjfjsdaf', 'kjsdafkjsadkjf', 'jasfjsafdj@sdfsdf.com', 'kjdsafjkdsajkf', 'sakfklsadflk', '3290329090490', '1983-02-23 00:00:00', '2013-03-26 16:37:42', '2013-03-26 16:37:42', 1),
(5, 'askjfjsdaf', 'kjsdafkjsadkjf', 'jasfjsafdj@sdfsdf.com', 'kjdsafjkdsajkf', 'sakfklsadflk', '3290329090490', '1983-02-23 00:00:00', '2013-03-26 16:37:55', '2013-03-26 16:37:55', 1),
(6, 'askjfjsdaf', 'kjsdafkjsadkjf', 'jasfjsafdj@sdfsdf.com', 'kjdsafjkdsajkf', 'sakfklsadflk', '3290329090490', '1983-02-23 00:00:00', '2013-03-26 16:37:55', '2013-03-26 16:37:55', 1),
(7, 'haisum', 'jaksdj', 'haisumbhatti@gmail.comas', 'aksdkj', 'pak', 'kadkkajdskasdkj', '2011-02-12 00:00:00', '2013-03-26 17:17:28', '2013-03-26 17:17:28', 1),
(8, 'asfsadfsf', 'sadfsadjf', 'jsahdfjsadf@sdafasdf.com', 'kjsdkjfkjsdf', 'ksjfkjsafkj', 'kjsadfjkjskfd', '3223-02-03 00:00:00', '2013-03-26 17:20:42', '2013-03-26 17:20:42', 1),
(9, 'asfsadfsf', 'sadfsadjf', 'jsahdfjsadf@sdafasdf.com', 'kjsdkjfkjsdf', 'ksjfkjsafkj', 'kjsadfjkjskfd', '3223-02-03 00:00:00', '2013-03-26 17:20:42', '2013-03-26 17:20:42', 1),
(10, 'sadjfsfj', 'ddsafuisaidf', 'kjdsafjksdaf@sadfsafd.com', 'kjdsdkjafkj', 'ssakdjfkjsaf', 'kjsdkajfk', '0000-00-00 00:00:00', '2013-03-26 17:23:16', '2013-03-26 17:23:16', 1),
(11, 'sadjfsfj', 'ddsafuisaidf', 'kjdsafjksdaf@sadfsafd.comf', 'kjdsdkjafkj', 'ssakdjfkjsaf', 'kjsdkajfk', '0000-00-00 00:00:00', '2013-03-26 17:25:10', '2013-03-26 17:25:10', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
