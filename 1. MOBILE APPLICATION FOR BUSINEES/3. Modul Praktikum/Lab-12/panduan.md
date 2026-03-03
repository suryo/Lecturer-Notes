# Lab 12: Checkout & Transaction Flow

## Target Capaian

Mahasiswa mampu mengelola keranjang belanja dan melakukan proses checkout ke database Laravel.

## Langkah-langkah

### 1. Model Keranjang (Flutter)

Buat `CartItem` di Provider untuk menampung produk yang dipilih.

### 2. API Checkout (Laravel)

Buat `TransactionController` dengan method `store`. Gunakan `DB::transaction` untuk menjamin keamanan data.

```php
public function store(Request $request) {
    // 1. Simpan Header Transaksi
    // 2. Simpan Detail Transaksi (Looping)
    return response()->json(['message' => 'Checkout Berhasil!']);
}
```

### 3. Integrasi Flutter

Kirim list produk dalam keranjang sebagai body POST request ke `/api/checkout`.

## Tantangan Mandiri

Implementasikan pengurangan stok otomatis pada tabel `products` setiap kali transaksi berhasil dibuat.
