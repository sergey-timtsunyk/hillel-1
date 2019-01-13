<?php

namespace App\Model;

class Country
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $phone_code;

    /**
     * @var string
     */
    private $code;

    /**
     * @param string $name
     * @param int $phone_code
     * @param string $code
     *
     * @return Country
     */
    public static function instance(string $name, int $phone_code, string $code)
    {
        $self = new self();
        $self->setName($name);
        $self->setCode($code);
        $self->setPhoneCode($phone_code);

        return $self;
    }

    public function update(string $name, int $phone_code, string $code)
    {
        $this->setName($name);
        $this->setPhoneCode($phone_code);
        $this->setCode($code);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPhoneCode(): int
    {
        return $this->phone_code;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $phone_code
     */
    public function setPhoneCode(int $phone_code): void
    {
        $this->phone_code = $phone_code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }
}
