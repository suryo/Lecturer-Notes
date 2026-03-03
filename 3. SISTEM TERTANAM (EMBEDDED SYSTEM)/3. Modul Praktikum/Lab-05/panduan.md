# Lab 5: Komunikasi Serial Arduino & Raspberry Pi

## Tantangan Mandiri (Contoh)

### Tantangan 1: Remote Arduino from Python

Kirim '1' dari RPi untuk nyalakan LED Arduino.

> [!IMPORTANT] **Solusi Tantangan**
> **Python:** `ser.write(b'1')`
> **Arduino:** `if(Serial.read() == '1') digitalWrite(13, HIGH);`

### Tantangan 2: CSV Data Logger

Simpan data Arduino ke file di Raspberry Pi.

> [!IMPORTANT] **Solusi Tantangan**
> Di Python, gunakan loop `while True`, baca line dari serial, lalu `open("data.csv", "a").write(line)`.
