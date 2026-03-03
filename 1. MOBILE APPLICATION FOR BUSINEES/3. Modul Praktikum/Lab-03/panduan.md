# Lab 3: State Management with Provider

## Target Capaian

Mahasiswa mampu mengelola data sederhana antar widget menggunakan `provider`.

## Langkah-langkah

### 1. Instalasi Package

Buka `pubspec.yaml`, tambahkan di `dependencies`:

```yaml
dependencies:
  provider: ^6.0.0
```

Lalu jalankan `flutter pub get`.

### 2. Membuat Data Model

Buat file `lib/business_model.dart`:

```dart
import 'package:flutter/material.dart';

class BusinessModel extends ChangeNotifier {
  String companyName = "Startup Indonesia";

  void changeName(String newName) {
    companyName = newName;
    notifyListeners();
  }
}
```

### 3. Implementasi Provider

Bungkus `MaterialApp` dengan `ChangeNotifierProvider` di `main.dart`.
Gunakan `context.watch<BusinessModel>().companyName` untuk menampilkan data.
Gunakan `context.read<BusinessModel>().changeName("Nama Baru")` untuk mengubah data.

## Tantangan Mandiri

Buatlah sebuah `TextField` dan tombol "Update Nama". Ketika tombol diketik, `companyName` dalam Provider akan berubah sesuai isi TextField.
