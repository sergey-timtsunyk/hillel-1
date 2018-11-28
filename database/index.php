<?php
/**
 * Project: hillel-1
 * User: <serhii.tymtsunyk@ekingdom.tech>
 * Date: 2018-11-28
 */


$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$passwd = '123';
$options = [];

$pdo = new PDO($dsn, $username, $passwd, $options);


$st = $pdo->query('SELECT * FROM profile', PDO::FETCH_ASSOC);

var_dump($st->execute());
var_dump($st->fetchAll());