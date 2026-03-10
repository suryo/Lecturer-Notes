<?php
require_once __DIR__ . '/config/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db   = getDB();
    $nama = sanitize($_POST['nama'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $pass  = $_POST['password'] ?? '';
    $konfirmasi = $_POST['konfirmasi'] ?? '';

    if ($pass !== $konfirmasi) {
        $error = 'Password dan konfirmasi tidak cocok!';
    } else {
        $cek = $db->prepare("SELECT id FROM users WHERE email = ?");
        $cek->execute([$email]);
        if ($cek->fetch()) {
            $error = 'Email sudah terdaftar. Silakan login!';
        } else {
            $hash = password_hash($pass, PASSWORD_BCRYPT);
            $db->prepare("INSERT INTO users (nama, email, password) VALUES (?, ?, ?)")
               ->execute([$nama, $email, $hash]);
            setFlash('success', '✅ Akun berhasil dibuat! Silakan login.');
            header('Location: login.php'); exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun — <?= APP_NAME ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="auth-wrapper">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="auth-card">
        <div class="text-center mb-4">
          <a href="index.php" class="text-decoration-none">
            <h2 class="fw-bold" style="color:#2563eb"><?= APP_NAME ?><span style="color:#f59e0b">.</span></h2>
          </a>
          <p class="text-muted">Buat Akun Baru</p>
        </div>

        <?php if (!empty($error)): ?>
        <div class="alert alert-danger mb-3"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required
                     value="<?= sanitize($_POST['nama'] ?? '') ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">No. HP</label>
              <input type="tel" name="no_hp" class="form-control" placeholder="08xx-xxxx">
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">Email</label>
              <input type="email" name="email" class="form-control" placeholder="email@contoh.com" required
                     value="<?= sanitize($_POST['email'] ?? '') ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Min. 8 karakter" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Konfirmasi Password</label>
              <input type="password" name="konfirmasi" class="form-control" placeholder="Ulangi password" required>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">✅ Daftar Sekarang</button>
            </div>
          </div>
        </form>

        <hr class="my-3">
        <p class="text-center text-muted mb-0 small">
          Sudah punya akun? <a href="login.php" class="fw-bold text-primary">Login di sini</a>
        </p>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
