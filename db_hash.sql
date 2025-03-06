-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220531.aadb8cc914
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 06, 2025 at 07:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hash`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'maharai', '$2y$10$3/WvN387ypFdNDrlkr0IgO01unP.WBVUXh7r97.YISXJHUNkRpcYq'),
(2, 'sheryl', '$2y$10$3olWxnhYt5fC053xj4EvG.FtuH3PoIwE2O0pEBwCSNWdt8mo4iAeq'),
(3, 'admin', '$2y$10$PIG2RR1K.d985qKcGZgNSOUVlrlFjFiLqiLTv5TY90BOwNDGLD.kW'),
(4, 'userip', '$2y$10$I03MCVpWuFITkU33njllWOCXvkBCxmHcAeqLWvklvQYraLuFwRypS'),
(5, 'ratelimit', '$2y$10$fRBfcYZhEGgClPoZSjB1cOKTaaCZ.YKZawu5UjCYCQaUQ/Xc3mwDm'),
(6, 'user', '$2y$10$pnkuK8bSK8c53UgA1srL3eTkolsOHYPfxUiuiK/bau5oX8.tNJRqa'),
(7, 'sheryl789', '$2y$10$rOn7Zv67xQSiZZtvTaimAO3HjdmoWhkTXuCJbUwBZ1SvHMyys1dYS'),
(8, 'sheryl111', '$2y$10$AYeN6wxXlFprKYNp5r3dfOwggkWVKa1Lc/4Ta.CxD1SoSiuKuc/Ya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



