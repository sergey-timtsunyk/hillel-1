<?php
require_once 'InterfacePointPrinter.php';
require_once 'Point.php';

class PointPrinterString implements InterfacePointPrinter
{
    public function printX(Point $point): void
    {
        echo "(PPS)Координата точки Х = {$point->getX()}<br/>";
    }

    public function printY(Point $point): void
    {
        echo "(PPS)Координата точки Y = {$point->getY()}<br/>";
    }
}
