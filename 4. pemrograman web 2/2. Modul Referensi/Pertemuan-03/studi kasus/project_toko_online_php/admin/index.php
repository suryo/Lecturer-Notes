<?php
require_once __DIR__ . '/../config/helpers.php';

requireAdmin();
$db = getDB();

// Statistik
$totalRevenue = $db->query("SELECT SUM(total) FROM pesanan WHERE status NOT IN ('dibatalkan','menunggu_bayar')")->fetchColumn();
$totalPesanan = $db->query("SELECT COUNT(*) FROM pesanan WHERE MONTH(created_at)=MONTH(NOW())")->fetchColumn();
$totalProduk  = $db->query("SELECT COUNT(*) FROM produk WHERE status='aktif'")->fetchColumn();
$totalMember  = $db->query("SELECT COUNT(*) FROM users WHERE role='member'")->fetchColumn();

// Pesanan terbaru
$pesananTerbaru = $db->query("
    SELECT ps.*, u.nama AS nama_pelanggan
    FROM pesanan ps JOIN users u ON ps.id_user = u.id
    ORDER BY ps.created_at DESC LIMIT 10
")->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin — <?= APP_NAME ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- Admin Sidebar -->
<div class="admin-sidebar">
  <div class="brand">🛒 <?= APP_NAME ?> Admin</div>
  <nav class="mt-3">
    <a href="index.php"   class="nav-link active">📊 Dashboard</a>
    <a href="produk.php"  class="nav-link">📦 Produk</a>
    <a href="pesanan.php" class="nav-link">🧾 Pesanan</a>
    <a href="member.php"  class="nav-link">👥 Member</a>
    <hr style="border-color:rgba(255,255,255,.1); margin:.5rem 1.5rem;">
    <a href="<?= BASE_URL ?>/index.php" class="nav-link">🏠 Lihat Toko</a>
    <a href="<?= BASE_URL ?>/auth.php?logout=1" class="nav-link text-danger">🚪 Logout</a>
  </nav>
</div>

<div class="admin-content">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Dashboard</h4>
    <span class="text-muted small">Hai, <?= sanitize($_SESSION['user_nama']) ?>!</span>
  </div>

  <!-- Stat Cards -->
  <div class="row g-4 mb-4">
    <div class="col-md-3">
      <div class="stat-card">
        <div class="stat-number text-primary"><?= rupiah((float)$totalRevenue) ?></div>
        <div class="stat-label">Total Revenue</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat-card" style="border-left-color:#10b981">
        <div class="stat-number" style="color:#10b981"><?= $totalPesanan ?></div>
        <div class="stat-label">Pesanan Bulan Ini</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat-card" style="border-left-color:#f59e0b">
        <div class="stat-number" style="color:#f59e0b"><?= $totalProduk ?></div>
        <div class="stat-label">Produk Aktif</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat-card" style="border-left-color:#8b5cf6">
        <div class="stat-number" style="color:#8b5cf6"><?= $totalMember ?></div>
        <div class="stat-label">Member</div>
      </div>
    </div>
  </div>

  <!-- Tabel Pesanan Terbaru -->
  <div class="card border-0 shadow-sm">
    <div class="card-body">
      <h6 class="fw-bold mb-3">🧾 Pesanan Terbaru</h6>
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr><th>Kode</th><th>Pelanggan</th><th>Total</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr>
          </thead>
          <tbody>
            <?php foreach ($pesananTerbaru as $p): ?>
            <tr>
              <td><code><?= $p['kode_pesanan'] ?></code></td>
              <td><?= sanitize($p['nama_pelanggan']) ?></td>
              <td><?= rupiah($p['total']) ?></td>
              <td><span class="status-badge status-<?= $p['status'] ?>"><?= ucfirst($p['status']) ?></span></td>
              <td><?= date('d M Y', strtotime($p['created_at'])) ?></td>
              <td>
                <a href="pesanan.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-primary">Detail</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
