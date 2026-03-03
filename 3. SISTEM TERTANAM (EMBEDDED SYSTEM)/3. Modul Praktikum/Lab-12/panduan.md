# Lab 12: Embedded AI (Model Deployment)

## Tantangan Mandiri (Contoh)

### Tantangan 1: Clap to Lamp

Tepuk tangan menyalakan relay.

> [!IMPORTANT] **Solusi Tantangan**
> `if(prediction[CLAP] > 0.8) state = !state; digitalWrite(RELAY, state);`

### Tantangan 2: Hand Sign Controller

Gerak tangan ke kiri/kanan kendalikan arah motor.

> [!IMPORTANT] **Solusi Tantangan**
> Gunakan Classifier hasil training di Edge Impulse untuk membedakan arah ayunan akselerometer.
