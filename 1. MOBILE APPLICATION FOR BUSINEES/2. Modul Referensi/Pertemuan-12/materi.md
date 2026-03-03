# Pertemuan 12: Transaction Logic (Shopping Cart & Checkout)

## Deskripsi Singkat

Sesi ini adalah bagian inti dari aplikasi bisnis transaksi. Kita akan belajar cara mengelola keranjang belanja (Cart) di sisi Flutter dan melakukan proses **Checkout** untuk membuat transaksi baru di database Laravel.

## Tujuan Instruksional

1. Mahasiswa mampu mengelola State Keranjang Belanja secara lokal.
2. Mahasiswa mampu merancang tabel `transactions` dan `transaction_details`.
3. Mahasiswa mampu mengirimkan array data produk (banyak item) ke API Checkout Laravel.

## Materi Pembelajaran

### 1. Pengelolaan Keranjang Belanja

Simpan item yang dipilih user ke dalam sebuah list di Provider. Data minimal: `id_produk`, `nama`, `harga`, `kuantitas`.

```dart
List<CartItem> _items = [];
void addToCart(Product p) {
  // Cek apakah sudah ada, jika ada tambah kuantitas, jika belum add baru.
  notifyListeners();
}
```

### 2. Skema Database Transaksi

Sebuah transaksi biasanya terbagi menjadi dua tabel:

- **transactions**: id, user_id, total_price, status, date.
- **transaction_details**: id, transaction_id, product_id, quantity, price_at_purchase.

### 3. API Checkout (Laravel)

Controller harus menerima array produk dan menggunakan **Database Transaction** agar data konsisten (tidak terjadi stok berkurang tapi transaksi gagal).

```php
DB::transaction(function () use ($request) {
    $order = Transaction::create([...]);
    foreach ($request->items as $item) {
        $order->details()->create([...]);
        // Kurangi stok produk
        Product::find($item['id'])->decrement('stock', $item['qty']);
    }
});
```

### 4. Konfirmasi Pembayaran

Setelah checkout berhasil, tampilkan halaman ringkasan order dan instruksi pembayaran kepada user di Flutter.

## Praktikum

1. Buat fitur "Tambah ke Keranjang" di halaman detail produk Flutter.
2. Buat halaman "Keranjang Saya" yang menampilkan total harga yang harus dibayar.
3. Buat API POST `/api/checkout` di Laravel yang memproses data keranjang dan mengurangi stok barang.
4. Tampilkan pesan "Order Berhasil" setelah user menekan tombol Checkout.

## Latihan

Mengapa sangat penting menggunakan `DB::transaction` saat memproses pesanan di sisi Backend? Apa bahayanya jika kita hanya menggunakan perintah simpan biasa secara berurutan?
