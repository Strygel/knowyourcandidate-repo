-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2022 at 03:27 AM
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
-- Table structure for table `governor_candidates`
--

CREATE TABLE `governor_candidates` (
  `id` int(255) NOT NULL,
  `candidate` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `partylist` varchar(255) NOT NULL,
  `picture_dir` text NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `birthdate` date NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `honorary_degree` text NOT NULL,
  `tertiary` text NOT NULL,
  `political_background` text NOT NULL,
  `regions` varchar(255) NOT NULL,
  `provinces` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mayor_candidates`
--

CREATE TABLE `mayor_candidates` (
  `id` int(255) NOT NULL,
  `candidate` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `partylist` varchar(255) NOT NULL,
  `picture_dir` text NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `birthdate` date NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `honorary_degree` text NOT NULL,
  `tertiary` text NOT NULL,
  `political_background` text NOT NULL,
  `regions` varchar(255) NOT NULL,
  `provinces` varchar(255) NOT NULL,
  `city_or_municipalities` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pres_candidates`
--

CREATE TABLE `pres_candidates` (
  `id` int(255) NOT NULL,
  `candidate` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `partylist` varchar(255) NOT NULL,
  `picture_dir` text NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `birthdate` date NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `honorary_degree` text NOT NULL,
  `tertiary` text NOT NULL,
  `political_background` text NOT NULL,
  `stance_divorce` varchar(255) NOT NULL,
  `stance_death_penalty` varchar(255) NOT NULL,
  `stance_same_sex_marriage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vcpres_candidates`
--

CREATE TABLE `vcpres_candidates` (
  `id` int(255) NOT NULL,
  `candidate` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `partylist` varchar(255) NOT NULL,
  `picture_dir` text NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `birthdate` date NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `honorary_degree` text NOT NULL,
  `tertiary` text NOT NULL,
  `political_background` text NOT NULL,
  `stance_divorce` varchar(255) NOT NULL,
  `stance_death_penalty` varchar(255) NOT NULL,
  `stance_same_sex_marriage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `governor_candidates`
--
ALTER TABLE `governor_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mayor_candidates`
--
ALTER TABLE `mayor_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pres_candidates`
--
ALTER TABLE `pres_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vcpres_candidates`
--
ALTER TABLE `vcpres_candidates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `governor_candidates`
--
ALTER TABLE `governor_candidates`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `mayor_candidates`
--
ALTER TABLE `mayor_candidates`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pres_candidates`
--
ALTER TABLE `pres_candidates`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `vcpres_candidates`
--
ALTER TABLE `vcpres_candidates`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
