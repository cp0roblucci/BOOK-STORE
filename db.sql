-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 08:42 PM
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
-- Database: `ornamental-fish-store1`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `ACCESSORIES_ID` char(6) NOT NULL,
  `category_id` int(11) NOT NULL,
  `ACCESSORIES_TYPE_ID` char(6) NOT NULL,
  `ACCESSORIES_NAME` varchar(50) DEFAULT NULL,
  `ACCESSORIES_PRICE` int(11) DEFAULT NULL,
  `ACCESSORIES_DESC` text DEFAULT NULL,
  `ACCESSORIES_LINK_IMG` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accessoriestype`
--

CREATE TABLE `accessoriestype` (
  `ACCESSORIES_TYPE_ID` char(6) NOT NULL,
  `ACCESSORIES_TYPE_NAME` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `CART_ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`CART_ID`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 24, '2023-04-03 17:04:24', '2023-04-03 17:04:24'),
(5, 25, '2023-04-10 18:41:58', '2023-04-10 18:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `CART_ID` int(11) NOT NULL,
  `product_id` char(6) NOT NULL,
  `QUANTITY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `COLOR` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `FISH_ID` char(6) NOT NULL,
  `FISH_TYPE` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `PH_LEVEL` int(11) NOT NULL,
  `COLOR` varchar(10) NOT NULL,
  `fish_size` varchar(20) NOT NULL,
  `FISH_NAME` varchar(30) DEFAULT NULL,
  `FISH_HABIT` varchar(30) DEFAULT NULL,
  `FISH_DESC` text DEFAULT NULL,
  `FISH_LINK_IMG` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fishspecies`
--

CREATE TABLE `fishspecies` (
  `fish_species` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fish_food`
--

CREATE TABLE `fish_food` (
  `FOOD_TYPE` varchar(20) NOT NULL,
  `FISH_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foodtype`
--

CREATE TABLE `foodtype` (
  `FOOD_TYPE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `has_size`
--

CREATE TABLE `has_size` (
  `fish_species` varchar(50) NOT NULL,
  `size` varchar(20) NOT NULL,
  `HAS_PRICE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `import_batches`
--

CREATE TABLE `import_batches` (
  `id` int(11) NOT NULL,
  `product_id` char(6) NOT NULL,
  `quantity` int(11) NOT NULL,
  `import_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(10, '2023_03_12_150010_add_google_id_to_users', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ORDER_DATE` datetime DEFAULT NULL,
  `ORDER_DELIVERY_ADDRESS` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ORDER_ID`, `user_id`, `ORDER_DATE`, `ORDER_DELIVERY_ADDRESS`) VALUES
(2, 2, '2023-03-28 01:25:19', 'Lap Vo'),
(3, 2, '2023-03-29 01:26:24', 'Lap Vo'),
(4, 3, '2023-04-05 01:27:18', 'Can Tho');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `ORDER_ID` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` char(6) NOT NULL,
  `PRICE` float DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `ORDER_ID`, `category_id`, `product_id`, `PRICE`, `QUANTITY`) VALUES
(3, 2, 1, '1', 20000, 25),
(4, 3, 1, '1', 20000, 50),
(5, 3, 2, '1', 20000, 15),
(6, 2, 1, '1', 20000, 30),
(8, 4, 1, '1', 32000, 15),
(9, 4, 2, '1', 26000, 35);

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
  `PH_LEVEL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ROLE_NAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `ROLE_NAME`) VALUES
('0', 'Khách Hàng'),
('1', 'Quản trị viên');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `phone_number`, `user_address`, `google_id`, `link_avt`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 'Truong', 'Tran Van', '123123124', 'An Khanh, Ninh Kieu, Can Tho', NULL, '/storage/images/users/tSnbbSgIO5OGbL3SK6UrZfddv4Xyf2iYaAGXUFfS.png', 'vantruong@gmail.com', '$2y$10$NsK.7f6S43ICDsjwKr2NPO42f/faBXRXEXWJMfFH09uE8MDT4ZQRe', 'hGsvIfzCBEnirFiMuoSwRCoDuF1TKfexm87gMaBGTLI9q4lfs1UdeC0BUtFj', NULL, '2023-04-10 17:53:41'),
(2, '0', 'Truong 2', 'Tran Van', '1412312', 'An Khanh, Ninh Kieu, Can Tho', NULL, '', 'vantruong2@gmail.com', '$2y$10$x8dJV84R/9.yAI.cwozA2.5tCcVET2ztAMRnL1MaGWCiAM.ZXU8yK', 'P4RV5SCsUypP8FncWVVSHCnPW7ooxAtcBr43fmWE6wkdhHwMNC9D5SZTyAII', NULL, NULL),
(24, '1', 'Trường', 'Trần Văn', '0123123123', 'An Khánh, Ninh Kiều, Cần Thơ', NULL, '/storage/images/users/JIiMbNO15guSO4LGDH0sB0VdcXHx1yy4bbChCTtj.png', 'admin@gmail.com', '$2y$10$Zi3w9kihSDcpYsUbOoJGvehcS.cCJz15i79P7sJhOgPN0.HbiNypi', NULL, '2023-04-03 17:04:24', '2023-04-03 17:04:24'),
(25, '0', 'Van', 'Truong', NULL, NULL, '103144632167425600074', NULL, 'vantruongvtd02@gmail.com', '', NULL, '2023-04-10 18:41:58', '2023-04-10 18:41:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`ACCESSORIES_ID`),
  ADD KEY `FK_ACCESSOR_GOM_NHUNG_ACCESSOR` (`ACCESSORIES_TYPE_ID`);

--
-- Indexes for table `accessoriestype`
--
ALTER TABLE `accessoriestype`
  ADD PRIMARY KEY (`ACCESSORIES_TYPE_ID`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`CART_ID`),
  ADD KEY `ID` (`user_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`CART_ID`),
  ADD KEY `FK_ACCESSOR_RELATIONS_ACCESSOR` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`COLOR`);

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
  ADD PRIMARY KEY (`FISH_ID`),
  ADD KEY `FK_FISH_CO_MAU_COLOR` (`COLOR`),
  ADD KEY `FK_FISH_SONG_O_PH` (`PH_LEVEL`),
  ADD KEY `FK_FISH_THUOCLOAI_FISHTYPE` (`FISH_TYPE`),
  ADD KEY `fk_fish_size` (`fish_size`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `fishspecies`
--
ALTER TABLE `fishspecies`
  ADD PRIMARY KEY (`fish_species`);

--
-- Indexes for table `fish_food`
--
ALTER TABLE `fish_food`
  ADD PRIMARY KEY (`FOOD_TYPE`,`FISH_ID`),
  ADD KEY `FK_FISH_FOO_FISH_FOOD_FISH` (`FISH_ID`);

--
-- Indexes for table `foodtype`
--
ALTER TABLE `foodtype`
  ADD PRIMARY KEY (`FOOD_TYPE`);

--
-- Indexes for table `has_size`
--
ALTER TABLE `has_size`
  ADD PRIMARY KEY (`fish_species`,`size`),
  ADD KEY `FK_HAS_SIZE_RELATIONS_TYPEOFDI` (`size`);

--
-- Indexes for table `import_batches`
--
ALTER TABLE `import_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `fk_accessories_accessories` (`product_id`),
  ADD KEY `fk_order` (`ORDER_ID`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`PH_LEVEL`);

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
  ADD KEY `fk_user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `CART_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `import_batches`
--
ALTER TABLE `import_batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accessories`
--
ALTER TABLE `accessories`
  ADD CONSTRAINT `FK_ACCESSOR_GOM_NHUNG_ACCESSOR` FOREIGN KEY (`ACCESSORIES_TYPE_ID`) REFERENCES `accessoriestype` (`ACCESSORIES_TYPE_ID`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `fk_cart` FOREIGN KEY (`CART_ID`) REFERENCES `carts` (`CART_ID`);

--
-- Constraints for table `fish`
--
ALTER TABLE `fish`
  ADD CONSTRAINT `FK_FISH_CO_MAU_COLOR` FOREIGN KEY (`COLOR`) REFERENCES `color` (`COLOR`),
  ADD CONSTRAINT `FK_FISH_SONG_O_PH` FOREIGN KEY (`PH_LEVEL`) REFERENCES `ph` (`PH_LEVEL`),
  ADD CONSTRAINT `FK_FISH_THUOCLOAI_FISHTYPE` FOREIGN KEY (`FISH_TYPE`) REFERENCES `fishspecies` (`fish_species`),
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `fk_fish_size` FOREIGN KEY (`fish_size`) REFERENCES `size` (`size`);

--
-- Constraints for table `fish_food`
--
ALTER TABLE `fish_food`
  ADD CONSTRAINT `FK_FISH_FOO_FISH_FOOD_FISH` FOREIGN KEY (`FISH_ID`) REFERENCES `fish` (`FISH_ID`),
  ADD CONSTRAINT `FK_FISH_FOO_FISH_FOOD_FOODTYPE` FOREIGN KEY (`FOOD_TYPE`) REFERENCES `foodtype` (`FOOD_TYPE`);

--
-- Constraints for table `has_size`
--
ALTER TABLE `has_size`
  ADD CONSTRAINT `fk_size` FOREIGN KEY (`size`) REFERENCES `size` (`size`),
  ADD CONSTRAINT `fk_species` FOREIGN KEY (`fish_species`) REFERENCES `fishspecies` (`fish_species`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`ORDER_ID`) REFERENCES `orders` (`ORDER_ID`);

--
-- Constraints for table `supplierinvoice`
--
ALTER TABLE `supplierinvoice`
  ADD CONSTRAINT `fk_supplier_user` FOREIGN KEY (`ID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
