-- ============================================================
-- STUDI KASUS: TOKO ONLINE
-- File 5: Covering Index (Index Only Scan)
-- ============================================================
-- Konsep:
--   Covering Index adalah indeks yang memuat SEMUA kolom yang 
--   dibutuhkan oleh kueri (di SELECT, WHERE, JOIN, ORDER BY).
--   DBMS tidak perlu mengakses baris data fisik di disk (Data Page),
--   cukup membaca dari struktur Indeks saja (Index Only Scan).
-- ============================================================

USE toko_online;

-- ============================================================
-- A. SKENARIO 1: TANPA COVERING INDEX
-- ============================================================
-- Kita cari produk berdasarkan harga, tapi kita minta SELECT *.
-- MySQL harus: 
-- 1. Baca Index (idx_btree_harga) untuk cari pointer/ID.
-- 2. "Lompat" ke tabel fisik (Random I/O) untuk ambil kolom lain.
-- ============================================================

EXPLAIN
SELECT * 
FROM produk 
WHERE harga BETWEEN 500000 AND 1000000;

-- Perhatikan kolom 'Extra' pada hasil di atas:
-- Biasanya berisi "Using where".


-- ============================================================
-- B. SKENARIO 2: DENGAN COVERING INDEX (Implicit)
-- ============================================================
-- Kita hanya minta kolom yang sudah ada di indeks (harga) 
-- dan kolom Primary Key (id_produk).
-- InnoDB selalu menyertakan PK di setiap Secondary Index.
-- ============================================================

EXPLAIN
SELECT id_produk, harga 
FROM produk 
WHERE harga BETWEEN 500000 AND 1000000;

-- Perhatikan kolom 'Extra' sekarang:
-- "Using index"  →  Artinya terjadi INDEX ONLY SCAN. Sangat cepat!


-- ============================================================
-- C. SKENARIO 3: MEMBUAT EXPLICIT COVERING INDEX
-- ============================================================
-- Kadang kita sering mencari produk berdasarkan kategori 
-- dan hanya butuh nama_produk serta harganya.
-- Kita buat Composite Index untuk "menutupi" kueri ini.
-- ============================================================

-- Awalnya: Hapus index lama jika ada (opsional) atau buat baru
CREATE INDEX idx_kategori_nama_harga 
    ON produk (id_kategori, nama_produk, harga);

-- Kueri berikut sekarang menjadi COVERED:
EXPLAIN
SELECT nama_produk, harga 
FROM produk 
WHERE id_kategori = 1 
  AND harga > 1000000;

-- Cek kolom 'Extra': "Using index".
-- Optimizer tidak menyentuh tabel fisik sama sekali.

-- ============================================================
-- KESIMPULAN PRAKTIKUM:
-- 1. Covering Index menghindari "Bookmark Lookup" atau "Row ID Lookup".
-- 2. Sangat efektif untuk mempercepat kueri pada tabel dengan jutaan baris.
-- 3. Inilah alasan utama mengapa "SELECT *" sangat dilarang di produksi.
-- ============================================================
