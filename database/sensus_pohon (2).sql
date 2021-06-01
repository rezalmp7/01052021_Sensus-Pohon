-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 06:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sensus_pohon`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(4) NOT NULL,
  `src` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `src`, `create_at`) VALUES
(2, '2.jpg', '2021-04-17 17:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(4) NOT NULL,
  `kode_pohon` varchar(12) NOT NULL,
  `jml_buah` int(7) NOT NULL,
  `buah_rusak` int(7) NOT NULL,
  `buah_sp_pn` int(7) NOT NULL,
  `sisa` int(7) NOT NULL,
  `status` enum('benar','salah') NOT NULL,
  `foto` varchar(100) NOT NULL,
  `laporan_by` int(4) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `kode_pohon`, `jml_buah`, `buah_rusak`, `buah_sp_pn`, `sisa`, `status`, `foto`, `laporan_by`, `create_at`) VALUES
(6, '001-001-001', 200, 150, 40, 10, 'benar', '1.jpg', 1, '2021-04-20 08:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(5) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `jenkel` enum('laki-laki','perempuan') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tempat_lhr` varchar(50) NOT NULL,
  `tanggal_lhr` date NOT NULL,
  `photo` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `full_name`, `jenkel`, `no_hp`, `username`, `password`, `tempat_lhr`, `tanggal_lhr`, `photo`, `create_at`) VALUES
(1, 'Rezal Wahyu Pratama', 'laki-laki', '087721191226', 'rezal', 'a813872277cfdffb2b3b8619a3fdfe60', 'Jakarta', '1999-04-06', '1.jpg', '2021-04-20 16:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(4) NOT NULL,
  `pengumuman` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `pengumuman`, `tgl_mulai`, `tgl_akhir`, `create_at`) VALUES
(1, 'asdsaaasdasfa asdasd', '2021-04-29', '2021-05-06', '2021-04-17 17:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `pohon`
--

CREATE TABLE `pohon` (
  `id` int(4) NOT NULL,
  `kode` varchar(12) NOT NULL,
  `blok` varchar(3) NOT NULL,
  `baris` varchar(3) NOT NULL,
  `no_pohon` varchar(3) NOT NULL,
  `qrcode` varchar(50) NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pohon`
--

INSERT INTO `pohon` (`id`, `kode`, `blok`, `baris`, `no_pohon`, `qrcode`, `create_at`) VALUES
(1, '001-001-001', '001', '001', '001', '1.png', '2021-04-20 08:17:53'),
(2, '001-001-003', '001', '001', '003', '2.png', '2021-04-20 14:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `full_name`, `photo`, `create_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '1.jpg', '2021-04-20 16:29:29'),
(6, 'kecank', 'e5e07532fea4754b873ba87f88e86aab', 'Kecank', '6.jpg', '2021-04-20 16:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(4) NOT NULL,
  `profil` text DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `profil`, `update_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tincidunt, sem vitae iaculis suscipit, nibh elit consectetur felis, ut eleifend sem dolor ultricies lectus. Aliquam mi risus, aliquet id dictum interdum, tincidunt vel turpis. Curabitur ultricies nisi enim. Donec imperdiet luctus erat, vel semper augue ullamcorper sed. Pellentesque vulputate, lacus id vehicula vehicula, neque sapien pharetra libero, non elementum diam leo sit amet lorem. Phasellus scelerisque dapibus interdum. Nullam arcu magna, ultricies non lacus a, maximus feugiat augue. In eget diam et ligula porttitor scelerisque at non ante. Aliquam iaculis, leo ut rutrum fringilla, enim arcu dignissim ipsum, a sodales lacus odio non nisl. Aliquam erat volutpat. Quisque consequat sagittis tellus, eu mollis metus cursus a. Nullam dui massa, finibus sagittis euismod vel, pellentesque molestie turpis. Aenean vestibulum odio et nunc maximus, in porta felis rutrum. Nunc vel efficitur nibh. Maecenas ultricies ex sed viverra iaculis.\r\n\r\nSuspendisse mattis finibus dui. Donec feugiat nulla eu ligula aliquet, sit amet lacinia mauris aliquam. Vivamus sagittis leo vel ex mollis, sit amet posuere orci euismod. Vestibulum iaculis semper urna, non rhoncus dolor maximus sed. Sed vitae convallis enim, ut pharetra justo. Proin quis sapien maximus, fringilla nulla in, gravida arcu. Pellentesque eget cursus tellus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas sit amet sem nisl. Vestibulum tristique turpis eget posuere ultricies. Nullam facilisis massa eu consectetur porta.', '2021-04-17 17:24:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pohon`
--
ALTER TABLE `pohon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pohon`
--
ALTER TABLE `pohon`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
