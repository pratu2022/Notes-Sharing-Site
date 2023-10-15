-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 11:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noteswap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

CREATE TABLE `tblfaculty` (
  `id` int(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `fac_name` varchar(100) NOT NULL,
  `fac_phone` varchar(100) NOT NULL,
  `fac_email` varchar(100) NOT NULL,
  `fac_address` varchar(100) NOT NULL,
  `fac_username` varchar(100) NOT NULL,
  `fac_password` varchar(100) NOT NULL,
  `fac_gender` varchar(100) NOT NULL,
  `fac_image` varchar(100) NOT NULL,
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`id`, `regno`, `fac_name`, `fac_phone`, `fac_email`, `fac_address`, `fac_username`, `fac_password`, `fac_gender`, `fac_image`, `resettoken`, `resettokenexpire`) VALUES
(14, 'FS821694340862', 'nikisha', '09574831868', 'bendrepratiksha747@gmail.com', 'm-38 jayrajsocitey ichhapore 3 surat', 'nikisha23', '$2y$10$cxcoPuSZ.RS8ZsVfTdq4ouUTL7NezEslVNDCJyxk8ksVRQvHJ.IYa', 'Female', 'dummy.jpg', '01ce31bbb542d9be85fce7a478f06319', '2023-10-10'),
(16, 'FS301694669053', 'Uma ', '3697909777', 'chaudhary.uma10@gmail.com', 'B-25/23 nehru nagar, surat. ', 'uma23', '$2y$10$kL/sjMjVZlqPiDsos.aQxORNrdUHLlLjCi1GfFpbDD/xB1wow5gQC', 'Female', 'images.png', NULL, NULL),
(17, 'FS761696488953', 'bhautika', '09574831868', 'bhautika747@gmail.com', 'm-38 jayrajsocitey ichhapore 3 surat', 'bhautika23', '$2y$10$W00FVRYXSA4wb98nZ7lgeOLzcWndk5tRiR4507qxc.zGBu.96/VEa', 'Female', 'c.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblnotes`
--

CREATE TABLE `tblnotes` (
  `srno` int(100) NOT NULL,
  `UploadedBy` varchar(255) NOT NULL,
  `Uploadedon` date NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblnotes`
--

INSERT INTO `tblnotes` (`srno`, `UploadedBy`, `Uploadedon`, `Subject`, `Notes`, `Type`, `Description`) VALUES
(7, 'Uma ', '2023-10-04', 'Network Technology', 'phpproblemsheet.pdf', 'pdf', 'php nt'),
(8, 'nikisha', '2023-10-04', 'Unix & Shell Programming', 'PHP03.docx', 'docx', 'docx file'),
(9, 'nikisha', '2023-10-05', 'ASP.NET', 'php03.pdf', 'docx', 'Notes For Asp.Net'),
(10, 'nikisha', '2023-10-06', 'VB.NET', 'unixproblemsheet3.docx', 'docx', 'unix'),
(11, 'nikisha', '2023-10-09', 'Unix & Shell Programming', 'PHP Assignment 2 & 3.pdf', 'pdf', 'php ass');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `id` int(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `stud_name` varchar(100) NOT NULL,
  `stud_phone` varchar(100) NOT NULL,
  `stud_email` varchar(100) NOT NULL,
  `stud_address` varchar(100) NOT NULL,
  `stud_username` varchar(100) NOT NULL,
  `stud_password` varchar(100) NOT NULL,
  `stud_gender` varchar(100) NOT NULL,
  `stud_image` varchar(100) NOT NULL,
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`id`, `regno`, `stud_name`, `stud_phone`, `stud_email`, `stud_address`, `stud_username`, `stud_password`, `stud_gender`, `stud_image`, `resettoken`, `resettokenexpire`) VALUES
(26, 'TS701694335364', 'pratiksha bendre', '09574831868', 'bendrepratiksha747@gmail.com', 'm-38 jayrajsocitey ichhapore 3 surat', 'pratu.23', '$2y$10$q8ZGqs6tQLRktCy7gwqXjOTXpXp9FTl/bb7uPSVIyYFFofmhqMzVu', 'Female', 'dummy.jpg', NULL, NULL),
(28, 'TS851694421346', 'nisha yadav', '94244667578', 'anjalikrai.001@gmail.com', 'jayraj society cfh', 'anjali23', '$2y$10$zW4NI8lYwoO4thReN2EZfOqWc6gflJ1DT5KqkSMHFTg5.1OvLry..', 'Female', 'InShot_20211231_165708423.jpg', 'e75b99993ba2bb98176137b22e910630', '2023-09-11'),
(31, 'TS701696488814', 'anjali rai', '9234567756', 'raianjali01@gmail.com', 'm-38 ramnagar padesara', 'anjali23', '$2y$10$7T6S3fUupCz5q8.T//wi9OAUeRrB89blvEXkKXaWSyaDYq217tQ/e', 'Female', 'b.png', NULL, NULL),
(32, 'TS331696583588', 'rohan', '9658451254', 'rohan45@gmail.com', 'A-15 nehru nagar , surat', 'rohan23', '$2y$10$MDS4QgE8X8qC8/lRne7iz.sFcem0TKnljFtwctg2Jrny34IbX.J/a', 'Male', 'c.png', NULL, NULL),
(33, 'TS561696834381', 'Shivam Vish', '9898453245', 'Shivamvish@gmail.com', 'm-38 jayrajsocitey ichhapore ', 'shivam23', '$2y$10$qYolkOYjywq9QGEfrgzgk./7wMHS8sJ6jNhUAi3bO5tj1TzPMbAim', 'Male', 'd.png', NULL, NULL),
(36, 'TS251696855748', 'anjali singh', '09574831868', 'anjali@gmail.com', 'm-38 jayrajsocitey ichhapore 3 surat', 'anjali23', '$2y$10$3RvDwm4HwQb8PvMow0fKFezfcTAOriHVG5lGLUDvPnaYcY7mK9fNm', 'Female', 'ic_add.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `id` int(100) NOT NULL,
  `subjectname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`id`, `subjectname`) VALUES
(3, 'Network Technology'),
(4, 'Unix & Shell Programming'),
(6, 'Advance Web Technology'),
(7, 'Advance Mobile Technology'),
(8, 'PHP WebFramework & Services'),
(10, 'ASP.NET ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`fac_email`);

--
-- Indexes for table `tblnotes`
--
ALTER TABLE `tblnotes`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`regno`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblnotes`
--
ALTER TABLE `tblnotes`
  MODIFY `srno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
