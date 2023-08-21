-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2023 pada 08.23
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcr_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activitytype`
--

CREATE TABLE `activitytype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `breakdown`
--

CREATE TABLE `breakdown` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `breakdate` varchar(100) NOT NULL,
  `breakshift` varchar(100) NOT NULL,
  `breaktype` varchar(100) NOT NULL,
  `breakmodel` varchar(100) NOT NULL,
  `breakcnunit` varchar(100) NOT NULL,
  `bdawal` time NOT NULL,
  `bdakhir` time NOT NULL,
  `breaktotal` varchar(100) NOT NULL,
  `bdcategory` varchar(100) NOT NULL,
  `breakstatus` varchar(100) NOT NULL,
  `bddesc` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `breakdown`
--

INSERT INTO `breakdown` (`id`, `sitecode`, `breakdate`, `breakshift`, `breaktype`, `breakmodel`, `breakcnunit`, `bdawal`, `bdakhir`, `breaktotal`, `bdcategory`, `breakstatus`, `bddesc`, `created_at`, `updated_at`) VALUES
(1, 'BP', '2023-02-24', 'Shift-1', 'Bulldozer', 'D8R', 'BDCT08008', '06:30:00', '12:00:00', '5,30', 'BD Accident', 'BD', 'BD', '2023-02-24 02:49:41', '2023-02-24 02:49:41'),
(2, 'BP', '2023-02-28', 'Shift-1', 'Excavator', 'SL500', 'EXDS50002', '06:00:00', '06:00:00', '24.00', 'BD Accident', 'BD', 'BD', '2023-02-28 04:26:22', '2023-02-28 04:26:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cscode` varchar(255) NOT NULL,
  `csdescript` text NOT NULL,
  `cssaddress` text NOT NULL,
  `cstelp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datadrill`
--

CREATE TABLE `datadrill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dedicated`
--

CREATE TABLE `dedicated` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dedicated` varchar(100) NOT NULL,
  `dedicatedcode` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dedicated`
--

INSERT INTO `dedicated` (`id`, `dedicated`, `dedicatedcode`, `created_at`, `updated_at`) VALUES
(1, 'Waste Removal', '1', '0000-00-00 00:00:00', NULL),
(2, 'Coal Mining', '2', '0000-00-00 00:00:00', NULL),
(3, 'Coal Transport', '3', '0000-00-00 00:00:00', NULL),
(4, 'Support OB', '1', '0000-00-00 00:00:00', NULL),
(5, 'Support CM', '2', '0000-00-00 00:00:00', NULL),
(6, 'Support CT', '3', '0000-00-00 00:00:00', NULL),
(7, 'General Support', '1', '0000-00-00 00:00:00', NULL),
(8, 'Rental', '4', '0000-00-00 00:00:00', NULL),
(9, 'Spare', '1', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `downtimecategory`
--

CREATE TABLE `downtimecategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dtcategory` varchar(100) NOT NULL,
  `dtitemcategory` varchar(100) NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `downtimecategory`
--

INSERT INTO `downtimecategory` (`id`, `dtcategory`, `dtitemcategory`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'BD', 'BD Accident', 'BP', NULL, NULL),
(2, 'BD', 'BD Unschedule', 'BP', NULL, NULL),
(3, 'BD', 'BD Schedule', 'BP', NULL, NULL),
(4, 'BD', 'Tire Unschedule', 'BP', NULL, NULL),
(5, 'BD', 'Tire Schedule', 'BP', NULL, NULL),
(6, 'BD', 'BD IT - Radio', 'BP', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `equipment`
--

CREATE TABLE `equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `modelunit` varchar(100) NOT NULL,
  `codeunit` varchar(100) NOT NULL,
  `codemodel` varchar(100) NOT NULL,
  `equipactivity` varchar(100) NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `equipment`
--

INSERT INTO `equipment` (`id`, `category`, `type`, `modelunit`, `codeunit`, `codemodel`, `equipactivity`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'Main Equipment', 'Excavator', 'ZX870H-3F', 'EXHC87001', 'ZX870', 'Loader', 'BP', NULL, NULL),
(2, 'Main Equipment', 'Excavator', 'ZX870H-3F', 'EXHC87002', 'ZX870', 'Loader', 'BP', NULL, NULL),
(3, 'Main Equipment', 'Excavator', 'ZX870H-LCH', 'EXHC87003', 'ZX870', 'Loader', 'BP', NULL, NULL),
(4, 'Main Equipment', 'Excavator', 'ZX870H-LCH', 'EXHC87012', 'ZX870', 'Loader', 'BP', NULL, NULL),
(5, 'Main Equipment', 'Excavator', 'PC850R1-8', 'EXKM85001', 'PC850', 'Loader', 'BP', NULL, NULL),
(6, 'Main Equipment', 'Excavator', 'DX700LC', 'EXDS70001', 'DX700', 'Loader', 'BP', NULL, NULL),
(7, 'Main Equipment', 'Excavator', 'SL500LC-V', 'EXDS50002', 'SL500', 'Loader', 'BP', NULL, NULL),
(8, 'Main Equipment', 'Excavator', 'SL500LC-V', 'EXDS50011', 'SL500', 'Loader', 'BP', NULL, NULL),
(9, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50001BP', 'BP', 'Loader', 'BP', NULL, NULL),
(10, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50001', 'SY500', 'Loader', 'BP', NULL, NULL),
(11, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50002', 'SY500', 'Loader', 'BP', NULL, NULL),
(12, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50003', 'SY500', 'Loader', 'BP', NULL, NULL),
(13, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50004', 'SY500', 'Loader', 'BP', NULL, NULL),
(14, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50007', 'SY500', 'Loader', 'BP', NULL, NULL),
(15, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50008', 'SY500', 'Loader', 'BP', NULL, NULL),
(16, 'Main Equipment', 'Excavator', 'KT200', 'XEXKT20009', 'KT200', 'Loader', 'BP', NULL, NULL),
(17, 'Main Equipment', 'Excavator', 'DX225', 'EXDS22002', 'DX225', 'Loader', 'BP', NULL, NULL),
(18, 'Main Equipment', 'Excavator', 'PC200', 'XEXKM20001', 'PC200', 'Loader', 'BP', NULL, NULL),
(19, 'Main Equipment', 'Excavator', 'KC200-6', 'XEXKC20001', 'KC200-6', 'Loader', 'BP', NULL, NULL),
(20, 'Main Equipment', 'Excavator', 'ZX200-5G', 'EXHC20002', 'ZX200', 'Loader', 'BP', NULL, NULL),
(21, 'Main Equipment', 'Excavator', 'PC200', 'EXKM20004', 'PC200', 'Loader', 'BP', NULL, NULL),
(22, 'Main Equipment', 'Excavator', 'EC480DL', 'EXVV48001', 'EC480', 'Loader', 'BP', NULL, NULL),
(23, 'Main Equipment', 'Excavator', 'EC480DL', 'EXVV48005', 'EC480', 'Loader', 'BP', NULL, NULL),
(24, 'Main Equipment', 'Excavator', 'EC480DL', 'EXVV48006', 'EC480', 'Loader', 'BP', NULL, NULL),
(25, 'Main Equipment', 'Excavator', 'EC480DL', 'EXVV48007', 'EC480', 'Loader', 'BP', NULL, NULL),
(26, 'Main Equipment', 'Excavator', 'PC400', 'XEXKM4006BP', 'PC400', 'Loader', 'BP', NULL, NULL),
(27, 'Main Equipment', 'Excavator', 'ZX450LC-3F', 'EXHC45002', 'ZX450', 'Loader', 'BP', NULL, NULL),
(28, 'Main Equipment', 'Excavator', 'ZX450LC-3F', 'EXHC45003', 'ZX450', 'Loader', 'BP', NULL, NULL),
(29, 'Main Equipment', 'Excavator', 'CAT320C', 'EXCT32001', 'CAT320', 'Loader', 'BP', NULL, NULL),
(30, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80001', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(31, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80002', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(32, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80003', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(33, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80004', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(34, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80005', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(35, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80006', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(36, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80007', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(37, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80008', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(38, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80009', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(39, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80010', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(40, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80011', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(41, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80012', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(42, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80013', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(43, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80014', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(44, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80015', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(45, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80016', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(46, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80017', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(47, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80018', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(48, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80019', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(49, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80020', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(50, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80021', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(51, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80022', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(52, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80023', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(53, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80024', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(54, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80025', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(55, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80026', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(56, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80027', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(57, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80028', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(58, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80029', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(59, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80030', 'SKT80S', 'Hauler', 'BP', NULL, NULL),
(60, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90018', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(61, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90019', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(62, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90020', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(63, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90022', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(64, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90023', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(65, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90026', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(66, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90028', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(67, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90029', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(68, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90030', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(69, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90031', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(70, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90032', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(71, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90033', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(72, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90034', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(73, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90035', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(74, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90036', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(75, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90037', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(76, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90059', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(77, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90060', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(78, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90061', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(79, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90062', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(80, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90063', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(81, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90064', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(82, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90065', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(83, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90066', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(84, 'Main Equipment', 'Heavy Dump Truck', 'SKT90S', 'XDTSN90067', 'SKT90S', 'Hauler', 'BP', NULL, NULL),
(85, 'Support Equipment', 'Bulldozer', 'D8R', 'BDCT08001', 'D8R', 'BD', 'BP', NULL, NULL),
(86, 'Support Equipment', 'Bulldozer', 'D8R', 'BDCT08008', 'D8R', 'BD', 'BP', NULL, NULL),
(87, 'Support Equipment', 'Bulldozer', 'D6R2 XL', 'BDCT06004', 'D6R', 'BD', 'BP', NULL, NULL),
(88, 'Support Equipment', 'Bulldozer', 'D6R2 XL', 'BDCT06005', 'D6R', 'BD', 'BP', NULL, NULL),
(89, 'Support Equipment', 'Bulldozer', 'D6R2 XL', 'BDCT06006', 'D6R', 'BD', 'BP', NULL, NULL),
(90, 'Support Equipment', 'Bulldozer', 'D6R2 XL', 'BDCT06008', 'D6R', 'BD', 'BP', NULL, NULL),
(91, 'Support Equipment', 'Bulldozer', 'D6R2 XL', 'BDCT06009', 'D6R', 'BD', 'BP', NULL, NULL),
(92, 'Support Equipment', 'Bulldozer', 'D6R2 XL', 'BDCT06010', 'D6R', 'BD', 'BP', NULL, NULL),
(93, 'Support Equipment', 'Bulldozer', 'D6R2 XL', 'BDCT06011', 'D6R', 'BD', 'BP', NULL, NULL),
(94, 'Support Equipment', 'Bulldozer', 'D6R2 XL', 'BDCT06012', 'D6R', 'BD', 'BP', NULL, NULL),
(95, 'Support Equipment', 'Bulldozer', 'D85ESS-2', 'BDKM85001', 'D85SS', 'BD', 'BP', NULL, NULL),
(96, 'Support Equipment', 'Bulldozer', 'D85ESS-2', 'BDKM85005', 'D85', 'BD', 'BP', NULL, NULL),
(97, 'Support Equipment', 'Bulldozer', 'D85ESS-2', 'BDKM85009', 'D85', 'BD', 'BP', NULL, NULL),
(98, 'Support Equipment', 'Bulldozer', '850J', 'BDJD85001', 'D850J', 'BD', 'BP', NULL, NULL),
(99, 'Support Equipment', 'Bulldozer', '850J', 'BDJD85002', 'D850J', 'BD', 'BP', NULL, NULL),
(100, 'Support Equipment', 'Bulldozer', 'SD22', 'XBDSN22001', 'SD22', 'BD', 'BP', NULL, NULL),
(101, 'Support Equipment', 'Bulldozer', 'SD22', 'XBDSN22002', 'SD22', 'BD', 'BP', NULL, NULL),
(102, 'Support Equipment', 'Bulldozer', 'SD22', 'XBDSN22004', 'SD22', 'BD', 'BP', NULL, NULL),
(103, 'Support Equipment', 'Bulldozer', 'SD22', 'XBDSN22005', 'SD22', 'BD', 'BP', NULL, NULL),
(104, 'Support Equipment', 'Bulldozer', 'CLG-B230', 'XBDSN23001', 'CLG-B230', 'BD', 'BP', NULL, NULL),
(105, 'Support Equipment', 'Bulldozer', 'CLG-B230', 'XBDSN23002', 'CLG-B230', 'BD', 'BP', NULL, NULL),
(106, 'Support Equipment', 'Bulldozer', 'D6R2 XL', 'XBDKM85005', 'D6R', 'BD', 'BP', NULL, NULL),
(107, 'Support Equipment', 'Motor Grader', 'GD705A-5', 'GDCT14002', 'GD14M', 'MT', 'BP', NULL, NULL),
(108, 'Support Equipment', 'Motor Grader', 'GD705A-5', 'GDKM70001', 'GD705', 'MT', 'BP', NULL, NULL),
(109, 'Support Equipment', 'Motor Grader', 'GD705A-5', 'GDKM70003', 'GD705', 'MT', 'BP', NULL, NULL),
(110, 'Support Equipment', 'Motor Grader', 'GD705A-5', 'GDKM70005', 'GD705', 'MT', 'BP', NULL, NULL),
(111, 'Support Equipment', 'Motor Grader', 'GD705A-5', 'GDKM70007', 'GD705', 'MT', 'BP', NULL, NULL),
(112, 'Support Equipment', 'Motor Grader', 'SAG200C-6', 'XGDSN20003', 'C6', 'MT', 'BP', NULL, NULL),
(113, 'Support Equipment', 'Motor Grader', 'STG190C-8S', 'XGDSN19004', 'C8S', 'MT', 'BP', NULL, NULL),
(114, 'Support Equipment', 'Motor Grader', 'STG190C-8S', 'XGDSN19005', 'C8S', 'MT', 'BP', NULL, NULL),
(115, 'Support Equipment', 'Compactor', 'BW211D-40', 'CPBM21010', 'BW211D-40', 'Compactor', 'BP', NULL, NULL),
(116, 'Support Equipment', 'Mine Pump', 'HH160IPES', 'MPSY15001', 'MP Sykes', 'Mine Pump', 'BP', NULL, NULL),
(117, 'Support Equipment', 'Mine Pump', 'LCC 150-400-3K', 'MPKS15002', 'MP KSB150', 'Mine Pump', 'BP', NULL, NULL),
(118, 'Support Equipment', 'Mine Pump', 'H150HM', 'MPSW15001', 'MP SELWOOD', 'Mine Pump', 'BP', NULL, NULL),
(119, 'Support Equipment', 'Water Truck', 'WT FM260JD', 'WTHN32002', 'WT HN320', 'Water Truck', 'BP', NULL, NULL),
(120, 'Support Equipment', 'Water Truck', 'WT CWB45ALDN', 'WTNS45003', 'WT CWB', 'Water Truck', 'BP', NULL, NULL),
(121, 'Support Equipment', 'Water Truck', 'WT 503', 'WTMA25001', 'WT 503', 'Water Truck', 'BP', NULL, NULL),
(122, 'Support Equipment', 'Mega Tower', 'ALPHAWELD 500D', 'MTAW50001', 'Mega Tower', 'Mega Tower', 'BP', NULL, NULL),
(123, 'Support Equipment', 'Mega Tower', 'ALPHAWELD 500D', 'MTAW50002', 'Mega Tower', 'Mega Tower', 'BP', NULL, NULL),
(124, 'Support Equipment', 'Tower Lamp', 'LS-60HZ-T4F', 'TLDS11005', 'Tower Lamp', 'Tower Lamp', 'BP', NULL, NULL),
(125, 'Support Equipment', 'Tower Lamp', 'VT8KJM', 'TLKB81009', 'Tower Lamp', 'Tower Lamp', 'BP', NULL, NULL),
(126, 'Support Equipment', 'Tower Lamp', 'VT8KJM', 'TLKB81011', 'Tower Lamp', 'Tower Lamp', 'BP', NULL, NULL),
(127, 'Support Equipment', 'Tower Lamp', 'VT8KJM', 'TLKB81014', 'Tower Lamp', 'Tower Lamp', 'BP', NULL, NULL),
(128, 'Support Equipment', 'Tower Lamp', 'VT8KJM', 'TLKB81015', 'Tower Lamp', 'Tower Lamp', 'BP', NULL, NULL),
(129, 'Support Equipment', 'Tower Lamp', 'VT8KJM', 'TLKB81022', 'Tower Lamp', 'Tower Lamp', 'BP', NULL, NULL),
(130, 'Support Equipment', 'Tower Lamp', 'VT8KJM', 'TLKB81023', 'Tower Lamp', 'Tower Lamp', 'BP', NULL, NULL),
(131, 'Support Equipment', 'Tower Lamp', 'RL4000', 'TLTR40002', 'Tower Lamp', 'Tower Lamp', 'BP', NULL, NULL),
(132, 'Support Equipment', 'Tower Lamp', 'RL4000', 'TLTR40003', 'Tower Lamp', 'Tower Lamp', 'BP', NULL, NULL),
(133, 'Support Equipment', 'Tower Lamp', 'RL4000', 'TLTR40004', 'Tower Lamp', 'Tower Lamp', 'BP', NULL, NULL),
(134, 'Support Equipment', 'Tower Lamp', 'RL4000', 'TLTR40011', 'Tower Lamp', 'Tower Lamp', 'BP', NULL, NULL),
(135, 'Support Equipment', 'Tower Lamp', 'RL4000', 'TLTR40015', 'Tower Lamp', 'Tower Lamp', 'BP', NULL, NULL),
(136, 'General Support Equipment', 'Fuel Truck', 'FT 2528C', 'FTMA25004', 'FT AXOR', 'Fuel Truck', 'BP', NULL, NULL),
(137, 'General Support Equipment', 'Fuel Truck', 'FT FM260', 'FTHN26001', 'FT Hino', 'Fuel Truck', 'BP', NULL, NULL),
(138, 'General Support Equipment', 'Fuel Truck', 'FT FM260', 'FTHN23003', 'FT Hino', 'Fuel Truck', 'BP', NULL, NULL),
(139, 'General Support Equipment', 'Lube Truck', 'LT 2528C', 'LTMA25003', 'LT AXOR', 'Lube Truck', 'BP', NULL, NULL),
(140, 'General Support Equipment', 'Lube Truck', 'LT 2528C', 'LVMS10015', 'LT AXOR', 'Lube Truck', 'BP', NULL, NULL),
(141, 'General Support Equipment', 'Lube Truck', 'LT 2528C', 'LVMS10019', 'LT AXOR', 'Lube Truck', 'BP', NULL, NULL),
(142, 'General Support Equipment', 'Lube Truck', 'LT 2528C', 'LVMS10026', 'LT AXOR', 'Lube Truck', 'BP', NULL, NULL),
(143, 'General Support Equipment', 'Lube Truck', 'LT1002BP', 'LT1002BP', 'LT1002BP', 'Lube Truck', 'BP', NULL, NULL),
(144, 'General Support Equipment', 'Crane Truck', 'CT CWB45ALDN', 'CTRN38001', 'Crane Truck', 'Crane Truck', 'BP', NULL, NULL),
(145, 'General Support Equipment', 'Crane Truck', 'CT CWB45ALDN', 'CTNS45003', 'Crane Truck', 'Crane Truck', 'BP', NULL, NULL),
(146, 'General Support Equipment', 'Welding Truck', 'DT CWB45ALDN', 'DTNS45015', 'Welding Truck', 'Welding Truck', 'BP', NULL, NULL),
(147, 'General Support Equipment', 'Welding Truck', 'DT CWB45ALDN', 'DTNS45025', 'Welding Truck', 'Welding Truck', 'BP', NULL, NULL),
(148, 'General Support Equipment', 'Welding Truck', 'FM260JD', 'DTHN26004', 'Welding Truck', 'Welding Truck', 'BP', NULL, NULL),
(149, 'General Support Equipment', 'Tyre Handler', '931A', 'WLYT93001', 'Lift Handler Yutong', 'Tyre Handler', 'BP', NULL, NULL),
(150, 'General Support Equipment', 'Tyre Handler', '931A', 'WLYT93002', 'Lift Handler Yutong', 'Tyre Handler', 'BP', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `equipmentcategori`
--

CREATE TABLE `equipmentcategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categori` varchar(255) NOT NULL,
  `itemcategory` varchar(255) NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `equipmentcategori`
--

INSERT INTO `equipmentcategori` (`id`, `categori`, `itemcategory`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'Working', 'Waste Removal', 'BP', NULL, NULL),
(2, 'Working', 'Coal Mining', 'BP', NULL, NULL),
(3, 'Working', 'Coal Transport', 'BP', NULL, NULL),
(4, 'Working', 'General', 'BP', NULL, NULL),
(5, 'Working', 'Road Construction', 'BP', NULL, NULL),
(6, 'Working', 'Ripping', 'BP', NULL, NULL),
(7, 'Working', 'Rental', 'BP', NULL, NULL),
(8, 'Standby', 'Shift Change', 'BP', NULL, NULL),
(9, 'Standby', 'Meal & Rest', 'BP', NULL, NULL),
(10, 'Standby', 'Friday Pray', 'BP', NULL, NULL),
(11, 'Standby', 'Praying', 'BP', NULL, NULL),
(12, 'Standby', 'Safety Talk', 'BP', NULL, NULL),
(13, 'Standby', 'Toilet', 'BP', NULL, NULL),
(14, 'Standby', 'Wait Opt. - Tidak di Unit', 'BP', NULL, NULL),
(15, 'Standby', 'Wait Opt. - Pulang', 'BP', NULL, NULL),
(16, 'Standby', 'Wait Opt. - Tidak Masuk', 'BP', NULL, NULL),
(17, 'Standby', 'Operator Fatique', 'BP', NULL, NULL),
(18, 'Standby', 'Wait Truck U/A', 'BP', NULL, NULL),
(19, 'Standby', 'Wait Exc U/A', 'BP', NULL, NULL),
(20, 'Standby', 'Front Preparation', 'BP', NULL, NULL),
(21, 'Standby', 'Disposal Preparation', 'BP', NULL, NULL),
(22, 'Standby', 'Road Preparation', 'BP', NULL, NULL),
(23, 'Standby', 'Refueling', 'BP', NULL, NULL),
(24, 'Standby', 'Wait Fuel', 'BP', NULL, NULL),
(25, 'Standby', 'Commissioning', 'BP', NULL, NULL),
(26, 'Standby', 'Washing Unit ', 'BP', NULL, NULL),
(27, 'Standby', 'Wait Mechanic*', 'BP', NULL, NULL),
(28, 'Standby', 'Dusty', 'BP', NULL, NULL),
(29, 'Standby', 'No/Wait Support', 'BP', NULL, NULL),
(30, 'Standby', 'Wait Survey', 'BP', NULL, NULL),
(31, 'Standby', 'Moving Equipment', 'BP', NULL, NULL),
(32, 'Standby', 'Fasting', 'BP', NULL, NULL),
(33, 'Standby', 'Wait Sarana', 'BP', NULL, NULL),
(34, 'Standby', 'Holiday & Shutdown', 'BP', NULL, NULL),
(35, 'Standby', 'Wait Investigation', 'BP', NULL, NULL),
(36, 'Standby', 'Wait Exc P/A', 'BP', NULL, NULL),
(37, 'Standby', 'Wait Truck P/A', 'BP', NULL, NULL),
(38, 'Standby', 'No Operator*', 'BP', NULL, NULL),
(39, 'Standby', 'No Location', 'BP', NULL, NULL),
(40, 'Standby', 'No Material', 'BP', NULL, NULL),
(41, 'Standby', 'No Fuel', 'BP', NULL, NULL),
(42, 'Standby', 'Hazard', 'BP', NULL, NULL),
(43, 'Standby', 'No Job', 'BP', NULL, NULL),
(44, 'Standby', 'Rain', 'BP', NULL, NULL),
(45, 'Standby', 'Slippery', 'BP', NULL, NULL),
(46, 'Standby', 'Fog', 'BP', NULL, NULL),
(47, 'Standby', 'ROM Problem*', 'BP', NULL, NULL),
(48, 'Standby', 'Unmatch Fleet', 'BP', NULL, NULL),
(49, 'Standby', 'Miss Coordination', 'BP', NULL, NULL),
(50, 'Standby', 'Strike', 'BP', NULL, NULL),
(51, 'Standby', 'Customer Problem', 'BP', NULL, NULL),
(52, 'Standby', 'Internal Problem', 'BP', NULL, NULL),
(53, 'Standby', 'External Problem', 'BP', NULL, NULL),
(54, 'Breakdown', 'BD Schedule', 'BP', NULL, NULL),
(55, 'Breakdown', 'Tire Schedule', 'BP', NULL, NULL),
(56, 'Breakdown', 'BD Unschedule', 'BP', NULL, NULL),
(57, 'Breakdown', 'Tire Unschedule', 'BP', NULL, NULL),
(58, 'Breakdown', 'BD Accident', 'BP', NULL, NULL),
(59, 'Breakdown', 'BD IT - Radio', 'BP', NULL, NULL),
(60, 'Standby', 'Mob / Demob', 'BP', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `equipmentfuel`
--

CREATE TABLE `equipmentfuel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `equipmentmodel`
--

CREATE TABLE `equipmentmodel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `factor`
--

CREATE TABLE `factor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `fuel`
--

CREATE TABLE `fuel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hauler`
--

CREATE TABLE `hauler` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `modelhauler` varchar(100) NOT NULL,
  `codehauler` varchar(100) NOT NULL,
  `codemodelhauler` varchar(100) NOT NULL,
  `factor_truck` varchar(100) NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hauler`
--

INSERT INTO `hauler` (`id`, `category`, `type`, `modelhauler`, `codehauler`, `codemodelhauler`, `factor_truck`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80001', 'SKT80S', ' 19,00', 'BP', NULL, NULL),
(2, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80002', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(3, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80003', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(4, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80004', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(5, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80005', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(6, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80006', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(7, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80007', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(8, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80008', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(9, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80009', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(10, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80010', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(11, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80011', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(12, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80012', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(13, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80013', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(14, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80014', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(15, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80015', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(16, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80016', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(17, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80017', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(18, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80018', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(19, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80019', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(20, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80020', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(21, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80021', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(22, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80022', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(23, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80023', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(24, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80024', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(25, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80025', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(26, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80026', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(27, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80027', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(28, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80028', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(29, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80029', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL),
(30, 'Main Equipment', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80030', 'SKT80S', ' 19,00 ', 'BP', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hourly`
--

CREATE TABLE `hourly` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ritasi_id` int(50) NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `material` varchar(100) NOT NULL,
  `date` varchar(255) NOT NULL,
  `codeloader` varchar(255) NOT NULL,
  `time` varchar(100) NOT NULL,
  `jam_06300700` varchar(100) NOT NULL,
  `jam_06000700` varchar(100) NOT NULL,
  `jam_07000800` varchar(100) NOT NULL,
  `jam_08000900` varchar(100) NOT NULL,
  `jam_09001000` varchar(100) NOT NULL,
  `jam_10001100` varchar(100) NOT NULL,
  `jam_11001200` varchar(100) NOT NULL,
  `jam_12001300` varchar(100) NOT NULL,
  `jam_13001400` varchar(100) NOT NULL,
  `jam_14001500` varchar(100) NOT NULL,
  `jam_15001600` varchar(100) NOT NULL,
  `jam_16001700` varchar(100) NOT NULL,
  `jam_17001800` varchar(100) NOT NULL,
  `jam_18001900` varchar(100) NOT NULL,
  `jam_19002000` varchar(100) NOT NULL,
  `jam_20002100` varchar(100) NOT NULL,
  `jam_21002200` varchar(100) NOT NULL,
  `jam_22002300` varchar(100) NOT NULL,
  `jam_23002400` varchar(100) NOT NULL,
  `jam_24000100` varchar(100) NOT NULL,
  `jam_01000200` varchar(100) NOT NULL,
  `jam_02000300` varchar(100) NOT NULL,
  `jam_03000400` varchar(100) NOT NULL,
  `jam_04000500` varchar(100) NOT NULL,
  `jam_05000600` varchar(100) NOT NULL,
  `jam_06000630` varchar(100) NOT NULL,
  `totalshift` varchar(255) NOT NULL,
  `shift1` varchar(255) NOT NULL,
  `shift2` varchar(100) NOT NULL,
  `totalbcm` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hourmeter`
--

CREATE TABLE `hourmeter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jointsurvey`
--

CREATE TABLE `jointsurvey` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `loader`
--

CREATE TABLE `loader` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `modelloader` varchar(100) NOT NULL,
  `codeloader` varchar(100) NOT NULL,
  `codemodelloader` varchar(100) NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `loader`
--

INSERT INTO `loader` (`id`, `category`, `type`, `modelloader`, `codeloader`, `codemodelloader`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'Main Equipment', 'Excavator', 'ZX870H-3F', 'EXHC87001', 'ZX870', 'BP', NULL, NULL),
(2, 'Main Equipment', 'Excavator', 'ZX870H-3F', 'EXHC87002', 'ZX870', 'BP', NULL, NULL),
(3, 'Main Equipment', 'Excavator', 'ZX870H-LCH', 'EXHC87003', 'ZX870', 'BP', NULL, NULL),
(4, 'Main Equipment', 'Excavator', 'ZX870H-LCH', 'EXHC87012', 'ZX870', 'BP', NULL, NULL),
(5, 'Main Equipment', 'Excavator', 'PC850R1-8', 'EXKM85001', 'PC850', 'BP', NULL, NULL),
(6, 'Main Equipment', 'Excavator', 'DX700LC', 'EXDS70001', 'DX700', 'BP', NULL, NULL),
(7, 'Main Equipment', 'Excavator', 'SL500LC-V', 'EXDS50002', 'SL500', 'BP', NULL, NULL),
(8, 'Main Equipment', 'Excavator', 'SL500LC-V', 'EXDS50011', 'SL500', 'BP', NULL, NULL),
(9, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50001BP', 'BP', 'BP', NULL, NULL),
(10, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50001', 'SY500', 'BP', NULL, NULL),
(11, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50002', 'SY500', 'BP', NULL, NULL),
(12, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50003', 'SY500', 'BP', NULL, NULL),
(13, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50004', 'SY500', 'BP', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `location`
--

CREATE TABLE `location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `block` varchar(100) NOT NULL,
  `pit` varchar(100) NOT NULL,
  `sitecode` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `location`
--

INSERT INTO `location` (`id`, `block`, `pit`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'PIT ABC', 'PIT ABC', 'BP', NULL, NULL),
(2, 'PIT Midle', 'PIT Midle', 'BP', NULL, NULL),
(3, 'PIT N', 'PIT N', 'BP', NULL, NULL),
(4, 'PIT E', 'PIT E', 'BP', NULL, NULL),
(5, 'PIT E', 'Seam E', 'BP', NULL, NULL),
(6, 'PIT ABG', 'PIT ABG', 'BP', NULL, NULL),
(7, 'PIT ABC', 'Seam A - Up', 'BP', NULL, NULL),
(8, 'PIT ABC', 'Seam A - Low', 'BP', NULL, NULL),
(9, 'PIT ABC', 'Seam B', 'BP', NULL, NULL),
(10, 'PIT ABC', 'Seam C', 'BP', NULL, NULL),
(11, 'PIT ABC', 'Seam D', 'BP', NULL, NULL),
(12, 'PIT ABC', 'Seam N3', 'BP', NULL, NULL),
(13, 'PIT Midle', 'Seam A - Up M', 'BP', NULL, NULL),
(14, 'PIT Midle', 'Seam A - Low M', 'BP', NULL, NULL),
(15, 'PIT Midle', 'Seam B M', 'BP', NULL, NULL),
(16, 'PIT Midle', 'Seam C M', 'BP', NULL, NULL),
(17, 'PIT Midle', 'Seam D M', 'BP', NULL, NULL),
(18, 'PIT Midle', 'Seam E M', 'BP', NULL, NULL),
(19, 'Pit Midle', 'Low Wall', 'BP', NULL, NULL),
(20, 'Pit Midle', 'High Wall', 'BP', NULL, NULL),
(21, 'Pit Midle', 'Ex-Sungai', 'BP', NULL, NULL),
(22, 'Other', 'Other', 'BP', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `locationtype`
--

CREATE TABLE `locationtype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `locdisposal`
--

CREATE TABLE `locdisposal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE `material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material` varchar(100) NOT NULL,
  `submaterial` varchar(100) NOT NULL,
  `material_factor` varchar(100) NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `material`
--

INSERT INTO `material` (`id`, `material`, `submaterial`, `material_factor`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'Waste Removal', 'Top Soil', ' 1,00 ', 'BP', NULL, NULL),
(2, 'Waste Removal', 'Top Soil 2', ' 0,60 ', 'BP', NULL, NULL),
(3, 'Waste Removal', 'OB', ' 1,00 ', 'BP', NULL, NULL),
(4, 'Waste Removal', 'OB Wet', ' 0,80 ', 'BP', NULL, NULL),
(5, 'Waste Removal', 'OB Wet 2', ' 0,50 ', 'BP', NULL, NULL),
(6, 'Waste Removal', 'Krokos', ' 0,80', 'BP', NULL, NULL),
(7, 'Waste Removal', 'Spoil', ' 0,75 ', 'BP', NULL, NULL),
(8, 'Waste Removal', 'Parting', ' 0,75 ', 'BP', NULL, NULL),
(9, 'Waste Removal', 'Lumpur Padat', ' 0,75', 'BP', NULL, NULL),
(10, 'Waste Removal', 'Lumpur Cair', ' 0,25 ', 'BP', NULL, NULL),
(11, 'Waste Removal', 'Lumpur Cair 2', ' 0,50 ', 'BP', NULL, NULL),
(12, 'Waste Removal', 'Lumpur Ori', ' 0,85 ', 'BP', NULL, NULL),
(13, 'Coal Mining', 'Coal Mining', ' 1,30 ', 'BP', NULL, NULL),
(14, 'Coal Transport', 'Coal Transport', ' 1,30 ', 'BP', NULL, NULL),
(15, 'Non Volume', 'Non Volume', ' -   ', 'BP', NULL, NULL),
(16, 'Road Construction', 'Road Cont.', ' -   ', 'BP', NULL, NULL),
(17, 'Coal Mining Adjust', 'Coal Mining adjust', '', 'BP', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2022_12_28_081704_create_table_operator', 2),
(6, '2022_12_28_082339_create_table_operator', 3),
(9, '2023_01_05_080110_create_ritasi', 6),
(118, '2014_10_12_000000_create_users_table', 7),
(119, '2014_10_12_100000_create_password_resets_table', 7),
(120, '2019_08_19_000000_create_failed_jobs_table', 7),
(121, '2019_12_14_000001_create_personal_access_tokens_table', 7),
(122, '2023_01_03_015132_create_operator', 7),
(123, '2023_01_05_064017_create_customer', 7),
(124, '2023_01_05_095151_create_ritasi', 7),
(125, '2023_01_06_041850_create_hourly', 7),
(126, '2023_01_09_041540_create_time', 7),
(127, '2023_01_09_082221_create_site', 7),
(128, '2023_01_12_072109_create_equipment', 7),
(129, '2023_01_12_072139_create_factor', 7),
(130, '2023_01_12_072212_create_location', 7),
(131, '2023_01_12_072245_create_versionplan', 7),
(132, '2023_01_13_015835_create_equipmentcategori', 7),
(133, '2023_01_13_020124_create_dedicated', 7),
(134, '2023_01_13_020213_create_equipmentmodel', 7),
(135, '2023_01_13_020247_create_truckfactor', 7),
(136, '2023_01_13_020352_create_locationtype', 7),
(137, '2023_01_13_020428_create_material', 7),
(138, '2023_01_13_020456_create_submaterial', 7),
(139, '2023_01_13_020524_create_problemtype', 7),
(140, '2023_01_13_020557_create_shiftcode', 7),
(141, '2023_01_13_020650_create_performanceitem', 7),
(142, '2023_01_13_020717_create_activitytype', 7),
(143, '2023_01_17_020835_create_datadrill', 7),
(144, '2023_01_17_022508_create_statusunit', 7),
(145, '2023_01_17_023400_create_rainslippery', 7),
(146, '2023_01_17_023431_create_fuel', 7),
(147, '2023_01_17_023500_create_payload', 7),
(148, '2023_01_17_023615_create_jointsurvey', 7),
(149, '2023_01_17_023700_create_hourmeter', 7),
(150, '2023_01_18_030714_create_sitefactor', 7),
(151, '2023_01_26_101623_create_equipmentfuel', 7),
(152, '2023_01_27_072400_create_locdisposal', 7),
(153, '2023_01_31_071645_create_hauler', 7),
(154, '2023_01_31_071731_create_loader', 7),
(155, '2023_02_07_021920_create_breakdown', 7),
(156, '2023_02_23_073328_create_downtimecategory', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `optnik` varchar(255) NOT NULL,
  `optnama` varchar(255) NOT NULL,
  `optversati` text NOT NULL,
  `optsite` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id`, `optnik`, `optnama`, `optversati`, `optsite`, `created_at`, `updated_at`) VALUES
(1, '-', 'Aan Andriansyah', 'Operator Excavator', 'BP', NULL, NULL),
(2, '-', 'Ade Irawan', 'Operator DT Sany', 'BP', NULL, NULL),
(3, '-', 'Adi Prayogi', 'Opt Grader GUI', 'BP', NULL, NULL),
(4, '1800585', 'Agung Setiawan', 'Operator DT Mercy', 'BP', NULL, NULL),
(5, '-', 'Ahmad Yani', 'Operator Bulldozer', 'BP', NULL, NULL),
(6, '2020594', 'Aji Saputra', 'Operator DT Sany', 'BP', NULL, NULL),
(7, '-', 'Amsri', 'Operator OHT 100T Class', 'BP', NULL, NULL),
(8, '-', 'Andy Saputra', 'Operator DT Sany', 'BP', NULL, NULL),
(9, '-', 'Angga Rio', 'Opt Dozer (BO)', 'BP', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payload`
--

CREATE TABLE `payload` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `performanceitem`
--

CREATE TABLE `performanceitem` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `problemtype`
--

CREATE TABLE `problemtype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodproblem` varchar(100) NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `problemtype`
--

INSERT INTO `problemtype` (`id`, `prodproblem`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'Disposal Condition', 'BP', NULL, NULL),
(2, 'Double Bench', 'BP', NULL, NULL),
(3, 'Dusty', 'BP', NULL, NULL),
(4, 'Front Condition', 'BP', NULL, NULL),
(5, 'Material Lumpur', 'BP', NULL, NULL),
(6, 'Material Keras', 'BP', NULL, NULL),
(7, 'Operator Skill', 'BP', NULL, NULL),
(8, 'Road Condition', 'BP', NULL, NULL),
(9, 'ROM Crowded', 'BP', NULL, NULL),
(10, 'Selective Loading', 'BP', NULL, NULL),
(11, 'Top Loading', 'BP', NULL, NULL),
(12, 'Truck Kurang', 'BP', NULL, NULL),
(13, 'Visibility', 'BP', NULL, NULL),
(14, 'Under Speed', 'BP', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rainslippery`
--

CREATE TABLE `rainslippery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `rainslipdate` varchar(100) NOT NULL,
  `rainslipshift` varchar(100) NOT NULL,
  `rainstart` time NOT NULL,
  `rainend` time NOT NULL,
  `rainhour` varchar(100) NOT NULL,
  `slipperystart` time NOT NULL,
  `slipperyend` time NOT NULL,
  `slipperyhour` varchar(100) NOT NULL,
  `rainfall` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rainslippery`
--

INSERT INTO `rainslippery` (`id`, `sitecode`, `rainslipdate`, `rainslipshift`, `rainstart`, `rainend`, `rainhour`, `slipperystart`, `slipperyend`, `slipperyhour`, `rainfall`, `created_at`, `updated_at`) VALUES
(1, 'BP', '2023-02-23', 'Shift-1', '08:00:00', '12:00:00', '4,00', '12:00:00', '12:45:00', '0,45', '12,7', '2023-02-22 21:59:31', '2023-02-22 21:59:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ritasi`
--

CREATE TABLE `ritasi` (
  `ritasi_id` int(20) UNSIGNED NOT NULL,
  `sitecode` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `nikloader` varchar(255) NOT NULL,
  `oploader` varchar(255) NOT NULL,
  `nikhauler` varchar(255) NOT NULL,
  `ophauler` varchar(100) NOT NULL,
  `codeloader` varchar(255) NOT NULL,
  `modelloader` varchar(255) NOT NULL,
  `codehauler` varchar(255) NOT NULL,
  `modelhauler` varchar(255) NOT NULL,
  `factortruck` varchar(100) NOT NULL,
  `block` varchar(255) NOT NULL,
  `pit` varchar(255) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `ritase` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `submaterial` varchar(255) NOT NULL,
  `produksi` varchar(100) DEFAULT NULL,
  `adjustment` varchar(100) DEFAULT NULL,
  `distvol` varchar(100) DEFAULT NULL,
  `factor` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `dumping` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ritasi`
--

INSERT INTO `ritasi` (`ritasi_id`, `sitecode`, `date`, `shift`, `time`, `nikloader`, `oploader`, `nikhauler`, `ophauler`, `codeloader`, `modelloader`, `codehauler`, `modelhauler`, `factortruck`, `block`, `pit`, `distance`, `ritase`, `material`, `submaterial`, `produksi`, `adjustment`, `distvol`, `factor`, `detail`, `dumping`, `created_at`, `updated_at`) VALUES
(38, 'BP', '2023-03-02', 'Shift 1', '06.30-07.00\r\n', '-', 'Adi Prayogi', '-', 'Ahmad Yani', 'EXHC87012', 'ZX870', 'XDTSN80014', 'SKT80S', '19,00', 'PIT E', 'PIT E', '2.414', '2', 'Waste Removal', 'OB', '38.00', '38.00', '91.73', '-', '-', '-', '2023-03-02 03:09:29', '2023-03-02 03:09:29'),
(39, 'BP', '2023-03-01', 'Shift 1', '06.30-07.00\r\n', '-', 'Aan Andriansyah', '1800585', 'Agung Setiawan', 'EXDS70001', 'DX700', 'XDTSN80004', 'SKT80S', '19,00', 'PIT ABC', 'PIT ABC', '2.414', '3', 'Waste Removal', 'OB', '57.00', '57.00', '137.60', '-', '-', '-', '2023-03-02 03:10:20', '2023-03-02 03:10:20'),
(40, 'BP', '2023-03-01', 'Shift 1', '06.30-07.00\r\n', '-', 'Aan Andriansyah', '1800585', 'Agung Setiawan', 'EXKM85001', 'PC850', 'XDTSN80006', 'SKT80S', '19,00', 'PIT E', 'Seam E', '2.414', '2', 'Waste Removal', 'OB', '38.00', '38.00', '91.73', '-', '-', '-', '2023-03-05 21:03:07', '2023-03-05 21:03:07'),
(41, 'BP', '2023-03-01', 'Shift 1', '06.30-07.00\r\n', '-', 'Aan Andriansyah', '-', 'Aan Andriansyah', 'EXHC87001', 'ZX870', 'XDTSN80005', 'SKT80S', '19,00', 'PIT ABC', 'PIT ABC', '2.414', '3', 'Waste Removal', 'OB', '57.00', '57.00', '137.60', '-', '-', '-', '2023-03-06 19:15:25', '2023-03-06 19:15:25'),
(42, 'BP', '2023-03-01', 'Shift 1', '06.30-07.00\r\n', '-', 'Adi Prayogi', '-', 'Ahmad Yani', 'EXHC87001', 'ZX870', 'XDTSN80002', 'SKT80S', '19,00', 'PIT ABC', 'Seam A - Up', '2.414', '2', 'Waste Removal', 'OB', '38.00', '38.00', '91.73', '-', '-', '-', '2023-03-06 19:16:36', '2023-03-06 19:16:36'),
(43, 'BP', '2023-03-01', 'Shift 1', '06.30-07.00\r\n', '-', 'Aan Andriansyah', '-', 'Adi Prayogi', 'EXHC87001', 'ZX870', 'XDTSN80001', 'SKT80S', '19,00', 'PIT Midle', 'PIT Midle', '2.414', '3', 'Waste Removal', 'OB', '57.00', '57.00', '137.60', '-', '-', '-', '2023-03-07 02:24:22', '2023-03-07 02:24:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shiftcode`
--

CREATE TABLE `shiftcode` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shiftcode` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `shiftcode`
--

INSERT INTO `shiftcode` (`id`, `shiftcode`, `created_at`, `updated_at`) VALUES
(1, 'Shift-1', NULL, NULL),
(2, 'Shift-2', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `site`
--

CREATE TABLE `site` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(255) NOT NULL,
  `sitedesc` varchar(255) NOT NULL,
  `siteaddress` varchar(255) NOT NULL,
  `customercode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `site`
--

INSERT INTO `site` (`id`, `sitecode`, `sitedesc`, `siteaddress`, `customercode`, `created_at`, `updated_at`) VALUES
(1, 'BAS', '', '', '', NULL, NULL),
(2, 'BP', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sitefactor`
--

CREATE TABLE `sitefactor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `statusunit`
--

CREATE TABLE `statusunit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `statusunitdate` varchar(100) NOT NULL,
  `statusopt` varchar(100) NOT NULL,
  `statusnikopt` varchar(100) NOT NULL,
  `statuscnunit` varchar(100) NOT NULL,
  `statusmodel` varchar(100) NOT NULL,
  `statusitemcat` varchar(100) NOT NULL,
  `statuscategory` varchar(100) NOT NULL,
  `statusstart` time NOT NULL,
  `statusend` time NOT NULL,
  `statushour` varchar(100) NOT NULL,
  `dedicated` varchar(100) NOT NULL,
  `statusremark` varchar(100) NOT NULL,
  `statusshift` varchar(100) NOT NULL,
  `statuscode` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `statusunit`
--

INSERT INTO `statusunit` (`id`, `sitecode`, `statusunitdate`, `statusopt`, `statusnikopt`, `statuscnunit`, `statusmodel`, `statusitemcat`, `statuscategory`, `statusstart`, `statusend`, `statushour`, `dedicated`, `statusremark`, `statusshift`, `statuscode`, `created_at`, `updated_at`) VALUES
(5, 'BP', '2023-02-28', 'Agung Setiawan', '1800585', 'XDTSN80013', 'SKT80S', 'Friday Pray', 'Standby', '09:50:00', '11:55:00', '2.08', 'Support CM', '-', 'Shift-1', '2', '2023-02-27 20:44:31', '2023-02-27 20:44:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submaterial`
--

CREATE TABLE `submaterial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `time`
--

CREATE TABLE `time` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categori` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `calculation` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `time`
--

INSERT INTO `time` (`id`, `categori`, `time`, `jam`, `shift`, `calculation`, `number`, `created_at`, `updated_at`) VALUES
(1, 'A\r\n', '06.30-07.00\r\n', '06:00\r\n', 'Shift 1\r\n', '0,27\r\n', '1\r\n', NULL, NULL),
(2, 'B\r\n', '07.00-08.00\r\n', '07:00\r\n', 'Shift 1\r\n', '0,29\r\n', '2\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `truckfactor`
--

CREATE TABLE `truckfactor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL,
  `level` varchar(5) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@mail.com', '2023-02-15 04:26:18', '$2y$10$trbFvMkyPiDyM/DT4uER.uN67MMzfWK9b4HkfvBKYY3xGFPFXcIyG', '1', NULL, '2023-02-14 21:26:18', '2023-02-14 21:26:18'),
(2, 'Admin BAS', 'adminbas', 'adminbas@mail.com', '2023-02-15 04:26:19', '$2y$10$Oqfe/cKE.nP5Z9/Yd9bHd.6taRLhztUl8GoNzqnQj7ovxQ.JfT.ue', '2', NULL, '2023-02-14 21:26:19', '2023-02-14 21:26:19'),
(3, 'General Manajer', 'manajer', 'manajer@mail.com', '2023-02-15 04:26:19', '$2y$10$QhY.y2K.DxNJBT0MQB/wReXDz9yLiX2oaSeb3oHZP84Bu50mVeCWq', '3', NULL, '2023-02-14 21:26:19', '2023-02-14 21:26:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `versionplan`
--

CREATE TABLE `versionplan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activitytype`
--
ALTER TABLE `activitytype`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `breakdown`
--
ALTER TABLE `breakdown`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datadrill`
--
ALTER TABLE `datadrill`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dedicated`
--
ALTER TABLE `dedicated`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `downtimecategory`
--
ALTER TABLE `downtimecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `equipmentcategori`
--
ALTER TABLE `equipmentcategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `equipmentfuel`
--
ALTER TABLE `equipmentfuel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `equipmentmodel`
--
ALTER TABLE `equipmentmodel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `factor`
--
ALTER TABLE `factor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hauler`
--
ALTER TABLE `hauler`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hourly`
--
ALTER TABLE `hourly`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hourmeter`
--
ALTER TABLE `hourmeter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jointsurvey`
--
ALTER TABLE `jointsurvey`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `loader`
--
ALTER TABLE `loader`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `locationtype`
--
ALTER TABLE `locationtype`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `locdisposal`
--
ALTER TABLE `locdisposal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payload`
--
ALTER TABLE `payload`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `performanceitem`
--
ALTER TABLE `performanceitem`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `problemtype`
--
ALTER TABLE `problemtype`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rainslippery`
--
ALTER TABLE `rainslippery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ritasi`
--
ALTER TABLE `ritasi`
  ADD PRIMARY KEY (`ritasi_id`);

--
-- Indeks untuk tabel `shiftcode`
--
ALTER TABLE `shiftcode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sitefactor`
--
ALTER TABLE `sitefactor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `statusunit`
--
ALTER TABLE `statusunit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `submaterial`
--
ALTER TABLE `submaterial`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `truckfactor`
--
ALTER TABLE `truckfactor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `versionplan`
--
ALTER TABLE `versionplan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activitytype`
--
ALTER TABLE `activitytype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `breakdown`
--
ALTER TABLE `breakdown`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `datadrill`
--
ALTER TABLE `datadrill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dedicated`
--
ALTER TABLE `dedicated`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `downtimecategory`
--
ALTER TABLE `downtimecategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT untuk tabel `equipmentcategori`
--
ALTER TABLE `equipmentcategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `equipmentfuel`
--
ALTER TABLE `equipmentfuel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `equipmentmodel`
--
ALTER TABLE `equipmentmodel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `factor`
--
ALTER TABLE `factor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hauler`
--
ALTER TABLE `hauler`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `hourly`
--
ALTER TABLE `hourly`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hourmeter`
--
ALTER TABLE `hourmeter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jointsurvey`
--
ALTER TABLE `jointsurvey`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `loader`
--
ALTER TABLE `loader`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `location`
--
ALTER TABLE `location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `locationtype`
--
ALTER TABLE `locationtype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `locdisposal`
--
ALTER TABLE `locdisposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `payload`
--
ALTER TABLE `payload`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `performanceitem`
--
ALTER TABLE `performanceitem`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `problemtype`
--
ALTER TABLE `problemtype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `rainslippery`
--
ALTER TABLE `rainslippery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ritasi`
--
ALTER TABLE `ritasi`
  MODIFY `ritasi_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `shiftcode`
--
ALTER TABLE `shiftcode`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `site`
--
ALTER TABLE `site`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sitefactor`
--
ALTER TABLE `sitefactor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `statusunit`
--
ALTER TABLE `statusunit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `submaterial`
--
ALTER TABLE `submaterial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `time`
--
ALTER TABLE `time`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `truckfactor`
--
ALTER TABLE `truckfactor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `versionplan`
--
ALTER TABLE `versionplan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
