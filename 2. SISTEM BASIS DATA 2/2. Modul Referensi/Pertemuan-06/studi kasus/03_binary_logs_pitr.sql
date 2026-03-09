-- ============================================================
-- STUDI KASUS: REPLIKASI & BACKUP (Pertemuan 6)
-- File 3: Binary Logs & Point-In-Time Recovery (PITR)
-- ============================================================
-- CATATAN:
--   Binary Log (Binlog) adalah file yang mencatat setiap
--   perubahan data (INSERT, UPDATE, DELETE).
--   Binlog sangat penting untuk REPLIKASI dan PITR.
-- ============================================================

USE sakila_v2;

-- 1. CEK APAKAH BINARY LOG SUDAH AKTIF (ON)?
SHOW VARIABLES LIKE 'log_bin';


-- 2. MELIHAT DAFTAR FILE BINARY LOG TERBARU
SHOW BINARY LOGS;


-- 3. MELIHAT ISI BINARY LOG TERAKHIR (EVENT APA SAJA)
--    Gunakan kueri ini untuk melihat kejadian (History Perubahan)
SHOW BINLOG EVENTS;


-- ============================================================
-- SKENARIO BENCANA: "KEMBALIKAN KE JAM 14:00"
-- ============================================================
-- Masalah: Jam 14:00 Andi menghapus tabel penting secara permanen.
-- Solusi PITR (Point-In-Time Recovery):
-- 1. Restore Full Backup dari malam sebelumnya (Backup Jam 00:00).
-- 2. "Mainkan ulang" Binary Log dari jam 00:01 sampai jam 13:59.
-- 3. BERHENTI sebelum kueri DROP TABLE (Jam 14:00) dieksekusi.
-- ============================================================

/*
-- SIMULASI COMMAND (MELALUI CMD/SHELL):
-- Gunakan mysqlbinlog untuk membongkar binlog menjadi kueri SQL lagi.

-- 1. Cari titik waktu atau posisi (Pos) sebelum bencana:
mysqlbinlog --stop-datetime="2025-01-10 13:59:59" \
  mysql-bin.000001 \
  mysql-bin.000002 \
  > restore_pitr.sql

-- 2. Jalankan kueri restore_pitr.sql ke database yang baru di-restore:
mysql -u root -p sakila_v2 < restore_pitr.sql
*/

-- ============================================================
-- KESIMPULAN PITR:
-- 1. Memungkinkan kita "memutar waktu" database ke detik spesifik.
-- 2. Sangat efektif untuk recovery dari kesalahan manusia (Accidental Drop).
-- 3. Membutuhkan penyimpanan tambahan di disk untuk menyimpan file binlog.
-- ============================================================
