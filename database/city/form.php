<?php

require_once '../src/City.php';
require_once '../src/CityDb.php';
require_once '../src/CountryDb.php';
require_once '../src/ConnectDb.php';

$pdo = ConnectDb::get();
$cityDb = new CityDb($pdo);
$countryDB = new CountryDb($pdo);

$countries = $countryDB->getAll();
$city = null;

if (key_exists('id', $_GET)) {
    /** @var City $city */
    $city = $cityDb->getCity($_GET['id']);
}

if ($city instanceof City) {
    echo "
    <h1>Редактировать город</h1>
    <form action='index.php' method='post'>
        <input type='hidden' name='action' value='update'>
        <input type='hidden' name='id' value='{$city->getId()}'>
        <label>Название</label><br>
        <input type='text' name='name' value='{$city->getName()}'><br>
        <label>Страна</label><br>
        <select name='country_id'>";

        foreach ($countries as $country) {
            if ($city->getCountryId() == $country->getId()) {
                echo "<option selected='selected' value='{$country->getId()}'>{$country->getName()}</option>";
            } else {
                echo "<option value='{$country->getId()}'>{$country->getName()}</option>";
            }
        }

      echo "</select><br>
        <input type='submit' value='Сохранить'>
    </form>
";
}  else {
    echo "
    <h1>Добавить новую страну</h1>
    <form action='index.php' method='post'>
        <input type='hidden' name='action' value='create'>
        <label>Название</label><br>
        <input type='text' name='name'><br>
        <label>Страна</label><br>

        <select name='country_id'>
            <option></option>";

            foreach ($countries as $country) {
                echo "<option value='{$country->getId()}'>{$country->getName()}</option>";
            }

      echo "</select><br>
        <input type='submit' value='Добавить'>
    </form>
";
}