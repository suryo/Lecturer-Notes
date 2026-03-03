# Pertemuan 2: Flutter UI Fundamentals

## Deskripsi Singkat

Sesi ini membahas dasar-dasar membangun antarmuka aplikasi bisnis. Fokus utama adalah memahami konsep **Widget**, perbedaan `Stateless` vs `Stateful`, serta membangun layout yang responsif untuk berbagai ukuran layar.

## Tujuan Instruksional

1. Mahasiswa memahami konsep "Everything is a Widget".
2. Mahasiswa mampu menggunakan Basic Widgets (Container, Column, Row, Stack).
3. Mahasiswa mampu membedakan penggunaan Stateless dan Stateful Widget.

## Materi Pembelajaran

### 1. Mengenal Widget

Di Flutter, antarmuka dibangun dari susunan widget yang bersarang (nested).

- **MaterialApp**: Kerangka utama aplikasi.
- **Scaffold**: Struktur halaman (AppBar, Body, FloatingActionButton).

### 2. Stateless vs Stateful Widget

- **StatelessWidget**: Widget yang tampilannya statis (tidak berubah setelah dibuat). Contoh: Logo, Icon, Teks Label.
- **StatefulWidget**: Widget yang tampilannya dinamis berdasarkan data atau interaksi user. Contoh: Counter, Form Input, Checkbox.

### 3. Layouting 101

Untuk aplikasi bisnis, kerapian layout sangat penting:

- **Column**: Menyusun widget secara vertikal.
- **Row**: Menyusun widget secara horizontal.
- **Stack**: Menumpuk widget secara berlapis.
- **Padding/Margin**: Memberikan ruang antar elemen.

### 4. Struktur Folder Project Flutter

- `lib/`: Tempat kode utama Dart.
- `assets/`: Tempat file gambar, font, atau file pendukung.
- `pubspec.yaml`: Tempat instalasi library/package pihak ketiga.

## Praktikum

1. Buatlah sebuah halaman "Profil Toko" sederhana menggunakan Scaffold.
2. Gunakan `Column` untuk menyusun Foto Toko, Nama Toko, dan Deskripsi.
3. Gunakan `Row` untuk menampilkan ikon Media Sosial toko di bagian bawah.
4. Terapkan `Padding` agar tampilan tidak menempel ke pinggir layar.

## Latihan

Kapan sebaiknya kita menggunakan `Center` widget dan kapan sebaiknya menggunakan `Align` widget? Berikan perbedaannya.
