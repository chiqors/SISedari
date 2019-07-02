-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2019 at 06:22 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisedari`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kupon`
--

CREATE TABLE `kupon` (
  `id` int(11) NOT NULL,
  `tanggal_hangus` date DEFAULT NULL,
  `diskon` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(30) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `jabatan` varchar(10) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `planning`
--

CREATE TABLE `planning` (
  `id` int(11) NOT NULL,
  `judul` varchar(30) DEFAULT NULL,
  `konten` text,
  `tanggal_promo_mulai` date DEFAULT NULL,
  `tanggal_promo_selesai` date NOT NULL,
  `nip_karyawan` varchar(10) DEFAULT NULL,
  `status` enum('Unchecked','Approved','Unapproved') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `kupon` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `kasir` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_transaksi`,`id_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `kupon`
--
ALTER TABLE `kupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip_karyawan` (`nip_karyawan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kasir` (`kasir`),
  ADD KEY `kupon` (`kupon`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`);

--
-- Constraints for table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `planning_ibfk_1` FOREIGN KEY (`nip_karyawan`) REFERENCES `pengguna` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kasir`) REFERENCES `pengguna` (`nip`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kupon`) REFERENCES `kupon` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
