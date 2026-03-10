<?php
require_once __DIR__ . '/config/helpers.php';

$db = getDB();
session_start();

// ---- REGISTER ----
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_register'])) {
    $nama  = sanitize($_POST['nama']);
    $email = sanitize($_POST['email']);
    $pass  = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($pass !== $konfirmasi) {
        setFlash('danger', 'Password dan konfirmasi tidak cocok!');
        header('Location: register.php'); exit;
    }

    // Cek email sudah ada
    $cek = $db->prepare("SELECT id FROM users WHERE email = ?");
    $cek->execute([$email]);
    if ($cek->fetch()) {
        setFlash('danger', 'Email sudah terdaftar!');
        header('Location: register.php'); exit;
    }

    $hash = password_hash($pass, PASSWORD_BCRYPT);
    $stmt = $db->prepare("INSERT INTO users (nama, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$nama, $email, $hash]);
    setFlash('success', '✅ Akun berhasil dibuat! Silakan login.');
    header('Location: login.php'); exit;
}

// ---- LOGIN ----
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_login'])) {
    $email = sanitize($_POST['email']);
    $pass  = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND status = 'aktif'");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['user_nama'] = $user['nama'];
        $_SESSION['role']      = $user['role'];
        setFlash('success', '✅ Login berhasil! Selamat datang, ' . $user['nama']);
        $redirect = $_GET['redirect'] ?? ($user['role'] === 'admin' ? 'admin/index.php' : 'index.php');
        header('Location: ' . $redirect); exit;
    } else {
        setFlash('danger', '❌ Email atau password salah!');
        header('Location: login.php'); exit;
    }
}

// ---- LOGOUT ----
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php'); exit;
}
