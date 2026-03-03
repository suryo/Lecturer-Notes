# Pertemuan 12: Keamanan Basis Data

## Deskripsi Singkat

Database adalah aset paling berharga. Sesi ini membahas berbagai ancaman keamanan pada database (terutama SQL Injection) dan cara-cara terbaik untuk melindungi data pengguna.

## Tujuan Instruksional

1. Mahasiswa memahami mekanisme serangan SQL Injection.
2. Mahasiswa mampu mengimplementasikan Prepared Statements untuk mencegah serangan.
3. Mahasiswa memahami teknik enkripsi data dan kontrol akses di NoSQL.

## Materi Pembelajaran

### 1. SQL Injection (SQLi)

Serangan di mana penyerang memasukkan perintah SQL berbahaya melalui input form aplikasi.

- **Bahaya**: Data bisa bocor, terhapus, atau hacker bisa bypass login.
- **Solusi**: Jangan pernah menggabungkan string input user secara langsung ke kueri SQL.

### 2. Prepared Statements & Parameterized Queries

Cara paling ampuh mencegah SQLi:

```php
// SALAH (Rentan SQLi)
$sql = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "'";

// BENAR (Aman)
$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
$stmt->execute(['email' => $_POST['email']]);
```

### 3. Keamanan NoSQL & Enkripsi

- **MongoDB**: Mengaktifkan Atentikasi (Auth) dan membatasi akses IP.
- **Encryption at Rest**: Mengenkripsi file database di storage server.
- **Encryption in Transit**: Menggunakan SSL/TLS (HTTPS) saat mengirim data antara aplikasi dan database.

## Praktikum

1. Simulasi serangan SQL Injection pada aplikasi lab yang sengaja dibuat rentan.
2. Perbaiki kueri tersebut menggunakan **Prepared Statements**.
3. Atur Hak Akses User (User Privileges) di MySQL untuk memastikan prinsip "Least Privilege".

## Latihan

Selain SQL Injection, coba jelaskan apa yang dimaksud dengan **NoSQL Injection**. Berikan contoh sederhana pada kueri MongoDB.
