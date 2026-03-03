# Tugas 3: IoT Weather Station (Monitoring Cuaca Cloud)

## Deskripsi Tugas

Mahasiswa menggunakan platform Cloud untuk menyimpan dan memvisualisasikan data lingkungan secara real-time.

## Komponen

- ESP32 (Wokwi)
- DHT22 (Sensor Suhu & Kelembapan)
- Akun Thingspeak (Free)

## Instruksi Pengerjaan

1.  Koneksikan ESP32 ke Wi-Fi simulator Wokwi (`Wokwi-GUEST`).
2.  Baca data **Temperature** dan **Humidity** dari sensor DHT22.
3.  Kirimkan kedua data tersebut ke channel Thingspeak setiap 20 detik menggunakan REST API atau library Thingspeak.
4.  Buatlah visualisasi grafik (Chart) pada dashboard Thingspeak.

## Kriteria Penilaian

- Integritas Jaringan (Wi-Fi Connection): 30%
- Keberhasilan Pengiriman Data ke Cloud: 40%
- Visualisasi Dashboard: 20%
- Penanganan Error (Jika Wi-Fi putus): 10%

---

**Format Pengumpulan**: Link URL Project Wokwi + Link Channel Thingspeak (Public).
**Deadline**: Pertemuan ke-11.
