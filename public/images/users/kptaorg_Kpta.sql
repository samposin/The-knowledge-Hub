-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2023 at 06:39 AM
-- Server version: 10.3.38-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kptaorg_Kpta`
--

-- --------------------------------------------------------

--
-- Table structure for table `annoucements`
--

CREATE TABLE `annoucements` (
  `id` int(155) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) NOT NULL,
  `active` int(255) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `annoucements`
--

INSERT INTO `annoucements` (`id`, `title`, `images`, `active`, `added_date`) VALUES
(86, 'Dear Candidates Application forms for the different categories of Lecturers (Gomal University) (Advertised in 2018) have been received by KP Testing Agency (KPTA) Head Office for processing. Keep visiting our website for further details.\r\n', 'gomal_university_logo.png', 1, '2023-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `blacklistedcandidates`
--

CREATE TABLE `blacklistedcandidates` (
  `id` int(155) NOT NULL,
  `title` varchar(255) NOT NULL,
  `closing_date` date NOT NULL,
  `added_date` date NOT NULL,
  `updoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidatelist`
--

CREATE TABLE `candidatelist` (
  `id` int(155) NOT NULL,
  `title` varchar(255) NOT NULL,
  `closing_date` date NOT NULL,
  `added_date` date NOT NULL,
  `updoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `candidatelist`
--

INSERT INTO `candidatelist` (`id`, `title`, `closing_date`, `added_date`, `updoc`) VALUES
(171, 'List of Eligible Candidates for the physical test of Forest Guard, Peshawar Forest Division(Charsadda, Nowshera)', '2022-07-16', '2022-07-16', 'FOR_UPLOADING_COMPLETED.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `closing_date` date NOT NULL,
  `added_date` date NOT NULL,
  `updoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id`, `title`, `closing_date`, `added_date`, `updoc`) VALUES
(2, 'Content Weightages/Paper Distribution for the post of Forest Guard & Junior clerk (North Waziristan Forest Division)', '2022-03-26', '2022-03-24', 'N.W_CONTENTS_WEIGHTAGES_.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `heading`
--

CREATE TABLE `heading` (
  `id` int(155) NOT NULL,
  `title` text NOT NULL,
  `active` int(255) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `heading`
--

INSERT INTO `heading` (`id`, `title`, `active`, `added_date`) VALUES
(38, 'GOMAL UNIVERSITY: Application forms for the different categories of Lecturers (Gomal University) (Advertised in 2018) have been received by KP Testing Agency (KPTA) Head Office for processing. Keep visiting our website for further details.\r\n\r\n', 1, '2023-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(155) NOT NULL,
  `images1` varchar(255) DEFAULT NULL,
  `images2` varchar(255) DEFAULT NULL,
  `images3` varchar(255) DEFAULT NULL,
  `images4` varchar(255) DEFAULT NULL,
  `images5` varchar(255) DEFAULT NULL,
  `images6` varchar(255) DEFAULT NULL,
  `images7` varchar(255) DEFAULT NULL,
  `images8` varchar(255) DEFAULT NULL,
  `images9` varchar(255) DEFAULT NULL,
  `images10` varchar(255) DEFAULT NULL,
  `images11` varchar(255) DEFAULT NULL,
  `images12` varchar(255) DEFAULT NULL,
  `images13` varchar(255) DEFAULT NULL,
  `images14` varchar(255) DEFAULT NULL,
  `images15` varchar(255) DEFAULT NULL,
  `images16` varchar(255) DEFAULT NULL,
  `images17` varchar(255) DEFAULT NULL,
  `images18` varchar(255) DEFAULT NULL,
  `images19` varchar(255) DEFAULT NULL,
  `images20` varchar(255) DEFAULT NULL,
  `active` int(155) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `images1`, `images2`, `images3`, `images4`, `images5`, `images6`, `images7`, `images8`, `images9`, `images10`, `images11`, `images12`, `images13`, `images14`, `images15`, `images16`, `images17`, `images18`, `images19`, `images20`, `active`, `added_date`) VALUES
(14, 'logo_agri_university.jpg', 'logo_fata_univ.jpg', 'logo_uad.jpg', 'FEW1.jpg', 'logo_paraplegic.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(155) NOT NULL,
  `title` varchar(255) NOT NULL,
  `test_date` date NOT NULL,
  `updoc` varchar(155) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `title`, `test_date`, `updoc`, `added_date`) VALUES
(119, 'Result for the post of Account Officer (University Of Chitral)', '2022-12-04', 'UOC_ACCOUNT_OFFICER_RESULT_FINAL.pdf', '2022-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(155) NOT NULL,
  `title` text DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `title2` text DEFAULT NULL,
  `images2` varchar(255) DEFAULT NULL,
  `active` int(155) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `images`, `title2`, `images2`, `active`, `added_date`) VALUES
(6, '\r\n', '0001.jpg', '\r\n', '00011.jpg', 1, '2021-10-19'),
(7, '\r\n', '00012.jpg', '\r\n', '00013.jpg', 1, '2021-10-19'),
(8, '\r\n.', '00014.jpg', '\r\n.', '00015.jpg', 1, '2021-10-19'),
(9, '\r\nKP TESTING AGENCY', 'kelly-sikkema-Hl3LUdyKRic-unsplash.jpg', 'KP TESTING AGENCY ADMIN\r\n', 'nathan-anderson-XENuKo9Gn8k-unsplash.jpg', 1, '2022-01-10'),
(10, '\r\n.', 'k11.jpg', '\r\n.', 'k22.jpg', 1, '2022-01-15'),
(11, 'kp testing agency kp testing agency kp testing agency kp testing agencykp testing agencykp testing agencykp testing agency', 'k111.jpg', 'kp testing agency kp testing agency kp testing agency kp testing agencykp testing agencykp testing agencykp testing agency\r\n', 'k221.jpg', 1, '2022-01-15'),
(12, '\r\n.', 'k112.jpg', '\r\n.', 'k222.jpg', 1, '2022-01-15'),
(13, '\r\n', 'website1.jpg', '\r\n', 'website_2.jpg', 1, '2022-01-15'),
(14, '\r\nwebsite', 'website11.jpg', 'website\r\n2', 'website_21.jpg', 1, '2022-01-15'),
(15, '.\r\n', 'website12.jpg', '\r\n.', 'website_22.jpg', 1, '2022-01-15'),
(16, '\r\n.', 'pic2.png', '.\r\n', 'pic3.png', 1, '2022-01-15'),
(17, '\r\n.', 'website13.jpg', '\r\n.', 'website_23.jpg', 1, '2022-01-16'),
(18, '.\r\n', 'website_24.jpg', '\r\n.', 'website14.jpg', 1, '2022-01-16'),
(19, '\r\n.', 'website_25.jpg', '\r\n.', 'website15.jpg', 1, '2022-01-16'),
(20, '\r\n', 'website_slide.jpg', NULL, NULL, 1, '2023-06-05'),
(21, '\r\n', 'website_slide_(2).jpg', NULL, NULL, 1, '2023-06-06'),
(22, '\r\n', 'website_slide_image.jpg', NULL, NULL, 1, '2023-06-06'),
(23, '\r\n', 'website_slide1.jpg', NULL, NULL, 1, '2023-06-06'),
(24, '\r\n', 'website_slide_image1.jpg', '\r\n', 'website_slide2.jpg', 1, '2023-06-06'),
(25, '\r\n', 'website_slide_image2.jpg', '\r\n', 'website_slide3.jpg', 1, '2023-06-06'),
(26, '\r\nslider image 21', 'website_slide_image3.jpg', '\r\nslider image 22', 'website_slide4.jpg', 1, '2023-06-06'),
(27, '\r\n', 'slider_1.jpg', '\r\n', 'slider_2.jpg', 1, '2023-06-08'),
(28, '\r\n', 'banner-etea-intro.jpg', '\r\n', 'slider_21.jpg', 1, '2023-06-08'),
(29, '\r\n', 'banner-etea-intro1.jpg', '\r\n', 'slider_22.jpg', 1, '2023-06-08'),
(30, '\r\n', 'banner-etea-intro2.jpg', NULL, NULL, 1, '2023-06-08'),
(31, '\r\n', 'banner-etea-intro3.jpg', '\r\n', 'banner-etea-intro4.jpg', 1, '2023-06-08'),
(32, '\r\n', 'banner-etea-intro5.jpg', NULL, NULL, 1, '2023-06-08'),
(33, '\r\n', 'slider_11.jpg', '\r\n', 'slider_3.jpg', 1, '2023-06-08'),
(34, '\r\n', 'slider_31.jpg', '\r\n', 'slider_12.jpg', 1, '2023-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `upcomingtest`
--

CREATE TABLE `upcomingtest` (
  `id` int(155) NOT NULL,
  `title` varchar(255) NOT NULL,
  `closing_date` date NOT NULL,
  `updoc` varchar(255) NOT NULL,
  `advertisement` varchar(255) DEFAULT NULL,
  `test_date` varchar(255) NOT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `upcomingtest`
--

INSERT INTO `upcomingtest` (`id`, `title`, `closing_date`, `updoc`, `advertisement`, `test_date`, `venue`, `active`, `added_date`) VALUES
(196, 'Gomal University: Application form for Rechecking.', '2023-06-26', 'Application_Form_rechecking1.pdf', 'Application_Form_rechecking2.pdf', '------', NULL, 1, '2023-06-21 11:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pwd` varchar(40) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_active` tinyint(1) NOT NULL DEFAULT 0,
  `user_type` enum('admin','nro') DEFAULT NULL,
  `full_name` varchar(200) NOT NULL,
  `contact` int(200) NOT NULL,
  `cnic` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pwd`, `user_email`, `user_active`, `user_type`, `full_name`, `contact`, `cnic`, `designation`, `added_date`) VALUES
(1, 'adminKpta', 'admin@Kpta##@@321', '', 1, 'admin', 'Main Admin', 0, '', '', '2018-12-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annoucements`
--
ALTER TABLE `annoucements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blacklistedcandidates`
--
ALTER TABLE `blacklistedcandidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidatelist`
--
ALTER TABLE `candidatelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heading`
--
ALTER TABLE `heading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upcomingtest`
--
ALTER TABLE `upcomingtest`
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
-- AUTO_INCREMENT for table `annoucements`
--
ALTER TABLE `annoucements`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `blacklistedcandidates`
--
ALTER TABLE `blacklistedcandidates`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `candidatelist`
--
ALTER TABLE `candidatelist`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `heading`
--
ALTER TABLE `heading`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `upcomingtest`
--
ALTER TABLE `upcomingtest`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
