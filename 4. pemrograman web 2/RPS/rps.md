# RENCANA PEMBELAJARAN SEMESTER (RPS)
## PROGRAM STUDI TEKNIK INFORMATIKA
### FAKULTAS TEKNIK UNIVERSITAS WIJAYA PUTRA

---

## IDENTITAS MATA KULIAH

| Mata Kuliah (MK) | Kode | Rumpun MK | Bobot (sks) | | Semester | Tgl Penyusunan |
|---|---|---|---|---|---|---|
| Pemrograman Web 2 | TIF-PW2 | Rekayasa Perangkat Lunak | T=2 | P=1 | Genap 2024/2025 | 2026-03-11 |

---

## OTORISASI

| Pengembang RPS | Koordinator RMK | Ketua PRODI |
|---|---|---|
| | | |

---

## CAPAIAN PEMBELAJARAN (CP)

### CPL-PRODI yang Dibebankan pada MK

| Kode | Deskripsi CPL |
|---|---|
| **CPL07** | Kemampuan menganalisis persoalan computing yang kompleks serta menerapkan prinsip-prinsip computing dan disiplin ilmu relevan lainnya untuk mengidentifikasi solusi, dengan mempertimbangkan wawasan perkembangan ilmu transdisiplin. *(P04)* |
| **CPL08** | Menguasai konsep teoritis bidang pengetahuan Informatika dalam mendesain dan mensimulasikan aplikasi teknologi multi-platform yang relevan dengan kebutuhan industri dan masyarakat. *(P01)* |
| **CPL10** | Kemampuan menganalisis, merancang, membuat dan mengevaluasi user interface dan aplikasi interaktif dengan mempertimbangkan kebutuhan pengguna dan perkembangan ilmu transdisiplin. *(KK04)* |

---

### Capaian Pembelajaran Mata Kuliah (CPMK)

| Kode CPMK | Deskripsi CPMK | CPL yang Didukung |
|---|---|---|
| **CPMK071** | Mahasiswa mampu mengidentifikasi karakteristik persoalan computing yang kompleks dalam berbagai konteks (organisasi, sosial, industri). | CPL07 |
| **CPMK081** | Mahasiswa mampu menjelaskan konsep-konsep dasar teori informatika yang mendukung pengembangan aplikasi teknologi multi-platform. | CPL08 |
| **CPMK082** | Mahasiswa mampu menganalisis kebutuhan sistem dan karakteristik platform teknologi (web, mobile, desktop) dalam konteks industri. | CPL08 |
| **CPMK083** | Mahasiswa mampu merancang struktur dan alur kerja aplikasi dengan mempertimbangkan prinsip teoritis informatika dan kebutuhan pengguna. | CPL08 |
| **CPMK103** | Mahasiswa mampu merancang user interface dan aplikasi interaktif yang ergonomis dan berorientasi pada pengalaman pengguna. | CPL10 |

---

### Kemampuan Akhir Tiap Tahapan Belajar (Sub-CPMK)

| Kode Sub-CPMK | Deskripsi |
|---|---|
| Sub-CPMK071.1 | Dapat mengidentifikasi kebutuhan fungsional dan non-fungsional sistem web dalam konteks bisnis (e-commerce, profil perusahaan, dsb). |
| Sub-CPMK081.1 | Dapat menjelaskan konsep OOP (Class, Object, Inheritance, Encapsulation) dan penerapannya dalam PHP. |
| Sub-CPMK081.2 | Dapat menjelaskan konsep MVC (Model-View-Controller) dan implementasinya dalam framework Laravel. |
| Sub-CPMK082.1 | Dapat menganalisis kebutuhan sistem web dan merancang struktur basis data (ERD) serta migrasi Laravel. |
| Sub-CPMK083.1 | Dapat merancang Routing, Controller, dan alur request-response pada aplikasi web berbasis Laravel. |
| Sub-CPMK083.2 | Dapat mengimplementasikan sistem autentikasi (login, register, logout) beserta middleware proteksi halaman. |
| Sub-CPMK083.3 | Dapat membangun fitur CRUD (Create, Read, Update, Delete) lengkap menggunakan Eloquent ORM. |
| Sub-CPMK103.1 | Dapat merancang dan mengimplementasikan tampilan antarmuka web yang responsif menggunakan Blade Templating dan Bootstrap 5. |

---

### Korelasi antara CPMK terhadap Sub-CPMK

| | Sub-CPMK071.1 | Sub-CPMK081.1 | Sub-CPMK081.2 | Sub-CPMK082.1 | Sub-CPMK083.1 | Sub-CPMK083.2 | Sub-CPMK083.3 | Sub-CPMK103.1 |
|---|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
| **CPMK071** | V | | | V | | | | |
| **CPMK081** | | V | V | | | | | |
| **CPMK082** | V | | | V | V | | | |
| **CPMK083** | | | V | | V | V | V | |
| **CPMK103** | | | | | | | V | V |

---

## DESKRIPSI SINGKAT MK

Mata kuliah ini merupakan kelanjutan dari Pemrograman Web 1 yang membahas pengembangan aplikasi web dinamis menggunakan PHP dan basis data MySQL. Pada Pemrograman Web 2, mahasiswa akan mempelajari penerapan konsep Pemrograman Berorientasi Objek (OOP) dalam PHP, kemudian bertransisi ke penggunaan framework Laravel 10 sebagai sarana pengembangan aplikasi web yang terstruktur dan profesional. Mahasiswa akan membangun aplikasi e-commerce "TokoKita" secara bertahap mulai dari perancangan database, routing, controller, Blade Templating, Eloquent ORM, autentikasi, hingga fitur CRUD produk dan manajemen pesanan.

---

## BAHAN KAJIAN: MATERI PEMBELAJARAN

1. Review PHP Native & OOP (Class, Object, Encapsulation, Inheritance)
2. Analisis Kebutuhan & Perancangan Sistem (ERD, Use Case) — Studi Kasus TokoKita
3. Pengantar Framework Laravel 10 — Instalasi, Struktur Folder, Artisan CLI
4. Routing & Controller di Laravel
5. Blade Templating Engine — Layout, Komponen, Direktif, Data Binding
6. Database Migration & Eloquent ORM — Model, Relasi, Query Builder
7. Seeder & Factory — Populasi Data Dummy
8. Autentikasi — Login, Register, Logout, Middleware
9. CRUD Produk dengan Eloquent (Validasi, Upload Foto)
10. Relasi Model (hasMany, belongsTo, belongsToMany)
11. Keranjang Belanja & Manajemen Sesi (Session)
12. Proses Checkout & Manajemen Pesanan
13. Panel Admin — Dashboard, Manajemen Produk & Pesanan
14. REST API dengan Laravel — `api.php`, JSON Response

---

## PUSTAKA

**Utama:**
- Otwell, T. (2024). *Laravel Documentation v10*. Laravel LLC. https://laravel.com/docs/10.x
- Nixon, R. (2021). *Learning PHP, MySQL & JavaScript* (6th ed.). O'Reilly Media.
- Modul Ajar Pemrograman Web 2 — Tim Pengampu, Universitas Wijaya Putra.

**Pendukung:**
- Dokumentasi Bootstrap 5: https://getbootstrap.com/docs/5.3/
- Laracasts: https://laracasts.com/
- Dokumentasi Eloquent ORM: https://laravel.com/docs/10.x/eloquent

---

## DOSEN PENGAMPU

...

## MATA KULIAH SYARAT

Pemrograman Web 1, Basis Data

---

## RENCANA PEMBELAJARAN PER MINGGU

| Mg Ke- | Kemampuan Akhir Tiap Tahapan Belajar (Sub-CPMK) | Penilaian (Indikator) | Penilaian (Teknik & Kriteria) | Pembelajaran Daring Sinkron | Pembelajaran Daring Asinkron | Materi Pembelajaran | Bobot Penilaian (%) |
|:---:|---|---|---|---|---|---|:---:|
| **(1)** | **(2)** | **(3)** | **(4)** | **(5)** | **(6)** | **(7)** | **(8)** |
| **1** | Sub-CPMK071.1 — Analisis Kebutuhan Sistem Web (TokoKita) | Mampu membuat daftar kebutuhan fungsional & non-fungsional | Kuis + Dokumen Kebutuhan (BT) | Kuliah + diskusi studi kasus (100 mnt) | Review studi kasus & referensi (170 mnt) | Pengantar PW2; Roadmap e-commerce; Use Case TokoKita; Perbandingan PHP Native vs Framework | 3% |
| **2** | Sub-CPMK081.1 — OOP PHP (Class, Object, Encapsulation) | Mampu membuat class dan object dengan property & method yang tepat | Laporan & review kode (PT) | Live coding + diskusi (100 mnt) | Latihan OOP mandiri (170 mnt) | Class; Object; `$this`; Constructor; `public/private/protected`; Getter & Setter | 4% |
| **3** | Sub-CPMK081.1, Sub-CPMK081.2 — OOP: Inheritance & Laravel MVC | Mampu menerapkan pewarisan & memahami alur MVC | Kuis MVC + review kode | Live coding + demo (100 mnt) | Studi kasus OOP mandiri (170 mnt) | Inheritance; `extends`; `parent::__construct`; Konsep MVC; Request → Controller → Model → View | 4% |
| **4** | Sub-CPMK082.1 — Instalasi Laravel & Perancangan Database | Project Laravel berjalan & migrasi berhasil dieksekusi | Demo project + laporan (PT) | Workshop instalasi & migrasi (100 mnt) | Setup mandiri & buat ERD (170 mnt) | `composer create-project`; `.env`; `php artisan migrate`; ERD TokoKita (users, produk, pesanan) | 4% |
| **5** | Sub-CPMK083.1 — Routing & Controller | Rute terdaftar & controller mengembalikan response yang benar | `php artisan route:list` + demo | Live coding (100 mnt) | Latihan routing mandiri (170 mnt) | `Route::get/post`; Named Routes; Controller + Method; Route Grouping; Middleware | 4% |
| **6** | Sub-CPMK103.1 — Blade Templating: Layout & Komponen | Layout master digunakan dan halaman tampil benar | Review view + demo | Live coding (100 mnt) | Latihan Blade mandiri (170 mnt) | `@extends`; `@yield`; `@section`; `@include`; Direktif `@if`, `@foreach`; Bootstrap 5 | 5% |
| **7** | Sub-CPMK082.1, Sub-CPMK083.1 — Eloquent ORM: Model & Migration | Model terhubung ke database & query berjalan | Demo query di Tinker | Live coding (100 mnt) | Latihan Eloquent mandiri (170 mnt) | `php artisan make:model -m`; `$fillable`; `all()`, `find()`, `where()`; Seeder & Factory | 5% |
| **8** | **Evaluasi Tengah Semester (UTS)** | Ujian teori + praktik membangun halaman produk sederhana dengan Laravel | Tes Tulis + Unjuk Kerja | Ujian daring | — | Materi Mg 1–7 | **20%** |
| **9** | Sub-CPMK083.2 — Autentikasi: Login & Register | Fitur login, register, dan logout berfungsi end-to-end | Demo fitur + review kode | Live coding (100 mnt) | Praktik mandiri (170 mnt) | `Auth::attempt()`; `Auth::logout()`; `@guest/@auth`; Password hashing `bcrypt()` | 5% |
| **10** | Sub-CPMK083.2 — Middleware & Proteksi Halaman | Halaman terproteksi tidak dapat diakses tanpa login | Demo proteksi & redirect | Live coding (100 mnt) | Praktik mandiri (170 mnt) | Route Middleware `auth`; Custom Middleware (IsAdmin); Redirect logic | 4% |
| **11** | Sub-CPMK083.3 — CRUD Produk (Create, Read, Update, Delete) | Semua operasi CRUD berfungsi dengan validasi input | Demo CRUD + review kode | Live coding (100 mnt) | Latihan CRUD mandiri (170 mnt) | `Request::validate()`; `store()`, `update()`, `destroy()`; `Storage::disk`; Upload foto | 6% |
| **12** | Sub-CPMK083.3 — Relasi Model (hasMany, belongsTo) | Relasi antar tabel berjalan dan data terhubung dengan benar | Demo relasi + review kode | Live coding (100 mnt) | Latihan relasi mandiri (170 mnt) | `hasMany`, `belongsTo`, `belongsToMany`; Eager Loading `with()`; Pivot Table | 5% |
| **13** | Sub-CPMK103.1, Sub-CPMK083.3 — Keranjang Belanja & Session | Fitur cart (tambah, ubah qty, hapus) berfungsi | Demo cart + review kode | Live coding (100 mnt) | Praktik mandiri (170 mnt) | `Session::put/get/forget`; Cart logic; Hitung subtotal & total | 5% |
| **14** | Sub-CPMK083.3 — Proses Checkout & Manajemen Pesanan | Proses checkout berhasil dan pesanan muncul di DB | Demo checkout + review | Live coding (100 mnt) | Praktik mandiri (170 mnt) | Form checkout; `DB::transaction`; Status pesanan; Riwayat pesanan member | 5% |
| **15** | Sub-CPMK083.3, Sub-CPMK103.1 — Panel Admin & Presentasi Proyek | Dashboard admin menampilkan statistik & data yang benar | Presentasi demo proyek | Presentasi + asistensi (100 mnt) | Finishing proyek mandiri (170 mnt) | Admin dashboard; Manajemen produk & pesanan; Statistik sederhana; Ringkasan proyek | 6% |
| **16** | **Evaluasi Akhir Semester (UAS)** | Proyek web e-commerce TokoKita lengkap + presentasi + laporan | Unjuk Kerja + Tes Lisan | Presentasi UAS | — | Seluruh Materi | **20%** |

> **Keterangan Waktu:** BT=Belajar Terbimbing, PT=Penugasan Terstruktur, KM=Kegiatan Mandiri

---

## BOBOT PENILAIAN MATA KULIAH

| CPL | CPMK | Partisipasi (Kehadiran/Kuis) | Observasi (Praktek/Tugas) | Unjuk Kerja (Presentasi) | Tes Tulis (UTS) | Tes Tulis (UAS) | Tes Lisan (Tugas Kelompok) | Total |
|---|---|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
| **CPL07** | CPMK071 | 3% | 4% | — | 3% | — | — | **10%** |
| **CPL08** | CPMK081 | 4% | 4% | — | 7% | — | — | **15%** |
| | CPMK082 | — | 4% | — | 6% | — | — | **10%** |
| | CPMK083 | — | 13% | 2% | 4% | 6% | — | **25%** |
| **CPL10** | CPMK103 | 3% | 5% | 2% | — | — | — | **10%** |
| **Total Bobot** | | **10%** | **30%** | **4%** | **20%** | **6%** | **—** | **70%** |
| *Catatan: +20% UAS proyek & +10% komponen nilai akhir* | | | | | | **+30%** | | **100%** |

---

*Dokumen ini merupakan Rencana Pembelajaran Semester (RPS) resmi mata kuliah Pemrograman Web 2, Program Studi Teknik Informatika, Fakultas Teknik, Universitas Wijaya Putra.*

*Disusun berdasarkan Permendikbud No. 3 Tahun 2020 tentang Standar Nasional Pendidikan Tinggi (SN-Dikti).*
