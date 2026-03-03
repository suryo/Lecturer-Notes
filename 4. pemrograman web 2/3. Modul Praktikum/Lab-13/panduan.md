# Lab 13: RESTful API Development (Sanctum)

## Target Capaian

Mahasiswa mampu menyajikan data JSON untuk dikonsumsi front-end lain.

## Langkah-langkah

1. Buka `routes/api.php`.
2. Buat endpoint data kategori:

```php
Route::get('/categories', function() {
    return Category::all();
});
```

3. Gunakan Postman untuk mengetes.

## Tantangan Mandiri

Proteksi endpoint API tersebut menggunakan middleware `auth:sanctum`.
