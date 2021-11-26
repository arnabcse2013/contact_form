-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 10:17 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_info`
--

CREATE TABLE `candidate_info` (
  `id` int(11) NOT NULL,
  `candidate_name` varchar(255) DEFAULT NULL,
  `candidate_mail` varchar(255) DEFAULT NULL,
  `candidate_number` varchar(10) DEFAULT NULL,
  `candidate_dob` varchar(50) DEFAULT NULL,
  `candidate_gender` varchar(10) DEFAULT NULL,
  `candidate_confirmation` varchar(5) DEFAULT NULL,
  `created_datetime` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_info`
--
ALTER TABLE `candidate_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_info`
--
ALTER TABLE `candidate_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
