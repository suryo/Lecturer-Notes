# Pertemuan 6: Replikasi & Backup Database

## Deskripsi Singkat

Sesi ini membahas strategi menjaga ketersediaan data (Availability) dan pemulihan data dari bencana (Disaster Recovery) melalui teknik replikasi dan manajemen backup yang canggih.

## Tujuan Instruksional

1. Mahasiswa memahami konsep High Availability (HA) melalui replikasi.
2. Mahasiswa mampu membedakan replikasi Master-Slave dan Master-Master.
3. Mahasiswa mampu melakukan Backup dan Point-In-Time Recovery (PITR).

## Materi Pembelajaran

### 1. Replikasi Database

- **Master-Slave**: Semua penulisan data dilakukan di Master, kemudian disinkronkan ke Slave (Read-Only). Berguna untuk Load Balancing kueri baca.
- **Master-Master**: Kedua server bisa menerima penulisan data. Lebih kompleks dalam menangani konflik data.

### 2. Teknik Backup

- **Logical Backup**: Mengubah data menjadi kueri SQL (`mysqldump`, `pg_dump`). Mudah dibaca tapi lambat untuk database raksasa.
- **Physical Backup**: Menyalin file binari database secara langsung. Sangat cepat tapi harus kompatibel dengan versi DBMS.

### 3. Point-In-Time Recovery (PITR)

Mekanisme pengembalian database ke waktu spesifik (misal: "Kembalikan ke kondisi jam 10:15 pagi tadi sebelum hacker masuk"). Mengandalkan kombinasi Full Backup dan Binary Logs.

## Praktikum

1. Cobalah melakukan backup database Sakila menggunakan `mysqldump` ke file `.sql`.
2. Lakukan simulasi penghapusan tabel secara tidak sengaja, lalu lakukan Restore.
3. (Demo/Diskusi) Setup replikasi sederhana menggunakan dua instance database (Docker/Cloud).

## Latihan

Kapan kita sebaiknya menggunakan **Replikasi** dan kapan kita cukup menggunakan **Backup Rutin**? Apakah replikasi bisa menggantikan fungsi backup? Jelaskan.
