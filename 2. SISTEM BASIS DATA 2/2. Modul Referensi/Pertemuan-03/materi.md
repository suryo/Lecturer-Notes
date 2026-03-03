# Pertemuan 3: Stored Procedures & Functions dalam SQL

## Deskripsi Singkat

Sesi ini membahas cara membungkus logika bisnis yang kompleks di dalam database menggunakan Stored Procedures dan Functions baik di MySQL maupun PostgreSQL.

## Tujuan Instruksional

1. Mahasiswa memahami perbedaan antara Procedure dan Function.
2. Mahasiswa mampu membuat Stored Procedure dengan parameter IN, OUT, dan INOUT.
3. Mahasiswa mampu mengimplementasikan logika percabangan dan perulangan di SQL.

## Materi Pembelajaran

### 1. Konsep Dasar

- **Stored Procedure**: Kumpulan perintah SQL yang disimpan dan dijalankan di server. Tidak harus mengembalikan nilai. Bagus untuk proses batch.
- **Function**: Mirip prosedur tapi **harus** mengembalikan satu nilai. Bisa dipanggil di dalam kueri `SELECT`.

### 2. Parameter & Variabel

- **IN**: Parameter input.
- **OUT**: Menyimpan hasil eksekusi untuk dikembalikan ke pemanggil.
- **Variables**: Mendeklarasikan variabel internal untuk perhitungan sementara.

### 3. Logika Control Flow

Gunakan `IF-ELSE`, `CASE`, dan `WHILE/LOOP` untuk membuat logika yang berurutan di dalam database. Hal ini mengurangi lalu lintas jaringan antara aplikasi dan database.

## Praktikum

1. Buatlah procedure `ApplyDiscount` yang menerima ID Produk dan persentase diskon.
2. Buat function `CalculateTax` untuk menghitung pajak 11% dari harga jual.
3. Contoh implementasi di PostgreSQL menggunakan bahasa PL/pgSQL.

## Latihan

Sebutkan 3 keuntungan menggunakan Stored Procedure dibandingkan menulis logika SQL panjang langsung di bahasa pemrograman aplikasi (misal di PHP/Python).
