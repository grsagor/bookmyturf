-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2025 at 05:39 AM
-- Server version: 10.11.14-MariaDB-cll-lve
-- PHP Version: 8.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grsagor1_bmt_db`
--

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
(4, '2025_03_30_091705_create_skills_table', 1),
(5, '2025_07_01_150547_create_settings_table', 2),
(6, '2025_07_01_150926_create_roles_table', 3),
(7, '2025_07_01_150800_add_role_id_to_users_table', 4),
(8, '2025_07_01_151548_add_status_to_users_table', 5),
(9, '2025_08_11_045306_create_orders_table', 6),
(10, '2025_08_11_103031_create_slots_table', 7),
(11, '2025_08_11_104906_add_name_to_slots_table', 8),
(12, '2025_08_11_110918_add_slot_id_and_date_to_orders_table', 9),
(13, '2025_08_11_131444_add_profile_image_to_users_table', 10),
(14, '2025_08_11_131701_add_phone_to_users_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slot_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL COMMENT 'Pending, Processing, Completed',
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `slot_id`, `date`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`, `created_at`, `updated_at`) VALUES
(12, 1, '2025-08-11', 'John Doe', 'you@example.com', '01711xxxxxx', 100, '93 B, New Eskaton Road', 'Processing', '6899d94e0a7a4', 'BDT', NULL, NULL),
(13, 3, '2025-08-12', 'John Doe', 'you@example.com', '01711xxxxxx', 110, '93 B, New Eskaton Road', 'Processing', '6899e204b5c87', 'BDT', NULL, NULL),
(14, 2, '2025-08-11', 'Roth Ruiz', 'lariwome@mailinator.com', '+1 (274) 804-7601', 53, 'Suscipit vitae eaque', 'Completed', '768768768', 'BDT', '2025-08-11 13:11:33', '2025-08-11 13:11:33'),
(15, 4, '2025-08-11', 'John Doe', 'you@example.com', '01711xxxxxx', 100, '93 B, New Eskaton Road', 'Pending', '689a3bc53de8b', 'BDT', NULL, NULL),
(16, 2, '2025-08-12', 'John Doe', 'you@example.com', '01711xxxxxx', 100, '93 B, New Eskaton Road', 'Pending', '689b4e0803bd2', 'BDT', NULL, NULL),
(17, 4, '2025-08-12', 'John Doe', 'you@example.com', '01711xxxxxx', 100, '93 B, New Eskaton Road', 'Pending', '689b4e497ad4d', 'BDT', NULL, NULL),
(18, 1, '2025-08-28', 'John Doe', 'you@example.com', '01711xxxxxx', 100, '93 B, New Eskaton Road', 'Pending', '68a9cbbf32c82', 'BDT', NULL, NULL),
(19, 1, '2025-10-02', 'John Doe', 'you@example.com', '01711xxxxxx', 100, '93 B, New Eskaton Road', 'Pending', '68de85ec60724', 'BDT', NULL, NULL),
(20, 4, '2025-10-05', 'John Doe', 'you@example.com', '01711xxxxxx', 100, '93 B, New Eskaton Road', 'Pending', '68e21e104ec45', 'BDT', NULL, NULL),
(21, 2, '2025-10-05', 'John Doe', 'you@example.com', '01711xxxxxx', 100, '93 B, New Eskaton Road', 'Pending', '68e21ef4df39e', 'BDT', NULL, NULL),
(22, 1, '2025-10-17', 'John Doe', 'you@example.com', '01711xxxxxx', 100, '93 B, New Eskaton Road', 'Pending', '68f2668f816a4', 'BDT', NULL, NULL),
(23, 1, '2025-11-02', 'John Doe', 'you@example.com', '01711xxxxxx', 100, '93 B, New Eskaton Road', 'Pending', '69074622b8457', 'BDT', NULL, NULL);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2025-07-01 15:14:23', '2025-07-01 15:14:23');

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
('1AuGiEcP52tj2u2qGsLw6EWWt54oQkhOKoaR2AQE', NULL, '193.19.82.12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiOFkwVVZTR2NCWk4xMzRGWGJlZ0ZoeEJjQmtrMVJUWERNamVxV01odiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765484188),
('1iQOkMuIi73CQjb3ByUmyuSNc9o1ANYgRz7AcE61', NULL, '68.183.75.126', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ2lvN2pSbjFSeHpPR3hDV0E4VHRhV0k4ZVFhY0I0aHZlRUFpQXVqNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly93d3cuYm10Lmdyc2Fnb3IuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765567736),
('1o8F9A9lVbvlHsKDr3gdmN96cBGW6OaueSF9x05c', NULL, '34.141.178.234', 'Scrapy/2.13.4 (+https://scrapy.org)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGhHckZUT1FyNlJlZmtlUURVRkVPb0JYWnpQY0diZzF1NHdsYTFkTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vYm10Lmdyc2Fnb3IuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765506102),
('3laxc0g9dBel4O2cV9KJJZRba16WiqzMDrMm1NGF', NULL, '216.73.216.162', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicXlDRXBvZmJRalNRN1NUU2FBbTJHU3R2eEJKS1J6RExsOTA4ODVHaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vYm10Lmdyc2Fnb3IuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765476158),
('4Sg8t8nofJr99mucBi7Z7jiaUBhO9DIjAyHMqso6', NULL, '35.189.255.200', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlBUaHZPcktzd2lpaHJVVmQxYkVEdlZ1OFdhUjRpcGJueWJKNmJ3NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20vP2F1dGhvcj0yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765558128),
('9FFtYzE24ZZaNObeA9a1O9maY5goQUYmwqZJvRQV', NULL, '34.7.6.88', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 11_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Safari/605.1.15', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoickE3TVJvcEhGWE1JeGpiNEM3Z3FJQVhtQjUzRFQzQllCVWp0R09vUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765473600),
('Ar3csK3AjJHDCOQtPkbrsYSXnmT1VQUnqh2Qtkp6', NULL, '34.242.224.32', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidk9FS3NzcWZGT3ZWdGJLTlpENkZIalVMaEtGY01jMDVoWnRkY0s5ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vYm10Lmdyc2Fnb3IuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765441439),
('BfIa8FKK0YoywjmA1q2GjHn7L5MaiwOGG7xtKPMj', NULL, '34.87.115.57', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWZPY0ZZMVBqVmd4MXlneXZQcUpVaHMzRVF4N3pZRmF0c0h6U05SYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1765474763),
('dAUvH8ukaJpcMVuUy8wg4CP3zgbmL2ckV0StCFeJ', NULL, '205.169.39.126', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejRKZU9LbDNnR2dMVFhtRE5iQTVoY240bEtqclhoUVZEQU1oTWM1TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1765472183),
('dB9QLTJ1dY6pb4VqY2MpmQHXFgAs6kopcnNo1dy9', NULL, '205.169.39.126', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0ZwNzJaaDFJdmdTSFl3b0NVcHJnUEIwNUozMjZJNzZiT3ZNWlpHNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1765472142),
('DpwSP2bw4m5ruQJ8he1mZpEXV77QKRVtTHUlyGrx', NULL, '35.189.255.200', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGNNcFptRmdWWTdWdzE0QmhoNGczTjFVMXBRQzQxS2YzcGRTM3hHaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly93d3cuYm10Lmdyc2Fnb3IuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765556463),
('FJCRFcgKEsZRAO1TX8Z3ZYs5cgAzsYzk1hGulGhx', NULL, '216.73.216.162', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlJqTmZMNXZ3cEhWblZoMzFZQmJuaTlUM2FZaFEyMlNHVHZ3NGd0SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJtdC5ncnNhZ29yLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1765476159),
('Fm28Pb4AbQ9XzoWL7MJCMiXnyUWnSCGIsD76sMfm', NULL, '68.183.75.126', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMk1XUVlNOWY4UG1KckppM1hOSkNHOGkzMXNtd0pzMUdROHlCZ3BTTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJtdC5ncnNhZ29yLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1765567737),
('ljPtKBS4EkS5mvXovg52UMd6FFmI56UdmvWTSnwL', NULL, '35.247.190.41', 'curl/7.83.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibHN1WEhFVTFaOXpzVlRSUGxrOWp6c1AzWTNLOW9oQ1BjSThSOUl4TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1765567642),
('MhId0AlLkQmCJR8dqyKSgAcIx2auKxqBGv6TP8ob', NULL, '138.68.109.249', 'Mozilla/5.0 (X11; Linux x86_64; rv:139.0) Gecko/20100101 Firefox/139.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVBVWkFXcU90RWRxbmZUREhSdk5ZMHdOd05WN25hYlV2YXI2VWNncyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vYm10Lmdyc2Fnb3IuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765458191),
('naHR1aseBBq0PxGwjNKTDArrnuxk1H9YujjiA2k5', NULL, '138.68.109.249', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOEQ1WExNTjFrNkFnZWhFWEJ0NXVyRVI2d0QxMjM1Mml2SExaRkNnQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1765458189),
('nX4vqUIYoTqcNkfSkUFqsMBsnsFb95AhwG5UdaYT', NULL, '34.138.114.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicTM3VmNsOVEwcnVLdGlDNXBEckdrSjFQR0lmUHl6SVF6bDZ1QTlUbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20vP2F1dGhvcj0yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765553253),
('obwNTCDSPCF9XpzgdYRRl9DGuoNaYfG4tQKGhOas', NULL, '193.19.82.13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVZmeVBTZ2pob0owZGhkaEVNTUQ2U2RmZHBlZzFTYkR2Z2NzVWtZRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vYm10Lmdyc2Fnb3IuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765484228),
('OgJbPgWvitIRH7vYhgcYOxUMghi6AzePw9AWoQls', NULL, '34.13.170.58', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.6422.142 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS29sSWZJQzZVQVpNbGo4Slk0VDE4RnFxSm9LaEttNlhkYlM0VFVjZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1765473601),
('Pf23bqQQ3TvQHBJwSMewO3XFFBZDYwwIiFDGGTjC', NULL, '34.142.168.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejBrSDZxZnFKcG9MS1FJNDJCSjRpdkxWRnV5czJTdlJTSHNrRFRCWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1765475547),
('pNE22n483C5RAwxPmc6dpNFmbLaTHXypOHVwwW0X', NULL, '34.138.114.218', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGVzTjByZDBHQWdKNmg1ZUNvQlo2R0gwWk5uWlFzcVVnUzcwM1NXNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1765548960),
('PP9RzOIgjZCjE4q8SKqQyuYjXDBtevVBDbxR1bWU', NULL, '34.29.15.33', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmpUek94TUxucHVGZmxEZmJtbnpJYXZlYUI3ZU9uMklJWDNNSGhnUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly93d3cuYm10Lmdyc2Fnb3IuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765548474),
('QIwCdZtxe44G0R4ir6DJxZlyQQusqyyK6vgi5V1A', NULL, '205.169.39.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWRtWVhVNUUwaFkyS21IT3VialJBVkRsSmJEcnduQ1k4TjNPbU94MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1765509510),
('qn155ROkN940BFoYVxUyixSDKFfsq1Tgu0T1QuC3', NULL, '34.141.178.234', 'Scrapy/2.13.4 (+https://scrapy.org)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZk85eENmdDFkZW1xb1dRT29jMUtLeUhkU3ZVNU1KS1cyYzE2RmxIViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJtdC5ncnNhZ29yLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1765506112),
('u3Iya4CKuIvZ037uM9WM8H8XSaRBf6D7Hb5mYWRd', NULL, '188.214.125.76', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZk8wMFBxdlg4N05ueUlHNm1seElFVGk4Zk5LYm82bk5YVDh4bW54VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vYm10Lmdyc2Fnb3IuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765486275),
('ukGE1RglMnEuAAZKWNzjhbrItpJNKyoQj3TQFSDk', NULL, '34.72.176.129', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQmRPaXN6ZWdWMGhIWlpzRzF4NDlGeFpiNXBGRFpMbU9CdnpTYW1qMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1765472145),
('uOXoYPhPFUlLX02NpZx37PVD44Gzhk6ZwJJn3dE5', NULL, '212.112.19.80', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZW81SXR1UDBROHhVak5wOTQ3eDlhb014YkRnUmJ4RXphOGdjWWNJZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1765486274),
('VUavhZ1fL9aAC3IhacJQynPyYEdy7ElJ78rBLVmn', NULL, '34.7.6.88', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.152 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclU4NmxRTk9jZXBRNDU5WUgwUm5laUZXeEpINmFyMTJGYjdCb1VlWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1765473604),
('WlmrEkvL89JX3iwC4ifVGawj74snZVOFZEBzrux0', NULL, '34.172.51.227', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzdDUDB3UkRqZW1LWEgxWEhzcFVOV0JlUnhrU24wbHhXRVlXWEVzdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly93d3cuYm10Lmdyc2Fnb3IuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765713575),
('X55AVbOikb9zp2cb4fv9zS02BHwou8q6j7vJbwCD', NULL, '34.172.51.227', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmhER0ZDVk5uT1k2TUpFZzZGdlVpaFBkSG1GajdFT3NWVExYb2JETCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9ibXQuZ3JzYWdvci5jb20vP2F1dGhvcj0yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765716674),
('XXoqCtV1X4LqjVM1Gpk1yRTCTaAEj5q1TLu5iZDa', NULL, '206.217.206.100', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGRqUnZqUDJHVWk3YloyVUZLWFJSVGlOa1JobWFvSzJFdUI0eDVJTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vYm10Lmdyc2Fnb3IuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765522691),
('YJGRFZLtI7BDRAS4PlIp45SlVOXRtOjmQNOuqWaY', NULL, '59.153.103.105', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1U1VU5zaVBYb0hLV0d6RHlYMXJzaWhIRmRkcmlLWG8yWGQ5Vjc4TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vYm10Lmdyc2Fnb3IuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765718715),
('ZVm6uNGxDTNEDPZc0ISUIMsTzhJJOwn7oujZwOnj', NULL, '23.234.110.26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidHBKc1NtcmhJenI0eWRnMkMwbWo2WFBZMkJoeWRvd1VTUENxNkx0dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJtdC5ncnNhZ29yLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1765528190);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'application_name', 'GRS', NULL, '2025-07-02 01:11:53'),
(2, 'site_logo', 'uploads/settings/17549185316899ee830bd43logo.png', '2025-08-11 13:22:11', '2025-08-11 13:22:11'),
(3, 'site_favicon', 'uploads/settings/17549185316899ee830cc78logo.png', '2025-08-11 13:22:11', '2025-08-11 13:22:11'),
(4, 'application_phone', NULL, '2025-08-11 13:22:11', '2025-08-11 13:22:31'),
(5, 'application_email', NULL, '2025-08-11 13:22:11', '2025-08-11 13:22:31'),
(6, 'application_toll_free', NULL, '2025-08-11 13:22:11', '2025-08-11 13:22:31'),
(7, 'application_fax', NULL, '2025-08-11 13:22:11', '2025-08-11 13:22:31'),
(8, 'application_address', NULL, '2025-08-11 13:22:11', '2025-08-11 13:22:31'),
(9, 'facebook_link', NULL, '2025-08-11 13:22:11', '2025-08-11 13:22:31'),
(10, 'twitter_link', NULL, '2025-08-11 13:22:11', '2025-08-11 13:22:31'),
(11, 'instagram_link', NULL, '2025-08-11 13:22:11', '2025-08-11 13:22:31'),
(12, 'linkedin_link', NULL, '2025-08-11 13:22:11', '2025-08-11 13:22:31'),
(13, 'youtube_link', NULL, '2025-08-11 13:22:11', '2025-08-11 13:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `proficiency` int(11) NOT NULL COMMENT 'Skill proficiency percentage (0-100)',
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `name`, `start_time`, `end_time`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Morning', '10:00:00', '11:00:00', 100.00, '2025-08-11 10:56:45', '2025-08-11 10:56:45'),
(2, 'Afternoon', '12:00:00', '13:00:00', 100.00, '2025-08-11 10:57:14', '2025-08-11 10:57:14'),
(3, 'Evening', '16:00:00', '17:00:00', 110.00, '2025-08-11 10:58:22', '2025-08-11 10:58:22'),
(4, 'Night', '12:15:00', '13:45:00', 100.00, '2025-08-11 10:58:42', '2025-08-12 01:54:37'),
(5, 'Evening', '14:27:00', '15:27:00', 500.00, '2025-10-05 14:27:32', '2025-10-05 14:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone`, `profile_image`, `email_verified_at`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, ' ', 'admin@gmail.com', NULL, 'uploads/user-images/17549182576899ed717f117pngtree-special-offer-tag-shape-free-vector-png-image_9173639.png', '2025-07-01 15:14:23', 1, '$2y$12$YqsxUSnqilBCta2ScHseTek3pJm33dfYBsAsBQj4Asvqh0ck7LeJW', NULL, '2025-07-01 15:14:23', '2025-08-11 13:17:37');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_slot_id_foreign` (`slot_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_slot_id_foreign` FOREIGN KEY (`slot_id`) REFERENCES `slots` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
