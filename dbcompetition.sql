-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 03:03 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcompetition`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcompetitors`
--

CREATE TABLE `tblcompetitors` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `mi` varchar(2) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `country_id` int(2) NOT NULL,
  `skill_id` int(2) NOT NULL,
  `status_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcompetitors`
--

INSERT INTO `tblcompetitors` (`ID`, `firstname`, `mi`, `lastname`, `country_id`, `skill_id`, `status_id`) VALUES
(2, 'Percian', 'C.', 'Borja', 1, 1, 2),
(3, 'Richmons', 'L.', 'Carabeo', 3, 3, 1),
(4, 'Kenneth', 'S.', 'Dimaculangan', 4, 4, 2),
(5, 'Eric', 'C.', 'Almouguerra', 2, 3, 1),
(6, 'JAM', 'C.', 'Tolentino', 2, 2, 2),
(7, 'Windell', 'A.', 'Llamasares', 6, 1, 2),
(8, 'Rusty', 'M,', 'Palacay', 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcountry`
--

CREATE TABLE `tblcountry` (
  `ID` int(11) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcountry`
--

INSERT INTO `tblcountry` (`ID`, `country`) VALUES
(1, 'China'),
(2, 'India'),
(3, 'Japan'),
(4, 'Philippines'),
(5, 'Singapore'),
(6, 'Thailand');

-- --------------------------------------------------------

--
-- Table structure for table `tblskills`
--

CREATE TABLE `tblskills` (
  `ID` int(11) NOT NULL,
  `skill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblskills`
--

INSERT INTO `tblskills` (`ID`, `skill`) VALUES
(1, 'Computer Network'),
(2, 'Database Management'),
(3, 'Graphics'),
(4, 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `tblstatus`
--

CREATE TABLE `tblstatus` (
  `ID` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstatus`
--

INSERT INTO `tblstatus` (`ID`, `status`) VALUES
(1, 'archive'),
(2, 'registered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcompetitors`
--
ALTER TABLE `tblcompetitors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcountry`
--
ALTER TABLE `tblcountry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblskills`
--
ALTER TABLE `tblskills`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstatus`
--
ALTER TABLE `tblstatus`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcompetitors`
--
ALTER TABLE `tblcompetitors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcountry`
--
ALTER TABLE `tblcountry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblskills`
--
ALTER TABLE `tblskills`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblstatus`
--
ALTER TABLE `tblstatus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
