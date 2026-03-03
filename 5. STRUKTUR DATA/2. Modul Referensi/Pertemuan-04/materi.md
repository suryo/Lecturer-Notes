# Pertemuan 4: Stack & Queue

## Deskripsi Singkat

Sesi ini membahas dua struktur data linear yang sangat penting dalam pengembangan aplikasi dan algoritma sistem: **Stack** (Tumpukan) yang mengikuti prinsip LIFO dan **Queue** (Antrean) yang mengikuti prinsip FIFO.

## Tujuan Instruksional

1. Mahasiswa memahami konsep LIFO pada Stack.
2. Mahasiswa memahami konsep FIFO pada Queue.
3. Mahasiswa mampu mengimplementasikan Stack dan Queue menggunakan Array dan Linked List.

## Materi Pembelajaran

### 1. Stack (Tumpukan)

Prinsip: **LIFO (Last In First Out)**. Elemen yang terakhir masuk adalah yang pertama kali keluar.

- **Operasi Utama**:
  - `push(x)`: Menambahkan elemen ke puncak tumpukan.
  - `pop()`: Menghapus elemen dari puncak tumpukan.
  - `peek()`: Melihat elemen teratas tanpa menghapusnya.
  - `isEmpty()`: Mengecek apakah tumpukan kosong.

**Contoh Penggunaan**: Fitur Undo/Redo, pemrosesan fungsi di memori (Call Stack), pengecekan tanda kurung yang seimbang.

### 2. Queue (Antrean)

Prinsip: **FIFO (First In First Out)**. Elemen yang pertama masuk adalah yang pertama kali keluar.

- **Operasi Utama**:
  - `enqueue(x)`: Menambahkan elemen ke belakang antrean.
  - `dequeue()`: Menghapus elemen dari depan antrean.
  - `front()`: Melihat elemen paling depan.
  - `isEmpty()`: Mengecek apakah antrean kosong.

**Contoh Penggunaan**: Sistem antrean bank, pemrosesan request di server, Breadth-First Search (BFS).

### 3. Implementasi dengan C++

```cpp
#include <stack>
#include <queue>
#include <iostream>
using namespace std;

int main() {
    // Stack
    stack<int> s;
    s.push(10); s.push(20);
    cout << "Top Stack: " << s.top() << endl; // Output: 20
    s.pop();

    // Queue
    queue<string> q;
    q.push("A"); q.push("B");
    cout << "Front Queue: " << q.front() << endl; // Output: A
    q.pop();

    return 0;
}
```

## Tugas Mandiri

Baliklah sebuah kata (string) menggunakan bantuan struktur data Stack. Misalnya input "DATA" menjadi "ATAD".
