-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 03, 2023 lúc 01:28 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ezsupply`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `a_id` int(50) NOT NULL,
  `username` text NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`a_id`, `username`, `name`, `password`) VALUES
(1, 'Ezsupply', 'Admin', '13e363b88ac7a1b34cf8363defca3ab4'),
(2, 'mquangtr', 'mQuang', 'ffa94166ecffa90d6a5188911c1de3df'),
(3, 'hoanganhle', 'Hoàng Anh Lê', '4cd6d829d30e5e57946cc41571a9e7dd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cate`
--

CREATE TABLE `cate` (
  `c_id` int(11) NOT NULL,
  `direc` text NOT NULL,
  `cate` text DEFAULT NULL,
  `type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cate`
--

INSERT INTO `cate` (`c_id`, `direc`, `cate`, `type`) VALUES
(1, 'Gaming', NULL, NULL),
(2, 'Food', NULL, NULL),
(5, 'Food', 'Spices', NULL),
(6, 'Gaming', 'Keyboard', NULL),
(7, 'Food', 'Box', NULL),
(8, 'Gaming', 'Keyboard', 'switch'),
(9, 'Food', 'Spices', 'Sa tế '),
(10, 'Food', 'Box', 'Packing food');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `sm_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `d_price` int(11) NOT NULL,
  `ship` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `a_note` text NOT NULL,
  `stt` text NOT NULL,
  `d_date` date DEFAULT NULL,
  `d_day` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `details`
--

INSERT INTO `details` (`id`, `o_id`, `p_id`, `sm_id`, `s_id`, `g_id`, `amount`, `d_price`, `ship`, `fee`, `a_note`, `stt`, `d_date`, `d_day`) VALUES
(1, 58, 5, 1, 0, 0, 80, 5800, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(2, 59, 5, 1, 0, 0, 200, 5800, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(3, 60, 5, 1, 0, 0, 30, 5800, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(4, 61, 5, 1, 0, 0, 35, 5800, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(5, 62, 5, 1, 0, 0, 567, 5800, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(6, 63, 6, 2, 1, 0, 1000, 2200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(7, 63, 7, 2, 0, 0, 1000, 2650, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(8, 64, 4, 3, 0, 0, 120, 6200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(9, 65, 4, 3, 0, 0, 70, 6200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(10, 66, 3, 1, 0, 0, 50, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(11, 67, 8, 1, 0, 0, 1000, 2850, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(12, 68, 8, 1, 0, 0, 2000, 2850, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(13, 69, 4, 3, 0, 0, 40, 6200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(14, 70, 3, 1, 0, 0, 4, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(15, 72, 4, 3, 0, 0, 70, 6200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(16, 73, 4, 3, 0, 0, 50, 6200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(17, 74, 4, 3, 0, 0, 50, 6200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(18, 75, 3, 1, 0, 0, 30, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(19, 76, 3, 1, 0, 0, 20, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(20, 77, 3, 1, 0, 0, 70, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(21, 78, 3, 1, 1, 0, 200, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(22, 79, 3, 1, 0, 0, 10, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(23, 80, 3, 1, 0, 0, 34, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(24, 81, 4, 3, 0, 0, 84, 6200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(25, 82, 3, 1, 0, 0, 23, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(26, 83, 3, 1, 0, 0, 35, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(27, 84, 3, 1, 0, 0, 90, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(28, 85, 3, 1, 0, 0, 26, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(29, 86, 4, 3, 0, 0, 80, 6200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(30, 87, 3, 1, 0, 0, 80, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(31, 88, 4, 3, 0, 0, 100, 6200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(32, 89, 4, 3, 0, 0, 90, 6200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(33, 90, 3, 1, 0, 0, 90, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(34, 91, 3, 1, 0, 0, 5, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(35, 91, 4, 1, 0, 0, 10, 6200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(36, 92, 3, 1, 0, 0, 30, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(37, 92, 4, 1, 0, 0, 300, 6200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(38, 93, 3, 1, 0, 0, 70, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(39, 94, 3, 1, 2, 0, 70, 20000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(40, 95, 3, 1, 3, 0, 87, 20000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(41, 96, 3, 1, 1, 0, 5, 20000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(42, 98, 10, 3, 4, 0, 1500, 8000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(43, 99, 3, 1, 0, 0, 40, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(44, 102, 11, 3, 7, 0, 200, 12000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(45, 103, 3, 1, 8, 0, 300, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(46, 104, 11, 3, 0, 0, 30, 12000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(47, 104, 3, 1, 9, 0, 300, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(48, 105, 3, 1, 0, 0, 90, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(49, 106, 10, 3, 12, 0, 500, 8000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(50, 108, 12, 3, 1, 0, 2000, 2880, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(51, 111, 11, 3, 1, 0, 500, 12000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(52, 112, 3, 1, 0, 0, 50, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(53, 114, 3, 1, 0, 0, 5, 17000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(54, 121, 3, 1, 1, 0, 5, 20000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(55, 122, 3, 1, 0, 1, 50, 17000, 0, 40000, '', 'Đến kho TP.HCM', '0000-00-00', '0000-00-00'),
(56, 123, 11, 3, 1, 0, 15, 12000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(57, 124, 3, 1, 13, 0, 100, 20000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(58, 125, 4, 3, 15, 0, 50, 6200, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(59, 126, 13, 3, 1, 3, 65, 9000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(60, 127, 11, 3, 16, 0, 100, 12000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(61, 128, 11, 3, 17, 0, 30, 12000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(62, 129, 13, 3, 1, 3, 30, 9000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(63, 130, 3, 1, 0, 0, 10, 20000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(64, 131, 11, 3, 0, 0, 7, 12000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(65, 132, 13, 3, 0, 3, 10, 9000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(66, 133, 3, 1, 0, 0, 5, 20000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(67, 134, 13, 3, 0, 3, 4, 9000, 0, 40000, 'Free', '', '0000-00-00', '0000-00-00'),
(68, 137, 11, 3, 1, 0, 30, 12000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(69, 138, 3, 1, 0, 0, 20, 20000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(70, 139, 13, 3, 1, 3, 12, 9000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(71, 141, 13, 3, 0, 4, 10, 9000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(72, 142, 11, 3, 1, 4, 10, 12000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(73, 143, 13, 3, 0, 4, 10, 9000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(74, 144, 11, 3, 1, 4, 25, 12000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(75, 145, 11, 3, 19, 4, 70, 12000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(76, 146, 13, 3, 1, 4, 50, 9000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(77, 147, 13, 3, 1, 4, 35, 9000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(78, 148, 11, 3, 1, 4, 5, 12000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(79, 150, 15, 3, 20, 0, 1, 200000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(80, 151, 13, 3, 24, 0, 1, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(81, 152, 11, 3, 0, 0, 10, 13000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(82, 154, 18, 3, 22, 0, 2, 420000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(83, 155, 15, 3, 21, 0, 1, 220000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(84, 156, 19, 3, 22, 0, 20, 10000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(85, 157, 15, 3, 21, 0, 1, 220000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(86, 158, 13, 3, 22, 0, 2, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(87, 159, 15, 3, 22, 0, 1, 220000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(88, 160, 18, 3, 22, 0, 1, 420000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(89, 161, 13, 3, 22, 0, 1, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(90, 162, 13, 3, 22, 0, 1, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(91, 163, 13, 3, 20, 0, 1, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(92, 164, 13, 3, 0, 0, 3, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(93, 165, 17, 3, 22, 0, 150, 1000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(94, 166, 19, 3, 0, 0, 1, 10000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(95, 167, 13, 3, 0, 0, 1, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(96, 168, 19, 3, 1, 0, 14, 10000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(97, 169, 13, 3, 21, 0, 1, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(98, 171, 13, 3, 21, 0, 1, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(99, 172, 13, 3, 1, 0, 2, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(100, 173, 13, 3, 0, 0, 3, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(101, 174, 13, 3, 1, 0, 2, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(102, 175, 13, 3, 1, 0, 1, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(103, 176, 13, 3, 22, 5, 1, 350000, 0, 40000, '', 'Xác nhận đặt hàng', '0000-00-00', '0000-00-00'),
(104, 177, 13, 3, 1, 5, 2, 350000, 0, 40000, '', '', '0000-00-00', '0000-00-00'),
(105, 179, 18, 3, 28, 0, 1, 420000, 0, 40000, '', 'Xác nhận đặt hàng', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `factory`
--

CREATE TABLE `factory` (
  `f_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `f_img` text NOT NULL,
  `f_mail` text NOT NULL,
  `f_phone` text NOT NULL,
  `represent` text NOT NULL,
  `rep_phone` text NOT NULL,
  `f_no` text NOT NULL,
  `f_street` text NOT NULL,
  `f_ward` text NOT NULL,
  `f_district` text NOT NULL,
  `f_city` text NOT NULL,
  `f_nation` text NOT NULL,
  `license` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `factory`
--

INSERT INTO `factory` (`f_id`, `f_name`, `f_img`, `f_mail`, `f_phone`, `represent`, `rep_phone`, `f_no`, `f_street`, `f_ward`, `f_district`, `f_city`, `f_nation`, `license`) VALUES
(1, 'Dongguan Weikay Electronics Co.,Ltd', '', '', '', 'EZsupply', '', 'No. 8, Lane 1', ' Pingdishan New Village', 'Dongcheng Street', 'Dongguan', 'Guangdong', 'China', ''),
(2, 'CÔNG TY TNHH QUEEN PACK', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Lão Đại', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gb`
--

CREATE TABLE `gb` (
  `g_id` int(11) NOT NULL,
  `g_name` text NOT NULL,
  `s_date` text NOT NULL,
  `e_date` text NOT NULL,
  `g_stt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gb`
--

INSERT INTO `gb` (`g_id`, `g_name`, `s_date`, `e_date`, `g_stt`) VALUES
(1, 'Dot 1', '1674041810', '1682768210', 'Đến kho TP.HCM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gb_list`
--

CREATE TABLE `gb_list` (
  `g_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gb_list`
--

INSERT INTO `gb_list` (`g_id`, `p_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `h_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `action` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `history`
--



--
-- Cấu trúc bảng cho bảng `money`
--

CREATE TABLE `money` (
  `m_id` int(11) NOT NULL,
  `m_name` text NOT NULL,
  `sign` text NOT NULL,
  `ex` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `money`
--

INSERT INTO `money` (`m_id`, `m_name`, `sign`, `ex`) VALUES
(1, 'Việt Nam Đồng', 'VND', 1),
(2, 'Dollar', '$', 25000),
(3, 'Euro', '€', 20000),
(4, 'Nhân dân tệ', 'RMB', 3610);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `o_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `o_phone` text NOT NULL,
  `o_name` text NOT NULL,
  `o_city` text NOT NULL,
  `o_district` text NOT NULL,
  `o_ward` text NOT NULL,
  `o_street` text NOT NULL,
  `o_no` text NOT NULL,
  `note` text DEFAULT NULL,
  `o_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `process` int(11) NOT NULL,
  `payment` text NOT NULL,
  `deposit` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`o_id`, `u_id`, `o_phone`, `o_name`, `o_city`, `o_district`, `o_ward`, `o_street`, `o_no`, `note`, `o_date`, `process`, `payment`, `deposit`) VALUES
(58, 5, '964233808', 'Vũ Đức Phùng', 'Hà Nội', 'Cầu Giấy', 'Yên Hòa', 'Phạm Văn Bách', '1', 'PVI', '2023-02-02 05:45:43', 35000, '10%', 0),
(59, 6, '971259205', 'Phạm Hiệp', 'Hồ Chí Minh', '10', '14', 'Tô Hiến Thành', '334', 'C10.10 KingDom 101', '2023-02-01 15:28:27', 35000, '10%', 0),
(60, 7, '899498358', 'Nguyễn Minh', 'Hồ Chí Minh', 'Quận 9', 'Long Thạch Mỹ', 'Hoàng Hữu Nam', '62', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(61, 8, '826870876', 'Lê Name', 'Hậu Giang', 'TP.Ngã 7', 'Lái Hiếu', '30-Thg4', '346', 'khu vực 5', '2023-02-01 15:28:27', 35000, '10%', 0),
(62, 9, '971119486', 'Hoàng Vương', 'Hà Nội', 'Bắc Từ Liêm', 'Xuân Đỉnh', 'Xuân Đỉnh', 'ngách 207/103/54', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(63, 10, '982398912', 'Hà Hoàng', 'Hồ Chí Minh', '1', 'Cầu Kho', 'Trần Hưng Đạo', '391', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(64, 11, '392363717', 'Nguyen Doan Quang', 'Hồ Chí Minh', 'Tân Phú', 'Phú Thạnh', 'Thoại Ngọc Hầu', '197/36', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(65, 12, '583473012', 'Nguyễn Anh', 'Quận Bắc Từ Liêm', 'Hoài Đức', 'Kim Chung', 'Lai Xá', 'Số 9 ngõ 177', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(66, 13, '328275396', 'Nguyen Nhat', 'Đồng Nai', 'Biên Hòa', 'Thống Nhất', 'Phạm Văn Thuận', '282', 'FPTShop', '2023-02-01 15:28:27', 35000, '10%', 0),
(67, 14, '967836352', 'Van Pham Cuong', 'Hà Nội', 'Đống Đa', 'Kim Liên', 'Phương Mai', '10 Ngách 38/17', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(68, 15, '983155295', 'Hà Quyền', 'Hà Nội', 'Bắc Từ Liêm', 'Minh Khai', 'Cầu Diễn', '23 ngách 136/51 Cầu Diễn,Minh Khai', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(69, 26, '359178393', 'Hoàng Nguyễn Bùi Minh', 'Hồ Chí Minh', 'Bình Tân', 'Bình Hưng Hòa', '12', '80/91/10/8', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(70, 27, '971325969', 'anh nguyễn', 'Hà Nội', 'cầu giầy', 'Trung Hòa', 'Nguyễn Ngọc Vũ', '27 ngõ 125', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(72, 30, '988660490', 'quan nguyen', 'Hồ Chí Minh', '5', '3', 'Huỳnh Mẫn Đạt', '158/6', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(73, 31, '353641708', 'Lê thành Công thương', 'Hồ Chí Minh', 'Hóc Môn', 'Thới Tam Thôn', 'Trung Đông', '13/8a', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(74, 32, '384756509', 'hải đỗ', 'Hà Nội', 'Đống Đa', 'Tôn Đức Thắng', 'Tôn Đức Thắng', '60/74 ngõ thịnh hào 1', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(75, 34, '962647964', 'hải nguyễn', 'Sơn La', 'Mường La', 'xã Chiềng Lao', 'bản Nhạp', 'khu tập thể thủy điện Huội Quảng', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(76, 24, '352188885', 'Tran Quy Dat', 'Hà Nội', 'Đống Đa', 'Láng Thượng', 'Pháo Đài Láng', '12 ngõ 14', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(77, 35, '84982095396', 'Nguyen Dat', 'Hà Nội', 'Hoàng Mai', 'Thịnh Liệt', 'Giải Phóng', '6/23/1197', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(78, 5, '964233808', 'Vũ Đức Phùng', 'Hà Nội', 'Cầu Giấy', 'Dịch Vọng Hậu', 'Trần Thái Tông', '110 ngõ 44 (Phòng 801)', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(79, 37, '387244434', 'huỳnh quốc', 'Đà Nẵng', 'Hải Châu', 'Hòa Cường Nam', 'Huỳnh Tấn Phát', '179', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(80, 29, '969427259', 'Đào Duy Thái', 'Hà Nội', 'Hoàng Mai', 'Linh Đàm', 'Hoàng Liệt', '56', 'hh1a', '2023-02-01 15:28:12', 35000, '100%', 0),
(81, 42, '816386999', 'Trần Tiến Thịnh', 'Hà Nội', 'Thanh Xuân', 'Thanh Xuân Nam', 'Triều Khúc', '85/68', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(82, 38, '967098422', 'Quang Huy', 'Hà Nội', 'Hoàng Mai', 'Tương Mai', 'Trương Định', '33 ngách 75', 'ngõ 281', '2023-02-01 15:28:27', 35000, '10%', 0),
(83, 48, '938442011', 'Nguyễn Hoàng Hiệp', 'Bình Dương', 'Thuận An', 'Binh Hoà', 'Hữu Nghị', '8', 'VSIP', '2023-02-01 15:28:12', 35000, '100%', 0),
(84, 52, '935477998', 'Khanh Nguyen', 'Đà Nẵng', 'Hải Châu', 'Thuận Phước', 'Phan Kế Bính', '11', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(85, 54, '812364949', 'Phúc Nguyễn', 'Hồ Chí Minh', '10', 'Lê Hồng Phong', 'Lê Hồng Phong', 'none', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(86, 6, '941530177', 'Vũ Minh Quân', 'Nam Định', 'Cửa Bắc', 'Cửa Bắc', 'Thành Chung', '58/21', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(87, 57, '327577795', 'Nguyễn anh', 'Hồ Chí Minh', 'Quận Tân Bình', '4', 'Lê Bình', 'Sô 1A', '', '2023-02-01 15:03:14', 35000, '100%', 0),
(88, 59, '369121704', 'Nguyễn Tấn Huyền', 'tiền giang', 'gò công tây', 'đồng thạnh', 'Ấp thạnh hưng', 'none', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(89, 60, '888408488', 'Ngô Quốc Tuấn', 'Hải Phòng', 'Hải An', 'Thành Tô', 'Ngô Gia Tự', '836/800', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(90, 60, '888408488', 'Ngô Quốc Tuấn', 'Hải Phòng', 'Hải An', 'Thành Tô', 'Ngô Gia Tự', '836/800', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(91, 61, '326545748', 'Lam Le', 'Hồ Chí Minh', 'Thủ Đức', 'Hiệp Bình Chánh', '36', '27/3A', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(92, 4, '901356539', 'Minh Hong', 'Hồ Chí Minh', '3', 'Võ Thị Sáu', 'Phạm Ngọc Thạch', '40', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(93, 64, '964308820', 'Trương Thị Kiều Oanh', 'Bắc Ninh', 'Lương Tài', 'Thứa', 'Đạo sử,', 'none', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(94, 67, '938096838', 'Vo Dinh Long', 'Hồ Chí Minh', 'Tân Bình', '3', 'Bùi Thị Xuân', '224', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(95, 69, '986476407', 'Binh Vu', 'Hồ Chí Minh', '1', 'Phạm Ngũ Lão', 'Nguyễn Trãi', '210/7', 'Khắc dấu Thanh Toàn', '2023-02-01 15:28:12', 35000, '100%', 0),
(96, 71, '942035995', 'Bach Nguyen', 'Hồ Chí Minh', 'Bình Thạnh', '19', 'Nguyễn Ngọc Phương', '66', 'phòng 1312', '2023-02-01 15:28:12', 35000, '100%', 0),
(98, 5, '964233808', 'Vũ Đức Phùng', 'Hà Nội', 'Cầu Giấy', 'Yên Hòa', 'Phạm Văn Bách', '1', 'PVI', '2023-02-01 15:28:12', 35000, '100%', 0),
(99, 74, '966888092', 'Khánh Hoàng', 'Hà Nội', 'Thanh Xuân', 'Thanh Xuân Trung', 'Vũ Trọng Phụng', '69', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(102, 29, '969427259', 'Đào Duy Thái', 'Hà Nội', 'Hoàng Mai', 'Linh Đàm', 'Hoàng Liệt', '56', 'hh1a', '2023-02-01 15:28:12', 35000, '100%', 0),
(103, 5, '964233808', 'Vũ Đức Phùng', 'Hà Nội', 'Cầu Giấy', 'Dịch Vọng Hậu', 'Trần Thái Tông', 'Phòng 801 Số 110 ngõ 44', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(104, 75, '333669828', 'The Anh Do', 'Hồ Chí Minh', 'Bình Thạnh', '3', 'Nguyễn Duy', '15', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(105, 76, '908578788', 'Quang Vu', 'Hà Nội', 'Dong Da', 'Cát Linh', 'An Trạch', '12 ngõ 127', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(106, 15, '983155295', 'Hà Quyền', 'Hà Nội', 'Bắc Từ Liêm', 'Minh Khai', 'Cầu Diễn', '23 ngách 136/51', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(108, 15, '983155295', 'Hà Quyền', 'Hà Nội', 'Bắc Từ Liêm', 'Minh Khai', 'Cầu Diễn', '23 ngách 136/51', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(111, 15, '983155295', 'Hà Quyền', 'Hà Nội', 'Bắc Từ Liêm', 'Minh Khai', 'Cầu Diễn', '23 ngách 136/51', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(112, 77, '378400459', 'Nghĩa Trần Trọng', 'Thủ Đức', '9', 'Tăng Nhơn Phú A', 'Lê Văn Việt', '448', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(114, 79, '979083022', 'Lê Minh Nam', 'Hà Nội', 'Mê Linh', 'Mê Linh', 'Hạ Lôi', 'Xóm Hội', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(121, 80, '924304890', 'Dương Hoàng', 'Thừa Thiên Huế', 'Huyện Phong Điền', 'Xã Tân Thới', 'Ấp Tân Long', 'none', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(122, 81, '326736789', 'Duy Anh Nguyễn', 'Hà Nội', 'Hoàng Mai', 'Linh Đàm', 'Hoàng Liệt', '56', 'hh1a', '2023-02-01 15:03:14', 35000, '10%', 0),
(123, 83, '782080706', 'Duy Dan', 'Hải Phòng', 'Lê Chân', 'Vĩnh Niệm', '5', '67', 'Khu đô thị WaterFront,Vĩnh Niệm', '2023-02-01 15:28:27', 35000, '10%', 0),
(124, 84, '909511080', 'Bùi Gia Trang', 'Hà Nội', 'Đống Đa', 'Trung Liệt', 'Chùa Bộc', '106B1 Ngõ 203,', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(125, 84, '909511080', 'Bùi Gia Trang', 'Hà Nội', 'Đống Đa', 'Trung Liệt', 'Chùa Bộc', '106B1 Ngõ 203,', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(126, 85, '986425796', 'Minh Trần Quang', 'Hồ Chí Minh', '3', '8', 'Lý Chính Thắng', '52/17', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(127, 88, '844599330', 'Lê Nam', 'Kiên Giang', 'Giồng Riềng', 'Vĩnh Thạnh', 'ấp Vĩnh Thanh', '38', 'tổ 1', '2023-02-01 15:28:12', 35000, '100%', 0),
(128, 4, '901356539', 'Minh Hong', 'Hồ Chí Minh', '3', 'Võ Thị Sáu', 'Phạm Ngọc Thạch', '40', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(129, 4, '901356539', 'Minh Hong', 'Hồ Chí Minh', '3', 'Võ Thị Sáu', 'Phạm Ngọc Thạch', '40', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(130, 91, '367938798', 'Nghia Hoang', 'Hồ Chí Minh', '1', 'Cầu Kho', 'Trần Hưng Đạo', '457A', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(131, 91, '367938798', 'Nghia Hoang', 'Hồ Chí Minh', '1', 'Cầu Kho', 'Trần Hưng Đạo', '457A', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(132, 91, '367938798', 'Nghia Hoang', 'Hồ Chí Minh', '1', 'Cầu Kho', 'Trần Hưng Đạo', '457A', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(133, 30, '988660490', 'quan ly nguyen', 'Hồ Chí Minh', '5', '3', 'Huỳnh Mẫn Đạt', '158/6', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(134, 92, '969411965', 'Đỗ Minh', 'Tuyên Quang', 'None', 'Quang Trung', 'Tân Quang', '39', 'Tổ 7', '2023-02-01 15:28:27', 35000, '10%', 0),
(137, 93, '866868507', 'Pham Minh', 'Hà Nội', 'Quận Cầu Giấy', 'Yên Hòa', 'Cầu Giấy', '20A ngách 79/56,', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(138, 94, '837915822', 'Phát Huỳnh', 'Hồ Chí Minh', '8', '11', 'Phong phú', '7', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(139, 94, '837915822', 'Phát Huỳnh', 'Hồ Chí Minh', '8', '11', 'Phong phú', '7', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(141, 96, '931951815', 'Đỗ Anh', 'Đà Nẵng', 'Sơn Trà', 'An Hải Bắc', 'An Nhơn 9', '16', '', '2023-02-01 15:28:27', 35000, '10%', 0),
(142, 96, '931951815', 'Đỗ Anh', 'Đà Nẵng', 'Sơn Trà', 'An Hải Bắc', 'An Nhơn 9', '16', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(143, 97, '373460640', 'Bảo Nguyễn', 'Hồ Chí Minh', 'Quận 12', 'Hiệp Thành', 'Lê Văn Khương', '523/39/9a', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(144, 97, '373460640', 'Bảo Nguyễn', 'Hồ Chí Minh', 'Quận 12', 'Hiệp Thành', 'Lê Văn Khương', '523/39/9a', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(145, 98, '973135427', 'Tung Nguyen', 'Hà Nội', 'Nam Từ Liêm', 'Trung Văn', 'Đại Linh', 'Ngõ 97', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(146, 4, '901356539', 'Minh Hong', 'Hồ Chí Minh', '3', 'Võ Thị Sáu', 'Phạm Ngọc Thạch', '40', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(147, 99, '869295827', 'Thái Bảo Đặng', 'Hồ Chí Minh', 'Gò Vấp', '8', '21', '22/81', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(148, 99, '869295827', 'Thái Bảo Đặng', 'Hồ Chí Minh', 'Gò Vấp', '8', '21', '22/81', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(150, 1, '384242610', 'Chuc Kinkouuu', 'Nam Định', 'test', 'test', 'test', 'test', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(151, 117, '345728555', 'Phạm Văn Tiến', 'Đà Nẵng', 'Hải Châu', 'Hải Châu 1', 'Trần Phú', 'K30/29', '', '2023-02-01 15:03:14', 35000, '100%', 0),
(154, 91, '367938798', 'Nghia Hoang', 'Hồ Chí Minh', '1', 'Cầu Kho', 'Trần Hưng Đạo', '457A', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(155, 93, '866868507', 'Pham Minh', 'Hà Nội', 'Cầu Giấy', 'Yên Hòa', 'Cầu Giấy', '20A ngách 79/56', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(156, 105, '927523540', 'Vu Duy Anh', 'Hải Phòng', 'Vĩnh Bảo', 'Tân Hưng', '', 'Thôn Điềm Niêm', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(157, 29, '969427259', 'Đào Duy Thái', 'Hà Nội', 'Hoàng Mai', 'Linh Đàm', 'Hoàng Liệt', '56', 'hh1a', '2023-02-01 15:28:12', 35000, '100%', 0),
(158, 108, '962560719', 'Đỗ Quỳnh Ngân', 'Hà Nội', 'Bắc Từ Liêm', 'Liên Mạc', 'Liên Mạc', '18,ngõ 241/19/29', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(159, 98, '973135427', 'Tung Nguyen', 'Hà Nội', 'Nam Từ Liêm', 'Trung Văn', 'Đại Linh', 'Ngõ 97,', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(160, 95, '357501777', 'Đức Nguyễn', 'Hà Nội', 'Đống Đa', 'Ô Chợ Dừa', 'Hào Nam', '3A3 ngách 48 ngõ 168', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(161, 100, '971980281', 'Nguyễn Hà Long', 'Hà Nội', 'Thanh Xuân', 'Kim Giang', 'Kim Giang', '2', 'G5 chung cư Five Star Garden', '2023-02-01 15:28:12', 35000, '100%', 0),
(162, 99, '869295827', 'Thái Bảo Đặng', 'Hồ Chí Minh', 'Gò Vấp', '8', '21', '22/81', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(163, 30, '988660490', 'Biên', 'Hồ Chí Minh', '5', '3', 'Huỳnh Mẫn Đạt', '158/6', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(164, 120, '903513932', 'Pham phuong quynh', 'Hồ Chí Minh', '8', '6', 'Phạm Thế Hiển', '3034', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(165, 107, '968334220', 'Chu Hoàng Nam', 'Hồ Chí Minh', 'Tân Bình', '12', 'Trường Chinh', '191/18', '', '2023-02-01 15:03:14', 35000, '100%', 0),
(166, 122, '982623707', 'Tu Nguyen', 'Hồ Chí Minh', 'Phú Nhuận', '1', 'Đoàn Thị Điểm', 'Thg2-24', '', '2023-02-01 15:03:14', 35000, '100%', 0),
(167, 122, '982623707', 'Tu Nguyen', 'Hồ Chí Minh', 'Phú Nhuận', '1', 'Đoàn Thị Điểm', 'Thg2-24', '', '2023-02-01 15:03:14', 35000, '100%', 0),
(168, 122, '982623707', 'Tu Nguyen', 'Hồ Chí Minh', 'Phú Nhuận', '1', 'Đoàn Thị Điểm', 'Thg2-24', '', '2023-02-01 15:03:14', 35000, '100%', 0),
(169, 115, '392361107', 'Chu Hoàng Giang', 'Hà Nội', 'Hai Bà Trưng', 'Bạch Mai', 'Hồng Mai', '18', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(171, 99, '869295827', 'Thái Bảo Đặng', 'Hồ Chí Minh', 'Gò Vấp', '8', '21', '22/81', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(172, 123, '799792929', 'Vix Nguyen', 'Hồ Chí Minh', '1', 'Bến Nghé', 'Nam Kỳ Khởi Nghĩa', '92', 'Tower 2 Saigon Center', '2023-02-01 15:28:12', 35000, '100%', 0),
(173, 124, '868937891', 'Nam Đỗ', 'Hồ Chí Minh', 'Thu Duc', 'Tam Phú', 'Tam Châu', '7', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(174, 29, '969427259', 'Đào Duy Thái', 'Hà Nội', 'Hoàng Mai', 'Linh Đàm', 'Hoàng Liệt', '56', 'hh1a', '2023-02-01 15:28:12', 35000, '100%', 0),
(175, 126, '368452674', 'Thành Phan', 'Hồ Chí Minh', '8', '4', 'Hồ Thành Biên', '59', '', '2023-02-01 15:03:14', 35000, '10%', 0),
(176, 57, '327577795', 'Nguyễn anh', 'Hồ Chí Minh', 'Quận Tân Bình', '4', 'Lê Bình', '1A', '', '2023-02-01 15:28:12', 35000, '100%', 0),
(177, 110, '945290901', 'Nguyễn Tuệ Đức', 'Hà Đông', 'Yên Nghĩa', 'Yên Lộ', 'KĐT Đô Nghĩa,', 'U11L12', '', '2023-02-01 15:03:14', 35000, '100%', 0),
(179, 127, '974030987', 'Trương Nguyễn Nhựt Linh', 'Hồ Chí Minh', '6', '2', 'Tạ Quang Bửu', '1002', 'The Pegasuite 1', '2023-01-23 23:48:00', 35000, '100%', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `price`
--

CREATE TABLE `price` (
  `p_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `p_gb` decimal(10,2) NOT NULL,
  `p_stock` int(11) NOT NULL,
  `p_10` int(11) NOT NULL,
  `p_50` int(11) NOT NULL,
  `factor` decimal(10,2) NOT NULL DEFAULT 1.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `price`
--

INSERT INTO `price` (`p_id`, `m_id`, `p_gb`, `p_stock`, `p_10`, `p_50`, `factor`) VALUES
(2, 1, '3500.00', 0, 0, 0, '1.00'),
(3, 1, '17000.00', 20000, 2000, 1000, '1.00'),
(4, 1, '6200.00', 6200, 0, 0, '1.00'),
(5, 1, '5800.00', 0, 0, 0, '1.00'),
(6, 1, '2200.00', 0, 0, 0, '1.00'),
(7, 1, '2650.00', 0, 0, 0, '1.00'),
(8, 1, '2850.00', 0, 0, 0, '1.00'),
(9, 1, '60000.00', 0, 0, 0, '1.00'),
(10, 1, '8000.00', 0, 0, 0, '1.00'),
(11, 1, '12000.00', 13000, 52500, 35000, '1.00'),
(12, 1, '2880.00', 0, 0, 0, '1.00'),
(13, 1, '350000.00', 350000, 35000, 17500, '1.00'),
(14, 1, '0.00', 300000, 0, 0, '1.00'),
(15, 1, '0.00', 220000, 0, 0, '1.00'),
(16, 1, '0.00', 105000, 0, 0, '1.00'),
(17, 1, '0.00', 1000, 0, 0, '1.00'),
(18, 1, '420000.00', 420000, 0, 0, '1.00'),
(19, 4, '1.60', 0, 0, 0, '1.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `sm_id` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `p_img` text NOT NULL,
  `specs` text NOT NULL,
  `remain` int(11) NOT NULL,
  `video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`p_id`, `f_id`, `c_id`, `sm_id`, `p_name`, `p_img`, `specs`, `remain`, `video`) VALUES
(2, 1, 8, 1, 'Gateron Pro Milky Yellow', 'https://i.imgur.com/n7REMj5.jpg', '-Đây là biến thể housing màu sữa của dòng switch G-Pro của Gateron. - Khuôn thân mới để giảm sự lung lay của thân và mang lại trải nghiệm gõ phím mượt mà hơn.- Tương tự như G-Pro màu vàng thông thường, sự khác biệt duy nhất là vỏ trên cùng màu trắng sữa sẽ làm thay đổi âm thanh gõ.-  Khuôn housing mới.- Top housing màu sữa.-  Lò xo 50g.- Đã lube nhẹ từ nhà máy.-  Công tắc tuyến tính (linear), thiết kế 5 chân- Bấm mượt', 0, '1'),
(3, 1, 8, 1, 'Holy Panda', 'https://i.imgur.com/phfXdPU.jpg', '- Halo switch stems- Ivory white switch housing made from POM, a self-lubricating plastic material- 67g spring- Plate mount- Style: Tactile- Stem color: Salmon- Per-switch LED compatibility: SMD and through-hole- MX-compatible-  Phân phối bởi ezsupply.app', 0, '1'),
(4, 1, 8, 1, 'KTT Strawberry (Dâu)', 'https://i.imgur.com/2prcUHJ.jpg', '- Kiểu công tắc: Linear- Vỏ công tắc được làm từ chất liệu nhựa PC- Con trượt (stem) được làm từ nhựa POM- Lò xo đi kèm có lực nhấn 62g - là loại lò xo vàng- Công tắc có 5 Pin- Công tắc được lube sẵn- - Phân phối bởi ezsupply.app', 0, '1'),
(5, 1, 8, 1, 'KTT Strawberry 5 PIN', 'https://i.imgur.com/SC19ETP.jpg', '- Sản xuất bởi KTT- Kiểu công tắc: Linear- Vỏ công tắc được làm từ chất liệu nhựa PC- Con trượt (stem) được làm từ nhựa POM- Lò xo đi kèm có lực nhấn 62g - là loại lò xo vàng- Công tắc có 5 Pin- Công tắc được lube sẵn', 0, '1'),
(6, 2, 10, 1, 'Hộp bã mía 1 ngăn liền nắp', 'https://i.imgur.com/MBsbpyf.jpg', '- Sản phẩm được làm từ bã mía. Gồm 1 ngăn\n- Đảm bao vệ sinh ATTP\n- Thân thiện với môi trường', 0, '1'),
(7, 2, 10, 1, 'Tô bã mía 850ml', 'https://i.imgur.com/hS4o0yO.jpg', '- Sản phẩm 100% từ bã mía- Đảm bảo ATTP- Dung tích 80ml', 0, ''),
(8, 1, 8, 1, 'KTT KangWhite V3', 'https://i.imgur.com/OMHHd1C.png', '- 40g Lực tác chiến- 50g Lực lượng Dưới cùng- Tổng hành trình 4.0mm- Lò xo 15,5mm- Đặc điểm chuyển mạch tuyến tính- Hơn 50 triệu lần nhấn phím kéo dài- 3 pin- Vỏ Polycarbonate trong suốt hàng đầu- Vỏ Nylon dưới cùng- Thân Pom- Prelube- Hỗ trợ ổ cắm Outemu và bàn phím Kailh Socket- Được phân phối bởi : Ezsupply.app', 0, '1'),
(9, 3, 9, 1, 'Sa tế tôm khô sò điệp Lão Đại', 'https://i.imgur.com/fHmuZta.jpg', 'Trích dẫn anh Nguyễn Thành Vinh\nTrên tay sa tế tôm khô sò điệp Nhật Lão Đại. Các ace mê món sa tế này thì nên thử. Đảm bảo mê luôn.\nMón sa tế ngon không thể bỏ qua. Ngon quá phải tìm hiểu giới thiệu mọi người thử luôn.\nMón sa tế tôm khô sò điệp Nhật được làm từ tôm khô, sò điệp Nhật và 4 loại ớt khác nhau như hình.\nMón sa tế này mà dùng để làm đồ chấm ăn phở, làm lẩu chua cay thì thôi rồi. Ướp nướng từ thịt bò cho tới hải sản thì bao phê nha cả nhà. Nói chung thủ sẳn 1 lọ đi ăn mang theo thì y bài.\nGợi ý các ace mấy món hay chế biến cùng sa tế: Lẩu Thái và tất cả các thứ có nước lèo đều có thể dùng sa tế, bò nướng sa tế, lẩu bò, sườn heo nướng sa tế, chân gà nướng sa tế\nCác loại hải sản xào như ốc móng tay xào sa tế, mực xào sa tế, càng ghẹ xào sa tế...\nCác món hải sản nướng: mực nướng sa tế, tôm nướng sa tế, các loại cá nướng sa tế, ốc giác, tỏi...nướng sa tế\nGiá rẻ so với chất lượng chỉ 60 xu/ 1 hũ như hình.\nNgoài ra Lão Đại còn có món sốt XO đẳng cấp được làm từ các nguyên liệu như: tôm khô, cá khô, sò điệp khô, jambon xông khói, rượu trắng và tất nhiên tỏi ớt và rất nhiều thứ gia vị ngon tạo nên món sốt XO huyền thoại trứ danh.\nĐã mê ẩm thực Trung Hoa và Hong Kong thì không thể không nhắc đến món sốt XO này rồi.\nSa tế tôm sò điệp đã ok thì chắc chắn sốt XO cũng ngon đều tay.\nGiá chỉ 80 xu/ 1 hũ như hình.\nGiới thiệu cả nhà vài món ngon với sốt XO:\nCác loại thịt nướng sốt XO\nHải sản sốt XO\nCác loại mì sốt XO\nNói chung để các ace tự trải nghiệm vậy.\nMua hàng thì liên hệ số đt trên hình hoặc alo trực tiếp cho Mr Khôi: 0989112112. Ngon quá nên quảng cáo dùm anh Khôi luôn.\nCác ace nên đặt về quất nha. Không ngon lên đây đưa mặt cho chửi thoải mái luôn.\nMãi yêu.\n#sate #satế #satetomsodiep #satếtômsòđiệp #satetomkhosodiep #satếtômkhôsòđiệp #satay #shrimpsatay #scallopsatay #xosauce #sốtxo #xosauces #sotxo #sàigònngon #saigonngon #satelaodai #satếlãođại #sotxolaodai #sốtxolãođại #satetomkhosodieplaodai #satếtômkhôsòđiệplãođại #satetomsodieplaodai #satếtômsòđiệplãođại', 0, ''),
(10, 1, 8, 1, 'WS Brown', 'https://i.imgur.com/e4pZZdN.png', '- Tên sản phẩm : ws brown- Tactile switch- Top housing : nylon- Bot housing : nylon- Stem : POM- Lực nhấn : 55g- 5 pin', 0, '1'),
(11, 1, 8, 1, 'Pink Xmas Linear', 'https://i.imgur.com/khsEULy.jpg', '- Kiểu : Linear- Top Housing : PC- Bot Housing : PA- Lực nhấn : 45g-  Stem được 1 lớp trục tường giúp chống bụi cải thiện độ ổn định. Đặc biệt Không có tiếng lò xo và tiếng ồn từ trục.- Hành trình lò xo dài 20 mm. Switch đã được Prelube. Độ mịn và mượt mà của switch rất tốt.- Stem màu vàng, nắp trên trong suốt, vỏ dưới hồng trẻ trung, xinh tươi như những trái đào tiên chốn tiên cảnh làm liên tưởng tới những nàng tiên nữ.- Switch SugarBaby (Pink Xmas) là 1 lựa chọn hoàn hảo cho trải nghiệm game và gõ văn bản hàng ngày.', 0, '1'),
(12, 1, 8, 1, 'KTT KangWhite V3', 'https://i.imgur.com/c9p1o5y.jpg', '- 40g Lực tác chiến- 50g Lực lượng Dưới cùng- Tổng hành trình 4.0mm- Lò xo 15,5mm- Đặc điểm chuyển mạch tuyến tính- Hơn 50 triệu lần nhấn phím kéo dài- 3 pin- Vỏ Polycarbonate trong suốt hàng đầu- Vỏ Nylon dưới cùng- Thân Pom- Prelube- Hỗ trợ ổ cắm Outemu và bàn phím Kailh Socket- Được phân phối bởi : Ezsupply.app', 0, '1'),
(13, 1, 8, 1, 'Pack Glazed Jade', 'https://i.imgur.com/8CH5YOj.jpg', '- Switch Type: Linear\n- Housing Material: PC\n- Stem Material: POM\n- Pre travel: 1.8mm\n- Total travel: 3.5mm\n- Pressure: 53g\n- Spring: Double section ,stainless steel ,dry film oil spring\n- Factory Lubed: YES(Dupont)\n- Pins: 5pin/PCB_mount\n- Distributed: Ezsupply.app \n- 35 PCS/Pack', 0, '1'),
(14, 1, 8, 1, 'Combo lube full', 'https://i.imgur.com/T646OC1.jpg', '-Bộ combo lube full gồm:\n-+ Dầu dupont 12g\n-+ Cọ lube\n-+ Switch opener 3 in 1\n-+ Keypuller \n-+ Cọ housing 2 đầu', 0, '1'),
(15, 1, 8, 1, 'Combo lube', 'https://i.imgur.com/S4ELKFy.jpg', '-Bộ combo lube full gồm:\n-+ Dầu dupont 12g\n-+ Cọ lube\n-+ Keypuller \n-+ Cọ housing 2 đầu', 0, '0'),
(16, 1, 8, 1, 'Switch opener', 'https://i.imgur.com/1TxraOr.jpg', '-Switch opener 3 in 1\n- 4 màu(Tím, Đỏ, Trắng, Đen)\n-Dùng mở switch hoặc làm móc khóa', 0, '1'),
(17, 1, 8, 1, 'Lò xo 2 tầng 62g', 'https://i.imgur.com/0zGtrXq.jpg', '- Lò xo 2 tầng 62g\n- Phân phối bởi Ezsupply', 0, '1'),
(18, 1, 8, 1, 'Pack Pink Xmas Linear', 'https://i.imgur.com/YRWBGQA.jpg', '- Kiểu : Linear- Top Housing : PC- Bot Housing : PA- Lực nhấn : 45g-  Stem được 1 lớp trục tường giúp chống bụi cải thiện độ ổn định. Đặc biệt Không có tiếng lò xo và tiếng ồn từ trục.- Hành trình lò xo dài 20 mm. Switch đã được Prelube. Độ mịn và mượt mà của switch rất tốt.- Stem màu vàng, nắp trên trong suốt, vỏ dưới hồng trẻ trung, xinh tươi như những trái đào tiên chốn tiên cảnh làm liên tưởng tới những nàng tiên nữ.- Switch SugarBaby (Pink Xmas) là 1 lựa chọn hoàn hảo cho trải nghiệm game và gõ văn bản hàng ngày. \n- 35  PCS/Pack', 0, '1'),
(19, 1, 8, 3, 'Glazed Jade', 'https://i.imgur.com/R2WHEvE.jpg', '- Switch Type: Linear - Housing Material: PC - Stem Material: POM - Pre travel: 1.8mm - Total travel: 3.5mm - Pressure: 53g - Spring: Double section ,stainless steel ,dry film oil spring - Factory Lubed: YES(Dupont) - Pins: 5pin/PCB_mount - Distributed: Ezsupply.app', 0, 'https://www.youtube.com/watch?v=zhvKSgKg9rs&amp;t=13s');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sale`
--

CREATE TABLE `sale` (
  `s_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sale`
--

INSERT INTO `sale` (`s_id`, `code`, `discount`) VALUES
(1, 'EZfreeship', 40000),
(2, 'code70k', 70000),
(3, 'Panda87', 87000),
(4, 'codevp1900', 1905000),
(7, '12ad600', 600000),
(8, 'vpdealship', 395000),
(9, 'giam185k', 185000),
(10, 'qyn500deal', 670000),
(11, 'qyndeal635', 635000),
(12, 'giam670k', 670000),
(13, 'BGT500', 500000),
(14, 'code35k', 35000),
(15, 'bgt75', 75000),
(16, '0844599330', 140000),
(17, 'MH40k', 70000),
(18, 'Jade111', 111000),
(19, 'trade70sw', 600000),
(20, 'GAT1CN', 140000),
(21, 'GAT1LUCKYTEAM', 240000),
(22, 'GAT1TEAMMAX', 190000),
(25, 'Aliceuyen80', 80000),
(26, 'Tuship160', 160000),
(27, 'Tu75120123', 75000),
(28, 'Linhnhut150', 150000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sale_product`
--

CREATE TABLE `sale_product` (
  `s_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sale_user`
--

CREATE TABLE `sale_user` (
  `s_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sale_user`
--

INSERT INTO `sale_user` (`s_id`, `u_id`, `max`) VALUES
(0, 2, 1),
(0, 1, 1),
(0, 4, 1),
(0, 3, 1),
(0, 7, 1),
(0, 2, 1),
(0, 1, 1),
(0, 4, 1),
(0, 3, 1),
(0, 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipment`
--

CREATE TABLE `shipment` (
  `sm_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `sm_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shipment`
--

INSERT INTO `shipment` (`sm_id`, `f_id`, `sm_code`) VALUES
(1, 1, '22111501'),
(2, 2, '22111502'),
(3, 1, '22122601');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sm_list`
--

CREATE TABLE `sm_list` (
  `sm_id` int(11) DEFAULT NULL,
  `sm_price` decimal(10,2) DEFAULT NULL,
  `p_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL DEFAULT 1,
  `ex_price` int(11) DEFAULT NULL,
  `sm_amount` int(11) DEFAULT NULL,
  `sm_date` text DEFAULT NULL,
  `pay_date` text DEFAULT NULL,
  `ex_date` text DEFAULT NULL,
  `im_date` text DEFAULT NULL,
  `hn_date` text DEFAULT NULL,
  `gate_ship` int(11) DEFAULT NULL,
  `hn_ship` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sm_list`
--

INSERT INTO `sm_list` (`sm_id`, `sm_price`, `p_id`, `m_id`, `ex_price`, `sm_amount`, `sm_date`, `pay_date`, `ex_date`, `im_date`, `hn_date`, `gate_ship`, `hn_ship`) VALUES
(1, '3.50', 3, 4, 3610, 2000, '2022-11-19', '2022-11-19', '2022-11-19', '2022-11-21', '2022-11-25', 0, 50000),
(1, '1.50', 5, 4, 3610, 1300, '2022-11-18', '2022-11-18', '2022-11-18', '2022-11-21', '2022-11-25', 0, 50000),
(1, '0.63', 8, 4, 3610, 3000, '2022-11-20', '2022-11-20', '2022-11-20', '2022-11-23', '2022-11-27', 0, 50000),
(2, '2000.00', 6, 1, 1, 1000, '2022-11-19', '2022-11-19', '2022-11-19', '2022-11-22', '2022-11-26', 0, 0),
(2, '1900.00', 7, 1, 1, 1900, '2022-11-18', '2022-11-18', '2022-11-18', '2022-11-21', '2022-11-25', 0, 0),
(3, '1.60', 4, 4, 3590, 2000, '', '', '', '', '', 0, 0),
(3, '1.00', 11, 4, 3590, 860, '', '', '', '', '', 0, 0),
(3, '0.63', 12, 4, 3590, 2000, '', '', '', '', '', 0, 0),
(3, '56.00', 13, 4, 3590, 28, '', '', '', '', '', 0, 0),
(3, '40.00', 15, 4, 3590, 7, '', '', '', '', '', 0, 0),
(3, '0.17', 17, 4, 0, 100, '', '', '', '', '', 0, 0),
(3, '35.00', 18, 4, 3590, 4, '', '', '', '', '', 0, 0),
(3, '1.60', 19, 4, 3590, 44, '', '', '', '', '', 0, 0),
(3, '1.60', 10, 4, 3590, 2000, '', '', '', '', '', 0, 0),
(1, '1.50', 4, 1, 3590, 200, '2022-12-28', '2022-12-28', '2022-12-29', '2022-12-31', '2023-01-06', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statist`
--

CREATE TABLE `statist` (
  `id` int(11) NOT NULL,
  `o_date` date NOT NULL,
  `sl_o` int(11) NOT NULL,
  `stt` bigint(100) NOT NULL,
  `sl_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `statist`
--

INSERT INTO `statist` (`id`, `o_date`, `sl_o`, `stt`, `sl_p`) VALUES
(7, '2022-11-15', 6, 10349600, 2833),
(8, '2022-11-29', 4, 9868000, 2191),
(9, '2022-12-01', 8, 8095800, 463),
(10, '2022-12-02', 3, 2663000, 181),
(11, '2022-12-03', 5, 5012000, 206),
(12, '2022-12-07', 12, 10268000, 615),
(13, '2022-12-14', 7, 21525000, 3130),
(14, '2022-12-15', 1, 3370000, 2310),
(15, '2022-12-16', 3, 1995000, 165),
(16, '2022-12-24', 3, 494000, 27),
(17, '2022-12-28', 9, 3783000, 307),
(18, '2022-12-29', 2, 430000, 35),
(19, '2022-12-30', 2, 216000, 9),
(20, '2023-01-09', 6, 1160000, 75),
(21, '2023-01-10', 7, 1760000, 196),
(22, '2023-01-12', 1, 390000, 1),
(23, '2023-01-14', 2, 1790000, 5),
(24, '2023-01-27', 1, 100000, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `phone` text NOT NULL,
  `pass` text NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `city` text NOT NULL,
  `district` text NOT NULL,
  `ward` text NOT NULL,
  `street` text NOT NULL,
  `no` text NOT NULL,
  `email` text NOT NULL,
  `cmt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`u_id`, `phone`, `pass`, `f_name`, `l_name`, `city`, `district`, `ward`, `street`, `no`, `email`, `cmt`) VALUES
(1, '0384242610', '202cb962ac59075b964b07152d234b70', 'Chuc', 'Kinkouuu', 'NAM DINH', 'DD', 'KT', 'TT', '144/354', 'chuckinkou2k1@gmail.com', 'admin'),
(2, '0939272096', '125d0d502244655321fd3c3daf0dc440', 'Anh', 'Lê', 'Ho Chi Minh City', '1', 'Cầu Kho', 'Nguyễn Cảnh Chân', 'Tk39/40', '', ''),
(3, '0963698492', '592298ef4fba842d6e04491461f2cb53', 'Quang', 'Tran', 'Ho Chi Minh City', 'District 1', 'Cầu Kho', 'Nguyễn Cảnh Chân', 'TK39/40', '', ''),
(4, '0901356539', 'b53a9c8bbb8dd4ff90eac7608b2f187e', 'Minh', 'Hong', 'Ho Chi Minh', '3', 'Vo Thi Sau', 'Pham Ngoc Thach', '40', '', ''),
(5, '0964233808', '2f802d2aa4bbfa7021450fe0822839c9', 'Vũ', 'Đức Phùng', 'Hà Nội', 'Cầu Giấy', 'Dịch Vọng Hậu', 'Số 110 ngõ 44 Trần Thái Tông', 'Phòng 801 (gửi bảo vệ)', 'ducvubka@gmail.com', ''),
(6, '0971259205', 'd3fbc929654d55036bc06cc86940846f', 'Phạm', 'Hiệp', 'Hồ Chí Minh', 'Quận', 'Tô Hiến Thành', 'KingDom 101 334', 'C10.10', '', ''),
(7, '0899498358', '07418c8318ef2cf210cf0ccbfd389bff', 'Nguyễn', 'Minh', 'TP.HCM', 'Quận 9', 'Long Thạch Mỹ', 'Hoàng Hữu Nam', '62', '', ''),
(8, '0826870876', 'a8e070c676e76cd30bdd0a3dca1d4575', 'Lê', 'Name', 'TP.Ngã 7', 'Lái Hiếu', 'khu vực 5', '30/4', '346', '', ''),
(9, '0971119486', '9a4acc0afa7365df1aab8a54b0ac2ead', 'Hoàng', 'Vương', 'Hà Nội', 'Bắc Từ Liêm', 'Xuân Đỉnh', 'Xuân Đỉnh', 'hẻm 54 ngách 207/103', '', ''),
(10, '0982398912', 'ecab9fc77112951a657d95bca35bee57', 'Hà', 'Hoàng', 'TP.HCM', 'Quan 1', 'Cau Kho', 'Tran Hung Dao', '391', '', ''),
(11, '0392363717', '78db7d7749dc8f57d46d42a59adf9bbd', 'Nguyen', 'Doan Quang', 'Ho Chi Minh', 'Tân Phú', 'Phú Thạnh', 'Thoại Ngọc Hầu', '197/36', '', ''),
(12, '0583473012', 'fb09e8c8a12c7c78da154ad6e3829c5e', 'Nguyễn', 'Anh', 'Quận Bắc Từ Liêm', 'Hoài Đức', 'Kim Chung', 'Lai Xá', 'Số 9 ngõ 177', '', ''),
(13, '0328275396', '668b47cfd5d6f694a767874745a9f660', 'Nguyen', 'Nhat', 'Dong Nai', 'Bien Hoa', 'Thong Nhat', 'Pham Van Thuan', 'FPTShop 282', '', ''),
(14, '0967836352', 'c5eeff821773f7207e772b379f5ef3b7', 'Van', 'Pham Cuong', 'Hà Nội', 'Đống Đa', 'Kim Liên', 'Phương Mai', 'Số 10 Ngách 38/17', '', ''),
(15, '0983155295', '8a180dd890cf32a1a28f558155f82956', 'Hà', 'Quyền', 'Hà Nội', 'Bắc Từ Liêm', 'Minh Khai', 'Cầu Diễn', 'số nhà 23 ngách 136/51', '', ''),
(16, '0888007077', 'f467e333088878471e949f9213d18283', 'Đồng', 'Trung Tín', 'Vĩnh Long', 'Bình Minh', 'Cái Vồn', 'Phan Văn Năm', '12345', '', ''),
(17, '0973453712', 'b0c902013e449e32ec92d0b4ec37859d', 'Thi', 'Nguyen', 'Nghe An', 'Quynh Luu', 'Quynh Minh', 'Thon 3', 'Cty TNHH Viet Uc Nghe An', '', ''),
(18, '0708297578', 'e7810fb45ff637625e0c0a7598505872', 'Trần', 'Trung', 'TP. Hồ Chí Minh', '9', 'tp thủ đức', '3/25/15b đường', '182', '', ''),
(19, '0967265150', '96230139e72dfc21cca43b95e006b445', 'Phuc', 'Vo', 'Hồ Chí Minh', 'Gò Vấp', 'Phường 5', 'Đường 20', '193/10/2', '', ''),
(20, '0779792386', '2563962eaf46b7cbe33a6a930f1da1c0', 'Long', 'Phạm', 'Ho Chi Minh', '10', '13', 'Cach Mang Thang Tam', '463B/40', '', ''),
(21, '0886288362', 'e1c2b58517330c49c2818dbfc044562f', 'Đỗ', 'Thông', 'Hà Nội', 'Thanh Xuân', 'Thanh Xuân Nam', 'Nguyễn Trãi', 'H10, ngõ 475', '', ''),
(22, '0377696040', '2d595d337bc76bb4e98ac6cbc7a1f61f', 'Lâm', 'Trần', 'Tỉnh Bà rịa - vũng tàu', 'Thị xã phú mỹ', 'Tân hoà', 'Phước long', '53A', '', ''),
(23, '0799224675', '66dbd90cc25bd554d58ee8ead6a17c43', 'Trần', 'Anh Tú', 'TP. Hồ Chí Minh', '1', 'Bến Nghé', 'Tôn Thất Đạm', '76/4', '', ''),
(24, '0352188885', '9ee695fec50ddfb6ddbdc3038fbbc776', 'Tran Quy', 'Dat', 'Ha Noi', 'Dong Da', 'Lang Thuong', 'ngo 14 phao dai lang', 'so 12', '', ''),
(25, '0942728185', 'ad02e96f92bfd6ba030a18f757595ae1', 'Viet', 'Hoang', 'Nam dinh', 'Nam dinh', 'Nam Định', 'Máy Tơ', '24', '', ''),
(26, '0359178393', 'bfa2e74f21343fcf4c3e02bd29cf35fe', 'Hoàng', 'Nguyễn Bùi Minh', 'Hồ Chí Minh', 'Bình Tân', 'Bình Hưng Hòa', '12', '80/91/10/8', '', ''),
(27, '0971325969', '5f8bae89fb9f9fe1e8ea06e12981829e', 'anh', 'nguyễn', 'hà nội', 'cầu giầy', 'số 27 ngõ 125', 'nguyễn ngọc vũ', 'trung hoà', '', ''),
(28, 'hai', '202cb962ac59075b964b07152d234b70', 'Phạm', 'Hải', 'Hà Nội', '123', '123', '123', '123', '', ''),
(29, '0969427259', 'f52e82f9bd4781537be1b3ffc81b9f02', 'Đào Duy', 'Thái', 'Hà Nội', 'None', 'None', 'Hoàng mai', 'Hh1A', '', ''),
(30, '0988660490', '415981b72483f8cf1a02f678c74f145e', 'quan', 'ly nguyen', 'HCMC', '5', '3', 'Huynh Man Dat', '158/6', '', ''),
(31, '0353641708', 'c60388dec22f7647455db924e691552b', 'Lê thành', 'Công thương', 'Tphcm', '13/8a trung đông', 'Thới tam thon', 'Hóc môn', 'Thới tam thôn', '', ''),
(32, '0384756509', '3607d4978c2d69ad925a4218347b0c24', 'hải', 'đỗ', 'hà nội', 'đống đa', 'tôn đức thắng', 'tôn đức thắng', '60/74 ngõ thịnh hào 1', '', ''),
(33, '0345490407', '40d08d91d407f189b3410e50b66b65b0', 'Hoàng', 'Khánh', 'Đà Nẵng', 'no', 'no', 'no', 'no', '', ''),
(34, '0962647964', 'f875beaf77306e8a3570e785b55eaea4', 'hải', 'nguyễn', 'sơn la', 'mường la', 'xã chiềng lao', 'bản nhạp', 'khu tập thể thủy điện huội quảng', '', ''),
(35, '+84982095396', '2cef564959f8f68389c80804fc387a42', 'Nguyen', 'Dat', 'Hanoi', 'Hoang Mai', 'Thinh Liet', 'Giai Phong Road', '6/23/1197 Giai Phong Road', '', ''),
(36, '0966644598', 'a7333c5405f00142354c32f10b90a979', 'Da', 'Hoang', 'Hà nội', 'đống đa', 'láng hạ', '14 pháo đài láng', '10000', '', ''),
(37, '0387244434', 'b20c49a662ac39d32430c59ac18998ca', 'huỳnh', 'quốc', 'Đà Nẵng', 'Hải Châu', 'none', 'Huỳnh Tấn Phát', '179', '', ''),
(38, '0967098422', 'bbb955f6e65393b0397a629771d2509c', 'Quang', 'Huy', 'Hà Nội', 'Quận Hoàng Mai', 'Phường Tương Mai', 'ngách 75, ngõ 281, đường Trương Định', '33', 'quanghuy41202@gmail.com', ''),
(39, '0386584151', '75670462fcb95a913fb50afaa9876b74', 'Đạt', 'Nguyễn Tấn', 'Da Nang', 'Ngu Hanh Son', 'My An', 'Luu Quang Thuan', '7/12', '', ''),
(40, '0945712758', '95560fd583bc52f1fe2298b5941bbabc', 'Pham', 'Dung', 'Ha Noi', 'Thanh Tri', 'Yen Xa', 'Ngo 123', '20', '', ''),
(41, '0702873108', '63447977d884745e55c643edf48e23fc', 'Mai', 'Phuoc', 'Ho Chi Minh', '8', '3', 'Âu Dương Lân', '314/10', '', ''),
(42, '0816386999', '577dc23b4ab81acddb1d8cd549a2686b', 'Trần Tiến', 'Thịnh', 'Hà Nội', 'Thanh Xuân', 'Thanh Xuân Nam', 'Triều Khúc', '85/68', '', ''),
(43, '0384693524', '8b2f0ce9f3f0711815ca24bd134c4c91', 'Nguyễn Hoàng', 'Trung', 'Hà Nội', 'Cầu Giấy', 'Dịch Vọng', 'Đường Trần Thái Tông', 'Số 35, ngõ 45', '', ''),
(44, '0926268205', '50b87ce7776e4a0ebd7f09596b911ece', 'Minh', 'Ly', 'TPHCM', 'Bình Thạnh', '13', 'Đặng Thuỳ Trâm', '233/37', '', ''),
(45, '0776400875', '2bc6ff4f091039557b0e68542e93b8c9', 'Nguyen', 'Nghia', 'Ho Chi Minh City', 'quan 8', 'phuong 6', 'duong so 2', '17', '', ''),
(46, '0935003742', 'e804a83a8398b63378076d35ceed4664', 'anh', 'le', 'Tp. HCM', 'Tân Bình', '1', '301/12 Nguyễn Văn Trỗi', 'Tòa nhà s3', '', ''),
(47, '0967701230', '1a89a91770be00ba837641c59d83d6f5', 'Bách', 'Huy', 'Hà Nội', 'Hoài Đức', 'Cát Quế', 'Đội 9', '9', '', ''),
(48, '0938442011', '1d937c2eb6929db1b41c3c8366b7b8f7', 'Nguyễn', 'Hoàng Hiệp', 'Bình Dương', 'Thuận An', 'Bình Hòa', '8 Hữu Nghị, VSIP', 'Tòa nhà VSIP', '', ''),
(49, '0333195116', 'f61ea5d15668ce1de4ae4fa2d55649cc', 'Tu Anh', 'Nguyen', 'Ha Noi', 'Nam Từ Liêm', 'Phường Trung Văn', 'Phùng Khoang', 'số 6 nhà n3 ngõ 32 Phùng Khoang', '', ''),
(50, '0902217213', 'e10adc3949ba59abbe56e057f20f883e', 'Đỗ Anh', 'Tuấn', 'Hồ Chí Minh', 'Quận 1', 'Nguyễn Cư Trinh', 'Nguyễn Văn Cừ', 'Royal tower tháp B 235', '', ''),
(51, '0397184208', '0564c5b5ed760a63be17b117e1fc0137', 'Đức', 'Tân', 'Ho Chi Minh', 'Thủ Đức', 'Long Trường', '124/14/37 Võ Văn Hát', '124/14/37 Võ Văn Hát', '', ''),
(52, '0935477998', '8f8555f2a342f17f74b48a8c31ed9980', 'Khanh', 'Nguyen', 'Da Nang', 'Hai Chau', 'Thuan Phuoc', 'Phan Ke Binh', '11', '', 'Huỷ đơn , chuyển đơn qua Ngô Quốc Tuấn'),
(53, '0789307329', '421ef73e32bb464d1e2bfb01f6236b98', 'Phúc', 'Phạm', 'Hà Nội', 'Hà Đông', 'Văn Quán', '19/5 street', '146/26/33', '', ''),
(54, '0812364949', '9cfb9e4f57c320fbad6d31e51f64c236', 'Phúc', 'Nguyễn', 'Hcm', 'Q10', 'Hcm', 'lê hồng phong , Q10', 'Lê hồng phong', '', ''),
(55, '0868401861', 'fe13cb9f3a6d2689314574318edd3a38', 'Minh Tu', 'Luc', 'Hanoi', 'Bac Tu Liem', 'Tdp Hoang 8', 'Tran Cung', '117/63/5', '', ''),
(56, '0823085513', 'd97144d66e246ae0ec6e66ece01bd13a', 'Nguyễn', 'Trọng Nguyên', 'Hồ Chí Minh', '3', 'Võ Thị Sáu', 'Nguyễn Đình Chiểu', '218', '', ''),
(57, '0327577795', 'e00044e96410bfef78823c09511bcdfe', 'Nguyễn', 'anh', 'Hồ Chí Minh', 'Quận Tân Bình', 'Phường 4', 'Lê bình', 'Sô 1A', '', ''),
(58, '0908126858', '8f1759e205adeda70a2f81e697a7a178', 'Tuấn', 'Trần', 'Hồ chí minh', 'tân bình', '13', '4C Đồng Xoài', 'nhà', '', ''),
(59, '0369121704', '59c04c37b56cf7d33423cdecc22b13f8', 'Nguyễn Tấn', 'Huyền', 'tiền giang', 'gò công tây', 'đồng thạnh', 'thạnh hưng', 'Ấp thạnh hưng xã đồng thạnh huyện gò công tây tỉnh tiền giang', '', ''),
(60, '0888408488', 'cbf8166996832907079adfe62d8ca1e7', 'Ngô Quốc', 'Tuấn', 'Hải Phòng', 'Hải An', 'Thành Tô', 'Ngô Gia Tự', '836/800', '', ''),
(61, '0326545748', '9c82ae3579b75624fd307613e1637933', 'Lam', 'Le', 'Ho Chi Minh', 'Thu Duc', 'Hiep Binh Chanh', '36', '27', '', ''),
(62, '0961710878', '153de1a1ec763837f876503f43293389', 'Tran', 'Dat', 'Hcm', 'Quận 9', 'Tăng nhon phu a', 'Đường 102', '59/112/21', '', ''),
(63, '0855234878', '257ed28ae84d29d1aea0c48c7e440f7d', 'Tùng', 'Trần', 'Ho Chi Minh City', 'TP Thủ Đức', 'Phường Linh Trung', 'Tô Vĩnh Diện', 'KTX Khu B ĐHQG TPHCM', '', ''),
(64, '0964308820', '201958bf241f40fabcbd42589feb51e9', 'Trương Thị Kiều', 'Oanh', 'Bắc Ninh', 'Lương Tài', 'Thị TRấn Thứa', 'Đạo sử', 'none', '', ''),
(65, '0372064929', '085ffb1ab443ed86ab092d0bb7ef3cd7', 'Nguyễn', 'Minh', 'TP.HCM', 'Quận 9', 'Long Thạch Mỹ', '62 Hoàng Hữu Nam', '.', '', ''),
(66, '0949950598', '0ad75bbe69a5376b64638ac064219ac8', 'Cao', 'Sơn', 'Hà Nội', 'Đống đa', 'Láng Thượng', 'Láng hạ', '22 Láng Hạ', '', ''),
(67, '0938096838', '7f089e621c614801fe977e8950fc5587', 'Vo Dinh', 'Long', 'HCM', 'Tan Binh', 'Phuong 3', 'Bui Thi Xuan', '224', '', ''),
(68, '0905783653', '1bba898df82d92eb63992556bcd66157', 'tran', 'huy', 'đà nẵng', 'sơn trà', 'an hải đông', 'lê hữu trác', 'k94/32', '', ''),
(69, '0986476407', '844fe72b6dc8f530c9da71c7aedc5d0f', 'Binh', 'Vu', 'Ho Chi Minh', '1', 'Pham Ngu Lao', 'Nguyen Trai', '210/7 Khắc dấu Thanh Toàn', '', ''),
(70, '0906909683', '0e7a5392494dfa11722fcf3133beecc6', 'Bach', 'Nguyen', 'HCM', 'Binh Thanh', 'Ward 19', '66 Nguyen Ngoc Phuong', '1312', '', ''),
(71, '0942035995', '85d7857dd17c1380fc29f107e8b01963', 'Bach', 'Nguyen', 'HCM', 'Binh Thanh', 'Phuong 19', '66 Nguyen Ngoc Phuong', '1312', '', ''),
(72, '096146827', '60bd9b34c5b905e8974e391d76b8f3ed', 'hai', 'hai', 'Hà Nội', 'Đống Đa', 'Khương Thượng', 'Tam Khươn', '354/144', '', ''),
(73, '0961467827', '97bfeda24810ce3c82cb9807ce5c05fe', 'Hai', 'Hai', 'Hà Nội', 'Đống Đa', 'Khương Thượng', 'Tam Khương', '354/144', '', ''),
(74, '0966888092', '776b38d662645580d5b63784209d1a35', 'Khánh', 'Hoàng', 'Hà Nội', 'Thanh Xuân', 'Thanh Xuân Trung', 'Vũ Trọng Phụng', '69', '', ''),
(75, '0333669828', '54c52ee610ae4862fce6fa4583fca8a2', 'The Anh', 'Do', 'Ho Chi Minh', 'Binh Thanh', '3', 'Nguyen Duy', '15', '', ''),
(76, '0908578788', '1871c7261181f2e29c7a62573ef2f24a', 'Quang', 'Vu', 'Hanoi', 'Dong Da', 'Cat Linh', 'An Trach', '12 ngo 127', '', ''),
(77, '0378400459', '66ced34b6a45037e0f5cddb0c0ce71f4', 'Nghĩa', 'Trần Trọng', 'Hồ Chí Minh', 'Thủ Đức', 'Quận 9', 'Lê Văn Việt', '448', '', ''),
(78, '0365062237', '7df6cc5fb1c2fda58f960eae5e1a3fdc', 'Lanh', 'Nguyen', 'Đồng Nai', 'Vĩnh Cửu', 'Thạnh Phú', 'Tỉnh lộ 768', 'Cty Changshin Việt Nam', '', ''),
(79, '0979083022', 'e807f1fcf82d132f9bb018ca6738a19f', 'Lê', 'Minh Nam', 'Hà Nội', 'Mê Linh', 'Mê Linh', 'Hạ Lôi', 'Thôn 4', '', ''),
(80, '0924304890', 'd8554c9abff01160266a2b72d39e83b2', 'Dương', 'Hoàng', 'Cần Thơ', 'Phong Điền', 'Ấp Tân Long', 'Xã Tân Thới', 'Ấp Tân Long, Xã Tân Thới, Huyện Phong Điền, Thành Phố Cần Thơ.', '', ''),
(81, '0326736789', '4d525f01ecd8c847fad465b79278032b', 'Nguyễn', 'Duy Anh', 'Hà Nội', 'Hoàng Mai', 'Phương Hoàng Liệt', 'Linh Đàm', 'Toà HH1A Linh Đàm', '', ''),
(82, '0976004268', '86630ba6b42548aef94f992d314e28be', 'Tú', 'Nguyễn', 'Hà Nội', 'Thường Tín', 'Văn Bình', 'Độc Lập', 'Số 9 thôn Văn Hội', '', ''),
(83, '0782080706', 'fbc4e37875bea413939b6b75c438834b', 'Duy', 'Dan', 'Hải Phòng', 'Lê Chân', 'Vĩnh Niệm', 'Khu đô thị WaterFront', '67 đừng số 5', '', ''),
(84, '0909511080', '7b08265bfa91530e5ab375657672dee6', 'Bùi Gia', 'Trang', 'Hà Nội', 'Đống Đa', 'Trung Liệt', 'Chùa Bộc', '106B1 Ngõ 203', '', ''),
(85, '0986425796', '36e1a5072c78359066ed7715f5ff3da8', 'Minh', 'Trần Quang', 'Ho Chi Minh city', '3', '8', 'Lý Chính Thắng', '52/17', '', ''),
(86, '0335848308', '97842a3e57fa3e4a3e80345dab8ecadd', 'Thiện Nhân', 'Nguyễn Quốc', 'Hồ Chí Minh', 'Gò Vấp', 'P3', 'Nguyễn Văn Công', 'Chung cư Hà Đô', '', ''),
(87, '0938380039', 'a11a1c0e9e687877152b48e2f7bd3b3a', 'Tuan', 'Thai', 'HCM', 'Quận 7', 'Tân Hưng', '1041', '62', '', ''),
(88, '0844599330', 'dc3155b76567336f96243144273ae2c7', 'Lê', 'Nam', 'Kiên Giang', 'Giồng Riềng', 'Giồng Riềng', 'tổ 1', '38', '', ''),
(89, '0918489608', '9d5506f55ea1c0e95677e03164b13c6f', 'Hung', 'Luu', 'Ho Chi Minh', 'Tan Phu', 'Phu Tho Hoa', 'Phu Tho Hoa', '156/37', '', ''),
(90, '0382452456', '962b41dd6691107503071c8e2712a71a', 'Dung', 'Le', 'Ha Noi', 'Hoang Mai', 'Dai Kim', 'Nghiem Xuan Yem', 'CT12A', '', ''),
(91, '0367938798', '8115a75b098d41043bd850996ea5ef50', 'Nghia', 'Hoang', '457A', '1', 'Cầu Kho', 'Trần Hưng Đạo', '1', '', ''),
(92, '0969411965', 'fd6019495f1044528db66ce16a56efc7', 'Đỗ', 'Minh', 'Tuyên Quang', 'Tân Quang', 'Tuyên Quang', 'Quang Trung', '39 Quang Trung', '', ''),
(93, '0866868507', '947b73761d2619c43c16ab3d11f5e25a', 'Pham', 'Minh', 'Hà Nội', 'Quận Cầu Giấy', 'Phường Yên Hòa', 'đường Cầu Giấy', 'Nhà 20A ngách 79/56', '', ''),
(94, '0837915822', '30d16c447ab777f832e854e118874abd', 'Phát', 'Huỳnh', 'Hcm', '8', '11', 'Phong phú', '7', '', ''),
(95, '0357501777', 'b95b477a785ed65274ee4158ec716c84', 'Đức', 'Nguyễn', 'Hà Nội', 'Đống Đa', 'Ô Chợ Dừa', 'Hào Nam', 'Số 3A3 ngách 48 ngõ 168', '', ''),
(96, '0931951815', 'fd209dba1e674e4d09b011bc5d0f7b50', 'Đỗ', 'Anh', 'Đà Nẵng', 'Sơn Trà', 'An Hải Bắc', 'An Nhơn 9', '16', '', ''),
(97, '0373460640', '0544932db0d10e2813daecb143d5e0fd', 'Bảo', 'Nguyễn', 'Hồ Chí Minh', 'Quận 12', 'Phường hiệp thành', 'lê văn khương', '523/39/9a', '', ''),
(98, '0973135427', 'da7b501a72e5010f233d473dcdba1944', 'Tung', 'Nguyen', 'Ha Noi', 'Trung Văn', 'Đại Linh', 'Đại Linh', 'Ngõ 97', '', ''),
(99, '0869295827', 'ee98ed8e57db43d0dafecef16895564e', 'Thái Bảo', 'Đặng', 'HCM', 'Gò Vấp', 'p8', 'đường số 21', '22/81', '', ''),
(100, '0971980281', '77fa74a950db932cfa8be619dc6c9a07', 'Nguyễn', 'Hà Long', 'Hà Nội', 'Thanh Xuân', 'Kim Giang', 'Kim Giang', 'G5, P2506, chung cư Five Star Garden, số 2 Kim Giang, Thanh Xuân, Hà Nội', '', ''),
(101, '0973516147', 'b495eb873a94f1154b9fd8f600d4ede6', 'Nam', 'Nhat', 'Ho Chi Minh', '7', 'Tan Quy', '25a', '33/3/8', '', ''),
(102, '0981846421', '1be9a08a7421e3eb75ebe622756299cf', 'Tran', 'Viet Thang', 'Ho Chi Minh city - Thu Duc City', 'Thu Duc Disctrict', 'Ward Tam Phu', 'Cay Keo street', '43', '', ''),
(103, '0837848062', 'b8892d623d2a19944080b21c0b47587e', 'Lê', 'Hùng', 'Lâm Đồng', '6', 'Đà Lạt', 'Nguyễn An Ninh', '28 Nguyễn An Nnih', '', ''),
(104, '0364443579', 'aa025a92d2f2cc240148451e28fb82c7', 'Tuan', 'Lê', 'Hà Nội', 'Nhân Chính', 'Chính Kinh', 'Thanh Xuân', '17 ngõ 90', '', ''),
(105, '0927523540', 'c26666570a4eb123147c1eab7b2f483f', 'Vu', 'Duy Anh', 'Hai Phong', 'Vinh Bao', 'Vinh Bao', 'Diem Niem', 'chịu', '', ''),
(106, '0355645466', 'c1b5a4d05568048331605ed0d0a540d5', 'Tung', 'Duong', 'Hà Nội', 'Huyện Hoài Đức', 'Làng An Trai', 'Xã Vân Canh', '107 Đường An Trai', '', ''),
(107, '0968334220', '386a3d3fd7e1e1ca8f2ff96bde5a5b8d', 'Chu', 'Hoàng Nam', 'Hồ Chú Minh', 'Tân Bình', 'Phường 12', 'Trường Chinh', '191/18 Trường Chinh P12 Tân Bình TP HCM', '', ''),
(108, '0962560719', '65b3aaa2258dc7e6271b4178a232179f', 'Ngan', 'Do', 'Hà Nội', 'Bắc Từ Liêm', 'Liên Mạc', 'ngõ 241/19/29', 'số 18', '', ''),
(109, '0369829547', '53bd830913316cc448d0c1ede845d70c', 'Tuấn', 'Anh', 'Hồ Chí Minh', 'phường 15', 'Tân Bình', '102/49 Phan Uy Ích', '15', '', ''),
(110, '0945290901', '4c5103937ae71e3d3b1dfd582982f570', 'Nguyễn', 'Tuệ Đức', 'Hà Nội', 'Hà Đông', 'Yên Nghĩa', 'Yên Lộ', 'U11L12, KĐT Đô Nghĩa', '', ''),
(111, '0963617988', '273f0ab9512e57d138e08aed58e55d8c', 'Vũ Thị Thanh', 'Tâm', 'Hải Phòng', 'Lê Chân', 'Vĩnh Niệm', 'Phạm Tử Nghi', '19/204/04/51', 'vuthanhtam.shmily@gmail.com', ''),
(112, '0915068234', '0d4d6e89820cdc8f4caa06447c87b895', 'Phan', 'Sinh', 'Hải Phòng', 'Lê Chân', 'Dư Hàng Kênh', 'Miếu Hai Xã', '4/35/409', '', ''),
(113, '0933123242', '20d5e27f288d3d7418faa3e9f90ac0e2', 'Hoang', 'Nguyen', 'hồ chi minh', '8', '11', 'Bến bình đông', '29', '', ''),
(114, '0394464082', 'e111f467eaa26037decb9e2118566657', 'Vu', 'Trung Nguyen', 'Ha Noi', 'Thanh Xuan Bac', 'Thanh Xuan', 'Luong The Vinh', '182 Luong The Vinh', '', ''),
(115, '0392361107', 'c6f4425576abb8fa3e65228011aa31f6', 'Chu', 'Hoàng Giang', 'Hà Nội', 'Bạch Mai', 'Hai Bà Trưng', 'Hồng Mai', '18', '', ''),
(116, '0916100255', 'fa8c4f920ee7f25febadc19a8fcd19ff', 'Việt', 'Hoàng', 'Hà Nội', 'Bắc Từ Liê,', 'Phúc Diễn', 'Cầu Diễn', '33 Cầu Diễn', '', ''),
(117, '0345728555', 'dde11033dc808dbcdda791baec08e657', 'Phạm Văn', 'Tiến', 'Đà Nẵng', 'Hải Châu', 'Hải Châu 1', 'Trần Phú', 'K30/29', '', ''),
(118, '0932104589', '45d5fd4be2f9e7590c61104b94b7463f', 'Alice', 'Uyên', 'HCM', 'Quận 7', 'Tân Quy', 'Đường 15', '87/3', '', ''),
(119, '0367897227', 'c7ea5842bdb9690b0727acefa2028323', 'hung', 'luu', 'Hà Nội', 'Nam Từ Liêm', 'Mỹ Đình 1', 'Phạm Hùng', 'Tòa Nhà Sông Đà(HH4)', '', ''),
(120, '0903513932', 'a1b976ea5b4923bd72b596abeff41ea5', 'Pham phuong', 'quynh', 'Thành phố Hồ Chí Minh', '8', 'Phường 6', '3034 Phạm Thế Hiển', 'ko', '', ''),
(121, '0922645508', '25f9e794323b453885f5181f1b624d0b', 'Tu', 'Nguyen', 'HCM', 'Phu Nhuan', 'P1', '2/24 Doan Thi Diem', 'Go', '', ''),
(122, '0982623707', '25f9e794323b453885f5181f1b624d0b', 'Tu', 'Nguyen', 'HCM', 'Phu Nhuan', 'P1', '2/24 Doan Thi Diem', '2/24', '', ''),
(123, '0799792929', '87cd466c040e44853c189bdb2114f549', 'Vix', 'Nguyen', 'Ho Chi Minh', '1', 'Bến Nghé', 'Nam Kỳ Khởi Nghĩa', 'Saigon Center, Tower 2, số 92-94', '', ''),
(124, '0868937891', '4bcb06e6f83319d54f62c12570f37b54', 'Nam', 'Đỗ', 'HCM', 'Thu Duc', 'Tam Phu', 'Tam Chau', '7', '', ''),
(125, '0977009727', '6b5aea05316a2b46b55ea308d97b05e3', 'Nguyễn', 'Nam', 'Vĩnh Yên, Vĩnh Phúc', 'Khai Quang', 'Khu đô thị Nam Đầm Vạc,Khu B', 'đường B1', 'nhà mái vòm màu xanh bên cạnh nhà trắng ko có số nhà', '', ''),
(126, '0368452674', '22588e547e5377682f3f2ed0dbe76e6e', 'Thành', 'Phan', 'Lâm Đồng', 'Đức Trọng', 'Liên Nghĩa', 'Nguyễn Du', '23', '', ''),
(127, '0974030987', '35129ae8706808600824de05df958297', 'Trương Nguyễn Nhựt', 'Linh', 'Hồ Chí Minh', '8', '6', '1002 Tạ Quang Bửu', 'The Pegasuite 1, Zone 2', '', ''),
(128, '0927151941', 'f179578e188b661a30235c94f311776d', 'Thang', 'Nguyen', 'Hà Nội', 'Bắc Từ Liêm', 'Cổ Nhuế 2', 'Ngõ Thanh Bình', 'Cầu số 2', 'tee.hip2001@gmail.com', ''),
(129, '0968454450', '88c30ac031880ca6fe334367da7625ae', 'Nguyễn', 'Phương', 'Ho Chi Minh', 'District 6', 'Ward 11', 'No. 2', '28', '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Chỉ mục cho bảng `cate`
--
ALTER TABLE `cate`
  ADD PRIMARY KEY (`c_id`);

--
-- Chỉ mục cho bảng `factory`
--
ALTER TABLE `factory`
  ADD PRIMARY KEY (`f_id`);

--
-- Chỉ mục cho bảng `gb`
--
ALTER TABLE `gb`
  ADD PRIMARY KEY (`g_id`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`h_id`);

--
-- Chỉ mục cho bảng `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`m_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Chỉ mục cho bảng `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`s_id`);

--
-- Chỉ mục cho bảng `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`sm_id`);

--
-- Chỉ mục cho bảng `statist`
--
ALTER TABLE `statist`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cate`
--
ALTER TABLE `cate`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `factory`
--
ALTER TABLE `factory`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `gb`
--
ALTER TABLE `gb`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `money`
--
ALTER TABLE `money`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `sale`
--
ALTER TABLE `sale`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `shipment`
--
ALTER TABLE `shipment`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `statist`
--
ALTER TABLE `statist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
