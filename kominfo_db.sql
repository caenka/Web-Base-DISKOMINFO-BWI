-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2021 at 02:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kominfo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `status` enum('Revisi','Acc','Menunggu pengecekan','') NOT NULL,
  `created_at_pengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `judul`, `file`, `status`, `created_at_pengajuan`) VALUES
(1, 5, 'Undangan', 'eaaebbf5d40134ad2f2012cf71aba556.pdf', 'Acc', '2021-03-04'),
(2, 5, 'ooo', '2d9f8d75d9a77479a7b4ee16e7dee98e.pdf', 'Acc', '2021-03-04'),
(3, 5, 'jjjjj', 'c145135b7a16810fa3bef6a740132ac8.pdf', 'Acc', '2021-03-04'),
(4, 6, 'Undangan 1', 'd238d3a1bddd7414d80ca15f0507e94a.pdf', 'Acc', '2021-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_acc`
--

CREATE TABLE `tb_acc` (
  `id_acc` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `filebaru` varchar(128) NOT NULL,
  `created_at_acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_acc`
--

INSERT INTO `tb_acc` (`id_acc`, `id_pengajuan`, `filebaru`, `created_at_acc`) VALUES
(1, 1, '86786401097b14bd8d9a7bb75df01243.pdf', '2021-03-04'),
(2, 2, '6d5af3f948d79baad4de863542748ed8.pdf', '2021-03-04'),
(3, 3, 'eb68a0460337af7cab698900002858e5.pdf', '2021-03-04'),
(4, 4, '8ae516e937bdf370b52d5c30307dc21f.pdf', '2021-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_revisi`
--

CREATE TABLE `tb_revisi` (
  `id_revisi` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `created_at_revisi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `bidang` enum('Admin FO','Bidang IKP','Bidang Informatika','Bidang Statistik dan Persandian','Sekretariat') NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `name`, `username`, `password`, `role_id`, `is_active`, `bidang`, `date_created`) VALUES
(1, 'ELVIS MARTINO', 'elvis', '$2y$10$Euw.ZfP8CbPQwWOpzdpxmOh.NZ7nPg.9iqvRN91OiIW/2vWI63ZTy', 1, 1, 'Admin FO', 1614748388),
(5, 'INFORMATIKA', 'INFORMATIKA', '$2y$10$YWSNspcSpAtIlgetAjPI5OphMfzCJ2PSgmK8hCd0cuX4jwSdQ0XkK', 2, 1, 'Bidang Informatika', 1614848068),
(6, 'PERSANDIAN', 'PERSANDIAN', '$2y$10$Ns0YckcAKfuuUiT/pzaQ7efa2YHmw4vFPgZUgq/zUXAHWyGLcrOaq', 2, 1, 'Bidang Statistik dan Persandian', 1614849349);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Bidang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tb_acc`
--
ALTER TABLE `tb_acc`
  ADD PRIMARY KEY (`id_acc`);

--
-- Indexes for table `tb_revisi`
--
ALTER TABLE `tb_revisi`
  ADD PRIMARY KEY (`id_revisi`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_acc`
--
ALTER TABLE `tb_acc`
  MODIFY `id_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_revisi`
--
ALTER TABLE `tb_revisi`
  MODIFY `id_revisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
