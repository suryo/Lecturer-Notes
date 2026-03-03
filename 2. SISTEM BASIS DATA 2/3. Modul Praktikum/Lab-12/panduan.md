# Lab 12: Keamanan Basis Data

## Target Capaian

Mahasiswa mampu mengidentifikasi celah SQL Injection dan memperbaikinya menggunakan Prepared Statements.

## Langkah-langkah

### 1. Simulasi Serangan (DO NOT DO THIS ON PUBLIC SITES)

Jalankan aplikasi lab yang rentan. Coba masukkan `' OR '1'='1` pada kolom password login. Lihat apakah Anda bisa masuk tanpa password.

### 2. Perbaikan Kode

Ganti kueri manual dengan Parameterized Query.
Contoh (PHP PDO):

```php
$stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
$stmt->execute([$_POST['user']]);
```

### 3. Keamanan NoSQL

Eksplorasi panel "Rules" di Firebase atau "Security" di MongoDB Atlas. Batasi akses agar hanya IP Anda yang bisa mengakses database.

## Tugas Praktikum

Tunjukkan bukti (screenshot) aplikasi Anda sebelum diperbaiki (berhasil di-bypass) dan sesudah diperbaiki (serangan gagal).
