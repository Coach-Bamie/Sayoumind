-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2025 at 03:37 PM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u873311945_mind`
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
(20, 2, 'jakai', '2025-04-04 21:21:19', 0),
(21, 3, 'Hello', '2025-04-06 19:44:26', 0),
(22, 3, 'Banza', '2025-04-06 19:44:43', 0),
(23, 5, 'Wangwan guys ', '2025-04-06 19:47:41', 0),
(24, 5, 'Yaa neee', '2025-04-06 19:47:54', 0),
(25, 6, 'What is this nonsense ', '2025-04-06 19:48:26', 0),
(26, 6, 'Who be this', '2025-04-06 19:48:49', 0),
(27, 5, 'What&#039;s Nonsense?\n', '2025-04-06 20:00:38', 0),
(28, 3, 'I don&#039;t know ', '2025-04-06 20:09:41', 0),
(29, 4, 'Una good evening here ', '2025-04-06 20:09:44', 0),
(30, 4, 'We have a lot to fix ', '2025-04-06 20:10:01', 0),
(31, 3, 'Yes sir so tomorrow if you like sleep like u never sleep before here👂👂👂👂', '2025-04-06 20:22:31', 0),
(32, 6, 'So @YoungDev na fight easy ', '2025-04-06 20:25:22', 0),
(33, 3, '@@Engineer allow me finish @MasterCraft this nigh 💪💪💪', '2025-04-06 20:27:46', 0),
(34, 6, 'Good morning to you all ', '2025-04-07 07:12:59', 0),
(35, 3, 'Hello', '2025-04-07 07:52:02', 0),
(36, 10, 'Okay, let&#039;s revise Chapter One of your proposal to align with the specified structure. I&#039;ll provide updated sections reflecting this organization. Remember to adapt these examples to your specific research.\n\nChapter 1: Introduction (Revised Structure)\n\n•   1.1 Background to the Study:\n\n    *   &quot;Nigeria&#039;s socio-political landscape is deeply intertwined with religion, a factor that has significantly influenced electoral dynamics. The country&#039;s diverse religious composition, primarily Christianity and Islam, coupled with its regional distribution, creates a unique context for understanding voting behaviour.&quot;\n    *   &quot;Historical events, such as the introduction of Sharia law in some northern states and the ethno-religious conflicts in the Middle Belt, underscore the complexities and sensitivities surrounding religion and politics in Nigeria.&quot;\n    *   &quot;The 2023 presidential election took place amidst growing concerns about religious polarization and the potential for sectarianism to undermine the democratic process. The religious backgrounds and affiliations of the candidates were prominent features of the campaign, raising questions about their impact on voter choices.&quot;\n•   1.2 Statement of the Problem:\n\n    *   &quot;While anecdotal evidence suggests that religion played a significant role in the 2023 presidential election, a rigorous and systematic analysis is needed to determine the extent of its influence on voting behaviour. Existing literature provides varying perspectives on the relationship between religion and politics in Nigeria, with some studies emphasizing its importance and others highlighting the role of ethnicity, class, and regionalism.&quot;\n    *   &quot;The lack of comprehensive empirical data and the challenges of isolating the impact of religion from other factors make it difficult to draw definitive conclusions about its role in shaping voter preferences. There is a need for research that utilizes a mixed-methods approach to capture both the quantitative and qualitative dimensions of this complex phenomenon.&quot;\n    *   &quot;Specifically, there is a lack of understanding on how religious narratives and candidate&#039;s religious background influenced the voter decisions. Furthermore, it remains unclear what role religious leaders and organizations played in mobilizing voters for the 2023 election. &quot;\n•   1.3 Research Questions:\n\n    1.  &quot;To what extent did religious affiliation correlate with voting preferences in the 2023 presidential election, controlling for other factors such as ethnicity, socioeconomic status, and geopolitical region?&quot;\n    2.  &quot;How did the religious identities and public statements of the candidates impact voter choices across different regions of Nigeria?&quot;\n    3.  &quot;What were the dominant religious narratives and messages circulated during the campaign period, and how did these influence voting patterns?&quot;\n    4.  &quot;In what ways did religious leaders and organizations mobilize their followers to vote, and what impact did this mobilization have on election outcomes?&quot;\n    5.  &quot;To what extent did the media portray the candidates in a religious light and how did it affect voters perception.&quot;\n    6.  &quot;Did economic hardship, insecurity, and ethnic tensions mediate the effect of religious affiliation on voting behaviour?&quot;\n•   1.4 Research Objectives:\n\n    1.  &quot;To quantitatively assess the correlation between religious affiliation and voting patterns in the 2023 presidential election.&quot;\n    2.  &quot;To qualitatively analyze the impact of the candidates&#039; religious identities and rhetoric on voter perceptions and choices.&quot;\n    3.  &quot;To identify and analyze the key religious narratives that shaped voter behavior during the election campaign.&quot;\n    4.  &quot;To investigate the role and influence of religious leaders and organizations in voter mobilization.&quot;\n    5.  &quot;To assess the relative importance of religion compared to other factors (ethnicity, economy, security) in determining voting behaviour.&quot;\n    6.   &quot;To examine the media portrayal of the candidates, identifying rel', '2025-04-07 14:16:02', 0),
(37, 3, 'Are you mad what is thjs', '2025-04-07 14:17:09', 0),
(38, 10, 'You dey rzr?', '2025-04-07 14:17:45', 0),
(39, 10, '8142241819\nOpay\nIlyasu', '2025-04-07 14:41:19', 0),
(40, 10, 'Ddf\nDdf\nSss\n\nFff', '2025-04-07 14:41:54', 0),
(41, 10, 'Xxvvv\n \n\nI\n\nIi\n1v\n\nV', '2025-04-07 14:42:31', 0),
(42, 3, 'Aslm ', '2025-04-08 10:10:25', 0),
(43, 11, 'Hlo', '2025-04-08 12:29:35', 0),
(44, 3, 'Hi khadija how are you doing today ', '2025-04-08 18:39:17', 0),
(45, 3, 'Hi khadija how are you doing today ', '2025-04-08 18:39:17', 0),
(46, 10, 'hi\ngood morning guys\n', '2025-04-09 06:01:54', 0),
(47, 10, 'i need someone to help me solve my maths question\n', '2025-04-09 06:02:33', 0),
(48, 10, 'if ou can hlp please signify so i can drop the message\n\n\n', '2025-04-09 06:03:04', 0),
(49, 4, 'guy ohk drop it sharp\n', '2025-04-09 09:27:07', 0),
(50, 18, 'hi', '2025-04-14 14:55:27', 0),
(51, 18, 'how are you guys', '2025-04-14 14:56:00', 0);

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
(6, '', 'hi', '2', '2', '2025-04-04 22:26:01'),
(7, '', 'hi', '1', '2', '2025-04-06 19:32:13'),
(8, '', 'Good evening ', '3', '1', '2025-04-06 19:45:18'),
(9, '', 'Hi', '5', '1', '2025-04-06 19:45:56'),
(10, '', 'I am feeling anxious ', '5', '1', '2025-04-06 19:46:05'),
(11, '', 'My head is not uploading ', '5', '2', '2025-04-06 19:46:53'),
(12, '', 'So how can you help me ', '6', '1', '2025-04-06 19:49:26'),
(13, '', 'I don\'t know why do you ask me ', '1', '6', '2025-04-06 19:52:44'),
(14, '', 'Get out of my site', '1', '5', '2025-04-06 19:53:11'),
(15, '', 'Evening', '1', '3', '2025-04-06 19:53:30'),
(16, '', 'Uwarka may you die', '2', '5', '2025-04-06 20:04:32'),
(17, '', 'Good day Mr medical how are you doing today ', '3', '2', '2025-04-06 20:07:35'),
(18, '', 'Am doing fine and u', '2', '3', '2025-04-06 20:08:19'),
(19, '', 'How can I help you ', '2', '3', '2025-04-06 20:08:30'),
(20, '', 'I don\'t know what happen when ever am sleeping my eyes is always closed and I don\'t see anything ', '3', '2', '2025-04-06 20:15:49'),
(21, '', 'Ohk Just remove the eye and keep it for the main time', '2', '3', '2025-04-06 20:17:26'),
(22, '', 'Ohk thank you sir', '3', '2', '2025-04-06 20:18:06'),
(23, '', 'How are you doing ', '1', '3', '2025-04-07 07:59:02'),
(24, '', 'Good afternoon sir', '6', '7', '2025-04-07 14:02:00'),
(25, '', 'Hello', '6', '8', '2025-04-07 14:04:33'),
(26, '', 'Wangwan Admin\r\nI need road to kubwa', '10', '8', '2025-04-07 14:10:59'),
(27, '', 'So send 100k here 8142241819 iliyasu abdurrazaq iliyasu OPay ', '8', '10', '2025-04-07 14:11:58'),
(28, '', 'You dey mad ', '10', '8', '2025-04-07 14:12:26'),
(29, '', 'Aye shamalamala', '10', '8', '2025-04-07 14:12:42'),
(30, '', 'Same to you ', '8', '10', '2025-04-07 14:12:43'),
(31, '', 'You don shop?', '10', '8', '2025-04-07 14:12:49'),
(32, '', 'I am feeling thirsty \r\nPlease how can I steal water', '10', '1', '2025-04-07 14:13:43'),
(33, '', 'Go to back site and still there', '1', '10', '2025-04-07 14:14:40'),
(34, '', 'Ok tfare', '10', '1', '2025-04-07 14:15:03'),
(35, '', 'Fine', '3', '1', '2025-04-08 10:11:46'),
(36, '', 'Afternoon how can I help you ', '7', '6', '2025-04-08 18:44:44'),
(37, '', 'hi sir i am feeling nrvous\r\n', '10', '13', '2025-04-09 05:54:12'),
(38, '', 'hhjhghgf\r\n', '10', '13', '2025-04-09 05:54:47'),
(39, '', 'yes daddy\r\n', '10', '13', '2025-04-09 05:55:01'),
(40, '', 'So we don\'t need to refresh ', '13', '10', '2025-04-09 05:55:11'),
(41, '', 'That\'s very great \r\n\r\nAjax is working well', '13', '10', '2025-04-09 05:55:30'),
(42, '', 'good morning', '6', '16', '2025-04-09 09:43:19'),
(43, '', 'Am feeling unsafe in the campus', '6', '7', '2025-04-10 06:25:53'),
(44, '', 'hello ilyasu i need 10000000000 million dollars\r\n', '10', '7', '2025-04-10 21:56:14'),
(45, '', 'you don chop?\r\n', '16', '6', '2025-04-14 15:33:25'),
(46, '', 'Digkbk', '11', '1', '2025-04-14 15:34:46');

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
(2, 'confirm', '$2y$10$pE46YoRMbpUFQXsdcNZug.Miz4Kp61l3rgbJrXIzCQZ0SIXm1lu66', 'medical', 'What is your pet\'s name?', '$2y$10$9BYKs4KQks58h8xAB18YBO5bjipjV8lgfCt1qsgOsOr3DBeXFgMYO'),
(3, 'YoungDev', '$2y$10$Aip42DhFjsfp5nZTOjLx3e8KRWVmWzxwHbJ/UOBLGmDYnezn7qgiy', 'user', 'What is your pet\'s name?', '$2y$10$RQkDdx/h07HIcypUUq56z.mKHYPy33psPyIsrBhD1s77GW.cVdAlO'),
(4, 'MasterCraft', '$2y$10$6EVJ12rOgMtk1ioMwm8O8OIBxvo8PbRby2l5q/nk2b42KSyncQmpi', 'user', 'What is your mother\'s maiden name?', '$2y$10$30C7AZY7Xg4JQg1zrR9VqeF21gZdjV/F4jL04UdJ.1q2/feurln.y'),
(5, 'Wangwan', '$2y$10$Oi2zjEFQumz43W99sYlISeMZQ5JECJseMe9K2ZaXxSi9t857r7as2', 'user', 'What is your pet\'s name?', '$2y$10$ELXNmRGaNHpXc5qgIcMJCu6G8Y3hW9GnUAEjWFAZ3dn86SkPRgZzu'),
(6, 'Engineer', '$2y$10$yFwWGOR/owIy4XoP7nErx.uJzkugOb7mPSaxXnKKV1t6qsSXFvpx2', 'user', 'What is your pet\'s name?', '$2y$10$sUyDBSnH.ABRxTm1JaxDLOZSaxwn94N2JcZjkSxK.JHN2DHD9gelS'),
(7, 'Iliyasu abdurrazaq', '$2y$10$OQvE5qOiDTBWa8/4RQpV1eQWZmtqnuQEjJdAli8DzLdFusN7hUFZu', 'guidance', '', ''),
(8, 'Moses pios', '$2y$10$IfYwwelDN.0eVp669EIkRe8RgGpKtQ/qvfZAkw1IXIWnuPctpxTqm', 'guidance', '', ''),
(9, 'Abubakar', '$2y$10$UACzFlDWX9EkdR8f6G6/y.wYqY/JBMPQfupXWMIUCmHxceQI4IqgK', 'user', 'What city were you born in?', '$2y$10$XvMqn8yjZpPaZIvXRYPHWOB74pL3lpVMaD5em7slfzQGbeyreJv5e'),
(10, 'Adelej', '$2y$10$tVu.E44GfLzoeajeti9YkOoWLVPZ8dsTL8S.I5TUn0z3k9Q7Dt5tm', 'user', 'What is your mother\'s maiden name?', '$2y$10$sIWrSZrDlaITvyW1crfsJO47sj7YoHWwgqaSayF3ZWdsJmCA/tg5O'),
(11, 'Khadija ', '$2y$10$L28eV3wUuVkkypGMb9r/ru85D/37eEKAdcoqsnxy3B/yq4w2O73XO', 'user', 'What is your pet\'s name?', '$2y$10$/E75eAXZjryfaD9maotga.Mr9HenNLKff3Wy7Pj35tI0NypUjBGky'),
(12, 'Khadija Ibrahim', '$2y$10$7nzmMqdY/k/QdV3QQMG6rOGbwMhcDaCMxpT9uIUOGQxpRYmI5WU8i', 'user', '', ''),
(13, 'Bamo', '$2y$10$bBfWqyfWkD0M9gvgef80w.76En9fCFzFx.o1FTMZdsVviI7pMZ/ym', 'guidance', '', ''),
(14, 'Hauwa', '$2y$10$YHJluf9CaK7HEov2vDWw/udh9ahPldQgTJ52YXjddIDRe4BpKNsjq', 'user', '', ''),
(15, 'musa', '$2y$10$ewsBgfHfm6ca3xP.jdApieZ2qzqvIIYTRNevqNaPudRF.LJHXUzVu', 'guidance', '', ''),
(16, 'sir Abba', '$2y$10$DNwutOtJGFWN/xnwbdvXFO4iNtqe0Vp6qTXZl3dRBW1SSFQ9rYFzS', 'security', '', ''),
(17, 'MrK', '$2y$10$S4kWbEWmJ/sxO5jbgq.qIuyFlK7AHtQmZ1LQFLRQkQqSaRtJTDHgS', 'user', 'What is your pet\'s name?', '$2y$10$76ibfOHPmCtoGhDaqnnNLe8p3Yvsu9CJnO7YDRh3EqhpjAZTtqoiy'),
(18, 'adamu', '$2y$10$fuNXQFVBNWOc3FzQX8dd7.U9fQ5a1A6W67nkGon.T67kF/785qX0S', 'user', 'What is your pet\'s name?', '$2y$10$bTMMq9yjtEqX1EIKQLyv7./YlbO3314gIzNluU4pz8S772XYx1WFW'),
(19, 'ahmad', '$2y$10$tHJ1WrpbSPigzA76teXU.Oka1pIdmReCzmPN8Y96PcyWHk2c.i2Qm', 'user', '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
