-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Oct 22, 2022 at 05:49 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MYSQL_DATABASE`
--

-- --------------------------------------------------------

--
-- Table structure for table `Album`
--

CREATE TABLE `Album` (
  `album_id` int NOT NULL,
  `Judul` varchar(64) NOT NULL,
  `Penyanyi` varchar(128) NOT NULL,
  `Total_duration` int NOT NULL,
  `Image_path` varchar(256) NOT NULL,
  `Tanggal_terbit` date NOT NULL,
  `Genre` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Song`
--

CREATE TABLE `Song` (
  `song_id` int NOT NULL,
  `Judul` varchar(64) NOT NULL,
  `Penyanyi` varchar(128) DEFAULT NULL,
  `Tanggal_terbit` date NOT NULL,
  `Genre` varchar(64) DEFAULT NULL,
  `Duration` int NOT NULL,
  `Audio_path` varchar(256) NOT NULL,
  `Image_path` varchar(256) DEFAULT NULL,
  `album_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Song`
--

INSERT INTO `Song` (`song_id`, `Judul`, `Penyanyi`, `Tanggal_terbit`, `Genre`, `Duration`, `Audio_path`, `Image_path`, `album_id`) VALUES
(1, 'Secukupnya', 'Hindia', '2019-05-03', 'Pop Indonesia', 205, 'hindia-secukupnya.mp3', 'hindia-secukupnya.jpg', NULL),
(2, 'Lantas', 'Juicy Luicy', '2020-08-28', 'Pop Indonesia', 234, 'juicy-luicy-lantas.mp3', 'juicy-luicy-lantas.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `email`, `password`, `username`, `isAdmin`) VALUES
(1, 'afanganteng@gmail.com', 'blueguy42', 'afan', 1),
(2, 'HobiBolos@gmail.com', 'saul', 'saulsayerz', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Album`
--
ALTER TABLE `Album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `Song`
--
ALTER TABLE `Song`
  ADD PRIMARY KEY (`song_id`),
  ADD KEY `FK_album_id` (`album_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Song`
--
ALTER TABLE `Song`
  ADD CONSTRAINT `FK_album_id` FOREIGN KEY (`album_id`) REFERENCES `Album` (`album_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
