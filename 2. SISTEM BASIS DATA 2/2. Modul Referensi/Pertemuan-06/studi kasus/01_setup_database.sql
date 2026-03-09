-- ============================================================
-- STUDI KASUS: REPLIKASI & BACKUP (Pertemuan 6)
-- File 1: Setup Database & Data Sampel (Simulasi Sakila)
-- ============================================================

CREATE DATABASE IF NOT EXISTS sakila_v2;
USE sakila_v2;

-- 1. Tabel Karyawan
CREATE TABLE IF NOT EXISTS staff (
    id_staff INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    cabang VARCHAR(50),
    aktif BOOLEAN DEFAULT TRUE,
    last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 2. Tabel Produk/Film
CREATE TABLE IF NOT EXISTS inventory (
    id_item INT AUTO_INCREMENT PRIMARY KEY,
    nama_item VARCHAR(200) NOT NULL,
    kategori VARCHAR(50),
    harga_sewa DECIMAL(10, 2),
    stok INT DEFAULT 0
);

-- Data Dummy Awal
INSERT INTO staff (nama, email, cabang) VALUES
('Andi Wijaya', 'andi@sakila.com', 'Jakarta Selatan'),
('Siti Aminah', 'siti@sakila.com', 'Bandung Pusat'),
('Budi Santoso', 'budi@sakila.com', 'Surabaya Timur');

INSERT INTO inventory (nama_item, kategori, harga_sewa, stok) VALUES
('Action Camera 4K', 'Elektronik', 50000, 10),
('Laptop Professional', 'Elektronik', 150000, 5),
('Projector HD', 'Aksesoris', 75000, 8),
('Gimbal Stabilizer', 'Aksesoris', 45000, 12);

-- Tampilkan Data
SELECT * FROM staff;
SELECT * FROM inventory;
