# STUDI KASUS: REPLIKASI & BACKUP (Pertemuan 6)

# File 4: Konsep Dasar Replikasi (Master-Slave)

Replikasi adalah proses mengkopi data dari satu server ke server lainnya secara otomatis dan _real-time_.

---

## 1. MENGURUSA REPLIKASI MASTER-SLAVE

Dalam skenario ini, kita memiliki dua server:

1.  **SERVER-A (MASTER)**: Menerima penulisan data (WRITE).
2.  **SERVER-B (SLAVE/REPLICA)**: Hanya membaca data (READ-ONLY).

---

## 2. SETTING PADA SERVER MASTER (my.ini / my.cnf)

Pada file konfigurasi MySQL Server (Master), kita aktifkan fitur Binary Logs agar setiap perubahan dicatat.

```ini
# Edit file my.ini pada Master
[mysqld]
server-id = 1             # ID Unik untuk server master
log-bin = mysql-bin       # Aktifkan Binary Log (Wajib Replikasi)
binlog-do-db = sakila_v2  # Database mana yang direplikasi?
```

---

## 3. SETTING PADA SERVER SLAVE (my.ini / my.cnf)

Pada file konfigurasi Slave, kita beri ID yang berbeda.

```ini
# Edit file my.ini pada Slave
[mysqld]
server-id = 2             # ID Unik (harus beda dengan Master)
read-only = 1             # Pastikan Server B tidak menerima penulisan data langsung
```

---

## 4. MENERAPKAN PENULISAN (KOMAND PADA SLAVE)

Melalui MySQL Shell di **SERVER-B (Slave)**, kita "arahkan" agar dia mendengarkan Server A (Master).

```sql
CHANGE MASTER TO
    MASTER_HOST = '192.168.1.100',  -- Alamat IP Server Master
    MASTER_USER = 'replikasi_user', -- User khusus untuk tugas replikasi
    MASTER_PASSWORD = 'password123',
    MASTER_LOG_FILE = 'mysql-bin.000001',
    MASTER_LOG_POS = 154;

START SLAVE;
```

---

## 5. CARA MENGECEK STATUS REPLIKASI

Jalankan perintah ini melalui MySQL Shell di **SERVER-B (Slave)**:

```sql
SHOW SLAVE STATUS\G
```

- **Slave_IO_Running: Yes** → Terhubung ke Master.
- **Slave_SQL_Running: Yes** → Data berhasil ditarik dan ditulis ulang di Slave.

---

## KESIMPULAN REPLIKASI:

1. **Efisiensi**: Membagi beban baca (_Load Balancing_) antar server.
2. **Ketersediaan (Availability)**: Jika Master mati, Slave siap untuk dipromosikan menjadi Master baru.
3. **Peringatan**: Replikasi **TIDAK SAMA** dengan Backup. Jika Master menghapus data (DROP TABLE), Slave akan ikut menghapusnya secara otomatis saat itu juga. Itulah alasan kita TETAP butuh Backup Rutin (PITR).
