<?php
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
$stmt->bindParam(':id', $_SESSION['user_id']);
$stmt->execute();

// Hapus session setelah akun dihapus
session_unset();
session_destroy();

header("Location: login.php");
exit;
?>