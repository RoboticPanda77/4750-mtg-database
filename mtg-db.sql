-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 11:45 PM
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
-- Database: `mtg-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `a_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `start_sid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `cn` int(11) NOT NULL,
  `foil` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `card_on_wishlist`
--

CREATE TABLE `card_on_wishlist` (
  `u_id` int(11) NOT NULL,
  `cn` int(11) NOT NULL,
  `foil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drawn_by`
--

CREATE TABLE `drawn_by` (
  `a_id` int(11) NOT NULL,
  `cn` int(11) NOT NULL,
  `foil` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friends_with`
--

CREATE TABLE `friends_with` (
  `u_id1` int(11) NOT NULL,
  `u_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `is_from`
--

CREATE TABLE `is_from` (
  `u_id` int(11) NOT NULL,
  `p_num` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owns_card`
--

CREATE TABLE `owns_card` (
  `u_id` int(11) NOT NULL,
  `cn` int(11) NOT NULL,
  `foil` tinyint(1) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owns_pack`
--

CREATE TABLE `owns_pack` (
  `u_id` int(11) NOT NULL,
  `p_num` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `pack_contains`
--

CREATE TABLE `pack_contains` (
  `u_id` int(11) NOT NULL,
  `p_num` int(11) NOT NULL,
  `cn` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `foil` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

CREATE TABLE `sets` (
  `s_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `release_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `set_contains`
--

CREATE TABLE `set_contains` (
  `s_id` int(11) NOT NULL,
  `cn` int(11) NOT NULL,
  `foil` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `networth` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `u_id` int(11) NOT NULL,
  `val_d` int(11) DEFAULT NULL,
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`cn`,`foil`);

--
-- Indexes for table `card_on_wishlist`
--
ALTER TABLE `card_on_wishlist`
  ADD PRIMARY KEY (`u_id`,`cn`,`foil`);

--
-- Indexes for table `drawn_by`
--
ALTER TABLE `drawn_by`
  ADD PRIMARY KEY (`a_id`,`cn`,`foil`);

--
-- Indexes for table `friends_with`
--
ALTER TABLE `friends_with`
  ADD PRIMARY KEY (`u_id1`,`u_id2`);

--
-- Indexes for table `is_from`
--
ALTER TABLE `is_from`
  ADD PRIMARY KEY (`u_id`,`p_num`,`s_id`);

--
-- Indexes for table `owns_card`
--
ALTER TABLE `owns_card`
  ADD PRIMARY KEY (`u_id`,`cn`,`foil`);

--
-- Indexes for table `owns_pack`
--
ALTER TABLE `owns_pack`
  ADD PRIMARY KEY (`u_id`,`p_num`,`s_id`);

--
-- Indexes for table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`u_id`,`p_num`,`s_id`),
  ADD KEY `FK_SET` (`s_id`);

--
-- Indexes for table `pack_contains`
--
ALTER TABLE `pack_contains`
  ADD PRIMARY KEY (`u_id`,`p_num`,`cn`,`s_id`,`foil`);

--
-- Indexes for table `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `set_contains`
--
ALTER TABLE `set_contains`
  ADD PRIMARY KEY (`s_id`,`cn`,`foil`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`u_id`);

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
