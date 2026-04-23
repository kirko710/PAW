<?php

$filename = "data.txt";
$file = fopen($filename,"r");
$file = file_get_contents($filename);
echo $file;

?>
