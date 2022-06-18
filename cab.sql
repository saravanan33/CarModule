-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 25, 2021 at 06:03 PM
-- Server version: 8.0.26-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cab`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_id` int NOT NULL,
  `user_id` int NOT NULL,
  `travel_id` int NOT NULL,
  `car_id` int NOT NULL,
  `fare` int NOT NULL,
  `status` enum('A','IA','E') NOT NULL DEFAULT 'IA' COMMENT 'A-active,IA-inactive,E-expiered',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `user_id`, `travel_id`, `car_id`, `fare`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 630, 'A', '2021-10-22 04:32:35', '2021-10-22 05:01:57'),
(2, 1, 3, 3, 1408, 'A', '2021-10-22 07:47:57', '2021-10-22 07:48:13'),
(3, 8, 4, 2, 768, 'IA', '2021-10-22 09:16:44', '2021-10-22 09:16:44'),
(4, 1, 5, 10, 312, 'A', '2021-10-24 09:26:12', '2021-10-24 09:26:59'),
(5, 1, 9, 10, 1248, 'IA', '2021-10-25 00:22:38', '2021-10-25 00:22:38'),
(6, 1, 10, 8, 322, 'A', '2021-10-25 01:03:26', '2021-10-25 01:06:05'),
(7, 8, 11, 9, 1230, 'A', '2021-10-25 04:30:49', '2021-10-25 04:30:56'),
(8, 1, 28, 1, 1280, 'IA', '2021-10-25 04:41:34', '2021-10-25 04:41:34'),
(9, 1, 28, 3, 1408, 'IA', '2021-10-25 04:41:38', '2021-10-25 04:41:38'),
(10, 1, 28, 2, 1536, 'IA', '2021-10-25 04:41:45', '2021-10-25 04:41:45'),
(11, 1, 28, 4, 1920, 'IA', '2021-10-25 04:41:57', '2021-10-25 04:41:57'),
(12, 1, 28, 5, 1920, 'IA', '2021-10-25 04:42:01', '2021-10-25 04:42:01'),
(13, 1, 28, 6, 1536, 'IA', '2021-10-25 04:42:04', '2021-10-25 04:42:04'),
(14, 1, 28, 7, 1664, 'A', '2021-10-25 04:42:05', '2021-10-25 04:42:33'),
(15, 8, 29, 1, 640, 'A', '2021-10-25 04:46:11', '2021-10-25 04:46:25'),
(16, 1, 30, 2, 468, 'IA', '2021-10-25 05:01:40', '2021-10-25 05:01:40'),
(17, 8, 31, 6, 408, 'A', '2021-10-25 05:10:20', '2021-10-25 05:20:33'),
(18, 8, 32, 3, 198, 'A', '2021-10-25 05:21:32', '2021-10-25 05:21:49'),
(19, 1, 33, 7, 1144, 'A', '2021-10-25 05:49:51', '2021-10-25 05:53:12'),
(20, 8, 34, 4, 1455, 'A', '2021-10-25 05:55:10', '2021-10-25 05:57:47'),
(21, 8, 34, 4, 1455, 'IA', '2021-10-25 05:57:53', '2021-10-25 05:57:53'),
(22, 8, 34, 4, 1455, 'IA', '2021-10-25 05:57:54', '2021-10-25 05:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `car_details`
--

CREATE TABLE `car_details` (
  `car_id` int NOT NULL,
  `driver_id` int NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `car_number` varchar(100) NOT NULL,
  `car_seats` int NOT NULL,
  `car_baggage` int NOT NULL,
  `car_gear` enum('A','M') NOT NULL COMMENT 'A-automatic,M-manual',
  `car_image` varchar(255) NOT NULL,
  `car_location` int DEFAULT NULL,
  `car_price_per_km` int NOT NULL,
  `car_availability` enum('A','B') NOT NULL COMMENT 'A-available,B-booked',
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `status` enum('A','IA','D') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'A' COMMENT 'A-active,IA-inactive,D-deleted',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_details`
--

INSERT INTO `car_details` (`car_id`, `driver_id`, `car_name`, `car_number`, `car_seats`, `car_baggage`, `car_gear`, `car_image`, `car_location`, `car_price_per_km`, `car_availability`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'carnival', 'TN 01 AA 0001', 5, 2, 'M', 'car/F4QKdQoVsiCOl9wNd2X64kPKJgA0ojjdufkR9pWD.jpg', NULL, 10, 'B', 'saravanan', 'saravanan', 'A', '2021-10-20 23:17:29', '2021-10-25 04:46:11'),
(2, 2, 'HONDAAMAZE', 'TN 02 AB 0002', 5, 3, 'A', 'car/KoBUoxhUrI9s1DaCRM39oTJyAIjOGac6XKaRqWvT.png', NULL, 12, 'B', 'saravanan', 'saravanan', 'A', '2021-10-20 23:18:55', '2021-10-25 05:01:40'),
(3, 3, 'HYUNDAIAURA', 'TN 03 AC 0023', 4, 2, 'A', 'car/NqigNUW8Qz3xFQU7Eml493i4r7CV9UjmHgxfilH0.jpg', NULL, 11, 'B', 'saravanan', 'saravanan', 'D', '2021-10-20 23:19:54', '2021-10-25 05:48:06'),
(4, 4, 'HYNDAISANTRO', 'TN 04 AD 0004', 5, 2, 'A', 'car/uyM0fLXwOo328SQuF3okWb60gl27MW3MBDdK2buF.jpg', NULL, 15, 'B', 'saravanan', 'saravanan', 'A', '2021-10-20 23:20:38', '2021-10-25 05:57:54'),
(5, 5, 'INNOVA', 'TN 05 AE 0005', 6, 2, 'M', 'car/DgWOIbnqqt6i2fUh0hKoIB3yh14V2XX4yAkXpaoS.jpg', NULL, 15, 'A', 'saravanan', 'saravanan', 'A', '2021-10-20 23:21:16', '2021-10-25 04:42:01'),
(6, 6, 'MARUTISUZUKIssss', 'TN 06 AF 0006', 3, 1, 'A', 'car/ZSJfWE7ehgBlZtIXLKBU1bDMTCj77XtGNrweXGhs.jpg', NULL, 12, 'B', 'saravanan', 'saravanan', 'A', '2021-10-25 05:48:31', '2021-10-25 05:48:31'),
(7, 7, 'MARUTIWAGON', 'TN 07 AG 0007', 5, 1, 'M', 'car/1WDqI7bF4IRkz6qga4pCobmX9KP8TFHYozAZzUa9.jpg', NULL, 13, 'B', 'saravanan', 'saravanan', 'A', '2021-10-20 23:22:47', '2021-10-25 05:49:51'),
(8, 8, 'DZIRE', 'TN 08 AT 0008', 4, 2, 'M', 'car/92h1VWpVIhY7HFPn6Q4J28CYpjaTkqPjdkakMWia.jpg', NULL, 14, 'A', 'saravanan', 'saravanan', 'A', '2021-10-20 23:33:54', '2021-10-25 01:03:26'),
(9, 9, 'TIAGO', 'TN 10 AJ 0010', 5, 2, 'M', 'car/buxiMODyi1SQE6z4dijHhv4NFLvjURyboqkLuPv0.jpg', NULL, 15, 'A', 'saravanan', 'saravanan', 'A', '2021-10-20 23:34:44', '2021-10-25 04:30:49'),
(10, 11, 'TIGOR', 'TN 04 AH 3084', 3, 1, 'A', 'car/kfx16SvRY92r9gRodflGeVHAzlDobE228gDZDxSR.jpg', NULL, 13, 'A', 'saravanan', 'saravanan', 'A', '2021-10-20 23:38:13', '2021-10-25 00:22:38'),
(11, 7, 'tatasafari', 'TN05AB0067', 4, 3, 'M', 'car/1MmA2j1bpbgPG20zbIysEWwnE37xK0fkN7trvI3b.png', NULL, 14, 'A', 'saravanan', 'saravanan', 'A', '2021-10-25 05:49:13', '2021-10-25 05:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `driver_details`
--

CREATE TABLE `driver_details` (
  `driver_id` int NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `driver_mobile` bigint NOT NULL,
  `driver_image` varchar(100) NOT NULL,
  `driver_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `driver_availablility` enum('A','B') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'A' COMMENT 'A-available,B-booked',
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `status` enum('A','IA','D') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'A' COMMENT 'A-active,IA-inactive,D-deleted',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `driver_details`
--

INSERT INTO `driver_details` (`driver_id`, `driver_name`, `driver_mobile`, `driver_image`, `driver_address`, `driver_availablility`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ajith', 8543990032, 'driver/IyYfBKS1AWzvHvi90fAPYqHMPCSItr9522bYujIb.jpg', 'saxasxasxasx', 'A', 'saravanan', 'saravanan', 'A', '2021-10-22 04:21:39', '2021-10-22 04:21:39'),
(2, 'surya', 467568867, 'driver/ZY3qNxODHrhha1v8A727WFAwyUtjxQ3bLZQpfTM7.jpg', 'acdscesdcsd', 'A', 'saravanan', 'saravanan', 'A', '2021-10-22 04:21:56', '2021-10-22 04:21:56'),
(3, 'aravinth', 3786785464, 'driver/OJwc79Ok6OxS3kBXxVTNBpLlxUexBrupK5jfb09T.jpg', 'asdsafsdfcvsdc', 'A', 'saravanan', 'saravanan', 'A', '2021-10-22 04:22:25', '2021-10-22 04:22:25'),
(4, 'duru', 987568687, 'driver/DgjLyaJOzP3Ia2OP1KwJ6KJBKWUXhrTMHiiaGGoZ.jpg', 'sddadcwedwe', 'A', 'saravanan', 'saravanan', 'A', '2021-10-22 04:22:55', '2021-10-22 04:22:55'),
(5, 'karthick', 897987635, 'driver/d3M4Ne25WaEC213K5syogLkBLVOS2kkttF2s3a7F.jpg', 'jkjsaxsathythjnyt', 'A', 'saravanan', 'saravanan', 'A', '2021-10-22 04:23:34', '2021-10-22 04:23:34'),
(6, 'ravi', 90905654, 'driver/dncHv02YdmjrgSxGe7tG1Pnc2cHsh7DOPfQ6YOdQ.jpg', 'cdfjmhjmjhm', 'A', 'saravanan', 'saravanan', 'A', '2021-10-22 04:23:59', '2021-10-22 04:23:59'),
(7, 'siva', 89874234, 'driver/bhtZdpEGMeMmKCFSnXaAGe9V8Eaj0ZqGBOh0sYF1.jpg', 'sxascfshyjn', 'A', 'saravanan', 'saravanan', 'A', '2021-10-22 04:24:13', '2021-10-22 04:24:13');

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
-- Table structure for table `location_details`
--

CREATE TABLE `location_details` (
  `location_id` int NOT NULL,
  `location_name` varchar(100) NOT NULL,
  `location_X_coordinate` int NOT NULL,
  `location_Y_coordinate` int NOT NULL,
  `location_image` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `status` enum('A','IA','D') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'A' COMMENT 'A-active,IA-inactive,D-delete',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `location_details`
--

INSERT INTO `location_details` (`location_id`, `location_name`, `location_X_coordinate`, `location_Y_coordinate`, `location_image`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'central', 22, 19, 'location/adRZPwtPJI5oCTTwKIbUjNryLiUMaaYzIMXIDyyB.jpg', 'admin1', 'admin1', 'A', '2021-10-17 23:29:23', '2021-10-17 23:29:23'),
(2, 'egmore', 18, 42, 'location/sD87c7mkK0gsjKi9tOrGmGxbdpwqZA8qQgGvibjR.jpg', 'admin1', 'admin1', 'A', '2021-10-17 23:33:04', '2021-10-17 23:33:04'),
(3, 'annanagar', 17, 60, 'location/asstI8zDNiu7sI8ae3Y40PX9LFjVHmDlDmFfkN78.png', 'admin1', 'admin1', 'A', '2021-10-17 23:34:02', '2021-10-17 23:34:02'),
(4, 'kottivakkam', 10, 70, 'location/eJWKscOFzGBbks2i9XPHASRcZu6DpINNIQ3wdwxW.jpg', 'admin1', 'admin1', 'A', '2021-10-17 23:34:56', '2021-10-17 23:34:56'),
(5, 'koyambeadu', 44, 25, 'location/5uMsdWRDC3d9IKcaxjAqvUXhhubF4LCuC317sVUx.jpg', 'admin1', 'saravanan', 'A', '2021-10-20 07:34:05', '2021-10-20 07:34:05'),
(6, 'meenambakkam', 49, 42, 'location/gWl9GyuMoIdbkZbuqxcSDlmFZR3V09mmEYTP7F5e.jpg', 'admin1', 'admin1', 'A', '2021-10-17 23:37:43', '2021-10-17 23:37:43'),
(7, 'mountroads', 41, 64, 'location/qrb3LUWNO05jvTBC3AoU5OcQk0t8JHuSbXBxJyEv.jpg', 'admin1', 'admin1', 'A', '2021-10-20 04:12:29', '2021-10-20 04:12:29'),
(8, 'mylapore', 47, 82, 'location/AahSwWQTIOGW3TMltBmoh6K3wBFLTqUQ1VyrK7hn.jpg', 'admin1', 'admin1', 'A', '2021-10-17 23:39:47', '2021-10-20 04:12:13'),
(9, 'nungambakkam', 24, 83, 'location/rSwokSby9ZbbFB8x0GQkhL0ujb2YnK12t3fjwRZw.png', 'admin1', 'admin1', 'A', '2021-10-17 23:41:41', '2021-10-20 04:12:16'),
(10, 'madurai', 76, 21, 'location/LasPP0bMdeohiXP6O7I3Dhwu9udVRC2y1jp3IJy4.jpg', 'admin1', 'admin1', 'A', '2021-10-20 04:12:54', '2021-10-20 04:12:54'),
(11, 'manamadurai', 23, 67, 'location/Y0Nfb1vCkJzsiUJyPcsn92dntL9Gcmqka6aLQt2I.jpg', 'admin1', 'saravanan', 'A', '2021-10-20 23:41:47', '2021-10-20 23:41:47');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('saravananpak1997@gmail.com', '$2y$10$yxCQ7zVSJN9nXyPU3bH.ruQfXSbQjRN798WcNcemWHLyHEKYVQYNm', '2021-10-19 22:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_details`
--

CREATE TABLE `travel_details` (
  `travel_id` int NOT NULL,
  `user_id` int NOT NULL,
  `start_location` varchar(100) NOT NULL,
  `end_location` varchar(100) NOT NULL,
  `trip` enum('1','2') NOT NULL COMMENT '1-oneway,2-roundtrip',
  `travel_date` date NOT NULL,
  `travel_time` time NOT NULL,
  `travel_distance` int NOT NULL,
  `status` enum('A','IA','D') NOT NULL DEFAULT 'A' COMMENT 'A-active,IA-inactive,D-delete',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `travel_details`
--

INSERT INTO `travel_details` (`travel_id`, `user_id`, `start_location`, `end_location`, `trip`, `travel_date`, `travel_time`, `travel_distance`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'mountroads', 'kottivakkam', '2', '2021-10-23', '18:32:00', 63, 'A', '2021-10-22 04:32:31', '2021-10-22 04:32:31'),
(2, 8, 'annanagar', 'nungambakkam', '2', '2021-10-23', '16:25:00', 48, 'A', '2021-10-22 05:25:01', '2021-10-22 05:25:01'),
(3, 1, 'nungambakkam', 'central', '2', '2021-10-23', '20:47:00', 128, 'A', '2021-10-22 07:47:46', '2021-10-22 07:47:46'),
(4, 8, 'nungambakkam', 'central', '1', '2021-10-23', '22:16:00', 64, 'A', '2021-10-22 09:16:19', '2021-10-22 09:16:19'),
(5, 1, 'nungambakkam', 'annanagar', '1', '2021-10-26', '21:25:00', 24, 'A', '2021-10-24 09:25:58', '2021-10-24 09:25:58'),
(6, 1, 'nungambakkam', 'annanagar', '1', '2021-10-26', '21:25:00', 24, 'A', '2021-10-24 09:27:05', '2021-10-24 09:27:05'),
(7, 1, 'nungambakkam', 'central', '2', '2021-10-26', '21:38:00', 128, 'A', '2021-10-24 09:38:17', '2021-10-24 09:38:17'),
(8, 1, 'nungambakkam', 'meenambakkam', '1', '2021-10-26', '13:39:00', 48, 'A', '2021-10-24 23:39:44', '2021-10-24 23:39:44'),
(9, 1, 'meenambakkam', 'kottivakkam', '2', '2021-10-26', '13:13:00', 96, 'A', '2021-10-25 00:14:16', '2021-10-25 00:14:16'),
(10, 1, 'nungambakkam', 'mylapore', '1', '2021-10-26', '13:57:00', 23, 'A', '2021-10-25 00:57:18', '2021-10-25 00:57:18'),
(11, 8, 'central', 'annanagar', '2', '2021-10-28', '17:30:00', 82, 'A', '2021-10-25 04:30:27', '2021-10-25 04:30:27'),
(12, 8, 'central', 'annanagar', '2', '2021-10-28', '17:30:00', 82, 'A', '2021-10-25 04:34:38', '2021-10-25 04:34:38'),
(13, 8, 'central', 'annanagar', '2', '2021-10-28', '17:30:00', 82, 'A', '2021-10-25 04:35:14', '2021-10-25 04:35:14'),
(14, 8, 'central', 'annanagar', '2', '2021-10-28', '17:30:00', 82, 'A', '2021-10-25 04:35:34', '2021-10-25 04:35:34'),
(15, 8, 'central', 'annanagar', '2', '2021-10-28', '17:30:00', 82, 'A', '2021-10-25 04:35:48', '2021-10-25 04:35:48'),
(16, 8, 'central', 'annanagar', '2', '2021-10-28', '17:30:00', 82, 'A', '2021-10-25 04:35:51', '2021-10-25 04:35:51'),
(17, 8, 'central', 'annanagar', '2', '2021-10-28', '17:30:00', 82, 'A', '2021-10-25 04:35:52', '2021-10-25 04:35:52'),
(18, 8, 'central', 'annanagar', '2', '2021-10-28', '17:30:00', 82, 'A', '2021-10-25 04:35:54', '2021-10-25 04:35:54'),
(19, 8, 'central', 'annanagar', '2', '2021-10-28', '17:30:00', 82, 'A', '2021-10-25 04:37:26', '2021-10-25 04:37:26'),
(20, 8, 'central', 'annanagar', '2', '2021-10-28', '17:30:00', 82, 'A', '2021-10-25 04:38:07', '2021-10-25 04:38:07'),
(21, 8, 'central', 'annanagar', '2', '2021-10-28', '17:30:00', 82, 'A', '2021-10-25 04:38:09', '2021-10-25 04:38:09'),
(22, 8, 'central', 'annanagar', '2', '2021-10-28', '17:30:00', 82, 'A', '2021-10-25 04:38:10', '2021-10-25 04:38:10'),
(23, 8, 'central', 'annanagar', '2', '2021-10-28', '17:30:00', 82, 'A', '2021-10-25 04:38:11', '2021-10-25 04:38:11'),
(24, 1, 'central', 'mountroads', '2', '2021-10-27', '18:38:00', 97, 'A', '2021-10-25 04:38:59', '2021-10-25 04:38:59'),
(25, 1, 'central', 'mountroads', '2', '2021-10-27', '18:38:00', 97, 'A', '2021-10-25 04:40:25', '2021-10-25 04:40:25'),
(26, 1, 'central', 'mountroads', '2', '2021-10-27', '18:38:00', 97, 'A', '2021-10-25 04:40:28', '2021-10-25 04:40:28'),
(27, 1, 'nungambakkam', 'central', '2', '2021-10-26', '16:41:00', 128, 'A', '2021-10-25 04:41:21', '2021-10-25 04:41:21'),
(28, 1, 'nungambakkam', 'central', '2', '2021-10-26', '16:41:00', 128, 'A', '2021-10-25 04:41:31', '2021-10-25 04:41:31'),
(29, 8, 'central', 'nungambakkam', '1', '2021-10-26', '18:45:00', 64, 'A', '2021-10-25 04:45:58', '2021-10-25 04:45:58'),
(30, 1, 'mountroads', 'koyambeadu', '1', '2021-10-26', '19:01:00', 39, 'A', '2021-10-25 05:01:15', '2021-10-25 05:01:15'),
(31, 8, 'madurai', 'meenambakkam', '1', '2021-10-26', '19:10:00', 34, 'A', '2021-10-25 05:10:13', '2021-10-25 05:10:13'),
(32, 8, 'mountroads', 'mylapore', '1', '2021-10-27', '18:21:00', 18, 'A', '2021-10-25 05:21:29', '2021-10-25 05:21:29'),
(33, 1, 'annanagar', 'koyambeadu', '2', '2021-10-26', '18:49:00', 88, 'A', '2021-10-25 05:49:44', '2021-10-25 05:49:44'),
(34, 8, 'mountroads', 'central', '2', '2021-10-26', '18:55:00', 97, 'A', '2021-10-25 05:55:07', '2021-10-25 05:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '1-admin,0-user',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_code` int NOT NULL,
  `mobile` bigint NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('A','IA','D') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'A-active,IA-inactive,D-delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `mobile_code`, `mobile`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'saravanan', 'saravananpak1997@gmail.com', NULL, '1', '$2y$10$MF7VfLS0Zsk4BZn0QTkj5epzh5RQ7QTn97AEYfLMp4TPLe4uFCxmq', 91, 8148377612, NULL, 'A', '2021-10-19 01:51:35', '2021-10-19 01:51:35'),
(2, 'vicky', 'vicky@gmail.com', NULL, '1', '$2y$10$Th6zqjC3N1NTVmFaD9uUgO6B8jA2K0AiFnuPHsRklqzYdKfm8NuOm', 0, 6382176776, NULL, 'A', '2021-10-19 01:52:09', '2021-10-19 01:52:09'),
(8, 'yeswanth', 'yeshwanthgs18@gmail.com', NULL, '0', '$2y$10$4wdbKinMQupQ9NSR/eDrO.vUYe7WNFwU/v/EiPCG6DGHMLMl8e24i', 91, 907876545, NULL, 'A', '2021-10-22 00:49:45', '2021-10-22 00:49:45'),
(9, 'gopi', 'gopi@gmail.com', NULL, '0', '$2y$10$bCsTgPt592Xka56eCyLED.d.CSC/l9sWGXsnfb1hFh80sFnJ053r.', 91, 432498098, NULL, 'A', '2021-10-22 04:00:49', '2021-10-22 04:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_mobile_code` int NOT NULL,
  `user_mobile` bigint NOT NULL,
  `user_roll` enum('A','U') NOT NULL COMMENT 'A-admin,U-user',
  `status` enum('A','IA','D') NOT NULL COMMENT 'A-active,IA-inactive,D-delete',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `car_details`
--
ALTER TABLE `car_details`
  ADD PRIMARY KEY (`car_id`),
  ADD UNIQUE KEY `car_number` (`car_number`);

--
-- Indexes for table `driver_details`
--
ALTER TABLE `driver_details`
  ADD PRIMARY KEY (`driver_id`),
  ADD UNIQUE KEY `driver_mobile` (`driver_mobile`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `location_details`
--
ALTER TABLE `location_details`
  ADD PRIMARY KEY (`location_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `travel_details`
--
ALTER TABLE `travel_details`
  ADD PRIMARY KEY (`travel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `booking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `car_details`
--
ALTER TABLE `car_details`
  MODIFY `car_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `driver_details`
--
ALTER TABLE `driver_details`
  MODIFY `driver_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location_details`
--
ALTER TABLE `location_details`
  MODIFY `location_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `travel_details`
--
ALTER TABLE `travel_details`
  MODIFY `travel_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
