-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 08:16 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_tamu_itc`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penerbit`, `pengarang`, `tahun`, `kategori_id`, `harga`) VALUES
(2, 'Buku Agama', 'Gramedia', 'Roy Suryo', '2001', NULL, 9999),
(3, 'Buku Belajar Memahami Wanita', 'Gramedia', 'Herzi', '2020', 53, 99000);

-- --------------------------------------------------------

--
-- Table structure for table `himpunan`
--

CREATE TABLE `himpunan` (
  `id` int(25) NOT NULL,
  `nama_himpunan` varchar(75) NOT NULL,
  `nama_universitas` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `himpunan`
--

INSERT INTO `himpunan` (`id`, `nama_himpunan`, `nama_universitas`) VALUES
(4, 'Keluarga Besar Mahasiswa', 'Universitas Pamulang');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(6, 'Rhome irama'),
(7, 'lucuu2'),
(8, 'asiap1'),
(10, '12'),
(11, '12'),
(12, '12'),
(13, '12'),
(14, '12'),
(15, 'qw'),
(16, 'qw'),
(17, 'qw'),
(18, 'qw'),
(19, 'qw'),
(20, '123'),
(21, '44'),
(22, 'qd'),
(23, 'ef'),
(24, '24'),
(25, 'qwd'),
(26, 'qwd'),
(27, 'qwd'),
(28, 'qwd'),
(29, 'qwd'),
(31, '123'),
(32, 'qwd'),
(33, 'asd'),
(34, 'asd'),
(35, 'asd'),
(36, '123'),
(37, 'qwd'),
(38, 'asd'),
(39, 'asd'),
(40, 'asd'),
(41, 'asc'),
(42, '123'),
(43, 'asd'),
(44, 'asd'),
(48, 'bb'),
(49, '5000'),
(50, 'Anime'),
(52, '123'),
(53, 'Love Story'),
(54, '2342'),
(55, '2342'),
(56, '2342'),
(57, '123'),
(58, 'tambah');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(25) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `hp` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `himpunan_id` int(11) NOT NULL,
  `universitas_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `himpunan`
--
ALTER TABLE `himpunan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `himpunan_res` (`himpunan_id`),
  ADD KEY `universitas_res` (`universitas_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `himpunan`
--
ALTER TABLE `himpunan`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `himpunan_res` FOREIGN KEY (`himpunan_id`) REFERENCES `himpunan` (`id`),
  ADD CONSTRAINT `universitas_res` FOREIGN KEY (`universitas_id`) REFERENCES `himpunan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
