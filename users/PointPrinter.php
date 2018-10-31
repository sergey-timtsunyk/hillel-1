<?php

require_once 'InterfacePointPrinter.php';
require_once 'Point.php';

class PointPrinter implements InterfacePointPrinter
{
    public function printX(Point $point): void
    {
        echo "(PP)Точка Х = {$point->getX()}<br/>";
    }

    public function printY(Point $point): void
    {
        echo "(PP)Точка Y = {$point->getY()}<br/>";
    }
}
