-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2023 pada 08.21
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
-- Struktur dari tabel `document`
--

CREATE TABLE `document` (
  `id_doc` int(11) NOT NULL,
  `tgl_upload` date NOT NULL,
  `kd_doc` varchar(255) NOT NULL,
  `nm_grup` varchar(255) NOT NULL,
  `nm_doc` varchar(255) NOT NULL,
  `keterangan_doc` varchar(255) NOT NULL,
  `tipe_doc` varchar(100) NOT NULL,
  `ukuran_doc` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_kyw` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nm_karyawan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_kyw`, `nik`, `nm_karyawan`, `alamat`, `created_at`, `updated_at`) VALUES
(1, '1001', 'Nonik S', 'Karawang', '2023-02-06 03:00:32', NULL),
(3, '1003', 'Ahmad Zaelani', 'Kosambi', '2023-02-15 03:36:11', NULL),
(4, '1004', 'Sugiyanto', 'Karawang Timur', '2023-02-15 03:36:11', NULL),
(5, '1005', 'Dedi Ruhmat', 'Jakarta Timur', '2023-02-15 03:36:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_risalah`
--

CREATE TABLE `nilai_risalah` (
  `id_nilai` int(11) NOT NULL,
  `tgl_penilaian` date NOT NULL,
  `pekerjaan_id` int(3) NOT NULL,
  `nm_juri` varchar(255) NOT NULL,
  `metode_penyusunan_risalah` int(11) NOT NULL,
  `data_pendukung_aktivitas_grup` int(11) NOT NULL,
  `identifikasi_masalah` int(11) NOT NULL,
  `safety_mapping` int(11) NOT NULL,
  `analysis` int(11) NOT NULL,
  `rencana_perbaikan` int(11) NOT NULL,
  `laporan_perbaikan` int(11) NOT NULL,
  `rank_down` int(11) NOT NULL,
  `justifikasi_atasan` int(11) NOT NULL,
  `pemahaman_materi` int(11) NOT NULL,
  `sistematika` int(11) NOT NULL,
  `cara_penyampaian` int(11) NOT NULL,
  `keterangan_sga_step_7` int(11) NOT NULL,
  `total_score` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `dept_id` int(11) NOT NULL,
  `sie_id` int(11) NOT NULL,
  `grup_id` int(11) NOT NULL,
  `status` enum('Tahap 1','Tahap 2','Tahap 3','Tahap 4','Tahap 5','Tahap 6','Tahap 7','Finish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(17, 'PASTING', 'Mulazim', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `upass` varchar(15) NOT NULL,
  `akses` varchar(3) NOT NULL COMMENT '1admin,2juri',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `upass`, `akses`, `created_at`, `updated_at`) VALUES
(1, 'noniks', 'admin1', '1', '2023-02-06 03:06:39', '2023-03-10 00:53:37'),
(3, 'jerry', 'admin2', '1', '2023-02-15 03:38:11', '2023-05-02 06:53:36'),
(4, 'sugiyanto', 'admin3', '1', '2023-02-15 03:38:11', '2023-05-02 06:53:46'),
(5, 'dedir', 'admin4', '1', '2023-02-15 03:38:11', '2023-05-02 06:53:51'),
(7, 'Juri1', 'nilai123', '2', '2023-03-01 06:54:12', '2023-04-18 07:54:02'),
(8, 'Juri2', 'nilai456', '2', '2023-03-01 06:54:12', '2023-04-18 08:14:08'),
(9, 'Juri3', 'nilai789', '2', '2023-03-01 06:54:12', '2023-04-18 08:14:13'),
(10, 'Juri4', 'nilai1011', '2', '2023-03-01 06:54:12', '2023-04-18 08:14:19'),
(11, 'Juri5', 'nilai1213', '2', '2023-03-01 06:54:34', '2023-04-18 08:14:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_kyw`);

--
-- Indeks untuk tabel `nilai_risalah`
--
ALTER TABLE `nilai_risalah`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `constraint_sga` (`pekerjaan_id`);

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
-- AUTO_INCREMENT untuk tabel `document`
--
ALTER TABLE `document`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_kyw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai_risalah`
--
ALTER TABLE `nilai_risalah`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_dept`
--
ALTER TABLE `tb_dept`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_grup`
--
ALTER TABLE `tb_grup`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_sie`
--
ALTER TABLE `tb_sie`
  MODIFY `id_sie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai_risalah`
--
ALTER TABLE `nilai_risalah`
  ADD CONSTRAINT `constraint_sga` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pekerjaan` (`id_pekerjaan`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Ketidakleluasaan untuk tabel `tb_sie`
--
ALTER TABLE `tb_sie`
  ADD CONSTRAINT `constraint_dept` FOREIGN KEY (`dept_id`) REFERENCES `tb_dept` (`id_dept`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
