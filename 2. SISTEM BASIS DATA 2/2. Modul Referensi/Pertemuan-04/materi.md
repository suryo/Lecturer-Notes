# Pertemuan 4: Triggers & Event Scheduling

## Deskripsi Singkat

Sesi ini membahas mekanisme automasi di dalam database menggunakan Triggers untuk menangani perubahan data secara otomatis dan Event Scheduler untuk menjalankan tugas rutin berdasarkan waktu.

## Tujuan Instruksional

1. Mahasiswa memahami konsep Trigger (Before, After, Instead Of).
2. Mahasiswa mampu mengimplementasikan Trigger untuk audit log dan sinkronisasi data.
3. Mahasiswa mampu mengatur Event Scheduler untuk tugas pembersihan data rutin.

## Materi Pembelajaran

### 1. Konsep Triggers

Trigger adalah sekumpulan instruksi yang otomatis dieksekusi ketika terjadi event `INSERT`, `UPDATE`, atau `DELETE` pada sebuah tabel.

- **BEFORE Trigger**: Dijalankan sebelum data disimpan (cocok untuk validasi/pembersihan input).
- **AFTER Trigger**: Dijalankan setelah data berhasil disimpan (cocok untuk mencatat log ke tabel audit).

### 2. Implementasi Trigger (Audit Log)

Contoh mencatat setiap perubahan harga produk ke tabel history:

```sql
CREATE TRIGGER log_price_change
AFTER UPDATE ON products
FOR EACH ROW
BEGIN
    IF OLD.price <> NEW.price THEN
        INSERT INTO price_logs(product_id, old_price, new_price, changed_at)
        VALUES (OLD.id, OLD.price, NEW.price, NOW());
    END IF;
END;
```

### 3. Event Scheduling

Event Scheduler adalah "cron job" versi database. Digunakan untuk tugas-tugas seperti menghapus log lama atau mereset stok harian.

```sql
CREATE EVENT reset_daily_visitor
ON SCHEDULE EVERY 1 DAY
STARTS '2023-01-01 00:00:00'
DO
  UPDATE stats SET daily_count = 0;
```

## Praktikum

1. Buatlah sistem audit sederhana pada tabel `accounts` perbankan.
2. Implementasikan trigger yang mencegah penarikan uang jika saldo tidak mencukupi.
3. Aktifkan Event Scheduler di MySQL dan buat event untuk menghapus data expired.

## Latihan

Apa risiko performa yang mungkin timbul jika sebuah tabel memiliki terlalu banyak trigger kompleks? Bagaimana urutan eksekusi jika terdapat lebih dari satu trigger pada event yang sama?
