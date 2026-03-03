# Lab 10: Integrasi Basis Data dengan Aplikasi Web

## Target Capaian

Mahasiswa mampu menghubungkan database ke aplikasi web dan membuat REST API sederhana.

## Langkah-langkah

### 1. Persiapan Backend (PHP/Python)

Gunakan framework seperti Laravel (PHP) atau Flask (Python).

### 2. Koneksi Database

Konfigurasi file `.env` untuk menghubungkan aplikasi ke MySQL/PostgreSQL.

### 3. Membuat Endpoint API

Buat route yang menjalankan kueri `SELECT * FROM mahasiswa` dan mengembalikan hasilnya sebagai JSON.
Contoh (Flask Python):

```python
@app.route('/api/mahasiswa')
def get_mahasiswa():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM mahasiswa")
    data = cur.fetchall()
    return jsonify(data)
```

## Tugas Praktikum

Gunakan **Postman** untuk menguji endpoint yang Anda buat. Tambahkan fitur untuk menambahkan data baru (POST) ke database melalui API tersebut.
