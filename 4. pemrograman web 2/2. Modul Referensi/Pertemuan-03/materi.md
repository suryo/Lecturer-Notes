# Pertemuan 3: Transitioning to Framework - Laravel 10 Setup

## Deskripsi Singkat

Sesi ini membahas alasan mengapa kita harus beralih dari PHP Native ke Framework Web (Laravel). Mahasiswa akan belajar cara melakukan instalasi Laravel 10 melalui Composer dan membangun struktur dasar aplikasi E-Commerce "TokoKita".

## Tujuan Instruksional

1. Mahasiswa memahami kelebihan Framework (Keamanan, Struktur MVC, ORM).
2. Mahasiswa mampu menginstal **Laravel 10** menggunakan Composer.
3. Mahasiswa mampu mengonfigurasi **Routing** dasar (Public, Auth, Admin).
4. Mahasiswa memahami struktur folder Laravel (app, resources, routes, config).

---

## Materi Pembelajaran

### 1. Mengapa Menggunakan Framework?

Pada pertemuan sebelumnya kita menggunakan PHP Native. Kelemahan Native:

- **Spaghetti Code**: Kode logika dan tampilan bercampur aduk.
- **Keamanan**: Kita harus menangani SQL Injection dan CSRF secara manual.
- **Skalabilitas**: Sulit dikelola jika tim pengembang bertambah banyak.

**Laravel 10** memberikan solusi:

- **Routing**: Manajemen URL yang sangat terorganisir di `routes/web.php`.
- **Blade Templating**: Mendukung layouting yang rapi dengan `@extends` dan `@yield`.
- **Artisan**: Tool CLI yang mempercepat pembuatan Controller, Model, dsb.

### 2. Instalasi Laravel 10

Pastikan **Composer** sudah terinstal. Jalankan perintah berikut:

```bash
composer create-project laravel/laravel:^10.0 studi-kasus-laravel
```

### 3. Konfigurasi Routing (`routes/web.php`)

Kita telah mendefinisikan rute untuk aplikasi **TokoKita**:

- `/` : Landing Page (LandingController)
- `/produk` : Katalog Produk (ProductController)
- `/login` : Halaman Login (AuthController)
- `/admin` : Dashboard Admin (Admin\DashboardController)

---

## Praktikum: Memulai Project TokoKita

### Langkah 1: Persiapan Project

1. Masuk ke folder project: `cd studi-kasus-laravel`.
2. Edit file `.env` untuk menyesuaikan koneksi database.

### Langkah 2: Pembuatan Controller

Gunakan perintah Artisan:

```bash
php artisan make:controller LandingController
php artisan make:controller ProductController
```

### Langkah 3: Layouting dengan Blade

1. Buat file `layouts/app.blade.php` di `resources/views`.
2. Gunakan `@yield('content')` untuk menandai area konten dinamis.
3. Buat file `home.blade.php` dan `products/index.blade.php`.

### Langkah 4: Menjalankan Aplikasi

```bash
php artisan serve
```

---

## Tugas Mandiri

1. **Eksplorasi Struktur**: Buka folder `app/Http/Controllers` dan perhatikan bagaimana Controller yang baru dibuat mewarisi (extends) dari `Controller` dasar.
2. **Kustomisasi View**: Ubah warna tema pada `app.blade.php` menggunakan utility class Bootstrap 5 (misal: ganti `bg-dark` menjadi `bg-primary`).
3. **Route Baru**: Buatlah sebuah route baru `/tentang-kami` yang langsung mengembalikan teks "Halaman Tentang Kami" tanpa melalu Controller.

---

**Catatan Penting:** Gunakan `php artisan route:list` untuk melihat daftar rute yang telah terdaftar di aplikasi Anda.
