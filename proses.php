<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Ambil data dari form, bersihkan dari spasi berlebih
    $nama  = trim($_POST["nama"]);
    $nim   = trim($_POST["nim"]);
    $email = trim($_POST["email"]);

    if (empty($nama) || empty($nim) || empty($email)) {
        die("Semua field harus diisi!");
    }

    // Format data yang akan disimpan (dipisah dengan |)
    $data = "Nama: $nama | NIM: $nim | Email: $email" . PHP_EOL;

    // Nama file tujuan
    $namaFile = "data_mahasiswa.txt";

    // Buka file dengan mode "a" (append) agar data lama tidak terhapus
    $file = fopen($namaFile, "a");

    if ($file === false) {
        die("Gagal membuka file $namaFile.");
    }

    // Tulis data ke file
    if (fwrite($file, $data) !== false) {
        echo "<h3>Data berhasil disimpan!</h3>";
        echo "<p><strong>Nama:</strong> $nama</p>";
        echo "<p><strong>NIM:</strong> $nim</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<a href='form.html'>Kembali ke Formulir</a>";
    } else {
        echo "Gagal menyimpan data.";
    }

    // Tutup file
    fclose($file);

} else {
    // Jika diakses langsung tanpa POST, kembalikan ke form
    echo "Akses tidak valid. Silakan isi formulir terlebih dahulu.";
    echo "<br><a href='form.html'>Ke Formulir</a>";
}

?>