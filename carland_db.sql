-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 11:06 PM
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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `topic` varchar(300) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `user_id` int(11) NOT NULL,
  `user_email` varchar(320) NOT NULL,
  `password_hash` varchar(80) NOT NULL,
  `user_fullname` varchar(80) NOT NULL,
  `user_role` varchar(80) NOT NULL,
  `password_reset_token` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(90) NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` int(90) NOT NULL,
  `year` int(90) NOT NULL,
  `mileage` int(90) NOT NULL,
  `engine_size` varchar(90) NOT NULL,
  `stock` int(90) NOT NULL,
  `detail` varchar(900) NOT NULL,
  `rego` varchar(900) NOT NULL,
  `category_id` int(90) NOT NULL,
  `bodytype_id` int(90) NOT NULL,
  `fueltype_id` int(90) NOT NULL,
  `make_id` int(90) NOT NULL,
  `model_id` int(90) NOT NULL,
  `transmission_id` int(90) NOT NULL,
  `color_id` int(90) NOT NULL,
  `seats_id` int(90) NOT NULL,
  `safety_id` int(90) NOT NULL,
  `location_id` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `img`, `price`, `year`, `mileage`, `engine_size`, `stock`, `detail`, `rego`, `category_id`, `bodytype_id`, `fueltype_id`, `make_id`, `model_id`, `transmission_id`, `color_id`, `seats_id`, `safety_id`, `location_id`) VALUES
(8, 'ad11c839410502421f27cc4a8faebb4f.jpg', 108900, 2021, 25, '1.6', 1, 'Mercedes-Benz The New E-Class Sedan. A more dynamic character all round.', 'NA', 1, 2, 4, 3, 4, 1, 4, 2, 5, 1),
(10, '993ada55b30867ae7951e94f070d9c9d.jpg', 30999, 2021, 25, '1.4', 1, 'Corolla hatch GX Hybrid，work errand and weekend sport!', 'NA', 1, 1, 4, 1, 1, 1, 1, 2, 5, 2),
(11, '7db05eece6514734ce6d4b1b908c0aaf.jpg', 6999, 2010, 150000, '1.6', 1, 'AAAAA', 'KJW666', 2, 1, 1, 1, 1, 1, 1, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_bodytype`
--

CREATE TABLE `vehicle_bodytype` (
  `bodytype_id` int(90) NOT NULL,
  `bodytype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_bodytype`
--

INSERT INTO `vehicle_bodytype` (`bodytype_id`, `bodytype`) VALUES
(1, 'Hatch Back'),
(2, 'Sedan'),
(3, 'SUV'),
(4, 'Van');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_category`
--

CREATE TABLE `vehicle_category` (
  `category_id` int(90) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_category`
--

INSERT INTO `vehicle_category` (`category_id`, `category`) VALUES
(1, 'New'),
(2, 'Second Hand');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_color`
--

CREATE TABLE `vehicle_color` (
  `color_id` int(90) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_color`
--

INSERT INTO `vehicle_color` (`color_id`, `color`) VALUES
(1, 'Black'),
(2, 'White'),
(3, 'Red'),
(4, 'Sliver');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_fueltype`
--

CREATE TABLE `vehicle_fueltype` (
  `fueltype_id` int(90) NOT NULL,
  `fueltype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_fueltype`
--

INSERT INTO `vehicle_fueltype` (`fueltype_id`, `fueltype`) VALUES
(1, 'Petrol'),
(2, 'Diesel'),
(3, 'Electric'),
(4, 'Hybrid');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_gallery`
--

CREATE TABLE `vehicle_gallery` (
  `img_id` int(90) NOT NULL,
  `vehicle_id` int(90) NOT NULL,
  `gallery_img` varchar(900) NOT NULL,
  `gallery_img_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_gallery`
--

INSERT INTO `vehicle_gallery` (`img_id`, `vehicle_id`, `gallery_img`, `gallery_img_title`) VALUES
(2, 1, '1498248e91b2ef93bef8f50fc42748fb.jpg', 'interior'),
(3, 1, '1201141c1bd6631bd3044503e0e66ca9.jpg', 'interior'),
(4, 1, 'd1e8ac8752a221000dc8a7cddceef532.jpg', 'interior'),
(7, 1, '40e67aebab1a022fb99f393f661b1946.jpg', 'cover'),
(9, 8, '3d1e515206f46580efd244d16d663796.jpg', 'cover'),
(10, 8, 'dd37a332d41fab49a004304c7800a3bd.jpg', 'back'),
(11, 8, 'db324daa71166a70689430894bc1713a.jpg', 'interior'),
(13, 8, '57a571b859c44342a71281034a653d83.jpg', 'interior'),
(14, 10, '8ffc427ffa99f6053e17972d177f77b3.jpg', 'cover'),
(15, 10, 'aabdf60f0928bf08d7b84f3746d5c9a1.jpg', 'interior'),
(16, 10, '5d90b3b7b9f7b856e1eb07c8f59339e2.jpg', 'interior'),
(17, 10, '02e50ac84a022d0553ee8a55d9df3d24.jpg', 'interior'),
(18, 11, 'f5b46ba9fc2d58629387972fdcadec59.jpg', 'interior');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_location`
--

CREATE TABLE `vehicle_location` (
  `location_id` int(90) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_location`
--

INSERT INTO `vehicle_location` (`location_id`, `location`) VALUES
(1, 'Auckland'),
(2, 'Christchurch');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_make`
--

CREATE TABLE `vehicle_make` (
  `make_id` int(90) NOT NULL,
  `make` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_make`
--

INSERT INTO `vehicle_make` (`make_id`, `make`) VALUES
(1, 'Toyota'),
(2, 'BMW'),
(3, 'Mercedes Benz'),
(4, 'Audi');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_model`
--

CREATE TABLE `vehicle_model` (
  `model_id` int(90) NOT NULL,
  `make_id` int(90) NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_model`
--

INSERT INTO `vehicle_model` (`model_id`, `make_id`, `model`) VALUES
(1, 1, 'Corolla'),
(3, 1, 'Highlander'),
(4, 3, 'E-Class');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_safety`
--

CREATE TABLE `vehicle_safety` (
  `safety_id` int(90) NOT NULL,
  `safety` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_safety`
--

INSERT INTO `vehicle_safety` (`safety_id`, `safety`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_seats`
--

CREATE TABLE `vehicle_seats` (
  `seats_id` int(90) NOT NULL,
  `seats` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_seats`
--

INSERT INTO `vehicle_seats` (`seats_id`, `seats`) VALUES
(1, 2),
(2, 5),
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_transmission`
--

CREATE TABLE `vehicle_transmission` (
  `transmission_id` int(90) NOT NULL,
  `transmission` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_transmission`
--

INSERT INTO `vehicle_transmission` (`transmission_id`, `transmission`) VALUES
(1, 'Automatic'),
(2, 'Manual');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `vehicle_bodytype`
--
ALTER TABLE `vehicle_bodytype`
  ADD PRIMARY KEY (`bodytype_id`);

--
-- Indexes for table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `vehicle_color`
--
ALTER TABLE `vehicle_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `vehicle_fueltype`
--
ALTER TABLE `vehicle_fueltype`
  ADD PRIMARY KEY (`fueltype_id`);

--
-- Indexes for table `vehicle_gallery`
--
ALTER TABLE `vehicle_gallery`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `vehicle_location`
--
ALTER TABLE `vehicle_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `vehicle_make`
--
ALTER TABLE `vehicle_make`
  ADD PRIMARY KEY (`make_id`);

--
-- Indexes for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `vehicle_safety`
--
ALTER TABLE `vehicle_safety`
  ADD PRIMARY KEY (`safety_id`);

--
-- Indexes for table `vehicle_seats`
--
ALTER TABLE `vehicle_seats`
  ADD PRIMARY KEY (`seats_id`);

--
-- Indexes for table `vehicle_transmission`
--
ALTER TABLE `vehicle_transmission`
  ADD PRIMARY KEY (`transmission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicle_bodytype`
--
ALTER TABLE `vehicle_bodytype`
  MODIFY `bodytype_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  MODIFY `category_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle_color`
--
ALTER TABLE `vehicle_color`
  MODIFY `color_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_fueltype`
--
ALTER TABLE `vehicle_fueltype`
  MODIFY `fueltype_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_gallery`
--
ALTER TABLE `vehicle_gallery`
  MODIFY `img_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vehicle_location`
--
ALTER TABLE `vehicle_location`
  MODIFY `location_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_make`
--
ALTER TABLE `vehicle_make`
  MODIFY `make_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  MODIFY `model_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_safety`
--
ALTER TABLE `vehicle_safety`
  MODIFY `safety_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle_seats`
--
ALTER TABLE `vehicle_seats`
  MODIFY `seats_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle_transmission`
--
ALTER TABLE `vehicle_transmission`
  MODIFY `transmission_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
