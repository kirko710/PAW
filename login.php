<?php
require_once 'auth.php';
startAuthSession();

// Jika sudah login, redirect
if (isLoggedIn()) {
    header("Location: " . (getRole() === 'admin' ? 'pageA.php' : 'pageB.php'));
    exit;
}

// Data user 
$users = [
    'admin'  => ['password' => 'admin123', 'role' => 'admin'],
    'budi'   => ['password' => 'budi123',  'role' => 'member'],
    'siti'   => ['password' => 'siti123',  'role' => 'member'],
];

$errorMsg = '';

if (isset($_GET['error'])) {
    if ($_GET['error'] === 'login_required') $errorMsg = 'Anda harus login terlebih dahulu.';
    if ($_GET['error'] === 'access_denied')  $errorMsg = 'Anda tidak memiliki akses ke halaman tersebut.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = isset($_POST['remember']);

    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $role = $users[$username]['role'];

        $_SESSION['user'] = $username;
        $_SESSION['role'] = $role;

        // Set cookie 7 hari jika "Ingat Saya" dicentang
        if ($remember) {
            setcookie('username',  $username, time() + (7 * 24 * 3600), '/');
            setcookie('user_role', $role,     time() + (7 * 24 * 3600), '/');
        }

        header("Location: " . ($role === 'admin' ? 'pageA.php' : 'pageB.php'));
        exit;
    } else {
        $errorMsg = 'Username atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if ($errorMsg): ?>
        <p style="color:red"><?= htmlspecialchars($errorMsg) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Ingat Saya (Cookie 7 hari)</label><br><br>

        <button type="submit">Login</button>
    </form>

    <br>
    <p>Akun tersedia:</p>
    <ul>
        <li>admin / admin123 → role: admin</li>
        <li>budi / budi123 → role: member</li>
        <li>siti / siti123 → role: member</li>
    </ul>

    <a href="pageC.php">Ke Halaman C (Publik)</a>
</body>
</html>