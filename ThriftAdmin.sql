-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2024 at 02:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ThriftAdmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `nama`, `username`, `email`, `password`) VALUES
(1, 'Baskoro', 'bashkoro', 'baskoro.baruno@gmail.com', '1234'),
(2, 'bas', 'cloro', 'bavs359@gmail.com', 'bash');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barangID` int(11) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barangID`, `jenis_barang`, `Nama`, `Stock`, `Harga`) VALUES
(1, 'Celana', 'Celana Kulit', 200, 300000),
(2, 'Kaos', 'Kaos Hitam', 15, 250000),
(3, 'Kaos', 'Kaos Polos', 10, 300000),
(4, 'Kaos', 'Kaos Strip', 30, 75000),
(5, 'Kaos', 'Kaos Lengan Panjang', 12, 200000),
(6, 'Sweater', 'Sweater Abu-abu', 18, 180000),
(7, 'Sweater', 'Sweater Merah', 8, 220000),
(8, 'Sweater', 'Sweater Rajut', 5, 500000),
(9, 'Sweater', 'Sweater Hoodie', 25, 120000),
(11, 'Rok', 'Rok Mini', 40, 350000),
(12, 'Rok', 'Rok Panjang', 20, 200000),
(13, 'Rok', 'Rok Plisket', 15, 400000),
(14, 'Rok', 'Rok A-Line', 30, 75000),
(15, 'Rok', 'Rok Denim', 12, 200000),
(16, 'Dress', 'Dress Hitam', 8, 500000),
(17, 'Dress', 'Dress Floral', 25, 500000),
(18, 'Dress', 'Dress Maxi', 30, 300000),
(19, 'Dress', 'Dress Bodycon', 15, 250000),
(20, 'Dress', 'Dress Off-Shoulder', 50, 80000),
(21, 'Celana', 'Celana Jeans', 10, 400000),
(22, 'Celana', 'Celana Panjang', 20, 150000),
(23, 'Celana', 'Celana Kulot', 18, 200000),
(24, 'Celana', 'Celana Cargo', 12, 180000),
(25, 'Celana', 'Celana Jogger', 15, 150000),
(26, 'Jaket', 'Jaket Denim', 5, 450000),
(27, 'Jaket', 'Jaket Bomber', 8, 120000),
(28, 'Jaket', 'Jaket Kulit', 10, 100000),
(29, 'Jaket', 'Jaket Parka', 20, 180000),
(30, 'Jaket', 'Jaket Hujan', 25, 90000),
(33, 'Sepatu', 'Sepatu Skate', 20, 200000),
(35, 'Sepatu', 'Sepatu Kulit Lembu', 30, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `kasirID` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`kasirID`, `Nama`, `Alamat`, `Telepon`, `email`, `gender`, `tgl_lahir`) VALUES
(1, 'Budi Santoso', 'JALAN SEMAR II NO 79', '087654321234', 'budisantoso@gmail.com', 'Laki-Laki', '1990-05-15'),
(2, 'Ani Suryani', 'Jl. Kebon Jeruk No. 456', '082345678901', 'anisuryani@gmail.com', 'Perempuan', '1992-08-20'),
(3, 'Maman Sukmana', 'Jl. Sudirman No. 789', '083456789012', 'mamansukmana@gmail.com', 'Laki-laki', '1988-03-10'),
(4, 'Ratna Wulandari', 'Jl. Gatot Subroto No. 321', '084567890123', 'ratnawulandari@gmail.com', 'Perempuan', '1995-11-25'),
(5, 'Dedi Cahyono', 'Jl. Diponegoro No. 654', '085678901234', 'dedicahyono@gmail.com', 'Laki-laki', '1991-07-05'),
(6, 'Siti Rahmawati', 'Jl. Hayam Wuruk No. 987', '086789012345', 'sitirahmawati@gmail.com', 'Perempuan', '1993-09-12'),
(7, 'Surya Pranata', 'Jl. Thamrin No. 135', '087890123456', 'suryapranata@gmail.com', 'Laki-laki', '1989-02-18'),
(8, 'Rina Sari', 'Jl. Ahmad Yani No. 864', '088901234567', 'rinasari@gmail.com', 'Perempuan', '1994-12-08'),
(9, 'Siapa kamu', 'JALAN SEMAR II NO 79', '09876543213456', 'dhaniteguh@gmail.com', 'Laki-Laki', '1996-06-30'),
(10, 'Siti Rahmawati', 'Jl. Pahlawan No. 246', '089123456789', 'sitirahmawati@gmail.com', 'Perempuan', '1990-04-14'),
(11, 'Agus Santoso', 'Jl. Veteran No. 753', '081234567890', 'agussantoso@gmail.com', 'Laki-laki', '1992-08-19'),
(12, 'Ratna Setiawati', 'Jl. Cikini No. 468', '082345678901', 'ratnasetiawati@gmail.com', 'Perempuan', '1988-03-05'),
(13, 'Andrew Thompson', 'Jl. Gajah Mada No. 791', '083456789012', 'andrewthompson@gmail.com', 'Laki-laki', '1995-11-23'),
(14, 'Mia Lewis', 'Jl. Kemang No. 312', '084567890123', 'mialewis@gmail.com', 'Perempuan', '1991-07-03'),
(15, 'James Walker', 'Jl. Asia Afrika No. 645', '085678901234', 'jameswalker@gmail.com', 'Laki-laki', '1993-09-10'),
(17, 'Siapa kamu', 'Jl Sama Ayank', '08123456789', 'bash@gmail.com', 'Perempuan', '2024-01-17'),
(18, 'Baru No', 'JALAN SEMAR II NO 79', '09876543456', 'obas5365@gmail.com', 'Laki-Laki', '2024-01-18'),
(19, 'Baskoro Bayu Baruno ', 'JALAN SEMAR II NO 79', '98765434567', 'baskoro.bayu.baruno.tik22@mhsw.pnj.ac.id', 'Laki-Laki', '2024-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksiID` int(11) NOT NULL,
  `barangID` int(11) NOT NULL,
  `kasirID` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `Nama_barang` varchar(50) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksiID`, `barangID`, `kasirID`, `tgl_transaksi`, `Nama_barang`, `harga_barang`, `kuantitas`, `Total`) VALUES
(1, 1, 11, '2021-01-13', 'Celana Kulit', 250000, 2, 500000),
(2, 1, 2, '2020-01-19', 'Celana Kulit', 300000, 2, 600000),
(3, 1, 1, '2022-01-01', 'Celana Kulit', 300000, 1, 300000),
(4, 1, 13, '2022-01-02', 'Celana Kulit', 300000, 3, 900000),
(5, 1, 18, '2022-01-03', 'Celana Kulit', 300000, 2, 600000),
(6, 21, 14, '2022-01-06', 'Celana Jeans', 400000, 1, 400000),
(7, 21, 7, '2022-01-07', 'Celana Jeans', 400000, 1, 400000),
(8, 21, 4, '2022-01-07', 'Celana Jeans', 400000, 1, 400000),
(9, 21, 18, '2022-01-09', 'Celana Jeans', 400000, 2, 800000),
(10, 21, 11, '2022-01-07', 'Celana Jeans', 400000, 5, 2000000),
(11, 2, 6, '2022-01-11', 'Kaos Hitam', 250000, 1, 250000),
(12, 2, 4, '2022-01-12', 'Kaos Hitam', 250000, 1, 250000),
(13, 2, 11, '2022-01-13', 'Kaos Hitam', 250000, 1, 250000),
(14, 20, 2, '2022-01-14', 'Dress Off-Shoulder	', 80000, 3, 320000),
(15, 20, 11, '2022-01-15', 'Dress Off-Shoulder	', 80000, 1, 80000),
(17, 1, 11, '2022-02-09', 'Celana Kulit', 300000, 1, 300000),
(18, 1, 11, '2024-01-17', 'Celana Kulit', 300000, 8, 2400000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barangID`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`kasirID`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksiID`),
  ADD KEY `BarangFK` (`barangID`),
  ADD KEY `kasirFK` (`kasirID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barangID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `kasirID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `BarangFK` FOREIGN KEY (`barangID`) REFERENCES `barang` (`barangID`),
  ADD CONSTRAINT `kasir` FOREIGN KEY (`kasirID`) REFERENCES `kasir` (`kasirID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
