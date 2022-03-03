-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 07:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayusmusic`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah_total` decimal(40,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_order`, `tanggal`, `jumlah_total`) VALUES
(20, 20, '2022-01-28', '25000'),
(21, 21, '2022-01-31', '0'),
(22, 22, '2022-02-01', '0'),
(23, 23, '2022-03-03', '0');

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id_bayar` int(11) NOT NULL,
  `nama_metode` varchar(255) DEFAULT NULL,
  `rekening` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `metode_bayar`
--

INSERT INTO `metode_bayar` (`id_bayar`, `nama_metode`, `rekening`) VALUES
(1, 'BRI', '3123309910239001'),
(2, 'DANA', '0987654312'),
(3, 'OVO', '0987654312');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `id_bayar` int(11) DEFAULT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `no_wa` varchar(255) DEFAULT NULL,
  `jumlah_tiket` int(11) DEFAULT NULL,
  `harga` decimal(32,0) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `kode_order` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_tiket`, `id_bayar`, `nama_pemesan`, `no_wa`, `jumlah_tiket`, `harga`, `status_order`, `kode_order`) VALUES
(20, 1, 1, 'Budi', '09876443', 1, '25000', 1, '20DnsiIPmSEBuZqpzWNJoeGC9cFjgUYXK8y0'),
(21, 1, 1, 'Rizki', '09876443', 1, '25000', 0, ''),
(22, 1, 1, 'Ray', '098766555431', 2, '50000', 0, ''),
(23, 1, 1, 'Dhira', '087653123441', 3, '75000', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_wilayah` int(11) DEFAULT NULL,
  `judul_konser` varchar(255) DEFAULT NULL,
  `nama_band` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tempat` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_wilayah`, `judul_konser`, `nama_band`, `tanggal`, `harga`, `jumlah`, `tempat`) VALUES
(1, 1, 'Sabtu Sambat', 'Galau Band', '2022-01-15', '25000', 129, 'Jl.Taman Ayu No.37 ,Mojokerto'),
(2, 1, 'Ambyar Tenan', 'Gugus Ngarep', '2022-01-14', '15000', 100, 'Jl.Taman Ayu No.37 ,Mojokerto'),
(3, 2, 'Ngerock n Roll', 'New Wings', '2022-01-19', '30000', 130, 'Jl.Taman Ayu No.37 ,Mojokerto');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `sandi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `sandi`) VALUES
(1, 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtransaksi`
-- (See below for the actual view)
--
CREATE TABLE `vwtransaksi` (
`id_order` int(11)
,`nama_pemesan` varchar(255)
,`judul_konser` varchar(255)
,`no_wa` varchar(255)
,`jumlah_tiket` int(11)
,`harga` varchar(255)
,`hatot` decimal(32,0)
,`status_order` int(11)
,`id_tiket` int(11)
,`kode_order` varchar(255)
,`tanggal` date
,`nama_band` varchar(255)
,`tempat` longtext
,`wilayah` varchar(255)
,`nama_metode` varchar(255)
,`rekening` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `wilayah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `wilayah`) VALUES
(1, 'Mojokerto'),
(2, 'Sidoarjo'),
(3, 'Surabaya');

-- --------------------------------------------------------

--
-- Structure for view `vwtransaksi`
--
DROP TABLE IF EXISTS `vwtransaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtransaksi`  AS SELECT `order`.`id_order` AS `id_order`, `order`.`nama_pemesan` AS `nama_pemesan`, `tiket`.`judul_konser` AS `judul_konser`, `order`.`no_wa` AS `no_wa`, `order`.`jumlah_tiket` AS `jumlah_tiket`, `tiket`.`harga` AS `harga`, `order`.`harga` AS `hatot`, `order`.`status_order` AS `status_order`, `tiket`.`id_tiket` AS `id_tiket`, `order`.`kode_order` AS `kode_order`, `tiket`.`tanggal` AS `tanggal`, `tiket`.`nama_band` AS `nama_band`, `tiket`.`tempat` AS `tempat`, `wilayah`.`wilayah` AS `wilayah`, `metode_bayar`.`nama_metode` AS `nama_metode`, `metode_bayar`.`rekening` AS `rekening` FROM (((`order` join `tiket` on(`order`.`id_tiket` = `tiket`.`id_tiket`)) join `wilayah` on(`tiket`.`id_wilayah` = `wilayah`.`id_wilayah`)) join `metode_bayar` on(`order`.`id_bayar` = `metode_bayar`.`id_bayar`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `fk_order` (`id_order`);

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_bayar` (`id_bayar`),
  ADD KEY `fk_tiket` (`id_tiket`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `fk_wilayah` (`id_wilayah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_bayar` FOREIGN KEY (`id_bayar`) REFERENCES `metode_bayar` (`id_bayar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tiket` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `fk_wilayah` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
