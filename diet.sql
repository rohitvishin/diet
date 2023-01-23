-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 08:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diet`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_masters`
--

CREATE TABLE `activity_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_id` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=created,1=done,2=cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devs`
--

CREATE TABLE `devs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `last_login_time` varchar(255) DEFAULT NULL,
  `register_ip` varchar(255) NOT NULL,
  `wallet` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devs`
--

INSERT INTO `devs` (`id`, `username`, `password`, `name`, `email`, `mobile`, `last_login_time`, `register_ip`, `wallet`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', '$2y$10$t8BuuxEDZRwU/yviJNLr5uW5ob8fmF6K6SqldKk.sBoSUpMLNkxiO', 'Shrikunj Vyas', 'shreevyas65@gmail.com', '7066498174', '', '::1', 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diet_template_masters`
--

CREATE TABLE `diet_template_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_intro` varchar(255) NOT NULL,
  `diet_plan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `food_masters`
--

CREATE TABLE `food_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `calories` varchar(255) NOT NULL,
  `protein` varchar(255) NOT NULL,
  `carbs` varchar(255) NOT NULL,
  `fats` varchar(255) NOT NULL,
  `fiber` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_masters`
--

INSERT INTO `food_masters` (`id`, `food_name`, `calories`, `protein`, `carbs`, `fats`, `fiber`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Roti', '5.5', '200', '250', '150', '36', '2023-01-14 12:16:19', '2023-01-14 12:48:28', 1),
(2, 'Bajra Roti', '250', '550', '120', '120', '110', '2023-01-14 12:17:18', '2023-01-14 12:47:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lab_masters`
--

CREATE TABLE `lab_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_type` varchar(255) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `range_ref_type` varchar(255) NOT NULL COMMENT '0:gender, 1:age, -1:none',
  `range_ref_action` varchar(255) NOT NULL COMMENT '0:less than, 1:greater than, 2:between, -1:none',
  `range_ref_value` varchar(255) NOT NULL COMMENT 'value of reference',
  `low_range` double(8,2) NOT NULL,
  `high_range` double(8,2) NOT NULL,
  `range_match_action` varchar(255) NOT NULL COMMENT '0:less, 1:high, 2:between, 3:upto',
  `unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab_masters`
--

INSERT INTO `lab_masters` (`id`, `test_type`, `test_name`, `range_ref_type`, `range_ref_action`, `range_ref_value`, `low_range`, `high_range`, `range_match_action`, `unit`, `created_at`, `updated_at`, `status`) VALUES
(1, 'cbc', 'hb', '0', '2', 'male', 13.50, 17.50, '2', 'gm/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'cbc', 'hb', '0', '2', 'female', 12.00, 16.00, '2', 'gm/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medical_masters`
--

CREATE TABLE `medical_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_masters`
--

INSERT INTO `medical_masters` (`id`, `type`, `type_id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Chronic diseases', 1, 'High Blood Pressure', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'Chronic diseases', 1, 'Diabetes Mellitus', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'Chronic diseases', 1, 'High Cholesterol', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'Chronic diseases', 1, 'Polycystic Ovarian \r\nSyndrome', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'Chronic diseases', 1, 'Thyroid', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'Chronic diseases', 1, 'Kidney Problem', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 'Chronic diseases', 1, 'Heart Problem', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 'Chronic diseases', 1, 'Insulin Resistance', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 'Chronic diseases', 1, 'Cancer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 'Chronic diseases', 1, 'Depression', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(11, 'Bone health', 2, 'Knee Pain', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(12, 'Bone health', 2, 'Back Pain \r\n(Upper/Lower)', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(13, 'Bone health', 2, 'Osteoporosis', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(14, 'Bone health', 2, 'Osteoarthritis', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(15, 'Bone health', 2, 'Rheumatoid \r\nArthritis', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(16, 'Bone health', 2, 'Gout', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(17, 'Bone health', 2, 'Spondylitis', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(18, 'Gastro-Instestinal', 3, 'Flatulence (Gas)', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(19, 'Gastro-Instestinal', 3, 'Heartburn \r\n(Acidity)', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(20, 'Gastro-Instestinal', 3, 'Nausea \r\n(Vomiting)', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(21, 'Gastro-Instestinal', 3, 'Hiatus Hernia', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(22, 'Gastro-Instestinal', 3, 'Constipation', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(23, 'Gastro-Instestinal', 3, 'Irritable Bowel \r\nSyndrome', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(24, 'Gastro-Instestinal', 3, 'Acid Reflux', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(25, 'Others', 4, 'Migraine', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(26, 'Others', 4, 'Asthma', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(27, 'Others', 4, 'Vertigo', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(28, 'Others', 4, 'Hair Fall (Severe/Mild)', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(29, 'Others', 4, 'Water Retention \r\n(Swelling)', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(30, 'Others', 4, 'Allergies', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(31, 'Others', 4, 'Thalassemia \r\nMinor', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(32, 'Others', 4, 'Sleep Disorder', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

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
(490, '2014_10_12_000000_create_users_table', 1),
(491, '2019_08_19_000000_create_failed_jobs_table', 1),
(492, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(493, '2022_09_24_035744_admin', 1),
(494, '2022_09_24_040046_dev', 1),
(495, '2022_09_24_040234_support', 1),
(496, '2022_09_24_040253_systemlog', 1),
(497, '2022_12_27_140610_create_medical_masters_table', 1),
(498, '2022_12_31_043814_create_activity_masters_table', 1),
(499, '2023_01_01_101240_create_appointments_table', 1),
(500, '2023_01_09_082917_create_lab_masters_table', 1),
(501, '2023_01_14_055520_create_package_masters_table', 1),
(502, '2023_01_14_172250_create_food_masters_table', 1),
(503, '2023_01_15_074203_create_diet_template_masters_table', 1),
(504, '2023_01_18_145354_create_product_masters_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_masters`
--

CREATE TABLE `package_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_masters`
--

INSERT INTO `package_masters` (`id`, `plan_name`, `duration`, `discount`, `amount`, `currency`, `tax`, `created_at`, `updated_at`, `status`) VALUES
(1, '1st  time Visit', 1, 5, '5000', 'inr', '2', '2023-01-14 07:58:55', '2023-01-14 12:22:12', 1),
(2, '1 week plan', 7, 5, '5500', 'inr', '2', '2023-01-14 10:36:31', '2023-01-14 10:36:31', 1),
(3, '1st  time Visit', 1, 2, '5600', 'inr', '2', '2023-01-14 10:36:40', '2023-01-14 10:46:40', 1),
(4, '1st  time Visit', 1, 5, '5500', 'inr', '2', '2023-01-14 10:38:33', '2023-01-14 10:46:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_masters`
--

CREATE TABLE `product_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_masters`
--

INSERT INTO `product_masters` (`id`, `product_name`, `unit`, `amount`, `qty`, `discount`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Test Product', '500 ML', '200', '150', '250', '2023-01-20 23:38:57', '2023-01-21 00:02:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `query` mediumtext NOT NULL,
  `created_at` date DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `systemlog`
--

CREATE TABLE `systemlog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1=users/ 2=dev / 3=admin',
  `user_id` int(11) NOT NULL,
  `log` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `last_login_time` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `register_ip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_masters`
--
ALTER TABLE `activity_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`),
  ADD UNIQUE KEY `admin_mobile_unique` (`mobile`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devs`
--
ALTER TABLE `devs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `devs_email_unique` (`email`),
  ADD UNIQUE KEY `devs_mobile_unique` (`mobile`);

--
-- Indexes for table `diet_template_masters`
--
ALTER TABLE `diet_template_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food_masters`
--
ALTER TABLE `food_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_masters`
--
ALTER TABLE `lab_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_masters`
--
ALTER TABLE `medical_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_masters`
--
ALTER TABLE `package_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product_masters`
--
ALTER TABLE `product_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemlog`
--
ALTER TABLE `systemlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_masters`
--
ALTER TABLE `activity_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `devs`
--
ALTER TABLE `devs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diet_template_masters`
--
ALTER TABLE `diet_template_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_masters`
--
ALTER TABLE `food_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab_masters`
--
ALTER TABLE `lab_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medical_masters`
--
ALTER TABLE `medical_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT for table `package_masters`
--
ALTER TABLE `package_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_masters`
--
ALTER TABLE `product_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemlog`
--
ALTER TABLE `systemlog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
