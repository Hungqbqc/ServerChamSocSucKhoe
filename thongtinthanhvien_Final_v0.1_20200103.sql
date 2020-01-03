-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2020 at 04:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chamsocsuckhoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `thongtinthanhvien`
--

CREATE TABLE `thongtinthanhvien` (
  `Id` int(11) NOT NULL,
  `ChuTaiKhoan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ChucDanh` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `GioiTinh` bit(1) NOT NULL DEFAULT b'0',
  `NgaySinh` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChieuCao` int(11) NOT NULL DEFAULT 0,
  `CanNang` int(11) NOT NULL DEFAULT 0,
  `MucDoHoatDong` int(11) NOT NULL DEFAULT 1,
  `TongNangLuong` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongtinthanhvien`
--

INSERT INTO `thongtinthanhvien` (`Id`, `ChuTaiKhoan`, `ChucDanh`, `GioiTinh`, `NgaySinh`, `ChieuCao`, `CanNang`, `MucDoHoatDong`, `TongNangLuong`) VALUES
(115, 'anh.ntn150221@sis.hust.edu.vn', 'Tôi', b'1', '19970415', 162, 46, 2, 1753),
(117, 'anh.ntn150221@sis.hust.edu.vn', 'Bố', b'0', NULL, 0, 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thongtinthanhvien`
--
ALTER TABLE `thongtinthanhvien`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `TaiKhoan_ThonTinThanhVien` (`ChuTaiKhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thongtinthanhvien`
--
ALTER TABLE `thongtinthanhvien`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `thongtinthanhvien`
--
ALTER TABLE `thongtinthanhvien`
  ADD CONSTRAINT `TaiKhoan_ThonTinThanhVien` FOREIGN KEY (`ChuTaiKhoan`) REFERENCES `taikhoan` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
