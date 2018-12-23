<?php

require_once '../src/User.php';
require_once '../src/UserDb.php';
require_once '../src/ConnectDb.php';

$pdo = ConnectDb::get();
$userDb = new UserDb($pdo);

if (!empty($_POST)  && key_exists('action', $_POST)) {
    switch ($_POST['action']) {
        case 'create' : $userDb->createUser($_POST['login'], $_POST['password']); break;
        case 'update' : $userDb->editUser($_POST['id'], $_POST['login'], $_POST['password']); break;
        case 'delete' : $userDb->deleteUser($_POST['id']); break;
    }
}

echo "<h1>Users</h1> <table border='1' style='width:80%'>
  <a href='../index.php'>На главную</a>|
  <a href='form.php'>Добавить</a>
  <tr>
    <th>ID</th>
    <th>Login</th> 
    <th>Last login</th>
    <th>Action</th>
  </tr>";

/** @var User $user */
foreach ($userDb->getAllUsers() as $user) {
    echo "<tr>
        <td>{$user->getId()}</td>
        <td>{$user->getLogin()}</td>
        <td>{$user->getLastLogin()}</td>
        <td>
            <a href='form.php?id={$user->getId()}'>Редактировать</a>
            <a href='delete.php?id={$user->getId()}'>Удалить</a>
        </td>
      </tr>";
}
echo "</table>";
