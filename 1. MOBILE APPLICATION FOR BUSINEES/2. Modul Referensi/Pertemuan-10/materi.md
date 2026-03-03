# Pertemuan 10: Authentication Flow (Login & Token Persistence)

## Deskripsi Singkat

Sesi ini membahas implementasi keamanan di sisi Frontend (Flutter). Kita akan belajar cara menyimpan Token yang didapat dari Laravel secara permanen di HP menggunakan package **shared_preferences**, sehingga user tidak perlu login berulang kali.

## Tujuan Instruksional

1. Mahasiswa mampu membangun UI Login dan Register yang rapi.
2. Mahasiswa mampu mengelola penyimpanan lokal dengan `shared_preferences`.
3. Mahasiswa mampu mengimplementasikan Interceptor/Auth Header di setiap request.

## Materi Pembelajaran

### 1. Alur Token di Smartphone

1. Input Username/Password via Form.
2. Kirim data ke API Laravel -> Terima JSON berisi Token.
3. Simpan Token ke memori HP.
4. Auto-login: Cek apakah ada token saat aplikasi pertama kali dibuka.

### 2. Menggunakan Shared Preferences

Instalasi: `flutter pub add shared_preferences`.
**Menyimpan Data**:

```dart
final prefs = await SharedPreferences.getInstance();
await prefs.setString('token', tokenValue);
```

**Mengambil Data**:

```dart
final String? token = prefs.getString('token');
```

### 3. Mengirim Token di Header

Setiap kali Flutter meminta data sensitif (misal: histori belanja), token harus disertakan:

```dart
var response = await http.get(
  Uri.parse(url),
  headers: {
    'Authorization': 'Bearer $savedToken',
    'Accept': 'application/json'
  },
);
```

### 4. Logout Logic

Proses logout berarti menghapus token dari local storage dan mengarahkan user kembali ke halaman login.

```bash
await prefs.remove('token');
Navigator.pushReplacementNamed(context, '/login');
```

## Praktikum

1. Buat halaman Login yang terhubung ke API Laravel Sanctum.
2. Simpan token hasil login ke `shared_preferences`.
3. Buat fitur "Cek Profil" yang hanya bisa dibuka jika user sudah login (mengirim token di header).
4. Implementasikan fitur Logout.

## Latihan

Kapan waktu yang tepat untuk melakukan validasi masa berlaku Token? Di sisi Client (sebelum request) atau di sisi Server (saat menerima request)? Jelaskan alasannya.
