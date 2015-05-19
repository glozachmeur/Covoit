@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Fiche véhicule</div>
			<div class="panel-body"> 
				Voici les informations du véhicule sélectionné :
				<li>Nom  du véhicule: {{ $vehicule->nomVehicule }}</li>
				
				<li>Marque du véhicule : {{ $vehicule->marqueVehicule }}</li>
				
				<li>Couleur du véhicule : {{ $vehicule->couleurVehicule }}</li>

				<li>Nb de places diponibles : {{ $vehicule->nbPlacesVehicule }}</li>
				
				<li>Date de mise en service : {{ $vehicule->dateMiseEnService }}</li>
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop