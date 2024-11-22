CREATE database bbdms;
USE bbdms;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbdms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
                            `ID` int(10) NOT NULL,
                            `AdminName` varchar(120) DEFAULT NULL,
                            `UserName` varchar(120) DEFAULT NULL,
                            `MobileNumber` bigint(10) DEFAULT NULL,
                            `Email` varchar(200) DEFAULT NULL,
                            `Password` varchar(200) DEFAULT NULL,
                            `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
    (2, 'Kristina', 'kristinabullari', 8979555558, 'bullari@gmail.com', '872f45ae5e886bfae1e81610acf5b0b7', '2024-01-5 14:36:52');

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
    (1, 'Ralfina', 'ralfinatusha', 8979555558, 'tusha@gmail.com', '4bae32369c6d797989f7c6a9e1ab1571', '2024-01-5 14:40:52');

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
    (3, 'Xhesika', 'xhesikagjyla', 8979555558, 'gjyla@gmail.com', '2f26e0cc28cc1f8038c260268b87211b', '2024-01-5 14:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblblooddonars`
--

CREATE TABLE `tblblooddonars` (
                                  `id` int(11) NOT NULL,
                                  `FullName` varchar(100) DEFAULT NULL,
                                  `MobileNumber` char(11) DEFAULT NULL,
                                  `EmailId` varchar(100) DEFAULT NULL,
                                  `Gender` varchar(20) DEFAULT NULL,
                                  `Age` int(11) DEFAULT NULL,
                                  `BloodGroup` varchar(20) DEFAULT NULL,
                                  `Address` varchar(255) DEFAULT NULL,
                                  `Message` mediumtext DEFAULT NULL,
                                  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
                                  `status` int(1) DEFAULT NULL,
                                  `Password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




-- --------------------------------------------------------

--
-- Table structure for table `tblbloodgroup`
--

CREATE TABLE `tblbloodgroup` (
                                 `id` int(11) NOT NULL,
                                 `BloodGroup` varchar(20) DEFAULT NULL,
                                 `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbloodgroup`
--

INSERT INTO `tblbloodgroup` (`id`, `BloodGroup`, `PostingDate`) VALUES
                                                                    (1, 'A-', '2024-01-05 11:00.00'),
                                                                    (2, 'A+', '2024-01-05 11:00.00'),
                                                                    (3, 'B--', '2024-01-05 11:00.00'),
                                                                    (4, 'B+', '2024-01-05 11:00.00'),
                                                                    (5, 'AB-', '2024-01-05 11:00.00'),
                                                                    (6, 'AB+', '2024-01-05 11:00.00'),
                                                                    (7, 'O-', '2024-01-05 11:00.00'),
                                                                    (8, 'O+','2024-01-05 11:00:00' );

--
-- Table structure for table `tblbloodrequirer`
--

CREATE TABLE `tblbloodrequirer` (
                                    `ID` int(10) NOT NULL,
                                    `BloodDonarID` int(10) DEFAULT NULL,
                                    `name` varchar(250) DEFAULT NULL,
                                    `EmailId` varchar(250) DEFAULT NULL,
                                    `ContactNumber` bigint(10) DEFAULT NULL,
                                    `BloodRequirefor` varchar(250) DEFAULT NULL,
                                    `Message` mediumtext DEFAULT NULL,
                                    `ApplyDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbloodrequirer`
--
-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
                                    `id` int(11) NOT NULL,
                                    `Address` tinytext DEFAULT NULL,
                                    `EmailId` varchar(255) DEFAULT NULL,
                                    `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
    (1, 'Tirane, Shqiperi', 'blood_bank@gmail.com', '0690100100');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
                                     `id` int(11) NOT NULL,
                                     `name` varchar(100) DEFAULT NULL,
                                     `EmailId` varchar(120) DEFAULT NULL,
                                     `ContactNumber` char(11) DEFAULT NULL,
                                     `Message` longtext DEFAULT NULL,
                                     `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
                                     `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
    ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblblooddonars`
--
ALTER TABLE `tblblooddonars`
    ADD PRIMARY KEY (`id`),
  ADD KEY `bgroup` (`BloodGroup`);

--
-- Indexes for table `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
    ADD PRIMARY KEY (`id`),
  ADD KEY `BloodGroup` (`BloodGroup`),
  ADD KEY `BloodGroup_2` (`BloodGroup`);

--
-- Indexes for table `tblbloodrequirer`
--
ALTER TABLE `tblbloodrequirer`
    ADD PRIMARY KEY (`ID`),
  ADD KEY `donorid` (`BloodDonarID`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
    ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
    MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblblooddonars`
--
ALTER TABLE `tblblooddonars`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblbloodrequirer`
--
ALTER TABLE `tblbloodrequirer`
    MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
