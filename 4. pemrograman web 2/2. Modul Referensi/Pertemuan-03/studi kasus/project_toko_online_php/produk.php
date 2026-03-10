<?php
require_once __DIR__ . '/config/helpers.php';

$db = getDB();

// Filter & Pencarian
$kategoriSlug = $_GET['kategori'] ?? '';
$cari         = trim($_GET['cari'] ?? '');
$page         = max(1, (int)($_GET['page'] ?? 1));
$perPage      = 12;
$offset       = ($page - 1) * $perPage;

// Query dengan filter
$where  = ["p.status = 'aktif'"];
$params = [];

if ($kategoriSlug) {
    $where[]  = "k.slug = :slug";
    $params[':slug'] = $kategoriSlug;
}
if ($cari) {
    $where[]  = "p.nama LIKE :cari";
    $params[':cari'] = "%$cari%";
}

$whereSQL = implode(' AND ', $where);

// Hitung total
$stmtCount = $db->prepare("SELECT COUNT(*) FROM produk p JOIN kategori k ON p.id_kategori=k.id WHERE $whereSQL");
$stmtCount->execute($params);
$total     = $stmtCount->fetchColumn();
$totalPage = ceil($total / $perPage);

// Ambil produk
$sort = match($_GET['sort'] ?? '') {
    'harga_asc'  => 'p.harga ASC',
    'harga_desc' => 'p.harga DESC',
    'terlaris'   => 'p.terjual DESC',
    default      => 'p.created_at DESC'
};

$stmt = $db->prepare("
    SELECT p.*, k.nama AS kategori, k.slug AS kat_slug
    FROM produk p JOIN kategori k ON p.id_kategori = k.id
    WHERE $whereSQL ORDER BY $sort LIMIT $perPage OFFSET $offset
");
$stmt->execute($params);
$produk = $stmt->fetchAll();

// Semua Kategori (untuk sidebar)
$kategoriList = $db->query("SELECT * FROM kategori ORDER BY nama")->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk — <?= APP_NAME ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include 'includes/navbar.php'; ?>

<div class="container py-5">
  <div class="row">

    <!-- Sidebar Filter -->
    <div class="col-md-3">
      <div class="card border-0 shadow-sm p-3">
        <h6 class="fw-bold mb-3">🔍 Cari Produk</h6>
        <form method="get">
          <div class="input-group mb-4">
            <input type="text" name="cari" class="form-control" placeholder="Nama produk..." value="<?= sanitize($cari) ?>">
            <button class="btn btn-primary">Cari</button>
          </div>

          <h6 class="fw-bold mb-2">📂 Kategori</h6>
          <div class="d-flex flex-column gap-2 mb-4">
            <a href="produk.php" class="category-chip <?= !$kategoriSlug ? 'active' : '' ?>">🛍️ Semua</a>
            <?php foreach ($kategoriList as $k): ?>
            <a href="produk.php?kategori=<?= $k['slug'] ?>" class="category-chip <?= $kategoriSlug === $k['slug'] ? 'active' : '' ?>">
              <?= $k['ikon'] . ' ' . $k['nama'] ?>
            </a>
            <?php endforeach; ?>
          </div>
        </form>
      </div>
    </div>

    <!-- Product Grid -->
    <div class="col-md-9">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Menampilkan <strong><?= count($produk) ?></strong> dari <strong><?= $total ?></strong> produk</span>
        <form method="get" class="d-flex gap-2">
          <?php if ($cari): ?><input type="hidden" name="cari" value="<?= sanitize($cari) ?>"><?php endif; ?>
          <?php if ($kategoriSlug): ?><input type="hidden" name="kategori" value="<?= $kategoriSlug ?>"><?php endif; ?>
          <select name="sort" class="form-select form-select-sm" onchange="this.form.submit()">
            <option value="">Terbaru</option>
            <option value="harga_asc"  <?= ($_GET['sort']??'')==='harga_asc'  ? 'selected':'' ?>>Harga Terendah</option>
            <option value="harga_desc" <?= ($_GET['sort']??'')==='harga_desc' ? 'selected':'' ?>>Harga Tertinggi</option>
            <option value="terlaris"   <?= ($_GET['sort']??'')==='terlaris'   ? 'selected':'' ?>>Terlaris</option>
          </select>
        </form>
      </div>

      <?php if (empty($produk)): ?>
      <div class="text-center py-5 text-muted">
        <div style="font-size:4rem">🔍</div>
        <h5>Produk tidak ditemukan</h5>
        <a href="produk.php" class="btn btn-outline-primary mt-2">Lihat Semua Produk</a>
      </div>
      <?php else: ?>
      <div class="row g-4">
        <?php foreach ($produk as $p): ?>
        <div class="col-sm-6 col-lg-4 product-card-wrapper">
          <div class="product-card">
            <img src="uploads/produk/<?= $p['foto'] ?>" alt="<?= sanitize($p['nama']) ?>">
            <div class="card-body">
              <small class="text-muted"><?= $p['kategori'] ?></small>
              <h6 class="product-name mt-1"><?= sanitize($p['nama']) ?></h6>
              <div class="price"><?= rupiah($p['harga_diskon'] ?? $p['harga']) ?></div>
              <?php if ($p['harga_diskon']): ?>
              <small class="price-old"><?= rupiah($p['harga']) ?></small>
              <?php endif; ?>
              <div class="d-grid mt-2 gap-1">
                <a href="detail.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
                <form method="post" action="cart.php">
                  <input type="hidden" name="id_produk" value="<?= $p['id'] ?>">
                  <input type="hidden" name="action"    value="add">
                  <button class="btn btn-cart btn-sm w-100">+ Keranjang</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Pagination -->
      <?php if ($totalPage > 1): ?>
      <nav class="mt-4">
        <ul class="pagination justify-content-center">
          <?php for ($i = 1; $i <= $totalPage; $i++): ?>
          <li class="page-item <?= $i === $page ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?><?= $kategoriSlug ? '&kategori='.$kategoriSlug : '' ?><?= $cari ? '&cari='.urlencode($cari) : '' ?>"><?= $i ?></a>
          </li>
          <?php endfor; ?>
        </ul>
      </nav>
      <?php endif; ?>
      <?php endif; ?>
    </div>

  </div>
</div>

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
