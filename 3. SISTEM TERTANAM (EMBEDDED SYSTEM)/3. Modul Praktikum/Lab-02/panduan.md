# Lab 2: Pemrograman Digital I/O (Push Button)

## Tantangan Mandiri (Contoh)

### Tantangan 1: Button Counter

Tampilkan teks di Serial Monitor setiap kali tombol ditekan.

> [!IMPORTANT] **Solusi Tantangan**
> `if (digitalRead(2) == LOW) { Serial.println("Klik!"); while(digitalRead(2)==LOW); }`

### Tantangan 2: Latch System (Toggle)

Satu tombol untuk ON, dan klik lagi untuk OFF.

> [!IMPORTANT] **Solusi Tantangan**
> Gunakan variabel `bool status = false;`. Lakukan `status = !status;` setiap kali tombol dideteksi (LOW).
