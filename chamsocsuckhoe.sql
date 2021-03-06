-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 11:07 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

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
-- Table structure for table `danhmucmonan`
--
DROP DATABASE IF EXISTS chamsocsuckhoe;
CREATE DATABASE chamsocsuckhoe;
CREATE TABLE `danhmucmonan` (
  `Id` int(11) NOT NULL,
  `TenDanhMucMonAn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AnhDanhMuc` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmucmonan`
--

INSERT INTO `danhmucmonan` (`Id`, `TenDanhMucMonAn`, `AnhDanhMuc`) VALUES
(1, 'Cream -	Món mặn – ăn trưa, ăn chiều', 'https://image-us.eva.vn/upload/2-2018/images/2018-04-07/6-mon-man-tuyet-ngon-cho-ngay-lanh-bao-nhieu-com-cung-het-1-1514830758-127-width600height450-1523057270-370-width600height450.jpg\r\n'),
(2, 'Món chay', 'https://img2.infonet.vn/w490/Uploaded/2019/bnx_mjxuh/2018_01_06/cachlammonanchayturaucuqua.jpg\r\n'),
(3, 'Món nước – món ăn sáng', 'https://vnn-imgs-f.vgcloud.vn/2018/10/27/06/goi-y-nhung-mon-an-sang-an-hoai-khong-chan-khi-lang-thang-sai-gon.jpg\r\n'),
(4, 'Bánh kẹo', 'http://cafefcdn.com/thumb_w/650/2015/kinh-do-1427959083077.png\r\n'),
(5, 'Xôi – chè', 'http://www.aeoncitimart.vn/uploads/articles/249/xoi_che_ngon_het_y_cho_ngay_tet.jpg\r\n'),
(6, 'Trứng', 'https://znews-photo.zadn.vn/w1024/Uploaded/tmuitg/2019_05_26/1tl.jpg\r\n'),
(7, 'Sữa – nước giải khát', 'https://medonthan.com/wp-content/uploads/2017/02/chuan-bi-mang-thai-nen-uong-sua-gi.jpg\r\n'),
(8, 'Trái cây', 'https://sohanews.sohacdn.com/thumb_w/660/2019/1/11/cac-loai-trai-cay-1547174171357506224603-crop-1547174182816570687384.jpg\r\n'),
(64, 'mons de mo', 'http://192.168.0.166/ServerChamSocSucKhoe/uploads/454034904_1577434967.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `monan`
--

CREATE TABLE `monan` (
  `Id` int(11) NOT NULL,
  `TenMonAn` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `AnhMonAn` text COLLATE utf8_unicode_ci NOT NULL,
  `DonViTinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Calo` int(11) NOT NULL,
  `Dam` decimal(10,0) NOT NULL,
  `Beo` decimal(10,0) NOT NULL,
  `Xo` decimal(10,0) NOT NULL,
  `IdDanhMucMonAn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monan`
--

INSERT INTO `monan` (`Id`, `TenMonAn`, `AnhMonAn`, `DonViTinh`, `Calo`, `Dam`, `Beo`, `Xo`, `IdDanhMucMonAn`) VALUES
(63, 'Cơm trắng', 'http://khoahocphattrien.vn/Images/Uploaded/Share/2017/02/10/44.jpg', '1 chén', 200, '5', '1', '44', 1),
(64, 'Cơm trắng', 'http://khoahocphattrien.vn/Images/Uploaded/Share/2017/02/10/44.jpg', '1 đĩa', 406, '9', '1', '90', 1),
(65, 'Bầu xào trứng', 'https://i.ytimg.com/vi/SZjyOx8HBvg/maxresdefault.jpg', '1 đĩa', 109, '4', '9', '4', 1),
(66, 'Bò bía', 'http://www.monngon.tv/uploads/images/images/IMG_0818_CR2_.jpg', '3 cuốn', 93, '6', '4', '8', 1),
(67, 'Bò cuốn lá lốt', 'https://beptruong.edu.vn/wp-content/uploads/2018/05/bo-nuong-la-lot.jpg', '8 cuốn', 841, '49', '13', '133', 1),
(68, 'Bò cuốn mỡ chài', 'https://i.cachnaumonan.com/wp-content/uploads/2018/04/c%C3%A1ch-l%C3%A0m-m%C3%B3n-b%C3%B2-cu%E1%BB%91n-m%E1%BB%A1-ch%C3%A0i.jpg', '8 cuốn', 1180, '60', '46', '131', 1),
(69, 'Cá bạc má chiên', 'http://streaming1.danviet.vn/upload/1-2018/images/2018-01-19/Ca-bac-ma-chiem-mam-toi-va-canh-chua-ech-doi-vi-ngay-gio-lanh-1--2--1516330777-width660height440.jpg', '1 lát', 135, '13', '9', '0', 1),
(70, 'Cá bạc má kho', 'https://image-us.eva.vn/upload/4-2018/images/2018-10-22/5c2ef705-4207-469e-ab2c-72a5830df698-1540160808-750-width640height480_schema_article.jpg', '1 lát', 167, '21', '5', '9', 1),
(71, 'Cá cơm lăn bột chiên', 'http://paragonhotel.com.vn/sites/default/files/mua-qua/ca_com_lan_bot_chien_gion.jpg', '1 đĩa', 195, '10', '10', '17', 1),
(72, 'Cá chép chưng tương', 'https://6monngonmoingay.com/wp-content/uploads/2015/07/cach-lam-ca-chep-chung-tuong-hot-bo-sung-duong-chat-cho-bua-an-ca-nha.jpg', '1 lát', 156, '16', '7', '8', 1),
(73, 'Cá chim chiên', 'https://bepmonngon.com/wp-content/uploads/ca-chim-chien-gion.jpg', '1 lát', 108, '10', '8', '0', 1),
(74, 'Cá đối chiên', 'https://photo-3-baomoi.zadn.vn/w1000_r1/17/04/10/139/21981077/8_115571.jpg', '1 lát', 108, '10', '8', '0', 1),
(75, 'Cá đối kho', 'https://media.cooky.vn/recipe/g2/14126/s400x400/recipe14126-635937256759942872.jpg', '1 lát', 82, '10', '3', '4', 1),
(76, 'Cá hú kho', 'https://www.cet.edu.vn/wp-content/uploads/2019/03/ca-hu-kho-to.jpg', '1 lát cá', 184, '16', '10', '9', 1),
(77, 'Cá lóc chiên', 'http://dattiec.net.vn/images/data_thuc_an/Ca%20loc%20chien%20xu.jpg', '1 lát cá', 169, '15', '12', '0', 1),
(78, 'Cá lóc kho', 'https://daynauan.info.vn/wp-content/uploads/2019/03/ca-loc-kho-to.jpg', '1 lát cá', 131, '16', '4', '9', 1),
(79, 'Cá ngừ kho', 'https://giadinh.tv/wp-content/uploads/2017/01/cach-kho-ca-ngu-e1484310075572.png', '1 lát cá', 122, '18', '2', '9', 1),
(80, 'Cá trê chiên', 'https://i.ytimg.com/vi/Rwxfz-yVukY/hqdefault.jpg', '1 con', 219, '12', '19', '0', 1),
(81, 'Cá viên kho', 'http://img.tinbaihay.net/ThumbImages/01/cath/ca-thac-lac-kho-thom-ngon-bfd6_450.jpg', '10 viên nhỏ', 100, '15', '3', '4', 1),
(82, 'Canh bắp cải', 'https://emvaobep.com/wp-content/uploads/2018/08/cach-nau-canh-chua-bap-cai-2.jpg', '1 chén', 37, '2', '2', '3', 1),
(83, 'Canh bầu', 'https://wikiohana.net/wp-content/uploads/2018/11/canh-bau-nau-tom.jpg', '1 chén', 30, '1', '2', '2', 1),
(84, 'Canh bí đao', 'https://monngonmoingay.com/wp-content/uploads/2015/08/AGF-1791-canh-bi-dao-nau-suon-non.png', '1 chén', 29, '1', '2', '1', 1),
(85, 'Canh bí rợ', 'http://mevaobep.com/wp-content/uploads/2015/10/bo-duong-ca-nha-voi-canh-bi-do-ham-xuong-02.jpg', '1 chén', 42, '1', '2', '5', 1),
(86, 'Canh cải ngọt', 'https://vncooking.com/files/cuisine/2019/02/09/canh-cai-ngot-tom-bam-9box.jpg', '1 chén', 30, '2', '2', '1', 1),
(87, 'Canh chua', 'https://ngonlam.tv/wp-content/uploads/2018/11/cach-nau-canh-chua-luon-1.jpg', '1 chén', 29, '2', '1', '3', 1),
(88, 'Canh hẹ', 'http://khoahocphattrien.vn/Images/Uploaded/Share/2017/02/19/31.jpg', '1 chén', 33, '3', '2', '1', 1),
(89, 'Canh khoai mỡ', 'https://daubepgiadinh.vn/wp-content/uploads/2018/12/canh-khoai-mo-tom-kho-600x400.jpg', '1 chén', 51, '2', '1', '9', 1),
(90, 'Canh khổ qua hầm', 'https://daubepgiadinh.vn/wp-content/uploads/2017/01/canh-kho-qua-nhoi-thit-600x400.jpg', '1 chén', 175, '10', '11', '8', 1),
(91, 'Canh mướp ', 'https://photo-1-baomoi.zadn.vn/w1000_r1/2018_07_29_276_27063114/d1a0d2e437a5defb87b4.jpg', '1 chén', 31, '1', '2', '2', 1),
(92, 'Canh rau dền', 'https://media.ex-cdn.com/EXP/media.phunutoday.vn/files/upload_images/2015/05/15/cach-nau-canh-rau-den-ngon-1(1).jpg', '1 chén', 22, '1', '2', '0', 1),
(93, 'Bánh bao chay', 'http://lambanh365.com/wp-content/uploads/2015/03/Cach_lam_banh_bao_chay_1.jpg', '2 cái', 220, '11', '5', '34', 2),
(94, 'Bông cải xào', 'https://vcdn-ngoisao.vnecdn.net/2018/12/07/47100594-2233678590288528-5106-1853-3203-1544172682.png', '1 đĩa', 142, '7', '6', '15', 2),
(95, 'Bún bò Huế', 'https://media.cooky.vn/images/blog-2016/bi-quyet-lam-noi-nuoc-leo-bun-bo-hue-dam-da-chuan-vi-hue-ma-cac-me-nen-luu-lai-4.jpg', '1 tô', 479, '18', '16', '65', 2),
(96, 'Bún riêu', 'https://thucthan.com/media/2019/07/bun-rieu-cua/bun-rieu-cua.png', '1 tô', 482, '17', '17', '66', 2),
(97, 'Bún thịt nướng', 'https://cdn.huongnghiepaau.com/wp-content/uploads/2019/01/bun-thit-nuong.jpg', '1 tô', 451, '15', '14', '67', 2),
(98, 'Bún xào', 'https://nghebep.com/wp-content/uploads/2018/07/mien-xao-thap-cam.jpg', '1 đĩa', 570, '23', '28', '56', 2),
(99, 'Cá cơm lăn bột', 'http://afamilycdn.com/k:thumb_w/600/Qalypm8xccccccccccccW2vZ1VroR/Image/2013/12/13-cdbf5/ca-com-chien-bot-gion-thom-la-mieng.jpg', '1 đĩa', 316, '7', '17', '33', 2),
(100, 'Cá chua dồn thịt', 'https://giadinh.tv/wp-content/uploads/2017/08/tu-tay-lam-ca-chua-nhoi-thit-hap-thom-ngon.jpg', '2 trái ', 131, '7', '7', '9', 2),
(101, 'Cá mòi kho', 'https://cf.shopee.vn/file/90c37e210b7b02d9dea06c0b2aa4eaab', '1 đĩa', 105, '4', '5', '11', 2),
(102, 'Cà ri', 'https://thucthan.com/media/2018/05/ca-ri-ga/cach-nau-ca-ri-ga.jpg', '1 tô', 278, '8', '11', '36', 2),
(103, 'Cà tím nướng', 'http://lambanh365.com/wp-content/uploads/2016/04/Hinh-dai-dien-cach-lam-ca-tim-nuong-mo-hanh-thom-ngon.jpg', '1 đĩa', 33, '2', '0', '7', 2),
(104, 'Canh chua', 'https://amthuc3mien.vn/wp-content/uploads/2018/12/canh-ca-dieu-hong.jpg', '1 tô', 37, '2', '1', '5', 2),
(105, 'Canh kiểm', 'https://www.maggi.com.vn/sites/default/files/2019-07/canh-kiem.jpg', '1 tô', 291, '5', '13', '38', 2),
(106, 'Canh khổ qua', 'https://daubepgiadinh.vn/wp-content/uploads/2017/01/canh-kho-qua-nhoi-thit-600x400.jpg', '1 tô', 88, '5', '4', '8', 2),
(107, 'Canh rau ngót', 'https://www.cet.edu.vn/wp-content/uploads/2018/11/canh-rau-ngot-thit-bam.jpg', '1 tô', 23, '2', '1', '1', 2),
(108, 'Bánh canh cua', 'https://cdn.huongnghiepaau.com/wp-content/uploads/2018/01/1162815ad9bf895f2061c0defe3b0cae.jpg', '1 tô', 379, '21', '8', '54', 3),
(109, 'Bánh canh giò heo', 'http://mevaobep.com/wp-content/uploads/2015/10/an-sang-bo-duong-voi-banh-canh-gio-heo-575x335.jpg', '1 tô', 483, '19', '24', '49', 3),
(110, 'Bánh canh thịt gà', 'https://i.ytimg.com/vi/eY2goCxObmo/maxresdefault.jpg', '1 tô', 346, '13', '11', '49', 3),
(111, 'Bánh canh thịt heo', 'https://cdn.jamja.vn/blog/wp-content/uploads/2017/09/cah-nau-banh-canh-thit-heo.jpg3_.jpg', '1 tô', 322, '13', '9', '49', 3),
(112, 'Bột chiên', 'https://images.foody.vn/res/g72/712033/prof/s576x330/foody-mobile-chien-jpg.jpg', '1 đĩa', 443, '13', '26', '40', 3),
(113, 'Bún bò Huế', 'https://images.foody.vn/res/g95/946021/prof/s576x330/foody-upload-api-foody-mobile-bun-hh-190806141635.jpg', '1 tô', 622, '30', '31', '56', 3),
(114, 'Bún mắm', 'https://cdn.tgdd.vn/Files/2018/06/21/1096777/cach-nau-bun-mam-thom-ngon-khong-khac-gi-ngoai-hang.jpg', '1 tô', 480, '28', '16', '57', 3),
(115, 'Bún măng', 'https://tourane.vn/wp-content/uploads/2018/02/cach-nau-bun-mang-vit.jpg', '1 tô', 485, '21', '20', '56', 3),
(116, 'Bún mộc', 'https://www.cet.edu.vn/wp-content/uploads/2018/05/bun-moc.jpg', '1 tô', 514, '28', '19', '57', 3),
(117, 'Bún riêu cua', 'https://thucthan.com/media/2019/07/bun-rieu-cua/bun-rieu-cua.png', '1 tô', 414, '18', '12', '58', 3),
(127, 'trung chien', 'http://192.168.0.161/ServerChamSocSucKhoe/uploads/1525953985_1576219537.jpeg', 'quar', 56, '28', '33', '44', 6),
(128, 'tr', 'http://192.168.0.161/ServerChamSocSucKhoe/uploads/620626252_1576208650.jpeg', 'donViTinh', 1, '2', '3', '4', 3),
(129, '434', 'http://192.168.0.161/ServerChamSocSucKhoe/uploads/257712264_1576208718.jpeg', 'donViTinh', 1, '2', '3', '4', 3),
(130, 'fg', 'http://192.168.0.161/ServerChamSocSucKhoe/uploads/1148984132_1576208764.jpeg', 'donViTinh', 1, '2', '3', '4', 5),
(132, 'fd', 'http://192.168.0.161/ServerChamSocSucKhoe/uploads/1917993633_1576208835.jpeg', 'donViTinh', 1, '2', '3', '4', 5),
(133, 're', 'http://192.168.0.161/ServerChamSocSucKhoe/uploads/1679482449_1576208896.jpeg', 'donViTinh', 1, '2', '3', '4', 5),
(134, 'fgf', 'http://192.168.0.161/ServerChamSocSucKhoe/uploads/43453939_1576208948.jpeg', 'donViTinh', 1, '2', '3', '4', 5),
(139, 'cam de mo', 'http://192.168.0.161/ServerChamSocSucKhoe/uploads/464928338_1576218388.jpeg', 'qua', 555, '234', '345', '567', 0),
(141, 'fds', 'dfdf', 'fdf', 0, '0', '0', '0', 4),
(142, 'fds', 'dfdf', 'fdf', 0, '0', '0', '0', 4),
(143, 'cá chim', 'http://192.168.0.166/ServerChamSocSucKhoe/uploads/1810291507_1577418163.jpeg', 'lát', 150, '23', '42', '11', NULL),
(144, 'cá nga', 'http://192.168.0.166/ServerChamSocSucKhoe/uploads/490391654_1577418367.jpeg', 'ed', 4, '4', '4', '4', NULL),
(147, '1', 'http://192.168.0.166/ServerChamSocSucKhoe/uploads/1405461106_1577420899.jpeg', '1', 1, '1', '1', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `LaQuanTri` tinyint(1) NOT NULL DEFAULT 0,
  `NgayTao` int(11) NOT NULL,
  `Avatar` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`Email`, `Password`, `HoTen`, `LaQuanTri`, `NgayTao`, `Avatar`) VALUES
('2', '2', 'ho ten', 0, 20191227, 'http://192.168.0.166/ServerChamSocSucKhoe/uploads/1272285697_1577434784.jpeg'),
('admin', 'admin', '', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `thongtinthanhvien`
--

CREATE TABLE `thongtinthanhvien` (
  `Id` int(11) NOT NULL,
  `ChuTaiKhoan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ChucDanh` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `GioiTinh` bit(1) NOT NULL DEFAULT b'0',
  `NgaySinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ChieuCao` int(11) NOT NULL DEFAULT 0,
  `CanNang` int(11) NOT NULL DEFAULT 0,
  `MucDoHoatDong` int(11) NOT NULL DEFAULT 1,
  `TongNangLuong` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongtinthanhvien`
--

INSERT INTO `thongtinthanhvien` (`Id`, `ChuTaiKhoan`, `ChucDanh`, `GioiTinh`, `NgaySinh`, `ChieuCao`, `CanNang`, `MucDoHoatDong`, `TongNangLuong`) VALUES
(88, '2', 'Tôi', b'0', '19960929', 165, 47, 1, 1655),
(89, '2', 'me', b'0', '19661206', 156, 48, 2, 1621),
(90, '2', '', b'0', '20191227', 0, 0, 1, 106);

-- --------------------------------------------------------

--
-- Table structure for table `thucdon`
--

CREATE TABLE `thucdon` (
  `Id` int(11) NOT NULL,
  `ChuTaiKhoanId` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `BuaAnId` int(11) NOT NULL,
  `MonAnId` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT 0,
  `NgayAn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thucdon`
--

INSERT INTO `thucdon` (`Id`, `ChuTaiKhoanId`, `BuaAnId`, `MonAnId`, `SoLuong`, `NgayAn`) VALUES
(209, '2', 1, 98, 1, 20191211),
(210, 'hungqb@gmail.com', 1, 65, 1, 20191211),
(214, '2', 1, 64, 3, 20191210),
(217, '2', 2, 110, 2, 20191213),
(219, '2', 4, 108, 1, 20191213),
(220, '2', 1, 95, 3, 20191213),
(221, '2', 2, 94, 3, 20191213),
(223, '2', 3, 96, 1, 20191213),
(224, '2', 3, 109, 2, 20191213),
(229, '2', 1, 110, 1, 20191212),
(230, '2', 1, 95, 1, 20191212),
(231, '2', 2, 110, 1, 20191212),
(232, '2', 2, 111, 2, 20191210),
(233, '2', 2, 67, 1, 20191211),
(236, '2', 1, 66, 2, 20191211),
(237, '2', 1, 111, 1, 20191211),
(247, '2', 1, 95, 1, 20191217),
(248, '2', 1, 63, 1, 20191217),
(249, '2', 2, 95, 1, 20191217),
(250, '2', 1, 109, 1, 20191216),
(251, '2', 2, 94, 2, 20191216),
(252, '2', 1, 96, 1, 20191216),
(253, '2', 1, 73, 1, 20191227),
(254, '2', 2, 109, 2, 20191227),
(255, '2', 1, 95, 3, 20191226);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhmucmonan`
--
ALTER TABLE `danhmucmonan`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `DanhMucMonAn_MonAn` (`IdDanhMucMonAn`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `thongtinthanhvien`
--
ALTER TABLE `thongtinthanhvien`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `TaiKhoan_ThonTinThanhVien` (`ChuTaiKhoan`);

--
-- Indexes for table `thucdon`
--
ALTER TABLE `thucdon`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `MonAn_ThucDon` (`MonAnId`),
  ADD KEY `TaiKhoan_ThucDon` (`ChuTaiKhoanId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhmucmonan`
--
ALTER TABLE `danhmucmonan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `monan`
--
ALTER TABLE `monan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `thongtinthanhvien`
--
ALTER TABLE `thongtinthanhvien`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `thucdon`
--
ALTER TABLE `thucdon`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `DanhMucMonAn_MonAn` FOREIGN KEY (`IdDanhMucMonAn`) REFERENCES `danhmucmonan` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `thongtinthanhvien`
--
ALTER TABLE `thongtinthanhvien`
  ADD CONSTRAINT `TaiKhoan_ThonTinThanhVien` FOREIGN KEY (`ChuTaiKhoan`) REFERENCES `taikhoan` (`Email`);

--
-- Constraints for table `thucdon`
--
ALTER TABLE `thucdon`
  ADD CONSTRAINT `MonAn_ThucDon` FOREIGN KEY (`MonAnId`) REFERENCES `monan` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TaiKhoan_ThucDon` FOREIGN KEY (`ChuTaiKhoanId`) REFERENCES `taikhoan` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
