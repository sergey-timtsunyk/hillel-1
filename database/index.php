<?php
/**
 * Project: hillel-1
 * User: <serhii.tymtsunyk@ekingdom.tech>
 * Date: 2018-11-28
 */


include 'User.php';

$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = '123';
$options = [];

$pdo = new PDO($dsn, $username, $password, $options);


var_dump($pdo->exec('UPDATE user SET last_login = "2018-11-04 16:02:33" WHERE id = 2'));


$statement = $pdo->query("SELECT * FROM user");
$statement->setFetchMode(
    PDO::FETCH_CLASS,
    'User'
);

$userArray =  $statement->fetchAll();

/** @var User $user */
foreach ($userArray as $user) {
    echo $user->getLogin() . '['. $user->getLastLogin() . ']<br/>';
}


echo '<pre>';
var_dump($userArray);
echo '</pre>';