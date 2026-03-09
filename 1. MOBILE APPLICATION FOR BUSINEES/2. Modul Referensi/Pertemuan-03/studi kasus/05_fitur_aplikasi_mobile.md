# Fitur Aplikasi Mobile: TokoKu (Flutter / React Native)

Dokumen ini membahas spesifikasi fitur **aplikasi mobile** TokoKu dari sudut pandang pengembangan mobile, mencakup fitur teknis dan fungsional yang spesifik ke platform Android/iOS.

---

## 1. Stack Teknologi Mobile

| Aspek                 | Pilihan                                           |
| --------------------- | ------------------------------------------------- |
| **Framework**         | Flutter (Dart) atau React Native                  |
| **State Management**  | Provider / BLoC (Flutter) \| Zustand / Redux (RN) |
| **HTTP Client**       | Dio / http (Flutter) \| Axios (RN)                |
| **Local Storage**     | SharedPreferences / Hive                          |
| **Push Notification** | Firebase Cloud Messaging (FCM)                    |
| **Auth**              | JWT Token + Refresh Token                         |
| **Maps**              | Google Maps SDK                                   |
| **Payment**           | Midtrans Mobile SDK                               |
| **Image**             | cached_network_image (Flutter)                    |

---

## 2. Fitur Mobile Spesifik

### 📱 A. Pengalaman Pengguna (UX)

| Fitur                 | Deskripsi                                             |
| --------------------- | ----------------------------------------------------- |
| **Splash Screen**     | Animasi logo saat aplikasi dibuka                     |
| **Onboarding**        | Slide tutorial fitur (hanya pertama kali)             |
| **Dark Mode**         | Tampilan terang & gelap dapat dipilih                 |
| **Pull to Refresh**   | Tarik ke bawah untuk memuat ulang data                |
| **Skeleton Loading**  | Placeholder animasi saat data dimuat                  |
| **Infinite Scroll**   | Load data produk saat scroll ke bawah (pagination)    |
| **Haptic Feedback**   | Getaran ringan saat tap tombol penting                |
| **Responsive Layout** | Menyesuaikan tampilan tablet & HP                     |
| **Offline Mode**      | Tampilkan cache data terakhir jika tidak ada internet |

---

### 🔐 B. Autentikasi Mobile

| Fitur               | Deskripsi                                            |
| ------------------- | ---------------------------------------------------- |
| **Biometric Login** | Login cepat dengan sidik jari / Face ID              |
| **Auto Login**      | Sesi tersimpan, tidak perlu login ulang              |
| **Token Refresh**   | Refresh JWT otomatis saat mendekati expired          |
| **Google Sign-In**  | Login 1-tap dengan akun Google                       |
| **Secure Storage**  | Token disimpan di secure storage (Keychain/Keystore) |

---

### 🔔 C. Notifikasi Push (FCM)

| Notifikasi              | Trigger                          |
| ----------------------- | -------------------------------- |
| Pesanan dibuat          | Saat checkout berhasil           |
| Pembayaran berhasil     | Webhook payment gateway diterima |
| Pesanan dikemas         | Admin update status              |
| Pesanan dikirim         | Admin input nomor resi           |
| Paket tiba              | Status berubah ke "Tiba"         |
| Flash sale dimulai      | 15 menit sebelum flash sale      |
| Voucher hampir expired  | 1 hari sebelum kedaluwarsa       |
| Promo baru tersedia     | Broadcast dari admin             |
| Ulasan berhasil dikirim | Konfirmasi sistem                |

> **Teknis**: FCM Token disimpan di tabel `users.fcm_token` dan dikirim ke server setiap login.

---

### 📷 D. Kamera & Galeri

| Fitur                    | Deskripsi                     |
| ------------------------ | ----------------------------- |
| **Upload Foto Profil**   | Ambil dari kamera atau galeri |
| **Upload Foto Ulasan**   | Bukti produk yang diterima    |
| **Upload Foto Komplain** | Bukti kerusakan produk        |

---

### 🗺️ E. Lokasi & Maps

| Fitur                       | Deskripsi                                         |
| --------------------------- | ------------------------------------------------- |
| **Deteksi Lokasi Otomatis** | Auto-fill kota berdasarkan GPS saat tambah alamat |
| **Pin Lokasi di Maps**      | Drop pin untuk koordinat alamat pengiriman        |
| **Tampilkan Peta Alamat**   | Preview peta di detail alamat                     |

---

### 💳 F. Pembayaran Mobile

| Fitur                  | Deskripsi                                   |
| ---------------------- | ------------------------------------------- |
| **Deep Link e-Wallet** | Buka aplikasi GoPay/OVO langsung dari app   |
| **QRIS In-App**        | Tampilkan QR Code bayar di dalam aplikasi   |
| **Midtrans Snap**      | Bottom sheet pembayaran dari Midtrans SDK   |
| **Status Polling**     | Cek status pembayaran otomatis tiap 5 detik |
| **Countdown Timer**    | Hitung mundur batas waktu pembayaran        |

---

### 📦 G. Manajemen Pesanan

| Fitur                        | Deskripsi                                         |
| ---------------------------- | ------------------------------------------------- |
| **Tab Filter Status**        | Filter pesanan per status (Semua, Aktif, Selesai) |
| **Timeline Pengiriman**      | Tampilan step-by-step status paket                |
| **Tracking Real-time**       | Integrasi API tracking kurir (JNE, J&T, SiCepat)  |
| **Konfirmasi Terima**        | Tombol "Saya Sudah Menerima Barang"               |
| **Download Invoice**         | Export struk belanja dalam PDF                    |
| **Beli Lagi (Repeat Order)** | Tambah ulang item dari pesanan lama ke cart       |

---

### ❤️ H. Wishlist & Personalisasi

| Fitur                  | Deskripsi                                   |
| ---------------------- | ------------------------------------------- |
| **Tambah ke Wishlist** | Tap ikon hati di produk                     |
| **Daftar Wishlist**    | Kelola semua produk favorit                 |
| **Pindah ke Cart**     | Tombol "Beli Sekarang" dari wishlist        |
| **Notif Harga Turun**  | Notifikasi jika produk wishlist diskon      |
| **Riwayat Lihat**      | Produk yang pernah dibuka (recently viewed) |

---

### 🔎 I. Pencarian Cerdas

| Fitur                 | Deskripsi                                           |
| --------------------- | --------------------------------------------------- |
| **Riwayat Pencarian** | Tersimpan lokal untuk pencarian cepat               |
| **Saran Pencarian**   | Autocomplete saat mengetik                          |
| **Filter Lanjutan**   | Min-maks harga, rating, kategori, ketersediaan stok |
| **Sort**              | Terbaru, Terlaris, Harga Terendah/Tertinggi         |
| **Pencarian Suara**   | Input suara dengan Speech-to-Text (opsional)        |

---

### ⚙️ J. Pengaturan Aplikasi

| Fitur                 | Deskripsi                            |
| --------------------- | ------------------------------------ |
| **Bahasa**            | Indonesia / English                  |
| **Tema**              | Light / Dark / System                |
| **Notifikasi**        | Aktif/nonaktifkan per kategori notif |
| **Keamanan**          | Aktifkan biometrik                   |
| **Hapus Cache**       | Bersihkan data sementara             |
| **Kebijakan Privasi** | Halaman web embedded                 |
| **Info Versi App**    | Nomor versi & cek update             |

---

## 3. Alur Teknis Utama

### Alur Login

```
App Start → Cek Token Lokal
    ├── Token Valid → Home
    └── Token Tidak Ada / Expired → Login Screen
          → POST /api/login → Simpan Token → Home
```

### Alur Checkout & Bayar

```
Cart → Checkout (Pilih Alamat, Kurir, Voucher)
    → POST /api/pesanan/buat → Dapat ID Pesanan
    → Pilih Metode Bayar → Midtrans Snap / Deep Link
    → Webhook Server → Update Status Pesanan
    → FCM Notifikasi → Halaman Pembayaran Berhasil
```

### Alur Push Notifikasi

```
Server → Firebase Admin SDK → FCM → Device
    → Tap Notifikasi → Deep Link ke halaman terkait
       (misal: notif "Pesanan Dikirim" → Detail Pesanan)
```

---

## 4. API Endpoint Utama (Backend Reference)

| Method | Endpoint                     | Fungsi                                   |
| ------ | ---------------------------- | ---------------------------------------- |
| POST   | `/api/auth/register`         | Registrasi                               |
| POST   | `/api/auth/login`            | Login                                    |
| GET    | `/api/produk`                | Daftar produk (+ filter, sort, paginate) |
| GET    | `/api/produk/{id}`           | Detail produk                            |
| GET    | `/api/kategori`              | Daftar kategori                          |
| POST   | `/api/cart`                  | Tambah ke keranjang                      |
| GET    | `/api/cart`                  | Isi keranjang user                       |
| POST   | `/api/pesanan`               | Buat pesanan (checkout)                  |
| GET    | `/api/pesanan`               | Histori pesanan                          |
| GET    | `/api/pesanan/{id}`          | Detail pesanan                           |
| POST   | `/api/pembayaran/notifikasi` | Webhook payment gateway                  |
| GET    | `/api/voucher/validasi`      | Cek voucher                              |
| POST   | `/api/ulasan`                | Kirim ulasan                             |
