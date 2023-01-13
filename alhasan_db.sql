-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 10:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alhasan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `foto`, `deskripsi`) VALUES
(1, '63b24a3c3bdea.jpg', 'foto pertama'),
(3, '63b2a32f8461d.jpg', ''),
(4, '63b2a3382f892.jpg', ''),
(5, '63b2a34242fb2.jpeg', ''),
(6, '63b2a34a39c02.png', ''),
(7, '63b2a3530026f.png', ''),
(8, '63b3851f2178d.jpg', ''),
(9, '63b3852f25672.jpg', ''),
(10, '63b3866150e12.png', ''),
(11, '63b65881b77c4.jpg', ''),
(12, '63b658893f081.jpg', ''),
(13, '63b659098a987.jpg', ''),
(14, '63b6590f8d617.jpeg', ''),
(15, '63b66b5bc6590.jpg', ''),
(16, '63bbbdba90200.jpg', ''),
(17, '63bd0f12b922a.jpg', ''),
(18, '63bd2b96b6cf3.jpg', ''),
(19, '63c0c068d094e.jpg', 'apa kabar werty');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_menu`
--

CREATE TABLE `jenis_menu` (
  `id` int(11) NOT NULL,
  `jenis` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_menu`
--

INSERT INTO `jenis_menu` (`id`, `jenis`) VALUES
(1, 'Mubaligh'),
(2, 'Olahraga'),
(3, 'Hadroh'),
(5, 'Pengajian bulanan'),
(7, 'Pengajian Mingguan'),
(10, 'Latihan Marawis');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `deskripsi` text NOT NULL,
  `lokasi` varchar(32) NOT NULL,
  `foto` varchar(32) NOT NULL,
  `tanggal` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama`, `deskripsi`, `lokasi`, `foto`, `tanggal`) VALUES
(1, 'Tabligh Akbar', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Bandung', '63c0bdc50c1e7.jpg', '22-01-1998'),
(2, 'hamdi', 'qew', 'qwe', '63c0bdacafe99.jpg', '2023/01/18'),
(3, 'pebajian bulanan', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard M', 'cipatujah', '63c0bdb708fd3.jpg', '2023/01/23'),
(5, ' DUNIA KITA SATU dua tiga', 'eeeeeeeeeeeee', 'qweeee', '63c0bc3b64c3b.jpeg', '2023/02/01');

-- --------------------------------------------------------

--
-- Table structure for table `link_social_media`
--

CREATE TABLE `link_social_media` (
  `id` int(11) NOT NULL,
  `id_social_media` int(11) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `link_social_media`
--

INSERT INTO `link_social_media` (`id`, `id_social_media`, `link`) VALUES
(1, 1, 'https://twitter.com/i/flow/login'),
(2, 2, 'https://m.facebook.com/login/?locale=id_ID&refsrc='),
(3, 3, 'https://www.instagram.com/accounts/login/'),
(4, 4, 'https://www.instagram.com/accounts/login/'),
(5, 1, 'https://www.tokopedia.com/'),
(7, 3, 'https://youtu.be/1jO2wSpAoxA');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_resto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `status`, `nama`, `id_resto`) VALUES
(1, 'admin', '$2y$10$2DPjYBQw5NSDzfLvTyscPuONCYVeLOdFkyreKzbMrmiy0VBEoKgfW', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operasional`
--

CREATE TABLE `operasional` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operasional`
--

INSERT INTO `operasional` (`id`, `id_resto`, `hari`, `jam_buka`, `jam_tutup`) VALUES
(1, 1, 'Senin', '09:00:00', '21:00:00'),
(2, 1, 'Selasa', '07:00:00', '21:00:00'),
(3, 1, 'Rabu', '07:00:00', '21:00:00'),
(4, 1, 'Kamis', '08:00:00', '21:00:00'),
(5, 1, 'Jumat', '08:50:00', '20:00:00'),
(6, 1, 'Sabtu', '08:00:00', '20:00:00'),
(7, 1, 'Minggu', '08:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `foto` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='pendaftaran';

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `foto`, `nama`, `jenis_kelamin`, `alamat`, `tgl_masuk`, `id_sekolah`) VALUES
(1, '63c0fed7737e0.jpeg', 'hamdi', '', 'bandung', '2023-01-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resto`
--

CREATE TABLE `resto` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `hp` bigint(32) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_bg` varchar(32) NOT NULL,
  `foto_profil` varchar(32) NOT NULL,
  `link_video` varchar(50) NOT NULL,
  `google_map` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resto`
--

INSERT INTO `resto` (`id`, `nama`, `alamat`, `hp`, `deskripsi`, `foto_bg`, `foto_profil`, `link_video`, `google_map`) VALUES
(1, ' ', 'Jalan Seturan Raya No.168 ADaerah Istimewa Yogyakarta 55281Indonesia                                                                                      ', 81336121328, 'irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.\r\nUllamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in \r\nculpa qui officia deserunt mollit anim id est laborum\r\nirure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.\r\nUllamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in \r\nculpa qui officia deserunt mollit anim id est laborum', 'profil.jpg', 'bgtest.jpeg', 'https://youtu.be/hwNWx1GTSKo                      ', 'https://www.google.com/maps/dir//resto+dunia+kita/');

-- --------------------------------------------------------

--
-- Table structure for table `sejarah`
--

CREATE TABLE `sejarah` (
  `id` int(11) NOT NULL,
  `sejarah` text NOT NULL,
  `foto1` varchar(32) NOT NULL,
  `deskripsi1` varchar(32) NOT NULL,
  `foto2` varchar(32) NOT NULL,
  `deskripsi2` varchar(32) NOT NULL,
  `foto3` varchar(32) NOT NULL,
  `deskripsi3` varchar(32) NOT NULL,
  `foto4` varchar(32) NOT NULL,
  `deskripsi4` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sejarah`
--

INSERT INTO `sejarah` (`id`, `sejarah`, `foto1`, `deskripsi1`, `foto2`, `deskripsi2`, `foto3`, `deskripsi3`, `foto4`, `deskripsi4`) VALUES
(1, 'Apa itu Lorem Ipsum?\r\nLorem Ipsum hanyalah teks tiruan dari industri percetakan dan penyusunan huruf. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500-an, ketika seorang tukang cetak yang tidak dikenal mengambil kumpulan teks dan mengacaknya untuk membuat buku contoh huruf. Itu bertahan tidak hanya selam', '1.jpg', 'dskripsi dulu1', 'background.jpg', 'dskripsi dulu 2', 'bgtest.jpeg', 'dskripsi dulu 3', 'profil.jpg', '2321');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL,
  `tingkat` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `tingkat`) VALUES
(1, 'MI/SD'),
(2, 'MTS/SMP'),
(3, 'MAN/SMA/SMK/STM');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `nama`) VALUES
(1, 'twitter'),
(2, 'facebook'),
(3, 'instagram'),
(4, 'youtube');

-- --------------------------------------------------------

--
-- Table structure for table `tag_menu`
--

CREATE TABLE `tag_menu` (
  `id` int(11) NOT NULL,
  `tag` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag_menu`
--

INSERT INTO `tag_menu` (`id`, `tag`) VALUES
(1, 'Pedas'),
(2, 'Recomended'),
(3, 'Best');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `testimoni` text NOT NULL,
  `foto` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `testimoni`, `foto`) VALUES
(4, 'lee cong wey', '  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim', '63c0d6167c0f3.jpg'),
(13, 'DUNIA MANJI', '63c0c6ffb5f4f.jpg', '63c0d75566ab3.jpg'),
(15, 'DUNIA MANJI 4', '12344ere', '63c0c8ade9bd2.png'),
(16, 'qwert', 'ssssssssssssssss', '63c0cb480947c.jpg'),
(17, 'hamdi', 'wewew', '63c0d585afc62.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `top_lima`
--

CREATE TABLE `top_lima` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `top_lima`
--

INSERT INTO `top_lima` (`id`, `id_menu`) VALUES
(1, 3),
(6, 4),
(2, 12),
(3, 13),
(5, 14),
(4, 16),
(7, 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_menu`
--
ALTER TABLE `jenis_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link_social_media`
--
ALTER TABLE `link_social_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_social_media` (`id_social_media`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_resto` (`id_resto`);

--
-- Indexes for table `operasional`
--
ALTER TABLE `operasional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_resto` (`id_resto`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- Indexes for table `resto`
--
ALTER TABLE `resto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_menu`
--
ALTER TABLE `tag_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_lima`
--
ALTER TABLE `top_lima`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jenis_menu`
--
ALTER TABLE `jenis_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `link_social_media`
--
ALTER TABLE `link_social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operasional`
--
ALTER TABLE `operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resto`
--
ALTER TABLE `resto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tag_menu`
--
ALTER TABLE `tag_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `top_lima`
--
ALTER TABLE `top_lima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `link_social_media`
--
ALTER TABLE `link_social_media`
  ADD CONSTRAINT `link_social_media_ibfk_1` FOREIGN KEY (`id_social_media`) REFERENCES `social_media` (`id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_resto`) REFERENCES `resto` (`id`);

--
-- Constraints for table `operasional`
--
ALTER TABLE `operasional`
  ADD CONSTRAINT `operasional_ibfk_1` FOREIGN KEY (`id_resto`) REFERENCES `resto` (`id`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
