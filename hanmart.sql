-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 29, 2023 lúc 10:00 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hanmart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'AdTuanh', 'admin1@gmail.com', '123456'),
(2, 'TunaHan', 'admin2@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `status_cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `user_id`, `code_cart`, `status_cart`) VALUES
(2, 1, '7370', 0),
(3, 2, '6691', 0),
(4, 3, '5875', 0),
(5, 1, '1895', 0),
(6, 1, '3586', 1),
(7, 3, '3625', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id_cart_detail` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_detail`
--

INSERT INTO `cart_detail` (`id_cart_detail`, `code_cart`, `product_id`, `soluong`) VALUES
(2, '7370', 1, 1),
(3, '7370', 3, 4),
(4, '6691', 2, 1),
(5, '6691', 7, 4),
(6, '5875', 4, 1),
(7, '5875', 9, 1),
(8, '5875', 11, 3),
(9, '1895', 1, 1),
(10, '1895', 2, 1),
(11, '1895', 3, 5),
(12, '3586', 6, 1),
(13, '3586', 5, 2),
(14, '3586', 10, 2),
(15, '3586', 8, 1),
(16, '3625', 11, 3),
(17, '3625', 7, 2),
(18, '3625', 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Rau củ quả'),
(2, 'Hải sản đông lạnh'),
(3, 'Thịt tươi'),
(4, 'Bánh mì'),
(5, 'Trà và cà phê'),
(6, 'Rượu & đồ uống'),
(7, 'Sữa tươi'),
(8, 'Đồ ăn nhanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_cat` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_qty` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_name`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keyword`) VALUES
(1, 1, 'Chanh', 18000, 1000, '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Chanh tươi nhập khẩu từ Mỹ                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ', 'lemon.jpg', 'chanh, rau củ quả'),
(2, 8, 'Mì Ý Spaghetti', 125000, 1000, '                                                                                                                                            Mì Ý Spaghetti chuẩn công thức từ Ý                   ', 'miY.jpg', 'mì ý, spaghetti'),
(3, 7, 'Sữa tươi', 99000, 1000, 'Sữa tươi nguyên chất 100% từ sữa bò', 'milk.jpg', 'sữa tươi, sữa'),
(4, 4, 'Bánh mì', 64000, 1234, 'Bánh mì nhập khẩu từ Đức', 'banhmi.jpg', 'bánh mì'),
(5, 6, 'Coca Cola', 20000, 1000, 'Coca Cola chuẩn bị nguyên bản', 'coca.jpg', 'coca cola, đồ uống, nước uống, nước giải khát'),
(6, 1, 'Dứa', 125000, 1000, 'Dứa tươi nhập khẩu từ Việt Nam', 'dua.jpg', 'dứa, thơm, hoa quả'),
(7, 2, 'Cá hồi', 230000, 1000, '                            Cá hồi nhập khẩu từ Nhật Bản                        ', 'ca.jpg', 'cá hồi, hải sản, cá'),
(8, 8, 'Caramen', 139000, 1000, 'Caramen nguyên chất', 'caramen.jpg', 'caramen'),
(9, 6, 'Nước hoa quả 100% nguyên chất', 35000, 1000, 'Nước hoa quả được làm 100% từ hoa quả tươi', 'nuocngot.jpg', 'nước hoa quả, nước ngọt, nước giải khát'),
(10, 1, 'Tỏi', 42000, 1000, 'Tỏi tươi sạch 100% từ thiên nhiên', 'toi.jpg', 'tỏi, gia vị'),
(11, 3, 'Thịt bò tươi sống', 540000, 1000, 'Thịt bò 100% tươi sống từ bò Tây Tạng', 'beef.jpg', 'thịt bò, thịt, thịt sống, thịt tươi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `sdt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `diachi`, `sdt`) VALUES
(1, 'Tuanh', 'tuanh@gmail.com', '123456', 'Bắc Ninh', 123456789),
(2, 'TunaHan', 'tuanh2@gmail.com', '123456', 'Hà Nội', 888614993),
(3, 'TuanAnh', 'tuanh3@gmail.com', '123456', 'Sao Hỏa', 123456789);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id_cart_detail`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_cat` (`product_cat`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id_cart_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_cat`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
