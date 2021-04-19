-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2020 pada 16.15
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kplemigas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(25) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `jenkel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `namalengkap`, `jenkel`) VALUES
(1, 'admin', 'admin123', 'nurul anisa dewi', 'perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `pelanggan` varchar(255) NOT NULL,
  `email_pelanggan` varchar(255) NOT NULL,
  `password_pelanggan` varchar(25) NOT NULL,
  `telepon_pelanggan` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `pelanggan`, `email_pelanggan`, `password_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'Nurul Anisa ', 'nurul@gmail.com', 'nurul12345', 123456789),
(2, 'nabil fairuz', 'nabil@gmail.com', 'nabil', 123123),
(4, 'nauval Abdul', 'nauval@gmal.com', 'nauval', 12321331),
(5, 'ikro', 'ikro@gmail.com', 'ikro', 1111),
(6, 'indra satria', 'indra@gmail.com', 'indra', 123456),
(7, 'user', 'user', 'user', 98098098);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(3, 41, 'Nabil Fairuz Rivai', 'mandiri', 11050, '2020-06-07', '20200607082351aaaa.png'),
(5, 59, 'ikro', 'BNI', 46900, '2020-06-11', '20200611085311vb4.png'),
(6, 60, 'ikro', 'BNI', 3100, '2020-06-16', '20200616160201IMG_1733.JPG'),
(8, 39, 'aa', 'mandiri', 45245, '2020-06-28', '20200628095729IMG_1735.JPG'),
(9, 52, 'Nurul Anisa Dewi', 'Mandiri', 26500, '2020-06-28', '20200628165337IMG_1735.JPG'),
(10, 3, 'Nurul Anisa Dewi', '', 0, '2020-06-29', '20200629062546'),
(11, 65, 'indra satria', 'BCA', 46900, '2020-07-01', '20200701044314IMG_1739.JPG'),
(12, 67, 'User', 'Bank DKI', 31500, '2020-07-01', '202007011659362017-12-02 08.59.07 1.jpg'),
(13, 69, '', '', 0, '2020-07-05', '20200705083139'),
(14, 68, 'user2', 'bankrupt', 8000, '2020-07-07', '20200707163836digi5.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `pengiriman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_karyawan`, `tanggal_pembelian`, `total_pembelian`, `status_pembelian`, `pengiriman`) VALUES
(2, 1, '2020-05-28', 2350, 'pending', ''),
(3, 1, '2020-05-28', 11050, 'sudah kirim pembayaran', ''),
(37, 1, '2020-05-28', 11050, 'pending', ''),
(38, 2, '2020-05-28', 11050, 'sudah kirim pembayaran', ''),
(39, 2, '2020-05-28', 11050, 'sudah kirim pembayaran', ''),
(40, 2, '2020-05-28', 11050, 'pending', ''),
(41, 2, '2020-05-28', 11050, 'pending', ''),
(42, 2, '2020-05-28', 11050, 'pending', ''),
(43, 1, '2020-05-28', 56100, 'pending', ''),
(52, 1, '2020-06-04', 26500, 'batal', ''),
(53, 2, '2020-06-07', 44400, 'pending', ''),
(54, 2, '2020-06-07', 16350, 'pending', ''),
(55, 1, '2020-06-09', 12900, 'pending', ''),
(56, 1, '2020-06-10', 84100, 'pending', ''),
(57, 4, '2020-06-10', 13100, 'pending', ''),
(58, 4, '2020-06-10', 26500, 'pending', ''),
(59, 5, '2020-06-11', 46900, 'barang sedang dikirim', 'Barang sedang dikirim oleh OB (nama OB)'),
(60, 5, '2020-06-12', 3100, 'barang diambil sendiri', 'akan diambil sendiri'),
(61, 5, '2020-06-14', 15250, 'pending', ''),
(62, 2, '2020-06-28', 5700, 'pending', ''),
(63, 5, '2020-06-29', 5700, 'pending', ''),
(64, 5, '2020-06-29', 46900, 'pending', ''),
(65, 6, '2020-06-30', 46900, 'sudah kirim pembayaran', ''),
(66, 6, '2020-07-01', 5700, 'pending', ''),
(67, 7, '2020-07-01', 31500, 'barang diambil sendiri', 'Barang akan diambil oleh pembeli'),
(68, 7, '2020-07-03', 8000, 'sudah kirim pembayaran', ''),
(69, 7, '2020-07-05', 14500, 'sudah kirim pembayaran', ''),
(70, 7, '2020-07-07', 34800, 'pending', ''),
(71, 7, '2020-07-22', 32500, 'pending', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(1, 2, 1, 1, '', 0, 0),
(2, 2, 1, 2, '', 0, 0),
(3, 0, 14, 1, '', 0, 0),
(4, 0, 16, 1, '', 0, 0),
(5, 0, 14, 1, '', 0, 0),
(6, 0, 16, 1, '', 0, 0),
(7, 41, 14, 1, '', 0, 0),
(8, 41, 16, 1, '', 0, 0),
(9, 42, 14, 1, '', 0, 0),
(10, 42, 16, 1, '', 0, 0),
(11, 43, 13, 1, '', 0, 0),
(12, 43, 15, 1, '', 0, 0),
(13, 44, 7, 1, '', 0, 0),
(14, 45, 13, 1, '', 0, 0),
(15, 46, 12, 1, '', 0, 0),
(16, 46, 10, 1, '', 0, 0),
(17, 47, 12, 1, '', 0, 0),
(18, 47, 7, 1, '', 0, 0),
(19, 48, 10, 1, '', 0, 0),
(20, 48, 14, 1, '', 0, 0),
(21, 49, 8, 1, '', 0, 0),
(22, 49, 14, 1, '', 0, 0),
(23, 50, 15, 1, 'Quaker Oats Instant', 46900, 46900),
(24, 50, 13, 1, 'ABC Sardines Saus Ekstra Pedas', 9200, 9200),
(25, 51, 13, 1, 'ABC Sardines Saus Ekstra Pedas', 10000, 10000),
(26, 52, 12, 1, 'So Nice Sosis Siap Makan', 26500, 26500),
(27, 53, 11, 1, 'Frisian Flag UHT', 5700, 5700),
(28, 53, 8, 3, 'Kapal Api grande white coffe', 12900, 38700),
(29, 54, 10, 3, 'French Fries', 3100, 9300),
(30, 54, 14, 3, 'Sedaap Mie Ayam Bawang', 2350, 7050),
(31, 55, 8, 1, 'Kapal Api grande white coffe', 12900, 12900),
(32, 56, 9, 1, 'Relaxa Barley Mint', 8300, 8300),
(33, 56, 8, 2, 'Kapal Api grande white coffe', 12900, 25800),
(34, 56, 10, 1, 'French Fries', 3100, 3100),
(35, 56, 15, 1, 'Quaker Oats Instant', 46900, 46900),
(36, 57, 10, 1, 'French Fries', 3100, 3100),
(37, 57, 13, 1, 'ABC Sardines Saus Ekstra Pedas', 10000, 10000),
(38, 58, 12, 1, 'So Nice Sosis Siap Makan', 26500, 26500),
(39, 59, 15, 1, 'Quaker Oats Instant', 46900, 46900),
(40, 60, 10, 1, 'French Fries', 3100, 3100),
(41, 61, 14, 1, 'Sedaap Mie Ayam Bawang', 2350, 2350),
(42, 61, 8, 1, 'Kapal Api grande white coffe', 12900, 12900),
(43, 62, 11, 1, 'Frisian Flag UHT', 5700, 5700),
(44, 63, 11, 1, 'Frisian Flag UHT', 5700, 5700),
(45, 64, 15, 1, 'Quaker Oats Instant', 46900, 46900),
(46, 65, 15, 1, 'Quaker Oats Instant', 46900, 46900),
(47, 66, 11, 1, 'Frisian Flag UHT', 5700, 5700),
(48, 67, 18, 2, 'Kopi Kapal Api', 2500, 5000),
(49, 67, 12, 1, 'So Nice Sosis Siap Makan', 26500, 26500),
(50, 68, 18, 2, 'Kopi Kapal Api', 2500, 5000),
(51, 68, 20, 1, 'Indocafe', 3000, 3000),
(52, 69, 10, 2, 'French Fries', 3100, 6200),
(53, 69, 9, 1, 'Relaxa Barley Minttt', 8300, 8300),
(54, 70, 12, 1, 'So Nice Sosis Siap Makan', 26500, 26500),
(55, 70, 9, 1, 'Relaxa Barley Minttt', 8300, 8300),
(56, 71, 20, 2, 'Indocafe', 3000, 6000),
(57, 71, 12, 1, 'So Nice Sosis Siap Makan', 26500, 26500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `desk_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `foto_produk`, `desk_produk`, `stok_produk`) VALUES
(8, 'Kapal Api grande white coffe', 9000, 'grande.jpg', 'ini kopi kapal api grande white kopi\r\n', 8),
(9, 'Relaxa Barley Minttt', 8300, 'relaxa.png', 'ini permen relaxa barley mint kopi dah', 10),
(10, 'French Fries', 3100, 'kentang.jpg', 'ini kentang goreng yaa', 10),
(11, 'Frisian Flag UHT', 5700, 'susu.jpg', 'ini susu frisian flag', 12),
(12, 'So Nice Sosis Siap Makan', 26500, 'sosis.jpg', 'ini sosis siap makan', 10),
(13, 'ABC Sardines Saus Ekstra Pedas', 10000, 'abc.jpg', 'ini sarden ABC', 4),
(14, 'Sedaap Mie Ayam Bawang', 2500, 'sedaap.jpg', 'ini mi sedap', 20),
(15, 'Quaker Oats Instant', 46900, 'oat.jpg', 'ini quaker', 8),
(18, 'Kopi Kapal Api', 2500, 'kopi kapal api.jpg', 'ini kopi kapal api', 12),
(19, 'kopi good day', 2000, 'good day kopi.jpg', 'ini kopi good day', 6),
(20, 'Indocafe', 3000, 'indocafe.jpg', 'ini kopi indocafe', 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `pelanggan` (`pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD UNIQUE KEY `id_pembelian` (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
