-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 22, 2025 at 03:16 PM
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
(43, 3, 32, 1.25),
(44, 7, 32, 2.00),
(45, 14, 32, 2.50),
(46, 15, 32, 4.00);

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

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`otp_id`, `user_id`, `otp_code`, `expiry_time`) VALUES
(1, 31, '502378', '2025-04-07 11:17:04'),
(2, 31, '348955', '2025-04-07 11:21:43'),
(3, 31, '138391', '2025-04-07 11:23:38'),
(4, 31, '928086', '2025-04-07 11:41:41'),
(5, 31, '720062', '2025-04-07 11:50:50'),
(6, 31, '149542', '2025-04-07 16:28:28'),
(7, 31, '666123', '2025-04-07 16:28:38'),
(8, 31, '927454', '2025-04-07 16:31:22'),
(9, 31, '539556', '2025-04-07 16:34:46'),
(10, 31, '692032', '2025-04-07 16:37:33'),
(11, 31, '944204', '2025-04-07 16:42:29'),
(12, 31, '908032', '2025-04-07 16:50:09'),
(13, 31, '891300', '2025-04-07 16:50:58'),
(14, 31, '774499', '2025-04-07 16:52:17'),
(15, 31, '695282', '2025-04-07 16:52:38'),
(16, 31, '667446', '2025-04-07 16:53:07'),
(17, 31, '408600', '2025-04-07 16:57:03'),
(18, 31, '417236', '2025-04-07 16:57:28'),
(19, 31, '282630', '2025-04-07 17:05:12'),
(20, 31, '676638', '2025-04-07 17:13:01'),
(21, 31, '473369', '2025-04-07 17:14:23'),
(22, 31, '281172', '2025-04-07 17:15:26'),
(23, 31, '835410', '2025-04-07 17:16:06'),
(24, 31, '263544', '2025-04-07 17:20:01'),
(25, 31, '229745', '2025-04-07 17:20:49'),
(26, 31, '274102', '2025-04-07 17:21:42'),
(27, 31, '204634', '2025-04-07 17:28:03'),
(28, 31, '103714', '2025-04-07 17:33:38'),
(29, 31, '654865', '2025-04-07 17:34:36'),
(30, 31, '654707', '2025-04-07 17:39:15'),
(31, 31, '364330', '2025-04-07 17:40:34'),
(32, 31, '719206', '2025-04-09 03:15:37'),
(33, 31, '217864', '2025-04-09 04:10:00'),
(34, 31, '271099', '2025-04-09 04:13:06'),
(35, 31, '319895', '2025-04-09 06:53:34'),
(36, 31, '724243', '2025-04-09 06:55:52'),
(37, 31, '312067', '2025-04-09 07:30:05'),
(38, 31, '289269', '2025-04-09 07:35:51'),
(39, 31, '391777', '2025-04-09 07:42:16'),
(40, 31, '606185', '2025-04-09 08:06:19'),
(41, 31, '287666', '2025-04-09 08:06:42'),
(42, 31, '884229', '2025-04-09 08:08:10'),
(43, 31, '758966', '2025-04-09 08:09:08'),
(44, 31, '204660', '2025-04-09 08:10:38'),
(45, 31, '374356', '2025-04-09 08:20:33'),
(46, 31, '889575', '2025-04-09 08:23:14'),
(47, 31, '892316', '2025-04-09 08:25:57'),
(48, 31, '102379', '2025-04-09 08:26:12'),
(49, 31, '578763', '2025-04-09 08:28:09'),
(50, 31, '454438', '2025-04-09 08:30:38'),
(51, 31, '553717', '2025-04-09 08:41:49'),
(52, 31, '287517', '2025-04-09 08:42:03'),
(53, 31, '690644', '2025-04-09 08:43:54'),
(54, 31, '356690', '2025-04-09 08:45:06'),
(55, 31, '728873', '2025-04-09 08:45:27'),
(56, 31, '260416', '2025-04-09 08:45:42'),
(57, 31, '933943', '2025-04-09 11:12:14'),
(58, 31, '319998', '2025-04-09 11:12:24'),
(59, 31, '500078', '2025-04-09 12:12:14'),
(60, 31, '888453', '2025-04-09 12:12:34'),
(61, 31, '794357', '2025-04-09 12:18:27'),
(62, 31, '717598', '2025-04-09 12:27:29'),
(63, 32, '524061', '2025-04-09 13:09:55'),
(64, 31, '694081', '2025-04-09 13:10:38'),
(65, 32, '817049', '2025-04-09 13:16:25'),
(66, 32, '462589', '2025-04-09 13:21:18'),
(67, 31, '933621', '2025-04-09 13:22:47'),
(68, 31, '212284', '2025-04-09 13:23:24'),
(69, 31, '193453', '2025-04-09 13:26:11'),
(70, 34, '448988', '2025-04-09 13:27:44'),
(71, 31, '759364', '2025-04-10 05:45:17'),
(72, 31, '568484', '2025-04-10 12:53:02'),
(73, 31, '831204', '2025-04-10 12:57:33'),
(74, 31, '432662', '2025-04-14 03:59:29'),
(75, 31, '869937', '2025-04-14 04:04:01'),
(76, 31, '719270', '2025-04-14 04:14:39'),
(77, 31, '248698', '2025-04-14 04:20:07'),
(78, 31, '697196', '2025-04-14 04:31:52'),
(79, 31, '813631', '2025-04-14 04:35:31'),
(80, 31, '737250', '2025-04-14 04:36:48'),
(81, 34, '181475', '2025-04-14 17:43:15'),
(82, 34, '586988', '2025-04-14 17:44:12'),
(83, 31, '768221', '2025-04-15 02:04:03'),
(84, 31, '227323', '2025-04-16 04:14:08'),
(85, 34, '872252', '2025-04-16 07:10:39'),
(86, 34, '822226', '2025-04-16 12:45:54'),
(87, 34, '138432', '2025-04-16 12:46:57'),
(88, 31, '919473', '2025-04-21 08:50:19'),
(89, 34, '602754', '2025-04-21 08:54:01'),
(90, 34, '659018', '2025-04-21 08:54:44'),
(91, 34, '228693', '2025-04-21 08:54:51'),
(92, 34, '202321', '2025-04-21 08:59:35'),
(93, 31, '674036', '2025-04-21 09:03:29'),
(94, 34, '125404', '2025-04-21 09:07:14'),
(95, 31, '293440', '2025-04-22 11:25:39');

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
  `is_verified` tinyint(1) DEFAULT 1,
  `otp_enabled` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `mobile_number`, `email`, `password`, `role`, `otp`, `otp_expiry`, `is_verified`, `otp_enabled`) VALUES
(31, 'Lexus', 'Taladro', '09669727839', 'laxustaladro@gmail.com', '$2y$10$VOZh4RHU3hH5bg4u1KxPE.lq7qqZ75eiNJf8kz769xk2sZxRCmPOW', 'Admin', NULL, NULL, 0, 0),
(32, 'Jan Ronald', 'Palo', '9129025591', 'ronaldkun999@gmail.com', '$2y$10$N5sp2bVg2C7Ws7jm8RKcX.PuBJ7ZzVKEb4hB3L152SI9Qnt0sIlJ.', 'Student', NULL, NULL, 0, 1),
(34, 'Lexus', 'Taladro', '9129025568', '202280017@psu.palawan.edu.ph', '$2y$10$iz9R15.fxz46/JSv16ooO.faT.8S51SOTceWl07UGWM9VWnSDI3gC', 'Student', NULL, NULL, 0, 1),
(35, 'Erroll', 'Montalvo', '9129095591', '202280029@psu.palawan.edu.ph', '$2y$10$Yyza6.hJuXR4xl8Y2cnqzuJcnbULQJpCsNkvDztOnTnE06y9XKeme', 'Student', NULL, NULL, 0, 1),
(36, 'Juan Carlos ', 'Gonzalez', '9145025591', '202280393@psu.palawan.edu.ph', '$2y$10$xHgzN/wYXuzeJB2Ql57/E.TCfXzkFIUt5janoDk6TKF2X.0Bks1w.', 'Student', NULL, NULL, 0, 1),
(37, 'Spledelyn Christine', 'Recarze', '9129465591', '202280045@psu.palawan.edu.ph', '$2y$10$Lgyi6dlI7MlfooKNbdX0ue7hMhICk2UuYZWbJ0nzlW11nblZE7LYW', 'Student', NULL, NULL, 0, 1),
(42, 'Lexical', 'tal', '9129027291', 'temp@yahoo.com', '$2y$10$teyTJGAHhpmgPlnSUJfyaOYRfOBv69a5N7OoZ5esNtxb/5k9n5Hzq', 'Student', NULL, NULL, 0, 1),
(51, 'John', 'Doe', '09123456789', 'john.doe@example.com', 'hashedpassword', 'Admin', NULL, NULL, 0, 1),
(52, 'Juan Carlos', 'Gonzalez', '9129022891', 'jaevel04@gmail.com', '$2y$10$I93cs/vKqbtVASyiSMMZCe80Iwl/37Vz3LJzojj4k8i.mLI43VlwO', 'Admin', NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_activity_log`
--

CREATE TABLE `user_activity_log` (
  `activity_id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `activity_type` varchar(100) NOT NULL,
  `activity_description` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_activity_log`
--

INSERT INTO `user_activity_log` (`activity_id`, `user_id`, `activity_type`, `activity_description`, `ip_address`, `user_agent`, `created_at`) VALUES
(9, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 10:15:05'),
(10, 31, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 10:15:24'),
(11, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 10:26:50'),
(12, 31, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 10:27:09'),
(14, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 10:30:29'),
(15, 31, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 10:30:48'),
(16, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 10:30:50'),
(17, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 10:31:46'),
(18, 31, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 10:32:02'),
(19, 31, 'Add Admin', 'New admin account created successfully by Lexus Taladro. User Spled recarze assigned administrative privileges.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 10:53:38'),
(20, 31, 'Add Student', 'New student record added by Lexus Taladro. Student \'Lexical tal\' has been successfully registered in the system.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 11:04:27'),
(21, 31, 'Edit Admin', 'Admin account for Tito Taladro was updated by . Fields changed: Last Name.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 21:47:56'),
(22, 31, 'Edit Admin', 'Admin account for Laxus Taladro was updated by Lexus Taladro. Fields changed: First Name.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 21:49:39'),
(25, 31, 'Add Admin', 'New admin account created successfully by . User Spledelyn recarze assigned administrative privileges.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 22:21:41'),
(27, 31, 'Add Admin', 'New admin account created successfully by Lexus Taladro. User Spled lance assigned administrative privileges.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 22:35:56'),
(35, 31, 'Delete Admin', 'Admin account for John Doe was deleted by Lexus Taladro.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 22:58:25'),
(36, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 23:38:07'),
(37, 34, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 23:38:12'),
(38, 34, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 23:39:04'),
(39, 34, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 23:39:10'),
(40, 34, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 23:39:41'),
(41, 34, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-15 07:58:58'),
(42, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-15 07:59:01'),
(43, 31, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-15 07:59:21'),
(44, 31, 'Delete Admin', 'Admin account for Laxus Taladro was deleted by Lexus Taladro.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-15 07:59:39'),
(45, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-16 10:09:04'),
(46, 31, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-16 10:09:24'),
(47, 34, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-16 13:05:37'),
(48, 34, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-16 13:05:54'),
(49, 34, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-16 18:40:49'),
(50, 34, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-16 18:40:53'),
(51, 34, 'OTP Verification Failed', 'User entered an incorrect or expired OTP.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-16 18:41:58'),
(52, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-21 14:45:11'),
(53, 31, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-21 14:45:45'),
(54, 34, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-21 14:48:58'),
(55, 34, 'OTP Verification Failed', 'User entered an incorrect or expired OTP.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-21 14:49:49'),
(56, 34, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-21 14:50:33'),
(57, 34, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-21 14:52:30'),
(58, 34, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', '2025-04-21 14:54:32'),
(59, 34, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', '2025-04-21 14:54:57'),
(60, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', '2025-04-21 14:58:25'),
(61, 31, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', '2025-04-21 14:58:51'),
(62, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-21 15:00:32'),
(63, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', '2025-04-21 15:01:49'),
(64, 34, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', '2025-04-21 15:01:58'),
(65, 34, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', '2025-04-21 15:03:04'),
(66, 34, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', '2025-04-21 15:03:41'),
(67, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 17:20:36'),
(68, 31, 'OTP Verified', 'User successfully verified the one-time password (OTP).', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 17:21:04'),
(69, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:02:50'),
(70, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:02:53'),
(71, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:05:52'),
(72, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:05:59'),
(73, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:09:48'),
(74, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:09:51'),
(75, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:10:13'),
(76, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:10:17'),
(77, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:15:29'),
(78, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:15:33'),
(79, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:15:46'),
(80, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:19:24'),
(81, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:21:18'),
(82, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:21:22'),
(83, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:23:08'),
(84, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:23:11'),
(85, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:36:32'),
(86, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:36:36'),
(87, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:43:53'),
(88, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 18:44:01'),
(89, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 19:01:02'),
(90, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 19:01:06'),
(91, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 19:02:40'),
(92, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 19:02:45'),
(93, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 19:04:37'),
(94, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 19:04:41'),
(95, 31, 'Logout', 'User successfully logged out.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 19:04:45'),
(96, 31, 'Login', 'User successfully logged in.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 19:50:06'),
(97, 31, 'Add Admin', 'New admin account created successfully by Lexus Taladro. User Juan Carlos Gonzalez assigned administrative privileges.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-22 21:15:45');

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
-- Indexes for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grades_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `otp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `otp`
--
ALTER TABLE `otp`
  ADD CONSTRAINT `otp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
  ADD CONSTRAINT `fk_user_activity_log_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_activity_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
