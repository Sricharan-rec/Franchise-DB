-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 07:28 PM
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
-- Database: `mini project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cricket_Stats`
--

CREATE TABLE `cricket_stats` (
  `Stat_ID` int(11) NOT NULL,
  `Player_ID` int(11) DEFAULT NULL,
  `Matches_Played` int(11) DEFAULT NULL,
  `Runs` int(11) DEFAULT NULL,
  `Wickets` int(11) DEFAULT NULL,
  `Specialization` varchar(50) DEFAULT NULL,
  `Player_Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Cricket_Stats`
--

INSERT INTO `Cricket_Stats` (`Stat_ID`, `Player_ID`, `Matches_Played`, `Runs`, `Wickets`, `Specialization`, `Player_Name`) VALUES
(1, 1, 200, 15000, 0, 'Batsman', 'MS Dhoni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cricket_Stats`
--
ALTER TABLE `Cricket_Stats`
  ADD PRIMARY KEY (`Stat_ID`),
  ADD KEY `Player_ID` (`Player_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cricket_Stats`
--
ALTER TABLE `Cricket_Stats`
  MODIFY `Stat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cricket_Stats`
--
ALTER TABLE `Cricket_Stats`
  ADD CONSTRAINT `cricket_stats_ibfk_1` FOREIGN KEY (`Player_ID`) REFERENCES `players` (`Player_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
