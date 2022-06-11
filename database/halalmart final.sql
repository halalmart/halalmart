-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2022 at 05:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `halalmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `role_id` varchar(1) NOT NULL,
  `image` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `jenis_kelamin`, `role_id`, `image`, `is_active`, `date_created`) VALUES
(1, 'diki@diki.com', '$2y$10$Jd68mSpMtq4YUDGpce7KeuXLvNeGb4OKErpnj/5x2VZTEx20ZO0hS', 'mas diki', 'laki-laki', '1', 'default.jpg', 1, 1231234234);

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `role_id` varchar(10) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `menu`, `url`, `icon`, `role_id`, `is_active`) VALUES
(1, 'Data Penjual', 'admin/penjual', 'fas fa-fw fa-user', '1+2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL,
  `id_pembeli` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `quantity` varchar(256) NOT NULL,
  `patner_price` varchar(128) NOT NULL,
  `sub_price` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`id`, `id_pembeli`, `role_id`, `id_product`, `name`, `foto`, `quantity`, `patner_price`, `sub_price`, `created_at`, `modified_at`) VALUES
(10, '12345678', 3, 3, 'BEAUTY DAY CREAM', 'day-cream.jpeg', '3', '60000', '', '2022-06-07 06:08:01', NULL),
(15, '12345678', 3, 2, 'ANDROGRAPHIS CENTELLA 2020', '', '1', '65000', '', '2022-06-07 06:08:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `discount_percent` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `category_id` int(2) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `date_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`category_id`, `foto`, `nama_kategori`, `date_input`) VALUES
(1, 'com_yanuarhpai_resepherbahpai-removebg-preview.png', 'herbs products', '2022-04-12 05:34:23'),
(2, '12208748-removebg-preview.png', 'health food & beverages', '2022-04-12 05:35:12'),
(3, 'pngwing_com.png', 'cosmetics & home care', '2022-04-12 05:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `kurir` varchar(255) NOT NULL,
  `harga_1` varchar(128) NOT NULL,
  `harga_2` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `foto`, `kurir`, `harga_1`, `harga_2`) VALUES
(1, 'jne.jpg', 'JnE', '15000', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `total` decimal(50,0) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `kurir` varchar(128) NOT NULL,
  `created_id` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paymem_details`
--

CREATE TABLE `paymem_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(6) NOT NULL,
  `id_pembeli` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id`, `id_pembeli`, `email`, `password`, `name`, `jenis_kelamin`, `city`, `address`, `role_id`, `is_active`, `image`, `date_created`) VALUES
(4, '', 'ini@ini.com', '$2y$10$uGwSMFwvmcNcJQkpGHvyG.kd8d2iElcatVqdZq6Q0KY8cQtBdgd7u', 'diki', 'laki-laki', 'Semarang', 'suruh', 4, 1, 'default.jpg', 1650251828),
(5, '', 'ini@itu.com', '$2y$10$SUek0JPE6CpMCXzuY07CFeIpmgn/6Cal8lObLIx9bBO8ZXX9u1fbe', 'Diki', 'laki-laki', 'Semarang', 'suruh', 4, 1, 'default.jpg', 1650266311),
(6, '87654321', 'diki@diki.com', '$2y$10$D7sAFzn4GnkWps77rZsMquTNOqhdO6gVZNiAWYo33k3kTw21c6dfe', 'kidi', 'laki-laki', 'Semarang', 'suruh', 4, 1, 'default.jpg', 1653097197),
(7, '12345678', 'pembeli@pembeli.com', '$2y$10$PLB.JWXeL1.5zJL.KxgqduMZReheEaVEO36S.UNqDZFceHQd.vNZe', 'diki', 'diki', 'diki', 'diki', 3, 1, 'default.jpg', 1653542291);

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `id` int(11) NOT NULL,
  `id_penjual` varchar(8) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id`, `id_penjual`, `email`, `password`, `name`, `jenis_kelamin`, `city`, `address`, `image`, `role_id`, `is_active`, `date_created`) VALUES
(6, '87654321', 'kidi@diki.com', '$2y$10$2WjZKd96BvSV7/x7PpaZauWu778GJag7s/iI0vIt/zRohySoIrA1a', 'afan', 'laki-laki', 'Semarang', 'suruh', 'default.jpg', 2, 1, 1649919516),
(7, '87654321', 'ini@ini.com', '$2y$10$9ZnhL/9Lmfo.07KWh7wZPeyodFURykEdki8RDbVFKri4CfSb1M4mS', 'diki', 'laki-laki', 'Semarang', 'suruh', 'default.jpg', 2, 1, 1650266406);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `order_id` int(11) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `status_pembeli` int(11) NOT NULL,
  `nama_produk` int(11) NOT NULL,
  `jumlah` varchar(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `total_poin` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `porduct_inventory`
--

CREATE TABLE `porduct_inventory` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `name` varchar(60) NOT NULL,
  `desc` text NOT NULL,
  `sku` varchar(60) NOT NULL,
  `category_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `patner_price` decimal(30,0) NOT NULL,
  `price` varchar(10) NOT NULL,
  `point` varchar(4) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `modified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `foto`, `name`, `desc`, `sku`, `category_id`, `inventory_id`, `patner_price`, `price`, `point`, `created_at`, `modified_at`, `deleted_at`) VALUES
(1, '', 'AL ARD EXTRA VIRGIN OLIVE OIL', 'diskripsi', '1000100101101', 4, 1, '180000', '200000', '45', '2022-05-21 03:04:38.740559', NULL, NULL),
(2, '', 'ANDROGRAPHIS CENTELLA 2020', 'diskripsi', '2000200202202', 1, 2, '65000', '85000', '25', '2022-05-21 03:02:27.339021', NULL, NULL),
(3, 'day-cream.jpeg', 'BEAUTY DAY CREAM', 'diskripsi', '3000300303303', 3, 3, '60000', '75000', '20', '2022-05-23 08:29:18.677874', '0000-00-00 00:00:00', NULL),
(4, '', 'BEAUTY NIGHT CREAM', 'diskripsi', '4', 3, 3, '30000', '35000', '5', '2022-05-27 12:27:10.930703', '0000-00-00 00:00:00', NULL),
(5, '', 'BILLBERRY 2020', 'diskripsi', '5000500505505', 1, 5, '110000', '150000', '42', '2022-05-21 03:02:27.475747', NULL, NULL),
(6, '', 'BIOSIR', 'diskripsi', '6000600606606', 1, 6, '75000', '90000', '20', '2022-05-21 03:02:27.508377', NULL, NULL),
(7, '', 'BROSUR PRODUK WIL 1', 'diskripsi', '7000700707707', 5, 7, '30000', '35000', '5', '2022-05-21 03:02:27.530380', NULL, NULL),
(8, '', 'CARNOCAP', 'diskripsi', '8000800808808', 1, 8, '100000', '120000', '30', '2022-05-21 03:02:27.552619', NULL, NULL),
(9, '', 'CD SENANDUNG MOTIVASI MAIDANY VOL.3', 'diskripsi', '9000900909909', 5, 9, '40000', '50000', '10', '2022-05-21 03:02:27.577908', NULL, NULL),
(10, '', 'CENTELLA TEH SINERGI', 'diskripsi', '10001001011010', 4, 10, '55000', '70000', '15', '2022-05-21 03:02:27.609210', NULL, NULL),
(11, '', 'Dates Syrop', 'diskripsi', '11001101112111', 4, 11, '35000', '45000', '8', '2022-05-21 03:02:27.639918', NULL, NULL),
(12, '', 'Deep Beauty', 'diskripsi', '12001201213212', 3, 12, '360000', '460000', '100', '2022-05-21 03:02:27.662196', NULL, NULL),
(13, '', 'DEEP OLIVE (WIL. 1)', 'diskripsi', '13001301314313', 4, 13, '120000', '150000', '30', '2022-05-21 03:02:27.684021', NULL, NULL),
(14, '', 'DEEP SQUA 100', 'diskripsi', '14001401415414', 1, 14, '375000', '460000', '130', '2022-05-21 03:02:27.706720', NULL, NULL),
(15, '', 'DEEP SQUA 50 (SQUALINE)', 'diskripsi', '15001501516515', 1, 15, '200000', '250000', '65', '2022-05-21 03:02:27.728891', NULL, NULL),
(16, '', 'DEODORANT ROLL ON MEN', 'diskripsi', '16001601617616', 3, 16, '24000', '27000', '5', '2022-05-21 03:02:27.807564', NULL, NULL),
(17, '', 'DEODORANT ROLL ON WOMEN', 'diskripsi', '17001701718717', 3, 17, '24000', '27000', '5', '2022-05-21 03:02:27.920796', NULL, NULL),
(18, '', 'DIABEXTRAC', 'diskripsi', '18001801819818', 1, 18, '110000', '130000', '40', '2022-05-21 03:02:27.945678', NULL, NULL),
(19, '', 'ETTA GOAT MILK (EGM)', 'diskripsi', '19001901920919', 4, 19, '60000', '75000', '20', '2022-05-21 03:02:27.984486', NULL, NULL),
(20, '', 'ETTA GOAT MILK ECER (EGM)', 'diskripsi', '20002002022020', 4, 20, '12000', '12000', '0', '2022-05-21 03:02:28.008884', NULL, NULL),
(21, '', 'EXTRA VIRGIN OLIVE OIL 2020', 'diskripsi', '21002102123121', 2, 21, '30000', '35000', '8', '2022-05-21 03:02:28.031326', NULL, NULL),
(22, '', 'FACIAL WASH NON PERFUMED', 'diskripsi', '22002202224222', 3, 22, '25000', '30000', '7', '2022-05-21 03:02:28.054769', NULL, NULL),
(23, '', 'FACIAL WASH PERFUME', 'diskripsi', '23002302325323', 3, 23, '25000', '30000', '7', '2022-05-21 03:02:28.076900', NULL, NULL),
(24, '', 'GAMAT KAPSUL', 'diskripsi', '24002402426424', 1, 24, '100000', '130000', '40', '2022-05-21 03:02:28.108392', NULL, NULL),
(25, '', 'GINEXTRAC', 'diskripsi', '25002502527525', 1, 25, '75000', '90000', '20', '2022-05-21 03:02:28.132518', NULL, NULL),
(26, '', 'GREEN WASH DETERGENT (WIL. 1)', 'diskripsi', '26002602628626', 3, 26, '36000', '42000', '10', '2022-05-21 03:02:28.156988', NULL, NULL),
(27, '', 'HABBATUSAUDA KAPSUL HPAI', 'diskripsi', '27002702729727', 1, 27, '50000', '60000', '16', '2022-05-21 03:02:28.182532', NULL, NULL),
(28, '', 'HANIA MADU KENTAL', 'diskripsi', '28002802830828', 4, 28, '250000', '220000', '50', '2022-05-21 03:02:28.206970', NULL, NULL),
(29, '', 'HANIA REALCO CAPPUCINO', 'diskripsi', '29002902931929', 4, 29, '110000', '130000', '30', '2022-05-21 03:02:28.235605', NULL, NULL),
(30, '', 'HANIA REALCO CAPPUCINO ECER', 'diskripsi', '30003003033030', 4, 30, '1', '1', '0', '2022-05-21 03:02:28.257720', NULL, NULL),
(31, '', 'HANIA REALCO LATTE', 'diskripsi', '31003103134131', 4, 31, '110000', '130000', '30', '2022-05-21 03:02:28.279497', NULL, NULL),
(32, '', 'HANIA SUSU KAMBING FULL CREAM', 'diskripsi', '32003203235232', 4, 32, '175000', '195000', '40', '2022-05-21 03:02:28.301381', NULL, NULL),
(33, '', 'HANIA SUSU KAMBING SKIM', 'diskripsi', '33003303336333', 4, 33, '200000', '220000', '45', '2022-05-21 03:02:28.331770', NULL, NULL),
(34, '', 'HARUMI', 'diskripsi', '34003403437434', 1, 34, '55000', '70000', '20', '2022-05-21 03:02:28.362420', NULL, NULL),
(35, '', 'HAYYA SHAMPOO JASMINE 150', 'diskripsi', '35003503538535', 3, 35, '35000', '38000', '8', '2022-05-21 03:02:28.387538', NULL, NULL),
(36, '', 'HAYYA SHAMPOO PEAR & FRESIA 150', 'diskripsi', '36003603639636', 3, 36, '35000', '38000', '8', '2022-05-21 03:02:28.410257', NULL, NULL),
(37, '', 'HIBIS MIX R/H', 'diskripsi', '37003703740737', 3, 37, '185000', '230000', '45', '2022-05-21 03:02:28.432565', NULL, NULL),
(38, '', 'HIBIS DAY', 'diskripsi', '38003803841838', 3, 38, '18500', '18500', '0', '2022-05-21 03:02:28.455197', NULL, NULL),
(39, '', 'HIBIS NIGHT', 'diskripsi', '39003903942939', 3, 39, '18500', '18500', '0', '2022-05-21 03:02:28.483732', NULL, NULL),
(40, '', 'HIBIS PANTYLINER', 'diskripsi', '40004004044040', 3, 40, '180000', '225000', '45', '2022-05-21 03:02:28.514556', NULL, NULL),
(41, '', 'HIBIS PANTYLINER (ecer)', 'diskripsi', '41004104145141', 3, 41, '18000', '18000', '0', '2022-05-21 03:02:28.540164', NULL, NULL),
(42, '', 'HNI BODY WASH (WIL. 1&2)', 'diskripsi', '42004204246242', 3, 42, '35000', '40000', '10', '2022-05-21 03:02:28.564278', NULL, NULL),
(43, '', 'HNI DIAPERS (L)', 'diskripsi', '43004304347343', 3, 43, '33000', '36000', '6', '2022-05-21 03:02:28.586218', NULL, NULL),
(44, '', 'HNI DIAPERS (M)', 'diskripsi', '44004404448444', 3, 44, '30000', '33000', '5', '2022-05-21 03:02:28.608613', NULL, NULL),
(45, '', 'HNI DIAPERS (S)', 'diskripsi', '45004504549545', 3, 45, '24000', '26000', '4', '2022-05-21 03:02:28.630620', NULL, NULL),
(46, '', 'HNI HEALTH (EXTRA FOOD)', 'diskripsi', '46004604650646', 4, 46, '60000', '80000', '20', '2022-05-21 03:02:28.652730', NULL, NULL),
(47, '', 'HNI SHAMPOO (WIL. 1&2)', 'diskripsi', '47004704751747', 3, 47, '30000', '35000', '8', '2022-05-21 03:02:28.677400', NULL, NULL),
(48, '', 'HPAI COFFEE - HNI COFFEE(WIL 1 & 2)', 'diskripsi', '48004804852848', 4, 48, '105000', '125000', '30', '2022-05-21 03:02:28.704878', NULL, NULL),
(49, '', 'JANNATEA COLD', 'diskripsi', '49004904953949', 4, 49, '95000', '115000', '30', '2022-05-21 03:02:28.728936', NULL, NULL),
(50, '', 'JANNATEA HOT', 'diskripsi', '50005005055050', 4, 50, '95000', '115000', '30', '2022-05-21 03:02:28.751925', NULL, NULL),
(51, '', 'KALENDAR HNI-HPAI', 'diskripsi', '51005105156151', 5, 51, '15000', '15000', '5', '2022-05-21 03:02:28.774023', NULL, NULL),
(52, '', 'KELOSIN', 'diskripsi', '52005205257252', 1, 52, '75000', '90000', '20', '2022-05-21 03:02:28.823304', NULL, NULL),
(53, '', 'KOPI 7 ELEMEN - ISI 10 (sevel)', 'diskripsi', '53005305358353', 4, 53, '50000', '60000', '13', '2022-05-21 03:02:28.846684', NULL, NULL),
(54, '', 'KOPI 7 ELEMEN (sevel)', 'diskripsi', '54005405459454', 4, 54, '90000', '110000', '25', '2022-05-21 03:02:28.877392', NULL, NULL),
(55, '', 'KOPI 7 ELEMEN ECER (sevel)', 'diskripsi', '55005505560555', 4, 55, '1', '1', '0', '2022-05-21 03:02:28.901307', NULL, NULL),
(56, '', 'KOPI 7 ELEMEN PREMIUM (sevel)', 'diskripsi', '56005605661656', 4, 56, '60000', '60000', '15', '2022-05-21 03:02:28.932178', NULL, NULL),
(57, '', 'KOPI 7 ELEMEN PREMIUM ECER (sevel)', 'diskripsi', '57005705762757', 4, 57, '1', '1', '0', '2022-05-21 03:02:28.953746', NULL, NULL),
(58, '', 'LANGSINGIN', 'diskripsi', '58005805863858', 1, 58, '100000', '120000', '30', '2022-05-21 03:02:28.975982', NULL, NULL),
(59, '', 'LAURIK', 'diskripsi', '59005905964959', 1, 59, '55000', '65000', '20', '2022-05-21 03:02:28.997196', NULL, NULL),
(60, '', 'MADU ASLI PREMIUM (WITH LOCK)- MADU KENTAL WIL 1', 'diskripsi', '60006006066060', 4, 60, '100000', '1', '30', '2022-05-21 03:02:29.018180', NULL, NULL),
(61, '', 'MADU HABADATUSAUDA', 'diskripsi', '61006106167161', 4, 61, '100000', '130000', '30', '2022-05-21 03:02:29.058684', NULL, NULL),
(62, '', 'MADU MULTIFLORA (WITH LOCK)', 'diskripsi', '62006206268262', 4, 62, '80000', '100000', '25', '2022-05-21 03:02:29.082960', NULL, NULL),
(63, '', 'MADU PAHIT (WIL. 1 & 2)', 'diskripsi', '63006306369363', 4, 63, '100000', '120000', '30', '2022-05-21 03:02:29.107401', NULL, NULL),
(64, '', 'MADU SJAGA 285', 'diskripsi', '64006406470464', 4, 64, '100000', '120000', '30', '2022-05-21 03:02:29.129695', NULL, NULL),
(65, '', 'MAGAFIT', 'diskripsi', '65006506571565', 1, 65, '75000', '90000', '20', '2022-05-21 03:02:29.161880', NULL, NULL),
(66, '', 'MAHKOTA DARA-MUSTIKA DARA', 'diskripsi', '66006606672666', 1, 66, '170000', '200000', '55', '2022-05-21 03:02:29.187119', NULL, NULL),
(67, '', 'MAHKOTA DARA-MUSTIKA DARA ECER', 'diskripsi', '67006706773767', 1, 67, '57000', '57000', '0', '2022-05-21 03:02:29.209974', NULL, NULL),
(68, '', 'MENGKUDU KAPSUL', 'diskripsi', '68006806874868', 1, 68, '60000', '80000', '20', '2022-05-21 03:02:29.241263', NULL, NULL),
(69, '', 'MINYAK HERBA SINERGI (MHS)', 'diskripsi', '69006906975969', 1, 69, '30000', '45000', '10', '2022-05-21 03:02:29.274683', NULL, NULL),
(70, '', 'MINYAK KAYU PUTIH HNI', 'diskripsi', '70007007077070', 3, 70, '40000', '43000', '9', '2022-05-21 03:02:29.298161', NULL, NULL),
(71, '', 'MINYAK TELON PLUS', 'diskripsi', '71007107178171', 3, 71, '45000', '48000', '11', '2022-05-21 03:02:29.319889', NULL, NULL),
(72, '', 'MINYAK ZAITUN-OLIVE OIL', 'diskripsi', '72007207279272', 4, 72, '30000', '35000', '8', '2022-05-21 03:02:29.341501', NULL, NULL),
(73, '', 'MUKENA HNI', 'diskripsi', '73007307380373', 4, 73, '185000', '1', '30', '2022-05-21 03:02:29.362925', NULL, NULL),
(74, '', 'MUSHAF TULIS JUZ 1-5 (WIL 1&2)', 'diskripsi', '74007407481474', 4, 74, '65000', '75000', '5', '2022-05-21 03:02:29.394974', NULL, NULL),
(75, '', 'MUSHAF TULIS JUZ 26-30 (WIL 1&2)', 'diskripsi', '75007507582575', 4, 75, '65000', '75000', '5', '2022-05-21 03:02:29.425557', NULL, NULL),
(76, '', 'MY SHIELD DUCKBILL', 'diskripsi', '76007607683676', 3, 76, '22000', '25000', '5', '2022-05-21 03:02:29.450568', NULL, NULL),
(77, '', 'MY SHIELD DUCKBILL KEMERDEKAAN', 'diskripsi', '77007707784777', 3, 77, '22000', '25000', '5', '2022-05-21 03:02:29.474974', NULL, NULL),
(78, '', 'MY SHIELD DUCKBILL PUTIH', 'diskripsi', '78007807885878', 3, 78, '22000', '25000', '5', '2022-05-21 03:02:29.507315', NULL, NULL),
(79, '', 'MY SHIELDS', 'diskripsi', '79007907986979', 3, 79, '95000', '110000', '20', '2022-05-21 03:02:29.531607', NULL, NULL),
(80, '', 'MY SHIELDS ECER', 'diskripsi', '80008008088080', 3, 80, '1', '1', '0', '2022-05-21 03:02:29.553939', NULL, NULL),
(81, '', 'NAJIYA HAND SOAP', 'diskripsi', '81008108189181', 9, 81, '13000', '13000', '0', '2022-05-21 03:02:29.575496', NULL, NULL),
(82, '', 'NAJIYA PELICIN PAKAIAN', 'diskripsi', '82008208290282', 9, 82, '13000', '13000', '0', '2022-05-21 03:02:29.615724', NULL, NULL),
(83, '', 'NAJIYA PEMBERSIH KAMAR MANDI', 'diskripsi', '83008308391383', 9, 83, '13000', '13000', '0', '2022-05-21 03:02:29.639131', NULL, NULL),
(84, '', 'NAJIYA PEMBERSIH KERAMIK', 'diskripsi', '84008408492484', 9, 84, '13000', '13000', '0', '2022-05-21 03:02:29.665261', NULL, NULL),
(85, '', 'NAJIYA SAMPO MOTOR & MOBIL', 'diskripsi', '85008508593585', 9, 85, '13000', '13000', '0', '2022-05-21 03:02:29.689375', NULL, NULL),
(86, '', 'N-GREEN', 'diskripsi', '86008608694686', 1, 86, '110000', '130000', '40', '2022-05-21 03:02:29.712032', NULL, NULL),
(87, '', 'PANDUAN SUKSES', 'diskripsi', '87008708795787', 5, 87, '1', '1', '1', '2022-05-21 03:02:29.741740', NULL, NULL),
(88, '', 'PAKET PENDAFTARAN (KIT-ID)', 'diskripsi', '88008808896888', 5, 88, '30000', '1', '0', '2022-05-21 03:02:29.763198', NULL, NULL),
(89, '', 'PAKET SUPPORT SYSTEM', 'diskripsi', '89008908997989', 5, 89, '100000', '130000', '15', '2022-05-21 03:02:29.793135', NULL, NULL),
(90, '', 'PASTA GIGI HERBAL ANAK ANGGUR', 'diskripsi', '90009009099090', 3, 90, '10000', '13000', '2', '2022-05-21 03:02:29.817479', NULL, NULL),
(91, '', 'PASTA GIGI HERBAL ANAK STRAWBERRY', 'diskripsi', '91009109200191', 3, 91, '10000', '13000', '2', '2022-05-21 03:02:29.869705', NULL, NULL),
(92, '', 'PASTA GIGI HERBAL ANAK TUTTI FRUTY', 'diskripsi', '92009209301292', 3, 92, '10000', '13000', '2', '2022-05-21 03:02:29.892322', NULL, NULL),
(93, '', 'PASTA GIGI HERBAL CENGKEH', 'diskripsi', '93009309402393', 3, 93, '17000', '20000', '3.5', '2022-05-21 03:02:29.914244', NULL, NULL),
(94, '', 'PASTA GIGI HERBAL SENSITIVE', 'diskripsi', '94009409503494', 3, 94, '20000', '23000', '5', '2022-05-21 03:02:29.935580', NULL, NULL),
(95, '', 'PASTA GIGI HERBAL SIWAK-SIRIH-MINT', 'diskripsi', '95009509604595', 3, 95, '17000', '20000', '3.5', '2022-05-21 03:02:29.962336', NULL, NULL),
(96, '', 'PASTA GIGI HERBAL TRANS PROPOLIS', 'diskripsi', '96009609705696', 3, 96, '17000', '20000', '3.5', '2022-05-21 03:02:29.995519', NULL, NULL),
(97, '', 'PEGAGAN HS', 'diskripsi', '97009709806797', 1, 97, '75000', '90000', '20', '2022-05-21 03:02:30.021392', NULL, NULL),
(98, '', 'PROCUMIN HABBATUSSAUDA', 'diskripsi', '98009809907898', 1, 98, '130000', '160000', '50', '2022-05-21 03:02:30.050715', NULL, NULL),
(99, '', 'PROCUMIN PROPOLIS', 'diskripsi', '99009910008999', 1, 99, '140000', '175000', '50', '2022-05-21 03:02:30.072840', NULL, NULL),
(100, '', 'PROMAX-5 MOBIL', 'diskripsi', '100010010110100', 3, 100, '75000', '75000', '20', '2022-05-21 03:02:30.103911', NULL, NULL),
(101, '', 'PROMAX-5 MOTOR', 'diskripsi', '101010110211201', 3, 101, '45000', '45000', '11', '2022-05-21 03:02:30.126167', NULL, NULL),
(102, '', 'PROMOL12 ECO 150GR', 'diskripsi', '102010210312302', 3, 102, '50000', '0', '15', '2022-05-21 03:02:30.149052', NULL, NULL),
(103, '', 'PROMOL12 PACK 1KG (WIL. 1&2)', 'diskripsi', '103010310413403', 3, 103, '210000', '210000', '50', '2022-05-21 03:02:30.173578', NULL, NULL),
(104, '', 'PROMOL12 PACK 3KG (WIL. 1&2)', 'diskripsi', '104010410514504', 3, 104, '590000', '590000', '150', '2022-05-21 03:02:30.198384', NULL, NULL),
(105, '', 'QURAN ASY-SYIFAA (WIL. 1)', 'diskripsi', '105010510615605', 4, 105, '75000', '90000', '10', '2022-05-21 03:02:30.229748', NULL, NULL),
(106, '', 'REDANGIN', 'diskripsi', '106010610716706', 1, 106, '40000', '43000', '10', '2022-05-21 03:02:30.255556', NULL, NULL),
(107, '', 'REDANGIN ECER', 'diskripsi', '107010710817807', 1, 107, '1', '1', '1', '2022-05-21 03:02:30.277945', NULL, NULL),
(108, '', 'REGISTRASI AGEN ONLINE', 'diskripsi', '108010810918908', 5, 108, '10000', '0', '0', '2022-05-21 03:02:30.301654', NULL, NULL),
(109, '', 'ROSELLA HS', 'diskripsi', '109010911020009', 1, 109, '75000', '90000', '20', '2022-05-21 03:02:30.323203', NULL, NULL),
(110, '', 'SABUN TRANSPARAN KOLAGEN (WIL 1&2)', 'diskripsi', '110011011121110', 3, 110, '20000', '25000', '6', '2022-05-21 03:02:30.351907', NULL, NULL),
(111, '', 'SABUN TRANSPARAN MADU-HONY BODY SOAP (WIL 1 & 2)', 'diskripsi', '111011111222211', 3, 111, '17000', '20000', '5', '2022-05-21 03:02:30.376669', NULL, NULL),
(112, '', 'SABUN TRANSPARAN PROPOLIS WIL 1&2', 'diskripsi', '112011211323312', 3, 112, '17000', '20000', '5', '2022-05-21 03:02:30.401718', NULL, NULL),
(113, '', 'SARI KURMA 2020', 'diskripsi', '113011311424413', 4, 113, '45000', '50000', '11', '2022-05-21 03:02:30.426203', NULL, NULL),
(114, '', 'SARUNG FIESTA SUPER', 'diskripsi', '114011411525514', 4, 114, '105000', '125000', '20', '2022-05-21 03:02:30.460639', NULL, NULL),
(115, '', 'SIENA', 'diskripsi', '115011511626615', 1, 115, '60000', '75000', '20', '2022-05-21 03:02:30.482843', NULL, NULL),
(116, '', 'SPIRULINA', 'diskripsi', '116011611727716', 1, 116, '70000', '90000', '25', '2022-05-21 03:02:30.507326', NULL, NULL),
(117, '', 'STERILYN ANTISEPTIK 100ML', 'diskripsi', '117011711828817', 3, 117, '60000', '80000', '15', '2022-05-21 03:02:30.530561', NULL, NULL),
(118, '', 'STERILYN DESINFEKTAN 500ML', 'diskripsi', '118011811929918', 3, 118, '90000', '120000', '25', '2022-05-21 03:02:30.552963', NULL, NULL),
(119, '', 'STERILYN SANITIZER 100ML', 'diskripsi', '119011912031019', 3, 119, '60000', '80000', '15', '2022-05-21 03:02:30.586509', NULL, NULL),
(120, '', 'STERILYN SANITIZER 500ML', 'diskripsi', '120012012132120', 3, 120, '90000', '120000', '25', '2022-05-21 03:02:30.614870', NULL, NULL),
(121, '', 'STIMFIBRE', 'diskripsi', '121012112233221', 4, 121, '250000', '350000', '100', '2022-05-21 03:02:30.639202', NULL, NULL),
(122, '', 'TRUSON', 'diskripsi', '122012212334322', 1, 122, '90000', '110000', '30', '2022-05-21 03:02:30.662584', NULL, NULL),
(123, '', 'ZAITUN SOFTGEL', 'diskripsi', '123012312435423', 1, 123, '80000', '90000', '20', '2022-05-21 03:02:30.696578', NULL, NULL),
(124, '', 'ZIDAVIT', 'diskripsi', '124012412536524', 4, 124, '60000', '880000', '20', '2022-05-21 03:02:30.719716', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_session`
--

CREATE TABLE `shopping_session` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `total` decimal(50,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'penjual'),
(3, 'stokis'),
(4, 'pembeli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
