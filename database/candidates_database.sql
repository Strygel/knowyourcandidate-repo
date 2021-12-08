-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 05:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `candidates_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_pres`
--

CREATE TABLE `candidate_pres` (
  `id` int(30) NOT NULL,
  `name` varchar(256) NOT NULL,
  `fileName` varchar(256) NOT NULL,
  `credentials` text NOT NULL,
  `biography` text NOT NULL,
  `sources` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_pres`
--

INSERT INTO `candidate_pres` (`id`, `name`, `fileName`, `credentials`, `biography`, `sources`) VALUES
(66, 'Mark Pandan', '244401524_256796503030816_6999178073096241536_n.jpg', 'Testing', 'Testing', 'Testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_pres`
--
ALTER TABLE `candidate_pres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_pres`
--
ALTER TABLE `candidate_pres`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
