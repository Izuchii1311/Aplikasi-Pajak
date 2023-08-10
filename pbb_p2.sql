-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 12:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbb_p2`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_sppt`
--

CREATE TABLE `data_sppt` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kode_id` varchar(6) DEFAULT NULL,
  `nop` varchar(18) DEFAULT NULL,
  `akun` varchar(30) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat_op` varchar(50) DEFAULT NULL,
  `alamat_wp` varchar(50) DEFAULT NULL,
  `luas_bumi` decimal(10,2) DEFAULT NULL,
  `kelas_bumi` varchar(10) DEFAULT NULL,
  `njop_bumi` decimal(12,2) DEFAULT NULL,
  `luas_bangunan` decimal(10,2) DEFAULT NULL,
  `kelas_bangunan` varchar(10) DEFAULT NULL,
  `njop_bangunan` decimal(12,2) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_sppt`
--

INSERT INTO `data_sppt` (`id`, `user_id`, `kode_id`, `nop`, `akun`, `nama`, `alamat_op`, `alamat_wp`, `luas_bumi`, `kelas_bumi`, `njop_bumi`, `luas_bangunan`, `kelas_bangunan`, `njop_bangunan`, `tanggal`) VALUES
(14, 7, 'KDID-1', '-0011', '-', 'Luthfi Nur Ramadhan', 'Jl. Kopo', 'Jl. Kopo', 200.00, '-', 200.00, 200.00, '-', 200.00, '0000-00-00'),
(15, 8, 'KDID-2', '0022', '-', 'Dinda Anisa Salsabila', 'Jl. Kopo', 'Jl. Kopo', 300.00, '-', 300.00, 300.00, '-', 300.00, '0000-00-00'),
(16, 9, 'KDID-3', '0033', '-', 'Rianda Fuad Syafi&#039;i', 'Jl. Kopo', 'Jl. Kopo', 400.00, '-', 400.00, 400.00, '-', 400.00, '0000-00-00'),
(17, 11, 'KDID-4', '0044', '-', 'Anissa Liviana', 'Jl. Kopo', 'Jl. Kopo', 500.00, '-', 500.00, 500.00, '-', 500.00, '0000-00-00'),
(18, 12, 'KDID-5', '0055', '-', 'Syifa Noerrohmah', 'Jl. Kopo', 'Jl. Kopo', 600.00, '-', 600.00, 600.00, '-', 600.00, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `data_warga`
--

CREATE TABLE `data_warga` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `no_kk` varchar(16) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_warga`
--

INSERT INTO `data_warga` (`id`, `nik`, `no_kk`, `nama`, `alamat`, `rt`, `rw`) VALUES
(7, '2142430', '2142430', 'Luthfi Nur Ramadhan', 'Jl. Madesa No.21', 5, 11),
(8, '2142431', '2142431', 'Dinda Anisa Salsabila', 'Jl. Buah Batu No.117', 3, 9),
(9, '2142432', '2142432', 'Rianda Fuad Syafi&#039;i', 'Jl. Jakarta No.3', 12, 1),
(11, '2142433', '2142433', 'Anissa Liviana', 'Jl. Bogor No.47', 7, 4),
(12, '2142434', '2142434', 'Syifa Noerrohmah', '-', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(13, 'Syifa Noerrohmah', 'admin@gmail.com', '$2y$10$2awJ0sywNbMEsUghlWppu.GHkEtScxG83P.ysbu4MaxVJ0M.69ds.', 'admin'),
(15, 'Luthfi Nur Ramadhan', 'user@gmail.com', '$2y$10$WdWKOM/vcOxoyDG7Oid/Ce0HE/3ifE.eAc7..er6vIm83utZ.aCzO', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_sppt`
--
ALTER TABLE `data_sppt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `data_warga`
--
ALTER TABLE `data_warga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_sppt`
--
ALTER TABLE `data_sppt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `data_warga`
--
ALTER TABLE `data_warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_sppt`
--
ALTER TABLE `data_sppt`
  ADD CONSTRAINT `data_sppt_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `data_warga` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
