<?php
namespace User;

use Files\Xml\Reader;

abstract class User
{
    const TYPE = 'работник';

    private static $countUser = 0;

    protected $firstName;
    protected $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        self::$countUser++;

        new Reader();
    }

    abstract public function getInfo(): string;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public static function getCountUser(): int
    {
        return self::$countUser;
    }
}