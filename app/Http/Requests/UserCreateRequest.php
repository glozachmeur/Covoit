<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateRequest extends Request {

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'name' => 'required|max:20|unique:users',
			'email' => 'required|email|max:255|unique:users',
			'pseudoUsers' => 'required|max:20',
			'password' => 'confirmed|min:6'
		];
	}

}