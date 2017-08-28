-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2017 at 04:32 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id_job` int(11) NOT NULL,
  `nama_job` varchar(50) NOT NULL,
  `kondisi_enum` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id_job`, `nama_job`, `kondisi_enum`) VALUES
(1, 'aplikasi website', 'aktif'),
(2, 'aplikasi mobile', 'aktif'),
(3, 'buku', 'aktif'),
(4, 'dokumen', 'aktif'),
(5, 'logo', 'aktif'),
(6, 'flash app', 'aktif'),
(7, 'article', 'aktif'),
(8, 'photo', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `username_karyawan` varchar(50) NOT NULL,
  `password_karyawan` varchar(32) NOT NULL,
  `status_karyawan` varchar(20) NOT NULL,
  `kondisi_enum` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `username_karyawan`, `password_karyawan`, `status_karyawan`, `kondisi_enum`) VALUES
(1, 'reynaldo', 'aldo', 'b8331b089982ea82210bb0844e9f93e5', 'Karyawan', 'aktif'),
(2, 'Faiz Al Qurni', 'faiz', '9d4d4ab0dfdb72a54b895d78b90b09c7', 'Admin', 'aktif'),
(3, 'Ibnu Shodiqin Suhaemy', 'ibnu', '195ace8d50de761419faf08845304398', 'Project Manager', 'aktif'),
(4, 'Andy Zain Ifkaruddin Shodiq', 'zain', '3ed9b95e4b6f2c345836def81e570ef1', 'Super admin', 'aktif'),
(5, 'Muhammad Luqman Hakim', 'cakmin', 'c102c9c82bc100489040887cb06a13e3', 'Karyawan', 'aktif'),
(6, 'Akhmad Maulidi', 'lidi', 'd81d178c8b74ab7f28690363f44b57f2', 'Karyawan', 'aktif'),
(7, 'Muhammad Handharbeni', 'ben', '7fe4771c008a22eb763df47d19e2c6aa', 'Karyawan', 'aktif'),
(8, 'Dimas Virdana', 'dimas', '7d49e40f4b3d8f68c19406a58303f826', 'Karyawan', 'aktif'),
(9, 'Imaniar Hanifa', 'ifa', '3e3912811c061a1c6326eabaa492aa0d', 'Karyawan', 'aktif'),
(13, 'test', 'test', '147538da338b770b61e592afc92b1ee6', 'Super admin', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_client`
--

CREATE TABLE `kategori_client` (
  `id_kategori_client` int(11) NOT NULL,
  `nama_kategori_client` varchar(50) NOT NULL,
  `kondisi_enum` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_client`
--

INSERT INTO `kategori_client` (`id_kategori_client`, `nama_kategori_client`, `kondisi_enum`) VALUES
(1, 'fiverr.com', 'aktif'),
(2, 'project.co.id', 'aktif'),
(3, 'upwork', 'aktif'),
(4, '99 design', 'aktif'),
(5, 'Dribble', 'aktif'),
(6, 'Instansi Pemerintah', 'aktif'),
(7, 'Instansi Swasta', 'aktif'),
(8, 'Studio Web Lokal', 'aktif'),
(9, 'Studio Web Luar Negeri', 'aktif'),
(10, 'Lokal Lain', 'aktif'),
(11, 'Illiyin Studio', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `id_klien` int(11) NOT NULL,
  `nama_klien` varchar(50) NOT NULL,
  `id_kategori_client` int(11) NOT NULL,
  `email_klien` varchar(50) NOT NULL,
  `no_telp_klien` varchar(20) NOT NULL,
  `kondisi_enum` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id_klien`, `nama_klien`, `id_kategori_client`, `email_klien`, `no_telp_klien`, `kondisi_enum`) VALUES
(1, 'nani 99', 4, 'reyaremania@gmail.com', '0812345678', 'aktif'),
(2, 'samsul project', 2, 'test@gmail.com', '081234455678', 'aktif'),
(3, 'bambang upwork', 3, 'bambang@yahoo.com', '08123456791', 'aktif'),
(5, 'Test', 2, 'reyaremania@gmail.com', '08123456789', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `no_project` int(11) NOT NULL,
  `nama_project` varchar(50) NOT NULL,
  `id_sumber_project` int(11) NOT NULL,
  `id_status_project` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_kategori_client` int(11) NOT NULL,
  `tanggal_mulai_project` date NOT NULL,
  `tanggal_selesai_project` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `no_project`, `nama_project`, `id_sumber_project`, `id_status_project`, `id_client`, `id_kategori_client`, `tanggal_mulai_project`, `tanggal_selesai_project`) VALUES
(12, 1, 'SMS Gateway', 3, 2, 2, 10, '0000-00-00', '0000-00-00'),
(13, 2, 'Persi aqua', 1, 2, 1, 9, '0000-00-00', '0000-00-00'),
(14, 3, 'Persi aqua', 1, 2, 1, 1, '0000-00-00', '0000-00-00'),
(15, 4, '', 1, 1, 1, 1, '0000-00-00', '0000-00-00'),
(16, 5, '', 1, 4, 1, 1, '0000-00-00', '0000-00-00'),
(17, 6, 'nakamnakam', 2, 2, 2, 2, '0000-00-00', '0000-00-00'),
(18, 7, '', 1, 1, 1, 1, '2017-07-25', '2017-07-31'),
(19, 8, '', 3, 1, 3, 11, '2017-07-24', '2017-07-31'),
(20, 9, 'bambang', 1, 1, 1, 1, '2016-07-18', '2017-07-31'),
(21, 10, '', 1, 1, 1, 1, '2017-07-04', '2017-07-31'),
(22, 11, '', 1, 1, 1, 1, '2017-06-07', '2017-07-31'),
(23, 12, '', 1, 1, 1, 1, '2017-06-17', '2017-07-31'),
(24, 13, '', 1, 1, 1, 1, '2017-05-17', '2017-07-31'),
(26, 15, '', 1, 1, 1, 1, '2017-03-01', '2017-07-24'),
(27, 16, '', 1, 1, 1, 1, '2017-02-08', '2017-07-31'),
(28, 17, '', 1, 1, 1, 1, '2017-01-03', '2017-07-17'),
(29, 18, '', 1, 1, 1, 1, '2017-07-26', '2017-07-31'),
(30, 19, '', 1, 2, 1, 1, '2017-07-10', '2017-07-24'),
(31, 20, '', 1, 1, 1, 1, '2017-07-11', '2017-07-31'),
(32, 21, '', 1, 1, 1, 1, '2017-02-09', '2017-07-18'),
(33, 22, '', 1, 1, 1, 1, '2017-01-10', '2017-07-31'),
(34, 23, 'RIDHO123', 3, 1, 1, 5, '2017-08-20', '2017-08-31'),
(35, 23, '', 1, 1, 1, 1, '2016-12-13', '2017-07-25'),
(36, 24, 'test', 1, 1, 1, 1, '2017-07-28', '2017-07-28'),
(37, 25, 'samsul', 1, 1, 1, 1, '2017-07-24', '2017-07-31'),
(38, 26, '123', 1, 1, 1, 1, '2017-06-13', '2017-07-31'),
(39, 27, 'Afrikgo', 1, 1, 2, 9, '2017-07-17', '2017-07-31'),
(40, 28, '123', 1, 1, 1, 1, '2017-07-24', '2017-07-31'),
(41, 29, 'test', 1, 1, 1, 1, '2017-08-01', '2017-08-31'),
(42, 30, 'Ayam', 1, 1, 2, 5, '2017-07-05', '2017-08-23'),
(43, 31, 'coba 1', 1, 2, 1, 1, '2017-08-01', '2017-08-02'),
(44, 32, 'coba 2', 1, 2, 1, 1, '2017-08-02', '2017-08-29'),
(45, 33, 'RIDHO', 2, 1, 3, 2, '2017-08-16', '2017-08-31'),
(46, 34, 'test', 2, 2, 2, 1, '2017-08-15', '2017-08-24'),
(47, 35, 'test123', 2, 2, 2, 2, '2017-08-21', '2017-08-30'),
(48, 36, 'Wkwwkkw', 1, 1, 1, 1, '2017-08-08', '2017-08-30'),
(49, 37, 'Gorengan 1', 1, 1, 5, 9, '2017-08-09', '2017-08-29'),
(50, 38, 'percobaan tanggal', 2, 1, 1, 1, '2017-08-15', '2017-09-14'),
(51, 39, 'qwer', 1, 1, 1, 1, '2017-08-08', '2017-08-30'),
(52, 40, '123456', 1, 1, 1, 1, '2017-08-22', '2017-08-31'),
(53, 41, 'abc', 2, 2, 1, 1, '2017-08-23', '2017-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `status_project`
--

CREATE TABLE `status_project` (
  `id_status_project` int(11) NOT NULL,
  `nama_status_project` varchar(50) NOT NULL,
  `kondisi_enum` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_project`
--

INSERT INTO `status_project` (`id_status_project`, `nama_status_project`, `kondisi_enum`) VALUES
(1, 'selesai', 'aktif'),
(2, 'proses', 'aktif'),
(3, 'review', 'aktif'),
(4, 'tertunda', 'aktif'),
(5, 'batal', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `sumber_project`
--

CREATE TABLE `sumber_project` (
  `id_sumber_project` int(11) NOT NULL,
  `nama_sumber_project` varchar(50) NOT NULL,
  `kondisi_enum` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumber_project`
--

INSERT INTO `sumber_project` (`id_sumber_project`, `nama_sumber_project`, `kondisi_enum`) VALUES
(1, 'luar', 'aktif'),
(2, 'lokal', 'aktif'),
(3, 'intern', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_project`
--

CREATE TABLE `transaksi_project` (
  `id_transaksi_project` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `detail_jenis_project` text NOT NULL,
  `id_status_project` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_project`
--

INSERT INTO `transaksi_project` (`id_transaksi_project`, `id_project`, `id_karyawan`, `id_job`, `detail_jenis_project`, `id_status_project`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(64, 43, 3, 1, 'test', 1, '2017-08-01', '2017-08-02'),
(66, 44, 2, 2, 'test', 3, '2017-08-03', '2017-08-29'),
(68, 44, 3, 3, 'tset', 1, '2017-08-02', '2017-08-29'),
(70, 44, 5, 1, 'testt', 1, '2017-08-02', '2017-08-29'),
(71, 44, 7, 1, 'testtt', 1, '2017-08-02', '2017-08-29'),
(86, 34, 1, 2, '123456', 1, '2017-08-20', '2017-08-31'),
(87, 34, 1, 1, '12345', 1, '2017-08-20', '2017-08-31'),
(88, 39, 1, 1, 'goreng', 1, '2017-07-17', '2017-07-31'),
(90, 43, 1, 1, '123456', 1, '2017-08-01', '2017-08-02'),
(91, 43, 1, 1, '12345', 2, '2017-08-01', '2017-08-02'),
(92, 45, 1, 1, '12345', 1, '2017-08-16', '2017-08-31'),
(93, 45, 1, 1, '12345', 1, '2017-08-16', '2017-08-31'),
(95, 44, 9, 1, '12345', 1, '2017-08-02', '2017-08-29'),
(96, 44, 9, 1, 'test', 1, '2017-08-07', '2017-08-29'),
(97, 45, 1, 1, '124', 1, '2017-08-16', '2017-08-31'),
(98, 44, 1, 1, 'ayam', 1, '2017-08-02', '2017-08-21'),
(99, 49, 1, 1, 'Ayam', 1, '2017-08-09', '2017-08-29'),
(100, 49, 1, 1, 'ayam', 1, '2017-08-17', '2017-08-20'),
(101, 50, 1, 1, 'test', 1, '2017-09-07', '2017-09-07'),
(102, 48, 1, 1, '1234567', 1, '2017-08-17', '2017-08-23'),
(103, 48, 13, 1, 'wwkkwkw', 1, '2017-08-16', '2017-08-30'),
(104, 53, 1, 1, 'qwer', 2, '2017-08-24', '2017-08-29'),
(105, 47, 1, 1, '12345', 2, '2017-08-23', '2017-08-30'),
(106, 46, 6, 1, 'ayam', 3, '2017-08-16', '2017-08-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori_client`
--
ALTER TABLE `kategori_client`
  ADD PRIMARY KEY (`id_kategori_client`);

--
-- Indexes for table `klien`
--
ALTER TABLE `klien`
  ADD PRIMARY KEY (`id_klien`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `status_project`
--
ALTER TABLE `status_project`
  ADD PRIMARY KEY (`id_status_project`);

--
-- Indexes for table `sumber_project`
--
ALTER TABLE `sumber_project`
  ADD PRIMARY KEY (`id_sumber_project`);

--
-- Indexes for table `transaksi_project`
--
ALTER TABLE `transaksi_project`
  ADD PRIMARY KEY (`id_transaksi_project`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kategori_client`
--
ALTER TABLE `kategori_client`
  MODIFY `id_kategori_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id_klien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `status_project`
--
ALTER TABLE `status_project`
  MODIFY `id_status_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sumber_project`
--
ALTER TABLE `sumber_project`
  MODIFY `id_sumber_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi_project`
--
ALTER TABLE `transaksi_project`
  MODIFY `id_transaksi_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
