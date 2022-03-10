-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2022 at 12:34 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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

--
-- Dumping data for table `pres_candidates`
--

INSERT INTO `pres_candidates` (`id`, `candidate`, `sex`, `partylist`, `picture_dir`, `nickname`, `age`, `birthdate`, `hometown`, `honorary_degree`, `tertiary`, `political_background`, `stance_divorce`, `stance_death_penalty`, `stance_same_sex_marriage`) VALUES
(71, 'Ernie Abella', 'Male', 'Independent', '../pictures/presidents/Ernie Abella-president.png', 'Ernie', 72, '1972-07-11', 'Davao City, Davao Region', 'No Data Available', 'Ateneo de Davao University - \r\nBA in pre-medicine | Silliman University - Master`s Degree in Divinity | Asian Institute of Management - Master`s Degree in Social Development', 'Undersecretary for Strategic \r\nCommunications and Research of the Department of Foreign Affairs (2017–2021).| Presidential Spokesperson (2016–2017)', 'Unknown', 'Yes', 'Unknown'),
(72, 'Leody De Guzman', 'Male', 'Partido Lakas ng Masa', '../pictures/presidents/Leody De Guzman-president.png', 'Ka Leody', 62, '1959-07-25', 'Naujan, Oriental Mindoro', 'No Data Available', 'Philippine Maritime Institute - Bachelor of Science in Customs Administration', 'Chairman - Bukluran ng Manggagawang Pilipino (BMP) | Councilor - International Council, International Center for Labor Solidarity | Vice President - Asia Regional Organization of Bank, Insurance and Finance Unions', 'Yes', 'No', 'Yes'),
(73, 'Isko Moreno Domagoso ', 'Male', 'Aksyon Demokratiko', '../pictures/presidents/Isko Moreno Domagoso -president.png', 'Yorme', 47, '1974-10-24', 'Manila, Philippines', 'No Data Available', 'Harvard University - Executive Leadership Program | Oxford University - Strategic Leadership Program | US State Department in Washington DC - International Visitor Leadership Program | University of the Philippines, Diliman - Executive Leadership Program | Pamantasan ng Lungsod ng Maynila - Public Administration | Arellano University - Bachelor of Laws', 'Councilor of Manila, 1st District (1998-2007) | Manila Vice Mayor (2007-2013, 2013-2016) | Chairman of the Board of the North Luzon Railways Corporation (July 2017--October 2017) | Undersecretary of Social Welfare and Development for Luzon Affairs (May2018 - October 2018) | 27th Mayor of Manila (2019-present)', 'No', 'No', 'No'),
(74, 'Norberto Gonzales', 'Male', 'Partido Demokratiko Sosyalista ng Pilipinas', '../pictures/presidents/Norberto Gonzales-president.png', 'N/A', 74, '1947-04-17', 'Balanga, Bataan', 'No Data Available', 'Ateneo de Davao University - Bachelor of Science in Pre-Medicine | National Defense College of the Philippines - Master in National Security Administration', '36th Secretary of the Department of the National Defense of the Philippines under the administration of President Gloria Macapagal Arroyo | Presidential Adviser for Special Concerns to President Gloria Macapagal-Arroyo (February 2001 to January 2004) | Arroyo`s Presidential Chief of Staff (August 2004 - February 2005) | National Security Adviser and Director-General of the National Security Council.(February of 2005 - June of 2010)', 'Unknown', 'Unknown', 'Unknown'),
(75, 'Faisal Mangondato', 'Male', 'Katipunan ng Kamalayang Kayumanggi ', '../pictures/presidents/Faisal Mangondato-president.png', 'Fai', 59, '1962-12-30', 'Ramain Ditsaan, Lanao del Sur', 'No Data Available', 'B.S. Medical Technology, Philippine Women`s University', 'No Data Available', 'Yes', 'Yes', 'Yes'),
(76, 'Ping Lacson', 'Male', 'Partido Para sa Demokratikong Reporma', '../pictures/presidents/Ping Lacson-president.png', 'Ping', 73, '1948-06-01', 'Imus, Cavite', 'No Data Available', 'Masters in Government Management\r\nPamantasan ng Lungsod ng Maynila (1995-1996)', 'Senator (2001-2013, 2016-present) Presidential Assistant for Rehabilitation and Recovery', 'Yes', 'Unknown', 'No'),
(77, 'Bongbong Marcos', 'Male', 'Partido Federal ng Pilipinas', '../pictures/presidents/Bongbong Marcos-president.png', 'Bongbong', 65, '1957-09-13', 'Ilocos Norte', 'No Data Available', 'Special Diploma in Social Studies, Oxford University', 'Senator of the Philippines (2010-2016) | Congressman, Ilocos Norte (2nd District) (2007-2010) | Governor, Ilocos Norte (1998-2007) | Congressman, Ilocos Norte (2nd District) (1992-1995) | Governor, Ilocos Norte (1983-1986) | Vice-Governor, Ilocos Norte (1980-1983)', 'Unknown', 'Yes', 'Yes'),
(78, 'Jose Montemayor Jr.', 'Male', 'Democratic Party of the Philippines', '../pictures/presidents/Jose Montemayor Jr.-president.png', 'Jojomo', 73, '1948-06-01', 'Imus, Cavite', 'No Data Available', 'Master of Divinity, Farcorner`s International Theological Seminary | Phd Public Health, Ruggero Univ. | International Master of Laws (LL.M. Cand.) - Human Rights, Ateneo de Manila University | Masters in Business Administration, University of the Philippines | Bachelor of Laws (LLB), Philippine Law School | Research fellow in cardiac catheterization, St. Luke`s Heart Institute | Fellowship in adult cardiology, St. Luke’s Heart Institute | Post graduate internship and residency in internal medicine, Cardinal Santos Medical Center | Doctor of Medicine, Far Eastern University | B.S. Medical Technology, Far Eastern University', 'No Data Available', 'No', 'Unknown', 'Unknown'),
(79, 'Manny Pacman Pacquiao', 'Male', 'Abag Promdi', '../pictures/presidents/Manny Pacman Pacquiao-president.png', 'Manny', 43, '1978-12-17', 'General Santos City', 'Doctorate of Humanities, \r\nSouthwestern University', 'Bachelor`s Degree in Political Science Majoring in Local Government Administration through the Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP), Philippine Councilors League-Legislative Academy ,2019 | BSBA Marketing Management, Notre Dame of Dadiangas University | Political Science, University of Makati\r\n', 'Representative Sarangani Province, 15th Congress, 2010 to 2013 | Representative Sarangani Province, 16th Congress, 2013 to 2016 | Senator, 17th Congress, 2016', 'Yes', 'Yes', 'No'),
(80, 'Leni Robredo', 'Female', 'Independent', '../pictures/presidents/Leni Robredo-president.png', 'Leni', 57, '1965-04-23', 'Naga, Camarines Sur', 'Doctor in Public Administration, Polytechnic University of the Philippines | Doctor of Humanities, University of Saint Anthony in Naga City | Doctor of Laws, University of the Cordilleras in Baguio City', 'B.A. in Economics, University of the Philippines-Diliman | Juris Doctor, University of Nueva Caceres | Passed the Bar Examinations in 1996 and admitted to the Philippine Bar Association', 'Vice President of the Philippines, 2016 | Representative of the 3rd District of Camarines Sur, 2013 to 2016', 'No', 'No', 'No');

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
-- Dumping data for table `vcpres_candidates`
--

INSERT INTO `vcpres_candidates` (`id`, `candidate`, `sex`, `partylist`, `picture_dir`, `nickname`, `age`, `birthdate`, `hometown`, `honorary_degree`, `tertiary`, `political_background`, `stance_divorce`, `stance_death_penalty`, `stance_same_sex_marriage`) VALUES
(11, 'Lito Atienza', 'Male', 'Abag Promdi', '../pictures/vc_presidents/Lito Atienza-vcpresident.png', 'Lito', 80, '1941-08-10', 'San Andres Bukid, Manila', 'Doctor of Public Management, Honoris Causa, Pamantasan ng Lungsod ng Maynila', 'Master in Urban Planning, Pamantasan ng Lungsod ng Maynila | Bachelor in Public Administration, Pamantasan ng Lungsod ng Maynila\r\n', 'Deputy Speaker of the House of Representatives, Nov. 2020 to present | Representative of Buhay Party-List Group, House of Representatives, 2013 to present | Secretary, Department of Environment and Natural Resources, 2007 to 2009 | Mayor, Manila City, 1998 - 2007 | Vice Mayor, Manila City, 1992 - 1998', 'Unknown', 'Unknown', 'Unknown'),
(12, 'Walden Bello ', 'Male', 'Partido Lakas ng Masa ', '../pictures/vc_presidents/Walden Bello -vcpresident.png', 'N/A', 76, '1945-11-11', 'Cardona , Rizal', 'No Data Available', 'BA in Humanities, Ateneo de Manila University, 1966 | MA in Sociology, Princeton University, 1972 | Ph.D in Sociology, Princeton University, 1975', 'Akbayan Representative, 14th Congress, served from 2009 to 2010 | Akbayan Representative, 15th Congress, 2010 to 2013 | Akbayan Representative, 14th Congress, 2013 to 2015 (resigned)', 'Unknown', 'Unknown', 'Unknown'),
(13, 'Rizalito David', 'Male', 'Democratic Party of the Philippines', '../pictures/vc_presidents/Rizalito David-vcpresident.png', 'N/A', 60, '1962-01-12', 'Tondo, Manila', 'No Data Available', 'Sociology and Environmental Science (minor in Rural Development), University of the Philippines - Los Baños', 'Council Member, Koalisyong Katoliko Kristyano | Executive Director, Pro-Life Philippoines, Inc.| Radio commentator, Radio Veritas, Gising Kapatid and Turo ni Ina | Head Executive Assistant and Political Affairs Director, Sen. Robert Jaworski, Philippine Senate, 1998 - 2004 | Consultant on Political Affairs and Head of Political Operations in Mindanao, Deputy Speaker Hernando Perez, Houses of Representatives, 1997 - 1998 | Executive Assistant (1993 - 1995) and Political Affairs Director (1995 - 1996), Sen. Francisco Tatad, Philippine Senate | Chief, Research Monitoring Staff, Liberal Party-PDP Laban 1992 Presidential Elections, 1992 | Former Chief, Strategic Planning Section, Department of Environment and Natural Resources, 1990 - 1992\r\n', 'Unknown', 'Unknown', 'Unknown'),
(14, 'Sara Duterte', 'Female', 'Lakas Christian Muslim Democrats', '../pictures/vc_presidents/Sara Duterte-vcpresident.png', 'Inday Sara', 43, '1978-05-31', 'Davao City', 'No Data Available', 'Admitted to the Philippine Bar, 2005 | Bachelor of Laws, San Sebastian College – Recoletos, 2005 | Bachelor of Science, Respiratory Therapy, San Pedro College, 1999', 'Mayor, Davao City, 2010 - 2013; 2016 - present | Partner, Carpio & Duterte Lawyers, 2013 - 2016 | Chairman, Board-Regional Development Committee-Mindanao Area Committee of the National Economic and Development Authority | Chairperson, Regional Development Council | Vice Mayor, Davao City, 2007 – 2010 | Court Attorney, Office of the Associate Justice Romeo J. Carpio Sr., Supreme Court', 'Unknown', 'Unknown', 'Unknown'),
(15, 'Manny Lopez SD', 'Male', 'Workers and Peasants Party', '../pictures/vc_presidents/Manny Lopez SD-vcpresident.png', 'N/A', 63, '2022-03-10', 'Moncada, Tarlac', 'No Data Available', 'Business Economics Program, University of Asia and the Pacific Juris Doctor, Pacific Coast University | Business Law, Los Angeles City College | MBA, University of California, Los Angeles | Political Science and Economics, University of the Philippines - Diliman, 1981', 'Vice Chairman, National Advisory Board, Labor Party of the Philippines (a.k.a. The Workers and Peasants Party | President and General Manager at NFA Grainscor\r\n', 'Unknown', 'Unknown', 'Unknown'),
(16, 'Doc Willie Ong', 'Male', 'Aksyon Demokratiko', '../pictures/vc_presidents/Doc Willie Ong-vcpresident.png', 'N/A', 58, '1963-10-24', 'Tondo, Manila City', 'No Data Available', 'B.S. Botany, University of the Philippines-Diliman | Medical degree, De La Salle Health Science Institute | Masters in Public Health, UP - Manila', 'No Data Available', 'Unknown', 'Unknown', 'Unknown'),
(17, 'Francis Nepomuceno Pangilinan', 'Male', 'Liberal Party', '../pictures/vc_presidents/Francis Nepomuceno Pangilinan-vcpresident.png', 'Kiko', 58, '1963-08-24', 'Manila City, Metro Manila', 'No Data Available', 'Bachelor of Arts in English, Major in Comparative Literature, University of the Philippines Diliman | Bachelor of Laws, University of the Philippines Diliman | Masters in Public Administration, John F. Kennedy School of Government Harvard University Cambridge, 1997', 'Member, Senate Electoral Tribunal 18th Congress, July 2020 – present | Campaign Manager, Otso Diretso Senate slate (Liberal Party coalition), Feb. - May 2019 | Minority Leader, Commission on Appointments 17th to 18th Congress, May 2017 – June 2020 | Senator 17th to 18th Congress, June 2016 – present | Cabinet Secretary, Presidential Assistant for Food Security and Agricultural | Modernization - Office of the President, May 2014 – Sept. 2015 | Campaign Manager, Liberal Party Senate slate, Feb. - May 2010 | Senate Majority Leader, 2004 – 2008 | Senator, 12th to 14th Congress, 2001 – 2013', 'Unknown', 'Unknown', 'Unknown'),
(18, 'Carlos Gelacio Serapio ', 'Male', 'Katipunan ng Kamalayang Kayumanggi ', '../pictures/vc_presidents/Carlos Gelacio Serapio -vcpresident.png', 'N/A', 71, '1950-10-04', 'N/A', 'No Data Available', 'Serapio & de Castro Law Offices | Office of the Executive Secretary of President Benigno Aquino - Lead of Consultant Pool | Office of the Presidential Adviser on Political Affairs - Consultant | National Coastwatch Center - Office of the President - Consultant | United Nations Development Programme Local Democracy Project in Asia - Consultant | USAID Inventory and Database Project for the Court of Tax Appeals - Project Manager | Author, Christianism: A Philosophical Guide to Political Praxis | Chair and operator, LABAN Poll Watching Operations Center (1978)', 'LLB,University of the Philippines, 1975 | AB Political Science, Ateneo de Manila University, 1970', 'Unknown', 'Unknown', 'Unknown'),
(19, 'Vicente Castelo Sotto III', 'Male', 'Nationalist People`s Coalition ', '../pictures/vc_presidents/Vicente Castelo Sotto III-vcpresident.png', 'Tito Sotto', 73, '1948-08-24', 'N/A', 'No Data Available', 'Executive Program for Leaders in Development at the Harvard \r\nUniversity John F. Kennedy School of Government that he \r\ncompleted in June 2000 | AB English, Colegio de San Juan de Letran', 'Senate President (2018-present) | Senate Majority Floor Leader (2016-2018) | Senator (2013-2016) | Senate Majority Floor Leader (2010-2013) | Dangerous Drugs Board chairman (2008-2009) | Senator (1998-2004) | Senator (1992-1998)\r\n', 'Unknown', 'Unknown', 'Unknown');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `vcpres_candidates`
--
ALTER TABLE `vcpres_candidates`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
