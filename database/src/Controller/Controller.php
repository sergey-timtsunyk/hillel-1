<?php

declare(strict_types=1);

namespace App\Controller;

class Controller
{
    protected function view($data, $view)
    {
        $template = 'templates/'.$view.'.php';

        require_once $template;
    }
}
