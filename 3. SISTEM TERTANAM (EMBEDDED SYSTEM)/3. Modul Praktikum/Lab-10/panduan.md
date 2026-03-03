# Lab 10: Sistem Keamanan (Relay & PIR)

## Tantangan Mandiri (Contoh)

### Tantangan 1: Security Armed Mode

Kunci alarm sampai di-reset.

> [!IMPORTANT] **Solusi Tantangan**
> `if (armed && detect) { while(true) { alarm(); if(reset) break; } }`

### Tantangan 2: Internet Relay

Kontrol relay tegangan tinggi via internet.

> [!IMPORTANT] **Solusi Tantangan**
> Di Blynk, hubungkan Pin Virtual V1 ke Relay pin digital di ESP32.
