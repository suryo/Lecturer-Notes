-- ============================================================
-- STUDI KASUS: TOKO ONLINE (Pertemuan 3)
-- File 1: Setup Database & Tabel Dasar
-- ============================================================

CREATE DATABASE IF NOT EXISTS toko_online_v3;
USE toko_online_v3;

-- 1. Tabel Produk
CREATE TABLE IF NOT EXISTS produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(200) NOT NULL,
    harga DECIMAL(15, 2) NOT NULL,
    stok INT NOT NULL DEFAULT 0,
    kategori VARCHAR(50)
);

-- 2. Tabel Pesanan/Transaksi
CREATE TABLE IF NOT EXISTS pesanan (
    id_pesanan INT AUTO_INCREMENT PRIMARY KEY,
    tanggal_pesanan TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_bayar DECIMAL(15, 2) DEFAULT 0,
    status ENUM('pending', 'lunas', 'batal') DEFAULT 'pending'
);

-- 3. Tabel Detail Pesanan
CREATE TABLE IF NOT EXISTS detail_pesanan (
    id_detail INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT,
    id_produk INT,
    jumlah INT,
    harga_satuan DECIMAL(15, 2),
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id_pesanan),
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);

-- 4. Tabel Log Perubahan Stok (untuk audit)
CREATE TABLE IF NOT EXISTS log_stok (
    id_log INT AUTO_INCREMENT PRIMARY KEY,
    id_produk INT,
    stok_sebelum INT,
    stok_sesudah INT,
    keterangan VARCHAR(255),
    waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Data Dummy Awal
INSERT INTO produk (nama_produk, harga, stok, kategori) VALUES
('Laptop ASUS', 8000000, 10, 'Elektronik'),
('Smartphone Samsung', 4500000, 25, 'Elektronik'),
('Mouse Wireless', 150000, 50, 'Aksesoris'),
('Keyboard Mechanical', 750000, 15, 'Aksesoris'),
('Monitor 24 Inch', 2100000, 8, 'Elektronik');
