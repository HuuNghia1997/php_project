-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 01:55 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlynhansu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `PassWord` varchar(255) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `SDT` int(10) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `GioiTinh` varchar(3) NOT NULL,
  `NgaySinh` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `TaiKhoan`, `PassWord`, `HoTen`, `SDT`, `DiaChi`, `GioiTinh`, `NgaySinh`, `Email`, `Avatar`) VALUES
(1, 'admin', '123456', 'Tran Van SOn', 98765, '12 Cao Lo', 'Nam', '2020-11-14', '123@gmail.com', 'http://localhost/hinhanh/avata1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `NoiDung` varchar(255) NOT NULL,
  `NgayBinhLuan` date NOT NULL,
  `KhachHang_id` int(11) NOT NULL,
  `Mon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `ChiTietDonHang_id` int(11) NOT NULL,
  `DonHang_id` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Mon_id` int(11) NOT NULL,
  `TenMon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ChiTietDonHang_id`, `DonHang_id`, `SoLuong`, `Mon_id`, `TenMon`) VALUES
(5, 3, 2, 10, 'Cold Brew Cam Sả'),
(6, 4, 1, 10, 'Cold Brew Cam Sả'),
(7, 4, 1, 5, 'ESpresso/Americano'),
(8, 4, 1, 9, 'Cold Brew Sữa Tươi');

-- --------------------------------------------------------

--
-- Table structure for table `chitietkhuyenmai`
--

CREATE TABLE `chitietkhuyenmai` (
  `ChiTietKM_id` int(11) NOT NULL,
  `KhuyenMai_id` int(11) NOT NULL,
  `Mon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `DonHang_id` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `NgayDat` date NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `NhanVien_id` int(11) NOT NULL,
  `KhuyenMai_id` int(11) DEFAULT NULL,
  `KhachHang_id` int(11) NOT NULL,
  `TenKhachHang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`DonHang_id`, `TongTien`, `NgayDat`, `TrangThai`, `NhanVien_id`, `KhuyenMai_id`, `KhachHang_id`, `TenKhachHang`) VALUES
(3, 8000, '2020-12-05', 1, 1, NULL, 1, 'tr'),
(4, 135000, '2020-11-05', 1, 1, NULL, 1, 'tr'),
(19, 8000, '2020-12-05', 1, 1, NULL, 1, 'tr'),
(20, 8000, '2020-12-05', 1, 1, NULL, 1, 'tr'),
(21, 8000, '2020-12-05', 1, 1, NULL, 1, 'tr');

-- --------------------------------------------------------

--
-- Table structure for table `hinhmon`
--

CREATE TABLE `hinhmon` (
  `HinhMon_id` int(11) NOT NULL,
  `IMG` varchar(255) NOT NULL,
  `Mon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinhmon`
--

INSERT INTO `hinhmon` (`HinhMon_id`, `IMG`, `Mon_id`) VALUES
(1, 'http://localhost/hinhanh/Anh-3-8461-1458632460.jpg', 1),
(2, 'http://localhost/hinhanh/capheden.jpg', 1),
(3, 'http://localhost/hinhanh/suada.jpg', 4),
(4, 'http://localhost/hinhanh/cafe-sua-da.jpg', 4),
(5, 'http://localhost/hinhanh/espresso.jpg', 5),
(6, 'http://localhost/hinhanh/1200px-(A_Donde_Vamos,_Quito)_Chocolate_of_Ecuador_and_Espresso.jpg', 5),
(9, 'http://localhost/hinhanh/latte-2.jpg', 6),
(10, 'http://localhost/hinhanh/latte.jpg', 6),
(11, 'http://localhost/hinhanh/mocha-2.jpg', 7),
(12, 'http://localhost/hinhanh/mocha.jpg', 7),
(13, 'http://localhost/hinhanh/8aeccce769c1538fa2bc3f4023ab552e.jpg', 8),
(14, 'http://localhost/hinhanh/19_db07f9dfbb924530bb78603606e727e5_1024x1024.jpg', 8),
(15, 'http://localhost/hinhanh/cold-sua-tuoi.jpg', 9),
(18, 'http://localhost/hinhanh/800x400_colbrewcamsa_cac01ad1d7454eb5b0f4a54c75d64e90_e08792b208c34652aeaf1329cb787ed3.jpg', 10),
(19, 'http://localhost/hinhanh/Cold-Brew-cam-s%e1%ba%a3.jpg', 10),
(20, 'http://localhost/hinhanh/phuc-bon-tu-4.jpg', 11),
(21, 'http://localhost/hinhanh/phuc-bon-tu.jpg', 11),
(22, 'http://localhost/hinhanh/unnamed.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_text` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `KhachHang_id` int(11) NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `PassWord` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `SDT` int(10) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `GioiTinh` varchar(3) NOT NULL,
  `NgaySinh` date NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Avatar` varchar(255) NOT NULL,
  `NhanVien_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`KhachHang_id`, `TaiKhoan`, `PassWord`, `HoTen`, `SDT`, `DiaChi`, `GioiTinh`, `NgaySinh`, `Email`, `Avatar`, `NhanVien_id`) VALUES
(1, 'adb', 12345678, 'văn ngọc', 977, 'áds', 'nu', '2020-11-18', 'asds', 'asd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khuyemai`
--

CREATE TABLE `khuyemai` (
  `KhuyenMai_id` int(11) NOT NULL,
  `NgayBĐ` date NOT NULL,
  `NgayKT` date NOT NULL,
  `TenKhuyenMai` varchar(255) NOT NULL,
  `Gia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loaimon`
--

CREATE TABLE `loaimon` (
  `LoaiMon_id` int(11) NOT NULL,
  `TenLoaiMon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaimon`
--

INSERT INTO `loaimon` (`LoaiMon_id`, `TenLoaiMon`) VALUES
(1, 'Cafe Việt Nam'),
(2, 'Cafe Máy'),
(5, 'Trà Trái Cây'),
(6, 'Macchiato'),
(11, 'Đá xay'),
(12, 'Thức uống khác\r\n'),
(13, 'Cold Brew');

-- --------------------------------------------------------

--
-- Table structure for table `mon`
--

CREATE TABLE `mon` (
  `Mon_id` int(11) NOT NULL,
  `TenMon` varchar(255) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `Gia` int(11) NOT NULL,
  `LoaiMon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mon`
--

INSERT INTO `mon` (`Mon_id`, `TenMon`, `MoTa`, `Gia`, `LoaiMon_id`) VALUES
(1, 'Cà Phê Đen ', 'abd', 29000, 1),
(4, 'Cà Phê Sửa', 'ádff', 29000, 1),
(5, 'Espresso/Americano', 'ádfg', 40000, 2),
(6, 'Latte/Cappuccino', 'ádsd', 50000, 2),
(7, 'Mocha', 'ádfff', 50000, 2),
(8, 'Cold Brew Truyền Thống', 'axxx', 45000, 13),
(9, 'Cold Brew Sữa Tươi', 'ádđxx', 45000, 13),
(10, 'Cold Brew Cam Sả', 'sadasds', 40000, 13),
(11, 'Cold Brew Phúc Bồn Tử', 'zzssd', 45000, 13),
(12, 'Cold Brew Macchiato', 'ádsds', 45000, 13),
(13, 'Trà Đào Cam Sả', 'zszc', 45000, 5),
(14, 'Trà Oolong Vải', 'zccv', 45000, 5),
(15, 'Trà Oolog Hạt Sen', 'zxcx', 45000, 5),
(16, 'Trà Oolong Phúc Bồ Tử', 'dgdgd', 50000, 5),
(17, 'Trà Oolong Bưởi Mật Ong', 'axxxx', 50000, 5),
(18, 'Trà Lài Macchiato', 'sasx', 42000, 6),
(19, 'Trà Đen Macchhiato', 'dsda', 42000, 6),
(20, 'Trà Xoài Macchiato', '12wdeasd', 45000, 6),
(21, 'Trà Matcha Macchiato', 'fs', 42000, 6),
(22, 'Trà Cherry Macchiato', 'zczcx', 45000, 6),
(51, 'Cà Phê Đen 66668978878', 'abd', 29000, 1),
(52, 'Cà Phê Đen 66668978878', 'abd', 29000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `NhanVien_id` int(11) NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `PassWord` varchar(255) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `SDT` int(10) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `GioiTinh` varchar(3) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  `Admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`NhanVien_id`, `TaiKhoan`, `PassWord`, `HoTen`, `SDT`, `DiaChi`, `GioiTinh`, `NgaySinh`, `Email`, `Avatar`, `Admin_id`) VALUES
(1, 'nhanvien', '123456', 'nhân viên', 12324, '12 da', 'nu', '2020-11-13', 'asd@gmail.com', 'http://localhost/hinhanh/hinh-nen.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `ThongBao_id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `Ngay` date NOT NULL,
  `DonHang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`KhachHang_id`,`Mon_id`),
  ADD KEY `Mon_id` (`Mon_id`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`ChiTietDonHang_id`),
  ADD KEY `Mon_id` (`Mon_id`),
  ADD KEY `DonHang_id` (`DonHang_id`);

--
-- Indexes for table `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD PRIMARY KEY (`ChiTietKM_id`),
  ADD KEY `Mon_id` (`Mon_id`),
  ADD KEY `KhuyenMai_id` (`KhuyenMai_id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`DonHang_id`),
  ADD KEY `NhanVien_id` (`NhanVien_id`),
  ADD KEY `KhuyenMai_id` (`KhuyenMai_id`),
  ADD KEY `KhachHang_id` (`KhachHang_id`);

--
-- Indexes for table `hinhmon`
--
ALTER TABLE `hinhmon`
  ADD PRIMARY KEY (`HinhMon_id`),
  ADD KEY `Mon_id` (`Mon_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`KhachHang_id`),
  ADD KEY `NhanVien_id` (`NhanVien_id`);

--
-- Indexes for table `khuyemai`
--
ALTER TABLE `khuyemai`
  ADD PRIMARY KEY (`KhuyenMai_id`);

--
-- Indexes for table `loaimon`
--
ALTER TABLE `loaimon`
  ADD PRIMARY KEY (`LoaiMon_id`);

--
-- Indexes for table `mon`
--
ALTER TABLE `mon`
  ADD PRIMARY KEY (`Mon_id`),
  ADD KEY `LoaiMon_id` (`LoaiMon_id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`NhanVien_id`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`ThongBao_id`),
  ADD KEY `DonHang_id` (`DonHang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `ChiTietDonHang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  MODIFY `ChiTietKM_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `DonHang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hinhmon`
--
ALTER TABLE `hinhmon`
  MODIFY `HinhMon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `KhachHang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khuyemai`
--
ALTER TABLE `khuyemai`
  MODIFY `KhuyenMai_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaimon`
--
ALTER TABLE `loaimon`
  MODIFY `LoaiMon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mon`
--
ALTER TABLE `mon`
  MODIFY `Mon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `NhanVien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `ThongBao_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`KhachHang_id`) REFERENCES `khachhang` (`KhachHang_id`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`Mon_id`) REFERENCES `mon` (`Mon_id`);

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`Mon_id`) REFERENCES `mon` (`Mon_id`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`DonHang_id`) REFERENCES `donhang` (`DonHang_id`);

--
-- Constraints for table `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD CONSTRAINT `chitietkhuyenmai_ibfk_2` FOREIGN KEY (`Mon_id`) REFERENCES `mon` (`Mon_id`),
  ADD CONSTRAINT `chitietkhuyenmai_ibfk_3` FOREIGN KEY (`KhuyenMai_id`) REFERENCES `khuyemai` (`KhuyenMai_id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`NhanVien_id`) REFERENCES `nhanvien` (`NhanVien_id`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`KhuyenMai_id`) REFERENCES `khuyemai` (`KhuyenMai_id`),
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`KhachHang_id`) REFERENCES `khachhang` (`KhachHang_id`);

--
-- Constraints for table `hinhmon`
--
ALTER TABLE `hinhmon`
  ADD CONSTRAINT `hinhmon_ibfk_1` FOREIGN KEY (`Mon_id`) REFERENCES `mon` (`Mon_id`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`NhanVien_id`) REFERENCES `nhanvien` (`NhanVien_id`);

--
-- Constraints for table `mon`
--
ALTER TABLE `mon`
  ADD CONSTRAINT `mon_ibfk_1` FOREIGN KEY (`LoaiMon_id`) REFERENCES `loaimon` (`LoaiMon_id`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`Admin_id`) REFERENCES `admin` (`Admin_id`);

--
-- Constraints for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbao_ibfk_1` FOREIGN KEY (`DonHang_id`) REFERENCES `donhang` (`DonHang_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
