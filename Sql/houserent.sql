-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 06:30 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `houserent`
--

-- --------------------------------------------------------

--
-- Table structure for table `insertrentdetails`
--

CREATE TABLE `insertrentdetails` (
  `Adname` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Bhk` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insertrentdetails`
--

INSERT INTO `insertrentdetails` (`Adname`, `Address`, `Bhk`, `Price`, `id`) VALUES
('g', 'g              	', 3, 900, 11),
('prajwal', '              	ss', 9, 67, 12),
('sanj', 'sanj              	', 8, 20, 13),
('sefsdf', 'sdf              	', 11, 111, 14);

-- --------------------------------------------------------

--
-- Table structure for table `rentinsertion`
--

CREATE TABLE `rentinsertion` (
  `id` int(20) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `AdDescription` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Price` int(50) NOT NULL,
  `Advance` int(50) NOT NULL,
  `Bhk` int(10) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `Image1` varchar(120) NOT NULL,
  `Image2` varchar(120) NOT NULL,
  `Image3` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rentinsertion`
--

INSERT INTO `rentinsertion` (`id`, `Fullname`, `AdDescription`, `Address`, `Price`, `Advance`, `Bhk`, `Mobile`, `Image1`, `Image2`, `Image3`) VALUES
(1, 'Prajwal JM', 'Beautiful House with 3 Bedrooms and a balcony.', 'No 680/A 17th Main Road 3rd Stage\r\nManjunath Nagar, Rajajinagar', 16000, 100000, 3, 2147483647, 'images (3).jpg', 'images (4).jpg', 'images (5).jpg'),
(9, 'Harsha N', 'Beautiful house with 2 bedrooms and peaceful environment', 'No 758 6th Cross 8th Main Basaveshwara Nagar, Bangalore.', 12000, 50000, 2, 2147483647, 'images (5).jpg', 'images (4).jpg', 'images (3).jpg'),
(10, 'Shyamanth', 'Nice and attractive', 'No 456 10th Cross Mathikere Bangalore', 10000, 40000, 4, 2147483647, 'images.jpg', 'maxresdefault.jpg', 'little-houses-1149379__340.jpg'),
(11, 'Harish', 'Good and Comfortable', 'Bilegeri Road, Kaggodlu , Karnataka', 14000, 80000, 1, 2147483647, 'WI070118_AP_ToolIcon_Jargon_LO_01.jpg', 'imgee.jpg', 'img.jpg'),
(12, 'Pavan', '3Bhk furnished house', '1522 milk colony bangalore', 13000, 50000, 3, 2147483647, 'ima.jpg', 'images (4).jpg', 'img.jpg'),
(13, 'Kiran Kumar B S', '2 BHK, Well-Furnished, Balcony, Sex room', '#420, Bagalur Road, Bagalur Cross, Bagalur District, Bagalur Country', 50, 2000, 2, 2147483647, 'imgee.jpg', 'ima.jpg', 'imgee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `FullName` varchar(30) NOT NULL,
  `EmailId` varchar(30) NOT NULL,
  `MobileNo` int(10) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FullName`, `EmailId`, `MobileNo`, `Password`) VALUES
(1, 'Prajwal', 'prajwal@gmail.com', 2147483647, '8613985ec49eb8f757ae6439e879bb2a'),
(2, 'Prajwal JM', 'p@gmail.com', 2147483647, '202cb962ac59075b964b07152d234b70'),
(3, 'vade', 'v@gmail.com', 12345, '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'kiran', 'kirankumar.jpp1997@gmail.com', 2147483647, '0f85703c9a02587c5c2dbd4f9973df9f'),
(5, 'Kiran', 'kiran@gmail.com', 2147483647, '25d55ad283aa400af464c76d713c07ad'),
(6, 'a', 'pm@gmail.com', 134557684, '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insertrentdetails`
--
ALTER TABLE `insertrentdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentinsertion`
--
ALTER TABLE `rentinsertion`
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
-- AUTO_INCREMENT for table `insertrentdetails`
--
ALTER TABLE `insertrentdetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rentinsertion`
--
ALTER TABLE `rentinsertion`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
