-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 09, 2025 at 03:35 AM
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
(5, 'Juan Carlos', 'Gonzalez', '09669837839', 'JuanCarlos@yahoo.com', '$2y$10$Tvw4FDNznNdlFTaRwuyTouOssa2GRWEpQAAHezZJeIntj9TNsc1xK', 'Student', NULL, NULL, 0),
(6, 'Patrick John', 'Maigue', '09479727839', 'patrick@gmail.com', '$2y$10$B5t5XoIZ2M7qYaqrgGFp4.XHfg4G3LZ4Qe38yYglNk2L/O9i9hF2q', 'Student', NULL, NULL, 0),
(10, 'Man', 'Sok', '1212123', 'www@gmail.com', 'dq2q2dacadsd', '', NULL, NULL, 0),
(17, 'Tyler', 'Durden', '915463287', 'imhim@gmail.com', '$2y$10$zqPHpycnZYxhnzhZSP.eD.6lfx7fWGiJITmHEQ4bRbUDrC2LLtIly', 'Student', NULL, NULL, 0),
(20, '123', '123', '123', '123@gmail.com', '$2y$10$plSU1zpVURcAs6EfM.Lh.eQh/C55jfjtBTuehR.520TreFt8QHcLm', 'Admin', NULL, NULL, 0),
(22, 'Tito', 'Taladro', '09639737856', 'PSU@palawan.com', '$2y$10$HR4Lv9CdZLZ.RN.kNd52GOQ663epes7CGV6FeFbSwNuruMdWFOWn6', 'Admin', NULL, NULL, 0),
(24, 'Lexical', 'Analysis', '12312312312', 'lexical@yahoo.com', '$2y$10$IIw2JWEtZBQtXHA0rKcfyu/xXaoURLAMl5pPYjnsr6BzYF3e9IqtS', 'Student', NULL, NULL, 0),
(25, 'tester', '123', '09129025593', 'tester@gmail.com', '$2y$10$wdAVImM/oEJHOPmrCyLKWOVLQ.sbMx1eG2gspP0y8ZM8cxVTYvzYq', 'Admin', NULL, NULL, 0),
(26, 'lexus', 'taladro', '9879025591', 'lexus@yahoo.com', '$2y$10$OM5avtH43AKTWcefFzmTseZAdgqd8P7V.qP7SbDkSGWrJmBOquU2u', 'Student', NULL, NULL, 0),
(29, 'admin', 'admin', '1234566789', 'admin@gmail.com', '$2y$10$RISiCHqgqj4h/yMeDWlWbO8Uymto6/HeO1xnVuPTahK/4jAXsd92q', 'Admin', '280478', '2025-04-03 11:26:10', 0),
(31, 'Lexus', 'Taladro', '09669727839', 'laxustaladro@gmail.com', '$2y$10$VOZh4RHU3hH5bg4u1KxPE.lq7qqZ75eiNJf8kz769xk2sZxRCmPOW', 'Admin', NULL, NULL, 0),
(32, 'Jan Ronald', 'Palo', '9129025591', 'ronaldkun999@gmail.com', '$2y$10$N5sp2bVg2C7Ws7jm8RKcX.PuBJ7ZzVKEb4hB3L152SI9Qnt0sIlJ.', 'Student', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
