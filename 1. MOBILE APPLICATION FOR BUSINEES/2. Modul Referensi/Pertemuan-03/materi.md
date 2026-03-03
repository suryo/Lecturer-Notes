# Pertemuan 3: Advanced UI & State Management

## Deskripsi Singkat

Sesi ini membahas cara mengelola perubahan tampilan secara efisien menggunakan **State Management**. Kita akan belajar mengapa `setState` tidak cukup untuk aplikasi bisnis yang kompleks dan mulai mengenal pola **Provider** sebagai solusi yang lebih rapi dan skalabel.

## Tujuan Instruksional

1. Mahasiswa memahami masalah "Prop Drilling".
2. Mahasiswa mampu mengimplementasikan Interaktivitas (Form, Button, Gesture).
3. Mahasiswa mampu menerapkan dasar State Management menggunakan package `provider`.

## Materi Pembelajaran

### 1. Interaktivitas: Menangani Input User

Aplikasi bisnis sangat bergantung pada input:

- **TextField**: Mengambil teks (Nama, Username, Password).
- **ElevatedButton**: Menjalankan aksi (Simpan, Hapus).
- **GestureDetector**: Memberikan aksi pada widget apa saja (misal: klik gambar).

### 2. Mengapa Butuh State Management?

Saat aplikasi semakin besar, berbagi data antar halaman menjadi sulit.

- `setState()`: Hanya berlaku lokal di satu file/widget.
- **State Management**: Memungkinkan data (seperti daftar belanjaan atau status login) diakses dari mana saja tanpa perlu dikirim manual antar halaman.

### 3. Implementasi Provider

1. Instal package: `flutter pub add provider`.
2. Buat class Model yang meng-extends `ChangeNotifier`.
3. Gunakan `notifyListeners()` saat ada data yang berubah.
4. Bungkus aplikasi dengan `ChangeNotifierProvider`.

### 4. Navigasi Halaman

Membangun alur aplikasi (Route):

- `Navigator.push()`: Berpindah ke halaman baru.
- `Navigator.pop()`: Kembali ke halaman sebelumnya.
- **Named Routes**: Menggunakan nama String untuk mempermudah manajemen URL/Route.

## Praktikum

1. Buatlah sebuah aplikasi "Buku Catatan" sederhana.
2. Gunakan `TextField` untuk memasukkan catatan baru.
3. Gunakan `Provider` untuk menampung daftar catatan tersebut.
4. Tampilkan daftar catatan di halaman baru menggunakan `ListView.builder`.

## Latihan

Apa keuntungan menggunakan `ListView.builder` dibandingkan `ListView` biasa saat menampilkan data yang berjumlah ratusan (seperti daftar transaksi bisnis)?
