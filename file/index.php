<?php

require_once 'function.php';

$file = 'data/file.txt';
$csv = 'data/sheet.csv';


$handle = fopen($csv, "r");

while (false !== ($line = fgetcsv($handle))) {
    print_r($line);
    echo '<br>';
}


