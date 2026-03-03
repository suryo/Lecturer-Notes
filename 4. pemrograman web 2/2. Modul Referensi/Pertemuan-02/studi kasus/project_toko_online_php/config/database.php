<?php
// ============================================================
// Konfigurasi Database - TokoKita
// ============================================================

define('DB_HOST', 'localhost');
define('DB_NAME', 'tokokita');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHAR', 'utf8mb4');

// Koneksi PDO
function getDB(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHAR;
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            die('<div style="color:red;padding:1rem;font-family:monospace">
                 <b>❌ Koneksi Database Gagal:</b> ' . $e->getMessage() . '
                 </div>');
        }
    }
    return $pdo;
}

// Konstanta Aplikasi
define('BASE_URL',  'http://localhost/project_toko_online_php');
define('APP_NAME',  'TokoKita');
define('UPLOAD_DIR', __DIR__ . '/../uploads/produk/');
