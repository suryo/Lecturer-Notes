# Pertemuan 6: Motor dan Aktuator (Servo, DC, Stepper)

## Contoh Studi Kasus & Solusi

### Contoh 1: Palang Pintu Otomatis (Servo)

Berapa derajat yang dibutuhkan servo untuk membuka palang pintu masuk parkir?

> [!TIP] **Jawaban/Solusi**
> Biasanya dari 0 derajat (menutup) ke 90 derajat (terbuka vertikal).
>
> ```cpp
> if (jarak < 5) myServo.write(90); else myServo.write(0);
> ```

### Contoh 2: Kontrol Kecepatan Kipas (DC + PWM)

Mengapa kita tidak boleh menghubungkan motor DC langsung ke pin Arduino?

> [!TIP] **Jawaban/Solusi**
> Karena motor membutuhkan arus besar (mA/Ampere) yang dapat merusak jalur sirkuit Arduino (maks ~40mA). Dibutuhkan driver (L298N/MOSFET) sebagai perantara.

### Contoh 3: Presisi Stepper Motor

Sebutkan aplikasi yang membutuhkan motor stepper dibanding motor DC biasa.

> [!TIP] **Jawaban/Solusi**
> Printer 3D, Mesin CNC, dan Slider Kamera. Dibutuhkan ketepatan posisi (langkah/step) yang tidak bisa didapat dari motor DC tanpa encoder tambahan.

---

## Praktikum Mandiri

**Tugas**: Buatlah mobil remote control sederhana (Maju dan Mundur) menggunakan 2 motor DC dan driver L298N.

> [!IMPORTANT] **Kunci Jawaban Praktikum**
>
> ```cpp
> // Maju (Pin Forward ON)
> digitalWrite(IN1, HIGH); digitalWrite(IN2, LOW); // Motor Kiri
> digitalWrite(IN3, HIGH); digitalWrite(IN4, LOW); // Motor Kanan
> // Mundur (Kebalikannya)
> digitalWrite(IN1, LOW); digitalWrite(IN2, HIGH);
> ```
