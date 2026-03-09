-- ============================================================
-- STUDI KASUS: TOKO ONLINE (Pertemuan 3)
-- File 5: Perbandingan PostgreSQL (PL/pgSQL)
-- ============================================================
-- CATATAN:
--   Sintaks PostgreSQL (PL/pgSQL) berbeda dengan MySQL/MariaDB.
--   PostgreSQL menggunakan blok DO / CREATE FUNCTION ... LANGUAGE plpgsql.
-- ============================================================

-- Berikut adalah CONTOH SAJA jika diimplementasikan di PostgreSQL:

/*
-- 1. Create Function di PostgreSQL
CREATE OR REPLACE FUNCTION pg_CalculateTax(p_harga NUMERIC)
RETURNS NUMERIC AS $$
BEGIN
    -- Di PostgreSQL, PPN 11% dikalikan langsung
    RETURN p_harga * 0.11;
END;
$$ LANGUAGE plpgsql;

-- 2. Create Procedure di PostgreSQL (Sejak V11)
--    PostgreSQL membedakan Return Value pada Function & Procedure.
CREATE OR REPLACE PROCEDURE pg_ApplyDiscount(
    p_id_produk INT,
    p_persen DECIMAL
)
LANGUAGE plpgsql
AS $$
BEGIN
    UPDATE produk 
    SET harga = harga - (harga * (p_persen / 100))
    WHERE id_produk = p_id_produk;
    
    COMMIT; -- PostgreSQL mensupport COMMIT di dalam procedure
END;
$$;
*/

-- ============================================================
-- PERBEDAAN UTAMA:
-- 1. MySQL menggunakan DELIMITER // ; PostgreSQL menggunakan $$ sebagai pembungkus.
-- 2. PostgreSQL membutuhkan deklarasi LANGUAGE (misal: plpgsql).
-- 3. Variabel di PostgreSQL dideklarasikan di blok 'DECLARE' terpisah.
-- 4. Secara default, PostgreSQL case-sensitive pada nama kolom tanpa kutip ganda.
-- ============================================================
