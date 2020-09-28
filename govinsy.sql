-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 04:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `govinsy`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` varchar(5) NOT NULL,
  `id_pertanyaan` varchar(5) NOT NULL,
  `jawaban` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `id_pertanyaan`, `jawaban`) VALUES
('01f5c', 'e98e3', 'Rp. 5.000.000 -  Rp. 10.000.000'),
('0d1b7', '7195e', 'Kos/Menyewa'),
('0d2cb', '6f5e0', 'Katholik'),
('1082b', '4038e', 'SMP/SLTP/Sederajat'),
('187c1', '96ff5', 'Tidak Bekerja'),
('1982a', '7195e', 'Menumpang (Orang Tua/Saudara/Teman)'),
('20ef3', '4038e', 'Tidak Bersekolah'),
('276d2', '6f5e0', 'Hindu'),
('2d8a0', 'e98e3', 'Rp. 1.000.000 - Rp. 5.000.000'),
('2eecf', '96ff5', 'PNS/TNI/POLRI'),
('35ed7', '7195e', 'Rumah Sendiri'),
('3fa31', '6f5e0', 'Buddha'),
('436c0', '4038e', 'SMA/SMK/SLTA/Sederajat'),
('457a4', '4038e', 'S3'),
('483d1', 'e98e3', '> Rp. 10.000.000'),
('4c050', '96ff5', 'Karyawan Swasta'),
('821c3', '6f5e0', 'Islam'),
('889b9', '4038e', 'SD'),
('8b283', '6f5e0', 'Konghucu'),
('9e9aa', '96ff5', 'Wirausaha'),
('b40ea', 'e98e3', '< Rp.1.000.000'),
('b63ad', '96ff5', 'Freelancer'),
('bfe74', '96ff5', 'Buruh'),
('c793b', '4038e', 'S2'),
('dbcd6', '6f5e0', 'Kristen'),
('dc29f', '6f5e0', 'Lainnya'),
('e847a', '4038e', 'S1'),
('f0a84', 'e98e3', 'Tidak Ingin Disebutkan');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pengguna`
--

CREATE TABLE `jawaban_pengguna` (
  `id` varchar(5) NOT NULL,
  `id_jawaban` varchar(5) NOT NULL,
  `id_pengguna` varchar(5) NOT NULL,
  `respon` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban_pengguna`
--

INSERT INTO `jawaban_pengguna` (`id`, `id_jawaban`, `id_pengguna`, `respon`) VALUES
('1048c', '1982a', '2b1c6', ''),
('1a9c5', 'dbcd6', 'cac3e', ''),
('21284', '9e9aa', '2b1c6', ''),
('3236e', '483d1', '2b1c6', ''),
('373a2', '35ed7', 'cac3e', ''),
('3903a', '821c3', '75924', ''),
('3d6a5', '9e9aa', 'cac3e', ''),
('4b858', '436c0', 'd6d5e', ''),
('4c20c', '2d8a0', 'cac3e', ''),
('4f162', '0d1b7', '75924', ''),
('5b6d2', 'b63ad', '75924', ''),
('61944', '01f5c', '75924', ''),
('62a3e', '436c0', 'cac3e', ''),
('81727', '457a4', '2b1c6', ''),
('9710c', '821c3', 'd6d5e', ''),
('b7714', 'e847a', '2d287', ''),
('bf946', '1982a', 'd6d5e', ''),
('c67fa', '0d2cb', '2d287', ''),
('ceb22', '0d1b7', '2d287', ''),
('d67e3', '187c1', 'd6d5e', ''),
('df07f', '187c1', '2d287', ''),
('e6dc0', 'b40ea', 'd6d5e', ''),
('ee355', '8b283', '2b1c6', ''),
('eedb2', 'e847a', '75924', ''),
('ef6c4', 'b40ea', '2d287', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `survei` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `survei`) VALUES
('2b1c6', 'Cobu', 'cobu666@gmail.com', '8f008d6527e97b8f657299683d94c9f0', 0),
('2d287', 'Bukan Admin', 'bukanadmin@user.com', '992baf4879618dbfb66e5786ebb3a923', 1),
('4daac', 'Usr', 'usr@gmail.com', '5c5797a735f5c133e2999b6e33377772', 1),
('75924', 'Opet', 'opet@govinsy.com', 'd73d5a80ce906473d290d81e5f694508', 1),
('cac3e', 'User', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 1),
('d6d5e', 'Pengguna', 'pengguna@govinsy.com', '8b097b8a86f9d6a991357d40d3d58634', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` varchar(5) NOT NULL,
  `id_survei` varchar(5) NOT NULL,
  `tipe` varchar(64) NOT NULL,
  `pertanyaan` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `id_survei`, `tipe`, `pertanyaan`) VALUES
('4038e', 'e0663', 'radio', 'Jenjang Pendidikan terakhir anda'),
('6f5e0', 'e0663', 'radio', 'Agama yang anda anut sekarang'),
('7195e', 'e0663', 'radio', 'Dimanakah anda tinggal sekarang'),
('96ff5', 'e0663', 'radio', 'Pekerjaan Profesional yang anda tekuni sekarang'),
('e98e3', 'e0663', 'radio', 'Berapakah gaji rata-rata anda pebulan?');

-- --------------------------------------------------------

--
-- Table structure for table `survei`
--

CREATE TABLE `survei` (
  `id` varchar(5) NOT NULL,
  `kategori` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survei`
--

INSERT INTO `survei` (`id`, `kategori`) VALUES
('baf93', 'survei_baru'),
('e0663', 'survei');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban_pengguna`
--
ALTER TABLE `jawaban_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survei`
--
ALTER TABLE `survei`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
