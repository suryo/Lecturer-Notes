-- ============================================================
-- STUDI KASUS: SISTEM PERBANKAN (Pertemuan 4)
-- File 3: AFTER Trigger (Sinkronisasi Saldo & Audit Log)
-- ============================================================

USE perbankan_db;

-- 1. Trigger untuk SINKRONISASI SALDO setelah transaksi masuk
--    Event: AFTER INSERT on transactions
DELIMITER //

CREATE TRIGGER trg_update_saldo_setelah_transaksi
AFTER INSERT ON transactions
FOR EACH ROW
BEGIN
    -- Update saldo di tabel accounts berdasarkan tipe transaksi
    IF NEW.tipe_transaksi = 'setor' THEN
        UPDATE accounts SET saldo = saldo + NEW.jumlah WHERE id_account = NEW.id_account;
    ELSEIF NEW.tipe_transaksi = 'tarik' THEN
        UPDATE accounts SET saldo = saldo - NEW.jumlah WHERE id_account = NEW.id_account;
    END IF;
END //

DELIMITER ;


-- 2. Trigger untuk AUDIT LOG perubahan status akun
--    Event: AFTER UPDATE on accounts
DELIMITER //

CREATE TRIGGER trg_audit_status_akun
AFTER UPDATE ON accounts
FOR EACH ROW
BEGIN
    -- Hanya catat jika status berubah (OLD vs NEW)
    IF OLD.status <> NEW.status THEN
        INSERT INTO audit_logs (id_account, aksi, keterangan)
        VALUES (
            OLD.id_account, 
            'PERUBAHAN STATUS', 
            CONCAT('Status berubah dari ', OLD.status, ' menjadi ', NEW.status)
        );
    END IF;
END //

DELIMITER ;

-- CARA TEST:
-- a. Kirim Transaksi Setor: 
--    INSERT INTO transactions (id_account, tipe_transaksi, jumlah) VALUES (1, 'setor', 500000);
--    SELECT * FROM accounts WHERE id_account = 1; -- Saldo bertambah 500rb.

-- b. Ubah Status Akun:
--    UPDATE accounts SET status = 'blokir' WHERE id_account = 2;
--    SELECT * FROM audit_logs; -- Akan muncul record audit log.
