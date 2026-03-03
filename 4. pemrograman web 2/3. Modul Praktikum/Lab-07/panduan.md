# Lab 07: Eloquent ORM Basics (CRUD)

## Target Capaian

Mahasiswa mampu berinteraksi dengan database menggunakan Model Eloquent.

## Langkah-langkah

### 1. Membuat Model

```bash
php artisan make:model Category
```

### 2. Eksperimen di Tinker

```bash
php artisan tinker
```

Di dalam Tinker, coba perintah ini:

```php
$c = new App\Models\Category;
$c->name = 'Otomotif';
$c->save();

App\Models\Category::all();
```

## Tantangan Mandiri

Buatlah file `app/Models/Category.php` dan tambahkan variabel `$fillable` agar bisa menggunakan method `create()`.
