-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2016 at 05:03 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmpe226`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentrecord_assignment1`
--

CREATE TABLE IF NOT EXISTS `studentrecord_assignment1` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL DEFAULT 'Computer Science',
  `courses` varchar(255) NOT NULL,
  `p_langs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentrecord_assignment1`
--

INSERT INTO `studentrecord_assignment1` (`first_name`, `last_name`, `student_id`, `dept`, `courses`, `p_langs`) VALUES
('somya', 'aggarwal', '12432', 'Computer Science', 'databases', 'cpp,python'),
('Haritha', '', '010121213', 'Software Engineering', 'Cmpe226,Cmpe273', 'JAVA,C'),
('chris ', 'rehfeld', '010121212', 'General Engineering', 'Cmpe202,Cmpe203', 'PHP,AJAX'),
('Reshma', '', '01019191', 'Mechanical Engineering', 'Cmpe280,Cmpe206', 'JAVA'),
('Ed', 'Hunt', '0987123', 'Computer Science', 'Cmpe202', 'AJAX,PHP'),
('Bella', 'Wells', '87193030', 'Software Engineering', 'Cmpe202,Cmpe273,Cmpe275', 'GO,PYTHON'),
('Richard', 'Jule', '19847492', 'General Engineering', 'Cmpe275', 'JAVA,GO'),
('Saurabh ', 'Gupta', '01018374', 'Computer Science', 'Cmpe280,Cmpe287', 'JAVA,C,AJAX'),
('Ron', 'Mak', '123499887', 'Software Engineering', 'Cmpe202,Cmpe275', 'PHP,GO'),
('Harry', 'Ban', '873623923', 'Mechanical Engineering', 'Cmpe280', 'C++,C');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
