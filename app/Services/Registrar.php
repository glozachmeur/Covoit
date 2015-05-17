<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'prenomUsers' => 'required|max:255',
			'pseudoUsers' => 'required|max:255|unique:users',
			'telPortUsers' => 'required|max:13',
			'telFixeUsers' => 'max:13',
			'dateNaissanceUsers' => 'required',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{	
		if(isset($data['telFixeUsers'])){
			return User::create([
				'name' => $data['name'],
				'prenomUsers' => $data['prenomUsers'],
				'pseudoUsers' => $data['pseudoUsers'],
				'telPortUsers' => $data['telPortUsers'],
				'telFixeUsers' => $data['telFixeUsers'],
				'dateNaissanceUsers' => $data['dateNaissanceUsers'],
				'email' => $data['email'],
				'password' => $data['password'],
			]);
		}else{
			return User::create([
				'name' => $data['name'],
				'prenomUsers' => $data['prenomUsers'],
				'pseudoUsers' => $data['pseudoUsers'],
				'telPortUsers' => $data['telPortUsers'],
				'dateNaissanceUsers' => $data['dateNaissanceUsers'],
				'email' => $data['email'],
				'password' => $data['password'],
			]);
		}
	}

}
