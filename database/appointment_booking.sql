-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 03:39 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(255) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date_of_birth` varchar(25) NOT NULL,
  `case_id` int(255) NOT NULL,
  `date_booked` varchar(30) NOT NULL,
  `date_of_appointment` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_name`, `phone_number`, `email`, `date_of_birth`, `case_id`, `date_booked`, `date_of_appointment`, `password`) VALUES
(2, 'John Doe', '08034322344', 'johndoe@gmail.com', '1994-04-14', 6, '2020-04-26', '2020-05-01', 'johndoe');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(255) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `name`) VALUES
(1, 'Psychological Issues'),
(2, 'Stomach/Thorso Issues'),
(3, 'Bone Issues'),
(4, 'Muscle Issues'),
(5, 'Head Pain'),
(6, 'Waist Pain'),
(7, 'Other Joints'),
(8, 'Skin Irritation '),
(9, 'Heart Conditions'),
(10, 'ENT Issues');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `appointment_id` int(255) NOT NULL,
  `message` varchar(3000) NOT NULL,
  `time` varchar(15) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `appointment_id`, `message`, `time`, `date`) VALUES
(6, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae facilis accusamus obcaecati molestiae voluptatibus illum aspernatur deserunt exercitationem doloribus corrupti voluptates temporibus minus sequi quibusdam iusto, maiores quas laborum laboriosam, tempore possimus quia? Rerum excepturi aperiam facilis sed corporis. Atque?', '01:06', '2020-04-26'),
(7, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae facilis accusamus obcaecati molestiae voluptatibus illum aspernatur deserunt exercitationem doloribus corrupti voluptates temporibus minus sequi quibusdam iusto, maiores quas laborum laboriosam, tempore possimus quia? Rerum excepturi aperiam facilis sed corporis. Atque?', '01:08', '2020-04-26'),
(8, 2, 'Lorem ipsum dolor sit amet consectetur adipisicingibusdam iusto, maiores quas laborum laboriosam, tempore possimus quia? Rerum excepturi aperiam facilis sed corporis. Atque?', '01:10', '2020-04-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
