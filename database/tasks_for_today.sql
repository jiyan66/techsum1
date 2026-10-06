-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2026 at 05:52 PM
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
-- Database: `tasks_for_today`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `task_date` date NOT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0, -- FIXED: Missing column added for soft deletion
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `status`, `task_date`, `is_archived`) VALUES
(1, 'Review the laboratory instructions', '', 'completed', '2026-10-06', 0),
(2, 'Complete the Tasks for Today system', '', 'pending', '2026-10-06', 0),
(3, 'Upload the project to GitHub', '', 'pending', '2026-10-06', 0),
(4, 'Test all four application pages', '', 'pending', '2026-10-07', 0),
(5, 'Check the hosted database connection', '', 'pending', '2026-10-07', 0),
(6, 'Prepare screenshots for submission', '', 'pending', '2026-10-08', 0),
(7, 'Review the laboratory documentation', '', 'pending', '2026-10-08', 0),
(8, 'Submit the completed laboratory work', '', 'pending', '2026-10-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
-- FIXED: Missing users table added to support Auth system requirements
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
-- Default credentials -> Email: demo@example.com | Password: password123
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'demouser', 'demo@example.com', '\$2y\$10\$U7vM2v0S3Vw/8F1jW1zBieTymKbyC66E4zDq4L7D/0Oq3mK7BieV.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
