<?php namespace App\Http\Controllers;

use App\Http\Requests\VehiculeCreateRequest;
use App\Http\Requests\VehiculeUpdateRequest
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class trajetControlleur extends Controller {
    protected $trajetRepository;
    protected $nbr;

    public function __contruct(trajetRepository $trajetRepository){
        $this->trajetRepository=$trajetRepository;
    }
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $trajets = $this->trajetRepository->getPaginate($this->nbrPerPage);
        $links = str_replace('/?', '?', $trajets->render());
        return view('index', compact('trajets', 'links'));
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
	public function store(TrajetRequest $request)
    {
        $this->setAdmin($request);
        $user = $this->trajetRepository->store($request->all());
        return redirect('user')->withOk("L'utilisateur " . $user->name . " a été créé.");
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
