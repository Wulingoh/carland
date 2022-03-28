-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2022 at 07:33 AM
-- Server version: 8.0.26
-- PHP Version: 8.1.3

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
  `id` int NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `topic` varchar(300) NOT NULL,
  `message` varchar(300) NOT NULL,
  `vehicle_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `contact`:
--   `vehicle_id`
--       `vehicles` -> `vehicle_id`
--

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `phone`, `topic`, `message`, `vehicle_id`) VALUES
(27, 'Test Test', 'test@example.com', '', ' 0', 'helo tehresi  is fi this lnworlkongia onofgi pg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `favourite_id` int NOT NULL,
  `user_id` int NOT NULL,
  `vehicle_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `favourite`:
--   `vehicle_id`
--       `vehicles` -> `vehicle_id`
--   `user_id`
--       `users` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Bookmarks';

--
-- RELATIONSHIPS FOR TABLE `pma__bookmark`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Central list of columns';

--
-- RELATIONSHIPS FOR TABLE `pma__central_columns`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

--
-- RELATIONSHIPS FOR TABLE `pma__column_info`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- RELATIONSHIPS FOR TABLE `pma__designer_settings`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- RELATIONSHIPS FOR TABLE `pma__export_templates`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Favorite tables';

--
-- RELATIONSHIPS FOR TABLE `pma__favorite`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

--
-- RELATIONSHIPS FOR TABLE `pma__history`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

--
-- RELATIONSHIPS FOR TABLE `pma__navigationhiding`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

--
-- RELATIONSHIPS FOR TABLE `pma__pdf_pages`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- RELATIONSHIPS FOR TABLE `pma__recent`:
--

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"carland_db\",\"table\":\"vehicles\"},{\"db\":\"carland_db\",\"table\":\"vehicle_seats\"},{\"db\":\"carland_db\",\"table\":\"vehicle_safety\"},{\"db\":\"carland_db\",\"table\":\"vehicle_model\"},{\"db\":\"carland_db\",\"table\":\"vehicle_make\"},{\"db\":\"carland_db\",\"table\":\"vehicle_color\"},{\"db\":\"carland_db\",\"table\":\"contact\"},{\"db\":\"carland_db\",\"table\":\"users\"},{\"db\":\"carland_db\",\"table\":\"favourite\"},{\"db\":\"carland_db\",\"table\":\"vehicle_gallery\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Relation table';

--
-- RELATIONSHIPS FOR TABLE `pma__relation`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Saved searches';

--
-- RELATIONSHIPS FOR TABLE `pma__savedsearches`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

--
-- RELATIONSHIPS FOR TABLE `pma__table_coords`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- RELATIONSHIPS FOR TABLE `pma__table_info`:
--

--
-- Dumping data for table `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('carland_db', 'contact', 'email'),
('carland_db', 'vehicles', 'detail');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- RELATIONSHIPS FOR TABLE `pma__table_uiprefs`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

--
-- RELATIONSHIPS FOR TABLE `pma__tracking`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- RELATIONSHIPS FOR TABLE `pma__userconfig`:
--

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-03-28 06:35:03', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

--
-- RELATIONSHIPS FOR TABLE `pma__usergroups`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- RELATIONSHIPS FOR TABLE `pma__users`:
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_email` varchar(320) NOT NULL,
  `password_hash` varchar(80) NOT NULL,
  `user_fullname` varchar(80) NOT NULL,
  `user_role` varchar(80) NOT NULL,
  `password_reset_token` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `password_hash`, `user_fullname`, `user_role`, `password_reset_token`) VALUES
(1, 'taifen_g@yahoo.com', '$2y$10$4XlZH2P0SL9akf8yKsmMxuPnr6WHGK46eScqi/Y1041Hj9DIn4vW2', 'Lin Tillman', 'admin', NULL),
(2, 'jeff@gmail.com', '$2y$10$6yS4hhWEX37IxKVhaLpg3OAOdM9AoAKLaultpd3m9.tV7WO3lRzbe', 'Jeff Clyde', 'customer', NULL),
(5, 'tim@test', '$2y$10$Oa5Z2E5C.69I6RYFHPlLduHnewdX2V2lsPAwTeE.T12Bq9Zqw5yPi', 'Tim Test', 'customer', NULL),
(13, 'ben.tillman@gmail.com', '$2y$10$iHdv88aIRAia3hA7uKiwGelyn/g83zr0yG3AiyEj0TvEe/YXf0nym', 'Ben Tillman', 'customer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `year` int NOT NULL,
  `mileage` int NOT NULL,
  `engine_size` varchar(90) NOT NULL,
  `stock` int NOT NULL,
  `detail` varchar(900) NOT NULL,
  `rego` varchar(900) NOT NULL,
  `category_id` int NOT NULL,
  `bodytype_id` int NOT NULL,
  `fueltype_id` int NOT NULL,
  `make_id` int NOT NULL,
  `model_id` int NOT NULL,
  `transmission_id` int NOT NULL,
  `color_id` int NOT NULL,
  `seats_id` int NOT NULL,
  `safety_id` int NOT NULL,
  `location_id` int NOT NULL,
  `title` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subtitle` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicles`:
--   `make_id`
--       `vehicle_make` -> `make_id`
--   `model_id`
--       `vehicle_model` -> `model_id`
--

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `img`, `price`, `year`, `mileage`, `engine_size`, `stock`, `detail`, `rego`, `category_id`, `bodytype_id`, `fueltype_id`, `make_id`, `model_id`, `transmission_id`, `color_id`, `seats_id`, `safety_id`, `location_id`, `title`, `subtitle`, `created_at`) VALUES
(17, '36e61a4a8127479423af675999ec60d8.jpg', 55000, 2017, 28650, '2L', 1, '', 'Apr 2017', 1, 2, 2, 27, 15, 1, 2, 2, 4, 2, 'BMW 3 Series', '2L M Sport', '2022-03-21 23:53:32'),
(18, 'a97bbaa287c9accc57dc7c1ce6d2cdc3.JPG', 76000, 2019, 15000, '75 kw', 1, '', 'Sept 2020', 1, 2, 3, 25, 16, 1, 2, 2, 5, 1, 'Tesla Model 3', 'Performance', '2022-03-21 23:58:04'),
(19, '2c55b5777d6b8d1804d6cebec206faeb.png', 34000, 2016, 394111, '1.5L', 1, '', 'Mar 2016', 2, 2, 1, 27, 17, 2, 3, 2, 4, 1, 'BMW 2 Series', '1.5L SE 218i', '2022-03-22 00:36:03'),
(20, '4175c48b8eba49c50cf2b2c4f0bd22f8.png', 20000, 2017, 44876, '1.5L', 1, '', 'Sept 2017', 2, 1, 2, 27, 18, 2, 1, 2, 4, 2, 'BMW 1 Series', '1.5L SE 116d', '2022-03-22 00:52:30'),
(21, '890e903f674448d1523c50ac9fb1b5fb.png', 30000, 2019, 3757, '42.2kw', 1, '', 'Nov 2019', 2, 1, 3, 27, 19, 1, 5, 2, 5, 2, 'BMW i3', '0.6L S', '2022-03-22 01:36:53'),
(22, '89faf94ba91ea851ce5ac31734947564.png', 105000, 2018, 30820, '75kwh', 1, '', 'Mar 2018', 1, 1, 3, 25, 20, 1, 2, 2, 5, 1, 'Tesla Model S', '100D', '2022-03-22 03:14:07'),
(23, '3c032baa5967f7d78729da4202572bc3.png', 22000, 2018, 25038, '1.6L', 1, '', 'Jun 2018', 1, 3, 1, 24, 21, 1, 4, 2, 5, 1, 'Suzuki Vitara', '1.6L SZ-T', '2022-03-22 03:27:45'),
(24, '651ff4151246b17053a5df7763721c51.png', 13550, 2018, 12223, '1.4L', 1, '', 'May 2018', 2, 1, 1, 24, 22, 2, 6, 2, 4, 2, 'Suzuki Swift', '1.4L Sport Boosterjet', '2022-03-22 05:11:03'),
(25, 'b04293ba43e8bf5db267c971f1d82a37.png', 12400, 2017, 31213, '1.3L', 1, '', 'Jun 2017', 2, 3, 1, 24, 23, 2, 2, 2, 4, 2, 'Suzuki Jimny', '1.3L SZ4 VVT', '2022-03-22 05:39:28'),
(26, '1f020442c6ec908b88ac257d3188dd4e.png', 13450, 2018, 6988, '1.2L', 1, '', 'Jun 2018', 2, 1, 1, 24, 24, 2, 3, 2, 5, 1, 'Suzuki Ignis', '1.2L SZ-T Dualjet', '2022-03-22 06:14:04'),
(27, 'f7ce78aa80d20a3429b92274bf60af24.png', 13000, 2016, 37719, '1.6L', 1, '', 'May 2016', 2, 3, 2, 23, 25, 2, 5, 2, 4, 10, 'Honda HR-V', '1.6L SE Navi i-DTEC', '2022-03-22 06:34:58'),
(28, '3d3a0f8cb5a9439f95b4a8fbfd031a7d.png', 20600, 2020, 2712, '1.5L', 1, '', 'Sept 2020', 1, 1, 4, 23, 26, 1, 5, 2, 5, 6, 'Honda Jazz', '1.5L Crosstar EX h i-MMD', '2022-03-22 06:47:26'),
(29, '0c987670db401ae44d071f34c31afd85.png', 23600, 2017, 20738, '1.6L', 1, '', 'Jun 2017', 1, 3, 2, 23, 27, 1, 5, 2, 4, 5, 'Honda CR-V', '1.6L SR i-DTEC', '2022-03-22 07:41:41'),
(30, '8c2f525baacafdd06d28fe1687d0e447.png', 28500, 2020, 4690, '1L', 1, '', 'Mar 2020', 1, 2, 1, 23, 28, 2, 3, 2, 5, 1, 'Honda Civic', '1L SR VTEC Turbo', '2022-03-22 07:58:33'),
(31, '9665ff79194f56f765808e782c1dee0c.jpg', 61910, 2018, 23459, '2L', 1, '', 'Oct 2018', 1, 3, 4, 22, 29, 1, 3, 2, 5, 7, 'Volvo XC60', '2L R-Design Twin Engine h T8', '2022-03-22 08:19:23'),
(32, '1521cdbeaa3c4d69519f0e5f2260a0aa.png', 56890, 2019, 23462, '2L', 1, '', 'Apr 2019', 1, 2, 4, 22, 30, 1, 1, 2, 5, 6, 'Volvo S90', '2L Inscription Pro Twin Engine h T8', '2022-03-22 08:33:28'),
(65, 'fed56d5aa80cf8a9b84865b5f3cc2ba5.jpg', 27290, 2020, 366, '1.6', 1, '', 'NA', 1, 1, 4, 31, 43, 1, 4, 2, 5, 2, ' Toyota Yaris', 'ZR 1.5P/10Cvt', '2022-03-23 21:00:58'),
(66, '24153b218539bcfa57c45f0f2e24a455.jpg', 76199, 2021, 106, '2.2', 1, '', 'NA', 1, 3, 4, 29, 34, 1, 4, 2, 5, 2, 'Mercedes-Benz GLA 200', '1.3L Turbocharged', '2022-03-23 19:56:36'),
(67, '0649a7a1621a94a1142017762b428e29.jpg', 53999, 2020, 82, '1.6', 1, '', 'NA', 1, 1, 4, 29, 41, 1, 3, 2, 5, 2, 'Mercedes-Benz A180', 'A180', '2022-03-23 20:02:07'),
(68, 'ac429e38568202d14438bd4b9baa866e.jpg', 60990, 2021, 10, '3.0', 1, '', 'NA', 1, 3, 1, 31, 44, 1, 5, 3, 5, 2, 'Toyota Highlander ', 'GXL ', '2022-03-23 20:44:11'),
(69, '5fc715dd3ca50c884c6376146d3979bc.jpg', 51490, 2021, 30, '4.0', 1, '', 'NA', 1, 4, 2, 31, 42, 1, 2, 6, 5, 1, ' The Toyota Hiace ', 'Van ZX', '2022-03-23 20:54:21'),
(78, '6b52283a25e9087b6621e40dcf88712e.jpg', 18999, 2018, 36980, '1.4', 1, '', 'ABC123', 2, 1, 4, 30, 32, 2, 7, 2, 4, 2, 'Volkswagen Polo ', 'TSI DSG', '2022-03-15 14:58:50'),
(79, 'fe1d99736060da91e020cfeeb8987c7a.jpg', 16999, 2020, 107990, '3.8', 1, '', 'NA', 1, 3, 2, 28, 33, 1, 1, 3, 5, 1, 'Hyundai Palisade ', ' V6 GDi Limited', '2022-03-15 15:03:53'),
(80, 'ba3c15f05d7d79276ac515fdc8d753c5.jpg', 53990, 2021, 99, '1.6', 1, '', 'NA', 1, 1, 1, 28, 35, 2, 5, 2, 5, 2, 'Hyundai i20 ', 'N 1.6T 6MT', '2022-03-23 18:28:59'),
(81, '75c53b371fce057cea93a4247c2737f9.jpg', 69990, 2021, 120, 'NA', 1, '', 'NA', 1, 1, 3, 28, 36, 1, 6, 2, 5, 1, 'Kona Series II', 'EV Elite PE', '2022-03-23 18:40:18'),
(82, '52159cda1df86a1cbfd81ee00ee2ba1b.jpg', 69990, 2021, 10, '2.2', 1, '', 'NA', 1, 4, 2, 28, 37, 1, 1, 5, 5, 1, 'Hyundai Staria', 'Staria 2.2 Diesel 8-seater', '2022-03-23 18:58:01'),
(83, '69da8c4a882eb06a422f65d100f7e21f.jpg', 65000, 2018, 66, '4.0', 1, '', 'NA', 1, 4, 2, 30, 38, 1, 2, 3, 5, 1, 'Volkswagen Crafter Van', '30 Mwb 103', '2022-03-23 19:24:10'),
(84, '90eadad0879efc1e3be4bf407a7f3a0d.jpg', 47990, 2021, 200, '3.0', 1, '', 'NA', 1, 3, 1, 30, 39, 1, 1, 2, 5, 2, 'Volkswagen Tiguan', 'Allspace 2.0L 4WD 7', '2022-03-23 19:36:54'),
(85, 'b6b8848761753b331c4ae563315a2415.jpg', 89999, 2022, 0, 'NA', 1, '', 'NA', 1, 4, 3, 30, 40, 1, 5, 3, 5, 1, 'VW ID.Buzz.', ' 77-kWh Camper Van', '2022-03-23 19:45:30'),
(86, 'd85df46f0bb001369b33dcff8ee49a89.jpg', 88900, 2021, 28650, '1.6', 1, 'Mercedes-Benz The New E-Class Sedan. A more dynamic character all round.', 'LIN123', 2, 2, 4, 29, 4, 1, 4, 2, 5, 1, 'Mercedes-Benz E-Class', 'Hybrid', '2022-03-08 15:21:42'),
(87, 'd3d99ace7a1945b60ac24bba3bebfef1.jpg', 30999, 2021, 25, '1.4', 1, 'Corolla hatch GX Hybrid，work errand and weekend sport!', 'NA', 1, 1, 4, 31, 1, 1, 1, 2, 5, 2, 'Corolla Hatch ', 'GX Hybrid', '2022-03-08 15:21:42'),
(88, '885f26f48202b477bbdafeed573fa6b7.jpg', 311199, 2021, 120, '3.0', 1, '', 'NA', 1, 3, 1, 29, 31, 1, 2, 2, 5, 1, 'Mercedes-AMG ', 'G 63', '2022-03-15 14:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_bodytype`
--

CREATE TABLE `vehicle_bodytype` (
  `bodytype_id` int NOT NULL,
  `bodytype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicle_bodytype`:
--

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
  `category_id` int NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicle_category`:
--

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
  `color_id` int NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicle_color`:
--

--
-- Dumping data for table `vehicle_color`
--

INSERT INTO `vehicle_color` (`color_id`, `color`) VALUES
(1, 'Black'),
(2, 'White'),
(3, 'Red'),
(4, 'Sliver'),
(5, 'Blue'),
(6, 'Yellow'),
(7, 'Orange');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_fueltype`
--

CREATE TABLE `vehicle_fueltype` (
  `fueltype_id` int NOT NULL,
  `fueltype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicle_fueltype`:
--

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
  `img_id` int NOT NULL,
  `vehicle_id` int NOT NULL,
  `gallery_img` varchar(900) NOT NULL,
  `gallery_img_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicle_gallery`:
--

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
(18, 11, 'f5b46ba9fc2d58629387972fdcadec59.jpg', 'interior'),
(21, 14, 'a65449ff7bbdeb91c760a5b8e42ddd16.jpg', 'Side'),
(22, 14, 'c14eab6b09bb2579b684c92cf593537c.jpg', 'Back'),
(23, 14, '3bcd2ed2847b82fcb9746352dc974af2.jpg', 'Cover'),
(26, 14, '7e3f7a03a578558d8928822298bc74ca.jpg', 'Front'),
(27, 14, 'd9231b7501de5ccb17403f1b518d7903.jpg', 'Exterior'),
(28, 14, '563147b5bcf00e71a57bf9e56fbb2b25.jpg', 'Exterior'),
(29, 14, 'a698972c88cbfa55be84195012217482.jpg', ''),
(30, 14, 'c2363c55a1c07f8be977f2c20a8c921d.jpg', 'Interior'),
(31, 14, 'de60c04a60ae9962458c1b14f2401b58.jpg', ''),
(32, 14, 'e522c36951c1edd41326f7bf65ea1d40.jpg', 'Interior'),
(33, 15, 'a826eb1fde8770912bcaa5eccf770603.jpg', ''),
(36, 15, '2361fee1e00fc38aef91684c075c787d.jpg', ''),
(37, 15, '290d43434d3baf27c7973b7f9ae111f8.jpg', ''),
(38, 15, '3dd91a309bba6f9cdc2380af1bf2c58b.jpg', ''),
(39, 15, 'de705e65a6ed281e93630cccf878eb92.jpg', ''),
(40, 15, 'db1973f031761ef5dce70df8f2ec7c63.jpg', ''),
(41, 15, '44c1fe2e6980d6ef6ccc2862705e2778.jpg', ''),
(42, 15, 'f8dc928ef7400306e892038270d0c4aa.jpg', ''),
(43, 15, '7e21914e527b276aaeba3dcff708aaec.jpg', ''),
(44, 15, '9b4e1477087eff1f7b0c885720018f7f.jpg', ''),
(46, 15, '3f113bff0dd9ad62fc24edf4c2268cfb.jpg', ''),
(48, 15, '6992337830eb40c4c54e716f48d7a4d7.jpg', ''),
(49, 15, 'c3ef85107c10ca624e657a69fb48c3ad.jpg', ''),
(51, 15, 'e515c836b96317afd2688e5ef0dec9c5.jpg', ''),
(52, 15, 'd12da23012da49035cb23155a3ff6ccf.jpg', ''),
(54, 17, '89570a1b07e09e7306ddf17c39279c4f.jpg', ''),
(55, 17, '6e032b01214305b39de9a5b74cc81956.jpg', ''),
(56, 17, '32a5a47a2fb91d87a84fca543534b65f.jpg', ''),
(57, 17, '55fc8bf26b0179cef86489790f286e5d.jpg', ''),
(58, 17, 'b137bafcc0dc1c75c1308fb8ea3116f7.jpg', ''),
(59, 17, 'c462a60955a967532d80bfa7fa18766e.jpg', ''),
(60, 17, 'f4fae2720251500032c384682271c6fc.jpg', ''),
(61, 17, '6faca4e874a93deec362824e4b477d96.jpg', ''),
(62, 17, '090964eb53f4d79ebff12bd787799c45.jpg', ''),
(63, 17, 'c48fe92b91194d755970157cf9a289fa.jpg', ''),
(65, 17, '255c9f4d73a9cb74e397532f53a54d8f.jpg', ''),
(66, 17, '2222c72692b40574703cd243525427eb.jpg', ''),
(67, 17, 'dce1f54495344c1c89579c0c0c669363.jpg', ''),
(68, 17, '583b0b852be24f4633a3be0a450716cc.jpg', ''),
(69, 17, 'ba2892c20508475ce0788caeeae31bb9.jpg', ''),
(70, 17, '67b0fcb8c269302817578ca8abc4a5c0.jpg', ''),
(71, 17, '9c7b9f3685d03390adee4f4738af0ffc.jpg', ''),
(72, 17, '739a2d6fb4985556fc0ce7b92064b93f.jpg', ''),
(73, 17, '8459a71ed1057adf5d95abd04e5aa40b.jpg', ''),
(74, 17, '1d13f6ba5e119f0bc7ef88b6a136b7ac.jpg', ''),
(75, 17, 'c8281aa9577778d5bb135a47fa3a4c0d.jpg', ''),
(76, 17, '153f27485ee218a8ca911e9b31c4e6f6.jpg', ''),
(77, 17, '5fc2d8e52cc3a34ca2a04919ff16e327.jpg', ''),
(78, 17, '1e5c2590c6c17c51897db614f456b955.jpg', ''),
(79, 17, '659073917ee7fc8fc9e236eb70fd5303.jpg', ''),
(80, 17, '14a0e4937ae371eb7c75659df0c62088.jpg', ''),
(82, 19, '5213c088dc9bc37110a70e46614d66ed.png', ''),
(83, 19, '491b9f99e1b9fbc1b28f4653ee2d1cb7.png', ''),
(84, 19, 'aad55c1a3da8958943868f0db067c598.png', ''),
(85, 19, '59d36141d6c7d9f9b3dc498c0217ffc3.png', ''),
(86, 19, '6c6957be45d9a0103bd3b5d84d4e077e.png', ''),
(87, 19, '4e18cc8ab519ad2076c1235c539a65e2.png', ''),
(88, 19, 'e063d55c9c17daed75e084605e011fad.png', ''),
(89, 19, '73a436a0bb8f7a1bb8c5cbf6cc54597b.png', ''),
(90, 19, '683bc9eb2a2926f4a3da926533da1c4b.png', ''),
(91, 19, 'e075f9804b3214c456221b373e9821d0.png', ''),
(92, 19, '0d9c4b376514bb35219992307ba02bb6.png', ''),
(93, 19, 'd0f035d172a9dfa519fe39784992d8cf.png', ''),
(94, 19, '39f1ace09752257a150cbfafbff4c9d5.png', ''),
(95, 20, '068b6bcb4afc0fc6c022e3598a2db765.png', ''),
(96, 20, '5254b40268de28cc2c7aba035dbce603.png', ''),
(98, 20, '3b00c456f5c0027f050ff1981962c75b.png', ''),
(99, 20, '8d5bbcd9da10926014a4d3bbf3ee9ee2.png', ''),
(100, 20, '3fe0ca1fddde1d3f2684bfa20492a43b.png', ''),
(101, 20, '0099794853024954cfbfb966824210aa.png', ''),
(102, 20, 'f825a4aa995330ac2681fcd4ae576f4c.png', ''),
(103, 20, 'b9f4afa4b0bb0da5893ed4486d96d363.png', ''),
(104, 20, '3f23aba49c88938dfa036f885c20e8c3.png', ''),
(105, 20, '331dda05f5c206635069e2a0a7cbd7fd.png', ''),
(106, 20, 'f801a37184ff75b64c3f2cbd55040f5b.png', ''),
(107, 20, '5fec060cb72b69587eb71ac6f4c86e0e.png', ''),
(108, 20, 'bd4f29eaee33d1110afe2e92d0f1e00d.png', ''),
(109, 20, 'e4a058177e76601d5100d425de9cf6ed.png', ''),
(110, 20, 'c4e2559c8a1c781ace49b81f7119aef0.png', ''),
(111, 20, '00ee60f81b0196ed9fa1793b5e6bcad1.png', ''),
(112, 21, 'd9e9fb471f1df7a1945d62b8d20e8b2a.png', ''),
(113, 21, '69bdf38d3741c3382340be8ab725949a.png', ''),
(114, 21, '8a219097764a05ecc71541cf12121714.png', ''),
(115, 21, 'aabe5e8157d2b6005e66112c54ec994c.png', ''),
(116, 21, '69778d476cfea0204e365837e06e8deb.png', ''),
(117, 21, '9eaa6cefe77ebf763292826a309e69b4.png', ''),
(118, 21, '7b3c04b38763eeada22e0331444a34c6.png', ''),
(119, 21, 'ed4c8698bc889a5cc07a8585948a0a0f.png', ''),
(120, 21, 'ce6a90ce476b1f4b5cb448a1d7230448.png', ''),
(121, 21, '53992e72d790949c70347a93cf910e1e.png', ''),
(122, 21, 'cf0ec448664612d6e9597a878eeae7a0.png', ''),
(123, 21, 'fac083942b9305e305215793a13cb371.png', ''),
(124, 21, '6e4ab9cad16f95ea3aacc105399bf245.png', ''),
(125, 21, '0c3d370e965a54a3b5abaf51255d43dc.png', ''),
(126, 21, 'a1f3b78cd62a79e29afdbd42919196fe.png', ''),
(127, 21, 'b16d2160a6476eef86918d688a44be68.png', ''),
(128, 21, 'b4cef1ec2d3de7bcf29f397d5ae23fa7.png', ''),
(129, 18, '46d599c32df67ea76306b40cf6b35152.JPG', ''),
(130, 18, 'b37cb95cd17583aa9946bc18282db3c1.JPG', ''),
(131, 18, '10df90a11f72dd8d8c578eeaf86467b3.JPG', ''),
(132, 18, '169c85ad54cc46fe1f547f71560cd048.JPG', ''),
(133, 18, '715652f771f302ea19d7c2dd6afce90e.JPG', ''),
(134, 18, '5d62f94764063b94d2dd3b994dfd034e.JPG', ''),
(135, 18, '5a933867e9365c724de0a6d491ae8091.JPG', ''),
(136, 18, '7a0309b37f77e5b874b3257fa40d7772.JPG', ''),
(137, 18, '08b7f2c56915b96facce7ff164d79011.JPG', ''),
(138, 18, 'e534abb8307c772e3a3c8a9e40b8425e.JPG', ''),
(139, 18, '16c3fcafddfb836d56ba15e46928f96a.JPG', ''),
(140, 18, '59f3da8597f232525cfe6296f89646c5.JPG', ''),
(141, 18, '84eeccc4f4e51738ca971668d75bcce8.JPG', ''),
(142, 18, 'd9708692a9b0db4f4ceaef7124b8022e.JPG', ''),
(143, 18, 'f7aae3c8c36258aabb56495a720e4da2.JPG', ''),
(144, 18, '57796803d118235168513c75bff622da.JPG', ''),
(145, 18, '51420c92918da17239272638ea8d8981.JPG', ''),
(146, 22, '115839033027ab497aefcac26853b028.png', ''),
(147, 22, 'f2854ee192867676ac2baa2b010ffc71.png', ''),
(148, 22, '089c74cda820a1001a201c11e16b4362.png', ''),
(149, 22, 'be752d11ab13f932b606bdb533619b0f.png', ''),
(150, 22, 'b36e25d4d15c12549dc36b7af7e569c5.png', ''),
(151, 22, '309cf49c890fc3b92fbcacfc71b10597.png', ''),
(152, 22, 'c3fc26ceab9453cee37933ea1313e1d5.png', ''),
(153, 22, 'ffff7b76d4496994e18aea2052d44ca7.png', ''),
(154, 22, 'd649b5b3db8278d940743d429938c623.png', ''),
(155, 22, '1fb4a44f1f35efdbc2dafd6a111c37bd.png', ''),
(156, 22, '1a72d6508ef715e75e4e4128b88a2a8d.png', ''),
(157, 22, '135beb9d4f9b739b3c590d7cc4fb192a.png', ''),
(158, 22, '6ebd52dbd1cdb29426dd64f47ce14dc2.png', ''),
(160, 22, '6525f96c862efed92d9876a67744f8e3.png', ''),
(161, 22, 'dc95b3abbfe727234bdc6470b80f71f5.png', ''),
(162, 23, '98627b1c60c2475c39d50a53b09040ac.png', ''),
(163, 23, 'f005abd643520e55ee4e85e62bf8dafe.png', ''),
(164, 23, '5eb6be27d5b0fa0d6190ba6a572d884e.png', ''),
(165, 23, 'c88b185a60b6e9675ef5f4e5fdbdc5c9.png', ''),
(166, 23, '6da762a9db09afd00839e77e40b9bfdb.png', ''),
(167, 23, 'a52e210e5eb1357c93e210762a3c15da.png', ''),
(168, 23, '985014a8be51662abe40ff17a505d4a9.png', ''),
(169, 23, '4f1f52058d7b5f979e73651a27553879.png', ''),
(170, 23, '4521f881c91923306b3464b38348500b.png', ''),
(171, 23, 'b376886872dcfbb8b9933da144c2b669.png', ''),
(172, 23, '29b95c9aeff9fd04becee1f03daf1785.png', ''),
(173, 23, '993427e42ff9fffac25282bf9ca76481.png', ''),
(175, 23, '3359f536eb280045e2d511a1ee308af8.png', ''),
(176, 23, '7240a8c88b2f11b602afe7c685002b6c.png', ''),
(177, 23, 'e8ace58f836a7dfb79f9c7f696baa824.png', ''),
(178, 23, 'a0054362ba480f4b2add202dbe4e0ba9.png', ''),
(180, 25, 'ec01f99ad421ca8abae833616111cfbb.png', ''),
(181, 25, '220fb453bf3631c936ca7c034a4b42f6.png', ''),
(182, 25, 'a6993ee0a1cf9d59ddbddbc6467b3eaf.png', ''),
(183, 25, 'c1008b17e0e72ce9075d7658094aabd9.png', ''),
(184, 25, '85d91fe6feb1c06f85ecbb92893712aa.png', ''),
(185, 25, '778438efb68f6a32c104ab9f1adcd3a7.png', ''),
(186, 25, '3abb170b2734ffad46268ad8ec1b738a.png', ''),
(187, 25, '78781b5332115b5715533a4425a730aa.png', ''),
(188, 25, '5e3dfa01e23ef4274a557d41aa59e8ca.png', ''),
(189, 25, '09bcd822349c97f5ee76db31e713e7c4.png', ''),
(190, 25, 'e443ead3eec9079ce8e4cdbe8c10c12b.png', ''),
(192, 25, '3b79ccd11cd50a9bb473da283288a7e6.png', ''),
(195, 26, '34790d6cd49cd5063d7d3b802bb31ea1.png', ''),
(196, 26, '2816e38b3041b5f8565f75143f63edc5.png', ''),
(197, 26, 'c703bf0440e03f644a73c3fe7e31e235.png', ''),
(198, 26, 'b6f8621a771f837fcca1fedba4db39e6.png', ''),
(199, 26, '0d7773fb05389cdc9498ad958f2b3cd5.png', ''),
(200, 26, '42eff551b6ea060eeaa3d2adbc64f7ac.png', ''),
(201, 26, '66d013d1af5f080f3a9cfc16b94e4c13.png', ''),
(202, 26, 'd52cb349374ec09c74955eb258512d90.png', ''),
(203, 26, 'b9ca3a8bb5a3f40d5f027b4bf2d9c20e.png', ''),
(204, 26, '28f9111c8d042b87ac5b51f5e2de3e2a.png', ''),
(205, 26, 'eb4b7ccbfc9426c2ae6b3d80d25d0c61.png', ''),
(206, 26, 'a78c1dd8b8213677991288ccd43277ef.png', ''),
(207, 26, 'fa09a8a965c7eca50998a64d36b6443d.png', ''),
(208, 26, '3c189953dc752122652b07e099b9dbd5.png', ''),
(209, 26, 'f4ed352d49ae2a8286545a1eca923c89.png', ''),
(210, 26, 'f4995d9ce8aeb245f6083164eb249831.png', ''),
(211, 26, '32fb570315b8ea8dd668e36a579f39ba.png', ''),
(212, 28, 'e33c78c94fc2bb77c58ad0122d3fc1ff.png', ''),
(213, 28, '7b12749d3b784777b88545bd6b442e93.png', ''),
(214, 28, 'bc8de6391a6f27764dcb944538f85391.png', ''),
(215, 28, '6bd9f00d7d873cc751bf68e69358f2d3.png', ''),
(216, 28, '15e4fcff282a020cfad4ca855db6cd6b.png', ''),
(217, 28, '1aa3d1552165bef4054b51bf870cddd3.png', ''),
(218, 28, '27f98f36cc97a70ab4089a81c19eb349.png', ''),
(219, 28, 'd9aa37038c5359f2849d2643b16f5ea2.png', ''),
(220, 28, '995b65f8f68b2b9bc23a8133579affba.png', ''),
(221, 28, '62f66403499f9d3d30db47b81e96e488.png', ''),
(222, 28, '08d90e7e88f21384671219bc1c7e6806.png', ''),
(223, 28, '053a953e07f87bb60c301492e4d37ebb.png', ''),
(224, 28, '191a50d53eaaabb118738fa861bd7e53.png', ''),
(226, 28, '79b71b88c0320c5b975cfe4d6ade89a2.png', ''),
(229, 28, '62e8c0a2b3dc38011f9908b2550edf4c.jpg', ''),
(230, 28, '5beffa615ffaf7e28823299b56516b80.jpg', ''),
(231, 29, 'e1ee874c8005940390ec19a4de3e6bd2.png', ''),
(232, 29, '950734ea0f87fe18675d108ba3669bf1.png', ''),
(233, 29, '57a676198b531862a40b4499edef539b.png', ''),
(234, 29, '173af36ff257c5ff36f7515de1f0619d.png', ''),
(235, 29, 'b610d90cbc27953d8972e371c0317dac.png', ''),
(236, 29, '339da8b7e76ba8c39e2981b5afd71c0e.png', ''),
(237, 29, '74aa9c3ef626cfa8339cbd9419e89878.png', ''),
(238, 29, '99728f11c3b560835f238ff999e12495.png', ''),
(239, 29, '49b3bbb078b16fec9034040361edfe54.png', ''),
(240, 29, '4869fbc6943c6e3a3ef689757dc15a0f.png', ''),
(242, 29, '2729c783559eb525e61e7d61de9363df.png', ''),
(243, 29, '94142008e05526faa73f31fcf36c173a.png', ''),
(244, 29, 'a23f29a7440bb9c97bddbc5630b18ace.png', ''),
(245, 29, '06f6066da82894ed7358d558c8cd0cd2.png', ''),
(248, 29, '46d16384191fd7ad4b0c5f706ffa804b.jpg', ''),
(249, 29, 'f3db882dac520a93bc642e6204c36125.jpg', ''),
(250, 30, '2c01fc6f0ce8c8657c8b121bbdb7107c.png', ''),
(251, 30, '00d7b7f7b20852af359a911392ba6ef4.png', ''),
(252, 30, '88c134e958a69f1785842e1c8d646558.png', ''),
(253, 30, '27afc4511078b69a1a7c1ea6260195a5.png', ''),
(254, 30, '4c2aa0af9dd1fe0174e29f184dd71200.png', ''),
(255, 30, '38fadbe45b7d3ca08de5c45f41d4cc29.png', ''),
(256, 30, '3b240540ddf402af2ec2386ef2455a6c.png', ''),
(257, 30, '96dfefecbba771e5ebbc7940facf91ef.png', ''),
(258, 30, '904b15398315e79477736d7b97ecd474.png', ''),
(259, 30, '78b936da8e1b44f027c2acfa396eb989.png', ''),
(261, 30, '695ae00fcc13a413a8f3899d970f48a6.png', ''),
(262, 30, '2799e9d39436dcab9e068bfd7d3fc7c4.png', ''),
(263, 30, '561fde8b875978d073b0ddc32b7771c0.png', ''),
(266, 30, '023059f79002bf1b433c41c8aeb0ffb3.jpg', ''),
(267, 30, '07f029ae1ca7ff54176694b9e50c0f83.jpg', ''),
(268, 31, 'b2b9274db56d82b1102f2b615bf5b534.jpg', ''),
(269, 31, 'aa1a1fe90c599080370024d0bc6cca3f.jpg', ''),
(270, 31, '90c92bf5122de379e39e7014b25bc7b6.jpg', ''),
(271, 31, '4f3787b40f1d8d129f0942ae68b7ca17.jpg', ''),
(272, 31, 'd4f6b0ca6c689e8f02df44171bf7d516.jpg', ''),
(273, 31, '11858f242500d5b3f466620315b3a89c.jpg', ''),
(274, 31, '21fb8c6a422b3cfec39eb8fcab381bec.jpg', ''),
(275, 31, '70f76888861af899b2b23bfbe7dde8a0.jpg', ''),
(276, 31, 'bee567143ea529132381e53a7d08701b.jpg', ''),
(277, 31, '16fc84780450993c33c6502e6b334a3d.jpg', ''),
(279, 31, '48eff03cc96c91cccde79a870b4ace29.jpg', ''),
(280, 31, '91a564d5cc3bb07b6f0b69c51c2f9bfa.jpg', ''),
(281, 31, '3c0b28cb46b627cd036602637aa08544.jpg', ''),
(282, 31, 'f62baba188edf52ae229c797980447f2.jpg', ''),
(283, 31, '475849cc9f59e10c16611dcac2937253.jpg', ''),
(284, 32, '7beeecd2ab2dd4f9ed38f3dd2f7f676a.png', ''),
(285, 32, 'b36e7af971655ca16c15d2d87f45f916.png', ''),
(286, 32, 'c04551fd60d815dbfecf7ac95eee41f1.png', ''),
(287, 32, '5ec8d99f5029a17502be05276469a591.png', ''),
(288, 32, '8a6bef23f310d419067631ee624f4e7d.png', ''),
(289, 32, 'e3687f1764dc4134a7c1ef09d181a198.png', ''),
(290, 32, '0e157bf7982ae9e887b881f9e219d155.png', ''),
(291, 32, '50bbcd17dd9a217e03ab1e82152864d0.png', ''),
(292, 32, 'c6893b65b6a52e9c566a38fd12f5dd8e.png', ''),
(293, 32, '83f2dce347d4ff765cfe17579c00803b.png', ''),
(294, 32, '0135cb4d246d111e37c789ad2f5c23cf.png', ''),
(295, 32, '6c4eb651ffb8f33131e88409484602f5.png', ''),
(296, 32, '197cc965b5aebc4f456f3a924ac28370.png', ''),
(298, 32, '65377773fd54eee3d52653dc53711c84.png', ''),
(299, 32, '2b53eadb9faed601df58c5258902f355.jpg', ''),
(300, 10, 'be17cec8c22e3d8c49c9a4ed95b525ad.jpg', 'side'),
(301, 10, '2d06b51b2744b14991b2ca4f55626e62.jpg', 'interior'),
(302, 10, '5a614ac7381b3b39f5f117c5ddd3be35.jpg', 'interior'),
(303, 10, 'cfb7a80ae56c85d71e5194dc1322aac2.jpg', 'interior'),
(304, 80, 'be17cec8c22e3d8c49c9a4ed95b525ad.jpg', 'side'),
(305, 80, '2d06b51b2744b14991b2ca4f55626e62.jpg', 'interior'),
(306, 80, '5a614ac7381b3b39f5f117c5ddd3be35.jpg', 'interior'),
(307, 80, 'cfb7a80ae56c85d71e5194dc1322aac2.jpg', 'interior'),
(308, 88, '380c075bb39c6b764f5b122c61b958d0.jpg', 'side'),
(309, 88, '3b096d73a3c69a997696805794ed878a.jpg', 'interior'),
(310, 88, '90752e950ed95b4049c18929afd14c54.jpg', 'interior'),
(311, 88, '35a36881583d1408d7c473f8b6ce183c.jpg', 'interior'),
(312, 81, '69e4e4ede0954103639829535710626e.jpg', 'front'),
(313, 81, '22956771d49f83d797c3eb677438dc59.jpg', 'side'),
(314, 81, '150df797a9e6e765bb7d3e6aebd9e674.jpg', 'wheel'),
(315, 81, '141fa540364ba847a32e50b3f267ef1c.jpg', 'interior'),
(316, 82, 'ff727d8bc9b67ccb3f55e34fb9b5d29d.jpg', 'front'),
(317, 82, '8a6b0d92b3df4b72d5503c282108e634.jpg', 'interior'),
(318, 82, '14b3f4f16981a16b016627ade6b82240.jpg', 'interior'),
(319, 79, 'be37238ed87e5f7fdfdeba682846f1ef.jpg', 'back'),
(320, 79, '8d26b599e869aaf1510ec54fb9751708.jpg', 'interior'),
(321, 79, '0d7fd00efbbdba07fcbca704172747f0.jpg', 'interior'),
(322, 79, '8c52d1bf953a30a65415156313228b2c.jpg', 'interior'),
(323, 83, '97dbcf702ca36d9bb01de044f241151c.jpg', 'side'),
(324, 83, 'b6ef31264ccfe3853429da63fc10a18a.jpg', 'side'),
(325, 83, 'c9e1777696130a68eed53a480409ba23.jpg', 'interior'),
(326, 83, '230b13fd623a460273ae9c5bdbaaabdf.jpg', 'interior'),
(327, 78, 'edb0983ee2ebbbb4ae3a0f72a14b14e5.jpg', 'interior'),
(328, 78, '7c101688e4de3a188c5b78ffe16ba26c.jpg', 'interior'),
(329, 78, '01d4e1ee7d040eb588d166b70dd8afed.jpg', 'interior'),
(330, 84, 'fba9cdfad7e173c06463aac13da14b30.jpg', 'side'),
(331, 84, 'a4470926590681d46c53606e2143ebaf.jpg', 'interior'),
(332, 84, 'e2263e6585a96dfe91560a4bf9bb4fb0.jpg', 'interior'),
(333, 85, '61611ca370019171cc0fbc12c6eced50.jpg', 'interior'),
(334, 85, '824548637026131d214fbde6e8852003.jpg', 'interior'),
(335, 85, 'fff77d0c9ff9d6972185a2b95bf38cb5.jpg', 'other color'),
(336, 66, '2252d4d0c00e746b00a855f30b07f3ee.jpg', 'interior'),
(337, 66, '15f9beb79980cb35cc0f9b7daacab7e3.jpg', 'interior'),
(338, 66, 'ccec1d238d3b55df5dd691b5e7cf4c87.jpg', 'wheel'),
(339, 67, 'f4c74e9bc2c0befb36a42cbd6f30833b.jpg', 'interior'),
(340, 67, '339d67ebd9b368c2ed147fe7b1d6bbc8.jpg', 'interior'),
(341, 67, 'c65d663915ace6f44f9cb4426edd4c01.jpg', 'interior'),
(342, 86, '962deea105f33961f1e579d5a4c69421.jpg', 'back'),
(343, 86, '3b5f697a99f0322d57e184231a46709c.jpg', 'interior'),
(344, 86, '169734727c319455b1b90bcd5624097f.jpg', 'interior'),
(345, 68, '4397b079f6185fdff3cf8a6a8807e5ae.jpg', 'side'),
(346, 68, 'ec888c5bf7df235dfcd798c338bb9678.jpg', 'interior'),
(347, 68, 'dece1a74f6f67e570727931f58fefcdc.jpg', 'interior'),
(348, 69, '8a7b0adec407df7670e0cb81568e08d2.jpg', 'side'),
(349, 69, 'c36fabfa0f39d0c0a95a955249df4062.jpg', 'back'),
(350, 69, '8b41d2bf731400466ca4ca25e7b085a9.jpg', 'interior'),
(351, 65, 'b76112aff00b01e277f495e37826d876.jpg', 'interior'),
(352, 65, 'ea8327e71a3842358240a3cca02d5916.jpg', 'interior'),
(353, 65, '6dd0c149fd6cce82ae06f157ab93e994.jpg', 'side'),
(354, 65, '847bf4f99024e99bf2a2fbc32eb16a69.jpg', 'back'),
(355, 27, 'd862eb298887e6bbd827155398fdda8b.png', ''),
(356, 27, '38a86a74f2a469c794c306754e2f8ce6.png', ''),
(357, 27, 'a0f60b540c064f7d4d4ffdf037126c54.png', ''),
(358, 27, 'cc98c6a324eab4b7fbd8a8e7968e5208.png', ''),
(359, 27, 'da7d8ffee81a0285cc6a24a7ddb20789.png', ''),
(360, 27, '607ce6e50993699c36c3b512f83104b5.png', ''),
(361, 27, '63c20a94b58d77aa1335a49f75243d0d.png', ''),
(362, 27, '4f431f837f80211c9501d63a5e0c31a9.png', ''),
(363, 27, '0032d2f42e0da1d224fc3fa8a0987b45.png', ''),
(364, 27, '3d316c70061923c6187f9c1e66eeb877.png', ''),
(365, 27, '7727f2351150158cd023fa80bfedaafc.png', ''),
(366, 27, 'b3cb8327bf6e57aff2478998704ac79b.png', ''),
(367, 27, '9f5606cb2d3da9699cca87741e112d76.png', ''),
(368, 27, '0057f03c384d751e9e88729b74a3549c.png', ''),
(369, 27, 'e7c1e5876b4a163a21cbfd127c5e9405.png', ''),
(373, 24, '646143afcf8dcd2d9ae285a435613b20.png', ''),
(374, 24, '3922acc4cbda399e5e15d30b25bb85d4.png', ''),
(375, 24, '5cdf9cc0a33287e5c4490aa5bb2e0968.png', ''),
(376, 24, 'b87002cb69d8462be8dfc3c9e1f2e447.png', ''),
(377, 24, '79ed0771ecbf3345fc876c99172bd1ca.png', ''),
(378, 24, 'cf0229f0fd30be831ac5b34c79328234.png', ''),
(379, 24, '7b8fb0d0fb72680cbf46d0d1e4cdbe47.png', ''),
(380, 24, 'e592c118fd12a0ab25696e51fb89ab98.png', ''),
(381, 24, '63f0caf6e55bea5ceb60158951cbcf0d.png', ''),
(382, 24, 'eb791b8b925815973b45dba4198df637.png', ''),
(385, 24, '4ddd7dff156e3be6f75ca2d2ce8f7699.png', ''),
(387, 24, 'c05856a02d0fa4aff2619434a8d3c4d3.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_location`
--

CREATE TABLE `vehicle_location` (
  `location_id` int NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicle_location`:
--

--
-- Dumping data for table `vehicle_location`
--

INSERT INTO `vehicle_location` (`location_id`, `location`) VALUES
(1, 'Auckland'),
(2, 'Christchurch'),
(3, 'Dunedin'),
(4, 'Nelson'),
(5, 'Queenstown'),
(6, 'Wellington'),
(7, 'Blenheim'),
(8, 'Tauranga'),
(9, 'Hamilton'),
(10, 'Invercagill');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_make`
--

CREATE TABLE `vehicle_make` (
  `make_id` int NOT NULL,
  `make` varchar(100) NOT NULL,
  `brand_logo` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicle_make`:
--

--
-- Dumping data for table `vehicle_make`
--

INSERT INTO `vehicle_make` (`make_id`, `make`, `brand_logo`) VALUES
(22, 'Volvo', 'ca9d7d8ebbe2a7985f61f0a51fb99fe0.png'),
(23, 'Honda', '31b1c25ad76b8f4850c08044d813af0f.png'),
(24, 'Suzuki', '34904c3530fad138578f1e6bf04d2110.png'),
(25, 'Tesla', '83f782e76c3ffc1ff47b5127c1bb3eac.png'),
(27, 'BMW', '18c30cc53c7720022221ebabb68519f9.png'),
(28, 'Hyundai', 'c2e869557ef3a7f9b86c8df85a503a95.png'),
(29, 'Mercedes', '2edf3991feeb0ac5d6a1ee1f1bf3bb5e.png'),
(30, 'Volkswagen', '4146349c91dcd0c273e555acba7f7df3.png'),
(31, 'Toyota', 'd24edbc7e491dc529fadd9a7ca01faee.png');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_model`
--

CREATE TABLE `vehicle_model` (
  `model_id` int NOT NULL,
  `make_id` int NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicle_model`:
--

--
-- Dumping data for table `vehicle_model`
--

INSERT INTO `vehicle_model` (`model_id`, `make_id`, `model`) VALUES
(1, 31, 'Corolla'),
(4, 29, 'E-Class'),
(14, 31, 'Prius'),
(15, 27, '3 Series'),
(16, 25, 'Model 3'),
(17, 27, '2 Series'),
(18, 27, '1 Series'),
(19, 27, 'i3'),
(20, 25, 'Model S'),
(21, 24, 'Vitara'),
(22, 24, 'Swift'),
(23, 24, 'Jimny'),
(24, 24, 'Ignis'),
(25, 23, 'HR-V'),
(26, 23, 'Jazz'),
(27, 23, 'CRV'),
(28, 23, 'Civic'),
(29, 22, 'Xc60'),
(30, 22, 'S90'),
(31, 29, 'G'),
(32, 30, 'Polo'),
(33, 28, 'Palisade'),
(34, 29, 'GLA'),
(35, 28, 'i20N'),
(36, 28, 'Kona EV'),
(37, 28, 'Staria'),
(38, 30, 'Crafter'),
(39, 30, 'Tiguan'),
(40, 30, 'ID.Buzz.'),
(41, 29, 'A180'),
(42, 31, 'Hiace'),
(43, 31, 'Yaris'),
(44, 31, 'Highlander');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_safety`
--

CREATE TABLE `vehicle_safety` (
  `safety_id` int NOT NULL,
  `safety` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicle_safety`:
--

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
  `seats_id` int NOT NULL,
  `seats` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicle_seats`:
--

--
-- Dumping data for table `vehicle_seats`
--

INSERT INTO `vehicle_seats` (`seats_id`, `seats`) VALUES
(1, 2),
(2, 5),
(3, 7),
(5, 4),
(6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_transmission`
--

CREATE TABLE `vehicle_transmission` (
  `transmission_id` int NOT NULL,
  `transmission` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicle_transmission`:
--

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_vehicle_id_fk` (`vehicle_id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`favourite_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `favourite_user_id_fk` (`user_id`);

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `vehicle_make_id_fk` (`make_id`),
  ADD KEY `vehicle_model_id_fk` (`model_id`);

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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `favourite_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `vehicle_bodytype`
--
ALTER TABLE `vehicle_bodytype`
  MODIFY `bodytype_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle_color`
--
ALTER TABLE `vehicle_color`
  MODIFY `color_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle_fueltype`
--
ALTER TABLE `vehicle_fueltype`
  MODIFY `fueltype_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_gallery`
--
ALTER TABLE `vehicle_gallery`
  MODIFY `img_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT for table `vehicle_location`
--
ALTER TABLE `vehicle_location`
  MODIFY `location_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicle_make`
--
ALTER TABLE `vehicle_make`
  MODIFY `make_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  MODIFY `model_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `vehicle_safety`
--
ALTER TABLE `vehicle_safety`
  MODIFY `safety_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle_seats`
--
ALTER TABLE `vehicle_seats`
  MODIFY `seats_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle_transmission`
--
ALTER TABLE `vehicle_transmission`
  MODIFY `transmission_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_vehicle_id_fk` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `favourite_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicle_make_id_fk` FOREIGN KEY (`make_id`) REFERENCES `vehicle_make` (`make_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `vehicle_model_id_fk` FOREIGN KEY (`model_id`) REFERENCES `vehicle_model` (`model_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
