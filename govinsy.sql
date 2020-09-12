-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Sep 2020 pada 04.22
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

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
('1082b', '4038e', 'jawaban 2 pertanyaan 2'),
('2eecf', '96ff5', 'jawaban 2 pertanyaan 1'),
('889b9', '4038e', 'jawaban 1 pertanyaan 2'),
('9e9aa', '96ff5', 'jawaban 1 pertanyaan 1');

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
('0ba14', '9e9aa', 'd6d5e', ''),
('19bd4', '1082b', 'd6d5e', ''),
('35636', '9e9aa', 'cac3e', ''),
('bd982', '889b9', 'cac3e', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`) VALUES
('2d287', 'Bukan Admin', 'bukanadmin@user.com', '992baf4879618dbfb66e5786ebb3a923'),
('75924', 'Opet', 'opet@govinsy.com', 'd73d5a80ce906473d290d81e5f694508'),
('cac3e', 'User', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee'),
('d6d5e', 'Pengguna', 'pengguna@govinsy.com', '8b097b8a86f9d6a991357d40d3d58634');

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
('4038e', 'e0663', 'radio', 'Pertanyaan kedua'),
('96ff5', 'e0663', 'radio', 'Pertanyaan pertama');

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
