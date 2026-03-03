# Pertemuan 6: Trees (BST & AVL)

## Deskripsi Singkat

Sesi ini memperkenalkan struktur data non-linear yaitu **Tree** (Pohon). Fokus utama adalah pada **Binary Search Tree (BST)** untuk pencarian data yang efisien dan konsep penyeimbangan pada **AVL Tree** untuk menghindari skema terburuk (skewed tree).

## Tujuan Instruksional

1. Mahasiswa memahami struktur hierarkis pada Tree.
2. Mahasiswa mampu melakukan operasi Dasar pada BST (Insert, Search, Delete).
3. Mahasiswa memahami pentingnya balancing pada AVL Tree melalui Rotasi.

## Materi Pembelajaran

### 1. Terminologi Tree

- **Root**: Node teratas.
- **Leaf**: Node yang tidak punya anak.
- **Height**: Jarak terjauh dari root ke leaf.
- **Parent/Child**: Hubungan antar node yang terhubung langsung.

### 2. Binary Search Tree (BST)

Aturan Utama:

- Node di sebelah **kiri** selalu lebih kecil dari parent.
- Node di sebelah **kanan** selalu lebih besar dari parent.

**Traversal (Penelusuran)**:

- **In-order** (Kiri-Root-Kanan): Menghasilkan data terurut.
- **Pre-order** (Root-Kiri-Kanan).
- **Post-order** (Kiri-Kanan-Root).

### 3. AVL Tree (Balanced Tree)

BST biasa bisa menjadi "miring" (seperti Linked List) jika data dimasukkan tidak beraturan, menyebabkan performa turun jadi O(n).
**AVL Tree** menjaga selisih tinggi antara sub-tree kiri dan kanan maksimal 1 melalui:

- **Single Rotation** (LL, RR).
- **Double Rotation** (LR, RL).

## Praktikum

Gambarkan urutan BST yang terbentuk jika data berikut dimasukkan secara berurutan: `50, 30, 70, 20, 40, 60, 80`. Lakukan pula traversal _In-order_ pada pohon tersebut.

## Latihan

Sebutkan satu kelebihan utama AVL Tree dibandingkan BST biasa dalam aplikasi dunia nyata.
