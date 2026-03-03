# Pertemuan 2: Koneksi PHP ke MySQL (CRUD Native)

## Deskripsi Singkat

Sesi ini membahas cara menghubungkan script PHP dengan database MySQL secara manual (Native) menggunakan `mysqli`. Ini penting agar mahasiswa memahami proses di "bawah kap" sebelum menggunakan ORM di Framework.

## Tujuan Instruksional

1. Mahasiswa mampu melakukan koneksi database menggunakan PHP.
2. Mahasiswa mampu menjalankan query SQL (SELECT, INSERT, UPDATE, DELETE) dari PHP.
3. Mahasiswa memahami pentingnya _Prepared Statements_ untuk keamanan dasar.

## Materi Pembelajaran

### 1. Membuat Koneksi

```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "pweb2_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
echo "Koneksi Berhasil";
?>
```

### 2. Membaca Data (SELECT)

```php
$sql = "SELECT id, nama, email FROM users";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . $row["id"]. " - Name: " . $row["nama"]. "<br>";
}
```

### 3. Keamanan Dasar: Prepared Statements

Untuk mencegah SQL Injection, jangan pernah memasukkan variabel langsung ke dalam string query.

```php
$stmt = $conn->prepare("INSERT INTO users (nama, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);

$name = "Andi";
$email = "andi@mail.com";
$stmt->execute();
```

## Praktikum

1. Buat database `pweb2_db` dan tabel `mahasiswa`.
2. Buatlah file `tampil.php` untuk menampilkan daftar mahasiswa dari database ke dalam tabel HTML.
3. Buatlah file `tambah.php` yang berisi form untuk menambah data mahasiswa baru.

## Latihan

Apa bahayanya jika kita menggunakan fungsi `mysqli_query` langsung dengan gabungan variabel (string concatenation) untuk memproses input dari user?
