<?php

require_once 'Table.php';

class TableNew extends Table
{
    private $color = 'none';
    private static $i = 0;

    public function __construct(string $color, int $d, int $sh)
    {
        parent::__construct($d, $sh);

        $this->color = $color;
    }

    public static function createInstance()
    {
        static::$i++;

        return static::$i;
    }

    public function getSq()
    {
        return ($this->getD() * $this->getSh())/1000;
    }

    public function info()
    {
        return sprintf('Цвет: %s, высота: %s, длина: %s', $this->color, $this->h, $this->getD());
    }

    public function __destruct()
    {
        var_dump('__destruct');
    }
}
