<?php
function startAuthSession() {
    session_start();

    // Restore session dari cookie jika session kosong
    if (!isset($_SESSION['user']) && isset($_COOKIE['username']) && isset($_COOKIE['user_role'])) {
        $_SESSION['user'] = $_COOKIE['username'];
        $_SESSION['role'] = $_COOKIE['user_role'];
    }
}

function isLoggedIn() {
    return isset($_SESSION['user']);
}

function getRole() {
    return $_SESSION['role'] ?? null;
}

function requireRole(array $allowedRoles) {
    if (!isLoggedIn()) {
        header("Location: login.php?error=login_required");
        exit;
    }
    if (!in_array(getRole(), $allowedRoles)) {
        header("Location: login.php?error=access_denied");
        exit;
    }
}
?>