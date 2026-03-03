<?php
// includes/navbar.php
// Path works whether called from root or subdirectory (admin/, member/)
$_helpersRoot = defined('HELPERS_LOADED') ? null : dirname(__DIR__) . '/config/helpers.php';
if ($_helpersRoot && file_exists($_helpersRoot) && !defined('HELPERS_LOADED')) {
    require_once $_helpersRoot;
}
define('HELPERS_LOADED', true);
$cartCount = 0; // default
if (isLoggedIn()) {
    $stmt = getDB()->prepare("SELECT SUM(jumlah) FROM cart WHERE id_user = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $cartCount = (int)$stmt->fetchColumn();
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand" href="<?= BASE_URL ?>/index.php"><?= APP_NAME ?><span>.</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/produk.php">Produk</a></li>
      </ul>
      <div class="d-flex align-items-center gap-3">
        <a href="<?= BASE_URL ?>/cart.php" class="cart-icon text-dark text-decoration-none">
          🛒 <?php if ($cartCount > 0): ?><span class="cart-badge"><?= $cartCount ?></span><?php endif; ?>
        </a>
        <?php if (isLoggedIn()): ?>
        <div class="dropdown">
          <button class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
            👤 <?= htmlspecialchars($_SESSION['user_nama']) ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <?php if (isAdmin()): ?>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>/admin/index.php">🛡️ Panel Admin</a></li>
            <li><hr class="dropdown-divider"></li>
            <?php else: ?>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>/member/profil.php">👤 Profil Saya</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>/member/pesanan.php">🧾 Pesanan Saya</a></li>
            <li><hr class="dropdown-divider"></li>
            <?php endif; ?>
            <li><a class="dropdown-item text-danger" href="<?= BASE_URL ?>/auth.php?logout=1">🚪 Logout</a></li>
          </ul>
        </div>
        <?php else: ?>
        <a href="<?= BASE_URL ?>/login.php" class="btn btn-primary btn-sm">Login</a>
        <a href="<?= BASE_URL ?>/register.php" class="btn btn-outline-primary btn-sm">Daftar</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
