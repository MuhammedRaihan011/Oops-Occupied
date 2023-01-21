-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2021 at 03:58 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbhouserent`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblinterest`
--

CREATE TABLE IF NOT EXISTS `tblinterest` (
  `interestId` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `idate` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`interestId`),
  KEY `pid` (`pid`,`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblinterest`
--

INSERT INTO `tblinterest` (`interestId`, `pid`, `tid`, `idate`, `status`) VALUES
(1, 1, 1, '2021-08-03 10:16:25', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE IF NOT EXISTS `tbllogin` (
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`uname`, `pwd`, `utype`, `status`) VALUES
('admin@gmail.com', 'admin', 'admin', '1');


-- --------------------------------------------------------

--
-- Table structure for table `tblproperty`
--

CREATE TABLE IF NOT EXISTS `tblproperty` (
  `pId` int(11) NOT NULL AUTO_INCREMENT,
  `vId` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `wardno` int(11) NOT NULL,
  `totalroom` int(11) NOT NULL,
  `bedroom` int(11) NOT NULL,
  `livingroom` int(11) NOT NULL,
  `kitchen` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `rent` bigint(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`pId`),
  KEY `vId` (`vId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblproperty`
--

INSERT INTO `tblproperty` (`pId`, `vId`, `country`, `province`, `zone`, `district`, `city`, `wardno`, `totalroom`, `bedroom`, `livingroom`, `kitchen`, `bathroom`, `rent`, `description`, `img`, `lat`, `lon`, `status`) VALUES
(1, 1, 'India', 'Kerala', 'Kerala', 'Ernakulam', 'Aluva', 5, 3, 3, 1, 2, 3, 15000, 'ELITE', '../assets/images/g6.jpg', 9.99219, 76.29768, 'Property rented'),
(3, 1, 'India', 'Kerala', 'Kerala', 'Ernakulam', 'ERNAKULAM', 1, 3, 2, 2, 1, 2, 12000, 'GOOD ATMOSPHERE', '../assets/images/2.jpg', 9.99219, 76.29768, 'available'),
(4, 1, 'India', 'Kerala', 'Kerala', 'Ernakulam', 'ERNAKULAM', 5, 4, 2, 1, 1, 3, 12000, 'NEAR LULU MALL', '../assets/images/g2.jpg', 9.99219, 76.29768, 'available'),
(5, 1, 'India', 'Kerala', 'Kerala', 'Ernakulam', 'Kaloor', 8, 3, 2, 1, 1, 2, 8500, 'LAKE VIEW', '../assets/images/b2.jpg', 9.99219, 76.29768, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `tbltenant`
--

CREATE TABLE IF NOT EXISTS `tbltenant` (
  `tId` int(11) NOT NULL AUTO_INCREMENT,
  `tName` varchar(50) NOT NULL,
  `tAddress` varchar(100) NOT NULL,
  `tContact` varchar(50) NOT NULL,
  `tEmail` varchar(50) NOT NULL,
  `tIdType` varchar(50) NOT NULL,
  `tFile` varchar(50) NOT NULL,
  PRIMARY KEY (`tId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbltenant`
--

INSERT INTO `tbltenant` (`tId`, `tName`, `tAddress`, `tContact`, `tEmail`, `tIdType`, `tFile`) VALUES
(1, 'Raihan', 'Valiyaveetil, Edappally', '8848932507', 'raihan@gmail.com', 'Aadhar', 'assets/images/aadhar.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblvendor`
--

CREATE TABLE IF NOT EXISTS `tblvendor` (
  `vId` int(11) NOT NULL AUTO_INCREMENT,
  `vName` varchar(50) NOT NULL,
  `vAddress` varchar(100) NOT NULL,
  `vEmail` varchar(50) NOT NULL,
  `vContact` varchar(50) NOT NULL,
  `vIdType` varchar(50) NOT NULL,
  `vFile` varchar(100) NOT NULL,
  PRIMARY KEY (`vId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblvendor`
--

INSERT INTO `tblvendor` (`vId`, `vName`, `vAddress`, `vEmail`, `vContact`, `vIdType`, `vFile`) VALUES
(1, 'Akhil', 'XI/B, 2nd floor, park avbenue, kaloor', 'akhil@gmail.com', '9653201477', 'Voter Id', 'assets/images/voter.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblproperty`
--
ALTER TABLE `tblproperty`
  ADD CONSTRAINT `tblproperty_ibfk_1` FOREIGN KEY (`vId`) REFERENCES `tblvendor` (`vId`) ON DELETE CASCADE ON UPDATE CASCADE;
