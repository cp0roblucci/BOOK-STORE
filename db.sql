-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 03:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ornamental-fish-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `accessories_id` char(6) NOT NULL,
  `category_id` int(11) NOT NULL,
  `accessories_type_id` char(6) NOT NULL,
  `accessories_name` varchar(50) DEFAULT NULL,
  `accessories_price` int(11) DEFAULT NULL,
  `accessories_desc` text DEFAULT NULL,
  `accessories_link_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`accessories_id`, `category_id`, `accessories_type_id`, `accessories_name`, `accessories_price`, `accessories_desc`, `accessories_link_img`) VALUES
('ARM01', 0, 'ACCS01', 'Hồ Thủy Sinh STYLE 1', 650000, 'Hồ Thủy Sinh STYLE 1', '/storage/images/img_products/JMlisS7a7JmMoTjDaGHNiui6IEi50DGfw1jbONSk.jpg'),
('ARM02', 0, 'ACCS01', 'Hồ Thủy Sinh STYLE 2', 850000, 'Hồ Thủy Sinh STYLE 2', '/storage/images/img_products/accessories/aquarium/aquarium_type2.jpg'),
('ARM03', 0, 'ACCS01', 'Hồ Thủy Sinh STYLE 3', 1400000, 'Hồ Thủy Sinh STYLE 3', '/storage/images/img_products/accessories/aquarium/aquarium_type3.jpg'),
('ARM04', 0, 'ACCS01', 'Hồ Thủy Sinh STYLE 4', 2300000, 'Hồ Thủy Sinh STYLE 4', '/storage/images/img_products/accessories/aquarium/aquarium_type4.jpg'),
('ARM05', 0, 'ACCS01', 'Hồ Thủy Sinh STYLE 5', 740000, 'Hồ Thủy Sinh STYLE 5', '/storage/images/img_products/accessories/aquarium/aquarium_type5.jpg'),
('ARM06', 0, 'ACCS02', 'Sera SiPoRax Algovec Professional', 70000, 'Sứ lọc khử và ngăn ngừa rêu hại phát triển', '/storage/images/img_products/accessories/aquatic_accessories/aaccs_1.jpg'),
('ARM07', 0, 'ACCS02', 'Seachem Zip Bag', 45000, 'Túi đựng vật liệu lọc', '/storage/images/img_products/accessories/aquatic_accessories/aaccs_2.jpg'),
('ARM08', 0, 'ACCS02', 'Sera pH Test', 72000, 'Kiểm tra độ pH trong môi trường nước', '/storage/images/img_products/accessories/aquatic_accessories/aaccs_4.jpg'),
('ARM09', 0, 'ACCS02', 'Gex Clean Bio-N', 83000, 'Vật liệu lọc nước', '/storage/images/img_products/accessories/aquatic_accessories/aaccs_3.jpg'),
('ARM10', 0, 'ACCS02', 'JBL Test Combi Set Marine', 240000, 'Bộ test nước cao cấp dành cho hồ cá biển ( pH , kH , NH4 , NO2 , NO3 , PO4 )', '/storage/images/img_products/accessories/aquatic_accessories/aaccs_5.jpg'),
('ARM11', 0, 'ACCS03', 'Cây Bonsai Thủy Sinh STYLE 1', 150000, 'Cây Bonsai Thủy Sinh STYLE 1', '/storage/images/img_products/accessories/bonsai/bonsai_type1.jpg'),
('ARM12', 0, 'ACCS03', 'Cây Bonsai Thủy Sinh STYLE 2', 150000, 'Cây Bonsai Thủy Sinh STYLE 2', '/storage/images/img_products/accessories/bonsai/bonsai_type2.jpg'),
('ARM13', 0, 'ACCS03', 'Cây Bonsai Thủy Sinh STYLE 3', 150000, 'Cây Bonsai Thủy Sinh STYLE 1', '/storage/images/img_products/accessories/bonsai/bonsai_type3.jpg'),
('ARM14', 0, 'ACCS03', 'Cây Bonsai Thủy Sinh STYLE 4', 150000, 'Cây Bonsai Thủy Sinh STYLE 4', '/storage/images/img_products/accessories/bonsai/bonsai_type4.jpg'),
('ARM15', 0, 'ACCS03', 'Cây Bonsai Thủy Sinh STYLE 5', 150000, 'Cây Bonsai Thủy Sinh STYLE 5', '/storage/images/img_products/accessories/bonsai/bonsai_type5.jpg'),
('ARM16', 0, 'ACCS03', 'Cây Bonsai Thủy Sinh STYLE 6', 150000, 'Cây Bonsai Thủy Sinh STYLE 6', '/storage/images/img_products/accessories/bonsai/bonsai_type6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `accessories_import_batches`
--

CREATE TABLE `accessories_import_batches` (
  `id` int(11) NOT NULL,
  `accessories_id` char(6) NOT NULL,
  `quantity` int(11) NOT NULL,
  `import_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessories_import_batches`
--

INSERT INTO `accessories_import_batches` (`id`, `accessories_id`, `quantity`, `import_date`) VALUES
(11, 'ARM01', 5, '2023-04-11'),
(12, 'ARM02', 5, '2023-04-11'),
(13, 'ARM03', 5, '2023-04-11'),
(14, 'ARM04', 5, '2023-04-11'),
(15, 'ARM05', 5, '2023-04-11'),
(16, 'ARM06', 5, '2023-04-11'),
(17, 'ARM07', 5, '2023-04-11'),
(18, 'ARM08', 5, '2023-04-11'),
(19, 'ARM09', 5, '2023-04-11'),
(31, 'ARM10', 5, '2023-04-11'),
(33, 'ARM11', 10, '2023-04-11'),
(34, 'ARM12', 10, '2023-04-11'),
(35, 'ARM13', 12, '2023-04-11'),
(36, 'ARM14', 12, '2023-04-11'),
(37, 'ARM15', 14, '2023-04-11'),
(38, 'ARM16', 16, '2023-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `accessories_type`
--

CREATE TABLE `accessories_type` (
  `accessories_type_id` char(6) NOT NULL,
  `accessories_type_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessories_type`
--

INSERT INTO `accessories_type` (`accessories_type_id`, `accessories_type_name`) VALUES
('ACCS01', 'Hồ Cá Thủy Sinh'),
('ACCS02', 'Phụ Kiện Thủy Sinh'),
('ACCS03', 'Cây Trang Trí');

-- --------------------------------------------------------

--
-- Table structure for table `account_status`
--

CREATE TABLE `account_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_status`
--

INSERT INTO `account_status` (`status_id`, `status_name`) VALUES
(0, 'Hoạt động'),
(1, 'Bị chặn');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 24, '2023-04-03 17:04:24', '2023-04-03 17:04:24'),
(27, 47, '2023-04-25 07:40:37', '2023-04-25 07:40:37'),
(28, 50, '2023-04-25 13:10:11', '2023-04-25 13:10:11'),
(29, 51, '2023-04-25 13:10:42', '2023-04-25 13:10:42'),
(30, 52, '2023-04-25 13:11:26', '2023-04-25 13:11:26'),
(31, 53, '2023-04-25 13:11:58', '2023-04-25 13:11:58'),
(32, 54, '2023-04-25 13:12:30', '2023-04-25 13:12:30'),
(33, 55, '2023-04-25 13:13:26', '2023-04-25 13:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` char(6) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(0, 'Phụ kiện'),
(1, 'Cá');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color`) VALUES
('Cam'),
('Hồng'),
('Nâu'),
('Neon'),
('Tím'),
('Trắng'),
('Vàng'),
('Xám'),
('Xanh Lá'),
('Xanh Lam'),
('Đen'),
('Đỏ');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_status`
--

CREATE TABLE `delivery_status` (
  `delivery_id` int(11) NOT NULL,
  `delivery_status` varchar(100) NOT NULL,
  `delivery_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_status`
--

INSERT INTO `delivery_status` (`delivery_id`, `delivery_status`, `delivery_desc`) VALUES
(0, 'Chưa giao hàng', 'Đang đợi lấy hàng'),
(1, 'Đang vận chuyển', 'Đơn hàng đang được giao'),
(2, 'Đã giao hàng', 'Đã giao hàng thành công');

-- --------------------------------------------------------

--
-- Table structure for table `export_batches`
--

CREATE TABLE `export_batches` (
  `id` int(11) NOT NULL,
  `product_id` char(6) NOT NULL,
  `quantity` int(11) NOT NULL,
  `export_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fish`
--

CREATE TABLE `fish` (
  `fish_id` char(6) NOT NULL,
  `fish_species` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `ph_level` int(11) NOT NULL,
  `color` varchar(10) NOT NULL,
  `fish_size` varchar(20) NOT NULL,
  `fish_name` varchar(30) DEFAULT NULL,
  `fish_habit` varchar(30) DEFAULT NULL,
  `fish_desc` text DEFAULT NULL,
  `fish_link_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fish`
--

INSERT INTO `fish` (`fish_id`, `fish_species`, `category_id`, `ph_level`, `color`, `fish_size`, `fish_name`, `fish_habit`, `fish_desc`, `fish_link_img`) VALUES
('AG01', 'Cá Ông Tiên', 1, 7, 'Xanh Lam', '2 - 4 cm', 'Cá Ông Tiên Xanh', 'sống theo đàn', 'Cá Ông Tiên Xanh', '/storage/images/img_products/fish/angels_fish/angels_fish_1.jpg\r\n'),
('AG02', 'Cá Ông Tiên', 1, 7, 'Vàng', '2 - 4 cm', 'Cá Ông Tiên Vàng Kim Sa', 'sống theo đàn', 'Cá Ông Tiên Vàng Kim Sa', '/storage/images/img_products/fish/angels_fish/angels_fish_2.jpg\r\n'),
('AG03', 'Cá Ông Tiên', 1, 7, 'Cam', '2 - 4 cm', 'Cá Ông Tiên Koi', 'sống theo đàn', 'Cá Ông Tiên Koi', '/storage/images/img_products/fish/angels_fish/angels_fish_3.jpg\r\n'),
('BF01', 'Cá Betta', 1, 7, 'Trắng', '3-5 cm', 'Cá Betta Rồng Đen', 'sống riêng lẻ', 'Cá Betta Rồng Đen', '/storage/images/img_products/fish/betta_fish/btf_1.jpg'),
('BF02', 'Cá Betta', 1, 7, 'Xanh Lam', '3-5 cm', 'Cá Betta Xanh Hafmoon', 'sống riêng lẻ', 'Cá Betta Xanh Hafmoon', '/storage/images/img_products/fish/betta_fish/btf_2.jpg'),
('BF03', 'Cá Betta', 1, 7, 'Đỏ', '3-5 cm', 'Cá Betta Rồng Đỏ', 'sống riêng lẻ', 'Cá Betta Rồng Đỏ', '/storage/images/img_products/fish/betta_fish/btf_3.jpg'),
('BF04', 'Cá Betta', 1, 7, 'Trắng', '3-5 cm', 'Cá Betta Rồng Trắng', 'sống riêng lẻ', 'Cá Betta Rồng Trắng', '/storage/images/img_products/fish/betta_fish/btf_4.jpg'),
('BF05', 'Cá Betta', 1, 7, 'Trắng', '3-5 cm', 'Cá Betta Fancy Cooper', 'sống riêng lẻ', 'Cá Betta Fancy Cooper', '/storage/images/img_products/fish/betta_fish/btf_5.jpg'),
('BR01', 'Cá Cầu Vồng', 1, 7, 'Xanh Lam', '3 cm', 'Cá Cầu Vồng Xanh', 'sống theo đàn', 'Cá Cầu Vồng Xanh', '/storage/images/img_products/fish/rainbow_fish/rainbow_fish_1.jpg\r\n'),
('BR02', 'Cá Cầu Vồng', 1, 7, 'Neon', '1.8 - 2 cm', 'Cá Cầu Vồng Red Neon', 'sống theo đàn', 'Cá Cầu Vồng Red Neon', '/storage/images/img_products/fish/rainbow_fish/rainbow_fish_2.jpg\r\n'),
('BR03', 'Cá Cầu Vồng', 1, 7, 'Vàng', '3-5 cm', 'Cá Cầu Vông Parkinsoni', 'sống theo đàn', 'Cá Cầu Vông Parkinsoni', '/storage/images/img_products/fish/rainbow_fish/rainbow_fish_3.jpg\n'),
('BR04', 'Cá Cầu Vồng', 1, 7, 'Nâu', '3-5 cm', 'Cá Cầu Vồng Madagascar', 'sống theo đàn', 'Cá Cầu Vồng Madagascar', '/storage/images/img_products/fish/rainbow_fish/rainbow_fish_4.jpg'),
('BR05', 'Cá Cầu Vồng', 1, 7, 'Vàng', '5-7 cm', 'Cá Cầu Vồng Thạch Mỹ Nhân', 'sống theo đàn', 'Cá Cầu Vồng Thạch Mỹ Nhân', '/storage/images/img_products/fish/rainbow_fish/rainbow_fish_5.jpg\r\n'),
('DA01', 'Cá Ngựa', 1, 6, 'Xanh Lá', '2.5 cm', 'Cá Ngựa Xanh Dạ Quang', 'sống bày đàn', 'Cá Ngựa Xanh Dạ Quang', '/storage/images/img_products/fish/danio_fish/danio_fish_1.jpg'),
('DA02', 'Cá Ngựa', 1, 6, 'Xanh Lam', '2 - 2.5 cm', 'Cá Ngựa Sọc', 'sống bày đàn', 'Cá Ngựa Sọc', '/storage/images/img_products/fish/danio_fish/danio_fish_2.jpg'),
('DA03', 'Cá Ngựa', 1, 6, 'Cam', '2 - 2.5 cm', 'Cá Ngựa Cam', 'sống bày đàn', 'Cá Ngựa Cam', '/storage/images/img_products/fish/danio_fish/danio_fish_1.jpg'),
('DC01', 'Cá Dĩa', 1, 7, 'Vàng', '5 - 6 cm', 'Cá Dĩa Vàng Mắt Đỏ', 'sống bày đàn', 'Cá Dĩa Vàng Mắt Đỏ', '/storage/images/img_products/fish/discus_fish/discus_fish_1.jpg\r\n'),
('DC02', 'Cá Dĩa', 1, 7, 'Trắng', '7 - 8 cm', 'Cá Dĩa Trắng', 'sống bày đàn', 'Cá Dĩa Trắng', '/storage/images/img_products/fish/discus_fish/discus_fish_2.jpg\r\n'),
('DC03', 'Cá Dĩa', 1, 7, 'Đỏ', '9 - 10 cm', 'Cá Dĩa Man Đỏ', 'sống bày đàn', 'Cá Dĩa Man Đỏ', '/storage/images/img_products/fish/discus_fish/discus_fish_3.jpg\r\n'),
('DC04', 'Cá Dĩa', 1, 7, 'Xanh Lam', '10-12 cm', 'Cá Dĩa Lam Colban', 'sống bày đàn', 'Cá Dĩa Lam Colban', '/storage/images/img_products/fish/discus_fish/discus_fish_4.jpg\r\n'),
('DC05', 'Cá Dĩa', 1, 7, 'Vàng', '4 – 10 cm', 'Cá Dĩa Man Vàng', 'sống bày đàn', 'Cá Dĩa Man Vàng', '/storage/images/img_products/fish/discus_fish/discus_fish_5.jpg\r\n'),
('DGF01', 'Cá Rồng', 1, 7, 'Hồng', '1.2 m', 'Cá Rồng Hồng Long', 'sống riêng lẻ', 'Cá Rồng Hồng Long', '/storage/images/img_products/fish/dragon_fish/dragon_fish_1.jpg'),
('DGF02', 'Cá Rồng', 1, 7, 'Đỏ', '1.2 m', 'Cá Rồng Huyết Long', 'sống riêng lẻ', 'Cá Rồng Huyết Long', '/storage/images/img_products/fish/dragon_fish/dragon_fish_2.jpg'),
('DGF03', 'Cá Rồng', 1, 7, 'Trắng', '1.2 m', 'Cá Rồng Ngân Long', 'sống riêng lẻ', 'Cá Rồng Ngân Long', '/storage/images/img_products/fish/dragon_fish/dragon_fish_3.jpg'),
('DGF04', 'Cá Rồng', 1, 7, 'Vàng', '1.2 m', 'Cá Rồng Kim Long', 'sống riêng lẻ', 'Cá Rồng Kim Long', '/storage/images/img_products/fish/dragon_fish/dragon_fish_4.png'),
('DGF05', 'Cá Rồng', 1, 7, 'Đen', '1.2 m', 'Cá Rồng Hắc Long', 'sống riêng lẻ', 'Cá Rồng Hắc Long', '/storage/images/img_products/fish/dragon_fish/dragon_fish_5.png'),
('PF01', 'Cá Phượng Hoàng', 1, 6, 'Neon', '4 – 10 cm', 'Cá Phượng Hoàng Ngũ Sắc', 'sống theo đàn', 'Cá Phượng Hoàng Ngũ Sắc', '/storage/images/img_products/fish/phoenix_fish/pf_1.jpg'),
('PF02', 'Cá Phượng Hoàng', 1, 6, 'Neon', '4 – 10 cm', 'Cá Phượng Hoàng Bolivia', 'sống theo đàn', 'Cá Phượng Hoàng Bolivia', '/storage/images/img_products/fish/phoenix_fish/pf_2.jpg'),
('PF03', 'Cá Phượng Hoàng', 1, 6, 'Neon', '4 – 10 cm', 'Cá Phượng Hoàng Đá Quý', 'sống theo đàn', 'Cá Phượng Hoàng Đá Quý', '/storage/images/img_products/fish/phoenix_fish/pf_3.jpg'),
('PF04', 'Cá Phượng Hoàng', 1, 7, 'Trắng', '4 – 10 cm', 'Cá Phượng Hoàng Peru Đỏ', 'sống theo đàn', 'Cá Phượng Hoàng Peru Đỏ', '/storage/images/img_products/fish/phoenix_fish/pf_4.jpg'),
('PF05', 'Cá Phượng Hoàng', 1, 7, 'Xanh Lam', '4 – 10 cm', 'Cá Phượng Hoàng Araca', 'sống theo đàn', 'Cá Phượng Hoàng Araca', '/storage/images/img_products/fish/phoenix_fish/pf_5.jpg'),
('SCF01', 'Cá Bảy Màu', 1, 7, 'Trắng', '2 - 4 cm', 'Cá Bảy Màu Dumlbo', 'sống bầy đàn', 'Cá Bảy Màu Dumlbo', '/storage/images/img_products/fish/sevencolor_fish/svc_1.jpg'),
('SCF02', 'Cá Bảy Màu', 1, 7, 'Vàng', '2 - 4 cm', 'Cá Bảy Màu Full Gold', 'sống bầy đàn', 'Cá Bảy Màu Full Gold', '/storage/images/img_products/fish/sevencolor_fish/svc_2.jpg'),
('SCF03', 'Cá Bảy Màu', 1, 7, 'Neon', '2 - 4 cm', 'Cá Bảy Màu Hoa Hồng', 'sống bầy đàn', 'Cá Bảy Màu Hoa Hồng - 1 Cặp', '/storage/images/img_products/fish/sevencolor_fish/svc_3.jpg'),
('SCF04', 'Cá Bảy Màu', 1, 7, 'Xanh lam', '2 - 4 cm', 'Cá Bảy Màu Rồng Xanh', 'sống bầy đàn', 'Cá Bảy Màu Rồng Xanh', '/storage/images/img_products/fish/sevencolor_fish/svc_4.jpg'),
('SCF05', 'Cá Bảy Màu', 1, 7, 'Trắng', '2 - 4 cm', 'Cá Bảy Màu Dumlbo Red Tail', 'sống bầy đàn', 'Cá Bảy Màu Dumlbo Red Tail', '/storage/images/img_products/fish/sevencolor_fish/svc_5.png');

-- --------------------------------------------------------

--
-- Table structure for table `fish_food`
--

CREATE TABLE `fish_food` (
  `food_id` varchar(20) NOT NULL,
  `species_fish` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fish_food`
--

INSERT INTO `fish_food` (`food_id`, `species_fish`) VALUES
('Cám Thái Inve', 'Cá Bảy Màu'),
('Giun, Trùn Chỉ, Trùn', 'Cá Betta'),
('Giun, Trùn Chỉ, Trùn', 'Cá Cầu Vồng'),
('Giun, Trùn Chỉ, Trùn', 'Cá Ngựa'),
('Giun, Trùn Chỉ, Trùn', 'Cá Phượng Hoàng'),
('Thức Ăn Artemia', 'Cá Rồng'),
('Thức Ăn JBL', 'Cá Dĩa'),
('Thức Ăn Tropical', 'Cá Vàng'),
('Tim Bò Kích Đỏ', 'Cá Rồng'),
('Trùn Huyết Sấy Khô', 'Cá Ông Tiên');

-- --------------------------------------------------------

--
-- Table structure for table `fish_import_batches`
--

CREATE TABLE `fish_import_batches` (
  `id` int(11) NOT NULL,
  `fish_id` char(6) NOT NULL,
  `quantity` int(11) NOT NULL,
  `import_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fish_import_batches`
--

INSERT INTO `fish_import_batches` (`id`, `fish_id`, `quantity`, `import_date`) VALUES
(1, 'BF01', 20, '2023-04-11 09:47:06'),
(2, 'BF02', 30, '2023-04-11 09:47:06'),
(3, 'BF03', 10, '2023-04-11 09:47:06'),
(4, 'BF04', 10, '2023-04-11 09:47:06'),
(5, 'BF05', 10, '2023-04-11 09:47:06'),
(6, 'DGF01', 15, '2023-04-11 09:47:06'),
(7, 'DGF02', 15, '2023-04-11 09:47:06'),
(8, 'DGF03', 15, '2023-04-11 09:47:06'),
(9, 'DGF04', 15, '2023-04-11 09:47:06'),
(10, 'DGF05', 15, '2023-04-11 09:47:06'),
(11, 'PF01', 20, '2023-04-11 09:47:06'),
(12, 'PF02', 20, '2023-04-11 09:47:06'),
(13, 'PF03', 20, '2023-04-11 09:47:06'),
(14, 'PF04', 20, '2023-04-11 09:47:06'),
(15, 'PF05', 20, '2023-04-11 09:47:06'),
(16, 'SCF01', 25, '2023-04-11 09:47:06'),
(17, 'SCF02', 25, '2023-04-11 09:47:06'),
(18, 'SCF03', 25, '2023-04-11 09:47:06'),
(19, 'SCF04', 25, '2023-04-11 09:47:06'),
(20, 'SCF05', 25, '2023-04-11 09:47:06'),
(21, 'AG01', 10, '2023-04-11 14:05:34'),
(22, 'AG02', 15, '2023-04-11 14:05:34'),
(23, 'AG03', 25, '2023-04-11 14:05:34'),
(24, 'BR01', 10, '2023-04-11 14:06:20'),
(25, 'BR02', 10, '2023-04-11 14:06:20'),
(26, 'BR03', 15, '2023-04-11 14:06:20'),
(27, 'BR04', 20, '2023-04-11 14:06:20'),
(28, 'BR05', 25, '2023-04-11 14:06:20'),
(29, 'DA01', 10, '2023-04-11 14:06:45'),
(30, 'DA02', 20, '2023-04-11 14:06:45'),
(31, 'DA03', 30, '2023-04-11 14:06:45'),
(32, 'DC01', 10, '2023-04-11 14:07:23'),
(33, 'DC02', 20, '2023-04-11 14:07:23'),
(34, 'DC03', 30, '2023-04-11 14:07:23'),
(35, 'DC04', 40, '2023-04-11 14:07:23'),
(36, 'DC05', 50, '2023-04-11 14:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `fish_species`
--

CREATE TABLE `fish_species` (
  `fish_species` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fish_species`
--

INSERT INTO `fish_species` (`fish_species`) VALUES
('Cá Bảy Màu'),
('Cá Betta'),
('Cá Cầu Vồng'),
('Cá Dĩa'),
('Cá Ngựa'),
('Cá Ông Tiên'),
('Cá Phượng Hoàng'),
('Cá Rồng'),
('Cá Vàng');

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `food_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` (`food_type`) VALUES
('Cám Thái Inve'),
('Giun, Trùn Chỉ, Trùn'),
('Thức Ăn Artemia'),
('Thức Ăn JBL'),
('Thức Ăn Tetra'),
('Thức Ăn Tropical'),
('Tim Bò Kích Đỏ'),
('Trùn Huyết Sấy Khô');

-- --------------------------------------------------------

--
-- Table structure for table `has_size`
--

CREATE TABLE `has_size` (
  `fish_species` varchar(50) NOT NULL,
  `size` varchar(20) NOT NULL,
  `has_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `has_size`
--

INSERT INTO `has_size` (`fish_species`, `size`, `has_price`) VALUES
('Cá Bảy Màu', '2 - 4 cm', 25000),
('Cá Bảy Màu', '3 cm', 35000),
('Cá Bảy Màu', '3.5-5 cm', 50000),
('Cá Betta', '3 cm', 80000),
('Cá Betta', '3-5 cm', 120000),
('Cá Betta', '5.5-7 cm', 160000),
('Cá Cầu Vồng', '1.8 - 2 cm', 25000),
('Cá Cầu Vồng', '3 cm', 8000),
('Cá Cầu Vồng', '3-5 cm', 30000),
('Cá Cầu Vồng', '3.5 - 4 cm', 10000),
('Cá Cầu Vồng', '4 – 10 cm', 50000),
('Cá Cầu Vồng', '5-7 cm', 65000),
('Cá Dĩa', '10-12 cm', 400000),
('Cá Dĩa', '11 - 12 cm', 480000),
('Cá Dĩa', '5 - 6 cm', 180000),
('Cá Dĩa', '7 - 8 cm', 280000),
('Cá Dĩa', '9 - 10 cm', 380000),
('Cá Ngựa', '2 - 2.5 cm', 8000),
('Cá Ngựa', '2.5 cm', 9000),
('Cá Ông Tiên', '2 - 2.5 cm', 12000),
('Cá Ông Tiên', '2 - 4 cm', 25000),
('Cá Ông Tiên', '2.8 - 3 cm', 20000),
('Cá Ông Tiên', '3.5 - 4 cm', 30000),
('Cá Ông Tiên', '4.5 - 5 cm', 50000),
('Cá Phượng Hoàng', '2.5 cm', 70000),
('Cá Phượng Hoàng', '3-5 cm', 120000),
('Cá Phượng Hoàng', '4 – 10 cm', 160000),
('Cá Phượng Hoàng', '5.5-7 cm', 140000),
('Cá Phượng Hoàng', 'XL', 190000),
('Cá Phượng Hoàng', 'XXL', 220000),
('Cá Rồng', '1.2 m', 1500000),
('Cá Rồng', '10-12 cm', 220000),
('Cá Rồng', '14-16 cm', 250000),
('Cá Rồng', '18-20 cm', 280000),
('Cá Rồng', '20-22 cm', 320000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_03_12_081914_add_column_rememberme_to_users', 2),
(10, '2023_03_12_150010_add_google_id_to_users', 3),
(11, '2023_03_13_083155_create_user_repositories_table', 4),
(12, '2023_04_20_022740_add_deleted_at_to_orders', 4),
(13, '2023_04_20_023328_add_deleted_at_to_users', 5),
(14, '2023_04_20_043731_add_deleted_at_to_users', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` char(8) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `order_phone_number` char(11) NOT NULL,
  `order_delivery_address` varchar(200) DEFAULT NULL,
  `order_notes` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` char(8) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` char(6) NOT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL,
  `status_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`status_id`, `status_name`, `status_desc`) VALUES
(0, 'Chờ xác nhận', 'Đơn hàng mới đang chờ xác nhận'),
(1, 'Đang xử lý', 'Người bán đang chuẩn bị hàng'),
(2, 'Đã gửi hàng', 'Người bán đã giao cho đơn vị vận chuyển'),
(3, 'Hoàn thành', 'Đơn hàng đã được giao thành công'),
(4, 'Đã hủy', 'Người mua đã hủy đặt hàng'),
(5, 'Lưu trữ', 'Các đơn hàng hoàn thành đã được lưu trữ.'),
(6, 'Yêu cầu trả hàng', 'Người mua yêu cầu trả hàng'),
(7, 'Chấp nhận yêu cầu trả hàng', 'Đã chấp nhận yêu cầu trả hàng');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `payment_id` int(11) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `payment_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`payment_id`, `payment_status`, `payment_desc`) VALUES
(0, 'Chưa thanh toán', 'Người mua chưa thanh toán'),
(1, 'Đã thanh toán', 'Đã thanh toán thành công');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ph`
--

CREATE TABLE `ph` (
  `ph_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ph`
--

INSERT INTO `ph` (`ph_level`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `role_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
('0', 'Khách Hàng'),
('1', 'Quản trị viên'),
('2', 'tài khoản giao hàng');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size`) VALUES
('1.2 m'),
('1.8 - 2 cm'),
('10-12 cm'),
('11 - 12 cm'),
('14-16 cm'),
('16 - 20 cm'),
('18-20 cm'),
('2 - 2.5 cm'),
('2 - 4 cm'),
('2.5 cm'),
('2.8 - 3 cm'),
('20-22 cm'),
('3 cm'),
('3-5 cm'),
('3.5 - 4 cm'),
('3.5-5 cm'),
('4 – 10 cm'),
('4.5 - 5 cm'),
('5 - 6 cm'),
('5-7 cm'),
('5.5-7 cm'),
('7 - 8 cm'),
('9 - 10 cm'),
('XL'),
('XXL');

-- --------------------------------------------------------

--
-- Table structure for table `supplierinvoice`
--

CREATE TABLE `supplierinvoice` (
  `SUPPLIER_INVOICE_ID` char(6) NOT NULL,
  `ID` int(11) NOT NULL,
  `SUPPLIER_INVOICE_PRODUCT_ID` char(6) DEFAULT NULL,
  `SUPPLIER_INVOICE_QUANTITY` int(11) DEFAULT NULL,
  `SUPPLIER_INVOICE_TOTAL_PRICE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` char(6) NOT NULL DEFAULT '0',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `link_avt` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `phone_number`, `user_address`, `google_id`, `link_avt`, `email`, `password`, `status_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24, '1', 'Trường', 'Trần Văn', '0123123123', 'An Khánh, Ninh Kiều, Cần Thơ', NULL, '/storage/images/users/JIiMbNO15guSO4LGDH0sB0VdcXHx1yy4bbChCTtj.png', 'admin@gmail.com', '$2y$10$Zi3w9kihSDcpYsUbOoJGvehcS.cCJz15i79P7sJhOgPN0.HbiNypi', 0, NULL, '2023-04-03 17:04:24', '2023-04-03 17:04:24', NULL),
(47, '2', 'Giao Hàng', 'Tài Khoản', '0911223344', 'Cần Thơ', NULL, '/storage/images/users/gxKzOyqZaghSymseFFzx6bY3PmllvqGhRUUqyrdK.jpg', 'delivery@gmail.com', '$2y$10$DaGgles1WqyOYY6bG6FLSOCfigadWJ.aSqFleCttsiX.8iF031//6', 0, NULL, '2023-04-25 07:40:37', '2023-04-25 07:40:37', NULL),
(50, '0', 'Duy', 'Võ Đức', '0911111111', 'Kiên Giang', NULL, '/storage/images/users/TheaFJmQ058mLe0nKiaUqDkLegvbp5G9mVevaQSn.jpg', 'duy@gmail.com', '$2y$10$S6y0lzLN6sXPRB4BYyGyvulbIk2IxrxduM6vY0S5AQqaFY24sAWrG', 0, NULL, '2023-04-25 13:10:11', '2023-04-25 13:10:11', NULL),
(51, '0', 'Hùng', 'Lê Thanh', '0922222222', 'An Giang', NULL, '/storage/images/users/K1fYge8YLRo2ecAXqgBIifPVqV0eY8uOGm1Y7DpF.jpg', 'hung@gmail.com', '$2y$10$l9Lj1RtUTLNioqcd/vUq9eN1FQlxyXFauiSQZZLaEnHv0iiwc/cB2', 0, NULL, '2023-04-25 13:10:42', '2023-04-25 13:10:42', NULL),
(52, '0', 'Trường', 'Trần Văn', '0933333333', 'Đồng Tháp', NULL, '/storage/images/users/QrlvXIHr00766X3dtlqx9EYu5vT9hKF3CglF1pu3.jpg', 'truong@gmail.com', '$2y$10$kwFwM/7YDZMvx9QkmGy8JeVaelKR1RFTnv1w2lrYgp2kAAfmezN6y', 0, NULL, '2023-04-25 13:11:26', '2023-04-25 13:11:26', NULL),
(53, '0', 'Phúc', 'Nguyễn Hữu', '0944444444', 'Kiên Giang', NULL, '/storage/images/users/yWgMLg9OrZf1xkSlh9GEiWaLaDJ49xkIajb6xJW4.jpg', 'phuc@gmail.com', '$2y$10$C4ywkG/8XUVkAiqIA7CyxeWPr20VG6ph5Htd9bsIXVEhlba7XYOda', 0, NULL, '2023-04-25 13:11:58', '2023-04-25 13:11:58', NULL),
(54, '0', 'Toàn', 'Lê Minh', '0955555555', 'Cần Thơ', NULL, '/storage/images/users/3qMi49bRwOI80J7ULFSYHNLa4gQl5CwLTn4waqZh.jpg', 'toan@gmail.com', '$2y$10$wfFaqCdFSAkBXq.kiXmjA.DdKGDEI9cIl5322OrElJVRkMzSO8oAO', 0, NULL, '2023-04-25 13:12:30', '2023-04-25 13:12:30', NULL),
(55, '0', 'Khách Hàng', 'Tài Khoản', '0966666666', 'Cần Thơ', NULL, '/storage/images/users/YS5NFt5zxpOYXNVpBFKG20cWbw1tLhevqWb1oAay.jpg', 'khachhang@gmail.com', '$2y$10$ulXZq7I2a.Q1viVzET4cmO9diJHgJtsOxL2hYPERRP0GEGSTpYTwW', 0, NULL, '2023-04-25 13:13:26', '2023-04-25 13:13:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_repositories`
--

CREATE TABLE `user_repositories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`accessories_id`),
  ADD KEY `FK_ACCESSOR_GOM_NHUNG_ACCESSOR` (`accessories_type_id`),
  ADD KEY `fk_categories` (`category_id`);

--
-- Indexes for table `accessories_import_batches`
--
ALTER TABLE `accessories_import_batches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accessories_id` (`accessories_id`);

--
-- Indexes for table `accessories_type`
--
ALTER TABLE `accessories_type`
  ADD PRIMARY KEY (`accessories_type_id`);

--
-- Indexes for table `account_status`
--
ALTER TABLE `account_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `ID` (`user_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ACCESSOR_RELATIONS_ACCESSOR` (`product_id`),
  ADD KEY `CART_ID` (`cart_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color`);

--
-- Indexes for table `delivery_status`
--
ALTER TABLE `delivery_status`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `export_batches`
--
ALTER TABLE `export_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fish`
--
ALTER TABLE `fish`
  ADD PRIMARY KEY (`fish_id`),
  ADD KEY `FK_FISH_CO_MAU_COLOR` (`color`),
  ADD KEY `FK_FISH_SONG_O_PH` (`ph_level`),
  ADD KEY `FK_FISH_THUOCLOAI_FISHTYPE` (`fish_species`),
  ADD KEY `fk_fish_size` (`fish_size`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `fish_food`
--
ALTER TABLE `fish_food`
  ADD PRIMARY KEY (`food_id`,`species_fish`),
  ADD KEY `FK_FISH_FOO_FISH_FOOD_FISH` (`species_fish`);

--
-- Indexes for table `fish_import_batches`
--
ALTER TABLE `fish_import_batches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fish_id_2` (`fish_id`),
  ADD KEY `fish_id` (`fish_id`);

--
-- Indexes for table `fish_species`
--
ALTER TABLE `fish_species`
  ADD PRIMARY KEY (`fish_species`);

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`food_type`);

--
-- Indexes for table `has_size`
--
ALTER TABLE `has_size`
  ADD PRIMARY KEY (`fish_species`,`size`),
  ADD KEY `FK_HAS_SIZE_RELATIONS_TYPEOFDI` (`size`),
  ADD KEY `fish_species` (`fish_species`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_delivery` (`delivery_id`),
  ADD KEY `fk_payment` (`payment_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_status` (`status_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `fk_accessories_accessories` (`product_id`),
  ADD KEY `fk_category_id` (`category_id`),
  ADD KEY `fk_order` (`order_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ph`
--
ALTER TABLE `ph`
  ADD PRIMARY KEY (`ph_level`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size`);

--
-- Indexes for table `supplierinvoice`
--
ALTER TABLE `supplierinvoice`
  ADD PRIMARY KEY (`SUPPLIER_INVOICE_ID`),
  ADD KEY `fk_supplier_user` (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  ADD KEY `fk_user_role` (`role_id`),
  ADD KEY `fk_status_id` (`status_id`);

--
-- Indexes for table `user_repositories`
--
ALTER TABLE `user_repositories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories_import_batches`
--
ALTER TABLE `accessories_import_batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `export_batches`
--
ALTER TABLE `export_batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fish_import_batches`
--
ALTER TABLE `fish_import_batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user_repositories`
--
ALTER TABLE `user_repositories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accessories`
--
ALTER TABLE `accessories`
  ADD CONSTRAINT `FK_ACCESSOR_GOM_NHUNG_ACCESSOR` FOREIGN KEY (`accessories_type_id`) REFERENCES `accessories_type` (`accessories_type_id`),
  ADD CONSTRAINT `fk_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `accessories_import_batches`
--
ALTER TABLE `accessories_import_batches`
  ADD CONSTRAINT `fk_accessories` FOREIGN KEY (`accessories_id`) REFERENCES `accessories` (`accessories_id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `fk_cart` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`CART_ID`);

--
-- Constraints for table `fish`
--
ALTER TABLE `fish`
  ADD CONSTRAINT `FK_FISH_CO_MAU_COLOR` FOREIGN KEY (`color`) REFERENCES `color` (`color`),
  ADD CONSTRAINT `FK_FISH_SONG_O_PH` FOREIGN KEY (`ph_level`) REFERENCES `ph` (`ph_level`),
  ADD CONSTRAINT `FK_FISH_THUOCLOAI_FISHTYPE` FOREIGN KEY (`fish_species`) REFERENCES `fish_species` (`fish_species`),
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `fk_fish_size` FOREIGN KEY (`fish_size`) REFERENCES `size` (`size`);

--
-- Constraints for table `fish_food`
--
ALTER TABLE `fish_food`
  ADD CONSTRAINT `FK_FISH_FOO_FISH_FOOD_FISH` FOREIGN KEY (`species_fish`) REFERENCES `fish_species` (`fish_species`),
  ADD CONSTRAINT `FK_FISH_FOO_FISH_FOOD_FOODTYPE` FOREIGN KEY (`food_id`) REFERENCES `food_type` (`FOOD_TYPE`);

--
-- Constraints for table `fish_import_batches`
--
ALTER TABLE `fish_import_batches`
  ADD CONSTRAINT `fk_fish` FOREIGN KEY (`fish_id`) REFERENCES `fish` (`fish_id`);

--
-- Constraints for table `has_size`
--
ALTER TABLE `has_size`
  ADD CONSTRAINT `fk_size` FOREIGN KEY (`size`) REFERENCES `size` (`size`),
  ADD CONSTRAINT `fk_species` FOREIGN KEY (`fish_species`) REFERENCES `fish_species` (`fish_species`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_delivery` FOREIGN KEY (`delivery_id`) REFERENCES `delivery_status` (`delivery_id`),
  ADD CONSTRAINT `fk_payment` FOREIGN KEY (`payment_id`) REFERENCES `payment_status` (`payment_id`),
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`status_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `supplierinvoice`
--
ALTER TABLE `supplierinvoice`
  ADD CONSTRAINT `fk_supplier_user` FOREIGN KEY (`ID`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_status_id` FOREIGN KEY (`status_id`) REFERENCES `account_status` (`status_id`),
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
