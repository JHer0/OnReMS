-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 06:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onrems`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `churchAccID` int(11) NOT NULL,
  `churchID_FK` int(11) DEFAULT NULL,
  `pastorID_FK` int(11) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `classification` varchar(10) NOT NULL DEFAULT 'church',
  `status` varchar(30) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`churchAccID`, `churchID_FK`, `pastorID_FK`, `username`, `password`, `classification`, `status`) VALUES
(32, NULL, NULL, 'admin@alicf.com', '$2y$10$CeLeJNqljImRbLO2lusVvuYTx7nhijHjVZeyYG6PQk7fogTUwGHeK', 'general', ''),
(34, NULL, NULL, 'chairsec@alicf.com', '$2y$10$vi.Gxuzd0NRgg/Ehllw4OOy4e8VTenczBLJW08mcVv1HnljpxrsyO', 'general', ''),
(35, NULL, NULL, 'pic@alicf.com', '$2y$10$W49ecVFN8RhYsGsjnzbkT.aYEe4TioGi/pP0IRZCsPVcS24QWiJrO', 'general', ''),
(46, NULL, NULL, 'treasurer@alicf.com', '$2y$10$ZR1NMQzEpGByVvg1iTya0e4VqfJQ1oid63GatzirS.2k81/t3Wgr.', 'general', 'active'),
(47, 69, 603, 'ccf_rawis@alicf.com', '$2y$10$9aqWBgyLWYuqj6vvz0Jh2eJ9cTwsXyr06cGpwdzYtV6C9/9iuP75G', 'church', 'active'),
(48, 70, 614, '    SC@alicf.com', '$2y$10$CZHdxg7bO/9ZMJI33COZW.02WnWja/SjTO7dDx8/YoMUHBWWWh.ia', 'church', 'Active'),
(49, 71, 617, 'nlc@alicf.com', '$2y$10$CVLiosLl.epWdCY5umGWIOuU1qo76TWJkhfNjraFj6jKMmWYdEXfu', 'church', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `cemeterylist`
--

CREATE TABLE `cemeterylist` (
  `cemeteryID` int(11) NOT NULL,
  `requestFormID` int(11) NOT NULL,
  `deathCert` tinyint(1) DEFAULT NULL,
  `sms_stat` varchar(20) NOT NULL DEFAULT 'no sms sent',
  `status` varchar(20) DEFAULT 'burried'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cemeterylist`
--

INSERT INTO `cemeterylist` (`cemeteryID`, `requestFormID`, `deathCert`, `sms_stat`, `status`) VALUES
(34, 66, NULL, 'due-date sent', 'transferred'),
(35, 68, NULL, 'due-date sent', 'burried');

-- --------------------------------------------------------

--
-- Table structure for table `church`
--

CREATE TABLE `church` (
  `churchID` int(11) NOT NULL,
  `churchName` varchar(50) NOT NULL,
  `churchAddress` varchar(50) NOT NULL,
  `dateOrganized` date NOT NULL,
  `denomination` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `church`
--

INSERT INTO `church` (`churchID`, `churchName`, `churchAddress`, `dateOrganized`, `denomination`, `email`) VALUES
(69, 'Christ Community Fellowship-Rawis of SBC', '#0427, Yakal St., Pag-asa, Rawis, Legazpi City, Al', '2022-06-01', 'Southern Baptist', 'ccf_rawis@gmail.com'),
(70, 'SAMPLE CHURCH', 'SAMPLE ADDRESS', '1999-12-12', 'Southern Baptist', 'sample@gmail.com'),
(71, 'New Life in Christ', 'Tagas, Daraga Albay', '2000-01-01', 'Southern Baptist', 'nlc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contribution`
--

CREATE TABLE `contribution` (
  `contributionID` int(11) NOT NULL,
  `churchID_FK` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberID` int(11) NOT NULL,
  `churchID_FK` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `mname` varchar(30) DEFAULT NULL,
  `dateOfBirth` date NOT NULL,
  `sex` varchar(10) NOT NULL DEFAULT 'male',
  `contactNo` bigint(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `maritalStatus` varchar(10) NOT NULL DEFAULT 'single',
  `position` varchar(10) NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `churchID_FK`, `fname`, `lname`, `mname`, `dateOfBirth`, `sex`, `contactNo`, `email`, `maritalStatus`, `position`) VALUES
(603, 69, '  Venancio', 'Fernandez', '  Apalis', '1965-07-20', 'Male', 9196937790, 'fernandezej00@gmail.com', 'Married', 'Pastor'),
(604, 69, 'Eli James', 'Fernandez', 'Apalis', '2000-01-17', 'male', 9387224642, 'fernandezej00@gmail.com', 'Single', 'member'),
(605, 69, 'Joshua Jason', 'Fernandez', 'Apalis', '2002-12-23', 'male', 9237832783, 'fernandezej00@gmail.com', 'Single', 'member'),
(607, 69, 'Joanna Faith', 'Fernandez', 'Apalis', '2005-02-22', 'female', 9387224642, 'sample@gmail.com', 'Single', 'member'),
(609, 70, ' HEy', 'Lezgo', ' YOU', '1989-11-11', 'Male', 9327634267, 'sample@gmail.com', 'Married', 'Pastor'),
(610, 69, '  Aira', 'Aringo', '  B.', '1999-10-16', 'Female', 9342879342, 'ccf_rawis@gmail.com', 'Single', 'Member'),
(611, 70, '  blu', 'blu', '  Blu.', '2011-11-11', 'Male', 948573040, 'sample@gmail.com', 'Widow', 'Member'),
(612, 69, ' Phebe Sarrah', 'Fernandez', ' Apalis', '2010-10-06', 'Male', 9387224642, 'sample@gmail.com', 'Married', 'Member'),
(613, 70, 'blu', 'Llack', 'Mlack', '2001-01-01', 'male', 9498747547, 'sample@gmail.com', 'Pastor', 'member'),
(614, 70, '  Dubi', 'Bam', '  DapDap', '1998-12-09', 'Male', 9348793473, 'sample@gmail.com', 'Single', 'Pastor'),
(615, 70, '  chupapi', 'Munyanyo', '  ', '1999-12-19', 'Male', 9999919929, 'samplechurch@gmail.com', 'Single', 'Member'),
(616, 70, '      Mo', 'Go', '      GOmo', '9929-02-22', 'Male', 9994857304, 'samplechurch@gmail.com', 'Married', 'Member'),
(617, 71, 'Dom', 'Rodriguez', 'Marco', '1989-06-20', 'male', 9950125906, 'DMR@gmail.com', 'Married', 'pastor'),
(618, 71, 'Jonna', 'Rodriguez', 'Marco', '2000-12-04', 'female', 9387224642, 'jmrodriguez@gmail.com', 'Single', 'Member'),
(619, 71, 'Corazon', 'Rodriguez', 'Marco', '1959-01-10', 'female', 9070056867, 'corazon@gmail.com', 'Single', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `nonmember`
--

CREATE TABLE `nonmember` (
  `nonmemberID` int(11) NOT NULL,
  `nm_fname` varchar(20) NOT NULL,
  `nm_mname` varchar(20) DEFAULT NULL,
  `nm_lname` varchar(20) NOT NULL,
  `nm_DOB` date NOT NULL,
  `nm_DOD` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ossuarylist`
--

CREATE TABLE `ossuarylist` (
  `ossuaryID` int(100) NOT NULL,
  `requestFormID` int(100) NOT NULL,
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ossuarylist`
--

INSERT INTO `ossuarylist` (`ossuaryID`, `requestFormID`, `status`) VALUES
(3, 67, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pastor`
--

CREATE TABLE `pastor` (
  `pastorID` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `contactNo` bigint(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(100) NOT NULL,
  `requestID` int(100) NOT NULL,
  `payment` varchar(15) NOT NULL DEFAULT 'unpaid',
  `receiptNo` varchar(100) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `formClassification` varchar(20) NOT NULL,
  `paymentValue` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `requestID`, `payment`, `receiptNo`, `payment_date`, `formClassification`, `paymentValue`) VALUES
(65, 98, 'paid', 'ReceiptSample1', '2021-11-25 15:00:00', 'burial', 5000),
(66, 99, 'paid', 'pupusi199', '2021-11-23 14:00:00', 'renew', 5000),
(67, 100, 'paid', 'sampleTransfer101', '2022-07-05 03:35:00', 'transfer', 2500),
(68, 101, 'paid', 'SAMPLE10111111', '2017-11-28 10:00:00', 'burial', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `requestform`
--

CREATE TABLE `requestform` (
  `requestID` int(11) NOT NULL,
  `a_fname` varchar(15) NOT NULL,
  `a_mname` varchar(15) DEFAULT NULL,
  `a_lname` varchar(15) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `a_address` varchar(100) NOT NULL,
  `age` tinyint(3) DEFAULT NULL,
  `contact` bigint(100) NOT NULL,
  `d_fname` varchar(15) NOT NULL,
  `d_mname` varchar(15) DEFAULT NULL,
  `d_lname` varchar(15) NOT NULL,
  `d_address` varchar(100) DEFAULT NULL,
  `churchAccID` int(11) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `DOD` date DEFAULT NULL,
  `Internment` datetime DEFAULT NULL,
  `formClassification` text NOT NULL DEFAULT 'burial',
  `burialPlace` varchar(10) DEFAULT NULL,
  `classification` varchar(10) NOT NULL DEFAULT 'Non-member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestform`
--

INSERT INTO `requestform` (`requestID`, `a_fname`, `a_mname`, `a_lname`, `relation`, `a_address`, `age`, `contact`, `d_fname`, `d_mname`, `d_lname`, `d_address`, `churchAccID`, `DOB`, `DOD`, `Internment`, `formClassification`, `burialPlace`, `classification`) VALUES
(98, 'Eli', 'Apalis', 'Fernandez', 'Brother', '#0427, Yakal St., Pag-asa Rawis Legazpi City', 22, 9387224641, 'Joshua Jason', 'Apalis', 'Fernandez', 'Rawis, Legazpi City', 47, '2002-12-23', '2017-11-23', '2017-11-27 16:00:00', 'burial', 'Tomb', 'member'),
(99, 'Stephanny', 'James', 'Fernandez', 'Brother', '#0427, Yakal St., Pag-asa Rawis Legazpi City', 18, 9387224642, 'Joshua Jason', 'Apalis', 'Fernandez', NULL, 47, '2002-12-23', NULL, '2017-11-23 14:00:00', 'renew', NULL, 'Non-member'),
(100, 'Eli', 'Apalis', 'Fernandez', 'Brother', '#0427, Yakal St., Pag-asa Rawis Legazpi City', 22, 9387224642, 'Joshua Jason', 'Apalis', 'Fernandez', NULL, 47, '2002-12-23', NULL, NULL, 'transfer', NULL, 'member'),
(101, 'Jonna', 'Marco', 'Rodriguez', 'Daughter', 'Sto. Domingo Albay', 21, 9559437647, 'Corazon', 'Marco', 'Rodriguez', 'Sto. Domingo Albay', 49, '1959-01-10', '2017-11-23', '2017-11-27 14:00:00', 'burial', 'Tomb', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`churchAccID`),
  ADD KEY `churchAccIDFK` (`churchID_FK`),
  ADD KEY `pastorAccIDFK` (`pastorID_FK`);

--
-- Indexes for table `cemeterylist`
--
ALTER TABLE `cemeterylist`
  ADD PRIMARY KEY (`cemeteryID`),
  ADD UNIQUE KEY `formID` (`requestFormID`);

--
-- Indexes for table `church`
--
ALTER TABLE `church`
  ADD PRIMARY KEY (`churchID`);

--
-- Indexes for table `contribution`
--
ALTER TABLE `contribution`
  ADD PRIMARY KEY (`contributionID`),
  ADD KEY `churchID_FK` (`churchID_FK`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `member_churchFK` (`churchID_FK`);

--
-- Indexes for table `nonmember`
--
ALTER TABLE `nonmember`
  ADD PRIMARY KEY (`nonmemberID`);

--
-- Indexes for table `ossuarylist`
--
ALTER TABLE `ossuarylist`
  ADD PRIMARY KEY (`ossuaryID`),
  ADD KEY `OrequestID` (`requestFormID`);

--
-- Indexes for table `pastor`
--
ALTER TABLE `pastor`
  ADD PRIMARY KEY (`pastorID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `burial_id_fk` (`requestID`);

--
-- Indexes for table `requestform`
--
ALTER TABLE `requestform`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `RchurchID_FK` (`churchAccID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `churchAccID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `cemeterylist`
--
ALTER TABLE `cemeterylist`
  MODIFY `cemeteryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `church`
--
ALTER TABLE `church`
  MODIFY `churchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `contribution`
--
ALTER TABLE `contribution`
  MODIFY `contributionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=620;

--
-- AUTO_INCREMENT for table `nonmember`
--
ALTER TABLE `nonmember`
  MODIFY `nonmemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ossuarylist`
--
ALTER TABLE `ossuarylist`
  MODIFY `ossuaryID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pastor`
--
ALTER TABLE `pastor`
  MODIFY `pastorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `requestform`
--
ALTER TABLE `requestform`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `churchID_FK` FOREIGN KEY (`churchID_FK`) REFERENCES `church` (`churchID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pastorID_FK` FOREIGN KEY (`pastorID_FK`) REFERENCES `member` (`memberID`) ON UPDATE CASCADE;

--
-- Constraints for table `cemeterylist`
--
ALTER TABLE `cemeterylist`
  ADD CONSTRAINT `CRequestID` FOREIGN KEY (`requestFormID`) REFERENCES `payment` (`paymentID`) ON UPDATE CASCADE;

--
-- Constraints for table `contribution`
--
ALTER TABLE `contribution`
  ADD CONSTRAINT `CchurchAccID_FK` FOREIGN KEY (`churchID_FK`) REFERENCES `account` (`churchAccID`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `MchurchID_FK` FOREIGN KEY (`churchID_FK`) REFERENCES `church` (`churchID`) ON UPDATE CASCADE;

--
-- Constraints for table `ossuarylist`
--
ALTER TABLE `ossuarylist`
  ADD CONSTRAINT `OrequestID` FOREIGN KEY (`requestFormID`) REFERENCES `payment` (`paymentID`) ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `PrequestID_FK` FOREIGN KEY (`requestID`) REFERENCES `requestform` (`requestID`) ON UPDATE CASCADE;

--
-- Constraints for table `requestform`
--
ALTER TABLE `requestform`
  ADD CONSTRAINT `RchurchAccID_FK` FOREIGN KEY (`churchAccID`) REFERENCES `account` (`churchAccID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
