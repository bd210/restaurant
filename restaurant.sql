-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 10:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(200) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `id_picture` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `created_at`, `modified_at`, `title`, `description`, `id_picture`) VALUES
(1, '2021-01-22 13:34:47', '2021-01-25 14:51:16', 'Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 80);

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `id` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `workplace` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_picture` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`id`, `created_at`, `modified_at`, `name`, `workplace`, `id_picture`) VALUES
(1, '2020-11-20 12:43:33', NULL, 'Walter White', 'Master Chef', 1),
(2, '2020-11-20 12:48:36', NULL, 'Sarah Jhonson', 'Patissier', 2),
(3, '2020-11-20 12:48:36', NULL, 'William Anderson', 'Cook', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(255) UNSIGNED NOT NULL,
  `id_menu` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `created_at`, `modified_at`, `content`, `id_user`, `id_menu`) VALUES
(1, '2021-01-13 14:08:36', NULL, 'Prvi komentar', 1, 5),
(2, '2021-01-13 14:08:36', '2021-03-17 15:14:10', 'Ovo je drugi komentar izmenaaa123', 1, 5),
(18, '2021-02-24 14:49:12', NULL, 'asd', 3, 7),
(19, '2021-02-24 14:51:33', NULL, 'asd', 3, 4),
(21, '2021-03-17 16:47:24', NULL, 'komentarcic', 11, 3),
(22, '2021-03-17 16:47:24', NULL, 'komentarrr222', 23, 4),
(23, '2021-03-17 16:47:59', NULL, 'asbabnsasna', 12, 6),
(24, '2021-03-17 16:47:59', NULL, '1213123cscsc', 26, 8),
(26, '2021-03-17 16:48:27', NULL, 'hehehehehe', 12, 4),
(27, '2021-03-17 16:48:59', NULL, 'probicaaa', 26, 2),
(28, '2021-03-17 17:05:32', NULL, 'da1sdfsgsgsg', 1, 4),
(30, '2021-03-17 17:05:54', NULL, 'hello my friend', 11, 4),
(31, '2021-03-17 17:05:54', NULL, 'dajdajdjadja', 12, 4),
(32, '2021-03-17 17:06:17', NULL, 'OK', 23, 4),
(33, '2021-03-17 17:06:17', NULL, 'niceee', 26, 4),
(34, '2021-03-17 17:16:31', NULL, 'first comm', 3, 9),
(36, '2021-03-20 21:02:03', NULL, 'neki komentar', 30, 2),
(38, '2021-04-10 14:52:37', NULL, 'MILAN', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `open_hours` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `created_at`, `modified_at`, `name`, `location`, `email`, `phone`, `open_hours`) VALUES
(1, '2021-01-22 13:13:26', '2021-04-10 12:31:32', 'THAI CUISINE', 'A108 Adam Street, New York, NY 535022', 'restaurantly@example.com', '+1 5589 55488 55s', 'Monday-Saturday: 09:00 AM - 23:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `id_picture` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `created_at`, `modified_at`, `title`, `description`, `price`, `id_picture`) VALUES
(1, '2020-11-20 16:34:21', NULL, 'Birthday Parties', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate\r\n                        velit esse cillum dolore eu fugiat nulla pariatur', '189', 21),
(2, '2020-11-20 16:34:21', NULL, 'Private Parties', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n\r\n  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate\r\n                        velit esse cillum dolore eu fugiat nulla pariatur', '290', 22),
(3, '2020-11-20 16:34:21', NULL, 'Custom Parties', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore  magna aliqua.\r\n Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate\r\n                        velit esse cillum dolore eu fugiat nulla pariatur', '99', 23),
(4, '2020-11-20 16:42:26', NULL, 'Public parties', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate\r\n                        velit esse cillum dolore eu fugiat nulla pariatur', '130', 24);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `id_picture` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `created_at`, `modified_at`, `id_picture`) VALUES
(1, '2021-01-22 13:28:09', NULL, 4),
(2, '2021-01-22 13:28:09', NULL, 5),
(3, '2021-01-22 13:28:09', NULL, 6),
(4, '2021-01-22 13:28:09', NULL, 7),
(5, '2021-01-22 13:28:09', NULL, 8),
(6, '2021-01-22 13:28:09', NULL, 9),
(7, '2021-01-22 13:28:09', NULL, 10),
(8, '2021-01-22 13:28:09', NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `created_at`, `modified_at`, `location`) VALUES
(1, '2021-03-18 11:42:05', '2021-03-22 12:29:48', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `id_menutypes` int(255) UNSIGNED NOT NULL,
  `id_picture` int(255) UNSIGNED NOT NULL,
  `id_user` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `created_at`, `modified_at`, `name`, `description`, `price`, `id_menutypes`, `id_picture`, `id_user`) VALUES
(2, '2020-11-20 13:29:33', NULL, 'Bread Barrel', 'Lorem, deren, trataro, filede, nerada', '7', 3, 13, 1),
(3, '2020-11-20 14:01:36', NULL, 'Caesar Selections', 'Lorem, deren, trataro, filede, nerada', '9', 2, 14, 1),
(4, '2020-11-20 14:01:36', NULL, 'Tuscan Grilled', 'Grilled chicken with provolone, artichoke hearts, and roasted red pesto', '10', 3, 15, 1),
(5, '2020-11-20 14:01:36', NULL, 'Mozzarella Stick', 'Lorem, deren, trataro, filede, nerada', '5', 1, 16, 1),
(6, '2020-11-20 14:01:36', NULL, 'Greek Salad', 'Fresh spinach, crisp romaine, tomatoes, and Greek olives', '10', 2, 17, 1),
(7, '2020-11-20 14:01:36', NULL, 'Spinach Salad', 'Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette', '10', 2, 18, 1),
(8, '2020-11-20 14:01:36', NULL, 'Lobster Roll', 'Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll', '13', 3, 19, 1),
(9, '2020-11-20 14:02:33', NULL, 'Crab Cake', 'A delicate crab cake served on a toasted roll with lettuce and tartar sauce', '8', 1, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menutypes`
--

CREATE TABLE `menutypes` (
  `id` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menutypes`
--

INSERT INTO `menutypes` (`id`, `created_at`, `modified_at`, `type`) VALUES
(1, '2021-01-22 13:22:54', NULL, 'starters'),
(2, '2021-01-22 13:22:54', NULL, 'salads'),
(3, '2021-01-22 13:22:54', NULL, 'specialty');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `src` text COLLATE utf8_unicode_ci NOT NULL,
  `alt` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `created_at`, `modified_at`, `src`, `alt`) VALUES
(1, '2020-11-20 12:44:20', NULL, 'assets/img/chefs/chefs-1.jpg', 'master chef'),
(2, '2020-11-20 12:46:07', NULL, 'assets/img/chefs/chefs-2.jpg', 'Patissier'),
(3, '2020-11-20 12:46:07', NULL, 'assets/img/chefs/chefs-3.jpg', 'Cook'),
(4, '2020-11-20 12:52:40', NULL, 'assets/img/gallery/gallery-1.jpg', 'galerija'),
(5, '2020-11-20 12:52:40', NULL, 'assets/img/gallery/gallery-2.jpg', 'galerija'),
(6, '2020-11-20 12:53:37', NULL, 'assets/img/gallery/gallery-3.jpg', 'galerija'),
(7, '2020-11-20 12:53:37', NULL, 'assets/img/gallery/gallery-4.jpg', 'galerija'),
(8, '2020-11-20 12:54:02', NULL, 'assets/img/gallery/gallery-5.jpg', 'galerija'),
(9, '2020-11-20 12:54:02', NULL, 'assets/img/gallery/gallery-6.jpg', 'galerija'),
(10, '2020-11-20 12:54:45', NULL, 'assets/img/gallery/gallery-7.jpg', 'galerija'),
(11, '2020-11-20 12:54:45', NULL, 'assets/img/gallery/gallery-8.jpg', 'galerija'),
(12, '2020-11-20 13:08:09', NULL, 'assets/img/menu/lobster-bisque.jpg', 'menu - Lobster Bisque'),
(13, '2020-11-20 13:08:09', NULL, 'assets/img/menu/bread-barrel.jpg', 'menu - Bread Barrel'),
(14, '2020-11-20 13:08:09', NULL, 'assets/img/menu/caesar.jpg', 'menu - Caesar Selections'),
(15, '2020-11-20 13:08:09', NULL, 'assets/img/menu/tuscan-grilled.jpg', 'menu - Tuscan Grilled'),
(16, '2020-11-20 13:08:09', NULL, 'assets/img/menu/mozzarella.jpg', 'menu - Mozzarella Stick'),
(17, '2020-11-20 13:08:09', NULL, 'assets/img/menu/greek-salad.jpg', 'menu - Greek Salad'),
(18, '2020-11-20 13:08:09', NULL, 'assets/img/menu/spinach-salad.jpg', 'menu - Spinach Salad'),
(19, '2020-11-20 13:08:09', NULL, 'assets/img/menu/lobster-roll.jpg', 'menu - Lobster Roll'),
(20, '2020-11-20 13:08:09', NULL, 'assets/img/menu/cake.jpg', 'menu - Crab Cake'),
(21, '2020-11-20 16:30:53', NULL, 'assets/img/events/event-birthday.jpg', 'event birthday'),
(22, '2020-11-20 16:30:53', NULL, 'assets/img/events/event-private.jpg', 'event private'),
(23, '2020-11-20 16:30:53', NULL, 'assets/img/events/event-custom.jpg', 'event custom'),
(24, '2020-11-20 16:41:20', NULL, '	\r\nassets/img/events/events-bg.jpg', 'event bg'),
(25, '2020-11-20 17:13:26', NULL, 'assets/img/specials/specials-1.png', 'specials'),
(26, '2020-11-20 17:13:26', NULL, 'assets/img/specials/specials-2.png', 'specials'),
(27, '2020-11-20 17:13:26', NULL, 'assets/img/specials/specials-3.png', 'specials'),
(28, '2020-11-20 17:13:26', NULL, 'assets/img/specials/specials-4.png', 'specials'),
(29, '2020-11-20 17:13:26', NULL, 'assets/img/specials/specials-5.png', 'specials'),
(30, '2020-11-21 13:06:20', NULL, 'assets/img/about.jpg', 'about us'),
(31, '2020-12-10 13:56:26', '2020-12-10 14:56:26', 'assets/img/users/1607612186_aaaa.jpg', 'slicica'),
(32, '2021-01-08 10:24:18', '2021-01-08 11:24:18', 'assets/img/users/1610105058_eye2.jpg', 'slicica'),
(33, '2021-01-08 10:35:31', '2021-01-08 11:35:31', 'assets/img/users/1610105731_jaje.jpg', 'slicica'),
(34, '2021-01-08 13:51:34', '2021-01-08 13:51:34', 'assets/img/users/default.png', 'default img user'),
(35, '2021-01-08 13:00:58', '2021-01-08 14:00:58', 'assets/img/users/1610114458_2.png', 'slicica'),
(36, '2021-01-17 10:57:57', '2021-01-17 11:57:57', 'assets/img/users/1610884677_losmi.jpg', 'slika korisnika'),
(37, '2021-01-19 15:07:38', '2021-01-19 15:07:38', 'assets/img/chefs/1611068858_losmi.jpg', 'chef picture'),
(38, '2021-01-19 15:29:04', '2021-01-19 15:29:04', 'assets/img/chefs/1611070144_2.png', 'chef picture'),
(39, '2021-01-19 15:42:53', '2021-01-19 15:42:53', 'assets/img/chefs/1611070973_1.png', 'chef picture'),
(40, '2021-01-19 16:14:01', NULL, 'assets/img/chefs/1611072841_1.png', 'chef picture'),
(41, '2021-01-19 17:00:32', NULL, 'assets/img/events/1611075632_losmi.jpg', 'event picture'),
(42, '2021-01-19 17:02:18', NULL, 'assets/img/events/1611075738_1.png', 'event picture'),
(43, '2021-01-19 17:06:23', NULL, 'assets/img/events/1611075983_2.png', 'event picture'),
(44, '2021-01-19 19:22:49', NULL, 'assets/img/specials/1611087769_losmi.jpg', 'special picture'),
(45, '2021-01-21 08:28:51', NULL, 'assets/img/specials/1611221331_losmi.jpg', 'special picture'),
(46, '2021-01-21 09:34:55', NULL, 'assets/img/events/1611221695_2.png', 'event picture'),
(47, '2021-01-21 09:35:23', NULL, 'assets/img/chefs/1611221723_losmi.jpg', 'chef picture'),
(48, '2021-01-21 09:22:03', NULL, 'assets/img/menu/1611224523_losmi.jpg', 'menu picture'),
(49, '2021-01-21 09:31:53', NULL, 'assets/img/menu/1611225113_1.png', 'menu picture'),
(50, '2021-01-21 09:33:36', NULL, 'assets/img/menu/1611225216_2.png', 'menu picture'),
(51, '2021-01-21 09:36:37', NULL, 'assets/img/menu/1611225397_2.png', 'menu picture'),
(52, '2021-01-21 09:36:51', NULL, 'assets/img/menu/1611225411_losmi.jpg', 'menu picture'),
(53, '2021-01-21 10:55:52', NULL, 'assets/img/chefs/1611226552_aaaa.jpg', 'chef picture'),
(54, '2021-01-21 10:59:58', NULL, 'assets/img/events/1611226798_aaaa.jpg', 'event picture'),
(55, '2021-01-21 10:01:54', NULL, 'assets/img/specials/1611226914_losmi.jpg', 'special picture'),
(56, '2021-01-21 11:40:37', NULL, 'assets/img/gallery/1611229236_aaaa.jpg', 'gallery picture'),
(57, '2021-01-21 11:52:37', NULL, 'assets/img/gallery/1611229957_losmi.jpg', 'gallery picture'),
(58, '2021-01-21 11:57:28', NULL, 'assets/img/users/1611233848_aaaa.jpg', 'slika korisnika'),
(59, '2021-01-21 11:57:58', NULL, 'assets/img/users/1611233878_2.png', 'slika korisnika'),
(60, '2021-01-25 11:14:45', NULL, 'assets/img/events/1611573285_aaaa.jpg', 'event picture'),
(61, '2021-01-25 12:50:28', NULL, 'assets/img/events/1611579028_losmi.jpg', 'picutre event'),
(62, '2021-01-25 12:52:50', NULL, 'assets/img/events/1611579170_1.png', 'picutre event'),
(63, '2021-01-25 12:54:10', NULL, 'assets/img/chefs/1611579250_aaaa.jpg', 'chef picture'),
(64, '2021-01-25 13:42:58', NULL, 'assets/img/chefs/1611582178_losmi.jpg', 'chef picture'),
(65, '2021-01-25 13:58:51', NULL, 'assets/img/users/1611583131_losmi.jpg', 'user picture'),
(66, '2021-01-25 14:03:09', NULL, 'assets/img/users/1611583389_1.png', 'user picture'),
(67, '2021-01-25 13:06:37', NULL, 'assets/img/menu/1611583597_aaaa.jpg', 'menu picture'),
(68, '2021-01-25 14:23:19', NULL, 'assets/img/menu/1611584599_losmi.jpg', 'menu picture'),
(69, '2021-01-25 13:31:30', NULL, 'assets/img/specials/1611585090_aaaa.jpg', 'special picture'),
(70, '2021-01-25 13:32:55', NULL, 'assets/img/specials/1611585175_aaaa.jpg', 'special picture'),
(71, '2021-01-25 13:45:42', NULL, 'assets/img/specials/1611585942_aaaa.jpg', 'special picture'),
(72, '2021-01-25 13:48:39', NULL, 'assets/img/specials/1611586119_aaaa.jpg', 'special picture'),
(73, '2021-01-25 15:04:05', NULL, 'assets/img/specials/1611587045_losmi.jpg', 'special pitcture'),
(74, '2021-01-25 14:06:24', NULL, 'assets/img/specials/1611587184_2.png', 'special picture'),
(75, '2021-01-25 15:06:43', NULL, 'assets/img/specials/1611587202_aaaa.jpg', 'special pitcture'),
(76, '2021-01-25 15:20:36', NULL, 'assets/img/gallery/1611588036_aaaa.jpg', 'gallery picture'),
(77, '2021-01-25 15:29:48', NULL, 'assets/img/gallery/1611588588_losmi.jpg', 'gallery picture'),
(78, '2021-01-25 15:31:16', NULL, 'assets/img/gallery/1611588676_2.png', 'gallery picture'),
(79, '2021-01-25 15:50:06', NULL, 'assets/img/1611589806_losmi.jpg', 'about picture'),
(80, '2021-01-25 15:51:16', NULL, 'assets/img/1611589876_about.jpg', 'about picture'),
(81, '2021-01-25 18:40:08', NULL, 'assets/img/users/1611600008_losmi.jpg', 'user picture'),
(82, '2021-01-25 17:41:22', NULL, 'assets/img/menu/1611600082_about.jpg', 'menu picture'),
(83, '2021-01-25 18:42:57', NULL, 'assets/img/menu/1611600177_aaaa.jpg', 'menu picture'),
(84, '2021-01-25 18:45:26', NULL, 'assets/img/chefs/1611600326_aaaa.jpg', 'chef picture'),
(85, '2021-01-25 18:46:10', NULL, 'assets/img/chefs/1611600370_2.png', 'chef picture'),
(86, '2021-01-25 17:47:57', NULL, 'assets/img/specials/1611600477_aaaa.jpg', 'special picture'),
(87, '2021-01-25 18:49:18', NULL, 'assets/img/specials/1611600558_2.png', 'special pitcture'),
(88, '2021-01-25 18:49:48', NULL, 'assets/img/events/1611600588_aaaa.jpg', 'event picture'),
(89, '2021-01-25 18:51:05', NULL, 'assets/img/events/1611600665_2.png', 'picutre event'),
(90, '2021-01-25 18:51:47', NULL, 'assets/img/gallery/1611600707_1.png', 'gallery picture'),
(91, '2021-01-25 18:52:09', NULL, 'assets/img/gallery/1611600729_aaaa.jpg', 'gallery picture'),
(92, '2021-01-26 13:34:56', NULL, 'assets/img/users/1611671696_aaaa.jpg', 'slicica'),
(93, '2021-01-26 23:19:56', NULL, 'assets/img/users/1611703196_aaaa.jpg', 'user picture'),
(94, '2021-02-01 19:51:57', NULL, 'assets/img/users/1612209116_losmi.jpg', 'user picture'),
(95, '2021-03-10 12:24:02', NULL, 'assets/img/menu/1615382642_about.jpg', 'menu picture'),
(96, '2021-03-10 12:26:30', NULL, 'assets/img/menu/1615382790_2.png', 'menu picture'),
(97, '2021-03-10 13:31:31', NULL, 'assets/img/menu/1615383091_11 - pravljenje_forme.mp4', 'menu picture'),
(98, '2021-03-10 13:32:04', NULL, 'assets/img/menu/1615383124_11 - pravljenje_forme.mp4', 'menu picture'),
(99, '2021-03-10 13:32:56', NULL, 'assets/img/menu/1615383176_2.png', 'menu picture'),
(100, '2021-03-10 13:39:14', NULL, 'assets/img/chefs/1615383554_2.png', 'chef picture'),
(101, '2021-03-10 13:39:33', NULL, 'assets/img/chefs/1615383573_aaaa.jpg', 'chef picture'),
(102, '2021-03-10 13:42:37', NULL, 'assets/img/events/1615383757_1.png', 'event picture'),
(103, '2021-03-10 13:42:59', NULL, 'assets/img/events/1615383779_aaaa.jpg', 'picutre event'),
(104, '2021-03-10 12:47:03', NULL, 'assets/img/specials/1615384023_aaaa.jpg', 'special picture'),
(105, '2021-03-10 13:51:02', NULL, 'assets/img/gallery/1615384262_2.png', 'gallery picture'),
(106, '2021-03-10 13:51:21', NULL, 'assets/img/gallery/1615384281_aaaa.jpg', 'gallery picture'),
(107, '2021-04-10 15:04:19', NULL, 'assets/img/gallery/1618067059_losmi.jpg', 'gallery picture');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(255) UNSIGNED NOT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `number_of_people` int(255) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `modified_at`, `created_at`, `name`, `email`, `phone`, `date`, `number_of_people`, `message`) VALUES
(1, NULL, '2021-01-11 11:02:03', 'Boris', 'boris.dmitrovic.ajax@gmail.com', '029595', '2021-09-17 13:04:00', 5, 'bdbdbdbdbbdbdbd'),
(2, NULL, '2021-01-11 11:04:58', 'Marko', 'marko@gmail.com', '063607189', '2021-01-14 16:00:00', 3, 'asdasd'),
(3, NULL, '2021-01-11 11:28:46', 'Milovan', 'milovandmitrovic@gmail.com', '034562123', '2021-01-25 15:30:00', 5, 'Odabrana rezervacija'),
(10, NULL, '2021-01-21 19:51:21', 'Marko', 'marko@gmail.com', '0213455', '2021-01-16 22:54:00', 4, 'hehehehehehehhehehe'),
(11, '2021-01-26 14:44:57', '2021-01-21 20:12:19', 'Marko', 'marko@gmail.com', '321321', '2021-02-06 02:52:00', 5, 'asasasa'),
(12, '2021-03-10 11:29:11', '2021-03-10 12:27:43', 'Boris Dmitrovic', 'nekimejl@gmail.com', '062607184', '2021-03-21 16:30:00', 5, 'Ovo je tekst neki'),
(13, NULL, '2021-03-17 18:54:45', 'Boris', 'strukapro@gmail.com', '062607184', '2021-03-26 19:00:00', 4, 'Pozdrav'),
(14, NULL, '2021-03-17 19:00:01', 'Marko', 'markes@gmail.com', '065894624', '2021-04-08 13:00:00', 3, 'Porukica'),
(15, NULL, '2021-03-17 19:01:45', 'Milica', 'milicica@gmail.com', '063456789', '2021-04-11 21:03:00', 10, 'Postovani,\r\nRezervisao bih sto za 10 osoba za proslavu svog rodjendana'),
(16, NULL, '2021-03-17 19:03:48', 'Ivana', 'ivanica@gmail.com', '064563278', '2021-06-30 18:00:00', 2, 'Postovani, vidimo se 30.06. u 20 H'),
(18, NULL, '2021-03-20 21:06:49', 'Neko', 'neko@gmail.com', '06584231', '2021-04-03 20:00:00', 2, 'asasas'),
(19, NULL, '2021-03-20 21:08:24', 'Marko', 'marko@gmail.com', '0213455123', '2021-04-10 00:12:00', 3, 'sasasa');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `modified_at`, `name`) VALUES
(1, '2021-01-22 13:38:44', NULL, 'admin'),
(2, '2021-01-22 13:38:44', NULL, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `created_at`, `modified_at`, `name`, `url`) VALUES
(1, '2021-01-22 11:33:26', NULL, 'twitter', 'https://twitter.com/'),
(2, '2021-01-22 11:33:26', NULL, 'facebook', 'https://www.facebook.com/'),
(3, '2021-01-22 11:33:26', NULL, 'instagram', 'https://www.instagram.com/'),
(4, '2021-01-22 11:33:26', NULL, 'linkedin', 'https://www.linkedin.com/');

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE `specials` (
  `id` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `tab` int(255) UNSIGNED NOT NULL,
  `id_picture` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`id`, `created_at`, `modified_at`, `name`, `title`, `description`, `tab`, `id_picture`) VALUES
(1, '2020-11-20 17:20:48', NULL, 'Meal 1', 'Architecto ut aperiam autem id', 'Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka\r\n\r\nEt nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero', 1, 25),
(2, '2020-11-20 17:20:48', NULL, 'Meal 2', 'Et blanditiis nemo veritatis excepturi', 'Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka\r\n\r\nEa ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal', 2, 26),
(3, '2020-11-20 17:20:48', NULL, 'Meal 3', 'Impedit facilis occaecati odio neque aperiam sit', 'Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut\r\n\r\nIure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae', 3, 27),
(4, '2020-11-20 17:20:48', NULL, 'Meal 4', 'Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore', 'Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus\r\n\r\nEaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore', 4, 28),
(5, '2020-11-20 17:20:48', NULL, 'Meal 5', 'Est eveniet ipsam sindera pad rone matrelat sando reda', 'Omnis blanditiis saepe eos autem qui sunt debitis porro quia.\r\n\r\nExercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel', 5, 29);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `created_at`, `modified_at`, `content`, `id_user`) VALUES
(1, '2021-01-22 11:47:27', NULL, 'Ovo je prvi komentar', 3),
(12, '2021-01-22 11:47:27', NULL, 'ovo je neki sarzaj', 1),
(14, '2021-01-22 11:47:27', '2021-01-22 12:09:20', 'Content izmenaaaasasasasas123321', 1),
(15, '2021-01-22 14:11:57', NULL, 'Probaaa', 1),
(18, '2021-02-20 12:59:54', NULL, 'ccc', 1),
(19, '2021-02-24 14:43:10', NULL, 'asasas', 3),
(21, '2021-03-17 19:19:50', NULL, 'aaaaaaaaaaaaaasssssssssss', 3),
(22, '2021-03-19 11:59:47', NULL, 'proba', 3),
(24, '2021-04-10 14:32:55', NULL, 'ASAFGDFJGGHLKHLK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `src` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_role` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `modified_at`, `first_name`, `last_name`, `email`, `password`, `src`, `alt`, `id_role`) VALUES
(1, '2021-01-22 11:04:48', '2021-02-24 13:58:39', 'Boris', 'Dmitrovic', 'strukapro@gmail.com', 'a5bc7ae3f908d835582c250f206e86ca', 'assets/img/users/1614178719_losmi.jpg', 'user picture', 1),
(3, '2021-01-22 11:04:48', '2021-03-20 14:01:44', 'Boris', 'Dmitrovic', 'boris@gmail.com', 'a5bc7ae3f908d835582c250f206e86ca', 'assets/img/users/1616252504_about.jpg', 'user picture', 2),
(11, '2021-01-22 11:04:48', NULL, 'Zarko', 'Zarkovic', 'zarec@gmail.com', '17f9dab22de67dfbe66d164cc3eb01b5', '', '', 1),
(12, '2021-01-22 11:04:48', '2021-01-25 13:03:09', 'Milos', 'Ivkovic', 'milos123123@gmail.com', '312fd2f3cabafc9417c35fd00efdaa5d', '', '', 2),
(19, '2021-01-22 11:04:48', NULL, 'Milica', 'Milosevic', 'milica@gmail.com', '504938a121efec5f4fbdbcc64ca5736e', '', '', 2),
(23, '2021-01-26 14:34:56', NULL, 'Milutin', 'Milosevic', 'mico@gmail.com', '4297f44b13955235245b2497399d7a93', '', '', 2),
(26, '2021-02-24 13:24:02', NULL, 'Marko', 'Markovic', 'markenzi@gmail.com', '26c7c9089e23c14396410bbc6675dbdf', NULL, 'user picture', 2),
(27, '2021-03-10 13:16:37', '2021-03-10 12:17:19', 'Ime', 'Prezime', 'email@gmail.com', '312fd2f3cabafc9417c35fd00efdaa5d', 'assets/img/users/1615382239_aaaa.jpg', 'user picture', 2),
(28, '2021-03-10 15:11:56', '2021-03-20 15:09:08', 'Markic', 'Markovic', 'markoni@gmail.com', '052f4e416cb4b1085b98a359db9d1e9b', 'assets/img/users/1616256548_probizza.png', 'user picture', 2),
(29, '2021-03-20 20:50:05', NULL, 'Milinko', 'Milivojevic', 'milinko@gmail.com', '9f6c322a1b36cb464c75e8870c7e26ac', NULL, 'user picture', 2),
(30, '2021-03-20 20:54:44', '2021-03-20 19:55:20', 'Darko', 'Lazovic', 'darko@gmail.com', 'f17da145ac23b8f202da6b77b2e51828', 'assets/img/users/1616273684_aaaa.jpg', 'user picture', 2);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `created_at`, `modified_at`, `link`) VALUES
(1, '2021-03-22 11:25:48', '2021-03-22 10:49:52', 'https://www.youtube.com/watch?v=GlrxcuEDyF8');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int(255) UNSIGNED NOT NULL,
  `visited_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_menu` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `visited_at`, `ip`, `id_menu`) VALUES
(1, '2021-01-04 09:44:28', '::1', 6),
(2, '2021-01-04 09:44:49', '::1', 6),
(3, '2021-01-04 09:44:56', '::1', 4),
(4, '2021-01-04 09:48:36', '::1', 6),
(5, '2021-01-04 09:49:06', '::1', 6),
(6, '2021-01-04 09:57:31', '::1', 6),
(7, '2021-01-04 09:58:01', '::1', 6),
(8, '2021-01-04 09:58:25', '::1', 6),
(9, '2021-01-04 09:59:32', '::1', 6),
(10, '2021-01-04 09:59:47', '::1', 5),
(11, '2021-01-04 09:59:47', '::1', 3),
(12, '2021-01-04 09:59:52', '::1', 3),
(13, '2021-01-04 09:59:57', '::1', 5),
(14, '2021-01-04 10:52:18', '::1', 1),
(15, '2021-01-04 10:52:24', '::1', 5),
(16, '2021-01-04 10:52:31', '::1', 9),
(17, '2021-01-04 10:52:38', '::1', 4),
(18, '2021-01-08 12:09:36', '::1', 5),
(19, '2021-01-08 12:09:42', '::1', 5),
(20, '2021-01-08 12:09:44', '::1', 5),
(21, '2021-01-12 08:37:43', '::1', 1),
(22, '2021-01-12 08:39:00', '::1', 8),
(23, '2021-01-12 08:42:34', '::1', 8),
(24, '2021-01-12 08:43:04', '::1', 8),
(25, '2021-01-12 08:47:50', '::1', 8),
(26, '2021-01-12 08:51:01', '::1', 8),
(27, '2021-01-12 10:59:41', '::1', 5),
(28, '2021-01-12 10:59:48', '::1', 1),
(29, '2021-01-12 10:59:55', '::1', 2),
(30, '2021-01-12 11:09:07', '::1', 2),
(31, '2021-01-12 11:23:11', '::1', 2),
(32, '2021-01-12 11:24:34', '::1', 2),
(33, '2021-01-12 11:24:55', '::1', 2),
(34, '2021-01-12 11:26:28', '::1', 2),
(35, '2021-01-12 11:27:05', '::1', 2),
(36, '2021-01-12 11:27:25', '::1', 2),
(37, '2021-01-12 11:28:06', '::1', 2),
(38, '2021-01-12 11:28:15', '::1', 2),
(39, '2021-01-12 11:28:43', '::1', 2),
(40, '2021-01-12 11:28:47', '::1', 2),
(41, '2021-01-12 11:30:58', '::1', 2),
(42, '2021-01-12 11:31:00', '::1', 2),
(43, '2021-01-12 11:31:08', '::1', 2),
(44, '2021-01-12 11:31:42', '::1', 2),
(45, '2021-01-12 11:32:13', '::1', 2),
(46, '2021-01-12 11:32:35', '::1', 2),
(47, '2021-01-12 11:34:18', '::1', 2),
(48, '2021-01-12 11:34:56', '::1', 2),
(49, '2021-01-12 11:37:24', '::1', 2),
(50, '2021-01-12 11:38:11', '::1', 2),
(51, '2021-01-12 11:38:25', '::1', 2),
(52, '2021-01-12 11:42:32', '::1', 2),
(53, '2021-01-12 11:42:54', '::1', 2),
(54, '2021-01-12 11:43:12', '::1', 2),
(55, '2021-01-12 11:43:22', '::1', 2),
(56, '2021-01-12 11:43:40', '::1', 2),
(57, '2021-01-12 11:43:59', '::1', 2),
(58, '2021-01-12 11:44:11', '::1', 2),
(59, '2021-01-12 11:44:24', '::1', 2),
(60, '2021-01-12 11:44:33', '::1', 2),
(61, '2021-01-12 11:44:46', '::1', 2),
(62, '2021-01-12 11:45:03', '::1', 2),
(63, '2021-01-12 11:45:15', '::1', 2),
(64, '2021-01-12 11:45:31', '::1', 2),
(65, '2021-01-12 11:46:15', '::1', 2),
(66, '2021-01-12 11:46:30', '::1', 2),
(67, '2021-01-12 11:47:01', '::1', 2),
(68, '2021-01-12 11:47:33', '::1', 2),
(69, '2021-01-12 11:47:44', '::1', 2),
(70, '2021-01-12 11:48:51', '::1', 2),
(71, '2021-01-12 11:48:59', '::1', 2),
(72, '2021-01-12 11:49:07', '::1', 2),
(73, '2021-01-12 11:49:13', '::1', 2),
(74, '2021-01-12 11:49:37', '::1', 2),
(75, '2021-01-12 11:50:10', '::1', 2),
(76, '2021-01-12 11:51:54', '::1', 2),
(77, '2021-01-12 11:52:13', '::1', 2),
(78, '2021-01-12 11:52:30', '::1', 2),
(79, '2021-01-12 11:52:54', '::1', 2),
(80, '2021-01-12 11:53:22', '::1', 2),
(81, '2021-01-12 11:53:47', '::1', 2),
(82, '2021-01-12 11:54:20', '::1', 2),
(83, '2021-01-12 11:54:32', '::1', 2),
(84, '2021-01-12 11:54:39', '::1', 2),
(85, '2021-01-12 11:55:00', '::1', 2),
(86, '2021-01-12 11:55:22', '::1', 2),
(87, '2021-01-12 11:55:53', '::1', 2),
(88, '2021-01-12 11:56:06', '::1', 2),
(89, '2021-01-12 11:56:37', '::1', 2),
(90, '2021-01-12 11:56:52', '::1', 2),
(91, '2021-01-12 11:57:04', '::1', 2),
(92, '2021-01-12 11:57:13', '::1', 2),
(93, '2021-01-12 11:58:13', '::1', 5),
(94, '2021-01-12 11:58:14', '::1', 3),
(95, '2021-01-12 11:58:17', '::1', 7),
(96, '2021-01-12 11:58:55', '::1', 1),
(97, '2021-01-12 11:58:56', '::1', 9),
(98, '2021-01-12 11:58:57', '::1', 6),
(99, '2021-01-12 11:58:59', '::1', 2),
(100, '2021-01-12 11:59:00', '::1', 8),
(101, '2021-01-12 11:59:43', '::1', 5),
(102, '2021-01-12 12:00:33', '::1', 5),
(103, '2021-01-12 12:00:47', '::1', 5),
(104, '2021-01-12 12:01:03', '::1', 5),
(105, '2021-01-12 12:01:11', '::1', 5),
(106, '2021-01-12 12:01:51', '::1', 5),
(107, '2021-01-12 12:02:18', '::1', 5),
(108, '2021-01-12 12:02:27', '::1', 5),
(109, '2021-01-12 12:03:06', '::1', 5),
(110, '2021-01-12 12:09:23', '::1', 5),
(111, '2021-01-12 12:09:49', '::1', 5),
(112, '2021-01-12 12:10:45', '::1', 5),
(113, '2021-01-12 12:11:18', '::1', 5),
(114, '2021-01-12 12:13:23', '::1', 5),
(115, '2021-01-12 12:14:37', '::1', 5),
(116, '2021-01-12 12:14:51', '::1', 5),
(117, '2021-01-12 12:15:33', '::1', 5),
(118, '2021-01-12 12:15:46', '::1', 5),
(119, '2021-01-12 12:15:58', '::1', 5),
(120, '2021-01-12 12:16:39', '::1', 5),
(121, '2021-01-12 12:16:46', '::1', 5),
(122, '2021-01-12 12:16:54', '::1', 5),
(123, '2021-01-12 12:17:01', '::1', 5),
(124, '2021-01-12 12:19:10', '::1', 5),
(125, '2021-01-12 12:19:30', '::1', 5),
(126, '2021-01-12 12:20:33', '::1', 5),
(127, '2021-01-12 12:21:10', '::1', 5),
(128, '2021-01-12 12:21:30', '::1', 5),
(129, '2021-01-12 12:21:43', '::1', 5),
(130, '2021-01-12 12:22:03', '::1', 5),
(131, '2021-01-12 12:22:16', '::1', 5),
(132, '2021-01-12 12:22:45', '::1', 5),
(133, '2021-01-12 12:23:07', '::1', 5),
(134, '2021-01-12 12:23:30', '::1', 5),
(135, '2021-01-12 12:24:35', '::1', 5),
(136, '2021-01-12 12:25:01', '::1', 5),
(137, '2021-01-12 12:25:13', '::1', 5),
(138, '2021-01-12 12:25:38', '::1', 5),
(139, '2021-01-12 12:26:15', '::1', 5),
(140, '2021-01-12 12:26:36', '::1', 5),
(141, '2021-01-12 12:44:14', '::1', 5),
(142, '2021-01-12 12:44:41', '::1', 5),
(143, '2021-01-12 12:45:24', '::1', 5),
(144, '2021-01-12 12:45:35', '::1', 12222),
(145, '2021-01-12 12:47:00', '::1', 12222),
(146, '2021-01-12 12:47:20', '::1', 12222),
(147, '2021-01-12 12:47:57', '::1', 12222),
(148, '2021-01-12 12:48:09', '::1', 12222),
(149, '2021-01-12 12:48:18', '::1', 6),
(150, '2021-01-12 13:01:02', '::1', 6),
(151, '2021-01-13 13:35:49', '::1', 1),
(152, '2021-01-13 13:55:15', '::1', 1),
(153, '2021-01-13 13:59:39', '::1', 1),
(154, '2021-01-13 14:00:21', '::1', 1),
(155, '2021-01-13 14:00:53', '::1', 1),
(156, '2021-01-13 14:38:46', '::1', 1),
(157, '2021-01-14 10:36:38', '::1', 1),
(158, '2021-01-16 10:25:10', '::1', 1),
(159, '2021-01-16 16:37:58', '::1', 6),
(160, '2021-01-17 14:56:46', '::1', 1),
(161, '2021-01-19 15:49:44', '::1', 9),
(162, '2021-01-22 15:37:17', '::1', 8),
(163, '2021-01-22 15:40:34', '::1', 8),
(164, '2021-01-22 15:41:55', '::1', 8),
(165, '2021-01-22 15:43:03', '::1', 8),
(166, '2021-01-22 15:43:19', '::1', 8),
(167, '2021-01-22 15:44:13', '::1', 8),
(168, '2021-01-22 15:45:16', '::1', 8),
(169, '2021-01-22 15:45:47', '::1', 9),
(170, '2021-01-25 18:42:15', '::1', 16),
(171, '2021-01-26 13:59:16', '::1', 9),
(172, '2021-01-26 13:59:29', '::1', 9),
(173, '2021-01-26 15:40:06', '::1', 5),
(174, '2021-01-31 18:37:45', '::1', 6),
(175, '2021-01-31 18:41:04', '::1', 6),
(176, '2021-01-31 18:41:17', '::1', 6),
(177, '2021-01-31 18:41:43', '::1', 6),
(178, '2021-01-31 18:41:50', '::1', 6),
(179, '2021-01-31 18:42:53', '::1', 6),
(180, '2021-01-31 18:43:31', '::1', 9),
(181, '2021-01-31 18:45:26', '::1', 9),
(182, '2021-01-31 18:45:53', '::1', 142),
(183, '2021-01-31 18:46:24', '::1', 142),
(184, '2021-01-31 18:46:34', '::1', 9),
(185, '2021-01-31 18:46:46', '::1', 9),
(186, '2021-01-31 18:46:56', '::1', 9),
(187, '2021-01-31 18:47:06', '::1', 9),
(188, '2021-01-31 18:47:18', '::1', 8),
(189, '2021-01-31 18:51:30', '::1', 8),
(190, '2021-01-31 18:51:49', '::1', 8),
(191, '2021-01-31 18:51:55', '::1', 8),
(192, '2021-01-31 18:52:40', '::1', 8),
(193, '2021-01-31 18:53:15', '::1', 8),
(194, '2021-01-31 18:54:10', '::1', 8),
(195, '2021-01-31 18:55:56', '::1', 8),
(196, '2021-01-31 18:56:46', '::1', 8),
(197, '2021-01-31 18:57:03', '::1', 8),
(198, '2021-01-31 19:04:31', '::1', 8),
(199, '2021-01-31 19:08:48', '::1', 8),
(200, '2021-01-31 19:08:55', '::1', 8),
(201, '2021-01-31 19:10:08', '::1', 8),
(202, '2021-01-31 19:10:18', '::1', 8),
(203, '2021-01-31 19:11:33', '::1', 8),
(204, '2021-01-31 19:11:43', '::1', 9),
(205, '2021-01-31 19:14:41', '::1', 9),
(206, '2021-01-31 19:15:43', '::1', 9),
(207, '2021-01-31 19:16:59', '::1', 9),
(208, '2021-01-31 19:19:34', '::1', 9),
(209, '2021-01-31 19:21:20', '::1', 9),
(210, '2021-01-31 19:21:54', '::1', 9),
(211, '2021-01-31 19:21:57', '::1', 9),
(212, '2021-01-31 19:22:10', '::1', 9),
(213, '2021-01-31 19:22:45', '::1', 6),
(214, '2021-01-31 19:23:21', '::1', 6),
(215, '2021-01-31 19:23:28', '::1', 6),
(216, '2021-01-31 19:24:11', '::1', 5),
(217, '2021-01-31 19:24:17', '::1', 5),
(218, '2021-01-31 19:25:44', '::1', 5),
(219, '2021-01-31 19:25:53', '::1', 5),
(220, '2021-01-31 19:26:17', '::1', 5),
(221, '2021-01-31 19:26:37', '::1', 5),
(222, '2021-01-31 19:26:53', '::1', 5),
(223, '2021-01-31 23:00:28', '::1', 5),
(224, '2021-01-31 23:00:54', '::1', 5),
(225, '2021-01-31 23:01:18', '::1', 5),
(226, '2021-01-31 23:02:27', '::1', 5),
(227, '2021-01-31 23:11:01', '::1', 5),
(228, '2021-01-31 23:14:30', '::1', 5),
(229, '2021-01-31 23:15:10', '::1', 5),
(230, '2021-01-31 23:15:33', '::1', 5),
(231, '2021-01-31 23:15:38', '::1', 6),
(232, '2021-01-31 23:15:45', '::1', 9),
(233, '2021-01-31 23:17:47', '::1', 9),
(234, '2021-01-31 23:20:00', '::1', 9),
(235, '2021-01-31 23:20:24', '::1', 1),
(236, '2021-01-31 23:20:55', '::1', 5),
(237, '2021-01-31 23:21:39', '::1', 5),
(238, '2021-01-31 23:22:59', '::1', 5),
(239, '2021-01-31 23:24:30', '::1', 5),
(240, '2021-01-31 23:24:42', '::1', 5),
(241, '2021-01-31 23:24:59', '::1', 5),
(242, '2021-01-31 23:25:05', '::1', 5),
(243, '2021-01-31 23:26:24', '::1', 5),
(244, '2021-01-31 23:26:49', '::1', 5),
(245, '2021-01-31 23:27:04', '::1', 5),
(246, '2021-01-31 23:27:11', '::1', 5),
(247, '2021-01-31 23:27:17', '::1', 5),
(248, '2021-01-31 23:27:34', '::1', 5),
(249, '2021-01-31 23:28:01', '::1', 5),
(250, '2021-01-31 23:28:14', '::1', 5),
(251, '2021-01-31 23:29:22', '::1', 5),
(252, '2021-01-31 23:29:36', '::1', 5),
(253, '2021-01-31 23:30:55', '::1', 5),
(254, '2021-01-31 23:31:32', '::1', 5),
(255, '2021-01-31 23:32:10', '::1', 5),
(256, '2021-01-31 23:32:25', '::1', 5),
(257, '2021-01-31 23:35:07', '::1', 5),
(258, '2021-01-31 23:35:14', '::1', 5),
(259, '2021-01-31 23:35:30', '::1', 5),
(260, '2021-01-31 23:38:35', '::1', 5),
(261, '2021-01-31 23:39:49', '::1', 5),
(262, '2021-01-31 23:40:16', '::1', 5),
(263, '2021-01-31 23:40:43', '::1', 5),
(264, '2021-01-31 23:40:51', '::1', 5),
(265, '2021-01-31 23:41:26', '::1', 5),
(266, '2021-01-31 23:41:37', '::1', 5),
(267, '2021-02-01 14:14:23', '::1', 5),
(268, '2021-02-01 14:14:54', '::1', 5),
(269, '2021-02-01 14:15:38', '::1', 5),
(270, '2021-02-01 14:18:19', '::1', 5),
(271, '2021-02-01 14:19:00', '::1', 5),
(272, '2021-02-01 14:22:19', '::1', 5),
(273, '2021-02-01 14:31:48', '::1', 5),
(274, '2021-02-01 14:35:00', '::1', 5),
(275, '2021-02-01 14:35:50', '::1', 5),
(276, '2021-02-01 14:36:16', '::1', 5),
(277, '2021-02-01 14:36:46', '::1', 5),
(278, '2021-02-01 14:37:02', '::1', 5),
(279, '2021-02-01 14:42:05', '::1', 5),
(280, '2021-02-01 14:42:35', '::1', 5),
(281, '2021-02-01 14:43:39', '::1', 5),
(282, '2021-02-01 14:44:09', '::1', 5),
(283, '2021-02-01 14:44:31', '::1', 5),
(284, '2021-02-01 14:44:44', '::1', 5),
(285, '2021-02-01 14:46:52', '::1', 5),
(286, '2021-02-01 14:47:24', '::1', 5),
(287, '2021-02-01 14:56:02', '::1', 5),
(288, '2021-02-01 14:56:09', '::1', 5),
(289, '2021-02-01 14:57:05', '::1', 5),
(290, '2021-02-01 14:58:14', '::1', 5),
(291, '2021-02-01 14:58:52', '::1', 5),
(292, '2021-02-01 14:59:14', '::1', 5),
(293, '2021-02-01 14:59:21', '::1', 5),
(294, '2021-02-01 15:23:43', '::1', 5),
(295, '2021-02-01 15:24:52', '::1', 4),
(296, '2021-02-01 15:30:59', '::1', 4),
(297, '2021-02-01 15:31:07', '::1', 4),
(298, '2021-02-01 15:31:25', '::1', 4),
(299, '2021-02-01 19:02:28', '::1', 4),
(300, '2021-02-01 19:02:37', '::1', 4),
(301, '2021-02-01 19:07:38', '::1', 4),
(302, '2021-02-01 19:08:42', '::1', 4),
(303, '2021-02-01 19:16:29', '::1', 4),
(304, '2021-02-01 19:17:03', '::1', 4),
(305, '2021-02-01 19:17:25', '::1', 4),
(306, '2021-02-01 19:20:09', '::1', 4),
(307, '2021-02-01 19:21:43', '::1', 4),
(308, '2021-02-01 19:29:51', '::1', 4),
(309, '2021-02-01 19:29:57', '::1', 4),
(310, '2021-02-01 19:30:04', '::1', 4),
(311, '2021-02-01 19:31:22', '::1', 4),
(312, '2021-02-01 19:31:27', '::1', 4),
(313, '2021-02-01 19:34:24', '::1', 4),
(314, '2021-02-01 19:36:46', '::1', 4),
(315, '2021-02-01 19:36:49', '::1', 14),
(316, '2021-02-01 19:39:24', '::1', 14),
(317, '2021-02-01 19:39:29', '::1', 4),
(318, '2021-02-01 19:39:41', '::1', 4),
(319, '2021-02-01 19:41:14', '::1', 4),
(320, '2021-02-01 19:42:58', '::1', 4),
(321, '2021-02-01 19:43:05', '::1', 4),
(322, '2021-02-01 19:43:07', '::1', 14),
(323, '2021-02-01 19:44:26', '::1', 14),
(324, '2021-02-01 19:44:38', '::1', 14),
(325, '2021-02-01 19:44:59', '::1', 4),
(326, '2021-02-01 19:45:20', '::1', 4),
(327, '2021-02-01 19:48:54', '::1', 4),
(328, '2021-02-01 19:48:58', '::1', 4),
(329, '2021-02-01 19:49:48', '::1', 4),
(330, '2021-02-01 19:50:06', '::1', 9),
(331, '2021-02-01 19:50:13', '::1', 1),
(332, '2021-02-01 19:50:16', '::1', 2),
(333, '2021-02-01 19:50:21', '::1', 3),
(334, '2021-02-01 19:50:25', '::1', 4),
(335, '2021-02-01 19:50:30', '::1', 5),
(336, '2021-02-01 19:52:08', '::1', 6),
(337, '2021-02-01 19:52:16', '::1', 5),
(338, '2021-02-01 20:06:20', '::1', 5),
(339, '2021-02-01 20:07:23', '::1', 5),
(340, '2021-02-01 20:08:07', '::1', 5),
(341, '2021-02-01 20:08:16', '::1', 5),
(342, '2021-02-01 20:08:26', '::1', 5),
(343, '2021-02-01 20:08:42', '::1', 2),
(344, '2021-02-01 20:08:57', '::1', 2),
(345, '2021-02-01 20:09:37', '::1', 2),
(346, '2021-02-01 20:09:49', '::1', 6),
(347, '2021-02-01 20:10:00', '::1', 5),
(348, '2021-02-01 20:10:50', '::1', 5),
(349, '2021-02-01 20:11:15', '::1', 5),
(350, '2021-02-01 20:11:24', '::1', 5),
(351, '2021-02-01 20:12:56', '::1', 5),
(352, '2021-02-01 20:13:06', '::1', 5),
(353, '2021-02-01 20:13:59', '::1', 5),
(354, '2021-02-01 20:14:39', '::1', 5),
(355, '2021-02-01 20:14:52', '::1', 5),
(356, '2021-02-01 20:26:17', '::1', 4),
(357, '2021-02-01 20:29:22', '::1', 4),
(358, '2021-02-01 20:29:49', '::1', 5),
(359, '2021-02-01 20:30:23', '::1', 5),
(360, '2021-02-01 20:30:56', '::1', 5),
(361, '2021-02-01 20:32:13', '::1', 5),
(362, '2021-02-01 20:32:25', '::1', 5),
(363, '2021-02-02 11:47:51', '::1', 5),
(364, '2021-02-02 11:53:55', '::1', 5),
(365, '2021-02-02 11:55:24', '::1', 5),
(366, '2021-02-02 17:12:42', '::1', 5),
(367, '2021-02-02 17:13:23', '::1', 5),
(368, '2021-02-02 17:41:04', '::1', 5),
(369, '2021-02-02 17:41:11', '::1', 5),
(370, '2021-02-02 17:45:55', '::1', 5),
(371, '2021-02-02 17:53:53', '::1', 5),
(372, '2021-02-02 17:55:29', '::1', 5),
(373, '2021-02-02 18:02:49', '::1', 5),
(374, '2021-02-02 18:02:59', '::1', 5),
(375, '2021-02-02 18:03:54', '::1', 5),
(376, '2021-02-02 18:06:01', '::1', 5),
(377, '2021-02-02 18:06:47', '::1', 5),
(378, '2021-02-02 18:06:54', '::1', 5),
(379, '2021-02-02 18:27:14', '::1', 5),
(380, '2021-02-02 18:27:24', '::1', 5),
(381, '2021-02-02 18:27:33', '::1', 5),
(382, '2021-02-02 18:29:17', '::1', 6),
(383, '2021-02-02 18:47:50', '::1', 5),
(384, '2021-02-03 14:43:05', '::1', 9),
(385, '2021-02-03 14:44:01', '::1', 5),
(386, '2021-02-03 14:56:09', '::1', 5),
(387, '2021-02-03 14:59:15', '::1', 5),
(388, '2021-02-20 12:59:20', '::1', 5),
(389, '2021-02-20 14:47:50', '::1', 5),
(390, '2021-02-20 14:48:12', '::1', 5),
(391, '2021-02-20 14:48:19', '::1', 5),
(392, '2021-02-24 14:38:25', '::1', 5),
(393, '2021-02-24 14:38:53', '::1', 5),
(394, '2021-02-24 14:48:53', '::1', 9),
(395, '2021-02-24 14:49:01', '::1', 5),
(396, '2021-02-24 14:49:07', '::1', 7),
(397, '2021-02-24 14:49:12', '::1', 7),
(398, '2021-02-24 14:51:24', '::1', 4),
(399, '2021-02-24 14:51:34', '::1', 4),
(400, '2021-02-24 14:51:52', '::1', 5),
(401, '2021-02-24 14:52:05', '::1', 9),
(402, '2021-02-24 14:52:12', '::1', 2),
(403, '2021-02-24 14:52:18', '::1', 8),
(404, '2021-02-24 14:53:10', '::1', 5),
(405, '2021-02-24 14:53:30', '::1', 9),
(406, '2021-02-24 14:54:09', '::1', 5),
(407, '2021-02-24 14:55:35', '::1', 9),
(408, '2021-02-24 14:55:57', '::1', 5),
(409, '2021-03-17 12:33:54', '::1', 5),
(410, '2021-03-17 12:34:57', '::1', 5),
(411, '2021-03-17 12:44:31', '::1', 5),
(412, '2021-03-17 12:45:20', '::1', 5),
(413, '2021-03-17 12:46:04', '::1', 5),
(414, '2021-03-17 12:47:14', '::1', 5),
(415, '2021-03-17 12:48:19', '::1', 5),
(416, '2021-03-17 12:49:30', '::1', 5),
(417, '2021-03-17 12:49:46', '::1', 5),
(418, '2021-03-17 12:50:08', '::1', 5),
(419, '2021-03-17 12:51:50', '::1', 5),
(420, '2021-03-17 12:52:49', '::1', 5),
(421, '2021-03-17 12:54:40', '::1', 5),
(422, '2021-03-17 12:54:51', '::1', 5),
(423, '2021-03-17 12:56:15', '::1', 5),
(424, '2021-03-17 12:56:34', '::1', 5),
(425, '2021-03-17 12:57:01', '::1', 5),
(426, '2021-03-17 12:57:21', '::1', 5),
(427, '2021-03-17 12:59:13', '::1', 5),
(428, '2021-03-17 13:00:14', '::1', 5),
(429, '2021-03-17 13:07:15', '::1', 5),
(430, '2021-03-17 13:12:30', '::1', 5),
(431, '2021-03-17 13:13:50', '::1', 5),
(432, '2021-03-17 13:30:55', '::1', 5),
(433, '2021-03-17 13:35:41', '::1', 5),
(434, '2021-03-17 13:35:43', '::1', 5),
(435, '2021-03-17 13:36:38', '::1', 5),
(436, '2021-03-17 13:36:59', '::1', 5),
(437, '2021-03-17 13:37:22', '::1', 5),
(438, '2021-03-17 13:37:57', '::1', 5),
(439, '2021-03-17 13:39:14', '::1', 5),
(440, '2021-03-17 13:40:56', '::1', 5),
(441, '2021-03-17 13:41:44', '::1', 5),
(442, '2021-03-17 13:42:42', '::1', 5),
(443, '2021-03-17 13:44:21', '::1', 9),
(444, '2021-03-17 13:44:41', '::1', 5),
(445, '2021-03-17 13:45:23', '::1', 5),
(446, '2021-03-17 13:46:02', '::1', 5),
(447, '2021-03-17 13:46:37', '::1', 5),
(448, '2021-03-17 14:01:45', '::1', 5),
(449, '2021-03-17 14:04:13', '::1', 5),
(450, '2021-03-17 14:06:21', '::1', 5),
(451, '2021-03-17 14:09:17', '::1', 5),
(452, '2021-03-17 14:09:57', '::1', 5),
(453, '2021-03-17 14:10:12', '::1', 5),
(454, '2021-03-17 14:10:21', '::1', 5),
(455, '2021-03-17 14:10:29', '::1', 5),
(456, '2021-03-17 14:10:52', '::1', 5),
(457, '2021-03-17 14:11:45', '::1', 5),
(458, '2021-03-17 14:12:31', '::1', 5),
(459, '2021-03-17 14:17:03', '::1', 5),
(460, '2021-03-17 14:17:34', '::1', 5),
(461, '2021-03-17 14:17:55', '::1', 5),
(462, '2021-03-17 14:19:25', '::1', 5),
(463, '2021-03-17 14:19:51', '::1', 5),
(464, '2021-03-17 14:20:41', '::1', 5),
(465, '2021-03-17 14:20:49', '::1', 6),
(466, '2021-03-17 14:20:56', '::1', 1),
(467, '2021-03-17 14:21:00', '::1', 2),
(468, '2021-03-17 14:21:06', '::1', 3),
(469, '2021-03-17 14:37:13', '::1', 5),
(470, '2021-03-17 14:37:32', '::1', 2),
(471, '2021-03-17 14:38:42', '::1', 2),
(472, '2021-03-17 14:44:18', '::1', 2),
(473, '2021-03-17 14:46:37', '::1', 2),
(474, '2021-03-17 14:46:49', '::1', 2),
(475, '2021-03-17 14:48:09', '::1', 2),
(476, '2021-03-17 14:49:33', '::1', 2),
(477, '2021-03-17 15:18:51', '::1', 1),
(478, '2021-03-17 15:19:10', '::1', 2),
(479, '2021-03-17 15:19:59', '::1', 9),
(480, '2021-03-17 15:20:03', '::1', 10),
(481, '2021-03-17 15:20:08', '::1', 2),
(482, '2021-03-17 15:27:00', '::1', 2),
(483, '2021-03-17 15:30:07', '::1', 2),
(484, '2021-03-17 15:30:08', '::1', 2),
(485, '2021-03-17 15:30:09', '::1', 2),
(486, '2021-03-17 15:30:19', '::1', 2),
(487, '2021-03-17 15:32:43', '::1', 2),
(488, '2021-03-17 15:32:52', '::1', 2),
(489, '2021-03-17 15:33:00', '::1', 1),
(490, '2021-03-17 15:33:05', '::1', 2),
(491, '2021-03-17 15:33:10', '::1', 3),
(492, '2021-03-17 15:33:13', '::1', 4),
(493, '2021-03-17 15:33:23', '::1', 5),
(494, '2021-03-17 15:33:37', '::1', 6),
(495, '2021-03-17 15:33:42', '::1', 7),
(496, '2021-03-17 15:33:49', '::1', 8),
(497, '2021-03-17 15:33:53', '::1', 9),
(498, '2021-03-17 15:34:33', '::1', 5),
(499, '2021-03-17 15:35:37', '::1', 5),
(500, '2021-03-17 15:35:44', '::1', 5),
(501, '2021-03-17 15:36:05', '::1', 5),
(502, '2021-03-17 15:37:14', '::1', 5),
(503, '2021-03-17 15:37:36', '::1', 5),
(504, '2021-03-17 15:38:09', '::1', 5),
(505, '2021-03-17 15:38:23', '::1', 5),
(506, '2021-03-17 15:39:09', '::1', 5),
(507, '2021-03-17 15:40:27', '::1', 5),
(508, '2021-03-17 15:40:48', '::1', 5),
(509, '2021-03-17 15:41:02', '::1', 5),
(510, '2021-03-17 15:42:55', '::1', 5),
(511, '2021-03-17 15:43:42', '::1', 5),
(512, '2021-03-17 15:44:22', '::1', 5),
(513, '2021-03-17 15:45:09', '::1', 5),
(514, '2021-03-17 15:45:28', '::1', 5),
(515, '2021-03-17 15:45:50', '::1', 5),
(516, '2021-03-17 15:46:15', '::1', 5),
(517, '2021-03-17 15:46:36', '::1', 5),
(518, '2021-03-17 15:47:16', '::1', 5),
(519, '2021-03-17 15:52:42', '::1', 5),
(520, '2021-03-17 15:53:28', '::1', 6),
(521, '2021-03-17 15:53:31', '::1', 7),
(522, '2021-03-17 15:53:39', '::1', 8),
(523, '2021-03-17 15:53:42', '::1', 9),
(524, '2021-03-17 15:54:10', '::1', 9),
(525, '2021-03-17 15:54:35', '::1', 9),
(526, '2021-03-17 15:54:39', '::1', 5),
(527, '2021-03-17 15:55:56', '::1', 5),
(528, '2021-03-17 15:56:03', '::1', 5),
(529, '2021-03-17 15:58:40', '::1', 5),
(530, '2021-03-17 15:58:47', '::1', 2),
(531, '2021-03-17 15:59:43', '::1', 2),
(532, '2021-03-17 16:00:18', '::1', 2),
(533, '2021-03-17 16:01:45', '::1', 2),
(534, '2021-03-17 16:01:55', '::1', 5),
(535, '2021-03-17 16:03:34', '::1', 5),
(536, '2021-03-17 16:03:53', '::1', 5),
(537, '2021-03-17 16:04:06', '::1', 5),
(538, '2021-03-17 16:06:14', '::1', 5),
(539, '2021-03-17 16:06:30', '::1', 5),
(540, '2021-03-17 16:07:45', '::1', 5),
(541, '2021-03-17 16:08:33', '::1', 5),
(542, '2021-03-17 16:08:41', '::1', 5),
(543, '2021-03-17 16:09:21', '::1', 5),
(544, '2021-03-17 16:10:02', '::1', 5),
(545, '2021-03-17 16:10:22', '::1', 5),
(546, '2021-03-17 16:10:49', '::1', 5),
(547, '2021-03-17 16:10:56', '::1', 5),
(548, '2021-03-17 16:11:02', '::1', 5),
(549, '2021-03-17 16:11:20', '::1', 5),
(550, '2021-03-17 16:11:30', '::1', 5),
(551, '2021-03-17 16:12:06', '::1', 5),
(552, '2021-03-17 16:12:33', '::1', 5),
(553, '2021-03-17 16:12:52', '::1', 5),
(554, '2021-03-17 16:13:07', '::1', 5),
(555, '2021-03-17 16:13:25', '::1', 5),
(556, '2021-03-17 16:14:18', '::1', 5),
(557, '2021-03-17 16:15:03', '::1', 5),
(558, '2021-03-17 16:15:35', '::1', 5),
(559, '2021-03-17 16:43:16', '::1', 5),
(560, '2021-03-17 16:43:31', '::1', 5),
(561, '2021-03-17 16:45:28', '::1', 5),
(562, '2021-03-17 16:45:32', '::1', 7),
(563, '2021-03-17 16:45:34', '::1', 4),
(564, '2021-03-17 16:45:38', '::1', 9),
(565, '2021-03-17 16:45:41', '::1', 3),
(566, '2021-03-17 16:45:50', '::1', 9),
(567, '2021-03-17 16:48:35', '::1', 9),
(568, '2021-03-17 16:48:44', '::1', 2),
(569, '2021-03-17 16:49:02', '::1', 2),
(570, '2021-03-17 16:49:11', '::1', 3),
(571, '2021-03-17 16:49:16', '::1', 4),
(572, '2021-03-17 16:49:27', '::1', 5),
(573, '2021-03-17 16:49:32', '::1', 6),
(574, '2021-03-17 16:49:40', '::1', 7),
(575, '2021-03-17 16:49:47', '::1', 8),
(576, '2021-03-17 16:49:53', '::1', 9),
(577, '2021-03-17 17:00:06', '::1', 9),
(578, '2021-03-17 17:00:07', '::1', 9),
(579, '2021-03-17 17:00:23', '::1', 9),
(580, '2021-03-17 17:01:42', '::1', 9),
(581, '2021-03-17 17:02:24', '::1', 9),
(582, '2021-03-17 17:02:36', '::1', 9),
(583, '2021-03-17 17:02:44', '::1', 9),
(584, '2021-03-17 17:03:22', '::1', 9),
(585, '2021-03-17 17:03:39', '::1', 9),
(586, '2021-03-17 17:03:56', '::1', 8),
(587, '2021-03-17 17:04:03', '::1', 9),
(588, '2021-03-17 17:04:42', '::1', 5),
(589, '2021-03-17 17:04:47', '::1', 6),
(590, '2021-03-17 17:06:21', '::1', 4),
(591, '2021-03-17 17:07:27', '::1', 3),
(592, '2021-03-17 17:07:30', '::1', 4),
(593, '2021-03-17 17:07:56', '::1', 6),
(594, '2021-03-17 17:07:59', '::1', 4),
(595, '2021-03-17 17:08:52', '::1', 4),
(596, '2021-03-17 17:16:14', '::1', 8),
(597, '2021-03-17 17:16:16', '::1', 9),
(598, '2021-03-17 17:16:31', '::1', 9),
(599, '2021-03-17 17:16:51', '::1', 5),
(600, '2021-03-17 17:17:31', '::1', 3),
(601, '2021-03-17 17:17:33', '::1', 4),
(602, '2021-03-17 17:18:23', '::1', 4),
(603, '2021-03-17 17:19:21', '::1', 4),
(604, '2021-03-17 17:20:34', '::1', 4),
(605, '2021-03-17 17:27:23', '::1', 4),
(606, '2021-03-17 17:36:35', '::1', 5),
(607, '2021-03-17 17:36:52', '::1', 5),
(608, '2021-03-17 17:37:51', '::1', 5),
(609, '2021-03-17 17:38:02', '::1', 5),
(610, '2021-03-17 17:38:50', '::1', 5),
(611, '2021-03-17 17:39:02', '::1', 5),
(612, '2021-03-17 17:39:20', '::1', 5),
(613, '2021-03-17 17:40:08', '::1', 5),
(614, '2021-03-17 17:40:21', '::1', 5),
(615, '2021-03-17 17:41:30', '::1', 5),
(616, '2021-03-17 17:41:50', '::1', 5),
(617, '2021-03-19 09:02:23', '::1', 5),
(618, '2021-03-19 12:00:07', '::1', 9),
(619, '2021-03-19 12:00:16', '::1', 9),
(620, '2021-03-19 12:00:34', '::1', 9),
(621, '2021-03-20 20:47:49', '::1', 5),
(622, '2021-03-20 20:47:52', '::1', 5),
(623, '2021-03-20 20:48:23', '::1', 7),
(624, '2021-03-20 20:48:27', '::1', 7),
(625, '2021-03-20 20:48:31', '::1', 7),
(626, '2021-03-20 21:01:53', '::1', 2),
(627, '2021-03-20 21:02:03', '::1', 2),
(628, '2021-03-20 21:02:13', '::1', 2),
(629, '2021-03-20 21:05:18', '::1', 9),
(630, '2021-03-20 21:05:23', '::1', 7),
(631, '2021-03-20 21:05:31', '::1', 8),
(632, '2021-03-20 21:05:32', '::1', 2),
(633, '2021-03-20 21:05:49', '::1', 2),
(634, '2021-03-22 11:51:12', '::1', 5),
(635, '2021-04-10 14:20:11', '::1', 5),
(636, '2021-04-10 14:20:21', '::1', 5),
(637, '2021-04-10 14:45:45', '::1', 5),
(638, '2021-04-10 14:52:37', '::1', 5),
(639, '2021-04-13 07:59:48', '::1', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menutypes`
--
ALTER TABLE `menutypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specials`
--
ALTER TABLE `specials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menutypes`
--
ALTER TABLE `menutypes`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `specials`
--
ALTER TABLE `specials`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=640;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
