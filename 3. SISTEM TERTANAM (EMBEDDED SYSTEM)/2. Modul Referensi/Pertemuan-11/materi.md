# Pertemuan 11: Kamera dan Pengolahan Gambar dengan Raspberry Pi

## Contoh Studi Kasus & Solusi

### Contoh 1: Color Masking (OpenCV)

Apa kegunaan konversi warna BGR ke HSV dalam pendeteksian benda?

> [!TIP] **Jawaban/Solusi**
> Model warna HSV (Hue, Saturation, Value) lebih stabil terhadap perubahan cahaya dibanding BGR, sehingga mempermudah pemilihan range warna spesifik untuk masking.

### Contoh 2: Face Detection (Haar Cascades)

Bisa kah Raspberry Pi mendeteksi wajah dalam kondisi gelap total?

> [!TIP] **Jawaban/Solusi**
> Tidak bisa menggunakan kamera standar karena Haar Cascades bergantung pada kontur dan intensitas cahaya. Diperlukan kamera **NoIR (Infrared)** dan lampu IR tambahan.

### Contoh 3: Security Camera Time-lapse

Bagaimana cara menamai file gambar agar tidak saling menimpa?

> [!TIP] **Jawaban/Solusi**
> Mengambil string dari waktu sistem (Timestamp).
> `filename = datetime.now().strftime("%Y%m%d-%H%M%S.jpg")`

---

## Praktikum Mandiri

**Tugas**: Buat skrip Python OpenCV yang membuka feed kamera dan mengubah tampilannya menjadi hitam-putih (Grayscale).

> [!IMPORTANT] **Kunci Jawaban Praktikum**
>
> ```python
> import cv2
> cap = cv2.VideoCapture(0)
> while True:
>     ret, frame = cap.read()
>     gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
>     cv2.imshow('Gray Feed', gray)
>     if cv2.waitKey(1) & 0xFF == ord('q'): break
> ```
