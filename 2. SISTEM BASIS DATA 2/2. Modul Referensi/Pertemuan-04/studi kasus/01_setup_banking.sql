-- ============================================================
-- STUDI KASUS: SISTEM PERBANKAN (Pertemuan 4)
-- File 1: Setup Database & Tabel Dasar
-- ============================================================

CREATE DATABASE IF NOT EXISTS perbankan_db;
USE perbankan_db;

-- 1. Tabel Akun Nasabah
CREATE TABLE IF NOT EXISTS accounts (
    id_account INT AUTO_INCREMENT PRIMARY KEY,
    nama_nasabah VARCHAR(150) NOT NULL,
    saldo DECIMAL(15, 2) NOT NULL DEFAULT 0,
    status ENUM('aktif', 'blokir', 'tutup') DEFAULT 'aktif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Tabel Histori Transaksi
CREATE TABLE IF NOT EXISTS transactions (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    id_account INT,
    tipe_transaksi ENUM('setor', 'tarik') NOT NULL,
    jumlah DECIMAL(15, 2) NOT NULL,
    waktu_transaksi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_account) REFERENCES accounts(id_account)
);

-- 3. Tabel Audit Log (Untuk mencatat perubahan status akun)
CREATE TABLE IF NOT EXISTS audit_logs (
    id_log INT AUTO_INCREMENT PRIMARY KEY,
    id_account INT,
    aksi VARCHAR(50),
    keterangan TEXT,
    waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Tabel Pembersihan Data Expired (Hanya contoh simulasi)
CREATE TABLE IF NOT EXISTS temporary_sessions (
    id_session INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    token VARCHAR(100),
    expired_at DATETIME
);

-- Data Dummy Awal
INSERT INTO accounts (nama_nasabah, saldo) VALUES
('Andi Setiawan', 5000000),
('Budi Santoso', 1500000),
('Citra Dewi', 10000000);

INSERT INTO temporary_sessions (user_id, token, expired_at) VALUES
(1, 'token_abc_123', '2025-01-01 10:00:00'),
(2, 'token_xyz_456', NOW() - INTERVAL 1 DAY); -- Sudah expired
