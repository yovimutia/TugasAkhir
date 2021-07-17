-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 08:13 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `primagama`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `presensi_id_auto` (`p` INT) RETURNS CHAR(6) CHARSET latin1 NO SQL
BEGIN
DECLARE a CHAR(8);
DECLARE b INT;

SET b = IF(p IS NULL, 1, p+1);
SET a = CONCAT("PRS", LPAD(b,3,0));

RETURN a;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_JABATAN` char(10) NOT NULL,
  `NAMA_JABATAN` char(10) NOT NULL,
  `STATUS_JABATAN` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`ID_JABATAN`, `NAMA_JABATAN`, `STATUS_JABATAN`) VALUES
('J01', 'tentor', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_les`
--

CREATE TABLE `jadwal_les` (
  `ID_JADWAL` int(11) NOT NULL,
  `TGL_LES` date NOT NULL,
  `ID_MAPEL` varchar(9) NOT NULL,
  `ID_PEGAWAI` varchar(9) NOT NULL,
  `ID_KELAS` varchar(9) NOT NULL,
  `ID_RUANG` int(11) NOT NULL,
  `JAM_LES` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_les`
--

INSERT INTO `jadwal_les` (`ID_JADWAL`, `TGL_LES`, `ID_MAPEL`, `ID_PEGAWAI`, `ID_KELAS`, `ID_RUANG`, `JAM_LES`) VALUES
(1, '2021-01-12', 'mapel01', 'peg01', 'Kel01', 1, '14.00 - 17.00');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bimbingan`
--

CREATE TABLE `jenis_bimbingan` (
  `ID_BIMBINGAN` varchar(9) NOT NULL,
  `NAMA_BIMBINGAN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_bimbingan`
--

INSERT INTO `jenis_bimbingan` (`ID_BIMBINGAN`, `NAMA_BIMBINGAN`) VALUES
('bim01', 'Bimbingan UN');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_ujian`
--

CREATE TABLE `jenis_ujian` (
  `ID_UJIAN` varchar(8) NOT NULL,
  `NAMA_UJIAN` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_ujian`
--

INSERT INTO `jenis_ujian` (`ID_UJIAN`, `NAMA_UJIAN`) VALUES
('UJ01', 'Uji Coba Tengah Semester 1');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `ID_KELAS` varchar(5) NOT NULL,
  `NAMA_KELAS` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`ID_KELAS`, `NAMA_KELAS`) VALUES
('Kel01', '10 MIPA'),
('Kel02', '11 IPS'),
('Kel03', '11 MIPA'),
('Kel04', '10 IPS'),
('Kel05', '12 MIPA'),
('Kel06', '12 IPS');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `ID_MAPEL` varchar(9) NOT NULL,
  `ID_PEGAWAI` varchar(12) NOT NULL,
  `NAMA_MAPEL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`ID_MAPEL`, `ID_PEGAWAI`, `NAMA_MAPEL`) VALUES
('mapel01', 'peg01', 'Matematika'),
('mapel02', 'peg02', 'Bahasa Indonesia'),
('mapel03', 'peg01', 'Fisika'),
('mapel04', 'peg02', 'Biologi');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `ID_NILAI` int(12) NOT NULL,
  `ID_KELAS` varchar(5) NOT NULL,
  `ID_UJIAN` varchar(8) NOT NULL,
  `ID_MAPEL` varchar(9) NOT NULL,
  `NO_INDUK` varchar(13) NOT NULL,
  `KODE_NILAI` varchar(2) NOT NULL,
  `JUMLAH_NILAI` int(11) NOT NULL,
  `TGL_INPUT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`ID_NILAI`, `ID_KELAS`, `ID_UJIAN`, `ID_MAPEL`, `NO_INDUK`, `KODE_NILAI`, `JUMLAH_NILAI`, `TGL_INPUT`) VALUES
(2, 'Kel04', 'UJ01', 'mapel01', '23411', 'A', 80, '2021-01-12'),
(3, 'Kel06', 'UJ01', 'mapel02', '23416', 'B', 78, '2021-01-12'),
(4, 'Kel05', 'UJ01', 'mapel04', '23414', 'B', 77, '2021-01-05'),
(5, 'Kel01', 'UJ01', 'mapel03', '23417', 'B', 77, '2021-01-05'),
(6, 'Kel05', 'UJ01', 'mapel01', '23414', 'A', 89, '2021-01-11'),
(7, 'Kel03', 'UJ01', 'mapel01', '23413', 'A', 89, '2021-01-14'),
(8, 'Kel03', 'UJ01', 'mapel01', '23419', 'B', 77, '2021-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `ID_PEGAWAI` varchar(12) NOT NULL,
  `ID_JABATAN` char(10) NOT NULL,
  `NAMA_PEGAWAI` varchar(35) NOT NULL,
  `ALAMAT_OEGAWAI` varchar(50) NOT NULL,
  `JK_PEGAWAI` varchar(13) NOT NULL,
  `TGL_LAHIR_PEGAWAI` varchar(30) NOT NULL,
  `TELP_PEGAWAI` char(12) NOT NULL,
  `EMAIL_PEGAWAI` varchar(30) DEFAULT NULL,
  `PASSWORD_PEGAWAI` varchar(20) NOT NULL,
  `STATUS_PEGAWAI` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`ID_PEGAWAI`, `ID_JABATAN`, `NAMA_PEGAWAI`, `ALAMAT_OEGAWAI`, `JK_PEGAWAI`, `TGL_LAHIR_PEGAWAI`, `TELP_PEGAWAI`, `EMAIL_PEGAWAI`, `PASSWORD_PEGAWAI`, `STATUS_PEGAWAI`) VALUES
('peg01', 'J01', 'diana', 'jl.rambutan', 'perempuan', '31 desember 1999', '081234565432', 'diana@gmail.com', 'diana123', '0'),
('peg02', 'J01', 'yuli', 'jl.mangga', 'perempuan', '1997-06-09', '081234565433', 'yuli@gmail.com', 'yuli123', '0');

-- --------------------------------------------------------

--
-- Table structure for table `periode_bulan`
--

CREATE TABLE `periode_bulan` (
  `ID_BULAN` varchar(10) NOT NULL,
  `NAMA_BULAN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode_bulan`
--

INSERT INTO `periode_bulan` (`ID_BULAN`, `NAMA_BULAN`) VALUES
('0120', 'Januari 2020');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_siswa`
--

CREATE TABLE `presensi_siswa` (
  `ID_PRESENSI` varchar(12) NOT NULL,
  `NO_INDUK` varchar(13) NOT NULL,
  `STATUS_PRESENSI` char(1) NOT NULL,
  `TGL_PRESENSI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi_siswa`
--

INSERT INTO `presensi_siswa` (`ID_PRESENSI`, `NO_INDUK`, `STATUS_PRESENSI`, `TGL_PRESENSI`) VALUES
('PRS001', '23411', '1', '2021-01-16 10:13:18'),
('PRS002', '23411', '1', '2021-01-15 17:00:00'),
('PRS003', '23411', '1', '2021-01-16 17:00:00'),
('PRS004', '23412', '1', '2021-01-16 17:00:00'),
('PRS005', '23411', '1', '2021-01-16 17:00:00'),
('PRS006', '23412', '1', '2021-01-16 17:00:00'),
('PRS007', '23411', '1', '2021-01-16 17:00:00'),
('PRS008', '23412', '1', '2021-01-16 17:00:00'),
('PRS009', '23411', '1', '2021-01-16 17:00:00'),
('PRS010', '23412', '1', '2021-01-16 17:00:00');

--
-- Triggers `presensi_siswa`
--
DELIMITER $$
CREATE TRIGGER `presensi_id_auto` BEFORE INSERT ON `presensi_siswa` FOR EACH ROW BEGIN
DECLARE id_prs CHAR(6);
DECLARE dig INT;


SET dig = (SELECT SUBSTR(ID_PRESENSI,4,6) AS digit FROM presensi_siswa ORDER by digit DESC LIMIT 1);
SET id_prs  = (SELECT presensi_id_auto(dig));


IF(NEW.ID_PRESENSI IS NULL OR NEW.ID_PRESENSI = "")THEN SET NEW.ID_PRESENSI = id_prs;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `ID_RUANG` int(11) NOT NULL,
  `NAMA_RUANG` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`ID_RUANG`, `NAMA_RUANG`) VALUES
(1, 'Ruang 101'),
(2, 'Ruang 102');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NO_INDUK` varchar(13) NOT NULL,
  `ID_BIMBINGAN` varchar(9) NOT NULL,
  `ID_KELAS` varchar(5) NOT NULL,
  `NAMA_SISWA` varchar(50) NOT NULL,
  `ALAMAT_SISWA` varchar(60) NOT NULL,
  `TGL_LAHIR_SISWA` date NOT NULL,
  `JK_SISWA` varchar(13) NOT NULL,
  `TELP_SISWA` varchar(13) NOT NULL,
  `ASAL_SEKOLAH` varchar(20) NOT NULL,
  `STATUS_SISWA` varchar(1) NOT NULL,
  `PASSWORD_SISWA` varchar(12) NOT NULL,
  `EMAIL_SISWA` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NO_INDUK`, `ID_BIMBINGAN`, `ID_KELAS`, `NAMA_SISWA`, `ALAMAT_SISWA`, `TGL_LAHIR_SISWA`, `JK_SISWA`, `TELP_SISWA`, `ASAL_SEKOLAH`, `STATUS_SISWA`, `PASSWORD_SISWA`, `EMAIL_SISWA`) VALUES
('23411', 'bim01', 'Kel04', 'lisa', 'jl.duku', '2000-11-22', 'perempuan', '082245503325', 'SMA 2 NGAWI', '0', 'liisa123', 'lisa@gmail.com'),
('23412', 'bim01', 'Kel02', 'vanila', 'jl.rambutan', '2000-11-22', 'perempuan', '082314213543', 'SMA 2 NGAWI', '0', 'vanila123', 'vanila@gmail.com'),
('23413', 'bim01', 'Kel03', 'Coco', 'jl.mawar', '2000-01-17', 'laki-laki', '082314213512', 'SMA 1 NGAWI', '0', 'coco12', 'coco@gmail.com'),
('23414', 'bim01', 'Kel05', 'jennie', 'jl.kucing', '2000-03-02', 'perempuan', '0822455033986', 'SMA 2 NGAWI', '0', 'jennie123', 'jennie@gmail.com'),
('23415', 'bim01', 'Kel01', 'lily', 'widodaren, ngawi', '0000-00-00', 'perempuan', '082245503491', 'SMA 2 NGAWI', '0', 'lily123', 'lily@gmail.com'),
('23416', 'bim01', 'Kel06', 'linda', 'jl.melati', '2000-09-26', 'perempuan', '082314213123', 'SMA 1 NGAWI', '0', 'linda123', 'linda@gmail.com'),
('23417', 'bim01', 'Kel01', 'loly', 'jl.rambutan', '2000-01-01', 'perempuan', '082314213543', 'SMA 1 NGAWI', '0', 'loly123', 'loly@gmail.com'),
('23418', 'bim01', 'Kel02', 'roby', 'jl.mawar', '2000-08-17', 'laki-laki', '082314213512', 'SMA 2 NGAWI', '0', 'roby123', 'roby@gmail.com'),
('23419', 'bim01', 'Kel03', 'rahmat', 'jl.melati', '2000-10-27', 'laki-laki', '082314213543', 'SMA 1 NGAWI', '0', 'rahmat123', 'rahmat@gmail.com'),
('23420', 'bim01', 'Kel04', 'rio', 'jl.melati', '2000-12-25', 'laki-laki', '082314213512', 'SMA 2 NGAWI', '0', 'rio123', 'rio@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `skala_nilai`
--

CREATE TABLE `skala_nilai` (
  `KODE_NILAI` varchar(2) NOT NULL,
  `RANGE_NILAI` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skala_nilai`
--

INSERT INTO `skala_nilai` (`KODE_NILAI`, `RANGE_NILAI`) VALUES
('A', '85 - 100'),
('B', '75 - 84');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_JABATAN`);

--
-- Indexes for table `jadwal_les`
--
ALTER TABLE `jadwal_les`
  ADD PRIMARY KEY (`ID_JADWAL`),
  ADD UNIQUE KEY `fk_mapel` (`ID_MAPEL`),
  ADD UNIQUE KEY `fk_pegawai` (`ID_PEGAWAI`),
  ADD UNIQUE KEY `fk_kelas` (`ID_KELAS`),
  ADD UNIQUE KEY `fk_ruang` (`ID_RUANG`);

--
-- Indexes for table `jenis_bimbingan`
--
ALTER TABLE `jenis_bimbingan`
  ADD PRIMARY KEY (`ID_BIMBINGAN`);

--
-- Indexes for table `jenis_ujian`
--
ALTER TABLE `jenis_ujian`
  ADD PRIMARY KEY (`ID_UJIAN`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID_KELAS`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`ID_MAPEL`),
  ADD KEY `FK_MENGAJAR` (`ID_PEGAWAI`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`ID_NILAI`),
  ADD KEY `FK_BERISI` (`KODE_NILAI`),
  ADD KEY `FK_DIISI` (`ID_UJIAN`),
  ADD KEY `FK_DIMASUKKAN` (`ID_MAPEL`),
  ADD KEY `FK_MENDAPAT` (`NO_INDUK`),
  ADD KEY `FK_UNTUK` (`ID_KELAS`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`ID_PEGAWAI`),
  ADD KEY `FK_MEMILIKI` (`ID_JABATAN`);

--
-- Indexes for table `periode_bulan`
--
ALTER TABLE `periode_bulan`
  ADD PRIMARY KEY (`ID_BULAN`);

--
-- Indexes for table `presensi_siswa`
--
ALTER TABLE `presensi_siswa`
  ADD PRIMARY KEY (`ID_PRESENSI`),
  ADD KEY `NO_INDUK` (`NO_INDUK`) USING BTREE;

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ID_RUANG`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NO_INDUK`),
  ADD KEY `FK_BERANGGOTAKAN` (`ID_KELAS`),
  ADD KEY `FK_BERDASARKAN` (`ID_BIMBINGAN`);

--
-- Indexes for table `skala_nilai`
--
ALTER TABLE `skala_nilai`
  ADD PRIMARY KEY (`KODE_NILAI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_les`
--
ALTER TABLE `jadwal_les`
  MODIFY `ID_JADWAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `ID_NILAI` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `ID_RUANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD CONSTRAINT `FK_MENGAJAR` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);

--
-- Constraints for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD CONSTRAINT `FK_BERISI` FOREIGN KEY (`KODE_NILAI`) REFERENCES `skala_nilai` (`KODE_NILAI`),
  ADD CONSTRAINT `FK_DIISI` FOREIGN KEY (`ID_UJIAN`) REFERENCES `jenis_ujian` (`ID_UJIAN`),
  ADD CONSTRAINT `FK_DIMASUKKAN` FOREIGN KEY (`ID_MAPEL`) REFERENCES `mata_pelajaran` (`ID_MAPEL`),
  ADD CONSTRAINT `FK_MENDAPAT` FOREIGN KEY (`NO_INDUK`) REFERENCES `siswa` (`NO_INDUK`),
  ADD CONSTRAINT `FK_UNTUK` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_JABATAN`) REFERENCES `jabatan` (`ID_JABATAN`);

--
-- Constraints for table `presensi_siswa`
--
ALTER TABLE `presensi_siswa`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`NO_INDUK`) REFERENCES `siswa` (`NO_INDUK`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_BERANGGOTAKAN` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`),
  ADD CONSTRAINT `FK_BERDASARKAN` FOREIGN KEY (`ID_BIMBINGAN`) REFERENCES `jenis_bimbingan` (`ID_BIMBINGAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
