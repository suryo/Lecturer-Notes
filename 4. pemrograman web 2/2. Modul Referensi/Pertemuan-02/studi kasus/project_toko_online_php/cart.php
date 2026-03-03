<?php
require_once __DIR__ . '/config/helpers.php';

$db = getDB();

// ---- Tambah ke cart ----
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'add') {
    $idProduk = (int)$_POST['id_produk'];
    $jumlah   = max(1, (int)($_POST['jumlah'] ?? 1));
    $userId   = $_SESSION['user_id'];

    $stmt = $db->prepare("
        INSERT INTO cart (id_user, id_produk, jumlah)
        VALUES (:u, :p, :j)
        ON DUPLICATE KEY UPDATE jumlah = jumlah + :j2
    ");
    $stmt->execute([':u'=>$userId, ':p'=>$idProduk, ':j'=>$jumlah, ':j2'=>$jumlah]);
    setFlash('success', '✅ Produk ditambahkan ke keranjang!');
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'produk.php')); exit;
}

// ---- Update qty ----
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update') {
    $idCart = (int)$_POST['id_cart'];
    $jumlah = max(1, (int)$_POST['jumlah']);
    $db->prepare("UPDATE cart SET jumlah = ? WHERE id = ? AND id_user = ?")->execute([$jumlah, $idCart, $_SESSION['user_id']]);
    header('Location: cart.php'); exit;
}

// ---- Hapus item ----
if (isset($_GET['hapus'])) {
    $db->prepare("DELETE FROM cart WHERE id = ? AND id_user = ?")->execute([(int)$_GET['hapus'], $_SESSION['user_id']]);
    header('Location: cart.php'); exit;
}

// ---- Tampilkan keranjang ----
$items = $db->prepare("
    SELECT c.id, c.jumlah, p.id AS id_produk, p.nama, p.foto,
           COALESCE(p.harga_diskon, p.harga) AS harga_efektif
    FROM cart c JOIN produk p ON c.id_produk = p.id
    WHERE c.id_user = ?
");
$items->execute([$_SESSION['user_id']]);
$items = $items->fetchAll();

$subtotal = array_sum(array_map(fn($i) => $i['harga_efektif'] * $i['jumlah'], $items));
$ongkir   = 15000;
$total    = $subtotal + $ongkir;
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang Belanja — <?= APP_NAME ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container py-5">
  <h2 class="fw-bold mb-4">🛒 Keranjang Belanja</h2>

  <?php $flash = getFlash(); if ($flash): ?>
  <div class="alert alert-<?= $flash['type'] === 'success' ? 'success' : 'danger' ?> alert-dismissible fade show">
    <?= $flash['msg'] ?> <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <?php endif; ?>

  <?php if (empty($items)): ?>
  <div class="text-center py-5">
    <div style="font-size:5rem">🛒</div>
    <h4 class="mt-3">Keranjang Masih Kosong</h4>
    <a href="produk.php" class="btn btn-primary mt-3">Mulai Belanja</a>
  </div>
  <?php else: ?>
  <div class="row g-4">
    <div class="col-lg-8">
      <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
          <table class="table align-middle mb-0">
            <thead class="table-light">
              <tr><th>Produk</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th><th></th></tr>
            </thead>
            <tbody>
              <?php foreach ($items as $item): ?>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <img src="uploads/produk/<?= $item['foto'] ?>" style="width:60px; height:60px; object-fit:cover; border-radius:8px">
                    <span class="fw-semibold"><?= sanitize($item['nama']) ?></span>
                  </div>
                </td>
                <td><?= rupiah($item['harga_efektif']) ?></td>
                <td style="width:110px">
                  <form method="post">
                    <input type="hidden" name="action"  value="update">
                    <input type="hidden" name="id_cart" value="<?= $item['id'] ?>">
                    <div class="input-group input-group-sm">
                      <button type="submit" name="jumlah" value="<?= $item['jumlah'] - 1 ?>" class="btn btn-outline-secondary">−</button>
                      <span class="form-control text-center"><?= $item['jumlah'] ?></span>
                      <button type="submit" name="jumlah" value="<?= $item['jumlah'] + 1 ?>" class="btn btn-outline-secondary">+</button>
                    </div>
                  </form>
                </td>
                <td class="fw-bold"><?= rupiah($item['harga_efektif'] * $item['jumlah']) ?></td>
                <td><a href="cart.php?hapus=<?= $item['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus item ini?')">🗑</a></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="checkout-summary">
        <h5 class="fw-bold mb-3">Ringkasan Belanja</h5>
        <div class="d-flex justify-content-between mb-2"><span>Subtotal</span><strong><?= rupiah($subtotal) ?></strong></div>
        <div class="d-flex justify-content-between mb-2"><span>Ongkir (estimasi)</span><strong><?= rupiah($ongkir) ?></strong></div>
        <div class="d-flex justify-content-between total-row"><span>Total</span><strong class="text-primary"><?= rupiah($total) ?></strong></div>
        <a href="checkout.php" class="btn btn-primary w-100 mt-3 fw-bold">Lanjut Checkout →</a>
        <a href="produk.php"   class="btn btn-outline-secondary w-100 mt-2">← Lanjut Belanja</a>
      </div>
    </div>
  </div>
  <?php endif; ?>
</div>
<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
