<?php

class City
{
    private $id;
    private $name;
    private $country_id;

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

    public function update($name, $countryId)
    {
        $this->name = $name;
        $this->country_id = $countryId;
    }
}
