<?php
require_once 'config.php';

// Cek login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$error = "";
$success = "";

// Ambil data user
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Proses update profil
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $full_name = trim($_POST['full_name']);
    $new_password = $_POST['new_password'];

    // Cek email unik (selain milik sendiri)
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email AND id != :id");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $_SESSION['user_id']);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $error = "Email sudah digunakan user lain.";
    } else {
        if (!empty($new_password)) {
            // Update dengan password baru
            $hashed = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET email = :email, full_name = :full_name, password = :password WHERE id = :id");
            $stmt->bindParam(':password', $hashed);
        } else {
            // Update tanpa ubah password
            $stmt = $conn->prepare("UPDATE users SET email = :email, full_name = :full_name WHERE id = :id");
        }
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':id', $_SESSION['user_id']);
        $stmt->execute();

        $success = "Profil berhasil diperbarui.";

        // Refresh data user
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $_SESSION['user_id']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya</title>
</head>
<body>
    <h2>Profil Saya</h2>
    <p>Selamat datang, <strong><?= htmlspecialchars($user['username']) ?></strong>!</p>
    <p>Terdaftar sejak: <?= $user['created_at'] ?></p>

    <?php if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <?php if ($success): ?>
        <p style="color:green;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <h3>Ubah Profil</h3>
    <form method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>

        <label>Nama Lengkap:</label><br>
        <input type="text" name="full_name" value="<?= htmlspecialchars($user['full_name']) ?>"><br><br>

        <label>Password Baru (kosongkan jika tidak ingin ubah):</label><br>
        <input type="password" name="new_password"><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="logout.php">Logout</a> |
    <a href="delete_account.php" onclick="return confirm('Yakin ingin menghapus akun?')">Hapus Akun</a>
</body>
</html>