# Lab 11: Computer Vision Dasar di Raspberry Pi

## Tantangan Mandiri (Contoh)

### Tantangan 1: Green Masking

Tampilkan benda hijau saja.

> [!IMPORTANT] **Solusi Tantangan**
> `mask = cv2.inRange(hsv, (40, 40, 40), (80, 255, 255))` (Range warna Hijau).

### Tantangan 2: Motion Alert

Kirim notifikasi web jika pixel berubah.

> [!IMPORTANT] **Solusi Tantangan**
> Bandingkan rata-rata nilai frame saat ini dengan frame background menggunakan `cv2.absdiff()`.
