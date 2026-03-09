# Pertemuan 3: Routing, Controllers & Blade Templating (Laravel Backend)

## Deskripsi Singkat

Sesi ini berfokus pada pembangunan struktur antarmuka (Frontend) dan alur navigasi (Backend) aplikasi Toko Online menggunakan Laravel. Mahasiswa akan belajar cara memetakan URL ke fungsi tertentu (Routing), mengelola data melalui Controller, dan membangun tampilan yang dinamis menggunakan Blade Templating Engine.

## Tujuan Instruksional

1. Mahasiswa memahami konsep **Routing** di Laravel (Public, Auth, & Admin Routes).
2. Mahasiswa mampu membuat dan menggunakan **Controllers** untuk menangani logika aplikasi.
3. Mahasiswa memahami **Blade Templating** (Layouts, Sections, Yield, Includes).
4. Mahasiswa mampu menampilkan data dari **Database (Model)** ke dalam tampilan (View).
5. Mahasiswa memahami alur navigasi user (User Flow) dalam aplikasi E-Commerce.

---

## Materi Pembelajaran

### 1. Laravel Routing (`routes/web.php`)

Routing mendefinisikan URL apa saja yang tersedia di aplikasi kita. Dalam E-Commerce, route dibagi menjadi tiga kategori utama:

- **Public Routes**: Halaman yang bisa diakses siapa saja (Home, Produk).
- **Auth Routes**: Halaman pendaftaran dan masuk akun.
- **Member Routes**: Halaman yang membutuhkan login (Keranjang, Checkout, Profil).
- **Admin Routes**: Panel khusus pengelola toko (Dashboard Admin).

### 2. Laravel Controllers

Controller berfungsi sebagai penghubung antara Model (Data) dan View (Tampilan).

- Perintah: `php artisan make:controller NamaController`
- Contoh: `LandingController` mengambil 8 produk terbaru dari database dan mengirimkannya ke view `home`.

### 3. Blade Templating (Layouting)

Blade memungkinkan kita membuat satu file layout utama (`layouts/app.blade.php`) yang berisi header, navbar, dan footer, sehingga halaman lain hanya perlu mengisi bagian kontennya saja.

- `@yield('content')`: Menandai area yang akan diisi oleh halaman lain.
- `@extends('layouts.app')`: Mewarisi struktur dari file layout.
- `{{ Auth::user()->nama }}`: Menampilkan data pengguna yang sedang login.

---

## Praktikum: Membangun Antarmuka Toko Online

### Langkah 1: Registrasi Routes Utama

Mendaftarkan alur navigasi di `routes/web.php`:

```php
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/produk', [ProductController::class, 'index'])->name('product.index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
```

### Langkah 2: Pembuatan Controllers

Menyiapkan controller untuk setiap fitur:

- `LandingController`, `ProductController`, `AuthController`
- `CartController`, `OrderController`, `ProfileController`
- `Admin\DashboardController`

### Langkah 3: Membuat Layout & Views

Membangun tampilan menggunakan **Bootstrap 5**:

1. Buat `resources/views/layouts/app.blade.php` sebagai kerangka utama.
2. Buat view `home.blade.php` untuk menampilkan daftar produk.
3. Buat folder `auth/`, `products/`, `cart/`, `orders/`, dan `profile/` untuk mengelompokkan tampilan.

### Langkah 4: Menghubungkan Model ke View

Mengambil data dari database (Pertemuan 2) untuk ditampilkan:

```php
// Di ProductController.php
$products = Produk::paginate(12);
return view('products.index', compact('products'));
```

---

## Tugas Mandiri

1. **Custom Filter**: Tambahkan fungsi pencarian sederhana pada `ProductController` agar user bisa mencari produk berdasarkan nama.
2. **Admin Protection**: Implementasikan middleware `auth` dan pengecekan role `admin` agar halaman `/admin` tidak bisa diakses oleh pelanggan biasa.
3. **Visual Improvement**: Ganti ikon placeholder (Emoji 📦) pada view dengan file gambar asli menggunakan tag `<img>` yang mengambil data dari kolom `foto_produk`.

---

**Catatan Penting:** Pastikan semua Model (Produk, Kategori, dsb) sudah memiliki `protected $table = 'nama_tabel';` jika nama tabel di database menggunakan bentuk tunggal (singular).
