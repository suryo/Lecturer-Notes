# Pertemuan 8: UTS - Midterm Break & Materi Review

## Deskripsi Singkat

Sesi ini meninjau kembali seluruh materi yang telah dipelajari dari Pertemuan 1 hingga 7. Mahasiswa fokus pada pemantapan integrasi antara Flutter dan Laravel sebelum mengerjakan proyek tengah semester.

## Topik Utama yang Direview

1.  **Arsitektur API-Centric**: Alur komunikasi JSON antara Flutter dan Laravel.
2.  **UI & State Management**: Penggunaan basic widgets dan Provider untuk mengelola data lokal.
3.  **HTTP Request**: Implementasi GET dan POST menggunakan package `http`.
4.  **Multimedia**: Manajemen upload file gambar dari galeri ke storage server.

## Panduan Ujian Tengah Semester (UTS)

Bentuk UTS adalah **Pengembangan Aplikasi Company Profile Dinamis** dengan spesifikasi:

- **Fitur Backend (Laravel)**:
  - API untuk profil perusahaan (Visi, Misi, Alamat, Kontak).
  - API untuk galeri foto kegiatan perusahaan.
  - Dashboard sederhana (Web) untuk mengedit informasi tersebut.
- **Fitur Frontend (Flutter)**:
  - Menampilkan profil perusahaan secara menarik.
  - Menampilkan galeri foto dalam bentuk GridView.
  - Fitur "Hubungi Kami" yang mengirim data ke database.

## Kriteria Penilaian

- **Kerapian UI**: Penggunaan layouting yang responsif dan estetika bisnis (20%).
- **Integritas Data**: Kesesuaian antara data di database dengan yang tampil di aplikasi (30%).
- **Fungsionalitas**: Tidak ada fitur yang "Force Close" saat digunakan (40%).
- **Handling Error**: Terdapat loading state dan penanganan error koneksi (10%).

## Persiapan Teknis

- Pastikan file `storage:link` sudah terpasang di server backend.
- Pastikan API bisa diakses oleh emulator (menggunakan IP `10.0.2.2`) atau HP fisik (via IP Lokal WiFi).

---

**Pesan**: Fokus pada penyelesaian alur data yang lancar sebelum mempercantik tampilan. UI yang indah tidak berguna jika data tidak tampil.
