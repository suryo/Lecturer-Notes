# Pertemuan 10: Integrasi Basis Data dengan Aplikasi Web

## Deskripsi Singkat

Sesi ini menjembatani dunia database dengan dunia pengembangan aplikasi. Kita akan belajar cara menghubungkan MySQL/PostgreSQL ke aplikasi web menggunakan PHP (Laravel) dan Python (Flask/Django).

## Tujuan Instruksional

1. Mahasiswa memahami arsitektur Client-Server.
2. Mahasiswa mampu membuat koneksi database di PHP dan Python.
3. Mahasiswa mampu membangun REST API sederhana untuk manipulasi data (CRUD).

## Materi Pembelajaran

### 1. Arsitektur Koneksi

Aplikasi web tidak mengakses database secara langsung lewat browser, melainkan melalui **Backend Server** demi keamanan.

- **Connection String**: Berisi Host, Port, Username, Password, dan Nama DB.
- **Pooling**: Teknik menjaga koneksi tetap terbuka agar lebih cepat.

### 2. ORM vs Query Builder

- **Row SQL**: Menulis kueri mentah (`SELECT * FROM...`).
- **ORM (Object-Relational Mapping)**: Memanipulasi database seolah-olah memanipulasi object bahasa pemrograman (contoh: Eloquent di Laravel, SQLAlchemy di Python).

### 3. REST API & JSON

Aplikasi modern berkomunikasi lewat JSON.

- **GET**: Membaca data.
- **POST**: Menambah data.
- **PUT/PATCH**: Mengubah data.
- **DELETE**: Menghapus data.

## Praktikum

1. Buatlah file koneksi sederhana di PHP atau Python.
2. Implementasikan satu endpoint API yang mengambil daftar mahasiswa dari database dan mengembalikannya dalam format JSON.
3. Gunakan **Postman** untuk menguji kueri tersebut.

## Latihan

Mengapa kita dilarang keras menyimpan password database secara hardcoded di dalam kode aplikasi? Sebutkan cara yang lebih aman (misal: menggunakan `.env`).
