-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 04:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtg-db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `pack_contains`
--

CREATE TABLE `pack_contains` (
  `u_id` int(11) NOT NULL,
  `p_num` int(11) NOT NULL,
  `cn` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pack_contains`
--

INSERT INTO `pack_contains` (`u_id`, `p_num`, `cn`, `s_id`) VALUES
(1, 1, 1, 226),
(2, 1, 1, 226),
(3, 1, 1, 226),
(4, 1, 1, 226),
(5, 1, 1, 226);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pack_contains`
--
ALTER TABLE `pack_contains`
  ADD PRIMARY KEY (`u_id`,`p_num`,`cn`,`s_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `cn` (`cn`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pack_contains`
--
ALTER TABLE `pack_contains`
  ADD CONSTRAINT `pack_contains_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `packs` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pack_contains_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `packs` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pack_contains_ibfk_3` FOREIGN KEY (`cn`) REFERENCES `cards` (`cn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
