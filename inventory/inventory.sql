-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2018 pada 10.03
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_brg` varchar(10) NOT NULL,
  `nama_brg` varchar(30) NOT NULL,
  `jenis_brg` varchar(30) NOT NULL,
  `kuantitas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_brg`, `nama_brg`, `jenis_brg`, `kuantitas`) VALUES
('001', 'Pepsodent', 'Pasta Gigi', 20),
('002', 'Pocari Sweat', 'Minuman', 20),
('003', 'Mie Sedap Goreng', 'Makanan', 50),
('004', 'Rinso', 'Detergen', 10),
('005', 'Buku', 'Alat Tulis', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_brg_klr`
--

CREATE TABLE `histori_brg_klr` (
  `id_tran_klr` varchar(10) NOT NULL,
  `tgl_klr` date DEFAULT NULL,
  `kode_brg` varchar(10) NOT NULL,
  `nama_brg` varchar(30) NOT NULL,
  `jenis_brg` varchar(30) NOT NULL,
  `jml_klr` int(10) NOT NULL,
  `picker` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_brg_msk`
--

CREATE TABLE `histori_brg_msk` (
  `id_tran_msk` varchar(10) NOT NULL,
  `tgl_msk` date DEFAULT NULL,
  `kode_brg` varchar(10) NOT NULL,
  `nama_brg` varchar(30) NOT NULL,
  `jenis_brg` varchar(30) NOT NULL,
  `jml_msk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`, `nama`) VALUES
('admin', 'admin', 'Nurul');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indeks untuk tabel `histori_brg_klr`
--
ALTER TABLE `histori_brg_klr`
  ADD PRIMARY KEY (`id_tran_klr`);

--
-- Indeks untuk tabel `histori_brg_msk`
--
ALTER TABLE `histori_brg_msk`
  ADD PRIMARY KEY (`id_tran_msk`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
