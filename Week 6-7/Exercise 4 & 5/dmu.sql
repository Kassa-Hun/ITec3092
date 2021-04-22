-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2021 at 09:09 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BurieCampus`
--
DROP DATABASE IF EXISTS `BurieCampus`;
CREATE DATABASE IF NOT EXISTS `BurieCampus`;
USE `BurieCampus`;
-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `emailaddress` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `userId` varchar(15) NOT NULL,
  PRIMARY KEY (`emailaddress`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`emailaddress`, `password`, `role`, `status`, `userId`) VALUES
('admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 1, 'dmu4563'),
('headit@gmai.com', '81dc9bdb52d04dc20036dbd8313ed055', 'head', 1, 'dmu4563'),
('instructor1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'instructor', 1, 'dmu3563'),
('student1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'student', 1, 'TER_1032_09'),
('student2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'student', 1, 'TER_1232_10');

-- --------------------------------------------------------

--
-- Table structure for table `assignedcourse`
--

DROP TABLE IF EXISTS `assignedcourse`;
CREATE TABLE IF NOT EXISTS `assignedcourse` (
  `acId` int(11) NOT NULL,
  `instructorId` varchar(15) NOT NULL,
  `courseCode` varchar(20) NOT NULL,
  `courseStartedOn` date NOT NULL,
  `courseDuration` int(11) NOT NULL,
  `IsCourseCompleted` varchar(5) NOT NULL,
  `UploadedCourseMaterialPath` text NOT NULL,
  PRIMARY KEY (`acId`),
  KEY `courseCode` (`courseCode`),
  KEY `instructorId` (`instructorId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignedcourse`
--

INSERT INTO `assignedcourse` (`acId`, `instructorId`, `courseCode`, `courseStartedOn`, `courseDuration`, `IsCourseCompleted`, `UploadedCourseMaterialPath`) VALUES
(1, 'dmu3563', 'ITec3031', '2021-02-04', 4, '', 'uploadedCourseMaterialPath/ITec3031_chapter1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `courseCode` varchar(20) NOT NULL,
  `courseTitle` varchar(100) NOT NULL,
  `courseCreditHr` int(11) NOT NULL,
  `pre-requisite` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  PRIMARY KEY (`courseCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseCode`, `courseTitle`, `courseCreditHr`, `pre-requisite`, `year`, `semester`) VALUES
('ITec3031', 'Computer Maintenance', 4, '', 3, 1),
('ITec3041', 'Event-Driven Programming', 3, '', 3, 1),
('ITec3052', 'Advanced Programming', 3, 'ITec2052', 3, 1),
('ITec3092', 'Advanced Internet Programming', 3, 'ITec2051', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `deptId` int(11) NOT NULL,
  `deptName` varchar(150) NOT NULL,
  PRIMARY KEY (`deptId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptId`, `deptName`) VALUES
(1, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `head`
--

DROP TABLE IF EXISTS `head`;
CREATE TABLE IF NOT EXISTS `head` (
  `headId` int(11) NOT NULL,
  `empId` varchar(15) NOT NULL,
  `deptId` int(11) NOT NULL,
  PRIMARY KEY (`headId`),
  KEY `deptId` (`deptId`),
  KEY `empId` (`empId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `head`
--

INSERT INTO `head` (`headId`, `empId`, `deptId`) VALUES
(1, 'dmu4563', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `noticeId` int(11) NOT NULL,
  `noticeSubject` varchar(100) NOT NULL,
  `noticeContent` text NOT NULL,
  `noticeTo` varchar(100) NOT NULL,
  `postedDate` date NOT NULL,
  PRIMARY KEY (`noticeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`noticeId`, `noticeSubject`, `noticeContent`, `noticeTo`, `postedDate`) VALUES
(1, 'Call for meeting', 'Dear collegues;\r\n\r\nThere will be a meeting today afternoon at 2:00 PM with our school dean. Please avail your self at Hall-9.\r\n\r\nBE AWARE THAT ATTENDANCE IS MANDATORY!\r\n\r\nHead, IT Department ', 'instuctor', '2021-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `staff_student`
--

DROP TABLE IF EXISTS `staff_student`;
CREATE TABLE IF NOT EXISTS `staff_student` (
  `idNum` varchar(15) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `section` varchar(1) DEFAULT NULL,
  `deptId` int(11) NOT NULL,
  PRIMARY KEY (`idNum`),
  KEY `deptId` (`deptId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_student`
--

INSERT INTO `staff_student` (`idNum`, `firstName`, `lastName`, `year`, `section`, `deptId`) VALUES
('dmu3563', 'Samson', 'Lemma', NULL, NULL, 1),
('dmu4563', 'Likena', 'Tadesse', NULL, NULL, 1),
('dmu5563', 'Debebe', 'Melaku', NULL, NULL, 1),
('TER_1032_09', 'Bekele', 'Chalie', 3, 'B', 1),
('TER_1232_10', 'Terefu', 'Alemu', 3, 'B', 1),
('TER_1532_09', 'Aman', 'Demeke', 3, 'A', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `staff_student` (`idNum`);

--
-- Constraints for table `assignedcourse`
--
ALTER TABLE `assignedcourse`
  ADD CONSTRAINT `assignedcourse_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`),
  ADD CONSTRAINT `assignedcourse_ibfk_2` FOREIGN KEY (`instructorId`) REFERENCES `staff_student` (`idNum`);

--
-- Constraints for table `head`
--
ALTER TABLE `head`
  ADD CONSTRAINT `head_ibfk_1` FOREIGN KEY (`deptId`) REFERENCES `department` (`deptId`),
  ADD CONSTRAINT `head_ibfk_2` FOREIGN KEY (`empId`) REFERENCES `staff_student` (`idNum`);

--
-- Constraints for table `staff_student`
--
ALTER TABLE `staff_student`
  ADD CONSTRAINT `staff_student_ibfk_1` FOREIGN KEY (`deptId`) REFERENCES `department` (`deptId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
