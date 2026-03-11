# RENCANA PEMBELAJARAN SEMESTER (RPS)
## PROGRAM STUDI TEKNIK INFORMATIKA
### FAKULTAS TEKNIK UNIVERSITAS WIJAYA PUTRA

---

## IDENTITAS MATA KULIAH

| Mata Kuliah (MK) | Kode | Rumpun MK | Bobot (sks) | | Semester | Tgl Penyusunan |
|---|---|---|---|---|---|---|
| Advanced Topics in Mobile Programming | TIF-ATMP | Mobile Computing | T=2 | P=1 | Genap 2024/2025 | 2026-03-11 |

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
| **CPL09** | Kemampuan mengimplementasi kebutuhan computing dengan mempertimbangkan berbagai metode/algoritma yang sesuai. *(P03)* |
| **CPL10** | Kemampuan menganalisis, merancang, membuat dan mengevaluasi user interface dan aplikasi interaktif dengan mempertimbangkan kebutuhan pengguna dan perkembangan ilmu transdisiplin. *(KK04)* |
| **CPL11** | Kemampuan mendesain, mengimplementasi dan mengevaluasi solusi berbasis computing multi-platform yang memenuhi kebutuhan computing pada sebuah organisasi. *(KK09)* |

---

### Capaian Pembelajaran Mata Kuliah (CPMK)

| Kode CPMK | Deskripsi CPMK | CPL yang Didukung |
|---|---|---|
| **CPMK075** | Mahasiswa mampu mengimplementasikan solusi terpilih dalam bentuk prototipe/produk berbasis teknologi computing yang sesuai kebutuhan. | CPL07 |
| **CPMK093** | Mahasiswa mampu mengimplementasikan solusi menggunakan metode atau algoritma yang tepat dalam bentuk program atau sistem komputasi. | CPL09 |
| **CPMK094** | Mahasiswa mampu menguji dan mengevaluasi hasil implementasi solusi berdasarkan kebutuhan fungsional pengguna. | CPL09 |
| **CPMK103** | Mahasiswa mampu merancang user interface dan aplikasi interaktif yang ergonomis dan berorientasi pada pengalaman pengguna. | CPL10 |
| **CPMK104** | Mahasiswa mampu melakukan evaluasi usability terhadap aplikasi interaktif serta memberikan rekomendasi perbaikan. | CPL10 |
| **CPMK113** | Mahasiswa mampu mengimplementasikan solusi berbasis teknologi multi-platform dalam bentuk aplikasi. | CPL11 |
| **CPMK114** | Mahasiswa mampu mengevaluasi solusi multi-platform melalui uji fungsional, usability, dan performa. | CPL11 |

---

### Kemampuan Akhir Tiap Tahapan Belajar (Sub-CPMK)

| Kode Sub-CPMK | Deskripsi |
|---|---|
| Sub-CPMK075.1 | Dapat membangun prototipe aplikasi mobile lanjutan dengan pola arsitektur Clean Architecture / MVVM sebagai solusi masalah nyata. |
| Sub-CPMK093.1 | Dapat mengimplementasikan Advanced State Management (Bloc/Riverpod) dengan algoritma yang efisien dalam aplikasi Flutter. |
| Sub-CPMK093.2 | Dapat mengimplementasikan teknik optimasi performa (lazy loading, caching, isolate/concurrency) dalam aplikasi mobile. |
| Sub-CPMK094.1 | Dapat menulis dan menjalankan pengujian otomatis (unit test, widget test, integration test) untuk memverifikasi fungsionalitas aplikasi. |
| Sub-CPMK103.1 | Dapat merancang dan mengimplementasikan UI tingkat lanjut (custom painter, animasi kompleks, adaptive layout) dalam Flutter. |
| Sub-CPMK104.1 | Dapat melakukan audit aksesibilitas dan evaluasi usability aplikasi serta menghasilkan laporan perbaikan yang terukur. |
| Sub-CPMK113.1 | Dapat mengimplementasikan fitur lanjutan: CI/CD pipeline, deep linking, in-app purchase, atau machine learning on-device. |
| Sub-CPMK114.1 | Dapat mengevaluasi aplikasi mobile secara komprehensif melalui uji performa (Lighthouse/DevTools), crash reporting, dan analytics. |

---

### Korelasi antara CPMK terhadap Sub-CPMK

| | Sub-C075.1 | Sub-C093.1 | Sub-C093.2 | Sub-C094.1 | Sub-C103.1 | Sub-C104.1 | Sub-C113.1 | Sub-C114.1 |
|---|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
| **CPMK075** | V | | V | | | | V | |
| **CPMK093** | | V | V | | | | | |
| **CPMK094** | | | | V | | V | | V |
| **CPMK103** | | | | | V | V | | |
| **CPMK104** | | | | V | | V | | |
| **CPMK113** | V | | | | | | V | |
| **CPMK114** | | | V | V | | | | V |

---

## DESKRIPSI SINGKAT MK

Mata kuliah ini merupakan tingkat lanjut dari mata kuliah Mobile Application yang membahas topik-topik mutakhir dalam pengembangan aplikasi mobile profesional. Mahasiswa akan mempelajari pola arsitektur perangkat lunak (Clean Architecture, MVVM), state management tingkat lanjut (Bloc, Riverpod), teknik optimasi performa aplikasi, strategi pengujian otomatis (unit/widget/integration test), implementasi CI/CD untuk deployment otomatis, machine learning on-device (TensorFlow Lite), serta fitur lanjutan seperti deep linking, in-app purchase, dan aksesibilitas. Perkuliahan diorientasikan pada standar industri pengembangan aplikasi mobile profesional.

---

## BAHAN KAJIAN: MATERI PEMBELAJARAN

1. Arsitektur Perangkat Lunak Mobile: MVVM, Clean Architecture
2. Advanced State Management: Bloc Pattern, Riverpod, Provider
3. Dependency Injection dengan GetIt & Injectable
4. Networking Lanjutan: Dio Interceptors, Retry, Error Handling Terpadu
5. Offline-First Architecture: SQLite, Drift, Data Synchronization
6. UI Lanjutan: CustomPainter, Shader, Adaptive Layout (Desktop/Web)
7. Animasi Kompleks: Rive, Lottie, Physics-based Animation
8. Pengujian Otomatis: Unit Test, Widget Test, Integration Test, Golden Test
9. CI/CD Mobile: GitHub Actions, Fastlane, Firebase App Distribution
10. Machine Learning On-Device: TensorFlow Lite, ML Kit di Flutter
11. Deep Linking, Universal Links & App Scheme
12. In-App Purchase & Monetisasi Aplikasi
13. Aksesibilitas & Internasionalisasi (a11y, i18n, l10n)
14. Crash Reporting, Analytics, & Monitoring Performa (Firebase Crashlytics, Google Analytics)

---

## PUSTAKA

**Utama:**
- Windmill, E. (2020). *Flutter in Action*. Manning Publications.
- Akingbade, K., & Galloway, G. (2022). *Flutter Projects*. Packt Publishing.
- Modul Ajar Advanced Topics in Mobile Programming — Tim Pengampu, Universitas Wijaya Putra.

**Pendukung:**
- Bloc Library Documentation: https://bloclibrary.dev/
- TensorFlow Lite Flutter: https://www.tensorflow.org/lite/guide/flutter
- GitHub Actions Docs: https://docs.github.com/en/actions
- Flutter Testing Docs: https://docs.flutter.dev/testing

---

## DOSEN PENGAMPU

...

## MATA KULIAH SYARAT

Mobile Application for Businees, Mobile Multimedia Solution, Pemrograman Berorientasi Objek

---

## RENCANA PEMBELAJARAN PER MINGGU

| Mg Ke- | Kemampuan Akhir Tiap Tahapan Belajar (Sub-CPMK) | Penilaian (Indikator) | Penilaian (Teknik & Kriteria) | Pembelajaran Daring Sinkron | Pembelajaran Daring Asinkron | Materi Pembelajaran | Bobot Penilaian (%) |
|:---:|---|---|---|---|---|---|:---:|
| **(1)** | **(2)** | **(3)** | **(4)** | **(5)** | **(6)** | **(7)** | **(8)** |
| **1** | Sub-CPMK075.1 — Arsitektur MVVM & Clean Architecture | Mampu menjelaskan layer Presentation, Domain, dan Data beserta alur dependency | Kuis + Diagram Arsitektur | Kuliah + diskusi (100 mnt) | Baca referensi Clean Architecture (170 mnt) | MVVM; Clean Architecture (Entities, Use Cases, Repositories, Data Sources); Dependency Rule | 4% |
| **2** | Sub-CPMK093.1 — Advanced State Management: Bloc Pattern | Bloc berjalan dengan state & event yang terdefinisi dengan benar | Demo + laporan | Live coding + praktikum (100 mnt) | Latihan Bloc mandiri (170 mnt) | Bloc vs Cubit; `BlocBuilder`, `BlocListener`, `BlocConsumer`; Bloc Testing | 5% |
| **3** | Sub-CPMK093.1 — Riverpod & Dependency Injection | Provider & Riverpod berhasil melakukan DI antar layer | Demo + laporan | Live coding + praktikum (100 mnt) | Latihan Riverpod mandiri (170 mnt) | Riverpod `StateNotifier`, `FutureProvider`; GetIt + Injectable; Service Locator pattern | 5% |
| **4** | Sub-CPMK093.2 — Networking Lanjutan & Offline-First | Interceptor retry berjalan; data tersimpan lokal saat offline | Demo + laporan | Live coding + praktikum (100 mnt) | Latihan mandiri (170 mnt) | Dio Interceptors; Retry mechanism; Drift/SQLite lokal; Data sync strategy | 5% |
| **5** | Sub-CPMK103.1 — UI Lanjutan: CustomPainter & Adaptive Layout | CustomPainter tampil benar & layout adaptif di berbagai ukuran layar | Demo + review kode | Live coding + diskusi (100 mnt) | Latihan UI mandiri (170 mnt) | `CustomPainter`; `Canvas`; `MediaQuery`; Adaptive layout (mobile/tablet/desktop) | 5% |
| **6** | Sub-CPMK103.1 — Animasi Kompleks: Rive & Physics-Based | Animasi berjalan halus & responsif terhadap interaksi pengguna | Demo + laporan | Workshop Rive (100 mnt) | Latihan animasi mandiri (170 mnt) | Rive runtime di Flutter; `SpringSimulation`; `AnimationPhysics`; Lottie dengan kontrol | 4% |
| **7** | Sub-CPMK094.1 — Pengujian Otomatis: Unit & Widget Test | Test suite berjalan tanpa error & coverage ≥ 70% | Laporan test + coverage | Workshop testing (100 mnt) | Latihan mandiri (170 mnt) | `flutter_test`; Mock dengan `mocktail`; Widget test; Golden test; `flutter test --coverage` | 5% |
| **8** | **Evaluasi Tengah Semester (UTS)** | Ujian teori + soal arsitektur, Bloc, dan pengujian | Tes Tulis + Unjuk Kerja | Ujian daring | — | Materi Mg 1–7 | **20%** |
| **9** | Sub-CPMK094.1 — Integration Test & CI/CD Pipeline | Integration test berjalan & pipeline CI/CD otomatis build | Demo pipeline + laporan | Workshop GitHub Actions (100 mnt) | Praktik mandiri (170 mnt) | `integration_test`; GitHub Actions workflow; Fastlane `match`; Firebase App Distribution | 5% |
| **10** | Sub-CPMK113.1 — Machine Learning On-Device (TFLite / ML Kit) | Model inference berjalan di device (contoh: deteksi objek/teks) | Demo + laporan | Live coding + demo (100 mnt) | Eksplorasi mandiri (170 mnt) | TensorFlow Lite Flutter; ML Kit barcode/face; Model input/output tensor; Performa vs akurasi | 5% |
| **11** | Sub-CPMK113.1 — Deep Linking & Universal Links | Deep link dari URL eksternal membuka halaman yang benar di app | Demo + laporan | Live coding (100 mnt) | Latihan mandiri (170 mnt) | `go_router`; Universal Links (iOS); App Links (Android); Dynamic Links Firebase | 4% |
| **12** | Sub-CPMK113.1 — In-App Purchase & Monetisasi | Alur pembelian berhasil (sandbox) & receipt terverifikasi | Demo + laporan | Live coding + diskusi (100 mnt) | Latihan mandiri (170 mnt) | Plugin `in_app_purchase`; Produk konsumable & berlangganan; Server-side validation | 4% |
| **13** | Sub-CPMK104.1 — Aksesibilitas & Internasionalisasi | App lolos audit aksesibilitas & mendukung min. 2 bahasa | Audit report + demo | Workshop accessibility (100 mnt) | Latihan i18n mandiri (170 mnt) | `Semantics` widget; WCAG 2.1; `flutter_localizations`; ARB files; `intl` package | 4% |
| **14** | Sub-CPMK114.1 — Crash Reporting & Analitik Performa | Dashboard Crashlytics menampilkan data & analitik terkonfigurasi | Demo dashboard + laporan | Workshop Firebase (100 mnt) | Praktik mandiri (170 mnt) | Firebase Crashlytics; Google Analytics for Flutter; Performance Monitoring; Sentry | 4% |
| **15** | Sub-CPMK075.1, Sub-CPMK114.1 — Presentasi Proyek Akhir | Proyek memenuhi standar Clean Architecture, teruji, dan terpresentasikan | Presentasi + Demo | Presentasi proyek (100 mnt) | Finishing proyek (170 mnt) | Review arsitektur; Code review; Laporan evaluasi performa; CI/CD live demo | 6% |
| **16** | **Evaluasi Akhir Semester (UAS)** | Proyek aplikasi mobile profesional + presentasi + laporan teknis | Unjuk Kerja + Tes Lisan | Presentasi UAS | — | Seluruh Materi | **20%** |

> **Keterangan Waktu:** BT=Belajar Terbimbing, PT=Penugasan Terstruktur, KM=Kegiatan Mandiri

---

## BOBOT PENILAIAN MATA KULIAH

| CPL | CPMK | Partisipasi (Kehadiran/Kuis) | Observasi (Praktek/Tugas) | Unjuk Kerja (Presentasi) | Tes Tulis (UTS) | Tes Tulis (UAS) | Tes Lisan (Tugas Kelompok) | Total |
|---|---|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
| **CPL07** | CPMK075 | 2% | 5% | 3% | 4% | — | — | **14%** |
| **CPL09** | CPMK093 | 4% | 10% | — | 7% | — | — | **21%** |
| | CPMK094 | — | 5% | — | 5% | 5% | — | **15%** |
| **CPL10** | CPMK103 | 2% | 4% | — | 2% | — | — | **8%** |
| | CPMK104 | — | 2% | 2% | 2% | — | — | **6%** |
| **CPL11** | CPMK113 | 2% | 7% | — | — | 7% | — | **16%** |
| | CPMK114 | — | 5% | 2% | — | — | — | **7%** |
| *UAS Proyek & Tes Lisan* | | | | | | **+13%** | | |
| **Total Bobot** | | **10%** | **38%** | **7%** | **20%** | **12%** | **13%** | **100%** |

---

*Dokumen ini merupakan Rencana Pembelajaran Semester (RPS) resmi mata kuliah Advanced Topics in Mobile Programming, Program Studi Teknik Informatika, Fakultas Teknik, Universitas Wijaya Putra.*

*Disusun berdasarkan Permendikbud No. 3 Tahun 2020 tentang Standar Nasional Pendidikan Tinggi (SN-Dikti).*
