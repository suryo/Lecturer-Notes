# Lab 4: Laravel API Setup & Migrations

## Target Capaian

Mahasiswa mampu merancang tabel database dan menyajikannya dalam format API JSON.

## Langkah-langkah

### 1. Konfigurasi .env

Sesuaikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` dengan database MySQL Anda.

### 2. Membuat Migration

```bash
php artisan make:migration create_profiles_table
```

Ubah file migrations di `database/migrations`:

```php
public function up() {
    Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('about');
        $table->timestamps();
    });
}
```

Lalu jalankan `php artisan migrate`.

### 3. Membuat Controller & Route

```bash
php artisan make:controller Api/ProfileController
```

Di `ProfileController`:

```php
public function show() {
    return response()->json([
        'name' => 'Antigravity Corp',
        'about' => 'Tech Solution Expert'
    ]);
}
```

Di `routes/api.php`:

```php
Route::get('/profile', [ProfileController::class, 'show']);
```

## Tantangan Mandiri

Uji API Anda menggunakan **Postman**. Pastikan output yang keluar adalah format JSON.
