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

    public function __call(string $name, array $arguments)
    {
        $method = substr($name, 0, 3);
        $property = strtolower(substr($name, 3));

        if ($method === 'get') {
            return $this->$property;
        }
        if ($method === 'set' && count($arguments) === 1) {
            $this->$property = current($arguments);
        }

        return false;
    }

    public function __isset(string $name)
    {
        return key_exists($name, $this->settings);
    }

    public function __unset($name)
    {
        if (key_exists($name, $this->settings)) {
            unset($this->settings[$name]);
        }
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

    public function __toString(): string
    {
        return $this->getInfo();
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
