# Pertemuan 5: Transaksi dan Manajemen Konkurensi

## Deskripsi Singkat

Sesi ini membahas cara menjamin integritas data dalam sistem yang diakses oleh banyak pengguna secara bersamaan. Fokus utama adalah pada properti ACID dan Isolation Levels.

## Tujuan Instruksional

1. Mahasiswa memahami konsep ACID (Atomicity, Consistency, Isolation, Durability).
2. Mahasiswa memahami masalah konkurensi (Dirty Read, Non-repeatable Read, Phantom Read).
3. Mahasiswa mampu mengatur Isolation Levels sesuai kebutuhan aplikasi.

## Materi Pembelajaran

### 1. Properti ACID

- **Atomicity**: Transaksi dianggap sebagai satu kesatuan (semua sukses atau semua batal).
- **Consistency**: Transaksi membawa database dari satu state valid ke state valid lainnya.
- **Isolation**: Transaksi yang berjalan bersamaan tidak saling mengganggu sebelum selesai.
- **Durability**: Hasil transaksi yang sukses bersifat permanen meski sistem crash.

### 2. Masalah & Isolation Levels

DBMS menyediakan tingkat isolasi untuk mencegah masalah pembacaan data:

- **READ UNCOMMITTED**: Paling cepat tapi bisa terjadi Dirty Read.
- **READ COMMITTED**: Mencegah Dirty Read (standar PostgreSQL).
- **REPEATABLE READ**: Mencegah Non-repeatable Read (standar MySQL InnoDB).
- **SERIALIZABLE**: Paling lambat tapi paling aman (seperti antrean satu per satu).

### 3. Case Study: Perbankan & Stok

Studi kasus perpindahan uang antar rekening:

```sql
START TRANSACTION;
UPDATE accounts SET balance = balance - 100 WHERE user_id = 1;
UPDATE accounts SET balance = balance + 100 WHERE user_id = 2;
COMMIT;
```

## Praktikum

1. Simulasikan dua user yang mengakses saldo yang sama secara bersamaan menggunakan dua window terminal.
2. Cobalah mengubah `SET SESSION TRANSACTION ISOLATION LEVEL ...` dan lihat perbedaannya.
3. Gunakan `ROLLBACK` untuk membatalkan transaksi yang salah.

## Latihan

Jelaskan perbedaan antara **Dirty Read** dan **Phantom Read**. Mengapa `SERIALIZABLE` jarang digunakan dalam aplikasi web dengan trafik tinggi?
