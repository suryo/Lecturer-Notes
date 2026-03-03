# Lab 6: Kontrol Motor Servo & DC

## Tantangan Mandiri (Contoh)

### Tantangan 1: Knob Control

Potensiometer mengendalikan sudut servo.

> [!IMPORTANT] **Solusi Tantangan**
> `int s = map(analogRead(A0), 0, 1023, 0, 180); myServo.write(s);`

### Tantangan 2: Serial Dimmer

Atur kecepatan motor DC lewat input angka (0-255).

> [!IMPORTANT] **Solusi Tantangan**
> `if(Serial.available()){ int v = Serial.parseInt(); analogWrite(motorPin, v); }`
