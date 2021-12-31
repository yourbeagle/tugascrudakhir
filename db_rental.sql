-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2021 pada 11.03
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `kode_lapangan` varchar(10) NOT NULL,
  `nama_lapangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`kode_lapangan`, `nama_lapangan`) VALUES
('L001', 'Lapangan MNG'),
('L002', 'Lapangan B'),
('L003', 'Lapangan C'),
('L004', 'Lapangan D'),
('L005', 'Lapangan E'),
('L006', 'Lapangan F'),
('L007', 'Lapangan G'),
('L008', 'Lapangan H'),
('L009', 'Lapangan I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kode_bayar` varchar(10) NOT NULL,
  `kode_petugas` varchar(10) NOT NULL,
  `kode_sewa` varchar(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `harga` int(11) NOT NULL,
  `sisa_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`kode_bayar`, `kode_petugas`, `kode_sewa`, `tgl_bayar`, `harga`, `sisa_bayar`) VALUES
('B001', 'P001', 'S001', '2019-05-05', 50000, 0),
('B002', 'P002', 'S002', '2019-05-05', 100000, 75000),
('B003', 'P002', 'S003', '2019-05-10', 50000, 25000),
('B004', 'P004', 'S004', '2019-06-13', 50000, 0),
('B005', 'P003', 'S005', '2019-06-24', 50000, 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesan`
--

CREATE TABLE `pemesan` (
  `kode_pemesan` varchar(10) NOT NULL,
  `nama_pemesan` varchar(25) NOT NULL,
  `no_hp_pemesan` varchar(50) NOT NULL,
  `alamat_pemesan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesan`
--

INSERT INTO `pemesan` (`kode_pemesan`, `nama_pemesan`, `no_hp_pemesan`, `alamat_pemesan`) VALUES
('C001', 'Hadad', '081239765', 'Jl. Melati No. 001'),
('C002', 'Roni', '085635569', 'Jl. Mawar No. 010'),
('C003', 'Nia', '081309002', 'Jl. Kenangan No. 008'),
('C004', 'Bambang', '085521242212', 'Malang'),
('C005', 'Ani', '081377678', 'Jl. Tulip No. 009');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewaan`
--

CREATE TABLE `penyewaan` (
  `kode_sewa` varchar(10) NOT NULL,
  `kode_lapangan` varchar(10) NOT NULL,
  `kode_petugas` varchar(10) NOT NULL,
  `kode_pemesan` varchar(10) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_sewa` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `deposit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyewaan`
--

INSERT INTO `penyewaan` (`kode_sewa`, `kode_lapangan`, `kode_petugas`, `kode_pemesan`, `tgl_pesan`, `tgl_sewa`, `jam_masuk`, `jam_selesai`, `deposit`) VALUES
('S001', 'L001', 'P001', 'C001', '2019-05-03', '2019-05-04', '08:00:00', '10:00:00', 50000),
('S002', 'L001', 'P001', 'C002', '2019-05-05', '2019-05-06', '08:00:00', '12:00:00', 25000),
('S003', 'L003', 'P005', 'C005', '2019-05-10', '2019-05-12', '10:00:00', '12:00:00', 25000),
('S004', 'L002', 'P002', 'C002', '2019-06-11', '2019-06-12', '10:00:00', '12:00:00', 50000),
('S005', 'L002', 'P003', 'C001', '2019-06-20', '2019-06-21', '08:00:00', '10:00:00', 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `kode_petugas` varchar(10) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `no_hp_petugas` varchar(50) NOT NULL,
  `alamat_petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`kode_petugas`, `nama_petugas`, `no_hp_petugas`, `alamat_petugas`) VALUES
('P001', 'Rusman', '082145634', 'Jl. Cendrawasih No.100'),
('P002', 'Dinda', '081348876', 'Jl. Gagak No.001'),
('P003', 'Sulis', '081200874', 'Jl. Garuda No.003'),
('P004', 'Tomas', '085678655', 'Jl. Cendrawasih No.099'),
('P005', 'Dedy', '085684311', 'Jl. Garuda No.010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`kode_lapangan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kode_bayar`),
  ADD KEY `kode_petugas` (`kode_petugas`),
  ADD KEY `kode_sewa` (`kode_sewa`);

--
-- Indeks untuk tabel `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`kode_pemesan`);

--
-- Indeks untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`kode_sewa`),
  ADD KEY `kode_lapangan` (`kode_lapangan`),
  ADD KEY `kode_petugas` (`kode_petugas`),
  ADD KEY `kode_pemesan` (`kode_pemesan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`kode_petugas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`kode_petugas`) REFERENCES `petugas` (`kode_petugas`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`kode_sewa`) REFERENCES `penyewaan` (`kode_sewa`);

--
-- Ketidakleluasaan untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_ibfk_1` FOREIGN KEY (`kode_lapangan`) REFERENCES `lapangan` (`kode_lapangan`),
  ADD CONSTRAINT `penyewaan_ibfk_2` FOREIGN KEY (`kode_petugas`) REFERENCES `petugas` (`kode_petugas`),
  ADD CONSTRAINT `penyewaan_ibfk_3` FOREIGN KEY (`kode_pemesan`) REFERENCES `pemesan` (`kode_pemesan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
