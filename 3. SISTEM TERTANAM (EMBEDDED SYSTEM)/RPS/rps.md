# RENCANA PEMBELAJARAN SEMESTER (RPS)
## PROGRAM STUDI TEKNIK INFORMATIKA
### FAKULTAS TEKNIK UNIVERSITAS WIJAYA PUTRA

---

## IDENTITAS MATA KULIAH

| Mata Kuliah (MK) | Kode | Rumpun MK | Bobot (sks) | | Semester | Tgl Penyusunan |
|---|---|---|---|---|---|---|
| Sistem Tertanam (Embedded System) | TIF-STE | Sistem Komputer | T=2 | P=1 | Genap 2024/2025 | 2026-03-11 |

---

## OTORISASI

| Pengembang RPS | Koordinator RMK | Ketua PRODI |
|---|---|---|
| | | |

---

## CAPAIAN PEMBELAJARAN (CP)

### CPL-PRODI yang Dibebankan pada MK

| Kode | Deskripsi CPL |
|---|---|
| **CPL07** | Kemampuan menganalisis persoalan computing yang kompleks serta menerapkan prinsip-prinsip computing dan disiplin ilmu relevan lainnya untuk mengidentifikasi solusi, dengan mempertimbangkan wawasan perkembangan ilmu transdisiplin. *(P04)* |
| **CPL11** | Kemampuan mendesain, mengimplementasi dan mengevaluasi solusi berbasis computing multi-platform yang memenuhi kebutuhan computing pada sebuah organisasi. *(KK09)* |

---

### Capaian Pembelajaran Mata Kuliah (CPMK)

| Kode CPMK | Deskripsi CPMK | CPL yang Didukung |
|---|---|---|
| **CPMK074** | Mahasiswa mampu merancang solusi inovatif dan aplikatif berdasarkan prinsip informatika dan ilmu transdisiplin. | CPL07 |
| **CPMK075** | Mahasiswa mampu mengimplementasikan solusi terpilih dalam bentuk prototipe/produk berbasis teknologi computing yang sesuai kebutuhan. | CPL07 |
| **CPMK112** | Mahasiswa mampu merancang solusi sistem berbasis teknologi multi-platform yang sesuai dengan kebutuhan organisasi. | CPL11 |
| **CPMK113** | Mahasiswa mampu mengimplementasikan solusi berbasis teknologi multi-platform dalam bentuk aplikasi. | CPL11 |

---

### Kemampuan Akhir Tiap Tahapan Belajar (Sub-CPMK)

| Kode Sub-CPMK | Deskripsi |
|---|---|
| Sub-CPMK074.1 | Dapat mengidentifikasi komponen hardware (mikrokontroler, sensor, aktuator) dan merancang arsitektur sistem tertanam sesuai kebutuhan. |
| Sub-CPMK074.2 | Dapat merancang skema rangkaian elektronik (schematic) dan alur program (flowchart) untuk solusi embedded system. |
| Sub-CPMK075.1 | Dapat mengimplementasikan program C/C++ pada mikrokontroler Arduino/ESP32 untuk mengontrol komponen I/O dasar. |
| Sub-CPMK075.2 | Dapat membangun prototipe sistem tertanam berbasis sensor (suhu, cahaya, jarak) dan aktuator (motor, relay, buzzer). |
| Sub-CPMK112.1 | Dapat merancang sistem IoT (Internet of Things) yang menghubungkan perangkat embedded ke platform cloud/mobile. |
| Sub-CPMK113.1 | Dapat mengimplementasikan komunikasi data (MQTT, HTTP, WiFi, Bluetooth) antara perangkat embedded dan sistem eksternal. |
| Sub-CPMK113.2 | Dapat membangun prototipe akhir sistem tertanam terintegrasi yang menyelesaikan permasalahan nyata. |

---

### Korelasi antara CPMK terhadap Sub-CPMK

| | Sub-CPMK074.1 | Sub-CPMK074.2 | Sub-CPMK075.1 | Sub-CPMK075.2 | Sub-CPMK112.1 | Sub-CPMK113.1 | Sub-CPMK113.2 |
|---|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
| **CPMK074** | V | V | | | | | |
| **CPMK075** | | V | V | V | | | |
| **CPMK112** | V | | | | V | | |
| **CPMK113** | | | V | | | V | V |

---

## DESKRIPSI SINGKAT MK

Mata kuliah ini membahas konsep dasar dan implementasi sistem tertanam (embedded system) yang merupakan sistem komputer khusus yang dirancang untuk menjalankan fungsi tertentu. Mahasiswa akan mempelajari arsitektur mikrokontroler, pemrograman hardware menggunakan bahasa C/C++ pada platform Arduino dan ESP32, interfacing sensor dan aktuator, serta pengembangan sistem IoT (Internet of Things) yang menghubungkan perangkat tertanam ke platform cloud dan aplikasi mobile. Perkuliahan menekankan aspek praktis melalui perancangan dan pembuatan prototipe nyata.

---

## BAHAN KAJIAN: MATERI PEMBELAJARAN

1. Pengantar Embedded System — Konsep, Komponen, dan Aplikasi
2. Arsitektur Mikrokontroler (Arduino Uno/Nano, ESP32)
3. Pemrograman C/C++ untuk Embedded: GPIO, Digital I/O
4. Interfacing Sensor: Suhu (DHT11/DHT22), Jarak (HC-SR04), Cahaya (LDR)
5. Interfacing Aktuator: LED, Buzzer, Servo Motor, Relay
6. Komunikasi Serial: UART, I2C, SPI
7. Display Output: LCD 16x2, OLED 128x64
8. Interrupt & Timer pada Mikrokontroler
9. Konsep IoT & Konektivitas WiFi (ESP32) — HTTP GET/POST
10. Protokol MQTT untuk IoT — Broker Mosquitto / HiveMQ
11. Integrasi Platform Cloud IoT (Blynk / Adafruit IO / Firebase)
12. Koneksi Bluetooth Low Energy (BLE) ke Aplikasi Mobile
13. Manajemen Daya & Mode Sleep pada ESP32
14. Perancangan & Implementasi Proyek Akhir IoT

---

## PUSTAKA

**Utama:**
- Norris, D. (2015). *Arduino Programming in 24 Hours*. Sams Publishing.
- Schwartz, M. (2016). *Building Smart Home Automation Solutions with Home Assistant*. Packt Publishing.
- Kolban, N. (2017). *Kolban's Book on ESP32*. Leanpub (Free Edition).
- Modul Ajar Sistem Tertanam — Tim Pengampu, Universitas Wijaya Putra.

**Pendukung:**
- Dokumentasi Arduino: https://www.arduino.cc/reference/en/
- Dokumentasi ESP32 (Espressif): https://docs.espressif.com/
- Dokumentasi Blynk IoT: https://docs.blynk.io/

---

## DOSEN PENGAMPU

...

## MATA KULIAH SYARAT

Algoritma dan Pemrograman, Arsitektur dan Organisasi Komputer

---

## RENCANA PEMBELAJARAN PER MINGGU

| Mg Ke- | Kemampuan Akhir Tiap Tahapan Belajar (Sub-CPMK) | Penilaian (Indikator) | Penilaian (Teknik & Kriteria) | Pembelajaran Daring Sinkron | Pembelajaran Daring Asinkron | Materi Pembelajaran | Bobot Penilaian (%) |
|:---:|---|---|---|---|---|---|:---:|
| **(1)** | **(2)** | **(3)** | **(4)** | **(5)** | **(6)** | **(7)** | **(8)** |
| **1** | Sub-CPMK074.1 — Pengantar Embedded System & Identifikasi Komponen | Mampu menyebutkan dan menjelaskan komponen utama embedded system | Kuis + Partisipasi | Kuliah + Diskusi (100 mnt) | Baca referensi & review komponen (170 mnt) | Definisi Embedded System; Mikrokontroler vs Mikroprosesor; Aplikasi di industri | 3% |
| **2** | Sub-CPMK074.1 — Arsitektur Arduino & Setup Environment | Board Arduino berjalan & LED berkedip (Blink) | Demonstrasi | Live coding + demo hardware (100 mnt) | Setup Arduino IDE mandiri (170 mnt) | Arsitektur ATmega328; Pin Digital & Analog; `setup()`, `loop()`; Blink | 3% |
| **3** | Sub-CPMK075.1 — GPIO: Digital Input & Output | Program GPIO berjalan sesuai logika | Laporan praktikum | Live coding + praktikum (100 mnt) | Latihan mandiri (170 mnt) | `pinMode`; `digitalWrite`; `digitalRead`; Push Button; LED; Pull-up/Pull-down | 4% |
| **4** | Sub-CPMK075.1 — Analog Input & PWM Output | Nilai ADC terbaca & PWM berjalan | Laporan praktikum | Live coding + praktikum (100 mnt) | Latihan mandiri (170 mnt) | `analogRead`; `analogWrite`; Potensiometer; LED Dimmer; Sensor LDR | 4% |
| **5** | Sub-CPMK075.2 — Interfacing Sensor Suhu & Kelembapan (DHT11/22) | Data suhu & kelembapan tampil serial monitor | Laporan praktikum | Live coding + praktikum (100 mnt) | Latihan mandiri (170 mnt) | Library DHT; `Serial.println`; Kalibrasi sensor | 4% |
| **6** | Sub-CPMK075.2 — Interfacing Sensor Jarak (HC-SR04) & Display LCD | Jarak terukur & tampil di LCD | Laporan praktikum + demo | Live coding + praktikum (100 mnt) | Latihan mandiri (170 mnt) | `pulseIn()`; Lib LiquidCrystal_I2C; Komunikasi I2C | 5% |
| **7** | Sub-CPMK075.2, Sub-CPMK074.2 — Aktuator: Servo Motor & Relay | Motor & relay berfungsi sesuai program & skematik | Laporan praktikum + Skematik | Live coding + praktikum (100 mnt) | Desain skematik mandiri (170 mnt) | Library Servo; `Servo.write()`; Relay & tegangan aman | 5% |
| **8** | **Evaluasi Tengah Semester (UTS)** | Ujian teori + unjuk kerja rangkaian sederhana | Tes Tulis + Unjuk Kerja | Ujian daring | — | Materi Mg 1–7 | **20%** |
| **9** | Sub-CPMK074.1 — Interrupt & Timer | Interrupt berjalan tanpa mengganggu program utama | Laporan praktikum | Live coding + praktikum (100 mnt) | Latihan mandiri (170 mnt) | `attachInterrupt`; Timer1; Debouncing; Waktu real | 4% |
| **10** | Sub-CPMK112.1, Sub-CPMK113.1 — ESP32: WiFi & HTTP Request | ESP32 terkoneksi WiFi & data terkirim ke server | Demo + laporan | Live coding + demo (100 mnt) | Latihan mandiri (170 mnt) | Pengantar ESP32; `WiFi.begin()`; `HTTPClient`; REST API GET/POST | 5% |
| **11** | Sub-CPMK113.1 — Protokol MQTT untuk IoT | Data sensor dikirim & diterima via broker MQTT | Demo + laporan | Workshop MQTT (100 mnt) | Praktik mandiri Mosquitto (170 mnt) | MQTT Broker; `publish()`; `subscribe()`; HiveMQ Cloud | 5% |
| **12** | Sub-CPMK112.1, Sub-CPMK113.1 — Platform IoT Cloud (Blynk / Firebase) | Dashboard IoT online menampilkan data real-time | Demo dashboard + laporan | Workshop platform (100 mnt) | Eksplorasi mandiri (170 mnt) | Blynk IoT v2 / Firebase Realtime DB; Visualisasi data sensor | 5% |
| **13** | Sub-CPMK113.1 — Komunikasi Bluetooth (BLE) ke Mobile | Perangkat mobile baca data BLE dari ESP32 | Demo + laporan | Live coding + demo (100 mnt) | Latihan mandiri (170 mnt) | BLE `BLEServer`; `BLECharacteristic`; App nRF Connect / Blynk | 4% |
| **14** | Sub-CPMK113.2 — Perancangan Proyek Akhir | Proposal proyek disetujui: skema, komponen, fitur | Presentasi proposal | Presentasi proposal (100 mnt) | Pengerjaan mandiri (170 mnt) | Studi kasus nyata; Smart Agriculture, Smart Home, Health Monitoring | 3% |
| **15** | Sub-CPMK113.2 — Implementasi & Pengujian Prototipe Akhir | Prototipe berfungsi sesuai spesifikasi yang dirancang | Demo prototipe | Workshop + asistensi (100 mnt) | Finishing prototipe (170 mnt) | Integrasi sensor + aktuator + IoT; Pengujian fungsional | 6% |
| **16** | **Evaluasi Akhir Semester (UAS)** | Presentasi proyek akhir + demo prototipe + laporan | Unjuk Kerja + Tes Lisan | Presentasi UAS + Demo | — | Seluruh Materi | **20%** |

> **Keterangan Waktu:** BT=Belajar Terbimbing, PT=Penugasan Terstruktur, KM=Kegiatan Mandiri

---

## BOBOT PENILAIAN MATA KULIAH

| CPL | CPMK | Partisipasi (Kehadiran/Kuis) | Observasi (Praktek/Tugas) | Unjuk Kerja (Presentasi) | Tes Tulis (UTS) | Tes Tulis (UAS) | Tes Lisan (Tugas Kelompok) | Total |
|---|---|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
| **CPL07** | CPMK074 | 6% | 5% | 3% | 6% | — | — | **20%** |
| | CPMK075 | — | 13% | — | 7% | — | — | **20%** |
| **CPL11** | CPMK112 | 4% | 5% | — | 5% | 6% | — | **20%** |
| | CPMK113 | — | 7% | 7% | 2% | 4% | — | **20%** |
| **Total Bobot** | | **10%** | **30%** | **10%** | **20%** | **10%** | **—** | **80%** |
| *Catatan: +20% UAS (proyek & demo prototipe)* | | | | | | **+20%** | | **100%** |

---

*Dokumen ini merupakan Rencana Pembelajaran Semester (RPS) resmi mata kuliah Sistem Tertanam (Embedded System), Program Studi Teknik Informatika, Fakultas Teknik, Universitas Wijaya Putra.*

*Disusun berdasarkan Permendikbud No. 3 Tahun 2020 tentang Standar Nasional Pendidikan Tinggi (SN-Dikti).*
