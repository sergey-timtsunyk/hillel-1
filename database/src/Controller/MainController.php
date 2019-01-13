<?php
namespace App\Controller;

use App\Model\City;

class MainController
{
    public function indexAction()
    {
        $city = new City();

        return [
            'data' => '',
            'view' => 'main/index'
        ];
    }
}
