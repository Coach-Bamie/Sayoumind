-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2025 at 11:38 PM
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
-- Database: `mind`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(10) NOT NULL,
  `reciever_id` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `created_at`) VALUES
(1, 'yamojr001@gmail.com', '2025-03-30 19:45:05'),
(2, 'yamojr001@gmail.com', '2025-03-30 19:46:50'),
(3, 'yamojr001@gmail.com', '2025-03-30 19:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `group_chat`
--

CREATE TABLE `group_chat` (
  `id` int(11) NOT NULL,
  `message` varchar(1500) NOT NULL,
  `reciever_id` varchar(10) NOT NULL,
  `sender_id` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_messages`
--

CREATE TABLE `group_messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reply_to_message_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_messages`
--

INSERT INTO `group_messages` (`id`, `sender_id`, `message`, `created_at`, `reply_to_message_id`) VALUES
(1, 1, 'hi guys\r\n', '2025-04-03 09:08:30', NULL),
(2, 1, 'how are you', '2025-04-03 09:08:41', NULL),
(3, 1, 'hi are you there\n', '2025-04-03 10:03:24', NULL),
(4, 2, 'are you available today\n', '2025-04-03 10:03:48', NULL),
(5, 1, 'yes iam', '2025-04-03 10:04:44', NULL),
(6, 1, 'aa', '2025-04-03 10:05:39', NULL),
(7, 1, 'hello guys\n', '2025-04-03 10:06:03', NULL),
(8, 2, 'whats happening bro\n', '2025-04-03 10:06:20', NULL),
(9, 3, 'kai guys', '2025-04-03 10:15:26', NULL),
(10, 2, 'hi bad guy\n', '2025-04-03 11:23:30', 1),
(11, 1, 'are you tthere\n', '2025-04-03 13:34:16', 0),
(12, 1, 'hi others\n', '2025-04-04 10:35:10', 0),
(13, 1, 'hi others\n', '2025-04-04 10:35:10', 0),
(14, 1, 'hi', '2025-04-04 11:10:57', 0),
(15, 2, 'hi banza', '2025-04-04 21:03:50', 0),
(16, 2, 'hi', '2025-04-04 21:04:38', 0),
(17, 2, 'hi', '2025-04-04 21:05:33', 0),
(18, 2, 'hi', '2025-04-04 21:15:49', 0),
(19, 2, 'hi', '2025-04-04 21:15:58', 0),
(20, 2, 'jakai', '2025-04-04 21:21:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `sender_id` varchar(11) NOT NULL,
  `receiver_id` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `department`, `message`, `sender_id`, `receiver_id`, `created_at`) VALUES
(1, '', 'hi', '2', '1', '2025-03-30 09:17:47'),
(2, '', 'hi', '2', '1', '2025-03-30 09:18:15'),
(3, '', 'hi\r\n', '1', '2', '2025-04-04 21:33:23'),
(4, '', 'how are you', '2', '1', '2025-04-04 21:55:12'),
(5, '', 'hi', '1', '2', '2025-04-04 21:55:19'),
(6, '', 'hi', '2', '2', '2025-04-04 22:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('user','admin','developer','medical','security','guidance','') NOT NULL DEFAULT 'user',
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role`, `question`, `answer`) VALUES
(1, 'Yamo JR', '$2y$10$JlGeY1ACuHbWbb0iNy/PLeslZnD7MXVSUii9syj5rfGFb5p7OsA16', 'security', '', ''),
(2, 'confirm', '$2y$10$pE46YoRMbpUFQXsdcNZug.Miz4Kp61l3rgbJrXIzCQZ0SIXm1lu66', 'medical', 'What is your pet\'s name?', '$2y$10$9BYKs4KQks58h8xAB18YBO5bjipjV8lgfCt1qsgOsOr3DBeXFgMYO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_messages`
--
ALTER TABLE `group_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_messages`
--
ALTER TABLE `group_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
