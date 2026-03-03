# Lab 3: Stored Procedures & Functions dalam SQL

## Target Capaian

Mahasiswa mampu membungkus logika bisnis ke dalam Procedure dan Function di database.

## Langkah-langkah

### 1. Membuat Stored Procedure (MySQL)

Ubah `DELIMITER` agar bisa menulis `;` di dalam prosedur:

```sql
DELIMITER //
CREATE PROCEDURE GetCustomerByCity(IN city_name VARCHAR(50))
BEGIN
    SELECT * FROM customer c
    JOIN address a ON c.address_id = a.address_id
    WHERE a.city = city_name;
END //
DELIMITER ;
```

Panggil dengan: `CALL GetCustomerByCity('London');`

### 2. Membuat Function

Buat fungsi untuk menghitung denda keterlambatan buku/film:

```sql
CREATE FUNCTION CalcPenalty(days_late INT) RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN
    RETURN days_late * 5000;
END;
```

Panggil dengan: `SELECT CalcPenalty(5);`

## Tugas Praktikum

Buatlah sebuah Stored Procedure untuk melakukan proses "Pendaftaran Mahasiswa" yang otomatis memasukkan data ke tabel `users` dan tabel `mahasiswa` di dalam satu blok logika.
