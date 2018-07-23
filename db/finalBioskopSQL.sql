-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2018 at 10:37 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `umur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nama`, `alamat`, `umur`) VALUES
(1, 'fata', 'sukatani', '21'),
(2, 'Fata El Islami', 'Sekeloa Bandung', '19'),
(3, 'Falday', 'subang', '22'),
(4, 'Reza', 'Ciparay', '22'),
(5, 'FALDI', 'CUY', '29'),
(6, 'Falday', 'COBLONG', 'OKEY'),
(7, 'dwi', 'Curug', '29'),
(8, 'OKE', 'CIHUY', 'UCCY'),
(9, 'FALDI', 'Cilcap', '22'),
(10, 'Helsan', 'Sekeloa', '21'),
(11, 'faldi fav', 'sekeloaaaa cilacap', '99'),
(12, 'Iqbal', 'Sekeloa', '21'),
(13, 'irman', 'coblong', '99');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` varchar(225) NOT NULL,
  `judul_film` varchar(225) NOT NULL,
  `tahun_produksi` varchar(225) NOT NULL,
  `sinopsis` text NOT NULL,
  `durasi` varchar(225) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `url_gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `judul_film`, `tahun_produksi`, `sinopsis`, `durasi`, `tanggal_mulai`, `tanggal_selesai`, `url_gambar`) VALUES
('CZT', 'Cek En RIcek', '2018', 'OKEY', '3 JAM', '2018-07-19', '2018-07-25', 'www.facebok.com'),
('HRD', 'HereditarEE', '2018', 'Asyiq', '2 Jam', '2018-07-17', '2018-07-26', 'www.google.com'),
('INF', 'Infinity War', '2018', 'OKAY', '3 JAM', '2018-06-17', '2018-07-27', 'www.facebok.com'),
('JRC', 'Jurasic World', '2018', 'This Film Is Awsem', '2 Jam', '2018-07-16', '2018-07-30', 'www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `film_genre`
--

CREATE TABLE `film_genre` (
  `id_film` varchar(225) NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film_genre`
--

INSERT INTO `film_genre` (`id_film`, `id_genre`) VALUES
('CZT', 1),
('CZT', 3),
('CZT', 6),
('HRD', 3),
('HRD', 6),
('JRC', 2),
('JRC', 6);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nama_genre` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`) VALUES
(1, 'Action'),
(2, 'Komedy'),
(3, 'Romance'),
(6, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_studio` int(11) NOT NULL,
  `id_film` varchar(225) DEFAULT NULL,
  `id_jam_tayang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_studio`, `id_film`, `id_jam_tayang`) VALUES
(4, 1, 'JRC', 5),
(5, 1, 'JRC', 9),
(6, 1, 'JRC', 8),
(7, 2, 'JRC', 9),
(8, 1, 'INF', 9);

-- --------------------------------------------------------

--
-- Table structure for table `jam_tayang`
--

CREATE TABLE `jam_tayang` (
  `id_jam_tayang` int(11) NOT NULL,
  `jam_tayang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam_tayang`
--

INSERT INTO `jam_tayang` (`id_jam_tayang`, `jam_tayang`) VALUES
(5, '11:00:00'),
(6, '13:45:00'),
(7, '16:00:00'),
(8, '18:15:00'),
(9, '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_transaksi` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah_pembayaran` varchar(255) NOT NULL,
  `tanggal_pembayaran` varchar(255) NOT NULL,
  `bank_asal` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `bank_tujuan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_transaksi`, `username`, `nama`, `jumlah_pembayaran`, `tanggal_pembayaran`, `bank_asal`, `no_rekening`, `atas_nama`, `bank_tujuan`, `foto`) VALUES
(1, 'TR-5C3', 'ester', 'Fata El Islami', '100000', '2018-10-10', 'BNI', '123321', 'Fata El Islami', 'BRI', '385feaaf21a19d34cef5ac0c6175377c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `id_kursi` int(11) NOT NULL,
  `no_baris` int(11) DEFAULT NULL,
  `no_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`id_kursi`, `no_baris`, `no_kursi`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 2, 1),
(25, 2, 2),
(26, 2, 3),
(27, 2, 4),
(28, 2, 5),
(29, 2, 6),
(30, 2, 7),
(31, 2, 8),
(32, 2, 9),
(33, 2, 10),
(34, 2, 11),
(35, 2, 12),
(36, 2, 13),
(37, 2, 14),
(38, 2, 15),
(39, 2, 16),
(40, 2, 17),
(41, 2, 18),
(42, 2, 19),
(43, 2, 20),
(44, 2, 21),
(45, 2, 22),
(46, 2, 23),
(47, 3, 1),
(48, 3, 2),
(49, 3, 3),
(50, 3, 4),
(51, 3, 5),
(52, 3, 6),
(53, 3, 7),
(54, 3, 8),
(55, 3, 9),
(56, 3, 10),
(57, 3, 11),
(58, 3, 12),
(59, 3, 13),
(60, 3, 14),
(61, 3, 15),
(62, 3, 16),
(63, 3, 17),
(64, 3, 18),
(65, 3, 19),
(66, 3, 20),
(67, 3, 21),
(68, 3, 22),
(69, 3, 23),
(70, 4, 1),
(71, 4, 2),
(72, 4, 3),
(73, 4, 4),
(74, 4, 5),
(75, 4, 6),
(76, 4, 7),
(77, 4, 8),
(78, 4, 9),
(79, 4, 10),
(80, 4, 11),
(81, 4, 12),
(82, 4, 13),
(83, 4, 14),
(84, 4, 15),
(85, 4, 16),
(86, 4, 17),
(87, 4, 18),
(88, 4, 19),
(89, 4, 20),
(90, 4, 21),
(91, 4, 22),
(92, 4, 23),
(93, 5, 1),
(94, 5, 2),
(95, 5, 3),
(96, 5, 4),
(97, 5, 5),
(98, 5, 6),
(99, 5, 7),
(100, 5, 8),
(101, 5, 9),
(102, 5, 10),
(103, 5, 11),
(104, 5, 12),
(105, 5, 13),
(106, 5, 14),
(107, 5, 15),
(108, 5, 16),
(109, 5, 17),
(110, 5, 18),
(111, 5, 19),
(112, 5, 20),
(113, 5, 21),
(114, 5, 22),
(115, 5, 23);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Pemesan');

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `id_studio` int(11) NOT NULL,
  `nama_studio` varchar(225) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`id_studio`, `nama_studio`, `harga`) VALUES
(1, 'STUDIO 1', 35000),
(2, 'STUDIO 2', 35000),
(3, 'STUDIO 3', 35000),
(4, 'STUDIO 4', 35000),
(5, 'STUDIO 5', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_kursi` int(11) NOT NULL,
  `tanggal_tayang` date DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_transaksi`, `id_jadwal`, `id_kursi`, `tanggal_tayang`, `username`, `date_create`) VALUES
(1, 'TR-8hx', 8, 1, '2018-07-23', 'admin', '2018-07-23 02:30:05'),
(2, 'TR-8hx', 8, 2, '2018-07-23', 'admin', '2018-07-23 02:30:05'),
(3, 'TR-TfZ', 7, 14, '2018-07-23', 'admin', '2018-07-23 02:31:09'),
(4, 'TR-TfZ', 7, 15, '2018-07-23', 'admin', '2018-07-23 02:31:09'),
(5, 'TR-TfZ', 7, 17, '2018-07-23', 'admin', '2018-07-23 02:31:09'),
(6, 'TR-TfZ', 7, 18, '2018-07-23', 'admin', '2018-07-23 02:31:09'),
(7, 'TR-5C3', 8, 4, '2018-07-23', 'admin', '2018-07-23 04:22:36'),
(8, 'TR-5C3', 8, 5, '2018-07-23', 'admin', '2018-07-23 04:22:36'),
(9, 'TR-5C3', 8, 6, '2018-07-23', 'admin', '2018-07-23 04:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(225) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `total` int(11) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `status` varchar(225) DEFAULT 'pending',
  `username` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_bayar`, `total`, `jumlah_tiket`, `status`, `username`) VALUES
('TR-5C3', NULL, 105000, 3, 'pending', 'admin'),
('TR-8hx', NULL, 70000, 2, 'pending', 'admin'),
('TR-TfZ', NULL, 140000, 4, 'pending', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` enum('L','P','','') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(225) NOT NULL,
  `kota` varchar(225) NOT NULL,
  `id_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `email`, `kota`, `id_level`) VALUES
('admin', '0192023a7bbd73250516f069df18b500', 'Fata El Islami', 'L', '2018-07-09', 'santribloggers@gmail.com', 'Purwakarta', 1),
('admin321', '7d8e674222b999a32838aac4d0763900', 'Fata El Islami', '', '1111-11-11', 'cc@san.com', 'Bogor', 2),
('dwidwi', 'f36dc8fd45b7f5cc3f55bbeec976482a', 'dwi', '', '1111-11-11', 'dwidwi@gmail.com', 'Borog', 2),
('ester', 'fa258e7e7a0d43c4266a01029dc2bdfa', 'Ester', '', '1997-10-12', 'ester@gmail.com', 'Bandung', 2),
('faldi', 'a821531de29522e2c6646b8d20a68e29', 'faldi', '', '1111-11-11', 'faldifavian@yahoo.com', 'Bandung', 2),
('ken', 'f632fa6f8c3d5f551c5df867588381ab', 'Ken', '', '1111-11-11', 'ken@gmail.com', 'ken', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indexes for table `film_genre`
--
ALTER TABLE `film_genre`
  ADD UNIQUE KEY `id_film_2` (`id_film`,`id_genre`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_studio` (`id_studio`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_jam_tayang` (`id_jam_tayang`);

--
-- Indexes for table `jam_tayang`
--
ALTER TABLE `jam_tayang`
  ADD PRIMARY KEY (`id_jam_tayang`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `no_transaksi` (`id_transaksi`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id_kursi`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id_studio`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `username` (`username`),
  ADD KEY `id_kursi` (`id_kursi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jam_tayang`
--
ALTER TABLE `jam_tayang`
  MODIFY `id_jam_tayang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id_kursi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `id_studio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film_genre`
--
ALTER TABLE `film_genre`
  ADD CONSTRAINT `film_genre_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `film_genre_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_jam_tayang`) REFERENCES `jam_tayang` (`id_jam_tayang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_studio`) REFERENCES `studio` (`id_studio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `konfirmasi_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konfirmasi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiket_ibfk_4` FOREIGN KEY (`id_kursi`) REFERENCES `kursi` (`id_kursi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
