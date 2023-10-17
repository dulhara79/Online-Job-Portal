-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 07:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobdescription`
--

CREATE TABLE `jobdescription` (
  `jobID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `jobType` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contactNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobdescription`
--

INSERT INTO `jobdescription` (`jobID`, `name`, `jobType`, `salary`, `address`, `contactNo`) VALUES
(51, 'ABC Company', 'Information Technology', 100000, 'software engineer', 2023),
(53, 'AMD Hospitals', 'Healthcare', 80000, 'Radiographer', 2023),
(54, 'SIPSA Education', 'Education And Training', 50000, 'Teachers', 2021),
(55, 'VIU Company', 'Marketing and Advertising', 60000, 'Digital Marketers', 2023),
(56, 'XYZ Company', 'Creative Arts', 50000, 'Writers', 2023);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobdescription`
--
ALTER TABLE `jobdescription`
  ADD PRIMARY KEY (`jobID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobdescription`
--
ALTER TABLE `jobdescription`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
