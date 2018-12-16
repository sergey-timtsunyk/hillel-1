<?php

class UserDb
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function editUser($id, $login, $password)
    {
        if (empty($login)) {
            echo '<p style="color: red; size: ledger">Поле логин полжно не должно быть пустым!';
            return;
        }

        $result = $this->pdo->exec(sprintf("UPDATE user SET `login`='%s', `password`='%s' WHERE id = %s", $login, $password,  $id));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }

    public function createUser($login, $password)
    {
        if (empty($login)) {
            echo '<p style="color: red; size: ledger">Поле логин полжно не должно быть пустым!';
            return;
        }

        $result = $this->pdo->exec(sprintf("INSERT INTO user(`login`, `password`) VALUE ('%s', '%s')", $login, $password));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }

    /**
     * @return User[]
     */
    public function getAllUsers()
    {
        $statement = $this->pdo->query("SELECT * FROM user");
        $statement->setFetchMode(
            PDO::FETCH_CLASS,
            'User'
        );

        return $statement->fetchAll();
    }

    /**
     * @param $id
     * @return User
     */
    public function getUser($id)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM user WHERE id = %s", $id)
        );

        return $statement->fetchObject('User');
    }
}
