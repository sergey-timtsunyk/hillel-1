<?php

require_once 'src/CountryDb.php';

class CountryController
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function showAction()
    {
        $countryDb = new CountryDb($this->pdo);
        $countries = $countryDb->getAll();

        return [
            'data' => ['countries' => $countries],
            'view' => 'countries/show_country'
        ];
    }

    public function editAction()
    {
        var_dump('editAction');
    }

    public function createAction()
    {
        var_dump('createAction');
    }

    public function deleteAction()
    {
        var_dump('deleteAction');
    }
}
