-- ============================================================
-- STUDI KASUS: TOKO ONLINE (Pertemuan 3)
-- File 4: Logika Bisnis Kompleks (ApplyDiscount & IF-ELSE)
-- ============================================================

USE toko_online_v3;

-- 1. Procedure ApplyDiscount (Materi Praktikum 1)
--    Tujuan: Memberikan diskon % ke semua produk dalam kategori tertentu
DELIMITER //

CREATE PROCEDURE sp_ApplyDiscount(
    IN p_kategori VARCHAR(50),
    IN p_persen_diskon DECIMAL(5,2)
)
BEGIN
    -- Validasi diskon 0-100%
    IF p_persen_diskon <= 100 AND p_persen_diskon >= 0 THEN
        UPDATE produk 
        SET harga = harga - (harga * (p_persen_diskon / 100))
        WHERE kategori = p_kategori;
        
        -- Menampilkan info sukses
        SELECT CONCAT('Diskon ', p_persen_diskon, '% diterapkan ke kategori ', p_kategori) AS Status;
    ELSE
        -- Menampilkan error sederhana
        SELECT 'Error: Persentase diskon tidak valid (0-100).' AS Status;
    END IF;
END //

DELIMITER ;

-- CARA PEMANGGILAN:
-- CALL sp_ApplyDiscount('Aksesoris', 10.00);


-- 2. Procedure ProsesTransaksi (Logic Transaksi & Stok)
--    Tujuan: Mengurangi stok dan membuat pesanan baru secara bersamaan.
DELIMITER //

CREATE PROCEDURE sp_ProsesTransaksi(
    IN p_id_produk INT,
    IN p_jumlah INT
)
BEGIN
    DECLARE v_stok_sekarang INT;
    DECLARE v_harga_satuan DECIMAL(15,2);
    DECLARE v_total_bayar DECIMAL(15,2);
    DECLARE v_last_pesanan_id INT;

    -- 1. Ambil stok dan harga saat ini
    SELECT stok, harga INTO v_stok_sekarang, v_harga_satuan 
    FROM produk 
    WHERE id_produk = p_id_produk;

    -- 2. Cek apakah stok mencukupi (IF-ELSE logic)
    IF v_stok_sekarang >= p_jumlah THEN
        -- a. Buat Pesanan
        INSERT INTO pesanan (total_bayar, status) 
        VALUES (0, 'pending');
        
        SET v_last_pesanan_id = LAST_INSERT_ID();
        
        -- b. Buat Detail Pesanan
        INSERT INTO detail_pesanan (id_pesanan, id_produk, jumlah, harga_satuan)
        VALUES (v_last_pesanan_id, p_id_produk, p_jumlah, v_harga_satuan);
        
        -- c. Update Total Harga di Pesanan
        SET v_total_bayar = v_harga_satuan * p_jumlah;
        UPDATE pesanan 
        SET total_bayar = v_total_bayar, status = 'lunas' 
        WHERE id_pesanan = v_last_pesanan_id;

        -- d. Kurangi Stok
        UPDATE produk SET stok = stok - p_jumlah WHERE id_produk = p_id_produk;
        
        -- Berhasil
        SELECT 'Transaksi Berhasil!' AS Pesan, v_total_bayar AS Total;
    ELSE
        -- Gagal (Stok Kurang)
        SELECT 'Transaksi Gagal: Stok tidak cukup!' AS Pesan, v_stok_sekarang AS Stok_Ada;
    END IF;
END //

DELIMITER ;

-- CARA PEMANGGILAN:
-- CALL sp_ProsesTransaksi(1, 2); -- Beli 2 unit Laptop ASUS
