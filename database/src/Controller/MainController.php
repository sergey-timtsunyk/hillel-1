<?php
namespace App\Controller;

use App\Model\City;

class MainController extends Controller
{
    public function indexAction()
    {
        $this->view('', 'main/index');
    }
}
