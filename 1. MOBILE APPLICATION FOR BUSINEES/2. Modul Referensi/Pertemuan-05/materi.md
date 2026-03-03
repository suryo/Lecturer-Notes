# Pertemuan 5: Studi Kasus 1 - Company Profile (Read Data)

## Deskripsi Singkat

Sesi ini adalah implementasi praktis pertama yang menghubungkan Flutter dengan Laravel. Kita akan membangun aplikasi **Company Profile** yang mengambil data informasi perusahaan secara dinamis dari API Laravel menggunakan package `http`.

## Tujuan Instruksional

1. Mahasiswa mampu melakukan HTTP Request (GET) dari Flutter.
2. Mahasiswa mampu melakukan parsing data JSON menjadi Object Dart (Model).
3. Mahasiswa mampu menampilkan data dari API ke dalam UI Flutter secara dinamis.

## Materi Pembelajaran

### 1. Persiapan API di Laravel

Pastikan Laravel sudah menyediakan endpoint `GET /api/profile` yang mengembalikan data JSON:

```json
{
  "company_name": "Antigravity Tech",
  "description": "Solusi digital masa depan.",
  "email": "info@antigravity.id"
}
```

### 2. Menggunakan Package HTTP di Flutter

Instalasi: `flutter pub add http`.
Proses mengambil data:

1. Mendefinisikan URL Endpoint.
2. Menjalankan fungsi `http.get()`.
3. Mengecek Status Code (harus 200).

### 3. Membuat Data Model di Dart

Agar kode lebih rapi, kita tidak boleh menggunakan data JSON mentah. Kita harus mengubahnya menjadi Class Model.

```dart
class CompanyProfile {
  final String name;
  final String description;

  CompanyProfile({required this.name, required this.description});

  factory CompanyProfile.fromJson(Map<String, dynamic> json) {
    return CompanyProfile(
      name: json['company_name'],
      description: json['description'],
    );
  }
}
```

### 4. Menampilkan Data dengan FutureBuilder

`FutureBuilder` adalah widget yang sangat berguna untuk menangani proses asinkron (menunggu data dari internet).

- **connectionState == waiting**: Tampilkan Loading (CircularProgressIndicator).
- **hasData**: Tampilkan informasi perusahaan.
- **hasError**: Tampilkan pesan error.

## Praktikum

1. Buatlah project Flutter baru dan instal package `http`.
2. Buatlah Class Model sesuai dengan tabel database yang Anda buat di Pertemuan 4.
3. Gunakan `FutureBuilder` untuk menampilkan Nama Perusahaan dan Visi Misi yang diambil dari API Laravel.

## Latihan

Mengapa kita perlu melakukan penanganan error (try-catch) pada saat melakukan request data ke API? Sebutkan minimal 2 kondisi error yang mungkin terjadi.
