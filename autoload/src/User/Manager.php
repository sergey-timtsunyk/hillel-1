<?php 

namespace User;

class Manager extends Employ
{
    const TYPE = 'управленец';

    private $employees = [];

    /**
     * @param User $employ
     * @return Manager
     */
    public function addEmploy(User $employ)
    {
        $this->employees[] = $employ;

        return $this;
    }

    /**
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function hasEmployees(): bool
    {
        return !empty($this->employees);
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
}