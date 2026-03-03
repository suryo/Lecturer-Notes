# Pertemuan 1: Pengenalan Struktur Data & Pointer Recap

## Deskripsi Singkat

Sesi pembuka yang membahas pentingnya struktur data dalam pembuatan program yang efisien, serta menyegarkan kembali pemahaman tentang Pointer dan Referensi dalam bahasa C++.

## Tujuan Instruksional

1. Mahasiswa memahami definisi dan klasifikasi struktur data.
2. Mahasiswa memahami hubungan antara Algoritma dan Struktur Data.
3. Mahasiswa mampu menggunakan pointer secara praktis dalam C++.

## Materi Pembelajaran

### 1. Definisi Struktur Data

Cara menyimpan dan mengatur data di dalam memori komputer agar dapat digunakan secara efisien.

> "Program = Algorithm + Data Structure" — Niklaus Wirth

Pentingnya efisiensi:

- **Time Complexity**: Seberapa cepat data dapat diproses.
- **Space Complexity**: Berapa banyak memori yang digunakan.

### 2. Klasifikasi Struktur Data

- **Linear**: Data disusun secara berurutan (Contoh: Array, Linked List, Stack, Queue).
- **Non-Linear**: Data tidak disusun berurutan, memiliki hubungan hirarki atau jaringan (Contoh: Tree, Graph).

### 3. Memory Management: Stack vs Heap

- **Stack**: Alokasi memori otomatis, cepat, ukuran tetap.
- **Heap**: Alokasi memori manual (menggunakan `new` dan `delete`), fleksibel, tapi lebih lambat dan berisiko kebocoran memori (memory leak).

### 4. Pointer & Reference Recap (C++)

Pointer adalah variabel yang menyimpan alamat memori dari variabel lain.

```cpp
#include <iostream>
using namespace std;

int main() {
    int angka = 10;
    int* ptr = &angka; // Pointer ptr menyimpan alamat memori 'angka'

    cout << "Nilai angka: " << angka << endl;
    cout << "Alamat memori angka: " << ptr << endl;
    cout << "Nilai via pointer (dereferencing): " << *ptr << endl;

    // Alokasi Dinamis
    int* dinamis = new int(25);
    cout << "Nilai dinamis di heap: " << *dinamis << endl;
    delete dinamis; // Jangan lupa bebaskan memori!

    return 0;
}
```

## Latihan

Buatlah fungsi `tukar(int *a, int *b)` yang bisa menukar dua nilai variabel menggunakan pointer.
