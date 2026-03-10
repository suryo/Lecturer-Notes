-- ============================================================
-- DATABASE: TokoKita - Toko Online PHP & MySQL
-- Matakuliah: Pemrograman Web 2
-- ============================================================

CREATE DATABASE IF NOT EXISTS tokokita CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE tokokita;

-- ============================================================
-- SECTION 1: CREATE TABLE
-- ============================================================

-- Tabel Kategori Produk
CREATE TABLE kategori (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    nama        VARCHAR(100) NOT NULL,
    slug        VARCHAR(100) NOT NULL UNIQUE,
    ikon        VARCHAR(10) DEFAULT '📦',
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Pengguna (Member & Admin)
CREATE TABLE users (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    nama        VARCHAR(150) NOT NULL,
    email       VARCHAR(100) NOT NULL UNIQUE,
    password    VARCHAR(255) NOT NULL,  -- password_hash()
    no_hp       VARCHAR(20),
    alamat      TEXT,
    kota        VARCHAR(100),
    kode_pos    VARCHAR(10),
    role        ENUM('admin', 'member') DEFAULT 'member',
    status      ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
    foto        VARCHAR(255) DEFAULT NULL,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Produk
CREATE TABLE produk (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    id_kategori     INT NOT NULL,
    nama            VARCHAR(200) NOT NULL,
    slug            VARCHAR(200) NOT NULL UNIQUE,
    deskripsi       TEXT,
    harga           DECIMAL(15,2) NOT NULL,
    harga_diskon    DECIMAL(15,2) DEFAULT NULL,
    stok            INT NOT NULL DEFAULT 0,
    berat_gram      INT DEFAULT 0,
    foto            VARCHAR(255) DEFAULT 'default.jpg',
    terjual         INT DEFAULT 0,
    status          ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id) ON DELETE RESTRICT
);

-- Tabel Keranjang Belanja (Cart)
CREATE TABLE cart (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    id_user     INT NOT NULL,
    id_produk   INT NOT NULL,
    jumlah      INT NOT NULL DEFAULT 1,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_cart (id_user, id_produk),
    FOREIGN KEY (id_user)   REFERENCES users(id)   ON DELETE CASCADE,
    FOREIGN KEY (id_produk) REFERENCES produk(id)  ON DELETE CASCADE
);

-- Tabel Pesanan (Header Transaksi)
CREATE TABLE pesanan (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    id_user             INT NOT NULL,
    kode_pesanan        VARCHAR(30) NOT NULL UNIQUE,
    nama_penerima       VARCHAR(150) NOT NULL,
    no_hp_penerima      VARCHAR(20),
    alamat_pengiriman   TEXT NOT NULL,
    kota_tujuan         VARCHAR(100),
    kode_pos            VARCHAR(10),
    metode_bayar        ENUM('transfer_bca','transfer_mandiri','cod','qris') DEFAULT 'transfer_bca',
    bukti_bayar         VARCHAR(255) DEFAULT NULL,
    subtotal            DECIMAL(15,2) NOT NULL DEFAULT 0,
    ongkir              DECIMAL(15,2) NOT NULL DEFAULT 15000,
    total               DECIMAL(15,2) NOT NULL DEFAULT 0,
    status              ENUM('menunggu','dibayar','diproses','dikirim','selesai','dibatalkan') DEFAULT 'menunggu',
    catatan             TEXT,
    created_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE RESTRICT
);

-- Tabel Detail Pesanan (Item per Transaksi)
CREATE TABLE detail_pesanan (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan      INT NOT NULL,
    id_produk       INT NOT NULL,
    nama_produk     VARCHAR(200) NOT NULL,  -- Snapshot nama saat beli
    harga_produk    DECIMAL(15,2) NOT NULL, -- Snapshot harga saat beli
    jumlah          INT NOT NULL DEFAULT 1,
    subtotal        DECIMAL(15,2) NOT NULL,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id)  ON DELETE CASCADE,
    FOREIGN KEY (id_produk)  REFERENCES produk(id)   ON DELETE RESTRICT
);

-- ============================================================
-- SECTION 2: INSERT DATA (Data Dummy)
-- ============================================================

-- Data Kategori
INSERT INTO kategori (nama, slug, ikon) VALUES
('Elektronik',     'elektronik',    '💻'),
('Pakaian',        'pakaian',       '👕'),
('Buku',           'buku',          '📚'),
('Perabot Rumah',  'perabot-rumah', '🏠'),
('Olahraga',       'olahraga',      '⚽');

-- Data Admin
INSERT INTO users (nama, email, password, no_hp, role) VALUES
('Admin TokoKita', 'admin@tokokita.id', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMzM5Ob0ppSEJyGbqXjJNZN.ky', '081200000000', 'admin');
-- Password admin: admin123 (hashed dengan password_hash)

-- Data Member
INSERT INTO users (nama, email, password, no_hp, alamat, kota, kode_pos, role) VALUES
('Andi Setiawan',   'andi@gmail.com',   '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMzM5Ob0ppSEJyGbqXjJNZN.ky', '081234567890', 'Jl. Merdeka No.1',     'Jakarta',    '10110', 'member'),
('Budi Santoso',    'budi@gmail.com',   '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMzM5Ob0ppSEJyGbqXjJNZN.ky', '082345678901', 'Jl. Sudirman No.22',   'Bandung',    '40115', 'member'),
('Citra Dewi',      'citra@gmail.com',  '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMzM5Ob0ppSEJyGbqXjJNZN.ky', '083456789012', 'Jl. Pahlawan No.5',    'Surabaya',   '60118', 'member'),
('Dina Rahayu',     'dina@gmail.com',   '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMzM5Ob0ppSEJyGbqXjJNZN.ky', '084567890123', 'Jl. Gajah Mada No.10', 'Yogyakarta', '55122', 'member'),
('Eko Prasetyo',    'eko@gmail.com',    '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMzM5Ob0ppSEJyGbqXjJNZN.ky', '085678901234', 'Jl. Diponegoro No.7',  'Semarang',   '50241', 'member');
-- Password semua member: admin123

-- Data Produk
INSERT INTO produk (id_kategori, nama, slug, deskripsi, harga, harga_diskon, stok, berat_gram) VALUES
-- Elektronik
(1, 'Laptop ASUS VivoBook 15', 'laptop-asus-vivobook-15',
 'Laptop ringan dengan layar 15.6 inci FHD, processor Intel Core i5, RAM 8GB, SSD 512GB. Cocok untuk mahasiswa dan profesional muda.',
 7500000, 6999000, 15, 1800),
(1, 'Smartphone Samsung Galaxy A54', 'smartphone-samsung-a54',
 'HP Android dengan kamera 50MP, baterai 5000mAh, layar Super AMOLED 6.4 inci. Performa kencang untuk sehari-hari.',
 4200000, NULL, 40, 200),
(1, 'TWS Earphone Bluetooth JBL T230', 'earphone-jbl-t230',
 'True Wireless Stereo earphone dengan suara jernih, bass kuat, dan baterai tahan lama hingga 30 jam.',
 350000, 299000, 80, 60),
(1, 'Keyboard Mechanical Gaming K55', 'keyboard-mechanical-k55',
 'Keyboard gaming dengan switch mekanik red, lampu RGB per-key, anti-ghosting 26 tombol.',
 650000, NULL, 30, 900),

-- Pakaian
(2, 'Kaos Polos Premium Pria Size L', 'kaos-polos-premium-l',
 'Bahan cotton combed 30s tebal dan lembut, jahitan rapi, tersedia berbagai warna. Cocok untuk casual dan formal.',
 89000, NULL, 200, 200),
(2, 'Jaket Bomber Waterproof Wanita', 'jaket-bomber-wanita',
 'Jaket wanita bahan parasut waterproof, inner fleece hangat, tersedia ukuran S/M/L/XL.',
 350000, 310000, 75, 500),
(2, 'Celana Chino Slim Fit Pria', 'celana-chino-slim-fit',
 'Celana chino bahan kanvas stretch, potongan slim fit untuk tampilan rapi dan modern.',
 210000, NULL, 100, 400),

-- Buku
(3, 'Buku: PHP & MySQL untuk Pemula', 'buku-php-mysql-pemula',
 'Panduan lengkap pemrograman web dengan PHP dan MySQL, cocok untuk pemula. Disertai 50 contoh program praktis.',
 95000, NULL, 50, 350),
(3, 'Novel: Laskar Pelangi (Andrea Hirata)', 'novel-laskar-pelangi',
 'Novel bestseller karya Andrea Hirata tentang perjuangan anak-anak Belitung meraih pendidikan. Cover baru edisi 2024.',
 75000, 65000, 35, 250),

-- Perabot Rumah
(4, 'Kursi Kerja Ergonomis Mesh', 'kursi-kerja-ergonomis',
 'Kursi kantor ergonomis bahan mesh breathable, sandaran kepala adjustable, roda smooth untuk berbagai lantai.',
 1250000, 1100000, 12, 8000),
(4, 'Meja Belajar Lipat Minimalis', 'meja-belajar-lipat',
 'Meja belajar multifungsi yang bisa dilipat, cocok untuk ruangan kecil. Dilengkapi laci kecil untuk penyimpanan.',
 450000, NULL, 20, 5200),

-- Olahraga
(5, 'Sepatu Lari Nike Air Max 270', 'sepatu-lari-nike-air-max',
 'Sepatu lari premium Nike dengan teknologi Air Max di sol, ringan dan nyaman untuk lari jarak jauh.',
 850000, 750000, 40, 720),
(5, 'Raket Badminton Yonex Astrox 88S', 'raket-yonex-astrox-88s',
 'Raket badminton profesional Yonex Astrox seri 88S, cocok untuk pemain smash power. Sudah termasuk tas raket.',
 320000, NULL, 25, 130);

-- Data Pesanan dan Detail
INSERT INTO pesanan (id_user, kode_pesanan, nama_penerima, no_hp_penerima, alamat_pengiriman, kota_tujuan, kode_pos, metode_bayar, subtotal, ongkir, total, status) VALUES
(2, 'TK-20250101-0001', 'Andi Setiawan', '081234567890', 'Jl. Merdeka No.1', 'Jakarta', '10110', 'transfer_bca', 7349000, 15000, 7364000, 'selesai'),
(3, 'TK-20250105-0002', 'Budi Santoso',  '082345678901', 'Jl. Sudirman No.22', 'Bandung', '40115', 'qris', 388000, 12000, 400000, 'selesai'),
(4, 'TK-20250110-0003', 'Citra Dewi',    '083456789012', 'Jl. Pahlawan No.5', 'Surabaya', '60118', 'transfer_mandiri', 4200000, 20000, 4220000, 'dikirim'),
(5, 'TK-20250115-0004', 'Dina Rahayu',   '084567890123', 'Jl. Gajah Mada No.10', 'Yogyakarta', '55122', 'cod', 160000, 8000, 168000, 'diproses'),
(6, 'TK-20250120-0005', 'Eko Prasetyo',  '085678901234', 'Jl. Diponegoro No.7', 'Semarang', '50241', 'transfer_bca', 1100000, 18000, 1118000, 'menunggu');

INSERT INTO detail_pesanan (id_pesanan, id_produk, nama_produk, harga_produk, jumlah, subtotal) VALUES
-- Pesanan 1: Laptop + Earphone
(1, 1, 'Laptop ASUS VivoBook 15',     6999000, 1, 6999000),
(1, 3, 'TWS Earphone Bluetooth JBL',   350000, 1,  350000),
-- Pesanan 2: Earphone + Kaos x2
(2, 3, 'TWS Earphone Bluetooth JBL',  299000, 1,  299000),
(2, 5, 'Kaos Polos Premium Pria',      89000, 1,   89000),
-- Pesanan 3: Samsung A54
(3, 2, 'Smartphone Samsung A54',     4200000, 1, 4200000),
-- Pesanan 4: 2 Buku
(4, 8, 'Buku PHP & MySQL',            95000, 1,  95000),
(4, 9, 'Novel Laskar Pelangi',        65000, 1,  65000),
-- Pesanan 5: Kursi Kerja
(5, 10, 'Kursi Kerja Ergonomis Mesh', 1100000, 1, 1100000);

-- ============================================================
-- SECTION 3: USEFUL QUERIES
-- ============================================================

-- Lihat semua produk dengan kategorinya
-- SELECT p.nama, p.harga, k.nama AS kategori FROM produk p JOIN kategori k ON p.id_kategori = k.id;

-- Lihat pesanan beserta nama pelanggan
-- SELECT ps.kode_pesanan, u.nama, ps.total, ps.status FROM pesanan ps JOIN users u ON ps.id_user = u.id ORDER BY ps.created_at DESC;

-- Hitung total penjualan per kategori
-- SELECT k.nama AS kategori, SUM(dp.subtotal) AS total_penjualan FROM detail_pesanan dp JOIN produk p ON dp.id_produk = p.id JOIN kategori k ON p.id_kategori = k.id GROUP BY k.nama;
