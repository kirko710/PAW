<?php
// 1. Fungsi penjumlahan dua bilangan
function penjumlahan($a, $b) {
return $a + $b;
}
// 2. Memanggil fungsi penjumlahan sebanyak 2x dengan argumen berbeda
$hasil1 = penjumlahan(10, 25);
$hasil2 = penjumlahan(47, 83);
echo " Fungsi Penjumlahan\n";
echo "penjumlahan(10, 25) = " . $hasil1 . "\n";
echo "penjumlahan(47, 83) = " . $hasil2 . "\n";
echo "\n";
// 3. Fungsi menghitung panjang string
function panjangString($str) {
return strlen($str);

}
// 4. Memanggil fungsi panjang String sebanyak 2x dengan input berbeda
$string1 = "Halo Dunia";
$string2 = "Praktikum PHP";
echo " Fungsi Panjang String \n";
echo "Panjang dari \"" . $string1 . "\" = " .
panjangString($string1) . " karakter\n";
echo "Panjang dari \"" . $string2 . "\" = " .
panjangString($string2) . " karakter\n";
?>