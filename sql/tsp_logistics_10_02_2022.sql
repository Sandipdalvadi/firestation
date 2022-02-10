-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 08:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsp_logistics`
--

-- --------------------------------------------------------

--
-- Table structure for table `condemnation_masters`
--

CREATE TABLE `condemnation_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `years` int(11) NOT NULL,
  `kms_reading` int(11) NOT NULL,
  `mcondition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `condemnation_masters`
--

INSERT INTO `condemnation_masters` (`id`, `years`, `kms_reading`, `mcondition`, `status`, `created_at`, `updated_at`) VALUES
(1, 15, 300000, 'AND', 1, '2021-02-11 23:30:16', '2021-02-11 23:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `description_by_vehicle_type_masters`
--

CREATE TABLE `description_by_vehicle_type_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `description_by_vehicle_type_masters`
--

INSERT INTO `description_by_vehicle_type_masters` (`id`, `name`, `image1`, `image2`, `image3`, `image4`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AWT vehicle', '', '', '', '', 1, NULL, NULL),
(2, 'Advance Water Tender', '', '', '', '', 1, NULL, NULL),
(3, 'Multipurpose Tender', '', '', '', '', 1, NULL, NULL),
(4, 'Water Bowser', '', '', '', '', 1, NULL, NULL),
(5, 'Bronto Sky Lift', '', '', '', '', 1, NULL, NULL),
(6, 'Water cum Foam Tender', '', '', '', '', 1, NULL, NULL),
(8, 'Multi – Pressure; Capacity (lpm) -1800, 2250, 3200, 4000 Pressure (kg/cm2)', 'uploads/61aca051dd5fb-1.jpg', 'uploads/61aca051de015-2.jpg', 'uploads/61aca051de9a1-3.jpg', 'uploads/61aca051df5e2-4.jpg', 1, NULL, NULL),
(9, 'Large Fire Fighting Vehicle with 3500 lit water tank and 450 lit foam tank', '', '', '', '', 1, NULL, NULL),
(10, 'Swift dzire', '', '', '', '', 1, NULL, NULL),
(11, 'Innova Crysta', '', '', '', '', 1, NULL, NULL),
(12, 'Bolero', '', '', '', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions_masters`
--

CREATE TABLE `divisions_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisions_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions_masters`
--

INSERT INTO `divisions_masters` (`id`, `divisions_name`, `unit_code`, `status`, `created_at`, `updated_at`) VALUES
(32, 'Peddapalli ', NULL, 1, NULL, NULL),
(31, 'Mancherial', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_rank_masters`
--

CREATE TABLE `employee_rank_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_rank_masters`
--

INSERT INTO `employee_rank_masters` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Director General', 1, NULL, NULL),
(6, 'Director', 1, NULL, NULL),
(7, 'Addl.Director', 1, NULL, NULL),
(8, 'RFO', 1, NULL, NULL),
(9, 'DFO', 1, NULL, NULL),
(10, 'ADFO', 1, NULL, NULL),
(11, 'SFO', 1, NULL, NULL),
(12, 'Firemen', 1, NULL, NULL),
(13, 'Leading Firemen', 1, NULL, NULL),
(14, 'Driver OPerator', 1, NULL, NULL),
(15, 'HG', 1, NULL, NULL),
(17, 'Deputy Director', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_role_masters`
--

CREATE TABLE `employee_role_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_role_masters`
--

INSERT INTO `employee_role_masters` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fireman', 1, NULL, NULL),
(2, 'Officer', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fsname_masters`
--

CREATE TABLE `fsname_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fs_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fsname_masters`
--

INSERT INTO `fsname_masters` (`id`, `fs_name`, `unit_code`, `updated_by`, `unit_id`, `status`, `created_at`, `updated_at`) VALUES
(308, 'Mulugu', NULL, '', 14, 1, NULL, NULL),
(307, 'Bhupalapalli ', NULL, '', 14, 1, NULL, NULL),
(306, 'Godavarikhani', NULL, '', 13, 1, NULL, NULL),
(305, 'Manthani', NULL, '', 13, 1, NULL, NULL),
(304, 'Pedapalli', NULL, '', 13, 1, NULL, NULL),
(303, 'Kagaznagar', NULL, '', 12, 1, NULL, NULL),
(302, 'Asifabad', NULL, '', 12, 1, NULL, NULL),
(301, 'Chennur', NULL, '', 11, 1, NULL, NULL),
(300, 'Bellampally', NULL, '', 11, 1, NULL, NULL),
(299, 'Jannaram', NULL, '', 11, 1, NULL, NULL),
(298, 'Mancherial', NULL, '', 11, 1, NULL, NULL),
(297, 'test test 1', NULL, '', 11, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_quota_allotments`
--

CREATE TABLE `fuel_quota_allotments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `allotments_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'regular,additional,enhance',
  `vehicle_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` bigint(20) DEFAULT NULL,
  `quota_liters` int(11) NOT NULL,
  `additional_quota_liters` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allotment_user_id` int(11) NOT NULL COMMENT 'login user id',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active, 2=older',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `local_stock_fs`
--

CREATE TABLE `local_stock_fs` (
  `id` bigint(20) NOT NULL,
  `fs_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unservcableqty` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `local_stock_fs`
--

INSERT INTO `local_stock_fs` (`id`, `fs_id`, `item_id`, `qty`, `unservcableqty`, `created_at`) VALUES
(1, 300, 152, 34, 4, '2022-02-07 12:33:38'),
(2, 308, 148, 5, 2, '2022-02-08 09:00:52'),
(3, 308, 136, 5, 3, '2022-02-08 09:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `local_stock_unit`
--

CREATE TABLE `local_stock_unit` (
  `id` bigint(20) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unservcableqty` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `local_stock_unit`
--

INSERT INTO `local_stock_unit` (`id`, `unit_id`, `item_id`, `qty`, `unservcableqty`, `created_at`) VALUES
(1, 12, 152, 12, 2, '2022-02-07 12:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `logistics_category_masters`
--

CREATE TABLE `logistics_category_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logistics_category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistics_category_masters`
--

INSERT INTO `logistics_category_masters` (`id`, `logistics_category`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fire Fighting Equipment', 1, NULL, NULL),
(2, 'Rescue Tools and Equipment', 1, NULL, NULL),
(3, 'PPE', 1, NULL, NULL),
(4, 'Other Spl Tool and Equipment', 1, NULL, NULL),
(10, 'vehicles', 1, NULL, NULL),
(12, 'computers', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logistics_kits_eligibilty_masters`
--

CREATE TABLE `logistics_kits_eligibilty_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_per_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logistics_kits_for_local_masters`
--

CREATE TABLE `logistics_kits_for_local_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logistics_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logistics_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logistics_kits_masters`
--

CREATE TABLE `logistics_kits_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logistics_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_aspernorms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logistics_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistics_kits_masters`
--

INSERT INTO `logistics_kits_masters` (`id`, `logistics_name`, `available_aspernorms`, `logistics_category`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(151, 'Rain Coat', '', '2', 'uploads/61ac9fc379b8a-', NULL, 1, '2021-12-05 11:17:23', '2021-12-05 11:17:23'),
(152, 'Truss type 35 feet aluminum extension ladder', '', '2', 'uploads/61ac9fcb21e0f-', NULL, 1, '2021-12-05 11:17:31', '2021-12-05 11:17:31'),
(150, 'Rubber Gloves', '', '2', 'uploads/61ac9faee3f53-', NULL, 1, '2021-12-05 11:17:02', '2021-12-05 11:17:02'),
(149, 'Hose ramp ', '', '2', 'uploads/61ac9f9808eb9-', NULL, 1, '2021-12-05 11:16:40', '2021-12-05 11:16:40'),
(148, 'Hose ramp ', '', '2', 'uploads/61ac9f8840813-', NULL, 1, '2021-12-05 11:16:24', '2021-12-05 11:16:24'),
(147, 'Hose Bandage', '', '2', 'uploads/61ac9f7d198ef-', NULL, 1, '2021-12-05 11:16:13', '2021-12-05 11:16:13'),
(145, 'Hose straps', '', '2', 'uploads/61ac9f62f40a8-', NULL, 1, '2021-12-05 11:15:46', '2021-12-05 11:15:46'),
(146, 'Hose ramp', '', '2', 'uploads/61ac9f754e755-', NULL, 1, '2021-12-05 11:16:05', '2021-12-05 11:16:05'),
(144, 'Cotton Blanket', '', '2', 'uploads/61ac9f5919e43-', NULL, 1, '2021-12-05 11:15:37', '2021-12-05 11:15:37'),
(143, 'Wool blankets', '', '2', 'uploads/61ac9f515d508-', NULL, 1, '2021-12-05 11:15:29', '2021-12-05 11:15:29'),
(142, 'Suction Wrenches for 100 mm suction hose couplings', '', '2', 'uploads/61ac9f406d097-', NULL, 1, '2021-12-05 11:15:12', '2021-12-05 11:15:12'),
(141, 'Basket Strainer', '', '2', 'uploads/61ac9f3931bc6-', NULL, 1, '2021-12-05 11:15:05', '2021-12-05 11:15:05'),
(139, 'fire beater', '', '2', 'uploads/61ac9f1d9c90d-', NULL, 1, '2021-12-05 11:14:37', '2021-12-05 11:14:37'),
(140, 'Suction strainter for 100 mm Suction hose - Brass', '', '2', 'uploads/61ac9f2ca0381-', NULL, 1, '2021-12-05 11:14:52', '2021-12-05 11:14:52'),
(138, 'Fire hook', '', '2', 'uploads/61ac9f12bba16-', NULL, 1, '2021-12-05 11:14:26', '2021-12-05 11:14:26'),
(137, 'Ceiling hook', '', '2', 'uploads/61ac9f0a77777-', NULL, 1, '2021-12-05 11:14:18', '2021-12-05 11:14:18'),
(136, 'Torch light', '', '2', 'uploads/61ac9eff4261c-', NULL, 1, '2021-12-05 11:14:07', '2021-12-05 11:14:07'),
(135, 'Insulated axe 2500 Volts', '', '2', 'uploads/61ac9ef2ac6ee-', NULL, 1, '2021-12-05 11:13:54', '2021-12-05 11:13:54'),
(134, 'Pathala Kanta', '', '2', 'uploads/61ac9eeb63c76-', NULL, 1, '2021-12-05 11:13:47', '2021-12-05 11:13:47'),
(133, 'Helmets', '', '2', 'uploads/61ac9ee2bef30-', NULL, 1, '2021-12-05 11:13:38', '2021-12-05 11:13:38'),
(132, 'Gum Boots (Full Length)', '', '2', 'uploads/61ac9eda6cedf-', NULL, 1, '2021-12-05 11:13:30', '2021-12-05 11:13:30'),
(131, 'Diamond chain saw', '', '2', 'uploads/61ac9ed03232a-', NULL, 1, '2021-12-05 11:13:20', '2021-12-05 11:13:20'),
(130, 'Sledge Hammer', '', '2', 'uploads/61ac9ec842271-', NULL, 1, '2021-12-05 11:13:12', '2021-12-05 11:13:12'),
(129, 'Shovel', '', '2', 'uploads/61ac9ebc1addf-', NULL, 1, '2021-12-05 11:13:00', '2021-12-05 11:13:00'),
(128, 'Life Buoy', '', '2', 'uploads/61ac9eb4f2235-', NULL, 1, '2021-12-05 11:12:52', '2021-12-05 11:12:52'),
(127, 'Life Jacket', '', '2', 'uploads/61ac9eab76133-', NULL, 1, '2021-12-05 11:12:43', '2021-12-05 11:12:43'),
(126, 'Exhaust Blower', '', '2', 'uploads/61ac9d9fca240-', NULL, 1, '2021-12-05 11:08:15', '2021-12-05 11:08:15'),
(125, 'Circular chain saw', '', '2', 'uploads/61ac9d972c028-', NULL, 1, '2021-12-05 11:08:07', '2021-12-05 11:08:07'),
(124, 'Bold Cutter 30 Inch', '', '2', 'uploads/61ac9d8a0eff3-', NULL, 1, '2021-12-05 11:07:54', '2021-12-05 11:07:54'),
(123, 'Spreader', '', '2', 'uploads/61ac9d7facd4a-', NULL, 1, '2021-12-05 11:07:43', '2021-12-05 11:07:43'),
(122, 'Pneumatic air bag (26 Tonnes)', '', '2', 'uploads/61ac9d763ddf4-', NULL, 1, '2021-12-05 11:07:34', '2021-12-05 11:07:34'),
(121, 'Hydraulic Jack 15 ton', '', '2', 'uploads/61ac9d580fa6a-', NULL, 1, '2021-12-05 11:07:04', '2021-12-05 11:07:04'),
(120, 'Crow Bar 6 Feet', '', '2', 'uploads/61ac9d4924b76-', NULL, 1, '2021-12-05 11:06:49', '2021-12-05 11:06:49'),
(119, 'Spade', '', '2', 'uploads/61ac9d405d170-', NULL, 1, '2021-12-05 11:06:40', '2021-12-05 11:06:40'),
(118, 'Axe large', '', '2', 'uploads/61ac9d34e825b-', NULL, 1, '2021-12-05 11:06:28', '2021-12-05 11:06:28'),
(117, 'Axe large', '', '2', 'uploads/61ac9d261451b-', NULL, 1, '2021-12-05 11:06:14', '2021-12-05 11:06:14'),
(116, 'Nylon Ropes 50 MM 30 Mtrs long', '', '2', 'uploads/61ac9d1977566-', NULL, 1, '2021-12-05 11:06:01', '2021-12-05 11:06:01'),
(115, 'Cotton Rope 50 MM 15 Mtrs long', '', '2', 'uploads/61ac9d0ec3a8b-', NULL, 1, '2021-12-05 11:05:50', '2021-12-05 11:05:50'),
(114, 'Manila rope 50 mm 40 Mtrs long', '', '2', 'uploads/61ac9d0708ff5-', NULL, 1, '2021-12-05 11:05:43', '2021-12-05 11:05:43'),
(113, 'Fireman Axe', '', '1', 'uploads/61ac9cf00afd8-', NULL, 1, '2021-12-05 11:05:20', '2021-12-05 11:05:20'),
(112, 'Nozzle Spanner', '', '1', 'uploads/61ac9ce8de13e-', NULL, 1, '2021-12-05 11:05:12', '2021-12-05 11:05:12'),
(111, 'Fire proximity suits', '', '1', 'uploads/61ac9ce0d0a27-', NULL, 1, '2021-12-05 11:05:04', '2021-12-05 11:05:04'),
(110, 'B.A set along with spare cylinder', '', '1', 'uploads/61ac9ccd88a02-', NULL, 1, '2021-12-05 11:04:45', '2021-12-05 11:04:45'),
(109, 'Hose Bucket', 'Hose Bucket', '1', 'uploads/61ac89cc0debf-', NULL, 1, '2021-12-05 09:43:40', '2021-12-05 09:43:40'),
(108, 'Foam making branch pipe pipe FB 10X', '', '1', 'uploads/61ac89ba6e7c9-', NULL, 1, '2021-12-05 09:43:22', '2021-12-05 09:43:22'),
(107, 'Foam making branch pipe pipe FB 5X', '', '1', 'uploads/61ac89b301463-', NULL, 1, '2021-12-05 09:43:15', '2021-12-05 09:43:15'),
(106, 'Diffuser branch flat spray', '', '1', 'uploads/61ac89a66aba0-', NULL, 1, '2021-12-05 09:43:02', '2021-12-05 09:43:02'),
(105, 'Diffuser branch pipe (triple purpose)', '', '1', 'uploads/61ac899dd819d-', NULL, 1, '2021-12-05 09:42:53', '2021-12-05 09:42:53'),
(104, 'Branch pipe revolving head', '', '1', 'uploads/61ac89976a81d-', NULL, 1, '2021-12-05 09:42:47', '2021-12-05 09:42:47'),
(103, 'Branch type universal', '', '1', 'uploads/61ac899084846-', NULL, 1, '2021-12-05 09:42:40', '2021-12-05 09:42:40'),
(102, 'Fog nozzle', '', '1', 'uploads/61ac89881f8e2-', NULL, 1, '2021-12-05 09:42:32', '2021-12-05 09:42:32'),
(101, 'Hand control branch london patter', '', '1', 'uploads/61ac89797d661-', NULL, 1, '2021-12-05 09:42:17', '2021-12-05 09:42:17'),
(100, 'Hand control branch london patter', '', '1', 'uploads/61ac8965d67e9-', NULL, 1, '2021-12-05 09:41:57', '2021-12-05 09:41:57'),
(98, 'Nozzle plain various sizes for 63 mm (12,15,20,25 mm)', '2', '1', 'uploads/61ac8950dbb0a-', NULL, 1, '2021-12-05 09:41:36', '2021-12-05 09:41:36'),
(97, 'Hose Bandages', '2', '1', 'uploads/61ac8948e2654-', NULL, 1, '2021-12-05 09:41:28', '2021-12-05 09:41:28'),
(96, 'Adoptor 63 MM Female to 63 MM Male', '2', '1', 'uploads/61ac893e147b4-', NULL, 1, '2021-12-05 09:41:18', '2021-12-05 09:41:18'),
(95, 'Adoptor 63 MM Male to 63 MM Female', '2', '1', 'uploads/61ac8933d5346-', NULL, 1, '2021-12-05 09:41:07', '2021-12-05 09:41:07'),
(94, 'Adoptor 63 MM Male to 63 MM instantaneous', '2', '1', 'uploads/61ac892b4c5c8-', NULL, 1, '2021-12-05 09:40:59', '2021-12-05 09:40:59'),
(93, 'Collecting breaching 63 mm instantaneious pattern', '2', '1', 'uploads/61ac8922e77a8-', NULL, 1, '2021-12-05 09:40:50', '2021-12-05 09:40:50'),
(92, 'Suction Strainer 3\"', '2', '1', 'uploads/61ac88c30fcc9-', NULL, 1, '2021-12-05 09:39:15', '2021-12-05 09:39:15'),
(91, 'Suction Collcation hear-100 mm suction inlet, GM 2 way', '2', '1', 'uploads/61ac88b0eb7fe-', NULL, 1, '2021-12-05 09:38:56', '2021-12-05 09:38:56'),
(90, 'Suction Hose 3\" dia, with gun metal couplings', '2', '1', 'uploads/61ac88a908fbd-', NULL, 1, '2021-12-05 09:38:49', '2021-12-05 09:38:49'),
(88, 'Non percolating delivery hose of 22.5 Mtrs length with Male and Female couplings', '2', '1', 'uploads/61ac87fd44aad-', NULL, 1, '2021-12-05 09:35:57', '2021-12-05 09:35:57'),
(89, 'Suction Hose 4\" dia, with gun metal couplings', '2', '1', 'uploads/61ac8894efef5-', NULL, 1, '2021-12-05 09:38:28', '2021-12-05 09:38:28'),
(153, 'Foam Extinguishers', '', '2', 'uploads/61ac9fd70eaca-', NULL, 1, '2021-12-05 11:17:43', '2021-12-05 11:17:43'),
(154, 'DCP Extinguishers', '', '2', 'uploads/61ac9fe53c89e-', NULL, 1, '2021-12-05 11:17:57', '2021-12-05 11:17:57'),
(155, 'CO2 Extinguishers', '', '2', 'uploads/61ac9ff10b6f0-', NULL, 1, '2021-12-05 11:18:09', '2021-12-05 11:18:09'),
(156, 'Reflective Jackets', '', '2', 'uploads/61ac9ff888df9-', NULL, 1, '2021-12-05 11:18:16', '2021-12-05 11:18:16'),
(157, 'Bill hook', '', '2', 'uploads/61aca00443043-', NULL, 1, '2021-12-05 11:18:28', '2021-12-05 11:18:28'),
(158, 'Tarpaulin', '', '2', 'uploads/61aca00fda870-', NULL, 1, '2021-12-05 11:18:39', '2021-12-05 11:18:39'),
(159, 'First aid kit', '', '2', 'uploads/61aca018e661c-', NULL, 1, '2021-12-05 11:18:48', '2021-12-05 11:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `logistics_licofficers_masters`
--

CREATE TABLE `logistics_licofficers_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lci_officer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistics_licofficers_masters`
--

INSERT INTO `logistics_licofficers_masters` (`id`, `lci_officer`, `rank`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Mr. B. Ajay Kumar', 9, 1, NULL, NULL),
(7, 'Mr. M. Bhagwan Reddy', 9, 1, NULL, NULL),
(8, 'Mr.S.Sreedhar Reddy', 9, 1, NULL, NULL),
(10, 'Mr.Â S. Sandhanna', 9, 1, NULL, NULL),
(11, 'Mr. K.V. Krishna Kumar', 9, 1, NULL, NULL),
(12, 'Mr. P.Jaya Krushna', 9, 1, NULL, NULL),
(13, 'Mr. Y. Gowtham', 9, 1, NULL, NULL),
(14, 'Mr. Shaik Khaja Karimulla', 9, 1, NULL, NULL),
(15, 'Mr. G. Murali Manohar Reddy', 9, 1, NULL, NULL),
(16, 'Mr.Â A.Yagna Narayana', 9, 1, NULL, NULL),
(17, 'Mr.Â V.Srinivas', 9, 1, NULL, NULL),
(18, 'Mr.Â R.Sudhakar', 9, 1, NULL, NULL),
(19, 'Mr.Â A. Jaya Prakash', 9, 1, NULL, NULL),
(20, 'Mr.Â T.Venkanna', 9, 1, NULL, NULL),
(21, 'Mr.Â M. Srinivasa Reddy', 9, 1, NULL, NULL),
(22, 'Mr.Â B. Sudhakar Rao', 9, 1, NULL, NULL),
(23, 'Mr. Ajmeera Sreedas', 9, 1, NULL, NULL),
(24, 'Mr.Â B.Nageswar Rao', 9, 1, NULL, NULL),
(25, 'Mr. P. Kishore', 9, 1, NULL, NULL),
(26, 'Mr.M. Sandesh Kumar', 9, 1, NULL, NULL),
(27, 'Mr.Â B. Keshavulu', 9, 1, NULL, NULL),
(28, 'B. Harinatha Reddy', 9, 1, NULL, NULL),
(29, 'Mr.Â T.Mahendar Reddy', 9, 1, NULL, NULL),
(30, 'Mr.Â T. Poorna chander', 9, 1, NULL, NULL),
(31, 'Mr. P. Suresh Kumar', 10, 1, NULL, NULL),
(32, 'Mr. S. Shankara Lingam', 10, 1, NULL, NULL),
(33, 'Mr. V. Ashok', 10, 1, NULL, NULL),
(34, 'Mr.Â G.V. Prasad', 10, 1, NULL, NULL),
(35, 'Mr, K.V. Satish Kumar', 10, 1, NULL, NULL),
(36, 'Mr.Â Tangella Srinivas', 10, 1, NULL, NULL),
(37, 'Mr.Â S. Sreenath', 10, 1, NULL, NULL),
(38, 'Mr.Â K. Vijay Kumar', 10, 1, NULL, NULL),
(39, 'Mr, V. Dhanunjaya Reddy', 10, 1, NULL, NULL),
(40, 'Mr.Â Y. Saidulu', 10, 1, NULL, NULL),
(41, 'Mr. G. Venu', 10, 1, NULL, NULL),
(42, 'Mr.Â D. Prabhakar', 10, 1, NULL, NULL),
(43, 'Mr.Â B.Remand Babu', 10, 1, NULL, NULL),
(44, 'Mr.Â B. Dharma', 10, 1, NULL, NULL),
(45, 'Mr.Â V. Bhanu Pratap', 10, 1, NULL, NULL),
(46, 'Mr.Â B.Sudershan Reddy', 10, 1, NULL, NULL),
(47, 'Mr.Â P.A. Shanmuka Rao', 10, 1, NULL, NULL),
(48, 'Mr.Â B. Ramesh', 10, 1, NULL, NULL),
(49, 'S.Suresh Reddy', 10, 1, NULL, NULL),
(50, 'Mr.Â P. Giridhar Reddy', 10, 1, NULL, NULL),
(51, 'Mr. Y. Prabhakar Reddy', 10, 1, NULL, NULL),
(52, 'Mr.Â K.Jayapal Reddy', 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_access`
--

CREATE TABLE `page_access` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `date_of_entry` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_access`
--

INSERT INTO `page_access` (`id`, `category`, `page_title`, `page_url`, `date_of_entry`) VALUES
(1, '', 'Vehicle Masters', 'all_Vehicle _master_urls', '2021-09-27 23:54:48'),
(71, 'Logistics', 'Logistics Entry - FS Stock Update', 'FScostockupdate', '2021-09-27 23:55:59'),
(4, 'Logistics', 'Logistics Entry - Recieve Stock Entry', 'recivestockbytender', '2021-09-27 23:55:59'),
(5, 'Logistics', 'Logistics Entry - C. O. Stock Update', 'costockupdate', '2021-09-27 23:55:59'),
(6, 'Logistics', 'Logistics Entry - Distribution To Dist', 'distributiontodist', '2021-09-27 23:55:59'),
(7, 'Logistics', 'Logistics Entry - District Stock Update', 'districtcostockupdate', '2021-09-27 23:55:59'),
(8, 'Logistics', 'Logistics Entry - Distribution To FS', 'distributiontofs', '2021-09-27 23:55:59'),
(36, 'Users', 'Users - Users Create', 'createUser', '2021-09-27 23:55:59'),
(11, 'Logistics', 'Logistics Master - Districts', 'districts', '2021-09-27 23:55:59'),
(12, 'Logistics', 'Logistics Master - Unserviceable', 'unserviceable', '2021-09-27 23:55:59'),
(13, 'Logistics', 'Logistics Master - Fire Stations', 'fsstations', '2021-09-27 23:55:59'),
(14, 'Logistics', 'Logistics Master - Ranks', 'ranks', '2021-09-27 23:55:59'),
(15, 'Logistics', 'Logistics Master - Category', 'category', '2021-09-27 23:55:59'),
(16, 'Logistics', 'Logistics Master - Kits', 'kits', '2021-09-27 23:55:59'),
(17, 'Logistics', 'Logistics Master - Kits Eligibility', 'kitseligibilty', '2021-09-27 23:55:59'),
(18, 'Logistics', 'Logistics Master - Employees Role', 'employeesrole', '2021-09-27 23:55:59'),
(19, 'Logistics', 'Logistics Master - Employees', 'employees', '2021-09-27 23:55:59'),
(20, 'Logistics', 'Logistics Master - L C I Officers', 'lciemployess', '2021-09-27 23:55:59'),
(21, 'Vehicle ', 'Vehicle Entry - Vehicles List', 'vhlist', '2021-09-27 23:55:59'),
(22, 'Vehicle ', 'Vehicle Entry - Vehicle Expanses', 'vhexpanses', '2021-09-27 23:55:59'),
(23, 'Vehicle ', 'Vehicle Entry - Quoata Allotment', 'quotaallotment', '2021-09-27 23:55:59'),
(24, 'Vehicle ', 'Vehicle Entry - Additional Quoata', 'additionalquota', '2021-09-27 23:55:59'),
(25, 'Vehicle ', 'Vehicle Entry - Fuel Issues', 'fuelissues', '2021-09-27 23:55:59'),
(26, 'Vehicle ', 'Vehicle Entry - Transfers', 'vhtransfers', '2021-09-27 23:55:59'),
(27, 'Vehicle ', 'Vehicle Entry - Allotment', 'allotment', '2021-09-27 23:55:59'),
(28, 'Vehicle ', 'Vehicle Entry - Unit To Unit', 'unittounitalotment', '2021-09-27 23:55:59'),
(29, 'Vehicle ', 'Vehicle Entry - Unit To FS', 'unittofs', '2021-09-27 23:55:59'),
(34, 'Logistics Report', 'Logistics Report - Unservicibles', 'unservicibles', '2021-09-27 23:55:59'),
(33, 'Logistics Report', 'Logistics Report - Recieved stock from CO', 'recievedStockFromCO', '2021-09-27 23:55:59'),
(32, 'Logistics Report', 'Logistics Report - District Available Stock', 'districtavailableStock', '2021-09-27 23:55:59'),
(31, 'Logistics Report', 'Logistics Report - District Stock Lists', 'districtStockLists', '2021-09-27 23:55:59'),
(37, 'Users', 'Users - Users Role', 'createUserRole', '2021-09-27 23:55:59'),
(38, 'Users', 'Users - Users Role Access', 'createUserRoleAccess', '2021-09-27 23:55:59'),
(70, 'Vehicle ', 'Vehicle Entry -FS Existing Vehicles ', 'exitingvhlist', '2021-09-27 23:55:59'),
(69, 'Logistics', 'Logistics Entry - FS Existing Stock Entry', 'localrecivestockbytender', '2021-09-27 23:55:59'),
(30, 'Logistics Report', 'Logistics Report - Receive stock Report', 'receieveStockReport', '2021-09-27 23:55:59'),
(45, 'Vehicle', 'Vehicle Masters - Auction', 'auctions', '2021-09-27 23:55:59'),
(43, 'Logistics', 'Logistics Master - Divisions', 'divisions', '2021-09-27 23:55:59'),
(44, 'Vehicle ', 'Vehicle Entry - Vehicle Repairs', 'repairs', '2021-09-27 23:55:59'),
(35, 'Logistics Report', 'Logistics Report - FS Wise Distribution', 'fswiseDistribution', '2021-09-27 23:55:59'),
(46, 'Logistics Report', 'Logistics Report - STOCK Receipt (D)', 'diststockreceipt', '2021-09-27 23:55:59'),
(58, 'Tenders Orders', 'Tenders Orders - Tender Details by C.O', 'tenderdetailsbyco', '2021-09-27 23:55:59'),
(48, 'Vehicle Report', 'Vehicle Report - All Vehicle Report', 'allvehiclesreport', '2021-09-27 23:55:59'),
(49, 'Vehicle Report', 'Vehicle Report - Transfer to Dist ', 'transferstoDistr', '2021-09-27 23:55:59'),
(50, 'Vehicle Report', 'Vehicle Report - Unit to Unit Vehicle Transfer', 'unittounitvehicletransfer', '2021-09-27 23:55:59'),
(51, 'Vehicle Report', 'Vehicle Report - Unit To FS Transfer', 'unittofstransfers', '2021-09-27 23:55:59'),
(52, 'Vehicle Report', 'Vehicle Report - Quoata Allotment Vehicles', 'qallvhclewise', '2021-09-27 23:55:59'),
(53, 'Vehicle Report', 'Vehicle Report - Quota Allotment  Unit Wise', 'qalldistrictewise', '2021-09-27 23:55:59'),
(54, 'Vehicle Report', 'Vehicle Report - Vehicle Repairs', 'allvehiclesrepairs', '2021-09-27 23:55:59'),
(55, 'Vehicle Report', 'Vehicle Report - Vehicle Expenses', 'allvehiclesexpenses', '2021-09-27 23:55:59'),
(56, 'Vehicle Report', 'Vehicle Report - Advance Water Tender\'s', 'unittounitvehicletransferadvnce', '2021-09-27 23:55:59'),
(59, 'Tenders Orders', 'Tenders Orders - LCI Report update', 'lcireportupdate', '2021-09-27 23:55:59'),
(60, 'Tenders Orders', 'Tenders Orders - Tender Distribution Details', 'tenderdistributiondetails', '2021-09-27 23:55:59'),
(61, 'Logistics', 'Logistics - Condemnation Lists', 'condemnation_logistics', '2021-09-27 23:55:59'),
(62, 'Logistics', 'Logistics - Auction', 'auctions_logistics', '2021-09-27 23:55:59'),
(63, 'Vehicle', 'Vehicle Masters - vehicle description', 'vhdescription', '2021-09-27 23:55:59'),
(64, 'Vehicle', 'Vehicle Masters - vehicle Category', 'vhcategory', '2021-09-27 23:55:59'),
(65, 'Vehicle', 'Vehicle Masters - vehicle Varient', 'vhvarient', '2021-09-27 23:55:59'),
(66, 'Vehicle', 'Vehicle Masters - vehicle Type', 'vhtype', '2021-09-27 23:55:59'),
(67, 'Vehicle', 'Vehicle Masters - vehicle Make', 'vhmake', '2021-09-27 23:55:59'),
(68, 'Vehicle', 'Vehicle Masters - vehicle Condemnation', 'condemnation', '2021-09-27 23:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `recivestockbytender`
--

CREATE TABLE `recivestockbytender` (
  `stock_id` int(21) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `tender_number` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `purpose` text NOT NULL,
  `qty_recieved` int(32) NOT NULL,
  `actual_qty` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `purchase_from` varchar(255) NOT NULL,
  `reieved_from` varchar(255) NOT NULL,
  `lci_officer_1` varchar(255) NOT NULL,
  `lci_officer_2` varchar(255) NOT NULL,
  `lci_officer_3` varchar(255) NOT NULL,
  `tender_type` varchar(255) NOT NULL,
  `tender_no` varchar(255) NOT NULL,
  `supply_order` text NOT NULL,
  `sanction_order` text NOT NULL,
  `head_of_account` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `rv_number` varchar(255) NOT NULL,
  `rv_date` varchar(255) NOT NULL,
  `distribution_order_no` varchar(255) NOT NULL,
  `distribution_order` text NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `iv_number` varchar(255) NOT NULL,
  `iv_number_fs` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `fs_name` varchar(255) NOT NULL,
  `iv_date` varchar(255) NOT NULL,
  `iv_date_fs` varchar(255) NOT NULL,
  `transfer` int(1) NOT NULL,
  `transfer_fs` int(1) NOT NULL,
  `localpurchase` int(1) NOT NULL,
  `existingstock` int(1) NOT NULL,
  `date_of_entry` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recivestockbytender_new`
--

CREATE TABLE `recivestockbytender_new` (
  `stock_id` int(21) NOT NULL,
  `item_id` int(11) NOT NULL,
  `tender_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `purpose` text NOT NULL,
  `qty_recieved` int(32) NOT NULL,
  `actual_qty` bigint(20) DEFAULT NULL,
  `amount` varchar(255) NOT NULL,
  `purchase_from` varchar(255) NOT NULL,
  `reieved_from` varchar(255) NOT NULL,
  `lci_officer_1` varchar(255) NOT NULL,
  `lci_officer_2` varchar(255) NOT NULL,
  `lci_officer_3` varchar(255) NOT NULL,
  `tender_type` varchar(255) NOT NULL,
  `tender_no` varchar(255) NOT NULL,
  `supply_order` text NOT NULL,
  `sanction_order` text NOT NULL,
  `head_of_account` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `rv_number` varchar(255) NOT NULL,
  `rv_date` varchar(255) NOT NULL,
  `distribution_order_no` varchar(255) NOT NULL,
  `distribution_order` text NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `iv_number` varchar(255) NOT NULL,
  `iv_number_fs` varchar(255) NOT NULL,
  `district` varchar(255) DEFAULT NULL,
  `fs_name` varchar(255) NOT NULL,
  `iv_date` varchar(255) NOT NULL,
  `iv_date_fs` varchar(255) NOT NULL,
  `transfer` int(1) NOT NULL,
  `transfer_fs` int(1) NOT NULL,
  `localpurchase` int(1) NOT NULL,
  `existingstock` int(1) NOT NULL,
  `date_of_entry` datetime NOT NULL DEFAULT current_timestamp(),
  `item_status` enum('initiated','approved','rejected','hold') DEFAULT NULL,
  `from_transfer_id` int(11) DEFAULT NULL,
  `to_transfer_id` int(11) DEFAULT NULL,
  `from_transfer_type` enum('Main','District','FS') DEFAULT NULL,
  `to_transfer_type` enum('Main','District','FS') DEFAULT NULL,
  `transfer_datetime` datetime DEFAULT NULL,
  `from_transfer_closing_stock` bigint(20) DEFAULT NULL,
  `to_transfer_closing_stock` int(11) DEFAULT NULL,
  `dist_receive` int(11) DEFAULT NULL,
  `dist_current_stock` int(11) DEFAULT NULL,
  `fs_receive` int(11) DEFAULT NULL,
  `fs_current_stock` int(11) DEFAULT NULL,
  `main_total_stock` int(11) DEFAULT NULL,
  `main_stock` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recivestockbytender_new`
--

INSERT INTO `recivestockbytender_new` (`stock_id`, `item_id`, `tender_id`, `description`, `purpose`, `qty_recieved`, `actual_qty`, `amount`, `purchase_from`, `reieved_from`, `lci_officer_1`, `lci_officer_2`, `lci_officer_3`, `tender_type`, `tender_no`, `supply_order`, `sanction_order`, `head_of_account`, `notes`, `status`, `rv_number`, `rv_date`, `distribution_order_no`, `distribution_order`, `updated_by`, `iv_number`, `iv_number_fs`, `district`, `fs_name`, `iv_date`, `iv_date_fs`, `transfer`, `transfer_fs`, `localpurchase`, `existingstock`, `date_of_entry`, `item_status`, `from_transfer_id`, `to_transfer_id`, `from_transfer_type`, `to_transfer_type`, `transfer_datetime`, `from_transfer_closing_stock`, `to_transfer_closing_stock`, `dist_receive`, `dist_current_stock`, `fs_receive`, `fs_current_stock`, `main_total_stock`, `main_stock`) VALUES
(172, 155, 48, '', '', 40, 40, '230.00', '', '', '17', '23', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, '2022-02-07 23:56:34', NULL, NULL, 0, NULL, 'Main', '2022-02-08 01:56:34', NULL, NULL, NULL, NULL, NULL, NULL, 40, 40),
(171, 151, NULL, 'gf', '', 3, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '', '', 'df', '', 'DFO Peddapally', '', 'dg', NULL, '', '', '2022-01-01', 0, 1, 0, 0, '2022-02-06 12:43:07', NULL, 13, 305, 'District', 'FS', '2022-02-06 14:43:07', NULL, NULL, 10, 4, 3, 3, 70, 60),
(170, 150, NULL, 'jlj', '', 3, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '', '', 'dg', '', 'DFO Peddapally', '', 'dg', NULL, '', '', '2022-01-01', 0, 1, 0, 0, '2022-02-06 12:42:54', NULL, 13, 305, 'District', 'FS', '2022-02-06 14:42:54', NULL, NULL, 10, 4, 3, 3, 70, 60),
(169, 151, NULL, 'gf', '', 3, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', 'dgd', '2022-01-01', 'df', '', 'FSO Pedapalli', '', 'sg', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-06 12:42:36', NULL, 13, 304, 'District', 'FS', '2022-02-06 14:42:36', NULL, NULL, 10, 7, 3, 3, 70, 60),
(168, 150, NULL, 'jlj', '', 3, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', 'sgfg', '2022-01-01', 'gFGF', '', 'FSO Pedapalli', '', 'sf', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-06 12:42:19', NULL, 13, 304, 'District', 'FS', '2022-02-06 14:42:19', NULL, NULL, 10, 7, 3, 3, 70, 60),
(167, 151, NULL, 'gf', '', 2, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '', '', 'fg', '', 'DFO Mancherial', '', '234', NULL, '', '', '2022-01-01', 0, 1, 0, 0, '2022-02-06 12:06:54', NULL, 12, 303, 'District', 'FS', '2022-02-06 14:06:54', NULL, NULL, 10, 6, 2, 2, 70, 60),
(166, 151, NULL, 'gf', '', 2, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '46', '2022-01-01', 'fg', '', 'FSO Asifabad', '', 'gf', NULL, '', '', '2022-01-02', 0, 2, 0, 0, '2022-02-06 12:06:35', NULL, 12, 302, 'District', 'FS', '2022-02-06 14:06:35', NULL, NULL, 10, 8, 2, 2, 70, 60),
(165, 151, NULL, 'gf', '', 2, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '34', '2022-01-01', 'fg', '', 'FSO Chennur', '', '3sf', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-06 12:06:16', NULL, 11, 301, 'District', 'FS', '2022-02-06 14:06:16', NULL, NULL, 10, 2, 2, 2, 70, 60),
(164, 151, NULL, 'gf', '', 2, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '546', '2022-05-31', 'gf', '', 'FSO Bellampally', '', 's', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-06 12:06:03', NULL, 11, 300, 'District', 'FS', '2022-02-06 14:06:03', NULL, NULL, 10, 4, 2, 2, 70, 60),
(163, 151, NULL, 'gf', '', 2, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', 'gdg', '2022-01-01', 'rg', '', 'FSO Jannaram', '', 'ert', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-06 12:05:50', NULL, 11, 299, 'District', 'FS', '2022-02-06 14:05:50', NULL, NULL, 10, 6, 2, 2, 70, 60),
(162, 151, NULL, 'gf', '', 2, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '98', '2022-01-01', '45', '', 'FSO Mancherial', '', 'df', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-06 12:05:35', NULL, 11, 298, 'District', 'FS', '2022-02-06 14:05:35', NULL, NULL, 10, 8, 2, 2, 70, 60),
(161, 150, NULL, 'jlj', '', 2, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '', '', 's4', '', 'DFO Mancherial', '', '9iii', NULL, '', '', '2022-01-01', 0, 1, 0, 0, '2022-02-06 12:04:36', NULL, 12, 303, 'District', 'FS', '2022-02-06 14:04:36', NULL, NULL, 10, 6, 2, 2, 70, 60),
(159, 150, NULL, 'jlj', '', 2, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', 'rg', '2022-01-01', '8797', '', 'FSO Chennur', '', '32', NULL, '', '', '2022-01-02', 0, 2, 0, 0, '2022-02-06 12:04:03', NULL, 11, 301, 'District', 'FS', '2022-02-06 14:04:03', NULL, NULL, 10, 2, 2, 2, 70, 60),
(160, 150, NULL, 'jlj', '', 2, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '45', '2022-01-01', '345', '', 'FSO Asifabad', '', '454', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-06 12:04:24', NULL, 12, 302, 'District', 'FS', '2022-02-06 14:04:24', NULL, NULL, 10, 8, 2, 2, 70, 60),
(158, 150, NULL, 'jlj', '', 2, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '34', '2022-01-01', '345', '', 'FSO Bellampally', '', '34', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-06 12:03:43', NULL, 11, 300, 'District', 'FS', '2022-02-06 14:03:43', NULL, NULL, 10, 4, 2, 2, 70, 60),
(157, 150, NULL, 'jlj', '', 2, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', 'sfg', '2022-01-01', '45', '', 'FSO Jannaram', '', '33', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-06 12:03:31', NULL, 11, 299, 'District', 'FS', '2022-02-06 14:03:31', NULL, NULL, 10, 6, 2, 2, 70, 60),
(156, 150, NULL, 'jlj', '', 2, NULL, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '56', '2022-02-01', '454', '', 'FSO Mancherial', '', '343', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-06 11:44:24', NULL, 11, 298, 'District', 'FS', '2022-02-06 13:44:24', NULL, NULL, 10, 8, 2, 2, 70, 60),
(151, 151, 47, 'gf', '', 10, 10, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', 'rv33', '2022-01-01', '888', '', 'DFO Peddapally', '23', '', '14', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-06 11:40:26', NULL, 0, 14, 'Main', 'District', '2022-02-06 13:40:26', NULL, NULL, 10, 10, NULL, NULL, 70, 60),
(152, 150, 47, 'jlj', '', 10, 10, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '45', '2022-01-01', 'jkj', '', 'DFO Mancherial', 'lklj', '', '11', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-06 11:41:19', NULL, 0, 11, 'Main', 'District', '2022-02-06 13:41:19', NULL, NULL, 10, 10, NULL, NULL, 100, 90),
(155, 150, 47, 'dgdf', '', 10, 10, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '4', '2022-01-01', 'kjklj', '', 'DFO Peddapally', '10', '', '14', '', '2022-01-02', '', 2, 0, 0, 0, '2022-02-06 11:42:08', NULL, 0, 14, 'Main', 'District', '2022-02-06 13:42:08', NULL, NULL, 10, 10, NULL, NULL, 70, 60),
(154, 150, 47, 'kljl', '', 10, 10, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '3', '2023-01-01', 'jjljl', '', 'DFO Peddapally', 'lkkl', '', '13', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-06 11:41:51', NULL, 0, 13, 'Main', 'District', '2022-02-06 13:41:51', NULL, NULL, 10, 10, NULL, NULL, 80, 70),
(153, 150, 47, 'ljlj', '', 10, 10, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '654', '2022-01-01', '898', '', 'DFO Mancherial', '0kkk', '', '12', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-06 11:41:37', NULL, 0, 12, 'Main', 'District', '2022-02-06 13:41:37', NULL, NULL, 10, 10, NULL, NULL, 90, 80),
(142, 158, 46, 'bpally', '', 10, 10, '0', 'national traders', '', '16', '26', '8', '', '', '', '', '', '', '', '546', '2022-01-01', '10', '', 'DFO Peddapally', '10', '', '14', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-06 10:06:37', NULL, 0, 14, 'Main', 'District', '2022-02-06 12:06:37', NULL, NULL, 10, 10, NULL, NULL, 30, 20),
(149, 151, 47, 'dgf', '', 10, 10, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '353', '2022-01-01', '98', '', 'DFO Mancherial', '22', '', '12', '', '2022-01-02', '', 2, 0, 0, 0, '2022-02-06 11:39:55', NULL, 0, 12, 'Main', 'District', '2022-02-06 13:39:55', NULL, NULL, 10, 10, NULL, NULL, 90, 80),
(150, 151, 47, 'dgdf', '', 10, 10, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '3', '2022-01-01', '98', '', 'DFO Peddapally', '111', '', '13', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-06 11:40:12', NULL, 0, 13, 'Main', 'District', '2022-02-06 13:40:12', NULL, NULL, 10, 10, NULL, NULL, 80, 70),
(147, 151, 47, '', '', 100, 100, '100.00', '', '', '0', '0', '23', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, '2022-02-06 11:38:37', NULL, NULL, 0, NULL, 'Main', '2022-02-06 13:38:37', NULL, NULL, NULL, NULL, NULL, NULL, 100, 100),
(148, 151, 47, 'rain coat to manchi', '', 10, 10, '0', '', '', '0', '0', '23', '', '', '', '', '', '', '', '345', '2022-01-01', '333', '', 'DFO Mancherial', '34', '', '11', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-06 11:39:38', NULL, 0, 11, 'Main', 'District', '2022-02-06 13:39:38', NULL, NULL, 10, 10, NULL, NULL, 100, 90),
(146, 150, 47, '', '', 100, 100, '120.00', '', '', '0', '0', '23', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, '2022-02-06 11:38:37', NULL, NULL, 0, NULL, 'Main', '2022-02-06 13:38:37', NULL, NULL, NULL, NULL, NULL, NULL, 100, 100),
(145, 159, NULL, 'taruplin', '', 2, NULL, '0', 'national traders', '', '16', '26', '8', '', '', '', '', '', '', '', 'sgf', '2022-01-01', '46', '', 'FSO Mancherial', '', '34', NULL, '', '', '2022-02-01', 0, 2, 0, 0, '2022-02-06 11:34:55', NULL, 11, 298, 'District', 'FS', '2022-02-06 13:34:55', NULL, NULL, 10, 8, 2, 2, 10, 0),
(143, 158, NULL, 'bpally', '', 5, NULL, '0', 'national traders', '', '16', '26', '8', '', '', '', '', '', '', '', 'sg', '2022-01-01', '1', '', 'FSO Mancherial', '', '22', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-06 11:29:36', NULL, 11, 298, 'District', 'FS', '2022-02-06 13:29:36', NULL, NULL, 10, 5, 5, 5, 30, 20),
(144, 158, NULL, 'tarpaulin', '', 5, NULL, '0', 'national traders', '', '16', '26', '8', '', '', '', '', '', '', '', 'fdg', '2022-01-01', '44', '', 'FSO Jannaram', '', '4', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-06 11:30:00', NULL, 11, 299, 'District', 'FS', '2022-02-06 13:30:00', NULL, NULL, 10, 0, 5, 5, 30, 20),
(141, 158, 46, 'tarpaulin-pedda', '', 10, 10, '0', 'national traders', '', '16', '26', '8', '', '', '', '', '', '', '', '54', '2022-01-01', '09', '', 'DFO Peddapally', '10', '', '13', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-06 10:05:05', NULL, 0, 13, 'Main', 'District', '2022-02-06 12:05:05', NULL, NULL, 10, 10, NULL, NULL, 40, 30),
(140, 159, 46, 'taruplin', '', 10, 10, '0', 'national traders', '', '16', '26', '8', '', '', '', '', '', '', '', '10', '2022-01-01', '29', '', 'DFO Mancherial', '99', '', '12', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-06 10:04:41', NULL, 0, 12, 'Main', 'District', '2022-02-06 12:04:41', NULL, NULL, 10, 20, NULL, NULL, 10, 0),
(139, 158, 46, 'macnh', '', 10, 10, '0', 'national traders', '', '16', '26', '8', '', '', '', '', '', '', '', '44', '2022-01-01', '10', '', 'DFO Mancherial', '01', '', '11', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-06 10:04:24', NULL, 0, 11, 'Main', 'District', '2022-02-06 12:04:24', NULL, NULL, 10, 10, NULL, NULL, 50, 40),
(138, 159, 46, 'first aid kit bpally', '', 10, 10, '0', 'national traders', '', '16', '26', '8', '', '', '', '', '', '', '', '454', '2022-01-01', '09', '', 'DFO Peddapally', '10', '', '14', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-06 10:03:28', NULL, 0, 14, 'Main', 'District', '2022-02-06 12:03:28', NULL, NULL, 10, 10, NULL, NULL, 20, 10),
(137, 159, 46, 'first aid kit bhupalapally', '', 10, 10, '0', 'national traders', '', '16', '26', '8', '', '', '', '', '', '', '', '3545', '2022-01-01', '99', '', 'DFO Peddapally', '10', '', '13', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-06 10:03:06', NULL, 0, 13, 'Main', 'District', '2022-02-06 12:03:06', NULL, NULL, 10, 10, NULL, NULL, 30, 20),
(136, 159, 46, 'first aid kits', '', 10, 10, '0', 'national traders', '', '16', '26', '8', '', '', '', '', '', '', '', '55', '2022-01-01', '002', '', 'DFO Mancherial', '10', '', '12', '', '2022-02-01', '', 2, 0, 0, 0, '2022-02-06 10:02:31', NULL, 0, 12, 'Main', 'District', '2022-02-06 12:02:31', NULL, NULL, 10, 10, NULL, NULL, 40, 30),
(134, 159, 46, '', '', 50, 50, '100.00', 'national traders', '', '16', '26', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, '2022-02-06 10:00:56', NULL, NULL, 0, NULL, 'Main', '2022-02-06 12:00:56', NULL, NULL, NULL, NULL, NULL, NULL, 50, 50),
(135, 159, 46, 'first aid kits', '', 10, 10, '0', 'national traders', '', '16', '26', '8', '', '', '', '', '', '', '', '553', '2022-01-01', '001', '', 'DFO Mancherial', '10', '', '11', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-06 10:02:10', NULL, 0, 11, 'Main', 'District', '2022-02-06 12:02:10', NULL, NULL, 10, 10, NULL, NULL, 50, 40),
(133, 158, 46, '', '', 50, 50, '120.00', 'national traders', '', '16', '26', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, '2022-02-06 10:00:56', NULL, NULL, 0, NULL, 'Main', '2022-02-06 12:00:56', NULL, NULL, NULL, NULL, NULL, NULL, 50, 50),
(173, 156, 48, '', '', 40, 40, '230.00', '', '', '17', '23', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, '2022-02-07 23:56:34', NULL, NULL, 0, NULL, 'Main', '2022-02-08 01:56:34', NULL, NULL, NULL, NULL, NULL, NULL, 40, 40),
(174, 156, 48, 'reflective jackets ', '', 10, 10, '0', '', '', '17', '23', '8', '', '', '', '', '', '', '', 'rv 1', '2022-01-01', '1', '', 'DFO Peddapally', '1', '', '14', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-07 23:58:05', NULL, 0, 14, 'Main', 'District', '2022-02-08 01:58:05', NULL, NULL, 10, 10, NULL, NULL, 40, 30),
(175, 156, 48, 'reflective jackets ', '', 10, 10, '0', '', '', '17', '23', '8', '', '', '', '', '', '', '', 'rv 2', '2022-01-01', '2', '', 'DFO Peddapally', '2', '', '13', '', '2022-02-01', '', 2, 0, 0, 0, '2022-02-07 23:58:26', NULL, 0, 13, 'Main', 'District', '2022-02-08 01:58:26', NULL, NULL, 10, 10, NULL, NULL, 30, 20),
(176, 156, 48, 'reflective jackets ', '', 10, 10, '0', '', '', '17', '23', '8', '', '', '', '', '', '', '', 'rv 3', '2022-01-01', '3', '', 'DFO Peddapally', '3', '', '12', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-07 23:59:15', NULL, 0, 12, 'Main', 'District', '2022-02-08 01:59:15', NULL, NULL, 10, 10, NULL, NULL, 20, 10),
(177, 156, 48, 'reflective jackets ', '', 10, 10, '0', '', '', '17', '23', '8', '', '', '', '', '', '', '', '4', '2022-01-01', '4', '', 'DFO Peddapally', '4', '', '11', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-08 00:00:03', NULL, 0, 11, 'Main', 'District', '2022-02-08 02:00:03', NULL, NULL, 10, 10, NULL, NULL, 10, 0),
(178, 156, NULL, 'mulugu 1', '', 3, NULL, '230.00', '', '', '17', '23', '8', '', '', '', '', '', '', '', '4', '2022-01-01', '1', '', 'FSO Mulugu', '', 'mulu 1', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-08 01:57:16', NULL, 14, 308, 'District', 'FS', '2022-02-08 03:57:16', NULL, NULL, 10, 7, 3, 3, 10, 0),
(179, 156, NULL, 'bhupal', '', 3, NULL, '230.00', '', '', '17', '23', '8', '', '', '', '', '', '', '', '4', '2022-01-01', '3', '', 'FSO Bhupalapalli ', '', '3', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-08 01:57:36', NULL, 14, 307, 'District', 'FS', '2022-02-08 03:57:36', NULL, NULL, 10, 4, 3, 3, 10, 0),
(180, 156, NULL, 'gdk', '', 3, NULL, '230.00', '', '', '17', '23', '8', '', '', '', '', '', '', '', '', '', '3', '', 'DFO Peddapally', '', '4', NULL, '', '', '2022-01-01', 0, 1, 0, 0, '2022-02-08 01:58:44', NULL, 13, 306, 'District', 'FS', '2022-02-08 03:58:44', NULL, NULL, 10, 7, 3, 3, 10, 0),
(181, 156, NULL, 'gdk', '', 3, NULL, '230.00', '', '', '17', '23', '8', '', '', '', '', '', '', '', '', '', '3', '', 'DFO Peddapally', '', '4', NULL, '', '', '2022-01-01', 0, 1, 0, 0, '2022-02-08 01:58:48', NULL, 13, 306, 'District', 'FS', '2022-02-08 03:58:48', NULL, NULL, 10, 4, 3, 6, 10, 0),
(182, 9, 49, '', '', 4, 4, '300000.00', '', '', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, '2022-02-08 07:17:31', NULL, NULL, 0, NULL, 'Main', '2022-02-08 09:17:31', NULL, NULL, NULL, NULL, NULL, NULL, 4, 4),
(183, 156, 48, 'aaaa', '', 2, 2, '0', '', '', '17', '23', '8', '', '', '', '', '', '', '', '99', '2022-01-01', '22', '', 'DFO Peddapally', '44', '', '14', '', '2022-01-01', '', 2, 0, 0, 0, '2022-02-08 09:17:30', NULL, 0, 14, 'Main', 'District', '2022-02-08 11:17:30', NULL, NULL, 2, 6, NULL, NULL, 40, 38),
(184, 156, NULL, '87', '', 2, NULL, '230.00', '', '', '17', '23', '8', '', '', '', '', '', '', '', '89', '2022-01-01', '666', '', 'FSO Manthani', '', '666', NULL, '', '', '2022-01-01', 0, 2, 0, 0, '2022-02-08 09:21:43', NULL, 13, 305, 'District', 'FS', '2022-02-08 11:21:43', NULL, NULL, 2, 2, 2, 2, 40, 38);

-- --------------------------------------------------------

--
-- Table structure for table `tenders_details`
--

CREATE TABLE `tenders_details` (
  `id` int(11) NOT NULL,
  `financial_year` varchar(255) NOT NULL,
  `tender_type` varchar(255) NOT NULL,
  `tender_date` varchar(255) NOT NULL,
  `rc_number` varchar(255) NOT NULL,
  `tender_number` varchar(255) NOT NULL,
  `supply_order_number` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `e_tender_copy` text NOT NULL,
  `final_spc_copy` text NOT NULL,
  `lci_report` text NOT NULL,
  `supply_order` text NOT NULL,
  `sanction_order` text NOT NULL,
  `distribution_order` text NOT NULL,
  `date_of_entry` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(255) NOT NULL,
  `status_stcok` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tenders_details_new`
--

CREATE TABLE `tenders_details_new` (
  `id` int(11) NOT NULL,
  `financial_year` varchar(255) NOT NULL,
  `tender_type` varchar(255) NOT NULL,
  `tender_date` date NOT NULL,
  `rc_number` varchar(255) NOT NULL,
  `tender_number` varchar(255) NOT NULL,
  `supply_order_number` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `item_name` bigint(20) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `e_tender_copy` text NOT NULL,
  `final_spc_copy` text NOT NULL,
  `lci_report` text NOT NULL,
  `supply_order` text NOT NULL,
  `sanction_order` text NOT NULL,
  `distribution_order` text NOT NULL,
  `date_of_entry` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(255) NOT NULL,
  `status_stcok` int(1) DEFAULT NULL,
  `status` enum('initiated','approved','rejected','hold','received','line committee inspected','sanctioned and distribution order done') DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `purchase_from` text DEFAULT NULL,
  `head_of_account` varchar(255) DEFAULT NULL,
  `lci_officer_1` int(11) DEFAULT NULL,
  `lci_officer_2` int(11) DEFAULT NULL,
  `lci_officer_3` int(11) DEFAULT NULL,
  `rec_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenders_details_new`
--

INSERT INTO `tenders_details_new` (`id`, `financial_year`, `tender_type`, `tender_date`, `rc_number`, `tender_number`, `supply_order_number`, `title`, `item_name`, `qty`, `e_tender_copy`, `final_spc_copy`, `lci_report`, `supply_order`, `sanction_order`, `distribution_order`, `date_of_entry`, `updated_by`, `status_stcok`, `status`, `purpose`, `purchase_from`, `head_of_account`, `lci_officer_1`, `lci_officer_2`, `lci_officer_3`, `rec_date`) VALUES
(47, '2022-2023', 'E Tender', '2022-01-01', '2', '2', '', 'tender 2', NULL, NULL, 'uploads/6200155e30797-', 'uploads/6200155e307d5-', '', '', '', 'uploads/620015ad1045b-Supply order copy.docx', '2022-02-06 11:37:18', 'AO Admin', NULL, 'sanctioned and distribution order done', '', '', '', 0, 0, 23, '2022-02-07 00:00:00'),
(46, '2022-2023', 'E Tender', '2022-02-06', '1', '1', '', 'tender one', NULL, NULL, 'uploads/61fffe13d7725-', 'uploads/61fffe13d7767-', '', '', '', 'uploads/61fffec81097e-Distribution order copy.docx', '2022-02-06 09:57:55', 'AO Admin', NULL, 'sanctioned and distribution order done', '', 'national traders', '', 16, 26, 8, '2022-02-07 00:00:00'),
(48, '2022-2023', 'E Tender', '2022-02-08', '8', '8', '', 'tender for new items', NULL, NULL, 'uploads/620213b52a554-', 'uploads/620213b52a592-', '', '', '', 'uploads/620214223a709-Distribution order copy.docx', '2022-02-07 23:54:45', 'AO Admin', NULL, 'sanctioned and distribution order done', '', '', '', 17, 23, 8, NULL),
(49, '2022-2023', 'E Tender', '2022-01-03', '100', '100', '', 'tenders for vehicles', NULL, NULL, 'uploads/620277184f802-', 'uploads/620277184f843-', '', '', '', 'uploads/62027b7b6ac8a-Distribution order copy.docx', '2022-02-08 06:58:48', 'AO Admin', NULL, 'sanctioned and distribution order done', '', '', '', 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenders_details_new_details`
--

CREATE TABLE `tenders_details_new_details` (
  `id` bigint(20) NOT NULL,
  `tenders_details_new_id` bigint(20) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` decimal(12,2) DEFAULT NULL,
  `item_cat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tenders_details_new_details`
--

INSERT INTO `tenders_details_new_details` (`id`, `tenders_details_new_id`, `item_id`, `qty`, `unit_price`, `item_cat`) VALUES
(77, 46, 159, 50, '100.00', 'Logistics'),
(78, 46, 158, 50, '120.00', 'Logistics'),
(79, 47, 151, 100, '100.00', 'Logistics'),
(80, 47, 150, 100, '120.00', 'Logistics'),
(81, 48, 156, 40, '230.00', 'Logistics'),
(82, 48, 155, 40, '230.00', 'Logistics'),
(83, 49, 9, 4, '300000.00', 'Vehicle');

-- --------------------------------------------------------

--
-- Table structure for table `units_masters`
--

CREATE TABLE `units_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisions_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(11) DEFAULT NULL,
  `unit_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units_masters`
--

INSERT INTO `units_masters` (`id`, `divisions_name`, `division_id`, `unit_name`, `unit_code`, `status`, `created_at`, `updated_at`) VALUES
(14, '', 32, 'Bhupalpally', NULL, 1, NULL, NULL),
(13, '', 32, 'Peddapalli', NULL, 1, NULL, NULL),
(12, '', 31, 'Asifabad ', NULL, 1, NULL, NULL),
(11, '', 31, 'Mancherial ', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unserviceable_list`
--

CREATE TABLE `unserviceable_list` (
  `id` int(11) NOT NULL,
  `fs_name` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `fs_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `mode` varchar(255) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `entry_date` date DEFAULT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `auction` int(1) NOT NULL,
  `auction_amount` varchar(255) NOT NULL,
  `treasury_deposit_details` varchar(255) NOT NULL,
  `challan` text NOT NULL,
  `condemnation` int(1) NOT NULL,
  `date_of_entry` datetime NOT NULL DEFAULT current_timestamp(),
  `disbursed` int(1) NOT NULL,
  `lot_number` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unserviceable_list`
--

INSERT INTO `unserviceable_list` (`id`, `fs_name`, `item_name`, `fs_id`, `item_id`, `mode`, `unit_id`, `qty`, `entry_date`, `remarks`, `status`, `updated_by`, `auction`, `auction_amount`, `treasury_deposit_details`, `challan`, `condemnation`, `date_of_entry`, `disbursed`, `lot_number`) VALUES
(23, NULL, NULL, 299, 151, '1', 11, 1, '2022-02-07', 'damanged prodcut received', 1, 'DFO Mancherial', 0, '', '', '', 0, '2022-02-06 12:15:42', 0, ''),
(24, NULL, NULL, 301, 143, '1', 11, 25, '2022-01-01', 'damaged by useage', 1, 'DFO Mancherial', 0, '', '', '', 0, '2022-02-06 12:21:30', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fs_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loginid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int(11) DEFAULT NULL COMMENT '1=officer, 2 = emp',
  `login_role` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verified_opt` int(11) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hidden_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mto_mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_units` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile_no`, `photo`, `district`, `fs_name`, `loginid`, `user_type`, `login_role`, `email_verified_at`, `verified_opt`, `password`, `hidden_user`, `mto_mobile_no`, `access_units`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'superadmin@logistics.com', '9588429308', '', '', '', 'superadmin', 1, 10, '2021-08-31 18:30:00', 1, '1234', NULL, NULL, NULL, 1, NULL, NULL, NULL),
(81, 'AEO', NULL, '99999', '', NULL, NULL, 'aeo', 1, 5, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 16:52:16', NULL),
(82, 'AO Admin', NULL, '99884', '', NULL, NULL, 'AO_Admin', 1, 7, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 16:52:36', NULL),
(83, 'RFO', NULL, '998848', '', NULL, NULL, 'RFO', 1, 3, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 16:53:00', NULL),
(84, 'DFO Mancherial', NULL, '998884', '', NULL, '', 'dfo_mancherial', 1, 4, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 16:55:58', NULL),
(87, 'DFO Peddapally', NULL, '983838', '', NULL, '', 'dfo_peddapally', 1, 4, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 17:37:04', NULL),
(88, 'FSO Mancherial', NULL, '94994', '', NULL, '298', 'FSO_Mancherial', 1, 8, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 18:17:02', NULL),
(89, 'FSO Jannaram', NULL, '99484', '', NULL, '299', 'FSO_Jannaram', 1, 8, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 18:17:42', NULL),
(90, 'FSO Bellampally', NULL, '83883', '', NULL, '300', 'FSO_Bellampally', 1, 8, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 18:18:17', NULL),
(91, 'FSO Chennur', NULL, '43434', '', NULL, '301', 'FSO_Chennur', 1, 8, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 18:18:50', NULL),
(92, 'FSO Asifabad', NULL, '93883', '', NULL, '302', 'SFO_Asifabad', 1, 8, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 18:19:31', NULL),
(94, 'FSO Pedapalli', NULL, '34534', '', NULL, '304', 'FSO_Pedapalli', 1, 8, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 18:20:35', NULL),
(95, 'FSO Manthani', NULL, '873', '', NULL, '305', 'FSO_Manthani', 1, 8, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 18:21:10', NULL),
(96, 'FSO Godavarikhani', NULL, '4833', '', NULL, '306', 'FSO_Godavarikhani', 1, 8, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 18:21:38', NULL),
(97, 'FSO Bhupalapalli ', NULL, '34543', '', NULL, '307', 'FSO_Bhupalapalli ', 1, 8, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 18:22:13', NULL),
(98, 'FSO Mulugu', NULL, '32423', '', NULL, '308', 'FSO_Mulugu', 1, 8, NULL, 1, '123456', NULL, NULL, NULL, 1, NULL, '2022-02-06 18:22:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_districts`
--

CREATE TABLE `users_districts` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_districts`
--

INSERT INTO `users_districts` (`id`, `user_id`, `district_id`) VALUES
(6, 84, 12),
(7, 84, 11),
(8, 85, 14),
(9, 85, 13),
(10, 0, 14),
(11, 0, 13),
(12, 87, 14),
(13, 87, 13),
(14, 88, 11),
(15, 89, 11),
(16, 90, 11),
(17, 91, 11),
(18, 92, 12),
(19, 0, 12),
(20, 94, 13),
(21, 95, 13),
(22, 96, 13),
(23, 97, 14),
(24, 98, 14);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `groupname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `name`, `status`, `created_at`, `updated_at`, `groupname`) VALUES
(1, 'DETAILS BY CO', 1, NULL, NULL, 'Tendors'),
(2, 'STOCK RECEIVED', 1, NULL, NULL, 'Tendors'),
(3, 'LCI REPORT UPDATE', 1, NULL, NULL, 'Tendors'),
(4, 'DISTRIBUTION DETAILS', 1, NULL, NULL, 'Tendors'),
(5, 'MAKE', 1, NULL, NULL, 'Vehicle master'),
(6, 'TYPE', 1, NULL, NULL, 'Vehicle master'),
(7, 'VARIANTS', 1, NULL, NULL, 'Vehicle master'),
(8, 'CATEGORY', 1, NULL, NULL, 'Vehicle master'),
(9, 'DESCRIPTION', 1, NULL, NULL, 'Vehicle master'),
(10, 'CONDEMINATION', 1, NULL, NULL, 'Vehicle master'),
(11, 'AUCTION', 1, NULL, NULL, 'Vehicle master'),
(52, 'QUATA ALLOTMENT VEHICLE WISE', 1, NULL, NULL, 'Vehicle Report'),
(13, 'DISTRIBUTION TO DISTRICT', 1, NULL, NULL, 'Logistics'),
(14, 'EXISTING STOCK ENTRY DIST.', 1, NULL, NULL, 'Logistics'),
(15, 'DISTRICT STOCK RECEIVE', 1, NULL, NULL, 'Logistics'),
(16, 'DISTRIBUTION TO FS', 1, NULL, NULL, 'Logistics'),
(17, 'FS STOCK UPDATE', 1, NULL, NULL, 'Logistics'),
(18, 'RECEIVE VEHICLES', 1, NULL, NULL, 'Vehicle'),
(19, 'EXISTING DIST. VEHICLES', 1, NULL, NULL, 'Vehicle'),
(20, 'VEHICLE DISTRIBUTION', 1, NULL, NULL, 'Vehicle'),
(21, 'FUEL', 1, NULL, NULL, 'Vehicle'),
(22, 'VEHICLE EXPENSES', 1, NULL, NULL, 'Vehicle'),
(23, 'REPAIRS', 1, NULL, NULL, 'Vehicle'),
(24, 'DIVISIONS', 1, NULL, NULL, 'Logistics Master'),
(25, 'DISTRICT', 1, NULL, NULL, 'Logistics Master'),
(26, 'UNSERVICEABLE', 1, NULL, NULL, 'Logistics Master'),
(27, 'FIRE STATIONS', 1, NULL, NULL, 'Logistics Master'),
(28, 'RANK', 1, NULL, NULL, 'Logistics Master'),
(29, 'CATEGORY MASTER', 1, NULL, NULL, 'Logistics Master'),
(30, 'ITEMS', 1, NULL, NULL, 'Logistics Master'),
(31, 'LCI OFFICERS', 1, NULL, NULL, 'Logistics Master'),
(32, 'ALL VEHICLE REPORTS', 1, NULL, NULL, 'Vehicle Report'),
(33, 'DIVISIONS WISE REPORTS', 1, NULL, NULL, 'Vehicle Report'),
(34, 'STATE WISE REPORTS', 1, NULL, NULL, 'Vehicle Report'),
(35, 'TRANSFER TO DISTRICT', 1, NULL, NULL, 'Vehicle Report'),
(36, 'UNIT TO UNIT VEHICLE TRANSFER', 1, NULL, NULL, 'Vehicle Report'),
(37, 'UNIT TO FS VEHICLE TRANSFER', 1, NULL, NULL, 'Vehicle Report'),
(53, 'QUATA ALLOTMENT DISTRICT WISE', 1, NULL, NULL, 'Vehicle Report'),
(39, 'ALL VEHICLE REPAIRS', 1, NULL, NULL, 'Vehicle Report'),
(40, 'ALL VEHICLE EXPENSES', 1, NULL, NULL, 'Vehicle Report'),
(41, 'RECEIVE STOCK REPORT', 1, NULL, NULL, 'Logistics Report'),
(42, 'DISTRICT AVAILABLE STOCK', 1, NULL, NULL, 'Logistics Report'),
(43, 'DIVISION AVAILABLE STOCK', 1, NULL, NULL, 'Logistics Report'),
(44, 'DIVISION WISE REPORTS', 1, NULL, NULL, 'Logistics Report'),
(45, 'STATE WISE LOGISTICS REPORTS', 1, NULL, NULL, 'Logistics Report'),
(46, 'UNSERVICABLE REPORTS', 1, NULL, NULL, 'Logistics Report'),
(47, 'FS WISE DISTRIBUTION', 1, NULL, NULL, 'Logistics Report'),
(48, 'USER', 1, NULL, NULL, 'USERS'),
(49, 'ROLES', 1, NULL, NULL, 'USERS'),
(50, 'ROLES & PERMISSIONS', 1, NULL, NULL, 'USERS'),
(51, 'EXISTING STOCK ENTRY FS', 1, NULL, NULL, 'Logistics'),
(54, 'Allotment', 1, NULL, NULL, 'Vehicle Distribution'),
(55, 'Unit to Unit Allotment', 1, NULL, NULL, 'Vehicle Distribution'),
(56, 'Unit to FSAllotment', 1, NULL, NULL, 'Vehicle Distribution'),
(57, 'Quoata Allotment(V)', 1, NULL, NULL, 'Vehicle Fuel Allotment'),
(58, 'Quoata Allotment(U)', 1, NULL, NULL, 'Vehicle Fuel Allotment'),
(59, 'Additional Quoata(V)', 1, NULL, NULL, 'Vehicle Fuel Allotment'),
(60, 'Additional Quoata(U) ', 1, NULL, NULL, 'Vehicle Fuel Allotment'),
(61, 'Fuel Issues', 1, NULL, NULL, 'Vehicle Fuel Allotment'),
(62, 'DISTRICT STOCK RECEIVE', 1, NULL, NULL, 'Vehicle'),
(63, 'FS AVAILABLE STOCK', 1, NULL, NULL, 'Logistics Report'),
(64, 'FS STOCK RECEIVE', 1, NULL, NULL, 'Vehicle'),
(65, 'EXISTING FS VEHICLES', 1, NULL, NULL, 'Vehicle'),
(66, 'DIST. VEHICLES STOCK', 1, NULL, NULL, 'Vehicle Report'),
(67, 'FS VEHICLES STOCK', 1, NULL, NULL, 'Vehicle Report'),
(68, 'Condemination', 1, NULL, NULL, 'Logistics'),
(69, 'Auction', 1, NULL, NULL, 'Logistics');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_access_master`
--

CREATE TABLE `user_role_access_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role_access_master`
--

INSERT INTO `user_role_access_master` (`id`, `name`, `roles`, `status`, `created_at`, `updated_at`) VALUES
(4, 'DFO', 'auctions_logistics,condemnation_logistics,distributiontofs,districtcostockupdate,localrecivestockbytender,category,fsstations,kits,kitseligibilty,ranks,unserviceable,unittounitvehicletransferadvnce,allvehiclesreport,qallvhclewise,qalldistrictewise,unittofstransfers,allvehiclesexpenses,allvehiclesrepairs,districtavailableStock,fswiseDistribution,recievedStockFromCO,diststockreceipt,unservicibles,fuelissues,quotaallotment,vhtransfers,unittofs,vhexpanses,repairs,vhlist,exitingvhlist,auctions,vhcategory,condemnation,vhdescription,vhmake,vhtype,vhvarient', 1, NULL, NULL),
(3, 'RFO', 'localpurchases,costockupdate,distributiontodist,districtcostockupdate,recivestockbytender,category,districts,divisions,employees,employeesrole,fsstations,kits,kitseligibilty,lciemployess,ranks,unserviceable,tenderdetailsbyco,tenderdistributiondetails,districtavailableStock,fswiseDistribution,receieveStockReport,recievedStockFromCO,unservicibles,fuelissues,quotaallotment,vhtransfers,unittofs,unittounitalotment,vhexpanses,repairs,vhlist,auctions,vhcategory,condemnation,vhdescription,vhmake,vhtype,vhvarient', 1, NULL, NULL),
(5, 'AEO', 'distributiontodist,recivestockbytender,allvehiclesreport,transferstoDistr,unittounitvehicletransfer,lcireportupdate,receieveStockReport,recievedStockFromCO,diststockreceipt,allotment,vhtransfers,vhlist', 1, NULL, NULL),
(7, 'AO Admin', 'auctions_logistics,condemnation_logistics,localpurchases,costockupdate,distributiontodist,distributiontofs,districtcostockupdate,localrecivestockbytender,recivestockbytender,lciemployess,unittounitvehicletransferadvnce,allvehiclesreport,qallvhclewise,qalldistrictewise,transferstoDistr,unittofstransfers,unittounitvehicletransfer,allvehiclesexpenses,allvehiclesrepairs,tenderdetailsbyco,tenderdistributiondetails,districtavailableStock,fswiseDistribution,receieveStockReport,recievedStockFromCO,diststockreceipt,unservicibles,allotment,quotaallotment,vhtransfers,unittofs,unittounitalotment,vhlist', 1, NULL, NULL),
(8, 'FSO', 'localrecivestockbytender,FScostockupdate,category,kits,unserviceable,allvehiclesreport,allvehiclesexpenses,allvehiclesrepairs,receieveStockReport,unservicibles,fuelissues,vhexpanses,repairs,exitingvhlist,vhcategory,vhdescription,vhmake,vhtype,vhvarient', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_masters`
--

CREATE TABLE `user_role_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `access_pages` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role_masters`
--

INSERT INTO `user_role_masters` (`id`, `name`, `status`, `created_at`, `updated_at`, `access_pages`) VALUES
(4, 'DFO', 1, NULL, NULL, 'auctions_logistics,condemnation_logistics,distributiontofs,districtcostockupdate,localrecivestockbytender,category,fsstations,kits,kitseligibilty,ranks,unserviceable,unittounitvehicletransferadvnce,allvehiclesreport,qallvhclewise,qalldistrictewise,unittofstransfers,allvehiclesexpenses,allvehiclesrepairs,districtavailableStock,fswiseDistribution,recievedStockFromCO,diststockreceipt,unservicibles,fuelissues,quotaallotment,vhtransfers,unittofs,vhexpanses,repairs,vhlist,exitingvhlist,auctions,vhcategory,condemnation,vhdescription,vhmake,vhtype,vhvarient'),
(3, 'RFO', 1, NULL, NULL, 'localpurchases,costockupdate,distributiontodist,districtcostockupdate,recivestockbytender,category,districts,divisions,employees,employeesrole,fsstations,kits,kitseligibilty,lciemployess,ranks,unserviceable,tenderdetailsbyco,tenderdistributiondetails,districtavailableStock,fswiseDistribution,receieveStockReport,recievedStockFromCO,unservicibles,fuelissues,quotaallotment,vhtransfers,unittofs,unittounitalotment,vhexpanses,repairs,vhlist,auctions,vhcategory,condemnation,vhdescription,vhmake,vhtype,vhvarient'),
(5, 'AEO', 1, NULL, NULL, 'distributiontodist,recivestockbytender,allvehiclesreport,transferstoDistr,unittounitvehicletransfer,lcireportupdate,receieveStockReport,recievedStockFromCO,diststockreceipt,allotment,vhtransfers,vhlist'),
(7, 'AO Admin', 1, NULL, NULL, 'auctions_logistics,condemnation_logistics,localpurchases,costockupdate,distributiontodist,distributiontofs,districtcostockupdate,localrecivestockbytender,recivestockbytender,lciemployess,unittounitvehicletransferadvnce,allvehiclesreport,qallvhclewise,qalldistrictewise,transferstoDistr,unittofstransfers,unittounitvehicletransfer,allvehiclesexpenses,allvehiclesrepairs,tenderdetailsbyco,tenderdistributiondetails,districtavailableStock,fswiseDistribution,receieveStockReport,recievedStockFromCO,diststockreceipt,unservicibles,allotment,quotaallotment,vhtransfers,unittofs,unittounitalotment,vhlist'),
(6, 'Director General', 1, NULL, NULL, 'allvehiclesreport,qallvhclewise,qalldistrictewise,transferstoDistr,unittofstransfers,unittounitvehicletransfer,allvehiclesexpenses,allvehiclesrepairs,districtavailableStock,districtStockLists,fswiseDistribution,receieveStockReport,recievedStockFromCO,diststockreceipt,unservicibles,createUserRole,createUserRoleAccess'),
(8, 'FSO', 1, NULL, NULL, 'localrecivestockbytender,FScostockupdate,category,kits,unserviceable,allvehiclesreport,allvehiclesexpenses,allvehiclesrepairs,receieveStockReport,unservicibles,fuelissues,vhexpanses,repairs,exitingvhlist,vhcategory,vhdescription,vhmake,vhtype,vhvarient'),
(10, 'SUPER ADMIN', 1, NULL, NULL, ''),
(12, 'writer', 1, NULL, NULL, ''),
(13, 'Dt_Director', 1, NULL, NULL, ''),
(14, 'test_user', 1, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_permissions`
--

CREATE TABLE `user_role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `view` tinyint(4) DEFAULT NULL,
  `add` tinyint(4) DEFAULT NULL,
  `edit` tinyint(4) DEFAULT NULL,
  `delete` tinyint(4) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role_permissions`
--

INSERT INTO `user_role_permissions` (`id`, `role_id`, `permission_id`, `view`, `add`, `edit`, `delete`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 0, 0, NULL, NULL, 1, NULL, NULL),
(2, 7, 1, 1, 1, 1, NULL, 1, NULL, NULL),
(3, 7, 3, 0, 0, NULL, NULL, 1, NULL, NULL),
(4, 7, 4, 1, 0, NULL, NULL, 1, NULL, NULL),
(5, 7, 5, 1, 1, 1, 1, 1, NULL, NULL),
(6, 8, 1, 0, NULL, NULL, NULL, 1, NULL, NULL),
(7, 8, 4, NULL, NULL, NULL, 0, 1, NULL, NULL),
(8, 10, 48, 1, 1, 1, 1, 1, NULL, NULL),
(9, 10, 49, 1, 1, 1, 1, 1, NULL, NULL),
(10, 10, 50, 1, 1, 1, 1, 1, NULL, NULL),
(11, 12, 5, 1, 1, 1, 1, 1, NULL, NULL),
(12, 12, 6, 1, 1, 1, 1, 1, NULL, NULL),
(13, 10, 47, 1, 1, 1, 1, 1, NULL, NULL),
(14, 10, 45, 1, 1, 1, 1, 1, NULL, NULL),
(15, 10, 46, 1, 1, 1, 1, 1, NULL, NULL),
(16, 10, 43, 1, 1, 1, 1, 1, NULL, NULL),
(17, 10, 44, 1, 1, 1, 1, 1, NULL, NULL),
(18, 10, 42, 1, 1, 1, 1, 1, NULL, NULL),
(19, 10, 41, 1, 1, 1, 1, 1, NULL, NULL),
(20, 10, 40, 1, 1, 1, 1, 1, NULL, NULL),
(21, 10, 39, 1, 1, 1, 1, 1, NULL, NULL),
(22, 10, 38, 1, NULL, NULL, NULL, 1, NULL, NULL),
(23, 13, 1, 0, NULL, NULL, NULL, 1, NULL, NULL),
(24, 13, 2, 0, NULL, NULL, NULL, 1, NULL, NULL),
(25, 13, 3, 0, NULL, NULL, NULL, 1, NULL, NULL),
(26, 13, 4, 0, NULL, NULL, NULL, 1, NULL, NULL),
(27, 13, 5, 0, 0, NULL, NULL, 1, NULL, NULL),
(28, 13, 6, 0, 0, NULL, NULL, 1, NULL, NULL),
(29, 13, 7, 0, NULL, NULL, NULL, 1, NULL, NULL),
(30, 13, 8, 0, NULL, NULL, NULL, 1, NULL, NULL),
(31, 13, 9, 0, NULL, NULL, NULL, 1, NULL, NULL),
(32, 13, 10, 0, NULL, NULL, NULL, 1, NULL, NULL),
(33, 13, 11, 0, NULL, NULL, NULL, 1, NULL, NULL),
(34, 13, 13, 0, NULL, NULL, NULL, 1, NULL, NULL),
(35, 13, 14, 0, NULL, NULL, NULL, 1, NULL, NULL),
(36, 13, 15, 0, NULL, NULL, NULL, 1, NULL, NULL),
(37, 13, 16, 0, NULL, NULL, NULL, 1, NULL, NULL),
(38, 13, 17, 0, NULL, NULL, NULL, 1, NULL, NULL),
(39, 13, 51, 0, NULL, NULL, NULL, 1, NULL, NULL),
(40, 13, 21, 0, NULL, NULL, NULL, 1, NULL, NULL),
(41, 13, 19, 0, NULL, NULL, NULL, 1, NULL, NULL),
(42, 13, 20, 0, NULL, NULL, NULL, 1, NULL, NULL),
(43, 13, 18, 0, NULL, NULL, NULL, 1, NULL, NULL),
(44, 13, 22, 0, NULL, NULL, NULL, 1, NULL, NULL),
(45, 13, 23, 0, NULL, NULL, NULL, 1, NULL, NULL),
(46, 13, 32, 1, NULL, NULL, NULL, 1, NULL, NULL),
(47, 13, 33, 1, NULL, NULL, NULL, 1, NULL, NULL),
(48, 13, 34, 1, NULL, NULL, NULL, 1, NULL, NULL),
(49, 13, 35, 1, NULL, NULL, NULL, 1, NULL, NULL),
(50, 13, 36, 1, NULL, NULL, NULL, 1, NULL, NULL),
(51, 13, 37, 1, NULL, NULL, NULL, 1, NULL, NULL),
(52, 13, 38, 1, NULL, NULL, NULL, 1, NULL, NULL),
(53, 13, 39, 1, NULL, NULL, NULL, 1, NULL, NULL),
(54, 13, 40, 1, NULL, NULL, NULL, 1, NULL, NULL),
(55, 13, 43, 1, NULL, NULL, NULL, 1, NULL, NULL),
(56, 13, 41, 1, NULL, NULL, NULL, 1, NULL, NULL),
(57, 13, 42, 1, NULL, NULL, NULL, 1, NULL, NULL),
(58, 13, 44, 1, NULL, NULL, NULL, 1, NULL, NULL),
(59, 13, 45, 1, NULL, NULL, NULL, 1, NULL, NULL),
(60, 13, 46, 1, NULL, NULL, NULL, 1, NULL, NULL),
(61, 13, 47, 1, NULL, NULL, NULL, 1, NULL, NULL),
(62, 13, 48, 0, NULL, NULL, NULL, 1, NULL, NULL),
(63, 13, 50, 0, NULL, NULL, NULL, 1, NULL, NULL),
(64, 13, 49, 0, NULL, NULL, NULL, 1, NULL, NULL),
(65, 10, 1, 1, 1, 1, 1, 1, NULL, NULL),
(66, 10, 2, 1, 1, 1, 1, 1, NULL, NULL),
(67, 10, 3, 1, 1, 1, 1, 1, NULL, NULL),
(68, 10, 4, 1, 1, 1, 1, 1, NULL, NULL),
(69, 10, 5, 1, 1, 1, 1, 1, NULL, NULL),
(70, 10, 6, 1, 1, 1, 1, 1, NULL, NULL),
(71, 10, 7, 1, 1, 1, 1, 1, NULL, NULL),
(72, 10, 8, 1, 1, 1, 1, 1, NULL, NULL),
(73, 10, 10, 1, 1, 1, 1, 1, NULL, NULL),
(74, 10, 9, 1, 1, 1, 1, 1, NULL, NULL),
(75, 10, 11, 1, 1, 1, 1, 1, NULL, NULL),
(76, 10, 52, 1, 1, 1, 1, 1, NULL, NULL),
(77, 10, 37, 1, 1, 1, 1, 1, NULL, NULL),
(78, 10, 35, 1, 1, 1, 1, 1, NULL, NULL),
(79, 10, 36, 1, 1, 1, 1, 1, NULL, NULL),
(80, 10, 33, 1, 1, 1, 1, 1, NULL, NULL),
(81, 10, 34, 1, 1, 1, 1, 1, NULL, NULL),
(82, 10, 32, 1, 1, 1, 1, 1, NULL, NULL),
(83, 10, 53, 1, 1, 1, 1, 1, NULL, NULL),
(84, 10, 13, 1, 1, 1, 1, 1, NULL, NULL),
(85, 10, 14, 1, 1, 1, 1, 1, NULL, NULL),
(86, 10, 15, 1, 1, 1, 1, 1, NULL, NULL),
(87, 10, 16, 1, 1, 1, 1, 1, NULL, NULL),
(88, 10, 17, 1, 1, 1, 1, 1, NULL, NULL),
(89, 10, 51, 1, 1, 1, 1, 1, NULL, NULL),
(90, 10, 18, 1, 1, 1, 1, 1, NULL, NULL),
(91, 10, 21, 1, 1, 1, 1, 1, NULL, NULL),
(92, 10, 19, 1, 1, 1, 1, 1, NULL, NULL),
(93, 10, 20, 1, 1, 1, 1, 1, NULL, NULL),
(94, 10, 22, 1, 1, 1, 1, 1, NULL, NULL),
(95, 10, 23, 1, 1, 1, 1, 1, NULL, NULL),
(96, 10, 24, 1, 1, 1, 1, 1, NULL, NULL),
(97, 10, 28, 1, 1, 1, 1, 1, NULL, NULL),
(98, 10, 26, 1, 1, 1, 1, 1, NULL, NULL),
(99, 10, 27, 1, 1, 1, 1, 1, NULL, NULL),
(100, 10, 25, 1, 1, 1, 1, 1, NULL, NULL),
(101, 10, 29, 1, 1, 1, 1, 1, NULL, NULL),
(102, 10, 30, 1, 1, 1, 1, 1, NULL, NULL),
(103, 10, 31, 1, 1, 1, 1, 1, NULL, NULL),
(104, 10, 54, 1, 1, 1, 1, 1, NULL, NULL),
(105, 10, 55, 1, 1, 1, 1, 1, NULL, NULL),
(106, 10, 56, 1, 1, 1, 1, 1, NULL, NULL),
(107, 10, 57, 1, 1, 1, 1, 1, NULL, NULL),
(108, 10, 58, 1, 1, 1, 1, 1, NULL, NULL),
(109, 10, 59, 1, 1, 1, 1, 1, NULL, NULL),
(110, 10, 60, 1, 1, 1, 1, 1, NULL, NULL),
(111, 10, 61, 1, 1, 1, 1, 1, NULL, NULL),
(112, 4, 52, 1, NULL, NULL, NULL, 1, NULL, NULL),
(113, 4, 32, 0, NULL, NULL, NULL, 1, NULL, NULL),
(114, 4, 33, 0, NULL, NULL, NULL, 1, NULL, NULL),
(115, 4, 34, 0, NULL, NULL, NULL, 1, NULL, NULL),
(116, 4, 35, 0, NULL, NULL, NULL, 1, NULL, NULL),
(117, 4, 36, 0, NULL, NULL, NULL, 1, NULL, NULL),
(118, 4, 37, 1, 1, 1, 1, 1, NULL, NULL),
(119, 4, 53, 0, NULL, NULL, NULL, 1, NULL, NULL),
(120, 4, 39, 0, NULL, NULL, NULL, 1, NULL, NULL),
(121, 4, 40, 0, NULL, NULL, NULL, 1, NULL, NULL),
(122, 4, 13, 0, 0, 0, 0, 1, NULL, NULL),
(123, 4, 14, 1, 1, 1, 1, 1, NULL, NULL),
(124, 4, 15, 1, 1, 1, 1, 1, NULL, NULL),
(125, 4, 16, 1, 1, 1, 1, 1, NULL, NULL),
(126, 4, 17, 0, NULL, NULL, NULL, 1, NULL, NULL),
(127, 4, 51, 0, NULL, NULL, NULL, 1, NULL, NULL),
(128, 4, 18, 0, 0, 0, 0, 1, NULL, NULL),
(129, 4, 19, 1, 1, 1, 1, 1, NULL, NULL),
(130, 4, 20, 1, 1, 1, 1, 1, NULL, NULL),
(131, 4, 21, 1, 1, 1, 1, 1, NULL, NULL),
(132, 4, 22, 1, 1, 1, 1, 1, NULL, NULL),
(133, 4, 23, 1, 1, 1, 1, 1, NULL, NULL),
(134, 4, 41, 0, 0, 0, 0, 1, NULL, NULL),
(135, 4, 42, 1, 1, 1, 1, 1, NULL, NULL),
(136, 4, 43, 0, NULL, NULL, NULL, 1, NULL, NULL),
(137, 4, 44, 0, NULL, NULL, NULL, 1, NULL, NULL),
(138, 4, 46, 1, 1, 1, 1, 1, NULL, NULL),
(139, 4, 56, 1, 1, 1, 1, 1, NULL, NULL),
(140, 4, 61, 1, 1, 1, 1, 1, NULL, NULL),
(141, 8, 17, 1, 1, 1, 1, 1, NULL, NULL),
(142, 8, 51, 1, 1, 1, 1, 1, NULL, NULL),
(143, 8, 23, 1, 1, 1, 1, 1, NULL, NULL),
(144, 8, 22, 1, 1, 1, 1, 1, NULL, NULL),
(145, 8, 19, 0, 0, 0, 0, 1, NULL, NULL),
(146, 8, 18, 0, 0, 0, 0, 1, NULL, NULL),
(147, 8, 61, 1, 1, 1, 1, 1, NULL, NULL),
(148, 4, 27, 1, 1, 1, 1, 1, NULL, NULL),
(149, 5, 2, 1, 1, 1, 1, 1, NULL, NULL),
(150, 5, 3, 1, 1, 1, 1, 1, NULL, NULL),
(151, 5, 4, 1, 1, 1, 1, 1, NULL, NULL),
(152, 8, 47, 0, 0, 0, 0, 1, NULL, NULL),
(153, 7, 13, 1, 1, 1, 1, 1, NULL, NULL),
(154, 7, 16, 1, 1, 1, 1, 1, NULL, NULL),
(155, 7, 41, 1, 0, 0, NULL, 1, NULL, NULL),
(156, 7, 42, 1, 0, 0, NULL, 1, NULL, NULL),
(157, 7, 43, 1, 0, 0, NULL, 1, NULL, NULL),
(158, 7, 44, 1, 0, 0, NULL, 1, NULL, NULL),
(159, 7, 45, 1, 0, 0, NULL, 1, NULL, NULL),
(160, 7, 46, 1, 0, NULL, NULL, 1, NULL, NULL),
(161, 7, 47, 1, 0, NULL, NULL, 1, NULL, NULL),
(162, 7, 61, 0, NULL, NULL, NULL, 1, NULL, NULL),
(163, 7, 6, 1, 1, 1, 1, 1, NULL, NULL),
(164, 7, 7, 1, 1, 1, 1, 1, NULL, NULL),
(165, 7, 10, 1, 1, 1, 1, 1, NULL, NULL),
(166, 7, 8, 1, 1, 1, 1, 1, NULL, NULL),
(167, 7, 9, 1, 1, 1, 1, 1, NULL, NULL),
(168, 7, 11, 1, 1, 1, 1, 1, NULL, NULL),
(169, 7, 40, 1, 0, 0, 0, 1, NULL, NULL),
(170, 7, 39, 1, 0, 0, 0, 1, NULL, NULL),
(171, 7, 53, 1, 0, 0, 0, 1, NULL, NULL),
(172, 7, 37, 1, 0, 0, 0, 1, NULL, NULL),
(173, 7, 36, 1, 0, 0, 0, 1, NULL, NULL),
(174, 7, 34, 1, 0, 0, 0, 1, NULL, NULL),
(175, 7, 32, 1, 0, 0, 0, 1, NULL, NULL),
(176, 7, 33, 1, 0, 0, 0, 1, NULL, NULL),
(177, 7, 35, 1, 0, 0, 0, 1, NULL, NULL),
(178, 7, 52, 1, 0, 0, 0, 1, NULL, NULL),
(179, 7, 18, 0, NULL, NULL, NULL, 1, NULL, NULL),
(180, 7, 20, 1, 1, 1, 1, 1, NULL, NULL),
(181, 7, 25, 1, 1, 1, 1, 1, NULL, NULL),
(182, 7, 24, 1, 1, 1, 1, 1, NULL, NULL),
(183, 7, 26, 1, 1, 1, 1, 1, NULL, NULL),
(184, 7, 27, 1, 1, 1, 1, 1, NULL, NULL),
(185, 7, 28, 1, 1, 1, 1, 1, NULL, NULL),
(186, 7, 29, 1, 1, 1, 1, 1, NULL, NULL),
(187, 7, 31, 1, 1, 1, 1, 1, NULL, NULL),
(188, 7, 30, 1, 1, 1, 1, 1, NULL, NULL),
(189, 7, 54, 1, 1, 1, 1, 1, NULL, NULL),
(190, 7, 55, 1, 1, 1, 1, 1, NULL, NULL),
(191, 7, 56, 0, 0, 0, 0, 1, NULL, NULL),
(192, 7, 59, NULL, 0, NULL, NULL, 1, NULL, NULL),
(193, 5, 18, 1, 1, 1, 1, 1, NULL, NULL),
(194, 5, 20, 1, 1, 1, 1, 1, NULL, NULL),
(195, 3, 32, 1, NULL, NULL, NULL, 1, NULL, NULL),
(196, 3, 33, 1, NULL, NULL, NULL, 1, NULL, NULL),
(197, 3, 34, 1, NULL, NULL, NULL, 1, NULL, NULL),
(198, 3, 35, 1, NULL, NULL, NULL, 1, NULL, NULL),
(199, 3, 36, 1, NULL, NULL, NULL, 1, NULL, NULL),
(200, 3, 37, 1, NULL, NULL, NULL, 1, NULL, NULL),
(201, 3, 39, 1, NULL, NULL, NULL, 1, NULL, NULL),
(202, 3, 40, 1, NULL, NULL, NULL, 1, NULL, NULL),
(203, 3, 13, 0, NULL, NULL, NULL, 1, NULL, NULL),
(204, 3, 14, 0, NULL, NULL, NULL, 1, NULL, NULL),
(205, 3, 16, 0, NULL, NULL, NULL, 1, NULL, NULL),
(206, 3, 15, 0, NULL, NULL, NULL, 1, NULL, NULL),
(207, 3, 17, 0, NULL, NULL, NULL, 1, NULL, NULL),
(208, 3, 51, 0, NULL, NULL, NULL, 1, NULL, NULL),
(209, 3, 18, 0, NULL, NULL, NULL, 1, NULL, NULL),
(210, 3, 19, 0, NULL, NULL, NULL, 1, NULL, NULL),
(211, 3, 20, 0, NULL, NULL, NULL, 1, NULL, NULL),
(212, 3, 21, 0, NULL, NULL, NULL, 1, NULL, NULL),
(213, 3, 22, 0, NULL, NULL, NULL, 1, NULL, NULL),
(214, 3, 23, 0, NULL, NULL, NULL, 1, NULL, NULL),
(215, 3, 41, 1, NULL, NULL, NULL, 1, NULL, NULL),
(216, 3, 42, 1, NULL, NULL, NULL, 1, NULL, NULL),
(217, 3, 43, 1, NULL, NULL, NULL, 1, NULL, NULL),
(218, 3, 44, 1, NULL, NULL, NULL, 1, NULL, NULL),
(219, 3, 45, 1, NULL, NULL, NULL, 1, NULL, NULL),
(220, 3, 46, 1, NULL, NULL, NULL, 1, NULL, NULL),
(221, 3, 47, 1, NULL, NULL, NULL, 1, NULL, NULL),
(222, 3, 54, 1, NULL, NULL, NULL, 1, NULL, NULL),
(223, 3, 55, 1, NULL, NULL, NULL, 1, NULL, NULL),
(224, 3, 56, 1, NULL, NULL, NULL, 1, NULL, NULL),
(225, 14, 4, 1, 1, NULL, NULL, 1, NULL, NULL),
(226, 14, 3, 1, 1, NULL, NULL, 1, NULL, NULL),
(227, 14, 2, 1, 1, NULL, NULL, 1, NULL, NULL),
(228, 14, 1, 1, 1, NULL, NULL, 1, NULL, NULL),
(229, 5, 13, 1, 1, NULL, NULL, 1, NULL, NULL),
(230, 5, 32, 1, NULL, NULL, NULL, 1, NULL, NULL),
(231, 5, 33, 1, NULL, NULL, NULL, 1, NULL, NULL),
(232, 5, 34, 1, NULL, NULL, NULL, 1, NULL, NULL),
(233, 5, 35, 1, NULL, NULL, NULL, 1, NULL, NULL),
(234, 5, 36, 1, NULL, NULL, NULL, 1, NULL, NULL),
(235, 5, 37, 1, NULL, NULL, NULL, 1, NULL, NULL),
(236, 5, 41, 1, NULL, NULL, NULL, 1, NULL, NULL),
(237, 5, 42, 1, NULL, NULL, NULL, 1, NULL, NULL),
(238, 5, 43, 1, NULL, NULL, NULL, 1, NULL, NULL),
(239, 5, 44, 1, NULL, NULL, NULL, 1, NULL, NULL),
(240, 5, 45, 1, NULL, NULL, NULL, 1, NULL, NULL),
(241, 5, 47, 1, NULL, NULL, NULL, 1, NULL, NULL),
(242, 5, 54, 1, NULL, NULL, NULL, 1, NULL, NULL),
(243, 5, 55, 1, 1, NULL, NULL, 1, NULL, NULL),
(244, 5, 56, 1, 1, NULL, NULL, 1, NULL, NULL),
(245, 10, 62, 1, 1, 1, 1, 1, NULL, NULL),
(246, 4, 62, 1, NULL, NULL, NULL, 1, NULL, NULL),
(247, 8, 26, 1, 1, 1, 1, 1, NULL, NULL),
(248, 8, 46, 1, 1, 1, 1, 1, NULL, NULL),
(249, 4, 26, 1, 1, 1, 1, 1, NULL, NULL),
(250, 10, 63, 1, 1, 1, 1, 1, NULL, NULL),
(251, 4, 63, 1, 1, 1, 1, 1, NULL, NULL),
(252, 8, 63, 1, 1, 1, 1, 1, NULL, NULL),
(253, 8, 21, 1, NULL, NULL, NULL, 1, NULL, NULL),
(254, 4, 47, 1, NULL, NULL, NULL, 1, NULL, NULL),
(255, 3, 52, 1, NULL, NULL, NULL, 1, NULL, NULL),
(256, 3, 53, 1, NULL, NULL, NULL, 1, NULL, NULL),
(257, 3, 63, 1, NULL, NULL, NULL, 1, NULL, NULL),
(258, 13, 53, 1, NULL, NULL, NULL, 1, NULL, NULL),
(259, 13, 52, 1, NULL, NULL, NULL, 1, NULL, NULL),
(260, 13, 63, 1, NULL, NULL, NULL, 1, NULL, NULL),
(261, 7, 63, 1, NULL, NULL, NULL, 1, NULL, NULL),
(262, 7, 48, 1, NULL, NULL, NULL, 1, NULL, NULL),
(263, 4, 57, 1, 1, 1, 1, 1, NULL, NULL),
(264, 4, 58, 1, 1, 1, 1, 1, NULL, NULL),
(265, 10, 64, 1, 1, 1, 1, 1, NULL, NULL),
(266, 8, 64, 1, 1, 1, 1, 1, NULL, NULL),
(267, 8, 65, 1, 1, 1, 1, 1, NULL, NULL),
(268, 10, 66, 1, 1, 1, 1, 1, NULL, NULL),
(269, 10, 67, 1, 1, 1, 1, 1, NULL, NULL),
(270, 10, 68, 1, 1, 1, 1, 1, NULL, NULL),
(271, 10, 69, 1, 1, 1, 1, 1, NULL, NULL),
(272, 8, 67, 1, 1, 1, 1, 1, NULL, NULL),
(273, 4, 66, 1, 1, 1, 1, 1, NULL, NULL),
(274, 4, 10, 1, 1, 1, 1, 1, NULL, NULL),
(275, 4, 11, 1, 1, 1, 1, 1, NULL, NULL),
(276, 4, 68, 1, 1, 1, 1, 1, NULL, NULL),
(277, 4, 69, 1, 1, 1, 1, 1, NULL, NULL),
(278, 8, 10, 1, 1, 1, 1, 1, NULL, NULL),
(279, 8, 11, 0, 0, 0, 0, 1, NULL, NULL),
(280, 8, 5, 0, NULL, NULL, NULL, 1, NULL, NULL),
(281, 8, 6, 0, NULL, NULL, NULL, 1, NULL, NULL),
(282, 8, 7, 0, NULL, NULL, NULL, 1, NULL, NULL),
(283, 8, 8, 0, NULL, NULL, NULL, 1, NULL, NULL),
(284, 8, 9, 0, NULL, NULL, NULL, 1, NULL, NULL),
(285, 4, 64, 0, NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicled`
--

CREATE TABLE `vehicled` (
  `vhId` int(10) UNSIGNED NOT NULL,
  `trno` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `vhno` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `allotedUnit` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `allotedFS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vhmake` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vhmodel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vhsubmodel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vhType` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vhCat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fuelType` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vBody` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vmYear` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chassisNo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vgroup` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vDesType` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vUsage` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vhidNo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fuelTankC` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reservFuel` int(5) DEFAULT NULL,
  `vhKMPL` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `engineNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boreStroke` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noOfcylinders` int(2) DEFAULT NULL,
  `seatCapacity` int(2) DEFAULT NULL,
  `cuMeterR` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bhp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeOfDrive` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goDate` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invNo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vhPurchaseFrom` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dlrName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dlrMobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `poNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `poDate` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliveryDt` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiryDt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CostVh` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taxType` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taxpercent` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taxpaidAmt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rcvalidDate` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stockLedgerNo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pageNo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slNo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('A','C','S') COLLATE utf8_unicode_ci DEFAULT NULL,
  `E3cr_date` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `E3modi_date` datetime DEFAULT current_timestamp(),
  `E2modi_date` datetime DEFAULT current_timestamp(),
  `BreakFluid` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oilSpecNo` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `piston_displacement` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `financial_year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rc_book` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `survey_letter` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehicle_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `present_condition` int(255) DEFAULT 0 COMMENT '1=Road worthy,2=un roadworthy',
  `gps_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kmpl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_meter_reading` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age_of_vehicle` int(11) DEFAULT NULL,
  `condemnation` int(1) DEFAULT NULL,
  `auction` int(1) DEFAULT NULL,
  `auction_amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `treasury_deposit_details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lot_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tender_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `local_entry_unit_id` int(11) DEFAULT NULL,
  `local_entry_fs_id` int(11) DEFAULT NULL,
  `service_type` tinyint(4) DEFAULT NULL,
  `rc_upload` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicled`
--

INSERT INTO `vehicled` (`vhId`, `trno`, `vhno`, `allotedUnit`, `allotedFS`, `vhmake`, `vhmodel`, `vhsubmodel`, `vhType`, `vhCat`, `fuelType`, `vBody`, `vmYear`, `chassisNo`, `Vgroup`, `vDesType`, `vUsage`, `vhidNo`, `fuelTankC`, `reservFuel`, `vhKMPL`, `engineNo`, `keyNo`, `boreStroke`, `noOfcylinders`, `seatCapacity`, `cuMeterR`, `bhp`, `typeOfDrive`, `goNo`, `goDate`, `invNo`, `vhPurchaseFrom`, `dlrName`, `dlrMobile`, `poNo`, `poDate`, `deliveryDt`, `expiryDt`, `CostVh`, `taxType`, `taxpercent`, `taxpaidAmt`, `rcvalidDate`, `stockLedgerNo`, `pageNo`, `slNo`, `status`, `E3cr_date`, `E3modi_date`, `E2modi_date`, `BreakFluid`, `oilSpecNo`, `piston_displacement`, `amount`, `financial_year`, `updated_by`, `rc_book`, `survey_letter`, `vehicle_description`, `present_condition`, `gps_status`, `kmpl`, `current_meter_reading`, `age_of_vehicle`, `condemnation`, `auction`, `auction_amount`, `treasury_deposit_details`, `lot_number`, `tender_number`, `local_entry_unit_id`, `local_entry_fs_id`, `service_type`, `rc_upload`) VALUES
(1, '', 'TS09TR0001', '14', '', '50', '', '20', NULL, 'LMV', 'Diesel', NULL, NULL, '334543', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '456546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', '', '2022-01-01', '2022-01-01', '500000', NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '2022-02-08 07:03:20', '2022-02-08 07:03:20', NULL, NULL, NULL, NULL, NULL, 'AEO', '', '', '2', 0, 'Attached', '10', '100', 0, NULL, NULL, NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL),
(2, '', 'TS09TR0002', '13', '', '50', '', '20', NULL, 'LMV', 'Diesel', NULL, NULL, '09448', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '94848', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', '', '2022-01-01', '2022-01-01', '500000', NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '2022-02-08 07:06:39', '2022-02-08 07:06:39', NULL, NULL, NULL, NULL, NULL, 'AEO', '', '', '2', 0, 'Attached', '10', '100', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(3, '', 'TS09TR0003', '12', '', '50', '', '20', NULL, 'LMV', 'Diesel', NULL, NULL, '39939', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '938883', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', '', '2022-02-02', '2022-02-02', '', NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '2022-02-08 07:07:33', '2022-02-08 07:07:33', NULL, NULL, NULL, NULL, NULL, 'AEO', '', '', '2', 0, 'Attached', '10', '100', 0, NULL, NULL, NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL),
(4, '', 'TS09TR0004', '11', '', '50', '', '20', NULL, 'LMV', 'Diesel', NULL, NULL, '39293', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '948848', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', '', '2022-01-01', '2022-01-01', '600000', NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '2022-02-08 07:08:54', '2022-02-08 07:08:54', NULL, NULL, NULL, NULL, NULL, 'AEO', '', '', '2', 0, 'Attached', '10', '100', 0, NULL, NULL, NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL),
(5, '', 'TS09TR0006', NULL, NULL, '50', '', '20', NULL, 'LMV', 'Diesel', NULL, NULL, '547777', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '345346`', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', '', '2022-02-08', '2022-02-08', '400000', NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '2022-02-08 07:10:38', '2022-02-08 07:10:38', NULL, NULL, NULL, NULL, NULL, 'AEO', '', '', '2', 0, 'Attached', '10', '100', 0, NULL, NULL, NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL),
(6, '3243', '6565', NULL, NULL, '53', '22', '23', NULL, '9', 'Diesel', NULL, NULL, '777', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6766', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-11', '2022-02-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-10 00:03:19', '2022-02-10 00:03:19', NULL, NULL, NULL, NULL, NULL, 'FSO Jannaram', NULL, NULL, '9', 1, 'Not Attached', '86868', 'vcsavca', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 299, 2, NULL),
(18, '767', '67', NULL, NULL, '53', '22', '23', NULL, '3', 'Petrol', NULL, NULL, '766', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7767', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-11', '2022-02-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-10 02:17:12', '2022-02-10 02:17:12', NULL, NULL, NULL, NULL, NULL, 'FSO Jannaram', NULL, NULL, '2', 1, 'Attached', 'fff', '77676', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 299, 1, '2022/0209154712.png'),
(19, '7676', '7676', NULL, NULL, '53', '22', '23', NULL, '9', 'Petrol', NULL, NULL, '767', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7676767', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-18', '2022-02-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-10 02:28:09', '2022-02-10 02:28:09', NULL, NULL, NULL, NULL, NULL, 'FSO Jannaram', NULL, NULL, '2', 2, 'Not Attached', 'hfhfh', '7767', 0, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, 1, '2022/0209155809.png');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_allotment`
--

CREATE TABLE `vehicle_allotment` (
  `allotment_id` int(11) NOT NULL,
  `tender_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `vehicleno` varchar(255) NOT NULL,
  `allotment_no` varchar(255) NOT NULL,
  `unit_to` varchar(255) NOT NULL,
  `issue_date` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `unit_from` varchar(255) DEFAULT NULL,
  `fs` varchar(255) DEFAULT NULL,
  `fs_to` int(11) DEFAULT NULL,
  `order_upload` text NOT NULL,
  `status` int(1) NOT NULL,
  `date_of_entry` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(255) NOT NULL,
  `rv_number` varchar(255) DEFAULT NULL,
  `rv_date` date DEFAULT NULL,
  `rv_number_fs` varchar(255) DEFAULT NULL,
  `rv_date_fs` date DEFAULT NULL,
  `updated_by_fs` varchar(255) DEFAULT NULL,
  `fs_status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_allotment`
--

INSERT INTO `vehicle_allotment` (`allotment_id`, `tender_id`, `item_id`, `vehicleno`, `allotment_no`, `unit_to`, `issue_date`, `remarks`, `unit_from`, `fs`, `fs_to`, `order_upload`, `status`, `date_of_entry`, `updated_by`, `rv_number`, `rv_date`, `rv_number_fs`, `rv_date_fs`, `updated_by_fs`, `fs_status`) VALUES
(45, NULL, NULL, 'TS09TR0004', '', '11', '2022-02-08', 'mancherial transfer', NULL, '', NULL, 'uploads/62027bff7c524-', 1, '2022-02-08 07:19:43', '', NULL, NULL, NULL, NULL, NULL, NULL),
(44, NULL, NULL, 'TS09TR0003', '', '12', '2022-02-08', 'asifabad vehicle transfer', NULL, '', NULL, 'uploads/62027beb69f87-', 1, '2022-02-08 07:19:23', '', NULL, NULL, NULL, NULL, NULL, NULL),
(43, NULL, NULL, 'TS09TR0002', '2', '13', '2022-02-08', 'vehicle trasfered to peddapalli', NULL, '', NULL, 'uploads/62027bd18ff73-', 1, '2022-02-08 07:18:57', '', NULL, NULL, NULL, NULL, NULL, NULL),
(42, NULL, NULL, 'TS09TR0001', '2', '14', '2022-02-08', 'vehicle distributed to bhupalapally', NULL, '', NULL, 'uploads/62027bb5b0a38-', 1, '2022-02-08 07:18:29', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_body_type_masters`
--

CREATE TABLE `vehicle_body_type_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_body_type_masters`
--

INSERT INTO `vehicle_body_type_masters` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hard top', 1, NULL, NULL),
(2, 'Soft Top', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_category_masters`
--

CREATE TABLE `vehicle_category_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_category_masters`
--

INSERT INTO `vehicle_category_masters` (`id`, `vehicle_category`, `status`, `created_at`, `updated_at`) VALUES
(1, 'LMV', 1, NULL, NULL),
(2, 'HMV', 1, NULL, NULL),
(3, '2 wheeler', 1, NULL, NULL),
(10, 'Swift dzire', 1, NULL, NULL),
(9, 'AWT Vechicles', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_expanses`
--

CREATE TABLE `vehicle_expanses` (
  `id` int(11) NOT NULL,
  `vhno` varchar(255) NOT NULL,
  `financial_year` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `date_of_entry` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_make_masters`
--

CREATE TABLE `vehicle_make_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_make` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_make_masters`
--

INSERT INTO `vehicle_make_masters` (`id`, `vehicle_make`, `status`, `created_at`, `updated_at`) VALUES
(53, 'Maruti suzuki', 1, '2022-01-31 19:16:22', '2022-01-31 19:16:22'),
(52, 'Hero', 1, '2022-01-28 11:17:19', '2022-01-28 11:17:19'),
(51, 'TATA', 1, '2022-01-20 09:28:19', '2022-01-20 09:28:19'),
(50, 'Ashok Leyland', 1, '2021-12-05 09:16:18', '2021-12-05 09:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_repairs`
--

CREATE TABLE `vehicle_repairs` (
  `id` int(11) NOT NULL,
  `vehicle_number` varchar(255) DEFAULT NULL,
  `incharge` varchar(255) DEFAULT NULL,
  `repair_tpype` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `expansestillDate` varchar(255) DEFAULT NULL,
  `sanction_no` varchar(255) DEFAULT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `propsal_document` text DEFAULT NULL,
  `sanction_letter` text DEFAULT NULL,
  `form63` text DEFAULT NULL,
  `completion_report` text DEFAULT NULL,
  `standing_order` text DEFAULT NULL,
  `particulars_of_vehicle` text DEFAULT NULL,
  `check_list` text DEFAULT NULL,
  `quoation` text DEFAULT NULL,
  `comprative_report` text DEFAULT NULL,
  `work_order` text DEFAULT NULL,
  `invoice` text DEFAULT NULL,
  `advance_stamp_report` text DEFAULT NULL,
  `bank_details` text DEFAULT NULL,
  `condemnation_on_proposal` text DEFAULT NULL,
  `date_of_entry` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_repairs_old`
--

CREATE TABLE `vehicle_repairs_old` (
  `id` int(11) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `incharge` varchar(255) NOT NULL,
  `repair_tpype` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `expansestillDate` varchar(255) NOT NULL,
  `sanction_no` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `propsal_document` text NOT NULL,
  `sanction_letter` text NOT NULL,
  `form63` text NOT NULL,
  `completion_report` text NOT NULL,
  `standing_order` text NOT NULL,
  `particulars_of_vehicle` text NOT NULL,
  `check_list` text NOT NULL,
  `quoation` text NOT NULL,
  `comprative_report` text NOT NULL,
  `work_order` text NOT NULL,
  `invoice` text NOT NULL,
  `advance_stamp_report` text NOT NULL,
  `bank_details` text NOT NULL,
  `condemnation_on_proposal` text NOT NULL,
  `date_of_entry` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_schedule_masters`
--

CREATE TABLE `vehicle_schedule_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vhno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `km_interval` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type_masters`
--

CREATE TABLE `vehicle_type_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_make_masters_id` int(11) DEFAULT NULL,
  `vehicle_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_type_masters`
--

INSERT INTO `vehicle_type_masters` (`id`, `vehicle_make_masters_id`, `vehicle_type`, `status`, `created_at`, `updated_at`) VALUES
(23, 53, 'Swift Dzire', 1, '2022-01-31 19:17:06', '2022-01-31 19:17:06'),
(22, 52, 'Glamour', 1, '2022-01-28 11:17:30', '2022-01-28 11:17:30'),
(21, 51, 'LPT 1615', 1, '2022-01-20 09:31:30', '2022-01-20 09:31:30'),
(20, 50, 'Water Canon', 1, '2021-12-05 09:28:29', '2021-12-05 09:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_variant_masters`
--

CREATE TABLE `vehicle_variant_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_make_masters_id` int(11) DEFAULT NULL,
  `vehicle_type_masters_id` int(11) DEFAULT NULL,
  `vehicle_variant` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery_life_span` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery_voltage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery_ampere` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brake_fluid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tyre_life_span` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tyre_front_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tyre_rear_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_variant_masters`
--

INSERT INTO `vehicle_variant_masters` (`id`, `vehicle_make_masters_id`, `vehicle_type_masters_id`, `vehicle_variant`, `battery_life_span`, `battery_size`, `battery_voltage`, `battery_ampere`, `brake_fluid`, `tyre_life_span`, `tyre_front_size`, `tyre_rear_size`, `status`, `created_at`, `updated_at`) VALUES
(21, 52, 22, '125 CC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(22, 53, 23, 'Vdi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vhfuelissue`
--

CREATE TABLE `vhfuelissue` (
  `id` int(11) NOT NULL,
  `trxno` varchar(255) NOT NULL,
  `vhno` varchar(255) NOT NULL,
  `required` varchar(255) NOT NULL,
  `status` varchar(244) NOT NULL,
  `date_of_entry` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `condemnation_masters`
--
ALTER TABLE `condemnation_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `description_by_vehicle_type_masters`
--
ALTER TABLE `description_by_vehicle_type_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions_masters`
--
ALTER TABLE `divisions_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divisions_name` (`divisions_name`);

--
-- Indexes for table `employee_rank_masters`
--
ALTER TABLE `employee_rank_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `employee_role_masters`
--
ALTER TABLE `employee_role_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fsname_masters`
--
ALTER TABLE `fsname_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fs_name` (`fs_name`);

--
-- Indexes for table `fuel_quota_allotments`
--
ALTER TABLE `fuel_quota_allotments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `local_stock_fs`
--
ALTER TABLE `local_stock_fs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `local_stock_unit`
--
ALTER TABLE `local_stock_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistics_category_masters`
--
ALTER TABLE `logistics_category_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logistics_category` (`logistics_category`);

--
-- Indexes for table `logistics_kits_eligibilty_masters`
--
ALTER TABLE `logistics_kits_eligibilty_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistics_kits_for_local_masters`
--
ALTER TABLE `logistics_kits_for_local_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistics_kits_masters`
--
ALTER TABLE `logistics_kits_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistics_licofficers_masters`
--
ALTER TABLE `logistics_licofficers_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lci_officer` (`lci_officer`,`rank`);

--
-- Indexes for table `page_access`
--
ALTER TABLE `page_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recivestockbytender`
--
ALTER TABLE `recivestockbytender`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `recivestockbytender_new`
--
ALTER TABLE `recivestockbytender_new`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tenders_details`
--
ALTER TABLE `tenders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenders_details_new`
--
ALTER TABLE `tenders_details_new`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tender_number` (`tender_number`,`status`);

--
-- Indexes for table `tenders_details_new_details`
--
ALTER TABLE `tenders_details_new_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units_masters`
--
ALTER TABLE `units_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `division_id` (`division_id`,`unit_name`);

--
-- Indexes for table `unserviceable_list`
--
ALTER TABLE `unserviceable_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_no_unique` (`mobile_no`),
  ADD UNIQUE KEY `users_loginid_unique` (`loginid`);

--
-- Indexes for table `users_districts`
--
ALTER TABLE `users_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_access_master`
--
ALTER TABLE `user_role_access_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_masters`
--
ALTER TABLE `user_role_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user_role_permissions`
--
ALTER TABLE `user_role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicled`
--
ALTER TABLE `vehicled`
  ADD PRIMARY KEY (`vhId`),
  ADD UNIQUE KEY `vhno` (`vhno`),
  ADD KEY `trnoindex` (`trno`);

--
-- Indexes for table `vehicle_allotment`
--
ALTER TABLE `vehicle_allotment`
  ADD PRIMARY KEY (`allotment_id`);

--
-- Indexes for table `vehicle_body_type_masters`
--
ALTER TABLE `vehicle_body_type_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_category_masters`
--
ALTER TABLE `vehicle_category_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_category` (`vehicle_category`);

--
-- Indexes for table `vehicle_expanses`
--
ALTER TABLE `vehicle_expanses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_make_masters`
--
ALTER TABLE `vehicle_make_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_make` (`vehicle_make`);

--
-- Indexes for table `vehicle_repairs`
--
ALTER TABLE `vehicle_repairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_repairs_old`
--
ALTER TABLE `vehicle_repairs_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_schedule_masters`
--
ALTER TABLE `vehicle_schedule_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_type_masters`
--
ALTER TABLE `vehicle_type_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_make_masters_id` (`vehicle_make_masters_id`,`vehicle_type`);

--
-- Indexes for table `vehicle_variant_masters`
--
ALTER TABLE `vehicle_variant_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_make_masters_id` (`vehicle_make_masters_id`,`vehicle_type_masters_id`,`vehicle_variant`);

--
-- Indexes for table `vhfuelissue`
--
ALTER TABLE `vhfuelissue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `condemnation_masters`
--
ALTER TABLE `condemnation_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `description_by_vehicle_type_masters`
--
ALTER TABLE `description_by_vehicle_type_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `divisions_masters`
--
ALTER TABLE `divisions_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employee_rank_masters`
--
ALTER TABLE `employee_rank_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employee_role_masters`
--
ALTER TABLE `employee_role_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fsname_masters`
--
ALTER TABLE `fsname_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT for table `fuel_quota_allotments`
--
ALTER TABLE `fuel_quota_allotments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `local_stock_fs`
--
ALTER TABLE `local_stock_fs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `local_stock_unit`
--
ALTER TABLE `local_stock_unit`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logistics_category_masters`
--
ALTER TABLE `logistics_category_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logistics_kits_eligibilty_masters`
--
ALTER TABLE `logistics_kits_eligibilty_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logistics_kits_for_local_masters`
--
ALTER TABLE `logistics_kits_for_local_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `logistics_kits_masters`
--
ALTER TABLE `logistics_kits_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `logistics_licofficers_masters`
--
ALTER TABLE `logistics_licofficers_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `page_access`
--
ALTER TABLE `page_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `recivestockbytender`
--
ALTER TABLE `recivestockbytender`
  MODIFY `stock_id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `recivestockbytender_new`
--
ALTER TABLE `recivestockbytender_new`
  MODIFY `stock_id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `tenders_details`
--
ALTER TABLE `tenders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tenders_details_new`
--
ALTER TABLE `tenders_details_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tenders_details_new_details`
--
ALTER TABLE `tenders_details_new_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `units_masters`
--
ALTER TABLE `units_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `unserviceable_list`
--
ALTER TABLE `unserviceable_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users_districts`
--
ALTER TABLE `users_districts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_role_access_master`
--
ALTER TABLE `user_role_access_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role_masters`
--
ALTER TABLE `user_role_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_role_permissions`
--
ALTER TABLE `user_role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `vehicled`
--
ALTER TABLE `vehicled`
  MODIFY `vhId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vehicle_allotment`
--
ALTER TABLE `vehicle_allotment`
  MODIFY `allotment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `vehicle_body_type_masters`
--
ALTER TABLE `vehicle_body_type_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_category_masters`
--
ALTER TABLE `vehicle_category_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicle_expanses`
--
ALTER TABLE `vehicle_expanses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicle_make_masters`
--
ALTER TABLE `vehicle_make_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `vehicle_repairs`
--
ALTER TABLE `vehicle_repairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_repairs_old`
--
ALTER TABLE `vehicle_repairs_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicle_schedule_masters`
--
ALTER TABLE `vehicle_schedule_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_type_masters`
--
ALTER TABLE `vehicle_type_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vehicle_variant_masters`
--
ALTER TABLE `vehicle_variant_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vhfuelissue`
--
ALTER TABLE `vhfuelissue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
