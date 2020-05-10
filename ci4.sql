-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2020 pada 20.52
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `udud`
--

CREATE TABLE `udud` (
  `id` int(11) NOT NULL,
  `nama_udud` varchar(255) NOT NULL,
  `harga_udud` int(11) NOT NULL,
  `photo_udud` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `udud`
--

INSERT INTO `udud` (`id`, `nama_udud`, `harga_udud`, `photo_udud`) VALUES
(1, 'Gudang Garam Signature', 17000, NULL),
(3, 'Sampoerna Mild', 27000, 'FILE-1589090315_1f4ac4ff1cbb4b1b4df2.png,FILE-1589090660_5bf610ee9e641bcbd5f0.jpg'),
(7, 'Gudang Garam Filter', 20000, 'FILE-1589094298_33e87feca2420fc3b656.jpg,FILE-1589094298_f929131250f63b2af344.jpg'),
(8, 'Potong Padi', 8000, NULL),
(9, 'Djarum Super', 20000, NULL),
(10, 'Malboro', 26500, NULL),
(11, 'Sampoerna Kretek', 17000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'arjunane', 'Rl696xd67N2pKx4hNzLbfINRNT3TEh/1rs0a7O95rPZlSenNos86VOuZ46mcstAv0z64+FtadO1Elpn+AiBdg2lNsW2HIjx4kHbrMb+wpuqMwbXObQ==');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `udud`
--
ALTER TABLE `udud`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `udud`
--
ALTER TABLE `udud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
