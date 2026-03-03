# Tugas 2: Database Automation (SP & Triggers)

## Deskripsi Tugas

Membangun logika bisnis yang otomatis di dalam database untuk meminimalkan beban di sisi aplikasi.

## Kriteria Penilaian

1. **Stored Procedure**: Membuat prosedur kompleks (misal: penutupan buku akhir bulan) yang menggunakan parameter dan control flow.
2. **Triggers**: Membuat sistem audit log yang mencatat perubahan data sensitif secara otomatis.
3. **Error Handling**: Menggunakan `SIGNAL SQLSTATE` untuk memvalidasi input di dalam database.

## Instruksi

- Buatlah skema database Toko Buku.
- Implementasikan trigger yang otomatis mengurangi stok saat ada penjualan.
- Buat prosedur untuk menghitung total pendapatan bulanan.

---

**Deadline**: Pertemuan 7.
**Format**: SQL Script dan Laporan Penjelasan.
