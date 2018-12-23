<?php
require_once '../src/City.php';
require_once '../src/CityDb.php';
require_once '../src/ConnectDb.php';

$pdo = ConnectDb::get();
$cityDb = new CityDb($pdo);

$id = $_GET['id'];
$city = $cityDb->getCity($id);


echo "
    <form id='delete' action='index.php' method='post'>
        <input type='hidden' name='action' value='delete'>
        <input type='hidden' name='id' value='{$city->getId()}'>
           Вы точно хотите удалить город: {$city->getName()}?<br>
        <button>Подтвердить</button>
        <a href='index.php'>Отмена</a>
    <form/>";
