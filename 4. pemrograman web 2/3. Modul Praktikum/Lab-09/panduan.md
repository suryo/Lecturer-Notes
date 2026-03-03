# Lab 09: Controllers & Form Validation

## Target Capaian

Mahasiswa mampu memisahkan logika ke Controller dan memvalidasi input form.

## Langkah-langkah

### 1. Membuat Controller

```bash
php artisan make:controller CategoryController
```

### 2. Menambahkan Validasi

Di `CategoryController.php`:

```php
public function store(Request $request) {
    $request->validate([
        'name' => 'required|min:3',
    ]);

    Category::create(['name' => $request->name]);
    return redirect('/categories');
}
```

## Tantangan Mandiri

Buatlah penanganan error di file Blade menggunakan `@error('name')` untuk menampilkan pesan peringatan jika input kosong.
