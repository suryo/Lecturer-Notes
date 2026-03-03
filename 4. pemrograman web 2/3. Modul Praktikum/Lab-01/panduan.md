# Lab 01: Dasar PHP & Web Server

## Target Capaian

Mahasiswa mampu menjalankan file PHP pada server lokal dan mengimplementasikan algoritma dasar menggunakan syntax PHP.

## Langkah-langkah

### 1. Menyiapkan Environment

1. Buka aplikasi **XAMPP** dan klik **Start** pada modul Apache.
2. Navigasi ke folder `C:\xampp\htdocs\`.
3. Buat folder baru bernama `pweb2_lab01`.

### 2. Dasar Output & Variabel

Buat file `index.php` di dalam folder tersebut:

```php
<?php
$nama = "Siswa Pemrograman Web";
echo "<h1>Halo, $nama!</h1>";
echo "<p>Selamat datang di praktikum pertama.</p>";
?>
```

### 3. Operasi Logika (Diskon Belanja)

Tambahkan kode berikut untuk menghitung diskon:

```php
<?php
$total_belanja = 150000;
$diskon = 0;

if ($total_belanja > 100000) {
    $diskon = 0.1 * $total_belanja; // 10%
}

$total_bayar = $total_belanja - $diskon;

echo "Total Belanja: Rp " . number_format($total_belanja) . "<br>";
echo "Potongan Diskon: Rp " . number_format($diskon) . "<br>";
echo "<strong>Total Bayar: Rp " . number_format($total_bayar) . "</strong>";
?>
```

## Tantangan Mandiri

Buatlah perulangan `for` yang menampilkan angka 1 sampai 10, namun angka genap harus dicetak miring (_italic_) dan angka ganjil dicetak tebal (**bold**).
