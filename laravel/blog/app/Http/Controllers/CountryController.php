<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function show()
    {
        return view('country.show', ['countries' => Country::all()]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('POST')) {
           $this->validate($request, [
               'name' => 'required|max:20',
               'code' => 'required|max:3|min:2',
               'phone_code' => 'required|max:5|min:2',
           ]);

            $country = new Country();
            $country->setName($request->name);
            $country->setCode($request->code);
            $country->setPhoneCode($request->phone_code);
            $country->save();

            return redirect('/countries');
        }

        return view('country.add');
    }

    public function edit(Country $country, Request $request)
    {
        if ($request->isMethod('POST')) {
            $this->validate($request, [
                'name' => 'required|max:20',
                'code' => 'required|max:3|min:2',
                'phone_code' => 'required|max:5|min:2',
            ]);

            $country->setName($request->name);
            $country->setCode($request->code);
            $country->setPhoneCode($request->phone_code);
            $country->save();

            return redirect('/countries');
        }

        return view('country.edit', ['country' => $country]);
    }

    public function delete(Country $country)
    {
        $country->delete();

        return redirect('/countries');
    }
}
