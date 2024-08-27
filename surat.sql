-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2024 at 01:00 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skd`
--

CREATE TABLE `data_request_skd` (
  `id_request_skd` int NOT NULL,
  `nik` varchar(16) NOT NULL,
  `dusun` int NOT NULL,
  `handil` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rt_d` int NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `scan_ktp_d` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `scan_kk_d` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keperluan` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) NOT NULL DEFAULT 'DOMISILI',
  `status` int NOT NULL DEFAULT '0',
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_request_skd`
--

INSERT INTO `data_request_skd` (`id_request_skd`, `nik`, `dusun`, `handil`, `rt_d`, `tanggal_request`, `scan_ktp_d`, `scan_kk_d`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(33, '20', 1, 'Handil A', 5, '2024-04-16 04:47:29', '20_ktp_1713242849.jpg', '20_kk_1713242849.jpg', 'beasiswa', 'Surat dicetak, bisa diambil!', 'DOMISILI', 3, '2024-07-04'),
(36, '20', 3, 'Handil A', 5, '2024-08-13 01:51:40', '20_ktp_1723513900.jpg', '20_kk_1723513900.jpg', 'beasiswa', 'Surat dicetak, bisa diambil!', 'DOMISILI', 3, '2024-08-13'),
(37, '20', 1, 'D', 3, '2024-08-13 02:44:57', '20_ktp_1723517097.jpg', '20_kk_1723517097.jpg', 'kerja', 'Surat dicetak, bisa diambil!', 'DOMISILI', 3, '2024-08-13'),
(38, '20', 2, 'A', 14, '2024-08-13 03:22:48', '20_ktp_1723519368.jpg', '20_kk_1723519368.jpg', 'beasiswa', 'Surat dicetak, bisa diambil!', 'DOMISILI', 3, '2024-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skk`
--

CREATE TABLE `data_request_skk` (
  `id_request_skk` int NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `scan_kk_k` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Kematian',
  `status` int NOT NULL DEFAULT '0',
  `acc` date DEFAULT NULL,
  `nama_almarhum` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nik_a` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tempat_lahir_a` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal_lahir_a` date DEFAULT NULL,
  `agama_a` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `anak_ke` int DEFAULT NULL,
  `nama_ayah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_ibu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pekerjaan_a` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kewarganegaraan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alamat_a` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tanggal_kematian` date DEFAULT NULL,
  `waktu_kematian` time DEFAULT NULL,
  `tempat_kematian` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `penyebab_kematian` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tempat_pemakaman` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal_pemakaman` date DEFAULT NULL,
  `waktu_pemakaman` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_request_skk`
--

INSERT INTO `data_request_skk` (`id_request_skk`, `nik`, `tanggal_request`, `scan_kk_k`, `keterangan`, `request`, `status`, `acc`, `nama_almarhum`, `nik_a`, `jenis_kelamin`, `tempat_lahir_a`, `tanggal_lahir_a`, `agama_a`, `anak_ke`, `nama_ayah`, `nama_ibu`, `pekerjaan_a`, `kewarganegaraan`, `alamat_a`, `tanggal_kematian`, `waktu_kematian`, `tempat_kematian`, `penyebab_kematian`, `tempat_pemakaman`, `tanggal_pemakaman`, `waktu_pemakaman`) VALUES
(17, '20', '2024-03-13 15:32:12', '20_kk_1710344341.jpg', 'Surat dicetak, bisa diambil!', 'Kematian', 3, '2024-03-15', 'asddd', '5566', 'Laki-Laki', 'kota', '1985-11-19', 'Kristen', 2, 'yui', 'kio', 'mahasis', 'wna', 'jalaanan', '2024-03-12', '15:31:00', 'ruma', 'sakiti', 'kubura', '2024-03-13', '08:33:00'),
(20, '20', '2024-08-13 01:49:41', '20_kk_1723513781.jpg', 'Surat dicetak, bisa diambil!', 'Kematian', 3, '2024-08-13', 'wer', '63463', 'Laki-Laki', 'kota', '2024-08-13', 'Islam', 4, 'yuto', 'rgre', 'mahasiswa', 'wni', 'sse', '2024-08-13', '09:49:00', 'home', 'sicki', 'kubu', '2024-08-13', '09:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skl`
--

CREATE TABLE `data_request_skl` (
  `id_request_skl` int NOT NULL,
  `nik` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `scan_kk_l` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_istri` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nik_istri` int DEFAULT NULL,
  `tanggal_lahir_istri` date DEFAULT NULL,
  `tempat_lahir_istri` varchar(255) DEFAULT NULL,
  `agama_istri` varchar(255) DEFAULT NULL,
  `alamat_istri` text,
  `pekerjaan_istri` varchar(255) DEFAULT NULL,
  `nama_anak` varchar(255) DEFAULT NULL,
  `jenis_kelamin_anak` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tempat_lahir_anak` varchar(255) DEFAULT NULL,
  `tanggal_lahir_anak` date DEFAULT NULL,
  `jam_lahir` time DEFAULT NULL,
  `anak_ke` int DEFAULT NULL,
  `request` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'KELAHIRAN',
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `status` int NOT NULL DEFAULT '0',
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_request_skl`
--

INSERT INTO `data_request_skl` (`id_request_skl`, `nik`, `tanggal_request`, `scan_kk_l`, `nama_istri`, `nik_istri`, `tanggal_lahir_istri`, `tempat_lahir_istri`, `agama_istri`, `alamat_istri`, `pekerjaan_istri`, `nama_anak`, `jenis_kelamin_anak`, `tempat_lahir_anak`, `tanggal_lahir_anak`, `jam_lahir`, `anak_ke`, `request`, `keterangan`, `status`, `acc`) VALUES
(74, '01', '2024-03-13 11:05:00', '01_.jpg', 'nanda', 18, '1987-11-13', 'kota', 'Islam', 'jalanan', 'irt', 'arnan', 'Laki-Laki', 'desa', '2017-04-20', '16:13:00', 1, 'KELAHIRAN', 'Data sedang diperiksa oleh Staf', 0, NULL),
(77, '20', '2024-03-13 14:56:37', '20 - Arya Nanda_kk_.jpg', 'nanaa', 4634, '1987-10-28', 'kotawe', 'Islam', 'jalan jalanvvv', 'irti', 'arn', 'laki-laki', 'des', '2024-03-11', '04:09:00', 3, 'KELAHIRAN', 'Surat dicetak, bisa diambil!', 3, '2024-03-15'),
(78, '20', '2024-08-13 01:18:13', '20_kk_1723511893.jpg', 'nanda', 643543, '2006-01-31', 'kota', 'Islam', 'gffhf', 'ibu rumah', 'arna', '', 'desa', '2024-08-13', '09:18:00', 5, 'KELAHIRAN', 'Surat dicetak, bisa diambil!', 3, '2024-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_sku`
--

CREATE TABLE `data_request_sku` (
  `id_request_sku` int NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `scan_ktp_u` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `scan_kk_u` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_usaha` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_usaha` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_usaha` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `rt_u` varchar(16) DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) NOT NULL DEFAULT 'USAHA',
  `status` int NOT NULL DEFAULT '0',
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_request_sku`
--

INSERT INTO `data_request_sku` (`id_request_sku`, `nik`, `tanggal_request`, `scan_ktp_u`, `scan_kk_u`, `nama_usaha`, `jenis_usaha`, `alamat_usaha`, `rt_u`, `keterangan`, `request`, `status`, `acc`) VALUES
(29, '20', '2023-11-11 12:31:53', '20_.jpg', '20_.jpg', 'mcd', 'jual ayam', 'handil 3', '001', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2023-11-11'),
(30, '20', '2023-11-13 05:55:50', '20_.jpg', '20_.jpg', 'fkjgeon', 'regperihnwen', 'eofienfe', '001', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2023-11-13'),
(31, '20', '2023-11-13 06:01:01', '20_.jpg', '20_.jpg', 'dvdx', 'cxvx', 'xvvxz', '002', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2023-11-24'),
(32, '20', '2023-11-24 12:41:28', '20_.jpg', '20_.jpg', 'fbdbfe', 'jual ayam', 'handil 3', '003', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2023-11-26'),
(33, '20', '2023-11-28 06:37:56', '20_.jpg', '20_.jpg', 'grfw', 'weefew', 'efwe', '003', 'Surat sedang dalam proses cetak', 'USAHA', 2, '2024-08-13'),
(34, '20', '2024-01-22 10:45:25', '20_.jpg', '20_.jpg', 'riche', 'peda', 'handil 1', '002', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2024-02-01'),
(35, '20', '2024-01-22 10:59:14', '20_ktp_1705921154.jpg', '20_kk_1705921154.jpg', 'qw', 'qp', 'po', '002', 'Surat sedang dalam proses cetak', 'USAHA', 2, '2024-03-08'),
(36, '20', '2024-01-30 02:03:38', '20_ktp_1706580218.jpg', '20_kk_1706580218.jpg', 'mcd', 'jual ayam', 'handil 3', '007', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2024-01-30'),
(38, '20', '2024-02-20 00:11:16', '20_ktp_1708387876.jpg', '20_kk_1708387876.jpg', 'toko kelontong nanda', 'jual sembako', 'handil 3', '007', 'Data sedang diperiksa oleh Staf', 'USAHA', 0, NULL),
(39, '20', '2024-02-20 00:11:19', '20_ktp_1708387879.jpg', '20_kk_1708387879.jpg', 'toko kelontong nanda', 'jual sembako', 'handil 3', '007', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2024-02-20'),
(40, '20', '2024-03-13 03:30:14', '20 - Arya Nanda_.jpg', '20 - Arya Nanda_.jpg', 'kepitiibn', 'jual kepiting', 'tj...jhhh', '002', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2024-03-13'),
(41, '20', '2024-03-13 03:36:40', '20 - Arya Nanda_.jpg', '20 - Arya Nanda_.jpg', 'polo', 'jual', 'tanju', '006', 'Data sedang diperiksa oleh Staf', 'USAHA', 0, NULL),
(42, '01', '2024-03-13 03:53:43', '01_ktp_1710302023.jpg', '01_kk_1710302023.jpg', 'mcd', 'jual ayam', 'handil 3', '008', 'Data sedang diperiksa oleh Staf', 'USAHA', 0, NULL),
(43, '01', '2024-03-13 03:54:20', '01 - tes_ktp_.jpg', '01 - tes_kk_.jpg', 'starbucks', 'jualan es kopi st', 'handil 4', '012', 'Data sedang diperiksa oleh Staf', 'USAHA', 0, NULL),
(45, '6402041808020001', '2024-05-28 05:23:22', '6402041808020001 - arya_ktp_.jpg', '6402041808020001 - arya_kk_.jpg', 'kfc', 'ayam', 'tanjung ', '007', 'Data sedang diperiksa oleh Staf', 'USAHA', 0, NULL),
(46, '20', '2024-07-04 04:59:30', '20_ktp_1720069170.jpg', '20_kk_1720069170.jpg', 'mcds', 'ayam goreng', 'handil 3', '001', 'Data sedang diperiksa oleh Staf', 'USAHA', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_request_surat`
--

CREATE TABLE `data_request_surat` (
  `id` int NOT NULL,
  `jenis_surat` varchar(10) NOT NULL,
  `status` int NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_request_surat`
--

INSERT INTO `data_request_surat` (`id`, `jenis_surat`, `status`, `request_date`) VALUES
(1, 'SKL', 1, '2024-06-01'),
(2, 'SKU', 1, '2024-06-01'),
(3, 'SKK', 1, '2024-06-01'),
(4, 'SKD', 1, '2024-06-01'),
(5, 'SKL', 1, '2024-06-02'),
(6, 'SKU', 1, '2024-06-02'),
(7, 'SKK', 1, '2024-06-02'),
(8, 'SKD', 1, '2024-06-02'),
(9, 'SKL', 1, '2024-06-01'),
(10, 'SKU', 1, '2024-06-01'),
(11, 'SKK', 1, '2024-06-01'),
(12, 'SKD', 1, '2024-06-01'),
(13, 'SKL', 1, '2024-06-02'),
(14, 'SKU', 1, '2024-06-02'),
(15, 'SKK', 1, '2024-06-02'),
(16, 'SKD', 1, '2024-06-02'),
(17, 'SKL', 1, '2024-06-01'),
(18, 'SKU', 1, '2024-06-01'),
(19, 'SKK', 1, '2024-06-01'),
(20, 'SKD', 1, '2024-06-01'),
(21, 'SKL', 1, '2024-06-02'),
(22, 'SKU', 1, '2024-06-02'),
(23, 'SKK', 1, '2024-06-02'),
(24, 'SKD', 1, '2024-06-02'),
(25, 'SKL', 1, '2024-06-03'),
(26, 'SKU', 1, '2024-06-03'),
(27, 'SKK', 1, '2024-06-03'),
(28, 'SKD', 1, '2024-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `nik` varchar(16) NOT NULL,
  `password` varchar(225) NOT NULL,
  `hak_akses` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `agama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rt` int DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `telepon` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pekerjaan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status_warga` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`nik`, `password`, `hak_akses`, `nama`, `tanggal_lahir`, `tempat_lahir`, `jekel`, `agama`, `rt`, `alamat`, `telepon`, `pekerjaan`, `status_warga`) VALUES
('01', '01', 'Pemohon', 'tesee', '2006-07-13', 'kola', 'Laki-Laki', '', NULL, 'Jalan teluk bayur depan gg. 10 samping sdn 010 no.43 kel. Mangkupalas kec.Samarinda seberang', '082350680650', 'petani', 'Belum Kawin'),
('03', '03', 'Pemohon', 'polliii', '2012-07-07', 'miuuu', 'Laki-Laki', NULL, NULL, 'jalanjalan', NULL, NULL, 'Belum Kawin'),
('1110', '$2y$10$sVWP.0ov7yuKaOa9Situ/OrTpKEpWnVuy3yLgCrQdnCQCo1dP5HXW', 'Pemohon', 'alkk', '2024-08-01', 'poi', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL),
('1234567890123456', 'hanter01', 'Kepala Desa', 'arnan', '2023-09-17', 'pol', 'Laki-Laki', NULL, NULL, 'zdgd', NULL, NULL, 'Kawin'),
('2', 'hanter02', 'Staf', 'Nanda', '2021-10-20', 'coba', 'Perempuan', '', NULL, 'coba', '', NULL, 'Kawin'),
('20', 'password20', 'Pemohon', 'Arya Nanda', '2005-07-21', 'tanjung', 'Laki-Laki', 'Islam', NULL, '     Jalan teluk bayur depan gg. 10 samping sdn 010 no.43 ', '082350680650', 'Nelayan', 'Kawin'),
('200', '$2y$10$fF.OQhS.dWsxxbCgiPN02u0mdGI8yoQMFdtvaKWXskJOStN3qYU/a', 'Pemohon', 'ar', '2024-08-01', 'Kota Samarinda', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL),
('30', '30', 'Pemohon', 'nanda', '2011-06-16', 'ht', 'Perempuan', NULL, NULL, 'terusan', NULL, NULL, 'Belum Kawin'),
('34', 'k44444rr', 'Pemohon', 'k', '4444-05-05', '20', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL),
('6402040000000001', 'password1', 'Pemohon', 'Andi', '1990-01-01', 'Anggana', 'Laki-Laki', 'Islam', 1, 'Jl. Ahmad Yani No.1', '081234567890', 'Petani', 'Belum Kawin'),
('6402040000000002', 'password2', 'Pemohon', 'Budi', '1991-02-02', 'Sepatin', 'Laki-Laki', 'Kristen', 2, 'Jl. Merdeka No.2', '081234567891', 'Nelayan', 'Kawin'),
('6402040000000003', 'password3', 'Pemohon', 'Cici', '1992-03-03', 'Muara Pantuan', 'Perempuan', 'Hindu', 3, 'Jl. Sudirman No.3', '081234567892', 'Guru', 'Belum Kawin'),
('6402040000000004', 'password4', 'Pemohon', 'Dewi', '1993-04-04', 'Handil Terusan', 'Perempuan', 'Budha', 4, 'Jl. Diponegoro No.4', '081234567893', 'Dokter', 'Kawin'),
('6402040000000005', 'password5', 'Pemohon', 'Eko', '1994-05-05', 'Anggana', 'Laki-Laki', 'Konghucu', 5, 'Jl. Pahlawan No.5', '081234567894', 'Pedagang', 'Belum Kawin'),
('6402040000000006', 'password6', 'Pemohon', 'Fina', '1995-06-06', 'Sepatin', 'Perempuan', 'Islam', 6, 'Jl. Rajawali No.6', '081234567895', 'Perawat', 'Kawin'),
('6402040000000007', 'password7', 'Pemohon', 'Gilang', '1996-07-07', 'Muara Pantuan', 'Laki-Laki', 'Kristen', 7, 'Jl. Hasanuddin No.7', '081234567896', 'Sopir', 'Belum Kawin'),
('6402040000000008', 'password8', 'Pemohon', 'Hana', '1997-08-08', 'Handil Terusan', 'Perempuan', 'Hindu', 8, 'Jl. Diponegoro No.8', '081234567897', 'Apoteker', 'Kawin'),
('6402040000000009', 'password9', 'Pemohon', 'Iwan', '1998-09-09', 'Anggana', 'Laki-Laki', 'Budha', 9, 'Jl. Pattimura No.9', '081234567898', 'Montir', 'Belum Kawin'),
('6402040000000010', 'password10', 'Pemohon', 'Joko', '1999-10-10', 'Sepatin', 'Laki-Laki', 'Konghucu', 10, 'Jl. Cendrawasih No.10', '081234567899', 'Tukang Kayu', 'Kawin'),
('6402041808020001', 'ibimors60', 'Pemohon', 'arya', '2002-08-18', 'samarinda', 'Laki-Laki', 'Islam', NULL, 'tanjung berukang rt.05, desa sepatin', '082350680650', 'mahasiswa', 'Belum Kawin');

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `dusun_id` int NOT NULL,
  `nama_dusun` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`dusun_id`, `nama_dusun`) VALUES
(1, 'Dusun 1'),
(2, 'Dusun 2'),
(3, 'Dusun 3');

-- --------------------------------------------------------

--
-- Table structure for table `handil`
--

CREATE TABLE `handil` (
  `id` int NOT NULL,
  `nama_handil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dusun_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `handil`
--

INSERT INTO `handil` (`id`, `nama_handil`, `dusun_id`) VALUES
(5, 'handil 1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  ADD PRIMARY KEY (`id_request_skd`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indexes for table `data_request_skk`
--
ALTER TABLE `data_request_skk`
  ADD PRIMARY KEY (`id_request_skk`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indexes for table `data_request_skl`
--
ALTER TABLE `data_request_skl`
  ADD PRIMARY KEY (`id_request_skl`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indexes for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  ADD PRIMARY KEY (`id_request_sku`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indexes for table `data_request_surat`
--
ALTER TABLE `data_request_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`dusun_id`);

--
-- Indexes for table `handil`
--
ALTER TABLE `handil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dusun_id` (`dusun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  MODIFY `id_request_skd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `data_request_skk`
--
ALTER TABLE `data_request_skk`
  MODIFY `id_request_skk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `data_request_skl`
--
ALTER TABLE `data_request_skl`
  MODIFY `id_request_skl` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  MODIFY `id_request_sku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `data_request_surat`
--
ALTER TABLE `data_request_surat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `dusun_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `handil`
--
ALTER TABLE `handil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  ADD CONSTRAINT `data_request_skd_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_request_skk`
--
ALTER TABLE `data_request_skk`
  ADD CONSTRAINT `data_request_skk_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_request_skl`
--
ALTER TABLE `data_request_skl`
  ADD CONSTRAINT `data_request_skl_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  ADD CONSTRAINT `data_request_sku_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `handil`
--
ALTER TABLE `handil`
  ADD CONSTRAINT `handil_ibfk_1` FOREIGN KEY (`dusun_id`) REFERENCES `dusun` (`dusun_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
