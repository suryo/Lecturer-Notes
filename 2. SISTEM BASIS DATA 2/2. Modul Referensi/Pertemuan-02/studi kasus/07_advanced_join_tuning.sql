-- ============================================================
-- STUDI KASUS: TOKO ONLINE
-- File 7: Optimisasi Join (Nested Loop & Index)
-- ============================================================
-- Konsep:
--   MySQL (InnoDB) biasanya menggunakan Nested Loop Join.
--   Optimizer akan memilih satu tabel sebagai "Outer Table" 
--   dan tabel lainnya sebagai "Inner Table".
--   Penting agar kolom yang di-JOIN memiliki INDEX agar kueri cepat.
-- ============================================================

USE toko_online;

-- ============================================================
-- A. KASUS 1: JOIN TANPA INDEX PADA KOLOM FOREIGN KEY
-- ============================================================
-- MySQL harus melakukan Scan pada kedua tabel (Sangat Lambat).
-- (Biasanya kolom ID sudah terindeks otomatis oleh FK/PK).
-- ============================================================

-- Kita buat contoh kueri (EXPLAIN) yang menggabungkan banyak tabel:
EXPLAIN
SELECT
    p.id_pesanan,
    pl.nama AS nama_pelanggan,
    pr.nama_produk,
    dp.jumlah,
    dp.subtotal
FROM pesanan p
JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan
JOIN detail_pesanan dp ON p.id_pesanan = dp.id_pesanan
JOIN produk pr ON dp.id_produk = pr.id_produk
WHERE p.status = 'selesai';

-- Perhatikan kolom 'type' = ref atau eq_ref pada setiap langkah.
-- Itu tandanya JOIN memanfaatkan Index antar tabel (Sangat Cepat).


-- ============================================================
-- B. KASUS 2: JOIN PADA KOLOM NON-INDEX (Buruk)
-- ============================================================
-- Misal gabung pelanggan ke pesanan berdasarkan alamat (Hanya simulasi).
-- Karena alamat_pengiriman tidak memiliki index, optimizer terpaksa
-- melakukan scan berat (Full Table Scan).
-- ============================================================

EXPLAIN
SELECT * 
FROM pesanan p
JOIN pelanggan pl ON p.alamat_pengiriman = pl.alamat;

-- Di sini 'type' = ALL pada tabel p (outer scan) dan ALL pada pl.
-- Ini adalah NESTED LOOP FULL SCAN (Sangat Bahaya untuk Tabel Besar).


-- ============================================================
-- C. KASUS 3: URUTAN JOIN (JOIN ORDER)
-- ============================================================
-- Optimizer MySQL melakukan penentuan urutan join (Join Order).
-- Umumnya, tabel dengan "filter" terkuat (hasil scan terkecil)
-- akan dipilih sebagai tabel pertama (Driving Table).
-- ============================================================

-- Kueri di bawah ini memiliki filter pada 'kota' Jakarta:
-- Jika 'kota' ada index, kueri ini sangat cepat.
EXPLAIN
SELECT * 
FROM pesanan p
JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan
WHERE pl.kota = 'Jakarta';

-- Optimizer akan scan 'pl' dulu (Jakarta), lalu cari 'p' yang ID-nya sama.


-- ============================================================
-- KESIMPULAN PRAKTIKUM:
-- 1. Selalu buat INDEX pada kolom Foreign Key (FK).
-- 2. Pastikan kolom yang bergabung memiliki tipe data yang SAMA.
-- 3. Periksa EXPLAIN untuk memastikan tidak ada 'type' = ALL pada join.
-- ============================================================
