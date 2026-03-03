# Pertemuan 3: Introduction to Frameworks & Laravel 11 Setup

## Deskripsi Singkat

Setelah memahami PHP Native, sesi ini membahas alasan mengapa kita harus beralih ke Framework Web. Kita akan melakukan instalasi _tooling_ (Composer) dan memulai project Laravel 11 pertama.

## Tujuan Instruksional

1. Mahasiswa memahami kelebihan Framework dibandingkan Native PHP.
2. Mahasiswa mampu menginstal **Composer** sebagai Dependency Manager.
3. Mahasiswa mampu menjalankan aplikasi Laravel pertama kali.

## Materi Pembelajaran

### 1. Mengapa Framework? (Laravel vs Native)

Pada Pertemuan 1 & 2, kita menulis kode PHP secara manual. Tantangannya:

- Kode sulit dikelola jika aplikasi sudah besar (Spaghetti Code).
- Keamanan harus ditangani manual.
- Tidak ada standarisasi.

**Laravel** menawarkan solusi:

- **MVC Architecture**: Pemisahan logika data, tampilan, dan kontrol.
- **Security by Default**: Proteksi CSRF, XSS, dan SQL Injection otomatis.
- **Eloquent ORM**: Interaksi database yang lebih elegan.

### 2. Persiapan & Instalasi

Laravel 11 membutuhkan:

- **PHP >= 8.2**
- **Composer** (Manager library PHP)

Perintah membuat project baru:

```bash
composer create-project laravel/laravel my-app
```

### 3. Menjalankan Server

```bash
php artisan serve
```

Akses di `http://127.0.0.1:8000`.

## Praktikum

1. Cek versi PHP Anda (`php -v`).
2. Instal Laravel 11 dengan nama project `pweb2_laravel`.
3. Eksplorasi struktur folder, temukan file `.env` dan folder `routes`.

## Latihan

Jelaskan perbedaan utama dalam pengelolaan database antara cara Native (Pertemuan 2) dengan cara Laravel (yang akan kita pelajari mulai pertemuan ini).
