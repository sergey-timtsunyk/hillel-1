<?php

spl_autoload_register('autoloadSrc');

function autoloadSrc($nameClass) {
    $map = [
      'App' => 'src',
    ];

    $keySearch = current(explode('\\', $nameClass));

    if (!array_key_exists($keySearch, $map)) {
        throw new \LogicException(sprintf('В массиве мапинга не указан ключ: %s', $keySearch));
    }

    $dirClass = str_replace($keySearch, $map[$keySearch], $nameClass);
    $dirClass = str_replace('\\', '/', $dirClass);
    $pathClass = "{$dirClass}.php";

    if (file_exists($pathClass)) {
        require_once $pathClass;
    } else {
        throw new \LogicException(sprintf('Клас [%s] не найден по пути: %s', $nameClass, $pathClass));
    }
}