-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 03:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_dp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_dp`) VALUES
('ASHCS-AD-1', 'Abdullah Noman', 'noman12@gmail.com', 'noman123', 'NlDU6UrD5eLomAkfVkFrpOV1N51XpG8jjy4Lizew.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_date` date NOT NULL,
  `app_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `doctor_id`, `patient_id`, `app_date`, `app_time`) VALUES
('A-1', 'ASHCS-D-2', 'ASHCS-P-1', '2022-07-09', '15:30:00'),
('A-2', 'ASHCS-D-2', 'ASHCS-P-2', '2022-07-11', '17:00:00'),
('A-3', 'ASHCS-D-1', 'ASHCS-P-3', '2022-07-14', '15:30:00'),
('A-4', 'ASHCS-D-3', 'ASHCS-P-3', '2022-07-14', '15:33:00'),
('A-5', 'ASHCS-D-2', 'ASHCS-P-3', '2022-07-14', '15:30:00'),
('A-6', 'ASHCS-D-2', 'ASHCS-P-5', '2022-07-14', '15:35:00'),
('A-7', 'ASHCS-D-1', 'ASHCS-P-6', '2022-07-19', '21:35:00'),
('A-8', 'ASHCS-D-2', 'ASHCS-P-6', '2022-07-19', '21:45:00'),
('A-9', 'ASHCS-D-2', 'ASHCS-P-6', '2022-07-19', '21:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `medicine_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`medicine_id`, `item_name`, `item_quantity`, `unit_price`, `total_price`, `user_id`) VALUES
('M-1', 'Napa', '5', '20', '100', 'ASHCS-P-3'),
('M-2', 'Hexisol', '3', '75', '225', 'ASHCS-P-3');

-- --------------------------------------------------------

--
-- Table structure for table `comissions`
--

CREATE TABLE `comissions` (
  `commission_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comissions`
--

INSERT INTO `comissions` (`commission_id`, `amount`, `purpose`) VALUES
('CM-1', '1', 'Appointment Charge'),
('CM-11', '0.6', 'Appointment Charge'),
('CM-2', '2', 'Appointment Charge'),
('CM-3', '3', 'Medicine Vat'),
('CM-397', '16.25', 'Medicine Vat'),
('CM-4', '1.05', 'Appointment Charge'),
('CM-5', '4', 'Medicine Vat'),
('CM-6', '2', 'Medicine Vat'),
('CM-7', '0.85', 'Appointment Charge'),
('CM-8', '0.6', 'Appointment Charge'),
('CM-9', '0.6', 'Appointment Charge');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `conv_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inbox_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`conv_id`, `inbox_id`, `doctor_id`, `patient_id`, `message`, `reply`) VALUES
('C-1', 'I-1', 'ASHCS-D-2', 'ASHCS-P-1', 'Hello Patient', 'Hi'),
('C-2', 'I-1', 'ASHCS-D-2', 'ASHCS-P-1', 'Hi', 'Hello'),
('C-3', 'I-1', 'ASHCS-D-2', 'ASHCS-P-1', 'Yes', 'No'),
('C-4', 'I-1', 'ASHCS-D-2', 'ASHCS-P-1', 'Hi Doctor', 'Help Me'),
('C-5', 'I-2', 'ASHCS-D-1', 'ASHCS-P-3', 'Hello Doctor! I need help.', 'What Happend!'),
('C-6', 'I-5', 'ASHCS-D-2', 'ASHCS-P-5', 'Hello Doctor! I need help.', ''),
('C-7', 'I-6', 'ASHCS-D-2', 'ASHCS-P-6', 'Hello Doctor! I need help.', ''),
('C-8', 'I-6', 'ASHCS-D-2', 'ASHCS-P-6', 'Hello Doctor! I need help.', ''),
('C-9', 'I-6', 'ASHCS-D-2', 'ASHCS-P-6', 'Hello Doctor! I need help.', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_dp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_specialty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `doctor_name`, `doctor_email`, `doctor_pass`, `doctor_gender`, `doctor_degree`, `doctor_dp`, `doctor_type`, `doctor_specialty`, `status`) VALUES
('ASHCS-D-1', 'Abidur Rahman Nabil', 'nabilrt51@gmail.com', 'nab123', 'Male', 'V56jXy90TeUShG81QEtrfHhUsaCgm1LxMTeESElG.pdf', 'GJZqY8fy8oT3myS7VT7FDAZ0xEjpn7jE7xyCcKAR.jpg', 'Specialist', 'Surgeon', 'Valid'),
('ASHCS-D-2', 'Arpita Datta', 'arpitadatta081@gmail.com', 'arpita123', 'Female', '6PFQCenSExnn5OUlihZWy5Z1aCK75QdcCSZXCtgd.pdf', '9IcwW8VM5IzjPiqAKHLDrQnSlAjTU5QYv8klNrrw.jpg', 'Specialist', 'Gynochologist', 'Valid'),
('ASHCS-D-3', 'Sazin Israk Prioty', '19-41635-3@student.aiub.edu', 'sazin12', 'Female', 'LY5eDz2L8Hx880vwzrQMP17nadYF6hmD34FTCgvF.pdf', 'fxynrT2CfC7WE3xsiMEA8GTRlB5kPrXuc5ZZZmjW.jpg', 'Normal', 'Medicine', 'Blocked');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `amount`, `purpose`, `created`) VALUES
('EXP-1', 4, 'Hosting', '2022-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inboxes`
--

CREATE TABLE `inboxes` (
  `inbox_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inboxes`
--

INSERT INTO `inboxes` (`inbox_id`, `appointment_id`, `doctor_id`, `patient_id`) VALUES
('I-1', 'A-1', 'ASHCS-D-2', 'ASHCS-P-1'),
('I-2', 'A-3', 'ASHCS-D-1', 'ASHCS-P-3'),
('I-3', 'A-4', 'ASHCS-D-3', 'ASHCS-P-3'),
('I-4', 'A-5', 'ASHCS-D-2', 'ASHCS-P-3'),
('I-5', 'A-6', 'ASHCS-D-2', 'ASHCS-P-5'),
('I-6', 'A-9', 'ASHCS-D-2', 'ASHCS-P-6');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `his_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problems` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`his_id`, `problems`) VALUES
('H-1', 'Sour Throat'),
('H-1', 'Bleeding'),
('H-1', 'Headache'),
('H-2', 'Cough'),
('H-2', 'Fever'),
('H-3', 'Gastric'),
('H-3', 'Sour Throat'),
('H-3', 'Allergy'),
('H-3', 'Fever'),
('H-4', 'Gastric'),
('H-4', 'Sour Throat'),
('H-5', 'Gastric'),
('H-5', 'Sour Throat'),
('H-6', 'Gastric'),
('H-6', 'Sour Throat'),
('H-7', 'Gastric'),
('H-7', 'Sour Throat');

-- --------------------------------------------------------

--
-- Table structure for table `medical_histories`
--

CREATE TABLE `medical_histories` (
  `his_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_histories`
--

INSERT INTO `medical_histories` (`his_id`, `doctor_id`, `appointment_id`, `patient_id`) VALUES
('H-1', 'ASHCS-D-2', 'A-1', 'ASHCS-P-1'),
('H-2', 'ASHCS-D-2', 'A-2', 'ASHCS-P-2'),
('H-3', 'ASHCS-D-1', 'A-3', 'ASHCS-P-3'),
('H-4', 'ASHCS-D-3', 'A-4', 'ASHCS-P-3'),
('H-5', 'ASHCS-D-2', 'A-5', 'ASHCS-P-3'),
('H-6', 'ASHCS-D-2', 'A-6', 'ASHCS-P-5'),
('H-7', 'ASHCS-D-2', 'A-9', 'ASHCS-P-6');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medicine_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `medicine_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_type`, `quantity`, `medicine_price`) VALUES
('M-1', 'Napa', 'Tablet', 470, 20),
('M-2', 'Hexisol', 'Dispencer', 24, 75),
('M-4', 'Ciprocin', 'Tablet', 498, 140),
('M-5', 'Savlon', 'Dispencer', 49, 30),
('M-6', 'Morphin', 'Injection', 97, 750),
('M-7', 'Ace', 'Syrup', 300, 45);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_08_024130_create_doctors_table', 1),
(6, '2022_07_08_044700_create_remunerations_table', 2),
(7, '2022_07_08_060351_create_patients_table', 3),
(8, '2022_07_08_060824_create_appointments_table', 4),
(9, '2022_07_08_061225_create_inboxes_table', 5),
(10, '2022_07_08_061420_create_conversations_table', 6),
(11, '2022_07_08_061754_create_medical_histories_table', 7),
(12, '2022_07_08_061949_create_issues_table', 8),
(13, '2022_07_08_062115_create_patient_payments_table', 9),
(14, '2022_07_08_101634_create_reviews_table', 10),
(15, '2022_07_08_165044_create_sellers_table', 11),
(16, '2022_07_08_165109_create_medicines_table', 11),
(17, '2022_07_08_165128_create_orders_table', 11),
(18, '2022_07_08_165145_create_order_details_table', 11),
(19, '2022_07_10_030426_create_admins_table', 12),
(20, '2022_07_10_031430_create_comissions_table', 13),
(21, '2022_07_10_031644_create_expenses_table', 14),
(22, '2022_07_10_033958_create_notices_table', 15),
(23, '2022_07_10_041134_create_premium_payments_table', 16),
(24, '2022_07_10_041850_create_premium_charges_table', 17),
(25, '2022_07_10_092641_create_reports_table', 18),
(26, '2022_07_11_061937_create_carts_table', 19),
(27, '2022_07_30_061308_create_tokens_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notice_id`, `notice_for`, `message`) VALUES
('N-1', 'Doctor', 'Please serve patients with honesty.'),
('N-2', 'Seller', 'Please Add more dispensers to your stock.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `status`, `total_price`, `order_date`) VALUES
('O-1', 'ASHCS-P-1', 'Ordered', 1500, '2022-07-06'),
('O-10', 'ASHCS-P-6', 'Shipped', 309, '2022-07-19'),
('O-2', 'ASHCS-P-2', 'Shipped', 190, '2022-07-08'),
('O-3', 'ASHCS-P-3', 'Cancelled', 1060, '2022-07-11'),
('O-4', 'ASHCS-P-3', 'Cancelled', 76, '2022-07-11'),
('O-5', 'ASHCS-P-3', 'Cancelled', 38, '2022-07-11'),
('O-6', 'ASHCS-P-5', 'Shipped', 808, '2022-07-13'),
('O-7', 'ASHCS-P-3', 'Cancelled', 57, '2022-07-13'),
('O-8', 'ASHCS-P-3', 'Ordered', 57, '2022-07-13'),
('O-9', 'ASHCS-P-6', 'Cancelled', 309, '2022-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `medicine_id`, `quantity`, `unit_price`, `total_price`) VALUES
('O-1', 'M-6', '2', '750', '1500'),
('O-2', 'M-2', '2', '75', '150'),
('O-2', 'M-1', '2', '20', '40'),
('O-3', 'M-6', '1', '750', '750'),
('O-3', 'M-5', '1', '30', '30'),
('O-3', 'M-4', '2', '140', '280'),
('O-4', 'M-1', '4', '20', '80'),
('O-5', 'M-1', '2', '20', '40'),
('O-6', 'M-1', '5', '20', '100'),
('O-6', 'M-6', '1', '750', '750'),
('O-7', 'M-1', '3', '20', '60'),
('O-8', 'M-1', '3', '20', '60'),
('O-9', 'M-1', '5', '20', '100'),
('O-9', 'M-2', '3', '75', '225'),
('O-10', 'M-1', '5', '20', '100'),
('O-10', 'M-2', '3', '75', '225');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_dob` date NOT NULL,
  `patient_dp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `membership_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_email`, `patient_pass`, `patient_gender`, `patient_dob`, `patient_dp`, `membership_type`, `status`) VALUES
('ASHCS-P-1', 'Jakia Sultana', 'abidurrahmannabil.aiub@gmail.com', 'jakia12', 'Female', '2000-01-12', 'HH4sGp8IIngQZi7mOOlrvb5XLCzy2IBqauLy1YIe.jpg', 'Premium', 'Valid'),
('ASHCS-P-2', 'Anahita Hossain', 'anahita@gmail.com', 'ana123', 'Female', '2000-07-03', 'ana.jpg', 'Premium', 'Valid'),
('ASHCS-P-3', 'Nazmul Hossain', 'nazmul@aiub.edu', 'nazmul123', 'Male', '1999-09-21', 'titRNNdfCN813C13kc9Cr1aFruOq9OpSeqDow3Je.jpg', 'Premium', 'Valid'),
('ASHCS-P-4', 'Afnan Shahriar', 'afnan@gmail.com', 'afnan123', 'Male', '2022-07-01', 'FdIO7gxPN68OeTwuS4hoHlqyynPDJp6T8vbcwr7K.jpg', 'Basic', 'Valid'),
('ASHCS-P-5', 'Adety Sarkar', 'adetysarkar@gmail.com', 'adety123', 'Female', '2000-06-09', 'UNS9vUcV5cx7rN3XLK2nUM4jRJyeJTRx17nilK9m.jpg', 'Premium', 'Valid'),
('ASHCS-P-6', 'Jakia Sultana Nupur', 'jakianupur19@gmail.com', 'jakia12', 'Female', '2022-07-19', 'pC3JurlXvkaPSo3tq0jxcfTMbYcOMF9GKKtPKJKH.jpg', 'Premium', 'Valid');

-- --------------------------------------------------------

--
-- Table structure for table `patient_payments`
--

CREATE TABLE `patient_payments` (
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_payments`
--

INSERT INTO `patient_payments` (`payment_id`, `paid_amount`, `doctor_id`, `patient_id`, `appointment_id`) VALUES
('P-1', 10, 'ASHCS-D-2', 'ASHCS-P-1', 'A-1'),
('P-2', 10, 'ASHCS-D-2', 'ASHCS-P-2', 'A-2'),
('P-3', 20, 'ASHCS-D-1', 'ASHCS-P-3', 'A-3'),
('P-4', 16, 'ASHCS-D-3', 'ASHCS-P-3', 'A-4'),
('P-5', 11, 'ASHCS-D-2', 'ASHCS-P-3', 'A-5'),
('P-6', 11, 'ASHCS-D-2', 'ASHCS-P-5', 'A-6'),
('P-7', 11, 'ASHCS-D-2', 'ASHCS-P-6', 'A-9');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `premium_charges`
--

CREATE TABLE `premium_charges` (
  `c_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `premium_charges`
--

INSERT INTO `premium_charges` (`c_id`, `charge`, `discount`) VALUES
('C-1', '25', '10');

-- --------------------------------------------------------

--
-- Table structure for table `premium_payments`
--

CREATE TABLE `premium_payments` (
  `p_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `premium_payments`
--

INSERT INTO `premium_payments` (`p_id`, `amount`, `patient_id`, `method`, `paid_at`) VALUES
('PY-1', '23', 'ASHCS-P-1', 'bKash', '2022-07-10'),
('PY-2', '23', 'ASHCS-P-2', 'Nagad', '2022-07-09'),
('PY-3', '21.25', 'ASHCS-P-3', 'Bkash', '2022-07-10'),
('PY-4', '7.5', 'ASHCS-P-5', 'Bkash', '2022-07-13'),
('PY-5', '7.5', 'ASHCS-P-6', 'Rocket', '2022-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `remunerations`
--

CREATE TABLE `remunerations` (
  `rm_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_per` int(11) NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `remunerations`
--

INSERT INTO `remunerations` (`rm_id`, `visit`, `discount_per`, `doctor_id`) VALUES
('RM-1', '15', 15, 'ASHCS-D-2'),
('RM-2', '25', 15, 'ASHCS-D-1'),
('RM-3', '35', 50, 'ASHCS-D-3');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `against` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rep_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `against`, `reason`, `rep_by`) VALUES
('RP-1', 'ASHCS-P-1', 'He used slang while chatting.', 'ASHCS-D-2');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `r_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `given_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`r_id`, `comment`, `given_by`) VALUES
('R-1', 'The system ui is more refined now.', 'ASHCS-D-2');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `seller_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_dp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`seller_id`, `seller_name`, `seller_pass`, `seller_email`, `seller_dp`) VALUES
('ASHCS-MS-1', 'Ashraful Adhir', 'adhir123', 'adhir@gmail.com', 'TfxzqYhHJTn6UyPWGCMUWOq4t1GmlUoPXwr5yVQz.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `expired_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `user_id`, `token`, `token_for`, `created_at`, `expired_at`) VALUES
(1, 'ASHCS-D-2', '77YFeAJPc9EinUzAZq40brLwv2Ce3pP1DBpHbPaLgFzBXrZylgs1wqz6FwEWImqR', 'Doctor', '2022-07-30 07:05:11', '2022-07-30 07:23:19'),
(3, 'ASHCS-P-1', '8618omGjhv8YFrF0m1ynqt7YmBnXNrU3cP6D4r5kyHrmsyYXAXKQ7oH2eVVIwDGL', 'Patient', '2022-07-30 07:33:58', '2022-07-30 07:34:07'),
(4, 'ASHCS-MS-1', 'ojv2trGIA8HjFhXslR1ZH5TBqzd18GCxUhcJVxWVw4bzumNZFjZcPtOHcKIYJexL', 'Seller', '2022-07-30 07:34:58', '2022-07-30 07:35:02'),
(5, 'ASHCS-AD-1', 'q589i1VP5uWeyViyPSNdUmihnwmpHT8OmpBqtQ8ikluZv658okyWCojCFX06o85O', 'Admin', '2022-07-30 07:35:11', '2022-07-30 07:35:18'),
(6, 'ASHCS-P-1', 'w7PuJSdbn5VakgJ4h4t9KvBDxLPgGeark0mIQp4EyWshFwTNfW3lX6VzcYE5ACus', 'Patient', '2022-07-30 10:37:23', '2022-07-30 10:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD KEY `carts_medicine_id_foreign` (`medicine_id`);

--
-- Indexes for table `comissions`
--
ALTER TABLE `comissions`
  ADD PRIMARY KEY (`commission_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`conv_id`),
  ADD KEY `conversations_doctor_id_foreign` (`doctor_id`),
  ADD KEY `conversations_patient_id_foreign` (`patient_id`),
  ADD KEY `conversations_inbox_id_foreign` (`inbox_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `doctors_doctor_email_unique` (`doctor_email`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inboxes`
--
ALTER TABLE `inboxes`
  ADD PRIMARY KEY (`inbox_id`),
  ADD KEY `inboxes_doctor_id_foreign` (`doctor_id`),
  ADD KEY `inboxes_patient_id_foreign` (`patient_id`),
  ADD KEY `inboxes_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD KEY `issues_his_id_foreign` (`his_id`);

--
-- Indexes for table `medical_histories`
--
ALTER TABLE `medical_histories`
  ADD PRIMARY KEY (`his_id`),
  ADD KEY `medical_histories_doctor_id_foreign` (`doctor_id`),
  ADD KEY `medical_histories_patient_id_foreign` (`patient_id`),
  ADD KEY `medical_histories_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_medicine_id_foreign` (`medicine_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `patients_patient_email_unique` (`patient_email`);

--
-- Indexes for table `patient_payments`
--
ALTER TABLE `patient_payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `patient_payments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_payments_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_payments_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `premium_charges`
--
ALTER TABLE `premium_charges`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `premium_payments`
--
ALTER TABLE `premium_payments`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `premium_payments_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `remunerations`
--
ALTER TABLE `remunerations`
  ADD PRIMARY KEY (`rm_id`),
  ADD KEY `remunerations_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`medicine_id`) ON DELETE CASCADE;

--
-- Constraints for table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conversations_inbox_id_foreign` FOREIGN KEY (`inbox_id`) REFERENCES `inboxes` (`inbox_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conversations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `inboxes`
--
ALTER TABLE `inboxes`
  ADD CONSTRAINT `inboxes_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inboxes_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inboxes_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_his_id_foreign` FOREIGN KEY (`his_id`) REFERENCES `medical_histories` (`his_id`) ON DELETE CASCADE;

--
-- Constraints for table `medical_histories`
--
ALTER TABLE `medical_histories`
  ADD CONSTRAINT `medical_histories_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medical_histories_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medical_histories_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`medicine_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_payments`
--
ALTER TABLE `patient_payments`
  ADD CONSTRAINT `patient_payments_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_payments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_payments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `premium_payments`
--
ALTER TABLE `premium_payments`
  ADD CONSTRAINT `premium_payments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `remunerations`
--
ALTER TABLE `remunerations`
  ADD CONSTRAINT `remunerations_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
