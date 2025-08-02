-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 08:58 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aca_votingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_details`
--

CREATE TABLE `candidate_details` (
  `can_id` int(10) NOT NULL,
  `can_img` varchar(300) NOT NULL,
  `can_name` varchar(300) NOT NULL,
  `can_course` varchar(300) NOT NULL,
  `can_sem` varchar(300) NOT NULL,
  `can_vote` int(10) NOT NULL,
  `can_status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gs_details`
--

CREATE TABLE `gs_details` (
  `gs_id` int(10) NOT NULL,
  `can_id` int(10) DEFAULT NULL,
  `can_name` varchar(300) NOT NULL,
  `can_course` varchar(300) NOT NULL,
  `can_sem` varchar(300) NOT NULL,
  `can_vote` int(10) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `home_details`
--

CREATE TABLE `home_details` (
  `home_id` int(10) NOT NULL,
  `home_img1` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_details`
--

INSERT INTO `home_details` (`home_id`, `home_img1`) VALUES
(1, '20220815130151.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `stud_id` int(10) NOT NULL,
  `stud_name` varchar(300) NOT NULL,
  `stud_email` varchar(300) DEFAULT NULL,
  `stud_regno` varchar(300) DEFAULT NULL,
  `stud_course` varchar(300) NOT NULL,
  `stud_sem` varchar(300) NOT NULL,
  `stud_vote_status` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_ph` varchar(100) NOT NULL,
  `user_course` varchar(100) NOT NULL,
  `user_sem` varchar(100) NOT NULL,
  `user_reg` varchar(100) NOT NULL,
  `user_gen` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_ph`, `user_course`, `user_sem`, `user_reg`, `user_gen`) VALUES
(1, 'admin', '', '12345', '', '', '', '', ''),
(2, 'royal', 'royal.rods@gmail.com', '123', '12345', 'B.C.A', 'First', '125689', 'm'),
(4, 'Megha', 'www@wwww', '123', '123', 'B.C.A', 'Fifth', '24186007', 'female'),
(5, 'Prashanti Raikar', 'prashanti@gmail.com', '123', '123', 'B.C.A', 'Fifth', '24003007', 'female'),
(6, 'kavya', 'kavya@gmail.com', '123', '123', 'B.C.A', 'Fifth', '24003007', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_details`
--
ALTER TABLE `candidate_details`
  ADD PRIMARY KEY (`can_id`);

--
-- Indexes for table `gs_details`
--
ALTER TABLE `gs_details`
  ADD PRIMARY KEY (`gs_id`);

--
-- Indexes for table `home_details`
--
ALTER TABLE `home_details`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_details`
--
ALTER TABLE `candidate_details`
  MODIFY `can_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gs_details`
--
ALTER TABLE `gs_details`
  MODIFY `gs_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_details`
--
ALTER TABLE `home_details`
  MODIFY `home_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `stud_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
