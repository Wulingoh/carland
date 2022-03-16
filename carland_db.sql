-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2022 at 02:28 AM
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
-- Creation: Mar 09, 2022 at 12:28 AM
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `topic` varchar(300) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `contact`:
--

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `phone`, `topic`, `message`) VALUES
(27, 'Test Test', 'test@example.com', '', ' 0', 'helo tehresi  is fi this lnworlkongia onofgi pg');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--
-- Creation: Mar 09, 2022 at 02:02 AM
-- Last update: Mar 10, 2022 at 01:52 AM
--

CREATE TABLE `favourite` (
  `favourite_id` int NOT NULL,
  `user_id` int NOT NULL,
  `vehicle_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `favourite`:
--   `user_id`
--       `users` -> `user_id`
--   `vehicle_id`
--       `vehicles` -> `vehicle_id`
--

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`favourite_id`, `user_id`, `vehicle_id`) VALUES
(13, 11, 8),
(14, 11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
-- Last update: Mar 10, 2022 at 01:51 AM
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
('root', '[{\"db\":\"carland_db\",\"table\":\"favourite\"},{\"db\":\"carland_db\",\"table\":\"vehicles\"},{\"db\":\"carland_db\",\"table\":\"vehicle_location\"},{\"db\":\"carland_db\",\"table\":\"vehicle_make\"},{\"db\":\"carland_db\",\"table\":\"vehicle_model\"},{\"db\":\"carland_db\",\"table\":\"vehicle_safety\"},{\"db\":\"carland_db\",\"table\":\"vehicle_seats\"},{\"db\":\"carland_db\",\"table\":\"vehicle_bodytype\"},{\"db\":\"carland_db\",\"table\":\"vehicle_category\"},{\"db\":\"carland_db\",\"table\":\"vehicle_transmission\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- RELATIONSHIPS FOR TABLE `pma__table_info`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
-- Last update: Mar 10, 2022 at 02:22 AM
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
('root', '2022-03-10 02:22:57', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:31 AM
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
-- Creation: Mar 09, 2022 at 12:28 AM
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
(3, 'test@example.com', '$2y$10$thyLDjriaYwjYsBaM2f9sO8Mmh7mgL9MYXPMDPcBBJ6kQGLSrV7UW', 'test', 'customer', '1930833c5cac7fe2d0561713dc9079da'),
(5, 'tim@test', '$2y$10$Oa5Z2E5C.69I6RYFHPlLduHnewdX2V2lsPAwTeE.T12Bq9Zqw5yPi', 'Tim Test', 'customer', NULL),
(6, 'ban@example.com', '$2y$10$OhC1zJwpcXpeProhfQTy..SUYaUsIsIurS/UOdxV3EqOmhSy.iaeO', 'Ban Test', 'customer', NULL),
(11, 'test7@example.com', '$2y$10$YSEEKcZin.dRkei1ClWCN.InoptmUIq4nljJjLRqL2lET4hhNuHP.', 'Test Fullname', 'customer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--
-- Creation: Mar 09, 2022 at 04:28 AM
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
  `title` varchar(80) NOT NULL,
  `subtitle` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicles`:
--

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `img`, `price`, `year`, `mileage`, `engine_size`, `stock`, `detail`, `rego`, `category_id`, `bodytype_id`, `fueltype_id`, `make_id`, `model_id`, `transmission_id`, `color_id`, `seats_id`, `safety_id`, `location_id`, `title`, `subtitle`, `created_at`) VALUES
(8, 'ad11c839410502421f27cc4a8faebb4f.jpg', 108900, 2021, 28650, '1.6', 1, 'Mercedes-Benz The New E-Class Sedan. A more dynamic character all round.', 'Apr 2017', 1, 2, 4, 3, 4, 1, 4, 2, 5, 1, 'Test Title', 'Test Subtitle', '2022-03-09 04:21:42'),
(10, '993ada55b30867ae7951e94f070d9c9d.jpg', 30999, 2021, 25, '1.4', 1, 'Corolla hatch GX Hybrid，work errand and weekend sport!', 'NA', 1, 1, 4, 1, 1, 1, 1, 2, 5, 2, '', '', '2022-03-09 04:21:42'),
(11, '7db05eece6514734ce6d4b1b908c0aaf.jpg', 6999, 2010, 150000, '1.6', 1, 'AAAAA', 'KJW666', 2, 1, 1, 1, 1, 1, 1, 2, 5, 1, '', '', '2022-03-09 04:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_bodytype`
--
-- Creation: Mar 09, 2022 at 12:28 AM
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
-- Creation: Mar 09, 2022 at 12:28 AM
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
-- Creation: Mar 09, 2022 at 12:28 AM
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
(4, 'Sliver');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_fueltype`
--
-- Creation: Mar 09, 2022 at 12:28 AM
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
-- Creation: Mar 09, 2022 at 12:28 AM
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
(18, 11, 'f5b46ba9fc2d58629387972fdcadec59.jpg', 'interior');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_location`
--
-- Creation: Mar 09, 2022 at 12:28 AM
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
(2, 'Christchurch');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_make`
--
-- Creation: Mar 09, 2022 at 12:28 AM
--

CREATE TABLE `vehicle_make` (
  `make_id` int NOT NULL,
  `make` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELATIONSHIPS FOR TABLE `vehicle_make`:
--

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
-- Creation: Mar 09, 2022 at 12:28 AM
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
(1, 1, 'Corolla'),
(3, 1, 'Highlander'),
(4, 3, 'E-Class');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_safety`
--
-- Creation: Mar 09, 2022 at 12:28 AM
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
-- Creation: Mar 09, 2022 at 12:28 AM
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
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_transmission`
--
-- Creation: Mar 09, 2022 at 12:28 AM
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`favourite_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

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
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `favourite_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `color_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_fueltype`
--
ALTER TABLE `vehicle_fueltype`
  MODIFY `fueltype_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_gallery`
--
ALTER TABLE `vehicle_gallery`
  MODIFY `img_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vehicle_location`
--
ALTER TABLE `vehicle_location`
  MODIFY `location_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_make`
--
ALTER TABLE `vehicle_make`
  MODIFY `make_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  MODIFY `model_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_safety`
--
ALTER TABLE `vehicle_safety`
  MODIFY `safety_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle_seats`
--
ALTER TABLE `vehicle_seats`
  MODIFY `seats_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle_transmission`
--
ALTER TABLE `vehicle_transmission`
  MODIFY `transmission_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
