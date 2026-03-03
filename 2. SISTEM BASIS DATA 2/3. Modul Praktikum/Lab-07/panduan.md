# Lab 7: Pengenalan Basis Data NoSQL (MongoDB, Firebase)

## Target Capaian

Mahasiswa mampu melakukan operasi CRUD dasar pada database dokumen (MongoDB).

## Langkah-langkah

### 1. Instalasi & Connect

Buka MongoDB Compass, hubungkan ke `localhost:27017`.

### 2. Membuat Data (Insert)

Gunakan shell atau UI untuk memasukkan data:

```javascript
db.products.insertOne({
  name: "Laptop Pro",
  price: 15000000,
  specs: { ram: "16GB", cpu: "i7" },
  tags: ["elektronik", "kerja"],
});
```

### 3. Membaca Data (Query)

- Cari semua laptop: `db.products.find({ name: /Laptop/ })`
- Cari yang harganya > 10jt: `db.products.find({ price: { $gt: 10000000 } })`

## Tugas Praktikum

Buka **Firebase Console**, buat project baru, dan aktifkan **Firestore Database**. Masukkan satu dokumen secara manual melalui dashboard Firebase dan ambil screenshot hasilnya.
