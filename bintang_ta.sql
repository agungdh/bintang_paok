-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2018 at 09:56 PM
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
-- Database: `bintang_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `bidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `bidang`) VALUES
(1, 'Perekonomian dan Sumber Daya Alam'),
(2, 'Sosial Budaya dan Pemerintahan'),
(3, 'Infrastruktur dan Pengembangan Wilayah'),
(4, 'Pengendalian dan Litbang');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `judul_aplikasi` varchar(255) NOT NULL,
  `judul_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`judul_aplikasi`, `judul_menu`) VALUES
('Bintang Paok', 'KEMPLO');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `surat_id` int(11) NOT NULL,
  `waktu_disposisi` datetime NOT NULL,
  `bidang_id` int(11) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `waktu_baca` datetime DEFAULT NULL,
  `disposisi_id` int(11) DEFAULT NULL,
  `proses_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `surat_id`, `waktu_disposisi`, `bidang_id`, `isi`, `waktu_baca`, `disposisi_id`, `proses_id`) VALUES
(5, 11, '2018-07-26 02:37:05', NULL, 'asdfsaf', NULL, NULL, NULL),
(6, 12, '2018-07-26 02:37:49', 2, 'sos pem', NULL, NULL, NULL),
(7, 13, '2018-07-26 02:43:10', NULL, '11', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `id` int(11) NOT NULL,
  `waktu_proses` datetime NOT NULL,
  `waktu_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proses`
--

INSERT INTO `proses` (`id`, `waktu_proses`, `waktu_selesai`) VALUES
(6, '2018-07-26 02:00:54', '2018-07-26 02:02:09'),
(7, '2018-07-26 02:02:35', '2018-07-26 02:02:37'),
(8, '2018-07-26 02:52:14', NULL),
(9, '2018-07-26 02:52:27', NULL),
(10, '2018-07-26 02:54:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `nosurat` varchar(255) NOT NULL,
  `waktu_terima` datetime NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `waktu_baca` datetime DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `disposisi_id` int(11) DEFAULT NULL,
  `proses_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `nosurat`, `waktu_terima`, `pengirim`, `perihal`, `waktu_baca`, `nama_file`, `disposisi_id`, `proses_id`) VALUES
(9, '1', '2018-07-26 02:00:37', '2', '3', '2018-07-26 02:00:54', 'BAB 1-3.pdf', NULL, 6),
(10, '2', '2018-07-26 02:00:46', '3', '4', '2018-07-26 02:02:18', 'db_kegiatanlomba.sql', NULL, 7),
(11, '3', '2018-07-26 02:03:26', '4', '5', NULL, 'linuxmint-19-cinnamon-64bit.iso.torrent', 5, NULL),
(12, '1241', '2018-07-26 02:37:40', '124141241', '24rsgdfgn', NULL, 'adminer-4.6.3.php', 6, NULL),
(13, 'sdfsdf', '2018-07-26 02:43:02', 'sdfsdfsd', 'sdfs', NULL, 'BAB 1-3 (1).pdf', 7, NULL),
(14, 'dsfsdf', '2018-07-26 02:54:27', 'dsfasdf', 'sadf', '2018-07-26 02:54:38', 'BAB 1-3 (1) (1).pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `bidang_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `bidang_id`) VALUES
(1, 'Administrator', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1, NULL),
(2, 'Admin Test', 'admintest', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 1, NULL),
(3, 'test sekertaris', 'sekertaris', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3, NULL),
(4, 'test kadis', 'kadis', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 2, NULL),
(7, 'sosmdut 1221', 'sosmbut', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 4, 2),
(8, 'test operator', 'testop', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 5, NULL);

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
  ADD KEY `bidang_id` (`bidang_id`),
  ADD KEY `disposisi_ibfk_2` (`surat_id`),
  ADD KEY `proses_id` (`proses_id`),
  ADD KEY `disposisi_id` (`disposisi_id`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disposisi_id` (`disposisi_id`),
  ADD KEY `proses_id` (`proses_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`),
  ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`),
  ADD CONSTRAINT `disposisi_ibfk_4` FOREIGN KEY (`proses_id`) REFERENCES `proses` (`id`),
  ADD CONSTRAINT `disposisi_ibfk_5` FOREIGN KEY (`disposisi_id`) REFERENCES `disposisi` (`id`);

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`disposisi_id`) REFERENCES `disposisi` (`id`),
  ADD CONSTRAINT `surat_ibfk_2` FOREIGN KEY (`proses_id`) REFERENCES `proses` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
