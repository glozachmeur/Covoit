<?php namespace App\Http\Controllers;

use App\Http\Requests\VehiculeCreateRequest;
use App\Http\Requests\VehiculeUpdateRequest;

use App\Repositories\VehiculeRepository;

use Illuminate\Http\Request;
class VehiculeController extends Controller {
	 protected $vehiculeRepository;
     protected $nbrPerPage = 4;
	 
	 public function __construct(VehiculeRepository $vehiculeRepository)
    {
		$this->vehiculeRepository = $vehiculeRepository;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$vehicules = $this->vehiculeRepository->getPaginate($this->nbrPerPage);
		$links = str_replace('/?', '?', $vehicules->render());
		return view('indexVehicule', compact('vehicules', 'links'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(vehiculeCreateRequest $request)
	{
		$this->setAdmin($request);
		$vehicule = $this->vehiculeRepository->store($request->all());
		return redirect('vehicule')->withOk("Le véhicule " . $vehicule->name . " a été créé.");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		
		$vehicule = $this->vehiculeRepository->getById($id);

		return view('show',  compact('vehicule'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vehicule = $this->vehiculeRepository->getById($id);

		return view('edit',  compact('vehicule'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(vehiculeUpdateRequest $request, $id)
	{
		$this->setAdmin($request);
		$this->vehiculeRepository->update($id, $request->all());
		
		return redirect('vehicule')->withOk("Le véhicule " . $request->input('name') . " a été modifié.");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->vehiculeRepository->destroy($id);

		return redirect()->back();
	}
}
