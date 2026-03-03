# Pertemuan 11: E-Commerce Features (Search & Filter)

## Deskripsi Singkat

Sesi ini membahas fitur-fitur penting dalam aplikasi belanja online untuk mempermudah user dalam menemukan produk. Kita akan mengimplementasikan pencarian (Searching) dan penyaringan data (Filtering) di sisi Backend Laravel serta menampilkannya secara dinamis di Flutter.

## Tujuan Instruksional

1. Mahasiswa mampu mengimplementasikan query searching menggunakan `where` dan `like` di Laravel.
2. Mahasiswa mampu menangani Query Parameters di API.
3. Mahasiswa mampu mengimplementasikan fitur Search Bar di Flutter yang terhubung ke API.

## Materi Pembelajaran

### 1. Backend: API Pencarian

Laravel harus mampu menerima parameter pencarian dari URL (contoh: `/api/products?search=kopi`).

```php
public function index(Request $request) {
    $query = Product::query();
    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }
    return $query->get();
}
```

### 2. Frontend: Implementasi Search Bar

Di Flutter, kita bisa menggunakan widget `TextField` dengan event `onChanged` atau `onSubmitted`.

```dart
TextField(
  onSubmitted: (value) {
    // Jalankan ulang fungsi fetch data dengan parameter search
    productProvider.fetchProducts(search: value);
  },
)
```

### 3. Filtering Logic

Selain teks, user biasanya ingin menyaring produk berdasarkan kategori atau rentang harga.

- Tambahkan filter di Laravel menggunakan `whereIn` atau `whereBetween`.
- Di Flutter, gunakan widget `DropdownButton` atau `ChoiceChip` untuk memilih kategori.

### 4. Debouncing (Optimization)

Agar aplikasi tidak melakukan request ke server di setiap ketikan huruf (yang bisa membebani server), kita bisa menggunakan teknik **Debouncing** (menunda request selama beberapa milidetik).

## Praktikum

1. Lengkapi API Produk Anda agar mendukung parameter `search` dan `category_id`.
2. Buatlah halaman "Katalog Produk" di Flutter yang memiliki kolom pencarian di bagian atas (AppBar).
3. Pastikan daftar produk diperbarui secara otomatis ketika user menekan tombol cari.
4. Tambahkan filter kategori sederhana menggunakan Chip atau Dropdown.

## Latihan

Sebutkan perbedaan antara pencarian di sisi Client (menyaring data yang sudah ada di memori HP) dengan pencarian di sisi Server (melakukan query ulang ke database). Kapan kita harus memilih salah satunya?
