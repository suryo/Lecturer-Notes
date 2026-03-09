-- ============================================================
-- STUDI KASUS: TOKO ONLINE (Pertemuan 3)
-- File 3: SQL Functions (Materi: CalculateTax)
-- ============================================================
-- Fungsi (Function) HARUS mengembalikan satu nilai dan bisa
-- dipanggil langsung di dalam perintah SELECT.
-- ============================================================

USE toko_online_v3;

-- 1. Function Menghitung Pajak (PPN 11%)
--    Tujuan: Menghitung pajak dari harga jual
DELIMITER //

CREATE FUNCTION fn_CalculateTax(
    p_harga DECIMAL(15,2)
) 
RETURNS DECIMAL(15,2)
DETERMINISTIC
BEGIN
    DECLARE v_pajak_persen DECIMAL(4,2) DEFAULT 0.11;
    DECLARE v_hasil_pajak DECIMAL(15,2);
    
    SET v_hasil_pajak = p_harga * v_pajak_persen;
    
    RETURN v_hasil_pajak;
END //

DELIMITER ;

-- PEMANGGILAN FUNCTION:
-- SELECT nama_produk, harga, fn_CalculateTax(harga) AS PPN_11_Persen FROM produk;


-- 2. Function Menghitung Total Bayar (Harga + Pajak)
DELIMITER //

CREATE FUNCTION fn_GetTotalHargaPajak(
    p_harga DECIMAL(15,2)
)
RETURNS DECIMAL(15,2)
DETERMINISTIC
BEGIN
    RETURN p_harga + fn_CalculateTax(p_harga);
END //

DELIMITER ;

-- PEMANGGILAN FUNCTION BERSAMBUNG:
-- SELECT nama_produk, harga, fn_GetTotalHargaPajak(harga) AS Total_Bayar FROM produk;
