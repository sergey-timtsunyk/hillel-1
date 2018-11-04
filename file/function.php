<?php

function openAndReadFile ($file)
{
    if (file_exists($file)) {
        $handle = fopen($file, "r");
        echo 'файла существует!<br>';

        $size = filesize($file);

        $content = fread($handle, $size);

        fclose($handle);

        echo "$content </br>";
        echo "Размер файла: $size </br>";
    } else {
        echo 'файла не существует!';
    }
}

function openAndWriteNewLine($file, $newStr)
{
    $handler = fopen($file, 'a+');

    fwrite($handler, PHP_EOL . $newStr);
}

function downloadFile ($file)
{
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="file.txt"');
    header('Content-Length: ' . filesize($file));

    readfile($file) || exit('Файл не существует!');
}