# Tugas 2: Asset Management System

## Deskripsi Tugas

Membangun fitur pengelolaan aset perusahaan. Tugas ini menekankan pada kemampuan pengelolaan multimedia (gambar) dan penyimpanan data lokal sederhana.

## Kriteria Penilaian

1.  **Data Aset**: Nama aset, kategori, lokasi, dan kondisi (Bagus/Rusak/Perbaikan).
2.  **Image Upload (Flutter)**: Mengambil foto aset langsung menggunakan kamera atau galeri.
3.  **API Image Link**: Foto berhasil dikirim ke folder `public` Laravel dan dapat diakses balik oleh Flutter.
4.  **Local Persistence**: Menyimpan status terakhir aset yang dilihat menggunakan `shared_preferences`.

## Instruksi Pengerjaan

1.  Tambahkan kolom `image_path` pada tabel `assets`.
2.  Gunakan package `image_picker` di Flutter.
3.  Pastikan URL gambar yang dikirim oleh server diawali dengan alamat IP/Domain yang benar agar tampil di `Image.network()`.

---

**Deadline**: Sesuai instruksi di kelas.
**Pengumpulan**: Link GitHub Repository.
