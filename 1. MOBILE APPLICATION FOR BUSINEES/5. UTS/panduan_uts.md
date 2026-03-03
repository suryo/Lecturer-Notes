# Panduan UTS: Proyek Company Profile Terintegrasi

## Tema Proyek

Membangun aplikasi mobile profil perusahaan yang informasinya diambil secara dinamis dari server pusat.

## Kebutuhan Sistem (Requirements)

1.  **Halaman Utama (Home)**: Menampilkan nama perusahaan, logo (image upload), dan deskripsi singkat.
2.  **Halaman Visi & Misi**: Mengambil data teks panjang dari API.
3.  **Halaman Galeri**: Menampilkan foto-foto kegiatan perusahaan dalam bentuk Grid.
4.  **Halaman Hubungi Kami**: Form yang mengirim data (Nama, Email, Pesan) ke database server.
5.  **Dashboard Admin (Laravel Web)**: Halaman sederhana (bukan mobile) untuk mengubah data-data di atas agar Aplikasi Mobile ikut terupdate.

## Ketentuan Teknis

- Backend: Laravel 10 (Web Admin & API).
- Mobile: Flutter.
- Database: MySQL.
- State Management: Provider (Wajib).

## Rubrik Penilaian

- **Kerapian Arsitektural**: 30% (Pemisahan Model, Service, Widget).
- **Fungsionalitas API**: 40% (GET, POST, Multipart Image Upload).
- **Desain UI/UX**: 20% (User friendly & Responsif).
- **Pengumpulan Tepat Waktu**: 10%.

---

**Format Pengumpulan**: Link GitHub & Video Demo singkat penggunaan aplikasi.
