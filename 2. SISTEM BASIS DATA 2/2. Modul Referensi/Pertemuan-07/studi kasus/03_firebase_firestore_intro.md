# STUDI KASUS: FIREBASE FIRESTORE (Pertemuan 7)

# File 3: Pengenalan Google Firebase

Firebase adalah platform _Backend as a Service_ (BaaS) dari Google yang menyediakan database berbasis dokumen Cloud secara _Real-time_.

---

## 1. STRUKTUR FIRESTORE

Firestore (versi modern dari Real-time Database) menggunakan model **Collection -> Document -> Collection**.

**Contoh Struktur Data:**

- **Collection `mahasiswa`**: Berisi banyak dokumen mahasiswa.
  - **Document `ID_Satu`**: Data Mahasiswa 1.
    - **Sub-Collection `nilai_per_semester`**: (Collection di dalam Dokumen).
      - **Document `Semester_1`**: Nilai mahasiswa.

---

## 2. FITUR UNGGULAN FIREBASE

1. **Real-time Sync**: Jika admin mengubah nilai di Console Firebase, aplikasi mahasiswa (Android/iOS) akan langsung berubah detiknya itu juga tanpa harus _Refresh_.
2. **Offline Mode**: Aplikasi tetap berjalan walau sinyal putus, dan otomatis sinkron saat internet kembali menyala.
3. **No Setup Server**: Kamu tidak perlu instal PHP/MySQL di hosting sendiri. Google yang menyiapkan server database-nya.

---

## 3. IMPLEMENTASI KODE (SIMULASI JAVASCRIPT)

Berikut contoh kueri Firebase di aplikasi Web:

```javascript
// 1. Inisialisasi Firebase & Ambil Database (Firestore)
const db = getFirestore(app);

// 2. Tambah Data (AddDoc)
try {
  const docRef = await addDoc(collection(db, "PesanChat"), {
    pengirim: "Andi",
    text: "Halo, selamat pagi!",
    waktu: serverTimestamp(),
  });
  console.log("Pesan dikirim: ", docRef.id);
} catch (e) {
  console.error("Gagal kirim: ", e);
}

// 3. Ambil Data Real-time (onSnapshot)
onSnapshot(collection(db, "PesanChat"), (snapshot) => {
  snapshot.docChanges().forEach((change) => {
    if (change.type === "added") {
      console.log("Pesan Baru: ", change.doc.data());
      // Render pesan baru langsung ke UI Chat
    }
  });
});
```

---

## KESIMPULAN:

1. **Firebase** sangat ideal untuk aplikasi Mobile (Android/Flutter) dan Web yang interaktif.
2. Sangat cepat untuk pengembangan MVP (Minimum Viable Product).
3. Namun, biayanya bergantung pada **Read/Write Operations**. Jika aplikasimu sangat ramai dan kuerinya tidak efisien, biaya tagihannya bisa membengkak.
