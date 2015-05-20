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
            'villeDepartTrajet' => 'max:255',
            'villeArrivéeTrajet' => 'max:255',
            'nbPlaces' => 'max:1'
            'pppTrajet' => 'max:2'
        ];
    }

}