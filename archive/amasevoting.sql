-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.appjam.roboteater.com
-- Generation Time: Jun 14, 2012 at 05:13 AM
-- Server version: 5.1.39
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `amasevoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajaxResults`
--

CREATE TABLE IF NOT EXISTS `ajaxResults` (
  `uid` int(12) NOT NULL,
  `tid` int(12) NOT NULL,
  `question` int(2) NOT NULL,
  `value` int(2) NOT NULL,
  KEY `uid` (`uid`,`tid`,`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ajaxResults`
--


-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('6944ab456d6776e80a30c8bb705afe8e', '174.77.38.77', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_4) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 1339658658, ''),
('9ce21c0ae0a3a7b7f61bbe9640be8276', '174.77.38.77', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_4) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 1339675994, 'a:2:{s:3:"uid";s:1:"1";s:8:"username";s:6:"judge1";}'),
('66bc7ce2bd17cfc57a66d59121c59be3', '174.77.38.77', 'Mozilla/5.0 (iPad; CPU OS 5_1_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9B206 Safari/75', 1339675457, 'a:3:{s:9:"user_data";s:0:"";s:3:"uid";s:1:"2";s:8:"username";s:6:"judge2";}');

-- --------------------------------------------------------

--
-- Stand-in structure for view `publicResults`
--
CREATE TABLE IF NOT EXISTS `publicResults` (
`tid` int(12)
,`name` varchar(45)
,`category` varchar(255)
,`score` decimal(32,0)
,`responseCount` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `tid` int(12) NOT NULL,
  `question` int(2) NOT NULL,
  `value` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`tid`, `question`, `value`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(2, 1, 4),
(2, 2, 7),
(2, 3, 6),
(2, 4, 5),
(3, 1, 4),
(3, 2, 4),
(3, 3, 5),
(3, 4, 5),
(4, 1, 4),
(4, 2, 6),
(4, 3, 6),
(4, 4, 5),
(5, 1, 5),
(5, 2, 7),
(5, 3, 5),
(5, 4, 6),
(6, 1, 4),
(6, 2, 5),
(6, 3, 6),
(6, 4, 6),
(7, 1, 5),
(7, 2, 8),
(7, 3, 5),
(7, 4, 7),
(8, 1, 5),
(8, 2, 7),
(8, 3, 6),
(8, 4, 6),
(9, 1, 7),
(9, 2, 7),
(9, 3, 7),
(9, 4, 5),
(10, 1, 10),
(10, 2, 7),
(10, 3, 9),
(10, 4, 7),
(11, 1, 10),
(11, 2, 7),
(11, 3, 8),
(11, 4, 7),
(12, 1, 10),
(12, 2, 12),
(12, 3, 12),
(12, 4, 10),
(13, 1, 4),
(13, 2, 7),
(13, 3, 7),
(13, 4, 4),
(14, 1, 8),
(14, 2, 8),
(14, 3, 5),
(14, 4, 6),
(15, 1, 5),
(15, 2, 6),
(15, 3, 6),
(15, 4, 5),
(16, 1, 4),
(16, 2, 5),
(16, 3, 5),
(16, 4, 3),
(17, 1, 3),
(17, 2, 3),
(17, 3, 3),
(17, 4, 3),
(18, 1, 4),
(18, 2, 4),
(18, 3, 4),
(18, 4, 4),
(19, 1, 2),
(19, 2, 2),
(19, 3, 2),
(19, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `category` varchar(255) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `category`) VALUES
(1, 'App Whoopers', 'CS-190'),
(2, 'BooksInteractive', 'CS-190'),
(3, 'Busy Anteaters', 'CS-190'),
(4, 'Dungeon Master', 'CS-190'),
(5, 'Intelligent Food Monitor', 'CS-190'),
(6, 'Lets', 'CS-190'),
(7, 'PhoenixAAD', 'CS-190'),
(8, 'Team VIIm', 'CS-190'),
(9, 'The GBC', 'CS-190'),
(10, 'Cragler', 'General'),
(11, 'Down With Food!', 'General'),
(12, 'Dubium', 'General'),
(13, 'Group 3', 'General'),
(14, 'Ice Cream Cola', 'General'),
(15, 'MicroTeam', 'General'),
(16, 'Socially Awkward Anteaters', 'General'),
(17, 'Team Ford', 'General'),
(18, 'Team Kobot', 'General'),
(19, 'UNKNOWN', 'General'),
(20, 'PhotoGam', 'CS-190'),
(21, 'Gyaan', 'CS-190');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`) VALUES
(1, 'judge1', 'pw1'),
(2, 'judge2', 'pw2'),
(3, 'judge3', 'pw3'),
(4, 'judge4', 'pw4'),
(5, 'judge5', 'pw5'),
(6, 'judge6', 'pw6'),
(7, 'judge7', 'pw7'),
(8, 'judge8', 'pw8');

-- --------------------------------------------------------

--
-- Stand-in structure for view `winners`
--
CREATE TABLE IF NOT EXISTS `winners` (
`tid` int(12)
,`name` varchar(45)
,`score` decimal(32,0)
,`responseCount` bigint(21)
);
-- --------------------------------------------------------

--
-- Structure for view `publicResults`
--
DROP TABLE IF EXISTS `publicResults`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasevoting`@`67.205.0.0/255.255.192.0` SQL SECURITY DEFINER VIEW `publicResults` AS select `ajaxResults`.`tid` AS `tid`,`teams`.`name` AS `name`,`teams`.`category` AS `category`,sum(`ajaxResults`.`value`) AS `score`,count(`ajaxResults`.`tid`) AS `responseCount` from (`ajaxResults` join `teams`) where (`teams`.`id` = `ajaxResults`.`tid`) group by `ajaxResults`.`tid` order by sum(`ajaxResults`.`value`) desc;

-- --------------------------------------------------------

--
-- Structure for view `winners`
--
DROP TABLE IF EXISTS `winners`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasevoting`@`67.205.0.0/255.255.192.0` SQL SECURITY DEFINER VIEW `winners` AS select `ajaxResults`.`tid` AS `tid`,`teams`.`name` AS `name`,sum(`ajaxResults`.`value`) AS `score`,count(`ajaxResults`.`tid`) AS `responseCount` from (`ajaxResults` join `teams`) where (`teams`.`id` = `ajaxResults`.`tid`) group by `ajaxResults`.`tid` order by sum(`ajaxResults`.`value`) desc;
