# Lab 5: Fetching Data from API

## Target Capaian

Mahasiswa mampu mengambil data dari API Laravel dan menampilkannya di aplikasi Flutter.

## Langkah-langkah

### 1. Instalasi HTTP Package

```bash
flutter pub add http
```

### 2. Membuat Data Model

Buat `lib/profile_model.dart`:

```dart
class Profile {
  final String name;
  final String about;

  Profile({required this.name, required this.about});

  factory Profile.fromJson(Map<String, dynamic> json) {
    return Profile(name: json['name'], about: json['about']);
  }
}
```

### 3. Fetching Data

Gunakan `FutureBuilder` di dalam Widget build:

```dart
Future<Profile> fetchProfile() async {
  final response = await http.get(Uri.parse('http://10.0.2.2:8000/api/profile'));
  return Profile.fromJson(jsonDecode(response.body));
}
```

## Tantangan Mandiri

Tampilkan pesan "Loading..." saat data sedang diambil, dan tampilkan pesan "Error" jika koneksi ke server gagal.
