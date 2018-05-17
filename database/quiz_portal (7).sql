-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 03:02 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`) VALUES
(1, 'csi_secret', 'unity');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ans_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ques_id` bigint(20) NOT NULL,
  `answer_provided` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ans_id`, `user_id`, `ques_id`, `answer_provided`) VALUES
(1209, 31, 89, 'CSI'),
(1211, 31, 88, 'siddharth yadav'),
(1212, 31, 87, 'Gandhinagar'),
(1213, 31, 90, 'Donald Trump');

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `option_id` bigint(20) NOT NULL,
  `ques_id` bigint(20) NOT NULL,
  `description` longtext NOT NULL,
  `image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`option_id`, `ques_id`, `description`, `image`) VALUES
(57, 87, 'Bharuch', NULL),
(58, 87, 'Gandhinagar', NULL),
(59, 87, 'surat', NULL),
(60, 87, 'vadodara', NULL),
(61, 88, 'pranav mukharji', NULL),
(62, 88, 'narendra modi', NULL),
(63, 88, 'siddharth yadav', NULL),
(64, 88, 'Ram nath kovind', NULL),
(65, 90, 'Obama', NULL),
(66, 90, 'mr. modi', NULL),
(67, 90, 'Donald Trump', NULL),
(68, 90, 'none', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ques_id` bigint(20) NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `description` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `has_options` tinyint(1) NOT NULL,
  `image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ques_id`, `quiz_id`, `description`, `answer`, `has_options`, `image`) VALUES
(87, 25, 'What is capital of gujrat', 'Gandhinagar', 4, NULL),
(88, 25, 'Who is president of india', 'Ram nath kovind', 4, NULL),
(89, 25, 'what if short form of COMPUTER SOCIETY OF INDIA', 'CSI', 0, NULL),
(90, 25, 'Who is president of america', 'Donald Trump', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` bigint(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `duration` bigint(20) NOT NULL,
  `is_available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `name`, `duration`, `is_available`) VALUES
(24, 'Quizophile', 7200, 1),
(25, 'coading Quiz', 3600, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` longtext NOT NULL,
  `password` varchar(50) NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `time_started` bigint(20) DEFAULT NULL,
  `time_completed` bigint(20) DEFAULT NULL,
  `time_elapsed` bigint(20) DEFAULT NULL,
  `score` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `firstname`, `lastname`, `password`, `quiz_id`, `time_started`, `time_completed`, `time_elapsed`, `score`) VALUES
(26, 'sid', 'Siddharth', 'Yadav', 'sid123', 24, 1526560602549, 1526560717222, 114, 0),
(27, 'anmol', 'anmol', 'Saxena', 'anmol123', 24, NULL, NULL, NULL, 0),
(28, 'mohit', 'mohit', '', 'mohit123', 24, NULL, NULL, NULL, 0),
(29, 'arshit', 'arshit', 'vaghasiya', 'arshit123', 24, NULL, NULL, NULL, 0),
(30, 'rachit', 'rachit', 'shah', 'rachit123', 24, NULL, NULL, NULL, 0),
(31, 'sid', 'Siddharth', 'Yadav', 'sid123', 25, 1526561858643, 1526562025358, 164, 3),
(32, 'anmol', 'anmol', 'Saxena', 'anmol123', 25, NULL, NULL, NULL, 0),
(33, 'mohit', 'mohit', '', 'mohit123', 25, NULL, NULL, NULL, 0),
(34, 'arshit', 'arshit', 'vaghasiya', 'arshit123', 25, NULL, NULL, NULL, 0),
(35, 'rachit', 'rachit', 'shah', 'rachit123', 25, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ans_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`,`ques_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ques_id` (`ques_id`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `ques_id` (`ques_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ques_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ans_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1218;
--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `option_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ques_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_question` FOREIGN KEY (`ques_id`) REFERENCES `question` (`ques_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `option_question` FOREIGN KEY (`ques_id`) REFERENCES `question` (`ques_id`) ON DELETE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
