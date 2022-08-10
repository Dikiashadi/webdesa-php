-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 05:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(14, '1111', 'Reza Ardiansyah', 'Lembar', '2000-11-02', 'Laki-Laki', 'Lembar, Lombok Barat', '02', '00', 'Lembar', 'Islam', 'Diploma IV/Strata I', 'Belum Kawin', 'Mahasiswa', 'B', '+62 853-3392-67', 'penduduk-1234.jpg'),
(15, '2222', 'Diki ashadi', 'Mataram', '2001-08-19', 'Laki-Laki', 'Gunungsari', '04', '00', 'Mataram', 'Islam', 'Strata II', 'Belum Kawin', 'Mahasiswa', 'AB', '087861807041', 'penduduk-2222.jpg'),
(16, '3333', 'Asep', 'Mataram', '1990-11-12', 'Laki-Laki', 'Mataram', '01', '00', 'Bumigora', 'Islam', 'SLTA/Sederajat', 'Kawin', 'Swasta', 'O', '081810907128', 'penduduk-3333.png'),
(17, '4444', 'fitri', 'Mataram', '2002-02-12', 'Perempuan', 'Mataram', '03', '00', 'Lembar', 'Islam', 'SLTA/Sederajat', 'Belum Kawin', 'Mahasiswa', 'AB', '083129898999', 'penduduk-4444.png'),
(18, '5555', 'syarif', 'Mataram', '1998-05-12', 'Laki-Laki', 'sandubaya', '08', '00', 'Gerung', 'Islam', 'Diploma IV/Strata I', 'Belum Kawin', 'Mahasiswa', 'B', '081291121120', 'penduduk-5555.png'),
(19, '1212', 'asepudin', 'mataram', '1999-12-02', 'Laki-Laki', 'Mataram', '01', '02', 'Mataram', 'Islam', 'Diploma IV/Strata I', 'Belum Kawin', 'Mahasiswa', 'A', '087181212717', 'penduduk-1212.png');

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
('P00001', '1234', 'Permohonan Baru', '2022-12-07', '2022-11-07', '0000-00-00', 'Belum Diambil'),
('P00002', '2222', 'Permohonan Baru', '2022-07-24', '2022-07-24', '2022-07-25', 'Sudah Diambil'),
('P00003', '1111', 'Permohonan Baru', '2022-07-23', '2022-07-23', '2022-07-24', 'Sudah Diambil');

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
(8, '123', 'setyo', 'Laki-Laki', 'Mataram', '1991-06-27', 'Mambalan', 'Camat', '081999111222333', 'staff-123.jpg', '6309647631df09e6caee8ad7c1704013'),
(9, '234', 'safira', 'Perempuan', 'Gunungsari', '1995-11-12', 'Ranjok selatan', 'Bagian Pelayanan', '082111222999', 'staff-234.png', 'ea9827e9ad232af00af77b2375693568'),
(10, '345', 'zaskia', 'Perempuan', 'Cakra', '1992-12-11', 'cakra', 'Kasi Pelayanan', '083129898932', 'staff-345.png', 'b9cfa62452f1d3fded178fc61244f6e8'),
(11, '456', 'Baharudin', 'Laki-Laki', 'Suranadi', '1994-02-02', 'Kuripan', 'Bagian Pelayanan', '081221919202', 'staff-456.png', '4a888b5a6e49fc2e5ec70ed2b73e0b82'),
(12, '1112', 'sarif', 'Laki-Laki', 'Mataram', '1997-11-11', 'Mataram', 'Bagian Pelayanan', '0871221112228', 'staff-1112.png', 'e0c4b80d331b60b40474869cc2153d85');

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
('admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_staff`
--
ALTER TABLE `tb_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
