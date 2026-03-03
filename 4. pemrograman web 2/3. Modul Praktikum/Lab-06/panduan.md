# Lab 06: Database Migrations & Seeders

## Target Capaian

Mahasiswa mampu mengelola tabel database melalui perintah Artisan.

## Langkah-langkah

### 1. Membuat Migration

```bash
php artisan make:migration create_categories_table
```

Isi file migration di folder `database/migrations`:

```php
public function up(): void {
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
}
```

Lalu jalankan: `php artisan migrate`.

### 2. Membuat Seeder

```bash
php artisan make:seeder CategorySeeder
```

Isi di `database/seeders/CategorySeeder.php`:

```php
DB::table('categories')->insert([
    ['name' => 'Elektronik'],
    ['name' => 'Fashion'],
]);
```

Jalankan: `php artisan db:seed --class=CategorySeeder`.

## Tantangan Mandiri

Buatlah migration untuk tabel `books` dengan kolom `title`, `author`, dan `price`.
