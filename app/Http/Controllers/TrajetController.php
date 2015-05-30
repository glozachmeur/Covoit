<?php namespace App\Http\Controllers;

use App\Http\Requests\TrajetCreateRequest;
use App\Http\Requests\TrajetUpdateRequest;

use App\Repositories\TrajetRepository;
use App\Repositories\VehiculeRepository;
use App\Repositories\UserRepository;

use Illuminate\Http\Request;
class TrajetController extends Controller {
    protected $trajetRepository;
    protected $nbrPerPage = 4;

    public function __construct(TrajetRepository $trajetRepository)
    {
        $this->trajetRepository = $trajetRepository;
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
        return view('trajet/indexTrajet', compact('trajets', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('trajet/createTrajet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(trajetCreateRequest $request)
    {
       
            $trajet = $this->trajetRepository->store($request->all());
         return redirect('trajet')->withOk("Le trajet a bien été créé.");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        $trajet = $this->trajetRepository->getById($id);

        return view('trajet/showTrajet',  compact('trajet'));
    }

    /**
     * Show the form for editing the specified resource.
     *

     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $trajet = $this->trajetRepository->getById($id);

        return view('trajet/editTrajet',  compact('trajet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(trajetUpdateRequest $request, $id)
    {
        $this->trajetRepository->update($id, $request->all());
        return redirect('trajet')->withOk("Le trajet a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->trajetRepository->destroy($id);
        return redirect()->back();
    }

    public function mine($id)
    {
        $trajet = $this->trajetRepository->getById($id);

        return view('trajet/mesTrajet');
    }
}
