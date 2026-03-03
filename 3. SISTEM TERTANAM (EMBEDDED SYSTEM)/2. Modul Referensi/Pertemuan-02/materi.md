# Pertemuan 2: Pemrograman Dasar Arduino (Blink LED & Digital I/O)

## Materi Pembelajaran

### 1. Struktur Sketch

- `setup()`: Inisialisasi.
- `loop()`: Eksekusi berulang.

### 2. Fungsi Digital I/O

- `pinMode()`, `digitalWrite()`, `digitalRead()`.

---

## Contoh Studi Kasus & Solusi

### Contoh 1: SOS Morse Signal

Bagaimana cara membuat sinyal SOS (... --- ...) pada LED internal pin 13?

> [!TIP] **Jawaban/Solusi**
>
> ```cpp
> void kedip(int durasi) {
>   digitalWrite(13, HIGH);
>   delay(durasi);
>   digitalWrite(13, LOW);
>   delay(durasi);
> }
>
> void loop() {
>   for(int i=0; i<3; i++) { kedip(200); } // S
>   delay(200);
>   for(int i=0; i<3; i++) { kedip(600); } // O
>   delay(200);
>   for(int i=0; i<3; i++) { kedip(200); } // S
>   delay(2000); // Jeda antar sinyal
> }
> ```

### Contoh 2: Toggle LED with Button

Buatlah logika agar LED berubah status (ON ke OFF atau sebaliknya) setiap kali tombol ditekan sekali.

> [!TIP] **Jawaban/Solusi**
>
> ```cpp
> const int btn = 2;
> const int led = 13;
> bool state = false;
>
> void setup() {
>   pinMode(btn, INPUT_PULLUP);
>   pinMode(led, OUTPUT);
> }
>
> void loop() {
>   if (digitalRead(btn) == LOW) {
>     state = !state;
>     digitalWrite(led, state);
>     while(digitalRead(btn) == LOW); // Menunggu tombol dilepas (Latch)
>     delay(50); // Debounce
>   }
> }
> ```

### Contoh 3: Traffic Light Simulator

Sebutkan urutan pin dan delay yang umum digunakan untuk simulasi lampu lalu lintas.

> [!TIP] **Jawaban/Solusi**
> Pin 8 (Merah), Pin 9 (Kuning), Pin 10 (Hijau).
> Urutan: Merah (5 detik) -> Kuning (1 detik) -> Hijau (5 detik) -> Kuning (2 detik) -> Ulang.

---

## Praktikum Mandiri

**Tugas**: Buatlah program agar LED hanya menyala jika Dua Tombol (pin 2 dan 3) ditekan secara bersamaan (Logika AND).

> [!IMPORTANT] **Kunci Jawaban Praktikum**
>
> ```cpp
> void loop() {
>   if (digitalRead(2) == LOW && digitalRead(3) == LOW) {
>     digitalWrite(13, HIGH);
>   } else {
>     digitalWrite(13, LOW);
>   }
> }
> ```
