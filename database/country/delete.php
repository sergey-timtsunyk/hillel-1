<?php
require_once '../src/Country.php';
require_once '../src/CountryDb.php';
require_once '../src/ConnectDb.php';

$pdo = ConnectDb::get();
$countryDb = new CountryDb($pdo);

$id = $_GET['id'];
$country = $countryDb->getCountry($id);


echo "
    <form id='delete' action='index.php' method='post'>
        <input type='hidden' name='action' value='delete'>
        <input type='hidden' name='id' value='{$country->getId()}'>
           Вы точно хотите удалить страну: {$country->getName()}?<br>
        <button>Подтвердить</button>
        <a href='index.php'>Отмена</a>
    <form/>";
