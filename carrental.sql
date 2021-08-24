-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 11:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcar`
--

CREATE TABLE `addcar` (
  `car_id` int(10) NOT NULL,
  `agency_id` int(10) NOT NULL,
  `Vehicle_model` varchar(255) NOT NULL,
  `Vehicle_number` varchar(255) NOT NULL,
  `Seating_capacity` int(3) NOT NULL,
  `Rent_per_day` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addcar`
--

INSERT INTO `addcar` (`car_id`, `agency_id`, `Vehicle_model`, `Vehicle_number`, `Seating_capacity`, `Rent_per_day`) VALUES
(2, 1, 'Kia Seltos', 'MV2021500', 4, 320),
(3, 1, 'Tata Altroz', 'MV2021300', 4, 120),
(4, 2, 'Renault Kiger', 'MV2021800', 6, 400);

-- --------------------------------------------------------

--
-- Table structure for table `agenciesdata`
--

CREATE TABLE `agenciesdata` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_email` varchar(30) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_contact` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenciesdata`
--

INSERT INTO `agenciesdata` (`a_id`, `a_name`, `a_email`, `a_password`, `a_contact`) VALUES
(1, 'Adam Smith', 'tmagento01@gmail.com', '12345', 1234567890),
(2, 'New Nimbus 2000 Showroom', 'agency2@gmail.com', '12345', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `car_id` int(10) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `No_of_days` int(11) NOT NULL,
  `startdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `car_id`, `agency_id`, `customer_id`, `No_of_days`, `startdate`) VALUES
(17, 2, 1, 1, 4, '2021-08-29'),
(18, 3, 1, 1, 3, '2021-08-29'),
(19, 4, 2, 1, 3, '2021-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `customerdata`
--

CREATE TABLE `customerdata` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_emailid` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerdata`
--

INSERT INTO `customerdata` (`u_id`, `u_name`, `u_emailid`, `u_password`, `u_contact`) VALUES
(1, 'Adam', 'ronwes2017302@gmail.com', '12345', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcar`
--
ALTER TABLE `addcar`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `agenciesdata`
--
ALTER TABLE `agenciesdata`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `customerdata`
--
ALTER TABLE `customerdata`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcar`
--
ALTER TABLE `addcar`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agenciesdata`
--
ALTER TABLE `agenciesdata`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customerdata`
--
ALTER TABLE `customerdata`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
