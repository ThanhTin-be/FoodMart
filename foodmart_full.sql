-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2025 lúc 04:41 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `foodmart_full_v1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `excerpt` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `excerpt`, `category`, `content`, `thumbnail`, `created_at`, `updated_at`) VALUES
(3, 'Top 10 casual look ideas to dress up your kids', 'Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet eleifend viverra enim tincidunt donec quam...', 'tips & tricks', 'Full content of this article...', 'post-thumb-1.jpg', '2021-08-22 03:00:00', '2025-09-18 10:01:03'),
(4, 'Latest trends of wearing street wears supremely', 'Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet eleifend viverra enim tincidunt donec quam...', 'trending', 'Full content of this article...', 'post-thumb-2.jpg', '2021-08-25 03:00:00', '2025-09-18 10:01:03'),
(5, '10 Different Types of comfortable clothes ideas for women', 'Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet eleifend viverra enim tincidunt donec quam...', 'inspiration', 'Full content of this article...', 'post-thumb-3.jpg', '2021-08-28 03:00:00', '2025-09-18 10:01:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--
CREATE TABLE carts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (product_id) REFERENCES products(id),
  UNIQUE KEY unique_cart (user_id, product_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Giỏ hàng của người dùng';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `thumbnail`, `banner`, `slug`, `parent_id`, `description`) VALUES
(1, 'Bánh Trung Thu', NULL, 'banners/banhtrungthu.webp', 'banh-trung-thu', NULL, ''),
(2, 'Bánh bao - Bánh mì - Pizza', NULL, NULL, 'banh-bao-banh-mi-pizza', NULL, NULL),
(3, 'Dầu ăn - Nước chấm - Gia vị', NULL, 'banners/7.DauAn.jpg', 'dau-an-nuoc-cham-gia-vi', NULL, NULL),
(4, 'Trái cây', NULL, 'banners/traicaythegioi.webp', 'trai-cay', NULL, NULL),
(5, 'Rau củ quả', NULL, 'banners/2.RCQ.jpg', 'rau-cu-qua', NULL, NULL),
(6, 'Thịt - Cá - Trứng - Thủy hải sản', NULL, 'banners/3.Thit.jpg', 'thit-ca-trung-thuy-hai-san', NULL, NULL),
(7, 'Kem - Sữa chua', NULL, 'banners/631332-Kem_sua_chua.jpg', 'kem-sua-chua', NULL, NULL),
(8, 'Sữa các loại', NULL, 'banners/sua-cac-loai.webp', 'sua-cac-loai', NULL, NULL),
(9, 'Bánh kẹo - Ngũ cốc - Ăn sáng', NULL, 'banners/banh-keo-ngu-coc-an-sang.jpg', 'banh-keo-ngu-coc-an-sang', NULL, NULL),
(10, 'Bia - Rượu - Trà - Cà phê - Nước giải khát', NULL, 'banners/bia-ruou-tra-ca-phe-nuoc-giai-khat.jpg', 'bia-ruou-tra-ca-phe-nuoc-giai-khat', NULL, NULL),
(11, 'Thực phẩm chăm sóc sức khỏe', NULL, 'banners/15.CSSK.jpg', 'thuc-pham-cham-soc-suc-khoe', NULL, NULL),
(12, 'Vệ sinh nhà cửa', NULL, 'banners/14.VSNC.jpg', 've-sinh-nha-cua', NULL, NULL),
(13, 'Đồ dùng gia đình', NULL, 'banners/11.DGDD.jpg', 'do-dung-gia-dinh', NULL, NULL),
(14, 'Bữa ăn sẵn tiện lợi', NULL, 'banners/13.BuaAnSan.jpg', 'bua-an-san-tien-loi', NULL, NULL),
(15, 'Đồ hộp - Xúc xích - Lạp xưởng', NULL, 'banners/16.DoHop.jpg', 'do-hop-xuc-xich-lap-xuong', NULL, NULL),
(16, 'Gạo - Đậu - Bột - Đồ khô - Đồ hộp', NULL, 'banners/8.Gao.jpg', 'gao-dau-bot-do-kho-do-hop', NULL, NULL),
(17, 'Thực phẩm đông - mát', NULL, 'banners/5.TPDM.jpg', 'thuc-pham-dong-mat', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('cho_xac_nhan','da_xac_nhan','dang_giao','da_giao','thanh_cong','huy') DEFAULT 'cho_xac_nhan',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(6, 7, 150000.00, 'cho_xac_nhan', '2025-09-24 20:00:00', '2025-09-30 08:32:05'),
(7, 8, 250000.00, 'da_xac_nhan', '2025-09-24 21:00:00', '2025-09-24 21:30:00'),
(8, 9, 300000.00, 'dang_giao', '2025-09-24 22:00:00', '2025-09-24 22:30:00'),
(9, 10, 200000.00, 'da_giao', '2025-09-24 23:00:00', '2025-09-24 23:45:00'),
(10, 7, 100000.00, 'huy', '2025-09-25 00:00:00', '2025-09-30 08:32:13'),
(11, 11, 10802000.00, 'thanh_cong', '2024-09-19 20:30:00', '2024-09-19 20:30:00'),
(12, 12, 11844000.00, 'thanh_cong', '2024-10-25 03:15:00', '2024-10-25 03:15:00'),
(13, 13, 15671000.00, 'thanh_cong', '2024-11-21 21:15:00', '2024-11-21 21:15:00'),
(14, 14, 15947000.00, 'thanh_cong', '2024-12-28 04:20:00', '2024-12-28 04:20:00'),
(15, 15, 20047000.00, 'thanh_cong', '2025-01-25 23:30:00', '2025-01-25 23:30:00'),
(16, 16, 20063000.00, 'thanh_cong', '2025-02-20 05:50:00', '2025-02-20 05:50:00'),
(17, 17, 7101000.00, 'thanh_cong', '2025-03-28 22:15:00', '2025-09-26 03:16:48'),
(18, 18, 7098000.00, 'thanh_cong', '2025-04-21 06:25:00', '2025-04-21 06:25:00'),
(19, 19, 8121000.00, 'thanh_cong', '2025-05-30 00:20:00', '2025-05-30 00:20:00'),
(20, 20, 8164000.00, 'thanh_cong', '2025-06-22 05:10:00', '2025-06-22 05:10:00'),
(21, 21, 12035000.00, 'thanh_cong', '2025-07-26 21:10:00', '2025-07-26 21:10:00'),
(22, 22, 12049000.00, 'thanh_cong', '2025-08-19 06:50:00', '2025-08-19 06:50:00'),
(23, 23, 10035000.00, 'thanh_cong', '2025-09-22 20:45:00', '2025-09-22 20:45:00'),
(24, 24, 10037000.00, 'thanh_cong', '2025-10-25 06:30:00', '2025-10-25 06:30:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(11, 11, 5843, 60, 100000.00),
(12, 11, 5888, 49, 98000.00),
(13, 12, 5844, 60, 128000.00),
(14, 12, 5889, 42, 98000.00),
(15, 13, 5991, 89, 75000.00),
(16, 13, 6081, 30, 299000.00),
(17, 14, 5992, 93, 79000.00),
(18, 14, 6082, 29, 299000.00),
(19, 15, 6165, 127, 79000.00),
(20, 15, 6175, 118, 85000.00),
(21, 16, 6166, 145, 69000.00),
(22, 16, 6176, 228, 44000.00),
(27, 17, 6269, 31, 91000.00),
(28, 17, 6271, 28, 155000.00),
(29, 18, 6270, 41, 78000.00),
(30, 18, 6272, 100, 39000.00),
(31, 19, 6382, 31, 129000.00),
(32, 19, 6384, 41, 100000.00),
(33, 20, 6383, 94, 26000.00),
(34, 20, 6385, 63, 90000.00),
(35, 21, 6467, 500, 11000.00),
(36, 21, 6469, 187, 35000.00),
(37, 22, 6468, 73, 102000.00),
(38, 22, 6470, 131, 35000.00),
(39, 23, 6590, 265, 19000.00),
(40, 23, 6592, 200, 25000.00),
(41, 24, 6591, 103, 54000.00),
(42, 24, 6593, 128, 35000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `unit` varchar(50) DEFAULT '1 Unit',
  `price` decimal(10,2) NOT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gallery` text DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `is_featured` tinyint(1) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `short_desc`, `unit`, `price`, `old_price`, `image`, `gallery`, `stock`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(5843, 1, 'Hộp Bánh Trung Thu Hoa Nguyệt 1 Maison 240g (1 Hộp)', 'hop-banh-trung-thu-hoa-nguyet-1-maison-240g-1-hop', 'abc', NULL, NULL, 100000.00, 150000.00, 'products/631555-8938528019131.webp', NULL, 100, 1, 1, '2025-09-24 01:59:45', '2025-10-05 14:17:17'),
(5844, 1, 'Hộp Bánh Trung Thu Hân Hoan Maison 320g (1 Hộp)', 'hop-banh-trung-thu-han-hoan-maison-320g-1-hop', 'null', NULL, NULL, 128000.00, NULL, 'products/631558-8938528019032.webp', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-10-05 14:06:58'),
(5845, 1, 'Hộp Bánh Trung Thu Dịu Dàng Maison 480g (1 Hộp)', 'hop-banh-trung-thu-diu-dang-maison-480g-1-hop', '', NULL, NULL, 71000.00, NULL, 'products/631561-8938528019049.webp', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-10-05 14:07:06'),
(5846, 1, 'Hộp Bánh Trung Thu Hứng Khởi Maison 640g (1 Hộp)', 'hop-banh-trung-thu-hung-khoi-maison-640g-1-hop', '', NULL, NULL, 61000.00, NULL, 'products/631564-8938528019025.webp', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-10-05 14:07:11'),
(5847, 1, 'Bánh Trung Thu Thập Cẩm Gà Quay Savoure 150g (1 Cái)', 'banh-trung-thu-thap-cam-ga-quay-savoure-150g-1-cai', NULL, NULL, NULL, 31000.00, NULL, 'products/8936076272657.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5848, 1, 'Bánh Trung Thu Matcha Đậu Đỏ Hạt Sen Savoure 185g (1 Cái)', 'banh-trung-thu-matcha-dau-do-hat-sen-savoure-185g-1-cai', NULL, NULL, NULL, 121000.00, NULL, 'products/8936076272367.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5849, 1, 'Bánh Trung Thu Lá Dứa Đậu Xanh Savoure 150g (1 Cái)', 'banh-trung-thu-la-dua-dau-xanh-savoure-150g-1-cai', NULL, NULL, NULL, 142000.00, NULL, 'products/8936076272688.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5850, 1, 'Hộp Bánh Trung Thu Rực Rỡ Savoure 2 cái x 185g (1 Hộp)', 'hop-banh-trung-thu-ruc-ro-savoure-2-cai-x-185g-1-hop', NULL, NULL, NULL, 106000.00, NULL, 'products/631553-8936076279083.webp', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5851, 1, 'Hộp Bánh Trung Thu Lễ Hộp Hảo Hạng Đại Phát 444g (1 Hộp)', 'hop-banh-trung-thu-le-hop-hao-hang-dai-phat-444g-1-hop', NULL, NULL, NULL, 35000.00, NULL, 'products/632599-8936001864117.webp', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5852, 1, 'Bánh Trung Thu Mè Đen Đậu Đỏ Savoure 185g (1 Cái)', 'banh-trung-thu-me-den-dau-do-savoure-185g-1-cai', NULL, NULL, NULL, 130000.00, NULL, 'products/8936076272411.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5853, 1, 'Combo 2 bánh trung thu lava (1 Combo)', 'combo-2-banh-trung-thu-lava-1-combo', NULL, NULL, NULL, 93000.00, NULL, 'products/OL1755223147696.png', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5854, 1, 'Combo 2 bánh trung thu mới lạ - vị mặn (1 Combo)', 'combo-2-banh-trung-thu-moi-la-vi-man-1-combo', NULL, NULL, NULL, 23000.00, NULL, 'products/OL1755223147697.png', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5855, 1, 'Bánh Trung Thu Thập Cẩm Lạp Xưởng Xá Xíu Savoure 150g (1 Cái)', 'banh-trung-thu-thap-cam-lap-xuong-xa-xiu-savoure-150g-1-cai', NULL, NULL, NULL, 85000.00, NULL, 'products/8936076272640.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5856, 1, 'Hộp Bánh Trung Thu Bến Thành Sài Gòn Savoure 8 cái x 100g(1 Hộp)', 'hop-banh-trung-thu-ben-thanh-sai-gon-savoure-8-cai-x-100g-1-hop', NULL, NULL, NULL, 22000.00, NULL, 'products/631535-8936076279038.webp', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5857, 1, 'Bánh Trung Thu Than Tre Trứng Muối Tan Chảy Savoure 185g (1 Cái)', 'banh-trung-thu-than-tre-trung-muoi-tan-chay-savoure-185g-1-cai', NULL, NULL, NULL, 64000.00, NULL, 'products/8936076272435.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5858, 1, 'Bánh Trung Thu Matcha Đậu Đỏ Savoure 150g (1 Cái)', 'banh-trung-thu-matcha-dau-do-savoure-150g-1-cai', NULL, NULL, NULL, 59000.00, NULL, 'products/8936076272671.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5859, 1, 'Bánh Trung Thu Cà Phê Lava Savoure 150g (1 Cái)', 'banh-trung-thu-ca-phe-lava-savoure-150g-1-cai', NULL, NULL, NULL, 110000.00, NULL, 'products/8936076272701.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5860, 1, 'Combo 2 bánh trung thu truyền thống - vị ngọt (1 Combo)', 'combo-2-banh-trung-thu-truyen-thong-vi-ngot-1-combo', NULL, NULL, NULL, 55000.00, NULL, 'products/OL1755223147695.png', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5861, 1, 'Bánh Trung Thu Dừa Hạt Dưa Savoure 150g (1 Cái)', 'banh-trung-thu-dua-hat-dua-savoure-150g-1-cai', NULL, NULL, NULL, 126000.00, NULL, 'products/8936076272664.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5862, 1, 'Bánh Trung Thu Sầu Riêng Hạt Sen Savoure 185g (1 Cái)', 'banh-trung-thu-sau-rieng-hat-sen-savoure-185g-1-cai', NULL, NULL, NULL, 98000.00, NULL, 'products/8936076272398.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5863, 1, 'Bánh Trung Thu Thập Cẩm Bò Xốt BBQ Savoure 185g (1 Cái)', 'banh-trung-thu-thap-cam-bo-xot-bbq-savoure-185g-1-cai', NULL, NULL, NULL, 78000.00, NULL, 'products/8936076272466.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5864, 1, 'Combo 2 bánh trung thu truyền thống - vị mặn (1 Combo)', 'combo-2-banh-trung-thu-truyen-thong-vi-man-1-combo', NULL, NULL, NULL, 35000.00, NULL, 'products/631727-OL1755223147698.webp', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:43:59'),
(5865, 1, 'Hộp Bánh Trung Thu Lễ Hộp Hoàng Gia Đại Phát 744g (1 Hộp)', 'hop-banh-trung-thu-le-hop-hoang-gia-dai-phat-744g-1-hop', NULL, NULL, NULL, 63000.00, NULL, 'products/632592-8936001864810.webp', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:56:27'),
(5866, 1, 'Hộp Bánh Trung Thu Signature Savoure Combo 4 cái x 185g (1 Hộp)', 'hop-banh-trung-thu-signature-savoure-combo-4-cai-x-185g-1-hop', NULL, NULL, NULL, 57000.00, NULL, 'products/631538-8936076279090.webp', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:56:27'),
(5867, 1, 'Combo 2 bánh trung thu mới lạ - vị ngọt (1 Combo)', 'combo-2-banh-trung-thu-moi-la-vi-ngot-1-combo', NULL, NULL, NULL, 75000.00, NULL, 'products/OL1755223147694.png', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:56:27'),
(5868, 1, 'Hộp Bánh Trung Thu Vạn Phúc 2 Savoure 4 cái x 185g (1 Hộp)', 'hop-banh-trung-thu-van-phuc-2-savoure-4-cai-x-185g-1-hop', NULL, NULL, NULL, 83000.00, NULL, 'products/631547-8936076279045.webp', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5869, 1, 'Bánh Trung Thu Thập Cẩm Sài Gòn Savoure 185g (1 Cái)', 'banh-trung-thu-thap-cam-sai-gon-savoure-185g-1-cai', NULL, NULL, NULL, 131000.00, NULL, 'products/8936076272329.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5870, 1, 'Bánh Trung Thu Khoai Môn Hạt Sen Savoure 185g (1 Cái)', 'banh-trung-thu-khoai-mon-hat-sen-savoure-185g-1-cai', NULL, NULL, NULL, 141000.00, NULL, 'products/8936076272381.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5871, 1, 'Bánh Trung Thu Khoai Môn Đậu Xanh Savoure 150g (1 Cái)', 'banh-trung-thu-khoai-mon-dau-xanh-savoure-150g-1-cai', NULL, NULL, NULL, 109000.00, NULL, 'products/8936076272695.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5872, 1, 'Hộp Bánh Trung Thu Lễ Hộp Hoàng Kim Đại Phát 440g (1 Hộp)', 'hop-banh-trung-thu-le-hop-hoang-kim-dai-phat-440g-1-hop', NULL, NULL, NULL, 32000.00, NULL, 'products/632605-8936001864278.webp', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5873, 1, 'Hộp Bánh Trung Thu Lễ Hộp Đặc Biệt Đại Phát 594g (1 Hộp)', 'hop-banh-trung-thu-le-hop-dac-biet-dai-phat-594g-1-hop', NULL, NULL, NULL, 111000.00, NULL, 'products/632617-8936001864278_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5874, 1, 'Hộp quà Envy New Zealand 1700g (1 Hộp)', 'hop-qua-envy-new-zealand-1700g-1-hop', NULL, NULL, NULL, 82000.00, NULL, 'products/657405-8936216940675.webp', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5875, 1, 'Hộp quà Envy New Zealand 1300g (1 Hộp)', 'hop-qua-envy-new-zealand-1300g-1-hop', NULL, NULL, NULL, 150000.00, NULL, 'products/657406-8936001864278_2.webp', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5876, 1, 'Hạt dẻ chestnut organic Dan D. Pak túi 100g', 'hat-de-chestnut-organic-dan-d-pak-tui-100g', NULL, NULL, NULL, 44500.00, NULL, 'products/17774-99814.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5877, 1, 'Bánh Pía Kim Sa Lá Dứa Thiên Lương 200G (1 Túi)', 'banh-pia-kim-sa-la-dua-thien-luong-200g-1-tui', NULL, NULL, NULL, 60000.00, NULL, 'products/8936032305450.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5878, 1, 'Bánh Pía Kim Sa Đậu Thiên Lương 200G (1 Túi)', 'banh-pia-kim-sa-dau-thien-luong-200g-1-tui', NULL, NULL, NULL, 60000.00, NULL, 'products/8936032320477.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5879, 1, 'Bánh Pía Khoai Môn Sầu Riêng Thiên Lương 300G (1 Túi)', 'banh-pia-khoai-mon-sau-rieng-thien-luong-300g-1-tui', NULL, NULL, NULL, 75000.00, NULL, 'products/8936032305504.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5880, 1, 'Bánh Pía Sầu Riêng Mini Mix 3 Vị Thiên Lương 480G (1 Túi)', 'banh-pia-sau-rieng-mini-mix-3-vi-thien-luong-480g-1-tui', NULL, NULL, NULL, 130000.00, NULL, 'products/8936032305115.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5881, 1, 'Mướp hương VietGAP cặp 400G (1 Cặp)', 'muop-huong-vietgap-cap-400g-1-cap', NULL, NULL, NULL, 135000.00, NULL, 'products/608597-Group_4.webp', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5882, 1, 'Sả cây 200g (1 Bó)', 'sa-cay-200g-1-bo', NULL, NULL, NULL, 80000.00, NULL, 'products/631461-11065.webp', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5883, 1, 'Dưa leo GlobalGap vỉ 500g (1 Vỉ)', 'dua-leo-globalgap-vi-500g-1-vi', NULL, NULL, NULL, 150000.00, NULL, 'products/608974-10862_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5884, 1, 'Bánh Hawaii khoai tây Yamazaki 228g (1 Cái)', 'banh-hawaii-khoai-tay-yamazaki-228g-1-cai', NULL, NULL, NULL, 39000.00, NULL, 'products/618602-SP001222-04.webp', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5885, 1, 'Thịt heo xay nhiều nạc Meat Master khay 400g (1 Khay)', 'thit-heo-xay-nhieu-nac-meat-master-khay-400g-1-khay', NULL, NULL, NULL, 53000.00, NULL, 'products/8936189334082.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5886, 1, 'Bún tươi sợi nhỏ Ba Khánh gói 500g', 'bun-tuoi-soi-nho-ba-khanh-goi-500g', NULL, NULL, NULL, 125000.00, NULL, 'products/3196-366355.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:45', '2025-09-25 10:22:13'),
(5888, 2, 'Bánh bao gà quay nấm hương CP gói 320g (1 Gói)', 'banh-bao-ga-quay-nam-huong-cp-goi-320g-1-goi', NULL, NULL, NULL, 46000.00, NULL, 'products/8935058991135.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:56:27'),
(5889, 2, 'Bánh hotteok nhân phô mai xúc xích Pulmuone gói 360g (1 Gói)', 'banh-hotteok-nhan-pho-mai-xuc-xich-pulmuone-goi-360g-1-goi', NULL, NULL, NULL, 98000.00, NULL, 'products/621408-8938536904283.webp', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:56:27'),
(5890, 2, 'Bánh hotteok nhân phô mai ngô Pulmuone 360g (1 gói)', 'banh-hotteok-nhan-pho-mai-ngo-pulmuone-360g-1-goi', NULL, NULL, NULL, 98000.00, NULL, 'products/621407-8938536904276.webp', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:56:27'),
(5891, 2, 'Bánh mì que xúc xích phô mai Tân Vĩnh Phát gói 210g (1 Gói)', 'banh-mi-que-xuc-xich-pho-mai-tan-vinh-phat-goi-210g-1-goi', NULL, NULL, NULL, 76000.00, NULL, 'products/8936144012956.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:56:27'),
(5892, 2, 'Bánh mì nguyên cám đông lạnh O\'smiles gói 210g (1 Gói)', 'banh-mi-nguyen-cam-dong-lanh-o-smiles-goi-210g-1-goi', NULL, NULL, NULL, 39000.00, NULL, 'products/8938532826121.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:56:27'),
(5893, 2, 'Bánh mì que pate truyền thống Sundo 189g (1 gói)', 'banh-mi-que-pate-truyen-thong-sundo-189g-1-goi', NULL, NULL, NULL, 49000.00, NULL, 'products/468302-380753.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:56:27'),
(5894, 2, 'Bánh giò nhân thịt Thọ Phát 150g (1 Gói)', 'banh-gio-nhan-thit-tho-phat-150g-1-goi', NULL, NULL, NULL, 23000.00, NULL, 'products/577453-8938502525726.webp', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:56:27'),
(5895, 2, 'Bánh rán kiểu Hàn Quốc Hotteok Mozzarella Bibigo gói 280g/300g (1 Gói)', 'banh-ran-kieu-han-quoc-hotteok-mozzarella-bibigo-goi-280g-300g-1-goi', NULL, NULL, NULL, 23000.00, NULL, 'products/8935297103726.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:56:27'),
(5896, 2, 'Bánh hotteok nhân phô mai Pulmuone gói 300g (1 Gói)', 'banh-hotteok-nhan-pho-mai-pulmuone-goi-300g-1-goi', NULL, NULL, NULL, 77000.00, NULL, 'products/621406-8801114164730_PULMUONE_-_BANH_HOTTEOK_NHAN_PHO_MAI_300G.webp', NULL, 100, 1, 1, '2025-09-24 08:59:45', '2025-09-25 10:56:27'),
(5897, 2, 'Pizza hảI sản KINGxBON 220g (1 Cái)', 'pizza-hai-san-kingxbon-220g-1-cai', NULL, NULL, NULL, 64000.00, NULL, 'products/471694-380472.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5898, 2, 'Pizza thập cẩm KINGxBON 210g (1 Cái)', 'pizza-thap-cam-kingxbon-210g-1-cai', NULL, NULL, NULL, 116000.00, NULL, 'products/471697-380470.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5899, 2, 'Pizza phô mai Manna hộp 120g', 'pizza-pho-mai-manna-hop-120g', NULL, NULL, NULL, 164000.00, NULL, 'products/3358-96635.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5900, 2, 'Pizza thịt bò và bắp Hetori 150g (1 Hộp)', 'pizza-thit-bo-va-bap-hetori-150g-1-ho-p', NULL, NULL, NULL, 94000.00, NULL, 'products/577136-95875.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5901, 2, 'Pizza hải sản Hetori 150g (1 hộp)', 'pizza-hai-san-hetori-150g-1-hop', NULL, NULL, NULL, 67000.00, NULL, 'products/468292-101355.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5902, 2, 'Combo 6 bánh giò ép chân không Thọ Phát cái 150g', 'combo-6-banh-gio-ep-chan-khong-tho-phat-cai-150g', NULL, NULL, NULL, 93000.00, NULL, 'products/620657-8938502525726_1.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5903, 2, 'Combo 4 bánh giò ép chân không Thọ Phát cái 150g', 'combo-4-banh-gio-ep-chan-khong-tho-phat-cai-150g', NULL, NULL, NULL, 62000.00, NULL, 'products/620656-8938502525726.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5904, 2, 'Bánh lọc Huế loại 1 Huế Specialty (10 cái) 330g', 'banh-loc-hue-loai-1-hue-specialty-10-cai-330g', NULL, NULL, NULL, 88000.00, NULL, 'products/414189-380677.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5905, 2, 'Bánh mì tươi đông lạnh O\'Smiles 350g (5x70g) (1 gói)', 'banh-mi-tuoi-dong-lanh-o-smiles-350g-5x70g-1-goi', NULL, NULL, NULL, 93000.00, NULL, 'products/490855-8938532826008.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5906, 2, 'Pizza tôm mayonnaise KINGxBON 200g (1 Cái)', 'pizza-tom-mayonnaise-kingxbon-200g-1-cai', NULL, NULL, NULL, 100000.00, NULL, 'products/471695-380471.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5907, 2, 'Bánh bao gạo lứt nhân thịt bò phô mai Bon 70gx4 (1 gói)', 'banh-bao-gao-lut-nhan-thit-bo-pho-mai-bon-70gx4-1-goi', NULL, NULL, NULL, 161000.00, NULL, 'products/561082-8936077113331.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5908, 2, 'Bánh mì nguyên cám đông lạnh O\'Smiles gói 350g', 'banh-mi-nguyen-cam-dong-lanh-o-smiles-goi-350g', NULL, NULL, NULL, 125000.00, NULL, 'products/3079-98663.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5909, 2, 'Bánh paratha vị truyền thống Spring Home 325g (5x65g) (1 gói)', 'banh-paratha-vi-truyen-thong-spring-home-325g-5x65g-1-goi', NULL, NULL, NULL, 41000.00, NULL, 'products/468300-95738.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5910, 2, 'Bánh mì que gà xé phô mai Sundo 189g (1 gói)', 'banh-mi-que-ga-xe-pho-mai-sundo-189g-1-goi', NULL, NULL, NULL, 139000.00, NULL, 'products/468301-380755.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5911, 2, 'Xíu mại tôm Bamboo gói 300g', 'xiu-mai-tom-bamboo-goi-300g', NULL, NULL, NULL, 200000.00, NULL, 'products/3364-96144.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5912, 2, 'Bánh nậm Huế Huế Specialty (8 cái) 350g (1 gói)', 'banh-nam-hue-hue-specialty-8-cai-350g-1-goi', NULL, NULL, NULL, 57000.00, NULL, 'products/414191-380678.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5913, 2, 'Bánh cuốn hải sản Bamboo 250g (1 gói)', 'banh-cuon-hai-san-bamboo-250g-1-goi', NULL, NULL, NULL, 27000.00, NULL, 'products/401460-102241.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5914, 2, 'Bánh bao nhân thịt Thọ Phát gói 250g', 'banh-bao-nhan-thit-tho-phat-goi-250g', NULL, NULL, NULL, 25000.00, NULL, 'products/972-370681.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5915, 2, 'Bánh bao nhân thịt trứng cút CP 125g (1 cái)', 'banh-bao-nhan-thit-trung-cut-cp-125g-1-cai', NULL, NULL, NULL, 115000.00, NULL, 'products/468290-381161.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5916, 2, 'Bánh bao kim sa Bamboo gói 240g', 'banh-bao-kim-sa-bamboo-goi-240g', NULL, NULL, NULL, 41000.00, NULL, 'products/3381-91365.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5917, 2, 'Bánh bao nhân thịt heo trứng muối Thọ Phát gói 400g', 'banh-bao-nhan-thit-heo-trung-muoi-tho-phat-goi-400g', NULL, NULL, NULL, 175000.00, NULL, 'products/973-93999.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5918, 2, 'Bánh cuộn xúc xích phô mai Bibigo 195g (1 hộp)', 'banh-cuon-xuc-xich-pho-mai-bibigo-195g-1-hop', NULL, NULL, NULL, 19000.00, NULL, 'products/468267-99762.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5919, 2, 'Xíu mại thịt Bamboo gói 300g', 'xiu-mai-thit-bamboo-goi-300g', NULL, NULL, NULL, 32000.00, NULL, 'products/8936077110217.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5920, 2, 'Combo pizza KingxBon 3 vị (3 gói)', 'combo-pizza-kingxbon-3-vi-3-goi', NULL, NULL, NULL, 195000.00, NULL, 'products/615976-OL1735634828879.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5921, 2, 'Bánh giò tôm thịt trứng cút Kitkool gói 150g (1 Gói)', 'banh-gio-tom-thit-trung-cut-kitkool-goi-150g-1-goi', NULL, NULL, NULL, 86000.00, NULL, 'products/14275-377632.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5922, 2, 'Bánh bao nguyên cám nhân gà xé sa tế Bon 110gx4 (1 gói)', 'banh-bao-nguyen-cam-nhan-ga-xe-sa-te-bon-110gx4-1-goi', NULL, NULL, NULL, 198000.00, NULL, 'products/468269-381020.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5923, 2, 'Bánh bao không nhân Thọ Phát gói 300g', 'banh-bao-khong-nhan-tho-phat-goi-300g', NULL, NULL, NULL, 171000.00, NULL, 'products/632893-8938502525054.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5924, 2, 'Pizza hải sản pesto Hetori 250g (1 Hộp)', 'pizza-hai-san-pesto-hetori-250g-1-ho-p', NULL, NULL, NULL, 80000.00, NULL, 'products/577134-366414.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5925, 2, 'Bánh mì mè đen đông lạnh O\'Smiles gói 350g', 'banh-mi-me-den-dong-lanh-o-smiles-goi-350g', NULL, NULL, NULL, 80000.00, NULL, 'products/468296-98307.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5926, 2, 'Xôi gà nấm đông cô Thọ Phát 160g (1 Cái)', 'xoi-ga-nam-dong-co-tho-phat-160g-1-cai', NULL, NULL, NULL, 23000.00, NULL, 'products/8938502525481.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5927, 2, 'Bánh giò nhân gà Thọ Phát gói 150g (1 Gói)', 'banh-gio-nhan-ga-tho-phat-goi-150g-1-goi', NULL, NULL, NULL, 51000.00, NULL, 'products/8938502525863.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5928, 2, 'Cánh gà chiên giòn MVP gói 300g (1 Gói)', 'canh-ga-chien-gion-mvp-goi-300g-1-goi', NULL, NULL, NULL, 65000.00, NULL, 'products/8936132124074.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5929, 2, 'Cá kình nguyên con làm sạch Hue Specialty gói 300g (1 Gói)', 'ca-kinh-nguyen-con-lam-sach-hue-specialty-goi-300g-1-goi', NULL, NULL, NULL, 135000.00, NULL, 'products/537671-380649.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5930, 2, 'VIMEX- LÕI VAI BÒ ÚC NƯỚNG KIỂU NHẬT YAKINIKU 400G', 'vimex-loi-vai-bo-uc-nuong-kieu-nhat-yakiniku-400g', NULL, NULL, NULL, 169000.00, NULL, 'products/618520-Screenshot_2025-01-21_at_16.11.09.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5931, 2, 'Mực một nắng Cần Giờ gói 500g (1 Gói)', 'muc-mot-nang-can-gio-goi-500g-1-goi', NULL, NULL, NULL, 154000.00, NULL, 'products/8936187610577.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5932, 2, 'Nghêu lụa rã đông vỉ 150g (1 Vỉ)', 'ngheu-lua-ra-dong-vi-150g-1-vi', NULL, NULL, NULL, 170000.00, NULL, 'products/605913-381838.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5933, 2, 'Phô mai que Pulmuone gói 406g (1 Gói)', 'pho-mai-que-pulmuone-goi-406g-1-goi', NULL, NULL, NULL, 159000.00, NULL, 'products/8801114175033.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5934, 2, 'Thịt gà xiên que tẩm ướp CP khay 300g (1 Khay)', 'thit-ga-xien-que-tam-uop-cp-khay-300g-1-khay', NULL, NULL, NULL, 47500.00, NULL, 'products/97760-379614.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5935, 2, 'Bò cuộn lá lốt Freshfoco vỉ 300g', 'bo-cuon-la-lot-freshfoco-vi-300g', NULL, NULL, NULL, 93000.00, NULL, 'products/8936190860587.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5936, 2, 'Khổ qua nhồi thịt Freshfoco khay 370g (1 khay)', 'kho-qua-nho-i-thi-t-freshfoco-khay-370g-1-khay', NULL, NULL, NULL, 152000.00, NULL, 'products/386206-8936190861041.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5937, 2, 'Hoành thánh Wiki Fresh vỉ 300g (1 Vỉ)', 'hoanh-thanh-wiki-fresh-vi-300g-1-vi', NULL, NULL, NULL, 107000.00, NULL, 'products/14889-375894.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5938, 2, 'Xúc xích vòng Bratwurst Ponnie gói 200g (1 Gói)', 'xuc-xich-vong-bratwurst-ponnie-goi-200g-1-goi', NULL, NULL, NULL, 79500.00, NULL, 'products/8936034876743.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5939, 2, 'Xúc xích mini cocktail Meat Master gói 200g (1 Gói)', 'xuc-xich-mini-cocktail-meat-master-goi-200g-1-goi', NULL, NULL, NULL, 39500.00, NULL, 'products/15510-377992.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5940, 2, 'Xúc xích vị Bratwurst Ponnie gói 210g (1 Gói)', 'xuc-xich-vi-bratwurst-ponnie-goi-210g-1-goi', NULL, NULL, NULL, 52000.00, NULL, 'products/8936034876750.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5941, 2, 'Xúc xích phô mai Cheesy Đức Việt gói 250g (1 Gói)', 'xuc-xich-pho-mai-cheesy-duc-viet-goi-250g-1-goi', NULL, NULL, NULL, 56000.00, NULL, 'products/8935101607938.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5942, 2, 'Xúc xích Deli Sumo Le Gourmet gói 500g', 'xuc-xich-deli-sumo-le-gourmet-goi-500g', NULL, NULL, NULL, 50000.00, NULL, 'products/620-94876.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5943, 2, 'Chả lụa bì ớt xiêm xanh G gói 500g', 'cha-lua-bi-ot-xiem-xanh-g-goi-500g', NULL, NULL, NULL, 129000.00, NULL, 'products/511-98437.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5944, 2, 'Nem chua bì ớt xiêm xanh G gói 180g (1 Gói)', 'nem-chua-bi-ot-xiem-xanh-g-goi-180g-1-goi', NULL, NULL, NULL, 49000.00, NULL, 'products/624271-8936146447305_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5945, 2, 'Combo 2 gói chả lụa bì ớt xiêm xanh G gói 500g', 'combo-2-goi-cha-lua-bi-ot-xiem-xanh-g-goi-500g', NULL, NULL, NULL, 258000.00, NULL, 'products/617898-8936146440467_-_2.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5946, 2, 'Giò lụa Ngự Bảo hảo hạng Meat Deli 300g (1 gói)', 'gio-lua-ngu-bao-hao-hang-meat-deli-300g-1-goi', NULL, NULL, NULL, 68000.00, NULL, 'products/617841-8936034876200.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5947, 2, 'Chân giò heo muối Ngọc Thơm gói 300g (1 Gói)', 'chan-gio-heo-muoi-ngoc-thom-goi-300g-1-goi', NULL, NULL, NULL, 98000.00, NULL, 'products/311433-379798.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5948, 2, 'Bánh xếp mandu nhân thịt và bắp Bibigo gói 350g', 'banh-xep-mandu-nhan-thit-va-bap-bibigo-goi-350g', NULL, NULL, NULL, 46000.00, NULL, 'products/617358-8934717401350_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5949, 2, 'Bánh xếp mandu nhân thịt Bibigo gói 350g', 'banh-xep-mandu-nhan-thit-bibigo-goi-350g', NULL, NULL, NULL, 92000.00, NULL, 'products/3399-369445.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5950, 2, 'Hoành thánh tôm thịt Bamboo gói 220g', 'hoanh-thanh-tom-thit-bamboo-goi-220g', NULL, NULL, NULL, 196000.00, NULL, 'products/3366-91748.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5951, 2, 'Há cảo tôm Bamboo gói 270g', 'ha-cao-tom-bamboo-goi-270g', NULL, NULL, NULL, 117000.00, NULL, 'products/3368-94379.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5952, 2, 'Thạch đen sương sáo Sài Gòn Milk hộp 320g (1 Hộp)', 'thach-den-suong-sao-sai-gon-milk-hop-320g-1-hop', NULL, NULL, NULL, 27000.00, NULL, 'products/8938512932569.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5953, 2, 'Thạch đen Cao Bằng Thạch An hộp 480g', 'thach-den-cao-bang-thach-an-hop-480g', NULL, NULL, NULL, 37000.00, NULL, 'products/3187-98287.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5954, 2, 'Thạch Puri trái cây vị nho Cosia hũ 200g (1 Hũ)', 'thach-puri-trai-cay-vi-nho-cosia-hu-200g-1-hu', NULL, NULL, NULL, 25000.00, NULL, 'products/6950561104065.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5955, 2, 'Thạch đen trân châu Thạch An ly 280g', 'thach-den-tran-chau-thach-an-ly-280g', NULL, NULL, NULL, 21000.00, NULL, 'products/2935-369712.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5956, 2, 'Hồng trà sữa Bá Tước Thơm chai 250ml (1 Chai)', 'hong-tra-sua-ba-tuoc-thom-chai-250ml-1-chai', NULL, NULL, NULL, 23000.00, NULL, 'products/8938511301618.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5957, 2, 'Đậu hũ viên chiên Beany gói 500g (1 Gói)', 'dau-hu-vien-chien-beany-goi-500g-1-goi', NULL, NULL, NULL, 31000.00, NULL, 'products/8938546855148.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5958, 2, 'Combo Đậu Hũ Non & Nấm Đông Cô', 'combo-dau-hu-non-nam-dong-co', NULL, NULL, NULL, 46500.00, NULL, 'products/632603-OL1752475623330_5.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5959, 2, 'Tàu hũ chiên miếng Ichi - Sakura Ichiban gói 500g', 'tau-hu-chien-mieng-ichi-sakura-ichiban-goi-500g', NULL, NULL, NULL, 129000.00, NULL, 'products/8936000751050.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5960, 2, 'Đậu hủ cá phô mai EB gói 500g (1 Gói)', 'dau-hu-ca-pho-mai-eb-goi-500g-1-goi', NULL, NULL, NULL, 104000.00, NULL, 'products/15416-377081.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5961, 2, 'Đậu hũ non Vị Nguyên 280g (1 hộp)', 'dau-hu-non-vi-nguyen-280g-1-hop', NULL, NULL, NULL, 17000.00, NULL, 'products/403751-95453.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5962, 2, 'Chả cá xoắn Mayumi gói 160g (1 Gói)', 'cha-ca-xoan-mayumi-goi-160g-1-goi', NULL, NULL, NULL, 45000.00, NULL, 'products/8936019920041.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5963, 2, 'Cá viên hải sản nhân cá nhím biển CB 500g (1 gói)', 'ca-vien-hai-san-nhan-ca-nhim-bien-cb-500g-1-goi', NULL, NULL, NULL, 23000.00, NULL, 'products/468059-91355.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5964, 2, 'Cá viên vị hành tiêu CP 500g (1 gói)', 'ca-vien-vi-hanh-tieu-cp-500g-1-goi', NULL, NULL, NULL, 67000.00, NULL, 'products/468058-96512.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5965, 2, 'Chả cá viên thát lát Hapi gói 200g', 'cha-ca-vien-that-lat-hapi-goi-200g', NULL, NULL, NULL, 92000.00, NULL, 'products/468151-96278.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5966, 2, 'Cá viên nhân phô mai Bamboo gói 264g (1 Gói)', 'ca-vien-nhan-pho-mai-bamboo-goi-264g-1-goi', NULL, NULL, NULL, 163000.00, NULL, 'products/8936077113850.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5967, 2, 'Thanh Surimi hình dáng càng cua tuyết Mayumi gói 200g (1 Gói)', 'thanh-surimi-hinh-dang-cang-cua-tuyet-mayumi-goi-200g-1-goi', NULL, NULL, NULL, 69500.00, NULL, 'products/8936219620109.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5968, 2, 'Combo cá viên lucky 5 trong 1 CB gói 500g', 'combo-ca-vien-lucky-5-trong-1-cb-goi-500g', NULL, NULL, NULL, 167000.00, NULL, 'products/4901-92629.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5969, 2, 'Que surimi hương cua kani supreme Kani gói 250g', 'que-surimi-huong-cua-kani-supreme-kani-goi-250g', NULL, NULL, NULL, 89000.00, NULL, 'products/3401-101536.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5970, 2, 'Cá viên Hoa Doanh gói 200g (1 Gói)', 'ca-vien-hoa-doanh-goi-200g-1-goi', NULL, NULL, NULL, 20000.00, NULL, 'products/15430-376774.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5971, 2, 'Khoai tây cắt sợi đông lạnh French Fries Shoestring Farm Best túi 1kg', 'khoai-tay-cat-soi-dong-lanh-french-fries-shoestring-farm-best-tui-1kg', NULL, NULL, NULL, 85000.00, NULL, 'products/3306-94851.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5972, 2, 'Khoai tây đông lạnh Trần Gia gói 500g (1 Gói)', 'khoai-tay-dong-lanh-tran-gia-goi-500g-1-goi', NULL, NULL, NULL, 47000.00, NULL, 'products/8936200101563.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5973, 2, 'Khoai tây đông lạnh sợi lớn Lutosa gói 1kg (1 Gói)', 'khoai-tay-dong-lanh-soi-lon-lutosa-goi-1kg-1-goi', NULL, NULL, NULL, 40000.00, NULL, 'products/471691-92412.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5974, 2, 'Khoai tây đông lạnh sợi lớn Lutosa gói 450g (1 Gói)', 'khoai-tay-dong-lanh-soi-lon-lutosa-goi-450g-1-goi', NULL, NULL, NULL, 146000.00, NULL, 'products/15457-91122.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5975, 2, 'Rau quả hỗn hợp Trần Gia gói 500g', 'rau-qua-hon-hop-tran-gia-goi-500g', NULL, NULL, NULL, 25000.00, NULL, 'products/622860-8936200100092.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5976, 2, 'Kim chi cải thảo cắt lát Bibigo hộp 500g', 'kim-chi-cai-thao-cat-lat-bibigo-hop-500g', NULL, NULL, NULL, 199000.00, NULL, 'products/624834-8938508547579.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5977, 2, 'Kim chi cải thảo cắt lát Bibigo 100g (1 Gói)', 'kim-chi-cai-thao-cat-lat-bibigo-100g-1-goi', NULL, NULL, NULL, 160000.00, NULL, 'products/624264-8938508547562_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5978, 2, 'Kim chi cải thảo cắt lát Pojang hộp 500g (1 Hộp)', 'kim-chi-cai-thao-cat-lat-pojang-hop-500g-1-hop', NULL, NULL, NULL, 131000.00, NULL, 'products/125718-8936205640043.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5979, 2, 'Cải sậy chua ngọt cắt sẵn Mạnh Nghĩa 500g (1 gói)', 'cai-say-chua-ngot-cat-san-manh-nghia-500g-1-goi', NULL, NULL, NULL, 14000.00, NULL, 'products/423385-380958.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5980, 2, 'Kim chi cải thảo cắt lát cay vừa King\'s hộp 500g (1 Hôp)', 'kim-chi-cai-thao-cat-lat-cay-vua-king-s-hop-500g-1-hop', NULL, NULL, NULL, 80000.00, NULL, 'products/600-93600.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5981, 2, 'Bún tươi sợi lớn Ba Khánh gói 300g', 'bun-tuoi-soi-lon-ba-khanh-goi-300g', NULL, NULL, NULL, 132000.00, NULL, 'products/3198-369251.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5982, 2, 'Bún tươi sấy khô Nuffam gói 400g', 'bun-tuoi-say-kho-nuffam-goi-400g', NULL, NULL, NULL, 194000.00, NULL, 'products/1913-93252.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5983, 2, 'Bún nưa shirataki Vị Nguyên 240g (1 hộp)', 'bun-nua-shirataki-vi-nguyen-240g-1-hop', NULL, NULL, NULL, 166000.00, NULL, 'products/467963-95636.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5984, 2, 'Bún tươi Bích Chi gói 200g', 'bun-tuoi-bich-chi-goi-200g', NULL, NULL, NULL, 166000.00, NULL, 'products/3939-93548.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5985, 2, 'Chả giò real thịt CJ Cầu Tre gói 400g', 'cha-gio-real-thit-cj-cau-tre-goi-400g', NULL, NULL, NULL, 74000.00, NULL, 'products/3391-102165.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5986, 2, 'Chả giò real hải sản CJ Cầu Tre gói 400g', 'cha-gio-real-hai-san-cj-cau-tre-goi-400g', NULL, NULL, NULL, 49000.00, NULL, 'products/603536-8934717261336.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5987, 2, 'Chả giò thịt đặc biệt G Kitchen 400g (1 Gói)', 'cha-gio-thit-dac-biet-g-kitchen-400g-1-goi', NULL, NULL, NULL, 82000.00, NULL, 'products/595-365929.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5988, 2, 'Chả ram tôm đất Quy Nhơn Hoa Doanh gói 200g (1 Gói)', 'cha-ram-tom-dat-quy-nhon-hoa-doanh-goi-200g-1-goi', NULL, NULL, NULL, 96000.00, NULL, 'products/19368-376770.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5989, 2, 'Nem cua bể Bamboo gói 270g (1 Gói)', 'nem-cua-be-bamboo-goi-270g-1-goi', NULL, NULL, NULL, 129000.00, NULL, 'products/315938-380342.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5990, 2, 'Tôm chua Trọng Tín 500g (1 hũ)', 'tom-chua-trong-tin-500g-1-hu', NULL, NULL, NULL, 141000.00, NULL, 'products/408369-380790.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:13'),
(5991, 3, 'Dầu gạo lứt Simply chai 1L (1 Chai)', 'dau-gao-lut-simply-chai-1l-1-chai', NULL, NULL, NULL, 75000.00, NULL, 'products/628867-8934988021028.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5992, 3, 'Dầu hạt cải Simply chai 1L', 'dau-hat-cai-simply-chai-1l', NULL, NULL, NULL, 79000.00, NULL, 'products/628869-8934988022025.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5993, 3, 'Dầu hướng dương Simply chai 1L (1 Chai)', 'dau-huong-duong-simply-chai-1l-1-chai', NULL, NULL, NULL, 84900.00, NULL, 'products/628871-8934988023022.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5994, 3, 'Nước tương thượng hạng Nam Dương chai 500ml (1 Chai)', 'nuoc-tuong-thuong-hang-nam-duong-chai-500ml-1-chai', NULL, NULL, NULL, 41000.00, NULL, 'products/14053-377410.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5995, 3, 'Sốt Teriyaki Ebara chai 235g (1 Chai)', 'sot-teriyaki-ebara-chai-235g-1-chai', NULL, NULL, NULL, 95000.00, NULL, 'products/471720-380974.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5996, 3, 'Nước chấm ớt tỏi Lý Sơn Nam Ngư chai 300ml (1 Chai)', 'nuoc-cham-ot-toi-ly-son-nam-ngu-chai-300ml-1-chai', NULL, NULL, NULL, 35000.00, NULL, 'products/8936221044382.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5997, 3, 'Sốt ướp đồ nướng Lee Kum Kee hũ 240g', 'sot-uop-do-nuong-lee-kum-kee-hu-240g', NULL, NULL, NULL, 50000.00, NULL, 'products/078895740042.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5998, 3, 'Dầu đậu nành Meizan chai 2L (1 Chai)', 'dau-dau-nanh-meizan-chai-2l-1-chai', NULL, NULL, NULL, 132000.00, NULL, 'products/8934988062038.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(5999, 3, 'Sốt mayonnaise hương gạo rang Simply chai 230g', 'sot-mayonnaise-huong-gao-rang-simply-chai-230g', NULL, NULL, NULL, 39000.00, NULL, 'products/1605-100854.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6000, 3, 'Sốt mayonnaise chấm trộn Simply chai 230g', 'sot-mayonnaise-cham-tron-simply-chai-230g', NULL, NULL, NULL, 39000.00, NULL, 'products/1448-92970.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6001, 3, 'Bột ngọt Meizan gói 400g (1 Gói)', 'bot-ngot-meizan-goi-400g-1-goi', NULL, NULL, NULL, 32000.00, NULL, 'products/8936134364027.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6002, 3, 'Bột ngọt Meizan gói 1kg (1 Gói)', 'bot-ngot-meizan-goi-1kg-1-goi', NULL, NULL, NULL, 69000.00, NULL, 'products/8936134364034.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6003, 3, 'Dầu gạo lứt Light Tường An chai 1L', 'dau-gao-lut-light-tuong-an-chai-1l', NULL, NULL, NULL, 77600.00, NULL, 'products/1350-100876.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6004, 3, 'Dầu hướng dương Tường An chai 1L', 'dau-huong-duong-tuong-an-chai-1l', NULL, NULL, NULL, 82500.00, NULL, 'products/1411-368670.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6005, 3, 'Dầu hạt cải Tường An chai 1L', 'dau-hat-cai-tuong-an-chai-1l', NULL, NULL, NULL, 79200.00, NULL, 'products/1514-98880.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6006, 3, 'Bơ thực vật Tường An hộp 200g', 'bo-thuc-vat-tuong-an-hop-200g', NULL, NULL, NULL, 20000.00, NULL, 'products/1054-371467.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6007, 3, 'Combo 24 chai nước tương thượng hạng Nam Dương chai 500ml x 24', 'combo-24-chai-nuoc-tuong-thuong-hang-nam-duong-chai-500ml-x-24', NULL, NULL, NULL, 984000.00, NULL, 'products/632584-893613436015912.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6008, 3, 'Nước mắm cá cơm vàng ruột đỏ Làng Chài Xưa chai 500g (1 Chai)', 'nuoc-mam-ca-com-vang-ruot-do-lang-chai-xua-chai-500g-1-chai', NULL, NULL, NULL, 162000.00, NULL, 'products/21986-379835.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6009, 3, 'Dầu đậu nành Janbee chai 1L (1 Chai)', 'dau-dau-nanh-janbee-chai-1l-1-chai', NULL, NULL, NULL, 174000.00, NULL, 'products/316411-380478.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6010, 3, 'Nước mắm cá cơm 10N Hồng Hạnh chai 900ml (1 Chai)', 'nuoc-mam-ca-com-10n-hong-hanh-chai-900ml-1-chai', NULL, NULL, NULL, 110000.00, NULL, 'products/8935126700607.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6011, 3, 'Combo 6 chai nước mắm cá cơm vàng ruột đỏ Làng Chài Xưa chai 500ml', 'combo-6-chai-nuoc-mam-ca-com-vang-ruot-do-lang-chai-xua-chai-500ml', NULL, NULL, NULL, 354000.00, NULL, 'products/628931-ruot_o.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6012, 3, 'Combo 6 chai nước mắm cá cơm 10N Hồng Hạnh chai 900ml (1 Chai)', 'combo-6-chai-nuoc-mam-ca-com-10n-hong-hanh-chai-900ml-1-chai', NULL, NULL, NULL, 354000.00, NULL, 'products/632578-89351267006076.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6013, 3, 'Bếp đủ đầy: Dầu ăn đậu nành Coba 1L, Nước mắm Làng Chài Xưa 500ml, nước tương Nam Dương thượng hạng 210ml', 'bep-du-day-dau-an-dau-nanh-coba-1l-nuoc-mam-lang-chai-xua-500ml-nuoc-tuong-nam-duong-thuong-hang-210ml', NULL, NULL, NULL, 143500.00, NULL, 'products/657489-54.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6014, 3, 'Combo 3 Chai Dầu Đậu Nành Meizan 2L', 'combo-3-chai-dau-dau-nanh-meizan-2l', NULL, NULL, NULL, 396000.00, NULL, 'products/628942-meizan_nanh_2l.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6015, 3, 'Combo 6 Chai Dầu Đậu Nành Janbee 1L', 'combo-6-chai-dau-dau-nanh-janbee-1l', NULL, NULL, NULL, 390000.00, NULL, 'products/628943-janbee_1l.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6016, 3, 'Combo 2 chai dầu đậu nành Meizan 1L (2 chai)', 'combo-2-chai-dau-dau-nanh-meizan-1l-2-chai', NULL, NULL, NULL, 130000.00, NULL, 'products/633157-629402-18934673100455_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6017, 3, 'Combo 6 Chai Dầu Đậu Nành Tự Nhiên Coba 1L', 'combo-6-chai-dau-dau-nanh-tu-nhien-coba-1l', NULL, NULL, NULL, 390000.00, NULL, 'products/628944-coba_1l.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6018, 3, 'Combo 6 Chai Dầu Đậu Nành Meizan 1L', 'combo-6-chai-dau-dau-nanh-meizan-1l', NULL, NULL, NULL, 390000.00, NULL, 'products/629832-8934755010392_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6019, 3, 'Combo 6 Chai Nước Mắm Nhãn Vàng 40N Làng Chài Xưa - Chai 500ml', 'combo-6-chai-nuoc-mam-nhan-vang-40n-lang-chai-xua-chai-500ml', NULL, NULL, NULL, 580200.00, NULL, 'products/628932-nhan_vang.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6020, 3, 'Combo 24 chai nước tương đậm đặc Nam Dương chai 500ml x 24', 'combo-24-chai-nuoc-tuong-dam-dac-nam-duong-chai-500ml-x-24', NULL, NULL, NULL, 448800.00, NULL, 'products/632585-893613436104012.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6021, 3, 'Dầu ăn Cooking Tường An chai 1L', 'dau-an-cooking-tuong-an-chai-1l', NULL, NULL, NULL, 156000.00, NULL, 'products/1688-97548.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6022, 3, 'Ớt bột CJ gói 100g (1 Gói)', 'ot-bot-cj-goi-100g-1-goi', NULL, NULL, NULL, 39900.00, NULL, 'products/8938508547821.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6023, 3, 'Dầu hỗn hợp Light Neptune chai 1l', 'dau-hon-hop-light-neptune-chai-1l', NULL, NULL, NULL, 64500.00, NULL, 'products/1568-101513.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6024, 3, 'Combo 3 Chai Dầu Ăn Cooking Oil Tường An 2L', 'combo-3-chai-dau-an-cooking-oil-tuong-an-2l', NULL, NULL, NULL, 354000.00, NULL, 'products/628983-cooking_oil_2l.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6025, 3, 'Combo 6 Chai Dầu Cooking Oil Tường An 1L', 'combo-6-chai-dau-cooking-oil-tuong-an-1l', NULL, NULL, NULL, 354000.00, NULL, 'products/628938-cooking_oil_1l.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6026, 3, 'Nước tương tỏi ớt tươi Nam Dương chai 310g (1 Chai)', 'nuoc-tuong-toi-ot-tuoi-nam-duong-chai-310g-1-chai', NULL, NULL, NULL, 173000.00, NULL, 'products/603498-382117.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6027, 3, 'Combo 24 chai nước tương tỏi ớt tươi Nam Dương - Chai 310g x 24', 'combo-24-chai-nuoc-tuong-toi-ot-tuoi-nam-duong-chai-310g-x-24', NULL, NULL, NULL, 403200.00, NULL, 'products/632586-893613436136112.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6028, 3, 'Dầu hỗn hợp Light Neptune chai 2l', 'dau-hon-hop-light-neptune-chai-2l', NULL, NULL, NULL, 128000.00, NULL, 'products/1567-93073.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6029, 3, 'Nước mắm nhãn đỏ 30N Làng Chài Xưa chai 500ml (1 Chai)', 'nuoc-mam-nhan-do-30n-lang-chai-xua-chai-500ml-1-chai', NULL, NULL, NULL, 83000.00, NULL, 'products/311398-380007.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6030, 3, 'Combo Nước mắm nhãn vàng 40N Làng Chài Xưa chai 500ml & Dầu đậu nành Meizan 1L', 'combo-nuoc-mam-nhan-vang-40n-lang-chai-xua-chai-500ml-dau-dau-nanh-meizan-1l', NULL, NULL, NULL, 161700.00, NULL, 'products/OL1750320609165.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6031, 3, 'Combo 3 Chai Dầu Hỗn Hợp Neptune Light 2L', 'combo-3-chai-dau-hon-hop-neptune-light-2l', NULL, NULL, NULL, 384000.00, NULL, 'products/628935-neptune_light_2l.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6032, 3, 'Nước mắm nêm Làng Chài Xưa chai 300g', 'nuoc-mam-nem-lang-chai-xua-chai-300g', NULL, NULL, NULL, 65000.00, NULL, 'products/1375-93269.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6033, 3, 'Tương cà Chinsu chai 500g (1 Chai)', 'tuong-ca-chinsu-chai-500g-1-chai', NULL, NULL, NULL, 34000.00, NULL, 'products/623672-8936136164083.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6034, 3, 'Combo 6 Chai Dầu Hỗn Hợp Light Neptune 1L', 'combo-6-chai-dau-hon-hop-light-neptune-1l', NULL, NULL, NULL, 387000.00, NULL, 'products/628934-neptune_light_1l.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6035, 3, 'Combo 2 sốt Spaghetti vị nguyên bản O\'food gói 120g (2 Gói)', 'combo-2-sot-spaghetti-vi-nguyen-ban-o-food-goi-120g-2-goi', NULL, NULL, NULL, 43000.00, NULL, 'products/665543-8935304200080.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6036, 3, 'Nước mắm chua ngọt Làng Chài Xưa chai 300g', 'nuoc-mam-chua-ngot-lang-chai-xua-chai-300g', NULL, NULL, NULL, 66200.00, NULL, 'products/1374-370806.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6037, 3, 'Sốt mỳ Ý Heinz 470g (1 Chai)', 'sot-my-y-heinz-470g-1-chai', NULL, NULL, NULL, 73000.00, NULL, 'products/1156-90812.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6038, 3, 'Sốt Spaghetti Otoki 200g', 'sot-spaghetti-otoki-200g', NULL, NULL, NULL, 31000.00, NULL, 'products/626332-8936049050572_OTOKI_-_SOT_SPAGHETTI_220G.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6039, 3, 'Đường mía thiên nhiên Biên Hòa túi 1kg', 'duong-mia-thien-nhien-bien-hoa-tui-1kg', NULL, NULL, NULL, 145000.00, NULL, 'products/1712-102328.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6040, 3, 'Đường mía thượng hạng Biên Hòa túi 1kg', 'duong-mia-thuong-hang-bien-hoa-tui-1kg', NULL, NULL, NULL, 97000.00, NULL, 'products/608444-8935015510447.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6041, 3, 'Đường phèn vàng thiên nhiên Pro Biên Hòa túi 500g (1 Túi)', 'duong-phen-vang-thien-nhien-pro-bien-hoa-tui-500g-1-tui', NULL, NULL, NULL, 14000.00, NULL, 'products/126100-377923.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6042, 3, 'Đường organic Biên Hòa gói 400g', 'duong-organic-bien-hoa-goi-400g', NULL, NULL, NULL, 54000.00, NULL, 'products/1615-371251.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6043, 3, 'Đường phèn hạt túi Anh Đăng gói 500g', 'duong-phen-hat-tui-anh-dang-goi-500g', NULL, NULL, NULL, 22000.00, NULL, 'products/1545-99556.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6044, 3, 'Tương ớt regular Sempio hộp 500g', 'tuong-ot-regular-sempio-hop-500g', NULL, NULL, NULL, 85000.00, NULL, 'products/1474-100069.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6045, 3, 'Xốt ớt đỏ Tabasco chai 60ml (1 Chai)', 'xot-ot-do-tabasco-chai-60ml-1-chai', NULL, NULL, NULL, 76000.00, NULL, 'products/15698-11210000018.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6046, 3, 'Hạt nêm nấm hương organic Knorr gói 800g (1 Gói)', 'hat-nem-nam-huong-organic-knorr-goi-800g-1-goi', NULL, NULL, NULL, 88000.00, NULL, 'products/13582-377074.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6047, 3, 'Bột ngọt Vedan gói 454g (1 Gói)', 'bot-ngot-vedan-goi-454g-1-goi', NULL, NULL, NULL, 33000.00, NULL, 'products/625058-2_20.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6048, 3, 'Hạt nêm thịt xương ống tủy cà rốt vị heo Meizan túi 1kg (1 Túi)', 'hat-nem-thit-xuong-ong-tuy-ca-rot-vi-heo-meizan-tui-1kg-1-tui', NULL, NULL, NULL, 65000.00, NULL, 'products/8936134363112.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6049, 3, 'Bột ngọt Ajinomoto gói 400g', 'bot-ngot-ajinomoto-goi-400g', NULL, NULL, NULL, 110000.00, NULL, 'products/619544-8935039500400-02.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6050, 3, 'Wasabi S&B tuýp 43g (1 Tuýp)', 'wasabi-s-b-tuyp-43g-1-tuyp', NULL, NULL, NULL, 32000.00, NULL, 'products/141861-92345.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6051, 3, 'Combo salad cà chua bi sốt mè rang', 'combo-salad-ca-chua-bi-sot-me-rang', NULL, NULL, NULL, 59000.00, NULL, 'products/663830-OL1752475623330_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6052, 3, 'Xốt mè rang Aji-Xốt chai 235G', 'xot-me-rang-aji-xot-chai-235g', NULL, NULL, NULL, 56000.00, NULL, 'products/610289-8935039573503.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6053, 3, 'Combo Hũ Kho Quẹt Nam Ngư 200g & Cải Thìa Vietgap 300g & Bầu Vietgap 500g', 'combo-hu-kho-quet-nam-ngu-200g-cai-thia-vietgap-300g-bau-vietgap-500g', NULL, NULL, NULL, 69400.00, NULL, 'products/632608-OL1752475623330_8.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6054, 3, 'Combo gia vị nấu nhanh: dầu hào, hạt nêm, tiêu đen', 'combo-gia-vi-nau-nhanh-dau-hao-hat-nem-tieu-den', NULL, NULL, NULL, 70400.00, NULL, 'products/OL1750320609163.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6055, 3, 'Bơ thực vật Meizan hộp 200g (1 Hộp)', 'bo-thuc-vat-meizan-hop-200g-1-hop', NULL, NULL, NULL, 20000.00, NULL, 'products/8934988070118.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14');
INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `short_desc`, `unit`, `price`, `old_price`, `image`, `gallery`, `stock`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(6056, 3, 'Dầu hào Maggi chai 530g', 'dau-hao-maggi-chai-530g', NULL, NULL, NULL, 117000.00, NULL, 'products/665501-8934804022307.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6057, 3, 'Dầu hào Maggi chai 150g', 'dau-hao-maggi-chai-150g', NULL, NULL, NULL, 102000.00, NULL, 'products/619532-8934804006444-02.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6058, 3, 'Dầu hào nấm hương Maggi chai 350g', 'dau-hao-nam-huong-maggi-chai-350g', NULL, NULL, NULL, 199000.00, NULL, 'products/467986-99674.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6059, 3, 'Muối hồng dạng nhuyễn Vipep hũ 500g (1 Hũ)', 'muoi-hong-dang-nhuyen-vipep-hu-500g-1-hu', NULL, NULL, NULL, 32000.00, NULL, 'products/5291-98047.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6060, 3, 'Muối i-ốt Cà Ná gói 500g', 'muoi-i-ot-ca-na-goi-500g', NULL, NULL, NULL, 61000.00, NULL, 'products/619536-8936071331113-02.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6061, 3, 'Muối hồng dạng nhuyễn Vipep hũ 200g', 'muoi-hong-dang-nhuyen-vipep-hu-200g', NULL, NULL, NULL, 58000.00, NULL, 'products/1576-97069.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6062, 3, 'Muối biển IOD Vietsalt gói 1kg', 'muoi-bien-iod-vietsalt-goi-1kg', NULL, NULL, NULL, 19000.00, NULL, 'products/1656-367544.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6063, 3, 'Muối chấm Hảo Hảo Acecook hũ 120g', 'muoi-cham-hao-hao-acecook-hu-120g', NULL, NULL, NULL, 142000.00, NULL, 'products/619534-8934563065249-02.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6064, 3, 'Bột tỏi Vipep hũ 70g (1 Hũ)', 'bot-toi-vipep-hu-70g-1-hu', NULL, NULL, NULL, 105000.00, NULL, 'products/14085-374903.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6065, 3, 'Bột hành hũ Vipep hũ 70g (1 Hũ)', 'bot-hanh-hu-vipep-hu-70g-1-hu', NULL, NULL, NULL, 21000.00, NULL, 'products/14083-374902.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6066, 3, 'Ớt bột Chỉ Thiên Vipep hũ 45g (1 Hũ)', 'ot-bot-chi-thien-vipep-hu-45g-1-hu', NULL, NULL, NULL, 157000.00, NULL, 'products/19398-378454.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6067, 3, 'Bột ớt siêu cay Ông Chà Và hộp 40g', 'bot-ot-sieu-cay-ong-cha-va-hop-40g', NULL, NULL, NULL, 150000.00, NULL, 'products/1451-370157.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6068, 3, 'Nghệ bột Vipep hũ 35g', 'nghe-bot-vipep-hu-35g', NULL, NULL, NULL, 22000.00, NULL, 'products/1654-369873.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6069, 3, 'Combo tiệc nướng: Sa tế ớt hũ 150g, xốt ướp thịt nướng 70g, tương ớt chin su 500g', 'combo-tiec-nuong-sa-te-ot-hu-150g-xot-uop-thit-nuong-70g-tuong-ot-chin-su-500g', NULL, NULL, NULL, 62700.00, NULL, 'products/657490-55.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6070, 3, 'Tiêu đen xay DH Foods hũ 45g', 'tieu-den-xay-dh-foods-hu-45g', NULL, NULL, NULL, 180000.00, NULL, 'products/619530-8936079282301-03.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6071, 3, 'Ớt khô sa tế Cholimex hũ 100g', 'ot-kho-sa-te-cholimex-hu-100g', NULL, NULL, NULL, 111000.00, NULL, 'products/1581-96077.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6072, 3, 'Tiêu ngũ sắc có cối xay Vpep hũ 45g (1 Hũ)', 'tieu-ngu-sac-co-coi-xay-vpep-hu-45g-1-hu', NULL, NULL, NULL, 184000.00, NULL, 'products/14300-365807.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6073, 3, 'Nước cốt dừa đậm đặc Eufood lon 400ml', 'nuoc-cot-dua-dam-dac-eufood-lon-400ml', NULL, NULL, NULL, 158000.00, NULL, 'products/8850227023892.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6074, 3, 'Nước cốt dừa đậm đặc Eufood lon 165ml (1 Lon)', 'nuoc-cot-dua-dam-dac-eufood-lon-165ml-1-lon', NULL, NULL, NULL, 48000.00, NULL, 'products/15417-101219.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6075, 3, 'Nước cốt dừa xim Mom Cooks hộp 200ml (1 Hộp)', 'nuoc-cot-dua-xim-mom-cooks-hop-200ml-1-hop', NULL, NULL, NULL, 116000.00, NULL, 'products/8935015521221.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6076, 3, 'Nước cốt dừa xim Mom Cooks lon 400ml', 'nuoc-cot-dua-xim-mom-cooks-lon-400ml', NULL, NULL, NULL, 97000.00, NULL, 'products/8935015520026.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6077, 3, 'Hành phi Minh Hà hũ 100g', 'hanh-phi-minh-ha-hu-100g', NULL, NULL, NULL, 107000.00, NULL, 'products/2345-96076.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6078, 3, 'Tỏi phi Minh Hà hũ 100g', 'to-i-phi-minh-ha-hu-100g', NULL, NULL, NULL, 190000.00, NULL, 'products/2343-97066.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6079, 3, 'Combo 6 Chai Dầu Ăn Cao Cấp Gold Meizan 1L', 'combo-6-chai-dau-an-cao-cap-gold-meizan-1l', NULL, NULL, NULL, 330000.00, NULL, 'products/629831-8934755010392.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6080, 3, 'Dầu ăn cao cấp Gold Meizan 1L (1 Chai)', 'dau-an-cao-cap-gold-meizan-1l-1-chai', NULL, NULL, NULL, 195000.00, NULL, 'products/629401-18934673100455.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6081, 4, 'Nho đen Mỹ không hạt túi 1kg (1 Túi)', 'nho-den-my-khong-hat-tui-1kg-1-tui', NULL, NULL, NULL, 299000.00, NULL, 'products/609449-Group_329.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6082, 4, 'Nho xanh Mỹ không hạt túi 1kg (1 Túi)', 'nho-xanh-my-khong-hat-tui-1kg-1-tui', NULL, NULL, NULL, 299000.00, NULL, 'products/663825-1101310.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6083, 4, 'Nho đỏ Mỹ không hạt hộp 450g (1 Hộp)', 'nho-do-my-khong-hat-hop-450g-1-hop', NULL, NULL, NULL, 159000.00, NULL, 'products/657447-8935360200093.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6084, 4, 'Nho Mỹ không hạt mix xanh đen hộp 450g (1 Hộp)', 'nho-my-khong-hat-mix-xanh-den-hop-450g-1-hop', NULL, NULL, NULL, 169000.00, NULL, 'products/608404-8935360200123.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6085, 4, 'Nho xanh Mỹ không hạt hộp 450g (1 Hộp)', 'nho-xanh-my-khong-hat-hop-450g-1-hop', NULL, NULL, NULL, 169000.00, NULL, 'products/657448-8935360200086.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6086, 4, 'Nho đen Mỹ không hạt hộp 450g (1 Hộp)', 'nho-den-my-khong-hat-hop-450g-1-hop', NULL, NULL, NULL, 159000.00, NULL, 'products/657446-8935360200116.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6087, 4, 'Bơ Booth (1KG)', 'bo-booth-1kg', NULL, NULL, NULL, 65000.00, NULL, 'products/631869-515216-bo-booth.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6088, 4, 'Combo 2 hộp kiwi vàng chín Zespri 4 quả (2 Hộp)', 'combo-2-hop-kiwi-vang-chin-zespri-4-qua-2-hop', NULL, NULL, NULL, 12000.00, NULL, 'products/632120-10610_1.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6089, 4, 'Combo lê đường Hà Giang + hồng giòn chín nên (1 Combo)', 'combo-le-duong-ha-giang-hong-gion-chin-nen-1-combo', NULL, NULL, NULL, 144000.00, NULL, 'products/OL1757315819361-b19.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6090, 4, 'Combo hồng táo tàu + lựu ruby (1 Combo)', 'combo-hong-tao-tau-luu-ruby-1-combo', NULL, NULL, NULL, 238000.00, NULL, 'products/OL1757316069688-b19.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6091, 4, 'Set trái cây chấm: ổi Đài Loan 1KG + mận An Phước 1KG + xoài giống Úc 1KG (1 Combo)', 'set-trai-cay-cham-oi-dai-loan-1kg-man-an-phuoc-1kg-xoai-giong-uc-1kg-1-combo', NULL, NULL, NULL, 163000.00, NULL, 'products/625731-OL1749199701692_1.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6092, 4, 'Combo nho xanh Mỹ không hạt + kiwi vàng chín Zespri (1 Combo)', 'combo-nho-xanh-my-khong-hat-kiwi-vang-chin-zespri-1-combo', NULL, NULL, NULL, 308000.00, NULL, 'products/OL1757644825472.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6093, 4, 'Combo chuối Nam Mỹ + dưa hấu ruột đỏ Long An (1 Combo)', 'combo-chuoi-nam-my-dua-hau-ruot-do-long-an-1-combo', NULL, NULL, NULL, 96650.00, NULL, 'products/633255-OL1747648545705.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6094, 4, 'Combo lê Hàn Quốc + kiwi vàng chín Zespri (1Combo)', 'combo-le-han-quoc-kiwi-vang-chin-zespri-1combo', NULL, NULL, NULL, 298000.00, NULL, 'products/OL1757644825473.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6095, 4, 'Combo dừa xiêm túi 3 trái (1 Túi)', 'combo-dua-xiem-tui-3-trai-1-tui', NULL, NULL, NULL, 27000.00, NULL, 'products/609510-Group_394.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6096, 4, 'Combo salad bơ béo ngậy (1 Combo)', 'combo-salad-bo-beo-ngay-1-combo', NULL, NULL, NULL, 85450.00, NULL, 'products/OL1757644825475.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6097, 4, 'Hộp kiwi vàng chín Zespri 4 quả (1 Hộp)', 'hop-kiwi-vang-chin-zespri-4-qua-1-hop', NULL, NULL, NULL, 139000.00, NULL, 'products/632119-10610.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6098, 4, 'Combo 1KG bơ booth + 1KG chuối Nam Mỹ (1 Combo)', 'combo-1kg-bo-booth-1kg-chuoi-nam-my-1-combo', NULL, NULL, NULL, 97900.00, NULL, 'products/631889-OL1747385777382.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6099, 4, 'Combo lê đường + dưa hấu (1 combo)', 'combo-le-duong-dua-hau-1-combo', NULL, NULL, NULL, 138750.00, NULL, 'products/OL1757644825481.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6100, 4, 'Combo Quýt Úc & kiwi vàng chín (1 Combo)', 'combo-quyt-uc-kiwi-vang-chin-1-combo', NULL, NULL, NULL, 278000.00, NULL, 'products/626959-OL1751338188408.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6101, 4, 'Combo táo braeburn + kiwi vàng chín Zespri (1 Combo)', 'combo-tao-braeburn-kiwi-vang-chin-zespri-1-combo', NULL, NULL, NULL, 288000.00, NULL, 'products/OL1757644825474.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6102, 4, 'Túi Táo Envy size 90-100 (1 Kg)', 'tui-tao-envy-size-90-100-1-kg', NULL, NULL, NULL, 259000.00, NULL, 'products/75-97090.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6103, 4, 'Thanh long ruột trắng trái 450g (1 Trái)', 'thanh-long-ruot-trang-trai-450g-1-trai', NULL, NULL, NULL, 17100.00, NULL, 'products/287-99777.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6104, 4, 'Combo salad lựu & táo & cải kale giòn ngọt (1 Combo)', 'combo-salad-luu-tao-cai-kale-gion-ngot-1-combo', NULL, NULL, NULL, 161468.00, NULL, 'products/OL1757644825476.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6105, 4, 'Combo lê đường hầm táo đỏ (1 combo)', 'combo-le-duong-ham-tao-do-1-combo', NULL, NULL, NULL, 101500.00, NULL, 'products/OL1757644825480.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6106, 4, 'Táo Mỹ & Nam Phi túi 3kg (1 Túi)', 'tao-my-nam-phi-tui-3kg-1-tui', NULL, NULL, NULL, 199000.00, NULL, 'products/609064-Group_136.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6107, 4, 'Combo chuối Nam Mỹ + sữa uống lên men Yakult không đường (1 Combo)', 'combo-chuoi-nam-my-sua-uong-len-men-yakult-khong-duong-1-combo', NULL, NULL, NULL, 59800.00, NULL, 'products/633254-OL1750213824166.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6108, 4, 'Xoài tứ quý (1KG)', 'xoai-tu-quy-1kg', NULL, NULL, NULL, 49000.00, NULL, 'products/18556-377408.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6109, 4, 'Thơm trái cắt sẵn ly 350g (1 Ly)', 'thom-trai-cat-san-ly-350g-1-ly', NULL, NULL, NULL, 39000.00, NULL, 'products/624902-11122_THOM_TRAI_CAT_SAN_350G.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6110, 4, 'Combo sữa Yakult + Chuối Nam Mỹ (1 combo)', 'combo-sua-yakult-chuoi-nam-my-1-combo', NULL, NULL, NULL, 58800.00, NULL, 'products/620356-OL1741366348668.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6111, 4, 'Táo New Zealand Envy size 24-30 (1kg)', 'tao-new-zealand-envy-size-24-30-1kg', NULL, NULL, NULL, 299000.00, NULL, 'products/132-94091.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6112, 4, 'Kiwi Zespri xanh chín hộp 4 quả (1 Hộp)', 'kiwi-zespri-xanh-chin-hop-4-qua-1-hop', NULL, NULL, NULL, 99000.00, NULL, 'products/629359-11034.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6113, 4, 'Combo 1KG ổi Đài Loan + 1KG mận An Phước (1 Combo)', 'combo-1kg-oi-dai-loan-1kg-man-an-phuoc-1-combo', NULL, NULL, NULL, 98000.00, NULL, 'products/627574-Copy_of_Copy_of_template_2.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6114, 4, 'Táo Nam Phi Red Fuji size 90-110 (1kg)', 'tao-nam-phi-red-fuji-size-90-110-1kg', NULL, NULL, NULL, 89000.00, NULL, 'products/609049-Group_91.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6115, 4, 'Táo New Zealand Diva size 90-110 (1kg)', 'tao-new-zealand-diva-size-90-110-1kg', NULL, NULL, NULL, 89000.00, NULL, 'products/633369-Group_73.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6116, 4, 'Combo sữa chua Hy Lạp + blueberry (1 Combo)', 'combo-sua-chua-hy-lap-blueberry-1-combo', NULL, NULL, NULL, 278000.00, NULL, 'products/629938-OL1754382669629.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6117, 4, 'Ổi nữ hoàng', 'oi-nu-hoang', NULL, NULL, NULL, 33000.00, NULL, 'products/289-101639.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6118, 4, 'Táo Queen New Zealand size 80-90 (1Kg)', 'tao-queen-new-zealand-size-80-90-1kg', NULL, NULL, NULL, 109000.00, NULL, 'products/1100609.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6119, 4, 'Hồng táo hộp 500g (1 Hộp)', 'hong-tao-hop-500g-1-hop', NULL, NULL, NULL, 109000.00, NULL, 'products/657354-10606_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6120, 4, 'Set trái cây miền tây: dưa hấu + dưa lưới ruột đỏ + mít giống thái', 'set-trai-cay-mien-tay-dua-hau-dua-luoi-ruot-do-mit-giong-thai', NULL, NULL, NULL, 187450.00, NULL, 'products/625849-OL1749694277320.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6121, 4, 'Combo blueberry Mỹ + kiwi vàng chín (1 Combo)', 'combo-blueberry-my-kiwi-vang-chin-1-combo', NULL, NULL, NULL, 258000.00, NULL, 'products/627576-OL1748594254743_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6122, 5, 'Hạt sen tươi gói 200g (1 Gói)', 'hat-sen-tuoi-goi-200g-1-goi', NULL, NULL, NULL, 69000.00, NULL, 'products/609561-8938505512013.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6123, 5, 'Lẩu nấm hỗn hợp Nấm Xanh vỉ 300g (1 Vỉ)', 'lau-nam-hon-hop-nam-xanh-vi-300g-1-vi', NULL, NULL, NULL, 35900.00, NULL, 'products/608338-8936210960983.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6124, 5, 'Nấm hỗn hợp Hàn Quốc hộp 300g (1 Hộp)', 'nam-hon-hop-han-quoc-hop-300g-1-hop', NULL, NULL, NULL, 59000.00, NULL, 'products/411491-378985.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6125, 5, 'Rong nho tươi Green Food hộp 100g (1 Hộp)', 'rong-nho-tuoi-green-food-hop-100g-1-hop', NULL, NULL, NULL, 29500.00, NULL, 'products/618592-8938530363031.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6126, 5, 'Rong nho tươi Hải Nam hộp 100g (1 Hộp)', 'rong-nho-tuoi-hai-nam-hop-100g-1-hop', NULL, NULL, NULL, 29500.00, NULL, 'products/8936082060019.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6127, 5, 'Combo Món Xào: Diềm Thăn Bò & Bông Cải Xanh', 'combo-mon-xao-diem-than-bo-bong-cai-xanh', NULL, NULL, NULL, 110568.00, NULL, 'products/664404-OL1745380003076-b19.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6128, 5, 'Combo rau củ 5 loại: bông cải xanh, cải thìa, cà chua, đậu cove, bắp cải trái tim', 'combo-rau-cu-5-loai-bong-cai-xanh-cai-thia-ca-chua-dau-cove-bap-cai-trai-tim', NULL, NULL, NULL, 98218.00, NULL, 'products/OL1757385936026-b19.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6129, 5, 'Combo 2 gói xà lách thuỷ tinh thuỷ canh 200gr (2 Gói)', 'combo-2-goi-xa-lach-thuy-tinh-thuy-canh-200gr-2-goi', NULL, NULL, NULL, 33000.00, NULL, 'products/664405-10356-pCmCuStOm-238650366772642110-b19.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6130, 5, 'Xà lách mỡ thuỷ canh gói 200g (1 Gói)', 'xa-lach-mo-thuy-canh-goi-200g-1-goi', NULL, NULL, NULL, 32000.00, NULL, 'products/713-101634.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6131, 5, 'Set nguyên liệu sandwich: phô mai mozzarella + cà chua + xà lách (1 Combo)', 'set-nguyen-lieu-sandwich-pho-mai-mozzarella-ca-chua-xa-lach-1-combo', NULL, NULL, NULL, 130900.00, NULL, 'products/626114-OL1750213824150.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6132, 5, 'Cá trứng chiên giòn chấm mắm me', 'ca-trung-chien-gion-cham-mam-me', NULL, NULL, NULL, 61900.00, NULL, 'products/OL1754060527907.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6133, 5, 'Combo canh Cải ngọt thịt bằm', 'combo-canh-cai-ngot-thit-bam', NULL, NULL, NULL, 66300.00, NULL, 'products/OL1740543463809.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6134, 5, 'Đậu cove vỉ 250g (1 Vỉ)', 'dau-cove-vi-250g-1-vi', NULL, NULL, NULL, 15900.00, NULL, 'products/664384-10836.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6135, 5, 'Cà chua size nhỏ túi 500g (1 Túi)', 'ca-chua-size-nho-tui-500g-1-tui', NULL, NULL, NULL, 18900.00, NULL, 'products/664402-10911.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6136, 5, 'Xà lách thuỷ tinh thuỷ canh gói 200g (1 Gói)', 'xa-lach-thuy-tinh-thuy-canh-goi-200g-1-goi', NULL, NULL, NULL, 16500.00, NULL, 'products/628923-10356.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6137, 5, 'Combo Cà Ri - Khoai lang giống Nhật xuất khẩu 500g & Cà rốt Đà Lạt Vietgap 300g', 'combo-ca-ri-khoai-lang-giong-nhat-xuat-khau-500g-ca-rot-da-lat-vietgap-300g', NULL, NULL, NULL, 43000.00, NULL, 'products/OL1742893746029.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6138, 5, 'Cà chua ngọc bích GlobalGAP vỉ 250g (1 Vỉ)', 'ca-chua-ngoc-bich-globalgap-vi-250g-1-vi', NULL, NULL, NULL, 27500.00, NULL, 'products/11298.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6139, 5, 'Cà chua beef VietGAP Đà Lạt (1 kg)', 'ca-chua-beef-vietgap-da-lat-1-kg', NULL, NULL, NULL, 41900.00, NULL, 'products/17893-97995.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6140, 5, 'Combo Ba chỉ bò Canada Savora 250g & Nấm Kim Châm VN Hữu Cơ 150g', 'combo-ba-chi-bo-canada-savora-250g-nam-kim-cham-vn-huu-co-150g', NULL, NULL, NULL, 109900.00, NULL, 'products/632751-OL1747389968452.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6141, 5, 'Combo rau củ 3 ngày: cải bó xôi, cải ngọt, mồng tơi, rau muống, rau dền, bí đỏ', 'combo-rau-cu-3-ngay-cai-bo-xoi-cai-ngot-mong-toi-rau-muong-rau-den-bi-do', NULL, NULL, NULL, 108350.00, NULL, 'products/628859-deal_-_linh_66.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6142, 5, 'Combo đậu hà lan xào thịt bò', 'combo-dau-ha-lan-xao-thit-bo', NULL, NULL, NULL, 137400.00, NULL, 'products/657396-OL1752475623330_7.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6143, 5, 'Combo Cải thìa & Bông cải xanh Đà Lạt', 'combo-cai-thia-bong-cai-xanh-da-lat', NULL, NULL, NULL, 41468.00, NULL, 'products/OL1744172500298.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6144, 5, 'Combo Canh Mồng Tơi Tôm Ngọt Nước', 'combo-canh-mong-toi-tom-ngot-nuoc', NULL, NULL, NULL, 58900.00, NULL, 'products/632612-OL1744876467523.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6145, 5, 'Combo Bông Cải Xanh Đà Lạt Vietgap 320g & Tôm Nõn 200g', 'combo-bong-cai-xanh-da-lat-vietgap-320g-tom-non-200g', NULL, NULL, NULL, 110568.00, NULL, 'products/OL1748837528453.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6146, 5, 'Combo cá hồi Nauy phi lê 200g & Cà rốt baby Global Gap 200g', 'combo-ca-hoi-nauy-phi-le-200g-ca-rot-baby-global-gap-200g', NULL, NULL, NULL, 178000.00, NULL, 'products/629173-2.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6147, 5, 'Combo cà rốt, củ dền, đậu bắp', 'combo-ca-rot-cu-den-dau-bap', NULL, NULL, NULL, 54500.00, NULL, 'products/OL1750242330931.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6148, 5, 'Combo Ớt chuông xanh, đỏ Đà Lạt Vietgap 400G & Hành tây Đà Lạt cỡ vừa gói 500g', 'combo-ot-chuong-xanh-do-da-lat-vietgap-400g-hanh-tay-da-lat-co-vua-goi-500g', NULL, NULL, NULL, 51900.00, NULL, 'products/626872-1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6149, 5, 'Combo Cần tàu Trường Phát gói 100g & Hành tây Đà Lạt 500g', 'combo-can-tau-truong-phat-goi-100g-hanh-tay-da-lat-500g', NULL, NULL, NULL, 29800.00, NULL, 'products/626880-deal_-_linh_44.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6150, 5, 'Bắp cải trắng Đà Lạt VietGap bắp từ 1.3kg (1 Bắp)', 'bap-cai-trang-da-lat-vietgap-bap-tu-1-3kg-1-bap', NULL, NULL, NULL, 24050.00, NULL, 'products/609560-1101374_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6151, 5, 'Combo cà rốt, đậu hà lan, rau lang, bắp Mỹ', 'combo-ca-rot-dau-ha-lan-rau-lang-bap-my', NULL, NULL, NULL, 106400.00, NULL, 'products/OL1750242330929.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6152, 5, 'Combo rau bún cuốn tiện lợi', 'combo-rau-bun-cuon-tien-loi', NULL, NULL, NULL, 79400.00, NULL, 'products/628874-deal_-_linh_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6153, 5, 'Combo Nguyên Liệu Nước Ép Cam & Cà Rốt', 'combo-nguyen-lieu-nuoc-ep-cam-ca-rot', NULL, NULL, NULL, 39000.00, NULL, 'products/OL1747110582160.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6154, 5, 'Combo cải kale, bí đỏ, đậu hà lan', 'combo-cai-kale-bi-do-dau-ha-lan', NULL, NULL, NULL, 91450.00, NULL, 'products/OL1750242330930.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6155, 5, 'Combo Bông Cải Xanh Đà Lạt Vietgap 320g & Ớt chuông đỏ Đà Lạt VietGAP 200g (1 Quả)', 'combo-bong-cai-xanh-da-lat-vietgap-320g-ot-chuong-do-da-lat-vietgap-200g-1-qua', NULL, NULL, NULL, 43068.00, NULL, 'products/OL1749703203382.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6156, 5, 'Combo diềm thăn bò 250g & Măng tây xanh nhỏ 200g', 'combo-diem-than-bo-250g-mang-tay-xanh-nho-200g', NULL, NULL, NULL, 117900.00, NULL, 'products/632632-OL1744876467524.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6157, 5, 'Combo Diềm Thăn Bò Cắt Xào Khay 250g & Hành Tây Vàng New Zealand 400g', 'combo-diem-than-bo-cat-xao-khay-250g-hanh-tay-vang-new-zealand-400g', NULL, NULL, NULL, 102900.00, NULL, 'products/OL1747389968450.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6158, 5, 'Combo 250g thịt bò và 300g cải bó xôi', 'combo-250g-thit-bo-va-300g-cai-bo-xoi', NULL, NULL, NULL, 130400.00, NULL, 'products/657391-OL1752475623330_6.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6159, 5, 'Combo cá hồi Nauy phi lê 200g & Măng tây xanh nhỏ 250g', 'combo-ca-hoi-nauy-phi-le-200g-mang-tay-xanh-nho-250g', NULL, NULL, NULL, 182900.00, NULL, 'products/629172-1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6160, 5, 'Combo rau ngót, bí đỏ, bắp non', 'combo-rau-ngot-bi-do-bap-non', NULL, NULL, NULL, 51050.00, NULL, 'products/OL1750242330933.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6161, 5, 'Combo Món Xào: Trứng Gà Non & Đậu Cove', 'combo-mon-xao-trung-ga-non-dau-cove', NULL, NULL, NULL, 84900.00, NULL, 'products/632668-OL1747110582167.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6162, 5, 'Combo Măng tây xanh VietGap loại 1 gói 250g & Nấm đùi gà hữu cơ Bắc Âu gói 250g', 'combo-mang-tay-xanh-vietgap-loai-1-goi-250g-nam-dui-ga-huu-co-bac-au-goi-250g', NULL, NULL, NULL, 76900.00, NULL, 'products/626874-3.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6163, 5, 'Combo nghêu rim sả ớt', 'combo-ngheu-rim-sa-ot', NULL, NULL, NULL, 38800.00, NULL, 'products/632710-OL1752651899076.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6164, 5, 'Combo canh rong biển thịt băm', 'combo-canh-rong-bien-thit-bam', NULL, NULL, NULL, 63400.00, NULL, 'products/632620-OL1752651899079.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6165, 5, 'Combo canh rong biển tôm', 'combo-canh-rong-bien-tom', NULL, NULL, NULL, 79400.00, NULL, 'products/632621-OL1752651899080.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6166, 5, 'Hạt sen tươi An Lạc gói 200g (1 Gói)', 'hat-sen-tuoi-an-lac-goi-200g-1-goi', NULL, NULL, NULL, 69000.00, NULL, 'products/409311-8936204030371.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6167, 5, 'Combo gà ác tiềm sâm dây Ngọc Linh', 'combo-ga-ac-tiem-sam-day-ngoc-linh', NULL, NULL, NULL, 168800.00, NULL, 'products/657400-OL1752475623330_9.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6168, 6, 'Tôm thẻ lớn 30-40 con/kg (1 Kg)', 'tom-the-lon-30-40-con-kg-1-kg', NULL, NULL, NULL, 289000.00, NULL, 'products/15501-369133.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6169, 6, 'Tôm sú 20-25con/kg Alo Fish khay 200g (1 Khay)', 'tom-su-20-25con-kg-alo-fish-khay-200g-1-khay', NULL, NULL, NULL, 95000.00, NULL, 'products/8938558530231.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6170, 6, 'Cá chim trắng làm sạch (1 kg)', 'ca-chim-trang-lam-sach-1-kg', NULL, NULL, NULL, 279000.00, NULL, 'products/471878-1100890.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6171, 6, 'Cá bớp cắt khúc rã đông Kingfish (1 Khay)', 'ca-bop-cat-khuc-ra-dong-kingfish-1-khay', NULL, NULL, NULL, 419000.00, NULL, 'products/1102865.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6172, 6, 'Mực ghim rã đông Kingfish khay 300g (1 Khay)', 'muc-ghim-ra-dong-kingfish-khay-300g-1-khay', NULL, NULL, NULL, 109000.00, NULL, 'products/8938545946816.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6173, 6, 'Bạch tuộc nguyên con 15-20 con/kg 250g (1 vỉ)', 'bach-tuoc-nguyen-con-15-20-con-kg-250g-1-vi', NULL, NULL, NULL, 57000.00, NULL, 'products/526190-381120.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6174, 6, 'Cá dìa nguyên con làm sạch 350g (1 gói)', 'ca-dia-nguyen-con-lam-sach-350g-1-goi', NULL, NULL, NULL, 99000.00, NULL, 'products/626084-10933_2.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6175, 6, 'Cá trứng Canada Denti vỉ 400g (1 Vỉ)', 'ca-trung-canada-denti-vi-400g-1-vi', NULL, NULL, NULL, 85000.00, NULL, 'products/468107-377486.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6176, 6, 'Tôm khô nấu canh VS Hồn Việt hũ 50g (1 Hũ)', 'tom-kho-nau-canh-vs-hon-viet-hu-50g-1-hu', NULL, NULL, NULL, 44000.00, NULL, 'products/19992-378862.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6177, 6, 'Chả cá ba sa chiên Thoại An gói 300g', 'cha-ca-ba-sa-chien-thoai-an-goi-300g', NULL, NULL, NULL, 46000.00, NULL, 'products/8938500425431-x7k-b19.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6178, 6, 'Khô mực nhỏ Hồng Hương gói 200g (1 Gói)', 'kho-muc-nho-hong-huong-goi-200g-1-goi', NULL, NULL, NULL, 209000.00, NULL, 'products/19694-378891.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6179, 6, 'Combo viên thả lẩu Nhất Tâm gói 300g (1 Gói)', 'combo-vien-tha-lau-nhat-tam-goi-300g-1-goi', NULL, NULL, NULL, 27500.00, NULL, 'products/346051-380208.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6180, 6, 'Hàu sữa Thái Bình Dương Hasubi gói 300g (1 Gói)', 'hau-sua-thai-binh-duong-hasubi-goi-300g-1-goi', NULL, NULL, NULL, 83000.00, NULL, 'products/15043-377673.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6181, 6, 'Mực ống nguyên con làm sạch loại A 10-12cm Hải Nam khay 500g (1 Khay)', 'muc-ong-nguyen-con-lam-sach-loai-a-10-12cm-hai-nam-khay-500g-1-khay', NULL, NULL, NULL, 175000.00, NULL, 'products/13713-95528.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6182, 6, 'Mực trứng Phú Quý Đại Nam gói 450g', 'muc-trung-phu-quy-dai-nam-goi-450g', NULL, NULL, NULL, 157000.00, NULL, 'products/537-371003.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6183, 6, 'Ba chỉ heo Nga BBQ Freshfoco khay 300g (2 Khay)', 'ba-chi-heo-nga-bbq-freshfoco-khay-300g-2-khay', NULL, NULL, NULL, 158000.00, NULL, 'products/657350-deal_-_linh_8.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6184, 6, 'Combo đùi lá cờ bò 250g và thịt heo xay 250g', 'combo-dui-la-co-bo-250g-va-thit-heo-xay-250g', NULL, NULL, NULL, 479000.00, NULL, 'products/657351-deal_-_linh_10.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6185, 6, 'Trứng gà nướng Tafa 6 quả (1 hộp)', 'trung-ga-nuong-tafa-6-qua-1-hop', NULL, NULL, NULL, 55000.00, NULL, 'products/8938513029084.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6186, 6, 'Cá hồi Nauy phi lê (1KG)', 'ca-hoi-nauy-phi-le-1kg', NULL, NULL, NULL, 750000.00, NULL, 'products/471885-1100726.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6187, 6, 'Combo cá trứng chiên', 'combo-ca-trung-chien', NULL, NULL, NULL, 53500.00, NULL, 'products/632628-OL1740543463884.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6188, 6, 'Cá hồi Faroe phi lê (1KG)', 'ca-hoi-faroe-phi-le-1kg', NULL, NULL, NULL, 679000.00, NULL, 'products/284591-380318.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6189, 6, 'Cá bớp cắt khoanh Hue Specialty vỉ 350g (1 Vỉ)', 'ca-bop-cat-khoanh-hue-specialty-vi-350g-1-vi', NULL, NULL, NULL, 149000.00, NULL, 'products/11069.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6190, 6, 'Combo bánh mì YAMAZAKI + trứng QL omega & DHA 60g (1 Combo)', 'combo-banh-mi-yamazaki-trung-ql-omega-dha-60g-1-combo', NULL, NULL, NULL, 82500.00, NULL, 'products/OL1755657993002.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6191, 6, 'Thịt heo xay (300G)', 'thit-heo-xay-300g', NULL, NULL, NULL, 40500.00, NULL, 'products/664378-863-99475.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6192, 6, 'Thịt heo xay (500G)', 'thit-heo-xay-500g', NULL, NULL, NULL, 67500.00, NULL, 'products/664457-1101171.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6193, 6, 'Thịt heo xay (1 Kg)', 'thit-heo-xay-1-kg', NULL, NULL, NULL, 135000.00, NULL, 'products/863-99475.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6194, 6, 'Tôm lột vỉ 200g (1 Vỉ)', 'tom-lot-vi-200g-1-vi', NULL, NULL, NULL, 85000.00, NULL, 'products/664463-10487.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6195, 6, 'Combo Sốt Spaghetti 340g & Thịt bò xay 200g', 'combo-sot-spaghetti-340g-thit-bo-xay-200g', NULL, NULL, NULL, 114900.00, NULL, 'products/OL1752376782884.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6196, 6, 'Cá hồi Faroe phi lê (250g)', 'ca-hoi-faroe-phi-le-250g', NULL, NULL, NULL, 169750.00, NULL, 'products/624900-8938515083152_2.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6197, 6, 'Combo 2 gói cá hồi Faroe phi lê (250g)', 'combo-2-goi-ca-hoi-faroe-phi-le-250g', NULL, NULL, NULL, 339500.00, NULL, 'products/631293-deal_-_linh_15.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6198, 6, 'Cá bống thệ HS 200g (1 gói)', 'ca-bong-the-hs-200g-1-goi', NULL, NULL, NULL, 85000.00, NULL, 'products/411441-380660.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6199, 6, 'Cá hồi cắt lát đông lạnh Ocean 200g (1 Gói)', 'ca-hoi-cat-lat-dong-lanh-ocean-200g-1-goi', NULL, NULL, NULL, 135000.00, NULL, 'products/468113-366570.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6200, 6, 'Ba chỉ bò Canada Hotpot Vimex khay 450g (1 khay)', 'ba-chi-bo-canada-hotpot-vimex-khay-450g-1-khay', NULL, NULL, NULL, 169000.00, NULL, 'products/386163-8938552014171.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6201, 6, 'Set thịt bò Mỹ (thịt cổ bò & ba chỉ bò) MVP khay 500g (1 Khay)', 'set-thit-bo-my-thit-co-bo-ba-chi-bo-mvp-khay-500g-1-khay', NULL, NULL, NULL, 244000.00, NULL, 'products/18480-378659.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6202, 6, 'Bò Úc và khoai tây steak at home Freshfoco 400g (1 khay)', 'bo-uc-va-khoai-tay-steak-at-home-freshfoco-400g-1-khay', NULL, NULL, NULL, 169000.00, NULL, 'products/396644-380803.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6203, 6, 'Lõi vai bò Canada lúc lắc (AAA) Vimex khay 200g (1 khay)', 'loi-vai-bo-canada-luc-lac-aaa-vimex-khay-200g-1-khay', NULL, NULL, NULL, 109000.00, NULL, 'products/386160-8938552014218.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6204, 6, 'Ba chỉ bò Canada Hotpot Vimex khay 250g (1 khay)', 'ba-chi-bo-canada-hotpot-vimex-khay-250g-1-khay', NULL, NULL, NULL, 95000.00, NULL, 'products/8938552014164.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6205, 6, 'Ba chỉ bò Canada BBQ Vimex khay 250g (1 khay)', 'ba-chi-bo-canada-bbq-vimex-khay-250g-1-khay', NULL, NULL, NULL, 95000.00, NULL, 'products/386156-8938552014188.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6206, 6, 'Combo canh khổ qua cá thát lát', 'combo-canh-kho-qua-ca-that-lat', NULL, NULL, NULL, 97500.00, NULL, 'products/OL1740543463814.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6207, 6, 'Combo Cánh giữa gà 600g và Xốt gà nướng mật ong Dh Foods', 'combo-canh-giua-ga-600g-va-xot-ga-nuong-mat-ong-dh-foods', NULL, NULL, NULL, 112100.00, NULL, 'products/632597-OL1752475623330_2.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6208, 6, 'Cánh tỏi (1 Kg)', 'canh-toi-1-kg', NULL, NULL, NULL, 109000.00, NULL, 'products/4903-101326.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6209, 6, 'Combo 600g má đùi và hành tỏi', 'combo-600g-ma-dui-va-hanh-toi', NULL, NULL, NULL, 91600.00, NULL, 'products/OL1740543463830.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6210, 6, 'COMBO 2 GÓI OCEAN GIFT - CÁ HỒI CẮT LÁT ĐÔNG LẠNH 200G', 'combo-2-goi-ocean-gift-ca-hoi-cat-lat-dong-lanh-200g', NULL, NULL, NULL, 270000.00, NULL, 'products/620653-8935275600223_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6211, 6, 'Tôm khô thiên nhiên nấu canh size L VS hũ 200g (1 Hũ)', 'tom-kho-thien-nhien-nau-canh-size-l-vs-hu-200g-1-hu', NULL, NULL, NULL, 165000.00, NULL, 'products/535-97213.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6212, 6, 'Khô mực loại 1 Hương Biển 300g (1 Gói)', 'kho-muc-loai-1-huong-bien-300g-1-goi', NULL, NULL, NULL, 210000.00, NULL, 'products/529-95744.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6213, 6, 'Tôm khô Song Phương túi 100g (1 Túi)', 'tom-kho-song-phuong-tui-100g-1-tui', NULL, NULL, NULL, 350000.00, NULL, 'products/13718-377048.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6214, 7, 'Kem Mochi vani Aice 45ml (1 Cái)', 'kem-mochi-vani-aice-45ml-1-cai', NULL, NULL, NULL, 128000.00, NULL, 'products/8885013130201.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6215, 7, 'Sữa chua uống Green Farm Vinamilk hộp 200ml (1 Hộp)', 'sua-chua-uong-green-farm-vinamilk-hop-200ml-1-hop', NULL, NULL, NULL, 53000.00, NULL, 'products/8934673300964.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6216, 7, 'Kem bánh oreo sandwich Nestle gói 60g', 'kem-banh-oreo-sandwich-nestle-goi-60g', NULL, NULL, NULL, 131000.00, NULL, 'products/8850125097773.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6217, 7, 'Kem dâu tây Haagen Dazs 473ml (1 hộp)', 'kem-dau-tay-haagen-dazs-473ml-1-hop', NULL, NULL, NULL, 65000.00, NULL, 'products/401675-370747.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6218, 7, 'Kem hộp bánh quy Oreo Nestle 240g (1 hộp)', 'kem-hop-banh-quy-oreo-nestle-240g-1-hop', NULL, NULL, NULL, 56000.00, NULL, 'products/403721-379076.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6219, 7, 'Sữa chua uống Green Farm Vinamilk Hương Vải Hoa Nhài hộp 200ml (1 Hộp)', 'sua-chua-uong-green-farm-vinamilk-huong-vai-hoa-nhai-hop-200ml-1-hop', NULL, NULL, NULL, 185000.00, NULL, 'products/8934673301077.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6220, 7, 'Kem Twin Cows socola Vinamilk 450ml (1 hộp)', 'kem-twin-cows-socola-vinamilk-450ml-1-hop', NULL, NULL, NULL, 115000.00, NULL, 'products/403754-380615.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6221, 7, 'Kem Mochi socola Aice 45ml (1 Cái)', 'kem-mochi-socola-aice-45ml-1-cai', NULL, NULL, NULL, 12000.00, NULL, 'products/8885013130645.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6222, 7, 'Lốc sữa chua uống cam Yomost 170ml (4 Hộp)', 'loc-sua-chua-uong-cam-yomost-170ml-4-hop', NULL, NULL, NULL, 176000.00, NULL, 'products/657442-8934841900286.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6223, 7, 'Kem ốc quế socola Aice 100ml (1 Cây)', 'kem-oc-que-socola-aice-100ml-1-cay', NULL, NULL, NULL, 94000.00, NULL, 'products/8885013131543.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6224, 7, 'Kem milo socola lúa mạch Nestle ly 55g (1 Ly)', 'kem-milo-socola-lua-mach-nestle-ly-55g-1-ly', NULL, NULL, NULL, 28000.00, NULL, 'products/18676-94455.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6225, 7, 'Kem socola giòn Aice 60g (1 Cây)', 'kem-socola-gion-aice-60g-1-cay', NULL, NULL, NULL, 20000.00, NULL, 'products/8885013130058.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6226, 7, 'Kem ốc quế Kitkat Nestle 65g (1 Cây)', 'kem-oc-que-kitkat-nestle-65g-1-cay', NULL, NULL, NULL, 50000.00, NULL, 'products/20501-379744.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6227, 7, 'Lốc sữa chua uống dâu Yomost 170ml (4 Hộp)', 'loc-sua-chua-uong-dau-yomost-170ml-4-hop', NULL, NULL, NULL, 117000.00, NULL, 'products/657443-8934841900293.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6228, 7, 'Kem hạt socola Aice 65ml (1 Cây)', 'kem-hat-socola-aice-65ml-1-cay', NULL, NULL, NULL, 64000.00, NULL, 'products/8885013132687.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6229, 7, 'Lốc sữa chua uống bạc hà & việt quất Yomost hộp 170ml (4 Hộp)', 'loc-sua-chua-uong-bac-ha-viet-quat-yomost-hop-170ml-4-hop', NULL, NULL, NULL, 102000.00, NULL, 'products/657444-8934841901641.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6230, 7, 'Combo thử vị: Sữa chua uống Lothamilk + Đà Lạt Milk', 'combo-thu-vi-sua-chua-uong-lothamilk-da-lat-milk', NULL, NULL, NULL, 67900.00, NULL, 'products/OL1755249081609.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6231, 7, 'Combo 2 hộp sữa chua ăn Green Farm cao đạm mix vị (1 Combo)', 'combo-2-hop-sua-chua-an-green-farm-cao-dam-mix-vi-1-combo', NULL, NULL, NULL, 65800.00, NULL, 'products/625734-OL1749544870585.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6232, 7, 'Lốc sữa chua nha đam Nuti hũ 100g (4 Hộp)', 'loc-sua-chua-nha-dam-nuti-hu-100g-4-hop', NULL, NULL, NULL, 29900.00, NULL, 'products/472008-8935049006480.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6233, 7, 'Lốc sữa chua có đường Nuti hũ 100g (4 Hộp)', 'loc-sua-chua-co-duong-nuti-hu-100g-4-hop', NULL, NULL, NULL, 25900.00, NULL, 'products/627940-8935049005407LOC.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6234, 7, 'Combo sữa chua uống Green Farm Vinamilk hộp 200ml (4 Hộp)', 'combo-sua-chua-uong-green-farm-vinamilk-hop-200ml-4-hop', NULL, NULL, NULL, 79600.00, NULL, 'products/664391-8934673300964-pCmCuStOm-284457915887128069-b19.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6235, 7, 'Combo thử vị: Sữa chua uống Bulgaria + Vinamilk vị trái cây', 'combo-thu-vi-sua-chua-uong-bulgaria-vinamilk-vi-trai-cay', NULL, NULL, NULL, 47800.00, NULL, 'products/OL17552490816101.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6236, 7, 'Sữa chua Hy Lạp nguyên chất Farmers Union hộp 500g', 'sua-chua-hy-lap-nguyen-chat-farmers-union-hop-500g', NULL, NULL, NULL, 159000.00, NULL, 'products/628078-9300658114663.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6237, 7, 'Combo thử vị: Sữa chua uống Bulgaria + Vinamilk vị nguyên bản', 'combo-thu-vi-sua-chua-uong-bulgaria-vinamilk-vi-nguyen-ban', NULL, NULL, NULL, 42800.00, NULL, 'products/OL1755249081610.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6238, 7, 'Lốc sữa chua ăn ít đường NutiMilk 100G (4 Hộp)', 'loc-sua-chua-an-it-duong-nutimilk-100g-4-hop', NULL, NULL, NULL, 25900.00, NULL, 'products/577002-8935049018643LOC.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6239, 7, 'Sữa chua uống men sống Nuti lốc 5 hộp x 65ml', 'sua-chua-uong-men-song-nuti-loc-5-hop-x-65ml', NULL, NULL, NULL, 23900.00, NULL, 'products/627896-8935049007609.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6240, 7, 'Lốc sữa chua uống tiệt trùng hương nho có thạch Lof Malto hộp 170ml (4 Hộp)', 'loc-sua-chua-uong-tiet-trung-huong-nho-co-thach-lof-malto-hop-170ml-4-hop', NULL, NULL, NULL, 33900.00, NULL, 'products/8936025775345LOC.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6241, 7, 'Lốc sữa chua không béo nha đam Morinaga hộp 100g (4 Hộp)', 'loc-sua-chua-khong-beo-nha-dam-morinaga-hop-100g-4-hop', NULL, NULL, NULL, 36900.00, NULL, 'products/537668-381665.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6242, 7, 'Lốc sữa chua không béo đào nha đam Morinaga hộp 100g (4 Hộp)', 'loc-sua-chua-khong-beo-dao-nha-dam-morinaga-hop-100g-4-hop', NULL, NULL, NULL, 36900.00, NULL, 'products/8936009793365.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6243, 7, 'Sữa chua uống thanh trùng có đường Lothamilk chai 500ml (1 Chai)', 'sua-chua-uong-thanh-trung-co-duong-lothamilk-chai-500ml-1-chai', NULL, NULL, NULL, 33000.00, NULL, 'products/8935007147156.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6244, 7, 'Combo sữa thanh trùng Green Farm không đường + sữa chua uống Green Farm (1 Combo)', 'combo-sua-thanh-trung-green-farm-khong-duong-sua-chua-uong-green-farm-1-combo', NULL, NULL, NULL, 129500.00, NULL, 'products/629191-OL1750213824148.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6245, 7, 'Sữa chua uống hương tự nhiên Betagen chai 700ml', 'sua-chua-uong-huong-tu-nhien-betagen-chai-700ml', NULL, NULL, NULL, 43900.00, NULL, 'products/1050-92940.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6246, 7, 'Sữa chua uống hương cam Betagen chai 700ml', 'sua-chua-uong-huong-cam-betagen-chai-700ml', NULL, NULL, NULL, 43900.00, NULL, 'products/1049-101724.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6247, 7, 'Combo sữa hạt: sữa chua ăn yến mạch xoài chanh dây Vinamilk + sữa 9 loại hạt Super Nut Vinamilk (1 Combo)', 'combo-sua-hat-sua-chua-an-yen-mach-xoai-chanh-day-vinamilk-sua-9-loai-hat-super-nut-vinamilk-1-combo', NULL, NULL, NULL, 106800.00, NULL, 'products/OL1750213824162.png', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6248, 7, 'Combo sữa hạt: sữa chua ăn 9 loại hạt Vinamilk + sữa 9 loại hạt Super Nut Vinamilk (1 Combo)', 'combo-sua-hat-sua-chua-an-9-loai-hat-vinamilk-sua-9-loai-hat-super-nut-vinamilk-1-combo', NULL, NULL, NULL, 106800.00, NULL, 'products/OL1750213824161.png', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6249, 7, 'Set sữa probi Vinamilk 5 vị (1 Combo)', 'set-sua-probi-vinamilk-5-vi-1-combo', NULL, NULL, NULL, 124500.00, NULL, 'products/626116-OL1750213824153.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6250, 7, 'Set sữa probi Vinamilk 3 vị (1 Combo)', 'set-sua-probi-vinamilk-3-vi-1-combo', NULL, NULL, NULL, 74700.00, NULL, 'products/626115-OL1750213824152.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6251, 7, 'Lốc sữa chua ăn trân châu đường đen Vinamilk hộp 100g (4 Hộp)', 'loc-sua-chua-an-tran-chau-duong-den-vinamilk-hop-100g-4-hop', NULL, NULL, NULL, 38900.00, NULL, 'products/627951-8934673500432LOC.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6252, 7, 'COMBO 2 BETAGEN - SỮA CHUA UỐNG HƯƠNG TỰ NHIÊN 700ML', 'combo-2-betagen-sua-chua-uong-huong-tu-nhien-700ml', NULL, NULL, NULL, 87800.00, NULL, 'products/619180-COMBO_2_7.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6253, 7, 'Thùng sữa chua uống tiệt trùng hương nho có thạch Lof Malto hộp 170ml (48 Hộp)', 'thung-sua-chua-uong-tiet-trung-huong-nho-co-thach-lof-malto-hop-170ml-48-hop', NULL, NULL, NULL, 379000.00, NULL, 'products/626938-19415522002520_4.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6254, 7, 'Sữa chua uống Probi hương dưa gang Vinamilk lốc 5 chai x 65ml', 'sua-chua-uong-probi-huong-dua-gang-vinamilk-loc-5-chai-x-65ml', NULL, NULL, NULL, 24900.00, NULL, 'products/618124-Group_409.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6255, 7, 'Sữa chua uống Probi đường Vinamlik lốc 5 chai x 65ml', 'sua-chua-uong-probi-duong-vinamlik-loc-5-chai-x-65ml', NULL, NULL, NULL, 24900.00, NULL, 'products/618115-Group_400.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6256, 7, 'Sữa chua uống Probi hương dâu Vinamlk lốc 5 chai x 65ml', 'sua-chua-uong-probi-huong-dau-vinamlk-loc-5-chai-x-65ml', NULL, NULL, NULL, 24900.00, NULL, 'products/618118-Group_403.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6257, 7, 'Sữa chua ăn Green Farm cao đạm mật ong tự nhiên ngũ cốc Vinamilk hộp 123g (1 Hộp)', 'sua-chua-an-green-farm-cao-dam-mat-ong-tu-nhien-ngu-coc-vinamilk-hop-123g-1-hop', NULL, NULL, NULL, 32900.00, NULL, 'products/8934673501033.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6258, 7, 'Sữa chua ăn Green Farm cao đạm cà phê tự nhiên ngũ cốc Vinamilk hộp 123g (1 Hộp)', 'sua-chua-an-green-farm-cao-dam-ca-phe-tu-nhien-ngu-coc-vinamilk-hop-123g-1-hop', NULL, NULL, NULL, 32900.00, NULL, 'products/8934673501040.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6259, 7, 'Sữa chua uống probi hương việt quất Vinamilk lốc 5 chai x 65ml', 'sua-chua-uong-probi-huong-viet-quat-vinamilk-loc-5-chai-x-65ml', NULL, NULL, NULL, 24900.00, NULL, 'products/627958-8934673320566.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6260, 7, 'Lốc sữa chua ăn ít đường Vinamilk hộp 100g (4 hộp)', 'loc-sua-chua-an-it-duong-vinamilk-hop-100g-4-hop', NULL, NULL, NULL, 26900.00, NULL, 'products/627943-8934673613828LOC.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6261, 7, 'Lốc sữa chua ăn không đường Vinamilk hộp 100g (4 Hộp)', 'loc-sua-chua-an-khong-duong-vinamilk-hop-100g-4-hop', NULL, NULL, NULL, 26900.00, NULL, 'products/627946-8934673605823LOC.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6262, 7, 'Lốc sữa chua ăn nha đam rất ít đường Vinamilk hộp 100g (4 Hộp)', 'loc-sua-chua-an-nha-dam-rat-it-duong-vinamilk-hop-100g-4-hop', NULL, NULL, NULL, 34900.00, NULL, 'products/627949-8934673500784LOC.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6263, 7, 'Lốc sữa chua uống dâu có thạch Nutimilk hộp 170ml (4 Hộp)', 'loc-sua-chua-uong-dau-co-thach-nutimilk-hop-170ml-4-hop', NULL, NULL, NULL, 34900.00, NULL, 'products/560823-381685.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6264, 7, 'Lốc sữa chua ăn có đường Vinamilk hộp 100g (4 Hộp)', 'loc-sua-chua-an-co-duong-vinamilk-hop-100g-4-hop', NULL, NULL, NULL, 26900.00, NULL, 'products/628073-8934673606820LOC.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6265, 7, 'Lốc sữa chua ăn lựu đỏ ít đường Vinamilk hộp 100g (4 Hộp)', 'loc-sua-chua-an-luu-do-it-duong-vinamilk-hop-100g-4-hop', NULL, NULL, NULL, 34900.00, NULL, 'products/627950-8934673500777LOC.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6266, 7, 'Kem cây socola Luxe Magnum 80ml (1 Cây)', 'kem-cay-socola-luxe-magnum-80ml-1-cay', NULL, NULL, NULL, 11000.00, NULL, 'products/8999999595586.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6267, 7, 'Kem Melona dưa lưới Binggrae gói 80ml (1 Cây)', 'kem-melona-dua-luoi-binggrae-goi-80ml-1-cay', NULL, NULL, NULL, 153000.00, NULL, 'products/3341-98216.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14');
INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `short_desc`, `unit`, `price`, `old_price`, `image`, `gallery`, `stock`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(6268, 7, 'Sữa chua dẻo phô mai Merino 50ml (1 Bịch)', 'sua-chua-deo-pho-mai-merino-50ml-1-bich', NULL, NULL, NULL, 84000.00, NULL, 'products/618145-Group_430.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6269, 7, 'Kem chuối truyền thống Merino 60ml (1 Cây)', 'kem-chuoi-truyen-thong-merino-60ml-1-cay', NULL, NULL, NULL, 91000.00, NULL, 'products/628850-8936011772808.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6270, 7, 'Kem cây kitkat Nestle cây 70g (1 Cây)', 'kem-cay-kitkat-nestle-cay-70g-1-cay', NULL, NULL, NULL, 78000.00, NULL, 'products/15465-97015.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6271, 8, 'Sữa thanh trùng huơng dưa lưới Meiji hộp 946ml (1 Hộp)', 'sua-thanh-trung-huong-dua-luoi-meiji-hop-946ml-1-hop', NULL, NULL, NULL, 155000.00, NULL, 'products/560837-381650.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6272, 8, 'Sữa thanh trùng Meiji 946ml (1 Hộp)', 'sua-thanh-trung-meiji-946ml-1-hop', NULL, NULL, NULL, 39000.00, NULL, 'products/1303-96769.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6273, 8, 'Combo thử vị: sữa hạt Oatside + sữa hạt Boring Oat (1 Combo)', 'combo-thu-vi-sua-hat-oatside-sua-hat-boring-oat-1-combo', NULL, NULL, NULL, 153900.00, NULL, 'products/OL1755246989294.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6274, 8, 'Combo thử vị: Sữa thanh trùng Green Farm + Sữa thanh trùng Meiji 4.3%', 'combo-thu-vi-sua-thanh-trung-green-farm-sua-thanh-trung-meiji-4-3', NULL, NULL, NULL, 124800.00, NULL, 'products/OL1755249081605.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6275, 8, 'Sữa tươi tiệt trùng không đường Vinamilk 1L (1 Hộp)', 'sua-tuoi-tiet-trung-khong-duong-vinamilk-1l-1-hop', NULL, NULL, NULL, 43000.00, NULL, 'products/608939-8934673576390.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6276, 8, 'Sữa tươi tiệt trùng ít đường Vinamilk 1L (1 Hộp)', 'sua-tuoi-tiet-trung-it-duong-vinamilk-1l-1-hop', NULL, NULL, NULL, 129000.00, NULL, 'products/625724-8934673581394.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6277, 8, 'Sữa tươi tiệt trùng có đường Vinamilk 1L (1 Hộp)', 'sua-tuoi-tiet-trung-co-duong-vinamilk-1l-1-hop', NULL, NULL, NULL, 59000.00, NULL, 'products/628121-8934673573399.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6278, 8, 'Lốc sữa tươi tiệt trùng socola lúa mạch Kun 180ml (4 Hộp)', 'loc-sua-tuoi-tiet-trung-socola-lua-mach-kun-180ml-4-hop', NULL, NULL, NULL, 89000.00, NULL, 'products/627216-8936025771200LOC.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6279, 8, 'Sữa chua uống lựu Yomost hộp 170ml (4 Hộp)', 'sua-chua-uong-luu-yomost-hop-170ml-4-hop', NULL, NULL, NULL, 68000.00, NULL, 'products/8934841900446LOC.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6280, 8, 'Lốc sữa dinh dưỡng pha sẵn hương vani Pediasure hộp 110ml (4 Hộp)', 'loc-sua-dinh-duong-pha-san-huong-vani-pediasure-hop-110ml-4-hop', NULL, NULL, NULL, 96900.00, NULL, 'products/5099864017397LOC-x7k-b19.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6281, 8, 'Lốc sữa dinh dưỡng pha sẵn hương vani Pediasure hộp 180ml (4 Hộp)', 'loc-sua-dinh-duong-pha-san-huong-vani-pediasure-hop-180ml-4-hop', NULL, NULL, NULL, 141900.00, NULL, 'products/664600-5099864017403LOC.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6282, 8, 'Combo sữa thanh trùng không đường Green Farm Vinamilk hộp 900ml (2 Hộp)', 'combo-sua-thanh-trung-khong-duong-green-farm-vinamilk-hop-900ml-2-hop', NULL, NULL, NULL, 99800.00, NULL, 'products/623045-8934673101387.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6283, 8, 'Sữa thanh trùng không đường Green Farm Vinamilk hộp 900ml (1 Hộp)', 'sua-thanh-trung-khong-duong-green-farm-vinamilk-hop-900ml-1-hop', NULL, NULL, NULL, 49900.00, NULL, 'products/8934673101387.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6284, 8, 'Sữa nước Ensure Gold Armour chai 237ml (24 Chai)', 'sua-nuoc-ensure-gold-armour-chai-237ml-24-chai', NULL, NULL, NULL, 112000.00, NULL, 'products/070074127293.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6285, 8, 'Thùng sữa tươi tiệt trùng có đường TH True Milk 180ml (48 Hộp)', 'thung-sua-tuoi-tiet-trung-co-duong-th-true-milk-180ml-48-hop', NULL, NULL, NULL, 409000.00, NULL, 'products/626930-18935217400154.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6286, 8, 'Lốc sữa tươi tiệt trùng có đường TH True Milk 180ml (4 Hộp)', 'loc-sua-tuoi-tiet-trung-co-duong-th-true-milk-180ml-4-hop', NULL, NULL, NULL, 98000.00, NULL, 'products/471924-8935217400157.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6287, 8, 'Sữa tươi tiệt trùng nguyên kem Lemontree Dairy thùng 12 hộp x 1L (1 Thùng)', 'sua-tuoi-tiet-trung-nguyen-kem-lemontree-dairy-thung-12-hop-x-1l-1-thung', NULL, NULL, NULL, 699000.00, NULL, 'products/626932-19369999042599.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6288, 8, 'Sữa yến mạch Vitasoy ít đường hộp 1 lít', 'sua-yen-mach-vitasoy-it-duong-hop-1-lit', NULL, NULL, NULL, 95000.00, NULL, 'products/19058-378756.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6289, 8, 'Combo thử vị: sữa hạt Oatside + sữa hạt Boring Oat pha chế (1 Combo)', 'combo-thu-vi-sua-hat-oatside-sua-hat-boring-oat-pha-che-1-combo', NULL, NULL, NULL, 153900.00, NULL, 'products/OL1755246989295.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6290, 8, 'Combo thử vị: Sữa thanh trùng Đà Lạt MIlk + Lothamilk có đường', 'combo-thu-vi-sua-thanh-trung-da-lat-milk-lothamilk-co-duong', NULL, NULL, NULL, 61600.00, NULL, 'products/OL1755249081611.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6291, 8, 'Combo sữa tươi thanh trùng socola Đà Lạt Milk hộp 180ml (3 Hộp)', 'combo-sua-tuoi-thanh-trung-socola-da-lat-milk-hop-180ml-3-hop', NULL, NULL, NULL, 41700.00, NULL, 'products/618097-Group_382.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6292, 8, 'Sữa tươi thanh trùng Đà Lạt Milk hộp 180ml', 'sua-tuoi-thanh-trung-da-lat-milk-hop-180ml', NULL, NULL, NULL, 89000.00, NULL, 'products/618094-Group_379.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6293, 8, 'Lốc 3 hộp Sữa đậu đen óc chó hạnh nhân Sahmyook 190ml', 'loc-3-hop-sua-dau-den-oc-cho-hanh-nhan-sahmyook-190ml', NULL, NULL, NULL, 53900.00, NULL, 'products/472014-8801136361780.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6294, 8, 'Sữa tươi thanh trùng hương dâu Đalat Milk hộp 180ml', 'sua-tuoi-thanh-trung-huong-dau-dalat-milk-hop-180ml', NULL, NULL, NULL, 103000.00, NULL, 'products/618083-Group_369.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6295, 8, 'Sữa hạnh nhân Vitasoy ít đường hộp 1 lít', 'sua-hanh-nhan-vitasoy-it-duong-hop-1-lit', NULL, NULL, NULL, 95000.00, NULL, 'products/19057-378754.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6296, 8, 'Thùng sữa tươi tiệt trùng Green Farm cao đạm ít béo Vinamilk hộp 250ml (12 Hộp)', 'thung-sua-tuoi-tiet-trung-green-farm-cao-dam-it-beo-vinamilk-hop-250ml-12-hop', NULL, NULL, NULL, 358800.00, NULL, 'products/664397-18934673101421-b19.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6297, 8, 'Lốc sữa tươi tiệt trùng ít đường Kun hộp 180ml (4 Hộp)', 'loc-sua-tuoi-tiet-trung-it-duong-kun-hop-180ml-4-hop', NULL, NULL, NULL, 34900.00, NULL, 'products/471996-8936025774355.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6298, 8, 'Sữa tươi tiệt trùng nguyên kem Lemontree Dairy hộp 1L (1 Hộp)', 'sua-tuoi-tiet-trung-nguyen-kem-lemontree-dairy-hop-1l-1-hop', NULL, NULL, NULL, 59000.00, NULL, 'products/618109-Group_394.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6299, 8, 'Phô mai mozzarella bào Bottega Zelachi gói 200g', 'pho-mai-mozzarella-bao-bottega-zelachi-goi-200g', NULL, NULL, NULL, 94900.00, NULL, 'products/1045-367242.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6300, 8, 'Combo sữa tươi thanh trùng socola Đà Lạt Milk hộp 180ml (5 Hộp)', 'combo-sua-tuoi-thanh-trung-socola-da-lat-milk-hop-180ml-5-hop', NULL, NULL, NULL, 69500.00, NULL, 'products/630307-8938503131728.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6301, 8, 'Lốc sữa chuối Binggrae hộp 200ml (6 HỘP)', 'loc-sua-chuoi-binggrae-hop-200ml-6-hop', NULL, NULL, NULL, 111900.00, NULL, 'products/628118-769828221607.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6302, 8, 'Lốc sữa dưa lưới Binggrae 200ml (6 Hộp)', 'loc-sua-dua-luoi-binggrae-200ml-6-hop', NULL, NULL, NULL, 111900.00, NULL, 'products/628115-8801104940153.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6303, 8, 'Combo thử vị: Sữa thanh trùng Green Farm + Sữa thanh trùng Meiji', 'combo-thu-vi-sua-thanh-trung-green-farm-sua-thanh-trung-meiji', NULL, NULL, NULL, 119800.00, NULL, 'products/OL17552490816051.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6304, 8, 'Lốc sữa dâu Binggrae 200ml (6 Hộp)', 'loc-sua-dau-binggrae-200ml-6-hop', NULL, NULL, NULL, 111900.00, NULL, 'products/628116-8801104940030.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6305, 8, 'Sữa tươi thanh trùng không đường Delifres chai 900ml', 'sua-tuoi-thanh-trung-khong-duong-delifres-chai-900ml', NULL, NULL, NULL, 51900.00, NULL, 'products/8938531579011.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6306, 8, 'Sữa tươi thanh trùng ít đường DeliFres chai 900ml', 'sua-tuoi-thanh-trung-it-duong-delifres-chai-900ml', NULL, NULL, NULL, 51900.00, NULL, 'products/8938531579042.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6307, 8, 'Combo sữa thanh trùng 4.3% Meiji + sữa thanh trùng vị socola Meiji (1 Combo)', 'combo-sua-thanh-trung-4-3-meiji-sua-thanh-trung-vi-socola-meiji-1-combo', NULL, NULL, NULL, 144800.00, NULL, 'products/OL1750213824156.png', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6308, 8, 'Combo sữa tươi thanh trùng Đà Lạt Milk hộp 180ml (3 Hộp)', 'combo-sua-tuoi-thanh-trung-da-lat-milk-hop-180ml-3-hop', NULL, NULL, NULL, 41700.00, NULL, 'products/515266-OL1723594526518_2.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6309, 8, 'Combo sữa tươi thanh trùng hương dâu Đalat Milk hộp 180ml (3 Hộp)', 'combo-sua-tuoi-thanh-trung-huong-dau-dalat-milk-hop-180ml-3-hop', NULL, NULL, NULL, 41700.00, NULL, 'products/515264-OL1723594526518_4.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6310, 8, 'Combo sữa thanh trùng Đà Lạt Milk mix 3 vị (1 Combo)', 'combo-sua-thanh-trung-da-lat-milk-mix-3-vi-1-combo', NULL, NULL, NULL, 41700.00, NULL, 'products/515249-OL1723594526518.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6311, 8, 'Sữa tươi thanh trùng socola Đà Lạt Milk hộp 180ml (1 Hộp)', 'sua-tuoi-thanh-trung-socola-da-lat-milk-hop-180ml-1-hop', NULL, NULL, NULL, 30000.00, NULL, 'products/618100-Group_385.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6312, 8, 'Phô mai hương vị Emmental 8M Milkana hộp 104g (1 Hộp)', 'pho-mai-huong-vi-emmental-8m-milkana-hop-104g-1-hop', NULL, NULL, NULL, 36900.00, NULL, 'products/6191585702695.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6313, 8, 'Phô mai hương vị Emmental 16M Milkana hộp 208g (1 Hộp)', 'pho-mai-huong-vi-emmental-16m-milkana-hop-208g-1-hop', NULL, NULL, NULL, 65900.00, NULL, 'products/6191585702701.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6314, 8, 'Combo sữa thanh trùng Đà Lạt Milk 950ML + bánh mì Yamazaki (1 Combo)', 'combo-sua-thanh-trung-da-lat-milk-950ml-banh-mi-yamazaki-1-combo', NULL, NULL, NULL, 86900.00, NULL, 'products/621967-OL1742978432387.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6315, 8, 'Combo lốc sữa Oatside 2 vị (1 Combo)', 'combo-loc-sua-oatside-2-vi-1-combo', NULL, NULL, NULL, 65900.00, NULL, 'products/OL1750213824163.png', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6316, 8, 'Lốc sữa tươi tiệt trùng có đường 100% sữa tươi Kun 180ml (4 Hộp)', 'loc-sua-tuoi-tiet-trung-co-duong-100-sua-tuoi-kun-180ml-4-hop', NULL, NULL, NULL, 34900.00, NULL, 'products/624680-8936025774331LOC.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6317, 8, 'Lốc sữa tươi canxi Úc Meadow Fresh 200ml (3 Hộp)', 'loc-sua-tuoi-canxi-uc-meadow-fresh-200ml-3-hop', NULL, NULL, NULL, 54900.00, NULL, 'products/472010-9415522002578.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6318, 8, 'Lốc sữa tươi tiệt trùng ít béo Meadow Fresh 200ml (3 Hộp)', 'loc-sua-tuoi-tiet-trung-it-beo-meadow-fresh-200ml-3-hop', NULL, NULL, NULL, 47900.00, NULL, 'products/472011-9415522002530.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6319, 8, 'Bơ lạt Cook&Bake Emborg gói 200g', 'bo-lat-cook-bake-emborg-goi-200g', NULL, NULL, NULL, 69900.00, NULL, 'products/1066-93392.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6320, 9, 'Rong biển trộn cơm cháy tỏi Otoki gói 30g (1 Gói)', 'rong-bien-tron-com-chay-toi-otoki-goi-30g-1-goi', NULL, NULL, NULL, 40000.00, NULL, 'products/664529-Template_hang_thung_4.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6321, 9, 'Xúc xích tiệt trùng Red CP gói 5 cây x 20g (1 gói)', 'xuc-xich-tiet-trung-red-cp-go-i-5-cay-x-20g-1-goi', NULL, NULL, NULL, 13000.00, NULL, 'products/17852-92346.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6322, 9, 'Rong biển nướng giòn trộn cá hồi Bibigo gói 45g (1 Gói)', 'rong-bien-nuong-gion-tron-ca-hoi-bibigo-goi-45g-1-goi', NULL, NULL, NULL, 50000.00, NULL, 'products/8935297104372.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6323, 9, 'Bánh gạo Nhật vị shouyu mật ong Ichi gói 180g', 'banh-gao-nhat-vi-shouyu-mat-ong-ichi-goi-180g', NULL, NULL, NULL, 132000.00, NULL, 'products/1147-367780.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6324, 9, 'Kẹo socola Snickers gói 35g', 'keo-socola-snickers-goi-35g', NULL, NULL, NULL, 20000.00, NULL, 'products/4657-96620.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6325, 9, 'Ngũ cốc dinh dưỡng Froot Loops Kellogg\'s hộp 150g (1 Hộp)', 'ngu-coc-dinh-duong-froot-loops-kellogg-s-hop-150g-1-hop', NULL, NULL, NULL, 89000.00, NULL, 'products/629118-8852756303049.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6326, 9, 'Bánh dinh dưỡng tảo biển AFC hộp 172g', 'banh-dinh-duong-tao-bien-afc-hop-172g', NULL, NULL, NULL, 30500.00, NULL, 'products/17883-96442.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6327, 9, 'Bánh dinh dưỡng lúa mì AFC hộp 172g', 'banh-dinh-duong-lua-mi-afc-hop-172g', NULL, NULL, NULL, 30500.00, NULL, 'products/17912-100465.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6328, 9, 'Bánh dinh dưỡng rau cải AFC hộp 172g (1 Hộp)', 'banh-dinh-duong-rau-cai-afc-hop-172g-1-hop', NULL, NULL, NULL, 30500.00, NULL, 'products/629179-8934680025973.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6329, 9, 'Kỷ tử khô Oh Smile Nuts hũ 225g', 'ky-tu-kho-oh-smile-nuts-hu-225g', NULL, NULL, NULL, 130000.00, NULL, 'products/4142-102082.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6330, 9, 'Bánh gạo Hàn quốc vị phô mai cay O\'food ly 105g (1 ly)', 'banh-gao-ha-n-quo-c-vi-pho-mai-cay-o-food-ly-105g-1-ly', NULL, NULL, NULL, 146000.00, NULL, 'products/2125-369667.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6331, 9, 'Bánh gạo Hàn Quốc vị phô mai không cay O\'Food ly 105g (1 ly)', 'banh-gao-han-quoc-vi-pho-mai-khong-cay-o-food-ly-105g-1-ly', NULL, NULL, NULL, 127000.00, NULL, 'products/19639-8935304200608.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6332, 9, 'Bánh tráng trộn phô mai Miss Bánh Tráng gói 40g (1 Gói)', 'banh-trang-tron-pho-mai-miss-banh-trang-goi-40g-1-goi', NULL, NULL, NULL, 94000.00, NULL, 'products/8938549708182.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6333, 9, 'Bánh tráng trộn vị sa tế bò Miss Bánh Tráng gói 46g (1 Gói)', 'banh-trang-tron-vi-sa-te-bo-miss-banh-trang-goi-46g-1-goi', NULL, NULL, NULL, 120000.00, NULL, 'products/8938549708076.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6334, 9, 'Bánh tráng trộn vị sa tế tôm Miss Bánh Tráng gói 46g (1 Gói)', 'banh-trang-tron-vi-sa-te-tom-miss-banh-trang-goi-46g-1-goi', NULL, NULL, NULL, 96000.00, NULL, 'products/8938549708083.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6335, 9, 'Combo 4 rong biển nướng giòn trộn cá hồi Bibigo gói 45g x 4', 'combo-4-rong-bien-nuong-gion-tron-ca-hoi-bibigo-goi-45g-x-4', NULL, NULL, NULL, 200000.00, NULL, 'products/89352971043724.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6336, 9, 'Yến mạch cán dẹt hữu cơ Cát Khánh hộp 400g (1 Hộp)', 'yen-mach-can-det-huu-co-cat-khanh-hop-400g-1-hop', NULL, NULL, NULL, 95000.00, NULL, 'products/8936111422641.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6337, 9, 'Socola funsize Snickers túi 240g', 'socola-funsize-snickers-tui-240g', NULL, NULL, NULL, 112000.00, NULL, 'products/4653-94643.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6338, 9, 'Combo ăn vặt có gu - 2 gói da cá G vị trứng muối và trứng muối cay', 'combo-an-vat-co-gu-2-goi-da-ca-g-vi-trung-muoi-va-trung-muoi-cay', NULL, NULL, NULL, 74000.00, NULL, 'products/OL20011509BPT7.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6339, 9, 'Granola siêu hạt Oh Smile Nuts hũ 500g', 'granola-sieu-hat-oh-smile-nuts-hu-500g', NULL, NULL, NULL, 198000.00, NULL, 'products/4110-371657.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6340, 9, 'Da cá vị trứng muối G gói 50g (1 Gói)', 'da-ca-vi-trung-muoi-g-goi-50g-1-goi', NULL, NULL, NULL, 37000.00, NULL, 'products/15817-91547.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6341, 9, 'Combo KIDO - 3 gói bánh Dora-yaki nhiều vị', 'combo-kido-3-goi-banh-dora-yaki-nhieu-vi', NULL, NULL, NULL, 118500.00, NULL, 'products/OL20011509BPT15.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6342, 9, 'Da cá vị trứng muối cay G gói 50g (1 Gói)', 'da-ca-vi-trung-muoi-cay-g-goi-50g-1-goi', NULL, NULL, NULL, 37000.00, NULL, 'products/15819-374293.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6343, 9, 'Khô bò xông khói vị cay Tam Food hộp 100g (1 Hộp)', 'kho-bo-xong-khoi-vi-cay-tam-food-hop-100g-1-hop', NULL, NULL, NULL, 129000.00, NULL, 'products/8938511964226.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6344, 9, 'Bánh sữa hương vani Delipie hộp 216g (1 Hộp)', 'banh-sua-huong-vani-delipie-hop-216g-1-hop', NULL, NULL, NULL, 35500.00, NULL, 'products/346019-380635.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6345, 9, 'Snack rong biển cuộn nướng vị truyền thống O\'food hộp 12g (1 Hộp)', 'snack-rong-bien-cuon-nuong-vi-truyen-thong-o-food-hop-12g-1-hop', NULL, NULL, NULL, 32500.00, NULL, 'products/8935304204897.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6346, 9, 'Bánh ngũ cốc Weet Bix hộp 375g (1 Hộp)', 'banh-ngu-coc-weet-bix-hop-375g-1-hop', NULL, NULL, NULL, 89000.00, NULL, 'products/9300652010374.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6347, 9, 'Khô bò vị tiêu xanh Tam Food hộp 100g (1 Hộp)', 'kho-bo-vi-tieu-xanh-tam-food-hop-100g-1-hop', NULL, NULL, NULL, 125000.00, NULL, 'products/8938511964806.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6348, 9, 'Mứt dâu Le Fruit hũ 225g', 'mut-dau-le-fruit-hu-225g', NULL, NULL, NULL, 47000.00, NULL, 'products/3903-370329.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6349, 9, 'Ăn vặt cho bé - Nước uống vị sữa và bánh kem ốc quế Pororo', 'an-vat-cho-be-nuoc-uong-vi-sua-va-banh-kem-oc-que-pororo', NULL, NULL, NULL, 187000.00, NULL, 'products/OL20250529CB4.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6350, 9, 'Combo Oishi - 6 gói bánh snack tuổi thơ nhiều vị', 'combo-oishi-6-goi-banh-snack-tuoi-tho-nhieu-vi', NULL, NULL, NULL, 78000.00, NULL, 'products/OL20011509BPT2.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6351, 9, 'Combo Lay\'s - 4 gói bánh snack khoai tây nhiều vị 54g', 'combo-lay-s-4-goi-banh-snack-khoai-tay-nhieu-vi-54g', NULL, NULL, NULL, 52000.00, NULL, 'products/OL20011509BPT10.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6352, 9, 'Combo 6 gói hạt nấu sữa Cát Khánh túi 650g (1 Túi)', 'combo-6-goi-hat-nau-sua-cat-khanh-tui-650g-1-tui', NULL, NULL, NULL, 190000.00, NULL, 'products/624816-Group_191.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6353, 9, 'Thạch Puri trái cây tổng hợp Cosia 200g (1 Hũ)', 'thach-puri-trai-cay-tong-hop-cosia-200g-1-hu', NULL, NULL, NULL, 25000.00, NULL, 'products/471738-380849.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6354, 9, 'Ăn vặt cho bé - Nước uống vị sữa và bánh kem ốc quế vị sô cô la Pororo', 'an-vat-cho-be-nuoc-uong-vi-sua-va-banh-kem-oc-que-vi-so-co-la-pororo', NULL, NULL, NULL, 104000.00, NULL, 'products/OL20250529CB2.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6355, 9, 'Ăn vặt cho bé - Nước uống và bánh kem ốc quế vị dâu Pororo', 'an-vat-cho-be-nuoc-uong-va-banh-kem-oc-que-vi-dau-pororo', NULL, NULL, NULL, 104000.00, NULL, 'products/OL20250529CB1.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6356, 9, 'Granola ngũ cốc dinh dưỡng chanh dây Nutty gói 250g (1 Gói)', 'granola-ngu-coc-dinh-duong-chanh-day-nutty-goi-250g-1-goi', NULL, NULL, NULL, 120000.00, NULL, 'products/8935292206767.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6357, 9, 'Granola ngũ cốc dinh dưỡng cacao Nutty gói 250g (1 Gói)', 'granola-ngu-coc-dinh-duong-cacao-nutty-goi-250g-1-goi', NULL, NULL, NULL, 120000.00, NULL, 'products/8935292206743.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6358, 9, 'Combo GOKOCHI - 2 gói bánh snack khoai tây nhiều vị', 'combo-gokochi-2-goi-banh-snack-khoai-tay-nhieu-vi', NULL, NULL, NULL, 41500.00, NULL, 'products/OL20011509BPT9.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6359, 9, 'Combo Doritos - 2 gói bánh snack ngô chiên giòn nhiều vị', 'combo-doritos-2-goi-banh-snack-ngo-chien-gion-nhieu-vi', NULL, NULL, NULL, 64000.00, NULL, 'products/OL20011509BPT8.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6360, 9, 'Kem đá hương trái cây New Choice gói 450g', 'kem-da-huong-trai-cay-new-choice-goi-450g', NULL, NULL, NULL, 32500.00, NULL, 'products/4808-371386.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6361, 9, 'Combo Poca - Snack ăn vặt nhiều vị', 'combo-poca-snack-an-vat-nhieu-vi', NULL, NULL, NULL, 39000.00, NULL, 'products/OL20250522CBT17.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6362, 9, 'Quà vặt cho bé - Bánh Dorayaki sô cô la và kẹo gum Doraemon', 'qua-vat-cho-be-banh-dorayaki-so-co-la-va-keo-gum-doraemon', NULL, NULL, NULL, 110000.00, NULL, 'products/OL20250529CB11.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6363, 9, 'Quà vặt cho bé - Bánh Dorayaki chà bông xốt bơ và kẹo gum Doraemon', 'qua-vat-cho-be-banh-dorayaki-cha-bong-xot-bo-va-keo-gum-doraemon', NULL, NULL, NULL, 110000.00, NULL, 'products/OL20250529CB10.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6364, 9, 'Thạch dừa ly Ánh Hồng 190g (1 Ly)', 'thach-dua-ly-anh-hong-190g-1-ly', NULL, NULL, NULL, 133000.00, NULL, 'products/126088-377308.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6365, 9, 'Ăn vặt cho bé - 2 hộp bánh Marine Boy nhiều vị Orion và rong biển Big Roll', 'an-vat-cho-be-2-hop-banh-marine-boy-nhieu-vi-orion-va-rong-bien-big-roll', NULL, NULL, NULL, 38500.00, NULL, 'products/OL20250529CB6.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6366, 9, 'Rau câu Tropical New Choice gói 300g', 'rau-cau-tropical-new-choice-goi-300g', NULL, NULL, NULL, 23500.00, NULL, 'products/4825-365944.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6367, 9, 'Snack khoai tây vị cay đặc biệt Karamucho gói 120g (1 Gói)', 'snack-khoai-tay-vi-cay-dac-biet-karamucho-goi-120g-1-goi', NULL, NULL, NULL, 31000.00, NULL, 'products/540175-8936135440249.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6368, 9, 'Snack khoai tây vị muối tự nhiên Gokochi gói 115g (1 Gói)', 'snack-khoai-tay-vi-muoi-tu-nhien-gokochi-goi-115g-1-goi', NULL, NULL, NULL, 31000.00, NULL, 'products/14022-377492.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6369, 9, 'Socola minis M&M tuýp 35g', 'socola-minis-m-m-tuyp-35g', NULL, NULL, NULL, 31000.00, NULL, 'products/3888-91242.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6370, 9, 'Bánh nhện mè Vietspecial gói 150g (1 Gói)', 'banh-nhen-me-vietspecial-goi-150g-1-goi', NULL, NULL, NULL, 24000.00, NULL, 'products/8936043371673.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6371, 9, 'Mix hạt & trái cây Cát Khánh hũ 160g (1 Hũ)', 'mix-hat-trai-cay-cat-khanh-hu-160g-1-hu', NULL, NULL, NULL, 99000.00, NULL, 'products/8936111423273.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6372, 9, 'Kẹo trái cây Skittles gói 45g', 'keo-trai-cay-skittles-goi-45g', NULL, NULL, NULL, 22000.00, NULL, 'products/4676-368923.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6373, 9, 'Kẹo Singgum Cool Air hương quả mọng hũ 55.4G', 'keo-singgum-cool-air-huong-qua-mong-hu-55-4g', NULL, NULL, NULL, 30000.00, NULL, 'products/628929-8936114080961.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6374, 9, 'Kẹo the vị dưa hấu Playmore hũ 22g', 'keo-the-vi-dua-hau-playmore-hu-22g', NULL, NULL, NULL, 35000.00, NULL, 'products/4785-91451.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6375, 9, 'Kẹo Singgum Cool Air hương bạc hà - khuynh diệp hũ 55.4G', 'keo-singgum-cool-air-huong-bac-ha-khuynh-diep-hu-55-4g', NULL, NULL, NULL, 32000.00, NULL, 'products/628928-8936114080022.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6376, 9, 'Thạch hương trái cây Dr.Q gói 228g (1 Gói)', 'thach-huong-trai-cay-dr-q-goi-228g-1-goi', NULL, NULL, NULL, 25000.00, NULL, 'products/8936195090477.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6377, 9, 'Kẹo socola bạc hà Andes hộp 132g (1 Hộp)', 'keo-socola-bac-ha-andes-hop-132g-1-hop', NULL, NULL, NULL, 90000.00, NULL, 'products/15688-041186000415.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6378, 9, 'Kẹo socola đá Choco Rock gói 65g (1 Gói)', 'keo-socola-da-choco-rock-goi-65g-1-goi', NULL, NULL, NULL, 29000.00, NULL, 'products/-goi-65g-choco-rock-goi_8936029160208_6109b13ce8c84c269b046cc78a029e1a_98a0984258eb47a688b80839ea1545f5.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6379, 9, 'Mứt dâu Bonne Maman Jams hũ 30g (1 Hũ)', 'mut-dau-bonne-maman-jams-hu-30g-1-hu', NULL, NULL, NULL, 24000.00, NULL, 'products/20386-98815.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6380, 9, 'Mứt phúc bồn tử Bonne Maman Jams hũ 30g (1 Hũ)', 'mut-phuc-bon-tu-bonne-maman-jams-hu-30g-1-hu', NULL, NULL, NULL, 24000.00, NULL, 'products/20387-97933.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6381, 9, 'Mật ong Curcumin Miele hũ 250g (1 Hũ)', 'mat-ong-curcumin-miele-hu-250g-1-hu', NULL, NULL, NULL, 209000.00, NULL, 'products/8938544564127.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6382, 9, 'Mật ong nguyên chất Miele chai 700g (1 Chai)', 'mat-ong-nguyen-chat-miele-chai-700g-1-chai', NULL, NULL, NULL, 129000.00, NULL, 'products/8938509203283.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6383, 9, 'Combo 4 hũ thạch trái cây Puri 200g - Ăn vặt cho bé', 'combo-4-hu-thach-trai-cay-puri-200g-an-vat-cho-be', NULL, NULL, NULL, 100000.00, NULL, 'products/625097-mua_4_tang_1.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6384, 10, 'Bia Pilsner 333 4.3% lon cao 330ml (1 Lon)', 'bia-pilsner-333-4-3-lon-cao-330ml-1-lon', NULL, NULL, NULL, 26000.00, NULL, 'products/624371-8935012443397.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6385, 10, 'Bia special sleek Sài Gòn 330ml (1 Lon)', 'bia-special-sleek-sai-gon-330ml-1-lon', NULL, NULL, NULL, 90000.00, NULL, 'products/3965-367137.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6386, 10, 'Bia Hopfenwunder Dinkelacker chai 5% 330ml (1 Chai)', 'bia-hopfenwunder-dinkelacker-chai-5-330ml-1-chai', NULL, NULL, NULL, 15000.00, NULL, 'products/4100320103361.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6387, 10, 'Bia Pale Wheat 5.0% Feldschlobchen lon 500ml (1 Lon)', 'bia-pale-wheat-5-0-feldschlobchen-lon-500ml-1-lon', NULL, NULL, NULL, 36000.00, NULL, 'products/4250594209655.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6388, 10, 'Bia Urbock 7.2% Feldschlobchen lon 500ml (1 Lon)', 'bia-urbock-7-2-feldschlobchen-lon-500ml-1-lon', NULL, NULL, NULL, 36000.00, NULL, 'products/4250594209631.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6389, 10, 'Bia brown Ale 5.9% Gubernija 568ml (1 Lon)', 'bia-brown-ale-5-9-gubernija-568ml-1-lon', NULL, NULL, NULL, 96000.00, NULL, 'products/4460-98533.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6390, 10, 'Bia Munich Wheat 5.5% Paulaner lon 500ml (1 Lon)', 'bia-munich-wheat-5-5-paulaner-lon-500ml-1-lon', NULL, NULL, NULL, 30000.00, NULL, 'products/19671-374191.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6391, 10, 'Bia vị Lemon Radler 2.5% Paulaner lon 500ml (1 Lon)', 'bia-vi-lemon-radler-2-5-paulaner-lon-500ml-1-lon', NULL, NULL, NULL, 67000.00, NULL, 'products/4066600219514.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6392, 10, 'Bia Premium 4.8% Warsteiner lon 500ml (1 Lon)', 'bia-premium-4-8-warsteiner-lon-500ml-1-lon', NULL, NULL, NULL, 31000.00, NULL, 'products/4000856003404.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6393, 10, 'Bia Brewers Gold 5.2% Warsteiner lon 500ml (1 Lon)', 'bia-brewers-gold-5-2-warsteiner-lon-500ml-1-lon', NULL, NULL, NULL, 88000.00, NULL, 'products/4000856006184.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6394, 10, 'Nước gạo buổi sáng Woongjin chai 1.5l (1 Chai)', 'nuoc-gao-buoi-sang-woongjin-chai-1-5l-1-chai', NULL, NULL, NULL, 30000.00, NULL, 'products/619010-8801382123446.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6395, 10, 'Cà phê Trung Nguyên sáng tạo 1 gói 340g', 'ca-phe-trung-nguyen-sang-tao-1-goi-340g', NULL, NULL, NULL, 94000.00, NULL, 'products/618752-8935024163504.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6396, 10, 'Cà phê sữa nhà làm Cà Phê Phố hộp 10 gói x28g', 'ca-phe-sua-nha-lam-ca-phe-pho-hop-10-goi-x28g', NULL, NULL, NULL, 65000.00, NULL, 'products/618734-8936024244255.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6397, 10, 'Lốc nước ngọt Zero Calo vị phúc bồn tử Pepsi lon 320ml (6 Lon)', 'loc-nuoc-ngot-zero-calo-vi-phuc-bon-tu-pepsi-lon-320ml-6-lon', NULL, NULL, NULL, 61000.00, NULL, 'products/8934588462580.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6398, 10, 'Lốc nước ngọt zero Coca Cola lon 320ml (6 Lon)', 'loc-nuoc-ngot-zero-coca-cola-lon-320ml-6-lon', NULL, NULL, NULL, 65000.00, NULL, 'products/18790-92338.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6399, 10, 'Lốc nước ngọt Light CocaCola 320ml (6 lon)', 'loc-nuoc-ngot-light-cocacola-320ml-6-lon', NULL, NULL, NULL, 65000.00, NULL, 'products/618791-78935049502271.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6400, 10, 'Thùng nước ngọt Pepsi 320ml (24 Lon)', 'thung-nuoc-ngot-pepsi-320ml-24-lon', NULL, NULL, NULL, 236000.00, NULL, 'products/55561-8934588012426.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6401, 10, 'Thùng nước ngọt 7UP 320ml (24 lon)', 'thung-nuoc-ngot-7up-320ml-24-lon', NULL, NULL, NULL, 232000.00, NULL, 'products/618778-8934588022425.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6402, 10, 'Lốc nước ngọt Pepsi 320ml (6 Lon)', 'loc-nuoc-ngot-pepsi-320ml-6-lon', NULL, NULL, NULL, 61000.00, NULL, 'products/55562-8934588010118.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6403, 10, 'Lốc nước ngọt 7UP 320ml (6 lon)', 'loc-nuoc-ngot-7up-320ml-6-lon', NULL, NULL, NULL, 58000.00, NULL, 'products/618779-8934588020117.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6404, 10, 'Lốc nước tăng lực dâu Sting 320ml (6 Lon)', 'loc-nuoc-tang-luc-dau-sting-320ml-6-lon', NULL, NULL, NULL, 68000.00, NULL, 'products/423357-8934588230110.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6405, 10, 'Cà phê Hazelnut Coffee Town 250ml (1 Ly)', 'ca-phe-hazelnut-coffee-town-250ml-1-ly', NULL, NULL, NULL, 46000.00, NULL, 'products/8801115140054.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6406, 10, 'Cà phê Deep Brown Mocha Coffee Town 250ml (1 Ly)', 'ca-phe-deep-brown-mocha-coffee-town-250ml-1-ly', NULL, NULL, NULL, 46000.00, NULL, 'products/8801115140023.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6407, 10, 'Cà phê White Vanilla Coffee Town 250ml (1 Ly)', 'ca-phe-white-vanilla-coffee-town-250ml-1-ly', NULL, NULL, NULL, 46000.00, NULL, 'products/8801115140016.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6408, 10, 'Lốc tổ yến chưng nguyên chất ít đường 25% Win\'snest hũ 70ml (4 Hũ)', 'loc-to-yen-chung-nguyen-chat-it-duong-25-win-snest-hu-70ml-4-hu', NULL, NULL, NULL, 195000.00, NULL, 'products/8938509217860.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6409, 10, 'Lốc nước tăng lực Rockstar 250ml (6 Lon)', 'loc-nuoc-tang-luc-rockstar-250ml-6-lon', NULL, NULL, NULL, 65000.00, NULL, 'products/618950-8934588712494.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6410, 10, 'Thùng nước cam ép Twister 1L (12 Chai)', 'thung-nuoc-cam-ep-twister-1l-12-chai', NULL, NULL, NULL, 265000.00, NULL, 'products/618872-8934588193316.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6411, 10, 'Lốc nước ngọt zero calo Pepsi 320ml (6 Lon)', 'loc-nuoc-ngot-zero-calo-pepsi-320ml-6-lon', NULL, NULL, NULL, 65000.00, NULL, 'products/56961-8934588660115.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6412, 10, 'Tổ yến chưng đông trùng hạ thảo 25% Win\'snest lốc 6 hũ x 70ml (1 Lốc)', 'to-yen-chung-dong-trung-ha-thao-25-win-snest-loc-6-hu-x-70ml-1-loc', NULL, NULL, NULL, 379000.00, NULL, 'products/8936228820606.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6413, 10, 'Thùng nước trái cây lên men vị việt quất & vodka Chill Cocktail lon 330ml (24 Lon)', 'thung-nuoc-trai-cay-len-men-vi-viet-quat-vodka-chill-cocktail-lon-330ml-24-lon', NULL, NULL, NULL, 530000.00, NULL, 'products/14005-377440.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6414, 10, 'Thùng nước trái cây lên men vị đào & vodka Chill Cocktail lon 330ml (24 Lon)', 'thung-nuoc-trai-cay-len-men-vi-dao-vodka-chill-cocktail-lon-330ml-24-lon', NULL, NULL, NULL, 530000.00, NULL, 'products/13997-377438.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6415, 10, 'Combo Chillax - Strongbow vị thơm lựu 3.5% và snack khoai tây Gokochi 115g', 'combo-chillax-strongbow-vi-thom-luu-3-5-va-snack-khoai-tay-gokochi-115g', NULL, NULL, NULL, 77000.00, NULL, 'products/OL20250522CBT1.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6416, 10, 'Nước ép bưởi & nho 100% Chabaa hộp 1L (1 Hộp)', 'nuoc-ep-buoi-nho-100-chabaa-hop-1l-1-hop', NULL, NULL, NULL, 70000.00, NULL, 'products/8854761060115.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6417, 10, 'Nước ép táo 100% Chabaa hộp 1L (1 Hộp)', 'nuoc-ep-tao-100-chabaa-hop-1l-1-hop', NULL, NULL, NULL, 70000.00, NULL, 'products/8854761020010.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6418, 10, 'Combo nước ép bưởi & nho 100% Chabaa hộp 1L (2 Hộp)', 'combo-nuoc-ep-buoi-nho-100-chabaa-hop-1l-2-hop', NULL, NULL, NULL, 140000.00, NULL, 'products/88547610601152.png', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6419, 10, 'Nước ép xoài & nho 100% Chabaa hộp 1L (1 Hộp)', 'nuoc-ep-xoai-nho-100-chabaa-hop-1l-1-hop', NULL, NULL, NULL, 70000.00, NULL, 'products/8854761170111.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6420, 10, 'Combo nước ép xoài & nho 100% Chabaa hộp 1L (2 Hộp)', 'combo-nuoc-ep-xoai-nho-100-chabaa-hop-1l-2-hop', NULL, NULL, NULL, 140000.00, NULL, 'products/88547611701112.png', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6421, 10, 'Combo nước ép nho đỏ 100% Chabaa hộp 1L (2 Hộp)', 'combo-nuoc-ep-nho-do-100-chabaa-hop-1l-2-hop', NULL, NULL, NULL, 140000.00, NULL, 'products/88547610101102.png', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6422, 10, 'Combo nước ép táo 100% Chabaa hộp 1L (2 Hộp)', 'combo-nuoc-ep-tao-100-chabaa-hop-1l-2-hop', NULL, NULL, NULL, 140000.00, NULL, 'products/88547610200102.png', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6423, 10, 'Nước ép nho đỏ 100% Chabaa hộp 1L (1 Hộp)', 'nuoc-ep-nho-do-100-chabaa-hop-1l-1-hop', NULL, NULL, NULL, 70000.00, NULL, 'products/8854761010110.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6424, 10, 'Thùng nước tăng lực dâu Sting 320ml (24 Lon)', 'thung-nuoc-tang-luc-dau-sting-320ml-24-lon', NULL, NULL, NULL, 257000.00, NULL, 'products/423356-8934588232428.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6425, 10, 'Combo thức uống buổi sáng - Nước gạo & nước gạo lứt Woongjin 1L', 'combo-thuc-uong-buoi-sang-nuoc-gao-nuoc-gao-lut-woongjin-1l', NULL, NULL, NULL, 134000.00, NULL, 'products/OL20011509BPT5.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6426, 10, 'Cà phê rang xay K-Morning K-Coffee túi 227G', 'ca-phe-rang-xay-k-morning-k-coffee-tui-227g', NULL, NULL, NULL, 99000.00, NULL, 'products/618740-8936109120948.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6427, 10, 'Lốc nước cam ép Twister 1 lít (6 Chai)', 'loc-nuoc-cam-ep-twister-1-lit-6-chai', NULL, NULL, NULL, 133000.00, NULL, 'products/618873-SP000945.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6428, 10, 'Trà sữa ôlong tứ quý Thơm chai 250ml (1 Chai)', 'tra-sua-olong-tu-quy-thom-chai-250ml-1-chai', NULL, NULL, NULL, 23000.00, NULL, 'products/5326-376746.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6429, 10, 'Trà tắc mật ong hòa tan Tearoma hộp 14 gói x 14g', 'tra-tac-mat-ong-hoa-tan-tearoma-hop-14-goi-x-14g', NULL, NULL, NULL, 32000.00, NULL, 'products/619027-8938541439626.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6430, 10, 'Combo Chillax Max - Strongbow vị thơm lựu 3.5% và snack ngô giòn Doritos vị nacho cheesier', 'combo-chillax-max-strongbow-vi-thom-luu-3-5-va-snack-ngo-gion-doritos-vi-nacho-cheesier', NULL, NULL, NULL, 156000.00, NULL, 'products/OL20250522CBT13.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6431, 10, 'Lốc nước ngọt vị chanh zero calo Pepsi 320ml (6 Lon)', 'loc-nuoc-ngot-vi-chanh-zero-calo-pepsi-320ml-6-lon', NULL, NULL, NULL, 61000.00, NULL, 'products/56200-8934588670114.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6432, 10, 'Combo ăn vặt có gu - Sprite và bánh khoai tây Oishi nhiều vị', 'combo-an-vat-co-gu-sprite-va-banh-khoai-tay-oishi-nhieu-vi', NULL, NULL, NULL, 48000.00, NULL, 'products/OL20250522CBT11.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6433, 10, 'Combo nhâm nhi - 7UP soda chanh không calo và bánh khoai tây Lay\'s nhiều vị', 'combo-nham-nhi-7up-soda-chanh-khong-calo-va-banh-khoai-tay-lay-s-nhieu-vi', NULL, NULL, NULL, 48000.00, NULL, 'products/OL20250522CBT10.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6434, 10, 'Combo ăn vặt có gu - Fanta cam và snack Oishi tuổi thơ', 'combo-an-vat-co-gu-fanta-cam-va-snack-oishi-tuoi-tho', NULL, NULL, NULL, 48000.00, NULL, 'products/OL20250522CBT8.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6435, 10, 'Combo ăn vặt có gu - Fanta nho và snack Oishi tuổi thơ', 'combo-an-vat-co-gu-fanta-nho-va-snack-oishi-tuoi-tho', NULL, NULL, NULL, 48000.00, NULL, 'products/OL20250522CBT9.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6436, 10, 'Thùng nước ngọt zero CocaCola 320ml (24 lon)', 'thung-nuoc-ngot-zero-cocacola-320ml-24-lon', NULL, NULL, NULL, 239000.00, NULL, 'products/17553-92338.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6437, 10, 'Trà đào hoà tan Tearoma hộp 14 gói x 14g', 'tra-dao-hoa-tan-tearoma-hop-14-goi-x-14g', NULL, NULL, NULL, 32000.00, NULL, 'products/619026-8938541439640.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6438, 10, 'Lốc nước yến sào đông trùng hạ thảo Green Bird chai 185ml (1 Lốc)', 'loc-nuoc-yen-sao-dong-trung-ha-thao-green-bird-chai-185ml-1-loc', NULL, NULL, NULL, 174000.00, NULL, 'products/618984-8936071090980.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6439, 10, 'Trà sữa trân châu Hillway hộp 260g (1 Hộp)', 'tra-sua-tran-chau-hillway-hop-260g-1-hop', NULL, NULL, NULL, 57000.00, NULL, 'products/619019-8936024247089.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6440, 10, 'Trà hoa quả vị vải chanh leo Meco ly 400ml (1 Ly)', 'tra-hoa-qua-vi-vai-chanh-leo-meco-ly-400ml-1-ly', NULL, NULL, NULL, 31000.00, NULL, 'products/6938888882118.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6441, 10, 'Thùng nước tăng lực Number 1 chai 330ml (24 Chai)', 'thung-nuoc-tang-luc-number-1-chai-330ml-24-chai', NULL, NULL, NULL, 258000.00, NULL, 'products/18936193070317.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6442, 10, 'Lốc nước bổ sung ion Pocari 500ml (6 Chai)', 'loc-nuoc-bo-sung-ion-pocari-500ml-6-chai', NULL, NULL, NULL, 88000.00, NULL, 'products/618930-8997035601833.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6443, 10, 'Thùng nước tinh khiết Hikari chai 500ml (24 Chai)', 'thung-nuoc-tinh-khiet-hikari-chai-500ml-24-chai', NULL, NULL, NULL, 98000.00, NULL, 'products/18938512632145.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6444, 10, 'Lốc nước uống tinh khiết Dasani chai 1.5L (6 Chai)', 'loc-nuoc-uong-tinh-khiet-dasani-chai-1-5l-6-chai', NULL, NULL, NULL, 62000.00, NULL, 'products/88935049510853.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6445, 10, 'Thùng nước khoáng Evian 500ml (24 chai)', 'thung-nuoc-khoang-evian-500ml-24-chai', NULL, NULL, NULL, 745000.00, NULL, 'products/618886-3068320055015.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6446, 10, 'Nước uống tinh khiết Aquafina 5l (1 chai)', 'nuoc-uong-tinh-khiet-aquafina-5l-1-chai', NULL, NULL, NULL, 72000.00, NULL, 'products/618880-8934588063176.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6447, 10, 'Nước khoáng Lavie chai 5L (1 Chai)', 'nuoc-khoang-lavie-chai-5l-1-chai', NULL, NULL, NULL, 60000.00, NULL, 'products/618895-8935005800008.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6448, 10, 'Thùng nước trái cây lên men vị nho & rum Chill Cocktail lon 330ml (24 Lon)', 'thung-nuoc-trai-cay-len-men-vi-nho-rum-chill-cocktail-lon-330ml-24-lon', NULL, NULL, NULL, 490000.00, NULL, 'products/14001-377439.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6449, 10, 'Set nhậu mini - Bia Blanc 1664 và khô gà lá chanh', 'set-nhau-mini-bia-blanc-1664-va-kho-ga-la-chanh', NULL, NULL, NULL, 312000.00, NULL, 'products/OL20250523BPT2.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6450, 10, 'Set nhậu mini - Bia Corona Extra và cá đù khô cháy tỏi', 'set-nhau-mini-bia-corona-extra-va-ca-du-kho-chay-toi', NULL, NULL, NULL, 446000.00, NULL, 'products/OL20250523BPT10.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6451, 10, 'Lốc nước yến sào collagen Green Bird chai 185ml (1 Lốc)', 'loc-nuoc-yen-sao-collagen-green-bird-chai-185ml-1-loc', NULL, NULL, NULL, 174000.00, NULL, 'products/618982-8936071091802.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6452, 10, 'Lốc nước yến sào và sâm lát Green Bird hũ 72g (4 Hũ)', 'loc-nuoc-yen-sao-va-sam-lat-green-bird-hu-72g-4-hu', NULL, NULL, NULL, 165000.00, NULL, 'products/618987-8936071092090.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6453, 10, 'Rượu whisky Johnnie Walker Red Label 40% chai 750ml (1 Chai)', 'ruou-whisky-johnnie-walker-red-label-40-chai-750ml-1-chai', NULL, NULL, NULL, 51000.00, NULL, 'products/398143-377463.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6454, 10, 'Rượu soju Fresh 17.8% Jinro chai 360ml', 'ruou-soju-fresh-17-8-jinro-chai-360ml', NULL, NULL, NULL, 75000.00, NULL, 'products/17634-97792.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6455, 10, 'Rượu vodka Hà Nội 39.5% chai 700ml', 'ruou-vodka-ha-noi-39-5-chai-700ml', NULL, NULL, NULL, 96000.00, NULL, 'products/4068-93827.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6456, 10, 'Rượu soju đào 13% Jinro chai 360ml', 'ruou-soju-dao-13-jinro-chai-360ml', NULL, NULL, NULL, 46000.00, NULL, 'products/4464-102588.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6457, 10, 'Rượu vang đỏ Imogino 14% chai 750ml', 'ruou-vang-do-imogino-14-chai-750ml', NULL, NULL, NULL, 86000.00, NULL, 'products/3251-371593.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6458, 10, 'Combo Chillax Max - Strongbow vị thơm lựu 3.5% và bánh khoai tây Lay\'s Max nhiều vị', 'combo-chillax-max-strongbow-vi-thom-luu-3-5-va-banh-khoai-tay-lay-s-max-nhieu-vi', NULL, NULL, NULL, 183000.00, NULL, 'products/OL20250522CBT12.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6459, 11, 'Lốc tổ yến chưng sẵn dành cho trẻ em 20% Win\'snest hũ 70ml (6 Hũ)', 'loc-to-yen-chung-san-danh-cho-tre-em-20-win-snest-hu-70ml-6-hu', NULL, NULL, NULL, 290000.00, NULL, 'products/8938509217747.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6460, 11, 'Lốc nước yến sào chưng đường phèn Green Bird lon 240ml (6 Lon)', 'loc-nuoc-yen-sao-chung-duong-phen-green-bird-lon-240ml-6-lon', NULL, NULL, NULL, 72000.00, NULL, 'products/8936071090034PACK.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6461, 11, 'Yến sào lọ có đường Thiên Việt lọ 70ml (1 Hũ)', 'yen-sao-lo-co-duong-thien-viet-lo-70ml-1-hu', NULL, NULL, NULL, 44000.00, NULL, 'products/19134-367961.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6462, 11, 'Kids Nest Plus hương tự nhiên Thiên Việt hũ 70ml (1 Hũ)', 'kids-nest-plus-huong-tu-nhien-thien-viet-hu-70ml-1-hu', NULL, NULL, NULL, 53000.00, NULL, 'products/19136-90740.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6463, 11, 'Tổ yến chưng sẵn không đường 20% Win\'snest hũ 70ml (1 Hũ)', 'to-yen-chung-san-khong-duong-20-win-snest-hu-70ml-1-hu', NULL, NULL, NULL, 49000.00, NULL, 'products/8938509217464.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6464, 11, 'Nước yến có đường Nunest lon 190ml (1 Lon)', 'nuoc-yen-co-duong-nunest-lon-190ml-1-lon', NULL, NULL, NULL, 42000.00, NULL, 'products/19191-378884.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6465, 11, 'Nước yến đường ăn kiêng Nunest lon 190ml (1 Lon)', 'nuoc-yen-duong-an-kieng-nunest-lon-190ml-1-lon', NULL, NULL, NULL, 200000.00, NULL, 'products/19193-378883.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6466, 11, 'Lốc nước yến có đường Nunest lon 190ml (6 Lon)', 'loc-nuoc-yen-co-duong-nunest-lon-190ml-6-lon', NULL, NULL, NULL, 174000.00, NULL, 'products/19192-378884.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6467, 11, 'Lốc nước yến đường ăn kiêng Nunest lon 190ml (6 Lon)', 'loc-nuoc-yen-duong-an-kieng-nunest-lon-190ml-6-lon', NULL, NULL, NULL, 11000.00, NULL, 'products/19194-378883.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6468, 11, 'Nước yến sào chưng đường phèn Green Bird lon 240ml (1 Lon)', 'nuoc-yen-sao-chung-duong-phen-green-bird-lon-240ml-1-lon', NULL, NULL, NULL, 102000.00, NULL, 'products/8936071090034.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6469, 12, 'Nước lau sàn tinh dầu thảo mộc hoa lily hương thảo Sunlight chai 1kg', 'nuoc-lau-san-tinh-dau-thao-moc-hoa-lily-huong-thao-sunlight-chai-1kg', NULL, NULL, NULL, 35000.00, NULL, 'products/492814-8934868162445.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27');
INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `short_desc`, `unit`, `price`, `old_price`, `image`, `gallery`, `stock`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(6470, 12, 'Nước lau sàn tinh dầu thảo mộc hoa hạ bạc hà Sunlight chai 1kg', 'nuoc-lau-san-tinh-dau-thao-moc-hoa-ha-bac-ha-sunlight-chai-1kg', NULL, NULL, NULL, 35000.00, NULL, 'products/492811-8934868162407.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6471, 12, 'Nước rửa chén trà xanh Sunlight chai 750g (1 Chai)', 'nuoc-rua-chen-tra-xanh-sunlight-chai-750g-1-chai', NULL, NULL, NULL, 35000.00, NULL, 'products/8934868182573.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6472, 12, 'Nước rửa chén thiên nhiên lô hội Sunlight chai 750g (1 Chai)', 'nuoc-rua-chen-thien-nhien-lo-hoi-sunlight-chai-750g-1-chai', NULL, NULL, NULL, 35000.00, NULL, 'products/8934868182634.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6473, 12, 'Nước rửa chén Sunlight chanh chai 750g', 'nuoc-rua-chen-sunlight-chanh-chai-750g', NULL, NULL, NULL, 28000.00, NULL, 'products/492857-8934868172437.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6474, 12, 'Nước lau sàn hương bạc hà Gift chai 1L (1 Chai)', 'nuoc-lau-san-huong-bac-ha-gift-chai-1l-1-chai', NULL, NULL, NULL, 33000.00, NULL, 'products/8936013254036.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6475, 12, 'Nước giặt sạch thơm hương ngàn hoa Lix túi 3.2kg (1 Túi)', 'nuoc-giat-sach-thom-huong-ngan-hoa-lix-tui-3-2kg-1-tui', NULL, NULL, NULL, 195000.00, NULL, 'products/538321-381295.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6476, 12, 'Nước giặt sạch thơm hương nắng hạ Lix túi 3.2kg (1 Túi)', 'nuoc-giat-sach-thom-huong-nang-ha-lix-tui-3-2kg-1-tui', NULL, NULL, NULL, 195000.00, NULL, 'products/538320-381298.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6477, 12, 'Chai thả bồn cầu toilet hương ngàn hoa Blue 180g (1 Chai)', 'chai-tha-bon-cau-toilet-huong-ngan-hoa-blue-180g-1-chai', NULL, NULL, NULL, 52000.00, NULL, 'products/8809174900138.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6478, 12, 'Nước rửa chén chiết xuất chanh Blue túi 3.2L (1 Túi)', 'nuoc-rua-chen-chiet-xuat-chanh-blue-tui-3-2l-1-tui', NULL, NULL, NULL, 92000.00, NULL, 'products/8936156731630.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6479, 12, 'Nước giặt xả Swat 5 trong 1 dưỡng vải chống nhăn túi 3.5kg', 'nuoc-giat-xa-swat-5-trong-1-duong-vai-chong-nhan-tui-3-5kg', NULL, NULL, NULL, 190000.00, NULL, 'products/486973-8936097336345.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6480, 12, 'Nước giặt xả Swat 5in1 phơi trong nhà túi 3.5kg', 'nuoc-giat-xa-swat-5in1-phoi-trong-nha-tui-3-5kg', NULL, NULL, NULL, 190000.00, NULL, 'products/486751-8936097336338.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6481, 12, 'Nước giặt xả hương sớm mai Santorini Juno can 2.2kg (1 Can)', 'nuoc-giat-xa-huong-som-mai-santorini-juno-can-2-2kg-1-can', NULL, NULL, NULL, 169000.00, NULL, 'products/625301-Concept_300_DEALS_10.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6482, 12, 'Giấy vệ sinh VinaRoll 3 lớpkhông lõi Premier lốc 6 cuộn', 'giay-ve-sinh-vinaroll-3-lopkhong-loi-premier-loc-6-cuon', NULL, NULL, NULL, 66000.00, NULL, 'products/3218-96024.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6483, 12, 'Viên giặt 3 trong 1 hương tươi mát Omo túi 315g (1 Túi)', 'vien-giat-3-trong-1-huong-tuoi-mat-omo-tui-315g-1-tui', NULL, NULL, NULL, 133000.00, NULL, 'products/8934868190356.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6484, 12, 'Nước giặt cửa trên sạch thơm vượt trội Omo túi 2.9kg (1 Túi)', 'nuoc-giat-cua-tren-sach-thom-vuot-troi-omo-tui-2-9kg-1-tui', NULL, NULL, NULL, 87000.00, NULL, 'products/8934868196297.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6485, 12, 'Combo 2 nước giặt thiên nhiên thanh khiết hương anh đào COMFORT túi 3kg x 2', 'combo-2-nuoc-giat-thien-nhien-thanh-khiet-huong-anh-dao-comfort-tui-3kg-x-2', NULL, NULL, NULL, 540000.00, NULL, 'products/632053-89348681903942.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6486, 12, 'Viên giặt 3 trong 1 hương tinh tế Omo túi 315g (1 Túi)', 'vien-giat-3-trong-1-huong-tinh-te-omo-tui-315g-1-tui', NULL, NULL, NULL, 133000.00, NULL, 'products/626078-8934868190325.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6487, 12, 'Combo 2 túi viên giặt 3 trong 1 hương tinh tế Omo túi 315g (2 Túi)', 'combo-2-tui-vien-giat-3-trong-1-huong-tinh-te-omo-tui-315g-2-tui', NULL, NULL, NULL, 163000.00, NULL, 'products/633335-10560.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6488, 12, 'Combo giặt xả: Nước giặt Blue Deep clean 2.1L và nước xả vải hương thanh xuân 2.1L', 'combo-giat-xa-nuoc-giat-blue-deep-clean-2-1l-va-nuoc-xa-vai-huong-thanh-xuan-2-1l', NULL, NULL, NULL, 265000.00, NULL, 'products/657474-45.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6489, 12, 'Nước giặt deep clean Blue hương thanh xuân túi 2.1L', 'nuoc-giat-deep-clean-blue-huong-thanh-xuan-tui-2-1l', NULL, NULL, NULL, 125000.00, NULL, 'products/536865-8936156731111.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6490, 12, 'Combo 2 nước giặt deep clean Blue hương thanh xuân túi 2.1L', 'combo-2-nuoc-giat-deep-clean-blue-huong-thanh-xuan-tui-2-1l', NULL, NULL, NULL, 250000.00, NULL, 'products/632941-8936156731111_-_Copy.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6491, 12, 'Nước giặt thiên nhiên thanh khiết hương anh đào Comfort túi 3kg (1 Túi)', 'nuoc-giat-thien-nhien-thanh-khiet-huong-anh-dao-comfort-tui-3kg-1-tui', NULL, NULL, NULL, 270000.00, NULL, 'products/8934868190394.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6492, 12, 'Combo 2 túi nước giặt sạch thơm hương ngàn hoa Lix túi 3.2kg', 'combo-2-tui-nuoc-giat-sach-thom-huong-ngan-hoa-lix-tui-3-2kg', NULL, NULL, NULL, 390000.00, NULL, 'products/619352-8934669241370.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6493, 12, 'Nước xả vải hương thanh xuân Blue túi 2.1L (1 Túi)', 'nuoc-xa-vai-huong-thanh-xuan-blue-tui-2-1l-1-tui', NULL, NULL, NULL, 140000.00, NULL, 'products/538355-381748.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6494, 12, 'Combo 2 Nước giặt Lix siêu sạch hương hoa anh đào 2.4kg + Nước rửa chén Sunlight thiên nhiên lô hội 750g', 'combo-2-nuoc-giat-lix-sieu-sach-huong-hoa-anh-dao-2-4kg-nuoc-rua-chen-sunlight-thien-nhien-lo-hoi-750g', NULL, NULL, NULL, 205000.00, NULL, 'products/657464-40.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6495, 12, 'Nước giặt hương nước hoa Surf túi 3.1kg', 'nuoc-giat-huong-nuoc-hoa-surf-tui-3-1kg', NULL, NULL, NULL, 149000.00, NULL, 'products/492795-8934868159230.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6496, 12, 'Combo 3 bột giặt sạch thơm 24H ngát hương túi 5.5kg x 3', 'combo-3-bot-giat-sach-thom-24h-ngat-huong-tui-5-5kg-x-3', NULL, NULL, NULL, 585000.00, NULL, 'products/632534-89346692406873.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6497, 12, 'Nước giặt xả hương nước hoa Pháp quyến rũ Power100 túi 3.2kg (1 Túi)', 'nuoc-giat-xa-huong-nuoc-hoa-phap-quyen-ru-power100-tui-3-2kg-1-tui', NULL, NULL, NULL, 163000.00, NULL, 'products/8934939007798.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6498, 12, 'Nước giặt hương nắng sớm cửa trước Ariel túi 2.5kg (1 TÚI)', 'nuoc-giat-huong-nang-som-cua-truoc-ariel-tui-2-5kg-1-tui', NULL, NULL, NULL, 189000.00, NULL, 'products/14979-4987176200730.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6499, 12, 'Viên giặt xả huyền diệu Maxkleen túi 34 viên x 15g (1 Gói)', 'vien-giat-xa-huyen-dieu-maxkleen-tui-34-vien-x-15g-1-goi', NULL, NULL, NULL, 140000.00, NULL, 'products/554859-8935212830737.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6500, 12, 'Nước giặt hương Downy nước hoa cửa trên Ariel túi 2.5kg (1 TÚI)', 'nuoc-giat-huong-downy-nuoc-hoa-cua-tren-ariel-tui-2-5kg-1-tui', NULL, NULL, NULL, 189000.00, NULL, 'products/14980-4987176200747.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6501, 12, 'Combo 2 nước giặt hương nước hoa SURF túi 3.1kg x 2', 'combo-2-nuoc-giat-huong-nuoc-hoa-surf-tui-3-1kg-x-2', NULL, NULL, NULL, 298000.00, NULL, 'products/632072-89348681592302.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6502, 12, 'Bột giặt sạch thơm 24h ngát hương Lix túi 5.5kg (1 Túi)', 'bot-giat-sach-thom-24h-ngat-huong-lix-tui-5-5kg-1-tui', NULL, NULL, NULL, 195000.00, NULL, 'products/608318-8934669240687.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6503, 12, 'Combo 2 bột giặt sạch thơm 24H ngát hương túi 5.5kg x 2', 'combo-2-bot-giat-sach-thom-24h-ngat-huong-tui-5-5kg-x-2', NULL, NULL, NULL, 390000.00, NULL, 'products/632533-89346692406872.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6504, 12, 'Viên giặt xả dấu ấn ngọt ngào Maxkleen túi 34 viên x 15g (1 Túi)', 'vien-giat-xa-dau-an-ngot-ngao-maxkleen-tui-34-vien-x-15g-1-tui', NULL, NULL, NULL, 140000.00, NULL, 'products/8935212830911.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6505, 12, 'Combo 2 túi Viên giặt xả huyền diệu Maxkleen túi 34 viên x 15g (2 túi)', 'combo-2-tui-vien-giat-xa-huyen-dieu-maxkleen-tui-34-vien-x-15g-2-tui', NULL, NULL, NULL, 280000.00, NULL, 'products/606930-8935212830737_2.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6506, 12, 'Nước rửa chén Blue chiết xuất gạo túi 2.1L', 'nuoc-rua-chen-blue-chiet-xuat-gao-tui-2-1l', NULL, NULL, NULL, 76500.00, NULL, 'products/536835-8936156730473.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6507, 12, 'Nước giặt siêu sạch hương hoa anh đào Lix túi 2.4kg (1 Túi)', 'nuoc-giat-sieu-sach-huong-hoa-anh-dao-lix-tui-2-4kg-1-tui', NULL, NULL, NULL, 85000.00, NULL, 'products/8934669260302.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6508, 12, 'Nước giặt Matic giữ màu bền đẹp cửa trước Omo túi 4.1kg (1 Túi)', 'nuoc-giat-matic-giu-mau-ben-dep-cua-truoc-omo-tui-4-1kg-1-tui', NULL, NULL, NULL, 258000.00, NULL, 'products/492780-8934868185277.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6509, 12, 'Nước giặt Comfort tinh dầu nước hoa tinh tế cửa trên Omo túi 4.1kg (1 Túi)', 'nuoc-giat-comfort-tinh-dau-nuoc-hoa-tinh-te-cua-tren-omo-tui-4-1kg-1-tui', NULL, NULL, NULL, 258000.00, NULL, 'products/492763-8934868184430.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6510, 12, 'Nước giặt hương đam mê cửa trước Ariel túi 3.05kg (1 Túi)', 'nuoc-giat-huong-dam-me-cua-truoc-ariel-tui-3-05kg-1-tui', NULL, NULL, NULL, 237000.00, NULL, 'products/311324-380295.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6511, 12, 'Combo 2 nước giặt cửa trước hương hoa oải hương thư thái Omo túi 2.1kg x 2', 'combo-2-nuoc-giat-cua-truoc-huong-hoa-oai-huong-thu-thai-omo-tui-2-1kg-x-2', NULL, NULL, NULL, 310000.00, NULL, 'products/632950-8934868190721_-_Copy.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6512, 12, 'Nước giặt cửa trước hương hoa oải hương thư thái Omo túi 2.1kg (1 Túi)', 'nuoc-giat-cua-truoc-huong-hoa-oai-huong-thu-thai-omo-tui-2-1kg-1-tui', NULL, NULL, NULL, 155000.00, NULL, 'products/8934868190721.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6513, 12, 'Nước xả vải Comfort đậm đặc hương nước hoa diệu kỳ túi 3.1L', 'nuo-c-xa-va-i-comfort-dam-dac-huong-nuo-c-hoa-die-u-ky-tu-i-3-1l', NULL, NULL, NULL, 238000.00, NULL, 'products/492679-8934868173038.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6514, 12, 'Nước giặt Matic hương nước hoa Lix túi 2.6kg (1 Túi)', 'nuoc-giat-matic-huong-nuoc-hoa-lix-tui-2-6kg-1-tui', NULL, NULL, NULL, 91000.00, NULL, 'products/608319-8934669241325.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6515, 12, 'Nước xả Comfort hương nước hoa tinh tế túi 3.1L', 'nuoc-xa-comfort-huong-nuoc-hoa-tinh-te-tui-3-1l', NULL, NULL, NULL, 238000.00, NULL, 'products/492669-8934868172970.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6516, 12, 'Viên giặt xả muối hồng Blue túi 13g x 48 viên', 'vien-giat-xa-muoi-hong-blue-tui-13g-x-48-vien', NULL, NULL, NULL, 225000.00, NULL, 'products/536823-8936156730763.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6517, 12, 'Combo 2 nước rửa chén cám gạo & Collagen Gift túi 3.6kg x 2', 'combo-2-nuoc-rua-chen-cam-gao-collagen-gift-tui-3-6kg-x-2', NULL, NULL, NULL, 220000.00, NULL, 'products/632531-89360132593692.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6518, 12, 'Nước rửa chén cám gạo & Collagen Gift túi 3.6kg (1 Túi)', 'nuoc-rua-chen-cam-gao-collagen-gift-tui-3-6kg-1-tui', NULL, NULL, NULL, 110000.00, NULL, 'products/8936013259369.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6519, 12, 'Combo 3 nước rửa chén cám gạo & Collagen Gift túi 3.6kg x 3', 'combo-3-nuoc-rua-chen-cam-gao-collagen-gift-tui-3-6kg-x-3', NULL, NULL, NULL, 330000.00, NULL, 'products/632532-89360132593693.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6520, 12, 'Nước rửa chén siêu sạch trà xanh Lix túi 3.2kg (1 Túi)', 'nuoc-rua-chen-sieu-sach-tra-xanh-lix-tui-3-2kg-1-tui', NULL, NULL, NULL, 79000.00, NULL, 'products/8934669492543.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6521, 12, 'Sáp thơm hương lavender thư giãn Ami hộp 200g', 'sap-thom-huong-lavender-thu-gian-ami-hop-200g', NULL, NULL, NULL, 131000.00, NULL, 'products/4081-370505.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6522, 12, 'Sáp thơm hương hoa lài Glade cái 180g (1 Cái)', 'sap-thom-huong-hoa-lai-glade-cai-180g-1-cai', NULL, NULL, NULL, 22000.00, NULL, 'products/8801328400525.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6523, 12, 'Sáp khử mùi hương sả Ambipur 180g (1 Cái)', 'sap-khu-mui-huong-sa-ambipur-180g-1-cai', NULL, NULL, NULL, 188000.00, NULL, 'products/2533-98268.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6524, 12, 'Xịt phòng hương lanvender Glade chai 280ml (1 Chai)', 'xit-phong-huong-lanvender-glade-chai-280ml-1-chai', NULL, NULL, NULL, 154000.00, NULL, 'products/8934889800364.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6525, 12, 'Sáp thơm hương hoa lavender Glade cái 180g (1 Cái)', 'sap-thom-huong-hoa-lavender-glade-cai-180g-1-cai', NULL, NULL, NULL, 47000.00, NULL, 'products/8801328400327.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6526, 12, 'Vệ sinh nhà tắm: Nước tẩy rửa nhà tắm siêu sạch 900ml và viên tẩy bồn cầu (4x55g)', 've-sinh-nha-tam-nuoc-tay-rua-nha-tam-sieu-sach-900ml-va-vien-tay-bon-cau-4x55g', NULL, NULL, NULL, 87000.00, NULL, 'products/657472-42.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6527, 12, 'Nước thông đường ống đậm đặc Smile Choice chai 1000ml (1 Chai)', 'nuoc-thong-duong-ong-dam-dac-smile-choice-chai-1000ml-1-chai', NULL, NULL, NULL, 75000.00, NULL, 'products/608321-8938505346151.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6528, 12, 'Nước tẩy rửa bồn cầu và nhà tắm VIM chai 880ml', 'nuoc-tay-rua-bon-cau-va-nha-tam-vim-chai-880ml', NULL, NULL, NULL, 39000.00, NULL, 'products/492883-8934868162353.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6529, 12, 'Gel tẩy bồn cầu và nhà tắm trắng sáng mùi dịu nhẹ hương chanh sả VIM chai 870ml', 'gel-tay-bon-cau-va-nha-tam-trang-sang-mui-diu-nhe-huong-chanh-sa-vim-chai-870ml', NULL, NULL, NULL, 39000.00, NULL, 'products/492877-8934868161455.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6530, 12, 'Tẩy nhà tắm siêu sạch Gift chai 900ml (1 Chai)', 'tay-nha-tam-sieu-sach-gift-chai-900ml-1-chai', NULL, NULL, NULL, 38000.00, NULL, 'products/8936013253039.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6531, 12, 'Nước lau sàn sạch thơm hương gừng và sả chanh Lix túi 3.2L (1 Túi)', 'nuoc-lau-san-sach-thom-huong-gung-va-sa-chanh-lix-tui-3-2l-1-tui', NULL, NULL, NULL, 65000.00, NULL, 'products/608316-8934669242186.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6532, 12, 'Nước lau sàn hương hoa ylang Gift túi 3.6kg (1 Túi)', 'nuoc-lau-san-huong-hoa-ylang-gift-tui-3-6kg-1-tui', NULL, NULL, NULL, 82900.00, NULL, 'products/8936013259253.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6533, 12, 'Bình xịt côn trùng không mùi Raid chai 600ml (1 Chai)', 'binh-xit-con-trung-khong-mui-raid-chai-600ml-1-chai', NULL, NULL, NULL, 42000.00, NULL, 'products/8934889240467.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6534, 12, 'Bình xịt côn trùng Jet Gold Ars chai 600ml (1 Chai)', 'binh-xit-con-trung-jet-gold-ars-chai-600ml-1-chai', NULL, NULL, NULL, 24000.00, NULL, 'products/18423-374908.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6535, 12, 'Bình xịt côn trùng Pink Ars chai 600ml (1 Chai)', 'binh-xit-con-trung-pink-ars-chai-600ml-1-chai', NULL, NULL, NULL, 76000.00, NULL, 'products/8936013257495.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6536, 12, 'Nước xả vải đậm đặc một lần xả hương ban mai Comfort chai 800ml (1 Chai)', 'nuoc-xa-vai-dam-dac-mot-lan-xa-huong-ban-mai-comfort-chai-800ml-1-chai', NULL, NULL, NULL, 143000.00, NULL, 'products/8934868150367.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6537, 12, 'Xịt côn trùng G hương cam chanh Jumbo Vape chai 600ml (1 Chai)', 'xit-con-trung-g-huong-cam-chanh-jumbo-vape-chai-600ml-1-chai', NULL, NULL, NULL, 134000.00, NULL, 'products/8934732202512.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6538, 12, 'Xịt lau kính Lix chai 650ml (1 Chai)', 'xit-lau-kinh-lix-chai-650ml-1-chai', NULL, NULL, NULL, 27000.00, NULL, 'products/608317-8934669600108.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6539, 12, 'Nước lau bếp bọt tuyết Power Farm Sunlight chai 500ml (1 Chai)', 'nuoc-lau-bep-bot-tuyet-power-farm-sunlight-chai-500ml-1-chai', NULL, NULL, NULL, 36000.00, NULL, 'products/8934868188193.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6540, 12, 'Bột soda vệ sinh đồ dùng bếp ARM & Hammer túi 500g', 'bot-soda-ve-sinh-do-dung-bep-arm-hammer-tui-500g', NULL, NULL, NULL, 100000.00, NULL, 'products/387874-033200002987.png', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6541, 12, 'Nước lau bếp chanh & baking soda Sunlight chai 500ml', 'nuoc-lau-bep-chanh-baking-soda-sunlight-chai-500ml', NULL, NULL, NULL, 35000.00, NULL, 'products/492843-8934868171836.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6542, 12, 'Nước tẩy đồ dùng nhà bếp dạng bọt Mitsuei chai 400ml', 'nuoc-tay-do-dung-nha-bep-dang-bot-mitsuei-chai-400ml', NULL, NULL, NULL, 20000.00, NULL, 'products/515161-8938505346137.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6543, 13, 'COMBO 6 JUNO - KHĂN ƯỚT VẢI TRƠN KHÔNG MÙI 100 TỜ', 'combo-6-juno-khan-uot-vai-tron-khong-mui-100-to', NULL, NULL, NULL, 270000.00, NULL, 'products/629933-deal_-_linh_6.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6544, 13, 'COMBO 2 HUGGIES - KHĂN ƯỚT LAU SẠCH DƯỠNG ẨM GÓI 72 MIẾNG', 'combo-2-huggies-khan-uot-lau-sach-duong-am-goi-72-mieng', NULL, NULL, NULL, 166000.00, NULL, 'products/632575-558020-8888336032092.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6545, 13, 'Combo 2 PREMIER - KHĂN GIẤY BẾP VINAROLL 2 LỚP LỐC 2 CUỘN', 'combo-2-premier-khan-giay-bep-vinaroll-2-lop-loc-2-cuon', NULL, NULL, NULL, 70000.00, NULL, 'products/631732-8938507729044.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6546, 13, 'Băng vệ sinh Kotex bảo vệ toàn diện ngày nhiều và đêm SMC 28cmx14 miếng (1 gói)', 'bang-ve-sinh-kotex-bao-ve-toan-dien-ngay-nhieu-va-dem-smc-28cmx14-mieng-1-goi', NULL, NULL, NULL, 185000.00, NULL, 'products/633242-8935107202816.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6547, 13, 'Khăn ướt vải trơn không mùi Juno gói 100 tờ (1 Gói)', 'khan-uot-vai-tron-khong-mui-juno-goi-100-to-1-goi', NULL, NULL, NULL, 45000.00, NULL, 'products/626098-8935361413126_2.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6548, 13, 'Màng bọc thực phẩm PE Stahaus cuộn 30cm x 50m (1 Hộp)', 'mang-boc-thuc-pham-pe-stahaus-cuon-30cm-x-50m-1-hop', NULL, NULL, NULL, 29000.00, NULL, 'products/626822-8936110570473_1.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6549, 13, 'Combo 3 Khăn giấy khô BLESS YOU 250 tờ x 3 + 2 Khăn giấy ướt Juno 100 tờ x 2', 'combo-3-khan-giay-kho-bless-you-250-to-x-3-2-khan-giay-uot-juno-100-to-x-2', NULL, NULL, NULL, 11000.00, NULL, 'products/OL1755761444360.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6550, 13, 'Combo khăn giấy: 3 gói khăn ăn À La Vie Bless You gói 100 tờ và 3 gói khăn ướt vải trơn Juno không mùi 100 tờ', 'combo-khan-giay-3-goi-khan-an-a-la-vie-bless-you-goi-100-to-va-3-goi-khan-uot-vai-tron-juno-khong-mui-100-to', NULL, NULL, NULL, 198000.00, NULL, 'products/657473-43.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6551, 13, 'Combo 3 lốc giấy vệ sinh À La Vie lốc 6 cuộn', 'combo-3-loc-giay-ve-sinh-a-la-vie-loc-6-cuon', NULL, NULL, NULL, 174000.00, NULL, 'products/629930-deal_-_linh_4.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6552, 13, 'Bếp an tâm: Mang bọc thực phẩm PE 30cm x 50m và nước rửa rau củ quả 500ml', 'bep-an-tam-mang-boc-thuc-pham-pe-30cm-x-50m-va-nuoc-rua-rau-cu-qua-500ml', NULL, NULL, NULL, 64000.00, NULL, 'products/657471-41.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6553, 13, 'Lốc túi giấy đa năng treo tường Gumi 360 tờ 4 lớp', 'loc-tui-giay-da-nang-treo-tuong-gumi-360-to-4-lop', NULL, NULL, NULL, 118000.00, NULL, 'products/20230-379487.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6554, 13, 'Khăn ướt cồn 50 miếng Letgreen gói 270g (1 Gói)', 'khan-uot-con-50-mieng-letgreen-goi-270g-1-goi', NULL, NULL, NULL, 38000.00, NULL, 'products/8936006857022.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6555, 13, 'Combo 2 lốc túi giấy đa năng treo tường Gumi 360 tờ 4 lớp', 'combo-2-loc-tui-giay-da-nang-treo-tuong-gumi-360-to-4-lop', NULL, NULL, NULL, 80000.00, NULL, 'products/633156-20230-379487.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6556, 13, 'Lốc giấy vệ sinh có lõi Premier Deluxe 1 tặng 1 (10 Cuộn)', 'loc-giay-ve-sinh-co-loi-premier-deluxe-1-tang-1-10-cuon', NULL, NULL, NULL, 137000.00, NULL, 'products/3709-366221.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6557, 13, 'Giấy vệ sinh Deluxe 3 lớp Premier lốc 10 cuộn (tặng 10 cuộn 2 lớp) (1 Lốc)', 'giay-ve-sinh-deluxe-3-lop-premier-loc-10-cuon-tang-10-cuon-2-lop-1-loc', NULL, NULL, NULL, 135000.00, NULL, 'products/629398-8938558491112.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6558, 13, 'Giấy vệ sinh À La Vie Bless You 2 lớp lốc 10 cuộn', 'giay-ve-sinh-a-la-vie-bless-you-2-lop-loc-10-cuon', NULL, NULL, NULL, 86000.00, NULL, 'products/2797-101569.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6559, 13, 'Pin AA SHD 1215 BP4 Eveready vỉ 6 viên', 'pin-aa-shd-1215-bp4-eveready-vi-6-vien', NULL, NULL, NULL, 129000.00, NULL, 'products/2932-91110.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6560, 13, 'Khăn giấy rút vinatissue 280 tờ 2 lớp Premier lốc 500g (1 Lốc)', 'khan-giay-rut-vinatissue-280-to-2-lop-premier-loc-500g-1-loc', NULL, NULL, NULL, 45000.00, NULL, 'products/471859-8938507729662.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6561, 13, 'Găng tay có móc treo 36cm 3M (1 Gói)', 'gang-tay-co-moc-treo-36cm-3m-1-goi', NULL, NULL, NULL, 130000.00, NULL, 'products/13955-377377.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6562, 13, 'Lô 3 túi đựng đen rác TBP size trung 55*65cm (36-39 cái)', 'lo-3-tui-dung-den-rac-tbp-size-trung-55-65cm-36-39-cai', NULL, NULL, NULL, 87000.00, NULL, 'products/420779-TBP_-_LO_3_TUI_RAC_EN_SIZE_TRUNG_5565CM_51_cai.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6563, 13, 'Túi rác có quai tự huỷ 50L Inochi lô 4 cuộn (1 lốc)', 'tui-rac-co-quai-tu-huy-50l-inochi-lo-4-cuon-1-loc', NULL, NULL, NULL, 70000.00, NULL, 'products/608370-8935275206050.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6564, 13, 'Pin AAA super heavy duty 1212 SW4 Eveready vỉ 4 viên', 'pin-aaa-super-heavy-duty-1212-sw4-eveready-vi-4-vien', NULL, NULL, NULL, 162000.00, NULL, 'products/2677-367191.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6565, 13, 'Túi bọc thực phẩm đa năng Tân Bách Phát 50 cái', 'tui-boc-thuc-pham-da-nang-tan-bach-phat-50-cai', NULL, NULL, NULL, 188000.00, NULL, 'products/407696-TBP_-_TUI_BOC_THUC_PHAM_A_NANG_50_CAI.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6566, 13, 'Pin Eveready Heavy Duty 1015 BP4 AA (1 Vỉ)', 'pin-eveready-heavy-duty-1015-bp4-aa-1-vi', NULL, NULL, NULL, 137000.00, NULL, 'products/2934-97441.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6567, 13, 'Khăn giấy rút soft pack Bless You 2 lớp gói 250 tờ', 'khan-giay-rut-soft-pack-bless-you-2-lop-goi-250-to', NULL, NULL, NULL, 143000.00, NULL, 'products/3214-96654.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6568, 13, 'Màng nhôm thực phẩm Stahaus cuộn 30cm x 5m (1 Hộp)', 'mang-nhom-thuc-pham-stahaus-cuon-30cm-x-5m-1-hop', NULL, NULL, NULL, 91000.00, NULL, 'products/19677-371226.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6569, 13, 'Khăn ướt vệ sinh không mùi Mamamy gói 100 tờ (1 Gói)', 'khan-uot-ve-sinh-khong-mui-mamamy-goi-100-to-1-goi', NULL, NULL, NULL, 52000.00, NULL, 'products/126092-376124.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6570, 13, 'Găng tay Stahaus tự huỷ sinh học size L hộp 100 cái', 'gang-tay-stahaus-tu-huy-sinh-hoc-size-l-hop-100-cai', NULL, NULL, NULL, 67000.00, NULL, 'products/560936-8936110570695.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6571, 13, 'Pin AAA super duty 1212 BP4 Eveready vỉ 6 viên', 'pin-aaa-super-duty-1212-bp4-eveready-vi-6-vien', NULL, NULL, NULL, 185000.00, NULL, 'products/2808-367048.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6572, 13, 'Túi đựng thực phẩm 1.4l 18 x 28cm Inochi (1 Cái)', 'tui-dung-thuc-pham-1-4l-18-x-28cm-inochi-1-cai', NULL, NULL, NULL, 62000.00, NULL, 'products/3076-369937.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6573, 13, 'Túi thực phẩm Shinsen 3l 25 x 35 cm Inochi (1 Cái)', 'tui-thuc-pham-shinsen-3l-25-x-35-cm-inochi-1-cai', NULL, NULL, NULL, 125000.00, NULL, 'products/2828-371133.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6574, 13, 'Túi rác màu có quai tự huỷ 10L Inochi lô 4 cuộn (1 lốc)', 'tui-rac-mau-co-quai-tu-huy-10l-inochi-lo-4-cuon-1-loc', NULL, NULL, NULL, 106000.00, NULL, 'products/608368-8935275206067.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6575, 13, 'Khăn giấy rút gói 150 tờ Fairy (1 Gói)', 'khan-giay-rut-goi-150-to-fairy-1-goi', NULL, NULL, NULL, 31000.00, NULL, 'products/5303-375990.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6576, 13, 'Chén mía 15cm Spriing lô 10 cái', 'chen-mia-15cm-spriing-lo-10-cai', NULL, NULL, NULL, 14000.00, NULL, 'products/3074-368870.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6577, 13, 'Giấy vệ sinh À La Vie Bless You lốc 6 cuộn', 'giay-ve-sinh-a-la-vie-bless-you-loc-6-cuon', NULL, NULL, NULL, 163000.00, NULL, 'products/639-368167.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6578, 13, 'Lô 3 túi rác đen TBP size tiểu 45*55cm (51-54 cái)', 'lo-3-tui-rac-den-tbp-size-tieu-45-55cm-51-54-cai', NULL, NULL, NULL, 55000.00, NULL, 'products/469174-TBP_-_LO_3_TUI_RAC_EN_SIZE_TIEU_4555CM_63_cai.png', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6579, 13, 'Màng bọc thực phẩm PVC Táo 30cm x 300m Morning Wrap (1 Hộp)', 'mang-boc-thuc-pham-pvc-tao-30cm-x-300m-morning-wrap-1-hop', NULL, NULL, NULL, 37000.00, NULL, 'products/2814-95157.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6580, 13, 'Túi lọc rác Tân Bách Phát 100 cái', 'tui-loc-rac-tan-bach-phat-100-cai', NULL, NULL, NULL, 23000.00, NULL, 'products/538404-8936050070842.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6581, 13, 'Giấy vệ sinh classic Pulppy lốc 10 cuộn', 'giay-ve-sinh-classic-pulppy-loc-10-cuon', NULL, NULL, NULL, 131000.00, NULL, 'products/2410-101157.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6582, 13, 'Túi rác Inochi có quai, tự hủy tiện dụng 25L bịch 25 cái (1 cái)', 'tui-rac-inochi-co-quai-tu-huy-tien-dung-25l-bich-25-cai-1-cai', NULL, NULL, NULL, 102000.00, NULL, 'products/608369-8935275206012.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6583, 13, 'Khăn giấy lụa À La Vie Bless You 2 lớp hộp 180 tờ', 'khan-giay-lua-a-la-vie-bless-you-2-lop-hop-180-to', NULL, NULL, NULL, 142000.00, NULL, 'products/2928-367357.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6584, 13, 'Tăm tre hộp Spriing hộp 50g (1 Hộp)', 'tam-tre-hop-spriing-hop-50g-1-hop', NULL, NULL, NULL, 11000.00, NULL, 'products/2963-93245.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6585, 13, 'Pin Max AAA E92 BP4+2 Energizer vỉ 100g (1 Vỉ)', 'pin-max-aaa-e92-bp4-2-energizer-vi-100g-1-vi', NULL, NULL, NULL, 167000.00, NULL, 'products/8888021206241.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6586, 13, 'Ly giấy 360ml Casavi bộ 20 cái (1 Bộ 1)', 'ly-giay-360ml-casavi-bo-20-cai-1-bo-1', NULL, NULL, NULL, 101000.00, NULL, 'products/2763-369277.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6587, 13, 'Đĩa bả mía dùng 1 lần 22 cm Spriing lô 10 cái', 'dia-ba-mia-dung-1-lan-22-cm-spriing-lo-10-cai', NULL, NULL, NULL, 152000.00, NULL, 'products/2941-92396.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6588, 13, 'Lốc 30 đũa Tre dùng 1 lần Spriing (1 Cái)', 'loc-30-dua-tre-dung-1-lan-spriing-1-cai', NULL, NULL, NULL, 162000.00, NULL, 'products/1742-367363.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6589, 13, 'Cước inox bằng thép không gỉ 3M gói 2 miếng (1 Gói)', 'cuoc-inox-bang-thep-khong-gi-3m-goi-2-mieng-1-goi', NULL, NULL, NULL, 190000.00, NULL, 'products/535257-8935107573794.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6590, 13, 'Khăn lau đa năng Eufood 25 x 50cm cuộn 33 cái', 'khan-lau-da-nang-eufood-25-x-50cm-cuon-33-cai', NULL, NULL, NULL, 19000.00, NULL, 'products/3084-93027.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6591, 13, 'Cây chà sàn và gạt nước 3M (1 Cái)', 'cay-cha-san-va-gat-nuoc-3m-1-cai', NULL, NULL, NULL, 54000.00, NULL, 'products/13950-377381.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6592, 14, 'Bánh mì hoa cúc ngàn lớp Richy gói 120g (1 Gói)', 'banh-mi-hoa-cuc-ngan-lop-richy-goi-120g-1-goi', NULL, NULL, NULL, 25500.00, NULL, 'products/14070-377313.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6593, 14, 'Bánh mì hoa cúc ngàn lớp nam việt quất Fe\'sta gói 140g (1 Gói)', 'banh-mi-hoa-cuc-ngan-lop-nam-viet-quat-fe-sta-goi-140g-1-goi', NULL, NULL, NULL, 35000.00, NULL, 'products/8936047440337.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6594, 14, 'Bánh su kem Savoure hộp 150g (1 Hộp)', 'banh-su-kem-savoure-hop-150g-1-hop', NULL, NULL, NULL, 35000.00, NULL, 'products/8936076279328.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6595, 14, 'Combo bánh mì YAMAZAKI + trứng HAPPY EGG 54–60g (1 combo)', 'combo-banh-mi-yamazaki-trung-happy-egg-54-60g-1-combo', NULL, NULL, NULL, 70500.00, NULL, 'products/OL1755657992999.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6596, 14, 'Combo bánh mì YAMAZAKI + trứng GFOOD premium 52–58g (1 combo)', 'combo-banh-mi-yamazaki-trung-gfood-premium-52-58g-1-combo', NULL, NULL, NULL, 70500.00, NULL, 'products/OL1755657993000.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6597, 14, 'Combo Bánh mì Yamazaki + Trứng gà TAFA (1 Combo)', 'combo-banh-mi-yamazaki-trung-ga-tafa-1-combo', NULL, NULL, NULL, 70500.00, NULL, 'products/631733-Copy_of_Copy_of_Copy_of_template_1.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6598, 14, 'Combo bánh mì YAMAZAKI + trứng QL 55g (1 Combo)', 'combo-banh-mi-yamazaki-trung-ql-55g-1-combo', NULL, NULL, NULL, 70500.00, NULL, 'products/OL1755657993001.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6599, 14, 'Bánh mì Cheese Cake 105g (1 Cái)', 'banh-mi-cheese-cake-105g-1-cai', NULL, NULL, NULL, 39000.00, NULL, 'products/620050-8801068038262.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6600, 14, 'Bánh phô mai dưa lưới Mr. Chef\'s Samlip gói 105g (1 Gói)', 'banh-pho-mai-dua-luoi-mr-chef-s-samlip-goi-105g-1-goi', NULL, NULL, NULL, 39000.00, NULL, 'products/8801068931532.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6601, 14, 'Bánh Sandwich yến mạch hạt nảy mầm Momiji gói 300g (1 Gói)', 'banh-sandwich-yen-mach-hat-nay-mam-momiji-goi-300g-1-goi', NULL, NULL, NULL, 30000.00, NULL, 'products/618252-8934760210510-04.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6602, 14, 'Bánh sầu riêng Bảo Hân 75g (1 Cái)', 'banh-sau-rieng-bao-han-75g-1-cai', NULL, NULL, NULL, 19000.00, NULL, 'products/8938510341806.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6603, 14, 'Bánh khoai lang tím Bảo Hân 75g (1 Cái)', 'banh-khoai-lang-tim-bao-han-75g-1-cai', NULL, NULL, NULL, 19000.00, NULL, 'products/8938510341370.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6604, 14, 'Bánh Cheese Sausage BMQ 90g (1 Cái)', 'banh-cheese-sausage-bmq-90g-1-cai', NULL, NULL, NULL, 29000.00, NULL, 'products/SP001506.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6605, 14, 'Bánh Cadé Bun BMQ 75g (1 Cái)', 'banh-cade-bun-bmq-75g-1-cai', NULL, NULL, NULL, 25000.00, NULL, 'products/SP001509.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6606, 14, 'Bánh Red Bean Bun BMQ 75g (1 Cái)', 'banh-red-bean-bun-bmq-75g-1-cai', NULL, NULL, NULL, 22000.00, NULL, 'products/SP001512.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6607, 14, 'Bánh cua phô mai BMQ hộp 90g (1 Hộp)', 'banh-cua-pho-mai-bmq-hop-90g-1-hop', NULL, NULL, NULL, 35000.00, NULL, 'products/SP001507.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6608, 14, 'Bánh Cheese Bun BMQ 60g (1 Cái)', 'banh-cheese-bun-bmq-60g-1-cai', NULL, NULL, NULL, 22000.00, NULL, 'products/SP001505.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6609, 14, 'Bánh mì chà bông Staff gói 60g', 'banh-mi-cha-bong-staff-goi-60g', NULL, NULL, NULL, 113000.00, NULL, 'products/618269-8934760212088-04.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6610, 14, 'Sandwich dinh dưỡng nguyên cám 6 miếng Sweethome gói 200g (1 Gói)', 'sandwich-dinh-duong-nguyen-cam-6-mieng-sweethome-goi-200g-1-goi', NULL, NULL, NULL, 42000.00, NULL, 'products/626345-8936110051415.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6611, 14, 'Sữa đậu nành Ichiban chai 800ml', 'sua-dau-nanh-ichiban-chai-800ml', NULL, NULL, NULL, 178000.00, NULL, 'products/620073-8936000750855_1.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6612, 14, 'Bánh sandwich tươi lạt Otto cái 220g', 'banh-sandwich-tuoi-lat-otto-cai-220g', NULL, NULL, NULL, 94000.00, NULL, 'products/618241-8935006356337-04.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6613, 14, 'Bánh mì phô mai tan chảy Sweethome 150g (1 Cái)', 'banh-mi-pho-mai-tan-chay-sweethome-150g-1-cai', NULL, NULL, NULL, 137000.00, NULL, 'products/618593-8936110051705.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6614, 14, 'Bánh mì sandwich Staff gói 275g', 'banh-mi-sandwich-staff-goi-275g', NULL, NULL, NULL, 11000.00, NULL, 'products/618220-8934760212842-04.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6615, 14, 'Chè bưởi TNT ly 140g (1 Ly)', 'che-buoi-tnt-ly-140g-1-ly', NULL, NULL, NULL, 179000.00, NULL, 'products/618178-8936176751007-04.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6616, 14, 'Sandwich lạt Sweethome gói 6 miếng', 'sandwich-lat-sweethome-goi-6-mieng', NULL, NULL, NULL, 87000.00, NULL, 'products/618598-8936110050456-04.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6617, 14, 'Bánh hình cua (Croissant Mini) Savoure Cái 135g', 'banh-hinh-cua-croissant-mini-savoure-cai-135g', NULL, NULL, NULL, 159000.00, NULL, 'products/618232-8936076270318-04.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6618, 14, 'Bánh sandwich tươi lạt Otto 450g', 'banh-sandwich-tuoi-lat-otto-450g', NULL, NULL, NULL, 144000.00, NULL, 'products/618229-8935006356320-04.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6619, 14, 'Bánh mì bi sữa Sweethome gói 200g', 'banh-mi-bi-sua-sweethome-goi-200g', NULL, NULL, NULL, 69000.00, NULL, 'products/620049-8936110050418.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6620, 14, 'Sandwich khoai tây gạo lứt Momiji túi 300g (1 Túi)', 'sandwich-khoai-tay-gao-lut-momiji-tui-300g-1-tui', NULL, NULL, NULL, 33000.00, NULL, 'products/618248-8934760210688-04.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6621, 14, 'Tàu hủ lá dứa Nắng Mai hộp 180g (1 Hộp)', 'tau-hu-la-dua-nang-mai-hop-180g-1-hop', NULL, NULL, NULL, 36000.00, NULL, 'products/618197-8938549562029_1_hop-04.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6622, 14, 'Tàu hủ truyền thống Nắng Mai hộp 180g (1 Hộp)', 'tau-hu-truyen-thong-nang-mai-hop-180g-1-hop', NULL, NULL, NULL, 51000.00, NULL, 'products/618201-8938549562043_1_hop_04.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6623, 14, 'Bánh mì trắng 5 lát Yamazaki 219g (1 Cái)', 'banh-mi-trang-5-lat-yamazaki-219g-1-cai', NULL, NULL, NULL, 113000.00, NULL, 'products/18314-378491.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6624, 14, 'Bánh mì hoa cúc Otto gói 300g', 'banh-mi-hoa-cuc-otto-goi-300g', NULL, NULL, NULL, 40000.00, NULL, 'products/618236-8935006360006-04.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6625, 14, 'Thanh gạo lứt hạnh nhân chà bông FNV gói 120g (1 Gói)', 'thanh-gao-lut-hanh-nhan-cha-bong-fnv-goi-120g-1-goi', NULL, NULL, NULL, 70000.00, NULL, 'products/629117-8938530499396.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6626, 14, 'Bánh tráng nướng Mikiri gói 135g', 'banh-trang-nuong-mikiri-goi-135g', NULL, NULL, NULL, 115000.00, NULL, 'products/17832-94739.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6627, 14, 'Bánh tráng mắm ruốc Vị gói 125g', 'banh-trang-mam-ruoc-vi-goi-125g', NULL, NULL, NULL, 146000.00, NULL, 'products/618594-8938530880002.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6628, 14, 'Chân gà bách thảo Heyyo gói 40g', 'chan-ga-bach-thao-heyyo-goi-40g', NULL, NULL, NULL, 60000.00, NULL, 'products/18172-368301.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6629, 15, 'Pate cột đèn Hải Phòng Hạ Long Canfoco hộp 150g (1 hộp)', 'pate-cot-den-hai-phong-ha-long-canfoco-hop-150g-1-hop', NULL, NULL, NULL, 29000.00, NULL, 'products/1810-94613.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6630, 15, 'Thịt hộp hormel spam classic Spam hộp 340g (1 Hộp)', 'thit-hop-hormel-spam-classic-spam-hop-340g-1-hop', NULL, NULL, NULL, 137000.00, NULL, 'products/15915-95294.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6631, 15, 'Combo hộp pate cột đèn Hải Phòng Hạ Long Canfoco 150g (5 Hộp)', 'combo-hop-pate-cot-den-hai-phong-ha-long-canfoco-150g-5-hop', NULL, NULL, NULL, 145000.00, NULL, 'products/630327-8938543282053_5.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6632, 15, 'Cá trích xốt cà Sardines hộp 155g (1 Hộp)', 'ca-trich-xot-ca-sardines-hop-155g-1-hop', NULL, NULL, NULL, 17000.00, NULL, 'products/8938501141477.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6633, 15, 'Heo 2 lát 3 Bông Mai hộp 150g (1 Hộp)', 'heo-2-lat-3-bong-mai-hop-150g-1-hop', NULL, NULL, NULL, 18000.00, NULL, 'products/315932-380467.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6634, 15, 'Combo 3 hộp pate cột đèn Hải Phòng Hạ Long Canfoco hộp 150g', 'combo-3-hop-pate-cot-den-hai-phong-ha-long-canfoco-hop-150g', NULL, NULL, NULL, 87000.00, NULL, 'products/633155-1810-94613.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6635, 15, 'Xúc xích tiệt trùng nhân phô mai nguyên bản Heo Cao Bồi hộp 384g (1 Hộp)', 'xuc-xich-tiet-trung-nhan-pho-mai-nguyen-ban-heo-cao-boi-hop-384g-1-hop', NULL, NULL, NULL, 89000.00, NULL, 'products/8936034877139.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6636, 15, 'Lạp xưởng Mai Quế Lộ Vissan gói 200g', 'lap-xuong-mai-que-lo-vissan-goi-200g', NULL, NULL, NULL, 49200.00, NULL, 'products/2465-370849.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6637, 15, 'Xúc xich Đức xông khói Nippon Con Heo Vàng gói 200g', 'xuc-xich-duc-xong-khoi-nippon-con-heo-vang-goi-200g', NULL, NULL, NULL, 13000.00, NULL, 'products/963-101935.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6638, 15, 'Xúc xích tiệt trùng heo CP gói 5 cây x 40g', 'xuc-xich-tiet-trung-heo-cp-goi-5-cay-x-40g', NULL, NULL, NULL, 124000.00, NULL, 'products/619558-8935058911683-02.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6639, 15, 'Xúc xích cocktail xông khói CP gói 250g', 'xuc-xich-cocktail-xong-khoi-cp-goi-250g', NULL, NULL, NULL, 134000.00, NULL, 'products/940-101062.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6640, 15, 'Xúc xích Vealz CP gói 250g', 'xuc-xich-vealz-cp-goi-250g', NULL, NULL, NULL, 74000.00, NULL, 'products/942-367112.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6641, 15, 'Xúc xích Vealz CP 10 cái gói 500g', 'xuc-xich-vealz-cp-10-cai-goi-500g', NULL, NULL, NULL, 86000.00, NULL, 'products/941-366975.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6642, 15, 'Xúc xích dinh dưỡng heo DHA Vissan hộp 5 cái x 35g', 'xuc-xich-dinh-duong-heo-dha-vissan-hop-5-cai-x-35g', NULL, NULL, NULL, 22000.00, NULL, 'products/619566-8934572183392-02.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6643, 15, 'Xúc xích tiệt trùng cay CP cây 60g', 'xuc-xich-tiet-trung-cay-cp-cay-60g', NULL, NULL, NULL, 188000.00, NULL, 'products/619555-8935058913359-02.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6644, 15, 'Xúc xích hotdog HCT sụn gà ăn liền cây 28g', 'xuc-xich-hotdog-hct-sun-ga-an-lien-cay-28g', NULL, NULL, NULL, 133000.00, NULL, 'products/467966-Xuc_xich_hotdog_sun_ga_an_lien_HCT_cay_28g.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6645, 15, 'Xúc xích thịt heo Ponnie gói 4x70g (1 Gói)', 'xuc-xich-thit-heo-ponnie-goi-4x70g-1-goi', NULL, NULL, NULL, 89000.00, NULL, 'products/14985-377336.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6646, 15, 'Xúc xích phô mai CP gói 200g', 'xuc-xich-pho-mai-cp-goi-200g', NULL, NULL, NULL, 159000.00, NULL, 'products/899-371590.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6647, 15, 'Thịt heo hộp Tulip Pork Luncheon Meat Classic hộp 200g', 'thit-heo-hop-tulip-pork-luncheon-meat-classic-ho-p-200g', NULL, NULL, NULL, 56000.00, NULL, 'products/2817-101959.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6648, 15, 'Xúc xích Frankfurter CP gói 200g', 'xuc-xich-frankfurter-cp-goi-200g', NULL, NULL, NULL, 157000.00, NULL, 'products/939-366431.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6649, 15, 'Xúc xích vườn bia Le Gourmet 10cm gói 200g', 'xuc-xich-vuon-bia-le-gourmet-10cm-goi-200g', NULL, NULL, NULL, 124000.00, NULL, 'products/624273-8935019503216_2.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6650, 15, 'Xúc xích hotdog HCT cay mala ăn liền cây 28g', 'xuc-xich-hotdog-hct-cay-mala-an-lien-cay-28g', NULL, NULL, NULL, 80000.00, NULL, 'products/467965-Xuc_xich_hotdog_HCT_cay_mala_an_lien_cay_28g.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6651, 15, 'Xúc xích tiệt trùng bò CP gói 5x40g', 'xuc-xich-tiet-trung-bo-cp-goi-5x40g', NULL, NULL, NULL, 10000.00, NULL, 'products/603633-8935058911744.webp', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6652, 15, 'Xúc xích hồ lô CP gói 250g (1 Gói)', 'xuc-xich-ho-lo-cp-goi-250g-1-goi', NULL, NULL, NULL, 141000.00, NULL, 'products/5316-376069.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6653, 15, 'Thịt hộp hormel Spam classic 198g', 'thit-hop-hormel-spam-classic-198g', NULL, NULL, NULL, 69000.00, NULL, 'products/409487-SPAM_-_THIT_HOP_HORMEL_SPAM_CLASSIC_HOP_198G.png', NULL, 100, 1, 1, '2025-09-24 08:59:46', '2025-09-25 10:56:27'),
(6654, 15, 'Xúc xích dinh dưỡng bò DHA 5 cây x 35g Vissan (1 hộp)', 'xuc-xich-dinh-duong-bo-dha-5-cay-x-35g-vissan-1-hop', NULL, NULL, NULL, 154000.00, NULL, 'products/17681-101276.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6655, 15, 'Xúc xích tiệt trùng heo Vissan hộp 5 cây x 18g (1 hộp)', 'xuc-xich-tie-t-tru-ng-heo-vissan-ho-p-5-cay-x-18g-1-hop', NULL, NULL, NULL, 39000.00, NULL, 'products/619559-8934572174413-02.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6656, 15, 'Xúc xích vườn bia CP gói 200g (1 Gói)', 'xuc-xich-vuon-bia-cp-goi-200g-1-goi', NULL, NULL, NULL, 88000.00, NULL, 'products/18343-93077.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6657, 15, 'Thịt hộp Hormel Spam less sodium 340g', 'thit-hop-hormel-spam-less-sodium-340g', NULL, NULL, NULL, 108000.00, NULL, 'products/037600596633_44176fd228d641838cfc4a8b8f3a6582_0c0d47820abb43cc84134aaff689ad98.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6658, 15, 'Lạp xưởng Mai Quế Lộ Vissan gói 500g', 'lap-xuong-mai-que-lo-vissan-goi-500g', NULL, NULL, NULL, 39000.00, NULL, 'products/2467-367969.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6659, 15, 'Cá ngừ ngâm dầu Hạ Long Canfoco hộp 175g', 'ca-ngu-ngam-dau-ha-long-canfoco-hop-175g', NULL, NULL, NULL, 140000.00, NULL, 'products/1809-92486.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6660, 15, 'Heo hầm Vissan hộp 150g (1 Hộp)', 'heo-ha-m-vissan-ho-p-150g-1-hop', NULL, NULL, NULL, 153000.00, NULL, 'products/2676-92681.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6661, 15, 'Thịt heo hộp Tulip Pork Luncheon Meat hộp 340g', 'thit-heo-hop-tulip-pork-luncheon-meat-ho-p-340g', NULL, NULL, NULL, 152000.00, NULL, 'products/2727-367316.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6662, 15, 'Xúc xích phô mai G gói 200g (1 Gói)', 'xuc-xich-pho-mai-g-goi-200g-1-goi', NULL, NULL, NULL, 19000.00, NULL, 'products/8936146440559.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6663, 15, 'Combo 3 hộp cá nục sốt cà (Nắp Giật) 3 Cô Gái Hộp 155g', 'combo-3-hop-ca-nuc-sot-ca-na-p-gia-t-3-co-gai-hop-155g', NULL, NULL, NULL, 58500.00, NULL, 'products/633154-8938501141019.webp', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6664, 15, 'Lạp xưởng tôm Vissan gói 200g', 'lap-xuong-tom-vissan-goi-200g', NULL, NULL, NULL, 143000.00, NULL, 'products/2463-366686.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:46', '2025-09-25 10:22:14'),
(6665, 15, 'Pate thịt heo Vissan hộp 170g', 'pate-thit-heo-vissan-hop-170g', NULL, NULL, NULL, 128000.00, NULL, 'products/2674-100788.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6666, 16, 'Combo 3 nui gạo ống dài Nuffam gói 350g (3 Gói)', 'combo-3-nui-gao-ong-dai-nuffam-goi-350g-3-goi', NULL, NULL, NULL, 79800.00, NULL, 'products/664419-8936121051527-pCmCuStOm-300506942730666757-b19.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6667, 16, 'Combo 2 túi gạo thơm dẻo Neptune ST25 5kg và 2 túi nui ống 400g', 'combo-2-tui-gao-thom-deo-neptune-st25-5kg-va-2-tui-nui-ong-400g', NULL, NULL, NULL, 46000.00, NULL, 'products/633124-Template_hang_thung_3.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6668, 16, 'Combo 2 túi gạo thơm dẻo Neptune ST25 5kgx2 và 2 chai nước tương Nam Dương thượng hạng 210mlx2', 'combo-2-tui-gao-thom-deo-neptune-st25-5kgx2-va-2-chai-nuoc-tuong-nam-duong-thuong-hang-210mlx2', NULL, NULL, NULL, 419000.00, NULL, 'products/632954-25.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27');
INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `short_desc`, `unit`, `price`, `old_price`, `image`, `gallery`, `stock`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(6669, 16, 'Combo 2 túi Gạo thơm đặc sản ST25 Mê Gạo túi 5kg x 2 và 1 Chai dầu ăn đậu nành Coba 1 lít', 'combo-2-tui-gao-thom-dac-san-st25-me-gao-tui-5kg-x-2-va-1-chai-dau-an-dau-nanh-coba-1-lit', NULL, NULL, NULL, 455000.00, NULL, 'products/632957-28.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6670, 16, 'Gạo Nhật Japonica Neptune túi 5kg (2 Túi)', 'gao-nhat-japonica-neptune-tui-5kg-2-tui', NULL, NULL, NULL, 320000.00, NULL, 'products/632526-8.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6671, 16, 'Combo mì ý tiện lợi: 2 Mì Spaghetti Olivoila No.5 500g và sốt mì ý Heinz 470g', 'combo-mi-y-tien-loi-2-mi-spaghetti-olivoila-no-5-500g-va-sot-mi-y-heinz-470g', NULL, NULL, NULL, 151000.00, NULL, 'products/657482-51.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6672, 16, 'Combo 2 túi gạo thơm đặc sản ST25 Mê Gạo túi 5kg', 'combo-2-tui-gao-thom-dac-san-st25-me-gao-tui-5kg', NULL, NULL, NULL, 390000.00, NULL, 'products/621963-8938551363003_2.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6673, 16, 'Combo lứt: 2 Nui lứt Nuffam 210g và 2 Bún lứt Đại Lộc 255g', 'combo-lut-2-nui-lut-nuffam-210g-va-2-bun-lut-dai-loc-255g', NULL, NULL, NULL, 100000.00, NULL, 'products/657483-57.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6674, 16, 'Combo 2 túi gạo Cự Giải Home Rice túi 5kg', 'combo-2-tui-gao-cu-giai-home-rice-tui-5kg', NULL, NULL, NULL, 210000.00, NULL, 'products/625714-Group_273.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6675, 16, 'Gạo ST25 lúa tôm Kim Thiên Lộc túi 5kg (1 Túi)', 'gao-st25-lua-tom-kim-thien-loc-tui-5kg-1-tui', NULL, NULL, NULL, 195000.00, NULL, 'products/616148-Group_209.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6676, 16, 'Gạo ST25+ Vua Gạo túi 5KG (1 Túi)', 'gao-st25-vua-gao-tui-5kg-1-tui', NULL, NULL, NULL, 190000.00, NULL, 'products/632434-Group_217.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6677, 16, 'Nui gạo lứt Nuffam gói 210g (1 gói)', 'nui-gao-lut-nuffam-goi-210g-1-goi', NULL, NULL, NULL, 21500.00, NULL, 'products/607168-8936121051459.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6678, 16, 'Nui rau củ Nuffam gói 350g (1 Gói)', 'nui-rau-cu-nuffam-goi-350g-1-goi', NULL, NULL, NULL, 25000.00, NULL, 'products/8936121051541.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6679, 16, 'Nui ống dài thượng hạng Nuffam gói 400g (1 Gói)', 'nui-ong-dai-thuong-hang-nuffam-goi-400g-1-goi', NULL, NULL, NULL, 28000.00, NULL, 'products/14057-377443.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6680, 16, 'Nui gạo ống dài Nuffam gói 350g (1 Gói)', 'nui-gao-ong-dai-nuffam-goi-350g-1-goi', NULL, NULL, NULL, 26600.00, NULL, 'products/8936121051527.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6681, 16, 'Gạo thơm dẻo đặc biệt ST25+ Neptune túi 5kg (1 Túi)', 'gao-thom-deo-dac-biet-st25-neptune-tui-5kg-1-tui', NULL, NULL, NULL, 190000.00, NULL, 'products/632427-8938516870300_1.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6682, 16, 'Combo 2 túi gạo lài miên Mê Gạo túi 5kg (2 Túi)', 'combo-2-tui-gao-lai-mien-me-gao-tui-5kg-2-tui', NULL, NULL, NULL, 360000.00, NULL, 'products/657478-48.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6683, 16, 'Gạo lài miên Mê Gạo túi 5kg (1 Túi)', 'gao-lai-mien-me-gao-tui-5kg-1-tui', NULL, NULL, NULL, 180000.00, NULL, 'products/624822-8938551363102.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6684, 16, 'Gạo lứt thơm ST25 Vinh Hiển túi 1kg (1 Túi)', 'gao-lut-thom-st25-vinh-hien-tui-1kg-1-tui', NULL, NULL, NULL, 50500.00, NULL, 'products/125746-8938509043407.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6685, 16, 'Gạo lứt tím Vinh Hiển túi 1kg', 'gao-lut-tim-vinh-hien-tui-1kg', NULL, NULL, NULL, 50500.00, NULL, 'products/629-367277.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6686, 16, 'Combo 2 túi gạo thơm dẻo đặc biệt ST25 Neptune túi 5kg (2 Túi)', 'combo-2-tui-gao-thom-deo-dac-biet-st25-neptune-tui-5kg-2-tui', NULL, NULL, NULL, 380000.00, NULL, 'products/633160-Template_hang_thung_3_-_Copy.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6687, 16, 'Combo 2 túi gạo ST25+ Vua Gạo túi 5KG', 'combo-2-tui-gao-st25-vua-gao-tui-5kg', NULL, NULL, NULL, 380000.00, NULL, 'products/626341-8936121051589_1.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6688, 16, 'Combo 4 túi gạo thơm dẻo đặc biệt ST25+ Neptune túi 5kg (4 Túi)', 'combo-4-tui-gao-thom-deo-dac-biet-st25-neptune-tui-5kg-4-tui', NULL, NULL, NULL, 760000.00, NULL, 'products/629830-8938516870300_3.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6689, 16, 'Combo gạo lứt: Gạo lứt mix loại Vinh Hiển Thơm & Đỏ & Tím 1kgx3', 'combo-gao-lut-gao-lut-mix-loai-vinh-hien-thom-do-tim-1kgx3', NULL, NULL, NULL, 145000.00, NULL, 'products/657485-59.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6690, 16, 'Thùng mì chay lá đa 3 Miền gói 65g (30 Gói)', 'thung-mi-chay-la-da-3-mien-goi-65g-30-goi', NULL, NULL, NULL, 108000.00, NULL, 'products/18778-371441.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6691, 16, 'Combo lứt: 2 Gạo lứt Kim Thiên Lộc 1kg và 2 Bún lứt Đại Lộc 255g', 'combo-lut-2-gao-lut-kim-thien-loc-1kg-va-2-bun-lut-dai-loc-255g', NULL, NULL, NULL, 156000.00, NULL, 'products/657484-58.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6692, 16, 'Bột mì đa dụng Meizan gói 500g (1 Gói)', 'bot-mi-da-dung-meizan-goi-500g-1-goi', NULL, NULL, NULL, 16000.00, NULL, 'products/15459-377339.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6693, 16, 'Gạo phù sa Vua gạo túi 5kg (1 Túi)', 'gao-phu-sa-vua-gao-tui-5kg-1-tui', NULL, NULL, NULL, 145000.00, NULL, 'products/627132-Group_261.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6694, 16, 'Mì chay lá đa 3 Miền gói 65g (1 Gói)', 'mi-chay-la-da-3-mien-goi-65g-1-goi', NULL, NULL, NULL, 3600.00, NULL, 'products/619572-8936048470036-02.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6695, 16, 'Bột chiên giòn Tài Ký gói 150g (1 Gói)', 'bot-chien-gion-tai-ky-go-i-150g-1-goi', NULL, NULL, NULL, 11000.00, NULL, 'products/2327-100579.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6696, 16, 'Gạo thơm ST25+ A An túi 5kg (2 Túi)', 'gao-thom-st25-a-an-tui-5kg-2-tui', NULL, NULL, NULL, 380000.00, NULL, 'products/631330-deal_-_linh_16.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6697, 16, 'Gạo thơm ST25+ A An túi 5kg (1 Túi)', 'gao-thom-st25-a-an-tui-5kg-1-tui', NULL, NULL, NULL, 190000.00, NULL, 'products/632439-Group_253.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6698, 16, 'Gạo Cự Giải Home Rice túi 5kg (1 Túi)', 'gao-cu-giai-home-rice-tui-5kg-1-tui', NULL, NULL, NULL, 105000.00, NULL, 'products/625713-Group_257.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6699, 16, 'Gạo lứt đỏ Vinh Hiển túi 1Kg', 'gao-lu-t-do-vinh-hien-tu-i-1kg', NULL, NULL, NULL, 44000.00, NULL, 'products/2068-366265.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6700, 16, 'Lá kim cuốn cơm O\'Food gói 10g (1 Gói)', 'la-kim-cuon-com-o-food-go-i-10g-1-goi', NULL, NULL, NULL, 27500.00, NULL, 'products/544113-8935304200233.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6701, 16, 'Cháo yến chay rau nấm Yến Việt gói 50g (1 Gói)', 'chao-yen-chay-rau-nam-yen-viet-goi-50g-1-goi', NULL, NULL, NULL, 315000.00, NULL, 'products/14330-377583.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6702, 16, 'Rong biển cắt khúc Ottogi gói 20g', 'rong-bien-cat-khuc-ottogi-goi-20g', NULL, NULL, NULL, 26500.00, NULL, 'products/2341-370158.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6703, 16, 'Combo 2 gói đậu xanh không vỏ PMT gói 250g (2 Gói)', 'combo-2-goi-dau-xanh-khong-vo-pmt-go-i-250g-2-goi', NULL, NULL, NULL, 44000.00, NULL, 'products/665515-2566-102463.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6704, 16, 'Combo 2 đậu xanh hạt PMT gói 250g (2 Gói)', 'combo-2-dau-xanh-ha-t-pmt-go-i-250g-2-goi', NULL, NULL, NULL, 40000.00, NULL, 'products/665518-8938505002606.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6705, 16, 'Combo 2 đậu đỏ PMT gói 250g (2 Gói)', 'combo-2-dau-do-pmt-go-i-250g-2-goi', NULL, NULL, NULL, 47000.00, NULL, 'products/665520-8938505002521.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6706, 16, 'Combo 2 gói Đậu phộng PMT gói 250gx2', 'combo-2-goi-dau-phong-pmt-goi-250gx2', NULL, NULL, NULL, 54000.00, NULL, 'products/665527-635-97914.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6707, 16, 'Bột chiên chuối Tài Ký gói 150g (1 Gói)', 'bot-chien-chuoi-tai-ky-go-i-150g-1-goi', NULL, NULL, NULL, 12000.00, NULL, 'products/2329-95298.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6708, 16, 'Gạo thơm đặc sản ST25 Mê Gạo túi 5kg (1 Túi)', 'gao-thom-dac-san-st25-me-gao-tui-5kg-1-tui', NULL, NULL, NULL, 195000.00, NULL, 'products/617935-8938551363003.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6709, 16, 'Canh chua chay I.Soup túi 50g (1 Túi)', 'canh-chua-chay-i-soup-tui-50g-1-tui', NULL, NULL, NULL, 58000.00, NULL, 'products/5212-8936082342122.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6710, 16, 'Rong biển giòn trộn gia vị O\'food gói 40g (1 Gói)', 'rong-bien-gion-tron-gia-vi-o-food-goi-40g-1-goi', NULL, NULL, NULL, 39000.00, NULL, 'products/619570-8935304200240-02.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:14'),
(6711, 16, 'Yến mạch xay Dan D Pak gói 1kg (1 Gói)', 'ye-n-ma-ch-xay-dan-d-pak-go-i-1kg-1-goi', NULL, NULL, NULL, 150000.00, NULL, 'products/408378-b0644b87-a05c-49a8-b359-143ce174492f.png', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:15'),
(6712, 16, 'Yến mạch nguyên hạtDan D Pak gói 1kg (1 Gói)', 'ye-n-ma-ch-nguyen-ha-tdan-d-pak-go-i-1kg-1-goi', NULL, NULL, NULL, 162000.00, NULL, 'products/2421-90940.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:15'),
(6713, 16, 'Đậu phộng PMT gói 250g', 'dau-phong-pmt-goi-250g', NULL, NULL, NULL, 90000.00, NULL, 'products/635-97914.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:15'),
(6714, 16, 'Bột mì bánh bông lan Meizan gói 1kg (1 gói)', 'bot-mi-banh-bong-lan-meizan-goi-1kg-1-goi', NULL, NULL, NULL, 30000.00, NULL, 'products/8936055280345.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:15'),
(6715, 16, 'Bột bánh xèo Mikko Hương Xưa gói 500g', 'bot-banh-xeo-mikko-huong-xua-goi-500g', NULL, NULL, NULL, 186000.00, NULL, 'products/627115-8936013740331.webp', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:15'),
(6716, 16, 'Rong biển Hàn Quốc Miwon gói 50g (1 Gói)', 'rong-bien-han-quoc-miwon-goi-50g-1-goi', NULL, NULL, NULL, 70000.00, NULL, 'products/18537-378545.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:15'),
(6717, 16, 'Thùng mì ăn liền Hảo Hảo chay hương vị rau nấm ACECOOK 74g (30 Gói)', 'thung-mi-an-lien-hao-hao-chay-huong-vi-rau-nam-acecook-74g-30-goi', NULL, NULL, NULL, 126000.00, NULL, 'products/2862-93332.jpg', NULL, 100, 0, 1, '2025-09-24 08:59:47', '2025-09-25 10:22:15'),
(6718, 17, 'Giò tai lưỡi xào Ngọc Thơm gói 250g (1 Gói)', 'gio-tai-luoi-xao-ngoc-thom-goi-250g-1-goi', NULL, NULL, NULL, 67000.00, NULL, 'products/8938529045030.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6719, 17, 'Chả lụa Haha 500g (1 gói)', 'cha-lua-haha-500g-1-goi', NULL, NULL, NULL, 109000.00, NULL, 'products/607204-381704.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6720, 17, 'Chả bò kiểu Huế Hoa Doanh gói 200g (1 Gói)', 'cha-bo-kieu-hue-hoa-doanh-goi-200g-1-goi', NULL, NULL, NULL, 74000.00, NULL, 'products/311369-380311.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6721, 17, 'Mỳ ý sốt cà chua Pulmuone gói 520g (1 Gói)', 'my-y-sot-ca-chua-pulmuone-goi-520g-1-goi', NULL, NULL, NULL, 89000.00, NULL, 'products/6954463411573.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6722, 17, 'Giò thủ G gói 200g (1 Gói)', 'gio-thu-g-goi-200g-1-goi', NULL, NULL, NULL, 49000.00, NULL, 'products/8936146446742.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6723, 17, 'Mỳ Udon đậu hũ chả cá Pulmuone gói 275g (1 Gói)', 'my-udon-dau-hu-cha-ca-pulmuone-goi-275g-1-goi', NULL, NULL, NULL, 49500.00, NULL, 'products/6954463411658.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6724, 17, 'Mỡ heo sạch nguyên chất Meatdeli hũ 330g (1 Hũ)', 'mo-heo-sach-nguyen-chat-meatdeli-hu-330g-1-hu', NULL, NULL, NULL, 49000.00, NULL, 'products/8936034877856.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6725, 17, 'Chả lụa bì ớt xiêm xanh G que 50g (1 Cây)', 'cha-lua-bi-ot-xiem-xanh-g-que-50g-1-cay', NULL, NULL, NULL, 80000.00, NULL, 'products/946-368833.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6726, 17, 'Pate que vị nguyên bản G gói 40g (1 Gói)', 'pate-que-vi-nguyen-ban-g-goi-40g-1-goi', NULL, NULL, NULL, 144000.00, NULL, 'products/8936146447640.jpg', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27'),
(6727, 17, 'Chả lụa nấm tươi Nấm tươi cười gói 250g', 'cha-lua-nam-tuoi-nam-tuoi-cuoi-goi-250g', NULL, NULL, NULL, 62000.00, NULL, 'products/664353-8938520258347.webp', NULL, 100, 1, 1, '2025-09-24 08:59:47', '2025-09-25 10:56:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `is_primary` tinyint(1) DEFAULT 0,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` tinyint(4) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `comment`, `created_at`) VALUES ('1', '5888', '10', '5', 'San pham chat luong', current_timestamp());
--
-- Cấu trúc bảng cho bảng `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `subscribers`
--

INSERT INTO `subscribers` (`id`, `user_id`, `email`, `created_at`) VALUES
(1, 7, 'newsubscriber@demo.com', '2025-09-24 22:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`) VALUES
(1, 'Bánh Trung Thu', 'banh-trung-thu', '2025-09-22 16:46:17'),
(2, 'Sale 9.9', 'sale-9-9', '2025-09-22 16:46:17'),
(3, 'Giảm giá', 'giam-gia', '2025-09-22 16:46:17'),
(4, 'Best Seller', 'best-seller', '2025-09-22 16:46:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `phone`, `password`, `role`, `created_at`) VALUES
(6, 'Admin', 'admin@demo.com', NULL, NULL, '$2y$10$0kWZdX6vQBv3/RV/pYxeiOtAkY0THTZRTXn90Aqv2GPog5HgerPhG', 'admin', '2025-09-15 07:52:37'),
(7, 'User', 'user@demo.com', NULL, NULL, '$2y$10$SPP1P7XtPECm1XaDMpz/dO.dpx20EEiQTtIevoTDuRT0KoUASE4Zi', 'user', '2025-09-15 07:52:37'),
(8, 'Nguyen Van A', 'nguyenvana@demo.com', '258 Nguyễn Trãi, Thanh Hóa', '0967890123', 'hashed_password_a', 'user', '2025-09-24 23:00:00'),
(9, 'Tran Thi B', 'tranthib@demo.com', '369 Hai Bà Trưng, Vinh', '0954321098', 'hashed_password_b', 'user', '2025-09-24 23:15:00'),
(10, 'Le Van C', 'levanc@demo.com', '741 Lê Hồng Phong, Biên Hòa', '0998765432', 'hashed_password_c', 'user', '2025-09-24 23:30:00'),
(11, 'Pham Van D', 'phamvand@demo.com', '23 Trần Hưng Đạo, Hà Nội', '0911111111', 'hashed_password_d', 'user', '2025-09-24 23:45:00'),
(12, 'Nguyen Thi E', 'nguyenthie@demo.com', '56 Nguyễn Văn Linh, Đà Nẵng', '0922222222', 'hashed_password_e', 'user', '2024-10-10 01:00:00'),
(13, 'Le Van F', 'levanf@demo.com', '12 Lê Lợi, Hải Phòng', '0933333333', 'hashed_password_f', 'user', '2024-09-11 19:30:00'),
(14, 'Tran Thi G', 'tranthig@demo.com', '78 Nguyễn Huệ, Cần Thơ', '0944444444', 'hashed_password_g', 'user', '2024-10-18 00:45:00'),
(15, 'Pham Van H', 'phamvanh@demo.com', '34 Hoàng Văn Thụ, Đà Nẵng', '0955555555', 'hashed_password_h', 'user', '2024-09-24 20:20:00'),
(16, 'Do Thi I', 'dothii@demo.com', '56 Lý Thường Kiệt, Nha Trang', '0966666666', 'hashed_password_i', 'user', '2024-10-12 02:40:00'),
(17, 'Nguyen Van J', 'nguyenvanj@demo.com', '21 Trần Hưng Đạo, Hà Nội', '0977777777', 'hashed_password_j', 'user', '2024-09-27 18:30:00'),
(18, 'Le Thi K', 'lethik@demo.com', '98 Pasteur, TP.HCM', '0988888888', 'hashed_password_k', 'user', '2024-10-15 03:10:00'),
(19, 'Tran Van L', 'tranvanl@demo.com', '45 Điện Biên Phủ, Đà Nẵng', '0999999999', 'hashed_password_l', 'user', '2024-09-29 20:00:00'),
(20, 'Pham Thi M', 'phamthim@demo.com', '67 Nguyễn Văn Cừ, Hà Nội', '0901111222', 'hashed_password_m', 'user', '2024-10-18 01:45:00'),
(21, 'Nguyen Van N', 'nguyenvann@demo.com', '123 Nguyễn Trãi, Hà Nội', '0902222333', 'hashed_password_n', 'user', '2024-09-26 19:40:00'),
(22, 'Tran Thi O', 'tranthio@demo.com', '456 Lạc Long Quân, TP.HCM', '0903333444', 'hashed_password_o', 'user', '2024-10-19 04:25:00'),
(23, 'Le Van P', 'levanp@demo.com', '12 Hai Bà Trưng, Hà Nội', '012346789', 'hashed_password_p', 'user', '2024-09-22 18:30:00'),
(24, 'Pham Thi Q', 'phamthiq@demo.com', '56 Nguyễn Văn Linh, Đà Nẵng', '0905555666', 'hashed_password_q', 'user', '2024-10-25 05:10:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `min_order_value` int(11) DEFAULT 0,
  `max_usage` int(11) DEFAULT 1,
  `status` tinyint(1) DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Mã giảm giá';

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `discount_amount`, `start_date`, `end_date`, `min_order_value`, `max_usage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DISCOUNT20', 20000, '2025-09-25', '2025-10-25', 90000, 105, 0, '2025-09-25 00:00:00', '2025-09-30 22:44:49'),
(2, 'FREESHIP', 15000, '2025-09-25', '2025-10-30', 50000, 50, 1, '2025-09-25 00:15:00', '2025-09-30 22:43:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

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
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6730;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;