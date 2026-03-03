# Pertemuan 2: Indexing & Query Performance Tuning

## Deskripsi Singkat

Melanjutkan pertemuan pertama, sesi ini mendalami berbagai jenis indeks tingkat lanjut dan strategi penyetelan kueri untuk dataset berukuran besar.

## Tujuan Instruksional

1. Mahasiswa mampu membedakan Clustered dan Non-clustered index.
2. Mahasiswa memahami konsep Covering Index.
3. Mahasiswa mampu melakukan Tuning kueri pada dataset besar.

## Materi Pembelajaran

### 1. Jenis-Jenis Indexing

- **Clustered Index**: Data disimpan secara fisik urut berdasarkan primary key. Hanya boleh ada satu per tabel.
- **Non-Clustered Index**: Struktur terpisah yang menunjuk ke data fisik. Bisa ada banyak per tabel.
- **Covering Index**: Indeks yang berisi semua kolom yang diminta kueri, sehingga DBMS tidak perlu mengakses tabel fisik sama sekali (**Index Only Scan**).

### 2. Penyetelan Performa (Tuning)

Strategi tuning kueri:

- **Hindari SELECT \***: Ambil hanya kolom yang dibutuhkan.
- **Sargability**: Gunakan operator yang memungkinkan indeks digunakan (hindari fungsi pada kolom di `WHERE` clause, misal `WHERE YEAR(tgl) = 2023`).
- **Optimization of Joins**: Memeriksa urutan join dan tipe join (Nested Loop, Hash Join, Merge Join).

### 3. Studi Kasus Dataset Besar

Diberikan dataset jutaan baris, mahasiswa akan mengidentifikasi kueri lambat dan menerapkan indeks yang sesuai untuk mempercepat waktu respon dari hitungan detik ke milidetik.

## Praktikum

1. Gunakan dataset besar (misal data transaksi retail).
2. Terapkan **Composite Index** (indeks dengan lebih dari satu kolom).
3. Bandingkan performa `SELECT *` vs `SELECT [kolom_indeks]` (Covering Index).

## Latihan

Apa yang terjadi jika kita membuat terlalu banyak indeks pada satu tabel? Bagaimana dampaknya terhadap proses `INSERT` dan `UPDATE`?
