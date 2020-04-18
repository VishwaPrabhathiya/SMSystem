-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2020 at 09:27 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7319060_sm_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `indexno` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `indexno`, `email`, `password`, `type`) VALUES
(1, 'user', 'user', 1234, 'user@user.com', 'operator', 'operator'),
(2, 'vishwa', 'prabhathiya', 2018, 'admin@admin.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(2) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `noofyear` int(1) NOT NULL,
  `noofsub` int(3) NOT NULL,
  `noofcred` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `cname`, `noofyear`, `noofsub`, `noofcred`) VALUES
(4, 'Business Studies and Management', 3, 29, 90),
(2, 'Health Science Promotion', 4, 28, 120),
(1, 'Information Communication and Technology', 3, 25, 90),
(3, 'Physical Science', 4, 30, 120),
(5, 'Physical Science Management', 3, 25, 100);

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `id` int(3) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `message`, `date`) VALUES
(1, 'Mahapola sign sheets are available. Please sign them before 30th October 2018', '2018-09-24 18:33:25'),
(10, 'Good...', '2018-10-04 07:03:31'),
(11, 'very good......', '2018-10-04 14:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(3) NOT NULL,
  `indexno` int(5) NOT NULL,
  `year` year(4) NOT NULL,
  `sem` int(1) NOT NULL,
  `scode` varchar(10) NOT NULL,
  `result` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `indexno`, `year`, `sem`, `scode`, `result`) VALUES
(1, 3586, 2018, 1, 'ICT 2404', 'A+'),
(2, 3586, 2018, 2, 'ICT 2403', 'B+'),
(3, 3586, 2017, 1, 'ICT 2402', 'A-'),
(4, 3586, 2017, 2, 'ASB 1226', 'A+'),
(5, 7894, 2018, 1, 'ICT 2403', 'A'),
(6, 7894, 2018, 2, 'ICT 2402', 'C+'),
(7, 5612, 2018, 1, 'ICT 2403', 'C+'),
(8, 5678, 2017, 2, 'ICT 2404', 'B'),
(9, 5678, 2018, 2, 'ICT 2402', 'C+'),
(10, 5263, 2018, 2, 'ICT 2404', 'A+'),
(11, 5263, 2018, 1, 'ICT 2403', 'A-'),
(12, 5263, 2018, 2, 'ICT 2402', 'B+'),
(15, 5012, 2018, 1, 'ICT 2404', 'A+'),
(16, 5012, 2018, 1, 'ICT 2404', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(3) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `indexno` int(5) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `lname`, `gender`, `indexno`, `cname`, `email`, `password`) VALUES
(9, 'Tharika ', 'Wanninayaka ', 'Female', 3514, 'Information Communication and Technology', NULL, NULL),
(1, 'Vishwa', 'Prabhathiya', 'Male', 3586, 'Information Communication and Technology', 'vprabhathiya@gmail.com', 'vishwa'),
(5, 'usera', 'usera', 'Male', 4587, 'Health Science Promotion', NULL, NULL),
(7, 'mini', 'mini', 'Male', 4589, 'Physical Science', NULL, NULL),
(8, 'Kumari', 'Kumari', 'Female', 5263, 'Information Communication and Technology', 'kumari@gmail.com', 'kumari'),
(4, 'new', 'new', 'Female', 5612, 'Business Studies and Management', NULL, NULL),
(6, 'tests', 'tests', 'Male', 5678, 'Physical Science Management', NULL, NULL),
(2, 'nimal', 'kamal', 'Male', 7894, 'Health Science Promotion', NULL, NULL),
(3, 'nimalk', 'nimalk', 'Female', 8945, 'Physical Science', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(3) NOT NULL,
  `scode` varchar(10) NOT NULL,
  `scredits` int(1) NOT NULL,
  `sname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `scode`, `scredits`, `sname`) VALUES
(4, 'ASB 1226', 2, 'Applied Science Bio'),
(3, 'ICT 2402', 4, 'Software Engineering'),
(2, 'ICT 2403', 4, 'GRAPHICS & IMAGE PROCESSING'),
(1, 'ICT 2404', 4, 'Multimedia & web development');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`indexno`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cname`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`indexno`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`scode`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
