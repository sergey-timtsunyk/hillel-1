<?php
echo "<h1>Users</h1> <table border='1' style='width:80%'>
  <a href='/'>На главную</a>|
  <a href='/users/add'>Добавить</a>
  <tr>
    <th>ID</th>
    <th>Login</th> 
    <th>Last login</th>
    <th>Action</th>
  </tr>";

/** @var App\Model\User $user */
foreach ($data['users'] as $user) {
    echo "<tr>
        <td>{$user->getId()}</td>
        <td>{$user->getLogin()}</td>
        <td>{$user->getLastLogin()}</td>
        <td>
            <a href='/users/edit?id={$user->getId()}'>Редактировать</a>
            <a href='/users/delete?id={$user->getId()}'>Удалить</a>
        </td>
      </tr>";
}
echo "</table>";