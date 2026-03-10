<?php
require_once __DIR__ . '/../config/helpers.php';
requireAdmin();
$db = getDB();

// ---- TOGGLE STATUS ----
if (isset($_GET['toggle']) && isset($_GET['id'])) {
    $uid     = (int)$_GET['id'];
    $current = $db->prepare("SELECT status FROM users WHERE id=? AND role='member'");
    $current->execute([$uid]);
    $row = $current->fetch();
    if ($row) {
        $newStatus = $row['status'] === 'aktif' ? 'nonaktif' : 'aktif';
        $db->prepare("UPDATE users SET status=? WHERE id=?")->execute([$newStatus, $uid]);
    }
    header('Location: member.php?ok=1'); exit;
}

// ---- HAPUS member ----
if (isset($_GET['hapus'])) {
    $uid = (int)$_GET['hapus'];
    // Cek pesanan aktif
    $cek = $db->prepare("SELECT COUNT(*) FROM pesanan WHERE id_user=? AND status NOT IN ('selesai','dibatalkan')");
    $cek->execute([$uid]);
    if ($cek->fetchColumn() > 0) {
        $errorHapus = 'Member memiliki pesanan aktif, tidak bisa dihapus!';
    } else {
        $db->prepare("DELETE FROM users WHERE id=? AND role='member'")->execute([$uid]);
        header('Location: member.php?ok=deleted'); exit;
    }
}

// ---- FILTER ----
$filterStatus = $_GET['status'] ?? '';
$filterCari   = sanitize($_GET['cari'] ?? '');

$where  = ["u.role = 'member'"];
$params = [];
if ($filterStatus) { $where[] = "u.status = :status"; $params[':status'] = $filterStatus; }
if ($filterCari)   { $where[] = "(u.nama LIKE :q OR u.email LIKE :q2)"; $params[':q'] = "%$filterCari%"; $params[':q2'] = "%$filterCari%"; }

$whereSQL = implode(' AND ', $where);
$stmt = $db->prepare("
    SELECT u.*,
           COUNT(ps.id)       AS total_pesanan,
           SUM(ps.total)      AS total_belanja
    FROM users u
    LEFT JOIN pesanan ps ON ps.id_user = u.id
    WHERE $whereSQL
    GROUP BY u.id
    ORDER BY u.created_at DESC
");
$stmt->execute($params);
$memberList = $stmt->fetchAll();

// ---- DETAIL MEMBER ----
$detailMember  = null;
$detailPesanan = [];
if (isset($_GET['id'])) {
    $uid = (int)$_GET['id'];
    $s = $db->prepare("SELECT * FROM users WHERE id=? AND role='member'");
    $s->execute([$uid]);
    $detailMember = $s->fetch();
    if ($detailMember) {
        $sp = $db->prepare("SELECT * FROM pesanan WHERE id_user=? ORDER BY created_at DESC");
        $sp->execute([$uid]);
        $detailPesanan = $sp->fetchAll();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Member — <?= APP_NAME ?></title>
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
    <a href="pesanan.php" class="nav-link">🧾 Pesanan</a>
    <a href="member.php"  class="nav-link active">👥 Member</a>
    <hr style="border-color:rgba(255,255,255,.1);margin:.5rem 1.5rem;">
    <a href="<?= BASE_URL ?>/index.php"         class="nav-link">🏠 Lihat Toko</a>
    <a href="<?= BASE_URL ?>/auth.php?logout=1" class="nav-link" style="color:#f87171">🚪 Logout</a>
  </nav>
</div>

<div class="admin-content">

  <?php if (isset($_GET['ok'])): ?>
  <div class="alert alert-success alert-dismissible fade show">
    ✅ <?= match($_GET['ok']) { '1'=>'Status member berhasil diubah!', 'deleted'=>'Member berhasil dihapus!', default=>'' } ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <?php endif; ?>

  <?php if (!empty($errorHapus)): ?>
  <div class="alert alert-danger alert-dismissible fade show"><?= $errorHapus ?> <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
  <?php endif; ?>

  <?php if ($detailMember): ?>
  <!-- ===== DETAIL MEMBER ===== -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">👤 Detail Member</h4>
    <a href="member.php" class="btn btn-outline-secondary btn-sm">← Kembali</a>
  </div>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body text-center py-4">
          <div style="font-size:4rem">👤</div>
          <h5 class="fw-bold mt-2"><?= sanitize($detailMember['nama']) ?></h5>
          <p class="text-muted small mb-1"><?= $detailMember['email'] ?></p>
          <p class="text-muted small mb-3"><?= $detailMember['no_hp'] ?: '-' ?></p>
          <span class="badge <?= $detailMember['status'] === 'aktif' ? 'bg-success' : 'bg-secondary' ?> fs-6">
            <?= ucfirst($detailMember['status']) ?>
          </span>
        </div>
        <div class="card-body pt-0">
          <table class="table table-sm">
            <tr><td class="text-muted">Alamat</td><td><?= sanitize($detailMember['alamat'] ?? '-') ?></td></tr>
            <tr><td class="text-muted">Kota</td><td><?= sanitize($detailMember['kota'] ?? '-') ?></td></tr>
            <tr><td class="text-muted">Daftar</td><td><?= date('d M Y', strtotime($detailMember['created_at'])) ?></td></tr>
          </table>
          <a href="member.php?toggle=1&id=<?= $detailMember['id'] ?>"
             onclick="return confirm('<?= $detailMember['status'] === 'aktif' ? 'Nonaktifkan' : 'Aktifkan' ?> member ini?')"
             class="btn w-100 <?= $detailMember['status'] === 'aktif' ? 'btn-outline-danger' : 'btn-outline-success' ?>">
            <?= $detailMember['status'] === 'aktif' ? '🚫 Nonaktifkan' : '✅ Aktifkan' ?>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="fw-bold mb-3">🧾 Riwayat Pesanan</h6>
          <?php if (empty($detailPesanan)): ?>
          <p class="text-muted text-center py-3">Belum ada pesanan.</p>
          <?php else: ?>
          <table class="table table-hover align-middle">
            <thead class="table-light">
              <tr><th>Kode</th><th>Total</th><th>Status</th><th>Tanggal</th><th></th></tr>
            </thead>
            <tbody>
              <?php foreach ($detailPesanan as $ps): ?>
              <tr>
                <td><code><?= $ps['kode_pesanan'] ?></code></td>
                <td><?= rupiah($ps['total']) ?></td>
                <td><span class="status-badge status-<?= $ps['status'] ?>"><?= ucfirst($ps['status']) ?></span></td>
                <td><?= date('d M Y', strtotime($ps['created_at'])) ?></td>
                <td><a href="pesanan.php?id=<?= $ps['id'] ?>" class="btn btn-sm btn-outline-primary">Detail</a></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <?php else: ?>
  <!-- ===== DAFTAR MEMBER ===== -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">👥 Kelola Member</h4>
    <span class="text-muted small">Total: <strong><?= count($memberList) ?></strong> member</span>
  </div>

  <!-- Filter -->
  <div class="card border-0 shadow-sm mb-3">
    <div class="card-body py-2">
      <form method="get" class="d-flex gap-2 align-items-center flex-wrap">
        <input type="text" name="cari" class="form-control" style="max-width:280px" placeholder="Cari nama atau email..." value="<?= $filterCari ?>">
        <select name="status" class="form-select" style="max-width:160px" onchange="this.form.submit()">
          <option value="">Semua Status</option>
          <option value="aktif"    <?= $filterStatus==='aktif'    ? 'selected':'' ?>>Aktif</option>
          <option value="nonaktif" <?= $filterStatus==='nonaktif' ? 'selected':'' ?>>Nonaktif</option>
        </select>
        <button class="btn btn-primary">Cari</button>
        <?php if ($filterCari || $filterStatus): ?>
        <a href="member.php" class="btn btn-outline-secondary">Reset</a>
        <?php endif; ?>
      </form>
    </div>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>No. HP</th>
              <th class="text-center">Pesanan</th>
              <th class="text-end">Total Belanja</th>
              <th>Status</th>
              <th>Daftar</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($memberList)): ?>
            <tr><td colspan="8" class="text-center py-4 text-muted">Tidak ada member ditemukan.</td></tr>
            <?php endif; ?>
            <?php foreach ($memberList as $m): ?>
            <tr class="<?= $m['status'] === 'nonaktif' ? 'table-secondary opacity-75' : '' ?>">
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div style="width:36px;height:36px;border-radius:50%;background:#e0e7ff;display:flex;align-items:center;justify-content:center;font-weight:700;color:#2563eb;font-size:.85rem;">
                    <?= strtoupper(substr($m['nama'], 0, 1)) ?>
                  </div>
                  <span class="fw-semibold"><?= sanitize($m['nama']) ?></span>
                </div>
              </td>
              <td><?= $m['email'] ?></td>
              <td><?= $m['no_hp'] ?: '-' ?></td>
              <td class="text-center">
                <span class="badge bg-primary"><?= $m['total_pesanan'] ?></span>
              </td>
              <td class="text-end fw-semibold"><?= $m['total_belanja'] ? rupiah($m['total_belanja']) : 'Rp 0' ?></td>
              <td>
                <span class="badge <?= $m['status'] === 'aktif' ? 'bg-success' : 'bg-secondary' ?>">
                  <?= ucfirst($m['status']) ?>
                </span>
              </td>
              <td><small><?= date('d M Y', strtotime($m['created_at'])) ?></small></td>
              <td class="text-center">
                <a href="member.php?id=<?= $m['id'] ?>" class="btn btn-sm btn-outline-primary">🔍 Detail</a>
                <a href="member.php?toggle=1&id=<?= $m['id'] ?>"
                   onclick="return confirm('Ubah status member ini?')"
                   class="btn btn-sm <?= $m['status'] === 'aktif' ? 'btn-outline-danger' : 'btn-outline-success' ?>">
                  <?= $m['status'] === 'aktif' ? '🚫' : '✅' ?>
                </a>
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
