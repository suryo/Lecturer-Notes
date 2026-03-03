# Lab 03: Development Environment Setup (Laravel 11)

## Target Capaian

Mahasiswa berhasil menyiapkan lingkungan pengembangan dan membuat project Laravel baru.

## Langkah-langkah

### 1. Cek Kesiapan Tools

Buka Terminal/CMD dan jalankan perintah berikut:

```bash
php -v          # Minimal PHP 8.2
composer -v     # Pastikan Composer muncul
```

### 2. Membuat Project Laravel

Jalankan perintah ini di folder workspace Anda:

```bash
composer create-project laravel/laravel pweb2-laravel
```

### 3. Menjalankan Server

```bash
cd pweb2-laravel
php artisan serve
```

Akses `http://127.0.0.1:8000` di browser.

### 4. Konfigurasi .env

Sesuaikan bagian database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=pweb2_laravel
DB_USERNAME=root
DB_PASSWORD=
```

## Tantangan Mandiri

Ubah teks "Laravel" pada halaman awal menjadi "Selamat Datang di Pemrograman Web 2". Cari filenya di `resources/views/welcome.blade.php`.
