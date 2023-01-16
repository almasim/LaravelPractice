-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Nov 29. 12:50
-- Kiszolgáló verziója: 10.4.25-MariaDB
-- PHP verzió: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `inventory`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(10, 'asd', 1, 6, NULL, '2022-11-25 08:34:56', NULL),
(11, 'Réz', 1, 6, NULL, '2022-11-28 11:09:08', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `costumers`
--

CREATE TABLE `costumers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `costumer_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `costumers`
--

INSERT INTO `costumers` (`id`, `name`, `costumer_image`, `mobile_number`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(13, 'Hedvig', 'upload/customer/1750460051062372.jpg', '2013041', 'hedvig@gmail.com', 'yes', 1, 6, NULL, '2022-11-25 08:33:12', NULL),
(14, 'József', 'upload/customer/1750741634926979.jpg', 'NaN', 'jozsika@kemeny.hu', 'Ózd', 1, 6, NULL, '2022-11-28 11:08:51', NULL),
(15, 'Pisti', 'upload/customer/1750750813630204.jpg', '12312', 'pisti@pi.sti', 'Kékes', 1, 6, NULL, '2022-11-28 13:34:45', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
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
-- Tábla szerkezet ehhez a táblához `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending,1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `date`, `desc`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(50, '1', '2022-11-25', 'asd', 1, 6, 6, '2022-11-25 08:40:10', '2022-11-25 10:02:09'),
(51, '2', '2022-11-25', 'asd', 0, 6, NULL, '2022-11-25 10:04:44', '2022-11-25 10:04:44'),
(52, '3', '2022-11-28', 'Józsi needs villámháritó de józsi csóró', 1, 6, 6, '2022-11-28 11:12:42', '2022-11-28 11:12:53'),
(53, '4', '2022-11-28', 'aaaa', 1, 6, 6, '2022-11-28 13:35:20', '2022-11-28 13:35:28'),
(54, '5', '2022-11-28', 'asd', 1, 6, 6, '2022-11-28 13:44:44', '2022-11-28 13:44:50'),
(55, '6', '2022-11-29', 'a', 0, 6, NULL, '2022-11-29 06:38:52', '2022-11-29 06:38:52');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `selling_qty` double DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `selling_price` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending,1=Approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `date`, `invoice_id`, `category_id`, `product_id`, `selling_qty`, `unit_price`, `selling_price`, `status`, `created_at`, `updated_at`) VALUES
(49, '2022-11-25', 50, 10, 8, 10, 100, 1000, 1, '2022-11-25 08:40:10', '2022-11-25 08:40:10'),
(50, '2022-11-25', 51, 10, 8, 40, 20, 800, 1, '2022-11-25 10:04:44', '2022-11-25 10:04:44'),
(51, '2022-11-28', 52, 11, 9, 5, 100, 500, 0, '2022-11-28 11:12:42', '2022-11-28 11:12:42'),
(52, '2022-11-28', 53, 11, 9, 10, 500, 5000, 0, '2022-11-28 13:35:20', '2022-11-28 13:35:20'),
(53, '2022-11-28', 54, 10, 8, 10, 1000, 10000, 0, '2022-11-28 13:44:44', '2022-11-28 13:44:44'),
(54, '2022-11-29', 55, 10, 8, 11, 100, 1100, 0, '2022-11-29 06:38:52', '2022-11-29 06:38:52');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_22_124810_create_suppliers_table', 2),
(6, '2022_11_22_143446_create_costumers_table', 3),
(7, '2022_11_22_143446_create_costumers_table másolata', 4),
(8, '2022_11_23_075831_create_units_table', 5),
(9, '2022_11_23_075831_create_units_table copy', 6),
(10, '2022_11_23_081848_create_categories_table', 7),
(11, '2022_11_23_083954_create_products_table', 8),
(12, '2022_11_23_120140_create_purchases_table', 9),
(13, '2022_11_24_100347_create_invoices_table', 10),
(14, '2022_11_24_100443_create_invoice_details_table', 10),
(15, '2022_11_24_100510_create_payments_table', 10),
(16, '2022_11_24_100537_create_payment_details_table', 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `costumer_id` int(11) DEFAULT NULL,
  `paid_status` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `costumer_id`, `paid_status`, `paid_amount`, `due_amount`, `total_amount`, `discount_amount`, `created_at`, `updated_at`) VALUES
(10, 50, 13, 'full_paid', 1000, 0, 1000, NULL, '2022-11-25 08:40:10', '2022-11-25 08:40:10'),
(11, 51, 13, 'full_paid', 800, 0, 800, NULL, '2022-11-25 10:04:44', '2022-11-25 10:04:44'),
(12, 52, 14, 'full_paid', 210, 0, 375, 25, '2022-11-28 11:12:42', '2022-11-28 13:18:19'),
(13, 53, 15, 'partial_paid', 1400, 1600, 3000, 40, '2022-11-28 13:35:20', '2022-11-28 13:45:48'),
(14, 54, 15, 'full_paid', 8000, 0, 8000, 20, '2022-11-28 13:44:44', '2022-11-28 13:44:44'),
(15, 55, 14, 'full_due', 0, 1100, 1100, NULL, '2022-11-29 06:38:52', '2022-11-29 06:38:52');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_id`, `current_paid_amount`, `date`, `updated_by`, `created_at`, `updated_at`) VALUES
(10, 50, 1000, '2022-11-25', NULL, '2022-11-25 08:40:10', '2022-11-25 08:40:10'),
(11, 51, 800, '2022-11-25', NULL, '2022-11-25 10:04:44', '2022-11-25 10:04:44'),
(12, 52, 0, '2022-11-28', NULL, '2022-11-28 11:12:42', '2022-11-28 11:12:42'),
(13, 52, 10, '2022-11-28', 6, '2022-11-28 13:16:24', '2022-11-28 13:16:24'),
(14, 52, 200, '2022-11-29', 6, '2022-11-28 13:17:30', '2022-11-28 13:17:30'),
(15, 52, NULL, '2022-11-29', 6, '2022-11-28 13:18:19', '2022-11-28 13:18:19'),
(16, 53, 0, '2022-11-28', NULL, '2022-11-28 13:35:20', '2022-11-28 13:35:20'),
(17, 54, 8000, '2022-11-28', NULL, '2022-11-28 13:44:44', '2022-11-28 13:44:44'),
(18, 53, 400, '2022-11-28', 6, '2022-11-28 13:45:36', '2022-11-28 13:45:36'),
(19, 53, 1000, '2022-11-28', 6, '2022-11-28 13:45:48', '2022-11-28 13:45:48'),
(20, 55, 0, '2022-11-29', NULL, '2022-11-29 06:38:52', '2022-11-29 06:38:52');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
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
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `supplier_id`, `unit_id`, `category_id`, `name`, `quantity`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, 5, 12, 10, 'asd', 970, 1, 6, NULL, '2022-11-25 08:38:59', '2022-11-28 13:44:50'),
(9, 11, 12, 11, 'Villámháritó', 35, 1, 6, NULL, '2022-11-28 11:10:40', '2022-11-28 13:35:28');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_qty` double NOT NULL,
  `unite_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending,1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `category_id`, `product_id`, `purchase_number`, `date`, `desc`, `buying_qty`, `unite_price`, `buying_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 5, 10, 8, '10000', '2022-11-26', '10', 1000, 1000, 1000000, 1, 6, NULL, '2022-11-25 08:39:32', '2022-11-25 08:39:49'),
(6, 11, 11, 9, '3', '2022-11-28', 'Villámháritó ami rézből van', 50, 100, 5000, 1, 6, NULL, '2022-11-28 11:11:34', '2022-11-28 11:11:43');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile_number`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'Bosundara', '123123123', 'bosundara@gmail.com', 'Bosundara', 1, 6, NULL, '2022-11-23 10:51:23', NULL),
(6, 'KSMR', '25551234', 'ksmr@gmail.com', 'KSMRstreet', 1, 6, NULL, '2022-11-23 10:51:47', NULL),
(7, 'Walton', '59658284', 'walton@gmail.com', 'walon street', 1, 6, NULL, '2022-11-23 10:52:19', NULL),
(8, 'Vision', '5294124', 'vison@vison.com', 'visssooo', 1, 6, NULL, '2022-11-23 10:52:42', NULL),
(9, 'Holcim', '683943431', 'holcim@gm.com', 'holcim street', 1, 6, NULL, '2022-11-23 10:53:04', NULL),
(10, 'Samsung', '6489234', 'samsung@asda.com', 'samsung', 1, 6, NULL, '2022-11-23 10:53:23', NULL),
(11, 'Villámháritó Zrt.', '984126412', 'villamharito@nozap.hu', 'Hegytető', 1, 6, NULL, '2022-11-28 11:10:20', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(12, 'PCG', 1, 6, NULL, '2022-11-23 10:50:02', NULL),
(13, 'KG', 1, 6, NULL, '2022-11-23 10:50:08', NULL),
(14, 'GM', 1, 6, NULL, '2022-11-23 10:50:14', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `username`, `profile_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', '2022-03-09 17:16:01', '$2y$10$rGET1JC4RHIml.EboWuABOxzgNGUB9EQZLTQsjOf2NkkKiOKlCEOi', 'user', '202203112055download.jpg', 'AEe7IjaEFf1qlITAqy3Ehgh0KQKtWPb7AFtyXynJ7IECGEaNKLlcXczBWYsS', '2022-03-09 16:27:03', '2022-03-11 15:08:45'),
(2, 'Kazi', 'kazi@gmail.com', '2022-03-09 17:14:32', '$2y$10$cdhHGJTOuPvl5jIlTKInWuk57U0fOnWuTpX8S4IU47H1jOYiMTa4C', 'kazi', '202203112033ariyan.jpg', NULL, '2022-03-09 17:12:44', '2022-03-11 15:57:21'),
(4, 'Demo', 'demo@gmail.com', '2022-03-09 17:54:03', '$2y$10$Ne1R842eJJw7VpVZ.jv31ulN12pHgAVKvx9JiB1nNfABYU/EwbvVy', 'demo', NULL, NULL, '2022-03-09 17:53:48', '2022-03-09 17:54:03'),
(6, 'tt', 'tt@gmail.com', '2022-11-22 12:12:15', '$2y$10$8za1.6D/eRnkfM2i4FTyJeAfIxcP29SCRIV6l.CHKfN3js7kTd1x.', 'tt', NULL, NULL, '2022-11-22 12:12:08', '2022-11-22 12:12:15');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `costumers`
--
ALTER TABLE `costumers`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- A tábla indexei `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- A tábla indexei `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `costumers`
--
ALTER TABLE `costumers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT a táblához `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT a táblához `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT a táblához `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
