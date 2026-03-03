# Tugas 3: Warehouse Management System

## Deskripsi Tugas

Membangun sistem pengawasan gudang dengan fitur pencarian dan penyaringan data stok barang. Tugas ini menguji kemampuan logika query di backend dan interaktivitas UI di mobile.

## Kriteria Penilaian

1.  **Master Stok**: Menampilkan daftar barang gudang dengan pagination atau infinite scroll.
2.  **Searching**: Fitur pencarian barang berdasarkan nama atau kode barang secara real-time.
3.  **Filtering**: Penyaringan barang berdasarkan kategori gudang atau status stok (Tersedia/Kosong).
4.  **Backend Integration**: Menggunakan Eloquent Query Scopes atau query builder untuk efisiensi pencarian.

## Instruksi Pengerjaan

1.  Buat API Endpoint yang menerima query parameter `?search=...&category=...`.
2.  Gunakan `TextField` di Flutter dengan `onChanged` untuk memperbarui list barang secara asinkron.
3.  Tampilkan pesan "Barang Tidak Ditemukan" jika hasil query kosong.

---

**Deadline**: Sesuai instruksi di kelas.
**Pengumpulan**: Link GitHub Repository.
