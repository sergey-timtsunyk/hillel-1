<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\ConfigRouting;

try {

    ConfigRouting::setting();

} catch (\LogicException $e) {
    echo ($e->getMessage());
}
