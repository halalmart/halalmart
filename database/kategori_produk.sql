-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2022 at 01:28 PM
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
-- Table structure for table `kategori produk`
--

CREATE TABLE `kategori produk` (
  `id` int(2) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `date_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori produk`
--

INSERT INTO `kategori produk` (`id`, `icon`, `nama_kategori`, `date_input`) VALUES
(1, '', 'herbs products', '2022-04-12 05:34:23'),
(2, '', 'health food & beverages', '2022-04-12 05:35:12'),
(3, '', 'cosmetics & home care', '2022-04-12 05:36:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori produk`
--
ALTER TABLE `kategori produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori produk`
--
ALTER TABLE `kategori produk`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
