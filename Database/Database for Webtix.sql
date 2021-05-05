-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 04:54 PM
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
-- Database: `tabelo`
--

-- --------------------------------------------------------

--
-- Table structure for table `bioskop`
--

CREATE TABLE `bioskop` (
  `IDBioskop` int(8) NOT NULL,
  `NamaBioskop` varchar(32) NOT NULL,
  `Alamat` varchar(64) NOT NULL,
  `JumlahRuang` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bioskop`
--

INSERT INTO `bioskop` (`IDBioskop`, `NamaBioskop`, `Alamat`, `JumlahRuang`) VALUES
(1001, 'Bioskop 1', 'Banda Aceh', 5);

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `IDFilm` int(11) NOT NULL,
  `NamaFilm` char(32) NOT NULL,
  `Durasi` int(3) NOT NULL,
  `RatingUmur` char(16) NOT NULL,
  `Sinopsis` text NOT NULL,
  `poster` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`IDFilm`, `NamaFilm`, `Durasi`, `RatingUmur`, `Sinopsis`, `poster`) VALUES
(1, 'Avenger Endgame', 128, 'Semua Umur', 'Film Seru udah nonton aja', ''),
(2, 'Shazam', 116, 'Semua Umur', 'Film seru udah nonton aja', '');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `IDJadwal` int(8) NOT NULL,
  `IDBioskop` int(8) NOT NULL,
  `IDFilm` int(8) NOT NULL,
  `Ruangan` int(8) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `IDLaporan` int(8) NOT NULL,
  `IDFilm` int(8) NOT NULL,
  `JumlahPenonton` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `IDManager` int(8) NOT NULL,
  `IDUser` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `IDOrder` int(8) NOT NULL,
  `IDUser` int(8) NOT NULL,
  `IDFilm` int(8) NOT NULL,
  `IDJadwal` int(8) NOT NULL,
  `Status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `IDStaff` int(8) NOT NULL,
  `IDUser` int(8) NOT NULL,
  `username` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IDUser` int(8) NOT NULL,
  `Username` varchar(16) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Nama` varchar(32) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `HP` char(12) NOT NULL,
  `TipeUser` enum('admin','manager','user') NOT NULL,
  `Tanggal_Lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDUser`, `Username`, `Password`, `Nama`, `Email`, `HP`, `TipeUser`, `Tanggal_Lahir`) VALUES
(1, 'admin1', 'admin1', 'Pieter Edward Riwu', 'pieterbaik@gmail.com', '025247596345', 'admin', '2020-12-20'),
(2, 'admin2', 'admin2', 'Hauzan Botak', 'HauzanBotak@gmail.com', 'nomorhp', 'admin', '1998-08-17'),
(3, 'admin3', 'admin3', 'Dimas Kanjeng', 'DimasKanjeng@gmail.com', 'nomorhp', 'admin', '2004-03-04'),
(4, 'admin4', 'admin4', 'M T Razaq', 'MTRazaq@gmail.com', 'nomorhp', 'admin', '2004-03-14'),
(5, 'admin5', 'admin5', 'Christian Prasetyo', 'ChristianP@gmail.com', '082249562522', 'admin', '2002-03-13');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `AutoAdd` AFTER INSERT ON `user` FOR EACH ROW INSERT INTO staff VALUES(new.IDUser, new.IDUser)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bioskop`
--
ALTER TABLE `bioskop`
  ADD PRIMARY KEY (`IDBioskop`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`IDFilm`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`IDJadwal`),
  ADD KEY `jadwal_ibfk_1` (`IDBioskop`),
  ADD KEY `IDFilm` (`IDFilm`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`IDLaporan`),
  ADD KEY `IDFilm` (`IDFilm`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`IDManager`),
  ADD KEY `IDUser` (`IDUser`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`IDOrder`),
  ADD KEY `pemesanan_ibfk_1` (`IDFilm`),
  ADD KEY `pemesanan_ibfk_2` (`IDUser`),
  ADD KEY `IDJadwal` (`IDJadwal`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`IDStaff`),
  ADD KEY `IDUser` (`IDUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bioskop`
--
ALTER TABLE `bioskop`
  MODIFY `IDBioskop` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `IDJadwal` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `IDLaporan` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `IDManager` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `IDStaff` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IDUser` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`IDBioskop`) REFERENCES `bioskop` (`IDBioskop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`IDFilm`) REFERENCES `film` (`IDFilm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`IDFilm`) REFERENCES `film` (`IDFilm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`IDFilm`) REFERENCES `film` (`IDFilm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`IDJadwal`) REFERENCES `jadwal` (`IDJadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
