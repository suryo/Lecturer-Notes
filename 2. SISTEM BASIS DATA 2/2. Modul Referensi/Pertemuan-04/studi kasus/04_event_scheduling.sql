-- ============================================================
-- STUDI KASUS: SISTEM PERBANKAN (Pertemuan 4)
-- File 4: Event Scheduling (Materi: Pembersihan Data)
-- ============================================================

USE perbankan_db;

-- 1. Mengaktifkan Global Event Scheduler (Harus ON di server)
SET GLOBAL event_scheduler = ON;

-- 2. Event: Hapus Sesi Expired SETIAP JAM
--    Tujuan: Menghapus data perbankan sensitif yang sudah kadaluarsa rutin.
DELIMITER //

CREATE EVENT evt_hapus_sesi_expired
ON SCHEDULE EVERY 1 HOUR
STARTS (CURRENT_TIMESTAMP)
COMMENT 'Menghapus token sesi yang sudah lewat waktu expired_at'
DO
BEGIN
    DELETE FROM temporary_sessions 
    WHERE expired_at < NOW();
    
    -- Catat log (opsional) jika ada pembersihan rutin
    INSERT INTO audit_logs (id_account, aksi, keterangan)
    VALUES (NULL, 'PEMBERSIHAN_SESI', CONCAT('Penghapusan otomatis pada ', NOW()));
END //

DELIMITER ;


-- 3. Event: Reset Status Blokir (Simulasi Setiap Hari)
--    Contoh: Akun blokir otomatis dibuka setelah 24 jam (Hanya demo).
DELIMITER //

CREATE EVENT evt_reset_blokir_harian
ON SCHEDULE EVERY 1 DAY
STARTS (CURRENT_TIMESTAMP + INTERVAL 1 DAY)
DO
BEGIN
    UPDATE accounts 
    SET status = 'aktif' 
    WHERE status = 'blokir';
END //

DELIMITER ;


-- CARA MELIHAT DAFTAR EVENT:
-- SHOW EVENTS;
-- SELECT * FROM information_schema.events;

-- CARA MENGHAPUS/NONAKTIFKAN EVENT:
-- DROP EVENT evt_hapus_sesi_expired;
-- ALTER EVENT evt_hapus_sesi_expired DISABLE;
