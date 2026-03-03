# Lab 04: MVC Architecture, Routing, & Views

## Target Capaian

Mahasiswa mampu membuat alur request sederhana menggunakan Route dan View di Laravel.

## Langkah-langkah

### 1. Membuat Route Dasar

Buka `routes/web.php` dan tambahkan:

```php
Route::get('/profil', function () {
    return "Halaman Profil";
});
```

### 2. Menampilkan View

Buat file `resources/views/beranda.blade.php`:

```html
<h1>Selamat Datang di Beranda</h1>
<p>Halo, {{ $nama }}!</p>
```

Lalu buat routingnya:

```php
Route::get('/beranda', function () {
    return view('beranda', ['nama' => 'Ardi']);
});
```

## Tantangan Mandiri

Buatlah route `/hitung/{angka1}/{angka2}` yang mengembalikan hasil penjumlahan kedua angka tersebut.
