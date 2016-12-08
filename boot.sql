-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2016 at 06:29 AM
-- Server version: 10.1.18-MariaDB
-- PHP Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boot`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `clientName` varchar(45) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `clientName`, `country_id`) VALUES
(2, 'Mobi', 1),
(3, 'Geo-Pol-Kenya', 1),
(4, 'Coka Cola', 1),
(5, 'Tigo', 2),
(6, 'Mobisearch', 2),
(7, 'Infiniti', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `name`) VALUES
(1, 'Kenya'),
(2, 'Tanzania'),
(3, 'Rwanda'),
(4, 'Uganda');

-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE `file_upload` (
  `id` int(20) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`id`, `filename`) VALUES
(1, 'Cola1520680331'),
(2, 'Cola1520680618'),
(3, 'Cola1520680729'),
(4, 'Cola1520680780'),
(5, 'Cola11501697917'),
(6, 'Cola87365787803'),
(7, 'Cola91688450287'),
(8, 'Cola37538343575'),
(9, 'Cola35324865813'),
(10, 'Cola2552202810'),
(11, 'Cola78006431414'),
(12, 'Cola83331687423'),
(13, 'Cola52043916286'),
(14, 'Cola72148929863'),
(15, 'Cola54319183203'),
(16, 'Cola84377912246'),
(17, 'Cola13217042387'),
(18, 'Cola74588364549'),
(19, 'Cola37069503312'),
(20, 'Cola62416755409'),
(21, 'Cola53675615928'),
(22, 'Cola22091676249'),
(23, 'Cola89046157245'),
(24, 'Cola78294131859'),
(25, 'Cola91245720955'),
(26, 'Cola19634439704'),
(27, 'Cola92285003048'),
(28, 'Cola91770515731'),
(29, 'Cola58557943861'),
(30, 'Cola1200138825'),
(31, 'Cola7200234943'),
(32, 'Cola88678995101'),
(33, 'Cola70393485111'),
(34, 'Cola25686553633'),
(35, 'Cola35360040330'),
(36, 'Cola49658950605'),
(37, 'Cola86592772790'),
(38, 'Cola75716739102'),
(39, 'Cola92502641446'),
(40, 'Cola65790826921'),
(41, 'Cola46288411320'),
(42, 'Cola91602813313'),
(43, 'Cola21606350597'),
(44, 'Cola22697237460'),
(45, 'Cola69879611955'),
(46, 'Cola50468151458'),
(47, 'Cola5569455727'),
(48, 'Cola79691550'),
(49, 'Cola42293149885'),
(50, 'Cola97959073633'),
(51, 'Cola70391412685'),
(52, 'safaricom 7S57460767590'),
(53, 'Cola74273711024'),
(54, 'Mobiz57677127328'),
(55, 'Nairobi Radio7677741582'),
(56, 'Gigi Motors92204258126'),
(57, 'Gigi Motors40237423312'),
(58, 'Gigi Motors64167258377'),
(59, 'Gigi Motors54787642230'),
(60, 'Gigi Motors5161930342'),
(61, 'Gigi Motors Tz46723650583'),
(62, 'Gigi Motors Tz25727628172'),
(63, 'Gigi Motors Tz87265329017'),
(64, 'Gigi Motors Tz83106313786'),
(65, 'Gigi Motors Tz90491414210'),
(66, 'Gigi Motors Tz52247259720'),
(67, 'Mimi Online30648846319'),
(68, 'Nairobi County88292974001'),
(69, 'Nairobi County81231384911'),
(70, 'Mobiz80259697745'),
(71, 'Nairobi County35890456429'),
(72, 'Nairobi County63087487780'),
(73, 'Nairobi County43870001054');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `language_id` int(11) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`language_id`, `language`) VALUES
(1, 'Kiswahili'),
(2, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1477243106),
('m130524_201442_init', 1477243110),
('m161024_055757_create_country_table', 1477288881),
('m161024_060202_create_language_table', 1477288972);

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `survey_id` int(10) NOT NULL,
  `language_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL,
  `end_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`survey_id`, `language_id`, `client_id`, `country_id`, `title`, `status_id`, `end_at`, `created_at`, `updated_at`, `start_at`) VALUES
(16, 2, 4, 3, 'Cola', 0, '2016-10-25', '2016-10-25 08:15:45', NULL, NULL),
(17, 1, 3, 1, 'safaricom 7S', 0, '2016-10-26', '2016-10-25 09:54:34', NULL, '2016-10-26'),
(18, 2, 3, 2, 'Solunet', 0, '2016-10-12', '2016-10-25 09:57:31', NULL, '2016-10-24'),
(19, 1, 3, 2, 'Gigi Motors', 0, '2016-10-18', '2016-10-25 10:43:44', NULL, '2016-10-19'),
(20, 2, 3, 1, 'Mobiz', 0, '2016-10-04', '2016-10-25 10:46:44', NULL, '2016-10-06'),
(21, 1, 5, 2, 'Gigi Motors Tz', 0, '2016-10-27', '2016-10-25 11:07:37', NULL, '2016-10-25'),
(22, 2, 3, 1, 'Nairobi County', 0, '2016-10-13', '2016-10-25 11:09:12', NULL, '2016-10-12'),
(23, 1, 2, 2, 'Mimi Online', 0, '2016-10-07', '2016-10-25 11:10:13', NULL, '2016-10-18'),
(24, 1, 2, 2, 'Nairobi Radio', 0, '2016-10-12', '2016-10-25 11:11:17', NULL, '2016-10-18'),
(25, 1, 3, 1, 'Manchester', 0, '2016-10-28', '2016-10-25 12:39:59', NULL, '2016-10-26'),
(26, 2, 7, 1, 'Select 2', 0, '2016-10-05', '2016-10-26 05:16:22', NULL, '2016-10-13'),
(27, 2, 5, 2, 'Manager ', 0, '2016-10-17', '2016-10-29 09:06:41', NULL, '2016-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'koskei', 'YBjncLu658P9GT5_iyJYE5t-aDk9ND22', '$2y$13$bI49msO878gypBkyGmYfU.ONYvl8tfUjmaB0lR8NXmEE9RBigCKR6', NULL, 'kyfredy@gmai.com', 10, 1477243125, 1477243125),
(2, 'kiki', 'RvSgo1fHKSzJdX0KUWAGJNbmS4QvlHNw', '$2y$13$9TppI3OLiTU37ajOlBH1PeVusDWePHRS1xSarryFhzYQ4RnvsOrJ.', NULL, 'kiki@gmail.com', 10, 1477373712, 1477373712);

-- --------------------------------------------------------

--
-- Table structure for table `xls`
--

CREATE TABLE `xls` (
  `id` int(10) NOT NULL,
  `xls` text,
  `name` varchar(50) NOT NULL,
  `qns` text NOT NULL,
  `survey_id` int(5) NOT NULL,
  `length` int(5) NOT NULL,
  `type` varchar(100) NOT NULL,
  `rotation` varchar(100) NOT NULL,
  `skip` text NOT NULL,
  `processed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xls`
--

INSERT INTO `xls` (`id`, `xls`, `name`, `qns`, `survey_id`, `length`, `type`, `rotation`, `skip`, `processed`) VALUES
(1, 'NA', 'Opt In Credit', 'You have been selected to take a GeoPoll survey. Reply 1 to answer 16 questions and earn #TOPUP#! No cost to reply. For help reply HELP. Type STOP to Opt-Out', 16, 157, 'Single Choice', 'NA', '1 = Birth Year', 0),
(2, 'NA', 'Opt In Credit', 'You have been selected to take a GeoPoll survey. Reply 1 to answer 16 questions and earn #TOPUP#! No cost to reply. For help reply HELP. Type STOP to Opt-Out', 16, 157, 'Single Choice', 'NA', 'HELP = Help', 0),
(3, 'NA', 'Opt In Credit', 'You have been selected to take a GeoPoll survey. Reply 1 to answer 16 questions and earn #TOPUP#! No cost to reply. For help reply HELP. Type STOP to Opt-Out', 16, 157, 'Single Choice', 'NA', 'STOP = Refusal', 0),
(4, 'NA', 'HELP', 'GeoPoll is a global network of people shaping their community by answering short surveys. Free to respond. Reply STOP to Opt-Out. Visit GeoPoll.com for info ', 16, 157, 'Single Choice', 'NA', '1 = Birth year', 0),
(5, 'NA', 'HELP', 'GeoPoll is a global network of people shaping their community by answering short surveys. Free to respond. Reply STOP to Opt-Out. Visit GeoPoll.com for info ', 16, 157, 'Single Choice', 'NA', 'STOP = Refusal', 0),
(6, 'NA', 'Refusal', 'Thank you for your time, you will be removed from our system. For more information or to register for future surveys please visit GeoPoll.com', 16, 141, 'NA', 'NA', 'End poll blacklisted', 0),
(7, 'NA', 'Ineligible', 'You are ineligible for this survey. Thank you for your time and please look out for future GeoPoll surveys! For more information visit GeoPoll.com', 16, 146, 'NA', 'NA', 'End poll ineligible', 0),
(8, 'NA', 'Join Message', 'By responding 1 you are joining our other users participating in GeoPoll surveys. You can opt out at any point. Would you like to continue 1)Yes 2)No', 16, 149, 'Single Choice', 'NA', '1 = Birth year', 0),
(9, 'NA', 'Join Message', 'By responding 1 you are joining our other users participating in GeoPoll surveys. You can opt out at any point. Would you like to continue 1)Yes 2)No', 16, 149, 'Single Choice', 'NA', '2 = Refusal', 0),
(10, '1', 'Birth Year', 'In what year were you born? (Reply with a four-digit number like 1980)', 16, 70, 'Rating', 'NA', '1900-2000 = Phone Type', 0),
(11, '1', 'Birth Year', 'In what year were you born? (Reply with a four-digit number like 1980)', 16, 70, 'Rating', 'NA', '2001-2016 =Ineligible', 0),
(12, '2', 'Phone type', 'What type of phone are you using now? 1)Android 2)iPhone 3)Windows 4)Other smartphone 5)Phone with basic internet access 6)Basic phone SMS and voice only', 16, 153, 'Single Choice', 'NA', '1-6 = Roofing Material', 0),
(13, '3', 'Roofing Material', 'What is the roofing material of your home or shelter? 1)Thatch or grass 2)Shingles or Plastic sheets 3)Metal/tin/zinc 4)Tiles or asbestos 5)Concrete 6)Other', 16, 156, 'Single Choice', 'Randomize, Fix 6 at end', '1-6 =Source of water', 0),
(14, '4', 'Source of Water', 'Where is your main source of water for household use?(Reply with a number 1)Outside the compound 2)Inside the compound 3)Inside the house ', 16, 138, 'Single Choice', 'Randomize all', '1-3 = Type of shelter', 0),
(15, '5', 'Type of Shelter', 'In what type of shelter do you live?1)Traditional house or hut 2)Temporary structure or shack 3)Single room 4)Formal house or flat or hostel 5)Hotel room', 16, 153, 'Single Choice', 'Randomize all', '1-5 =Television ownership', 0),
(16, '6', 'Television Ownership', 'Do you personally own a Television? Reply with 1 or 2 1)Yes 2)No ', 16, 65, 'Single Choice', 'NA', '1-2 = Electricity grid', 0),
(17, '7', 'Electricity grid', 'Do you have an electric connection to your home from the mains? Reply with 1 or 2 1)Yes 2)No ', 16, 93, 'Single Choice', 'NA', '1-2 = Post Office', 0),
(18, '8', 'Post Office', 'Is there a post office easy walking distance from your home? Reply with 1 or 2 1)Yes 2)No ', 16, 90, 'Single Choice', 'NA', '1-2 = Financial Transaction', 0),
(19, '9', 'Financial Transaction', 'Did you send or receive money through your mobile phone in the last 7 days? Reply with 1 or 2 1)Yes 2)No', 16, 104, 'Single Choice', 'NA', '1-2 = Education', 0),
(20, '10', 'Education', 'What is the highest level of school you have attended? Reply with a number 1)Primary school 2)Secondary school 3)Post-secondary school 4)No School', 16, 146, 'Single Choice', 'NA', '1-4 = Migration Likelihood', 0),
(21, '11', 'Migration Likelihood', 'Think of a close friend. In the next 6 months, will they leave South Africa for another country? 1)Very Likely 2)Likely 3)Unsure 4)Unlikely 5)Very Unlikely', 16, 155, 'Single Choice', 'NA', '1-5= Urban/Rural', 0),
(22, '12', 'Urban/Rural', 'Do you live in a urban or rural area? Repy with 1 or 2 1)Urban area 2)Rural area', 16, 80, 'Single Choice', 'NA', '1-2=Gender', 0),
(23, '13', 'Gender', 'What is your gender? 1)Male 2)Female 3)Other 4)I prefer not to say Reply with a number', 16, 86, 'Single Choice', 'NA', '1-2 = City', 0),
(24, '14', 'City', 'What City do you currently live in? Reply with the name of your City, such as Cape Town', 16, 87, 'Open Ended', 'NA', 'Any Response = Admin1-EN-South Africa', 0),
(25, '15', 'Admin1-EN-South Africa', 'What Province do you currently live in? 1)Eastern Cape 2)Free State 3)Gauteng 4)KwaZulu Natal 5)Limpopo 6)Mpumalanga 7)Northern Cape 8)North West 9)Western Cape', 16, 160, 'Single Choice', 'Randomized', '1-9 = Race', 0),
(26, '16', 'Race', 'What race do you consider yourself? Reply with a number 1)Black 2)White 3)Coloured 4)Indian', 16, 91, 'Single Choice', 'NA', '1-4 = Close Out Credit', 0),
(27, 'NA', 'Close Out Credit', 'Survey complete, you will receive #TOPUP# airtime credit within 2 days. For more info and to register friends/family visit m.GeoPoll.com.', 16, 137, 'NA', 'NA', 'NA', 0),
(28, 'NA', 'Opt-In Incentive', 'You have been selected to take a GeoPoll survey. Reply 1 to answer 3 questions and earn #TOPUP#! No cost to reply. For help reply HELP. Type STOP to Opt-Out', 17, 156, 'Single Choice', 'NA', '1 = Birth Year', 0),
(29, 'NA', 'Opt-In Incentive', 'You have been selected to take a GeoPoll survey. Reply 1 to answer 3 questions and earn #TOPUP#! No cost to reply. For help reply HELP. Type STOP to Opt-Out', 17, 156, 'Single Choice', 'NA', 'Help = HELP', 0),
(30, 'NA', 'Opt-In Incentive', 'You have been selected to take a GeoPoll survey. Reply 1 to answer 3 questions and earn #TOPUP#! No cost to reply. For help reply HELP. Type STOP to Opt-Out', 17, 156, 'Single Choice', 'NA', 'STOP = Refusal', 0),
(31, 'NA', 'HELP', 'GeoPoll is a global network of people shaping their community by answering short surveys. Free to respond. Reply STOP to Opt-Out. Visit GeoPoll.com for info ', 17, 157, 'Single Choice', 'NA', '1 = Had Fever Last Week', 0),
(32, 'NA', 'HELP', 'GeoPoll is a global network of people shaping their community by answering short surveys. Free to respond. Reply STOP to Opt-Out. Visit GeoPoll.com for info ', 17, 157, 'Single Choice', 'NA', 'STOP = Refusal', 0),
(33, 'NA', 'Refusal', 'Thank you for your time, you will be removed from our system. For more information or to register for future surveys please visit GeoPoll.com', 17, 141, 'NA', 'NA', 'NA', 0),
(34, 'NA', 'Ineligible', 'You are ineligible for this survey. Thank you for your time and please look out for future GeoPoll surveys! For more information visit GeoPoll.com', 17, 146, 'NA', 'NA', 'NA', 0),
(35, '2', 'Had Fever Last Week', 'Did you have a fever in the last week? (Reply with a number) 1)Yes 2)No 3)Don\'t know', 17, 84, 'Single Choice', 'NA', '1-3 = Symptoms Experienced', 0),
(36, '3', 'Symptoms Experienced', 'Select ALL numbers that Apply. Did you experience any of these symptoms last week? 1)Cough 2)Chills 3)Muscle pain 4)Runny nose 5)Sore throat 6)Headache', 17, 151, 'Select All that Apply', 'Randomize', '1-6 = Had Flu Last Week', 0),
(37, '4', 'Had Flu Last Week', 'Do you think you had the flu last week? (Reply with a number) 1)Yes 2)No 3)Don\'t know', 17, 85, 'Single Choice', 'NA', '1-3 = Close-Out Incentive', 0),
(38, '5', 'City', 'What City do you currently live in?', 17, 35, 'Open Ended', 'NA', 'Any response = Close-Out Incentive', 0),
(39, 'NA', 'Close-Out Incentive', 'Survey complete, you will receive #TOPUP# airtime credit within 2 days. For more information and to register friends and family visit m.GeoPoll.com', 17, 147, 'NA', 'NA', 'NA', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `fk_clients_country_id_idx` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `file_upload`
--
ALTER TABLE `file_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`survey_id`),
  ADD KEY `fk_surveys_1_idx` (`client_id`),
  ADD KEY `fk_surveys_country_id_idx` (`country_id`),
  ADD KEY `fk_surveys_language_id_idx` (`language_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `xls`
--
ALTER TABLE `xls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `survey_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `xls`
--
ALTER TABLE `xls`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `fk_clients_country_id` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surveys`
--
ALTER TABLE `surveys`
  ADD CONSTRAINT `fk_surveys_client_id` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_surveys_country_id` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_surveys_language_id` FOREIGN KEY (`language_id`) REFERENCES `languages` (`language_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
