-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2023 pada 06.40
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
-- Database: `mcr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activitytype`
--

CREATE TABLE `activitytype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activitycode` varchar(100) NOT NULL,
  `activitydesc` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `breakdown`
--

CREATE TABLE `breakdown` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `breakdate` date NOT NULL,
  `breakshift` varchar(10) NOT NULL,
  `breaktype` varchar(30) NOT NULL,
  `breakmodel` char(15) NOT NULL,
  `breakcnunit` char(25) NOT NULL,
  `bdawal` varchar(10) NOT NULL,
  `bdakhir` varchar(10) NOT NULL,
  `breaktotal` varchar(10) NOT NULL,
  `bdcategory` varchar(15) NOT NULL,
  `breakstatus` varchar(15) NOT NULL,
  `bddesc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `breakdown`
--

INSERT INTO `breakdown` (`id`, `sitecode`, `breakdate`, `breakshift`, `breaktype`, `breakmodel`, `breakcnunit`, `bdawal`, `bdakhir`, `breaktotal`, `bdcategory`, `breakstatus`, `bddesc`, `created_at`, `updated_at`) VALUES
(1358, 'BP', '2023-07-20', 'Shift 1', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80001', '06:00', '02:00', '20.00', 'BD Accident', 'BD', 'BD', '2023-07-20 02:37:49', '2023-07-20 02:37:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cscode` varchar(5) NOT NULL,
  `csdescript` text NOT NULL,
  `csaddress` text NOT NULL,
  `cstelp` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `cscode`, `csdescript`, `csaddress`, `cstelp`, `created_at`, `updated_at`) VALUES
(2, 'CT', 'Citra', 'Jl Raya Banten', '12222222', '2023-08-04 01:38:46', '2023-08-04 01:38:46');

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
  `dedicatedcode` varchar(100) NOT NULL,
  `dedicateddesc` varchar(100) NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dedicated`
--

INSERT INTO `dedicated` (`id`, `dedicatedcode`, `dedicateddesc`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, '1', 'Waste Removal', 'BP', '2023-06-26 02:40:30', '2023-06-26 02:40:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `downtimecategory`
--

CREATE TABLE `downtimecategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `dtcategory` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `downtimecategory`
--

INSERT INTO `downtimecategory` (`id`, `sitecode`, `dtcategory`, `created_at`, `updated_at`) VALUES
(1, 'BP', 'BD Accident', '2023-06-20 03:54:55', '2023-06-20 03:54:55'),
(3, 'BP', 'BD Accident', '2023-07-11 03:34:08', '2023-07-11 03:34:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `equipment`
--

CREATE TABLE `equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `modelunit` char(25) NOT NULL,
  `codeunit` char(25) NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `truck_factor` varchar(10) NOT NULL DEFAULT '0',
  `fungsi_equip` enum('loader','hauler','support') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `equipment`
--

INSERT INTO `equipment` (`id`, `category`, `type`, `modelunit`, `codeunit`, `sitecode`, `truck_factor`, `fungsi_equip`, `status`, `created_at`, `updated_at`) VALUES
(66, 'Mine Production EQ.', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80001', 'BP', '0', 'hauler', 'inactive', '2023-07-13 10:01:45', '2023-07-31 09:35:09'),
(68, 'Mine Production EQ.', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80002', 'BP', '0', 'hauler', 'inactive', '2023-07-14 09:22:39', '2023-07-31 09:35:11'),
(69, 'Mine Production EQ.', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80007', 'BP', '0', 'hauler', 'inactive', '2023-07-27 07:33:53', '2023-07-31 09:35:13'),
(70, 'Mine Production EQ.', 'Heavy Dump Truck', 'SKT80S', 'XDTSN80008', 'BP', '0', 'hauler', 'inactive', '2023-07-27 07:35:03', '2023-07-31 09:35:15'),
(71, 'Mine Production EQ.', 'Excavator', 'SY500', 'EXHC12001', 'BP', '0', 'loader', 'active', '2023-07-27 09:50:53', '2023-07-28 02:04:08'),
(72, 'Mine Production EQ.', 'Excavator', 'SY500', 'XDTSN800010', 'BP', '0', 'loader', 'active', '2023-07-28 03:39:56', '2023-07-28 03:39:56'),
(73, 'Mine Production EQ.', 'Heavy Dump Truck', 'SKT80S', 'XDTSN800011', 'BP', '21', 'hauler', 'active', '2023-07-28 03:48:36', '2023-07-28 03:48:36'),
(74, 'Mine Production EQ.', 'Excavator', 'SY500', 'XDTSN800012', 'BP', '0', 'loader', 'active', '2023-07-28 04:05:47', '2023-07-28 04:05:47'),
(75, 'Mine Production EQ.', 'Heavy Dump Truck', 'SKT80S', 'XDTSN800013', 'BP', '19', 'hauler', 'active', '2023-07-28 04:06:30', '2023-07-28 04:06:30'),
(76, 'Mine Production EQ.', 'Heavy Dump Truck', 'SKT80S', 'XDTSN800014', 'BP', '19,00', 'hauler', 'active', '2023-07-28 04:08:23', '2023-07-28 04:08:23'),
(77, 'Mine Production EQ.', 'Excavator', 'SY500', 'XDTSN800015', 'BP', '0', 'loader', 'inactive', '2023-07-28 04:08:45', '2023-07-31 09:35:27'),
(78, 'Mine Support EQ.', 'Bulldozer', 'D85', 'BDKM85006', 'BP', '0', 'support', 'active', '2023-08-07 03:36:32', '2023-08-07 03:36:32');

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
  `modelunit` varchar(100) NOT NULL,
  `codeunit` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `equipactivity` varchar(100) NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `equipmentmodel`
--

INSERT INTO `equipmentmodel` (`id`, `modelunit`, `codeunit`, `type`, `equipactivity`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'SKT80S', 'XDTSN80001', 'Heavy Dump Truck', 'Active', 'BP', '2023-07-13 07:02:31', '2023-07-13 07:02:31');

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
  `sitecode` varchar(5) NOT NULL,
  `fueldate` date NOT NULL,
  `shiftcode` varchar(15) NOT NULL,
  `fuelcnunit` char(25) NOT NULL,
  `typecode` varchar(30) NOT NULL,
  `fuelmodel` varchar(10) NOT NULL,
  `hmbefore` varchar(25) NOT NULL,
  `hmstart` varchar(10) NOT NULL,
  `fuelcons` varchar(10) NOT NULL,
  `fueltotal` varchar(10) NOT NULL,
  `fuelusage` varchar(10) NOT NULL,
  `fuelob` varchar(10) NOT NULL,
  `fuelcoal` varchar(10) NOT NULL,
  `fuelcoaltransport` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fuel`
--

INSERT INTO `fuel` (`id`, `sitecode`, `fueldate`, `shiftcode`, `fuelcnunit`, `typecode`, `fuelmodel`, `hmbefore`, `hmstart`, `fuelcons`, `fueltotal`, `fuelusage`, `fuelob`, `fuelcoal`, `fuelcoaltransport`, `created_at`, `updated_at`) VALUES
(3, 'BP', '2023-07-20', 'Shift 1', 'XDTSN80002', 'Heavy Dump Truck', 'SKT80S', '16929', '16943', '21.33', '14.00', '192', '-', '-', '-', '2023-07-20 03:44:06', '2023-07-20 03:48:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hauler`
--

CREATE TABLE `hauler` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `codehauler` char(15) NOT NULL,
  `codemodelhauler` char(25) NOT NULL,
  `factor_truck` varchar(5) NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hauler`
--

INSERT INTO `hauler` (`id`, `category`, `type`, `codehauler`, `codemodelhauler`, `factor_truck`, `sitecode`, `created_at`, `updated_at`) VALUES
(23, 'Main Equipment', 'Heavy Dump Truc', 'XDTSN80023', 'SKT80S', ' 19,0', 'BP', NULL, NULL),
(24, 'Main Equipment', 'Heavy Dump Truc', 'XDTSN80024', 'SKT80S', ' 19,0', 'BP', NULL, NULL),
(25, 'Main Equipment', 'Heavy Dump Truc', 'XDTSN80025', 'SKT80S', ' 19,0', 'BP', NULL, NULL),
(26, 'Main Equipment', 'Heavy Dump Truc', 'XDTSN80026', 'SKT80S', ' 19,0', 'BP', NULL, NULL),
(27, 'Main Equipment', 'Heavy Dump Truc', 'XDTSN80027', 'SKT80S', ' 19,0', 'BP', NULL, NULL),
(28, 'Main Equipment', 'Heavy Dump Truc', 'XDTSN80028', 'SKT80S', ' 19,0', 'BP', NULL, NULL),
(29, 'Main Equipment', 'Heavy Dump Truc', 'XDTSN80029', 'SKT80S', ' 19,0', 'BP', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hourly`
--

CREATE TABLE `hourly` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hourmeter`
--

CREATE TABLE `hourmeter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `datehm` date NOT NULL,
  `shift` varchar(15) NOT NULL,
  `nikopthm` varchar(25) NOT NULL,
  `opthm` varchar(100) NOT NULL,
  `modelhm` varchar(25) NOT NULL,
  `cnunithm` varchar(25) NOT NULL,
  `hmawal` varchar(10) NOT NULL,
  `hmakhir` varchar(10) NOT NULL,
  `totalhm` varchar(10) NOT NULL,
  `remarkhm` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hourmeter`
--

INSERT INTO `hourmeter` (`id`, `sitecode`, `datehm`, `shift`, `nikopthm`, `opthm`, `modelhm`, `cnunithm`, `hmawal`, `hmakhir`, `totalhm`, `remarkhm`, `created_at`, `updated_at`) VALUES
(20217, 'BP', '2023-07-20', 'Shift 1', '2020594', 'Aji Saputra', 'SKT80S', 'XDTSN80001', '7460,0', '7498,0', '38.00', '-', '2023-07-20 04:00:39', '2023-07-20 04:00:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `jointsurvey`
--

CREATE TABLE `jointsurvey` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `jointmonth` varchar(100) NOT NULL,
  `material` varchar(100) NOT NULL,
  `jointtotal` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jointsurvey`
--

INSERT INTO `jointsurvey` (`id`, `sitecode`, `jointmonth`, `material`, `jointtotal`, `created_at`, `updated_at`) VALUES
(1, 'BP', '2023-08', 'OB', '4.555', '2023-08-18 02:49:26', '2023-08-18 02:49:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `loader`
--

CREATE TABLE `loader` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL,
  `codemodelloader` char(15) NOT NULL,
  `codeloader` char(10) NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `loader`
--

INSERT INTO `loader` (`id`, `category`, `type`, `codemodelloader`, `codeloader`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'Main Equipment', 'Excavator', 'ZX870H-3F', 'EXHC87001', 'BP', NULL, NULL),
(2, 'Main Equipment', 'Excavator', 'ZX870H-3F', 'EXHC87002', 'BP', NULL, NULL),
(3, 'Main Equipment', 'Excavator', 'ZX870H-LCH', 'EXHC87003', 'BP', NULL, NULL),
(4, 'Main Equipment', 'Excavator', 'ZX870H-LCH', 'EXHC87012', 'BP', NULL, NULL),
(5, 'Main Equipment', 'Excavator', 'PC850R1-8', 'EXKM85001', 'BP', NULL, NULL),
(6, 'Main Equipment', 'Excavator', 'DX700LC', 'EXDS70001', 'BP', NULL, NULL),
(7, 'Main Equipment', 'Excavator', 'SL500LC-V', 'EXDS50002', 'BP', NULL, NULL),
(8, 'Main Equipment', 'Excavator', 'SL500LC-V', 'EXDS50011', 'BP', NULL, NULL),
(9, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50001', 'BP', NULL, NULL),
(10, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50001', 'BP', NULL, NULL),
(11, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50002', 'BP', NULL, NULL),
(12, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50003', 'BP', NULL, NULL),
(13, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50004', 'BP', NULL, NULL),
(14, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50007', 'BP', NULL, NULL),
(15, 'Main Equipment', 'Excavator', 'SY500', 'XEXSN50008', 'BP', NULL, NULL),
(16, 'Main Equipment', 'Excavator', 'KT200', 'XEXKT20009', 'BP', NULL, NULL),
(17, 'Main Equipment', 'Excavator', 'DX225', 'EXDS22002', 'BP', NULL, NULL),
(18, 'Main Equipment', 'Excavator', 'PC200', 'XEXKM20001', 'BP', NULL, NULL),
(19, 'Main Equipment', 'Excavator', 'KC200-6', 'XEXKC20001', 'BP', NULL, NULL),
(20, 'Main Equipment', 'Excavator', 'ZX200-5G', 'EXHC20002', 'BP', NULL, NULL),
(21, 'Main Equipment', 'Excavator', 'PC200', 'EXKM20004', 'BP', NULL, NULL),
(22, 'Main Equipment', 'Excavator', 'EC480DL', 'EXVV48001', 'BP', NULL, NULL),
(23, 'Main Equipment', 'Excavator', 'EC480DL', 'EXVV48005', 'BP', NULL, NULL),
(24, 'Main Equipment', 'Excavator', 'EC480DL', 'EXVV48006', 'BP', NULL, NULL),
(25, 'Main Equipment', 'Excavator', 'EC480DL', 'EXVV48007', 'BP', NULL, NULL),
(26, 'Main Equipment', 'Excavator', 'PC400', 'XEXKM4006B', 'BP', NULL, NULL),
(27, 'Main Equipment', 'Excavator', 'ZX450LC-3F', 'EXHC45002', 'BP', NULL, NULL),
(28, 'Main Equipment', 'Excavator', 'ZX450LC-3F', 'EXHC45003', 'BP', NULL, NULL),
(29, 'Main Equipment', 'Excavator', 'CAT320C', 'EXCT32001', 'BP', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `location`
--

CREATE TABLE `location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `block` varchar(15) NOT NULL,
  `pit` varchar(10) NOT NULL,
  `dumpingarea` varchar(10) NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `location`
--

INSERT INTO `location` (`id`, `block`, `pit`, `dumpingarea`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'PIT ABC', 'PIT ABC', '-', 'BP', NULL, NULL),
(2, 'PIT Midle', 'PIT Midle', '-', 'BP', NULL, NULL),
(3, 'PIT N', 'PIT N', '-', 'BP', NULL, NULL),
(4, 'PIT E', 'PIT E', '-', 'BP', NULL, NULL),
(5, 'PIT E', 'Seam E', '-', 'BP', NULL, NULL),
(6, 'PIT ABG', 'PIT ABG', '-', 'BP', NULL, NULL),
(7, 'PIT ABC', 'Seam A - U', '-', 'BP', NULL, NULL),
(8, 'PIT ABC', 'Seam A - L', '-', 'BP', NULL, NULL),
(9, 'PIT ABC', 'Seam B', '-', 'BP', NULL, NULL),
(10, 'PIT ABC', 'Seam C', '-', 'BP', NULL, NULL),
(11, 'PIT ABC', 'Seam D', '-', 'BP', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `locationtype`
--

CREATE TABLE `locationtype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lokasicode` varchar(100) NOT NULL,
  `lokasidesc` varchar(100) NOT NULL,
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
  `factor` varchar(100) NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `material`
--

INSERT INTO `material` (`id`, `material`, `submaterial`, `factor`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'Waste Removal', 'Top Soil', '2,0', 'BP', '2023-03-28 23:48:39', '2023-07-12 07:21:35'),
(2, 'Waste Removal', 'Top Soil 2', '0,6', 'BP', '2023-03-28 23:48:39', '2023-03-28 23:48:39'),
(3, 'Waste Removal', 'OB', '1,0', 'BP', '2023-03-28 23:48:39', '2023-03-28 23:48:39'),
(4, 'Waste Removal', 'OB', '0,6', 'BP', '2023-07-12 07:13:06', '2023-07-12 07:13:06');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_03_015132_create_operator', 1),
(6, '2023_01_05_064017_create_customer', 1),
(7, '2023_01_05_095151_create_ritasi', 1),
(8, '2023_01_06_041850_create_hourly', 1),
(9, '2023_01_09_041540_create_time', 1),
(10, '2023_01_09_082221_create_site', 1),
(11, '2023_01_12_072109_create_equipment', 1),
(12, '2023_01_12_072139_create_factor', 1),
(13, '2023_01_12_072212_create_location', 1),
(14, '2023_01_12_072245_create_versionplan', 1),
(15, '2023_01_13_015835_create_equipmentcategori', 1),
(16, '2023_01_13_020124_create_dedicated', 1),
(17, '2023_01_13_020213_create_equipmentmodel', 1),
(18, '2023_01_13_020247_create_truckfactor', 1),
(19, '2023_01_13_020352_create_locationtype', 1),
(20, '2023_01_13_020428_create_material', 1),
(21, '2023_01_13_020456_create_submaterial', 1),
(22, '2023_01_13_020524_create_problemtype', 1),
(23, '2023_01_13_020557_create_shiftcode', 1),
(24, '2023_01_13_020650_create_performanceitem', 1),
(25, '2023_01_13_020717_create_activitytype', 1),
(26, '2023_01_17_020835_create_datadrill', 1),
(27, '2023_01_17_022508_create_statusunit', 1),
(28, '2023_01_17_023400_create_rainslippery', 1),
(29, '2023_01_17_023431_create_fuel', 1),
(30, '2023_01_17_023500_create_payload', 1),
(31, '2023_01_17_023615_create_jointsurvey', 1),
(32, '2023_01_17_023700_create_hourmeter', 1),
(33, '2023_01_18_030714_create_sitefactor', 1),
(34, '2023_01_26_101623_create_equipmentfuel', 1),
(35, '2023_01_27_072400_create_locdisposal', 1),
(36, '2023_01_31_071645_create_hauler', 1),
(37, '2023_01_31_071731_create_loader', 1),
(38, '2023_02_07_021920_create_breakdown', 1),
(39, '2023_02_23_073328_create_downtimecategory', 1),
(40, '2023_03_08_101758_create_permission_tables', 1),
(41, '2023_03_10_030145_create_jobs_table', 1),
(42, '2023_04_13_070416_add_approved_column', 2),
(43, '2023_05_23_151105_create_planloader', 3),
(44, '2023_05_23_160807_create_planhauler', 3),
(45, '2023_05_23_165314_create_plansupport', 3),
(46, '2023_05_23_165404_create_planratio', 3),
(47, '2023_05_23_165423_create_planusage', 3),
(48, '2023_05_23_165507_create_plandistance', 3),
(49, '2023_05_23_170429_create_plansite', 3),
(50, '2023_05_23_170450_create_planbudget', 3),
(51, '2023_05_23_170634_create_planweather', 3),
(52, '2023_05_25_132841_create_planproduksi', 3),
(53, '2023_05_31_162501_add_role_to_users', 3),
(54, '2023_06_05_174019_create_permission_tables', 3),
(55, '2023_06_26_163657_create_fuel', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 8),
(4, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `optnik` char(25) NOT NULL,
  `optnama` varchar(30) NOT NULL,
  `optversati` text NOT NULL,
  `optsite` varchar(5) NOT NULL,
  `no_telp` char(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id`, `optnik`, `optnama`, `optversati`, `optsite`, `no_telp`, `created_at`, `updated_at`) VALUES
(44, '2020594', 'Aji Saputra', 'Operator DT Sany', 'BP', '', '2023-03-20 23:49:39', '2023-03-20 23:49:39');

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
  `performancecode` varchar(100) NOT NULL,
  `performancedesc` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2023-06-19 06:23:52', '2023-06-19 06:23:52'),
(2, 'role-create', 'web', '2023-06-19 06:23:52', '2023-06-19 06:23:52'),
(3, 'role-edit', 'web', '2023-06-19 06:23:52', '2023-06-19 06:23:52'),
(4, 'role-delete', 'web', '2023-06-19 06:23:52', '2023-06-19 06:23:52'),
(5, 'ritasi-list', 'web', '2023-06-19 06:23:52', '2023-06-19 06:23:52'),
(6, 'ritasi-create', 'web', '2023-06-19 06:23:52', '2023-06-19 06:23:52'),
(7, 'ritasi-edit', 'web', '2023-06-19 06:23:52', '2023-06-19 06:23:52'),
(8, 'ritasi-delete', 'web', '2023-06-19 06:23:52', '2023-06-19 06:23:52'),
(9, 'users-list', 'web', '2023-06-19 06:23:52', '2023-06-19 06:23:52'),
(10, 'users-create', 'web', '2023-06-19 06:23:52', '2023-06-19 06:23:52'),
(11, 'users-edit', 'web', '2023-06-19 06:23:52', '2023-06-19 06:23:52'),
(12, 'users-delete', 'web', '2023-06-19 06:23:52', '2023-06-19 06:23:52'),
(13, 'customer-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(14, 'customer-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(15, 'customer-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(16, 'customer-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(17, 'operator-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(18, 'operator-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(19, 'operator-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(20, 'operator-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(21, 'site-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(22, 'site-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(23, 'site-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(24, 'site-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(25, 'statusunit-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(26, 'statusunit-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(27, 'statusunit-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(28, 'statusunit-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(29, 'breakdown-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(30, 'breakdown-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(31, 'breakdown-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(32, 'breakdown-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(33, 'rainslippery-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(34, 'rainslippery-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(35, 'rainslippery-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(36, 'rainslippery-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(37, 'fuel-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(38, 'fuel-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(39, 'fuel-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(40, 'fuel-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(41, 'hourmeter-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(42, 'hourmeter-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(43, 'hourmeter-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(44, 'hourmeter-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(45, 'jointsurvey-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(46, 'jointsurvey-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(47, 'jointsurvey-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(48, 'jointsurvey-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(49, 'drill-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(50, 'drill-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(51, 'drill-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(52, 'drill-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(53, 'equipment-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(54, 'equipment-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(55, 'equipment-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(56, 'equipment-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(57, 'sitefactor-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(58, 'sitefactor-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(59, 'sitefactor-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(60, 'sitefactor-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(61, 'location-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(62, 'location-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(63, 'location-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(64, 'location-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(65, 'payload-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(66, 'payload-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(67, 'payload-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(68, 'payload-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(69, 'plandistance-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(70, 'plandistance-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(71, 'plandistance-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(72, 'plandistance-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(73, 'planratio-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(74, 'planratio-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(75, 'planratio-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(76, 'planratio-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(77, 'planusage-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(78, 'planusage-create', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(79, 'planusage-edit', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(80, 'planusage-delete', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(81, 'planhauler-list', 'web', '2023-06-19 06:23:53', '2023-06-19 06:23:53'),
(82, 'planhauler-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(83, 'planhauler-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(84, 'planhauler-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(85, 'planloader-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(86, 'planloader-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(87, 'planloader-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(88, 'planloader-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(89, 'planproduksi-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(90, 'planproduksi-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(91, 'planproduksi-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(92, 'planproduksi-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(93, 'plansupport-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(94, 'plansupport-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(95, 'plansupport-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(96, 'plansupport-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(97, 'planweather-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(98, 'planweather-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(99, 'planweather-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(100, 'planweather-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(101, 'coal-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(102, 'coal-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(103, 'coal-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(104, 'coal-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(105, 'profile-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(106, 'profile-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(107, 'profile-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(108, 'profile-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(109, 'setup.shift-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(110, 'setup.shift-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(111, 'setup.shift-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(112, 'setup.shift-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(113, 'setup.submaterial-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(114, 'setup.submaterial-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(115, 'setup.submaterial-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(116, 'setup.submaterial-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(117, 'setup.time-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(118, 'setup.time-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(119, 'setup.time-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(120, 'setup.time-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(121, 'setup.faktor-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(122, 'setup.faktor-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(123, 'setup.faktor-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(124, 'setup.faktor-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(125, 'setup.equipcategori-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(126, 'setup.equipcategori-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(127, 'setup.equipcategori-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(128, 'setup.equipcategori-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(129, 'setup.equipmodel-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(130, 'setup.equipmodel-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(131, 'setup.equipmodel-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(132, 'setup.equipmodel-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(133, 'setup.problem-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(134, 'setup.problem-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(135, 'setup.problem-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(136, 'setup.problem-delete', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(137, 'setup.material-list', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(138, 'setup.material-create', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(139, 'setup.material-edit', 'web', '2023-06-19 06:23:54', '2023-06-19 06:23:54'),
(140, 'setup.material-delete', 'web', '2023-06-19 06:23:55', '2023-06-19 06:23:55'),
(141, 'setup.dedicated-list', 'web', '2023-06-19 06:23:55', '2023-06-19 06:23:55'),
(142, 'setup.dedicated-create', 'web', '2023-06-19 06:23:55', '2023-06-19 06:23:55'),
(143, 'setup.dedicated-edit', 'web', '2023-06-19 06:23:55', '2023-06-19 06:23:55'),
(144, 'setup.dedicated-delete', 'web', '2023-06-19 06:23:55', '2023-06-19 06:23:55'),
(145, 'setup.downtime-list', 'web', '2023-06-19 06:23:55', '2023-06-19 06:23:55'),
(146, 'setup.downtime-create', 'web', '2023-06-19 06:23:55', '2023-06-19 06:23:55'),
(147, 'setup.downtime-edit', 'web', '2023-06-19 06:23:55', '2023-06-19 06:23:55'),
(148, 'setup.downtime-delete', 'web', '2023-06-19 06:23:55', '2023-06-19 06:23:55');

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
-- Struktur dari tabel `planbudget`
--

CREATE TABLE `planbudget` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `plandistance`
--

CREATE TABLE `plandistance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `tanggal_plandistance` date NOT NULL,
  `plan_distanceob` varchar(10) NOT NULL,
  `plan_distancecoal` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `planhauler`
--

CREATE TABLE `planhauler` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `tanggal_planhauler` date NOT NULL,
  `codemodelhauler` varchar(25) NOT NULL,
  `qty_planhauler` varchar(10) NOT NULL,
  `pa_planhauler` varchar(10) NOT NULL,
  `ua_planhauler` varchar(10) NOT NULL,
  `pty_planhauler` varchar(10) NOT NULL,
  `mohh` varchar(10) NOT NULL,
  `prod_haulerob` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `planhauler`
--

INSERT INTO `planhauler` (`id`, `sitecode`, `tanggal_planhauler`, `codemodelhauler`, `qty_planhauler`, `pa_planhauler`, `ua_planhauler`, `pty_planhauler`, `mohh`, `prod_haulerob`, `created_at`, `updated_at`) VALUES
(3, 'BP', '2023-08-07', 'SKT80S', '20', '2', '2', '300', '24', '3.840', '2023-08-07 03:29:44', '2023-08-07 03:29:44'),
(4, 'BP', '2023-08-07', 'SKT80S', '20', '20', '2', '300', '23', '368.000', '2023-08-07 04:26:52', '2023-08-07 04:26:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `planloader`
--

CREATE TABLE `planloader` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `tanggal_planloader` date NOT NULL,
  `codemodelloader` char(25) NOT NULL,
  `qty_planloader` varchar(10) NOT NULL,
  `pa_planloader` varchar(10) NOT NULL,
  `ua_planloader` varchar(10) NOT NULL,
  `pty_planloader` varchar(10) NOT NULL,
  `mohh_planloader` varchar(10) NOT NULL,
  `prod_loaderob` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `planloader`
--

INSERT INTO `planloader` (`id`, `sitecode`, `tanggal_planloader`, `codemodelloader`, `qty_planloader`, `pa_planloader`, `ua_planloader`, `pty_planloader`, `mohh_planloader`, `prod_loaderob`, `created_at`, `updated_at`) VALUES
(2, 'BP', '2023-06-23', 'ZX870H-3F', '4', '0,85%', '0,60%', '300', '24', '14.688', '2023-06-23 06:47:05', '2023-06-23 06:47:05'),
(3, 'BP', '2023-06-23', 'ZX870H-3F', '4', '0.85%', '0.60%', '300', '24', '14.688', '2023-06-23 06:50:35', '2023-06-23 06:50:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `planproduksi`
--

CREATE TABLE `planproduksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `tanggal_planproduksi` date NOT NULL,
  `plan_site` varchar(10) NOT NULL,
  `plan_budget` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `planproduksi`
--

INSERT INTO `planproduksi` (`id`, `sitecode`, `tanggal_planproduksi`, `plan_site`, `plan_budget`, `created_at`, `updated_at`) VALUES
(2, 'BP', '2023-07-21', '10.000', '12.000', '2023-07-21 06:40:01', '2023-07-21 06:40:01'),
(3, 'BP', '2023-07-21', '11.000', '12.000', '2023-07-24 07:39:59', '2023-07-24 07:39:59'),
(4, 'BP', '2023-08-01', '101.000', '25.000', '2023-08-16 09:34:35', '2023-08-16 09:34:35'),
(5, 'BAS', '2023-08-01', '25.000', '25.000', '2023-08-16 09:34:51', '2023-08-16 09:34:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `planratio`
--

CREATE TABLE `planratio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `tanggal_planratio` date NOT NULL,
  `frob` varchar(10) NOT NULL,
  `frcoal` varchar(10) NOT NULL,
  `frtotal` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `plansite`
--

CREATE TABLE `plansite` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `plansupport`
--

CREATE TABLE `plansupport` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `tanggal_plansupport` date NOT NULL,
  `codemodelsupport` char(25) NOT NULL,
  `qty_plansupport` varchar(10) NOT NULL,
  `pa_plansupport` varchar(10) NOT NULL,
  `ua_plansupport` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `plansupport`
--

INSERT INTO `plansupport` (`id`, `sitecode`, `tanggal_plansupport`, `codemodelsupport`, `qty_plansupport`, `pa_plansupport`, `ua_plansupport`, `created_at`, `updated_at`) VALUES
(2, 'BP', '2023-08-01', 'D85', '400', '400', '100', '2023-08-07 04:08:07', '2023-08-07 04:08:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `planusage`
--

CREATE TABLE `planusage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `tanggal_planusage` varchar(25) NOT NULL,
  `fuelusage` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `planusage`
--

INSERT INTO `planusage` (`id`, `sitecode`, `tanggal_planusage`, `fuelusage`, `created_at`, `updated_at`) VALUES
(1, 'BP', '2023-07', '192', '2023-07-12 09:20:13', '2023-07-12 09:20:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `planweather`
--

CREATE TABLE `planweather` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `tanggal_planweather` date NOT NULL,
  `plan_rain` varchar(10) NOT NULL,
  `plan_slippery` varchar(10) NOT NULL,
  `plan_total` varchar(10) NOT NULL,
  `plan_rainfall` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `planweather`
--

INSERT INTO `planweather` (`id`, `sitecode`, `tanggal_planweather`, `plan_rain`, `plan_slippery`, `plan_total`, `plan_rainfall`, `created_at`, `updated_at`) VALUES
(2, 'BP', '2023-08-07', '2', '2', '4', '1', '2023-08-07 07:15:22', '2023-08-07 07:15:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `problemtype`
--

CREATE TABLE `problemtype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodproblem` varchar(100) NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `problemtype`
--

INSERT INTO `problemtype` (`id`, `prodproblem`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'Disposal Condition', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27'),
(2, 'Double Bench', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27'),
(3, 'Dusty', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27'),
(4, 'Front Condition', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27'),
(5, 'Material Lumpur', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27'),
(6, 'Material Keras', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27'),
(7, 'Operator Skill', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27'),
(8, 'Road Condition', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27'),
(9, 'ROM Crowded', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27'),
(10, 'Selective Loading', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27'),
(11, 'Top Loading', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27'),
(12, 'Truck Kurang', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27'),
(13, 'Visibility', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27'),
(14, 'Under Speed', 'BP', '2023-03-29 00:47:27', '2023-03-29 00:47:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rainslippery`
--

CREATE TABLE `rainslippery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `rainslipdate` date NOT NULL,
  `rainslipshift` varchar(100) NOT NULL,
  `rainstart` varchar(100) NOT NULL,
  `rainend` varchar(100) NOT NULL,
  `rainhour` varchar(100) NOT NULL,
  `slipperystart` varchar(100) NOT NULL,
  `slipperyend` varchar(100) NOT NULL,
  `slipperyhour` varchar(100) NOT NULL,
  `rainfall` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rainslippery`
--

INSERT INTO `rainslippery` (`id`, `sitecode`, `rainslipdate`, `rainslipshift`, `rainstart`, `rainend`, `rainhour`, `slipperystart`, `slipperyend`, `slipperyhour`, `rainfall`, `created_at`, `updated_at`) VALUES
(57, 'BP', '2023-07-25', 'Shift 1', '09:00', '12:00', '3.00', '12:00', '14:00', '2.00', '12,7', '2023-07-25 04:36:33', '2023-07-25 04:36:33'),
(58, 'BAS', '2023-07-25', 'Shift 1', '08:00', '12:00', '4.00', '12:00', '12:45', '0.75', '12,7', '2023-07-25 04:36:53', '2023-07-25 04:36:53'),
(59, 'GAM', '2023-07-25', 'Shift 1', '08:00', '12:00', '4.00', '12:00', '12:45', '0.75', '12,7', '2023-08-03 03:02:31', '2023-08-03 03:02:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ritasi`
--

CREATE TABLE `ritasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(10) NOT NULL,
  `time` varchar(25) NOT NULL,
  `nikloader` char(25) NOT NULL,
  `oploader` varchar(30) NOT NULL,
  `nikhauler` char(25) NOT NULL,
  `ophauler` varchar(30) NOT NULL,
  `codeloader` char(25) NOT NULL,
  `modelloader` varchar(25) NOT NULL,
  `codehauler` char(25) NOT NULL,
  `modelhauler` varchar(25) NOT NULL,
  `block` varchar(10) NOT NULL,
  `pit` varchar(10) NOT NULL,
  `distance` varchar(10) NOT NULL,
  `ritase` int(5) NOT NULL,
  `material` varchar(25) NOT NULL,
  `submaterial` varchar(25) NOT NULL,
  `produksi` int(10) DEFAULT NULL,
  `adjustment` int(10) DEFAULT NULL,
  `distvol` int(10) NOT NULL,
  `factor` varchar(25) NOT NULL,
  `detail` text NOT NULL,
  `dumping` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ritasi`
--

INSERT INTO `ritasi` (`id`, `sitecode`, `date`, `shift`, `time`, `nikloader`, `oploader`, `nikhauler`, `ophauler`, `codeloader`, `modelloader`, `codehauler`, `modelhauler`, `block`, `pit`, `distance`, `ritase`, `material`, `submaterial`, `produksi`, `adjustment`, `distvol`, `factor`, `detail`, `dumping`, `created_at`, `updated_at`) VALUES
(16262, 'GAM', '2023-07-07', 'Shift 1', '11.00-12.00', '1800585', 'Agung Setiawan', '1800585', 'Agung Setiawan', 'EXHC87001', 'ZX870H-3F', 'XDTSN80001', 'SKT80S', 'PIT ABC', 'PIT ABC', '2.000', 1, 'Waste Removal', 'OB', 19, 19, 38, 'Disposal Condition', '-', '-', '2023-07-10 07:33:41', '2023-07-10 07:33:41'),
(16266, 'BP', '2023-07-07', 'Shift 1', '08.00-09.00', '2020594', 'Aji Saputra', '2020594', 'Aji Saputra', 'EXHC87001', 'ZX870H-3F', 'XDTSN80001', 'SKT80S', 'PIT ABC', 'PIT ABC', '2.411', 1, 'Waste Removal', 'OB', 19, 19, 46, 'Disposal Condition', '-', '-', '2023-07-12 02:49:26', '2023-07-12 02:49:26'),
(16267, 'BAS', '2023-07-07', 'Shift 1', '07.00-08.00', '1800585', 'Aji Saputra', '2020594', 'Aji Saputra', 'EXHC87001', 'ZX870H-3F', 'XDTSN80001', 'SKT80S', 'PIT ABC', 'PIT ABC', '2.000', 3, 'Waste Removal', 'OB', 57, 57, 114, 'Disposal Condition', '-', '-', '2023-07-12 06:59:28', '2023-07-12 06:59:28'),
(16268, 'BAS', '2023-07-07', 'Shift 1', '07.00-08.00', '1800585', 'Aji Saputra', '2020594', 'Aji Saputra', 'EXHC87001', 'ZX870H-3F', 'XDTSN80023', 'SKT80S', 'PIT ABC', 'PIT ABC', '2.000', 3, 'Waste Removal', 'OB', 57, 57, 114, 'Disposal Condition', '-', '-', '2023-07-18 07:14:59', '2023-07-18 07:14:59'),
(16271, 'BP', '2023-07-07', 'Shift 1', '07.00-08.00', '2020594', 'Aji Saputra', '2020594', 'Aji Saputra', 'EXHC12001', 'SY500', 'XDTSN800011', 'SKT80S', 'PIT ABC', 'PIT ABC', '2.141', 3, 'Waste Removal', 'OB', 63, 63, 135, 'Disposal Condition', '-', '-', '2023-07-31 06:51:07', '2023-07-31 06:51:07'),
(16272, 'GAM', '2023-07-07', 'Shift 1', '07.00-08.00', '2020594', 'Aji Saputra', '2020594', 'Aji Saputra', 'EXHC12001', 'SY500', 'XDTSN800011', 'SKT80S', 'PIT ABC', 'PIT ABC', '2.000', 1, 'Waste Removal', 'OB', 21, 21, 42, 'Disposal Condition', '-', '-', '2023-07-31 09:32:36', '2023-07-31 09:32:36'),
(16273, 'BP', '2023-08-07', 'Shift 1', '11.00-12.00', '2020594', 'Aji Saputra', '2020594', 'Aji Saputra', 'EXHC12001', 'SY500', 'XDTSN800014', 'SKT80S', 'PIT ABC', 'PIT ABC', '2.141', 3, 'Waste Removal', 'OB', 63, 63, 135, 'Disposal Condition', '-', '-', '2023-08-01 03:05:51', '2023-08-01 03:05:51'),
(16274, 'BP', '2023-08-18', 'Shift 1', '07.00-08.00', '2020594', 'Aji Saputra', '2020594', 'Aji Saputra', 'XDTSN800010', 'SY500', 'XDTSN800013', 'SKT80S', 'PIT ABC', 'PIT ABC', '2.141', 3, 'Waste Removal', 'OB', 57, 57, 122, 'Disposal Condition', '-', '-', '2023-08-18 03:11:19', '2023-08-18 03:11:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'web', '2023-06-19 07:45:48', '2023-06-19 07:45:48'),
(3, 'BP', 'web', '2023-06-19 07:48:12', '2023-06-19 07:48:12'),
(4, 'BAS', 'web', '2023-06-19 07:49:56', '2023-06-19 07:49:56'),
(5, 'GAM', 'web', '2023-07-11 03:10:29', '2023-07-11 03:10:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(7, 2),
(7, 5),
(8, 2),
(8, 5),
(9, 2),
(9, 5),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(17, 3),
(17, 4),
(18, 2),
(18, 3),
(18, 4),
(19, 2),
(19, 3),
(19, 4),
(20, 2),
(20, 3),
(20, 4),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(25, 3),
(25, 4),
(26, 2),
(26, 3),
(26, 4),
(27, 2),
(28, 2),
(29, 2),
(29, 3),
(29, 4),
(30, 2),
(30, 3),
(30, 4),
(31, 2),
(32, 2),
(33, 2),
(33, 3),
(33, 4),
(34, 2),
(34, 3),
(34, 4),
(35, 2),
(36, 2),
(37, 2),
(37, 3),
(37, 4),
(38, 2),
(38, 3),
(38, 4),
(39, 2),
(40, 2),
(41, 2),
(41, 3),
(41, 4),
(42, 2),
(42, 3),
(42, 4),
(43, 2),
(44, 2),
(45, 2),
(45, 3),
(45, 4),
(45, 5),
(46, 2),
(46, 3),
(46, 4),
(46, 5),
(47, 2),
(47, 5),
(48, 2),
(49, 2),
(49, 3),
(49, 4),
(50, 2),
(50, 3),
(50, 4),
(51, 2),
(52, 2),
(53, 2),
(53, 3),
(53, 4),
(54, 2),
(54, 3),
(54, 4),
(55, 2),
(56, 2),
(57, 2),
(57, 3),
(57, 4),
(58, 2),
(58, 3),
(58, 4),
(59, 2),
(60, 2),
(61, 2),
(61, 3),
(61, 4),
(62, 2),
(62, 3),
(62, 4),
(63, 2),
(64, 2),
(65, 2),
(65, 3),
(66, 2),
(66, 3),
(67, 2),
(68, 2),
(69, 2),
(69, 3),
(69, 4),
(70, 2),
(70, 3),
(70, 4),
(71, 2),
(72, 2),
(73, 2),
(73, 3),
(73, 4),
(74, 2),
(74, 3),
(74, 4),
(75, 2),
(76, 2),
(77, 2),
(77, 3),
(77, 4),
(78, 2),
(78, 3),
(78, 4),
(79, 2),
(80, 2),
(81, 2),
(81, 3),
(81, 4),
(82, 2),
(82, 3),
(82, 4),
(83, 2),
(84, 2),
(85, 2),
(85, 3),
(85, 4),
(86, 2),
(86, 3),
(86, 4),
(87, 2),
(88, 2),
(89, 2),
(89, 3),
(89, 4),
(90, 2),
(90, 3),
(90, 4),
(91, 2),
(92, 2),
(93, 2),
(93, 3),
(93, 4),
(94, 2),
(94, 3),
(94, 4),
(95, 2),
(96, 2),
(97, 2),
(97, 3),
(97, 4),
(98, 2),
(98, 3),
(98, 4),
(99, 2),
(100, 2),
(101, 2),
(101, 3),
(101, 4),
(102, 2),
(102, 3),
(102, 4),
(103, 2),
(104, 2),
(105, 2),
(105, 3),
(105, 4),
(106, 2),
(106, 3),
(106, 4),
(107, 2),
(107, 3),
(107, 4),
(108, 2),
(109, 2),
(110, 2),
(111, 2),
(112, 2),
(113, 2),
(114, 2),
(115, 2),
(116, 2),
(117, 2),
(118, 2),
(119, 2),
(120, 2),
(121, 2),
(122, 2),
(123, 2),
(124, 2),
(125, 2),
(126, 2),
(127, 2),
(128, 2),
(129, 2),
(130, 2),
(131, 2),
(132, 2),
(133, 2),
(134, 2),
(135, 2),
(136, 2),
(137, 2),
(138, 2),
(139, 2),
(140, 2),
(141, 2),
(142, 2),
(143, 2),
(144, 2),
(145, 2),
(146, 2),
(147, 2),
(148, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shiftcode`
--

CREATE TABLE `shiftcode` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shift` varchar(10) NOT NULL,
  `shiftcode` varchar(10) NOT NULL,
  `startshift` varchar(10) NOT NULL,
  `endshift` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `shiftcode`
--

INSERT INTO `shiftcode` (`id`, `shift`, `shiftcode`, `startshift`, `endshift`, `created_at`, `updated_at`) VALUES
(3, 'Shift 1', 'shift 1', '08.00', '09.00', '2023-07-12 08:45:26', '2023-07-12 08:45:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `site`
--

CREATE TABLE `site` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `sitedesc` text NOT NULL,
  `siteaddress` varchar(100) NOT NULL,
  `customercode` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `site`
--

INSERT INTO `site` (`id`, `sitecode`, `sitedesc`, `siteaddress`, `customercode`, `created_at`, `updated_at`) VALUES
(1, 'BP', '', '', '', NULL, NULL),
(2, 'BAS', '', '', '', NULL, NULL),
(3, 'GAM', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sitefactor`
--

CREATE TABLE `sitefactor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitefactorcode` varchar(100) NOT NULL,
  `sitecode` varchar(100) NOT NULL,
  `factorcode` varchar(100) NOT NULL,
  `startdate` varchar(100) NOT NULL,
  `enddate` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sitefactor`
--

INSERT INTO `sitefactor` (`id`, `sitefactorcode`, `sitecode`, `factorcode`, `startdate`, `enddate`, `created_at`, `updated_at`) VALUES
(1, '-', 'BP', 'Licin', '-', '-', '2023-07-11 03:06:17', '2023-07-11 03:06:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statusunit`
--

CREATE TABLE `statusunit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `statusunitdate` date NOT NULL,
  `statusopt` varchar(30) NOT NULL,
  `statusnikopt` char(25) NOT NULL,
  `statuscnunit` char(25) NOT NULL,
  `statusmodel` varchar(25) NOT NULL,
  `statusitemcat` varchar(25) NOT NULL,
  `statuscategory` varchar(15) NOT NULL,
  `statusstart` varchar(10) NOT NULL,
  `statusend` varchar(10) NOT NULL,
  `statushour` varchar(10) NOT NULL,
  `statusshift` varchar(10) NOT NULL,
  `statuscode` varchar(10) NOT NULL,
  `dedicated` text NOT NULL,
  `statusremark` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `statusunit`
--

INSERT INTO `statusunit` (`id`, `sitecode`, `statusunitdate`, `statusopt`, `statusnikopt`, `statuscnunit`, `statusmodel`, `statusitemcat`, `statuscategory`, `statusstart`, `statusend`, `statushour`, `statusshift`, `statuscode`, `dedicated`, `statusremark`, `created_at`, `updated_at`) VALUES
(10432, 'BP', '2023-07-18', 'Aji Saputra', '2020594', 'XDTSN80023', 'SKT80S', 'BD Accident', 'Standby', '20:00', '02:10', '6.17', 'Shift 1', '2', 'Waste Removal', '-', '2023-07-18 07:12:07', '2023-07-18 10:26:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submaterial`
--

CREATE TABLE `submaterial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subdesc` varchar(100) NOT NULL,
  `subcode` varchar(100) NOT NULL,
  `materialcode` varchar(100) NOT NULL,
  `materialfactor` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `time`
--

CREATE TABLE `time` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categori` varchar(25) NOT NULL,
  `time` varchar(25) NOT NULL,
  `jam` varchar(25) NOT NULL,
  `shift` varchar(25) NOT NULL,
  `calculation` varchar(25) NOT NULL,
  `number` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `time`
--

INSERT INTO `time` (`id`, `categori`, `time`, `jam`, `shift`, `calculation`, `number`, `created_at`, `updated_at`) VALUES
(50, 'B', '07.00-08.00', '07:00', 'Shift 1', '0,29', '2', '2023-04-11 01:09:31', '2023-04-11 01:09:31'),
(51, 'C', '08.00-09.00', '08:00', 'Shift 1', '0,33', '3', '2023-04-11 01:09:31', '2023-04-11 01:09:31'),
(53, 'B', '10.00-11.00', '10:00', 'Shift 1', '0,41', '5', '2023-04-11 01:09:31', '2023-04-11 01:09:31'),
(54, 'C', '11.00-12.00', '11:00', 'Shift 1', '0,46', '6', '2023-04-11 01:09:31', '2023-04-11 01:09:31'),
(56, 'A', '06.30-07.20', '06.30', 'Shift 1', '0,27', '1', '2023-07-12 09:24:05', '2023-08-04 08:21:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `truckfactor`
--

CREATE TABLE `truckfactor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `truck` varchar(25) NOT NULL,
  `factor` varchar(10) NOT NULL,
  `sitecode` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `truckfactor`
--

INSERT INTO `truckfactor` (`id`, `truck`, `factor`, `sitecode`, `created_at`, `updated_at`) VALUES
(1, 'SKT90S', '17', 'BP', '2023-07-13 08:00:03', '2023-07-13 08:00:03'),
(2, 'SKT80S', '17', 'BP', '2023-07-13 08:04:56', '2023-07-13 08:04:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `last_seen`, `created_at`, `updated_at`) VALUES
(5, 'Admin', 'admin@titanmining.co.id', '2023-08-19 04:36:03', '$2y$10$1qDXUXTeeUF3hp1ueT7ixe2gi5UpJEeYkh58bGYg7WkfLLmS.Oxb2', NULL, '2023-08-19 04:36:03', '2023-06-19 09:27:15', '2023-08-19 04:36:03'),
(6, 'Maulana', 'maulana@titanmining.co.id', '2023-07-11 03:09:10', '$2y$10$.hrtWph4kBSr9E1H88pXouSIiXrLc1YPcw5pMWCnrvjCmJxknq3Yy', NULL, NULL, '2023-07-11 03:09:10', '2023-07-11 03:09:10'),
(7, 'Admin BAS', 'adminBAS@titanmining.co.id', '2023-07-26 09:37:47', '$2y$10$liOEUhkr4UJnmMulDVSfk.h9RV5VAhfI4Sg217N49T6i9ZRXobHfq', NULL, '2023-07-26 09:37:47', '2023-07-26 07:25:23', '2023-07-26 09:37:47'),
(8, 'Admin BP', 'adminBP@titanmining.co.id', '2023-08-16 10:23:30', '$2y$10$/1FCytC9Fl8Rg1gvrN1ix.CrMbGNWFxwPcXQCqIhBFoEatVS4NE8.', NULL, '2023-08-16 10:23:30', '2023-07-26 09:23:13', '2023-08-16 10:23:30');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`sitecode`,`breakdate`,`breakmodel`,`breakcnunit`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`cscode`,`cstelp`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`codeunit`) USING BTREE;

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`sitecode`,`shiftcode`,`fueldate`,`typecode`,`fuelcnunit`,`fuelmodel`,`hmstart`,`fuelcons`,`fuelusage`,`fuelob`,`fuelcoal`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`nikopthm`,`cnunithm`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`no_telp`,`optnik`) USING BTREE;

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
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `planbudget`
--
ALTER TABLE `planbudget`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `plandistance`
--
ALTER TABLE `plandistance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`sitecode`,`tanggal_plandistance`,`plan_distanceob`,`plan_distancecoal`);

--
-- Indeks untuk tabel `planhauler`
--
ALTER TABLE `planhauler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`sitecode`,`tanggal_planhauler`,`codemodelhauler`,`qty_planhauler`,`pa_planhauler`,`ua_planhauler`);

--
-- Indeks untuk tabel `planloader`
--
ALTER TABLE `planloader`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`sitecode`,`tanggal_planloader`,`codemodelloader`,`qty_planloader`,`pa_planloader`,`ua_planloader`);

--
-- Indeks untuk tabel `planproduksi`
--
ALTER TABLE `planproduksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`sitecode`,`tanggal_planproduksi`,`plan_site`,`plan_budget`);

--
-- Indeks untuk tabel `planratio`
--
ALTER TABLE `planratio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`sitecode`,`tanggal_planratio`,`frob`,`frcoal`);

--
-- Indeks untuk tabel `plansite`
--
ALTER TABLE `plansite`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `plansupport`
--
ALTER TABLE `plansupport`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `planusage`
--
ALTER TABLE `planusage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`sitecode`,`tanggal_planusage`);

--
-- Indeks untuk tabel `planweather`
--
ALTER TABLE `planweather`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`sitecode`,`tanggal_planweather`,`plan_rain`,`plan_slippery`,`plan_rainfall`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ritasi_id_unique` (`date`,`time`,`nikloader`,`nikhauler`,`codeloader`,`codehauler`,`material`,`ritase`,`produksi`,`adjustment`,`distvol`) USING BTREE;

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `shiftcode`
--
ALTER TABLE `shiftcode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`sitecode`,`customercode`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1359;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `datadrill`
--
ALTER TABLE `datadrill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dedicated`
--
ALTER TABLE `dedicated`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `downtimecategory`
--
ALTER TABLE `downtimecategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `equipmentcategori`
--
ALTER TABLE `equipmentcategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `equipmentfuel`
--
ALTER TABLE `equipmentfuel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `equipmentmodel`
--
ALTER TABLE `equipmentmodel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `hauler`
--
ALTER TABLE `hauler`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `hourly`
--
ALTER TABLE `hourly`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hourmeter`
--
ALTER TABLE `hourmeter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20218;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jointsurvey`
--
ALTER TABLE `jointsurvey`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `loader`
--
ALTER TABLE `loader`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `location`
--
ALTER TABLE `location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `planbudget`
--
ALTER TABLE `planbudget`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `plandistance`
--
ALTER TABLE `plandistance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `planhauler`
--
ALTER TABLE `planhauler`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `planloader`
--
ALTER TABLE `planloader`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `planproduksi`
--
ALTER TABLE `planproduksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `planratio`
--
ALTER TABLE `planratio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `plansite`
--
ALTER TABLE `plansite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `plansupport`
--
ALTER TABLE `plansupport`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `planusage`
--
ALTER TABLE `planusage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `planweather`
--
ALTER TABLE `planweather`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `problemtype`
--
ALTER TABLE `problemtype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `rainslippery`
--
ALTER TABLE `rainslippery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `ritasi`
--
ALTER TABLE `ritasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16275;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `shiftcode`
--
ALTER TABLE `shiftcode`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `site`
--
ALTER TABLE `site`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sitefactor`
--
ALTER TABLE `sitefactor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `statusunit`
--
ALTER TABLE `statusunit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10433;

--
-- AUTO_INCREMENT untuk tabel `submaterial`
--
ALTER TABLE `submaterial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `time`
--
ALTER TABLE `time`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `truckfactor`
--
ALTER TABLE `truckfactor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `versionplan`
--
ALTER TABLE `versionplan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
