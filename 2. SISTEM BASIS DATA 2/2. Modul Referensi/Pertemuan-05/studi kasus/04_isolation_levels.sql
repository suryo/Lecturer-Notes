-- ============================================================
-- STUDI KASUS: TRANSAKSI & KONKURENSI (Pertemuan 5)
-- File 4: Setting Isolation Levels (MySQL InnoDB)
-- ============================================================

USE bank_pertemuan5;

-- ============================================================
-- A. CARA MELIHAT ISOLATION LEVEL SAAT INI
-- ============================================================

-- Melihat setting global
SELECT @@GLOBAL.transaction_isolation;

-- Melihat setting sesi (Session) khusus window ini
SELECT @@SESSION.transaction_isolation;

-- Default MySQL InnoDB: REPEATABLE READ.


-- ============================================================
-- B. MENGUBAH ISOLATION LEVEL (Berdasarkan Kebutuhan)
-- ============================================================

-- 1. Level Paling Rendah (Bisa Dirty Read)
--    Biasanya untuk laporan cepat yang tidak butuh presisi 100%.
SET SESSION TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;

-- 2. Level Standar (Mencegah Dirty Read)
--    Bagus untuk performa tinggi, tapi bisa terjadi Non-repeatable.
SET SESSION TRANSACTION ISOLATION LEVEL READ COMMITTED;

-- 3. Level Konsisten (Mencegah Non-repeatable)
--    Setting default terbaik untuk integritas data.
SET SESSION TRANSACTION ISOLATION LEVEL REPEATABLE READ;

-- 4. Level Paling Tinggi (Sesuai Namanya: Serial/Antre)
--    Mencegah semua masalah, tapi sangat lambat (banyak lock).
--    Hanya jika benar-benar butuh presisi tinggi sekali.
SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;

-- Tampilkan perubahan setting
SELECT @@SESSION.transaction_isolation;


-- ============================================================
-- KESIMPULAN ISOLASI:
-- 1. READ UNCOMMITTED: Cepat, rawan kesalahan data.
-- 2. READ COMMITTED: Menyeimbangkan performa & integritas.
-- 3. REPEATABLE READ: Sangat aman, performa baik.
-- 4. SERIALIZABLE: Paling aman, performa buruk (Lock masif).
-- ============================================================
