-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2026 at 06:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `kd_barang` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `barang` varchar(255) DEFAULT NULL,
  `pengirim` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `daerah` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `notif_read` tinyint(1) DEFAULT 0,
  `tracking_status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`kd_barang`, `jumlah`, `keterangan`, `barang`, `pengirim`, `gambar`, `daerah`, `status`, `notif_read`, `tracking_status`, `created_at`, `updated_at`) VALUES
(8, 28, 'baju dengan berbagai ukuran untuk perempuan', 'Baju', 'Bernadette Aster Masdah Ngati Sinaga', '1779267959.png', 'Blimbing', 1, 1, 'pending', '2026-05-20 17:59:53', '2026-05-21 03:18:34'),
(13, 40, 'Berbagai baju dan kemeja untuk perempuan dan laki-laki', 'baju dan celana', 'Chesilia Simanjuntak', '1779331204.png', 'Klojen', 1, 1, 'pending', '2026-05-21 02:40:05', '2026-05-21 02:50:05'),
(14, 20, 'Baju dan celana anak berbagai macam untuk perempupan dan laki-laki', 'baju dan celana', 'Reisya El-adzkiya', '1779332179.png', 'Kedungkandang', 1, 0, 'pending', '2026-05-21 02:56:19', '2026-05-21 02:56:19'),
(15, 4, 'baju berbagai macam', 'Baju', 'Bernadette Aster Masdah Ngati Sinaga', '1779333624.png', 'Sukun', 1, 1, 'pending', '2026-05-21 03:20:24', '2026-05-21 03:20:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`kd_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
