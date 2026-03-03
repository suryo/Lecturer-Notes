# Lab 7: Form Submission & Validation

## Target Capaian

Mahasiswa mampu membuat form input di Flutter, memvalidasinya, dan mengirim data POST ke API Laravel.

## Langkah-langkah

### 1. Membuat Form Widget

```dart
final _formKey = GlobalKey<FormState>();
TextFormField(
  validator: (value) => value!.isEmpty ? 'Tidak boleh kosong' : null,
  controller: _nameController,
)
```

### 2. Pengiriman Data (POST)

```dart
http.post(
  Uri.parse('http://10.0.2.2:8000/api/profile/update'),
  body: {'name': _nameController.text},
);
```

## Tantangan Mandiri

Gunakan `SnackBar` untuk memberikan notifikasi kepada user apakah data berhasil disimpan atau gagal.
