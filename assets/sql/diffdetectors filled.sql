-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2026 at 09:32 PM
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
-- Database: `diffdetectors`
--

-- --------------------------------------------------------

--
-- Table structure for table `puzzles`
--

CREATE TABLE `puzzles` (
  `id` int(11) NOT NULL,
  `spots` varchar(200) NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `hint` varchar(200) NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `puzzles`
--

INSERT INTO `puzzles` (`id`, `spots`, `difficulty`, `hint`, `createdTime`) VALUES
(15, '[{\"x\":0.5303,\"y\":0.33,\"found\":false},{\"x\":0.1446,\"y\":0.6522,\"found\":false},{\"x\":0.6135,\"y\":0.7088,\"found\":false}]', 'Easy 30s', 'on duck eye\r\non duck mouth\r\non mouse eye', '2026-03-10 20:19:04'),
(16, '[{\"x\":0.7395,\"y\":0.7903,\"found\":false},{\"x\":0.4647,\"y\":0.468,\"found\":false},{\"x\":0.1975,\"y\":0.5672,\"found\":false}]', 'Normal 20s', 'on welma face\r\non jaffny face\r\non steering wheel', '2026-03-10 20:19:39'),
(17, '[{\"x\":0.1522,\"y\":0.8788,\"found\":false},{\"x\":0.6261,\"y\":0.2344,\"found\":false},{\"x\":0.8681,\"y\":0.6557,\"found\":false}]', 'Normal 20s', 'on sonic\r\non orange character\r\non a shoe', '2026-03-10 20:20:46'),
(18, '[{\"x\":0.4698,\"y\":0.3406,\"found\":false},{\"x\":0.4269,\"y\":0.9213,\"found\":false},{\"x\":0.8555,\"y\":0.2308,\"found\":false}]', 'Easy 30s', 'a bee\r\non the trunk\r\non a wheel', '2026-03-10 20:21:19'),
(19, '[{\"x\":0.2782,\"y\":0.5459,\"found\":false},{\"x\":0.5177,\"y\":0.2131,\"found\":false},{\"x\":0.6135,\"y\":0.5636,\"found\":false}]', 'Hard 10s', 'a flower\r\non the donkey\r\non the elephent', '2026-03-10 20:21:51'),
(20, '[{\"x\":0.2681,\"y\":0.1742,\"found\":false},{\"x\":0.6992,\"y\":0.029,\"found\":false},{\"x\":0.679,\"y\":0.3406,\"found\":false}]', 'Normal 20s', 'on the forhead\r\non the crown\r\nin a yellow cloth', '2026-03-10 20:22:25'),
(21, '[{\"x\":0.4395,\"y\":0.5636,\"found\":false},{\"x\":0.6009,\"y\":0.6026,\"found\":false},{\"x\":0.6588,\"y\":0.3901,\"found\":false}]', 'Hard 10s', 'in an eye\r\non a pimple\r\ndoor handle', '2026-03-10 20:23:05'),
(22, '[{\"x\":0.0387,\"y\":0.7867,\"found\":false},{\"x\":0.8933,\"y\":0.4043,\"found\":false},{\"x\":0.2883,\"y\":0.9213,\"found\":false}]', 'Normal 20s', 'bottom blue flower\r\nright yellow flower\r\nleft pink flower', '2026-03-10 20:23:41'),
(23, '[{\"x\":0.1622,\"y\":0.3052,\"found\":false},{\"x\":0.0463,\"y\":0.677,\"found\":false},{\"x\":0.5051,\"y\":0.6663,\"found\":false}]', 'Hard 10s', 'on a falling leaf\r\na leave on left side\r\non the collar', '2026-03-10 20:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `user` varchar(100) NOT NULL,
  `puzzleId` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`user`, `puzzleId`, `score`) VALUES
('asithsaranga', 15, 75),
('asithsaranga', 17, 66),
('kasunkalhara', 17, 43),
('kavindumendis', 18, 75),
('kavindumendis', 22, 44),
('pasanmanohara', 21, 45),
('pasanmanohara', 23, 53),
('tharushikawya', 16, 66),
('tharushikawya', 21, 57),
('tharushikawya', 23, 57),
('vishalkalansooriya', 15, 73),
('vishalkalansooriya', 16, 53),
('vishalkalansooriya', 17, 61),
('vishalkalansooriya', 18, 69),
('vishalkalansooriya', 20, 62),
('vishalkalansooriya', 23, 54);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `CreatedTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `CreatedTime`) VALUES
('asithsaranga', 'asithsaranga@gmail.com', '$2y$10$FyEVRbJOpIt1Pd4Qzf6EDuLrP7IdzZaxBY3Qvmio6a/JsknAqJdLG', '2026-03-10 19:14:50'),
('admin', 'contact@webnifix.com', '$2y$10$PROfv/zfXNU/lYEWqs/Gdu4ZwhXQCXfsXwOl96nYv0XCGlhmexiyC', '2026-03-07 03:20:38'),
('kasunkalhara', 'kasunkalhara@gmail.com', '$2y$10$s6hpCSECSf9TrdiHL42dxOyvtB0b1ZtHqApTiv.lPv9ObvTi8iUUG', '2026-03-10 19:14:36'),
('kavindumendis', 'kavindumendis@gmail.com', '$2y$10$v1OjdaKTOaYPspzK0dTIAufii9a5AgeiyfC2WlVvqXPxrZHCqUArq', '2026-03-10 19:15:16'),
('pasanmanohara', 'pasanmanohara@gmail.com', '$2y$10$sFnEWSmrGrILLE4bh2W5IOk1pS1XEsWGlvaXR99H9NWz8ED8EFJOG', '2026-03-10 19:15:03'),
('tharushikawya', 'tharushikawya@gmail.com', '$2y$10$PMCAi6DkGDI0rgqOeUAl2erPKsJsNRkkoFeiB/vFXxF4yc0jEOxuO', '2026-03-10 19:15:36'),
('vishalkalansooriya', 'vishalkalansooriya@gmail.com', '$2y$10$esFcxhvDdhZaTAWi6ZmR7OoJgsnFG0jIv.oLyrRfHceFTcVx8/MK6', '2026-03-10 19:13:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `puzzles`
--
ALTER TABLE `puzzles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`user`,`puzzleId`),
  ADD KEY `puzzleId` (`puzzleId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `puzzles`
--
ALTER TABLE `puzzles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`puzzleId`) REFERENCES `puzzles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
