<?php

declare(strict_types=1);

namespace App\Model;

use Doctrine\ActiveRecord\Dao\EntityDao;

class User extends EntityDao implements ModelInterface
{
    protected $_tableName = 'user';

    public function getLastLogin()
    {
        return $this->last_login;
    }

    public function getLogin()
    {
        return $this->login;
    }
}
