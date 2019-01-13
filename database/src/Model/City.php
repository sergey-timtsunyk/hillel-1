<?php

namespace App\Model;

class City
{
    private $id;
    private $name;
    private $country_id;
    private $country_name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCountryId()
    {
        return $this->country_id;
    }

    /**
     * @return mixed
     */
    public function getCountryName()
    {
        return $this->country_name;
    }

    public function update($name, $countryId)
    {
        $this->name = $name;
        $this->country_id = $countryId;
    }
}
