-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2018 at 07:20 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mtsn_sebapo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(1) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `kode_anggota` varchar(5) NOT NULL,
  `nis` varchar(5) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `kelas` varchar(6) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `pekerjaan` varchar(40) NOT NULL,
  PRIMARY KEY (`kode_anggota`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`kode_anggota`, `nis`, `nisn`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kelas`, `alamat`, `pekerjaan`) VALUES
('KA001', '1864', '0046393692', 'Iiham Kurniawan', 'Jambi', '2004-05-03', 'L', 'VII', 'Pondok Meja KM. 15', 'Pelajar'),
('KA003', '1873', '0045163499', 'M. Assim', 'Jambi', '2004-10-01', 'L', 'VIII', 'Ds. Mekar Jaya RT 10', 'Pelajar'),
('KA002', '1898', '0041912553', 'Salma Azzahra', 'Jambi', '2004-05-20', 'P', 'VII', 'RT 09 Nyogan', 'Pelajar'),
('KA004', '1865', '0046393601', 'Kurnia Saputri', 'Jambi', '2002-01-02', 'P', 'VII C', 'Sebrang', 'Pelajar'),
('KA005', '1802', '0046393602', 'Yasi Fadilah', 'Jambi', '2002-02-04', 'P', 'VII D', 'Jambi', 'Pelajar'),
('KA006', '1803', '0046393604', 'Aisyatun Khomimah', 'Tungkal Ulu', '2002-01-01', 'P', 'VIII C', 'Jl. Pattimura Jambi', 'Pelajar'),
('KA007', '1805', '0046393606', 'Citra Novita', 'Jambi', '2002-01-18', 'P', 'VIII C', 'Jambi', 'Pelajar'),
('KA008', '1808', '0046393608', 'Rini Nuraini', 'Jambi', '2002-01-27', 'P', 'IX B', 'Jambi', 'Pelajar'),
('KA009', '1809', '0046393609', 'Dga Wahyu Ananda P', 'Jambi', '2002-01-28', 'L', 'VII C', 'Jambi', 'Pelajar'),
('KA010', '1810', '0046393610', 'Nurfitka Sari', 'Jambi', '2002-01-28', 'L', 'VII C', 'Jambi', 'Pelajar'),
('KA011', '1817', '0045163411', 'Ardika Bakhti Nugraha', 'Jambi', '2001-01-11', 'L', 'VII C', 'Jambi', 'Pelajar'),
('KB012', '1819', '0045163419', 'Siti Marita', 'Jambi', '2002-01-02', 'P', 'VII B', 'Jambi', 'Jambi'),
('KB013', '1820', '0045163420', 'Tri Gustirani', 'Jambi', '2001-01-31', 'P', 'VII B', 'Jambi', 'Pelajar'),
('KB014', '1821', '0045163421', 'Siska Wulandari', 'Sebrang Jambi', '2001-01-03', 'P', 'IX B', 'Jambi', 'Pelajar'),
('KB015', '1823', '0045163423', 'Kurniati Ayu N', 'Jambi', '2001-01-28', 'P', 'IX A', 'Jambi', 'Pelajar'),
('KB016', '1822', '0045163422', 'Nurul Fitri', 'Jambi', '2002-01-27', 'P', 'IX A', 'Jambi', 'Pelajar'),
('KB017', '1823', '0045163423', 'Rini Nuraini', 'IX B', '2018-01-05', 'P', 'IX B', 'Jambi', 'Pelajar');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `kode_buku` varchar(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `kode_kategori` int(2) NOT NULL,
  `pengarang` varchar(40) NOT NULL,
  `penerbit` varchar(40) NOT NULL,
  `tempat_terbit` varchar(40) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `stok` int(2) NOT NULL,
  PRIMARY KEY (`kode_buku`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `kode_kategori`, `pengarang`, `penerbit`, `tempat_terbit`, `tahun_terbit`, `stok`) VALUES
('KB001', 'Lupus', 3, 'Hilma', '-', '-', 2005, 2),
('KB005', 'Fikih untuk Mts / SMP Islam Kelas VII', 2, 'Nor Hadi', 'Erlangga', 'Jakarta', 2003, 3),
('KB002', 'Kumpulan Cerita Rakyat Nusantara', 2, 'Yustitia Angelia', '-', '-', 0, 3),
('KB003', 'Terampil Bermain Musik', 2, 'Subagyo', '-', '-', 2004, 4),
('KB008', 'IPS untuk SMP / Mts Kelas IX', 2, 'Sutarto dan Sunardi', 'Pusat Perbukuan Departemen Pendidikan', '-', 2008, 1),
('KB004', 'Konsep dan Penerapan Sains Biologi', 2, 'Drs. Sunarto dkk', 'PT. Tiga Serangkai Pustaka Mandiri', 'Solo', 2004, 1),
('KB006', 'AL-Quran Hadis', 2, 'Khoirul Imam', 'Direktorat Pendidikan Madrasah', '-', 2014, 2),
('KB007', 'Akidah Akhlak Untuk Kelas VII', 2, 'H. Sodik, Ruchman Basori', 'Direktorat Pendidikan Madrasah', '-', 2014, 0),
('KB009', 'Ilmu Pengetahuan Sosial untuk SMP/Mts Kls VII', 2, 'Muh. Nurdin dan S.W Warsito', 'Pusat Perbukuan Departemen Pendidikan', 'Depok', 2008, 3),
('KB010', 'IPA Terpadu Kelas VIII', 2, 'Saiful Karim dkk', '-', '-', 2014, 2),
('KB011', 'PKN Kelas IX', 2, '-', '-', '-', 2008, 3),
('KB012', 'Sejarah', 2, 'Selamet Sentosa', '-', '-', 2009, 0),
('KB013', 'IPS Terpadu Kelas IX', 2, 'Sutarto dkk', '-', '-', 2008, 1),
('KB014', 'MTK Kelas VII', 2, 'Sunarno dkk', '-', '-', 2007, 2),
('KB015', 'IPA Kelas VIIi', 2, 'Saiful Karim dkk', '-', '-', 2007, 0),
('KB016', 'Sains Biologi Kelas VII C', 2, 'Drs. Sunarto dkk', '-', '-', 2004, 0),
('KB017', 'Biologi Kelas VII A', 2, 'H. Marthin', '-', '-', 2002, 1),
('KB018', 'Sains Fisika Kelas IX B', 2, 'Drs. Budi Purwanto', '-', '-', 2004, 2),
('KB019', 'MTK Kelas IX B', 2, 'J. Dris Tasari', '-', '-', 2011, 0),
('KB020', 'TIK Kelas VIII A', 2, 'Triadi', '-', '-', 2006, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kode_kategori` int(2) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `kategori`) VALUES
(1, 'Buku Cetak'),
(2, 'Buku Paket'),
(3, 'Cerpen'),
(4, 'Novel'),
(5, 'IPA'),
(6, 'IPS'),
(7, 'Bahasa Indonesia'),
(9, 'MTK'),
(10, 'Penjaskes'),
(11, 'Agama'),
(12, 'Bahasa Inggris'),
(13, 'Sejarah'),
(14, 'Komputer'),
(15, 'Majalah'),
(16, 'Ekonomi'),
(17, 'Fisika');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `kode_peminjaman` int(5) NOT NULL AUTO_INCREMENT,
  `kode_buku` varchar(5) NOT NULL,
  `kode_anggota` varchar(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_harus_kembali` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('Pinjam','Kembali','Perpanjang') NOT NULL,
  PRIMARY KEY (`kode_peminjaman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`kode_peminjaman`, `kode_buku`, `kode_anggota`, `tgl_pinjam`, `tgl_harus_kembali`, `tgl_kembali`, `status`) VALUES
(1, 'KB015', 'KB016', '2018-01-24', '2018-01-27', '0000-00-00', 'Pinjam'),
(2, 'KB009', 'KA003', '2018-01-24', '2018-01-27', '2018-01-30', 'Kembali'),
(3, 'KB005', 'KA010', '2018-01-24', '2018-01-27', '2018-01-24', 'Kembali'),
(4, 'KB013', 'KA011', '2018-01-30', '2018-02-02', '0000-00-00', 'Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE IF NOT EXISTS `pengembalian` (
  `kode_pengembalian` int(5) NOT NULL AUTO_INCREMENT,
  `kode_peminjaman` int(5) NOT NULL,
  `keterlambatan` int(2) NOT NULL,
  `denda` int(7) NOT NULL,
  PRIMARY KEY (`kode_pengembalian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`kode_pengembalian`, `kode_peminjaman`, `keterlambatan`, `denda`) VALUES
(1, 1, 0, 0),
(2, 3, 0, 0),
(3, 2, 3, 900);
