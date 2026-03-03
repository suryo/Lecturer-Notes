# Pertemuan 3: Linked List (Single & Double)

## Deskripsi Singkat

Sesi ini membahas alternatif dari Array, yaitu Linked List. Mahasiswa akan mempelajari bagaimana mengelola elemen data yang terhubung menggunakan pointer, memungkinkan alokasi memori yang lebih dinamis dan efisien untuk operasi penyisipan (insertion).

## Tujuan Instruksional

1. Mahasiswa memahami perbedaan Array vs Linked List.
2. Mahasiswa mampu mengimplementasikan Singly Linked List.
3. Mahasiswa memahami struktur Doubly Linked List.

## Materi Pembelajaran

### 1. Mengapa Linked List?

- **Array**: Ukuran fixed, penyisipan di tengah mahal (harus geser elemen).
- **Linked List**: Ukuran dinamis, penyisipan/penghapusan efisien (cukup ubah pointer).

### 2. Singly Linked List

Setiap "Node" memiliki dua bagian: **Data** dan **Pointer Next**.

```cpp
struct Node {
    int data;
    Node* next;
};
```

Operasi Dasar:

- **Append**: Menambah di akhir.
- **Prepend**: Menambah di awal.
- **Delete**: Mencari dan menghapus node.

### 3. Contoh Implementasi Sederhana

```cpp
#include <iostream>
using namespace std;

struct Node {
    int data;
    Node* next;
};

void printList(Node* n) {
    while (n != nullptr) {
        cout << n->data << " -> ";
        n = n->next;
    }
    cout << "NULL" << endl;
}

int main() {
    Node* head = new Node();
    Node* second = new Node();

    head->data = 10;
    head->next = second;

    second->data = 20;
    second->next = nullptr;

    printList(head);
    return 0;
}
```

### 4. Doubly Linked List

Setiap node memiliki dua pointer: **Next** dan **Prev**.

- **Kelebihan**: Bisa traversal dua arah (maju & mundur).
- **Kekurangan**: Membutuhkan lebih banyak memori untuk menyimpan pointer tambahan.

## Latihan

Cobalah buat fungsi `insertAfter(Node* prev_node, int new_data)` untuk menyisipkan data baru setelah node tertentu pada Singly Linked List.
