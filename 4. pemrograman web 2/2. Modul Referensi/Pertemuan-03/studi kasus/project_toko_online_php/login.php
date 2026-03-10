<?php
require_once __DIR__ . '/config/helpers.php';

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db    = getDB();
    $email = sanitize($_POST['email'] ?? '');
    $pass  = $_POST['password'] ?? '';

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND status = 'aktif'");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($pass, $user['password'])) {
        session_start();
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['user_nama'] = $user['nama'];
        $_SESSION['role']      = $user['role'];
        $redirect = $_GET['redirect'] ?? ($user['role'] === 'admin' ? 'admin/index.php' : 'index.php');
        header('Location: ' . $redirect);
        exit;
    } else {
        $error = 'Email atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — <?= APP_NAME ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="auth-wrapper">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="auth-card">
        <div class="text-center mb-4">
          <a href="index.php" class="text-decoration-none">
            <h2 class="fw-bold" style="color:#2563eb"><?= APP_NAME ?><span style="color:#f59e0b">.</span></h2>
          </a>
          <p class="text-muted">Masuk ke akun Anda</p>
        </div>

        <?php if (!empty($error)): ?>
        <div class="alert alert-danger mb-3"><?= $error ?></div>
        <?php endif; ?>

        <?php $flash = getFlash(); if ($flash): ?>
        <div class="alert alert-<?= $flash['type'] === 'success' ? 'success' : 'danger' ?> mb-3"><?= $flash['msg'] ?></div>
        <?php endif; ?>

        <form method="post">
          <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" name="email" class="form-control form-control-lg"
                   placeholder="email@contoh.com" required value="<?= sanitize($_POST['email'] ?? '') ?>">
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Password</label>
            <input type="password" name="password" class="form-control form-control-lg"
                   placeholder="Masukkan password" required>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="ingat">
              <label class="form-check-label" for="ingat">Ingat Saya</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100 py-2 fw-bold fs-6">🔐 Masuk</button>
        </form>

        <hr class="my-4">
        <p class="text-center text-muted mb-0 small">
          Belum punya akun? <a href="register.php" class="fw-bold text-primary">Daftar Sekarang</a>
        </p>
        <p class="text-center mt-2 small">
          <span class="text-muted">Demo: </span>
          <code>admin@tokokita.id</code> / <code>admin123</code>
        </p>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
