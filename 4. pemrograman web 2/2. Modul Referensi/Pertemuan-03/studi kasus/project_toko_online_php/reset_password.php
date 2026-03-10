<?php
/**
 * reset_password.php
 * Jalankan SATU KALI di browser: http://localhost/project_toko_online_php/reset_password.php
 * untuk meng-update password semua user menjadi: admin123
 * HAPUS file ini setelah selesai!
 */
require_once __DIR__ . '/config/helpers.php';

$db   = getDB();
$hash = password_hash('admin123', PASSWORD_BCRYPT);

$db->prepare("UPDATE users SET password = ? WHERE 1")->execute([$hash]);
$count = $db->query("SELECT COUNT(*) FROM users")->fetchColumn();

echo '<div style="font-family:monospace;padding:2rem;background:#d1fae5;border-radius:1rem;max-width:500px;margin:3rem auto;">';
echo "<h2>✅ Password di-reset!</h2>";
echo "<p>Password <strong>SEMUA $count user</strong> berhasil diupdate menjadi:</p>";
echo "<p><strong>Password: <code>admin123</code></strong></p>";
echo "<hr>";
echo "<p>Akun tersedia:</p>";
echo "<ul>";
$users = $db->query("SELECT nama, email, role FROM users ORDER BY role DESC")->fetchAll(PDO::FETCH_ASSOC);
foreach ($users as $u) {
    echo "<li><strong>{$u['role']}</strong>: {$u['nama']} — <code>{$u['email']}</code></li>";
}
echo "</ul>";
echo "<hr>";
echo '<p>⚠️ <strong>Hapus file ini setelah login berhasil!</strong></p>';
echo '<a href="login.php" style="background:#2563eb;color:#fff;padding:.5rem 1.5rem;border-radius:.5rem;text-decoration:none;font-weight:700;">→ Ke Halaman Login</a>';
echo '</div>';
