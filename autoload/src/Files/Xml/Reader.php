<?php

namespace Files\Xml;

class Reader
{
    private $simpleXMLElement;

    public function __construct(string $pathFile)
    {
        $this->simpleXMLElement = simplexml_load_file($pathFile);
    }

    public function getXml(): \SimpleXMLElement
    {
        return $this->simpleXMLElement;
    }
}
