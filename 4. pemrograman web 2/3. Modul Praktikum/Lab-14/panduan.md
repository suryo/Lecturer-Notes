# Lab 14: Deployment Checklist (Production)

## Target Capaian

Mahasiswa memahami konfigurasi akhir sebelum go-live.

## Langkah-langkah

1. Matikan Debugging: `APP_DEBUG=false` di `.env`.
2. Jalankan Perintah Cache:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. Ekspor Database SQL untuk persiapan migrasi ke Hosting.

## Tantangan Mandiri

Cek ukuran folder `vendor` dan folder `node_modules`. Mana yang lebih besar? Mengapa kita tidak boleh mengupload folder tersebut ke Git?
