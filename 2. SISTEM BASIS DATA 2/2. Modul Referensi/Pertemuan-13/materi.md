# Pertemuan 13: Pengembangan Proyek Akhir Basis Data Lanjutan

## Deskripsi Singkat

Sesi ini didedikasikan untuk implementasi teknis proyek akhir mahasiswa. Fokus pada penyelesaian integrasi, optimasi kueri yang telah dibuat, dan pengujian performa sistem di bawah beban data yang besar.

## Tujuan Instruksional

1. Mahasiswa mampu mengimplementasikan desain database yang kompleks ke dalam kode program.
2. Mahasiswa mampu melakukan Debugging dan pengujian fungsionalitas database.
3. Mahasiswa mampu melakukan Performance Testing (Load Testing).

## Materi Pembelajaran

### 1. Integrasi Akhir

Pastikan semua komponen (Web/App, API, Database SQL, Database NoSQL) sudah saling terhubung dengan lancar.

### 2. Debugging Database

- Memeriksa **Deadlocks** pada transaksi.
- Memeriksa **Invalid Indexes** (indeks yang ada tapi tidak pernah digunakan).
- Memeriksa kebocoran koneksi (Connection Leaks).

### 3. Performance Testing

Gunakan alat seperti JMeter atau script sederhana untuk menyimulasikan ratusan kueri per detik.

- Apakah database masih responsif?
- Apakah CPU server melonjak?
- Apakah perlu optimasi indexing tambahan?

## Praktikum

1. Selesaikan koding aplikasi proyek akhir Anda.
2. Jalankan perintah `EXPLAIN` pada kueri-kueri utama aplikasi Anda dan lampirkan hasilnya ke laporan.
3. Pastikan fitur Keamanan (Protected from SQLi) sudah terpasang.

## Latihan

Apa yang akan Anda lakukan jika setelah diuji, kueri laporan tahunan Anda memakan waktu lebih dari 10 detik? Sebutkan langkah-langkah optimasi yang akan Anda ambil.
