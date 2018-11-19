<?php
 abstract class Transport
{
    private $name;
    private $weight;
    private $carrying;
    private $carryingCurrent;
    private $fuelType;
    private $typeOfMovement;
    protected $action = 'без бвижения';

    protected $move = false;

    public function __construct (string $name, int $weight, int $carrying, string $fuelType, $typeOfMovement)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->carrying = $carrying;
        $this->carryingCurrent = 0;
        $this->fuelType = $fuelType;
        $this->typeOfMovement = $typeOfMovement;
    }

    public function beginMovement()
    {
        $this->move = true;
        $this->action = 'в движении';
    }

    public function stopMovement()
    {
        $this->move = false;
        $this->action = 'остановка';
    }

    public function loading(int $massa)
    {

        if (($this->carrying - $this->carryingCurrent - $massa) < 0) {
            throw new \Exception('Такой груз не поместится!');
        }

        $this->carryingCurrent += $massa;

        if ($this->move) {
            throw new \Exception('Необходимо остановиться!');
        }

        $this->action = "загрузка: {$massa} т";
    }
    public function unloading(int $massa)
    {
        $this->carryingCurrent -= $massa;

        $this->action = "разгрузка: {$massa} т";
    }

    public function getAction()
    {
        return $this->action;
    }
}