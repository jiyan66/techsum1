CREATE DATABASE IF NOT EXISTS `tasks_for_today`
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

USE `tasks_for_today`;

SET time_zone = '+08:00';

DROP TABLE IF EXISTS `tasks`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `tasks` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(150) NOT NULL,
    `status` VARCHAR(20) NOT NULL DEFAULT 'pending',
    `task_date` DATE NOT NULL,
    `created_at` DATETIME NOT NULL
);

CREATE TABLE `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `full_name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `created_at` DATETIME NOT NULL
);

INSERT INTO `tasks` (`title`, `status`, `task_date`, `created_at`) VALUES
('Review the laboratory instructions', 'completed', CURDATE(), NOW()),
('Complete the Tasks for Today system', 'pending', CURDATE(), NOW()),
('Upload the project to GitHub', 'pending', CURDATE(), NOW()),
('Test all four application pages', 'pending', DATE_ADD(CURDATE(), INTERVAL 1 DAY), NOW()),
('Check the hosted database connection', 'pending', DATE_ADD(CURDATE(), INTERVAL 1 DAY), NOW()),
('Prepare screenshots for submission', 'pending', DATE_ADD(CURDATE(), INTERVAL 2 DAY), NOW()),
('Review the laboratory documentation', 'pending', DATE_ADD(CURDATE(), INTERVAL 2 DAY), NOW()),
('Submit the completed laboratory work', 'pending', DATE_ADD(CURDATE(), INTERVAL 3 DAY), NOW());

INSERT INTO `users` (`username`, `full_name`, `email`, `created_at`) VALUES
('Gian', 'Joseph Gian Carlo Mistica', 'gianmistica@gmail.com', NOW());
