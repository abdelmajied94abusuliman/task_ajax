-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 12:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csc_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(100) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `minimum_mark` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `minimum_mark`) VALUES
(1, 'PHP', 55),
(2, 'JavaScript', 50),
(3, 'Laravel', 60),
(5, 'test', 50),
(9, 'xxx', 12),
(10, 'talab', 10),
(11, 'talabb', 10),
(12, 'Python', 70);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `reciver_id` int(100) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `user_id`, `reciver_id`, `content`, `created_at`) VALUES
(1, 70, 55, 'Hello , I send this message to day', '2023-03-22 10:33:24'),
(2, 55, 70, 'Hello Talab , I send this message to you', '2023-03-22 14:33:45'),
(3, 70, 73, 'Heeeey', '2023-03-22 16:33:45'),
(6, 70, 55, 'Heeeey Oday , I am Talab', '2023-03-23 14:22:59'),
(7, 70, 0, 'hello', '2023-03-23 14:29:40'),
(8, 70, 55, 'تطلعوا اليوم ؟', '2023-03-23 14:35:25'),
(9, 70, 55, 'رد يا جبان', '2023-03-23 14:37:34'),
(10, 70, 55, 'فيها نفس ارجيلة ', '2023-03-23 14:50:06'),
(11, 70, 56, 'كيف كان الكورس اليوم ؟', '2023-03-23 14:50:46'),
(12, 70, 71, 'بدنا نمرلك اليوم , ايش الوضع', '2023-03-23 15:14:05'),
(13, 70, 64, 'مرحبا كرم', '2023-03-23 15:16:35'),
(14, 70, 64, 'ببب', '2023-03-23 15:16:42'),
(15, 70, 64, 'ايش عندك', '2023-03-23 15:16:59'),
(16, 70, 71, 'رد يا مدير', '2023-03-23 15:17:11'),
(17, 56, 70, 'ممتاز', '2023-03-23 20:48:58'),
(18, 70, 56, 'منوور', '2023-03-24 15:42:46'),
(19, 56, 70, 'رد يا جبان', '2023-03-24 17:10:21'),
(20, 55, 70, 'ان شاء الله , اليوم ب ئهوة غوار', '2023-03-24 17:11:44'),
(21, 55, 67, 'طمني نجحت بالامتحان ؟', '2023-03-24 17:14:13'),
(22, 56, 70, 'جيب معك فطور و انت جاي ', '2023-03-24 18:18:17'),
(23, 56, 70, 'لا تنسى اللبن', '2023-03-24 18:18:23'),
(24, 79, 56, 'هاي كوتش', '2023-03-24 18:19:27'),
(25, 56, 79, 'اهلين تيست ', '2023-03-24 18:19:38'),
(45, 56, 70, 'تطلعوا اليوم ؟', '2023-03-24 20:55:18'),
(46, 70, 56, 'لا', '2023-03-24 20:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `stu_crs`
--

CREATE TABLE `stu_crs` (
  `stu_crs_id` int(100) NOT NULL,
  `course_id` int(100) NOT NULL,
  `user_id` int(255) NOT NULL,
  `mark` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stu_crs`
--

INSERT INTO `stu_crs` (`stu_crs_id`, `course_id`, `user_id`, `mark`) VALUES
(1, 1, 70, 99),
(2, 1, 71, 91),
(3, 2, 70, 82),
(4, 2, 73, 0),
(5, 1, 64, 80),
(6, 1, 74, 0),
(14, 2, 71, 21),
(15, 3, 70, 81),
(16, 5, 75, 50),
(17, 5, 73, 0),
(18, 5, 76, 98),
(19, 5, 55, 100),
(20, 5, 71, 77),
(21, 5, 64, 100),
(22, 12, 79, 99),
(23, 12, 70, 0),
(24, 12, 71, 85),
(26, 5, 70, 500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Inactive',
  `is_admin` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `is_admin`) VALUES
(55, 'Oday', 'abdelmajied@yahoo.com', 'c9cd1359c459e829018f058e10033dac9cdd21dd', 'Active', 1),
(56, 'Obaida', 'abdelmajied_a@yahoo.com', 'c9cd1359c459e829018f058e10033dac9cdd21dd', 'Active', 1),
(64, 'abdelmajied', 'ahmad@yahoo.com', '08f13b3a708dfe066e9153f96c63ea5d32e900f3', 'Inactive', 0),
(67, 'Zohdy', 'ahmad2@yahoo.com', '08f13b3a708dfe066e9153f96c63ea5d32e900f3', 'Active', 0),
(68, 'Abd', 'ahmad3@yahoo.com', '08f13b3a708dfe066e9153f96c63ea5d32e900f3', 'Active', 0),
(69, 'Mohammad', 'ahmadAkram@yahoo.com', 'c9cd1359c459e829018f058e10033dac9cdd21dd', 'Active', 0),
(70, 'Talab', 'ahmadAkram1@yahoo.com', 'c9cd1359c459e829018f058e10033dac9cdd21dd', 'Active', 0),
(71, 'Assem', 'ahmad33@yahoo.com', '08f13b3a708dfe066e9153f96c63ea5d32e900f3', 'Active', 0),
(72, 'Ahmad', 'ahmad333@yahoo.com', '08f13b3a708dfe066e9153f96c63ea5d32e900f3', 'Active', 0),
(76, 'abdelmajied.abusuliman', 'abdelmajied.abusuliman@gmail.com', 'c9cd1359c459e829018f058e10033dac9cdd21dd', 'Inactive', 0),
(79, 'testtest', 'test@test.test', '4063142187dbfbbd62555f742409c32dadd6c1bd', 'Active', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `stu_crs`
--
ALTER TABLE `stu_crs`
  ADD PRIMARY KEY (`stu_crs_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `stu_crs`
--
ALTER TABLE `stu_crs`
  MODIFY `stu_crs_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
