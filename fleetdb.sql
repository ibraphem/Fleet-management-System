-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 03:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fleetdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accidents`
--

CREATE TABLE `accidents` (
  `id` int(10) NOT NULL,
  `accident_date` date NOT NULL,
  `time` time NOT NULL,
  `vehicle_user_id` int(10) NOT NULL,
  `vehicle_id` int(10) NOT NULL,
  `details` varchar(700) NOT NULL,
  `description` varchar(250) NOT NULL,
  `repair_cost` decimal(15,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accidents`
--

INSERT INTO `accidents` (`id`, `accident_date`, `time`, `vehicle_user_id`, `vehicle_id`, `details`, `description`, `repair_cost`, `created_at`, `updated_at`) VALUES
(3, '2019-09-01', '15:30:00', 6, 11, 'I was driving  when a Honda city, 7845 came in a rush and hit me from behind. My car was totally smashed and damaged brutally. The Honda city managed to escape from the scene immediately, and I could not hold the driver at that moment.But I managed to take a note of his car number which I have stated above.\r\n\r\nThe accident not only led to physical damage of the car but it has also injured me to a great extent.', 'Broken side mirror\r\nBroken windscreen\r\nStrained breakpad\r\nRuined rear', '8000', '2020-03-05 14:28:46', '2020-03-05 14:28:46'),
(4, '2020-03-13', '12:00:00', 2, 10, 'It is important to get names, address, and phone numbers of everyone involved in the accident. A description of the car and license plate number can also be helpful, but make sure you also get their insurance company and the vehicle identification number of their car', 'There is a complete list of how to collect this information for you in the 5 sections below.', '5000', '2020-03-16 18:16:34', '2020-03-16 18:16:34'),
(5, '2020-01-06', '13:20:00', 5, 18, 'While traveling along Lagos-Ibadan express way along Odonguyan road, suddenly a tree was speeding towards me, I needed to match a break to avoid hitting and subsequently killling the tree. While traveling along Lagos-Ibadan express way along Odonguyan road.', 'The following was observed: - Seven broken mirrors - Six battery defect - broken light - Battered body', '20000', '2020-03-22 18:39:49', '2020-03-22 18:40:11'),
(7, '2020-03-03', '06:07:00', 3, 48, 'While traveling along Lagos-Ibadan express way along Odonguyan road, suddenly a tree was speeding towards me, I needed to match a break to avoid hitting and subsequently killling the tree. While traveling along Lagos-Ibadan express way along Odonguyan road.', 'The following was observed: - Seven broken mirrors - Six battery defect - broken light - Battered body', '4000', '2020-03-22 18:43:26', '2020-03-22 18:43:26'),
(8, '2020-03-17', '08:57:00', 7, 12, 'Considering relations are one to many and you\'ve Listing model class and ListingImage model class for Listings table ListingImage table respectively. Considering relations are one to many and you\'ve Listing model class and ListingImage model class for Listings table ListingImage table respectively.', 'Considering relations are one to many and you\'ve Listing model class and ListingImage model class for Listings table ListingImage table respectively.', '8000', '2020-03-24 13:41:39', '2020-03-24 13:41:39'),
(9, '2020-03-04', '06:45:00', 3, 48, 'Take this example from The Young Student’s Companion: “I have a grey horse and a black horse; take the former, and send the latter to my brother.” Here, the former item in the list is a grey horse, and the latter item is a black horse. By', 'using the terms in this way, the speaker manages to indicate which horse the listener should take and which should be sent to their brother without having to repeat the full description of each horse.', '5000', '2020-03-24 13:45:04', '2020-03-24 13:45:04'),
(10, '2020-03-04', '12:09:00', 3, 48, 'First thing’s first: Former and latter are both terms that denote an item’s place in a two-part sequence. They usually appear in the sentence immediately following the sequence. Former refers back to the first of a set, while latter refers to the last item. An easy way to remember the difference is to recall that both former and first begin with an F, while both latter and last start with an L.', 'An easy way to remember the difference is to recall that both former and first begin with an F, while both latter and last start with an L.', '6000', '2020-03-24 13:47:12', '2020-03-24 13:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(10) NOT NULL,
  `vehicle_user_id` int(10) NOT NULL,
  `vehicle_id` int(10) NOT NULL,
  `assignment_date` date NOT NULL,
  `withdrawal_date` date DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `vehicle_user_id`, `vehicle_id`, `assignment_date`, `withdrawal_date`, `status`, `created_at`, `updated_at`) VALUES
(13, 6, 11, '2017-10-01', NULL, 'active', '2020-03-01 01:10:12', '2020-03-01 11:41:57'),
(14, 3, 9, '2018-04-01', '2020-03-04', 'inactive', '2020-03-01 12:09:12', '2020-03-04 19:58:11'),
(17, 7, 12, '2020-03-03', NULL, 'active', '2020-03-03 21:22:30', '2020-03-03 21:22:30'),
(18, 2, 10, '2020-03-03', NULL, 'active', '2020-03-04 13:44:09', '2020-03-04 13:44:09'),
(20, 3, 48, '2020-03-09', NULL, 'active', '2020-03-22 18:33:53', '2020-03-22 18:33:53'),
(23, 2, 44, '2020-03-06', '2020-03-26', 'inactive', '2020-03-27 00:57:36', '2020-03-27 00:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `logo_path` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `fevicon_path` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `starting_balance` decimal(12,2) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_users`
--

CREATE TABLE `company_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `digital_code` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `precision` tinyint(4) NOT NULL,
  `subunit` int(11) NOT NULL,
  `symbol_first` tinyint(1) NOT NULL,
  `decimal_mark` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `thousands_separator` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `digital_code`, `precision`, `subunit`, `symbol_first`, `decimal_mark`, `thousands_separator`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'UAE Dirham', 'AED', '784', 2, 100, 1, '.', ',', 'د.إ', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(2, 'Afghani', 'AFN', '971', 2, 100, 0, '.', ',', '؋', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(3, 'Lek', 'ALL', '8', 2, 100, 0, '.', ',', 'L', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(4, 'Armenian Dram', 'AMD', '51', 2, 100, 0, '.', ',', 'դր.', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(5, 'Netherlands Antillean Guilder', 'ANG', '532', 2, 100, 1, ',', '.', 'ƒ', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(6, 'Kwanza', 'AOA', '973', 2, 100, 0, '.', ',', 'Kz', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(7, 'Argentine Peso', 'ARS', '32', 2, 100, 1, ',', '.', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(8, 'Australian Dollar', 'AUD', '36', 2, 100, 1, '.', ' ', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(9, 'Aruban Florin', 'AWG', '533', 2, 100, 0, '.', ',', 'ƒ', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(10, 'Azerbaijanian Manat', 'AZN', '944', 2, 100, 1, '.', ',', '₼', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(11, 'Convertible Mark', 'BAM', '977', 2, 100, 1, '.', ',', 'КМ', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(12, 'Barbados Dollar', 'BBD', '52', 2, 100, 0, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(13, 'Taka', 'BDT', '50', 2, 100, 1, '.', ',', '৳', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(14, 'Bulgarian Lev', 'BGN', '975', 2, 100, 0, '.', ',', 'лв', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(15, 'Bahraini Dinar', 'BHD', '48', 3, 1000, 1, '.', ',', 'ب.د', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(16, 'Burundi Franc', 'BIF', '108', 0, 1, 0, '.', ',', 'Fr', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(17, 'Bermudian Dollar', 'BMD', '60', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(18, 'Brunei Dollar', 'BND', '96', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(19, 'Boliviano', 'BOB', '68', 2, 100, 1, '.', ',', 'Bs.', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(20, 'Mvdol', 'BOV', '984', 2, 100, 1, '.', ',', 'Bs.', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(21, 'Brazilian Real', 'BRL', '986', 2, 100, 1, ',', '.', 'R$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(22, 'Bahamian Dollar', 'BSD', '44', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(23, 'Ngultrum', 'BTN', '64', 2, 100, 0, '.', ',', 'Nu.', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(24, 'Pula', 'BWP', '72', 2, 100, 1, '.', ',', 'P', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(25, 'Belarussian Ruble', 'BYN', '974', 0, 1, 0, ',', ' ', 'Br', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(26, 'Belize Dollar', 'BZD', '84', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(27, 'Canadian Dollar', 'CAD', '124', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(28, 'Congolese Franc', 'CDF', '976', 2, 100, 0, '.', ',', 'Fr', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(29, 'Swiss Franc', 'CHF', '756', 2, 100, 1, '.', ',', 'CHF', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(30, 'Unidades de fomento', 'CLF', '990', 0, 1, 1, ',', '.', 'UF', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(31, 'Chilean Peso', 'CLP', '152', 0, 1, 1, ',', '.', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(32, 'Yuan Renminbi', 'CNY', '156', 2, 100, 1, '.', ',', '¥', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(33, 'Colombian Peso', 'COP', '170', 2, 100, 1, ',', '.', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(34, 'Costa Rican Colon', 'CRC', '188', 2, 100, 1, ',', '.', '₡', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(35, 'Peso Convertible', 'CUC', '931', 2, 100, 0, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(36, 'Cuban Peso', 'CUP', '192', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(37, 'Cape Verde Escudo', 'CVE', '132', 2, 100, 0, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(38, 'Czech Koruna', 'CZK', '203', 2, 100, 0, ',', '.', 'Kč', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(39, 'Djibouti Franc', 'DJF', '262', 0, 1, 0, '.', ',', 'Fdj', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(40, 'Danish Krone', 'DKK', '208', 2, 100, 0, ',', '.', 'kr', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(41, 'Dominican Peso', 'DOP', '214', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(42, 'Algerian Dinar', 'DZD', '12', 2, 100, 0, '.', ',', 'د.ج', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(43, 'Egyptian Pound', 'EGP', '818', 2, 100, 1, '.', ',', 'ج.م', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(44, 'Nakfa', 'ERN', '232', 2, 100, 0, '.', ',', 'Nfk', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(45, 'Ethiopian Birr', 'ETB', '230', 2, 100, 0, '.', ',', 'Br', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(46, 'Euro', 'EUR', '978', 2, 100, 1, ',', '.', '€', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(47, 'Fiji Dollar', 'FJD', '242', 2, 100, 0, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(48, 'Falkland Islands Pound', 'FKP', '238', 2, 100, 0, '.', ',', '£', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(49, 'Pound Sterling', 'GBP', '826', 2, 100, 1, '.', ',', '£', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(50, 'Lari', 'GEL', '981', 2, 100, 0, '.', ',', 'ლ', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(51, 'Ghana Cedi', 'GHS', '936', 2, 100, 1, '.', ',', '₵', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(52, 'Gibraltar Pound', 'GIP', '292', 2, 100, 1, '.', ',', '£', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(53, 'Dalasi', 'GMD', '270', 2, 100, 0, '.', ',', 'D', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(54, 'Guinea Franc', 'GNF', '324', 0, 1, 0, '.', ',', 'Fr', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(55, 'Quetzal', 'GTQ', '320', 2, 100, 1, '.', ',', 'Q', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(56, 'Guyana Dollar', 'GYD', '328', 2, 100, 0, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(57, 'Hong Kong Dollar', 'HKD', '344', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(58, 'Lempira', 'HNL', '340', 2, 100, 1, '.', ',', 'L', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(59, 'Croatian Kuna', 'HRK', '191', 2, 100, 1, ',', '.', 'kn', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(60, 'Gourde', 'HTG', '332', 2, 100, 0, '.', ',', 'G', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(61, 'Forint', 'HUF', '348', 2, 100, 0, ',', '.', 'Ft', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(62, 'Rupiah', 'IDR', '360', 2, 100, 1, ',', '.', 'Rp', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(63, 'New Israeli Sheqel', 'ILS', '376', 2, 100, 1, '.', ',', '₪', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(64, 'Indian Rupee', 'INR', '356', 2, 100, 1, '.', ',', '₹', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(65, 'Iraqi Dinar', 'IQD', '368', 3, 1000, 0, '.', ',', 'ع.د', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(66, 'Iranian Rial', 'IRR', '364', 2, 100, 1, '.', ',', '﷼', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(67, 'Iceland Krona', 'ISK', '352', 0, 1, 1, ',', '.', 'kr', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(68, 'Jamaican Dollar', 'JMD', '388', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(69, 'Jordanian Dinar', 'JOD', '400', 3, 100, 1, '.', ',', 'د.ا', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(70, 'Yen', 'JPY', '392', 0, 1, 1, '.', ',', '¥', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(71, 'Kenyan Shilling', 'KES', '404', 2, 100, 1, '.', ',', 'KSh', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(72, 'Som', 'KGS', '417', 2, 100, 0, '.', ',', 'som', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(73, 'Riel', 'KHR', '116', 2, 100, 0, '.', ',', '៛', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(74, 'Comoro Franc', 'KMF', '174', 0, 1, 0, '.', ',', 'Fr', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(75, 'North Korean Won', 'KPW', '408', 2, 100, 0, '.', ',', '₩', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(76, 'Won', 'KRW', '410', 0, 1, 1, '.', ',', '₩', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(77, 'Kuwaiti Dinar', 'KWD', '414', 3, 1000, 1, '.', ',', 'د.ك', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(78, 'Cayman Islands Dollar', 'KYD', '136', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(79, 'Tenge', 'KZT', '398', 2, 100, 0, '.', ',', '〒', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(80, 'Kip', 'LAK', '418', 2, 100, 0, '.', ',', '₭', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(81, 'Lebanese Pound', 'LBP', '422', 2, 100, 1, '.', ',', 'ل.ل', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(82, 'Sri Lanka Rupee', 'LKR', '144', 2, 100, 0, '.', ',', '₨', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(83, 'Liberian Dollar', 'LRD', '430', 2, 100, 0, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(84, 'Loti', 'LSL', '426', 2, 100, 0, '.', ',', 'L', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(85, 'Lithuanian Litas', 'LTL', '440', 2, 100, 0, '.', ',', 'Lt', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(86, 'Latvian Lats', 'LVL', '428', 2, 100, 1, '.', ',', 'Ls', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(87, 'Libyan Dinar', 'LYD', '434', 3, 1000, 0, '.', ',', 'ل.د', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(88, 'Moroccan Dirham', 'MAD', '504', 2, 100, 0, '.', ',', 'د.م.', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(89, 'Moldovan Leu', 'MDL', '498', 2, 100, 0, '.', ',', 'L', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(90, 'Malagasy Ariary', 'MGA', '969', 2, 5, 1, '.', ',', 'Ar', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(91, 'Denar', 'MKD', '807', 2, 100, 0, '.', ',', 'ден', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(92, 'Kyat', 'MMK', '104', 2, 100, 0, '.', ',', 'K', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(93, 'Tugrik', 'MNT', '496', 2, 100, 0, '.', ',', '₮', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(94, 'Pataca', 'MOP', '446', 2, 100, 0, '.', ',', 'P', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(95, 'Ouguiya', 'MRO', '478', 2, 5, 0, '.', ',', 'UM', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(96, 'Mauritius Rupee', 'MUR', '480', 2, 100, 1, '.', ',', '₨', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(97, 'Rufiyaa', 'MVR', '462', 2, 100, 0, '.', ',', 'MVR', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(98, 'Kwacha', 'MWK', '454', 2, 100, 0, '.', ',', 'MK', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(99, 'Mexican Peso', 'MXN', '484', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(100, 'Malaysian Ringgit', 'MYR', '458', 2, 100, 1, '.', ',', 'RM', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(101, 'Mozambique Metical', 'MZN', '943', 2, 100, 1, ',', '.', 'MTn', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(102, 'Namibia Dollar', 'NAD', '516', 2, 100, 0, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(103, 'Naira', 'NGN', '566', 2, 100, 1, '.', ',', '₦', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(104, 'Cordoba Oro', 'NIO', '558', 2, 100, 0, '.', ',', 'C$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(105, 'Norwegian Krone', 'NOK', '578', 2, 100, 0, ',', '.', 'kr', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(106, 'Nepalese Rupee', 'NPR', '524', 2, 100, 1, '.', ',', '₨', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(107, 'New Zealand Dollar', 'NZD', '554', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(108, 'Rial Omani', 'OMR', '512', 3, 1000, 1, '.', ',', 'ر.ع.', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(109, 'Balboa', 'PAB', '590', 2, 100, 0, '.', ',', 'B/.', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(110, 'Nuevo Sol', 'PEN', '604', 2, 100, 1, '.', ',', 'S/.', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(111, 'Kina', 'PGK', '598', 2, 100, 0, '.', ',', 'K', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(112, 'Philippine Peso', 'PHP', '608', 2, 100, 1, '.', ',', '₱', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(113, 'Pakistan Rupee', 'PKR', '586', 2, 100, 1, '.', ',', '₨', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(114, 'Zloty', 'PLN', '985', 2, 100, 0, ',', ' ', 'zł', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(115, 'Guarani', 'PYG', '600', 0, 1, 1, '.', ',', '₲', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(116, 'Qatari Rial', 'QAR', '634', 2, 100, 0, '.', ',', 'ر.ق', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(117, 'New Romanian Leu', 'RON', '946', 2, 100, 1, ',', '.', 'Lei', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(118, 'Serbian Dinar', 'RSD', '941', 2, 100, 1, '.', ',', 'РСД', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(119, 'Russian Ruble', 'RUB', '643', 2, 100, 0, ',', '.', '₽', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(120, 'Rwanda Franc', 'RWF', '646', 0, 1, 0, '.', ',', 'FRw', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(121, 'Saudi Riyal', 'SAR', '682', 2, 100, 1, '.', ',', 'ر.س', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(122, 'Solomon Islands Dollar', 'SBD', '90', 2, 100, 0, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(123, 'Seychelles Rupee', 'SCR', '690', 2, 100, 0, '.', ',', '₨', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(124, 'Sudanese Pound', 'SDG', '938', 2, 100, 1, '.', ',', '£', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(125, 'Swedish Krona', 'SEK', '752', 2, 100, 0, ',', ' ', 'kr', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(126, 'Singapore Dollar', 'SGD', '702', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(127, 'Saint Helena Pound', 'SHP', '654', 2, 100, 0, '.', ',', '£', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(128, 'Leone', 'SLL', '694', 2, 100, 0, '.', ',', 'Le', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(129, 'Somali Shilling', 'SOS', '706', 2, 100, 0, '.', ',', 'Sh', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(130, 'Surinam Dollar', 'SRD', '968', 2, 100, 0, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(131, 'South Sudanese Pound', 'SSP', '728', 2, 100, 0, '.', ',', '£', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(132, 'Dobra', 'STD', '678', 2, 100, 0, '.', ',', 'Db', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(133, 'El Salvador Colon', 'SVC', '222', 2, 100, 1, '.', ',', '₡', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(134, 'Syrian Pound', 'SYP', '760', 2, 100, 0, '.', ',', '£S', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(135, 'Lilangeni', 'SZL', '748', 2, 100, 1, '.', ',', 'E', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(136, 'Baht', 'THB', '764', 2, 100, 1, '.', ',', '฿', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(137, 'Somoni', 'TJS', '972', 2, 100, 0, '.', ',', 'ЅМ', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(138, 'Turkmenistan New Manat', 'TMT', '934', 2, 100, 0, '.', ',', 'T', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(139, 'Tunisian Dinar', 'TND', '788', 3, 1000, 0, '.', ',', 'د.ت', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(140, 'Pa’anga', 'TOP', '776', 2, 100, 1, '.', ',', 'T$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(141, 'Turkish Lira', 'TRY', '949', 2, 100, 1, ',', '.', '₺', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(142, 'Trinidad and Tobago Dollar', 'TTD', '780', 2, 100, 0, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(143, 'New Taiwan Dollar', 'TWD', '901', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(144, 'Tanzanian Shilling', 'TZS', '834', 2, 100, 1, '.', ',', 'Sh', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(145, 'Hryvnia', 'UAH', '980', 2, 100, 0, '.', ',', '₴', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(146, 'Uganda Shilling', 'UGX', '800', 0, 1, 0, '.', ',', 'USh', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(147, 'US Dollar', 'USD', '840', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(148, 'Peso Uruguayo', 'UYU', '858', 2, 100, 1, ',', '.', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(149, 'Uzbekistan Sum', 'UZS', '860', 2, 100, 0, '.', ',', NULL, '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(150, 'Bolivar', 'VEF', '937', 2, 100, 1, ',', '.', 'Bs F', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(151, 'Dong', 'VND', '704', 0, 1, 1, ',', '.', '₫', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(152, 'Vatu', 'VUV', '548', 0, 1, 1, '.', ',', 'Vt', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(153, 'Tala', 'WST', '882', 2, 100, 0, '.', ',', 'T', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(154, 'CFA Franc BEAC', 'XAF', '950', 0, 1, 0, '.', ',', 'Fr', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(155, 'Silver', 'XAG', '961', 0, 1, 0, '.', ',', 'oz t', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(156, 'Gold', 'XAU', '959', 0, 1, 0, '.', ',', 'oz t', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(157, 'East Caribbean Dollar', 'XCD', '951', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(158, 'SDR (Special Drawing Right)', 'XDR', '960', 0, 1, 0, '.', ',', 'SDR', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(159, 'CFA Franc BCEAO', 'XOF', '952', 0, 1, 0, '.', ',', 'Fr', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(160, 'CFP Franc', 'XPF', '953', 0, 1, 0, '.', ',', 'Fr', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(161, 'Yemeni Rial', 'YER', '886', 2, 100, 0, '.', ',', '﷼', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(162, 'Rand', 'ZAR', '710', 2, 100, 1, '.', ',', 'R', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(163, 'Zambian Kwacha', 'ZMW', '967', 2, 100, 0, '.', ',', 'ZK', '2020-02-05 11:39:22', '2020-02-05 11:39:22'),
(164, 'Zimbabwe Dollar', 'ZWL', '932', 2, 100, 1, '.', ',', '$', '2020-02-05 11:39:22', '2020-02-05 11:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `acquired_date` date NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `cost` decimal(20,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vehicle_id` int(10) NOT NULL,
  `vehicle_user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `acquired_date`, `expiry_date`, `cost`, `created_at`, `updated_at`, `vehicle_id`, `vehicle_user_id`) VALUES
(1, 'Vehicle Licence', '2018-12-30', '2020-05-15', '15000', '2020-03-06 12:41:40', '2020-03-06 12:41:40', 12, 7),
(3, 'Insurance Certificate', '2016-11-27', '2020-10-07', '15000', '2020-03-22 19:06:27', '2020-03-22 19:06:27', 10, 2),
(4, 'Road safety Licence', '2019-03-31', '2020-09-04', '10000', '2020-03-22 19:08:03', '2020-03-22 19:08:03', 48, 3),
(5, 'Road Worthiness License', '2019-01-27', '2021-03-09', '5000', '2020-03-22 19:09:19', '2020-03-22 19:09:19', 10, 2),
(6, 'Vehicle Licence', '2019-07-28', '2021-04-30', '9000', '2020-03-22 19:10:21', '2020-03-22 19:10:21', 10, 2),
(7, 'Vehicle greatness', '2020-03-03', '2021-03-10', '10000', '2020-03-26 22:23:57', '2020-03-26 22:23:57', 48, 3),
(8, 'Key Goodness', '2020-03-19', '2020-04-04', '2000', '2020-03-26 22:24:44', '2020-03-26 22:24:44', 12, 7),
(9, 'Consultancy', '2020-03-14', '2020-03-05', '500', '2020-03-26 22:29:37', '2020-03-26 22:29:37', 48, 3);

-- --------------------------------------------------------

--
-- Table structure for table `flexible_pos_settings`
--

CREATE TABLE `flexible_pos_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `logo_path` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `fevicon_path` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `owner_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_address` text COLLATE utf8_unicode_ci NOT NULL,
  `starting_balance` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `flexible_pos_settings`
--

INSERT INTO `flexible_pos_settings` (`id`, `language`, `logo_path`, `fevicon_path`, `company_name`, `owner_name`, `company_address`, `starting_balance`, `created_at`, `updated_at`, `currency_code`) VALUES
(1, 'en', 'images/company/2020-03-28-07-08-20-60aeaee6ccd74e7cd5f717fe36681af3a9ae2d0e.png', 'images/company/2020-03-28-05-06-08-b3515fd7d0f0f38fcd06379d467e0211ba40a2b0.png', 'LANDOVER - OVERLAND', NULL, 'Ikeja', '0.00', '2020-02-10 12:35:40', '2020-03-28 18:08:20', 'NGN');

-- --------------------------------------------------------

--
-- Table structure for table `fuels`
--

CREATE TABLE `fuels` (
  `id` int(10) NOT NULL,
  `fuel_date` date NOT NULL,
  `vehicle_user_id` int(10) NOT NULL,
  `vehicle_id` int(10) NOT NULL,
  `fuel_cost` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuels`
--

INSERT INTO `fuels` (`id`, `fuel_date`, `vehicle_user_id`, `vehicle_id`, `fuel_cost`, `created_at`, `updated_at`) VALUES
(1, '2020-03-05', 7, 12, '6000', '2020-03-05 16:49:57', '2020-03-05 16:50:23'),
(2, '2020-03-05', 2, 10, '1500', '2020-03-26 22:25:18', '2020-03-26 22:25:18'),
(3, '2020-03-12', 2, 10, '2000', '2020-03-26 22:25:36', '2020-03-26 22:25:36'),
(4, '2020-03-17', 3, 48, '4000', '2020-03-26 22:25:58', '2020-03-26 22:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `maintenances`
--

CREATE TABLE `maintenances` (
  `id` int(10) NOT NULL,
  `maintenance_routine_id` int(10) NOT NULL,
  `vehicle_id` int(10) NOT NULL,
  `maintenance_cost` decimal(20,2) DEFAULT 0.00,
  `maintenance_date` date DEFAULT NULL,
  `schedule_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remark` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenances`
--

INSERT INTO `maintenances` (`id`, `maintenance_routine_id`, `vehicle_id`, `maintenance_cost`, `maintenance_date`, `schedule_date`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(1, 3, 10, '5000.00', '2020-03-23', '2020-03-22', 1, 'Successful', '2020-02-20 16:32:45', '2020-03-22 14:45:43'),
(2, 1, 9, '9000.00', '2020-02-05', '0000-00-00', 1, 'successful', '2020-02-20 16:33:41', '2020-02-20 16:33:41'),
(3, 1, 10, '4500.00', '2020-02-02', '0000-00-00', 1, 'Successful', '2020-02-20 16:34:09', '2020-02-20 16:34:09'),
(5, 1, 11, '18000.00', '2020-01-27', '0000-00-00', 1, 'Successful', '2020-02-20 19:17:06', '2020-03-01 01:02:36'),
(6, 2, 10, '2000.00', '2020-02-04', '0000-00-00', 1, 'Very Cool', '2020-02-20 20:05:42', '2020-02-21 20:23:22'),
(8, 3, 9, '2000.00', '2020-02-04', '0000-00-00', 1, 'Succesful', '2020-02-20 20:26:32', '2020-02-20 20:35:50'),
(9, 3, 9, '37000.00', '2020-01-26', '0000-00-00', 1, 'Successful', '2020-02-21 20:24:55', '2020-02-21 20:24:55'),
(10, 4, 12, '5000.00', '2020-03-04', '0000-00-00', 1, 'Successful', '2020-03-04 20:20:44', '2020-03-04 20:20:44'),
(11, 5, 12, '20000.00', '2019-10-28', '0000-00-00', 1, 'Successful', '2020-03-04 20:22:15', '2020-03-04 20:22:15'),
(12, 6, 48, '7000.00', '2020-03-23', '2020-03-22', 1, 'Successful', '2020-03-17 22:37:06', '2020-03-22 17:51:01'),
(13, 4, 10, '11000.00', '2020-03-19', NULL, 1, 'Successful', '2020-03-21 19:19:05', '2020-03-21 19:19:46'),
(14, 1, 48, '8000.00', '2020-03-22', '2020-03-23', 1, 'Successful', '2020-03-22 10:47:36', '2020-03-22 18:01:08'),
(16, 5, 12, '0.00', NULL, '2020-03-23', 0, NULL, '2020-03-22 10:51:55', '2020-03-22 14:00:36'),
(17, 2, 11, '10000.00', '2020-03-22', '2020-03-24', 1, 'Successful', '2020-03-22 10:53:53', '2020-03-22 17:59:54'),
(19, 5, 10, '10000.00', '2020-03-22', '2020-03-23', 1, 'Successful', '2020-03-22 13:51:10', '2020-03-22 14:46:14'),
(20, 4, 11, '8000.00', '2020-03-07', '2020-03-25', 1, 'Successful', '2020-03-22 13:51:51', '2020-03-22 19:24:54'),
(21, 1, 21, '0.00', NULL, '2020-03-24', 0, NULL, '2020-03-22 19:25:21', '2020-03-22 19:25:21'),
(22, 1, 48, '0.00', NULL, '2020-03-24', 0, NULL, '2020-03-22 19:25:36', '2020-03-22 19:25:36'),
(23, 1, 12, '5000.00', '2020-03-12', '2020-03-23', 1, 'Successful', '2020-03-22 19:25:54', '2020-03-27 00:40:41'),
(25, 7, 12, '0.00', NULL, '2020-03-30', 0, NULL, '2020-03-28 14:02:01', '2020-03-28 14:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_routines`
--

CREATE TABLE `maintenance_routines` (
  `id` int(10) NOT NULL,
  `title` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance_routines`
--

INSERT INTO `maintenance_routines` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Oil filter Change', 'oil-filter-change', 'Changing of Oil filter through the process of saponification so that the vehicle in question will work well.', '2020-02-19 14:07:04', '2020-02-19 14:07:04'),
(2, 'AC repair', 'ac-repair', 'AC leakage unit was replaced', '2020-02-20 15:24:30', '2020-02-20 15:24:30'),
(3, 'Breakpad replacement', 'breakpad-replacement', 'Breakpad replacementBreakpad replacementBreakpad replacementBreakpad replacement', '2020-02-20 16:43:39', '2020-02-20 16:43:39'),
(4, 'Fuel pump', 'fuel-pump', NULL, '2020-03-03 21:13:25', '2020-03-03 21:13:25'),
(5, 'Panel beating', 'panel-beating', NULL, '2020-03-04 20:21:38', '2020-03-04 20:21:38'),
(6, 'Rim replacement', 'rim-replacement', NULL, '2020-03-17 22:36:33', '2020-03-17 22:36:33'),
(7, 'Breaklight replacement', 'breaklight-replacement', NULL, '2020-03-28 14:01:36', '2020-03-28 14:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_05_29_074713_create_customers_table', 1),
(4, '2015_05_30_015027_create_items_table', 1),
(5, '2015_05_30_073533_create_suppliers_table', 1),
(6, '2015_06_02_010425_create_inventories_table', 1),
(7, '2015_06_03_013557_create_receivings_table', 1),
(8, '2015_06_03_134547_create_receiving_temps_table', 1),
(9, '2015_06_06_083156_create_sales_table', 1),
(10, '2015_06_06_083159_create_sale_temps_table', 1),
(11, '2015_06_07_042753_create_receiving_items_table', 1),
(12, '2015_06_08_050821_create_sale_items_table', 1),
(13, '2015_06_12_214916_create_item_kit_item_temps_table', 1),
(14, '2015_06_12_224226_create_item_kit_items_table', 1),
(15, '2015_06_16_163101_create_tutapos_settings_table', 1),
(16, '2017_05_22_165812_add_discount_tax_grandtotal_to_sales', 1),
(17, '2018_03_23_021440_create_sale_payments_table', 1),
(18, '2018_03_25_141132_create_flexible_pos_settings_table', 1),
(19, '2018_03_27_011844_create_customer_payments_table', 1),
(20, '2018_03_27_022156_create_expense_categories_table', 1),
(21, '2018_03_27_022640_create_expenses_table', 1),
(22, '2018_04_03_213954_create_daily_reports_table', 1),
(23, '2018_04_07_213837_create_receiving_payments_table', 1),
(24, '2018_04_07_214803_create_supplier_payments_table', 1),
(25, '2018_04_21_212541_create_accounts_table', 1),
(26, '2018_05_01_111157_create_transactions_table', 1),
(27, '2019_02_07_160619_create_companies_table', 1),
(28, '2019_02_07_170531_create_company_users_table', 1),
(29, '2019_02_08_131317_create_permission_tables', 1),
(30, '2019_08_03_115934_create_currencies_table', 1),
(31, '2019_08_03_121015_add_currency_id_to_settings', 1),
(32, '2019_09_18_235801_add_stock_limit_to_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `milleages`
--

CREATE TABLE `milleages` (
  `id` int(10) NOT NULL,
  `Date` date NOT NULL,
  `vehicle_user_id` int(10) NOT NULL,
  `vehicle_id` int(10) NOT NULL,
  `starting_milleage` int(10) NOT NULL,
  `ending_milleage` int(10) NOT NULL,
  `milleage_used` int(10) NOT NULL,
  `milleage_ceiling` int(10) NOT NULL,
  `excess_milleage` int(10) NOT NULL,
  `excess_milleage_charge` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `milleages`
--

INSERT INTO `milleages` (`id`, `Date`, `vehicle_user_id`, `vehicle_id`, `starting_milleage`, `ending_milleage`, `milleage_used`, `milleage_ceiling`, `excess_milleage`, `excess_milleage_charge`, `created_at`, `updated_at`) VALUES
(18, '2020-03-01', 2, 10, 87000, 84000, 3000, 2000, 1000, 100000, '2020-03-26 19:27:31', '2020-03-26 19:27:31'),
(19, '2020-02-03', 2, 10, 57000, 56500, 500, 1600, 0, 0, '2020-03-26 21:33:57', '2020-03-26 21:33:57'),
(20, '2020-01-05', 2, 10, 78000, 75000, 3000, 1600, 1400, 140000, '2020-03-26 21:38:54', '2020-03-26 21:38:54'),
(21, '2020-03-10', 7, 12, 90000, 87000, 3000, 2000, 1000, 100000, '2020-03-26 21:43:27', '2020-03-26 21:43:27'),
(22, '2020-03-20', 3, 48, 75000, 73500, 1500, 1600, 0, 0, '2020-03-26 21:44:11', '2020-03-26 21:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `id` int(7) NOT NULL,
  `cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`id`, `cost`, `created_at`, `updated_at`) VALUES
(1, 100, '2020-03-19 15:29:03', '2020-03-19 21:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `label`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'List Items', 'items.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(2, 'Create Items', 'items.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(3, 'Store Items', 'items.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(4, 'View Items', 'items.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(5, 'Delete Items', 'items.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(6, 'Update Items', 'items.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(7, 'Edit Items', 'items.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(8, 'List Inventory', 'inventory.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(9, 'Create Inventory', 'inventory.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(10, 'Store Inventory', 'inventory.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(11, 'View Inventory', 'inventory.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(12, 'Delete Inventory', 'inventory.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(13, 'Update Inventory', 'inventory.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(14, 'Edit Inventory', 'inventory.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(15, 'List Customers', 'customers.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(16, 'Create Customers', 'customers.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(17, 'Store Customers', 'customers.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(18, 'View Customers', 'customers.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(19, 'Delete Customers', 'customers.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(20, 'Update Customers', 'customers.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(21, 'Edit Customers', 'customers.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(22, 'List Suppliers', 'suppliers.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(23, 'Create Suppliers', 'suppliers.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(24, 'Store Suppliers', 'suppliers.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(25, 'View Suppliers', 'suppliers.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(26, 'Delete Suppliers', 'suppliers.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(27, 'Update Suppliers', 'suppliers.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(28, 'Edit Suppliers', 'suppliers.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(29, 'List Receivings', 'receivings.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(30, 'Create Receivings', 'receivings.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(31, 'Store Receivings', 'receivings.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(32, 'View Receivings', 'receivings.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(33, 'Delete Receivings', 'receivings.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(34, 'Update Receivings', 'receivings.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(35, 'Edit Receivings', 'receivings.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(36, 'List Transactions', 'transactions.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(37, 'Create Transactions', 'transactions.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(38, 'Store Transactions', 'transactions.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(39, 'View Transactions', 'transactions.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(40, 'Delete Transactions', 'transactions.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(41, 'Update Transactions', 'transactions.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(42, 'Edit Transactions', 'transactions.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(43, 'List Supplierpayments', 'supplierpayments.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(44, 'Create Supplierpayments', 'supplierpayments.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(45, 'Store Supplierpayments', 'supplierpayments.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(46, 'View Supplierpayments', 'supplierpayments.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(47, 'Delete Supplierpayments', 'supplierpayments.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(48, 'Update Supplierpayments', 'supplierpayments.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(49, 'Edit Supplierpayments', 'supplierpayments.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(50, 'List Sales', 'sales.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(51, 'Create Sales', 'sales.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(52, 'Store Sales', 'sales.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(53, 'View Sales', 'sales.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(54, 'Delete Sales', 'sales.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(55, 'Update Sales', 'sales.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(56, 'Edit Sales', 'sale.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(57, 'List Salepayments', 'salepayments.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(58, 'Create Salepayments', 'salepayments.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(59, 'Store Salepayments', 'salepayments.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(60, 'View Salepayments', 'salepayments.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(61, 'Delete Salepayments', 'salepayments.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(62, 'Update Salepayments', 'salepayments.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(63, 'Edit Salepayments', 'salepayments.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(64, 'List Dailyreport', 'dailyreport.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(65, 'Create Dailyreport', 'dailyreport.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(66, 'Store Dailyreport', 'dailyreport.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(67, 'View Dailyreport', 'dailyreport.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(68, 'Delete Dailyreport', 'dailyreport.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(69, 'Update Dailyreport', 'dailyreport.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(70, 'Edit Dailyreport', 'dailyreport.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(71, 'List Receivingpayments', 'receivingpayments.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(72, 'Create Receivingpayments', 'receivingpayments.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(73, 'Store Receivingpayments', 'receivingpayments.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(74, 'View Receivingpayments', 'receivingpayments.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(75, 'Delete Receivingpayments', 'receivingpayments.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(76, 'Update Receivingpayments', 'receivingpayments.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(77, 'Edit Receivingpayments', 'receivingpayments.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(78, 'List Expense', 'expense.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(79, 'Create Expense', 'expense.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(80, 'Store Expense', 'expense.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(81, 'View Expense', 'expense.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(82, 'Delete Expense', 'expense.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(83, 'Update Expense', 'expense.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(84, 'Edit Expense', 'expense.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(85, 'List Expensecategory', 'expensecategory.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(86, 'Create Expensecategory', 'expensecategory.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(87, 'Store Expensecategory', 'expensecategory.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(88, 'View Expensecategory', 'expensecategory.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(89, 'Delete Expensecategory', 'expensecategory.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(90, 'Update Expensecategory', 'expensecategory.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(91, 'Edit Expensecategory', 'expensecategory.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(92, 'List Customerpayments', 'customerpayments.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(93, 'Create Customerpayments', 'customerpayments.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(94, 'Store Customerpayments', 'customerpayments.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(95, 'View Customerpayments', 'customerpayments.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(96, 'Delete Customerpayments', 'customerpayments.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(97, 'Update Customerpayments', 'customerpayments.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(98, 'Edit Customerpayments', 'customerpayments.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(99, 'List Accounts', 'accounts.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(100, 'Create Accounts', 'accounts.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(101, 'Store Accounts', 'accounts.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(102, 'View Accounts', 'accounts.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(103, 'Delete Accounts', 'accounts.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(104, 'Update Accounts', 'accounts.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(105, 'Edit Accounts', 'accounts.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(106, 'List Employees', 'employees.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(107, 'Create Employees', 'employees.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(108, 'Store Employees', 'employees.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(109, 'View Employees', 'employees.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(110, 'Delete Employees', 'employees.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(111, 'Update Employees', 'employees.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(112, 'Edit Employees', 'employees.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(113, 'List Settings', 'flexiblepossetting.index', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(114, 'Create Settings', 'flexiblepossetting.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(115, 'Store Settings', 'flexiblepossetting.store', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(116, 'View Settings', 'flexiblepossetting.show', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(117, 'Delete Settings', 'flexiblepossetting.destroy', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(118, 'Update Settings', 'flexiblepossetting.update', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(119, 'Edit Settings', 'flexiblepossetting.edit', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(120, 'List Permissions', 'permissions.list', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(121, 'Assaign Roles', 'assaign.roles', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(122, 'Create Roles', 'employeerole.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(123, 'Create Permission Role', 'permissionrole.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(124, 'Create Permissions', 'permissions.create', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(125, 'Getsales Reports', 'reports.getsales', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(126, 'CreateDaily Reports', 'reports.createdaily', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(127, 'CreatePast Reports', 'reports.createpast', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(128, 'GetDaily Reports', 'reports.getdaily', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(129, 'CreateCustom Items', 'items.customcreate', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(130, 'PrintSales Reports', 'reports.printsales', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(131, 'GetAllSale Reports', 'reports.getsalereport', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(132, 'Sale-receive-chart Dashboard', 'Sale-receive-chart Dashboard', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03'),
(133, 'Latest-income-expense Dashboard', 'Latest-income-expense Dashboard', 'web', '2019-10-01 18:51:03', '2019-10-01 18:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `receiving_payments`
--

CREATE TABLE `receiving_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment` decimal(12,2) NOT NULL,
  `payment_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dues` decimal(12,2) NOT NULL,
  `receiving_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `receiving_payments`
--

INSERT INTO `receiving_payments` (`id`, `payment`, `payment_type`, `comments`, `dues`, `receiving_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '20000.00', 'Cash', NULL, '0.00', 1, 1, '2020-02-05 11:46:31', '2020-02-05 11:46:31'),
(2, '1000.00', 'Cash', NULL, '0.00', 2, 1, '2020-02-10 12:24:21', '2020-02-10 12:24:21'),
(3, '15000.00', 'Debit Card', NULL, '5000.00', 3, 1, '2020-02-10 12:41:37', '2020-02-10 12:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2019-10-01 18:51:04', '2019-10-01 18:51:04'),
(2, 'fleet-manager', 'web', '2020-03-28 16:11:26', '2020-03-28 16:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(76, 1),
(76, 2),
(77, 1),
(77, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1),
(81, 2),
(82, 1),
(82, 2),
(83, 1),
(83, 2),
(84, 1),
(84, 2),
(85, 1),
(85, 2),
(86, 1),
(86, 2),
(87, 1),
(87, 2),
(88, 1),
(88, 2),
(89, 1),
(89, 2),
(90, 1),
(90, 2),
(91, 1),
(91, 2),
(92, 1),
(92, 2),
(93, 1),
(93, 2),
(94, 1),
(94, 2),
(95, 1),
(95, 2),
(96, 1),
(96, 2),
(97, 1),
(97, 2),
(98, 1),
(98, 2),
(99, 1),
(99, 2),
(100, 1),
(100, 2),
(101, 1),
(101, 2),
(102, 1),
(102, 2),
(103, 1),
(103, 2),
(104, 1),
(104, 2),
(105, 1),
(105, 2),
(106, 1),
(106, 2),
(107, 1),
(107, 2),
(108, 1),
(108, 2),
(109, 1),
(109, 2),
(110, 1),
(110, 2),
(111, 1),
(111, 2),
(112, 1),
(112, 2),
(113, 1),
(113, 2),
(114, 1),
(114, 2),
(115, 1),
(115, 2),
(116, 1),
(116, 2),
(117, 1),
(117, 2),
(118, 1),
(118, 2),
(119, 1),
(119, 2),
(120, 1),
(120, 2),
(121, 1),
(121, 2),
(122, 1),
(122, 2),
(123, 1),
(123, 2),
(124, 1),
(124, 2),
(125, 1),
(125, 2),
(126, 1),
(126, 2),
(127, 1),
(127, 2),
(128, 1),
(128, 2),
(129, 1),
(129, 2),
(130, 1),
(130, 2),
(131, 1),
(131, 2),
(132, 1),
(132, 2),
(133, 1),
(133, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_type` tinyint(4) NOT NULL,
  `transaction_with` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutapos_settings`
--

CREATE TABLE `tutapos_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `languange` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@flexibleit.net', '$2y$10$WKji2YJ2wQNWf6zJ5vdFQe34.al7rXr.NrhrKLqmw8pbFKbZuxy16', '8g4jGUf0B1y4v7eLZLHH8sBTMmRVWU5oW77prjMnNFYpYum3fuQChQ8O1wzR', '2019-10-01 18:51:02', '2019-10-01 18:51:02'),
(2, 'Fleet Manager', 'sss@landover.local', '$2y$10$FG9VwkGIqGuA7ZlgHeXKpuaKU4QjkiAusDjBx/EcirUMqUswI5ya6', 'BZWkhWOK40btud0GRbFZc0WUg4xZSxILm4ofuOUc8GWCGtrL22Buy6PBSF3F', '2020-03-28 16:12:49', '2020-03-28 16:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) NOT NULL,
  `reg_number` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(191) NOT NULL,
  `model_year` year(4) DEFAULT NULL,
  `acquired_date` date DEFAULT NULL,
  `life` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_price` decimal(11,2) DEFAULT NULL,
  `company` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `condition` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no-foto.png',
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `reg_number`, `manufacturer`, `model`, `model_year`, `acquired_date`, `life`, `purchase_price`, `company`, `location`, `condition`, `avatar`, `type`, `created_at`, `updated_at`) VALUES
(9, 'BC 567210', 'Mercedez', 'Benz', 2016, '2019-07-09', '5', '7675450.00', '', 'Overland', 'Serviceable', 'images/vehicles/2020-02-19-12-57-19-5f68a6181c1f14b1871de90c9dffa3e43e02c97d.jpg', 1, '2020-02-18 23:57:19', '2020-03-27 00:38:43'),
(10, 'DM 652109', 'Toyota', 'Corrolla', 2019, '2020-02-20', '5', '25900740.00', 'Landover', 'Aero Road', 'Serviceable', 'images/vehicles/2020-02-19-12-58-54-71ee66f95211c4bdc12c2fe9eab0b2e2b00398f9.jpg', 1, '2020-02-18 23:58:54', '2020-03-06 15:13:46'),
(11, 'DZ 6754129', 'Toyota', 'Camry', 2019, '2020-02-06', '5', '10987345.00', '', 'Landover', 'New', 'images/vehicles/2020-02-22-06-44-15-f4f5307064e5f44ec7cb8e681939415e621e4f22.jpg', 1, '2020-02-22 17:44:15', '2020-02-22 17:44:15'),
(12, 'HK 087313', 'Honda', 'Pilot', 2016, '2016-01-08', '5', '8789000.00', '', 'Overland', 'New', 'no-foto.png', 1, '2020-03-03 18:46:25', '2020-03-03 18:46:25'),
(14, 'LS 562901', 'Toyota', 'Highlander', 2017, '2017-10-29', '5', '10243219.00', 'Overland', 'Abv Station', 'Serviceable', 'images/vehicles/2020-03-06-03-55-13-8c67dad6fdbbcc2d9dfe7bccffc7413088bd22b5.jpg', 1, '2020-03-06 14:55:13', '2020-03-06 15:03:51'),
(15, 'Jk 890765', 'Honda', 'Odyssey', 2016, '2019-06-30', '5', '7860000.00', 'Overland', 'LOS Station', 'Serviceable', 'images/vehicles/2020-03-06-03-59-05-11d6beeb3df1176d7a4aeca6f30191f8abcb4803.jpg', 1, '2020-03-06 14:59:05', '2020-03-06 14:59:05'),
(16, 'TC 765410', 'Kia', 'Sedona', 2016, '2019-09-30', '5', '8900000.00', 'Overland', 'Jalingo', 'New', 'images/vehicles/2020-03-06-04-02-04-8133942aa64f4ea4ddd46b9d0eae2a1ecc67f36f.jpg', 1, '2020-03-06 15:02:04', '2020-03-06 15:02:04'),
(18, 'HM 761098', 'Benz', 'C300', 2016, '2020-03-01', '5', '15980000.00', 'Landover', 'Lagos', 'Serviceable', 'images/vehicles/2020-03-06-04-06-59-b721e7d8a0a913c756977b56284f96f66fafb57f.jpg', 1, '2020-03-06 15:06:59', '2020-03-06 15:06:59'),
(21, 'RJ 784209', 'Kia', 'Sportage', 2016, '2020-03-01', '5', '9675500.00', 'Landover', 'Lagos', 'New', 'images/vehicles/2020-03-06-04-17-12-ebbfc5dc8472e0b8217660a888d5e6b7bfcb6798.jpg', 1, '2020-03-06 15:17:12', '2020-03-06 15:17:12'),
(44, 'TY 675432', 'Honda', 'CRV', 2018, '2020-03-01', '5', '12567800.00', 'Overland', 'Jalingo', 'Serviceable', 'images/vehicles/2020-03-06-06-04-32-d336e4d072dc795da0745009b8be6dc10c2423ed.jpg', 1, '2020-03-06 17:04:32', '2020-03-06 17:04:32'),
(48, 'BA 8976', 'Honda', 'Sorento', 2018, '2020-03-03', '5', '12567800.00', NULL, 'Overland', 'New', 'images/vehicles/2020-03-06-06-21-08-e77878062cb89a4da2f0002fcd135b1186760152.jpg', 1, '2020-03-06 17:21:08', '2020-03-27 21:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `vehicleusers`
--

CREATE TABLE `vehicleusers` (
  `id` int(10) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `department` varchar(191) NOT NULL,
  `designation` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `city` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicleusers`
--

INSERT INTO `vehicleusers` (`id`, `full_name`, `department`, `designation`, `phone`, `email`, `address`, `city`, `country`, `type`, `created_at`, `updated_at`) VALUES
(2, 'Nsofor Uche', 'System Administration', 'Head, IT', '09087542451', 'nsofor@gmail.com', 'Egbeda', 'Lagos', 'Nigeria', 1, '2020-02-21 13:55:05', '2020-02-21 22:47:20'),
(3, 'Olorundare Taiye', 'Networking', 'IT Supervisor', '08065789012', 'ibraphem@gmail.com', 'Meiran', 'Lagos', 'Nigeria', 1, '2020-02-21 13:57:28', '2020-02-21 22:46:55'),
(5, 'Ayorinde Ajibaye', 'Data Security', 'IT Officer', '09076432516', 'ayoor@yahoo.com', 'Oshogbo', 'Osun', 'Nigeria', 1, '2020-02-21 14:00:48', '2020-02-21 22:44:14'),
(6, 'Shalom Uzoma', 'Hardware Mgt', 'IT guy', '08045672109', 'shab@yahoo.com', 'Oke-Mesi', 'Ibadan', 'Nigeria', 1, '2020-02-21 14:02:07', '2020-03-04 13:43:21'),
(7, 'Jerry Gentle', 'Information Mgt', 'IT Corper', '07053435256', 'jerryco@gmail.com', 'Asaba', 'Delta', 'Nigeria', 1, '2020-02-21 14:03:25', '2020-02-21 22:49:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accidents`
--
ALTER TABLE `accidents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `vehicle_user_id` (`vehicle_user_id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`vehicle_user_id`,`vehicle_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `vehicle_user_id` (`vehicle_user_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `company_users`
--
ALTER TABLE `company_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`vehicle_id`,`vehicle_user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `vehicle_user_id` (`vehicle_user_id`);

--
-- Indexes for table `flexible_pos_settings`
--
ALTER TABLE `flexible_pos_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuels`
--
ALTER TABLE `fuels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`vehicle_id`,`vehicle_user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `vehicle_user_id` (`vehicle_user_id`);

--
-- Indexes for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`maintenance_routine_id`,`vehicle_id`),
  ADD KEY `maintenance_routine_id` (`maintenance_routine_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `maintenance_routines`
--
ALTER TABLE `maintenance_routines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milleages`
--
ALTER TABLE `milleages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`vehicle_id`,`vehicle_user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `vehicle_user_id` (`vehicle_user_id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiving_payments`
--
ALTER TABLE `receiving_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiving_payments_receiving_id_foreign` (`receiving_id`),
  ADD KEY `receiving_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_account_id_foreign` (`account_id`);

--
-- Indexes for table `tutapos_settings`
--
ALTER TABLE `tutapos_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `vehicleusers`
--
ALTER TABLE `vehicleusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accidents`
--
ALTER TABLE `accidents`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_users`
--
ALTER TABLE `company_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `flexible_pos_settings`
--
ALTER TABLE `flexible_pos_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fuels`
--
ALTER TABLE `fuels`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `maintenance_routines`
--
ALTER TABLE `maintenance_routines`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `milleages`
--
ALTER TABLE `milleages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `receiving_payments`
--
ALTER TABLE `receiving_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutapos_settings`
--
ALTER TABLE `tutapos_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `vehicleusers`
--
ALTER TABLE `vehicleusers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accidents`
--
ALTER TABLE `accidents`
  ADD CONSTRAINT `accidents_ibfk_1` FOREIGN KEY (`vehicle_user_id`) REFERENCES `vehicleusers` (`id`),
  ADD CONSTRAINT `accidents_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`),
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`vehicle_user_id`) REFERENCES `vehicleusers` (`id`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`),
  ADD CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`vehicle_user_id`) REFERENCES `vehicleusers` (`id`);

--
-- Constraints for table `fuels`
--
ALTER TABLE `fuels`
  ADD CONSTRAINT `fuels_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`),
  ADD CONSTRAINT `fuels_ibfk_2` FOREIGN KEY (`vehicle_user_id`) REFERENCES `vehicleusers` (`id`);

--
-- Constraints for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD CONSTRAINT `maintenances_ibfk_1` FOREIGN KEY (`maintenance_routine_id`) REFERENCES `maintenance_routines` (`id`),
  ADD CONSTRAINT `maintenances_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);

--
-- Constraints for table `milleages`
--
ALTER TABLE `milleages`
  ADD CONSTRAINT `milleages_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`),
  ADD CONSTRAINT `milleages_ibfk_2` FOREIGN KEY (`vehicle_user_id`) REFERENCES `vehicleusers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
