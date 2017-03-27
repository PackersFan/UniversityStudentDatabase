-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2015 at 01:31 PM
-- Server version: 5.5.44-37.3-log
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carsons5_residency`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`carsons5`@`localhost` FUNCTION `StaffRatio`(
staffcount INT,
studentcount INT
) RETURNS float
BEGIN DECLARE ratio FLOAT;

SET ratio = staffcount / studentcount;

RETURN ratio; 

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Building`
--

CREATE TABLE IF NOT EXISTS `Building` (
  `Name` varchar(255) NOT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `NumStudents` varchar(255) DEFAULT NULL,
  `NumRooms` varchar(255) DEFAULT NULL,
  `University` varchar(255) DEFAULT NULL,
  UNIQUE KEY `Name` (`Name`),
  KEY `University` (`University`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Building`
--

INSERT INTO `Building` (`Name`, `Location`, `NumStudents`, `NumRooms`, `University`) VALUES
('Berry', 'Calhoun', '400', '100', 'College of Charleston'),
('McAlister', 'Calhoun', '650', '150', 'College of Charleston'),
('Nowhere', 'Nowhere', '230', '150', 'Trident Tech'),
('Syringe', 'Hospital', '20', '5', 'College of Medicine');

--
-- Triggers `Building`
--
DROP TRIGGER IF EXISTS `delete_student`;
DELIMITER //
CREATE TRIGGER `delete_student` BEFORE DELETE ON `Building`
 FOR EACH ROW BEGIN
DELETE FROM Student WHERE Building = OLD.Name;
DELETE FROM Staff WHERE Building = OLD.Name;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Guests`
--

CREATE TABLE IF NOT EXISTS `Guests` (
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `ID` varchar(255) NOT NULL,
  `Phone` int(10) DEFAULT NULL,
  `StudentID` int(8) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_StuGuests` (`StudentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Guests`
--

INSERT INTO `Guests` (`Name`, `Address`, `ID`, `Phone`, `StudentID`) VALUES
('Sooka Mahdeek', 'Phulonrapist@aol.com', '69696969', 2147483647, 696969696);

-- --------------------------------------------------------

--
-- Table structure for table `Major`
--

CREATE TABLE IF NOT EXISTS `Major` (
  `Name` varchar(255) DEFAULT NULL,
  `StudentID` int(8) NOT NULL,
  `StudentName` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  UNIQUE KEY `Name` (`Name`),
  KEY `StudentID` (`StudentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Major`
--

INSERT INTO `Major` (`Name`, `StudentID`, `StudentName`, `Type`) VALUES
('Computer Science', 1231233, 'dfadsf', 'Science'),
('PublicSpeaking', 1231233, 'dfadsf', 'Humanity');

-- --------------------------------------------------------

--
-- Table structure for table `Phone`
--

CREATE TABLE IF NOT EXISTS `Phone` (
  `Carrier` varchar(255) NOT NULL,
  `Number` varchar(255) NOT NULL,
  `StudentID` int(8) NOT NULL,
  `Type` varchar(255) NOT NULL,
  UNIQUE KEY `Number` (`Number`),
  KEY `StudentID` (`StudentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Phone`
--

INSERT INTO `Phone` (`Carrier`, `Number`, `StudentID`, `Type`) VALUES
('', '', 1231233, ''),
('Verizon', '8038401300', 123234444, 'Work');

-- --------------------------------------------------------

--
-- Stand-in structure for view `roommates`
--
CREATE TABLE IF NOT EXISTS `roommates` (
`ID` int(8)
,`Name` varchar(255)
,`DOB` varchar(255)
,`Email` varchar(255)
,`Building` varchar(255)
,`Room` int(3)
);
-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE IF NOT EXISTS `Staff` (
  `Name` varchar(255) NOT NULL,
  `ID` int(8) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Building` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Building` (`Building`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`Name`, `ID`, `Position`, `Building`, `Email`) VALUES
('Seth Stoudenmier', 10015005, 'RA', 'Berry', 'stoudenmiersh@g.cofc.edu'),
('Carson Smith', 20041066, 'RA', 'McAlister', 'smithc2@g.cofc.edu');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `ID` int(8) NOT NULL DEFAULT '0',
  `Name` varchar(255) NOT NULL,
  `DOB` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Building` varchar(255) DEFAULT NULL,
  `Room` int(3) DEFAULT NULL,
  PRIMARY KEY (`ID`,`Name`),
  KEY `Building` (`Building`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`ID`, `Name`, `DOB`, `Email`, `Building`, `Room`) VALUES
(1231233, 'dfadsf', 'QRERQR', 'GFDGFS', 'Berry', 103),
(1231234, 'fadsf', '11/08/1994', 'adsf', 'McAlister', 342),
(10001000, 'lolol', '03/05/1983', 'lolol@lol.com', 'McAlister', 100),
(10015555, 'Tom Tommy', '07/20/1930', 'tommyt@g.cofc.edu', 'Berry', 201),
(20074056, 'Menny Benjamin', '08/09/98', 'benjaminm2@g.cofc.edu', 'McAlister', 231),
(23423234, '3234', '342342', '2342341', 'Berry', 12123),
(55556333, 'Jimmy Nuetron', '04/20/1985', 'nuetronjR@g.cofc.edu', 'Berry', 103),
(123234444, 'Clay Matthews', '02/16/1991', 'matthewsc@g.cofc.edu', 'Berry', 178),
(696969696, 'LongDongSilver', '6/6/66', 'buttnibbler69@hotmail.com', 'Berry', 69);

--
-- Triggers `Student`
--
DROP TRIGGER IF EXISTS `delete_guest_phone`;
DELIMITER //
CREATE TRIGGER `delete_guest_phone` BEFORE DELETE ON `Student`
 FOR EACH ROW BEGIN
DELETE FROM Guests WHERE StudentID = OLD.ID;
DELETE FROM Phone WHERE StudentID = OLD.ID;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `University`
--

CREATE TABLE IF NOT EXISTS `University` (
  `Name` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `University`
--

INSERT INTO `University` (`Name`, `State`, `Type`) VALUES
('College of Charleston', 'SC', 'Public'),
('College of Medicine', 'CA', 'Private'),
('Trident Tech', 'SC', 'Public');

--
-- Triggers `University`
--
DROP TRIGGER IF EXISTS `delete_building`;
DELIMITER //
CREATE TRIGGER `delete_building` BEFORE DELETE ON `University`
 FOR EACH ROW BEGIN
DELETE FROM Building WHERE University = OLD.Name;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `roommates`
--
DROP TABLE IF EXISTS `roommates`;

CREATE ALGORITHM=UNDEFINED DEFINER=`carsons5_csci332`@`localhost` SQL SECURITY DEFINER VIEW `roommates` AS select `Student`.`ID` AS `ID`,`Student`.`Name` AS `Name`,`Student`.`DOB` AS `DOB`,`Student`.`Email` AS `Email`,`Student`.`Building` AS `Building`,`Student`.`Room` AS `Room` from `Student` where ((`Student`.`Room` = 12123) and (`Student`.`Building` = 'Berry'));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Building`
--
ALTER TABLE `Building`
  ADD CONSTRAINT `Building_ibfk_1` FOREIGN KEY (`University`) REFERENCES `University` (`Name`);

--
-- Constraints for table `Guests`
--
ALTER TABLE `Guests`
  ADD CONSTRAINT `fk_StuGuests` FOREIGN KEY (`StudentID`) REFERENCES `Student` (`ID`);

--
-- Constraints for table `Major`
--
ALTER TABLE `Major`
  ADD CONSTRAINT `Major_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `Student` (`ID`);

--
-- Constraints for table `Phone`
--
ALTER TABLE `Phone`
  ADD CONSTRAINT `Phone_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `Student` (`ID`);

--
-- Constraints for table `Staff`
--
ALTER TABLE `Staff`
  ADD CONSTRAINT `Staff_ibfk_1` FOREIGN KEY (`Building`) REFERENCES `Building` (`Name`);

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`Building`) REFERENCES `Building` (`Name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
