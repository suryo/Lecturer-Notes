# Lab 9: Big Data dan Data Warehousing

## Target Capaian

Mahasiswa mampu menjalankan kueri analitik pada dataset besar menggunakan platform Data Warehouse (Google BigQuery).

## Langkah-langkah

### 1. Akses BigQuery

Buka [console.cloud.google.com/bigquery](https://console.cloud.google.com/bigquery). Gunakan akun Google Anda (Sandbox mode gratis).

### 2. Eksplorasi Public Dataset

Cari dataset `bigquery-public-data.austin_bikeshare.bikeshare_trips`.

### 3. Analitik SQL

Jalankan kueri untuk menghitung rata-rata durasi perjalanan per jenis member:

```sql
SELECT
    subscriber_type,
    AVG(duration_minutes) as avg_duration
FROM `bigquery-public-data.austin_bikeshare.bikeshare_trips`
GROUP BY subscriber_type
ORDER BY avg_duration DESC;
```

## Tugas Praktikum

Carilah dataset publik lainnya di BigQuery (misal: data COVID-19 atau data cuaca). Buatlah satu kueri analitik yang menarik dan jelaskan informasi apa yang Anda dapatkan dari hasil kueri tersebut.
