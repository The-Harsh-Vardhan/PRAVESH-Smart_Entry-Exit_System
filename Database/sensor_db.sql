-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2024 at 08:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sensor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(80) NOT NULL,
  `admin_pwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pwd`) VALUES
(1, 'Admin', 'pravesh@gmail.com', '$2y$10$89uX3LBy4mlU/DcBveQ1l.32nSianDP/E1MfUh.Z.6B4Z0ql3y7PK');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `device_dep` varchar(20) NOT NULL,
  `device_uid` text NOT NULL,
  `device_date` date NOT NULL,
  `device_mode` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device_name`, `device_dep`, `device_uid`, `device_date`, `device_mode`) VALUES
(2, 'Pravesh', 'pravesh', '6d48fdd8117a4d35', '2024-10-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dht11`
--

CREATE TABLE `dht11` (
  `id` int(11) NOT NULL,
  `UID` varchar(11) NOT NULL,
  `date/time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dht11`
--

INSERT INTO `dht11` (`id`, `UID`, `date/time`) VALUES
(31, '83c9dcfa', '2024-11-08 20:36:03'),
(32, '83c9dcfa', '2024-11-08 20:37:51'),
(33, 'f30f8cdc', '2024-11-08 20:38:52'),
(34, 'f30f8cdc', '2024-11-08 20:40:17'),
(35, 'f30f8cdc', '2024-11-08 20:41:04'),
(36, 'f30f8cdc', '2024-11-08 23:58:08'),
(37, '83c9dcfa', '2024-11-08 23:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `serialnumber` double NOT NULL,
  `card_uid` varchar(30) NOT NULL,
  `device_uid` varchar(20) NOT NULL,
  `device_dep` varchar(20) NOT NULL,
  `checkindate` date NOT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time NOT NULL,
  `card_out` tinyint(1) NOT NULL DEFAULT 0,
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `return_time_estimate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `serialnumber`, `card_uid`, `device_uid`, `device_dep`, `checkindate`, `timein`, `timeout`, `card_out`, `reason`, `return_time_estimate`) VALUES
(12356, 'Kaushik Kumar Umar ', 0, '83c9dcfa', '', '', '2024-11-08', '20:37:51', '20:36:03', 0, 'new delhi', '2'),
(12357, 'harsh vardhan', 0, 'f30f8cdc', '', '', '2024-11-08', '20:41:04', '20:40:17', 0, 'uttar pradesh', '5'),
(12358, 'Kaushik Kumar ', 0, '83c9dcfa', '', '', '2024-11-08', NULL, '23:58:48', 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `serialnumber` double NOT NULL DEFAULT 0,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `card_uid` varchar(30) DEFAULT NULL,
  `card_select` tinyint(1) NOT NULL DEFAULT 0,
  `user_date` date NOT NULL DEFAULT current_timestamp(),
  `device_uid` varchar(20) NOT NULL DEFAULT '6d48fdd8117a4d35',
  `device_dep` varchar(20) NOT NULL DEFAULT 'Pravesh',
  `add_card` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `serialnumber`, `gender`, `email`, `card_uid`, `card_select`, `user_date`, `device_uid`, `device_dep`, `add_card`) VALUES
(12347, 'Kaushik Kumar ', 1, 'Male', 'goalinclined@gmail.com', '83c9dcfa', 0, '2024-11-08', '6d48fdd8117a4d35', 'Pravesh', 1),
(12350, NULL, 0, NULL, NULL, 'f30f8cdc', 0, '2024-11-08', '6d48fdd8117a4d35', 'Pravesh', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dht11`
--
ALTER TABLE `dht11`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dht11`
--
ALTER TABLE `dht11`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12359;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12351;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
