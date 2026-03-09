-- ============================================================
-- STUDI KASUS: TOKO ONLINE
-- File 2: Insert Data (Data Dummy)
-- ============================================================

USE toko_online;

-- ============================================================
-- INSERT DATA KATEGORI
-- ============================================================
INSERT INTO kategori (nama_kategori, deskripsi) VALUES
('Elektronik',      'Produk elektronik dan gadget'),
('Pakaian',         'Pakaian pria dan wanita'),
('Buku',            'Buku pelajaran, novel, dan komik'),
('Perabot Rumah',   'Furnitur dan perlengkapan rumah tangga'),
('Olahraga',        'Peralatan dan perlengkapan olahraga');

-- ============================================================
-- INSERT DATA PELANGGAN
-- ============================================================
INSERT INTO pelanggan (nama, email, no_telepon, alamat, kota) VALUES
('Andi Setiawan',    'andi@email.com',    '081234567890', 'Jl. Merdeka No.1',     'Jakarta'),
('Budi Santoso',     'budi@email.com',    '082345678901', 'Jl. Sudirman No.22',   'Bandung'),
('Citra Dewi',       'citra@email.com',   '083456789012', 'Jl. Pahlawan No.5',    'Surabaya'),
('Dina Rahayu',      'dina@email.com',    '084567890123', 'Jl. Gajah Mada No.10', 'Yogyakarta'),
('Eko Prasetyo',     'eko@email.com',     '085678901234', 'Jl. Diponegoro No.7',  'Semarang'),
('Fitri Handayani',  'fitri@email.com',   '086789012345', 'Jl. Ahmad Yani No.3',  'Malang'),
('Galih Wicaksono',  'galih@email.com',   '087890123456', 'Jl. Veteran No.15',    'Jakarta'),
('Hani Kusuma',      'hani@email.com',    '088901234567', 'Jl. Imam Bonjol No.8', 'Bandung'),
('Irfan Maulana',    'irfan@email.com',   '089012345678', 'Jl. Kartini No.11',    'Surabaya'),
('Jeni Aprilia',     'jeni@email.com',    '081122334455', 'Jl. Raya Utama No.20', 'Medan');

-- ============================================================
-- INSERT DATA PRODUK
-- ============================================================
INSERT INTO produk (id_kategori, nama_produk, harga, stok, berat_gram) VALUES
-- Elektronik (id_kategori=1)
(1, 'Laptop ASUS VivoBook 15',  7500000, 20, 1800),
(1, 'Smartphone Samsung A54',   4200000, 50, 190),
(1, 'Earphone Bluetooth JBL',     350000, 100, 50),
(1, 'Keyboard Mechanical',        650000, 35, 900),
-- Pakaian (id_kategori=2)
(2, 'Kaos Polos Pria L',           89000, 200, 200),
(2, 'Jaket Bomber Wanita',        350000, 80, 500),
(2, 'Celana Chino Pria',          210000, 120, 400),
-- Buku (id_kategori=3)
(3, 'Buku SQL: Fundamental',       95000, 60, 300),
(3, 'Novel Laskar Pelangi',        75000, 40, 250),
-- Perabot Rumah (id_kategori=4)
(4, 'Kursi Kerja Ergonomis',     1250000, 15, 8000),
(4, 'Meja Belajar Lipat',         450000, 25, 5000),
-- Olahraga (id_kategori=5)
(5, 'Sepatu Lari Nike Run',       850000, 45, 700),
(5, 'Raket Bulutangkis Yonex',    320000, 30, 120);

-- ============================================================
-- INSERT DATA PESANAN
-- ============================================================
INSERT INTO pesanan (id_pelanggan, tanggal_pesanan, status, total_harga, alamat_pengiriman) VALUES
(1,  '2025-01-05 10:00:00', 'selesai',    7850000, 'Jl. Merdeka No.1, Jakarta'),
(2,  '2025-01-10 11:30:00', 'selesai',     440000, 'Jl. Sudirman No.22, Bandung'),
(3,  '2025-01-15 14:00:00', 'dikirim',    8450000, 'Jl. Pahlawan No.5, Surabaya'),
(4,  '2025-02-01 09:00:00', 'selesai',     170000, 'Jl. Gajah Mada No.10, Yogyakarta'),
(5,  '2025-02-14 13:00:00', 'diproses',  1250000, 'Jl. Diponegoro No.7, Semarang'),
(6,  '2025-02-20 16:00:00', 'selesai',    4550000, 'Jl. Ahmad Yani No.3, Malang'),
(7,  '2025-03-01 08:00:00', 'menunggu',   650000, 'Jl. Veteran No.15, Jakarta'),
(8,  '2025-03-05 10:30:00', 'dibatalkan', 350000, 'Jl. Imam Bonjol No.8, Bandung'),
(9,  '2025-03-10 15:00:00', 'selesai',    1700000, 'Jl. Kartini No.11, Surabaya'),
(10, '2025-03-15 12:00:00', 'dikirim',    850000, 'Jl. Raya Utama No.20, Medan');

-- ============================================================
-- INSERT DATA DETAIL PESANAN
-- ============================================================
INSERT INTO detail_pesanan (id_pesanan, id_produk, jumlah, harga_satuan) VALUES
-- Pesanan 1: Laptop + Earphone
(1, 1, 1, 7500000),
(1, 3, 1, 350000),
-- Pesanan 2: Kaos + Raket
(2, 5, 2, 89000),
(2, 13, 1, 320000),
-- Pesanan 3: Laptop + Smartphone
(3, 1, 1, 7500000),
(3, 2, 1, 950000),
-- Pesanan 4: 2 buku
(4, 8, 1, 95000),
(4, 9, 1, 75000),
-- Pesanan 5: Kursi Kerja
(5, 10, 1, 1250000),
-- Pesanan 6: Smartphone
(6, 2, 1, 4200000),
(6, 3, 1, 350000),
-- Pesanan 7: Keyboard
(7, 4, 1, 650000),
-- Pesanan 8: Earphone
(8, 3, 1, 350000),
-- Pesanan 9: Meja + Sepatu
(9, 11, 1, 450000),
(9, 12, 1, 850000),
-- Pesanan 10: Sepatu Lari
(10, 12, 1, 850000);
