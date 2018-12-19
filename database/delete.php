<?php
include 'src/User.php';
include 'src/UserDb.php';
include 'src/ConnectDb.php';

$pdo = ConnectDb::get();
$userDb = new UserDb($pdo);

$id = $_GET['id'];
$user = $userDb->getUser($id);


echo "
    <form id='delete' action='index.php' method='post'>
        <input type='hidden' name='action' value='delete'>
        <input type='hidden' name='id' value='{$user->getId()}'>
           Вы точно хотите удалить пользователя: {$user->getLogin()}?<br>
        <button>Подтвердить</button>
        <a href='index.php'>Отмена</a>
    <form/>";
