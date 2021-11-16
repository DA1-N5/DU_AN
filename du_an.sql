-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2021 lúc 03:24 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `vai_tro` int(11) NOT NULL DEFAULT 2,
  `anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `email`, `mat_khau`, `ten`, `sdt`, `ngay_sinh`, `vai_tro`, `anh`, `ngay_tao`, `trang_thai`) VALUES
(1, 'vannamhdvt@gmail.com', 'c9740b276a32f2066522ee3362ae90aa', 'Trần Văn Nam', '0886458972', '2001-09-28', 2, 'new.jpg', '0000-00-00', 1),
(2, 'congtcph11890@fpt.edu.vn', '5a734ecdd0295bfc196a1d740bf3921f', 'Công ', '0862460235', '2021-11-10', 2, '', '2021-11-03', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dia_chi`
--

CREATE TABLE `dia_chi` (
  `id` int(11) NOT NULL,
  `dia_chi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dia_chi`
--

INSERT INTO `dia_chi` (`id`, `dia_chi`, `ngay_tao`, `trang_thai`) VALUES
(1, 'Việt Nam-Trái Đất-Hệ mặt trời 2', '2021-11-11', 1),
(4, 'xin chào', '2021-11-13', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten`, `email`, `mat_khau`, `sdt`, `ngay_tao`, `trang_thai`) VALUES
(5, 'Trần Văn Nam', 'namtvph13226@fpt.edu.vn', 'c9740b276a32f2066522ee3362ae90aa', '0839551901', '2021-11-15', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_san`
--

CREATE TABLE `khach_san` (
  `id` int(11) NOT NULL,
  `ten_ks` varchar(255) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `mo_ta` text NOT NULL,
  `id_dc` tinyint(1) NOT NULL DEFAULT 0,
  `dia_chi_ct` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `ngay_tao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khach_san`
--

INSERT INTO `khach_san` (`id`, `ten_ks`, `anh`, `mo_ta`, `id_dc`, `dia_chi_ct`, `sdt`, `trang_thai`, `ngay_tao`) VALUES
(12, 'hotel7', 'facebook-twitter-logos1-ss-192-1211-8848-1633665202.jpg', 'skfjksldjflksdjflsd', 2, 'Vĩnh lộc 2', 123948576, 1, '2021-11-15'),
(13, 'hotel2', '', 'SDFASDFASDF', 2, 'Vĩnh lộc - phùng xá - Thạch thát2', 123987654, 1, '2021-11-15'),
(14, 'hotel8', '360-1632992111-9036-1633426045.png', 'klfsdklfjklsdf', 2, 'Vĩnh lộc 9', 123948576, 1, '2021-11-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong_tien`
--

CREATE TABLE `phuong_tien` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bien_so` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `so_ghe` int(11) NOT NULL,
  `anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1,
  `ngay_ban` datetime DEFAULT NULL,
  `ngay_hoat_dong` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phuong_tien`
--

INSERT INTO `phuong_tien` (`id`, `ten`, `bien_so`, `so_ghe`, `anh`, `ngay_tao`, `trang_thai`, `ngay_ban`, `ngay_hoat_dong`) VALUES
(6, 'Trần Chí Công', '30-F1 999.13', 12, 'anh1.png.jpg', '2021-11-14', 1, NULL, NULL),
(7, 'Trần Chí Công', '30-F1 999.12', 1, 'anh1.png.jpg', '2021-11-14', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_diachi` int(11) NOT NULL,
  `anh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `ngay_di` date NOT NULL,
  `ngay_den` date NOT NULL,
  `mo_ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thong_tin` varchar(10000) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `gia` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `khuyen_mai` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` date NOT NULL,
  `ngay_sua` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`id`, `ten`, `id_diachi`, `anh`, `id_danhmuc`, `ngay_di`, `ngay_den`, `mo_ta`, `thong_tin`, `gia`, `khuyen_mai`, `ngay_tao`, `ngay_sua`, `trang_thai`) VALUES
(1, 'Du lịch Nha Trang - Đà Lạt', 0, 'du-lich-nha-trang.jpg', 0, '2021-11-16', '2021-11-20', '<p><strong>Nha Trang - Dốc Lết - Tắm Khoáng - Vinpearland - Đà Lạt - QUÊ Garden - Kim Ngân Hills - Thiền Viện Trúc Lâm</strong></p><p><strong>5 ngày 4 đêm</strong></p>', '<p><strong>NGÀY 1 | TP.HCM – ĐÀ LẠT (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>Sáng&nbsp;&nbsp; &nbsp;Xe và Hướng Dẫn Viên Du Lịch Việt đón Quý khách tại điểm hẹn, khởi hành đi Đà Lạt.</strong></p><ul><li>Đoàn dùng bữa sáng tại Ngã Ba Dầu Dây. Đoàn tiếp tục khởi hành đến TP. Đà Lạt.</li></ul><p>&nbsp;</p><p><strong>Trưa:&nbsp;&nbsp; &nbsp;Dùng cơm trưa tại nhà hàng.</strong></p><ul><li>Tham quan Thiền Viện Trúc Lâm, đi cáp treo qua đồi Rôbin (chi phí tự túc), ngắm cảnh rừng thông, hồ Tuyền Lâm, núi Phượng Hoàng từ trên cao.</li><li>Đoàn đến Đà Lạt, đến Quảng trường Lâm Viên với tuyệt tác kiến trúc bằng kính: Bông Hoa Dã Quỳ và Nụ Hoa Atiso.</li></ul><p>&nbsp;</p><p><strong>Tối:&nbsp;&nbsp; &nbsp;Dùng cơm tối, nhận phòng nghỉ ngơi</strong></p><ul><li>Quý khách tự túc dạo thành phố Đà Lạt về đêm, ngắm cảnh Hồ Xuân Hương, thưởng thức hương vị cà phê phố núi (chi phí tự túc). Nghỉ đêm khách sạn tại Đà Lạt.</li></ul><p>&nbsp;</p><p><strong>NGÀY 2 | QUÊ GARDEN – ĐÀ LẠT VIEW – KIM NGÂN HILLS ( Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 3 | ĐÀ LẠT - NHA TRANG – THÁP BÀ PONAGAR (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 4 | NHA TRANG – DỐC LẾT – SUỐI KHOÁNG THÁP BÀ – VINPEARLLAND</strong></p><p>&nbsp;</p><p><strong>NGÀY 5 | NHA TRANG – TP. HỒ CHÍ MINH (Ăn sáng, trưa)</strong></p>', '4099000', '', '2021-11-15', '2021-11-15', 1),
(2, 'Du lịch Hà Nội - Yên Tử - Hạ Long - Tràng An - Sa Pa', 0, '700345404987.jpg', 0, '2021-11-16', '2021-11-19', '<p><strong>Hà Nội - Yên Tử - Hạ Long - Chùa Bái Đính - Tràng An - Sapa - Bản Cát Cát - Đỉnh Fansipan</strong></p><p><strong>6 ngày 5 đêm</strong></p>', '<p><strong>NGÀY 1 | TP.HCM – HÀ NỘI – HẠ LONG (Ăn trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>Sáng:</strong> Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất ba tiếng.</p><ul><li>Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý Khách làm thủ tục đón chuyến bay đi Hà Nội.</li><li>Đến sân bay Nội Bài, Hướng Dẫn Viên đón đoàn, Khởi hành đến Hạ Long. Đến núi Yên Tử - ngọn núi cao 1068 m so với mực nước biển, một thắng cảnh thiên nhiên còn lưu giữ hệ thống các di tích lịch sử văn hóa gắn với sự ra đời, hình thành và phát triển của thiền phái Trúc Lâm Yên Tử, được mệnh danh là “đất tổ Phật giáo Việt Nam”.</li></ul><p>&nbsp;</p><p><strong>Trưa:</strong> Dùng cơm trưa.</p><ul><li>Quý khách lên núi bằng cáp treo (chi phí cáp treo tự túc), tham quan chùa Hoa Yên, Bảo Tháp, Trúc Lâm Tam Tổ, Hàng Tùng 700 tuổi…xuống núi tham quan Thiền Viện Trúc Lâm với quả cầu Như Ý nặng 6 tấn được xếp kỷ lục guiness Việt Nam.</li><li>Đoàn khởi hành đến Hạ Long</li></ul><p>&nbsp;</p><p><strong>Tối: </strong>Dùng bữa tối. Nghỉ đêm tại Hạ Long.</p><ul><li>Quý khách tự do dạo phố, mua sắm tại chợ đêm hoặc tham gia khu Sunworld Hạ Long Park với tất cả khu trò chơi trong nhà, ngoài trời hoành tráng có các khu Công viên Rồng, Cáp treo Nữ Hoàng vòng quay Sun wheel…(chi phí tự túc).</li></ul><p>&nbsp;</p><p><strong>NGÀY 2 | HẠ LONG – NINH BÌNH (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 3 | NINH BÌNH – HÀ NỘI (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 4 | HÀ NỘI – LÀO CAI - SAPA (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 5 | SAPA – FANSIPAN – HÀ NỘI (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 6 | HÀ NỘI – TP.HCM (Ăn sáng, trưa)</strong></p><p>&nbsp;</p>', '8199000', '', '2021-11-15', '2021-11-15', 1),
(3, 'Du lịch Miền Bắc Hà Nội - Mộc Châu - Sơn La - Điện Biên - Sa Pa - Phú Thọ - Đền Hùng', 0, 'Tour-tay-bac.jpg', 0, '2021-11-16', '2021-11-20', '<p><strong>Tây Bắc: Du lịch Hè Hà Nội - Mộc Châu - Sơn La - Điện Biên - Sa Pa - Phú Thọ - Đền Hùng</strong></p><p><strong>6 ngày 5 đêm</strong></p>', '<p><strong>NGÀY 1 | TP.HCM – HÀ NỘI – HÒA BÌNH – MAI CHÂU – MỘC CHÂU (Ăn trưa, chiều)</strong></p><p>&nbsp;</p><p>&nbsp;</p><p>Sáng: Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất hai tiếng. Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý khách làm thủ tục đón chuyến bay đi Hà Nội.</p><ul><li>Đến sân bay Nội Bài, xe đón Đoàn khởi hành đến Mai Châu.</li><li>Trên đường đến Hòa Bình, Quý khách có dịp ngắm nhìn Nhà máy thủy điện sông Đà (còn gọi là thủy điện Hòa Bình)</li><li>Chiêm ngưỡng toàn cảnh tuyệt đẹp của thung lũng Mai Châu trên đoạn đường đèo Thung Khe.</li></ul><p>&nbsp;</p><p>&nbsp;</p><p>Trưa: Dùng cơm trưa.</p><ul><li>Đoàn tiếp tục khởi hành đến Mai Châu, tham quan Bản Lác tìm hiểu phong tục tập quán của bản làng người Thái, nơi in đậm bản sắc văn hóa người Thái.</li><li>Rời Mai Châu, Đoàn khởi hành đến Cao Nguyên Mộc Châu nổi tiếng với những đồi chè xanh mướt trải dài đến tận bên kia quả đồi</li></ul><p>&nbsp;</p><p>Tối: Dùng cơm chiều. Nghỉ đêm Mộc Châu.</p><p><strong>NGÀY 2 | MỘC CHÂU – SƠN LA – ĐIỆN BIÊN (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 3 | ĐIỆN BIÊN – MƯỜNG LAY – SAPA (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 4 | SAPA – FANSIPAN – BẢN CÁT CÁT (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 5 | SAPA – YÊN BÁI – MÙ CANG CHẢI (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 6 | YÊN BÁI – PHÚ THỌ – HÀ NỘI –TP.HCM (Ăn sáng, trưa)</strong></p><p>&nbsp;</p>', '8399000', '', '2021-11-15', '2021-11-15', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_san`
--
ALTER TABLE `khach_san`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phuong_tien`
--
ALTER TABLE `phuong_tien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `khach_san`
--
ALTER TABLE `khach_san`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `phuong_tien`
--
ALTER TABLE `phuong_tien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
