-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 20 Agu 2018 pada 21.56
-- Versi Server: 10.0.34-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 5.6.31-4+ubuntu16.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DATA_PENDUDUK`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelalamat`
--

CREATE TABLE `tabelalamat` (
  `id_alamat` int(11) NOT NULL,
  `no.rumah` varchar(20) NOT NULL,
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

INSERT INTO `tabelalamat` (`id_alamat`, `no.rumah`, `blok`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`) VALUES
(1, '17', 'fk-3', '07', '014', 'Sukaragam', 'Serang Baru', 'Bekasi');

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
  `No_Kk` varchar(50) NOT NULL,
  `status_kependudukkan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabelkeluarga`
--

INSERT INTO `tabelkeluarga` (`id_keluarga`, `No_Kk`, `status_kependudukkan`, `tanggal`) VALUES
(1, '9738467385482984614', 'pindah', '2018-08-14');

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
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_alamat` int(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `status_dan_keluarga` varchar(50) NOT NULL,
  `id_keluarga` int(11) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabelpenduduk`
--

INSERT INTO `tabelpenduduk` (`id_penduduk`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `id_alamat`, `no_hp`, `status_perkawinan`, `status_dan_keluarga`, `id_keluarga`, `jenis_kelamin`, `agama`) VALUES
(1, 12345, 'Hadi Mulyana', 'Cianjur', '1990-10-14', 1, '082110833390', 'lajang', 'kepala keluarga', 1, 'laki-laki', 'islam'),
(2, 12346, 'Taupik Ibrahim', 'Bekasi', '1998-08-07', 2, '08729918178', 'lajang', 'anak', 2, 'laki-laki', 'islam'),
(3, 12347, 'Arif Bijaksana', 'Bogor', '1990-08-06', 2, '087720092998', 'lajang', 'anaka pertama', 2, 'laki-laki', 'islam');

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
  ADD PRIMARY KEY (`id_penduduk`,`id_keluarga`,`id_alamat`) USING BTREE;

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
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabelkeluarga`
--
ALTER TABLE `tabelkeluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabelpenduduk`
--
ALTER TABLE `tabelpenduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
