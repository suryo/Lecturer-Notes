# Tugas 1: Smart Street Light (Otomasi Lampu Jalan)

## Deskripsi Tugas

Mahasiswa diminta untuk merancang dan mensimulasikan sistem lampu jalan cerdas yang bekerja berdasarkan kondisi cahaya lingkungan dan deteksi keberadaan objek (kendaraan/orang).

## Komponen (Wokwi)

- Arduino Uno
- Photoresistor (LDR)
- PIR Motion Sensor
- LED (Lampu Jalan)
- Resistor 220 Ohm

## Instruksi Pengerjaan

1.  **Logika Siang Hari**: Jika LDR mendeteksi cahaya terang, LED harus MATI (Off) terlepas dari ada atau tidaknya gerakan.
2.  **Logika Malam Hari**: Jika LDR mendeteksi cahaya gelap:
    - Jika PIR **TIDAK** mendeteksi gerakan: LED meredup (Gunakan PWM, misal `analogWrite(pin, 50)`).
    - Jika PIR **MENDETEKSI** gerakan: LED menyala terang (Full Brightness, `analogWrite(pin, 255)`).
3.  LED kembali meredup setelah 5 detik jika tidak ada gerakan baru terdeteksi di malam hari.

## Kriteria Penilaian

- Ketepatan rangkaian di Wokwi: 30%
- Kebenaran logika pemrograman: 50%
- Kerapian penulisan kode (Comment & Indentasi): 20%

---

**Format Pengumpulan**: Link URL Project Wokwi yang sudah disimpan.
**Deadline**: Pertemuan ke-4.
