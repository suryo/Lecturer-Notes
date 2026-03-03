# Pertemuan 8: Midterm Break & Materi Review (Laravel)

## Deskripsi Singkat

Sesi ini meninjau kembali konsep-konsep inti Laravel yang telah dipelajari selama 7 pertemuan pertama. Fokus utamanya adalah memastikan mahasiswa mampu membangun aplikasi web sederhana yang memiliki alur MVC lengkap, mulai dari database hingga tampilan.

## Topik Utama yang Direview

1.  **Arsitektur MVC**: Memahami alur Request -> Route -> Controller -> Model -> View.
2.  **Blade Templating**: Penggunaan layout inheritance (`@extends`) dan penyajian data (`{{ }}`).
3.  **Database & Migration**: Membuat dan memodifikasi tabel menggunakan command Artisan.
4.  **Eloquent CRUD**: Menambahkan, menyaji, mengubah, dan menghapus data menggunakan Model.
5.  **Validation**: Memastikan input user aman dan sesuai kriteria.
6.  **Relationships**: Menghubungkan antar tabel (misal: Produk memiliki Kategori).

## Panduan Ujian Tengah Semester (UTS)

Bentuk UTS biasanya berupa **Mini Project** atau **Ujian Praktik** yang mencakup:

- **Fitur CRUD Penuh**: Mahasiswa diminta membuat modul pengelolaan data (misal: Manajemen Buku, Manajemen Inventaris).
- **Kualitas Kode**: Penomoran route yang rapi, penamaan controller yang sesuai standar, dan penggunaan Master Layout.
- **Validasi**: Form harus memiliki validasi yang mencegah data kosong atau tidak valid masuk ke DB.
- **Relasi**: Minimal terdapat relasi antara dua tabel.

## Kriteria Kesiapan

Mahasiswa dianggap siap UTS jika mampu:

- Membuat Route yang mengarahkan ke Controller secara benar.
- Menampilkan pesan error validasi di halaman Form.
- Menyajikan data dari dua tabel yang berelasi dalam satu halaman (looping data).

## Tips Persiapan

- Praktekkan membuat satu modul CRUD lengkap dari nol (tanpa melihat catatan).
- Pahami cara membaca pesan error Laravel (The "Ignition" page) untuk troubleshooting cepat.
- Tinjau kembali struktur folder dan penempatan file-file penting.
