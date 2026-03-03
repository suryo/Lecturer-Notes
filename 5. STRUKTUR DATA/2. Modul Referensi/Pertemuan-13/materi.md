# Pertemuan 13: Algoritma Rute Terpendek (Dijkstra)

## Deskripsi Singkat

Sesi ini membahas salah satu algoritma paling legendaris dalam ilmu komputer: **Dijkstra's Algorithm**. Algoritma ini digunakan untuk mencari rute terpendek dari satu titik awal ke semua titik lainnya pada sebuah graph yang memiliki bobot (weighted graph).

## Tujuan Instruksional

1. Mahasiswa memahami prinsip "Greedy" pada algoritma Dijkstra.
2. Mahasiswa mampu mengimplementasikan Dijkstra menggunakan Priority Queue.
3. Mahasiswa mampu menghitung rute terpendek secara manual pada sebuah graph berbobot.

## Materi Pembelajaran

### 1. Konsep Algoritma Dijkstra

Menemukan biaya (cost) minimal antara node asal ke node tujuan. Syarat: Semua bobot pada edge harus bernilai positif.
**Langkah-langkah**:

1. Berikan nilai jarak tak hingga ($\infty$) ke semua node, kecuali node asal (nilai 0).
2. Pilih node dengan jarak terkecil yang belum dikunjungi.
3. Perbarui (relax) nilai jarak semua tetangga dari node tersebut.
4. Tandai node tersebut sebagai "dikunjungi".
5. Ulangi hingga semua node dikunjungi.

### 2. Pengunaan Priority Queue

Untuk mempercepat pencarian "node dengan jarak terkecil", kita menggunakan **Priority Queue (Min-Heap)**. Hal ini menurunkan kompleksitas algoritma menjadi O(E log V).

### 3. Aplikasi di Dunia Nyata

- **Google Maps**: Mencari rute tercepat dari lokasi Anda ke tujuan.
- **Routing Jaringan**: Menentukan jalur pengiriman paket data terbaik di internet (protokol OSPF).

## Praktikum

Diberikan sebuah graph dengan bobot (misal: peta kota sederhana). Hitunglah secara manual rute terpendek dari Kota A ke Kota E dengan langkah-langkah tabel Dijkstra.

## Latihan

Mengapa algoritma Dijkstra gagal (atau tidak akurat) jika dalam graph terdapat jalur dengan bobot negatif?
