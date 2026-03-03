# Pertemuan 4: Backend Foundation (Laravel 10)

## Deskripsi Singkat

Sesi ini membahas pondasi backend yang akan melayani data ke aplikasi mobile. Fokus utama adalah memahami alur **RESTful API**, pembuatan tabel dengan **Migrations**, serta interaksi data menggunakan **Eloquent ORM**.

## Tujuan Instruksional

1. Mahasiswa memahami prinsip dasar RESTful API (Stateless).
2. Mahasiswa mampu merancang skema database menggunakan Migrations.
3. Mahasiswa mampu mengimplementasikan API Route sederhana yang menghasilkan JSON.

## Materi Pembelajaran

### 1. Apa itu RESTful API?

API adalah pintu masuk aplikasi mobile ke database.

- **Endpoint**: Alamat URL (contoh: `/api/products`).
- **HTTP Methods**:
  - `GET`: Mengambil data.
  - `POST`: Menambah data.
  - `PUT/PATCH`: Mengupdate data.
  - `DELETE`: Menghapus data.
- **Response**: Selalu dalam format **JSON**.

### 2. Database Migrations

Versioning untuk database. Kita menulis struktur tabel di file PHP.

```bash
php artisan make:migration create_companies_table
```

Contoh kolom bisnis: `name`, `address`, `phone`, `email`, `logo`.

### 3. Eloquent Model

Jembatan antara PHP dan tabel database.

```bash
php artisan make:model Company
```

Property penting: `$fillable` (kolom yang boleh diisi secara massal).

### 4. API Controllers & Routes

Di Laravel 10, route API didefinisikan di `routes/api.php`.

```php
// routes/api.php
Route::get('/info', [CompanyController::class, 'show']);
```

Controller harus mengembalikan response JSON:

```php
return response()->json($data);
```

## Praktikum

1. Buatlah database baru bernama `db_mobile_business`.
2. Buatlah satu migration untuk tabel `profiles` (isi: nama_perusahaan, visi, misi, tahun_berdiri).
3. Buatlah satu API Route `/api/profile` yang mengambil data dari database tersebut.
4. Gunakan **Postman** untuk mencoba memanggil API tersebut dan pastikan muncul output JSON.

## Latihan

Mengapa untuk aplikasi mobile kita harus menggunakan `routes/api.php` dan bukan `routes/web.php`? Jelaskan perbedaannya dari sisi Middleware (CSRF, Session).
