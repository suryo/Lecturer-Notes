# Pertemuan 7: Pengenalan Basis Data NoSQL (MongoDB, Firebase)

## Deskripsi Singkat

Sesi ini memperkenalkan paradigma baru di luar tabel relasional. Kita akan mempelajari mengapa NoSQL muncul, apa perbedaannya dengan SQL, dan mencoba dasar-dasar MongoDB serta Firebase.

## Tujuan Instruksional

1. Mahasiswa memahami kelemahan RDBMS dalam skala besar.
2. Mahasiswa mampu membedakan skema SQL (Table) dan NoSQL (Document).
3. Mahasiswa mampu melakukan operasi CRUD dasar di MongoDB.

## Materi Pembelajaran

### 1. SQL vs NoSQL

- **SQL**: Skema kaku (Rigid), Relasional, Scaling Vertikal (perbesar server).
- **NoSQL**: Skema fleksibel (Dynamic), Non-relasional, Scaling Horisontal (tambah banyak server murah).

### 2. Dasar MongoDB

MongoDB menyimpan data dalam format **BSON** (Binary JSON).

- Table -> **Collection**
- Row -> **Document**
- Column -> **Field**

Contoh Document:

```json
{
  "nama": "Budi",
  "hobi": ["Mancing", "Coding"],
  "alamat": { "kota": "Surabaya" }
}
```

### 3. Firebase Real-Time Database

Firebase (dari Google) menyediakan database Cloud yang tersinkronisasi secara real-time ke semua client. Sangat populer untuk aplikasi mobile dan chat.

## Praktikum

1. Instalasi MongoDB Compass (GUI).
2. Buat database `Akademik` dan collection `Mahasiswa`.
3. Lakukan `insertOne` dan `find` pada MongoDB.
4. Eksplorasi Firebase Console dan coba buat database Firestore sederhana.

## Latihan

Apa yang dimaksud dengan **Schemaless** pada NoSQL? Jika tidak ada skema, bagaimana kita menjamin validitas data yang masuk ke database?
