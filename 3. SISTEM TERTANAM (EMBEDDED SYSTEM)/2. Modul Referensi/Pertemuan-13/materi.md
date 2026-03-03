# Pertemuan 13: Pengembangan Proyek Akhir

## Contoh Studi Kasus & Solusi

### Contoh 1: Integrasi Dashboard IoT

Data sensor sudah masuk cloud, tapi dashboard web tidak update otomatis. Apa masalahnya?

> [!TIP] **Jawaban/Solusi**
> Masalah biasanya di sisi Frontend yang tidak menggunakan protokol Realtime (seperti WebSocket/Firebase SDK) atau interval pooling yang terlalu lama di JavaScript.

### Contoh 2: Masalah Daya (Brown Out)

ESP32 sering mendadak restart saat relay menyala. Mengapa?

> [!TIP] **Jawaban/Solusi**
> Terjadi penurunan tegangan sesaat (Voltage Drop) karena Relay/Motor menarik arus besar. Gunakan kapasitor tambahan di jalur VCC atau gunakan catu daya yang memiliki Ampere lebih besar.

### Contoh 3: Keamanan API Key

Kenapa tidak boleh menaruh API Key di GitHub (Public)?

> [!TIP] **Jawaban/Solusi**
> Orang lain dapat menggunakan identitas Anda untuk mengirim data palsu atau menghapus data di channel IoT Anda. Gunakan file konfigurasi lokal yang tidak di-upload (`.gitignbore`).

---

## Praktikum Mandiri

**Tugas**: Buatlah diagram blok sederhana dari Proyek Akhir Anda (Identifikasi Input, Proses, dan Output).

> [!IMPORTANT] **Kunci Jawaban Praktikum**
> Contoh Diagram:
> `Suhu (DHT11) -> Arduino Uno -> LCD (Visual) + ESP32 (WiFi) -> Thingspeak (Cloud).`
