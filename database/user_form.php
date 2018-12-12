<?php
include 'User.php';
include 'ConnectDb.php';

$pdo = ConnectDb::get();

$user = null;

if (key_exists('id', $_GET)) {
    $statement = $pdo->query(
        sprintf("SELECT * FROM user WHERE id = %s", $_GET['id'])
    );

    /** @var User $user */
    $user = $statement->fetchObject('User');
}

if (!$user) {
    echo "
    <h1>Добавить нового пользователя</h1>
    <form action='index.php' method='post'>
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
        <input type='hidden' name='id' value='{$user->getId()}'>
        <label>Login</label><br>
        <input type='text' name='login' value='{$user->getLogin()}'><br>
        <label>Password</label><br>
        <input type='password' name='password' value='{$user->getPassword()}' ><br>
        <input type='submit' value='Сохранить'>
    </form>
";
}
