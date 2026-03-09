-- ============================================================
-- STUDI KASUS: TOKO ONLINE
-- File 4: Penggunaan Perintah EXPLAIN
-- ============================================================
-- EXPLAIN digunakan untuk melihat rencana eksekusi query (Query Plan)
-- yang dibuat oleh MySQL Query Optimizer.
--
-- Kolom penting pada output EXPLAIN:
--   id          : Urutan langkah
--   select_type : Jenis query (SIMPLE, SUBQUERY, JOIN, dsb)
--   table        : Tabel yang diakses
--   type         : Metode akses (ALL=scan penuh, ref=pakai index, dsb)
--   possible_keys: Index yang MUNGKIN digunakan
--   key          : Index yang BENAR-BENAR digunakan optimizer
--   rows         : Estimasi baris yang discan
--   Extra        : Info tambahan (Using index, Using where, dsb)
-- ============================================================

USE toko_online;

-- ============================================================
-- STUDI KASUS 1: Query TANPA Index (Full Table Scan)
-- ============================================================
-- Kolom 'no_telepon' tidak memiliki index.
-- type = ALL  →  Optimizer melakukan Full Table Scan (buruk untuk tabel besar)
-- key  = NULL →  Tidak ada index yang digunakan

EXPLAIN
SELECT * FROM pelanggan
WHERE no_telepon = '082345678901';


-- ============================================================
-- STUDI KASUS 2: Query DENGAN Index (B-Tree pada harga)
-- ============================================================
-- Kolom 'harga' sudah diberi index B-Tree (idx_btree_harga).
-- type = range  →  Optimizer menggunakan index untuk rentang nilai
-- key  = idx_btree_harga  →  Index aktif digunakan

EXPLAIN
SELECT id_produk, nama_produk, harga
FROM produk
WHERE harga BETWEEN 100000 AND 500000;


-- ============================================================
-- STUDI KASUS 3: Primary Key Lookup (Sangat Cepat)
-- ============================================================
-- Primary Key selalu menggunakan Clustered Index (B-Tree).
-- type = const  →  Paling optimal, hanya 1 baris yang diakses

EXPLAIN
SELECT * FROM pesanan
WHERE id_pesanan = 3;


-- ============================================================
-- STUDI KASUS 4: Query JOIN antar Tabel
-- ============================================================
-- Melihat bagaimana optimizer menggabungkan tabel pelanggan dan pesanan.
-- Perhatikan kolom 'type' dan 'key' pada setiap baris.

EXPLAIN
SELECT
    p.id_pesanan,
    pl.nama        AS nama_pelanggan,
    p.tanggal_pesanan,
    p.status,
    p.total_harga
FROM pesanan p
JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan
WHERE p.status = 'selesai';


-- ============================================================
-- STUDI KASUS 5: Subquery dan Efisiensinya
-- ============================================================
-- Melihat apakah subquery dieksekusi sekali atau berulang kali.
-- select_type = SUBQUERY  →  dieksekusi sekali
-- select_type = DEPENDENT SUBQUERY  →  dieksekusi tiap baris (lambat)

EXPLAIN
SELECT nama_produk, harga
FROM produk
WHERE harga > (SELECT AVG(harga) FROM produk);


-- ============================================================
-- STUDI KASUS 6: EXPLAIN FORMAT JSON (detail lebih lengkap)
-- ============================================================
-- Menampilkan output dalam format JSON yang lebih detail,
-- termasuk biaya (cost) perkiraan setiap langkah eksekusi.

EXPLAIN FORMAT=JSON
SELECT
    dp.id_pesanan,
    pr.nama_produk,
    dp.jumlah,
    dp.harga_satuan,
    dp.subtotal
FROM detail_pesanan dp
JOIN produk pr ON dp.id_produk = pr.id_produk
WHERE dp.jumlah > 1;


-- ============================================================
-- STUDI KASUS 7: EXPLAIN ANALYZE (Eksekusi nyata + statistik)
-- ============================================================
-- Tersedia di MySQL 8.0+ / MariaDB 10.9+.
-- Menjalankan query sungguhan dan melaporkan waktu aktual.

EXPLAIN ANALYZE
SELECT
    k.nama_kategori,
    COUNT(pr.id_produk) AS jumlah_produk,
    AVG(pr.harga)       AS rata_harga
FROM produk pr
JOIN kategori k ON pr.id_kategori = k.id_kategori
GROUP BY k.nama_kategori
ORDER BY rata_harga DESC;


-- ============================================================
-- STUDI KASUS 8: Perbandingan SEBELUM vs SESUDAH Index
-- ============================================================

-- SEBELUM: Tanpa index pada kolom kota (Full Table Scan)
EXPLAIN
SELECT * FROM pelanggan WHERE kota = 'Jakarta';

-- Tambahkan Index
CREATE INDEX idx_btree_kota ON pelanggan (kota) USING BTREE;

-- SESUDAH: Optimizer kini menggunakan index (type = ref)
EXPLAIN
SELECT * FROM pelanggan WHERE kota = 'Jakarta';
