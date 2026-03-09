# STUDI KASUS: REPLIKASI & BACKUP (Pertemuan 6)

# File 2: Logical Backup & Restore (mysqldump)

Materi ini melibatkan penggunaan Command Line (CMD/Terminal). Buka aplikasi Terminal favoritmu (atau MySQL Shell) dan ikuti langkah-langkah berikut:

---

## 1. MELAKUKAN LOGICAL BACKUP (EXPORT)

Gunakan perintah `mysqldump` untuk mengekspor database `sakila_v2` ke dalam file SQL tunggal. File ini akan berisi semua instruksi `CREATE TABLE` dan `INSERT` yang diperlukan untuk membangun ulang database.

**Buka Command Prompt (CMD) atau PowerShell (Jangan di dalam Shell MySQL):**

```bash
# Pastikan folder bin MySQL sudah terdaftar di Path (misalnya: C:\xampp\mysql\bin)
mysqldump -u root -p sakila_v2 > backup_sakila_v2.sql
```

- `-u root`: Nama pengguna (default MySQL seringkali adalah `root`).
- `-p`: Mintalah kata sandi (akan ditanya saat Enter).
- `sakila_v2`: Nama database yang ingin diekspor.
- `> backup_sakila_v2.sql`: Simpan output ke file bernama `backup_sakila_v2.sql`.

---

## 2. SIMULASI KEHILANGAN DATA (BENCANA)

Kembalilah ke MySQL/MariaDB Shell (misal: HeidiSQL, DBeaver, atau CMS MySQL) dan jalankan perintah penghapusan tabel:

```sql
USE sakila_v2;

-- Skenario: Seseorang tidak sengaja menghapus tabel staff!
DROP TABLE staff;

-- Skenario: Seluruh database tidak sengaja dihapus!
DROP DATABASE sakila_v2;
```

---

## 3. MELAKUKAN RESTORE (IMPORT)

Gunakan perintah `mysql` untuk mengimpor kembali file `backup_sakila_v2.sql`.

**Pastikan Database Kosong Sudah Dibuat Terlebih Dahulu (Jika tadi DROP DATABASE):**

```sql
CREATE DATABASE sakila_v2;
```

**Buka Lagi Command Prompt (CMD/Terminal):**

```bash
# Lakukan restore dengan perintah ini:
mysql -u root -p sakila_v2 < backup_sakila_v2.sql
```

- `< backup_sakila_v2.sql`: Mengarahkan isi file ke program `mysql`.

---

## KESIMPULAN PRAKTIKUM:

1. **Logical Backup** sangat mudah dibaca karena berbentuk instruksi SQL biasa.
2. Sangat berguna untuk memindahkan data antar server yang versinya berbeda (Portability).
3. Namun, untuk database berukuran puluhan Terabyte, proses ini akan memakan waktu sangat lama (Lambat dalam Penulisan & Pembacaan Kembali).
