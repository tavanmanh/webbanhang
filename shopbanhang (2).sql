-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 31, 2020 lúc 06:51 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'SAMSUNG'),
(2, 'LG'),
(3, 'NONY'),
(4, 'IPHONE');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `displayhome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `displayhome`) VALUES
(1, 'Máy Tính', 0),
(4, 'Điện Thoại', 0),
(6, 'Máy Ảnh', 1),
(17, 'Phụ Kiện', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `phone`, `password`) VALUES
(1, 'Nguyễn Văn A', 'nva@gmail.com', 'Hà Nội', '123456', '202cb962ac59075b964b07152d234b70'),
(2, 'test', 'test@gmail.com', 'Hà Nội', '123456', '202cb962ac59075b964b07152d234b70'),
(3, 'Nguyễn Văn E@', 'nve@gmail.com', 'Hà Nội', '123456', '202cb962ac59075b964b07152d234b70'),
(4, 'Tạ Văn Mạnh', 'tavanmanh@gmail.com', 'Xã Bình Lăng Huyện Ân Thi Tỉnh Hưng Yên', '0326648389', 'e6ef6ad19456eb81454ce80a889d8d6e'),
(5, 'Tạ Văn Mạnh', 'tavanmanh111@gmail.com', 'Xã Bình Lăng Huyện Ân Thi Tỉnh Hưng Yên', '0326648389', '202cb962ac59075b964b07152d234b70'),
(6, 'nguyenvandoan', '17020883@vnu.edu.vn', 'Xã Bình Lăng Huyện Ân Thi Tỉnh Hưng Yên', '0777444567', '202cb962ac59075b964b07152d234b70'),
(7, 'Hiennguyen', 'tavanmanh11111@gmail.com', 'Xã Bình Lăng Huyện Ân Thi Tỉnh Hưng Yên', '(+84) 343458294', '202cb962ac59075b964b07152d234b70'),
(8, 'ta van manh', 'tavanmanh11123@gmail.com', 'Xã Bình Lăng Huyện Ân Thi Tỉnh Hưng Yên', '0777444567', '202cb962ac59075b964b07152d234b70'),
(9, '123', '123123', '123123', '123123', '4297f44b13955235245b2497399d7a93'),
(10, '123', '123123', '123123', '123123', '4297f44b13955235245b2497399d7a93'),
(11, '123', '123123', '123123', '123123', '4297f44b13955235245b2497399d7a93'),
(12, '123', '123123', '123123', '123123', '4297f44b13955235245b2497399d7a93'),
(13, '123', '123123', '123123', '123123', '4297f44b13955235245b2497399d7a93'),
(14, '123', '123123', '123123', '123123', '4297f44b13955235245b2497399d7a93'),
(15, 'nguyenvandoan', 'tavanmanh1111@gmail.com', 'ád', '0326648389', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 108, 1, 5000000),
(2, 2, 108, 1, 5000000),
(3, 2, 105, 1, 15990000),
(4, 3, 108, 1, 5000000),
(5, 4, 107, 1, 5000000),
(6, 5, 107, 1, 5000000),
(7, 0, 107, 1, 5000000),
(8, 6, 107, 1, 5000000),
(9, 6, 111, 1, 7000000),
(10, 0, 108, 1, 5000000),
(11, 0, 105, 1, 15990000),
(12, 7, 107, 1, 5000000),
(13, 7, 108, 1, 5000000),
(14, 8, 109, 1, 6000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `address` text DEFAULT NULL,
  `Note` longtext DEFAULT NULL,
  `name` varchar(500) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `date`, `price`, `status`, `address`, `Note`, `name`, `mail`, `phone`) VALUES
(1, 5, '2020-10-30', 4550000, 0, '', NULL, '', '', ''),
(2, 5, '2020-10-30', 17661800, 0, 'Xã Bình Lăng Huyện Ân Thi Tỉnh Hưng Yên', NULL, '', '', ''),
(3, 5, '2020-10-30', 4550000, 0, 'Xã Bình Lăng Huyện Ân Thi Tỉnh Hưng Yên', NULL, 'name', '', ''),
(4, 5, '2020-10-30', 4700000, 0, 'Xã Bình Lăng Huyện Ân Thi Tỉnh Hưng Yên', NULL, 'name', '', ''),
(5, 5, '2020-10-30', 4700000, 0, 'Xã Bình Lăng Huyện Ân Thi Tỉnh Hưng Yên', NULL, 'nguyenvandoan', '', ''),
(6, 5, '2020-10-30', 10230000, 0, 'Xã Bình Lăng Huyện Ân Thi Tỉnh Hưng Yên', 'qewte', 'Máy Tính MSI', '', ''),
(7, 5, '2020-10-30', 9250000, 0, 'Xã Bình Lăng Huyện Ân Thi Tỉnh Hưng Yên', 'dfsgsf', 'Hiennguyen', 'tavanmanh111@gmail.com', '(+84) 343458294'),
(8, 5, '2020-10-30', 5100000, 0, 'Xã Bình Lăng Huyện Ân Thi Tỉnh Hưng Yên', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'Máy Tính MSI', 'tavanmanh111@gmail.com', '0326648389');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(4000) NOT NULL,
  `content` text NOT NULL,
  `hot` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(500) NOT NULL,
  `photo1` varchar(500) NOT NULL,
  `photo2` varchar(500) NOT NULL,
  `photo3` varchar(500) NOT NULL,
  `photo4` varchar(500) NOT NULL,
  `photo5` varchar(225) NOT NULL,
  `price` float NOT NULL,
  `discount` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `time` date DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `hot`, `photo`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`, `price`, `discount`, `category_id`, `time`, `brand_id`) VALUES
(3, 'Máy Tính MSI', '<p>yểt</p>\r\n', '<p>ẻty</p>\r\n', 1, '1603885617_5670_dell_inspiron_15_7501_x3mry1.jpg', '1603885617_5745_dsc02646.jpg', '1603885617_5745_dsc02648.jpg', '', '', '', 4900000, 8, 1, '2020-10-25', 1),
(83, 'Máy ảnh canon', '<p>41322413</p>\r\n', '<p>1243</p>\r\n', 1, '1603376528_product09.png', '1603376528_shop02.png', '1603376528_product07.png', '1603376528_shop02.png', '1603376528_product09.png', '', 5000000, 8, 6, '2020-10-22', 2),
(86, 'Máy ảnh px5', '<p>3423</p>\r\n', '<p>5453425234</p>\r\n', 1, '1603644448_nikon-coolpix-p1000(1).jpg', '1603644448_may-anh-canon-powershot-g7-x-mark-ii.jpg', '1603644448_may-anh-canon-powershot-g7-x-mark-ii1.jpg', '1603644448_canon-eos-3000d-kit-1855mm-f3556-iii1.jpg', '1603644448_sony-cybershot-dscrx100-iii.jpg', '1603644448_canon-eos-3000d-kit-1855mm-f3556-iii1.jpg', 2000000, 4, 6, '2020-10-25', 4),
(88, 'MÁY ẢNH DSC-W830/ ĐEN', '<p>- Cảm biến h&igrave;nh ảnh CCD 1/ 2.3 inch&nbsp;<br />\r\n- Độ ph&acirc;n giải : 20.1 Megapixel<br />\r\n- Zoom quang học 8x<br />\r\n- Chống rung quang học<br />\r\n- M&agrave;n h&igrave;nh 2.7inch<br />\r\n- Độ nhạy s&aacute;ng ISO 100-3200<br />\r\n- Tốc độ m&agrave;n chập 2 - 1/1500<br />\r\n- Quay phim HD<br />\r\n- Chụp Panorama 360 độ&nbsp;<br />\r\n- Pin tương th&iacute;ch NP-BN1</p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&atilde; sản phẩm</td>\r\n			<td>A01040091</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Số lượng</td>\r\n			<td>62 sản phẩm</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, '1603643648_sony-cybershot-dscrx100-iii.jpg', '1603643648_sony-cybershot-dsc-w830-den.jpeg', '1603643648_sony-cybershot-dsc-w830-den-1(1).jpg', '1603643648_sony-cybershot-dsc-w830-den-2(1).jpg', '1603643648_sony-cybershot-dsc-w830-den-3(1).jpg', '1603643648_sony-cybershot-dscrx100-iii.jpg', 2700000, 8, 6, '2020-10-25', 4),
(90, 'Máy  PowerShot G7 X Mark II ', '<p>- Bộ xử l&yacute; H&igrave;nh ảnh DIGIC 7 MỚI&nbsp;</p>\r\n\r\n<p>- Cảm biến CMOS loại 1.0 inch</p>\r\n\r\n<p>- Zoom quang học 4.2x 24 - 100mm (tương đương 35mm)</p>\r\n\r\n<p>- Ống k&iacute;nh f/1.8 - f/2.8</p>\r\n\r\n<p>- M&agrave;n h&igrave;nh LCD cảm ứng loại nghi&ecirc;ng 3.0 inch&nbsp;</p>\r\n\r\n<p>- C&oacute; khả năng kết nối Wi-Fi v&agrave; NFC</p>\r\n\r\n<p>- Pin tương th&iacute;ch NB-13L</p>\r\n', '<p><strong>&nbsp;<a href=\"https://binhminhdigital.com/phu-kien-may-anh-may-quay/\" target=\"_blank\">Phụ kiện m&aacute;y ảnh đi k&egrave;m</a>:</strong>&nbsp;<em>Pin, Sạc pin, D&acirc;y đeo, Cataloge, Phiếu bảo h&agrave;nh</em></p>\r\n', 1, '1603644061_may-anh-canon-powershot-g7-x-mark-ii.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii1.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii2.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii3.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii1.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii2.jpg', 11490000, 15, 6, '2020-10-25', 4),
(93, 'Máy  PowerShot G7 X Mark II ', '<p>- Bộ xử l&yacute; H&igrave;nh ảnh DIGIC 7 MỚI&nbsp;</p>\r\n\r\n<p>- Cảm biến CMOS loại 1.0 inch</p>\r\n\r\n<p>- Zoom quang học 4.2x 24 - 100mm (tương đương 35mm)</p>\r\n\r\n<p>- Ống k&iacute;nh f/1.8 - f/2.8</p>\r\n\r\n<p>- M&agrave;n h&igrave;nh LCD cảm ứng loại nghi&ecirc;ng 3.0 inch&nbsp;</p>\r\n\r\n<p>- C&oacute; khả năng kết nối Wi-Fi v&agrave; NFC</p>\r\n\r\n<p>- Pin tương th&iacute;ch NB-13L</p>\r\n', '<p><strong>&nbsp;<a href=\"https://binhminhdigital.com/phu-kien-may-anh-may-quay/\" target=\"_blank\">Phụ kiện m&aacute;y ảnh đi k&egrave;m</a>:</strong>&nbsp;<em>Pin, Sạc pin, D&acirc;y đeo, Cataloge, Phiếu bảo h&agrave;nh</em></p>\r\n', 1, '1603644061_may-anh-canon-powershot-g7-x-mark-ii.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii1.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii2.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii3.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii1.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii2.jpg', 11490000, 15, 6, '2020-10-25', 4),
(95, 'MÁY ẢNH DSC-W830/ ĐEN', '<p>- Cảm biến h&igrave;nh ảnh CCD 1/ 2.3 inch&nbsp;<br />\r\n- Độ ph&acirc;n giải : 20.1 Megapixel<br />\r\n- Zoom quang học 8x<br />\r\n- Chống rung quang học<br />\r\n- M&agrave;n h&igrave;nh 2.7inch<br />\r\n- Độ nhạy s&aacute;ng ISO 100-3200<br />\r\n- Tốc độ m&agrave;n chập 2 - 1/1500<br />\r\n- Quay phim HD<br />\r\n- Chụp Panorama 360 độ&nbsp;<br />\r\n- Pin tương th&iacute;ch NP-BN1</p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&atilde; sản phẩm</td>\r\n			<td>A01040091</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Số lượng</td>\r\n			<td>62 sản phẩm</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, '1603643648_sony-cybershot-dscrx100-iii.jpg', '1603643648_sony-cybershot-dsc-w830-den.jpeg', '1603643648_sony-cybershot-dsc-w830-den-1(1).jpg', '1603643648_sony-cybershot-dsc-w830-den-2(1).jpg', '1603643648_sony-cybershot-dsc-w830-den-3(1).jpg', '1603643648_sony-cybershot-dscrx100-iii.jpg', 2700000, 8, 6, '2020-10-25', 4),
(96, 'Máy ảnh px5', '<p>3423</p>\r\n', '<p>5453425234</p>\r\n', 1, '1603644448_nikon-coolpix-p1000(1).jpg', '1603644448_may-anh-canon-powershot-g7-x-mark-ii.jpg', '1603644448_may-anh-canon-powershot-g7-x-mark-ii1.jpg', '1603644448_canon-eos-3000d-kit-1855mm-f3556-iii1.jpg', '1603644448_sony-cybershot-dscrx100-iii.jpg', '1603644448_canon-eos-3000d-kit-1855mm-f3556-iii1.jpg', 2000000, 4, 6, '2020-10-25', 4),
(97, 'Máy ảnh canon', '<p>41322413</p>\r\n', '<p>1243</p>\r\n', 1, '1603376528_product09.png', '1603376528_shop02.png', '1603376528_product07.png', '1603376528_shop02.png', '1603376528_product09.png', '', 5000000, 8, 6, '2020-10-22', 2),
(98, 'Máy Tính MSI', '<p>yểt</p>\r\n', '<p>ẻty</p>\r\n', 1, '1603849249_5670_dell_inspiron_15_7501_x3mry1.jpg', '1603849249_5670_dell_inspiron_15_7501_6.jpg', '1603849249_5745_dsc02648.jpg', '1603849249_5745_dsc02646.jpg', '', '', 4900000, 8, 1, '2020-10-25', 1),
(99, 'Máy Tính MSI', '<p>yểt</p>\r\n', '<p>ẻty</p>\r\n', 1, '1603885593_5124_srzszn98cmatoo4s_setting_fff_1_90_end_500.jpg', '1603885593_5670_dell_inspiron_15_7501_7.jpg', '1603885593_5745_5773_1_redmibook_14g2.jpg', '1603885593_5745_dsc02646.jpg', '', '', 4900000, 8, 1, '2020-10-25', 1),
(100, 'Máy ảnh canon', '<p>41322413</p>\r\n', '<p>1243</p>\r\n', 1, '1603376528_product09.png', '1603376528_shop02.png', '1603376528_product07.png', '1603376528_shop02.png', '1603376528_product09.png', '', 5000000, 8, 6, '2020-10-22', 2),
(101, 'Máy ảnh px5', '<p>3423</p>\r\n', '<p>5453425234</p>\r\n', 1, '1603644448_nikon-coolpix-p1000(1).jpg', '1603644448_may-anh-canon-powershot-g7-x-mark-ii.jpg', '1603644448_may-anh-canon-powershot-g7-x-mark-ii1.jpg', '1603644448_canon-eos-3000d-kit-1855mm-f3556-iii1.jpg', '1603644448_sony-cybershot-dscrx100-iii.jpg', '1603644448_canon-eos-3000d-kit-1855mm-f3556-iii1.jpg', 2000000, 4, 6, '2020-10-25', 4),
(102, 'MÁY ẢNH DSC-W830/ ĐEN', '<p>- Cảm biến h&igrave;nh ảnh CCD 1/ 2.3 inch&nbsp;<br />\r\n- Độ ph&acirc;n giải : 20.1 Megapixel<br />\r\n- Zoom quang học 8x<br />\r\n- Chống rung quang học<br />\r\n- M&agrave;n h&igrave;nh 2.7inch<br />\r\n- Độ nhạy s&aacute;ng ISO 100-3200<br />\r\n- Tốc độ m&agrave;n chập 2 - 1/1500<br />\r\n- Quay phim HD<br />\r\n- Chụp Panorama 360 độ&nbsp;<br />\r\n- Pin tương th&iacute;ch NP-BN1</p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&atilde; sản phẩm</td>\r\n			<td>A01040091</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Số lượng</td>\r\n			<td>62 sản phẩm</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, '1603643648_sony-cybershot-dscrx100-iii.jpg', '1603643648_sony-cybershot-dsc-w830-den.jpeg', '1603643648_sony-cybershot-dsc-w830-den-1(1).jpg', '1603643648_sony-cybershot-dsc-w830-den-2(1).jpg', '1603643648_sony-cybershot-dsc-w830-den-3(1).jpg', '1603643648_sony-cybershot-dscrx100-iii.jpg', 2700000, 8, 6, '2020-10-25', 4),
(104, 'Máy  PowerShot G7 X Mark II ', '<p>- Bộ xử l&yacute; H&igrave;nh ảnh DIGIC 7 MỚI&nbsp;</p>\r\n\r\n<p>- Cảm biến CMOS loại 1.0 inch</p>\r\n\r\n<p>- Zoom quang học 4.2x 24 - 100mm (tương đương 35mm)</p>\r\n\r\n<p>- Ống k&iacute;nh f/1.8 - f/2.8</p>\r\n\r\n<p>- M&agrave;n h&igrave;nh LCD cảm ứng loại nghi&ecirc;ng 3.0 inch&nbsp;</p>\r\n\r\n<p>- C&oacute; khả năng kết nối Wi-Fi v&agrave; NFC</p>\r\n\r\n<p>- Pin tương th&iacute;ch NB-13L</p>\r\n', '<p><strong>&nbsp;<a href=\"https://binhminhdigital.com/phu-kien-may-anh-may-quay/\" target=\"_blank\">Phụ kiện m&aacute;y ảnh đi k&egrave;m</a>:</strong>&nbsp;<em>Pin, Sạc pin, D&acirc;y đeo, Cataloge, Phiếu bảo h&agrave;nh</em></p>\r\n', 1, '1603644061_may-anh-canon-powershot-g7-x-mark-ii.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii1.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii2.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii3.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii1.jpg', '1603644061_may-anh-canon-powershot-g7-x-mark-ii2.jpg', 11490000, 15, 6, '2020-10-25', 4),
(105, 'Máy Ảnh Canon EOS M50', '<p>- Cảm biến: APS - C CMOS<br />\r\n- Độ ph&acirc;n giải: 24.1MP<br />\r\n- Ống k&iacute;nh: STM EF-M 15-45mm f/3.5-6.3 IS<br />\r\n- ISO: 100 - 25600 (mở rộng ISO: 51200)<br />\r\n- Ống ngắm EVF: 2.36 triệu điểm ảnh bao phủ 100% khung h&igrave;nh<br />\r\n- M&agrave;n h&igrave;nh LCD: 3 inch, cảm ứng, 1.04k điểm ảnh, lật đa chiều<br />\r\n- Quay phim 4K: 25p Full HD 1080 60p, HD 720 120p<br />\r\n- Kết nối: Wifi, Bluetooth, NFC<br />\r\n- Giao tiếp: 1/8inch Microphone, HDMI D (Micro), USB 2.0 Micro-B<br />\r\n- Thẻ nhớ: SD, SDHC, SDXC<br />\r\n- Phụ kiện đi k&egrave;m: pin LP-E12, sạc LC-E12, d&acirc;y đeo</p>\r\n', '<p>EM200DB, nắp R-F-4, thẻ bảo h&agrave;nh ch&iacute;nh h&atilde;ng, hướng dẫn sử dụng.</p>\r\n', 0, '1603644645_canon-eos-m50-kit-1545mm-trang(2).jpg', '1603644645_canon-eos-m50-kit-1545mm-trang1.jpg', '1603644645_canon-eos-m50-kit-1545mm-trang2.jpg', '1603644645_canon-eos-m50-kit-1545mm-trang3.jpg', '1603644645_canon-eos-m50-kit-1545mm-trang4.jpg', '1603644645_canon-eos-m50-kit-1545mm-trang1.jpg', 15990000, 18, 6, '2020-10-25', 4),
(106, 'Ốp điện thoại', '<h1>K&Iacute;NH CƯỜNG LỰC RE-MAX ĐẠI B&Agrave;NG IPHONE X/XS/11 PRO</h1>\r\n', '<h1>K&Iacute;NH CƯỜNG LỰC RE-MAX ĐẠI B&Agrave;NG IPHONE X/XS/11 PRO</h1>\r\n', 0, '1603690417_kinh-cuong-luc-re-max-dai-bang-iphone-x-xs-11-pro-1_250x250.jpg', '1603690417_op-lung-da-melko-note-20-ultra-5_250x250.jpg', '1603690417_Op-lung-lens-slide-iphone-67-5.jpg', '1603690417_op-lung-lens-xr-2_250x250.jpg', '', '', 50000, 8, 17, '2020-10-26', 4),
(107, 'Điện thoại 1', '<p>Được ra mắt đồng thời với điện thoại iPhone X nhưng kh&ocirc;ng v&igrave; thế m&agrave; độ hot của điện thoại Apple iPhone 8 64GB (Đổi bảo h&agrave;nh - Chưa active) (H&agrave;ng nhập khẩu) bị lu mờ. Apple iPhone 8 64GB thậm ch&iacute; sở hữu nhiều cải tiến vượt bậc so với tiền nhiệm c&agrave;ng củng cố vị tr&iacute; dẫn đầu của h&atilde;ng &ldquo;t&aacute;o khuyết&rdquo; n&agrave;y.</p>\r\n', '<h3>Thiết kế được đổi mới tr&ecirc;n Apple iPhone 8 64GB</h3>\r\n', 1, '1603690525_19806547877_954218351_250x250.jpg', '1603690525_op-lung-da-melko-note-20-ultra-5_250x250.jpg', '1603690525_Op-lung-lens-slide-iphone-67-5.jpg', '1603690525_op-lung-da-melko-note-20-ultra-5_250x250.jpg', '1603690525_op-lung-lens-xr-2_250x250.jpg', '', 5000000, 6, 4, '2020-10-26', 4),
(108, 'Máy Ảnh Test', '<p>test</p>\r\n', '', 1, '1603820176_canon-eos-m50-kit-1545mm-trang1.jpg', '1603820176_canon-eos-m50-kit-1545mm-trang1.jpg', '1603820176_canon-eos-m50-kit-1545mm-trang3.jpg', '1603820176_canon-eos-m50-kit-1545mm-trang1.jpg', '1603820176_canon-eos-m50-kit-1545mm-trang4.jpg', '', 5000000, 9, 6, '2020-10-27', 3),
(109, 'Máy Tính MSI', '<p>Bảo h&agrave;nh 12 th&aacute;ng ch&iacute;nh h&atilde;ng -&nbsp;<a href=\"https://laptop88.vn/page/chinh-sach-bao-hanh-voi-laptop-moi-chinh-hang\">Xem ch&iacute;nh s&aacute;ch</a></p>\r\n\r\n<p>✅Gi&aacute; ở tr&ecirc;n đ&atilde; bao gồm 10% VAT</p>\r\n\r\n<p>✅ MIỄN PH&Iacute; GIAO H&Agrave;NG TẬN NH&Agrave;</p>\r\n\r\n<p>- Với đơn h&agrave;ng &lt; 4.000.000 đồng: Miễn ph&iacute; giao h&agrave;ng cho đơn h&agrave;ng &lt; 5km t&iacute;nh từ cửa h&agrave;ng Laptop88 gần nhất</p>\r\n\r\n<p>- Với đơn h&agrave;ng &gt; 4.000.000 đồng: Miễn ph&iacute; giao h&agrave;ng (kh&aacute;ch h&agrave;ng chịu ph&iacute; bảo hiểm h&agrave;ng h&oacute;a nếu c&oacute;)</p>\r\n', '<p>123</p>\r\n', 1, '1603849216_5124_pznhjxb3d3zmbcsb_setting_fff_1_90_end_500.jpg', '1603849216_5124_srzszn98cmatoo4s_setting_fff_1_90_end_500.jpg', '1603849216_5670_dell_inspiron_15_7501_7.jpg', '1603849216_5670_dell_inspiron_15_7501_x3mry1.jpg', '', '', 6000000, 15, 1, '2020-10-28', 4),
(110, 'Ốp lưng', '<p>In&nbsp;<em>ốp</em>&nbsp;điện thoại chất lượng cao tất cả d&ograve;ng m&aacute;y gi&aacute; chỉ từ 69K. Giao h&agrave;ng to&agrave;n quốc. Tự thiết kể&nbsp;<em>ốp</em>&nbsp;điện thoại v&agrave; đặt h&agrave;ng ngay tr&ecirc;n website, gi&aacute; rẻ nhất to&agrave;n quốc. Đ&uacute;ng mẫu mới thanh to&aacute;n. Nhận h&agrave;ng kiểm tra.</p>\r\n', '<p>In&nbsp;<em>ốp</em>&nbsp;điện thoại chất lượng cao tất cả d&ograve;ng m&aacute;y gi&aacute; chỉ từ 69K. Giao h&agrave;ng to&agrave;n quốc. Tự thiết kể&nbsp;<em>ốp</em>&nbsp;điện thoại v&agrave; đặt h&agrave;ng ngay tr&ecirc;n website, gi&aacute; rẻ nhất to&agrave;n quốc. Đ&uacute;ng mẫu mới thanh to&aacute;n. Nhận h&agrave;ng kiểm tra.</p>\r\n', 1, '1603849421_op-lung-lens-xr-2_250x250.jpg', '1603849421_op-lung-kim-loai-batman-samsung-s10eplus-11.jpg', '1603849421_op-lung-da-melko-note-20-ultra-5_250x250.jpg', '1603849421_p-lưng-UAG-Camo-iPhone-11-Pro-max-av44_250x250.jpg', '', '', 60000, 8, 17, '2020-10-28', 3),
(111, 'Máy Tính MSI', '<p>✅ Miễn ph&iacute; vận chuyển trong b&aacute;n k&iacute;nh 10km từ cửa h&agrave;ng LAPTOP TCC gần nhất</p>\r\n\r\n<p>✅ Miễn ph&iacute; c&acirc;n m&agrave;u h&igrave;nh bằng Spyder 5 Elite</p>\r\n\r\n<p>✅ Bảo h&agrave;nh 12 th&aacute;ng 1 đổi 1&nbsp;<a href=\"https://laptoptcc.com/chinh-sach-bao-hanh/\"><strong>&ndash;&nbsp;CHI TIẾT CH&Iacute;NH S&Aacute;CH</strong></a></p>\r\n\r\n<p>✅ Cam kết m&aacute;y x&aacute;ch tay nguy&ecirc;n bản 100% chưa qua sửa chữa tại c&aacute;c dự &aacute;n thị trường Mỹ v&agrave; ch&acirc;u &acirc;u&hellip;</p>\r\n\r\n<p>✅ Tặng bộ qu&agrave; tặng 650.000đ cho to&agrave;n bộ đơn h&agrave;ng tr&ecirc;n 5 triệu bao gồm . Balo, t&uacute;i chống sốc, chuột kh&ocirc;ng d&acirc;y, l&oacute;t di chuột</p>\r\n\r\n<p>✅ C&agrave;i đặt &ndash; Vệ sinh laptop ho&agrave;n to&agrave;n miễn ph&iacute; với tất cả laptop ( mua hoặc kh&ocirc;ng mua tại tcc đều được hưởng ch&iacute;nh s&aacute;ch tr&ecirc;n )</p>\r\n', '', 0, '1603850074_5124_srzszn98cmatoo4s_setting_fff_1_90_end_500.jpg', '1603850054_5124_srzszn98cmatoo4s_setting_fff_1_90_end_500.jpg', '1603850054_5124_pznhjxb3d3zmbcsb_setting_fff_1_90_end_500.jpg', '', '', '', 7000000, 21, 1, '2020-10-28', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `product_id`, `star`) VALUES
(63, 85, 3),
(64, 3, 4),
(65, 3, 2),
(66, 3, 1),
(67, 3, 5),
(68, 86, 3),
(69, 88, 3),
(70, 106, 2),
(71, 90, 3),
(72, 98, 2),
(73, 108, 3),
(74, 108, 4),
(75, 108, 5),
(76, 108, 2),
(77, 108, 3),
(78, 108, 4),
(79, 108, 1),
(80, 108, 2),
(81, 109, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(2, 'Nguyễn Văn B', 'tavanmanh222@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Nguyễn Văn C', 'tavanmanh333@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'Nguyễn Văn D', 'tavanmanh444@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'Nguyễn Văn E', 'tavanmanh5@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'Tạ Văn Mạnh', 'tavanmanh421999@gmail.com', 'e6ef6ad19456eb81454ce80a889d8d6e'),
(7, 'Tạ Văn Mạnh123', 'tavanmanh@gmail.com', 'fd8896e0f8a98e08a553437f09a6daaf');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
