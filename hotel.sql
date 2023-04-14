-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 06:24 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `biohotel`
--

CREATE TABLE `biohotel` (
  `id_hotel` int(11) NOT NULL,
  `nama_hotel` varchar(255) NOT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `bintang` int(200) DEFAULT NULL,
  `link` varchar(200) NOT NULL,
  `jalan` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `over_1` varchar(100) NOT NULL,
  `over_2` varchar(100) NOT NULL,
  `over_3` varchar(100) NOT NULL,
  `over_4` varchar(100) NOT NULL,
  `over_5` varchar(100) NOT NULL,
  `kamar_standart` varchar(100) NOT NULL,
  `kamar_upsize` varchar(100) NOT NULL,
  `link_map` varchar(500) NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biohotel`
--

INSERT INTO `biohotel` (`id_hotel`, `nama_hotel`, `kota`, `bintang`, `link`, `jalan`, `harga`, `over_1`, `over_2`, `over_3`, `over_4`, `over_5`, `kamar_standart`, `kamar_upsize`, `link_map`, `no_telepon`) VALUES
(11, 'Sheraton', 'Surabaya', 5, 'upload/sheraton.png', 'Jl. Embong Malang No.25-31, Kedungdoro, Kec. Tegalsari, Kota SBY, Jawa Timur 60261', 1000000, 'upload/sov1.jpg', 'upload/sov2.jpg', 'upload/sov3.jpg', 'upload/sov4.jpg', 'upload/sov5.jpg', 'upload/sks.jpg', 'upload/sku.jpg', 'https://www.google.com/maps/place/Sheraton+Surabaya+Hotel+%26+Towers/@-7.2625548,112.737785,19z/data=!4m8!3m7!1s0x2dd7f95d8d585dff:0x8eb808da01602d4!5m2!4m1!1i2!8m2!3d-7.2625835!4d112.738223', '082546395167'),
(12, 'Shangrila', 'Surabaya', 5, 'upload/shangrila.jpg', 'Jl. Mayjen Sungkono No.120, Pakis, Kec. Sawahan, Kota SBY, Jawa Timur 60256', 400000, 'upload/shov1.jpg', 'upload/shov2.jpg', 'upload/shov3.jpg', 'upload/shov4.jpg', 'upload/shov5.jpg', 'upload/shks.jpg', 'upload/shku.jpg', 'https://www.google.com/maps/place/Shangri-La+Surabaya/@-7.2901754,112.7142143,16.74z/data=!4m8!3m7!1s0x0:0x914612d509cc37f6!5m2!4m1!1i2!8m2!3d-7.2898912!4d112.7161865', '081654329675'),
(13, 'Moxy', 'Bandung', 2, 'upload/moxy.jpg', 'Jl. Ir. H. Juanda No.69, Tamansari, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40116', 250000, 'upload/mov1.jpg', 'upload/mov2.jpg', 'upload/mov3.jpg', 'upload/mov4.jpg', 'upload/mov5.jpg', 'upload/mks.jpg', 'upload/mku.jpg', 'https://www.google.com/maps/place/Moxy+Bandung/@-6.900354,107.6098503,17z/data=!3m1!4b1!4m8!3m7!1s0x2e68e64f04f42f33:0x6be5bc8f1516e22f!5m2!4m1!1i2!8m2!3d-6.9003892!4d107.6120225', '08499655235'),
(14, 'Maxone', 'Malang\r\n', 4, 'upload/maxone.jpg', 'Jl. Jaksa Agung Suprapto No.75 A, Rampal Celaket, Kec. Klojen, Kota Malang, Jawa Timur 65111', 200000, 'upload/maov1.jpg', 'upload/maov2.jpg', 'upload/maov3.jpg', 'upload/maov4.jpg', 'upload/maov5.jpg', 'upload/maks.jpg', 'upload/maku.jpg', 'https://www.google.com/maps/place/Maxone+Ascent+Hotel/@-7.9658766,112.6316914,17z/data=!3m1!4b1!4m8!3m7!1s0x2dd6283224da8027:0xf581c704af47f937!5m2!4m1!1i2!8m2!3d-7.9658766!4d112.6338801', '999999999999'),
(15, 'aryaduta', 'Medan', 3, 'upload/aryaduta.jpg', 'Jl. Kapten Maulana Lubis No.8, Petisah Tengah, Kec. Medan Petisah, Kota Medan, Sumatera Utara 20112', 500000, 'upload/aov1.jpg', 'upload/aov2.jpg', 'upload/aov3.jpg', 'upload/aov4.jpg', 'upload/aov5.jpg', 'upload/aks.jpg', 'upload/aku.jpg', 'https://www.google.com/maps/place/Aryaduta+Medan/@3.5849517,98.6407899,14z/data=!3m1!5s0x303131cf78eeac61:0xa1951d1f3b30e4c2!4m13!1m6!2m5!1shotel+medan!5m3!5m2!4m1!1i2!3m5!1s0x303131cf7a014781:0x3a7bca4684a64298!5m2!4m1!1i2!15sCgtob3RlbCBtZWRhbloNIgtob3RlbCBtZWRhbpIBBWhvdGVs', '086954316872'),
(19, 'hotel', 'Blitar', 1, 'assets/NginApp.jpg', 'banget', 150000, 'assets/NginApp.jpg', 'assets/NginApp.jpg', 'assets/NginApp.jpg', 'assets/NginApp.jpg', 'assets/NginApp.jpg', 'assets/NginApp.jpg', 'assets/NginApp.jpg', '...', '081564332785'),
(20, 'hotel', 'Pekanbaru', 2, 'assets/NginApp.jpg', 'jalan ini', 600000, 'assets/NginApp.jpg', 'assets/NginApp.jpg', 'assets/NginApp.jpg', 'assets/NginApp.jpg', 'assets/NginApp.jpg', 'assets/NginApp.jpg', 'assets/NginApp.jpg', 'test', '081264597321');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama`, `jumlah`) VALUES
(1, 'normal', 5),
(2, 'upsize', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_hotel` int(11) DEFAULT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_jenis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_hotel`, `id_kamar`, `id_jenis`) VALUES
(11, 75, 1),
(11, 76, 1),
(11, 77, 1),
(11, 78, 1),
(11, 79, 1),
(11, 80, 2),
(11, 81, 2),
(11, 82, 2),
(11, 83, 2),
(11, 84, 2),
(12, 85, 1),
(12, 86, 1),
(12, 87, 1),
(12, 88, 1),
(12, 89, 1),
(12, 90, 2),
(12, 91, 2),
(12, 92, 2),
(12, 93, 2),
(12, 94, 2),
(13, 95, 1),
(13, 96, 1),
(13, 97, 1),
(13, 98, 1),
(13, 99, 1),
(13, 100, 2),
(13, 101, 2),
(13, 102, 2),
(13, 103, 2),
(13, 104, 2),
(14, 105, 1),
(14, 106, 1),
(14, 107, 1),
(14, 108, 1),
(14, 109, 1),
(14, 110, 2),
(14, 111, 2),
(14, 112, 2),
(14, 113, 2),
(14, 114, 2),
(15, 115, 1),
(15, 116, 1),
(15, 117, 1),
(15, 118, 1),
(15, 119, 1),
(15, 120, 2),
(15, 121, 2),
(15, 122, 2),
(15, 123, 2),
(15, 124, 2),
(19, 125, 1),
(19, 126, 1),
(19, 127, 1),
(19, 128, 1),
(19, 129, 1),
(19, 130, 2),
(19, 131, 2),
(19, 132, 2),
(19, 133, 2),
(19, 134, 2),
(20, 135, 1),
(20, 136, 1),
(20, 137, 1),
(20, 138, 1),
(20, 139, 1),
(20, 140, 2),
(20, 141, 2),
(20, 142, 2),
(20, 143, 2),
(20, 144, 2);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_hotel` int(11) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_user`, `id_hotel`, `keterangan`, `tanggal`) VALUES
(2, 2, 11, 'kamar luas dan fasilitas lengkap', '2021-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_kamar` int(11) DEFAULT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_kamar`, `id_transaksi`, `id_user`, `check_in`, `check_out`, `total`) VALUES
(115, 1, 2, '2021-09-08', '2021-09-09', 500000),
(116, 2, 3, '2021-06-23', '2021-06-25', 1500000),
(117, 3, 4, '2021-01-20', '2021-01-23', 2500000),
(118, 4, 2, '2021-03-10', '2021-03-12', 1250000),
(107, 5, 3, '2021-05-19', '2021-05-20', 700000),
(120, 6, 4, '2021-02-17', '2021-02-18', 900000),
(121, 7, 2, '2020-12-16', '2020-12-19', 900000),
(122, 8, 3, '2021-07-21', '2021-07-22', 900000),
(123, 9, 4, '2021-05-19', '2021-05-20', 900000),
(124, 10, 3, '2021-06-25', '2021-06-26', 900000),
(80, 11, 2, '2021-12-16', '2021-12-17', 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `_user`
--

CREATE TABLE `_user` (
  `id_user` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `alamat_user` varchar(50) NOT NULL,
  `telp_user` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_user`
--

INSERT INTO `_user` (`id_user`, `stat`, `name_user`, `alamat_user`, `telp_user`, `email`, `password_user`) VALUES
(1, 0, 'admin', 'admin complex', '2147483647', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 1, 'Billy', 'di rumah nya sendiri', '2147483647', 'billy@gmail.com', '95c78cbf206df4c643e6b49450f7a024'),
(3, 1, 'Justin Andhika', 'di bali sih', '654913875222', 'justina@gmail.com', 'ecd339c75bf9d2b3c38874f07f8ee309'),
(4, 1, 'Princen Kwangtama T', 'di lombok', '081337888652', 'princen@gmail.com', 'f7f9920f83714a95237ca2f0e6e70fd4'),
(18, 0, 'admin2', 'admin2pseudo', '084156739124', 'admin2@gmail.com', 'c84258e9c39059a89ab77d846ddab909'),
(19, 1, 'ini', 'akun', '081654987321', 'tester@gmail.com', '72a3dcef165d9122a45decf13ae20631');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biohotel`
--
ALTER TABLE `biohotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `_user`
--
ALTER TABLE `_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biohotel`
--
ALTER TABLE `biohotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `_user`
--
ALTER TABLE `_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `biohotel` (`id_hotel`),
  ADD CONSTRAINT `kamar_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `_user` (`id_user`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_hotel`) REFERENCES `biohotel` (`id_hotel`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
