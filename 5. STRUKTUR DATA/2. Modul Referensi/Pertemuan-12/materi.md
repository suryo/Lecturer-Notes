# Pertemuan 12: Penelusuran Graph (DFS & BFS)

## Deskripsi Singkat

Setelah memahami cara menyimpan graph, sekarang kita akan mempelajari cara "berjalan-jalan" atau menelusuri setiap node pada graph secara sistematis. Dua algoritma utama yang akan dibahas adalah **Depth-First Search (DFS)** dan **Breadth-First Search (BFS)**.

## Tujuan Instruksional

1. Mahasiswa memahami logika algoritma DFS.
2. Mahasiswa memahami logika algoritma BFS.
3. Mahasiswa mampu mengimplementasikan DFS menggunakan Stack dan BFS menggunakan Queue.

## Materi Pembelajaran

### 1. Depth-First Search (DFS)

DFS menelusuri satu cabang hingga sedalam mungkin sebelum berbalik arah (backtrack).

- **Logika**: Kunjungi node tetangga, lalu segera pindah ke tetangganya lagi.
- **Data Structure**: Menggunakan **Stack** (atau rekursi).
- **Aplikasi**: Mencari solusi labirin, deteksi siklus pada graph.

### 2. Breadth-First Search (BFS)

BFS menelusuri semua tetangga pada level yang sama sebelum pindah ke level yang lebih dalam (melebar).

- **Logika**: Kunjungi semua tetangga terdekat dulu, baru kemudian tetangga dari tetangga.
- **Data Structure**: Menggunakan **Queue**.
- **Aplikasi**: Mengetahui jarak terpendek pada graph tidak berbobot (unweighted graph), sistem rekomendasi teman sosial media.

### 3. Perbandingan Penelusuran

- **DFS**: Lebih hemat memori untuk area yang sangat lebar tapi dangkal.
- **BFS**: Selalu menemukan rute terpendek (level terkecil) ke target pertama kali.

## Praktikum

Gambarkan urutan vertex yang dikunjungi jika kita melakukan penelusuran **BFS** mulai dari node A pada graph di Pertemuan 11.

## Latihan

Jika kita ingin mencari file tertentu di dalam folder komputer yang tersusun secara hierarkis (Tree/Graph), manakah penelusuran yang lebih efisien jika file tersebut kemungkinan besar berada di folder yang sangat dalam? Jelaskan.
