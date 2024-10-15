-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2024 at 01:39 AM
-- Server version: 10.6.18-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sec1_28`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `credit` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `credit`) VALUES
('322236', 'WEB APPLICATION PROGRAMMING', 3),
('322431', 'WEB TECHNOLOGY', 3),
('322372', 'SYSTEMS ANALYSIS AND DESIGN', 3),
('322224', 'DIGITAL LOGIC AND COMPUTER INTERFACING', 3),
('322114', 'STRUCTURED PROGRAMMING', 3),
('322473', 'SOFTWARE DEVELOPMENT AND PROJECT MANAGEMENT', 3);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `tid` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`tid`, `ord_id`, `pid`, `quantity`) VALUES
(1, 1, 2, 2),
(2, 1, 3, 5),
(3, 1, 4, 1),
(4, 2, 1, 2),
(5, 2, 3, 4),
(6, 2, 4, 3),
(7, 3, 2, 3),
(8, 3, 4, 5),
(9, 4, 1, 5),
(10, 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `password`, `name`, `address`, `mobile`, `email`, `role`) VALUES
('somsak', '1899', 'สมศักดิ์ ', '174 ถ.มิตรภาพ ', '', 'somsak@gmail.com', 'admin'),
('baramee', 'aafff1', 'บารมี บุญหลาย', '123 ถ.วิภาวดีรังสิต กรุงเทพฯ', '08-9446-9955', 'baramee@gmail.com', 'user'),
('metasit', 'm345', 'เมธาสิทธิ์ สอนสั่ง', '98/9 ถ.ศรีจันทร์ จ.ขอนแก่น', '08-4456-9877', 'metasit@outlook.com', 'user'),
('somporn', '1111', 'สมพร พรดี', '321 ถ.ตลาด นนทบุรี', '09-9993-4512', 'somporn@gmail.com', 'user'),
('asfa', '1245', 'สมชาติ ครับ', 'wdawd', '1123', 'somsuay@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `ord_date` datetime NOT NULL,
  `status` enum('wait','pay','send','cancel') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `username`, `ord_date`, `status`) VALUES
(1, 'baramee', '2013-07-16 23:25:14', 'wait'),
(2, 'metasit', '2013-02-12 23:25:40', 'pay'),
(3, 'baramee', '2013-12-27 23:26:44', 'send'),
(4, 'metasit', '2013-12-11 23:27:11', 'pay');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(13) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pdetail` text NOT NULL,
  `price` int(4) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pdetail`, `price`, `quantity`) VALUES
(1, 'Centrum', 'วิตามินรวมจาก A ถึง Zinc', 350, 50),
(2, 'Caltrate', 'บำรุงกระดูก เสริมวิตามินดี', 760, 75),
(3, 'Ester-C', 'วิตามินซี 500 mg ไม่กัดกระเพาะ', 500, 100),
(4, 'Glucosamine', 'บำรุงข้อต่อ ป้องกันข้อเสื่อม', 1200, 10),
(24, 'bottle', 'แก้วน้ำ', 150, 200);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `std_id` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`std_id`, `course_id`) VALUES
('5001100348', '322236'),
('5001100348', '322114'),
('5001100348', '322224'),
('5001104807', '322236'),
('5001104807', '322431'),
('5001101634', '322236'),
('5001101634', '322431'),
('5001101811', '322236'),
('5001101811', '322224'),
('5001101811', '322114'),
('5001120060', '322372'),
('5001120060', '322114');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` varchar(50) NOT NULL,
  `std_name` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_name`, `province`) VALUES
('5001100348', 'นุชนารถ ขําทอง', 'ขอนแก่น'),
('5001104807', 'มัณฑนา ทองอยู่', 'เลย'),
('5001101634', 'จักรพงศ์ คนล่ํ่ำ', 'กรุงเทพฯ'),
('5001101811', 'นัยนา คําภู', 'ขอนแก่น'),
('5001102962', 'พรเทพ ชัยราชย์', 'อุดรธานี'),
('5001120060', 'มงคล บัวขาว', 'อุบลราชธานี'),
('5001130201', 'ชํานาญ  สุ่มนุช', 'นครราชสีมา');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
