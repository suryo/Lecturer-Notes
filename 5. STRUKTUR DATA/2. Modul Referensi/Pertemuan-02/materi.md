# Pertemuan 2: Array & Array Multi-Dimensi

## Deskripsi Singkat

Sesi ini membahas struktur data yang paling dasar namun paling kuat yaitu Array. Fokus pada representasi memori, perhitungan alamat, serta penggunaan Array Multi-dimensi (Matrix).

## Tujuan Instruksional

1. Mahasiswa memahami alokasi memori untuk array.
2. Mahasiswa mampu mengimplementasikan array 2-dimensi.
3. Mahasiswa memahami kelebihan dan keterbatasan array.

## Materi Pembelajaran

### 1. Karakteristik Array

- **Homogen**: Semua elemen harus memiliki tipe data yang sama.
- **Kontigu**: Elemen disimpan di alamat memori yang berurutan.
- **Random Access**: Akses elemen menggunakan index (O(1)).

### 2. Representasi Memori

Jika kita memiliki `int arr[5]` dan alamat `arr[0]` adalah 1000, maka alamat `arr[1]` adalah 1004 (asumsi int = 4 byte).

> **Rumus**: Alamat(arr[i]) = Alamat(dasar) + (i \* ukuran_tipe_data)

### 3. Array 2-Dimensi (Matrix)

Digunakan untuk merepresentasikan tabel, gambar, atau graf.

```cpp
#include <iostream>
using namespace std;

int main() {
    int matrix[2][3] = {
        {1, 2, 3},
        {4, 5, 6}
    };

    // Mengakses baris 1, kolom 2 (index 1, 1)
    cout << "Nilai: " << matrix[1][1] << endl; // Output: 5

    // Iterasi Matrix
    for(int i=0; i<2; i++) {
        for(int j=0; j<3; j++) {
            cout << matrix[i][j] << " ";
        }
        cout << endl;
    }
    return 0;
}
```

### 4. Row-Major vs Column-Major Order

Bagaimana array 2D "diratakan" ke dalam memori 1D:

- **Row-Major**: Baris demi baris disimpan (Standar C++, Java).
- **Column-Major**: Kolom demi kolom disimpan (Standar Fortran, MATLAB).

## Latihan

Buatlah program yang menerima input matrix 3x3 dari user, kemudian hitunglah jumlah (sum) dari diagonal utamanya.
