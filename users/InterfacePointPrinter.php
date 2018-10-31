<?php

declare(strict_types=1);

interface InterfacePointPrinter
{
    public function printX(Point $point): void;
    public function printY(Point $point): void;
}
