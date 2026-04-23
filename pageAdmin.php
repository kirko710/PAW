<?php
require_once 'auth.php';
startAuthSession();
requireRole(['admin']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman A</title>
</head>
<body>
    <h2>Halaman A - Khusus Admin</h2>
    <p>Selamat datang, <b><?= htmlspecialchars($_SESSION['user']) ?></b> (<?= $_SESSION['role'] ?>)</p>
    <p>Halaman ini hanya bisa diakses oleh <b>admin</b>.</p>

    <br>
    <a href="pageB.php">Ke Halaman B</a> |
    <a href="pageC.php">Ke Halaman C</a> |
    <a href="logout.php">Logout</a>
</body>
</html>