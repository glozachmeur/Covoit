<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TrajetCreateRequest extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'villeDepartTrajet' => 'required|max:255',
            'villeArriveeTrajet' => 'required|max:255',
            'dureeTrajet' => 'required',
			'dateDebutTrajet' => 'required',
			];
    }

}