<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class VehiculeCreateRequest extends Request {

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$id = $this->segment(2);
		return [
			'nomVehicule' => 'required|max:255',
			'marqueVehicule' => 'required|max:255',
			'couleurVehicule' => 'required|max:255'
		];
	}

}