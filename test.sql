-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 02:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE `profile_pic` (
  `id` bigint(20) NOT NULL,
  `location` varchar(64) NOT NULL,
  `is_valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_pic`
--

INSERT INTO `profile_pic` (`id`, `location`, `is_valid`) VALUES
(1, 'uploads/san_pro2.jpg', 1),
(2, 'uploads/san_pro2.jpg', 1),
(3, 'uploads/san_pro2.jpg', 1),
(4, 'uploads/san_pro2.jpg', 1),
(5, 'uploads/san_pro2.jpg', 1),
(6, 'uploads/san_pro2.jpg', 1),
(7, 'uploads/san_pro2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `Mobile_Number` int(11) NOT NULL,
  `is_valid` tinyint(1) NOT NULL DEFAULT 1,
  `DOB` date DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `City` varchar(32) DEFAULT NULL,
  `State` varchar(32) DEFAULT NULL,
  `Country` varchar(32) DEFAULT NULL,
  `pic_id` bigint(20) DEFAULT NULL,
  `role_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `Mobile_Number`, `is_valid`, `DOB`, `Address`, `City`, `State`, `Country`, `pic_id`, `role_id`) VALUES
(10, 'Sangamesh Bappanna', 'san', 'sangamesh.b', '9f5a44a734ac9e43b5968d0f3b71d69b', 2147483647, 1, '2021-03-10', 'H-no-19-1-194', NULL, 'Karn?taka', 'India', 0, 1),
(11, 'samarth', 'san1', 'sangamesh.b', '81dc9bdb52d04dc20036dbd8313ed055', 2147483647, 1, '2021-03-10', 'H-no-19-1-194', NULL, 'Karn?taka', 'India', 0, NULL),
(12, 'Sangamesh Bappanna', 'san2', 'sangamesh.b', '81dc9bdb52d04dc20036dbd8313ed055', 2147483647, 1, '2021-03-31', 'H-no-19-1-194', NULL, 'Karn?taka', 'India', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile_pic`
--
ALTER TABLE `profile_pic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile_pic`
--
ALTER TABLE `profile_pic`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
