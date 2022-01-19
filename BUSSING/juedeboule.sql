-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 09:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juedeboule`
--

-- --------------------------------------------------------

--
-- Table structure for table `leden`
--

CREATE TABLE `leden` (
  `lidNr` int(8) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `tussenvoegsel` varchar(20) NOT NULL,
  `achternaam` varchar(32) NOT NULL,
  `geslacht` varchar(8) NOT NULL,
  `teamNr` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leden`
--

INSERT INTO `leden` (`lidNr`, `voornaam`, `tussenvoegsel`, `achternaam`, `geslacht`, `teamNr`) VALUES
(1, 'Justin', '', 'Heerholtz', 'm', 1),
(18, 'Robin', '', 'Moeskop', 'm', 1),
(19, 'Ali', 'van der', 'Rijdt', 'm', 1),
(20, 'Monique', 'van der', 'Stek', 'v', 1),
(21, 'Claudia', '', 'Beyer', 'v', 2),
(22, 'Kain', 'van', 'Houtem', 'm', 2),
(23, 'Tim', '', 'Rademaker', 'm', 2),
(24, 'Astrid', 'van', 'Uuden', 'v', 2),
(25, 'Gino', '', 'Brouwers', 'm', 3),
(26, 'Luc', '', 'Liebregts', 'm', 3),
(27, 'Ton', '', 'Raijmakers', 'm', 3),
(28, 'Ans', 'van de', 'Wiel', 'v', 3),
(29, 'Hidde', '', 'Deijnen', 'm', 4),
(30, 'Marijn', 'el', 'Maaroufi', 'm', 4),
(31, 'Hidde', '', 'Deijnen', 'm', 4),
(32, 'Marijn', 'el', 'Maaroufi', 'm', 4),
(33, 'Willem', '', 'ruiterss', 'm', 4),
(34, 'Pierre', 'de', 'Wit', 'm', 4),
(35, 'Willem', '', 'ruiterss', 'm', 4),
(36, 'Pierre', 'de', 'Wit', 'm', 4),
(37, 'Jorg', '', 'Duiven', 'm', 5),
(38, 'Rik', 'van', 'Megen', 'm', 5),
(39, 'Jorg', '', 'Duiven', 'm', 5),
(40, 'Rik', 'van', 'Megen', 'm', 5),
(41, 'Ton', '', '', 'm', 5),
(42, 'Angelique', '', 'Zondag', 'v', 5),
(43, 'Ton', '', '', 'm', 5),
(44, 'Angelique', '', 'Zondag', 'v', 5);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `teamNr` int(11) NOT NULL,
  `competitie` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamNr`, `competitie`) VALUES
(1, 'ja'),
(2, 'nee'),
(3, 'ja'),
(4, 'nee'),
(5, 'ja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leden`
--
ALTER TABLE `leden`
  ADD PRIMARY KEY (`lidNr`),
  ADD KEY `teamNr` (`teamNr`) USING BTREE;

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamNr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leden`
--
ALTER TABLE `leden`
  MODIFY `lidNr` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`teamNr`) REFERENCES `leden` (`teamNr`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
