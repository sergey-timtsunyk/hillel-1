<?php

spl_autoload_register('autoloadSrc');
spl_autoload_register('autoloadVendor');

function autoloadSrc($className) {
    $dirClass = str_replace('\\', '/', $className);
    $pathClass = "src/{$dirClass}.php";
    var_dump($pathClass);
    if (file_exists($pathClass)) {
        require_once $pathClass;
    }
}

function autoloadVendor($className) {
    $dirClass = str_replace('\\', '/', $className);
    $pathClass = "vendor/{$dirClass}.php";
    var_dump($pathClass);
    if (file_exists($pathClass)) {
        require_once $pathClass;
    }
}