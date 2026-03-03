# Pertemuan 7: Tampilan Data dengan LCD & OLED Display

## Contoh Studi Kasus & Solusi

### Contoh 1: Digital Thermometer Dashboard

Bagaimana memindahkan kursor tulisan dari baris 1 ke baris 2 pada LCD 16x2?

> [!TIP] **Jawaban/Solusi**
> Menggunakan fungsi `lcd.setCursor(column, row);`. Ingat index dimulai dari 0.
> `lcd.setCursor(0, 0); lcd.print("Suhu");` // Baris Atas
> `lcd.setCursor(0, 1); lcd.print("Hum ");` // Baris Bawah

### Contoh 2: Scrolling Text di OLED

Kapan kita sebaiknya menggunakan scrolling text?

> [!TIP] **Jawaban/Solusi**
> Saat informasi yang ingin ditampilkan lebih panjang dari lebar layar (misal: pengumuman Running Text).
> `display.startscrollleft(0x00, 0x0F);`

### Contoh 3: Monitoring Baterai (Progress Bar)

Bagaimana menggambar kotak bar meter untuk level air di OLED?

> [!TIP] **Jawaban/Solusi**
> Gunakan `display.drawRect()` untuk outline dan `display.fillRect()` untuk isi volumenya. Lebar fillRect disesuaikan dengan persentase sensor level air.

---

## Praktikum Mandiri

**Tugas**: Tampilkan hasil pembacaan jarak dari sensor Ultrasonik ke layar OLED. Jika jarak < 10cm, tampilkan tulisan "AWAS!" dengan ukuran teks besar.

> [!IMPORTANT] **Kunci Jawaban Praktikum**
>
> ```cpp
> void loop() {
>   int d = getDist();
>   display.clearDisplay();
>   if (d < 10) {
>     display.setTextSize(2); display.setCursor(0,10); display.print("AWAS!");
>   } else {
>     display.setTextSize(1); display.print("Jarak: "); display.print(d);
>   }
>   display.display();
> }
> ```
