<?php
require_once 'auth.php';
startAuthSession();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Public</title>
</head>
<body>
    <h2>Halaman Public </h2>
    <p>Halaman ini dapat diakses oleh <b>semua orang</b>, termasuk yang belum login.</p>
    
    <?php if (isLoggedIn()): ?>
        <p>Anda login sebagai: <b><?=htmlspecialchars($_SESSION['user'])?></b> (<?=  $_SESSION['role'] ?>)</p>
        <br>
        <?php if (getRole() === 'admin'): ?>
            <a href="pageAdmin.php">Ke Halaman Admin</a>
        <?php endif; ?>
        <a href="pageAdmin_Member.php">Ke Halaman Admin dan Member</a>
        <a href="logout.php">logout</a>
    <?php else: ?>
        <p>Anda belum login.</p>
        <a href="login.php">login</a>
    <?php endif; ?>
</body>
</html>