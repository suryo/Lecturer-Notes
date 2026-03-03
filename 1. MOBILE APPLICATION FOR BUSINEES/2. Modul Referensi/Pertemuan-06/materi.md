# Pertemuan 6: Multimedia Management (Image Upload)

## Deskripsi Singkat

Aplikasi bisnis tidak terlepas dari pengelolaan file gambar (Logo, Foto Produk, Foto Karyawan). Sesi ini membahas cara mengambil gambar menggunakan kamera/galeri di Flutter dan mengunggahnya ke server Laravel menggunakan `MultipartRequest`.

## Tujuan Instruksional

1. Mahasiswa mampu menggunakan package `image_picker` di Flutter.
2. Mahasiswa mampu mengkonfigurasi Laravel FileSystem (Public Link).
3. Mahasiswa mampu melakukan upload file menggunakan Multipart HTTP Request.

## Materi Pembelajaran

### 1. Menyiapkan Image Picker di Flutter

1. Instal: `flutter pub add image_picker`.
2. Tambahkan izin (permission) di `AndroidManifest.xml` (Android) dan `Info.plist` (iOS).
3. Buat fungsi untuk membuka galeri:

```dart
final ImagePicker picker = ImagePicker();
final XFile? image = await picker.pickImage(source: ImageSource.gallery);
```

### 2. Konfigurasi Backend Laravel

Agar gambar dapat diakses oleh aplikasi Mobile, folder storage Laravel harus dihubungkan ke folder public.

```bash
php artisan storage:link
```

Pastikan di Controller Laravel menggunakan method `store()` untuk menyimpan file ke disk 'public'.

### 3. Mengirim File via Multipart Request

Untuk mengirim file, kita tidak bisa menggunakan format JSON biasa. Kita harus menggunakan `http.MultipartRequest`.

```dart
var request = http.MultipartRequest('POST', Uri.parse(url));
request.files.add(await http.MultipartFile.fromPath('logo', imagePath));
var response = await request.send();
```

### 4. Menampilkan Gambar dari URL

Gunakan widget `Image.network()` dan arahkan ke domain server Anda:
`Image.network("http://domain-anda.com/storage/logo.png")`.

## Praktikum

1. Tambahkan fitur "Ubah Logo" pada aplikasi Company Profile Anda.
2. Mahasiswa harus bisa memilih gambar dari galeri HP.
3. Kirim gambar tersebut ke API Laravel dan simpan di folder `storage/app/public/logos`.
4. Pastikan UI Flutter diperbarui untuk menampilkan logo yang baru diupload.

## Latihan

Sebutkan perbedaan antara method `Image.asset()`, `Image.network()`, dan `Image.file()` di Flutter. Kapan masing-masing sebaiknya digunakan?
