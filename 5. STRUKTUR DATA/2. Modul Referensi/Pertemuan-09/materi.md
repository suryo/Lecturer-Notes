# Pertemuan 9: Algoritma Pengurutan (Sorting)

## Deskripsi Singkat

Pengurutan data (Sorting) adalah salah satu operasi paling mendasar dalam ilmu komputer. Sesi ini membahas tiga algoritma pengurutan populer: **Bubble Sort** yang sederhana, serta **Quick Sort** dan **Merge Sort** yang menggunakan strategi _Divide and Conquer_ untuk performa tinggi.

## Tujuan Instruksional

1. Mahasiswa memahami logika Bubble Sort.
2. Mahasiswa mampu mengimplementasikan Quick Sort dengan Pivot.
3. Mahasiswa memahami konsep penggabungan (Merge) pada Merge Sort.
4. Mahasiswa mampu menganalisis perbandingan efisiensi O(n^2) vs O(n log n).

## Materi Pembelajaran

### 1. Bubble Sort (O(n^2))

Algoritma pengurutan paling sederhana dengan cara membandingkan dua elemen berturutan dan menukarnya jika posisinya salah. Elemen terbesar akan "mengapung" ke atas seperti gelembung.

- **Cocok untuk**: Data berukuran sangat kecil.

### 2. Quick Sort (O(n log n) average)

Algoritma _Divide and Conquer_ yang bekerja dengan memilih sebuah elemen sebagai **Pivot** dan mempartisi array di sekitar pivot tersebut.

- **Efisiensi**: Sangat cepat untuk data acak, namun bisa menjadi O(n^2) jika pemilihan pivot buruk pada data yang sudah terurut.

### 3. Merge Sort (O(n log n) stable)

Algoritma yang membagi array menjadi dua bagian terus menerus hingga tersisa elemen tunggal, kemudian menggabungkannya kembali (Merging) secara terurut.

- **Kelebihan**: Berbasis "Stable Sort" (urutan elemen yang sama tidak berubah) dan performa selalu konsisten.

### 4. Perbandingan Performa

| Algoritma   | Best Case  | Average Case | Worst Case |
| ----------- | ---------- | ------------ | ---------- |
| Bubble Sort | O(n)       | O(n^2)       | O(n^2)     |
| Quick Sort  | O(n log n) | O(n log n)   | O(n^2)     |
| Merge Sort  | O(n log n) | O(n log n)   | O(n log n) |

## Praktikum

Urutkanlah array `[38, 27, 43, 3, 9, 82, 10]` menggunakan langkah-langkah **Merge Sort**. Tunjukkan proses pembagian (Divide) dan penggabungan (Merge).

## Latihan

Dalam kondisi seperti apa Quick Sort lebih dipilih daripada Merge Sort? Serta dalam kondisi apa Merge Sort lebih unggul? (Petunjuk: Hubungkan dengan penggunaan memori tambahan).
