-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 15, 2020 at 01:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `alpha_feto_protein`
--

CREATE TABLE `alpha_feto_protein` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alpha_feto_protein`
--

INSERT INTO `alpha_feto_protein` (`id`, `invoice_id`, `patient_id`, `results`, `comments`, `added_by`, `date_added`) VALUES
(4, 'INV-ALP-FP-430', 'LMLS-PAT-KB-0004', 1.00, 'Jkhjgfdf', 'LMLS-0001', '2020-03-05 12:18:29'),
(5, 'INV-ALP-FP-811', 'LMLS-PAT-KB-0003', 0.00, '', 'LMLS-0001', '2020-03-05 12:40:50'),
(6, 'INV-ALP-FP-552', 'LMLS-PAT-KB-0001', 0.00, '', 'LMLS-0001', '2020-03-05 12:41:20'),
(7, 'INV-ALP-FP-563', 'LMLS-PAT-KB-0003', 1.00, 'Dsxd', 'LMLS-0001', '2020-03-05 15:40:51'),
(8, 'INV-ALP-FP-844', 'LMLS-PAT-KB-0003', 10.00, 'Jhgfd', 'LMLS-0001', '2020-03-05 18:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `antenatal_screening`
--

CREATE TABLE `antenatal_screening` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `blood_group` text DEFAULT NULL,
  `rhd` text DEFAULT NULL,
  `antibody_screening` text DEFAULT NULL,
  `hbsag` text DEFAULT NULL,
  `vdrl` text DEFAULT NULL,
  `hep_c` text DEFAULT NULL,
  `retro_screen` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antenatal_screening`
--

INSERT INTO `antenatal_screening` (`id`, `invoice_id`, `patient_id`, `blood_group`, `rhd`, `antibody_screening`, `hbsag`, `vdrl`, `hep_c`, `retro_screen`, `comments`, `added_by`, `date_added`) VALUES
(4, 'INV-ANT-SCREE-320', 'LMLS-PAT-KB-0003', 'Positive', 'Positive', 'Positive', '', '', '', 'Non-Reactive', 'Dfghjk', 'LMLS-0001', '2020-03-05 13:08:33'),
(5, 'INV-ANT-SCR-031', 'LMLS-PAT-KB-0003', '', '', '', '', '', '', '', 'Kljhgfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 'LMLS-0001', '2020-03-06 10:11:10'),
(6, 'INV-ANT-SCR-202', 'LMLS-PAT-KB-0003', '', 'Positive', '', '', '', '', 'Non-Reactive', 'Hjgh', 'LMLS-0001', '2020-03-06 10:13:01'),
(7, 'INV-ANT-SCR-933', 'LMLS-PAT-KB-0003', 'Positive', '', '', '', '', '', '', 'Jkhjghfg', 'LMLS-0001', '2020-03-06 10:22:20'),
(8, 'INV-ANT-SCR-824', 'LMLS-PAT-KB-0005', 'Positive', 'Negative', 'Positive', 'Positive', 'Negative', 'Positive', 'Reactive', 'Hjvjghcf', 'LMLS-KB-0001', '2020-05-27 12:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `ascitic_fluid_cs`
--

CREATE TABLE `ascitic_fluid_cs` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `gram_stain` text DEFAULT NULL,
  `zn_stain` text DEFAULT NULL,
  `fungal_element` text DEFAULT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ascitic_fluid_cs`
--

INSERT INTO `ascitic_fluid_cs` (`id`, `invoice_id`, `patient_id`, `gram_stain`, `zn_stain`, `fungal_element`, `culture`, `bacteria_one`, `bacteria_two`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `comments`, `added_by`, `date_added`) VALUES
(1, 'INV-ASC-FLUID-970', 'LMLS-PAT-KB-0002', 'No Organism Seen', 'AFB Present', 'No Fungal Element Seen', 'No Bacterial Growth', 'Acinetobacter SPP', 'Alpha Haem. Strept', 'Ampicillin', 'Amikacin', 'Amoxicillin', 'Amoxiclav', 'Amikacin', 'Amoxiclav', 'Ampicillin', 'Amoxicillin', 'Ampicillin', 'Amikacin', 'Amoxiclav', 'Cefepim', 'Amoxicillin', 'Amikacin', 'Aztrenem', 'Aztrenem', 'S', 'S', 'S', 'S', 'R', 'R', 'R', 'R', 'S', 'S', 'S', 'S', 'R', 'R', 'R', 'R', 'M,mnghfbgc', 'LMLS-0001', '2020-03-06 15:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `aspirate_cs`
--

CREATE TABLE `aspirate_cs` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `gram_stain` text DEFAULT NULL,
  `zn_stain` text DEFAULT NULL,
  `fungal_element` text DEFAULT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspirate_cs`
--

INSERT INTO `aspirate_cs` (`id`, `invoice_id`, `patient_id`, `gram_stain`, `zn_stain`, `fungal_element`, `culture`, `bacteria_one`, `bacteria_two`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-ASP-CS-870', 'LMLS-PAT-KB-0002', 'No Organism Seen', 'No AFB Present', 'Fungal Element Present', 'No Bacterial Growth', 'Alcaligenes', '', '', '', '', '', '', '', '', '', 'Aztrenem', 'Ampicillin', 'Ampicillin', 'Ampicillin', '', 'Amoxiclav', 'Amikacin', 'Amikacin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Lkljkhb', 'LMLS-0001', '2020-03-06 18:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(25) NOT NULL,
  `activity` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`id`, `staff_id`, `activity`, `date`) VALUES
(1441, 'LMLS-0001', 'Tried To Add Alpha Feto Protein Lab For Agyakwa Ntow Mireku', '2020-03-05 12:15:09'),
(1442, 'LMLS-0001', 'Added Alpha Feto Protein Lab For Agyakwa Ntow Mireku', '2020-03-05 12:18:29'),
(1443, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:18:49'),
(1444, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:21:51'),
(1445, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:21:57'),
(1446, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:29:23'),
(1447, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:29:29'),
(1448, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:30:13'),
(1449, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:30:49'),
(1450, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:30:57'),
(1451, 'LMLS-0001', 'Added Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:31:10'),
(1452, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:31:17'),
(1453, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:31:20'),
(1454, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:31:23'),
(1455, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:31:26'),
(1456, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:31:30'),
(1457, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:31:34'),
(1458, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:31:44'),
(1459, 'LMLS-0001', 'Added Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:31:47'),
(1460, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:37:17'),
(1461, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:37:21'),
(1462, 'LMLS-0001', 'Tried To Add Estrogen Lab For Agyakwa Ntow Mireku', '2020-03-05 12:37:53'),
(1463, 'LMLS-0001', 'Added Alpha Feto Protein Lab For Agyakwa Ntow Mireku', '2020-03-05 12:40:50'),
(1464, 'LMLS-0001', 'Added Alpha Feto Protein Lab For Agyakwa Ntow Mireku', '2020-03-05 12:41:20'),
(1465, 'LMLS-0001', 'Added Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-05 13:08:33'),
(1466, 'LMLS-0001', 'Tried To Add CD4 Count Lab For Agyakwa Ntow Mireku', '2020-03-05 14:10:12'),
(1467, 'LMLS-0001', 'Tried To Add CD4 Count Lab For Agyakwa Ntow Mireku', '2020-03-05 14:10:38'),
(1468, 'LMLS-0001', 'Tried To Add CD4 Count Lab For Agyakwa Ntow Mireku', '2020-03-05 14:12:08'),
(1469, 'LMLS-0001', 'Tried To Add CD4 Count Lab For Agyakwa Ntow Mireku', '2020-03-05 14:12:16'),
(1470, 'LMLS-0001', 'Tried To Add CD4 Count Lab For Agyakwa Ntow Mireku', '2020-03-05 14:16:46'),
(1471, 'LMLS-0001', 'Added Alpha Feto Protein Lab For Agyakwa Ntow Mireku', '2020-03-05 15:40:51'),
(1472, 'LMLS-0001', 'Added Alpha Feto Protein Lab For Agyakwa Ntow Mireku', '2020-03-05 18:21:28'),
(1473, 'LMLS-0001', 'Logged In', '2020-03-05 18:33:55'),
(1474, 'LMLS-0001', 'Updated Alpha Feto Protein Lab For Agyakwa Ntow Mireku', '2020-03-05 18:34:11'),
(1475, 'LMLS-0001', 'Updated Alpha Feto Protein Lab For Agyakwa Ntow Mireku', '2020-03-05 18:34:24'),
(1476, 'LMLS-0001', 'Updated Alpha Feto Protein Lab For Agyakwa Ntow Mireku', '2020-03-05 18:36:23'),
(1477, 'LMLS-0001', 'Updated Alpha Feto Protein Lab For Agyakwa Ntow Mireku', '2020-03-05 18:36:35'),
(1478, 'LMLS-0001', 'Updated Alpha Feto Protein Lab For Agyakwa Ntow Mireku', '2020-03-05 18:38:39'),
(1479, 'LMLS-0001', 'Updated Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-05 20:02:27'),
(1480, 'LMLS-0001', 'Updated Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-05 20:02:37'),
(1481, 'LMLS-0001', 'Updated Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-05 20:02:46'),
(1482, 'LMLS-0001', 'Updated Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-05 20:02:48'),
(1483, 'LMLS-0001', 'Updated Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-05 20:03:41'),
(1484, 'LMLS-0001', 'Updated Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-05 20:05:26'),
(1485, 'LMLS-0001', 'Updated Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-05 20:06:06'),
(1486, 'LMLS-0001', 'Updated Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-05 20:48:11'),
(1487, 'LMLS-0001', 'Updated Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-05 20:48:19'),
(1488, 'LMLS-0001', 'Updated Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-06 10:05:24'),
(1489, 'LMLS-0001', 'Updated Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-06 10:05:28'),
(1490, 'LMLS-0001', 'Added Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-06 10:11:10'),
(1491, 'LMLS-0001', 'Added Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-06 10:13:01'),
(1492, 'LMLS-0001', 'Updated Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-06 10:13:34'),
(1493, 'LMLS-0001', 'Added Antenatal Screening Lab For Agyakwa Ntow Mireku', '2020-03-06 10:22:20'),
(1494, 'LMLS-0001', 'Logged In', '2020-03-06 15:08:06'),
(1495, 'LMLS-0001', 'Added Ascitic Fluid CS Lab For Maria  Nortey', '2020-03-06 15:10:58'),
(1496, 'LMLS-0001', 'Logged In', '2020-03-06 15:11:44'),
(1497, 'LMLS-0001', 'Added Ascitic Fluid CS Lab For Maria  Nortey', '2020-03-06 15:49:26'),
(1498, 'LMLS-0001', 'Updated Ascitic Fluid CS Lab For Maria Nortey', '2020-03-06 16:02:08'),
(1499, '', 'Printed Receipt For  ', '2020-03-06 16:26:11'),
(1500, '', 'Printed Receipt For  ', '2020-03-06 16:26:11'),
(1501, '', 'Printed Receipt For  ', '2020-03-06 16:26:17'),
(1502, 'LMLS-0001', 'Printed Receipt For Maria Nortey', '2020-03-06 16:27:47'),
(1503, 'LMLS-0001', 'Printed Receipt For Maria Nortey', '2020-03-06 16:27:51'),
(1504, 'LMLS-0001', 'Printed Receipt For Maria Nortey', '2020-03-06 16:29:52'),
(1505, 'LMLS-0001', 'Printed Receipt For Maria Nortey', '2020-03-06 16:33:11'),
(1506, 'LMLS-0001', 'Printed Receipt For Maria Nortey', '2020-03-06 16:33:55'),
(1507, 'LMLS-0001', 'Printed Receipt For Maria Nortey', '2020-03-06 16:36:46'),
(1508, 'LMLS-0001', 'Printed Receipt For Maria Nortey', '2020-03-06 16:39:49'),
(1509, 'LMLS-0001', 'Tried To Add Aspirate CS Lab For Maria  Nortey', '2020-03-06 18:53:23'),
(1510, 'LMLS-0001', 'Added Aspirate CS Lab For Maria  Nortey', '2020-03-06 18:55:44'),
(1511, 'LMLS-0001', 'Logged In', '2020-03-06 21:06:15'),
(1512, 'LMLS-0001', 'Logged In', '2020-03-06 21:06:30'),
(1513, 'LMLS-0001', 'Added Blood CS Lab For Maria  Nortey', '2020-03-06 21:06:46'),
(1514, 'LMLS-0001', 'Updated Blood CS Lab For Maria Nortey', '2020-03-06 21:07:18'),
(1515, 'LMLS-0001', 'Added Ear Swab Lab For Maria  Nortey', '2020-03-06 21:58:15'),
(1516, 'LMLS-0001', 'Updated Ear Swab CS Lab For Maria Nortey', '2020-03-06 22:05:58'),
(1517, 'LMLS-0001', 'Updated Ear Swab CS Lab For Maria Nortey', '2020-03-06 22:06:09'),
(1518, 'LMLS-0001', 'Added Eye Swab Lab For Maria  Nortey', '2020-03-06 22:10:42'),
(1519, 'LMLS-0001', 'Added Eye Swab Lab For Maria  Nortey', '2020-03-06 22:12:59'),
(1520, 'LMLS-0001', 'Added Endocervical Swab CS Lab For Maria  Nortey', '2020-03-06 22:35:43'),
(1521, 'LMLS-0001', 'Updated Endocervical Swab CS Lab For Maria Nortey', '2020-03-06 22:47:23'),
(1522, 'LMLS-0001', 'Updated Endocervical Swab CS Lab For Maria Nortey', '2020-03-06 22:47:29'),
(1523, 'LMLS-0001', 'Updated Endocervical Swab CS Lab For Maria Nortey', '2020-03-06 22:50:19'),
(1524, 'LMLS-0001', 'Updated Endocervical Swab CS Lab For Maria Nortey', '2020-03-06 22:57:21'),
(1525, 'LMLS-0001', 'Updated Endocervical Swab CS Lab For Maria Nortey', '2020-03-06 23:03:02'),
(1526, 'LMLS-0001', 'Updated Endocervical Swab CS Lab For Maria Nortey', '2020-03-06 23:03:33'),
(1527, 'LMLS-0001', 'Added HVS CS Lab For Maria  Nortey', '2020-03-06 23:08:38'),
(1528, 'LMLS-0001', 'Updated HVS CS Lab For Maria Nortey', '2020-03-06 23:09:08'),
(1529, 'LMLS-0001', 'Added HVS RE Lab For Maria  Nortey', '2020-03-06 23:26:53'),
(1530, 'LMLS-0001', 'Updated HVS RE Lab For Maria Nortey', '2020-03-06 23:28:23'),
(1531, 'LMLS-0001', 'Updated HVS CS Lab For Maria Nortey', '2020-03-07 11:17:25'),
(1532, 'LMLS-0001', 'Updated HVS CS Lab For Maria Nortey', '2020-03-07 11:39:17'),
(1533, 'LMLS-0001', 'Updated HVS CS Lab For Maria Nortey', '2020-03-07 11:39:26'),
(1534, 'LMLS-0001', 'Tried To Add Pleural Fluid Lab For Maria  Nortey', '2020-03-07 13:20:05'),
(1535, 'LMLS-0001', 'Tried To Add Pleural Fluid Lab For Maria  Nortey', '2020-03-07 13:24:03'),
(1536, 'LMLS-0001', 'Added Pleural Fluid Lab For Maria  Nortey', '2020-03-07 13:35:27'),
(1537, 'LMLS-0001', 'Updated Pleural Fluid Lab For Maria Nortey', '2020-03-07 13:37:06'),
(1538, 'LMLS-0001', 'Added Pus Fluid Lab For Maria  Nortey', '2020-03-07 14:01:08'),
(1539, '', 'Printed Receipt For  ', '2020-03-07 14:37:39'),
(1540, 'LMLS-0001', 'Printed Receipt For Maria Nortey', '2020-03-07 14:37:39'),
(1541, 'LMLS-0001', 'Printed Receipt For  ', '2020-03-07 15:21:20'),
(1542, '', 'Printed Receipt For  ', '2020-03-07 15:21:35'),
(1543, 'LMLS-0001', 'Printed Receipt For  ', '2020-03-07 15:21:35'),
(1544, 'LMLS-0001', 'Printed Receipt For  ', '2020-03-07 15:21:41'),
(1545, 'LMLS-0001', 'Printed Receipt For Maria Nortey', '2020-03-07 15:22:56'),
(1546, 'LMLS-0001', 'Printed Receipt For Agyakwa Ntow Mireku', '2020-03-07 15:23:00'),
(1547, 'LMLS-0001', 'Printed Receipt For Michelle Ntow Adjei Laryea', '2020-03-07 15:23:08'),
(1548, 'LMLS-0001', 'Added Semen CS Lab For Maria  Nortey', '2020-03-07 15:33:57'),
(1549, 'LMLS-0001', 'Updated Semen CS Lab For Maria Nortey', '2020-03-07 15:34:16'),
(1550, 'LMLS-0001', 'Added Skin Snip Lab For Maria  Nortey', '2020-03-07 15:43:31'),
(1551, 'LMLS-0001', 'Updated Skin Snip Lab For Maria Nortey', '2020-03-07 15:45:32'),
(1552, 'LMLS-0001', 'Added Sputum Lab For Michelle Ntow Adjei Laryea', '2020-03-07 16:11:09'),
(1553, 'LMLS-0001', 'Updated Sputum C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 16:12:47'),
(1554, 'LMLS-0001', 'Added Sputum AFB Lab For Michelle Ntow Adjei Laryea', '2020-03-07 16:22:54'),
(1555, 'LMLS-0001', 'Updated Sputum AFB Lab For Michelle Ntow Adjei Laryea', '2020-03-07 16:23:11'),
(1556, 'LMLS-0001', 'Added Stool CS Lab For Michelle Ntow Adjei Laryea', '2020-03-07 16:30:03'),
(1557, 'LMLS-0001', 'Updated Stool C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 16:32:01'),
(1558, 'LMLS-0001', 'Updated Stool C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 16:34:52'),
(1559, 'LMLS-0001', 'Updated Stool C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 16:35:19'),
(1560, 'LMLS-0001', 'Added Stool RE Lab For ', '2020-03-07 17:04:35'),
(1561, 'LMLS-0001', 'Added Stool RE Lab For ', '2020-03-07 17:04:48'),
(1562, 'LMLS-0001', 'Added Stool RE Lab For Michelle Ntow Adjei Laryea', '2020-03-07 17:08:00'),
(1563, 'LMLS-0001', 'Updated Stool RE Lab For Michelle Ntow Adjei Laryea', '2020-03-07 17:10:23'),
(1564, 'LMLS-0001', 'Added Throat Swab C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 17:17:00'),
(1565, 'LMLS-0001', 'Added Throat Swab C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 17:17:20'),
(1566, 'LMLS-0001', 'Added Urethral C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 17:31:11'),
(1567, 'LMLS-0001', 'Updated Urethral C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 17:32:31'),
(1568, 'LMLS-0001', 'Updated Urethral C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 17:33:52'),
(1569, 'LMLS-0001', 'Added Wound C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 17:58:56'),
(1570, 'LMLS-0001', 'Updated Wound C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 18:02:21'),
(1571, 'LMLS-0001', 'Tried To Add Urine C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 19:47:36'),
(1572, 'LMLS-0001', 'Tried To Add Urine C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 19:47:43'),
(1573, 'LMLS-0001', 'Tried To Add Urine C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 19:49:29'),
(1574, 'LMLS-0001', 'Added Urine C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 19:55:22'),
(1575, 'LMLS-0001', 'Updated Urine C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 20:02:41'),
(1576, 'LMLS-0001', 'Updated Urine C/S Lab For Michelle Ntow Adjei Laryea', '2020-03-07 20:07:32'),
(1577, 'LMLS-0001', 'Added Urine RE Lab For Michelle Ntow Adjei Laryea', '2020-03-07 20:46:41'),
(1578, 'LMLS-0001', 'Tried To Add Urine R/E Lab For Michelle Ntow Adjei Laryea', '2020-03-07 20:52:36'),
(1579, 'LMLS-0001', 'Tried To Add Urine R/E Lab For Michelle Ntow Adjei Laryea', '2020-03-07 20:52:44'),
(1580, 'LMLS-0001', 'Tried To Add Urine R/E Lab For Michelle Ntow Adjei Laryea', '2020-03-07 20:55:13'),
(1581, 'LMLS-0001', 'Added Urine R/E Lab For Michelle Ntow Adjei Laryea', '2020-03-07 21:00:19'),
(1582, 'LMLS-0001', 'Added Urine R/E Lab For Michelle Ntow Adjei Laryea', '2020-03-07 21:00:28'),
(1583, 'LMLS-0001', 'Added Urine R/E Lab For Michelle Ntow Adjei Laryea', '2020-03-07 21:02:43'),
(1584, 'LMLS-0001', 'Added BUE Creatinine Lab For Michelle Ntow Adjei Laryea', '2020-03-07 21:31:20'),
(1585, 'LMLS-0001', 'Updated BUE Creatinine Lab For Michelle Ntow Adjei Laryea', '2020-03-07 21:35:50'),
(1586, 'LMLS-0001', 'Updated BUE Creatinine Lab For Michelle Ntow Adjei Laryea', '2020-03-07 21:35:58'),
(1587, 'LMLS-0001', 'Updated BUE Creatinine Lab For Michelle Ntow Adjei Laryea', '2020-03-07 21:37:25'),
(1588, 'LMLS-0001', 'Added Bue Creatinine eGFR Lab For Michelle Ntow Adjei Laryea', '2020-03-07 21:47:44'),
(1589, 'LMLS-0001', 'Updated Bue Creatinine eGFR Lab For Michelle Ntow Adjei Laryea', '2020-03-07 21:48:02'),
(1590, 'LMLS-0001', 'Added Bue Creatinine LFT Lab For Michelle Ntow Adjei Laryea', '2020-03-07 22:15:16'),
(1591, 'LMLS-0001', 'Added Bue Creatinine LFT Lab For Michelle Ntow Adjei Laryea', '2020-03-07 22:17:28'),
(1592, 'LMLS-0001', 'Added Bue Creatinine Lipids Lab For Michelle Ntow Adjei Laryea', '2020-03-07 23:55:18'),
(1593, 'LMLS-0001', 'Updated BUE Lipids Lab For Michelle Ntow Adjei Laryea', '2020-03-07 23:57:57'),
(1594, 'LMLS-0001', 'Added Blood Sugar Lab For Michelle Ntow Adjei Laryea', '2020-03-08 00:11:50'),
(1595, 'LMLS-0001', 'Updated Blood Sugar Lab For Michelle Ntow Adjei Laryea', '2020-03-08 00:12:08'),
(1596, 'LMLS-0001', 'Added C-Reactive Protein Lab For Michelle Ntow Adjei Laryea', '2020-03-08 00:20:55'),
(1597, 'LMLS-0001', 'Updated C-Reactive Protein Lab For Michelle Ntow Adjei Laryea', '2020-03-08 00:21:06'),
(1598, 'LMLS-0001', 'Added CSF Biochem Lab For Michelle Ntow Adjei Laryea', '2020-03-08 00:40:43'),
(1599, 'LMLS-0001', 'Updated CSF Biochem Lab For Michelle Ntow Adjei Laryea', '2020-03-08 00:41:43'),
(1600, 'LMLS-0001', 'Added CSF Biochem Lab For Michelle Ntow Adjei Laryea', '2020-03-08 00:45:36'),
(1601, 'LMLS-0001', 'Updated CSF Biochem Lab For Michelle Ntow Adjei Laryea', '2020-03-08 00:46:00'),
(1602, 'LMLS-0001', 'Added Calcium Profile Lab For Michelle Ntow Adjei Laryea', '2020-03-08 00:59:38'),
(1603, 'LMLS-0001', 'Updated Calcium Profile Lab For Michelle Ntow Adjei Laryea', '2020-03-08 00:59:59'),
(1604, 'LMLS-0001', 'Updated Calcium Profile Lab For Michelle Ntow Adjei Laryea', '2020-03-08 01:01:41'),
(1605, 'LMLS-0001', 'Added Cardiac Enzyme Lab For Michelle Ntow Adjei Laryea', '2020-03-08 01:20:46'),
(1606, 'LMLS-0001', 'Updated Cardiac Enzyme Lab For Michelle Ntow Adjei Laryea', '2020-03-08 01:22:57'),
(1607, 'LMLS-0001', 'Added Compact Chemistry Lab For Michelle Ntow Adjei Laryea', '2020-03-08 01:51:04'),
(1608, 'LMLS-0001', 'Updated Compact Chemistry Lab For Michelle Ntow Adjei Laryea', '2020-03-08 01:51:41'),
(1609, 'LMLS-0001', 'Updated Compact Chemistry Lab For Michelle Ntow Adjei Laryea', '2020-03-08 01:53:34'),
(1610, 'LMLS-0001', 'Added Folate/B12 Lab For Michelle Ntow Adjei Laryea', '2020-03-08 01:59:57'),
(1611, 'LMLS-0001', 'Updated Folate/B12 Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:00:06'),
(1612, 'LMLS-0001', 'Tried To Add General Chemistry Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:18:12'),
(1613, 'LMLS-0001', 'Tried To Add General Chemistry Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:18:19'),
(1614, 'LMLS-0001', 'Tried To Add General Chemistry Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:18:42'),
(1615, 'LMLS-0001', 'Added General Chemistry Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:19:32'),
(1616, 'LMLS-0001', 'Updated General Chemistry Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:20:09'),
(1617, 'LMLS-0001', 'Added HBA1C Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:27:10'),
(1618, 'LMLS-0001', 'Updated HBA1C Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:30:08'),
(1619, 'LMLS-0001', 'Added Hypersensitive CPR Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:38:05'),
(1620, 'LMLS-0001', 'Updated Hypersensitive CPR Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:38:20'),
(1621, 'LMLS-0001', 'Added ISE Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:45:34'),
(1622, 'LMLS-0001', 'Updated ISE Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:45:49'),
(1623, 'LMLS-0001', 'Added Iron Study Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:56:34'),
(1624, 'LMLS-0001', 'Updated Iron Study Lab For Michelle Ntow Adjei Laryea', '2020-03-08 02:56:50'),
(1625, 'LMLS-0001', 'Added LFT Lab For Michelle Ntow Adjei Laryea', '2020-03-08 03:02:07'),
(1626, 'LMLS-0001', 'Updated LFT Lab For Michelle Ntow Adjei Laryea', '2020-03-08 03:03:08'),
(1627, 'LMLS-0001', 'Added Lipid Profile Lab For Michelle Ntow Adjei Laryea', '2020-03-08 03:07:30'),
(1628, 'LMLS-0001', 'Updated Lipid Profile Lab For Michelle Ntow Adjei Laryea', '2020-03-08 03:07:47'),
(1629, 'LMLS-0001', 'Updated Lipid Profile Lab For Michelle Ntow Adjei Laryea', '2020-03-08 03:09:46'),
(1630, 'LMLS-0001', 'Added Protein Electrophoresis Lab For Michelle Ntow Adjei Laryea', '2020-03-08 13:14:14'),
(1631, 'LMLS-0001', 'Updated Protein Electrophoresis Lab For Michelle Ntow Adjei Laryea', '2020-03-08 13:14:35'),
(1632, 'LMLS-0001', 'Tried To Add S-C3, SC4 Lab For Michelle Ntow Adjei Laryea', '2020-03-08 13:29:15'),
(1633, 'LMLS-0001', 'Added S-C3, SC4 Lab For Michelle Ntow Adjei Laryea', '2020-03-08 13:29:27'),
(1634, 'LMLS-0001', 'Updated S-C3, SC4 Lab For Michelle Ntow Adjei Laryea', '2020-03-08 13:31:34'),
(1635, 'LMLS-0001', 'Tried To Add Serum Lipase Lab For Michelle Ntow Adjei Laryea', '2020-03-08 13:33:42'),
(1636, 'LMLS-0001', 'Added Serum Lipase Lab For Michelle Ntow Adjei Laryea', '2020-03-08 13:36:50'),
(1637, 'LMLS-0001', 'Updated Serum Lipase Lab For Michelle Ntow Adjei Laryea', '2020-03-08 13:37:25'),
(1638, 'LMLS-0001', 'Added Urine Lab For Michelle Ntow undefined', '2020-03-08 13:48:39'),
(1639, 'LMLS-0001', 'Updated Urine Lab For Michelle Ntow Adjei Laryea', '2020-03-08 13:48:57'),
(1640, 'LMLS-0001', 'Updated Urine Lab For Michelle Ntow Adjei Laryea', '2020-03-08 13:51:15'),
(1641, 'LMLS-0001', 'Added Urine ACR Lab For Michelle Ntow Adjei Laryea', '2020-03-08 14:04:53'),
(1642, 'LMLS-0001', 'Updated Urine ACR Lab For Michelle Ntow Adjei Laryea', '2020-03-08 14:09:19'),
(1643, 'LMLS-0001', 'Added CD4 Count Lab For Michelle Ntow Adjei Laryea', '2020-03-08 14:23:43'),
(1644, 'LMLS-0001', 'Updated CD4 Count Lab For Michelle Ntow Adjei Laryea', '2020-03-08 14:24:36'),
(1645, 'LMLS-0001', 'Added H. Pylori Ag Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:03:51'),
(1646, 'LMLS-0001', 'Tried To Update H. Pylori Ag Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:05:08'),
(1647, 'LMLS-0001', 'Updated H. Pylori Ag Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:07:51'),
(1648, 'LMLS-0001', 'Added H. Pylori Ag / SOB Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:16:09'),
(1649, 'LMLS-0001', 'Updated H. Pylori Ag / SOB Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:16:32'),
(1650, 'LMLS-0001', 'Updated H. Pylori Ag. Blood Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:18:59'),
(1651, 'LMLS-0001', 'Added H. Pylori Ag. Blood Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:25:12'),
(1652, 'LMLS-0001', 'Added H. Pylori Ag. Blood Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:25:19'),
(1653, 'LMLS-0001', 'Updated H. Pylori Ag / SOB Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:25:44'),
(1654, 'LMLS-0001', 'Updated H. Pylori Ag Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:25:54'),
(1655, 'LMLS-0001', 'Added HBV Viral Load Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:35:46'),
(1656, 'LMLS-0001', 'Added HIV Viral Load Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:35:54'),
(1657, 'LMLS-0001', 'Updated HBV Viral Load Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:36:07'),
(1658, 'LMLS-0001', 'Updated HIV Viral Load Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:36:16'),
(1659, 'LMLS-0001', 'Added Hepatitis B Profile Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:44:57'),
(1660, 'LMLS-0001', 'Tried To Update Hepatitis B Profile Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:45:20'),
(1661, 'LMLS-0001', 'Tried To Update Hepatitis B Profile Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:45:41'),
(1662, 'LMLS-0001', 'Updated Hepatitis B Profile Lab For Michelle Ntow Adjei Laryea', '2020-03-08 15:48:25'),
(1663, 'LMLS-0001', 'Added Hepatitis Markers Lab For Michelle Ntow Adjei Laryea', '2020-03-08 16:06:52'),
(1664, 'LMLS-0001', 'Updated Hepatitis Markers Lab For Michelle Ntow Adjei Laryea', '2020-03-08 16:07:13'),
(1665, 'LMLS-0001', 'Updated Hepatitis Markers Lab For Michelle Ntow Adjei Laryea', '2020-03-08 16:08:57'),
(1666, 'LMLS-0001', 'Tried To Add Mantoux Lab For Michelle Ntow Adjei Laryea', '2020-03-08 16:20:39'),
(1667, 'LMLS-0001', 'Added Mantoux Lab For Michelle Ntow Adjei Laryea', '2020-03-08 16:24:26'),
(1668, 'LMLS-0001', 'Added Mantoux Lab For Michelle Ntow Adjei Laryea', '2020-03-08 16:27:11'),
(1669, 'LMLS-0001', 'Added Pregnancy Test Lab For Michelle Ntow Adjei Laryea', '2020-03-08 16:37:18'),
(1670, 'LMLS-0001', 'Updated Pregnancy Test Lab For Michelle Ntow Adjei Laryea', '2020-03-08 16:39:20'),
(1671, 'LMLS-0001', 'Added Rheumatology Lab For Michelle Ntow Adjei Laryea', '2020-03-08 16:58:22'),
(1672, 'LMLS-0001', 'Updated Rheumatology Lab For Michelle Ntow Adjei Laryea', '2020-03-08 16:58:39'),
(1673, 'LMLS-0001', 'Added Semen Analysis Lab For Michelle Ntow Adjei Laryea', '2020-03-08 17:20:13'),
(1674, 'LMLS-0001', 'Updated Semen Analysis Lab For Michelle Ntow Adjei Laryea', '2020-03-08 17:23:58'),
(1675, 'LMLS-0001', 'Updated Semen Analysis Lab For Michelle Ntow Adjei Laryea', '2020-03-08 17:24:50'),
(1676, 'LMLS-0001', 'Added Widal Lab For Michelle Ntow Adjei Laryea', '2020-03-08 17:42:31'),
(1677, 'LMLS-0001', 'Updated Widal Lab For Michelle Ntow Adjei Laryea', '2020-03-08 17:48:22'),
(1678, '', 'Logged Out', '2020-03-08 17:50:28'),
(1679, 'LMLS-0001', 'Logged Out', '2020-03-08 17:50:28'),
(1680, 'LMLS-0001', 'Updated His Profile', '2020-03-08 17:50:56'),
(1681, 'LMLS-0001', 'Updated His Profile', '2020-03-08 17:51:07'),
(1682, 'LMLS-0001', 'Updated His Profile', '2020-03-08 17:51:39'),
(1683, '', 'Logged Out', '2020-03-08 17:52:26'),
(1684, 'LMLS-0001', 'Logged Out', '2020-03-08 17:52:26'),
(1685, 'LMLS-0001', 'Logged In', '2020-03-08 21:33:44'),
(1686, 'LMLS-0001', 'Logged In', '2020-03-08 21:34:02'),
(1687, 'LMLS-0001', 'Added FBC CHILDREN Lab For Agyakwa Ntow Mireku', '2020-03-08 21:40:08'),
(1688, 'LMLS-0001', 'Added FBC CHILDREN Lab For Agyakwa Ntow Mireku', '2020-03-08 21:42:15'),
(1689, 'LMLS-0001', 'Added FBC CHILDREN Lab For Agyakwa Ntow Mireku', '2020-03-08 21:42:36'),
(1690, 'LMLS-0001', 'Added FBC CHILDREN Lab For Agyakwa Ntow Mireku', '2020-03-08 21:43:53'),
(1691, 'LMLS-0001', 'Added FBC CHILDREN Lab For Agyakwa Ntow Mireku', '2020-03-08 21:44:02'),
(1692, 'LMLS-0001', 'Added SPECIALS Lab For Agyakwa Ntow Mireku', '2020-03-08 21:57:27'),
(1693, 'LMLS-0001', 'Updated SPECIALS Lab For Agyakwa Ntow Mireku', '2020-03-08 21:57:45'),
(1694, 'LMLS-0001', 'Added NTC SCREENING Lab For Agyakwa Ntow Mireku', '2020-03-08 22:06:35'),
(1695, 'LMLS-0001', 'Updated NTC SCREENING Lab For Agyakwa Ntow Mireku', '2020-03-08 22:07:50'),
(1696, 'LMLS-0001', 'Updated NTC SCREENING Lab For Agyakwa Ntow Mireku', '2020-03-08 22:07:56'),
(1697, '', 'Tried To Add FBC 5P Lab For ', '2020-03-08 22:39:47'),
(1698, '', 'Tried To Add FBC 5P Lab For ', '2020-03-08 22:39:59'),
(1699, 'LMLS-0001', 'Tried To Add FBC 5P Lab For Agyakwa Ntow Mireku', '2020-03-08 22:45:26'),
(1700, 'LMLS-0001', 'Added FBC 5P Lab For Agyakwa Ntow Mireku', '2020-03-08 22:47:44'),
(1701, 'LMLS-0001', 'Updated FBC 5P Lab For Agyakwa Ntow Mireku', '2020-03-08 22:48:50'),
(1702, 'LMLS-0001', 'Logged In', '2020-03-08 22:58:03'),
(1703, 'LMLS-0001', 'Logged In', '2020-03-08 22:58:07'),
(1704, 'LMLS-0001', 'Added CA 15.3 Lab For Maria  Nortey', '2020-03-09 10:14:34'),
(1705, 'LMLS-0001', 'Updated CA 15.3 Lab For Maria Nortey', '2020-03-09 10:14:49'),
(1706, 'LMLS-0001', 'Added CA 12.5 Lab For Maria  Nortey', '2020-03-09 10:15:04'),
(1707, 'LMLS-0001', 'Updated CA 12.5 Lab For Maria Nortey', '2020-03-09 10:15:16'),
(1708, 'LMLS-0001', 'Added CEA Lab For Maria  Nortey', '2020-03-09 11:22:14'),
(1709, 'LMLS-0001', 'Added CKMB Lab For Maria  Nortey', '2020-03-09 11:24:00'),
(1710, 'LMLS-0001', 'Updated CKMB Lab For Maria Nortey', '2020-03-09 11:26:35'),
(1711, 'LMLS-0001', 'Updated CKMB Lab For Maria Nortey', '2020-03-09 11:26:42'),
(1712, 'LMLS-0001', 'Updated CEA Lab For Maria Nortey', '2020-03-09 11:29:12'),
(1713, 'LMLS-0001', 'Added CRP Lab For Maria  Nortey', '2020-03-09 11:34:54'),
(1714, 'LMLS-0001', 'Tried To Add CRP Ultra Sensitive Lab For Maria  Nortey', '2020-03-09 11:35:02'),
(1715, 'LMLS-0001', 'Tried To Add CRP Ultra Sensitive Lab For Maria  Nortey', '2020-03-09 11:35:10'),
(1716, 'LMLS-0001', 'Added CRP Ultra Sensitive Lab For Maria  Nortey', '2020-03-09 11:36:13'),
(1717, 'LMLS-0001', 'Updated CRP Lab For Maria Nortey', '2020-03-09 11:37:00'),
(1718, 'LMLS-0001', 'Updated CRP Ultra Sensitive Lab For Maria Nortey', '2020-03-09 11:37:11'),
(1719, 'LMLS-0001', 'Added M_ALB Lab For Maria  Nortey', '2020-03-09 11:47:40'),
(1720, 'LMLS-0001', 'Added B-HCG Serum Lab For Maria  Nortey', '2020-03-09 11:57:04'),
(1721, 'LMLS-0001', 'Added M-ALB Lab For Maria Nortey', '2020-03-09 11:57:22'),
(1722, 'LMLS-0001', 'Updated B-HCG Serum Lab For Maria Nortey', '2020-03-09 12:00:01'),
(1723, 'LMLS-0001', 'Updated B-HCG Serum Lab For Maria Nortey', '2020-03-09 12:03:31'),
(1724, 'LMLS-0001', 'Updated B-HCG Serum Lab For Maria Nortey', '2020-03-09 12:04:26'),
(1725, 'LMLS-0001', 'Added Cortisol Lab For Maria  Nortey', '2020-03-09 12:14:23'),
(1726, 'LMLS-0001', 'Updated Cortisol Lab For Maria Nortey', '2020-03-09 12:14:44'),
(1727, 'LMLS-0001', 'Added Troponin Lab For Maria  Nortey', '2020-03-09 12:19:52'),
(1728, 'LMLS-0001', 'Added Troponin Lab For Maria Nortey', '2020-03-09 12:20:04'),
(1729, 'LMLS-0001', 'Added TFT Lab For Maria  Nortey', '2020-03-09 12:31:43'),
(1730, 'LMLS-0001', 'Updated TFT Lab For Maria Nortey', '2020-03-09 12:32:55'),
(1731, 'LMLS-0001', 'Added Reproductive Assay Lab For Maria  Nortey', '2020-03-09 12:47:45'),
(1732, 'LMLS-0001', 'Updated Reproductive Assay Lab For Maria Nortey', '2020-03-09 12:48:22'),
(1733, 'LMLS-0001', 'Updated Reproductive Assay Lab For Maria Nortey', '2020-03-09 12:48:33'),
(1734, 'LMLS-0001', 'Added PTH Lab For Maria  Nortey', '2020-03-09 13:05:07'),
(1735, 'LMLS-0001', 'Added PSA Lab For Maria  Nortey', '2020-03-09 13:05:13'),
(1736, 'LMLS-0001', 'Updated PSA Lab For Maria Nortey', '2020-03-09 13:05:24'),
(1737, 'LMLS-0001', 'Updated PTH Lab For Maria Nortey', '2020-03-09 13:05:39'),
(1738, 'LMLS-0001', 'Added Estrogen Lab For Maria  Nortey', '2020-03-09 13:37:54'),
(1739, 'LMLS-0001', 'Updated Estrogen Lab For Maria Nortey', '2020-03-09 13:38:13'),
(1740, 'LMLS-0001', 'Added Hormonal Assay Lab For Maria  Nortey', '2020-03-09 13:42:23'),
(1741, 'LMLS-0001', 'Updated Hormonal Assay Lab For Maria Nortey', '2020-03-09 13:42:37'),
(1742, 'LMLS-0001', 'Tried To Add Ferritin To Charges', '2020-03-10 14:16:07'),
(1743, 'LMLS-0001', 'Tried To Add Ferritin To Charges', '2020-03-10 14:16:37'),
(1744, 'LMLS-0001', 'Added Ferritin To Charges', '2020-03-10 14:52:48'),
(1745, 'LMLS-0001', 'Added Folate To Charges', '2020-03-10 14:53:39'),
(1746, 'LMLS-0001', 'Added Amylase To Charges', '2020-03-10 14:54:22'),
(1747, 'LMLS-0001', 'Tried To Update Charge Folate To Folate But It Already Existed', '2020-03-10 15:17:52'),
(1748, 'LMLS-0001', 'Tried To Update Charge Folate To Folate But It Already Existed', '2020-03-10 15:17:57'),
(1749, 'LMLS-0001', 'Updated Charge \"Folate\" From GHS 120.00 To GHS 121.00', '2020-03-10 15:26:20'),
(1750, 'LMLS-0001', 'Updated Charge \"Folate\" From GHS 121.00 To GHS 120.00', '2020-03-10 15:26:46'),
(1751, 'LMLS-0001', 'Updated Charge \"Ferritin\" From GHS 60.00 To GHS 61.00', '2020-03-10 15:26:56'),
(1752, 'LMLS-0001', 'Updated Charge \"Ferritin\" From GHS 61.00 To GHS 60.00', '2020-03-10 15:27:02'),
(1753, 'LMLS-0001', 'Updated Staff \"Thed Nii Aryee\"', '2020-03-10 15:28:47'),
(1754, 'LMLS-0001', 'Tried To Add Staff \"Xcv Admin\" But Username \"robert\" Was Already Used', '2020-03-10 15:29:21'),
(1755, 'LMLS-0001', 'Added Staff \"Xcv Admin\"', '2020-03-10 15:29:28'),
(1756, 'LMLS-0001', 'Added Patient \"Daniel Jehoshaphat Clegg\"', '2020-03-10 15:51:53'),
(1757, 'LMLS-0001', 'Tried To Add Patient \"Daniel Jehoshaphat Clegg\" But Email Address \"dany@clegg.com.gh\" Was Already Used', '2020-03-10 15:51:53'),
(1758, 'LMLS-0001', 'Tried To Add Request For Daniel Jehoshaphat Clegg', '2020-03-10 15:55:03'),
(1759, 'LMLS-0001', 'Tried To Add Request For Agyakwa Ntow Mireku But Patient Had Pending Requests', '2020-03-10 15:58:53'),
(1760, 'LMLS-0001', 'Tried To Add Request For Agyakwa Ntow Mireku But Patient Had Pending Requests', '2020-03-10 16:00:00'),
(1761, 'LMLS-0001', 'Tried To Add Request For Agyakwa Ntow Mireku But Patient Had Pending Requests', '2020-03-10 16:01:26'),
(1762, 'LMLS-0001', 'Tried To Add Request For Agyakwa Ntow Mireku But Patient Had Pending Requests', '2020-03-10 16:02:31'),
(1763, 'LMLS-0001', 'Tried To Add Request For Agyakwa Ntow Mireku But Patient Had Pending Requests', '2020-03-10 16:03:04'),
(1764, 'LMLS-0001', 'Tried To Add Request For Agyakwa Ntow Mireku But Patient Had Pending Requests', '2020-03-10 16:03:56'),
(1765, 'LMLS-0001', 'Logged In', '2020-03-10 16:45:49'),
(1766, 'LMLS-0001', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-10 17:57:44'),
(1767, 'LMLS-0001', 'Tried To Add Request For Daniel Jehoshaphat Clegg But Patient Had Pending Requests', '2020-03-10 18:25:54'),
(1768, 'LMLS-0001', 'Added Request For Agyakwa Ntow Mireku', '2020-03-10 18:26:17'),
(1769, 'LMLS-0001', 'Tried To Add Request For Agyakwa Ntow Mireku But Patient Had Pending Requests', '2020-03-10 18:27:20'),
(1770, 'LMLS-0001', 'Tried To Add Request For Agyakwa Ntow Mireku But Patient Had Pending Requests', '2020-03-10 18:27:27'),
(1771, 'LMLS-0001', 'Added Request For Agyakwa Ntow Mireku', '2020-03-10 18:29:22'),
(1772, 'LMLS-0001', 'Added Request For Maria Nortey', '2020-03-10 18:30:50'),
(1773, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-10 18:31:58'),
(1774, 'LMLS-0001', 'Added Request For Agyakwa Ntow Mireku', '2020-03-10 18:34:55'),
(1775, 'LMLS-0001', 'Added Request For Maria Nortey', '2020-03-10 18:41:19'),
(1776, 'LMLS-0001', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-10 18:48:59'),
(1777, 'LMLS-0001', 'Made Payment For Agyakwa Ntow Mireku\'s Request', '2020-03-11 11:29:31'),
(1778, 'LMLS-0001', 'Made Payment For Maria  Nortey\'s Request', '2020-03-11 11:35:34'),
(1779, 'LMLS-0001', 'Made Payment For Daniel Jehoshaphat Clegg\'s Request', '2020-03-11 11:36:05'),
(1780, 'LMLS-0001', 'Made Payment For Agyakwa Ntow Mireku\'s Request', '2020-03-11 12:07:04'),
(1781, 'LMLS-0001', 'Made Payment For Daniel Jehoshaphat Clegg\'s Request', '2020-03-11 12:07:32'),
(1782, 'LMLS-0001', 'Made Payment For Daniel Jehoshaphat Clegg\'s Request', '2020-03-11 12:08:00'),
(1783, 'LMLS-0001', 'Made Payment For Maria  Nortey\'s Request', '2020-03-11 12:23:12'),
(1784, 'LMLS-0001', 'Made Payment For Agyakwa Ntow Mireku\'s Request', '2020-03-11 12:25:40'),
(1785, 'LMLS-0001', 'Made Payment For Daniel Jehoshaphat Clegg\'s Request', '2020-03-11 12:25:54'),
(1786, 'LMLS-0001', 'Made Payment For Maria  Nortey\'s Request', '2020-03-11 12:26:08'),
(1787, 'LMLS-0001', 'Made Payment For Agyakwa Ntow Mireku\'s Request', '2020-03-11 12:27:22'),
(1788, 'LMLS-0001', 'Made Payment For Agyakwa Ntow Mireku\'s Request', '2020-03-11 12:34:28'),
(1789, 'LMLS-0001', 'Made Payment For Agyakwa Ntow Mireku\'s Request', '2020-03-11 14:06:56'),
(1790, 'LMLS-0001', 'Made Payment For Daniel Jehoshaphat Clegg\'s Request', '2020-03-11 14:09:01'),
(1791, 'LMLS-0001', 'Made Payment For Daniel Jehoshaphat Clegg\'s Request', '2020-03-11 14:09:29'),
(1792, 'LMLS-0001', 'Made Payment For Daniel Jehoshaphat Clegg\'s Request', '2020-03-11 14:10:44'),
(1793, 'LMLS-0001', 'Made Payment For Daniel Jehoshaphat Clegg\'s Request', '2020-03-11 14:13:09'),
(1794, 'LMLS-0001', 'Made Payment For Daniel Jehoshaphat Clegg\'s Request', '2020-03-11 14:15:15'),
(1795, 'LMLS-0001', 'Made Payment For Daniel Jehoshaphat Clegg\'s Request', '2020-03-11 14:15:29'),
(1796, 'LMLS-0001', 'Made Payment Of GHS5 For Daniel Jehoshaphat Clegg\'s Request', '2020-03-11 14:18:53'),
(1797, 'LMLS-0001', 'Made Payment Of GHS40 For Daniel Jehoshaphat Clegg\'s Request', '2020-03-11 14:21:52'),
(1798, 'LMLS-0001', 'Made Payment Of GHS80 For Maria  Nortey\'s Request', '2020-03-11 15:12:12'),
(1799, 'LMLS-0001', 'Made Payment Of GHS19 For Maria  Nortey\'s Request', '2020-03-11 15:12:34'),
(1800, 'LMLS-0001', 'Made Payment Of GHS1 For Maria  Nortey\'s Request', '2020-03-11 15:12:48'),
(1801, 'LMLS-0001', 'Updated Request For Maria Nortey', '2020-03-12 11:21:17'),
(1802, 'LMLS-0001', 'Updated Request For Daniel Jehoshaphat Clegg', '2020-03-12 13:23:05'),
(1803, 'LMLS-0001', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-12 13:24:58'),
(1804, 'LMLS-0001', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-12 13:26:47'),
(1805, 'LMLS-0001', 'Made Payment Of GHS60 For Agyakwa Ntow Mireku\'s Request', '2020-03-12 13:27:23'),
(1806, 'LMLS-0001', 'Made Payment Of GHS60 For Agyakwa Ntow Mireku\'s Request', '2020-03-12 13:28:25'),
(1807, 'LMLS-0001', 'Made Payment Of GHS60 For Agyakwa Ntow Mireku\'s Request', '2020-03-12 13:40:06'),
(1808, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 14:55:26'),
(1809, 'LMLS-0001', 'Tried To Add Request For Michelle Ntow Adjei Laryea But Patient Had Pending Requests', '2020-03-12 15:50:06'),
(1810, 'LMLS-0001', 'Tried To Add Request For Agyakwa Ntow Mireku But Patient Had Pending Requests', '2020-03-12 15:50:18'),
(1811, 'LMLS-0001', 'Tried To Add Request For Agyakwa Ntow Mireku But Patient Had Pending Requests', '2020-03-12 15:52:50'),
(1812, 'LMLS-0001', 'Tried To Add Request For Michelle Ntow Adjei Laryea But Patient Had Pending Requests', '2020-03-12 15:55:07'),
(1813, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 16:04:35'),
(1814, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 16:06:38'),
(1815, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 16:08:56'),
(1816, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 16:11:14'),
(1817, 'LMLS-0001', 'Made Payment Of GHS48 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-12 16:11:51'),
(1818, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 16:17:21'),
(1819, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 16:19:45'),
(1820, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 16:23:12'),
(1821, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 16:26:13'),
(1822, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 16:27:07'),
(1823, 'LMLS-0001', 'Made Payment Of GHS54 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-12 16:27:14'),
(1824, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 16:31:48'),
(1825, 'LMLS-0001', 'Tried To Make Payment Of GHS51 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-12 16:32:05'),
(1826, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 16:33:37'),
(1827, 'LMLS-0001', 'Made Payment Of GHS51 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-12 16:33:47'),
(1828, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 16:34:34'),
(1829, 'LMLS-0001', 'Made Payment Of GHS48 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-12 16:34:48'),
(1830, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-12 16:35:15'),
(1831, 'LMLS-0001', 'Made Payment Of GHS50 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-12 16:35:54'),
(1832, 'LMLS-0001', 'Made Payment Of GHS180 For Agyakwa Ntow Mireku\'s Request', '2020-03-12 16:55:30'),
(1833, 'LMLS-0001', 'Made Payment Of GHS4 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-12 16:56:03'),
(1834, 'LMLS-0001', 'Made Payment Of GHS4 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-12 17:02:52'),
(1835, 'LMLS-0001', 'Made Payment Of GHS4 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-12 17:03:31'),
(1836, 'LMLS-0001', 'Made Payment Of GHS20 For Agyakwa Ntow Mireku\'s Request', '2020-03-12 17:10:22'),
(1837, 'LMLS-0001', 'Updated Request For Michelle Ntow Adjei Laryea', '2020-03-12 17:10:37'),
(1838, 'LMLS-0001', 'Updated His Profile', '2020-03-12 17:21:06'),
(1839, 'LMLS-0001', 'Updated His Profile', '2020-03-12 17:21:57'),
(1840, 'LMLS-0001', 'Updated His Profile', '2020-03-12 17:22:18'),
(1841, 'LMLS-0001', 'Updated His Profile', '2020-03-12 17:22:40'),
(1842, 'LMLS-0001', 'Updated His Profile', '2020-03-12 17:23:05'),
(1843, '', 'Logged Out', '2020-03-12 20:04:06'),
(1844, 'LMLS-0001', 'Logged Out', '2020-03-12 20:04:06'),
(1845, 'LMLS-0001', 'Logged In', '2020-03-12 20:04:27'),
(1846, 'LMLS-0001', 'Robert Nii Laryea Adjei-laryea Updated His Password After First Login', '2020-03-12 20:04:40'),
(1847, 'LMLS-0001', 'Logged Out', '2020-03-12 20:04:59'),
(1848, 'LMLS-0001', 'Logged In', '2020-03-12 20:05:02'),
(1849, 'LMLS-0001', 'Robert Nii Laryea Adjei-laryea Updated His Password After First Login', '2020-03-12 20:05:12'),
(1850, 'LMLS-0001', 'Logged Out', '2020-03-12 20:05:17'),
(1851, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-03-12 20:05:20'),
(1852, 'LMLS-0001', 'Logged In', '2020-03-12 20:05:26'),
(1853, 'LMLS-0001', 'Updated His Profile', '2020-03-12 20:05:53'),
(1854, 'LMLS-0001', 'Logged Out', '2020-03-12 20:05:58'),
(1855, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-03-12 20:06:07'),
(1856, 'LMLS-0001', 'Logged In', '2020-03-12 20:06:12'),
(1857, 'LMLS-0001', 'Added Iron To Charges', '2020-03-12 20:10:37'),
(1858, 'LMLS-0001', 'Added Vitamin B12 To Charges', '2020-03-12 20:11:51'),
(1859, 'LMLS-0001', 'Added Phosphate To Charges', '2020-03-12 20:12:50'),
(1860, 'LMLS-0001', 'Added Uric Acid To Charges', '2020-03-12 20:13:23'),
(1861, 'LMLS-0001', 'Added Magnessium To Charges', '2020-03-12 20:14:34'),
(1862, 'LMLS-0001', 'Added Cholesterol To Charges', '2020-03-12 20:15:46'),
(1863, 'LMLS-0001', 'Added Ascitic Fluid Biochem To Charges', '2020-03-12 20:20:00'),
(1864, 'LMLS-0001', 'Added Csf Biochem To Charges', '2020-03-12 20:20:54'),
(1865, 'LMLS-0001', 'Added Synovial Fluid Biochem To Charges', '2020-03-12 20:22:39'),
(1866, 'LMLS-0001', 'Added Pleural Effusion Biochem To Charges', '2020-03-12 20:23:19'),
(1867, 'LMLS-0001', 'Added Serum Protein Electrophoresis To Charges', '2020-03-12 20:24:17'),
(1868, 'LMLS-0001', 'Added Psa To Charges', '2020-03-12 20:25:02'),
(1869, 'LMLS-0001', 'Added Ca-125 To Charges', '2020-03-12 20:26:08'),
(1870, 'LMLS-0001', 'Added Cea To Charges', '2020-03-12 20:27:04'),
(1871, 'LMLS-0001', 'Added Afp To Charges', '2020-03-12 20:28:15'),
(1872, 'LMLS-0001', 'Added B-hcg (quantitative) To Charges', '2020-03-12 20:29:23'),
(1873, 'LMLS-0001', 'Added Fasting To Charges', '2020-03-12 20:30:56'),
(1874, 'LMLS-0001', 'Added Random To Charges', '2020-03-12 20:33:31'),
(1875, 'LMLS-0001', 'Added 24hr Ogtt To Charges', '2020-03-12 20:34:43'),
(1876, 'LMLS-0001', 'Added Hba1c To Charges', '2020-03-12 20:35:37'),
(1877, 'LMLS-0001', 'Added Full Ogtt To Charges', '2020-03-12 20:36:41'),
(1878, 'LMLS-0001', 'Added Tsh To Charges', '2020-03-12 20:37:03'),
(1879, 'LMLS-0001', 'Added Free T3 To Charges', '2020-03-12 20:40:40'),
(1880, 'LMLS-0001', 'Added Free T4 To Charges', '2020-03-12 20:40:54'),
(1881, 'LMLS-0001', 'Added Lh To Charges', '2020-03-12 20:41:31'),
(1882, 'LMLS-0001', 'Added Fsh To Charges', '2020-03-12 20:42:30'),
(1883, 'LMLS-0001', 'Added Prolactin To Charges', '2020-03-12 20:43:22'),
(1884, 'LMLS-0001', 'Added Oestradiol To Charges', '2020-03-12 20:43:48'),
(1885, 'LMLS-0001', 'Added Testosterone To Charges', '2020-03-12 20:44:36'),
(1886, 'LMLS-0001', 'Added Cortisol To Charges', '2020-03-12 20:45:41'),
(1887, 'LMLS-0001', 'Added Progesterone To Charges', '2020-03-12 20:46:11'),
(1888, 'LMLS-0001', 'Added Bilirubin (total &amp; Direct) To Charges', '2020-03-12 20:47:04'),
(1889, 'LMLS-0001', 'Added Ast (sgot) To Charges', '2020-03-12 20:56:35'),
(1890, 'LMLS-0001', 'Added Alk (phos) To Charges', '2020-03-12 20:56:51'),
(1891, 'LMLS-0001', 'Added Alt (sgpt) To Charges', '2020-03-12 20:57:29'),
(1892, 'LMLS-0001', 'Added Total Protein - Albumin To Charges', '2020-03-12 20:59:25'),
(1893, 'LMLS-0001', 'Added Chloride To Charges', '2020-03-12 21:00:47'),
(1894, 'LMLS-0001', 'Added Creatinine Clearance To Charges', '2020-03-12 21:03:02'),
(1895, 'LMLS-0001', 'Added Calcium To Charges', '2020-03-12 21:05:59'),
(1896, 'LMLS-0001', 'Added Bence Jone Protein To Charges', '2020-03-12 21:07:25'),
(1897, 'LMLS-0001', 'Added Vma To Charges', '2020-03-12 21:07:45'),
(1898, 'LMLS-0001', 'Added Ck To Charges', '2020-03-12 21:19:24'),
(1899, 'LMLS-0001', 'Added Ck-mb To Charges', '2020-03-12 21:20:08'),
(1900, 'LMLS-0001', 'Added Ldh To Charges', '2020-03-12 21:20:36'),
(1901, 'LMLS-0001', 'Added Troponin To Charges', '2020-03-12 21:21:24'),
(1902, 'LMLS-0001', 'Added Ast (sgot) - Cardiac To Charges', '2020-03-12 21:22:29'),
(1903, 'LMLS-0001', 'Added Hb To Charges', '2020-03-12 21:23:04'),
(1904, 'LMLS-0001', 'Added Full Blood Count (fbc) To Charges', '2020-03-12 21:24:01'),
(1905, 'LMLS-0001', 'Added Blood Film Comment To Charges', '2020-03-12 21:25:05'),
(1906, 'LMLS-0001', 'Added Esr To Charges', '2020-03-12 21:25:36'),
(1907, 'LMLS-0001', 'Added Reticulocytes To Charges', '2020-03-12 21:26:05'),
(1908, 'LMLS-0001', 'Added Sickling To Charges', '2020-03-12 21:27:27'),
(1909, 'LMLS-0001', 'Added G6pd To Charges', '2020-03-12 21:29:02'),
(1910, 'LMLS-0001', 'Added Hb Electrophoresis To Charges', '2020-03-12 21:29:49'),
(1911, 'LMLS-0001', 'Added Trophozoites Count To Charges', '2020-03-12 21:31:48'),
(1912, 'LMLS-0001', 'Added Blood Group (abo Rh) To Charges', '2020-03-12 21:33:08'),
(1913, 'LMLS-0001', 'Added Clotting Profile To Charges', '2020-03-12 21:34:23'),
(1914, 'LMLS-0001', 'Added Bleeding Time To Charges', '2020-03-12 21:34:58'),
(1915, 'LMLS-0001', 'Added Prothrombin Time (inr) To Charges', '2020-03-12 21:35:37'),
(1916, 'LMLS-0001', 'Added Aptt To Charges', '2020-03-12 21:36:35'),
(1917, 'LMLS-0001', 'Added Chlamydia Antibodies To Charges', '2020-03-12 22:06:46'),
(1918, 'LMLS-0001', 'Added H. Pylori To Charges', '2020-03-12 22:08:04'),
(1919, 'LMLS-0001', 'Added Hepatitis B Profile To Charges', '2020-03-12 22:11:06'),
(1920, 'LMLS-0001', 'Added Infections Mononucleosis (im) To Charges', '2020-03-12 22:11:38'),
(1921, 'LMLS-0001', 'Added Semen Analysis To Charges', '2020-03-12 22:14:44'),
(1922, 'LMLS-0001', 'Added Tpha (t.p Antibodies) To Charges', '2020-03-12 22:15:47'),
(1923, 'LMLS-0001', 'Added Viral Load (hiv/hbv) To Charges', '2020-03-12 22:17:21'),
(1924, 'LMLS-0001', 'Added Widal Test To Charges', '2020-03-12 22:17:54'),
(1925, 'LMLS-0001', 'Tried To Add Request For Michelle Ntow Adjei Laryea But Patient Had Pending Requests', '2020-03-13 11:17:49'),
(1926, 'LMLS-0001', 'Tried To Add Request For Michelle Ntow Adjei Laryea But Patient Had Pending Requests', '2020-03-13 11:18:34'),
(1927, 'LMLS-0001', 'Tried To Add Request For Michelle Ntow Adjei Laryea But Patient Had Pending Requests', '2020-03-13 11:18:40'),
(1928, 'LMLS-0001', 'Made Payment Of GHS54 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-13 11:21:36'),
(1929, 'LMLS-0001', 'Completed Request For Michelle Ntow Adjei Laryea', '2020-03-13 11:21:46'),
(1930, 'LMLS-0001', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-13 11:22:00'),
(1931, 'LMLS-0001', 'Updated Request For Michelle Ntow Adjei Laryea', '2020-03-13 11:23:11'),
(1932, 'LMLS-0001', 'Updated Request For Michelle Ntow Adjei Laryea', '2020-03-13 11:38:48'),
(1933, 'LMLS-0001', 'Updated Request For Michelle Ntow Adjei Laryea', '2020-03-13 11:41:47'),
(1934, 'LMLS-0001', 'Updated Request For Michelle Ntow Adjei Laryea', '2020-03-13 11:43:22'),
(1935, 'LMLS-0001', 'Made Payment Of GHS100 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-13 11:50:18'),
(1936, 'LMLS-0001', 'Tried To Make Payment Of GHS100 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-13 12:08:08'),
(1937, 'LMLS-0001', 'Made Payment Of GHS100 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-13 12:09:45'),
(1938, 'LMLS-0001', 'Made Payment Of GHS500 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-13 12:10:17'),
(1939, 'LMLS-0001', 'Made Payment Of GHS48 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-13 12:10:41'),
(1940, 'LMLS-0001', 'Made Payment Of GHS245 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-13 12:24:54'),
(1941, 'LMLS-0001', 'Made Payment Of GHS400 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-13 12:33:53'),
(1942, 'LMLS-0001', 'Made Payment Of GHS3 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-13 12:34:07'),
(1943, 'LMLS-0001', 'Added Stool Occult Blood To Charges', '2020-03-13 12:50:59'),
(1944, 'LMLS-0001', 'Added Skin Scraping To Charges', '2020-03-13 12:54:19'),
(1945, 'LMLS-0001', 'Added Reducing Substance To Charges', '2020-03-13 12:55:55'),
(1946, 'LMLS-0001', 'Added Vit. Biz To Charges', '2020-03-13 12:58:46'),
(1947, '', 'Printed Receipt For  ', '2020-03-13 13:47:57'),
(1948, 'LMLS-0001', 'Printed Receipt For Agyakwa Ntow Mireku', '2020-03-13 13:47:58'),
(1949, 'LMLS-0001', 'Printed Receipt For Agyakwa Ntow Mireku', '2020-03-13 13:53:59'),
(1950, '', 'Printed Receipt For  ', '2020-03-13 14:16:50'),
(1951, 'LMLS-0001', 'Printed Receipt For Agyakwa Ntow Mireku', '2020-03-13 14:16:50'),
(1952, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 16:22:22'),
(1953, '', 'Viewed Receipt For  ', '2020-03-13 16:46:54'),
(1954, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 16:46:54'),
(1955, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 16:51:38'),
(1956, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 16:53:36'),
(1957, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 16:56:07'),
(1958, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 16:56:17'),
(1959, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 16:57:53'),
(1960, '', 'Viewed Receipt For  ', '2020-03-13 20:32:11'),
(1961, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 20:32:11'),
(1962, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 20:35:39'),
(1963, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 20:37:03'),
(1964, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 20:41:43'),
(1965, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 20:44:34'),
(1966, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 20:45:33'),
(1967, '', 'Viewed Receipt For  ', '2020-03-13 20:46:00'),
(1968, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 20:46:00'),
(1969, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 20:46:47'),
(1970, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 20:48:49'),
(1971, '', 'Viewed Receipt For  ', '2020-03-13 20:51:07'),
(1972, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 20:51:07'),
(1973, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 20:56:20'),
(1974, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 20:57:49'),
(1975, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 21:06:33'),
(1976, '', 'Viewed Receipt For  ', '2020-03-13 21:20:27'),
(1977, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-13 21:20:27'),
(1978, '', 'Viewed  Report From 13 March 2020 To 14 March 2020', '2020-03-13 21:24:24'),
(1979, 'LMLS-0001', 'Viewed Ascitic Fluid C/S Report From 01 January 2020 To 14 March 2020', '2020-03-13 21:24:24'),
(1980, 'LMLS-0001', 'Viewed Ascitic Fluid C/S Report From 01 January 2020 To 14 March 2020', '2020-03-13 21:24:37'),
(1981, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 14 March 2020', '2020-03-13 21:25:31'),
(1982, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 14 March 2020', '2020-03-13 21:27:57'),
(1983, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 14 March 2020', '2020-03-13 21:29:18'),
(1984, '', 'Viewed  Report From 13 March 2020 To 14 March 2020', '2020-03-13 21:42:48'),
(1985, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 30 March 2020', '2020-03-13 21:42:48'),
(1986, 'LMLS-0001', 'Viewed Antenatal Screening Report From 01 January 2020 To 30 March 2020', '2020-03-13 21:43:38'),
(1987, 'LMLS-0001', 'Viewed Aspirate C/S Report From 01 January 2020 To 01 April 2020', '2020-03-13 21:44:24'),
(1988, 'LMLS-0001', 'Viewed BUE Creatinine + eGFR Report From 01 January 2020 To 01 April 2020', '2020-03-13 21:44:50'),
(1989, 'LMLS-0001', 'Viewed Widal Report From 01 January 2020 To 01 April 2020', '2020-03-13 21:45:05'),
(1990, 'LMLS-0001', 'Viewed HBA1C Report From 01 January 2020 To 14 March 2020', '2020-03-13 21:47:43'),
(1991, '', 'Viewed  Report From 14 March 2020 To 15 March 2020', '2020-03-14 13:20:53'),
(1992, 'LMLS-0001', 'Viewed Ascitic Fluid C/S Report From 01 January 2020 To 15 March 2020', '2020-03-14 13:20:53'),
(1993, '', 'Viewed  Report From 14 March 2020 To 15 March 2020', '2020-03-14 13:45:29');
INSERT INTO `audit_trail` (`id`, `staff_id`, `activity`, `date`) VALUES
(1994, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 30 March 2020', '2020-03-14 13:45:29'),
(1995, 'LMLS-0001', 'Viewed Aspirate C/S Report From 01 January 2020 To 30 March 2020', '2020-03-14 13:45:50'),
(1996, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 30 March 2020', '2020-03-14 13:48:31'),
(1997, 'LMLS-0001', 'Viewed ESR Report From 01 January 2020 To 30 March 2020', '2020-03-14 13:48:41'),
(1998, 'LMLS-0001', 'Viewed Ear Swab C/S Report From 01 January 2020 To 30 March 2020', '2020-03-14 13:48:44'),
(1999, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 30 March 2020', '2020-03-14 13:51:45'),
(2000, 'LMLS-0001', 'Viewed Cortisol Report From 01 January 2020 To 30 March 2020', '2020-03-14 13:51:52'),
(2001, 'LMLS-0001', 'Viewed D-Dimers Report From 01 January 2020 To 30 March 2020', '2020-03-14 13:52:01'),
(2002, 'LMLS-0001', 'Viewed Estrogen Report From 01 January 2020 To 30 March 2020', '2020-03-14 13:52:06'),
(2003, 'LMLS-0001', 'Viewed FBC 5P Report From 01 January 2020 To 30 March 2020', '2020-03-14 13:52:16'),
(2004, 'LMLS-0001', 'Viewed HBA1C Report From 01 January 2020 To 30 March 2020', '2020-03-14 13:52:28'),
(2005, '', 'Viewed  Report From 14 March 2020 To 15 March 2020', '2020-03-14 16:03:17'),
(2006, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 30 March 2020', '2020-03-14 16:03:17'),
(2007, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 30 March 2020', '2020-03-14 16:03:28'),
(2008, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 30 March 2020', '2020-03-14 16:08:24'),
(2009, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 30 March 2020', '2020-03-14 16:08:42'),
(2010, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 30 March 2020', '2020-03-14 16:10:25'),
(2011, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 30 March 2020', '2020-03-14 16:17:34'),
(2012, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 30 March 2020', '2020-03-14 16:17:43'),
(2013, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 30 March 2020', '2020-03-14 16:18:26'),
(2014, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 30 March 2020', '2020-03-14 16:18:32'),
(2015, '', 'Logged Out', '2020-03-14 16:50:44'),
(2016, 'LMLS-0001', 'Logged Out', '2020-03-14 16:50:44'),
(2017, 'LMLS-0001', 'Logged In', '2020-03-14 16:51:16'),
(2018, 'LMLS-0001', 'Logged Out', '2020-03-14 16:56:38'),
(2019, 'LMLS-0001', 'Logged In', '2020-03-14 16:56:40'),
(2020, 'LMLS-0001', 'Logged Out', '2020-03-14 16:58:59'),
(2021, 'LMLS-0001', 'Logged In', '2020-03-14 16:59:16'),
(2022, 'LMLS-0001', 'Updated Patient \"Daniel Jehoshaphat Clegg\"', '2020-03-14 17:11:14'),
(2023, 'LMLS-0001', 'Updated Patient \"Daniel Jehoshaphat Clegg\"', '2020-03-14 17:11:14'),
(2024, '', 'Logged Out', '2020-03-14 20:41:34'),
(2025, 'LMLS-0001', 'Logged Out', '2020-03-14 20:41:34'),
(2026, 'LMLS-0001', 'Logged In', '2020-03-14 20:41:37'),
(2027, 'LMLS-0001', 'Added Patient \"Derek Asomaning\"', '2020-03-14 20:43:03'),
(2028, 'LMLS-0001', 'Added Request For Derek Asomaning', '2020-03-14 20:43:20'),
(2029, 'LMLS-0001', 'Logged Out', '2020-03-14 20:49:01'),
(2030, 'LMLS-0001', 'Logged In', '2020-03-14 20:49:14'),
(2031, 'LMLS-0001', 'Added Patient \"Bethany Serwaa Adjei\"', '2020-03-14 20:50:06'),
(2032, 'LMLS-0001', 'Added Request For Bethany Serwaa Adjei', '2020-03-14 20:50:21'),
(2033, 'LMLS-0001', 'Added Patient \"Mark Nisah Anthony\"', '2020-03-14 20:54:19'),
(2034, 'LMLS-0001', 'Added Request For Mark Nisah Anthony', '2020-03-14 20:54:41'),
(2035, 'LMLS-0001', 'Added Request For Bethany Serwaa Adjei', '2020-03-14 21:11:43'),
(2036, 'LMLS-0001', 'Added Request For Mark Nisah Anthony', '2020-03-14 21:19:34'),
(2037, 'LMLS-0001', 'Made Payment Of GHS100 For Mark Nisah Anthony\'s Request', '2020-03-14 21:20:13'),
(2038, 'LMLS-0001', 'Added Request For Bethany Serwaa Adjei', '2020-03-14 21:25:31'),
(2039, 'LMLS-0001', 'Added Request For Mark Nisah Anthony', '2020-03-14 21:28:49'),
(2040, 'LMLS-0001', 'Completed Request For Mark Nisah Anthony', '2020-03-14 21:33:41'),
(2041, '', 'Logged Out', '2020-03-14 21:34:19'),
(2042, 'LMLS-0001', 'Logged Out', '2020-03-14 21:34:19'),
(2043, 'LMLS-0001', 'Logged In', '2020-03-14 21:34:36'),
(2044, 'LMLS-0001', 'Completed Request For Maria Nortey', '2020-03-14 21:35:43'),
(2045, '', 'Viewed Receipt For  ', '2020-03-14 21:35:46'),
(2046, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-03-14 21:35:46'),
(2047, 'LMLS-0001', 'Added Request For Maria Nortey', '2020-03-14 21:36:35'),
(2048, 'LMLS-0001', 'Added Request For Maria Nortey', '2020-03-14 21:37:30'),
(2049, 'LMLS-0001', 'Made Payment Of GHS100 For Maria  Nortey\'s Request', '2020-03-14 21:37:56'),
(2050, 'LMLS-0001', 'Made Payment Of GHS10.5 For Maria  Nortey\'s Request', '2020-03-14 21:38:25'),
(2051, 'LMLS-0001', 'Completed Request For Maria Nortey', '2020-03-14 21:38:46'),
(2052, 'LMLS-0001', 'Added Request For Maria Nortey', '2020-03-14 21:39:31'),
(2053, '', 'Viewed  Report From 15 March 2020 To 16 March 2020', '2020-03-15 12:05:22'),
(2054, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 23 March 2020', '2020-03-15 12:05:22'),
(2055, 'LMLS-0001', 'Updated Role Lab Technician', '2020-03-15 12:09:17'),
(2056, 'LMLS-0001', 'Updated Role Front Desk', '2020-03-15 12:09:48'),
(2057, '', 'Logged Out', '2020-03-15 12:12:43'),
(2058, 'LMLS-0001', 'Logged Out', '2020-03-15 12:12:43'),
(2059, 'LMLS-0001', 'Logged In', '2020-03-15 12:12:45'),
(2060, 'LMLS-0001', 'Tried To Create Role Administrator But It Already Exists', '2020-03-15 12:22:15'),
(2061, 'LMLS-0001', 'Added Amylase To Charges', '2020-03-15 22:02:43'),
(2062, 'LMLS-0001', 'Added Albumin To Charges', '2020-03-15 22:03:07'),
(2063, 'LMLS-0001', 'Added B2 Microalbumin To Charges', '2020-03-15 22:04:05'),
(2064, 'LMLS-0001', 'Added Bence Jones Protein To Charges', '2020-03-15 22:04:39'),
(2065, 'LMLS-0001', 'Added Bue Creatinine To Charges', '2020-03-15 22:05:27'),
(2066, 'LMLS-0001', 'Added Cardiac Enzymes To Charges', '2020-03-15 22:06:49'),
(2067, 'LMLS-0001', 'Added Ck To Charges', '2020-03-15 22:07:17'),
(2068, 'LMLS-0001', 'Added Ck-mb To Charges', '2020-03-15 22:08:01'),
(2069, 'LMLS-0001', 'Added Creatinine Clearance To Charges', '2020-03-15 22:08:34'),
(2070, 'LMLS-0001', 'Added Csf Biochem To Charges', '2020-03-15 22:09:14'),
(2071, 'LMLS-0001', 'Added Direct Bilirubin To Charges', '2020-03-15 22:09:36'),
(2072, 'LMLS-0001', 'Added Faecal Reducing Substance To Charges', '2020-03-15 22:10:11'),
(2073, 'LMLS-0001', 'Added Fasting Lipids To Charges', '2020-03-15 22:10:39'),
(2074, 'LMLS-0001', 'Added Fasting Random Blood Glucose To Charges', '2020-03-15 22:13:04'),
(2075, 'LMLS-0001', 'Added Ferritin To Charges', '2020-03-15 22:13:51'),
(2076, 'LMLS-0001', 'Added Folate Serum To Charges', '2020-03-15 22:14:11'),
(2077, 'LMLS-0001', 'Added Free Light Chains To Charges', '2020-03-15 22:15:01'),
(2078, 'LMLS-0001', 'Added Hba1c To Charges', '2020-03-15 22:15:30'),
(2079, 'LMLS-0001', 'Added Immunoglobulin To Charges', '2020-03-15 22:17:08'),
(2080, 'LMLS-0001', 'Added Iron + Transferrin To Charges', '2020-03-15 22:18:05'),
(2081, 'LMLS-0001', 'Added Lactate To Charges', '2020-03-15 22:18:59'),
(2082, 'LMLS-0001', 'Added Ldh To Charges', '2020-03-15 22:19:22'),
(2083, 'LMLS-0001', 'Added Lft To Charges', '2020-03-15 22:19:50'),
(2084, 'LMLS-0001', 'Updated Charge \"Ldh\" From GHS 60.00 To GHS 50.00', '2020-03-15 22:20:48'),
(2085, 'LMLS-0001', 'Added Lipase To Charges', '2020-03-15 22:21:31'),
(2086, 'LMLS-0001', 'Added Magnessium To Charges', '2020-03-15 22:22:13'),
(2087, 'LMLS-0001', 'Added Phosphate To Charges', '2020-03-15 22:22:31'),
(2088, 'LMLS-0001', 'Added Pleural Ascitic Synovial Fluid To Charges', '2020-03-15 22:23:26'),
(2089, 'LMLS-0001', 'Added Protein Electrophoresis To Charges', '2020-03-15 22:23:55'),
(2090, 'LMLS-0001', 'Added Serum Calcium Corrected To Charges', '2020-03-15 22:24:57'),
(2091, 'LMLS-0001', 'Added Serum Calcium Ionised To Charges', '2020-03-15 22:25:15'),
(2092, 'LMLS-0001', 'Added Serum Iron To Charges', '2020-03-15 22:25:37'),
(2093, 'LMLS-0001', 'Added Total Protein To Charges', '2020-03-15 22:26:07'),
(2094, 'LMLS-0001', 'Added Total Bilirubin To Charges', '2020-03-15 22:26:33'),
(2095, 'LMLS-0001', 'Added Transferrin To Charges', '2020-03-15 22:27:10'),
(2096, 'LMLS-0001', 'Added Troponin I To Charges', '2020-03-15 22:27:35'),
(2097, 'LMLS-0001', 'Added Troponin T To Charges', '2020-03-15 22:27:49'),
(2098, 'LMLS-0001', 'Added 24hr Ogtt To Charges', '2020-03-15 22:30:51'),
(2099, 'LMLS-0001', 'Added 24hr Post Prandial Glucose To Charges', '2020-03-15 22:31:49'),
(2100, 'LMLS-0001', 'Added 24hr Urine Protein To Charges', '2020-03-15 22:32:16'),
(2101, 'LMLS-0001', 'Added 24hr Vma To Charges', '2020-03-15 22:32:41'),
(2102, 'LMLS-0001', 'Added U - Micro Albumin Creatinine Ratio To Charges', '2020-03-15 22:34:25'),
(2103, 'LMLS-0001', 'Added Uric Acid To Charges', '2020-03-15 22:35:04'),
(2104, 'LMLS-0001', 'Added Urine Reducing Substance To Charges', '2020-03-15 22:35:29'),
(2105, 'LMLS-0001', 'Added Vitamin B12 To Charges', '2020-03-15 22:35:49'),
(2106, 'LMLS-0001', 'Added Bf For Mps To Charges', '2020-03-15 22:36:37'),
(2107, 'LMLS-0001', 'Added Blood Group + Rh Antigen To Charges', '2020-03-15 22:37:24'),
(2108, 'LMLS-0001', 'Added Direct Anti Human Globulin To Charges', '2020-03-15 22:37:48'),
(2109, 'LMLS-0001', 'Added Esr To Charges', '2020-03-15 22:38:13'),
(2110, 'LMLS-0001', 'Added Fbc + Blood Film Comment To Charges', '2020-03-15 22:38:38'),
(2111, 'LMLS-0001', 'Added Full Blood Count (fbc) To Charges', '2020-03-15 22:39:07'),
(2112, 'LMLS-0001', 'Added G6pd Qualitative To Charges', '2020-03-15 22:40:04'),
(2113, 'LMLS-0001', 'Added Hb Electrophoresis To Charges', '2020-03-15 22:40:31'),
(2114, 'LMLS-0001', 'Added Indirect Anti Human Globulin To Charges', '2020-03-15 22:40:56'),
(2115, 'LMLS-0001', 'Added Mononucleosis Spot - Paul Bunnel To Charges', '2020-03-15 22:41:41'),
(2116, 'LMLS-0001', 'Added Reticulocytes Count To Charges', '2020-03-15 22:42:05'),
(2117, 'LMLS-0001', 'Added Sickling Test To Charges', '2020-03-15 22:42:24'),
(2118, 'LMLS-0001', 'Added Trophozoites Count To Charges', '2020-03-15 22:43:04'),
(2119, 'LMLS-0001', 'Added Anti Ccp To Charges', '2020-03-15 22:43:55'),
(2120, 'LMLS-0001', 'Added Anti Thrombin Iii Functional To Charges', '2020-03-15 22:44:44'),
(2121, 'LMLS-0001', 'Added Bleeding Time To Charges', '2020-03-15 22:45:14'),
(2122, 'LMLS-0001', 'Added Clotting Profile To Charges', '2020-03-15 22:45:33'),
(2123, 'LMLS-0001', 'Added Clotting Time To Charges', '2020-03-15 22:45:52'),
(2124, 'LMLS-0001', 'Added D - Dimer To Charges', '2020-03-15 22:46:17'),
(2125, 'LMLS-0001', 'Added Factor 8 To Charges', '2020-03-15 22:46:39'),
(2126, 'LMLS-0001', 'Added Factor 9 To Charges', '2020-03-15 22:46:51'),
(2127, 'LMLS-0001', 'Added Fibrinogen To Charges', '2020-03-15 22:47:20'),
(2128, 'LMLS-0001', 'Added Protein C To Charges', '2020-03-15 22:47:56'),
(2129, 'LMLS-0001', 'Added Protein S To Charges', '2020-03-15 22:48:07'),
(2130, 'LMLS-0001', 'Added Prothrombin Time (pt) - Inr To Charges', '2020-03-15 22:49:07'),
(2131, 'LMLS-0001', 'Added Thromboplastin Time (aptt) To Charges', '2020-03-15 22:49:45'),
(2132, 'LMLS-0001', 'Added Von Willibrands Factor To Charges', '2020-03-15 22:50:03'),
(2133, 'LMLS-0001', 'Added Blood C/s To Charges', '2020-03-16 09:16:33'),
(2134, 'LMLS-0001', 'Added Cervical Swab For C/s To Charges', '2020-03-16 09:17:05'),
(2135, 'LMLS-0001', 'Added Corneal Scrapping For C/s To Charges', '2020-03-16 09:18:10'),
(2136, 'LMLS-0001', 'Added Csf Bacteriology To Charges', '2020-03-16 09:18:44'),
(2137, 'LMLS-0001', 'Added Ear Swab For C/s To Charges', '2020-03-16 09:19:59'),
(2138, 'LMLS-0001', 'Added Eye Swab For C/s To Charges', '2020-03-16 09:20:25'),
(2139, 'LMLS-0001', 'Added Endocervical Swab For C/s To Charges', '2020-03-16 09:21:22'),
(2140, 'LMLS-0001', 'Added H. Pylori Antibodies To Charges', '2020-03-16 09:24:17'),
(2141, 'LMLS-0001', 'Added H. Pylori Antigen To Charges', '2020-03-16 09:24:26'),
(2142, 'LMLS-0001', 'Added Hvs C/s To Charges', '2020-03-16 09:28:38'),
(2143, 'LMLS-0001', 'Added Hvs R/e To Charges', '2020-03-16 09:29:17'),
(2144, 'LMLS-0001', 'Added Semen C/s To Charges', '2020-03-16 09:29:47'),
(2145, 'LMLS-0001', 'Added Skin Scraping For Culture To Charges', '2020-03-16 09:30:49'),
(2146, 'LMLS-0001', 'Added Skin Scraping For Fungal Elements To Charges', '2020-03-16 09:31:05'),
(2147, 'LMLS-0001', 'Added Stool C/s To Charges', '2020-03-16 09:31:43'),
(2148, 'LMLS-0001', 'Added Stool For Rota And Adnoviruses To Charges', '2020-03-16 09:32:11'),
(2149, 'LMLS-0001', 'Added Stool Occult Blood Test To Charges', '2020-03-16 09:32:35'),
(2150, 'LMLS-0001', 'Added Stool R/e To Charges', '2020-03-16 09:44:55'),
(2151, 'LMLS-0001', 'Added Sputum For Afb To Charges', '2020-03-16 09:45:30'),
(2152, 'LMLS-0001', 'Added Sputum For C/s To Charges', '2020-03-16 09:45:46'),
(2153, 'LMLS-0001', 'Added Throat Swab For C/s To Charges', '2020-03-16 09:46:17'),
(2154, 'LMLS-0001', 'Added Urethral Swab For C/s To Charges', '2020-03-16 09:47:02'),
(2155, 'LMLS-0001', 'Added Urethral Swab For Gram Stain To Charges', '2020-03-16 09:47:12'),
(2156, 'LMLS-0001', 'Added Urine C/s To Charges', '2020-03-16 09:47:40'),
(2157, 'LMLS-0001', 'Added Urine R/e To Charges', '2020-03-16 09:47:50'),
(2158, 'LMLS-0001', 'Added Widal Test To Charges', '2020-03-16 09:48:19'),
(2159, 'LMLS-0001', 'Added Wound Swab For C/s To Charges', '2020-03-16 09:49:23'),
(2160, 'LMLS-0001', 'Added Anti Streptolysin O To Charges', '2020-03-16 09:50:34'),
(2161, 'LMLS-0001', 'Added Bilhazia Antibody (igg And Igm) To Charges', '2020-03-16 09:51:23'),
(2162, 'LMLS-0001', 'Added Bilhazia Antigen Urine Serum To Charges', '2020-03-16 09:51:49'),
(2163, 'LMLS-0001', 'Added Chlamydia Abs To Charges', '2020-03-16 09:52:42'),
(2164, 'LMLS-0001', 'Added Cmv - Iga And Igm To Charges', '2020-03-16 09:53:19'),
(2165, 'LMLS-0001', 'Added Gonorrhoea Ab To Charges', '2020-03-16 09:53:41'),
(2166, 'LMLS-0001', 'Added Hepatitis A To Charges', '2020-03-16 09:54:07'),
(2167, 'LMLS-0001', 'Added Hepatitis B Profile To Charges', '2020-03-16 09:54:27'),
(2168, 'LMLS-0001', 'Added Hepatitis B Screen To Charges', '2020-03-16 09:54:46'),
(2169, 'LMLS-0001', 'Added Hepatitis B Viral Load To Charges', '2020-03-16 09:55:08'),
(2170, 'LMLS-0001', 'Added Hepatitis C Screen To Charges', '2020-03-16 09:55:33'),
(2171, 'LMLS-0001', 'Added Hepatitis C Viral Load To Charges', '2020-03-16 09:56:01'),
(2172, 'LMLS-0001', 'Added Hiv Viral Load To Charges', '2020-03-16 09:56:42'),
(2173, 'LMLS-0001', 'Added Retro Screen To Charges', '2020-03-16 09:57:08'),
(2174, 'LMLS-0001', 'Added Retro Screen Confirmation To Charges', '2020-03-16 09:57:38'),
(2175, 'LMLS-0001', 'Added Rubella Igg And Igm To Charges', '2020-03-16 09:58:08'),
(2176, 'LMLS-0001', 'Added Syphilis Profile Vdrl T. Pallidium Igg And Igm To Charges', '2020-03-16 09:59:00'),
(2177, 'LMLS-0001', 'Added T Pallidium Latex To Charges', '2020-03-16 09:59:41'),
(2178, 'LMLS-0001', 'Added T. Pallidium Antibody To Charges', '2020-03-16 09:59:54'),
(2179, 'LMLS-0001', 'Added Toxo - Igg And Igm To Charges', '2020-03-16 10:00:19'),
(2180, 'LMLS-0001', 'Added Vdrl To Charges', '2020-03-16 10:00:49'),
(2181, 'LMLS-0001', 'Added Thyroid Function Test To Charges', '2020-03-16 10:01:41'),
(2182, 'LMLS-0001', 'Added Tsh To Charges', '2020-03-16 10:02:08'),
(2183, 'LMLS-0001', 'Added Ft3 To Charges', '2020-03-16 10:02:28'),
(2184, 'LMLS-0001', 'Tried To Add Ft3 To Charges But It Already Existed', '2020-03-16 10:02:37'),
(2185, 'LMLS-0001', 'Added Ft4 To Charges', '2020-03-16 10:02:45'),
(2186, 'LMLS-0001', 'Added Thyroglobin Antibody To Charges', '2020-03-16 10:03:06'),
(2187, 'LMLS-0001', 'Added Thyroid Auto Antibodies To Charges', '2020-03-16 10:03:29'),
(2188, 'LMLS-0001', 'Added Tsh Releasing Receptors Antibody To Charges', '2020-03-16 10:05:00'),
(2189, 'LMLS-0001', 'Added 24hr Urine Cortisol To Charges', '2020-03-16 10:10:23'),
(2190, 'LMLS-0001', 'Added Acetylcholine Receptor Antibody To Charges', '2020-03-16 10:12:57'),
(2191, '', 'Logged Out', '2020-03-16 10:13:07'),
(2192, 'LMLS-0001', 'Logged Out', '2020-03-16 10:13:07'),
(2193, 'LMLS-0000', 'Logged In', '2020-03-16 10:13:13'),
(2194, 'LMLS-0000', 'Added Aldenocortitropic Hormone (acth) To Charges', '2020-03-16 10:19:21'),
(2195, 'LMLS-0000', 'Added Aldosterone To Charges', '2020-03-16 10:20:01'),
(2196, 'LMLS-0000', 'Added Angiotensin Converting Enzymes (ace) To Charges', '2020-03-16 10:20:38'),
(2197, 'LMLS-0000', 'Added Antimulerian Hormone To Charges', '2020-03-16 10:21:30'),
(2198, 'LMLS-0000', 'Added Cortisol (blood) To Charges', '2020-03-16 10:21:50'),
(2199, 'LMLS-0000', 'Added Dheas To Charges', '2020-03-16 10:22:09'),
(2200, 'LMLS-0000', 'Added Estrogen To Charges', '2020-03-16 10:22:36'),
(2201, 'LMLS-0000', 'Added Estrol - E3 To Charges', '2020-03-16 10:23:12'),
(2202, 'LMLS-0000', 'Added Female Fertility Hormonal Assay To Charges', '2020-03-16 10:23:36'),
(2203, 'LMLS-0000', 'Added Male Fertility Hormonal Assay To Charges', '2020-03-16 10:24:00'),
(2204, 'LMLS-0000', 'Added Free Testosterone To Charges', '2020-03-16 10:24:28'),
(2205, 'LMLS-0000', 'Added Fsh To Charges', '2020-03-16 10:24:50'),
(2206, 'LMLS-0000', 'Added Growth Hormone (fasting/random) To Charges', '2020-03-16 10:25:46'),
(2207, 'LMLS-0000', 'Added Lh To Charges', '2020-03-16 10:26:48'),
(2208, 'LMLS-0000', 'Added Oestradiol To Charges', '2020-03-16 10:27:22'),
(2209, 'LMLS-0000', 'Added Parathyroid Hormone (pth) To Charges', '2020-03-16 10:27:45'),
(2210, 'LMLS-0000', 'Added Progesterone To Charges', '2020-03-16 10:28:27'),
(2211, 'LMLS-0000', 'Added Prolactin To Charges', '2020-03-16 10:28:45'),
(2212, 'LMLS-0000', 'Added Semen Analysis To Charges', '2020-03-16 10:29:11'),
(2213, 'LMLS-0000', 'Added Semen Antibodies To Charges', '2020-03-16 10:29:51'),
(2214, 'LMLS-0000', 'Added Sex Hormone Binding Globulin To Charges', '2020-03-16 10:31:35'),
(2215, 'LMLS-0000', 'Added Testosterone To Charges', '2020-03-16 10:32:12'),
(2216, 'LMLS-0000', 'Added Afp To Charges', '2020-03-16 10:32:37'),
(2217, 'LMLS-0000', 'Added Ca - 125 To Charges', '2020-03-16 10:33:24'),
(2218, 'LMLS-0000', 'Added Ca - 15.3 To Charges', '2020-03-16 10:33:47'),
(2219, 'LMLS-0000', 'Added Ca - 19.9 To Charges', '2020-03-16 10:34:00'),
(2220, 'LMLS-0000', 'Added Cea To Charges', '2020-03-16 10:34:54'),
(2221, 'LMLS-0000', 'Added Crp To Charges', '2020-03-16 10:36:24'),
(2222, 'LMLS-0000', 'Added Psa To Charges', '2020-03-16 10:37:00'),
(2223, 'LMLS-0000', 'Added Total Bhcg - Blood Qualitative To Charges', '2020-03-16 10:37:25'),
(2224, 'LMLS-0000', 'Added 17 Oh Progesterone To Charges', '2020-03-16 10:42:22'),
(2225, '', 'Logged Out', '2020-03-16 12:20:19'),
(2226, 'LMLS-0000', 'Logged Out', '2020-03-16 12:20:19'),
(2227, 'LMLS-0000', 'Logged In', '2020-03-16 12:20:21'),
(2228, 'LMLS-0000', 'Tried To Add Request For Michelle Ntow Adjei Laryea But Patient Had Pending Requests', '2020-03-16 12:51:33'),
(2229, 'LMLS-0000', 'Tried To Add Request For Michelle Ntow Adjei Laryea But Patient Had Pending Requests', '2020-03-16 12:51:38'),
(2230, 'LMLS-0000', 'Made Payment Of GHS100 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-16 12:52:00'),
(2231, 'LMLS-0000', 'Completed Request For Michelle Ntow Adjei Laryea', '2020-03-16 12:52:29'),
(2232, '', 'Viewed Receipt For  ', '2020-03-16 12:52:39'),
(2233, 'LMLS-0000', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-16 12:52:39'),
(2234, 'LMLS-0000', 'Viewed Receipt For Maria Nortey', '2020-03-16 12:52:46'),
(2235, 'LMLS-0000', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-16 12:53:05'),
(2236, 'LMLS-0000', 'Viewed Receipt For Maria Nortey', '2020-03-16 12:53:49'),
(2237, 'LMLS-0000', 'Viewed Receipt For Maria Nortey', '2020-03-16 12:54:32'),
(2238, 'LMLS-0000', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-16 12:55:39'),
(2239, 'LMLS-0000', 'Made Payment Of GHS299 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-16 12:56:11'),
(2240, 'LMLS-0000', 'Updated Request For Michelle Ntow Adjei Laryea', '2020-03-16 12:57:02'),
(2241, 'LMLS-0000', 'Updated Request For Michelle Ntow Adjei Laryea', '2020-03-16 13:00:29'),
(2242, 'LMLS-0000', 'Updated Request For Michelle Ntow Adjei Laryea', '2020-03-16 13:00:57'),
(2243, 'LMLS-0000', 'Updated Request For Michelle Ntow Adjei Laryea', '2020-03-16 13:04:05'),
(2244, 'LMLS-0000', 'Updated Request For Michelle Ntow Adjei Laryea', '2020-03-16 13:04:22'),
(2245, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 14:48:25'),
(2246, '', 'Logged Out', '2020-03-16 16:02:22'),
(2247, 'LMLS-0000', 'Logged Out', '2020-03-16 16:02:22'),
(2248, 'LMLS-0001', 'Logged In', '2020-03-16 16:32:24'),
(2249, 'LMLS-0000', 'Logged In', '2020-03-16 19:17:26'),
(2250, 'LMLS-0000', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-16 19:20:24'),
(2251, 'LMLS-0000', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-16 19:33:15'),
(2252, 'LMLS-0000', 'Tried To Add Request For Maria Nortey', '2020-03-16 19:37:42'),
(2253, 'LMLS-0000', 'Tried To Add Request For Maria Nortey', '2020-03-16 19:42:27'),
(2254, 'LMLS-0000', 'Added Request For Maria Nortey', '2020-03-16 19:52:03'),
(2255, 'LMLS-0000', 'Added Request For Maria Nortey', '2020-03-16 19:56:47'),
(2256, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 20:43:56'),
(2257, 'LMLS-0000', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-16 20:44:46'),
(2258, 'LMLS-0000', 'Added Request For Maria Nortey', '2020-03-16 20:45:14'),
(2259, 'LMLS-0000', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-16 20:46:11'),
(2260, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 20:46:41'),
(2261, 'LMLS-0000', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-16 20:46:56'),
(2262, 'LMLS-0000', 'Added Bicarbonate To Charges', '2020-03-16 20:49:02'),
(2263, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 20:54:42'),
(2264, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 20:57:53'),
(2265, 'LMLS-0000', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-16 20:58:36'),
(2266, 'LMLS-0000', 'Added Request For Maria Nortey', '2020-03-16 20:59:02'),
(2267, 'LMLS-0000', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-16 20:59:32'),
(2268, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 21:00:01'),
(2269, 'LMLS-0000', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-16 21:00:20'),
(2270, 'LMLS-0000', 'Added Request For Maria Nortey', '2020-03-16 21:00:43'),
(2271, 'LMLS-0000', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-16 21:01:06'),
(2272, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 21:01:41'),
(2273, 'LMLS-0000', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-16 21:02:00'),
(2274, 'LMLS-0000', 'Added Request For Maria Nortey', '2020-03-16 21:02:32'),
(2275, 'LMLS-0000', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-16 21:02:59'),
(2276, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 21:03:29'),
(2277, 'LMLS-0000', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-16 21:03:47'),
(2278, 'LMLS-0000', 'Added Request For Maria Nortey', '2020-03-16 21:04:11'),
(2279, 'LMLS-0000', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-16 21:04:25'),
(2280, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 21:07:02'),
(2281, 'LMLS-0000', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-16 21:07:30'),
(2282, 'LMLS-0000', 'Added Request For Maria Nortey', '2020-03-16 21:07:54'),
(2283, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 21:08:37'),
(2284, 'LMLS-0000', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-16 21:09:06'),
(2285, 'LMLS-0000', 'Added Request For Maria Nortey', '2020-03-16 21:09:29'),
(2286, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 21:13:09'),
(2287, 'LMLS-0000', 'Made Payment Of GHS100 For Agyakwa Ntow Mireku\'s Request', '2020-03-16 21:14:17'),
(2288, 'LMLS-0000', 'Made Payment Of GHS8879 For Agyakwa Ntow Mireku\'s Request', '2020-03-16 21:16:39'),
(2289, 'LMLS-0000', 'Made Payment Of GHS0.5 For Agyakwa Ntow Mireku\'s Request', '2020-03-16 21:17:02'),
(2290, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 21:17:20'),
(2291, 'LMLS-0000', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-16 21:33:48'),
(2292, 'LMLS-0000', 'Made Payment Of GHS250 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-16 21:34:09'),
(2293, 'LMLS-0000', 'Made Payment Of GHS20 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-16 21:34:23'),
(2294, 'LMLS-0000', 'Completed Request For Agyakwa Ntow Mireku', '2020-03-16 21:34:34'),
(2295, 'LMLS-0000', 'Completed Request For Agyakwa Ntow Mireku', '2020-03-16 21:34:40'),
(2296, 'LMLS-0000', 'Completed Request For Michelle Ntow Adjei Laryea', '2020-03-16 21:34:48'),
(2297, 'LMLS-0000', 'Completed Request For Agyakwa Ntow Mireku', '2020-03-16 21:34:55'),
(2298, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 21:42:42'),
(2299, 'LMLS-0000', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-16 21:43:01'),
(2300, 'LMLS-0000', 'Made Payment Of GHS270 For Agyakwa Ntow Mireku\'s Request', '2020-03-16 21:43:24'),
(2301, 'LMLS-0000', 'Made Payment Of GHS200 For Daniel Jehoshaphat Clegg\'s Request', '2020-03-16 21:43:42'),
(2302, 'LMLS-0000', 'Updated Request For Daniel Jehoshaphat Clegg', '2020-03-16 21:44:00'),
(2303, 'LMLS-0000', 'Updated Request For Daniel Jehoshaphat Clegg', '2020-03-16 21:44:19'),
(2304, 'LMLS-0000', 'Made Payment Of GHS55 For Daniel Jehoshaphat Clegg\'s Request', '2020-03-16 21:44:41'),
(2305, 'LMLS-0000', 'Updated Request For Daniel Jehoshaphat Clegg', '2020-03-16 21:44:51'),
(2306, 'LMLS-0000', 'Completed Request For Daniel Jehoshaphat Clegg', '2020-03-16 21:45:01'),
(2307, 'LMLS-0000', 'Completed Request For Agyakwa Ntow Mireku', '2020-03-16 21:45:04'),
(2308, 'LMLS-0000', 'Completed Request For Agyakwa Ntow Mireku', '2020-03-16 21:51:23'),
(2309, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 22:00:39'),
(2310, 'LMLS-0000', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-16 22:00:51'),
(2311, 'LMLS-0000', 'Made Payment Of GHS295 For Agyakwa Ntow Mireku\'s Request', '2020-03-16 22:02:12'),
(2312, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 22:02:24'),
(2313, 'LMLS-0000', 'Made Payment Of GHS110 For Daniel Jehoshaphat Clegg\'s Request', '2020-03-16 22:04:54'),
(2314, 'LMLS-0000', 'Updated Request For Daniel Jehoshaphat Clegg', '2020-03-16 22:08:21'),
(2315, 'LMLS-0000', 'Updated Request For Daniel Jehoshaphat Clegg', '2020-03-16 22:09:24'),
(2316, 'LMLS-0000', 'Updated Request For Daniel Jehoshaphat Clegg', '2020-03-16 22:09:35'),
(2317, 'LMLS-0000', 'Updated Request For Daniel Jehoshaphat Clegg', '2020-03-16 22:10:58'),
(2318, 'LMLS-0000', 'Updated Request For Daniel Jehoshaphat Clegg', '2020-03-16 22:11:04'),
(2319, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 22:14:53'),
(2320, 'LMLS-0000', 'Added Request For Daniel Jehoshaphat Clegg', '2020-03-16 22:15:06'),
(2321, 'LMLS-0000', 'Made Payment Of GHS295 For Agyakwa Ntow Mireku\'s Request', '2020-03-16 22:18:16'),
(2322, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 22:18:28'),
(2323, 'LMLS-0000', 'Made Payment Of GHS250 For Daniel Jehoshaphat Clegg\'s Request', '2020-03-16 22:20:54'),
(2324, 'LMLS-0000', 'Made Payment Of GHS250 For Daniel Jehoshaphat Clegg\'s Request', '2020-03-16 22:22:16'),
(2325, 'LMLS-0000', 'Completed Request For Agyakwa Ntow Mireku', '2020-03-16 22:22:27'),
(2326, '', 'Viewed Receipt For  ', '2020-03-16 22:22:32'),
(2327, 'LMLS-0000', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-16 22:22:33'),
(2328, 'LMLS-0000', 'Completed Request For Daniel Jehoshaphat Clegg', '2020-03-16 22:22:45'),
(2329, 'LMLS-0000', 'Added Request For Agyakwa Ntow Mireku', '2020-03-16 22:23:29'),
(2330, 'LMLS-0000', 'Added Request For Michelle Ntow Adjei Laryea', '2020-03-16 22:23:41'),
(2331, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 22:24:00'),
(2332, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 22:27:22'),
(2333, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 22:27:33'),
(2334, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 22:28:48'),
(2335, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 22:29:45'),
(2336, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 22:29:56'),
(2337, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 22:30:39'),
(2338, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 22:31:31'),
(2339, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 22:32:07'),
(2340, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 22:32:13'),
(2341, 'LMLS-0000', 'Made Payment Of GHS120 For Agyakwa Ntow Mireku\'s Request', '2020-03-16 22:32:35'),
(2342, 'LMLS-0000', 'Updated Request For Agyakwa Ntow Mireku', '2020-03-16 22:32:44'),
(2343, 'LMLS-0000', 'Completed Request For Agyakwa Ntow Mireku', '2020-03-16 22:33:15'),
(2344, 'LMLS-0000', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-16 22:33:18'),
(2345, 'LMLS-0000', 'Made Payment Of GHS270 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-16 22:33:36'),
(2346, 'LMLS-0000', 'Updated Request For Michelle Ntow Adjei Laryea', '2020-03-16 22:33:44'),
(2347, 'LMLS-0000', 'Made Payment Of GHS125 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-16 22:34:01'),
(2348, 'LMLS-0000', 'Updated Request For Michelle Ntow Adjei Laryea', '2020-03-16 22:34:14'),
(2349, 'LMLS-0000', 'Made Payment Of GHS60 For Michelle Ntow Adjei Laryea\'s Request', '2020-03-16 22:34:24'),
(2350, 'LMLS-0000', 'Updated Request For Michelle Ntow Adjei Laryea', '2020-03-16 22:34:34'),
(2351, 'LMLS-0000', 'Completed Request For Michelle Ntow Adjei Laryea', '2020-03-16 22:34:53'),
(2352, '', 'Logged Out', '2020-03-17 06:52:50'),
(2353, 'LMLS-0000', 'Logged Out', '2020-03-17 06:52:50'),
(2354, 'LMLS-0000', 'Logged In', '2020-03-17 06:53:03'),
(2355, '', 'Viewed  Report From 17 March 2020 To 18 March 2020', '2020-03-17 06:53:59'),
(2356, 'LMLS-0000', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-17 06:53:59'),
(2357, 'LMLS-0000', 'Added Request For Derek Asomaning', '2020-03-17 06:54:18'),
(2358, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 06:54:41'),
(2359, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 06:54:50'),
(2360, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 06:54:56'),
(2361, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 06:55:03'),
(2362, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 06:55:10'),
(2363, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 06:55:17'),
(2364, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 06:55:33'),
(2365, 'LMLS-0000', 'Completed Request For Derek Asomaning', '2020-03-17 06:55:39'),
(2366, 'LMLS-0000', 'Added Request For Derek Asomaning', '2020-03-17 06:59:28'),
(2367, 'LMLS-0000', 'Completed Request For Derek Asomaning', '2020-03-17 06:59:33'),
(2368, '', 'Viewed Receipt For  ', '2020-03-17 06:59:37'),
(2369, 'LMLS-0000', 'Viewed Receipt For Derek Asomaning', '2020-03-17 06:59:37'),
(2370, 'LMLS-0000', 'Added Request For Derek Asomaning', '2020-03-17 07:00:44'),
(2371, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 07:00:50'),
(2372, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 07:04:20'),
(2373, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 07:04:27'),
(2374, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 07:04:39'),
(2375, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 07:04:55'),
(2376, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 07:05:07'),
(2377, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 07:05:22'),
(2378, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 07:06:20'),
(2379, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 07:06:49'),
(2380, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 07:08:57'),
(2381, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 07:09:14'),
(2382, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-17 07:18:26'),
(2383, '', 'Logged Out', '2020-03-17 10:13:31'),
(2384, 'LMLS-0000', 'Logged Out', '2020-03-17 10:13:31'),
(2385, 'LMLS-0001', 'Logged In', '2020-03-17 10:13:40'),
(2386, 'LMLS-0001', 'Logged In', '2020-03-18 10:13:26'),
(2387, '', 'Viewed Receipt For  ', '2020-03-18 10:14:22'),
(2388, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-18 10:14:23'),
(2389, 'LMLS-0001', 'Logged In', '2020-03-18 10:15:44'),
(2390, 'LMLS-0001', 'Added Patient \"Robert Adjei Laryea\"', '2020-03-18 10:16:50'),
(2391, 'LMLS-0001', 'Added Request For Robert Adjei Laryea', '2020-03-18 10:17:10'),
(2392, 'LMLS-0001', 'Made Payment Of GHS200 For Robert  Adjei Laryea\'s Request', '2020-03-18 10:17:50'),
(2393, 'LMLS-0001', 'Updated Request For Robert Adjei Laryea', '2020-03-18 10:18:44'),
(2394, 'LMLS-0001', 'Made Payment Of GHS212.5 For Robert  Adjei Laryea\'s Request', '2020-03-18 10:19:03'),
(2395, 'LMLS-0001', 'Completed Request For Robert Adjei Laryea', '2020-03-18 10:19:24'),
(2396, '', 'Viewed Receipt For  ', '2020-03-18 10:19:31'),
(2397, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-03-18 10:19:31'),
(2398, 'LMLS-0001', 'Added CD4 Count Lab For Agyakwa Ntow Mireku', '2020-03-18 10:20:46'),
(2399, 'LMLS-0001', 'Updated CD4 Count Lab For Agyakwa Ntow Mireku', '2020-03-18 10:21:16'),
(2400, 'LMLS-0001', 'Updated Charge \"Acetylcholine Receptor Antibody\" From GHS 1400.00 To GHS 345.00', '2020-03-18 10:22:24'),
(2401, 'LMLS-0001', 'Tried To Add Staff \"Kofi Amponsah\" But Email Address \"rob@laryea.com\" Was Already Used', '2020-03-18 10:23:51'),
(2402, 'LMLS-0001', 'Tried To Add Staff \"Kofi Amponsah\" But Username \"robert\" Was Already Used', '2020-03-18 10:23:56'),
(2403, 'LMLS-0001', 'Tried To Add Staff \"Kofi Amponsah\" But Username \"robert\" Was Already Used', '2020-03-18 10:24:11'),
(2404, 'LMLS-0001', 'Added Staff \"Kofi Amponsah\"', '2020-03-18 10:24:17'),
(2405, 'LMLS-0001', 'Blocked Staff \"Mercy Ama Last\"', '2020-03-18 10:24:40'),
(2406, 'LMLS-0001', 'Unblocked Staff \"Mercy Ama Last\"', '2020-03-18 10:24:45'),
(2407, '', 'Viewed  Report From 18 March 2020 To 19 March 2020', '2020-03-18 10:25:37'),
(2408, 'LMLS-0001', 'Viewed Aspirate C/S Report From 01 March 2020 To 01 April 2020', '2020-03-18 10:25:37'),
(2409, 'LMLS-0001', 'Viewed Aspirate C/S Report From 01 March 2020 To 01 April 2020', '2020-03-18 10:25:43'),
(2410, 'LMLS-0001', 'Viewed Aspirate C/S Report From 01 March 2020 To 01 April 2020', '2020-03-18 10:25:46'),
(2411, 'LMLS-0001', 'Viewed Aspirate C/S Report From 01 March 2020 To 01 April 2020', '2020-03-18 10:25:52'),
(2412, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-18 10:27:14'),
(2413, 'LMLS-0001', 'Added BUE Creatinine Lab For Agyakwa Ntow Mireku', '2020-03-18 10:28:51'),
(2414, '', 'Logged Out', '2020-03-18 10:55:29'),
(2415, 'LMLS-0001', 'Logged Out', '2020-03-18 10:55:29'),
(2416, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-03-18 10:57:30'),
(2417, 'LMLS-0001', 'Logged In', '2020-03-18 10:57:34'),
(2418, '', 'Logged Out', '2020-03-18 12:37:42'),
(2419, 'LMLS-0001', 'Logged Out', '2020-03-18 12:37:42'),
(2420, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-03-18 16:59:57'),
(2421, 'LMLS-0001', 'Logged In', '2020-03-18 17:00:01'),
(2422, 'LMLS-0001', 'Logged Out', '2020-03-18 17:02:16'),
(2423, 'LMLS-0000', 'Logged In', '2020-03-18 20:50:17'),
(2424, 'LMLS-0000', 'Logged Out', '2020-03-18 20:53:26'),
(2425, 'LMLS-0001', 'Logged In', '2020-03-18 21:02:33'),
(2426, 'LMLS-0001', 'Logged In', '2020-03-18 21:06:32'),
(2427, 'LMLS-0001', 'Logged In', '2020-03-18 21:09:33'),
(2428, 'LMLS-0001', 'Logged In', '2020-03-19 06:23:09'),
(2429, 'LMLS-0001', 'Updated His Profile', '2020-03-19 06:24:04'),
(2430, 'LMLS-0001', 'Updated His Profile', '2020-03-19 06:24:40'),
(2431, 'LMLS-0001', 'Updated His Profile', '2020-03-19 06:24:54'),
(2432, 'LMLS-0001', 'Updated His Profile', '2020-03-19 06:27:00'),
(2433, 'LMLS-0001', 'Updated His Profile', '2020-03-19 06:27:13'),
(2434, 'LMLS-0001', 'Updated His Profile', '2020-03-19 06:28:30'),
(2435, 'LMLS-0001', 'Logged In', '2020-03-19 09:05:42'),
(2436, 'LMLS-0001', 'Updated His Profile', '2020-03-19 09:06:12'),
(2437, 'LMLS-0001', 'Logged In', '2020-03-19 09:44:30'),
(2438, 'LMLS-0001', 'Logged In', '2020-03-19 09:47:10'),
(2439, '', 'Logged Out', '2020-03-19 10:00:36'),
(2440, 'LMLS-0001', 'Logged Out', '2020-03-19 10:00:36'),
(2441, 'LMLS-0001', 'Logged In', '2020-03-19 10:00:56'),
(2442, '', 'Viewed  Report From 19 March 2020 To 20 March 2020', '2020-03-19 10:02:11'),
(2443, 'LMLS-0001', 'Viewed Antenatal Screening Report From 01 March 2020 To 01 April 2020', '2020-03-19 10:02:12'),
(2444, '', 'Viewed Receipt For  ', '2020-03-19 11:35:22'),
(2445, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-19 11:35:22'),
(2446, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-19 11:41:42'),
(2447, 'LMLS-0001', 'Logged In', '2020-03-19 11:47:30'),
(2448, '', 'Viewed Receipt For  ', '2020-03-19 11:47:39'),
(2449, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-03-19 11:47:39'),
(2450, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-03-19 11:48:41'),
(2451, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-19 11:50:07'),
(2452, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-03-19 11:54:21'),
(2453, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-19 11:55:09'),
(2454, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-03-19 11:55:25'),
(2455, 'LMLS-0001', 'Logged Out', '2020-03-19 11:59:51'),
(2456, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-19 12:02:35'),
(2457, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-19 12:03:24'),
(2458, 'LMLS-0001', 'Logged In', '2020-03-19 12:35:54'),
(2459, 'LMLS-0001', 'Logged Out', '2020-03-19 12:36:38'),
(2460, 'LMLS-0001', 'Logged In', '2020-03-19 12:36:44'),
(2461, 'LMLS-0001', 'Updated His Profile', '2020-03-19 12:37:00'),
(2462, 'LMLS-0001', 'Logged Out', '2020-03-19 12:37:12'),
(2463, 'LMLS-0001', 'Logged In', '2020-03-19 12:55:20'),
(2464, 'LMLS-0001', 'Logged In', '2020-03-19 12:57:25'),
(2465, 'LMLS-0000', 'Logged In', '2020-03-19 13:05:37'),
(2466, '', 'Logged Out', '2020-03-19 13:11:29'),
(2467, 'LMLS-0000', 'Logged Out', '2020-03-19 13:11:29'),
(2468, 'LMLS-0000', 'Logged In', '2020-03-19 13:12:39'),
(2469, 'LMLS-0001', 'Added Request For Maria Nortey', '2020-03-19 13:13:24'),
(2470, 'LMLS-0001', 'Made Payment Of GHS100 For Maria  Nortey\'s Request', '2020-03-19 13:13:40'),
(2471, 'LMLS-0000', 'Made Payment Of GHS200 For Derek  Asomaning\'s Request', '2020-03-19 13:15:35'),
(2472, 'LMLS-0000', 'Made Payment Of GHS7 For Derek  Asomaning\'s Request', '2020-03-19 13:16:04'),
(2473, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 13:19:06'),
(2474, 'LMLS-0000', 'Added Request For Derek Asomaning', '2020-03-19 13:21:35'),
(2475, 'LMLS-0000', 'Added Request For Derek Asomaning', '2020-03-19 13:23:47'),
(2476, 'LMLS-0000', 'Added Request For Derek Asomaning', '2020-03-19 13:27:40'),
(2477, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 13:29:52'),
(2478, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 13:38:00'),
(2479, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 13:40:02'),
(2480, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 13:40:08'),
(2481, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 13:43:55'),
(2482, 'LMLS-0001', 'Updated Request For Maria Nortey', '2020-03-19 13:44:15'),
(2483, 'LMLS-0000', 'Logged In', '2020-03-19 13:57:42'),
(2484, 'LMLS-0001', 'Logged In', '2020-03-19 13:58:41'),
(2485, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 14:01:51'),
(2486, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 14:01:57'),
(2487, 'LMLS-0001', 'Updated Request For Maria Nortey', '2020-03-19 14:03:11'),
(2488, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 14:03:45'),
(2489, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 14:03:55'),
(2490, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 14:08:05'),
(2491, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 14:08:13'),
(2492, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 14:11:22'),
(2493, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 14:12:31'),
(2494, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 14:12:42'),
(2495, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 14:13:45'),
(2496, 'LMLS-0000', 'Updated Request For Derek Asomaning', '2020-03-19 14:14:48'),
(2497, '', 'Logged Out', '2020-03-19 14:23:15'),
(2498, 'LMLS-0001', 'Logged Out', '2020-03-19 14:23:15'),
(2499, '', 'Logged Out', '2020-03-19 14:23:23'),
(2500, 'LMLS-0000', 'Logged Out', '2020-03-19 14:23:23'),
(2501, 'LMLS-0001', 'Logged In', '2020-03-19 14:25:40'),
(2502, 'LMLS-0001', 'Logged In', '2020-03-19 14:33:26'),
(2503, 'LMLS-0001', 'Logged Out', '2020-03-19 14:36:53'),
(2504, '', 'Logged Out', '2020-03-19 14:40:00'),
(2505, 'LMLS-0001', 'Logged Out', '2020-03-19 14:40:00'),
(2506, 'LMLS-0000', 'Logged In', '2020-03-22 22:54:14'),
(2507, '', 'Viewed  Report From 22 March 2020 To 23 March 2020', '2020-03-22 22:54:45'),
(2508, 'LMLS-0000', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 01 April 2020', '2020-03-22 22:54:45'),
(2509, 'LMLS-0000', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 01 April 2020', '2020-03-22 23:14:44'),
(2510, 'LMLS-0000', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 01 April 2020', '2020-03-22 23:20:46'),
(2511, 'LMLS-0000', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 01 April 2020', '2020-03-22 23:27:13'),
(2512, '', 'Viewed  Report From 23 March 2020 To 24 March 2020', '2020-03-23 08:44:55'),
(2513, 'LMLS-0000', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 01 April 2020', '2020-03-23 08:44:55'),
(2514, 'LMLS-0000', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 01 April 2020', '2020-03-23 08:44:56'),
(2515, 'LMLS-0000', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 01 April 2020', '2020-03-23 08:45:05'),
(2516, 'LMLS-0000', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 01 April 2020', '2020-03-23 08:45:26'),
(2517, 'LMLS-0000', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 01 April 2020', '2020-03-23 08:46:45'),
(2518, '', 'Logged Out', '2020-03-23 08:47:23'),
(2519, 'LMLS-0000', 'Logged Out', '2020-03-23 08:47:23'),
(2520, 'LMLS-0000', 'Logged In', '2020-03-23 08:47:25'),
(2521, 'LMLS-0000', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 01 April 2020', '2020-03-23 08:47:39'),
(2522, 'LMLS-0000', 'Logged Out', '2020-03-23 08:49:16'),
(2523, 'LMLS-0000', 'Logged In', '2020-03-23 08:49:19'),
(2524, 'LMLS-0000', 'Logged Out', '2020-03-23 08:50:07'),
(2525, 'LMLS-0000', 'Logged In', '2020-03-23 08:50:08'),
(2526, 'LMLS-0000', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 01 April 2020', '2020-03-23 08:50:29'),
(2527, '', 'Logged Out', '2020-03-23 10:39:34'),
(2528, 'LMLS-0000', 'Logged Out', '2020-03-23 10:39:34'),
(2529, 'LMLS-0001', 'Logged In', '2020-03-26 15:41:21'),
(2530, '', 'Viewed  Report From 26 March 2020 To 27 March 2020', '2020-03-26 15:41:38'),
(2531, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 15:41:38'),
(2532, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 15:43:42'),
(2533, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 15:45:42'),
(2534, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 15:47:34'),
(2535, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 02 March 2020', '2020-03-26 15:53:06'),
(2536, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 15:53:14'),
(2537, '', 'Viewed  Report From 26 March 2020 To 27 March 2020', '2020-03-26 16:02:40'),
(2538, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:02:40'),
(2539, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:05:34'),
(2540, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:06:46'),
(2541, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:08:39'),
(2542, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:12:00'),
(2543, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:16:03'),
(2544, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:18:31'),
(2545, '', 'Viewed  Report From 26 March 2020 To 27 March 2020', '2020-03-26 16:20:34'),
(2546, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:20:34'),
(2547, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:21:51'),
(2548, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:23:02'),
(2549, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:24:06'),
(2550, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:25:18'),
(2551, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:26:20'),
(2552, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:27:31'),
(2553, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:28:16'),
(2554, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:29:17'),
(2555, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-26 16:31:42'),
(2556, '', 'Viewed Receipt For  ', '2020-03-26 16:32:23'),
(2557, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-26 16:32:23'),
(2558, '', 'Logged Out', '2020-03-26 16:37:17'),
(2559, 'LMLS-0001', 'Logged Out', '2020-03-26 16:37:17'),
(2560, 'LMLS-0001', 'Logged In', '2020-03-28 03:33:03'),
(2561, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 03:33:19'),
(2562, 'LMLS-0001', 'Logged In', '2020-03-28 03:37:46'),
(2563, '', 'Viewed  Report From 28 March 2020 To 29 March 2020', '2020-03-28 03:39:12'),
(2564, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 03:39:12'),
(2565, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 03:40:25'),
(2566, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 03:41:51'),
(2567, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 03:43:29'),
(2568, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 03:47:00'),
(2569, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 03:48:06'),
(2570, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 15:26:19'),
(2571, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 15:27:35'),
(2572, '', 'Viewed  Report From 28 March 2020 To 29 March 2020', '2020-03-28 15:32:16'),
(2573, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 15:32:16'),
(2574, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 15:33:08'),
(2575, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 15:34:55'),
(2576, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 15:38:01'),
(2577, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 15:40:20'),
(2578, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 15:41:02'),
(2579, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 15:41:48'),
(2580, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 15:43:32'),
(2581, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 15:48:26'),
(2582, '', 'Viewed  Report From 28 March 2020 To 29 March 2020', '2020-03-28 19:34:29'),
(2583, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 19:34:29'),
(2584, 'LMLS-0001', 'Logged In', '2020-03-28 19:35:05'),
(2585, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 19:35:18'),
(2586, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 19:42:16'),
(2587, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 19:43:44'),
(2588, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 19:44:44'),
(2589, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 19:45:40'),
(2590, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 19:47:46'),
(2591, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 19:49:17'),
(2592, '', 'Viewed  Report From 28 March 2020 To 29 March 2020', '2020-03-28 19:56:40'),
(2593, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 19:56:40');
INSERT INTO `audit_trail` (`id`, `staff_id`, `activity`, `date`) VALUES
(2594, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 20:01:47'),
(2595, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 20:06:57'),
(2596, 'LMLS-0001', 'Logged In', '2020-03-28 21:03:24'),
(2597, '', 'Viewed  Report From 28 March 2020 To 29 March 2020', '2020-03-28 21:12:24'),
(2598, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 21:12:24'),
(2599, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 21:19:10'),
(2600, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 21:23:17'),
(2601, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 21:24:51'),
(2602, '', 'Viewed Receipt For  ', '2020-03-28 21:26:59'),
(2603, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 21:26:59'),
(2604, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 21:28:11'),
(2605, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 21:28:52'),
(2606, '', 'Viewed  Report From 28 March 2020 To 29 March 2020', '2020-03-28 21:34:33'),
(2607, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 21:34:33'),
(2608, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 21:37:52'),
(2609, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 21:41:51'),
(2610, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 21:50:12'),
(2611, '', 'Viewed  Report From 28 March 2020 To 29 March 2020', '2020-03-28 21:52:16'),
(2612, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 21:52:16'),
(2613, '', 'Logged Out', '2020-03-28 21:55:19'),
(2614, 'LMLS-0001', 'Logged Out', '2020-03-28 21:55:19'),
(2615, 'LMLS-0001', 'Logged In', '2020-03-28 22:24:16'),
(2616, '', 'Viewed  Report From 28 March 2020 To 29 March 2020', '2020-03-28 22:24:27'),
(2617, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 22:24:27'),
(2618, '', 'Viewed Receipt For  ', '2020-03-28 22:24:39'),
(2619, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 22:24:39'),
(2620, '', 'Viewed Receipt For  ', '2020-03-28 22:53:59'),
(2621, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 22:53:59'),
(2622, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:04:18'),
(2623, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:06:18'),
(2624, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:06:59'),
(2625, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:07:38'),
(2626, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:08:14'),
(2627, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:08:46'),
(2628, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:09:33'),
(2629, '', 'Logged Out', '2020-03-28 23:12:52'),
(2630, 'LMLS-0001', 'Logged Out', '2020-03-28 23:12:52'),
(2631, 'LMLS-0001', 'Logged In', '2020-03-28 23:14:01'),
(2632, '', 'Viewed  Report From 29 March 2020 To 30 March 2020', '2020-03-28 23:14:16'),
(2633, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 23:14:16'),
(2634, '', 'Viewed Receipt For  ', '2020-03-28 23:14:49'),
(2635, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:14:49'),
(2636, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:16:26'),
(2637, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:17:53'),
(2638, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:22:58'),
(2639, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:24:12'),
(2640, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:26:30'),
(2641, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:27:23'),
(2642, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:29:26'),
(2643, '', 'Viewed Receipt For  ', '2020-03-28 23:32:46'),
(2644, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:32:46'),
(2645, '', 'Viewed  Report From 29 March 2020 To 30 March 2020', '2020-03-28 23:33:11'),
(2646, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 23:33:11'),
(2647, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 23:34:36'),
(2648, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 23:39:02'),
(2649, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 23:41:04'),
(2650, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 23:43:40'),
(2651, '', 'Viewed  Report From 29 March 2020 To 30 March 2020', '2020-03-28 23:50:20'),
(2652, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 23:50:20'),
(2653, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 23:51:36'),
(2654, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 23:55:13'),
(2655, '', 'Viewed Receipt For  ', '2020-03-28 23:55:27'),
(2656, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:55:27'),
(2657, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-28 23:57:03'),
(2658, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-28 23:59:25'),
(2659, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 00:01:11'),
(2660, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 30 March 2020', '2020-03-29 00:02:17'),
(2661, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 00:03:52'),
(2662, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 00:04:41'),
(2663, '', 'Viewed  Report From 29 March 2020 To 30 March 2020', '2020-03-29 00:07:37'),
(2664, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 00:07:37'),
(2665, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 00:10:31'),
(2666, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 00:11:43'),
(2667, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 00:12:41'),
(2668, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 00:13:42'),
(2669, '', 'Viewed Receipt For  ', '2020-03-29 00:14:02'),
(2670, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-29 00:14:02'),
(2671, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-29 00:26:25'),
(2672, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-29 00:27:04'),
(2673, '', 'Viewed  Report From 29 March 2020 To 30 March 2020', '2020-03-29 00:27:29'),
(2674, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 00:27:30'),
(2675, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 00:30:41'),
(2676, '', 'Viewed Receipt For  ', '2020-03-29 00:30:53'),
(2677, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-29 00:30:53'),
(2678, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-29 00:33:28'),
(2679, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 00:33:50'),
(2680, 'LMLS-0001', 'Logged In', '2020-03-29 01:39:08'),
(2681, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-29 01:39:16'),
(2682, 'LMLS-0001', 'Logged In', '2020-03-29 01:55:36'),
(2683, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-29 01:55:43'),
(2684, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 01:56:35'),
(2685, 'LMLS-0001', 'Logged Out', '2020-03-29 01:56:54'),
(2686, '', 'Logged Out', '2020-03-29 01:59:53'),
(2687, 'LMLS-0001', 'Logged Out', '2020-03-29 01:59:53'),
(2688, 'LMLS-0001', 'Logged In', '2020-03-29 11:39:35'),
(2689, '', 'Viewed Receipt For  ', '2020-03-29 11:40:05'),
(2690, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-29 11:40:05'),
(2691, '', 'Viewed  Report From 29 March 2020 To 30 March 2020', '2020-03-29 11:43:04'),
(2692, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 11:43:04'),
(2693, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 11:46:22'),
(2694, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-29 11:48:19'),
(2695, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-29 11:49:40'),
(2696, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 02 March 2020', '2020-03-29 11:53:44'),
(2697, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 11:53:51'),
(2698, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 11:56:41'),
(2699, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 11:58:03'),
(2700, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 11:58:54'),
(2701, '', 'Logged Out', '2020-03-29 14:08:28'),
(2702, 'LMLS-0001', 'Logged Out', '2020-03-29 14:08:28'),
(2703, 'LMLS-0001', 'Logged In', '2020-03-29 14:25:40'),
(2704, '', 'Viewed  Report From 29 March 2020 To 30 March 2020', '2020-03-29 14:25:52'),
(2705, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 08 March 2020 To 01 April 2020', '2020-03-29 14:25:52'),
(2706, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 14:25:58'),
(2707, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 09 March 2020', '2020-03-29 14:27:32'),
(2708, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 14:28:55'),
(2709, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 09 March 2020', '2020-03-29 14:30:49'),
(2710, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 14:30:59'),
(2711, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 14:39:05'),
(2712, 'LMLS-0001', 'Viewed BUE Creatinine + eGFR Report From 01 March 2020 To 01 April 2020', '2020-03-29 14:39:52'),
(2713, 'LMLS-0001', 'Viewed FBC 5P Report From 01 March 2020 To 01 April 2020', '2020-03-29 14:40:07'),
(2714, '', 'Viewed  Report From 29 March 2020 To 30 March 2020', '2020-03-29 14:43:18'),
(2715, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 14:43:18'),
(2716, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 14:45:54'),
(2717, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 14:47:14'),
(2718, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 15:02:25'),
(2719, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 15:03:48'),
(2720, 'LMLS-0001', 'Viewed Antenatal Screening Report From 01 March 2020 To 01 April 2020', '2020-03-29 15:06:14'),
(2721, 'LMLS-0001', 'Viewed BUE + LFT Report From 01 March 2020 To 01 April 2020', '2020-03-29 15:07:01'),
(2722, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 15:07:51'),
(2723, '', 'Viewed Receipt For  ', '2020-03-29 15:08:44'),
(2724, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-03-29 15:08:44'),
(2725, 'LMLS-0001', 'Viewed Receipt For Michelle Ntow Adjei Laryea', '2020-03-29 15:12:39'),
(2726, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-29 15:13:18'),
(2727, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-03-29 15:16:14'),
(2728, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-03-29 15:16:31'),
(2729, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-03-29 15:19:24'),
(2730, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-03-29 15:23:01'),
(2731, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-03-29 15:24:15'),
(2732, '', 'Viewed  Report From 29 March 2020 To 30 March 2020', '2020-03-29 15:26:39'),
(2733, 'LMLS-0001', 'Viewed FBC 3P Report From 01 March 2020 To 01 April 2020', '2020-03-29 15:26:39'),
(2734, 'LMLS-0001', 'Viewed FBC 5P Report From 01 March 2020 To 01 April 2020', '2020-03-29 15:26:46'),
(2735, 'LMLS-0001', 'Logged In', '2020-03-29 15:35:21'),
(2736, '', 'Viewed  Report From 29 March 2020 To 30 March 2020', '2020-03-29 15:35:38'),
(2737, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 15:35:38'),
(2738, '', 'Viewed Receipt For  ', '2020-03-29 15:36:14'),
(2739, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-03-29 15:36:14'),
(2740, '', 'Logged Out', '2020-03-29 15:37:12'),
(2741, 'LMLS-0001', 'Logged Out', '2020-03-29 15:37:12'),
(2742, '', 'Viewed Receipt For  ', '2020-03-29 15:38:03'),
(2743, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-03-29 15:38:03'),
(2744, 'LMLS-0001', 'Logged In', '2020-03-29 15:56:15'),
(2745, '', 'Viewed  Report From 29 March 2020 To 30 March 2020', '2020-03-29 15:56:27'),
(2746, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 March 2020 To 01 April 2020', '2020-03-29 15:56:27'),
(2747, '', 'Viewed Receipt For  ', '2020-03-29 15:57:16'),
(2748, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-03-29 15:57:16'),
(2749, '', 'Logged Out', '2020-03-29 15:58:12'),
(2750, 'LMLS-0001', 'Logged Out', '2020-03-29 15:58:12'),
(2751, 'LMLS-0001', 'Logged In', '2020-05-19 19:05:07'),
(2752, '', 'Viewed Receipt For  ', '2020-05-19 19:05:35'),
(2753, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-19 19:05:35'),
(2754, 'LMLS-0001', 'Added Patient \"Trial Ntow Adjei Laryea\"', '2020-05-19 19:16:23'),
(2755, '', 'Logged Out', '2020-05-19 19:28:13'),
(2756, 'LMLS-0001', 'Logged Out', '2020-05-19 19:28:14'),
(2757, 'LMLS-0001', 'Logged In', '2020-05-19 19:28:16'),
(2758, 'LMLS-0001', 'Logged In', '2020-05-19 19:34:02'),
(2759, 'LMLS-0001', 'Logged Out', '2020-05-19 19:34:04'),
(2760, 'LMLS-0001', 'Logged In', '2020-05-19 19:35:18'),
(2761, 'LMLS-0001', 'Logged Out', '2020-05-19 19:35:21'),
(2762, 'LMLS-0001', 'Logged In', '2020-05-19 19:35:25'),
(2763, 'LMLS-0001', 'Logged In', '2020-05-19 19:37:32'),
(2764, 'LMLS-0001', 'Logged Out', '2020-05-19 19:37:41'),
(2765, 'LMLS-0001', 'Logged In', '2020-05-19 19:37:44'),
(2766, 'LMLS-0001', 'Logged In', '2020-05-19 19:40:43'),
(2767, 'LMLS-0001', 'Logged Out', '2020-05-19 19:40:48'),
(2769, '', 'Logged Out', '2020-05-19 19:54:22'),
(2770, 'LMLS-0001', 'Logged Out', '2020-05-19 19:54:22'),
(2771, 'LMLS-0001', 'Logged In', '2020-05-19 19:57:34'),
(2772, 'LMLS-0001', 'Logged Out', '2020-05-19 19:58:02'),
(2773, 'LMLS-0001', 'Logged In', '2020-05-21 10:32:25'),
(2774, 'LMLS-0001', 'Logged In', '2020-05-21 13:56:28'),
(2775, '', 'Logged Out', '2020-05-21 13:56:32'),
(2776, 'LMLS-0001', 'Logged Out', '2020-05-21 13:56:32'),
(2777, 'LMLS-0001', 'Logged In', '2020-05-27 12:24:03'),
(2778, '', 'Viewed  Report From 27 May 2020 To 28 May 2020', '2020-05-27 12:25:19'),
(2779, 'LMLS-0001', 'Viewed Antenatal Screening Report From 01 May 2020 To 01 June 2020', '2020-05-27 12:25:19'),
(2780, 'LMLS-0001', 'Viewed Antenatal Screening Report From 01 January 2020 To 01 June 2020', '2020-05-27 12:25:29'),
(2781, '', 'Logged Out', '2020-05-27 12:42:11'),
(2782, 'LMLS-0001', 'Logged Out', '2020-05-27 12:42:11'),
(2783, 'LMLS-KB-0001', 'Logged In', '2020-05-27 12:42:17'),
(2784, 'LMLS-KB-0001', 'Added Patient \"Robert Ntow Adjei Laryea\"', '2020-05-27 12:43:01'),
(2785, 'LMLS-KB-0001', 'Added Request For Robert Adjei Laryea', '2020-05-27 12:44:02'),
(2786, 'LMLS-KB-0001', 'Made Payment Of GHS108 For Robert  Adjei Laryea\'s Request', '2020-05-27 12:44:48'),
(2787, 'LMLS-KB-0001', 'Tried To Add Patient \"Trial Ntow Adjei-laryea\" But Email Address \"trial@admin.com\" Was Already Used', '2020-05-27 12:45:19'),
(2788, 'LMLS-KB-0001', 'Tried To Add Patient \"Trial Ntow Adjei-laryea\" But Email Address \"trial@admin.comm\" Was Already Used', '2020-05-27 12:45:24'),
(2789, 'LMLS-KB-0001', 'Tried To Add Patient \"Trial Ntow Adjei-laryea\" But Email Address \"trial@admin.comm\" Was Already Used', '2020-05-27 12:45:32'),
(2790, 'LMLS-KB-0001', 'Added Patient \"Trial Ntow Adjei-laryea\"', '2020-05-27 12:45:37'),
(2791, 'LMLS-KB-0001', 'Added Request For Trial Ntow Adjei-laryea', '2020-05-27 12:45:57'),
(2792, 'LMLS-KB-0001', 'Made Payment Of GHS200 For Trial Ntow Adjei-laryea\'s Request', '2020-05-27 12:46:16'),
(2793, 'LMLS-KB-0001', 'Made Payment Of GHS70 For Trial Ntow Adjei-laryea\'s Request', '2020-05-27 12:47:36'),
(2794, 'LMLS-KB-0001', 'Completed Request For Trial Ntow Adjei-laryea', '2020-05-27 12:48:03'),
(2795, '', 'Viewed Receipt For  ', '2020-05-27 12:48:14'),
(2796, 'LMLS-KB-0001', 'Viewed Receipt For Trial Ntow Adjei-laryea', '2020-05-27 12:48:14'),
(2797, 'LMLS-KB-0001', 'Added Antenatal Screening Lab For Robert  Adjei Laryea', '2020-05-27 12:50:01'),
(2798, 'LMLS-KB-0001', 'Viewed Receipt For Trial Ntow Adjei-laryea', '2020-05-27 12:58:13'),
(2799, 'LMLS-KB-0001', 'Added Patient \"Agyakwa Mireku\"', '2020-05-27 13:41:17'),
(2800, 'LMLS-KB-0001', 'Added Patient \"Michelle Admin\"', '2020-05-27 13:47:48'),
(2801, 'LMLS-KB-0001', 'Added Request For Michelle Admin', '2020-05-27 13:49:18'),
(2802, 'LMLS-KB-0001', 'Made Payment Of GHS130 For Michelle  Admin\'s Request', '2020-05-27 13:49:37'),
(2803, '', 'Viewed  Report From 27 May 2020 To 28 May 2020', '2020-05-27 19:43:41'),
(2804, 'LMLS-KB-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 28 May 2020', '2020-05-27 19:43:41'),
(2805, 'LMLS-KB-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 28 May 2020', '2020-05-27 19:44:02'),
(2806, '', 'Logged Out', '2020-05-27 19:45:56'),
(2807, 'LMLS-KB-0001', 'Logged Out', '2020-05-27 19:45:56'),
(2808, 'LMLS-0001', 'Logged In', '2020-05-27 19:45:59'),
(2809, 'LMLS-0001', 'Viewed Alpha Feto Protein Report From 01 January 2020 To 28 May 2020', '2020-05-27 19:46:31'),
(2810, '', 'Viewed Receipt For  ', '2020-05-27 19:49:09'),
(2811, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-05-27 19:49:09'),
(2812, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-05-27 19:49:25'),
(2813, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-05-27 19:50:06'),
(2814, 'LMLS-0001', 'Completed Request For Maria Nortey', '2020-05-27 20:46:26'),
(2815, 'LMLS-0001', 'Made Payment Of GHS100 For Maria  Nortey\'s Request', '2020-05-27 21:07:10'),
(2816, '', 'Viewed Receipt For  ', '2020-05-27 21:18:44'),
(2817, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-05-27 21:18:44'),
(2818, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-05-27 21:21:04'),
(2819, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-05-27 21:25:29'),
(2820, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-05-27 21:28:43'),
(2821, 'LMLS-0001', 'Made Payment Of GHS40 For Maria  Nortey\'s Request', '2020-05-27 21:29:06'),
(2822, 'LMLS-0001', 'Viewed Receipt For Robert Adjei Laryea', '2020-05-27 21:32:25'),
(2823, 'LMLS-0001', 'Made Payment Of GHS40 For Maria  Nortey\'s Request', '2020-05-27 21:33:32'),
(2824, 'LMLS-0001', 'Made Payment Of GHS4.5 For Maria  Nortey\'s Request', '2020-05-27 21:34:31'),
(2825, 'LMLS-0001', 'Completed Request For Maria Nortey', '2020-05-27 21:34:38'),
(2826, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-27 21:34:40'),
(2827, 'LMLS-0001', 'Made Payment Of GHS100 For Maria  Nortey\'s Request', '2020-05-27 21:37:10'),
(2828, 'LMLS-0001', 'Made Payment Of GHS100 For Maria  Nortey\'s Request', '2020-05-27 21:41:11'),
(2829, 'LMLS-0001', 'Made Payment Of GHS100 For Maria  Nortey\'s Request', '2020-05-27 21:45:51'),
(2830, 'LMLS-0001', 'Made Payment Of GHS40 For Maria  Nortey\'s Request', '2020-05-27 21:46:05'),
(2831, 'LMLS-0001', 'Made Payment Of GHS4.5 For Maria  Nortey\'s Request', '2020-05-27 21:46:17'),
(2832, 'LMLS-0001', 'Completed Request For Maria Nortey', '2020-05-27 21:46:24'),
(2833, '', 'Viewed Receipt For  ', '2020-05-27 21:46:26'),
(2834, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-27 21:46:26'),
(2835, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-27 21:48:08'),
(2836, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-27 21:50:55'),
(2837, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-27 21:54:57'),
(2838, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-27 21:59:53'),
(2839, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-27 22:01:35'),
(2840, '', 'Viewed Receipt For  ', '2020-05-27 22:04:20'),
(2841, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-27 22:04:20'),
(2842, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-27 22:06:50'),
(2843, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-27 22:07:46'),
(2844, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-27 22:08:34'),
(2845, '', 'Logged Out', '2020-05-27 22:22:19'),
(2846, 'LMLS-0001', 'Logged Out', '2020-05-27 22:22:20'),
(2847, 'LMLS-0001', 'Logged In', '2020-05-27 22:24:44'),
(2848, '', 'Viewed Receipt For  ', '2020-05-27 22:24:58'),
(2849, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-27 22:24:58'),
(2850, 'LMLS-0001', 'Tried To Add Patient \"Anot Her Patient\" But Email Address \"\" Was Already Used', '2020-05-27 22:38:36'),
(2851, 'LMLS-0001', 'Tried To Add Patient \"Anot Her Patient\" But Email Address \"\" Was Already Used', '2020-05-27 22:38:42'),
(2852, 'LMLS-0001', 'Added Patient \"Anot Her Patient\"', '2020-05-27 22:40:08'),
(2853, 'LMLS-0001', 'Added Request For Anot Her Patient', '2020-05-27 22:41:01'),
(2854, 'LMLS-0001', 'Added Patient \"Anot Her Patient\"', '2020-05-27 22:46:00'),
(2855, 'LMLS-0001', 'Added Request For Anot Her Patient', '2020-05-27 22:46:16'),
(2856, 'LMLS-0001', 'Made Payment Of GHS100 For Anot Her Patient\'s Request', '2020-05-27 22:49:07'),
(2857, 'LMLS-0001', 'Made Payment Of GHS200 For Anot Her Patient\'s Request', '2020-05-27 22:50:04'),
(2858, 'LMLS-0001', 'Made Payment Of GHS69 For Anot Her Patient\'s Request', '2020-05-27 22:50:18'),
(2859, 'LMLS-0001', 'Completed Request For Anot Her Patient', '2020-05-27 22:50:29'),
(2860, '', 'Viewed Receipt For  ', '2020-05-27 22:50:35'),
(2861, 'LMLS-0001', 'Viewed Receipt For Anot Her Patient', '2020-05-27 22:50:35'),
(2862, 'LMLS-0001', 'Added Patient \"Anot Her Patient\"', '2020-05-27 22:53:09'),
(2863, 'LMLS-0001', 'Added Request For Anot Her Patient', '2020-05-27 22:53:31'),
(2864, 'LMLS-0001', 'Added Patient \"Another Patient\"', '2020-05-27 22:56:03'),
(2865, 'LMLS-0001', 'Added Request For Another Patient', '2020-05-27 22:56:17'),
(2866, 'LMLS-0001', 'Added Patient \"Anot Her Patient\"', '2020-05-27 22:59:15'),
(2867, 'LMLS-0001', 'Added Request For Anot Her Patient', '2020-05-27 22:59:27'),
(2868, 'LMLS-0001', 'Added Patient \"Anot Her Patient\"', '2020-05-27 23:02:43'),
(2869, 'LMLS-0001', 'Added Request For Anot Her Patient', '2020-05-27 23:02:55'),
(2870, 'LMLS-0001', 'Made Payment Of GHS100 For Anot Her Patient\'s Request', '2020-05-27 23:03:13'),
(2871, 'LMLS-0001', 'Made Payment Of GHS70 For Anot Her Patient\'s Request', '2020-05-27 23:03:45'),
(2872, 'LMLS-0001', 'Made Payment Of GHS10 For Anot Her Patient\'s Request', '2020-05-27 23:03:56'),
(2873, 'LMLS-0001', 'Completed Request For Anot Her Patient', '2020-05-27 23:04:04'),
(2874, 'LMLS-0001', 'Viewed Receipt For Anot Her Patient', '2020-05-27 23:04:05'),
(2875, '', 'Logged Out', '2020-05-28 11:35:56'),
(2876, 'LMLS-0001', 'Logged Out', '2020-05-28 11:35:56'),
(2877, 'LMLS-0001', 'Logged In', '2020-05-28 11:37:33'),
(2878, 'LMLS-0001', 'Logged In', '2020-05-28 12:37:37'),
(2879, '', 'Viewed \'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 16:47:51'),
(2880, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 16:48:55'),
(2881, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 16:49:59'),
(2882, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 01 January 2020 To 01 June 2020', '2020-05-28 16:50:49'),
(2883, '', 'Viewed \'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:07:22'),
(2884, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 01 January 2020 To 01 June 2020', '2020-05-28 17:07:22'),
(2885, 'LMLS-0001', 'Viewed Michelle Ntow Adjei Laryea\'s Report From 29 May 2020 To 07 June 2020', '2020-05-28 17:10:39'),
(2886, 'LMLS-0001', 'Viewed Michelle Ntow Adjei Laryea\'s Report From 29 May 2020 To 07 June 2020', '2020-05-28 17:10:41'),
(2887, 'LMLS-0001', 'Viewed Michelle Ntow Adjei Laryea\'s Report From 29 May 2020 To 07 June 2020', '2020-05-28 17:10:48'),
(2888, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 May 2020 To 29 May 2020', '2020-05-28 17:14:45'),
(2889, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 May 2020 To 08 June 2020', '2020-05-28 17:15:37'),
(2890, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 January 2020 To 08 June 2020', '2020-05-28 17:15:47'),
(2891, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 January 2020 To 08 June 2020', '2020-05-28 17:16:15'),
(2892, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 January 2020 To 08 June 2020', '2020-05-28 17:16:16'),
(2893, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 28 May 2020 To 08 June 2020', '2020-05-28 17:17:58'),
(2894, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 January 2020 To 08 June 2020', '2020-05-28 17:18:06'),
(2895, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 January 2020 To 08 June 2020', '2020-05-28 17:18:08'),
(2896, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 January 2020 To 08 June 2020', '2020-05-28 17:18:10'),
(2897, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:21:33'),
(2898, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 January 2020 To 29 May 2020', '2020-05-28 17:22:10'),
(2899, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 January 2020 To 29 May 2020', '2020-05-28 17:22:11'),
(2900, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 28 May 2020 To 08 June 2020', '2020-05-28 17:22:53'),
(2901, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 January 2020 To 08 June 2020', '2020-05-28 17:23:03'),
(2902, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 01 January 2020 To 08 June 2020', '2020-05-28 17:23:34'),
(2903, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 January 2020 To 08 June 2020', '2020-05-28 17:23:42'),
(2904, '', 'Viewed \'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:29:10'),
(2905, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:29:10'),
(2906, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 January 2020 To 29 May 2020', '2020-05-28 17:29:18'),
(2907, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 01 January 2020 To 29 May 2020', '2020-05-28 17:29:25'),
(2908, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 01 January 2020 To 29 May 2020', '2020-05-28 17:29:36'),
(2909, 'LMLS-0001', 'Viewed Maria Nortey\'s Report From 01 January 2020 To 29 May 2020', '2020-05-28 17:29:43'),
(2910, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:30:59'),
(2911, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:31:46'),
(2912, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:32:27'),
(2913, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:32:34'),
(2914, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 07 June 2020 To 29 May 2020', '2020-05-28 17:32:42'),
(2915, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 01 January 2020 To 29 May 2020', '2020-05-28 17:32:52'),
(2916, '', 'Viewed \'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:49:32'),
(2917, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:49:32'),
(2918, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:50:03'),
(2919, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:53:08'),
(2920, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 January 2020', '2020-05-28 17:54:04'),
(2921, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:54:15'),
(2922, '', 'Viewed Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:56:57'),
(2923, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 29 May 2020', '2020-05-28 17:56:57'),
(2924, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:57:53'),
(2925, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:58:18'),
(2926, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:58:19'),
(2927, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 17:58:26'),
(2928, 'LMLS-0001', 'Viewed Report From 01 May 2020 To 29 May 2020', '2020-05-28 18:02:06'),
(2929, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 18:03:23'),
(2930, 'LMLS-0001', 'Viewed Report From 01 May 2020 To 29 May 2020', '2020-05-28 18:03:37'),
(2931, 'LMLS-0001', 'Viewed Report From 01 May 2020 To 29 May 2020', '2020-05-28 18:03:54'),
(2932, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 01 February 2020 To 29 May 2020', '2020-05-28 18:04:17'),
(2933, '', 'Viewed \'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 18:06:41'),
(2934, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 28 May 2020 To 29 May 2020', '2020-05-28 18:06:41'),
(2935, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 01 January 2020 To 29 May 2020', '2020-05-28 18:06:53'),
(2936, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 01 January 2020 To 29 May 2020', '2020-05-28 18:06:54'),
(2937, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 01 January 2020 To 29 May 2020', '2020-05-28 18:07:02'),
(2938, 'LMLS-0001', 'Viewed Report From 01 May 2020 To 29 May 2020', '2020-05-28 18:07:20'),
(2939, 'LMLS-0001', 'Viewed Report From 01 May 2020 To 29 May 2020', '2020-05-28 18:07:25'),
(2940, '', 'Logged Out', '2020-05-28 23:09:29'),
(2941, 'LMLS-0001', 'Logged Out', '2020-05-28 23:09:29'),
(2942, 'LMLS-0001', 'Logged In', '2020-05-28 23:10:44'),
(2943, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:14:13'),
(2944, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:14:13'),
(2945, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:14:26'),
(2946, 'LMLS-0001', 'Viewed Michelle Ntow Adjei Laryea\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:14:30'),
(2947, '', 'Viewed Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:14:45'),
(2948, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 30 May 2020', '2020-05-28 23:14:45'),
(2949, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:16:10'),
(2950, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:17:57'),
(2951, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:17:58'),
(2952, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:17:59'),
(2953, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:18:00'),
(2954, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:19:45'),
(2955, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:19:47'),
(2956, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:19:48'),
(2957, 'LMLS-0001', 'Viewed Robert Adjei Laryea\'s Report From 01 May 2020 To 30 May 2020', '2020-05-28 23:19:57'),
(2958, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 01 May 2020 To 30 May 2020', '2020-05-28 23:20:01'),
(2959, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 01 May 2020 To 30 May 2020', '2020-05-28 23:20:07'),
(2960, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 01 January 2020 To 30 May 2020', '2020-05-28 23:20:15'),
(2961, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:21:02'),
(2962, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:21:13'),
(2963, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:22:23'),
(2964, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:22:34'),
(2965, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:25:50'),
(2966, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:32:09'),
(2967, 'LMLS-0001', 'Viewed  \'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:32:09'),
(2968, 'LMLS-0001', 'Viewed  \'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:32:20'),
(2969, '', 'Logged Out', '2020-05-28 23:34:55'),
(2970, 'LMLS-0001', 'Logged Out', '2020-05-28 23:34:55'),
(2971, 'LMLS-0001', 'Logged In', '2020-05-28 23:35:04'),
(2972, 'LMLS-0001', 'Updated Staff \"Mercy Ama Last\"', '2020-05-28 23:36:24'),
(2973, '', 'Viewed Receipt For  ', '2020-05-28 23:37:59'),
(2974, 'LMLS-0001', 'Viewed Receipt For Anot Her Patient', '2020-05-28 23:37:59'),
(2975, 'LMLS-0001', 'Updated His Profile', '2020-05-28 23:38:36'),
(2976, 'LMLS-0001', 'Updated His Profile', '2020-05-28 23:40:43'),
(2977, 'LMLS-0001', 'Logged Out', '2020-05-28 23:41:01'),
(2978, 'LMLS-0001', 'Logged In', '2020-05-28 23:41:03'),
(2979, 'LMLS-0001', 'Logged Out', '2020-05-28 23:41:58'),
(2980, 'LMLS-0001', 'Logged In', '2020-05-28 23:42:00'),
(2981, 'LMLS-0001', 'Updated His Profile', '2020-05-28 23:42:16'),
(2982, 'LMLS-0001', 'Updated His Profile', '2020-05-28 23:43:25'),
(2983, 'LMLS-0001', 'Updated His Profile', '2020-05-28 23:46:40'),
(2984, 'LMLS-0001', 'Updated His Profile', '2020-05-28 23:47:17'),
(2985, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:50:46'),
(2986, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-28 23:50:46'),
(2987, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 12:30:20'),
(2988, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 12:30:20'),
(2989, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 12:42:05'),
(2990, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 12:45:13'),
(2991, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 12:45:22'),
(2992, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 12:47:37'),
(2993, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 12:47:37'),
(2994, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 12:55:39'),
(2995, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 12:55:47'),
(2996, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 12:57:26'),
(2997, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 12:58:52'),
(2998, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:01:26'),
(2999, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:02:16'),
(3000, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:04:18'),
(3001, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:04:18'),
(3002, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:07:08'),
(3003, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:14:43'),
(3004, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:15:57'),
(3005, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:16:34'),
(3006, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:17:34'),
(3007, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:19:28'),
(3008, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:20:46'),
(3009, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:21:59'),
(3010, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:26:16'),
(3011, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:27:29'),
(3012, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:27:29'),
(3013, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:31:01'),
(3014, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:38:22'),
(3015, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:39:11'),
(3016, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:42:42'),
(3017, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:49:36'),
(3018, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:50:39'),
(3019, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 13:50:39'),
(3020, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:14:58'),
(3021, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:14:58'),
(3022, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:18:06'),
(3023, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:18:48'),
(3024, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:20:03'),
(3025, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:22:08'),
(3026, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:23:01'),
(3027, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:23:59'),
(3028, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:29:02'),
(3029, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:30:41'),
(3030, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:31:34'),
(3031, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:39:40'),
(3032, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:39:40'),
(3033, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:41:14'),
(3034, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:42:28'),
(3035, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:44:42'),
(3036, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 17:56:40'),
(3037, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 18:08:07'),
(3038, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 18:08:07'),
(3039, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 18:09:04'),
(3040, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 18:20:25'),
(3041, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 18:21:27'),
(3042, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 18:24:51'),
(3043, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 18:24:51'),
(3044, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 18:30:04'),
(3045, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 18:31:34'),
(3046, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 18:38:39'),
(3047, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 19:21:43'),
(3048, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 19:21:43'),
(3049, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 19:23:07'),
(3050, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 19:24:03'),
(3051, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 19:24:57'),
(3052, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 19:28:57'),
(3053, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 19:30:55'),
(3054, '', 'Viewed Report From 29 May 2020 To 30 May 2020', '2020-05-29 19:31:07'),
(3055, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 30 May 2020', '2020-05-29 19:31:07'),
(3056, '', 'Viewed \'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 19:43:26'),
(3057, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 29 May 2020 To 30 May 2020', '2020-05-29 19:43:26'),
(3058, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 30 May 2020', '2020-05-29 19:43:40'),
(3059, '', 'Viewed Report From 29 May 2020 To 30 May 2020', '2020-05-29 19:53:12'),
(3060, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 30 May 2020', '2020-05-29 19:53:12'),
(3061, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 30 May 2020', '2020-05-29 19:57:13'),
(3062, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 30 May 2020', '2020-05-29 19:58:51'),
(3063, '', 'Logged Out', '2020-05-29 19:59:06'),
(3064, 'LMLS-0001', 'Logged Out', '2020-05-29 19:59:06'),
(3065, 'LMLS-0001', 'Logged In', '2020-05-29 20:00:39'),
(3066, '', 'Viewed Report From 29 May 2020 To 30 May 2020', '2020-05-29 20:00:56'),
(3067, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 30 May 2020', '2020-05-29 20:00:56'),
(3068, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 30 May 2020', '2020-05-29 20:13:58'),
(3069, '', 'Viewed Receipt For  ', '2020-05-29 20:14:16'),
(3070, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 20:14:16'),
(3071, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 20:15:06'),
(3072, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 20:19:25'),
(3073, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 20:21:40'),
(3074, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 20:23:13'),
(3075, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 20:24:53'),
(3076, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 20:26:51'),
(3077, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 20:27:46'),
(3078, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 20:29:06'),
(3079, '', 'Viewed Receipt For  ', '2020-05-29 20:31:16'),
(3080, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 20:31:16'),
(3081, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 20:32:59'),
(3082, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 20:34:34'),
(3083, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 20:35:37'),
(3084, 'LMLS-0001', 'Viewed Receipt For Anot Her Patient', '2020-05-29 20:35:43'),
(3085, '', 'Viewed Receipt For  ', '2020-05-29 22:05:46'),
(3086, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-29 22:05:46'),
(3087, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 22:06:10'),
(3088, '', 'Viewed \'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:07:22'),
(3089, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:07:22'),
(3090, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 22:07:33'),
(3091, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 22:10:05'),
(3092, '', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:10:22'),
(3093, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 31 May 2020', '2020-05-29 22:10:22'),
(3094, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 31 May 2020', '2020-05-29 22:12:42'),
(3095, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:16:24'),
(3096, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:17:36'),
(3097, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:18:29'),
(3098, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:19:52'),
(3099, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 31 May 2020', '2020-05-29 22:20:12'),
(3100, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 31 May 2020', '2020-05-29 22:22:58'),
(3101, '', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:27:47'),
(3102, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 31 May 2020', '2020-05-29 22:27:47'),
(3103, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 31 May 2020', '2020-05-29 22:29:08'),
(3104, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 31 May 2020', '2020-05-29 22:29:48'),
(3105, '', 'Viewed \'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:30:25'),
(3106, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:30:25'),
(3107, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:31:19'),
(3108, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 31 May 2020', '2020-05-29 22:31:33'),
(3109, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:32:26'),
(3110, 'LMLS-0001', 'Viewed Report From 28 November 2019 To 31 May 2020', '2020-05-29 22:32:47'),
(3111, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:33:00'),
(3112, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 30 January 2020 To 30 May 2020', '2020-05-29 22:33:30'),
(3113, 'LMLS-0001', 'Viewed Report From 29 November 2019 To 30 May 2020', '2020-05-29 22:33:47'),
(3114, '', 'Logged Out', '2020-05-29 22:36:48'),
(3115, 'LMLS-0001', 'Logged Out', '2020-05-29 22:36:48'),
(3116, 'LMLS-0001', 'Logged In', '2020-05-29 22:38:05'),
(3117, '', 'Viewed Receipt For  ', '2020-05-29 22:38:10'),
(3118, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 22:38:10'),
(3119, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 22:40:21'),
(3120, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 22:41:43'),
(3121, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 22:43:11'),
(3122, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 22:44:15'),
(3123, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 22:44:46'),
(3124, 'LMLS-0001', 'Viewed Receipt For Agyakwa Ntow Mireku', '2020-05-29 22:45:45'),
(3125, '', 'Viewed \'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:45:59'),
(3126, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:45:59'),
(3127, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:48:13'),
(3128, '', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:48:42'),
(3129, 'LMLS-0001', 'Viewed Report From 02 January 2020 To 31 May 2020', '2020-05-29 22:48:42'),
(3130, 'LMLS-0001', 'Viewed  \'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:54:06'),
(3131, 'LMLS-0001', 'Viewed  \'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:54:16'),
(3132, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:56:01'),
(3133, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:57:57'),
(3134, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:59:01'),
(3135, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 22:59:39'),
(3136, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:00:19'),
(3137, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:01:29'),
(3138, 'LMLS-0001', 'Viewed Report From 01 May 2020 To 31 May 2020', '2020-05-29 23:02:16');
INSERT INTO `audit_trail` (`id`, `staff_id`, `activity`, `date`) VALUES
(3139, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 02 January 2020', '2020-05-29 23:02:33'),
(3140, '', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:03:49'),
(3141, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:03:49'),
(3142, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:05:28'),
(3143, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:06:21'),
(3144, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:06:26'),
(3145, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 01 January 2020 To 30 May 2020', '2020-05-29 23:06:39'),
(3146, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 30 May 2020', '2020-05-29 23:06:45'),
(3147, '', 'Logged Out', '2020-05-29 23:08:11'),
(3148, 'LMLS-0001', 'Logged Out', '2020-05-29 23:08:11'),
(3149, 'LMLS-0001', 'Logged In', '2020-05-29 23:09:29'),
(3150, '', 'Viewed \'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:09:34'),
(3151, 'LMLS-0001', 'Viewed  \'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:09:34'),
(3152, 'LMLS-0001', 'Viewed  \'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:09:46'),
(3153, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:10:16'),
(3154, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:10:24'),
(3155, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:10:25'),
(3156, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:10:26'),
(3157, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:10:29'),
(3158, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:10:31'),
(3159, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:10:32'),
(3160, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:11:03'),
(3161, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:11:16'),
(3162, 'LMLS-0001', 'Viewed Agyakwa Ntow Mireku\'s Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:11:20'),
(3163, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:13:10'),
(3164, '', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:27:14'),
(3165, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:27:14'),
(3166, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:34:43'),
(3167, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:35:12'),
(3168, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:36:16'),
(3169, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:36:17'),
(3170, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:36:21'),
(3171, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:38:13'),
(3172, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:39:46'),
(3173, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-29 23:41:46'),
(3174, 'LMLS-0001', 'Logged In', '2020-05-30 11:47:51'),
(3175, '', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-30 11:48:05'),
(3176, 'LMLS-0001', 'Viewed Report From 30 May 2020 To 31 May 2020', '2020-05-30 11:48:05'),
(3177, 'LMLS-0001', 'Logged In', '2020-05-30 18:01:26'),
(3178, '', 'Logged Out', '2020-05-30 18:22:20'),
(3179, 'LMLS-0001', 'Logged Out', '2020-05-30 18:22:20'),
(3180, 'LMLS-0001', 'Logged In', '2020-05-30 18:25:29'),
(3181, '', 'Logged Out', '2020-05-30 18:25:52'),
(3182, 'LMLS-0001', 'Logged Out', '2020-05-30 18:25:52'),
(3183, 'LMLS-0001', 'Logged In', '2020-05-30 18:30:11'),
(3184, 'LMLS-0001', 'Tried To Add Patient \"Anot Her Patient\" But Email Address \"\" Was Already Used', '2020-05-31 13:38:34'),
(3185, 'LMLS-0001', 'Updated Patient \"Anot Her Patient\"', '2020-05-31 13:39:57'),
(3186, '', 'Viewed Receipt For  ', '2020-05-31 14:49:43'),
(3187, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-31 14:49:43'),
(3188, 'LMLS-0001', 'Viewed Receipt For Maria Nortey', '2020-05-31 14:51:58'),
(3189, 'LMLS-0001', 'Viewed Receipt For Anot Her Patient', '2020-05-31 14:54:22'),
(3190, '', 'Viewed Receipt For  ', '2020-05-31 17:30:21'),
(3191, 'LMLS-0001', 'Viewed Receipt For Anot Her Patient', '2020-05-31 17:30:21'),
(3192, 'LMLS-0001', 'Viewed Receipt For Anot Her Patient', '2020-05-31 17:31:16'),
(3193, '', 'Viewed Report From 31 May 2020 To 01 June 2020', '2020-05-31 17:38:13'),
(3194, 'LMLS-0001', 'Viewed Report From 31 May 2020 To 01 June 2020', '2020-05-31 17:38:13'),
(3195, 'LMLS-0001', 'Viewed Report From 31 May 2020 To 01 June 2020', '2020-05-31 17:41:16'),
(3196, 'LMLS-0001', 'Viewed Report From 31 May 2020 To 01 June 2020', '2020-05-31 17:45:38'),
(3197, 'LMLS-0001', 'Viewed Report From 31 May 2020 To 01 June 2020', '2020-05-31 17:48:04'),
(3198, 'LMLS-0001', 'Viewed Report From 31 May 2020 To 01 June 2020', '2020-05-31 17:50:56'),
(3199, 'LMLS-0001', 'Viewed Report From 31 May 2020 To 01 June 2020', '2020-05-31 17:51:46'),
(3200, 'LMLS-0001', 'Viewed Report From 31 May 2020 To 01 June 2020', '2020-05-31 17:52:42'),
(3201, 'LMLS-0001', 'Viewed Report From 31 May 2020 To 01 June 2020', '2020-05-31 17:53:41'),
(3202, 'LMLS-0001', 'Updated Blood C/S Lab For Maria Nortey', '2020-05-31 20:51:10'),
(3203, 'LMLS-0001', 'Updated Ear Swab C/S Lab For Maria Nortey', '2020-05-31 23:11:30'),
(3204, 'LMLS-0001', 'Updated Widal Lab For Michelle Ntow Adjei Laryea', '2020-06-01 13:21:58'),
(3205, 'LMLS-0001', 'Updated Wound C/S Lab For Michelle Ntow Adjei Laryea', '2020-06-01 13:27:53'),
(3206, 'LMLS-0001', 'Updated Urine C/S Lab For Michelle Ntow Adjei Laryea', '2020-06-01 13:38:14'),
(3207, 'LMLS-0001', 'Updated Urine ACR Lab For Michelle Ntow Adjei Laryea', '2020-06-01 13:58:25'),
(3208, 'LMLS-0001', 'Updated Stool R/E Lab For Michelle Ntow Adjei Laryea', '2020-06-01 14:16:07'),
(3209, 'LMLS-0001', 'Updated Sputum AFB Lab For Michelle Ntow Adjei Laryea', '2020-06-01 14:43:49'),
(3210, 'LMLS-0001', 'Updated Pus Fluid Lab For Maria Nortey', '2020-06-01 15:30:01'),
(3211, 'LMLS-0001', 'Updated Pus Fluid Lab For Maria Nortey', '2020-06-01 15:30:18'),
(3212, 'LMLS-0001', 'Updated Pregnancy Test Lab For Michelle Ntow Adjei Laryea', '2020-06-01 15:40:55'),
(3213, '', 'Viewed Report From 01 June 2020 To 02 June 2020', '2020-06-01 20:21:50'),
(3214, 'LMLS-0001', 'Viewed Report From 01 June 2020 To 02 June 2020', '2020-06-01 20:21:50'),
(3215, 'LMLS-0001', 'Viewed Anot Her Patient\'s Report From 01 June 2020 To 02 June 2020', '2020-06-01 20:22:14'),
(3216, 'LMLS-0001', 'Viewed Report From 01 June 2020 To 02 June 2020', '2020-06-01 20:33:35'),
(3217, 'LMLS-0001', 'Viewed Report From 01 June 2020 To 02 June 2020', '2020-06-01 20:35:05'),
(3218, 'LMLS-0001', 'Viewed Report From 01 June 2020 To 02 June 2020', '2020-06-01 20:37:59'),
(3219, '', 'Viewed Report From 01 June 2020 To 02 June 2020', '2020-06-01 20:39:49'),
(3220, 'LMLS-0001', 'Viewed Report From 01 June 2020 To 02 June 2020', '2020-06-01 20:39:49'),
(3221, 'LMLS-0001', 'Blocked Staff \"Mercy Ama Last\"', '2020-06-02 13:29:10'),
(3222, 'LMLS-0001', 'Unblocked Staff \"Mercy Ama Last\"', '2020-06-02 13:29:19'),
(3223, 'LMLS-0001', 'Unblocked Staff \"Thed Nii Aryee\"', '2020-06-02 13:29:23'),
(3224, 'LMLS-0001', 'Updated Staff \"Robert Nii Laryea Adjei Laryea\"', '2020-06-02 13:29:40'),
(3225, 'LMLS-0001', 'Updated Staff \"Robert Nii Laryea Adjei Laryea\"', '2020-06-02 13:29:53'),
(3226, 'LMLS-0001', 'Tried To Create Role Administrator But It Already Exists', '2020-06-02 13:30:14'),
(3227, 'LMLS-0001', 'Updated His Profile', '2020-06-02 13:34:30'),
(3228, '', 'Logged Out', '2020-06-02 13:35:26'),
(3229, 'LMLS-0001', 'Logged Out', '2020-06-02 13:35:26'),
(3230, 'LMLS-0001', 'Logged In', '2020-06-02 13:41:58'),
(3231, '', 'Viewed Report From 02 June 2020 To 03 June 2020', '2020-06-02 14:42:53'),
(3232, 'LMLS-0001', 'Viewed Report From 02 June 2020 To 03 June 2020', '2020-06-02 14:42:53'),
(3233, '', 'Viewed Report From 02 June 2020 To 03 June 2020', '2020-06-02 15:11:23'),
(3234, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 01 February 2020', '2020-06-02 15:11:23'),
(3235, 'LMLS-0001', 'Viewed Report From 01 January 2020 To 03 June 2020', '2020-06-02 15:11:36'),
(3236, 'LMLS-0001', 'Viewed Report From 01 March 2020 To 01 April 2020', '2020-06-02 15:11:59'),
(3237, 'LMLS-0001', 'Viewed Report From 02 June 2020 To 03 June 2020', '2020-06-02 15:17:13'),
(3238, 'LMLS-0001', 'Viewed Report From 02 June 2020 To 03 June 2020', '2020-06-02 15:18:31'),
(3239, 'LMLS-0001', 'Viewed Report From 02 June 2020 To 03 June 2020', '2020-06-02 15:19:52'),
(3240, 'LMLS-0001', 'Viewed Report From 02 June 2020 To 03 June 2020', '2020-06-02 15:21:07'),
(3241, 'LMLS-0001', 'Viewed Report From 02 June 2020 To 03 June 2020', '2020-06-02 15:25:17'),
(3242, 'LMLS-0001', 'Viewed Report From 02 June 2020 To 03 June 2020', '2020-06-02 15:27:12'),
(3243, '', 'Logged Out', '2020-06-02 15:39:34'),
(3244, 'LMLS-0001', 'Logged Out', '2020-06-02 15:39:34'),
(3245, 'LMLS-0001', 'Logged In', '2020-06-02 15:39:36'),
(3246, '', 'Logged Out', '2020-06-02 16:30:35'),
(3247, 'LMLS-0001', 'Logged Out', '2020-06-02 16:30:35'),
(3248, 'LMLS-0001', 'Logged In', '2020-06-02 20:19:31'),
(3249, '', 'Logged Out', '2020-06-02 20:19:50'),
(3250, 'LMLS-0001', 'Logged Out', '2020-06-02 20:19:50'),
(3251, 'LMLS-0001', 'Logged In', '2020-06-02 20:20:57'),
(3252, '', 'Logged Out', '2020-06-02 20:21:21'),
(3253, 'LMLS-0001', 'Logged Out', '2020-06-02 20:21:21'),
(3254, 'LMLS-0001', 'Logged In', '2020-06-02 21:07:04'),
(3255, 'LMLS-0001', 'Viewed Report From 02 June 2020 To 03 June 2020', '2020-06-02 21:07:23'),
(3256, 'LMLS-0001', 'Logged Out', '2020-06-02 21:08:08'),
(3257, 'LMLS-0001', 'Logged In', '2020-06-02 21:08:30'),
(3258, 'LMLS-0001', 'Logged In', '2020-06-02 21:20:30'),
(3259, 'LMLS-0001', 'Logged Out', '2020-06-02 21:42:53'),
(3260, 'LMLS-0001', 'Logged In', '2020-06-02 21:43:04'),
(3261, 'LMLS-0001', 'Logged Out', '2020-06-02 21:44:19'),
(3262, 'LMLS-0001', 'Logged Out', '2020-06-02 21:44:37'),
(3263, 'LMLS-0001', 'Logged In', '2020-06-02 22:07:12'),
(3264, 'LMLS-0001', 'Logged In', '2020-06-02 23:08:07'),
(3265, 'LMLS-0001', 'Logged In', '2020-06-02 23:25:59'),
(3266, '', 'Viewed Report From 03 June 2020 To 04 June 2020', '2020-06-02 23:33:09'),
(3267, 'LMLS-0001', 'Viewed Report From 03 June 2020 To 04 June 2020', '2020-06-02 23:33:09'),
(3268, 'LMLS-0001', 'Logged Out', '2020-06-02 23:42:17'),
(3269, 'LMLS-0001', 'Logged In', '2020-06-02 23:42:24'),
(3270, '', 'Logged Out', '2020-06-02 23:59:31'),
(3271, 'LMLS-0001', 'Logged Out', '2020-06-02 23:59:31'),
(3272, 'LMLS-0001', 'Logged Out', '2020-06-03 02:39:23'),
(3273, 'LMLS-0001', 'Logged Out', '2020-06-03 02:58:35'),
(3274, 'LMLS-0001', 'Logged In', '2020-06-03 17:04:28'),
(3275, '', 'Logged Out', '2020-06-03 17:33:11'),
(3276, 'LMLS-0001', 'Logged Out', '2020-06-03 17:33:11'),
(3277, 'LMLS-0001', 'Logged In', '2020-06-03 17:35:39'),
(3278, 'LMLS-0001', 'Logged In', '2020-06-03 17:54:08'),
(3279, 'LMLS-0001', 'Logged Out', '2020-06-03 17:54:20'),
(3280, '', 'Logged Out', '2020-06-03 17:54:38'),
(3281, 'LMLS-0001', 'Logged Out', '2020-06-03 17:54:38'),
(3282, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-06-03 18:15:14'),
(3283, 'LMLS-0001', 'Logged In', '2020-06-03 18:15:17'),
(3284, 'LMLS-0001', 'Logged Out', '2020-06-03 18:15:59'),
(3285, 'LMLS-0001', 'Logged In', '2020-06-04 08:22:21'),
(3286, 'LMLS-0001', 'Logged In', '2020-06-04 08:40:07'),
(3287, '', 'Logged Out', '2020-06-04 08:40:14'),
(3288, 'LMLS-0001', 'Logged Out', '2020-06-04 08:40:14'),
(3289, 'LMLS-0001', 'Logged In', '2020-06-04 09:56:33'),
(3290, 'LMLS-0001', 'Logged In', '2020-06-04 10:34:22'),
(3291, 'LMLS-0001', 'Logged Out', '2020-06-04 10:44:15'),
(3292, 'LMLS-0001', 'Logged In', '2020-06-04 10:49:33'),
(3293, '', 'Logged Out', '2020-06-04 10:50:12'),
(3294, 'LMLS-0001', 'Logged Out', '2020-06-04 10:50:12'),
(3295, 'LMLS-0001', 'Logged In', '2020-06-04 10:51:53'),
(3296, 'LMLS-0001', 'Logged In', '2020-06-04 11:56:11'),
(3297, 'LMLS-0001', 'Logged Out', '2020-06-04 11:56:48'),
(3298, 'LMLS-0001', 'Logged In', '2020-06-04 11:57:50'),
(3299, 'LMLS-0001', 'Logged Out', '2020-06-04 11:57:59'),
(3300, 'LMLS-0001', 'Logged In', '2020-06-04 13:02:19'),
(3301, 'LMLS-0001', 'Logged Out', '2020-06-04 13:05:19'),
(3302, 'LMLS-0001', 'Logged In', '2020-06-04 13:08:01'),
(3303, 'LMLS-0001', 'Logged Out', '2020-06-04 19:14:19'),
(3304, 'LMLS-0001', 'Logged In', '2020-06-11 21:46:30'),
(3305, 'LMLS-0001', 'Added Obstetric Scan To Charges', '2020-06-11 22:20:20'),
(3306, 'LMLS-0001', 'Added Pelvic Scan Gynaecology To Charges', '2020-06-11 22:20:36'),
(3307, 'LMLS-0001', 'Added Pelvic Scan Urology To Charges', '2020-06-11 22:20:50'),
(3308, 'LMLS-0001', 'Added Abdominal Scan To Charges', '2020-06-11 22:21:26'),
(3309, 'LMLS-0001', 'Added Abdominopelvic Scan To Charges', '2020-06-11 22:22:46'),
(3310, 'LMLS-0001', 'Added Prostate Scan To Charges', '2020-06-11 22:23:04'),
(3311, 'LMLS-0001', 'Added Thyroid Scan Anterior Neck Swelling To Charges', '2020-06-11 22:23:26'),
(3312, 'LMLS-0001', 'Added Breast Scan To Charges', '2020-06-11 22:23:40'),
(3313, 'LMLS-0001', 'Added Scrotal Scan To Charges', '2020-06-11 22:24:09'),
(3314, 'LMLS-0001', 'Added Superficial Swellings To Charges', '2020-06-11 22:24:22'),
(3315, 'LMLS-0001', 'Added Other Small Parts To Charges', '2020-06-11 22:24:36'),
(3316, 'LMLS-0001', 'Added Request For Anot Her Patient', '2020-06-11 22:28:54'),
(3317, 'LMLS-0001', 'Made Payment Of GHS500 For Anot Her Patient\'s Request', '2020-06-11 22:29:10'),
(3318, 'LMLS-0001', 'Updated Request For Anot Her Patient', '2020-06-11 22:29:22'),
(3319, 'LMLS-0001', 'Completed Request For Anot Her Patient', '2020-06-11 22:29:41'),
(3320, 'LMLS-0001', 'Added Request For Trial Ntow Adjei Laryea', '2020-06-11 22:29:57'),
(3321, 'LMLS-0001', 'Made Payment Of GHS100 For Trial Ntow Adjei Laryea\'s Request', '2020-06-11 22:30:06'),
(3322, 'LMLS-0001', 'Updated Request For Trial Ntow Adjei Laryea', '2020-06-11 22:30:23'),
(3323, '', 'Logged Out', '2020-06-11 22:32:51'),
(3324, 'LMLS-0001', 'Logged Out', '2020-06-11 22:32:51'),
(3325, 'LMLS-0001', 'Logged In', '2020-06-11 22:35:32'),
(3326, 'LMLS-0001', 'Updated Request For Trial Ntow Adjei Laryea', '2020-06-11 22:36:10'),
(3327, 'LMLS-0001', 'Completed Request For Trial Ntow Adjei Laryea', '2020-06-11 22:36:20'),
(3328, 'LMLS-0001', 'Added Request For Maria Nortey', '2020-06-11 22:36:35'),
(3329, 'LMLS-0001', 'Made Payment Of GHS50 For Maria  Nortey\'s Request', '2020-06-11 22:36:41'),
(3330, 'LMLS-0001', 'Updated Request For Maria Nortey', '2020-06-11 22:36:55'),
(3331, 'LMLS-0001', 'Updated Charge \"Pelvic Scan Urology\" From GHS 60.00 To GHS 61.00', '2020-06-11 22:40:07'),
(3332, 'LMLS-0001', 'Updated Charge \"Pelvic Scan Urology\" From GHS 61.00 To GHS 60.00', '2020-06-11 22:40:19'),
(3333, '', 'Logged Out', '2020-06-11 22:41:27'),
(3334, 'LMLS-0001', 'Logged Out', '2020-06-11 22:41:27'),
(3335, 'LMLS-0001', 'Logged In', '2020-06-11 22:42:20'),
(3336, '', 'Logged Out', '2020-06-11 22:51:26'),
(3337, 'LMLS-0001', 'Logged Out', '2020-06-11 22:51:26'),
(3338, 'LMLS-0001', 'Logged In', '2020-06-12 14:50:12'),
(3339, 'LMLS-0001', 'Logged In', '2020-06-12 14:50:44'),
(3340, 'LMLS-0001', 'Logged Out', '2020-06-12 14:51:09'),
(3341, 'LMLS-0001', 'Logged Out', '2020-06-12 14:51:17'),
(3342, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-09 23:18:26'),
(3343, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-09 23:21:28'),
(3344, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-09 23:21:59'),
(3345, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-09 23:22:16'),
(3346, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-09 23:22:21'),
(3347, 'LMLS-0001', 'Logged In', '2020-07-10 00:17:06'),
(3348, 'LMLS-0001', 'Logged Out', '2020-07-10 00:19:21'),
(3349, 'LMLS-AMA-0004', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-10 14:50:55'),
(3350, 'LMLS-AMA-0004', 'Logged In', '2020-07-10 14:51:45'),
(3351, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-10 14:57:50'),
(3352, 'LMLS-AMA-0004', 'Logged In', '2020-07-10 14:58:14'),
(3353, 'LMLS-0001', 'Logged In', '2020-07-10 14:58:26'),
(3354, 'LMLS-0001', 'Logged Out', '2020-07-10 15:34:42'),
(3355, 'LMLS-0001', 'Logged In', '2020-07-10 15:34:51'),
(3356, 'LMLS-0001', 'Logged In', '2020-07-10 15:38:59'),
(3357, 'LMLS-KB-0000', 'Logged In', '2020-07-10 15:39:13'),
(3358, 'LMLS-KB-0002', 'Logged In', '2020-07-10 15:39:28'),
(3359, 'LMLS-AMA-0002', 'Logged In', '2020-07-10 15:39:48'),
(3360, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-10 15:40:33'),
(3361, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-10 15:40:40'),
(3362, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-10 15:40:46'),
(3363, 'LMLS-0001', 'Logged In', '2020-07-10 15:40:51'),
(3364, 'LMLS-0001', 'Logged In', '2020-07-10 16:04:01'),
(3365, 'LMLS-0001', 'Logged Out', '2020-07-10 17:49:42'),
(3366, 'LMLS-0001', 'Logged In', '2020-07-11 12:32:49'),
(3367, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-11 13:25:49'),
(3368, 'LMLS-0001', 'Logged In', '2020-07-11 13:29:31'),
(3369, 'LMLS-AMA-0004', 'Logged In', '2020-07-11 13:44:15'),
(3370, '', 'Logged Out', '2020-07-11 17:05:13'),
(3371, 'LMLS-AMA-0004', 'Logged Out', '2020-07-11 17:05:13'),
(3372, 'LMLS-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-11 17:05:24'),
(3373, 'LMLS-AMA-0004', 'Logged In', '2020-07-11 17:05:29'),
(3374, 'LMLS-AMA-0004', 'Logged Out', '2020-07-11 17:05:38'),
(3375, 'LMLS-AMA-0004', 'Logged In', '2020-07-11 17:06:11'),
(3376, 'LMLS-AMA-0004', 'Logged Out', '2020-07-11 17:08:08'),
(3377, 'LMLS-AMA-0004', 'Logged In', '2020-07-11 17:08:17'),
(3378, 'LMLS-AMA-0004', 'Logged Out', '2020-07-11 17:08:40'),
(3379, 'LMLS-AMA-0004', 'Logged In', '2020-07-11 17:09:33'),
(3380, 'LMLS-AMA-0004', 'Logged Out', '2020-07-11 17:09:50'),
(3381, 'LMLS-AMA-0004', 'Logged In', '2020-07-11 17:11:26'),
(3382, 'LMLS-AMA-0004', 'Logged Out', '2020-07-11 17:11:34'),
(3383, 'LMLS-AMA-0004', 'Logged In', '2020-07-11 17:12:21'),
(3384, 'LMLS-AMA-0004', 'Logged Out', '2020-07-11 17:12:27'),
(3385, 'LMLS-AMA-0004', 'Logged In', '2020-07-11 17:13:01'),
(3386, 'LMLS-AMA-0004', 'Logged Out', '2020-07-11 17:13:09'),
(3387, 'LMLS-AMA-0004', 'Logged In', '2020-07-11 17:16:26'),
(3388, 'LMLS-AMA-0004', 'Logged Out', '2020-07-11 17:16:32'),
(3389, 'LMLS-AMA-0004', 'Logged In', '2020-07-11 17:21:14'),
(3390, '', 'Logged Out', '2020-07-11 17:21:53'),
(3391, 'LMLS-AMA-0004', 'Logged Out', '2020-07-11 17:21:53'),
(3392, 'LMLS-AMA-0004', 'Logged In', '2020-07-11 17:21:56'),
(3393, 'LMLS-AMA-0004', 'Logged Out', '2020-07-11 17:22:14'),
(3394, 'LMLS-AMA-0002', 'Logged In', '2020-07-11 17:22:58'),
(3395, 'LMLS-AMA-0004', 'Logged In', '2020-07-11 20:22:07'),
(3396, '', 'Logged Out', '2020-07-11 20:22:24'),
(3397, 'LMLS-AMA-0004', 'Logged Out', '2020-07-11 20:22:24'),
(3398, 'LMLS-AMA-0002', 'Logged In', '2020-07-11 20:22:29'),
(3399, '', 'Logged Out', '2020-07-11 23:28:17'),
(3400, 'LMLS-AMA-0002', 'Logged Out', '2020-07-11 23:28:17'),
(3401, 'LMLS-KB-0000', 'Logged In', '2020-07-11 23:28:24'),
(3402, 'LMLS-KB-0000', 'Logged Out', '2020-07-11 23:28:32'),
(3403, 'LMLS-KB-0000', 'Logged In', '2020-07-11 23:28:48'),
(3404, 'LMLS-KB-0000', 'Logged Out', '2020-07-11 23:28:57'),
(3405, 'LMLS-AMA-0004', 'Logged In', '2020-07-11 23:29:02'),
(3406, 'LMLS-AMA-0004', 'Logged Out', '2020-07-11 23:30:40'),
(3407, 'LMLS-KB-0000', 'Logged In', '2020-07-11 23:30:44'),
(3408, 'LMLS-KB-0000', 'Logged Out', '2020-07-11 23:31:12'),
(3409, 'LMLS-KB-0000', 'Logged In', '2020-07-11 23:31:14'),
(3410, 'LMLS-KB-0000', 'Logged Out', '2020-07-11 23:31:52'),
(3411, 'LMLS-KB-0000', 'Logged In', '2020-07-11 23:32:01'),
(3412, 'LMLS-KB-0000', 'Logged Out', '2020-07-11 23:32:06'),
(3413, 'LMLS-KB-0000', 'Logged In', '2020-07-11 23:32:10'),
(3414, 'LMLS-KB-0000', 'Logged Out', '2020-07-11 23:33:06'),
(3415, 'LMLS-KB-0000', 'Logged In', '2020-07-11 23:34:08'),
(3416, 'LMLS-KB-0000', 'Logged Out', '2020-07-11 23:34:21'),
(3417, 'LMLS-KB-0000', 'Logged In', '2020-07-11 23:34:41'),
(3418, 'LMLS-KB-0000', 'Logged Out', '2020-07-11 23:34:56'),
(3419, 'LMLS-KB-0000', 'Logged In', '2020-07-11 23:35:10'),
(3420, 'LMLS-KB-0000', 'Logged In', '2020-07-11 23:35:57'),
(3421, 'LMLS-KB-0000', 'Logged Out', '2020-07-11 23:37:49'),
(3422, 'LMLS-KB-0000', 'Logged In', '2020-07-11 23:37:51'),
(3423, 'LMLS-KB-0000', 'Logged Out', '2020-07-11 23:38:37'),
(3424, 'LMLS-KB-0000', 'Logged In', '2020-07-11 23:38:52'),
(3425, '', 'Logged Out', '2020-07-12 00:32:05'),
(3426, 'LMLS-KB-0000', 'Logged Out', '2020-07-12 00:32:05'),
(3427, 'LMLS-KB-0000', 'Logged In', '2020-07-12 00:32:11'),
(3428, 'LMLS-KB-0000', 'Logged Out', '2020-07-12 00:32:16'),
(3429, 'LMLS-KB-0000', 'Logged In', '2020-07-12 00:32:19'),
(3430, 'LMLS-KB-0000', 'Logged Out', '2020-07-12 00:35:28'),
(3431, 'LMLS-KB-0000', 'Logged In', '2020-07-12 11:19:28'),
(3432, '', 'Logged Out', '2020-07-12 11:39:17'),
(3433, 'LMLS-KB-0000', 'Logged Out', '2020-07-12 11:39:17'),
(3434, 'LMLS-KB-0000', 'Logged In', '2020-07-12 11:39:25'),
(3435, 'LMLS-0001', 'Viewed Receipt For Trial Ntow Adjei Laryea', '2020-07-12 13:11:38'),
(3436, '', 'Logged Out', '2020-07-12 16:44:14'),
(3437, 'LMLS-KB-0000', 'Logged Out', '2020-07-12 16:44:14'),
(3438, 'LMLS-KB-0000', 'Logged In', '2020-07-12 16:44:16'),
(3439, 'LMLS-KB-0000', 'Logged Out', '2020-07-12 16:44:22'),
(3440, 'LMLS-KB-0000', 'Logged In', '2020-07-12 16:45:02'),
(3441, 'LMLS-KB-0000', 'Logged In', '2020-07-12 16:45:47'),
(3442, 'LMLS-KB-0000', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-12 16:47:56'),
(3443, 'LMLS-KB-0000', 'Logged In', '2020-07-12 16:48:02'),
(3444, 'LMLS-KB-0000', 'Logged In', '2020-07-12 19:16:45'),
(3445, 'LMLS-KB-0000', 'Logged In', '2020-07-12 22:31:14'),
(3446, 'LMLS-0001', 'Logged In', '2020-07-12 23:26:32'),
(3447, 'LMLS-0001', 'Viewed Receipt For Trial Ntow Adjei Laryea', '2020-07-12 23:26:39'),
(3448, 'LMLS-KB-0000', 'Logged In', '2020-07-12 23:46:48'),
(3449, 'LMLS-0001', 'Logged In', '2020-07-13 00:08:55'),
(3450, 'LMLS-0001', 'Viewed Receipt For Trial Ntow Adjei Laryea', '2020-07-13 13:56:50'),
(3451, 'LMLS-KB-0000', 'Tried To Add Patient \"Bismark Adjei Bediako\" But Email Address \"bismark@bediako.com.gh\" Was Already Used', '2020-07-13 16:31:10'),
(3452, 'LMLS-KB-0000', 'Added Patient \"Bismark Adjei Bediako\"', '2020-07-13 16:36:52'),
(3453, 'LMLS-KB-0000', 'Added Patient \"Bismark Adjei Bediako\"', '2020-07-13 16:48:33'),
(3454, 'LMLS-KB-0000', 'Added Patient \"Bismark Adjei Bediako\"', '2020-07-13 16:50:41'),
(3455, 'LMLS-KB-0000', 'Added Patient \"Bismark Adjei Bediako\"', '2020-07-13 16:52:39'),
(3456, 'LMLS-KB-0000', 'Added Patient \"Bismark Adjei Bediako\"', '2020-07-13 16:55:24'),
(3457, 'LMLS-KB-0000', 'Added Patient \"Bismark Adjei Bediako\"', '2020-07-13 16:56:51'),
(3458, 'LMLS-KB-0000', 'Added Patient \"Bismark Adjei Bediako\"', '2020-07-13 16:58:42'),
(3459, 'LMLS-KB-0000', 'Added Patient \"Bismark Adjei Bediako\"', '2020-07-13 16:59:42'),
(3460, 'LMLS-KB-0000', 'Added Patient \"Bismark Adjei Bediako\"', '2020-07-13 17:02:33'),
(3461, 'LMLS-KB-0000', 'Added Patient \"Bismark Adjei Bediako\"', '2020-07-13 18:09:29'),
(3462, 'LMLS-KB-0000', 'Added Patient \"Bismark Adjei Bediako\"', '2020-07-13 18:10:42'),
(3463, 'LMLS-KB-0000', 'Updated Patient \"Bismark Adjei Bablerry Bediako\"', '2020-07-13 18:31:20'),
(3464, 'LMLS-KB-0000', 'Updated Patient \"Bismark Adjei Bediako\"', '2020-07-13 18:32:37'),
(3465, 'LMLS-KB-0000', 'Updated Patient \"Bismark Adjei Bablerry Bediako\"', '2020-07-13 18:33:38'),
(3466, 'LMLS-KB-0000', 'Updated Patient \"Bismark Adjei Bediako\"', '2020-07-13 18:33:56'),
(3467, 'LMLS-KB-0000', 'Updated Patient \"Bismark Adjei Bablerry Bediako\"', '2020-07-13 18:36:39'),
(3468, 'LMLS-KB-0000', 'Updated Patient \"Bismark Adjei Bediako\"', '2020-07-13 18:36:59'),
(3469, 'LMLS-KB-0000', 'Updated Patient \"Bismark Adjei Bablerry Bediako\"', '2020-07-13 18:38:49'),
(3470, 'LMLS-KB-0000', 'Updated Patient \"Bismark Adjei Bediako\"', '2020-07-13 18:39:02'),
(3471, 'LMLS-KB-0000', 'Tried To Add Patient \"Bismark Adjei Bediako\" But Email Address \"maria@nortey.com\" Was Already Used', '2020-07-13 18:54:33'),
(3472, 'LMLS-KB-0000', 'Unblocked Moses Narh Tetteh', '2020-07-14 00:04:16'),
(3473, 'LMLS-KB-0000', 'Blocked Moses Narh Tetteh', '2020-07-14 00:05:37'),
(3474, 'LMLS-KB-0000', 'Unblocked Rita Ekua Yamoah', '2020-07-14 00:07:09'),
(3475, 'LMLS-KB-0000', 'Blocked Rita Ekua Yamoah', '2020-07-14 00:08:18'),
(3476, 'LMLS-KB-0000', 'Unblocked Rita Ekua Yamoah', '2020-07-14 00:08:29'),
(3477, 'LMLS-KB-0000', 'Blocked Moses Narh Tetteh', '2020-07-14 00:08:38'),
(3478, 'LMLS-KB-0000', 'Updated Patient \"Michelle Koduah\"', '2020-07-14 00:40:15'),
(3479, 'LMLS-KB-0000', 'Updated Patient \"Robert Ntow Adjei Laryea\"', '2020-07-14 00:40:55'),
(3480, 'LMLS-KB-0000', 'Updated Patient \"Trial Ntow Adjei-laryea\"', '2020-07-14 00:41:22'),
(3481, 'LMLS-AMA-0002', 'Tried To Add Staff \"Moses Narh Tetteh\" But Email Address \"moses@tetteh.com\" Was Already Used', '2020-07-14 00:45:10'),
(3482, 'LMLS-KB-0000', 'Updated Staff \"Moses Narh Tetteh\"', '2020-07-14 01:04:33'),
(3483, 'LMLS-KB-0000', 'Updated Staff \"Moses Narh Tetteh\"', '2020-07-14 01:04:52'),
(3484, 'LMLS-KB-0000', 'Tried To Add Staff \"Bismark Adjei Bediako\" But Email Address \"bismark@bediako.com.gh\" Was Already Used', '2020-07-14 15:36:52'),
(3485, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 15:37:16'),
(3486, 'LMLS-KB-0000', 'Tried To Add Staff \"Bismark Adjei Bediako\" But Email Address \"bismark@bediako.com.gh\" Was Already Used', '2020-07-14 15:40:08'),
(3487, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 15:40:22'),
(3488, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 15:41:38'),
(3489, 'LMLS-KB-0000', 'Added Staff \"Bismark Bediako\"', '2020-07-14 15:42:17'),
(3490, 'LMLS-KB-0000', 'Added Staff \"Bismark Bediako\"', '2020-07-14 15:43:01'),
(3491, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 15:44:17'),
(3492, 'LMLS-KB-0000', 'Added Staff \"Bismark Bediako\"', '2020-07-14 15:45:38'),
(3493, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 15:47:25'),
(3494, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 15:47:59'),
(3495, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 15:48:37'),
(3496, 'LMLS-KB-0000', 'Tried To Add Staff \"Bismark Adjei Bediako\" But Email Address \"bismark@bediako.com.gh\" Was Already Used', '2020-07-14 15:49:57'),
(3497, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 15:50:05'),
(3498, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 15:51:54'),
(3499, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 15:55:27'),
(3500, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 15:59:07'),
(3501, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 15:59:38'),
(3502, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 16:00:05'),
(3503, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 16:03:57'),
(3504, 'LMLS-KB-0000', 'Added Staff \"Bismark Bediako\"', '2020-07-14 16:05:09'),
(3505, 'LMLS-KB-0000', 'Added Staff \"Bismark Bediako\"', '2020-07-14 16:05:34'),
(3506, 'LMLS-KB-0000', 'Added Staff \"Bismark Bediako\"', '2020-07-14 16:06:00'),
(3507, 'LMLS-KB-0000', 'Added Staff \"Bismark Bediako\"', '2020-07-14 16:06:31'),
(3508, 'LMLS-EL-0004', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-14 16:07:04'),
(3509, 'LMLS-KB-0000', 'Added Staff \"Bismark Adjei Bediako\"', '2020-07-14 16:12:39'),
(3510, 'LMLS-EL-0000', 'Logged In', '2020-07-14 16:12:56'),
(3511, '', 'Logged Out', '2020-07-14 16:13:34'),
(3512, 'LMLS-EL-0000', 'Logged Out', '2020-07-14 16:13:34'),
(3513, 'LMLS-EL-0000', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-14 16:14:02'),
(3514, 'LMLS-EL-0000', 'Logged In', '2020-07-14 16:14:07'),
(3515, 'LMLS-KB-0000', 'Blocked Bismark Adjei Bediako', '2020-07-14 16:24:07'),
(3516, 'LMLS-KB-0000', 'Unblocked Bismark Adjei Bediako', '2020-07-14 16:24:26'),
(3517, 'LMLS-KB-0000', 'Blocked Bismark Adjei Bediako', '2020-07-14 16:24:36'),
(3518, 'LMLS-EL-0000', 'Logged Out', '2020-07-14 16:24:54'),
(3519, 'LMLS-EL-0000', 'Tried To Log In But Failed Because Their Account Is Inactive', '2020-07-14 16:25:04'),
(3520, 'LMLS-EL-0000', 'Tried To Log In But Failed Because Their Account Is Inactive', '2020-07-14 16:25:08'),
(3521, 'LMLS-EL-0000', 'Tried To Log In But Failed Because Their Account Is Inactive', '2020-07-14 16:25:10'),
(3522, 'LMLS-EL-0000', 'Tried To Log In But Failed Because Their Account Is Inactive', '2020-07-14 16:25:12'),
(3523, 'LMLS-EL-0000', 'Tried To Log In But Failed Because Their Account Is Inactive', '2020-07-14 16:25:14'),
(3524, 'LMLS-EL-0000', 'Tried To Log In But Failed Because Their Account Is Inactive', '2020-07-14 16:25:17'),
(3525, '', 'Logged Out', '2020-07-14 17:39:43'),
(3526, 'LMLS-KB-0000', 'Logged Out', '2020-07-14 17:39:43'),
(3527, 'LMLS-0000', 'Logged In', '2020-07-14 17:41:34'),
(3528, 'LMLS-0000', 'Logged In', '2020-07-14 17:42:18'),
(3529, 'LMLS-0000', 'Logged In', '2020-07-14 17:43:15'),
(3530, 'LMLS-0000', 'Logged In', '2020-07-14 17:43:59'),
(3531, 'LMLS-0000', 'Logged In', '2020-07-14 17:44:01'),
(3532, 'LMLS-0000', 'Logged In', '2020-07-14 17:45:35'),
(3533, 'LMLS-0000', 'Logged In', '2020-07-14 17:46:12'),
(3534, 'LMLS-0000', 'Logged In', '2020-07-14 17:48:21'),
(3535, 'LMLS-0000', 'Logged In', '2020-07-14 17:56:45'),
(3536, '', 'Logged Out', '2020-07-14 17:56:53'),
(3537, 'LMLS-0000', 'Logged Out', '2020-07-14 17:56:53'),
(3538, 'LMLS-EL-0000', 'Tried To Log In But Failed Because Their Account Is Inactive', '2020-07-14 17:56:58'),
(3539, 'LMLS-EL-0000', 'Tried To Log In But Failed Because Their Account Is Inactive', '2020-07-14 17:57:03'),
(3540, 'LMLS-0000', 'Unblocked Bismark Adjei Bediako', '2020-07-14 17:57:19'),
(3541, 'LMLS-EL-0000', 'Logged In', '2020-07-14 17:57:28'),
(3542, 'LMLS-AMA-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-14 18:00:49'),
(3543, 'LMLS-AMA-0001', 'Tried To Log In But Failed Because They Provided Wrong Password', '2020-07-14 18:00:53'),
(3544, 'LMLS-0000', 'Blocked Robert Nii Laryea Adjei Laryea', '2020-07-14 19:16:53'),
(3545, 'LMLS-0000', 'Blocked Robert Nii Laryea Adjei Laryea', '2020-07-14 19:17:03'),
(3546, 'LMLS-0000', 'Unblocked Robert Nii Laryea Adjei Laryea', '2020-07-14 19:17:14'),
(3547, 'LMLS-0000', 'Blocked Robert Nii Laryea Adjei Laryea', '2020-07-14 19:17:23'),
(3548, 'LMLS-0000', 'Unblocked Robert Nii Laryea Adjei Laryea', '2020-07-14 19:17:32'),
(3549, 'LMLS-0000', 'Updated Charge \"17 Oh Progesterone\" From GHS 150.00 To GHS 150.00', '2020-07-14 21:16:04'),
(3550, 'LMLS-0000', 'Updated Charge \"17 Oh Progesterone\" From GHS 150.00 To GHS 100.00', '2020-07-14 21:21:48'),
(3551, 'LMLS-0000', 'Updated Charge \"17 Oh Progesterone\" From GHS 100.00 To GHS 120.00', '2020-07-14 21:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `blood_cs`
--

CREATE TABLE `blood_cs` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `bacteria_three` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `antibiotics_seventeen` text DEFAULT NULL,
  `antibiotics_eighteen` text DEFAULT NULL,
  `antibiotics_nineteen` text DEFAULT NULL,
  `antibiotics_twenty` text DEFAULT NULL,
  `antibiotics_twenty_one` text DEFAULT NULL,
  `antibiotics_twenty_two` text DEFAULT NULL,
  `antibiotics_twenty_three` text DEFAULT NULL,
  `antibiotics_twenty_four` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `sensitivity_seventeen` text DEFAULT NULL,
  `sensitivity_eighteen` text DEFAULT NULL,
  `sensitivity_nineteen` text DEFAULT NULL,
  `sensitivity_twenty` text DEFAULT NULL,
  `sensitivity_twenty_one` text DEFAULT NULL,
  `sensitivity_twenty_two` text DEFAULT NULL,
  `sensitivity_twenty_three` text DEFAULT NULL,
  `sensitivity_twenty_four` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_cs`
--

INSERT INTO `blood_cs` (`id`, `invoice_id`, `patient_id`, `culture`, `bacteria_one`, `bacteria_two`, `bacteria_three`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `antibiotics_seventeen`, `antibiotics_eighteen`, `antibiotics_nineteen`, `antibiotics_twenty`, `antibiotics_twenty_one`, `antibiotics_twenty_two`, `antibiotics_twenty_three`, `antibiotics_twenty_four`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `sensitivity_seventeen`, `sensitivity_eighteen`, `sensitivity_nineteen`, `sensitivity_twenty`, `sensitivity_twenty_one`, `sensitivity_twenty_two`, `sensitivity_twenty_three`, `sensitivity_twenty_four`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-BLOOD-CS-360', 'LMLS-PAT-KB-0002', 'No Bacterial Growth', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'S', 'S', 'S', 'S', 'R', 'R', 'R', 'R', 'S', 'S', 'S', 'S', 'R', 'R', 'R', 'R', 'S', 'S', 'S', 'S', 'R', 'R', 'R', 'R', 'Some Comment Here', 'LMLS-0001', '2020-03-06 21:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `blood_film_comment`
--

CREATE TABLE `blood_film_comment` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `rbc` text DEFAULT NULL,
  `wbc` text DEFAULT NULL,
  `platelets` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blood_sugar`
--

CREATE TABLE `blood_sugar` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `fasting_blood_sugar` double(10,2) DEFAULT 0.00,
  `random_blood_sugar` double(10,2) DEFAULT 0.00,
  `two_hpp_blood_sugar` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_sugar`
--

INSERT INTO `blood_sugar` (`id`, `invoice_id`, `patient_id`, `fasting_blood_sugar`, `random_blood_sugar`, `two_hpp_blood_sugar`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-BLD-SUGAR-410', 'LMLS-PAT-KB-0001', 1.00, 2.00, 3.00, 'Jkhjgfdsas', 'LMLS-0001', '2020-03-08 00:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `bue_creatinine`
--

CREATE TABLE `bue_creatinine` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `sodium` double(10,2) DEFAULT 0.00,
  `sodium_flag` varchar(25) DEFAULT NULL,
  `potassium` double(10,2) DEFAULT 0.00,
  `potassium_flag` varchar(25) DEFAULT NULL,
  `chloride` double(10,2) DEFAULT 0.00,
  `chloride_flag` varchar(25) DEFAULT NULL,
  `urea` double(10,2) DEFAULT 0.00,
  `urea_flag` varchar(25) DEFAULT NULL,
  `creatinine` double(10,2) DEFAULT 0.00,
  `creatinine_flag` varchar(25) DEFAULT NULL,
  `egfr` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bue_creatinine`
--

INSERT INTO `bue_creatinine` (`id`, `invoice_id`, `patient_id`, `sodium`, `sodium_flag`, `potassium`, `potassium_flag`, `chloride`, `chloride_flag`, `urea`, `urea_flag`, `creatinine`, `creatinine_flag`, `egfr`, `comments`, `added_by`, `date_added`) VALUES
(4, 'INV-BUE-CREAT-490', 'LMLS-PAT-KB-0001', 2.00, '', 3.00, '', 4.00, '', 5.00, '', 6.00, '', 7.00, '', 'LMLS-0001', '2020-03-07 21:31:20'),
(5, 'INV-BUE-CRT-231', 'LMLS-PAT-KB-0003', 1.00, 'Low', 2.00, 'High', 0.00, '', 0.00, '', 0.00, '', 0.00, 'This Is A Sample Comment', 'LMLS-0001', '2020-03-18 10:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `bue_creatinine_egfr`
--

CREATE TABLE `bue_creatinine_egfr` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `sodium` double(10,2) DEFAULT 0.00,
  `sodium_flag` varchar(25) DEFAULT NULL,
  `potassium` double(10,2) DEFAULT 0.00,
  `potassium_flag` varchar(25) DEFAULT NULL,
  `chloride` double(10,2) DEFAULT 0.00,
  `chloride_flag` varchar(25) DEFAULT NULL,
  `urea` double(10,2) DEFAULT 0.00,
  `urea_flag` varchar(25) DEFAULT NULL,
  `creatinine` double(10,2) DEFAULT 0.00,
  `creatinine_flag` varchar(25) DEFAULT NULL,
  `egfr` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bue_creatinine_egfr`
--

INSERT INTO `bue_creatinine_egfr` (`id`, `invoice_id`, `patient_id`, `sodium`, `sodium_flag`, `potassium`, `potassium_flag`, `chloride`, `chloride_flag`, `urea`, `urea_flag`, `creatinine`, `creatinine_flag`, `egfr`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-BUE-CRT-EGFR-420', 'LMLS-PAT-KB-0001', 7.00, 'Low', 0.00, 'High', 0.00, 'Low', 0.00, 'Low', 0.00, 'Low', 0.00, '', 'LMLS-0001', '2020-03-07 21:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `bue_creatinine_lft`
--

CREATE TABLE `bue_creatinine_lft` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `sodium` double(10,2) DEFAULT 0.00,
  `sodium_flag` varchar(25) DEFAULT NULL,
  `potassium` double(10,2) DEFAULT 0.00,
  `potassium_flag` varchar(25) DEFAULT NULL,
  `chloride` double(10,2) DEFAULT 0.00,
  `chloride_flag` varchar(25) DEFAULT NULL,
  `urea` double(10,2) DEFAULT 0.00,
  `urea_flag` varchar(25) DEFAULT NULL,
  `creatinine` double(10,2) DEFAULT 0.00,
  `creatinine_flag` varchar(25) DEFAULT NULL,
  `egfr` double(10,2) DEFAULT 0.00,
  `got_ast` double(10,2) DEFAULT 0.00,
  `got_ast_flag` varchar(25) DEFAULT NULL,
  `gpt_alt` double(10,2) DEFAULT 0.00,
  `gpt_alt_flag` varchar(25) DEFAULT NULL,
  `alkaline_phos` double(10,2) DEFAULT 0.00,
  `alkaline_phos_flag` varchar(25) DEFAULT NULL,
  `ggt` double(10,2) DEFAULT 0.00,
  `ggt_flag` varchar(25) DEFAULT NULL,
  `bilirubin_total` double(10,2) DEFAULT 0.00,
  `bilirubin_total_flag` varchar(25) DEFAULT NULL,
  `bili_indirect` double(10,2) DEFAULT 0.00,
  `bili_indirect_flag` varchar(25) DEFAULT NULL,
  `bilirubin_direct` double(10,2) DEFAULT 0.00,
  `bilirubin_direct_flag` varchar(25) DEFAULT NULL,
  `protein_total` double(10,2) DEFAULT 0.00,
  `protein_total_flag` varchar(25) DEFAULT NULL,
  `albumin` double(10,2) DEFAULT 0.00,
  `albumin_flag` varchar(25) DEFAULT NULL,
  `globulin` double(10,2) DEFAULT 0.00,
  `globulin_flag` varchar(25) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bue_creatinine_lft`
--

INSERT INTO `bue_creatinine_lft` (`id`, `invoice_id`, `patient_id`, `sodium`, `sodium_flag`, `potassium`, `potassium_flag`, `chloride`, `chloride_flag`, `urea`, `urea_flag`, `creatinine`, `creatinine_flag`, `egfr`, `got_ast`, `got_ast_flag`, `gpt_alt`, `gpt_alt_flag`, `alkaline_phos`, `alkaline_phos_flag`, `ggt`, `ggt_flag`, `bilirubin_total`, `bilirubin_total_flag`, `bili_indirect`, `bili_indirect_flag`, `bilirubin_direct`, `bilirubin_direct_flag`, `protein_total`, `protein_total_flag`, `albumin`, `albumin_flag`, `globulin`, `globulin_flag`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-BUE-LFT-440', 'LMLS-PAT-KB-0001', 1.00, '', 2.00, '', 3.00, '', 4.00, '', 5.00, '', 6.00, 7.00, 'High', 8.00, 'Low', 9.00, 'Low', 10.00, 'High', 11.00, 'High', 12.00, 'Low', 13.00, 'High', 14.00, 'Low', 15.00, 'High', 16.00, 'High', '', 'LMLS-0001', '2020-03-07 22:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `bue_creatinine_lipids`
--

CREATE TABLE `bue_creatinine_lipids` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `sodium` double(10,2) DEFAULT 0.00,
  `sodium_flag` varchar(25) DEFAULT NULL,
  `potassium` double(10,2) DEFAULT 0.00,
  `potassium_flag` varchar(25) DEFAULT NULL,
  `chloride` double(10,2) DEFAULT 0.00,
  `chloride_flag` varchar(25) DEFAULT NULL,
  `urea` double(10,2) DEFAULT 0.00,
  `urea_flag` varchar(25) DEFAULT NULL,
  `creatinine` double(10,2) DEFAULT 0.00,
  `creatinine_flag` varchar(25) DEFAULT NULL,
  `egfr` double(10,2) DEFAULT 0.00,
  `cholesterol_total` double(10,2) DEFAULT 0.00,
  `cholesterol_total_flag` varchar(25) DEFAULT NULL,
  `triglycerides` double(10,2) DEFAULT 0.00,
  `triglycerides_flag` varchar(25) DEFAULT NULL,
  `hdl` double(10,2) DEFAULT 0.00,
  `hdl_flag` varchar(25) DEFAULT NULL,
  `ldl` double(10,2) DEFAULT 0.00,
  `ldl_flag` varchar(25) DEFAULT NULL,
  `coronary_risk` double(10,2) DEFAULT 0.00,
  `coronary_risk_flag` varchar(25) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bue_creatinine_lipids`
--

INSERT INTO `bue_creatinine_lipids` (`id`, `invoice_id`, `patient_id`, `sodium`, `sodium_flag`, `potassium`, `potassium_flag`, `chloride`, `chloride_flag`, `urea`, `urea_flag`, `creatinine`, `creatinine_flag`, `egfr`, `cholesterol_total`, `cholesterol_total_flag`, `triglycerides`, `triglycerides_flag`, `hdl`, `hdl_flag`, `ldl`, `ldl_flag`, `coronary_risk`, `coronary_risk_flag`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-BUE-LPD-980', 'LMLS-PAT-KB-0001', 1.00, 'High', 2.00, 'High', 3.00, 'High', 4.00, 'High', 5.00, 'High', 6.00, 7.00, 'Low', 8.00, 'High', 9.00, 'Low', 10.00, 'High', 11.00, 'Low', 'M, ,dnc', 'LMLS-0001', '2020-03-07 23:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `calcium_profile`
--

CREATE TABLE `calcium_profile` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `s_calcium_total` double(10,2) DEFAULT 0.00,
  `s_calcium_total_flag` varchar(25) DEFAULT NULL,
  `s_ionized_calcium_calc` double(10,2) DEFAULT 0.00,
  `s_ionized_calcium_calc_flag` varchar(25) DEFAULT NULL,
  `s_albumin` double(10,2) DEFAULT 0.00,
  `s_albumin_flag` varchar(25) DEFAULT NULL,
  `s_total_protein` double(10,2) DEFAULT 0.00,
  `s_total_protein_flag` varchar(25) DEFAULT NULL,
  `corrected_calcium_calc` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calcium_profile`
--

INSERT INTO `calcium_profile` (`id`, `invoice_id`, `patient_id`, `s_calcium_total`, `s_calcium_total_flag`, `s_ionized_calcium_calc`, `s_ionized_calcium_calc_flag`, `s_albumin`, `s_albumin_flag`, `s_total_protein`, `s_total_protein_flag`, `corrected_calcium_calc`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-CALC-PRF-850', 'LMLS-PAT-KB-0001', 6.00, 'High', 7.00, 'High', 8.00, 'Low', 9.00, 'Low', 10.00, '.kljkhjghfg', 'LMLS-0001', '2020-03-08 00:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `cardiac_enzyme`
--

CREATE TABLE `cardiac_enzyme` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `ast` double(10,2) DEFAULT 0.00,
  `alt` double(10,2) DEFAULT 0.00,
  `creatinine_kinase` double(10,2) DEFAULT 0.00,
  `ck_mb` double(10,2) DEFAULT 0.00,
  `ldh` double(10,2) DEFAULT 0.00,
  `troponin` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardiac_enzyme`
--

INSERT INTO `cardiac_enzyme` (`id`, `invoice_id`, `patient_id`, `ast`, `alt`, `creatinine_kinase`, `ck_mb`, `ldh`, `troponin`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-CARD-ENZ-230', 'LMLS-PAT-KB-0001', 1.10, 2.10, 3.10, 4.10, 5.10, 6.10, 'Sdfghjkl', 'LMLS-0001', '2020-03-08 01:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `ca_one_five_three`
--

CREATE TABLE `ca_one_five_three` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ca_one_five_three`
--

INSERT INTO `ca_one_five_three` (`id`, `invoice_id`, `patient_id`, `results`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-CA-125-430', 'LMLS-PAT-KB-0002', 2.50, 'Kjkhgfd', 'LMLS-0001', '2020-03-09 10:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `ca_one_two_five`
--

CREATE TABLE `ca_one_two_five` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ca_one_two_five`
--

INSERT INTO `ca_one_two_five` (`id`, `invoice_id`, `patient_id`, `results`, `comments`, `added_by`, `date_added`) VALUES
(4, 'INV-CA-153-761', 'LMLS-PAT-KB-0002', 3.10, 'Lkjhgf', 'LMLS-0001', '2020-03-09 10:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `cd4_count`
--

CREATE TABLE `cd4_count` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `t_wbc` double(10,2) DEFAULT 0.00,
  `t_wbc_flag` varchar(10) DEFAULT NULL,
  `cd4_count` double(10,2) DEFAULT 0.00,
  `cd4_count_flag` varchar(10) DEFAULT NULL,
  `cd3` double(10,2) DEFAULT 0.00,
  `cd3_flag` varchar(10) DEFAULT NULL,
  `cd4_cd3` double(10,2) DEFAULT 0.00,
  `cd4_cd3_flag` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cd4_count`
--

INSERT INTO `cd4_count` (`id`, `invoice_id`, `patient_id`, `t_wbc`, `t_wbc_flag`, `cd4_count`, `cd4_count_flag`, `cd3`, `cd3_flag`, `cd4_cd3`, `cd4_cd3_flag`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-CD4-CNT-560', 'LMLS-PAT-KB-0001', 1.00, 'Low', 2.00, 'Low', 3.00, 'High', 4.00, 'High', 'Lkljkhbn', 'LMLS-0001', '2020-03-08 14:23:43'),
(4, 'INV-CD4-CNT-231', 'LMLS-PAT-KB-0003', 2.80, 'High', 410.90, 'High', 0.00, '', 0.00, '', '', 'LMLS-0001', '2020-03-18 10:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `cea`
--

CREATE TABLE `cea` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cea`
--

INSERT INTO `cea` (`id`, `invoice_id`, `patient_id`, `results`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-CEA-730', 'LMLS-PAT-KB-0002', 32.00, 'Fghjm,', 'LMLS-0001', '2020-03-09 11:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(14) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `type`, `amount`, `date_added`, `added_by`) VALUES
(1, 'Amylase', 60.00, '2020-03-15 22:02:43', 'LMLS-0001'),
(2, 'Albumin', 30.00, '2020-03-15 22:03:07', 'LMLS-0001'),
(3, 'B2 Microalbumin', 130.00, '2020-03-15 22:04:05', 'LMLS-0001'),
(4, 'Bence Jones Protein', 60.00, '2020-03-15 22:04:39', 'LMLS-0001'),
(5, 'Bue Creatinine', 60.00, '2020-03-15 22:05:27', 'LMLS-0001'),
(6, 'Cardiac Enzymes', 180.00, '2020-03-15 22:06:49', 'LMLS-0001'),
(7, 'Ck', 45.00, '2020-03-15 22:07:17', 'LMLS-0001'),
(8, 'Ck-mb', 45.00, '2020-03-15 22:08:01', 'LMLS-0001'),
(9, 'Creatinine Clearance', 80.00, '2020-03-15 22:08:34', 'LMLS-0001'),
(10, 'Csf Biochem', 60.00, '2020-03-15 22:09:14', 'LMLS-0001'),
(11, 'Direct Bilirubin', 35.00, '2020-03-15 22:09:36', 'LMLS-0001'),
(12, 'Faecal Reducing Substance', 30.00, '2020-03-15 22:10:11', 'LMLS-0001'),
(13, 'Fasting Lipids', 60.00, '2020-03-15 22:10:39', 'LMLS-0001'),
(14, 'Fasting Random Blood Glucose', 25.00, '2020-03-15 22:13:04', 'LMLS-0001'),
(15, 'Ferritin', 80.00, '2020-03-15 22:13:51', 'LMLS-0001'),
(16, 'Folate Serum', 120.00, '2020-03-15 22:14:11', 'LMLS-0001'),
(17, 'Free Light Chains', 300.00, '2020-03-15 22:15:01', 'LMLS-0001'),
(18, 'Hba1c', 60.00, '2020-03-15 22:15:30', 'LMLS-0001'),
(19, 'Immunoglobulin', 210.00, '2020-03-15 22:17:08', 'LMLS-0001'),
(20, 'Iron + Transferrin', 120.00, '2020-03-15 22:18:05', 'LMLS-0001'),
(21, 'Lactate', 100.00, '2020-03-15 22:18:59', 'LMLS-0001'),
(22, 'Ldh', 50.00, '2020-03-15 22:19:22', 'LMLS-0001'),
(23, 'Lft', 60.00, '2020-03-15 22:19:50', 'LMLS-0001'),
(24, 'Lipase', 60.00, '2020-03-15 22:21:31', 'LMLS-0001'),
(25, 'Magnessium', 40.00, '2020-03-15 22:22:13', 'LMLS-0001'),
(26, 'Phosphate', 40.00, '2020-03-15 22:22:31', 'LMLS-0001'),
(27, 'Pleural Ascitic Synovial Fluid', 150.00, '2020-03-15 22:23:26', 'LMLS-0001'),
(28, 'Protein Electrophoresis', 180.00, '2020-03-15 22:23:55', 'LMLS-0001'),
(29, 'Serum Calcium Corrected', 70.00, '2020-03-15 22:24:57', 'LMLS-0001'),
(30, 'Serum Calcium Ionised', 70.00, '2020-03-15 22:25:15', 'LMLS-0001'),
(31, 'Serum Iron', 60.00, '2020-03-15 22:25:37', 'LMLS-0001'),
(32, 'Total Protein', 30.00, '2020-03-15 22:26:07', 'LMLS-0001'),
(33, 'Total Bilirubin', 35.00, '2020-03-15 22:26:33', 'LMLS-0001'),
(34, 'Transferrin', 70.00, '2020-03-15 22:27:10', 'LMLS-0001'),
(35, 'Troponin I', 100.00, '2020-03-15 22:27:35', 'LMLS-0001'),
(36, 'Troponin T', 120.00, '2020-03-15 22:27:49', 'LMLS-0001'),
(37, '24hr Ogtt', 120.00, '2020-03-15 22:30:51', 'LMLS-0001'),
(38, '24hr Post Prandial Glucose', 60.00, '2020-03-15 22:31:49', 'LMLS-0001'),
(39, '24hr Urine Protein', 120.00, '2020-03-15 22:32:16', 'LMLS-0001'),
(40, '24hr Vma', 830.00, '2020-03-15 22:32:41', 'LMLS-0001'),
(41, 'U - Micro Albumin Creatinine Ratio', 120.00, '2020-03-15 22:34:25', 'LMLS-0001'),
(42, 'Uric Acid', 40.00, '2020-03-15 22:35:04', 'LMLS-0001'),
(43, 'Urine Reducing Substance', 30.00, '2020-03-15 22:35:29', 'LMLS-0001'),
(44, 'Vitamin B12', 150.00, '2020-03-15 22:35:49', 'LMLS-0001'),
(45, 'Bf For Mps', 20.00, '2020-03-15 22:36:37', 'LMLS-0001'),
(46, 'Blood Group + Rh Antigen', 25.00, '2020-03-15 22:37:24', 'LMLS-0001'),
(47, 'Direct Anti Human Globulin', 50.00, '2020-03-15 22:37:48', 'LMLS-0001'),
(48, 'Esr', 30.00, '2020-03-15 22:38:13', 'LMLS-0001'),
(49, 'Fbc + Blood Film Comment', 70.00, '2020-03-15 22:38:38', 'LMLS-0001'),
(50, 'Full Blood Count (fbc)', 40.00, '2020-03-15 22:39:07', 'LMLS-0001'),
(51, 'G6pd Qualitative', 30.00, '2020-03-15 22:40:04', 'LMLS-0001'),
(52, 'Hb Electrophoresis', 45.00, '2020-03-15 22:40:31', 'LMLS-0001'),
(53, 'Indirect Anti Human Globulin', 40.00, '2020-03-15 22:40:56', 'LMLS-0001'),
(54, 'Mononucleosis Spot - Paul Bunnel', 50.00, '2020-03-15 22:41:41', 'LMLS-0001'),
(55, 'Reticulocytes Count', 40.00, '2020-03-15 22:42:05', 'LMLS-0001'),
(56, 'Sickling Test', 25.00, '2020-03-15 22:42:24', 'LMLS-0001'),
(57, 'Trophozoites Count', 30.00, '2020-03-15 22:43:04', 'LMLS-0001'),
(58, 'Anti Ccp', 170.00, '2020-03-15 22:43:55', 'LMLS-0001'),
(59, 'Anti Thrombin Iii Functional', 140.00, '2020-03-15 22:44:44', 'LMLS-0001'),
(60, 'Bleeding Time', 30.00, '2020-03-15 22:45:14', 'LMLS-0001'),
(61, 'Clotting Profile', 70.00, '2020-03-15 22:45:33', 'LMLS-0001'),
(62, 'Clotting Time', 25.00, '2020-03-15 22:45:52', 'LMLS-0001'),
(63, 'D - Dimer', 80.00, '2020-03-15 22:46:17', 'LMLS-0001'),
(64, 'Factor 8', 150.00, '2020-03-15 22:46:39', 'LMLS-0001'),
(65, 'Factor 9', 150.00, '2020-03-15 22:46:51', 'LMLS-0001'),
(66, 'Fibrinogen', 130.00, '2020-03-15 22:47:20', 'LMLS-0001'),
(67, 'Protein C', 150.00, '2020-03-15 22:47:56', 'LMLS-0001'),
(68, 'Protein S', 190.00, '2020-03-15 22:48:07', 'LMLS-0001'),
(69, 'Prothrombin Time (pt) - Inr', 30.00, '2020-03-15 22:49:07', 'LMLS-0001'),
(70, 'Thromboplastin Time (aptt)', 40.00, '2020-03-15 22:49:45', 'LMLS-0001'),
(71, 'Von Willibrands Factor', 400.00, '2020-03-15 22:50:03', 'LMLS-0001'),
(72, 'Blood C/s', 70.00, '2020-03-16 09:16:33', 'LMLS-0001'),
(73, 'Cervical Swab For C/s', 60.00, '2020-03-16 09:17:05', 'LMLS-0001'),
(74, 'Corneal Scrapping For C/s', 60.00, '2020-03-16 09:18:10', 'LMLS-0001'),
(75, 'Csf Bacteriology', 65.00, '2020-03-16 09:18:44', 'LMLS-0001'),
(76, 'Ear Swab For C/s', 60.00, '2020-03-16 09:19:59', 'LMLS-0001'),
(77, 'Eye Swab For C/s', 60.00, '2020-03-16 09:20:25', 'LMLS-0001'),
(78, 'Endocervical Swab For C/s', 60.00, '2020-03-16 09:21:22', 'LMLS-0001'),
(79, 'H. Pylori Antibodies', 80.00, '2020-03-16 09:24:17', 'LMLS-0001'),
(80, 'H. Pylori Antigen', 80.00, '2020-03-16 09:24:26', 'LMLS-0001'),
(81, 'Hvs C/s', 60.00, '2020-03-16 09:28:38', 'LMLS-0001'),
(82, 'Hvs R/e', 30.00, '2020-03-16 09:29:17', 'LMLS-0001'),
(83, 'Semen C/s', 80.00, '2020-03-16 09:29:47', 'LMLS-0001'),
(84, 'Skin Scraping For Culture', 60.00, '2020-03-16 09:30:49', 'LMLS-0001'),
(85, 'Skin Scraping For Fungal Elements', 40.00, '2020-03-16 09:31:05', 'LMLS-0001'),
(86, 'Stool C/s', 60.00, '2020-03-16 09:31:43', 'LMLS-0001'),
(87, 'Stool For Rota And Adnoviruses', 120.00, '2020-03-16 09:32:11', 'LMLS-0001'),
(88, 'Stool Occult Blood Test', 40.00, '2020-03-16 09:32:35', 'LMLS-0001'),
(89, 'Stool R/e', 20.00, '2020-03-16 09:44:55', 'LMLS-0001'),
(90, 'Sputum For Afb', 40.00, '2020-03-16 09:45:30', 'LMLS-0001'),
(91, 'Sputum For C/s', 60.00, '2020-03-16 09:45:46', 'LMLS-0001'),
(92, 'Throat Swab For C/s', 60.00, '2020-03-16 09:46:17', 'LMLS-0001'),
(93, 'Urethral Swab For C/s', 60.00, '2020-03-16 09:47:02', 'LMLS-0001'),
(94, 'Urethral Swab For Gram Stain', 40.00, '2020-03-16 09:47:12', 'LMLS-0001'),
(95, 'Urine C/s', 60.00, '2020-03-16 09:47:40', 'LMLS-0001'),
(96, 'Urine R/e', 25.00, '2020-03-16 09:47:50', 'LMLS-0001'),
(97, 'Widal Test', 35.00, '2020-03-16 09:48:19', 'LMLS-0001'),
(98, 'Wound Swab For C/s', 60.00, '2020-03-16 09:49:23', 'LMLS-0001'),
(99, 'Anti Streptolysin O', 54.00, '2020-03-16 09:50:34', 'LMLS-0001'),
(100, 'Bilhazia Antibody (igg And Igm)', 180.00, '2020-03-16 09:51:23', 'LMLS-0001'),
(101, 'Bilhazia Antigen Urine Serum', 100.00, '2020-03-16 09:51:49', 'LMLS-0001'),
(102, 'Chlamydia Abs', 125.00, '2020-03-16 09:52:42', 'LMLS-0001'),
(103, 'Cmv - Iga And Igm', 200.00, '2020-03-16 09:53:19', 'LMLS-0001'),
(104, 'Gonorrhoea Ab', 50.00, '2020-03-16 09:53:41', 'LMLS-0001'),
(105, 'Hepatitis A', 80.00, '2020-03-16 09:54:07', 'LMLS-0001'),
(106, 'Hepatitis B Profile', 170.00, '2020-03-16 09:54:27', 'LMLS-0001'),
(107, 'Hepatitis B Screen', 40.00, '2020-03-16 09:54:46', 'LMLS-0001'),
(108, 'Hepatitis B Viral Load', 500.00, '2020-03-16 09:55:08', 'LMLS-0001'),
(109, 'Hepatitis C Screen', 40.00, '2020-03-16 09:55:33', 'LMLS-0001'),
(110, 'Hepatitis C Viral Load', 620.00, '2020-03-16 09:56:01', 'LMLS-0001'),
(111, 'Hiv Viral Load', 550.00, '2020-03-16 09:56:42', 'LMLS-0001'),
(112, 'Retro Screen', 35.00, '2020-03-16 09:57:08', 'LMLS-0001'),
(113, 'Retro Screen Confirmation', 70.00, '2020-03-16 09:57:38', 'LMLS-0001'),
(114, 'Rubella Igg And Igm', 200.00, '2020-03-16 09:58:08', 'LMLS-0001'),
(115, 'Syphilis Profile Vdrl T. Pallidium Igg And Igm', 120.00, '2020-03-16 09:59:00', 'LMLS-0001'),
(116, 'T. Pallidium Latex', 45.00, '2020-03-16 09:59:41', 'LMLS-0001'),
(117, 'T. Pallidium Antibody', 60.00, '2020-03-16 09:59:54', 'LMLS-0001'),
(118, 'Toxo - Igg And Igm', 150.00, '2020-03-16 10:00:19', 'LMLS-0001'),
(119, 'Vdrl', 40.00, '2020-03-16 10:00:49', 'LMLS-0001'),
(120, 'Thyroid Function Test', 180.00, '2020-03-16 10:01:41', 'LMLS-0001'),
(121, 'Tsh', 60.00, '2020-03-16 10:02:08', 'LMLS-0001'),
(122, 'Ft3', 60.00, '2020-03-16 10:02:28', 'LMLS-0001'),
(123, 'Ft4', 60.00, '2020-03-16 10:02:45', 'LMLS-0001'),
(124, 'Thyroglobin Antibody', 190.00, '2020-03-16 10:03:06', 'LMLS-0001'),
(125, 'Thyroid Auto Antibodies', 170.00, '2020-03-16 10:03:29', 'LMLS-0001'),
(126, 'Tsh Releasing Receptors Antibody', 200.00, '2020-03-16 10:05:00', 'LMLS-0001'),
(127, '24hr Urine Cortisol', 420.00, '2020-03-16 10:10:23', 'LMLS-0001'),
(128, 'Acetylcholine Receptor Antibody', 345.00, '2020-03-16 10:12:57', 'LMLS-0001'),
(129, 'Aldenocortitropic Hormone (acth)', 130.00, '2020-03-16 10:19:21', 'LMLS-0000'),
(130, 'Aldosterone', 90.00, '2020-03-16 10:20:01', 'LMLS-0000'),
(131, 'Angiotensin Converting Enzymes (ace)', 70.00, '2020-03-16 10:20:38', 'LMLS-0000'),
(132, 'Antimulerian Hormone', 300.00, '2020-03-16 10:21:30', 'LMLS-0000'),
(133, 'Cortisol (blood)', 80.00, '2020-03-16 10:21:50', 'LMLS-0000'),
(134, 'Dheas', 90.00, '2020-03-16 10:22:09', 'LMLS-0000'),
(135, 'Estrogen', 65.00, '2020-03-16 10:22:36', 'LMLS-0000'),
(136, 'Estrol - E3', 75.00, '2020-03-16 10:23:12', 'LMLS-0000'),
(137, 'Female Fertility Hormonal Assay', 390.00, '2020-03-16 10:23:36', 'LMLS-0000'),
(138, 'Male Fertility Hormonal Assay', 325.00, '2020-03-16 10:24:00', 'LMLS-0000'),
(139, 'Free Testosterone', 150.00, '2020-03-16 10:24:28', 'LMLS-0000'),
(140, 'Fsh', 65.00, '2020-03-16 10:24:50', 'LMLS-0000'),
(141, 'Growth Hormone (fasting/random)', 90.00, '2020-03-16 10:25:46', 'LMLS-0000'),
(142, 'Lh', 65.00, '2020-03-16 10:26:48', 'LMLS-0000'),
(143, 'Oestradiol', 65.00, '2020-03-16 10:27:22', 'LMLS-0000'),
(144, 'Parathyroid Hormone (pth)', 120.00, '2020-03-16 10:27:45', 'LMLS-0000'),
(145, 'Progesterone', 65.00, '2020-03-16 10:28:27', 'LMLS-0000'),
(146, 'Prolactin', 65.00, '2020-03-16 10:28:45', 'LMLS-0000'),
(147, 'Semen Analysis', 70.00, '2020-03-16 10:29:10', 'LMLS-0000'),
(148, 'Semen Antibodies', 120.00, '2020-03-16 10:29:51', 'LMLS-0000'),
(149, 'Sex Hormone Binding Globulin', 100.00, '2020-03-16 10:31:35', 'LMLS-0000'),
(150, 'Testosterone', 65.00, '2020-03-16 10:32:12', 'LMLS-0000'),
(151, 'Afp', 80.00, '2020-03-16 10:32:37', 'LMLS-0000'),
(152, 'Ca - 125', 80.00, '2020-03-16 10:33:24', 'LMLS-0000'),
(153, 'Ca - 15.3', 120.00, '2020-03-16 10:33:47', 'LMLS-0000'),
(154, 'Ca - 19.9', 120.00, '2020-03-16 10:34:00', 'LMLS-0000'),
(155, 'Cea', 80.00, '2020-03-16 10:34:54', 'LMLS-0000'),
(156, 'Crp', 60.00, '2020-03-16 10:36:24', 'LMLS-0000'),
(157, 'Psa', 65.00, '2020-03-16 10:37:00', 'LMLS-0000'),
(158, 'Total Bhcg - Blood Qualitative', 100.00, '2020-03-16 10:37:25', 'LMLS-0000'),
(159, '17 Oh Progesterone', 120.00, '2020-03-16 10:42:22', 'LMLS-0000'),
(160, 'Bicarbonate', 40.00, '2020-03-16 20:49:02', 'LMLS-0000'),
(161, 'Obstetric Scan', 40.00, '2020-06-11 22:20:20', 'LMLS-0001'),
(162, 'Pelvic Scan Gynaecology', 50.00, '2020-06-11 22:20:36', 'LMLS-0001'),
(163, 'Pelvic Scan Urology', 60.00, '2020-06-11 22:20:50', 'LMLS-0001'),
(164, 'Abdominal Scan', 80.00, '2020-06-11 22:21:26', 'LMLS-0001'),
(165, 'Abdomino Pelvic Scan', 100.00, '2020-06-11 22:22:46', 'LMLS-0001'),
(166, 'Prostate Scan', 60.00, '2020-06-11 22:23:04', 'LMLS-0001'),
(167, 'Thyroid Scan Anterior Neck Swelling', 80.00, '2020-06-11 22:23:26', 'LMLS-0001'),
(168, 'Breast Scan', 80.00, '2020-06-11 22:23:40', 'LMLS-0001'),
(169, 'Scrotal Scan', 80.00, '2020-06-11 22:24:09', 'LMLS-0001'),
(170, 'Superficial Swellings', 80.00, '2020-06-11 22:24:22', 'LMLS-0001'),
(171, 'Other Small Parts', 80.00, '2020-06-11 22:24:36', 'LMLS-0001');

-- --------------------------------------------------------

--
-- Table structure for table `ckmb`
--

CREATE TABLE `ckmb` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ckmb`
--

INSERT INTO `ckmb` (`id`, `invoice_id`, `patient_id`, `results`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-CKMB-500', 'LMLS-PAT-KB-0002', 4.00, 'Kjhgfd', 'LMLS-0001', '2020-03-09 11:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `clotting_profile`
--

CREATE TABLE `clotting_profile` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `bt` double(10,2) DEFAULT 0.00,
  `pt_inr` double(10,2) DEFAULT 0.00,
  `aptt` double(10,2) DEFAULT 0.00,
  `control_time` double(10,2) DEFAULT 0.00,
  `normal_plasma` double(10,2) DEFAULT 0.00,
  `ratio` double(10,2) DEFAULT 0.00,
  `inr` double(10,2) DEFAULT 0.00,
  `factor_viii_assay` double(10,2) DEFAULT 0.00,
  `factor_ix_activity` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `compact_chemistry`
--

CREATE TABLE `compact_chemistry` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `sodium` double(10,2) DEFAULT 0.00,
  `sodium_flag` varchar(25) DEFAULT NULL,
  `potassium` double(10,2) DEFAULT 0.00,
  `potassium_flag` varchar(25) DEFAULT NULL,
  `chloride` double(10,2) DEFAULT 0.00,
  `chloride_flag` varchar(25) DEFAULT NULL,
  `urea` double(10,2) DEFAULT 0.00,
  `urea_flag` varchar(25) DEFAULT NULL,
  `creatinine` double(10,2) DEFAULT 0.00,
  `creatinine_flag` varchar(25) DEFAULT NULL,
  `got_ast` double(10,2) DEFAULT 0.00,
  `got_ast_flag` varchar(25) DEFAULT NULL,
  `gpt_alt` double(10,2) DEFAULT 0.00,
  `gpt_alt_flag` varchar(25) DEFAULT NULL,
  `alkaline_phos` double(10,2) DEFAULT 0.00,
  `alkaline_phos_flag` varchar(25) DEFAULT NULL,
  `ggt` double(10,2) DEFAULT 0.00,
  `ggt_flag` varchar(25) DEFAULT NULL,
  `bilirubin_total` double(10,2) DEFAULT 0.00,
  `bilirubin_total_flag` varchar(25) DEFAULT NULL,
  `bili_indirect` double(10,2) DEFAULT 0.00,
  `bili_indirect_flag` varchar(25) DEFAULT NULL,
  `bilirubin_direct` double(10,2) DEFAULT 0.00,
  `bilirubin_direct_flag` varchar(25) DEFAULT NULL,
  `protein_total` double(10,2) DEFAULT 0.00,
  `protein_total_flag` varchar(25) DEFAULT NULL,
  `albumin` double(10,2) DEFAULT 0.00,
  `albumin_flag` varchar(25) DEFAULT NULL,
  `globulin` double(10,2) DEFAULT 0.00,
  `globulin_flag` varchar(25) DEFAULT NULL,
  `cholesterol_total` double(10,2) DEFAULT 0.00,
  `cholesterol_total_flag` varchar(25) DEFAULT NULL,
  `triglycerides` double(10,2) DEFAULT 0.00,
  `triglycerides_flag` varchar(25) DEFAULT NULL,
  `hdl` double(10,2) DEFAULT 0.00,
  `hdl_flag` varchar(25) DEFAULT NULL,
  `ldl` double(10,2) DEFAULT 0.00,
  `ldl_flag` varchar(25) DEFAULT NULL,
  `coronary_risk` double(10,2) DEFAULT 0.00,
  `coronary_risk_flag` varchar(25) DEFAULT NULL,
  `uric_acid` double(10,2) DEFAULT 0.00,
  `uric_acid_flag` varchar(25) DEFAULT NULL,
  `fbs` double(10,2) DEFAULT 0.00,
  `fbs_flag` varchar(25) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compact_chemistry`
--

INSERT INTO `compact_chemistry` (`id`, `invoice_id`, `patient_id`, `sodium`, `sodium_flag`, `potassium`, `potassium_flag`, `chloride`, `chloride_flag`, `urea`, `urea_flag`, `creatinine`, `creatinine_flag`, `got_ast`, `got_ast_flag`, `gpt_alt`, `gpt_alt_flag`, `alkaline_phos`, `alkaline_phos_flag`, `ggt`, `ggt_flag`, `bilirubin_total`, `bilirubin_total_flag`, `bili_indirect`, `bili_indirect_flag`, `bilirubin_direct`, `bilirubin_direct_flag`, `protein_total`, `protein_total_flag`, `albumin`, `albumin_flag`, `globulin`, `globulin_flag`, `cholesterol_total`, `cholesterol_total_flag`, `triglycerides`, `triglycerides_flag`, `hdl`, `hdl_flag`, `ldl`, `ldl_flag`, `coronary_risk`, `coronary_risk_flag`, `uric_acid`, `uric_acid_flag`, `fbs`, `fbs_flag`, `comments`, `added_by`, `date_added`) VALUES
(4, 'INV-COMP-CHE-370', 'LMLS-PAT-KB-0001', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 1.00, 'Low', 2.00, 'Low', 3.00, 'High', 4.00, 'High', 5.00, 'High', 1.00, 'Low', 1.10, 'High', '', 'LMLS-0001', '2020-03-08 01:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `cortisol`
--

CREATE TABLE `cortisol` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `cortisol_top` double(10,2) DEFAULT 0.00,
  `cortisol_bottom` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cortisol`
--

INSERT INTO `cortisol` (`id`, `invoice_id`, `patient_id`, `cortisol_top`, `cortisol_bottom`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-CRTL-230', 'LMLS-PAT-KB-0002', 1.30, 1.20, 'Hjgfd', 'LMLS-0001', '2020-03-09 12:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `crp`
--

CREATE TABLE `crp` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crp`
--

INSERT INTO `crp` (`id`, `invoice_id`, `patient_id`, `results`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-CRP-480', 'LMLS-PAT-KB-0002', 9.50, '.kljkhjghvbcv', 'LMLS-0001', '2020-03-09 11:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `crp_ultra_sensitive`
--

CREATE TABLE `crp_ultra_sensitive` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crp_ultra_sensitive`
--

INSERT INTO `crp_ultra_sensitive` (`id`, `invoice_id`, `patient_id`, `results`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-CRP-ULT-SEN-150', 'LMLS-PAT-KB-0002', 6.40, 'Hjgf', 'LMLS-0001', '2020-03-09 11:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `csf_biochem`
--

CREATE TABLE `csf_biochem` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `appearance` text DEFAULT NULL,
  `glucose` double(10,2) DEFAULT 0.00,
  `protein` double(10,2) DEFAULT 0.00,
  `globulin` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csf_biochem`
--

INSERT INTO `csf_biochem` (`id`, `invoice_id`, `patient_id`, `appearance`, `glucose`, `protein`, `globulin`, `comments`, `added_by`, `date_added`) VALUES
(4, 'INV-CSF-BIO-920', 'LMLS-PAT-KB-0001', 'Blood Stain', 0.00, 0.00, 'Negative', '', 'LMLS-0001', '2020-03-08 00:40:43'),
(5, 'INV-CSF-BIO-921', 'LMLS-PAT-KB-0001', 'Bloody', 5.00, 10.00, 'Present(+2)', 'Jkhgfd', 'LMLS-0001', '2020-03-08 00:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `c_reactive_protein`
--

CREATE TABLE `c_reactive_protein` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_reactive_protein`
--

INSERT INTO `c_reactive_protein` (`id`, `invoice_id`, `patient_id`, `results`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-C-REAC-PRO-730', 'LMLS-PAT-KB-0001', 1.00, 'Jhjghgfdds', 'LMLS-0001', '2020-03-08 00:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `d_dimers`
--

CREATE TABLE `d_dimers` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ear_swab_cs`
--

CREATE TABLE `ear_swab_cs` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `bacteria_three` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `antibiotics_seventeen` text DEFAULT NULL,
  `antibiotics_eighteen` text DEFAULT NULL,
  `antibiotics_nineteen` text DEFAULT NULL,
  `antibiotics_twenty` text DEFAULT NULL,
  `antibiotics_twenty_one` text DEFAULT NULL,
  `antibiotics_twenty_two` text DEFAULT NULL,
  `antibiotics_twenty_three` text DEFAULT NULL,
  `antibiotics_twenty_four` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `sensitivity_seventeen` text DEFAULT NULL,
  `sensitivity_eighteen` text DEFAULT NULL,
  `sensitivity_nineteen` text DEFAULT NULL,
  `sensitivity_twenty` text DEFAULT NULL,
  `sensitivity_twenty_one` text DEFAULT NULL,
  `sensitivity_twenty_two` text DEFAULT NULL,
  `sensitivity_twenty_three` text DEFAULT NULL,
  `sensitivity_twenty_four` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ear_swab_cs`
--

INSERT INTO `ear_swab_cs` (`id`, `invoice_id`, `patient_id`, `culture`, `bacteria_one`, `bacteria_two`, `bacteria_three`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `antibiotics_seventeen`, `antibiotics_eighteen`, `antibiotics_nineteen`, `antibiotics_twenty`, `antibiotics_twenty_one`, `antibiotics_twenty_two`, `antibiotics_twenty_three`, `antibiotics_twenty_four`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `sensitivity_seventeen`, `sensitivity_eighteen`, `sensitivity_nineteen`, `sensitivity_twenty`, `sensitivity_twenty_one`, `sensitivity_twenty_two`, `sensitivity_twenty_three`, `sensitivity_twenty_four`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-EAR-SCS-540', 'LMLS-PAT-KB-0002', 'Heavily Mixed Growth, Please Repeat', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'S', 'S', 'S', 'S', 'R', 'R', 'R', 'R', 'S', 'S', 'S', 'S', 'R', 'R', 'R', 'R', 'S', 'S', 'S', 'S', 'R', 'R', 'R', 'R', 'Sample Comment', 'LMLS-0001', '2020-03-06 21:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `endocervical_swab_cs`
--

CREATE TABLE `endocervical_swab_cs` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `pus_cells_per_hps` double(10,2) DEFAULT 0.00,
  `rbcs_per_hpf` double(10,2) DEFAULT 0.00,
  `epitheleal_cells_per_hpf` double(10,2) DEFAULT 0.00,
  `t_vaginalis` text DEFAULT NULL,
  `yeast_like_cells` text DEFAULT NULL,
  `gram_stain` text DEFAULT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `endocervical_swab_cs`
--

INSERT INTO `endocervical_swab_cs` (`id`, `invoice_id`, `patient_id`, `pus_cells_per_hps`, `rbcs_per_hpf`, `epitheleal_cells_per_hpf`, `t_vaginalis`, `yeast_like_cells`, `gram_stain`, `culture`, `bacteria_one`, `bacteria_two`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-ENDO-SCS-560', 'LMLS-PAT-KB-0002', 1.00, 2.00, 3.00, 'Not Seen', 'Present(+)', 'No GNID Seen', 'No Significant Growth', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'R', 'R', 'R', 'R', 'S', 'S', 'S', 'S', 'R', 'R', 'R', 'R', 'S', 'S', 'S', 'S', 'Vgjhuytygh', 'LMLS-0001', '2020-03-06 22:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `esr`
--

CREATE TABLE `esr` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estrogen`
--

CREATE TABLE `estrogen` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `follicular` double(10,2) DEFAULT 0.00,
  `mid_cycle` double(10,2) DEFAULT 0.00,
  `luteal` double(10,2) DEFAULT 0.00,
  `pm` double(10,2) DEFAULT 0.00,
  `amenorrhoea` double(10,2) DEFAULT 0.00,
  `mem` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estrogen`
--

INSERT INTO `estrogen` (`id`, `invoice_id`, `patient_id`, `follicular`, `mid_cycle`, `luteal`, `pm`, `amenorrhoea`, `mem`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-ESTROGEN-200', 'LMLS-PAT-KB-0003', 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, '', 'LMLS-0001', '2020-03-05 12:31:10'),
(4, 'INV-ESTROGEN-401', 'LMLS-PAT-KB-0003', 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, '', 'LMLS-0001', '2020-03-05 12:31:47'),
(5, 'INV-EST-662', 'LMLS-PAT-KB-0002', 1.00, 2.00, 3.00, 4.00, 5.00, 6.00, 'L;kujyutyfgd', 'LMLS-0001', '2020-03-09 13:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `eye_swab_cs`
--

CREATE TABLE `eye_swab_cs` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `bacteria_three` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `antibiotics_seventeen` text DEFAULT NULL,
  `antibiotics_eighteen` text DEFAULT NULL,
  `antibiotics_nineteen` text DEFAULT NULL,
  `antibiotics_twenty` text DEFAULT NULL,
  `antibiotics_twenty_one` text DEFAULT NULL,
  `antibiotics_twenty_two` text DEFAULT NULL,
  `antibiotics_twenty_three` text DEFAULT NULL,
  `antibiotics_twenty_four` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `sensitivity_seventeen` text DEFAULT NULL,
  `sensitivity_eighteen` text DEFAULT NULL,
  `sensitivity_nineteen` text DEFAULT NULL,
  `sensitivity_twenty` text DEFAULT NULL,
  `sensitivity_twenty_one` text DEFAULT NULL,
  `sensitivity_twenty_two` text DEFAULT NULL,
  `sensitivity_twenty_three` text DEFAULT NULL,
  `sensitivity_twenty_four` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eye_swab_cs`
--

INSERT INTO `eye_swab_cs` (`id`, `invoice_id`, `patient_id`, `culture`, `bacteria_one`, `bacteria_two`, `bacteria_three`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `antibiotics_seventeen`, `antibiotics_eighteen`, `antibiotics_nineteen`, `antibiotics_twenty`, `antibiotics_twenty_one`, `antibiotics_twenty_two`, `antibiotics_twenty_three`, `antibiotics_twenty_four`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `sensitivity_seventeen`, `sensitivity_eighteen`, `sensitivity_nineteen`, `sensitivity_twenty`, `sensitivity_twenty_one`, `sensitivity_twenty_two`, `sensitivity_twenty_three`, `sensitivity_twenty_four`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-EYE-SCS-100', 'LMLS-PAT-KB-0002', 'No Bacterial Growth', 'Acinetobacter SPP', '', '', 'Amikacin', '', '', '', 'Amikacin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Amikacin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Kjhgfd', 'LMLS-0001', '2020-03-06 22:10:42'),
(3, 'INV-EYE-SCS-721', 'LMLS-PAT-KB-0002', 'No Significant Growth', 'Acinetobacter SPP', '', '', 'Amikacin', 'Amikacin', 'Amikacin', 'Amikacin', 'Amikacin', 'Ampicillin', 'Amikacin', 'Amikacin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'LMLS-0001', '2020-03-06 22:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `fbc_3p`
--

CREATE TABLE `fbc_3p` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `wbc` double(10,2) DEFAULT 0.00,
  `wbc_info` varchar(25) DEFAULT NULL,
  `lym` double(10,2) DEFAULT 0.00,
  `lym_info` varchar(25) DEFAULT NULL,
  `mid` double(10,2) DEFAULT 0.00,
  `mid_info` varchar(25) DEFAULT NULL,
  `gran` double(10,2) DEFAULT 0.00,
  `gran_info` varchar(25) DEFAULT NULL,
  `lym_one` double(10,2) DEFAULT 0.00,
  `lym_one_info` varchar(25) DEFAULT NULL,
  `mid_two` double(10,2) DEFAULT 0.00,
  `mid_two_info` varchar(25) DEFAULT NULL,
  `gran_three` double(10,2) DEFAULT 0.00,
  `gran_three_info` varchar(25) DEFAULT NULL,
  `rbc` double(10,2) DEFAULT 0.00,
  `rbc_info` varchar(25) DEFAULT NULL,
  `hgb` double(10,2) DEFAULT 0.00,
  `hgb_info` varchar(25) DEFAULT NULL,
  `hct` double(10,2) DEFAULT 0.00,
  `hct_info` varchar(25) DEFAULT NULL,
  `mcv` double(10,2) DEFAULT 0.00,
  `mcv_info` varchar(25) DEFAULT NULL,
  `mch` double(10,2) DEFAULT 0.00,
  `mch_info` varchar(25) DEFAULT NULL,
  `mchc` double(10,2) DEFAULT 0.00,
  `mchc_info` varchar(25) DEFAULT NULL,
  `rdw_cv` double(10,2) DEFAULT 0.00,
  `rdw_cv_info` varchar(25) DEFAULT NULL,
  `rdw_sd` double(10,2) DEFAULT 0.00,
  `rdw_sd_info` varchar(25) DEFAULT NULL,
  `plt` double(10,2) DEFAULT 0.00,
  `plt_info` varchar(25) DEFAULT NULL,
  `mpv` double(10,2) DEFAULT 0.00,
  `mpv_info` varchar(25) DEFAULT NULL,
  `pdw` double(10,2) DEFAULT 0.00,
  `pdw_info` varchar(25) DEFAULT NULL,
  `pct` double(10,2) DEFAULT 0.00,
  `pct_info` varchar(25) DEFAULT NULL,
  `sickling_test` varchar(25) DEFAULT NULL,
  `bf_mps` varchar(25) DEFAULT NULL,
  `esr` double(10,2) DEFAULT 0.00,
  `blood_film_comment` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fbc_5p`
--

CREATE TABLE `fbc_5p` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `wbc` double(10,2) DEFAULT 0.00,
  `wbc_flag` varchar(25) DEFAULT NULL,
  `neu_hash` double(10,2) DEFAULT 0.00,
  `neu_hash_flag` varchar(25) DEFAULT NULL,
  `lym_hash` double(10,2) DEFAULT 0.00,
  `lym_hash_flag` varchar(25) DEFAULT NULL,
  `mon_hash` double(10,2) DEFAULT 0.00,
  `mon_hash_flag` varchar(25) DEFAULT NULL,
  `eos_hash` double(10,2) DEFAULT 0.00,
  `eos_hash_flag` varchar(25) DEFAULT NULL,
  `bas_hash` double(10,2) DEFAULT 0.00,
  `bas_hash_flag` varchar(25) DEFAULT NULL,
  `neu_percent` double(10,2) DEFAULT 0.00,
  `neu_percent_flag` varchar(25) DEFAULT NULL,
  `lym_percent` double(10,2) DEFAULT 0.00,
  `lym_percent_flag` varchar(25) DEFAULT NULL,
  `mon_percent` double(10,2) DEFAULT 0.00,
  `mon_percent_flag` varchar(25) DEFAULT NULL,
  `eos_percent` double(10,2) DEFAULT 0.00,
  `eos_percent_flag` varchar(25) DEFAULT NULL,
  `bas_percent` double(10,2) DEFAULT 0.00,
  `bas_percent_flag` varchar(25) DEFAULT NULL,
  `rbc` double(10,2) DEFAULT 0.00,
  `rbc_flag` varchar(25) DEFAULT NULL,
  `hgb` double(10,2) DEFAULT 0.00,
  `hgb_flag` varchar(25) DEFAULT NULL,
  `hct` double(10,2) DEFAULT 0.00,
  `hct_flag` varchar(25) DEFAULT NULL,
  `mcv` double(10,2) DEFAULT 0.00,
  `mcv_flag` varchar(25) DEFAULT NULL,
  `mch` double(10,2) DEFAULT 0.00,
  `mch_flag` varchar(25) DEFAULT NULL,
  `mchc` double(10,2) DEFAULT 0.00,
  `mchc_flag` varchar(25) DEFAULT NULL,
  `rdw_cv` double(10,2) DEFAULT 0.00,
  `rdw_cv_flag` varchar(25) DEFAULT NULL,
  `rdw_sd` double(10,2) DEFAULT 0.00,
  `rdw_sd_flag` varchar(25) DEFAULT NULL,
  `plt` double(10,2) DEFAULT 0.00,
  `plt_flag` varchar(25) DEFAULT NULL,
  `mpv` double(10,2) DEFAULT 0.00,
  `mpv_flag` varchar(25) DEFAULT NULL,
  `pdw` double(10,2) DEFAULT 0.00,
  `pdw_flag` varchar(25) DEFAULT NULL,
  `pct` double(10,2) DEFAULT 0.00,
  `pct_flag` varchar(25) DEFAULT NULL,
  `p_lcc` double(10,2) DEFAULT 0.00,
  `p_lcc_flag` varchar(25) DEFAULT NULL,
  `p_lcr` double(10,2) DEFAULT 0.00,
  `p_lcr_flag` varchar(25) DEFAULT NULL,
  `sickling_test` varchar(25) DEFAULT NULL,
  `bf_mps` varchar(25) DEFAULT NULL,
  `esr` double(10,2) DEFAULT 0.00,
  `blood_film_comment` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fbc_5p`
--

INSERT INTO `fbc_5p` (`id`, `invoice_id`, `patient_id`, `wbc`, `wbc_flag`, `neu_hash`, `neu_hash_flag`, `lym_hash`, `lym_hash_flag`, `mon_hash`, `mon_hash_flag`, `eos_hash`, `eos_hash_flag`, `bas_hash`, `bas_hash_flag`, `neu_percent`, `neu_percent_flag`, `lym_percent`, `lym_percent_flag`, `mon_percent`, `mon_percent_flag`, `eos_percent`, `eos_percent_flag`, `bas_percent`, `bas_percent_flag`, `rbc`, `rbc_flag`, `hgb`, `hgb_flag`, `hct`, `hct_flag`, `mcv`, `mcv_flag`, `mch`, `mch_flag`, `mchc`, `mchc_flag`, `rdw_cv`, `rdw_cv_flag`, `rdw_sd`, `rdw_sd_flag`, `plt`, `plt_flag`, `mpv`, `mpv_flag`, `pdw`, `pdw_flag`, `pct`, `pct_flag`, `p_lcc`, `p_lcc_flag`, `p_lcr`, `p_lcr_flag`, `sickling_test`, `bf_mps`, `esr`, `blood_film_comment`, `added_by`, `date_added`) VALUES
(3, 'INV-FBC-5P-720', 'LMLS-PAT-KB-0003', 1.00, '', 2.00, '', 3.00, '', 4.00, '', 5.00, '', 6.00, '', 7.00, '', 8.00, '', 9.00, '', 10.00, '', 11.00, '', 12.00, '', 13.00, '', 14.00, '', 15.00, '', 16.00, '', 17.00, '', 18.00, '', 19.00, '', 20.00, '', 21.00, '', 22.00, '', 23.00, '', 24.00, '', 25.00, '', 'Negative', 'MPS Seen', 26.00, 'Kljhgf', 'LMLS-0001', '2020-03-08 22:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `fbc_children`
--

CREATE TABLE `fbc_children` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `wbc` double(10,2) DEFAULT 0.00,
  `wbc_flag` varchar(25) DEFAULT NULL,
  `lym` double(10,2) DEFAULT 0.00,
  `lym_flag` varchar(25) DEFAULT NULL,
  `mid` double(10,2) DEFAULT 0.00,
  `mid_flag` varchar(25) DEFAULT NULL,
  `gran` double(10,2) DEFAULT 0.00,
  `gran_flag` varchar(25) DEFAULT NULL,
  `lym_one` double(10,2) DEFAULT 0.00,
  `lym_one_flag` varchar(25) DEFAULT NULL,
  `mid_two` double(10,2) DEFAULT 0.00,
  `mid_two_flag` varchar(25) DEFAULT NULL,
  `gran_three` double(10,2) DEFAULT 0.00,
  `gran_three_flag` varchar(25) DEFAULT NULL,
  `rbc` double(10,2) DEFAULT 0.00,
  `rbc_flag` varchar(25) DEFAULT NULL,
  `hgb` double(10,2) DEFAULT 0.00,
  `hgb_flag` varchar(25) DEFAULT NULL,
  `hct` double(10,2) DEFAULT 0.00,
  `hct_flag` varchar(25) DEFAULT NULL,
  `mcv` double(10,2) DEFAULT 0.00,
  `mcv_flag` varchar(25) DEFAULT NULL,
  `mch` double(10,2) DEFAULT 0.00,
  `mch_flag` varchar(25) DEFAULT NULL,
  `mchc` double(10,2) DEFAULT 0.00,
  `mchc_flag` varchar(25) DEFAULT NULL,
  `rdw_cv` double(10,2) DEFAULT 0.00,
  `rdw_cv_flag` varchar(25) DEFAULT NULL,
  `rdw_sd` double(10,2) DEFAULT 0.00,
  `rdw_sd_flag` varchar(25) DEFAULT NULL,
  `plt` double(10,2) DEFAULT 0.00,
  `plt_flag` varchar(25) DEFAULT NULL,
  `mpv` double(10,2) DEFAULT 0.00,
  `mpv_flag` varchar(25) DEFAULT NULL,
  `pdw` double(10,2) DEFAULT 0.00,
  `pdw_flag` varchar(25) DEFAULT NULL,
  `pct` double(10,2) DEFAULT 0.00,
  `pct_flag` varchar(25) DEFAULT NULL,
  `sickling_test` varchar(25) DEFAULT NULL,
  `bf_mps` varchar(25) DEFAULT NULL,
  `esr` double(10,2) DEFAULT 0.00,
  `blood_film_comment` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fbc_children`
--

INSERT INTO `fbc_children` (`id`, `invoice_id`, `patient_id`, `wbc`, `wbc_flag`, `lym`, `lym_flag`, `mid`, `mid_flag`, `gran`, `gran_flag`, `lym_one`, `lym_one_flag`, `mid_two`, `mid_two_flag`, `gran_three`, `gran_three_flag`, `rbc`, `rbc_flag`, `hgb`, `hgb_flag`, `hct`, `hct_flag`, `mcv`, `mcv_flag`, `mch`, `mch_flag`, `mchc`, `mchc_flag`, `rdw_cv`, `rdw_cv_flag`, `rdw_sd`, `rdw_sd_flag`, `plt`, `plt_flag`, `mpv`, `mpv_flag`, `pdw`, `pdw_flag`, `pct`, `pct_flag`, `sickling_test`, `bf_mps`, `esr`, `blood_film_comment`, `added_by`, `date_added`) VALUES
(3, 'INV-FBC-CHI-510', 'LMLS-PAT-KB-0003', 1.00, '', 2.00, '', 3.00, '', 4.00, '', 5.00, '', 6.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 0.00, '', 'Negative', 'MPS Seen', 65.00, 'Kjhgfcv', 'LMLS-0001', '2020-03-08 21:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `folate_b12`
--

CREATE TABLE `folate_b12` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `folate` double(10,2) DEFAULT 0.00,
  `vitamin_b_12` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folate_b12`
--

INSERT INTO `folate_b12` (`id`, `invoice_id`, `patient_id`, `folate`, `vitamin_b_12`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-FOL-B12-090', 'LMLS-PAT-KB-0001', 1.00, 1.00, ';llikujyhgf', 'LMLS-0001', '2020-03-08 01:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `general_chemistry`
--

CREATE TABLE `general_chemistry` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `amylase` double(10,2) DEFAULT 0.00,
  `creatinine` double(10,2) DEFAULT 0.00,
  `ldh` double(10,2) DEFAULT 0.00,
  `uric_acid` double(10,2) DEFAULT 0.00,
  `creatine_kinase` double(10,2) DEFAULT 0.00,
  `calcium` double(10,2) DEFAULT 0.00,
  `phosphorus` double(10,2) DEFAULT 0.00,
  `magnessium` double(10,2) DEFAULT 0.00,
  `fbs_glucose` double(10,2) DEFAULT 0.00,
  `globulin` double(10,2) DEFAULT 0.00,
  `bili_indirect` double(10,2) DEFAULT 0.00,
  `glyco_hbg` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_chemistry`
--

INSERT INTO `general_chemistry` (`id`, `invoice_id`, `patient_id`, `amylase`, `creatinine`, `ldh`, `uric_acid`, `creatine_kinase`, `calcium`, `phosphorus`, `magnessium`, `fbs_glucose`, `globulin`, `bili_indirect`, `glyco_hbg`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-GEN-CHEM-510', 'LMLS-PAT-KB-0001', 10.00, 7.00, 9.00, 6.00, 8.00, 5.00, 11.00, 12.00, 4.00, 3.00, 2.00, 1.00, 'M,jhkjghf', 'LMLS-0001', '2020-03-08 02:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `hba1c`
--

CREATE TABLE `hba1c` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `dcct` double(10,2) DEFAULT 0.00,
  `ifcc` double(10,2) DEFAULT 0.00,
  `average_blood_glucose` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hba1c`
--

INSERT INTO `hba1c` (`id`, `invoice_id`, `patient_id`, `dcct`, `ifcc`, `average_blood_glucose`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-HBA1C-220', 'LMLS-PAT-KB-0001', 3.00, 2.00, 1.00, 'Kjkhgf', 'LMLS-0001', '2020-03-08 02:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `hbv_viral_load`
--

CREATE TABLE `hbv_viral_load` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `hbv_dna` varchar(20) DEFAULT NULL,
  `pcr_hbv_quantitative` int(14) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hbv_viral_load`
--

INSERT INTO `hbv_viral_load` (`id`, `invoice_id`, `patient_id`, `hbv_dna`, `pcr_hbv_quantitative`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-HBV-VL-320', 'LMLS-PAT-KB-0001', 'Target Detected', 1, 'Hjgfc', 'LMLS-0001', '2020-03-08 15:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `hepatitis_b_profile`
--

CREATE TABLE `hepatitis_b_profile` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `hbsag` varchar(10) DEFAULT NULL,
  `hbsab` varchar(10) DEFAULT NULL,
  `hbeag` varchar(10) DEFAULT NULL,
  `hbeab` varchar(10) DEFAULT NULL,
  `hbcab` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hepatitis_b_profile`
--

INSERT INTO `hepatitis_b_profile` (`id`, `invoice_id`, `patient_id`, `hbsag`, `hbsab`, `hbeag`, `hbeab`, `hbcab`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-HEP-B-PRF-390', 'LMLS-PAT-KB-0001', 'Negative', 'Negative', 'Negative', 'Positive', 'Positive', '.kljkhjghfgc', 'LMLS-0001', '2020-03-08 15:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `hepatitis_markers`
--

CREATE TABLE `hepatitis_markers` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `hep_a_igg_antibody` varchar(10) DEFAULT NULL,
  `hep_b_core_igm_antibody` varchar(10) DEFAULT NULL,
  `hep_a_igm_antibody` varchar(10) DEFAULT NULL,
  `hep_be_antigen` varchar(10) DEFAULT NULL,
  `hep_bs_antigen` varchar(10) DEFAULT NULL,
  `hep_be_antibody` varchar(10) DEFAULT NULL,
  `hep_bs_antibody` varchar(10) DEFAULT NULL,
  `hep_c_screen` varchar(10) DEFAULT NULL,
  `hep_b_core_igg_antibody` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hepatitis_markers`
--

INSERT INTO `hepatitis_markers` (`id`, `invoice_id`, `patient_id`, `hep_a_igg_antibody`, `hep_b_core_igm_antibody`, `hep_a_igm_antibody`, `hep_be_antigen`, `hep_bs_antigen`, `hep_be_antibody`, `hep_bs_antibody`, `hep_c_screen`, `hep_b_core_igg_antibody`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-HEP-MARK-510', 'LMLS-PAT-KB-0001', 'Negative', 'Positive', 'Negative', 'Positive', 'Positive', 'Negative', 'Positive', 'Negative', 'Positive', 'Lkljhgfgbcv', 'LMLS-0001', '2020-03-08 16:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `hiv_viral_load`
--

CREATE TABLE `hiv_viral_load` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `hiv_dna` varchar(20) DEFAULT NULL,
  `pcr_hiv_quantitative` int(14) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hiv_viral_load`
--

INSERT INTO `hiv_viral_load` (`id`, `invoice_id`, `patient_id`, `hiv_dna`, `pcr_hiv_quantitative`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-HIV-VL-040', 'LMLS-PAT-KB-0001', 'Target Not Detected', 1, 'Klkjhgf', 'LMLS-0001', '2020-03-08 15:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `hormonal_assay`
--

CREATE TABLE `hormonal_assay` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hormonal_assay`
--

INSERT INTO `hormonal_assay` (`id`, `invoice_id`, `patient_id`, `results`, `added_by`, `date_added`) VALUES
(3, 'INV-HORM-ASS-930', 'LMLS-PAT-KB-0004', 4567.00, 'LMLS-0001', '2020-03-09 13:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `hvs_cs`
--

CREATE TABLE `hvs_cs` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `pus_cells_per_hps` double(10,2) DEFAULT 0.00,
  `rbcs_per_hpf` double(10,2) DEFAULT 0.00,
  `epitheleal_cells_per_hpf` double(10,2) DEFAULT 0.00,
  `t_vaginalis` text DEFAULT NULL,
  `yeast_like_cells` text DEFAULT NULL,
  `gram_stain` text DEFAULT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hvs_cs`
--

INSERT INTO `hvs_cs` (`id`, `invoice_id`, `patient_id`, `pus_cells_per_hps`, `rbcs_per_hpf`, `epitheleal_cells_per_hpf`, `t_vaginalis`, `yeast_like_cells`, `gram_stain`, `culture`, `bacteria_one`, `bacteria_two`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-HVS-CS-020', 'LMLS-PAT-KB-0002', 4.00, 5.00, 6.00, 'Present', 'Present', 'Gram -ve Bacilli Seen', 'No Significant Growth', 'Alcaligenes', 'Alcaligenes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Nbdkbjx', 'LMLS-0001', '2020-03-06 23:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `hvs_re`
--

CREATE TABLE `hvs_re` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `pus_cells_per_hps` double(10,2) DEFAULT 0.00,
  `epitheleal_cells_per_hpf` double(10,2) DEFAULT 0.00,
  `red_blood_cells` text DEFAULT NULL,
  `yeast_like_cells` text DEFAULT NULL,
  `t_vaginalis` text DEFAULT NULL,
  `gnid` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hvs_re`
--

INSERT INTO `hvs_re` (`id`, `invoice_id`, `patient_id`, `pus_cells_per_hps`, `epitheleal_cells_per_hpf`, `red_blood_cells`, `yeast_like_cells`, `t_vaginalis`, `gnid`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-HVS-RE-870', 'LMLS-PAT-KB-0002', 7.50, 8.50, 'Not Seen', 'Present(+)', 'Present(2+)', 'Present(3+)', 'Jkhgfd', 'LMLS-0001', '2020-03-06 23:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `hypersensitive_cpr`
--

CREATE TABLE `hypersensitive_cpr` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hypersensitive_cpr`
--

INSERT INTO `hypersensitive_cpr` (`id`, `invoice_id`, `patient_id`, `results`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-HYP-CPR-350', 'LMLS-PAT-KB-0001', 43.00, 'Vbnm,.kljhgfvc', 'LMLS-0001', '2020-03-08 02:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `h_pylori_ag`
--

CREATE TABLE `h_pylori_ag` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `h_pylori_ag` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_pylori_ag`
--

INSERT INTO `h_pylori_ag` (`id`, `invoice_id`, `patient_id`, `h_pylori_ag`, `comments`, `added_by`, `date_added`) VALUES
(4, 'INV-H-PAG-680', 'LMLS-PAT-KB-0001', 'Negative', 'Asdfg', 'LMLS-0001', '2020-03-08 15:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `h_pylori_ag_blood`
--

CREATE TABLE `h_pylori_ag_blood` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `h_pylori_ag` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_pylori_ag_blood`
--

INSERT INTO `h_pylori_ag_blood` (`id`, `invoice_id`, `patient_id`, `h_pylori_ag`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-H-PAGB-670', 'LMLS-PAT-KB-0001', 'Negative', 'Kljhgvc', 'LMLS-0001', '2020-03-08 15:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `h_pylori_ag_sob`
--

CREATE TABLE `h_pylori_ag_sob` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `h_pylori_ag` varchar(10) DEFAULT NULL,
  `stool_occult_blood` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_pylori_ag_sob`
--

INSERT INTO `h_pylori_ag_sob` (`id`, `invoice_id`, `patient_id`, `h_pylori_ag`, `stool_occult_blood`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-H-PAG-SOB-570', 'LMLS-PAT-KB-0001', 'Negative', 'Negative', 'Asdfg', 'LMLS-0001', '2020-03-08 15:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `iron_study`
--

CREATE TABLE `iron_study` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `iron` double(10,2) DEFAULT 0.00,
  `iron_flag` varchar(25) DEFAULT NULL,
  `tibc` double(10,2) DEFAULT 0.00,
  `tibc_flag` varchar(25) DEFAULT NULL,
  `transferrin_sat` double(10,2) DEFAULT 0.00,
  `transferrin_sat_flag` varchar(25) DEFAULT NULL,
  `ferritin` double(10,2) DEFAULT 0.00,
  `ferritin_flag` varchar(25) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iron_study`
--

INSERT INTO `iron_study` (`id`, `invoice_id`, `patient_id`, `iron`, `iron_flag`, `tibc`, `tibc_flag`, `transferrin_sat`, `transferrin_sat_flag`, `ferritin`, `ferritin_flag`, `comments`, `added_by`, `date_added`) VALUES
(4, 'INV-IRN-STD-760', 'LMLS-PAT-KB-0001', 1.00, 'High', 2.00, 'Low', 3.00, 'High', 4.00, 'Low', 'L;ljkhjyghf', 'LMLS-0001', '2020-03-08 02:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `ise`
--

CREATE TABLE `ise` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `sodium` double(10,2) DEFAULT 0.00,
  `sodium_flag` varchar(25) DEFAULT NULL,
  `potassium` double(10,2) DEFAULT 0.00,
  `potassium_flag` varchar(25) DEFAULT NULL,
  `chloride` double(10,2) DEFAULT 0.00,
  `chloride_flag` varchar(25) DEFAULT NULL,
  `carbon_dioxide` double(10,2) DEFAULT 0.00,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ise`
--

INSERT INTO `ise` (`id`, `invoice_id`, `patient_id`, `sodium`, `sodium_flag`, `potassium`, `potassium_flag`, `chloride`, `chloride_flag`, `carbon_dioxide`, `added_by`, `date_added`) VALUES
(3, 'INV-ISE-180', 'LMLS-PAT-KB-0001', 1.00, 'Low', 2.00, 'High', 3.00, 'Low', 4.00, 'LMLS-0001', '2020-03-08 02:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `lft`
--

CREATE TABLE `lft` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `got_ast` double(10,2) DEFAULT 0.00,
  `got_ast_flag` varchar(25) DEFAULT NULL,
  `gpt_alt` double(10,2) DEFAULT 0.00,
  `gpt_alt_flag` varchar(25) DEFAULT NULL,
  `alkaline_phos` double(10,2) DEFAULT 0.00,
  `alkaline_phos_flag` varchar(25) DEFAULT NULL,
  `ggt` double(10,2) DEFAULT 0.00,
  `ggt_flag` varchar(25) DEFAULT NULL,
  `bilirubin_total` double(10,2) DEFAULT 0.00,
  `bilirubin_total_flag` varchar(25) DEFAULT NULL,
  `bili_indirect` double(10,2) DEFAULT 0.00,
  `bili_indirect_flag` varchar(25) DEFAULT NULL,
  `bilirubin_direct` double(10,2) DEFAULT 0.00,
  `bilirubin_direct_flag` varchar(25) DEFAULT NULL,
  `protein_total` double(10,2) DEFAULT 0.00,
  `protein_total_flag` varchar(25) DEFAULT NULL,
  `albumin` double(10,2) DEFAULT 0.00,
  `albumin_flag` varchar(25) DEFAULT NULL,
  `globulin` double(10,2) DEFAULT 0.00,
  `globulin_flag` varchar(25) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lft`
--

INSERT INTO `lft` (`id`, `invoice_id`, `patient_id`, `got_ast`, `got_ast_flag`, `gpt_alt`, `gpt_alt_flag`, `alkaline_phos`, `alkaline_phos_flag`, `ggt`, `ggt_flag`, `bilirubin_total`, `bilirubin_total_flag`, `bili_indirect`, `bili_indirect_flag`, `bilirubin_direct`, `bilirubin_direct_flag`, `protein_total`, `protein_total_flag`, `albumin`, `albumin_flag`, `globulin`, `globulin_flag`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-lft-300', 'LMLS-PAT-KB-0001', 1.00, 'Low', 2.00, 'Low', 3.00, 'Low', 4.00, 'Low', 5.00, 'Low', 6.00, 'High', 7.00, 'High', 8.00, 'High', 9.00, 'High', 10.00, 'High', 'Lkjhgfd', 'LMLS-0001', '2020-03-08 03:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `lipid_profile`
--

CREATE TABLE `lipid_profile` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `cholesterol_total` double(10,2) DEFAULT 0.00,
  `cholesterol_total_flag` varchar(25) DEFAULT NULL,
  `triglycerides` double(10,2) DEFAULT 0.00,
  `triglycerides_flag` varchar(25) DEFAULT NULL,
  `hdl` double(10,2) DEFAULT 0.00,
  `hdl_flag` varchar(25) DEFAULT NULL,
  `ldl` double(10,2) DEFAULT 0.00,
  `ldl_flag` varchar(25) DEFAULT NULL,
  `coronary_risk` double(10,2) DEFAULT 0.00,
  `coronary_risk_flag` varchar(25) DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lipid_profile`
--

INSERT INTO `lipid_profile` (`id`, `invoice_id`, `patient_id`, `cholesterol_total`, `cholesterol_total_flag`, `triglycerides`, `triglycerides_flag`, `hdl`, `hdl_flag`, `ldl`, `ldl_flag`, `coronary_risk`, `coronary_risk_flag`, `added_by`, `date_added`) VALUES
(3, 'INV-LPD-PRF-950', 'LMLS-PAT-KB-0001', 1.00, 'Low', 2.00, 'Low', 3.00, 'Low', 4.00, 'High', 5.00, 'High', 'LMLS-0001', '2020-03-08 03:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `mantoux`
--

CREATE TABLE `mantoux` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `date_of_injection` date DEFAULT NULL,
  `date_of_reading` date DEFAULT NULL,
  `size_of_induration` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mantoux`
--

INSERT INTO `mantoux` (`id`, `invoice_id`, `patient_id`, `date_of_injection`, `date_of_reading`, `size_of_induration`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-MAN-230', 'LMLS-PAT-KB-0001', '2020-03-01', '2020-03-01', 1.00, 'Kjkhjghfg', 'LMLS-0001', '2020-03-08 16:24:26'),
(4, 'INV-MAN-791', 'LMLS-PAT-KB-0001', NULL, NULL, 2.00, 'J,hghvbc', 'LMLS-0001', '2020-03-08 16:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `m_alb`
--

CREATE TABLE `m_alb` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_alb`
--

INSERT INTO `m_alb` (`id`, `invoice_id`, `patient_id`, `results`, `comments`, `added_by`, `date_added`) VALUES
(4, 'INV-M-ALB-510', 'LMLS-PAT-KB-0002', 5.30, 'Kljhgf', 'LMLS-0001', '2020-03-09 11:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `ntc_screening`
--

CREATE TABLE `ntc_screening` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `hb` double(10,2) DEFAULT 0.00,
  `hct` double(10,2) DEFAULT 0.00,
  `hepb` double(10,2) DEFAULT 0.00,
  `sickling` varchar(25) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ntc_screening`
--

INSERT INTO `ntc_screening` (`id`, `invoice_id`, `patient_id`, `hb`, `hct`, `hepb`, `sickling`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-NTC-SCR-880', 'LMLS-PAT-KB-0003', 1.00, 2.00, 3.00, 'Negative', 'Kjkhgf', 'LMLS-0001', '2020-03-08 22:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(14) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(11) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `home_phone` char(10) NOT NULL,
  `mobile_phone` char(10) NOT NULL,
  `work_phone` char(10) NOT NULL,
  `next_of_kin_name` varchar(255) NOT NULL,
  `next_of_kin_number` char(10) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `entered_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_id`, `title`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `gender`, `email_address`, `home_phone`, `mobile_phone`, `work_phone`, `next_of_kin_name`, `next_of_kin_number`, `branch`, `date_added`, `entered_by`) VALUES
(15, 'LMLS-PAT-AMA-0001', 'Mrs', 'Daniella', 'Adwoa', 'Owusua', '1980-12-31', 'Female', 'kofi@esquire.comm', '0201234567', '0201234567', '0201234567', 'Mark Adjei', '0231212121', 'Amasaman', '2020-01-17 18:14:21', 'LMLS-0000'),
(26, 'LMLS-PAT-AMA-0002', 'Mr', 'Steven', 'Arkoh', 'Sackey', '1970-01-02', 'Male', 'steph@sackey.com.gh', '0302123321', '0201234567', '', 'Patricia', '0231212123', 'Amasaman', '2020-01-18 19:44:12', 'LMLS-0000'),
(27, 'LMLS-PAT-KB-0003', 'Mr', 'Agyakwa', 'Ntow', 'Mireku', '1978-12-31', 'Male', 'thed@aryee.com.gh', '0302123321', '0201234567', '', 'Peter Mensah', '0241234567', 'Korle Bu', '2020-01-18 20:09:38', 'LMLS-0000'),
(41, 'LMLS-PAT-KB-0001', 'Mrs', 'Michelle', 'Ntow', 'Adjei Laryea', '1992-01-13', 'Female', 'trial@admin.comm', '0302123321', '0201234567', '', 'Peter Mensah', '0231212121', 'Korle Bu', '2020-03-04 10:43:48', 'LMLS-0001'),
(42, 'LMLS-PAT-KB-0002', 'Ms', 'Maria', '', 'Nortey', '1985-02-26', 'Female', 'maria@nortey.com', '0302123321', '0201234567', '', 'Peter Mensah', '0231212121', 'Korle Bu', '2020-03-04 17:17:41', 'LMLS-0001'),
(44, 'LMLS-PAT-KAS-0001', 'Mr', 'Derek', '', 'Asomaning', '1981-06-25', 'Male', 'derek@asomaning.com', '0302123321', '0201234567', '', 'Akosua Mensah', '0231212121', 'Kasoa', '2020-03-14 20:43:03', 'LMLS-0001'),
(45, 'LMLS-PAT-EL-0001', 'Mrs', 'Bethany', 'Serwaa', 'Adjei', '2020-01-09', 'Female', 'beth@adjei.com', '0302123321', '0201234567', '', 'Peter Mensah', '0231212121', 'East Legon', '2020-03-14 20:50:06', 'LMLS-0001'),
(46, 'LMLS-PAT-EL-0002', 'Mr', 'Mark', 'Nisah', 'Anthony', '2020-01-06', 'Transgender', 'mark@anthony.com.gh', '0302123321', '0201234567', '', 'Peter Mensah', '0231212121', 'East Legon', '2020-03-14 20:54:19', 'LMLS-0001'),
(47, 'LMLS-PAT-KB-0005', 'Mrs', 'Robert', '', 'Adjei Laryea', '2020-01-01', 'Female', 'rob@laryea.com', '0301234567', '0241234567', '', 'Mary Owusu', '0241234567', 'East Legon', '2020-03-18 10:16:50', 'LMLS-0001'),
(48, 'LMLS-PAT-KB-0004', 'Mr', 'Trial', 'Ntow', 'Adjei Laryea', '2020-05-10', 'Male', 'trial@admin.commm', '0302123321', '0201234567', '', 'Peter Mensah', '0231212121', 'Korle Bu', '2020-05-19 19:16:23', 'LMLS-0001'),
(49, 'LMLS-PAT-KB-0005', 'Prof.', 'Robert', 'Ntow', 'Adjei Laryea', '2020-05-01', 'Male', 'trial@admin.com', '0302123321', '0201234567', '', 'Peter Mensah', '0231212121', 'Korle Bu', '2020-05-27 12:43:01', 'LMLS-KB-0001'),
(50, 'LMLS-PAT-KB-0006', 'Mr.', 'Trial', 'Ntow', 'Adjei-laryea', '2020-05-01', 'Male', 'tria2l@admin.comm', '0302123321', '0201234567', '', 'Akosua Dwamena', '0231212121', 'Korle Bu', '2020-05-27 12:45:37', 'LMLS-KB-0001'),
(52, 'LMLS-PAT-KB-0007', 'Ms.', 'Michelle', '', 'Koduah', '2020-05-27', 'Female', 'michelle@koduah.com.gh', '0302123321', '0201234567', '', 'Peter Mensah', '0231212121', 'Korle Bu', '2020-05-27 13:47:48', 'LMLS-KB-0001'),
(58, 'FMDS-PAT-KB-0008', 'Prof', 'Anot', 'Her', 'Patient', '2020-04-29', 'Male', '', '0302123321', '0201234567', '0301234321', 'Peter Mensah', '0231212121', 'Korle Bu', '2020-05-27 23:02:43', 'LMLS-0001'),
(69, 'LMLS-PAT-KB-0009', 'Mr.', 'Bismark', 'Adjei', 'Bediako', '2020-06-30', 'Male', 'bismark@bediako.com.gh', '0302123321', '0201234567', '0236666666', 'Akosua Dwamena', '0231212121', 'Korle Bu', '2020-07-13 18:09:29', 'LMLS-KB-0000');

-- --------------------------------------------------------

--
-- Table structure for table `pleural_fluid`
--

CREATE TABLE `pleural_fluid` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `colour` varchar(50) DEFAULT NULL,
  `appearance` varchar(50) DEFAULT NULL,
  `appearance_dropdown` text DEFAULT NULL,
  `gram_stain` text DEFAULT NULL,
  `acid_fast_bacilli` varchar(50) DEFAULT NULL,
  `ph` double(10,2) DEFAULT 0.00,
  `glucose` double(10,2) DEFAULT 0.00,
  `total_protein` double(10,2) DEFAULT 0.00,
  `pleural_fluid_albumin` double(10,2) DEFAULT 0.00,
  `ldh` double(10,2) DEFAULT 0.00,
  `total_wbc_one` varchar(255) DEFAULT NULL,
  `total_wbc_two` varchar(255) DEFAULT NULL,
  `lymphocytes_one` varchar(255) DEFAULT NULL,
  `lymphocytes_two` varchar(255) DEFAULT NULL,
  `monocytes_one` varchar(255) DEFAULT NULL,
  `monocytes_two` varchar(255) DEFAULT NULL,
  `granulocytes_one` varchar(255) DEFAULT NULL,
  `granulocytes_two` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pleural_fluid`
--

INSERT INTO `pleural_fluid` (`id`, `invoice_id`, `patient_id`, `colour`, `appearance`, `appearance_dropdown`, `gram_stain`, `acid_fast_bacilli`, `ph`, `glucose`, `total_protein`, `pleural_fluid_albumin`, `ldh`, `total_wbc_one`, `total_wbc_two`, `lymphocytes_one`, `lymphocytes_two`, `monocytes_one`, `monocytes_two`, `granulocytes_one`, `granulocytes_two`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-PLEU-FLU-420', 'LMLS-PAT-KB-0002', 'Jbkqwbwhb', 'Hbshb', 'Blood Stain', 'No Organism Seen', ',mdcbjk', 1.00, 2.00, 3.00, 4.00, 5.00, '', '', '', '', '', '', '', '', '', 'LMLS-0001', '2020-03-07 13:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `pregnancy_test`
--

CREATE TABLE `pregnancy_test` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `specimen` varchar(10) DEFAULT NULL,
  `results` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pregnancy_test`
--

INSERT INTO `pregnancy_test` (`id`, `invoice_id`, `patient_id`, `specimen`, `results`, `comments`, `added_by`, `date_added`) VALUES
(4, 'INV-PREG-TEST-010', 'LMLS-PAT-KB-0001', 'Urine', 'Negative', 'Not Pregnant, Sorry', 'LMLS-0001', '2020-03-08 16:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `protein_electrophoresis`
--

CREATE TABLE `protein_electrophoresis` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `total_protein` double(10,2) DEFAULT 0.00,
  `total_protein_flag` varchar(25) DEFAULT NULL,
  `albumin` double(10,2) DEFAULT 0.00,
  `albumin_flag` varchar(25) DEFAULT NULL,
  `alpha_1_globulin` double(10,2) DEFAULT 0.00,
  `alpha_1_globulin_flag` varchar(25) DEFAULT NULL,
  `alpha_2_globulin` double(10,2) DEFAULT 0.00,
  `alpha_2_globulin_flag` varchar(25) DEFAULT NULL,
  `beta_1_globulin` double(10,2) DEFAULT 0.00,
  `beta_1_globulin_flag` varchar(25) DEFAULT NULL,
  `beta_2_globulin` double(10,2) DEFAULT 0.00,
  `beta_2_globulin_flag` varchar(25) DEFAULT NULL,
  `gamma_globulin` double(10,2) DEFAULT 0.00,
  `gamma_globulin_flag` varchar(25) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `protein_electrophoresis`
--

INSERT INTO `protein_electrophoresis` (`id`, `invoice_id`, `patient_id`, `total_protein`, `total_protein_flag`, `albumin`, `albumin_flag`, `alpha_1_globulin`, `alpha_1_globulin_flag`, `alpha_2_globulin`, `alpha_2_globulin_flag`, `beta_1_globulin`, `beta_1_globulin_flag`, `beta_2_globulin`, `beta_2_globulin_flag`, `gamma_globulin`, `gamma_globulin_flag`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-PROT-ELEC-970', 'LMLS-PAT-KB-0001', 1.00, 'Low', 2.00, 'Low', 3.00, 'Low', 4.00, 'Low', 5.00, 'High', 6.00, 'High', 7.00, 'High', '', 'LMLS-0001', '2020-03-08 13:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `psa`
--

CREATE TABLE `psa` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psa`
--

INSERT INTO `psa` (`id`, `invoice_id`, `patient_id`, `results`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-PSA-710', 'LMLS-PAT-KB-0002', 1.20, ',jkhjgh', 'LMLS-0001', '2020-03-09 13:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `pth`
--

CREATE TABLE `pth` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `results_flag` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pth`
--

INSERT INTO `pth` (`id`, `invoice_id`, `patient_id`, `results`, `results_flag`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-PTH-850', 'LMLS-PAT-KB-0002', 1.00, 'High', 'Kljyhgfd', 'LMLS-0001', '2020-03-09 13:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `pus_fluid`
--

CREATE TABLE `pus_fluid` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `colour` text DEFAULT NULL,
  `appearance` text DEFAULT NULL,
  `gram_stain` text DEFAULT NULL,
  `acid_fast_bacilli` varchar(255) DEFAULT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `bacteria_three` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `antibiotics_seventeen` text DEFAULT NULL,
  `antibiotics_eighteen` text DEFAULT NULL,
  `antibiotics_nineteen` text DEFAULT NULL,
  `antibiotics_twenty` text DEFAULT NULL,
  `antibiotics_twenty_one` text DEFAULT NULL,
  `antibiotics_twenty_two` text DEFAULT NULL,
  `antibiotics_twenty_three` text DEFAULT NULL,
  `antibiotics_twenty_four` text DEFAULT NULL,
  `sensitivity_one` varchar(4) DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `sensitivity_seventeen` text DEFAULT NULL,
  `sensitivity_eighteen` text DEFAULT NULL,
  `sensitivity_nineteen` text DEFAULT NULL,
  `sensitivity_twenty` text DEFAULT NULL,
  `sensitivity_twenty_one` text DEFAULT NULL,
  `sensitivity_twenty_two` text DEFAULT NULL,
  `sensitivity_twenty_three` text DEFAULT NULL,
  `sensitivity_twenty_four` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pus_fluid`
--

INSERT INTO `pus_fluid` (`id`, `invoice_id`, `patient_id`, `colour`, `appearance`, `gram_stain`, `acid_fast_bacilli`, `culture`, `bacteria_one`, `bacteria_two`, `bacteria_three`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `antibiotics_seventeen`, `antibiotics_eighteen`, `antibiotics_nineteen`, `antibiotics_twenty`, `antibiotics_twenty_one`, `antibiotics_twenty_two`, `antibiotics_twenty_three`, `antibiotics_twenty_four`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `sensitivity_seventeen`, `sensitivity_eighteen`, `sensitivity_nineteen`, `sensitivity_twenty`, `sensitivity_twenty_one`, `sensitivity_twenty_two`, `sensitivity_twenty_three`, `sensitivity_twenty_four`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-PUS-FLU-450', 'LMLS-PAT-KB-0002', 'Clear', 'Blood Stain', 'No Organism Seen', 'Acid', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'R', 'R', 'R', 'R', 'S', 'S', 'S', 'S', 'R', 'R', 'R', 'R', 'S', 'S', 'S', 'S', 'R', 'R', 'R', 'R', 'S', 'S', 'S', 'S', 'Commmmmmm', 'LMLS-0001', '2020-03-07 14:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `reproductive_assay`
--

CREATE TABLE `reproductive_assay` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `lh` double(10,2) DEFAULT 0.00,
  `fsh` double(10,2) DEFAULT 0.00,
  `prolactive` double(10,2) DEFAULT 0.00,
  `progesterone` double(10,2) DEFAULT 0.00,
  `oestrogen` double(10,2) DEFAULT 0.00,
  `testosterone` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reproductive_assay`
--

INSERT INTO `reproductive_assay` (`id`, `invoice_id`, `patient_id`, `lh`, `fsh`, `prolactive`, `progesterone`, `oestrogen`, `testosterone`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-REPR-ASS-600', 'LMLS-PAT-KB-0002', 1.10, 1.20, 1.30, 1.40, 1.50, 1.60, 'Jkyuttrersd', 'LMLS-0001', '2020-03-09 12:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(14) NOT NULL,
  `request_id` varchar(25) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `requests` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `date_done` datetime DEFAULT NULL,
  `done_by` varchar(25) DEFAULT NULL,
  `discount` int(14) NOT NULL DEFAULT 0,
  `total_cost` double(10,2) NOT NULL,
  `discounted_cost` double(10,2) NOT NULL,
  `amount_paid` double(10,2) NOT NULL DEFAULT 0.00,
  `payment_status` varchar(7) NOT NULL DEFAULT 'Pending',
  `payment_type` text DEFAULT '',
  `branch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `request_id`, `patient_id`, `requests`, `date_added`, `added_by`, `status`, `date_done`, `done_by`, `discount`, `total_cost`, `discounted_cost`, `amount_paid`, `payment_status`, `payment_type`, `branch`) VALUES
(44, 'REQ-KB-9441', 'LMLS-PAT-KB-0003', 'Faecal Reducing Substance, Fasting Lipids', '2020-03-16 22:23:29', 'LMLS-0001', 'Completed', '2020-03-16 22:33:15', 'LMLS-0000', 0, 90.00, 90.00, 90.00, 'Paid', 'Cash', 'Korle Bu'),
(45, 'REQ-KB-5472', 'LMLS-PAT-KB-0001', 'Lactate, Ldh, Lft, Lipase, Transferrin', '2020-03-16 22:23:41', 'LMLS-0000', 'Completed', '2020-03-16 22:34:53', 'LMLS-0000', 0, 340.00, 340.00, 455.00, 'Paid', 'Cash', 'Korle Bu'),
(50, 'REQ-KB-1375', 'LMLS-PAT-KB-0002', 'Ck, Direct Bilirubin, Faecal Reducing Substance, Fasting Lipids', '2020-03-19 13:13:24', 'LMLS-0001', 'Completed', '2020-05-27 21:46:24', 'LMLS-0001', 15, 170.00, 144.50, 144.50, 'Paid', 'Cash (GHS 100), Bank (GHS 40), Mobile Money (GHS 4.5)', 'Korle Bu'),
(53, 'REQ-KAS-7755', 'LMLS-PAT-KAS-0001', 'Ck, Ck-mb, Creatinine Clearance, Csf Biochem', '2020-03-19 13:27:40', 'LMLS-0000', 'Pending', NULL, NULL, 0, 230.00, 230.00, 0.00, 'Pending', NULL, 'Kasoa'),
(55, 'REQ-KB-6157', 'LMLS-PAT-KB-0006', '24hr Ogtt, 24hr Post Prandial Glucose, 24hr Urine Protein', '2020-05-27 12:45:57', 'LMLS-KB-0001', 'Completed', '2020-05-27 12:48:03', 'LMLS-KB-0001', 10, 300.00, 270.00, 270.00, 'Paid', 'Mobile Money', 'Korle Bu'),
(56, 'REQ-KB-9658', 'LMLS-PAT-KB-0007', '24hr Ogtt, 24hr Post Prandial Glucose, 24hr Urine Protein, 24hr Vma', '2020-05-27 13:49:18', 'LMLS-KB-0001', 'Pending', NULL, NULL, 0, 1130.00, 1130.00, 130.00, 'Pending', 'Cash', 'Korle Bu'),
(62, 'REQ-KB-7949', 'FMDS-PAT-KB-0008', 'Faecal Reducing Substance, Serum Iron, Transferrin, Uric Acid', '2020-05-27 23:02:55', 'LMLS-0001', 'Completed', '2020-05-27 23:04:04', 'LMLS-0001', 10, 200.00, 180.00, 180.00, 'Paid', 'Cash (GHS 100), Bank (GHS 70), Mobile Money (GHS 10)', 'Korle Bu'),
(63, 'REQ-KB-5248', 'FMDS-PAT-KB-0008', 'Abdominal Scan, Abdomino Pelvic Scan, Breast Scan, Obstetric Scan, Pelvic Scan Gynaecology, Pelvic Scan Urology, Prostate Scan, Scrotal Scan', '2020-06-11 22:28:54', 'LMLS-0001', 'Completed', '2020-06-11 22:29:41', 'LMLS-0001', 10, 550.00, 495.00, 500.00, 'Paid', 'Cash (GHS 500)', 'Korle Bu'),
(64, 'REQ-KB-6789', 'LMLS-PAT-KB-0004', 'Abdominal Scan, Obstetric Scan, Other Small Parts, Pelvic Scan Urology, Prostate Scan, Superficial Swellings, Thyroid Scan Anterior Neck Swelling', '2020-06-11 22:29:57', 'LMLS-0001', 'Completed', '2020-06-11 22:36:20', 'LMLS-0001', 0, 480.00, 480.00, 100.00, 'Paid', 'Cash (GHS 100)', 'Korle Bu'),
(65, 'REQ-KB-007810', 'LMLS-PAT-KB-0002', 'Breast Scan, Obstetric Scan, Pelvic Scan Gynaecology, Pelvic Scan Urology, Thyroid Scan Anterior Neck Swelling', '2020-06-11 22:36:35', 'LMLS-0001', 'Pending', NULL, NULL, 0, 310.00, 310.00, 50.00, 'Paid', 'Cash (GHS 50)', 'Korle Bu');

-- --------------------------------------------------------

--
-- Table structure for table `rheumatology`
--

CREATE TABLE `rheumatology` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `le_cells` text DEFAULT NULL,
  `ana_qualitative` varchar(10) DEFAULT NULL,
  `ana_quantitative` varchar(10) DEFAULT NULL,
  `ds_dna` varchar(10) DEFAULT NULL,
  `rheumatoid_factor` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rheumatology`
--

INSERT INTO `rheumatology` (`id`, `invoice_id`, `patient_id`, `le_cells`, `ana_qualitative`, `ana_quantitative`, `ds_dna`, `rheumatoid_factor`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-RHEU-370', 'LMLS-PAT-KB-0001', 'Not Seen', 'Negative', 'Positive', 'Negative', 'Positive', 'Jhjgffc', 'LMLS-0001', '2020-03-08 16:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(14) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` text NOT NULL,
  `added_by` varchar(25) NOT NULL,
  `status` varchar(9) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `added_by`, `status`) VALUES
(1, 'Administrator', 'Can View Charges List,Can Create Charge,Can Edit Charge,Can View Lab List,Can Create Lab,Can Edit Lab,Can View Lab,Can Pay Lab,Can View Patients List,Can Create Patient,Can Edit Patient,Can View Patient,Can Create Reports,Can View Staff List,Can Create Staff,Can Edit Staff,Can View Staff,Can Block Staff,Can Unblock Staff', 'LMLS-0001', 'Active'),
(2, 'Front Desk', 'Can View Charges List, Can Create Charge, Can Edit Charge, Can View Lab List, Can View Lab, Can Pay Lab, Can View Patients List, Can Create Patient, Can Edit Patient, Can View Patient, Can Create Reports', 'LMLS-0001', 'Active'),
(3, 'Lab Technician', 'Can View Lab List, Can Create Lab, Can Edit Lab, Can View Lab, Can View Patients List, Can View Patient, Can Create Reports', 'LMLS-0001', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sc3_sc4`
--

CREATE TABLE `sc3_sc4` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `s_c3` double(10,2) DEFAULT 0.00,
  `s_c4` double(10,2) DEFAULT 0.00,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc3_sc4`
--

INSERT INTO `sc3_sc4` (`id`, `invoice_id`, `patient_id`, `s_c3`, `s_c4`, `added_by`, `date_added`) VALUES
(3, 'INV-SC3-SC4-700', 'LMLS-PAT-KB-0001', 1.00, 1.70, 'LMLS-0001', '2020-03-08 13:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `semen_analysis`
--

CREATE TABLE `semen_analysis` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `volume` double(10,2) DEFAULT 0.00,
  `motility` double(10,2) DEFAULT 0.00,
  `unknown_one` double(10,2) DEFAULT 0.00,
  `unknown_two` double(10,2) DEFAULT 0.00,
  `consistency` text DEFAULT NULL,
  `agglutination` varchar(10) DEFAULT NULL,
  `ph` text DEFAULT NULL,
  `colour` text DEFAULT NULL,
  `count` double(10,2) DEFAULT 0.00,
  `viability` double(10,2) DEFAULT 0.00,
  `morphology` text DEFAULT NULL,
  `testicular_cells` double(10,2) DEFAULT 0.00,
  `pus_cells` double(10,2) DEFAULT 0.00,
  `epithelial` double(10,2) DEFAULT 0.00,
  `red_blood_cells` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semen_analysis`
--

INSERT INTO `semen_analysis` (`id`, `invoice_id`, `patient_id`, `volume`, `motility`, `unknown_one`, `unknown_two`, `consistency`, `agglutination`, `ph`, `colour`, `count`, `viability`, `morphology`, `testicular_cells`, `pus_cells`, `epithelial`, `red_blood_cells`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-SEM-ANAL-890', 'LMLS-PAT-KB-0001', 1.00, 2.00, 3.00, 4.00, 'Normal', '5', '5.0', 'Blood Stain', 6.00, 7.00, 'Kjhmggh', 8.00, 9.00, 10.00, 11.00, ',.jmhngf', 'LMLS-0001', '2020-03-08 17:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `semen_cs`
--

CREATE TABLE `semen_cs` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `bacteria_three` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `antibiotics_seventeen` text DEFAULT NULL,
  `antibiotics_eighteen` text DEFAULT NULL,
  `antibiotics_nineteen` text DEFAULT NULL,
  `antibiotics_twenty` text DEFAULT NULL,
  `antibiotics_twenty_one` text DEFAULT NULL,
  `antibiotics_twenty_two` text DEFAULT NULL,
  `antibiotics_twenty_three` text DEFAULT NULL,
  `antibiotics_twenty_four` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `sensitivity_seventeen` varchar(4) DEFAULT NULL,
  `sensitivity_eighteen` varchar(4) DEFAULT NULL,
  `sensitivity_nineteen` varchar(4) DEFAULT NULL,
  `sensitivity_twenty` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_one` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_two` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_three` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_four` varchar(4) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semen_cs`
--

INSERT INTO `semen_cs` (`id`, `invoice_id`, `patient_id`, `culture`, `bacteria_one`, `bacteria_two`, `bacteria_three`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `antibiotics_seventeen`, `antibiotics_eighteen`, `antibiotics_nineteen`, `antibiotics_twenty`, `antibiotics_twenty_one`, `antibiotics_twenty_two`, `antibiotics_twenty_three`, `antibiotics_twenty_four`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `sensitivity_seventeen`, `sensitivity_eighteen`, `sensitivity_nineteen`, `sensitivity_twenty`, `sensitivity_twenty_one`, `sensitivity_twenty_two`, `sensitivity_twenty_three`, `sensitivity_twenty_four`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-SEM-CS-490', 'LMLS-PAT-KB-0002', 'No Bacterial Growth', 'Acinetobacter SPP', 'Acinetobacter SPP', 'Acinetobacter SPP', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'S', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'LMLS-0001', '2020-03-07 15:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `serum_hcg_b`
--

CREATE TABLE `serum_hcg_b` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `results` double(10,2) DEFAULT 0.00,
  `ranges` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serum_hcg_b`
--

INSERT INTO `serum_hcg_b` (`id`, `invoice_id`, `patient_id`, `results`, `ranges`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-SRM-HCG-B-840', 'LMLS-PAT-KB-0002', 1.20, 'Negative', ',jmhgf', 'LMLS-0001', '2020-03-09 11:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `serum_lipase`
--

CREATE TABLE `serum_lipase` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `s_lipase` double(10,2) DEFAULT 0.00,
  `s_lipase_flag` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serum_lipase`
--

INSERT INTO `serum_lipase` (`id`, `invoice_id`, `patient_id`, `s_lipase`, `s_lipase_flag`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-SRM-LIPASE-670', 'LMLS-PAT-KB-0001', 1.00, 'High', 'Mjhgf', 'LMLS-0001', '2020-03-08 13:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `skin_snip`
--

CREATE TABLE `skin_snip` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `onchocerca_volvulus` varchar(255) DEFAULT NULL,
  `m_streptocerca` varchar(255) DEFAULT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `bacteria_three` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `antibiotics_seventeen` text DEFAULT NULL,
  `antibiotics_eighteen` text DEFAULT NULL,
  `antibiotics_nineteen` text DEFAULT NULL,
  `antibiotics_twenty` text DEFAULT NULL,
  `antibiotics_twenty_one` text DEFAULT NULL,
  `antibiotics_twenty_two` text DEFAULT NULL,
  `antibiotics_twenty_three` text DEFAULT NULL,
  `antibiotics_twenty_four` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `sensitivity_seventeen` varchar(4) DEFAULT NULL,
  `sensitivity_eighteen` varchar(4) DEFAULT NULL,
  `sensitivity_nineteen` varchar(4) DEFAULT NULL,
  `sensitivity_twenty` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_one` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_two` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_three` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_four` varchar(4) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skin_snip`
--

INSERT INTO `skin_snip` (`id`, `invoice_id`, `patient_id`, `onchocerca_volvulus`, `m_streptocerca`, `culture`, `bacteria_one`, `bacteria_two`, `bacteria_three`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `antibiotics_seventeen`, `antibiotics_eighteen`, `antibiotics_nineteen`, `antibiotics_twenty`, `antibiotics_twenty_one`, `antibiotics_twenty_two`, `antibiotics_twenty_three`, `antibiotics_twenty_four`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `sensitivity_seventeen`, `sensitivity_eighteen`, `sensitivity_nineteen`, `sensitivity_twenty`, `sensitivity_twenty_one`, `sensitivity_twenty_two`, `sensitivity_twenty_three`, `sensitivity_twenty_four`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-SKIN-SNIP-960', 'LMLS-PAT-KB-0002', 'Bkdbgh', 'Hvfhvj', 'No Bacterial Growth', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'LMLS-0001', '2020-03-07 15:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE `specials` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `abo_grouping` varchar(20) DEFAULT NULL,
  `g6pd` varchar(20) DEFAULT NULL,
  `sickling` varchar(25) DEFAULT NULL,
  `hgb_genotype` varchar(25) DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`id`, `invoice_id`, `patient_id`, `abo_grouping`, `g6pd`, `sickling`, `hgb_genotype`, `added_by`, `date_added`) VALUES
(3, 'INV-SPE-030', 'LMLS-PAT-KB-0003', 'A Positive', 'Normal', 'Positive', 'AA', 'LMLS-0001', '2020-03-08 21:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `sputum`
--

CREATE TABLE `sputum` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `appearance` text DEFAULT NULL,
  `gram_stain` text DEFAULT NULL,
  `pus_cells` text DEFAULT NULL,
  `zn_stain` text DEFAULT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sputum`
--

INSERT INTO `sputum` (`id`, `invoice_id`, `patient_id`, `appearance`, `gram_stain`, `pus_cells`, `zn_stain`, `culture`, `bacteria_one`, `bacteria_two`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-SPU-CS-410', 'LMLS-PAT-KB-0001', '', '', '', '', 'No Bacterial Growth', 'Acinetobacter SPP', 'Acinetobacter SPP', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'L/.kl,jkhgbfgcv', 'LMLS-0001', '2020-03-07 16:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `sputum_afb`
--

CREATE TABLE `sputum_afb` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `appearance` text DEFAULT NULL,
  `gram_stain` text DEFAULT NULL,
  `zn_stain` text DEFAULT NULL,
  `pus_cells` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sputum_afb`
--

INSERT INTO `sputum_afb` (`id`, `invoice_id`, `patient_id`, `appearance`, `gram_stain`, `zn_stain`, `pus_cells`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-SPU-AFB-350', 'LMLS-PAT-KB-0001', 'Blood Stained', 'No Organism Seen', 'AFB Present', 'Present(+)', 'Kjkhjgfcv', 'LMLS-0001', '2020-03-07 16:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `stool_cs`
--

CREATE TABLE `stool_cs` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `bacteria_three` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `antibiotics_seventeen` text DEFAULT NULL,
  `antibiotics_eighteen` text DEFAULT NULL,
  `antibiotics_nineteen` text DEFAULT NULL,
  `antibiotics_twenty` text DEFAULT NULL,
  `antibiotics_twenty_one` text DEFAULT NULL,
  `antibiotics_twenty_two` text DEFAULT NULL,
  `antibiotics_twenty_three` text DEFAULT NULL,
  `antibiotics_twenty_four` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `sensitivity_seventeen` varchar(4) DEFAULT NULL,
  `sensitivity_eighteen` varchar(4) DEFAULT NULL,
  `sensitivity_nineteen` varchar(4) DEFAULT NULL,
  `sensitivity_twenty` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_one` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_two` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_three` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_four` varchar(4) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stool_cs`
--

INSERT INTO `stool_cs` (`id`, `invoice_id`, `patient_id`, `culture`, `bacteria_one`, `bacteria_two`, `bacteria_three`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `antibiotics_seventeen`, `antibiotics_eighteen`, `antibiotics_nineteen`, `antibiotics_twenty`, `antibiotics_twenty_one`, `antibiotics_twenty_two`, `antibiotics_twenty_three`, `antibiotics_twenty_four`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `sensitivity_seventeen`, `sensitivity_eighteen`, `sensitivity_nineteen`, `sensitivity_twenty`, `sensitivity_twenty_one`, `sensitivity_twenty_two`, `sensitivity_twenty_three`, `sensitivity_twenty_four`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-STL-CS-620', 'LMLS-PAT-KB-0001', 'No Bacterial Growth', 'Acinetobacter SPP', 'Acinetobacter SPP', 'Acinetobacter SPP', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'R', 'R', 'R', 'R', 'S', 'S', 'S', 'S', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'LMLS-0001', '2020-03-07 16:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `stool_re`
--

CREATE TABLE `stool_re` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `row_one_one` text DEFAULT NULL,
  `ova_one` text DEFAULT NULL,
  `ova_two` text DEFAULT NULL,
  `row_three_one` text DEFAULT NULL,
  `row_three_two` text DEFAULT NULL,
  `row_four_one` text DEFAULT NULL,
  `row_four_two` text DEFAULT NULL,
  `larvae_one` text DEFAULT NULL,
  `larvae_two` text DEFAULT NULL,
  `cyst_one` text DEFAULT NULL,
  `cyst_two` text DEFAULT NULL,
  `row_seven_one` text DEFAULT NULL,
  `row_seven_two` text DEFAULT NULL,
  `row_eight_one` text DEFAULT NULL,
  `row_eight_two` text DEFAULT NULL,
  `vegetative_form_one` text DEFAULT NULL,
  `vegetative_form_two` text DEFAULT NULL,
  `row_ten_one` text DEFAULT NULL,
  `row_ten_two` text DEFAULT NULL,
  `row_eleven_one` text DEFAULT NULL,
  `row_eleven_two` text DEFAULT NULL,
  `red_blood_cells` text DEFAULT NULL,
  `white_blood_cells` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stool_re`
--

INSERT INTO `stool_re` (`id`, `invoice_id`, `patient_id`, `row_one_one`, `ova_one`, `ova_two`, `row_three_one`, `row_three_two`, `row_four_one`, `row_four_two`, `larvae_one`, `larvae_two`, `cyst_one`, `cyst_two`, `row_seven_one`, `row_seven_two`, `row_eight_one`, `row_eight_two`, `vegetative_form_one`, `vegetative_form_two`, `row_ten_one`, `row_ten_two`, `row_eleven_one`, `row_eleven_two`, `red_blood_cells`, `white_blood_cells`, `comments`, `added_by`, `date_added`) VALUES
(4, 'INV-STL-RE-670', 'LMLS-PAT-KB-0001', 'Formed Specimen', 'Not Seen', 'Not Seen', '', '', '', '', 'Not Seen', '', 'Endolimax Nana', '', '', '', '', '', '', '', '', '', '', '', 'Not Seen', 'Present(+)', '', 'LMLS-0001', '2020-03-07 17:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `tft`
--

CREATE TABLE `tft` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `ft3` double(10,2) DEFAULT 0.00,
  `ft3_flag` varchar(10) DEFAULT NULL,
  `ft4` double(10,2) DEFAULT 0.00,
  `ft4_flag` varchar(10) DEFAULT NULL,
  `tsh` double(10,2) DEFAULT 0.00,
  `tsh_flag` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tft`
--

INSERT INTO `tft` (`id`, `invoice_id`, `patient_id`, `ft3`, `ft3_flag`, `ft4`, `ft4_flag`, `tsh`, `tsh_flag`, `comments`, `added_by`, `date_added`) VALUES
(5, 'INV-TFT-180', 'LMLS-PAT-KB-0002', 8.90, 'High', 1.10, 'Low', 1.30, 'High', 'Jhgfd', 'LMLS-0001', '2020-03-09 12:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `throat_swab_cs`
--

CREATE TABLE `throat_swab_cs` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `bacteria_three` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `antibiotics_seventeen` text DEFAULT NULL,
  `antibiotics_eighteen` text DEFAULT NULL,
  `antibiotics_nineteen` text DEFAULT NULL,
  `antibiotics_twenty` text DEFAULT NULL,
  `antibiotics_twenty_one` text DEFAULT NULL,
  `antibiotics_twenty_two` text DEFAULT NULL,
  `antibiotics_twenty_three` text DEFAULT NULL,
  `antibiotics_twenty_four` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `sensitivity_seventeen` varchar(4) DEFAULT NULL,
  `sensitivity_eighteen` varchar(4) DEFAULT NULL,
  `sensitivity_nineteen` varchar(4) DEFAULT NULL,
  `sensitivity_twenty` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_one` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_two` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_three` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_four` varchar(4) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `throat_swab_cs`
--

INSERT INTO `throat_swab_cs` (`id`, `invoice_id`, `patient_id`, `culture`, `bacteria_one`, `bacteria_two`, `bacteria_three`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `antibiotics_seventeen`, `antibiotics_eighteen`, `antibiotics_nineteen`, `antibiotics_twenty`, `antibiotics_twenty_one`, `antibiotics_twenty_two`, `antibiotics_twenty_three`, `antibiotics_twenty_four`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `sensitivity_seventeen`, `sensitivity_eighteen`, `sensitivity_nineteen`, `sensitivity_twenty`, `sensitivity_twenty_one`, `sensitivity_twenty_two`, `sensitivity_twenty_three`, `sensitivity_twenty_four`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-THR-SWB-CS-230', 'LMLS-PAT-KB-0001', 'No Bacterial Growth', 'Acinetobacter SPP', '', '', 'Amikacin', '', '', '', 'Amikacin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'R', 'R', 'R', 'R', 'S', 'S', 'S', 'S', '', 'LMLS-0001', '2020-03-07 17:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `troponin`
--

CREATE TABLE `troponin` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `troponin_i` double(10,2) DEFAULT 0.00,
  `troponin_t` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `troponin`
--

INSERT INTO `troponin` (`id`, `invoice_id`, `patient_id`, `troponin_i`, `troponin_t`, `comments`, `added_by`, `date_added`) VALUES
(4, 'INV-TRO-990', 'LMLS-PAT-KB-0002', 1.00, 6.00, 'Kjhgfr', 'LMLS-0001', '2020-03-09 12:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `urethral_cs`
--

CREATE TABLE `urethral_cs` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `gram_stain` text DEFAULT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `bacteria_three` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `antibiotics_seventeen` text DEFAULT NULL,
  `antibiotics_eighteen` text DEFAULT NULL,
  `antibiotics_nineteen` text DEFAULT NULL,
  `antibiotics_twenty` text DEFAULT NULL,
  `antibiotics_twenty_one` text DEFAULT NULL,
  `antibiotics_twenty_two` text DEFAULT NULL,
  `antibiotics_twenty_three` text DEFAULT NULL,
  `antibiotics_twenty_four` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `sensitivity_seventeen` varchar(4) DEFAULT NULL,
  `sensitivity_eighteen` varchar(4) DEFAULT NULL,
  `sensitivity_nineteen` varchar(4) DEFAULT NULL,
  `sensitivity_twenty` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_one` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_two` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_three` varchar(4) DEFAULT NULL,
  `sensitivity_twenty_four` varchar(4) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urethral_cs`
--

INSERT INTO `urethral_cs` (`id`, `invoice_id`, `patient_id`, `gram_stain`, `culture`, `bacteria_one`, `bacteria_two`, `bacteria_three`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `antibiotics_seventeen`, `antibiotics_eighteen`, `antibiotics_nineteen`, `antibiotics_twenty`, `antibiotics_twenty_one`, `antibiotics_twenty_two`, `antibiotics_twenty_three`, `antibiotics_twenty_four`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `sensitivity_seventeen`, `sensitivity_eighteen`, `sensitivity_nineteen`, `sensitivity_twenty`, `sensitivity_twenty_one`, `sensitivity_twenty_two`, `sensitivity_twenty_three`, `sensitivity_twenty_four`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-URE-CS-960', 'LMLS-PAT-KB-0001', 'No Organism Seen', 'No Bacterial Growth', 'Acinetobacter SPP', 'Acinetobacter SPP', 'Acinetobacter SPP', 'Amikacin', '', '', '', 'Amikacin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'LMLS-0001', '2020-03-07 17:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `urine`
--

CREATE TABLE `urine` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `urine_vma` double(10,2) DEFAULT 0.00,
  `urine_calcium` double(10,2) DEFAULT 0.00,
  `urine_uric_acid` double(10,2) DEFAULT 0.00,
  `urine_creatinine` double(10,2) DEFAULT 0.00,
  `serum_creatinine` double(10,2) DEFAULT 0.00,
  `twenty_four_hour_urine_volume` double(10,2) DEFAULT 0.00,
  `clearance` double(10,2) DEFAULT 0.00,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urine`
--

INSERT INTO `urine` (`id`, `invoice_id`, `patient_id`, `urine_vma`, `urine_calcium`, `urine_uric_acid`, `urine_creatinine`, `serum_creatinine`, `twenty_four_hour_urine_volume`, `clearance`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-URN-910', 'LMLS-PAT-KB-0001', 1.00, 2.00, 3.00, 4.00, 5.00, 6.00, 7.00, 'Ljkhjghfgdfx', 'LMLS-0001', '2020-03-08 13:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `urine_acr`
--

CREATE TABLE `urine_acr` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `urea_creatinine` double(10,2) DEFAULT 0.00,
  `urea_creatinine_flag` varchar(25) DEFAULT NULL,
  `micro_albumin_urine` double(10,2) DEFAULT 0.00,
  `micro_albumin_urine_flag` varchar(25) DEFAULT NULL,
  `uacr` double(10,2) DEFAULT 0.00,
  `uacr_flag` varchar(25) DEFAULT NULL,
  `the_uacr` double(10,2) DEFAULT 0.00,
  `mg_g_indicates` varchar(250) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urine_acr`
--

INSERT INTO `urine_acr` (`id`, `invoice_id`, `patient_id`, `urea_creatinine`, `urea_creatinine_flag`, `micro_albumin_urine`, `micro_albumin_urine_flag`, `uacr`, `uacr_flag`, `the_uacr`, `mg_g_indicates`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-URN-ACR-260', 'LMLS-PAT-KB-0001', 1.00, 'Low', 2.00, 'High', 3.00, 'Low', 69.00, 'MICRO ALBUMINURIA', 'Mhbhjcd', 'LMLS-0001', '2020-03-08 14:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `urine_cs`
--

CREATE TABLE `urine_cs` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `pus_cells_per_hps` double(10,2) DEFAULT 0.00,
  `rbcs_per_hpf` double(10,2) DEFAULT 0.00,
  `epitheleal_cells_per_hpf` double(10,2) DEFAULT 0.00,
  `crystals` text DEFAULT NULL,
  `cast` text DEFAULT NULL,
  `gram_reaction` text DEFAULT NULL,
  `yeast_like_cells` text DEFAULT NULL,
  `culture` text DEFAULT NULL,
  `viable_count` double(10,2) DEFAULT 0.00,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urine_cs`
--

INSERT INTO `urine_cs` (`id`, `invoice_id`, `patient_id`, `pus_cells_per_hps`, `rbcs_per_hpf`, `epitheleal_cells_per_hpf`, `crystals`, `cast`, `gram_reaction`, `yeast_like_cells`, `culture`, `viable_count`, `bacteria_one`, `bacteria_two`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-URN-CS-900', 'LMLS-PAT-KB-0001', 1.00, 2.00, 3.00, 'Cruljkhgf', 'Dvbn', 'Gram +ve Cocci Seen', 'Not Seen', 'No Bacterial Growth', 4.00, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Comment', 'LMLS-0001', '2020-03-07 19:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `urine_re`
--

CREATE TABLE `urine_re` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `appearance` text DEFAULT NULL,
  `colour` text DEFAULT NULL,
  `ph` text DEFAULT NULL,
  `specific_gravity` text DEFAULT NULL,
  `protein` text DEFAULT NULL,
  `leucocytes` text DEFAULT NULL,
  `glucose` text DEFAULT NULL,
  `urobilinogen` text DEFAULT NULL,
  `blood` text DEFAULT NULL,
  `ketones` text DEFAULT NULL,
  `bilirubin` text DEFAULT NULL,
  `nitrites` text DEFAULT NULL,
  `bile_pigment` text DEFAULT NULL,
  `bile_salt` text DEFAULT NULL,
  `urobilin` text DEFAULT NULL,
  `pus_cells_per_hps` double(10,2) DEFAULT 0.00,
  `yeast_like_cells` text DEFAULT NULL,
  `epitheleal_cells_per_hpf` double(10,2) DEFAULT 0.00,
  `s_haematobium` text DEFAULT NULL,
  `rbcs_per_hpf` double(10,2) DEFAULT 0.00,
  `bacteria` text DEFAULT NULL,
  `spermatozoa` text DEFAULT NULL,
  `crystals` text DEFAULT NULL,
  `unknown_one` text DEFAULT NULL,
  `cast` text DEFAULT NULL,
  `unknown_two` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urine_re`
--

INSERT INTO `urine_re` (`id`, `invoice_id`, `patient_id`, `appearance`, `colour`, `ph`, `specific_gravity`, `protein`, `leucocytes`, `glucose`, `urobilinogen`, `blood`, `ketones`, `bilirubin`, `nitrites`, `bile_pigment`, `bile_salt`, `urobilin`, `pus_cells_per_hps`, `yeast_like_cells`, `epitheleal_cells_per_hpf`, `s_haematobium`, `rbcs_per_hpf`, `bacteria`, `spermatozoa`, `crystals`, `unknown_one`, `cast`, `unknown_two`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-URN-RE-950', 'LMLS-PAT-KB-0001', 'Blood Stain', 'Amber', '5.0', '1.0000', '', '', '', '', '', '', '', '', '', '', '', 0.00, '', 0.00, '', 0.00, '', 'Negative', 'Present(+)', 'Negative', 'Present(+)', 'Negative', '', 'LMLS-0001', '2020-03-07 20:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(14) NOT NULL,
  `staff_id` varchar(25) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `other_name` varchar(30) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `phone_number` char(10) NOT NULL,
  `phone_number_two` char(10) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(13) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `logged_in_before` int(11) NOT NULL DEFAULT 0,
  `log_in_token` varchar(60) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `reset_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `staff_id`, `first_name`, `last_name`, `other_name`, `gender`, `email_address`, `phone_number`, `phone_number_two`, `username`, `password`, `role`, `branch`, `status`, `logged_in_before`, `log_in_token`, `created_at`, `reset_code`) VALUES
(1, 'LMLS-0000', 'Kofi', 'Amponsah', 'Esquire', 'Male', 'kofi@esquire.com', '0233322112', '', 'esquire', '$2y$11$fOBwFU8wc9OUscyYD4kYKO3GvLmMYMZXn.6G0JbznEXl4SvkbZ69y', '1', 'Korle Bu', 'Active', 1, '$2y$11$MismXkX66wl5y07Lm2qJterobf0ZuBZFYNgrNFuP.PepXOvh.buZ.', '2019-11-02 18:12:30', 'hygtfrdesw'),
(38, 'LMLS-KB-0003', 'Thed', 'Aryee', 'Nii', 'Male', 'thed@aryee.com.gh', '0233322112', '', 'thed', '$2y$11$iCitCGG6yRgEQCBmOiv1uek2y0wyASBUMqspR.DBhPESZXYzBclai', '3', 'Korle Bu', 'Active', 1, '$2y$11$SRBgaYk3CqtKptW1RE/4xu9X/s2VwuT3bRsf5dBnszCzNQYRmeafC', '2019-12-16 16:56:33', 'RK0L281iD8Z'),
(42, 'LMLS-AMA-0001', 'Rita', 'Yamoah', 'Ekua', 'Female', 'ekua@yamoah.com', '0233322112', '0231234567', 'ekua', '$2y$11$BRXR0Cp4wcJQ1ovLINrElO1y1i8ioeEpJbw2S5X.eljU8.BbWn6sq', '2', 'Amasaman', 'Active', 1, '$2y$11$sHhdpBCBSWqWWpfIIdjOAu1MyYGlyqgLE79svXNqWQ/K70Fmhh99a', '2019-12-22 15:26:22', 'LNC5368esRz'),
(44, 'LMLS-KB-0001', 'Robert', 'Adjei Laryea', 'Nii Laryea', 'Male', 'rob@laryea.com', '0551212120', '', 'robert', '$2y$11$yVs58VVHQbpY9aAUg//FCORbrXrclRQlm3mngYuPLefmUJz6BOm/y', '1', 'Korle Bu', 'Active', 1, '$2y$11$6xg1YFA03jFRQblEqxgl.OeSXuuGF.ow17854APq1l9OElexQEhla', '2019-12-22 16:56:23', 'k4NK459x1nF'),
(48, 'LMLS-AMA-0004', 'Trial', 'Staff', '', 'Female', 'trial@admin.com', '0231122334', '', 'trial', '$2y$11$GjuM7eAYhnL9cX.NQsnkO.k.CavUq9QpF182VLTZgBXMgq4eKPqy6', '3', 'Amasaman', 'Active', 0, '$2y$11$1XKyWd65kdbFHwUmcb2yXOe8bcT859zGznokMrMlWVFZZKBI2ZHy6', '2020-02-06 22:18:34', 'BSQq554EMd0'),
(49, 'LMLS-KB-0002', 'Mercy', 'Last', 'Ama', 'Female', 'mercy@kbth.gov.gh', '0501212212', '', 'mercy', '$2y$11$aNRIVY6grhOIGdClvhUa8uI0KiVmiNuDBvbcQNajUw2FyWgAAOXzW', '2', 'Korle Bu', 'Active', 0, '$2y$11$vrPhuSp1jOK9mZKCWX44GOzTPzmD.UbCa957Fll/E/Lx5hp1tpOSm', '2020-03-04 16:10:23', 'c0j6624IoAl'),
(50, 'LMLS-AMA-0002', 'Moses', 'Tetteh', 'Narh', 'Male', 'moses@tetteh.com', '0231122334', '', 'moses', '$2y$11$wnBon4gA2ZdASQzRdToBCOil8ROFjzXTL6UVUYTfPA1Qqvs5xWbD2', '3', 'Amasaman', 'Inactive', 1, '$2y$11$aP8bHkpORPmDyOCPnoJEOurCM6NmP71Jru/.S8s6tjpkQc9bxaRTS', '2020-03-04 16:11:13', 'npGJ712o2Sj'),
(76, 'LMLS-EL-0000', 'Bismark', 'Bediako', 'Adjei', 'Male', 'bismark@bediako.com.gh', '0231122334', '', 'babediako', '$2y$11$diOdiJTVDEK.Rnw37uOKrefBsOzpgCrTGgK0.EB/lVrk2y9mmhCCW', '3', 'East Legon', 'Active', 0, '$2y$11$UnpVEf2T7rMNsvvsVwIwb.sQ3vGbDTYUkeRVSCa3IVyNYy.YOro4C', '2020-07-14 16:12:39', 'EMu1w02YAcZI');

-- --------------------------------------------------------

--
-- Table structure for table `widal`
--

CREATE TABLE `widal` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `typhi_to` varchar(40) DEFAULT NULL,
  `typhi_th` varchar(40) DEFAULT NULL,
  `paratyphi_a_to` varchar(40) DEFAULT NULL,
  `paratyphi_a_th` varchar(40) DEFAULT NULL,
  `paratyphi_b_to` varchar(40) DEFAULT NULL,
  `paratyphi_b_th` varchar(40) DEFAULT NULL,
  `paratyphi_c_to` varchar(40) DEFAULT NULL,
  `paratyphi_c_th` varchar(40) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `widal`
--

INSERT INTO `widal` (`id`, `invoice_id`, `patient_id`, `typhi_to`, `typhi_th`, `paratyphi_a_to`, `paratyphi_a_th`, `paratyphi_b_to`, `paratyphi_b_th`, `paratyphi_c_to`, `paratyphi_c_th`, `comments`, `added_by`, `date_added`) VALUES
(3, 'INV-WDL-790', 'LMLS-PAT-KB-0001', '1/20', '1/40', '1/40', '1/20', '1/20', '1/20', 'Less Than 1/20', 'Less Than 1/20', '', 'LMLS-0001', '2020-03-08 17:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `wound_cs`
--

CREATE TABLE `wound_cs` (
  `id` int(14) NOT NULL,
  `invoice_id` varchar(60) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `gram_stain` text DEFAULT NULL,
  `zn_stain` text DEFAULT NULL,
  `pus_cells` text DEFAULT NULL,
  `fungal_element` text DEFAULT NULL,
  `culture` text DEFAULT NULL,
  `bacteria_one` text DEFAULT NULL,
  `bacteria_two` text DEFAULT NULL,
  `antibiotics_one` text DEFAULT NULL,
  `antibiotics_two` text DEFAULT NULL,
  `antibiotics_three` text DEFAULT NULL,
  `antibiotics_four` text DEFAULT NULL,
  `antibiotics_five` text DEFAULT NULL,
  `antibiotics_six` text DEFAULT NULL,
  `antibiotics_seven` text DEFAULT NULL,
  `antibiotics_eight` text DEFAULT NULL,
  `antibiotics_nine` text DEFAULT NULL,
  `antibiotics_ten` text DEFAULT NULL,
  `antibiotics_eleven` text DEFAULT NULL,
  `antibiotics_twelve` text DEFAULT NULL,
  `antibiotics_thirteen` text DEFAULT NULL,
  `antibiotics_fourteen` text DEFAULT NULL,
  `antibiotics_fifteen` text DEFAULT NULL,
  `antibiotics_sixteen` text DEFAULT NULL,
  `sensitivity_one` text DEFAULT NULL,
  `sensitivity_two` text DEFAULT NULL,
  `sensitivity_three` text DEFAULT NULL,
  `sensitivity_four` text DEFAULT NULL,
  `sensitivity_five` text DEFAULT NULL,
  `sensitivity_six` text DEFAULT NULL,
  `sensitivity_seven` text DEFAULT NULL,
  `sensitivity_eight` text DEFAULT NULL,
  `sensitivity_nine` text DEFAULT NULL,
  `sensitivity_ten` text DEFAULT NULL,
  `sensitivity_eleven` text DEFAULT NULL,
  `sensitivity_twelve` text DEFAULT NULL,
  `sensitivity_thirteen` text DEFAULT NULL,
  `sensitivity_fourteen` text DEFAULT NULL,
  `sensitivity_fifteen` text DEFAULT NULL,
  `sensitivity_sixteen` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `added_by` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wound_cs`
--

INSERT INTO `wound_cs` (`id`, `invoice_id`, `patient_id`, `gram_stain`, `zn_stain`, `pus_cells`, `fungal_element`, `culture`, `bacteria_one`, `bacteria_two`, `antibiotics_one`, `antibiotics_two`, `antibiotics_three`, `antibiotics_four`, `antibiotics_five`, `antibiotics_six`, `antibiotics_seven`, `antibiotics_eight`, `antibiotics_nine`, `antibiotics_ten`, `antibiotics_eleven`, `antibiotics_twelve`, `antibiotics_thirteen`, `antibiotics_fourteen`, `antibiotics_fifteen`, `antibiotics_sixteen`, `sensitivity_one`, `sensitivity_two`, `sensitivity_three`, `sensitivity_four`, `sensitivity_five`, `sensitivity_six`, `sensitivity_seven`, `sensitivity_eight`, `sensitivity_nine`, `sensitivity_ten`, `sensitivity_eleven`, `sensitivity_twelve`, `sensitivity_thirteen`, `sensitivity_fourteen`, `sensitivity_fifteen`, `sensitivity_sixteen`, `comments`, `added_by`, `date_added`) VALUES
(2, 'INV-WND-CS-880', 'LMLS-PAT-KB-0001', 'No Organism Seen', 'AFB Present', 'Present(+)', 'No Fungal Element Seen', 'No Bacterial Growth', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'R', 'R', 'R', 'R', 'S', 'S', 'S', 'S', '', '', '', '', '', '', '', '', '', 'LMLS-0001', '2020-03-07 17:58:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alpha_feto_protein`
--
ALTER TABLE `alpha_feto_protein`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `antenatal_screening`
--
ALTER TABLE `antenatal_screening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ascitic_fluid_cs`
--
ALTER TABLE `ascitic_fluid_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspirate_cs`
--
ALTER TABLE `aspirate_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_cs`
--
ALTER TABLE `blood_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_film_comment`
--
ALTER TABLE `blood_film_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_sugar`
--
ALTER TABLE `blood_sugar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bue_creatinine`
--
ALTER TABLE `bue_creatinine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bue_creatinine_egfr`
--
ALTER TABLE `bue_creatinine_egfr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bue_creatinine_lft`
--
ALTER TABLE `bue_creatinine_lft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bue_creatinine_lipids`
--
ALTER TABLE `bue_creatinine_lipids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calcium_profile`
--
ALTER TABLE `calcium_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardiac_enzyme`
--
ALTER TABLE `cardiac_enzyme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ca_one_five_three`
--
ALTER TABLE `ca_one_five_three`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ca_one_two_five`
--
ALTER TABLE `ca_one_two_five`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cd4_count`
--
ALTER TABLE `cd4_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cea`
--
ALTER TABLE `cea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ckmb`
--
ALTER TABLE `ckmb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clotting_profile`
--
ALTER TABLE `clotting_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compact_chemistry`
--
ALTER TABLE `compact_chemistry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cortisol`
--
ALTER TABLE `cortisol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crp`
--
ALTER TABLE `crp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crp_ultra_sensitive`
--
ALTER TABLE `crp_ultra_sensitive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `csf_biochem`
--
ALTER TABLE `csf_biochem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_reactive_protein`
--
ALTER TABLE `c_reactive_protein`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d_dimers`
--
ALTER TABLE `d_dimers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ear_swab_cs`
--
ALTER TABLE `ear_swab_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `endocervical_swab_cs`
--
ALTER TABLE `endocervical_swab_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esr`
--
ALTER TABLE `esr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estrogen`
--
ALTER TABLE `estrogen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eye_swab_cs`
--
ALTER TABLE `eye_swab_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fbc_3p`
--
ALTER TABLE `fbc_3p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fbc_5p`
--
ALTER TABLE `fbc_5p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fbc_children`
--
ALTER TABLE `fbc_children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folate_b12`
--
ALTER TABLE `folate_b12`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_chemistry`
--
ALTER TABLE `general_chemistry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hba1c`
--
ALTER TABLE `hba1c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hbv_viral_load`
--
ALTER TABLE `hbv_viral_load`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hepatitis_b_profile`
--
ALTER TABLE `hepatitis_b_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hepatitis_markers`
--
ALTER TABLE `hepatitis_markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiv_viral_load`
--
ALTER TABLE `hiv_viral_load`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hormonal_assay`
--
ALTER TABLE `hormonal_assay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hvs_cs`
--
ALTER TABLE `hvs_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hvs_re`
--
ALTER TABLE `hvs_re`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hypersensitive_cpr`
--
ALTER TABLE `hypersensitive_cpr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_pylori_ag`
--
ALTER TABLE `h_pylori_ag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_pylori_ag_blood`
--
ALTER TABLE `h_pylori_ag_blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_pylori_ag_sob`
--
ALTER TABLE `h_pylori_ag_sob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iron_study`
--
ALTER TABLE `iron_study`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ise`
--
ALTER TABLE `ise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lft`
--
ALTER TABLE `lft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lipid_profile`
--
ALTER TABLE `lipid_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mantoux`
--
ALTER TABLE `mantoux`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_alb`
--
ALTER TABLE `m_alb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ntc_screening`
--
ALTER TABLE `ntc_screening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pleural_fluid`
--
ALTER TABLE `pleural_fluid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pregnancy_test`
--
ALTER TABLE `pregnancy_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `protein_electrophoresis`
--
ALTER TABLE `protein_electrophoresis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psa`
--
ALTER TABLE `psa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pth`
--
ALTER TABLE `pth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pus_fluid`
--
ALTER TABLE `pus_fluid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reproductive_assay`
--
ALTER TABLE `reproductive_assay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rheumatology`
--
ALTER TABLE `rheumatology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sc3_sc4`
--
ALTER TABLE `sc3_sc4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semen_analysis`
--
ALTER TABLE `semen_analysis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semen_cs`
--
ALTER TABLE `semen_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serum_hcg_b`
--
ALTER TABLE `serum_hcg_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serum_lipase`
--
ALTER TABLE `serum_lipase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skin_snip`
--
ALTER TABLE `skin_snip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specials`
--
ALTER TABLE `specials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sputum`
--
ALTER TABLE `sputum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sputum_afb`
--
ALTER TABLE `sputum_afb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stool_cs`
--
ALTER TABLE `stool_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stool_re`
--
ALTER TABLE `stool_re`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tft`
--
ALTER TABLE `tft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throat_swab_cs`
--
ALTER TABLE `throat_swab_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `troponin`
--
ALTER TABLE `troponin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urethral_cs`
--
ALTER TABLE `urethral_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urine`
--
ALTER TABLE `urine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urine_acr`
--
ALTER TABLE `urine_acr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urine_cs`
--
ALTER TABLE `urine_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urine_re`
--
ALTER TABLE `urine_re`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widal`
--
ALTER TABLE `widal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wound_cs`
--
ALTER TABLE `wound_cs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alpha_feto_protein`
--
ALTER TABLE `alpha_feto_protein`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `antenatal_screening`
--
ALTER TABLE `antenatal_screening`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ascitic_fluid_cs`
--
ALTER TABLE `ascitic_fluid_cs`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aspirate_cs`
--
ALTER TABLE `aspirate_cs`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3552;

--
-- AUTO_INCREMENT for table `blood_cs`
--
ALTER TABLE `blood_cs`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood_film_comment`
--
ALTER TABLE `blood_film_comment`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood_sugar`
--
ALTER TABLE `blood_sugar`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bue_creatinine`
--
ALTER TABLE `bue_creatinine`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bue_creatinine_egfr`
--
ALTER TABLE `bue_creatinine_egfr`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bue_creatinine_lft`
--
ALTER TABLE `bue_creatinine_lft`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bue_creatinine_lipids`
--
ALTER TABLE `bue_creatinine_lipids`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `calcium_profile`
--
ALTER TABLE `calcium_profile`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cardiac_enzyme`
--
ALTER TABLE `cardiac_enzyme`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ca_one_five_three`
--
ALTER TABLE `ca_one_five_three`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ca_one_two_five`
--
ALTER TABLE `ca_one_two_five`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cd4_count`
--
ALTER TABLE `cd4_count`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cea`
--
ALTER TABLE `cea`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `ckmb`
--
ALTER TABLE `ckmb`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clotting_profile`
--
ALTER TABLE `clotting_profile`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `compact_chemistry`
--
ALTER TABLE `compact_chemistry`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cortisol`
--
ALTER TABLE `cortisol`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crp`
--
ALTER TABLE `crp`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crp_ultra_sensitive`
--
ALTER TABLE `crp_ultra_sensitive`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `csf_biochem`
--
ALTER TABLE `csf_biochem`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `c_reactive_protein`
--
ALTER TABLE `c_reactive_protein`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `d_dimers`
--
ALTER TABLE `d_dimers`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ear_swab_cs`
--
ALTER TABLE `ear_swab_cs`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `endocervical_swab_cs`
--
ALTER TABLE `endocervical_swab_cs`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `esr`
--
ALTER TABLE `esr`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `estrogen`
--
ALTER TABLE `estrogen`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eye_swab_cs`
--
ALTER TABLE `eye_swab_cs`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fbc_3p`
--
ALTER TABLE `fbc_3p`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fbc_5p`
--
ALTER TABLE `fbc_5p`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fbc_children`
--
ALTER TABLE `fbc_children`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `folate_b12`
--
ALTER TABLE `folate_b12`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `general_chemistry`
--
ALTER TABLE `general_chemistry`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hba1c`
--
ALTER TABLE `hba1c`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hbv_viral_load`
--
ALTER TABLE `hbv_viral_load`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hepatitis_b_profile`
--
ALTER TABLE `hepatitis_b_profile`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hepatitis_markers`
--
ALTER TABLE `hepatitis_markers`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hiv_viral_load`
--
ALTER TABLE `hiv_viral_load`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hormonal_assay`
--
ALTER TABLE `hormonal_assay`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hvs_cs`
--
ALTER TABLE `hvs_cs`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hvs_re`
--
ALTER TABLE `hvs_re`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hypersensitive_cpr`
--
ALTER TABLE `hypersensitive_cpr`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `h_pylori_ag`
--
ALTER TABLE `h_pylori_ag`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `h_pylori_ag_blood`
--
ALTER TABLE `h_pylori_ag_blood`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `h_pylori_ag_sob`
--
ALTER TABLE `h_pylori_ag_sob`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `iron_study`
--
ALTER TABLE `iron_study`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ise`
--
ALTER TABLE `ise`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lft`
--
ALTER TABLE `lft`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lipid_profile`
--
ALTER TABLE `lipid_profile`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mantoux`
--
ALTER TABLE `mantoux`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_alb`
--
ALTER TABLE `m_alb`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ntc_screening`
--
ALTER TABLE `ntc_screening`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pleural_fluid`
--
ALTER TABLE `pleural_fluid`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pregnancy_test`
--
ALTER TABLE `pregnancy_test`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `protein_electrophoresis`
--
ALTER TABLE `protein_electrophoresis`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `psa`
--
ALTER TABLE `psa`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pth`
--
ALTER TABLE `pth`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pus_fluid`
--
ALTER TABLE `pus_fluid`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reproductive_assay`
--
ALTER TABLE `reproductive_assay`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `rheumatology`
--
ALTER TABLE `rheumatology`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sc3_sc4`
--
ALTER TABLE `sc3_sc4`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semen_analysis`
--
ALTER TABLE `semen_analysis`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semen_cs`
--
ALTER TABLE `semen_cs`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `serum_hcg_b`
--
ALTER TABLE `serum_hcg_b`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `serum_lipase`
--
ALTER TABLE `serum_lipase`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skin_snip`
--
ALTER TABLE `skin_snip`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specials`
--
ALTER TABLE `specials`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sputum`
--
ALTER TABLE `sputum`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sputum_afb`
--
ALTER TABLE `sputum_afb`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stool_cs`
--
ALTER TABLE `stool_cs`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stool_re`
--
ALTER TABLE `stool_re`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tft`
--
ALTER TABLE `tft`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `throat_swab_cs`
--
ALTER TABLE `throat_swab_cs`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `troponin`
--
ALTER TABLE `troponin`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `urethral_cs`
--
ALTER TABLE `urethral_cs`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `urine`
--
ALTER TABLE `urine`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `urine_acr`
--
ALTER TABLE `urine_acr`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `urine_cs`
--
ALTER TABLE `urine_cs`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `urine_re`
--
ALTER TABLE `urine_re`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `widal`
--
ALTER TABLE `widal`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wound_cs`
--
ALTER TABLE `wound_cs`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
