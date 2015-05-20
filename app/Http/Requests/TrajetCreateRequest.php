<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TrajetCreateRequest extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->segment(2);
        return [
            'villeDepartTrajet' => 'required|max:255',
            'villeArrivéeTrajet' => 'required|max:255',
            'nbPlaces' => 'required|max:1',
            'pppTrajet' => 'required|max:2'
        ];
    }

}