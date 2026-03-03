# Lab 6: Replikasi & Backup Database

## Target Capaian

Mahasiswa mampu melakukan pemeliharaan database melalui backup rutin dan memahami alur replikasi.

## Langkah-langkah

### 1. Database Export (Dump)

Gunakan command line (bukan SQL tab):

```bash
mysqldump -u root -p sakila > sakila_backup.sql
```

### 2. Database Import

Hapus database sakila, buat database kosong baru, lalu resto:

```bash
mysql -u root -p sakila_baru < sakila_backup.sql
```

### 3. Diskusi Replikasi

Identifikasi file `my.cnf` atau `my.ini`. Cari bagian `server-id` dan `log-bin`. Jelaskan fungsi kedua parameter tersebut dalam proses replikasi Master-Slave.

## Tugas Praktikum

Buatlah script `.bat` (Windows) atau `.sh` (Linux) sederhana yang melakukan backup database secara otomatis dan menamakannya berdasarkan tanggal hari ini (contoh: `backup-2023-10-25.sql`).
