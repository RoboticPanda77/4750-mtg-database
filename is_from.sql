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
-- Table structure for table `is_from`
--

CREATE TABLE `is_from` (
  `u_id` int(11) NOT NULL,
  `p_num` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `is_from`
--

INSERT INTO `is_from` (`u_id`, `p_num`, `s_id`) VALUES
(1, 1, 226),
(2, 2, 226),
(3, 3, 227),
(4, 4, 227),
(5, 6, 226);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `is_from`
--
ALTER TABLE `is_from`
  ADD PRIMARY KEY (`u_id`,`p_num`,`s_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `is_from`
--
ALTER TABLE `is_from`
  ADD CONSTRAINT `is_from_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `packs` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_from_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `sets` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
