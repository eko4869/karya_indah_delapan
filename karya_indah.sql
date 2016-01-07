-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2015 at 01:55 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `karya_indah`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE IF NOT EXISTS `cabang` (
  `id_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `kd_cabang` varchar(50) NOT NULL,
  `nm_cabang` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `kd_cabang`, `nm_cabang`) VALUES
(1, 'MGL', 'Magelang'),
(4, 'SMG', 'Semarang'),
(5, 'BKS', 'Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
  `id_layanan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_layanan` varchar(50) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_layanan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `kd_layanan`, `nama_layanan`, `keterangan`) VALUES
(1, 'REG', 'Reguler', 'Biasa'),
(2, 'EXP', 'Express', 'Cepat'),
(4, 'SEX', 'Super Express', 'Cepat sekali');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id_module` int(255) NOT NULL AUTO_INCREMENT,
  `nama_module` varchar(255) NOT NULL,
  `icon_module` varchar(255) NOT NULL,
  `url_module` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id_module`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `nama_module`, `icon_module`, `url_module`, `parent`, `order`) VALUES
(4, 'Setting', 'wrench icon-white', '', '', 2),
(5, 'Master', 'hdd icon-white', '', '0', 3),
(6, 'User', '', 'pengaturan/user', '4', 1),
(7, 'Home', 'home icon-white', 'home', '0', 1),
(12, 'Laporan', 'book icon-white', '#', '', 5),
(16, 'Module', '', 'pengaturan/module', '4', 2),
(18, 'Transaksi', 'shopping-cart icon-white', '', '', 4),
(19, 'User Level & Akses', '', 'pengaturan/user_level', '4', 3),
(21, 'Keluar', '', 'login/logout', '20', 1),
(27, 'General', '', 'pengaturan/profil', '4', 4),
(28, 'Tarif Pengiriman', '', 'pengaturan/tarif', '4', 5),
(29, 'Pelanggan', '', 'master/pelanggan', '5', 1),
(30, 'Pengiriman', '', 'transaksi/pengiriman', '18', 1),
(31, 'Penerimaan', '', 'transaksi/penerimaan', '18', 2),
(32, 'Pengiriman', '', 'laporan/pengiriman', '12', 1),
(33, 'Penerimaan', '', 'laporan/penerimaan', '12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pelanggan` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `kd_pelanggan`, `nama`, `alamat`, `no_telp`) VALUES
(2, 'P-001', 'Tukimin', 'Kaponan, Pakis, Magelang', '087456466464'),
(3, 'P-002', 'Hendrik', 'japunan', '08474664646'),
(4, 'P-003', 'Slamet Thok', 'Dakawu', '0857577449393');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `no_resi` varchar(255) NOT NULL,
  `kd_pengirim` varchar(50) NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `alamat_pengirim` text NOT NULL,
  `telp_pengirim` varchar(50) NOT NULL,
  `kd_penerima` varchar(50) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `telp_penerima` varchar(50) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `jam_kirim` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `kd_cabang` varchar(50) NOT NULL,
  `kd_cabang_tujuan` varchar(50) NOT NULL,
  `layanan` varchar(50) NOT NULL,
  `harga_kg` double NOT NULL,
  `dari` varchar(255) NOT NULL,
  `sampai` varchar(255) NOT NULL,
  `tgl_terima` date NOT NULL,
  `jam_terima` time NOT NULL,
  PRIMARY KEY (`no_resi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`no_resi`, `kd_pengirim`, `nama_pengirim`, `alamat_pengirim`, `telp_pengirim`, `kd_penerima`, `nama_penerima`, `alamat_penerima`, `telp_penerima`, `tgl_kirim`, `jam_kirim`, `status`, `keterangan`, `kd_cabang`, `kd_cabang_tujuan`, `layanan`, `harga_kg`, `dari`, `sampai`, `tgl_terima`, `jam_terima`) VALUES
('000001', 'P-001', 'Tukimin', 'Kaponan, Pakis, Magelang', '087456466464', 'P-002', 'Hendrik', 'japunan', '08474664646', '2015-09-17', '15:16:06', 'proses pengiriman', 'barang mudah terbakar', 'MGL', 'BKS', 'REG', 4000, 'Jakarta', 'Bandung', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman_list`
--

CREATE TABLE IF NOT EXISTS `pengiriman_list` (
  `id_list` int(11) NOT NULL AUTO_INCREMENT,
  `no_resi` varchar(255) NOT NULL,
  `isi_barang` text NOT NULL,
  `berat` double NOT NULL,
  `harga_kg` double NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id_list`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `pengiriman_list`
--

INSERT INTO `pengiriman_list` (`id_list`, `no_resi`, `isi_barang`, `berat`, `harga_kg`, `subtotal`) VALUES
(31, '000001', 'Ayam', 2, 4000, 8000),
(32, '000001', 'Sapi', 2, 4000, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE IF NOT EXISTS `tarif` (
  `id_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `kd_tarif` varchar(50) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `dari` varchar(255) NOT NULL,
  `sampai` varchar(255) NOT NULL,
  `tarif_kg` double NOT NULL,
  PRIMARY KEY (`id_tarif`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `kd_tarif`, `id_layanan`, `dari`, `sampai`, `tarif_kg`) VALUES
(2, 'A12', 1, 'Jakarta', 'Bandung', 4000),
(4, 'A11', 1, 'Surabaya', 'Makasar', 6000),
(5, 'A13', 2, 'Jakarta', 'Bandung', 7000),
(6, 'A14', 4, 'Jakarta', 'Bandung', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `id_level` smallint(2) NOT NULL,
  `kd_cabang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_level` (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status`, `id_level`, `kd_cabang`) VALUES
(1, 'superadmin', '6d1ce7aa0a1d988dc96a2abcd187b45a', 'aktif', 1, NULL),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'aktif', 11, NULL),
(6, 'Paijo', '44529fdc8afb86d58c6c02cd00c02e43', 'aktif', 12, 'MGL'),
(7, 'Sudiro', '6a5d98f03797fef35ff0d4c346f79bfb', 'aktif', 12, 'SMG'),
(8, 'marplus', '667fa7bd351d919a159e77dc46fe4284', 'aktif', 12, 'BKS');

-- --------------------------------------------------------

--
-- Table structure for table `user_akses`
--

CREATE TABLE IF NOT EXISTS `user_akses` (
  `id_level` smallint(2) NOT NULL,
  `id_module` int(255) NOT NULL,
  UNIQUE KEY `id_level_2` (`id_level`,`id_module`),
  KEY `id_level` (`id_level`),
  KEY `id_modul` (`id_module`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_akses`
--

INSERT INTO `user_akses` (`id_level`, `id_module`) VALUES
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 12),
(1, 16),
(1, 18),
(1, 19),
(1, 21),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(11, 12),
(11, 18),
(11, 21),
(11, 27),
(11, 28),
(11, 29),
(11, 30),
(11, 31),
(11, 32),
(11, 33),
(12, 7),
(12, 12),
(12, 18),
(12, 30),
(12, 31),
(12, 32),
(12, 33);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE IF NOT EXISTS `user_level` (
  `id_level` smallint(2) NOT NULL AUTO_INCREMENT,
  `level` varchar(255) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_level`, `level`) VALUES
(1, 'PSadmin'),
(11, 'admin'),
(12, 'Pegawai kantor cabang');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `user_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_akses`
--
ALTER TABLE `user_akses`
  ADD CONSTRAINT `user_akses_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `user_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_akses_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
