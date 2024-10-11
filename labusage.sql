-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 06:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labusage`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `name`) VALUES
(1, 'Afif Nuruddin Maisaroh, S.Pd'),
(2, 'Agung Wiratmo, S.Pd'),
(3, 'Atik Retnoningsih, S.Kom'),
(4, 'Arief Kurniawan, S.T'),
(5, 'Budi Sulistiyo, S.Kom, M.Kom'),
(6, 'Carolin Windiasri, S.Pd'),
(7, 'Dwi Nuryani, S.Kom'),
(8, 'Liana Masitoh, S.Kom'),
(9, 'Teguh Priyanto, S.Pd.T'),
(10, 'Tina Fajrin, S.Pd, S.Kom'),
(11, 'Tri Ani Sulistyo Wardani, S.Kom');

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `lab_id` int(11) NOT NULL,
  `lab_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`lab_id`, `lab_name`) VALUES
(1, 'Lab. Komputer 1'),
(2, 'Lab. Komputer 2'),
(3, 'Lab. Komputer 3'),
(4, 'Lab. Komputer 4'),
(5, 'Lab. Komputer 5'),
(6, 'Lab. Komputer 6'),
(7, 'Lab. Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `pelajaran_id` int(11) NOT NULL,
  `nama_pelajaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`pelajaran_id`, `nama_pelajaran`) VALUES
(1, 'Pemrograman Web'),
(2, 'Pemrograman Mobile'),
(3, 'Dasar-Dasar PPLG'),
(4, 'Pemrog. Basis Teks Grafis dan MM'),
(5, 'Proyek Kreatif dan Kewirausahaan'),
(6, 'Basis Data'),
(7, 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan_lab`
--

CREATE TABLE `penggunaan_lab` (
  `penggunaan_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `pelajaran_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `activity` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`pelajaran_id`);

--
-- Indexes for table `penggunaan_lab`
--
ALTER TABLE `penggunaan_lab`
  ADD PRIMARY KEY (`penggunaan_id`),
  ADD KEY `lab_id` (`lab_id`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `pelajaran_id` (`pelajaran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `pelajaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penggunaan_lab`
--
ALTER TABLE `penggunaan_lab`
  MODIFY `penggunaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penggunaan_lab`
--
ALTER TABLE `penggunaan_lab`
  ADD CONSTRAINT `penggunaan_lab_ibfk_1` FOREIGN KEY (`lab_id`) REFERENCES `labs` (`lab_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penggunaan_lab_ibfk_2` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`guru_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penggunaan_lab_ibfk_3` FOREIGN KEY (`pelajaran_id`) REFERENCES `mata_pelajaran` (`pelajaran_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
