# Lab 3: Membaca Sensor Analog & Digital

## Tantangan Mandiri (Contoh)

### Tantangan 1: Lampu Tidur Otomatis (LDR)

LED menyala jika LDR merasa gelap.

> [!IMPORTANT] **Solusi Tantangan**
> `if (analogRead(A0) < 300) digitalWrite(13, HIGH); else digitalWrite(13, LOW);`

### Tantangan 2: Radar Parkir (Ultrasonic)

Buzzer bunyi jika jarak < 10cm.

> [!IMPORTANT] **Solusi Tantangan**
> Panggil fungsi pengukuran jarak. Jika hasil `< 10`, jalankan perintah `tone(buzzerPin, 1000);`.
