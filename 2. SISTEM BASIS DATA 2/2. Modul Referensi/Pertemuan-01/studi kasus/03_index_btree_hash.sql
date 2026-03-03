-- ============================================================
-- STUDI KASUS: TOKO ONLINE
-- File 3: Penggunaan Index B-Tree dan Hash
-- ============================================================
-- CATATAN:
--   - B-Tree Index : Default di MySQL/MariaDB, cocok untuk query
--                    RANGE (>, <, BETWEEN, LIKE 'abc%').
--   - Hash Index   : Tersedia di Memory Engine atau InnoDB (Adaptive).
--                    Hanya cocok untuk perbandingan EQUALITY (=, IN).
-- ============================================================

USE toko_online;

-- ============================================================
-- A. INDEX B-TREE (Default)
-- ============================================================

-- 1. Index pada kolom 'harga' di tabel produk
--    Digunakan untuk query pencarian rentang harga (BETWEEN, >, <)
CREATE INDEX idx_btree_harga
    ON produk (harga)
    USING BTREE;

-- 2. Index pada kolom 'tanggal_pesanan' di tabel pesanan
--    Digunakan untuk query laporan berdasarkan rentang tanggal
CREATE INDEX idx_btree_tanggal
    ON pesanan (tanggal_pesanan)
    USING BTREE;

-- 3. Index Komposit B-Tree: status + tanggal
--    Berguna untuk query: "Tampilkan pesanan berstatus 'selesai' bulan Januari"
CREATE INDEX idx_btree_status_tanggal
    ON pesanan (status, tanggal_pesanan)
    USING BTREE;

-- 4. Index pada nama_produk untuk pencarian dengan LIKE (prefix)
CREATE INDEX idx_btree_nama_produk
    ON produk (nama_produk)
    USING BTREE;


-- ============================================================
-- B. INDEX HASH (Simulasi dengan COMMENT penjelasan)
-- ============================================================
-- CATATAN PENTING:
-- MySQL InnoDB tidak mendukung pembuatan Hash Index secara eksplisit.
-- InnoDB menggunakan "Adaptive Hash Index" secara otomatis di internal.
-- Hash Index eksplisit hanya tersedia pada ENGINE=MEMORY.
--
-- Berikut simulasi tabel MEMORY untuk demonstrasi Hash Index:

-- Tabel sementara di memori untuk cache lookup pelanggan via email
CREATE TABLE IF NOT EXISTS cache_pelanggan (
    id_pelanggan INT NOT NULL,
    email        VARCHAR(100) NOT NULL,
    nama         VARCHAR(150),
    PRIMARY KEY (id_pelanggan),
    INDEX idx_hash_email (email) USING HASH   -- Hash Index eksplisit
) ENGINE=MEMORY;

-- Isi tabel cache dari data pelanggan
INSERT INTO cache_pelanggan (id_pelanggan, email, nama)
SELECT id_pelanggan, email, nama FROM pelanggan;

-- Tabel Cache Produk (menggunakan MEMORY + Hash)
CREATE TABLE IF NOT EXISTS cache_produk (
    id_produk  INT NOT NULL,
    nama_produk VARCHAR(200),
    harga      DECIMAL(15,2),
    PRIMARY KEY (id_produk),
    INDEX idx_hash_nama (nama_produk) USING HASH  -- Hash Index untuk exact-match
) ENGINE=MEMORY;

INSERT INTO cache_produk (id_produk, nama_produk, harga)
SELECT id_produk, nama_produk, harga FROM produk;


-- ============================================================
-- C. CONTOH QUERY YANG MEMANFAATKAN INDEX
-- ============================================================

-- [B-Tree] Pencarian produk berdasarkan RENTANG harga
-- Query ini akan memanfaatkan idx_btree_harga
SELECT id_produk, nama_produk, harga
FROM produk
WHERE harga BETWEEN 100000 AND 500000
ORDER BY harga ASC;

-- [B-Tree] Laporan pesanan berdasarkan tanggal tertentu
-- Query ini akan memanfaatkan idx_btree_tanggal
SELECT id_pesanan, id_pelanggan, tanggal_pesanan, status, total_harga
FROM pesanan
WHERE tanggal_pesanan BETWEEN '2025-01-01' AND '2025-01-31';

-- [B-Tree] Filter status + rentang tanggal (Index Komposit)
SELECT *
FROM pesanan
WHERE status = 'selesai'
  AND tanggal_pesanan >= '2025-01-01';

-- [Hash] Pencarian pelanggan dengan exact match email
-- Hash index sangat cepat untuk pencarian dengan operator =
SELECT * FROM cache_pelanggan WHERE email = 'budi@email.com';

-- [Hash] Pencarian produk dengan nama persis
SELECT * FROM cache_produk WHERE nama_produk = 'Keyboard Mechanical';


-- ============================================================
-- D. MELIHAT DAFTAR INDEX YANG SUDAH ADA
-- ============================================================
SHOW INDEX FROM produk;
SHOW INDEX FROM pesanan;
SHOW INDEX FROM cache_pelanggan;
SHOW INDEX FROM cache_produk;
