<?php

$file=fopen("data.txt","r");
echo fgets($file);
fclose($file);


?>