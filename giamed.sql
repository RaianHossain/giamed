-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2025 at 07:48 AM
-- Server version: 10.6.21-MariaDB-0ubuntu0.22.04.2
-- PHP Version: 8.3.20

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `special_request` text DEFAULT NULL,
  `status` enum('pending','confirmed','canceled') NOT NULL DEFAULT 'pending',
  `deleted_at` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
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
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `call_requests`
--

CREATE TABLE `call_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `is_replied` tinyint(1) NOT NULL DEFAULT 0,
  `replied_message` varchar(255) DEFAULT NULL,
  `replied_by` bigint(20) UNSIGNED DEFAULT NULL,
  `resolved_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
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
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `avatar` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tags`)),
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `price`, `avatar`, `cover`, `active`, `featured`, `quantity`, `tags`, `category_id`, `sub_category_id`, `brand_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Air Separator', 'air-separator', 'In kidney dialysis machines, air separators, also known as air bubble detectors or traps, are crucial safety features. They prevent air from entering the blood circuit and potentially causing a life-threatening embolism by detecting air bubbles in the blood flow.', 100, 'products/avatars/eiXsua87oKdW5Lh3GP2kqIBDZjerO1gUBX8bNqQW.png', NULL, 1, 1, 50, NULL, 4, 3, 2, NULL, NULL, '2025-04-19 10:35:16', '2025-04-19 10:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
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
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('OtVbX3Hc0HOJJjysr02LrXcvHr3Rgb1hmkIpIY0A', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVkt2dHF3eHQ0ajJBckRUQUd4bVd3QmRrUkxmT2JXS3piZlU5TXdzMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYWtlLWFwcG9pbnRtZW50Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1746431157);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `call_requests`
--
ALTER TABLE `call_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
