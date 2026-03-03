# Lab 8: Struktur Data NoSQL & Agregasi Data

## Target Capaian

Mahasiswa mampu mengolah data kompleks menggunakan Aggregation Framework di MongoDB.

## Langkah-langkah

### 1. Persiapan Data

Import dataset `restaurants` ke MongoDB.

### 2. Agregasi Sederhana

Hitung jumlah restoran per jenis masakan (`cuisine`):

```javascript
db.restaurants.aggregate([
  { $group: { _id: "$cuisine", count: { $sum: 1 } } },
  { $sort: { count: -1 } },
]);
```

### 3. Agregasi Kompleks (Filter & Sort)

Cari restoran di wilayah "Brooklyn" yang memiliki nilai (`grade`) "A" dan tampilkan 5 teratas:

```javascript
db.restaurants.aggregate([
  { $match: { borough: "Brooklyn", "grades.grade": "A" } },
  { $limit: 5 },
]);
```

## Tugas Praktikum

Gunakan operator `$unwind` untuk memecah array `grades` pada dataset restoran, kemudian hitung rata-rata skor (`score`) untuk setiap restoran.
