-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 04:43 AM
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
-- Table structure for table `card_on_wishlist`
--

CREATE TABLE `card_on_wishlist` (
  `u_id` int(11) NOT NULL,
  `cn` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_on_wishlist`
--

INSERT INTO `card_on_wishlist` (`u_id`, `cn`, `s_id`) VALUES
(1, 1, 226),
(1, 1, 227),
(1, 2, 226),
(1, 2, 227),
(1, 3, 226),
(1, 4, 226),
(1, 5, 226),
(1, 6, 226),
(3, 9, 227),
(3, 57, 226),
(3, 132, 227),
(3, 139, 227),
(3, 205, 226),
(3, 241, 227),
(4, 100, 226),
(4, 109, 227),
(4, 132, 227),
(4, 155, 226),
(4, 170, 226),
(4, 187, 226);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_on_wishlist`
--
ALTER TABLE `card_on_wishlist`
  ADD PRIMARY KEY (`u_id`,`cn`,`s_id`),
  ADD KEY `cn` (`cn`),
  ADD KEY `s_id` (`s_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card_on_wishlist`
--
ALTER TABLE `card_on_wishlist`
  ADD CONSTRAINT `card_on_wishlist_ibfk_1` FOREIGN KEY (`cn`) REFERENCES `cards` (`cn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `card_on_wishlist_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `card_on_wishlist_ibfk_3` FOREIGN KEY (`s_id`) REFERENCES `cards` (`setCode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
