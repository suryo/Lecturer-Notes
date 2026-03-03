# Pertemuan 12: Embedded AI (Pengenalan TinyML)

## Contoh Studi Kasus & Solusi

### Contoh 1: Keyword Spotting (Voice Control)

Bisakah TinyML mendeteksi percakapan panjang manusia?

> [!TIP] **Jawaban/Solusi**
> Tidak. TinyML dirancang untuk mendeteksi suara durasi sangat singkat (1-2 detik) seperti keyword "Hey Siri" atau "OK Google" karena keterbatasan memori.

### Contoh 2: Gesture Control (IMU)

Mengapa TinyML lebih baik dalam mendeteksi gerakan dibanding if-else biasa?

> [!TIP] **Jawaban/Solusi**
> Karena gerakan manusia bersifat variatif dan tidak presisi. AI (Neural Network) jauh lebih baik dalam mengenali **pola** data dibanding logika kaku if-else.

### Contoh 3: Anomaly Detection (Industrial)

Bagaimana AI tahu bahwa sebuah mesin motor industri akan rusak?

> [!TIP] **Jawaban/Solusi**
> AI dilatih dengan data getaran mesin saat kondisi sehat. Saat ada pola getaran yang tidak pernah dikenali sebelumnya (unseen data), AI akan mengkategorikannya sebagai **Anomaly**.

---

## Praktikum Mandiri

**Tugas**: Eksplorasi platform Edge Impulse. Kumpulkan 10 detik data gerakan "Diam" dan 10 detik data "Bergerak" menggunakan sensor smartphone Anda.

> [!IMPORTANT] **Kunci Jawaban Praktikum**
> Hasil yang benar adalah munculnya grafik data akselerometer (X,Y,Z) pada Dashboard Edge Impulse yang menunjukkan garis datar untuk "Diam" dan garis bergelombang tajam untuk "Bergerak".
