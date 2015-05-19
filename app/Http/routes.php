<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//route la gestion des utilisateurs
Route::resource('user', 'UserController');
Route::resource('vehicule', 'VehiculeController');
Route::resource('/', 'HomeController');
Route::resource('home', 'HomeController');

get('myaccountupdate', 'UserController@updateFromAccount');

Route::get('myaccount', function()
{
    return View::make('monCompte');
});

Route::get('myvehicule', function()
{
    return View::make('monVehicule');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//route trajet
Route::ressource('trajet','TrajetController');