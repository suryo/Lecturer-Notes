# RENCANA PEMBELAJARAN SEMESTER (RPS)
## PROGRAM STUDI TEKNIK INFORMATIKA
### FAKULTAS TEKNIK UNIVERSITAS WIJAYA PUTRA

---

## IDENTITAS MATA KULIAH

| Mata Kuliah (MK) | Kode | Rumpun MK | Bobot (sks) | | Semester | Tgl Penyusunan |
|---|---|---|---|---|---|---|
| Sistem Basis Data 2 | TIF-SBD2 | Basis Data | T=2 | P=1 | Genap 2024/2025 | 2026-03-11 |

---

## OTORISASI

| Pengembang RPS | Koordinator RMK | Ketua PRODI |
|---|---|---|
| | | |

---

## CAPAIAN PEMBELAJARAN (CP)

### CPL-PRODI yang Dibebankan pada MK

| Kode | Deskripsi CPL |
|---|---|
| **CPL07** | Kemampuan menganalisis persoalan computing yang kompleks serta menerapkan prinsip-prinsip computing dan disiplin ilmu relevan lainnya untuk mengidentifikasi solusi, dengan mempertimbangkan wawasan perkembangan ilmu transdisiplin. *(P04)* |
| **CPL11** | Kemampuan mendesain, mengimplementasi dan mengevaluasi solusi berbasis computing multi-platform yang memenuhi kebutuhan computing pada sebuah organisasi. *(KK09)* |

---

### Capaian Pembelajaran Mata Kuliah (CPMK)

| Kode CPMK | Deskripsi CPMK | CPL yang Didukung |
|---|---|---|
| **CPMK071** | Mahasiswa mampu mengidentifikasi karakteristik persoalan computing yang kompleks dalam berbagai konteks (organisasi, sosial, industri). | CPL07 |
| **CPMK075** | Mahasiswa mampu mengimplementasikan solusi terpilih dalam bentuk prototipe/produk berbasis teknologi computing yang sesuai kebutuhan. | CPL07 |
| **CPMK111** | Mahasiswa mampu mengidentifikasi kebutuhan pengguna dan organisasi dalam pengembangan solusi berbasis computing multi-platform. | CPL11 |
| **CPMK113** | Mahasiswa mampu mengimplementasikan solusi berbasis teknologi multi-platform dalam bentuk aplikasi. | CPL11 |

---

### Kemampuan Akhir Tiap Tahapan Belajar (Sub-CPMK)

| Kode Sub-CPMK | Deskripsi |
|---|---|
| Sub-CPMK071.1 | Dapat mengidentifikasi masalah performa database (index, query lambat) dalam konteks sistem yang kompleks. |
| Sub-CPMK071.2 | Dapat menganalisis dan menjelaskan masalah konkurensi (Dirty Read, Non-repeatable Read, Phantom Read) dalam akses data bersamaan. |
| Sub-CPMK075.1 | Dapat mengimplementasikan solusi indexing (B-Tree, Hash, Covering Index) untuk meningkatkan performa query. |
| Sub-CPMK075.2 | Dapat membangun Stored Procedure, Function, dan Trigger sebagai solusi otomasi logika bisnis dalam database. |
| Sub-CPMK111.1 | Dapat mengidentifikasi kebutuhan sistem basis data tingkat lanjut untuk mendukung organisasi (replikasi, backup, recovery). |
| Sub-CPMK113.1 | Dapat mengimplementasikan solusi basis data NoSQL (MongoDB / Firebase) sebagai alternatif sistem penyimpanan data. |

---

### Korelasi antara CPMK terhadap Sub-CPMK

| | Sub-CPMK071.1 | Sub-CPMK071.2 | Sub-CPMK075.1 | Sub-CPMK075.2 | Sub-CPMK111.1 | Sub-CPMK113.1 |
|---|:---:|:---:|:---:|:---:|:---:|:---:|
| **CPMK071** | V | V | | | | |
| **CPMK075** | | | V | V | | |
| **CPMK111** | V | | | | V | |
| **CPMK113** | | | | V | | V |

---

## DESKRIPSI SINGKAT MK

Mata kuliah ini merupakan kelanjutan dari Sistem Basis Data 1 yang membahas teknik-teknik tingkat lanjut dalam pengelolaan basis data. Topik utama meliputi strategi pengoptimalan kueri dan indexing, pemrograman basis data (Stored Procedure, Function, Trigger), manajemen transaksi dan konkurensi (ACID, Isolation Level), strategi replikasi dan backup data, serta pengenalan paradigma basis data NoSQL (MongoDB, Firebase). Mahasiswa diharapkan mampu merancang dan mengimplementasikan solusi basis data yang efisien, aman, dan andal untuk mendukung kebutuhan sistem organisasi modern.

---

## BAHAN KAJIAN: MATERI PEMBELAJARAN

1. Review Basis Data 1 & pengantar topik lanjutan
2. Indexing: B-Tree, Hash, Composite Index — Konsep dan Implementasi
3. Query Performance Tuning: EXPLAIN, Sargability, Covering Index
4. Stored Procedures — Parameter IN, OUT, INOUT
5. Functions & Control Flow (IF-ELSE, LOOP, CASE)
6. Triggers — BEFORE, AFTER — Audit Log & Sinkronisasi
7. Event Scheduling — Automatisasi Tugas Terjadwal
8. Transaksi & Properti ACID — Atomicity, Consistency, Isolation, Durability
9. Manajemen Konkurensi — Isolation Levels
10. Replikasi Database — Master-Slave, Master-Master
11. Backup & Point-In-Time Recovery (PITR)
12. Pengantar NoSQL — SQL vs NoSQL, Document-Oriented
13. MongoDB CRUD Operations
14. Firebase Firestore — Real-time Database

---

## PUSTAKA

**Utama:**
- Silberschatz, A., Korth, H. F., & Sudarshan, S. (2020). *Database System Concepts* (7th ed.). McGraw-Hill.
- Schwartz, B., Zaitsev, P., & Tkachenko, V. (2012). *High Performance MySQL* (3rd ed.). O'Reilly Media.
- Modul Ajar Sistem Basis Data 2 — Tim Pengampu, Universitas Wijaya Putra.

**Pendukung:**
- Dokumentasi MySQL: https://dev.mysql.com/doc/
- Dokumentasi MongoDB: https://www.mongodb.com/docs/
- Dokumentasi Firebase: https://firebase.google.com/docs

---

## DOSEN PENGAMPU

...

## MATA KULIAH SYARAT

Sistem Basis Data 1, Algoritma dan Pemrograman

---

## RENCANA PEMBELAJARAN PER MINGGU

| Mg Ke- | Kemampuan Akhir Tiap Tahapan Belajar (Sub-CPMK) | Penilaian (Indikator) | Penilaian (Teknik & Kriteria) | Pembelajaran Daring Sinkron | Pembelajaran Daring Asinkron | Materi Pembelajaran | Bobot Penilaian (%) |
|:---:|---|---|---|---|---|---|:---:|
| **(1)** | **(2)** | **(3)** | **(4)** | **(5)** | **(6)** | **(7)** | **(8)** |
| **1** | Sub-CPMK071.1 — Review Basis Data 1 & Identifikasi Masalah Performa | Mampu menjelaskan masalah umum performa database | Kuis + Partisipasi | Kuliah + Diskusi (100 mnt) | Buku referensi & materi review (170 mnt) | Review SQL; Pengantar topik lanjutan SBD2; Studi kasus database lambat | 3% |
| **2** | Sub-CPMK075.1 — Indexing: B-Tree & Hash | Mampu membuat index B-Tree & Hash yang tepat | Laporan praktikum (BT+PT) | Live coding + diskusi (100 mnt) | Praktik mandiri: buat & bandingkan index (170 mnt) | Jenis Index; `CREATE INDEX`; B-Tree vs Hash; `SHOW INDEX` | 4% |
| **3** | Sub-CPMK071.1, Sub-CPMK075.1 — Query Performance Tuning & EXPLAIN | Mampu membaca output EXPLAIN & mengoptimalkan query | Laporan analisis query | Workshop EXPLAIN (100 mnt) | Praktik mandiri studi kasus (170 mnt) | `EXPLAIN`; Sargability; Covering Index; `SELECT *` vs `SELECT [kolom]` | 5% |
| **4** | Sub-CPMK075.2 — Stored Procedure (Parameter IN, OUT) | Procedure berjalan benar sesuai spesifikasi | Demo & review kode | Live coding (100 mnt) | Latihan mandiri procedure (170 mnt) | `CREATE PROCEDURE`; `DELIMITER`; Parameter IN/OUT; `CALL` | 5% |
| **5** | Sub-CPMK075.2 — Functions & Control Flow (IF-ELSE, LOOP, CASE) | Function mengembalikan nilai dengan benar | Demo & review kode | Live coding (100 mnt) | Latihan mandiri function (170 mnt) | `CREATE FUNCTION`; `IF-ELSE`; `WHILE/LOOP`; Logika bisnis dalam SQL | 5% |
| **6** | Sub-CPMK075.2 — Triggers (BEFORE & AFTER) | Trigger aktif sesuai event yang ditentukan | Demo & review kode | Live coding (100 mnt) | Latihan mandiri trigger (170 mnt) | `CREATE TRIGGER`; `OLD` & `NEW`; Audit Log; Sinkronisasi data antar tabel | 5% |
| **7** | Sub-CPMK075.2 — Event Scheduling | Event berjalan sesuai jadwal yang dikonfigurasi | Demo & laporan | Workshop (100 mnt) | Praktik mandiri event (170 mnt) | `SET GLOBAL event_scheduler = ON`; `CREATE EVENT`; Pembersihan data otomatis | 3% |
| **8** | **Evaluasi Tengah Semester (UTS)** | Ujian teori + soal kasus optimasi & procedure | Tes Tulis + Unjuk Kerja | Ujian daring | — | Materi Mg 1–7 | **20%** |
| **9** | Sub-CPMK071.2 — Transaksi & Properti ACID | Mampu menjelaskan & mendemonstrasikan ACID | Demo COMMIT/ROLLBACK | Kuliah + simulasi (100 mnt) | Studi kasus mandiri (170 mnt) | `START TRANSACTION`; `COMMIT`; `ROLLBACK`; Atomicity; Durability | 5% |
| **10** | Sub-CPMK071.2 — Manajemen Konkurensi & Isolation Levels | Mampu mensimulasikan Dirty Read & mengatasinya | Laporan simulasi dua sesi | Workshop dua terminal (100 mnt) | Praktik mandiri (170 mnt) | Dirty Read; Non-repeatable Read; `SET SESSION TRANSACTION ISOLATION LEVEL` | 5% |
| **11** | Sub-CPMK111.1 — Replikasi Database (Master-Slave) | Mampu menjelaskan konfigurasi replikasi | Laporan & presentasi | Diskusi + demo konfigurasi (100 mnt) | Studi kasus mandiri (170 mnt) | Master-Slave Replication; Binary Log; `SHOW SLAVE STATUS` | 5% |
| **12** | Sub-CPMK111.1 — Backup & Point-In-Time Recovery (PITR) | Mampu melakukan backup & restore database | Demo backup & restore | Workshop `mysqldump` (100 mnt) | Praktik mandiri (170 mnt) | Logical Backup (`mysqldump`); Restore; PITR dengan Binary Log | 5% |
| **13** | Sub-CPMK113.1 — Pengantar NoSQL & MongoDB | Mampu membedakan SQL dan NoSQL & struktur dokumen | Kuis + Partisipasi | Kuliah + demo Compass (100 mnt) | Eksplorasi MongoDB Atlas (170 mnt) | SQL vs NoSQL; Document vs Table; Collection; `use db`; `insertOne`; `find` | 3% |
| **14** | Sub-CPMK113.1 — MongoDB CRUD Operations | CRUD berjalan dengan benar di MongoDB Shell | Laporan CRUD | Live coding (100 mnt) | Praktik mandiri (170 mnt) | `insertMany`; `find` dengan filter; `updateOne ($set)`; `deleteOne` | 4% |
| **15** | Sub-CPMK113.1 — Firebase Firestore | Mampu membuat & membaca data Firestore secara real-time | Demo & laporan | Workshop Firebase Console (100 mnt) | Eksplorasi mandiri (170 mnt) | Firebase Firestore; `addDoc`; `onSnapshot`; Real-time Sync; Offline Mode | 3% |
| **16** | **Evaluasi Akhir Semester (UAS)** | Proyek basis data komprehensif + presentasi | Unjuk Kerja + Tes Lisan | Presentasi UAS | — | Seluruh Materi | **20%** |

> **Keterangan Waktu:** BT=Belajar Terbimbing, PT=Penugasan Terstruktur, KM=Kegiatan Mandiri

---

## BOBOT PENILAIAN MATA KULIAH

| CPL | CPMK | Partisipasi (Kehadiran/Kuis) | Observasi (Praktek/Tugas) | Unjuk Kerja (Presentasi) | Tes Tulis (UTS) | Tes Tulis (UAS) | Tes Lisan (Tugas Kelompok) | Total |
|---|---|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
| **CPL07** | CPMK071 | 6% | 5% | — | 9% | — | — | **20%** |
| | CPMK075 | — | 13% | — | 7% | 5% | — | **25%** |
| **CPL11** | CPMK111 | 4% | 5% | — | 4% | 5% | — | **18%** |
| | CPMK113 | — | 7% | 5% | — | 5% | — | **17%** |
| **Total Bobot** | | **10%** | **30%** | **5%** | **20%** | **15%** | **—** | **80%** |
| *Catatan: +20% UAS (proyek akhir)* | | | | **+20%** | | | | **100%** |

---

*Dokumen ini merupakan Rencana Pembelajaran Semester (RPS) resmi mata kuliah Sistem Basis Data 2, Program Studi Teknik Informatika, Fakultas Teknik, Universitas Wijaya Putra.*

*Disusun berdasarkan Permendikbud No. 3 Tahun 2020 tentang Standar Nasional Pendidikan Tinggi (SN-Dikti).*
