-- ============================================================
-- STUDI KASUS: TOKO ONLINE
-- File 8: Clustered vs Non-Clustered Index (InnoDB)
-- ============================================================
-- Konsep:
--   Clustered Index:
--     - Data tabel AKTUAL disimpan dalam urutan alfabet/ID fisik.
--     - Di InnoDB, PK (Primary Key) otomatis menjadi Clustered index.
--     - Hanya bisa ada SATU per tabel.
--
--   Non-Clustered Index (Secondary Index):
--     - Struktur pencarian TERPISAH (seperti indeks buku).
--     - Berisi nilai kolom indeks + pointer (PK) ke lokasi data fisik.
-- ============================================================

USE toko_online;

-- ============================================================
-- A. KASUS 1: CLUSTERED INDEX LOOKUP (Primary Key)
-- ============================================================
-- MySQL akan langsung mencari 'titik' data di struktur pohon (B-Tree)
-- dan mendapatkan SEMUA kolom di sana (id_produk, nama, harga, stok, dsb).
-- Tidak butuh lompatan tambahan I/O.
-- ============================================================

EXPLAIN
SELECT * 
FROM produk 
WHERE id_produk = 5;

-- 'type' = const (Lookup langsung ke clustered index, sangat cepat).


-- ============================================================
-- B. KASUS 2: NON-CLUSTERED INDEX LOOKUP (Secondary Index)
-- ============================================================
-- MySQL mencari 'harga' di index (idx_btree_harga).
-- Setelah ketemu ID produk-nya, MySQL harus "kembali mencari"
-- ke Clustered index (PK) untuk ambil kolom lain (nama_produk, dsb).
-- Ini disebut BOOKMARK LOOKUP / ROW LOOKUP.
-- ============================================================

EXPLAIN
SELECT nama_produk, stok 
FROM produk 
WHERE harga = 7500000;

-- 'type' = ref.
-- MySQL baca index harga dulu, ketemu ID, lalu tarik nama & stok.


-- ============================================================
-- C. KASUS 3: EFEK PADA INSERT & UPDATE (Performance Trade-off)
-- ============================================================
-- Diskusi/Simulasi:
--   - Menambah index mempercepat SELECT (Membaca).
--   - Menambah index MEMPERLAMBAT INSERT, UPDATE, DELETE (Menulis).
--   - Kenapa? Karena Database harus mengupdate SEMUA tabel index yang ada.
-- ============================================================

-- Mari kita lihat daftar index di tabel pesanan:
SHOW INDEX FROM pesanan;

-- Jika kita menambah 10 index lagi ke tabel pesanan:
-- CREATE INDEX idx_a ON pesanan(status);
-- CREATE INDEX idx_b ON pesanan(total_harga);
-- ...
-- Maka setiap kali 1 baris pesanan dimasukkan (INSERT), 
-- MySQL harus menulis ke 1 tabel asli + memperbarui 10 struktur indeks terpisah di disk.


-- ============================================================
-- KESIMPULAN PRAKTIKUM:
-- 1. Index mempercepat pembacaan data (SELECT).
-- 2. Index memperlambat penulisan data (INSERT, UPDATE).
-- 3. Gunakan Index secara bijak, hanya pada kolom yang sering 
--    dipakai di WHERE, JOIN, atau ORDER BY.
-- ============================================================
