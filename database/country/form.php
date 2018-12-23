<?php

require_once '../src/Country.php';
require_once '../src/CountryDb.php';
require_once '../src/ConnectDb.php';

$pdo = ConnectDb::get();
$countryDb = new CountryDb($pdo);

$country = null;

if (key_exists('id', $_GET)) {
    /** @var Country $country */
    $country = $countryDb->getCountry($_GET['id']);
}

if ($country instanceof Country) {
    echo "
    <h1>Редактировать страну</h1>
    <form action='index.php' method='post'>
        <input type='hidden' name='action' value='update'>
        <input type='hidden' name='id' value='{$country->getId()}'>
        <label>Название</label><br>
        <input type='text' name='name' value='{$country->getName()}'><br>
        <label>Код страны</label><br>
        <input type='text' name='code' value='{$country->getCode()}' ><br>
        <label>Код телефона</label><br>
        <input type='text' name='phone_code' value='{$country->getPhoneCode()}' ><br>
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
        <label>Код страны</label><br>
        <input type='text' name='code'><br>
        <label>Код телефона</label><br>
        <input type='text' name='phone_code'><br>
        <input type='submit' value='Добавить'>
    </form>
";
}