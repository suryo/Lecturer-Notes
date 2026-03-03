# Pertemuan 13: Real-time Notifications Concept

## Deskripsi Singkat

Aplikasi bisnis yang responsif perlu memberikan informasi cepat kepada user, misalnya saat pesanan dikonfirmasi atau ada promo baru. Sesi ini membahas konsep **Push Notifications** menggunakan layanan cloud seperti **Firebase Cloud Messaging (FCM)**.

## Tujuan Instruksional

1. Mahasiswa memahami alur kerja Push Notification (Server -> Cloud -> Device).
2. Mahasiswa mampu melakukan registrasi project di Firebase Console.
3. Mahasiswa memahami integrasi package `firebase_messaging` di Flutter.

## Materi Pembelajaran

### 1. Bagaimana Notifikasi Bekerja?

Karena aplikasi mobile tidak selalu aktif di foreground, sistem operasi (Android/iOS) membutuhkan perantara untuk mengirim pesan.

1. Laravel mengirim pesan ke **Firebase Cloud Messaging**.
2. Firebase mengirimkan pesan ke Device Token yang spesifik.
3. Smartphone menampilkan notifikasi di baris status.

### 2. Setup Firebase di Flutter

1. Buat akun di Firebase Console.
2. Tambahkan aplikasi Android/iOS.
3. Download file konfigurasi (`google-services.json`).
4. Inisialisasi Firebase di `main.dart`.

### 3. Mengambil Device Token

Agar server tahu siapa yang harus dikirimkan pesan, Flutter harus mengirimkan "Alamat Unik" HP ke database Laravel.

```dart
String? token = await FirebaseMessaging.instance.getToken();
// Kirim token ini ke API Laravel 'save-token'
```

### 4. Mengirim Notifikasi dari Laravel

Gunakan library seperti `kreait/laravel-firebase` atau via HTTP Request langsung ke API Google Firebase.

## Praktikum

1. Daftarkan project Anda ke Firebase Console.
2. Hubungkan konfigurasi Firebase ke project Flutter Anda.
3. Buatlah script sederhana di Flutter untuk memunculkan (print) Token FCM Anda ke konsol.
4. (Opsional/Demo) Coba kirimkan pesan testing dari Dashboard Firebase dan pastikan muncul di HP/Emulator Anda.

## Latihan

Apa perbedaan antara **Foreground Message** dan **Background Message**? Mengapa penanganannya di Flutter berbeda (perlu `onMessage` vs `onBackgroundMessage`)?
