-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2016 at 06:56 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apmtdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CID` int(5) NOT NULL AUTO_INCREMENT,
  `CNAME` varchar(30) NOT NULL,
  `CLEVEL` int(1) NOT NULL DEFAULT '0',
  `CPARENT` varchar(5) NOT NULL DEFAULT '0',
  `CPOC` varchar(5) NOT NULL,
  `CSTATUS` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1007 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CID`, `CNAME`, `CLEVEL`, `CPARENT`, `CPOC`, `CSTATUS`) VALUES
(1000, 'Electrical', 0, '0', '100', 1),
(1001, 'Plumber', 0, '0', '101', 1),
(1002, 'Paints', 0, '0', '103', 1),
(1003, 'House Electric', 1, '1000', '100', 1),
(1004, 'Building Electric', 1, '1000', '100', 1),
(1005, 'Tap house', 1, '1001', '101', 1),
(1006, 'Water Leak', 1, '1001', '101', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `CID` int(5) NOT NULL AUTO_INCREMENT,
  `CTITLE` varchar(60) NOT NULL,
  `CDESC` text NOT NULL,
  `CPRIO` int(1) NOT NULL,
  `CBY` int(5) NOT NULL,
  `CTO` int(5) NOT NULL,
  `CAREAID` varchar(5) NOT NULL,
  `CCATE` int(20) NOT NULL,
  `CSUBCATE` int(20) NOT NULL,
  `CSTATUS` int(1) NOT NULL DEFAULT '0',
  `CNOTES` text NOT NULL,
  `CDOR` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`CID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`CID`, `CTITLE`, `CDESC`, `CPRIO`, `CBY`, `CTO`, `CAREAID`, `CCATE`, `CSUBCATE`, `CSTATUS`, `CNOTES`, `CDOR`) VALUES
(2, 'Current not coming', 'current is not there only in out home.\n\nGenerator power also not coming.', 2, 100, 102, 'Apmt', 0, 0, 1, 'in my apartment', '2016-07-05 17:05:03'),
(3, 'sw', 'ddf \r\n\r\ndf\r\nsd\r\ns\r\ndfsd', 1, 9999, 9999, '0', 1000, 1003, 0, '', '2016-07-23 09:28:14'),
(4, 'margin', 'fsdfsd\r\n\r\nsdf', 3, 9999, 9999, '0', 1002, 0, 2, '', '2016-07-23 11:34:37'),
(5, 'swq', 'dfsd\r\n\r\ndf', 3, 9999, 0, '0', 1000, 9999, 3, '', '2016-06-23 06:01:47'),
(6, 'final', 'dfsdfas', 3, 101, 0, '0', 1000, 1004, 2, '', '2016-07-20 15:13:56'),
(7, 'Disgust', 'fuck you', 1, 9999, 0, '0', 1001, 1005, 1, '', '2016-06-25 05:29:14'),
(8, 'Jinkalaka', 'ggigigi', 3, 9999, 101, '0', 1001, 0, 1, '', '2016-07-16 05:50:57'),
(9, 'Software not working', 'This software not working', 3, 101, 103, '0', 1002, 0, 1, '', '2016-07-20 15:14:02'),
(10, 'dsad', 'asdsdsasa', 2, 9999, 0, '0', 1000, 1003, 0, '', '2016-07-16 09:33:41'),
(11, 'Test from 101', 'jus test igoe', 3, 9999, 100, '0', 1000, 1004, 0, '', '2016-07-20 15:12:01'),
(12, 'Dileep urgent', 'Please work faster', 3, 9999, 101, '0', 1001, 1005, 0, '', '2016-07-25 05:04:40'),
(13, 'plumber', 'leakage', 3, 101, 101, '0', 1001, 1006, 0, '', '2016-07-25 11:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE IF NOT EXISTS `emergency` (
  `EID` int(2) NOT NULL AUTO_INCREMENT,
  `ETYPE` int(1) NOT NULL,
  `ECATE` varchar(1) NOT NULL,
  `ENAME` varchar(20) NOT NULL,
  `EPHONE` bigint(15) NOT NULL,
  `EADDRESS` text NOT NULL,
  `EMAP` varchar(30) NOT NULL,
  `EACTIVE` int(1) NOT NULL,
  `EUSERID` int(5) NOT NULL,
  PRIMARY KEY (`EID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`EID`, `ETYPE`, `ECATE`, `ENAME`, `EPHONE`, `EADDRESS`, `EMAP`, `EACTIVE`, `EUSERID`) VALUES
(1, 1, 'M', 'Reddy', 9898989, 'Reddy&Reddy Colony,\r\nTirupati.', 'http://maps.google.com/?cid=77', 0, 9999),
(2, 1, 'P', 'Parusuram Police Sta', 9898134298, 'Renigunta Road,\r\nTirupati.', 'http://maps.google.com/?cid=77', 0, 0),
(3, 1, 'F', 'Main Fire Station', 432423423434, 'Kanakambadi Road,\r\nTirupati', 'http://maps.google.com/?cid=77', 0, 0),
(4, 1, 'S', 'Gate Security', 100, 'Brundavan Apartment', '', 0, 9999),
(5, 0, 'M', 'KUMAR', 234324234, '301', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eventdetails`
--

CREATE TABLE IF NOT EXISTS `eventdetails` (
  `EID` int(5) NOT NULL AUTO_INCREMENT,
  `ETITLE` varchar(60) NOT NULL,
  `EDESC` text NOT NULL,
  `EBY` int(5) NOT NULL,
  `EBYNAME` varchar(30) NOT NULL,
  `ETYPE` int(1) NOT NULL,
  `ESTATUS` int(1) NOT NULL DEFAULT '2',
  `EDATE` datetime NOT NULL,
  `EREMIND` text NOT NULL,
  PRIMARY KEY (`EID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `eventdetails`
--

INSERT INTO `eventdetails` (`EID`, `ETITLE`, `EDESC`, `EBY`, `EBYNAME`, `ETYPE`, `ESTATUS`, `EDATE`, `EREMIND`) VALUES
(1, 'Gruhapravesham', 'House start ceremony of a block 406\r\n', 101, 'dinesh', 1, 2, '2016-07-22 00:00:00', ''),
(2, 'Saraswati Pooja', 'First time in our house.\r\n\r\nPlease bring all family.\r\n\r\nTraditional Dress is preferred', 101, 'dinesh', 1, 2, '2016-07-14 00:00:00', ''),
(3, 'Upma maker demo', 'just tv event', 9999, '', 0, 2, '2016-09-13 00:00:00', ''),
(4, 'Upma maker install demo', 'just tv event', 9999, 'guest', 0, 0, '0000-00-00 00:00:00', ''),
(5, 'Matchmaker', 'dsfsdf', 9999, 'guest', 0, 0, '2016-07-14 00:00:00', ''),
(6, 'DIL', 'DILEEP TEST EVENT', 9999, 'guest', 0, 2, '2016-07-30 00:00:00', ''),
(7, 'pRADEP', 'TEST PRADEEP', 9999, 'guest', 0, 2, '2017-11-30 00:00:00', ''),
(8, 'test id', 'fsfsfsd', 9999, 'guest', 0, 2, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `eventusers`
--

CREATE TABLE IF NOT EXISTS `eventusers` (
  `SNO` int(4) NOT NULL AUTO_INCREMENT,
  `EVEID` int(5) NOT NULL,
  `USERID` int(5) NOT NULL,
  PRIMARY KEY (`SNO`),
  UNIQUE KEY `SNO` (`SNO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `eventusers`
--

INSERT INTO `eventusers` (`SNO`, `EVEID`, `USERID`) VALUES
(21, 6, 9999),
(2, 2, 1),
(18, 5, 9999),
(30, 1, 9999),
(6, 9, 3),
(23, 3, 9999),
(26, 6, 9999),
(32, 3, 9999),
(35, 2, 9999);

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE IF NOT EXISTS `notif` (
  `NID` int(5) NOT NULL AUTO_INCREMENT,
  `NUSERID` int(5) NOT NULL,
  `NTYPE` varchar(1) NOT NULL,
  `NTEXT` text NOT NULL,
  `NHREF` varchar(50) NOT NULL,
  `NTO` int(1) NOT NULL,
  `NSTATUS` int(1) NOT NULL DEFAULT '0',
  `NEMAIL` int(1) NOT NULL DEFAULT '1',
  `NSMS` int(1) NOT NULL DEFAULT '1',
  `NDATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`NID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`NID`, `NUSERID`, `NTYPE`, `NTEXT`, `NHREF`, `NTO`, `NSTATUS`, `NEMAIL`, `NSMS`, `NDATE`) VALUES
(1, 9999, 'E', 'new event added to test', '', 0, 0, 1, 1, '2016-07-19 20:32:39'),
(2, 102, 'C', 'Your complaint is resolved', '', 0, 0, 1, 1, '2016-07-19 20:40:39'),
(3, 9999, 'P', 'your event got new registrationyour event got new registrationyour event got new registrationyour event got new registration', '', 0, 0, 1, 1, '2016-07-19 20:32:39'),
(4, 101, 'C', 'buildin complaint is resolved', '', 0, 0, 1, 1, '2016-07-19 20:40:39'),
(10, 9999, 'B', 'GOOD game changer', '#d', 1, 0, 1, 1, '2016-07-22 11:06:22'),
(9, 9999, 'C', 'game changer', '#d', 1, 0, 1, 1, '2016-07-22 11:06:22'),
(11, 0, 'G', 'POSTArray', '', 0, 0, 1, 1, '2016-07-25 11:38:38'),
(12, 231, 'G', 'GINGL', '', 0, 0, 1, 1, '2016-07-25 11:40:34'),
(13, 9999, 'G', 'DILGN', '', 0, 0, 1, 1, '2016-07-25 11:40:58'),
(14, 9999, 'G', 'test', '', 0, 0, 1, 1, '2016-07-25 13:10:39'),
(15, 9999, 'G', 'deeeepp', '', 0, 0, 1, 1, '2016-07-25 13:11:07'),
(16, 406, 'G', 'today no power from morinn', '', 0, 0, 1, 1, '2016-07-25 17:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `rbook`
--

CREATE TABLE IF NOT EXISTS `rbook` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RID` int(6) NOT NULL,
  `USERID` int(5) NOT NULL,
  `RDATEFROM` datetime NOT NULL,
  `RDATETO` datetime NOT NULL,
  `RNOTES` text NOT NULL,
  `RSTATUS` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `RID` int(5) NOT NULL AUTO_INCREMENT,
  `RNAME` varchar(30) NOT NULL,
  `CATEGORY` varchar(30) NOT NULL,
  `SUBCATE` varchar(30) NOT NULL,
  `RFEES` int(11) NOT NULL,
  `RPOC` int(5) NOT NULL,
  `RPOCPHONE` int(10) NOT NULL,
  `RALLOCATE` int(1) NOT NULL,
  `RCOUNT` int(2) NOT NULL,
  `RSTATUS` int(1) NOT NULL,
  PRIMARY KEY (`RID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userdet`
--

CREATE TABLE IF NOT EXISTS `userdet` (
  `USERID` int(5) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(30) NOT NULL,
  `TYPE` int(1) NOT NULL,
  `APTNUM` int(3) NOT NULL,
  `WCATE` varchar(20) NOT NULL,
  `WCATENUM` varchar(20) NOT NULL,
  `WROLE` varchar(20) NOT NULL,
  `WPREMISES` varchar(8) NOT NULL,
  `PHONE` bigint(10) NOT NULL,
  `EMAIL` varchar(25) NOT NULL,
  `REPTO` varchar(5) NOT NULL,
  `ASTATUS` int(1) NOT NULL,
  `DOR` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`USERID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10001 ;

--
-- Dumping data for table `userdet`
--

INSERT INTO `userdet` (`USERID`, `NAME`, `TYPE`, `APTNUM`, `WCATE`, `WCATENUM`, `WROLE`, `WPREMISES`, `PHONE`, `EMAIL`, `REPTO`, `ASTATUS`, `DOR`) VALUES
(106, 'veera', 0, 123, '', '', '', '', 9933993399, 'wsdasda@ddd.com', '', 1, '2016-06-19 20:12:54'),
(101, 'dinesh', 1, 0, 'Electrition', '100', 'Electrition', 'Inner', 4003030333, 'fdsa@ff.com', '', 1, '2016-06-19 20:14:56'),
(9999, 'admin', 1, 0, 'admin', '9999', 'Electrition', 'Inner', 4003030333, 'fdsa@ff.com', '', 1, '2016-06-19 20:14:56'),
(10000, 'de', 0, 0, 'admin', '9999', 'Electrition', 'Inner', 4003030333, 'fdsa@ff.com', '', 1, '2016-06-19 20:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `userm`
--

CREATE TABLE IF NOT EXISTS `userm` (
  `USERID` varchar(5) NOT NULL,
  `UPASS` varchar(50) NOT NULL,
  PRIMARY KEY (`USERID`),
  UNIQUE KEY `USERID` (`USERID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='USERS CREDS';

--
-- Dumping data for table `userm`
--

INSERT INTO `userm` (`USERID`, `UPASS`) VALUES
('102', 'welcome'),
('101', 'welcome'),
('103', 'welcome'),
('100', 'welcome'),
('104', 'welcome'),
('105', 'welcome'),
('106', 'guest'),
('9999', 'welcome');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
