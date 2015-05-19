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
			'name' => 'max:255',
			'prenomUsers' => 'max:255',
			'email' => 'email|max:255|',
			'pseudoUsers' => 'max:20',
			'telPortUsers' => 'required|max:13'
		];
	}

}