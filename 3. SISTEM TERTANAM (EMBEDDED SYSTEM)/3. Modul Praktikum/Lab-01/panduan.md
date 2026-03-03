# Lab 1: Pengenalan Simulator Wokwi dan Arduino

## Tantangan Mandiri (Contoh)

### Tantangan 1: Double Blink

Tambahkan LED kedua pada pin 12 dan buat kedipan bergantian.

> [!IMPORTANT] **Solusi Tantangan**
>
> ```cpp
> void setup() { pinMode(13, OUTPUT); pinMode(12, OUTPUT); }
> void loop() {
>   digitalWrite(13, HIGH); digitalWrite(12, LOW); delay(500);
>   digitalWrite(13, LOW); digitalWrite(12, HIGH); delay(500);
> }
> ```

### Tantangan 2: Faster Blink

Buatlah kedipan yang semakin cepat.

> [!IMPORTANT] **Solusi Tantangan**
> Gunakan variabel `int jeda = 1000;` dan kurangi nilainya setiap akhir loop: `jeda -= 100; if(jeda < 100) jeda = 1000;`.
