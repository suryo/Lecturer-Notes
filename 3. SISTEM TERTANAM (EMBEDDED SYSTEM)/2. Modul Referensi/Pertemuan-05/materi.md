# Pertemuan 5: Komunikasi Serial (UART, I2C, SPI)

## Contoh Studi Kasus & Solusi

### Contoh 1: Arduino to RPi via Serial (USB)

Jika Arduino mengirim teks "OK" lewat Serial, bagaimana Python membacanya?

> [!TIP] **Jawaban/Solusi**
>
> ```python
> import serial
> ser = serial.Serial('/dev/ttyUSB0', 9600)
> data = ser.readline().decode('utf-8').strip()
> if data == "OK": print("Data diterima!")
> ```

### Contoh 2: Perangkat I2C dengan Alamat Sama

Bisa kah dua sensor yang sama (alamat sama) dipasang pada satu bus I2C?

> [!TIP] **Jawaban/Solusi**
> Secara default tidak bisa (tabrakan data). Solusinya adalah mengubah alamat via solder pada pin ADDR di sensor tersebut, atau menggunakan I2C Multiplexer (TCA9548A).

### Contoh 3: Protokol SPI (Slave Select)

Apa fungsi utama pin CS (Chip Select) pada protokol SPI?

> [!TIP] **Jawaban/Solusi**
> Pin CS digunakan Master untuk memilih Slave mana yang akan diajak berkomunikasi. Slave hanya akan merespons jalur data (MOSI/MISO) jika pin CS miliknya ditarik ke LOW.

---

## Praktikum Mandiri

**Tugas**: Kirimkan karakter 'A' dari Raspberry Pi ke Arduino. Jika Arduino menerima 'A', nyalakan LED selama 1 detik.

> [!IMPORTANT] **Kunci Jawaban Praktikum**
> **Arduino Side:**
>
> ```cpp
> void loop() {
>   if (Serial.available()) {
>     if (Serial.read() == 'A') {
>       digitalWrite(13, HIGH); delay(1000); digitalWrite(13, LOW);
>     }
>   }
> }
> ```
