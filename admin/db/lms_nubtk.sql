-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 08:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_nubtk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `email`, `job`, `password`) VALUES
(9, 'Adminstrator', 'admin_123', '', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'sadia', 'sadia', 'sadiadipa99999@gmail.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'Afsana yasmin', 'Afsana ', 'afsanayasmin224@gmail.com', 'ceo', 'd5d71d42421082e7579645aeb53cb794');

-- --------------------------------------------------------

--
-- Table structure for table `bookdata`
--

CREATE TABLE `bookdata` (
  `id` varchar(225) NOT NULL,
  `book_name` varchar(225) NOT NULL,
  `writer_name` varchar(225) DEFAULT NULL,
  `referred_by` varchar(225) DEFAULT NULL,
  `book_category` varchar(225) NOT NULL,
  `department` varchar(225) NOT NULL,
  `edition` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `pdf` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookdata`
--

INSERT INTO `bookdata` (`id`, `book_name`, `writer_name`, `referred_by`, `book_category`, `department`, `edition`, `date`, `pdf`) VALUES
('03', 'database management system', 'x', 'y', 'eeeg', 'CSE', '4th', '2022-04-19', 'Screenshot (3).png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` varchar(225) NOT NULL,
  `book_name` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `book_name`, `category`, `date`) VALUES
('', 'c programming language', 'sjdgv', '2022-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(225) NOT NULL,
  `department` varchar(225) NOT NULL,
  `full_form` varchar(255) NOT NULL,
  `date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `full_form`, `date`) VALUES
(1, 'CSE', 'computer science and engineering', '2022-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`) VALUES
(0, 'sadiadipa99999@gmail.com', '3fcc11a55f04ff17974e95149dcb1d9efbf0f6a57cefa0703b0b5359ec31ba9177774d380d9db86d23683876dfcc852825aa');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `father_name` varchar(225) NOT NULL,
  `mother_name` varchar(225) NOT NULL,
  `department` varchar(225) NOT NULL,
  `dob` varchar(225) NOT NULL,
  `mail` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `img` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `father_name`, `mother_name`, `department`, `dob`, `mail`, `status`, `contact`, `img`, `password`) VALUES
('45678', 'Afsana mimi', 'a', 'b', 'BBA', '10 jun 1999', 'dffgjjl@gmail.com', 'Core Faculty', '01726888910', 'Screenshot (3).png', ''),
('4678689', 'sadia sultana', 'A', 'B', 'CSE', '10 jun 2000', 'dffgjjl@gmail.com', 'Student', '0175490843698', 'Screenshot (2).png', '8888888');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookdata`
--
ALTER TABLE `bookdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
