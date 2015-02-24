-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2015 at 10:08 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mafiawar_sergy`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Operator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `status`) VALUES
(5, 'Music2', 8, 0),
(14, 'Best This year2', 0, 0),
(15, 'Best This year', 0, 0),
(16, 'Best This year', 0, 0),
(17, 'Best This year', 0, 0),
(18, 'Best This year', 0, 0),
(19, 'Best This year', 0, 0),
(20, 'Best This year', 0, 0),
(21, 'Best This year', 0, 0),
(22, 'Best This year', 0, 0),
(23, 'Best This year', 0, 0),
(24, 'Best This year', 0, 0),
(25, 'Best This year', 0, 0),
(26, 'Best This year', 0, 0),
(27, 'Best This year', 0, 0),
(28, 'Best This year', 0, 0),
(29, 'Best This year', 0, 0),
(30, 'Best This year', 0, 0),
(31, 'Best This year', 0, 0),
(32, 'Best This year', 0, 0),
(33, 'test', 0, 0),
(34, 'demo', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user`, `timestamp`) VALUES
(1, 1, '2014-12-02 11:03:48'),
(2, 5, '2014-12-02 11:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `chatmessages`
--

CREATE TABLE IF NOT EXISTS `chatmessages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chat` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `json` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=379 ;

--
-- Dumping data for table `chatmessages`
--

INSERT INTO `chatmessages` (`id`, `chat`, `user`, `timestamp`, `type`, `url`, `imageurl`, `status`, `json`) VALUES
(1, 0, 14, '2015-01-23 10:41:17', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hbhhh","timestamp":1422009677186}'),
(2, 0, 14, '2015-01-23 10:41:20', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Kaaah","timestamp":1422009680588}'),
(3, 0, 14, '2015-01-23 10:41:36', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hhhhh","timestamp":1422009696602}'),
(4, 0, 14, '2015-01-23 10:42:10', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"uuuuu","timestamp":1422009732452}'),
(5, 0, 14, '2015-01-23 10:42:18', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Lllll","timestamp":1422009738653}'),
(6, 0, 14, '2015-01-23 10:43:33', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Pppp","timestamp":1422009813887}'),
(7, 0, 14, '2015-01-23 10:48:19', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hey","timestamp":1422010099582}'),
(8, 0, 14, '2015-01-23 10:50:05', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"jjjjj","timestamp":1422010207437}'),
(9, 0, 14, '2015-01-23 10:50:07', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"iiii","timestamp":1422010209721}'),
(10, 0, 14, '2015-01-23 10:50:18', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"uuuu","timestamp":1422010220572}'),
(11, 0, 14, '2015-01-23 11:05:47', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hhheeeyyy","timestamp":1422011147430}'),
(12, 0, 14, '2015-01-23 11:07:00', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"llll","timestamp":1422011222224}'),
(13, 0, 14, '2015-01-23 11:07:48', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"ooooo","timestamp":1422011270728}'),
(14, 0, 14, '2015-01-23 11:12:37', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"hey","type":0,"timestamp":1422011559475}'),
(15, 0, 14, '2015-01-23 11:16:19', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hey","timestamp":1422011781654}'),
(16, 0, 14, '2015-01-23 11:16:49', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"yuio","timestamp":1422011811489}'),
(17, 0, 14, '2015-01-23 11:17:01', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hey","timestamp":1422011823560}'),
(18, 0, 14, '2015-01-23 11:17:31', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hello","timestamp":1422011852745}'),
(19, 0, 14, '2015-01-23 11:17:37', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"ooou","timestamp":1422011859769}'),
(20, 0, 14, '2015-01-23 11:18:47', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"sey then","timestamp":1422011928805}'),
(21, 0, 14, '2015-01-23 13:14:14', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Nnnnn","timestamp":1422018854973}'),
(22, 0, 14, '2015-01-23 13:16:31', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422018990763}'),
(23, 0, 14, '2015-01-23 13:16:46', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hello","timestamp":1422019005877}'),
(24, 0, 14, '2015-01-23 13:17:57', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422019076950}'),
(25, 0, 14, '2015-01-23 13:21:16', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"jjh","type":0,"timestamp":1422019278046}'),
(26, 0, 14, '2015-01-23 13:21:41', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422019301652}'),
(27, 0, 14, '2015-01-23 13:21:48', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422019308605}'),
(28, 0, 14, '2015-01-23 13:21:50', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"helllo","type":0,"timestamp":1422019312417}'),
(29, 0, 14, '2015-01-23 13:21:55', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422019315582}'),
(30, 0, 14, '2015-01-23 13:22:06', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ho","timestamp":1422019326027}'),
(31, 0, 14, '2015-01-23 13:22:48', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hey","timestamp":1422019368515}'),
(32, 0, 14, '2015-01-23 13:22:54', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"hello","type":0,"timestamp":1422019376270}'),
(33, 0, 14, '2015-01-23 13:23:22', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ooooo","timestamp":1422019397661}'),
(34, 0, 14, '2015-01-23 13:25:54', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"......","type":0,"timestamp":1422019555935}'),
(35, 0, 14, '2015-01-23 13:26:22', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hey","timestamp":1422019583843}'),
(36, 0, 14, '2015-01-23 13:27:06', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422019624989}'),
(37, 0, 14, '2015-01-23 13:32:35', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"123","type":0,"timestamp":1422019956815}'),
(38, 0, 14, '2015-01-23 14:50:39', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422024639166}'),
(39, 0, 14, '2015-01-23 14:53:35', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"hi","type":0,"timestamp":1422024815832}'),
(40, 0, 14, '2015-01-23 14:54:03', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422024842282}'),
(41, 0, 14, '2015-01-23 14:54:15', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"Hello","type":0,"timestamp":1422024855472}'),
(42, 0, 14, '2015-01-23 14:54:21', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"Kickass!","type":0,"timestamp":1422024861674}'),
(43, 0, 14, '2015-01-23 14:54:23', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":":DDD","type":0,"timestamp":1422024864018}'),
(44, 0, 14, '2015-01-23 14:54:31', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"123456789\\\\","type":0,"timestamp":1422024871101}'),
(45, 0, 14, '2015-01-23 14:54:48', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"Pretty cool","type":0,"timestamp":1422024888258}'),
(46, 0, 14, '2015-01-23 14:54:54', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hey","timestamp":1422024893823}'),
(47, 0, 14, '2015-01-23 14:54:58', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"super","type":0,"timestamp":1422024898011}'),
(48, 0, 14, '2015-01-23 14:55:02', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ahut up","timestamp":1422024902532}'),
(49, 0, 14, '2015-01-23 14:55:07', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"no","type":0,"timestamp":1422024907303}'),
(50, 0, 14, '2015-01-23 14:55:12', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Please","timestamp":1422024912389}'),
(51, 0, 14, '2015-01-23 14:55:42', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hxhdhc","timestamp":1422024942193}'),
(52, 0, 14, '2015-01-23 14:55:44', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hshsha","timestamp":1422024944227}'),
(53, 0, 14, '2015-01-23 14:55:54', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"hey","type":0,"timestamp":1422024954250}'),
(54, 0, 14, '2015-01-23 14:55:58', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Gshshs","timestamp":1422024956212}'),
(55, 0, 14, '2015-01-23 14:56:00', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"jyf]","type":0,"timestamp":1422024960822}'),
(56, 0, 14, '2015-01-23 14:56:07', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"{\\"id\\":\\"1\\",\\"name\\":\\"form1\\",\\"json\\":\\"[{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Name\\\\\\",\\\\\\"name\\\\\\":\\\\\\"name\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Email\\\\\\",\\\\\\"name\\\\\\":\\\\\\"email\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"password\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Password\\\\\\",\\\\\\"name\\\\\\":\\\\\\"password\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"selection\\\\\\",\\\\\\"value\\\\\\":[{\\\\\\"value\\\\\\":\\\\\\"0\\\\\\",\\\\\\"title\\\\\\":\\\\\\"one\\\\\\"},{\\\\\\"value\\\\\\":\\\\\\"1\\\\\\",\\\\\\"title\\\\\\":\\\\\\"two\\\\\\"},{\\\\\\"value\\\\\\":\\\\\\"2\\\\\\",\\\\\\"title\\\\\\":\\\\\\"three\\\\\\"}],\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"\\\\\\",\\\\\\"name\\\\\\":\\\\\\"sel\\\\\\"}]\\",\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0H3\\"}","type":3,"timestamp":1422024967329}'),
(57, 0, 14, '2015-01-23 14:56:25', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Form Submited Successfully","timestamp":1422024985556}'),
(58, 0, 14, '2015-01-23 14:56:26', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Form Submited Successfully","timestamp":1422024985950}'),
(59, 0, 14, '2015-01-24 04:14:41', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Good morning","timestamp":1422072880942}'),
(60, 0, 14, '2015-01-24 04:50:56', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Working on sergy","timestamp":1422075041705}'),
(61, 0, 14, '2015-01-24 04:55:32', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"Good morning jagruti","type":0,"timestamp":1422075331334}'),
(62, 0, 14, '2015-01-24 16:58:21', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Good nyt","timestamp":1422118700305}'),
(63, 0, 14, '2015-01-26 09:29:42', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"nice","type":0,"timestamp":1422264581195}'),
(64, 0, 14, '2015-01-30 15:17:32', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"{\\"id\\":\\"1\\",\\"name\\":\\"toykraft\\",\\"type\\":\\"sales\\",\\"details\\":\\"details\\",\\"url\\":\\"url\\",\\"price\\":\\"3.5\\",\\"json\\":\\"json\\",\\"image\\":\\"logo_(2)3.png\\",\\"usergenerated\\":\\"ug\\",\\"productattributejson\\":\\"pjson\\",\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0A0\\"}","type":4,"timestamp":1422631052971}'),
(65, 0, 14, '2015-01-30 15:17:37', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"{\\"id\\":\\"3\\",\\"name\\":\\"form3\\",\\"json\\":\\"\\\\n[{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Comapany Name\\\\\\",\\\\\\"name\\\\\\":\\\\\\"companyname\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Address\\\\\\",\\\\\\"name\\\\\\":\\\\\\"address\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Pin Code\\\\\\",\\\\\\"name\\\\\\":\\\\\\"pincode\\\\\\"}]\\",\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0C8\\"}","type":3,"timestamp":1422631058523}'),
(66, 0, 14, '2015-01-30 15:17:43', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"text","type":1,"timestamp":1422631064196}'),
(67, 0, 14, '2015-01-30 18:52:17', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"Test","type":0,"timestamp":1422643937360}'),
(68, 0, 14, '2015-01-30 19:18:50', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"dfgdfg","type":0,"timestamp":1422645529353}'),
(69, 0, 14, '2015-01-31 08:29:12', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi Sergy","timestamp":1422692950495}'),
(70, 0, 14, '2015-01-31 08:33:39', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422693217989}'),
(71, 0, 14, '2015-01-31 08:35:52', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"text","type":1,"timestamp":1422693350172}'),
(72, 0, 14, '2015-01-31 09:02:41', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422694960785}'),
(73, 0, 14, '2015-01-31 13:45:28', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hey","timestamp":1422711928755}'),
(74, 0, 14, '2015-01-31 13:48:51', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Jjjj","timestamp":1422712131422}'),
(75, 0, 14, '2015-01-31 13:49:20', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Heyyyyy","timestamp":1422712160308}'),
(76, 0, 14, '2015-01-31 13:49:40', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ookk","timestamp":1422712180321}'),
(77, 0, 14, '2015-01-31 13:50:02', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Pooooo","timestamp":1422712202404}'),
(78, 0, 14, '2015-01-31 13:51:16', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"{\\"id\\":\\"3\\",\\"name\\":\\"form3\\",\\"json\\":[{\\"type\\":\\"text\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"Comapany Name\\",\\"name\\":\\"companyname\\",\\"$$hashKey\\":\\"object:93\\",\\"val\\":\\"Wohlig\\"},{\\"type\\":\\"text\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"Address\\",\\"name\\":\\"address\\",\\"$$hashKey\\":\\"object:94\\",\\"val\\":\\"Vidhyavihar\\"},{\\"type\\":\\"text\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"Pin Code\\",\\"name\\":\\"pincode\\",\\"$$hashKey\\":\\"object:95\\",\\"val\\":\\"42124\\"}],\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0C8\\"}","timestamp":1422712276738,"type":5}'),
(79, 0, 14, '2015-01-31 13:53:20', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422712400536}'),
(80, 0, 14, '2015-01-31 14:27:26', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ook","timestamp":1422714446111}'),
(81, 0, 14, '2015-01-31 14:28:38', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi boy","timestamp":1422714518211}'),
(82, 0, 14, '2015-01-31 14:29:20', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Fghhh","timestamp":1422714560530}'),
(83, 0, 14, '2015-01-31 14:29:35', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Jahdnkdjanejjdjsjdjdh","timestamp":1422714574742}'),
(84, 0, 14, '2015-01-31 14:30:49', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"????????????????????????????","timestamp":1422714648791}'),
(85, 0, 14, '2015-01-31 14:33:02', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"????","timestamp":1422714782294}'),
(86, 0, 14, '2015-01-31 14:47:36', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"{\\"id\\":\\"6\\",\\"name\\":\\"jagruti patil\\",\\"json\\":[{\\"type\\":\\"text\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"\\",\\"name\\":\\"name\\",\\"$$hashKey\\":\\"035\\",\\"val\\":\\"Alok\\"},{\\"type\\":\\"text\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"\\",\\"name\\":\\"address\\",\\"$$hashKey\\":\\"037\\",\\"val\\":\\"Nath\\"}],\\"categoryname\\":\\"Best This year2\\",\\"$$hashKey\\":\\"0LO\\"}","timestamp":1422715656424,"type":5}'),
(87, 0, 14, '2015-01-31 17:37:03', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422725824628}'),
(88, 0, 14, '2015-01-31 17:37:12', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ping","timestamp":1422725833490}'),
(89, 0, 14, '2015-01-31 17:37:45', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Will Yyy","timestamp":1422725868055}'),
(90, 0, 14, '2015-01-31 17:38:00', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Bhhhhhh","timestamp":1422725882963}'),
(91, 0, 14, '2015-01-31 17:38:35', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Tttt","timestamp":1422725917898}'),
(92, 0, 14, '2015-01-31 17:39:15', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"http://www.google.com","timestamp":1422725957367}'),
(93, 0, 14, '2015-01-31 17:39:39', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Uui","timestamp":1422725981903}'),
(94, 0, 14, '2015-01-31 17:39:45', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Iui","timestamp":1422725987189}'),
(95, 0, 14, '2015-01-31 17:39:49', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Lols","timestamp":1422725991581}'),
(96, 0, 14, '2015-01-31 17:39:56', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422725998103}'),
(97, 0, 14, '2015-01-31 17:40:10', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Good","timestamp":1422726012521}'),
(98, 0, 14, '2015-01-31 17:40:25', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Chintan","timestamp":1422726027905}'),
(99, 0, 14, '2015-01-31 17:40:33', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Android","timestamp":1422726035454}'),
(100, 0, 14, '2015-01-31 17:41:01', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Yyyyy","timestamp":1422726063626}'),
(101, 0, 14, '2015-01-31 17:41:09', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Yuyyy","timestamp":1422726071761}'),
(102, 0, 14, '2015-01-31 17:41:19', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ghyh","timestamp":1422726081211}'),
(103, 0, 14, '2015-01-31 17:41:24', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hjiii","timestamp":1422726086928}'),
(104, 0, 14, '2015-01-31 17:41:34', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Jhhgggg","timestamp":1422726096612}'),
(105, 0, 14, '2015-01-31 17:41:53', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ls","timestamp":1422726115880}'),
(106, 0, 14, '2015-01-31 17:42:14', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Yyyyyy","timestamp":1422726136815}'),
(107, 0, 14, '2015-01-31 17:42:22', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Tttt","timestamp":1422726144283}'),
(108, 0, 14, '2015-01-31 17:42:29', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Frtjj","timestamp":1422726151317}'),
(109, 0, 14, '2015-01-31 17:44:08', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Uuuuu","timestamp":1422726250687}'),
(110, 0, 14, '2015-01-31 17:44:31', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Tata","timestamp":1422726273228}'),
(111, 0, 14, '2015-01-31 17:44:39', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Yyyy","timestamp":1422726281560}'),
(112, 0, 14, '2015-01-31 17:45:12', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422726314579}'),
(113, 0, 14, '2015-01-31 17:45:16', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Cool","timestamp":1422726318708}'),
(114, 0, 14, '2015-01-31 17:45:31', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422726332948}'),
(115, 0, 14, '2015-01-31 17:45:35', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"hi","type":0,"timestamp":1422726332545}'),
(116, 0, 14, '2015-01-31 17:45:38', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"nknkn","type":0,"timestamp":1422726336274}'),
(117, 0, 14, '2015-01-31 17:45:38', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Y","timestamp":1422726340935}'),
(118, 0, 14, '2015-01-31 17:46:09', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Tada","timestamp":1422726371685}'),
(119, 0, 14, '2015-01-31 17:53:33', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422726815889}'),
(120, 0, 14, '2015-01-31 17:53:46', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422726828950}'),
(121, 0, 14, '2015-01-31 17:53:53', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Android","timestamp":1422726835918}'),
(122, 0, 14, '2015-01-31 17:54:13', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Dl4all","timestamp":1422726855660}'),
(123, 0, 14, '2015-01-31 17:54:57', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422726900009}'),
(124, 0, 14, '2015-01-31 17:55:01', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Jjjji","timestamp":1422726904007}'),
(125, 0, 14, '2015-01-31 17:55:13', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Woo","timestamp":1422726915776}'),
(126, 0, 14, '2015-01-31 17:55:21', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Wowow","timestamp":1422726923392}'),
(127, 0, 14, '2015-01-31 17:55:25', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Wow","timestamp":1422726927938}'),
(128, 0, 14, '2015-01-31 17:55:30', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Woq","timestamp":1422726932693}'),
(129, 0, 14, '2015-01-31 17:55:37', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Qoo","timestamp":1422726939761}'),
(130, 0, 14, '2015-01-31 17:55:43', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Woq","timestamp":1422726945245}'),
(131, 0, 14, '2015-01-31 17:56:00', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Mahvir","timestamp":1422726962164}'),
(132, 0, 14, '2015-01-31 17:56:20', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"I","timestamp":1422726982265}'),
(133, 0, 14, '2015-01-31 17:56:39', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Yyyy","timestamp":1422727002033}'),
(134, 0, 14, '2015-01-31 17:56:45', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Tot","timestamp":1422727007978}'),
(135, 0, 14, '2015-01-31 17:56:54', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Todo","timestamp":1422727016235}'),
(136, 0, 14, '2015-01-31 17:57:07', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422727029552}'),
(137, 0, 14, '2015-01-31 17:57:20', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ol","timestamp":1422727043020}'),
(138, 0, 14, '2015-01-31 17:57:31', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Wow","timestamp":1422727053855}'),
(139, 0, 14, '2015-01-31 17:57:47', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Wow","timestamp":1422727069122}'),
(140, 0, 14, '2015-01-31 17:59:00', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Gone","timestamp":1422727142479}'),
(141, 0, 14, '2015-01-31 17:59:15', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Wowow","timestamp":1422727157408}'),
(142, 0, 14, '2015-01-31 17:59:31', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Wow","timestamp":1422727172415}'),
(143, 0, 14, '2015-01-31 18:00:50', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Got bored","timestamp":1422727252122}'),
(144, 0, 14, '2015-01-31 18:01:06', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Yyy","timestamp":1422727267902}'),
(145, 0, 14, '2015-01-31 18:01:07', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Yyyy","timestamp":1422727270268}'),
(146, 0, 14, '2015-01-31 18:01:11', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Wowo","timestamp":1422727273874}'),
(147, 0, 14, '2015-01-31 18:01:50', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Pl","timestamp":1422727311444}'),
(148, 0, 14, '2015-01-31 18:01:54', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Iui","timestamp":1422727316296}'),
(149, 0, 14, '2015-01-31 18:01:56', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Eup","timestamp":1422727318374}'),
(150, 0, 14, '2015-01-31 18:01:57', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Doggi","timestamp":1422727319938}'),
(151, 0, 14, '2015-01-31 18:01:59', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Shhpfo","timestamp":1422727322205}'),
(152, 0, 14, '2015-01-31 18:02:52', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"l.ll","type":0,"timestamp":1422727369911}'),
(153, 0, 14, '2015-01-31 18:02:59', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"p;p;jolbl;j;o","type":0,"timestamp":1422727376475}'),
(154, 0, 14, '2015-01-31 18:03:02', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"hkhfkkjl","type":0,"timestamp":1422727380217}'),
(155, 0, 14, '2015-01-31 18:03:11', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"khhllj","type":0,"timestamp":1422727388721}'),
(156, 0, 14, '2015-01-31 18:03:20', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422727402386}'),
(157, 0, 14, '2015-01-31 18:03:25', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":",kjvkjn","type":0,"timestamp":1422727402969}'),
(158, 0, 14, '2015-01-31 18:03:36', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422727418238}'),
(159, 0, 14, '2015-01-31 18:03:39', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hhhjh","timestamp":1422727421921}'),
(160, 0, 14, '2015-01-31 18:03:45', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hahhahah","timestamp":1422727427105}'),
(161, 0, 14, '2015-01-31 18:03:47', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Jajajaj","timestamp":1422727429953}'),
(162, 0, 14, '2015-01-31 18:03:52', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"hahaha","type":0,"timestamp":1422727429916}'),
(163, 0, 14, '2015-01-31 18:03:56', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"YOu thwre","timestamp":1422727439006}'),
(164, 0, 14, '2015-01-31 18:04:01', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"l;;","type":0,"timestamp":1422727439409}'),
(165, 0, 14, '2015-01-31 18:04:08', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":";''fr","type":0,"timestamp":1422727446190}'),
(166, 0, 14, '2015-01-31 18:04:13', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"HahahhshahshshshshshshshshshshshshdhHdhs","timestamp":1422727455908}'),
(167, 0, 14, '2015-01-31 18:04:19', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"fdrd","type":0,"timestamp":1422727456736}'),
(168, 0, 14, '2015-01-31 18:04:22', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"frdcf","type":0,"timestamp":1422727460120}'),
(169, 0, 14, '2015-01-31 18:04:23', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"ook","type":0,"timestamp":1422727463200}'),
(170, 0, 14, '2015-01-31 18:04:23', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"drd","type":0,"timestamp":1422727461319}'),
(171, 0, 14, '2015-01-31 18:04:24', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"dtd","type":0,"timestamp":1422727462331}'),
(172, 0, 14, '2015-01-31 18:04:27', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"dtd","type":0,"timestamp":1422727464817}'),
(173, 0, 14, '2015-01-31 18:04:27', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"NCe","timestamp":1422727469560}'),
(174, 0, 14, '2015-01-31 18:04:31', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"dtd","type":0,"timestamp":1422727469041}'),
(175, 0, 14, '2015-01-31 18:04:32', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"td","type":0,"timestamp":1422727469920}'),
(176, 0, 14, '2015-01-31 18:04:33', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"dtdd","type":0,"timestamp":1422727470613}'),
(177, 0, 14, '2015-01-31 18:04:33', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"dtd","type":0,"timestamp":1422727471380}'),
(178, 0, 14, '2015-01-31 18:04:34', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"dtdd","type":0,"timestamp":1422727472109}'),
(179, 0, 14, '2015-01-31 18:04:35', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"dtd","type":0,"timestamp":1422727473174}'),
(180, 0, 14, '2015-01-31 18:04:36', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"td","type":0,"timestamp":1422727473990}'),
(181, 0, 14, '2015-01-31 18:04:37', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"ddt","type":0,"timestamp":1422727475288}'),
(182, 0, 14, '2015-01-31 18:04:38', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"FdI Am woKRing PN it","timestamp":1422727481053}'),
(183, 0, 14, '2015-01-31 18:05:50', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"k;","type":0,"timestamp":1422727547690}'),
(184, 0, 14, '2015-01-31 18:06:42', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422727604614}'),
(185, 0, 14, '2015-01-31 18:06:49', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Pk","timestamp":1422727610886}'),
(186, 0, 14, '2015-01-31 18:06:50', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hshs","timestamp":1422727612281}'),
(187, 0, 14, '2015-01-31 18:06:50', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Shsh","timestamp":1422727613199}'),
(188, 0, 14, '2015-01-31 18:06:51', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Sns","timestamp":1422727613930}'),
(189, 0, 14, '2015-01-31 18:06:52', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Sns","timestamp":1422727614697}'),
(190, 0, 14, '2015-01-31 18:06:55', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Snssns","timestamp":1422727617369}'),
(191, 0, 14, '2015-01-31 18:06:55', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"gdfggfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfg","type":0,"timestamp":1422727613404}'),
(192, 0, 14, '2015-01-31 18:07:05', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"fghfgh","type":0,"timestamp":1422727622960}'),
(193, 0, 14, '2015-01-31 18:07:08', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Iis","timestamp":1422727630833}'),
(194, 0, 14, '2015-01-31 18:07:11', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Snsj","timestamp":1422727634087}'),
(195, 0, 14, '2015-01-31 18:07:14', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Sjajja","timestamp":1422727636566}'),
(196, 0, 14, '2015-01-31 18:07:16', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ahaha","timestamp":1422727638400}'),
(197, 0, 14, '2015-01-31 18:07:17', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"ghfghfghfhghfghfghgfhghfghgfhfghfghfghfghfghgfhfghfhgfhghfghfghfghfghfghfg","type":0,"timestamp":1422727635478}'),
(198, 0, 14, '2015-01-31 18:07:22', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hahha","timestamp":1422727644938}'),
(199, 0, 14, '2015-01-31 18:07:25', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Snsbbss","timestamp":1422727647922}'),
(200, 0, 14, '2015-01-31 18:07:40', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Gggg","timestamp":1422727662657}'),
(201, 0, 14, '2015-01-31 18:07:48', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Uuuu","timestamp":1422727670791}'),
(202, 0, 14, '2015-01-31 18:07:56', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ggg","timestamp":1422727679142}'),
(203, 0, 14, '2015-01-31 18:08:06', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"ghfgh","type":0,"timestamp":1422727683762}'),
(204, 0, 14, '2015-01-31 18:08:07', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"HhH","timestamp":1422727689908}'),
(205, 0, 14, '2015-01-31 18:08:49', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Iii","timestamp":1422727731514}'),
(206, 0, 14, '2015-01-31 18:08:56', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Fgh","timestamp":1422727738098}'),
(207, 0, 14, '2015-01-31 18:08:58', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"fdgfgfffgfggfgfgfg fg fg fg g","type":0,"timestamp":1422727735996}'),
(208, 0, 14, '2015-01-31 18:09:57', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Po","timestamp":1422727798537}'),
(209, 0, 14, '2015-01-31 18:10:00', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Okhsjs","timestamp":1422727802380}'),
(210, 0, 14, '2015-01-31 18:10:18', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"ghhff f fgfg  fgfg fg gfg fg fg fg fg f gf","type":0,"timestamp":1422727815963}'),
(211, 0, 14, '2015-01-31 18:10:22', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hxhd","timestamp":1422727825056}'),
(212, 0, 14, '2015-01-31 18:10:51', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Toro","timestamp":1422727853774}'),
(213, 0, 14, '2015-01-31 18:10:57', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"fgf","type":0,"timestamp":1422727856680}'),
(214, 0, 14, '2015-01-31 18:10:59', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"dfgdf","type":0,"timestamp":1422727859224}'),
(215, 0, 14, '2015-01-31 18:11:09', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"lkjlk","type":0,"timestamp":1422727869045}'),
(216, 0, 14, '2015-01-31 18:11:10', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"lkhlk","type":0,"timestamp":1422727870150}'),
(217, 0, 14, '2015-01-31 18:11:11', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"jhlk","type":0,"timestamp":1422727871279}'),
(218, 0, 14, '2015-01-31 18:11:32', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hdihi","timestamp":1422727894128}'),
(219, 0, 14, '2015-01-31 18:11:34', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Duhg","timestamp":1422727896763}'),
(220, 0, 14, '2015-01-31 18:11:38', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Yyu","timestamp":1422727900813}'),
(221, 0, 14, '2015-01-31 18:12:12', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ghjj","timestamp":1422727932074}'),
(222, 0, 14, '2015-01-31 18:12:15', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hhfg","timestamp":1422727934753}'),
(223, 0, 14, '2015-01-31 18:12:24', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"hg","type":0,"timestamp":1422727940519}'),
(224, 0, 14, '2015-01-31 18:12:28', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Jhf","timestamp":1422727948337}'),
(225, 0, 14, '2015-01-31 18:12:37', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"ghgh","type":0,"timestamp":1422727954020}'),
(226, 0, 14, '2015-01-31 18:12:38', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"hgh","type":0,"timestamp":1422727956459}'),
(227, 0, 14, '2015-01-31 18:12:40', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"jhjh","type":0,"timestamp":1422727958167}'),
(228, 0, 14, '2015-01-31 18:12:42', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"GfhhjgfdvhhhjhGgfffhhj","timestamp":1422727961621}'),
(229, 0, 14, '2015-01-31 18:12:42', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"jkjk","type":0,"timestamp":1422727959819}'),
(230, 0, 14, '2015-01-31 18:12:45', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hhfg","timestamp":1422727964903}'),
(231, 0, 14, '2015-01-31 18:12:47', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Jhgf","timestamp":1422727967638}'),
(232, 0, 14, '2015-01-31 18:12:50', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Jhg","timestamp":1422727970470}'),
(233, 0, 14, '2015-01-31 18:12:51', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"bvb","type":0,"timestamp":1422727968825}'),
(234, 0, 14, '2015-01-31 18:13:02', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"HjjhggfhGff","timestamp":1422727982421}'),
(235, 0, 14, '2015-01-31 18:13:04', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hgg","timestamp":1422727984453}'),
(236, 0, 14, '2015-01-31 18:13:06', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hgg","timestamp":1422727986404}'),
(237, 0, 14, '2015-01-31 18:13:06', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"ghjgj hjhj hjhj hj hjhj hj hj hj hj hj hj hj hj hjh jhj hj hjh jh jhj hjh jh jh jh jhjh","type":0,"timestamp":1422727984481}'),
(238, 0, 14, '2015-01-31 18:13:10', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"jhjh","type":0,"timestamp":1422727987650}'),
(239, 0, 14, '2015-01-31 18:13:11', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"hjh","type":0,"timestamp":1422727989143}'),
(240, 0, 14, '2015-01-31 18:13:53', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Jgfcb","timestamp":1422728033238}'),
(241, 0, 14, '2015-01-31 18:13:55', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hgggj","timestamp":1422728035570}'),
(242, 0, 14, '2015-01-31 18:13:58', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hhf","timestamp":1422728037771}'),
(243, 0, 14, '2015-01-31 18:14:06', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Oooohhhkkk","timestamp":1422728046154}'),
(244, 0, 14, '2015-01-31 18:14:26', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Bhcsdg","timestamp":1422728066570}'),
(245, 0, 14, '2015-01-31 18:14:54', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"{\\"id\\":\\"4\\",\\"name\\":\\"form4\\",\\"json\\":\\"formjson\\",\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0PT\\"}","type":3,"timestamp":1422728091810}'),
(246, 0, 14, '2015-01-31 18:14:56', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"{\\"id\\":\\"3\\",\\"name\\":\\"form3\\",\\"json\\":\\"\\\\n[{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Comapany Name\\\\\\",\\\\\\"name\\\\\\":\\\\\\"companyname\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Address\\\\\\",\\\\\\"name\\\\\\":\\\\\\"address\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Pin Code\\\\\\",\\\\\\"name\\\\\\":\\\\\\"pincode\\\\\\"}]\\",\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0PS\\"}","type":3,"timestamp":1422728093719}'),
(247, 0, 14, '2015-01-31 18:14:57', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"{\\"id\\":\\"1\\",\\"name\\":\\"form1\\",\\"json\\":\\"[{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Name\\\\\\",\\\\\\"name\\\\\\":\\\\\\"name\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Email\\\\\\",\\\\\\"name\\\\\\":\\\\\\"email\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"password\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Password\\\\\\",\\\\\\"name\\\\\\":\\\\\\"password\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"selection\\\\\\",\\\\\\"value\\\\\\":[{\\\\\\"value\\\\\\":\\\\\\"0\\\\\\",\\\\\\"title\\\\\\":\\\\\\"one\\\\\\"},{\\\\\\"value\\\\\\":\\\\\\"1\\\\\\",\\\\\\"title\\\\\\":\\\\\\"two\\\\\\"},{\\\\\\"value\\\\\\":\\\\\\"2\\\\\\",\\\\\\"title\\\\\\":\\\\\\"three\\\\\\"}],\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"\\\\\\",\\\\\\"name\\\\\\":\\\\\\"sel\\\\\\"}]\\",\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0PR\\"}","type":3,"timestamp":1422728095121}'),
(248, 0, 14, '2015-01-31 18:15:04', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"{\\"id\\":\\"1\\",\\"name\\":\\"toykraft\\",\\"type\\":\\"sales\\",\\"details\\":\\"details\\",\\"url\\":\\"url\\",\\"price\\":\\"3.5\\",\\"json\\":\\"json\\",\\"image\\":\\"logo_(2)3.png\\",\\"usergenerated\\":\\"ug\\",\\"productattributejson\\":\\"pjson\\",\\"categoryname\\":\\"Best This year\\",\\"$$hashKey\\":\\"0RZ\\"}","type":4,"timestamp":1422728104179}'),
(249, 0, 14, '2015-01-31 18:16:34', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"{\\"id\\":\\"3\\",\\"name\\":\\"form3\\",\\"json\\":\\"\\\\n[{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Comapany Name\\\\\\",\\\\\\"name\\\\\\":\\\\\\"companyname\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Address\\\\\\",\\\\\\"name\\\\\\":\\\\\\"address\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Pin Code\\\\\\",\\\\\\"name\\\\\\":\\\\\\"pincode\\\\\\"}]\\",\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0TL\\"}","type":3,"timestamp":1422728190700}'),
(250, 0, 14, '2015-01-31 18:16:49', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"{\\"id\\":\\"3\\",\\"name\\":\\"form3\\",\\"json\\":[{\\"type\\":\\"text\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"Comapany Name\\",\\"name\\":\\"companyname\\",\\"$$hashKey\\":\\"object:115\\",\\"val\\":\\"Ggg\\"},{\\"type\\":\\"text\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"Address\\",\\"name\\":\\"address\\",\\"$$hashKey\\":\\"object:116\\",\\"val\\":\\"Fgh\\"},{\\"type\\":\\"text\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"Pin Code\\",\\"name\\":\\"pincode\\",\\"$$hashKey\\":\\"object:117\\",\\"val\\":\\"Fhh\\"}],\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0TL\\"}","timestamp":1422728211247,"type":5}'),
(251, 0, 14, '2015-02-01 05:17:56', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Pl","timestamp":1422767880366}'),
(252, 0, 14, '2015-02-01 05:18:00', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ol","timestamp":1422767884447}'),
(253, 0, 14, '2015-02-01 05:18:03', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ol","timestamp":1422767886749}'),
(254, 0, 14, '2015-02-01 05:18:15', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422767898570}'),
(255, 0, 14, '2015-02-01 05:18:28', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Akakak","timestamp":1422767911968}'),
(256, 0, 14, '2015-02-01 05:18:30', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Jenkdkfod","timestamp":1422767913849}'),
(257, 0, 14, '2015-02-01 05:18:34', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Dk ildoe","timestamp":1422767918404}'),
(258, 0, 14, '2015-02-01 05:18:36', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Lekifkde","timestamp":1422767920333}'),
(259, 0, 14, '2015-02-01 05:18:39', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Lrircurll","timestamp":1422767922983}'),
(260, 0, 14, '2015-02-01 05:25:17', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422768320510}'),
(261, 0, 14, '2015-02-01 05:25:21', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Google","timestamp":1422768325208}'),
(262, 0, 14, '2015-02-01 05:25:28', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422768331828}'),
(263, 0, 14, '2015-02-01 05:25:30', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Lelejs","timestamp":1422768333721}'),
(264, 0, 14, '2015-02-01 05:35:51', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hey","timestamp":1422768951417}'),
(265, 0, 14, '2015-02-01 05:35:57', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ook","timestamp":1422768957664}'),
(266, 0, 14, '2015-02-01 05:36:02', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Fine","timestamp":1422768962716}'),
(267, 0, 14, '2015-02-01 05:36:30', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hhg","timestamp":1422768989598}'),
(268, 0, 14, '2015-02-01 05:36:40', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Gfff","timestamp":1422768999849}'),
(269, 0, 14, '2015-02-01 05:37:00', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ggfffhhggggggvv","timestamp":1422769020367}'),
(270, 0, 14, '2015-02-01 07:11:50', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"vbcvb","type":0,"timestamp":1422774708987}'),
(271, 0, 14, '2015-02-01 07:17:49', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422775073646}'),
(272, 0, 14, '2015-02-01 07:17:53', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Fh","timestamp":1422775077845}'),
(273, 0, 14, '2015-02-01 07:18:00', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ddg","timestamp":1422775083994}'),
(274, 0, 14, '2015-02-01 07:18:04', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ssdd","timestamp":1422775088580}'),
(275, 0, 14, '2015-02-01 07:18:08', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ch","timestamp":1422775092528}'),
(276, 0, 14, '2015-02-01 07:18:32', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hiisss","timestamp":1422775116114}'),
(277, 0, 14, '2015-02-01 07:18:38', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ddgh","timestamp":1422775122222}'),
(278, 0, 14, '2015-02-01 07:18:54', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"hey","type":0,"timestamp":1422775134404}'),
(279, 0, 14, '2015-02-01 07:18:54', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"jkj","type":0,"timestamp":1422775133379}'),
(280, 0, 14, '2015-02-01 07:19:01', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Adchddd","timestamp":1422775144966}'),
(281, 0, 14, '2015-02-01 07:19:06', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"ook","type":0,"timestamp":1422775146993}'),
(282, 0, 14, '2015-02-01 07:19:11', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"kjgkjhkjhkj","type":0,"timestamp":1422775151511}'),
(283, 0, 14, '2015-02-01 07:19:12', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"jhkjh","type":0,"timestamp":1422775152517}'),
(284, 0, 14, '2015-02-01 07:19:17', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Dfhhhhsdfgggddgffgg","timestamp":1422775161167}'),
(285, 0, 14, '2015-02-01 07:19:19', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"ghdfghdfh","type":0,"timestamp":1422775159958}'),
(286, 0, 14, '2015-02-01 07:19:27', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"sfdgsfd","type":0,"timestamp":1422775167227}'),
(287, 0, 14, '2015-02-01 07:22:34', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hi","timestamp":1422775353515}'),
(288, 0, 14, '2015-02-01 07:22:46', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"kjhkjh","timestamp":1422775366106}'),
(289, 0, 14, '2015-02-01 07:22:49', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"jhgjhgj","timestamp":1422775369541}'),
(290, 0, 14, '2015-02-01 07:23:00', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"kjhkjh","timestamp":1422775380962}');
INSERT INTO `chatmessages` (`id`, `chat`, `user`, `timestamp`, `type`, `url`, `imageurl`, `status`, `json`) VALUES
(291, 0, 14, '2015-02-01 07:23:38', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"a","timestamp":1422775416597}'),
(292, 0, 14, '2015-02-01 07:23:41', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"sss","timestamp":1422775419963}'),
(293, 0, 14, '2015-02-01 07:24:52', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"andriod","timestamp":1422775491086}'),
(294, 0, 14, '2015-02-01 07:26:15', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"andsroid","timestamp":1422775574343}'),
(295, 0, 14, '2015-02-01 07:33:00', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422775984121}'),
(296, 0, 14, '2015-02-01 07:33:06', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ggi","timestamp":1422775990463}'),
(297, 0, 14, '2015-02-01 07:33:21', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422776005371}'),
(298, 0, 14, '2015-02-01 07:33:49', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422776033583}'),
(299, 0, 14, '2015-02-01 07:38:04', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hi","timestamp":1422776282722}'),
(300, 0, 14, '2015-02-01 07:38:45', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hi","timestamp":1422776324279}'),
(301, 0, 14, '2015-02-01 07:38:47', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"ljl","timestamp":1422776326275}'),
(302, 0, 14, '2015-02-01 07:40:04', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hi","timestamp":1422776402777}'),
(303, 0, 14, '2015-02-01 07:40:25', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hi","timestamp":1422776423868}'),
(304, 0, 14, '2015-02-01 07:40:42', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hi","timestamp":1422776440988}'),
(305, 0, 14, '2015-02-01 07:40:43', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"kjkj","timestamp":1422776442660}'),
(306, 0, 14, '2015-02-01 07:40:48', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"lkljkhj","timestamp":1422776446785}'),
(307, 0, 14, '2015-02-01 07:48:10', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Uiuhh","timestamp":1422776890580}'),
(308, 0, 14, '2015-02-01 07:49:02', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hhfdgh","timestamp":1422776942266}'),
(309, 0, 14, '2015-02-01 08:05:35', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Bbfd","timestamp":1422777935268}'),
(310, 0, 14, '2015-02-01 08:05:40', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Oooo","timestamp":1422777939865}'),
(311, 0, 14, '2015-02-01 08:45:16', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422780316889}'),
(312, 0, 14, '2015-02-01 08:47:26', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hoal","timestamp":1422780446696}'),
(313, 0, 14, '2015-02-01 08:47:32', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Oans","timestamp":1422780452050}'),
(314, 0, 14, '2015-02-01 08:47:35', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422780455204}'),
(315, 0, 14, '2015-02-01 08:47:38', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ol","timestamp":1422780458349}'),
(316, 0, 14, '2015-02-01 08:47:43', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422780463731}'),
(317, 0, 14, '2015-02-01 08:47:47', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422780467590}'),
(318, 0, 14, '2015-02-01 08:47:52', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422780472049}'),
(319, 0, 14, '2015-02-01 08:47:55', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422780475375}'),
(320, 0, 14, '2015-02-01 08:47:58', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422780478790}'),
(321, 0, 14, '2015-02-01 08:48:05', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422780484871}'),
(322, 0, 14, '2015-02-01 08:48:15', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422780494851}'),
(323, 0, 14, '2015-02-01 08:48:23', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Kajhd","timestamp":1422780503622}'),
(324, 0, 14, '2015-02-01 08:48:27', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Kakaj","timestamp":1422780507521}'),
(325, 0, 14, '2015-02-01 08:48:33', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Tushar","timestamp":1422780513224}'),
(326, 0, 14, '2015-02-01 08:48:39', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ho","timestamp":1422780519469}'),
(327, 0, 14, '2015-02-01 08:48:43', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Pk","timestamp":1422780523753}'),
(328, 0, 14, '2015-02-01 08:48:57', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Pl","timestamp":1422780536521}'),
(329, 0, 14, '2015-02-01 08:48:59', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422780539621}'),
(330, 0, 14, '2015-02-01 09:00:57', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"kjhk","type":0,"timestamp":1422781257583}'),
(331, 0, 14, '2015-02-01 09:15:04', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422782104028}'),
(332, 0, 14, '2015-02-01 09:15:13', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Haha","timestamp":1422782112217}'),
(333, 0, 14, '2015-02-01 09:18:45', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422782324833}'),
(334, 0, 14, '2015-02-01 09:23:08', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Aoajia","timestamp":1422782588219}'),
(335, 0, 14, '2015-02-01 09:23:13', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"PNzjz","timestamp":1422782593262}'),
(336, 0, 14, '2015-02-01 09:23:20', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422782600529}'),
(337, 0, 14, '2015-02-01 10:06:45', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hey Sergy","timestamp":1422785205090}'),
(338, 0, 14, '2015-02-01 10:06:53', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Tada","timestamp":1422785213383}'),
(339, 0, 14, '2015-02-01 10:07:02', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Helloo","timestamp":1422785222752}'),
(340, 0, 14, '2015-02-01 10:08:59', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ccd","timestamp":1422785339240}'),
(341, 0, 14, '2015-02-01 10:09:02', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"{\\"id\\":\\"1\\",\\"name\\":\\"toykraft\\",\\"type\\":\\"sales\\",\\"details\\":\\"details\\",\\"url\\":\\"url\\",\\"price\\":\\"3.5\\",\\"json\\":\\"json\\",\\"image\\":\\"logo_(2)3.png\\",\\"usergenerated\\":\\"ug\\",\\"productattributejson\\":\\"pjson\\",\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"09V\\"}","type":4,"timestamp":1422785342439}'),
(342, 0, 14, '2015-02-01 10:09:13', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hello","timestamp":1422785353611}'),
(343, 0, 14, '2015-02-01 10:09:20', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"{\\"id\\":\\"1\\",\\"name\\":\\"form1\\",\\"json\\":\\"[{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Name\\\\\\",\\\\\\"name\\\\\\":\\\\\\"name\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Email\\\\\\",\\\\\\"name\\\\\\":\\\\\\"email\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"password\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Password\\\\\\",\\\\\\"name\\\\\\":\\\\\\"password\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"selection\\\\\\",\\\\\\"value\\\\\\":[{\\\\\\"value\\\\\\":\\\\\\"0\\\\\\",\\\\\\"title\\\\\\":\\\\\\"one\\\\\\"},{\\\\\\"value\\\\\\":\\\\\\"1\\\\\\",\\\\\\"title\\\\\\":\\\\\\"two\\\\\\"},{\\\\\\"value\\\\\\":\\\\\\"2\\\\\\",\\\\\\"title\\\\\\":\\\\\\"three\\\\\\"}],\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"\\\\\\",\\\\\\"name\\\\\\":\\\\\\"sel\\\\\\"}]\\",\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0CB\\"}","type":3,"timestamp":1422785360725}'),
(344, 0, 14, '2015-02-01 10:09:58', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"Hey","type":0,"timestamp":1422785397916}'),
(345, 0, 14, '2015-02-01 10:10:44', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"{\\"id\\":\\"1\\",\\"name\\":\\"form1\\",\\"json\\":[{\\"type\\":\\"text\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"Name\\",\\"name\\":\\"name\\",\\"$$hashKey\\":\\"object:110\\",\\"val\\":\\"Anmdc\\"},{\\"type\\":\\"text\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"Email\\",\\"name\\":\\"email\\",\\"$$hashKey\\":\\"object:111\\",\\"val\\":\\"fffd@;;\\"},{\\"type\\":\\"password\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"Password\\",\\"name\\":\\"password\\",\\"$$hashKey\\":\\"object:112\\",\\"val\\":\\";:!:!\\"},{\\"type\\":\\"selection\\",\\"value\\":[{\\"value\\":\\"0\\",\\"title\\":\\"one\\",\\"$$hashKey\\":\\"object:122\\"},{\\"value\\":\\"1\\",\\"title\\":\\"two\\",\\"$$hashKey\\":\\"object:123\\"},{\\"value\\":\\"2\\",\\"title\\":\\"three\\",\\"$$hashKey\\":\\"object:124\\"}],\\"title\\":\\"\\",\\"placeholder\\":\\"\\",\\"name\\":\\"sel\\",\\"$$hashKey\\":\\"object:113\\",\\"val\\":\\"three\\"}],\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0CB\\"}","timestamp":1422785444445,"type":5}'),
(346, 0, 14, '2015-02-01 10:11:14', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"{\\"id\\":\\"1\\",\\"name\\":\\"form1\\",\\"json\\":[{\\"type\\":\\"text\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"Name\\",\\"name\\":\\"name\\",\\"$$hashKey\\":\\"object:110\\",\\"val\\":\\"Anmdc\\"},{\\"type\\":\\"text\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"Email\\",\\"name\\":\\"email\\",\\"$$hashKey\\":\\"object:111\\",\\"val\\":\\"fffd@;;\\"},{\\"type\\":\\"password\\",\\"value\\":\\"\\",\\"title\\":\\"\\",\\"placeholder\\":\\"Password\\",\\"name\\":\\"password\\",\\"$$hashKey\\":\\"object:112\\",\\"val\\":\\";:!:!\\"},{\\"type\\":\\"selection\\",\\"value\\":[{\\"value\\":\\"0\\",\\"title\\":\\"one\\",\\"$$hashKey\\":\\"object:122\\"},{\\"value\\":\\"1\\",\\"title\\":\\"two\\",\\"$$hashKey\\":\\"object:123\\"},{\\"value\\":\\"2\\",\\"title\\":\\"three\\",\\"$$hashKey\\":\\"object:124\\"}],\\"title\\":\\"\\",\\"placeholder\\":\\"\\",\\"name\\":\\"sel\\",\\"$$hashKey\\":\\"object:113\\",\\"val\\":\\"three\\"}],\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0CB\\"}","timestamp":1422785474954,"type":5}'),
(347, 0, 14, '2015-02-01 10:14:37', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422785677297}'),
(348, 0, 14, '2015-02-01 10:15:58', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Kralyz","timestamp":1422785758770}'),
(349, 0, 14, '2015-02-01 10:27:16', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"hi''","type":0,"timestamp":1422786437616}'),
(350, 0, 14, '2015-02-01 17:25:46', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi","timestamp":1422811546726}'),
(351, 0, 14, '2015-02-01 17:35:19', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ok","timestamp":1422812119672}'),
(352, 0, 14, '2015-02-01 17:35:28', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Grav","timestamp":1422812128761}'),
(353, 0, 14, '2015-02-01 17:52:28', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Uhfg","timestamp":1422813149124}'),
(354, 0, 14, '2015-02-02 06:10:04', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Ggf","timestamp":1422857400921}'),
(355, 0, 14, '2015-02-03 12:29:01', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"{\\"id\\":\\"1\\",\\"name\\":\\"toykraft\\",\\"type\\":\\"sales\\",\\"details\\":\\"details\\",\\"url\\":\\"url\\",\\"price\\":\\"3.5\\",\\"json\\":\\"json\\",\\"image\\":\\"logo_(2)3.png\\",\\"usergenerated\\":\\"ug\\",\\"productattributejson\\":\\"pjson\\",\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0GU\\"}","type":4,"timestamp":1422966542646}'),
(356, 0, 14, '2015-02-03 12:34:35', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"ook","timestamp":1422966876015}'),
(357, 0, 14, '2015-02-03 13:25:19', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hi baby","timestamp":1422969919484}'),
(358, 0, 14, '2015-02-04 08:51:57', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Heyyy","timestamp":1423039909116}'),
(359, 0, 14, '2015-02-05 13:12:50', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"helllooo","type":0,"timestamp":1423141971924}'),
(360, 0, 14, '2015-02-05 13:13:05', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Hey hii","timestamp":1423141984722}'),
(361, 0, 14, '2015-02-07 07:48:12', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Your Order ID is11","timestamp":1423295292449}'),
(362, 0, 14, '2015-02-07 12:45:14', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"{\\"id\\":\\"5\\",\\"name\\":\\"New Form\\",\\"json\\":\\"[{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"name\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Name\\\\\\",\\\\\\"name\\\\\\":\\\\\\"name\\\\\\",\\\\\\"$$hashKey\\\\\\":\\\\\\"037\\\\\\"},{\\\\\\"type\\\\\\":\\\\\\"select\\\\\\",\\\\\\"value\\\\\\":[{\\\\\\"value\\\\\\":\\\\\\"0\\\\\\",\\\\\\"title\\\\\\":\\\\\\"development\\\\\\",\\\\\\"$$hashKey\\\\\\":\\\\\\"03P\\\\\\"},{\\\\\\"value\\\\\\":\\\\\\"1\\\\\\",\\\\\\"title\\\\\\":\\\\\\"testing\\\\\\",\\\\\\"$$hashKey\\\\\\":\\\\\\"03T\\\\\\"},{\\\\\\"value\\\\\\":\\\\\\"2\\\\\\",\\\\\\"title\\\\\\":\\\\\\"production\\\\\\",\\\\\\"$$hashKey\\\\\\":\\\\\\"03X\\\\\\"}],\\\\\\"title\\\\\\":\\\\\\"\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"\\\\\\",\\\\\\"name\\\\\\":\\\\\\"choice\\\\\\",\\\\\\"$$hashKey\\\\\\":\\\\\\"03B\\\\\\"}]\\",\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0AV\\"}","type":3,"timestamp":1423313114448}'),
(363, 0, 14, '2015-02-07 12:49:55', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"{\\"id\\":\\"5\\",\\"name\\":\\"New Form\\",\\"json\\":[{\\"type\\":\\"text\\",\\"value\\":\\"\\",\\"title\\":\\"name\\",\\"placeholder\\":\\"Name\\",\\"name\\":\\"name\\",\\"$$hashKey\\":\\"037\\",\\"val\\":\\"jagruti\\"},{\\"type\\":\\"select\\",\\"value\\":[{\\"value\\":\\"0\\",\\"title\\":\\"development\\",\\"$$hashKey\\":\\"03P\\"},{\\"value\\":\\"1\\",\\"title\\":\\"testing\\",\\"$$hashKey\\":\\"03T\\"},{\\"value\\":\\"2\\",\\"title\\":\\"production\\",\\"$$hashKey\\":\\"03X\\"}],\\"title\\":\\"\\",\\"placeholder\\":\\"\\",\\"name\\":\\"choice\\",\\"$$hashKey\\":\\"03B\\",\\"val\\":\\"production\\"}],\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0AV\\"}","timestamp":1423313394950,"type":5}'),
(364, 0, 14, '2015-02-16 06:15:39', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hey","timestamp":1424067339320}'),
(365, 0, 14, '2015-02-22 11:46:56', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"{\\"id\\":\\"6\\",\\"name\\":\\"Testing\\",\\"json\\":\\"[{\\\\\\"type\\\\\\":\\\\\\"text\\\\\\",\\\\\\"value\\\\\\":\\\\\\"\\\\\\",\\\\\\"title\\\\\\":\\\\\\"Name\\\\\\",\\\\\\"placeholder\\\\\\":\\\\\\"Name\\\\\\",\\\\\\"name\\\\\\":\\\\\\"name\\\\\\",\\\\\\"$$hashKey\\\\\\":\\\\\\"037\\\\\\"}]\\",\\"categoryname\\":\\"Music2\\",\\"$$hashKey\\":\\"0A8\\"}","type":3,"timestamp":1424605616501}'),
(366, 0, 14, '2015-02-22 13:50:25', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Your Order has been placed.  Your Order ID is 7","timestamp":1424613025861}'),
(367, 0, 14, '2015-02-22 13:51:05', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Your Order has been placed.  Your Order ID is 7","timestamp":1424613065522}'),
(368, 0, 14, '2015-02-22 13:53:26', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Your Order has been placed.  Your Order ID is 8","timestamp":1424613205956}'),
(369, 0, 14, '2015-02-22 13:53:51', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Your Order has been placed.  Your Order ID is 9","timestamp":1424613231815}'),
(370, 0, 14, '2015-02-22 13:54:22', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Your Order has been placed.  Your Order ID is 10","timestamp":1424613262097}'),
(371, 0, 14, '2015-02-22 13:54:37', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Your Order has been placed.  Your Order ID is 11","timestamp":1424613277146}'),
(372, 0, 14, '2015-02-22 13:54:52', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Your Order has been placed.  Your Order ID is 12","timestamp":1424613292696}'),
(373, 0, 14, '2015-02-22 13:55:08', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"Your Order has been placed.  Your Order ID is 13","timestamp":1424613308142}'),
(374, 0, 14, '2015-02-23 06:29:36', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hey","timestamp":1424672976054}'),
(375, 0, 14, '2015-02-23 06:29:56', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"ooh","type":0,"timestamp":1424672996607}'),
(376, 0, 14, '2015-02-23 06:42:00', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"hhheeyyy","timestamp":1424673720727}'),
(377, 0, 14, '2015-02-23 06:47:24', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"simplelogin:1","text":"jjjjj","timestamp":1424674043961}'),
(378, 0, 14, '2015-02-23 06:47:28', 1, '', '', 1, '{"email":"jagruti@wohlig.com","name":"Sergy","text":"ooohh","type":0,"timestamp":1424674048824}');

-- --------------------------------------------------------

--
-- Table structure for table `chatmessagetypes`
--

CREATE TABLE IF NOT EXISTS `chatmessagetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `chatmessagetypes`
--

INSERT INTO `chatmessagetypes` (`id`, `name`) VALUES
(1, 'Message'),
(2, 'Transcript'),
(3, 'Form'),
(4, 'Product');

-- --------------------------------------------------------

--
-- Table structure for table `eventlog`
--

CREATE TABLE IF NOT EXISTS `eventlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `eventlog`
--

INSERT INTO `eventlog` (`id`, `event`, `user`, `description`, `timestamp`) VALUES
(1, 1, 1, 'Event Created', '2014-05-12 10:46:24'),
(2, 1, 1, 'Event Edited', '2014-05-12 10:47:43'),
(3, 1, 1, 'Event Category ,Topic updated', '2014-05-12 11:16:19'),
(4, 1, 1, 'Event Category ,Topic updated', '2014-05-12 11:16:51'),
(5, 3, 3, 'Event Edited', '2014-08-08 08:45:13'),
(6, 3, 3, 'Mall Edited', '2014-08-08 08:47:08'),
(7, 3, 3, 'Mall Edited', '2014-08-08 08:47:32'),
(8, 3, 3, 'Mall Edited', '2014-08-08 08:52:55'),
(9, 3, 3, 'City Edited', '2014-08-08 10:00:26'),
(10, 3, 3, 'City Edited', '2014-08-08 10:01:10'),
(11, 4, 4, 'City Edited', '2014-08-08 10:03:23'),
(12, 8, 8, 'City Edited', '2014-08-09 05:28:14'),
(13, 8, 8, 'Location Edited', '2014-08-09 05:30:25'),
(14, 4, 4, 'Location Edited', '2014-08-09 05:30:40'),
(15, 11, 11, 'Location Edited', '2014-08-09 05:49:23'),
(16, 8, 8, 'Location Edited', '2014-08-09 05:50:01'),
(17, 3, 3, 'Brand Edited', '2014-08-09 06:32:06'),
(18, 3, 3, 'Brand Edited', '2014-08-09 06:32:26'),
(19, 3, 3, 'Brand Edited', '2014-08-09 09:57:03'),
(20, 8, 8, 'Location Edited', '2014-08-11 05:14:59'),
(21, 1, 1, 'Mall Edited', '2014-08-11 09:52:00'),
(22, 32, 32, 'Brand Edited', '2014-08-19 05:28:20'),
(23, 32, 32, 'Brand Edited', '2014-08-19 05:28:55'),
(24, 1, 1, 'City Edited', '2014-08-21 08:34:32'),
(25, 12, 12, 'Location Edited', '2014-08-21 08:36:11'),
(26, 2, 2, 'Mall Edited', '2014-08-21 10:40:28'),
(27, 2, 2, 'Mall Edited', '2014-08-21 10:40:59'),
(28, 4, 4, 'Mall Edited', '2014-08-21 11:45:56'),
(29, 4, 4, 'Mall Edited', '2014-08-21 11:46:36'),
(30, 4, 4, 'Mall Edited', '2014-08-21 11:47:39'),
(31, 4, 4, 'Mall Edited', '2014-08-21 11:47:55'),
(32, 4, 4, 'Mall Edited', '2014-08-21 11:48:19'),
(33, 13, 13, 'Location Edited', '2014-08-21 12:12:46'),
(34, 13, 13, 'Location Edited', '2014-08-21 12:13:09'),
(35, 8, 8, 'Location Edited', '2014-08-22 05:52:40'),
(36, 6, 6, 'Mall Edited', '2014-09-11 10:30:43'),
(37, 2, 2, 'Mall Edited', '2014-09-11 10:39:43'),
(38, 1, 1, 'Mall Edited', '2014-09-11 10:40:17'),
(39, 6, 6, 'Mall Edited', '2014-09-11 10:48:17'),
(40, 1, 1, 'Mall Edited', '2014-09-18 08:22:15'),
(41, 1, 1, 'Mall Edited', '2014-09-18 08:22:30'),
(42, 1, 1, 'Mall Edited', '2014-09-18 08:22:45'),
(43, 7, 7, 'Mall Edited', '2014-09-25 05:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE IF NOT EXISTS `form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `json` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `name`, `json`) VALUES
(1, 'form1', '[{"type":"text","value":"","title":"","placeholder":"Name","name":"name"},{"type":"text","value":"","title":"","placeholder":"Email","name":"email"},{"type":"password","value":"","title":"","placeholder":"Password","name":"password"},{"type":"selection","value":[{"value":"0","title":"one"},{"value":"1","title":"two"},{"value":"2","title":"three"}],"title":"","placeholder":"","name":"sel"}]'),
(3, 'form3', '[{"type":"text","value":"","title":"","placeholder":"Comapany Name","name":"companyname"},{"type":"text","value":"","title":"","placeholder":"Address","name":"address"},{"type":"text","value":"","title":"","placeholder":"Pin Code","name":"pincode"}]'),
(5, 'New Form', '[{"type":"text","value":"","title":"name","placeholder":"Name","name":"name","$$hashKey":"037"},{"type":"select","value":[{"value":"0","title":"development","$$hashKey":"03P"},{"value":"1","title":"testing","$$hashKey":"03T"},{"value":"2","title":"production","$$hashKey":"03X"}],"title":"","placeholder":"","name":"choice","$$hashKey":"03B"}]'),
(6, 'Testing', '[{"type":"text","value":"","title":"Name","placeholder":"Name","name":"name","$$hashKey":"037"}]');

-- --------------------------------------------------------

--
-- Table structure for table `formcategory`
--

CREATE TABLE IF NOT EXISTS `formcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `formcategory`
--

INSERT INTO `formcategory` (`id`, `formid`, `categoryid`) VALUES
(7, 2, 5),
(8, 2, 20),
(9, 3, 5),
(10, 3, 14),
(11, 4, 5),
(12, 4, 14),
(13, 4, 17),
(14, 1, 5),
(15, 5, 5),
(16, 5, 14),
(17, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE IF NOT EXISTS `logintype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(7, 'Category', '', '', 'site/viewcategory', 1, 0, 1, 3, 'icon-book'),
(13, 'Chat', '', '', 'site/viewchat', 1, 0, 1, 4, 'icon-book'),
(14, 'Transcript', '', '', 'site/viewtranscript', 1, 0, 1, 5, 'icon-book'),
(15, 'Form', '', '', 'site/viewform', 1, 0, 1, 6, 'icon-book'),
(16, 'Product', '', '', 'site/viewproduct', 1, 0, 1, 7, 'icon-book'),
(17, 'Order', '', '', 'site/vieworder', 1, 0, 1, 8, 'icon-book');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `operatorcategory`
--

CREATE TABLE IF NOT EXISTS `operatorcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operatorid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `operatorcategory`
--

INSERT INTO `operatorcategory` (`id`, `operatorid`, `categoryid`) VALUES
(1, 9, 5),
(2, 9, 15);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `shipaddress1` text NOT NULL,
  `shipaddress2` text NOT NULL,
  `shipcity` varchar(255) NOT NULL,
  `shipstate` varchar(255) NOT NULL,
  `shippingcode` varchar(255) NOT NULL,
  `shipcountry` varchar(255) NOT NULL,
  `orderid` int(11) NOT NULL,
  `trackingcode` varchar(255) NOT NULL,
  `shippingcharge` double NOT NULL,
  `shippingmethod` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `user`, `address1`, `address2`, `city`, `state`, `pincode`, `email`, `contactno`, `country`, `shipaddress1`, `shipaddress2`, `shipcity`, `shipstate`, `shippingcode`, `shipcountry`, `orderid`, `trackingcode`, `shippingcharge`, `shippingmethod`, `timestamp`, `status`) VALUES
(1, 'ordertest', 1, 'address1', 'address2', 'thane', 'maharashtra', '410000', 'order@email.com', '987654', 'india', 'sa1', 'sa2', 'thane', 'maharashtra', '12312', 'india', 1, '123', 12, 1, '2015-02-06 13:08:23', 1),
(3, 'demo', 14, 'demo', 'test2', 'Mumbai', 'Maharashtra', '4544554', 'pratikpp@wohlig.com', '232323', 'demo', 'demo', 'demm', 'Mumbai', 'Maharashtra', '4544554', 'India', 0, '123', 1, 2, '2015-02-20 16:09:02', 1),
(4, 'My order', 14, 'Address1', 'Address2', 'Thakurli', 'Maharashtra', '421201', 'Jagruti@wohlig.com', '9876543245', 'Argentina', 'Shippingaddress1', 'Shipping address2', 'Thakurli', '5575', '433', 'Anguilla', 0, '644', 56, 0, '2015-02-06 13:08:34', 1),
(5, 'fasdf', 15, 'kjlhlkj', 'kjhlkj', 'jhlkjh', 'kjhk', '564654', 'dfasd@ldkjkls.com', '987987945', 'Albania', 'khlkj', 'kjlk', 'lkjlk', 'lkjlk', '654', 'Algeria', 0, '654', 16, 64, '2015-02-06 13:57:04', 1),
(6, 'Second Order', 14, 'Address1', 'Address2', 'Thakurli', 'Maharashtra', '421201', 'Jagruti@wohlig.com', '9876543245', 'Argentina', 'Shippingaddress1', 'Shipping address2', 'Thakurli', '5575', '433', 'Anguilla', 0, '644', 56, 0, '2015-02-07 07:25:13', 1),
(7, 'aa', 14, 'Address1', 'Address2', 'Thakurli', 'Maharashtra', '421201', 'Jagruti@wohlig.com', '9876543245', 'Argentina', 'Shippingaddress1', 'Shipping address2', 'Thakurli', '5575', '433', 'Anguilla', 0, '644', 56, 0, '2015-02-22 13:50:25', 1),
(8, 'vv', 14, 'Address1', 'Address2', 'Thakurli', 'Maharashtra', '421201', 'Jagruti@wohlig.com', '9876543245', 'Argentina', 'Shippingaddress1', 'Shipping address2', 'Thakurli', '5575', '433', 'Anguilla', 0, '644', 56, 0, '2015-02-22 13:53:25', 1),
(9, 'bbb', 14, 'Address1', 'Address2', 'Thakurli', 'Maharashtra', '421201', 'Jagruti@wohlig.com', '9876543245', 'Argentina', 'Shippingaddress1', 'Shipping address2', 'Thakurli', '5575', '433', 'Anguilla', 0, '644', 56, 0, '2015-02-22 13:53:51', 1),
(10, 'nn', 14, 'Address1', 'Address2', 'Thakurli', 'Maharashtra', '421201', 'Jagruti@wohlig.com', '9876543245', 'Argentina', 'Shippingaddress1', 'Shipping address2', 'Thakurli', '5575', '433', 'Anguilla', 0, '644', 56, 0, '2015-02-22 13:54:21', 1),
(11, 'zz', 14, 'Address1', 'Address2', 'Thakurli', 'Maharashtra', '421201', 'Jagruti@wohlig.com', '9876543245', 'Argentina', 'Shippingaddress1', 'Shipping address2', 'Thakurli', '5575', '433', 'Anguilla', 0, '644', 56, 0, '2015-02-22 13:54:36', 1),
(12, 'qq', 14, 'Address1', 'Address2', 'Thakurli', 'Maharashtra', '421201', 'Jagruti@wohlig.com', '9876543245', 'Argentina', 'Shippingaddress1', 'Shipping address2', 'Thakurli', '5575', '433', 'Anguilla', 0, '644', 56, 0, '2015-02-22 13:54:52', 1),
(13, 'toykraft', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '2015-02-23 07:44:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE IF NOT EXISTS `orderitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `json` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `usergenerated` varchar(255) NOT NULL,
  `productattributejson` text NOT NULL,
  `details` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orderid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`id`, `product`, `name`, `type`, `url`, `price`, `json`, `image`, `usergenerated`, `productattributejson`, `details`, `timestamp`, `orderid`) VALUES
(1, 1, 'name', 'type', 'url', 3535, 'json', 'image.png', 'ug', 'pjson', 'detaila', '2014-12-03 08:43:51', 1),
(2, 3, 'Demo', 'aas', 'asjnak', 450, 'demo1', 'logo.png', '7', '2', 'demo details', '2014-12-03 10:27:33', 3),
(4, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'image.png', 'ug', 'pjson', 'details', '2014-12-03 10:30:31', 3),
(5, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-03 12:32:44', 4),
(6, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-06 13:57:05', 5),
(7, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-07 07:25:13', 6),
(8, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-07 07:28:54', 7),
(9, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-07 07:34:54', 8),
(10, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-07 07:37:21', 9),
(11, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-07 07:38:57', 10),
(12, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-07 07:48:12', 11),
(13, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-22 13:50:25', 7),
(14, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-22 13:53:25', 8),
(15, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-22 13:53:51', 9),
(16, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-22 13:54:21', 10),
(17, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-22 13:54:36', 11),
(18, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-22 13:54:52', 12),
(19, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-22 13:55:07', 13),
(20, 1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2015-02-23 07:44:26', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE IF NOT EXISTS `orderstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `json` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `usergenerated` varchar(255) NOT NULL,
  `productattributejson` text NOT NULL,
  `details` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `url`, `price`, `json`, `image`, `usergenerated`, `productattributejson`, `details`, `timestamp`) VALUES
(1, 'toykraft', 'sales', 'url', 3.5, 'json', 'logo_(2)3.png', 'ug', 'pjson', 'details', '2014-12-03 11:42:47'),
(3, 'Demo', 'aas', 'asjnak', 450, 'demo1', 'logo.png', '7', '2', 'demo details', '2014-12-03 08:31:32'),
(5, 'p1', '1', 'purl', 10000, 'pjson', '', '0', '0', '0', '2014-12-04 10:33:23'),
(6, 'p1', '1', 'purl', 10000, 'pjson2', '', '0', '0', '0', '2014-12-04 10:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE IF NOT EXISTS `productcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`id`, `productid`, `categoryid`) VALUES
(3, 2, 5),
(4, 2, 15),
(5, 2, 20),
(6, 3, 5),
(7, 3, 16),
(8, 1, 5),
(9, 1, 14),
(10, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'inactive'),
(2, 'Active'),
(3, 'Waiting'),
(4, 'Active Waiting'),
(5, 'Blocked');

-- --------------------------------------------------------

--
-- Table structure for table `transcript`
--

CREATE TABLE IF NOT EXISTS `transcript` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `transcript`
--

INSERT INTO `transcript` (`id`, `name`, `text`, `image`, `json`, `url`) VALUES
(1, 'transcript', 'transcripttext', 'transcript.png', 'transcriptjson', 'transcripturl'),
(2, 'form2', 'text', '', 'json2', 'urlof2'),
(3, 'test', 'demo', '', 'demo', 'demo'),
(4, 'test', 'demo', 'image.png', 'demo', 'demo'),
(5, 'test', 'demo1', 'image1.png', 'demo1', 'demo1'),
(6, 'demo', 'image 1', 'logo_(2).png', 'demo', 'demo'),
(7, 'demo', 'image 1', 'logo_(2)1.png', 'demo', 'demo'),
(8, 'demo', 'image 1', 'logo_(2)2.png', 'demo', 'demo'),
(9, 'test', 'demo', 'Logo_(1).png', 'demo1', 'demo'),
(10, 'test', 'demo', 'Logo_(1)1.png', 'demo1', 'demo'),
(11, 'test', 'demo', 'Logo_(1)2.png', 'demo1', 'demo'),
(12, 'abc', 'text', '', '13json', 'demourl');

-- --------------------------------------------------------

--
-- Table structure for table `transcriptcategory`
--

CREATE TABLE IF NOT EXISTS `transcriptcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transcriptid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `transcriptcategory`
--

INSERT INTO `transcriptcategory` (`id`, `transcriptid`, `categoryid`) VALUES
(1, 10, 5),
(2, 10, 15),
(6, 11, 5),
(7, 11, 16),
(9, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` int(11) NOT NULL,
  `json` text NOT NULL,
  `billingemail` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `shipaddress1` text NOT NULL,
  `shipaddress2` text NOT NULL,
  `shipcity` varchar(255) NOT NULL,
  `shipstate` varchar(255) NOT NULL,
  `shippingcode` varchar(255) NOT NULL,
  `shipcountry` varchar(255) NOT NULL,
  `trackingcode` varchar(255) NOT NULL,
  `shippingcharge` double NOT NULL,
  `shippingmethod` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `billingemail`, `city`, `state`, `pincode`, `contactno`, `country`, `address1`, `address2`, `shipaddress1`, `shipaddress2`, `shipcity`, `shipstate`, `shippingcode`, `shipcountry`, `trackingcode`, `shippingcharge`, `shippingmethod`) VALUES
(1, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '0000-00-00 00:00:00', 1, NULL, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(4, 'pratik', '0cb2b62754dfd12b6ed0161d4b447df7', 'pratik@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, 'pratik', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(5, 'wohlig123', 'wohlig123', 'wohlig1@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(6, 'wohlig1', 'a63526467438df9566c508027d9cb06b', 'wohlig2@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(7, 'Avinash', '7b0a80efe0d324e937bbfc7716fb15d3', 'avinash@wohlig.com', 1, '2014-10-17 06:22:29', 1, NULL, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(9, 'avinash', 'a208e5837519309129fa466b0c68396b', 'a@email.com', 2, '2014-12-03 11:06:19', 3, '', '', '123', 1, 'demojson', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(13, 'aaa', 'a208e5837519309129fa466b0c68396b', 'aaa3@email.com', 3, '2014-12-04 06:55:42', 3, NULL, '', '1', 2, 'userjson', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(14, NULL, '3677b23baa08f74c28aba07f0cb6554e', 'jagruti@wohlig.com', NULL, '2014-12-08 13:16:50', 3, 'avatar-mini3.jpg', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(15, 'dhruv', '643743863aaad0787209ab5b20abc6f7', 'dhruv@wohlig.com', 3, '2014-12-09 14:03:43', 2, NULL, '', '0', 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(16, 'chhaya', '3677b23baa08f74c28aba07f0cb6554e', 'chhaya@gmail.com', 3, '2014-12-10 08:05:50', 3, NULL, '', '0', 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userform`
--

CREATE TABLE IF NOT EXISTS `userform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formid` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `json` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `deletestatus` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `userform`
--

INSERT INTO `userform` (`id`, `formid`, `user`, `json`, `status`, `deletestatus`, `timestamp`) VALUES
(1, 1, 14, '{"id":"1","name":"form1","json":[{"type":"text","value":"","title":"","placeholder":"Name","name":"name","$$hashKey":"object:30","val":"jagruti"},{"type":"text","value":"","title":"","placeholder":"Email","name":"email","$$hashKey":"object:31","val":"jagruti2wohlig.com"},{"type":"password","value":"","title":"","placeholder":"Password","name":"password","$$hashKey":"object:32","val":"client123"},{"type":"selection","value":[{"value":"0","title":"one","$$hashKey":"object:42"},{"value":"1","title":"two","$$hashKey":"object:43"},{"value":"2","title":"three","$$hashKey":"object:44"}],"title":"","placeholder":"","name":"sel","$$hashKey":"object:33","val":"one"}],"categoryname":"Music2","$$hashKey":"01S"}', 0, 0, '2015-01-06 05:45:58'),
(2, 1, 14, '{"id":"1","name":"form1","json":[{"type":"text","value":"","title":"","placeholder":"Name","name":"name","$$hashKey":"object:297"},{"type":"text","value":"","title":"","placeholder":"Email","name":"email","$$hashKey":"object:298"},{"type":"password","value":"","title":"","placeholder":"Password","name":"password","$$hashKey":"object:299"},{"type":"selection","value":[{"value":"0","title":"one","$$hashKey":"object:309"},{"value":"1","title":"two","$$hashKey":"object:310"},{"value":"2","title":"three","$$hashKey":"object:311"}],"title":"","placeholder":"","name":"sel","$$hashKey":"object:300"}],"categoryname":"Music2","$$hashKey":"03V"}', 0, 0, '2015-01-07 09:50:31'),
(3, 1, 14, '{"id":"1","name":"form1","json":[{"type":"text","value":"","title":"","placeholder":"Name","name":"name","$$hashKey":"object:58","val":"Chintan"},{"type":"text","value":"","title":"","placeholder":"Email","name":"email","$$hashKey":"object:59","val":"Chintan@demo.com"},{"type":"password","value":"","title":"","placeholder":"Password","name":"password","$$hashKey":"object:60","val":"demo"},{"type":"selection","value":[{"value":"0","title":"one","$$hashKey":"object:70"},{"value":"1","title":"two","$$hashKey":"object:71"},{"value":"2","title":"three","$$hashKey":"object:72"}],"title":"","placeholder":"","name":"sel","$$hashKey":"object:61","val":"two"}],"categoryname":"Music2","$$hashKey":"035"}', 0, 0, '2015-01-11 13:09:00'),
(4, 1, 14, '{"id":"1","name":"form1","json":[{"type":"text","value":"","title":"","placeholder":"Name","name":"name","$$hashKey":"object:203","val":"Ahmed"},{"type":"text","value":"","title":"","placeholder":"Email","name":"email","$$hashKey":"object:204","val":"Ahmed@gozoop.com"},{"type":"password","value":"","title":"","placeholder":"Password","name":"password","$$hashKey":"object:205","val":"hipopop"},{"type":"selection","value":[{"value":"0","title":"one","$$hashKey":"object:215"},{"value":"1","title":"two","$$hashKey":"object:216"},{"value":"2","title":"three","$$hashKey":"object:217"}],"title":"","placeholder":"","name":"sel","$$hashKey":"object:206"}],"categoryname":"Music2","$$hashKey":"0DJ"}', 0, 0, '2015-01-18 07:40:23'),
(5, 1, 14, '{"id":"1","name":"form1","json":[{"type":"text","value":"","title":"","placeholder":"Name","name":"name","$$hashKey":"object:160","val":"Hahshs"},{"type":"text","value":"","title":"","placeholder":"Email","name":"email","$$hashKey":"object:161","val":"Hshshs"},{"type":"password","value":"","title":"","placeholder":"Password","name":"password","$$hashKey":"object:162","val":"bdjxhx"},{"type":"selection","value":[{"value":"0","title":"one","$$hashKey":"object:172"},{"value":"1","title":"two","$$hashKey":"object:173"},{"value":"2","title":"three","$$hashKey":"object:174"}],"title":"","placeholder":"","name":"sel","$$hashKey":"object:163","val":"two"}],"categoryname":"Music2","$$hashKey":"0H3"}', 0, 0, '2015-01-23 14:56:23'),
(6, 1, 14, '{"id":"1","name":"form1","json":[{"type":"text","value":"","title":"","placeholder":"Name","name":"name","$$hashKey":"object:160","val":"Hahshs"},{"type":"text","value":"","title":"","placeholder":"Email","name":"email","$$hashKey":"object:161","val":"Hshshs"},{"type":"password","value":"","title":"","placeholder":"Password","name":"password","$$hashKey":"object:162","val":"bdjxhx"},{"type":"selection","value":[{"value":"0","title":"one","$$hashKey":"object:172"},{"value":"1","title":"two","$$hashKey":"object:173"},{"value":"2","title":"three","$$hashKey":"object:174"}],"title":"","placeholder":"","name":"sel","$$hashKey":"object:163","val":"two"}],"categoryname":"Music2","$$hashKey":"0H3"}', 0, 0, '2015-01-23 14:56:25'),
(7, 3, 14, '{"id":"3","name":"form3","json":[{"type":"text","value":"","title":"","placeholder":"Comapany Name","name":"companyname","$$hashKey":"object:93","val":"Wohlig"},{"type":"text","value":"","title":"","placeholder":"Address","name":"address","$$hashKey":"object:94","val":"Vidhyavihar"},{"type":"text","value":"","title":"","placeholder":"Pin Code","name":"pincode","$$hashKey":"object:95","val":"42124"}],"categoryname":"Music2","$$hashKey":"0C8"}', 0, 0, '2015-01-31 13:51:16'),
(8, 6, 14, '{"id":"6","name":"jagruti patil","json":[{"type":"text","value":"","title":"","placeholder":"","name":"name","$$hashKey":"035","val":"Alok"},{"type":"text","value":"","title":"","placeholder":"","name":"address","$$hashKey":"037","val":"Nath"}],"categoryname":"Best This year2","$$hashKey":"0LO"}', 0, 0, '2015-01-31 14:47:36'),
(9, 3, 14, '{"id":"3","name":"form3","json":[{"type":"text","value":"","title":"","placeholder":"Comapany Name","name":"companyname","$$hashKey":"object:115","val":"Ggg"},{"type":"text","value":"","title":"","placeholder":"Address","name":"address","$$hashKey":"object:116","val":"Fgh"},{"type":"text","value":"","title":"","placeholder":"Pin Code","name":"pincode","$$hashKey":"object:117","val":"Fhh"}],"categoryname":"Music2","$$hashKey":"0TL"}', 0, 0, '2015-01-31 18:16:48'),
(10, 1, 14, '{"id":"1","name":"form1","json":[{"type":"text","value":"","title":"","placeholder":"Name","name":"name","$$hashKey":"object:110","val":"Anmdc"},{"type":"text","value":"","title":"","placeholder":"Email","name":"email","$$hashKey":"object:111","val":"fffd@;;"},{"type":"password","value":"","title":"","placeholder":"Password","name":"password","$$hashKey":"object:112","val":";:!:!"},{"type":"selection","value":[{"value":"0","title":"one","$$hashKey":"object:122"},{"value":"1","title":"two","$$hashKey":"object:123"},{"value":"2","title":"three","$$hashKey":"object:124"}],"title":"","placeholder":"","name":"sel","$$hashKey":"object:113","val":"three"}],"categoryname":"Music2","$$hashKey":"0CB"}', 0, 0, '2015-02-01 10:10:44'),
(11, 1, 14, '{"id":"1","name":"form1","json":[{"type":"text","value":"","title":"","placeholder":"Name","name":"name","$$hashKey":"object:110","val":"Anmdc"},{"type":"text","value":"","title":"","placeholder":"Email","name":"email","$$hashKey":"object:111","val":"fffd@;;"},{"type":"password","value":"","title":"","placeholder":"Password","name":"password","$$hashKey":"object:112","val":";:!:!"},{"type":"selection","value":[{"value":"0","title":"one","$$hashKey":"object:122"},{"value":"1","title":"two","$$hashKey":"object:123"},{"value":"2","title":"three","$$hashKey":"object:124"}],"title":"","placeholder":"","name":"sel","$$hashKey":"object:113","val":"three"}],"categoryname":"Music2","$$hashKey":"0CB"}', 0, 0, '2015-02-01 10:11:14'),
(12, 5, 14, '{"id":"5","name":"New Form","json":[{"type":"text","value":"","title":"name","placeholder":"Name","name":"name","$$hashKey":"037","val":"jagruti"},{"type":"select","value":[{"value":"0","title":"development","$$hashKey":"03P"},{"value":"1","title":"testing","$$hashKey":"03T"},{"value":"2","title":"production","$$hashKey":"03X"}],"title":"","placeholder":"","name":"choice","$$hashKey":"03B","val":"production"}],"categoryname":"Music2","$$hashKey":"0AV"}', 0, 0, '2015-02-07 12:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `onuser` int(11) NOT NULL,
  `fromuser` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `fromuser`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `userproduct`
--

CREATE TABLE IF NOT EXISTS `userproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `json` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `deletestatus` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `userproduct`
--

INSERT INTO `userproduct` (`id`, `productid`, `user`, `json`, `status`, `deletestatus`, `timestamp`) VALUES
(1, 1, 14, '{"id":"1","name":"toykraft","type":"sales","details":"details","url":"url","price":"3.5","json":"json","image":"logo_(2)3.png","usergenerated":"ug","productattributejson":"pjson","categoryname":"Music2","$$hashKey":"044"}', 0, 0, '2015-01-06 05:46:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
