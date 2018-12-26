<?php
require_once 'src/UserDb.php';

class UserController
{
    /**
     * @var UserDb
     */
    private $userDb;

    public function __construct(PDO $pdo)
    {
        $this->userDb = new UserDb($pdo);
    }

    public function showAction()
    {
        $users = $this->userDb->getAllUsers();

        return [
            'data' => ['users' => $users],
            'view' => 'users/show_user'
        ];
    }

    public function editAction()
    {
        $id = $_GET['id'];
        $user = $this->userDb->getUser($id);

        return [
            'data' => ['user' => $user],
            'view' => 'users/edit_user'
        ];
    }

    public function createAction()
    {
        var_dump('createAction');
    }

    public function deleteAction()
    {
        var_dump('deleteAction');
    }
}
