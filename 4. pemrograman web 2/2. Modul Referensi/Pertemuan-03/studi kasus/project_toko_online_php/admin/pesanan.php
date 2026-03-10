<?php
require_once __DIR__ . '/../config/helpers.php';
requireAdmin();
$db = getDB();

// ---- UPDATE STATUS ----
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $idPesanan = (int)$_POST['id_pesanan'];
    $newStatus = $_POST['status'];
    $allowed   = ['menunggu','dibayar','diproses','dikirim','selesai','dibatalkan'];
    if (in_array($newStatus, $allowed)) {
        $db->prepare("UPDATE pesanan SET status=? WHERE id=?")->execute([$newStatus, $idPesanan]);
    }
    header('Location: pesanan.php?id=' . $idPesanan . '&ok=status'); exit;
}

// ---- DETAIL PESANAN ----
$detailId    = (int)($_GET['id'] ?? 0);
$detailData  = null;
$detailItems = [];

if ($detailId) {
    $s = $db->prepare("SELECT ps.*, u.nama AS nama_user, u.email FROM pesanan ps JOIN users u ON ps.id_user=u.id WHERE ps.id=?");
    $s->execute([$detailId]);
    $detailData = $s->fetch();

    if ($detailData) {
        $si = $db->prepare("SELECT dp.*, p.foto FROM detail_pesanan dp LEFT JOIN produk p ON dp.id_produk=p.id WHERE dp.id_pesanan=?");
        $si->execute([$detailId]);
        $detailItems = $si->fetchAll();
    }
}

// ---- FILTER LIST ----
$filterStatus = $_GET['status'] ?? '';
$filterCari   = sanitize($_GET['cari'] ?? '');

$where  = ['1=1'];
$params = [];

if ($filterStatus) { $where[] = "ps.status = :status"; $params[':status'] = $filterStatus; }
if ($filterCari)   { $where[] = "(ps.kode_pesanan LIKE :q OR u.nama LIKE :q2)"; $params[':q'] = "%$filterCari%"; $params[':q2'] = "%$filterCari%"; }

$whereSQL = implode(' AND ', $where);
$stmt = $db->prepare("
    SELECT ps.*, u.nama AS nama_pelanggan
    FROM pesanan ps JOIN users u ON ps.id_user = u.id
    WHERE $whereSQL ORDER BY ps.created_at DESC
");
$stmt->execute($params);
$pesananList = $stmt->fetchAll();

// Count per status
$countByStatus = [];
foreach ($db->query("SELECT status, COUNT(*) as n FROM pesanan GROUP BY status")->fetchAll() as $row) {
    $countByStatus[$row['status']] = $row['n'];
}
$statusList = ['menunggu','dibayar','diproses','dikirim','selesai','dibatalkan'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Pesanan — <?= APP_NAME ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- Sidebar -->
<div class="admin-sidebar">
  <div class="brand">🛒 <?= APP_NAME ?> Admin</div>
  <nav class="mt-3">
    <a href="index.php"   class="nav-link">📊 Dashboard</a>
    <a href="produk.php"  class="nav-link">📦 Produk</a>
    <a href="pesanan.php" class="nav-link active">🧾 Pesanan</a>
    <a href="member.php"  class="nav-link">👥 Member</a>
    <hr style="border-color:rgba(255,255,255,.1);margin:.5rem 1.5rem;">
    <a href="<?= BASE_URL ?>/index.php"         class="nav-link">🏠 Lihat Toko</a>
    <a href="<?= BASE_URL ?>/auth.php?logout=1" class="nav-link" style="color:#f87171">🚪 Logout</a>
  </nav>
</div>

<div class="admin-content">

  <?php if (isset($_GET['ok'])): ?>
  <div class="alert alert-success alert-dismissible fade show">
    ✅ Status pesanan berhasil diupdate!
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <?php endif; ?>

  <?php if ($detailData): ?>
  <!-- ===== DETAIL PESANAN ===== -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">🧾 Detail Pesanan: <code><?= $detailData['kode_pesanan'] ?></code></h4>
    <a href="pesanan.php" class="btn btn-outline-secondary btn-sm">← Kembali ke Daftar</a>
  </div>

  <div class="row g-4">
    <div class="col-lg-7">
      <!-- Info Pelanggan -->
      <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
          <h6 class="fw-bold mb-3">👤 Info Pelanggan & Pengiriman</h6>
          <table class="table table-sm mb-0">
            <tr><td class="text-muted" style="width:140px">Pelanggan</td><td><strong><?= sanitize($detailData['nama_user']) ?></strong> (<?= $detailData['email'] ?>)</td></tr>
            <tr><td class="text-muted">Penerima</td><td><?= sanitize($detailData['nama_penerima']) ?> · <?= $detailData['no_hp_penerima'] ?></td></tr>
            <tr><td class="text-muted">Alamat</td><td><?= sanitize($detailData['alamat_pengiriman']) ?>, <?= $detailData['kota_tujuan'] ?> <?= $detailData['kode_pos'] ?></td></tr>
            <tr><td class="text-muted">Metode Bayar</td><td><?= strtoupper(str_replace('_', ' ', $detailData['metode_bayar'])) ?></td></tr>
            <tr><td class="text-muted">Tanggal</td><td><?= date('d M Y, H:i', strtotime($detailData['created_at'])) ?></td></tr>
            <?php if ($detailData['catatan']): ?>
            <tr><td class="text-muted">Catatan</td><td><?= sanitize($detailData['catatan']) ?></td></tr>
            <?php endif; ?>
          </table>
        </div>
      </div>

      <!-- Item Pesanan -->
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="fw-bold mb-3">📦 Item Pesanan</h6>
          <table class="table table-sm align-middle">
            <thead class="table-light">
              <tr><th>Produk</th><th class="text-center">Qty</th><th class="text-end">Harga</th><th class="text-end">Subtotal</th></tr>
            </thead>
            <tbody>
              <?php foreach ($detailItems as $item): ?>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    <img src="../uploads/produk/<?= $item['foto'] ?? 'default.jpg' ?>"
                         style="width:40px;height:40px;object-fit:cover;border-radius:6px"
                         onerror="this.src='https://via.placeholder.com/40?text=?'">
                    <span><?= sanitize($item['nama_produk']) ?></span>
                  </div>
                </td>
                <td class="text-center"><?= $item['jumlah'] ?></td>
                <td class="text-end"><?= rupiah($item['harga_produk']) ?></td>
                <td class="text-end fw-bold"><?= rupiah($item['subtotal']) ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot class="table-light">
              <tr><td colspan="3" class="text-end">Subtotal</td><td class="text-end fw-bold"><?= rupiah($detailData['subtotal']) ?></td></tr>
              <tr><td colspan="3" class="text-end">Ongkir</td><td class="text-end"><?= rupiah($detailData['ongkir']) ?></td></tr>
              <tr><td colspan="3" class="text-end fw-bold fs-6">Total</td><td class="text-end fw-bold fs-6 text-primary"><?= rupiah($detailData['total']) ?></td></tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <!-- Update Status -->
      <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
          <h6 class="fw-bold mb-3">🔄 Update Status Pesanan</h6>
          <div class="mb-3">
            Status saat ini: &nbsp;
            <span class="status-badge status-<?= $detailData['status'] ?>"><?= ucfirst($detailData['status']) ?></span>
          </div>
          <form method="post">
            <input type="hidden" name="update_status"  value="1">
            <input type="hidden" name="id_pesanan"     value="<?= $detailData['id'] ?>">
            <div class="mb-3">
              <label class="form-label fw-semibold">Status Baru</label>
              <select name="status" class="form-select">
                <?php foreach (['menunggu','dibayar','diproses','dikirim','selesai','dibatalkan'] as $s): ?>
                <option value="<?= $s ?>" <?= $detailData['status'] === $s ? 'selected' : '' ?>><?= ucfirst($s) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <button class="btn btn-primary w-100">💾 Update Status</button>
          </form>
        </div>
      </div>

      <!-- Bukti Bayar -->
      <?php if ($detailData['bukti_bayar']): ?>
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="fw-bold mb-2">🧾 Bukti Pembayaran</h6>
          <img src="../uploads/bukti/<?= $detailData['bukti_bayar'] ?>" class="img-fluid rounded" alt="Bukti Bayar">
        </div>
      </div>
      <?php else: ?>
      <div class="card border-0 shadow-sm">
        <div class="card-body text-center text-muted py-4">
          Belum ada bukti pembayaran diunggah.
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>

  <?php else: ?>
  <!-- ===== DAFTAR PESANAN ===== -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">🧾 Kelola Pesanan</h4>
    <span class="text-muted small">Total: <strong><?= count($pesananList) ?></strong> pesanan</span>
  </div>

  <!-- Filter Status Tabs -->
  <div class="mb-3 d-flex gap-2 flex-wrap">
    <a href="pesanan.php" class="btn btn-sm <?= !$filterStatus ? 'btn-primary' : 'btn-outline-secondary' ?>">
      Semua <span class="badge bg-white text-dark ms-1"><?= array_sum($countByStatus) ?></span>
    </a>
    <?php foreach ($statusList as $s):
      $colors = ['menunggu'=>'warning','dibayar'=>'info','diproses'=>'purple text-white','dikirim'=>'success','selesai'=>'success','dibatalkan'=>'danger'];
      $col = $filterStatus === $s ? 'primary' : 'outline-secondary';
    ?>
    <a href="pesanan.php?status=<?= $s ?>" class="btn btn-sm btn-<?= $col ?>">
      <?= ucfirst($s) ?>
      <?php if (!empty($countByStatus[$s])): ?>
      <span class="badge bg-white text-dark ms-1"><?= $countByStatus[$s] ?></span>
      <?php endif; ?>
    </a>
    <?php endforeach; ?>
  </div>

  <!-- Search -->
  <div class="card border-0 shadow-sm mb-3">
    <div class="card-body py-2">
      <form method="get" class="d-flex gap-2">
        <?php if ($filterStatus): ?><input type="hidden" name="status" value="<?= $filterStatus ?>"><?php endif; ?>
        <input type="text" name="cari" class="form-control" placeholder="Cari kode pesanan atau nama pelanggan..." value="<?= $filterCari ?>">
        <button class="btn btn-primary">Cari</button>
        <?php if ($filterCari): ?><a href="pesanan.php<?= $filterStatus ? '?status='.$filterStatus : '' ?>" class="btn btn-outline-secondary">Reset</a><?php endif; ?>
      </form>
    </div>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr><th>Kode Pesanan</th><th>Pelanggan</th><th>Total</th><th>Pembayaran</th><th>Status</th><th>Tanggal</th><th class="text-center">Aksi</th></tr>
          </thead>
          <tbody>
            <?php if (empty($pesananList)): ?>
            <tr><td colspan="7" class="text-center py-4 text-muted">Tidak ada pesanan ditemukan.</td></tr>
            <?php endif; ?>
            <?php foreach ($pesananList as $p): ?>
            <tr>
              <td><code class="text-primary"><?= $p['kode_pesanan'] ?></code></td>
              <td><?= sanitize($p['nama_pelanggan']) ?></td>
              <td class="fw-bold"><?= rupiah($p['total']) ?></td>
              <td><small><?= strtoupper(str_replace('_', ' ', $p['metode_bayar'])) ?></small></td>
              <td><span class="status-badge status-<?= $p['status'] ?>"><?= ucfirst($p['status']) ?></span></td>
              <td><small><?= date('d M Y', strtotime($p['created_at'])) ?></small></td>
              <td class="text-center">
                <a href="pesanan.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-primary">🔍 Detail</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php endif; ?>

</div><!-- admin-content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
