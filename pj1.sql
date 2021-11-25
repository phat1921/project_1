-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2021 lúc 01:36 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pj1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` char(10) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `role` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `username`, `password`, `email`, `phone_number`, `sex`, `address`, `role`, `status`) VALUES
(1, 'Trương Văn Sỹ', 'super', 'anh123', 'vanyyy2001@gmail.com', '0334142823', 1, 'hanoi', 0, 0),
(2, 'Nguyen Quyen', 'quyen1', '1234567', 'quyen@gmail.com', '0333333333', 1, 'hanoi', 1, 0),
(3, 'phát', 'phat', 'phat123', 'phat@gmail.com', '0123654879', 1, 'hanoi', 0, 0),
(4, 'Tran Tam', 'tam', '123654a', 'abc@gmail.com', '0321456987', 1, 'hanoi', 1, 0),
(7, 'superadmin', 'superadmin', 'superadmin', 'superadmin@gmail.com', '0349241554', 1, 'hà nội', 0, 0),
(9, 'name', 'username', 'pass', 'name@gmail.com', '0321456987', 1, 'thanh trì, hà nội', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `time_buy` datetime DEFAULT NULL,
  `name_user` varchar(100) DEFAULT NULL,
  `phone_number_user` varchar(100) DEFAULT NULL,
  `address_user` varchar(200) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `id_user`, `time_buy`, `name_user`, `phone_number_user`, `address_user`, `price`, `status`) VALUES
(21, 6, '2021-01-26 14:13:18', 'user', '0123456789', 'hanoi', 1000000000, 2),
(22, 6, '2021-01-26 16:01:16', 'user1', '0123456789', 'hanoi', 12001000, 2),
(23, 6, '2021-01-26 16:53:11', 'user', '0123456789', 'hanoi', 10000000, 1),
(24, 6, '2021-01-26 16:56:21', 'user', '0123456789', 'hanoi', 1041500000, 2),
(25, 8, '2021-01-26 21:02:50', 'check', '0213654286', 'hanoi', 10000000, 2),
(26, 8, '2021-01-28 13:17:28', 'check', '0213654286', 'hanoi', 90000000, 2),
(27, 8, '2021-01-28 19:25:42', 'checked', '0213654286', 'hanoi', 1000000000, 2),
(28, 8, '2021-01-28 20:05:28', 'check', '0213654286', 'hanoi', 570000000, 2),
(29, 8, '2021-01-28 20:07:39', 'check', '0213654286', 'hanoi', 360000000, 0),
(30, 8, '2021-01-28 20:08:11', 'check', '0213654286', 'hanoi', 32000000, 2),
(31, 8, '2021-01-30 20:07:42', 'check', '0213654286', 'hanoi', 1000000000, 2),
(32, 8, '2021-01-30 20:08:43', 'check', '0213654286', 'hanoi', 95736500, 2),
(33, 8, '2021-01-30 20:11:15', 'check', '0213654286', 'hanoi', 2100000, 2),
(34, 6, '2021-02-09 13:57:52', 'user', '0123456789', 'hanoi', 1500000, 0),
(35, 6, '2021-02-25 09:04:12', 'user', '0123456789', 'hanoi', 92100000, 0),
(36, 6, '2021-03-20 13:54:54', 'user', '0123456789', 'hanoi', 2100000, 1),
(37, 2, '2021-11-03 12:58:56', 'aess', '0321856479', 'hanoi', 2100000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'Áo'),
(2, 'Quần');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `phone_number` char(10) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id_user`, `email`, `password`, `name`, `sex`, `phone_number`, `address`, `status`) VALUES
(1, 'vanyyy2001@gmail.com', 'anh123', 'anh', 1, '0123546798', 'Hà nội', 0),
(2, 'abc@gmail.com', '12222', 'aess', 1, '0321856479', 'hanoi', 1),
(3, '226@hsh', '12222', 'hả', 1, '0987654123', 'hanoi', 0),
(4, 'a@gmail.com', '1234567', 'a hoàng', 0, '0123456789', 'thanh trì, hà nội', 0),
(5, 'lung@gmail.com', '123abc', 'a lửng', 1, '0123456789', 'cao bằng', 0),
(6, 'user@gmail.com', 'user', 'user', 1, '0123456789', 'hanoi', 0),
(8, 'ad@gmail.com', '123456ad', 'check', 1, '0213654286', 'hanoi', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_bill`
--

CREATE TABLE `detail_bill` (
  `id_bill` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `detail_bill`
--

INSERT INTO `detail_bill` (`id_bill`, `id_products`, `amount`, `price`) VALUES
(21, 3, 1, 1000000000),
(22, 1, 1, 999),
(22, 2, 1, 10000000),
(22, 4, 1, 2000000),
(23, 2, 1, 10000000),
(24, 2, 4, 10000000),
(24, 3, 1, 1000000000),
(24, 10, 1, 1500000),
(25, 2, 1, 10000000),
(26, 13, 1, 90000000),
(27, 3, 1, 1000000000),
(28, 4, 99, 2000000),
(28, 7, 24, 500000),
(28, 13, 4, 90000000),
(29, 13, 4, 90000000),
(30, 6, 16, 2000000),
(31, 3, 1, 1000000000),
(32, 9, 1, 636465),
(32, 10, 2, 1500000),
(32, 11, 1, 2100000),
(32, 13, 1, 90000000),
(33, 11, 1, 2100000),
(34, 10, 1, 1500000),
(35, 11, 1, 2100000),
(35, 13, 1, 90000000),
(36, 11, 1, 2100000),
(37, 11, 1, 2100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_category`
--

CREATE TABLE `detail_category` (
  `id` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `detail_category`
--

INSERT INTO `detail_category` (`id`, `id_category`, `name`) VALUES
(1, 1, 'Jacket'),
(2, 1, 'Hoodie'),
(3, 1, 'Blazer'),
(4, 1, 'Shirt'),
(5, 1, 'T-Shirt'),
(6, 1, 'Tanktop'),
(7, 2, 'Jeans'),
(8, 2, 'Shorts');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_products`, `name`, `price`, `image`, `description`, `amount`, `id_category`, `brand`) VALUES
(1, 'AHO-04361', 999, 'hoodie-vet-cao-do-2.jpg', '								  									  									  									  									  									  									  									  									  	check								  								  								  								  								  								  								  								  								  ', 100, 2, 'Adidas'),
(2, 'Adidas Áo T-Shirt CW0710', 10000000, '05c3596b7e35f5da036b15eea49a444c.jpg', '								  									  									  	aa								  								  								  ', 99, 5, 'Adidas'),
(3, 'Adidas Originals Clothes Teenage For Girls', 1000000000, 'Rosé.jpg', '								  									  									  									  									  									  									  									  									  									  									  	only 1								  								  								  								  								  								  								  								  								  								  								  ', 1, 4, 'Adidas'),
(4, 'Essentials Track Jacket', 2000000, 'b45feda5b7accac792e97c357ba3f0c3.jpg', '								  									  										  	\r\n									  								  								  ', 99, 1, 'Adidas'),
(5, 'Blazer', 1200000, 'BLAZER_DJen_GU3000.jpg', '									  	\r\n									  ', 20, 3, 'Adidas'),
(6, 'red girl', 2000000, 'tải xuống (1).jpg', '									  	\r\n									  ', 16, 6, 'Adidas'),
(7, 'black white', 500000, 'tải xuống.jpg', '								  										  	\r\n									  								  ', 24, 1, 'Adidas'),
(8, 'yellow hair', 1000000000, 'a1a_edited-1.jpg', '									  	\r\n									  ', 31, 1, 'Adidas'),
(9, 'white shirt', 636465, 'tải xuống (2).jpg', '									  	\r\n									  ', 11, 5, 'Adidas'),
(10, 'adidas shorts', 1500000, 'quần-short-own-the-run.jpg', '									  	\r\n									  ', 39, 8, 'Adidas'),
(11, 'Originals Denim Joggers', 2100000, '6202350-1-blue.webp', '									  	\r\n									  ', 97, 7, 'Adidas'),
(13, 'TLRD Track Jacket', 90000000, 'ffd4699758304d4c4ab9b707a1b34b6f.jpg', 'blink', 0, 1, 'adidas');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`id_bill`,`id_products`),
  ADD KEY `id_products` (`id_products`);

--
-- Chỉ mục cho bảng `detail_category`
--
ALTER TABLE `detail_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `detail_category`
--
ALTER TABLE `detail_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id_user`);

--
-- Các ràng buộc cho bảng `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `detail_bill_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`),
  ADD CONSTRAINT `detail_bill_ibfk_2` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`);

--
-- Các ràng buộc cho bảng `detail_category`
--
ALTER TABLE `detail_category`
  ADD CONSTRAINT `detail_category_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `detail_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
