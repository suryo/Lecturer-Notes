# Rancangan Halaman Aplikasi Toko Online (TokoKu)

## 1. Struktur Navigasi Utama

Aplikasi menggunakan navigasi **Bottom Navigation Bar** dengan 4 tab utama:

```
[ Home ] [ Kategori ] [ Pesanan ] [ Profil ]
```

---

## 2. Daftar Halaman

### 🔐 A. Autentikasi

| Halaman            | Deskripsi                         | Elemen Utama                                 |
| ------------------ | --------------------------------- | -------------------------------------------- |
| **Splash Screen**  | Layar pembuka saat app dibuka     | Logo, animasi loading                        |
| **Onboarding**     | Pengenalan fitur (tampil 1× saja) | Carousel slide, tombol "Mulai"               |
| **Login**          | Masuk dengan email/password       | Form, tombol Google Sign-In, "Lupa Password" |
| **Register**       | Membuat akun baru                 | Form nama, email, password, OTP HP           |
| **Lupa Password**  | Reset via email                   | Input email, instruksi                       |
| **Verifikasi OTP** | Konfirmasi nomor HP               | Input 6 digit OTP, countdown resend          |

---

### 🏠 B. Tab Home

| Halaman           | Deskripsi                | Elemen Utama                                                             |
| ----------------- | ------------------------ | ------------------------------------------------------------------------ |
| **Home**          | Dashboard utama          | Banner promo, kategori, produk terbaru, flash sale, rekomendasi          |
| **Flash Sale**    | Daftar produk flash sale | Countdown timer, daftar produk diskon                                    |
| **Pencarian**     | Halaman hasil pencarian  | Search bar, filter (harga, kategori, rating), daftar produk              |
| **Detail Produk** | Info lengkap satu produk | Foto carousel, nama, harga, deskripsi, varian, stok, ulasan, tombol beli |

---

### 🗂️ C. Tab Kategori

| Halaman                 | Deskripsi                      | Elemen Utama                 |
| ----------------------- | ------------------------------ | ---------------------------- |
| **Semua Kategori**      | Grid ikon semua kategori       | Grid ikon kategori           |
| **Produk per Kategori** | Daftar produk dalam 1 kategori | Filter & sort, daftar produk |

---

### 🛒 D. Keranjang & Checkout

| Halaman                | Deskripsi                       | Elemen Utama                                                 |
| ---------------------- | ------------------------------- | ------------------------------------------------------------ |
| **Keranjang (Cart)**   | Daftar produk yang akan dibeli  | List item, checkbox, jumlah, hapus, subtotal                 |
| **Checkout**           | Review sebelum bayar            | Alamat, kurir, voucher, ringkasan biaya, total, tombol bayar |
| **Pilih Alamat**       | Daftar/tambah alamat pengiriman | List alamat, "Tambah Alamat Baru"                            |
| **Tambah Alamat**      | Form alamat baru                | Input lengkap, pilih provinsi-kota, pin lokasi maps          |
| **Pilih Kurir**        | Opsi layanan pengiriman         | Daftar kurir & harga ongkir                                  |
| **Voucher**            | Memasukkan/pilih kode promo     | List voucher tersedia, input manual, cek validasi            |
| **Konfirmasi Pesanan** | Ringkasan akhir sebelum bayar   | Detail pesanan, total, tombol konfirmasi                     |

---

### 💳 E. Pembayaran

| Halaman                  | Deskripsi                  | Elemen Utama                                       |
| ------------------------ | -------------------------- | -------------------------------------------------- |
| **Pilih Metode Bayar**   | Daftar cara pembayaran     | List metode (VA, QRIS, e-wallet, COD)              |
| **Instruksi Pembayaran** | Panduan transfer / scan QR | Nomor VA / QR Code, jumlah, countdown batas waktu  |
| **Pembayaran Berhasil**  | Konfirmasi sukses          | Icon centang, kode pesanan, tombol "Lihat Pesanan" |
| **Pembayaran Gagal**     | Notifikasi gagal/expired   | Icon peringatan, tombol coba lagi                  |

---

### 📦 F. Tab Pesanan

| Halaman             | Deskripsi                   | Elemen Utama                                               |
| ------------------- | --------------------------- | ---------------------------------------------------------- |
| **Daftar Pesanan**  | Semua histori pesanan       | Tab status (Semua, Menunggu, Dikirim, Selesai, Dibatalkan) |
| **Detail Pesanan**  | Rincian satu transaksi      | Info produk, status, resi, pembayaran, tombol aksi         |
| **Lacak Pesanan**   | Timeline pengiriman paket   | Nomor resi, timeline langkah, peta (opsional)              |
| **Formulir Ulasan** | Memberi rating & komentar   | Bintang 1–5, text area, upload foto                        |
| **Ajukan Return**   | Keluhan produk tidak sesuai | Pilih alasan, deskripsi, bukti foto                        |

---

### 👤 G. Tab Profil

| Halaman               | Deskripsi                | Elemen Utama                        |
| --------------------- | ------------------------ | ----------------------------------- |
| **Profil**            | Ringkasan akun pengguna  | Foto, nama, email, menu navigasi    |
| **Edit Profil**       | Ubah data diri           | Form nama, no HP, upload foto       |
| **Daftar Alamat**     | Kelola alamat pengiriman | List alamat, tetapkan utama, hapus  |
| **Wishlist**          | Produk yang disukai      | Grid produk favorit, pindah ke cart |
| **Riwayat Transaksi** | Ringkasan belanja        | Daftar histori                      |
| **Notifikasi**        | Inbox notifikasi         | List notifikasi, tandai sudah baca  |
| **Pengaturan**        | Preferensi akun          | Ganti password, notifikasi, tema    |
| **Tentang Aplikasi**  | Versi & info app         | Versi, bantuan, kebijakan privasi   |
| **Logout**            | Keluar dari akun         | Dialog konfirmasi                   |

---

### 🛡️ H. Halaman Admin (Backoffice — Web / App Terpisah)

| Halaman                | Deskripsi                             |
| ---------------------- | ------------------------------------- |
| **Dashboard**          | Statistik penjualan, pesanan hari ini |
| **Manajemen Produk**   | CRUD produk & foto                    |
| **Manajemen Kategori** | CRUD kategori & sub-kategori          |
| **Manajemen Pesanan**  | Update status pesanan, cetak nota     |
| **Manajemen Diskon**   | Buat, edit, hapus promo & voucher     |
| **Manajemen Bundel**   | Buat paket bundling                   |
| **Laporan Penjualan**  | Grafik revenue, produk terlaris       |

---

## 3. Alur Navigasi Utama (User Flow)

```
Splash → Onboarding → Login/Register
    ↓
  Home
    ├─ Cari / Pilih Produk → Detail Produk → [Cart]
    │                                          ↓
    │                                       Checkout
    │                                          ↓
    │                                       Pembayaran
    │                                          ↓
    │                                       Selesai / Lacak Pesanan
    │
    ├─ Kategori → Daftar Produk → Detail Produk
    ├─ Pesanan → Detail → Lacak / Ulasan
    └─ Profil → Edit / Alamat / Wishlist / Pengaturan
```
