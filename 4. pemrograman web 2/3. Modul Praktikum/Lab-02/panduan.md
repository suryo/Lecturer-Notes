# Lab 02: Native PHP & MySQL (CRUD Dasar)

## Target Capaian

Mahasiswa mampu menghubungkan PHP ke MySQL dan melakukan operasi pengambilan data sederhana.

## Langkah-langkah

### 1. Persiapan Database

1. Buka [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2. Buat database `pweb2_lab02`.
3. Buat tabel `produk`:
   - `id` (INT, Primary Key, Auto Increment)
   - `nama_produk` (VARCHAR 100)
   - `harga` (INT)
4. Isi manual 2-3 data ke tabel tersebut.

### 2. Membuat File Koneksi (`koneksi.php`)

```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "pweb2_lab02";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
```

### 3. Menampilkan Data (`tampil_produk.php`)

```php
<?php
include 'koneksi.php';

$sql = "SELECT * FROM produk";
$result = mysqli_query($conn, $sql);
?>

<h2>Daftar Produk</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nama Produk</th>
        <th>Harga</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['nama_produk']; ?></td>
        <td><?= $row['harga']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>
```

## Tantangan Mandiri

Buatlah file `tambah_produk.php` yang berisi form HTML (input nama dan harga) dan proses simpan menggunakan `mysqli_query` dengan metode `POST`.
