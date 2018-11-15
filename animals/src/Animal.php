<?php

class Animal
{
    protected $wight;

    protected $age;

    protected $wayOfEating;

    protected $environment;

    protected $speed;

    /**
     * Animal constructor.
     * @param $wight
     * @param $age
     * @param $wayOfEating
     * @param $environment
     * @param $speed
     */
    public function __construct(int $wight, int $age, string $wayOfEating, string $environment, int $speed)
    {
        $this->wight = $wight;
        $this->age = $age;
        $this->wayOfEating = $wayOfEating;
        $this->environment = $environment;
        $this->speed = $speed;
    }

    public function eat()
    {

    }

    public function sleep()
    {

    }
}
