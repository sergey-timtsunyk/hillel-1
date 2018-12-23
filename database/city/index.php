<?php

require_once '../src/City.php';
require_once '../src/CityDb.php';
require_once '../src/CountryDb.php';
require_once '../src/ConnectDb.php';

$pdo = ConnectDb::get();
$cityDb = new CityDb($pdo);
$countryDB = new CountryDb($pdo);

if (!empty($_POST)  && key_exists('action', $_POST)) {
    switch ($_POST['action']) {
        case 'create' : {
            $city = new City();
            $city->update($_POST['name'], $_POST['country_id']);

            $cityDb->create($city);
            break;
        }
        case 'update' : {
            $city = $cityDb->getCity($_POST['id']);
            $city->update($_POST['name'], $_POST['country_id']);

            $cityDb->edit($city);
            break;
        }
        case 'delete' : $cityDb->delete($_POST['id']); break;
    }
}

echo "<h1>Countries</h1> <table border='1' style='width:80%'>
  <a href='../index.php'>На главную</a>|
  <a href='form.php'>Добавить</a>
  <tr>
    <th>ID</th>
    <th>Название</th> 
    <th>Страна</th>
    <th>Действия</th>
  </tr>";

/** @var City $city */
foreach ($cityDb->getAll() as $city) {

    $country = $countryDB->getCountry($city->getCountryId());

    echo "<tr>
        <td>{$city->getId()}</td>
        <td>{$city->getName()}</td>
        <td>{$country->getName()}</td>
        <td>
            <a href='form.php?id={$city->getId()}'>Редактировать</a>
            <a href='delete.php?id={$city->getId()}'>Удалить</a>
        </td>
      </tr>";
}
echo "</table>";
