<?php

namespace App\Controller;

use App\Model\Database\CityDb;
use App\Model\Database\CountryDb;

class CitiesController
{
    /**
     * @var CityDb
     */
    private $cityDb;

    /**
     * @var CountryDb
     */
    private $countryDb;

    public function __construct(\PDO $pdo)
    {
        $this->cityDb = new CityDb($pdo);
        $this->countryDb = new CountryDb($pdo);
    }

    public function showAction()
    {
        $cities = $this->cityDb->getAll();

        return [
            'data' => ['cities' => $cities],
            'view' => 'cities/show_cities'
        ];
    }
}
