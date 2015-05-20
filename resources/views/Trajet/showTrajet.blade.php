@extends('template')

@section('contenu')
<div class="col-sm-offset-4 col-sm-4">
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading">Fiche trajet</div>
        <div class="panel-body">
            Voici les informations du trajet sélectionné :
            <li>Ville de départ : {{ $trajet->villeDepartTrajet }}</li>

            <li>Ville d'arrivée : {{ $trajet->villeArriveeTrajet }}</li>

            <li>Nombre de places disponibles : {{ $trajet->nbPlace }}</li>

            <li>Prix par personne : {{ $trajet->nbPlacesVehicule }}</li>
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
</div>
@stop