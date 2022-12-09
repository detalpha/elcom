-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2019 at 10:36 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elcom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `amandemen_banks`
--

CREATE TABLE `amandemen_banks` (
  `id` bigint(20) NOT NULL,
  `no_amandemen` varchar(255) NOT NULL,
  `no_kontrak` bigint(20) NOT NULL,
  `tgl_amandemen` date NOT NULL,
  `revisi_waktu` date NOT NULL,
  `revisi_nilai` decimal(10,2) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdat` datetime NOT NULL,
  `updatedat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amandemen_banks`
--

INSERT INTO `amandemen_banks` (`id`, `no_amandemen`, `no_kontrak`, `tgl_amandemen`, `revisi_waktu`, `revisi_nilai`, `createdby`, `updatedby`, `createdat`, `updatedat`) VALUES
(4, 'adjhaghjdagjhd', 5, '2019-06-05', '2019-06-10', '1000000.00', 1, 0, '2019-06-05 00:00:00', '0000-00-00 00:00:00'),
(5, 'adjhaghjdagjhd', 5, '2019-06-05', '2019-06-10', '1000000.00', 1, 0, '2019-06-05 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `amandemen_kontraks`
--

CREATE TABLE `amandemen_kontraks` (
  `id` bigint(20) NOT NULL,
  `no_amandemen` varchar(15) NOT NULL,
  `no_kontrak` bigint(20) NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `gb_amandemen` text NOT NULL,
  `revisi_durasi` int(11) NOT NULL,
  `satuan_durasi` tinyint(4) NOT NULL,
  `revisi_nilai` decimal(10,2) NOT NULL,
  `revisi_klausa` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `createdby` bigint(20) NOT NULL,
  `updatedby` bigint(20) NOT NULL,
  `createdat` datetime NOT NULL,
  `updatedat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kontraks`
--

CREATE TABLE `kontraks` (
  `id` bigint(20) NOT NULL,
  `no_kontrak` varchar(255) NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `duration` int(11) NOT NULL,
  `duration_unit` tinyint(4) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `nilai_kontrak` decimal(10,2) NOT NULL,
  `mata_uang` varchar(3) NOT NULL,
  `tgl_akhir` date NOT NULL,
  `masa_garansi` int(11) NOT NULL,
  `masa_garansi_unit` tinyint(4) NOT NULL,
  `no_bg` varchar(15) NOT NULL,
  `nilai_bg` decimal(10,2) NOT NULL,
  `mata_uang_bg` varchar(3) NOT NULL,
  `durasi_bg` int(11) NOT NULL,
  `durasi_bg_unit` varchar(5) NOT NULL,
  `tgl_exp_bg` date NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `bapp_file` varchar(255) NOT NULL,
  `bast_file_1` varchar(255) NOT NULL,
  `bast_file_2` varchar(255) NOT NULL,
  `createdby` bigint(20) DEFAULT NULL,
  `updatedby` bigint(20) DEFAULT NULL,
  `createdat` datetime DEFAULT NULL,
  `updatedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontraks`
--

INSERT INTO `kontraks` (`id`, `no_kontrak`, `tgl_kontrak`, `duration`, `duration_unit`, `tgl_mulai`, `nilai_kontrak`, `mata_uang`, `tgl_akhir`, `masa_garansi`, `masa_garansi_unit`, `no_bg`, `nilai_bg`, `mata_uang_bg`, `durasi_bg`, `durasi_bg_unit`, `tgl_exp_bg`, `email_user`, `bapp_file`, `bast_file_1`, `bast_file_2`, `createdby`, `updatedby`, `createdat`, `updatedat`) VALUES
(5, '0123/HKM.01.01/WSU/2019', '2019-06-04', 10, 1, '2019-06-05', '10000000.00', 'IDR', '2019-06-15', 30, 1, '19374682', '5000000.00', '', 0, '', '2020-06-03', 'fadlul.fathoni@gmail.com', '82fa265d40ba692ba2a85ab1e0f82e4a.pdf', '25250998919da7a17427eddbbe2d248a.pdf', '3fc68bf3bf5ffd578d90dfad356b291e.pdf', 1, NULL, '2019-06-03 21:48:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `CreatedBy` bigint(20) DEFAULT NULL,
  `UpdatedBy` bigint(20) DEFAULT NULL,
  `CreatedAt` varchar(255) DEFAULT NULL,
  `UpdatedAt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `CreatedBy` bigint(20) DEFAULT NULL,
  `UpdatedBy` bigint(20) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `UpdatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles_menus`
--

CREATE TABLE `roles_menus` (
  `id` bigint(20) NOT NULL,
  `id_role` bigint(20) NOT NULL,
  `id_menu` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `satuan_durasi`
--

CREATE TABLE `satuan_durasi` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan_durasi`
--

INSERT INTO `satuan_durasi` (`id`, `name`) VALUES
(1, 'Hari'),
(2, 'Bulan'),
(3, 'Tahun');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `CreatedBy` bigint(20) DEFAULT NULL,
  `UpdatedBy` bigint(20) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `UpdatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `CreatedBy`, `UpdatedBy`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'superadmin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@localhost.com', 1, NULL, '2019-05-29 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_role` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amandemen_banks`
--
ALTER TABLE `amandemen_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amandemen_kontraks`
--
ALTER TABLE `amandemen_kontraks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontraks`
--
ALTER TABLE `kontraks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `roles_menus`
--
ALTER TABLE `roles_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan_durasi`
--
ALTER TABLE `satuan_durasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amandemen_banks`
--
ALTER TABLE `amandemen_banks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `amandemen_kontraks`
--
ALTER TABLE `amandemen_kontraks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kontraks`
--
ALTER TABLE `kontraks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles_menus`
--
ALTER TABLE `roles_menus`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan_durasi`
--
ALTER TABLE `satuan_durasi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
