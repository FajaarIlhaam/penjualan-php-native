-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 01:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(100) NOT NULL,
  `harga` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`id`, `id_barang`, `nama_barang`, `kategori`, `satuan`, `stok`, `harga`) VALUES
(2, 'FJR0002', 'Fruit Tea', 'Minuman', 'PCS', 26, '5000'),
(3, 'FJR003', 'Chitato', 'Snack', 'PCS', 12, '3000'),
(7, 'FJR0001', 'Torpedo', 'Minuman', 'PCS', 88, '1000'),
(8, 'SHM0001', 'Indomie kari ayam', 'Makanan', 'PCS', 33, '4500'),
(9, 'RFN0004', 'Pulpen', 'ATK', 'PCS', 58, '5000'),
(10, 'DHE0008', 'Pensil Fabercastell', 'ATK', 'PCS', 32, '2500'),
(11, 'WDY0009', 'Penggaris Besi', 'ATK', 'PCS', 48, '7250');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(50) NOT NULL,
  `nama_transaksi` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL DEFAULT current_timestamp(),
  `qty` int(50) NOT NULL,
  `harga_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_transaksi`, `nama_barang`, `tgl_transaksi`, `qty`, `harga_satuan`) VALUES
(54, 'Fajar Ilham', 'Fruit Tea', '2022-04-13', 10, '5000'),
(55, 'Shammy Zafran', 'Penggaris Besi', '2022-04-13', 25, '7250'),
(56, 'Refni ', 'Torpedo', '2022-04-13', 2, '1000'),
(57, 'Fajar Ilham', 'Pensil Fabercastell', '2022-04-13', 5, '2500'),
(58, 'Dhea Amelinda', 'Chitato', '2022-04-13', 8, '3000'),
(59, 'Windy', 'Indomie kari ayam', '2022-04-13', 1, '4500');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `tambah_transaksi` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
 
UPDATE jual SET stok = stok - NEW.qty
 
WHERE nama_barang = NEW.nama_barang;
 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '7bedc9fd30769590c992b8f7f23738f7'),
(13, 'fazard', '802e73f6850b1ca10c27b5304efe27b8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_barang` (`id_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
