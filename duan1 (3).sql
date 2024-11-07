-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2024 lúc 06:43 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL DEFAULT 0,
  `bill_name` varchar(200) NOT NULL,
  `bill_address` varchar(200) NOT NULL,
  `bill_email` varchar(200) NOT NULL,
  `bill_tel` varchar(30) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1.Thanh toán trực tiếp \r\n2.chuyển khoản\r\n3.thanh toán online',
  `ngaydathang` varchar(100) DEFAULT NULL,
  `total` int(10) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0.đơn hàng mới\r\n1.đang sử lý\r\n2.đang giao hàng\r\n3.đã giao hàng\r\n',
  `receive_name` varchar(200) NOT NULL,
  `receive_address` varchar(200) NOT NULL,
  `receive_tel` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `noidung` varchar(200) NOT NULL,
  `ngaybl` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `idpro`, `iduser`, `noidung`, `ngaybl`) VALUES
(13, 32, 3, 'sản  phẩm tốt', '06:27:29pm 14/03/2024'),
(14, 29, 3, 'khuyến mại lớn vô cùng', '06:29:08pm 14/03/2024'),
(15, 33, 3, 'bánh rất ngon', '01:36:12pm 15/03/2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`) VALUES
(4, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `price` int(20) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `cart_id`, `idpro`, `image`, `name`, `price`, `soluong`, `thanhtien`) VALUES
(251, 4, 43, 'Bánh kem socola trắng', 'banh-kem-sinh-nhat-40.jpg', 155, 1, 155),
(252, 4, 38, 'Bánh kem doreamon', 'banh-kem-doremon-1.jpg', 199, 1, 199);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(20, 'Bánh kem hương bắp'),
(21, 'Bánh kem tạo hình'),
(22, 'Bánh kem doreamon'),
(23, 'Bánh kem socola ngon'),
(24, 'Bánh kem nhiều tầng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuctintuc`
--

CREATE TABLE `danhmuctintuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuctintuc`
--

INSERT INTO `danhmuctintuc` (`id_danhmuc`, `ten_danhmuc`) VALUES
(6, 'tin công nghệ new');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pricecu` int(50) DEFAULT NULL,
  `pricekhuyenmai` int(50) DEFAULT 0,
  `image` varchar(200) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `luotxem` int(20) DEFAULT 0,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `pricecu`, `pricekhuyenmai`, `image`, `mota`, `luotxem`, `iddm`) VALUES
(22, 'bánh sinh nhật', 200, 150, 'banh-kem-hinh-con-cho.jpg', 'jsdhsdsadax', 19, 24),
(23, 'bánh trưng', 125, 100, 'Banh-kem-tang-vo-2[1].jpg', 'dfl', 44, 23),
(27, 'Bánh kem socola', 100, 200, 'cheesecake-berry-scaled.jpeg', 'hsasas', 30, 24),
(28, 'Bánh kem ngon', 200, 150, 'imager_3_30059_700.jpg', 'bánh kem ngon', 66, 24),
(29, 'Bánh kem doreamon', 300, 200, 'banh kem.jpg', 'jhb', 78, 24),
(30, 'Bánh kem sinh nhật', 300, 150, '1445657961_banhkemdepre.jpg', 'jgn,m', 34, 23),
(31, 'Bánh kem tạo hình', 400, 123, '003-03.jpg', 'ssdas', 90, 21),
(32, 'Bánh kem hương bắp', 283, 133, '1445421143_banhkemdep.jpg', 'Bánh kem là một loại bánh ngọt được làm từ các nguyên liệu như bột mì, đường, trứng và sữa, kết hợp với các loại kem và nhân tạo ra một món tráng miệng ngon mắt và hấp dẫn. Bánh kem thường được trang trí bằng các loại đường kem, hoa quả, sô cô la, hạt dẻ và các loại topping khác để tạo ra những họa tiết đẹp mắt và phong phú.', 47, 20),
(33, 'Bánh kem con heo', 166, 192, 'banh-kem-hinh-con-heo-1.jpg', 'jasas', 89, 23),
(34, 'Bánh hương bắp', 100, 200, 'Banh-kem-dep-tang-me-thuong.jpg', 'hjjasa', 0, 20),
(38, 'Bánh kem doreamon', 300, 199, 'banh-kem-doremon-1.jpg', 'Bánh kem doreamon ngon tuyệt', 0, 22),
(43, 'Bánh kem socola trắng', 200, 155, 'banh-kem-sinh-nhat-40.jpg', 'Bánh kem ngon', 0, 24),
(44, 'Bánh sinh nhật doreamon', 300, 200, 'banh-kem-ve-hinh-doremon-de-thuong-mau-xanh.jpg', 'Bánh sing nhật doreamon ngon', 0, 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `tieude` varchar(50) NOT NULL,
  `noidung` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `tel` varchar(20) NOT NULL,
  `vaitro` tinyint(4) DEFAULT 0 COMMENT 'Khách hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `email`, `address`, `tel`, `vaitro`) VALUES
(3, 'nghiadvph', 'abb', 'nghiadv@gmail.com', 'thái thụy, Thái bình', '0368799822', 1),
(4, 'nghia', 'abc', 'nghiadvph46437@fpt.edu.vn', NULL, '', 0),
(16, 'my', '123', 'my@fpt.edu.vn', NULL, '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpro` (`idpro`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuctintuc`
--
ALTER TABLE `danhmuctintuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_danhmuc` (`iddm`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_danhmuc` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `danhmuctintuc`
--
ALTER TABLE `danhmuctintuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_3` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuctintuc` (`id_danhmuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
