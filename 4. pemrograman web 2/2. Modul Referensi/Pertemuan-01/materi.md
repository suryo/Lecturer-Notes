# Pertemuan 1: Pengenalan PHP & Web Server

## Deskripsi Singkat

Sesi ini memberikan penyegaran (refreshment) mengenai konsep dasar PHP sebagai bahasa pemrograman server-side dan cara kerja Web Server dalam memproses script PHP.

## Tujuan Instruksional

1. Mahasiswa memahami alur request-response pada aplikasi web.
2. Mahasiswa mampu menjalankan environment PHP menggunakan XAMPP/Laragon.
3. Mahasiswa menguasai syntax dasar PHP (Variabel, Tipe Data, Operator).
4. Mahasiswa mampu menggunakan struktur kontrol (If-Else, Looping) dalam PHP.

## Materi Pembelajaran

### 1. Bagaimana PHP Bekerja?

PHP adalah bahasa _Server-Side_. Berbeda dengan HTML/CSS (Client-Side), kode PHP dieksekusi di server sebelum hasilnya dikirim ke browser dalam bentuk HTML murni.

### 2. Syntax Dasar & Variabel

Variabel di PHP selalu diawali dengan tanda dolar (`$`).

```php
<?php
$nama = "Budi";
$umur = 20;

echo "Halo, Nama saya $nama dan saya berumur $umur tahun.";
?>
```

### 3. Struktur Kontrol

Digunakan untuk mengatur alur logika program.

```php
<?php
$nilai = 80;

if ($nilai >= 75) {
    echo "Lulus";
} else {
    echo "Tidak Lulus";
}

// Looping
for ($i = 1; $i <= 5; $i++) {
    echo "Iterasi ke-$i <br>";
}
?>
```

## Praktikum

1. Pastikan Apache di XAMPP/Laragon sudah menyala.
2. Buat file `index.php` di folder `htdocs`.
3. Buat program sederhana untuk menghitung diskon belanja menggunakan `if-else`.

## Latihan

Sebutkan perbedaan antara fungsi `echo` dan `print` di PHP! Manakah yang lebih sering digunakan?
