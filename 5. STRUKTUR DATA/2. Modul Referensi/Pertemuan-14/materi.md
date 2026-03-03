# Pertemuan 14: Dasar-Dasar Dynamic Programming (DP)

## Deskripsi Singkat

Sesi penutup ini membahas teknik optimasi algoritma yang sangat kuat: **Dynamic Programming (DP)**. Konsep utamanya adalah memecah masalah besar menjadi sub-masalah kecil yang saling tumpang tindih (overlapping subproblems) dan menyimpan hasilnya agar tidak perlu dihitung berulang kali.

## Tujuan Instruksional

1. Mahasiswa memahami perbedaan Rekursi Biasa vs Dynamic Programming.
2. Mahasiswa memahami teknik **Memoization** (Top-down).
3. Mahasiswa memahami teknik **Tabulation** (Bottom-up).

## Materi Pembelajaran

### 1. Kapan Menggunakan DP?

Dua syarat utama masalah bisa diselesaikan dengan DP:

- **Optimal Substructure**: Solusi optimal dari masalah besar dapat disusun dari solusi optimal sub-masalah kecil.
- **Overlapping Subproblems**: Sub-masalah yang sama dihitung berkali-kali jika menggunakan rekursi biasa.

### 2. Memoization (Top-down)

Menulis fungsi rekursif seperti biasa, namun sebelum melakukan perhitungan, cek dulu apakah hasilnya sudah ada di memori (cache). Jika sudah ada, langsung kembalikan nilainya.

### 3. Tabulation (Bottom-up)

Menyelesaikan masalah mulai dari sub-masalah terkecil, lalu hasilnya disimpan dalam tabel (biasanya array 1D atau 2D). Kemudian tabel tersebut diisi secara bertahap hingga mencapai solusi masalah utama.

### 4. Contoh Klasik: Deret Fibonacci

- **Rekursi Biasa**: O(2^n) - Sangat Lambat.
- **Dynamic Programming**: O(n) - Sangat Cepat.

```cpp
// Contoh Tabulation C++
int fib(int n) {
    int f[n + 2];
    f[0] = 0; f[1] = 1;
    for (int i = 2; i <= n; i++) {
        f[i] = f[i - 1] + f[i - 2];
    }
    return f[n];
}
```

## Penutup Kuliah

Selamat! Anda telah menuntaskan perjalanan Struktur Data. Dari pointer yang rumit hingga algoritma optimasi seperti DP. Pengetahuan ini adalah pondasi terpenting bagi seorang Software Engineer profesional. Teruslah mengasah kemampuan berpikir logis Anda!

---

**Selamat, Anda telah menyelesaikan seluruh materi Struktur Data!**
