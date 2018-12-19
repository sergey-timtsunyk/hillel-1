<?php

class ConnectDb
{
    public static function get()
    {
        $dsn = 'mysql:host=localhost;dbname=my_test';
        $username = 'root';
        $password = '123';
        $options = [];

        return new PDO($dsn, $username, $password, $options);
    }
}
