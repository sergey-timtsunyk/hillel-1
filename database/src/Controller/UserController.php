<?php
namespace App\Controller;

use App\Serves\FactoryModel;


class UserController extends Controller
{
    /**
     * UserController constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $user = FactoryModel::getModel('User');
    }

    public function showAction()
    {
        $user = FactoryModel::getModel('User');
        $users = $user->findAll();

        $this->view(['users' => $users], 'users/show_user');
    }

    public function editAction()
    {
        $id = $_GET['id'];
        $user = FactoryModel::getModel('User');
        $user = $user->find($id);

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
