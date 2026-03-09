# Pertemuan 2: Rancangan Database & Laravel Backend (Migrations & Seeders)

## Deskripsi Singkat

Sesi ini berfokus pada perancangan basis data untuk aplikasi toko online (E-Commerce) dan implementasinya menggunakan Laravel Migrations dan Seeders. Pemahaman struktur data yang solid adalah fondasi utama sebelum membangun antarmuka aplikasi mobile.

## Tujuan Instruksional

1. Mahasiswa mampu merancang skema database E-Commerce yang kompleks (Produk, User, Pesanan, Pembayaran).
2. Mahasiswa memahami konsep **Database Migration** di Laravel untuk manajemen versi skema.
3. Mahasiswa mampu menggunakan **Seeders** untuk mengisi data dummy awal guna keperluan testing.
4. Mahasiswa memahami relasi antar tabel (One-to-Many, Many-to-Many).

## Materi Pembelajaran

### 1. Inisialisasi Project Laravel 10

Untuk memulai pengembangan backend, kita menggunakan Laravel versi 10. Pastikan Composer sudah terinstal di sistem Anda.

**Cara membuat project baru:**
Buka terminal dan jalankan perintah berikut:

```bash
composer create-project laravel/laravel:^10.0 toko-online-laravel
```

Perintah ini akan mengunduh skeleton Laravel 10 ke dalam folder `toko-online-laravel`.

### 2. Memahami Database Migrations

Migration bertindak sebagai _version control_ untuk database. Alih-alih berbagi SQL dump, tim pengembang berbagi file migration yang mendefinisikan struktur tabel.

**Daftar Migration Utama yang Disiapkan:**
Dalam studi kasus Toko Online ini, kita menyiapkan 14 tabel utama:

| Nama Tabel       | Deskripsi                                  |
| ---------------- | ------------------------------------------ |
| `users`          | Akun pengguna (Admin & Pelanggan)          |
| `kategori`       | Kategori produk (Elektronik, Pakaian, dll) |
| `produk`         | Data produk utama                          |
| `foto_produk`    | Koleksi foto untuk setiap produk           |
| `alamat`         | Daftar alamat pengiriman milik user        |
| `diskon`         | Aturan potongan harga produk/kategori      |
| `voucher`        | Kode promo belanja                         |
| `bundel`         | Paket gabungan beberapa produk             |
| `bundel_item`    | Isi dari setiap paket bundel               |
| `pesanan`        | Header transaksi belanja                   |
| `detail_pesanan` | Item-item yang dibeli dalam satu transaksi |
| `pembayaran`     | Data transaksi pembayaran (VA, QRIS, dll)  |
| `pengiriman`     | Info kurir dan resi pengiriman             |
| `ulasan`         | Rating dan testimoni dari pembeli          |

### 3. Memahami Database Seeders

Seeder digunakan untuk mengisi data awal (dummy) ke dalam database. Ini memudahkan kita dalam menguji aplikasi tanpa harus menginput data secara manual satu per satu.

**Seeders yang Disiapkan:**

- **UserSeeder**: Menyiapkan akun dummy.
  - Admin: `admin@tokoku.id` (password: `admin123`)
  - Pelanggan: `andi@gmail.com` (password: `pelanggan123`)
- **KategoriSeeder**: Menyiapkan kategori awal (Elektronik, Pakaian, Olahraga, Buku).
- **ProdukSeeder**: Menyiapkan contoh produk seperti Smartphone X, Kaos Polos, dan Bola Basket.

---

## Praktikum: Implementasi Migration & Seeder

### Langkah 1: Konfigurasi Database

Buka file `.env` di root project dan sesuaikan bagian database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_mafb_toko_online
DB_USERNAME=root
DB_PASSWORD=
```

### Langkah 2: Membuat Migration Baru

Jika ingin membuat tabel baru, gunakan perintah:

```bash
php artisan make:migration create_nama_table_table
```

### Langkah 3: Menjalankan Migration & Seeder

Gunakan perintah artisan untuk membangun database dan mengisi datanya secara bersamaan:

```bash
php artisan migrate --seed
```

_Jika muncul konfirmasi "The database ... does not exist. Would you like to create it?", pilih **yes**._

**Perintah Tambahan:**

- `php artisan migrate:fresh --seed`: Menghapus semua tabel dan membangun ulang (berguna jika ada perubahan skema).
- `php artisan db:seed`: Menjalankan seeder setelah migrasi sudah selesai.

---

## Tugas Mandiri

1. Tambahkan kolom `stok_minimum` pada tabel `produk` melalui file migration.
2. Buatlah Seeder baru bernama `BannerSeeder` untuk menyimpan URL gambar promo dashboard aplikasi mobile.
3. Jalankan `php artisan migrate:fresh --seed` untuk menerapkan perubahan tersebut.
