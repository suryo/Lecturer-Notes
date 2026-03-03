# Lab 8: Koneksi Wi-Fi dan Cloud IoT

## Tantangan Mandiri (Contoh)

### Tantangan 1: Local HTTP Server

Kontrol LED lewat browser.

> [!IMPORTANT] **Solusi Tantangan**
> Gunakan `server.on("/on", [](){ digitalWrite(2, HIGH); server.send(200, "text/plain", "LED ON"); });`

### Tantangan 2: Peringatan Telegram

Kirim pesan saat sensor PIR mendeteksi gerakan.

> [!IMPORTANT] **Solusi Tantangan**
> `if(digitalRead(PIR)){ bot.sendMessage(CHAT_ID, "Gerakan Terdeteksi!", ""); }`
