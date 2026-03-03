<?php
require_once __DIR__ . '/config/helpers.php';

$db = getDB();

// Ambil produk terbaru (8 produk)
$produkTerbaru = $db->query("
    SELECT p.*, k.nama AS kategori
    FROM produk p JOIN kategori k ON p.id_kategori = k.id
    WHERE p.status = 'aktif'
    ORDER BY p.created_at DESC LIMIT 8
")->fetchAll();

// Flash message
$flash = getFlash();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= APP_NAME ?> — Belanja Mudah, Harga Pasti</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<?php if ($flash): ?>
<div class="container mt-3">
  <div class="alert alert-<?= $flash['type'] === 'success' ? 'success' : 'danger' ?> alert-dismissible fade show">
    <?= $flash['msg'] ?> <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
</div>
<?php endif; ?>

<!-- HERO -->
<section class="hero">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h1>Belanja Mudah,<br>Harga Pasti! 🛍️</h1>
        <p class="my-4">Temukan ribuan produk pilihan dengan harga terbaik. Pengiriman cepat ke seluruh Indonesia!</p>
        <a href="produk.php" class="btn btn-warning btn-lg fw-bold">Belanja Sekarang</a>
      </div>
    </div>
  </div>
</section>

<!-- KATEGORI -->
<section class="py-5">
  <div class="container">
    <h2 class="section-title text-center">Belanja per Kategori</h2>
    <div class="d-flex flex-wrap gap-3 justify-content-center">
      <a href="produk.php" class="category-chip">🛍️ Semua</a>
      <?php
      $kategori = $db->query("SELECT * FROM kategori ORDER BY nama")->fetchAll();
      foreach ($kategori as $k):
      ?>
      <a href="produk.php?kategori=<?= $k['slug'] ?>" class="category-chip"><?= $k['ikon'] . ' ' . $k['nama'] ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- PRODUK TERBARU -->
<section class="py-4">
  <div class="container">
    <h2 class="section-title">Produk Terbaru</h2>
    <p class="section-sub">Pilihan fresh untuk kamu</p>
    <div class="row g-4">
      <?php foreach ($produkTerbaru as $p): ?>
      <div class="col-sm-6 col-md-4 col-lg-3 product-card-wrapper">
        <div class="product-card">
          <img src="uploads/produk/<?= $p['foto'] ?>" alt="<?= sanitize($p['nama']) ?>">
          <div class="card-body">
            <small class="text-muted"><?= $p['kategori'] ?></small>
            <h6 class="product-name mt-1"><?= sanitize($p['nama']) ?></h6>
            <div class="price"><?= rupiah($p['harga_diskon'] ?? $p['harga']) ?></div>
            <?php if ($p['harga_diskon']): ?>
            <small class="price-old"><?= rupiah($p['harga']) ?></small>
            <span class="badge-discount ms-1">-<?= round((1 - $p['harga_diskon']/$p['harga'])*100) ?>%</span>
            <?php endif; ?>
            <div class="d-grid mt-2 gap-1">
              <a href="detail.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
              <form method="post" action="cart.php">
                <input type="hidden" name="id_produk" value="<?= $p['id'] ?>">
                <input type="hidden" name="jumlah" value="1">
                <button class="btn btn-cart btn-sm w-100">+ Keranjang</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
      <a href="produk.php" class="btn btn-outline-primary px-4">Lihat Semua Produk →</a>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
