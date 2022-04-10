-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 04:37 AM
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
-- Table structure for table `packs`
--

CREATE TABLE `packs` (
  `u_id` int(11) NOT NULL,
  `p_num` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `val_d` int(11) DEFAULT NULL,
  `p_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packs`
--

INSERT INTO `packs` (`u_id`, `p_num`, `s_id`, `val_d`, `p_type`) VALUES
(1, 1, 226, 40, 'yes'),
(2, 2, 226, 50, 'no'),
(3, 3, 227, 123456, 'abc'),
(4, 4, 227, 3414, 'bbc'),
(5, 6, 226, 41, 'sixpack');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`u_id`,`p_num`,`s_id`),
  ADD KEY `FK_SET` (`s_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `packs`
--
ALTER TABLE `packs`
  ADD CONSTRAINT `FK_SET` FOREIGN KEY (`s_id`) REFERENCES `sets` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
