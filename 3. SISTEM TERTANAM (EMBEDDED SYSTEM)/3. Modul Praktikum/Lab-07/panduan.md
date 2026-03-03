# Lab 7: Tampilan Data di LCD & OLED

## Tantangan Mandiri (Contoh)

### Tantangan 1: Jam Digital

Tampilkan format HH:MM:SS.

> [!IMPORTANT] **Solusi Tantangan**
> Gunakan `lcd.print(h); lcd.print(":"); lcd.print(m); ...` di dalam loop dengan `delay(1000)`.

### Tantangan 2: Sensor Monitor

Tampilkan Suhu (Baris 1) dan Kelembaban (Baris 2).

> [!IMPORTANT] **Solusi Tantangan**
> `lcd.setCursor(0,0); lcd.print(temp); lcd.setCursor(0,1); lcd.print(hum);`
