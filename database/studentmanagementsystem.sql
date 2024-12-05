-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 05, 2024 at 05:39 AM
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
(6, 3, 4, 2.00),
(8, 5, 5, 1.25),
(10, 8, 3, 1.50),
(18, 2, 3, 2.50),
(20, 3, 3, NULL),
(21, 7, 3, NULL),
(22, 8, 3, NULL),
(25, 4, 6, 1.25),
(26, 4, 12, NULL);

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
(1, 'English 1', 'Hello neighborhood'),
(2, 'Filipino 2', 'dsdadasd'),
(3, 'Math 4', 'dsadasdsada'),
(4, 'Computer Programming', 'esfewf esefsdf'),
(5, 'CS Elective 1', 'sdaddasd dsadas'),
(7, 'Object Oriented Programming (OOP)', 'dsad dasda '),
(8, 'Algorithm Complexity', 'dfsfsd fsdf sdfsd'),
(9, 'Intro to Computing', 'qwdqwdwd'),
(13, 'Application Development', 'dawdawdaw');

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
  `role` enum('Admin','Student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `mobile_number`, `email`, `password`, `role`) VALUES
(1, 'Lexical', 'Taladris', '09669727839', 'laxustaladro@yahoo.com', '123', 'Admin'),
(3, 'Erroll', 'Montalvo', '09669727834', 'Erroll@gmail.com', '$2y$10$zxTgJp7CqalzcFci87nYmeAKMjzCVsAKyv5REPmTc4DCUiY7d.6my', 'Student'),
(4, 'Ronald', 'Palo', '09669447833', 'Nald@yahoo.com', '12345', 'Student'),
(5, 'Juan Carlos', 'Gonzalalez', '09669837839', 'JuanCarlos@yahoo.com', 'jc1234', 'Student'),
(6, 'Patrick John', 'Maigue', '09479727839', 'patrick@gmail.com', 'tricks12', 'Student'),
(10, 'Man', 'Sok', '1212123', 'www@gmail.com', 'dq2q2dacadsd', ''),
(12, 'qwdqw', 'qwdqwd', '212312123', 'qwdwdqwd@gmail.com', 'qeq2eqsadwd', 'Student'),
(13, 'qwdqw', 'eq2eq', '12123123', 'qweqeqweqwe@gmail.com', 'wadadawd', 'Student'),
(14, 'qwdqw', 'eqweq', '21312131', 'qwewqeqweqwe@gmail.com', 'wadadawd', 'Student'),
(17, 'Tyler', 'Durden', '915463287', 'imhim@gmail.com', '$2y$10$lbe/XuLL2yWnI58oZ2oR6OdxDXXUhXdimctZcR3T0Q/gqWcsRswgq', 'Student'),
(20, '123', '123', '123', '123@gmail.com', '$2y$10$plSU1zpVURcAs6EfM.Lh.eQh/C55jfjtBTuehR.520TreFt8QHcLm', 'Admin');

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
  MODIFY `grades_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
