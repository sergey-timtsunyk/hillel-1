<?php

require_once 'InterfacePointPrinter.php';
require_once 'PointPrinter.php';

class Point
{
    private $x;
    private $y;
    private $print;

    /**
     * Point constructor.
     * @param InterfacePointPrinter $print
     * @param $x
     * @param $y
     */
    public function __construct(InterfacePointPrinter $print, $x, $y)
    {
        $this->x = $x;
        $this->y = $y;
        $this->print = $print;
    }

    public static function __set_state()
    {
        return ['x'];
    }

    public function __sleep()
    {
        return ['x', 'y'];
    }

    public function __wakeup()
    {
        $this->print = new PointPrinterString();
    }

    public function __invoke($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    public function __call($name, $arguments)
    {
        $this->print->$name($this);
    }
}
