-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 08:55 AM
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
-- Database: `candidates_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pres_candidates`
--

CREATE TABLE `pres_candidates` (
  `id` int(255) NOT NULL,
  `candidate` varchar(255) NOT NULL,
  `picture_dir` text NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `birthdate` date NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `honorary_degree` varchar(255) NOT NULL,
  `tertiary` varchar(255) NOT NULL,
  `political_background` text NOT NULL,
  `stance_divorce` varchar(255) NOT NULL,
  `stance_death_penalty` varchar(255) NOT NULL,
  `stance_same_sex_marriage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pres_candidates`
--

INSERT INTO `pres_candidates` (`id`, `candidate`, `picture_dir`, `nickname`, `age`, `birthdate`, `hometown`, `honorary_degree`, `tertiary`, `political_background`, `stance_divorce`, `stance_death_penalty`, `stance_same_sex_marriage`) VALUES
(1, 'Mark Pandan', '244401524_256796503030816_6999178073096241536_n.jpg', 'Mark', 20, '2001-09-24', 'Parañaque City', 'ASDF', 'ASDF', 'ASDF', 'Yes', 'No', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pres_candidates`
--
ALTER TABLE `pres_candidates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pres_candidates`
--
ALTER TABLE `pres_candidates`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
