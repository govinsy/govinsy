-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2020 pada 15.30
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

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
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id` varchar(5) NOT NULL,
  `id_pertanyaan` varchar(5) NOT NULL,
  `jawaban` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jawaban`
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
-- Struktur dari tabel `jawaban_pengguna`
--

CREATE TABLE `jawaban_pengguna` (
  `id` varchar(5) NOT NULL,
  `id_jawaban` varchar(5) NOT NULL,
  `id_pengguna` varchar(5) NOT NULL,
  `respon` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jawaban_pengguna`
--

INSERT INTO `jawaban_pengguna` (`id`, `id_jawaban`, `id_pengguna`, `respon`) VALUES
('016e7', '35ed7', '5f4da', ''),
('0f8e8', '9e9aa', '5f4da', ''),
('17486', '187c1', '4daac', ''),
('1a9c5', 'dbcd6', 'cac3e', ''),
('2937c', '483d1', '5f4da', ''),
('373a2', '35ed7', 'cac3e', ''),
('3903a', '821c3', '75924', ''),
('3d6a5', '9e9aa', 'cac3e', ''),
('4b858', '436c0', 'd6d5e', ''),
('4c20c', '2d8a0', 'cac3e', ''),
('4f162', '0d1b7', '75924', ''),
('5b6d2', 'b63ad', '75924', ''),
('5e57e', '2d8a0', '4daac', ''),
('61944', '01f5c', '75924', ''),
('62a3e', '436c0', 'cac3e', ''),
('9710c', '821c3', 'd6d5e', ''),
('ac603', '889b9', '4daac', ''),
('b7714', 'e847a', '2d287', ''),
('bf892', 'c793b', '5f4da', ''),
('bf946', '1982a', 'd6d5e', ''),
('c67fa', '0d2cb', '2d287', ''),
('c97ed', '3fa31', '4daac', ''),
('ceb22', '0d1b7', '2d287', ''),
('d67e3', '187c1', 'd6d5e', ''),
('de9d5', '0d2cb', '5f4da', ''),
('df07f', '187c1', '2d287', ''),
('e6dc0', 'b40ea', 'd6d5e', ''),
('ecb0f', '1982a', '4daac', ''),
('eedb2', 'e847a', '75924', ''),
('ef6c4', 'b40ea', '2d287', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `survei` int(1) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `survei`, `gambar`) VALUES
('2b1c6', 'Cobu', 'cobu666@gmail.com', '8f008d6527e97b8f657299683d94c9f0', 0, '2b1c6.jpg'),
('2d287', 'Bukan Admin', 'bukanadmin@user.com', '992baf4879618dbfb66e5786ebb3a923', 1, 'default.png'),
('4daac', 'Usr', 'usr@gmail.com', '5c5797a735f5c133e2999b6e33377772', 1, '4daac.jpg'),
('4fba9', 'Danny Sukitman', 'danny@gmail.com', 'd4e17a9b560c652ba56e912bfb37cf87', 0, '4fba9.jpg'),
('5f4da', 'Uer', 'uer@gmail.com', '3f631b2dababf3fc4b672d4f5d92fc13', 1, '5f4da.png'),
('75924', 'Opet', 'opet@govinsy.com', 'd73d5a80ce906473d290d81e5f694508', 1, 'default.png'),
('c7755', 'Takahiro', 'taka@gmail.com', 'ed98a56bb72a5caee7230ff335d83f7a', 0, 'c7755.jpg'),
('cac3e', 'User', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 1, 'default.png'),
('d6d5e', 'Pengguna', 'pengguna@govinsy.com', '8b097b8a86f9d6a991357d40d3d58634', 1, 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` varchar(5) NOT NULL,
  `id_survei` varchar(5) NOT NULL,
  `tipe` varchar(64) NOT NULL,
  `pertanyaan` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `id_survei`, `tipe`, `pertanyaan`) VALUES
('4038e', 'e0663', 'radio', 'Jenjang Pendidikan terakhir anda'),
('6f5e0', 'e0663', 'radio', 'Agama yang anda anut sekarang'),
('7195e', 'e0663', 'radio', 'Dimanakah anda tinggal sekarang'),
('96ff5', 'e0663', 'radio', 'Pekerjaan Profesional yang anda tekuni sekarang'),
('e98e3', 'e0663', 'radio', 'Berapakah gaji rata-rata anda pebulan?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `survei`
--

CREATE TABLE `survei` (
  `id` varchar(5) NOT NULL,
  `kategori` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `survei`
--

INSERT INTO `survei` (`id`, `kategori`) VALUES
('baf93', 'survei_baru'),
('e0663', 'survei');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jawaban_pengguna`
--
ALTER TABLE `jawaban_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `survei`
--
ALTER TABLE `survei`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
