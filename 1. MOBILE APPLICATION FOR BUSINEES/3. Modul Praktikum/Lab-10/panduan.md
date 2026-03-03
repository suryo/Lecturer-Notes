# Lab 10: Persistent Login (Local Storage)

## Target Capaian

Mahasiswa mampu menyimpan token login di HP agar user tidak perlu login setiap kali membuka aplikasi.

## Langkah-langkah

### 1. Instalasi Shared Preferences

```bash
flutter pub add shared_preferences
```

### 2. Menyimpan Token

Setelah login berhasil di Flutter:

```dart
final prefs = await SharedPreferences.getInstance();
await prefs.setString('token', tokenResult);
```

### 3. Auto-Login Flow

Ubah `main.dart` untuk mengecek token saat startup:

```dart
void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  final prefs = await SharedPreferences.getInstance();
  final token = prefs.getString('token');
  runApp(MaterialApp(home: token == null ? LoginPage() : HomePage()));
}
```

## Tantangan Mandiri

Buatlah tombol Logout yang menghapus token dari `shared_preferences` dan mengarahkan user kembali ke LoginPage.
