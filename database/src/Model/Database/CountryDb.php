<?php

namespace App\Model\Database;

use App\Model\TestCountry;

class CountryDb
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * CountryDb constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(TestCountry $country)
    {
        if (empty($country->getName()) && empty($country->getCode()) && empty($country->getPhoneCode())) {
            echo '<p style="color: red; size: ledger">Для страны все поля доллжны быть запролнены!';
            return;
        }

        $countryCheck = $this->getCountryByName($country->getName());

        if ($countryCheck instanceof TestCountry) {
            echo sprintf('<p style="color: red; size: ledger">Страна с названием "%s" уже существует!', $country->getName()) ;
            return;
        }

        $result = $this->pdo->exec(sprintf(
            "INSERT INTO country(`name`, `phone_code`, `code`) VALUE ('%s', '%s', '%s')",
            $country->getName(),
            $country->getPhoneCode(),
            $country->getCode()
        ));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }

    public function edit(TestCountry $country)
    {
        if (empty($country->getId())) {
            echo '<p style="color: red; size: ledger">Обьект страны нужно создать!';
            return;
        }

        if (empty($country->getName()) && empty($country->getCode()) && empty($country->getPhoneCode())) {
            echo '<p style="color: red; size: ledger">Для страны все поля доллжны быть запролнены!';
            return;
        }

        $countryCheck = $this->getCountryByName($country->getName());

        if ($countryCheck instanceof TestCountry && $countryCheck->getId() != $country->getId()) {
            echo sprintf('<p style="color: red; size: ledger">Страна с названием "%s" уже существует!', $country->getName()) ;
            return;
        }

        $result = $this->pdo->exec(sprintf(
            "UPDATE country SET `name`='%s', `phone_code`='%s', `code`='%s' WHERE id = %s",
            $country->getName(),
            $country->getPhoneCode(),
            $country->getCode(),
            $country->getId()
        ));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }

    public function delete($id)
    {
        $result = $this->pdo->exec(sprintf("DELETE FROM country WHERE id = %s", $id));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }

    /**
     * @param $id
     * @return TestCountry
     */
    public function getCountry($id)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM country WHERE id = %s", $id)
        );

        return $statement->fetchObject(TestCountry::class);
    }

    /**
     * @return TestCountry[]
     */
    public function getAll()
    {
        $statement = $this->pdo->query("SELECT * FROM country");
        $statement->setFetchMode(
            \PDO::FETCH_CLASS,
            TestCountry::class
        );

        return $statement->fetchAll();
    }

    /**
     * @param $name
     * @return TestCountry
     */
    public function getCountryByName($name)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM country WHERE `name` = '%s'", $name)
        );

        return $statement->fetchObject(TestCountry::class);
    }
}
