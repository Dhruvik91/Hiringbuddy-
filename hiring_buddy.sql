-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 08:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiring_buddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_applied_students`
--

CREATE TABLE `admin_applied_students` (
  `enro_no` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `last_cpi` float NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_companies`
--

CREATE TABLE `admin_companies` (
  `company_id` int(255) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_companies`
--

INSERT INTO `admin_companies` (`company_id`, `company_name`) VALUES
(2, 'TCS'),
(3, 'Infosys'),
(4, 'IBM Consulting'),
(5, 'Cognizant'),
(6, 'Capgemini'),
(7, 'Wipro'),
(8, 'HCL'),
(9, 'Ntt Data'),
(10, 'Fujitsu (IT Services)'),
(11, 'DXC Technology'),
(12, 'CGI'),
(13, 'prefortune softweb'),
(14, 'Tatvasoft'),
(15, 'helios'),
(16, 'torento'),
(17, 'Netflix'),
(1, 'Accenture');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `sr_no` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`sr_no`, `email`, `password`) VALUES
(2, 'ankitakaravadra42@gmail.com', '23456'),
(4, 'bhavishaodedra1@gmail.com', '45678'),
(1, 'joshimayankh312@gmail.com', '12345'),
(3, 'lavhadvani992@gmail.com', '34567');
(5, 'dg@gmail.com', '123456'),
-- --------------------------------------------------------

--
-- Table structure for table `admin_placed_students`
--

CREATE TABLE `admin_placed_students` (
  `enro_no` varchar(255) NOT NULL,
  `f_name` text NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `last_cpi` float NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `package` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_placed_students`
--

INSERT INTO `admin_placed_students` (`enro_no`, `f_name`, `d_name`, `last_cpi`, `company_name`, `package`) VALUES
('20BECE1505435', 'Darshana Harshadbhai Joshi', 'Computer Engineering ', 10, 'Netflix', 100),
('20BECE30109', 'Mayank Harshadbhai Joshi', 'Computer Engineering ', 8.92, 'Capgemini', 4.25),
('20BECE30110', 'Maya Harshbhai shinde', 'Civil Engineering ', 8.92, 'L&T', 4.25);

-- --------------------------------------------------------

--
-- Table structure for table `admin_students`
--

CREATE TABLE `admin_students` (
  `enro_no` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `last_cpi` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `package` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_students`
--

INSERT INTO `admin_students` (`enro_no`, `f_name`, `d_name`, `last_cpi`, `status`, `company`, `package`) VALUES
('20BECE30003', 'Smit Chahwala', 'Aeronautical Engineering', 8.56, 'placed', 'Tata', 5),
('20BECE30014', 'Ankita Vejabhai Karavadra', 'Computer Engineering', 8.21, 'placed', 'Evision', 2.5),
('20BECE30102', 'Lav Narotambhai Hadvani', 'Computer Engineering', 8.82, 'placed', 'capgemini', 4.25),
('20BECE30109', 'Mayank Harshadbhai Joshi', 'Computer Engineering', 8.92, 'Placed', 'Capgemini', 5.75);

-- --------------------------------------------------------

--
-- Table structure for table `admin_unplaced_students`
--

CREATE TABLE `admin_unplaced_students` (
  `enro_no` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `last_cpi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_unplaced_students`
--

INSERT INTO `admin_unplaced_students` (`enro_no`, `f_name`, `d_name`, `last_cpi`) VALUES
('19BECE12345', 'Alfredo devidson ', 'Mechanical Engineering', 7.9);

-- --------------------------------------------------------

--
-- Table structure for table `admin_upcoming`
--

CREATE TABLE `admin_upcoming` (
  `company_name` varchar(255) NOT NULL,
  `company_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_upcoming`
--

INSERT INTO `admin_upcoming` (`company_name`, `company_date`) VALUES
('Tesla', '2023-02-09'),
('Rubby', '2222-02-22'),
('Google', '2023-11-02'),
('Facebook', '2023-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `s_login_register`
--

CREATE TABLE `s_login_register` (
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `e_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `s_login_register`
--

INSERT INTO `s_login_register` (`f_name`, `email`, `e_no`, `password`) VALUES
('Ankita Vejabhai Karavadra', 'ankitakaravadra42@gmail.com', '19BECE30014', 'ankita'),
('Mayank Harshadbhai Joshi', 'joshimayankh312@gmail.com', '19BECE30109', 'mayank');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_placed_students`
--
ALTER TABLE `admin_placed_students`
  ADD UNIQUE KEY `enro_no` (`enro_no`);

--
-- Indexes for table `admin_students`
--
ALTER TABLE `admin_students`
  ADD UNIQUE KEY `enro_no` (`enro_no`);

--
-- Indexes for table `s_login_register`
--
ALTER TABLE `s_login_register`
  ADD UNIQUE KEY `e_no` (`e_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
