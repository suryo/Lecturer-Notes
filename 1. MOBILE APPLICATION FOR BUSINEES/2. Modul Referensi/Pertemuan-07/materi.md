# Pertemuan 7: Data Interaction (Form Submission)

## Deskripsi Singkat

Sesi ini membahas interaksi dua arah antara user dan sistem. Kita akan belajar cara membangun form di Flutter (Login, Input Data Bisnis), memvalidasi input tersebut, dan mengirimkannya balik ke server Laravel (POST/PUT).

## Tujuan Instruksional

1. Mahasiswa mampu membangun form dengan `GlobalKey<FormState>`.
2. Mahasiswa mampu melakukan validasi input secara akurat di sisi Client.
3. Mahasiswa mampu mengirim data (body) menggunakan POST Request ke API Laravel.

## Materi Pembelajaran

### 1. Membangun Form Berkualitas

Gunakan widget `Form` dan `TextFormField`. Keuntungannya:

- Mendukung fitur auto-validation.
- Mendukung fitur `onSaved` untuk mengumpulkan semua data input sekaligus.

### 2. Validasi Input (Client-Side)

Jangan kirim data ke server jika formatnya salah.

```dart
validator: (value) {
  if (value == null || value.isEmpty) {
    return 'Nama perusahaan tidak boleh kosong';
  }
  return null;
},
```

### 3. Mengirim Data POST ke Laravel

Data dikirim dalam format Map (Key-Value) yang akan diubah menjadi JSON string.

```dart
var response = await http.post(
  Uri.parse(url),
  headers: {"Content-Type": "application/json"},
  body: jsonEncode({
    "name": nameController.text,
    "email": emailController.text,
  }),
);
```

### 4. Handling Response & Loading State

Selalu beri umpan balik ke user saat proses pengiriman:

- Tampilkan `CircularProgressIndicator` saat loading.
- Tampilkan `SnackBar` jika berhasil atau gagal.

## Praktikum

1. Lanjutkan aplikasi Company Profile. Buatlah satu halaman baru untuk "Update Informasi Perusahaan".
2. Masukkan input untuk Nama, Alamat, dan Deskripsi.
3. Implementasikan tombol "Simpan Perubahan" yang mengirim data POST ke Laravel.
4. Pastikan data di database terupdate dan UI di Flutter ikut berubah setelah proses simpan.

## Latihan

Apa fungsi dari `TextEditingController` di Flutter? Mengapa kita harus memanggil `dispose()` pada controller tersebut di akhir siklus hidup widget?
