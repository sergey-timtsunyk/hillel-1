<?php

include 'User.php';

$dsn = 'mysql:host=localhost;dbname=my_test';
$username = 'root';
$password = '123';
$options = [];

$pdo = new PDO($dsn, $username, $password, $options);

$statement = $pdo->query("SELECT * FROM user");
$statement->setFetchMode(
    PDO::FETCH_CLASS,
    'User'
);

$userArray =  $statement->fetchAll();

echo "<h1>Users</h1> <table border=\"1\" style=\"width:100%\">
  <tr>
    <th>ID</th>
    <th>Login</th> 
    <th>Last login</th>
   
  </tr>";

/** @var User $user */
foreach ($userArray as $user) {
    echo "<tr>
        <td>{$user->getId()}</td>
        <td>{$user->getLogin()}</td>
        <td>{$user->getLastLogin()}</td>
        
      </tr>";
}
echo "</table>";
