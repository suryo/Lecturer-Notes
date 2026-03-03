# Pertemuan 8: Jaringan dan IoT (Menghubungkan ke Internet)

## Contoh Studi Kasus & Solusi

### Contoh 1: Weather Station Cloud (Thingspeak)

Apa fungsi API Key dalam pengiriman data ke Thingspeak?

> [!TIP] **Jawaban/Solusi**
> Sebagai kunci autentikasi agar server tahu bahwa data tersebut milik Channel Anda dan berhak untuk ditulis (Write API Key).

### Contoh 2: Remote Switch (Blynk)

Mengapa IoT Button di aplikasi Blynk bisa menyalakan lampu di rumah meskipun kita sedang di luar kota?

> [!TIP] **Jawaban/Solusi**
> Karena baik Smartphone maupun Board (ESP32) terhubung ke **Server Cloud** yang sama. Smartphone mengirim perintah ke Cloud, dan Board terus memantau (polling/subscribe) sinyal dari Cloud tersebut.

### Contoh 3: Notifikasi Email Otomatis

Layanan apa yang paling mudah untuk menjembatani ESP32 dengan Email?

> [!TIP] **Jawaban/Solusi**
> Menggunakan webhooks seperti **IFTTT** atau **Zapier**. ESP32 mengirim HTTP Request ke Webhook, dan Webhook mengirimkan Email.

---

## Praktikum Mandiri

**Tugas**: Hubungkan ESP32 ke Wi-Fi dan kirimkan angka acak (random) ke channel Thingspeak Anda setiap 20 detik.

> [!IMPORTANT] **Kunci Jawaban Praktikum**
>
> ```cpp
> void loop() {
>   int val = random(0, 100);
>   ThingSpeak.writeField(myChannelNumber, 1, val, myWriteAPIKey);
>   delay(20000); // Pen jeda 20 detik (limit Thingspeak free)
> }
> ```
