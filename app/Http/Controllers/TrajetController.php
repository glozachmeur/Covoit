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
        $trajet = $this->trajetRepository->getPaginate($this->nbrPerPage);
        $links = str_replace('/?', '?', $trajet->render());
        return view('Trajet/Trajet', compact('trajet', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Trajet/createTrajet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(trajetCreateRequest $request)
    {
        if($request->input('fromTrajet')!==null){
            $trajet = $this->trajetRepository->store($request->all());
            return redirect('mytrajet')->withOk("Votre trajet a bien été créé.");
        }else{
            $trajet = $this->trajetRepository->store($request->all());
            return redirect('trajet')->withOk("Le trajet " . $trajet->name . " a bien été créé.");
        }
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

        return view('Trajet/showTrajet',  compact('trajet'));
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

        return view('Trajet/editTrajet',  compact('trajet'));
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
        return redirect('trjaet')->withOk("Le trajet " . $request->input('nomTrajet') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->trajetRepositorye->destroy($id);

        return redirect()->back();
    }
}
