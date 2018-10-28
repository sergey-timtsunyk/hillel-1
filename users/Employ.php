<?php
require_once 'User.php';

class Employ extends User
{
    const TYPE = 'наемный работник';

    protected $position;
    protected $salary;
    protected $hour;

    protected $settings = [];

    public function __construct(string $firstName, string $lastName, string $position, int $salary)
    {
        parent::__construct($firstName, $lastName);
        $this->position = $position;
        $this->salary = $salary;

        $this->settings = [
            'role' => 'user',
            'level' => 0
        ];
    }

    public function __get($name)
    {
       return key_exists($name, $this->settings) ? $this->settings[$name] : null;
    }

    public function __set($name, $value)
    {
        $this->settings[$name] = $value;
    }

    public function getInfo(): string
    {
        return sprintf(
            'Позиция: %s, Имя: %s %s, Должность: %s, Зарплата: %s',
            self::TYPE,
            $this->firstName,
            $this->lastName,
            $this->position,
            $this->salary
        );
    }

    /**
     * @param mixed $hour
     */
    public function setHour($hour): void
    {
        $this->hour = $hour;
    }

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return $this->settings;
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $position
     * @param int $salary
     * @param int $hour
     * @return Employ
     */
    public static function newInstance(string $firstName, string $lastName, string $position, int $salary, int $hour)
    {
        $object = new self($firstName, $lastName, $position, $salary);
        $object->setHour($hour);

        return $object;
    }
}	
