# Pertemuan 9: Studi Kasus 2 - Online Shop (Sanctum Auth API)

## Deskripsi Singkat

Setelah sukses dengan Company Profile (Data Terbuka), kita masuk ke studi kasus kedua: **Online Shop**. Sesi ini fokus pada sisi Backend untuk mengamankan data pengguna menggunakan **Laravel Sanctum**.

## Tujuan Instruksional

1. Mahasiswa memahami pentingnya Token-based Authentication.
2. Mahasiswa mampu mengonfigurasi Laravel Sanctum untuk aplikasi Flutter.
3. Mahasiswa mampu membangun API Register dan Login yang menghasilkan Token.

## Materi Pembelajaran

### 1. Apa itu Laravel Sanctum?

Sanctum adalah sistem otentikasi ringan untuk API. Tidak seperti Session pada Web, Sanctum menggunakan **Personal Access Token**.

- User Login -> Laravel buatkan Token -> Token dikirim ke Flutter.
- Flutter simpan Token -> Token dikirim di setiap Request (Header) sebagai bukti Izin.

### 2. Persiapan Database Online Shop

Migration minimal:

- `users`: (Bawaan Laravel).
- `products`: name, price, stock, description, image.
- `categories`: name.

### 3. Membangun API Auth

Di `AuthController.php`, buat method `register` dan `login`.
**Logika Login**:

```php
public function login(Request $request) {
    if (Auth::attempt($request->only('email', 'password'))) {
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }
    return response()->json(['message' => 'Invalid login details'], 401);
}
```

### 4. Melindungi Route dengan Sanctum

Gunakan middleware `auth:sanctum` di `api.php`.

```php
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
```

## Praktikum

1. Instal Laravel Sanctum (di Laravel 10 biasanya sudah terpasang).
2. Buatlah API Register dan Login yang mengembalikan Token.
3. Uji coba Login melalui Postman dan pastikan Anda mendapatkan string `access_token`.
4. Uji coba mengakses URL yang diproteksi menggunakan token tersebut di Header Authorization.

## Latihan

Sebutkan perbedaan antara autentikasi berbasis **Session** (Web) dengan autentikasi berbasis **Token** (Mobile API). Mengapa Token lebih cocok untuk aplikasi seluler?
