# Pertemuan 1: Pengenalan Basis Data Lanjutan & Optimasi SQL

## Deskripsi Singkat

Sesi pembuka ini melakukan penyegaran terhadap konsep RDBMS dan SQL dasar, serta memperkenalkan konsep optimasi awal melalui indeks dasar dan alat analisis performa kueri.

## Tujuan Instruksional

1. Mahasiswa mengingat kembali perintah SQL (DDL/DML).
2. Mahasiswa memahami pentingnya indeks (B-Tree, Hash).
3. Mahasiswa mampu menggunakan perintah `EXPLAIN` untuk menganalisis jalur eksekusi kueri.

## Materi Pembelajaran

### 1. Review Basis Data Relasional

Review singkat komponen SQL:

- **DDL**: `CREATE`, `ALTER`, `DROP`.
- **DML**: `SELECT`, `INSERT`, `UPDATE`, `DELETE`.

### 2. Dasar Optimasi & Indeks

Mengapa kueri menjadi lambat?

- Tanpa indeks = **Full Table Scan** (mencari baris satu per satu).
- Dengan indeks = Mencari lewat pohon pencarian (B-Tree/Hash).

### 3. Teknik EXPLAIN dan ANALYZE

Gunakan perintah ini sebelum kueri untuk melihat bagaimana DBMS memprosesnya:

```sql
EXPLAIN ANALYZE SELECT * FROM users WHERE email = 'test@example.com';
```

Perhatikan kolom:

- **type**: Mencari 'ref' atau 'index' (hindari 'ALL').
- **rows**: Perkiraan jumlah baris yang harus diperiksa.

## Praktikum & Case Study

1. Gunakan Database Sample **Sakila** (MySQL) atau **Northwind**.
2. Jalankan kueri pencarian data pada tabel besar tanpa indeks.
3. Gunakan `EXPLAIN` untuk melihat performanya.
4. (Preview) Buat indeks sederhana dan lihat perubahannya.

## Latihan

Sebutkan perbedaan mendasar antara **B-Tree Index** dan **Hash Index**. Dalam kondisi apa Hash Index lebih unggul?
