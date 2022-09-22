-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 09:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobax`
--

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
-- Table structure for table `job_skills`
--

CREATE TABLE `job_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `industry_id` int(11) NOT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_attributes`
--

CREATE TABLE `master_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_attribute_category_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_attributes`
--

INSERT INTO `master_attributes` (`id`, `master_attribute_category_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'Male', NULL, NULL),
(2, 1, 'Female', NULL, NULL),
(3, 1, 'Other', NULL, NULL),
(4, 2, 'English', NULL, NULL),
(5, 2, 'Spanish', NULL, NULL),
(6, 2, 'German', NULL, NULL),
(7, 2, 'Russian', NULL, NULL),
(8, 2, 'Hindi', NULL, NULL),
(9, 2, 'French', NULL, NULL),
(10, 2, 'Korean', NULL, NULL),
(11, 2, 'Italian', NULL, NULL),
(12, 2, 'Hindi', NULL, NULL),
(13, 2, 'Urdu', NULL, NULL),
(14, 2, 'Chinese', NULL, NULL),
(15, 3, 'Beginner', NULL, NULL),
(16, 3, 'Skilled', NULL, NULL),
(17, 3, 'Intermediate', NULL, NULL),
(18, 3, 'Proficient', NULL, NULL),
(19, 3, 'Expert', NULL, NULL),
(20, 4, 'Aerospace', NULL, NULL),
(21, 4, 'Agriculture', NULL, NULL),
(22, 4, 'Computer and technology', NULL, NULL),
(23, 4, 'Construction', NULL, NULL),
(24, 4, 'Education', NULL, NULL),
(25, 4, 'Energy', NULL, NULL),
(26, 4, 'Entertainment', NULL, NULL),
(27, 4, 'Fashion', NULL, NULL),
(28, 4, 'Finance and economic', NULL, NULL),
(29, 4, 'Food and beverage', NULL, NULL),
(30, 4, 'Health care', NULL, NULL),
(31, 4, 'Hospitality', NULL, NULL),
(32, 4, 'Manufacturing', NULL, NULL),
(33, 4, 'Media and news', NULL, NULL),
(34, 4, 'Mining', NULL, NULL),
(35, 4, 'Pharmaceutical', NULL, NULL),
(36, 4, 'Pharmaceutical', NULL, NULL),
(37, 4, 'Transportation', NULL, NULL),
(38, 5, 'Beginner', NULL, NULL),
(39, 5, 'Intermediate', NULL, NULL),
(40, 5, 'Expert', NULL, NULL),
(41, 7, 'Single', NULL, NULL),
(42, 7, 'Married', NULL, NULL),
(43, 8, '1', NULL, NULL),
(44, 8, '2', NULL, NULL),
(45, 8, '3', NULL, NULL),
(46, 6, 'Bachelor', NULL, NULL),
(47, 6, 'Master', NULL, NULL),
(48, 6, 'Phd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_attribute_categories`
--

CREATE TABLE `master_attribute_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_attribute_categories`
--

INSERT INTO `master_attribute_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Gender', NULL, NULL, NULL),
(2, 'Languages', NULL, NULL, NULL),
(3, 'Language Levels', NULL, NULL, NULL),
(4, 'Industries', NULL, NULL, NULL),
(5, 'Experience Levels', NULL, NULL, NULL),
(6, 'Degree Levels', NULL, NULL, NULL),
(7, 'Marital Status', NULL, NULL, NULL),
(8, 'Notice Period', NULL, NULL, NULL);

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
(4, '2022_08_23_104543_create_role_users_table', 1),
(5, '2022_08_23_104633_create_roles_table', 1),
(6, '2022_08_29_065303_add_softdelete_in_users_table', 1),
(7, '2022_08_29_071432_create_profiles_table', 1),
(8, '2022_08_29_072738_add_contact_in_users_table', 1),
(9, '2022_08_29_110339_add_discription_in_profiles_table', 1),
(10, '2022_08_29_120854_create_master_attribute_categories_table', 1),
(11, '2022_08_29_121718_create_master_attributes_table', 1),
(12, '2022_08_29_125832_create_job_skills_table', 1),
(13, '2022_08_30_130202_create_vacancies_table', 2);

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry_type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `gender`, `age`, `experience`, `current_salary`, `expected_salary`, `languages`, `company_name`, `industry_type_id`, `created_at`, `updated_at`, `description`) VALUES
(1, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'Robin Tech', NULL, '2022-08-30 05:50:42', '2022-08-30 05:50:42', 'Tech leading company'),
(2, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'Spider hunt', NULL, '2022-08-30 10:12:29', '2022-08-30 10:12:29', 'Startup business');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'employer', NULL, NULL),
(3, 'employee', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 3, '2022-08-30 05:50:42', '2022-08-30 05:50:42'),
(4, 2, 4, '2022-08-30 10:12:29', '2022-08-30 10:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `contact`) VALUES
(1, 'David', 'Theodora', 'david@devacaturemaker.nl', NULL, '$2y$10$n45Ho4T2WszrJVh8dAqXceZ3yoQzhg65HVyQ97IsNoeVA6FAjQFK2', 'hnVFTfgO0noAM3wlxwaErLMHLivGvUiaB7q7utyddeKkDdxhfvHSLc9W9zEW', NULL, '2022-08-30 06:11:57', NULL, NULL),
(2, 'Saman', 'Mahjoubpour', 'sammy@devacaturemaker.nl', NULL, '$2y$10$wpoC3.vLXEjgPPn3w7R/2ee0PBFWzE0qMjrzustJFgoiScathfl8C', NULL, NULL, NULL, NULL, NULL),
(3, 'John', 'Doe', 'john@gmail.com', NULL, '$2y$10$kSSkZdTJs23UcQTATDUfkekrXHkCCsm0vaVWchYo/oPbwbTIq.QJm', NULL, '2022-08-30 05:50:42', '2022-08-30 05:50:42', NULL, '9876543210'),
(4, 'Jack', 'Sparrow', 'jack@gmail.com', NULL, '$2y$10$wrOdKc9YSsU2YVus8BFGzOIgDYe.ODH5DrXtB0GZ/xjPMhTIr6lZi', NULL, '2022-08-30 10:12:29', '2022-08-30 10:12:53', '2022-08-30 10:12:53', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` int(11) NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `employer_id`, `job_title`, `city`, `country`, `zip`, `location`, `department`, `job_role`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 'Laravel Developer', 'Noida', 'India', 11111, 'Sector, 66', 'IT-DEPT', 'Sr Software Engineer', 'Need Suitable candidate for this position', '2022-08-30 09:28:48', '2022-08-30 09:37:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `job_skills`
--
ALTER TABLE `job_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_attributes`
--
ALTER TABLE `master_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_attribute_categories`
--
ALTER TABLE `master_attribute_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_skills`
--
ALTER TABLE `job_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_attributes`
--
ALTER TABLE `master_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `master_attribute_categories`
--
ALTER TABLE `master_attribute_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
