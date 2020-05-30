-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Mei 2020 pada 03.42
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `tabel_admin` (
  `idAdmin` int(11) NOT NULL,
  `namaAdmin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tabel_admin` (`idAdmin`, `namaAdmin`, `email`, `password`) VALUES
('1', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');


CREATE TABLE `tabel_kategori` (
  `idKategori` int(11) NOT NULL,
  `namaKategori` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `penyajian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tabel_kategori` (`idKategori`, `namaKategori`, `keterangan`, `penyajian`) VALUES
(1, 'Makanan' , 'lama', 'piring'),
(2, 'Minuman', 'cepat', 'gelas'),
(3, 'Snack', 'cepat', 'paper bag');



CREATE TABLE `tabel_feedback` (
  `idFeedback` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tabel_feedback` (`idFeedback`, `nama`, `email`, `message`) VALUES
('1', 'pembeli', 'pembeli@gmail.com', 'doain cepat lulus');

CREATE TABLE `tabel_menu` (
  `idMenu` int(11) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tabel_menu` (`idMenu`, `idKategori`, `nama`, `keterangan`, `harga`, `stock`, `path`) VALUES
(1, 1, 'Nasi Goreng teplok','Nasi goreng dengan telor ceplok', 17000, 26, 'makanan/1.jpg'),
(2, 1, 'Mie Ayam BE', 'Mie ayam bukan efatta', 15000, 60, 'makanan/2.jpg'),
(3, 2, 'Es Cendol Dawet', 'Ga pake ketan', 6000, 20, 'minuman/1.jpg'),
(4, 2, 'Es Teh', 'Ga pake ketan', 3000, 22, 'minuman/2.jpg'),
(5, 1, 'Baso bb', 'bulet bulet', 15000, 23, 'makanan/3.jpg'),
(6, 1, 'Ke2pat',  '2pat shayur', 14000, 21, 'makanan/4.jpg'),
(7, 3, 'Tahu BDD',  'bulet digoreng dadakan', 500, 100, 'snack/1.jpg'),
(8, 3, 'Cireng', 'aci digoreng', 2000, 62, 'snack/2.jpg');

CREATE TABLE `tabel_transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `idUser` varchar(11) NOT NULL,
  `daftarMenu` text NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tabel_transaksi` (`idTransaksi`, `idUser`, `daftarMenu`, `tanggal`, `total`) VALUES
(1, '1', '0', '2020-03-04', 123000),
(2, '1', '0', '2020-05-06', 100000);


CREATE TABLE `tabel_cart` (
  `idCart` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `tabel_user` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`idAdmin`);

ALTER TABLE `tabel_kategori`
  ADD PRIMARY KEY (`idKategori`);

ALTER TABLE `tabel_feedback`
  ADD PRIMARY KEY (`idFeedback`);


ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`idMenu`);


ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`idTransaksi`);


ALTER TABLE `tabel_cart`
  ADD PRIMARY KEY (`idCart`);


ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`idUser`);

ALTER TABLE `tabel_feedback`
  MODIFY `idFeedback` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tabel_menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `tabel_transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tabel_cart`
  MODIFY `idCart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `tabel_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
