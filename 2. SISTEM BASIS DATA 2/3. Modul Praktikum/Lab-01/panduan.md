# Lab 1: Pengenalan Basis Data Lanjutan & Optimasi SQL

## Target Capaian

Mahasiswa mampu menganalisis performa kueri menggunakan `EXPLAIN` dan memahami dampak kueri yang tidak dioptimasi.

## Langkah-langkah

### 1. Persiapan Database

Gunakan database sample **Sakila**. Jika belum ada, download dan import file `.sql` kedalam MySQL/PostgreSQL.

### 2. Analisis Kueri Tanpa Indeks

Jalankan kueri berikut pada tabel `customer` atau `payment`:

```sql
EXPLAIN SELECT * FROM customer WHERE last_name = 'SMITH';
```

Perhatikan kolom `rows` dan `type`. Jika `type` adalah `ALL`, berarti terjadi **Full Table Scan**.

### 3. Eksperimen Indeks Sederhana

Tambahkan indeks pada kolom `last_name`:

```sql
CREATE INDEX idx_lastname ON customer(last_name);
```

Jalankan kembali perintah `EXPLAIN`. Lihat perbedaan pada kolom `type` (sekarang harusnya `ref`) dan jumlah `rows` yang diperiksa.

## Tugas Praktikum

Bandingkan performa kueri yang menggunakan fungsi pada `WHERE` clause (misal: `WHERE UPPER(last_name) = 'SMITH'`) dengan kueri biasa. Mengapa indeks tidak digunakan pada kueri yang menggunakan fungsi?
