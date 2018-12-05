-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 03:40 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bai3dulieu`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tuoi` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `anhavatar` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `linkfb` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sodonhang` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `ten`, `tuoi`, `sdt`, `anhavatar`, `linkfb`, `sodonhang`) VALUES
(2, 'HẰNG BINH BOONG', '61', '01020201', 'http://localhost/bai3dulieu/Fileupload/bamm.jpg', 'http://hang97', '10'),
(3, 'Nguyễn Quốc Hùng', '22', '0201040503', 'http://localhost/bai3dulieu/Fileupload/hung.jpg', 'https://www.facebook.com/HotBoyQuocHung', '25'),
(4, 'BTS', '12', '0102030405', 'http://localhost/bai3dulieu/Fileupload/fake_love.jpg', 'http://bts', '7'),
(5, 'hoàng tôn', '21', '01245', 'http://localhost/bai3dulieu/Fileupload/only_u.jpg', 'http://hoangton', '25'),
(6, 'ánh', '21', '0120', 'http://localhost/bai3dulieu/Fileupload/lamngyeuemnhe.jpg', 'http://anhngoc', '32'),
(7, 'baby boy', '', '', 'https://cdn.24h.com.vn/upload/4-2018/images/2018-11-16/1542348538-815-154233748137143-thumbnail.jpg', '', ''),
(8, 'long', '', '', 'https://cdn.24h.com.vn/upload/4-2018/images/2018-11-16/1542348538-815-154233748137143-thumbnail.jpg', '', ''),
(16, 'minhkha', '155', '001', 'http://localhost/bai3dulieu/Fileupload/spiderman.jpg', 'http://minhkha', '1555'),
(20, 'Thần sấm thor', '10000000', '0220', 'http://localhost/bai3dulieu/Fileupload/justice_league.jpg', 'http://thansam', '10000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
