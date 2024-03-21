-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 21, 2024 at 12:30 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist1`
--

-- --------------------------------------------------------

--
-- Table structure for table `relation_task_category`
--

DROP TABLE IF EXISTS `relation_task_category`;
CREATE TABLE IF NOT EXISTS `relation_task_category` (
  `taskID` int NOT NULL,
  `categoryID` int NOT NULL,
  KEY `FK_todo_task_TO_relation_task_category` (`taskID`),
  KEY `FK_todo_category_TO_relation_task_category` (`categoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `todo_category`
--

DROP TABLE IF EXISTS `todo_category`;
CREATE TABLE IF NOT EXISTS `todo_category` (
  `categoryID` int NOT NULL AUTO_INCREMENT,
  `taskCategory` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`categoryID`),
  UNIQUE KEY `UQ_categoryID` (`categoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `todo_priority`
--

DROP TABLE IF EXISTS `todo_priority`;
CREATE TABLE IF NOT EXISTS `todo_priority` (
  `priorityID` int NOT NULL AUTO_INCREMENT,
  `taskPriority` varchar(50) NOT NULL,
  PRIMARY KEY (`priorityID`),
  UNIQUE KEY `UQ_priorityID` (`priorityID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `todo_task`
--

DROP TABLE IF EXISTS `todo_task`;
CREATE TABLE IF NOT EXISTS `todo_task` (
  `taskID` int NOT NULL AUTO_INCREMENT,
  `taskTitle` varchar(100) NOT NULL,
  `taskDescription` varchar(300) DEFAULT NULL,
  `taskDeadline` date NOT NULL,
  `taskPriority` varchar(100) NOT NULL,
  `taskCategory` varchar(100) DEFAULT NULL,
  `userTaskID` int NOT NULL,
  `priorityID` int NOT NULL,
  PRIMARY KEY (`taskID`),
  UNIQUE KEY `UQ_taskID` (`taskID`),
  KEY `FK_todo_priority_TO_todo_task` (`priorityID`),
  KEY `FK_todo_user_TO_todo_task` (`userTaskID`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `todo_task`
--

INSERT INTO `todo_task` (`taskID`, `taskTitle`, `taskDescription`, `taskDeadline`, `taskPriority`, `taskCategory`, `userTaskID`, `priorityID`) VALUES
(36, 'task1', 'descriptions 1', '2024-03-21', '0', 'AZERTY', 33, 0),
(37, 'TASK2', 'DESCRIPTION ', '2024-03-22', '1', 'QSDFG', 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `todo_user`
--

DROP TABLE IF EXISTS `todo_user`;
CREATE TABLE IF NOT EXISTS `todo_user` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `surname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(555) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `UQ_userID` (`userID`),
  UNIQUE KEY `UQ_email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `todo_user`
--

INSERT INTO `todo_user` (`userID`, `name`, `surname`, `email`, `password`) VALUES
(43, 'Feras', 'Altaleb', 'feras.altalib@gmail.com', '$2y$10$5TTBAhXFJz3YjHTkxOTETuammpoWYmCmQoIPW62biWznHb0UfA/Cu'),
(34, 'Hararee', 'kamal', 'albarghash311994@gmail.com', '$2y$10$JyJl71UNLFh1MnO9/11tieywg9iZCvziMv4/vj75nghHymle8Si6K');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
