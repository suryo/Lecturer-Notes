// ============================================================
// STUDI KASUS: MONGODB CRUD (Pertemuan 7)
// File 2: Operasi Dasar di MongoDB Shell (mongosh)
// ============================================================

// 1. MEMBUAT DATABASE (USE)
// Di MongoDB, database otomatis dibuat saat data dimasukkan.
use Akademik;

// 2. CREATE (INSERT)
// Memasukkan satu dokumen ke dalam collection 'mahasiswa'
db.mahasiswa.insertOne({
  nim: "2025001",
  nama: "Andi Setiawan",
  prodi: "Teknik Informatika",
  angkatan: 2024,
  hobi: ["Mancing", "Coding"],
  alamat: { jalan: "Jl. Melati 123", kota: "Surabaya" },
  status: "Aktif"
});

// Memasukkan banyak dokumen sekaligus
db.mahasiswa.insertMany([
  {
    nim: "2025002",
    nama: "Budi Santoso",
    prodi: "Sistem Informasi",
    angkatan: 2024,
    status: "Aktif"
  },
  {
    nim: "2025003",
    nama: "Citra Dewi",
    prodi: "Teknik Informatika",
    angkatan: 2023,
    status: "Cuti"
  }
]);


// 3. READ (FIND)
// - Menampilkan semua data mahasiswa
db.mahasiswa.find().pretty();

// - Mencari mahasiswa dengan prodi "Teknik Informatika"
db.mahasiswa.find({ prodi: "Teknik Informatika" });

// - Mencari mahasiswa dengan status "Aktif" dan angkatan 2024
db.mahasiswa.find({ status: "Aktif", angkatan: 2024 });

// - Mencari mahasiswa yang punya hobi "Coding" (Elemen dalam array)
db.mahasiswa.find({ hobi: "Coding" });


// 4. UPDATE (UpdateOne / UpdateMany)
// - Mengubah status mahasiswa dengan NIM 2025003 menjadi "Aktif"
db.mahasiswa.updateOne(
  { nim: "2025003" },       // Filter
  { $set: { status: "Aktif" } } // Update
);

// - Menambah field baru (email) ke semua mahasiswa angkatan 2024
db.mahasiswa.updateMany(
  { angkatan: 2024 },
  { $set: { email: "mhs2024@univ.ac.id" } }
);


// 5. DELETE (DeleteOne / DeleteMany)
// - Menghapus mahasiswa yang Drop Out (misal NIM 2025002)
db.mahasiswa.deleteOne({ nim: "2025002" });


// ============================================================
// RINGKASAN PRAKTIKUM:
// 1. `use` digunakan untuk pindah/membuat database.
// 2. `db.collectionName.method()` adalah pola dasar kueri MongoDB.
// 3. Objek JSON `{}` digunakan untuk mem-filter data (seperti WHERE).
// 4. `$set` digunakan dalam update untuk mengubah field tertentu saja.
// ============================================================
