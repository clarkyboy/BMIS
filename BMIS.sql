-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 05:28 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgyaturdoorstep`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `barangay_id` int(11) NOT NULL,
  `barangay_name` varchar(50) NOT NULL,
  `barangay_captain` int(11) DEFAULT NULL,
  `bms_city` varchar(50) NOT NULL DEFAULT 'Cebu City',
  `bms_province` varchar(50) NOT NULL DEFAULT 'Cebu',
  `bms_legislative_dist` enum('Cebu City 1st District','Cebu City 2nd District','Cebu 1st District','Cebu 2nd District','Cebu 3rd District','Cebu 4th District','Cebu 5th District','Cebu 6th District','Cebu 7th District') NOT NULL,
  `barangay_status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A- Active; D-Dissolved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`barangay_id`, `barangay_name`, `barangay_captain`, `bms_city`, `bms_province`, `bms_legislative_dist`, `barangay_status`) VALUES
(1, 'Adlaon', NULL, 'Cebu City', 'Cebu', 'Cebu City 1st District', 'A'),
(2, 'Apas', NULL, 'Cebu City', 'Cebu', 'Cebu City 1st District', 'A'),
(3, 'Banilad', NULL, 'Cebu City', 'Cebu', 'Cebu City 1st District', 'A'),
(4, 'Busay', NULL, 'Cebu City', 'Cebu', 'Cebu City 1st District', 'A'),
(5, 'Capitol Site', NULL, 'Cebu City', 'Cebu', 'Cebu City 1st District', 'A'),
(6, 'Basak San Nicolas', NULL, 'Cebu City', 'Cebu', 'Cebu City 2nd District', 'A'),
(7, 'Duljo Fatima', NULL, 'Cebu City', 'Cebu', 'Cebu City 2nd District', 'A'),
(8, 'Guadalupe', NULL, 'Cebu City', 'Cebu', 'Cebu City 2nd District', 'A'),
(9, 'Punta Princesa', NULL, 'Cebu City', 'Cebu', 'Cebu City 2nd District', 'A'),
(10, 'Tisa', NULL, 'Cebu City', 'Cebu', 'Cebu City 2nd District', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_positions`
--

CREATE TABLE `barangay_positions` (
  `bp_id` int(11) NOT NULL,
  `bp_code` char(5) NOT NULL,
  `bp_name` varchar(50) NOT NULL,
  `bp_date_added` date NOT NULL,
  `bp_status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A- Active; I-Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangay_positions`
--

INSERT INTO `barangay_positions` (`bp_id`, `bp_code`, `bp_name`, `bp_date_added`, `bp_status`) VALUES
(1, 'SA', 'Super Admin', '2019-04-09', 'A'),
(2, 'BC', 'Barangay Captain', '2019-04-09', 'A'),
(3, 'BK', 'Barangay Kagawad', '2019-04-09', 'A'),
(4, 'SKC', 'SK Chairperson', '2019-04-09', 'A'),
(5, 'SKK', 'SK Kagawad', '2019-04-09', 'A'),
(6, 'GADF', 'GAD Focal', '2019-04-09', 'A'),
(7, 'GADS', 'GAD Staff', '2019-04-09', 'A'),
(8, 'BSec', 'Barangay Secretary', '2019-04-09', 'A'),
(9, 'SKSec', 'SK Secretary', '2019-04-09', 'A'),
(10, 'BTr', 'Barangay Treasurer', '2019-04-09', 'A'),
(11, 'INTR', 'Interviewer', '2019-04-09', 'A'),
(12, 'SKTr', 'SK Treasurer', '2019-04-10', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `bmis_users`
--

CREATE TABLE `bmis_users` (
  `bmis_id` int(11) NOT NULL,
  `sitio_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `barangay_position` int(11) NOT NULL,
  `bmis_date_added` date NOT NULL,
  `bmis_login_name` varchar(50) NOT NULL,
  `bmis_login_pass` varchar(100) NOT NULL,
  `bmis_status` enum('Active','Resigned','Suspended','Fired') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bmis_users`
--

INSERT INTO `bmis_users` (`bmis_id`, `sitio_id`, `person_id`, `barangay_position`, `bmis_date_added`, `bmis_login_name`, `bmis_login_pass`, `bmis_status`) VALUES
(1, 2, 1, 1, '2019-04-09', 'smileeypin', 'e349558f18daf0136f4d4fb1cc09b806', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `drrm_hazard_map`
--

CREATE TABLE `drrm_hazard_map` (
  `drhm_id` int(11) NOT NULL,
  `drrm_hazard_name` enum('Fire','Earthquake','Flood','Landslide','Urban Pollution') NOT NULL,
  `drrm_hazard_sitio` int(11) NOT NULL,
  `drrm_hazard_date_added` date NOT NULL,
  `drrm_hazard_status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `family_id` int(11) NOT NULL,
  `family_hoh` int(11) NOT NULL,
  `sitio_id` int(11) NOT NULL,
  `family_date_added` date NOT NULL,
  `family_members` int(11) NOT NULL,
  `family_type` enum('Nuclear','Extended','Joint Family') NOT NULL,
  `family_env` enum('Intact','Broken') NOT NULL,
  `family_status` char(1) NOT NULL COMMENT 'A-Active; D-Defunct'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `family_members`
--

CREATE TABLE `family_members` (
  `fm_id` int(11) NOT NULL,
  `family_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `family_member_type` enum('Father','Mother','Child','Grandfather','Grandmother','Aunt','Uncle','Father-in-law','Mother-in-law','Son-in-law','Daughter-in-law','Niece','Nephew') NOT NULL,
  `family_member_status` char(1) NOT NULL DEFAULT 'P' COMMENT 'P-Profiled; U-Unprofiled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` int(11) NOT NULL,
  `person_fname` varchar(50) NOT NULL,
  `person_lname` varchar(50) NOT NULL,
  `person_dob` date NOT NULL,
  `person_address` text NOT NULL,
  `person_telno` text,
  `person_provaddr` text,
  `person_gender` enum('Male','Female','LGBT','Others') NOT NULL,
  `person_email` varchar(50) DEFAULT NULL,
  `person_bloodtype` enum('A+','A-','AB+','AB-','B+','B-','O+','O-') DEFAULT NULL,
  `person_sss` varchar(11) DEFAULT NULL,
  `person_tin` varchar(15) DEFAULT NULL,
  `person_philhealth` varchar(20) DEFAULT NULL,
  `person_pagibig` varchar(20) DEFAULT NULL,
  `person_sector_group` int(11) NOT NULL,
  `person_stats` char(1) NOT NULL COMMENT 'A - Alive; D-Deceased'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `person_fname`, `person_lname`, `person_dob`, `person_address`, `person_telno`, `person_provaddr`, `person_gender`, `person_email`, `person_bloodtype`, `person_sss`, `person_tin`, `person_philhealth`, `person_pagibig`, `person_sector_group`, `person_stats`) VALUES
(1, 'Christian', 'Barral', '1994-07-02', 'Sitio Tahna Tisa, Cebu City', '261-8000', 'N/A', 'Male', 'christianbarral0794@gmail.com', 'A+', NULL, NULL, NULL, NULL, 3, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `person_sector_group`
--

CREATE TABLE `person_sector_group` (
  `psg_id` int(11) NOT NULL,
  `psg_code` varchar(5) NOT NULL,
  `psg_desc` varchar(50) NOT NULL,
  `psg_date_added` date NOT NULL,
  `psg_stat` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person_sector_group`
--

INSERT INTO `person_sector_group` (`psg_id`, `psg_code`, `psg_desc`, `psg_date_added`, `psg_stat`) VALUES
(1, 'CCM', 'Common Citizen Male 30-60 yrs old', '2019-04-09', 'A'),
(2, 'CCF', 'Common Citizen Female 30-60 yrs old', '2019-04-09', 'A'),
(3, 'Y', 'Youth Ages 15-30 years old', '2019-04-09', 'A'),
(4, 'B', 'Baby - Ages 0 - 4 years old', '2019-04-09', 'A'),
(5, 'C', 'Child - Ages 4 - 14 years old', '2019-04-09', 'A'),
(6, 'LGBT', 'Lesbians Gay Bisexual Transgender', '2019-04-09', 'A'),
(7, 'PWD', 'Person With Disabilities', '2019-04-09', 'A'),
(8, 'SC', 'Senior Citizens', '2019-04-09', 'A'),
(9, 'FN', 'Foreign Nationality', '2019-04-09', 'A'),
(10, '4P', '4Ps Beneficiaries', '2019-04-09', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `points_id` int(11) NOT NULL,
  `bmis_id` int(11) NOT NULL,
  `points_points` int(11) NOT NULL,
  `points_cash_equivalent` decimal(10,2) NOT NULL,
  `points_status` enum('Redeemed','Pending','Approved','Denied') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sitio`
--

CREATE TABLE `sitio` (
  `sitio_id` int(11) NOT NULL,
  `barangay_id` int(11) NOT NULL,
  `sitio_name` varchar(50) NOT NULL,
  `sitio_env` enum('Poblacion','Mountainous','Extreme Mountainous','Riverside','Subdivision') NOT NULL,
  `sitio_status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitio`
--

INSERT INTO `sitio` (`sitio_id`, `barangay_id`, `sitio_name`, `sitio_env`, `sitio_status`) VALUES
(1, 10, 'Huya', 'Extreme Mountainous', 'A'),
(2, 10, 'TAHNA', 'Riverside', 'A'),
(3, 10, 'Kadasig Phase III', 'Mountainous', 'A'),
(4, 10, 'Tisa Proper', 'Poblacion', 'A'),
(5, 10, 'San Jose Village', 'Subdivision', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`barangay_id`),
  ADD UNIQUE KEY `barangay_captain` (`barangay_captain`);

--
-- Indexes for table `barangay_positions`
--
ALTER TABLE `barangay_positions`
  ADD PRIMARY KEY (`bp_id`);

--
-- Indexes for table `bmis_users`
--
ALTER TABLE `bmis_users`
  ADD PRIMARY KEY (`bmis_id`),
  ADD KEY `sitio_id` (`sitio_id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `barangay_position` (`barangay_position`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`family_id`);

--
-- Indexes for table `family_members`
--
ALTER TABLE `family_members`
  ADD PRIMARY KEY (`fm_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`),
  ADD KEY `person_sector_group` (`person_sector_group`);

--
-- Indexes for table `person_sector_group`
--
ALTER TABLE `person_sector_group`
  ADD PRIMARY KEY (`psg_id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD KEY `bmis_id` (`bmis_id`);

--
-- Indexes for table `sitio`
--
ALTER TABLE `sitio`
  ADD PRIMARY KEY (`sitio_id`),
  ADD KEY `barangay_id` (`barangay_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `barangay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `barangay_positions`
--
ALTER TABLE `barangay_positions`
  MODIFY `bp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bmis_users`
--
ALTER TABLE `bmis_users`
  MODIFY `bmis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `family_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_members`
--
ALTER TABLE `family_members`
  MODIFY `fm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `person_sector_group`
--
ALTER TABLE `person_sector_group`
  MODIFY `psg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sitio`
--
ALTER TABLE `sitio`
  MODIFY `sitio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangay`
--
ALTER TABLE `barangay`
  ADD CONSTRAINT `barangay_ibfk_1` FOREIGN KEY (`barangay_captain`) REFERENCES `person` (`person_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bmis_users`
--
ALTER TABLE `bmis_users`
  ADD CONSTRAINT `bmis_users_ibfk_1` FOREIGN KEY (`sitio_id`) REFERENCES `sitio` (`sitio_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `bmis_users_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `bmis_users_ibfk_3` FOREIGN KEY (`barangay_position`) REFERENCES `barangay_positions` (`bp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`person_sector_group`) REFERENCES `person_sector_group` (`psg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`bmis_id`) REFERENCES `bmis_users` (`bmis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sitio`
--
ALTER TABLE `sitio`
  ADD CONSTRAINT `sitio_ibfk_1` FOREIGN KEY (`barangay_id`) REFERENCES `barangay` (`barangay_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
