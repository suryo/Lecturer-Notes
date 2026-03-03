# Fitur-Fitur Toko Online (TokoKu)

Dokumen ini merinci semua fitur yang harus diimplementasikan pada platform e-commerce **TokoKu**, dibagi berdasarkan modul/area fungsional.

---

## 1. Modul Autentikasi & Akun

| Kode    | Fitur                                   | Prioritas  |
| ------- | --------------------------------------- | ---------- |
| AUTH-01 | Registrasi akun baru (email + password) | 🔴 Wajib   |
| AUTH-02 | Login dengan email & password           | 🔴 Wajib   |
| AUTH-03 | Login dengan Google (OAuth)             | 🟡 Penting |
| AUTH-04 | Verifikasi OTP via WhatsApp/SMS         | 🟡 Penting |
| AUTH-05 | Lupa password & reset via email         | 🔴 Wajib   |
| AUTH-06 | Logout & hapus sesi                     | 🔴 Wajib   |
| AUTH-07 | Edit profil (nama, foto, no HP)         | 🔴 Wajib   |
| AUTH-08 | Ganti password                          | 🔴 Wajib   |

---

## 2. Modul Produk & Katalog

| Kode   | Fitur                                                     | Prioritas   |
| ------ | --------------------------------------------------------- | ----------- |
| PRD-01 | Tampilkan daftar produk (homepage & kategori)             | 🔴 Wajib    |
| PRD-02 | Detail produk (foto, harga, stok, deskripsi, spesifikasi) | 🔴 Wajib    |
| PRD-03 | Carousel foto produk (multi-gambar)                       | 🔴 Wajib    |
| PRD-04 | Pilih varian produk (ukuran, warna)                       | 🟡 Penting  |
| PRD-05 | Pencarian produk berdasarkan keyword                      | 🔴 Wajib    |
| PRD-06 | Filter produk (harga min-maks, kategori, rating)          | 🔴 Wajib    |
| PRD-07 | Sorting produk (terbaru, terlaris, harga naik/turun)      | 🔴 Wajib    |
| PRD-08 | Kategori produk (dengan ikon)                             | 🔴 Wajib    |
| PRD-09 | Sub-kategori produk                                       | 🟡 Penting  |
| PRD-10 | Produk terbaru & terlaris (section di home)               | 🔴 Wajib    |
| PRD-11 | Rekomendasi produk berdasarkan histori lihat              | 🟢 Opsional |

---

## 3. Modul Promosi & Diskon

| Kode     | Fitur                                               | Prioritas   |
| -------- | --------------------------------------------------- | ----------- |
| PROMO-01 | Diskon langsung produk (persen / nominal)           | 🔴 Wajib    |
| PROMO-02 | Flash Sale (harga turun + countdown timer)          | 🟡 Penting  |
| PROMO-03 | Banner promo di homepage (carousel)                 | 🔴 Wajib    |
| PROMO-04 | Voucher / kode kupon (potongan harga / ongkir)      | 🔴 Wajib    |
| PROMO-05 | Validasi voucher (min belanja, kuota, masa berlaku) | 🔴 Wajib    |
| PROMO-06 | Bundling produk (paket hemat beberapa item)         | 🟡 Penting  |
| PROMO-07 | Cashback ke dompet digital                          | 🟢 Opsional |
| PROMO-08 | Program loyalitas / koin reward                     | 🟢 Opsional |

---

## 4. Modul Keranjang Belanja (Cart)

| Kode    | Fitur                                       | Prioritas  |
| ------- | ------------------------------------------- | ---------- |
| CART-01 | Tambah produk ke keranjang                  | 🔴 Wajib   |
| CART-02 | Ubah jumlah item di keranjang               | 🔴 Wajib   |
| CART-03 | Hapus item dari keranjang                   | 🔴 Wajib   |
| CART-04 | Pilih/centang item yang akan di-checkout    | 🔴 Wajib   |
| CART-05 | Kalkulasi subtotal otomatis                 | 🔴 Wajib   |
| CART-06 | Keranjang tersimpan antar sesi (persistent) | 🟡 Penting |
| CART-07 | Badge jumlah item di ikon keranjang         | 🔴 Wajib   |

---

## 5. Modul Checkout & Pesanan

| Kode   | Fitur                                               | Prioritas  |
| ------ | --------------------------------------------------- | ---------- |
| CHK-01 | Pilih alamat pengiriman                             | 🔴 Wajib   |
| CHK-02 | Tambah & kelola beberapa alamat                     | 🔴 Wajib   |
| CHK-03 | Pilih kurir & jenis layanan (reguler, ekspres)      | 🔴 Wajib   |
| CHK-04 | Kalkulasi ongkos kirim otomatis (API RajaOngkir)    | 🔴 Wajib   |
| CHK-05 | Estimasi hari tiba                                  | 🟡 Penting |
| CHK-06 | Input & validasi kode voucher                       | 🔴 Wajib   |
| CHK-07 | Ringkasan pesanan (subtotal, ongkir, diskon, total) | 🔴 Wajib   |
| CHK-08 | Catatan untuk penjual                               | 🟡 Penting |
| CHK-09 | Konfirmasi & buat pesanan                           | 🔴 Wajib   |
| CHK-10 | Kode unik pesanan (Invoice Number)                  | 🔴 Wajib   |

---

## 6. Modul Pembayaran

| Kode   | Fitur                                 | Prioritas   |
| ------ | ------------------------------------- | ----------- |
| PAY-01 | Transfer Bank (Virtual Account)       | 🔴 Wajib    |
| PAY-02 | QRIS (scan QR)                        | 🔴 Wajib    |
| PAY-03 | Dompet Digital (GoPay, OVO, Dana)     | 🟡 Penting  |
| PAY-04 | COD (Bayar di Tempat)                 | 🟡 Penting  |
| PAY-05 | Paylater / Kredit                     | 🟢 Opsional |
| PAY-06 | Countdown batas waktu bayar           | 🔴 Wajib    |
| PAY-07 | Notifikasi konfirmasi pembayaran      | 🔴 Wajib    |
| PAY-08 | Webhook otomatis dari payment gateway | 🔴 Wajib    |
| PAY-09 | Riwayat transaksi pembayaran          | 🔴 Wajib    |

---

## 7. Modul Pengiriman

| Kode    | Fitur                                             | Prioritas  |
| ------- | ------------------------------------------------- | ---------- |
| SHIP-01 | Update status pesanan (Dikemas, Dikirim, Tiba)    | 🔴 Wajib   |
| SHIP-02 | Input nomor resi oleh admin                       | 🔴 Wajib   |
| SHIP-03 | Pelacakan pengiriman (tracking) via nomor resi    | 🟡 Penting |
| SHIP-04 | Notifikasi push setiap perubahan status           | 🔴 Wajib   |
| SHIP-05 | Konfirmasi penerimaan barang oleh pembeli         | 🔴 Wajib   |
| SHIP-06 | Auto-selesai jika tidak dikonfirmasi dalam X hari | 🟡 Penting |

---

## 8. Modul Ulasan & Rating

| Kode   | Fitur                                       | Prioritas  |
| ------ | ------------------------------------------- | ---------- |
| REV-01 | Beri rating bintang 1–5 per produk          | 🔴 Wajib   |
| REV-02 | Tulis komentar ulasan                       | 🔴 Wajib   |
| REV-03 | Upload foto bukti produk diterima           | 🟡 Penting |
| REV-04 | Tampilkan rata-rata rating di detail produk | 🔴 Wajib   |
| REV-05 | Filter ulasan berdasarkan bintang           | 🟡 Penting |

---

## 9. Modul Return & Komplain

| Kode   | Fitur                                         | Prioritas  |
| ------ | --------------------------------------------- | ---------- |
| RET-01 | Ajukan komplain produk (rusak / tidak sesuai) | 🟡 Penting |
| RET-02 | Upload bukti foto keluhan                     | 🟡 Penting |
| RET-03 | Admin proses keputusan (tukar / refund)       | 🟡 Penting |
| RET-04 | Refund ke metode pembayaran asal              | 🟡 Penting |

---

## 10. Modul Admin / Backoffice

| Kode   | Fitur                                            | Prioritas   |
| ------ | ------------------------------------------------ | ----------- |
| ADM-01 | Dashboard statistik (penjualan, pesanan, produk) | 🔴 Wajib    |
| ADM-02 | CRUD produk (tambah, edit, hapus, nonaktifkan)   | 🔴 Wajib    |
| ADM-03 | Upload foto produk (multiple)                    | 🔴 Wajib    |
| ADM-04 | Manajemen stok produk                            | 🔴 Wajib    |
| ADM-05 | Manajemen kategori                               | 🔴 Wajib    |
| ADM-06 | Kelola pesanan (ubah status, input resi)         | 🔴 Wajib    |
| ADM-07 | Buat & kelola diskon / voucher                   | 🔴 Wajib    |
| ADM-08 | Buat paket bundling                              | 🟡 Penting  |
| ADM-09 | Laporan penjualan (grafik + export Excel/PDF)    | 🟡 Penting  |
| ADM-10 | Kelola akun pelanggan                            | 🟡 Penting  |
| ADM-11 | Kirim notifikasi broadcast ke semua user         | 🟢 Opsional |

---

## Legenda Prioritas

- 🔴 **Wajib** — Harus ada di versi pertama (MVP)
- 🟡 **Penting** — Ada di iterasi kedua
- 🟢 **Opsional** — Nice-to-have, bisa ditambah kemudian
