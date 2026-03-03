# Tugas 2: Automated Garage System (Sistem Garasi Otomatis)

## Deskripsi Tugas

Mahasiswa diminta membangun sistem purwarupa gerbang garasi otomatis yang mendeteksi jarak kendaraan dan menampilkan status pada layar LCD.

## Komponen (Wokwi)

- Arduino Uno
- HC-SR04 Ultrasonic Sensor
- Micro Servo Motor (SG90)
- LCD 16x2 (I2C)

## Instruksi Pengerjaan

1.  **Deteksi Jarak**: Gunakan sensor ultrasonik untuk membaca jarak objek di depan gerbang.
2.  **Logika Gerbang**:
    - Jika jarak > 20 cm: Servo berada di posisi 0 derajat (Gerbang Tertutup). LCD menampilkan: `Gate: CLOSED`.
    - Jika jarak <= 20 cm: Servo bergerak ke posisi 90 derajat (Gerbang Terbuka). LCD menampilkan: `Gate: OPEN`.
3.  Tambahkan delay yang sesuai agar gerakan servo halus.

## Kriteria Penilaian

- Akurasi pembacaan sensor: 20%
- Kontrol aktuator (Servo): 40%
- Implementasi Output (LCD): 30%
- Dokumentasi Rangkaian: 10%

---

**Format Pengumpulan**: Link URL Project Wokwi.
**Deadline**: Pertemuan ke-7.
