<?php // includes/footer.php ?>
<footer>
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <h5><?= APP_NAME ?></h5>
        <p>Platform belanja online terpercaya dengan ribuan produk pilihan dan harga terbaik.</p>
      </div>
      <div class="col-md-3">
        <h5>Navigasi</h5>
        <ul class="list-unstyled">
          <li><a href="<?= BASE_URL ?>">Beranda</a></li>
          <li><a href="<?= BASE_URL ?>/produk.php">Produk</a></li>
          <li><a href="<?= BASE_URL ?>/login.php">Login</a></li>
        </ul>
      </div>
      <div class="col-md-5">
        <h5>Kontak</h5>
        <p>📧 support@tokokita.id &nbsp;|&nbsp; 📞 0800-1234-5678</p>
        <p>🏠 Jakarta, Indonesia</p>
      </div>
    </div>
    <div class="footer-bottom">© <?= date('Y') ?> <?= APP_NAME ?>. Dibuat untuk Praktikum Pemrograman Web 2.</div>
  </div>
</footer>
