<?php

namespace Convert;

use User\Employ;

class EmployFromJson
{
    private $json;
    private $arr = [];

    public function __construct(string $json)
    {
        $this->json = $json;
    }

    public function convert()
    {
        $arrayJson = json_decode($this->json, true);

        foreach ($arrayJson as $item) {
            $employ = new Employ($item['firstName'], $item['lastName'], $item['position'], 0);

            $this->arr[] = $employ;
        }

    }

    public function getArray(): array
    {
        return $this->arr;
    }
}
