# Pertemuan 5: Rekursi & Binary Search

## Deskripsi Singkat

Rekursi adalah teknik di mana sebuah fungsi memanggil dirinya sendiri untuk menyelesaikan masalah yang lebih kecil. Sesi ini juga membahas **Binary Search**, algoritma pencarian yang sangat efisien yang sering diimplementasikan secara rekursif pada data yang sudah terurut.

## Tujuan Instruksional

1. Mahasiswa memahami konsep rekursi dan bahaya Infinity Recursion.
2. Mahasiswa mampu menulis fungsi rekursif (Factorial, Fibonacci).
3. Mahasiswa mampu mengimplementasikan dan menganalisis efisiensi Binary Search.

## Materi Pembelajaran

### 1. Dasar Rekursi

Dua komponen wajib dalam fungsi rekursif:

- **Base Case**: Kondisi di mana rekursi berhenti.
- **Recursive Step**: Cara membagi masalah menjadi sub-masalah yang lebih kecil.

```cpp
int faktorial(int n) {
  if (n <= 1) return 1; // Base Case
  return n * faktorial(n - 1); // Recursive Step
}
```

### 2. Binary Search

Mencari elemen dalam array yang **terurut** dengan cara membagi dua ruang pencarian secara terus menerus.

- **Complexity**: O(log n). Jauh lebih cepat dibanding Linear Search (O(n)) untuk data besar.

**Logika**:

1. Ambil elemen tengah (`mid`).
2. Jika `target == mid`, pencarian selesai.
3. Jika `target < mid`, cari di sebelah kiri.
4. Jika `target > mid`, cari di sebelah kanan.

### 3. Implementasi Rekursif Binary Search

```cpp
int binarySearch(int arr[], int low, int high, int x) {
    if (high >= low) {
        int mid = low + (high - low) / 2;
        if (arr[mid] == x) return mid;
        if (arr[mid] > x) return binarySearch(arr, low, mid - 1, x);
        return binarySearch(arr, mid + 1, high, x);
    }
    return -1;
}
```

## Latihan

Bandingkan jumlah perbandingan yang dilakukan Linear Search vs Binary Search untuk mencari angka dalam array berukuran 1024 elemen yang sudah terurut. Berapa minimal dan maksimal perbandingannya?
