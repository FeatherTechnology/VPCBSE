-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 06:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountsgroup`
--

CREATE TABLE `accountsgroup` (
  `Id` int(11) NOT NULL,
  `AccountsName` longtext DEFAULT NULL,
  `ParentId` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 0,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accountsgroup`
--

INSERT INTO `accountsgroup` (`Id`, `AccountsName`, `ParentId`, `status`, `order_id`) VALUES
(1, 'Capital Account', 0, 0, 1),
(2, 'Current Liabilities', 0, 0, 2),
(3, 'Current Assets', 0, 0, 4),
(4, 'Purchase Accounts', 0, 0, 5),
(5, 'Direct Income', 0, 0, 6),
(6, 'Direct Expenses', 0, 0, 7),
(7, 'Indirect Income', 0, 0, 8),
(8, 'Indirect Expenses', 0, 0, 9),
(9, 'Profit & Loss A/c', 0, 0, 10),
(10, 'Diff. in Opening Balances', 0, 0, 11),
(11, 'Reserve & Surplus', 1, 0, 12),
(12, 'Sundry Creditors', 2, 0, 13),
(13, 'Loans(Liability)', 2, 0, 14),
(14, 'Bank OD', 2, 0, 15),
(15, 'Opening Stock', 3, 0, 16),
(16, 'Cash-in-hand', 3, 0, 17),
(17, 'Bank Accounts', 3, 0, 18),
(18, 'Investments', 3, 0, 19),
(19, 'Loans and Advances', 3, 0, 20),
(40, 'Sundry Debtors', 3, 0, 35),
(42, 'Fixed Assets', 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `area_creation`
--

CREATE TABLE `area_creation` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(255) DEFAULT NULL,
  `item_details` varchar(255) DEFAULT NULL,
  `due_amount` varchar(255) DEFAULT NULL,
  `due_date` text DEFAULT NULL,
  `no_of_terms` text DEFAULT NULL,
  `transport_amount` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area_creation`
--

INSERT INTO `area_creation` (`area_id`, `area_name`, `item_details`, `due_amount`, `due_date`, `no_of_terms`, `transport_amount`, `status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, 'Pondy', 'testing,testing2', '1000,1000', '2023-04-14,2023-04-12', '2', '2000', 0, 1, 1, 1, '2023-04-12 15:16:54', '2023-04-12 15:16:54'),
(2, 'Pondy1', 'testing', '100', '2023-04-13', '1', '2000', 0, 1, NULL, NULL, '2023-04-12 16:58:46', '2023-04-12 16:58:46'),
(3, 'Pondy2', 'testing,testing2', '1000,1000', '2023-04-14,2023-04-12', '2', '2000', 0, 1, NULL, NULL, '2023-04-12 16:59:35', '2023-04-12 16:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `bankmaster`
--

CREATE TABLE `bankmaster` (
  `bankid` int(11) NOT NULL,
  `bankcode` varchar(255) DEFAULT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `accountno` varchar(255) DEFAULT NULL,
  `branchname` varchar(255) DEFAULT NULL,
  `shortform` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `mailid` varchar(255) DEFAULT NULL,
  `ifsccode` varchar(255) DEFAULT NULL,
  `contactperson` varchar(255) DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `micrcode` varchar(255) DEFAULT NULL,
  `typeofaccount` varchar(255) DEFAULT NULL,
  `undersubgroup` varchar(255) DEFAULT NULL,
  `fgroup` varchar(255) DEFAULT NULL,
  `bankgrouprefid` varchar(20) DEFAULT NULL,
  `ledgername` varchar(255) DEFAULT NULL,
  `costcenter` varchar(255) DEFAULT NULL,
  `fromperiod` varchar(50) DEFAULT NULL,
  `toperiod` varchar(50) DEFAULT NULL,
  `duedate` varchar(50) DEFAULT NULL,
  `loanamount` int(11) DEFAULT NULL,
  `emi` int(11) DEFAULT NULL,
  `restofinterest` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `createddate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bankmaster`
--

INSERT INTO `bankmaster` (`bankid`, `bankcode`, `bankname`, `accountno`, `branchname`, `shortform`, `purpose`, `mailid`, `ifsccode`, `contactperson`, `contactno`, `micrcode`, `typeofaccount`, `undersubgroup`, `fgroup`, `bankgrouprefid`, `ledgername`, `costcenter`, `fromperiod`, `toperiod`, `duedate`, `loanamount`, `emi`, `restofinterest`, `status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `createddate`) VALUES
(1, 'BANK1001', 'SBI', '23423434234', 'Tiruvannamalai', 'TVM', '1', 'test@gmail.com', 'rfase343434', 'test', '7887788878', '234234234', 'bankod', '13', '2', '2', 'SBI', '0', '2022-12-15', '2022-12-30', '2022-12-05', 100000, 100, 10, 0, 1, 1, 1, '2022-11-17 09:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `costcentre`
--

CREATE TABLE `costcentre` (
  `costcentreid` int(11) NOT NULL,
  `costcentrename` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `costcentre`
--

INSERT INTO `costcentre` (`costcentreid`, `costcentrename`, `status`) VALUES
(1, 'Celebration Charges', '0'),
(2, 'Faculty Bus', '0'),
(3, 'Sale', '0'),
(4, 'Purchase', '0'),
(5, 'Salary', '0'),
(6, 'Admin', '0'),
(7, 'test', '0');

-- --------------------------------------------------------

--
-- Table structure for table `fees_master`
--

CREATE TABLE `fees_master` (
  `fees_id` int(11) NOT NULL,
  `academic_year` varchar(250) DEFAULT NULL,
  `medium` varchar(250) DEFAULT NULL,
  `student_type` varchar(250) DEFAULT NULL,
  `standard` varchar(255) DEFAULT NULL,
  `grp_particulars` varchar(250) DEFAULT NULL,
  `grp_amount` varchar(250) DEFAULT NULL,
  `grp_date` varchar(250) DEFAULT NULL,
  `extra_particulars` varchar(250) DEFAULT NULL,
  `extra_amount` varchar(255) DEFAULT NULL,
  `extra_date` varchar(250) DEFAULT NULL,
  `amenity_particulars` varchar(250) DEFAULT NULL,
  `amenity_amount` varchar(250) DEFAULT NULL,
  `amenity_date` varchar(250) DEFAULT NULL,
  `temp_flat_no` varchar(250) DEFAULT NULL,
  `temp_street` varchar(250) DEFAULT NULL,
  `temp_district` varchar(250) DEFAULT NULL,
  `temp_area` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `grp_status` int(11) NOT NULL DEFAULT 0,
  `extra_status` int(11) NOT NULL DEFAULT 0,
  `amenity_status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees_master`
--

INSERT INTO `fees_master` (`fees_id`, `academic_year`, `medium`, `student_type`, `standard`, `grp_particulars`, `grp_amount`, `grp_date`, `extra_particulars`, `extra_amount`, `extra_date`, `amenity_particulars`, `amenity_amount`, `amenity_date`, `temp_flat_no`, `temp_street`, `temp_district`, `temp_area`, `status`, `grp_status`, `extra_status`, `amenity_status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, '2019 - 2020', 'Tamil', 'New Student', '1', 'testing', '1000', '2023-04-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 1, NULL, NULL, '2023-04-11 14:45:19', '2023-04-11 14:45:19'),
(2, '2019 - 2020', 'Tamil', 'New Student', '1', 'testingf', '1000', '2023-04-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 1, NULL, NULL, '2023-04-11 14:45:31', '2023-04-11 14:45:31'),
(3, '2019 - 2020', 'English', 'New Student', '1', 'testing', '1000', '2023-04-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, NULL, NULL, '2023-04-11 14:45:43', '2023-04-11 14:45:43'),
(4, '2019 - 2020', 'Tamil', 'New Student', '1', 'tets', '1000', '2023-04-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, NULL, NULL, '2023-04-11 15:31:52', '2023-04-11 15:31:52'),
(5, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'test', '2000', '2023-04-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 1, NULL, NULL, '2023-04-11 15:34:24', '2023-04-11 15:34:24'),
(6, '2019 - 2020', 'Tamil', 'New Student', '1', 'tets', '1000', '2023-04-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, NULL, NULL, '2023-04-11 15:43:55', '2023-04-11 15:43:55'),
(7, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'seeee', '2000', '2023-04-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 15:48:19', '2023-04-11 15:48:19'),
(8, '2019 - 2020', 'Tamil', 'New Student', '1', 'testingssss', '1000', '2023-04-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, NULL, NULL, '2023-04-11 15:57:27', '2023-04-11 15:57:27'),
(9, '2019 - 2020', 'Tamil', 'New Student', '1', 'tets', '1000', '2023-04-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, NULL, NULL, '2023-04-11 15:59:58', '2023-04-11 15:59:58'),
(10, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'sdsdf', '10000', '2023-04-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:02:28', '2023-04-11 16:02:28'),
(11, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'tes', '5000', '2023-04-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:03:16', '2023-04-11 16:03:16'),
(12, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'tes', '54545', '2023-03-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:06:56', '2023-04-11 16:06:56'),
(13, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'tes', '500', '2023-04-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:07:44', '2023-04-11 16:07:44'),
(14, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'tes', '20055', '2023-04-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:10:23', '2023-04-11 16:10:23'),
(15, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'tes', '100', '2023-04-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:10:51', '2023-04-11 16:10:51'),
(16, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'tes', '5001', '2023-04-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:12:38', '2023-04-11 16:12:38'),
(17, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'tes', '45', '2023-04-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:14:36', '2023-04-11 16:14:36'),
(18, '2019 - 2020', 'Tamil', 'New Student', '1', 'tets', '10002212', '2023-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, NULL, NULL, '2023-04-11 16:15:08', '2023-04-11 16:15:08'),
(19, '2019 - 2020', 'Tamil', 'New Student', '1', 'tets', '1000', '2023-04-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, NULL, NULL, '2023-04-11 16:15:31', '2023-04-11 16:15:31'),
(20, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'tes', '500', '2023-04-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:17:12', '2023-04-11 16:17:12'),
(21, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'tes', '5001', '2023-04-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:18:13', '2023-04-11 16:18:13'),
(22, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'tes', '500', '2023-04-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:18:25', '2023-04-11 16:18:25'),
(23, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Amenity', '1000', '2023-04-12', NULL, NULL, NULL, NULL, 1, 0, 0, 1, 1, NULL, NULL, '2023-04-11 16:38:20', '2023-04-11 16:38:20'),
(24, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Amenity1', '1000', '2023-04-12', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, NULL, NULL, '2023-04-11 16:39:05', '2023-04-11 16:39:05'),
(25, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Amenity', '10000', '2023-04-20', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, NULL, NULL, '2023-04-11 16:39:36', '2023-04-11 16:39:36'),
(26, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'tes', '1000', '2023-04-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:40:37', '2023-04-11 16:40:37'),
(27, '2019 - 2020', 'English', 'New Student', '3', NULL, NULL, NULL, 'test', '1000', '2023-04-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:42:23', '2023-04-11 16:42:23'),
(28, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'dfsdf', '100', '2023-04-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-11 16:56:02', '2023-04-11 16:56:02'),
(29, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'fsdfsdf', '1000', '2023-04-20', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, NULL, NULL, '2023-04-11 16:56:12', '2023-04-11 16:56:12'),
(30, '2019 - 2020', 'Tamil', 'New Student', '1', 'tets', '10000', '2023-04-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, NULL, NULL, '2023-04-11 17:09:09', '2023-04-11 17:09:09'),
(31, '2019 - 2020', 'Tamil', NULL, '1', 'testing', '1000', '2023-04-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, NULL, NULL, '2023-04-13 16:25:27', '2023-04-13 16:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `fees_master_model2`
--

CREATE TABLE `fees_master_model2` (
  `fees_id` int(11) NOT NULL,
  `academic_year` varchar(250) DEFAULT NULL,
  `medium` varchar(250) DEFAULT NULL,
  `student_type` varchar(250) DEFAULT NULL,
  `standard` varchar(255) DEFAULT NULL,
  `grp_particulars` varchar(250) DEFAULT NULL,
  `grp_amount` varchar(250) DEFAULT NULL,
  `grp_ledger_name` varchar(250) DEFAULT NULL,
  `extra_particulars` varchar(250) DEFAULT NULL,
  `extra_amount` varchar(255) DEFAULT NULL,
  `extra_ledger_name` varchar(250) DEFAULT NULL,
  `amenity_particulars` varchar(250) DEFAULT NULL,
  `amenity_amount` varchar(250) DEFAULT NULL,
  `amenity_ledger_name` varchar(250) DEFAULT NULL,
  `temp_flat_no` varchar(250) DEFAULT NULL,
  `temp_street` varchar(250) DEFAULT NULL,
  `temp_district` varchar(250) DEFAULT NULL,
  `temp_area` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `grp_status` int(11) NOT NULL DEFAULT 0,
  `extra_status` int(11) NOT NULL DEFAULT 0,
  `amenity_status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees_master_model2`
--

INSERT INTO `fees_master_model2` (`fees_id`, `academic_year`, `medium`, `student_type`, `standard`, `grp_particulars`, `grp_amount`, `grp_ledger_name`, `extra_particulars`, `extra_amount`, `extra_ledger_name`, `amenity_particulars`, `amenity_amount`, `amenity_ledger_name`, `temp_flat_no`, `temp_street`, `temp_district`, `temp_area`, `status`, `grp_status`, `extra_status`, `amenity_status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, '2019 - 2020', 'Tamil', 'New Student', '1', 'Testing', '1000', 'Uniform', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 1, NULL, NULL, '2023-04-13 14:31:21', '2023-04-13 14:31:21'),
(2, '2019 - 2020', 'Tamil', 'New Student', '1', 'Testing', '1000', 'Bag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, NULL, NULL, '2023-04-13 14:36:17', '2023-04-13 14:36:17'),
(3, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'Testing', '2000', 'uniform', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 1, NULL, NULL, '2023-04-13 14:54:26', '2023-04-13 14:54:26'),
(4, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, 'Testing', '2000', 'Sports Kits', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-13 15:05:44', '2023-04-13 15:05:44'),
(5, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'fgdfgd', '3434', '', NULL, NULL, NULL, NULL, 1, 0, 0, 1, 1, NULL, NULL, '2023-04-13 15:23:43', '2023-04-13 15:23:43'),
(6, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Testing', '1000', '', NULL, NULL, NULL, NULL, 1, 0, 0, 1, 1, NULL, NULL, '2023-04-13 15:29:28', '2023-04-13 15:29:28'),
(7, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Test Process', '1500', '', NULL, NULL, NULL, NULL, 1, 0, 0, 1, 1, NULL, NULL, '2023-04-13 15:34:40', '2023-04-13 15:34:40'),
(8, '2019 - 2020', 'Tamil', 'New Student', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'ttttt', '333', 'Bag', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, NULL, NULL, '2023-04-13 15:37:46', '2023-04-13 15:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `fees_master_model3`
--

CREATE TABLE `fees_master_model3` (
  `fees_id` int(11) NOT NULL,
  `academic_year` varchar(250) DEFAULT NULL,
  `medium` varchar(250) DEFAULT NULL,
  `student_type` varchar(250) DEFAULT NULL,
  `standard` varchar(255) DEFAULT NULL,
  `grp_particulars` varchar(250) DEFAULT NULL,
  `grp_amount` varchar(250) DEFAULT NULL,
  `grp_date` varchar(250) DEFAULT NULL,
  `extra_particulars` varchar(250) DEFAULT NULL,
  `extra_amount` varchar(255) DEFAULT NULL,
  `extra_date` varchar(250) DEFAULT NULL,
  `amenity_particulars` varchar(250) DEFAULT NULL,
  `amenity_amount` varchar(250) DEFAULT NULL,
  `amenity_date` varchar(250) DEFAULT NULL,
  `temp_flat_no` varchar(250) DEFAULT NULL,
  `temp_street` varchar(250) DEFAULT NULL,
  `temp_district` varchar(250) DEFAULT NULL,
  `temp_area` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `grp_status` int(11) NOT NULL DEFAULT 0,
  `extra_status` int(11) NOT NULL DEFAULT 0,
  `amenity_status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees_master_model3`
--

INSERT INTO `fees_master_model3` (`fees_id`, `academic_year`, `medium`, `student_type`, `standard`, `grp_particulars`, `grp_amount`, `grp_date`, `extra_particulars`, `extra_amount`, `extra_date`, `amenity_particulars`, `amenity_amount`, `amenity_date`, `temp_flat_no`, `temp_street`, `temp_district`, `temp_area`, `status`, `grp_status`, `extra_status`, `amenity_status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, '2019 - 2020', 'Tamil', NULL, '1', 'testing', '1000', '2023-04-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, NULL, NULL, '2023-04-13 16:27:53', '2023-04-13 16:27:53'),
(2, '2019 - 2020', 'Tamil', NULL, '1', 'testing2', '1000', '2023-04-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, NULL, NULL, '2023-04-13 16:29:38', '2023-04-13 16:29:38'),
(3, '2019 - 2020', 'Tamil', NULL, '1', NULL, NULL, NULL, 'test', '4545', '2023-04-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 1, NULL, NULL, '2023-04-13 16:35:00', '2023-04-13 16:35:00'),
(4, '2019 - 2020', 'Tamil', NULL, '1', NULL, NULL, NULL, 'trtrtrt', '56666', '2023-04-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-13 16:35:30', '2023-04-13 16:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `fees_master_model4`
--

CREATE TABLE `fees_master_model4` (
  `fees_id` int(11) NOT NULL,
  `academic_year` varchar(250) DEFAULT NULL,
  `medium` varchar(250) DEFAULT NULL,
  `student_type` varchar(250) DEFAULT NULL,
  `standard` varchar(255) DEFAULT NULL,
  `grp_particulars` varchar(250) DEFAULT NULL,
  `grp_amount` varchar(250) DEFAULT NULL,
  `grp_date` varchar(250) DEFAULT NULL,
  `extra_particulars` varchar(250) DEFAULT NULL,
  `extra_amount` varchar(255) DEFAULT NULL,
  `extra_date` varchar(250) DEFAULT NULL,
  `amenity_particulars` varchar(250) DEFAULT NULL,
  `amenity_amount` varchar(250) DEFAULT NULL,
  `amenity_date` varchar(250) DEFAULT NULL,
  `temp_flat_no` varchar(250) DEFAULT NULL,
  `temp_street` varchar(250) DEFAULT NULL,
  `temp_district` varchar(250) DEFAULT NULL,
  `temp_area` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `grp_status` int(11) NOT NULL DEFAULT 0,
  `extra_status` int(11) NOT NULL DEFAULT 0,
  `amenity_status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees_master_model4`
--

INSERT INTO `fees_master_model4` (`fees_id`, `academic_year`, `medium`, `student_type`, `standard`, `grp_particulars`, `grp_amount`, `grp_date`, `extra_particulars`, `extra_amount`, `extra_date`, `amenity_particulars`, `amenity_amount`, `amenity_date`, `temp_flat_no`, `temp_street`, `temp_district`, `temp_area`, `status`, `grp_status`, `extra_status`, `amenity_status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, '2019 - 2020', 'Tamil', NULL, '1', 'tets', '1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, NULL, NULL, '2023-04-13 17:06:16', '2023-04-13 17:06:16'),
(2, '2019 - 2020', 'Tamil', NULL, '1', NULL, NULL, NULL, 'test', '323423', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 1, NULL, NULL, '2023-04-13 17:12:43', '2023-04-13 17:12:43'),
(3, '2019 - 2020', 'Tamil', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'fsdfsdf', '5555', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, NULL, NULL, '2023-04-13 17:23:24', '2023-04-13 17:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `grp_classification`
--

CREATE TABLE `grp_classification` (
  `grp_classification_id` int(11) NOT NULL,
  `grp_classification_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grp_classification`
--

INSERT INTO `grp_classification` (`grp_classification_id`, `grp_classification_name`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Test', 0, '2023-04-13 11:19:09', '2023-04-13 11:19:09'),
(2, 'Test1', 0, '2023-04-13 11:22:47', '2023-04-13 11:22:47'),
(3, 'Test2', 0, '2023-04-13 11:26:27', '2023-04-13 11:26:27'),
(4, 'Test3', 0, '2023-04-13 11:27:44', '2023-04-13 11:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_creation`
--

CREATE TABLE `holiday_creation` (
  `holiday_id` int(11) NOT NULL,
  `holiday_name` varchar(255) DEFAULT NULL,
  `holiday_date` varchar(250) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holiday_creation`
--

INSERT INTO `holiday_creation` (`holiday_id`, `holiday_name`, `holiday_date`, `comments`, `status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, 'Week Off', '2023-03-23', 'Testtt', 0, 1, NULL, NULL, '2023-03-23 17:23:03', '2023-03-23 17:23:03'),
(2, 'Test', '2023-03-23', 'tesdfasdf', 0, 1, NULL, NULL, '2023-03-29 13:13:21', '2023-03-29 13:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `item_creation`
--

CREATE TABLE `item_creation` (
  `item_id` int(11) NOT NULL,
  `grp_classification` varchar(255) DEFAULT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `uom` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `invoice_ref` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_creation`
--

INSERT INTO `item_creation` (`item_id`, `grp_classification`, `item_code`, `description`, `uom`, `quantity`, `rate`, `result`, `invoice_ref`, `status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, '1', 'IC-5/Apr22', 'Normal', 'UOM', '6', '20500', '123000', '121', 0, 1, NULL, NULL, '2023-04-12 17:10:39', '2023-04-12 17:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `ledgerid` int(11) NOT NULL,
  `ledgername` varchar(255) DEFAULT NULL,
  `groupname` varchar(255) DEFAULT NULL,
  `subgroupname` varchar(255) DEFAULT NULL,
  `inventory` varchar(255) DEFAULT NULL,
  `costcentre` varchar(255) DEFAULT NULL,
  `openingbalancedr` varchar(200) DEFAULT NULL,
  `opening_credit` varchar(255) DEFAULT NULL,
  `opening_debit` varchar(255) DEFAULT NULL,
  `openingbalance` int(200) DEFAULT 0,
  `status` varchar(255) DEFAULT '0',
  `exciseduty` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `tin` varchar(255) DEFAULT NULL,
  `servicetax` varchar(255) DEFAULT NULL,
  `contactperson` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `address3` varchar(255) DEFAULT NULL,
  `address4` varchar(255) DEFAULT NULL,
  `contactnumber` varchar(255) DEFAULT NULL,
  `AccountRefId` int(11) DEFAULT NULL,
  `ServiceTaxNumber` varchar(255) DEFAULT NULL,
  `ExciseDutyReg` varchar(255) DEFAULT NULL,
  `DebitCredit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`ledgerid`, `ledgername`, `groupname`, `subgroupname`, `inventory`, `costcentre`, `openingbalancedr`, `opening_credit`, `opening_debit`, `openingbalance`, `status`, `exciseduty`, `pan`, `tin`, `servicetax`, `contactperson`, `address1`, `address2`, `address3`, `address4`, `contactnumber`, `AccountRefId`, `ServiceTaxNumber`, `ExciseDutyReg`, `DebitCredit`) VALUES
(3, 'SBI', '3', '17', 'No', 'No', 'CR', '0', '0', 0, '0', '', '', '', '', '', '', '', '', '', '', 17, NULL, NULL, NULL),
(4, 'Mukesh', '3', '3', 'No', 'No', 'CR', '50000', '0', 50000, '0', '', '', '', '', '', '', '', '', '', '', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE `purpose` (
  `purposeid` int(11) NOT NULL,
  `purposename` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purpose`
--

INSERT INTO `purpose` (`purposeid`, `purposename`, `status`) VALUES
(1, 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `school_creation`
--

CREATE TABLE `school_creation` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `school_login_name` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `address1` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `address3` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `school_logo` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_creation`
--

INSERT INTO `school_creation` (`school_id`, `school_name`, `school_login_name`, `district`, `address1`, `address2`, `address3`, `state`, `contact_number`, `email_id`, `school_logo`, `status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, 'VHS', 'Vivegaanandhar School', 'testtttttt', 'Address', 'Address2', NULL, 'Tamil Nadu', '7854784521', 'sivashankari2903@gmail.com', NULL, 0, 1, 1, 1, '2023-03-23 16:52:02', '2023-03-23 16:52:02'),
(2, 'ASGGHSS', 'Annai Sivagamai', 'dsasdfsdf', 'Address', 'Address2', NULL, 'Tamil Nadu', '7865998565', 'sivashankari2903@gmail.com', NULL, 0, 1, NULL, NULL, '2023-03-23 17:04:22', '2023-03-23 17:04:22'),
(3, '', '', '', '', '', NULL, '', '', '', NULL, 0, 1, NULL, NULL, '2023-04-05 14:50:24', '2023-04-05 14:50:24'),
(4, '', '', '', '', '', NULL, '', '', '', NULL, 0, 1, NULL, NULL, '2023-04-05 14:50:32', '2023-04-05 14:50:32'),
(5, 'test', 'test', 'Tiruvannamalai', 'test', 'test', NULL, 'Tamil Nadu', '3434343434', 'test@gmail.com', 'img_avatar1.png', 0, 1, 1, NULL, '2023-04-06 12:48:14', '2023-04-06 12:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `staff_creation`
--

CREATE TABLE `staff_creation` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `employee_no` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_group` varchar(50) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `aadhar_no` varchar(255) DEFAULT NULL,
  `pf_no` varchar(255) DEFAULT NULL,
  `contact_no` varchar(150) DEFAULT NULL,
  `doj` varchar(150) DEFAULT NULL,
  `appointment_lt` varchar(150) DEFAULT NULL,
  `emg_contact_person` varchar(255) DEFAULT NULL,
  `emg_contact_no` varchar(150) DEFAULT NULL,
  `transport_details` varchar(50) DEFAULT NULL,
  `flat_no` varchar(100) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_acc_no` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `staff_pic` varchar(255) NOT NULL,
  `title` text DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `title1` text DEFAULT NULL,
  `certificate1` varchar(255) DEFAULT NULL,
  `title2` text DEFAULT NULL,
  `certificate2` varchar(255) DEFAULT NULL,
  `title3` text DEFAULT NULL,
  `certificate3` varchar(255) DEFAULT NULL,
  `title4` text DEFAULT NULL,
  `certificate4` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `deleted_staff` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_creation`
--

INSERT INTO `staff_creation` (`id`, `first_name`, `last_name`, `employee_no`, `designation`, `gender`, `blood_group`, `qualification`, `pan`, `aadhar_no`, `pf_no`, `contact_no`, `doj`, `appointment_lt`, `emg_contact_person`, `emg_contact_no`, `transport_details`, `flat_no`, `street`, `area`, `district`, `bank_name`, `bank_acc_no`, `branch`, `ifsc_code`, `staff_pic`, `title`, `certificate`, `title1`, `certificate1`, `title2`, `certificate2`, `title3`, `certificate3`, `title4`, `certificate4`, `status`, `deleted_staff`, `reason`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, 'ABC', 'XYZ', 'ST-101', 'IT', 'Male', 'A1+', 'MCA', 'AKASA8383G', '8874-5154-4584', '54564546564', '7418529332', '2023-01-01', '2023-04-01', 'RRR', '8528528005', 'YES', '555', 'Trust Road', 'Mylapore', 'Chennai', 'SBI', '1854846415656', 'Chennai', 'DGGD415515', 'photo-1541963463532-d68292c34b19.jpg', '10', 'hoc2022-banner.png', '12', 'pexels-pixabay-268533.jpg', 'UG', 'pondicherry-has-beautiful-coast-india-famous-unexplored-beaches-beautiful-coastline-india-123124828.jpg', '', '', '', '', 0, NULL, NULL, 1, 1, NULL, '2023-04-14 18:16:12', '2023-04-14 18:16:12'),
(2, 'Azil', 'keerthu', 'ST-102', 'IT', 'Male', 'B+', 'M.Com', 'AKASA8383G', '8874-5154-4584', '34662456254', '7418529630', '2023-02-01', '2023-04-01', 'Shrlin', '8529637410', 'YES', '555', 'Trust Road', 'Mylapore', 'Chennai', 'ICICI', '1854846415656', 'Chennai', 'DGGD415515', 'tree-736885__480.jpg', '10', 'hoc2022-banner.png', '12', 'pexels-pixabay-268533.jpg', 'UG', 'photo-1541963463532-d68292c34b19.jpg', '', '', '', '', 0, NULL, NULL, 1, 1, NULL, '2023-04-14 18:29:27', '2023-04-14 18:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `student_creation`
--

CREATE TABLE `student_creation` (
  `student_id` int(11) NOT NULL,
  `temp_no` varchar(250) DEFAULT NULL,
  `admission_number` varchar(250) DEFAULT NULL,
  `student_name` varchar(250) DEFAULT NULL,
  `sur_name` varchar(250) DEFAULT NULL,
  `date_of_birth` varchar(250) DEFAULT NULL,
  `gender` varchar(250) NOT NULL,
  `mother_tongue` varchar(250) DEFAULT NULL,
  `aadhar_number` varchar(250) DEFAULT NULL,
  `blood_group` varchar(250) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `castename` varchar(250) DEFAULT NULL,
  `sub_caste` varchar(250) DEFAULT NULL,
  `nationality` varchar(250) DEFAULT NULL,
  `religion` varchar(250) DEFAULT NULL,
  `student_image` varchar(250) DEFAULT NULL,
  `filltoo` varchar(50) DEFAULT NULL,
  `flat_no` varchar(250) DEFAULT NULL,
  `flat_no1` varchar(250) DEFAULT NULL,
  `street` varchar(250) DEFAULT NULL,
  `street1` varchar(250) DEFAULT NULL,
  `area_locatlity` varchar(255) DEFAULT NULL,
  `area_locatlity1` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `district1` varchar(250) DEFAULT NULL,
  `pincode` varchar(250) DEFAULT NULL,
  `pincode1` varchar(250) DEFAULT NULL,
  `standard` varchar(250) DEFAULT NULL,
  `previouschoolname` varchar(250) DEFAULT NULL,
  `previousplace` varchar(250) DEFAULT NULL,
  `strpreviousdoj` varchar(250) DEFAULT NULL,
  `strpreviousdol` varchar(250) DEFAULT NULL,
  `timeoftchandedover` varchar(250) DEFAULT NULL,
  `previousclassattended` varchar(250) DEFAULT NULL,
  `section` varchar(250) DEFAULT NULL,
  `medium` varchar(250) DEFAULT NULL,
  `studentrollno` varchar(250) DEFAULT NULL,
  `emisno` varchar(250) DEFAULT NULL,
  `studentstype` varchar(250) DEFAULT NULL,
  `referencecat` varchar(250) DEFAULT NULL,
  `refstaffid` varchar(250) DEFAULT NULL,
  `refstudentid` varchar(255) DEFAULT NULL,
  `refoldstudentid` varchar(250) DEFAULT NULL,
  `referencecatname` varchar(250) DEFAULT NULL,
  `concession_type` varchar(250) DEFAULT NULL,
  `concessiontypedetails` varchar(250) DEFAULT NULL,
  `facility` varchar(250) DEFAULT NULL,
  `roomcatogoryfeeid` varchar(250) DEFAULT NULL,
  `advancefee` varchar(250) DEFAULT NULL,
  `roomrent` varchar(250) DEFAULT NULL,
  `transportarearefid` varchar(250) DEFAULT NULL,
  `transportstopping` varchar(250) DEFAULT NULL,
  `busno` varchar(250) DEFAULT NULL,
  `father_name` varchar(250) DEFAULT NULL,
  `mother_name` varchar(250) DEFAULT NULL,
  `father_aadhar_number` varchar(250) DEFAULT NULL,
  `mother_aadhar_number` varchar(250) DEFAULT NULL,
  `occupation` varchar(250) DEFAULT NULL,
  `monthly_income` varchar(250) DEFAULT NULL,
  `nature_business` varchar(250) DEFAULT NULL,
  `position_held` varchar(250) DEFAULT NULL,
  `telephone_number` int(250) DEFAULT NULL,
  `lives_gaurdian` text DEFAULT NULL,
  `gaurdian_name` text DEFAULT NULL,
  `gaurdian_mobile` text DEFAULT NULL,
  `gaurdian_aadhar_number` text DEFAULT NULL,
  `gaurdian_email_id` text DEFAULT NULL,
  `father_mobile_no` text DEFAULT NULL,
  `mother_mobile_no` text DEFAULT NULL,
  `father_email_id` text DEFAULT NULL,
  `sms_sent_no` text DEFAULT NULL,
  `sibling_name` text DEFAULT NULL,
  `sibling_school_name` text DEFAULT NULL,
  `sibling_standard` text DEFAULT NULL,
  `sibling_name2` text DEFAULT NULL,
  `sibling_school_name2` text DEFAULT NULL,
  `sibling_standard2` text DEFAULT NULL,
  `sibling_name3` text DEFAULT NULL,
  `sibling_school_name3` text DEFAULT NULL,
  `sibling_standard3` text DEFAULT NULL,
  `anyextracurricular` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `certificate` varchar(250) DEFAULT NULL,
  `title1` text DEFAULT NULL,
  `certificate1` varchar(250) DEFAULT NULL,
  `title2` text DEFAULT NULL,
  `certificate2` varchar(250) DEFAULT NULL,
  `title3` text DEFAULT NULL,
  `certificate3` varchar(250) DEFAULT NULL,
  `title4` text DEFAULT NULL,
  `certificate4` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `deleted_student` int(11) NOT NULL DEFAULT 0,
  `reason` text DEFAULT NULL,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_creation`
--

INSERT INTO `student_creation` (`student_id`, `temp_no`, `admission_number`, `student_name`, `sur_name`, `date_of_birth`, `gender`, `mother_tongue`, `aadhar_number`, `blood_group`, `category`, `castename`, `sub_caste`, `nationality`, `religion`, `student_image`, `filltoo`, `flat_no`, `flat_no1`, `street`, `street1`, `area_locatlity`, `area_locatlity1`, `district`, `district1`, `pincode`, `pincode1`, `standard`, `previouschoolname`, `previousplace`, `strpreviousdoj`, `strpreviousdol`, `timeoftchandedover`, `previousclassattended`, `section`, `medium`, `studentrollno`, `emisno`, `studentstype`, `referencecat`, `refstaffid`, `refstudentid`, `refoldstudentid`, `referencecatname`, `concession_type`, `concessiontypedetails`, `facility`, `roomcatogoryfeeid`, `advancefee`, `roomrent`, `transportarearefid`, `transportstopping`, `busno`, `father_name`, `mother_name`, `father_aadhar_number`, `mother_aadhar_number`, `occupation`, `monthly_income`, `nature_business`, `position_held`, `telephone_number`, `lives_gaurdian`, `gaurdian_name`, `gaurdian_mobile`, `gaurdian_aadhar_number`, `gaurdian_email_id`, `father_mobile_no`, `mother_mobile_no`, `father_email_id`, `sms_sent_no`, `sibling_name`, `sibling_school_name`, `sibling_standard`, `sibling_name2`, `sibling_school_name2`, `sibling_standard2`, `sibling_name3`, `sibling_school_name3`, `sibling_standard3`, `anyextracurricular`, `title`, `certificate`, `title1`, `certificate1`, `title2`, `certificate2`, `title3`, `certificate3`, `title4`, `certificate4`, `status`, `deleted_student`, `reason`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, '101', 'VP101', 'sivas', 's', '2018-05-08', 'Female', 'Tamil', '8785-1548-7484-5454', 'A1-', 'OBC', '1', 'Testing', 'Indian', 'Hindu', 'WhatsApp Image 2022-10-04 at 5.56.49 PM (1).jpeg', 'Address_Permanant', '1', '1', 'Car Street Car Street', 'Car Street Car Street', 'Bussy Street', 'Bussy Street', 'Thiruvannamalai', 'Thiruvannamalai', '605004', '605004', '5', 'test', 'dfsdfsdf', '2023-04-01', '2023-04-14', 'dfsdfdsf', 'dfsdfsd', '2', 'Tamil', '87845123', '', 'NewStudent', '', '', '', '', '', 'Scholar', '', 'Hostel', '1', 'sdfsd', 'dfsdf', '', '', '', 'Moorthy', 'Sarasu', '6484-5114-5485-4122', '5474-7851-2484-1254', 'Job', '200000', 'fgdfgdfg', 'fsdfsdf', 2147483647, 'lives_gaurdian', 'dfasdfs', '5878542121', '7898-9965-6598-5965', 'sdfasdf@gmail.com', '9898656569', '8784565989', 'sdfasdf@gmail.com', '9895232326', 'dfsdfsd', 'fsdfasdf', 'sdfasdfa', '', '', '', '', '', '', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         sdsdsdfasdfsdf                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ', '10th', 'Feather Tech 01.jpg', '12th', 'image (7).png', 'Transfer', 'image (6).png', 'Caste', 'School Student Rollback Flow.docx', 'Nationality', 'Backup and restore.png', 0, 1, NULL, 1, 1, 1, '2023-04-10 10:18:02', '2023-04-10 10:18:02'),
(2, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'test', NULL, NULL, NULL, '2023-04-10 15:44:21', '2023-04-10 15:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `subject_details`
--

CREATE TABLE `subject_details` (
  `subject_id` int(11) NOT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `paper_name` varchar(255) DEFAULT NULL,
  `max_mark` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_details`
--

INSERT INTO `subject_details` (`subject_id`, `class_id`, `paper_name`, `max_mark`, `status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, '2', 'Tamil', '50', 1, 1, NULL, NULL, '2023-04-04 13:34:32', '2023-04-04 13:34:32'),
(2, '2', 'English', '50', 0, 1, NULL, NULL, '2023-04-04 13:34:52', '2023-04-04 13:34:52'),
(3, '3', 'Tamil', '50', 0, 1, NULL, NULL, '2023-04-04 13:35:03', '2023-04-04 13:35:03'),
(4, '2', 'Englishrt', '50', 0, 1, NULL, NULL, '2023-04-04 13:36:07', '2023-04-04 13:36:07'),
(5, '2', 'Science', '50', 0, 1, NULL, NULL, '2023-04-04 13:36:12', '2023-04-04 13:36:12'),
(6, '2', 'Tamilggg', '50', 1, 1, NULL, NULL, '2023-04-04 13:36:20', '2023-04-04 13:36:20'),
(7, '2', 'Maths', '50', 0, 1, NULL, NULL, '2023-04-04 13:39:42', '2023-04-04 13:39:42'),
(8, '2', 'social', '50', 0, 1, NULL, NULL, '2023-04-11 10:12:56', '2023-04-11 10:12:56'),
(9, '4', 'Maths1', '50', 0, 1, NULL, NULL, '2023-04-11 12:59:30', '2023-04-11 12:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `temp_admission_student`
--

CREATE TABLE `temp_admission_student` (
  `temp_admission_id` int(11) NOT NULL,
  `temp_student_name` varchar(250) DEFAULT NULL,
  `temp_dob` varchar(250) DEFAULT NULL,
  `temp_gender` varchar(250) DEFAULT NULL,
  `temp_category` varchar(255) DEFAULT NULL,
  `temp_standard` varchar(250) DEFAULT NULL,
  `temp_student_type` varchar(250) DEFAULT NULL,
  `temp_medium` varchar(250) DEFAULT NULL,
  `temp_entrance_exam_date` varchar(250) DEFAULT NULL,
  `temp_entrance_exam_mark` varchar(255) DEFAULT NULL,
  `temp_src` varchar(250) DEFAULT NULL,
  `temp_father_name` varchar(250) DEFAULT NULL,
  `temp_mother_name` varchar(250) DEFAULT NULL,
  `temp_contact_number` varchar(250) DEFAULT NULL,
  `temp_flat_no` varchar(250) DEFAULT NULL,
  `temp_street` varchar(250) DEFAULT NULL,
  `temp_district` varchar(250) DEFAULT NULL,
  `temp_area` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_admission_student`
--

INSERT INTO `temp_admission_student` (`temp_admission_id`, `temp_student_name`, `temp_dob`, `temp_gender`, `temp_category`, `temp_standard`, `temp_student_type`, `temp_medium`, `temp_entrance_exam_date`, `temp_entrance_exam_mark`, `temp_src`, `temp_father_name`, `temp_mother_name`, `temp_contact_number`, `temp_flat_no`, `temp_street`, `temp_district`, `temp_area`, `status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, 'Sivas', '1993-09-21', 'Female', 'OBC', '1', 'New Student', 'Tamil', '2023-03-25', '50', 'Scholarship', 'Moorthy', 'Saraswathy', '7845457845', '8', 'Street ', 'District', 'Area', 0, 1, 1, NULL, '2023-03-24 14:23:01', '2023-03-24 14:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `trust_creation`
--

CREATE TABLE `trust_creation` (
  `trust_id` int(11) NOT NULL,
  `trust_name` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address1` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `address3` text DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `pan_number` varchar(255) DEFAULT NULL,
  `tan_number` varchar(255) DEFAULT NULL,
  `trust_logo` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trust_creation`
--

INSERT INTO `trust_creation` (`trust_id`, `trust_name`, `contact_person`, `contact_number`, `address1`, `address2`, `address3`, `place`, `pincode`, `email_id`, `website`, `pan_number`, `tan_number`, `trust_logo`, `status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, 'Agaram', 'Surya', '1212121212', 'Bussy Street', 'Chinnakadai', '', 'Pondicherry', '121212', 'test@gmail.com', 'www.feathertechnology.com', 'ABCTY1234D', 'PDES03028F', 'img_avatar1.png', 0, 1, 1, NULL, '2023-04-06 15:51:33', '2023-04-06 15:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `Createddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `fullname`, `title`, `emailid`, `user_name`, `user_password`, `role`, `status`, `Createddate`) VALUES
(1, 'Super', 'Admin', 'Super Admin', 'Super Admin', 'support@feathertechnology.in', 'support@feathertechnology.in', 'admin@123', '1', '0', '2021-04-17 17:08:00'),
(18, 'Admin2', 'admin', 'Super Admin2', 'test', 'test@gmil.com', 'test@gmail.com', 'test@123', '1', '0', '2022-11-09 11:19:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountsgroup`
--
ALTER TABLE `accountsgroup`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `area_creation`
--
ALTER TABLE `area_creation`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `bankmaster`
--
ALTER TABLE `bankmaster`
  ADD PRIMARY KEY (`bankid`);

--
-- Indexes for table `costcentre`
--
ALTER TABLE `costcentre`
  ADD PRIMARY KEY (`costcentreid`);

--
-- Indexes for table `fees_master`
--
ALTER TABLE `fees_master`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `fees_master_model2`
--
ALTER TABLE `fees_master_model2`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `fees_master_model3`
--
ALTER TABLE `fees_master_model3`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `fees_master_model4`
--
ALTER TABLE `fees_master_model4`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `grp_classification`
--
ALTER TABLE `grp_classification`
  ADD PRIMARY KEY (`grp_classification_id`);

--
-- Indexes for table `holiday_creation`
--
ALTER TABLE `holiday_creation`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `item_creation`
--
ALTER TABLE `item_creation`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`ledgerid`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
  ADD PRIMARY KEY (`purposeid`);

--
-- Indexes for table `school_creation`
--
ALTER TABLE `school_creation`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `staff_creation`
--
ALTER TABLE `staff_creation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_creation`
--
ALTER TABLE `student_creation`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject_details`
--
ALTER TABLE `subject_details`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `temp_admission_student`
--
ALTER TABLE `temp_admission_student`
  ADD PRIMARY KEY (`temp_admission_id`);

--
-- Indexes for table `trust_creation`
--
ALTER TABLE `trust_creation`
  ADD PRIMARY KEY (`trust_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountsgroup`
--
ALTER TABLE `accountsgroup`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `area_creation`
--
ALTER TABLE `area_creation`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bankmaster`
--
ALTER TABLE `bankmaster`
  MODIFY `bankid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `costcentre`
--
ALTER TABLE `costcentre`
  MODIFY `costcentreid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fees_master`
--
ALTER TABLE `fees_master`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `fees_master_model2`
--
ALTER TABLE `fees_master_model2`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fees_master_model3`
--
ALTER TABLE `fees_master_model3`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fees_master_model4`
--
ALTER TABLE `fees_master_model4`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grp_classification`
--
ALTER TABLE `grp_classification`
  MODIFY `grp_classification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `holiday_creation`
--
ALTER TABLE `holiday_creation`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_creation`
--
ALTER TABLE `item_creation`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `ledgerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
  MODIFY `purposeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_creation`
--
ALTER TABLE `school_creation`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff_creation`
--
ALTER TABLE `staff_creation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_creation`
--
ALTER TABLE `student_creation`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject_details`
--
ALTER TABLE `subject_details`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `temp_admission_student`
--
ALTER TABLE `temp_admission_student`
  MODIFY `temp_admission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trust_creation`
--
ALTER TABLE `trust_creation`
  MODIFY `trust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
