<?php
$user = $data['user'];
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