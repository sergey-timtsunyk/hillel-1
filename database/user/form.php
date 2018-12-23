<?php
require_once '../src/User.php';
require_once '../src/UserDb.php';
require_once '../src/ConnectDb.php';

$pdo = ConnectDb::get();
$userDb = new UserDb($pdo);

$user = null;

if (key_exists('id', $_GET)) {
    /** @var User $user */
    $user = $userDb->getUser($_GET['id']);
}

if (!$user) {
    echo "
    <h1>Добавить нового пользователя</h1>
    <form action='index.php' method='post'>
        <input type='hidden' name='action' value='create'>
        <label>Login</label><br>
        <input type='text' name='login'><br>
        <label>Password</label><br>
        <input type='password'  name='password'><br>
        <input type='submit' value='Добавить'>
    </form>
";
}  else {
    echo "
    <h1>Редактировать пользователя</h1>
    <form action='index.php' method='post'>
        <input type='hidden' name='action' value='update'>
        <input type='hidden' name='id' value='{$user->getId()}'>
        <label>Login</label><br>
        <input type='text' name='login' value='{$user->getLogin()}'><br>
        <label>Password</label><br>
        <input type='password' name='password' value='{$user->getPassword()}' ><br>
        <input type='submit' value='Сохранить'>
    </form>
";
}
