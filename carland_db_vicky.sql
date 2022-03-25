-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 05:41 AM
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
-- Database: `carland_db_lin`
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
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `favourite_id` int(90) NOT NULL,
  `user_id` int(90) NOT NULL,
  `vehicle_id` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`favourite_id`, `user_id`, `vehicle_id`) VALUES
(2, 1, 8),
(3, 1, 10),
(6, 2, 11),
(7, 2, 14),
(8, 2, 13),
(9, 11, 11),
(10, 11, 13),
(11, 11, 12),
(12, 11, 21);

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"carland_db\",\"table\":\"favourite\"},{\"db\":\"carland_db\",\"table\":\"vehicles\"},{\"db\":\"carland_db\",\"table\":\"vehicle_location\"},{\"db\":\"carland_db\",\"table\":\"vehicle_make\"},{\"db\":\"carland_db\",\"table\":\"vehicle_model\"},{\"db\":\"carland_db\",\"table\":\"vehicle_safety\"},{\"db\":\"carland_db\",\"table\":\"vehicle_seats\"},{\"db\":\"carland_db\",\"table\":\"vehicle_bodytype\"},{\"db\":\"carland_db\",\"table\":\"vehicle_category\"},{\"db\":\"carland_db\",\"table\":\"vehicle_transmission\"}]');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-03-10 02:22:57', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

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
(1, 'abc@126.com', '$2y$10$uKWpHIxmam/nzdmqYJB4F.qOsL7W82eMj/TFxmzGaZmuezcEVPZg.', 'Vicky Kang', 'admin', NULL),
(2, '123@126.com', '$2y$10$QsMVhwlgO5/WUZC97wpDZuJwXR.aB5ayoAyjHPz86tkyCbqujsUFi', 'Dan Kang', 'customer', NULL),
(10, 'test@126.com', '$2y$10$3fDY6qVZ2jAKKkEB9Irm4.mdhrNC/kgT/OG91EilIkY7lVOiiDfyO', 'test', 'customer', NULL),
(11, 'kang@gmail.com', '$2y$10$IhSaMg/.NpwWLL/5dqH/Xur7Y3oT89B1MFGA6TS7ifFztQ4WLD5vC', 'Kang Kang', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `mileage` int(11) NOT NULL,
  `engine_size` varchar(90) NOT NULL,
  `stock` int(11) NOT NULL,
  `detail` varchar(900) NOT NULL,
  `rego` varchar(900) NOT NULL,
  `category_id` int(11) NOT NULL,
  `bodytype_id` int(11) NOT NULL,
  `fueltype_id` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `transmission_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `seats_id` int(11) NOT NULL,
  `safety_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `subtitle` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `img`, `price`, `year`, `mileage`, `engine_size`, `stock`, `detail`, `rego`, `category_id`, `bodytype_id`, `fueltype_id`, `make_id`, `model_id`, `transmission_id`, `color_id`, `seats_id`, `safety_id`, `location_id`, `title`, `subtitle`, `created_at`) VALUES
(8, 'd85df46f0bb001369b33dcff8ee49a89.jpg', 88900, 2021, 28650, '1.6', 1, 'Mercedes-Benz The New E-Class Sedan. A more dynamic character all round.', 'LIN123', 2, 2, 4, 3, 4, 1, 4, 2, 5, 1, 'Mercedes-Benz The New E-Class Sedan', 'A more dynamic character all round.', '2022-03-09 04:21:42'),
(10, 'd3d99ace7a1945b60ac24bba3bebfef1.jpg', 30999, 2021, 25, '1.4', 1, 'Corolla hatch GX Hybrid，work errand and weekend sport!', 'NA', 1, 1, 4, 1, 1, 1, 1, 2, 5, 2, 'Corolla hatch GX Hybrid', 'Work errand and weekend sport!', '2022-03-09 04:21:42'),
(12, '885f26f48202b477bbdafeed573fa6b7.jpg', 311199, 2021, 120, '3.0', 1, '', 'NA', 1, 3, 1, 3, 5, 1, 2, 2, 5, 1, 'Mercedes-AMG G 63', 'The unique DNA of the G-Class ', '2022-03-16 03:53:37'),
(13, '6b52283a25e9087b6621e40dcf88712e.jpg', 18999, 2018, 36980, '1.4', 1, '', 'ABC123', 2, 1, 4, 5, 6, 2, 5, 2, 4, 2, 'Volkswagen Polo TSI DSG', 'The little one with a big attitude', '2022-03-16 03:58:50'),
(14, 'fe1d99736060da91e020cfeeb8987c7a.jpg', 16999, 2020, 107990, '3.8', 1, '', 'NA', 1, 3, 2, 6, 7, 1, 4, 3, 5, 1, 'Hyundai Palisade  V6 GDi Limited', 'The ultimate in luxury and practicality', '2022-03-16 04:03:53'),
(17, 'ba3c15f05d7d79276ac515fdc8d753c5.jpg', 53990, 2021, 99, '1.6', 1, '', 'NA', 1, 1, 1, 6, 9, 2, 6, 2, 5, 2, 'All-new Hyundai i20 N', 'High-performance features for the thrill of driving', '2022-03-24 07:28:59'),
(18, '75c53b371fce057cea93a4247c2737f9.jpg', 69990, 2021, 120, 'NA', 1, '', 'NA', 1, 1, 3, 6, 10, 1, 6, 2, 5, 1, 'Kona Electric Series II', 'New Energy. Zero Emissions. Electrifying Design..', '2022-03-24 07:40:18'),
(19, '52159cda1df86a1cbfd81ee00ee2ba1b.jpg', 69990, 2021, 10, '2.2', 1, '', 'NA', 1, 4, 2, 6, 11, 1, 1, 4, 5, 1, 'All-new Hyundai Staria', 'Staria 2.2 Diesel Automatic 8-seater Family Van', '2022-03-24 07:58:01'),
(20, '69da8c4a882eb06a422f65d100f7e21f.jpg', 65000, 2018, 66, '4.0', 1, '', 'NA', 1, 4, 2, 5, 12, 1, 2, 4, 5, 1, 'Volkswagen The Crafter Van', 'The best tool for your trade', '2022-03-24 08:24:10'),
(21, '90eadad0879efc1e3be4bf407a7f3a0d.jpg', 47990, 2021, 200, '3.0', 1, '', 'NA', 1, 3, 1, 5, 13, 1, 1, 2, 5, 2, 'Volkswagen The new Tiguan', 'You\'ll never want to leave', '2022-03-24 08:36:54'),
(22, 'b6b8848761753b331c4ae563315a2415.jpg', 89999, 2022, 0, 'NA', 1, '', 'NA', 1, 4, 3, 5, 14, 1, 5, 4, 5, 1, 'Meet the all-electric VW ID.Buzz.', 'Built on the unique DNA of the legendary T1 camper van', '2022-03-24 08:45:30'),
(23, '24153b218539bcfa57c45f0f2e24a455.jpg', 76199, 2021, 106, '2.2', 1, '', 'NA', 1, 3, 4, 3, 8, 1, 4, 2, 5, 2, 'Mercedes-Benz GLA 200', 'The perfect urban SUV.', '2022-03-24 08:56:36'),
(24, '0649a7a1621a94a1142017762b428e29.jpg', 53999, 2020, 82, '1.6', 1, '', 'NA', 1, 1, 4, 3, 16, 1, 3, 2, 5, 2, 'Mercedes-Benz A180', 'A design that suits your lifestyle', '2022-03-24 09:02:07'),
(25, 'ac429e38568202d14438bd4b9baa866e.jpg', 60990, 2021, 10, '3.0', 1, '', 'NA', 1, 3, 1, 1, 3, 1, 7, 3, 5, 2, 'Toyota Highlander GXL ', '7 seats and spacious cabin ensures travel comfort for any drives', '2022-03-24 09:44:11'),
(26, '5fc715dd3ca50c884c6376146d3979bc.jpg', 51490, 2021, 30, '4.0', 1, '', 'NA', 1, 4, 2, 1, 17, 1, 2, 1, 5, 1, ' The Toyota Hiace van ZX', 'Redesigned top to bottom, this is the van of your dreams', '2022-03-24 09:54:21'),
(27, 'fed56d5aa80cf8a9b84865b5f3cc2ba5.jpg', 27290, 2020, 366, '1.6', 1, '', 'NA', 1, 1, 4, 1, 18, 1, 4, 2, 5, 2, ' Toyota the New Gen Yaris Hatch', 'Compact. Agile. And incredibly capable.', '2022-03-24 10:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_bodytype`
--

CREATE TABLE `vehicle_bodytype` (
  `bodytype_id` int(11) NOT NULL,
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
  `category_id` int(11) NOT NULL,
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
  `color_id` int(11) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_color`
--

INSERT INTO `vehicle_color` (`color_id`, `color`) VALUES
(1, 'Black'),
(2, 'White'),
(3, 'Red'),
(4, 'Sliver'),
(5, 'Orange'),
(6, 'Blue'),
(7, 'Gray');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_fueltype`
--

CREATE TABLE `vehicle_fueltype` (
  `fueltype_id` int(11) NOT NULL,
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
  `img_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
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
(14, 10, 'be17cec8c22e3d8c49c9a4ed95b525ad.jpg', 'side'),
(15, 10, '2d06b51b2744b14991b2ca4f55626e62.jpg', 'interior'),
(16, 10, '5a614ac7381b3b39f5f117c5ddd3be35.jpg', 'interior'),
(17, 10, 'cfb7a80ae56c85d71e5194dc1322aac2.jpg', 'interior'),
(18, 11, 'f5b46ba9fc2d58629387972fdcadec59.jpg', 'interior'),
(20, 12, '380c075bb39c6b764f5b122c61b958d0.jpg', 'side'),
(21, 12, '3b096d73a3c69a997696805794ed878a.jpg', 'interior'),
(22, 12, '90752e950ed95b4049c18929afd14c54.jpg', 'interior'),
(23, 12, '35a36881583d1408d7c473f8b6ce183c.jpg', 'interior'),
(27, 17, 'fb5b3db58c4af36e9fb086c5c021230b.jpg', 'side'),
(28, 17, '71e55699521fdd1dab75137e581d7b39.jpg', 'back'),
(29, 17, '248a9aab3c4695ce0cac1370ba8981ab.jpg', 'wheel'),
(30, 17, 'ffab8d3ee966aebcc46cb1742252ef53.jpg', 'interior'),
(31, 18, '69e4e4ede0954103639829535710626e.jpg', 'front'),
(32, 18, '22956771d49f83d797c3eb677438dc59.jpg', 'side'),
(33, 18, '150df797a9e6e765bb7d3e6aebd9e674.jpg', 'wheel'),
(34, 18, '141fa540364ba847a32e50b3f267ef1c.jpg', 'interior'),
(35, 19, 'ff727d8bc9b67ccb3f55e34fb9b5d29d.jpg', 'front'),
(36, 19, '8a6b0d92b3df4b72d5503c282108e634.jpg', 'interior'),
(37, 19, '14b3f4f16981a16b016627ade6b82240.jpg', 'interior'),
(38, 14, 'be37238ed87e5f7fdfdeba682846f1ef.jpg', 'back'),
(39, 14, '8d26b599e869aaf1510ec54fb9751708.jpg', 'interior'),
(40, 14, '0d7fd00efbbdba07fcbca704172747f0.jpg', 'interior'),
(41, 14, '8c52d1bf953a30a65415156313228b2c.jpg', 'interior'),
(42, 20, '97dbcf702ca36d9bb01de044f241151c.jpg', 'side'),
(43, 20, 'b6ef31264ccfe3853429da63fc10a18a.jpg', 'side'),
(44, 20, 'c9e1777696130a68eed53a480409ba23.jpg', 'interior'),
(45, 20, '230b13fd623a460273ae9c5bdbaaabdf.jpg', 'interior'),
(46, 13, 'edb0983ee2ebbbb4ae3a0f72a14b14e5.jpg', 'interior'),
(47, 13, '7c101688e4de3a188c5b78ffe16ba26c.jpg', 'interior'),
(48, 13, '01d4e1ee7d040eb588d166b70dd8afed.jpg', 'interior'),
(49, 21, 'fba9cdfad7e173c06463aac13da14b30.jpg', 'side'),
(50, 21, 'a4470926590681d46c53606e2143ebaf.jpg', 'interior'),
(51, 21, 'e2263e6585a96dfe91560a4bf9bb4fb0.jpg', 'interior'),
(52, 22, '61611ca370019171cc0fbc12c6eced50.jpg', 'interior'),
(53, 22, '824548637026131d214fbde6e8852003.jpg', 'interior'),
(54, 22, 'fff77d0c9ff9d6972185a2b95bf38cb5.jpg', 'other color'),
(55, 23, '2252d4d0c00e746b00a855f30b07f3ee.jpg', 'interior'),
(56, 23, '15f9beb79980cb35cc0f9b7daacab7e3.jpg', 'interior'),
(57, 23, 'ccec1d238d3b55df5dd691b5e7cf4c87.jpg', 'wheel'),
(58, 24, 'f4c74e9bc2c0befb36a42cbd6f30833b.jpg', 'interior'),
(59, 24, '339d67ebd9b368c2ed147fe7b1d6bbc8.jpg', 'interior'),
(60, 24, 'c65d663915ace6f44f9cb4426edd4c01.jpg', 'interior'),
(61, 8, '962deea105f33961f1e579d5a4c69421.jpg', 'back'),
(62, 8, '3b5f697a99f0322d57e184231a46709c.jpg', 'interior'),
(63, 8, '169734727c319455b1b90bcd5624097f.jpg', 'interior'),
(64, 25, '4397b079f6185fdff3cf8a6a8807e5ae.jpg', 'side'),
(65, 25, 'ec888c5bf7df235dfcd798c338bb9678.jpg', 'interior'),
(66, 25, 'dece1a74f6f67e570727931f58fefcdc.jpg', 'interior'),
(67, 26, '8a7b0adec407df7670e0cb81568e08d2.jpg', 'side'),
(68, 26, 'c36fabfa0f39d0c0a95a955249df4062.jpg', 'back'),
(69, 26, '8b41d2bf731400466ca4ca25e7b085a9.jpg', 'interior'),
(70, 27, 'b76112aff00b01e277f495e37826d876.jpg', 'interior'),
(71, 27, 'ea8327e71a3842358240a3cca02d5916.jpg', 'interior'),
(72, 27, '6dd0c149fd6cce82ae06f157ab93e994.jpg', 'side'),
(73, 27, '847bf4f99024e99bf2a2fbc32eb16a69.jpg', 'back');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_location`
--

CREATE TABLE `vehicle_location` (
  `location_id` int(11) NOT NULL,
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
  `make_id` int(11) NOT NULL,
  `make` varchar(100) NOT NULL,
  `brand_logo` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_make`
--

INSERT INTO `vehicle_make` (`make_id`, `make`, `brand_logo`) VALUES
(1, 'Toyota', ''),
(3, 'Mercedes Benz', ''),
(5, 'VW', ''),
(6, 'Hyundai', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_model`
--

CREATE TABLE `vehicle_model` (
  `model_id` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_model`
--

INSERT INTO `vehicle_model` (`model_id`, `make_id`, `model`) VALUES
(1, 1, 'Corolla'),
(3, 1, 'Highlander'),
(4, 3, 'E-Class'),
(5, 3, 'G'),
(6, 5, 'Polo'),
(7, 6, 'Palisade'),
(8, 3, 'GLA'),
(9, 6, 'i20N'),
(10, 6, 'Kona EV'),
(11, 6, 'Staria'),
(12, 5, 'Crafter'),
(13, 5, 'Tiguan'),
(14, 5, 'ID.Buzz.'),
(16, 3, 'A180'),
(17, 1, 'Hiace'),
(18, 1, 'Yaris');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_safety`
--

CREATE TABLE `vehicle_safety` (
  `safety_id` int(11) NOT NULL,
  `safety` int(11) NOT NULL
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
  `seats_id` int(11) NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_seats`
--

INSERT INTO `vehicle_seats` (`seats_id`, `seats`) VALUES
(1, 2),
(2, 5),
(3, 7),
(4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_transmission`
--

CREATE TABLE `vehicle_transmission` (
  `transmission_id` int(11) NOT NULL,
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
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`favourite_id`);

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
  MODIFY `favourite_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `vehicle_bodytype`
--
ALTER TABLE `vehicle_bodytype`
  MODIFY `bodytype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle_color`
--
ALTER TABLE `vehicle_color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle_fueltype`
--
ALTER TABLE `vehicle_fueltype`
  MODIFY `fueltype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_gallery`
--
ALTER TABLE `vehicle_gallery`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `vehicle_location`
--
ALTER TABLE `vehicle_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_make`
--
ALTER TABLE `vehicle_make`
  MODIFY `make_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vehicle_safety`
--
ALTER TABLE `vehicle_safety`
  MODIFY `safety_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle_seats`
--
ALTER TABLE `vehicle_seats`
  MODIFY `seats_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_transmission`
--
ALTER TABLE `vehicle_transmission`
  MODIFY `transmission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
