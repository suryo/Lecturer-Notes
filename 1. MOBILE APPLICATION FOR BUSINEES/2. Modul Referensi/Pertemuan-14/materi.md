# Pertemuan 14: Deployment (Production Readiness)

## Deskripsi Singkat

Sesi penutup ini membahas langkah-langkah merilis aplikasi ke dunia nyata. Kita akan belajar cara membangun file instalasi aplikasi (APK) untuk Android serta menyiapkan server Laravel agar bisa diakses oleh publik secara aman.

## Tujuan Instruksional

1. Mahasiswa mampu melakukan Build APK/App Bundle.
2. Mahasiswa mampu menyiapkan Server API di lingkungan produksi (Shared Hosting/VPS).
3. Mahasiswa memahami pentingnya keamanan API (Obfuscation & SSL).

## Materi Pembelajaran

### 1. Persiapan Rilis Flutter (Android)

1. Atur Nama Aplikasi dan Nama Paket (Package Name) yang unik.
2. Tambahkan Ikon Aplikasi (App Icon).
3. Buat **Keystore** (Tanda Tangan Digital).
4. Jalankan perintah: `flutter build apk --release`.

### 2. Persiapan Backend (Laravel)

- Ganti `APP_DEBUG=false` di `.env`.
- Gunakan Database produksi yang sesungguhnya.
- Jalankan perintah optimasi: `php artisan config:cache`, `route:cache`.
- Pastikan domain API sudah menggunakan **HTTPS/SSL** agar data transaksi aman.

### 3. Menghubungkan Flutter ke Server Asli

Ganti variabel `baseUrl` di kode Flutter Anda dari `http://10.0.2.2:8000` menjadi alamat domain asli (contoh: `https://api.toko-saya.com`).

### 4. Code Obfuscation (Keamanan)

Agar kode aplikasi Flutter Anda tidak mudah "diintip" oleh orang lain, gunakan fitur obfuscation saat melakukan build:

```bash
flutter build apk --obfuscate --split-debug-info=./debug-info
```

## Penutup Kuliah

Selamat! Anda telah membangun ekosistem aplikasi bisnis lengkap dari sisi server hingga client mobile. Jaga integritas data, utamakan keamanan user, dan teruslah belajar karena teknologi mobile berkembang sangat cepat.

---

**PENGUMUMAN UAS**:

- Selesaikan Aplikasi Online Shop Anda.
- Pastikan fitur Autentikasi, Katalog, Keranjang, dan Checkout berfungsi 100%.
- Dokumentasikan backend API Anda (URL-URL yang tersedia).

**Suksess untuk UAS Anda!**
