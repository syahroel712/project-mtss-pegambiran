-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 02:42 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_mtsn_pengambiran`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_30_092344_create_guru_models_table', 1),
(5, '2021_07_30_092406_create_kelas_models_table', 1),
(6, '2021_07_30_092427_create_kepsek_models_table', 1),
(7, '2021_07_30_092449_create_mapel_models_table', 1),
(8, '2021_07_30_092507_create_nilai_models_table', 1),
(9, '2021_07_30_092527_create_siswa_models_table', 1),
(10, '2021_07_31_005059_create_nilai_detail_models_table', 1),
(11, '2021_07_31_005240_create_semester_models_table', 1),
(12, '2021_07_31_084134_create_tahun_ajar_models_table', 1),
(13, '2021_07_31_124916_create_walas_models_table', 1),
(14, '2021_08_01_044714_create_walas_siswa_models_table', 1),
(15, '2022_01_29_134534_create_admin_models_table', 1),
(16, '2022_01_30_171710_create_spp_models_table', 2),
(17, '2022_01_31_014124_create_profile_models_table', 3),
(18, '2022_01_31_124416_create_info_models_table', 4),
(19, '2022_02_01_045552_create_slider_models_table', 5),
(20, '2022_02_01_051645_create_galeri_models_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_jk` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_notelp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_jk`, `admin_notelp`, `admin_alamat`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$kk1gQxFrR8pX4so8ttWEGOW88PUY4XI8jWiAtQsE216tzILrxzjmm', 'Laki-Laki', '0812314123', 'padang', NULL, '2022-01-29 09:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `galeri_id` bigint(20) UNSIGNED NOT NULL,
  `galeri_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galeri_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`galeri_id`, `galeri_nama`, `galeri_foto`, `created_at`, `updated_at`) VALUES
(1, 'Kegiatan 1', '1643693666.jpg', '2022-01-31 22:34:26', '2022-01-31 22:34:26'),
(2, 'Kegiatan 2', '1643693678.jpg', '2022-01-31 22:34:38', '2022-01-31 22:34:38'),
(3, 'Kegiatan 3', '1643693693.jpg', '2022-01-31 22:34:53', '2022-01-31 22:34:53'),
(4, 'Kegiatan 4', '1643693719.jpg', '2022-01-31 22:35:19', '2022-01-31 22:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `guru_nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guru_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_tgl_lahir` date DEFAULT NULL,
  `guru_jk` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_notelp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guru_alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guru_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_jabatan` enum('Kepala Sekolah','Guru') COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_status` enum('Aktif','Pensiun','Pindah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapel_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`guru_id`, `guru_nip`, `guru_nama`, `guru_tgl_lahir`, `guru_jk`, `guru_notelp`, `guru_alamat`, `guru_username`, `guru_password`, `guru_jabatan`, `guru_status`, `guru_foto`, `mapel_id`, `created_at`, `updated_at`) VALUES
(1, '12345670', 'Mumu', '1992-12-12', 'Perempuan', '081231413739', 'Padang', 'mumu', '$2y$10$KBfxIwBFNG54.X5JnMUJLOOPdyXzXNIdYtYTGAudUZjUUt8cgmsTS', 'Guru', 'Aktif', '1643729488.jpg', 1, '2021-07-31 14:14:18', '2022-02-01 10:01:48'),
(2, '12345671', 'Suher', '1981-12-06', 'Laki-Laki', '081376324982', 'Padang', 'suher', '$2y$10$Grn18/T645PQycVf10Qvu..cn.l2POSwd8MhCl8PUt.TR/02c/jAm', 'Kepala Sekolah', 'Aktif', '1643729464.jpg', 1, '2021-07-31 14:15:20', '2022-02-01 10:02:02'),
(3, '12345672', 'Warni', '1984-06-07', 'Perempuan', '08123123768', 'Padang', 'warni', '$2y$10$GS6m2YUkpI0kd5qYhlKcVe9n.0skPmQO.EVbf7IBw41GhYcgmrFuy', 'Guru', 'Aktif', '1643729538.jpg', 3, '2021-07-31 14:16:20', '2022-02-01 10:02:31'),
(4, '12345673', 'Agus', '1987-08-30', 'Laki-Laki', '08123123768', 'Padang', 'agus', '$2y$10$qbQmfGlyR0sllRqmXEQg/.kR5EwTN1av4TSinOwInut7l5DYuM9Lm', 'Guru', 'Aktif', '1643729551.jpg', 4, '2021-07-31 14:17:38', '2022-02-01 10:02:42'),
(5, '12345674', 'Izul', '1989-01-19', 'Laki-Laki', '081231413739', 'Padang', 'izul', '$2y$10$IS1oNPlCOjdYm7kscMl1COVzZa1aohEtmCn4suTmmOXWAkk/WSzke', 'Guru', 'Aktif', '1643729571.jpg', 2, '2021-07-31 14:18:32', '2022-02-01 10:03:01'),
(6, '12345675', 'Fugi', '1990-08-19', 'Laki-Laki', '08123123768', 'Padang', 'fugi', '$2y$10$kXUgG/cVsk/ZOwsPENAlGOxJMecyT88.YHqfhzatVoemqv2dn7P5G', 'Guru', 'Aktif', '1643729592.jpg', 5, '2021-07-31 14:19:35', '2022-02-01 10:03:28'),
(7, '12345677', 'Vita', '1989-04-10', 'Perempuan', '08812137823', 'Padang', 'vita', '$2y$10$pnA4ZPs33SSrvqADXN4L5.AQCjjXVxPDZCFS1.vR34UZntCIPqSmC', 'Guru', 'Aktif', '1643729614.jpg', 4, '2021-07-31 14:20:46', '2022-02-01 10:03:56'),
(8, '12345678', 'Odi', '1984-09-23', 'Laki-Laki', '083423', 'Padang', 'odi', '$2y$10$FNeidJdhLyqzisAzuT404eAKu3YPdR/ejURRmKlCxjOuR9BUcND9i', 'Guru', 'Aktif', '1643729651.jpg', 9, '2021-07-31 14:21:54', '2022-02-01 10:03:40'),
(9, '12345679', 'Tia', '1986-02-26', 'Perempuan', '0823634728', 'Padang', 'tia', '$2y$10$Qjus4myui.4EsFW7URr7t.zC1O.7fsCYpMf.m8RLm9T0eAg0o1.3K', 'Guru', 'Aktif', '1643729683.jpg', 8, '2021-07-31 14:23:13', '2022-02-01 10:04:09'),
(10, '123456710', 'Sinta', '1987-01-02', 'Perempuan', '0823473459', 'Padang', 'sinta', '$2y$10$ZnOhvxijHrhVmRdJuxgr/uD74y.AVhURdVUP6wDNVE9fBcTQnIX4.', 'Guru', 'Aktif', '1643729700.jpg', 7, '2021-07-31 14:24:36', '2022-02-01 10:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `info_id` bigint(20) UNSIGNED NOT NULL,
  `info_judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_tipe` enum('Pengumuman','Berita','Info PPDB','Kegiatan Ekstrakulikuler') COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_tipe_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_desk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_tgl` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`info_id`, `info_judul`, `info_slug`, `info_tipe`, `info_tipe_slug`, `info_foto`, `info_desk`, `info_tgl`, `created_at`, `updated_at`) VALUES
(1, 'Pengumunan Pembagian Rapor', 'pengumunan-pembagian-rapor', 'Pengumuman', 'pengumuman', '1643695811.jpg', '<p>Pengumunan Pembagian Rapor Pengumunan Pembagian Rapor Pengumunan Pembagian Rapor Pengumunan Pembagian Rapor Pengumunan Pembagian Rapor Pengumunan Pembagian Rapor<br></p>', '2022-02-18', '2022-01-31 23:10:11', '2022-01-31 23:25:30'),
(2, 'Pengumunan Sumbangan Bencana Alam', 'pengumunan-sumbangan-bencana-alam', 'Pengumuman', 'pengumuman', '1643695850.jpg', '<p>Pengumunan Sumbangan Bencana Alam Pengumunan Sumbangan Bencana Alam Pengumunan Sumbangan Bencana Alam Pengumunan Sumbangan Bencana Alam Pengumunan Sumbangan Bencana Alam Pengumunan Sumbangan Bencana Alam Pengumunan Sumbangan Bencana Alam Pengumunan Sumbangan Bencana Alam <br></p>', '2022-01-30', '2022-01-31 23:10:50', '2022-01-31 23:25:51'),
(3, 'Pengumunan Sumbangan Bencana Alam Banjir Bandang Kota XXX', 'pengumunan-sumbangan-bencana-alam-banjir-bandang-kota-xxx', 'Pengumuman', 'pengumuman', '1643696061.jpg', 'Pengumunan Sumbangan Bencana Alam Banjir Bandang Kota XXX Pengumunan Sumbangan Bencana Alam Banjir Bandang Kota XXX Pengumunan Sumbangan Bencana Alam Banjir Bandang Kota XXX Pengumunan Sumbangan Bencana Alam Banjir Bandang Kota XXX Pengumunan Sumbangan Bencana Alam Banjir Bandang Kota XXX Pengumunan Sumbangan Bencana Alam Banjir Bandang Kota XXX <br>', '2022-02-01', '2022-01-31 23:14:21', '2022-01-31 23:14:21'),
(4, 'Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1', 'berita-1-berita-1-berita-1-berita-1-berita-1-berita-1-berita-1-berita-1-berita-1-berita-1-berita-1-berita-1', 'Berita', 'berita', '1643696863.jpg', '<p>Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 Berita 1 <br></p>', '2021-11-29', '2022-01-31 23:27:43', '2022-01-31 23:27:43'),
(5, 'Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2', 'berita-2-berita-2-berita-2-berita-2-berita-2-berita-2-berita-2-berita-2-berita-2-berita-2-berita-2-berita-2-berita-2-berita-2-berita-2-berita-2-berita-2', 'Berita', 'berita', '1643696898.jpg', '<p>Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 </p><p>Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 Berita 2 vv<br></p>', '2022-02-01', '2022-01-31 23:28:18', '2022-01-31 23:28:18'),
(6, 'Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3', 'berita-3-berita-3-berita-3-berita-3-berita-3-berita-3-berita-3-berita-3-berita-3-berita-3', 'Berita', 'berita', '1643697066.jpg', '<p>Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 </p><p>Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 </p><p>Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 </p><p>Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 Berita 3 <br></p>', '2022-02-09', '2022-01-31 23:31:06', '2022-01-31 23:31:06'),
(7, 'Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4', 'berita-4-berita-4-berita-4-berita-4-berita-4-berita-4-berita-4-berita-4-berita-4-berita-4-berita-4-berita-4-berita-4-berita-4', 'Berita', 'berita', '1643697109.jpg', '<p>Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 </p><p>Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 </p><p>Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 </p><p>Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 Berita 4 <br></p>', '2022-01-30', '2022-01-31 23:31:49', '2022-01-31 23:31:49'),
(8, 'Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5', 'berita-5-berita-5-berita-5-berita-5-berita-5-berita-5-berita-5-berita-5-berita-5-berita-5-berita-5-berita-5-berita-5-berita-5-berita-5-berita-5-berita-5-berita-5', 'Berita', 'berita', '1643697148.jpg', '<p>Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 </p><p>Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 </p><p>Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 Berita 5 <br></p>', '2022-02-14', '2022-01-31 23:32:28', '2022-01-31 23:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kelas_id`, `kelas_nama`, `created_at`, `updated_at`) VALUES
(1, 'VII A', '2022-01-29 08:23:59', '2022-01-29 08:23:59'),
(2, 'VII B', '2022-01-29 08:24:10', '2022-01-29 08:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kepsek`
--

CREATE TABLE `tb_kepsek` (
  `kepsek_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kepsek_tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kepsek`
--

INSERT INTO `tb_kepsek` (`kepsek_id`, `guru_id`, `kepsek_tahun`, `created_at`, `updated_at`) VALUES
(1, 2, '2021/2025', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`mapel_id`, `mapel_nama`, `created_at`, `updated_at`) VALUES
(1, 'Agama Islam', '2022-01-29 08:25:55', '2022-01-29 08:25:55'),
(2, 'PKN', '2022-01-29 08:26:02', '2022-01-29 08:26:02'),
(3, 'Bahasa Indonesia', '2022-01-29 08:26:26', '2022-01-29 08:26:26'),
(4, 'Bahasa Inggris', '2022-01-29 08:26:37', '2022-01-29 08:26:37'),
(5, 'Matematika', '2022-01-29 08:26:45', '2022-01-29 08:26:45'),
(6, 'IPA', '2022-01-29 08:26:52', '2022-01-29 08:26:52'),
(7, 'IPS', '2022-01-29 08:26:58', '2022-01-29 08:26:58'),
(8, 'Seni Budaya', '2022-01-29 09:44:22', '2022-01-29 09:44:22'),
(9, 'Pendidikan Jasmani & Kesehatan', '2022-01-29 09:44:39', '2022-01-29 09:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `nilai_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kepsek_id` int(11) NOT NULL DEFAULT 0,
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `tahun_ajar_id` int(11) NOT NULL,
  `nilai_tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`nilai_id`, `guru_id`, `kepsek_id`, `siswa_id`, `kelas_id`, `semester_id`, `tahun_ajar_id`, `nilai_tahun`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, 1, 1, '2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_detail`
--

CREATE TABLE `tb_nilai_detail` (
  `nilai_detail_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nilai_detail_kognitif` double(8,2) NOT NULL,
  `nilai_detail_keterampilan` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_nilai_detail`
--

INSERT INTO `tb_nilai_detail` (`nilai_detail_id`, `nilai_id`, `mapel_id`, `nilai_detail_kognitif`, `nilai_detail_keterampilan`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 98.00, 89.00, NULL, NULL),
(5, 1, 2, 100.00, 100.00, NULL, NULL),
(6, 1, 3, 89.00, 78.00, NULL, NULL),
(7, 1, 5, 78.00, 89.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile`
--

CREATE TABLE `tb_profile` (
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `profile_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_tipe` enum('teks','file') COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_desk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_profile`
--

INSERT INTO `tb_profile` (`profile_id`, `profile_nama`, `profile_slug`, `profile_tipe`, `profile_desk`, `created_at`, `updated_at`) VALUES
(1, 'Visi Misi', 'visi-misi', 'teks', '<div style=\"text-align: center;\"><b style=\"font-size: 36px;\">VISI MISI SMK NEGERI 2 PADANG</b></div><p style=\"text-align: center; line-height: normal;\"><span style=\"font-weight: bolder; font-size: 18px;\">VISI</span></p><p style=\"text-align: center; line-height: normal;\"><span style=\"font-size: 16px; line-height: 115%; font-family: &quot;Arial&quot;;\" lang=\"EN-US\">Terwujudnya\r\nLulusan Berkarakter, Terampil, dan Berwawasan Global Serta Berbudaya Lingkungan</span></p><p style=\"text-align: center; line-height: normal;\"><span style=\"font-size: 18px;\"></span><br></p><p style=\"text-align: center; line-height: normal;\"><b style=\"font-size: 18px;\">MISI</b><br></p><ol><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-family: Arial; font-size: 16px; text-indent: -21.3pt;\">Merancangstrategi\r\npembelajaran yang berorientasi pendidikan, karakter bangsa, adat dan agama\r\nserta menerapkan pola kehidupan yang agamis</span></li><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: normal; font-family: Arial;\">M</span><span style=\"text-indent: -21.3pt; font-family: Arial; font-size: 16px;\" lang=\"EN-US\">enghasil\r\ntenaga kerja professional bidang teknologi untuk memenuhi tuntutan dunia usaha\r\ndan dunia industry (DUDI)</span></li><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 16px;\">Membekali\r\npeserta didik dengan pengetahuan, keterampilan dan teknologi yang sesuai dengan\r\ntantangan global</span></li><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 16px;\">Menciptakan\r\nlingkungan sekolah yang hijau, rindang dan sehat untuk mendukung optimasi\r\nkegiatan belajar mengajar</span></li><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 16px;\">Merancang\r\nstrategi pembelajaran yang berorientasi pada kebutuhan peserta didik untuk\r\nmemasuki dunia kerja</span></li><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 16px;\">Meningkatkan\r\nprestasi dalam bidang ekstrakulikuler serta sesuai dengan potensi yang dimiliki\r\npeserta didik</span></li></ol>\r\n\r\n<p style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 18px;\"><br></span></p><p style=\"text-align: center; line-height: normal;\"><span style=\"font-size: 18px; font-weight: bold;\">TUJUAN</span></p><ol><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 16px; font-family: &quot;Arial&quot;;\">Terciptanya tamatan yang\r\n      memiliki kepribadian dan berakhlak mulia.</span></li><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 16px;\">Terciptanya tenaga kerja\r\n      tingkat menengah yang kompeten yang mampu bersaing di tingkat\r\n      internasional.</span></li><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 16px;\">Terciptanya tamatan yang mampu\r\n      berkarir, mandiri dan mampu beradaptasi di lingkungan kerja sesuai\r\n      bidangnya</span></li><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 16px;\">Terciptanya tamatan yang mampu\r\n      mengangkat kompetensi lokal menjadi keunggulan pada tingkat nasional /\r\n      internasional</span></li><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 16px;\">Terdapatnya sarana clan\r\n      prasarana belajar yang maksimal sesuai dengan kompetensi</span></li><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 16px;\">Masyarakat sekolah mempunyai\r\n      budaya bersih, indah, dan sehat, dan disiplin.</span></li><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 16px;\">Terdapatnya administrasi yang\r\n      tertib, tertata dengan baik sesuai dengan prosedur dan aturan yang\r\n      disepakati.</span></li><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 16px;\">Terdapatnya kerja sama yang\r\n      inten yang sating memberikan manfaat dengan dunia usaha, industri, atau\r\n      sekolah baik dalam negeri maupun luar negeri.</span></li><li style=\"text-align: justify; line-height: normal;\"><span style=\"font-size: 16px;\">Menghasilkan lulusan yang mempunyai\r\n      ketrampilan untuk hidup mandiri dan mengikuti pendidikan lebih lanjut\r\n      sesuai dengan program keahliannya</span></li></ol>', '2022-01-30 21:00:15', '2022-02-01 00:51:56'),
(2, 'Sejarah Singkat', 'sejarah-singkat', 'teks', '<p style=\"text-align: center; \"><b><span style=\"font-size: 36px; color: rgb(66, 66, 66);\">Sejarah Singkat</span></b></p><p style=\"text-align: justify;\"><span style=\"color: rgb(66, 66, 66);\"><br></span></p><p style=\"text-align: justify; \"><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Sebelum\r\n berubah nama menjadi SMKN 2 Padang, pada awal berdirinya bernama SMEA \r\nNegeri 1 Padang yang diprakarsai oleh Bapak Ali Loeis dan Bapak Mr. Agus\r\n Thaib. Diresmikan dengan surat keputusan Menteri P.P.K. tanggal 3 Juli \r\n1952 No. 2777/B. Sampai saat ini SMKN 2 Padang sudah 17 Kali berganti \r\nkepemimpinan, berikut nama-nama Kepala sekolah dari awal berdiri sampai \r\nsekarang:</span></p><p><span style=\"color: rgb(66, 66, 66);\"><span style=\"font-size: 16px;\"><br></span><br></span></p><ol><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Ali Loeis</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Mr. Agus Thaib</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Widoto</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Soetan Syahrial</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Drs. Muchtaruddin</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Drs. Jasmi Ilyas</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Drs. Mohd. Nudjus, SH.</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Drs. Anasmen</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Drs. Yunizar Kobra</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Drs. H. Amril M.Y Dt. Garang, M.Pd</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Drs. H. Yusrizal, M.M.</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Drs. Edi Suheri, M.M.</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Suharto Sisar, S.Pd, M.T.</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Drs. Yunaldi</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Abdullah, S.Pd,M.M.</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Raymond, M.Pd</span></li><li><span style=\"font-size: 16px; color: rgb(66, 66, 66);\">Drs. Rusmadi, M.Pd</span></li></ol>', '2022-01-30 21:02:17', '2022-01-30 21:02:17'),
(3, 'Sarana Prasarana', 'sarana-prasarana', 'teks', '<span style=\"color: rgb(66, 66, 66);\"><span style=\"font-weight: bolder;\"><span style=\"font-size: 36px;\">Sarana Prasarana</span></span><br></span><div><span style=\"color: rgb(66, 66, 66);\"><br></span></div><div><span style=\"color: rgb(66, 66, 66); font-size: 16px; font-weight: bold;\">a. Jenis bangunan yang mengelilingi sekolah</span></div><div><span style=\"color: rgb(66, 66, 66); font-size: 16px;\">Dari\r\n segi penempatan sekolah SMKN 2 Padang berada di bundaran tugu simpang \r\nharu yang terdapat pertokoan yang berada di depan jalan raya dan rumah \r\nwarga di bagian samping sekolah. Selain itu sekolah ini tidak memiliki \r\nlapangan sendiri untuk olahraga siswa.</span><br></div><div><span style=\"color: rgb(66, 66, 66);\"><br></span></div><div><span style=\"color: rgb(66, 66, 66); font-size: 16px; font-weight: bold;\">b. Kondisi lingkungan sekolah</span></div><div><span style=\"color: rgb(66, 66, 66); font-size: 16px;\">Dapat\r\n dikatakan lingkungan yang bersih nyaman dikelilingi pohon yang rindang \r\ndan ruang kelas masih dalam tahap pembangunan sekolah.Sekolah ini \r\nmemiliki perkarangan sekolah yang lumayan luas yang ditanami bunga-bunga\r\n sehingga SMKN 2 Padang menjadi nominasi sekolah Adiwiyata dari Kota \r\nPadang.</span></div>', '2022-01-30 21:03:16', '2022-01-30 21:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `semester_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`semester_id`, `semester_nama`, `created_at`, `updated_at`) VALUES
(1, 'Semester I', '2022-01-29 08:25:14', '2022-01-29 08:25:14'),
(2, 'Semester II', '2022-01-29 08:25:25', '2022-01-29 08:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_tgl_lahir` date NOT NULL,
  `siswa_jk` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_notelp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_status` enum('Aktif','Non Aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`siswa_id`, `siswa_nis`, `siswa_nama`, `siswa_tgl_lahir`, `siswa_jk`, `siswa_notelp`, `siswa_alamat`, `siswa_password`, `siswa_status`, `created_at`, `updated_at`) VALUES
(1, '1001', 'Andi', '2004-07-13', 'Laki-Laki', '081231314345', 'Padang', '$2y$10$XiH2PqD2T8/BIYWYH4AxzuadN23q.pLUzdxo.ThIl4ffy4voJVbSO', 'Aktif', '2021-07-30 14:38:06', '2021-07-30 14:38:06'),
(2, '1002', 'Ani', '2004-04-05', 'Perempuan', '082134345345', 'Padang', '$2y$10$KMYgJryHV5jXDTRnKV.p/ewpFdl8xNe3YVOYiW5KBYjidGXPzFouG', 'Aktif', '2021-07-30 14:38:44', '2021-07-30 14:38:44'),
(3, '1003', 'Budi', '2004-12-30', 'Laki-Laki', '0823423123123', 'Padang', '$2y$10$JHPm5q/ROFr/JDtKGeJDLuK3trxkhtuEi/8BKZHoROCLLVg97lUT.', 'Aktif', '2021-07-30 14:39:40', '2021-07-30 14:39:40'),
(4, '1004', 'Cici', '2004-09-10', 'Perempuan', '08453226234', 'Padang', '$2y$10$wEdlWcQDE3NV01j1lkPtaeP.QwTf1hpvd5tmjLw0GErOEb6Nf4/Em', 'Aktif', '2021-07-30 14:40:20', '2021-07-30 14:40:20'),
(5, '1005', 'Diki', '2004-09-07', 'Laki-Laki', '083742342342', 'Padang', '$2y$10$CwKkJsdEQfYotkpcuEXx/eTYm47boWmEsqcHOQewSq9N/kPq5orta', 'Aktif', '2021-07-30 14:41:04', '2021-07-30 14:41:04'),
(6, '1006', 'Edi', '2004-08-07', 'Laki-Laki', '08234623482', 'Padang', '$2y$10$HvjOrfT1xvGtxvwjnGxBDuSGEI2pNwwPXY.DQouQ.6yhuy83KqAiO', 'Aktif', '2021-07-31 14:25:33', '2021-07-31 14:25:33'),
(7, '1007', 'Fina', '2004-11-01', 'Perempuan', '0898234234', 'Padang', '$2y$10$PFLLyP03dVwyq2D457rMuOz6z/Kw17rO4yFMqsHSzEtGcSsaJoaUO', 'Aktif', '2021-07-31 14:26:13', '2021-07-31 14:26:13'),
(8, '1008', 'Gigi', '2004-06-06', 'Perempuan', '08234623482', 'Padang', '$2y$10$wTTCbpCcX7eUiPpJIOGA9eIihMdA58iLbAVkI9xax976YGrF/Enlq', 'Aktif', '2021-07-31 14:27:06', '2021-07-31 14:27:06'),
(9, '1009', 'Hani', '2004-12-03', 'Perempuan', '08234237756', 'Padang', '$2y$10$yaKTLpzW3LR8jatAWJFLdu.6epTKbDBmSt/UhfDFC3WqryLdrMeyO', 'Aktif', '2021-07-31 14:27:52', '2021-07-31 14:27:52'),
(10, '1010', 'Ira', '2004-01-28', 'Perempuan', '08237342342', 'Padang', '$2y$10$ntixfJZT0YIuEaMv53UmjOz41WwgmlzxWg9Q6szbL7n9fEeQUosji', 'Aktif', '2021-07-31 14:28:38', '2021-07-31 14:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `slider_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`slider_id`, `slider_nama`, `slider_foto`, `created_at`, `updated_at`) VALUES
(1, 'Selamat Datang di Website MTSN Pengambiran', '1643692472.jpg', '2022-01-31 22:14:32', '2022-01-31 22:14:32'),
(2, 'Welcome to Website MTSN Pengambiran', '1643694031.jpg', '2022-01-31 22:40:31', '2022-01-31 22:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spp`
--

CREATE TABLE `tb_spp` (
  `spp_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tahun_ajar_id` int(11) NOT NULL,
  `spp_tgl_bayar` date NOT NULL,
  `spp_bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_spp`
--

INSERT INTO `tb_spp` (`spp_id`, `siswa_id`, `kelas_id`, `tahun_ajar_id`, `spp_tgl_bayar`, `spp_bayar`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 1, '2022-02-01', 120000, '2022-02-01 09:20:36', '2022-02-01 09:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_ajar`
--

CREATE TABLE `tb_tahun_ajar` (
  `tahun_ajar_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajar_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_tahun_ajar`
--

INSERT INTO `tb_tahun_ajar` (`tahun_ajar_id`, `tahun_ajar_nama`, `created_at`, `updated_at`) VALUES
(1, '2021/2022', '2022-01-29 08:24:36', '2022-01-29 08:24:36'),
(2, '2022/2023', '2022-01-29 08:24:48', '2022-01-29 08:24:48'),
(3, '2023/2024', '2022-01-29 08:25:02', '2022-01-29 08:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_walas`
--

CREATE TABLE `tb_walas` (
  `walas_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tahun_ajar_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_walas`
--

INSERT INTO `tb_walas` (`walas_id`, `guru_id`, `kelas_id`, `tahun_ajar_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-01-30 05:09:55', '2022-01-30 06:53:45'),
(2, 6, 2, 1, '2022-01-30 05:10:23', '2022-01-30 05:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_walas_siswa`
--

CREATE TABLE `tb_walas_siswa` (
  `walas_siswa_id` bigint(20) UNSIGNED NOT NULL,
  `walas_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_walas_siswa`
--

INSERT INTO `tb_walas_siswa` (`walas_siswa_id`, `walas_id`, `siswa_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-01-30 05:11:28', '2022-01-30 05:11:28'),
(5, 1, 2, '2022-01-30 06:44:24', '2022-01-30 06:44:24'),
(6, 1, 3, '2022-01-30 06:44:27', '2022-01-30 06:44:27'),
(7, 2, 4, '2022-01-30 06:44:52', '2022-01-30 06:44:52'),
(8, 2, 5, '2022-01-30 06:44:55', '2022-01-30 06:44:55'),
(9, 2, 6, '2022-01-30 06:44:58', '2022-01-30 06:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `tb_kepsek`
--
ALTER TABLE `tb_kepsek`
  ADD PRIMARY KEY (`kepsek_id`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indexes for table `tb_nilai_detail`
--
ALTER TABLE `tb_nilai_detail`
  ADD PRIMARY KEY (`nilai_detail_id`);

--
-- Indexes for table `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`spp_id`);

--
-- Indexes for table `tb_tahun_ajar`
--
ALTER TABLE `tb_tahun_ajar`
  ADD PRIMARY KEY (`tahun_ajar_id`);

--
-- Indexes for table `tb_walas`
--
ALTER TABLE `tb_walas`
  ADD PRIMARY KEY (`walas_id`);

--
-- Indexes for table `tb_walas_siswa`
--
ALTER TABLE `tb_walas_siswa`
  ADD PRIMARY KEY (`walas_siswa_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `galeri_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `guru_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `info_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `kelas_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kepsek`
--
ALTER TABLE `tb_kepsek`
  MODIFY `kepsek_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `mapel_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `nilai_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_nilai_detail`
--
ALTER TABLE `tb_nilai_detail`
  MODIFY `nilai_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `profile_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `semester_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `siswa_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `slider_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `spp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tahun_ajar`
--
ALTER TABLE `tb_tahun_ajar`
  MODIFY `tahun_ajar_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_walas`
--
ALTER TABLE `tb_walas`
  MODIFY `walas_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_walas_siswa`
--
ALTER TABLE `tb_walas_siswa`
  MODIFY `walas_siswa_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
