-- ============================================================
-- STUDI KASUS: TOKO ONLINE (Pertemuan 3)
-- File 2: Stored Procedure dengan Parameter IN, OUT
-- ============================================================

USE toko_online_v3;

-- 1. Procedure dengan Parameter IN (Input)
--    Tujuan: Update harga produk berdasarkan ID
DELIMITER //

CREATE PROCEDURE sp_UpdateHargaProduk(
    IN p_id_produk INT,
    IN p_harga_baru DECIMAL(15,2)
)
BEGIN
    UPDATE produk 
    SET harga = p_harga_baru 
    WHERE id_produk = p_id_produk;
END //

DELIMITER ;

-- CARA PEMANGGILAN:
-- CALL sp_UpdateHargaProduk(1, 8500000);


-- 2. Procedure dengan Parameter IN dan OUT (Output)
--    Tujuan: Mengambil info stok produk dan menyimpannya ke variabel
DELIMITER //

CREATE PROCEDURE sp_GetStokProduk(
    IN p_id_produk INT,
    OUT p_stok_saat_ini INT
)
BEGIN
    SELECT stok INTO p_stok_saat_ini 
    FROM produk 
    WHERE id_produk = p_id_produk;
END //

DELIMITER ;

-- CARA PEMANGGILAN & CEK HASIL:
-- CALL sp_GetStokProduk(2, @stok_temp);
-- SELECT @stok_temp AS Stok_Tersedia;


-- 3. Procedure dengan Logic Sederhana (IF)
--    Tujuan: Menambah stok produk
DELIMITER //

CREATE PROCEDURE sp_TambahStok(
    IN p_id_produk INT,
    IN p_jumlah_tambah INT
)
BEGIN
    -- Validasi agar jumlah tambah tidak minus
    IF p_jumlah_tambah > 0 THEN
        UPDATE produk 
        SET stok = stok + p_jumlah_tambah 
        WHERE id_produk = p_id_produk;
    END IF;
END //

DELIMITER ;
