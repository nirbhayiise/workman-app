-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2026 at 03:12 AM
-- Server version: 11.4.12-MariaDB-cll-lve-log
-- PHP Version: 8.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workifdo_workman`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_user_name` varchar(20) DEFAULT NULL,
  `admin_pass` varchar(20) DEFAULT NULL,
  `admin_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_user_name`, `admin_pass`, `admin_created`, `admin_status`) VALUES
(1, 'admin', '247admin', '2022-07-12 18:04:04', '1');

-- --------------------------------------------------------

--
-- Table structure for table `amount`
--

CREATE TABLE `amount` (
  `pay_id` int(11) NOT NULL,
  `e_id` varchar(10) DEFAULT NULL,
  `f_id` varchar(10) DEFAULT NULL,
  `c_id` varchar(10) DEFAULT NULL,
  `t_id` varchar(10) DEFAULT NULL,
  `pay_amount` varchar(10) DEFAULT NULL,
  `pay_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pay_status` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `b_id` int(11) NOT NULL,
  `b_mail` varchar(40) DEFAULT NULL,
  `b_reps` varchar(20) DEFAULT NULL,
  `b_phone` varchar(15) DEFAULT NULL,
  `b_address` text DEFAULT NULL,
  `b_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `b_status` varchar(2) DEFAULT NULL,
  `b_name` varchar(20) DEFAULT NULL,
  `b_business_name` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`b_id`, `b_mail`, `b_reps`, `b_phone`, `b_address`, `b_created`, `b_status`, `b_name`, `b_business_name`) VALUES
(4, 'uchechukwu_oji@yahoo', 'Uchechukwu Oji', '0708292929269', '#8B, Ogbunabali Road Popo Plaza, Shop 20, Port Harcourt', '2022-07-11 07:03:44', '1', 'Tall Tree Computer', NULL),
(3, 'info@onielng.com', 'Okechukwu O', '08132299599', '43 NDDC Road 11 Rumukwurusi, Port Harcourt', '2021-07-14 12:06:23', '1', 'Oniel Communication ', NULL),
(5, 'info247workman@gmail', 'Workman247', '08144200027', '28 Mini-Ezewe Street off Okporo Road, Rumuogba Port Harcourt', '2022-12-17 08:12:22', '1', 'G3 Intergrated Servi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_first_name` varchar(50) DEFAULT NULL,
  `c_last_name` varchar(50) DEFAULT NULL,
  `c_phone` varchar(15) DEFAULT NULL,
  `c_address` text DEFAULT NULL,
  `c_email` text DEFAULT NULL,
  `c_pass` varchar(50) DEFAULT NULL,
  `c_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `c_status` varchar(2) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `NGstate` varchar(50) NOT NULL,
  `NGcity` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_first_name`, `c_last_name`, `c_phone`, `c_address`, `c_email`, `c_pass`, `c_created`, `c_status`, `username`, `NGstate`, `NGcity`) VALUES
(2, 'Othniel', 'Okechukwu', '08132299599', '1 Chief Igwe Avenue', 'greatothniel@gmail.com', 'adira', '2022-06-15 17:51:25', '1', 'Othniel12', '', ''),
(31, 'Tobia', 'Jonadab', '08057494895', 'No 7 Okwudor Street D-Line Port Harcourt ', 'tobialogistic@gmail.com ', 'COOr1dina2TOR', '2022-07-22 11:25:33', '1', 'Tobia593', '', ''),
(30, 'Emmanuel ', 'agiaye', '08033426287', '3 Diplomat Assembly Avenue Rukpakulusi New Layout Port Harcourt ', 'Agiayeeoi@yahoo.com ', 'bargains', '2022-07-22 11:05:04', '1', 'Emmanuel 772', '', ''),
(29, 'Sonia ', 'Anyadiegwu', '08132032280', 'achumsyluv@gmail.com', 'achumsyluv@gmail.com', 'linda1995', '2022-07-19 13:26:54', '1', 'Sonia 872', '', ''),
(28, 'Emmanuel', 'Osung', '08034430463', '#82 Elekahia road ph', 'emmanuelosung333@gmail.com', '1988', '2022-07-15 18:05:38', '1', 'Emmanuel762', '', ''),
(27, 'Nelson', 'Emeghara ', '08037804151', '45 Unity Avenue opposite Eckankar off Obiwali Road Rumuigbo Port-Harcourt', 'nelsonemeghara@gmail.com', 'Angel1', '2022-07-13 08:52:52', '1', 'Nelson444', '', ''),
(26, 'Joseph', 'Sam-odumo', '08036653813', 'Bloock D8, PH Garden Heights, 20 Idiagbon Road, New G.R.A PHASE 3', 'joseph.sam.odumo@gmail.com', 'ITpassion@1', '2022-07-11 09:25:46', '1', 'Joseph751', '', ''),
(10, 'Emmanuel', 'Agha', '08064377548', '#4 st Stephen street off location road oyibo, Rivers State Port Harcourt', 'aghaemmanuelobiahu@gmail.com', '08064377548', '2021-11-25 18:24:54', '1', 'Emmanuel249', '', ''),
(11, 'Bunddy', 'Ichado', '08032116418', 'pipeline', 'ichadoichado@gmail.com', '1ig3r', '2022-01-04 21:36:45', '1', 'Bunddy914', '', ''),
(13, 'David', 'Wolemonwu', '08069366643', 'Port Harcourt', 'wolemsdavid@gmail.com', '123456', '2022-04-14 05:38:54', '1', 'David883', '', ''),
(25, 'Paulina ', 'Obiahu ', '08030427051', 'No. 43 NDDC Road 11,Rumukwurusi Pipeline Port Harcourt ', 'paulinaogbonnaya@gmail.com ', 'simplylina', '2022-07-11 06:53:54', '1', 'Paulina 511', '', ''),
(15, 'Michael', 'Afolabi', '08055919382', '4, Park Lane Apapa ', 'tamafolabi@gmail.com', 'afobabz', '2022-04-21 15:02:38', '1', 'Michael966', '', ''),
(16, 'Itseme', 'Nelson ', '08157188814', 'Peace drive, off oroigwe Road, eligibility, Port Harcourt. Rivers State', 'itseme.nelson@gmail.com ', 'onagie16', '2022-06-28 08:08:37', '1', 'Itseme823', '', ''),
(24, 'Maximus ', 'Chukwuemeka ', '08036744436', '75c Farm Road Rumuagholu PHC', 'chimaxken@yahoo.com ', 'Amara@247', '2022-07-10 15:18:17', '1', 'Maximus 586', '', ''),
(18, 'Nnenna Henrietta', 'Anuforo', '08170244521', '4, Ogbonda Street Off Nta Road Port Harcourt Rivers State', 'nnennaanuforo18@gmail.com', 'Rietta18', '2022-06-10 11:45:27', '1', 'Nnenna564', '', ''),
(23, 'Maximus', 'Chukwuemeka ', '08036744436', '75c Farm Road Rumuagholu Phc', 'chimaxken@yahoo.com ', 'Amara@247', '2022-07-10 15:12:51', '1', 'Maximus621', '', ''),
(20, 'Joseph ', 'Sampson ', '07033464706', '33 Ekwe str mile 3 PHC ', 'josephsampson247@yahoo.com', '1234', '2022-06-15 18:01:41', '1', 'Joseph834', '', ''),
(21, 'Workman247', 'IG3 Integrated ', '08141240001', 'Workman247', 'info247workman@gmail.com', '1234567890', '2024-01-08 10:41:10', '1', 'Workman247', '', ''),
(22, 'Enoobong ', 'Ebiobowei ', '08060707228', '10 Kingslope Avenue Off Alcon Road Woji PortHarcourt ', 'gifteee@yahoo.co.uk', 'Enoobong', '2022-07-05 10:08:13', '1', 'Enoobong 500', '', ''),
(32, 'Bright', 'Agbodike ', '08033732519', '15 Grace Crescent, Rumuokwurusi New Layout, from Eleme junction, Port Harcourt ', 'agbodikebright@yahoo.com ', 'Justina12#', '2022-07-23 17:05:38', '1', 'Bright126', '', ''),
(33, 'Obiora', 'Onyekwelu ', '08177726455', 'New Road Off Location Ada George Port Harcourt ', 'johnobiora00@gmail.com ', 'mannied', '2022-07-24 07:55:09', '1', 'Obiora720', '', ''),
(34, 'Ezekwesiri', 'Chukwu', '08038696231', 'no9 salvation lane off nkakini street rumuepirikom', 'ezepajugo@gmail.com', 'Benedict1!', '2022-07-24 11:28:19', '1', 'Ezekwesiri470', '', ''),
(35, 'maximillian', 'uchendu', '08133072351', 'owerri ', 'uchenduchinedu54@gmail.com', 'edus1993@', '2022-07-25 06:02:27', '1', 'maximillian125', '', ''),
(36, 'Dr. Frank ', 'Emmanuel ', '08172063740', 'Kings Avenue, GRA Phase 3, Port Harcourt ', 'drfrank.emmanuel.imieye@gmail.com ', 'NAOC03658', '2022-07-26 16:45:33', '1', 'Dr. Frank 826', '', ''),
(37, 'Mark', 'EcÃ³', '08067892455', 'Rumuola, Port Harcourt ', 'dajyno@gmail.com', '12345678', '2022-07-27 04:53:50', '1', 'Mark326', '', ''),
(38, 'Godwin ', 'Lawson ', '08033396284', '18 Christ avenue off abuloma rd ', 'lawsongodwin21@gmail.com', 'glory123', '2022-07-27 19:24:26', '1', 'Godwin 389', '', ''),
(39, 'Chigozie ', 'Hanacho ', '09091105740', 'Port Harcourt', 'Chigo ', 'yagazie76', '2022-08-04 13:22:44', '0', 'Chigozie 931', '', ''),
(40, 'Chigozie ', 'Hanacho ', '08057128721', 'Port Harcourt ', 'egbunefu@yahoo.com', 'yagazie76', '2024-01-01 09:30:49', '0', 'Chigozie 867', '', ''),
(41, 'Nnamdi', 'Onyejiaku', '08136397540', 'Imo state', 'nnamdionyejiaku2@gmail.com ', 'nnamdi', '2022-08-11 12:52:03', '1', 'Nnamdi251', '', ''),
(43, 'Sylvester ', 'O.', '08172063667', '405', 'okonkwo_3@yahoo.com ', 'Ugbolu1407', '2022-08-13 09:37:14', '1', 'Sylvester 483', '', ''),
(44, 'Unwana', 'Solomon ', '07034537358', '4 Redemption close, Crusader Avenue off Nvigwe Road, Woji Port Harcourt. ', 's.unwana@yahoo.com', 'solo5214', '2022-08-16 15:13:23', '1', 'Unwana756', '', ''),
(45, 'Ekekwe ', 'Mary', '08063660651', 'Rumudara Port-harcourt', 'mary4me200@gmail.com', 'Chisom@2009', '2022-08-27 16:23:34', '1', 'Ekekwe 629', '', ''),
(148, 'bhanu', 'pratap', '8081434704', 'gorgh', 'bhs.hhj@ggh.com', '123456', '2023-07-19 00:44:05', '1', 'bhanu678', 'Lagos', 'gorakhpur'),
(47, 'Victoria', 'Edede', '08162013611', 'market junction mile 4 ph', 'ededevictoria@gmail.com', 'vicky123', '2022-10-17 14:32:19', '1', 'Victoria902', '', ''),
(48, 'Othniel ', 'Okechukwu ', '0813299599', 'NDDC Road 11, Rumukwurusi Pipeline ', 'greatothniel@gmail.com', 'adira', '2022-10-17 15:16:34', '1', 'Othniel 566', '', ''),
(112, 'john', 'doe', '09069082744', 'naoc', 'kenmogee101@gmail.com', '123456789', '2023-05-02 09:47:15', '1', 'john690', 'Rivers', 'port Harcourt '),
(50, 'Victoria', 'Nkeiruka', '09150468932', 'market junction', 'ededevictoria@gmail.com', 'vickyn123', '2022-12-17 08:31:00', '1', 'Victoria521', '', ''),
(55, 'Ndudi ', 'Ochieze ', '08035618660', 'No 2 Mini Ezekwu Street off Okporo Road PHC ', 'veronnie5q20@yahoo.com', 'fromME2UALL5', '2023-07-31 06:15:35', '1', 'Ndudi703', '', ''),
(147, 'NirbhaySingh', 'Singh', '8285672453', 'Delhi', 'nirbhayiise@gmail.com', '1234', '2025-08-27 18:18:51', '1', 'Nirbhay220', 'Delhi', 'Delhi'),
(75, 'Nduka', 'Ochieze ', '07062517404', 'No 2 Mini Ezekwu Street off Okporo Road PHC ', 'ndymacho@yahoo.com', 'fromME2UALL5', '2023-01-03 10:23:52', '1', 'Nduka501', '', ''),
(105, 'Rajesh', 'Patel', '8860254199', 'Dadri', 'rakesh.iise@gmail.com', '123', '2023-03-21 18:16:20', '1', 'Rajesh898', 'Utter Pradesh', 'Dadri'),
(107, 'Chukwuebuka ', 'Igboanusi ', '08101335741', 'Chief igwe street rumuogba port Harcourt ', 'igboanusichukwuebuka@gmail.com ', 'Igboanusi7', '2023-04-08 14:19:36', '1', 'Chukwuebuka 321', 'Rivers', 'port Harcourt '),
(93, 'Chinedu', 'Felix', '07035122262', '1A Redemption close Akpajo', 'nwankwo.felixc@gmail.com', 'Brother85', '2023-01-21 12:57:49', '1', 'Chinedu906', 'Rivers', 'port harcourt'),
(94, 'Nnamdi', 'Onyejiaku', '09042876609', 'Amannachi', 'casmirnlemeke@gmail.com', '1111', '2023-02-04 04:14:42', '1', 'Nnamdi978', 'Imo', 'Orlu'),
(111, 'Okey', 'Obiahu', '08088728020', '1 Chief Igwe Avenue ', 'othnielothniel@yahoo.com', 'adira', '2023-06-22 08:11:51', '1', 'Okey12', 'Rivers', 'Port Harcourt'),
(149, 'Njoku', 'Nweze', '08039626653', 'Road 4 Dominion Estate, Akpajo ', 'njokunweze@gmail.com', '1178', '2023-09-20 12:34:24', '1', 'Njoku517', 'Rivers', 'Porharcourt'),
(150, 'Adiel', 'Othniel', '08144200027', '43 NDDC Road, Rumukwurushi', 'othnielobiahu@live.com', 'adiel', '2024-01-08 14:46:46', '1', 'Adiel729', 'Rivers', 'Port Harcourt'),
(151, 'Chukwuebuka ', 'Azuaru ', '08039729979', 'no 11, chief igwe Street artillery', 'azuarueb@gmail.com ', 'wat123of', '2024-07-04 18:59:35', '1', 'Chukwuebuka 363', 'Rivers', 'Port Harcourt ');

-- --------------------------------------------------------

--
-- Table structure for table `Enquiry`
--

CREATE TABLE `Enquiry` (
  `e_id` int(11) NOT NULL,
  `b_id` varchar(10) DEFAULT NULL,
  `cat_id` varchar(10) DEFAULT NULL COMMENT 'professional id',
  `service_id` varchar(10) DEFAULT NULL,
  `c_id` varchar(10) DEFAULT NULL,
  `contact_person_name` varchar(20) DEFAULT NULL,
  `contact_person_mail` varchar(50) DEFAULT NULL,
  `contact_person_mob` varchar(15) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `alloted_technician_id` varchar(10) DEFAULT NULL,
  `work_status` varchar(2) DEFAULT NULL COMMENT '1=waiting,2=techaccpted wait,3=techaccpted,4=faultAnalysis',
  `amount_paid` varchar(10) DEFAULT NULL,
  `service_amount` varchar(10) DEFAULT NULL,
  `payment_status` varchar(2) DEFAULT NULL,
  `security_code` varchar(10) NOT NULL,
  `e_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `e_status` varchar(2) DEFAULT NULL,
  `transcation_ref` text DEFAULT NULL,
  `scan_flag` int(11) NOT NULL,
  `accept_tech` varchar(2) NOT NULL,
  `cancellation_flag` int(11) NOT NULL,
  `photo1` text NOT NULL,
  `photo2` text NOT NULL,
  `complete_task_feedbck_status` int(2) NOT NULL,
  `payment_dialog_status` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Enquiry`
--

INSERT INTO `Enquiry` (`e_id`, `b_id`, `cat_id`, `service_id`, `c_id`, `contact_person_name`, `contact_person_mail`, `contact_person_mob`, `details`, `alloted_technician_id`, `work_status`, `amount_paid`, `service_amount`, `payment_status`, `security_code`, `e_created`, `e_status`, `transcation_ref`, `scan_flag`, `accept_tech`, `cancellation_flag`, `photo1`, `photo2`, `complete_task_feedbck_status`, `payment_dialog_status`) VALUES
(39, '0', '8', '32', '37', 'Mark EcÃ³', 'dajyno@gmail.com', '08067892455', 'Fix a faculty screen', '8', '3', NULL, NULL, '0', '', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(40, '0', '4', '9', '33', 'Obiora Onyekwelu ', 'johnobiora00@gmail.com ', '08177726455', 'Freezer not cooling properly.', '5', '3', NULL, NULL, '0', '', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(41, '0', '4', '13', '44', 'Unwana Solomon ', 's.unwana@yahoo.com', '07034537358', 'I need to repair a broken screen of my Samsung UA49N5300AK TV.', '0', '1', NULL, NULL, '0', '', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(42, '0', '4', '13', '45', 'Ekekwe  Mary', 'mary4me200@gmail.com', '08063660651', 'It switches of on its own,as if it is having partial contact.Off and on ', '0', '1', NULL, NULL, '0', '', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(36, '0', '4', '9', '32', 'Bright Agbodike ', 'agbodikebright@yahoo.com ', '08033732519', 'LG double door fridge. The up freezer section is cooling well while the down fridge section is cooling well.', '5', '3', NULL, NULL, '0', '', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(35, '0', '5', '20', '29', 'Sonia  Anyadiegwu', 'achumsyluv@gmail.com', '08132032280', 'for repairs ', '0', '1', NULL, NULL, '0', '', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(34, '0', '8', '31', '27', 'Nelson Emeghara ', 'nelsonemeghara@gmail.com', '08037804151', 'Repair of broken bathtub.', '5', '5', '10000', '0', '2', '', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(33, '0', '4', '18', '23', 'Maximus Chukwuemeka ', 'chimaxken@yahoo.com ', '08036744436', 'have a slow burning gas cooker, need urgent repairs ', '5', '3', NULL, NULL, '0', '', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(32, '0', '4', '10', '25', 'Paulina  Obiahu ', 'paulinaogbonnaya@gmail.com ', '08030427051', 'The washing machine is Polystar and the spinning part is not working.  Also discovered this morning that it has leakage under because all the water that was poured into it drained out completely. ', '5', '5', '6000', '500', '2', '', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(31, '0', '4', '15', '26', 'Joseph Sam-odumo', 'joseph.sam.odumo@gmail.com', '08036653813', 'Bathtop patching to prevent leakages. ', '5', '3', NULL, NULL, '0', '', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(30, '0', '4', '9', '25', 'Paulina  Obiahu ', 'paulinaogbonnaya@gmail.com ', '08030427051', 'The refrigerator is Polystar double door refrigerator. It is powering but not cooling. ', '5', '3', NULL, NULL, '0', '', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(29, '0', '4', '8', '23', 'Maximus Chukwuemeka ', 'chimaxken@yahoo.com ', '08036744436', 'have an Ac that need to be fixed LG product.\n', '0', '1', NULL, NULL, '0', '', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(28, '0', '4', '9', '22', 'Enoobong  Ebiobowei ', 'gifteee@yahoo.co.uk', '08060707228', 'Polyester Refrigerator is powering up but not freezing.', '0', '2', NULL, NULL, '0', '', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(89, '0', '10', '44', '76', 'Nduka Ochieze ', 'ndymacho@yahoo.com', '07062517404', 'faulty inverter', '0', '1', NULL, NULL, '0', '570851', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '6029391e857692f534d2e399636270d6.jpg', '8f05ac5bacd1cfc4567e969ef6ab3621.jpg', 0, '1'),
(90, '0', '4', '14', '1', 'NIRBHAY PRATAP SINGH', 'nirbhayiise@gmail.com', '8285672453', 'tesy', '0', '1', NULL, NULL, '0', '661687', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, 'a2a7489ca9b75438159c85bb1578c180.jpg', '3c673244fcb4f44f28703f2d4af8eb2e.jpg', 0, '1'),
(91, '0', '10', '44', '1', 'NIRBHAY PRATAP SINGH', 'nirbhayiise@gmail.com', '8285672453', 'ttt', '0', '1', NULL, NULL, '0', '173708', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, 'f6cded86aef2b30543a126116b43f8b0.jpg', '694c0b8476f1d2a814451dbbe5076acb.jpg', 0, '1'),
(92, '0', '4', '14', '1', 'NIRBHAY PRATAP SINGH', 'nirbhayiise@gmail.com', '8285672453', 'fhdgx', '0', '1', NULL, NULL, '0', '431738', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, 'd036940ca79110c58987b7bc6efb7eb7.jpg', '18926095c951665eec184313818bddeb.jpg', 0, '1'),
(93, '0', '4', '14', '1', 'NIRBHAY PRATAP SINGH', 'nirbhayiise@gmail.com', '8285672453', 'rggggg\njtufjf', '12', '5', '20', '10', '2', '705610', '2023-08-25 09:06:46', '1', NULL, 1, '', 0, 'c6b43f1640f500e356df16cd3b26d447.jpg', '69d1df671595a7f3796e433ad9b6b45f.jpg', 0, '1'),
(94, '0', '10', '43', '1', 'NIRBHAY PRATAP SINGH', 'nirbhayiise@gmail.com', '8285672453', 'dyhch', '12', '5', '20', '10', '2', '808555', '2023-08-25 09:06:46', '1', NULL, 1, '', 0, 'feb44793cc7054ee4b29357e4092749e.jpg', '2adf5c618af56d099bdaf141c636d39f.jpg', 1, '1'),
(95, '0', '4', '18', '1', 'NIRBHAY PRATAP SINGH', 'nirbhayiise@gmail.com', '8285672453', 'hdhd', '12', '5', '25', '10', '2', '681532', '2023-08-25 09:06:46', '1', NULL, 1, '', 0, '3a7283a31e7a53091bae133d26d1eab2.jpg', '544f9791f22367af9f910f642b7289d2.jpg', 1, '1'),
(96, '0', '4', '14', '1', 'NIRBHAY PRATAP SINGH', 'nirbhayiise@gmail.com', '8285672453', 'cgfg', '12', '5', '14', '10', '2', '703586', '2023-08-25 09:06:46', '1', NULL, 1, '', 0, 'c8b815ba48bf6f0bc8b9656e6212dfe1.jpg', '38d678ded86f3010bc6bff15a833aaab.np', 1, '1'),
(97, '0', '10', '43', '1', 'NIRBHAY PRATAP SINGH', 'nirbhayiise@gmail.com', '8285672453', 'hwhshh', '0', '1', NULL, NULL, '0', '773819', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(98, '0', '4', '8', '1', 'NIRBHAY PRATAP SINGH', 'nirbhayiise@gmail.com', '8285672453', 'test', '0', '1', NULL, NULL, '0', '187863', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '4d51d9f39b6777d64eff711aa580c732.jpg', 'd961d13a472595f209b0a5cb82a44a0f.jpg', 0, '1'),
(99, '0', '4', '18', '1', 'Deepak Singh', 'nirbhayiise@gmail.com', '8285672453', 'tedt', '0', '1', NULL, NULL, '0', '668232', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, 'a80aad38479da0badc1278ebb64184c6.jpg', 'c8cb88295c2a5f0a774b71b532b36771.jpg', 0, '1'),
(100, '1', 'cat', 'service', '1', '1', '1', '1', '1', '0', '1', NULL, NULL, '0', '712905', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '1', '1', 0, '1'),
(101, '0', '4', '18', '', 'DeepakSinghSingh Sin', 'nirbhayiise@gmail.com', '8285672453', 'dhhdhdjdjd', '0', '1', NULL, NULL, '0', '875204', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(102, '0', '10', '43', '1', 'DeepakSinghSingh Sin', 'nirbhayiise@gmail.com', '8285672453', 'hsshhs', '0', '1', NULL, NULL, '0', '528434', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(103, '0', '5', '19', '1', 'Pankaj', 'pan@gmail.com', '6392884273', 'Diasfgayiuesdi', '0', '1', NULL, NULL, '0', '208307', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(104, '0', '8', '32', '1', 'Pankaj', 'pankaj@gmail.com', '6392884273', 'Eihgdsfkuerwuykf', '0', '1', NULL, NULL, '0', '218175', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(105, '0', '5', '20', '1', 'Deepak', 'deepak@gmail.com', '6392884273', 'Esgfuygegruysgfer', '0', '1', NULL, NULL, '0', '835008', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(106, '0', '5', '21', '101', 'pankaj', 'pankaj@gmail.com', '6392884273', 'Aisdkhfieuars', '0', '1', NULL, NULL, '0', '538849', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(107, '0', '4', '15', '2', 'Othniel Okechukwu', 'greatothniel@gmail.com', '08132299599', 'test', '12', '3', NULL, NULL, '0', '756548', '2023-08-25 09:06:46', '1', NULL, 1, '', 0, '79ca671b5c6fe966a401f08a5caf2ca1.jpg', '51e1d58b6cea0e616c4777bce5ee59a4.jpg', 0, '1'),
(108, '0', '7', '26', '103', 'Kenneth', 'kokodemy@gmail.com', '09069082744', 'Test details \nRest details ', '0', '1', NULL, NULL, '0', '907415', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(109, '0', '7', '26', '103', 'Kenneth', 'kokodemy@gmail.com', '09069082744', 'Test details \nRest details ', '0', '1', NULL, NULL, '0', '559838', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(110, '0', '4', '18', '103', 'Ayomide Kenneth', 'kokodemy@gmail.com', '07064018706', 'test', '5', '2', NULL, NULL, '0', '320555', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '1173e8db50c9c24a9cf2eac4f831f850.jpg', 'e245d769bfeb7217267978902d928d87.jpg', 0, '1'),
(111, '0', '5', '20', '93', 'Chinedu Felix', 'nwankwo.felixc@gmail.com', '07035122262', 'Test', '0', '1', NULL, NULL, '0', '998300', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '29b75ec1168880bfc00a7096ff173c4b.jpg', '', 0, '1'),
(112, '0', '5', '19', '1', 'Test', 'test@gmail.com', '8877665432', 'Test Service', '0', '1', NULL, NULL, '0', '735097', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(115, '0', '4', '18', '1', 'DeepakSinghSinghSing', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '5', '20', '100', '2', '687966', '2023-08-25 09:06:46', '1', NULL, 1, '', 0, '142b19a4d2cbbae1735d057dc3ebbf24.jpg', '369d8c71496d231dd12b26a96e588376.jpg', 1, '1'),
(114, '0', '4', '18', '1', 'DeepakSinghSinghSing', 'nirbhayiise@gmail.com', '8285672453', 'tebdjzk', '0', '1', NULL, NULL, '0', '498922', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '65ec60b80459a5e8db36f9860b2a0ad5.jpg', '', 0, '1'),
(116, '0', '5', '19', '1', 'Pankaj', 'p@gmail.com', '7656565434', 'Testing ', '0', '1', NULL, NULL, '0', '521999', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(117, '0', '5', '21', '25', 'Paulina  Obiahu ', 'paulinaogbonnaya@gmail.com ', '08030427051', 'Test', '0', '1', NULL, NULL, '0', '427853', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(118, '0', '4', '13', '107', 'Chukwuebuka  Igboanu', 'igboanusichukwuebuka@gmail.com ', '08101335741', 'My television is faulty ', '0', '1', NULL, NULL, '0', '537090', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, 'cfe1fbebb988cdb244ff19f423606160.jpg', '', 0, '1'),
(119, '0', '4', '18', '1', 'DeepakSinghSinghSing', 'nirbhayiise@gmail.com', '8285672453', 'xhxh', '0', '1', NULL, NULL, '0', '291426', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, 'd9f9b05494bedb795d92683c2671cbf4.jpg', '0a2797ab192cfb1149b551cbf6724079.jpg', 0, '1'),
(120, '0', '10', '43', '1', 'DeepakSinghSinghSing', 'nirbhayiise@gmail.com', '8285672453', 'test', '0', '1', NULL, NULL, '0', '376986', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '5786a2d5585f60b89c77e4e26ad20c21.jpg', '5bb788709fa4d6a6517c8b4e20d8d880.jpg', 0, '1'),
(121, '0', '4', '14', '1', 'DeepakSinghSinghSing', 'nirbhayiise@gmail.com', '8285672453', 'test', '0', '1', NULL, NULL, '0', '618321', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '27f78f3e70adade003a30f8d77611ac4.jpg', 'b484228b6590a0863638e375b0e75930.kajol', 0, '1'),
(122, '0', '5', '19', '1', 'Rakesh', 'rakesh', '8976567543', 'Test results', '0', '1', NULL, NULL, '0', '414920', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(123, '0', '4', '17', '25', 'ayo', 'kenmogee101@gmail.com ', '09069082744', 'The cooker stopped working ', '0', '1', NULL, NULL, '0', '239996', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(124, '0', '4', '18', '1', 'DeepakSinghSinghSing', 'nirbhayiise@gmail.com', '8285672453', 'test', '0', '1', NULL, NULL, '0', '261667', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '95ccd58264baf4b3b93f1c4ae6666510.jpg', 'ea5ee31e6f06f3b65409486466169618.jpg', 0, '1'),
(125, '0', '4', '18', '1', 'DeepakSinghSinghSing', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '3', '100', '50', '1', '582272', '2023-08-25 09:06:46', '1', NULL, 1, '', 0, 'c65341ba20e8bd9c3df409b2bf352334.jpg', 'd0e685393a50ad046a62cdfe6b74bb1b.jpg', 1, '1'),
(126, '0', '4', '14', '1', 'DeepakSinghSinghSing', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '1', NULL, NULL, '0', '860906', '2023-08-25 09:06:46', '1', NULL, 1, '', 1, '0acb5511bf16dfa0065870550d93a2f1.jpg', '24b34391423cc978b26967a589ac8e78.jpg', 0, '1'),
(127, '0', '10', '43', '1', 'Nps Singh', 'nirbhayiise@gmail.com', '8285672453', 'tes', '0', '1', NULL, NULL, '0', '867338', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, 'ff550aeb1358acc779d90ad62c7ab6ce.jpg', '55f87f5401234daf0dc0b063ebea3dac.jpg', 0, '1'),
(128, '0', '4', '18', '1', 'Nps Singh', 'nirbhayiise@gmail.com', '8285672453', 'test4 sonal', '0', '1', NULL, NULL, '0', '451608', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '36cc992212d30a0dc2ce575c2727d389.jpg', '700291cf9840ea569b03b6883b69d703.jpg', 0, '1'),
(129, '0', '7', '27', '1', 'Nps Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '0', '1', NULL, NULL, '0', '926283', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '9bda66598ace517ed3047cd4e651ad31.jpg', '99d2ac717a8512fcf06ff39f7881697b.whatsapp', 0, '1'),
(130, '0', '5', '20', '2', 'Othniel Okechukwu', 'greatothniel@gmail.com', '08132299599', 'Keyboard problem', '0', '1', NULL, NULL, '0', '662946', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '38d528587a127f3d4305c043815bb0a6.jpg', '423d78661558e84fec9f61802b0cbec2.jpg', 0, '1'),
(131, '0', '10', '42', '2', 'Othniel Okechukwu', 'greatothniel@gmail.com', '08132299599', 'Test ', '5', '5', '100', '20', '2', '239196', '2023-08-25 09:06:46', '1', 'trx_csptmky0', 1, '', 0, '80a3721e9c824647d9d266c4eb78d175.jpg', '51019360dabee2eae52f2848ba179e1b.jpg', 0, '1'),
(132, '0', '5', '21', '93', 'Chinedu Felix', 'nwankwo.felixc@gmail.com', '07035122262', 'Remote control', '0', '1', NULL, NULL, '0', '708003', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, 'f844e8e5531dced4b3d271e94a17009c.jpg', '7d39ad4aa184a3e71b79e763f5cc9121.jpg', 0, '1'),
(133, '0', '4', '18', '93', 'Chinedu Felix', 'nwankwo.felixc@gmail.com', '07035122262', 'Leakage...', '5', '1', NULL, NULL, '0', '289482', '2023-08-25 09:06:46', '1', NULL, 1, '', 1, '7372e9fed7317062df58d7cc4c312acc.jpg', '9b7c0b69669e007d1d7e36e43f9afccf.jpg', 0, '1'),
(134, '0', '4', '17', '1', 'Nps Singh', 'nirbhayiise@gmail.com', '8285672453', 'hdhdh', '5', '2', NULL, NULL, '0', '660987', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(135, '0', '5', '21', '93', 'Chinedu Felix', 'nwankwo.felixc@gmail.com', '07035122262', 'Screen broken', '0', '1', NULL, NULL, '0', '571960', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '8a17f4e3cbf09dbd3375e4f697a7d78f.jpg', '4608af6a6b3afa3ef53ce79f33fadbd2.jpg', 0, '1'),
(136, '0', '13', '48', '2', 'Othniel Okechukwu', 'greatothniel@gmail.com', '08132299599', 'I need POS software that can manage my Supermarket ', '0', '1', NULL, NULL, '0', '857271', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(137, '0', '5', '20', '2', 'Othniel Okechukwu', 'greatothniel@gmail.com', '08132299599', 'laptop screen blank and not coming up', '0', '1', NULL, NULL, '0', '675294', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, 'd2f91c110af98fd28e9653e4638c64f4.jpg', '', 0, '1'),
(138, '0', '5', '20', '112', 'john doe', 'kenmogee101@gmail.com', '09069082744', 'laptop screen not coming on \n', '5', '3', NULL, NULL, '0', '472475', '2023-08-25 09:06:46', '1', NULL, 1, '', 0, '4ab41fb228d289ea3d83f17807446831.jpg', '', 0, '1'),
(139, '0', '4', '17', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '5', '30', '20', '2', '239934', '2023-08-25 09:06:46', '1', NULL, 1, '', 0, '', '', 1, '1'),
(140, '0', '5', '20', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '2', NULL, NULL, '0', '128241', '2023-08-25 09:06:46', '1', NULL, 0, '1', 0, '', '', 0, '1'),
(141, '0', '10', '44', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '1', NULL, NULL, '0', '632400', '2023-08-25 09:06:46', '1', NULL, 0, '-1', -1, '', '', 0, '1'),
(142, '0', '10', '44', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '1', NULL, NULL, '0', '759548', '2023-08-25 09:06:46', '1', NULL, 0, '', 1, '', '', 0, '1'),
(143, '0', '10', '44', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '1', NULL, NULL, '0', '885632', '2023-08-25 09:06:46', '1', NULL, 0, '-1', -1, '', '', 0, '1'),
(144, '0', '4', '18', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '1', NULL, NULL, '0', '226099', '2023-08-25 09:06:46', '1', NULL, 0, '1', 1, '', '', 0, '1'),
(145, '0', '4', '18', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '1', NULL, NULL, '0', '372038', '2023-08-25 09:06:46', '1', NULL, 0, '-1', -1, '268e115fecfa998873dd614e4700bbcd.jpg', 'cc276a359e51751216f34ab9f4fd28d6.jpg', 0, '1'),
(146, '0', '7', '26', '2', 'Othniel Okechukwu', 'greatothniel@gmail.com', '08132299599', 'I need a total maintenance on my CCTV system ', '0', '1', NULL, NULL, '0', '809345', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, 'a60a26f36dfbafe005b438854a170fbf.jpg', '45b6698c414d8f1afe67144f3b71cfc0.jpg', 0, '1'),
(147, '0', '5', '19', '147', 'Rajesh', 'rakesh.iise@gmail.com', '34567543223', 'Test details', '5', '1', NULL, NULL, '0', '445804', '2023-08-25 09:06:46', '1', NULL, 0, '-1', -1, '', '', 0, '1'),
(148, '0', '10', '44', '55', 'Mr James', 'ndymacho@yahoo.com', '07062517404', 'Faulty invertee system. The power supply is malfunctioning with error code E1001', '5', '5', '189', '20', '2', '807976', '2023-09-19 13:53:45', '1', '64e4b28741a74', 1, '1', 0, '', '', 0, '1'),
(149, '0', '4', '17', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '5', '30', '20', '2', '175661', '2023-09-19 13:53:54', '1', NULL, 1, '1', 0, '', '', 0, '1'),
(150, '0', '4', '18', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '5', '120', '50', '2', '178728', '2023-09-19 13:53:56', '1', NULL, 1, '1', 0, '', '', 0, '1'),
(151, '0', '13', '50', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'bbbbb', '0', '1', NULL, NULL, '0', '989891', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(152, '0', '5', '20', '93', 'Chinedu Felix', 'nwankwo.felixc@gmail.com', '07035122262', 'Test', '5', '2', NULL, NULL, '0', '243668', '2023-08-25 09:06:46', '1', NULL, 0, '1', 0, 'debfaa8949c16cb5877fa3a0862e88fd.jpg', '565beb3ca0b7f56b9827435fbf14ca82.jpg', 0, '1'),
(153, '0', '5', '20', '55', 'Rajesh Patel', 'Rajesh.iise@gmail.com', '8860254198', 'Test Details', '0', '1', NULL, NULL, '0', '344446', '2023-08-25 09:06:46', '1', NULL, 0, '', 0, '', '', 0, '1'),
(154, '0', '4', '17', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '5', '57', '20', '2', '262404', '2023-09-19 13:53:59', '1', NULL, 1, '1', 0, '', '', 1, '1'),
(157, '0', '5', '19', '55', 'Tester', 'tester21@gmail.com', '8989213212', 'Tester', '5', '5', '60', '50', '1', '556202', '2023-08-25 11:35:05', '1', '64e891d70c14c', 1, '1', 0, '', '', 0, '1'),
(158, '0', '10', '43', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '3', '30', '20', '1', '424308', '2023-08-25 10:00:21', '1', NULL, 1, '1', 0, '', '', 1, '1'),
(159, '0', '5', '21', '93', 'Chinedu Felix', 'nwankwo.felixc@gmail.com', '07035122262', 'Broken screen', '0', '1', NULL, NULL, '0', '948328', '2023-08-25 11:05:00', '1', NULL, 0, '', 0, 'd3de366564a31e5830966cce140a9330.jpg', '', 0, '1'),
(160, '0', '4', '8', '55', 'James OCHIEZE ', 'ndymacho@hahoo.com', '07062517404', 'AC compressor not coming on', '5', '5', '50', '50', '1', '260675', '2023-08-26 17:15:31', '1', '64ea330120f7a', 1, '1', 0, '', '', 0, '1'),
(161, '0', '5', '20', '55', 'James OCHIEZE ', 'ndymacho@yahoo.com', '07062517404', 'Faulty screen', '5', '5', '100', '50', '1', '362908', '2023-08-26 17:37:30', '1', '64ea383104d72', 1, '1', 0, '', '', 0, '1'),
(162, '0', '5', '20', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '0', '1', NULL, NULL, '0', '925897', '2023-08-28 13:05:44', '1', NULL, 0, '', 0, '38abdb2c9988a1d6fbc38e8967184c6b.jpg', '1be85d542ceadf4e3dec711daeb66268.jpg', 0, '1'),
(163, '0', '4', '14', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '0', '1', NULL, NULL, '0', '661486', '2023-08-28 13:10:58', '1', NULL, 0, '', 0, 'a6e872201d12608c08eea0cb97f2ab20.jpg', '4bd2a4b7922f2d363102e31cb4f8dd0c.jpg', 0, '1'),
(164, '0', '5', '20', '147', 'NirbhaySingh', 'nirbhayiise@gmail.com', '8285672453', 'Test', '0', '1', NULL, NULL, '0', '814068', '2023-08-28 14:05:43', '1', NULL, 0, '', 0, '2cbd45a061b3669c6ffb22dee4d689bc.png, ', 'a49683301150d65da4fe9631d91cc4c5.png', 0, '1'),
(165, '0', '5', '20', '147', 'NirbhaySingh', 'nirbhayiise@gmail.com', '8285672453', 'Test', '0', '1', NULL, NULL, '0', '527789', '2023-08-29 13:21:43', '1', NULL, 0, '', 0, '34b03ada72e45978575d8dc6c9f3e95b.png,%20', 'f586e66dd472d85f1667fcce8382b31c.png', 0, '1'),
(166, '0', '8', '32', '147', 'NirbhaySingh', 'nirbhayiise@gmail.com', '8285672453', 'Test', '5', '2', NULL, NULL, '0', '299797', '2023-09-19 10:13:28', '1', NULL, 0, '1', 0, 'bdac94699a9e73cecd5662c7fc92dbd9.png, ', '13e2ae05e4a1adf2c1c7b317a465215d.png', 0, '1'),
(167, '0', '4', '18', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'tets', '5', '5', '60', '50', '2', '747224', '2023-09-19 15:19:17', '1', 'dmin/paystack', 1, '1', 0, '', '', 0, '1'),
(168, '0', '4', '8', '55', 'Ndudi Ochieze ', 'veronnie5q20@yahoo.com', '08035618660', 'Compressor not starting ', '5', '5', '100', '50', '2', '104959', '2023-09-19 13:53:28', '1', NULL, 0, '1', 0, '3de964812457168cc3c81d4e613488ad.png, ', 'a4b175d31b60c3a332da6b92c8dd40a8.png', 0, '0'),
(169, '0', '10', '43', '55', 'Ndudi Ochieze ', 'veronnie5q20@yahoo.com', '08035618660', 'Installation of Solar panels ', '5', '2', NULL, NULL, '0', '782002', '2023-09-01 14:04:42', '1', NULL, 0, '1', 0, 'fde1867f8d3250d203402c58bb9f8d3f.png, ', 'e66f99dd091f694ebb373c9196de8133.png', 0, '1'),
(170, '0', '5', '20', '55', 'Ndudi Ochieze ', 'veronnie5q20@yahoo.com', '08035618660', 'Screen issues', '5', '5', '100', '50', '2', '158644', '2023-09-19 13:53:25', '1', 'dmin/paystack', 1, '1', 0, '4a395bc09997b7bc9831eb777008b0d1.png, ', '57f62a3e809f5a41250f4bb0dc7c5347.png', 0, '1'),
(171, '0', '7', '26', '2', 'Othniel Okechukwu', 'greatothniel@gmail.com', '08132299599', 'CCTV surveillance: Some cameras are not showing ', '5', '3', NULL, NULL, '0', '739695', '2023-09-19 10:09:03', '1', NULL, 1, '1', 0, 'f91c97223d3547aec061324a3f71d897.jpg', '73a42d97b1a6c4799bc06c2c087de9db.jpg', 0, '1'),
(172, '0', '5', '20', '147', 'NirbhaySingh', 'nirbhayiise@gmail.com', '8285672453', 'Test', '5', '1', NULL, NULL, '0', '163157', '2023-09-19 10:11:29', '1', NULL, 0, '1', -1, 'a1a98066baf1157e9b5ebbc859d9cace.png', 'd49977251e0e82a881c475d30596d2ae.png', 0, '1'),
(173, '0', '4', '9', '55', 'Ndudi Ochieze ', 'veronnie5q20@yahoo.com', '08035618660', 'Faulty handle', '5', '5', '100', '50', '2', '333935', '2023-09-19 13:53:19', '1', 'dmin/paystack', 1, '1', 0, '4a6b03de64b93f2b955fd0fc410a80cf.png', '16196682a145fa6ef9b541e0d624894a.png', 0, '1'),
(174, '0', '4', '17', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '3', NULL, NULL, '0', '111541', '2023-09-19 10:18:36', '1', NULL, 1, '1', 0, '', '', 0, '1'),
(175, '0', '5', '20', '55', 'Ndudi Ochieze ', 'veronnie5q20@yahoo.com', '08035618660', 'Faulty screen', '5', '5', '100', '50', '2', '828012', '2023-09-19 13:51:24', '1', 'dmin/paystack', 1, '1', 0, '3933608bcf839f4e3f02930ed4731c5a.png', 'd61554cc22d25f2aed08b4cd65fb191a.png', 0, '1'),
(176, '0', '10', '43', '55', 'Ndudi Ochieze ', 'veronnie5q20@yahoo.com', '08035618660', 'Faulty screen', '0', '1', NULL, NULL, '0', '340849', '2023-09-20 12:28:13', '1', NULL, 0, '', 0, '7b424f7546f50c42bb6cad77db49d43c.png', '601a36c1aedc2212d8bc1f36bf4f4753.png', 0, '1'),
(177, '0', '8', '51', '21', 'Workman247 IG3 Integ', 'info247workman@gmail.com', '08141240001', 'Make a quote for Production & Painting of 5 Bedroom (Emulsion paint)', '5', '2', NULL, NULL, '0', '298609', '2023-10-04 09:51:24', '1', NULL, 0, '1', 0, '9a6414ddb5fed6946ddae8542aaf566b.jpg', '4135290c61c7f4dbb1c6e203000dcd48.jpg', 0, '1'),
(178, '0', '5', '19', '147', 'NirbhaySingh', 'nirbhayiise@gmail.com', '8285672453', 'Test', '0', '1', NULL, NULL, '0', '814378', '2023-10-11 08:29:15', '1', NULL, 0, '', 0, '36b9121301030b1488595fd35820fc69.png', '9b01ff98ba1e6bd7f077123b60eeb914.png', 0, '1'),
(179, '0', '4', '17', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'test', '5', '3', '10', '20', '1', '628453', '2023-10-16 14:23:24', '1', NULL, 1, '1', 0, '', '', 1, '1'),
(180, '0', '8', '32', '21', 'Workman247 IG3 Integ', 'info247workman@gmail.com', '08141240001', 'kindly quote for Electric wire Installations to cover the Entrance Gate', '5', '2', NULL, NULL, '0', '939143', '2023-10-13 08:28:32', '1', NULL, 0, '1', 0, 'd1c6144e28477cca5afb5fcd734eddcd.jpg', 'f65a5bd8b98e0f712fa37337038e727f.jpg', 0, '1'),
(181, '0', '4', '8', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'hidnd', '0', '1', NULL, NULL, '0', '354576', '2024-01-02 16:07:02', '1', NULL, 0, '', 0, '', '', 0, '1'),
(182, '0', '4', '8', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'hidnd', '5', '2', NULL, NULL, '0', '702056', '2024-01-02 16:14:25', '1', NULL, 0, '1', 0, '', '', 0, '1'),
(183, '0', '4', '8', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'hidnd', '0', '1', NULL, NULL, '0', '800084', '2024-01-02 16:13:12', '1', NULL, 0, '', 0, '', '', 0, '1'),
(184, '0', '4', '17', '55', 'Ndudi  Ochieze ', 'veronnie5q20@yahoo.com', '08035618660', 'The Switch of the electric kettle is bad', '0', '1', NULL, NULL, '0', '537089', '2024-01-08 17:27:42', '1', NULL, 0, '', 0, '', '', 0, '1'),
(185, '0', '4', '17', '55', 'Ndudi  Ochieze ', 'veronnie5q20@yahoo.com', '08035618660', 'The Switch of the electric kettle is bad', '0', '1', NULL, NULL, '0', '345393', '2024-01-08 17:27:49', '1', NULL, 0, '', 0, '', '', 0, '1'),
(186, '0', '4', '17', '55', 'Ndudi  Ochieze ', 'veronnie5q20@yahoo.com', '08035618660', 'The Switch of the electric kettle is bad\n', '0', '1', NULL, NULL, '0', '705488', '2024-01-08 17:28:32', '1', NULL, 0, '', 0, '', '', 0, '1'),
(187, '0', '4', '18', '', ' Mdudi', 'veronnie5q20@gmail.com', '0894384949', 'switch faure', '0', '1', NULL, NULL, '0', '229744', '2024-01-08 17:33:24', '1', NULL, 0, '', 0, '', '', 0, '1'),
(188, '0', '5', '20', '150', 'Adiel Othniel', 'othnielobiahu@live.com', '08144200027', 'My laptop is not powering ', '0', '1', NULL, NULL, '0', '324446', '2024-01-08 19:09:00', '1', NULL, 0, '', 0, '', '', 0, '1'),
(189, '0', '5', '20', '150', 'Adiel Othniel', 'othnielobiahu@live.com', '08144200027', 'My laptop is not powering ', '0', '1', NULL, NULL, '0', '993413', '2024-01-08 19:09:08', '1', NULL, 0, '', 0, '', '', 0, '1'),
(190, '0', '5', '20', '150', 'Adiel Othniel', 'othnielobiahu@live.com', '08144200027', 'My laptop is not powering ', '0', '1', NULL, NULL, '0', '364261', '2024-01-08 19:19:27', '1', NULL, 0, '', 0, '', '', 0, '1'),
(191, '0', '5', '19', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'hii', '0', '1', NULL, NULL, '0', '240871', '2024-01-11 12:31:55', '1', NULL, 0, '', 0, '', '', 0, '1'),
(192, '0', '5', '19', '147', '76868', 'np@gmail.com', '8288888', 'hi', '0', '1', NULL, NULL, '0', '20270', '2024-01-11 13:08:14', '1', NULL, 0, '', 0, '', 'txt.png', 0, '1'),
(193, '0', '5', '19', '147', '76868', 'np@gmail.com', '8288888', 'hi', '0', '1', NULL, NULL, '0', '37820', '2024-01-11 13:09:28', '1', NULL, 0, '', 0, '', 'txt.png', 0, '1'),
(194, '0', '5', '20', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'fufuucuc', '0', '1', NULL, NULL, '0', '28380', '2024-01-11 13:12:20', '1', NULL, 0, '', 0, '', '', 0, '1'),
(195, '0', '5', '20', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'gdgd', '0', '1', NULL, NULL, '0', '73769', '2024-01-11 13:20:31', '1', NULL, 0, '', 0, '', '', 0, '1'),
(196, '0', '5', '20', '147', 'Nirbhay Singh', 'nirbhayiise@gmail.com', '8285672453', 'giii', '0', '1', NULL, NULL, '0', '25282', '2024-01-11 14:04:08', '1', NULL, 0, '', 0, '', '', 0, '1'),
(197, '0', '4', '8', '2', 'Othniel Okechukwu', 'greatothniel@gmail.com', '08132299599', 'Fan is powering', '0', '1', NULL, NULL, '0', '88043', '2024-02-15 05:09:16', '1', NULL, 0, '', 0, '', '', 0, '1'),
(198, '0', '5', '21', '93', 'Chinedu Felix', 'nwankwo.felixc@gmail.com', '07035122262', 'Not charging', '5', '3', '7000', '3000', '1', '13624', '2024-02-17 14:34:17', '1', NULL, 1, '1', 0, '2355afb15c6ce5ccabf8be39dbbd613a.jpg', '91be41db738601b7c2af6aa1d735a9a0.jpg', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `fault_analysis`
--

CREATE TABLE `fault_analysis` (
  `f_id` int(11) NOT NULL,
  `e_id` varchar(10) DEFAULT NULL,
  `c_id` varchar(10) DEFAULT NULL,
  `t_id` varchar(10) DEFAULT NULL,
  `f_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `f_details` text DEFAULT NULL,
  `f_amount` varchar(10) DEFAULT NULL,
  `service_charges` varchar(10) DEFAULT NULL,
  `f_status` varchar(2) DEFAULT NULL,
  `pay_approve` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fault_analysis`
--

INSERT INTO `fault_analysis` (`f_id`, `e_id`, `c_id`, `t_id`, `f_created`, `f_details`, `f_amount`, `service_charges`, `f_status`, `pay_approve`) VALUES
(32, '34', '27', '5', '2022-08-04 12:32:00', 'Bathtub is Broken', '10000', NULL, '1', '1'),
(31, '32', '25', '5', '2022-07-12 18:28:42', 'Floor drain seal is damaged and needs to be replaced.', '2500', NULL, '1', '1'),
(30, '32', '25', '5', '2022-07-12 18:28:53', 'capacitor', '3500', NULL, '1', '1'),
(73, '96', '1', '12', '2023-02-13 10:49:13', 'chfhf', '9', NULL, '1', '1'),
(67, '94', '1', '12', '2023-02-13 07:56:09', 'test', '10', NULL, '1', '1'),
(68, '94', '1', '12', '2023-02-13 07:56:15', 'tes2', '10', NULL, '1', '1'),
(69, '93', '1', '12', '2023-02-13 09:43:25', 'gsgs', '20', NULL, '1', '1'),
(70, '95', '1', '12', '2023-02-13 09:53:17', 'gcgcgc', '10', NULL, '1', '1'),
(71, '95', '1', '12', '2023-02-13 09:53:24', 'hccgcy', '15', NULL, '1', '1'),
(72, '96', '1', '12', '2023-02-13 10:49:18', 'thff', '5', NULL, '1', '1'),
(74, '115', '1', '5', '2023-04-27 13:47:16', 'test1', '10', NULL, '1', '1'),
(75, '115', '1', '5', '2023-04-27 13:47:20', 'test2', '10', NULL, '1', '1'),
(76, '125', '1', '5', '2023-04-28 09:47:44', 'tes', '100', NULL, '1', '1'),
(77, '138', '112', '5', '2023-05-02 11:01:56', 'Laptop screen is bad', NULL, NULL, '1', NULL),
(78, '138', '112', '5', '2023-05-02 11:02:42', 'Installation of new screen', NULL, NULL, '1', NULL),
(79, '139', '147', '5', '2023-05-26 11:28:07', 'test', '20', NULL, '1', '1'),
(80, '139', '147', '5', '2023-05-26 11:28:13', 'test2', '10', NULL, '1', '1'),
(81, '148', '55', '5', '2023-06-29 16:16:23', 'The power board need to be changed', '100', NULL, '1', '1'),
(82, '131', '2', '5', '2023-06-29 16:39:39', 'Display screen is bad', '100', NULL, '1', '1'),
(83, '148', '55', '5', '2023-07-04 06:19:36', 'test', '9', NULL, '1', '1'),
(84, '148', '55', '5', '2023-07-04 06:19:41', 'test', '80', NULL, '1', '1'),
(85, '149', '147', '5', '2023-07-04 08:44:56', 'test ios', '10', NULL, '1', '1'),
(86, '149', '147', '5', '2023-07-04 08:45:04', 'test ios 2', '20', NULL, '1', '1'),
(87, '149', '147', '5', '2023-07-13 17:41:56', 'vjvjcj', NULL, NULL, '1', NULL),
(88, '149', '147', '5', '2023-07-13 17:41:59', 'ufucuc', NULL, NULL, '1', NULL),
(89, '149', '147', '5', '2023-07-13 17:42:10', 'chchchchc', NULL, NULL, '1', NULL),
(90, '149', '147', '5', '2023-07-13 17:42:13', 'hchchcuu', NULL, NULL, '1', NULL),
(91, '149', '147', '5', '2023-07-13 17:42:15', 'vivivu', NULL, NULL, '1', NULL),
(92, '150', '147', '5', '2023-07-13 17:54:10', 'gas pipe cut', '20', NULL, '1', '1'),
(93, '150', '147', '5', '2023-07-13 17:54:17', 'regulator not working', '100', NULL, '1', '1'),
(94, '154', '147', '5', '2023-08-24 11:43:02', 'test', '12', NULL, '1', '1'),
(95, '154', '147', '5', '2023-08-24 11:43:09', 'testÃ¨', '22', NULL, '1', '1'),
(96, '154', '147', '5', '2023-08-24 11:43:14', 'tested', '23', NULL, '1', '1'),
(97, '157', '55', '5', '2023-08-25 06:50:03', 'test1', '20', NULL, '1', '1'),
(98, '157', '55', '5', '2023-08-25 06:50:09', 'test2', '40', NULL, '1', '1'),
(99, '158', '147', '5', '2023-08-25 09:10:24', 'test', '20', NULL, '1', '1'),
(100, '158', '147', '5', '2023-08-25 09:10:30', 'test', '10', NULL, '1', '1'),
(101, '160', '55', '5', '2023-08-26 17:12:11', 'Power fuse is bad', '50', NULL, '1', '1'),
(102, '161', '55', '5', '2023-08-26 17:34:30', '15â€ Lenovo L470 screen need to be changed', '100', NULL, '1', '1'),
(103, '167', '147', '5', '2023-09-01 06:43:42', 'test', '10', NULL, '1', '1'),
(104, '167', '147', '5', '2023-09-01 06:43:49', 'test', '50', NULL, '1', '1'),
(105, '168', '55', '5', '2023-09-01 13:57:46', 'Gas refill', '100', NULL, '1', '1'),
(106, '170', '55', '5', '2023-09-05 13:07:18', 'Screen is bad', '100', NULL, '1', '1'),
(107, '173', '55', '5', '2023-09-12 13:11:17', 'Power fuse is bad', '100', NULL, '1', '1'),
(108, '174', '147', '5', '2023-09-19 13:38:45', 'Fuse is bad', NULL, NULL, '1', NULL),
(109, '174', '147', '5', '2023-09-19 13:40:56', 'Replace Plug', NULL, NULL, '1', NULL),
(110, '175', '55', '5', '2023-09-19 13:46:43', 'Replace 13amps plug', '100', NULL, '1', '1'),
(111, '179', '147', '5', '2023-10-11 08:34:10', 'test1', '10', NULL, '1', '1'),
(112, '198', '93', '5', '2024-02-17 14:33:49', 'Capacitor is bad', '4000', NULL, '1', '1'),
(113, '198', '93', '5', '2024-02-17 14:33:59', 'power i.c bad', '3000', NULL, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `lga`
--

CREATE TABLE `lga` (
  `lid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `lganame` varchar(150) NOT NULL,
  `ishost` bit(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lga`
--

INSERT INTO `lga` (`lid`, `sid`, `lganame`, `ishost`) VALUES
(1, 1, 'Aba-North', b'11111'),
(2, 1, 'Aba-South', b'11111'),
(3, 1, 'Arochukwu', b'11111'),
(4, 1, 'Bende', b'11111'),
(5, 1, 'Ikwuano', b'11111'),
(6, 1, 'Isiala-Ngwa-North', b'11111'),
(7, 1, 'Isiala-Ngwa-South', b'11111'),
(8, 1, 'Isuikwuato', b'11111'),
(9, 1, 'Obi-Nwga', b'11111'),
(10, 1, 'Ohafia', b'11111'),
(11, 1, 'Osisioma', b'11111'),
(12, 1, 'Ugwunagbo', b'11111'),
(13, 1, 'Ukwa-East', b'11111'),
(14, 1, 'Ukwa-West', b'11111'),
(15, 1, 'Umuahia-North', b'11111'),
(16, 1, 'Umuahia-South', b'11111'),
(17, 1, 'Umu-Nneochi', b'11111'),
(18, 2, 'Demsa', b'11111'),
(19, 2, 'Fufure', b'11111'),
(20, 2, 'Ganye', b'11111'),
(21, 2, 'Gayuk', b'11111'),
(22, 2, 'Gombi', b'11111'),
(23, 2, 'Grie', b'11111'),
(24, 2, 'Hong', b'11111'),
(25, 2, 'Jada', b'11111'),
(26, 2, 'Larmurde', b'11111'),
(27, 2, 'Madgali', b'11111'),
(28, 2, 'Maiha', b'11111'),
(29, 2, 'Mayo-Belwa', b'11111'),
(30, 2, 'Michika', b'11111'),
(31, 2, 'Mobi-North', b'11111'),
(32, 2, 'Mobi-South', b'11111'),
(33, 2, 'Numan', b'11111'),
(34, 2, 'Shelleng', b'11111'),
(35, 2, 'Song', b'11111'),
(36, 2, 'Teungo', b'11111'),
(37, 2, 'Yola-North', b'11111'),
(38, 2, 'Yola-South', b'11111'),
(39, 3, 'Abak', b'11111'),
(40, 3, 'Eastern-Obolo', b'11111'),
(41, 3, 'Eket', b'11111'),
(42, 3, 'Esit-Eket', b'11111'),
(43, 3, 'Essien Udim', b'11111'),
(44, 3, 'Etim-Ekpo', b'11111'),
(45, 3, 'Etinan', b'11111'),
(46, 3, 'Ibeno', b'11111'),
(47, 3, 'Ibesikpo-Asutan', b'11111'),
(48, 3, 'Ibiono-Ibom', b'11111'),
(49, 3, 'Ika', b'11111'),
(50, 3, 'Ikono', b'11111'),
(51, 3, 'Ikot-Abasi', b'11111'),
(52, 3, 'Ikot-Ekpene', b'11111'),
(53, 3, 'Ini', b'11111'),
(54, 3, 'Itu', b'11111'),
(55, 3, 'Mbo', b'11111'),
(56, 3, 'Mpkat-Enin', b'11111'),
(57, 3, 'Nsit-Atai', b'11111'),
(58, 3, 'Nsit-Ibom', b'11111'),
(59, 3, 'Nsit-Ubuim', b'11111'),
(60, 3, 'Obot-Akara', b'11111'),
(61, 3, 'Okobo', b'11111'),
(62, 3, 'Onna', b'11111'),
(63, 3, 'Oron', b'11111'),
(64, 3, 'Oruk Anam', b'11111'),
(65, 3, 'Udung-Uko', b'11111'),
(66, 3, 'Ukanafun', b'11111'),
(67, 3, 'Uruan', b'11111'),
(68, 3, 'Urue-Offong/Oruko', b'11111'),
(69, 3, 'Uyo', b'11111'),
(70, 4, 'Aguata', b'11111'),
(71, 4, 'Anambra-East', b'11111'),
(72, 4, 'Anambra-West', b'11111'),
(73, 4, 'Anaocha', b'11111'),
(74, 4, 'Awka-North', b'11111'),
(75, 4, 'Awka-South', b'11111'),
(76, 4, 'Ayamelum', b'11111'),
(77, 4, 'Dunukofia', b'11111'),
(78, 4, 'Ekwusigo', b'11111'),
(79, 4, 'Idemili-North', b'11111'),
(80, 4, 'Idemili-South', b'11111'),
(81, 4, 'Ihiala', b'11111'),
(82, 4, 'Njikoka', b'11111'),
(83, 4, 'Nnewi-North', b'11111'),
(84, 4, 'Nnewi-South', b'11111'),
(85, 4, 'Ogbaru', b'11111'),
(86, 4, 'Onitsha-North', b'11111'),
(87, 4, 'Onitsha-south', b'11111'),
(88, 4, 'Orumba-North', b'11111'),
(89, 4, 'Orumba-South', b'11111'),
(90, 4, 'Oyi', b'11111'),
(91, 5, 'Alkaleri', b'11111'),
(92, 5, 'Bauchi', b'11111'),
(93, 5, 'Bogoro', b'11111'),
(94, 5, 'Damban', b'11111'),
(95, 5, 'Darazo', b'11111'),
(96, 5, 'Dass', b'11111'),
(97, 5, 'Gamawa', b'11111'),
(98, 5, 'Ganjuwa', b'11111'),
(99, 5, 'Giade', b'11111'),
(100, 5, 'Itas/Gadau', b'11111'),
(101, 5, 'Jama\'are', b'11111'),
(102, 5, 'Katagun', b'11111'),
(103, 5, 'Kirfi', b'11111'),
(104, 5, 'Misau', b'11111'),
(105, 5, 'Ningi', b'11111'),
(106, 5, 'Shira', b'11111'),
(107, 5, 'Tafawa-Balewa', b'11111'),
(108, 5, 'Toro', b'11111'),
(109, 5, 'Warji', b'11111'),
(110, 5, 'Zakki', b'11111'),
(111, 6, 'Brass', b'11111'),
(112, 6, 'Ekeremor', b'11111'),
(113, 6, 'Kolokuma/Opokuma', b'11111'),
(114, 6, 'Nembe', b'11111'),
(115, 6, 'Ogbia', b'11111'),
(116, 6, 'Sagbama', b'11111'),
(117, 6, 'Southern-Ijaw', b'11111'),
(118, 6, 'Yenagoa', b'11111'),
(119, 7, 'Ado', b'11111'),
(120, 7, 'Agatu', b'11111'),
(121, 7, 'Apa', b'11111'),
(122, 7, 'Buruku', b'11111'),
(123, 7, 'Gboko', b'11111'),
(124, 7, 'Guma', b'11111'),
(125, 7, 'Gwer-East', b'11111'),
(126, 7, 'Gwer-West', b'11111'),
(127, 7, 'Katsina-Ala', b'11111'),
(128, 7, 'Konshisha', b'11111'),
(129, 7, 'Kwande', b'11111'),
(130, 7, 'Logo', b'11111'),
(131, 7, 'Makurdi', b'11111'),
(132, 7, 'Obi', b'11111'),
(133, 7, 'Ogbadibo', b'11111'),
(134, 7, 'Ohimini', b'11111'),
(135, 7, 'Oju', b'11111'),
(136, 7, 'Okpokwu', b'11111'),
(137, 7, 'Oturkpo', b'11111'),
(138, 7, 'Tarka', b'11111'),
(139, 7, 'Ukum', b'11111'),
(140, 7, 'Ushongo', b'11111'),
(141, 7, 'Vandeikya', b'11111'),
(142, 8, 'Abadam', b'11111'),
(143, 8, 'Askira/Uba', b'11111'),
(144, 8, 'Bama', b'11111'),
(145, 8, 'Bayo', b'11111'),
(146, 8, 'Biu', b'11111'),
(147, 8, 'Chibok', b'11111'),
(148, 8, 'Damboa', b'11111'),
(149, 8, 'Dikwa', b'11111'),
(150, 8, 'Gubio', b'11111'),
(151, 8, 'Guzamala', b'11111'),
(152, 8, 'Gwoza', b'11111'),
(153, 8, 'Hawul', b'11111'),
(154, 8, 'Jere', b'11111'),
(155, 8, 'Kaga', b'11111'),
(156, 8, 'Kala/Balge', b'11111'),
(157, 8, 'Konduga', b'11111'),
(158, 8, 'Kukawa', b'11111'),
(159, 8, 'Kwaya-Kusar', b'11111'),
(160, 8, 'Mafa', b'11111'),
(161, 8, 'Magumeri', b'11111'),
(162, 8, 'Maiduguri', b'11111'),
(163, 8, 'Marte', b'11111'),
(164, 8, 'Mobbar', b'11111'),
(165, 8, 'Monguno', b'11111'),
(166, 8, 'Ngala', b'11111'),
(167, 8, 'Nganzai', b'11111'),
(168, 8, 'Shani', b'11111'),
(169, 9, 'Abi', b'11111'),
(170, 9, 'Akamkpa', b'11111'),
(171, 9, 'Akpabuyo', b'11111'),
(172, 9, 'Bakassi', b'11111'),
(173, 9, 'Bekwarra', b'11111'),
(174, 9, 'Biase', b'11111'),
(175, 9, 'Calabar-Municipal', b'11111'),
(176, 9, 'Calabar-South', b'11111'),
(177, 9, 'Etung', b'11111'),
(178, 9, 'Ikom', b'11111'),
(179, 9, 'Obanliku', b'11111'),
(180, 9, 'Obubra', b'11111'),
(181, 9, 'Obudu', b'11111'),
(182, 9, 'Odukpani', b'11111'),
(183, 9, 'Ogoja', b'11111'),
(184, 9, 'Yakurr', b'11111'),
(185, 9, 'Yala', b'11111'),
(186, 10, 'Aniocha-North', b'11111'),
(187, 10, 'Aniocha-South', b'11111'),
(188, 10, 'Bomadi', b'11111'),
(189, 10, 'Burutu', b'11111'),
(190, 10, 'Ethiope-East', b'11111'),
(191, 10, 'Ethiope-West', b'11111'),
(192, 10, 'Ika-North', b'11111'),
(193, 10, 'Ika-South', b'11111'),
(194, 10, 'Isoko-North', b'11111'),
(195, 10, 'Isoko-South', b'11111'),
(196, 10, 'Ndokwa-East', b'11111'),
(197, 10, 'Ndokwa-West', b'11111'),
(198, 10, 'Okpe', b'11111'),
(199, 10, 'Oshimili-North', b'11111'),
(200, 10, 'Oshimili-South', b'11111'),
(201, 10, 'Patani', b'11111'),
(202, 10, 'Sapele', b'11111'),
(203, 10, 'Udu', b'11111'),
(204, 10, 'Ughelli-North', b'11111'),
(205, 10, 'Ughelli-South', b'11111'),
(206, 10, 'Ukwuani', b'11111'),
(207, 10, 'Uvwie', b'11111'),
(208, 10, 'Warri-North', b'11111'),
(209, 10, 'Warri-South', b'11111'),
(210, 10, 'Warri-South-West', b'11111'),
(211, 11, 'Abakaliki', b'11111'),
(212, 11, 'Afikpo-North', b'11111'),
(213, 11, 'Afikpo-South', b'11111'),
(214, 11, 'Ebonyi', b'11111'),
(215, 11, 'Ezza-North', b'11111'),
(216, 11, 'Ezza-South', b'11111'),
(217, 11, 'Ikwo', b'11111'),
(218, 11, 'Ishielu', b'11111'),
(219, 11, 'Ivo', b'11111'),
(220, 11, 'Izzi', b'11111'),
(221, 11, 'Ohaozara', b'11111'),
(222, 11, 'Ohaukwu', b'11111'),
(223, 11, 'Onicha', b'11111'),
(224, 12, 'Akoko-Edo', b'11111'),
(225, 12, 'Egor', b'11111'),
(226, 12, 'Esan-Central', b'11111'),
(227, 12, 'Esan-North-East', b'11111'),
(228, 12, 'Esan-South-East', b'11111'),
(229, 12, 'Esan-West', b'11111'),
(230, 12, 'Etsako-Central', b'11111'),
(231, 12, 'Etsako-East', b'11111'),
(232, 12, 'Etsako-West', b'11111'),
(233, 12, 'Iguegben', b'11111'),
(234, 12, 'Ikpoba-Okha', b'11111'),
(235, 12, 'Ohionmwon', b'11111'),
(236, 12, 'Oredo', b'11111'),
(237, 12, 'Ovia-North-East', b'11111'),
(238, 12, 'Ovia-South-West', b'11111'),
(239, 12, 'Owan-East', b'11111'),
(240, 12, 'Owan-West', b'11111'),
(241, 12, 'Uhunmwonde', b'11111'),
(242, 13, 'Ado-Ekiti', b'11111'),
(243, 13, 'Efon', b'11111'),
(244, 13, 'Ekiti-East', b'11111'),
(245, 13, 'Ekiti-South-West', b'11111'),
(246, 13, 'Ekiti-West', b'11111'),
(247, 13, 'Emure', b'11111'),
(248, 13, 'Gbonyin', b'11111'),
(249, 13, 'Ido-Osi', b'11111'),
(250, 13, 'Ijero', b'11111'),
(251, 13, 'Ikere', b'11111'),
(252, 13, 'Ikole', b'11111'),
(253, 13, 'Ilejemeje', b'11111'),
(254, 13, 'Irepodun/Ifelodun', b'11111'),
(255, 13, 'Ise/Orun', b'11111'),
(256, 13, 'Moba', b'11111'),
(257, 13, 'Oye', b'11111'),
(258, 14, 'Aninri', b'11111'),
(259, 14, 'Awgu', b'11111'),
(260, 14, 'Enugu-East', b'11111'),
(261, 14, 'Enugu-North', b'11111'),
(262, 14, 'Enugu-South', b'11111'),
(263, 14, 'Ezeagu', b'11111'),
(264, 14, 'Igbo=Etiti', b'11111'),
(265, 14, 'Igbo-Eze-North', b'11111'),
(266, 14, 'Igbo-Eze-South', b'11111'),
(267, 14, 'Isi-Uzo', b'11111'),
(268, 14, 'Nkanu-East', b'11111'),
(269, 14, 'Nkanu-West', b'11111'),
(270, 14, 'Nsukka', b'11111'),
(271, 14, 'Oji-River', b'11111'),
(272, 14, 'Udenu', b'11111'),
(273, 14, 'Udi', b'11111'),
(274, 14, 'Uzo-Uwani', b'11111'),
(275, 15, 'Abaji', b'11111'),
(276, 15, 'Bwari', b'11111'),
(277, 15, 'Gwagwalada', b'11111'),
(278, 15, 'Kuje', b'11111'),
(279, 15, 'Kwali', b'11111'),
(280, 15, 'Municipal-Area-Council', b'11111'),
(281, 16, 'Akko', b'11111'),
(282, 16, 'Balanga', b'11111'),
(283, 16, 'Billiri', b'11111'),
(284, 16, 'Dukku', b'11111'),
(285, 16, 'Funakaye', b'11111'),
(286, 16, 'Gombe', b'11111'),
(287, 16, 'Kaltungo', b'11111'),
(288, 16, 'Kwani', b'11111'),
(289, 16, 'Nafada', b'11111'),
(290, 16, 'Shomgom', b'11111'),
(291, 16, 'Yamaltu/Deba', b'11111'),
(292, 17, 'Aboh-Mbaise', b'11111'),
(293, 17, 'Ahiazu', b'11111'),
(294, 17, 'Ehime-Mbano', b'11111'),
(295, 17, 'Ezinihitte', b'11111'),
(296, 17, 'Ideato-North', b'11111'),
(297, 17, 'Ideato-South', b'11111'),
(298, 17, 'Ihitte/Uboma', b'11111'),
(299, 17, 'Ikeduru', b'11111'),
(300, 17, 'Isiala-Mbano', b'11111'),
(301, 17, 'Isu', b'11111'),
(302, 17, 'Mbatoli', b'11111'),
(303, 17, 'Ngor-Okpala', b'11111'),
(304, 17, 'Njaba', b'11111'),
(305, 17, 'Nkwerre', b'11111'),
(306, 17, 'Nwangele', b'11111'),
(307, 17, 'Obowo', b'11111'),
(308, 17, 'Oguta', b'11111'),
(309, 17, 'Ohaji/Egbema', b'11111'),
(310, 17, 'Okigwe', b'11111'),
(311, 17, 'Orlu', b'11111'),
(312, 17, 'Orsu', b'11111'),
(313, 17, 'Oru-East', b'11111'),
(314, 17, 'Oru-West', b'11111'),
(315, 17, 'Owerri-Municipal', b'11111'),
(316, 17, 'Owerri-North', b'11111'),
(317, 17, 'Owerri-west', b'11111'),
(318, 17, 'Unuimo', b'11111'),
(319, 18, 'Auyo', b'11111'),
(320, 18, 'Babura', b'11111'),
(321, 18, 'Biriniwa', b'11111'),
(322, 18, 'Birnin-Kudu', b'11111'),
(323, 18, 'Buji', b'11111'),
(324, 18, 'Dutse', b'11111'),
(325, 18, 'Gagarawa', b'11111'),
(326, 18, 'Garki', b'11111'),
(327, 18, 'Gumel', b'11111'),
(328, 18, 'Guri', b'11111'),
(329, 18, 'Gwaram', b'11111'),
(330, 18, 'Gwiwa', b'11111'),
(331, 18, 'Hadejia', b'11111'),
(332, 18, 'Jahun', b'11111'),
(333, 18, 'Kafin-Hausa', b'11111'),
(334, 18, 'Kazuare', b'11111'),
(335, 18, 'Kiri-Kasama', b'11111'),
(336, 18, 'kiyawa', b'11111'),
(337, 18, 'Kuagama', b'11111'),
(338, 18, 'Maigatari', b'11111'),
(339, 18, 'Malam-Maduri', b'11111'),
(340, 18, 'Miga', b'11111'),
(341, 18, 'Ringim', b'11111'),
(342, 18, 'Roni', b'11111'),
(343, 18, 'Sule-Tankakar', b'11111'),
(344, 18, 'Taura', b'11111'),
(345, 18, 'Yankwashi', b'11111'),
(346, 19, 'Birnin-Gwari', b'11111'),
(347, 19, 'Chikun', b'11111'),
(348, 19, 'Giwa', b'11111'),
(349, 19, 'Igabi', b'11111'),
(350, 19, 'Ikara', b'11111'),
(351, 19, 'Jaba', b'11111'),
(352, 19, 'Jema\'a', b'11111'),
(353, 19, 'Kachia', b'11111'),
(354, 19, 'Kaduna-North', b'11111'),
(355, 19, 'kaduna-South', b'11111'),
(356, 19, 'Kagarko', b'11111'),
(357, 19, 'Kajuru', b'11111'),
(358, 19, 'Kaura', b'11111'),
(359, 19, 'Kauru', b'11111'),
(360, 19, 'Kubau', b'11111'),
(361, 19, 'Kudan', b'11111'),
(362, 19, 'Lere', b'11111'),
(363, 19, 'Makarfi', b'11111'),
(364, 19, 'Sabon-Gari', b'11111'),
(365, 19, 'Sanga', b'11111'),
(366, 19, 'Soba', b'11111'),
(367, 19, 'Zangon-Kataf', b'11111'),
(368, 19, 'Zaria', b'11111'),
(369, 20, 'Ajingi', b'11111'),
(370, 20, 'Albasu', b'11111'),
(371, 20, 'Bagwai', b'11111'),
(372, 20, 'Bebeji', b'11111'),
(373, 20, 'Bichi', b'11111'),
(374, 20, 'Bunkure', b'11111'),
(375, 20, 'Dala', b'11111'),
(376, 20, 'Dambatta', b'11111'),
(377, 20, 'Dawakin-Kudu', b'11111'),
(378, 20, 'Dawakin-Tofa', b'11111'),
(379, 20, 'Doguwa', b'11111'),
(380, 20, 'Fagge', b'11111'),
(381, 20, 'Gabasawa', b'11111'),
(382, 20, 'Garko', b'11111'),
(383, 20, 'Garum-Mallam', b'11111'),
(384, 20, 'Gaya', b'11111'),
(385, 20, 'Gazewa', b'11111'),
(386, 20, 'Gwale', b'11111'),
(387, 20, 'Gwarzo', b'11111'),
(388, 20, 'Kabo', b'11111'),
(389, 20, 'Kano-Municipal', b'11111'),
(390, 20, 'Karaye', b'11111'),
(391, 20, 'Kibiya', b'11111'),
(392, 20, 'Kiru', b'11111'),
(393, 20, 'Kumbotso', b'11111'),
(394, 20, 'Kunchi', b'11111'),
(395, 20, 'Kura', b'11111'),
(396, 20, 'Madobi', b'11111'),
(397, 20, 'Makoda', b'11111'),
(398, 20, 'Minjibir', b'11111'),
(399, 20, 'Nasarawa', b'11111'),
(400, 20, 'Rano', b'11111'),
(401, 20, 'Rimin-Gado', b'11111'),
(402, 20, 'Rogo', b'11111'),
(403, 20, 'Shanono', b'11111'),
(404, 20, 'Sumaila', b'11111'),
(405, 20, 'Takai', b'11111'),
(406, 20, 'Tarauni', b'11111'),
(407, 20, 'Tofa', b'11111'),
(408, 20, 'Tsanyawa', b'11111'),
(409, 20, 'Tudun-Wada', b'11111'),
(410, 20, 'Ungogo', b'11111'),
(411, 20, 'Warawa', b'11111'),
(412, 20, 'Wudil', b'11111'),
(413, 21, 'Bakori', b'11111'),
(414, 21, 'Batagarawa', b'11111'),
(415, 21, 'Batsari', b'11111'),
(416, 21, 'Baure', b'11111'),
(417, 21, 'Bindawa', b'11111'),
(418, 21, 'Charanchi', b'11111'),
(419, 21, 'Dandume', b'11111'),
(420, 21, 'Danja', b'11111'),
(421, 21, 'Dan-Musa', b'11111'),
(422, 21, 'Daura', b'11111'),
(423, 21, 'Dutsi', b'11111'),
(424, 21, 'Dutsin-Ma', b'11111'),
(425, 21, 'Faskari', b'11111'),
(426, 21, 'Funtua', b'11111'),
(427, 21, 'Ingawa', b'11111'),
(428, 21, 'Jibia', b'11111'),
(429, 21, 'Kafur', b'11111'),
(430, 21, 'kaita', b'11111'),
(431, 21, 'Kankara', b'11111'),
(432, 21, 'Kankia', b'11111'),
(433, 21, 'Katsina', b'11111'),
(434, 21, 'Kurfi', b'11111'),
(435, 21, 'Kusada', b'11111'),
(436, 21, 'Mai\'Adua', b'11111'),
(437, 21, 'Malumfashi', b'11111'),
(438, 21, 'Mani', b'11111'),
(439, 21, 'Mashi', b'11111'),
(440, 21, 'Matazu', b'11111'),
(441, 21, 'Musawa', b'11111'),
(442, 21, 'Rimi', b'11111'),
(443, 21, 'Sabuwa', b'11111'),
(444, 21, 'Safana', b'11111'),
(445, 21, 'Sandamu', b'11111'),
(446, 21, 'Zango', b'11111'),
(447, 22, 'Aleiro', b'11111'),
(448, 22, 'Arewa-Dandi', b'11111'),
(449, 22, 'Argungu', b'11111'),
(450, 22, 'Augie', b'11111'),
(451, 22, 'Bagudo', b'11111'),
(452, 22, 'Birnin-Kebbi', b'11111'),
(453, 22, 'Bunza', b'11111'),
(454, 22, 'Dandi', b'11111'),
(455, 22, 'Fakai', b'11111'),
(456, 22, 'Gwandu', b'11111'),
(457, 22, 'Jega', b'11111'),
(458, 22, 'Kalgo', b'11111'),
(459, 22, 'Koko/Besse', b'11111'),
(460, 22, 'Maiyama', b'11111'),
(461, 22, 'Ngaski', b'11111'),
(462, 22, 'Sakaba', b'11111'),
(463, 22, 'Shanga', b'11111'),
(464, 22, 'Suru', b'11111'),
(465, 22, 'Wasagu/Danko', b'11111'),
(466, 22, 'Yauri', b'11111'),
(467, 22, 'Zuru', b'11111'),
(468, 23, 'Adavi', b'11111'),
(469, 23, 'Ajaokuta', b'11111'),
(470, 23, 'Ankpa', b'11111'),
(471, 23, 'Bassa', b'11111'),
(472, 23, 'Dekina', b'11111'),
(473, 23, 'Ibaji', b'11111'),
(474, 23, 'Idah', b'11111'),
(475, 23, 'Igalamela-Odolu', b'11111'),
(476, 23, 'Ijumu', b'11111'),
(477, 23, 'Kabba/Bunu', b'11111'),
(478, 23, 'Kogi', b'11111'),
(479, 23, 'Lokoja', b'11111'),
(480, 23, 'Mopa-Muro', b'11111'),
(481, 23, 'Ofu', b'11111'),
(482, 23, 'Ogori/Magongo', b'11111'),
(483, 23, 'Okehi', b'11111'),
(484, 23, 'Okene', b'11111'),
(485, 23, 'Olamaboro', b'11111'),
(486, 23, 'Omala', b'11111'),
(487, 23, 'Yagba-East', b'11111'),
(488, 23, 'Yagba-West', b'11111'),
(489, 24, 'Asa', b'11111'),
(490, 24, 'Baruten', b'11111'),
(491, 24, 'Edu', b'11111'),
(492, 24, 'Ekiti', b'11111'),
(493, 24, 'Ifelodun', b'11111'),
(494, 24, 'Ilorin-East', b'11111'),
(495, 24, 'Ilorin-South', b'11111'),
(496, 24, 'Ilorin-west', b'11111'),
(497, 24, 'Irepodun', b'11111'),
(498, 24, 'Isin', b'11111'),
(499, 24, 'Kaiama', b'11111'),
(500, 24, 'Moro', b'11111'),
(501, 24, 'Offa', b'11111'),
(502, 24, 'Oke-oro', b'11111'),
(503, 24, 'Oyun', b'11111'),
(504, 24, 'Pategi', b'11111'),
(505, 25, 'Agege', b'11111'),
(506, 25, 'Ajeromi/Ifelodun', b'11111'),
(507, 25, 'Alimosho', b'11111'),
(508, 25, 'Amuwo-Odofin', b'11111'),
(509, 25, 'Apapa', b'11111'),
(510, 25, 'Badagry', b'11111'),
(511, 25, 'Epe', b'11111'),
(512, 25, 'Eti-osa', b'11111'),
(513, 25, 'Ibeju-lekki', b'11111'),
(514, 25, 'Ifako/Ijaye', b'11111'),
(515, 25, 'Ikeja', b'11111'),
(516, 25, 'Ikorodu', b'11111'),
(517, 25, 'Kosofe', b'11111'),
(518, 25, 'Lagos Island', b'11111'),
(519, 25, 'Lagos Mainland', b'11111'),
(520, 25, 'Mushin', b'11111'),
(521, 25, 'Ojo', b'11111'),
(522, 25, 'Oshodi/Isolo', b'11111'),
(523, 25, 'Shomolu', b'11111'),
(524, 25, 'Surulere', b'11111'),
(525, 26, 'Akwanga', b'11111'),
(526, 26, 'Awe', b'11111'),
(527, 26, 'Doma', b'11111'),
(528, 26, 'Karu', b'11111'),
(529, 26, 'Keana', b'11111'),
(530, 26, 'Keffi', b'11111'),
(531, 26, 'Kokona', b'11111'),
(532, 26, 'Lafia', b'11111'),
(533, 26, 'Nasarawa', b'11111'),
(534, 26, 'Nasarawa-Egon', b'11111'),
(535, 26, 'Obi', b'11111'),
(536, 26, 'Toto', b'11111'),
(537, 26, 'Wamba', b'11111'),
(538, 27, 'Agaie', b'11111'),
(539, 27, 'Agawara', b'11111'),
(540, 27, 'Bida', b'11111'),
(541, 27, 'Borgu', b'11111'),
(542, 27, 'Bosso', b'11111'),
(543, 27, 'Chanchaga', b'11111'),
(544, 27, 'Edati', b'11111'),
(545, 27, 'Gbako', b'11111'),
(546, 27, 'Gurara', b'11111'),
(547, 27, 'Katcha', b'11111'),
(548, 27, 'Kontagora', b'11111'),
(549, 27, 'Lapai', b'11111'),
(550, 27, 'Lavun', b'11111'),
(551, 27, 'Magama', b'11111'),
(552, 27, 'Mariga', b'11111'),
(553, 27, 'Mashegu', b'11111'),
(554, 27, 'Mokwa', b'11111'),
(555, 27, 'Moya', b'11111'),
(556, 27, 'Paikoro', b'11111'),
(557, 27, 'Rafi', b'11111'),
(558, 27, 'Rijau', b'11111'),
(559, 27, 'Shiroro', b'11111'),
(560, 27, 'Suleja', b'11111'),
(561, 27, 'Tafa', b'11111'),
(562, 27, 'Wushishi', b'11111'),
(563, 28, 'Abeokuta-north', b'11111'),
(564, 28, 'Abeokuta-south', b'11111'),
(565, 28, 'Ado-Odo/Ota', b'11111'),
(566, 28, 'Egbado-North', b'11111'),
(567, 28, 'Egbado-South', b'11111'),
(568, 28, 'Ewekoro', b'11111'),
(569, 28, 'Ifo', b'11111'),
(570, 28, 'Ijebu-East', b'11111'),
(571, 28, 'Ijebu-North', b'11111'),
(572, 28, 'Ijebu-North-East', b'11111'),
(573, 28, 'Ijebu-ode', b'11111'),
(574, 28, 'Ikenne', b'11111'),
(575, 28, 'Imeko-Afon', b'11111'),
(576, 28, 'Ipokia', b'11111'),
(577, 28, 'Obafemi-Owode', b'11111'),
(578, 28, 'Odeda', b'11111'),
(579, 28, 'Odogbolu', b'11111'),
(580, 28, 'Ogun-waterfront', b'11111'),
(581, 28, 'Remo-North', b'11111'),
(582, 28, 'Shagamu', b'11111'),
(583, 29, 'Akoko-North-East', b'11111'),
(584, 29, 'Akoko-North-West', b'11111'),
(585, 29, 'Akoko-South-East', b'11111'),
(586, 29, 'Akoko-South-West', b'11111'),
(587, 29, 'Akure-North', b'11111'),
(588, 29, 'Akure-South', b'11111'),
(589, 29, 'Ese-Odo', b'11111'),
(590, 29, 'Idanre', b'11111'),
(591, 29, 'Ifedore', b'11111'),
(592, 29, 'ijaye', b'11111'),
(593, 29, 'Ile-Oluji-Okeigbo', b'11111'),
(594, 29, 'Irele', b'11111'),
(595, 29, 'Odigbo', b'11111'),
(596, 29, 'Okitipupa', b'11111'),
(597, 29, 'Ondo-East', b'11111'),
(598, 29, 'Ondo-west', b'11111'),
(599, 29, 'Ose', b'11111'),
(600, 29, 'Owo', b'11111'),
(601, 30, 'Atakunmosa-East', b'11111'),
(602, 30, 'Atakunmosa-West', b'11111'),
(603, 30, 'Ayedaade', b'11111'),
(604, 30, 'Ayedire', b'11111'),
(605, 30, 'Boluwaduro', b'11111'),
(606, 30, 'Boripe', b'11111'),
(607, 30, 'Ede-North', b'11111'),
(608, 30, 'Ede-South', b'11111'),
(609, 30, 'Egbedore', b'11111'),
(610, 30, 'Ejigbo', b'11111'),
(611, 30, 'Ife-Central', b'11111'),
(612, 30, 'Ifedayo', b'11111'),
(613, 30, 'Ife-East', b'11111'),
(614, 30, 'Ifelodun', b'11111'),
(615, 30, 'Ife-North', b'11111'),
(616, 30, 'Ife-South', b'11111'),
(617, 30, 'Ila', b'11111'),
(618, 30, 'Ilesha-East', b'11111'),
(619, 30, 'Ilesha-West', b'11111'),
(620, 30, 'Irepodun', b'11111'),
(621, 30, 'Irewole', b'11111'),
(622, 30, 'Isokan', b'11111'),
(623, 30, 'Iwo', b'11111'),
(624, 30, 'Obokun', b'11111'),
(625, 30, 'Odo-otin', b'11111'),
(626, 30, 'Ola-oluwa', b'11111'),
(627, 30, 'Olorunda', b'11111'),
(628, 30, 'Oriade', b'11111'),
(629, 30, 'Orolu', b'11111'),
(630, 30, 'Osogbo', b'11111'),
(631, 31, 'Afijio', b'11111'),
(632, 31, 'Akinyele', b'11111'),
(633, 31, 'Atiba', b'11111'),
(634, 31, 'Atigbo', b'11111'),
(635, 31, 'Egbeda', b'11111'),
(636, 31, 'Ibadan-North', b'11111'),
(637, 31, 'Ibadan-North-East', b'11111'),
(638, 31, 'Ibadan-North-West', b'11111'),
(639, 31, 'Ibadan-South-East', b'11111'),
(640, 31, 'Ibadan-South-West', b'11111'),
(641, 31, 'Ibarapa-Central', b'11111'),
(642, 31, 'Ibarapa-East', b'11111'),
(643, 31, 'Ibarapa-North', b'11111'),
(644, 31, 'Ido', b'11111'),
(645, 31, 'Irepo', b'11111'),
(646, 31, 'Iseyin', b'11111'),
(647, 31, 'Itesiwaju', b'11111'),
(648, 31, 'Iwajowa', b'11111'),
(649, 31, 'Kajola', b'11111'),
(650, 31, 'Lagelu', b'11111'),
(651, 31, 'Ogbomosho-North', b'11111'),
(652, 31, 'Ogbomosho-South', b'11111'),
(653, 31, 'Ogo-Oluwa', b'11111'),
(654, 31, 'Olorunsogo', b'11111'),
(655, 31, 'Oluyole', b'11111'),
(656, 31, 'Ona-ara', b'11111'),
(657, 31, 'Orelope', b'11111'),
(658, 31, 'Ori-Ire', b'11111'),
(659, 31, 'Oyo', b'11111'),
(660, 31, 'Oyo-East', b'11111'),
(661, 31, 'Saki-East', b'11111'),
(662, 31, 'Saki-west', b'11111'),
(663, 31, 'Surulere', b'11111'),
(664, 32, 'Barkin-Ladi', b'11111'),
(665, 32, 'Bassa', b'11111'),
(666, 32, 'Bokkos', b'11111'),
(667, 32, 'Jos-East', b'11111'),
(668, 32, 'Jos-North', b'11111'),
(669, 32, 'Jos-South', b'11111'),
(670, 32, 'Kanam', b'11111'),
(671, 32, 'Kanke', b'11111'),
(672, 32, 'Langtang-South', b'11111'),
(673, 32, 'Langtan-North', b'11111'),
(674, 32, 'Mangu', b'11111'),
(675, 32, 'Mikang', b'11111'),
(676, 32, 'Panshkin', b'11111'),
(677, 32, 'Qua\'an-Pan', b'11111'),
(678, 32, 'Riyom', b'11111'),
(679, 32, 'Shendam', b'11111'),
(680, 32, 'Wase', b'11111'),
(681, 33, 'Abua-Odual', b'11111'),
(682, 33, 'Ahoada-East', b'11111'),
(683, 33, 'Ahoada-West', b'11111'),
(684, 33, 'Akuku-Toru', b'11111'),
(685, 33, 'Andoni', b'11111'),
(686, 33, 'Asari-Toru', b'11111'),
(687, 33, 'Bonny', b'11111'),
(688, 33, 'Degema', b'11111'),
(689, 33, 'Eleme', b'11111'),
(690, 33, 'Emuoha', b'11111'),
(691, 33, 'Etche', b'11111'),
(692, 33, 'Gokana', b'11111'),
(693, 33, 'Ikwere', b'11111'),
(694, 33, 'Khana', b'11111'),
(695, 33, 'Obio/Akpor', b'11111'),
(696, 33, 'Ogba/Egbema/Ndoni', b'11111'),
(697, 33, 'Ogo-Bolo', b'11111'),
(698, 33, 'Okrika', b'11111'),
(699, 33, 'Omumma', b'11111'),
(700, 33, 'Opobo/Nkoro', b'11111'),
(701, 33, 'Oyigbo', b'11111'),
(702, 33, 'Port-Harcourt', b'11111'),
(703, 33, 'Tai', b'11111'),
(704, 34, 'Binji', b'11111'),
(705, 34, 'Bodinga', b'11111'),
(706, 34, 'Dange-shuni', b'11111'),
(707, 34, 'Gada', b'11111'),
(708, 34, 'Goronyo', b'11111'),
(709, 34, 'Gudu', b'11111'),
(710, 34, 'Gwadabawa', b'11111'),
(711, 34, 'Illela', b'11111'),
(712, 34, 'Isa', b'11111'),
(713, 34, 'Kebbe', b'11111'),
(714, 34, 'Kware', b'11111'),
(715, 34, 'Rabah', b'11111'),
(716, 34, 'Sabon-Birni', b'11111'),
(717, 34, 'Shagari', b'11111'),
(718, 34, 'Silame', b'11111'),
(719, 34, 'Sokoto-North', b'11111'),
(720, 34, 'Sokoto-South', b'11111'),
(721, 34, 'Tambuwal', b'11111'),
(722, 34, 'Tangaza', b'11111'),
(723, 34, 'Tureta', b'11111'),
(724, 34, 'Wamako', b'11111'),
(725, 34, 'Wurno', b'11111'),
(726, 34, 'Yabo', b'11111'),
(727, 35, 'Ardo-Kola', b'11111'),
(728, 35, 'Bali', b'11111'),
(729, 35, 'Donga', b'11111'),
(730, 35, 'Gashaka', b'11111'),
(731, 35, 'Gassol', b'11111'),
(732, 35, 'Ibi', b'11111'),
(733, 35, 'Jalingo', b'11111'),
(734, 35, 'Karim-Lamido', b'11111'),
(735, 35, 'Kumi', b'11111'),
(736, 35, 'Lau', b'11111'),
(737, 35, 'Sardauna', b'11111'),
(738, 35, 'Takum', b'11111'),
(739, 35, 'Ussa', b'11111'),
(740, 35, 'Wukari', b'11111'),
(741, 35, 'Yorro', b'11111'),
(742, 35, 'Zing', b'11111'),
(743, 36, 'Barde', b'11111'),
(744, 36, 'Bosari', b'11111'),
(745, 36, 'Damaturu', b'11111'),
(746, 36, 'Fika', b'11111'),
(747, 36, 'Fune', b'11111'),
(748, 36, 'Geidam', b'11111'),
(749, 36, 'Gujba', b'11111'),
(750, 36, 'Gulani', b'11111'),
(751, 36, 'Jakusko', b'11111'),
(752, 36, 'Karasuwa', b'11111'),
(753, 36, 'Machina', b'11111'),
(754, 36, 'Nangere', b'11111'),
(755, 36, 'Nguru', b'11111'),
(756, 36, 'Potiskum', b'11111'),
(757, 36, 'Tarmua', b'11111'),
(758, 36, 'Yunusari', b'11111'),
(759, 36, 'Yusufari', b'11111'),
(760, 37, 'Anka', b'11111'),
(761, 37, 'Bakura', b'11111'),
(762, 37, 'Birnin-Magaji/Kiyaw', b'11111'),
(763, 37, 'Bukkuyum', b'11111'),
(764, 37, 'Bungudu', b'11111'),
(765, 37, 'Gummi', b'11111'),
(766, 37, 'Gusau', b'11111'),
(767, 37, 'Kaura-Namoda', b'11111'),
(768, 37, 'Maradun', b'11111'),
(769, 37, 'Maru', b'11111'),
(770, 37, 'Shinkafi', b'11111'),
(771, 37, 'Talata-Mafara', b'11111'),
(772, 37, 'Tsafe', b'11111'),
(773, 37, 'Zurmi', b'11111'),
(774, 6, 'Bomo East', b'11111');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int(11) NOT NULL,
  `n_title` varchar(100) DEFAULT NULL,
  `n_message` text DEFAULT NULL,
  `n_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `n_status` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_bank`
--

CREATE TABLE `pay_bank` (
  `bnk_pay_id` int(11) NOT NULL,
  `req_id` varchar(10) DEFAULT NULL,
  `u_id` varchar(10) DEFAULT NULL,
  `bank_name` varchar(30) DEFAULT NULL,
  `account_name` varchar(30) DEFAULT NULL,
  `acoount_number` varchar(30) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_status_bnk` varchar(2) DEFAULT NULL,
  `amount` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pay_bank`
--

INSERT INTO `pay_bank` (`bnk_pay_id`, `req_id`, `u_id`, `bank_name`, `account_name`, `acoount_number`, `created_date`, `payment_status_bnk`, `amount`) VALUES
(13, '54', '25', 'Paulina Obiahu', 'Eco Bank', '80000', '2022-11-16 13:01:05', '1', '80000'),
(14, '76', '25', 'Paulina Obiahu', 'Eco Bank ', '50450', '2023-01-03 15:22:25', '1', '50450'),
(15, '81', '76', 'Nduka Ochieze', 'uba', '14000', '2023-01-12 12:42:34', '1', '14000'),
(16, '68', '2', 'Othniel Okechukwu', 'Zenith Bank ', '7500', '2023-01-21 14:33:08', '1', '7500'),
(21, '115', '1', 'npsss', 'sbi', '120', '2023-04-27 13:50:36', '1', '120'),
(22, '125', '1', 'test', 'test', '120', '2023-04-28 09:49:06', '1', '150'),
(23, '1', '1', 'name', 'name', '123456', '2023-05-22 06:44:21', '1', '1234'),
(24, '139', '147', 'dgfg', 'Zenith Bank', '1013837199', '2023-06-15 13:00:05', '1', '20'),
(25, '139', '147', 'ABCD', 'Rajesh', '1013837199', '2023-06-15 16:13:40', '1', '50'),
(26, '139', '147', 'high', 'bncnc', '1013837199', '2023-06-19 13:38:06', '1', '20'),
(27, '154', '147', ' irbhay', 'bbi', '100', '2023-08-24 13:35:33', '1', '77'),
(28, '158', '147', 'nir', 'sbi', '50', '2023-08-25 09:56:30', '1', '50'),
(29, '158', '147', 'niru', 'sbi', '50', '2023-08-25 10:00:21', '1', '50'),
(30, '179', '147', 'Zenith Bank', 'John', '1013837199', '2023-10-16 14:23:24', '1', '30');

-- --------------------------------------------------------

--
-- Table structure for table `professional_area`
--

CREATE TABLE `professional_area` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(50) DEFAULT NULL,
  `pro_dis` text DEFAULT NULL,
  `pro_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pro_status` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `professional_area`
--

INSERT INTO `professional_area` (`pro_id`, `pro_name`, `pro_dis`, `pro_created`, `pro_status`) VALUES
(1, 'Technician', 'AC reparing', '2022-04-23 14:20:25', '0'),
(2, 'Mechanic', 'Car Mechanic, etc.', '2022-04-23 14:20:39', '0'),
(3, 'Automotive Workshop ', 'Mechanical work, Auto Electrical, etc.', '2022-04-23 14:20:57', '0'),
(4, 'Home Appliances', 'Home AC, Refrigerator, Washing machine, etc.', '2021-05-20 15:18:09', '1'),
(5, 'Computers', 'Desktops, Laptops, etc.', '2021-05-20 15:18:10', '1'),
(6, 'Mobile Devices', 'Phones, Tabs, etc.', '2022-06-29 17:48:03', '0'),
(7, 'Surveillance Systems', 'CCTV, IOT devices, etc.', '2021-05-20 15:18:11', '1'),
(8, 'Building Maintenance', 'Masonry, Carpentry & Joinery, Upholstery, Plumbing, Electrical, etc.', '2022-06-29 17:49:40', '1'),
(9, 'Welding Works', 'Construction, Maintenance, etc.', '2022-04-23 14:21:38', '0'),
(10, 'Renewable Energy', 'Inverter, Solar, Inverter & Solar, etc.', '2021-05-20 15:18:16', '1'),
(13, 'Website/Software Development', 'Website and Software Development', '2022-07-28 15:28:19', '1'),
(12, 'AC repairing', 'AC', '2022-04-23 14:20:18', '0');

-- --------------------------------------------------------

--
-- Table structure for table `Satisfaction`
--

CREATE TABLE `Satisfaction` (
  `s_id` int(11) NOT NULL,
  `e_id` varchar(10) DEFAULT NULL,
  `c_id` varchar(10) DEFAULT NULL,
  `t_id` varchar(10) DEFAULT NULL,
  `Friendliness` varchar(50) DEFAULT NULL,
  `future_use` text DEFAULT NULL,
  `improve_service` text DEFAULT NULL,
  `s_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `s_status` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Satisfaction`
--

INSERT INTO `Satisfaction` (`s_id`, `e_id`, `c_id`, `t_id`, `Friendliness`, `future_use`, `improve_service`, `s_created`, `s_status`) VALUES
(14, '51', NULL, NULL, 'Very Satisfied', 'Yes', 'tesg', '2022-11-08 12:46:20', '1'),
(15, '54', NULL, NULL, 'Very Satisfied', 'Yes', 'The job took over 48 hours', '2022-11-16 13:02:56', '1'),
(16, '81', NULL, NULL, 'Very Satisfied', 'Yes', 'Great job', '2023-01-12 12:43:57', '1'),
(17, '68', NULL, NULL, 'Satisfied', 'Yes', 'The work was done successfully ', '2023-01-21 14:34:29', '1'),
(18, '94', NULL, NULL, 'Very Satisfied', 'Yes', 'test', '2023-02-13 08:21:56', '1'),
(19, '94', NULL, NULL, 'Very unsatisfied', 'Maybe', 'gdgd', '2023-02-13 09:46:29', '1'),
(20, '95', NULL, NULL, 'Unsatisfied', 'No', 'dyfy', '2023-02-13 09:59:24', '1'),
(21, '94', NULL, NULL, 'Unsatisfied', 'Yes', 'hdhd', '2023-02-13 10:43:08', '1'),
(22, '95', NULL, NULL, 'Neutral', 'No', 'fygdg', '2023-02-13 10:44:16', '1'),
(23, '96', NULL, NULL, 'Neutral', 'No', 'fhf', '2023-02-13 10:50:08', '1'),
(24, '94', NULL, NULL, 'Very Satisfied', 'Yes', 'test', '2023-03-15 07:48:42', '1'),
(25, '115', NULL, NULL, 'Very Satisfied', 'Yes', 'test', '2023-04-27 13:51:02', '1'),
(26, '125', NULL, NULL, 'Very Satisfied', 'Yes', 'tes', '2023-04-28 09:49:25', '1'),
(27, '139', NULL, NULL, 'Very Satisfyied', 'Yes', 'cbxcv', '2023-06-19 13:39:54', '1'),
(28, '131', NULL, NULL, 'Very Satisfied', 'Yes', 'Professional services ', '2023-06-29 16:44:12', '1'),
(29, '148', NULL, NULL, 'Satisfyied', 'Yes', 'Test', '2023-08-22 07:46:44', '1'),
(30, '148', NULL, NULL, 'Satisfyied', 'No', 'Test', '2023-08-22 07:50:09', '1'),
(31, '148', NULL, NULL, 'Satisfyied', 'No', 'Test', '2023-08-22 07:50:45', '1'),
(32, '148', NULL, NULL, 'Satisfyied', 'No', 'Test', '2023-08-22 07:59:42', '1'),
(33, '148', NULL, NULL, 'Nutral', 'Yes', 'Feedbackdone', '2023-08-22 13:07:13', '1'),
(34, '157', NULL, NULL, 'Nutral', 'Yes', 'Tester', '2023-08-25 08:36:53', '1'),
(35, '161', NULL, NULL, 'Very Satisfyied', 'Yes', 'Prompt response', '2023-08-26 17:37:57', '1'),
(36, '139', NULL, NULL, 'Satisfyied', 'No', 'Testing', '2023-08-29 13:52:41', '1'),
(37, '167', NULL, NULL, 'Satisfyied', 'Yes', 'Test', '2023-09-01 06:47:56', '1'),
(38, '170', NULL, NULL, 'Very Satisfyied', 'Yes', 'Ok', '2023-09-05 13:09:54', '1'),
(39, '173', NULL, NULL, 'Very Satisfyied', 'Yes', 'Very good portal', '2023-09-12 13:13:39', '1'),
(40, '175', NULL, NULL, 'Very Satisfyied', 'Yes', 'Great service', '2023-09-19 13:49:18', '1'),
(41, '179', NULL, NULL, 'Satisfyied', 'Maybe', 'Need more attention on data analysis.', '2023-10-16 14:24:21', '1');

-- --------------------------------------------------------

--
-- Table structure for table `security_code`
--

CREATE TABLE `security_code` (
  `id` int(11) NOT NULL,
  `scode` varchar(10) NOT NULL,
  `enq_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(20) DEFAULT NULL,
  `pro_id` varchar(10) DEFAULT NULL,
  `s_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `s_status` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`s_id`, `s_name`, `pro_id`, `s_created`, `s_status`) VALUES
(45, 'GAS CHARGING', '12', '2024-01-02 16:13:04', '0'),
(3, 'Mechanical work', '3', '2020-09-09 20:06:01', '1'),
(4, 'Auto Electrical', '3', '2020-09-09 20:06:31', '1'),
(5, 'Body work', '3', '2020-09-09 20:06:52', '1'),
(6, 'Tyre work', '3', '2020-09-09 20:07:18', '1'),
(7, 'Auto mobile AC', '3', '2020-09-09 20:07:42', '1'),
(8, 'Home/Office AC', '4', '2020-09-09 20:08:18', '1'),
(9, 'Refrigerator', '4', '2020-09-09 20:09:11', '1'),
(10, 'Washing machine', '4', '2020-09-09 20:09:44', '1'),
(11, 'Laundry Dryer', '4', '2020-09-09 20:10:17', '1'),
(12, 'Microwave Oven', '4', '2020-09-09 20:10:49', '1'),
(13, 'Television', '4', '2020-09-09 20:11:23', '1'),
(14, 'Home Theater', '4', '2020-09-09 20:11:52', '1'),
(15, 'Water dispenser', '4', '2020-09-09 20:12:20', '1'),
(16, 'Dish washer', '4', '2020-09-09 20:12:37', '1'),
(17, 'Electric cooker', '4', '2020-09-09 20:12:58', '1'),
(18, 'Gas Cooker', '4', '2020-09-09 20:13:15', '1'),
(19, 'Desktop PC', '5', '2020-09-09 20:14:06', '1'),
(20, 'Laptop PC', '5', '2020-09-09 20:14:28', '1'),
(21, 'Palmtops', '5', '2020-09-09 20:14:46', '1'),
(22, 'Apple iPhones', '6', '2020-09-09 20:16:14', '1'),
(23, 'Apple iPad', '6', '2020-09-09 20:16:46', '1'),
(24, 'Android Tabs', '6', '2020-09-09 20:17:08', '1'),
(25, 'Android Phones', '6', '2020-09-09 20:17:30', '1'),
(26, 'CCTV devices', '7', '2020-09-09 20:18:24', '1'),
(27, 'Motion detective dev', '7', '2020-09-09 20:18:57', '1'),
(28, 'Masonry', '8', '2022-06-29 17:50:45', '0'),
(29, 'Carpentry & Joinery', '8', '2022-06-29 17:50:50', '0'),
(30, 'Upholstery', '8', '2022-06-29 17:50:58', '0'),
(31, 'Plumbing', '8', '2020-09-09 20:21:33', '1'),
(32, 'Electrical', '8', '2020-09-09 20:21:59', '1'),
(33, 'Tiling', '8', '2020-09-09 20:22:27', '1'),
(34, 'POP', '8', '2022-06-29 17:51:33', '0'),
(35, 'Painting', '8', '2022-06-29 17:51:48', '0'),
(36, 'Aluminum work', '8', '2020-09-09 20:23:46', '1'),
(37, 'Interlocking', '8', '2022-06-29 17:52:32', '0'),
(38, 'Screeding & Painting', '8', '2022-06-29 17:52:38', '0'),
(39, 'Screeding & Wallpape', '8', '2022-06-29 17:52:43', '0'),
(40, 'Construction', '9', '2020-09-09 20:27:06', '1'),
(41, 'Maintenance', '9', '2020-09-09 20:27:26', '1'),
(42, 'Inverter', '10', '2020-09-09 20:28:05', '1'),
(43, 'Solar Panel', '10', '2023-09-01 09:33:45', '1'),
(44, 'Inverter & Solar', '10', '2020-09-09 20:28:38', '1'),
(46, 'Service', '12', '2021-04-08 17:41:26', '1'),
(47, 'Coil Repair', '12', '2021-04-08 17:41:56', '1'),
(48, 'Web Application', '13', '2022-07-28 15:24:26', '1'),
(49, 'Desktop Application', '13', '2022-07-28 15:24:58', '1'),
(50, 'Website', '13', '2022-07-28 15:25:40', '1'),
(51, 'Painting And Screedi', '8', '2023-10-03 12:34:19', '1'),
(52, 'Pop', '8', '2023-10-03 12:34:54', '1');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `sid` int(11) NOT NULL,
  `statename` varchar(100) NOT NULL,
  `ishost` bit(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`sid`, `statename`, `ishost`) VALUES
(1, 'Abia', b'11111'),
(2, 'Adamawa', b'11111'),
(3, 'Akwa Ibom', b'11111'),
(4, 'Anambra', b'11111'),
(5, 'Bauchi', b'11111'),
(6, 'Bayelsa', b'11111'),
(7, 'Benue', b'11111'),
(8, 'Borno', b'11111'),
(9, 'Cross River', b'11111'),
(10, 'Delta', b'11111'),
(11, 'Ebonyi', b'11111'),
(12, 'Edo', b'11111'),
(13, 'Ekiti', b'11111'),
(14, 'Enugu', b'11111'),
(15, 'FCT', b'11111'),
(16, 'Gombe', b'11111'),
(17, 'Imo', b'11111'),
(18, 'Jigawa', b'11111'),
(19, 'Kaduna', b'11111'),
(20, 'Kano', b'11111'),
(21, 'Katsina', b'11111'),
(22, 'Kebbi', b'11111'),
(23, 'Kogi', b'11111'),
(24, 'Kwara', b'11111'),
(25, 'Lagos', b'11111'),
(26, 'Nasarawa', b'11111'),
(27, 'Niger', b'11111'),
(28, 'Ogun', b'11111'),
(29, 'Ondo', b'11111'),
(30, 'Osun', b'11111'),
(31, 'Oyo', b'11111'),
(32, 'Plateau', b'11111'),
(33, 'Rivers', b'11111'),
(34, 'Sokoto', b'11111'),
(35, 'Taraba', b'11111'),
(36, 'Yobe', b'11111'),
(37, 'Zamfara', b'11111');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `t_id` int(11) NOT NULL,
  `b_id` varchar(20) DEFAULT NULL,
  `professional_area` varchar(20) DEFAULT NULL,
  `tech_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `t_address` text DEFAULT NULL,
  `t_phone` varchar(15) DEFAULT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `t_email` text DEFAULT NULL,
  `t_pass` varchar(10) DEFAULT NULL,
  `t_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` text DEFAULT NULL,
  `t_status` varchar(2) DEFAULT NULL,
  `proImg` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`t_id`, `b_id`, `professional_area`, `tech_name`, `last_name`, `t_address`, `t_phone`, `state`, `city`, `t_email`, `t_pass`, `t_created`, `username`, `t_status`, `proImg`) VALUES
(7, '4', '4', 'Zob ', 'Tech ', 'Tech ', 'Tech ', '18', 'hiii', 'Tech ', '15', '2023-01-31 14:59:20', 'Zob 967', '1', 'c3838a7fb8a9b3142b4d5ffce9263af631012023115435.png'),
(5, '5', '5', 'Workman247', 'G3 Integrated Resour', '2B Mini-Ezekwe Street Off Okporo\r\nRumuogba, Port Harcourt\r\nRivers State', 'Workman247', '33', 'Port Harcourt', 'info247workman@gmail.com', '1234', '2023-03-20 05:02:39', 'Workman247', '1', 'd41d8cd98f00b204e9800998ecf8427e07022023091001'),
(8, '3', '7', 'Zob ', 'Oji', 'Tech ', 'Tech ', '15', 'Hi', '08067892466', '1512334', '2023-01-31 11:33:45', 'uchechukwu136', '1', '21ad0bd836b90d08f4cf640b4c298e7c31012023113345.png'),
(13, '3', '7', 'Zob ', 'G3 Integrated Servic', 'Tech ', 'Tech ', '15', 'Hi', '08067892466', '1512334', '2023-01-31 11:33:45', 'G3Workman247', '1', '21ad0bd836b90d08f4cf640b4c298e7c31012023113345.png'),
(14, '3', '7', 'Zob ', 'singh', 'Tech ', 'Tech ', '15', 'Hi', '08067892466', '1512334', '2023-01-31 11:33:45', 'niru276', '1', '21ad0bd836b90d08f4cf640b4c298e7c31012023113345.png'),
(15, '3', '7', 'Zob ', 'india', 'Tech ', 'Tech ', '15', 'Hi', '08067892466', '1512334', '2023-01-31 11:33:45', 'india570', '1', '21ad0bd836b90d08f4cf640b4c298e7c31012023113345.png'),
(46, '5', '8', 'ERIC', 'INYANG ', ' #4 RUMUOGBA ESTATE PORT HARCOURT ', '07081836208', '', '', 'ericinyang247@gmail.com', 'eric@24', '2023-09-19 15:43:52', 'ERIC419', '1', 'default.png'),
(47, '', '', '15666666666', '15666666666', ' 15666666666', '15666666666', '', '', '15666666666', '80996240', '2024-01-08 14:53:37', '15666666666123', '1', 'default.png'),
(48, '5', '4', 'Obinna Emmanuel ', 'Offor', ' Oginigba Trans Amadi', '09039393140', '', '', 'samuelobisco62@gmail.com', '393940', '2024-05-21 12:12:05', 'Obinna Emmanuel 617', '1', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `amount`
--
ALTER TABLE `amount`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `Enquiry`
--
ALTER TABLE `Enquiry`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `fault_analysis`
--
ALTER TABLE `fault_analysis`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `pay_bank`
--
ALTER TABLE `pay_bank`
  ADD PRIMARY KEY (`bnk_pay_id`);

--
-- Indexes for table `professional_area`
--
ALTER TABLE `professional_area`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `Satisfaction`
--
ALTER TABLE `Satisfaction`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `security_code`
--
ALTER TABLE `security_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amount`
--
ALTER TABLE `amount`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `Enquiry`
--
ALTER TABLE `Enquiry`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `fault_analysis`
--
ALTER TABLE `fault_analysis`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_bank`
--
ALTER TABLE `pay_bank`
  MODIFY `bnk_pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `professional_area`
--
ALTER TABLE `professional_area`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Satisfaction`
--
ALTER TABLE `Satisfaction`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `security_code`
--
ALTER TABLE `security_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
