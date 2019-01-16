<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Country;

class CountryController extends Controller
{
    public function show()
    {
        return view('country.show', ['countries' => Country::all()]);
    }
}
