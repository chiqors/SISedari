-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2019 at 02:09 PM
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
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `id_menu`, `jumlah_beli`, `total_harga`) VALUES
(1, 1, 1, 2, 50000),
(2, 1, 2, 1, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `kupon`
--

CREATE TABLE `kupon` (
  `id` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_hangus` date DEFAULT NULL,
  `diskon` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kupon`
--

INSERT INTO `kupon` (`id`, `tanggal_mulai`, `tanggal_hangus`, `diskon`) VALUES
(3, '2019-07-17', '2019-07-20', 10),
(4, '2019-07-18', '2019-07-19', 5),
(5, '2019-07-17', '2019-07-18', 5);

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

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `harga`, `stok`) VALUES
(1, 'Soto Betawi', 25000, 100),
(2, 'Soto Ayam Sunda', 20000, 95);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `jabatan` varchar(10) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`nip`, `nama`, `alamat`, `kontak`, `jabatan`, `username`, `password`) VALUES
('10117053', 'Oktavian Putra', 'Jln Cigantung no 2', '08325345355', 'CEO', 'oktavian', '97ca8ef6b9f855f1e43381fb7b709c20'),
('10117054', 'Chiqo Rifky Saputra', 'Jln. Berlian no 6', '081223939528', 'Manager', 'chiqors', '3cb3ccfde42856dbfd7a7072a78dbb9e'),
('10117055', 'Cessario', 'Jl Purwakerto no 7', '081223939544', 'Kasir', 'cessario', '2a7665fa097a22534e5c7f547ae4f752');

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
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planning`
--

INSERT INTO `planning` (`id`, `judul`, `konten`, `tanggal_promo_mulai`, `tanggal_promo_selesai`, `nip_karyawan`, `status`) VALUES
(1, 'Promo Buy One Get One', 'No thou floating bird such here agreeing he, a chamber eagerly have yore, of fancy stately sought i my, gave.', '2019-07-16', '2019-07-17', '10117054', 'Disetujui'),
(3, 'Promo Buy 2 Get Bonus', 'ini adalah injfbefbkeg,sdlf,sdl,vsd', '2019-07-20', '2019-07-25', '10117054', 'Belum Disetujui');

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
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `sub_total`, `kupon`, `total_harga`, `bayar`, `kembalian`, `kasir`) VALUES
(1, '2019-07-17 05:00:00', 100000, 1, 90000, 100000, 10000, '10117054');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kupon`
--
ALTER TABLE `kupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `planning_ibfk_1` FOREIGN KEY (`nip_karyawan`) REFERENCES `pengguna` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kasir`) REFERENCES `pengguna` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
