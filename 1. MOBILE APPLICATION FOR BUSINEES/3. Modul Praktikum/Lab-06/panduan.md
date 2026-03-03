# Lab 6: Handling Image Uploads

## Target Capaian

Mahasiswa mampu mengambil gambar dari galeri HP dan mengirimkannya ke server Laravel.

## Langkah-langkah

### 1. Setup Image Picker

```bash
flutter pub add image_picker
```

Tambahkan Izin pada AndroidManifest.xml jika diperlukan (Android 10+ biasanya tidak perlu izin eksplisit untuk galeri bawaan picker).

### 2. Fungsi Ambil & Upload

```dart
final picker = ImagePicker();
final pickedFile = await picker.pickImage(source: ImageSource.gallery);

var request = http.MultipartRequest('POST', Uri.parse('http://10.0.2.2:8000/api/upload'));
request.files.add(await http.MultipartFile.fromPath('image', pickedFile!.path));
var response = await request.send();
```

### 3. Backend Laravel

```php
public function upload(Request $request) {
    $path = $request->file('image')->store('uploads', 'public');
    return response()->json(['url' => asset('storage/'.$path)]);
}
```

## Tantangan Mandiri

Tampilkan gambar yang baru saja diupload di aplikasi Flutter menggunakan `Image.network()`.
