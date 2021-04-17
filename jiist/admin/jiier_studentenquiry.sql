-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 01:20 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galaxyjiier`
--

-- --------------------------------------------------------

--
-- Table structure for table `jiier_studentenquiry`
--

CREATE TABLE `jiier_studentenquiry` (
  `id` int(250) NOT NULL,
  `name` varchar(500) NOT NULL,
  `father` varchar(500) NOT NULL,
  `mother` varchar(500) NOT NULL,
  `nationality` varchar(500) NOT NULL,
  `religion` varchar(500) NOT NULL,
  `medium` varchar(500) NOT NULL,
  `blood` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` varchar(500) NOT NULL,
  `employed` varchar(500) NOT NULL,
  `physically` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `course` varchar(500) NOT NULL,
  `discipline` varchar(500) NOT NULL,
  `enrolment` varchar(500) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `centre_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jiier_studentenquiry`
--

INSERT INTO `jiier_studentenquiry` (`id`, `name`, `father`, `mother`, `nationality`, `religion`, `medium`, `blood`, `gender`, `dob`, `employed`, `physically`, `phone`, `course`, `discipline`, `enrolment`, `address`, `centre_id`) VALUES
(1, 'abi', 'fff', 'ff', 'india', 'gggg', 'english', 'ff', 'hdght', '5-3-1994', 'ff', 'ff', '01234536789', 'bbb', 'yes', 'fff', 'xscvcv', 0),
(2, 'abi', 'fff', 'ff', 'sdd', 'hgjkhkjk', 'fhjfh', 'ff', 'hdght', '5-3-1994', 'ff', 'ff', '01234536789', 'bbb', 'bbb', 'fff', 'xscvcv', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jiier_studentenquiry`
--
ALTER TABLE `jiier_studentenquiry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jiier_studentenquiry`
--
ALTER TABLE `jiier_studentenquiry`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
