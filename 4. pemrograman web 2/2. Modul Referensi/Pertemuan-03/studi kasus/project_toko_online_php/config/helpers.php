<?php
require_once __DIR__ . '/../config/database.php';

// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Helper: cek sudah login
function isLoggedIn(): bool {
    return isset($_SESSION['user_id']);
}

// Helper: cek role admin
function isAdmin(): bool {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Redirect jika belum login
function requireLogin(): void {
    if (!isLoggedIn()) {
        header('Location: ' . BASE_URL . '/login.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
        exit;
    }
}

// Redirect jika bukan admin
function requireAdmin(): void {
    requireLogin();
    if (!isAdmin()) {
        header('Location: ' . BASE_URL . '/index.php');
        exit;
    }
}

// Sanitasi input
function sanitize(string $str): string {
    return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
}

// Format Rupiah
function rupiah(float $num): string {
    return 'Rp ' . number_format($num, 0, ',', '.');
}

// Flash message (session-based)
function setFlash(string $type, string $msg): void {
    $_SESSION['flash'] = ['type' => $type, 'msg' => $msg];
}

function getFlash(): ?array {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

// Generate kode pesanan unik
function generateKodePesanan(): string {
    return 'TK-' . date('Ymd') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
}

// Upload gambar produk
function uploadFoto(array $file, string $oldFoto = 'default.jpg'): string {
    if ($file['error'] !== UPLOAD_ERR_OK) return $oldFoto;
    $ext     = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];
    if (!in_array($ext, $allowed)) return $oldFoto;
    $nama = uniqid('produk_') . '.' . $ext;
    move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $nama);
    return $nama;
}
