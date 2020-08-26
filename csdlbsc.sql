-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 26, 2020 lúc 11:27 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdlbsc`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addDonvi` (IN `maDv` VARCHAR(10), IN `tenDv` VARCHAR(100), IN `ten_Viettat` VARCHAR(20), IN `loaiDv` VARCHAR(100), IN `trangthaiDv` VARCHAR(100))  BEGIN
	INSERT INTO donvi (maDonvi,tenDonvi,tenViettat,loaiDonvi, trangthaiDonvi) 
	VALUES (maDv, tenDv, ten_Viettat, loaiDv, trangthaiDv);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addKyphieu` (IN `idKP` VARCHAR(10), IN `idND` VARCHAR(10), IN `nameKP` VARCHAR(100), IN `startDate` DATE, IN `endDate` DATE, IN `months` INT(11), IN `note` VARCHAR(100))  BEGIN
  INSERT INTO kyphieu(maKyphieu,maND,tenKyphieu,ngayBatdau, ngayKetthuc, thang, ghichu)
  VALUES (idKP, idND, nameKP, startDate, endDate, months, note);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addNguoiDung` (IN `ma_ND` VARCHAR(10), IN `ma_Donvi` VARCHAR(10), IN `ten_ND` VARCHAR(45), IN `tai_Khoan` VARCHAR(20), IN `mat_Khau` VARCHAR(100), IN `loai_ND` INT(11))  BEGIN
	INSERT INTO nguoidung (maND,maDonvi,tenND,taiKhoan, matKhau, loaiND) 
	VALUES (ma_ND, ma_Donvi, ten_ND, tai_Khoan, mat_Khau, loai_ND);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addPDG` (`ma_Kyphieu` VARCHAR(10), `ma_Phieu` VARCHAR(10), `ten_Phieu` VARCHAR(100), `ma_Tram` VARCHAR(50), `ma_Quanli` VARCHAR(10), `ma_Giamsat` VARCHAR(10), `ma_TTVT` VARCHAR(10), `ma_TTDHTT` VARCHAR(10))  BEGIN
	INSERT INTO phieudanhgia(maKyphieu, maPhieu, tenPhieu, maTram, maQuanli, maGiamsat, maTTVT, 
    maTTDHTT) 
    VALUES (ma_Kyphieu, ma_Phieu, ten_Phieu, ma_Tram, ma_Quanli, ma_Giamsat, ma_TTVT, 
    ma_TTDHTT);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addTieuchi` (IN `maTC` INT(11), IN `maTNTTVT` VARCHAR(50), IN `maTNTTDHTT` VARCHAR(50), IN `tenTC` VARCHAR(255), IN `chitietTC` VARCHAR(255), IN `diemtrucnTTVT` FLOAT, IN `diemtruttTTVT` FLOAT, IN `diemtrucnTTDHTT` FLOAT, IN `diemtruttTTDHTT` FLOAT)  BEGIN
	INSERT INTO tieuchi(maTieuchi, maTN_TTVT, maTN_TTDHTT, tenTieuchi, chitietTieuchi, 
    mucdiemtrucnTTVT, mucdiemtruttTTVT, mucdiemtrucnTTDHTT, mucdiemtruttTTDHTT) 
    VALUES (maTC, maTNTTVT, maTNTTDHTT,tenTC, chitietTC, diemtrucnTTVT, diemtruttTTVT, diemtrucnTTDHTT, diemtruttTTDHTT);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addTrachnhiem` (IN `maTN` VARCHAR(50), IN `tenTN` VARCHAR(100))  BEGIN
	INSERT INTO trachnhiem(maTrachnhiem, tenTrachnhiem) 
    VALUES (maTN,tenTN);


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addTram` (IN `ma_Tram` VARCHAR(50), IN `ma_Donvi` VARCHAR(10), IN `ma_Quanli` VARCHAR(10), IN `ma_Giamsat` VARCHAR(10), IN `ten_Tram` VARCHAR(100), IN `diachi_Tram` VARCHAR(100), IN `trangthai_Tram` VARCHAR(100), IN `toado_X` FLOAT, IN `toado_Y` FLOAT)  BEGIN
	INSERT INTO tram (maTram,maDonvi,maQuanli,maGiamsat,tenTram,diachiTram,trangthaiTram,toadoX,toadoY) 
	VALUES (ma_Tram, ma_Donvi, ma_Quanli, ma_Giamsat, ten_Tram, diachi_Tram, trangthai_Tram, toado_X, toado_y);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `adminGetMaGs` (`maQl` VARCHAR(50))  BEGIN
select DISTINCT maGiamsat from tram where maQuanli = maQl;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `adminGetMaKp` ()  BEGIN
	select maKyphieu from kyphieu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `adminGetMaQl` (`maTramm` VARCHAR(50))  BEGIN
select maQuanli, maTram from tram where maTram = maTramm;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `adminGetMaTTDHTT` (`maGs` VARCHAR(50))  BEGIN
select DISTINCT maDonvi from nguoidung where maND = maGs;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `adminGetMaTTVT` (`maQl` VARCHAR(50))  BEGIN
select DISTINCT maDonvi from nguoidung where maND = maQl;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `adminGetTram` ()  BEGIN
	select maTram, tenTram from tram;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkTypeND` (`usr` VARCHAR(45))  BEGIN
	select * from nguoidung where taikhoan = usr and loaiND = 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteDonvi` (IN `maDv` VARCHAR(10))  BEGIN
	delete FROM donvi where maDonvi=maDv;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteKyphieu` (IN `idKP` VARCHAR(10))  BEGIN
DELETE FROM kyphieu WHERE maKyphieu = idKP;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteNguoiDung` (IN `ma_ND` VARCHAR(10))  BEGIN
	
    delete FROM nguoidung where maND=ma_ND;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePhieu` (IN `maP` INT(11))  BEGIN
		DELETE FROM phieudanhgia WHERE maPhieu = maP;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteTieuchi` (IN `maTC` INT(11))  BEGIN
		DELETE FROM tieuchi WHERE maTieuchi = maTC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteTram` (IN `idTram` VARCHAR(50))  BEGIN
	
    DELETE FROM tram where maTram = idTram;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editDonvi` (IN `maDv` VARCHAR(10), IN `tenDv` VARCHAR(100), IN `ten_Viettat` VARCHAR(20), IN `loaiDv` VARCHAR(100), IN `trangthaiDv` VARCHAR(100))  BEGIN
	update donvi set tenDonvi=tenDv, tenViettat=ten_Viettat, loaiDonvi=loaiDv, trangthaiDonvi=trangthaiDv WHERE maDonvi = maDv ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editKyphieu` (IN `idKP` VARCHAR(10), IN `idND` VARCHAR(10), IN `nameKP` VARCHAR(100), IN `startDate` DATE, IN `endDate` DATE, IN `months` INT(11), IN `note` VARCHAR(100))  BEGIN
UPDATE kyphieu SET maND=idND, tenKyphieu=nameKP, ngayBatdau=startDate, 
ngayKetthuc=endDate, thang=months,ghichu=note WHERE maKyphieu = idKP;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editNguoiDung` (IN `ma_ND` VARCHAR(10), IN `ma_Donvi` VARCHAR(10), IN `ten_ND` VARCHAR(45), IN `tai_Khoan` VARCHAR(20), IN `mat_Khau` VARCHAR(100), IN `loai_ND` INT(11))  BEGIN
		update nguoidung set maND=ma_ND, maDonvi=ma_Donvi, tenND=ten_ND, taiKhoan=tai_Khoan, matKhau=mat_Khau, loaiND=loai_ND
        WHERE maND = ma_ND ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editPDG` (`ma_Kyphieu` VARCHAR(10), `ma_Phieu` VARCHAR(10), `ten_Phieu` VARCHAR(100), `ma_Tram` VARCHAR(50), `ma_Quanli` VARCHAR(10), `ma_Giamsat` VARCHAR(10), `ma_TTVT` VARCHAR(10), `ma_TTDHTT` VARCHAR(10))  BEGIN
	UPDATE phieudanhgia SET maKyphieu= ma_Kyphieu,  
    tenPhieu=ten_Phieu, maTram = ma_Tram,
    maQuanli=ma_Quanli, maGiamsat=ma_Giamsat,
    maTTVT=ma_TTVT, maTTDHTT=ma_TTDHTT
    WHERE maPhieu= ma_Phieu;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editTieuchi` (IN `maTC` INT(11), IN `maTNTTVT` VARCHAR(50), IN `maTNTTDHTT` VARCHAR(50), IN `tenTC` VARCHAR(255), IN `chitietTC` VARCHAR(255), IN `diemtrucnTTVT` FLOAT, IN `diemtruttTTVT` FLOAT, IN `diemtrucnTTDHTT` FLOAT, IN `diemtruttTTDHTT` FLOAT)  BEGIN
	UPDATE tieuchi SET maTN_TTVT= maTNTTVT, maTN_TTDHTT= maTNTTDHTT, 
    tenTieuchi=tenTC, chitietTieuchi=chitietTC,
    mucdiemtrucnTTVT=diemtrucnTTVT,mucdiemtruttTTVT=mucdiemtruttTTVT,
    mucdiemtrucnTTDHTT=diemtrucnTTDHTT, mucdiemtruttTTDHTT=diemtruttTTDHTT
    WHERE maTieuchi = maTC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editTram` (IN `ma_Tram` VARCHAR(50), IN `ma_Donvi` VARCHAR(10), IN `ma_Quanli` VARCHAR(10), IN `ma_Giamsat` VARCHAR(10), IN `ten_Tram` VARCHAR(100), IN `diachi_Tram` VARCHAR(100), IN `trangThai_Tram` VARCHAR(100), IN `toado_X` FLOAT, IN `toado_Y` FLOAT)  BEGIN
	update tram set maDonvi=ma_Donvi, maQuanli=ma_Quanli, maGiamsat=ma_Giamsat, tenTram=ten_Tram, diachiTram=diachi_Tram, trangthaiTram=trangthai_Tram, toadoX=toado_X, toadoY=toado_Y WHERE maTram = ma_Tram ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTieuchi` ()  BEGIN
	select * from tieuchi;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTram` (`maQl` VARCHAR(10))  BEGIN
	select * from tram where maQuanli = maQl;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pass` (IN `tk` VARCHAR(10), IN `mk` VARCHAR(100))  BEGIN
	select * from nguoidung where  taiKhoan = tk and matKhau = 'admin';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateND` (IN `ma` VARCHAR(10), IN `mk` VARCHAR(100))  BEGIN
	UPDATE nguoidung SET  matKhau = mk WHERE maND = ma;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validation` (IN `tk` VARCHAR(10), IN `mk` VARCHAR(100))  BEGIN
	select * from nguoidung where taiKhoan = tk AND matKhau = mk;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieudanhgia`
--

CREATE TABLE `chitietphieudanhgia` (
  `machitietPDG` int(11) NOT NULL,
  `maPhieu` varchar(10) NOT NULL,
  `maTieuchi` int(11) NOT NULL,
  `diemtrucnTTVT` float NOT NULL,
  `diemtruttTTVT` float NOT NULL,
  `diemtrucnTTDHTT` float NOT NULL,
  `diemtruttTTDHTT` float NOT NULL,
  `ketQua1` float DEFAULT NULL,
  `ketQua2` float DEFAULT NULL,
  `ketQua3` float DEFAULT NULL,
  `noidungDanhgia1` varchar(1024) DEFAULT NULL,
  `noidungDanhgia2` varchar(1024) DEFAULT NULL,
  `noidungDanhgia3` varchar(1024) DEFAULT NULL,
  `nguoiDanhgia1` varchar(45) DEFAULT NULL,
  `nguoiDanhgia2` varchar(45) DEFAULT NULL,
  `nguoiDanhgia3` varchar(45) DEFAULT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvi`
--

CREATE TABLE `donvi` (
  `maDonvi` varchar(10) NOT NULL,
  `tenDonvi` varchar(100) NOT NULL,
  `tenViettat` varchar(20) NOT NULL,
  `loaiDonvi` varchar(100) NOT NULL,
  `trangthaiDonvi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donvi`
--

INSERT INTO `donvi` (`maDonvi`, `tenDonvi`, `tenViettat`, `loaiDonvi`, `trangthaiDonvi`) VALUES
('agsg', 'agsg', 'agsg', '1', '1'),
('ash', 'ajs', 'sj', 'aks', '1'),
('STG020000', 'Phòng Nhân Sự - Tổng Hợp\r\n', 'NSTH', 'VTST\r\n', '1'),
('STG060000', 'Trung tâm Điều hành thông tin\r\n', 'ĐHTT', 'DHTT\r\n', '1'),
('STG110000', 'Trung tâm Viễn thông 1 - TPO\r\n', 'TPO', 'TTVT\r\n', '1'),
('STG120000', 'Trung tâm Viễn thông 1 - CTH\r\n', 'CTH', 'TTVT\r\n', '1'),
('STG130000', 'Trung tâm Viễn thông 1 - MTU\r\n', 'MTU', 'TTVT\r\n', '1'),
('STG140000', 'Trung tâm Viễn thông 1 - KSH\r\n', 'KSH', 'TTVT\r\n', '1'),
('STG150000', 'Trung tâm Viễn thông 2 - MXN\r\n', 'MXN', 'TTVT\r\n', '1'),
('STG160000', 'Trung tâm Viễn thông 2 - VCU\r\n', 'VCU', 'TTVT\r\n', '1'),
('STG170000', 'Trung tâm Viễn thông 3 - LPU\r\n', 'LPU', 'TTVT\r\n', '1'),
('STG180000', 'Trung tâm Viễn thông 3 - CLD\r\n', 'CLD', 'TTVT\r\n', '1'),
('STG190000', 'Trung tâm Viễn thông 3 - TDE\r\n', 'TDE', 'TTVT\r\n', '1'),
('STG200000', 'Trung tâm Viễn thông 4 - TTI\r\n', 'TTI', 'TTVT\r\n', '1'),
('STG210000', 'Trung tâm Viễn thông 4 - NNM\r\n', 'NNM', 'TTVT\r\n', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `maHinhanh` int(11) NOT NULL,
  `maPhieu` varchar(10) NOT NULL,
  `text` longblob DEFAULT NULL,
  `image` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`maHinhanh`, `maPhieu`, `text`, `image`) VALUES
(41, '2', 0x68656c6c6f, 'temp.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kyphieu`
--

CREATE TABLE `kyphieu` (
  `maKyphieu` varchar(10) NOT NULL,
  `maND` varchar(10) NOT NULL,
  `tenKyphieu` varchar(100) NOT NULL,
  `ngayBatdau` date NOT NULL,
  `ngayKetthuc` date NOT NULL,
  `thang` int(11) NOT NULL,
  `ghichu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `kyphieu`
--

INSERT INTO `kyphieu` (`maKyphieu`, `maND`, `tenKyphieu`, `ngayBatdau`, `ngayKetthuc`, `thang`, `ghichu`) VALUES
('12', 'CTV032124', 'jsa', '2020-07-23', '2020-07-31', 7, 'sjd'),
('13', 'CTV032124', 'Danh gia phieu thang 8', '2020-08-01', '2020-08-31', 8, 'Danh gia cuoi thang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `maND` varchar(10) NOT NULL,
  `maDonvi` varchar(10) NOT NULL,
  `tenND` varchar(45) NOT NULL,
  `taiKhoan` varchar(20) NOT NULL,
  `matKhau` varchar(100) DEFAULT NULL,
  `loaiND` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`maND`, `maDonvi`, `tenND`, `taiKhoan`, `matKhau`, `loaiND`) VALUES
('CTV032124', 'STG110000', 'Sơn Minh Tiến', 'tiensm.stg', 'tovuca', 1),
('CTV032125', 'STG110000', 'Nguyễn Vũ Linh', 'linhnv.stg', 'tovuca', 1),
('CTV032126', 'STG110000', 'Nguyễn Minh Hùng', 'hungnm.stg', 'admin', 1),
('CTV032129', 'STG110000', 'Sari Tuấn Anh', 'anhst.stg', 'tovuca', 1),
('CTV032144', 'STG160000', 'Trần Hiền Hòa', 'hoath.stg', '-', 1),
('CTV032145', 'STG150000', 'Lâm Thanh Toàn', 'toanlamthanh.stg', '-', 1),
('CTV032150', 'STG160000', 'Trương Văn Đỡ', 'dotv.stg', '-', 1),
('CTV032151', 'STG150000', 'Ngô Thanh Điền', 'diennt.stg', '-', 1),
('CTV032161', 'STG190000', 'Lâm Thanh Chiều', 'chieult.stg', '-', 1),
('CTV032165', 'STG200000', 'Trần Văn Thưởng', 'thuongtv.stg', '-', 1),
('CTV032166', 'STG210000', 'Nguyễn Văn Trung', 'nguyentrungstg', '-', 1),
('CTV032167', 'STG210000', 'Trần Văn Thẳng', 'thangtv.stg', '-', 1),
('CTV032170', 'STG200000', 'Nguyễn Ngọc Phú', 'phunn.stg', '-', 1),
('CTV041574', 'STG120000', 'Ngô Quốc Thắng', 'thangnq.stg', '-', 1),
('CTV041602', 'STG110000', 'Trần Thiên Phúc', 'phuctt.stg', '-', 1),
('CTV041607', 'STG170000', 'Nguyễn Chánh Tín', 'tinnc.stg', '-', 1),
('CTV041628', 'STG120000', 'Trần Thanh Hà', 'hatt.stg', '-', 1),
('CTV043725', 'STG140000', 'Lê Văn Đức', 'duclv.stg', '-', 1),
('CTV051318', 'STG150000', 'Nguyễn Văn Rỉnh', 'rinhnv.stg', '-', 1),
('STG000011', 'STG160000', 'test', 'test.stg', 'test', 1),
('STG002033', 'STG020000', 'Lê Hiền Đệ', 'lhde.stg', 'lhde', 3),
('STG004061', 'STG020000', 'Lê Văn Mậu', 'levanmau.stg', 'admin', 3),
('STG006150', 'STG110000', 'Trần Văn Sơn', 'sontv.stg', '-', 1),
('STG006152', 'STG110000', 'Lê Phước Hưng', 'hunglp.stg', '-', 1),
('STG006161', 'STG110000', 'Trương Văn Lý', 'lytv.stg', '-', 1),
('STG006170', 'STG110000', 'Nguyễn Hùng Kiệt', 'kietnh.stg', '-', 1),
('STG006171', 'STG110000', 'Huỳnh Quang Trung', 'trunghq.stg', '-', 1),
('STG006176', 'STG110000', 'Đào Hữu Danh', 'danhdh.stg', '-', 1),
('STG006179', 'STG110000', 'Triệu Xuân Ngoan', 'ngoantx.stg', '-', 1),
('STG006181', 'STG110000', 'Lương Minh Toàn', 'toanlm.stg', '-', 1),
('STG006182', 'STG110000', 'Trịnh Đức Bảo', 'baotd.stg', '-', 1),
('STG006187', 'STG110000', 'Quách Hồng Thủy', 'thuyqh.stg', '-', 1),
('STG006188', 'STG120000', 'Nguyễn Hoài Thanh', 'thanhnh.stg', '-', 1),
('STG006199', 'STG110000', 'Nguyễn Trung Vĩnh', 'vinhnt.stg', '-', 1),
('STG007253', 'STG160000', 'Cao Diệp Huy', 'huycd.stg', '-', 2),
('STG007254', 'STG150000', 'Trần Thanh Phong', 'ttphong.stg', '-', 2),
('STG007257', 'STG150000', 'Trần Phước Nhân', 'nhantp.stg', '-', 1),
('STG007262', 'STG150000', 'Lâm Thanh Việt', 'vietlt.stg', '-', 1),
('STG007263', 'STG150000', 'Trần Thanh Hùng', 'hungtt.stg', '-', 1),
('STG007264', 'STG110000', 'Lương Hoàng Em', 'emlh.stg', '-', 1),
('STG007268', 'STG110000', 'Hứa Văn Hào', 'haohv.stg', '-', 2),
('STG007270', 'STG150000', 'Hứa Thành Ân', 'anht.stg', '-', 1),
('STG007271', 'STG150000', 'Nguyễn Hoàng Tâm', 'tamnh.stg', '-', 1),
('STG007274', 'STG150000', 'Nguyễn Văn Tiền', 'tiennv.stg', '-', 1),
('STG007281', 'STG150000', 'Trần Thanh Lập', 'laptt.stg', '-', 1),
('STG007285', 'STG150000', 'Võ Đình Thiện', 'thienvd.stg', '-', 1),
('STG007287', 'STG150000', 'Võ Tuấn Thanh', 'thanhvt.stg', '-', 1),
('STG007290', 'STG190000', 'Lê Song Huy', 'huyls.stg', '-', 1),
('STG008301', 'STG200000', 'Huỳnh Vũ Cường', 'cuonghv.stg', '-', 2),
('STG008306', 'STG200000', 'Nguyễn Thanh Tâm', 'tamnt.stg', '-', 1),
('STG008310', 'STG200000', 'Trương Quốc Cường', 'cuongtq.stg', '-', 1),
('STG009326', 'STG130000', 'Đặng Thanh Nhàn', 'thanhnhan.stg', '-', 2),
('STG009331', 'STG130000', 'Huỳnh Văn Thống', 'thonghv.stg', '-', 1),
('STG009333', 'STG130000', 'Đỗ Thanh Hiếu', 'hieudt.stg', '-', 1),
('STG009336', 'STG140000', 'Lê Quốc Toản', 'toanlq.stg', '-', 1),
('STG009340', 'STG210000', 'Nguyễn Ngọc Hà', 'hann.stg', '-', 1),
('STG009346', 'STG120000', 'Nguyễn Sỹ Nhân', 'nhanns.stg', '-', 2),
('STG009347', 'STG130000', 'Trần Thanh Vạn', 'vantt.stg', '-', 1),
('STG009348', 'STG120000', 'Nguyễn Anh Khiêm', 'khiemna.stg', '-', 1),
('STG009349', 'STG120000', 'Phạm Trường Thọ', 'thopt.stg', '-', 1),
('STG009351', 'STG130000', 'Lưu Thanh Toàn', 'toanlt.stg', '-', 1),
('STG010343', 'STG190000', 'Huỳnh Tất Thắng', 'htthang.stg', '-', 2),
('STG010345', 'STG170000', 'Trần Cảnh Cường', 'cuongtc.stg', '-', 1),
('STG010349', 'STG170000', 'Nguyễn Thanh Toàn', 'toannt.stg', '-', 1),
('STG010350', 'STG170000', 'Trần Mộng Cầm', 'camtm.stg', '-', 1),
('STG010355', 'STG190000', 'Lê Tấn Đạt', 'datlt.stg', '-', 1),
('STG010358', 'STG170000', 'Nguyễn Văn Đậm', 'damnv.stg', '-', 1),
('STG010361', 'STG170000', 'Hà Trần Minh Giang', 'gianghtm.stg', '-', 1),
('STG010365', 'STG190000', 'Phương Nhật Huy', 'huypn.stg', '-', 1),
('STG010368', 'STG170000', 'Nguyễn Văn Trí', 'nvtri.stg', '-', 1),
('STG010370', 'STG190000', 'Phạm Tự Lực', 'lucpt.stg', '-', 1),
('STG010372', 'STG180000', 'Trần Trung Hiếu', 'hieutt.stg', '-', 2),
('STG011420', 'STG160000', 'Nguyễn Văn An', 'annv.stg', '-', 1),
('STG011422', 'STG160000', 'Đào Xuân Dũng', 'dungdx.stg', '-', 1),
('STG011428', 'STG160000', 'Nguyễn Quốc Tuấn', 'tuannq.stg', '-', 1),
('STG011430', 'STG160000', 'Lê Văn Thới', 'thoilv.stg', '-', 1),
('STG011433', 'STG160000', 'Phạm Văn Diệu Anh', 'anhpvd.stg', '-', 1),
('STG011437', 'STG160000', 'Nguyễn Hồng Phong', 'phongnh.stg', '-', 1),
('STG011440', 'STG140000', 'Nguyễn Thanh An', 'annt.stg', '-', 1),
('STG012463', 'STG140000', 'Tô Ngọc Huy', 'huytn.stg', '-', 1),
('STG012464', 'STG140000', 'Biền Văn Tốt', 'totbv.stg', '-', 1),
('STG012468', 'STG140000', 'Nguyễn Văn Trí', 'trinv.stg', '-', 1),
('STG012477', 'STG140000', 'Trần Văn Điểm', 'diemtv.stg', '-', 1),
('STG012479', 'STG140000', 'Nguyễn Văn Tín', 'tinnv.stg', '-', 1),
('STG012480', 'STG140000', 'Lê Văn Hòa', 'hoalv.stg', '-', 1),
('STG012481', 'STG150000', 'Trần Tấn Phong', 'phongtt.stg', '-', 1),
('STG013051', 'STG170000', 'Võ Văn Sáu', 'sauvv.stg', '-', 2),
('STG013052', 'STG180000', 'Hồ Kim Long', 'longhk.stg', '-', 1),
('STG013055', 'STG180000', 'Nguyễn Quốc Phục', 'phucnq.stg', '-', 1),
('STG013056', 'STG170000', 'Thái Văn Giàu', 'giautv.stg', '-', 1),
('STG013062', 'STG180000', 'Võ Hoàng Thành', 'thanhvh.stg', '-', 1),
('STG014533', 'STG210000', 'Biện Thanh Tùng', 'tungbt.stg', '-', 1),
('STG014539', 'STG210000', 'Phạm Chí Nguyện', 'nguyenpc.stg', '-', 1),
('STG014541', 'STG210000', 'Ngô Khải Minh', 'minhnk.stg', '-', 1),
('STG014543', 'STG210000', 'Ngô Hùng Phi', 'phinh.stg', '-', 1),
('STG015002', 'STG140000', 'Phan Thành Thắng', 'thangpt.stg', '-', 2),
('STG015350', 'STG130000', 'Đặng Thanh Tâm', 'tamdt.stg', '-', 1),
('STG016163', 'STG060000', 'Trần Quốc Sử', 'sutq.stg', '-', 0),
('STG016174', 'STG110000', 'Trần Minh Thạnh', 'thanhtm.stg', '-', 1),
('STG016183', 'STG060000', 'Nguyễn Văn Hiền', 'hiennv.stg', '-', 0),
('STG016201', 'STG060000', 'Ngụy Minh Hòa', 'hoanm.stg', '-', 0),
('STG016207', 'STG060000', 'Quách Việt Trung', 'trungqv.stg', '-', 0),
('STG016210', 'STG060000', 'Lê Bình Sơn Thiên Hoàng', 'hoanglbst.stg', '-', 0),
('STG016257', 'STG060000', 'Danh Minh Khiêm', 'khiemdm.stg', '-', 0),
('STG016258', 'STG210000', 'Lâm Thế Diễn', 'dienlt.stg', '-', 2),
('STG020050', 'STG140000', 'Nguyễn Hoài Thương', 'thuongnh.stg', '-', 1),
('STG020055', 'STG060000', 'Nguyễn Khoa Nam', 'namnk.stg', '-', 0),
('STG020064', 'STG130000', 'Đoàn Trung Kiên', 'kiendt.stg', '-', 1),
('STG020065', 'STG060000', 'Huỳnh Thế Cường', 'cuonght.stg', '-', 0),
('STG020130', 'STG190000', 'Huỳnh Xuân Vịnh', 'vinhhx.stg', '-', 1),
('STG020131', 'STG120000', 'Nguyễn Hữu Minh', 'minhnh.stg', '-', 1),
('STG020132', 'STG160000', 'Nguyễn Quốc Tiến', 'tiennq.stg', '-', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudanhgia`
--

CREATE TABLE `phieudanhgia` (
  `maPhieu` varchar(10) NOT NULL,
  `maKyphieu` varchar(10) NOT NULL,
  `maTTVT` varchar(10) NOT NULL,
  `maTTDHTT` varchar(10) NOT NULL,
  `maQuanli` varchar(10) DEFAULT NULL,
  `maGiamsat` varchar(10) DEFAULT NULL,
  `maTram` varchar(50) NOT NULL,
  `tenPhieu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phieudanhgia`
--

INSERT INTO `phieudanhgia` (`maPhieu`, `maKyphieu`, `maTTVT`, `maTTDHTT`, `maQuanli`, `maGiamsat`, `maTram`, `tenPhieu`) VALUES
('1', '12', 'STG180000', 'STG060000', 'STG013062', 'STG016163', 'CSHT_STG_00001', 'Phieu danh gia thang 8'),
('2', '12', 'STG190000', 'STG060000', 'STG010370', 'STG016163', 'CSHT_STG_00006', 'Phieu danh gia thang 8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tieuchi`
--

CREATE TABLE `tieuchi` (
  `maTieuchi` int(11) NOT NULL,
  `maTN_TTVT` varchar(50) NOT NULL,
  `maTN_TTDHTT` varchar(50) NOT NULL,
  `tenTieuchi` varchar(255) NOT NULL,
  `chitietTieuchi` varchar(255) NOT NULL,
  `mucdiemtrucnTTVT` float NOT NULL,
  `mucdiemtruttTTVT` float NOT NULL,
  `mucdiemtrucnTTDHTT` float NOT NULL,
  `mucdiemtruttTTDHTT` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tieuchi`
--

INSERT INTO `tieuchi` (`maTieuchi`, `maTN_TTVT`, `maTN_TTDHTT`, `tenTieuchi`, `chitietTieuchi`, `mucdiemtrucnTTVT`, `mucdiemtruttTTVT`, `mucdiemtrucnTTDHTT`, `mucdiemtruttTTDHTT`) VALUES
(1, 'TN01', 'TN02', 'Thân cột', 'Thẳng đứng, không nghiêng lệch, không bị mục lủng gây mất an toàn, Không để chim, ong làm tổ trên cột.', 0.05, 0.02, 0.02, 0.01),
(2, 'TN01', 'TN02', 'Móng cột, móng co', 'Vững chắc, không sạt lở, lún nứt, các vị trí móng co, móng cột vệ sinh phát quang > 1 m', 0.05, 0.02, 0.02, 0.01),
(3, 'TN01', 'TN02', 'Dây co', 'Không đứt, không bị gỉ sét, không thiếu hoặc bật khóa cáp.', 0.05, 0.02, 0.02, 0.01),
(4, 'TN01', 'TN02', 'Bình cứu hỏa', 'Đủ số lượng bình khí/trạm thiết bị và số lượng bình bột/nhà máy nổ theo quy định, có tem nhãn ngày kiểm tra, đầu kẹp chì, đủ trọng lượng hoặc áp suất.', 0.05, 0.02, 0.02, 0.01),
(5, 'TN01', 'TN02', 'Thùng nhiên liệu', 'Không nứt vỡ, rò rỉ nhiên liệu, tuyệt đối không để trong phòng thiết bị.', 0.05, 0.02, 0.02, 0.01),
(6, 'TN02', 'TN01', 'Ắc quy', 'Không phồng rộp, nứt vỡ, đồng nhất chủng loại. Thanh nối ắc quy không bị gỉ, các mối nối được siết chặt. Cảm biến nhiệt tiếp xúc chặt chẽ với thành ắc quy.', 0.02, 0.01, 0.05, 0.02),
(7, 'TN01', 'TN02', 'Cánh cửa, khóa cửa', 'Kín và khít, không bị thấm dột, hắt nước khi trời mưa, chắc chắn, không bị gỉ sét', 0.05, 0.02, 0.02, 0.01),
(8, 'TN01', 'TN02', 'Phát quang quanh hành lang an toàn trạm (cách nhà trạm, các móng tối thiểu 1 mét)', 'Cỏ mọc không quá 5 cm từ mặt đất, Không có dây leo, cây cối mọc trong phạm vi quy định, hoặc cây cối xung quanh có nguy cơ đổ ngã ảnh hưởng hệ thống nhà, cột, đường dây vào phòng máy.', 0.02, 0.01, 0.01, 0.005),
(9, 'TN01', 'TN02', 'Vệ sinh quanh trạm, khơi thông cống rãnh thoát nước', 'Không để rác thải vứt quanh trạm', 0.02, 0.01, 0.01, 0.005),
(10, 'TN01', 'TN02', 'Đường dây vào phòng máy (điện AC vào phòng máy, cáp quang nhập trạm,…)', 'Không trùng võng, mất an toàn, tách dây AC và cáp quang.', 0.02, 0.01, 0.01, 0.005),
(11, 'TN02', 'TN01', 'Dây thoát sét', 'Không bị đứt, không bị mất và được cố định chắc chắn vào thân cột.', 0.01, 0.005, 0.02, 0.01),
(12, 'TN01', 'TN02', 'Trần, mái, sàn, tường/vách phòng máy', 'Không thấm dột, sụt lún, nứt vỡ, không ẩm mốc, bong tróc, không có khe hở', 0.02, 0.01, 0.01, 0.005),
(13, 'TN01', 'TN02', 'Lỗ cáp nhập trạm', 'Dây đi qua lỗ trạm phải có độ võng tránh dẫn nước vào trạm, lỗ cáp nhập trạm phải được bịt kín.', 0.02, 0.01, 0.01, 0.005),
(14, 'TN02', 'TN01', 'Các vị trí đấu nối tiếp đất', 'Các mối hàn, đầu cốt, điểm đấu nối trên các thanh tiếp đất đảm bảo chắc chắn, không bị gỉ.', 0.01, 0.005, 0.02, 0.01),
(15, 'TN03', 'TN03', 'Vệ sinh phòng máy', 'Trần nhà, vách, sàn nhà sạch sẽ, không có bụi bẩn và mạng nhện. Nóc trạm vệ sinh sạch sẽ.', 0.02, 0.01, 0.02, 0.01),
(16, 'TN01', 'TN02', 'Bảng biển', 'Có đủ về số lượng, chữ không bị mờ.', 0.01, 0.01, 0.01, 0.01),
(17, 'TN01', 'TN02', 'Sơ đồ, sổ sách', 'Đủ các loại sơ đồ và được cập nhật theo quy định.Ghi chép đầy đủ sổ sách trong trạm theo quy định.', 0.02, 0.01, 0.01, 0.005),
(18, 'TN02', 'TN01', 'Dây kết nối (dây feeder, dây tín hiệu, dây nguồn…)', 'Đi dây gọn gàng, cố định chắc chắn, đối với dây quang phải đảm bảo bán kính uốn cong theo quy định.Đầy đủ nhãn cho các loại dây nguồn, dây tín hiệu, thiết bị theo đúng quy định. Thu hồi các dây không sử dụng', 0.01, 0.005, 0.02, 0.01),
(19, 'TN01', 'TN02', 'Điều hòa', 'Điều hòa hoạt động tốt, nhiệt độ phòng máy <= 26 oc. Không bị nước ngưng tụ, không có cảnh báo bất thường. Cục nóng có lồng bảo vệ (theo thiết kế), lắp khóa, không có động vật, côn trùng xâm nhập, ống bảo ôn được cuốn băng cách nhiệt đảm bảo.', 0.02, 0.01, 0.01, 0.005),
(20, 'TN01', 'TN02', 'Phòng đặt máy phát điện (máy nổ)', 'Đảm bảo an toàn, không thấm dột, không sụt lún', 0.02, 0.01, 0.01, 0.005),
(21, 'TN01', 'TN02', 'Vệ sinh phòng máy nổ, máy nổ', 'Sạch sẽ, không có bụi bẩn, không có dầu nhớt vương vãi.', 0.02, 0.01, 0.01, 0.005),
(22, 'TN01', 'TN02', 'Máy phát điện', 'Đủ chuôi cắm chuyên dụng, dây nguồn máy nổ đúng chủng loại, có đấu tiếp đất.Nhớt/dầu bôi trơn động cơ nằm giữa vạch min và max trên que thử nhớt, nhớt có màu vàng óng. Máy hoạt động bình thường, lọc gió sạch sẽ, không rách, tần số 50 + 1.5Hz (chạy không t', 0.02, 0.01, 0.01, 0.005),
(23, 'TN01', 'TN02', 'Ắc quy đề máy phát', 'Đấu nối chắc chắn, điện áp từ 12.5v -13.8v, mức dung dịch axit nằm giữ ngưỡng trên và ngưỡng dưới theo quy định.', 0.02, 0.01, 0.01, 0.005),
(24, 'TN02', 'TN01', 'Tiếp đất chống sét (chống sét ngoài trời và tiếp đất trong trạm).', 'Xiết chặt lại các đấu nối dây tiếp đất với thiết bị đảm bảo chắc chắn.Đo giá trị điện trở đất và khắc phục nếu không đạt yêu cầu (TN01 6 tháng/lần). Điện trở bãi tiếp đất của trạm <=4 Ω.', 0.01, 0.005, 0.02, 0.01),
(25, 'TN03', 'TN03', 'Vệ sinh bề mặt thiết bị', 'Bề mặt thiết bị, ODF sạch sẽ không có bụi bẩn và mạng nhện', 0.01, 0.01, 0.01, 0.01);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trachnhiem`
--

CREATE TABLE `trachnhiem` (
  `maTrachnhiem` varchar(50) NOT NULL,
  `tenTrachnhiem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `trachnhiem`
--

INSERT INTO `trachnhiem` (`maTrachnhiem`, `tenTrachnhiem`) VALUES
('TN01', 'Thực hiện'),
('TN02', 'Giám sát, báo cáo\r\n'),
('TN03', 'Thực hiện, Giám sát, Báo cáo\r\n'),
('TN04', 'jsd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tram`
--

CREATE TABLE `tram` (
  `maTram` varchar(50) NOT NULL,
  `maDonvi` varchar(10) NOT NULL,
  `maQuanli` varchar(10) NOT NULL,
  `maGiamsat` varchar(10) NOT NULL,
  `tenTram` varchar(100) NOT NULL,
  `diachiTram` varchar(100) DEFAULT NULL,
  `trangthaiTram` varchar(100) NOT NULL,
  `toadoX` float DEFAULT NULL,
  `toadoY` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tram`
--

INSERT INTO `tram` (`maTram`, `maDonvi`, `maQuanli`, `maGiamsat`, `tenTram`, `diachiTram`, `trangthaiTram`, `toadoX`, `toadoY`) VALUES
('CSHT_STG_00001', 'STG180000', 'STG013062', 'STG016163', 'AN-THANH-NHI_STG', 'Ấp Bình Du B, xã An Thạnh 2, huyện Cù Lao Dung, tỉnh Sóc Trăng.', '1', 9.61298, 106.199),
('CSHT_STG_00002', 'STG160000', 'CTV032144', 'STG020055', 'HUYNH-KY-2_STG', 'Ấp Huỳnh kỳ, xã Vĩnh Hải, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.37072, 106.149),
('CSHT_STG_00003', 'STG110000', 'STG006161', 'STG016257', 'STG-3_STG', 'Số 32, đường Pasteur, phường 8, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.59595, 105.98),
('CSHT_STG_00004', 'STG210000', 'STG014543', 'STG016207', 'Tan-Thanh-A_STG', 'Số 9, ấp Tân Quới B, xã Long Tân, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.59554, 105.63),
('CSHT_STG_00005', 'STG140000', 'STG012464', 'STG020065', 'Lung-Den_STG', 'Đại Hải- Kế An 2', '1', 0, 0),
('CSHT_STG_00006', 'STG190000', 'STG010370', 'STG016163', 'VIEN-BINH-2_STG', 'Ấp Đại Nôn, xã Liên Tú, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.48896, 106.116),
('CSHT_STG_00007', 'STG210000', 'STG014539', 'STG016207', 'NNA014A_STG', 'Số 25, ấp Cơi Nhì, xã Mỹ Bình, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.45114, 105.597),
('CSHT_STG_00008', 'STG110000', 'STG006161', 'STG016257', '30-4_STG', 'Số 770, đường 30 Tháng 4, khóm 1, phường 3, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.58114, 105.987),
('CSHT_STG_00009', 'STG110000', 'STG006161', 'STG016257', 'SAN-BAY_STG', 'Khóm 3, phường 2, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.58955, 105.962),
('CSHT_STG_00010', 'STG130000', 'STG009351', 'STG016183', 'My-Tu-2_STG', 'Số 68, ấp Trà Coi A, xã Mỹ Hương, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.62733, 105.84),
('CSHT_STG_00011', 'STG130000', 'STG009333', 'STG016183', 'Thien-Binh_STG', 'Ấp Thiện Nhơn, xã Thuận Hưng, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.60417, 105.832),
('CSHT_STG_00012', 'STG120000', 'STG009349', 'STG016183', 'Tan-Phuoc-B_STG', 'Số 26, ấp Tân Phước B, xã Long Hưng, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 0, 0),
('CSHT_STG_00013', 'STG160000', 'STG011433', 'STG020055', 'Ca-Lang-A_STG', 'Số 44, ấp Cà Lăng A, xã vĩnh Châu, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.32788, 106.009),
('CSHT_STG_00014', 'STG110000', 'STG006161', 'STG016257', 'SOC-TRANG-3_STG', 'Số 26, đường Pasteur, khóm 2, phường 8, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.61032, 105.98),
('CSHT_STG_00015', 'STG200000', 'STG008310', 'STG016207', 'THANH-TAN-1_STG', 'Ấp B1, xã Thạnh Tân, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.49713, 105.702),
('CSHT_STG_00016', 'STG130000', 'STG009331', 'STG016183', 'Bung-Coc_STG', 'Ấp Bưng Cóc, xã Phú Mỹ, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.57397, 105.911),
('CSHT_STG_00017', 'STG200000', 'CTV032170', 'STG016207', 'Xa-Lam-Kiet_STG', 'Ấp Kiết Bình, xã Lâm Kiết, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.52902, 105.83),
('CSHT_STG_00018', 'STG160000', 'STG011437', 'STG020055', 'DAI-BAI_STG', 'Ấp Đại Bái, xã Lạc Hòa, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.33642, 106.077),
('CSHT_STG_00019', 'STG150000', 'CTV051318', 'STG016201', 'Ha-Bo_STG', 'Ấp Hà Bô, xã Tài Văn, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.55342, 106.005),
('CSHT_STG_00020', 'STG140000', 'STG009336', 'STG020065', 'Mang-Ca_STG', 'Đại Hải - Kế An 1', '1', 0, 0),
('CSHT_STG_00021', 'STG150000', 'STG007271', 'STG016201', 'SOC-BUNG_STG', 'Ấp Sóc Bưng, xã Thạnh Phú, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00022', 'STG160000', 'STG011428', 'STG020055', 'TRA-NIEN_STG', 'Ấp Trà Niên, xã Khánh Hòa, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.38113, 106),
('CSHT_STG_00023', 'STG180000', 'STG013055', 'STG016163', 'AN-THANH-1_STG', 'Ấp An Thường, xã An Thạnh 1, huyện Cù Lao Dung, tỉnh Sóc Trăng.', '1', 9.74078, 106.093),
('CSHT_STG_00024', 'STG110000', 'STG006161', 'STG016257', 'Minh-Chau_STG', 'Số 90, quốc lộ 1, khóm 2, phường 7, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.62674, 105.957),
('CSHT_STG_00025', 'STG110000', 'STG006161', 'STG016257', 'Mua-Xuan_STG', 'Số 515, đường Lê Hồng Phong, phường 3, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.58543, 105.976),
('CSHT_STG_00026', 'STG210000', 'STG014541', 'STG016207', 'VINH-QUOI_STG', 'Ấp Vĩnh Thuận, xã Vĩnh Quới, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.58101, 105.568),
('CSHT_STG_00027', 'STG150000', 'STG007287', 'STG016201', 'MXU026A_STG', 'Ấp Nguyễn Mận , xã Ngọc Tố, huyện Mỹ Xuyên, tỉnh Sóc Trăng', '0', 0, 0),
('CSHT_STG_00028', 'STG150000', 'STG007285', 'STG016201', 'MXU025A_STG', 'Ấp Ponocampoth, xã Tham Đôn, huyện Mỹ Xuyên, tỉnh Sóc Trăng', '0', 0, 0),
('CSHT_STG_00029', 'STG120000', 'STG009349', 'STG016183', 'Thien-My_STG', 'Trạm viễn thông Thiện Mỹ, ấp Mỹ An, xã Thiện Mỹ, huyện Châu Thành, tỉnh Sóc Trăng.', '1', 0, 0),
('CSHT_STG_00030', 'STG140000', 'STG012480', 'STG020065', 'Trinh-Phu_STG', 'KV Thới An Hội - Ba Trinh 1', '1', 0, 0),
('CSHT_STG_00031', 'STG110000', 'STG006161', 'STG016257', 'STG-10_STG', 'Số 300, đường Lý Thường Kiệt, phường 4, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60503, 105.982),
('CSHT_STG_00032', 'STG170000', 'CTV041607', 'STG016210', 'Ap-1_STG', 'Ấp 1, thị trấn Long Phú, huyện Long Phú, tỉnh Sóc Trăng.', '1', 9.63423, 106.132),
('CSHT_STG_00033', 'STG200000', 'CTV032165', 'STG016207', 'XA-MAO_STG', 'Ấp Xa Mau, thị trấn Phú Lộc, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.41204, 105.724),
('CSHT_STG_00034', 'STG190000', 'STG020130', 'STG016163', 'AN-HIA_STG', 'Ấp An Hòa, xã Thạnh Thới An, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.51647, 106.007),
('CSHT_STG_00035', 'STG110000', 'STG006161', 'STG016257', 'Cau-Khanh-Hung_STG', 'Số 36/39, quốc lộ 1, phường 2, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60882, 105.963),
('CSHT_STG_00036', 'STG160000', 'STG011422', 'STG020055', 'HOA-QUOI-A_STG', 'Ấp Tân Tĩnh, xã Vĩnh Hiệp, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.40399, 105.938),
('CSHT_STG_00037', 'STG130000', 'STG009347', 'STG016183', 'My-Thuan_STG', 'Trạm viễn thông Mỹ Thuận, ấp Tam Sóc A, xã Mỹ Thuận, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.56297, 105.827),
('CSHT_STG_00038', 'STG120000', 'STG020131', 'STG016183', 'Stg-5_STG', 'Số 65, ấp Phước Hòa, xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng.', '1', 0, 0),
('CSHT_STG_00039', 'STG120000', 'CTV041574', 'STG016183', 'CTH013A_STG', 'Số 100, ấp Phú Hòa A, xã Phú Tâm, huyện Châu Thành, tỉnh Sóc Trăng.', '1', 0, 0),
('CSHT_STG_00040', 'STG210000', 'STG014539', 'STG016207', 'NNA011A_STG', 'Số 5, ấp Mỹ Phước, xã Mỹ Bình, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.48438, 105.594),
('CSHT_STG_00041', 'STG160000', 'STG011430', 'STG020055', 'VCH026A_STG', 'Số 126, ấp Xum Thum, xã Lai Hòa, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.28892, 105.867),
('CSHT_STG_00042', 'STG160000', 'STG011433', 'STG020055', 'VCH027A_STG', 'Số 164, khóm Đai Rụng, phường 2, thị xã Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.34724, 106.027),
('CSHT_STG_00043', 'STG120000', 'STG009348', 'STG016183', 'AN-TRACH_STG', 'Số 329/6, ấp An Trạch, xã An Hiệp, huyện Châu Thành, tỉnh Sóc Trăng.', '1', 0, 0),
('CSHT_STG_00044', 'STG180000', 'STG013062', 'STG016163', 'CLD008A_STG', 'Ấp Võ Thành Văn, xã An Thạnh Nam, huyện Cù Lao Dung, tỉnh Sóc Trăng.', '1', 9.54363, 106.259),
('CSHT_STG_00045', 'STG110000', 'STG006161', 'STG016257', 'HO-NUOC-NGOT_STG', 'Số 242, đường Điện Biên Phủ, khối 2, phường 6, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60874, 105.969),
('CSHT_STG_00046', 'STG110000', 'STG006161', 'STG016257', 'Stg-6_STG', 'Số 338, đường 30 Tháng 4, khóm 1, phường 3, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.58671, 105.955),
('CSHT_STG_00047', 'STG140000', 'STG012468', 'STG020065', 'Kinh-Giua_STG', 'KV Kế Sách - An Mỹ - Nhơn Mỹ 3', '1', 0, 0),
('CSHT_STG_00048', 'STG190000', 'STG010370', 'STG016163', 'MO-O-QUOC-HAI_STG', 'Ấp Nam Chánh, xã Lịch Hội Thượng, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.45601, 106.157),
('CSHT_STG_00049', 'STG170000', 'CTV041607', 'STG016210', 'Muoi-Chien_STG', 'Số 145, ấp Mười Chiến, xã Long Phú, huyện Long Phú, tỉnh Sóc Trăng.', '1', 9.58065, 106.17),
('CSHT_STG_00050', 'STG110000', 'STG006161', 'STG016257', 'Tran-Hung-Dao_STG', 'Số 199/4/7, đường Trần Hưng Đạo, khóm 8, phường 3, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.59389, 105.97),
('CSHT_STG_00051', 'STG170000', 'STG013056', 'STG016210', 'LPH016A_STG', 'Số 177, tổ 5, ấp Ngãi Phước, Xã Đại Ngãi, huyện Long Phú, tỉnh Sóc Trăng.', '1', 9.74083, 106.045),
('CSHT_STG_00052', 'STG140000', 'STG012477', 'STG020065', 'KSA020A_STG', 'KV Kế Sách - An Mỹ - Nhơn Mỹ 1', '1', 9.78064, 106.039),
('CSHT_STG_00053', 'STG140000', 'STG012480', 'STG020065', 'KSA021A_STG', 'KV Thới An Hội - Ba Trinh 2', '1', 9.82919, 105.927),
('CSHT_STG_00054', 'STG210000', 'STG014539', 'STG016207', 'NNA013A_STG', 'Ấp Mỹ Tây B, xã Mỹ Quới, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.48767, 105.557),
('CSHT_STG_00055', 'STG190000', 'STG010370', 'STG016163', 'TDE020A_STG', 'Ấp Mỏ Ó, xã Trung Bình, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.43064, 106.171),
('CSHT_STG_00056', 'STG140000', 'STG012463', 'STG020065', 'AN-MY_STG', 'KV Kế Sách - An Mỹ - Nhơn Mỹ 2', '1', 0, 0),
('CSHT_STG_00057', 'STG140000', 'STG012479', 'STG020065', 'AN-LAC-THON_STG', 'Cái Côn', '1', 0, 0),
('CSHT_STG_00058', 'STG110000', 'STG006161', 'STG016257', 'Luong-Dinh-Cua_STG', 'Số 87, đường Lương Đình Của, phường 8, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.65048, 105.997),
('CSHT_STG_00059', 'STG160000', 'STG011428', 'STG020055', 'NGUYEN-UT_STG', 'Ấp Nguyễn Út, xã Hòa Đông, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.44183, 106.032),
('CSHT_STG_00060', 'STG150000', 'CTV051318', 'STG016201', 'MXU028A_STG', 'Tỉnh lộ 8, ấp Thạnh Lợi, thị trấn Mỹ Xuyên, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '1', 9.55747, 105.995),
('CSHT_STG_00061', 'STG150000', 'CTV032151', 'STG016201', 'MXU029A_STG', 'Số 26A, tỉnh lộ 8, ấp Châu Thành, thị trấn Mỹ Xuyên, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '1', 9.56915, 105.979),
('CSHT_STG_00062', 'STG150000', 'STG007271', 'STG016201', 'MXU030A_STG', 'Ấp Phú Giao, xã Thạnh Quới, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '1', 9.44177, 105.774),
('CSHT_STG_00063', 'STG110000', 'STG006161', 'STG016257', 'STR033A_STG', 'Số 540A, đường Lê Duẩn, khóm 4, phường 10, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60459, 105.992),
('CSHT_STG_00064', 'STG110000', 'STG006161', 'STG016257', 'STR034A_STG', 'Số 187, đường Phạm Hùng, khóm 3, phường 8, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.61176, 105.986),
('CSHT_STG_00065', 'STG110000', 'STG006161', 'STG016257', 'STR036A_STG', 'Đường Mạc Đĩnh Chi, khóm 3, phường 9, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60039, 105.98),
('CSHT_STG_00066', 'STG190000', 'CTV032161', 'STG016163', 'BAY-GIA_STG', 'Ấp Chợ, xã Trung Bình, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.49686, 106.199),
('CSHT_STG_00067', 'STG110000', 'STG006161', 'STG016257', 'STR038A_STG', 'Số 567, quốc lộ 1, khóm 4, phường 2, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60387, 105.961),
('CSHT_STG_00068', 'STG140000', 'STG012477', 'STG020065', 'CON-MY-PHUOC_STG', 'KV Kế Sách - An Mỹ - Nhơn Mỹ 1', '1', 0, 0),
('CSHT_STG_00069', 'STG200000', 'CTV032170', 'STG016207', 'Thanh-Tan-2_STG', 'Ấp Tân Phước, xã Thạnh Tân, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.54274, 105.732),
('CSHT_STG_00071', 'STG160000', 'CTV032144', 'STG020055', 'Vinh-Hai_STG', 'Bưu cục xã Vĩnh Hải, thị xã Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.35367, 106.114),
('CSHT_STG_00072', 'STG140000', 'STG011440', 'STG020065', 'Thoi-An-Hoi_STG', 'KV Thới An Hội - Ba Trinh 2', '1', 0, 0),
('CSHT_STG_00073', 'STG120000', 'STG006188', 'STG016183', 'THUAN-HOA_STG', 'Bưu cục Thuận Hòa, thị trấn Châu Thành, huyện Châu Thành, tỉnh Sóc Trăng.', '1', 0, 0),
('CSHT_STG_00074', 'STG200000', 'STG008310', 'STG016207', 'THANH-TRI_STG', 'Viễn thông huyện Thạnh Trị, ấp 2, thị trấn Phú lộc, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.42972, 105.747),
('CSHT_STG_00075', 'STG150000', 'STG007262', 'STG016201', 'My-Xuyen_STG', 'Bưu cục Mỹ Xuyên,Số 1, đường Lê Lợi, thị trấn Mỹ Xuyên, huyện Mỹ xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00076', 'STG150000', 'STG007257', 'STG016201', 'THANH-PHU_STG', 'Ấp Khu 1, xã Thạnh Phú, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00077', 'STG110000', 'STG006161', 'STG016257', 'SOC-TRANG_STG', 'VNPT Sóc Trăng, số 02, đường Trần Hưng Đạo, phường 2, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60292, 105.972),
('CSHT_STG_00078', 'STG170000', 'STG010361', 'STG016210', 'Tan-Thanh_STG', 'Đài VT Tân Thạnh, xã Tân Thạnh, huyện Long Phú, tỉnh Sóc Trăng', '1', 9.62337, 106.04),
('CSHT_STG_00079', 'STG160000', 'STG011420', 'STG020055', 'VINH-PHUOC_STG', 'Bưu điện Vĩnh Phước, ấp Xẻo Me, xã Vĩnh Phước, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.31329, 105.935),
('CSHT_STG_00080', 'STG150000', 'CTV032145', 'STG016201', 'Ngoc-To_STG', 'Trạm viễn thông Ngọc Tố, ấp Cổ Cò, xã Ngọc Tố, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00081', 'STG180000', 'STG013062', 'STG016163', 'An-Thanh-3_STG', 'Ấp An Nghiệp, xã An Thạnh 3, huyện Cù Lao Dung, tỉnh Sóc Trăng.', '1', 9.57292, 106.251),
('CSHT_STG_00082', 'STG130000', 'STG009333', 'STG016183', 'My-Tu_STG', 'Bưu điện Mỹ Tú, ấp Nội Ô, thị trấn Huỳnh Hữu Nghĩa, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.63547, 105.818),
('CSHT_STG_00083', 'STG120000', 'STG006188', 'STG016183', 'Ho-Dac-Kien_STG', 'Số 186, ấp Cổng Đôi, xã Hồ Đắc Kiện, huyện Châu Thành, tỉnh Sóc Trăng.', '1', 0, 0),
('CSHT_STG_00084', 'STG150000', 'STG007263', 'STG016201', 'Gia-Hoa-1_STG', 'Trạm viễn thông Gia Hòa 1, ấp Vĩnh B, xã Gia Hòa 1, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00085', 'STG130000', 'STG009331', 'STG016183', 'Bo-Thao_STG', 'Ấp Châu Thành, xã An Ninh, huyện Châu Thành, tỉnh Sóc Trăng.', '1', 9.59816, 105.908),
('CSHT_STG_00086', 'STG170000', 'STG010350', 'STG016210', 'Chau-Khanh_STG', 'Ấp Phú Hữu, xã Phú Hữu, huyện Long Phú, tỉnh Sóc Trăng', '1', 9.68943, 106.057),
('CSHT_STG_00087', 'STG160000', 'STG011433', 'STG020055', 'VINH-CHAU-2_STG', 'Ấp Sân Chim, xã Vĩnh Châu, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.33195, 106.041),
('CSHT_STG_00088', 'STG200000', 'STG008306', 'STG016207', 'Vinh-Loi_STG', 'Bưu điện văn hóa xã Vĩnh Lợi, ấp 15, xã Vĩnh Lợi, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.45092, 105.632),
('CSHT_STG_00089', 'STG210000', 'STG014541', 'STG016207', 'TRAM-VT-NGA-5_STG', 'Trung tâm viễn thông Ngã Năm, ấp 1, thị trấn Ngã Năm, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.56388, 105.598),
('CSHT_STG_00090', 'STG190000', 'STG010355', 'STG016163', 'TRUNG-BINH-2_STG', 'Tỉnh lộ 8, ấp Cảng, thị trấn Trần Đề, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.52095, 106.192),
('CSHT_STG_00091', 'STG150000', 'STG007270', 'STG016201', 'Nghia-Thang_STG', 'Ấp Đại Nghĩa Thắng, xã Đại Tâm, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00092', 'STG200000', 'STG008310', 'STG016207', 'XA-THANH-TRI_STG', 'Số 16, ấp Tà Điếp C1, xã Thạnh Trị, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.45943, 105.721),
('CSHT_STG_00093', 'STG190000', 'STG020130', 'STG016163', 'Bung-Chong-Tai-Van_STG', 'Ấp Bưng Cà Pốt, xã Tài Văn, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.56232, 106.068),
('CSHT_STG_00094', 'STG160000', 'CTV032150', 'STG020055', 'Cap-QB-Giong-Du_STG', 'Tỉnh lộ 11, khu 2, thị trấn Vĩnh Châu, huyện Vĩnh Châu, tỉnh Sóc trăng.', '1', 9.32899, 105.98),
('CSHT_STG_00095', 'STG150000', 'STG007285', 'STG016201', 'KENH-SA-LON_STG', 'Ấp Sông Cái 2, xã Tham Đôn, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00096', 'STG150000', 'STG007270', 'STG016201', 'THANH-PHU-2_STG', 'Ấp Nghĩa Thắng, xã Đại Tâm, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00097', 'STG190000', 'STG020130', 'STG016163', 'TAI-VAN_STG', 'Trạm viễn thông Tài Văn, ấp Chắc Tân, xã Tài Văn, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.54046, 106.024),
('CSHT_STG_00098', 'STG190000', 'STG010370', 'STG016163', 'LIEU-TU_STG', 'Ấp Giồng Chát, xã Liêu Tú, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.43371, 106.12),
('CSHT_STG_00099', 'STG160000', 'STG011437', 'STG020055', 'Hoa-Dong_STG', 'Ấp Non Tom, xã Hòa Đông, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.40888, 106.083),
('CSHT_STG_00100', 'STG210000', 'STG014543', 'STG016207', 'Long-Tan_STG', 'Số 376, ấp Tân Lập B, xã Long Tân, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.62393, 105.66),
('CSHT_STG_00101', 'STG210000', 'CTV032167', 'STG016207', 'LONG-BINH_STG', 'Ấp Tân Bình, xã Long Bình, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.54768, 105.631),
('CSHT_STG_00102', 'STG180000', 'STG013055', 'STG016163', 'An-Thanh-Tay_STG', 'Ấp An Lạc, xã An Thạnh Tây, huyện Cù Lao Dung, tỉnh Sóc Trăng.', '1', 9.70186, 106.122),
('CSHT_STG_00103', 'STG200000', 'CTV032170', 'STG016207', 'Lam-Tan_STG', 'Tầng 1, ấp Kiết Nhất B, Lâm Tân, Thạnh Trị, Sóc Trăng', '1', 9.52369, 105.79),
('CSHT_STG_00104', 'STG150000', 'STG007263', 'STG016201', 'GIA-HOA-2_STG', 'Ấp Bình Hòa, xã Gia Hòa 2, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00105', 'STG130000', 'STG020064', 'STG016183', 'Phuoc-Thoi-A_STG', 'Số 27, ấp Phước Thới A, xã Mỹ Phước, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.60859, 105.702),
('CSHT_STG_00106', 'STG130000', 'STG009333', 'STG016183', 'Tan-Hoa-A_STG', 'Số 72, ấp Tân Hòa A, xã Long Hưng, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.67251, 105.799),
('CSHT_STG_00107', 'STG110000', 'STG006161', 'STG016257', 'STR032A_STG', 'Số 962/29/80, quốc lộ 1, khu 3, phường 10, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.58133, 105.951),
('CSHT_STG_00108', 'STG130000', 'STG009347', 'STG016183', 'MTU017A_STG', 'Ấp Phước Trường B, xã Mỹ Phước, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.57241, 105.703),
('CSHT_STG_00109', 'STG190000', 'STG020130', 'STG016163', 'Thanh-Thoi-An-2_STG', 'Ấp Tiên Cường 1, xã Thạnh Thới An, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.46972, 105.999),
('CSHT_STG_00110', 'STG210000', 'STG014539', 'STG016207', 'Xa-My-Binh_STG', 'Số 666, ấp Mỹ Hòa, xã Long Bình, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.50108, 105.61),
('CSHT_STG_00111', 'STG130000', 'STG015350', 'STG016183', 'Xa-My-Tu-2_STG', 'Số 82, ấp Mỹ Lợi C, xã Mỹ Tú, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.63748, 105.744),
('CSHT_STG_00112', 'STG180000', 'STG013062', 'STG016163', 'An-Thanh-Nam_STG', 'Ấp Vàm Hồ, xã An Thạnh Nam, huyện Cù Lao Dung, tỉnh Sóc Trăng.', '1', 9.51514, 106.234),
('CSHT_STG_00113', 'STG210000', 'STG014543', 'STG016207', 'Tan-Chanh-A_STG', 'Số 116, ấp Tân Chánh A, xã Long Tân, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.58372, 105.665),
('CSHT_STG_00114', 'STG160000', 'STG011422', 'STG020055', 'Vinh-Hiep_STG', 'Ấp Ngã Tư, xã Vĩnh Hiệp, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.38204, 105.973),
('CSHT_STG_00115', 'STG160000', 'STG011420', 'STG020055', 'VINH-TAN_STG', 'Ấp Trà Vôn A, xã Vĩnh Tân, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.31387, 105.886),
('CSHT_STG_00116', 'STG160000', 'STG011430', 'STG020055', 'Lai-Hoa_STG', 'Bưu cục Lai Hòa, ấp Lai Hòa, xã Lai Hòa, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.31621, 105.832),
('CSHT_STG_00117', 'STG160000', 'CTV032150', 'STG020055', 'VINH-CHAU_STG', 'Khu 1, đường Nguyễn Huệ, thị trấn Vĩnh Châu, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.32423, 105.981),
('CSHT_STG_00118', 'STG150000', 'STG007287', 'STG016201', 'HOA-TU_STG', 'Ấp Hòa Trực, xã Hòa Tú 1, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00119', 'STG160000', 'STG011428', 'STG020055', 'Khanh-Hoa_STG', 'Ấp Huỳnh Thu, xã Khánh Hòa, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.42462, 105.997),
('CSHT_STG_00120', 'STG190000', 'STG007290', 'STG016163', 'Vien-Binh_STG', 'Ấp Đào Viên, xã Viên Bình, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.50774, 106.079),
('CSHT_STG_00121', 'STG110000', 'STG006161', 'STG016257', 'NGA-3-TRA-TIM_STG', 'Ngã 3 Trà Tim, số 1204, quốc lộ 1, khóm 2, phường 10, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.56909, 105.95),
('CSHT_STG_00122', 'STG160000', 'STG011437', 'STG020055', 'Lac-Hoa_STG', 'Ấp Ca Lạc, xã Lạc Hòa, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.36058, 106.074),
('CSHT_STG_00123', 'STG110000', 'STG006161', 'STG016257', 'STG-1_STG', 'Số 81, đường Nguyễn Chí Thanh, khóm 5, phường 6, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60967, 105.974),
('CSHT_STG_00124', 'STG110000', 'STG006161', 'STG016257', 'TAN-THANH-2_STG', 'Số 718, đường Phạm Hùng, khóm 3, phường 6, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.61786, 106.02),
('CSHT_STG_00125', 'STG130000', 'STG015350', 'STG016183', 'Xa-My-Tu_STG', 'Ấp Mỹ Bình, xã Mỹ Tú, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.60823, 105.776),
('CSHT_STG_00126', 'STG130000', 'STG009347', 'STG016183', 'Tra-Lay_STG', 'Số 59, ấp Bố Liên 3, xã Thuận Hưng, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.57298, 105.86),
('CSHT_STG_00127', 'STG170000', 'CTV041607', 'STG016210', 'LONG-PHU_STG', 'Bưu điện Long Phú, thị trấn Long Phú, huyện Long Phú, tỉnh Sóc Trăng.', '1', 9.60872, 106.125),
('CSHT_STG_00128', 'STG190000', 'STG010370', 'STG016163', 'Lich-Hoi-Thuong_STG', 'Bưu cục Lịch Hội Thượng, đường Hai Bà Trưng, ấp Châu Thành, thị trấn Lịch Hội Thượng, huyện Trần Đề,', '1', 9.47666, 106.148),
('CSHT_STG_00129', 'STG160000', 'STG011430', 'STG020055', 'PREY-CHOP_STG', 'Ấp Pray Chop, xã Lai Hòa, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.27125, 105.845),
('CSHT_STG_00130', 'STG210000', 'STG009340', 'STG016207', 'Vinh-Bien_STG', 'Số 9, ấp Vĩnh Biên, xã Vĩnh Biên, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.53539, 105.566),
('CSHT_STG_00131', 'STG170000', 'STG010349', 'STG016210', 'Bung-Thung_STG', 'Số 37, tổ 1, ấp Bưng Thum, xã Long Phú, huyện Long Phú, tỉnh Sóc Trăng.', '1', 9.57795, 106.106),
('CSHT_STG_00132', 'STG170000', 'CTV041607', 'STG016210', 'Ap-2-Long-Phu_STG', 'Quan Ong Teo, ấp 2, thị trấn Long Phú, huyện Long Phú, tỉnh Sóc Trăng.', '1', 9.61497, 106.135),
('CSHT_STG_00133', 'STG110000', 'STG006161', 'STG016257', 'PHUONG-6_STG', 'Số 153, kênh 30/4, khu 6, phường 6, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.62151, 105.969),
('CSHT_STG_00134', 'STG170000', 'STG010358', 'STG016210', 'Loi-Duc_STG', 'Số 44, ấp Lợi Đức, xã Long Đức, huyện Long Phú, tỉnh Sóc Trăng.', '1', 9.68536, 106.1),
('CSHT_STG_00135', 'STG120000', 'CTV041628', 'STG016183', 'Phu-Tam_STG', 'Ấp Phú Hữu, xã Phú Tâm, huyện Châu Thành, tỉnh Sóc Trăng.', '1', 0, 0),
('CSHT_STG_00136', 'STG140000', 'STG012479', 'STG020065', 'PHONG-NAM_STG', 'Cái Côn', '1', 0, 0),
('CSHT_STG_00137', 'STG110000', 'STG006161', 'STG016257', 'PHUONG-2_STG', 'Số 55, đường Phú Lợi, phường 2, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.59738, 105.965),
('CSHT_STG_00138', 'STG130000', 'STG020064', 'STG016183', 'Phuong-Hoa_STG', 'Ấp Tân Thành, xã Long Hưng, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.69874, 105.76),
('CSHT_STG_00140', 'STG170000', 'STG010345', 'STG016210', 'Truong-Khanh_STG', 'Bưu điện văn hóa xã Trường Khánh, xã Trường Khánh, huyện Long Phú, tỉnh Sóc Trăng.', '1', 9.67672, 106.009),
('CSHT_STG_00141', 'STG150000', 'STG007281', 'STG016201', 'HOA-TU-2_STG', 'Trạm viễn thông Hòa Tú 2, ấp Dương Kiểng, xã Hòa Tú 2, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00142', 'STG210000', 'STG014539', 'STG016207', 'MY-QUOI_STG', 'Bưu cục Mỹ Quới, ấp Mỹ Thành, xã Mỹ Quới, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.46549, 105.572),
('CSHT_STG_00143', 'STG170000', 'STG010350', 'STG016210', 'CHAU-KHANH-LONG-PHU_STG', 'Ấp 2 xã Châu Khánh huyện Long Phú - STG', '1', 9.65756, 106.055),
('CSHT_STG_00144', 'STG110000', 'STG006161', 'STG016257', 'PHUONG-7_STG', 'Khóm 5, đường Nam Kỳ Khởi Nghĩa, phường 7, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60981, 105.954),
('CSHT_STG_00145', 'STG150000', 'STG007285', 'STG016201', 'Tham-Don_STG', 'Ấp Tắc Gồng, xã Tham Đôn, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00146', 'STG110000', 'STG006161', 'STG016257', 'PHUONG-8_STG', 'Số 46, đường Phạm Hùng, phường 8, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.61398, 106.001),
('CSHT_STG_00147', 'STG110000', 'STG006161', 'STG016257', 'Phuong-5_STG', 'Số 502, đường Tôn Đức Thắng, phường 5, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.62469, 105.986),
('CSHT_STG_00148', 'STG110000', 'STG006161', 'STG016257', 'Phuong-3_STG', 'Số 494, đường Lê Hồng Phong, phường 3, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.57576, 105.977),
('CSHT_STG_00149', 'STG110000', 'STG006161', 'STG016257', 'Phuong-3-1_STG', 'Số 25/47, hẻm 25, đường Trần Hưng Đạo, khóm 8, phường 3, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.58249, 105.964),
('CSHT_STG_00150', 'STG110000', 'STG006161', 'STG016257', 'PHUONG-4_STG', 'Số 758, đường Lý Thường Kiệt, phường 4, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60623, 105.999),
('CSHT_STG_00151', 'STG200000', 'STG008310', 'STG016207', 'Ta-Lot-C_STG', 'Ấp 22, xã Thạnh Trị, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.47144, 105.672),
('CSHT_STG_00152', 'STG150000', 'STG007271', 'STG016201', 'THANH-QUOI_STG', 'Trạm viễn thông Thạnh Quới, xã Thạnh Quới huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00153', 'STG190000', 'STG010365', 'STG016163', 'Ap-Cho-Tu-Diem_STG', 'Ấp Chợ, xã Đại Ân 2, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.55818, 106.133),
('CSHT_STG_00154', 'STG140000', 'STG012480', 'STG020065', 'BA-TRINH_STG', 'KV Thới An Hội - Ba Trinh 1', '1', 0, 0),
('CSHT_STG_00155', 'STG140000', 'STG012477', 'STG020065', 'KE-SACH_STG', 'KV Kế Sách - An Mỹ - Nhơn Mỹ 1', '1', 0, 0),
('CSHT_STG_00156', 'STG150000', 'STG007257', 'STG016201', 'MXU027A_STG', 'Ấp Phú Thuận, xã Thạnh Phú, huyện Mỹ Xuyên, tỉnh Sóc Trăng', '1', 9.47721, 105.852),
('CSHT_STG_00157', 'STG130000', 'STG015350', 'STG016183', 'My-Loi-A_STG', 'Số 182, ấp Mỹ Lợi A, thị trấn Huỳnh Hữu Nghĩa, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.64238, 105.786),
('CSHT_STG_00158', 'STG110000', 'STG006161', 'STG016257', '45-Nguyen-Van-Troi_STG', 'Số 45, đường Nguyễn Văn Trỗi, phường 1, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60474, 105.976),
('CSHT_STG_00159', 'STG140000', 'STG009336', 'STG020065', 'KSA019A_STG', 'Đại Hải - Kế An 2', '1', 9.76484, 105.854),
('CSHT_STG_00160', 'STG120000', 'STG009349', 'STG016183', 'DAC-THANG_STG', 'Số 88, ấp Đắc Thắng, xã Hồ Đắc Kiện, huyện Châu Thành, tỉnh Sóc Trăng.', '1', 0, 0),
('CSHT_STG_00161', 'STG140000', 'CTV043725', 'STG020065', 'Xuan-Hoa_STG', 'Xuân Hòa - Phong Nẫm', '1', 0, 0),
('CSHT_STG_00162', 'STG130000', 'STG009347', 'STG016183', 'MY-PHUOC_STG', 'Điểm bưu điện văn hóa xã Mỹ Phước, ấp Phước Ninh, xã Mỹ Phước, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.59165, 105.739),
('CSHT_STG_00163', 'STG110000', 'STG006161', 'STG016257', 'KCN-An-Nghiep_STG', 'Khu công nghiệp An Nghiệp, xã An Hiệp, huyện Châu Thành, tỉnh Sóc Trăng.', '1', 9.63923, 105.95),
('CSHT_STG_00164', 'STG110000', 'STG006161', 'STG016257', 'Stg-9_STG', 'Số 776, quốc lộ 1,P7,P2, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.59431, 105.958),
('CSHT_STG_00165', 'STG130000', 'STG009351', 'STG016183', 'My-Huong_STG', 'Ấp Xẻo Dừa, xã Mỹ Hương, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.61603, 105.859),
('CSHT_STG_00166', 'STG150000', 'CTV032145', 'STG016201', 'NGOC-DONG_STG', 'Trạm viễn thông Ngọc Đông, ấp Hòa Thượng, xã Ngọc Đông, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00167', 'STG190000', 'STG010370', 'STG016163', 'Tra-Ong_STG', 'Ấp Tổng Cán, xã Liêu Tú, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.45318, 106.087),
('CSHT_STG_00168', 'STG110000', 'STG006161', 'STG016257', 'STG-4-HUNG-VUONG-P6_STG', 'Tầng 1, hẻm 63/8 Hùng Vương, P6, Sóc Trăng.', '1', 9.61398, 105.967),
('CSHT_STG_00169', 'STG140000', 'STG012463', 'STG020065', 'Thoi-An-Hoi-2_STG', 'KV Kế Sách - An Mỹ - Nhơn Mỹ 2', '1', 0, 0),
('CSHT_STG_00170', 'STG170000', 'STG013056', 'STG016210', 'Phung-Tuong_STG', 'Số A119, ấp Phụng Tường 1, xã Song Phụng, huyện long Phú, tỉnh Sóc Trăng.', '1', 9.76603, 106.05),
('CSHT_STG_00171', 'STG180000', 'STG013052', 'STG016163', 'Cu-Lao-Dung_STG', 'Bưu cục Cù Lao Dung, thị trấn Cù Lao Dung, tỉnh Sóc Trăng', '1', 9.66361, 106.149),
('CSHT_STG_00172', 'STG140000', 'CTV043725', 'STG020065', 'Hoa-Loc-1_STG', 'Xuân Hòa - Phong Nẫm', '1', 0, 0),
('CSHT_STG_00173', 'STG120000', 'CTV041574', 'STG016183', 'Thuan-Hoa-2_STG', 'Số 68, ấp Trà Canh B, xã Thuận Hòa, huyện Châu Thành, tỉnh Sóc Trăng.', '1', 0, 0),
('CSHT_STG_00174', 'STG130000', 'STG020064', 'STG016183', 'Hung-Phu_STG', 'Bưu điện văn hóa xã Hưng Phú, ấp Phương Bình 2, xã Hưng Phú, huyện Mỹ Tú, tỉnh Sóc Trăng.', '1', 9.67738, 105.726),
('CSHT_STG_00175', 'STG150000', 'STG007281', 'STG016201', 'HUU-CAN_STG', 'Số 4, ấp Hữu Cặn, xã Hòa Tú 2, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00176', 'STG140000', 'STG012464', 'STG020065', 'KE-AN_STG', 'Đại Hải- Kế An 2', '1', 0, 0),
('CSHT_STG_00177', 'STG160000', 'CTV032150', 'STG020055', 'VCH024A_STG', 'Khu phố 6, Thị Trấn Vĩnh Châu, huyện vĩnh Châu, Sóc Trăng.', '1', 9.30971, 105.984),
('CSHT_STG_00178', 'STG190000', 'STG020130', 'STG016163', 'THANH-THOI-AN_STG', 'Ấp Đầy Hương 3, xã Thạnh Thới An, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.48518, 106.03),
('CSHT_STG_00179', 'STG140000', 'STG012468', 'STG020065', 'KSA018A_STG', 'KV Kế Sách - An Mỹ - Nhơn Mỹ 3', '1', 9.75618, 105.985),
('CSHT_STG_00180', 'STG200000', 'CTV032165', 'STG016207', 'Tuan-Tuc_STG', 'Bưu điện văn hóa xã Tuân Tức, ấp Trung Hòa, xã Tuân Tức, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.47738, 105.74),
('CSHT_STG_00181', 'STG110000', 'STG006161', 'STG016257', 'PHUONG-9_STG', 'Đường Mạc Đĩnh Chi, khóm 6, phường 9, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.59035, 106.008),
('CSHT_STG_00182', 'STG210000', 'CTV032167', 'STG016207', 'Tan-Long_STG', 'Bưu điện văn hóa xã Tân Long, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.52466, 105.671),
('CSHT_STG_00183', 'STG120000', 'STG009349', 'STG016183', 'MTU020_STG', '155 ấp An Tập, xã An Hiệp, huyện Châu Thành, tỉnh Sóc Trăng', '1', 0, 0),
('CSHT_STG_00184', 'STG140000', 'STG011440', 'STG020065', 'KSA024A_STG', 'KV Thới An Hội - Ba Trinh 2', '1', 9.85391, 105.974),
('CSHT_STG_00185', 'STG120000', 'CTV041574', 'STG016183', 'CTH016A_STG', '178 ấp Xây Đá B, xã Hồ Đắc Kiện, huyện Châu Thành, tỉnh Sóc Trăng', '1', 0, 0),
('CSHT_STG_00186', 'STG140000', 'STG009336', 'STG020065', 'TRUNG-HAI_STG', 'Đại Hải - Kế An 1', '1', 0, 0),
('CSHT_STG_00187', 'STG190000', 'STG010365', 'STG016163', 'TRUNG-BINH_STG', 'Bưu cục Đại An 2, xã Đại Ân 2, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.54803, 106.17),
('CSHT_STG_00188', 'STG110000', 'STG006161', 'STG016257', 'SOC-TRANG-2_STG', '668 Quốc lộ 1, Phường 2, Thành phố Sóc Trăng, Sóc Trăng', '1', 9.60001, 105.959),
('CSHT_STG_00189', 'STG150000', 'STG007287', 'STG016201', 'DINH-HOA_STG', 'Số 134, ấp Định Hòa, xã Gia Hòa 1, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00190', 'STG170000', 'STG010361', 'STG016210', 'Tan-Hung_STG', 'Ấp Tân Quý A, xã Tân Hưng, huyện Long Phú, tỉnh Sóc Trăng.', '1', 9.62055, 106.067),
('CSHT_STG_00191', 'STG110000', 'STG006161', 'STG016257', 'NGA-4-LD-MDC_STG', 'Số 491/9A, đường Lê Duẩn, khóm 5, phường 9, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.59508, 105.986),
('CSHT_STG_00192', 'STG170000', 'STG010361', 'STG016210', 'TAN-QUY_STG', 'Số 509, ấp Tân Quy A, xã Tân Hưng, huyện Long Phú, tỉnh Sóc Trăng.', '1', 9.61447, 106.096),
('CSHT_STG_00193', 'STG210000', 'CTV032167', 'STG016207', 'NNA012A_STG', 'Ấp 18, xã Tân Long, huyện Ngã Năm, tỉnh Sóc Trăng.', '1', 9.49152, 105.637),
('CSHT_STG_00194', 'STG110000', 'STG006161', 'STG016257', 'STR040A_STG', 'Số 4, lô D, khu dân cư Hưng Thịnh, quốc lộ 1, phường 7, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.6198, 105.963),
('CSHT_STG_00195', 'STG190000', 'STG010355', 'STG016163', 'TDE019A_STG', 'Ấp Bưng Lức, xã Trung Bình, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.51805, 106.163),
('CSHT_STG_00198', 'STG140000', 'STG012463', 'STG020065', 'An-Thanh_STG', 'KV Kế Sách - An Mỹ - Nhơn Mỹ 2', '1', 0, 0),
('CSHT_STG_00199', 'STG200000', 'CTV032165', 'STG016207', 'TTR017A_STG', 'Ấp Trung Thành, xã Tuân Tức, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.45627, 105.754),
('CSHT_STG_00200', 'STG110000', 'STG006161', 'STG016257', 'STR039A_STG', 'Số 46, đường Nguyễn Văn Linh, khóm 5, phường 2, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60609, 105.966),
('CSHT_STG_00201', 'STG190000', 'STG010370', 'STG016163', 'Dau-Giong_STG', 'Ấp Giồng Giữa, thị trấn Lịch Hội Thượng, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.48805, 106.142),
('CSHT_STG_00202', 'STG180000', 'STG013052', 'STG016163', 'An-Thanh-Dong_STG', 'Ấp Đền Thờ, xã An Thạnh Đông, huyện Cù Lao Dung, tỉnh Sóc Trăng.', '1', 9.65156, 106.184),
('CSHT_STG_00203', 'STG160000', 'STG011437', 'STG020055', 'VCH025A_STG', 'Số 130, ấp Hòa Khởi, xã Hòa Đông, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.40413, 106.051),
('CSHT_STG_00204', 'STG110000', 'STG006161', 'STG016257', 'STR041A_STG', '53 Trần Hưng Đạo, Phường 3, TP Sóc Trăng', '1', 9.63249, 105.921),
('CSHT_STG_00205', 'STG110000', 'STG006161', 'STG016257', 'CHO-SONG-DINH_STG', 'Số 942, đường Lý Thường Kiệt, khóm 5, phường 4, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60789, 106.019),
('CSHT_STG_00206', 'STG170000', 'STG010358', 'STG016210', 'DAI-NGAI_STG', 'Bưu điện văn hóa xã Đại Ngãi, xã Đại Ngãi, huyện Long Phú, tỉnh Sóc Trăng.', '1', 9.73119, 106.072),
('CSHT_STG_00207', 'STG170000', 'STG013056', 'STG016210', 'TRUONG-BINH_STG', 'Ấp Trường Bình, xã Trường Khánh, huyện Long Phú, tỉnh Sóc Trăng.', '1', 9.71347, 106.03),
('CSHT_STG_00208', 'STG200000', 'STG008306', 'STG016207', 'Kinh-Ngay_STG', 'Ấp Kinh Ngay 2, xã Châu Hưng, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.41487, 105.664),
('CSHT_STG_00209', 'STG190000', 'STG010370', 'STG016163', 'Bung-Nui_STG', 'Ấp Bưng Búi, xã Liêu Tú, huyện Trần Đề, tỉnh Sóc Trăng.', '1', 9.52896, 106.12),
('CSHT_STG_00210', 'STG150000', 'STG007270', 'STG016201', 'Dai-Tam_STG', 'Trạm viễn thông Đại Tâm, xã Đại Tâm, huyện Mỹ Xuyên, tỉnh Sóc Trăng.', '0', 0, 0),
('CSHT_STG_00211', 'STG160000', 'STG011422', 'STG020055', 'Vinh-Phuoc-2_STG', 'Ấp Wathpich, xã Vĩnh Phước, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.32128, 105.968),
('CSHT_STG_00212', 'STG200000', 'CTV032165', 'STG016207', 'TTR018A_STG', 'Số 152, tổ 5, ấp Công Điền, thị trấn Phú Lộc, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.40541, 105.744),
('CSHT_STG_00213', 'STG160000', 'STG011422', 'STG020055', 'VCH023A_STG', 'Số 39, ấp Tân Lập, xã Vĩnh Hiệp, thị trấn Vĩnh Châu, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.37449, 105.934),
('CSHT_STG_00214', 'STG120000', 'STG009348', 'STG016183', 'Bung-Chop_STG', 'Ấp Bưng Chóp, xã An Hiệp, huyện Châu Thành, tỉnh Sóc Trăng.', '1', 0, 0),
('CSHT_STG_00215', 'STG150000', 'CTV032145', 'STG016201', 'MXU032A_STG', 'Ấp Hòa Đặng, Xã Ngọc Đông, huyện Mỹ Xuyên, Tỉnh Sóc Trăng', '1', 9.46157, 105.939),
('CSHT_STG_00216', 'STG200000', 'CTV032165', 'STG016207', 'TTR020A_STG', 'Ấp Tân Định, Xã Tuân Tức, Thạnh Trị, Sóc Trăng', '1', 9.50589, 105.745),
('CSHT_STG_00217', 'STG170000', 'STG010358', 'STG016210', 'LPH017A_STG', 'ấp Hòa Hưng, xã Long Đức, huyện Long Phú, Tỉnh Sóc Trăng', '1', 9.70698, 106.079),
('CSHT_STG_00218', 'STG200000', 'CTV032170', 'STG016207', 'Bao-Lon_STG', 'Ấp Thạnh Điền, thị trấn Phú Lộc, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.42181, 105.763),
('CSHT_STG_00219', 'STG160000', 'STG011420', 'STG020055', 'Nopol_STG', 'Số 150, ấp Tân Nam, xã Vĩnh Tân, huyện Vĩnh Châu tỉnh, tỉnh Sóc Trăng.', '1', 9.28816, 105.895),
('CSHT_STG_00220', 'STG200000', 'STG008306', 'STG016207', 'CHAU-HUNG_STG', 'Ấp Chợ Củ, xã Châu Hưng, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.41763, 105.694),
('CSHT_STG_00221', 'STG200000', 'STG008310', 'STG016207', 'TTR016A_STG', 'Ấp Trương Hiền, xã Thạnh Trị, huyện Thạnh Trị, tỉnh Sóc Trăng.', '1', 9.44033, 105.735),
('CSHT_STG_00222', 'STG160000', 'STG011430', 'STG020055', 'Ngoc-Duong_STG', 'Ấp Nam Căn, xã Vĩnh Tân, huyện Vĩnh Châu, tỉnh Sóc Trăng.', '1', 9.35743, 105.854),
('CSHT_STG_00223', 'STG110000', 'STG006161', 'STG016257', 'STR037A_STG', 'Số 124/5, đường 30 Tháng 4, khóm 2, phường 5, thành phố Sóc Trăng, tỉnh Sóc Trăng.', '1', 9.60032, 105.977),
('CSHT_STG_00224', 'STG150000', 'STG007257', 'STG016201', 'MXU031A_STG', 'Ấp Rạch Sên, Xã Thạnh Phú, Huyện Mỹ Xuyên', '1', 9.51216, 105.868),
('CSHT_STG_00225', 'STG110000', 'STG006161', 'STG016257', 'STR042A_STG', '165 Quốc Lộ 1, Phường 7, TP Sóc Trăng', '1', 9.63011, 105.967),
('CSHT_STG_00226', 'STG190000', 'STG010355', 'STG016163', 'TDE021A_STG', 'Ấp Cảng, Thị trấn Trần Đề, Huyện Trần Đề', '1', 9.53113, 106.199),
('CSHT_STG_00227', 'STG190000', 'STG007290', 'STG016163', 'TDE022A_STG', 'Ấp Tiếp Nhựt, Xã Viên An, Huyện Trần Đề', '1', 9.52271, 106.057),
('CSHT_STG_00228', 'STG200000', 'CTV032170', 'STG016207', 'TTR019A_STG', 'Ấp Kiết lập B, xã Lâm Tân, Huyện Thạnh Trị', '1', 9.48664, 105.789),
('CSHT_STG_00229', 'STG160000', 'STG011420', 'STG020055', 'VCH030A_STG', 'Khóm Biển Trên - Phường Vĩnh Phước - Thị xã Vĩnh Châu - Tỉnh Sóc Trăng', '1', 9.30151, 105.936),
('CSHT_STG_00230', 'STG160000', 'CTV032144', 'STG020055', 'VCH031A_STG', 'Ấp Mỹ Thanh - Xã Vĩnh Hải - Thị xã Vĩnh Châu - Tỉnh Sóc Trăng', '1', 9.40338, 106.163),
('CSHT_STG_00231', 'STG160000', 'STG011430', 'STG020055', 'VCH029A_STG', 'Ấp Preychop - Xã  Lai Hòa - Thị xã Vĩnh Châu - Tỉnh Sóc Trăng', '1', 9.26742, 105.835),
('CSHT_STG_00232', 'STG180000', 'STG013062', 'STG016163', 'CLD010A_STG', 'Ấp Võ Thành Văn - Xã An Thạnh Nam - Huyện Cù Lao Dung - Tỉnh Sóc Trăng', '1', 9.53451, 106.263),
('CSHT_STG_00233', 'STG170000', 'STG010349', 'STG016210', 'LPH018A_STG', 'Ấp Tân Lập - Xã Long Phú - Huyện Long Phú - Tỉnh Sóc Trăng', '1', 9.58661, 106.128),
('CSHT_STG_00234', 'STG200000', 'CTV032170', 'STG016207', 'TTR021A_STG', 'Ấp Kiết Lợi, Xã Lâm Kiết, huyện Thạnh Trị', '1', 9.50826, 105.815),
('CSHT_STG_00235', 'STG170000', 'STG010358', 'STG016210', 'CHUA-ONG_STG', 'Ấp Chùa Ông - Xã Hậu Thạnh - Huyện Long Phú - Tỉnh Sóc Trăng', '1', 9.70901, 106.055),
('CSHT_STG_00236', 'STG120000', 'STG009349', 'STG016183', 'TRA-QUYT-B_STG', 'Ấp Trà Quýt B - Xã Thuận Hòa - Huyện Châu Thành - Tỉnh Sóc Trăng', '1', 0, 0),
('CSHT_STG_00237', 'STG180000', 'STG013052', 'STG016163', 'CLD012A_STG', 'Ấp Lê Minh Châu, xã An Thạnh Đông, Huyện Cù Lao Dung, tỉnh Sóc Trăng', '1', 9.62116, 106.216),
('CSHT_STG_00238', 'STG130000', 'STG009347', 'STG016183', 'MTU022A_STG', '206 Ấp Phước Bình, xã Mỹ Thuận, Huyện Mỹ Tú, tỉnh Sóc Trăng', '1', 9.55725, 105.794),
('CSHT_STG_00239', 'STG150000', 'CTV032145', 'STG016201', 'MXU035A_STG', 'Ấp Hòa Hinh, xã Ngọc Đông, Huyện Mỹ Xuyên, tỉnh Sóc Trăng', '1', 9.49284, 105.969),
('CSHT_STG_00240', 'STG160000', 'STG011430', 'STG020055', 'VCH032A_STG', 'Ấp Xẻo Su, xã Lai Hòa, Thị xã Vĩnh Châu, tỉnh Sóc Trăng', '1', 9.31428, 105.859),
('CSHT_STG_00241', 'STG170000', 'CTV041607', 'STG016210', 'LPH020A_STG', 'Ấp 1, TT Long Phú, Huyện Long Phú, tỉnh Sóc Trăng', '1', 9.65367, 106.116),
('CSHT_STG_00242', 'STG210000', 'STG009340', 'STG016207', 'NNA015A_STG', '158, Khóm Vĩnh Mỹ, Phường 3, Thị xã Ngã Năm, tỉnh Sóc Trăng', '1', 9.54724, 105.579),
('CSHT_STG_00243', 'STG130000', 'STG015350', 'STG016183', 'MTU023A_STG', 'Ấp Mỹ Thuận, TT Huỳnh Hữu Nghĩa, Huyện Mỹ Tú, tỉnh Sóc Trăng', '1', 9.63463, 105.808),
('CSHT_STG_00244', 'STG140000', 'STG012477', 'STG020065', 'KSA026A_STG', 'KV Kế Sách - An Mỹ - Nhơn Mỹ 1', '1', 9.77641, 106.018),
('CSHT_STG_00245', 'STG170000', 'STG010345', 'STG016210', 'LPH026A_STG', 'Ấp Trường An, xã Trường Khánh, Huyện Long Phú, tỉnh Sóc Trăng', '1', 9.65972, 106.034),
('CSHT_STG_00246', 'STG210000', 'STG014541', 'STG016207', 'NNA017A_STG', '125 Quốc Lộ 61B,  Khóm 6, Phường 1,TX Ngã Năm, tỉnh Sóc Trăng', '1', 9.58501, 105.597),
('CSHT_STG_00247', 'STG190000', 'STG007290', 'STG016163', 'TDE023A_STG', 'Ấp Lao Vên, xã Viên Bình, huyện Trần Đề, tỉnh Sóc Trăng', '1', 9.47757, 106.071),
('CSHT_STG_00248', 'STG170000', 'STG010345', 'STG016210', 'LPH025A_STG', 'Ấp Trường Lộc, xã Trường Khánh, huyện Long Phú, tỉnh Sóc Trăng', '1', 9.70556, 106),
('CSHT_STG_00249', 'STG140000', 'STG012477', 'STG020065', 'KSA025A_STG', 'KV Kế Sách - An Mỹ - Nhơn Mỹ 1', '1', 9.73201, 106.004),
('CSHT_STG_00250', 'STG170000', 'STG010350', 'STG016210', 'LPH022A_STG', 'Ấp Sóc Dong, xã Tân Hưng, Huyện Long Phú, tỉnh Sóc Trăng', '1', 9.65577, 106.082),
('CSHT_STG_00251', 'STG130000', 'STG009331', 'STG016183', 'MTU024A_STG', '26 ấp Sóc Xoài, xã Phú Mỹ, Huyện Mỹ Tú, tỉnh Sóc Trăng', '1', 9.54249, 105.872),
('CSHT_STG_00252', 'STG150000', 'STG007262', 'STG016201', 'MXU033A_STG', 'Ấp Chợ Cũ, thị trấn Mỹ Xuyên, Huyện Mỹ Xuyên, tỉnh Sóc Trăng', '1', 9.54937, 105.981),
('CSHT_STG_00253', 'STG150000', 'STG007287', 'STG016201', 'MXU034A_STG', 'Ấp Long Hòa, xã Gia Hòa 1, Huyện Mỹ Xuyên, tỉnh Sóc Trăng', '1', 9.42941, 105.875),
('CSHT_STG_00254', 'STG180000', 'STG013055', 'STG016163', 'CLD011A_STG', 'Ấp chợ, TT Cù Lao Dung, Huyện Cù Lao Dung, tỉnh Sóc Trăng', '1', 9.67317, 106.153),
('CSHT_STG_00255', 'STG140000', 'STG012479', 'STG020065', 'KSA027A_STG', 'Cái Côn', '1', 9.90587, 105.921),
('CSHT_STG_00256', 'STG170000', 'STG010349', 'STG016210', 'LPH019A_STG', 'Ấp Khwantang, thị trấn Long Phú, Huyện Long Phú, tỉnh Sóc Trăng', '1', 9.62812, 106.113),
('CSHT_STG_00257', 'STG170000', 'STG010361', 'STG016210', 'LPH023A_STG', 'Ấp Tân Hội, xã Tân Thạnh, Huyện Long Phú, tỉnh Sóc Trăng', '1', 9.59973, 106.043),
('CSHT_STG_00258', 'STG160000', 'STG011420', 'STG020055', 'VCH033A_STG', 'Khóm Vĩnh Thành, Phường Vĩnh Phước, Thị xã Vĩnh Châu, tỉnh Sóc Trăng', '1', 9.31913, 105.952),
('CSHT_STG_00259', 'STG120000', 'STG020131', 'STG016183', 'CTH018A_STG', 'Ấp Phước An, Xã Phú Tân, huyện Châu Thành, tỉnh Sóc Trăng', '1', 0, 0),
('CSHT_STG_00260', 'STG120000', 'STG009349', 'STG016183', 'MTU021A_STG', '108 Ấp Mỹ An, Xã Mỹ Hương, Mỹ Tú, tỉnh Sóc Trăng', '1', 0, 0),
('CSHT_STG_00261', 'STG160000', 'STG011433', 'STG020055', 'VCH034A_STG', 'Phường 2 - Thị xã Vĩnh Châu - Tỉnh Sóc Trăng', '1', 9.32958, 106.032),
('CSHT_STG_00262', 'STG170000', 'STG010349', 'STG016210', 'LPH021A_STG', 'Ấp Phú Đức, Xã Long Phú, Huyện Long Phú', '1', 9.56129, 106.094),
('CSHT_STG_00263', 'STG150000', 'STG007287', 'STG016201', 'MXU036A_STG', 'Ấp Hòa Thọ, Xã Ngọc Đông, Huyện Mỹ Xuyên', '1', 9.44128, 105.93),
('CSHT_STG_00264', 'STG210000', 'STG009340', 'STG016207', 'NNA016A_STG', 'Khóm 2, Phường 1, TX Ngã Năm, tỉnh Sóc Trăng', '1', 9.56855, 105.612),
('CSHT_STG_00265', 'STG110000', 'STG006161', 'STG016257', 'KDC_5A', 'CVCX03 KDC 5A, Phường 4, Thành Phố Sóc Trăng, Tỉnh Sóc Trăng', '1', 9.5976, 105.995),
('CSHT_STG_00266', 'STG140000', 'STG011440', 'STG020065', 'UBND_TRINH-PHÚ', 'KV Thới An Hội - Ba Trinh 2', '1', 9.56183, 105.961),
('CSHT_STG_00267', 'STG110000', 'STG006161', 'STG016257', 'KDC_LE-THIN', 'KDC Thương mại Lê Thìn, Phường 10, TP Sóc Trăng.', '1', 9.56218, 105.959),
('CSHT_STG_00268', 'STG110000', 'STG006161', 'STG016257', 'TDT_PHUONG5', 'Đường Tôn Đức Thắng, Phường 5, TP Sóc Trăng, Sóc Trăng', '1', 9.63722, 105.991),
('CSHT_STG_00269', 'STG150000', 'STG007263', 'STG016201', 'PHUOC-HOA_STG', 'Ấp Phước Hòa, xã Gia Hòa 1, huyện Mỹ Xuyên, Sóc Trăng', '1', 9.40917, 105.852),
('CSHT_STG_00270', 'STG160000', 'STG011428', 'STG020055', 'BUNG-TUM_STG', 'Khóm Bưng Tum, Phường Khánh Hòa, TX Vĩnh Châu, Sóc Trăng', '1', 9.39781, 106.005),
('CSHT_STG_00271', 'STG160000', 'STG011422', 'STG020055', 'KHOM-7_STG', 'Khóm 7, Phường 1, TX Vĩnh Châu, Sóc Trăng', '1', 9.35765, 105.999),
('CSHT_STG_00272', 'STG200000', 'CTV032165', 'STG016207', 'XA-MAU-1_STG', 'Ấp Xa Mau 1, Thị Trấn Phú Lộ,c huyện Thạnh Trị, Sóc Trăng.', '1', 9.42612, 105.734),
('CSHT_STG_00273', 'STG200000', 'STG008306', 'STG016207', 'VINH-THANH_STG', 'Ấp 20, Xã Vĩnh Thành, huyện Thạnh Trị , Sóc Trăng', '1', 9.4626, 105.649),
('CSHT_STG_00274', 'STG210000', 'CTV032167', 'STG016207', 'TAN-BINH_STG', 'Ấp Tân Bình, Xã Long Bình, TX Ngã Năm, Sóc Trăng', '1', 9.5353, 105.652),
('CSHT_STG_00275', 'STG110000', 'STG006161', 'STG016257', 'HOANG-THEM_STG', 'Hẻm 911, Quốc Lộ1, Khóm 3, Phường 2, TP Sóc Trăng, Sóc Trăng', '1', 9.58358, 105.956),
('CSHT_STG_00276', 'STG160000', 'STG011430', 'STG020055', 'CHO-PRAY-CHOP_STG', 'Ấp Prây Chop, Xã Lai Hòa, TX Vĩnh Châu, Tỉnh Sóc Trăng', '1', 9.28241, 105.84),
('CSHT_STG_00277', 'STG160000', 'CTV032144', 'STG020055', 'ANH-DONG_STG', 'ấp Vĩnh Thạnh B, xã Vĩnh Hải, TX Vĩnh Châu, tỉnh Sóc Trăng', '1', 9.36962, 106.107),
('CSHT_STG_00278', 'STG150000', 'STG007281', 'STG016201', 'HOA-BACH_STG', 'ấp Hòa Bạch, xã Hòa Tú 2, huyện Mỹ Xuyên, Sóc Trăng', '1', 9.36702, 105.868),
('CSHT_STG_00279', 'STG160000', 'STG011428', 'STG020055', 'NGUYEN-UT-2_STG', 'Khóm Nguyễn Út, Phường Khánh Hòa, TX Vĩnh Châu, Tỉnh Sóc Trăng', '1', 9.43029, 106.016),
('CSHT_STG_00280', 'STG140000', 'STG009336', 'STG020065', 'KENH-NGAY_STG', 'Đại Hải - Kế An 1', '1', 9.79236, 105.886),
('CSHT_STG_00281', 'STG140000', 'STG012464', 'STG020065', 'UB-KE-THANH_STG', 'Đại Hải- Kế An 2', '1', 9.77941, 105.931),
('CSHT_STG_00282', 'STG130000', 'STG009351', 'STG016183', 'MUONG-KHAI_STG', 'Ấp Mương Khai, Xã Mỹ Hương, huyện Mỹ Tú, Sóc Trăng', '1', 9.65755, 105.84),
('CSHT_STG_00283', 'STG150000', 'STG007281', 'STG016201', 'HOA-HUNG_STG', 'Ấp Hòa Hưng, Xã Hòa Tú 2, huyện Mỹ Xuyên, Sóc Trăng', '1', 9, 105),
('CSHT_STG_00284', 'STG210000', 'STG014539', 'STG016207', 'VINH-SU_STG', 'Khóm Vĩnh Sử, Phường 3, TX Ngã Năm, Sóc Trăng.', '1', 9, 105),
('CSHT_STG_00285', 'STG140000', 'CTV043725', 'STG020065', 'HOA-LOC-2_STG', 'Xuân Hòa - Phong Nẫm', '1', 9, 105),
('CSHT_STG_00286', 'STG110000', 'STG006161', 'STG016257', 'DUONG-MINH-QUAN_STG', 'Đường Dương Minh Quan, Phường 3, TP Sóc Trăng, Sóc Trăng', '1', 9, 105),
('CSHT_STG_00287', 'STG130000', 'STG009347', 'STG016183', 'BO-LIEN_STG', 'Ấp Bố Liên 1, xã Thuận Hưng, huyện Mỹ Tú, tỉnh Sóc Trăng', '1', 9.5847, 105.882),
('CSHT_STG_00288', 'STG180000', 'STG013062', 'STG016163', 'SON-TON_STG', 'ấp Sơn Ton, xã An Thạnh 2, huyện Cù Lao Dung, tỉnh Sóc Trăng', '1', 9.59047, 106.222),
('CSHT_STG_00289', 'STG150000', 'STG007263', 'STG016201', 'HIEP-HOA_STG', 'Ấp Hiệp Hòa, xã Gia Hòa 2, huyện Mỹ Xuyên, tỉnh Sóc Trăng', '1', 9.40271, 105.829),
('CSHT_STG_00290', 'STG150000', 'STG007263', 'STG016201', 'BINH-HOA_STG', 'Ấp Bình Hòa, xã Gia Hoà 2, huyện Mỹ Xuyên, tỉnh Sóc Trăng', '1', 9.38897, 105.805),
('CSHT_STG_00291', 'STG150000', 'STG007285', 'STG016201', 'SO-LA-1_STG', 'Ấp Sô La 1, xã Tham Đôn, huyện Mỹ Xuyên, tỉnh Sóc Trăng', '1', 9.5117, 105.927),
('CSHT_STG_00292', 'STG200000', 'STG008306', 'STG016207', 'BAU-CAT_STG', '95 Ấp Bàu Cát, Thị Trấn Hưng Lợi, Huyện Thạnh Trị, tỉnh Sóc Trăng', '1', 9.39444, 105.693),
('CSHT_STG_00293', 'STG200000', 'STG008310', 'STG016207', 'TA-LOT_STG', '14 Ấp Tà Lọt C, Xã Thạnh Trị, huyện Thạnh Trị, tỉnh Sóc Trăng', '1', 9.46177, 105.694),
('CSHT_STG_00294', 'STG200000', 'CTV032165', 'STG016207', 'TA-NIEN_STG', 'Ấp Tà Niền, Xã Thạnh Trị, huyện Thạnh Trị, tỉnh Sóc Trăng', '1', 9.444, 105.703),
('CSHT_STG_00295', 'STG110000', 'STG006161', 'STG016257', 'VAN-NGOC-CHINH_STG', '570 Văn Ngọc Chính, Phường 10, TPST, tỉnh Sóc Trăng', '1', 9.56183, 105.961),
('CSHT_STG_00296', 'STG110000', 'STG006161', 'STG016257', '259-LE-HONG-PHONG_STG', '72 Lê Duẩn, Phường 3, TPST, tỉnh Sóc Trăng', '1', 9.59301, 105.975),
('CSHT_STG_00297', 'STG210000', 'STG014539', 'STG016207', 'MY-TUONG-B_STG', 'Ấp Mỹ Tường B, Xã Mỹ Quới, TX Ngã Năm, tỉnh Sóc Trăng', '1', 9.45371, 105.563),
('CSHT_STG_00298', 'STG210000', 'CTV032167', 'STG016207', 'LONG-HOA_STG', 'Ấp Long Hoà, Xã Tân Long, TX Ngã Năm, tỉnh Sóc Trăng', '1', 9.55652, 105.665),
('CSHT_STG_00299', 'STG210000', 'STG014543', 'STG016207', 'QL-PHUNG-HIEP_STG', 'Quản lộ Phụng Hiệp, Khóm Tân Thành, Phường 2,  TX Ngã Năm, tỉnh Sóc Trăng', '1', 9.60941, 105.646),
('CSHT_STG_00300', 'STG160000', 'STG011420', 'STG020055', 'DAI-TRI_STG', 'Cầu Trầm Bê, Khóm Đai Trị, Phường Vĩnh Phước, TX Vĩnh Châu,  tỉnh Sóc Trăng', '1', 9.34852, 105.926),
('CSHT_STG_00301', 'STG160000', 'CTV032150', 'STG020055', 'CA-SANG_STG', '106 khóm Cà Săng, phường 2, thị xã Vĩnh Châu, tỉnh Sóc Trăng', '1', 9.32549, 105.991),
('CSHT_STG_00326', 'STG160000', 'STG011437', 'STG020055', 'HOA-THANH_STG', 'Ấp Hoà Thành, Xã Lạc Hoà, TX Vĩnh Châu', '1', 9.35126, 106.048),
('CSHT_STG_00329', 'STG210000', 'CTV032167', 'STG016207', 'LONG-THANH_STG', 'Cầu Ông Tào QL 61B, Ấp Long Thành, Xã Tân Long, TX Ngã Năm, tỉnh Sóc Trăng', '1', 9.51192, 105.686),
('CSHT_STG_00331', 'STG210000', 'STG014541', 'STG016207', 'MY-HIEP_STG', 'Ấp Mỹ Hiệp, Xã Mỹ Bình, TX Ngã Năm - ST', '1', 9.52551, 105.617),
('CSHT_STG_00334', 'STG200000', 'STG008306', 'STG016207', 'AP 23-CHAU HUNG_STG', 'Ấp 23, Xã Châu Hưng, huyện Thạnh Trị', '1', 9.4392, 105.662),
('CSHT_STG_00336', 'STG210000', 'STG014539', 'STG016207', 'MY-DONG_STG', 'Ấp Mỹ Đông 2 , Xã Mỹ Quới, TX Ngã Năm', '1', 9.44319, 105.579),
('CSHT_STG_00337', 'STG210000', 'CTV032167', 'STG016207', 'AP 21-THANH TAN_STG', 'Ấp 21, Xã Thanh Tân, huyện Thanh Trị', '1', 9.49863, 105.656),
('CSHT_STG_00338', 'STG140000', 'CTV043725', 'STG020065', 'HOA-LOI_STG', 'Xuân Hòa - Phong Nẫm', '1', 9.88078, 105.908),
('CSHT_STG_00339', 'STG130000', 'STG015350', 'STG016183', 'MY-TAN_STG', 'ấp Mỹ Tân, TT Huỳnh Hữu Nghĩa, huyện Mỹ Tú, tỉnh Sóc Trăng', '1', 9.65063, 105.814),
('CSHT_STG_00340', 'STG140000', 'STG012464', 'STG020065', 'ĐONG-HAI- STG', 'Đại Hải- Kế An 2', '1', 9.75269, 105.864),
('CSHT_STG_00342', 'STG180000', 'STG013055', 'STG016163', 'AN-TRUNG_STG', 'ấp An Trung, xã An Thạnh 1, huyện Cù Lao Dung, tỉnh Sóc Trăng', '1', 9.72075, 106.11),
('CSHT_STG_00343', 'STG180000', 'STG013052', 'STG016163', 'VAN-TO-B_STG', 'ấp Văn Tố B, xã Đại Ân 1, huyện Cù Lao Dung, tỉnh Sóc Trăng', '1', 9.62237, 106.17),
('CSHT_STG_00345', 'STG170000', 'STG010361', 'STG016210', 'KOKO-TAN HUNG_STG', 'ấp KoKô, xã Tân Hưng, huyện Long Phú', '1', 9.5916, 106.082),
('CSHT_STG_00346', 'STG190000', 'CTV032161', 'STG016163', 'HOI-TRUNG_STG', 'ấp Hội Trung, xã Trung Bình, huyện Trần Đề, tỉnh Sóc Trăng', '1', 9.49332, 106.173),
('CSHT_STG_00347', 'STG190000', 'CTV032161', 'STG016163', 'AP-NHA THO_STG', 'Ấp nhà Thờ, Xã Trung Bình, Huyện Trần Đề', '1', 9.46241, 106.195),
('CSHT_STG_00348', 'STG120000', 'STG006188', 'STG016183', 'DAC-THE_STG', 'ấp Đắc Thế ,Xã Hồ Đắc Kiện, huyện Châu Thành, tỉnh Sóc Trăng', '1', 0, 0),
('CSHT_STG_00349', 'STG190000', 'CTV032161', 'STG016163', 'HC_TRAN-DE_STG', 'Ấp Giồng Chùa, thị trấn Trần Đề, huyện Trần Đề, tỉnh Sóc Trăng', '1', 9.50961, 106.198),
('CSHT_STG_00375', 'STG110000', 'STG006161', 'STG016257', 'SMALLCELL_STR500S_STG', 'Ngã Tư Trần Bình Trọng - Trần Quang Diệu', '1', 9.6004, 105.969),
('CSHT_STG_00376', 'STG110000', 'STG006161', 'STG016257', 'SMALLCELL_STR501S_STG', 'KDC Trần Quang Diệu', '1', 9.60001, 105.969),
('CSHT_STG_00377', 'STG180000', 'STG013055', 'STG016163', 'SMALLCELL_CLD500S_STG', 'Bệnh viện Đa Khoa CLD', '1', 9.6585, 106.156),
('CSHT_STG_00378', 'STG170000', 'STG010350', 'STG016210', 'SMALLCELL_LPH500S_STG', 'UBND Châu Khánh', '1', 9.641, 106.05),
('CSHT_STG_00379', 'STG150000', 'STG007270', 'STG016201', 'SMALLCELL_MXU501S_STG', 'ấp Tâm Lộc Xã Đại Tâm', '1', 9.5419, 105.924);
INSERT INTO `tram` (`maTram`, `maDonvi`, `maQuanli`, `maGiamsat`, `tenTram`, `diachiTram`, `trangthaiTram`, `toadoX`, `toadoY`) VALUES
('CSHT_STG_00380', 'STG150000', 'STG007270', 'STG016201', 'SMALLCELL_MXU500S_STG', 'UBND Đại Tâm', '1', 9.5303, 105.907),
('CSHT_STG_00381', 'STG200000', 'STG008310', 'STG016207', 'SMALLCELL_TTR500S_STG', 'Điện Lực Thạnh Trị', '1', 9.4342, 105.742),
('CSHT_STG_00382', 'STG120000', 'CTV041574', 'STG016183', 'SMALLCELL_CTH500S_STG', 'TT Y Tế Châu Thành', '1', 0, 0),
('CSHT_STG_00383', 'STG120000', 'CTV041628', 'STG016183', 'SMALLCELL_CTH501S_STG', 'Phú Bình', '1', 0, 0),
('CSHT_STG_00384', 'STG120000', 'CTV041628', 'STG016183', 'SMALLCELL_CTH502S_STG', 'Chợ Phú Tâm', '1', 0, 0),
('CSHT_STG_00385', 'STG140000', 'STG012463', 'STG020065', 'SMALLCELL_KSA500S_STG', 'Trường THPT Kế Sách, huyện Kế Sách', '1', 9.7777, 105.986),
('CSHT_STG_00386', 'STG160000', 'CTV032144', 'STG020055', 'SMALLCELL_VCH500S_STG', 'Khu Du Lich Hồ Bể', '1', 9.3538, 106.161),
('CSHT_STG_00387', 'STG160000', 'CTV032144', 'STG020055', 'SMALLCELL_VCH501S_STG', 'Khu tái đinh cư Hổ Bể', '1', 9.3632, 106.163),
('CSHT_STG_00388', 'STG210000', 'STG014541', 'STG016207', 'SMALLCELL_NNA500S_STG', 'Khu hành Chính Thị Xã Ngã Năm', '1', 9.5656, 105.605),
('CSHT_STG_00389', 'STG190000', 'STG010370', 'STG016163', 'SMALLCELL_TDE500S_STG', 'UBND TT Lịch Hội Thương', '1', 9.49, 106.158),
('CSHT_STG_00390', 'STG110000', 'STG006161', 'STG016257', 'DUONG MINH QUANG_STG', 'Dương Minh Quan, Phường 3, TP Sóc Trăng', '1', 9.58831, 105.968),
('CSHT_STG_00391', 'STG110000', 'STG006161', 'STG016257', 'BA-XUYEN_STG', 'Nguyễn Văn Linh, Phường 2, TP. Sóc Trăng', '1', 9.60116, 105.965),
('CSHT_STG_00392', 'STG110000', 'STG006161', 'STG016257', '5A-2_STG', 'Khóm 5, Phường 4, TP. Sóc Trăng', '1', 9.60635, 106.01);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietphieudanhgia`
--
ALTER TABLE `chitietphieudanhgia`
  ADD PRIMARY KEY (`machitietPDG`),
  ADD KEY `FK_co` (`maPhieu`),
  ADD KEY `FK_trong` (`maTieuchi`);

--
-- Chỉ mục cho bảng `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`maDonvi`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`maHinhanh`);

--
-- Chỉ mục cho bảng `kyphieu`
--
ALTER TABLE `kyphieu`
  ADD PRIMARY KEY (`maKyphieu`),
  ADD KEY `FK_nd_kiphieu` (`maND`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`maND`),
  ADD KEY `FK_nv_dv` (`maDonvi`);

--
-- Chỉ mục cho bảng `phieudanhgia`
--
ALTER TABLE `phieudanhgia`
  ADD PRIMARY KEY (`maPhieu`),
  ADD KEY `FK_giamsat_phieu` (`maQuanli`),
  ADD KEY `FK_kp_pdg` (`maKyphieu`),
  ADD KEY `FK_pdg_tram` (`maTram`),
  ADD KEY `FK_quanli_phieu` (`maGiamsat`),
  ADD KEY `FK_ttdhtt_phieu` (`maTTVT`),
  ADD KEY `FK_ttvt_phieu` (`maTTDHTT`);

--
-- Chỉ mục cho bảng `tieuchi`
--
ALTER TABLE `tieuchi`
  ADD PRIMARY KEY (`maTieuchi`),
  ADD KEY `FK_ttdhtt_tc` (`maTN_TTDHTT`) USING BTREE,
  ADD KEY `FK_ttvt_tc` (`maTN_TTVT`) USING BTREE;

--
-- Chỉ mục cho bảng `trachnhiem`
--
ALTER TABLE `trachnhiem`
  ADD PRIMARY KEY (`maTrachnhiem`);

--
-- Chỉ mục cho bảng `tram`
--
ALTER TABLE `tram`
  ADD PRIMARY KEY (`maTram`),
  ADD KEY `FK_dv_tram` (`maDonvi`),
  ADD KEY `FK_giamsat_tram` (`maQuanli`),
  ADD KEY `FK_quanli_tram` (`maGiamsat`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietphieudanhgia`
--
ALTER TABLE `chitietphieudanhgia`
  MODIFY `machitietPDG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `maHinhanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietphieudanhgia`
--
ALTER TABLE `chitietphieudanhgia`
  ADD CONSTRAINT `FK_co` FOREIGN KEY (`maPhieu`) REFERENCES `phieudanhgia` (`maPhieu`),
  ADD CONSTRAINT `FK_trong` FOREIGN KEY (`maTieuchi`) REFERENCES `tieuchi` (`maTieuchi`);

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `FK_ct_hinhanh` FOREIGN KEY (`machitietPDG`) REFERENCES `chitietphieudanhgia` (`machitietPDG`);

--
-- Các ràng buộc cho bảng `kyphieu`
--
ALTER TABLE `kyphieu`
  ADD CONSTRAINT `FK_nd_kiphieu` FOREIGN KEY (`maND`) REFERENCES `nguoidung` (`maND`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `FK_nv_dv` FOREIGN KEY (`maDonvi`) REFERENCES `donvi` (`maDonvi`);

--
-- Các ràng buộc cho bảng `phieudanhgia`
--
ALTER TABLE `phieudanhgia`
  ADD CONSTRAINT `FK_giamsat_phieu` FOREIGN KEY (`maQuanli`) REFERENCES `nguoidung` (`maND`),
  ADD CONSTRAINT `FK_kp_pdg` FOREIGN KEY (`maKyphieu`) REFERENCES `kyphieu` (`maKyphieu`),
  ADD CONSTRAINT `FK_pdg_tram` FOREIGN KEY (`maTram`) REFERENCES `tram` (`maTram`),
  ADD CONSTRAINT `FK_quanli_phieu` FOREIGN KEY (`maGiamsat`) REFERENCES `nguoidung` (`maND`),
  ADD CONSTRAINT `FK_ttdhtt_phieu` FOREIGN KEY (`maTTVT`) REFERENCES `donvi` (`maDonvi`),
  ADD CONSTRAINT `FK_ttvt_phieu` FOREIGN KEY (`maTTDHTT`) REFERENCES `donvi` (`maDonvi`);

--
-- Các ràng buộc cho bảng `tieuchi`
--
ALTER TABLE `tieuchi`
  ADD CONSTRAINT `FK_ttdhtt_tc` FOREIGN KEY (`maTN_TTVT`) REFERENCES `trachnhiem` (`maTrachnhiem`),
  ADD CONSTRAINT `FK_ttvt_tc` FOREIGN KEY (`maTN_TTDHTT`) REFERENCES `trachnhiem` (`maTrachnhiem`);

--
-- Các ràng buộc cho bảng `tram`
--
ALTER TABLE `tram`
  ADD CONSTRAINT `FK_dv_tram` FOREIGN KEY (`maDonvi`) REFERENCES `donvi` (`maDonvi`),
  ADD CONSTRAINT `FK_giamsat_tram` FOREIGN KEY (`maQuanli`) REFERENCES `nguoidung` (`maND`),
  ADD CONSTRAINT `FK_quanli_tram` FOREIGN KEY (`maGiamsat`) REFERENCES `nguoidung` (`maND`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
