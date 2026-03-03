# Lab 12: Middleware & File Uploads (Merged)

## Target Capaian

Mahasiswa mampu membuat filter akses kustom dan mengunggah gambar.

## Langkah-langkah

### 1. Membuat Middleware Admin

```bash
php artisan make:middleware IsAdmin
```

Pengecekan role di `handle()`:

```php
if (auth()->user()->role !== 'admin') {
    return abort(403);
}
```

### 2. Upload Gambar Produk

Pastikan `storage:link` sudah aktif. Di Controller:

```php
$path = $request->file('image')->store('products', 'public');
```

## Tantangan Mandiri

Tampilkan gambar produk tersebut di halaman index menggunakan helper `asset('storage/'.$product->image)`.
