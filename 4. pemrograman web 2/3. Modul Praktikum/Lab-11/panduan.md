# Lab 11: Authentication & Authorization (Breeze)

## Target Capaian

Mahasiswa mampu menginstal sistem login siap pakai.

## Langkah-langkah

```bash
composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate
npm install && npm run dev
```

## Tantangan Mandiri

Bungkus route manajemen data Anda menggunakan middleware `auth` dan coba akses tanpa login.
