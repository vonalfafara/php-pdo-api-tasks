-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tasks-db
CREATE DATABASE IF NOT EXISTS `tasks-db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tasks-db`;

-- Dumping structure for table tasks-db.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int NOT NULL AUTO_INCREMENT,
  `task_title` varchar(50) NOT NULL DEFAULT '',
  `task_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `task_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Not Started',
  `user_id` int NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tasks-db.tasks: ~6 rows (approximately)
INSERT INTO `tasks` (`task_id`, `task_title`, `task_description`, `task_status`, `user_id`) VALUES
	(2, 'Grocery shopping', 'Buy eggs, bread, vegetables', 'Not Started', 1),
	(5, 'Go to doctor', 'Bloodchem', 'Not Started', 3),
	(6, 'Teach class', NULL, 'Not Started', 4),
	(7, 'Teach PDO', 'Teach PDO to WD98 in the context of OOP', 'Not Started', 1),
	(10, 'Take a break', 'Order Jollibee', 'Completed', 1),
	(11, 'Go to Japan', 'Osaka to Tokyo', 'Ongoing', 1);

-- Dumping structure for table tasks-db.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tasks-db.users: ~7 rows (approximately)
INSERT INTO `users` (`user_id`, `username`) VALUES
	(1, 'vsalfafara'),
	(2, 'gregorio'),
	(3, 'cha'),
	(4, 'chi'),
	(5, 'jdelacruz'),
	(6, 'mar_manzano'),
	(7, 'rexie_manito');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
