# Pertemuan 8: Struktur Data NoSQL & Agregasi Data

## Deskripsi Singkat

Sesi ini mendalami berbagai tipe model data NoSQL dan fokus pada pengolahan data tingkat lanjut di MongoDB menggunakan Aggregation Framework.

## Tujuan Instruksional

1. Mahasiswa memahami 4 tipe utama NoSQL (Document, Key-Value, Column, Graph).
2. Mahasiswa mampu melakukan query agregasi (Sum, Average, Group By) di MongoDB.
3. Mahasiswa mampu memahami alur kerja Pipeline pada MongoDB.

## Materi Pembelajaran

### 1. Model Data NoSQL

- **Document Store**: (MongoDB, CouchDB) Data disimpan dalam bentuk JSON/BSON.
- **Key-Value Store**: (Redis, Memcached) Seperti dictionary raksasa. Sangat cepat untuk caching.
- **Column-Family Store**: (Cassandra, HBase) Menyimpan data dalam kolom, bukan baris. Sangat skalabel.
- **Graph Database**: (Neo4j) Menyimpan data dalam Node dan Edge (cocok untuk media sosial).

### 2. Agregasi Data di MongoDB

Jika di SQL kita menggunakan `GROUP BY` dan `SUM`, di MongoDB kita menggunakan **Aggregation Pipeline**.

```javascript
db.penjualan.aggregate([
  { $match: { status: "Lunas" } }, // Filter data
  { $group: { _id: "$kategori", total: { $sum: "$harga" } } }, // Kelompokkan & jumlahkan
  { $sort: { total: -1 } }, // Urutkan
]);
```

### 3. Pipeline Stages

- `$match`: Menyaring data.
- `$project`: Memilih field tertentu.
- `$unwind`: Memecah data array menjadi dokumen terpisah.
- `$lookup`: Melakukan join antar collection (mirip INNER JOIN).

## Praktikum

1. Gunakan dataset contoh (misal data restoran) di MongoDB.
2. Buatlah pipeline agregasi untuk menghitung rata-rata skor per kecamatan.
3. Gunakan `$lookup` untuk menggabungkan data Mahasiswa dengan data Jurusan.

## Latihan

Sebutkan 2 kasus penggunaan dunia nyata di mana **Graph Database** jauh lebih efisien dibandingkan **Relational Database**.
