# Lab 4: Triggers & Event Scheduling

## Target Capaian

Mahasiswa mampu mengotomatisasi database menggunakan Trigger untuk log audit dan Event Scheduler.

## Langkah-langkah

### 1. Membuat Trigger Audit

Buat tabel `log_pembayaran`. Buat trigger yang mencatat setiap ada data baru di tabel `payment`:

```sql
CREATE TRIGGER after_payment_insert
AFTER INSERT ON payment
FOR EACH ROW
BEGIN
    INSERT INTO log_pembayaran(payment_id, amount, created_at)
    VALUES (NEW.payment_id, NEW.amount, NOW());
END;
```

### 2. Event Scheduler

Aktifkan scheduler: `SET GLOBAL event_scheduler = ON;`
Buat event untuk membersihkan log yang usianya lebih dari 30 hari:

```sql
CREATE EVENT clean_old_logs
ON SCHEDULE EVERY 1 WEEK
DO
  DELETE FROM log_pembayaran WHERE created_at < NOW() - INTERVAL 30 DAY;
```

## Tugas Praktikum

Buatlah trigger `BEFORE UPDATE` pada tabel `inventory` yang mencegah update stok menjadi angka negatif (jika stok baru < 0, batalkan atau set ke 0).
