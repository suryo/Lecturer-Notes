# Lab 1: Setup & Environment Checklist

## Target Capaian

Mahasiswa memiliki lingkungan pengembangan (Flutter & Laravel) yang siap digunakan.

## Langkah-langkah

### 1. Verifikasi Flutter

Buka terminal dan jalankan:

```bash
flutter doctor
```

Pastikan **Flutter SDK**, **Android Toolchain**, dan **VS Code** memiliki tanda centang hijau.

### 2. Membuat Project Flutter

```bash
flutter create business_app
cd business_app
flutter run
```

Pastikan aplikasi default (counter) berjalan di emulator atau HP fisik.

### 3. Verifikasi Laravel

Buka terminal baru:

```bash
php -v
composer -v
```

Pastikan PHP versi 8.1+ dan Composer sudah terinstal.

### 4. Membuat Project Laravel

```bash
composer create-project laravel/laravel:^10.0 business_api
cd business_api
php artisan serve
```

Akses `http://127.0.0.1:8000` di browser.

## Tantangan Mandiri

Ubah teks "You have pushed the button this many times" pada aplikasi Flutter default menjadi "Welcome to Business App".
