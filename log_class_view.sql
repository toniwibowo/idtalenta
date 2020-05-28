-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2020 at 02:53 PM
-- Server version: 10.3.23-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wklvzxlr_MENTOR`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_class_view`
--

CREATE TABLE `log_class_view` (
  `log_id` int(11) UNSIGNED NOT NULL,
  `mentor_class_id` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `view_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_class_view`
--

INSERT INTO `log_class_view` (`log_id`, `mentor_class_id`, `ip_address`, `view_date`) VALUES
(1, 7, '114.124.161.196', '2020-03-27'),
(2, 1, '125.161.128.212', '2020-03-27'),
(3, 1, '114.124.161.196', '2020-03-27'),
(4, 2, '125.161.128.212', '2020-03-27'),
(5, 1, '114.125.200.15', '2020-04-04'),
(6, 1, '114.125.200.35', '2020-04-04'),
(7, 1, '114.125.216.251', '2020-04-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_class_view`
--
ALTER TABLE `log_class_view`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_class_view`
--
ALTER TABLE `log_class_view`
  MODIFY `log_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
