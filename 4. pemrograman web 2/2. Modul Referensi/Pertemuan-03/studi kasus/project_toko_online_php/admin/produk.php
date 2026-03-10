<?php
require_once __DIR__ . '/../config/helpers.php';
requireAdmin();
$db = getDB();

// ---- HANDLE ACTIONS ----
$action = $_GET['action'] ?? 'list';
$id     = (int)($_GET['id'] ?? 0);
$error  = '';

// DELETE
if ($action === 'delete' && $id) {
    $db->prepare("UPDATE produk SET status='nonaktif' WHERE id=?")->execute([$id]);
    header('Location: produk.php?ok=deleted'); exit;
}

// RESTORE
if ($action === 'restore' && $id) {
    $db->prepare("UPDATE produk SET status='aktif' WHERE id=?")->execute([$id]);
    header('Location: produk.php?ok=restored'); exit;
}

// SAVE (tambah/edit)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama        = sanitize($_POST['nama'] ?? '');
    $id_kat      = (int)$_POST['id_kategori'];
    $deskripsi   = sanitize($_POST['deskripsi'] ?? '');
    $harga       = (float)str_replace(['.',','], ['', '.'], $_POST['harga']);
    $harga_disk  = !empty($_POST['harga_diskon']) ? (float)str_replace(['.',','], ['', '.'], $_POST['harga_diskon']) : null;
    $stok        = (int)$_POST['stok'];
    $berat       = (int)($_POST['berat_gram'] ?? 0);
    $slug        = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $nama)) . '-' . time();

    if (!$nama || !$id_kat || !$harga) {
        $error = 'Nama, kategori, dan harga wajib diisi!';
        $action = $_POST['id'] ? 'edit' : 'tambah';
    } else {
        $editId = (int)($_POST['id'] ?? 0);

        // Handle foto upload
        $foto = $editId ? $db->prepare("SELECT foto FROM produk WHERE id=?")->execute([$editId]) : 'default.jpg';
        if ($editId) {
            $s = $db->prepare("SELECT foto FROM produk WHERE id=?"); $s->execute([$editId]);
            $foto = $s->fetchColumn() ?: 'default.jpg';
        } else { $foto = 'default.jpg'; }

        if (!empty($_FILES['foto']['name'])) {
            $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg','jpeg','png','webp'])) {
                $newName = 'produk_' . time() . '.' . $ext;
                $dest    = dirname(__DIR__) . '/uploads/produk/' . $newName;
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $dest)) $foto = $newName;
            }
        }

        if ($editId) {
            $db->prepare("UPDATE produk SET id_kategori=?,nama=?,slug=?,deskripsi=?,harga=?,harga_diskon=?,stok=?,berat_gram=?,foto=? WHERE id=?")
               ->execute([$id_kat, $nama, $slug, $deskripsi, $harga, $harga_disk, $stok, $berat, $foto, $editId]);
        } else {
            $db->prepare("INSERT INTO produk (id_kategori,nama,slug,deskripsi,harga,harga_diskon,stok,berat_gram,foto) VALUES (?,?,?,?,?,?,?,?,?)")
               ->execute([$id_kat, $nama, $slug, $deskripsi, $harga, $harga_disk, $stok, $berat, $foto]);
        }
        header('Location: produk.php?ok=saved'); exit;
    }
}

// GET data for form
$editProduk = null;
if ($action === 'edit' && $id) {
    $s = $db->prepare("SELECT * FROM produk WHERE id=?"); $s->execute([$id]);
    $editProduk = $s->fetch();
    if (!$editProduk) { header('Location: produk.php'); exit; }
}

// LIST
$search = sanitize($_GET['cari'] ?? '');
$where  = $search ? "WHERE p.nama LIKE :q" : "";
$params = $search ? [':q' => "%$search%"] : [];
$stmt   = $db->prepare("SELECT p.*, k.nama AS kategori FROM produk p JOIN kategori k ON p.id_kategori=k.id $where ORDER BY p.created_at DESC");
$stmt->execute($params);
$produkList = $stmt->fetchAll();

$kategoriList = $db->query("SELECT * FROM kategori ORDER BY nama")->fetchAll();

// Sidebar helper
function sidebarLink(string $href, string $icon, string $label, string $current): string {
    $active = str_contains($href, $current) ? 'active' : '';
    return "<a href=\"$href\" class=\"nav-link $active\">$icon $label</a>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Produk — <?= APP_NAME ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- Sidebar -->
<div class="admin-sidebar">
  <div class="brand">🛒 <?= APP_NAME ?> Admin</div>
  <nav class="mt-3">
    <a href="index.php"   class="nav-link">📊 Dashboard</a>
    <a href="produk.php"  class="nav-link active">📦 Produk</a>
    <a href="pesanan.php" class="nav-link">🧾 Pesanan</a>
    <a href="member.php"  class="nav-link">👥 Member</a>
    <hr style="border-color:rgba(255,255,255,.1);margin:.5rem 1.5rem;">
    <a href="<?= BASE_URL ?>/index.php"         class="nav-link">🏠 Lihat Toko</a>
    <a href="<?= BASE_URL ?>/auth.php?logout=1" class="nav-link" style="color:#f87171">🚪 Logout</a>
  </nav>
</div>

<div class="admin-content">

  <?php if (isset($_GET['ok'])): ?>
  <div class="alert alert-success alert-dismissible fade show">
    ✅ <?= match($_GET['ok']) { 'saved'=>'Produk berhasil disimpan!', 'deleted'=>'Produk dinonaktifkan!', 'restored'=>'Produk diaktifkan kembali!', default=>'' } ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <?php endif; ?>

  <?php if ($action === 'tambah' || $action === 'edit'): ?>
  <!-- ===== FORM TAMBAH / EDIT ===== -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0"><?= $action === 'edit' ? '✏️ Edit Produk' : '➕ Tambah Produk' ?></h4>
    <a href="produk.php" class="btn btn-outline-secondary btn-sm">← Kembali</a>
  </div>

  <?php if ($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>

  <div class="card border-0 shadow-sm">
    <div class="card-body p-4">
      <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $editProduk['id'] ?? '' ?>">
        <div class="row g-3">
          <div class="col-md-8">
            <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
            <input type="text" name="nama" class="form-control" required value="<?= sanitize($editProduk['nama'] ?? '') ?>">
          </div>
          <div class="col-md-4">
            <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
            <select name="id_kategori" class="form-select" required>
              <option value="">-- Pilih --</option>
              <?php foreach ($kategoriList as $k): ?>
              <option value="<?= $k['id'] ?>" <?= ($editProduk['id_kategori'] ?? '') == $k['id'] ? 'selected' : '' ?>>
                <?= $k['ikon'] . ' ' . $k['nama'] ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label fw-semibold">Harga (Rp) <span class="text-danger">*</span></label>
            <input type="number" name="harga" class="form-control" required min="0" step="500" value="<?= $editProduk['harga'] ?? '' ?>">
          </div>
          <div class="col-md-4">
            <label class="form-label fw-semibold">Harga Diskon (Rp) <small class="text-muted">opsional</small></label>
            <input type="number" name="harga_diskon" class="form-control" min="0" step="500" value="<?= $editProduk['harga_diskon'] ?? '' ?>">
          </div>
          <div class="col-md-2">
            <label class="form-label fw-semibold">Stok</label>
            <input type="number" name="stok" class="form-control" min="0" value="<?= $editProduk['stok'] ?? 0 ?>">
          </div>
          <div class="col-md-2">
            <label class="form-label fw-semibold">Berat (gram)</label>
            <input type="number" name="berat_gram" class="form-control" min="0" value="<?= $editProduk['berat_gram'] ?? 0 ?>">
          </div>
          <div class="col-12">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4"><?= sanitize($editProduk['deskripsi'] ?? '') ?></textarea>
          </div>
          <div class="col-md-6">
            <label class="form-label fw-semibold">Foto Produk</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
            <?php if (!empty($editProduk['foto']) && $editProduk['foto'] !== 'default.jpg'): ?>
            <img src="../uploads/produk/<?= $editProduk['foto'] ?>" class="mt-2 rounded" style="height:80px;object-fit:cover;">
            <?php endif; ?>
          </div>
          <div class="col-12 pt-2">
            <button type="submit" class="btn btn-primary px-4">💾 Simpan Produk</button>
            <a href="produk.php" class="btn btn-outline-secondary ms-2">Batal</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php else: ?>
  <!-- ===== DAFTAR PRODUK ===== -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">📦 Kelola Produk</h4>
    <a href="produk.php?action=tambah" class="btn btn-primary">➕ Tambah Produk</a>
  </div>

  <div class="card border-0 shadow-sm mb-3">
    <div class="card-body py-2">
      <form method="get" class="d-flex gap-2">
        <input type="text" name="cari" class="form-control" placeholder="Cari nama produk..." value="<?= sanitize($search) ?>">
        <button class="btn btn-primary">Cari</button>
        <?php if ($search): ?><a href="produk.php" class="btn btn-outline-secondary">Reset</a><?php endif; ?>
      </form>
    </div>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th style="width:60px">Foto</th>
              <th>Nama Produk</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Status</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($produkList)): ?>
            <tr><td colspan="7" class="text-center py-4 text-muted">Tidak ada produk ditemukan.</td></tr>
            <?php endif; ?>
            <?php foreach ($produkList as $p): ?>
            <tr class="<?= $p['status'] === 'nonaktif' ? 'table-secondary opacity-75' : '' ?>">
              <td>
                <img src="../uploads/produk/<?= $p['foto'] ?>"
                     style="width:50px;height:50px;object-fit:cover;border-radius:8px;"
                     onerror="this.src='https://via.placeholder.com/50?text=No+Img'">
              </td>
              <td>
                <div class="fw-semibold"><?= sanitize($p['nama']) ?></div>
                <small class="text-muted">Terjual: <?= $p['terjual'] ?></small>
              </td>
              <td><?= $p['kategori'] ?></td>
              <td>
                <div class="fw-semibold"><?= rupiah($p['harga_diskon'] ?? $p['harga']) ?></div>
                <?php if ($p['harga_diskon']): ?>
                <small class="text-decoration-line-through text-muted"><?= rupiah($p['harga']) ?></small>
                <?php endif; ?>
              </td>
              <td>
                <span class="badge <?= $p['stok'] < 10 ? 'bg-danger' : 'bg-success' ?>">
                  <?= $p['stok'] ?>
                </span>
              </td>
              <td>
                <?php if ($p['status'] === 'aktif'): ?>
                <span class="badge bg-success">Aktif</span>
                <?php else: ?>
                <span class="badge bg-secondary">Nonaktif</span>
                <?php endif; ?>
              </td>
              <td class="text-center">
                <a href="produk.php?action=edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-primary">✏️ Edit</a>
                <?php if ($p['status'] === 'aktif'): ?>
                <a href="produk.php?action=delete&id=<?= $p['id'] ?>"
                   onclick="return confirm('Nonaktifkan produk ini?')"
                   class="btn btn-sm btn-outline-danger">🚫 Nonaktif</a>
                <?php else: ?>
                <a href="produk.php?action=restore&id=<?= $p['id'] ?>"
                   class="btn btn-sm btn-outline-success">✅ Aktifkan</a>
                <?php endif; ?>
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
