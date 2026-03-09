-- ============================================================
-- STUDI KASUS: TRANSAKSI & KONKURENSI (Pertemuan 5)
-- File 1: Setup Database & Tabel Dasar
-- ============================================================

CREATE DATABASE IF NOT EXISTS bank_pertemuan5;
USE bank_pertemuan5;

-- 1. Tabel Akun Perbankan
CREATE TABLE IF NOT EXISTS accounts (
    id_account INT AUTO_INCREMENT PRIMARY KEY,
    nama_nasabah VARCHAR(150) NOT NULL,
    saldo DECIMAL(15, 2) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Data Dummy Awal
-- Note: Pastikan AUTO_INCREMENT dimulai dari 1 agar ID konsisten.
TRUNCATE TABLE accounts;
INSERT INTO accounts (nama_nasabah, saldo) VALUES
('Andi', 500000.00),
('Budi', 200000.00),
('Citra', 1000000.00);

-- Menampilkan Data Awal
SELECT * FROM accounts;
