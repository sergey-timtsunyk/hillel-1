<?php

include 'User.php';
include 'ConnectDb.php';

$pdo = ConnectDb::get();


if (!empty($_POST) && key_exists('id', $_POST)) {
    editUser();
} elseif (!empty($_POST)) {
    createUser();
}


$statement = $pdo->query("SELECT * FROM user");
$statement->setFetchMode(
    PDO::FETCH_CLASS,
    'User'
);


$userArray =  $statement->fetchAll();

echo "<h1>Users</h1> <table border=\"1\" style=\"width:100%\">
  <a href='user_form.php'>Добавить</a>
  <tr>
    <th>ID</th>
    <th>Login</th> 
    <th>Last login</th>
    <th>Action</th>
  </tr>";

/** @var User $user */
foreach ($userArray as $user) {
    echo "<tr>
        <td>{$user->getId()}</td>
        <td>{$user->getLogin()}</td>
        <td>{$user->getLastLogin()}</td>
        <td>
            <a href='user_form.php?id={$user->getId()}'>Редактировать</a>
            <a href='delete.php?model=user&id={$user->getId()}'>Удалить</a>
        </td>
      </tr>";
}
echo "</table>";

function editUser(PDO $pdo, $id, $login, $password)
{
    $pdo->query(sprintf('UPDATE user SET  WHERE id = %s', $id));
}

function createUser(PDO $pdo, $login, $password)
{

}
