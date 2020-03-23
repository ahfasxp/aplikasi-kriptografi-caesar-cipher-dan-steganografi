-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2020 pada 08.02
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
-- Database: `kriptografi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT 'Belum diatur',
  `phone` varchar(255) NOT NULL DEFAULT 'Belum diatur',
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `address`, `phone`, `avatar`) VALUES
(1, 'Much Ahfas', 'ahfasxp', '$2y$10$alkoIQsPsYTpUCdaEvMQFOwMz6XucxFaLGWpCiOAQnX6YVTxbOk8S', 'Cirebon', '', ''),
(6, 'Puah', 'puahmr', '$2y$10$IQOBI0FbRrWdN9LYMEeXOOXTcHwQDREyHQhuTF5qXlQfZo.aMxmbq', 'Cirebon', '', ''),
(7, 'Indri', 'indrily', '$2y$10$9d/aJIBXfa.MmIwJqK7i6.LnvdFL/CuzDugx011g1t8Kcj7ObGTR.', 'Cirebon', '', ''),
(9, 'Admin', 'admin', '$2y$10$9c.xT/KRiiIMitlYIJId.OdieAgL6IkwT3pKBjktpDRC58WssxQUy', 'Belum diatur', 'Belum diatur', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
