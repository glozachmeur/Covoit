<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request {

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$id = $this->segment(2);
		return [
			'name' => 'max:255|unique:users,name,' . $id,
			'prenomUsers' => 'max:255' . $id,
			'email' => 'email|max:255|unique:users,email,' . $id
		];
	}

}