-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 02:29 AM
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
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(50) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL DEFAULT current_timestamp(),
  `qty` int(50) NOT NULL,
  `harga_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_barang`, `nama_barang`, `tgl_transaksi`, `qty`, `harga_satuan`) VALUES
(16, 'DHE0008', 'Pensil Fabercastell', '2022-04-06', 3, '2500'),
(17, 'FJR003', 'Chitato', '2022-04-06', 10, '3000'),
(18, 'FJR0001', 'Torpedo', '2022-04-06', 3, '1000'),
(19, 'FJR0002', 'Fruit Tea', '2022-04-06', 5, '5000'),
(20, 'WDY0009', 'Penggaris Besi', '2022-04-06', 10, '7250'),
(21, 'FJR003', 'Chitato', '2022-04-06', 3, '3000'),
(22, 'RFN0004', 'Pulpen', '2022-04-06', 2, '5000');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `tambah_transaksi` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
 
UPDATE jual SET stok = stok - NEW.qty
 
WHERE id_barang = NEW.id_barang;
 
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
