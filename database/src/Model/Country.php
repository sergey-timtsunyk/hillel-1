<?php

declare(strict_types=1);

namespace App\Model;

use Doctrine\ActiveRecord\Dao\EntityDao;

class Country extends EntityDao implements ModelInterface
{
    protected $_tableName = 'country';

    public function getName()
    {
        return $this->name;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getPhoneCode()
    {
        return $this->phone_code;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function setPhoneCode($phone)
    {
        $this->phone_code = $phone;

        return $this;
    }
}
