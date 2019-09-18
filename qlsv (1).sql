-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 07:04 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qlsv`
--

-- --------------------------------------------------------

--
-- Table structure for table `diem`
--

CREATE TABLE IF NOT EXISTS `diem` (
`Id` int(11) NOT NULL,
  `MSSV` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `MaMH` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `IdHocKy` int(11) NOT NULL,
  `DiemGK` int(11) DEFAULT NULL,
  `DiemCK` int(11) DEFAULT NULL,
  `ThangDiem10` float NOT NULL,
  `ThangDiem4` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diem`
--

INSERT INTO `diem` (`Id`, `MSSV`, `MaMH`, `IdHocKy`, `DiemGK`, `DiemCK`, `ThangDiem10`, `ThangDiem4`) VALUES
(1, '1651010012', 'LTCSDL', 1, 8, 9, 10, 4),
(2, '1651010012', 'LTGD', 1, 10, 10, 10, 4),
(3, '1651010012', 'LTHDT', 1, 10, 10, 10, 4),
(4, '1651010012', 'MMT', 1, 10, 10, 10, 4),
(5, '1651010012', 'PTTKHT', 1, 10, 10, 10, 4),
(6, '1651010022', 'LTCSDL', 1, 9, 10, 10, 4),
(7, '1651010022', 'LTGD', 1, 10, 10, 10, 4),
(8, '1651010022', 'LTHDT', 1, 9, 9, 10, 4),
(9, '1651010022', 'MMT', 1, 9, 9, 10, 4),
(10, '1651010022', 'PTTKHT', 1, 9, 9, 10, 4),
(11, '1651010063', 'LTCSDL', 1, 10, 10, 10, 4),
(12, '1651010063', 'LTGD', 1, 10, 10, 10, 3.9),
(13, '1651010063', 'LTHDT', 1, 10, 10, 10, 4),
(14, '1651010063', 'MMT', 1, 10, 10, 10, 4),
(15, '1651010063', 'PTTKHT', 1, 10, 10, 10, 4),
(16, '1651012098', 'LTCSDL', 1, 10, 10, 10, 4),
(17, '1651012098', 'LTGD', 1, 10, 10, 10, 4),
(18, '1651012098', 'LTHDT', 1, 10, 10, 10, 4),
(19, '1651012098', 'MMT', 1, 10, 10, 10, 4),
(20, '1651012098', 'PTTKHT', 1, 10, 10, 10, 4),
(23, '1651010023', 'LTCSDL', 1, 5, 5, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE IF NOT EXISTS `giangvien` (
  `MaGV` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `HoLot` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgaySinh` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QueQuan` longtext COLLATE utf8_unicode_ci,
  `MatKhau` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NhomTK` int(11) NOT NULL,
  `avatarGv` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`MaGV`, `HoLot`, `Ten`, `NgaySinh`, `GioiTinh`, `Email`, `QueQuan`, `MatKhau`, `NhomTK`, `avatarGv`) VALUES
('113', 'Đỗ Duy', 'An', '15-02-1992', 1, 'an1101865@student.ctu.edu.vn', 'Tphcm', '123456', 1, 'avatardf.png'),
('115', 'Lê Ngọc', 'Quý', '12-12-1998', 0, '0954231065', 'TPHCM', '115', 1, 'avatardf.png');

-- --------------------------------------------------------

--
-- Table structure for table `hocky`
--

CREATE TABLE IF NOT EXISTS `hocky` (
`id_hoc_ky` int(11) NOT NULL,
  `ten_hoc_ky` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NamHoc` year(4) NOT NULL,
  `malop` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocky`
--

INSERT INTO `hocky` (`id_hoc_ky`, `ten_hoc_ky`, `NamHoc`, `malop`) VALUES
(1, 'Học Kỳ 1', 2018, 'DH16TH61'),
(2, 'Học Kỳ 3', 2019, 'DH16TH61'),
(3, 'Học Kỳ 3', 2016, 'DH16TK62'),
(4, 'Học Kỳ 1', 2017, 'DH16TK63'),
(5, 'Học Kỳ 2', 2017, 'DH16TK62');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE IF NOT EXISTS `khoa` (
`MaKhoa` int(11) NOT NULL,
  `TenKhoa` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`MaKhoa`, `TenKhoa`) VALUES
(1, 'Công Nghệ Thông Tin'),
(7, 'Luật');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE IF NOT EXISTS `lop` (
  `MaLop` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `TenLop` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `MaKhoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`MaLop`, `TenLop`, `MaKhoa`) VALUES
('DH16TH61', 'Khoa học máy tính', 1),
('DH16TH62', 'Khoa học máy tính', 1),
('DH16TH63', 'Khoa học máy tính', 1),
('DH16TH64', 'Khoa học máy tính', 1),
('DH16TK61', 'Hệ thống thông tin quản lý', 1),
('DH16TK62', 'Hệ thống thông tin quản lý', 1),
('DH16TK63', 'Hệ thống thông tin quản lý', 1),
('DH16TK64', 'Hệ thống thông tin quản lý', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE IF NOT EXISTS `monhoc` (
  `MaMH` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `TenMH` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `SoTinChi` int(11) NOT NULL,
  `hocky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`MaMH`, `TenMH`, `SoTinChi`, `hocky`) VALUES
('asdfff', 'asd', 3, 4),
('fasdfasd', 'asdfasdf', 3, 1),
('LTCSDL', 'Lập trình cơ sở dữ liệu', 4, 1),
('LTGD', 'Lập trình giao diện', 4, 1),
('LTHDT', 'Lập trình hướng đối tượng', 4, 1),
('MMT', 'Mạng máy tính', 4, 1),
('PTTKHT', 'Phân tích thiết kế hệ thống', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE IF NOT EXISTS `sinhvien` (
  `MSSV` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `TenSV` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `MaLop` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `MaKhoa` int(11) NOT NULL,
  `NgaySinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QueQuan` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NhomTK` int(11) DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`MSSV`, `TenSV`, `MaLop`, `MaKhoa`, `NgaySinh`, `QueQuan`, `MatKhau`, `NhomTK`, `avatar`) VALUES
('1651010012', 'Nguyễn Trưởng Giả', 'DH16TH62', 1, '12/3/1998', 'Đồng Nai', 'efe44260d49ca0f8', 0, ''),
('1651010022', 'Sử Huy Cường', 'DH16TH63', 1, '1998-03-06', 'Bến Tre', '123456', 0, 'avatardf.png'),
('1651010023', 'asd', 'DH16TH61', 1, '3/9/1999', NULL, 'fe6704afa1443789', 0, 'avatardf.png'),
('1651010063', 'Nguyễn Thái Hòa', 'DH16TH63', 1, '1998-07-06', 'Bảo Lộc', '123456', 0, 'hoa.jpg'),
('1651012098', 'Mai Hoàng Linh', 'DH16TH63', 1, '1998-07-21', 'TP HCM', '123456', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE IF NOT EXISTS `tai_khoan` (
  `id_tai_khoan` int(11) NOT NULL,
  `nhom_tai_khoan` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`id_tai_khoan`, `nhom_tai_khoan`) VALUES
(0, 0),
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diem`
--
ALTER TABLE `diem`
 ADD PRIMARY KEY (`Id`), ADD KEY `diem_ibfk_3` (`IdHocKy`), ADD KEY `diem_ibfk_1` (`MSSV`), ADD KEY `diem_ibfk_2` (`MaMH`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
 ADD PRIMARY KEY (`MaGV`), ADD KEY `NhomTK` (`NhomTK`);

--
-- Indexes for table `hocky`
--
ALTER TABLE `hocky`
 ADD PRIMARY KEY (`id_hoc_ky`), ADD KEY `malop` (`malop`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
 ADD PRIMARY KEY (`MaKhoa`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
 ADD PRIMARY KEY (`MaLop`), ADD KEY `MaKhoa` (`MaKhoa`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
 ADD PRIMARY KEY (`MaMH`), ADD KEY `hocky` (`hocky`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
 ADD PRIMARY KEY (`MSSV`), ADD KEY `MaLop` (`MaLop`), ADD KEY `NhomTK` (`NhomTK`), ADD KEY `MaKhoa` (`MaKhoa`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
 ADD PRIMARY KEY (`id_tai_khoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diem`
--
ALTER TABLE `diem`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `hocky`
--
ALTER TABLE `hocky`
MODIFY `id_hoc_ky` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
MODIFY `MaKhoa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `diem`
--
ALTER TABLE `diem`
ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`),
ADD CONSTRAINT `diem_ibfk_2` FOREIGN KEY (`MaMH`) REFERENCES `monhoc` (`MaMH`),
ADD CONSTRAINT `diem_ibfk_3` FOREIGN KEY (`IdHocKy`) REFERENCES `hocky` (`id_hoc_ky`);

--
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`NhomTK`) REFERENCES `tai_khoan` (`id_tai_khoan`);

--
-- Constraints for table `hocky`
--
ALTER TABLE `hocky`
ADD CONSTRAINT `hocky_ibfk_1` FOREIGN KEY (`malop`) REFERENCES `lop` (`MaLop`);

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`MaKhoa`) REFERENCES `khoa` (`MaKhoa`);

--
-- Constraints for table `monhoc`
--
ALTER TABLE `monhoc`
ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`hocky`) REFERENCES `hocky` (`id_hoc_ky`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
ADD CONSTRAINT `sinhvien_ibfk_2` FOREIGN KEY (`MaLop`) REFERENCES `lop` (`MaLop`),
ADD CONSTRAINT `sinhvien_ibfk_3` FOREIGN KEY (`NhomTK`) REFERENCES `tai_khoan` (`id_tai_khoan`),
ADD CONSTRAINT `sinhvien_ibfk_4` FOREIGN KEY (`MaKhoa`) REFERENCES `khoa` (`MaKhoa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
