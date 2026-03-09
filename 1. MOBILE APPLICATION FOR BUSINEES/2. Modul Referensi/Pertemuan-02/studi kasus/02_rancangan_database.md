# Rancangan Database: Toko Online (TokoKu)

## 1. Daftar Tabel

| No  | Nama Tabel       | Deskripsi                              |
| --- | ---------------- | -------------------------------------- |
| 1   | `users`          | Data akun pengguna (pelanggan & admin) |
| 2   | `alamat`         | Alamat pengiriman milik user           |
| 3   | `kategori`       | Kategori produk                        |
| 4   | `produk`         | Daftar produk                          |
| 5   | `foto_produk`    | Foto-foto produk                       |
| 6   | `bundel`         | Paket bundling produk                  |
| 7   | `bundel_item`    | Item di dalam bundel                   |
| 8   | `diskon`         | Aturan diskon produk / kategori        |
| 9   | `voucher`        | Kode kupon promo                       |
| 10  | `cart`           | Keranjang belanja sementara            |
| 11  | `pesanan`        | Header transaksi pesanan               |
| 12  | `detail_pesanan` | Rincian produk per pesanan             |
| 13  | `pembayaran`     | Rekam jejak pembayaran                 |
| 14  | `pengiriman`     | Detail pengiriman & resi               |
| 15  | `ulasan`         | Rating dan komentar produk             |
| 16  | `wishlist`       | Daftar produk favorit user             |
| 17  | `notifikasi`     | Riwayat notifikasi push                |

---

## 2. Skema Tabel Detail

### 📋 users

```sql
CREATE TABLE users (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    nama          VARCHAR(150) NOT NULL,
    email         VARCHAR(100) NOT NULL UNIQUE,
    password      VARCHAR(255) NOT NULL,
    no_hp         VARCHAR(20),
    foto_profil   VARCHAR(255),
    role          ENUM('pelanggan', 'admin') DEFAULT 'pelanggan',
    fcm_token     VARCHAR(255),  -- Firebase Cloud Messaging token untuk push notif
    created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 📋 alamat

```sql
CREATE TABLE alamat (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    id_user       INT NOT NULL,
    label         VARCHAR(50),   -- "Rumah", "Kantor"
    nama_penerima VARCHAR(150),
    no_hp         VARCHAR(20),
    provinsi      VARCHAR(100),
    kota          VARCHAR(100),
    kecamatan     VARCHAR(100),
    kode_pos      VARCHAR(10),
    detail        TEXT,
    is_utama      BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (id_user) REFERENCES users(id)
);
```

### 📋 kategori

```sql
CREATE TABLE kategori (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    nama          VARCHAR(100) NOT NULL,
    ikon_url      VARCHAR(255),
    parent_id     INT DEFAULT NULL,  -- Untuk sub-kategori
    FOREIGN KEY (parent_id) REFERENCES kategori(id)
);
```

### 📋 produk

```sql
CREATE TABLE produk (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    id_kategori   INT NOT NULL,
    nama          VARCHAR(200) NOT NULL,
    deskripsi     TEXT,
    harga         DECIMAL(15,2) NOT NULL,
    stok          INT DEFAULT 0,
    berat_gram    INT,
    terjual       INT DEFAULT 0,
    rating        DECIMAL(3,2) DEFAULT 0.00,
    status        ENUM('aktif', 'nonaktif', 'habis') DEFAULT 'aktif',
    created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id)
);
```

### 📋 foto_produk

```sql
CREATE TABLE foto_produk (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    id_produk     INT NOT NULL,
    url           VARCHAR(255) NOT NULL,
    urutan        INT DEFAULT 1,
    FOREIGN KEY (id_produk) REFERENCES produk(id)
);
```

### 📋 diskon

```sql
CREATE TABLE diskon (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    nama          VARCHAR(100),
    tipe          ENUM('persen', 'nominal') NOT NULL,
    nilai         DECIMAL(10,2) NOT NULL,
    berlaku_dari  DATETIME,
    berlaku_sampai DATETIME,
    id_produk     INT DEFAULT NULL,   -- Diskon spesifik produk
    id_kategori   INT DEFAULT NULL,   -- Diskon satu kategori
    min_pembelian DECIMAL(15,2) DEFAULT 0,
    FOREIGN KEY (id_produk)   REFERENCES produk(id),
    FOREIGN KEY (id_kategori) REFERENCES kategori(id)
);
```

### 📋 voucher

```sql
CREATE TABLE voucher (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    kode          VARCHAR(20) NOT NULL UNIQUE,
    deskripsi     VARCHAR(255),
    tipe          ENUM('persen', 'nominal', 'ongkir') NOT NULL,
    nilai         DECIMAL(10,2) NOT NULL,
    min_belanja   DECIMAL(15,2) DEFAULT 0,
    max_potongan  DECIMAL(15,2) DEFAULT NULL,
    kuota         INT DEFAULT NULL,
    terpakai      INT DEFAULT 0,
    berlaku_sampai DATETIME,
    status        ENUM('aktif', 'nonaktif') DEFAULT 'aktif'
);
```

### 📋 bundel & bundel_item

```sql
CREATE TABLE bundel (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    nama          VARCHAR(200) NOT NULL,
    deskripsi     TEXT,
    harga_bundel  DECIMAL(15,2) NOT NULL,
    foto_url      VARCHAR(255),
    status        ENUM('aktif', 'nonaktif') DEFAULT 'aktif'
);

CREATE TABLE bundel_item (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    id_bundel     INT NOT NULL,
    id_produk     INT NOT NULL,
    jumlah        INT NOT NULL DEFAULT 1,
    FOREIGN KEY (id_bundel)  REFERENCES bundel(id),
    FOREIGN KEY (id_produk)  REFERENCES produk(id)
);
```

### 📋 pesanan & detail_pesanan

```sql
CREATE TABLE pesanan (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    id_user         INT NOT NULL,
    id_alamat       INT NOT NULL,
    kode_pesanan    VARCHAR(30) UNIQUE NOT NULL,
    status          ENUM('menunggu_bayar','dibayar','dikemas','dikirim','selesai','dibatalkan') DEFAULT 'menunggu_bayar',
    subtotal        DECIMAL(15,2) NOT NULL,
    diskon_voucher  DECIMAL(15,2) DEFAULT 0,
    ongkir          DECIMAL(15,2) DEFAULT 0,
    diskon_ongkir   DECIMAL(15,2) DEFAULT 0,
    total           DECIMAL(15,2) NOT NULL,
    id_voucher      INT DEFAULT NULL,
    catatan         TEXT,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user)    REFERENCES users(id),
    FOREIGN KEY (id_alamat)  REFERENCES alamat(id),
    FOREIGN KEY (id_voucher) REFERENCES voucher(id)
);

CREATE TABLE detail_pesanan (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan      INT NOT NULL,
    id_produk       INT DEFAULT NULL,
    id_bundel       INT DEFAULT NULL,
    nama_snapshot   VARCHAR(200),   -- Snapshot nama produk saat beli
    harga_snapshot  DECIMAL(15,2),  -- Snapshot harga saat beli
    jumlah          INT NOT NULL,
    subtotal        DECIMAL(15,2) NOT NULL,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id),
    FOREIGN KEY (id_produk)  REFERENCES produk(id),
    FOREIGN KEY (id_bundel)  REFERENCES bundel(id)
);
```

### 📋 pembayaran

```sql
CREATE TABLE pembayaran (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan      INT NOT NULL,
    metode          VARCHAR(50),  -- 'transfer', 'va_bca', 'qris', 'gopay', 'cod'
    status          ENUM('pending','berhasil','gagal','kedaluwarsa') DEFAULT 'pending',
    ref_eksternal   VARCHAR(255), -- ID dari Payment Gateway
    jumlah          DECIMAL(15,2),
    waktu_bayar     DATETIME,
    expired_at      DATETIME,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id)
);
```

### 📋 pengiriman

```sql
CREATE TABLE pengiriman (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan      INT NOT NULL,
    kurir           VARCHAR(50),   -- 'JNE', 'J&T', 'SiCepat'
    layanan         VARCHAR(50),   -- 'REG', 'YES', 'Express'
    no_resi         VARCHAR(100),
    estimasi_hari   INT,
    status          ENUM('menunggu','dikemas','dikirim','tiba') DEFAULT 'menunggu',
    dikirim_at      DATETIME,
    tiba_at         DATETIME,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id)
);
```

### 📋 ulasan

```sql
CREATE TABLE ulasan (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan      INT NOT NULL,
    id_produk       INT NOT NULL,
    id_user         INT NOT NULL,
    bintang         TINYINT NOT NULL CHECK (bintang BETWEEN 1 AND 5),
    komentar        TEXT,
    foto_url        VARCHAR(255),
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id),
    FOREIGN KEY (id_produk)  REFERENCES produk(id),
    FOREIGN KEY (id_user)    REFERENCES users(id)
);
```

---

## 3. Entity Relationship Diagram (ERD — Deskripsi)

```
users ──< alamat
users ──< cart
users ──< pesanan
users ──< wishlist
users ──< ulasan

kategori ──< produk
produk ──< foto_produk
produk ──< diskon
produk ──< bundel_item >── bundel

pesanan ──< detail_pesanan
pesanan ── pembayaran
pesanan ── pengiriman
pesanan ──< ulasan

voucher ──< pesanan
```
