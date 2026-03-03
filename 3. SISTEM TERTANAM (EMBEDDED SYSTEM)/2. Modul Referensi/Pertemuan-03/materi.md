# Pertemuan 3: Sensor Analog dan Digital pada Arduino

## Contoh Studi Kasus & Solusi

### Contoh 1: Smart Street Light (LDR)

Bagaimana cara sistem lampu jalan mengetahui kapan harus menyala otomatis?

> [!TIP] **Jawaban/Solusi**
> Mengambil nilai analog dari LDR (biasanya pin A0). Jika nilai di bawah ambang batas (threshold), misal 500, maka kirim perintah HIGH ke relay/LED.
>
> ```cpp
> int cahaya = analogRead(A0);
> if (cahaya < 500) digitalWrite(13, HIGH);
> ```

### Contoh 2: Alarm Jarak Parkir (Ultrasonik)

Bagaimana logika sensor ultrasonik menghitung jarak dalam CM?

> [!TIP] **Jawaban/Solusi**
> Mengukur durasi pantulan (Microseconds) dikalikan dengan kecepatan suara (0.034 cm/us) dibagi 2 (bolak-balik).
>
> ```cpp
> long duration = pulseIn(echoPin, HIGH);
> int distance = duration * 0.034 / 2;
> if (distance < 10) tone(buzzer, 1000);
> ```

### Contoh 3: Monitoring Suhu Ruangan (DHT11)

Berapa nilai suhu maksimal yang dianggap kritis di dalam ruang server dan bagaimana pemicunya?

> [!TIP] **Jawaban/Solusi**
> Biasanya di atas 30-35°C. Menggunakan library `DHT.h`:
> `float t = dht.readTemperature(); if (t > 30) digitalWrite(fanPin, HIGH);`

---

## Praktikum Mandiri

**Tugas**: Rancang sistem di mana LED hanya bisa menyala jika kondisi Gelap (LDR < 500) DAN ada objek di depan sensor ultrasonik (Jarak < 20cm).

> [!IMPORTANT] **Kunci Jawaban Praktikum**
>
> ```cpp
> void loop() {
>   int ldr = analogRead(A0);
>   long dist = getDistance(); // Fungsi helper ultrasonik
>   if (ldr < 500 && dist < 20) {
>     digitalWrite(13, HIGH);
>   } else {
>     digitalWrite(13, LOW);
>   }
> }
> ```
