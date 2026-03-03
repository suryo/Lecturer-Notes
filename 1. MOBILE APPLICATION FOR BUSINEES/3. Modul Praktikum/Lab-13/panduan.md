# Lab 13: Firebase Integration (FCM)

## Target Capaian

Mahasiswa mampu menghubungkan aplikasi Flutter dengan Firebase untuk menerima pesan/notifikasi.

## Langkah-langkah

### 1. Setup Firebase Console

Daftarkan aplikasi di [console.firebase.google.com](https://console.firebase.google.com). Download file `google-services.json`.

### 2. Instalasi Package

```bash
flutter pub add firebase_core firebase_messaging
```

### 3. Mengambil Device Token

```dart
FirebaseMessaging messaging = FirebaseMessaging.instance;
String? token = await messaging.getToken();
print("Token Saya: $token");
```

## Tantangan Mandiri

Kirim notifikasi testing melalui Dashboard Firebase "Cloud Messaging" dan pastikan notifikasi muncul di HP Anda.
