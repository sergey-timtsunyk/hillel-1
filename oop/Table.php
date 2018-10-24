<?php

class Table {

    protected $h;
    private $d;
    private $sh;

    private $coorX;
    private $coorY;

    public function __construct(int $d, int $sh)
    {
        $this->d = $d;
        $this->sh = $sh;
    }

    public function setH(int $h)
    {
        $this->h = $h;
    }

    public function getH()
    {
        return $this->h;
    }

    public function getSq()
    {
        return  $this->calculateSq();
    }

    protected function getD()
    {
        return $this->d;
    }

    protected function getSh()
    {
        return $this->sh;
    }

    private function calculateSq()
    {
        return $this->d * $this->sh;
    }
}