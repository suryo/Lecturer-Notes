# Pertemuan 4: Pemrograman Raspberry Pi dan GPIO Dasar

## Contoh Studi Kasus & Solusi

### Contoh 1: Python Blink LED

Apa perbedaan utama mengontrol LED di Arduino vs Raspberry Pi (Python)?

> [!TIP] **Jawaban/Solusi**
> Di Arduino, kode di-compile menjadi biner dan berjalan langsung di hardware. Di Raspberry Pi, kode berjalan di atas Sistem Operasi Linux. Contoh Python menggunakan `gpiozero`:
>
> ```python
> from gpiozero import LED
> led = LED(17)
> led.blink()
> ```

### Contoh 2: Shutdown Button

Bagaimana membuat tombol fisik untuk mematikan OS Raspberry Pi dengan aman?

> [!TIP] **Jawaban/Solusi**
> Menghubungkan tombol ke GPIO dan menjalankan perintah sistem `poweroff`.
>
> ```python
> from gpiozero import Button
> from os import system
> btn = Button(2)
> btn.when_pressed = lambda: system("sudo poweroff")
> ```

### Contoh 3: CPU Temperature Monitoring

Mengapa suhu CPU Raspberry Pi perlu dipantau secara rutin?

> [!TIP] **Jawaban/Solusi**
> Untuk mencegah _thermal throttling_ (penurunan performa akibat panas). Dapat dicek via perintah terminal `vcgencmd measure_temp` atau membaca file `/sys/class/thermal/thermal_zone0/temp`.

---

## Praktikum Mandiri

**Tugas**: Buatlah skrip Python yang mencatat waktu (timestamp) setiap kali tombol ditekan ke dalam sebuah file `log.txt`.

> [!IMPORTANT] **Kunci Jawaban Praktikum**
>
> ```python
> from gpiozero import Button
> from datetime import datetime
>
> btn = Button(21)
> while True:
>     btn.wait_for_press()
>     with open("log.txt", "a") as f:
>         f.write(f"Ditekan pada: {datetime.now()}\n")
> ```
