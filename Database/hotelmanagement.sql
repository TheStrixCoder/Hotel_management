-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 02:24 PM
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
-- Database: `hotelmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`) VALUES
(1000, 'Sagar Hotels'),
(1001, 'Suraj International'),
(1002, 'Taj International');

-- --------------------------------------------------------

--
-- Table structure for table `maprr`
--

CREATE TABLE `maprr` (
  `r_id` varchar(30) NOT NULL,
  `room_number` int(20) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `maprt`
--

CREATE TABLE `maprt` (
  `r_id` varchar(20) NOT NULL DEFAULT '0',
  `type` varchar(200) NOT NULL DEFAULT '',
  `hotel_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `mapur`
--

CREATE TABLE `mapur` (
  `Userid` varchar(20) NOT NULL DEFAULT '',
  `r_id` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapur`
--

INSERT INTO `mapur` (`Userid`, `r_id`) VALUES
('admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `r_id` varchar(30) NOT NULL DEFAULT '0',
  `r_chkindt` date NOT NULL,
  `r_chkoutdt` date NOT NULL,
  `r_rooms` int(30) NOT NULL DEFAULT '0',
  `r_type` varchar(20) NOT NULL DEFAULT '',
  `r_spanyreq` varchar(200) NOT NULL DEFAULT '',
  `hotel_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`r_id`, `r_chkindt`, `r_chkoutdt`, `r_rooms`, `r_type`, `r_spanyreq`, `hotel_id`) VALUES
('1', '2010-03-12', '2010-03-12', 1, 'Deluxe', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_number` int(20) NOT NULL,
  `r_id` varchar(20) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  `CheckIn Date` date DEFAULT NULL,
  `CheckOut Date` date DEFAULT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_number`, `r_id`, `type`, `CheckIn Date`, `CheckOut Date`, `hotel_id`) VALUES
(100, '1', 'Standard', NULL, NULL, 1000),
(200, '2', 'Deluxe', NULL, NULL, 1000),
(300, '3', 'Super Deluxe', NULL, NULL, 1000),
(400, '4', 'Suite', NULL, NULL, 1000),
(100, '5', 'Standard', NULL, NULL, 1001),
(200, '6', 'Deluxe', NULL, NULL, 1001),
(300, '7', 'Super Deluxe', NULL, NULL, 1001),
(400, '8', 'Suite', NULL, NULL, 1001),
(100, '9', 'Standard', NULL, NULL, 1002),
(200, '10', 'Deluxe', NULL, NULL, 1002),
(300, '11', 'Super Deluxe', NULL, NULL, 1002),
(400, '12', 'Suite', NULL, NULL, 1002);

-- --------------------------------------------------------

--
-- Table structure for table `tariff`
--

CREATE TABLE `tariff` (
  `type` varchar(50) NOT NULL DEFAULT '',
  `inrsin` varchar(30) NOT NULL DEFAULT '0',
  `inrdbl` varchar(30) NOT NULL DEFAULT '0',
  `usdsin` varchar(30) NOT NULL DEFAULT '0',
  `usddbl` varchar(30) NOT NULL DEFAULT '0',
  `totroom` int(3) NOT NULL DEFAULT '0',
  `hotel_id` int(11) NOT NULL,
  `avroom` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tariff`
--

INSERT INTO `tariff` (`type`, `inrsin`, `inrdbl`, `usdsin`, `usddbl`, `totroom`, `hotel_id`, `avroom`) VALUES
('Standard', '2600', '3100', '80', '90', 100, 1000, 96),
('Deluxe', '3100', '4200', '50', '80', 50, 1000, 43),
('Super Deluxe', '3800', '4600', '90', '110', 15, 1000, 15),
('Suite', '4100', '6200', '80', '100', 10, 1000, 5),
('Standard', '2700', '3200', '100', '110', 100, 1001, 77),
('Deluxe', '3300', '4500', '60', '95', 50, 1001, 45),
('Super Deluxe', '4000', '5000', '120', '150', 15, 1001, 15),
('Suite', '4300', '6500', '100', '130', 10, 1001, -2),
('Standard', '2000', '2700', '60', '70', 100, 1002, 96),
('Deluxe', '2900', '3900', '40', '60', 50, 1002, 46),
('Super Deluxe', '3500', '4200', '60', '80', 15, 1002, 15),
('Suite', '3700', '5700', '60', '80', 10, 1002, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Userid` varchar(20) NOT NULL DEFAULT '',
  `Password` varchar(20) NOT NULL DEFAULT '',
  `User Name` varchar(100) NOT NULL DEFAULT '',
  `User Email` varchar(100) NOT NULL DEFAULT '',
  `User Company` varchar(50) NOT NULL DEFAULT '',
  `User Phone` varchar(20) NOT NULL DEFAULT '',
  `User Address` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `mapur`
--
ALTER TABLE `mapur`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_number`,`hotel_id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`type`,`hotel_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
