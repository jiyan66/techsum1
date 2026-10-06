<?php

namespace App\Controllers;

class Migrate extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // 1. Drop existing tasks table if it is currently stuck in an unaligned state
        $db->query("DROP TABLE IF EXISTS `tasks`;");

        // 2. Build the tasks table schema containing the required TSA2 is_archived matrix
        $db->query("CREATE TABLE `tasks` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `title` varchar(150) NOT NULL,
          `description` text DEFAULT NULL,
          `status` varchar(20) NOT NULL DEFAULT 'pending',
          `task_date` date NOT NULL,
          `is_archived` tinyint(1) NOT NULL DEFAULT 0,
          `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;");

        // 3. Drop existing users table schema configuration
        $db->query("DROP TABLE IF EXISTS `users`;");

        // 4. Build the users table structure required for authentication
        $db->query("CREATE TABLE `users` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `full_name` varchar(200) NOT NULL,
          `username` varchar(50) NOT NULL,
          `email` varchar(100) NOT NULL,
          `password` varchar(255) NOT NULL,
          `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (`id`),
          UNIQUE KEY `email` (`email`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;");

        // 5. Populate default seed data rows safely
        $db->query("INSERT INTO `tasks` (`title`, `status`, `task_date`) VALUES 
            ('Review the laboratory instructions', 'completed', '2026-10-06'),
            ('Complete the Tasks for Today system', 'pending', '2026-10-06'),
            ('Upload the project to GitHub', 'pending', '2026-10-06'),
            ('Test all four application pages', 'pending', '2026-10-07');");

        $db->query("INSERT INTO `users` (``full_name`, username`, `email`, `password`) VALUES 
            ('demouser', 'demo@example.com', '\$2y\$10\$U7vM2v0S3Vw/8F1jW1zBieTymKbyC66E4zDq4L7D/0Oq3mK7BieV.');");

        return "<h3>Aiven Database Schema successfully migrated and populated!</h3>";
    }
}
