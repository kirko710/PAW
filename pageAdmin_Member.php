<?php
require_once 'auth.php';
startAuthSession();
requireRole(['admin','member']);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Halaman B</title>
</head>
<body>
    <h2>Halaman B - Admin & Member</h2>
    <p>Selamat Datang, <b><?=htmlspecialchars($_SESSION['user']) ?></b> (<?= $_SESSION['role'] ?>)</p>
    <p>Halaman ini bisa diakses oleh <b>admin</b> dan <b>member</b>.</p>

    <br>
    <?php if (getRole() === 'admin'): ?>
        <a href="pageAdmin.php">ke Halaman Admin</a> |
    <?php endif; ?>
    <a href="pagePublic.php">ke Halaman Public</a> |
    <a href="logout.php">Logout</a> |    
</body>
</html>