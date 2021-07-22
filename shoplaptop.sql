-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 28, 2021 lúc 04:52 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoplaptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(10) UNSIGNED NOT NULL,
  `supp_id` int(10) UNSIGNED NOT NULL,
  `bill_total` int(11) NOT NULL,
  `bill_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`bill_id`, `supp_id`, `bill_total`, `bill_time`, `created_at`, `updated_at`) VALUES
(1, 1, 19990000, '2021-05-12 16:35:21', NULL, NULL),
(2, 2, 19990000, '2021-05-12 16:35:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `billdetails_id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(10) UNSIGNED NOT NULL,
  `prd_id` int(10) UNSIGNED NOT NULL,
  `billdetails_quantily` int(11) NOT NULL,
  `billdetails_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_details`
--

INSERT INTO `bill_details` (`billdetails_id`, `bill_id`, `prd_id`, `billdetails_quantily`, `billdetails_price`, `created_at`, `updated_at`) VALUES
(3, 1, 74, 3, 17990000, NULL, NULL),
(4, 1, 78, 3, 19490000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `brd_id` int(10) UNSIGNED NOT NULL,
  `brd_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brd_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brd_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brd_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brd_id`, `brd_img`, `brd_name`, `brd_description`, `brd_slug`, `created_at`, `updated_at`) VALUES
(1, 'Msi.png', 'MSI', 'Thương hiệu chuyên về laptop hiệu năng cao, chơi game', 'msi', '2021-05-09 09:56:04', NULL),
(2, 'Asus.png', 'ASUS', 'Laptop chơi game và thiết kế sang trọng', 'asus', '2021-05-09 09:56:04', NULL),
(3, 'images.png', 'DELL', 'Laptop đồ họa chơi game mượt mà', 'dell', '2021-05-09 09:56:04', NULL),
(4, 'Acer.png', 'ACER', 'Laptop với thiết kế nổi trội, ấn tượng', 'acer', '2021-05-09 09:56:04', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

CREATE TABLE `category_product` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `brd_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_parent_id` int(11) NOT NULL,
  `cat_status` int(11) NOT NULL,
  `cat_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`cat_id`, `brd_id`, `cat_name`, `cat_description`, `cat_parent_id`, `cat_status`, `cat_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'LAPTOP MSI', 'nam', 0, 1, 'laptop-msi', NULL, NULL),
(2, 1, 'MSI Gaming Series', 'nam', 1, 1, 'msi-gaming-series', NULL, NULL),
(3, 1, 'GF Series', 'nam', 1, 1, 'gf-series', NULL, NULL),
(4, 1, 'GL Series', 'nam', 1, 1, 'gl-series', NULL, NULL),
(5, 1, 'GP Series', 'nam', 1, 1, 'gp-series', NULL, NULL),
(6, 1, 'GE Series', 'nam', 1, 1, 'ge-series', NULL, NULL),
(7, 1, 'GS Series', 'nam', 1, 1, 'gs-series', NULL, NULL),
(8, 1, 'GT Series', 'nam', 1, 1, 'gt-series', NULL, NULL),
(9, 2, 'LAPTOP ASUS', 'nam', 0, 1, 'laptop-asus', NULL, NULL),
(10, 2, 'TUF Gaming', 'nam', 9, 1, 'tuf-gaming', NULL, NULL),
(11, 2, 'ROG Strix G', 'nam', 9, 1, 'rog-strix-g', NULL, NULL),
(12, 2, 'ROG Strix Scar', 'nam', 9, 1, 'rog-strix-scar', NULL, NULL),
(13, 2, 'ROG Flow', 'nam', 9, 1, 'rog-flow', NULL, NULL),
(14, 2, 'Rephyrus', 'nam', 9, 1, 'rephyrus', NULL, NULL),
(15, 3, 'LAPTOP DELL', 'nam', 0, 1, 'laptop-dell', NULL, NULL),
(16, 2, 'Inspiron G3 Gaming', 'nam', 15, 1, 'inspiron-g3-gaming', NULL, NULL),
(17, 2, 'Inspiron G5 Gaming', 'nam', 15, 1, 'inspiron-g5-gaming', NULL, NULL),
(18, 4, 'LAPTOP ACER', 'nam', 0, 1, 'laptop-acer', NULL, NULL),
(19, 2, 'Aspire 7', 'nam', 18, 1, 'aspire-7', NULL, NULL),
(20, 2, 'Nitro', 'nam', 18, 1, 'nitro', NULL, NULL),
(21, 2, 'Predator Helios', 'nam', 18, 1, 'predator-helios', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '2021_02_19_101413_create_tbl_admin_table', 1),
(32, '2021_03_25_155048_create_brand_table', 1),
(33, '2021_03_25_160512_create_category_product_table', 1),
(34, '2021_03_27_134123_create_product_table', 1),
(35, '2021_03_28_022508_create_supplier_table', 1),
(42, '2021_04_03_143008_create_bill_table', 2),
(48, '2021_04_03_143528_create_bill_details_table', 3),
(49, '2021_04_03_160058_create_order_table', 3),
(50, '2021_04_03_160200_create_order_details_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `ord_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord_shipping_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord_payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`ord_id`, `user_name`, `user_address`, `user_phone`, `ord_note`, `ord_status`, `ord_shipping_status`, `ord_payment_status`, `ord_total`, `created_at`, `updated_at`) VALUES
(8, 'Phạm Quang Hoàn', 'đội 10, phượng hoàng, Hùng Cường, tp Hưng Yên, Hưng Yên', '0962437205', 'giao nhanh cho a', 'Đã xác thực', 'Đã vận chuyển', 'Chưa thanh toán', 17990000, '2021-05-13 09:46:11', '2021-05-17 01:31:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `ord_id` int(10) UNSIGNED NOT NULL,
  `prd_id` int(10) UNSIGNED NOT NULL,
  `quantily` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `ord_id`, `prd_id`, `quantily`, `created_at`, `updated_at`) VALUES
(2, 8, 73, 1, '2021-05-13 09:46:11', '2021-05-13 09:46:11'),
(3, 8, 116, 1, '2021-05-27 09:22:39', '2021-05-27 09:22:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `prd_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `prd_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_cpu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_operating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_ram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_gpu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_monitor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_ssd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_hdd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_optical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_lan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_wireless_lan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_ports` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_keyboard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_battery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_number` int(11) NOT NULL,
  `prd_price` int(11) NOT NULL,
  `prd_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`prd_id`, `cat_id`, `prd_name`, `prd_img`, `prd_cpu`, `prd_operating`, `prd_ram`, `prd_gpu`, `prd_monitor`, `prd_ssd`, `prd_hdd`, `prd_optical`, `prd_lan`, `prd_wireless_lan`, `prd_ports`, `prd_keyboard`, `prd_battery`, `prd_weight`, `prd_number`, `prd_price`, `prd_slug`, `created_at`, `updated_at`) VALUES
(73, 2, 'LAPTOP GAMING MSI BRAVO 15 A4DCR 270VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'AMD Ryzen 5 – 4600H', 'Windows 10 SL 64 Bit', 'DDR4 8GB (1 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Radeon RX5300M 3GB', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel', '256GB SSD NVMe M.2 PCIe Gen 3×2, 1 slot SSD NVMe M.2 PCIe Gen3 X4 hoặc M.2 SATA III', '', 'No ODD', 'Gigabit Lan', 'Intel Wi-Fi 6 AX201(2*2 ax) + BT5', '1x (4K @ 30Hz) HDMI, 1x RJ45, 1x Type-C USB3.2 Gen1, 3x Type-A USB3.2 Gen1', 'Backlight Keyboard ( Red )', '3 Cell', '1.8 ', 10, 17990000, 'laptop-gaming-msi-bravo-15-a4dcr-270vn', '2021-05-09 09:58:32', NULL),
(74, 2, 'LAPTOP GAMING MSI GF63 THIN 9SCSR 1057VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i5 9300H', 'Windows 10 64Bit Home', 'DDR4 8GB (1 x 8GB) 2666MHz; 2 slots, up to 32GB', 'Geforce GTX 1650Ti MaxQ', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '1 slot HDD 2.5', 'No ODD', 'Gigabit Lan', 'AC 9560 (2*2 a/c) + BT5', '1x (4K @ 30Hz) HDMI, 1x RJ45, 1x Type-C USB3.2 Gen1, 3x Type-A USB3.2 Gen1', 'Backlight Keyboard ( Red )', '359 x 254 x 21.7 mm', '1.8 kg', 10, 19490000, 'laptop-gaming-msi-gf63-thin-9scsr-1057vn', '2021-05-09 09:58:32', NULL),
(75, 2, 'LAPTOP GAMING MSI GF63 THIN 10SC 014VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i5 10200H', '', 'DDR4 8GB (1 x 8GB) 2666MHz; 2 slots, up to 32GB', 'Geforce GTX 1650 MaxQ', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '1 slot HDD 2.5', 'No ODD', 'Gigabit Lan', 'Intel Wi-Fi 6 AX201(2*2 ax) + BT5', '1x (4K @ 30Hz) HDMI, 1x RJ45, 1x Type-C USB3.2 Gen1, 3x Type-A USB3.2 Gen1', 'Backlight Keyboard ( Red )', '3 Cell', '1.8 kg', 10, 20490000, 'laptop-gaming-msi-gf63-thin-10sc-014vn', '2021-05-09 09:58:32', NULL),
(76, 2, 'LAPTOP GAMING MSI GF63 THIN 9SCSR 846VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i7 9750H', 'Windows 10 64Bit Home', 'DDR4 8GB (1 x 8GB) 2666MHz; 2 slots, up to 32GB', 'Geforce GTX 1650Ti MaxQ', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '1 slot HDD 2.5', 'No ODD', 'Gigabit Lan', 'AC 9560 (2*2 a/c) + BT5', '1x (4K @ 30Hz) HDMI, 1x RJ45, 1x Type-C USB3.2 Gen1, 3x Type-A USB3.2 Gen1', 'Backlight Keyboard ( Red )', '3 Cell', '1.8 kg', 10, 21990000, 'laptop-gaming-msi-gf63-thin-9scsr-846vn', '2021-05-09 09:58:32', NULL),
(77, 2, 'LAPTOP GAMING MSI BRAVO 17 A4DDR 200VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'AMD Ryzen 5 – 4600H', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Radeon RX5500M 4GB', '17.3\" FHD (1920×1080) IPS, 144Hz', '512GB SSD NVMe M.2 PCIe Gen 3 x 4, 1 slot SSD NVMe M.2 PCIe Gen3 X4 hoặc M.2 SATA III', '', 'No ODD', 'Gigabit Lan', 'Intel Wi-Fi 6 AX201(2*2 ax) + BT5', '1x (4K @ 30Hz) HDMI, 1x RJ45, 1x Type-C USB3.2 Gen1, 3x Type-A USB3.2 Gen1', 'Backlight Keyboard ( Red )', '3 Cell', '2.3 kg', 8, 22090000, 'laptop-gaming-msi-bravo-17-a4ddr-200vn', '2021-05-09 09:58:32', '2021-05-11 01:41:34'),
(78, 2, 'LAPTOP GAMING MSI GF63 THIN 10SCSR 830VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i7 10750H', 'Windows 10 64Bit Home', 'DDR4 8GB (1 x 8GB) 2666MHz; 2 slots, up to 32GB', 'Geforce GTX 1650Ti MaxQ', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '1 slot HDD 2.5', 'No ODD', 'Gigabit Lan', 'Intel Wi-Fi 6 AX201(2*2 ax) + BT5', '1x (4K @ 30Hz) HDMI, 1x RJ45, 1x Type-C USB3.2 Gen1, 3x Type-A USB3.2 Gen1', 'Backlight Keyboard ( Red )', '3 Cell', '1.8 kg', 10, 19490000, 'laptop-gaming-msi-gf63-thin-10scsr-830vn', '2021-05-09 09:58:32', NULL),
(79, 2, 'LAPTOP GAMING MSI GL65 LEOPARD 10SCXK 089VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i7 10750H', 'Windows 10 SL 64 Bit', 'DDR4 8GB (1 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce GTX 1650 4GB', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1 slot HDD 2.5', 'No ODD', '', '802.11 ac Wi-Fi + Bluetooth v5', '1x (4K @ 60Hz) HDMI, 1x Mini-DisplayPort, 1x RJ45, 1x SD (XC/HC), 1x Type-A USB3.2 Gen2, 1x Type-C USB3.2 Gen2, 2x Type-A USB3.2 Gen1', 'Per-key RGB Keyboard', '6 Cell', '2.3 kg', 10, 22490000, 'laptop-gaming-msi-gl65-leopard-10scxk-089vn', '2021-05-09 09:58:32', NULL),
(80, 2, 'LAPTOP GAMING MSI GL65 LEOPARD 10SCXK 093VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i7 10750H', 'Windows 10 SL 64 Bit', 'DDR4 8GB (1 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce GTX 1650 4GB', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1 slot HDD 2.5', 'No ODD', 'Killer Gb LAN', '802.11 ac Wi-Fi + Bluetooth v5', '1x (4K @ 60Hz) HDMI, 1x Mini-DisplayPort, 1x RJ45, 1x SD (XC/HC), 1x Type-A USB3.2 Gen2, 1x Type-C USB3.2 Gen2, 2x Type-A USB3.2 Gen1', 'Per-key RGB Keyboard', '6 Cell', '2.3 kg', 10, 22490000, 'laptop-gaming-msi-gl65-leopard-10scxk-093vn', '2021-05-09 09:58:32', NULL),
(81, 3, 'LAPTOP GAMING MSI GF63 THIN 9SCSR 1057VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i5 9300H', 'Windows 10 64Bit Home', 'DDR4 8GB (1 x 8GB) 2666MHz; 2 slots, up to 32GB', 'Geforce GTX 1650Ti MaxQ', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '1 slot HDD 2.5', 'No ODD', 'Gigabit Lan', 'AC 9560 (2*2 a/c) + BT5', '1x (4K @ 30Hz) HDMI, 1x RJ45, 1x Type-C USB3.2 Gen1, 3x Type-A USB3.2 Gen1', 'Backlight Keyboard ( Red )', '3 Cell', '1.8 kg', 10, 19490000, 'laptop-gaming-msi-gf63-thin-9scsr-1057vn', '2021-05-09 09:58:32', NULL),
(82, 3, 'LAPTOP GAMING MSI GF63 THIN 10SC 014VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i5 10200H', 'Windows 10 64Bit Home', 'DDR4 8GB (1 x 8GB) 2666MHz; 2 slots, up to 32GB', 'Geforce GTX 1650 MaxQ', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '1 slot HDD 2.5', 'No ODD', 'Gigabit Lan', 'Intel Wi-Fi 6 AX201(2*2 ax) + BT5', '1x (4K @ 30Hz) HDMI, 1x RJ45, 1x Type-C USB3.2 Gen1, 3x Type-A USB3.2 Gen1', 'Backlight Keyboard ( Red )', '3 Cell', '1.8 kg', 10, 20490000, 'laptop-gaming-msi-gf63-thin-10sc-014vn', '2021-05-09 09:58:32', NULL),
(83, 4, 'LAPTOP GAMING MSI GL65 LEOPARD 10SCXK 089VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i7 10750H', 'Windows 10 SL 64 Bit', 'DDR4 8GB (1 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce GTX 1650 4GB', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1 slot HDD 2.5', 'No ODD', 'Killer Gb LAN', '802.11 ac Wi-Fi + Bluetooth v5', '1x (4K @ 60Hz) HDMI, 1x Mini-DisplayPort, 1x RJ45, 1x SD (XC/HC), 1x Type-A USB3.2 Gen2, 1x Type-C USB3.2 Gen2, 2x Type-A USB3.2 Gen1', 'Per-key RGB Keyboard', '6 Cell', '2.3 kg', 10, 20490000, 'laptop-gaming-msi-gl65-leopard-10scxk-089vn', '2021-05-09 09:58:32', NULL),
(84, 4, 'LAPTOP GAMING MSI GL65 LEOPARD 10SCXK 093VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i7 10750H', 'Windows 10 SL 64 Bit', 'DDR4 8GB (1 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce GTX 1650 4GB', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1 slot HDD 2.5', 'No ODD', 'Gigabit Lan', '802.11 ac Wi-Fi + Bluetooth v5', '1x (4K @ 60Hz) HDMI, 1x Mini-DisplayPort, 1x RJ45, 1x SD (XC/HC), 1x Type-A USB3.2 Gen2, 1x Type-C USB3.2 Gen2, 2x Type-A USB3.2 Gen1', 'Per-key RGB Keyboard', '6 Cell', '2.3 kg', 10, 22490000, 'laptop-gaming-msi-gl65-leopard-10scxk-093vn', '2021-05-09 09:58:32', NULL),
(85, 5, 'LAPTOP GAMING MSI GP66 LEOPARD 10UE 206VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i7 10870H', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 3060 6GB', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel', '1TB SSD NVMe M.2 PCIe Gen 3 x 4', '', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '4 Cell, 65Whrs', '2.3 kg', 10, 20490000, 'laptop-gaming-msi-gp66-leopard-10ue-206vn', '2021-05-09 09:58:32', NULL),
(86, 5, 'LAPTOP GAMING MSI GP76 LEOPARD 10UE 604VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i7 10870H', 'Windows 10 SL 64 Bit', 'DDR4 32GB (2 x 16GB) bus 3200MHz', 'Geforce RTX 3060 6GB', '17.3\" FHD (1920×1080) IPS, Non-Glare, 100% sRGB, 300nits LED 144Hz', '1TB SSD NVMe M.2 PCIe Gen 3 x 4', '', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '4 Cell, 65Whrs', '2.6 kg', 10, 20490000, 'laptop-gaming-msi-gp76-leopard-10ue-604vn', '2021-05-09 09:58:32', NULL),
(87, 6, 'LAPTOP GAMING MSI GE66 RAIDER 10SFS 474VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i7 10875H', 'Windows 10 SL 64 Bit', 'DDR4 32GB (2 x 16GB); 2 slots up to 2933Hz', 'Geforce RTX 2070 Super 8GB', '15.6\" FHD (1920×1080) IPS, 300Hz', '1TB SSD NVMe M.2 PCIe Gen 3 x 4', '', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '4 Cells, 99.9Whrs', '2.4 kg', 10, 20490000, 'laptop-gaming-msi-ge66-raider-10sfs-474vn', '2021-05-09 09:58:32', NULL),
(88, 6, 'LAPTOP GAMING MSI GE75 RAIDER 10SFS 270VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 20490000, 'laptop-gaming-msi-ge75-raider-10sfs-270vn', '2021-05-09 09:58:32', NULL),
(89, 7, 'LAPTOP GAMING MSI STEALTH 15M A11SDK 061VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i7 10875H', 'Windows 10 SL 64 Bit', 'DDR4 32GB (2 x 16GB); 2 slots up to 2933Hz', 'Geforce RTX 2070 Super 8GB', '15.6\" FHD (1920×1080) IPS, 300Hz', '1TB SSD NVMe M.2 PCIe Gen 3 x 4', '', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '4 Cells, 99.9Whrs', '2.4 kg', 10, 20490000, 'laptop-gaming-msi-stealth-15m-a11sdk-061vn', '2021-05-09 09:58:32', NULL),
(90, 7, 'LAPTOP GAMING MSI STEALTH 15M A11SDK 060VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 20490000, 'laptop-gaming-msi-stealth-15m-a11sdk-060vn', '2021-05-09 09:58:32', NULL),
(91, 7, 'LAPTOP GAMING MSI GS66 STEALTH 10SE 407VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 39990000, 'laptop-gaming-msi-gs66-stealth-10se-407vn', '2021-05-09 09:58:32', NULL),
(92, 7, 'LAPTOP GAMING MSI GS66 STEALTH 10UE 200VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 54990000, 'laptop-gaming-msi-gs66-stealth-10ue-200vn', '2021-05-09 09:58:32', NULL),
(93, 7, 'LAPTOP GAMING MSI GS66 STEALTH 10UG 073VN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 60990000, 'laptop-gaming-msi-gs66-stealth-10ug-073vn', '2021-05-09 09:58:32', NULL),
(94, 8, 'LAPTOP GAMING MSI GT76 TITAN DT 9SF', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 104990000, 'laptop-gaming-msi-gt76-titan-dt-9sf', '2021-05-09 09:58:32', NULL),
(95, 10, 'LAPTOP GAMING ASUS TUF FX505DT-HN488T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 16990000, 'laptop-gaming-asus-tuf-fx505dt-hn488t', '2021-05-09 09:58:32', NULL),
(96, 10, 'LAPTOP GAMING ASUS TUF FX505DT-HN478T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 17990000, 'laptop-gaming-asus-tuf-fx505dt-hn478t', '2021-05-09 09:58:32', NULL),
(97, 10, 'LAPTOP GAMING ASUS TUF F15 FX506LH-HN002T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 18990000, 'laptop-gaming-asus-tuf-f15-fx506lh-hn002t', '2021-05-09 09:58:32', NULL),
(98, 10, 'LAPTOP GAMING ASUS TUF F15 FX506LI-HN039T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 20490000, 'LAPTOP GAMING ASUS TUF F15 FX506LI-HN039T', '2021-05-09 09:58:32', NULL),
(99, 10, 'Laptop Gaming Asus TUF F15 FX506LI-HN096T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 23990000, 'laptop-gaming-asus-tuf-f15-fx506li-hn096t', '2021-05-09 09:58:32', NULL),
(100, 10, 'Laptop Gaming Asus TUF A17 FA706II-H7286T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 23990000, 'laptop-gaming-asus-tuf-a17-fa706ii-h7286t', '2021-05-09 09:58:32', NULL),
(101, 10, 'Laptop Gaming Asus TUF A15 FA506IU-AL127T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 24490000, 'laptop-gaming-asus-tuf-a15-fa506iu-al127t', '2021-05-09 09:58:32', NULL),
(102, 10, 'Laptop Gaming Asus TUF A17 FA706IU-H7133T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 25490000, 'laptop-gaming-asus-tuf-a17-fa706iu-h7133t', '2021-05-09 09:58:32', NULL),
(103, 11, 'LAPTOP ASUS ROG STRIX G15 G512-IAL013T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 22490000, 'laptop-asus-rog-strix-g15-g512-ial013t', '2021-05-09 09:58:32', NULL),
(104, 11, 'LAPTOP ASUS ROG STRIX G15 G512-IHN281T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 25990000, 'laptop-asus-rog-strix-g15-g512-ihn281t', '2021-05-09 09:58:32', NULL),
(105, 11, 'LAPTOP ASUS ROG STRIX G17 G713QR-HG072T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 49990000, 'laptop-asus-rog-strix-g17-g713qr-hg072t', '2021-05-09 09:58:32', NULL),
(106, 11, 'Laptop Asus ROG Strix G15 G513QM-HN169T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 28990000, 'laptop-asus-rog-strix-g15-g513qm-hn169t', '2021-05-09 09:58:32', NULL),
(107, 11, 'Laptop Asus ROG Strix G17 G713QM-HX083T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 38990000, 'laptop-asus-rog-strix-g17-g713qm-hx083t', '2021-05-09 09:58:32', NULL),
(108, 11, 'Laptop Asus ROG Strix G15 G513QM-HF295T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 40990000, 'laptop-asus-rog-strix-g15-g513qm-hf295t', '2021-05-09 09:58:32', NULL),
(109, 11, 'Laptop Asus ROG Strix G17 G713QM-K4113T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 41990000, 'laptop-asus-rog-strix-g17-g713qm-k4113t', '2021-05-09 09:58:32', NULL),
(110, 12, 'LAPTOP ASUS ROG STRIX SCAR 15 G533QR-HQ081T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 56990000, 'laptop-asus-rog-strix-scar-15-g533qr-hq081t', '2021-05-09 09:58:32', NULL),
(111, 12, 'LAPTOP ASUS ROG STRIX SCAR 17 G733QS-HG021T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 74990000, 'laptop-asus-rog-strix-scar-17-g733qs-hg021t', '2021-05-09 09:58:32', NULL),
(112, 12, 'Laptop Asus ROG Strix Scar 15 G533QM-HQ054T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 45990000, 'laptop-asus-rog-strix-scar-15-g533qm-hq054t', '2021-05-09 09:58:32', NULL),
(113, 12, 'Laptop Asus ROG Strix Scar 15 G533QM-HQ074T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 49990000, 'laptop-asus-rog-strix-scar-15-g533qm-hq074t', '2021-05-09 09:58:32', NULL),
(114, 12, 'Laptop Asus ROG Strix Scar 15 G533QM-HF089T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 49990000, 'laptop-asus-rog-strix-scar-15-g533qm-hf089t', '2021-05-09 09:58:32', NULL),
(115, 12, 'Laptop Asus ROG Strix Scar 15 G533QR-HF113T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 59990000, 'laptop-asus-rog-strix-scar-15-g533qr-hf113t', '2021-05-09 09:58:32', NULL),
(116, 12, 'Laptop Asus ROG Strix Scar 15 G533QR-HQ098T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 49990000, 'laptop-asus-rog-strix-scar-15-g533qr-hq098t', '2021-05-09 09:58:32', NULL),
(117, 13, 'LAPTOP ASUS ROG FLOW X13 GV301QH-K6054T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 34990000, 'laptop-asus-rog-flow-x13-gv301qh-k6054t', '2021-05-09 09:58:32', NULL),
(118, 14, 'LAPTOP ASUS ROG ZEPHYRUS G14 GA401II-HE019T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 29990000, 'laptop-asus-rog-zephyrus-g14-ga401ii-he019t', '2021-05-09 09:58:32', NULL),
(119, 14, 'LAPTOP ASUS ROG ZEPHYRUS G14 GA401II-HE154T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 32490000, 'laptop-asus-rog-zephyrus-g14-ga401ii-he154t', '2021-05-09 09:58:32', NULL),
(120, 14, 'LAPTOP ASUS ROG ZEPHYRUS G14 GA401IU-HA256T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 33390000, 'laptop-asus-rog-zephyrus-g14-ga401iu-ha256t', '2021-05-09 09:58:32', NULL),
(121, 14, 'LAPTOP ASUS ROG ZEPHYRUS G14 GA401IU-HA171T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 34990000, 'laptop-asus-rog-zephyrus-g14-ga401iu-ha171t', '2021-05-09 09:58:32', NULL),
(122, 14, 'Laptop ASUS ROG Zephyrus G15 GA503QM-HQ097T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 39990000, 'laptop-asus-rog-zephyrus-g15-ga503qm-hq097t', '2021-05-09 09:58:32', NULL),
(123, 14, 'Laptop ASUS ROG Zephyrus G14 GA401QM-K2041T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 49990000, 'laptop-asus-rog-zephyrus-g14-ga401qm-k2041t', '2021-05-09 09:58:32', NULL),
(124, 14, 'Laptop ASUS ROG Zephyrus G15 GA503QS-HQ052T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 64990000, 'laptop-asus-rog-zephyrus-g15-ga503qs-hq052t', '2021-05-09 09:58:32', NULL),
(125, 14, 'Laptop Asus ROG Zephyrus Duo 15 SE GX551QR-HF080T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 74990000, 'laptop-asus-rog-zephyrus-duo-15-se-gx551qr-hf080t', '2021-05-09 09:58:32', NULL),
(126, 14, 'Laptop Asus ROG Zephyrus Duo 15 SE GX551QR-HF103T', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 109990000, 'laptop-asus-rog-zephyrus-duo-15-se-gx551qr-hf103t', '2021-05-09 09:58:32', NULL),
(127, 16, 'LAPTOP DELL GAMING G3 15 3500 (70223130)', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 21490000, 'laptop-dell-gaming-g3-15-3500-70223130', '2021-05-09 09:58:32', NULL),
(128, 16, 'LAPTOP DELL GAMING G3 15 3500 (G3500A)', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 25390000, 'laptop-dell-gaming-g3-15-3500-g3500a', '2021-05-09 09:58:32', NULL),
(129, 16, 'LAPTOP DELL GAMING G3 15 3500 (G3500B)', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 28790000, 'laptop-dell-gaming-g3-15-3500-g3500b', '2021-05-09 09:58:32', NULL),
(130, 17, 'LAPTOP DELL G5 5590 (70225485)', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 27990000, 'laptop-dell-g5-5590-70225485', '2021-05-09 09:58:32', NULL),
(131, 17, 'LAPTOP DELL G5 5500 (70228123)', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 32990000, 'laptop-dell-g5-5500-70228123', '2021-05-09 09:58:32', NULL),
(132, 17, 'LAPTOP DELL G5 5590 (70225484)', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 37990000, 'laptop-dell-g5-5590-70225484', '2021-05-09 09:58:32', NULL),
(133, 19, 'LAPTOP GAMING ACER ASPIRE 7 A715-42G-R4ST', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 18490000, 'laptop-gaming-acer-aspire-7-a715-42g-r4st', '2021-05-09 09:58:32', NULL),
(134, 19, 'LAPTOP GAMING ACER ASPIRE 7 A715-41G-R150', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 19990000, 'laptop-gaming-acer-aspire-7-a715-41g-r150', '2021-05-09 09:58:32', NULL),
(135, 20, 'LAPTOP ACER NITRO 5 AN515-44-R9JM', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 18490000, 'laptop-acer-nitro-5-an515-44-r9jm', '2021-05-09 09:58:32', NULL),
(136, 20, 'Laptop Acer Nitro 5 2020 AN515-55-5923', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 19590000, 'laptop-acer-nitro-5-2020-an515-55-5923', '2021-05-09 09:58:32', NULL),
(137, 20, 'Laptop Acer Nitro 5 AN515-56-51N4', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 20990000, 'laptop-acer-nitro-5-an515-56-51n4', '2021-05-09 09:58:32', NULL),
(138, 20, 'Laptop Acer Nitro 5 AN515-45-R3SM', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 22990000, 'laptop-acer-nitro-5-an515-45-r3sm', '2021-05-09 09:58:32', NULL),
(139, 20, 'Laptop Acer Nitro 5 AN515-56-79U2', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 24490000, 'laptop-acer-nitro-5-an515-56-79u2', '2021-05-09 09:58:32', NULL),
(140, 20, 'Laptop Acer Nitro 5 AN515-45-R0B6', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 32990000, 'laptop-acer-nitro-5-an515-45-r0b6', '2021-05-09 09:58:32', NULL),
(141, 20, 'Laptop Acer Nitro 5 AN515-45-R9SC', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 38990000, 'laptop-acer-nitro-5-an515-45-r9sc', '2021-05-09 09:58:32', NULL),
(142, 21, 'Laptop Acer Predator Helios 300 PH315-53-78TN', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 19990000, 'laptop-acer-predator-helios-300-ph315-53-78tn', '2021-05-09 09:58:32', NULL),
(143, 21, 'Laptop Acer Predator Triton 500 PT515-52-78PN NH.Q6XSV.001', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 41990000, 'laptop-acer-predator-triton-500-pt515-52-78pn-nhq6xsv001', '2021-05-09 09:58:32', NULL),
(144, 21, 'Laptop Acer Predator Triton 500 PT515-52-72U2 NH.Q6WSV.001', 'BRAVO-15-A4DCR-270VN-568x568.jpg', 'Intel Core i9 10980HK', 'Windows 10 SL 64 Bit', 'DDR4 16GB (2 x 8GB) 3200MHz; 2 slots, up to 32GB', 'Geforce RTX 2070 Super 8GB', '17.3\" FHD (1920×1080), IPS, Non-Glare, 240Hz 3ms', '512GB SSD NVMe M.2 PCIe Gen 3 x 2', '1TB HDD 7200 rpm', 'No ODD', 'Killer Gb LAN', 'Killer Wi-Fi 6 AX1650i (2*2 ax) + BT5', '', 'SteelSeries Backlight Keyboard (Per-Key RGB, Full-Color)', '6-Cell , 51 Whr', '2.64 kg', 10, 49990000, 'laptop-acer-predator-triton-500-pt515-52-72u2-nhq6wsv001', '2021-05-09 09:58:32', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` int(10) UNSIGNED NOT NULL,
  `supp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supp_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supp_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supp_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`supp_id`, `supp_name`, `supp_address`, `supp_phone`, `supp_email`, `created_at`, `updated_at`) VALUES
(1, 'Công Ty TNHH Thương Mại Hoàng Phát Hải Phòng', 'Số 4, Lô 2A Lê Hồng Phong, Ngô Quyền, Tp. Hải Phòng - Chi Nhánh: Thanh Hóa', '0375767678', 'lananhhoangphat@gmail.com', NULL, '2021-05-14 07:11:01'),
(2, 'Công Ty TNHH Quảng Tin', '6D3 Chu Văn An, Phường 26, Quận Bình Thạnh, TP. Hồ Chí Minh (TPHCM)', '0989044022', 'quangtin@quangtin.com', NULL, NULL),
(3, 'Công Ty TNHH Công Nghệ Máy Tính An Phát', 'Số 19, Ngõ 178 Thái Hà - Đống Đa - Tp. Hà Nội (TPHN)', '0971851111', 'maytinhanphat178@gmail.com', NULL, NULL),
(4, 'Hộ Kinh Doanh Hoàng Nam', 'Số 10, Ngõ 31, Phố Doãn Kế Thiện, Phường Mai Dịch, Quận Cầu Giấy, Thành Phố Hà Nội', '091.5500 899', 'sonhh2412@gmail.com', NULL, NULL),
(5, 'Công Ty TNHH Thương Mại VHC', 'VHC Tower, 399 Phạm Văn Đồng, P. Xuân Đỉnh, Q. Bắc Từ Liêm, TP Hà Nội (TPHN)', '(024) 37501188', 'online@hc.com.vn', NULL, NULL),
(6, 'Công Ty TNHH Thương Mại Hoàng Phát Hải Phòng', 'Số 4, Lô 2A Lê Hồng Phong, Ngô Quyền, Tp. Hải Phòng - Chi Nhánh: Thanh Hóa', '03757676', 'lananhhoangphat@gmail.com', NULL, NULL),
(7, 'Công Ty TNHH Quảng Tin', '6D3 Chu Văn An, Phường 26, Quận Bình Thạnh, TP. Hồ Chí Minh (TPHCM)', '0989044022', 'quangtin@quangtin.com', NULL, NULL),
(8, 'Công Ty TNHH Công Nghệ Máy Tính An Phát', 'Số 19, Ngõ 178 Thái Hà - Đống Đa - Tp. Hà Nội (TPHN)', '0971851111', 'maytinhanphat178@gmail.com', NULL, NULL),
(9, 'Hộ Kinh Doanh Hoàng Nam', 'Số 10, Ngõ 31, Phố Doãn Kế Thiện, Phường Mai Dịch, Quận Cầu Giấy, Thành Phố Hà Nội', '091.5500 899', 'sonhh2412@gmail.com', NULL, NULL),
(10, 'Công Ty TNHH Thương Mại VHC', 'VHC Tower, 399 Phạm Văn Đồng, P. Xuân Đỉnh, Q. Bắc Từ Liêm, TP Hà Nội (TPHN)', '(024) 37501188', 'online@hc.com.vn', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `password`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'tuanphamacb05@gmail.com', '$2y$10$j3IIRW4dJ6/4Pur8zCFEhOSP8GswmSq13wPj1tNsLzmtM831MvyP6', 'Tuấn PC', '0962437205', '2021-05-09 09:55:59', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `bill_supp_id_foreign` (`supp_id`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`billdetails_id`),
  ADD KEY `bill_details_bill_id_foreign` (`bill_id`),
  ADD KEY `bill_details_prd_id_foreign` (`prd_id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brd_id`),
  ADD UNIQUE KEY `brand_brd_name_unique` (`brd_name`);

--
-- Chỉ mục cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `category_product_cat_name_unique` (`cat_name`),
  ADD KEY `category_product_brd_id_foreign` (`brd_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ord_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_details_ord_id_foreign` (`ord_id`),
  ADD KEY `order_details_prd_id_foreign` (`prd_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `product_cat_id_foreign` (`cat_id`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_admin_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `billdetails_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `brd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category_product`
--
ALTER TABLE `category_product`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `ord_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_supp_id_foreign` FOREIGN KEY (`supp_id`) REFERENCES `supplier` (`supp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_details_prd_id_foreign` FOREIGN KEY (`prd_id`) REFERENCES `product` (`prd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_brd_id_foreign` FOREIGN KEY (`brd_id`) REFERENCES `brand` (`brd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ord_id_foreign` FOREIGN KEY (`ord_id`) REFERENCES `order` (`ord_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_prd_id_foreign` FOREIGN KEY (`prd_id`) REFERENCES `product` (`prd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `category_product` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
