# Pertemuan 11: Basis Data untuk IoT (Internet of Things)

## Deskripsi Singkat

Dataset IoT memiliki karakteristik unik: volume tinggi, waktu yang presisi (Time-Series), dan seringkali tidak terstruktur. Sesi ini membahas penggunaan Firebase dan MongoDB dalam skenario pengumpulan data sensor.

## Tujuan Instruksional

1. Mahasiswa memahami karakteristik data IoT (Streaming & Time-Series).
2. Mahasiswa mampu mengintegrasikan Firebase SDK untuk menyimpan data sensor secara real-time.
3. Mahasiswa memahami konsep pemyimpanan data pada perangkat ESP32 ke Cloud.

## Materi Pembelajaran

### 1. Tantangan Data IoT

Data sensor seringkali masuk setiap detik. RDBMS konvensional mungkin akan kewalahan.

- **Write-Heavy**: Lebih banyak menulis daripada membaca.
- **Time-Stamp**: Setiap data wajib memiliki penanda waktu yang akurat.

### 2. Firebase untuk IoT

Firebase Firestore sangat cocok untuk IoT karena:

- Koneksi Web-Socket (Real-time).
- SDK yang ringan untuk berbagai platform.
- Mampu menangani ribuan update data per detik dengan mudah.

### 3. Alur Data (Sensor to Cloud)

1. Perangkat (ESP32/Arduino) membaca sensor.
2. Perangkat mengirim data via WiFi/GSM (MQTT/HTTP).
3. Backend atau SDK Cloud menyimpan ke database.
4. Dashboard Web/Mobile menampilkan data secara real-time.

## Praktikum

1. Simulasi pengiriman data sensor (misal: Suhu) ke Firebase Console menggunakan script Python/Node.js.
2. Lihat perubahan data di Firebase secara instan.
3. Cobalah mengambil data terakhir (Latest Data) untuk ditampilkan di aplikasi sederhana.

## Latihan

Sebutkan perbedaan antara **Firestore** dan **Real-time Database** di ekosistem Firebase. Mana yang lebih cocok untuk struktur data yang kompleks?
