# Pertemuan 11: Graph Fundamentals (Representasi)

## Deskripsi Singkat

Graph adalah struktur data non-linear yang paling umum, terdiri dari **Vertex** (titik) dan **Edge** (garis penghubung). Sesi ini membahas dasar-dasar graph serta cara merepresentasikannya di komputer menggunakan matriks ketetanggaan dan daftar ketetanggaan.

## Tujuan Instruksional

1. Mahasiswa memahami terminologi dasar Graph (Directed, Undirected, Weighted).
2. Mahasiswa mampu membuat representasi **Adjacency Matrix**.
3. Mahasiswa mampu membuat representasi **Adjacency List**.

## Materi Pembelajaran

### 1. Terminologi Graph

- **Vertex (Node)**: Data tunggal pada graph.
- **Edge**: Koneksi antar vertex.
- **Undirected Graph**: Hubungan dua arah tanpa panah.
- **Directed Graph (Digraph)**: Hubungan satu arah (ada panah).
- **Weighted Graph**: Setiap edge memiliki bobot (misal: jarak antar kota).

### 2. Adjacency Matrix

Matriks 2D berukuran `V x V` di mana baris dan kolom merepresentasikan vertex.

- Jika ada hubungan antara i dan j, isi `1`, jika tidak `0`.
- **Kelebihan**: Cepat mengecek hubungan antar dua node tertentu.
- **Kekurangan**: Boros memori jika graph jarang (sparse).

### 3. Adjacency List

Array of lists di mana setiap index mewakili vertex, dan list tersebut berisi vertex tetangganya.

- **Kelebihan**: Hemat memori.
- **Kekurangan**: Lebih lambat untuk mengecek hubungan spesifik antara dua node.

## Praktikum

Gambarkan sebuah graph tidak berarah dengan 4 vertex (A, B, C, D) dan 4 edge (A-B, B-C, C-D, D-A). Kemudian, tuliskan representasi **Adjacency Matrix**-nya.

## Latihan

Kapan sebaiknya kita menggunakan _Adjacency List_ dibandingkan _Adjacency Matrix_? Berikan satu contoh skenario nyata (misal: jaringan sosial dengan jutaan user).
