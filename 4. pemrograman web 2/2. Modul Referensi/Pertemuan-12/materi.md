# Pertemuan 12: Middleware & File Uploads

## Deskripsi Singkat

Sesi gabungan yang membahas pembuatan Middleware kustom (misal role Admin) dan cara menangani unggahan file/gambar.

## Materi Pembelajaran

- **Custom Middleware**: Pengecekan role user (Admin/User).
- **FileSystem**: `storage/app/public` dan `php artisan storage:link`.
- **Upload Image**: Method `store()` pada Request object.

## Praktikum

1. Buat middleware `IsAdmin`.
2. Implementasikan upload foto produk pada form produk.
