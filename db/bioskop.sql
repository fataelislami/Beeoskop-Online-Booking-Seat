-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2018 at 09:04 AM
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
('INF', 'Infinity War', '2018', 'OKAY', '3 JAM', '2018-07-17', '2018-07-27', 'www.facebok.com'),
('JRC', 'Jurasic World', '2018', 'This Film Is Awsem', '2 Jam', '2018-07-16', '2018-07-20', 'www.google.com');

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
('HRD', 6);

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
(2, '10:10:00'),
(3, '10:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `id_kursi` int(11) NOT NULL,
  `no_kursi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'STUDIO 2', 25000),
(3, 'STUDIO 3', 25000),
(4, 'STUDIO 4', 15000),
(5, 'STUDIO 6', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_transaksi` varchar(225) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(225) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `total` int(11) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `username` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('admin', '0192023a7bbd73250516f069df18b500', 'Fata El Islami', 'L', '2018-07-09', 'santribloggers@gmail.com', 'Purwakarta', 1);

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
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_jadwal_2` (`id_jadwal`),
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
-- AUTO_INCREMENT for table `jam_tayang`
--
ALTER TABLE `jam_tayang`
  MODIFY `id_jam_tayang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id_kursi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_kursi`) REFERENCES `kursi` (`id_kursi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

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
