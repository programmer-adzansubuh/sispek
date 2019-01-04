-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 04 Jan 2019 pada 21.47
-- Versi Server: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.13-1+ubuntu18.04.1+deb.sury.org+1

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
  `blok` varchar(20) NOT NULL,
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
(15, '9', '9', '1', '1', 'Simpangan', 'Cikarang Utara', 'Bekasi'),
(30, '12', '123', '3', '2', 'Baha', 'Ci', 'Bekasi'),
(31, '09090', '90', '90', '909', '0U', 'O', 'OU'),
(32, '9', '9', '9', '9', '9', '9', '9'),
(33, '787', '878', '7', '87', '878', '78', '78');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabeliuran`
--

CREATE TABLE `tabeliuran` (
  `id_iuran` int(11) NOT NULL,
  `id_jenisiuran` int(11) NOT NULL,
  `id_keluarga` int(11) NOT NULL,
  `nominal` varchar(50) NOT NULL,
  `tanggaliuran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabeliuran`
--

INSERT INTO `tabeliuran` (`id_iuran`, `id_jenisiuran`, `id_keluarga`, `nominal`, `tanggaliuran`) VALUES
(3, 1, 3, '30000', '2019-01-03 17:01:00'),
(4, 8, 16, '20000', '2019-01-03 17:01:00'),
(5, 1, 16, '30000', '2019-01-03 17:01:00'),
(8, 8, 3, '20000', '2019-01-03 17:01:00'),
(10, 8, 16, '20000', '2019-01-03 17:01:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabeljenisiuran`
--

CREATE TABLE `tabeljenisiuran` (
  `id_jenisiuran` int(11) NOT NULL,
  `nama_iuran` varchar(50) NOT NULL,
  `nominal_iuran` int(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `tanggal_buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabeljenisiuran`
--

INSERT INTO `tabeljenisiuran` (`id_jenisiuran`, `nama_iuran`, `nominal_iuran`, `keterangan`, `periode`, `tanggal_buat`) VALUES
(1, 'Kebersihan', 30000, 'kebersihan', 'Minggu', '2019-01-03 17:00:00'),
(8, 'Keamanan', 20000, '123', 'Bulan', '2019-01-04 12:25:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelkeluarga`
--

CREATE TABLE `tabelkeluarga` (
  `id_keluarga` int(11) NOT NULL,
  `no_kk` varchar(50) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `status_kependudukkan` varchar(50) DEFAULT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabelkeluarga`
--

INSERT INTO `tabelkeluarga` (`id_keluarga`, `no_kk`, `id_penduduk`, `status_kependudukkan`, `tanggal_input`) VALUES
(3, '1082187000000000', 68, NULL, '2018-12-28 17:33:15'),
(16, '1082187000888888', 86, NULL, '2018-12-29 20:07:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelkematian`
--

CREATE TABLE `tabelkematian` (
  `id_kematian` int(11) NOT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `tanggal_kematian` datetime DEFAULT NULL,
  `penyebab` text,
  `alamat_kematian` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabelkematian`
--

INSERT INTO `tabelkematian` (`id_kematian`, `id_penduduk`, `tanggal_kematian`, `penyebab`, `alamat_kematian`) VALUES
(1, 88, '2018-12-21 09:12:00', 'Kecelakaan', 'Jalan Raya '),
(2, 86, '2018-12-01 01:12:00', 'Sakit Tua', 'RSP. CM');

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
  `nik` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `id_keluarga` int(11) DEFAULT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `status_dlm_keluarga` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `kata_sandi` text NOT NULL,
  `foto` text,
  `terakhir_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabelpenduduk`
--

INSERT INTO `tabelpenduduk` (`id_penduduk`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `id_alamat`, `id_keluarga`, `no_hp`, `email`, `status_perkawinan`, `status_dlm_keluarga`, `jenis_kelamin`, `agama`, `nama_pengguna`, `kata_sandi`, `foto`, `terakhir_update`) VALUES
(68, '3214789419128749', 'Nama Ayah', 'Bekasi', '1997-02-02', 31, 3, '082111237599', 'nama.ayah@gmail.com', 'Kawin', 'Kepala Keluarga', 'Laki-laki', 'Islam', '123', 'root', 'photo/3214789419128749_1546018395_ic_github.png', '2018-12-28 17:33:15'),
(81, '7298129461294619', 'Nama Anak', 'Bekasi', '2018-12-01', 1, 3, '082111237599', 'nama.anak@gmail.com', 'Kawin', 'Anak', 'Laki-laki', 'Budha', '123', 'root', 'photo/7298129461294619_1546113100_google_logo.svg', '2018-12-28 18:19:20'),
(85, '9827391263172', 'Nama Istri', 'Bandung', '1995-12-29', 15, 3, '092371293821', 'nama.istri@gmail.com', 'Kawin', 'Istri', 'Perempuan', 'Islam', '01293', 'root', 'photo/9827391263172_1546103336_haerul.jpeg', '2018-12-29 16:14:05'),
(86, '0129738216317263', 'Linux', 'Bekasi', '2018-12-01', 1, 16, '09123982112', 'linux@pinguin.com', 'Kawin', 'Kepala Keluarga', 'Laki-laki', 'Islam', '012739', 'root', 'photo/0129738216317263_1546114257_220px-Tux.png', '2018-12-29 18:04:25'),
(87, '182741927', 'Android', 'Bekasi', '2000-01-01', 15, 16, '10127412', 'android@gmail.com', 'Duda/Janda', 'Anak', 'Laki-laki', 'Islam', 'android', 'android', 'photo/182741927_1546114234_index.png', '2018-12-29 20:10:34'),
(88, '019212849124912', 'Java', 'Bandung', '1991-01-01', 15, 16, '0982147128', 'java@gmil.com', 'Kawin', 'Istri', 'Perempuan', 'Islam', 'java', 'root', 'photo/019212849124912_1546114376_java-logo-vector-768x768.png', '2018-12-29 20:12:56');

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
  ADD PRIMARY KEY (`id_jenisiuran`);

--
-- Indexes for table `tabelkeluarga`
--
ALTER TABLE `tabelkeluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indexes for table `tabelkematian`
--
ALTER TABLE `tabelkematian`
  ADD PRIMARY KEY (`id_kematian`);

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
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tabeliuran`
--
ALTER TABLE `tabeliuran`
  MODIFY `id_iuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tabeljenisiuran`
--
ALTER TABLE `tabeljenisiuran`
  MODIFY `id_jenisiuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tabelkeluarga`
--
ALTER TABLE `tabelkeluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tabelkematian`
--
ALTER TABLE `tabelkematian`
  MODIFY `id_kematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabelpenduduk`
--
ALTER TABLE `tabelpenduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
