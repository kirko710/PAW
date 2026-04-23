<?php
// 1. Indexed Array berisi nama-nama prodi
$prodi = [
"Teknik Informatika",
"Teknik Komputer",
"Ilmu Komputer",
"Sistem Informasi",
"Teknologi Informasi",
"Pendidikan Teknologi Informasi"
];
// 2. Menampilkan semua elemen indexed array menggunakan foreach
echo " Indexed Array - Daftar Prodi\n";
foreach ($prodi as $index => $nilai) {
echo "[$index] " . $nilai . "\n";
}
echo "\n";
// 3. Associative Array - Data diri mahasiswa
$mahasiswa = [
"nim" => "240101000192131",
"nama" => "Fadlurrohman Brandon Fernandes",
"prodi" => "Teknik Informatika",
"semester" => 4,
"ipk" => 3.85,
"asal_kota" => "Malang"
];
// 4. Menampilkan semua elemen associative array menggunakan foreach
echo " Associative Array - Data Mahasiswa \n";
foreach ($mahasiswa as $kunci => $nilai) {
echo $kunci . " : " . $nilai . "\n";
}
?>