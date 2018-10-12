-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 13 Okt 2018 pada 01.32
-- Versi Server: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelalamat`
--

CREATE TABLE `tabelalamat` (
  `id_alamat` int(11) NOT NULL,
  `no_rumah` varchar(20) NOT NULL,
  `blok` varchar(5) NOT NULL,
  `rt` varchar(30) NOT NULL,
  `rw` varchar(30) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabelalamat`
--

INSERT INTO `tabelalamat` (`id_alamat`, `no_rumah`, `blok`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`) VALUES
(1, '17', 'A', '07', '014', 'Sukaragam', 'Serang Baru', 'Bekasi'),
(2, '20', 'B', '01', '01', 'desaan', 'kee', 'Bekasi'),
(3, '10', 'C', '0', '0', 'n', 'n', 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabeliuran`
--

CREATE TABLE `tabeliuran` (
  `id_iuran` int(11) NOT NULL,
  `id_jenisiuran` int(11) NOT NULL,
  `id_keluarga` int(11) NOT NULL,
  `nominal` varchar(50) NOT NULL,
  `tanggaliuran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabeljenisiuran`
--

CREATE TABLE `tabeljenisiuran` (
  `id_jenuisiuran` int(11) NOT NULL,
  `nama_iuran` varchar(50) NOT NULL,
  `nominal_iuran` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `priode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelkeluarga`
--

CREATE TABLE `tabelkeluarga` (
  `id_keluarga` int(11) NOT NULL,
  `no_kk` varchar(50) NOT NULL,
  `nama_kk` varchar(50) NOT NULL,
  `status_kependudukkan` varchar(50) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabelkeluarga`
--

INSERT INTO `tabelkeluarga` (`id_keluarga`, `no_kk`, `nama_kk`, `status_kependudukkan`, `tanggal_input`) VALUES
(1, '9738467385482984614', '', 'pindah', '2018-08-13 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelkematian`
--

CREATE TABLE `tabelkematian` (
  `id_kematian` int(11) NOT NULL,
  `anggal_kematian` date NOT NULL,
  `penyebab` varchar(50) NOT NULL,
  `alamat_kematian` varchar(50) NOT NULL,
  `id_penduduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelkomentar`
--

CREATE TABLE `tabelkomentar` (
  `id-komentar` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `komentar` varchar(500) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabellaporanwarga`
--

CREATE TABLE `tabellaporanwarga` (
  `id_laporanwarga` int(11) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `laporan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabellogin`
--

CREATE TABLE `tabellogin` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelpenduduk`
--

CREATE TABLE `tabelpenduduk` (
  `id_penduduk` int(11) NOT NULL,
  `nik` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_alamat` int(11) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `status_dlm_keluarga` varchar(50) NOT NULL,
  `id_keluarga` int(11) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `kata_sandi` text NOT NULL,
  `terakhir_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabelpenduduk`
--

INSERT INTO `tabelpenduduk` (`id_penduduk`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `id_alamat`, `no_hp`, `status_perkawinan`, `status_dlm_keluarga`, `id_keluarga`, `jenis_kelamin`, `agama`, `nama_pengguna`, `kata_sandi`, `terakhir_update`) VALUES
(1, 7241, '7241', '7241', '2018-10-04', 2, '7241', '7241', '7241', 1, '7241', '7241', '7241', '7241', '2018-10-04 05:34:11'),
(2, 7241, '7241', '7241', '1970-01-01', 2, '7241', '7241', '7241', 1, '7241', '7241', '7241', '7241', '2018-10-04 05:39:13'),
(3, 7241, '7241', '7241', '1970-01-01', 2, '7241', '7241', '7241', 1, '7241', '7241', '7241', '7241', '2018-10-04 05:39:33'),
(4, 7241, '7241', '7241', '1970-01-01', 2, '7241', '7241', '7241', 1, '7241', '7241', '7241', '7241', '2018-10-04 05:40:58'),
(5, 7241, '7241', '7241', '2013-03-15', 2, '7241', '7241', '7241', 1, '7241', '7241', '7241', '7241', '2018-10-04 05:43:51'),
(6, 123, '123', '123', '2013-03-15', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 05:47:25'),
(7, 123, '123', '123', '2013-03-15', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 05:53:44'),
(8, 123, '123', '123', '2013-03-15', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 05:56:08'),
(9, 123, '123', '123', '2013-03-15', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 05:56:25'),
(10, 123, '123', '123', '2013-03-15', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 05:56:48'),
(11, 123, '123', '123', '2018-10-26', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 05:57:38'),
(12, 123, '123', '123', '2018-10-27', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 05:57:59'),
(13, 123, '123', '123', '2018-10-10', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:01:42'),
(14, 123, '123', '123', '2018-10-19', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:02:47'),
(15, 123, '123', '123', '2018-10-10', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:04:59'),
(16, 123, '123', '123', '2018-11-02', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:06:07'),
(17, 123, '123', '123', '2018-10-19', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:09:16'),
(18, 123, '123', '123', '2018-10-12', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:12:15'),
(19, 123, '123', '123', '2018-10-04', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:13:06'),
(20, 123, '123', '123', '2018-10-04', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:16:16'),
(21, 123, '123', '123', '2018-10-31', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:16:27'),
(22, 123, '123', '123', '2018-10-19', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:19:45'),
(23, 123, '123', '123', '2018-10-19', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:20:53'),
(32, 123, '123', '123', '2018-10-12', 0, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:39:40'),
(34, 2184791, '123', '123', '2018-10-27', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:41:06'),
(36, 12317429, 'haerul hul', '123', '2018-10-27', 2, '123', '123', '123', 123, '123', '123', 'root', 'root', '2018-10-04 06:47:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelpengeluaran`
--

CREATE TABLE `tabelpengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal pengeluaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_berita`
--

CREATE TABLE `tabel_berita` (
  `id_berita` int(11) NOT NULL,
  `kontent` text,
  `sumber` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `id_penulis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabelalamat`
--
ALTER TABLE `tabelalamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `tabeliuran`
--
ALTER TABLE `tabeliuran`
  ADD PRIMARY KEY (`id_iuran`,`id_jenisiuran`,`id_keluarga`);

--
-- Indexes for table `tabeljenisiuran`
--
ALTER TABLE `tabeljenisiuran`
  ADD PRIMARY KEY (`id_jenuisiuran`);

--
-- Indexes for table `tabelkeluarga`
--
ALTER TABLE `tabelkeluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indexes for table `tabelkematian`
--
ALTER TABLE `tabelkematian`
  ADD PRIMARY KEY (`id_kematian`,`id_penduduk`);

--
-- Indexes for table `tabelkomentar`
--
ALTER TABLE `tabelkomentar`
  ADD PRIMARY KEY (`id-komentar`,`id_berita`,`id_penduduk`);

--
-- Indexes for table `tabellaporanwarga`
--
ALTER TABLE `tabellaporanwarga`
  ADD PRIMARY KEY (`id_laporanwarga`,`id_penulis`);

--
-- Indexes for table `tabelpenduduk`
--
ALTER TABLE `tabelpenduduk`
  ADD PRIMARY KEY (`id_penduduk`) USING BTREE;

--
-- Indexes for table `tabelpengeluaran`
--
ALTER TABLE `tabelpengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `tabel_berita`
--
ALTER TABLE `tabel_berita`
  ADD PRIMARY KEY (`id_berita`,`id_penulis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabelalamat`
--
ALTER TABLE `tabelalamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabelkeluarga`
--
ALTER TABLE `tabelkeluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabelpenduduk`
--
ALTER TABLE `tabelpenduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
