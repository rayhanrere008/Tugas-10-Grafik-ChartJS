-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2019 pada 16.18
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_corona`
--
CREATE DATABASE IF NOT EXISTS `db_corona` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_corona`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_casecorona`
--

CREATE TABLE `tb_casecorona` (
  `id` int(11) NOT NULL,
  `CountryOther` varchar(255) NOT NULL,
  `TotalCases` varchar(255),
  `TotalDeaths` varchar(255),
  `TotalRecovered` varchar(255),
  `ActiveCases` varchar(255),
  `TotalTests` varchar(255),
  `Population` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_casecorona`
--

INSERT INTO `tb_casecorona` (`id`, `CountryOther`, `TotalCases`, `TotalDeaths`, `TotalRecovered`, `ActiveCases`, `TotalTests`, `Population`) VALUES
(1, 'India', '44986461', '531832', '44446514', '8115', '929430169', '1406631776'),
(2, 'Japan', '33803572', '74694', 'N/A', 'N/A', '100414883', '125584838'),
(3, 'S. Korea', '31548083', '34687', '31198069', '315327', '15804065', '51329899'),
(4, 'Turkey', '17232066', '102174', 'N/A', 'N/A', '162743369', '85561976'),
(5, 'Vietnam', '11602738', '43203', '10635065', '924470', '85826548', '98953541'),
(6, 'Taiwan', '10239998', '19005', '10220993','0', '30742304', '23888595'),
(7, 'Iran', '7611224', '146236', '7364870','100118', '56596583', '86022837'),
(8, 'Indonesia', '6802090', '161674', '6625209', '15207', '114158919', '279134505'),
(9, 'Malaysia', '5088009', '37046', '5029873', '21090', '68352292', '33181072'),
(10, 'Israel', '4824551', '12509', '4798473', '13569', '41373364', '9326000');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_casecorona`
--
ALTER TABLE `tb_casecorona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_casecorona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
 
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
