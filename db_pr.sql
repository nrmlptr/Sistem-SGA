-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Feb 2023 pada 08.38
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `sie_id` int(11) NOT NULL,
  `grup_id` int(11) NOT NULL,
  `status` enum('Tahap 1','Tahap 2','Tahap 3','Tahap 4','Tahap 5','Tahap 6','Tahap 7','Finish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `dept_id`, `sie_id`, `grup_id`, `status`) VALUES
(1, 8, 1, 1, 'Finish'),
(2, 3, 6, 6, 'Finish'),
(3, 2, 4, 4, 'Tahap 1'),
(4, 10, 7, 7, 'Tahap 1'),
(5, 4, 10, 10, 'Tahap 1'),
(6, 10, 8, 8, 'Tahap 5'),
(16, 1, 2, 2, 'Tahap 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dept`
--

CREATE TABLE `tb_dept` (
  `id_dept` int(11) NOT NULL,
  `nm_dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dept`
--

INSERT INTO `tb_dept` (`id_dept`, `nm_dept`) VALUES
(1, 'PPIC'),
(2, 'MKT'),
(3, 'MIS'),
(4, 'MAINT'),
(5, 'PROCUR'),
(6, 'PRODTWO'),
(7, 'QC'),
(8, 'EHS'),
(9, 'GAIR'),
(10, 'FINACT'),
(11, 'WARHO'),
(12, 'PRODONE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_grup`
--

CREATE TABLE `tb_grup` (
  `id_grup` int(11) NOT NULL,
  `nm_grup` varchar(255) NOT NULL,
  `nm_kagrup` varchar(255) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `jml` varchar(255) NOT NULL,
  `sie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_grup`
--

INSERT INTO `tb_grup` (`id_grup`, `nm_grup`, `nm_kagrup`, `no_hp`, `jml`, `sie_id`) VALUES
(1, 'JAKSEL', 'Dedi R', '', '7', 1),
(2, 'OMBAK', 'Ciptadi N', '', '9', 2),
(3, 'BARET MERAH', 'Dudy Mulyanto', '', '7', 3),
(4, 'ARTIS', 'Joko SP', '085811151770', '3', 4),
(5, 'SEGA', 'A Rifai', '081398979217', '5', 5),
(6, 'PHP', 'Rico A', '234234324', '4', 6),
(7, 'SINCOS', 'Yulika Aristiana', '082110397351', '4', 7),
(8, 'SMART THINK', 'Salam Rudi', '', '5', 8),
(9, 'SELAMAT', 'Ari TW', '', '9', 9),
(10, 'SUNRISE', 'Cevi Doa', '', '6', 10),
(11, 'MANJA', 'Fredy', '081322006710', '6', 11),
(12, 'SAFETY DAN BERKAH', 'Bayu Suryadi', '08566121131', '6', 12),
(13, 'PIKACHU', 'Yudha Syarif I', '087764573851', '6', 13),
(14, 'DESIMAL', 'Rian Ardianto', '', '4', 14),
(15, 'PINUS', 'Didik Rusdika', '081310506201', '8', 15),
(16, 'SANGKA KELANA', 'Martin Hidayatulloh', '081317158008', '7', 16),
(17, 'KUPAS', 'Suharman', '', '7', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sie`
--

CREATE TABLE `tb_sie` (
  `id_sie` int(11) NOT NULL,
  `nm_sie` varchar(255) NOT NULL,
  `nm_kasie` varchar(255) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sie`
--

INSERT INTO `tb_sie` (`id_sie`, `nm_sie`, `nm_kasie`, `dept_id`) VALUES
(1, 'EHS', 'Ahmad Zaelani', 8),
(2, 'PPIC', 'Ciptadi N', 1),
(3, 'QC', 'Rahmadian', 7),
(4, 'MARKETING', 'Rendi Widi Nugroho', 2),
(5, 'GA', 'Mujiono', 9),
(6, 'MIS', 'Rinta SN', 3),
(7, 'FINANCE,TREASURY,INV,COSTING', 'Agnes RA', 10),
(8, 'GENERAL ACC,TAX', 'Khanifatturahmah', 10),
(9, 'TOOLING 1', 'EPEY', 4),
(10, 'TOOLING 2', 'Latif Usman', 4),
(11, 'MAINTENANCE 1', 'Kresna', 4),
(12, 'MAINTENANCE 2', 'Sucipto Hening', 4),
(13, 'UTILITY', 'Jumadi', 4),
(14, 'COMPONENT', 'Kautzar', 11),
(15, 'KOSONG', 'Kirana Dyah', 5),
(16, 'GRID CASTING DAN PUNCHING', 'Pollin H.Simanullang', 12),
(17, 'PASTING', 'Mulazim', 0),
(21, 'FINAL SGA fix 1', 'Retna', 17),
(22, 'FINAL SIE SGA 2', 'Erina', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `username`, `upass`, `created_at`, `update_at`) VALUES
(1, 'Nonik S', 'noniks', 'tes123', '2023-01-13 04:04:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `dept_constraint` (`dept_id`),
  ADD KEY `grup_constraint` (`grup_id`),
  ADD KEY `sie_constraint` (`sie_id`);

--
-- Indeks untuk tabel `tb_dept`
--
ALTER TABLE `tb_dept`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indeks untuk tabel `tb_grup`
--
ALTER TABLE `tb_grup`
  ADD PRIMARY KEY (`id_grup`),
  ADD KEY `constraint_sie` (`sie_id`);

--
-- Indeks untuk tabel `tb_sie`
--
ALTER TABLE `tb_sie`
  ADD PRIMARY KEY (`id_sie`),
  ADD KEY `constraint_dept` (`dept_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_dept`
--
ALTER TABLE `tb_dept`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_grup`
--
ALTER TABLE `tb_grup`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_sie`
--
ALTER TABLE `tb_sie`
  MODIFY `id_sie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `dept_constraint` FOREIGN KEY (`dept_id`) REFERENCES `tb_dept` (`id_dept`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grup_constraint` FOREIGN KEY (`grup_id`) REFERENCES `tb_grup` (`id_grup`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sie_constraint` FOREIGN KEY (`sie_id`) REFERENCES `tb_sie` (`id_sie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_grup`
--
ALTER TABLE `tb_grup`
  ADD CONSTRAINT `constraint_sie` FOREIGN KEY (`sie_id`) REFERENCES `tb_sie` (`id_sie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
