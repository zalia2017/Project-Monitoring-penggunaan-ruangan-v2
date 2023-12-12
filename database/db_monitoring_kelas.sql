-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 08:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring_kelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang_kelas`
--

CREATE TABLE `tb_ruang_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `lokasi_kelas` varchar(100) NOT NULL,
  `status_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ruang_kelas`
--

INSERT INTO `tb_ruang_kelas` (`id_kelas`, `nama_kelas`, `lokasi_kelas`, `status_kelas`) VALUES
(1, 'Ruang Lab 1', 'Lantai 1 Gedung A', 'Kosong'),
(2, 'Ruang Lab 2', 'Lantai 1 Gedung A', 'Kosong'),
(3, 'Ruang Lab 3', 'Lantai 1 Gedung A', 'Terisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ruang_kelas`
--
ALTER TABLE `tb_ruang_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ruang_kelas`
--
ALTER TABLE `tb_ruang_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
