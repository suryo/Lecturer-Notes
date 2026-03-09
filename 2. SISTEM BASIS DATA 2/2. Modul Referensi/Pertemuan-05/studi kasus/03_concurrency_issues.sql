-- ============================================================
-- STUDI KASUS: TRANSAKSI & KONKURENSI (Pertemuan 5)
-- File 3: Masalah Konkurensi (Dirty Read, dsb)
-- ============================================================
-- CATATAN:
--   Praktikum ini paling baik dipraktikkan dengan menggunakan
--   DUA WINDOW TERMINAL (SESS-A dan SESS-B) bersamaan.
-- ============================================================

USE bank_pertemuan5;

-- ============================================================
-- A. MASALAH: DIRTY READ
-- ============================================================
-- Terjadi jika SESS-B membaca data yang BELUM DIKOMIT oleh SESS-A.
-- Jika SESS-A ROLLBACK, maka data di SESS-B menjadi tidak ada ("Kotor").
-- ============================================================

-- SESSION A: Skenario Update (Belum Komit)
START TRANSACTION;
UPDATE accounts SET saldo = saldo + 500000.00 WHERE id_account = 1;

-- SESSION B (Window Lain): Baca dengan Isolation Level Rendah
SET SESSION TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
START TRANSACTION;
SELECT * FROM accounts WHERE id_account = 1; 
-- SESS-B akan melihat saldo bertambah (Padahal A belum COMMIT!).
-- Jika SESS-A ROLLBACK, SESS-B akan memiliki data salah.

-- SESSION A (Window Pertama): ROLLBACK sekarang!
ROLLBACK;


-- ============================================================
-- B. MASALAH: NON-REPEATABLE READ
-- ============================================================
-- Terjadi jika baris yang sama dibaca dua kali dalam satu transaksi,
-- tapi memberikan hasil yang berbeda karena ada komit dari sesi lain.
-- ============================================================

-- SESSION B: Baca sekali
SET SESSION TRANSACTION ISOLATION LEVEL READ COMMITTED;
START TRANSACTION;
SELECT * FROM accounts WHERE id_account = 1;  -- Hasil: Misal 500.000

-- SESSION A (Window Pertama): Melakukan update dan COMMIT
UPDATE accounts SET saldo = saldo + 200000.00 WHERE id_account = 1;
COMMIT;

-- SESSION B (Window Kedua): Baca lagi (Masih transaksi yang sama)
SELECT * FROM accounts WHERE id_account = 1;  -- Hasil: SEKARANG 700.000 (Berbeda!)
COMMIT;


-- ============================================================
-- KESIMPULAN KONKURENSI:
-- 1. Dirty Read: Baca data "mentah" yang belum pasti disimpan.
-- 2. Non-repeatable: Baris data berubah di tengah transaksi yang berjalan.
-- 3. Phantom Read: Muncul baris data baru ("Hantu") saat query massal.
-- ============================================================
