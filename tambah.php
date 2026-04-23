<?php

$namaFile = "catatan.txt";

$tambahanIsi = "catatan kedua.\n";

$file = fopen($namaFile, "a");
if ($file === false) {
    die("Gagal membuka file $namaFile.\n");
}
   
$hasil = fwrite($file, $tambahanIsi);

fclose($file);

?>