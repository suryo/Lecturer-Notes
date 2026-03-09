# Studi Kasus: Toko Online — Overview & Aktivitas Bisnis

## 1. Latar Belakang

**TokoKu** adalah platform e-commerce berbasis mobile yang memungkinkan pelanggan membeli berbagai produk secara online. Aplikasi ini dirancang untuk memudahkan proses jual-beli, mulai dari penjelajahan produk hingga pengiriman ke tangan pelanggan.

---

## 2. Aktor yang Terlibat

| Aktor                      | Peran                               |
| -------------------------- | ----------------------------------- |
| **Guest**                  | Browsing produk tanpa login         |
| **Pelanggan**              | Membeli produk, mengelola pesanan   |
| **Penjual / Admin**        | Mengelola produk, stok, dan pesanan |
| **Kurir / Mitra Logistik** | Memproses pengiriman                |
| **Sistem Pembayaran**      | Gateway (Midtrans, Xendit)          |

---

## 3. Aktivitas Utama di Toko Online

### 🛍️ A. Penjelajahan Produk (Browse & Search)

- Pelanggan membuka aplikasi dan melihat daftar produk terbaru.
- Melakukan pencarian berdasarkan kata kunci.
- Memfilter produk berdasarkan kategori, harga, atau rating.
- Melihat detail produk (foto, deskripsi, spesifikasi, ulasan).

### ❤️ B. Wishlist & Keranjang Belanja (Cart)

- Pelanggan menyimpan produk ke **Wishlist** untuk dibeli nanti.
- Menambahkan produk ke **Keranjang Belanja (Cart)**.
- Mengubah jumlah, menghapus, atau memilih produk di keranjang.

### 🎁 C. Diskon & Promo

- Penjual menetapkan **diskon langsung** pada produk (misal: diskon 20%).
- Pelanggan memasukkan **kode kupon (voucher)** untuk potongan harga.
- Sistem penerapan **Flash Sale**: harga turun drastis dalam waktu terbatas.
- **Diskon Ongkir**: Bekerjasama dengan jasa pengiriman tertentu.
- **Cashback**: Uang kembali ke dompet digital setelah transaksi selesai.

### 📦 D. Bundle / Paket Produk

- Penjual membuat **paket bundling** berisi beberapa produk sekaligus.
- Harga paket lebih murah dibanding membeli satuan.
- Sistem menghitung otomatis harga bundel dan stok masing-masing produk.
- Contoh: "Bundel Kopi + Gula + Susu" dijual lebih hemat 15%.

### 🛒 E. Checkout

- Pelanggan memilih produk dari keranjang yang akan dibeli.
- Memilih atau menambahkan **alamat pengiriman**.
- Memilih **kurir & layanan pengiriman** (Reguler/Ekspres/Sameday).
- Memasukkan **kode voucher** jika ada.
- Melihat ringkasan pesanan: subtotal, ongkir, diskon, **total akhir**.
- Mengonfirmasi pesanan dan lanjut ke pembayaran.

### 🚚 F. Pengiriman (Shipping)

- Setelah pembayaran dikonfirmasi, pesanan masuk antrian **dikemas**.
- Status pesanan: `Menunggu` → `Dikemas` → `Dikirim` → `Dalam Perjalanan` → `Tiba`.
- Pelanggan mendapat **nomor resi** untuk pelacakan (tracking).
- Integrasi dengan API kurir (JNE, J&T, SiCepat, Gosend).
- Notifikasi Push setiap perubahan status pengiriman.

### 💳 G. Pembayaran (Payment)

- Pelanggan memilih metode pembayaran:
  - **Transfer Bank** (BCA, Mandiri, BRI)
  - **Virtual Account**
  - **QRIS** (scan QR Code)
  - **Dompet Digital** (GoPay, OVO, Dana, ShopeePay)
  - **Paylater** (Kredit Tanpa Kartu)
  - **COD** (Bayar di Tempat)
- Sistem menghubungi **Payment Gateway** (Midtrans) untuk konfirmasi.
- Setelah berhasil, sistem otomatis mengubah status pesanan.
- Jika gagal, pelanggan diizinkan mengulangi pembayaran dalam batas waktu.

### ⭐ H. Ulasan & Rating

- Setelah pesanan berstatus "Selesai", pelanggan dapat memberikan:
  - **Bintang 1–5** untuk produk.
  - **Komentar teks** dan **foto produk** setelah diterima.
- Ulasan bersifat publik dan mempengaruhi kepercayaan pembeli lain.

### 🔄 I. Pengembalian & Refund (Return)

- Pelanggan mengajukan komplain jika produk rusak / tidak sesuai.
- Admin meninjau laporan dan menentukan: **Tukar Barang** atau **Refund**.
- Refund dikembalikan ke metode pembayaran asal.
