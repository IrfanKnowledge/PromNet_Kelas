-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 08:29 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi_atlantis`
--
CREATE DATABASE IF NOT EXISTS `koperasi_atlantis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `koperasi_atlantis`;

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_anggota` char(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `saldo` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `no_anggota`, `nama`, `alamat`, `saldo`) VALUES
(1, 'D5521', 'Annisa Noor Putri', 'Jl. Kenanga No. 10 RT: 01 RW: 02 Kel. Pelajar Kec. Cipelangi', 1450000),
(2, 'D5522', 'Ardhya Maulana', 'Jl. Impian No. 99 RT: 05 RW: 06 Kel. Pelajar Kec. Cipelangi', 7500000);

--
-- Triggers `anggota`
--
DELIMITER $$
CREATE TRIGGER `anggota_before_update` BEFORE UPDATE ON `anggota` FOR EACH ROW BEGIN
IF new.saldo < 50000 THEN
	SIGNAL SQLSTATE '45000'
    	SET MESSAGE_TEXT = 'Maaf, jumlah minimal setoran adalah 50000';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kd_anggota` char(5) NOT NULL,
  `setoran` int(10) UNSIGNED DEFAULT NULL,
  `saldo_akhir` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `kd_anggota`, `setoran`, `saldo_akhir`) VALUES
(1, '2018-12-26', 'D5521', 200000, 900000),
(3, '2018-12-27', 'D5521', 500000, 1400000),
(4, '2018-12-27', 'D5521', 500000, 1400000),
(5, '2018-12-27', 'D5521', 500000, 1400000),
(6, '2018-12-27', 'D5521', 500000, 1400000),
(17, '2018-12-27', 'D5522', 600000, 1600000),
(19, '2018-12-27', 'D5522', 400000, 2000000),
(23, '2018-12-27', 'D5522', 5000000, 7000000),
(28, '2018-12-27', 'D5522', 50000, 7050000),
(34, '2018-12-27', 'D5522', 50000, 7100000),
(42, '2018-12-27', 'D5522', 50000, 7150000),
(44, '2018-12-27', 'D5521', 50000, 1450000),
(47, '2018-12-27', 'D5522', 50000, 7200000),
(51, '2018-12-27', 'D5522', 50000, 7250000),
(59, '2018-12-27', 'D5522', 50000, 7300000),
(65, '2018-12-27', 'D5522', 50000, 7350000),
(69, '2018-12-27', 'D5522', 50000, 7400000),
(72, '2018-12-27', 'D5522', 50000, 7450000),
(77, '2018-12-27', 'D5522', 50000, 7500000);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `transaksi_before_insert` BEFORE INSERT ON `transaksi` FOR EACH ROW BEGIN
IF new.setoran < 50000 THEN
	SIGNAL SQLSTATE '45000'
    	SET MESSAGE_TEXT = 'Maaf, jumlah minimal setoran adalah 50000';
END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_anggota` (`no_anggota`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kd_anggota_transaksi` (`kd_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_kd_anggota_transaksi` FOREIGN KEY (`kd_anggota`) REFERENCES `anggota` (`no_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
