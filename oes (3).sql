-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2018 at 12:20 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oes`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`) VALUES
(1, 'SWS'),
(2, 'CCS'),
(3, 'CASP'),
(4, 'Admin'),
(5, 'Aichi'),
(6, 'Library'),
(11, 'SHS'),
(12, 'Multimedia'),
(21, 'Atheneaum'),
(22, 'Maintainance'),
(23, 'ISD'),
(27, 'STAR');

-- --------------------------------------------------------

--
-- Table structure for table `nas`
--

CREATE TABLE `nas` (
  `NasID` int(11) NOT NULL,
  `IDNumber` varchar(50) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Middlename` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `Birthdate` date NOT NULL,
  `ContactNumber` varchar(50) NOT NULL,
  `DepartmentID` int(11) NOT NULL,
  `IsDeleted` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nas`
--

INSERT INTO `nas` (`NasID`, `IDNumber`, `Firstname`, `Middlename`, `Lastname`, `Email`, `Address`, `Birthdate`, `ContactNumber`, `DepartmentID`, `IsDeleted`) VALUES
(9, '15-2000810', 'Raymundo', 'Remiticado', 'Alfeche', 'alfeche492@gmail.com', '-', '2018-07-01', '0909090909', 4, 0),
(10, '15-2000811', 'Rolando', '-', 'Quillan', 'junjun@gmail.com', 'Cebu City', '2018-07-03', '0909090909', 5, 0),
(14, '12332321', 'Rica', 'Vargas', 'Reyes', 'rica@gmail.com', 'Cebu City', '2018-07-05', '0909090909', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nasprofilepicture`
--

CREATE TABLE `nasprofilepicture` (
  `nasprofilepicture` int(11) NOT NULL,
  `Filename` text NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NasID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasprofilepicture`
--

INSERT INTO `nasprofilepicture` (`nasprofilepicture`, `Filename`, `CreatedAt`, `NasID`) VALUES
(1, '2d_animation1.jpg', '2018-07-20 00:10:48', 9),
(2, 'IoT-banner1.jpg', '2018-07-20 00:18:12', 10),
(3, 'DSC_7651.JPG', '2018-07-20 07:25:19', 13),
(4, 'IMG_9118.JPG', '2018-07-20 10:01:31', 14);

-- --------------------------------------------------------

--
-- Table structure for table `nasschedule`
--

CREATE TABLE `nasschedule` (
  `NasScheduleID` int(11) NOT NULL,
  `Day` varchar(50) NOT NULL,
  `TimeStart` time NOT NULL,
  `TimeEnd` time NOT NULL,
  `NasID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `PositionID` int(11) NOT NULL,
  `PositionName` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Unverified',
  `DepartmentID` int(11) NOT NULL,
  `UserTypeID` int(11) NOT NULL,
  `IsFirstLogin` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`UserID`, `Email`, `Password`, `Status`, `DepartmentID`, `UserTypeID`, `IsFirstLogin`) VALUES
(92, 'alfeche492@gmail.com', '09058456538', 'Verified', 1, 1, 0),
(94, 'alfeche12355@gmail.com', '123123123', 'Verified', 3, 1, 0),
(100, 'qwerr12355@gmail.com', '09752186818', 'Verified', 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `UserInfoID` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Middlename` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Birthdate` date NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `ContactNumber` varchar(30) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`UserInfoID`, `Firstname`, `Middlename`, `Lastname`, `Address`, `Birthdate`, `Gender`, `ContactNumber`, `UserID`) VALUES
(20, 'Jonas', 'Red', 'Blue', '-', '2018-07-03', 'Male', '32423423', 94),
(22, 'Raymundo', 'Remiticado', 'Alfeche', 'Naga City', '2018-07-02', 'Male', '32423423423', 92),
(24, 'Jonas', 'Red', 'Blue', '-', '2018-07-04', 'Male', '3242423423423', 98),
(25, 'Liza', 'Soberano', 'Alfeche', '-', '2018-07-03', 'Female', '342342342', 96),
(26, 'Nancy', 'McDonie', 'Momoland', 'Seoul South Korea', '2018-07-03', 'Female', '0993204932045', 100);

-- --------------------------------------------------------

--
-- Table structure for table `userprofilepicture`
--

CREATE TABLE `userprofilepicture` (
  `UserProfilePictureID` int(11) NOT NULL,
  `Filename` text NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofilepicture`
--

INSERT INTO `userprofilepicture` (`UserProfilePictureID`, `Filename`, `Created_at`, `UserID`) VALUES
(6, 'photomania-c768faf55ae58b7c17c94e65d623b6871.jpg', '2018-07-18 10:35:24', 92),
(8, 'Screenshot_(10).png', '2018-07-18 10:39:30', 98),
(9, '10987427_365869080252729_7744721212327603849_o.jpg', '2018-07-18 10:46:26', 96),
(10, 'DSC_6329.JPG', '2018-07-18 10:50:24', 94),
(11, '1522725235nancy.jpg', '2018-07-20 01:15:58', 100);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `UserTypeID` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UserTypeID`, `Type`) VALUES
(1, 'Admin'),
(2, 'Evaluator');

-- --------------------------------------------------------

--
-- Table structure for table `userverificationcode`
--

CREATE TABLE `userverificationcode` (
  `UserVerificationCodeID` int(11) NOT NULL,
  `Code` varchar(150) NOT NULL,
  `DateGenerated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(50) NOT NULL DEFAULT 'Active',
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userverificationcode`
--

INSERT INTO `userverificationcode` (`UserVerificationCodeID`, `Code`, `DateGenerated`, `Status`, `UserID`) VALUES
(1, '5b4bca7289897', '2018-07-15 22:28:02', 'Active', 80),
(2, '5b4bcb2212253', '2018-07-15 22:30:58', 'Active', 2),
(4, '5b4bcbdde0be2', '2018-07-15 22:34:05', 'Active', 80),
(9, '5b4bd1b2a6c13', '2018-07-15 22:58:58', 'Expired', 85),
(10, '5b4bd3273d804', '2018-07-15 23:05:11', 'Expired', 85),
(11, '5b4bd358d96f2', '2018-07-15 23:06:00', 'Expired', 85),
(12, '5b4bd37222ff4', '2018-07-15 23:06:26', 'Expired', 85),
(13, '5b4bd38812d69', '2018-07-15 23:06:48', 'Expired', 85),
(14, '5b4bd3a89f08c', '2018-07-15 23:07:20', 'Expired', 85),
(15, '5b4bd3df40bbd', '2018-07-15 23:08:15', 'Expired', 85),
(16, '5b4bd420601f7', '2018-07-15 23:09:20', 'Expired', 85),
(17, '5b4bd49872384', '2018-07-15 23:11:20', 'Expired', 85),
(18, '5b4bd53cedf78', '2018-07-15 23:14:04', 'Expired', 85),
(19, '5b4bd58c689f2', '2018-07-15 23:15:24', 'Expired', 85),
(20, '5b4bd6176c80a', '2018-07-15 23:17:43', 'Expired', 85),
(21, '5b4bd67c1b64d', '2018-07-15 23:19:24', 'Expired', 85),
(22, '5b4c65d6dff97', '2018-07-16 09:31:02', 'Expired', 85),
(23, '5b4c665278f18', '2018-07-16 09:33:06', 'Active', 85),
(24, '5b4c69423cfda', '2018-07-16 09:45:38', 'Active', 86),
(25, '5b4c6a174ee75', '2018-07-16 09:49:11', 'Active', 87),
(26, '5b4c6b388c3a4', '2018-07-16 09:54:00', 'Active', 88),
(27, '5b4c6bc98efda', '2018-07-16 09:56:25', 'Expired', 89),
(28, '5b4c823a5e105', '2018-07-16 11:32:10', 'Active', 89),
(29, '5b4c834765211', '2018-07-16 11:36:39', 'Active', 90),
(30, '5b4c853fc203f', '2018-07-16 11:45:03', 'Expired', 91),
(31, '5b4c85660da84', '2018-07-16 11:45:42', 'Active', 91),
(32, '5b4c8659d1073', '2018-07-16 11:49:45', 'Active', 92),
(33, '5b4c964b2935f', '2018-07-16 12:57:47', 'Expired', 94),
(34, '5b4c968ad1113', '2018-07-16 12:58:50', 'Expired', 94),
(35, '5b4c9706bba60', '2018-07-16 13:00:54', 'Expired', 94),
(36, '5b4c971dcc58a', '2018-07-16 13:01:17', 'Active', 94),
(37, '5b4e40dfc69eb', '2018-07-17 19:17:51', 'Active', 96),
(38, '5b51365a48436', '2018-07-20 01:09:46', 'Active', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `nas`
--
ALTER TABLE `nas`
  ADD PRIMARY KEY (`NasID`);

--
-- Indexes for table `nasprofilepicture`
--
ALTER TABLE `nasprofilepicture`
  ADD PRIMARY KEY (`nasprofilepicture`);

--
-- Indexes for table `nasschedule`
--
ALTER TABLE `nasschedule`
  ADD PRIMARY KEY (`NasScheduleID`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`UserInfoID`);

--
-- Indexes for table `userprofilepicture`
--
ALTER TABLE `userprofilepicture`
  ADD PRIMARY KEY (`UserProfilePictureID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`UserTypeID`);

--
-- Indexes for table `userverificationcode`
--
ALTER TABLE `userverificationcode`
  ADD PRIMARY KEY (`UserVerificationCodeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `nas`
--
ALTER TABLE `nas`
  MODIFY `NasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nasprofilepicture`
--
ALTER TABLE `nasprofilepicture`
  MODIFY `nasprofilepicture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nasschedule`
--
ALTER TABLE `nasschedule`
  MODIFY `NasScheduleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `UserInfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `userprofilepicture`
--
ALTER TABLE `userprofilepicture`
  MODIFY `UserProfilePictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userverificationcode`
--
ALTER TABLE `userverificationcode`
  MODIFY `UserVerificationCodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;