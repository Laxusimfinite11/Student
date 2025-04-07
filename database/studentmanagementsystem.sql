-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 03, 2025 at 01:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grades_id` int(5) NOT NULL,
  `subject_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `grades` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grades_id`, `subject_id`, `user_id`, `grades`) VALUES
(5, 4, 3, 2.50),
(6, 3, 4, 5.00),
(8, 5, 5, 1.25),
(20, 3, 3, 1.50),
(21, 7, 3, 1.00),
(25, 4, 6, 1.25),
(28, 5, 24, 1.25),
(29, 4, 24, 1.50),
(30, 13, 24, 1.75),
(31, 7, 24, 1.25),
(32, 3, 26, 4.00),
(33, 13, 26, 2.00),
(34, 9, 26, 1.25),
(35, 7, 26, 1.25),
(36, 5, 26, 3.00),
(37, 18, 26, 5.00),
(38, 22, 26, 0.00),
(39, 4, 17, 1.00),
(41, 14, 3, 5.00),
(42, 2, 3, 1.25);

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `otp_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `otp_code` varchar(6) NOT NULL,
  `expiry_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` int(5) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `name`, `description`) VALUES
(1, 'Intensive English Review', 'Intensive English Review is improving English skills.'),
(2, 'Discrete 1', 'Discrete 1 is a math course focusing on discrete structures like sets, graphs, and logic.'),
(3, 'Math Elective', 'Math Elective is a specialized math course.'),
(4, 'Computer Programming', 'Computer programming is creating software.'),
(5, 'CS Elective 1', 'CS Elective 1 is a specialized computer science course.'),
(7, 'Object Oriented Programming (OOP)', 'OOP is a programming paradigm that organizes software design around objects, which combine data and behavior.'),
(8, 'Algorithm Complexity', 'Algorithm complexity measures how efficient an algorithm is.'),
(9, 'Intro to Computing', 'Intro to computing is learning about computers.'),
(13, 'Application Development', 'Application development is creating software apps.'),
(14, 'Palawan Study', 'Palawan Studies explores the history, culture, and environment of Palawan, Philippines.'),
(15, 'Data Structure and Algorithms', 'Data Structures and Algorithms is about organizing data and creating efficient algorithms to solve problems.'),
(16, 'Networks and Communications', 'Networks and Communications is about connecting devices.'),
(17, 'Computational Science', 'Computational science uses computers to solve complex problems.'),
(18, 'Fundamentals in Electronics', 'Fundamentals in Electronics is about understanding basic electronic circuits and components.'),
(19, 'Architecture and Organizations', 'Architecture and Organizations is about system design.'),
(20, 'Information Management', 'Information management is about organizing and using information effectively.'),
(21, 'Advances Database Systems', 'Advanced Database Systems is about studying complex database systems and their advanced features.'),
(22, 'Programming Languages', 'Programming languages are tools for creating software.'),
(23, 'Software Engineering 1', 'Software Engineering 1 is about building software systematically.'),
(24, 'Software Engineering 2', 'Software Engineering 2 is about advanced software development practices.'),
(25, 'Information Assurance and Security', 'Information Assurance and Security is about protecting information and systems from threats.'),
(26, 'Digital Image Processing', 'Digital Image Processing is about manipulating digital images.'),
(27, 'Human Computer Interaction', 'HCI is about designing user-friendly interfaces.'),
(28, 'Proposal Writing', 'Proposal writing is creating a document to propose an idea or plan for a thesis.'),
(29, 'Web Systems and Technologies', 'Web Systems and Technologies is about building websites and web applications.'),
(30, 'Practicum', 'Practicum is hands-on learning experience.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `mobile_number` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Admin','Student') NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `otp_expiry` datetime DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `mobile_number`, `email`, `password`, `role`, `otp`, `otp_expiry`, `is_verified`) VALUES
(3, 'Erroll', 'Montalvo', '09669727834', 'Erroll@gmail.com', '$2y$10$sLnhbjmzCU.AUaGd8V1DCO64XaTpw0Fwgk4D5iTCuHcNRUQDF.K/i', 'Student', NULL, NULL, 0),
(4, 'Ronald', 'Palo', '09669447833', 'Nald@yahoo.com', '$2y$10$.njzdnP0KX/S7dfJ36wtle6wVBfod.GVuFZw31cgDTveKu9S4Nna.', 'Student', NULL, NULL, 0),
(5, 'Juan Carlos', 'Gonzalez', '09669837839', 'JuanCarlos@yahoo.com', '$2y$10$Tvw4FDNznNdlFTaRwuyTouOssa2GRWEpQAAHezZJeIntj9TNsc1xK', 'Student', NULL, NULL, 0),
(6, 'Patrick John', 'Maigue', '09479727839', 'patrick@gmail.com', '$2y$10$B5t5XoIZ2M7qYaqrgGFp4.XHfg4G3LZ4Qe38yYglNk2L/O9i9hF2q', 'Student', NULL, NULL, 0),
(10, 'Man', 'Sok', '1212123', 'www@gmail.com', 'dq2q2dacadsd', '', NULL, NULL, 0),
(17, 'Tyler', 'Durden', '915463287', 'imhim@gmail.com', '$2y$10$zqPHpycnZYxhnzhZSP.eD.6lfx7fWGiJITmHEQ4bRbUDrC2LLtIly', 'Student', NULL, NULL, 0),
(20, '123', '123', '123', '123@gmail.com', '$2y$10$plSU1zpVURcAs6EfM.Lh.eQh/C55jfjtBTuehR.520TreFt8QHcLm', 'Admin', NULL, NULL, 0),
(22, 'Tito', 'Taladro', '09639737856', 'PSU@palawan.com', '$2y$10$HR4Lv9CdZLZ.RN.kNd52GOQ663epes7CGV6FeFbSwNuruMdWFOWn6', 'Admin', NULL, NULL, 0),
(24, 'Lexical', 'Analysis', '12312312312', 'lexical@yahoo.com', '$2y$10$IIw2JWEtZBQtXHA0rKcfyu/xXaoURLAMl5pPYjnsr6BzYF3e9IqtS', 'Student', NULL, NULL, 0),
(25, 'tester', '123', '09129025593', 'tester@gmail.com', '$2y$10$wdAVImM/oEJHOPmrCyLKWOVLQ.sbMx1eG2gspP0y8ZM8cxVTYvzYq', 'Admin', NULL, NULL, 0),
(26, 'lexus', 'taladro', '9879025591', 'lexus@yahoo.com', '$2y$10$OM5avtH43AKTWcefFzmTseZAdgqd8P7V.qP7SbDkSGWrJmBOquU2u', 'Student', NULL, NULL, 0),
(27, 'College of Science', 'Office', '63917123456', 'CS@palawan.com', '$2y$10$5sVfXkpvRIg8BPaEv4uqHOWJnouhzowkhkiD2mzNaVbYx7nKD/AZy', 'Admin', NULL, NULL, 0),
(29, 'admin', 'admin', '1234566789', 'admin@gmail.com', '$2y$10$RISiCHqgqj4h/yMeDWlWbO8Uymto6/HeO1xnVuPTahK/4jAXsd92q', 'Admin', '280478', '2025-04-03 11:26:10', 0),
(30, 'Mar', 'Mar', '978564545', 'mar@gmail.com', '$2y$10$WTqOmz53MCt0lNIVzxWVLOq0es6mYsgzqj6RZxs82ok3XnOdtlPmK', 'Student', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grades_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`otp_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grades_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `otp_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `otp`
--
ALTER TABLE `otp`
  ADD CONSTRAINT `otp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
