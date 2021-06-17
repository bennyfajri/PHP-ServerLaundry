-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 01:21 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laclaundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `ID_Transaksi` int(11) NOT NULL,
  `ID_Produk` int(11) NOT NULL,
  `ID_Pelanggan` int(11) NOT NULL,
  `Nama_Produk` varchar(50) NOT NULL,
  `Nama_Pelanggan` varchar(50) NOT NULL,
  `Status_Bayar` varchar(50) NOT NULL,
  `Catatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE `laundry` (
  `ID_User` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Nama_Laundry` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laundry`
--

INSERT INTO `laundry` (`ID_User`, `Username`, `Password`, `Alamat`, `Nama_Laundry`) VALUES
(1, 'Benny', 'qweqweqwe', 'Jl. Surau Gadang Ikur Koto', 'Laundry 5 Menit');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_Pelanggan` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Nama_Pelanggan` varchar(50) NOT NULL,
  `NoHP` varchar(15) NOT NULL,
  `Alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID_Pelanggan`, `ID_User`, `Nama_Pelanggan`, `NoHP`, `Alamat`) VALUES
(1, 1, 'Fajri', '082335952153', 'jl. Surau gadang koto panjang'),
(2, 1, 'Mutia', '082345678910', 'Jl Dr Moh Hatta pasar baru');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `ID_Produk` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Jenis` varchar(50) NOT NULL,
  `Nama_Produk` varchar(50) NOT NULL,
  `Harga_Produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`ID_Produk`, `ID_User`, `Jenis`, `Nama_Produk`, `Harga_Produk`) VALUES
(1, 1, 'Kiloan', 'Kilo Ekspress', 7000),
(2, 1, 'Kiloan', 'Kilo Express dan Setrika', 8500),
(3, 1, 'Kiloan', 'Setrika', 4000),
(4, 1, 'Satuan', 'Boneka', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_Transaksi` int(11) NOT NULL,
  `ID_Pelanggan` int(11) NOT NULL,
  `ID_Produk` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Tgl_Masuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `Tgl_Selesai` date NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Metode_Pembayaran` varchar(50) NOT NULL,
  `Jumlah_Harga` int(11) DEFAULT NULL,
  `Total_Dibayar` int(11) DEFAULT NULL,
  `catatan` text NOT NULL,
  `status_pembayaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_Transaksi`, `ID_Pelanggan`, `ID_Produk`, `ID_User`, `Tgl_Masuk`, `Tgl_Selesai`, `Jumlah`, `Metode_Pembayaran`, `Jumlah_Harga`, `Total_Dibayar`, `catatan`, `status_pembayaran`) VALUES
(1, 1, 2, 1, '2021-06-14 14:19:40', '2021-06-16', 0, 'Sekarang', 34000, 35000, '15 helai celana jeans, 3 helai baju kaos', 'Lunas'),
(2, 1, 1, 1, '2021-06-14 14:47:14', '2021-06-16', 0, 'Nanti', 7000, 5000, '4 helai baju kemeja', 'Belum Lunas'),
(15, 1, 4, 1, '2021-06-16 07:27:03', '2021-06-18', 1, 'Nanti', 10000, 10000, '1 boneka chonk', 'Lunas'),
(16, 2, 4, 1, '2021-06-16 07:59:55', '2021-06-18', 2, 'Sekarang', 20000, 20000, '2 buah boneka chonk', 'Lunas'),
(17, 1, 4, 1, '2021-06-16 08:29:28', '2021-06-18', 4, 'Sekarang', 40000, 40000, '4 boneka chonk', 'Lunas'),
(18, 1, 4, 1, '2021-06-16 17:40:23', '2021-06-18', 4, 'Sekarang', 40000, 40000, '4 boneka chonk', 'Lunas'),
(20, 1, 1, 1, '2021-06-05 17:00:00', '2021-06-08', 3, 'Sekarang', 12000, 12000, '5 buah baju kaos', 'Lunas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `ID_Transaksi` (`ID_Transaksi`),
  ADD KEY `ID_Produk` (`ID_Produk`),
  ADD KEY `ID_Pelanggan` (`ID_Pelanggan`);

--
-- Indexes for table `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`ID_User`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_Pelanggan`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ID_Produk`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_Transaksi`),
  ADD KEY `ID_Pelanggan` (`ID_Pelanggan`),
  ADD KEY `ID_Produk` (`ID_Produk`),
  ADD KEY `ID_User` (`ID_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laundry`
--
ALTER TABLE `laundry`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID_Pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `ID_Produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_Transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`ID_Transaksi`) REFERENCES `transaksi` (`ID_Transaksi`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `laundry` (`ID_User`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `laundry` (`ID_User`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `laundry` (`ID_User`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`ID_Pelanggan`) REFERENCES `pelanggan` (`ID_Pelanggan`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`ID_Produk`) REFERENCES `produk` (`ID_Produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
