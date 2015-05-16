@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Fiche véhicule</div>
			<div class="panel-body"> 
				<p>Nom  du véhicule: {{ $vehicule->nomVehicule }}</p>
				
				<p>Marque du véhicule : {{ $vehicule->marqueVehicule }}</p>
				
				<p>Couleur du véhicule : {{ $vehicule->couleurVehicule }}</p>

				<p>Nb de places diponibles : {{ $vehicule->nbPlacesVehicule }}</p>
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop