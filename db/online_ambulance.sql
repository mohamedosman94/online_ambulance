-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 10:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_ambulance`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Email` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Password` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'admin', 'admin', '0926636235', 'admin@gmail.com', '23c1622d0f5af8a8a8cd90dd1898f3cb', '2024-01-10 08:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `tblambulance`
--

CREATE TABLE `tblambulance` (
  `ID` int(11) NOT NULL,
  `AmbulanceType` varchar(250) DEFAULT NULL,
  `AmbRegNum` varchar(250) DEFAULT NULL,
  `DriverName` varchar(250) DEFAULT NULL,
  `DriverContactNumber` text DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblambulance`
--

INSERT INTO `tblambulance` (`ID`, `AmbulanceType`, `AmbRegNum`, `DriverName`, `DriverContactNumber`, `CreationDate`, `Status`, `UpdationDate`) VALUES
(7, '1', 'خ 10 5568', 'محمد عمر كامل', '0912377000', '2024-09-08 20:48:10', 'Reached', '2024-09-10 18:34:36'),
(8, '2', 'خ 10 23345', 'احمد عثمان محمد', '0123222909', '2024-09-08 21:00:05', NULL, '2024-09-08 21:06:16'),
(9, '3', 'خ 5 12002', 'مهند الطيب احمد', '0922278643', '2024-09-08 21:01:22', 'Reached', '2024-09-09 14:35:17'),
(10, '1', 'خ6 12983', 'منذر احمد علي', '0912367686', '2024-09-10 14:51:15', NULL, NULL),
(11, '2', 'خ2 78732', 'عثمان محمد عثمان', '0924043435', '2024-09-10 14:52:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblambulancehiring`
--

CREATE TABLE `tblambulancehiring` (
  `ID` int(11) NOT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `PatientName` varchar(250) DEFAULT NULL,
  `RelativeName` varchar(250) DEFAULT NULL,
  `RelativeConNum` text DEFAULT NULL,
  `HiringDate` varchar(250) DEFAULT NULL,
  `HiringTime` varchar(250) DEFAULT NULL,
  `AmbulanceType` int(5) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `City` mediumtext DEFAULT NULL,
  `State` mediumtext DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `AmbulanceRegNo` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblambulancehiring`
--

INSERT INTO `tblambulancehiring` (`ID`, `BookingNumber`, `PatientName`, `RelativeName`, `RelativeConNum`, `HiringDate`, `HiringTime`, `AmbulanceType`, `Address`, `City`, `State`, `Message`, `BookingDate`, `Remark`, `Status`, `AmbulanceRegNo`, `UpdationDate`) VALUES
(14, 539230245, 'محمد عثمان', 'احمد عثمان', '0926636235', '2024-09-10', '23:00', 1, 'شقر جوار سوبر ماركت الانفال', 'شقر', 'بورسودان', 'الرجاء احضار ممرضة مع الاسعاف ', '2024-09-10 18:20:51', 'تم توصيل المريض للمستشفي ومعه الممرضة', 'Reached', 'خ 10 5568', '2024-09-10 18:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbltrackinghistory`
--

CREATE TABLE `tbltrackinghistory` (
  `ID` int(10) NOT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `AmbulanceRegNum` varchar(250) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltrackinghistory`
--

INSERT INTO `tbltrackinghistory` (`ID`, `BookingNumber`, `AmbulanceRegNum`, `Remark`, `Status`, `UpdationDate`) VALUES
(47, 539230245, 'خ 10 5568', 'تم تخصيص اسعاف استجابة لطلبك', 'Assigned', '2024-09-10 18:26:28'),
(48, 539230245, 'خ 10 5568', 'سيارة الاسعاف في طريقها اليك الان', 'On the way', '2024-09-10 18:28:31'),
(49, 539230245, 'خ 10 5568', 'تم اخذ المريض من العنوان المعطي وجاري نقله للمستشفي', 'Pickup', '2024-09-10 18:30:32'),
(50, 539230245, 'خ 10 5568', 'تم توصيل المريض للمستشفي ومعه الممرضة', 'Reached', '2024-09-10 18:31:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblambulance`
--
ALTER TABLE `tblambulance`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AmbRegNum` (`AmbRegNum`);

--
-- Indexes for table `tblambulancehiring`
--
ALTER TABLE `tblambulancehiring`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ablunaceid` (`AmbulanceRegNo`),
  ADD KEY `BookingNumber` (`BookingNumber`);

--
-- Indexes for table `tbltrackinghistory`
--
ALTER TABLE `tbltrackinghistory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `abid` (`AmbulanceRegNum`),
  ADD KEY `bid` (`BookingNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblambulance`
--
ALTER TABLE `tblambulance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblambulancehiring`
--
ALTER TABLE `tblambulancehiring`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbltrackinghistory`
--
ALTER TABLE `tbltrackinghistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
