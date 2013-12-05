-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2013 at 05:25 PM
-- Server version: 5.1.72
-- PHP Version: 5.3.3-7+squeeze17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `des3k`
--

-- --------------------------------------------------------

--
-- Table structure for table `Applied_FO`
--

CREATE TABLE IF NOT EXISTS `Applied_FO` (
  `Tag_num` int(11) DEFAULT NULL,
  `FO_num` int(11) NOT NULL DEFAULT '0',
  `Notes` varchar(256) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`FO_num`),
  KEY `Tag_num` (`Tag_num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Applied_FO`
--

INSERT INTO `Applied_FO` (`Tag_num`, `FO_num`, `Notes`, `Type`) VALUES
(888, 999, 'ddd', 'TEST'),
(888, 888, '', 'TEST'),
(666, 666, '', 'TEST'),
(991, 994, '', 'TEST'),
(661, 661, 'd', 'TEST'),
(44, 991, '', 'TEST'),
(44, 992, '', 'FO TEST'),
(44, 993, 'test test test', 'FO TEST'),
(44, 944, 'test', 'FO TEST'),
(44, 955, 'Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetu', 'FO TEST'),
(44, 956, 'testefaved', 'FO TEST'),
(1517, 19, '', ''),
(1518, 16, 'test FO checkbox', 'FO'),
(1519, 99, 'Test quote checkbox', 'Quote'),
(1520, 9, 'test both checkboxes', 'Quote'),
(1520, 10, 'test both checkboxes under revision', 'Quote'),
(1520, 11, '', 'FO'),
(1520, 12, '', 'Quote');

-- --------------------------------------------------------

--
-- Table structure for table `Complexity`
--

CREATE TABLE IF NOT EXISTS `Complexity` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `Complexity`
--

INSERT INTO `Complexity` (`Id`, `Name`) VALUES
(109, 'K'),
(102, 'E'),
(3, 'A'),
(105, 'J'),
(101, 'D'),
(106, 'F'),
(110, 'Z');

-- --------------------------------------------------------

--
-- Table structure for table `Country`
--

CREATE TABLE IF NOT EXISTS `Country` (
  `Name` varchar(50) NOT NULL DEFAULT '',
  `Multiplier` float DEFAULT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Country`
--

INSERT INTO `Country` (`Name`, `Multiplier`) VALUES
('USA', 0.5),
('Canada', 0.7),
('Mexico', 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

CREATE TABLE IF NOT EXISTS `Groups` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `Groups`
--

INSERT INTO `Groups` (`Id`, `Name`) VALUES
(1, 'Administrator'),
(4, 'User'),
(2, 'Tag Members'),
(3, 'OE'),
(7, 'test4'),
(13, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `Group_map`
--

CREATE TABLE IF NOT EXISTS `Group_map` (
  `User_id` varchar(50) NOT NULL DEFAULT '',
  `Group_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`User_id`,`Group_id`),
  KEY `Group_id` (`Group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Group_map`
--

INSERT INTO `Group_map` (`User_id`, `Group_id`) VALUES
('admin', 1),
('admin', 2),
('admin', 3),
('des3k', 1),
('des3k', 4),
('nonadmin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Log`
--

CREATE TABLE IF NOT EXISTS `Log` (
  `Username` varchar(50) DEFAULT NULL,
  `IP_address` varchar(45) NOT NULL DEFAULT '',
  `Machine_name` varchar(256) DEFAULT NULL,
  `Attempt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`IP_address`,`Attempt_date`),
  KEY `Username` (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Log`
--

INSERT INTO `Log` (`Username`, `IP_address`, `Machine_name`, `Attempt_date`) VALUES
('1112020', '127.0.0.1', 'ANT-PC', '2013-11-30 14:30:47'),
('admin', '127.0.0.1', 'ANT-PC', '2013-11-30 14:30:07'),
('1114040', '127.0.0.1', 'ANT-PC', '2013-11-30 14:30:58'),
('admin', '127.0.0.1', 'ANT-PC', '2013-11-30 14:31:10'),
('asdf', '127.0.0.1', 'ANT-PC', '2013-11-30 14:32:09'),
('admin', '127.0.0.1', 'ANT-PC', '2013-11-30 14:32:22'),
('admin', '127.0.0.1', 'ANT-PC', '2013-11-30 14:34:35'),
('adf', '127.0.0.1', 'ANT-PC', '2013-11-30 14:34:46'),
('adf', '127.0.0.1', 'ANT-PC', '2013-11-30 14:35:24'),
('admin', '127.0.0.1', 'ANT-PC', '2013-11-30 18:06:03'),
('des3k', '127.0.0.1', 'DUSTIN5', '2013-12-01 09:22:38'),
('nonadmin', '127.0.0.1', 'DUSTIN5', '2013-12-01 09:48:41'),
('des3k', '127.0.0.1', 'DUSTIN5', '2013-12-01 09:48:49'),
('des3k', '127.0.0.1', 'DUSTIN5', '2013-12-01 10:05:21'),
('admin', '127.0.0.1', 'ANT-PC', '2013-12-01 13:22:16'),
('admin', '127.0.0.1', 'DAVID-PC', '2013-12-01 15:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `Price_map`
--

CREATE TABLE IF NOT EXISTS `Price_map` (
  `Country_name` varchar(50) NOT NULL DEFAULT '',
  `Product_name` varchar(50) NOT NULL DEFAULT '',
  `Tag_num` int(11) NOT NULL DEFAULT '0',
  `Rev_num` int(11) NOT NULL DEFAULT '0',
  `Price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`Country_name`,`Product_name`,`Tag_num`,`Rev_num`),
  KEY `Product_name` (`Product_name`),
  KEY `Tag_num` (`Tag_num`),
  KEY `Rev_num` (`Rev_num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Price_map`
--

INSERT INTO `Price_map` (`Country_name`, `Product_name`, `Tag_num`, `Rev_num`, `Price`) VALUES
('USA', 'HVL', 888, 0, '3240'),
('USA', 'HVL', 111, 0, '3240'),
('Canada', 'HVL', 111, 0, '2430'),
('Mexico', 'HVL', 111, 0, '3240'),
('USA', 'HVL', 1010, 0, '950'),
('Canada', 'HVL', 1010, 0, '713'),
('Mexico', 'HVL', 1010, 0, '950'),
('USA', 'Metal Clad', 1010, 0, '950'),
('Canada', 'Metal Clad', 1010, 0, '713'),
('Mexico', 'Metal Clad', 1010, 0, '950'),
('USA', 'MVMCC', 1010, 0, '950'),
('Canada', 'MVMCC', 1010, 0, '713'),
('Mexico', 'MVMCC', 1010, 0, '950'),
('USA', 'HVL', 991, 0, '803'),
('Canada', 'HVL', 991, 0, '603'),
('Mexico', 'HVL', 991, 0, '803'),
('USA', 'Metal Clad', 991, 0, '803'),
('Canada', 'Metal Clad', 991, 0, '603'),
('Mexico', 'Metal Clad', 991, 0, '803');

-- --------------------------------------------------------

--
-- Table structure for table `Price_per_hour`
--

CREATE TABLE IF NOT EXISTS `Price_per_hour` (
  `Labor` float DEFAULT NULL,
  `Engineering` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Price_per_hour`
--

INSERT INTO `Price_per_hour` (`Labor`, `Engineering`) VALUES
(74.3, 62.25);

-- --------------------------------------------------------

--
-- Table structure for table `Product_type`
--

CREATE TABLE IF NOT EXISTS `Product_type` (
  `Name` varchar(50) NOT NULL DEFAULT '',
  `Multiplier` decimal(10,0) DEFAULT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Name`),
  UNIQUE KEY `Id` (`Id`),
  UNIQUE KEY `Id_2` (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Product_type`
--

INSERT INTO `Product_type` (`Name`, `Multiplier`, `Id`) VALUES
('HVL', '12', 1),
('HVL/CC', '13', 2),
('Metal Clad', '12', 5),
('MVMCC', '12', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Subcategory`
--

CREATE TABLE IF NOT EXISTS `Subcategory` (
  `Id` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Subcategory`
--

INSERT INTO `Subcategory` (`Id`, `Name`) VALUES
(0, 'AC Panel'),
(1, 'Arc Resistant'),
(2, 'Auto Xfer'),
(9, 'TEST'),
(10, 'TEST2');

-- --------------------------------------------------------

--
-- Table structure for table `Tag`
--

CREATE TABLE IF NOT EXISTS `Tag` (
  `Number` int(11) NOT NULL DEFAULT '0',
  `Revision` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date DEFAULT NULL,
  `Labor_cost` decimal(10,0) NOT NULL,
  `Engineering_cost` decimal(10,0) NOT NULL,
  `Lead_time` int(11) DEFAULT NULL,
  `Price_expires` date DEFAULT NULL,
  `Tag_notes` varchar(256) DEFAULT NULL,
  `Tag_desc` varchar(256) DEFAULT NULL,
  `Material_cost` decimal(10,0) NOT NULL,
  `Price_notes` varchar(256) DEFAULT NULL,
  `Install_cost` decimal(10,0) NOT NULL,
  `Cat_id` int(11) DEFAULT NULL,
  `Complexity_id` int(11) DEFAULT NULL,
  `Created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Number`,`Revision`),
  KEY `Created_by` (`Created_by`),
  KEY `Cat_id` (`Cat_id`),
  KEY `Complexity_id` (`Complexity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Tag`
--

INSERT INTO `Tag` (`Number`, `Revision`, `Date`, `Labor_cost`, `Engineering_cost`, `Lead_time`, `Price_expires`, `Tag_notes`, `Tag_desc`, `Material_cost`, `Price_notes`, `Install_cost`, `Cat_id`, `Complexity_id`, `Created_by`) VALUES
(6001, 1, NULL, '0', '0', NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, NULL, NULL),
(6001, 2, NULL, '0', '0', NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, NULL, NULL),
(0, 1, NULL, '1', '0', NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, NULL, NULL),
(0, 2, NULL, '0', '0', NULL, NULL, 'blah', NULL, '0', NULL, '0', NULL, NULL, NULL),
(6002, 1, NULL, '0', '0', NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, NULL, NULL),
(6002, 2, NULL, '0', '0', NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, NULL, NULL),
(6002, 3, NULL, '19', '16', NULL, NULL, NULL, NULL, '500', NULL, '5554', NULL, NULL, NULL),
(9999, 1, NULL, '999', '999', 99, NULL, 'TEST', 'TEST', '999', 'TEST', '999', 2, 2, NULL),
(9999, 2, NULL, '999', '999', 99, NULL, 'TEST', 'TEST', '999', 'TEST', '999', 2, 2, NULL),
(9999, 3, NULL, '999', '999', 99, NULL, 'TEST', 'TEST', '999', 'TEST', '999', 2, 2, NULL),
(9991, 1, NULL, '99', '99', 99, '0000-00-00', 'TEST', 'TEST', '99', 'TEST', '99', 0, 0, NULL),
(9991, 2, NULL, '99', '99', 99, '0000-00-00', 'TEST', 'TEST', '99', 'TEST', '99', 0, 0, NULL),
(9991, 3, NULL, '99', '99', 99, '2013-11-29', 'TEST', 'TEST', '99', 'TEST', '99', 0, 0, NULL),
(9991, 4, '2013-11-29', '99', '99', 99, '2013-11-29', 'TEST', 'TEST', '99', 'TEST', '99', 0, 0, NULL),
(9991, 5, '2013-11-29', '99', '99', 99, '2014-03-01', 'TEST', 'TEST', '99', 'TEST', '99', 0, 0, NULL),
(6006, 1, '2013-11-29', '10', '10', 10, '2014-03-01', 'T', 'T', '10', 'T', '10', 0, 0, NULL),
(6006, 2, '2013-11-29', '10', '10', 10, '2014-03-01', 'T', '', '10', 'T', '10', 0, 0, NULL),
(6006, 3, '2013-11-30', '10', '10', 10, '2014-03-01', '', '', '10', 'T', '10', 0, 0, NULL),
(6006, 4, '2013-11-30', '10', '10', 10, '2014-03-01', '', '', '10', '', '10', 0, 0, NULL),
(6006, 5, '2013-11-30', '10', '10', 10, '2014-03-01', '', '', '10', '', '10', 0, 0, NULL),
(6006, 6, '2013-11-30', '10', '10', 10, '2014-03-01', '', '', '10', '', '10', 0, 0, NULL),
(9998, 1, '2013-11-29', '0', '0', 10, '2013-11-29', '', '', '0', '', '0', 0, 0, NULL),
(8888, 1, '2013-11-30', '99', '99', 10, '2013-11-30', 'TEST', 'TEST', '99', 'TEST', '299', 2, 1, NULL),
(8888, 2, '2013-11-30', '40', '40', 10, '2013-11-30', 'TEST', 'TEST', '40', 'TEST', '120', 1, 2, 'Dustin Seger'),
(888, 1, '2013-11-30', '10', '10', 10, '2013-11-30', '', '', '10', '', '30', 0, 0, 'Dustin Seger'),
(888, 2, '2013-11-30', '10', '10', 10, '2014-03-02', '', '', '10', '', '30', 0, 0, 'Dustin Seger'),
(8888, 3, '2013-11-30', '20', '20', 20, '2014-03-02', '', '', '20', '', '60', 0, 0, 'Dustin Seger'),
(888, 3, '2013-11-30', '10', '10', 10, '2014-03-02', '', '', '10', '', '30', 0, 0, 'Dustin Seger'),
(888, 4, '2013-11-30', '10', '10', 20, '2014-03-02', '', '', '10', '', '30', 0, 0, 'Dustin Seger'),
(8888, 4, '2013-11-30', '10', '10', 90, '2014-03-02', '', '', '10', '', '30', 0, 0, 'Dustin Seger'),
(8888, 5, '2013-11-30', '10', '10', 90, '2014-03-02', '', '', '10', '', '30', 0, 0, 'Dustin Seger'),
(8888, 6, '2013-11-30', '10', '10', 90, '2014-03-02', '', '', '10', '', '30', 0, 0, 'Dustin Seger'),
(888, 5, '2013-11-30', '10', '10', 90, '2014-03-02', '', '', '10', '', '30', 0, 0, 'Dustin Seger'),
(888, 6, '2013-11-30', '10', '10', 90, '2014-03-02', '', '', '10', '', '30', 0, 0, 'Dustin Seger'),
(888, 7, '2013-11-30', '10', '10', 20, '2014-03-02', '', '', '10', '', '30', 0, 0, 'Dustin Seger'),
(888, 8, '2013-11-30', '10', '10', 20, '2014-03-02', '', '', '10', '', '30', 0, 0, 'Dustin Seger'),
(888, 9, '2013-11-30', '90', '90', 90, '2014-03-02', '', '', '90', '', '270', 0, 0, 'Dustin Seger'),
(888, 10, '2013-11-30', '90', '90', 90, '2014-03-02', '', '', '90', '', '270', 0, 0, 'Dustin Seger'),
(888, 11, '2013-11-30', '90', '90', 90, '2014-03-02', '', '', '90', '', '270', 0, 0, 'Dustin Seger'),
(888, 12, '2013-11-30', '90', '90', 90, '2014-03-02', '', '', '90', '', '270', 0, 0, 'Dustin Seger'),
(888, 13, '2013-11-30', '40', '40', 10, '2014-03-02', '', '', '40', '', '120', 0, 0, 'Dustin Seger'),
(111, 1, '2013-11-30', '90', '90', 90, '2014-03-02', '', '', '90', '', '270', 0, 0, 'Dustin Seger'),
(111, 2, '2013-11-30', '90', '90', 90, '2014-03-02', '', '', '90', '', '270', 0, 0, 'Dustin Seger'),
(1010, 1, '2013-11-30', '20', '19', 90, '2014-03-02', '', '', '40', '', '79', 0, 0, 'Dustin Seger'),
(991, 1, '2013-11-30', '1', '44', 30, '2014-03-02', '', '', '22', '', '67', 0, 102, 'Anthony Davis'),
(9999, 4, '2013-12-01', '999', '999', 99, '2014-03-01', 'TEST', 'TEST', '888', 'TEST', '2886', 0, 104, 'Anthony Davis'),
(9999, 5, '2013-12-01', '999', '999', 99, '2014-03-01', 'HEYOH!', 'I added this through the edit feature!!!!', '888', 'xD', '2886', 0, 104, 'Anthony Davis'),
(4444, 1, '2013-12-01', '20', '20', 44, '2014-03-01', '', '', '20', '', '60', 0, 109, 'Dustin Seger'),
(44, 1, '2013-12-01', '44', '44', 44, '2014-03-01', '', '', '44', '', '132', 0, 109, 'Dustin Seger'),
(44, 2, '2013-12-01', '44', '44', 44, '2014-03-01', '', '', '44', '', '132', 0, 109, 'Dustin Seger'),
(44, 3, '2013-12-01', '44', '44', 44, '2014-03-01', '', '', '44', '', '132', 0, 109, 'Dustin Seger'),
(1515, 1, '2013-12-01', '4', '4', 10, '2014-03-01', '', '', '30', '', '38', 0, 109, 'Dustin Seger'),
(1515, 2, '2013-12-01', '3', '3', 90, '2014-03-01', '', '', '3', '', '9', 0, 109, 'Dustin Seger'),
(1516, 1, '2013-12-01', '3', '3', 90, '2014-03-01', '', '', '30', '', '36', 0, 109, 'Dustin Seger'),
(1517, 1, '2013-12-01', '33', '3', 10, '2014-03-01', '', '', '3', '', '39', 0, 109, 'Dustin Seger'),
(1518, 1, '2013-12-01', '3', '3', 10, '2014-03-01', '', '', '3', '', '9', 0, 109, 'Dustin Seger'),
(1519, 1, '2013-12-01', '3', '3', 10, '2014-03-01', '', '', '3', '', '9', 0, 109, 'Dustin Seger'),
(1520, 1, '2013-12-01', '3', '3', 9, '2014-03-01', '', '', '3', '', '9', 0, 109, 'Dustin Seger');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `Id` varchar(50) NOT NULL DEFAULT '',
  `Password` varchar(128) DEFAULT NULL,
  `Session_exp` datetime DEFAULT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `LName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`Id`, `Password`, `Session_exp`, `FName`, `LName`) VALUES
('1114040', 'dong1234', NULL, 'Dustin', 'Seger'),
('1112020', 'test2', '0000-00-00 00:00:00', 'David', 'Pettey'),
('des3k', 'dong1234', NULL, 'Dustin', 'Seger'),
('admin', 'admin', NULL, 'Anthony', 'Davis'),
('nonadmin', 'nonadmin', NULL, 'Jared', 'Smith');
