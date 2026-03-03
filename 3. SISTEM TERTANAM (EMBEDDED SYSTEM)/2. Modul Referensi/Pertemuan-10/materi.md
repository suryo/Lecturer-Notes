# Pertemuan 10: Sistem Keamanan dan Otomasi (Smart Home)

## Contoh Studi Kasus & Solusi

### Contoh 1: Lampu Kamar Mandi Otomatis

Gimana cara mencegah lampu mati saat kita diam (tidak bergerak) di dalam ruangan?

> [!TIP] **Jawaban/Solusi**
> Memberikan waktu tunggu (delay) yang cukup lama setelah gerakan terakhir terdeteksi (Timer Re-trigger).
>
> ```cpp
> if (digitalRead(PIR) == HIGH) lastTime = millis();
> if (millis() - lastTime > (5 * 60 * 1000)) turnOFF(); // Tunggu 5 menit
> ```

### Contoh 2: Alarm Anti-Maling (Armed System)

Bagaimana cara mematikan Buzzer alarm jika sudah terlanjur berbunyi?

> [!TIP] **Jawaban/Solusi**
> Mengharuskan input password (via keypad) atau menekan tombol rahasia untuk mengubah status variabel `alarmActive` menjadi `false`.

### Contoh 3: Jadwal Siram Tanaman (RTC)

Apa yang terjadi jika kita hanya menggunakan `delay()` selama 24 jam untuk menyiram tanaman?

> [!TIP] **Jawaban/Solusi**
> Waktu akan bergeser (drift) karena mikrokontroler tidak memiliki jam presisi tinggi. Solusinya adalah menggunakan modul **RTC DS3231** yang memiliki baterai cadangan.

---

## Praktikum Mandiri

**Tugas**: Rancang sistem deteksi gerakan menggunakan PIR. Jika ada gerakan, nyalakan Buzzer selama 3 detik lalu mati kembali secara otomatis.

> [!IMPORTANT] **Kunci Jawaban Praktikum**
>
> ```cpp
> if (digitalRead(PIR_PIN) == HIGH) {
>   digitalWrite(BUZZER, HIGH);
>   delay(3000);
>   digitalWrite(BUZZER, LOW);
> }
> ```
