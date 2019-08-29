-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2019 at 04:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `server`
--

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE `dtr` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_in` varchar(30) NOT NULL,
  `time_in` varchar(30) NOT NULL,
  `time_out` varchar(30) NOT NULL,
  `work_hrs` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dtr`
--

INSERT INTO `dtr` (`id`, `name`, `date_in`, `time_in`, `time_out`, `work_hrs`) VALUES
(4, 'renzabueg', 'August 26, 2019', '22:04', '22:14', '0.17'),
(5, 'shaymadamba', 'August 26, 2019', '22:50', '22:55', '0.08'),
(6, 'kulit', 'August 27, 2019', '1:00', '2:54', '1.90'),
(13, 'asd', 'August 28, 2020', '05:00', '12:00', '7.00'),
(15, 'jordan19', 'August 27, 2019', '20:38', '20:38', '0.00'),
(19, 'renzabueg', 'August 27, 2019', '23:34', '23:35', '0.02'),
(21, 'mats', 'August 27, 2019', '7:54', '16:00', '8.10'),
(22, 'renzabueg', 'August 28, 2019', '0:04', '2:04', '2.00'),
(23, 'user', 'August 28, 2019', '4:49', '4:49', '0.00'),
(24, 'admin', 'August 28, 2019', '4:59', '5:18', '0.32'),
(25, 'asd', 'August 28, 2019', '8:34', '', ''),
(26, 'mats', 'August 28, 2019', '9:20', '', ''),
(27, 'qweqwe', 'August 28, 2019', '9:25', '', ''),
(28, 'renzabueg', 'August 29, 2019', '8:05', '8:22', '0.28'),
(29, 'test', 'August 29, 2019', '10:01', '10:01', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `rate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `rate`) VALUES
(1, '13.37');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `profname` varchar(50) NOT NULL,
  `subjname` varchar(30) NOT NULL,
  `subjdesc` varchar(100) NOT NULL,
  `sect` varchar(30) NOT NULL,
  `sched` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `profname`, `subjname`, `subjdesc`, `sect`, `sched`) VALUES
(1, 'Renz Abueg', 'BSCOE-ELEC2', 'BSCOE ELECTIVES 2', '5', 'M 10:30 AM to 12:30 PM'),
(2, 'Kulit Aso', 'TEST101', 'HINDI NA TO TEST', '2', 'S 10:00 AM to 1:00 PM'),
(11, 'Renz Abueg', 'TEST101', 'HINDI NA TO TEST', '2', 'S 10:00 AM to 1:00 PM'),
(13, 'Keiran Lee', 'BSCOE-ELEC2', 'BSCOE ELECTIVES 2', '5', 'M 10:30 AM to 12:30 PM'),
(17, 'Renz Abueg', 'BSCOE-ELEC2', 'BSCOE ELECTIVES 2', '3', 'M 9:00 AM to 12:00 PM'),
(27, 'Kulit Aso', 'BSCOE-ELEC2', 'BSCOE ELECTIVES 2', '3', 'M 9:00 AM to 12:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `subjcode` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `units` varchar(30) NOT NULL,
  `sections` varchar(30) NOT NULL,
  `schedule` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `course`, `subjcode`, `description`, `units`, `sections`, `schedule`) VALUES
(1, 'BSCOE', 'BSCOE-ELEC2', 'BSCOE ELECTIVES 2', '5', '5', 'M 10:30 AM to 12:30 PM'),
(5, 'BSTEST', 'TEST101', 'HINDI NA TO TEST', '2', '2', 'S 10:00 AM to 1:00 PM'),
(6, 'BSCOE', 'BSCOE-ELEC2', 'BSCOE ELECTIVES 2', '5', '3', 'M 9:00 AM to 12:00 PM'),
(7, 'BS ASO', 'ASO101', 'Knowledge about dogs', '99', '3', 'W 8:00 AM to 11:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `admin` bit(1) NOT NULL DEFAULT b'0',
  `active` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `contact`, `admin`, `active`) VALUES
(1, 'renzabueg', 'password', 'Renz Abueg', 'prencylabueg@gmail.com', '09568868897', b'1', b'0'),
(2, 'shaymadamba', 'password', 'Shayneth Madamba', 'shaynethmadamba@gmail.com', '09157187085', b'0', b'0'),
(10, 'kulit', 'password', 'Kulit Aso', 'kulit@gmail.com', '12345678910', b'0', b'0'),
(21, 'admin', 'password', 'Admin', 'admin@gmail.com', 'admin', b'1', b'1'),
(22, 'user', 'password', 'user', 'user@gmail.com', 'user', b'0', b'1'),
(23, 'asdasd', 'asds', 'Boaty McBoatface', 'rowrowyourboat@gmail.com', '1234', b'0', b'0'),
(25, 'mats', '123as', 'Keiran Lee', 'j.matalang13@gmail.com', '09055243428', b'1', b'1'),
(26, 'jordan19', 'P@ssword', 'Jordan Michael Baccay', 'jordanmbaccay@gmail.com', '19', b'0', b'1'),
(27, 'asd', '123', 'Bitch Face', 'jfen009@gmail.com', '213', b'1', b'1'),
(28, 'jordan143', 'password', 'Jordan LOVE LOVE', 'jordan@love.com', 'asdasdsa', b'0', b'0'),
(29, 'qweqwe', '123', 'Snoop Dogg', 'a@gmail.com', '1', b'0', b'1'),
(30, 'faketaxidriver', '1234', 'Driver Fake', 'bookyourtaxi@gmail.com', '11223', b'0', b'0'),
(31, 'zxccccccc', 'cccccccc', 'ccccccccc', 'ccc@ccc', 'cccc', b'0', b'0'),
(32, '123213', '12312312', '123123', '12312@123123', '12312312', b'0', b'0'),
(33, 'prencyl', 'password', 'Renz', 'renzabueg@gmail.com', '09568868897', b'0', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
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
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
