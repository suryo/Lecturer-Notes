# Lab 14: Building APK for Release

## Target Capaian

Mahasiswa mampu menghasilkan file instalasi (.apk) yang siap dibagikan ke pengguna.

## Langkah-langkah

### 1. Setup App Icon

Gunakan package `flutter_launcher_icons` untuk mengganti ikon default Flutter dengan ikon bisnis Anda.

### 2. Build Release

Jalankan perintah building:

```bash
flutter build apk --release
```

### 3. Lokasi File

Cari file hasil build di: `build/app/outputs/flutter-apk/app-release.apk`.

## Penutup Praktikum

Selamat! Anda telah berhasil membangun aplikasi bisnis mobile dari nol hingga siap instal.

## Tantangan Akhir

Instal file APK tersebut di HP teman Anda dan pastikan aplikasi tetap dapat terhubung ke server Laravel (Pastikan server menggunakan IP Publik atau hosting).
