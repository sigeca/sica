-- phpMyAdmin SQL Dump
-- version 5.2.2-1.fc41.remi
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2025 at 01:13 AM
-- Server version: 10.11.11-MariaDB
-- PHP Version: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educayso_facae`
--

-- --------------------------------------------------------

--
-- Table structure for table `documentochklstportafolio`
--

CREATE TABLE `documentochklstportafolio` (
  `iddocumentochklstportafolio` int NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `idchklstportafolio` int DEFAULT NULL,
  `orden` int DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `documentochklstportafolio`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documentochklstportafolio`
--
ALTER TABLE `documentochklstportafolio`
  ADD PRIMARY KEY (`iddocumentochklstportafolio`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documentochklstportafolio`
--
ALTER TABLE `documentochklstportafolio`
  MODIFY `iddocumentochklstportafolio` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
