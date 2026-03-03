# Pertemuan 4: MVC Architecture, Routing, & Views

## Deskripsi Singkat

Sesi ini membahas pilar utama Laravel: Arsitektur **Model-View-Controller (MVC)**. Kita akan belajar bagaimana alur request diproses melalui Route, lalu diteruskan ke View untuk ditampilkan ke user.

## Tujuan Instruksional

1. Mahasiswa memahami pola desain MVC.
2. Mahasiswa mampu membuat Route Dasar di `web.php`.
3. Mahasiswa mampu mengirim data dari Route ke View.

## Materi Pembelajaran

### 1. Apa itu MVC?

- **Model**: Mengelola data (Tabel).
- **View**: Komponen visual (HTML).
- **Controller**: Jembatan logika.

### 2. Memahami Routing

Semua route didefinisikan di `routes/web.php`.

```php
Route::get('/halo', function () {
    return "Halo, Selamat Datang di Laravel!";
});
```

### 3. Menggunakan Views

View menggunakan ekstensi `.blade.php` di `resources/views`.

```php
Route::get('/profil', function () {
    return view('profil', ['nama' => 'Budi']);
});
```

## Praktikum

1. Buat route `/tentang` yang menampilkan halaman statis.
2. Buat route dinamis `/salam/{nama}` dan tampilkan nilainya di view.

## Latihan

Kapan sebaiknya kita menggunakan Logic di dalam Route (`Closure`) dan kapan sebaiknya menggunakan `Controller`?
