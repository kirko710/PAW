<?php
// 1. Definisi Class Mahasiswa
class Mahasiswa {
// Properti
public $nim;
public $nama;
public $prodi;
public function __construct($nim, $nama, $prodi) {
$this->nim = $nim;
$this->nama = $nama;
$this->prodi = $prodi;
}
public function kuliah() {
echo $this->nama . " (NIM: " . $this->nim . ") sedang
mengikuti kuliah di prodi " . $this->prodi . ".\n";
}
public function ujian() {
echo $this->nama . " (NIM: " . $this->nim . ") sedang
mengerjakan ujian di prodi " . $this->prodi . ".\n";
}
public function praktikum() {
echo $this->nama . " (NIM: " . $this->nim . ") sedang
melaksanakan praktikum di prodi " . $this->prodi . ".\n";
}
}
// 2. Membuat 2 objek Mahasiswa dengan nilai properti berbeda
$mahasiswa1 = new Mahasiswa("240101000123456", "Budiono Alexander
Sujiatmoko", "Teknik Informatika");
$mahasiswa2 = new Mahasiswa("242134212324212", "Sari Putri
Pujiaskoro", "Sistem Informasi");
// 3. Memanggil methods pada masing-masing objek
echo " Objek Mahasiswa 1 \n";
$mahasiswa1->kuliah();
$mahasiswa1->ujian();
$mahasiswa1->praktikum();
echo "\n";
echo "Objek Mahasiswa 2 \n";
$mahasiswa2->kuliah();
$mahasiswa2->ujian();
$mahasiswa2->praktikum();
?>