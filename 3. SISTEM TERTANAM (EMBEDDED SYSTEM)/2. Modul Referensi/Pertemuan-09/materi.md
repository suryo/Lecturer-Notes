# Pertemuan 9: Database dan API untuk IoT

## Contoh Studi Kasus & Solusi

### Contoh 1: Data Logger MySQL vs Firebase

Kapan kita harus menggunakan MySQL dibanding Firebase untuk IoT?

> [!TIP] **Jawaban/Solusi**
> Gunakan **MySQL** untuk data historis dalam jumlah besar (Log 1 tahun) yang membutuhkan query kompleks. Gunakan **Firebase** untuk kontrol perangkat real-time (respon cepat < 1 detik) tanpa memikirkan manajemen server.

### Contoh 2: Realtime Sync di Firebase

Apa yang dimaksud dengan konsep "Realtime" pada Firebase Database?

> [!TIP] **Jawaban/Solusi**
> Data tersinkronisasi secara otomatis ke seluruh client (web/apps/hardware) seketika ada perubahan, tanpa perlu dipanggil ulang (No Refresh).

### Contoh 3: API Endpoints (JSON)

Mengapa format JSON lebih disukai untuk pertukaran data IoT?

> [!TIP] **Jawaban/Solusi**
> Karena tekstual, ringan (bandwidth kecil), dan mudah diparsing oleh banyak bahasa pemrograman (Python, JS, C++).

---

## Praktikum Mandiri

**Tugas**: Buatlah program ESP32 yang mendengarkan satu variabel di Firebase (misal: `switch`). Jika variabel tersebut berubah menjadi `1` di console web, nyalakan LED.

> [!IMPORTANT] **Kunci Jawaban Praktikum**
>
> ```cpp
> if (Firebase.RTDB.getInt(&fbdo, "/switch")) {
>   if (fbdo.intData() == 1) digitalWrite(13, HIGH);
>   else digitalWrite(13, LOW);
> }
> ```
