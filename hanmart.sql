-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 23, 2024 lúc 08:59 AM
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
  `status_cart` int(11) NOT NULL,
  `cart_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `user_id`, `code_cart`, `status_cart`, `cart_date`) VALUES
(1, 1, '5460', 0, '2023-09-06 17:14:56'),
(2, 1, '569', 0, '2023-12-04 20:14:56'),
(3, 2, '4702', 0, '2024-02-04 10:14:56'),
(4, 2, '3019', 0, '2024-04-02 13:04:20'),
(5, 3, '3502', 0, '2024-06-02 16:12:50'),
(6, 3, '475', 0, '2024-08-02 07:24:32'),
(7, 3, '6267', 0, '2024-08-06 14:12:24'),
(8, 1, '7825', 0, '2024-08-10 19:14:56'),
(9, 3, '7019', 0, '2024-08-20 15:22:13'),
(10, 2, '4658', 0, '2024-08-30 17:14:56'),
(11, 1, '8976', 0, '2024-08-31 15:36:44'),
(12, 1, '7594', 0, '2024-08-31 15:37:12'),
(13, 2, '3780', 0, '2024-08-31 15:53:24'),
(14, 1, '1420', 0, '2024-09-03 16:37:45'),
(15, 2, '3429', 0, '2024-09-03 16:50:02'),
(16, 1, '9850', 0, '2024-09-05 23:34:41'),
(17, 2, '6796', 0, '2024-09-05 23:35:35'),
(18, 5, '883', 0, '2024-09-08 16:08:53'),
(19, 5, '5827', 0, '2024-09-08 16:25:10'),
(20, 5, '3440', 0, '2024-09-08 16:27:28'),
(21, 5, '738', 0, '2024-09-08 16:29:57'),
(22, 2, '6111', 0, '2024-09-08 16:33:24'),
(23, 5, '2667', 0, '2024-09-09 13:53:37'),
(24, 5, '8994', 0, '2024-09-09 14:01:50'),
(25, 1, '3485', 0, '2024-09-09 14:23:20'),
(26, 1, '5766', 0, '2024-09-09 14:28:50'),
(27, 4, '314', 0, '2024-09-09 14:40:46'),
(28, 1, '9938', 0, '2024-09-19 16:08:04'),
(30, 1, '983', 0, '2024-09-19 16:09:16');

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
(1, '5460', 1, 1),
(2, '5460', 2, 3),
(3, '569', 3, 5),
(4, '569', 4, 3),
(5, '569', 9, 1),
(6, '4702', 7, 2),
(7, '4702', 11, 1),
(8, '4702', 2, 3),
(9, '3019', 6, 6),
(10, '3019', 10, 10),
(11, '3019', 8, 2),
(12, '3502', 18, 3),
(13, '3502', 19, 6),
(14, '475', 20, 4),
(15, '475', 21, 8),
(16, '6267', 20, 1),
(17, '6267', 11, 1),
(18, '7825', 19, 1),
(19, '7825', 4, 1),
(20, '7825', 18, 1),
(21, '7825', 5, 1),
(22, '7019', 1, 3),
(23, '4658', 7, 1),
(24, '4658', 9, 1),
(28, '8976', 1, 1),
(29, '7594', 2, 2),
(30, '7594', 7, 1),
(31, '3780', 6, 1),
(32, '3780', 9, 1),
(33, '3780', 20, 1),
(34, '1420', 10, 1),
(35, '1420', 1, 1),
(36, '3429', 5, 1),
(37, '9850', 7, 4),
(38, '6796', 11, 2),
(39, '883', 2, 1),
(40, '5827', 6, 1),
(41, '3440', 1, 1),
(42, '738', 7, 2),
(43, '6111', 8, 4),
(44, '2667', 13, 5),
(45, '2667', 14, 3),
(46, '8994', 10, 5),
(47, '3485', 4, 1),
(48, '5766', 2, 1),
(49, '314', 3, 1),
(50, '9938', 1, 2),
(51, '9938', 2, 1),
(53, '983', 4, 1),
(54, '983', 5, 1),
(55, '983', 6, 1);

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
(2, 8, 'Mì Ý Spaghetti', 125000, 997, '                                                                                                                                                                      Mì Ý Spaghetti chuẩn công thức từ Ý                                  ', 'miY.jpg', 'mì ý, spaghetti'),
(3, 3, 'Sườn bò Mỹ rút xương', 739000, 997, 'Sườn bò Mỹ rút xương, nhập khẩu 100% thịt tươi từ Mỹ', 'ThitBoMyRutXuong.png', 'thịt bò, thịt, thịt tươi, sườn bò, sườn bò mỹ'),
(4, 3, 'Cá hồi Nhật Bản', 560000, 997, 'Cá hồi tươi nhập khẩu 100% từ Nhật bản', 'cahoi.png', 'cá hồi, cá, cá tươi, thịt tươi'),
(5, 2, 'Trứng Cá Hồi Nhật Bản 120g', 299000, 997, 'Trứng cá có màu cam tươi, hình tròn bóng. Khi còn tươi ăn trứng có ít vị mặn, giòn sựt - không tanh là loại thực phẩm ít béo rất tốt cho sức khỏe.              ', 'trungcahoi.png', 'trứng cá hồi, trứng cá'),
(6, 2, 'Cá Saba Nauy Fillet 1kg', 229000, 997, 'Thịt cá có màu trắng tinh và rất thơm ngon với hương vị béo ngậy, thơm ngon đảm bảo dinh dưỡng.\r\nThịt và mỡ cá SaBa rất giàu axit docosahexaenoic (DHA) và axit eicosapentaenoic (EPA), rất tốt cho phụ nữ có thai và cho sự phát triển não bộ của trẻ.', 'casaba.png', 'cá saba, cá saba nauy, cá'),
(7, 2, 'Cá hồi', 230000, 998, '                            Cá hồi nhập khẩu từ Nhật Bản                        ', 'ca.jpg', 'cá hồi, hải sản, cá'),
(8, 8, 'Caramen', 139000, 996, 'Caramen nguyên chất', 'caramen.jpg', 'caramen'),
(9, 6, 'Nước hoa quả 100% nguyên chất', 35000, 1000, 'Nước hoa quả được làm 100% từ hoa quả tươi', 'nuocngot.jpg', 'nước hoa quả, nước ngọt, nước giải khát'),
(10, 1, 'Tỏi', 42000, 1000, 'Tỏi tươi sạch 100% từ thiên nhiên', 'toi.jpg', 'tỏi, gia vị'),
(11, 3, 'Thịt bò tươi sống', 540000, 1000, 'Thịt bò 100% tươi sống từ bò Tây Tạng', 'beef.jpg', 'thịt bò, thịt, thịt sống, thịt tươi'),
(12, 8, 'Tương ớt siêu cay', 230000, 1000, '                            Tương ớt siêu cay 100% được làm từ loại ớt cay nhất thế giới                        ', 'tuongot.jpg', 'tương ớt, rau củ quả, ớt, tương ớt cay'),
(14, 6, 'Bia Hà Nội', 580000, 1000, '                            Bia Hà Nội chuẩn vị xưa                        ', 'bia.jpg', 'bia, bia hà nội, đồ uống, rượu'),
(15, 1, 'Khoai lang', 320000, 1000, 'Khoai lang được trồng ở vùng đất Hà Giang', 'khoailag.jpg', 'khoai lang, rau củ quả, khoai'),
(16, 6, 'Coca Cola', 15000, 1000, 'Coca cola nước giải khát', 'coca.jpg', 'coca cola, đồ uống, nước uống, nước giải khát'),
(17, 7, 'Sữa tươi 100% nguyên chất', 29000, 1000, 'Sữa tươi nguồn cung cấp dinh dưỡng số 1 cho bé, được lấy từ bò sữa Nauy', 'milk.jpg', 'sữa, sữa tươi'),
(18, 4, 'Bánh mì', 34000, 1000, 'Bánh mì được làm từ loại bột mì tốt nhất thế giới, vỏ ngoài giòn, bên trong mềm thơm béo', 'banhmi.jpg', 'bánh mì');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongke`
--

CREATE TABLE `thongke` (
  `id` int(10) NOT NULL,
  `ngaydat` varchar(50) NOT NULL,
  `donhang` int(11) NOT NULL,
  `doanhthu` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongke`
--

INSERT INTO `thongke` (`id`, `ngaydat`, `donhang`, `doanhthu`, `soluong`) VALUES
(1, '2023-09-06', 10, '2500000', 25),
(2, '2023-12-04', 24, '4200000', 50),
(3, '2024-02-04', 30, '5200000', 50),
(4, '2024-04-02', 60, '10200000', 60),
(5, '2024-06-02', 10, '1000000', 12),
(6, '2024-08-02', 80, '15000000', 100),
(7, '2024-08-06', 20, '5000000', 50),
(8, '2024-08-10', 50, '10000000', 50),
(9, '2024-08-20', 9, '600000', 10),
(10, '2024-08-28', 40, '5100000', 50),
(11, '2024-08-31', 11, '5207000', 62),
(12, '2024-09-03', 1, '60000', 2),
(13, '2024-09-05', 3, '790000', 7),
(14, '2024-09-08', 5, '609000', 16),
(15, '2024-09-09', 5, '2114000', 16),
(16, '2024-09-19', 2, '369000', 6),
(17, '2024-09-21', 1, '140000', 3),
(18, '2024-09-22', 2, '1827000', 5);

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
(3, 'TuanAnh', 'tuanh3@gmail.com', '123456', 'Sao Hỏa', 123456789),
(4, 'Gia Bao', 'anhsilver24@gmail.com', '', 'Sài Gòn', 987263154),
(5, 'Son', 'son1@gmail.com', '123456', 'Ha Noi', 12345678);

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
-- Chỉ mục cho bảng `thongke`
--
ALTER TABLE `thongke`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id_cart_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `thongke`
--
ALTER TABLE `thongke`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
