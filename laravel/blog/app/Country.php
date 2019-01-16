<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    public function getId()
    {
        return $this->id;
    }

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

    public function getCities()
    {
        return $this->hasMany('App\City');
    }
}
