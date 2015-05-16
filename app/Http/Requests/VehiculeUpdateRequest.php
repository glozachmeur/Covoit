<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class VehiculeUpdateRequest extends Request {

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$id = $this->segment(2);
		return [
			'couleurVehicule' => 'required|max:255' . $id,
			'marqueVehicule' => 'required|max:255' . $id,
			'nomVehicule' => 'required|max:255' . $id,
			'nbPlace' => 'required|max:10' . $id
		];
	}

}