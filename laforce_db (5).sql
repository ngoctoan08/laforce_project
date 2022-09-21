-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 19, 2022 lúc 07:28 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laforce_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `title`, `create_at`, `updated_at`, `status`, `active`) VALUES
(1, 'Giày tây nam', '2022-09-01 15:19:51', '2022-09-01 15:19:51', 1, 1),
(2, 'Giày lười nam', '2022-09-01 15:20:00', '2022-09-01 15:20:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `status`, `created_at`) VALUES
(26, 'Doan Ngoc Toan', 'toannd158@gmail.com', '0868642605', 'Mai Dich, Cau Giay, Ha Noi', 1, '2022-09-19 08:56:33'),
(27, 'Doan Ngoc Hang', 'toannd158@gmail.com', '0868642605', 'Mai Dich, Cau Giay, Ha Noi', 1, '2022-09-19 09:10:28'),
(28, 'Doan Ngoc Toan', 'toannd158@gmail.com', '0868642605', 'Mai Dich, Cau Giay, Ha Noi', 1, '2022-09-19 09:23:51'),
(29, 'Doan Ngoc Toan', 'toannd158@gmail.com', '0868642605', 'Mai Dich, Cau Giay, Ha Noi', 1, '2022-09-19 11:11:28'),
(30, 'Doan Ngoc Toan', 'toannd158@gmail.com', '0868642605', 'Mai Dich, Cau Giay, Ha Noi', 1, '2022-09-19 11:35:24'),
(31, 'Bùi Hải Sơn', 'buihaison112@gmail.com', '0868642605', 'Mai Dich, Cau Giay, Ha Noi', 1, '2022-09-19 11:37:57'),
(32, 'Doan Ngoc Toan', 'toannd158@gmail.com', '0868642605', 'Mai Dich, Cau Giay, Ha Noi', 1, '2022-09-19 11:38:34'),
(33, 'Phan Đức Trọng', 'ductrongtmu@gmail.com', '0868642605', 'Nam Định', 1, '2022-09-19 12:09:55'),
(34, 'Doan Ngoc Toan', 'toannd158@gmail.com', '0868642605', 'Mai Dich, Cau Giay, Ha Noi', 1, '2022-09-19 12:10:18'),
(35, 'Doan Ngoc Toan', 'toannd158@gmail.com', '0868642605', 'Mai Dich, Cau Giay, Ha Noi', 1, '2022-09-19 12:50:08'),
(36, 'Doan Ngoc Toan', 'toannd158@gmail.com', '0868642605', 'Mai Dich, Cau Giay, Ha Noi', 1, '2022-09-19 20:50:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_image`
--

CREATE TABLE `list_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `list_image`
--

INSERT INTO `list_image` (`id`, `product_id`, `path`, `created_at`, `updated_at`, `active`) VALUES
(106, 12, 'sub16621980291995237768product-3-1.jpg', '2022-09-03 16:40:29', '2022-09-03 16:40:29', 1),
(107, 12, 'sub16621980292088136076product-3-2.jpg', '2022-09-03 16:40:29', '2022-09-03 16:40:29', 1),
(108, 12, 'sub1662198029256350543product-3-3.jpg', '2022-09-03 16:40:29', '2022-09-03 16:40:29', 1),
(109, 12, 'sub1662198029511900137product-3-4.jpg', '2022-09-03 16:40:29', '2022-09-03 16:40:29', 1),
(110, 13, 'sub16621980421040980303product-4-1.jpg', '2022-09-03 16:40:42', '2022-09-03 16:40:42', 1),
(111, 13, 'sub16621980422017263785product-4-2.jpg', '2022-09-03 16:40:42', '2022-09-03 16:40:42', 1),
(112, 13, 'sub16621980421013345528product-4-3.jpg', '2022-09-03 16:40:42', '2022-09-03 16:40:42', 1),
(113, 13, 'sub1662198042202191411product-4-4.jpg', '2022-09-03 16:40:42', '2022-09-03 16:40:42', 1),
(153, 73, 'sub16626040691210447520product-5-1.jpg', '2022-09-08 09:27:49', '2022-09-08 09:27:49', 1),
(154, 73, 'sub16626040691795855413product-5-2.jpg', '2022-09-08 09:27:49', '2022-09-08 09:27:49', 1),
(155, 73, 'sub16626040691021954553product-5-3.jpg', '2022-09-08 09:27:49', '2022-09-08 09:27:49', 1),
(156, 73, 'sub166260406987034278product-5-4.jpg', '2022-09-08 09:27:49', '2022-09-08 09:27:49', 1),
(157, 74, 'sub16626041351531117564product-7-1.jpg', '2022-09-08 09:28:55', '2022-09-08 09:28:55', 1),
(158, 74, 'sub16626041351893775974product-7-2.jpg', '2022-09-08 09:28:55', '2022-09-08 09:28:55', 1),
(159, 74, 'sub16626041351720202861product-7-3.jpg', '2022-09-08 09:28:55', '2022-09-08 09:28:55', 1),
(160, 74, 'sub1662604135113779205product-7-4.jpg', '2022-09-08 09:28:55', '2022-09-08 09:28:55', 1),
(161, 75, 'sub16626041831788487737product-8-1.jpg', '2022-09-08 09:29:43', '2022-09-08 09:29:43', 1),
(162, 75, 'sub16626041831306167908product-8-2.jpg', '2022-09-08 09:29:43', '2022-09-08 09:29:43', 1),
(163, 75, 'sub16626041831944295257product-8-3.jpg', '2022-09-08 09:29:43', '2022-09-08 09:29:43', 1),
(164, 75, 'sub1662604183452456078product-8-4.jpg', '2022-09-08 09:29:43', '2022-09-08 09:29:43', 1),
(169, 77, 'sub1662947518916685735product-9-0.jpg', '2022-09-12 08:51:58', '2022-09-12 08:51:58', 1),
(170, 77, 'sub16629475181341246190product-9-2.jpg', '2022-09-12 08:51:58', '2022-09-12 08:51:58', 1),
(171, 77, 'sub1662947518215917429product-9-3.jpg', '2022-09-12 08:51:58', '2022-09-12 08:51:58', 1),
(172, 77, 'sub16629475181947709456product-9-4.jpg', '2022-09-12 08:51:58', '2022-09-12 08:51:58', 1),
(173, 78, 'sub16629476311345035217product-10-1.jpg', '2022-09-12 08:53:51', '2022-09-12 08:53:51', 1),
(174, 78, 'sub16629476311676806711product-10-2.jpg', '2022-09-12 08:53:51', '2022-09-12 08:53:51', 1),
(175, 78, 'sub1662947631242526743product-10-3.jpg', '2022-09-12 08:53:51', '2022-09-12 08:53:51', 1),
(176, 78, 'sub16629476311462925561product-10-4.jpg', '2022-09-12 08:53:51', '2022-09-12 08:53:51', 1),
(177, 79, 'sub1662947743106169084product-11-1.jpg', '2022-09-12 08:55:43', '2022-09-12 08:55:43', 1),
(178, 79, 'sub1662947743418834984product-11-2.jpg', '2022-09-12 08:55:43', '2022-09-12 08:55:43', 1),
(179, 79, 'sub1662947743410738447product-11-3.jpg', '2022-09-12 08:55:43', '2022-09-12 08:55:43', 1),
(180, 79, 'sub1662947743852737005product-11-4.jpg', '2022-09-12 08:55:43', '2022-09-12 08:55:43', 1),
(181, 80, 'sub166294784698631577product-12-1.jpg', '2022-09-12 08:57:26', '2022-09-12 08:57:26', 1),
(182, 80, 'sub1662947846870912476product-12-2.jpg', '2022-09-12 08:57:26', '2022-09-12 08:57:26', 1),
(183, 80, 'sub16629478461235223334product-12-3.jpg', '2022-09-12 08:57:26', '2022-09-12 08:57:26', 1),
(184, 80, 'sub1662947846918256740product-12-4.jpg', '2022-09-12 08:57:26', '2022-09-12 08:57:26', 1),
(185, 81, 'sub1662947972922024036product-13-1.jpg', '2022-09-12 08:59:32', '2022-09-12 08:59:32', 1),
(186, 81, 'sub16629479722019638018product-13-2.jpg', '2022-09-12 08:59:32', '2022-09-12 08:59:32', 1),
(187, 81, 'sub16629479722141072583product-13-3.jpg', '2022-09-12 08:59:32', '2022-09-12 08:59:32', 1),
(188, 81, 'sub166294797227602104product-13-4.jpg', '2022-09-12 08:59:32', '2022-09-12 08:59:32', 1),
(189, 82, 'sub166294811656697788product-14-1.jpg', '2022-09-12 09:01:56', '2022-09-12 09:01:56', 1),
(190, 82, 'sub16629481161096384983product-14-2.jpg', '2022-09-12 09:01:56', '2022-09-12 09:01:56', 1),
(191, 82, 'sub1662948116318820109product-14-3.jpg', '2022-09-12 09:01:56', '2022-09-12 09:01:56', 1),
(192, 82, 'sub16629481161749649051product-14-4.jpg', '2022-09-12 09:01:56', '2022-09-12 09:01:56', 1),
(193, 83, 'sub16632287521730029558product-1-1.jpg', '2022-09-15 14:59:12', '2022-09-15 14:59:12', 1),
(194, 83, 'sub1663228752388677562product-1-2.jpg', '2022-09-15 14:59:12', '2022-09-15 14:59:12', 1),
(195, 83, 'sub16632287531486130917product-1-3.jpg', '2022-09-15 14:59:13', '2022-09-15 14:59:13', 1),
(196, 83, 'sub1663228753151634388product-1-4.jpg', '2022-09-15 14:59:13', '2022-09-15 14:59:13', 1),
(197, 84, 'sub16632288401976679517product-2-1.jpg', '2022-09-15 15:00:40', '2022-09-15 15:00:40', 1),
(198, 84, 'sub1663228840925102054product-2-2.jpg', '2022-09-15 15:00:40', '2022-09-15 15:00:40', 1),
(199, 84, 'sub1663228841927458709product-2-3.jpg', '2022-09-15 15:00:41', '2022-09-15 15:00:41', 1),
(200, 84, 'sub16632288412145352657product-2-4.jpg', '2022-09-15 15:00:41', '2022-09-15 15:00:41', 1),
(203, 86, 'sub1663558659155810872Untitled-1-01.jpg', '2022-09-19 10:37:39', '2022-09-19 10:37:39', 1),
(204, 86, 'sub1663558659866539514Untitled-1-02.jpg', '2022-09-19 10:37:39', '2022-09-19 10:37:39', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `note`, `status`, `created_at`) VALUES
(25, 26, '', 3, '2022-09-12 08:56:33'),
(26, 27, '', 1, '2022-09-12 09:10:29'),
(27, 28, '', 4, '2022-09-13 09:23:51'),
(28, 29, '', 1, '2022-09-19 11:11:28'),
(29, 30, '', 1, '2022-09-19 11:35:24'),
(30, 31, '', 1, '2022-09-19 11:37:57'),
(31, 32, '', 1, '2022-09-19 11:38:34'),
(32, 33, '', 1, '2022-09-19 12:09:56'),
(33, 34, '', 1, '2022-09-19 12:10:18'),
(34, 35, '', 1, '2022-09-19 12:50:08'),
(35, 36, '', 1, '2022-09-19 20:50:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `product_name`, `product_size`, `price`, `quantity`, `total`, `status`) VALUES
(55, 25, 12, 'Giày da nam kiểu dáng Oxford', 41, '1800000', 1, '1800000', 1),
(56, 25, 84, 'Giày da Oxford nam', 42, '1200000', 2, '2400000', 1),
(58, 27, 83, 'Giầy nam họa tiết vân da rắn', 39, '1450000', 1, '1450000', 1),
(59, 28, 13, 'Giày da nam vân da rắn nâu đỏ', 41, '1300000', 1, '1300000', 1),
(60, 28, 73, 'Giày Oxford nam phối màu nâu đỏ', 41, '1450000', 1, '1450000', 1),
(61, 29, 13, 'Giày da nam vân da rắn nâu đỏ', 40, '1300000', 2, '2600000', 1),
(62, 29, 73, 'Giày Oxford nam phối màu nâu đỏ', 41, '1450000', 1, '1450000', 1),
(63, 29, 83, 'Giầy nam họa tiết vân da rắn', 43, '1450000', 1, '1450000', 1),
(64, 30, 78, 'Giày tây nam Oxford Brogues GNLA08-8-D', 40, '1700000', 1, '1700000', 1),
(65, 30, 79, 'Giày tây buộc dây Cap Toe Derby GNLA21021-N', 41, '1950000', 1, '1950000', 1),
(66, 30, 84, 'Giày da Oxford nam', 41, '1200000', 1, '1200000', 1),
(67, 31, 13, 'Giày da nam vân da rắn nâu đỏ', 40, '1300000', 1, '1300000', 1),
(68, 31, 73, 'Giày Oxford nam phối màu nâu đỏ', 41, '1450000', 1, '1450000', 1),
(69, 31, 79, 'Giày tây buộc dây Cap Toe Derby GNLA21021-N', 40, '1950000', 1, '1950000', 1),
(70, 32, 13, 'Giày da nam vân da rắn nâu đỏ', 40, '1300000', 1, '1300000', 1),
(71, 32, 73, 'Giày Oxford nam phối màu nâu đỏ', 43, '1450000', 1, '1450000', 1),
(72, 32, 83, 'Giầy nam họa tiết vân da rắn', 43, '1450000', 1, '1450000', 1),
(73, 33, 13, 'Giày da nam vân da rắn nâu đỏ', 42, '1300000', 1, '1300000', 1),
(74, 33, 73, 'Giày Oxford nam phối màu nâu đỏ', 41, '1450000', 1, '1450000', 1),
(75, 34, 13, 'Giày da nam vân da rắn nâu đỏ', 39, '1300000', 1, '1300000', 1),
(76, 34, 79, 'Giày tây buộc dây Cap Toe Derby GNLA21021-N', 41, '1950000', 1, '1950000', 1),
(77, 34, 83, 'Giầy nam họa tiết vân da rắn', 43, '1450000', 2, '2900000', 1),
(78, 35, 13, 'Giày da nam vân da rắn nâu đỏ', 41, '1300000', 1, '1300000', 1),
(79, 35, 73, 'Giày Oxford nam phối màu nâu đỏ', 41, '1450000', 1, '1450000', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `avatar`, `created_at`, `updated_at`, `description`, `status`, `active`) VALUES
(12, 1, 'Giày da nam kiểu dáng Oxford', '1800000', '1662051729product-3-0.jpg', '2022-09-02 00:02:09', '2022-09-02 00:02:09', '<p><a href=\"https://laforce.vn/giay-da-nam-kieu-dang-oxford-gnlaaz01-1-d/\">Giày da nam kiểu dáng Oxford</a></p>', 1, -1),
(13, 1, 'Giày da nam vân da rắn nâu đỏ', '1300000', '1662051863product-4.jpg', '2022-09-02 00:04:23', '2022-09-02 00:04:23', '<p><a href=\"https://laforce.vn/giay-da-nam-van-ca-sau-mau-nau-gnlabc001-ndo/\">Giày da nam vân da rắn nâu đỏ</a></p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&gt;</p><p>&gt;</p><p>&gt;</p><p>&gt;</p>', 1, 1),
(73, 1, 'Giày Oxford nam phối màu nâu đỏ', '1450000', '1662604069product-5-0.jpg', '2022-09-08 09:27:49', '2022-09-08 09:27:49', '<p><strong>Giày Oxford nam phối màu nâu đỏ</strong></p>', 1, 1),
(74, 2, 'Giày lười nam họa tiết kẻ ca rô', '1700000', '1662604135product-7-0.jpg', '2022-09-08 09:28:55', '2022-09-08 09:28:55', '<ul><li>Từng đường may kép tỉ mỉ, chắc chắn chạy quanh giày</li><li>Họa tiết đai da vắt ngang lưỡi giày cách điệu</li><li>Sản phẩm <a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày mọi nam</strong></a> cách điệu với họa tiết nổi ở thân giày tạo cảm giác nam tính</li><li>Mũi giày tròn, bo viền chắc chắn</li><li>Màu: Đen</li></ul>', 1, 1),
(75, 2, 'Giày lười da nam GNLA2122-N', '1750000', '1662604183product-8-0.jpg', '2022-09-08 09:29:43', '2022-09-08 09:29:43', '<ul><li>Từng đường may kép tỉ mỉ, chắc chắn chạy quanh giày</li><li>Thiết kế&nbsp;<a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày lười nam</strong></a> họa tiết đan caro độc đáo tạo sự trẻ trung</li><li>Mũi giày tròn</li><li>Đế giày thiết kế chống trơn, trượt</li><li>Màu: Nâu</li></ul>', 1, 1),
(77, 1, 'Giày da Oxford Brogue GNLA9632-1301-D', '1750000', '1662947518product-9-1.jpg', '2022-09-12 08:51:58', '2022-09-12 08:51:58', '<ul><li><strong>Chất liệu</strong>: Da bò thật toàn bộ từ châu Âu</li><li>Đường may chi tiết, tỉ mỉ theo tiêu chuẩn.</li><li>Đế giày chắc chắn, chống trơn trượt.</li><li>Kiểu dáng <a href=\"https://laforce.vn/giay-tay-nam/\"><strong>giày tây nam</strong></a> với màu sắc trang nhã, hài hòa.</li><li>Thiết kế hiện đại, sang trọng phù hợp với các quý ông lịch lãm.</li><li>Kết hợp cùng quần âu, kaki, trang phục lịch sự.&nbsp;</li><li><strong>Màu</strong>: Đen</li><li><strong>Kích thước: </strong>38 – 43</li></ul>', 1, 1),
(78, 1, 'Giày tây nam Oxford Brogues GNLA08-8-D', '1700000', '1662947631product-10-0.jpg', '2022-09-12 08:53:51', '2022-09-12 08:53:51', '<ul><li><strong>Chất liệu</strong>: Da bò thật toàn bộ từ châu Âu</li><li>Đường may chi tiết, tỉ mỉ theo tiêu chuẩn.</li><li>Đế giày chắc chắn, chống trơn trượt.</li><li>Màu sắc trang nhã, hài hòa.</li><li>Phong cách <a href=\"https://laforce.vn/giay-oxford-nam/\"><strong>giày Oxford nam</strong></a> hiện đại, sang trọng phù hợp với các quý ông lịch lãm.</li><li>Kết hợp cùng quần âu, kaki, trang phục lịch sự.&nbsp;</li><li><strong>Màu</strong>: Đen</li><li><strong>Kích thước: </strong>38 – 43</li></ul>', 1, 1),
(79, 1, 'Giày tây buộc dây Cap Toe Derby GNLA21021-N', '1950000', '1662947743product-11.jpg', '2022-09-12 08:55:43', '2022-09-12 08:55:43', '<ul><li>Chất liệu da bò nhập khẩu 100%, siêu bền đẹp</li><li>Phom giày mũi nhọn, viền hoạ tiết trên mũi giày</li><li>Đế xẻ rãnh chống trơn trượt</li><li>Màu: Nâu</li><li>Mẫu&nbsp;<a href=\"https://laforce.vn/giay-tay-nam/\"><strong>giày tây nam cao cấp</strong></a>&nbsp;độc quyền tại Đồ da LaForce</li></ul>', 1, 1),
(80, 2, 'Giày lười da nam Penny Loafer GNLA1199-D', '1150000', '1662947846product-12-0.jpg', '2022-09-12 08:57:26', '2022-09-12 08:57:26', '<ul><li><strong>Chất liệu</strong>: Da bò thật toàn bộ từ châu Âu</li><li>Đường may chi tiết, tỉ mỉ theo tiêu chuẩn.</li><li>Đế giày chắc chắn, chống trơn trượt.</li><li>Thiết kế dạng Penny Loafer với đai da vắt ngang thân giày</li><li>Sản phẩm&nbsp;<a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày lười nam</strong></a>&nbsp;thích hợp đi cùng quần âu, kaki, trang phục lịch sự.&nbsp;</li><li><strong>Màu</strong>: Đen</li><li><strong>Kích thước:&nbsp;</strong>38 – 43</li></ul>', 1, 1),
(81, 2, 'Giày nam Penny Loafer da lộn GNLA0828-N', '1600000', '1662947971product-13-0.jpg', '2022-09-12 08:59:31', '2022-09-12 08:59:31', '<ul><li><strong>Chất liệu</strong>: Da thật toàn bộ từ châu Âu</li><li>Đường may chi tiết, tỉ mỉ theo tiêu chuẩn.</li><li>Đế giày chắc chắn, chống trơn trượt.</li><li>Mẫu <a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày lười nam</strong></a> với màu sắc trang nhã, hài hòa.</li><li>Thiết kế hiện đại, sang trọng phù hợp với các quý ông lịch lãm.</li><li>Kết hợp cùng quần âu, kaki, trang phục lịch sự.&nbsp;</li><li><strong>Màu</strong>: Nâu&nbsp;</li><li><strong>Kích thước: </strong>38 – 43</li></ul>', 1, 1),
(82, 2, 'Giày lười nam Penny Loafer GNLA8878-102-D', '1600000', '1662948116product-14.jpg', '2022-09-12 09:01:56', '2022-09-12 09:01:56', '<ul><li>Từng đường may kép tỉ mỉ, chắc chắn chạy quanh giày</li><li>Họa tiết đai da vắt ngang lưỡi giày</li><li>Dáng <a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày lười nam</strong></a> mũi tròn</li><li>Đế giày thiết kế chống trơn, trượt</li><li>Màu: Đen&nbsp;</li></ul>', 1, 1),
(83, 1, 'Giầy nam họa tiết vân da rắn', '1450000', '1663228752product-1-0.jpg', '2022-09-15 14:59:12', '2022-09-15 14:59:12', '<ul><li>Chất liệu da bò nhập khẩu 100%, siêu bền đẹp</li><li>Thiết kế <a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày lười nam</strong></a> họa tiết giả vân da cá sấu sang trọng</li><li>Đường chỉ may tỉ mỉ theo tiêu chuẩn Châu Âu</li><li>Màu: Đen</li></ul><p>&gt;</p><p>&gt;</p>', 1, 1),
(84, 1, 'Giày da Oxford nam', '1200000', '1663228840product-2-0.jpg', '2022-09-15 15:00:40', '2022-09-15 15:00:40', '<ul><li>Thiết kế hiện đại</li><li>Kiểu dáng:&nbsp;<a href=\"https://laforce.vn/giay-oxford-nam/\"><strong>giày tây nam Oxford&nbsp;&nbsp;</strong></a></li><li>Đếxẻ rãnh chống trơn trượt</li><li>Mũi tròn hiện đại, dễ kết hợp trang phục</li><li>Đường chỉ may tỉ mỉ theo tiêu chuẩn châu Âu</li><li>Màu: nâu</li></ul><p>&gt;</p>', 1, 1),
(86, 1, 'Doan Ngoc Toan', '80000', '1663558659Untitled-1-02.jpg', '2022-09-13 10:37:39', '2022-09-19 10:37:39', '', 1, -1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(1, 38),
(2, 39),
(3, 40),
(4, 41),
(5, 42),
(6, 43);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store`
--

CREATE TABLE `store` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `store`
--

INSERT INTO `store` (`product_id`, `quantity`, `size_id`, `created_at`) VALUES
(13, 8, 1, '2022-09-18 14:42:18'),
(13, 10, 2, '2022-09-18 14:42:18'),
(13, 10, 3, '2022-09-18 14:42:18'),
(13, 10, 4, '2022-09-18 14:42:18'),
(13, 10, 5, '2022-09-18 14:42:18'),
(13, 10, 6, '2022-09-18 14:42:18'),
(12, 10, 1, '2022-09-18 14:42:18'),
(12, 10, 2, '2022-09-18 14:42:18'),
(12, 10, 3, '2022-09-18 14:42:18'),
(12, 8, 4, '2022-09-18 14:42:18'),
(12, 10, 5, '2022-09-18 14:42:18'),
(12, 10, 6, '2022-09-18 14:42:18'),
(73, 10, 1, '2022-09-18 14:42:18'),
(73, 10, 2, '2022-09-18 14:42:18'),
(73, 10, 3, '2022-09-18 14:42:18'),
(73, 10, 4, '2022-09-18 14:42:18'),
(73, 10, 5, '2022-09-18 14:42:18'),
(73, 10, 6, '2022-09-18 14:42:18'),
(74, 10, 1, '2022-09-18 14:42:18'),
(74, 10, 2, '2022-09-18 14:42:18'),
(74, 10, 3, '2022-09-18 14:42:18'),
(74, 10, 4, '2022-09-18 14:42:18'),
(74, 10, 5, '2022-09-18 14:42:18'),
(74, 10, 6, '2022-09-18 14:42:18'),
(75, 10, 1, '2022-09-18 14:42:18'),
(75, 10, 2, '2022-09-18 14:42:18'),
(75, 10, 3, '2022-09-18 14:42:18'),
(75, 10, 4, '2022-09-18 14:42:18'),
(75, 10, 5, '2022-09-18 14:42:18'),
(75, 10, 6, '2022-09-18 14:42:18'),
(73, 10, 1, '2022-09-18 14:42:18'),
(73, 10, 2, '2022-09-18 14:42:18'),
(73, 10, 3, '2022-09-18 14:42:18'),
(73, 10, 4, '2022-09-18 14:42:18'),
(73, 10, 5, '2022-09-18 14:42:18'),
(74, 10, 1, '2022-09-18 14:42:18'),
(74, 10, 2, '2022-09-18 14:42:18'),
(74, 10, 3, '2022-09-18 14:42:18'),
(74, 10, 4, '2022-09-18 14:42:18'),
(74, 10, 5, '2022-09-18 14:42:18'),
(75, 10, 1, '2022-09-18 14:42:18'),
(73, 10, 2, '2022-09-18 14:42:18'),
(73, 10, 3, '2022-09-18 14:42:18'),
(73, 10, 4, '2022-09-18 14:42:18'),
(73, 10, 5, '2022-09-18 14:42:18'),
(74, 10, 1, '2022-09-18 14:42:18'),
(74, 10, 2, '2022-09-18 14:42:18'),
(74, 10, 3, '2022-09-18 14:42:18'),
(74, 10, 4, '2022-09-18 14:42:18'),
(74, 10, 5, '2022-09-18 14:42:18'),
(75, 10, 1, '2022-09-18 14:42:18'),
(75, 10, 2, '2022-09-18 14:42:18'),
(75, 10, 3, '2022-09-18 14:42:18'),
(75, 10, 4, '2022-09-18 14:42:18'),
(75, 10, 5, '2022-09-18 14:42:18'),
(77, 10, 1, '2022-09-18 14:42:18'),
(77, 10, 2, '2022-09-18 14:42:18'),
(77, 10, 3, '2022-09-18 14:42:18'),
(77, 10, 4, '2022-09-18 14:42:18'),
(77, 10, 5, '2022-09-18 14:42:18'),
(78, 10, 1, '2022-09-18 14:42:18'),
(78, 10, 2, '2022-09-18 14:42:18'),
(78, 10, 3, '2022-09-18 14:42:18'),
(78, 10, 4, '2022-09-18 14:42:18'),
(78, 10, 5, '2022-09-18 14:42:18'),
(79, 10, 1, '2022-09-18 14:42:18'),
(79, 10, 2, '2022-09-18 14:42:18'),
(79, 10, 3, '2022-09-18 14:42:18'),
(79, 10, 4, '2022-09-18 14:42:18'),
(79, 10, 5, '2022-09-18 14:42:18'),
(80, 10, 1, '2022-09-18 14:42:18'),
(80, 10, 2, '2022-09-18 14:42:18'),
(80, 10, 3, '2022-09-18 14:42:18'),
(80, 10, 4, '2022-09-18 14:42:18'),
(80, 10, 5, '2022-09-18 14:42:18'),
(81, 10, 1, '2022-09-18 14:42:18'),
(81, 10, 2, '2022-09-18 14:42:18'),
(81, 10, 3, '2022-09-18 14:42:18'),
(81, 10, 4, '2022-09-18 14:42:18'),
(81, 10, 5, '2022-09-18 14:42:18'),
(82, 10, 1, '2022-09-18 14:42:18'),
(82, 10, 2, '2022-09-18 14:42:18'),
(82, 10, 3, '2022-09-18 14:42:18'),
(82, 10, 4, '2022-09-18 14:42:18'),
(82, 10, 5, '2022-09-18 14:42:18'),
(83, 10, 1, '2022-09-18 14:42:18'),
(83, 9, 2, '2022-09-18 14:42:18'),
(83, 10, 6, '2022-09-18 14:42:18'),
(83, 10, 1, '2022-09-18 14:42:18'),
(83, 9, 2, '2022-09-18 14:42:18'),
(83, 10, 6, '2022-09-18 14:42:18'),
(84, 20, 2, '2022-09-19 00:37:09'),
(84, 20, 4, '2022-09-19 00:37:09'),
(84, 16, 5, '2022-09-19 00:37:09'),
(86, 10, 1, '2022-09-19 10:42:38'),
(86, 10, 2, '2022-09-19 10:42:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'null',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `avatar`, `status`, `created_at`) VALUES
(3, 'toannd158@gmail.com', '4a3825c9247765c50463702745d4ede7', 'Doan Ngoc Toan', 'null', 1, '2022-09-19 23:55:18');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `list_image`
--
ALTER TABLE `list_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_listimage` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_order` (`customer_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_order_detail` (`order_id`),
  ADD KEY `fk_products_order_detail` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`category_id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `size` (`size`);

--
-- Chỉ mục cho bảng `store`
--
ALTER TABLE `store`
  ADD KEY `fk_store_product` (`product_id`),
  ADD KEY `fk_store_size` (`size_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `list_image`
--
ALTER TABLE `list_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `list_image`
--
ALTER TABLE `list_image`
  ADD CONSTRAINT `fk_product_listimage` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_customer_order` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_orders_order_detail` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_products_order_detail` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `fk_store_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_store_size` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
