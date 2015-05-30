”<?php

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

Route::resource('vehicule', 'VehiculeController');

Route::resource('user', 'UserController');


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

Route::get('mytrajet', function()
{
    return View::make('Trajet/mesTrajets');
});

Route::get('selecttrajet', function()
{
    return View::make('Trajet/selectTrajet');
});

Route::get('findtrajet', function()
{
    return View::make('Trajet/findTrajet');
});

Route::post('findtrajet', function()
{
    return View::make('Trajet/findTrajet');
});

Route::post('confirmtrajet', function()
{
    return View::make('Trajet/confirmTrajet');
});

Route::resource('find', 'TrajetController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//route trajet
Route::resource('trajet','TrajetController');

//route messagerie
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});
