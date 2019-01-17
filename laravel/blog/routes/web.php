<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('countries', 'CountryController@show');
Route::get('countries/edit/{country}', 'CountryController@edit');
Route::post('countries/edit/{country}', 'CountryController@edit');
Route::get('countries/add', 'CountryController@add');
Route::post('countries/add', 'CountryController@add');
Route::get('countries/delete/{country}', 'CountryController@delete');



Route::get('cities', 'CityController@show');
Route::get('cities/add', 'CityController@add');