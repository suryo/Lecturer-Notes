# Pertemuan 10: Heap & Priority Queues

## Deskripsi Singkat

Sesi ini membahas **Binary Heap**, jenis pohon biner lengkap yang memenuhi properti heap tertentu. Kita akan mempelajari bagaimana tumpukan ini digunakan untuk mengimplementasikan **Priority Queue** (Antrean Prioritas) secara efisien.

## Tujuan Instruksional

1. Mahasiswa memahami struktur Binary Heap (Min-Heap dan Max-Heap).
2. Mahasiswa mampu memahami proses Heapify (Up-heap & Down-heap).
3. Mahasiswa mampu mengimplementasikan Priority Queue menggunakan array.

## Materi Pembelajaran

### 1. Struktur Binary Heap

Binary Heap adalah pohon biner lengkap (complete binary tree) yang disimpan dalam array.

- **Max-Heap**: Nilai parent selalu >= nilai anak-anaknya (Root adalah nilai terbesar).
- **Min-Heap**: Nilai parent selalu <= nilai anak-anaknya (Root adalah nilai terkecil).

**Pemetaan Array (Index mulai 0)**:

- Parent dari index `i`: `(i-1)/2`.
- Anak Kiri dari index `i`: `2*i + 1`.
- Anak Kanan dari index `i`: `2*i + 2`.

### 2. Operasi Utama

- **Insertion**: Tambahkan elemen di posisi terakhir, lalu lakukan `Shift-Up` (Heapify Up) untuk menjaga properti heap.
- **Extraction (Pop)**: Ambil root, ganti dengan elemen terakhir, lalu lakukan `Shift-Down` (Heapify Down).

### 3. Priority Queue (Antrean Prioritas)

Berbeda dengan Queue biasa (FIFO), pada Priority Queue elemen dengan prioritas tertinggi akan keluar lebih dulu.

- **Implementasi Efisien**: Menggunakan Heap memberikan performa O(log n) untuk penambahan dan penghapusan data.

## Praktikum

Masukkan angka `10, 20, 15, 30, 40` ke dalam sebuah **Min-Heap** kosong. Gambarkan pohonnya setiap kali ada elemen baru masuk.

## Latihan

Sebutkan satu contoh penggunaan Priority Queue dalam sistem operasi (misal: penjadwalan proses/CPU scheduling). Mengapa Priority Queue lebih cocok daripada Queue biasa dalam hal tersebut?
