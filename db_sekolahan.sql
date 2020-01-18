-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jan 2020 pada 21.51
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolahan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_calon_siswa`
--

CREATE TABLE `tb_calon_siswa` (
  `id_calon_siswa` int(10) NOT NULL,
  `id_pendaftaran` int(10) NOT NULL,
  `id_jdwl_ujian` int(10) NOT NULL,
  `no_ujian` int(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pendaftaran`
--

CREATE TABLE `tb_detail_pendaftaran` (
  `no_pendaftaran` varchar(10) NOT NULL,
  `NISN` int(11) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `TTL` varchar(30) NOT NULL,
  `asal_sekolah` varchar(30) NOT NULL,
  `almt_asl_sklh` varchar(30) NOT NULL,
  `nama_org_tua` varchar(25) NOT NULL,
  `nama_wali` varchar(25) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `no_tlp` int(12) NOT NULL,
  `foto_ijazah` text NOT NULL,
  `foto` text NOT NULL,
  `tgl_daftar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_pendaftaran`
--

INSERT INTO `tb_detail_pendaftaran` (`no_pendaftaran`, `NISN`, `alamat`, `jenis_kelamin`, `TTL`, `asal_sekolah`, `almt_asl_sklh`, `nama_org_tua`, `nama_wali`, `agama`, `no_tlp`, `foto_ijazah`, `foto`, `tgl_daftar`) VALUES
('KDPBfaa', 2147483647, 'JL. A. P. PETTARANI NO. 02, RT', 'P', 'ambon,29 juni 1997', 'SD N 74', 'kyu putih', 'Rina', 'cas', 'kristen', 6766676, '', '', '07/01/2020'),
('KDnskQr', 35235, 'wetetw', 'P', 'ambon,29 juni 1997', 'SD N 74', 'kyu putih', 'Rina', 'cas', 'kristen', 3252533, '', '', '14/01/2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jdwl_ujian`
--

CREATE TABLE `tb_jdwl_ujian` (
  `id_jdwl_ujian` int(10) NOT NULL,
  `id_calon_siswa` int(14) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` date NOT NULL,
  `ruangan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `no_pendaftaran` varchar(10) NOT NULL,
  `NISN` int(10) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`no_pendaftaran`, `NISN`, `nama`) VALUES
('KDnskQr', 35235, 'hendra'),
('KDPBfaa', 2147483647, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_skor`
--

CREATE TABLE `tb_skor` (
  `id_soal` int(10) NOT NULL,
  `no_ujian` int(10) NOT NULL,
  `nilai` int(11) NOT NULL,
  `jawaban benar` varchar(25) NOT NULL,
  `jawaban salah` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(10) NOT NULL,
  `id_ujan` int(10) NOT NULL,
  `pertanyaan` text NOT NULL,
  `pilihan A` text NOT NULL,
  `pilihan B` text NOT NULL,
  `pilihan C` text NOT NULL,
  `pilihan D` text NOT NULL,
  `jawaban benar` varchar(25) NOT NULL,
  `jawaban salah` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ujian`
--

CREATE TABLE `tb_ujian` (
  `id_ujian` int(10) NOT NULL,
  `id_calon_siswa` int(14) NOT NULL,
  `id_soal` int(10) NOT NULL,
  `no_ujian` int(10) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_calon_siswa`
--
ALTER TABLE `tb_calon_siswa`
  ADD PRIMARY KEY (`id_calon_siswa`),
  ADD UNIQUE KEY `id_pendaftaran` (`id_pendaftaran`),
  ADD UNIQUE KEY `id_jdwl_ujian` (`id_jdwl_ujian`);

--
-- Indexes for table `tb_jdwl_ujian`
--
ALTER TABLE `tb_jdwl_ujian`
  ADD PRIMARY KEY (`id_jdwl_ujian`),
  ADD UNIQUE KEY `id_calon_siswa` (`id_calon_siswa`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`);

--
-- Indexes for table `tb_skor`
--
ALTER TABLE `tb_skor`
  ADD UNIQUE KEY `id_soal` (`id_soal`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD UNIQUE KEY `id_ujan` (`id_ujan`);

--
-- Indexes for table `tb_ujian`
--
ALTER TABLE `tb_ujian`
  ADD PRIMARY KEY (`id_ujian`),
  ADD UNIQUE KEY `id_calon_siswa` (`id_calon_siswa`),
  ADD UNIQUE KEY `id_soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_calon_siswa`
--
ALTER TABLE `tb_calon_siswa`
  ADD CONSTRAINT `tb_calon_siswa_ibfk_2` FOREIGN KEY (`id_jdwl_ujian`) REFERENCES `tb_jdwl_ujian` (`id_jdwl_ujian`);

--
-- Ketidakleluasaan untuk tabel `tb_jdwl_ujian`
--
ALTER TABLE `tb_jdwl_ujian`
  ADD CONSTRAINT `tb_jdwl_ujian_ibfk_2` FOREIGN KEY (`id_calon_siswa`) REFERENCES `tb_calon_siswa` (`id_calon_siswa`);

--
-- Ketidakleluasaan untuk tabel `tb_skor`
--
ALTER TABLE `tb_skor`
  ADD CONSTRAINT `tb_skor_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `tb_soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_ibfk_1` FOREIGN KEY (`id_ujan`) REFERENCES `tb_ujian` (`id_ujian`);

--
-- Ketidakleluasaan untuk tabel `tb_ujian`
--
ALTER TABLE `tb_ujian`
  ADD CONSTRAINT `tb_ujian_ibfk_1` FOREIGN KEY (`id_calon_siswa`) REFERENCES `tb_calon_siswa` (`id_calon_siswa`),
  ADD CONSTRAINT `tb_ujian_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `tb_soal` (`id_soal`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
