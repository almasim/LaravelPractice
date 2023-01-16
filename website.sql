-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Nov 22. 10:30
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
-- Adatbázis: `website`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `abouts`
--

CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `short_desc`, `long_desc`, `about_image`, `created_at`, `updated_at`) VALUES
(1, 'Nightmare', 'tasing people', '<p>tase people</p>', 'upload/about_page/1749731104562701.jpg', NULL, '2022-11-17 07:26:55');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_catgory_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `blogs`
--

INSERT INTO `blogs` (`id`, `blog_catgory_id`, `blog_title`, `blog_image`, `blog_tags`, `blog_desc`, `blog_category`, `created_at`, `updated_at`) VALUES
(2, '1', 'Kittiesss', 'upload/blog/1749832146444483.jpg', 'home,tech,asdas', '<p>asdasdasdasdasd</p>', NULL, '2022-11-18 10:12:56', '2022-11-18 10:23:46'),
(3, '5', 'Birbs are cool', 'upload/blog/1750088015680263.jpg', 'home,fly', '<p>Parrots</p>', NULL, '2022-11-21 05:59:52', NULL),
(4, '5', 'Doggos are cool', 'upload/blog/1750088069849816.jpg', 'home,doggy', '<p>Wuf</p>', NULL, '2022-11-21 06:00:43', '2022-11-21 06:57:13'),
(5, '5', 'owls', 'upload/blog/1750184974963413.jpg', 'home,nature', '<p>Hohoo</p>', NULL, '2022-11-22 07:40:59', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `blog_categories`
--

CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `blog_category`, `created_at`, `updated_at`) VALUES
(1, 'Mewy', NULL, '2022-11-18 07:53:38'),
(2, 'Cats', NULL, NULL),
(4, 'Dogs', NULL, NULL),
(5, 'Birb', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(2, 'usernameuser2', 'asd@asd.com', '23', '23', 'aaaa', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `footers`
--

CREATE TABLE IF NOT EXISTS `footers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `footers`
--

INSERT INTO `footers` (`id`, `number`, `short_desc`, `address`, `email`, `facebook`, `twitter`, `copyright`, `created_at`, `updated_at`) VALUES
(1, '6969420', 'Dsadnasdkwqeqmdslasdkskkk', 'Kppooopadd', 'mail@mail.com', 'facebook.com/face', 'twitter.com/tweet', 'CopyRight Text', NULL, '2022-11-21 08:19:18');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `home_slides`
--

CREATE TABLE IF NOT EXISTS `home_slides` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_slide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `home_slides`
--

INSERT INTO `home_slides` (`id`, `title`, `short_title`, `home_slide`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 'AAAAAAAAAAA', 'aaa', 'upload/home_slide/1749731205478693.jpg', 'https://www.youtube.com', '0000-00-00 00:00:00', '2022-11-17 07:28:31'),
(2, '12312', '4112', '3asd', 'www.google.com', NULL, NULL),
(3, '12312', '4112', '3asd', 'www.google.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_16_140453_create_home_slides_table', 2),
(6, '2022_11_17_073303_create_abouts_table', 3),
(7, '2022_11_17_092123_create_multi_images_table', 4),
(8, '2022_11_17_123225_create_portfolios_table', 5),
(9, '2022_11_18_071616_create_blog_categories_table', 6),
(10, '2022_11_18_090601_create_blogs_table', 7),
(11, '2022_11_18_090601_create_blogs_table másolata', 8),
(12, '2022_11_21_084500_create_footers_table', 9),
(13, '2022_11_21_093500_create_contacts_table', 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `multi_images`
--

CREATE TABLE IF NOT EXISTS `multi_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `multi_images`
--

INSERT INTO `multi_images` (`id`, `title`, `created_at`, `updated_at`) VALUES
(7, 'upload/multi/1749737355254052.jpg', '2022-11-17 09:06:16', NULL),
(8, 'upload/multi/1749746415544010.jpg', '2022-11-17 11:30:16', NULL),
(9, 'upload/multi/1749746415582830.jpg', '2022-11-17 11:30:16', NULL),
(10, 'upload/multi/1749746415591632.jpg', '2022-11-17 11:30:16', NULL),
(11, 'upload/multi/1749746415601323.jpg', '2022-11-17 11:30:16', NULL),
(12, 'upload/multi/1749746415612087.jpg', '2022-11-17 11:30:16', NULL),
(13, 'upload/multi/1749746415621511.jpg', '2022-11-17 11:30:16', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@gmail.com', '$2y$10$V9muqFewiCkoFdLl0syPTeN79LkW6GNe3eCtZBQjLJpnaVO8sW7Km', '2022-11-16 08:01:58');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `portfolios`
--

CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `port_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `portfolios`
--

INSERT INTO `portfolios` (`id`, `port_name`, `port_title`, `port_image`, `port_desc`, `created_at`, `updated_at`) VALUES
(1, 'Cat Portfolio', 'Cats', 'upload/portfolio_page/1749750722137791.jpg', '<p>Mews</p>', NULL, '2022-11-17 13:09:40'),
(3, 'asd', 'asd', 'upload/portfolio_page/1749754020592200.jpg', '<p>asd</p>', NULL, NULL),
(4, 'asd', 'asd', 'upload/portfolio_page/1749754044755059.jpg', '<p>asd</p>', NULL, NULL),
(5, 'asd', 'asd', 'upload/portfolio_page/1749754062780100.jpg', '<p>asdasd</p>', NULL, NULL),
(6, 'asd', 'asd', 'upload/portfolio_page/1749754162593250.jpg', '<p>asdasdasd</p>', NULL, NULL),
(7, 'asd', 'asdasdasd', 'upload/portfolio_page/1749754297910982.jpg', '<p>asdasdasdasdasdasdasdas</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `profile_image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL, 'user@gmail.com', '2022-11-15 12:02:52', '$2y$10$UpMG5EHXjIaP1mjsAmTO/Orlp4p6AKMlxIKhAkvlYyFD4LOt4/hNq', NULL, '2022-11-15 11:08:56', '2022-11-15 12:02:52'),
(3, 'user2', NULL, NULL, 'almasi.milan.work@gmail.com', '2022-11-15 12:01:57', '$2y$10$mJpj/muHp247RMuyFgwkLeblFcQ4jGRKqTOdVX0tC7FDj4FL/0amq', NULL, '2022-11-15 11:58:32', '2022-11-15 12:01:57'),
(4, 'user3', NULL, NULL, 'user3@gmail.com', '2022-11-15 12:37:52', '$2y$10$Zh57jmT9qiuRhRGFgciedupfDwt9ZVzy5sSgfaVCxTymvlZli0kAC', NULL, '2022-11-15 12:37:46', '2022-11-15 12:37:52'),
(5, 'usernameuser2', 'username2', '202211161307letöltés.jpg', 'user4@gmail.com', '2022-11-15 12:40:20', '$2y$10$w.Cdipvt4a3Unt.TcxyT6OVPMkiJ7Ae6rGkbqUWYLMNr9YPHE8sDa', NULL, '2022-11-15 12:40:05', '2022-11-16 12:12:59'),
(6, 'test2', 'test', '202211161213kitty.jpg', 'test@gmail.com', '2022-11-16 06:56:35', '$2y$10$uiwhb9GvAO3NbDWhhA627eFd5.Ycle5EVPiNSIeiM.heZS.jMkyQG', NULL, '2022-11-16 06:56:05', '2022-11-16 12:15:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
