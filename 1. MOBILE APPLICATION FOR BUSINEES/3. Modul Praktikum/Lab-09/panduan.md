# Lab 9: Sanctum Auth API Implementation

## Target Capaian

Mahasiswa mampu membangun sistem login di Laravel yang menghasilkan token untuk digunakan aplikasi mobile.

## Langkah-langkah

### 1. Membuat AuthController

```bash
php artisan make:controller Api/AuthController
```

Isi dengan method `register` dan `login`. Pastikan menggunakan `createToken` untuk menghasilkan string token.

### 2. Konfigurasi Routes

Di `routes/api.php`, pastikan route login tidak dilindungi middleware, tapi route profil diproteksi:

```php
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
```

### 3. Testing with Postman

Login melalui Postman dan copy string token yang didapat. Gunakan token tersebut di Header **Authorization: Bearer <token>** saat mengakses `/api/user`.

## Tantangan Mandiri

Implementasikan method `logout` yang menghapus current access token dari database.
