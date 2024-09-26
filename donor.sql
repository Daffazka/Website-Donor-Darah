-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2021 pada 02.55
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendonor`
--

CREATE TABLE `tb_pendonor` (
  `id` int(10) NOT NULL,
  `tgl_donor` date NOT NULL,
  `golongandarah` varchar(100) NOT NULL,
  `nama_pendonor` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pendonor`
--

INSERT INTO `tb_pendonor` (`id`, `tgl_donor`, `golongandarah`, `nama_pendonor`) VALUES
(2, '2021-05-10', 'B', 'Ipul'),
(3, '2021-05-12', 'O', 'izzul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stokdarah`
--

CREATE TABLE `tb_stokdarah` (
  `id` int(11) NOT NULL,
  `jenisdarah` varchar(100) NOT NULL,
  `golongandarah` varchar(100) NOT NULL,
  `resusdarah` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_stokdarah`
--

INSERT INTO `tb_stokdarah` (`id`, `jenisdarah`, `golongandarah`, `resusdarah`, `jumlah`) VALUES
(6, 'Packed Red Cells', 'AB', 'Positif ( + )', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tranfusi`
--

CREATE TABLE `tb_tranfusi` (
  `id` int(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_pasien` varchar(100) NOT NULL,
  `nomor_pasien` varchar(100) NOT NULL,
  `tgl_tranfusi` date NOT NULL,
  `golongandarah` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `rumahsakit` varchar(1000) NOT NULL,
  `alamat_rs` varchar(100) NOT NULL,
  `nomor_rs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tranfusi`
--

INSERT INTO `tb_tranfusi` (`id`, `nik`, `nama_pasien`, `tgl_lahir`, `alamat_pasien`, `nomor_pasien`, `tgl_tranfusi`, `golongandarah`, `jumlah`, `rumahsakit`, `alamat_rs`, `nomor_rs`) VALUES
(4, '12222', 'coki', '2020-11-01', 'Surabaya', '081252525', '2021-05-10', 'AB', 2, 'RS Aisiyah', 'Malang', '081333333'),
(8, '3573032812000004', 'Ihzani Izzul Haq', '2018-02-23', 'JL. KOL SUGIONO III B / 10', '0819-5731-1474', '2021-05-13', 'AB', 1, 'Ezrrr', 'mlg', '123333');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(10) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '12345', 'admin'),
(2, 'user', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_pendonor`
--
ALTER TABLE `tb_pendonor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_stokdarah`
--
ALTER TABLE `tb_stokdarah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tranfusi`
--
ALTER TABLE `tb_tranfusi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_pendonor`
--
ALTER TABLE `tb_pendonor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_stokdarah`
--
ALTER TABLE `tb_stokdarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_tranfusi`
--
ALTER TABLE `tb_tranfusi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
