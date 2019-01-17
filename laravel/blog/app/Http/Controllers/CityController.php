<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\City;

class CityController
{
    public function show()
    {
        return view('city.show', ['cities' => City::all()]);
    }

    public function add($city)
    {
        return view('city.add');
    }
}
