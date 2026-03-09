-- ============================================================
-- STUDI KASUS: SISTEM PERBANKAN (Pertemuan 4)
-- File 2: BEFORE Trigger (Validasi Saldo & Akun Aktif)
-- ============================================================

USE perbankan_db;

-- 1. Trigger untuk MENCEGAH penarikan jika saldo kurang
--    Event: BEFORE INSERT on transactions
DELIMITER //

CREATE TRIGGER trg_cek_saldo_sebelum_tarik
BEFORE INSERT ON transactions
FOR EACH ROW
BEGIN
    DECLARE v_saldo_sekarang DECIMAL(15, 2);
    DECLARE v_status_akun VARCHAR(20);

    -- a. Ambil saldo & status akun saat ini
    SELECT saldo, status INTO v_saldo_sekarang, v_status_akun 
    FROM accounts 
    WHERE id_account = NEW.id_account;

    -- b. Validasi status akun (Jika tidak aktif, cegah transaksi)
    IF v_status_akun <> 'aktif' THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Transaksi Gagal: Akun sedang diblokir atau sudah ditutup.';
    END IF;

    -- c. Validasi saldo jika tipe transaksi adalah penarikan
    IF NEW.tipe_transaksi = 'tarik' THEN
        IF v_saldo_sekarang < NEW.jumlah THEN
            -- Membatalkan proses INSERT & memberikan pesan error
            SIGNAL SQLSTATE '45000' 
            SET MESSAGE_TEXT = 'Transaksi Gagal: Saldo Anda tidak mencukupi.';
        END IF;
    END IF;
END //

DELIMITER ;

-- CARA TEST ERROR (Saldo Kurang):
-- INSERT INTO transactions (id_account, tipe_transaksi, jumlah) VALUES (2, 'tarik', 2000000);

-- CARA TEST ERROR (Akun Blokir):
-- UPDATE accounts SET status = 'blokir' WHERE id_account = 3;
-- INSERT INTO transactions (id_account, tipe_transaksi, jumlah) VALUES (3, 'setor', 500000);
