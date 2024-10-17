-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Okt 2024 pada 09.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `analist_db`
--
CREATE DATABASE IF NOT EXISTS `analist_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `analist_db`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `analists`
--

CREATE TABLE `analists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_material` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `file_pdf` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `analists`
--

INSERT INTO `analists` (`id`, `nama_material`, `qty`, `keterangan`, `tanggal`, `gambar`, `file_pdf`, `created_at`, `updated_at`) VALUES
(138, 'bullion nikel hydroxide pt nebraksa', '1', '-', '2024-10-17', '1729149072.jpg', '1728543461.pdf', '2024-10-09 23:57:41', '2024-10-17 00:11:12'),
(139, 'bullion nikel Carbonate pt nebraksa', '-', '-', '0000-00-00', NULL, '1728543495.pdf', '2024-10-09 23:58:15', '2024-10-09 23:58:15'),
(140, 'bullion tembaga pt nebraksa', '-', '-', '0000-00-00', NULL, '1728543549.pdf', '2024-10-09 23:59:09', '2024-10-09 23:59:09'),
(141, 'Nickel carbonate PT nebraksa .', '-', '-', '0000-00-00', NULL, '1728543753.pdf', '2024-10-10 00:02:33', '2024-10-10 00:02:33'),
(142, 'Nickel hydroxide PT nebraksa .', '-', '-', '0000-00-00', NULL, '1728543808.pdf', '2024-10-10 00:03:28', '2024-10-10 00:03:28'),
(143, 'plat tembaga PT nebraksa .', '-', '-', '0000-00-00', NULL, '1728543969.pdf', '2024-10-10 00:06:09', '2024-10-10 00:06:09'),
(144, 'kabel 2 (bullion)', '-', '-', '0000-00-00', NULL, '1728550656.pdf', '2024-10-10 01:57:36', '2024-10-10 01:57:36'),
(145, 'sample pa ade', '-', '-', '0000-00-00', NULL, '1728550704.pdf', '2024-10-10 01:58:24', '2024-10-10 01:58:24'),
(146, 'magnet hardist', '-', '-', '0000-00-00', NULL, '1728550735.pdf', '2024-10-10 01:58:55', '2024-10-10 01:58:55'),
(147, 'Cu granul.', '-', '-', '0000-00-00', NULL, '1728550779.pdf', '2024-10-10 01:59:39', '2024-10-10 01:59:39'),
(148, 'jarum kertas', '-', '-', '0000-00-00', NULL, '1728550801.pdf', '2024-10-10 02:00:01', '2024-10-10 02:00:01'),
(149, 'kabel 1 (bullion)', '-', '-', '0000-00-00', NULL, '1728550827.pdf', '2024-10-10 02:00:27', '2024-10-10 02:00:27'),
(150, 'kabel 1.', '-', '-', '0000-00-00', NULL, '1728550860.pdf', '2024-10-10 02:01:00', '2024-10-10 02:01:00'),
(151, 'sample turki 3.', '-', '-', '0000-00-00', NULL, '1728550884.pdf', '2024-10-10 02:01:25', '2024-10-10 02:01:25'),
(152, 'sample turki.', '-', '-', '0000-00-00', NULL, '1728550913.pdf', '2024-10-10 02:01:53', '2024-10-10 02:01:53'),
(153, '2-3% sample', '-', '-', '0000-00-00', NULL, '1728550979.pdf', '2024-10-10 02:02:59', '2024-10-10 02:02:59'),
(154, '8-11% sample', '-', '-', '0000-00-00', NULL, '1728551008.pdf', '2024-10-10 02:03:28', '2024-10-10 02:03:28'),
(155, 'sample turki 4.', '-', '-', '0000-00-00', NULL, '1728551098.pdf', '2024-10-10 02:04:58', '2024-10-10 02:04:58'),
(156, 'tembaga batu', '-', '-', '0000-00-00', NULL, '1728551131.pdf', '2024-10-10 02:05:31', '2024-10-10 02:05:31'),
(157, 'tembaga campur 3', '-', '-', '0000-00-00', NULL, '1728723185.pdf', '2024-10-10 02:06:03', '2024-10-12 01:53:05'),
(158, 'tembaga plat.', '-', '-', '0000-00-00', NULL, '1728551194.pdf', '2024-10-10 02:06:34', '2024-10-10 02:06:34'),
(159, 'tembaga serbuk', '-', '-', '0000-00-00', NULL, '1728551220.pdf', '2024-10-10 02:07:00', '2024-10-10 02:07:00'),
(160, 'bullion kabel rf', '-', '-', '0000-00-00', NULL, '1728611795.pdf', '2024-10-10 18:56:35', '2024-10-10 18:56:35'),
(161, 'Bullion kabel RF 2.', '-', '-', '0000-00-00', NULL, '1728613734.pdf', '2024-10-10 19:28:54', '2024-10-10 19:28:54'),
(162, 'plat RF-', '-', '-', '0000-00-00', NULL, '1728614354.pdf', '2024-10-10 19:39:14', '2024-10-10 19:39:14'),
(163, 'plat RF 2', '-', '-', '0000-00-00', NULL, '1728614401.pdf', '2024-10-10 19:40:01', '2024-10-10 19:40:01'),
(164, 'Al Plat RF', '-', '-', '0000-00-00', NULL, '1728614872.pdf', '2024-10-10 19:47:53', '2024-10-10 19:47:53'),
(165, 'Al RF Mangkuk siku', '-', '-', '0000-00-00', NULL, '1728614999.pdf', '2024-10-10 19:49:59', '2024-10-10 19:49:59'),
(166, 'Al RF Mangkuk siku 1', '-', '-', '0000-00-00', NULL, '1728615145.pdf', '2024-10-10 19:52:25', '2024-10-10 19:52:25'),
(167, 'Al RF Mangkuk siku 2', '-', '-', '0000-00-00', NULL, '1728615380.pdf', '2024-10-10 19:56:21', '2024-10-10 19:56:21'),
(168, 'Al RF bunga Ag', '-', '-', '0000-00-00', NULL, '1728616447.pdf', '2024-10-10 20:14:07', '2024-10-10 20:14:07'),
(169, 'bunga RF 2', '-', '-', '0000-00-00', NULL, '1728616496.pdf', '2024-10-10 20:14:56', '2024-10-10 20:14:56'),
(170, 'Al bunga RF', '-', '-', '0000-00-00', NULL, '1728616669.pdf', '2024-10-10 20:17:49', '2024-10-10 20:17:49'),
(171, 'Al RF siku 1B', '--', '-', '0000-00-00', NULL, '1728616828.pdf', '2024-10-10 20:20:28', '2024-10-10 20:20:28'),
(172, 'Al RF siku 2B', '-', '-', '0000-00-00', NULL, '1728617461.pdf', '2024-10-10 20:31:01', '2024-10-10 20:31:01'),
(173, 'Al ex RF 3.', '-', '-', '0000-00-00', NULL, '1728617864.pdf', '2024-10-10 20:37:44', '2024-10-10 20:37:44'),
(174, 'Al ex RF 2', '-', '-', '0000-00-00', NULL, '1728618007.pdf', '2024-10-10 20:40:07', '2024-10-10 20:40:07'),
(175, 'Al ex RF 1', '-', '-', '0000-00-00', NULL, '1728618080.pdf', '2024-10-10 20:41:20', '2024-10-10 20:41:20'),
(176, 'kabel RF powder', '-', '-', '0000-00-00', NULL, '1728618228.pdf', '2024-10-10 20:43:48', '2024-10-10 20:43:48'),
(177, 'Ingot dari kabel RF', '-', '-', '0000-00-00', NULL, '1728618789.pdf', '2024-10-10 20:52:26', '2024-10-10 20:53:10'),
(178, 'Granul kabel RF 2', '-', '-', '0000-00-00', NULL, '1728619393.pdf', '2024-10-10 21:03:13', '2024-10-10 21:03:13'),
(179, 'Granul kabel RF 1', '-', '-', '0000-00-00', NULL, '1728619442.pdf', '2024-10-10 21:04:02', '2024-10-10 21:04:02'),
(180, 'sample RF pipa kecil', '-', '-', '0000-00-00', NULL, '1728619764.pdf', '2024-10-10 21:09:24', '2024-10-10 21:09:24'),
(181, 'Tebal RF 3', '-', '-', '0000-00-00', NULL, '1728620126.pdf', '2024-10-10 21:15:26', '2024-10-10 21:15:26'),
(182, 'Tebal RF 1.', '-', '-', '0000-00-00', NULL, '1728620177.pdf', '2024-10-10 21:16:17', '2024-10-10 21:16:17'),
(183, 'Tebal RF 2', '-', '-', '0000-00-00', NULL, '1728620254.pdf', '2024-10-10 21:17:34', '2024-10-10 21:17:34'),
(184, 'Batang RF 1', '-', '-', '0000-00-00', NULL, '1728620335.pdf', '2024-10-10 21:18:55', '2024-10-10 21:18:55'),
(185, 'Batang RF 2', '-', '-', '0000-00-00', NULL, '1728620377.pdf', '2024-10-10 21:19:37', '2024-10-10 21:19:37'),
(186, 'Batang RF 3', '-', '-', '0000-00-00', NULL, '1728620426.pdf', '2024-10-10 21:20:26', '2024-10-10 21:20:26'),
(187, 'Al plat seng RF', '-', '-', '0000-00-00', NULL, '1728620626.pdf', '2024-10-10 21:23:46', '2024-10-10 21:23:46'),
(188, 'Al pipa RF', '-', '-', '0000-00-00', NULL, '1728626122.pdf', '2024-10-10 22:55:22', '2024-10-10 22:55:22'),
(189, 'kuningan x Rf ex M2', '-', '-', '0000-00-00', NULL, '1728626246.pdf', '2024-10-10 22:57:26', '2024-10-10 22:57:26'),
(190, 'Tembaga ex Rf M2', '-', '-', '0000-00-00', NULL, '1728626310.pdf', '2024-10-10 22:58:31', '2024-10-10 22:58:31'),
(191, 'cu powder putih x- cable RF', '-', '-', '0000-00-00', NULL, '1728626350.pdf', '2024-10-10 22:59:10', '2024-10-10 22:59:10'),
(192, 'konektor silver RF', '-', '-', '0000-00-00', NULL, '1728626406.pdf', '2024-10-10 23:00:06', '2024-10-10 23:00:06'),
(193, 'slat besi basah', '-', '-', '0000-00-00', NULL, '1728627402.pdf', '2024-10-10 23:16:42', '2024-10-10 23:16:42'),
(196, 'slat besi kering', '-', '-', '0000-00-00', NULL, '1728628901.pdf', '2024-10-10 23:41:41', '2024-10-10 23:41:41'),
(197, 'kuningan ex konektor module', '-', '-', '0000-00-00', NULL, '1728628959.pdf', '2024-10-10 23:42:39', '2024-10-10 23:42:39'),
(198, 'tembaga plat 3', '-', '-', '0000-00-00', NULL, '1728629433.pdf', '2024-10-10 23:50:33', '2024-10-10 23:50:33'),
(199, 'plat Ag tipis kcl', '-', '-', '0000-00-00', NULL, '1728629766.pdf', '2024-10-10 23:56:06', '2024-10-10 23:56:06'),
(200, 'plat Ag tipis bsr', '-', '-', '0000-00-00', NULL, '1728629865.pdf', '2024-10-10 23:57:45', '2024-10-10 23:57:45'),
(201, 'Plat MW', '-', '-', '0000-00-00', NULL, '1728630573.pdf', '2024-10-11 00:09:33', '2024-10-11 00:09:33'),
(202, 'plat busbar 1', '-', '-', '0000-00-00', NULL, '1728630694.pdf', '2024-10-11 00:11:34', '2024-10-11 00:11:34'),
(203, 'plat busbar 2', '-', '-', '0000-00-00', NULL, '1728630755.pdf', '2024-10-11 00:12:35', '2024-10-11 00:12:35'),
(204, 'plat busbar 3', '-', '-', '0000-00-00', NULL, '1728630817.pdf', '2024-10-11 00:13:37', '2024-10-11 00:13:37'),
(205, 'plat tembaga kecil', '-', '-', '0000-00-00', NULL, '1728630874.pdf', '2024-10-11 00:14:34', '2024-10-11 00:14:34'),
(206, 'plat tembaga besar', '-', '-', '0000-00-00', NULL, '1728630932.pdf', '2024-10-11 00:15:32', '2024-10-11 00:15:32'),
(207, 'plat putih ex panel', '-', '-', '0000-00-00', NULL, '1728630975.pdf', '2024-10-11 00:16:15', '2024-10-11 00:16:15'),
(208, 'plat cu ex panel', '-', '-', '0000-00-00', NULL, '1728631023.pdf', '2024-10-11 00:17:03', '2024-10-11 00:17:03'),
(209, 'Plat PCB 1', '-', '-', '0000-00-00', NULL, '1728631265.pdf', '2024-10-11 00:21:05', '2024-10-11 00:21:05'),
(210, 'Plat PCB 2', '-', '-', '0000-00-00', NULL, '1728631310.pdf', '2024-10-11 00:21:50', '2024-10-11 00:21:50'),
(211, 'Plat PCB 3', '-', '-', '0000-00-00', NULL, '1728631345.pdf', '2024-10-11 00:22:25', '2024-10-11 00:22:25'),
(212, 'Plat PCB 4', '-', '-', '0000-00-00', NULL, '1728631519.pdf', '2024-10-11 00:25:19', '2024-10-11 00:25:19'),
(213, 'Plat PCB 5', '-', '-', '0000-00-00', NULL, '1728631690.pdf', '2024-10-11 00:28:10', '2024-10-11 00:28:10'),
(214, 'Plat PCB 6', '-', '-', '0000-00-00', NULL, '1728631875.pdf', '2024-10-11 00:31:15', '2024-10-11 00:31:15'),
(215, 'Plat PCB 7', '-', '-', '0000-00-00', NULL, '1728631909.pdf', '2024-10-11 00:31:49', '2024-10-11 00:31:49'),
(216, 'scrap plat 1', '-', '-', '0000-00-00', NULL, '1728632008.pdf', '2024-10-11 00:33:28', '2024-10-11 00:33:28'),
(217, 'scrap plat 2', '-', '-', '0000-00-00', NULL, '1728632043.pdf', '2024-10-11 00:34:03', '2024-10-11 00:34:03'),
(218, 'scrap plat 3', '-', '-', '0000-00-00', NULL, '1728632095.pdf', '2024-10-11 00:34:55', '2024-10-11 00:34:55'),
(219, 'scrap plat 4', '-', '-', '0000-00-00', NULL, '1728632128.pdf', '2024-10-11 00:35:28', '2024-10-11 00:35:28'),
(220, 'scrap plat 5', '-', '-', '0000-00-00', NULL, '1728632167.pdf', '2024-10-11 00:36:07', '2024-10-11 00:36:07'),
(221, 'scrap plat 6', '-', '-', '0000-00-00', NULL, '1728632225.pdf', '2024-10-11 00:37:05', '2024-10-11 00:37:05'),
(222, 'scrap plat 7', '-', '-', '0000-00-00', NULL, '1728632253.pdf', '2024-10-11 00:37:33', '2024-10-11 00:37:33'),
(223, 'scrap plat 8', '-', '-', '0000-00-00', NULL, '1728632286.pdf', '2024-10-11 00:38:06', '2024-10-11 00:38:06'),
(224, 'scrap plat 9', '-', '-', '0000-00-00', NULL, '1728632338.pdf', '2024-10-11 00:38:58', '2024-10-11 00:38:58'),
(225, 'scrap plat 10', '-', '-', '0000-00-00', NULL, '1728632380.pdf', '2024-10-11 00:39:40', '2024-10-11 00:39:40'),
(226, 'scrap plat 11', '-', '-', '0000-00-00', NULL, '1728632421.pdf', '2024-10-11 00:40:21', '2024-10-11 00:40:21'),
(227, 'scrap plat 12', '-', '-', '0000-00-00', NULL, '1728632470.pdf', '2024-10-11 00:41:10', '2024-10-11 00:41:10'),
(228, 'scrap plat 13', '-', '-', '0000-00-00', NULL, '1728632528.pdf', '2024-10-11 00:42:08', '2024-10-11 00:42:08'),
(229, 'silver konektor module', '-', '-', '0000-00-00', NULL, '1728635280.pdf', '2024-10-11 01:28:00', '2024-10-11 01:28:00'),
(231, 'abu tembaga', '-', '-', '0000-00-00', NULL, '1728635387.pdf', '2024-10-11 01:29:47', '2024-10-11 01:29:47'),
(232, 'cu powder putih x-voice', '-', '-', '0000-00-00', NULL, '1728635676.pdf', '2024-10-11 01:34:36', '2024-10-11 01:34:36'),
(233, 'socket crom', '-', '-', '0000-00-00', NULL, '1728635706.pdf', '2024-10-11 01:35:06', '2024-10-11 01:35:06'),
(234, 'socket ex olahan', '-', '-', '0000-00-00', NULL, '1728635867.pdf', '2024-10-11 01:37:47', '2024-10-11 01:37:47'),
(235, 'rumah kunci', '-', '-', '0000-00-00', NULL, '1728636677.pdf', '2024-10-11 01:51:17', '2024-10-11 01:51:17'),
(236, 'ttp glas', '-', '-', '0000-00-00', NULL, '1728636739.pdf', '2024-10-11 01:52:19', '2024-10-11 01:52:19'),
(237, 'seng modul', '-', '-', '0000-00-00', NULL, '1728636886.pdf', '2024-10-11 01:54:47', '2024-10-11 01:54:47'),
(238, 'scrap', '-', '-', '0000-00-00', NULL, '1728637021.pdf', '2024-10-11 01:57:01', '2024-10-11 01:57:01'),
(239, 'logam cd', '-', '-', '0000-00-00', NULL, '1728637094.pdf', '2024-10-11 01:58:14', '2024-10-11 01:58:14'),
(240, 'logam zn', '-', '-', '0000-00-00', NULL, '1728637201.pdf', '2024-10-11 02:00:01', '2024-10-11 02:00:01'),
(241, 'Baud modul putih', '-', '-', '0000-00-00', NULL, '1728637331.pdf', '2024-10-11 02:02:11', '2024-10-11 02:02:11'),
(242, 'jarum besi', '-', '-', '0000-00-00', NULL, '1728637514.pdf', '2024-10-11 02:05:14', '2024-10-11 02:05:14'),
(243, 'Cu skun', '-', '-', '0000-00-00', NULL, '1728637694.pdf', '2024-10-11 02:08:14', '2024-10-11 02:08:14'),
(244, 'stainles', '-', '-', '0000-00-00', NULL, '1728637747.pdf', '2024-10-11 02:09:07', '2024-10-11 02:09:07'),
(245, 'kuningan rongsok', '-', '-', '0000-00-00', NULL, '1728637786.pdf', '2024-10-11 02:09:46', '2024-10-11 02:09:46'),
(246, 'logam Pd.', '-', '-', '0000-00-00', NULL, '1728637851.pdf', '2024-10-11 02:10:51', '2024-10-11 02:10:51'),
(247, 'Tembaga putih Panel ex M2', '-', '-', '0000-00-00', NULL, '1728637900.pdf', '2024-10-11 02:11:40', '2024-10-11 02:11:40'),
(249, 'stainless ex module M2', '-', '-', '0000-00-00', NULL, '1728638060.pdf', '2024-10-11 02:14:21', '2024-10-11 02:14:21'),
(250, 'powder refiening M3', '-', '-', '0000-00-00', NULL, '1728638126.pdf', '2024-10-11 02:15:26', '2024-10-11 02:15:26'),
(251, 'Baut grade C eks M2', '-', '-', '0000-00-00', NULL, '1728638300.pdf', '2024-10-11 02:18:20', '2024-10-11 02:18:20'),
(252, 'sample Al 2', '-', '-', '0000-00-00', NULL, '1728638431.pdf', '2024-10-11 02:20:31', '2024-10-11 02:20:31'),
(253, 'sample Al 1', '-', '-', '0000-00-00', NULL, '1728638577.pdf', '2024-10-11 02:22:57', '2024-10-11 02:22:57'),
(254, 'WG ingot 1 (sample)', '-', '-', '0000-00-00', NULL, '1728638893.pdf', '2024-10-11 02:28:13', '2024-10-11 02:28:13'),
(255, 'Al tebal modul kecil', '-', '-', '0000-00-00', NULL, '1728639010.pdf', '2024-10-11 02:30:10', '2024-10-11 02:30:10'),
(256, 'Al tebal modul besar', '-', '-', '0000-00-00', NULL, '1728639100.pdf', '2024-10-11 02:31:40', '2024-10-11 02:31:40'),
(257, 'Al mangkuk 2', '-', '-', '0000-00-00', NULL, '1728639213.pdf', '2024-10-11 02:33:33', '2024-10-11 02:33:33'),
(258, 'Al mangkuk 1', '-', '-', '0000-00-00', NULL, '1728639269.pdf', '2024-10-11 02:34:30', '2024-10-11 02:34:30'),
(259, 'MW', '-', '-', '0000-00-00', NULL, '1728696934.pdf', '2024-10-11 18:35:34', '2024-10-11 18:35:34'),
(260, 'pcb siemens', '-', '-', '0000-00-00', NULL, '1728697261.pdf', '2024-10-11 18:41:01', '2024-10-11 18:41:01'),
(261, 'White Gold 18k', '-', '-', '0000-00-00', NULL, '1728697443.pdf', '2024-10-11 18:44:03', '2024-10-11 18:44:03'),
(262, 'logam Pd', '-', '-', '0000-00-00', NULL, '1728698334.pdf', '2024-10-11 18:58:54', '2024-10-11 18:58:54'),
(263, 'merah baut module', '-', '-', '0000-00-00', NULL, '1728698607.pdf', '2024-10-11 19:03:27', '2024-10-11 19:03:27'),
(264, 'AL Tebal panel', '-', '-', '0000-00-00', NULL, '1728698906.pdf', '2024-10-11 19:08:26', '2024-10-11 19:08:26'),
(265, 'Al tebal modul', '-', '-', '0000-00-00', NULL, '1728699728.pdf', '2024-10-11 19:22:08', '2024-10-11 19:22:08'),
(266, 'Al Poil', '-', '-', '0000-00-00', NULL, '1728699843.pdf', '2024-10-11 19:24:03', '2024-10-11 19:24:03'),
(267, 'sample skun plastik 14 12', '-', '-', '0000-00-00', NULL, '1728700309.pdf', '2024-10-11 19:31:49', '2024-10-11 19:31:49'),
(268, 'sample skun plastik 13 12', '-', '-', '0000-00-00', NULL, '1728700484.pdf', '2024-10-11 19:34:44', '2024-10-11 19:34:44'),
(269, 'Logam Ag', '-', '-', '0000-00-00', NULL, '1728700784.pdf', '2024-10-11 19:39:44', '2024-10-11 19:39:44'),
(270, 'Logam Au B', '-', '-', '0000-00-00', NULL, '1728700983.pdf', '2024-10-11 19:43:03', '2024-10-11 19:43:03'),
(271, 'Logam Au A', '-', '-', '0000-00-00', NULL, '1728701202.pdf', '2024-10-11 19:46:42', '2024-10-11 19:46:42'),
(272, 'Logam Au B 20.11.23', '-', '-', '0000-00-00', NULL, '1728701668.pdf', '2024-10-11 19:54:28', '2024-10-11 19:54:28'),
(273, 'paladium', '-', '-', '0000-00-00', NULL, '1728703130.pdf', '2024-10-11 20:18:51', '2024-10-11 20:18:51'),
(274, 'soket ex 18.11', '-', '-', '0000-00-00', NULL, '1728703350.pdf', '2024-10-11 20:22:30', '2024-10-11 20:22:30'),
(275, 'jarum eks olahan', '-', '-', '0000-00-00', NULL, '1728703482.pdf', '2024-10-11 20:24:42', '2024-10-11 20:24:42'),
(276, 'tanah m3 ke 5', '-', '-', '0000-00-00', NULL, '1728704061.pdf', '2024-10-11 20:34:21', '2024-10-11 20:34:21'),
(277, 'tanah m3 ke 4', '-', '-', '0000-00-00', NULL, '1728704311.pdf', '2024-10-11 20:38:31', '2024-10-11 20:38:31'),
(278, 'sample CU.', '-', '-', '0000-00-00', NULL, '1728704469.pdf', '2024-10-11 20:41:09', '2024-10-11 20:41:09'),
(279, 'feeder', '-', '-', '0000-00-00', NULL, '1728704908.pdf', '2024-10-11 20:48:28', '2024-10-11 20:48:28'),
(280, 'pipa TI', '-', '-', '0000-00-00', NULL, '1728724210.pdf', '2024-10-11 20:52:36', '2024-10-12 02:10:10'),
(281, 'Nikel001', '-', '-', '0000-00-00', NULL, '1728705217.pdf', '2024-10-11 20:53:37', '2024-10-11 20:53:37'),
(282, 'Al ex feeder guntingan', '-', '-', '0000-00-00', NULL, '1728705297.pdf', '2024-10-11 20:54:57', '2024-10-11 20:54:57'),
(283, 'Al lidi (talon)', '-', '-', '0000-00-00', NULL, '1728705420.pdf', '2024-10-11 20:57:00', '2024-10-11 20:57:00'),
(284, 'Al siku MW', '-', '-', '0000-00-00', NULL, '1728705485.pdf', '2024-10-11 20:58:05', '2024-10-11 20:58:05'),
(285, 'Al tebal modul 1', '-', '-', '0000-00-00', NULL, '1728705619.pdf', '2024-10-11 21:00:19', '2024-10-11 21:00:19'),
(286, 'Al tebal modul 2', '-', '-', '0000-00-00', NULL, '1728705775.pdf', '2024-10-11 21:02:55', '2024-10-11 21:02:55'),
(287, 'Al tebal modul 3', '-', '-', '0000-00-00', NULL, '1728705882.pdf', '2024-10-11 21:04:42', '2024-10-11 21:04:42'),
(288, 'Al tebal modul 4', '-', '-', '0000-00-00', NULL, '1728705910.pdf', '2024-10-11 21:05:10', '2024-10-11 21:05:10'),
(289, 'Al tebal modul 5', '-', '-', '0000-00-00', NULL, '1728705970.pdf', '2024-10-11 21:06:10', '2024-10-11 21:06:10'),
(290, 'Al tebal modul 6', '-', '-', '0000-00-00', NULL, '1728705998.pdf', '2024-10-11 21:06:38', '2024-10-11 21:06:38'),
(291, 'Conector ex olahan', '-', '-', '0000-00-00', NULL, '1728706135.pdf', '2024-10-11 21:08:55', '2024-10-11 21:08:55'),
(292, 'Jamur ex olahan', '-', '-', '0000-00-00', NULL, '1728706327.pdf', '2024-10-11 21:12:07', '2024-10-11 21:12:07'),
(293, 'Jamur ex olahan besar on magnet', '-', '-', '0000-00-00', NULL, '1728706649.pdf', '2024-10-11 21:17:30', '2024-10-11 21:17:30'),
(294, 'Jamur ex olahan coating cu ex olahan', '-', '-', '0000-00-00', NULL, '1728706806.pdf', '2024-10-11 21:20:06', '2024-10-11 21:20:06'),
(295, 'Jamur ex olahan kecil on magnet', '-', '-', '0000-00-00', NULL, '1728706867.pdf', '2024-10-11 21:21:07', '2024-10-11 21:21:07'),
(296, 'Jamur ex olahan sedang on magnet', '-', '-', '0000-00-00', NULL, '1728706918.pdf', '2024-10-11 21:21:58', '2024-10-11 21:21:58'),
(297, 'white gold 22 02 24', '-', '-', '0000-00-00', NULL, '1728707192.pdf', '2024-10-11 21:26:32', '2024-10-11 21:26:32'),
(298, 'Ag 50gr', '-', '-', '0000-00-00', NULL, '1728707380.pdf', '2024-10-11 21:29:40', '2024-10-11 21:29:40'),
(299, 'Cu 50gr', '-', '--', '0000-00-00', NULL, '1728707550.pdf', '2024-10-11 21:32:30', '2024-10-11 21:32:30'),
(300, 'Ni 25 42gr', '-', '-', '0000-00-00', NULL, '1728707739.pdf', '2024-10-11 21:35:39', '2024-10-11 21:35:39'),
(301, 'Zn 48.50gr', '-', '-', '0000-00-00', NULL, '1728707874.pdf', '2024-10-11 21:37:54', '2024-10-11 21:37:54'),
(302, 'Monel 4', '-', '-', '0000-00-00', NULL, '1728713321.pdf', '2024-10-11 23:08:41', '2024-10-11 23:08:41'),
(303, 'Monel 3', '-', '-', '0000-00-00', NULL, '1728713377.pdf', '2024-10-11 23:09:37', '2024-10-11 23:09:37'),
(304, 'Monel 2', '-', '-', '0000-00-00', NULL, '1728713413.pdf', '2024-10-11 23:10:13', '2024-10-11 23:10:13'),
(305, 'Monel 1', '-', '-', '0000-00-00', NULL, '1728713449.pdf', '2024-10-11 23:10:49', '2024-10-11 23:10:49'),
(306, 'Cut Bend Dust IC Micon.', '-', '-', '0000-00-00', NULL, '1728713837.pdf', '2024-10-11 23:17:17', '2024-10-11 23:17:17'),
(307, 'Lead Frame After Cut Bend IC Micon', '-', '-', '0000-00-00', NULL, '1728714404.pdf', '2024-10-11 23:26:44', '2024-10-11 23:26:44'),
(308, 'Lead Frame After Cut Bend TO220.', '-', '--', '0000-00-00', NULL, '1728714660.pdf', '2024-10-11 23:31:01', '2024-10-11 23:31:01'),
(309, 'Lead frame Copper of After Cut Bend IC Micon.', '-', '-', '0000-00-00', NULL, '1728715002.pdf', '2024-10-11 23:36:42', '2024-10-11 23:36:42'),
(310, 'Lead Frame Dummy TO220', '-', '-', '0000-00-00', NULL, '1728715313.pdf', '2024-10-11 23:41:53', '2024-10-11 23:41:53'),
(311, 'Lead Fream Dummy IC Micon.', '-', '-', '0000-00-00', NULL, '1728715469.pdf', '2024-10-11 23:44:29', '2024-10-11 23:44:29'),
(312, 'Cut Bend Dust TO220', '-', '-', '0000-00-00', NULL, '1728716269.pdf', '2024-10-11 23:57:49', '2024-10-11 23:57:49'),
(313, 'nikel dari plmn', '-', '-', '0000-00-00', NULL, '1728716364.pdf', '2024-10-11 23:59:24', '2024-10-11 23:59:24'),
(314, 'bullion Cu kering', '-', '-', '0000-00-00', NULL, '1728716491.pdf', '2024-10-12 00:01:31', '2024-10-12 00:01:31'),
(315, 'bullion Cu basah', '-', '-', '0000-00-00', NULL, '1728716536.pdf', '2024-10-12 00:02:16', '2024-10-12 00:02:16'),
(316, 'Cu kering (sample plastik)', '-', '-', '0000-00-00', NULL, '1728716643.pdf', '2024-10-12 00:04:03', '2024-10-12 00:04:03'),
(317, 'Cu basah (sample plastik)', '-', '-', '0000-00-00', NULL, '1728716715.pdf', '2024-10-12 00:05:15', '2024-10-12 00:05:15'),
(318, 'Cu putih 3', '-', '-', '0000-00-00', NULL, '1728717043.pdf', '2024-10-12 00:10:43', '2024-10-12 00:10:43'),
(319, 'Cu putih 2', '-', '-', '0000-00-00', NULL, '1728717180.pdf', '2024-10-12 00:13:00', '2024-10-12 00:13:00'),
(320, 'Cu putih 1', '-', '-', '0000-00-00', NULL, '1728717290.pdf', '2024-10-12 00:14:51', '2024-10-12 00:14:51'),
(321, 'Cu berewire', '-', '-', '0000-00-00', NULL, '1728717441.pdf', '2024-10-12 00:17:21', '2024-10-12 00:17:21'),
(322, 'Cu x trafo', '-', '-', '0000-00-00', NULL, '1728717552.pdf', '2024-10-12 00:19:12', '2024-10-12 00:19:12'),
(323, 'sudronik bullion', '-', '-', '0000-00-00', NULL, '1728718082.pdf', '2024-10-12 00:28:02', '2024-10-12 00:28:02'),
(324, 'Cu kabel 2', '-', '-', '0000-00-00', NULL, '1728719680.pdf', '2024-10-12 00:54:41', '2024-10-12 00:54:41'),
(325, 'Cu kabel 1', '-', '-', '0000-00-00', NULL, '1728719915.pdf', '2024-10-12 00:58:35', '2024-10-12 00:58:35'),
(326, 'Pcb 2 ex olahan', '-', '-', '0000-00-00', NULL, '1728720083.pdf', '2024-10-12 01:01:23', '2024-10-12 01:01:23'),
(327, 'Pcb 1 ex olahan', '-', '-', '0000-00-00', NULL, '1728720130.pdf', '2024-10-12 01:02:10', '2024-10-12 01:02:10'),
(328, 'sulpur', '-', '-', '0000-00-00', NULL, '1728720242.pdf', '2024-10-12 01:04:02', '2024-10-12 01:04:02'),
(329, 'termocoper E52', '-', '-', '0000-00-00', NULL, '1728720830.pdf', '2024-10-12 01:13:51', '2024-10-12 01:13:51'),
(331, 'tembaga serbuk 3', '-', '-', '0000-00-00', NULL, '1728723516.pdf', '2024-10-12 01:58:36', '2024-10-12 01:58:36'),
(332, 'tembaga batu 3', '-', '-', '0000-00-00', NULL, '1728723650.pdf', '2024-10-12 02:00:50', '2024-10-12 02:00:50'),
(333, 'sample kabel laut 4', '-', '-', '0000-00-00', NULL, '1728725223.pdf', '2024-10-12 02:27:03', '2024-10-12 02:27:03'),
(334, 'sample kabel laut 3', '-', '-', '0000-00-00', NULL, '1728725255.pdf', '2024-10-12 02:27:35', '2024-10-12 02:27:35'),
(335, 'sample kabel laut 2', '-', '-', '0000-00-00', '1728881885.jpg', '1728725320.pdf', '2024-10-12 02:28:41', '2024-10-13 21:58:05'),
(336, 'sample kabel laut 1', '-', '-', '0000-00-00', NULL, '1728726228.pdf', '2024-10-12 02:43:48', '2024-10-13 18:10:22'),
(339, 'RF 1 & 2', '-', '-', '0000-00-00', NULL, '1728886888.pdf', '2024-10-13 23:21:28', '2024-10-13 23:21:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
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
-- Struktur dari tabel `job_batches`
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_06_062347_create_analists_table', 1),
(8, '2024_10_09_195912_create_analist_pdfs_table', 2),
(9, '2024_10_10_020119_update_file_name_column_in_data_analist_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('yM0p5FydHuaee4HGhEMyk35s9FWvZoJjfRt3Zo1P', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicjBTaHFDeE14RU0zUDRpUW1rb0RRblR2dFJhN3lhZDdTVGE1VVFWSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hbmFsaXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1729149073);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `analists`
--
ALTER TABLE `analists`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `analists`
--
ALTER TABLE `analists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
