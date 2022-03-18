-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 04:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4750-mtg-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends_with`
--

CREATE TABLE `friends_with` (
  `u_id1` int(11) NOT NULL,
  `u_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends_with`
--

INSERT INTO `friends_with` (`u_id1`, `u_id2`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 9),
(2, 3),
(2, 4),
(2, 5),
(5, 6),
(5, 7),
(8, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends_with`
--
ALTER TABLE `friends_with`
  ADD PRIMARY KEY (`u_id1`,`u_id2`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
