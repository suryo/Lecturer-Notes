-- ============================================================
-- STUDI KASUS: TOKO ONLINE
-- File 1: Create Table
-- ============================================================

CREATE DATABASE IF NOT EXISTS toko_online;
USE toko_online;

-- Tabel Kategori Produk
CREATE TABLE kategori (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Pelanggan
CREATE TABLE pelanggan (
    id_pelanggan INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(150) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    no_telepon VARCHAR(20),
    alamat TEXT,
    kota VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Produk
CREATE TABLE produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    id_kategori INT NOT NULL,
    nama_produk VARCHAR(200) NOT NULL,
    deskripsi TEXT,
    harga DECIMAL(15, 2) NOT NULL,
    stok INT NOT NULL DEFAULT 0,
    berat_gram INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori)
);

-- Tabel Pesanan
CREATE TABLE pesanan (
    id_pesanan INT AUTO_INCREMENT PRIMARY KEY,
    id_pelanggan INT NOT NULL,
    tanggal_pesanan DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status ENUM('menunggu', 'diproses', 'dikirim', 'selesai', 'dibatalkan') DEFAULT 'menunggu',
    total_harga DECIMAL(15, 2) NOT NULL DEFAULT 0,
    alamat_pengiriman TEXT,
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan)
);

-- Tabel Detail Pesanan
CREATE TABLE detail_pesanan (
    id_detail INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT NOT NULL,
    id_produk INT NOT NULL,
    jumlah INT NOT NULL,
    harga_satuan DECIMAL(15, 2) NOT NULL,
    subtotal DECIMAL(15, 2) GENERATED ALWAYS AS (jumlah * harga_satuan) STORED,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id_pesanan),
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);
