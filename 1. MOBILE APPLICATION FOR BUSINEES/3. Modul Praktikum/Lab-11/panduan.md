# Lab 11: Real-time Search & Filter

## Target Capaian

Mahasiswa mampu mengimplementasikan pencarian produk yang terhubung langsung ke API Laravel.

## Langkah-langkah

### 1. Backend Search Logic

Di `ProductController` Laravel:

```php
public function index(Request $request) {
    return Product::where('name', 'like', "%{$request->search}%")->get();
}
```

### 2. Flutter Search Screen

Gunakan `TextField` dengan `onChanged` untuk melakukan fetch ulang:

```dart
onChanged: (value) {
  productProvider.searchProducts(value);
}
```

## Tantangan Mandiri

Tambahkan filter berdasarkan Kategori menggunakan `DropdownButton` di sebelah kolom pencarian.
