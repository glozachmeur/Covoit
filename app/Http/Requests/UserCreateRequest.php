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
			'name' => 'max:255|unique:users',
			'email' => 'email|max:255|unique:users',
			'password' => 'confirmed|min:6'
		];
	}

}