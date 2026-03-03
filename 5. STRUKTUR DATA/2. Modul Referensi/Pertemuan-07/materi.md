# Pertemuan 7: Hashing & Hash Tables

## Deskripsi Singkat

Hashing adalah teknik untuk memetakan data berukuran besar menjadi nilai index yang tetap (hash value). **Hash Table** memungkinkan pencarian data dengan waktu rata-rata yang sangat cepat (O(1)). Sesi ini juga membahas cara menangani tabrakan data (Collision).

## Tujuan Instruksional

1. Mahasiswa memahami fungsi dan kegunaan Hash Function.
2. Mahasiswa memahami fenomena Collision (Tabrakan).
3. Mahasiswa mampu mengimplementasikan Collision Handling (Open Addressing & Chaining).

## Materi Pembelajaran

### 1. Hash Function

Fungsi yang menerima input (Key) dan mengembalikan index array.
Contoh sederhana: `Index = Key % TableSize`.

### 2. Collision (Tabrakan)

Terjadi ketika dua key yang berbeda menghasilkan index yang sama.
Penanganan Collision:

- **Chaining**: Menggunakan Linked List di setiap index array untuk menyimpan elemen yang tabrakan.
- **Open Addressing**: Mencari slot kosong lain di array.
  - _Linear Probing_: Mencari slot kosong berikutnya (i+1).
  - _Quadratic Probing_: Mencari slot dengan rumus kuadrat (i+k^2).
  - _Double Hashing_: Menggunakan fungsi hash kedua.

### 3. Load Factor

Rasio jumlah elemen tersimpan terhadap ukuran tabel. Jika load factor terlalu tinggi, efisiensi hashing akan menurun.

## Studi Kasus

Bagaimana database menyimpan password menggunakan hashing? Mengapa password tidak boleh disimpan dalam bentuk teks biasa (plain text)?

## Latihan

Jika kita memiliki tabel ukuran 10 dan fungsi hash `h(x) = x % 10`, di mana letak index untuk angka `25, 35, 45` jika menggunakan metode **Chaining**?
