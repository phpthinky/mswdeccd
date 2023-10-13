-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 03:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mswdeccddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aauth_groups`
--

CREATE TABLE `aauth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `aauth_groups`
--

INSERT INTO `aauth_groups` (`id`, `name`, `definition`) VALUES
(1, 'Admin', 'Super Admin Group'),
(2, 'Public', 'Public Access Group'),
(3, 'Default', 'Default Access Group');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_group_to_group`
--

CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `subgroup_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_login_attempts`
--

CREATE TABLE `aauth_login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(39) DEFAULT '0',
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perms`
--

CREATE TABLE `aauth_perms` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_group`
--

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_user`
--

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_pms`
--

CREATE TABLE `aauth_pms` (
  `id` int(11) UNSIGNED NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `receiver_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int(1) DEFAULT NULL,
  `pm_deleted_receiver` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_users`
--

CREATE TABLE `aauth_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text DEFAULT NULL,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text DEFAULT NULL,
  `verification_code` text DEFAULT NULL,
  `totp_secret` varchar(16) DEFAULT NULL,
  `ip_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `aauth_users`
--

INSERT INTO `aauth_users` (`id`, `email`, `pass`, `username`, `banned`, `last_login`, `last_activity`, `date_created`, `forgot_exp`, `remember_time`, `remember_exp`, `verification_code`, `totp_secret`, `ip_address`) VALUES
(1, 'admin@gmail.com', 'ec225039f1cb0c48ad528709e8e0184991e637d96db175f094b6b2037ec1a3c2', 'Admin', 0, '2023-10-07 03:09:18', '2023-10-07 03:09:19', NULL, NULL, NULL, NULL, NULL, NULL, '127.0.0.1'),
(2, 'boss@mail.com', '85331630fca2b67c234b6b57e7affc9403d62cf186989c71675956e3ccc2a20d', '', 0, '2023-10-07 02:47:23', '2023-10-07 02:47:23', '2023-10-06 05:25:07', NULL, NULL, NULL, NULL, NULL, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_to_group`
--

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `aauth_user_to_group`
--

INSERT INTO `aauth_user_to_group` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_variables`
--

CREATE TABLE `aauth_user_variables` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `assessmentId` int(11) NOT NULL,
  `centerId` int(11) NOT NULL,
  `workersId` int(11) NOT NULL,
  `pupilsId` int(11) NOT NULL,
  `assessmentDate` date NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_raw_score`
--

CREATE TABLE `assessment_raw_score` (
  `id` int(11) NOT NULL,
  `scaled_score` varchar(11) NOT NULL,
  `gross_motor` varchar(11) DEFAULT NULL,
  `fine_motor` varchar(11) DEFAULT NULL,
  `self_help` varchar(11) DEFAULT NULL,
  `receiptive_lang` varchar(11) DEFAULT NULL,
  `expressive_lang` varchar(11) DEFAULT NULL,
  `cognitive` varchar(11) DEFAULT NULL,
  `social_emotion` varchar(11) DEFAULT NULL,
  `record_no` varchar(11) NOT NULL,
  `age_limit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `assessment_raw_score`
--

INSERT INTO `assessment_raw_score` (`id`, `scaled_score`, `gross_motor`, `fine_motor`, `self_help`, `receiptive_lang`, `expressive_lang`, `cognitive`, `social_emotion`, `record_no`, `age_limit`) VALUES
(29, '2', '', '', '', '0-16', '', '', NULL, '1', '1'),
(30, '1', '', '', '', '', '', '0-15', '', '1', '2'),
(32, '1', '', '0-9', '', '', '', '', '', '1', '1'),
(33, '3', '', '', '', '', '10-15', '', '', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_schedule`
--

CREATE TABLE `assessment_schedule` (
  `ScheduleId` int(11) NOT NULL,
  `scheduleDate` date NOT NULL,
  `addedBy` int(11) NOT NULL,
  `dateAddedd` date NOT NULL,
  `centerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_sum_scaled_score`
--

CREATE TABLE `assessment_sum_scaled_score` (
  `id` int(11) NOT NULL,
  `scaled_score` varchar(11) NOT NULL,
  `standard_score` varchar(11) NOT NULL,
  `record_no` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ecenter`
--

CREATE TABLE `ecenter` (
  `centerId` int(3) NOT NULL,
  `centerName` varchar(100) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `centerAddress` text NOT NULL,
  `addedBy` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ecenter`
--

INSERT INTO `ecenter` (`centerId`, `centerName`, `barangay`, `centerAddress`, `addedBy`) VALUES
(1, 'Malisbong CDC', 'Arellano', 'Malisbong, Sablayan, Occidental Mindoro', 0);

-- --------------------------------------------------------

--
-- Table structure for table `eparent`
--

CREATE TABLE `eparent` (
  `parentId` int(11) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `mName` varchar(20) NOT NULL,
  `lName` varchar(20) NOT NULL,
  `gender` int(1) NOT NULL,
  `familyPosition` int(1) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `epupils`
--

CREATE TABLE `epupils` (
  `pupilsId` int(11) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `mName` varchar(20) NOT NULL,
  `lName` varchar(20) NOT NULL,
  `ext` varchar(3) NOT NULL,
  `age` int(3) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `gender` int(1) NOT NULL,
  `sector` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `barangay` varchar(25) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `dateAdded` varchar(20) NOT NULL,
  `dateUpdated` varchar(20) NOT NULL,
  `pupilsCode` varchar(10) NOT NULL,
  `app` int(1) NOT NULL DEFAULT 1,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `epupils_feeding`
--

CREATE TABLE `epupils_feeding` (
  `feeding_id` int(11) NOT NULL,
  `feeding_date` varchar(16) NOT NULL,
  `foods` varchar(50) NOT NULL,
  `drinks` varchar(50) NOT NULL,
  `pupils_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eschoolyear`
--

CREATE TABLE `eschoolyear` (
  `YearId` int(11) NOT NULL,
  `YearStart` varchar(16) NOT NULL,
  `YearEnd` varchar(16) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `eschoolyear`
--

INSERT INTO `eschoolyear` (`YearId`, `YearStart`, `YearEnd`, `Status`) VALUES
(1, '2023-06-01', '2024-05-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `eschoolyear_by_worker`
--

CREATE TABLE `eschoolyear_by_worker` (
  `YearId` int(11) NOT NULL,
  `workersId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `eschoolyear_by_worker`
--

INSERT INTO `eschoolyear_by_worker` (`YearId`, `workersId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `eschoolyear_by_worker_students`
--

CREATE TABLE `eschoolyear_by_worker_students` (
  `YearId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `workersId` int(11) NOT NULL,
  `StudentType` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eworkers`
--

CREATE TABLE `eworkers` (
  `workersId` int(4) NOT NULL,
  `userId` int(11) NOT NULL,
  `centerId` int(3) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `mName` varchar(20) NOT NULL,
  `lName` varchar(20) NOT NULL,
  `ext` varchar(3) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `gender` int(1) NOT NULL,
  `sector` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `barangay` varchar(30) NOT NULL,
  `municipality` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `dateHired` date NOT NULL,
  `jobStatus` int(1) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `dateAdded` varchar(20) NOT NULL,
  `app` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `eworkers`
--

INSERT INTO `eworkers` (`workersId`, `userId`, `centerId`, `fName`, `mName`, `lName`, `ext`, `birthDate`, `gender`, `sector`, `address`, `barangay`, `municipality`, `province`, `dateHired`, `jobStatus`, `profile`, `dateAdded`, `app`) VALUES
(1, 2, 1, 'Harold', 'Lang', 'Malakas', '', NULL, 0, '', 'malisbong lang', '', '', '', '0000-00-00', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `e_zscore_hfa`
--

CREATE TABLE `e_zscore_hfa` (
  `id` int(11) NOT NULL,
  `gender` int(1) NOT NULL DEFAULT 1,
  `age` varchar(10) NOT NULL,
  `severly_stunned` varchar(10) NOT NULL,
  `stunned` varchar(10) NOT NULL,
  `normal` varchar(10) NOT NULL,
  `tall` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_zscore_wfa`
--

CREATE TABLE `e_zscore_wfa` (
  `id` int(11) NOT NULL,
  `height` varchar(10) NOT NULL,
  `su_weight` varchar(10) NOT NULL,
  `u_weight` varchar(10) NOT NULL,
  `n_weight` varchar(10) NOT NULL,
  `ov_weight` varchar(10) NOT NULL,
  `ob_weight` varchar(10) NOT NULL,
  `gender` int(1) NOT NULL DEFAULT 1,
  `age` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_zscore_wfh`
--

CREATE TABLE `e_zscore_wfh` (
  `id` int(11) NOT NULL,
  `height` varchar(10) NOT NULL,
  `su_weight` varchar(10) NOT NULL,
  `u_weight` varchar(10) NOT NULL,
  `n_weight` varchar(10) NOT NULL,
  `ov_weight` varchar(10) NOT NULL,
  `ob_weight` varchar(10) NOT NULL,
  `gender` int(1) NOT NULL DEFAULT 1,
  `age` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weighing`
--

CREATE TABLE `weighing` (
  `weighingId` int(11) NOT NULL,
  `scheduleId` int(11) NOT NULL,
  `pupilsId` int(11) NOT NULL,
  `weight` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `wfa` varchar(5) NOT NULL,
  `hfa` varchar(5) NOT NULL,
  `wfh` varchar(5) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weighing_schedule`
--

CREATE TABLE `weighing_schedule` (
  `scheduleId` int(11) NOT NULL,
  `weighingSchedule` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `centerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aauth_groups`
--
ALTER TABLE `aauth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_group_to_group`
--
ALTER TABLE `aauth_group_to_group`
  ADD PRIMARY KEY (`group_id`,`subgroup_id`);

--
-- Indexes for table `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_perms`
--
ALTER TABLE `aauth_perms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_perm_to_group`
--
ALTER TABLE `aauth_perm_to_group`
  ADD PRIMARY KEY (`perm_id`,`group_id`);

--
-- Indexes for table `aauth_perm_to_user`
--
ALTER TABLE `aauth_perm_to_user`
  ADD PRIMARY KEY (`perm_id`,`user_id`);

--
-- Indexes for table `aauth_pms`
--
ALTER TABLE `aauth_pms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `full_index` (`id`,`sender_id`,`receiver_id`,`date_read`);

--
-- Indexes for table `aauth_users`
--
ALTER TABLE `aauth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_user_to_group`
--
ALTER TABLE `aauth_user_to_group`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_index` (`user_id`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`assessmentId`);

--
-- Indexes for table `assessment_raw_score`
--
ALTER TABLE `assessment_raw_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_schedule`
--
ALTER TABLE `assessment_schedule`
  ADD PRIMARY KEY (`ScheduleId`);

--
-- Indexes for table `assessment_sum_scaled_score`
--
ALTER TABLE `assessment_sum_scaled_score`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `scaled_score` (`scaled_score`);

--
-- Indexes for table `ecenter`
--
ALTER TABLE `ecenter`
  ADD PRIMARY KEY (`centerId`);

--
-- Indexes for table `eparent`
--
ALTER TABLE `eparent`
  ADD PRIMARY KEY (`parentId`);

--
-- Indexes for table `epupils`
--
ALTER TABLE `epupils`
  ADD PRIMARY KEY (`pupilsId`);

--
-- Indexes for table `epupils_feeding`
--
ALTER TABLE `epupils_feeding`
  ADD PRIMARY KEY (`feeding_id`);

--
-- Indexes for table `eschoolyear`
--
ALTER TABLE `eschoolyear`
  ADD PRIMARY KEY (`YearId`);

--
-- Indexes for table `eworkers`
--
ALTER TABLE `eworkers`
  ADD PRIMARY KEY (`workersId`);

--
-- Indexes for table `e_zscore_hfa`
--
ALTER TABLE `e_zscore_hfa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_zscore_wfa`
--
ALTER TABLE `e_zscore_wfa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_zscore_wfh`
--
ALTER TABLE `e_zscore_wfh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weighing`
--
ALTER TABLE `weighing`
  ADD PRIMARY KEY (`weighingId`);

--
-- Indexes for table `weighing_schedule`
--
ALTER TABLE `weighing_schedule`
  ADD PRIMARY KEY (`scheduleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aauth_groups`
--
ALTER TABLE `aauth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `aauth_perms`
--
ALTER TABLE `aauth_perms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aauth_pms`
--
ALTER TABLE `aauth_pms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aauth_users`
--
ALTER TABLE `aauth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessment_raw_score`
--
ALTER TABLE `assessment_raw_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `assessment_schedule`
--
ALTER TABLE `assessment_schedule`
  MODIFY `ScheduleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessment_sum_scaled_score`
--
ALTER TABLE `assessment_sum_scaled_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ecenter`
--
ALTER TABLE `ecenter`
  MODIFY `centerId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eparent`
--
ALTER TABLE `eparent`
  MODIFY `parentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `epupils`
--
ALTER TABLE `epupils`
  MODIFY `pupilsId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `epupils_feeding`
--
ALTER TABLE `epupils_feeding`
  MODIFY `feeding_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eschoolyear`
--
ALTER TABLE `eschoolyear`
  MODIFY `YearId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eworkers`
--
ALTER TABLE `eworkers`
  MODIFY `workersId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `e_zscore_hfa`
--
ALTER TABLE `e_zscore_hfa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_zscore_wfa`
--
ALTER TABLE `e_zscore_wfa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_zscore_wfh`
--
ALTER TABLE `e_zscore_wfh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weighing`
--
ALTER TABLE `weighing`
  MODIFY `weighingId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weighing_schedule`
--
ALTER TABLE `weighing_schedule`
  MODIFY `scheduleId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
