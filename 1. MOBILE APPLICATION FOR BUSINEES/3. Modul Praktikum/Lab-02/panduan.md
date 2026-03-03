# Lab 2: Building Business UI Layouts

## Target Capaian

Mahasiswa mampu menyusun layout dasar antarmuka aplikasi bisnis menggunakan Column, Row, dan Padding.

## Langkah-langkah

### 1. Membuat Halaman Home

Hapus semua kode di `lib/main.dart`, ganti dengan:

```dart
import 'package:flutter/material.dart';

void main() => runApp(MaterialApp(home: Home()));

class Home extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("My Business Profile")),
      body: Padding(
        padding: EdgeInsets.all(20),
        child: Column(
          children: [
             Icon(Icons.business, size: 100, color: Colors.blue),
             SizedBox(height: 20),
             Text("PT. Maju Mundur", style: TextStyle(fontSize: 24, fontWeight: FontWeight.bold)),
             Text("Solusi IT Terpercaya", style: TextStyle(color: Colors.grey)),
             Divider(),
             Row(
               mainAxisAlignment: MainAxisAlignment.spaceAround,
               children: [
                 Column(children: [Icon(Icons.phone), Text("Telepon")]),
                 Column(children: [Icon(Icons.email), Text("Email")]),
                 Column(children: [Icon(Icons.map), Text("Lokasi")]),
               ],
             )
          ],
        ),
      ),
    );
  }
}
```

## Tantangan Mandiri

Tambahkan sebuah `ElevatedButton` di bawah Row untuk membuka halaman "Tentang Kami" (saat ini cukup print "Ke Halaman Tentang" di konsol saja).
