<?php
require_once 'config.php';

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $full_name = trim($_POST['full_name']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if (empty($username) || empty($email) || empty($password)) {
        $error = "Semua field wajib diisi.";
    } elseif ($password !== $confirm) {
        $error = "Konfirmasi password tidak cocok.";
    } else {
        // Cek apakah username/email sudah ada
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = :username OR email = :email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error = "Username atau email sudah terdaftar.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, full_name) VALUES (:username, :email, :password, :full_name)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed);
            $stmt->bindParam(':full_name', $full_name);
            $stmt->execute();
            $success = "Registrasi berhasil! Silakan login.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
</head>
<body>
    <h2>Registrasi</h2>
    <?php if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <?php if ($success): ?>
        <p style="color:green;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Nama Lengkap:</label><br>
        <input type="text" name="full_name"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Konfirmasi Password:</label><br>
        <input type="password" name="confirm_password" required><br><br>

        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</body>
</html>