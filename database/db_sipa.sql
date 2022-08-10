-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2019 at 05:23 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempatLahir` varchar(30) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `jenisKelamin` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `statusPerkawinan` varchar(30) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `golDarah` varchar(2) NOT NULL,
  `nomorTlp` varchar(15) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`id_penduduk`, `nik`, `nama`, `tempatLahir`, `tanggalLahir`, `jenisKelamin`, `alamat`, `rt`, `rw`, `kelurahan`, `agama`, `pendidikan`, `statusPerkawinan`, `pekerjaan`, `golDarah`, `nomorTlp`, `foto`) VALUES
(8, '3210', 'Tiya Sina', 'Subang', '2002-01-12', 'Perempuan', 'Jl.Biru No.1', '02', '04', 'Malabar', 'Islam', 'SLTA/Sederajat', 'Belum Kawin', 'Belum Bekerja', 'A', '08723456792', 'penduduk-3210.jpeg'),
(9, '3209', 'Ei Kucing', 'Bandung', '1999-01-09', 'Laki-Laki', 'Komplek Babakan Cempaka No.12', '1', '12', 'Lingkar Selatan', 'Islam', 'Akademi/Diploma III/S.Muda', 'Belum Kawin', 'Atlet Badminton', 'A', '089234564627', 'penduduk-3209.jpeg'),
(10, '3211', 'Nipa Oni', 'Banten', '1880-09-09', 'Laki-Laki', 'Maleer IV No.123', '6', '1', 'Turangga', 'Katolik', 'SLTA/Sederajat', 'Kawin', 'Pegawai Swasta', 'AB', '081342526788', 'penduduk-3211.jpeg'),
(11, '3222', 'Ozi Gin', 'Bandung', '1884-05-01', 'Laki-Laki', 'Jl.Geger Juling No.12', '01', '12', 'Burangrang', 'Islam', 'SLTA/Sederajat', 'Kawin', 'Pedagang', 'B', '08978439439493', 'penduduk-32222.jpeg'),
(12, '32888', 'Gelis Rinda', 'Surabaya', '2001-01-02', 'Perempuan', 'Komplek Bundar No.90', '12', '1', 'Lingkar Selatan', 'Protestan', 'SLTA/Sederajat', 'Belum Kawin', 'Programer', 'AB', '0891783993040', 'pendudukEdit-32888.jpeg'),
(13, '327878', 'Umar Bakri', 'Jakarta', '1959-09-08', 'Laki-Laki', 'Jl.Madian No.101', '6', '5', 'Cikawao', 'Khonghucu', 'Strata II', 'Cerai Mati', 'PNS', 'O', '0892382839392', 'pendudukEdit-327878.jpeg');

--
-- Triggers `tb_penduduk`
--
DELIMITER $$
CREATE TRIGGER `trigger_saathapus` AFTER DELETE ON `tb_penduduk` FOR EACH ROW BEGIN
DELETE FROM `tb_permohonanktp` WHERE nik=OLD.nik;
DELETE FROM `tb_permohonankk` WHERE nik=OLD.nik;
DELETE FROM `tb_sktmpendidikan` WHERE nik=OLD.nik;
DELETE FROM `tb_sktmkesehatan` WHERE nik=OLD.nik;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_permohonankk`
--

CREATE TABLE `tb_permohonankk` (
  `no_permohonankk` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jenisPermohonan` varchar(30) NOT NULL,
  `tglPermohonan` date NOT NULL,
  `nomor_kk` varchar(16) NOT NULL,
  `tgl_cetak` date NOT NULL,
  `tgl_pengambilan` date NOT NULL,
  `nama_pengambil` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_permohonankk`
--

INSERT INTO `tb_permohonankk` (`no_permohonankk`, `nik`, `jenisPermohonan`, `tglPermohonan`, `nomor_kk`, `tgl_cetak`, `tgl_pengambilan`, `nama_pengambil`, `status`) VALUES
('K00001', '3211', 'Pindah Datang', '2019-01-21', '32000093', '2019-03-05', '2019-07-03', 'Syakuri Ramadhan', 'Sudah Diambil'),
('K00002', '3222', 'Pindah Datang', '2019-04-16', '-', '0000-00-00', '0000-00-00', '-', 'Belum Diambil'),
('K00003', '3209', 'Permohonan Baru', '2014-12-01', '325555', '2015-01-01', '2015-02-01', 'Halim Sah', 'Sudah Diambil'),
('K00004', '32888', 'Permohonan Baru', '2019-08-05', '325567778', '2019-08-07', '2019-08-08', 'huni', 'Sudah Diambil'),
('K00005', '3211', 'Cetak Ulang', '2019-08-14', '-', '0000-00-00', '0000-00-00', '-', 'Belum Diambil'),
('K00006', '327878', 'Pindah Datang', '2019-01-07', '-', '0000-00-00', '0000-00-00', '-', 'Belum Diambil');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permohonanktp`
--

CREATE TABLE `tb_permohonanktp` (
  `no_permohonanKtp` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jenisPermohonan` varchar(30) NOT NULL,
  `tgl_penyerahanBerkas` date NOT NULL,
  `tglRekam` date NOT NULL,
  `tgl_pengambilan` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_permohonanktp`
--

INSERT INTO `tb_permohonanktp` (`no_permohonanKtp`, `nik`, `jenisPermohonan`, `tgl_penyerahanBerkas`, `tglRekam`, `tgl_pengambilan`, `status`) VALUES
('P00003', '3210', 'Permohonan Baru', '2019-07-02', '2019-07-02', '2019-07-08', 'Sudah Diambil'),
('P00004', '3211', 'Cetak Ulang', '2019-07-10', '2019-07-10', '2019-08-06', 'Sudah Diambil'),
('P00005', '32888', 'Permohonan Baru', '2019-04-09', '2019-04-09', '0000-00-00', 'Belum Diambil'),
('P00006', '32888', 'Pindah Datang', '2019-08-08', '2019-08-08', '0000-00-00', 'Belum Diambil');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sktmkesehatan`
--

CREATE TABLE `tb_sktmkesehatan` (
  `no_sktmkesehatan` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nomor_kk` varchar(16) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sktmkesehatan`
--

INSERT INTO `tb_sktmkesehatan` (`no_sktmkesehatan`, `nik`, `nomor_kk`, `tgl`) VALUES
('R00001', '3211', '32044444', '2018-05-02'),
('R00002', '32888', '3425262727', '2019-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sktmpendidikan`
--

CREATE TABLE `tb_sktmpendidikan` (
  `no_sktmPendidikan` varchar(10) NOT NULL,
  `tgl_sktmPendidikan` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `sekolah_tujuan` varchar(100) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sktmpendidikan`
--

INSERT INTO `tb_sktmpendidikan` (`no_sktmPendidikan`, `tgl_sktmPendidikan`, `nik`, `sekolah_tujuan`, `no_kk`, `keterangan`) VALUES
('S00001', '2019-03-14', '3209', 'Universitas Padjajaran', '3200044', 'untuk mendapatkan Beasiswa masuk kuliah'),
('S00002', '2019-01-01', '32888', 'Politeknik Negeri Bandung', '32098829', 'Meminta Keringan Biaya Semester'),
('S00003', '2019-04-02', '3210', 'Institut Teknologi Bandung', '3200006', 'Meminta keringanan biaya semester');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff`
--

CREATE TABLE `tb_staff` (
  `id` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(60) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_staff`
--

INSERT INTO `tb_staff` (`id`, `nip`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `jabatan`, `no_tlp`, `foto`, `password`) VALUES
(3, '002', 'Flora Punir', 'Perempuan', 'Bandung', '1972-02-16', 'Jl.Banteng No.22 Bandung', 'Bagian Pelayanan', '08756483934', 'staffEdit-002.jpeg', '979c8e8f8271e3431249f935cd7d3f4c'),
(7, '009', 'Hendi Ramdhan', 'Laki-Laki', 'Bandung', '1976-05-14', 'Komplek Cibiru Asri No.90 Bandung', 'Kasi Pelayanan', '0892020202', 'staff-009.jpeg', '71ea803d7025a9ef0a399e2bc9d7867e');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `userID` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`userID`, `nama`, `password`) VALUES
('admin', 'Wisnu', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `tb_permohonankk`
--
ALTER TABLE `tb_permohonankk`
  ADD PRIMARY KEY (`no_permohonankk`);

--
-- Indexes for table `tb_permohonanktp`
--
ALTER TABLE `tb_permohonanktp`
  ADD PRIMARY KEY (`no_permohonanKtp`);

--
-- Indexes for table `tb_sktmkesehatan`
--
ALTER TABLE `tb_sktmkesehatan`
  ADD PRIMARY KEY (`no_sktmkesehatan`);

--
-- Indexes for table `tb_sktmpendidikan`
--
ALTER TABLE `tb_sktmpendidikan`
  ADD PRIMARY KEY (`no_sktmPendidikan`);

--
-- Indexes for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_staff`
--
ALTER TABLE `tb_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
