# Pertemuan 1: Introduction to Mobile Business Apps

## Deskripsi Singkat

Sesi ini membahas arsitektur aplikasi bisnis modern yang menggunakan pemisahan antara Backend (Pusat Data & Logika) dan Frontend (Mobile Interface). Kita akan melakukan instalasi lingkungan pengembangan Flutter dan Laravel untuk pertama kalinya.

## Tujuan Instruksional

1. Mahasiswa memahami arsitektur **Clean Separation** (API-Centric).
2. Mahasiswa mampu menyiapkan environment Flutter (SDK, VS Code, Emulator).
3. Mahasiswa mampu menyiapkan environment Laravel (PHP, Composer).

## Materi Pembelajaran

### 1. Arsitektur Laravel-Flutter

Aplikasi bisnis modern tidak lagi menggabungkan tampilan dan logika dalam satu server (seperti PHP Native).

- **Backend (Laravel 10)**: Berjalan sebagai server API yang melayani data dalam format JSON.
- **Frontend (Flutter)**: Berjalan sebagai aplikasi native di smartphone yang meminta data ke server.

**Keuntungan**:

- Performa lebih cepat.
- User Experience (UX) yang lebih halus.
- Backend yang sama bisa digunakan untuk aplikasi Android, iOS, dan Web sekaligus.

### 2. Persiapan Environment Flutter

1. Download Flutter SDK.
2. Tambahkan ke system PATH.
3. Instal ekstensi Flutter & Dart di VS Code.
4. Jalankan `flutter doctor` untuk memastikan kesiapan.

### 3. Persiapan Environment Laravel

1. Instal PHP 8.1 ke atas (via XAMPP atau Laragon).
2. Instal Composer (Dependency Manager).
3. Instal Laravel Installer: `composer global require laravel/installer`.

### 4. Membuat Project Pertama

- **Flutter**: `flutter create my_business_app`
- **Laravel**: `laravel new business_api`

## Praktikum

1. Jalankan `flutter doctor` dan pastikan tidak ada error kritis (minimal Android Toolchain dan VS Code sudah OK).
2. Jalankan aplikasi default Flutter di HP fisik atau Emulator.
3. Jalankan `php artisan serve` di project Laravel dan pastikan halaman awal muncul.

## Latihan

Gambarkan skema sederhana alur data saat seorang pengguna melakukan login di aplikasi Flutter hingga divalidasi oleh database melalui Laravel.
