-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2018 at 10:45 PM
-- Server version: 10.1.29-MariaDB-6
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bintang_paok`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `bidang` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `bidang`) VALUES
(1, 'Administrator'),
(2, 'Sekertaris'),
(3, 'Operator'),
(11, 'Perekonomian dan Sumber Daya Alam'),
(12, 'Sosial Budaya dan Pemerintahan'),
(13, 'Infrastruktur dan Pengembangan Wilayah'),
(14, 'Pengendalian dan Litbang');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `judul_aplikasi` varchar(191) NOT NULL,
  `judul_menu` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`judul_aplikasi`, `judul_menu`) VALUES
('Bintang PAOK', 'KEMPLO');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `surat_id` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `keterangan` varchar(191) NOT NULL,
  `bidang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `id` int(11) NOT NULL,
  `surat_id` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `bidang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `nosurat` varchar(191) NOT NULL,
  `waktu` datetime NOT NULL,
  `pengirim` varchar(191) NOT NULL,
  `perihal` varchar(191) NOT NULL,
  `nama_file` varchar(191) NOT NULL,
  `bidang_id` int(11) NOT NULL,
  `selesai` enum('y','t') NOT NULL DEFAULT 't'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `bidang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `bidang_id`) VALUES
(1, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'Administrator', 1),
(2, 'sekertaris', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Sekertaris', 2),
(3, 'operator', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Operator', 3),
(4, 'sosmbut', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Sos Mbut', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_id` (`surat_id`),
  ADD KEY `bidang_id` (`bidang_id`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_id` (`surat_id`),
  ADD KEY `bidang_id` (`bidang_id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bidang_id` (`bidang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `bidang_id` (`bidang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`);

--
-- Constraints for table `proses`
--
ALTER TABLE `proses`
  ADD CONSTRAINT `proses_ibfk_1` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `proses_ibfk_2` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`);

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
