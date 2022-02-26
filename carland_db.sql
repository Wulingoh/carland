-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2022 at 07:35 AM
-- Server version: 8.0.26
-- PHP Version: 8.0.11

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
  `car_ID` int NOT NULL,
  `Img` varchar(100) NOT NULL,
  `Price` int NOT NULL,
  `Year` int NOT NULL,
  `Mileage` int NOT NULL,
  `engineSize` varchar(90) NOT NULL,
  `Stock` int NOT NULL,
  `Detail` varchar(900) NOT NULL,
  `Rego` varchar(900) NOT NULL,
  `category_ID` int NOT NULL,
  `bodyType_ID` int NOT NULL,
  `fuelType_ID` int NOT NULL,
  `make_ID` int NOT NULL,
  `model_ID` int NOT NULL,
  `transmission_ID` int NOT NULL,
  `color_ID` int NOT NULL,
  `seats_ID` int NOT NULL,
  `safety_ID` int NOT NULL,
  `location_ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_bodytype`
--

CREATE TABLE `car_bodytype` (
  `bodyType_ID` int NOT NULL,
  `bodyType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `category_ID` int NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `color_ID` int NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `fuelType_ID` int NOT NULL,
  `fuelType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `gallery_ID` int NOT NULL,
  `car_ID` int NOT NULL,
  `gallery_Img` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_location`
--

CREATE TABLE `car_location` (
  `location_ID` int NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `make_ID` int NOT NULL,
  `make` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `model_ID` int NOT NULL,
  `make_ID` int NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `safety_ID` int NOT NULL,
  `safety` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `seats_ID` int NOT NULL,
  `seats` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `transmission_ID` int NOT NULL,
  `transmission` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_transmission`
--

INSERT INTO `car_transmission` (`transmission_ID`, `transmission`) VALUES
(1, 'Automatic'),
(2, 'Manual');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `topic` varchar(300) NOT NULL,
  `message` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `phone`, `topic`, `message`) VALUES
(27, 'Test Test', 'test@example.com', '', ' 0', 'helo tehresi  is fi this lnworlkongia onofgi pg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_email` varchar(320) NOT NULL,
  `password_hash` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_fullname` varchar(80) NOT NULL,
  `user_role` varchar(80) NOT NULL,
  `password_reset_token` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `password_hash`, `user_fullname`, `user_role`, `password_reset_token`) VALUES
(1, 'taifen_g@yahoo.com', '$2y$10$4XlZH2P0SL9akf8yKsmMxuPnr6WHGK46eScqi/Y1041Hj9DIn4vW2', 'Lin Tillman', 'admin', NULL),
(2, 'jeff@gmail.com', '$2y$10$6yS4hhWEX37IxKVhaLpg3OAOdM9AoAKLaultpd3m9.tV7WO3lRzbe', 'Jeff Clyde', 'customer', NULL),
(3, 'test@example.com', '$2y$10$thyLDjriaYwjYsBaM2f9sO8Mmh7mgL9MYXPMDPcBBJ6kQGLSrV7UW', 'test', 'customer', '1930833c5cac7fe2d0561713dc9079da'),
(5, 'tim@test', '$2y$10$Oa5Z2E5C.69I6RYFHPlLduHnewdX2V2lsPAwTeE.T12Bq9Zqw5yPi', 'Tim Test', 'customer', NULL),
(6, 'ban@example.com', '$2y$10$OhC1zJwpcXpeProhfQTy..SUYaUsIsIurS/UOdxV3EqOmhSy.iaeO', 'Ban Test', 'customer', NULL),
(11, 'test7@example.com', '$2y$10$YSEEKcZin.dRkei1ClWCN.InoptmUIq4nljJjLRqL2lET4hhNuHP.', 'Test Fullname', 'customer', NULL);

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_bodytype`
--
ALTER TABLE `car_bodytype`
  MODIFY `bodyType_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `car_category`
--
ALTER TABLE `car_category`
  MODIFY `category_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `car_color`
--
ALTER TABLE `car_color`
  MODIFY `color_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_fueltype`
--
ALTER TABLE `car_fueltype`
  MODIFY `fuelType_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `car_gallery`
--
ALTER TABLE `car_gallery`
  MODIFY `gallery_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_location`
--
ALTER TABLE `car_location`
  MODIFY `location_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_make`
--
ALTER TABLE `car_make`
  MODIFY `make_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_model`
--
ALTER TABLE `car_model`
  MODIFY `model_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `car_safety`
--
ALTER TABLE `car_safety`
  MODIFY `safety_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `car_seats`
--
ALTER TABLE `car_seats`
  MODIFY `seats_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car_transmission`
--
ALTER TABLE `car_transmission`
  MODIFY `transmission_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
