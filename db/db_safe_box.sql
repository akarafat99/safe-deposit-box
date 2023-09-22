-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 09:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_safe_box`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `serial` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`serial`, `email`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_box`
--

CREATE TABLE `tbl_box` (
  `box_id` bigint(11) NOT NULL,
  `box_owner_id` int(50) NOT NULL,
  `box_price` int(11) NOT NULL,
  `box_description` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `next_bill_month` int(11) NOT NULL,
  `next_bill_date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_box`
--

INSERT INTO `tbl_box` (`box_id`, `box_owner_id`, `box_price`, `box_description`, `date`, `next_bill_month`, `next_bill_date`, `status`) VALUES
(79, 37, 350, 'Not interested to disclose.', '2023-04-14', 0, '2023-04-15', 1),
(80, 38, 125, '4 papers', '2023-04-15', 0, '2023-03-01', 1),
(81, 39, 10, 'Not interested to disclose.', '2023-04-15', 0, '2023-04-15', 1),
(82, 47, 125, 'Not interested to disclose.', '2023-04-15', 0, '2023-04-06', 1),
(83, 48, 125, '4 papers', '2023-04-15', 0, '2023-03-02', 1),
(84, 48, 600, 'Not interested to disclose.', '2023-04-15', 0, '2023-04-15', 1),
(85, 47, 70, 'Thesis papers on environment pollution project', '2023-04-15', 0, '2023-04-15', 1),
(86, 49, 350, 'Not interested to disclose.', '2023-04-15', 0, '2023-04-15', 1),
(87, 50, 10, 'Blue print of Android project 611221', '2023-04-15', 0, '2023-03-06', 1),
(88, 52, 125, 'Not interested to describe', '2023-04-16', 0, '2023-05-17', 1),
(89, 53, 125, 'Not disclosed.', '2023-04-17', 0, '2023-04-17', 1),
(90, 53, 350, 'Not disclosed.', '2023-04-17', 0, '2023-04-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_box_history`
--

CREATE TABLE `tbl_box_history` (
  `record_id` int(11) NOT NULL,
  `box_id` int(11) NOT NULL,
  `c_id` int(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_box_history`
--

INSERT INTO `tbl_box_history` (`record_id`, `box_id`, `c_id`, `timestamp`) VALUES
(17, 87, 50, '2023-04-17 16:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_box_payment`
--

CREATE TABLE `tbl_box_payment` (
  `payment_id` int(11) NOT NULL,
  `box_id` int(11) NOT NULL,
  `box_owner_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `bank_cheque` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_box_payment`
--

INSERT INTO `tbl_box_payment` (`payment_id`, `box_id`, `box_owner_id`, `payment_method`, `bank_cheque`, `amount`, `timestamp`) VALUES
(9, 78, 37, 'cheque', 2147483647, 1000, '2023-04-14 15:45:59'),
(10, 79, 37, 'cash', 0, 350, '2023-04-14 15:47:53'),
(11, 80, 38, 'cash', 0, 125, '2023-04-14 19:33:35'),
(12, 81, 39, 'cheque', 555555, 10, '2023-04-14 19:34:00'),
(13, 82, 47, 'cash', 0, 125, '2023-04-14 20:32:20'),
(14, 88, 52, 'cash', 0, 125, '2023-04-16 08:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firm_name` varchar(50) NOT NULL,
  `full_name` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `gender` text NOT NULL,
  `profession` text NOT NULL,
  `hair_color` varchar(50) NOT NULL,
  `eye_color` varchar(50) NOT NULL,
  `height` double NOT NULL,
  `weight` double NOT NULL,
  `approved` int(11) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `n_full_name` varchar(50) NOT NULL,
  `n_email` varchar(50) NOT NULL,
  `n_contact` varchar(11) NOT NULL,
  `n_address` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `firm_name`, `full_name`, `password`, `contact`, `gender`, `profession`, `hair_color`, `eye_color`, `height`, `weight`, `approved`, `address`, `timestamp`, `n_full_name`, `n_email`, `n_contact`, `n_address`) VALUES
(51, '190122.cse@student.just.edu.bd', 'abc', 'Abdul Khaled Arafat', 'Arafat1!', '01613394316', 'Male', '-', 'Black', 'Black', 122, 78, 0, 'Dhaka, Bangladesh', '2023-04-16 07:42:22', '', '', '', ''),
(53, '190121.cse@student.just.edu.bd', 'Not applicable', 'Khaja Tanzil', 'Arafat1@', '01749209618', 'Male', '-', 'Black', 'Black', 130, 45, 0, '12C road, Pabna Sadar.', '2023-04-17 16:25:08', 'Tanvir Hossain', '190113.cse@sudent.just.edu.bd', '01643620848', 'Building 4, Bogra Sadar, Rajshahi.'),
(38, '190122.cse@student.just.edu.bd', 'MB LTD', 'Arafat', 'Arafat2', '01824521100', 'Male', '-', 'Brown', 'Brown', 110, 69, 0, 'Jashore-747, Khulna.', '2023-04-14 19:31:50', '', '', '', ''),
(37, 'arafatabdulkhaled@gmail.com', 'Sign corp', 'Abdul Khaled Arafat', 'Arafat2', '01835866504', 'Male', 'Student', 'Black', 'Black', 122, 80, 0, '166/12 Ekrampur, Bandar, Narayangonj.', '2023-04-14 14:30:13', 'Md. Tamim', 'tamim@gmail.com', '01835766555', 'Dhaka-2312, Dhaka North.'),
(47, '', 'NJT', 'Nishat Jahan', 'Arafat2', '01855661122', 'Female', '-', 'Black', 'Black', 110, 55, 0, 'Jashore-747, Khulna.', '2023-04-14 20:31:44', '', '', '', ''),
(49, '190151.cse@student.just.edu.bd', 'Stella Dalton', 'Niloy Das', 'Arafat2', '01860771503', 'Male', '-', 'Black', 'Black', 115, 60, 0, '26/51 Dhormotola, Jashore, Khulna.', '2023-04-15 08:17:09', '', '', '', ''),
(48, '190116.cse@student.just.edu.bd', 'M Tech', 'Masrafi Bin Siraj', 'Arafat2', '01886420246', 'Male', '-', 'Black', 'Brown', 122, 67, 0, 'Arabpur, Jashore-755, Khulna.', '2023-04-15 08:11:08', 'Md. Sakib', 'Sakib@gmail.co.uk', '01558156012', 'North Dhaka , rd 100, Dhaka.'),
(50, '', 'Moses Rivers', 'Saber Mahmud', 'Arafat2', '01892773001', 'Male', 'Student', 'Black', 'Black', 122, 70, 0, 'Bonosree, 54/22, Dhaka.', '2023-04-15 08:20:45', 'Md. Arafat', '190122.cse@student.just.edu.bd', '01835866504', '166 Ekrampur, Bandar, Narayangonj, Dhaka.'),
(39, '', '', 'Khaled', 'Arafat2', '01899012311', 'Male', '-', 'Black', 'Black', 122, 66, 0, 'Bogra-1011', '2023-04-14 19:33:15', 'MD. Ahmed', 'Ahmed.1@gmail.com', '', ''),
(52, '', 'abc', 'Md. Naeem', 'Arafat1!', '01991212124', 'Male', 'Others', 'Black', 'Black', 110, 66, 0, 'Khulna', '2023-04-16 08:22:25', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `tbl_box`
--
ALTER TABLE `tbl_box`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `tbl_box_history`
--
ALTER TABLE `tbl_box_history`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `tbl_box_payment`
--
ALTER TABLE `tbl_box_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`contact`),
  ADD UNIQUE KEY `serial` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_box`
--
ALTER TABLE `tbl_box`
  MODIFY `box_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_box_history`
--
ALTER TABLE `tbl_box_history`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_box_payment`
--
ALTER TABLE `tbl_box_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
