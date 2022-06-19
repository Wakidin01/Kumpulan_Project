-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Feb 2022 pada 05.17
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `kd_destinasi` varchar(50) NOT NULL,
  `no_pegawai` varchar(50) NOT NULL,
  `nm_destinasi` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`kd_destinasi`, `no_pegawai`, `nm_destinasi`, `lokasi`) VALUES
('1', '678910', 'Candi Borobudur', 'Yogyakarta'),
('22', '12345', 'Candi Prambanan', 'Yogyakarta'),
('33', '12345', 'Pantai Kuta', 'Bali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `kd_jadwal` varchar(50) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam` time NOT NULL,
  `kd_destinasi` varchar(50) NOT NULL,
  `no_ktp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`kd_jadwal`, `hari`, `jam`, `kd_destinasi`, `no_ktp`) VALUES
('1', 'Senin', '10:00:00', '1', '3209212112010004'),
('123', 'Senin', '09:30:00', '565', '3209212112010004'),
('124', 'Senin', '09:30:00', '22', '3209212112010004'),
('344', 'Selasa', '13:30:00', '22', '3209212112010005'),
('789', 'Senin', '09:30:00', '123', '3209212112010004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `kd_lokasi` varchar(50) NOT NULL,
  `nm_destinasi` varchar(50) NOT NULL,
  `tempat_destinasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`kd_lokasi`, `nm_destinasi`, `tempat_destinasi`) VALUES
('L123', 'Candi Prambanan', 'Yogyakarta'),
('L456', 'Candi Borobudur', 'Yogyakarta'),
('L789', 'Pantai Kuta', 'Bali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(50) NOT NULL,
  `no_pegawai` varchar(50) NOT NULL,
  `nm_pegawai` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `no_pegawai`, `nm_pegawai`, `gender`, `alamat`) VALUES
('', '12345', 'Aziz', 'Laki-Laki', 'Indramayu'),
('', '345', 'Aldi', 'Perempuan', 'yuyu'),
('', '678910', 'Galih', 'Laki-Laki', 'cirebon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(50) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `usia` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `no_ktp` varchar(50) NOT NULL,
  `nm_pengunjung` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`no_ktp`, `nm_pengunjung`, `tgl_lahir`, `gender`, `alamat`) VALUES
('3209212112010004', 'Wakidin Nur Akirini', '2001-12-21', 'Laki-Laki', 'Cirebon'),
('3209212112010005', 'Lilis Kalista', '2002-02-21', 'Perempuan', 'Bogor'),
('3209212112010006', 'Silvi kartika', '2003-03-03', 'Perempuan', 'Bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_nilai` int(20) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `nm_pegawai` varchar(50) NOT NULL,
  `nilai_pelayanan` varchar(50) NOT NULL,
  `nilai_sikap` varchar(50) NOT NULL,
  `nilai_penampilan` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `username`, `password`, `status`) VALUES
(1, 'Chairun Nas', 'admin', '12345', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`kd_destinasi`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kd_jadwal`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`kd_lokasi`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`no_pegawai`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
