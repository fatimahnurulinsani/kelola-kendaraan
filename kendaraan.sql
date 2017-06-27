-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 07:11 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `garasi`
--

CREATE TABLE `garasi` (
  `id_garasi` int(11) NOT NULL,
  `jenis_garasi` varchar(30) NOT NULL,
  `no_garasi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `garasi`
--

INSERT INTO `garasi` (`id_garasi`, `jenis_garasi`, `no_garasi`) VALUES
(1, 'Garasi Utama', '01'),
(2, 'Garasi Tengah', '02'),
(3, 'Garasi Belakang Gudang', '03');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `no_mesin` varchar(30) NOT NULL,
  `no_rangka` varchar(30) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  `merk` varchar(15) NOT NULL,
  `jenis_kendaraan` varchar(30) NOT NULL,
  `id_garasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `no_mesin`, `no_rangka`, `no_polisi`, `merk`, `jenis_kendaraan`, `id_garasi`) VALUES
(1, '909878797897', '7897867576788', 'D7878JK', 'Avanza', 'MOBIL', 2),
(2, '689687987897987', '4765765778678', 'D68768J', 'Toyota', 'MOBIL', 1),
(3, '7987979787898868', '7678678687676786', 'D86786H', 'Avanza', 'Mobil', 2),
(4, '768686868878967', '57578686786786', 'D798798E', 'Avanza', 'Mobil', 1),
(5, '68968687897897897', '86786878678678678', 'D789789T', 'Honda', 'Motor', 2),
(6, '698798765767', '56756757867867', 'H68798F', 'Honda TEST', 'Motor', 2),
(8, '69878786786897986', '76787565746546546', 'D687D', 'Suzuki', 'Mobil', 1),
(10, '4347656756754', '353453564646', 'D5767F', 'Hyundai', 'Mobil', 2),
(11, '545624614364356245', '35435435645645', 'B67678D', 'Honda', 'Motor', 2),
(12, '7686897987978', '575757867', 'B5767Q', 'Toyota', 'Mobil', 2),
(13, '5761533265362565', '456465757678', 'D89797F', 'Honda', 'Motor', 1),
(14, '9797986868676', '566456567576', 'F8797D', 'Kawasaki', 'Motor', 1),
(20, '11112222333', '8979878978789789', '8979878978', 'Toyota', 'Motor', 2),
(21, 'uy88686687687', '9808809', '9808809', 'Avanza', 'Mobil Bagus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `password`, `hak_akses`, `no_hp`) VALUES
(1, 'fatimah', '3610528e7fee68c6ffb0445603ef2c8e', 'owner', '085746355464'),
(2, 'arif jombs', '0ff6c3ace16359e41e37d40b8301d67f', 'operator', '083746355253'),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', 'operator', '08978769');

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE `supir` (
  `id_supir` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`id_supir`, `kode`, `nama`, `no_ktp`, `no_hp`, `alamat`) VALUES
(1, '001', 'Jajang Nurjaman', '98786878978979', '08766576576', 'jln kircon no. 17'),
(2, '002', 'Dika Pratama', '876768789789', '086756576576', 'Jl. Antasari 3 No. 17'),
(4, '003', 'Fahmi', '688789789798', '0876776767', 'Jl. alallaa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `id_supir` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `status`, `id_kendaraan`, `id_supir`, `kode`) VALUES
(15, '2017-02-15 13:22:00', 'KELUAR', 20, 1, 'JAJ06446'),
(16, '2017-06-01 00:00:00', 'MASUK', 20, 1, 'JAJ45842'),
(17, '2017-06-28 00:00:00', 'MASUK', 20, 1, 'JAJ67108'),
(18, '2017-06-07 10:10:00', 'MASUK', 20, 1, 'JAJ75339'),
(19, '2017-06-08 10:13:00', 'MASUK', 20, 1, 'JAJ86910'),
(20, '2017-06-28 01:18:00', 'KELUAR', 14, 2, 'DIK70836');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `garasi`
--
ALTER TABLE `garasi`
  ADD PRIMARY KEY (`id_garasi`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id_supir`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `garasi`
--
ALTER TABLE `garasi`
  MODIFY `id_garasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supir`
--
ALTER TABLE `supir`
  MODIFY `id_supir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
