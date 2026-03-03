# Lab 11: Basis Data untuk IoT (Internet of Things)

## Target Capaian

Mahasiswa mampu mengirim dan memantau data sensor secara real-time menggunakan Firebase.

## Langkah-langkah

### 1. Setup Firebase SDK

Gunakan Python atau Node.js sebagai simulator perangkat IoT. Instal library:
`pip install firebase-admin`

### 2. Mengirim Data Sensor (Simulasi)

```python
import firebase_admin
from firebase_admin import firestore

# Inisialisasi Firebase...
db = firestore.client()
db.collection('sensors').add({
    'timestamp': firestore.SERVER_TIMESTAMP,
    'temperature': 25.5,
    'humidity': 60
})
```

### 3. Monitoring Real-time

Buka Firebase Console -> Firestore Database. Lihat data muncul setiap kali script dijalankan.

## Tugas Praktikum

Buatlah script yang mengirim data sensor secara berulang setiap 5 detik. Perhatikan bagaimana Firebase menangani aliran data tersebut secara instan.
