<?php

namespace Files\Json;

class Reader
{
    private $str;

    public function __construct(string $pathFile)
    {
        $this->str = file_get_contents($pathFile);
    }

    public function getJson(): string
    {
        return $this->str;
    }
}
