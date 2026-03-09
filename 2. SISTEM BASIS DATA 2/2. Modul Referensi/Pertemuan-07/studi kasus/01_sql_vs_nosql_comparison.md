# STUDI KASUS: SQL VS NOSQL (Pertemuan 7)

# File 1: Perbandingan Struktur Data

Analisis perbedaan cara menyimpan data yang sama (Data Mahasiswa) antara sistem relasional (SQL) dan sistem dokumen (NoSQL).

---

## 1. PENDEKATAN SQL (RELATIONAL)

Dalam SQL, data harus dipisahkan ke beberapa tabel (Normalisasi) agar tidak redundan.

**Tabel `mahasiswa`:**
| id_mhs | nama | nim | id_prodi |
|--------|---------|----------|----------|
| 1 | Andi | 2025001 | 10 |

**Tabel `hobi`:**
| id_hobi | id_mhs | nama_hobi |
|---------|--------|-----------|
| 1 | 1 | Mancing |
| 2 | 1 | Coding |

**Tabel `alamat`:**
| id_alamat | id_mhs | jalan | kota |
|-----------|--------|----------------|----------|
| 1 | 1 | Jl. Melati 123 | Surabaya |

---

## 2. PENDEKATAN NOSQL (DOCUMENT-ORIENTED)

Dalam NoSQL (MongoDB), data yang terkait disimpan bersama dalam satu **Document** (Denormalisasi).

**Collection `mahasiswa`:**

```json
{
  "_id": "ObjectId('67cd53...')",
  "nim": "2025001",
  "nama": "Andi Setiawan",
  "prodi": {
    "id": 10,
    "nama": "Teknik Informatika"
  },
  "hobi": ["Mancing", "Coding", "Gaming"],
  "alamat": {
    "jalan": "Jl. Melati 123",
    "kota": "Surabaya",
    "provinsi": "Jawa Timur"
  },
  "tags": ["Aktif", "Beasiswa"],
  "last_login": ISODate("2025-03-09T08:00:00Z")
}
```

---

## KESIMPULAN PERBANDINGAN:

1. **Fleksibilitas**:
   - **SQL**: Jika ingin menambah kolom "media_sosial", kita harus mengubah skema tabel (`ALTER TABLE`).
   - **NoSQL**: Kita bisa langsung memasukkan field baru ke satu dokumen tanpa mengganggu dokumen lain (**Schemaless**).
2. **Kueri**:
   - **SQL**: Butuh `JOIN` antar 3 tabel untuk melihat profil lengkap Andi.
   - **NoSQL**: Cukup satu kueri `find()` untuk mengambil seluruh data Andi.
3. **Integritas**:
   - **SQL**: Sangat kuat karena ada _Foreign Key_.
   - **NoSQL**: Integritas data seringkali dikelola di level aplikasi (Coding).
