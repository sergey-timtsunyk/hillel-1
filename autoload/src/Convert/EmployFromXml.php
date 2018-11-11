<?php

namespace Convert;

use User\Employ;

class EmployFromXml
{
    private $simpleXMLElement;
    private $arr;

    public function __construct(\SimpleXMLElement $simpleXMLElement)
    {
        $this->simpleXMLElement = $simpleXMLElement;
    }

    public function convert()
    {
        foreach ($this->simpleXMLElement->children()->children() as $item) {
            $employ = new Employ($item->firstName, $item->lastName, $item->position, 0);

            $this->arr[] = $employ;
        }
    }

    public function getArrayEmploy(): array
    {
        return $this->arr;
    }
}
