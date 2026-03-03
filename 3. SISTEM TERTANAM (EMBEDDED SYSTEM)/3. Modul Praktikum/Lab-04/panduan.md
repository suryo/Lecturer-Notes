# Lab 4: Pemrograman Raspberry Pi GPIO (Python)

## Tantangan Mandiri (Contoh)

### Tantangan 1: Python Input

Cetak "Tombol OK" saat GPIO 27 ditekan.

> [!IMPORTANT] **Solusi Tantangan**
>
> ```python
> from gpiozero import Button
> b = Button(27)
> b.wait_for_press()
> print("Tombol OK")
> ```

### Tantangan 2: LED Chasing

Nyalakan 3 LED bergantian.

> [!IMPORTANT] **Solusi Tantangan**
> Gunakan perulangan `for` pada list pin LED: `for p in [17, 27, 22]: LED(p).on(); sleep(0.5); LED(p).off()`.
