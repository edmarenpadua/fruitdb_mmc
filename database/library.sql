-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2013 at 12:50 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database1`
--
CREATE DATABASE IF NOT EXISTS `database1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `database1`;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `bday` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fname`, `lname`, `bday`, `mobile`, `email`, `password`) VALUES
(1, 'Ryben', 'Bene3dicto3', '1994-11-06', '+63923214304823', 'reybenedicto06@yahoo.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');
--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` varchar(15) NOT NULL,
  `book_title` varchar(30) NOT NULL,
  `book_author` varchar(30) NOT NULL,
  `year_published` int(4) NOT NULL,
  `state` varchar(10) NOT NULL,
  `return_date` date DEFAULT NULL,
  `borrower_id` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `book_author`, `year_published`, `state`, `return_date`, `borrower_id`) VALUES
('cxa209', '3D Design and Animation', 'James McDane', 1995, 'reserved', NULL, '2010-33727'),
('dec123', 'Database Systems', 'Marcus Smith', 2002, 'reserved', '0000-00-00', '2010-33727'),
('dec279', 'Finite States', 'Samantha Williams', 1997, 'reserved', NULL, '2011-31255'),
('des542', 'Matrix and Trees', 'Bernadette Cobwell', 2000, 'reserved', '0000-00-00', '2009-34521'),
('fdg236', 'Simple Animations', 'James McDane', 1999, 'borrowed', '2013-09-24', '2010-43213'),
('gas216', 'Scripting Languages', 'Alberto Graham', 1996, 'reserved', '0000-00-00', '2011-31255'),
('ghd215', 'Perl: Introduction', 'Larry Wall', 1990, 'borrowed', '2013-10-03', '2009-34521'),
('hjr213', 'CSS for Beginners', 'Martin Gostoni Jr', 2001, 'available', '0000-00-00', ''),
('klq219', 'Functional Languages', 'Derek Ivern', 1990, 'available', NULL, NULL),
('ref456', 'Assembly x86', 'Horris Parker', 1989, 'borrowed', '2013-10-23', '2009-34521'),
('ygf678', 'Histogram Manipulation', 'Dianna Underwood', 2000, 'available', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE IF NOT EXISTS `borrower` (
  `borrower_id` varchar(15) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  PRIMARY KEY (`borrower_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`borrower_id`, `fname`, `lname`, `type`, `email`, `mobile`) VALUES
('2006-12345', 'Jana', 'Hernandez', 'faculty', 'teacher12@yahoo.com', '09368735241'),
('2009-34521', 'Rein', 'Garcia', 'faculty', 'niergarcia@yahoo.com', '09123476532'),
('2010-33727', 'Lareng', 'Arcilla', 'student', 'mrbcarcilla@gmail.com', '09232143048'),
('2010-43213', 'Vincent', 'Marquez', 'student', 'vince23@gmail.com', '09271298564'),
('2011-21369', 'Cj', 'Ramos', 'student', 'cj.ramos27@gmail.com', '09058473354'),
('2011-31255', 'Harland', 'Balucating', 'student', 'hbalucz@gmail.com', '09121234456'),
('2011-31260', 'Rey', 'Benedicto', 'student', 'reybenedicto07@yahoo.com', '09232143048');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE IF NOT EXISTS `librarian` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`username`, `password`) VALUES
('username', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
