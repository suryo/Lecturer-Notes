-- ============================================================
-- STUDI KASUS: TOKO ONLINE
-- File 6: Sargability (Search Argumentable Query)
-- ============================================================
-- Konsep:
--   Sargable adalah kueri yang menggunakan operator yang 
--   DAPAT memanfaatkan indeks (misal: =, >, <, BETWEEN, LIKE 'abc%').
--   Non-Sargable adalah kueri yang MEMAKSA database melakukan scan
--   karena kuerinya memodifikasi kolom di dalam kueri (fungsi, 
--   manipulasi string, misal: YEAR(tgl), LIKE '%abc').
-- ============================================================

USE toko_online;

-- ============================================================
-- A. KASUS 1: FUNGSI PADA KOLOM (NON-SARGABLE)
-- ============================================================
-- Kita cari pesanan tahun 2025.
-- Optimizer tidak bisa tahu tahun berapa di INDEX B-Tree tanpa
-- mengevaluasi YEAR() pada setiap baris → FULL TABLE SCAN.
-- ============================================================

-- Misal, kita sudah punya index pada tanggal_pesanan di file 03:
-- CREATE INDEX idx_btree_tanggal ON pesanan (tanggal_pesanan);

EXPLAIN
SELECT * 
FROM pesanan 
WHERE YEAR(tanggal_pesanan) = 2025;

-- Perhatikan 'type' = ALL  →  Full Table Scan (Sangat Lambat).


-- ============================================================
-- B. KASUS 2: PERBAIKAN SARGABLE (SARGABLE)
-- ============================================================
-- Kita gunakan operator BETWEEN / RENTANG agar optimizer bisa 
-- langsung lompat ke posisi data di B-Tree.
-- ============================================================

EXPLAIN
SELECT * 
FROM pesanan 
WHERE tanggal_pesanan >= '2025-01-01' 
  AND tanggal_pesanan <= '2025-12-31';

-- Perhatikan 'type' = range  →  Index digunakan secara optimal.


-- ============================================================
-- C. KASUS 3: PENGGUNAAN LIKE (PREFIX vs SUFFIX)
-- ============================================================
-- LIKE 'Laptop%' → SARGABLE (bisa cari urutan huruf di depan).
-- LIKE '%Laptop' → NON-SARGABLE (harus baca semua teks).
-- ============================================================

-- 1. Sargable (Mencari produk yang berawalan 'Laptop')
EXPLAIN
SELECT * FROM produk WHERE nama_produk LIKE 'Laptop%';

-- 2. Non-Sargable (Mencari produk yang mengandung 'Smartphone' di mana saja)
EXPLAIN
SELECT * FROM produk WHERE nama_produk LIKE '%Smartphone%';


-- ============================================================
-- D. KASUS 4: MANIPULASI STRING PADA KOLOM
-- ============================================================
-- Misal, cari kota Jakarta (tanpa peduli case sensitive, UPPER()).
-- Menggunakan UPPER() di kolom menonaktifkan index.
-- ============================================================

-- Non-Sargable (Indeks pada 'kota' tidak dipakai)
EXPLAIN
SELECT * FROM pelanggan WHERE UPPER(kota) = 'JAKARTA';

-- Sargable (Cukup bandingkan string langsung, default MySQL case-insensitive)
EXPLAIN
SELECT * FROM pelanggan WHERE kota = 'Jakarta';


-- ============================================================
-- KESIMPULAN PRAKTIKUM:
-- 1. Jangan letakkan fungsi pada kolom database di WHERE clause.
-- 2. Letakkan transformasi data pada sisi argumen (konstanta).
-- 3. Hindari penggunaan wildcard '%' di depan string (LIKE '%...').
-- ============================================================
