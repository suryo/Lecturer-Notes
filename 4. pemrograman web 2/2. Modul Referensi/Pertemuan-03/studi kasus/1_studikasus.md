# Studi Kasus: TokoKita — Toko Online Berbasis PHP & MySQL

## 1. Latar Belakang

**TokoKita** adalah sebuah platform e-commerce sederhana yang dibangun menggunakan PHP Native dan MySQL. Platform ini memungkinkan pelanggan untuk menjelajahi produk, menambahkan ke keranjang belanja, melakukan checkout, dan melacak pesanan mereka secara online.

Studi kasus ini dirancang sebagai fondasi praktik matakuliah **Pemrograman Web 2**, di mana mahasiswa akan belajar membangun sistem lengkap dari tahap perancangan database hingga implementasi antarmuka web.

---

## 2. Profil Bisnis

| Atribut             | Detail                                       |
| ------------------- | -------------------------------------------- |
| **Nama Platform**   | TokoKita                                     |
| **Jenis Bisnis**    | E-commerce B2C (Business to Consumer)        |
| **Produk**          | Elektronik, Pakaian, Buku, Perabot, Olahraga |
| **Target Pengguna** | Masyarakat umum usia 18–45 tahun             |
| **Platform**        | Web (Desktop & Mobile Responsive)            |
| **Teknologi**       | PHP 8.x, MySQL, Bootstrap 5, JavaScript      |

---

## 3. Aktor & Hak Akses

| Aktor                | Deskripsi              | Hak Akses                                          |
| -------------------- | ---------------------- | -------------------------------------------------- |
| **Guest**            | Pengunjung belum login | Lihat produk, search, lihat detail                 |
| **Member/Pelanggan** | Pengguna terdaftar     | Guest + cart, checkout, riwayat pesanan, profil    |
| **Admin**            | Pengelola toko         | Semua akses + CRUD produk, kelola pesanan, laporan |

---

## 4. Alur Bisnis Utama

### 🛍️ Alur Belanja Pelanggan

```
1. Guest membuka website → Lihat produk di Landing Page
2. Klik produk → Halaman Detail Produk
3. Klik "Tambah ke Keranjang" → Redirect ke Login (jika belum login)
4. Login / Daftar akun baru
5. Kelola Keranjang (ubah qty, hapus item)
6. Klik "Checkout"
7. Isi alamat pengiriman & pilih metode pembayaran
8. Konfirmasi pesanan → Pesanan masuk DB dengan status "Menunggu"
9. Upload bukti transfer / bayar
10. Admin verifikasi → status "Diproses" → "Dikirim" → "Selesai"
```

### 🛡️ Alur Admin

```
1. Login admin (/admin/login)
2. Dashboard → Statistik (pesanan hari ini, revenue, produk)
3. Kelola Produk (tambah, edit, hapus, stok)
4. Kelola Pesanan (ubah status, lihat detail)
5. Kelola Member (lihat, nonaktifkan)
6. Lihat Laporan Penjualan
```

---

## 5. Fitur-Fitur yang Dibangun

### Fitur Frontend (Pelanggan)

| No  | Fitur             | Keterangan                                     |
| --- | ----------------- | ---------------------------------------------- |
| 1   | Landing Page      | Hero banner, kategori, produk terbaru, promo   |
| 2   | Halaman Produk    | Grid produk dengan filter kategori & pencarian |
| 3   | Detail Produk     | Foto, deskripsi, harga, stok, tombol beli      |
| 4   | Keranjang Belanja | CRUD item, subtotal otomatis                   |
| 5   | Checkout          | Form alamat, metode pembayaran, ringkasan      |
| 6   | Riwayat Pesanan   | Daftar & status pesanan member                 |
| 7   | Login/Register    | Form autentikasi dengan validasi               |
| 8   | Profil Member     | Edit data diri, ganti password                 |

### Fitur Backend (Admin)

| No  | Fitur              | Keterangan                               |
| --- | ------------------ | ---------------------------------------- |
| 1   | Dashboard          | Statistik penjualan, pesanan terbaru     |
| 2   | CRUD Produk        | Tambah, edit, hapus produk + upload foto |
| 3   | Manajemen Kategori | Tambah & kelola kategori produk          |
| 4   | Kelola Pesanan     | Update status, lihat detail transaksi    |
| 5   | Manajemen Member   | Lihat daftar, aktif/nonaktif akun        |
| 6   | Laporan            | Filter penjualan per tanggal             |

---

## 6. Rancangan Struktur URL

| URL                           | Halaman             |
| ----------------------------- | ------------------- |
| `/`                           | Landing Page        |
| `/produk`                     | Daftar Semua Produk |
| `/produk?kategori=elektronik` | Produk per Kategori |
| `/produk/detail/{id}`         | Detail Produk       |
| `/cart`                       | Keranjang Belanja   |
| `/checkout`                   | Halaman Checkout    |
| `/login`                      | Halaman Login       |
| `/register`                   | Halaman Registrasi  |
| `/member/profil`              | Profil Member       |
| `/member/pesanan`             | Riwayat Pesanan     |
| `/admin`                      | Dashboard Admin     |
| `/admin/produk`               | Manajemen Produk    |
| `/admin/pesanan`              | Manajemen Pesanan   |
| `/admin/member`               | Manajemen Member    |

---

## 7. Teknologi yang Digunakan

| Teknologi       | Fungsi                                              |
| --------------- | --------------------------------------------------- |
| **PHP 8.x**     | Bahasa pemrograman server-side                      |
| **MySQL**       | Database manajemen sistem                           |
| **Bootstrap 5** | Framework CSS untuk tampilan responsif              |
| **Vanilla JS**  | Interaktivitas dinamis (cart update, validasi form) |
| **PDO (PHP)**   | Koneksi database yang aman (prepared statements)    |
| **Session PHP** | Manajemen login & keranjang belanja                 |
| **$\_FILES**    | Upload gambar produk                                |

---

## 8. Struktur Folder Project PHP

```
project_toko_online_php/
├── config/
│   └── database.php          # Koneksi PDO ke MySQL
├── includes/
│   ├── header.php            # Header HTML global
│   └── footer.php            # Footer HTML global
├── admin/
│   ├── index.php             # Dashboard admin
│   ├── produk.php            # Manajemen produk
│   └── pesanan.php           # Manajemen pesanan
├── member/
│   ├── profil.php            # Halaman profil
│   └── pesanan.php           # Riwayat pesanan
├── uploads/
│   └── produk/               # Folder foto produk
├── index.php                 # Landing page
├── produk.php                # Daftar produk
├── detail.php                # Detail produk
├── cart.php                  # Keranjang belanja
├── checkout.php              # Checkout
├── login.php                 # Login
└── register.php              # Registrasi
```
