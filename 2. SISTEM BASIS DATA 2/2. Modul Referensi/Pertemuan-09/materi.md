# Pertemuan 9: Big Data dan Data Warehousing

## Deskripsi Singkat

Sesi ini membahas transisi dari database operasional (OLTP) ke database analitik (Data Warehouse) dan bagaimana menangani dataset besar dalam ekosistem Big Data.

## Tujuan Instruksional

1. Mahasiswa memahami perbedaan OLTP dan OLAP.
2. Mahasiswa memahami konsep ETL (Extract, Transform, Load).
3. Mahasiswa mengenal solusi Cloud Data Warehouse (BigQuery, Redshift).

## Materi Pembelajaran

### 1. OLTP vs OLAP

- **OLTP (Online Transaction Processing)**: Fokus pada kecepatan transaksi kecil (Insert/Update harian). Contoh: MySQL untuk toko online.
- **OLAP (Online Analytical Processing)**: Fokus pada kueri analitik besar (Reporting/Business Intelligence). Contoh: Data Warehouse.

### 2. Konsep Data Warehouse

Data Warehouse menyimpan data historis dari berbagai sumber yang sudah dibersihkan dan disiapkan untuk analisis.

- **Data Mart**: Bagian dari Data Warehouse yang fokus pada satu departemen (misal: Finance saja).
- **ETL**: Proses memindahkan data dari database aplikasi ke Data Warehouse.

### 3. Big Data Analytics

Mengolah data yang terlalu besar untuk server tunggal:

- **Google BigQuery**: Database serverless yang mampu memproses Terabyte data dalam hitungan detik menggunakan SQL.
- **AWS Redshift**: Solusi Warehouse yang skalabel di infrastruktur Amazon.

## Praktikum

1. Eksplorasi dataset publik di **Kaggle** atau **Google BigQuery Public Datasets**.
2. Simulasikan kueri analitik sederhana (misal: tren penjualan tahunan) menggunakan SQL analitik.
3. Diskusikan arsitektur "Star Schema" dan "Snowflake Schema" dalam desain Warehouse.

## Latihan

Apa perbedaan utama antara **Data Warehouse** dan **Data Lake**? Kapan sebuah perusahaan membutuhkan Data Lake?
