-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 10:34 AM
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
(1, '63c3c13464d81.jpg', 'foto bersama'),
(2, '63c3c13c9936a.jpg', ''),
(3, '63c3c1475734b.jpg', ''),
(4, '63c3c14fdf77c.jpg', ''),
(5, '63c3c15719b9f.jpg', ''),
(6, '63c3c15f9864f.jpg', ''),
(7, '63c3c16f7bb25.jpg', ''),
(8, '63c3c17835068.jpg', ''),
(9, '63c3c180cc335.jpg', ''),
(10, '63c3c18e9a7a8.jpg', ''),
(11, '63c3c198591b2.jpg', ''),
(12, '63d1f6e86d25a.jpg', ''),
(13, '63d1f6f111d39.jpg', ''),
(14, '63d1f70353257.jpg', ''),
(15, '63d1f70ba326f.jpg', ''),
(16, '63da266186b0b.jpg', '');

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
-- Table structure for table `katasantri`
--

CREATE TABLE `katasantri` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `testimoni` text NOT NULL,
  `foto` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `katasantri`
--

INSERT INTO `katasantri` (`id`, `nama`, `testimoni`, `foto`) VALUES
(1, 'DUNIA KITA', 'test', '63da272b55e4b.jpg');

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
(1, 'Tabligh Akbar', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. testtttttttttttttttt', 'Bandung', '63cb4cbd2f66a.jpg', '22-01-1998'),
(2, 'hamdi', 'Arsenal Football Club adalah klub sepak bola profesional Inggris yang berbasis di daerah Holloway, London. Didirikan pada 1886 dengan nama Dial Square. Wikipedia', 'jakarta', '63cb4cad348dd.jpg', '2023/01/18'),
(3, 'pebajian bulanan', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard M Apa itu Lorem Ipsum? Lorem Ipsum hanyalah teks tiruan dari industri percetakan dan penyusunan Sebelum mengetahui contoh visi misi pribadi, penting juga mengerti manfaat dari visi sehingga dalam membuatnya menjadi lebih paham. Berikut adalah beberapa manfaat visi: Menjadi sebuah jembatan dari kondisi saat ini dengan kondisi yang ada di masa depan. 1. Meningkatkan taraf hidup dan kualitas manusia Menjadi sebuah jembatan dari kondisi saat ini dengan kondisi yang ada di masa depan. 1. Meningkatkan taraf hidup dan kualitas manusia Menjadi sebuah jembatan dari kondisi saat ini dengan kondisi yang ada di masa depan. 1. Meningkatkan taraf hidup dan kualitas manusia Menjadi sebuah jembatan dari kondisi saat ini dengan kondisi yang ada di masa depan. 1. Meningkatkan taraf hidup dan kualitas manusia', 'cipatujah', '63cb4cfc5fae1.jpg', '2023/01/23'),
(5, ' DUNIA KITA SATU dua tiga', 'Arsenal Football Club adalah klub sepak bola profesional Inggris yang berbasis di daerah Holloway, London. Didirikan pada 1886 dengan nama Dial Square. Wikipedia Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'cipatujah', '63c40aa9a6f17.jpg', '2023/02/01'),
(6, 'bersih-bersih', 'Arsenal Football Club adalah klub sepak bola profesional Inggris yang berbasis di daerah Holloway, London. Didirikan pada 1886 dengan nama Dial Square. Wikipedia', 'bandung', '63cb4c8c9b371.jpg', '2023/01/26'),
(7, 'pebajian bulanan', 'Arsenal Football Club adalah klub sepak bola profesional Inggris yang berbasis di daerah Holloway, London. Didirikan pada 1886 dengan nama Dial Square. Wikipedia', 'Ponpes Alhasan', '63cb4ca05595e.jpg', '2023/02/16'),
(8, 'pebajian tahunan', 'FORM TAMBAH DATA MENU', 'Bandung', '63cb4cc9cd3b9.jpg', '2023/01/18');

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
(7, 3, 'https://youtu.be/1jO2wSpAoxA'),
(8, 5, 'https://www.tiktok.com/en/'),
(9, 6, 'https://wa.me/6282216320121');

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
  `id_profil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `status`, `nama`, `id_profil`) VALUES
(1, 'admin', '$2y$10$GIYz6RG9mI9SzHC2f.0w4u68ELU9ay44i8B14wBRqYv7BrlTL8.j6', 'Admin', 'admin', 1);

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
  `foto` varchar(32) DEFAULT NULL,
  `nama` varchar(32) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `hp` bigint(20) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='pendaftaran';

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `foto`, `nama`, `jenis_kelamin`, `hp`, `alamat`, `tgl_masuk`, `id_sekolah`) VALUES
(1, '63c0fed7737e0.jpeg', 'hamdi', '', 0, 'bandung', '2023-01-13', 1),
(3, '63c649e4b54e7.jpg', 'hamdi', 'Laki-Laki', 0, 'jakarta', '2023-01-25', 2),
(4, '63c9fde89d13a.jpg', 'DUNIA KITA', '', 0, 'bandung indonesia', '2023-01-25', 2),
(5, '63ca02daa34c6.jpg', 'DUNIA KITA', '', 0, 'bogor', '2023-01-25', 3),
(6, '', ' DUNIA KITA 7', 'Perempuan', 0, 'banjar baru', '0000-00-00', 3),
(7, '', '  DUNIA MANJI', 'Laki-Laki', 0, 'Sulawesi selatan', '0000-00-00', 3),
(8, '63da27549e3ff.jpg', 'hadmu', '', 0, 'adad', '0000-00-00', 1),
(9, '', 'DUNIA MANJI 4', 'Laki-Laki', 0, 'Untuk mendaftar', '0000-00-00', 3),
(10, '', 'DUNIA KITA', 'Perempuan', 0, 'saqsq', '0000-00-00', 2),
(11, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(12, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(13, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(14, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(15, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(16, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(17, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(18, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(19, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(20, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(21, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(22, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(23, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(24, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(25, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(26, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(27, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(28, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(29, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(30, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(31, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(32, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(33, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(34, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(35, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(36, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(37, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(38, '', 'dsa', 'Perempuan', 0, 'qwerty', '0000-00-00', 2),
(39, '', ' DUNIA KITA SATU dua tiga', 'Laki-Laki', 0, 'cxsaqwer', '0000-00-00', 1),
(40, '', 'hamdi', 'Laki-Laki', 0, 'dsds', '0000-00-00', 1),
(41, '', 'hamdi', 'Laki-Laki', 0, 'dsds', '0000-00-00', 1),
(42, '', 'DUNIA KAMI', 'Laki-Laki', 0, 'yyrt', '0000-00-00', 2),
(43, '', 'DUNIA KAMI', 'Laki-Laki', 0, 'kkkkkkkkkkkkkkkkk', '0000-00-00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `hp` bigint(32) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_bg` varchar(32) NOT NULL,
  `foto_profil` varchar(32) NOT NULL,
  `foto_vid1` varchar(32) NOT NULL,
  `foto_vid2` varchar(32) NOT NULL,
  `foto_vid3` varchar(32) NOT NULL,
  `link_video1` text NOT NULL,
  `link_video2` varchar(50) NOT NULL,
  `link_video3` varchar(50) NOT NULL,
  `google_map` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='profil';

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `alamat`, `hp`, `deskripsi`, `foto_bg`, `foto_profil`, `foto_vid1`, `foto_vid2`, `foto_vid3`, `link_video1`, `link_video2`, `link_video3`, `google_map`) VALUES
(1, '     AL - HASAN    ', 'JL, Jl. Raya Cipatujah No.179 RT. 013/002, Darawati, Kec. Cipatujah, Kabupaten Tasikmalaya, Jawa Barat                    ', 81336121328, 'irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.\r\nUllamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.\r\nUllamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.\r\nUllamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute ', '1.jpg       ', 'piqsels.com-id-sxmkk.jpg  ', '', '', '', 'https://youtu.be/qyqM38nSfQA          ', 'https://youtu.be/YDBeX1Pikr8  ', 'https://youtu.be/osIls7N2mls ', '');

-- --------------------------------------------------------

--
-- Table structure for table `sejarah`
--

CREATE TABLE `sejarah` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `visi` text NOT NULL,
  `foto1` text NOT NULL,
  `deskripsi1` varchar(32) NOT NULL,
  `foto2` varchar(200) NOT NULL,
  `deskripsi2` varchar(32) NOT NULL,
  `foto3` varchar(200) NOT NULL,
  `deskripsi3` varchar(32) NOT NULL,
  `foto4` varchar(200) NOT NULL,
  `deskripsi4` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sejarah`
--

INSERT INTO `sejarah` (`id`, `deskripsi`, `visi`, `foto1`, `deskripsi1`, `foto2`, `deskripsi2`, `foto3`, `deskripsi3`, `foto4`, `deskripsi4`) VALUES
(1, '                      Apa itu Lorem Ipsum?\r\nLorem Ipsum hanyalah teks tiruan dari industri percetakan dan penyusunan   Sebelum mengetahui contoh visi misi pribadi, penting juga mengerti manfaat dari visi sehingga dalam membuatnya menjadi lebih paham. Berikut adalah beberapa manfaat visi:\r\n    Menjadi sebuah jembatan dari kondisi saat ini dengan kondisi yang ada di masa depan.\r\n    1. Meningkatkan taraf hidup dan kualitas manusia\r\n    Menjadi sebuah jembatan dari kondisi saat ini dengan kondisi yang ada di masa depan.\r\n    1. Meningkatkan taraf hidup dan kualitas manusia    Menjadi sebuah jembatan dari kondisi saat ini dengan kondisi yang ada di masa depan.\r\n    1. Meningkatkan taraf hidup dan kualitas manusia    Menjadi sebuah jembatan dari kondisi saat ini dengan kondisi yang ada di masa depan.\r\n    1. Meningkatkan taraf hidup dan kualitas manusia\r\n\r\n ', '                  Sebelum mengetahui contoh visi misi pribadi, penting juga mengerti manfaat dari visi sehingga dalam membuatnya menjadi lebih paham. Berikut adalah beberapa manfaat visi:\r\n\r\n    Menjadi sebuah jembatan dari kondisi saat ini dengan kondisi yang ada di masa depan.\r\n    1. Meningkatkan taraf hidup dan kualitas manusia.\r\n   2.  Menumbuhkan sikap untuk meningkatkan tanggung jawab dengan melakukan pekerjaan semaksimal mungkin untuk mencapai visi tersebut.\r\n   3. Menumbuhkan sikap yang positif dan semangat dalam bekerja.', '4.jpg', 'KH.Syarif Hidayat      ', 'DSC05103.JPG               ', 'Asrama Santri                ', '11.jpg               ', 'Santri Putra               ', 'DSC05105.JPG               ', 'Santri Putri                ');

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
(0, 'tiktok'),
(1, 'twitter'),
(2, 'facebook'),
(3, 'instagram'),
(4, 'youtube'),
(5, 'tiktok'),
(6, 'whatsapp');

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
-- Indexes for table `katasantri`
--
ALTER TABLE `katasantri`
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
  ADD KEY `id_resto` (`id_profil`);

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
-- Indexes for table `profil`
--
ALTER TABLE `profil`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jenis_menu`
--
ALTER TABLE `jenis_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `katasantri`
--
ALTER TABLE `katasantri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `link_social_media`
--
ALTER TABLE `link_social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
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
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_profil`) REFERENCES `profil` (`id`);

--
-- Constraints for table `operasional`
--
ALTER TABLE `operasional`
  ADD CONSTRAINT `operasional_ibfk_1` FOREIGN KEY (`id_resto`) REFERENCES `profil` (`id`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
