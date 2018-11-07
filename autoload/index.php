<?php

    require_once 'autoload_custom.php';

    use User\Employ;
    use Files\Xml\Reader as XmlRead;
    use Files\Json\Reader as JsonRead;

    $employ = new Employ('Genry', 'Duglas', 'dev', 3000);

    $readXml = new XmlRead();
    $readJson = new JsonRead();

    $connectionDB = new DB\Connection();

    $str = json_encode([$employ->toArray(),]);

    var_dump($str);
