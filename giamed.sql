-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 20, 2026 at 06:51 PM
-- Server version: 9.3.0
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giamed`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_request` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','confirmed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `phone`, `date`, `time`, `special_request`, `status`, `deleted_at`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 'Md. Raian Hossain', '01746611428', '2025-05-07', '00:40', 'Check', 'confirmed', NULL, '127.0.0.1', '2025-05-04 12:35:28', '2025-05-04 22:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `slug`, `description`, `logo`, `cover`, `created_at`, `updated_at`) VALUES
(2, 'Nipro', 'nipro', 'Nipro test description', 'brands/logo/EK18IM2XdjdEgAp6rjEnSig6On2EtuN3MrnV9CtX.jpg', 'brands/cover/sZrfIsxOAbT2xIvHPq4Dn0vXTEMnsYWOPy38uji8.jpg', '2025-04-19 00:39:10', '2025-04-19 00:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('raianisworking@gmail.com|127.0.0.1', 'i:2;', 1776706633),
('raianisworking@gmail.com|127.0.0.1:timer', 'i:1776706633;', 1776706633);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `call_requests`
--

CREATE TABLE `call_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `is_replied` tinyint(1) NOT NULL DEFAULT '0',
  `replied_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `replied_by` bigint UNSIGNED DEFAULT NULL,
  `resolved_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `service_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Machine', 'machine', 'For machines Only', '2025-03-22 11:22:45', '2025-03-22 11:22:45'),
(4, 'Parts', 'parts', 'Check description', '2025-04-19 10:30:36', '2025-04-19 10:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_17_093940_create_services_table', 1),
(10, '2025_03_20_114127_create_call_requests_table', 2),
(11, '2025_03_21_111438_create_categories_table', 2),
(12, '2025_03_21_111604_create_brands_table', 2),
(13, '2025_03_21_111737_create_sub_categories_table', 2),
(14, '2025_03_21_111800_create_products_table', 2),
(16, '2025_05_04_175444_create_appointments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('raianisworking@gmail.com', '$2y$12$Ycf.yzP1q6rR.smhLEcQ9ev.uEulXZey3QdSUQT27batTMUWNqPNm', '2026-04-20 11:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0',
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint UNSIGNED DEFAULT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `price`, `avatar`, `cover`, `active`, `featured`, `quantity`, `tags`, `category_id`, `sub_category_id`, `brand_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(10, 'Air Separator 1', 'air-separator-1', 'An air separator in a kidney dialysis machine is a critical safety component designed to detect and remove air bubbles from the blood before it returns to the patient. This helps prevent air embolism, a potentially life-threatening condition.\r\n\r\nKey Functions of an Air Separator:\r\n\r\n1. Bubble Detection: Uses ultrasonic or optical sensors to detect air in the bloodline.\r\n\r\n\r\n2. Air Removal: Diverts air-contaminated blood into a chamber where air can rise and escape.\r\n\r\n\r\n3. Safety Alarms: Triggers alarms and can stop the blood pump if air is detected, preventing it from entering the patient\'s bloodstream.', 0, 'products/avatars/FJ6iUpbnwYoNpEVVxcDrPKJucPlpoiDIpvDfRSl0.jpg', NULL, 1, 1, 10, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 16:32:31', '2025-05-05 19:26:27'),
(11, 'Air Separator 2', 'air-separator-2', 'The air separator in a kidney dialysis machine—also known as the air trap or venous air trap—is a safety device located in the venous line, just before the blood returns to the patient\'s body.\r\n\r\nPurpose:\r\n\r\n1. Removes air bubbles from the blood to prevent air embolism.\r\n\r\n2. Works alongside air detectors to ensure no air enters the patient’s bloodstream.', 0, 'products/avatars/pCOG9IF2JqPAX67tMchinCmxZOAO7uk6gwZJ15cX.jpg', NULL, 1, 1, 10, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 16:35:03', '2025-05-05 19:26:33'),
(12, 'Air Separator 3', 'air-separator-3', 'The air separator in a kidney dialysis machine is a critical safety component designed to remove air bubbles from the blood before it returns to the patient. Here\'s a brief explanation of its function and importance:\r\n\r\nFunction of the Air Separator:\r\n\r\nLocation: Usually found in the venous line of the extracorporeal blood circuit.\r\n\r\nPurpose: Eliminates any air that may have entered the bloodline during dialysis.\r\n\r\nMechanism: Often uses a chamber where blood slows down, allowing air to rise and be vented out. Some systems may use ultrasonic detectors or optical sensors to monitor for air.', 0, 'products/avatars/sBuz4eBQL8OfwTWCqwoJrGlC9aTrBm0YBgWmP73v.jpg', NULL, 1, 1, 10, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 16:39:42', '2025-05-05 19:26:39'),
(13, 'Balancing Chamber 1', 'balancing-chamber-1', 'The balancing chamber in a kidney dialysis machine plays a crucial role in maintaining fluid balance during the dialysis process. Here\'s a clear explanation:\r\n\r\nFunction of the Balancing Chamber:\r\n\r\nIn hemodialysis, waste and excess fluid are removed from the patient\'s blood by a dialysate solution. The balancing chamber ensures that:\r\n\r\n1. Equal volumes of fresh and used dialysate are exchanged.\r\n\r\n\r\n2. Precise ultrafiltration control is maintained (i.e., the amount of fluid removed from the blood).\r\n\r\n\r\n\r\nHow It Works:\r\n\r\n1. The balancing chamber typically uses a set of dual compartments (often a diaphragm or piston system):\r\n\r\n2. One side fills with fresh dialysate while the other side receives the used dialysate.\r\n\r\n3. These compartments alternate and swap volumes in a synchronized way.\r\n\r\n4. Sensors and valves ensure exact matching, preventing fluid imbalances that could harm the patient.', 0, 'products/avatars/2p3iiApOIodFvYFOb9QGHsbRi5JbRAmKASCNJkLs.jpg', NULL, 1, 1, 15, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 16:48:24', '2025-05-05 16:53:36'),
(14, 'Balancing Chamber 2', 'balancing-chamber-2', 'The balancing chamber in a kidney dialysis machine is a critical component used to maintain precise fluid balance between the dialysate entering and exiting the dialyzer. This is essential to protect the patient from fluid overload or dehydration during dialysis.', 0, 'products/avatars/APlNbVTXfUsB6erGhI8GG1vxZnXSx9EGwY3UWKB6.jpg', NULL, 1, 1, 15, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 16:53:00', '2025-05-05 16:53:00'),
(15, 'Blood pump motor 1', 'blood-pump-motor-1', 'The blood pump motor in a kidney dialysis machine plays a crucial role in moving the patient’s blood through the extracorporeal circuit, which includes the dialyzer (artificial kidney). Here’s an overview of its function and characteristics:\r\n\r\nFunction:\r\n\r\nThe blood pump motor drives a roller pump, which compresses flexible tubing to propel blood at a controlled and continuous rate.\r\n\r\nIt ensures a precise blood flow rate, usually between 150 to 500 mL/min, depending on treatment needs.\r\n\r\nThe consistent flow is critical for effective waste removal and maintaining patient safety.', 0, 'products/avatars/O2N9qW79GooZzqBfY2wEb6FLONyTQzKsJW0waVjR.jpg', NULL, 1, 1, 20, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 17:03:24', '2025-05-05 17:30:39'),
(16, 'Blood pump motor 2', 'blood-pump-motor-2', 'The blood pump motor in a kidney dialysis machine is a critical component responsible for driving blood through the dialysis circuit. Here is a more detailed technical overview:\r\n\r\n1. Function:\r\nThe motor powers a peristaltic (roller) pump that pushes the patient’s blood through the dialysis tubing and dialyzer.\r\nIt must maintain steady, accurate flow rates to ensure efficient dialysis and patient safety.', 0, 'products/avatars/g3r0PyaURY6tFxjA5gT0U5X2sxG9Xep3kypzjUUH.jpg', NULL, 1, 1, 20, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 17:06:02', '2025-05-05 17:06:02'),
(17, 'Blood pump motor 3', 'blood-pump-motor-3', 'The blood pump motor in a kidney dialysis machine plays a crucial role in moving the patient’s blood through the extracorporeal circuit, which includes the dialyzer (artificial kidney). Here’s an overview of its function and characteristics:\r\n\r\nFunction:\r\n\r\nThe blood pump motor drives a roller pump, which compresses flexible tubing to propel blood at a controlled and continuous rate.\r\n\r\nIt ensures a precise blood flow rate, usually between 150 to 500 mL/min, depending on treatment needs.\r\n\r\nThe consistent flow is critical for effective waste removal and maintaining patient safety.\r\n\r\n\r\nKey Features:\r\n\r\nBrushless DC motors are commonly used for reliability, low noise, and precise speed control.\r\n\r\nEquipped with feedback sensors (like Hall effect sensors or encoders) for accurate speed regulation.\r\n\r\nMust be biocompatible and easy to disinfect, as it operates near patient-contact components.\r\n\r\nEmergency stop and alarm integration for safety in case of occlusion or malfunction.', 0, 'products/avatars/QPIJ4A94taBGhQAOSWoIcnxXmiMbLuvuc6xeRDMt.jpg', NULL, 1, 1, 20, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 17:08:17', '2025-05-05 17:08:17'),
(18, 'Blood pump motor 4', 'blood-pump-motor-4', 'The blood pump motor in kidney dialysis machines plays a critical role in the extracorporeal circuit—the system that moves blood outside the body for cleaning. Here’s a quick breakdown of its function and importance:\r\n\r\nFunction:\r\n\r\nThe blood pump motor drives a peristaltic pump (roller pump), which gently moves the patient\'s blood from their body, through the dialyzer (artificial kidney), and back.\r\n\r\nIt controls the blood flow rate, typically between 200–500 mL/min, ensuring efficient waste removal without harming the patient.\r\n\r\n\r\nKey Characteristics:\r\n\r\nPrecision and consistency: Flow rate must be accurate and stable.\r\n\r\nBiocompatibility: It does not come in contact with the blood directly, but it must handle tubing safely and reliably.\r\n\r\nQuiet and vibration-free: To ensure patient comfort and minimize mechanical wear.\r\n\r\nSpeed control: Adjustable speed settings help tailor dialysis to individual patient needs.', 0, 'products/avatars/dUCyKCTNbteuCaHKiSPWyAN01ezR2PPlpPdFOPHb.jpg', NULL, 1, 1, 20, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 17:21:02', '2025-05-05 17:21:02'),
(19, 'Blood pump motor 5', 'blood-pump-motor-5', 'The blood pump motor in kidney dialysis machines plays a critical role in the extracorporeal circuit—the system that moves blood outside the body for cleaning. Here’s a quick breakdown of its function and importance:\r\n\r\nFunction:\r\n\r\nThe blood pump motor drives a peristaltic pump (roller pump), which gently moves the patient\'s blood from their body, through the dialyzer (artificial kidney), and back.\r\n\r\nIt controls the blood flow rate, typically between 200–500 mL/min, ensuring efficient waste removal without harming the patient.\r\n\r\n\r\nKey Characteristics:\r\n\r\nPrecision and consistency: Flow rate must be accurate and stable.\r\n\r\nBiocompatibility: It does not come in contact with the blood directly, but it must handle tubing safely and reliably.\r\n\r\nQuiet and vibration-free: To ensure patient comfort and minimize mechanical wear.\r\n\r\nSpeed control: Adjustable speed settings help tailor dialysis to individual patient needs.', 0, 'products/avatars/HMPRNiarL3cExqLoTUL6dHqKGMPNo69e5QLSh9Pz.jpg', NULL, 1, 1, 20, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 17:23:23', '2025-05-05 17:23:23'),
(20, 'Blood pump motor 6', 'blood-pump-motor-6', 'The blood pump motor in kidney dialysis machines plays a critical role in the extracorporeal circuit—the system that moves blood outside the body for cleaning. Here’s a quick breakdown of its function and importance:\r\n\r\nFunction:\r\n\r\nThe blood pump motor drives a peristaltic pump (roller pump), which gently moves the patient\'s blood from their body, through the dialyzer (artificial kidney), and back.\r\n\r\nIt controls the blood flow rate, typically between 200–500 mL/min, ensuring efficient waste removal without harming the patient.\r\n\r\n\r\nKey Characteristics:\r\n\r\nPrecision and consistency: Flow rate must be accurate and stable.\r\n\r\nBiocompatibility: It does not come in contact with the blood directly, but it must handle tubing safely and reliably.\r\n\r\nQuiet and vibration-free: To ensure patient comfort and minimize mechanical wear.\r\n\r\nSpeed control: Adjustable speed settings help tailor dialysis to individual patient needs.', 0, 'products/avatars/IXJ2kWwrqcVkge7moEbxeZMXKRsga0ZMoiExqTDb.jpg', NULL, 1, 1, 20, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 17:26:07', '2025-05-05 17:26:07'),
(21, 'Acid concentrate pump 1', 'acid-concentrate-pump-1', 'The acid concentrate pump in a kidney dialysis machine is part of the fluid delivery system that prepares the dialysate, the special fluid used to clean the blood during dialysis.\r\n\r\nAcid Concentrate Pump – Overview\r\n\r\nFunction:\r\n\r\nPumps acid concentrate (usually containing acetic or citric acid, electrolytes) from its container into a mixing chamber.\r\n\r\nMixes it with bicarbonate concentrate and purified water to create dialysate with the right chemical composition.', 0, 'products/avatars/Miqq6JQj46C5YqHFIwPTABthf4cVfUvZeHeBDWib.jpg', NULL, 1, 1, 10, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 17:29:26', '2025-05-05 17:29:26'),
(22, 'Acid concentrate pump 2', 'acid-concentrate-pump-2', 'The acid concentrate pump in a kidney dialysis machine plays a key role in preparing the dialysate, the solution that helps remove waste and excess fluid from the patient’s blood during dialysis.\r\n\r\nAcid Concentrate Pump – Detailed Overview\r\n\r\nPurpose:\r\n\r\nPumps acid concentrate (which contains essential electrolytes and an acid like acetic, citric, or hydrochloric acid) into the dialysate mixing system.\r\n\r\nIt works together with a bicarbonate concentrate pump and purified water to produce dialysate in the correct ratio.', 0, 'products/avatars/jHrPkVLgXMuBChOL2n01JcLUVK6QNOEfPk3C1Br8.jpg', NULL, 1, 1, 10, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 17:33:31', '2025-05-05 17:33:31'),
(23, 'Acid concentrate pump 3', 'acid-concentrate-pump-3', 'The acid concentrate pump in a kidney dialysis machine (specifically, in a hemodialysis machine) plays a crucial role in preparing the dialysate, which is the fluid used to help remove waste products from the patient\'s blood.\r\n\r\nFunction of the Acid Concentrate Pump:\r\n\r\nMixing Dialysate: The pump draws acid concentrate (which contains electrolytes like sodium, chloride, potassium, calcium, magnesium, and an acid such as acetic or citric acid) from a storage container.\r\n\r\nIt then mixes this concentrate with bicarbonate concentrate and purified water in precise proportions to create the final dialysate solution.\r\n\r\nThis dialysate is then delivered to the dialyzer (artificial kidney) where it interacts with the patient’s blood across a semi-permeable membrane.', 0, 'products/avatars/KAhZbDq6QiIz4t64J2A9DJntRqFp9dwM8XAgk5NI.jpg', NULL, 1, 1, 10, NULL, 4, 3, NULL, NULL, NULL, '2025-05-05 18:04:41', '2025-05-05 18:04:41'),
(24, 'Deaeration motor 1', 'deaeration-motor-1', 'The deaeration motor in a kidney dialysis machine is part of the deaeration system, which removes air bubbles from the dialysate (the fluid used to draw waste from the blood). Air bubbles can cause problems such as:\r\n\r\nImpaired dialysis efficiency\r\n\r\nRisk of embolism if air enters the bloodstream\r\n\r\nSensor malfunction due to incorrect flow readings\r\n\r\n\r\nKey Functions of the Deaeration Motor:\r\n\r\n1. Drives the deaeration pump or mechanism to circulate dialysate through a deaeration chamber.\r\n\r\n\r\n2. Helps remove entrapped air using vacuum or centrifugal forces.\r\n\r\n\r\n3. Ensures continuous, bubble-free dialysate flow for safe and efficient dialysis.', 0, 'products/avatars/UH1brv0akQClV3CxfWixNhb3924iQ1V4GCADqEOm.jpg', NULL, 1, 1, 10, NULL, 4, 2, NULL, NULL, NULL, '2025-05-05 18:19:52', '2025-05-05 18:19:52'),
(25, 'Deaeration motor 2', 'deaeration-motor-2', 'The deaeration motor in a kidney dialysis machine plays a critical role in ensuring the safe and efficient operation of the system by helping remove air bubbles from the dialysate before it enters the dialyzer (filter). Here\'s a more technical breakdown:\r\n\r\nDeaeration Motor: Overview\r\n\r\nPurpose:\r\nTo drive the mechanical components of the deaeration system, typically a pump or impeller, that removes dissolved gases or air bubbles from the dialysate fluid.', 0, 'products/avatars/iBd4zEO7XN315aRxtyHqbdpO4le7Mjt18pvG2YmN.jpg', NULL, 1, 1, 10, NULL, 4, 2, NULL, NULL, NULL, '2025-05-05 18:26:11', '2025-05-05 18:26:11'),
(26, 'Deaeration motor 3', 'deaeration-motor-3', 'The deaeration motor in a kidney dialysis machine is a small but essential electric motor that powers the deaeration pump or centrifugal device responsible for removing air bubbles from the dialysate fluid. This is crucial because air bubbles in the fluid path can compromise dialysis safety and performance.\r\n\r\nKey Points:\r\n\r\nFunction: Drives a component (e.g., a centrifugal impeller or vacuum pump) that removes dissolved gases or entrained air from the dialysate.\r\n\r\nPlacement: Located in the dialysate circuit, typically after mixing and heating, and before the dialysate enters the dialyzer.\r\n\r\nImportance:\r\n\r\nPrevents air embolism (if air gets into the blood).\r\n\r\nEnsures accurate flow readings and prevents sensor errors.\r\n\r\nMaintains stable pressure and flow of dialysate.', 0, 'products/avatars/sd8R2WrglH5vB8wedYyagQz203Ti6aVmSmcaU0cT.jpg', NULL, 1, 1, 10, NULL, 4, 2, NULL, NULL, NULL, '2025-05-05 18:28:12', '2025-05-05 18:28:12'),
(27, 'Dual port valve 1', 'dual-port-valve-1', 'The \"dual port value\" in a kidney dialysis machine typically refers to a dual-port valve used in the fluid management system. It helps control the flow of fluids such as dialysate, waste, and blood. Here\'s a breakdown:\r\n\r\nDual-Port Valve in Dialysis:\r\n\r\nFunction: Allows two pathways for fluid flow — often used to alternate or switch between fluid input and output lines.\r\n\r\nPurpose: Ensures proper direction and volume control of dialysate and blood during dialysis.\r\n\r\nApplication: Can be part of the balancing chamber, dialysate delivery system, or blood circuit.', 0, 'products/avatars/oB0ZMMLcvVWLvwjPArSABM1cRvYcd5nqCm4wqh0f.jpg', NULL, 1, 1, 15, NULL, 4, 2, NULL, NULL, NULL, '2025-05-05 18:39:32', '2025-05-05 18:39:32'),
(28, 'Dual port valve 2', 'dual-port-valve-2', 'The \"dual port value\" in a kidney dialysis machine typically refers to a dual-port valve used in the fluid management system. It helps control the flow of fluids such as dialysate, waste, and blood. Here\'s a breakdown:\r\n\r\nDual-Port Valve in Dialysis:\r\n\r\nFunction: Allows two pathways for fluid flow — often used to alternate or switch between fluid input and output lines.\r\n\r\nPurpose: Ensures proper direction and volume control of dialysate and blood during dialysis.\r\n\r\nApplication: Can be part of the balancing chamber, dialysate delivery system, or blood circuit.\r\n\r\n\r\nKey Characteristics:\r\n\r\nPrecise control: Maintains proper pressure and flow rate.\r\n\r\nSafety: Prevents backflow and cross-contamination.\r\n\r\nAutomation: Often controlled electronically in modern machines.', 0, 'products/avatars/TpDsUlAyxyOgWP40er90xflFcwEOa8PgXN6brswE.jpg', NULL, 1, 1, 15, NULL, 4, 2, NULL, NULL, NULL, '2025-05-05 18:41:21', '2025-05-05 18:41:21'),
(29, 'Dual port valve 3', 'dual-port-valve-3', 'The dual port valve in a kidney dialysis machine is a critical component used to control and direct the flow of fluids such as dialysate, blood, and waste fluids. Here\'s a more detailed explanation:\r\nWhat is a Dual Port Valve in Dialysis Machines?\r\n\r\nA dual port valve is a two-way valve that manages the flow between two ports or channels. In the context of dialysis, it plays a key role in fluid regulation.\r\n\r\nFunctions in a Dialysis Machine:\r\n\r\n1. Dialysate Flow Control: Regulates the fresh and used dialysate between the dialyzer and the machine.\r\n\r\n\r\n2. Switching Paths: Helps alternate flow between input and output lines or between different dialysate batches.\r\n\r\n\r\n3. Safety Mechanism: Prevents mixing of clean and used fluids.\r\n\r\n\r\n4. Precision: Ensures correct flow rates and volumes, essential for patient safety.', 0, 'products/avatars/AsR4G87aGp2zUgYPMLlz6VfDjRBPFFQhoWIRnUKu.jpg', NULL, 1, 1, 15, NULL, 4, 2, NULL, NULL, NULL, '2025-05-05 18:43:37', '2025-05-05 18:43:37'),
(30, 'Flow Motor 1', 'flow-motor-1', 'In a kidney dialysis machine, the flow motor plays a crucial role in ensuring the proper circulation and pressure of dialysate (the dialysis fluid) and blood through the system. Here\'s how it typically functions:\r\n\r\nFlow Motor Functions in a Dialysis Machine:\r\n\r\n1. Blood Pump Motor:\r\n\r\nControls the flow rate of the patient\'s blood through the dialysis circuit.\r\n\r\nEnsures steady flow to allow efficient diffusion and filtration.\r\n\r\nUsually operates at rates of 200–500 mL/min.\r\n\r\n\r\n\r\n2. Dialysate Pump Motor:\r\n\r\nRegulates the flow of dialysate across the dialyzer membrane.\r\n\r\nMaintains precise concentrations of electrolytes and waste-removal efficiency.\r\n\r\nCommonly flows at 500–800 mL/min.\r\n\r\n\r\n\r\n3. Ultrafiltration Control (UF Pump):\r\n\r\nMotor-driven pumps manage the amount of fluid removed from the patient\'s blood.\r\n\r\nAdjusts based on the desired fluid removal rate.\r\n\r\n\r\n\r\n4. Heparin Pump Motor:\r\n\r\nSlowly and precisely administers anticoagulant (heparin) to prevent clotting in the extracorporeal circuit.', 0, 'products/avatars/4SfkaRBZhvqTJArAe3l7P0CEWbK4ra7zOiH3UXRm.jpg', NULL, 1, 1, 20, NULL, 4, 2, NULL, NULL, NULL, '2025-05-05 18:50:08', '2025-05-05 18:50:08'),
(31, 'Flow motor 2', 'flow-motor-2', 'In a kidney dialysis machine, the flow motor plays a crucial role in ensuring the proper circulation and pressure of dialysate (the dialysis fluid) and blood through the system. Here\'s how it typically functions:\r\n\r\nFlow Motor Functions in a Dialysis Machine:\r\n\r\n1. Blood Pump Motor:\r\n\r\nControls the flow rate of the patient\'s blood through the dialysis circuit.\r\n\r\nEnsures steady flow to allow efficient diffusion and filtration.\r\n\r\nUsually operates at rates of 200–500 mL/min.\r\n\r\n\r\n\r\n2. Dialysate Pump Motor:\r\n\r\nRegulates the flow of dialysate across the dialyzer membrane.\r\n\r\nMaintains precise concentrations of electrolytes and waste-removal efficiency.\r\n\r\nCommonly flows at 500–800 mL/min.\r\n\r\n\r\n\r\n3. Ultrafiltration Control (UF Pump):\r\n\r\nMotor-driven pumps manage the amount of fluid removed from the patient\'s blood.\r\n\r\nAdjusts based on the desired fluid removal rate.\r\n\r\n\r\n\r\n4. Heparin Pump Motor:\r\n\r\nSlowly and precisely administers anticoagulant (heparin) to prevent clotting in the extracorporeal circuit.', 0, 'products/avatars/O82v56wmeuUau0DfRff7cTaGU2OR5m5qmDnBzTL1.jpg', NULL, 1, 1, 20, NULL, 4, 2, NULL, NULL, NULL, '2025-05-05 18:51:31', '2025-05-05 18:51:31'),
(32, 'Flow motor 3', 'flow-motor-3', 'In a kidney dialysis machine, the flow motor plays a crucial role in ensuring the proper circulation and pressure of dialysate (the dialysis fluid) and blood through the system. Here\'s how it typically functions:\r\n\r\nFlow Motor Functions in a Dialysis Machine:\r\n\r\n1. Blood Pump Motor:\r\n\r\nControls the flow rate of the patient\'s blood through the dialysis circuit.\r\n\r\nEnsures steady flow to allow efficient diffusion and filtration.\r\n\r\nUsually operates at rates of 200–500 mL/min.\r\n\r\n\r\n\r\n2. Dialysate Pump Motor:\r\n\r\nRegulates the flow of dialysate across the dialyzer membrane.\r\n\r\nMaintains precise concentrations of electrolytes and waste-removal efficiency.\r\n\r\nCommonly flows at 500–800 mL/min.\r\n\r\n\r\n\r\n3. Ultrafiltration Control (UF Pump):\r\n\r\nMotor-driven pumps manage the amount of fluid removed from the patient\'s blood.\r\n\r\nAdjusts based on the desired fluid removal rate.\r\n\r\n\r\n\r\n4. Heparin Pump Motor:\r\n\r\nSlowly and precisely administers anticoagulant (heparin) to prevent clotting in the extracorporeal circuit.', 0, 'products/avatars/xD7YRuzSH2gsBZbP2U0fy4LAHAjk8qx0NfWTCe6n.jpg', NULL, 1, 1, 20, NULL, 4, 2, NULL, NULL, NULL, '2025-05-05 18:52:23', '2025-05-05 18:52:23'),
(33, 'Fresenius 2008k', 'fresenius-2008k', 'The Fresenius 2008K is a hemodialysis machine designed specifically for patients with chronic kidney failure (end-stage renal disease). It is one of the most commonly used machines in dialysis clinics across the world due to its robust performance, safety features, and ease of use.\r\n\r\nOverview of the Fresenius 2008K Dialysis Machine\r\n\r\nPurpose:\r\n\r\nTo perform hemodialysis, which removes waste, excess fluids, and toxins from the blood when the kidneys are no longer functioning properly.\r\n\r\n\r\nHow It Works:\r\n\r\nBlood is drawn from the patient and passed through a dialyzer (artificial kidney).\r\n\r\nThe machine pumps the blood, controls dialysate flow, and monitors treatment parameters like blood pressure, ultrafiltration rate, and conductivity.', 0, 'products/avatars/aws7YPuV00lqZzdPNvZUlAEHH4rx0p2nGKdMFA5q.jpg', NULL, 1, 1, 20, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 18:58:59', '2025-05-05 18:58:59'),
(34, 'Fresenius 2008T', 'fresenius-2008t', 'The Fresenius 2008T is a widely used hemodialysis machine designed for the treatment of patients with end-stage renal disease (ESRD). It is part of Fresenius Medical Care\'s line of dialysis systems and is known for its reliability, safety features, and advanced therapy options.\r\n\r\nKey Features of the Fresenius 2008T:\r\n\r\nTouchscreen Interface: Easy-to-use touch panel for simplified operation and monitoring.\r\n\r\nAutomated Functions: Auto priming, rinsing, and cleaning to save staff time and ensure consistency.\r\n\r\nBlood Volume Monitoring (BVM): Helps track and manage the patient’s blood volume during treatment.\r\n\r\nOnline Clearance Monitoring (OCM): Provides real-time feedback on dialysis adequacy (Kt/V).\r\n\r\nUltrafiltration Profiling: Enables more precise fluid removal strategies to enhance patient comfort.\r\n\r\nCompatibility with NxStage and Central Delivery Systems.', 0, 'products/avatars/OBY2EVrgNPVox6xNmQoWfKiX4ytPTo3rnyKXimQE.jpg', NULL, 1, 1, 15, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 19:06:21', '2025-05-05 19:06:21'),
(35, 'Front panel K-2', 'front-panel-k-2', 'Front panel K-2 of kidney dialysis machine', 0, 'products/avatars/vrIdF6FsncQPU7kCDZPqujyslAplta2a89xR0Ocf.jpg', NULL, 1, 1, 10, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 19:12:15', '2025-05-05 19:12:15'),
(36, 'Front panel K-2 2', 'front-panel-k-2-2', 'Front panel K-2 of kidney dialysis machine', 0, 'products/avatars/BESmVXsnwPekA44rrbhJnnHYgZJaPugMUOgBrRon.jpg', NULL, 1, 1, 10, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 19:13:34', '2025-05-05 19:13:34'),
(37, 'Hydro Chamber 1', 'hydro-chamber-1', 'The hydro chamber in a kidney dialysis machine (also known as a hemodialysis machine) isn\'t a standard term commonly used in nephrology or dialysis equipment documentation. However, you might be referring to one of the following components related to fluid control in dialysis:\r\n\r\n1. Hydraulic chamber – A component that helps manage the pressures and flow of dialysate and blood, ensuring the machine functions properly and safely. It may involve part of the ultrafiltration system, which controls fluid removal from the patient.\r\n\r\n\r\n2. Dialysate chamber – The area where dialysate flows through the machine. It maintains the correct composition and pressure, and helps with filtering waste and excess water from the blood.\r\n\r\n\r\n3. Pressure chamber – In some systems, there\'s a chamber that helps regulate transmembrane pressure (TMP) across the dialyzer membrane, ensuring proper fluid exchange.', 0, 'products/avatars/DTQHkHbHQ5Sjqhjc3QdXFAEcqthEmab9Wo1xwpuj.jpg', NULL, 1, 1, 15, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 19:21:05', '2025-05-05 19:21:05'),
(38, 'Hydro chamber 2', 'hydro-chamber-2', 'The hydro chamber in a kidney dialysis machine (also known as a hemodialysis machine) isn\'t a standard term commonly used in nephrology or dialysis equipment documentation. However, you might be referring to one of the following components related to fluid control in dialysis:\r\n\r\n1. Hydraulic chamber – A component that helps manage the pressures and flow of dialysate and blood, ensuring the machine functions properly and safely. It may involve part of the ultrafiltration system, which controls fluid removal from the patient.\r\n\r\n\r\n2. Dialysate chamber – The area where dialysate flows through the machine. It maintains the correct composition and pressure, and helps with filtering waste and excess water from the blood.\r\n\r\n\r\n3. Pressure chamber – In some systems, there\'s a chamber that helps regulate transmembrane pressure (TMP) across the dialyzer membrane, ensuring proper fluid exchange.', 0, 'products/avatars/KgEP3fEOvTJbKjhNqplBnhvOfsH3F1P6k9p9TmUZ.jpg', NULL, 1, 1, 15, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 19:21:54', '2025-05-05 19:21:54'),
(39, 'Hydro chamber 3', 'hydro-chamber-3', 'The hydro chamber in a kidney dialysis machine (also known as a hemodialysis machine) isn\'t a standard term commonly used in nephrology or dialysis equipment documentation. However, you might be referring to one of the following components related to fluid control in dialysis:\r\n\r\n1. Hydraulic chamber – A component that helps manage the pressures and flow of dialysate and blood, ensuring the machine functions properly and safely. It may involve part of the ultrafiltration system, which controls fluid removal from the patient.\r\n\r\n\r\n2. Dialysate chamber – The area where dialysate flows through the machine. It maintains the correct composition and pressure, and helps with filtering waste and excess water from the blood.\r\n\r\n\r\n3. Pressure chamber – In some systems, there\'s a chamber that helps regulate transmembrane pressure (TMP) across the dialyzer membrane, ensuring proper fluid exchange.', 0, 'products/avatars/lgVsqUNhJzgayYY0e4fdaKOiZMphggavo8XOAb6C.jpg', NULL, 1, 1, 15, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 19:22:46', '2025-05-05 19:22:46'),
(40, 'Power supply 1', 'power-supply-1', 'Kidney dialysis machines require a stable and reliable power supply because they support life-critical functions. Here’s an overview of the power supply system typically used:\r\n\r\n1. Main Power Supply\r\n\r\nVoltage: Typically powered by standard AC mains (110–240V, depending on region).\r\n\r\nFrequency: 50/60 Hz.\r\n\r\nConversion: Internally converted to regulated DC power for the electronic and mechanical components (e.g., pumps, sensors, displays).\r\n\r\n\r\n2. Uninterruptible Power Supply (UPS)\r\n\r\nMost machines are connected to a UPS to provide backup power in case of mains failure.\r\n\r\nAllows safe shutdown or temporary continuation of treatment.\r\n\r\n\r\n3. Internal Battery Backup (Optional)\r\n\r\nSome units, especially portable or home dialysis machines, include a built-in battery.\r\n\r\nProvides 15–30 minutes (or more) of emergency operation to prevent abrupt treatment stoppage.\r\n\r\n\r\n4. Power Management Features\r\n\r\nSurge protection to guard sensitive electronics.\r\n\r\nAlarms for power failure or fluctuations.\r\n\r\nIsolation transformers to protect patients from electrical shocks.', 0, 'products/avatars/wOdop9e0XI0gMN9Cv2qxPUXpkEmzSdtISWrKkRfv.jpg', NULL, 1, 1, 20, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 19:30:56', '2025-05-05 19:30:56'),
(41, 'Power supply 2', 'power-supply-2', 'Kidney dialysis machines require a stable and reliable power supply because they support life-critical functions. Here’s an overview of the power supply system typically used:\r\n\r\n1. Main Power Supply\r\n\r\nVoltage: Typically powered by standard AC mains (110–240V, depending on region).\r\n\r\nFrequency: 50/60 Hz.\r\n\r\nConversion: Internally converted to regulated DC power for the electronic and mechanical components (e.g., pumps, sensors, displays).\r\n\r\n\r\n2. Uninterruptible Power Supply (UPS)\r\n\r\nMost machines are connected to a UPS to provide backup power in case of mains failure.\r\n\r\nAllows safe shutdown or temporary continuation of treatment.\r\n\r\n\r\n3. Internal Battery Backup (Optional)\r\n\r\nSome units, especially portable or home dialysis machines, include a built-in battery.\r\n\r\nProvides 15–30 minutes (or more) of emergency operation to prevent abrupt treatment stoppage.\r\n\r\n\r\n4. Power Management Features\r\n\r\nSurge protection to guard sensitive electronics.\r\n\r\nAlarms for power failure or fluctuations.\r\n\r\nIsolation transformers to protect patients from electrical shocks.', 0, 'products/avatars/TfPCkRyqiPhaSwHL6pZhjLIMx67MCwG29EMmGPBD.jpg', NULL, 1, 1, 20, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 19:31:42', '2025-05-05 19:31:42'),
(42, 'Power supply 3', 'power-supply-3', 'Kidney dialysis machines require a stable and reliable power supply because they support life-critical functions. Here’s an overview of the power supply system typically used:\r\n\r\n1. Main Power Supply\r\n\r\nVoltage: Typically powered by standard AC mains (110–240V, depending on region).\r\n\r\nFrequency: 50/60 Hz.\r\n\r\nConversion: Internally converted to regulated DC power for the electronic and mechanical components (e.g., pumps, sensors, displays).\r\n\r\n\r\n2. Uninterruptible Power Supply (UPS)\r\n\r\nMost machines are connected to a UPS to provide backup power in case of mains failure.\r\n\r\nAllows safe shutdown or temporary continuation of treatment.\r\n\r\n\r\n3. Internal Battery Backup (Optional)\r\n\r\nSome units, especially portable or home dialysis machines, include a built-in battery.\r\n\r\nProvides 15–30 minutes (or more) of emergency operation to prevent abrupt treatment stoppage.\r\n\r\n\r\n4. Power Management Features\r\n\r\nSurge protection to guard sensitive electronics.\r\n\r\nAlarms for power failure or fluctuations.\r\n\r\nIsolation transformers to protect patients from electrical shocks.', 0, 'products/avatars/v8kG0yZmkaQAFcgOuVKHpFb577NjCzptzWXCvDOM.jpg', NULL, 1, 1, 20, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 19:32:23', '2025-05-05 19:32:23'),
(43, 'Single port valve 1', 'single-port-valve-1', 'A single-port valve in a kidney dialysis machine typically refers to a valve that controls fluid flow through one port or channel—often used for managing the inflow or outflow of dialysate or blood. Here’s a brief explanation:\r\n\r\nFunction in Dialysis Machine:\r\n\r\nControl Fluid Flow: Regulates the flow of dialysate (cleansing fluid) or blood through a specific part of the dialysis circuit.\r\n\r\nOne Inlet/Outlet: A single-port valve has only one active port that can either be opened or closed to allow or block flow.\r\n\r\nTypes: Can be solenoid-operated, mechanically actuated, or pressure-sensitive.\r\n\r\nApplications:\r\n\r\nStart/stop dialysate delivery\r\n\r\nControl heparin dosing\r\n\r\nDirect waste fluid outflow\r\n\r\n\r\n\r\nImportance:\r\n\r\nEnsures precise control to prevent backflow or contamination.\r\n\r\nEnhances patient safety by managing pressures and flow rates accurately.', 0, 'products/avatars/zmrEXqiRsjkrGlKancRIImONmTOCrJMnKnZoz4gb.jpg', NULL, 1, 1, 10, NULL, 4, 2, NULL, NULL, NULL, '2025-05-05 19:38:47', '2025-05-05 19:38:47'),
(44, 'Single port valve 2', 'single-port-valve-2', 'A single-port valve in a kidney dialysis machine typically refers to a valve that controls fluid flow through one port or channel—often used for managing the inflow or outflow of dialysate or blood. Here’s a brief explanation:\r\n\r\nFunction in Dialysis Machine:\r\n\r\nControl Fluid Flow: Regulates the flow of dialysate (cleansing fluid) or blood through a specific part of the dialysis circuit.\r\n\r\nOne Inlet/Outlet: A single-port valve has only one active port that can either be opened or closed to allow or block flow.\r\n\r\nTypes: Can be solenoid-operated, mechanically actuated, or pressure-sensitive.\r\n\r\nApplications:\r\n\r\nStart/stop dialysate delivery\r\n\r\nControl heparin dosing\r\n\r\nDirect waste fluid outflow\r\n\r\n\r\n\r\nImportance:\r\n\r\nEnsures precise control to prevent backflow or contamination.\r\n\r\nEnhances patient safety by managing pressures and flow rates accurately.', 0, 'products/avatars/W02l4fjhSzFDObsFHmKPNo7HLfwUqJTyaMqNxYWR.jpg', NULL, 1, 1, 10, NULL, 4, 2, NULL, NULL, NULL, '2025-05-05 19:39:32', '2025-05-05 19:39:32'),
(45, 'Single port valve 3', 'single-port-valve-3', 'A single-port valve in a kidney dialysis machine typically refers to a valve that controls fluid flow through one port or channel—often used for managing the inflow or outflow of dialysate or blood. Here’s a brief explanation:\r\n\r\nFunction in Dialysis Machine:\r\n\r\nControl Fluid Flow: Regulates the flow of dialysate (cleansing fluid) or blood through a specific part of the dialysis circuit.\r\n\r\nOne Inlet/Outlet: A single-port valve has only one active port that can either be opened or closed to allow or block flow.\r\n\r\nTypes: Can be solenoid-operated, mechanically actuated, or pressure-sensitive.\r\n\r\nApplications:\r\n\r\nStart/stop dialysate delivery\r\n\r\nControl heparin dosing\r\n\r\nDirect waste fluid outflow\r\n\r\n\r\n\r\nImportance:\r\n\r\nEnsures precise control to prevent backflow or contamination.\r\n\r\nEnhances patient safety by managing pressures and flow rates accurately.', 0, 'products/avatars/eH4tvxUEDcjeSZWRD0ecesvtQ7LKx6ph2IXbVYl1.jpg', NULL, 1, 1, 10, NULL, 4, 2, NULL, NULL, NULL, '2025-05-05 19:40:18', '2025-05-05 19:40:18'),
(46, 'Uf- pump 1', 'uf-pump-1', 'The UF pump (Ultrafiltration pump) in a kidney dialysis machine is responsible for removing excess fluid from the patient\'s blood during hemodialysis. Here\'s a concise overview:\r\n\r\nFunction:\r\n\r\nUF (Ultrafiltration) refers to the process of removing fluid from the blood.\r\n\r\nThe UF pump precisely controls the rate and volume of fluid removal by creating a pressure difference across the dialysis membrane.\r\n\r\nIt ensures safe fluid balance, preventing hypotension (if too much fluid is removed) or fluid overload (if too little is removed).', 0, 'products/avatars/Q3UsHSRck2qIugHoV0A821WFB3Vh48JRlfgNDc55.jpg', NULL, 1, 1, 15, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 19:50:31', '2025-05-05 19:50:31'),
(47, 'Uf - pump 2', 'uf-pump-2', 'The UF pump (Ultrafiltration pump) in a kidney dialysis machine is responsible for removing excess fluid from the patient\'s blood during hemodialysis. Here\'s a concise overview:\r\n\r\nFunction:\r\n\r\nUF (Ultrafiltration) refers to the process of removing fluid from the blood.\r\n\r\nThe UF pump precisely controls the rate and volume of fluid removal by creating a pressure difference across the dialysis membrane.\r\n\r\nIt ensures safe fluid balance, preventing hypotension (if too much fluid is removed) or fluid overload (if too little is removed).', 0, 'products/avatars/ugwvI8Jv4KfVfEN6dssUih60ZsaEhFuy28DuGhiI.jpg', NULL, 1, 1, 15, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 19:51:13', '2025-05-05 19:51:13'),
(48, 'Uf- pump 3', 'uf-pump-3', 'The UF pump (Ultrafiltration pump) in a kidney dialysis machine is responsible for removing excess fluid from the patient\'s blood during hemodialysis. Here\'s a concise overview:\r\n\r\nFunction:\r\n\r\nUF (Ultrafiltration) refers to the process of removing fluid from the blood.\r\n\r\nThe UF pump precisely controls the rate and volume of fluid removal by creating a pressure difference across the dialysis membrane.\r\n\r\nIt ensures safe fluid balance, preventing hypotension (if too much fluid is removed) or fluid overload (if too little is removed).', 0, 'products/avatars/UNrNqCWsgdbe0lmQS02Qjw5LQ2lzTkhySc0gB4cY.jpg', NULL, 1, 1, 15, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 19:52:01', '2025-05-05 19:52:01'),
(49, 'Mros', 'mros', 'The MROs (Maintenance, Repair, and Overhaul) of a kidney dialysis machine involve procedures and activities to ensure its safe, reliable, and effective functioning. Here\'s a breakdown of key MRO aspects:\r\n\r\n1. Maintenance\r\n\r\nRoutine Maintenance:\r\n\r\nDaily disinfection and cleaning.\r\n\r\nChecking and replacing filters.\r\n\r\nInspecting tubing and connections.\r\n\r\n\r\nPreventive Maintenance (usually monthly/quarterly):\r\n\r\nCalibration of sensors.\r\n\r\nVerifying alarms and safety systems.\r\n\r\nSoftware updates and system diagnostics.\r\n\r\n\r\n\r\n2. Repair\r\n\r\nReplacing faulty components such as:\r\n\r\nPumps\r\n\r\nValves\r\n\r\nDisplays or control panels\r\n\r\n\r\nAddressing leaks, blockages, or electrical issues.\r\n\r\n\r\n3. Overhaul\r\n\r\nComprehensive disassembly, cleaning, inspection, and reassembly.\r\n\r\nReplacement of worn-out or aging components.\r\n\r\nPerformed typically after a set number of operating hours or annually.\r\n\r\n\r\n4. Documentation and Compliance\r\n\r\nKeeping records of maintenance and repair activities.\r\n\r\nFollowing manufacturer guidelines and local health regulations.', 0, 'products/avatars/e4pcfbPrUIOVb0N92vwOGukQFpbMs6LC151D2BWX.jpg', NULL, 1, 1, 15, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 20:43:11', '2025-05-05 20:43:11'),
(50, 'Mroc', 'mroc', 'MROC typically stands for Maintenance, Repair, and Overhaul Costs, often used in engineering, aviation, or equipment lifecycle management.\r\n\r\nFor a kidney dialysis machine, the MROC includes the following:\r\n\r\n1. Maintenance\r\n\r\nRoutine servicing: Calibration, filter replacement, disinfection.\r\n\r\nConsumables check: Tubing, dialyzers, and cartridges.\r\n\r\nSoftware updates: Ensuring compliance with safety and efficiency standards.\r\n\r\n\r\n2. Repair\r\n\r\nComponent replacements: Pumps, sensors, display panels, valves.\r\n\r\nTroubleshooting: Fixing alarms, error codes, and fluid leaks.\r\n\r\n\r\n3. Overhaul\r\n\r\nMajor refurbishments: Complete inspection, deep cleaning, and re-certification.\r\n\r\nReplacements of critical systems: Electronics, fluid delivery system, etc.\r\n\r\nCompliance upgrades: Ensuring the machine meets updated clinical standard.', 0, 'products/avatars/gTtdaf4OnFKx86VSgpITh2S6cLBrzZNccsXkiodf.jpg', NULL, 1, 1, 15, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 20:43:57', '2025-05-05 20:45:44'),
(51, 'MRO 1', 'mro', 'mro of kidney dialysis machine', 0, 'products/avatars/jXWSG142RBqKhhbd0s9vw4RmRXQaiLO1XBOhcomM.jpg', NULL, 1, 1, 15, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 20:47:08', '2025-05-05 20:53:57'),
(52, 'MRO 2', 'mro-2', 'mro of kidney dialysis machine', 0, 'products/avatars/OmOyKlAlhU1uGoIrGklqmLpzT7G2mCMoStAtqKJk.jpg', NULL, 1, 1, 15, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 20:52:51', '2025-05-05 20:52:51'),
(53, 'MRO 3', 'mro-3', 'mro of kidney dialysis machine', 0, 'products/avatars/O5m5g1gmPhbv00WLu4xcn0YaxBV0ZIrryp7cImFH.jpg', NULL, 1, 1, 15, NULL, 2, 1, NULL, NULL, NULL, '2025-05-05 20:53:39', '2025-05-05 20:53:39'),
(54, 'Dlalog plus', 'dlalog-plus', 'Dlalog plus is a part of kidney dialysis machine', 0, 'products/avatars/OkfebwCdiwXuieMIVpvCTfxgYe61uKJgSgNWYA76.jpg', NULL, 1, 1, 15, NULL, 2, 2, NULL, NULL, NULL, '2025-05-05 20:56:06', '2025-05-05 20:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `short_description`, `description`, `content`, `avatar`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Depot Level Repair', 'depot-level-repair', 'Ensuring Unmatched Reliability in Dialysis Equipment Repair', 'Our DLR program enhances equipment longevity by fully restoring Fresenius hemodialysis machines to factory-new performance. Each unit undergoes a meticulous rework process to ensure maximum quality, reliability, and efficiency. This helps reduce costs while maintaining top performance.', '<p>At <strong>GIA Medical</strong>, we understand the critical role that dialysis machines play in patient care. Any malfunction or inefficiency can directly impact patient safety and treatment outcomes. That is why we offer a comprehensive <strong>Depot Level Repair (DLR)</strong> service, designed to restore medical equipment to optimal working condition while maintaining cost-effectiveness.</p>\r\n<p>With <strong>over 30 years of experience</strong> in the industry, we take pride in our ability to perform high-quality repairs and refurbishments that adhere to <strong>Original Equipment Manufacturer (OEM) standards</strong>. Our <strong>state-of-the-art repair facility</strong> is equipped with advanced diagnostic tools and a team of skilled biomedical engineers who specialize in repairing, testing, and recalibrating dialysis machines and their components.</p>\r\n<h3>Our Rigorous Repair Process</h3>\r\n<p>Our <strong>Depot Level Repair</strong> service follows a meticulous multi-step process that ensures each device is restored to peak performance:</p>\r\n<ol>\r\n<li><strong>Comprehensive Diagnostics:</strong> Every unit undergoes a thorough inspection to identify faults at both hardware and software levels. We use advanced diagnostic equipment to detect even the smallest inconsistencies.</li>\r\n<li><strong>Component-Level Repair:</strong> Instead of replacing entire systems, we focus on repairing or replacing individual faulty components, including circuit boards, pressure sensors, pumps, and valves. This reduces costs while maintaining performance.</li>\r\n<li><strong>OEM-Compliant Refurbishment:</strong> We follow strict OEM guidelines throughout the refurbishment process, ensuring that all repaired equipment functions as if it were factory-new.</li>\r\n<li><strong>Calibration &amp; Software Updates:</strong> Each machine is recalibrated and, when applicable, updated with the latest software versions to enhance efficiency and compatibility with modern medical standards.</li>\r\n<li><strong>Stringent Quality Assurance Testing:</strong> Every repaired device undergoes multiple quality control checks and performance tests to ensure compliance with both OEM and industry regulations before being returned to the client.</li>\r\n</ol>\r\n<h3>Why Choose Our DLR Service?</h3>\r\n<p>At <strong>GIA Medical</strong>, we prioritize <strong>precision, reliability, and cost efficiency</strong>. Our <strong>Depot Level Repair and Replacement Spare Parts Programs</strong> are designed to help healthcare facilities and dialysis providers maximize the lifespan of their equipment without compromising patient care.</p>\r\n<p>We understand the financial constraints that medical institutions often face. By offering an alternative to costly equipment replacements, our <strong>DLR service helps clients save thousands of dollars while ensuring their machines meet industry standards</strong>. Unlike general repair services, our approach ensures that all operational equipment meets and passes <strong>strict in-house and OEM-specific testing models</strong>.</p>\r\n<p>At <strong>GIA Medical, we cut costs&mdash;not reliability.</strong> Our commitment to excellence means that every piece of equipment we service is restored with precision and care, ensuring <strong>consistent and uninterrupted performance</strong> for years to come.</p>', 'services/64YRjvNJaM6QTHReJbri4Izo4syLUXsyN4dEVVnF.jpg', 1, '2025-03-18 00:56:08', '2025-05-04 01:50:27'),
(5, 'By-Product Synergy', 'by-product-synergy', 'Sustainable OEM-grade component restoration.', 'GIA Medical\'s By-Product Synergy initiative is dedicated to minimizing environmental impact by implementing refined recycling processes. Each serviceable component undergoes stringent quality assurance and control, ensuring compliance with OEM guidelines while promoting sustainability in dialysis equipment refurbishment.', '<p class=\"\" data-start=\"179\" data-end=\"630\">At <strong data-start=\"182\" data-end=\"197\">GIA Medical</strong>, our dedication to environmental responsibility goes hand-in-hand with our commitment to excellence in dialysis equipment refurbishment. Our <strong data-start=\"339\" data-end=\"361\">By-Product Synergy</strong> initiative is a sustainability-focused program that integrates environmentally conscious practices into our repair and restoration processes. By reclaiming serviceable components and reducing overall waste, we deliver both economic and ecological value to our clients.</p>\r\n<p class=\"\" data-start=\"632\" data-end=\"1052\">Each salvaged part is carefully evaluated and must pass through a stringent <strong data-start=\"708\" data-end=\"757\">Quality Assurance and Quality Control (QA/QC)</strong> process. We follow <strong data-start=\"777\" data-end=\"829\">Original Equipment Manufacturer (OEM) guidelines</strong> to ensure that every reused component meets performance and safety standards. This practice not only helps minimize our carbon footprint but also allows us to offer cost-effective solutions without sacrificing reliability.</p>\r\n<h3 class=\"\" data-start=\"1054\" data-end=\"1087\">Our Sustainable Reuse Process</h3>\r\n<p class=\"\" data-start=\"1089\" data-end=\"1213\">Our <strong data-start=\"1093\" data-end=\"1115\">By-Product Synergy</strong> workflow is designed to optimize resource utilization and maintain the highest quality standards:</p>\r\n<ol data-start=\"1215\" data-end=\"1870\">\r\n<li class=\"\" data-start=\"1215\" data-end=\"1365\">\r\n<p class=\"\" data-start=\"1218\" data-end=\"1365\"><strong data-start=\"1218\" data-end=\"1243\">Component Evaluation:</strong> Each used part is inspected to assess its condition and determine its suitability for reuse in line with OEM standards.</p>\r\n</li>\r\n<li class=\"\" data-start=\"1366\" data-end=\"1541\">\r\n<p class=\"\" data-start=\"1369\" data-end=\"1541\"><strong data-start=\"1369\" data-end=\"1401\">Eco-Conscious Refurbishment:</strong> Viable parts are cleaned, repaired, and tested using specialized tools to restore full functionality while eliminating unnecessary waste.</p>\r\n</li>\r\n<li class=\"\" data-start=\"1542\" data-end=\"1706\">\r\n<p class=\"\" data-start=\"1545\" data-end=\"1706\"><strong data-start=\"1545\" data-end=\"1573\">Quality Control Testing:</strong> Refurbished components undergo comprehensive testing procedures to ensure safety, accuracy, and compatibility with modern systems.</p>\r\n</li>\r\n<li class=\"\" data-start=\"1707\" data-end=\"1870\">\r\n<p class=\"\" data-start=\"1710\" data-end=\"1870\"><strong data-start=\"1710\" data-end=\"1728\">Reintegration:</strong> Approved parts are reintegrated into our refurbishment process, contributing to the performance and lifespan of repaired dialysis machines.</p>\r\n</li>\r\n</ol>\r\n<h3 class=\"\" data-start=\"1872\" data-end=\"1910\">Why Our By-Product Synergy Matters</h3>\r\n<p class=\"\" data-start=\"1912\" data-end=\"2032\">At <strong data-start=\"1915\" data-end=\"1930\">GIA Medical</strong>, we believe innovation and responsibility go hand in hand. Our <strong data-start=\"1994\" data-end=\"2016\">By-Product Synergy</strong> program offers:</p>\r\n<ul data-start=\"2034\" data-end=\"2472\">\r\n<li class=\"\" data-start=\"2034\" data-end=\"2126\">\r\n<p class=\"\" data-start=\"2036\" data-end=\"2126\"><strong data-start=\"2036\" data-end=\"2063\">Environmental Benefits:</strong> Significant reduction in medical waste and carbon emissions.</p>\r\n</li>\r\n<li class=\"\" data-start=\"2127\" data-end=\"2234\">\r\n<p class=\"\" data-start=\"2129\" data-end=\"2234\"><strong data-start=\"2129\" data-end=\"2146\">Cost Savings:</strong> Reuse of qualified components lowers material costs without compromising performance.</p>\r\n</li>\r\n<li class=\"\" data-start=\"2235\" data-end=\"2346\">\r\n<p class=\"\" data-start=\"2237\" data-end=\"2346\"><strong data-start=\"2237\" data-end=\"2259\">Strict Compliance:</strong> All components meet OEM and in-house quality standards for safety and effectiveness.</p>\r\n</li>\r\n<li class=\"\" data-start=\"2347\" data-end=\"2472\">\r\n<p class=\"\" data-start=\"2349\" data-end=\"2472\"><strong data-start=\"2349\" data-end=\"2377\">Extended Equipment Life:</strong> Sustainable practices that increase the operational lifespan of critical dialysis equipment.</p>\r\n</li>\r\n</ul>\r\n<p class=\"\" data-start=\"2474\" data-end=\"2741\"><strong data-start=\"2474\" data-end=\"2572\">At GIA Medical, sustainability is not an afterthought&mdash;it&rsquo;s built into every repair we perform.</strong> Through our By-Product Synergy initiative, we continue to redefine industry standards for environmental stewardship and technical excellence in dialysis machine repair.</p>', 'services/oSYeWgpo3rlgk1ZyPVyUM8Yo8hHXfcAJCCyksAT6.jpg', 1, '2025-03-19 02:57:29', '2025-05-04 02:10:06'),
(6, 'Training & Technical Support', 'training-technical-support', 'Expert training and responsive support for dialysis teams', 'GIA Medical provides hands-on training and dedicated technical support to help dialysis providers and biomedical teams operate, maintain, and troubleshoot Fresenius machines with confidence and precision.', '<p class=\"\" data-start=\"512\" data-end=\"872\">At GIA Medical, we believe that the success of any dialysis operation depends not only on reliable equipment, but also on the expertise of the professionals using it. That&rsquo;s why we offer specialized Training &amp; Technical Support services to empower healthcare teams with the skills and knowledge necessary to deliver safe, efficient patient care.</p>\r\n<p class=\"\" data-start=\"874\" data-end=\"1224\">Our programs are designed for clinical staff, technicians, and biomedical engineers who operate, maintain, or troubleshoot Fresenius dialysis machines. With years of industry experience, our certified trainers provide practical, in-depth instruction customized to your team&rsquo;s needs&mdash;whether you\'re starting fresh or looking to enhance existing skills.</p>\r\n<p class=\"\" data-start=\"1226\" data-end=\"1248\"><strong data-start=\"1226\" data-end=\"1246\">What We Provide:</strong></p>\r\n<ul data-start=\"1249\" data-end=\"1556\">\r\n<li class=\"\" data-start=\"1249\" data-end=\"1320\">\r\n<p class=\"\" data-start=\"1251\" data-end=\"1320\">Personalized training sessions, available both on-site and remotely</p>\r\n</li>\r\n<li class=\"\" data-start=\"1321\" data-end=\"1401\">\r\n<p class=\"\" data-start=\"1323\" data-end=\"1401\">Detailed instruction on machine operation, maintenance, and safety protocols</p>\r\n</li>\r\n<li class=\"\" data-start=\"1402\" data-end=\"1477\">\r\n<p class=\"\" data-start=\"1404\" data-end=\"1477\">Troubleshooting techniques to reduce downtime and extend equipment life</p>\r\n</li>\r\n<li class=\"\" data-start=\"1478\" data-end=\"1556\">\r\n<p class=\"\" data-start=\"1480\" data-end=\"1556\">Ongoing technical support and access to detailed documentation and resources</p>\r\n</li>\r\n</ul>\r\n<p class=\"\" data-start=\"1558\" data-end=\"1835\">In addition to training, our technical support team is available to help resolve equipment challenges quickly and effectively. Whether you need help identifying a malfunction, replacing a component, or recalibrating your machine, we are here to guide you every step of the way.</p>\r\n<p class=\"\" data-start=\"1837\" data-end=\"2075\">At GIA Medical, we&rsquo;re committed to building long-term partnerships with our clients. Our Training &amp; Technical Support service ensures that your team has the confidence and resources to keep dialysis operations running smoothly and safely.</p>', 'services/PvQPrYTwex7TY965EVgP51WRq9alLR9lOlMuSYGg.jpg', 1, '2025-03-19 02:58:09', '2025-05-04 07:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('WPGqkAcymphTLK73KQ8OepmYDDPFm1k0AmwdnBwy', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT1FCN3hzd2VaNENjUlFFSm5ldnpzdG50amxTVUtnamM0aUllMnZrZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9naWFtZWQudGVzdC9kYXNoYm9hcmQvYXBwb2ludG1lbnRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1776706731);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Check', 'check', 'Check', '2025-03-22 14:08:45', '2025-03-22 14:08:45'),
(2, 'Electronic Parts', 'electronic-parts', 'Check description', '2025-04-19 10:32:23', '2025-04-19 10:32:23'),
(3, 'Hydraulic Parts', 'hydraulic-parts', 'Check Description', '2025-04-19 10:33:01', '2025-04-19 10:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@giamedical.com', NULL, '$2y$12$NetEwzRdX8heNNUoZ.sIEOQuHDa94hNzhonNJgG7O/7a3YnRNi1wy', NULL, '2025-05-12 20:29:45', '2026-04-20 11:38:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `call_requests`
--
ALTER TABLE `call_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `call_requests_replied_by_foreign` (`replied_by`),
  ADD KEY `call_requests_created_by_foreign` (`created_by`),
  ADD KEY `call_requests_service_id_foreign` (`service_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `call_requests`
--
ALTER TABLE `call_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `call_requests`
--
ALTER TABLE `call_requests`
  ADD CONSTRAINT `call_requests_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `call_requests_replied_by_foreign` FOREIGN KEY (`replied_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `call_requests_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
