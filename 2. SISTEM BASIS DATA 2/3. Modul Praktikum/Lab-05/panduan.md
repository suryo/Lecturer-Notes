# Lab 5: Transaksi dan Manajemen Konkurensi

## Target Capaian

Mahasiswa mampu menangani transaksi database dan memahami dampak Isolation Levels.

## Langkah-langkah

### 1. Simulasi Transaksi Sukses & Gagal

Buka terminal MySQL.

```sql
START TRANSACTION;
INSERT INTO logs(msg) VALUES ('Mulai Transaksi');
-- ... kueri lainnya ...
COMMIT; -- Permanen
```

Coba ulangi tapi gunakan `ROLLBACK;` dan cek apakah data masuk atau tidak.

### 2. Simulasi Konkurensi (Dirty Read)

- Buka dua terminal (User A & User B).
- User A: `SET SESSION TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;`
- User B: `START TRANSACTION; UPDATE ... (jangan di COMMIT dulu)`
- User A: `SELECT ...` (Lihat apakah data yang belum di-commit User B terlihat? Itulah Dirty Read).

## Tugas Praktikum

Simulasikan **Deadlock** dengan cara dua transaksi saling menunggu resources yang dikunci oleh transaksi lainnya. Tunjukkan bagaimana MySQL mendeteksi dan menangani deadlock tersebut.
