-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 02:14 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carland_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_ID` int(90) NOT NULL,
  `Img` varchar(100) NOT NULL,
  `Price` int(90) NOT NULL,
  `Year` int(90) NOT NULL,
  `Mileage` int(90) NOT NULL,
  `engineSize` varchar(90) NOT NULL,
  `Stock` int(90) NOT NULL,
  `Detail` varchar(900) NOT NULL,
  `Rego` varchar(900) NOT NULL,
  `category_ID` int(90) NOT NULL,
  `bodyType_ID` int(90) NOT NULL,
  `fuelType_ID` int(90) NOT NULL,
  `make_ID` int(90) NOT NULL,
  `model_ID` int(90) NOT NULL,
  `transmission_ID` int(90) NOT NULL,
  `color_ID` int(90) NOT NULL,
  `seats_ID` int(90) NOT NULL,
  `safety_ID` int(90) NOT NULL,
  `location_ID` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `car_bodytype`
--

CREATE TABLE `car_bodytype` (
  `bodyType_ID` int(90) NOT NULL,
  `bodyType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_bodytype`
--

INSERT INTO `car_bodytype` (`bodyType_ID`, `bodyType`) VALUES
(1, 'Hatch Back'),
(2, 'Sedan'),
(3, 'SUV'),
(4, 'Van');

-- --------------------------------------------------------

--
-- Table structure for table `car_category`
--

CREATE TABLE `car_category` (
  `category_ID` int(90) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_category`
--

INSERT INTO `car_category` (`category_ID`, `category`) VALUES
(1, 'New'),
(2, 'Second Hand');

-- --------------------------------------------------------

--
-- Table structure for table `car_color`
--

CREATE TABLE `car_color` (
  `color_ID` int(90) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_color`
--

INSERT INTO `car_color` (`color_ID`, `color`) VALUES
(1, 'Black'),
(2, 'White');

-- --------------------------------------------------------

--
-- Table structure for table `car_fueltype`
--

CREATE TABLE `car_fueltype` (
  `fuelType_ID` int(90) NOT NULL,
  `fuelType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_fueltype`
--

INSERT INTO `car_fueltype` (`fuelType_ID`, `fuelType`) VALUES
(1, 'Petrol'),
(2, 'Diesel'),
(3, 'Electric'),
(4, 'Hybrid');

-- --------------------------------------------------------

--
-- Table structure for table `car_gallery`
--

CREATE TABLE `car_gallery` (
  `gallery_ID` int(90) NOT NULL,
  `car_ID` int(90) NOT NULL,
  `gallery_Img` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `car_location`
--

CREATE TABLE `car_location` (
  `location_ID` int(90) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_location`
--

INSERT INTO `car_location` (`location_ID`, `location`) VALUES
(1, 'Auckland'),
(2, 'Christchurch');

-- --------------------------------------------------------

--
-- Table structure for table `car_make`
--

CREATE TABLE `car_make` (
  `make_ID` int(90) NOT NULL,
  `make` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_make`
--

INSERT INTO `car_make` (`make_ID`, `make`) VALUES
(1, 'Toyota'),
(2, 'BMW');

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE `car_model` (
  `model_ID` int(90) NOT NULL,
  `make_ID` int(90) NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`model_ID`, `make_ID`, `model`) VALUES
(1, 1, 'Corolla');

-- --------------------------------------------------------

--
-- Table structure for table `car_safety`
--

CREATE TABLE `car_safety` (
  `safety_ID` int(90) NOT NULL,
  `safety` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_safety`
--

INSERT INTO `car_safety` (`safety_ID`, `safety`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `car_seats`
--

CREATE TABLE `car_seats` (
  `seats_ID` int(90) NOT NULL,
  `seats` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_seats`
--

INSERT INTO `car_seats` (`seats_ID`, `seats`) VALUES
(1, 2),
(2, 5),
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `car_transmission`
--

CREATE TABLE `car_transmission` (
  `transmission_ID` int(90) NOT NULL,
  `transmission` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_transmission`
--

INSERT INTO `car_transmission` (`transmission_ID`, `transmission`) VALUES
(1, 'Automatic'),
(2, 'Manual');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_ID`);

--
-- Indexes for table `car_bodytype`
--
ALTER TABLE `car_bodytype`
  ADD PRIMARY KEY (`bodyType_ID`);

--
-- Indexes for table `car_category`
--
ALTER TABLE `car_category`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `car_color`
--
ALTER TABLE `car_color`
  ADD PRIMARY KEY (`color_ID`);

--
-- Indexes for table `car_fueltype`
--
ALTER TABLE `car_fueltype`
  ADD PRIMARY KEY (`fuelType_ID`);

--
-- Indexes for table `car_gallery`
--
ALTER TABLE `car_gallery`
  ADD PRIMARY KEY (`gallery_ID`);

--
-- Indexes for table `car_location`
--
ALTER TABLE `car_location`
  ADD PRIMARY KEY (`location_ID`);

--
-- Indexes for table `car_make`
--
ALTER TABLE `car_make`
  ADD PRIMARY KEY (`make_ID`);

--
-- Indexes for table `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`model_ID`);

--
-- Indexes for table `car_safety`
--
ALTER TABLE `car_safety`
  ADD PRIMARY KEY (`safety_ID`);

--
-- Indexes for table `car_seats`
--
ALTER TABLE `car_seats`
  ADD PRIMARY KEY (`seats_ID`);

--
-- Indexes for table `car_transmission`
--
ALTER TABLE `car_transmission`
  ADD PRIMARY KEY (`transmission_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_ID` int(90) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_bodytype`
--
ALTER TABLE `car_bodytype`
  MODIFY `bodyType_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `car_category`
--
ALTER TABLE `car_category`
  MODIFY `category_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `car_color`
--
ALTER TABLE `car_color`
  MODIFY `color_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_fueltype`
--
ALTER TABLE `car_fueltype`
  MODIFY `fuelType_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `car_gallery`
--
ALTER TABLE `car_gallery`
  MODIFY `gallery_ID` int(90) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_location`
--
ALTER TABLE `car_location`
  MODIFY `location_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_make`
--
ALTER TABLE `car_make`
  MODIFY `make_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_model`
--
ALTER TABLE `car_model`
  MODIFY `model_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `car_safety`
--
ALTER TABLE `car_safety`
  MODIFY `safety_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `car_seats`
--
ALTER TABLE `car_seats`
  MODIFY `seats_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car_transmission`
--
ALTER TABLE `car_transmission`
  MODIFY `transmission_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
