-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 06:13 AM
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
-- Database: `school_demo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `year_id` int(11) NOT NULL,
  `period_from` date DEFAULT NULL,
  `period_to` date DEFAULT NULL,
  `academic_year` varchar(150) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` varchar(150) NOT NULL,
  `update_login_id` varchar(150) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`year_id`, `period_from`, `period_to`, `academic_year`, `status`, `insert_login_id`, `update_login_id`, `created_date`, `updated_date`) VALUES
(1, '2019-04-01', '2020-03-31', '2019-2020', 0, '1', NULL, '2024-03-09 03:19:37', NULL),
(2, '2020-04-01', '2021-03-31', '2020-2021', 0, '1', NULL, '2024-03-09 03:19:37', NULL),
(3, '2021-04-01', '2022-03-31', '2021-2022', 0, '1', NULL, '2024-03-09 03:19:37', NULL),
(4, '2022-04-01', '2023-03-31', '2022-2023', 0, '1', NULL, '2024-03-09 03:19:37', NULL),
(5, '2023-04-01', '2024-03-31', '2023-2024', 0, '1', NULL, '2024-03-09 03:19:37', NULL),
(6, '2024-04-01', '2025-03-31', '2024-2025', 0, '1', NULL, '2024-04-12 00:21:40', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `admission_fees`
--

CREATE TABLE `admission_fees` (
  `id` int(11) NOT NULL,
  `admission_id` int(11) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `receipt_date` date NOT NULL,
  `academic_year` varchar(50) NOT NULL,
  `other_charges` varchar(100) NOT NULL,
  `other_charges_received` varchar(100) NOT NULL,
  `scholarship` varchar(100) NOT NULL,
  `total_fees_tobe_collected` varchar(100) NOT NULL,
  `final_amount_tobe_collect` varchar(100) NOT NULL,
  `fees_collected` varchar(100) NOT NULL,
  `balance_tobe_paid` varchar(100) NOT NULL,
  `school_id` int(11) NOT NULL,
  `insert_login_id` int(11) NOT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission_fees_denomination`
--

CREATE TABLE `admission_fees_denomination` (
  `id` int(11) NOT NULL,
  `admission_fees_ref_id` varchar(150) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `ledger_ref_id` varchar(50) DEFAULT NULL,
  `no_five_hundred` varchar(100) DEFAULT NULL,
  `no_two_hundred` varchar(100) DEFAULT NULL,
  `no_hundred` varchar(100) DEFAULT NULL,
  `no_fifty` varchar(100) DEFAULT NULL,
  `no_twenty` varchar(100) DEFAULT NULL,
  `no_ten` varchar(100) DEFAULT NULL,
  `no_five` varchar(100) DEFAULT NULL,
  `total_amount` varchar(250) DEFAULT NULL,
  `cheque_number` varchar(150) DEFAULT NULL,
  `cheque_date` date NOT NULL,
  `cheque_amount` varchar(150) DEFAULT NULL,
  `cheque_bank_name` varchar(150) DEFAULT NULL,
  `neft_ref_number` varchar(150) DEFAULT NULL,
  `neft_tran_date` date NOT NULL,
  `neft_amount` varchar(150) DEFAULT NULL,
  `neft_bank_name` varchar(150) DEFAULT NULL,
  `insert_login_id` int(11) NOT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission_fees_details`
--

CREATE TABLE `admission_fees_details` (
  `id` int(11) NOT NULL,
  `admission_fees_ref_id` varchar(100) NOT NULL,
  `fees_master_id` varchar(255) NOT NULL,
  `fees_table_name` varchar(100) NOT NULL,
  `fees_id` int(11) NOT NULL,
  `fee_received` varchar(150) NOT NULL,
  `balance_tobe_paid` varchar(150) NOT NULL,
  `scholarship` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `amenity_fee`
--

CREATE TABLE `amenity_fee` (
  `amenity_fee_id` int(11) NOT NULL,
  `fee_master_id` int(11) NOT NULL,
  `amenity_particulars` varchar(150) NOT NULL,
  `amenity_amount` int(11) NOT NULL,
  `amenity_date` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `amenity_id_used` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `school_id` int(11) DEFAULT NULL,
  `year_id` varchar(100) DEFAULT NULL,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `area_creation_particulars`
--

CREATE TABLE `area_creation_particulars` (
  `particulars_id` int(11) NOT NULL,
  `area_creation_id` int(11) DEFAULT NULL,
  `particulars` varchar(50) DEFAULT NULL,
  `due_amount` varchar(50) DEFAULT NULL,
  `due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `attach_format` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) NOT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `billsettings`
--

CREATE TABLE `billsettings` (
  `id` int(11) NOT NULL,
  `billmodel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cast_details`
--

CREATE TABLE `cast_details` (
  `cast_id` int(11) NOT NULL,
  `cast_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cast_details`
--

INSERT INTO `cast_details` (`cast_id`, `cast_name`, `status`) VALUES
(1, 'Adi Andhra', 0),
(2, 'Adi Dravida', 0),
(3, 'Adi Karnataka', 0),
(4, 'Ajila', 0),
(5, 'Arunthathiyar', 0),
(6, 'Ayyanavar', 0),
(7, 'Baira', 0),
(8, 'Bakuda', 0),
(9, 'Bandi', 0),
(10, 'Bellara', 0),
(11, 'Bharatar', 0),
(12, 'Chakkiliyan', 0),
(13, 'Chalavadi', 0),
(14, 'Chamar, Muchi', 0),
(15, 'Chandala', 0),
(16, 'Cheruman', 0),
(17, 'Devendrakulathan', 0),
(18, 'Dom, Dombara, Paidi, Pane', 0),
(19, 'Domban', 0),
(20, 'Godagali', 0),
(21, 'Godda', 0),
(22, 'Gosangi', 0),
(23, 'Holeya', 0),
(24, 'Jaggali', 0),
(25, 'Jambuvulu', 0),
(26, 'Kadaiyan', 0),
(27, 'Kakkalan', 0),
(28, 'Kalladi', 0),
(29, 'Kanakkan, Padanna', 0),
(30, 'Karimpalan', 0),
(31, 'Kavara', 0),
(32, 'Koliyan', 0),
(33, 'Koosa', 0),
(34, 'Kootan, Koodan', 0),
(35, 'Kudumban', 0),
(36, 'Kuravan Sidhanar', 0),
(37, 'Madari', 0),
(38, 'Madiga', 0),
(39, 'Maila', 0),
(40, 'Mala', 0),
(41, 'Mannan', 0),
(42, 'Mavilan', 0),
(43, 'Moger', 0),
(44, 'Mundala', 0),
(45, 'Nalakeyava', 0),
(46, 'Nayadi', 0),
(47, 'Padannan', 0),
(48, 'Pagadai', 0),
(49, 'Pallan', 0),
(50, 'Palluvan', 0),
(51, 'Pambada', 0),
(52, 'Panan', 0),
(53, 'Panchama', 0),
(54, 'Pannadi', 0),
(55, 'Panniandi', 0),
(56, 'Paraiyan, Parayan, Sambavar', 0),
(57, 'Paravan', 0),
(58, 'Pathiyan', 0),
(59, 'Pulayan, Cheramar', 0),
(60, 'Puthirai Vannan', 0),
(61, 'Raneyar', 0),
(62, 'Samagara', 0),
(63, 'Samban', 0),
(64, 'Sapari', 0),
(65, 'Semman', 0),
(66, 'Thandan', 0),
(67, 'Thoti', 0),
(68, 'Tiruvalluvar', 0),
(69, 'Vallon', 0),
(70, 'Valluvan', 0),
(71, 'Vannan', 0),
(72, 'Vathiriyan', 0),
(73, 'Velen', 0),
(74, 'Vetan', 0),
(75, 'Vettiyan', 0),
(76, 'Vettuvan', 0),
(77, 'Adiyan', 0),
(78, 'Aranadan', 0),
(79, 'Eravallan', 0),
(80, 'Irular', 0),
(81, 'Kadar', 0),
(82, 'Kammara', 0),
(83, 'Kanikaran', 0),
(84, 'Kanikkar', 0),
(85, 'Kaniyan', 0),
(86, 'Kanyan', 0),
(87, 'Kattunayakan', 0),
(88, 'Kochu Velan', 0),
(89, 'Konda Kapus', 0),
(90, 'Kondareddis', 0),
(91, 'Koraga', 0),
(92, 'Kota', 0),
(93, 'Kudiya', 0),
(94, 'Kurichchan', 0),
(95, 'Kurumans', 0),
(96, 'Kurumbas', 0),
(97, 'Madugar', 0),
(98, 'Maha Malasar', 0),
(99, 'Malai Arayan', 0),
(100, 'Malai Pandaram', 0),
(101, 'MalaiVedan', 0),
(102, 'Malakkuravan', 0),
(103, 'Malasar', 0),
(104, 'Malayali', 0),
(105, 'Malayekandi', 0),
(106, 'Mannan', 0),
(107, 'Melakudi', 0),
(108, 'Muduvan', 0),
(109, 'Muthuvan', 0),
(110, 'Palleyan', 0),
(111, 'Palliyan', 0),
(112, 'Palliyar', 0),
(113, 'Paniyan', 0),
(114, 'Sholaga', 0),
(115, 'Toda', 0),
(116, 'Uraly', 0),
(117, 'Agamudayarincludingor', 0),
(118, 'ThuluvaVellala', 0),
(119, 'ThozhuVellala', 0),
(120, 'AgaramVellanChettiar', 0),
(121, 'Alwar', 0),
(122, 'Alavar', 0),
(123, 'Azhavar', 0),
(124, 'Servai', 0),
(125, 'Nulayar', 0),
(126, 'ArchakaraiVellala', 0),
(127, 'Aryavathi', 0),
(128, 'AyiraVaisyar', 0),
(129, 'Badagar', 0),
(130, 'Billava', 0),
(131, 'Bondil', 0),
(132, 'Boyas', 0),
(133, 'Pedda', 0),
(134, 'Boyar', 0),
(135, 'Oddars', 0),
(136, 'Kaloddars', 0),
(137, 'NellorepetOddars', 0),
(138, 'SooramariOddars', 0),
(139, 'Chakkala', 0),
(140, 'Chavalakarar', 0),
(141, 'Chettu', 0),
(142, 'Chetty', 0),
(143, 'Chowdry', 0),
(144, 'Donga Dasarisl', 0),
(145, 'Devangar,', 0),
(146, 'Sedar', 0),
(147, 'Dombs', 0),
(148, 'Enadi', 0),
(149, 'Ezhavathy', 0),
(150, 'Ezhuthachar', 0),
(151, 'Ezhuva', 0),
(152, 'Gangavar', 0),
(153, 'Gavara', 0),
(154, 'Gavarai', 0),
(155, 'Vadugar', 0),
(156, 'Vaduvar', 0),
(157, 'Gounder', 0),
(158, 'Gowda', 0),
(159, 'Hegde', 0),
(160, 'Idiga', 0),
(161, 'IllathuPillaimar', 0),
(162, 'Illuvar', 0),
(163, 'Ezhuvar', 0),
(164, 'Illathar', 0),
(165, 'Jhetty', 0),
(166, 'Jogis', 0),
(167, 'Kabbera', 0),
(168, 'Kaikolar', 0),
(169, 'Sengunthar', 0),
(170, 'Kaladi', 0),
(171, 'KalariKurup', 0),
(172, 'KalariPanicker', 0),
(173, 'Kalingi', 0),
(174, 'Kallar', 0),
(175, 'KootappalKallars', 0),
(176, 'PiramalaiKallars', 0),
(177, 'PeriyasooriyurKallars', 0),
(178, 'KallarKulaThondaman', 0),
(179, 'KalveliGounder', 0),
(180, 'Kambar', 0),
(181, 'Kammalar', 0),
(182, 'Viswakarmala', 0),
(183, 'Viswakarma', 0),
(184, 'Kani,', 0),
(185, 'KaniyarPanikkar', 0),
(186, 'Kanisu', 0),
(187, 'KaniyalaVellalar', 0),
(188, 'KannadaSaineegar', 0),
(189, 'Kannadiyar', 0),
(190, 'KannadiyaNaidu', 0),
(191, 'KarpooraChettiar', 0),
(192, 'Karuneegar', 0),
(193, 'KasukkaraChettiar', 0),
(194, 'Katesar', 0),
(195, 'Pattamkatti', 0),
(196, 'Kavuthiyar', 0),
(197, 'KeralaMudali', 0),
(198, 'Kharvi', 0),
(199, 'Khatri', 0),
(200, 'KonguVaishnava', 0),
(201, 'KonguVellalar', 0),
(202, 'KoppalaVelama', 0),
(203, 'Koteyar', 0),
(204, 'Krishnanvaka', 0),
(205, 'KudikaraVellalar', 0),
(206, 'Kudumbi', 0),
(207, 'KugaVellalar', 0),
(208, 'Kunchidigar', 0),
(209, 'Lambadi', 0),
(210, 'Lingayat', 0),
(211, 'Jangama', 0),
(212, 'Mahratta(Non-Brahmin)(includingNamdevMahratta)', 0),
(213, 'Malayar', 0),
(214, 'Male', 0),
(215, 'Maniagar', 0),
(216, 'Maravars', 0),
(217, 'Moondru mandai Embathunalu UrSozhia Vellalar', 0),
(218, 'Mooppan', 0),
(219, 'Muthuraja', 0),
(220, 'Muthuracha', 0),
(221, 'Muttiriyar', 0),
(222, 'Mutharaiyar', 0),
(223, 'Nadar', 0),
(224, 'Gramani', 0),
(225, 'ChiristianGramani', 0),
(226, 'ChristianShanar', 0),
(227, 'ChiristianNadar', 0),
(228, 'Shanar', 0),
(229, 'Nagaram', 0),
(230, 'Naikkar', 0),
(231, 'NangudiVellalar', 0),
(232, 'NanjilMudali', 0),
(233, 'Odar', 0),
(234, 'Odiya', 0),
(235, 'OottruvalanattuVellalar', 0),
(236, 'OPSVellalar', 0),
(237, 'Ovachar', 0),
(238, 'PaiyurKottaVellalar', 0),
(239, 'Pamulu', 0),
(240, 'Panar', 0),
(241, 'Omitted', 0),
(242, 'Kathikarar (in Kanyakumari District)', 0),
(243, 'PannirandamChettiar', 0),
(244, 'UthamaChettiar', 0),
(245, 'Parkavakulam', 0),
(246, 'Perike', 0),
(247, 'PerikeBalija', 0),
(248, 'Perumkollar', 0),
(249, 'PodikaraVellalar', 0),
(250, 'PooluvaGounder', 0),
(251, 'Poraya', 0),
(252, 'Pulavar (in Coimbatoreand Erode Districts)', 0),
(253, 'Pulluvar', 0),
(254, 'Pooluvar', 0),
(255, 'Pusala', 0),
(256, 'Reddy', 0),
(257, 'Ganjam', 0),
(258, 'SadhuChetty', 0),
(259, 'Sakkaravar', 0),
(260, 'Kavathi', 0),
(261, 'Salivagana', 0),
(262, 'Saliyar', 0),
(263, 'Adhaviyar', 0),
(264, 'Pattariyar', 0),
(265, 'Pattusaliyar', 0),
(266, 'Padmasaliyar', 0),
(267, 'Savalakkarar', 0),
(268, 'Senaithalaivar', 0),
(269, 'Illaivaniar', 0),
(270, 'Senaikudiyar', 0),
(271, 'Sourashtra', 0),
(272, 'Patnulkarar', 0),
(273, 'Sozhiavellalar', 0),
(274, 'Srisayar', 0),
(275, 'SundaramChetty', 0),
(276, 'ThogattaVeerakshatriya', 0),
(277, 'Tholkollar', 0),
(278, 'TholuvaNaicker', 0),
(279, 'VetalakaraNaicker', 0),
(280, 'Thoriyar', 0),
(281, 'Ukkirakula Kshatriya Naicker', 0),
(282, 'Uppara', 0),
(283, 'Sagara', 0),
(284, 'Uppillia', 0),
(285, 'UraliGounder', 0),
(286, 'UrikkaraNayakkar', 0),
(287, 'Vallambar', 0),
(288, 'Valmiki', 0),
(289, 'Vaniyar', 0),
(290, 'Vania Chettiar', 0),
(291, 'Veduvar', 0),
(292, 'Vedar', 0),
(293, 'Veerasaiva', 0),
(294, 'Velar', 0),
(295, 'VellanChettiar', 0),
(296, 'VeluthodathuNair', 0),
(297, 'Vokkaligar', 0),
(298, 'WynadChetty', 0),
(299, 'Yadhava', 0),
(300, 'Yavana', 0),
(301, 'Yerukula', 0),
(302, 'Orphansand', 0),
(303, 'Destitutechildren', 0),
(304, 'SerakulaVellalar', 0),
(305, 'VirakodiVellala', 0),
(306, 'Vallanattu Chettiar', 0),
(307, 'APandiyaVellalar', 0),
(308, 'Dommars', 0),
(309, 'Ansar', 0),
(310, 'Dekkani Muslims', 0),
(311, 'Dudekula', 0),
(312, 'Labbais', 0),
(313, 'Rowthar', 0),
(314, 'Marakayar', 0),
(315, 'Mapilla', 0),
(316, 'Sheik', 0),
(317, 'Syed', 0),
(318, 'Ambalakarar', 0),
(319, 'Andipandaram', 0),
(320, 'Bestha,', 0),
(321, 'Siviar', 0),
(322, 'Bhatraju ', 0),
(323, 'Boyar,', 0),
(324, 'Oddar', 0),
(325, 'Dasari', 0),
(326, 'Dommara', 0),
(327, 'Eravallar', 0),
(328, 'Isaivellalar', 0),
(329, 'Jambuvanodai', 0),
(330, 'Jangam', 0),
(331, 'Jogi', 0),
(332, 'Kongu Chettiar', 0),
(333, 'Koracha', 0),
(334, 'Kulala ', 0),
(335, 'Kunnuvar Mannadi', 0),
(336, 'Kurumba', 0),
(337, 'Kuruhini Chetty', 0),
(338, 'Maruthuvar', 0),
(339, 'Pronopakari', 0),
(340, 'Velakatalanair', 0),
(341, 'Mangala,', 0),
(342, 'Navithar', 0),
(343, 'Velakattalavar,', 0),
(344, 'Mond Golla', 0),
(345, 'Moundadan Chetty', 0),
(346, 'Mahendra,', 0),
(347, 'Medara', 0),
(348, 'Mutlakampatti', 0),
(349, 'Narikoravar', 0),
(350, 'Nokkar', 0),
(351, 'Vanniakula Kshatriya', 0),
(352, 'Paravar', 0),
(353, 'Meenavar', 0),
(354, 'Mukkuvar or', 0),
(355, 'Mukayar', 0),
(356, 'Punnan Vettuva Gounder', 0),
(357, 'Pannayar', 0),
(358, 'Sathatha Srivaishnava', 0),
(359, 'Sozhia Chetty', 0),
(360, 'Telugupatty Chetty', 0),
(361, 'Thottia Naicker', 0),
(362, 'Thondaman', 0),
(363, 'Valaiyar', 0),
(364, 'Vannar', 0),
(365, 'Vettaikarar', 0),
(366, 'Vettuva Gounder', 0),
(367, 'Yogeeswarar', 0),
(368, 'Attur Kilnad Koravars', 0),
(369, 'Attur Melnad Koravars', 0),
(370, 'Appanad Kondayam kottai Maravar', 0),
(371, 'Ambalakarar', 0),
(372, 'Ambalakkarar', 0),
(373, 'Boyas', 0),
(374, 'Battu Turkas', 0),
(375, 'C.K. Koravars', 0),
(376, 'Chakkala', 0),
(377, 'Changyampudi Koravars', 0),
(378, 'Chettinad Valayars', 0),
(379, 'Dombs', 0),
(380, 'Dobba Koravars', 0),
(381, 'Donga Boya', 0),
(382, 'Donga Ur.Korachas', 0),
(383, 'Devagudi Talayaris', 0),
(384, 'Dobbai Korachas', 0),
(385, 'Dabi Koravars', 0),
(386, 'Donga Dasaris', 0),
(387, 'Gorrela Dodda Boya', 0),
(388, 'Gudu Dasaris', 0),
(389, 'Gandarvakottai Koravars', 0),
(390, 'Gandarvakottai Kallars', 0),
(391, 'Inji Koravars', 0),
(392, 'Jogis', 0),
(393, 'Jambavanodai', 0),
(394, 'Kaladis', 0),
(395, 'Kal Oddars', 0),
(396, 'Koravars', 0),
(397, 'Kalinji Dabikoravars', 0),
(398, 'Kootappal Kallars', 0),
(399, 'Kala Koravars', 0),
(400, 'Kalavathila Boyas', 0),
(401, 'Kepmaris', 0),
(402, 'Maravars', 0),
(403, 'Monda Koravars', 0),
(404, 'Monda Golla', 0),
(405, 'Mutlakampatti', 0),
(406, 'Nokkars', 0),
(407, 'Nellorepet Oddars', 0),
(408, 'Oddars', 0),
(409, 'Pedda Boyas', 0),
(410, 'Ponnai Koravars (', 0),
(411, 'Piramalai Kallars', 0),
(412, 'Peria Suriyur Kallars', 0),
(413, 'Padayachi', 0),
(414, 'Punnan Vettuva Gounder', 0),
(415, 'Servai', 0),
(416, 'Salem Melnad Koravars', 0),
(417, 'Salem Uppu Koravars', 0),
(418, 'Sakkaraithamadai Koravars', 0),
(419, 'Saranga Palli Koravars', 0),
(420, 'Sooramari Oddars', 0),
(421, 'Sembanad Maravars', 0),
(422, 'Thalli Koravars', 0),
(423, 'Telungapattti Chettis', 0),
(424, 'Thottia Naickers', 0),
(425, 'Thogamalai Koravars', 0),
(426, 'Kepmaris', 0),
(427, 'Uppukoravars or', 0),
(428, 'Settipalli Koravars', 0),
(429, 'Urali Gounders', 0),
(430, 'Wayalpad or Nawalpeta Korachas', 0),
(431, 'Vaduvarpatti Koravars', 0),
(432, 'Valayars', 0),
(433, 'Vettaikarar', 0),
(434, 'Vetta Koravars (Salem and Namakkal Districts)', 0),
(435, 'Varaganeri Koravars', 0),
(436, 'Vettuva Gounder', 0);

-- --------------------------------------------------------

--
-- Table structure for table `conduct_certificate`
--

CREATE TABLE `conduct_certificate` (
  `conduct_id` int(11) NOT NULL,
  `admission_number` varchar(250) DEFAULT NULL,
  `student_name` varchar(250) DEFAULT NULL,
  `school_name` varchar(250) DEFAULT NULL,
  `school_address` varchar(250) DEFAULT NULL,
  `studied_from` varchar(250) DEFAULT NULL,
  `studied_to` varchar(250) DEFAULT NULL,
  `academic_year_from` varchar(250) DEFAULT NULL,
  `academic_year_to` varchar(250) DEFAULT NULL,
  `place` varchar(250) DEFAULT NULL,
  `student_character` varchar(250) DEFAULT NULL,
  `phone_number` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `costcentre`
--

CREATE TABLE `costcentre` (
  `costcentreid` int(11) NOT NULL,
  `costcentrename` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_student_creation`
--

CREATE TABLE `deleted_student_creation` (
  `deleted_student_id` int(11) NOT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extra_curricular_activities_fee`
--

CREATE TABLE `extra_curricular_activities_fee` (
  `extra_fee_id` int(11) NOT NULL,
  `fee_master_id` int(11) NOT NULL,
  `extra_particulars` varchar(150) NOT NULL,
  `extra_amount` varchar(50) NOT NULL,
  `extra_date` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `extra_id_used` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_concession`
--

CREATE TABLE `fees_concession` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `scholarship_header` varchar(100) NOT NULL,
  `scholarship_amount` varchar(255) NOT NULL,
  `fees_master_id` varchar(255) NOT NULL,
  `fees_table_name` varchar(150) NOT NULL,
  `fees_id` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `concession_type` varchar(50) NOT NULL,
  `academic_year` varchar(100) NOT NULL,
  `school_id` varchar(100) NOT NULL,
  `insert_login_id` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `grp_ledger_name` varchar(250) DEFAULT NULL,
  `extra_ledger_name` varchar(250) DEFAULT NULL,
  `amenity_ledger_name` varchar(250) DEFAULT NULL,
  `temp_flat_no` varchar(250) DEFAULT NULL,
  `temp_street` varchar(250) DEFAULT NULL,
  `temp_district` varchar(250) DEFAULT NULL,
  `temp_area` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `grp_status` int(11) NOT NULL DEFAULT 0,
  `extra_status` int(11) NOT NULL DEFAULT 0,
  `amenity_status` int(11) NOT NULL DEFAULT 0,
  `school_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `general_message`
--

CREATE TABLE `general_message` (
  `id` int(11) NOT NULL,
  `standard_id` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `char_count` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  `academic_year` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_course_fee`
--

CREATE TABLE `group_course_fee` (
  `grp_course_id` int(11) NOT NULL,
  `fee_master_id` int(11) NOT NULL,
  `grp_particulars` varchar(150) NOT NULL,
  `grp_amount` varchar(150) NOT NULL,
  `grp_date` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `grp_id_used` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `academic_year` varchar(100) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_work_message`
--

CREATE TABLE `home_work_message` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `char_count` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  `academic_year` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `last_year_fees`
--

CREATE TABLE `last_year_fees` (
  `id` int(11) NOT NULL,
  `admission_id` varchar(255) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `receipt_date` date NOT NULL,
  `academic_year` varchar(50) NOT NULL,
  `other_charges` varchar(255) NOT NULL,
  `other_charges_received` varchar(255) NOT NULL,
  `scholarship` varchar(255) NOT NULL,
  `total_fees_tobe_collected` varchar(255) NOT NULL,
  `final_amount_tobe_collect` varchar(255) NOT NULL,
  `fees_collected` varchar(255) NOT NULL,
  `balance_tobe_paid` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL,
  `insert_login_id` int(11) NOT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `last_year_fees_denomination`
--

CREATE TABLE `last_year_fees_denomination` (
  `id` int(11) NOT NULL,
  `admission_fees_ref_id` varchar(150) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `ledger_ref_id` varchar(50) DEFAULT NULL,
  `no_five_hundred` varchar(100) DEFAULT NULL,
  `no_two_hundred` varchar(100) DEFAULT NULL,
  `no_hundred` varchar(100) DEFAULT NULL,
  `no_fifty` varchar(100) DEFAULT NULL,
  `no_twenty` varchar(100) DEFAULT NULL,
  `no_ten` varchar(100) DEFAULT NULL,
  `no_five` varchar(100) DEFAULT NULL,
  `total_amount` varchar(250) DEFAULT NULL,
  `cheque_number` varchar(150) DEFAULT NULL,
  `cheque_date` date NOT NULL,
  `cheque_amount` varchar(150) DEFAULT NULL,
  `cheque_bank_name` varchar(150) DEFAULT NULL,
  `neft_ref_number` varchar(150) DEFAULT NULL,
  `neft_tran_date` date NOT NULL,
  `neft_amount` varchar(150) DEFAULT NULL,
  `neft_bank_name` varchar(150) DEFAULT NULL,
  `insert_login_id` int(11) NOT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `last_year_fees_details`
--

CREATE TABLE `last_year_fees_details` (
  `id` int(11) NOT NULL,
  `admission_fees_ref_id` varchar(100) NOT NULL,
  `fees_master_id` varchar(255) NOT NULL,
  `fees_table_name` varchar(100) NOT NULL,
  `fees_id` varchar(255) NOT NULL,
  `fee_received` varchar(150) NOT NULL,
  `balance_tobe_paid` varchar(150) NOT NULL,
  `scholarship` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `last_year_fees_master`
--

CREATE TABLE `last_year_fees_master` (
  `last_year_fees_master_id` int(11) NOT NULL,
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
  `openingbalance` int(11) DEFAULT 0,
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

-- --------------------------------------------------------

--
-- Table structure for table `pay_fees`
--

CREATE TABLE `pay_fees` (
  `pay_fees_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `grp_fees_id` varchar(250) DEFAULT NULL,
  `extra_fees_id` varchar(250) DEFAULT NULL,
  `amenity_fees_id` varchar(250) DEFAULT NULL,
  `receipt_number` varchar(250) DEFAULT NULL,
  `receipt_date` varchar(250) DEFAULT NULL,
  `register_number` varchar(250) DEFAULT NULL,
  `academic_year` varchar(250) DEFAULT NULL,
  `standard` varchar(250) DEFAULT NULL,
  `grp_particulars` varchar(250) DEFAULT NULL,
  `grp_concession_amount` varchar(250) DEFAULT NULL,
  `extra_concession_amount` varchar(250) DEFAULT NULL,
  `amenity_concession_amount` varchar(250) DEFAULT NULL,
  `grp_amount` varchar(255) DEFAULT NULL,
  `amount_recieved` varchar(250) DEFAULT NULL,
  `amount_balance` varchar(250) DEFAULT NULL,
  `extra_particulars` varchar(250) DEFAULT NULL,
  `extra_amount` varchar(250) DEFAULT NULL,
  `extra_amount_recieved` varchar(255) DEFAULT NULL,
  `extra_amount_balance` varchar(250) DEFAULT NULL,
  `amenity_particulars` varchar(250) DEFAULT NULL,
  `amenity_amount` varchar(250) DEFAULT NULL,
  `amenity_amount_recieved` varchar(250) DEFAULT NULL,
  `amenity_amount_balance` varchar(250) DEFAULT NULL,
  `other_charges_recieved` varchar(250) DEFAULT NULL,
  `other_charges` varchar(250) DEFAULT NULL,
  `fees_total` varchar(250) DEFAULT NULL,
  `grp_remarks` text DEFAULT NULL,
  `extra_remarks` varchar(250) DEFAULT NULL,
  `amenity_remarks` varchar(250) DEFAULT NULL,
  `fees_scholarship` varchar(250) DEFAULT NULL,
  `final_amount_recieved` varchar(250) DEFAULT NULL,
  `fees_collected` varchar(250) DEFAULT NULL,
  `fees_balance` varchar(250) DEFAULT NULL,
  `collection_info` varchar(250) DEFAULT NULL,
  `qty1` varchar(250) DEFAULT NULL,
  `qty2` varchar(250) DEFAULT NULL,
  `qty3` varchar(250) DEFAULT NULL,
  `qty4` varchar(250) DEFAULT NULL,
  `qty5` varchar(250) DEFAULT NULL,
  `qty6` varchar(250) DEFAULT NULL,
  `qty7` varchar(250) DEFAULT NULL,
  `unit1` varchar(250) DEFAULT NULL,
  `unit2` varchar(250) DEFAULT NULL,
  `unit3` varchar(250) DEFAULT NULL,
  `unit4` varchar(250) DEFAULT NULL,
  `unit5` varchar(250) DEFAULT NULL,
  `unit6` varchar(250) DEFAULT NULL,
  `unit7` varchar(250) DEFAULT NULL,
  `amount1` varchar(250) DEFAULT NULL,
  `amount2` varchar(250) DEFAULT NULL,
  `amount3` varchar(250) DEFAULT NULL,
  `amount4` varchar(250) DEFAULT NULL,
  `amount5` varchar(250) DEFAULT NULL,
  `amount6` varchar(250) DEFAULT NULL,
  `amount7` varchar(250) DEFAULT NULL,
  `result` varchar(250) DEFAULT NULL,
  `cheque_number` varchar(250) DEFAULT NULL,
  `cheque_amount` varchar(250) DEFAULT NULL,
  `cheque_date` varchar(250) DEFAULT NULL,
  `cheque_bank_name` varchar(250) DEFAULT NULL,
  `cheque_ledger_name` varchar(250) DEFAULT NULL,
  `neft_number` varchar(250) DEFAULT NULL,
  `neft_amount` varchar(250) DEFAULT NULL,
  `neft_date` varchar(250) DEFAULT NULL,
  `neft_bank_name` varchar(250) DEFAULT NULL,
  `neft_ledger_name` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `school_id` int(11) NOT NULL,
  `approvedstatus` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_fees_ref`
--

CREATE TABLE `pay_fees_ref` (
  `pay_fees_reff_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `pay_fees_id` int(11) DEFAULT NULL,
  `receipt_number` varchar(250) DEFAULT NULL,
  `final_fees_total` varchar(250) DEFAULT NULL,
  `final_concession_fees_total` varchar(250) DEFAULT NULL,
  `final_received_fees_total` varchar(250) DEFAULT NULL,
  `final_fees_collected` varchar(250) DEFAULT NULL,
  `final_fees_balance` varchar(250) DEFAULT NULL,
  `grp_fees_total` varchar(250) DEFAULT NULL,
  `extra_fees_total` varchar(250) DEFAULT NULL,
  `amenity_fees_total` varchar(250) DEFAULT NULL,
  `amenity_fees_total_received` varchar(250) DEFAULT NULL,
  `extra_fees_total_received` varchar(250) DEFAULT NULL,
  `grp_fees_total_received` varchar(250) DEFAULT NULL,
  `grp_fees_balance` int(11) DEFAULT NULL,
  `extra_fees_balance` int(11) DEFAULT NULL,
  `amenity_fees_balance` int(11) DEFAULT NULL,
  `grp_concession_fees` varchar(250) DEFAULT NULL,
  `extra_concession_fees` varchar(250) DEFAULT NULL,
  `amenity_concession_fees` varchar(250) DEFAULT NULL,
  `grp_fees_id` varchar(250) DEFAULT NULL,
  `extra_fees_id` varchar(250) DEFAULT NULL,
  `amenity_fees_id` varchar(250) DEFAULT NULL,
  `grp_particulars` varchar(250) DEFAULT NULL,
  `grp_amount` varchar(250) DEFAULT NULL,
  `amount_recieved` varchar(250) DEFAULT NULL,
  `extra_particulars` varchar(250) DEFAULT NULL,
  `extra_amount` varchar(250) DEFAULT NULL,
  `extra_amount_recieved` varchar(250) DEFAULT NULL,
  `amenity_particulars` varchar(250) DEFAULT NULL,
  `amenity_amount` varchar(250) DEFAULT NULL,
  `amenity_amount_recieved` varchar(250) DEFAULT NULL,
  `grp_concession_amount` varchar(250) DEFAULT NULL,
  `extra_concession_amount` varchar(250) DEFAULT NULL,
  `amenity_concession_amount` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `approvedstatus` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_last_year_fees`
--

CREATE TABLE `pay_last_year_fees` (
  `pay_last_year_fees_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `grp_fees_id` varchar(250) DEFAULT NULL,
  `extra_fees_id` varchar(250) DEFAULT NULL,
  `amenity_fees_id` varchar(250) DEFAULT NULL,
  `receipt_number` varchar(250) DEFAULT NULL,
  `receipt_date` varchar(250) DEFAULT NULL,
  `register_number` varchar(250) DEFAULT NULL,
  `academic_year` varchar(250) DEFAULT NULL,
  `standard` varchar(250) DEFAULT NULL,
  `grp_particulars` varchar(250) DEFAULT NULL,
  `grp_concession_amount` varchar(250) DEFAULT NULL,
  `extra_concession_amount` varchar(250) DEFAULT NULL,
  `amenity_concession_amount` varchar(250) DEFAULT NULL,
  `grp_amount` varchar(255) DEFAULT NULL,
  `amount_recieved` varchar(250) DEFAULT NULL,
  `amount_balance` varchar(250) DEFAULT NULL,
  `extra_particulars` varchar(250) DEFAULT NULL,
  `extra_amount` varchar(250) DEFAULT NULL,
  `extra_amount_recieved` varchar(255) DEFAULT NULL,
  `extra_amount_balance` varchar(250) DEFAULT NULL,
  `amenity_particulars` varchar(250) DEFAULT NULL,
  `amenity_amount` varchar(250) DEFAULT NULL,
  `amenity_amount_recieved` varchar(250) DEFAULT NULL,
  `amenity_amount_balance` varchar(250) DEFAULT NULL,
  `other_charges_recieved` varchar(250) DEFAULT NULL,
  `other_charges` varchar(250) DEFAULT NULL,
  `fees_total` varchar(250) DEFAULT NULL,
  `grp_remarks` text DEFAULT NULL,
  `extra_remarks` varchar(250) DEFAULT NULL,
  `amenity_remarks` varchar(250) DEFAULT NULL,
  `fees_scholarship` varchar(250) DEFAULT NULL,
  `final_amount_recieved` varchar(250) DEFAULT NULL,
  `fees_collected` varchar(250) DEFAULT NULL,
  `fees_balance` varchar(250) DEFAULT NULL,
  `collection_info` varchar(250) DEFAULT NULL,
  `qty1` varchar(250) DEFAULT NULL,
  `qty2` varchar(250) DEFAULT NULL,
  `qty3` varchar(250) DEFAULT NULL,
  `qty4` varchar(250) DEFAULT NULL,
  `qty5` varchar(250) DEFAULT NULL,
  `qty6` varchar(250) DEFAULT NULL,
  `qty7` varchar(250) DEFAULT NULL,
  `unit1` varchar(250) DEFAULT NULL,
  `unit2` varchar(250) DEFAULT NULL,
  `unit3` varchar(250) DEFAULT NULL,
  `unit4` varchar(250) DEFAULT NULL,
  `unit5` varchar(250) DEFAULT NULL,
  `unit6` varchar(250) DEFAULT NULL,
  `unit7` varchar(250) DEFAULT NULL,
  `amount1` varchar(250) DEFAULT NULL,
  `amount2` varchar(250) DEFAULT NULL,
  `amount3` varchar(250) DEFAULT NULL,
  `amount4` varchar(250) DEFAULT NULL,
  `amount5` varchar(250) DEFAULT NULL,
  `amount6` varchar(250) DEFAULT NULL,
  `amount7` varchar(250) DEFAULT NULL,
  `result` varchar(250) DEFAULT NULL,
  `cheque_number` varchar(250) DEFAULT NULL,
  `cheque_amount` varchar(250) DEFAULT NULL,
  `cheque_date` varchar(250) DEFAULT NULL,
  `cheque_bank_name` varchar(250) DEFAULT NULL,
  `cheque_ledger_name` varchar(250) DEFAULT NULL,
  `neft_number` varchar(250) DEFAULT NULL,
  `neft_amount` varchar(250) DEFAULT NULL,
  `neft_date` varchar(250) DEFAULT NULL,
  `neft_bank_name` varchar(250) DEFAULT NULL,
  `neft_ledger_name` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `approvedstatus` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_last_year_fees_ref`
--

CREATE TABLE `pay_last_year_fees_ref` (
  `pay_last_year_fees_reff_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `pay_last_year_fees_id` int(11) DEFAULT NULL,
  `final_fees_total` varchar(250) DEFAULT NULL,
  `final_concession_fees_total` varchar(250) DEFAULT NULL,
  `final_received_fees_total` varchar(250) DEFAULT NULL,
  `final_fees_collected` varchar(250) DEFAULT NULL,
  `final_fees_balance` varchar(250) DEFAULT NULL,
  `grp_fees_total` varchar(250) DEFAULT NULL,
  `extra_fees_total` varchar(250) DEFAULT NULL,
  `amenity_fees_total` varchar(250) DEFAULT NULL,
  `amenity_fees_total_received` varchar(250) DEFAULT NULL,
  `extra_fees_total_received` varchar(250) DEFAULT NULL,
  `grp_fees_total_received` varchar(250) DEFAULT NULL,
  `grp_fees_balance` int(11) DEFAULT NULL,
  `extra_fees_balance` int(11) DEFAULT NULL,
  `amenity_fees_balance` int(11) DEFAULT NULL,
  `grp_concession_fees` varchar(250) DEFAULT NULL,
  `extra_concession_fees` varchar(250) DEFAULT NULL,
  `amenity_concession_fees` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `approvedstatus` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_transport_fees`
--

CREATE TABLE `pay_transport_fees` (
  `pay_transport_fees_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `transport_fees_master_id` varchar(250) DEFAULT NULL,
  `receipt_number` varchar(250) DEFAULT NULL,
  `receipt_date` varchar(250) DEFAULT NULL,
  `register_number` varchar(250) DEFAULT NULL,
  `academic_year` varchar(250) DEFAULT NULL,
  `standard` varchar(250) DEFAULT NULL,
  `grp_particulars` varchar(250) DEFAULT NULL,
  `transport_concession_amount` varchar(250) DEFAULT NULL,
  `grp_amount` varchar(255) DEFAULT NULL,
  `amount_recieved` varchar(250) DEFAULT NULL,
  `amount_balance` varchar(250) DEFAULT NULL,
  `fees_total` varchar(250) DEFAULT NULL,
  `final_amount_recieved` varchar(250) DEFAULT NULL,
  `fees_collected` varchar(250) DEFAULT NULL,
  `fees_balance` varchar(250) DEFAULT NULL,
  `collection_info` varchar(250) DEFAULT NULL,
  `qty1` varchar(250) DEFAULT NULL,
  `qty2` varchar(250) DEFAULT NULL,
  `qty3` varchar(250) DEFAULT NULL,
  `qty4` varchar(250) DEFAULT NULL,
  `qty5` varchar(250) DEFAULT NULL,
  `qty6` varchar(250) DEFAULT NULL,
  `qty7` varchar(250) DEFAULT NULL,
  `unit1` varchar(250) DEFAULT NULL,
  `unit2` varchar(250) DEFAULT NULL,
  `unit3` varchar(250) DEFAULT NULL,
  `unit4` varchar(250) DEFAULT NULL,
  `unit5` varchar(250) DEFAULT NULL,
  `unit6` varchar(250) DEFAULT NULL,
  `unit7` varchar(250) DEFAULT NULL,
  `amount1` varchar(250) DEFAULT NULL,
  `amount2` varchar(250) DEFAULT NULL,
  `amount3` varchar(250) DEFAULT NULL,
  `amount4` varchar(250) DEFAULT NULL,
  `amount5` varchar(250) DEFAULT NULL,
  `amount6` varchar(250) DEFAULT NULL,
  `amount7` varchar(250) DEFAULT NULL,
  `result` varchar(250) DEFAULT NULL,
  `cheque_number` varchar(250) DEFAULT NULL,
  `cheque_amount` varchar(250) DEFAULT NULL,
  `cheque_date` varchar(250) DEFAULT NULL,
  `cheque_bank_name` varchar(250) DEFAULT NULL,
  `cheque_ledger_name` varchar(250) DEFAULT NULL,
  `neft_number` varchar(250) DEFAULT NULL,
  `neft_amount` varchar(250) DEFAULT NULL,
  `neft_date` varchar(250) DEFAULT NULL,
  `neft_bank_name` varchar(250) DEFAULT NULL,
  `neft_ledger_name` varchar(250) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `transport_remark` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `approvedstatus` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE `purchaseorder` (
  `purchase_id` int(11) NOT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `bill_number` varchar(255) DEFAULT NULL,
  `bill_date` varchar(255) DEFAULT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `total_value` varchar(255) DEFAULT NULL,
  `sub_quantity` varchar(255) DEFAULT NULL,
  `unit_amount` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `createddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorderref`
--

CREATE TABLE `purchaseorderref` (
  `pur_ref_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT '0',
  `rate` varchar(255) DEFAULT '0',
  `total` varchar(255) DEFAULT '0',
  `purchase_id` int(11) NOT NULL,
  `createddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE `purpose` (
  `purposeid` int(11) NOT NULL,
  `purposename` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral_details`
--

CREATE TABLE `referral_details` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `referral_type` varchar(100) NOT NULL,
  `ref_student_id` varchar(255) DEFAULT NULL,
  `ref_staff_id` varchar(255) DEFAULT NULL,
  `referred_by` varchar(255) NOT NULL,
  `ref_code` varchar(255) NOT NULL,
  `approved` varchar(50) NOT NULL,
  `others_amount` varchar(255) DEFAULT NULL,
  `others_receiving_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `pincode` varchar(10) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `web_url` varchar(200) DEFAULT NULL,
  `school_logo` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `year_id` varchar(100) DEFAULT NULL,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_creation`
--

INSERT INTO `school_creation` (`school_id`, `school_name`, `school_login_name`, `district`, `address1`, `address2`, `address3`, `state`, `pincode`, `contact_number`, `email_id`, `web_url`, `school_logo`, `status`, `year_id`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, 'ABCD', 'ABCD', 'Pondy', 'Pondy', '', NULL, '1', '600015', '8220091100', 'feather@gmail.com', '', 'tree-736885__480.jpg', 0, '2023-2024', 1, 1, NULL, '2023-12-02 14:43:44', '2023-12-02 14:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `sms_template`
--

CREATE TABLE `sms_template` (
  `sms_template_id` int(11) NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `template_id` varchar(255) NOT NULL,
  `template` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) NOT NULL,
  `update_login_id` int(11) NOT NULL,
  `delete_login_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sms_template`
--

INSERT INTO `sms_template` (`sms_template_id`, `template_name`, `template_id`, `template`, `status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, 'working day', '0', 'அன்பார்ந்த பெற்றோர்களுக்கு, வணக்கம் 🙏. நாளை {#var#} , பள்ளி முழு வேலை நாள் என்பதை, தெரிவித்துக் கொள்கிறோம். நன்றி . தலைமை ஆசிரியர் -VPHSS', 0, 1, 0, 0, '2024-04-25 16:47:10', '2024-04-25 16:47:10'),
(2, 'scholarship alert', '1707171404603580718', '{#var#} வகுப்பு மாணவர்களின் கவனத்திற்கு, \"{#var#} \" படிவத்தை பூர்த்தி செய்து சமர்பிக்ககாத மாணவர்கள் தாமதமின்றி பூர்த்தி செய்து சமர்ப்பிக்குமாறு அன்புடன் கேட்டுக்கொள்கிறோம். தலைமையாசிரியர் வித்யா பார்த்தி மேல்நிலைப்பள்ளி திண்டுக்கல்.- VPHSS', 0, 1, 0, 0, '2024-04-25 16:47:10', '2024-04-25 16:47:10'),
(3, 'From VPHSS BW', '0', 'Dear student {#var#}, today is a {#var#} for you. vidhya parthi higher secondary school {#var#}.', 0, 1, 0, 0, '2024-04-25 16:51:08', '2024-04-25 16:51:08'),
(4, 'From VPHSS TBW', '0', 'அன்புள்ள மாணவர் {#var#}, இன்று உங்களுக்கு {#var#} வித்யா பார்த்தி மேல்நிலைப்பள்ளி சார்பாக {#var#}. {#var#}. -VPHSS', 0, 1, 0, 0, '2024-04-25 16:51:08', '2024-04-25 16:51:08'),
(5, 'leave', '0', 'அன்பார்ந்த பெற்றோர்களுக்கு, வணக்கம் 🙏. நாளை {#var#} , பள்ளி விடுமுறை என்பதை, தெரிவித்துக் கொள்கிறோம். நன்றி. -தலைமை ஆசிரியர் -VPHSS', 0, 1, 0, 0, '2024-04-25 16:56:48', '2024-04-25 16:56:48');

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
  `area_id` int(11) DEFAULT NULL,
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
  `school_id` int(11) DEFAULT NULL,
  `year_id` varchar(100) DEFAULT NULL,
  `deleted_staff` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_general_message`
--

CREATE TABLE `staff_general_message` (
  `id` int(11) NOT NULL,
  `staff_designation` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `char_count` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  `academic_year` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `standard_creation`
--

CREATE TABLE `standard_creation` (
  `standard_id` int(11) NOT NULL,
  `standard` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `standard_creation`
--

INSERT INTO `standard_creation` (`standard_id`, `standard`, `status`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, 'PRE.K.G', 0, 1, NULL, NULL, '2023-12-02 16:18:16', NULL),
(2, 'L.K.G', 0, 1, NULL, NULL, '2023-12-02 16:18:16', NULL),
(3, 'U.K.G', 0, 1, NULL, NULL, '2023-12-02 16:18:16', NULL),
(4, 'I', 0, 1, NULL, NULL, '2023-12-02 16:18:16', NULL),
(5, 'II', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(6, 'III', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(7, 'IV', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(8, 'V', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(9, 'VI', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(10, 'VII', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(11, 'VIII', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(12, 'IX', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(13, 'X', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(14, 'XI_Maths_Biology', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(15, 'XI_Maths_ComputerScience', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(16, 'XI_Biology_ComputerScience', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(17, 'XI_Commerce_ComputerScience', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(18, 'XI_All', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(19, 'XII_Maths_Biology', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(20, 'XII_Maths_ComputerScience', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(21, 'XII_Biology_ComputerScience', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(22, 'XII_Commerce_ComputerScience', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL),
(23, 'XII_All', 0, 1, NULL, NULL, '2023-12-02 16:18:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state_creation`
--

CREATE TABLE `state_creation` (
  `id` int(11) NOT NULL,
  `state` varchar(200) NOT NULL,
  `state_code` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state_creation`
--

INSERT INTO `state_creation` (`id`, `state`, `state_code`, `status`) VALUES
(1, 'Tamil Nadu', 0, 0),
(2, 'Pondicherry', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_issuance`
--

CREATE TABLE `stock_issuance` (
  `stock_issuance_id` int(11) NOT NULL,
  `stock_issuance_to` varchar(255) DEFAULT NULL,
  `si_number` varchar(255) DEFAULT NULL,
  `si_date` varchar(255) DEFAULT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `total_value` varchar(255) DEFAULT NULL,
  `sub_quantity` varchar(255) DEFAULT NULL,
  `unit_amount` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `createddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_issuance_ref`
--

CREATE TABLE `stock_issuance_ref` (
  `stock_issuance_ref_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT '0',
  `rate` varchar(255) DEFAULT '0',
  `total` varchar(255) DEFAULT '0',
  `stock_issuance_id` int(11) NOT NULL,
  `createddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_birthday_wishes`
--

CREATE TABLE `student_birthday_wishes` (
  `id` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `char_count` int(255) NOT NULL,
  `status` int(11) NOT NULL,
  `userid` varchar(150) NOT NULL,
  `school_id` int(11) NOT NULL,
  `academic_year` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_creation`
--

CREATE TABLE `student_creation` (
  `student_id` int(11) NOT NULL,
  `temp_admission_id` int(11) DEFAULT NULL,
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
  `father_image` varchar(50) DEFAULT NULL,
  `mother_image` varchar(50) DEFAULT NULL,
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
  `referencecat` text DEFAULT NULL,
  `refstaffid` text DEFAULT NULL,
  `refstudentid` text DEFAULT NULL,
  `refoldstudentid` text DEFAULT NULL,
  `referencecatname` text DEFAULT NULL,
  `concession_type` text DEFAULT NULL,
  `concessiontypedetails` text DEFAULT NULL,
  `concession_remark` varchar(255) DEFAULT NULL,
  `concession_reject_reason` varchar(255) DEFAULT NULL,
  `approval` varchar(100) DEFAULT NULL,
  `facility` text DEFAULT NULL,
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
  `telephone_number` int(11) DEFAULT NULL,
  `lives_gaurdian` text DEFAULT NULL,
  `gaurdian_name` text DEFAULT NULL,
  `gaurdian_mobile` text DEFAULT NULL,
  `gaurdian_aadhar_number` text DEFAULT NULL,
  `gaurdian_email_id` text DEFAULT NULL,
  `father_mobile_no` text DEFAULT NULL,
  `mother_mobile_no` text DEFAULT NULL,
  `father_email_id` text DEFAULT NULL,
  `sms_sent_no` text DEFAULT NULL,
  `extra_curricular` text DEFAULT NULL,
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
  `school_id` int(11) DEFAULT NULL,
  `year_id` varchar(100) DEFAULT NULL,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `school_id` int(11) NOT NULL,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_admissionfees_details`
--

CREATE TABLE `temp_admissionfees_details` (
  `id` int(11) NOT NULL,
  `TempAdmFeeRefId` int(11) NOT NULL,
  `FeesMasterId` varchar(255) DEFAULT NULL,
  `FeesTableName` varchar(100) DEFAULT NULL,
  `FeesId` int(11) NOT NULL,
  `FeeReceived` varchar(150) NOT NULL,
  `BalancetobePaid` varchar(150) NOT NULL,
  `Scholarship` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_admission_fees`
--

CREATE TABLE `temp_admission_fees` (
  `id` int(11) NOT NULL,
  `TempAdmissionId` int(11) NOT NULL,
  `ReceiptNo` varchar(100) NOT NULL,
  `ReceiptDate` date NOT NULL,
  `AcademicYear` varchar(50) NOT NULL,
  `Othercharges` varchar(100) NOT NULL,
  `OtherChargesReceived` varchar(100) NOT NULL,
  `Scholarship` varchar(100) NOT NULL,
  `TotalFeestobeCollected` varchar(100) NOT NULL,
  `FinalAmounttobeCollect` varchar(100) NOT NULL,
  `FeesCollected` varchar(100) NOT NULL,
  `BalancetobePaid` varchar(100) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `insert_login_id` int(11) NOT NULL,
  `update_login_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_admission_fees_denomination`
--

CREATE TABLE `temp_admission_fees_denomination` (
  `id` int(11) NOT NULL,
  `TempAdmFeeRefId` varchar(150) DEFAULT NULL,
  `PaymentMode` varchar(50) DEFAULT NULL,
  `LedgerRefId` varchar(50) DEFAULT NULL,
  `No_Fivehundred` varchar(100) DEFAULT NULL,
  `No_Twohundred` varchar(100) DEFAULT NULL,
  `No_hundred` varchar(100) DEFAULT NULL,
  `No_fifty` varchar(100) DEFAULT NULL,
  `No_twenty` varchar(100) DEFAULT NULL,
  `No_ten` varchar(100) DEFAULT NULL,
  `No_five` varchar(100) DEFAULT NULL,
  `totalamt` varchar(250) DEFAULT NULL,
  `ChequeNumber` varchar(150) DEFAULT NULL,
  `ChequeDate` date NOT NULL,
  `ChequeAmt` varchar(150) DEFAULT NULL,
  `ChequeBankName` varchar(150) DEFAULT NULL,
  `NeftRefNumber` varchar(150) DEFAULT NULL,
  `NeftTranDate` date NOT NULL,
  `NeftAmt` varchar(150) DEFAULT NULL,
  `NeftBankName` varchar(150) DEFAULT NULL,
  `insert_login_id` int(11) NOT NULL,
  `update_login_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_admission_student`
--

CREATE TABLE `temp_admission_student` (
  `temp_admission_id` int(11) NOT NULL,
  `temp_no` varchar(250) DEFAULT NULL,
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
  `temp_fathercontact_number` varchar(250) DEFAULT NULL,
  `temp_mothercontact_number` varchar(50) DEFAULT NULL,
  `temp_flat_no` varchar(250) DEFAULT NULL,
  `temp_street` varchar(250) DEFAULT NULL,
  `temp_district` varchar(250) DEFAULT NULL,
  `temp_area` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `school_id` int(11) DEFAULT NULL,
  `year_id` varchar(100) DEFAULT NULL,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_certificate`
--

CREATE TABLE `transfer_certificate` (
  `transfer_id` int(11) NOT NULL,
  `serial_number` varchar(250) DEFAULT NULL,
  `tmr_code` varchar(250) DEFAULT NULL,
  `admission_number` varchar(250) DEFAULT NULL,
  `certificate_number` varchar(255) DEFAULT NULL,
  `transfer_date` varchar(250) DEFAULT NULL,
  `school_name` varchar(250) DEFAULT NULL,
  `district_educational` varchar(250) DEFAULT NULL,
  `revenue_district` varchar(250) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `parents_name` varchar(250) DEFAULT NULL,
  `nationality` varchar(250) DEFAULT NULL,
  `caste` varchar(250) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `admission_date` varchar(250) DEFAULT NULL,
  `register_words` varchar(250) DEFAULT NULL,
  `personal_identification` varchar(250) DEFAULT NULL,
  `date_first_admission` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `standard` varchar(250) DEFAULT NULL,
  `promotion` varchar(250) DEFAULT NULL,
  `scholarship` varchar(250) DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp(),
  `medical_inspection` varchar(250) DEFAULT NULL,
  `date_school` varchar(250) DEFAULT NULL,
  `conduct` varchar(250) DEFAULT NULL,
  `date_parents` varchar(250) DEFAULT NULL,
  `date_of_transfer_certificate` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_admission_fees`
--

CREATE TABLE `transport_admission_fees` (
  `id` int(11) NOT NULL,
  `admission_id` varchar(255) NOT NULL,
  `receipt_no` varchar(255) NOT NULL,
  `receipt_date` date NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `scholarship` varchar(255) NOT NULL,
  `total_fees_tobe_collected` varchar(255) NOT NULL,
  `final_amount_tobe_collect` varchar(255) NOT NULL,
  `fees_collected` varchar(255) NOT NULL,
  `balance_tobe_paid` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL,
  `insert_login_id` int(11) NOT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_admission_fees_denomination`
--

CREATE TABLE `transport_admission_fees_denomination` (
  `id` int(11) NOT NULL,
  `admission_fees_ref_id` varchar(255) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `ledger_ref_id` varchar(50) NOT NULL,
  `no_five_hundred` varchar(255) DEFAULT NULL,
  `no_two_hundred` varchar(255) DEFAULT NULL,
  `no_hundred` varchar(255) DEFAULT NULL,
  `no_fifty` varchar(255) DEFAULT NULL,
  `no_twenty` varchar(255) DEFAULT NULL,
  `no_ten` varchar(255) DEFAULT NULL,
  `no_five` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `cheque_number` varchar(255) DEFAULT NULL,
  `cheque_date` date NOT NULL,
  `cheque_amount` varchar(255) DEFAULT NULL,
  `cheque_bank_name` varchar(255) DEFAULT NULL,
  `neft_ref_number` varchar(255) DEFAULT NULL,
  `neft_tran_date` varchar(255) DEFAULT NULL,
  `neft_amount` varchar(255) DEFAULT NULL,
  `neft_bank_name` varchar(255) DEFAULT NULL,
  `insert_login_id` int(11) NOT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_admission_fees_details`
--

CREATE TABLE `transport_admission_fees_details` (
  `id` int(11) NOT NULL,
  `admission_fees_ref_id` varchar(255) NOT NULL,
  `area_creation_id` varchar(255) NOT NULL,
  `area_creation_particulars_id` varchar(255) NOT NULL,
  `fee_received` varchar(255) NOT NULL,
  `balance_tobe_paid` varchar(255) NOT NULL,
  `scholarship` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_fees_master`
--

CREATE TABLE `transport_fees_master` (
  `transport_fees_master_id` int(11) NOT NULL,
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
  `school_id` int(11) NOT NULL,
  `grp_status` int(11) NOT NULL DEFAULT 0,
  `extra_status` int(11) NOT NULL DEFAULT 0,
  `amenity_status` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_fees_ref`
--

CREATE TABLE `transport_fees_ref` (
  `transport_fees_reff_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `transport_fees_id` int(11) DEFAULT NULL,
  `transport_fees_total` varchar(250) DEFAULT NULL,
  `transport_concession_fees_total` varchar(250) DEFAULT NULL,
  `transport_received_fees_total` varchar(250) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `approvedstatus` int(11) NOT NULL DEFAULT 0,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `school_id` varchar(100) DEFAULT NULL,
  `academic_year` varchar(100) DEFAULT NULL,
  `insert_login_id` int(11) DEFAULT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trust_creation`
--

INSERT INTO `trust_creation` (`trust_id`, `trust_name`, `contact_person`, `contact_number`, `address1`, `address2`, `address3`, `place`, `pincode`, `email_id`, `website`, `pan_number`, `tan_number`, `trust_logo`, `status`, `school_id`, `academic_year`, `insert_login_id`, `update_login_id`, `delete_login_id`, `created_date`, `updated_date`) VALUES
(1, 'XYZ', 'ABC', '9597575922', 'Kamaraj salai', 'Pondicherry', 'Tamilnadu', 'Pondy', '600015', '', '', '', '', 'hoc2022-banner.png', 0, '1', '2023-2024', 1, 1, 1, '2023-12-02 12:55:05', '2023-12-02 12:55:05');

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
  `school_id` int(11) NOT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `dashboard` int(11) DEFAULT 0,
  `administration_module` int(11) NOT NULL,
  `trust_creation` int(11) DEFAULT NULL,
  `school_update` int(11) NOT NULL,
  `fees_master` int(11) NOT NULL,
  `holiday_creation` int(11) NOT NULL,
  `manage_users` int(11) DEFAULT NULL,
  `master_module` int(11) NOT NULL,
  `area_master` int(11) NOT NULL,
  `syllabus_sub_module` int(11) NOT NULL,
  `allocation` int(11) NOT NULL,
  `allocation_view` int(11) NOT NULL,
  `staff_module` int(11) NOT NULL,
  `staff_creation` int(11) NOT NULL,
  `student_module` int(11) NOT NULL,
  `temp_admission_form` int(11) NOT NULL,
  `student_creation` int(11) NOT NULL,
  `student_rollback` int(11) NOT NULL,
  `delete_student` int(11) NOT NULL,
  `certificate_sub_module` int(11) DEFAULT NULL,
  `transfer` int(11) NOT NULL,
  `collection_module` int(11) NOT NULL,
  `fees_concession` int(11) NOT NULL,
  `fees_collection` int(11) NOT NULL,
  `sms_module` int(11) NOT NULL,
  `birthday_wishes` int(11) NOT NULL,
  `tamil_birthday_wishes` int(11) NOT NULL,
  `student_general_message` int(11) NOT NULL,
  `staff_general_message` int(11) NOT NULL,
  `home_work` int(11) NOT NULL,
  `report_module` int(11) NOT NULL,
  `student_report_sub_module` int(11) NOT NULL,
  `student_caste_report` int(11) NOT NULL,
  `class_wise_list` int(11) NOT NULL,
  `register_of_admission` int(11) NOT NULL,
  `student_transport_list` int(11) NOT NULL,
  `fee_details_sub_module` int(11) NOT NULL,
  `daily_fees_collection` int(11) NOT NULL,
  `day_end_report` int(11) NOT NULL,
  `overall_scholarship_fee_details` int(11) NOT NULL,
  `pending_fee_details` int(11) NOT NULL,
  `all_type_pending_fee_details` int(11) NOT NULL,
  `classwise_overall_pending` int(11) NOT NULL,
  `fees_summary` int(11) NOT NULL,
  `monthwise_fees_summary` int(11) NOT NULL,
  `insert_login_id` int(11) NOT NULL,
  `update_login_id` int(11) DEFAULT NULL,
  `delete_login_id` int(11) DEFAULT NULL,
  `Createddate` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `fullname`, `title`, `school_id`, `emailid`, `user_name`, `user_password`, `role`, `status`, `dashboard`, `administration_module`, `trust_creation`, `school_update`, `fees_master`, `holiday_creation`, `manage_users`, `master_module`, `area_master`, `syllabus_sub_module`, `allocation`, `allocation_view`, `staff_module`, `staff_creation`, `student_module`, `temp_admission_form`, `student_creation`, `student_rollback`, `delete_student`, `certificate_sub_module`, `transfer`, `collection_module`, `fees_concession`, `fees_collection`, `sms_module`, `birthday_wishes`, `tamil_birthday_wishes`, `student_general_message`, `staff_general_message`, `home_work`, `report_module`, `student_report_sub_module`, `student_caste_report`, `class_wise_list`, `register_of_admission`, `student_transport_list`, `fee_details_sub_module`, `daily_fees_collection`, `day_end_report`, `overall_scholarship_fee_details`, `pending_fee_details`, `all_type_pending_fee_details`, `classwise_overall_pending`, `fees_summary`, `monthwise_fees_summary`, `insert_login_id`, `update_login_id`, `delete_login_id`, `Createddate`, `updated_date`) VALUES
(1, 'Super', 'Admin', 'Super Admin', 'Super Admin', 1, 'support@feathertechnology.in', 'support@feathertechnology.in', 'admin@123', '1', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, '2021-04-17 17:08:00', '2024-04-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`year_id`);

--
-- Indexes for table `accountsgroup`
--
ALTER TABLE `accountsgroup`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `admission_fees`
--
ALTER TABLE `admission_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_fees_denomination`
--
ALTER TABLE `admission_fees_denomination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_fees_details`
--
ALTER TABLE `admission_fees_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenity_fee`
--
ALTER TABLE `amenity_fee`
  ADD PRIMARY KEY (`amenity_fee_id`);

--
-- Indexes for table `area_creation`
--
ALTER TABLE `area_creation`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `area_creation_particulars`
--
ALTER TABLE `area_creation_particulars`
  ADD PRIMARY KEY (`particulars_id`);

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankmaster`
--
ALTER TABLE `bankmaster`
  ADD PRIMARY KEY (`bankid`);

--
-- Indexes for table `billsettings`
--
ALTER TABLE `billsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cast_details`
--
ALTER TABLE `cast_details`
  ADD PRIMARY KEY (`cast_id`);

--
-- Indexes for table `conduct_certificate`
--
ALTER TABLE `conduct_certificate`
  ADD PRIMARY KEY (`conduct_id`);

--
-- Indexes for table `costcentre`
--
ALTER TABLE `costcentre`
  ADD PRIMARY KEY (`costcentreid`);

--
-- Indexes for table `deleted_student_creation`
--
ALTER TABLE `deleted_student_creation`
  ADD PRIMARY KEY (`deleted_student_id`);

--
-- Indexes for table `extra_curricular_activities_fee`
--
ALTER TABLE `extra_curricular_activities_fee`
  ADD PRIMARY KEY (`extra_fee_id`);

--
-- Indexes for table `fees_concession`
--
ALTER TABLE `fees_concession`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `general_message`
--
ALTER TABLE `general_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_course_fee`
--
ALTER TABLE `group_course_fee`
  ADD PRIMARY KEY (`grp_course_id`);

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
-- Indexes for table `home_work_message`
--
ALTER TABLE `home_work_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_creation`
--
ALTER TABLE `item_creation`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `last_year_fees`
--
ALTER TABLE `last_year_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_year_fees_denomination`
--
ALTER TABLE `last_year_fees_denomination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_year_fees_details`
--
ALTER TABLE `last_year_fees_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_year_fees_master`
--
ALTER TABLE `last_year_fees_master`
  ADD PRIMARY KEY (`last_year_fees_master_id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`ledgerid`);

--
-- Indexes for table `pay_fees`
--
ALTER TABLE `pay_fees`
  ADD PRIMARY KEY (`pay_fees_id`);

--
-- Indexes for table `pay_fees_ref`
--
ALTER TABLE `pay_fees_ref`
  ADD PRIMARY KEY (`pay_fees_reff_id`);

--
-- Indexes for table `pay_last_year_fees`
--
ALTER TABLE `pay_last_year_fees`
  ADD PRIMARY KEY (`pay_last_year_fees_id`);

--
-- Indexes for table `pay_last_year_fees_ref`
--
ALTER TABLE `pay_last_year_fees_ref`
  ADD PRIMARY KEY (`pay_last_year_fees_reff_id`);

--
-- Indexes for table `pay_transport_fees`
--
ALTER TABLE `pay_transport_fees`
  ADD PRIMARY KEY (`pay_transport_fees_id`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `purchaseorderref`
--
ALTER TABLE `purchaseorderref`
  ADD PRIMARY KEY (`pur_ref_id`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
  ADD PRIMARY KEY (`purposeid`);

--
-- Indexes for table `referral_details`
--
ALTER TABLE `referral_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_creation`
--
ALTER TABLE `school_creation`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `sms_template`
--
ALTER TABLE `sms_template`
  ADD PRIMARY KEY (`sms_template_id`);

--
-- Indexes for table `staff_creation`
--
ALTER TABLE `staff_creation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_general_message`
--
ALTER TABLE `staff_general_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_creation`
--
ALTER TABLE `standard_creation`
  ADD PRIMARY KEY (`standard_id`);

--
-- Indexes for table `state_creation`
--
ALTER TABLE `state_creation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_issuance`
--
ALTER TABLE `stock_issuance`
  ADD PRIMARY KEY (`stock_issuance_id`);

--
-- Indexes for table `stock_issuance_ref`
--
ALTER TABLE `stock_issuance_ref`
  ADD PRIMARY KEY (`stock_issuance_ref_id`);

--
-- Indexes for table `student_birthday_wishes`
--
ALTER TABLE `student_birthday_wishes`
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
-- Indexes for table `temp_admissionfees_details`
--
ALTER TABLE `temp_admissionfees_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_admission_fees`
--
ALTER TABLE `temp_admission_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_admission_fees_denomination`
--
ALTER TABLE `temp_admission_fees_denomination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_admission_student`
--
ALTER TABLE `temp_admission_student`
  ADD PRIMARY KEY (`temp_admission_id`);

--
-- Indexes for table `transfer_certificate`
--
ALTER TABLE `transfer_certificate`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `transport_admission_fees`
--
ALTER TABLE `transport_admission_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_admission_fees_denomination`
--
ALTER TABLE `transport_admission_fees_denomination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_admission_fees_details`
--
ALTER TABLE `transport_admission_fees_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_fees_master`
--
ALTER TABLE `transport_fees_master`
  ADD PRIMARY KEY (`transport_fees_master_id`);

--
-- Indexes for table `transport_fees_ref`
--
ALTER TABLE `transport_fees_ref`
  ADD PRIMARY KEY (`transport_fees_reff_id`);

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
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `accountsgroup`
--
ALTER TABLE `accountsgroup`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission_fees`
--
ALTER TABLE `admission_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission_fees_denomination`
--
ALTER TABLE `admission_fees_denomination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission_fees_details`
--
ALTER TABLE `admission_fees_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amenity_fee`
--
ALTER TABLE `amenity_fee`
  MODIFY `amenity_fee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `area_creation`
--
ALTER TABLE `area_creation`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `area_creation_particulars`
--
ALTER TABLE `area_creation_particulars`
  MODIFY `particulars_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bankmaster`
--
ALTER TABLE `bankmaster`
  MODIFY `bankid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billsettings`
--
ALTER TABLE `billsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cast_details`
--
ALTER TABLE `cast_details`
  MODIFY `cast_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=437;

--
-- AUTO_INCREMENT for table `conduct_certificate`
--
ALTER TABLE `conduct_certificate`
  MODIFY `conduct_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `costcentre`
--
ALTER TABLE `costcentre`
  MODIFY `costcentreid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deleted_student_creation`
--
ALTER TABLE `deleted_student_creation`
  MODIFY `deleted_student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extra_curricular_activities_fee`
--
ALTER TABLE `extra_curricular_activities_fee`
  MODIFY `extra_fee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_concession`
--
ALTER TABLE `fees_concession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_master`
--
ALTER TABLE `fees_master`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_master_model2`
--
ALTER TABLE `fees_master_model2`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_master_model3`
--
ALTER TABLE `fees_master_model3`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_master_model4`
--
ALTER TABLE `fees_master_model4`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_message`
--
ALTER TABLE `general_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_course_fee`
--
ALTER TABLE `group_course_fee`
  MODIFY `grp_course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grp_classification`
--
ALTER TABLE `grp_classification`
  MODIFY `grp_classification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holiday_creation`
--
ALTER TABLE `holiday_creation`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_work_message`
--
ALTER TABLE `home_work_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_creation`
--
ALTER TABLE `item_creation`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `last_year_fees`
--
ALTER TABLE `last_year_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `last_year_fees_denomination`
--
ALTER TABLE `last_year_fees_denomination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `last_year_fees_details`
--
ALTER TABLE `last_year_fees_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `last_year_fees_master`
--
ALTER TABLE `last_year_fees_master`
  MODIFY `last_year_fees_master_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `ledgerid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_fees`
--
ALTER TABLE `pay_fees`
  MODIFY `pay_fees_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_fees_ref`
--
ALTER TABLE `pay_fees_ref`
  MODIFY `pay_fees_reff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_last_year_fees`
--
ALTER TABLE `pay_last_year_fees`
  MODIFY `pay_last_year_fees_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_last_year_fees_ref`
--
ALTER TABLE `pay_last_year_fees_ref`
  MODIFY `pay_last_year_fees_reff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_transport_fees`
--
ALTER TABLE `pay_transport_fees`
  MODIFY `pay_transport_fees_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseorderref`
--
ALTER TABLE `purchaseorderref`
  MODIFY `pur_ref_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
  MODIFY `purposeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_details`
--
ALTER TABLE `referral_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_creation`
--
ALTER TABLE `school_creation`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_template`
--
ALTER TABLE `sms_template`
  MODIFY `sms_template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff_creation`
--
ALTER TABLE `staff_creation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_general_message`
--
ALTER TABLE `staff_general_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standard_creation`
--
ALTER TABLE `standard_creation`
  MODIFY `standard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `state_creation`
--
ALTER TABLE `state_creation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_issuance`
--
ALTER TABLE `stock_issuance`
  MODIFY `stock_issuance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_issuance_ref`
--
ALTER TABLE `stock_issuance_ref`
  MODIFY `stock_issuance_ref_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_birthday_wishes`
--
ALTER TABLE `student_birthday_wishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_creation`
--
ALTER TABLE `student_creation`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_details`
--
ALTER TABLE `subject_details`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_admissionfees_details`
--
ALTER TABLE `temp_admissionfees_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_admission_fees`
--
ALTER TABLE `temp_admission_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_admission_fees_denomination`
--
ALTER TABLE `temp_admission_fees_denomination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_admission_student`
--
ALTER TABLE `temp_admission_student`
  MODIFY `temp_admission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer_certificate`
--
ALTER TABLE `transfer_certificate`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_admission_fees`
--
ALTER TABLE `transport_admission_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_admission_fees_denomination`
--
ALTER TABLE `transport_admission_fees_denomination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_admission_fees_details`
--
ALTER TABLE `transport_admission_fees_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_fees_master`
--
ALTER TABLE `transport_fees_master`
  MODIFY `transport_fees_master_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_fees_ref`
--
ALTER TABLE `transport_fees_ref`
  MODIFY `transport_fees_reff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trust_creation`
--
ALTER TABLE `trust_creation`
  MODIFY `trust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
