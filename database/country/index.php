<?php


require_once '../src/Country.php';
require_once '../src/CountryDb.php';
require_once '../src/ConnectDb.php';

$pdo = ConnectDb::get();
$countryDb = new CountryDb($pdo);

if (!empty($_POST)  && key_exists('action', $_POST)) {
    switch ($_POST['action']) {
        case 'create' : {
            $country = new Country();
            $country->update($_POST['name'], $_POST['phone_code'], $_POST['code']);

            $countryDb->create($country);
            break;
        }
        case 'update' : {
            $country = $countryDb->getCountry($_POST['id']);
            $country->update($_POST['name'], $_POST['phone_code'], $_POST['code']);

            $countryDb->edit($country);
            break;
        }
        case 'delete' : $countryDb->delete($_POST['id']); break;
    }
}

echo "<h1>Countries</h1> <table border='1' style='width:80%'>
  <a href='../index.php'>На главную</a>|
  <a href='form.php'>Добавить</a>
  <tr>
    <th>ID</th>
    <th>Название</th> 
    <th>Код страны</th>
    <th>Код телефона</th>
    <th>Действия</th>
  </tr>";

/** @var Country $country */
foreach ($countryDb->getAll() as $country) {
    echo "<tr>
        <td>{$country->getId()}</td>
        <td>{$country->getName()}</td>
        <td>{$country->getCode()}</td>
        <td>{$country->getPhoneCode()}</td>
        <td>
            <a href='form.php?id={$country->getId()}'>Редактировать</a>
            <a href='delete.php?id={$country->getId()}'>Удалить</a>
        </td>
      </tr>";
}
echo "</table>";
