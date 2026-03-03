# Lab 2: Indexing & Query Performance Tuning

## Target Capaian

Mahasiswa mampu menerapkan strategi indexing yang lebih kompleks (Composite & Covering Index) pada dataset besar.

## Langkah-langkah

### 1. Dataset Besar

Gunakan dataset besar (misal: 100.000+ baris).

### 2. Composite Index

Buatlah indeks pada dua kolom sekaligus:

```sql
CREATE INDEX idx_name_city ON employees(last_name, city);
```

Uji kueri:

- `SELECT * FROM employees WHERE last_name = 'X' AND city = 'Y';` (Efektif)
- `SELECT * FROM employees WHERE city = 'Y';` (Cek apakah indeks digunakan? Jelaskan!)

### 3. Covering Index

Jalankan kueri yang hanya mengambil data yang ada di indeks:

```sql
EXPLAIN SELECT last_name, city FROM employees WHERE last_name = 'X';
```

Cek di bagian `Extra` pada output EXPLAIN. Jika ada tulisan **"Using index"**, berarti covering index berhasil (DBMS tidak perlu membuka tabel fisik).

## Tugas Praktikum

Lakukan tuning pada kueri JOIN antara dua tabel besar. Berikan bukti capture `EXPLAIN` sebelum dan sesudah optimasi.
