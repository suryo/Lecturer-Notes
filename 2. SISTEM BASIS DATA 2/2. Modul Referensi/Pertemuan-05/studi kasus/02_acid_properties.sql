-- ============================================================
-- STUDI KASUS: TRANSAKSI & KONKURENSI (Pertemuan 5)
-- File 2: Properti ACID (Atomicity)
-- ============================================================

USE bank_pertemuan5;

-- Skenario Perpindahan Uang (Transfer)
-- 1. Mulai Transaksi
-- 2. Kurangi Saldo Andi (id=1) 100.000
-- 3. Tambah Saldo Budi (id=2) 100.000
-- 4. Jika semua oke: COMMIT (Simpan Permanen)
-- 5. Jika terjadi error: ROLLBACK (Batalkan Semuanya)

-- ============================================================
-- A. CONTOH TRANSAKSI SUKSES (COMMIT)
-- ============================================================

START TRANSACTION;

-- Cek saldo awal Andi & Budi
SELECT * FROM accounts WHERE id_account IN (1, 2);

-- Lakukan Transfer
UPDATE accounts SET saldo = saldo - 100000.00 WHERE id_account = 1;
UPDATE accounts SET saldo = saldo + 100000.00 WHERE id_account = 2;

-- Simpan Secara Permanen
COMMIT;

-- Hasil Akhir: Perubahan disimpan di database.
SELECT * FROM accounts WHERE id_account IN (1, 2);


-- ============================================================
-- B. CONTOH TRANSAKSI GAGAL (ROLLBACK)
-- ============================================================
-- Misal saat transfer, tiba-tiba sistem mati sebelum update kedua.
-- Database harus kembali ke state semula (Atomicity).

START TRANSACTION;

-- Andi mencoba transfer lagi
UPDATE accounts SET saldo = saldo - 50000.00 WHERE id_account = 1;

-- Tiba-tiba terjadi error (Simulasi: kita tidak mau lanjut)
-- Kita batalkan karena ada kesalahan logika atau kegagalan sistem.
ROLLBACK;

-- Cek saldo: Saldo Andi harusnya KEMBALI seperti semula (sebelum START TRANS).
SELECT * FROM accounts WHERE id_account = 1;


-- ============================================================
-- KESIMPULAN:
-- 1. Atomicity: Semua langkah transfer dianggap satu kesatuan.
-- 2. Consistency: Database tetap valid walau transaksi dibatalkan.
-- 3. Durability: Sekali dikomit (COMMIT), data tidak hilang walau crash.
-- ============================================================
