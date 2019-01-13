<?php

namespace App\Model\Database;

use App\Model\City;

class CityDb
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(City $city)
    {
        if (empty($city->getName()) && empty($city->getCountryId())) {
            echo '<p style="color: red; size: ledger">Для страны все поля доллжны быть запролнены!';
            return;
        }

        $result = $this->pdo->exec(sprintf(
            "INSERT INTO city(`name`, `country_id`) VALUE ('%s', '%s')",
            $city->getName(),
            $city->getCountryId()
        ));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }

    public function edit(City $city)
    {
        if (empty($city->getId())) {
            echo '<p style="color: red; size: ledger">Обьект страны нужно создать!';
            return;
        }

        if (empty($city->getName()) && empty($city->getCountryId())) {
            echo '<p style="color: red; size: ledger">Для страны все поля доллжны быть запролнены!';
            return;
        }

        $result = $this->pdo->exec(sprintf(
            "UPDATE city SET `name`='%s', `country_id`='%s' WHERE id = %s",
            $city->getName(),
            $city->getCountryId(),
            $city->getId()
        ));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }

    public function delete($id)
    {
        $result = $this->pdo->exec(sprintf("DELETE FROM city WHERE id = %s", $id));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }

    /**
     * @param $id
     * @return City
     */
    public function getCity($id)
    {
        $statement = $this->pdo->query(
            sprintf("
              SELECT ct.id, ct.name, cr.name as country_name
                FROM city ct
                LEFT JOIN country cr on ct.country_id = cr.id
                WHERE id = %s", $id
            )
        );

        return $statement->fetchObject(City::class);
    }

    /**
     * @return City[]
     */
    public function getAll()
    {
        $statement = $this->pdo->query("
          SELECT ct.id, ct.name, cr.name as country_name
            FROM city ct
            LEFT JOIN country cr on ct.country_id = cr.id;"
        );
        $statement->setFetchMode(
            \PDO::FETCH_CLASS,
            City::class
        );

        return $statement->fetchAll();
    }
}
